<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Customer\CustomerApiAuthController;
use App\Http\Controllers\Api\Customer\ProductController;

Route::prefix('customer')->group(function () {
    // Public routes
    Route::post('login', [CustomerApiAuthController::class, 'login']);
    Route::post('register', [CustomerApiAuthController::class, 'register']);

    // Public product routes (no authentication required)
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/featured-collections', [ProductController::class, 'featuredCollections']);

        // IMPORTANT: Put slug route at the bottom to avoid conflicts
        Route::get('/{productId}/related', [ProductController::class, 'relatedProducts']);
        Route::get('/{slug}', [ProductController::class, 'show']); // Move to bottom
    });

    // Protected routes (require authentication)
    Route::middleware('customer.api')->group(function () {
        Route::get('profile', fn () => ['message' => 'Customer Profile']);
        Route::post('logout', [CustomerApiAuthController::class, 'logout']);
        // Add more protected routes here
    });
});
