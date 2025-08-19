<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodProduct;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // The cart data will be handled by JavaScript on the frontend
        // This ensures the page loads even if no server-side cart data exists
        return view('checkout');
    }

    public function process(Request $request)
    {
        // Validate the checkout form
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'payment_method' => 'required|in:cash_on_delivery,bkash,nagad,card',
            'cart_data' => 'required|json',
        ]);

        // Decode cart data
        $cartData = json_decode($request->cart_data, true);
        
        if (empty($cartData)) {
            return redirect()->route('shop.food')->with('error', 'Your cart is empty!');
        }

        try {
            // Start database transaction
            DB::beginTransaction();

            // Calculate totals
            $subtotal = 0;
            foreach ($cartData as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            
            $deliveryFee = 50;
            $total = $subtotal + $deliveryFee;

            // Create order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'customer_first_name' => $request->first_name,
                'customer_last_name' => $request->last_name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'delivery_address' => $request->address,
                'delivery_city' => $request->city,
                'delivery_postal_code' => $request->postal_code,
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total_amount' => $total,
                'payment_method' => $request->payment_method,
                'payment_status' => $request->payment_method === 'cash_on_delivery' ? 'pending' : 'pending',
                'order_status' => 'pending',
                'cart_data' => $cartData,
            ]);

            // Create order items
            foreach ($cartData as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_type' => 'food', // Assuming all items are food products
                    'product_title' => $item['title'],
                    'product_brand' => $item['brand'] ?? 'Unknown Brand',
                    'product_description' => $item['description'] ?? '',
                    'product_image' => $item['image'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);
            }

            // Update order status for cash on delivery
            if ($request->payment_method === 'cash_on_delivery') {
                $order->update(['order_status' => 'confirmed']);
            }

            // Commit transaction
            DB::commit();

            // Prepare order data for success page
            $orderData = [
                'order_id' => $order->formatted_order_number,
                'order_number' => $order->order_number,
                'customer' => [
                    'first_name' => $order->customer_first_name,
                    'last_name' => $order->customer_last_name,
                    'email' => $order->customer_email,
                    'phone' => $order->customer_phone,
                ],
                'address' => [
                    'address' => $order->delivery_address,
                    'city' => $order->delivery_city,
                    'postal_code' => $order->delivery_postal_code,
                ],
                'items' => $cartData,
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total' => $total,
                'payment_method' => $order->payment_method,
                'order_status' => $order->order_status,
                'payment_status' => $order->payment_status,
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            ];

            return view('checkout-success', compact('orderData'));

        } catch (\Exception $e) {
            // Rollback transaction
            DB::rollback();
            
            // Log error
            Log::error('Order creation failed: ' . $e->getMessage());
            
            return redirect()->back()
                ->withErrors(['error' => 'Failed to process order. Please try again.'])
                ->withInput();
        }
    }

    public function bkashPayment()
    {
        return view('payment.bkash');
    }

    public function nagadPayment()
    {
        return view('payment.nagad');
    }

    public function cardPayment()
    {
        return view('payment.card');
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|in:bkash,nagad,card',
            'order_data' => 'required|json',
        ]);

        $orderData = json_decode($request->order_data, true);
        
        // Process payment based on method
        switch($request->payment_method) {
            case 'bkash':
                return $this->processBkashPayment($request, $orderData);
            case 'nagad':
                return $this->processNagadPayment($request, $orderData);
            case 'card':
                return $this->processCardPayment($request, $orderData);
        }
    }

    private function processBkashPayment($request, $orderData)
    {
        // Validate bKash specific fields
        $request->validate([
            'bkash_number' => 'required|string|min:10|max:11',
            'bkash_pin' => 'required|string|size:4',
        ]);

        try {
            DB::beginTransaction();

            // Calculate totals
            $subtotal = 0;
            foreach ($orderData['cart'] as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            
            $deliveryFee = 50;
            $total = $subtotal + $deliveryFee;

            // Create order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'customer_first_name' => $orderData['customer']['first_name'],
                'customer_last_name' => $orderData['customer']['last_name'],
                'customer_email' => $orderData['customer']['email'],
                'customer_phone' => $orderData['customer']['phone'],
                'delivery_address' => $orderData['address']['address'],
                'delivery_city' => $orderData['address']['city'],
                'delivery_postal_code' => $orderData['address']['postal_code'],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total_amount' => $total,
                'payment_method' => 'bkash',
                'payment_status' => 'paid', // Assuming payment is successful
                'payment_reference' => 'BKT' . time() . rand(1000, 9999),
                'order_status' => 'confirmed',
                'cart_data' => $orderData['cart'],
            ]);

            // Create order items
            foreach ($orderData['cart'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_type' => 'food',
                    'product_title' => $item['title'],
                    'product_brand' => $item['brand'] ?? 'Unknown Brand',
                    'product_description' => $item['description'] ?? '',
                    'product_image' => $item['image'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            // Return JSON response for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Order confirmed successfully!',
                    'order_number' => $order->formatted_order_number,
                    'payment_reference' => $order->payment_reference,
                    'total_amount' => $total,
                    'redirect_url' => route('checkout.success', ['order' => $order->order_number])
                ]);
            }

            // Prepare final order data for regular requests
            $finalOrderData = [
                'order_id' => $order->formatted_order_number,
                'order_number' => $order->order_number,
                'customer' => $orderData['customer'],
                'address' => $orderData['address'],
                'items' => $orderData['cart'],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total' => $total,
                'payment_method' => 'bkash',
                'payment_reference' => $order->payment_reference,
                'order_status' => $order->order_status,
                'payment_status' => $order->payment_status,
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            ];

            return view('checkout-success', ['orderData' => $finalOrderData]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('bKash payment failed: ' . $e->getMessage());
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment processing failed. Please try again. Error: ' . $e->getMessage()
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors(['error' => 'Payment processing failed. Please try again.'])
                ->withInput();
        }
    }

    private function processNagadPayment($request, $orderData)
    {
        // Validate Nagad specific fields
        $request->validate([
            'nagad_number' => 'required|string|min:10|max:11',
            'nagad_pin' => 'required|string|size:4',
        ]);

        try {
            DB::beginTransaction();

            // Calculate totals
            $subtotal = 0;
            foreach ($orderData['cart'] as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            
            $deliveryFee = 50;
            $total = $subtotal + $deliveryFee;

            // Create order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'customer_first_name' => $orderData['customer']['first_name'],
                'customer_last_name' => $orderData['customer']['last_name'],
                'customer_email' => $orderData['customer']['email'],
                'customer_phone' => $orderData['customer']['phone'],
                'delivery_address' => $orderData['address']['address'],
                'delivery_city' => $orderData['address']['city'],
                'delivery_postal_code' => $orderData['address']['postal_code'],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total_amount' => $total,
                'payment_method' => 'nagad',
                'payment_status' => 'paid',
                'payment_reference' => 'NGD' . time() . rand(1000, 9999),
                'order_status' => 'confirmed',
                'cart_data' => $orderData['cart'],
            ]);

            // Create order items
            foreach ($orderData['cart'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_type' => 'food',
                    'product_title' => $item['title'],
                    'product_brand' => $item['brand'] ?? 'Unknown Brand',
                    'product_description' => $item['description'] ?? '',
                    'product_image' => $item['image'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            // Return JSON response for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Order confirmed successfully!',
                    'order_number' => $order->formatted_order_number,
                    'payment_reference' => $order->payment_reference,
                    'total_amount' => $total,
                    'redirect_url' => route('checkout.success', ['order' => $order->order_number])
                ]);
            }

            // Prepare final order data for regular requests
            $finalOrderData = [
                'order_id' => $order->formatted_order_number,
                'order_number' => $order->order_number,
                'customer' => $orderData['customer'],
                'address' => $orderData['address'],
                'items' => $orderData['cart'],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total' => $total,
                'payment_method' => 'nagad',
                'payment_reference' => $order->payment_reference,
                'order_status' => $order->order_status,
                'payment_status' => $order->payment_status,
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            ];

            return view('checkout-success', ['orderData' => $finalOrderData]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Nagad payment failed: ' . $e->getMessage());
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment processing failed. Please try again.'
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors(['error' => 'Payment processing failed. Please try again.'])
                ->withInput();
        }
    }

    private function processCardPayment($request, $orderData)
    {
        // Validate Card specific fields
        $request->validate([
            'card_number' => 'required|string|min:13|max:19',
            'card_holder' => 'required|string|max:255',
            'expiry_month' => 'required|string|size:2',
            'expiry_year' => 'required|string|size:2',
            'cvv' => 'required|string|min:3|max:4',
        ]);

        try {
            DB::beginTransaction();

            // Calculate totals
            $subtotal = 0;
            foreach ($orderData['cart'] as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            
            $deliveryFee = 50;
            $total = $subtotal + $deliveryFee;

            // Create order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'customer_first_name' => $orderData['customer']['first_name'],
                'customer_last_name' => $orderData['customer']['last_name'],
                'customer_email' => $orderData['customer']['email'],
                'customer_phone' => $orderData['customer']['phone'],
                'delivery_address' => $orderData['address']['address'],
                'delivery_city' => $orderData['address']['city'],
                'delivery_postal_code' => $orderData['address']['postal_code'],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total_amount' => $total,
                'payment_method' => 'card',
                'payment_status' => 'paid',
                'payment_reference' => 'CRD' . time() . rand(1000, 9999),
                'order_status' => 'confirmed',
                'cart_data' => $orderData['cart'],
            ]);

            // Create order items
            foreach ($orderData['cart'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_type' => 'food',
                    'product_title' => $item['title'],
                    'product_brand' => $item['brand'] ?? 'Unknown Brand',
                    'product_description' => $item['description'] ?? '',
                    'product_image' => $item['image'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'total_price' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            // Return JSON response for AJAX requests
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Order confirmed successfully!',
                    'order_number' => $order->formatted_order_number,
                    'payment_reference' => $order->payment_reference,
                    'total_amount' => $total,
                    'redirect_url' => route('checkout.success', ['order' => $order->order_number])
                ]);
            }

            // Prepare final order data for regular requests
            $finalOrderData = [
                'order_id' => $order->formatted_order_number,
                'order_number' => $order->order_number,
                'customer' => $orderData['customer'],
                'address' => $orderData['address'],
                'items' => $orderData['cart'],
                'subtotal' => $subtotal,
                'delivery_fee' => $deliveryFee,
                'total' => $total,
                'payment_method' => 'card',
                'payment_reference' => $order->payment_reference,
                'order_status' => $order->order_status,
                'payment_status' => $order->payment_status,
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            ];

            return view('checkout-success', ['orderData' => $finalOrderData]);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Card payment failed: ' . $e->getMessage());
            
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment processing failed. Please try again.'
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors(['error' => 'Payment processing failed. Please try again.'])
                ->withInput();
        }
    }

    public function success($orderNumber)
    {
        // Find the order by order number
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        
        // Prepare order data for the view
        $orderData = [
            'order_id' => $order->formatted_order_number,
            'order_number' => $order->order_number,
            'customer' => [
                'first_name' => $order->customer_first_name,
                'last_name' => $order->customer_last_name,
                'email' => $order->customer_email,
                'phone' => $order->customer_phone,
            ],
            'address' => [
                'address' => $order->delivery_address,
                'city' => $order->delivery_city,
                'postal_code' => $order->delivery_postal_code,
            ],
            'items' => $order->cart_data,
            'subtotal' => $order->subtotal,
            'delivery_fee' => $order->delivery_fee,
            'total' => $order->total_amount,
            'payment_method' => $order->payment_method,
            'payment_reference' => $order->payment_reference,
            'order_status' => $order->order_status,
            'payment_status' => $order->payment_status,
            'created_at' => $order->created_at->format('Y-m-d H:i:s'),
        ];

        return view('checkout-success', compact('orderData'));
    }
}
