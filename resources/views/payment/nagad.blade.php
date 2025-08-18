@extends('layouts.app')

@section('title', 'Nagad Payment - PETSROLOGY')

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
            background: linear-gradient(135deg, #eb5b2c 0%, #ff6f4a 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 4px 20px rgba(235,91,44,0.2);
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
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(235,91,44,0.3);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.2);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .nagad-logo {
            font-size: 2.2rem;
            font-weight: 800;
            color: white;
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
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
        }

        /* Payment Container */
        .payment-container {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 40px;
            margin-bottom: 40px;
        }

        /* Payment Form */
        .payment-form {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid rgba(235,91,44,0.1);
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h3 {
            color: #eb5b2c;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-group input:focus {
            outline: none;
            border-color: #eb5b2c;
            box-shadow: 0 0 0 3px rgba(235,91,44,0.1);
        }

        .nagad-number {
            position: relative;
        }

        .nagad-number::before {
            content: '+880';
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-weight: 600;
        }

        .nagad-number input {
            padding-left: 60px;
        }

        .payment-steps {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .step {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .step:last-child {
            margin-bottom: 0;
        }

        .step-number {
            background: #eb5b2c;
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #eb5b2c 0%, #ff6f4a 100%);
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
            box-shadow: 0 10px 30px rgba(235,91,44,0.4);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        /* Order Summary */
        .order-summary {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border: 2px solid rgba(235,91,44,0.1);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .order-summary h3 {
            color: #eb5b2c;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .total-amount {
            background: linear-gradient(135deg, #eb5b2c 0%, #ff6f4a 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .total-label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .total-value {
            font-size: 2rem;
            font-weight: 700;
        }

        .security-info {
            background: #e8f5e8;
            border-left: 4px solid #28a745;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .security-info h4 {
            color: #28a745;
            font-size: 0.95rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .security-info p {
            font-size: 0.85rem;
            color: #666;
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .payment-container {
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

            .payment-form,
            .order-summary {
                padding: 25px 20px;
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

            .payment-form,
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
    </style>
@endsection

@section('content')
    <!-- Enhanced Header with Back Button -->
    <div class="header">
        <a href="javascript:history.back()" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Checkout
        </a>
        
        <div class="header-icon-container">
            <div class="header-icon">
                <div class="nagad-logo">Nagad</div>
            </div>
        </div>
        
        <h1>Nagad Payment</h1>
        <p>Pay securely with your Nagad mobile wallet</p>
    </div>

    <!-- Page Container -->
    <div class="page-container">
        <div class="payment-container">
            <!-- Payment Form -->
            <div class="payment-form">
                <form id="nagadForm" method="POST" action="{{ route('payment.process') }}">
                    @csrf
                    <input type="hidden" name="payment_method" value="nagad">
                    <input type="hidden" name="order_data" id="orderData">
                    
                    <!-- Payment Steps -->
                    <div class="payment-steps">
                        <h4 style="color: #eb5b2c; margin-bottom: 15px;">How to pay with Nagad:</h4>
                        <div class="step">
                            <div class="step-number">1</div>
                            <span>Enter your Nagad mobile number</span>
                        </div>
                        <div class="step">
                            <div class="step-number">2</div>
                            <span>Enter your Nagad PIN</span>
                        </div>
                        <div class="step">
                            <div class="step-number">3</div>
                            <span>Confirm payment and complete your order</span>
                        </div>
                    </div>

                    <!-- Nagad Details -->
                    <div class="form-section">
                        <h3>
                            <i class="fas fa-mobile-alt"></i>
                            Nagad Account Details
                        </h3>
                        
                        <div class="form-group">
                            <label for="nagad_number">Nagad Mobile Number *</label>
                            <div class="nagad-number">
                                <input type="tel" id="nagad_number" name="nagad_number" required 
                                       placeholder="1XXXXXXXXX" maxlength="10" pattern="[1][0-9]{9}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nagad_pin">Nagad PIN *</label>
                            <input type="password" id="nagad_pin" name="nagad_pin" required 
                                   placeholder="Enter your 4-digit PIN" maxlength="4" pattern="[0-9]{4}">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-credit-card"></i>
                        Pay with Nagad
                    </button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <h3>
                    <i class="fas fa-receipt"></i>
                    Payment Summary
                </h3>
                
                <div class="total-amount">
                    <div class="total-label">Total Amount</div>
                    <div class="total-value" id="totalAmount">৳0</div>
                </div>

                <div id="orderItems">
                    <!-- Order items will be populated by JavaScript -->
                </div>

                <div class="security-info">
                    <h4>
                        <i class="fas fa-shield-alt"></i>
                        Secure Payment
                    </h4>
                    <p>Your payment is protected by Nagad's advanced security system. We never store your PIN or sensitive information.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Get order data from sessionStorage
        let orderData = JSON.parse(sessionStorage.getItem('orderData')) || null;

        // Initialize payment page
        document.addEventListener('DOMContentLoaded', function() {
            if (!orderData) {
                alert('No order data found! Redirecting to checkout...');
                window.location.href = '/checkout';
                return;
            }
            
            displayOrderSummary();
            
            // Set order data in hidden input
            document.getElementById('orderData').value = JSON.stringify(orderData);
            
            // Form submission
            document.getElementById('nagadForm').addEventListener('submit', function(e) {
                e.preventDefault();
                processNagadPayment();
            });

            // Format Nagad number input
            document.getElementById('nagad_number').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 10) value = value.substr(0, 10);
                e.target.value = value;
            });

            // Format PIN input
            document.getElementById('nagad_pin').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 4) value = value.substr(0, 4);
                e.target.value = value;
            });
        });

        function displayOrderSummary() {
            const orderItemsContainer = document.getElementById('orderItems');
            const totalAmountElement = document.getElementById('totalAmount');
            
            // Display total
            totalAmountElement.textContent = `৳${orderData.total.toLocaleString()}`;
            
            // Display order items summary
            const itemCount = orderData.cart.reduce((sum, item) => sum + item.quantity, 0);
            orderItemsContainer.innerHTML = `
                <div style="padding: 15px 0; border-top: 1px solid #eee; margin-top: 20px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="color: #666;">Items (${itemCount}):</span>
                        <span style="font-weight: 600;">৳${(orderData.total - 50).toLocaleString()}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span style="color: #666;">Delivery:</span>
                        <span style="font-weight: 600;">৳50</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding-top: 10px; border-top: 1px solid #eee; font-weight: 700; color: #eb5b2c;">
                        <span>Total:</span>
                        <span>৳${orderData.total.toLocaleString()}</span>
                    </div>
                </div>
            `;
        }

        function processNagadPayment() {
            const form = document.getElementById('nagadForm');
            const submitBtn = document.getElementById('submitBtn');
            const nagadNumber = document.getElementById('nagad_number').value;
            const nagadPin = document.getElementById('nagad_pin').value;
            
            // Validate inputs
            if (!nagadNumber || nagadNumber.length !== 10 || !nagadNumber.startsWith('1')) {
                alert('Please enter a valid Nagad number (11 digits starting with 01)');
                return;
            }
            
            if (!nagadPin || nagadPin.length !== 4) {
                alert('Please enter your 4-digit Nagad PIN');
                return;
            }
            
            // Show loading state
            submitBtn.classList.add('loading');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing Payment...';
            submitBtn.disabled = true;
            
            // Submit form
            form.submit();
        }
    </script>
@endsection
