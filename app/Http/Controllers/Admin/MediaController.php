<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MediaController extends Controller
{
    private ImageManager $imageManager;

    public function __construct()
    {
         if (class_exists(Driver::class)) {
            $this->imageManager = new ImageManager(new Driver());
        }
    }

    public function index()
    {
        return view('admin.media.index');
    }

    /**
     * Get Media Data for Modals/AJAX
     */
    public function getData(Request $request)
    {
        $query = Media::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('file_name', 'LIKE', "%{$search}%")
                  ->orWhere('alt_text', 'LIKE', "%{$search}%");
        }
        
        $query->latest();

        $media = $query->paginate(12);

        $media->getCollection()->transform(function ($item) {
            return [
                'id' => $item->id,
                'url' => asset(Storage::url($item->file_path)),
                'file_path' => $item->file_path,
                'file_name' => $item->file_name,
                'mime_type' => $item->mime_type,
                'is_image' => str_starts_with($item->mime_type, 'image/'),
            ];
        });

        return response()->json($media);
    }

    public function upload(Request $request)
    {
        $request->validate([
             'files.*' => 'required|file|max:10240', // 10MB max per file
        ]);

        if (!$request->hasFile('files')) {
            return response()->json(['success' => false, 'message' => 'No files uploaded'], 400);
        }

        $uploadedMedia = [];
        $errors = [];

        foreach ($request->file('files') as $file) {
            try {
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = pathinfo($originalName, PATHINFO_FILENAME);
                $uniqueName = Str::slug($fileName) . '_' . time() . '_' . Str::random(5) . '.' . $extension;
                
                $storagePath = 'products/media/' . date('Y/m');
                $fullPath = $storagePath . '/' . $uniqueName;
                
                Storage::disk('public')->putFileAs($storagePath, $file, $uniqueName);
                
                // Create thumbnails if image
                $thumbnails = [];
                if (str_starts_with($file->getMimeType(), 'image/') && isset($this->imageManager)) {
                    $thumbnails = $this->createThumbnails($file, $storagePath, $uniqueName);
                }

                $media = Media::create([
                    'file_name' => $originalName,
                    'file_path' => $fullPath,
                    'disk' => 'public',
                    'mime_type' => $file->getMimeType(),
                    'file_type' => str_starts_with($file->getMimeType(), 'image/') ? 'image' : 'document',
                    'file_size' => $file->getSize(),
                    'thumbnails' => $thumbnails ?: null,
                    'metadata' => [
                        'original_name' => $originalName,
                        'extension' => $extension,
                    ],
                    'uploaded_by' => auth()->id(), 
                    'uploader_type' => 'admin',
                ]);

                $uploadedMedia[] = [
                    'id' => $media->id,
                    'url' => asset(Storage::url($fullPath)),
                    'file_name' => $originalName
                ];

            } catch (\Exception $e) {
                $errors[] = "Failed to upload {$file->getClientOriginalName()}: " . $e->getMessage();
            }
        }

        return response()->json([
            'success' => count($errors) === 0,
            'data' => count($uploadedMedia) > 0 ? $uploadedMedia[0] : null, // Backwards compatibility for single select UI
            'all_uploaded' => $uploadedMedia,
            'errors' => $errors
        ]);
    }

    private function createThumbnails($file, $storagePath, $fileName)
    {
        $thumbnails = [];
        try {
             $image = $this->imageManager->read($file->getRealPath());
             $originalName = pathinfo($fileName, PATHINFO_FILENAME);
             $extension = pathinfo($fileName, PATHINFO_EXTENSION);

             // Small
             $smallName = $originalName . '_small.' . $extension;
             $smallImage = clone $image;
             $smallImage->cover(150, 150);
             Storage::disk('public')->put($storagePath . '/' . $smallName, (string) $smallImage->encodeByExtension($extension));
             $thumbnails['small'] = $storagePath . '/' . $smallName;

        } catch(\Exception $e) {
            // Squelch image error to ensure primary upload succeeds
        }
        
        return $thumbnails;
    }
}
