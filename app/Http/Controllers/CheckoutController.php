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
}
