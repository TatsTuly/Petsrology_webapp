<?php

// Test script to check database table structure
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    // Check if orders table exists
    if (\Illuminate\Support\Facades\Schema::hasTable('orders')) {
        echo "✅ Orders table exists!\n";
        
        // Get table columns
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('orders');
        echo "Orders table columns:\n";
        foreach ($columns as $column) {
            echo "  - $column\n";
        }
        echo "\n";
    } else {
        echo "❌ Orders table does not exist.\n";
    }
    
    // Check if order_items table exists
    if (\Illuminate\Support\Facades\Schema::hasTable('order_items')) {
        echo "✅ Order items table exists!\n";
        
        // Get table columns
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('order_items');
        echo "Order items table columns:\n";
        foreach ($columns as $column) {
            echo "  - $column\n";
        }
    } else {
        echo "❌ Order items table does not exist.\n";
    }
    
    // Test Order model
    echo "\nTesting Order model...\n";
    $orderCount = \App\Models\Order::count();
    echo "Total orders in database: $orderCount\n";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
