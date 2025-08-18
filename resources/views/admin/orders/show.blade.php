@extends('layouts.app')

@section('title', 'Order Details - PETSROLOGY Admin')

@section('styles')
<style>
    .admin-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .order-header {
        background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        color: white;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .order-header h1 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
    }

    .back-btn {
        background: rgba(255,255,255,0.2);
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .back-btn:hover {
        background: rgba(255,255,255,0.3);
        color: white;
        text-decoration: none;
    }

    .order-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
        margin-bottom: 30px;
    }

    .order-details-card,
    .status-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .card-header {
        background: #f8f9fa;
        padding: 20px;
        border-bottom: 1px solid #e9ecef;
    }

    .card-header h3 {
        margin: 0;
        color: #333;
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card-body {
        padding: 25px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
        margin-bottom: 25px;
    }

    .info-section h4 {
        color: #ff6f61;
        margin-bottom: 15px;
        font-size: 1.1rem;
        font-weight: 600;
    }

    .info-item {
        margin-bottom: 12px;
    }

    .info-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .info-value {
        color: #666;
        line-height: 1.4;
    }

    .order-items {
        margin-top: 25px;
    }

    .items-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
    }

    .items-table th,
    .items-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
    }

    .items-table th {
        background: #f8f9fa;
        font-weight: 600;
        color: #333;
    }

    .item-image {
        width: 50px;
        height: 50px;
        border-radius: 8px;
        object-fit: cover;
    }

    .item-details {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .item-info h5 {
        margin: 0 0 5px 0;
        font-size: 0.95rem;
        font-weight: 600;
    }

    .item-brand {
        color: #ff6f61;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .order-totals {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .total-row.final {
        font-weight: 700;
        font-size: 1.1rem;
        color: #ff6f61;
        border-top: 2px solid #e9ecef;
        padding-top: 15px;
        margin-top: 15px;
    }

    .status-badge {
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: capitalize;
        margin-bottom: 15px;
        display: inline-block;
    }

    .status-pending { background: #fff3cd; color: #856404; }
    .status-confirmed { background: #d4edda; color: #155724; }
    .status-processing { background: #d1ecf1; color: #0c5460; }
    .status-shipped { background: #e2e3e5; color: #41464b; }
    .status-delivered { background: #d4edda; color: #155724; }
    .status-cancelled { background: #f8d7da; color: #721c24; }

    .payment-pending { background: #fff3cd; color: #856404; }
    .payment-paid { background: #d4edda; color: #155724; }
    .payment-failed { background: #f8d7da; color: #721c24; }
    .payment-refunded { background: #e2e3e5; color: #41464b; }

    .update-form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
        color: #333;
    }

    .form-group select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 0.95rem;
    }

    .form-group select:focus {
        outline: none;
        border-color: #ff6f61;
    }

    .update-btn {
        background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.3s ease;
        width: 100%;
    }

    .update-btn:hover {
        transform: translateY(-2px);
    }

    .alert {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    @media (max-width: 968px) {
        .order-grid {
            grid-template-columns: 1fr;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .items-table {
            font-size: 0.9rem;
        }

        .item-details {
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endsection

@section('content')
<div class="admin-container">
    <!-- Header -->
    <div class="order-header">
        <h1><i class="fas fa-receipt"></i> Order #PF-{{ $order->order_number }}</h1>
        <a href="{{ route('admin.orders.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Orders
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="order-grid">
        <!-- Order Details -->
        <div class="order-details-card">
            <div class="card-header">
                <h3><i class="fas fa-info-circle"></i> Order Information</h3>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <!-- Customer Information -->
                    <div class="info-section">
                        <h4><i class="fas fa-user"></i> Customer Details</h4>
                        <div class="info-item">
                            <div class="info-label">Full Name</div>
                            <div class="info-value">{{ $order->customer_full_name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $order->customer_email }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Phone</div>
                            <div class="info-value">{{ $order->customer_phone }}</div>
                        </div>
                    </div>

                    <!-- Delivery Information -->
                    <div class="info-section">
                        <h4><i class="fas fa-map-marker-alt"></i> Delivery Address</h4>
                        <div class="info-item">
                            <div class="info-label">Address</div>
                            <div class="info-value">{{ $order->delivery_address }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">City</div>
                            <div class="info-value">{{ $order->delivery_city }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Postal Code</div>
                            <div class="info-value">{{ $order->delivery_postal_code }}</div>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="order-items">
                    <h4><i class="fas fa-shopping-bag"></i> Order Items</h4>
                    <table class="items-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td>
                                        <div class="item-details">
                                            @if($item->product_image)
                                                <img src="{{ $item->product_image }}" alt="{{ $item->product_title }}" class="item-image">
                                            @else
                                                <div class="item-image" style="background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fas fa-image" style="color: #ccc;"></i>
                                                </div>
                                            @endif
                                            <div class="item-info">
                                                <h5>{{ $item->product_title }}</h5>
                                                <div class="item-brand">{{ $item->product_brand }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>৳{{ number_format($item->unit_price, 2) }}</td>
                                    <td>৳{{ number_format($item->total_price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Order Totals -->
                    <div class="order-totals">
                        <div class="total-row">
                            <span>Subtotal:</span>
                            <span>৳{{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        <div class="total-row">
                            <span>Delivery Fee:</span>
                            <span>৳{{ number_format($order->delivery_fee, 2) }}</span>
                        </div>
                        <div class="total-row final">
                            <span>Total Amount:</span>
                            <span>৳{{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Management -->
        <div class="status-card">
            <div class="card-header">
                <h3><i class="fas fa-cog"></i> Order Status</h3>
            </div>
            <div class="card-body">
                <!-- Current Status -->
                <div style="margin-bottom: 25px;">
                    <h4>Current Order Status</h4>
                    <span class="status-badge status-{{ $order->order_status }}">
                        {{ ucfirst($order->order_status) }}
                    </span>
                </div>

                <div style="margin-bottom: 25px;">
                    <h4>Payment Status</h4>
                    <span class="status-badge payment-{{ $order->payment_status }}">
                        {{ ucfirst($order->payment_status) }}
                    </span>
                </div>

                <!-- Update Order Status -->
                <form method="POST" action="{{ route('admin.orders.update-status', $order->id) }}" class="update-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="order_status">Update Order Status</label>
                        <select id="order_status" name="order_status">
                            <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $order->order_status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="processing" {{ $order->order_status === 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ $order->order_status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->order_status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $order->order_status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="update-btn">
                        <i class="fas fa-save"></i> Update Status
                    </button>
                </form>

                <!-- Update Payment Status -->
                <form method="POST" action="{{ route('admin.orders.update-payment-status', $order->id) }}" class="update-form">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="payment_status">Update Payment Status</label>
                        <select id="payment_status" name="payment_status">
                            <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="failed" {{ $order->payment_status === 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>
                    <button type="submit" class="update-btn">
                        <i class="fas fa-credit-card"></i> Update Payment
                    </button>
                </form>

                <!-- Order Information -->
                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e9ecef;">
                    <h4>Order Details</h4>
                    <div class="info-item">
                        <div class="info-label">Payment Method</div>
                        <div class="info-value">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</div>
                    </div>
                    @if($order->payment_reference)
                        <div class="info-item">
                            <div class="info-label">Payment Reference</div>
                            <div class="info-value">{{ $order->payment_reference }}</div>
                        </div>
                    @endif
                    <div class="info-item">
                        <div class="info-label">Order Date</div>
                        <div class="info-value">{{ $order->created_at->format('M d, Y h:i A') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
