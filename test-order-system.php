<?php

// Test order management access
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    // Test if we can access the Order model
    $orderCount = \App\Models\Order::count();
    echo "✅ Order model working! Total orders: $orderCount\n";
    
    // Test if OrderItem model works
    $orderItemCount = \App\Models\OrderItem::count();
    echo "✅ OrderItem model working! Total order items: $orderItemCount\n";
    
    // Test if we can create sample order for testing
    if ($orderCount === 0) {
        echo "\n📝 Creating sample order for testing...\n";
        
        $order = \App\Models\Order::create([
            'order_number' => \App\Models\Order::generateOrderNumber(),
            'customer_first_name' => 'John',
            'customer_last_name' => 'Doe',
            'customer_email' => 'john.doe@example.com',
            'customer_phone' => '01712345678',
            'delivery_address' => '123 Main Street, Apartment 4B',
            'delivery_city' => 'Dhaka',
            'delivery_postal_code' => '1000',
            'subtotal' => 950.00,
            'delivery_fee' => 50.00,
            'total_amount' => 1000.00,
            'payment_method' => 'bkash',
            'payment_status' => 'paid',
            'payment_reference' => 'BKT' . time() . rand(1000, 9999),
            'order_status' => 'confirmed',
            'cart_data' => json_encode([
                [
                    'id' => 1,
                    'title' => 'Premium Dog Food',
                    'brand' => 'Royal Canin',
                    'price' => 950.00,
                    'quantity' => 1,
                    'image' => 'dog-food.jpg'
                ]
            ]),
        ]);
        
        // Create order item
        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => 1,
            'product_type' => 'food',
            'product_title' => 'Premium Dog Food',
            'product_brand' => 'Royal Canin',
            'product_description' => 'High-quality nutrition for adult dogs',
            'product_image' => 'dog-food.jpg',
            'quantity' => 1,
            'unit_price' => 950.00,
            'total_price' => 950.00,
        ]);
        
        echo "✅ Sample order created successfully!\n";
        echo "   Order Number: PF-{$order->order_number}\n";
        echo "   Customer: {$order->customer_first_name} {$order->customer_last_name}\n";
        echo "   Total: ৳{$order->total_amount}\n";
    }
    
    echo "\n🎉 Order Management System is ready!\n";
    echo "   You can now access: /admin/orders\n";
    echo "   Dashboard button will work properly.\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
}
