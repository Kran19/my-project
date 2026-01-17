<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Cart Debug ===\n\n";

// Get cart helper
$helper = app(\App\Helpers\CartHelper::class);
$cart = $helper->getCart();

echo "Cart Data:\n";
echo "Items Count: " . ($cart['items_count'] ?? 0) . "\n";
echo "Subtotal: ₹" . ($cart['subtotal'] ?? 0) . "\n";
echo "Tax Total: ₹" . ($cart['tax_total'] ?? 0) . "\n";
echo "Grand Total: ₹" . ($cart['grand_total'] ?? 0) . "\n\n";

echo "Tax Breakdown:\n";
if (!empty($cart['tax_breakdown'])) {
    foreach ($cart['tax_breakdown'] as $tax) {
        echo "  - {$tax['name']}: {$tax['rate']}% = ₹" . number_format($tax['amount'], 2) . "\n";
    }
} else {
    echo "  (No tax breakdown - empty array)\n";
}

echo "\nCart Items:\n";
if (!empty($cart['items'])) {
    foreach ($cart['items'] as $item) {
        echo "  - {$item['product_name']}\n";
        echo "    Quantity: {$item['quantity']}, Total: ₹{$item['total']}\n";
        if (isset($item['tax_rates'])) {
            echo "    Tax Rates: " . json_encode($item['tax_rates']) . "\n";
        } else {
            echo "    Tax Rates: NOT SET\n";
        }
    }
} else {
    echo "  (Cart is empty)\n";
}

echo "\n=== End Debug ===\n";
