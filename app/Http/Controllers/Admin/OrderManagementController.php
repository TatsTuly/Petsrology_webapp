<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
    /**
     * Display all orders
     */
    public function index(Request $request)
    {
        $query = Order::with('orderItems')->orderBy('created_at', 'desc');

        // Filter by order status
        if ($request->has('status') && $request->status !== '') {
            $query->where('order_status', $request->status);
        }

        // Filter by payment status
        if ($request->has('payment_status') && $request->payment_status !== '') {
            $query->where('payment_status', $request->payment_status);
        }

        // Filter by payment method
        if ($request->has('payment_method') && $request->payment_method !== '') {
            $query->where('payment_method', $request->payment_method);
        }

        // Search by customer name or email
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('customer_first_name', 'like', "%{$search}%")
                  ->orWhere('customer_last_name', 'like', "%{$search}%")
                  ->orWhere('customer_email', 'like', "%{$search}%")
                  ->orWhere('order_number', 'like', "%{$search}%");
            });
        }

        $orders = $query->paginate(20);

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show order details
     */
    public function show($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'order_status' => 'required|in:pending,confirmed,processing,shipped,delivered,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['order_status' => $request->order_status]);

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }

    /**
     * Update payment status
     */
    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,paid,failed,refunded'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['payment_status' => $request->payment_status]);

        return redirect()->back()->with('success', 'Payment status updated successfully!');
    }

    /**
     * Delete order
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully!');
    }

    /**
     * Order statistics for dashboard
     */
    public function stats()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('order_status', 'pending')->count();
        $confirmedOrders = Order::where('order_status', 'confirmed')->count();
        $deliveredOrders = Order::where('order_status', 'delivered')->count();
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total_amount');
        $recentOrders = Order::with('orderItems')->orderBy('created_at', 'desc')->limit(5)->get();

        return [
            'total_orders' => $totalOrders,
            'pending_orders' => $pendingOrders,
            'confirmed_orders' => $confirmedOrders,
            'delivered_orders' => $deliveredOrders,
            'total_revenue' => $totalRevenue,
            'recent_orders' => $recentOrders,
        ];
    }
}
