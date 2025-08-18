@extends('layouts.app')

@section('title', 'Order Confirmation - PETSROLOGY')

@section('styles')
    <style>
        /* Override layout styles for full-width header */
        .main-content {
            padding: 0 !important;
            margin: 0 !important;
            min-height: calc(100vh - 70px) !important;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            margin: 0 !important;
        }

        /* Enhanced Header - Full Width */
        .header {
            background: linear-gradient(135deg, #28a745 0%, #40c057 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 4px 20px rgba(40,167,69,0.2);
            position: relative;
            overflow: hidden;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            margin-top: 0 !important;
            margin-bottom: 0;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.05)"><path d="M0,50 Q250,0 500,50 T1000,50 L1000,100 L0,100 Z"/></svg>') repeat-x;
            background-size: 1000px 100px;
            animation: wave 20s linear infinite;
        }

        @keyframes wave {
            0% { background-position-x: 0; }
            100% { background-position-x: 1000px; }
        }

        .header-icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(40,167,69,0.3);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.2);
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .header-icon span {
            font-size: 2.5rem;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .header h1 {
            font-size: 2.8rem;
            margin: 0 0 10px 0;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1); 
            position: relative;
            z-index: 1;
        }

        .header p {
            font-size: 1.2rem;
            margin: 0;
            opacity: 0.95;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        /* Page Container */
        .page-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
        }

        /* Success Content */
        .success-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .order-confirmation,
        .order-details {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid rgba(40,167,69,0.1);
        }

        .order-confirmation h3,
        .order-details h3 {
            color: #28a745;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .order-id {
            background: linear-gradient(135deg, #28a745 0%, #40c057 100%);
            color: white;
            padding: 15px 25px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 25px;
        }

        .order-id-label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .order-id-number {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .confirmation-details {
            space-y: 20px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #666;
            font-weight: 600;
        }

        .detail-value {
            color: #333;
            font-weight: 500;
        }

        .status-badge {
            background: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Order Items */
        .order-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .item-image {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
            border: 1px solid #eee;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
            margin-bottom: 3px;
        }

        .item-brand {
            color: #28a745;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .item-quantity-price {
            text-align: right;
            color: #333;
        }

        .item-quantity {
            font-size: 0.85rem;
            color: #666;
            margin-bottom: 3px;
        }

        .item-price {
            font-weight: 700;
            font-size: 0.95rem;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
        }

        .btn {
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            color: white;
            text-decoration: none;
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #e9ecef;
        }

        .btn-secondary:hover {
            background: #e9ecef;
            transform: translateY(-2px);
            color: #333;
            text-decoration: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 40px 15px 30px;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }

            .page-container {
                padding: 30px 15px;
            }

            .success-content {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .order-confirmation,
            .order-details {
                padding: 25px 20px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 600px) {
            .header {
                padding: 35px 15px 25px;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
            
            .header-icon {
                width: 70px;
                height: 70px;
            }
            
            .header-icon span {
                font-size: 2rem;
            }

            .order-confirmation,
            .order-details {
                padding: 20px 15px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Enhanced Header -->
    <div class="header">        
        <div class="header-icon-container">
            <div class="header-icon">
                <span>✅</span>
            </div>
        </div>
        
        <h1>Order Confirmed!</h1>
        <p>Thank you for your purchase. Your order has been successfully placed.</p>
    </div>

    <!-- Page Container -->
    <div class="page-container">
        <div class="success-content">
            <!-- Order Confirmation -->
            <div class="order-confirmation">
                <h3>
                    <i class="fas fa-check-circle"></i>
                    Order Confirmation
                </h3>
                
                <div class="order-id">
                    <div class="order-id-label">Order ID</div>
                    <div class="order-id-number">{{ $orderData['order_id'] ?? 'PF' . date('Ymd') . rand(1000, 9999) }}</div>
                </div>

                <div class="confirmation-details">
                    <div class="detail-row">
                        <span class="detail-label">Customer:</span>
                        <span class="detail-value">{{ $orderData['customer']['first_name'] ?? '' }} {{ $orderData['customer']['last_name'] ?? '' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Email:</span>
                        <span class="detail-value">{{ $orderData['customer']['email'] ?? '' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Phone:</span>
                        <span class="detail-value">{{ $orderData['customer']['phone'] ?? '' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Delivery Address:</span>
                        <span class="detail-value">{{ $orderData['address']['address'] ?? '' }}, {{ $orderData['address']['city'] ?? '' }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Payment Method:</span>
                        <span class="detail-value">{{ ucfirst(str_replace('_', ' ', $orderData['payment_method'] ?? 'Cash on Delivery')) }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Status:</span>
                        <span class="status-badge">{{ ucfirst($orderData['status'] ?? 'Confirmed') }}</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Total Amount:</span>
                        <span class="detail-value" style="font-weight: 700; color: #28a745; font-size: 1.1rem;">৳{{ number_format($orderData['total'] ?? 0) }}</span>
                    </div>
                </div>
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h3>
                    <i class="fas fa-shopping-bag"></i>
                    Order Details
                </h3>

                <div class="order-items">
                    @if(isset($orderData['items']) && count($orderData['items']) > 0)
                        @foreach($orderData['items'] as $item)
                            <div class="order-item">
                                <div class="item-image">
                                    @if(isset($item['image']) && $item['image'])
                                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] ?? 'Product' }}">
                                    @else
                                        <div style="width: 100%; height: 100%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #999;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="item-info">
                                    <div class="item-name">{{ $item['title'] ?? 'Product Name' }}</div>
                                    <div class="item-brand">{{ $item['brand'] ?? 'Brand' }}</div>
                                </div>
                                <div class="item-quantity-price">
                                    <div class="item-quantity">Qty: {{ $item['quantity'] ?? 1 }}</div>
                                    <div class="item-price">৳{{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1)) }}</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="order-item">
                            <div class="item-info">
                                <div class="item-name">No items found</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="/shop-food" class="btn btn-primary">
                <i class="fas fa-shopping-cart"></i>
                Continue Shopping
            </a>
            <a href="/my-orders" class="btn btn-secondary">
                <i class="fas fa-list"></i>
                View My Orders
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Clear any remaining cart data
        localStorage.removeItem('petFoodCart');
        
        // Auto-redirect after 30 seconds (optional)
        // setTimeout(() => {
        //     window.location.href = '/shop-food';
        // }, 30000);

        // Print receipt functionality
        function printReceipt() {
            window.print();
        }
    </script>
@endsection
