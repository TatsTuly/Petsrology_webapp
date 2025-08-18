<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodProduct;
use Illuminate\Support\Facades\Session;

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

        // Calculate total
        $total = 0;
        foreach ($cartData as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        // Add delivery fee
        $deliveryFee = 50;
        $total += $deliveryFee;

        // Here you would typically:
        // 1. Create an order record in the database
        // 2. Process payment if needed
        // 3. Send confirmation emails
        // 4. Clear the cart

        // For now, we'll just simulate success
        $orderData = [
            'order_id' => 'PF' . date('Ymd') . rand(1000, 9999),
            'customer' => $request->only(['first_name', 'last_name', 'email', 'phone']),
            'address' => $request->only(['address', 'city', 'postal_code']),
            'items' => $cartData,
            'total' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'confirmed'
        ];

        return view('checkout-success', compact('orderData'));
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
            'bkash_number' => 'required|string',
            'bkash_pin' => 'required|string|min:4',
        ]);

        // Here you would integrate with bKash API
        // For demo purposes, we'll simulate success

        $finalOrderData = [
            'order_id' => 'PF' . date('Ymd') . rand(1000, 9999),
            'customer' => $orderData['customer'],
            'address' => $orderData['address'],
            'items' => $orderData['cart'],
            'total' => $orderData['total'],
            'payment_method' => 'bkash',
            'payment_details' => [
                'bkash_number' => $request->bkash_number,
                'transaction_id' => 'BKT' . time(),
            ],
            'status' => 'confirmed'
        ];

        return view('checkout-success', ['orderData' => $finalOrderData]);
    }

    private function processNagadPayment($request, $orderData)
    {
        // Validate Nagad specific fields
        $request->validate([
            'nagad_number' => 'required|string',
            'nagad_pin' => 'required|string|min:4',
        ]);

        // Here you would integrate with Nagad API
        // For demo purposes, we'll simulate success

        $finalOrderData = [
            'order_id' => 'PF' . date('Ymd') . rand(1000, 9999),
            'customer' => $orderData['customer'],
            'address' => $orderData['address'],
            'items' => $orderData['cart'],
            'total' => $orderData['total'],
            'payment_method' => 'nagad',
            'payment_details' => [
                'nagad_number' => $request->nagad_number,
                'transaction_id' => 'NGD' . time(),
            ],
            'status' => 'confirmed'
        ];

        return view('checkout-success', ['orderData' => $finalOrderData]);
    }

    private function processCardPayment($request, $orderData)
    {
        // Validate Card specific fields
        $request->validate([
            'card_number' => 'required|string|size:16',
            'card_name' => 'required|string',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string|size:3',
        ]);

        // Here you would integrate with payment gateway
        // For demo purposes, we'll simulate success

        $finalOrderData = [
            'order_id' => 'PF' . date('Ymd') . rand(1000, 9999),
            'customer' => $orderData['customer'],
            'address' => $orderData['address'],
            'items' => $orderData['cart'],
            'total' => $orderData['total'],
            'payment_method' => 'card',
            'payment_details' => [
                'card_last_four' => substr($request->card_number, -4),
                'transaction_id' => 'CRD' . time(),
            ],
            'status' => 'confirmed'
        ];

        return view('checkout-success', ['orderData' => $finalOrderData]);
    }
}
