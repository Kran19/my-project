<?php

use App\Models\Product;
use App\Models\ProductVariant;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Checking Products...\n";

// Get 5 random products that are active
$products = Product::with(['defaultVariant.images', 'variants.images'])
    ->where('status', 'active') // Ensure we check active ones
    ->limit(5)->get();

if ($products->isEmpty()) {
    echo "No active products found.\n";
    // Try without status check
    $products = Product::with(['defaultVariant.images', 'variants.images'])->limit(5)->get();
}

foreach ($products as $product) {
    echo "--------------------------------------------------\n";
    echo "Product ID: " . $product->id . " | Name: " . $product->name . "\n";
    echo "Is Featured: " . ($product->is_featured ? 'Yes' : 'No') . "\n";
    echo "Is New: " . ($product->is_new ? 'Yes' : 'No') . "\n";
    
    // Check Default Variant
    $defVar = $product->defaultVariant;
    if ($defVar) {
        echo "Default Variant ID: " . $defVar->id . "\n";
        echo "  Images Count: " . $defVar->images->count() . "\n";
        foreach ($defVar->images as $img) {
             echo "    - Image ID: " . $img->id . " | Path: " . $img->file_path . " | Is Primary: " . $img->pivot->is_primary . "\n";
        }
    } else {
        echo "NO Default Variant Found.\n";
    }
    
    // Check All Variants
    echo "Total Variants: " . $product->variants->count() . "\n";
    foreach ($product->variants as $variant) {
        if ($defVar && $variant->id == $defVar->id) continue;
        echo "  Variant ID: " . $variant->id . " (Images: " . $variant->images->count() . ")\n";
         foreach ($variant->images as $img) {
             echo "    - Image ID: " . $img->id . " | Path: " . $img->file_path . "\n";
        }
    }
    
    // Test the logic I used in controller
     $imagePath = null;
    if ($product->main_image) {
         $imagePath = "Via Accessor: " . $product->main_image;
    } else {
        $firstVariantWithImage = $product->variants->first(function($variant) {
            return $variant->images->isNotEmpty();
        });
        if ($firstVariantWithImage) {
            $imagePath = "Via Fallback: " . $firstVariantWithImage->images->first()->file_path;
        } else {
            $imagePath = "NULL (No images found)";
        }
    }
    echo "Calculated Image Path: " . $imagePath . "\n";
}
