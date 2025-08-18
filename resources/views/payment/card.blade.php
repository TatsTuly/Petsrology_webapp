@extends('layouts.app')

@section('title', 'Card Payment - PETSROLOGY')

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
            background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 4px 20px rgba(74,144,226,0.2);
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
            box-shadow: 0 8px 25px rgba(74,144,226,0.3);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.2);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }

        .card-icon {
            font-size: 2.5rem;
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
            border: 2px solid rgba(74,144,226,0.1);
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h3 {
            color: #4a90e2;
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

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74,144,226,0.1);
        }

        .card-type-icons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .card-type-icon {
            padding: 8px 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .card-type-icon.visa {
            color: #1a1f71;
            background: #f8f9fa;
        }

        .card-type-icon.mastercard {
            color: #eb001b;
            background: #f8f9fa;
        }

        .card-type-icon.amex {
            color: #006fcf;
            background: #f8f9fa;
        }

        .card-preview {
            background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
            border-radius: 15px;
            padding: 25px;
            color: white;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(74,144,226,0.2);
        }

        .card-preview::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .card-number-display {
            font-size: 1.3rem;
            font-weight: 600;
            letter-spacing: 3px;
            margin-bottom: 15px;
            font-family: 'Courier New', monospace;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .card-holder {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .card-expiry {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .security-note {
            background: #e8f4f8;
            border-left: 4px solid #4a90e2;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .security-note h4 {
            color: #4a90e2;
            font-size: 0.95rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .security-note p {
            font-size: 0.85rem;
            color: #666;
            margin: 0;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
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
            box-shadow: 0 10px 30px rgba(74,144,226,0.4);
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
            border: 2px solid rgba(74,144,226,0.1);
            height: fit-content;
            position: sticky;
            top: 20px;
        }

        .order-summary h3 {
            color: #4a90e2;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .total-amount {
            background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
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

            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
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

            .card-number-display {
                font-size: 1.1rem;
                letter-spacing: 2px;
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
                <i class="fas fa-credit-card card-icon"></i>
            </div>
        </div>
        
        <h1>Card Payment</h1>
        <p>Pay securely with your credit or debit card</p>
    </div>

    <!-- Page Container -->
    <div class="page-container">
        <div class="payment-container">
            <!-- Payment Form -->
            <div class="payment-form">
                <form id="cardForm" method="POST" action="{{ route('payment.process') }}">
                    @csrf
                    <input type="hidden" name="payment_method" value="card">
                    <input type="hidden" name="order_data" id="orderData">
                    
                    <!-- Card Preview -->
                    <div class="card-preview">
                        <div class="card-number-display" id="cardDisplay">**** **** **** ****</div>
                        <div class="card-details">
                            <div class="card-holder">
                                <div style="font-size: 0.7rem; opacity: 0.8;">CARD HOLDER</div>
                                <div id="holderDisplay">YOUR NAME</div>
                            </div>
                            <div class="card-expiry">
                                <div style="font-size: 0.7rem; opacity: 0.8;">EXPIRES</div>
                                <div id="expiryDisplay">MM/YY</div>
                            </div>
                        </div>
                    </div>

                    <!-- Security Note -->
                    <div class="security-note">
                        <h4>
                            <i class="fas fa-shield-alt"></i>
                            Secure SSL Encryption
                        </h4>
                        <p>Your card information is encrypted and secure. We do not store your card details.</p>
                    </div>

                    <!-- Card Information -->
                    <div class="form-section">
                        <h3>
                            <i class="fas fa-credit-card"></i>
                            Card Information
                        </h3>
                        
                        <div class="form-group">
                            <label for="card_number">Card Number *</label>
                            <input type="text" id="card_number" name="card_number" required 
                                   placeholder="1234 5678 9012 3456" maxlength="19">
                            <div class="card-type-icons">
                                <div class="card-type-icon visa">VISA</div>
                                <div class="card-type-icon mastercard">MASTERCARD</div>
                                <div class="card-type-icon amex">AMEX</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="card_holder">Card Holder Name *</label>
                            <input type="text" id="card_holder" name="card_holder" required 
                                   placeholder="JOHN DOE">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="expiry_month">Expiry Month *</label>
                                <select id="expiry_month" name="expiry_month" required>
                                    <option value="">Month</option>
                                    <option value="01">01 - January</option>
                                    <option value="02">02 - February</option>
                                    <option value="03">03 - March</option>
                                    <option value="04">04 - April</option>
                                    <option value="05">05 - May</option>
                                    <option value="06">06 - June</option>
                                    <option value="07">07 - July</option>
                                    <option value="08">08 - August</option>
                                    <option value="09">09 - September</option>
                                    <option value="10">10 - October</option>
                                    <option value="11">11 - November</option>
                                    <option value="12">12 - December</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="expiry_year">Expiry Year *</label>
                                <select id="expiry_year" name="expiry_year" required>
                                    <option value="">Year</option>
                                    <!-- Years will be populated by JavaScript -->
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="cvv">CVV *</label>
                                <input type="text" id="cvv" name="cvv" required 
                                       placeholder="123" maxlength="4">
                            </div>

                            <div class="form-group">
                                <label for="card_type">Card Type</label>
                                <select id="card_type" name="card_type">
                                    <option value="credit">Credit Card</option>
                                    <option value="debit">Debit Card</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-lock"></i>
                        Pay Securely
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
                    <p>Your payment is protected by 256-bit SSL encryption and industry-standard security protocols.</p>
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
            populateYears();
            setupCardFormatting();
            
            // Set order data in hidden input
            document.getElementById('orderData').value = JSON.stringify(orderData);
            
            // Form submission
            document.getElementById('cardForm').addEventListener('submit', function(e) {
                e.preventDefault();
                processCardPayment();
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
                    <div style="display: flex; justify-content: space-between; padding-top: 10px; border-top: 1px solid #eee; font-weight: 700; color: #4a90e2;">
                        <span>Total:</span>
                        <span>৳${orderData.total.toLocaleString()}</span>
                    </div>
                </div>
            `;
        }

        function populateYears() {
            const yearSelect = document.getElementById('expiry_year');
            const currentYear = new Date().getFullYear();
            
            for (let i = 0; i < 20; i++) {
                const year = currentYear + i;
                const option = document.createElement('option');
                option.value = year.toString().substr(-2);
                option.textContent = year;
                yearSelect.appendChild(option);
            }
        }

        function setupCardFormatting() {
            const cardNumberInput = document.getElementById('card_number');
            const cardHolderInput = document.getElementById('card_holder');
            const expiryMonthSelect = document.getElementById('expiry_month');
            const expiryYearSelect = document.getElementById('expiry_year');
            const cvvInput = document.getElementById('cvv');

            // Format card number
            cardNumberInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
                if (value.length > 19) value = value.substr(0, 19);
                e.target.value = value;
                
                // Update card display
                document.getElementById('cardDisplay').textContent = value || '**** **** **** ****';
            });

            // Format card holder name
            cardHolderInput.addEventListener('input', function(e) {
                let value = e.target.value.toUpperCase();
                e.target.value = value;
                
                // Update card display
                document.getElementById('holderDisplay').textContent = value || 'YOUR NAME';
            });

            // Update expiry display
            function updateExpiryDisplay() {
                const month = expiryMonthSelect.value;
                const year = expiryYearSelect.value;
                const display = (month && year) ? `${month}/${year}` : 'MM/YY';
                document.getElementById('expiryDisplay').textContent = display;
            }

            expiryMonthSelect.addEventListener('change', updateExpiryDisplay);
            expiryYearSelect.addEventListener('change', updateExpiryDisplay);

            // Format CVV
            cvvInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 4) value = value.substr(0, 4);
                e.target.value = value;
            });
        }

        function processCardPayment() {
            const form = document.getElementById('cardForm');
            const submitBtn = document.getElementById('submitBtn');
            
            // Get form values
            const cardNumber = document.getElementById('card_number').value.replace(/\s/g, '');
            const cardHolder = document.getElementById('card_holder').value;
            const expiryMonth = document.getElementById('expiry_month').value;
            const expiryYear = document.getElementById('expiry_year').value;
            const cvv = document.getElementById('cvv').value;
            
            // Validate inputs
            if (!cardNumber || cardNumber.length < 13 || cardNumber.length > 19) {
                alert('Please enter a valid card number');
                return;
            }
            
            if (!cardHolder || cardHolder.length < 2) {
                alert('Please enter the card holder name');
                return;
            }
            
            if (!expiryMonth || !expiryYear) {
                alert('Please select the expiry date');
                return;
            }
            
            if (!cvv || cvv.length < 3) {
                alert('Please enter a valid CVV');
                return;
            }
            
            // Check if card is expired
            const currentDate = new Date();
            const expiryDate = new Date(2000 + parseInt(expiryYear), parseInt(expiryMonth) - 1);
            
            if (expiryDate < currentDate) {
                alert('This card has expired. Please use a different card.');
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
