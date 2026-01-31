<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $review = new Review();
            $review->product_id = $product->id;
            // $review->user_id = auth()->id(); // Not in fillable, maybe not in table?
            $review->user_name = $request->name;
             // $review->email = $request->email; // Not in fillable
            $review->rating = $request->rating;
            $review->review = $request->comment;
            $review->status = 0; // Default status false/pending
            $review->save();

            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your review has been submitted for approval.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit review. Please try again later.'
            ], 500);
        }
    }
}
