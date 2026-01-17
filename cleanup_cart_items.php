<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Cleaning Up Orphaned Cart Items ===\n\n";

// Find cart items with missing variants
$orphanedItems = \App\Models\CartItem::whereDoesntHave('variant')->get();

echo "Found {$orphanedItems->count()} orphaned cart items\n";

if ($orphanedItems->count() > 0) {
    echo "\nDeleting orphaned items...\n";
    foreach ($orphanedItems as $item) {
        echo "  - Deleting cart item ID {$item->id} (variant_id: {$item->product_variant_id})\n";
        $item->delete();
    }
    echo "\n✅ Cleanup complete!\n";
} else {
    echo "\n✅ No orphaned items found!\n";
}

echo "\n=== Done ===\n";
