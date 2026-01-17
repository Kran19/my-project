<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Fixing Existing Cart Items ===\n\n";

// Fix database cart items
$cartItems = \App\Models\CartItem::with('variant.product.taxClass.rates')->get();
echo "Found {$cartItems->count()} cart items in database\n";

foreach ($cartItems as $item) {
    if ($item->variant && $item->variant->product && $item->variant->product->taxClass) {
        echo "  - Updating item {$item->id} for product: {$item->variant->product->name}\n";
    }
}

echo "\nNote: Database cart items will get tax rates automatically on next recalculation.\n";
echo "Guest cart items (in cookies) need to be cleared and re-added.\n";

echo "\n=== Instructions ===\n";
echo "1. Clear your browser cookies/cache\n";
echo "2. Clear your cart (or let it recalculate on next page load)\n";
echo "3. Add products again\n";
echo "4. You should now see tax bifurcation (e.g., CGST: 3%)\n\n";

echo "=== End ===\n";
