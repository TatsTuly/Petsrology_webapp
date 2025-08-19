@extends('layouts.app')

@section('title', 'Checkout - PETSROLOGY')

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
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 4px 20px rgba(255,111,97,0.2);
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
            width: 70px;
            height: 70px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.2);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .header-icon span {
            font-size: 2.2rem;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .header h1 {
            font-size: 2.5rem;
            margin: 0 0 10px 0;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1); 
            position: relative;
            z-index: 1;
        }

        .header p {
            font-size: 1.1rem;
            margin: 0;
            opacity: 0.95;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.15);
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .back-btn:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            color: white;
            text-decoration: none;
        }

        /* Page Container */
        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
        }

        /* Checkout Layout */
        .checkout-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 40px;
            margin-bottom: 40px;
        }

        /* Order Summary Card */
        .order-summary {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid rgba(255,111,97,0.1);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .order-summary h3 {
            color: #ff6f61;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

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
            width: 60px;
            height: 60px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            border: 1px solid #eee;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
            margin-bottom: 5px;
            line-height: 1.3;
        }

        .item-brand {
            color: #ff6f61;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .item-quantity-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-quantity {
            font-size: 0.9rem;
            color: #666;
        }

        .item-price {
            font-weight: 700;
            color: #333;
            font-size: 1rem;
        }

        .order-totals {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px solid #f8f9fa;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            font-size: 0.95rem;
        }

        .total-row.final {
            font-size: 1.2rem;
            font-weight: 700;
            color: #ff6f61;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 2px solid #ff6f61;
        }

        /* Checkout Form */
        .checkout-form {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid rgba(255,111,97,0.1);
        }

        .form-section {
            margin-bottom: 35px;
        }

        .form-section h3 {
            color: #ff6f61;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff6f61;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Payment Methods */
        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .payment-option {
            position: relative;
        }

        .payment-option input[type="radio"] {
            display: none;
        }

        .payment-label {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #fff;
            gap: 12px;
        }

        .payment-option input[type="radio"]:checked + .payment-label {
            border-color: #ff6f61;
            background: rgba(255,111,97,0.05);
            color: #ff6f61;
        }

        .payment-icon {
            font-size: 1.5rem;
            width: 30px;
            text-align: center;
        }

        .payment-info {
            flex: 1;
        }

        .payment-name {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 2px;
        }

        .payment-desc {
            font-size: 0.8rem;
            color: #666;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 18px 30px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 30px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255,111,97,0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .checkout-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .order-summary {
                position: static;
                order: -1;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 40px 15px 30px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 10px 15px;
                font-size: 0.85rem;
            }

            .page-container {
                padding: 30px 15px;
            }

            .checkout-form,
            .order-summary {
                padding: 25px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .payment-methods {
                grid-template-columns: 1fr;
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
                width: 60px;
                height: 60px;
            }
            
            .header-icon span {
                font-size: 1.8rem;
            }

            .checkout-form,
            .order-summary {
                padding: 20px 15px;
            }
        }

        /* Loading State */
        .submit-btn.loading {
            background: #ccc;
            cursor: not-allowed;
        }

        .submit-btn.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid #fff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Order Confirmation Popup */
        .confirmation-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            z-index: 3000;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            align-items: center;
            justify-content: center;
        }

        .confirmation-popup.show {
            display: flex;
            opacity: 1;
        }

        .popup-content {
            background: white;
            width: 90%;
            max-width: 500px;
            border-radius: 20px;
            overflow: hidden;
            transform: translateY(50px);
            transition: transform 0.3s ease;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .confirmation-popup.show .popup-content {
            transform: translateY(0);
        }

        .popup-header {
            background: linear-gradient(135deg, #28a745 0%, #40c057 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .popup-icon {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 2.5rem;
            animation: bounce 1.5s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .popup-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .popup-message {
            font-size: 1rem;
            opacity: 0.9;
        }

        .popup-body {
            padding: 30px;
            text-align: center;
        }

        .popup-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 25px;
        }

        .popup-btn {
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .popup-btn-primary {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
        }

        .popup-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            color: white;
            text-decoration: none;
        }

        .popup-btn-secondary {
            background: #f8f9fa;
            color: #333;
            border: 2px solid #e9ecef;
        }

        .popup-btn-secondary:hover {
            background: #e9ecef;
            transform: translateY(-2px);
            color: #333;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <!-- Enhanced Header with Back Button -->
    <div class="header">
        <a href="javascript:history.back()" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Shop
        </a>
        
        <div class="header-icon-container">
            <div class="header-icon">
                <span>🛒</span>
            </div>
        </div>
        
        <h1>Checkout</h1>
        <p>Complete your order and get your pet food delivered</p>
    </div>

    <!-- Page Container -->
    <div class="page-container">
        <div class="checkout-container">
            <!-- Checkout Form -->
            <div class="checkout-form">
                <form id="checkoutForm" method="POST" action="{{ route('checkout.process') }}">
                    @csrf
                    
                    <!-- Customer Information -->
                    <div class="form-section">
                        <h3>
                            <i class="fas fa-user"></i>
                            Customer Information
                        </h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="first_name">First Name *</label>
                                <input type="text" id="first_name" name="first_name" required value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" required value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required value="{{ old('email') }}">
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Address -->
                    <div class="form-section">
                        <h3>
                            <i class="fas fa-map-marker-alt"></i>
                            Delivery Address
                        </h3>
                        <div class="form-grid">
                            <div class="form-group full-width">
                                <label for="address">Address *</label>
                                <textarea id="address" name="address" required placeholder="House/Flat no, Road, Area">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city">City *</label>
                                <input type="text" id="city" name="city" required value="{{ old('city') }}">
                                @error('city')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Postal Code *</label>
                                <input type="text" id="postal_code" name="postal_code" required value="{{ old('postal_code') }}">
                                @error('postal_code')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="form-section">
                        <h3>
                            <i class="fas fa-credit-card"></i>
                            Payment Method
                        </h3>
                        <div class="payment-methods">
                            <div class="payment-option">
                                <input type="radio" id="cash_on_delivery" name="payment_method" value="cash_on_delivery" checked>
                                <label for="cash_on_delivery" class="payment-label">
                                    <div class="payment-icon">💵</div>
                                    <div class="payment-info">
                                        <div class="payment-name">Cash on Delivery</div>
                                        <div class="payment-desc">Pay when you receive</div>
                                    </div>
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="bkash" name="payment_method" value="bkash">
                                <label for="bkash" class="payment-label">
                                    <div class="payment-icon">📱</div>
                                    <div class="payment-info">
                                        <div class="payment-name">bKash</div>
                                        <div class="payment-desc">Mobile banking</div>
                                    </div>
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="nagad" name="payment_method" value="nagad">
                                <label for="nagad" class="payment-label">
                                    <div class="payment-icon">💳</div>
                                    <div class="payment-info">
                                        <div class="payment-name">Nagad</div>
                                        <div class="payment-desc">Mobile banking</div>
                                    </div>
                                </label>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="card" name="payment_method" value="card">
                                <label for="card" class="payment-label">
                                    <div class="payment-icon">💳</div>
                                    <div class="payment-info">
                                        <div class="payment-name">Credit/Debit Card</div>
                                        <div class="payment-desc">Visa, Mastercard</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        @error('payment_method')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-shopping-bag"></i>
                        <span id="submitBtnText">Complete Order</span>
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <h3>
                    <i class="fas fa-receipt"></i>
                    Order Summary
                </h3>
                <div id="orderItems">
                    <!-- Order items will be populated by JavaScript -->
                </div>
                <div class="order-totals">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span id="subtotal">৳0</span>
                    </div>
                    <div class="total-row">
                        <span>Delivery:</span>
                        <span id="delivery">৳50</span>
                    </div>
                    <div class="total-row final">
                        <span>Total:</span>
                        <span id="total">৳50</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Confirmation Popup -->
    <div class="confirmation-popup" id="confirmationPopup">
        <div class="popup-content">
            <div class="popup-header">
                <div class="popup-icon">
                    <span>✅</span>
                </div>
                <div class="popup-title">Order Confirmed!</div>
                <div class="popup-message">Your order has been successfully placed</div>
            </div>
            <div class="popup-body">
                <p>Thank you for your purchase! Your order is being processed and you will receive a confirmation email shortly.</p>
                <div class="popup-actions">
                    <a href="/shop-food" class="popup-btn popup-btn-primary">
                        <i class="fas fa-shopping-cart"></i>
                        Continue Shopping
                    </a>
                    <a href="#" class="popup-btn popup-btn-secondary" onclick="closeConfirmationPopup()">
                        <i class="fas fa-times"></i>
                        Close
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Get cart data from localStorage or sessionStorage
        let cart = JSON.parse(localStorage.getItem('petFoodCart')) || 
                   JSON.parse(sessionStorage.getItem('checkoutCart')) || [];
        const deliveryFee = 50;

        // Initialize checkout page
        document.addEventListener('DOMContentLoaded', function() {
            if (cart.length === 0) {
                // Redirect to shop if cart is empty
                alert('Your cart is empty! Redirecting to shop...');
                window.location.href = '/shop-food';
                return;
            }
            
            displayOrderSummary();
            
            // Form submission
            document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                e.preventDefault();
                processCheckout();
            });

            // Update button text based on payment method selection
            const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
            paymentMethods.forEach(method => {
                method.addEventListener('change', updateSubmitButton);
            });

            // Initialize button text
            updateSubmitButton();
        });

        function displayOrderSummary() {
            const orderItemsContainer = document.getElementById('orderItems');
            let subtotal = 0;

            // Display each cart item
            orderItemsContainer.innerHTML = cart.map(item => {
                const itemTotal = item.price * item.quantity;
                subtotal += itemTotal;

                return `
                    <div class="order-item">
                        <div class="item-image">
                            ${item.image ? 
                                `<img src="${item.image}" alt="${item.title}">` : 
                                `<div style="width: 100%; height: 100%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #999;">
                                    <i class="fas fa-image"></i>
                                </div>`
                            }
                        </div>
                        <div class="item-details">
                            <div class="item-name">${item.title}</div>
                            <div class="item-brand">${item.brand}</div>
                            <div class="item-quantity-price">
                                <span class="item-quantity">Qty: ${item.quantity}</span>
                                <span class="item-price">৳${itemTotal.toLocaleString()}</span>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            // Update totals
            const total = subtotal + deliveryFee;
            document.getElementById('subtotal').textContent = `৳${subtotal.toLocaleString()}`;
            document.getElementById('total').textContent = `৳${total.toLocaleString()}`;
        }

        function updateSubmitButton() {
            const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            const submitBtnText = document.getElementById('submitBtnText');
            const submitBtn = document.getElementById('submitBtn');

            switch(selectedPaymentMethod) {
                case 'cash_on_delivery':
                    submitBtnText.innerHTML = 'Complete Order';
                    submitBtn.style.background = 'linear-gradient(135deg, #ff6f61 0%, #ff9472 100%)';
                    break;
                case 'bkash':
                    submitBtnText.innerHTML = 'Pay with bKash';
                    submitBtn.style.background = 'linear-gradient(135deg, #e2136e 0%, #ff69b4 100%)';
                    break;
                case 'nagad':
                    submitBtnText.innerHTML = 'Pay with Nagad';
                    submitBtn.style.background = 'linear-gradient(135deg, #eb5b2c 0%, #ff6f4a 100%)';
                    break;
                case 'card':
                    submitBtnText.innerHTML = 'Pay with Card';
                    submitBtn.style.background = 'linear-gradient(135deg, #4a90e2 0%, #357abd 100%)';
                    break;
            }
        }

        function processCheckout() {
            const form = document.getElementById('checkoutForm');
            const submitBtn = document.getElementById('submitBtn');
            
            // Get selected payment method
            const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
            
            // Validate form
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Show loading state
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;

            // Prepare order data
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) + deliveryFee;
            const orderData = {
                cart: cart,
                customer: {
                    first_name: document.getElementById('first_name').value,
                    last_name: document.getElementById('last_name').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                },
                address: {
                    address: document.getElementById('address').value,
                    city: document.getElementById('city').value,
                    postal_code: document.getElementById('postal_code').value,
                },
                payment_method: paymentMethod,
                total: total
            };

            // Store order data for payment page
            sessionStorage.setItem('orderData', JSON.stringify(orderData));

            // Redirect to appropriate payment page based on payment method
            setTimeout(() => {
                switch(paymentMethod) {
                    case 'cash_on_delivery':
                        // For Cash on Delivery, submit form directly
                        const formData = new FormData(form);
                        formData.append('cart_data', JSON.stringify(cart));
                        form.appendChild(createHiddenInput('cart_data', JSON.stringify(cart)));
                        form.submit();
                        break;
                    case 'bkash':
                        window.location.href = '/payment/bkash';
                        break;
                    case 'nagad':
                        window.location.href = '/payment/nagad';
                        break;
                    case 'card':
                        window.location.href = '/payment/card';
                        break;
                    default:
                        alert('Please select a payment method');
                        resetSubmitButton(submitBtn);
                }
            }, 500); // Small delay for better UX
        }

        function resetSubmitButton(submitBtn) {
            submitBtn.classList.remove('loading');
            submitBtn.innerHTML = '<i class="fas fa-shopping-bag"></i> Complete Order';
            submitBtn.disabled = false;
        }

        function showConfirmationPopup() {
            document.getElementById('confirmationPopup').classList.add('show');
        }

        function closeConfirmationPopup() {
            document.getElementById('confirmationPopup').classList.remove('show');
        }

        function createHiddenInput(name, value) {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = name;
            input.value = value;
            return input;
        }

        // Auto-fill test data (for development)
        function fillTestData() {
            document.getElementById('first_name').value = 'John';
            document.getElementById('last_name').value = 'Doe';
            document.getElementById('email').value = 'john.doe@example.com';
            document.getElementById('phone').value = '01700000000';
            document.getElementById('address').value = 'House 123, Road 456, Dhanmondi';
            document.getElementById('city').value = 'Dhaka';
            document.getElementById('postal_code').value = '1205';
        }
        
        // Uncomment for development testing
        // fillTestData();
    </script>
@endsection
