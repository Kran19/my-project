<?php

// Quick diagnostic script to check tax setup
// Run with: php check_tax_setup.php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== Tax Setup Diagnostic ===\n\n";

// Check tax classes
$taxClasses = \App\Models\TaxClass::with('rates')->get();
echo "Tax Classes: " . $taxClasses->count() . "\n";
foreach ($taxClasses as $class) {
    echo "  - {$class->name} (ID: {$class->id})\n";
    foreach ($class->rates as $rate) {
        echo "    * {$rate->name}: {$rate->rate}% " . ($rate->is_active ? '(active)' : '(inactive)') . "\n";
    }
}

echo "\n";

// Check products with tax classes
$productsWithTax = \App\Models\Product::whereNotNull('tax_class_id')->count();
$totalProducts = \App\Models\Product::count();
echo "Products with tax class: {$productsWithTax} / {$totalProducts}\n";

// Sample a few products
$sampleProducts = \App\Models\Product::with('taxClass.rates')->limit(5)->get();
echo "\nSample Products:\n";
foreach ($sampleProducts as $product) {
    $taxInfo = $product->taxClass ? "{$product->taxClass->name}" : "NO TAX CLASS";
    echo "  - {$product->name} => {$taxInfo}\n";
}

echo "\n=== End Diagnostic ===\n";
