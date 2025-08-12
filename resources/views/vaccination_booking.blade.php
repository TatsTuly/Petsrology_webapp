@extends('layouts.app')

@section('title', 'Book Vaccination - PETSROLOGY')

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
            padding: 80px 20px 60px;
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
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .header-icon {
            width: 90px;
            height: 90px;
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
            50% { transform: translateY(-10px); }
        }

        .header-icon span {
            font-size: 3rem;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .header h1 {
            font-size: 3rem;
            margin: 0 0 15px 0;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1); 
            position: relative;
            z-index: 1;
        }

        .header p {
            font-size: 1.3rem;
            margin: 0;
            opacity: 0.95;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .back-btn {
            position: absolute;
            top: 25px;
            right: 25px;
            background: rgba(255,255,255,0.15);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.95rem;
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

        /* Page Container for content after header */
        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
        }

        /* Booking Type Selection */
        .booking-type-section {
            margin-bottom: 50px;
        }

        .booking-type-tabs {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .booking-tab {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 20px 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            min-width: 200px;
            position: relative;
            overflow: hidden;
        }

        .booking-tab::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .booking-tab:hover::before,
        .booking-tab.active::before {
            left: 0;
        }

        .booking-tab:hover,
        .booking-tab.active {
            border-color: #ff6f61;
            color: white;
            transform: translateY(-5px);
        }

        .booking-tab-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #ff6f61;
            transition: color 0.3s ease;
        }

        .booking-tab:hover .booking-tab-icon,
        .booking-tab.active .booking-tab-icon {
            color: white;
        }

        .booking-tab h3 {
            font-size: 1.4rem;
            margin-bottom: 8px;
            font-weight: 800;
            color: #2c3e50;
            transition: color 0.3s ease;
        }

        .booking-tab:hover h3,
        .booking-tab.active h3 {
            color: white;
        }

        .booking-tab p {
            font-size: 0.95rem;
            color: #5a6c7d;
            margin: 0;
            transition: color 0.3s ease;
        }

        .booking-tab:hover p,
        .booking-tab.active p {
            color: white;
        }

        /* Booking Form */
        .booking-form-section {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.08);
            margin-bottom: 40px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .section-header h2 {
            font-size: 2.2rem;
            margin-bottom: 15px;
            color: #ff6f61;
            font-weight: 800;
            letter-spacing: 1.2px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #5a6c7d;
            font-weight: 500;
            line-height: 1.8;
        }

        .booking-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .form-group {
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #2c3e50;
            font-size: 1rem;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            color: #333;
            background: #fff;
            transition: all 0.3s ease;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #ff6f61;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        .selected-package {
            background: linear-gradient(135deg, #e8f5e8 0%, #d4edda 100%);
            border: 2px solid #27ae60;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .selected-package h3 {
            color: #27ae60;
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .selected-package .price {
            color: #ff6f61;
            font-size: 2rem;
            font-weight: 900;
            margin-bottom: 15px;
        }

        .selected-package .features {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .selected-package .feature-tag {
            background: #27ae60;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .selected-vet {
            background: linear-gradient(135deg, #e8f4fd 0%, #d1ecf1 100%);
            border: 2px solid #3498db;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .selected-vet-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            box-shadow: 0 8px 25px rgba(52,152,219,0.3);
        }

        .selected-vet-info h3 {
            color: #3498db;
            font-size: 1.6rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .selected-vet-info p {
            color: #5a6c7d;
            margin: 0;
            font-weight: 600;
        }

        .submit-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            justify-self: center;
            margin-top: 20px;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e65c50 0%, #ff6f61 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .submit-btn:hover::before {
            left: 0;
        }

        .submit-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
        }

        /* Package/Vet Selection Modal */
        .selection-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            z-index: 2000;
            backdrop-filter: blur(5px);
        }

        .selection-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            max-width: 900px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 25px;
            background: #ff6f61;
            color: white;
            border: none;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: #e65c50;
            transform: scale(1.1);
        }

        .modal-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .modal-header h2 {
            color: #ff6f61;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .modal-header p {
            color: #5a6c7d;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .selection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .selection-item {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .selection-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .selection-item:hover::before,
        .selection-item.selected::before {
            left: 0;
        }

        .selection-item:hover,
        .selection-item.selected {
            border-color: #ff6f61;
            color: white;
            transform: translateY(-5px);
        }

        .package-selection-item h3 {
            color: #2c3e50;
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .package-selection-item .price {
            color: #ff6f61;
            font-size: 1.8rem;
            font-weight: 900;
            margin-bottom: 15px;
            transition: color 0.3s ease;
        }

        .package-selection-item:hover h3,
        .package-selection-item.selected h3,
        .package-selection-item:hover .price,
        .package-selection-item.selected .price {
            color: white;
        }

        .vet-selection-item .vet-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin: 0 auto 15px;
            box-shadow: 0 8px 25px rgba(52,152,219,0.3);
            transition: all 0.3s ease;
        }

        .vet-selection-item h3 {
            color: #2c3e50;
            font-size: 1.2rem;
            font-weight: 800;
            margin-bottom: 5px;
            transition: color 0.3s ease;
        }

        .vet-selection-item p {
            color: #5a6c7d;
            font-size: 0.9rem;
            margin: 0;
            transition: color 0.3s ease;
        }

        .vet-selection-item:hover h3,
        .vet-selection-item.selected h3,
        .vet-selection-item:hover p,
        .vet-selection-item.selected p {
            color: white;
        }

        .vet-selection-item:hover .vet-avatar,
        .vet-selection-item.selected .vet-avatar {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,255,255,0.3);
        }

        .change-selection-btn {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 15px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .change-selection-btn:hover {
            background: linear-gradient(135deg, #2980b9 0%, #1f618d 100%);
            transform: translateY(-2px);
        }

        .confirm-selection-btn {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            margin-top: 30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .confirm-selection-btn:hover {
            background: linear-gradient(135deg, #229954 0%, #27ae60 100%);
            transform: translateY(-3px);
        }

        /* Hidden sections */
        .booking-content {
            display: none;
        }

        .booking-content.active {
            display: block;
        }

        /* Summary Section */
        .booking-summary {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.08);
            margin-bottom: 30px;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .summary-item:last-child {
            border-bottom: none;
            font-weight: 700;
            font-size: 1.2rem;
            color: #ff6f61;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h3 {
            color: #ff6f61;
            font-size: 1.2rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #ff6f61;
        }

        .footer-section ul li a i {
            margin-right: 8px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #555;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 0.9rem;
            color: #ccc;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .page-container {
                max-width: 1000px;
                padding: 30px 20px;
            }
        }

        @media (max-width: 900px) {
            .page-container {
                padding: 30px 15px;
            }
            
            .booking-form {
                grid-template-columns: 1fr;
            }
            
            .booking-type-tabs {
                flex-direction: column;
                align-items: center;
            }
            
            .selected-vet {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 40px 20px 30px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            
            .booking-form-section {
                padding: 25px 20px;
            }
        }

        @media (max-width: 700px) {
            .navbar-container {
                padding: 0 15px;
                height: 60px;
            }
            
            .brand-logo {
                width: 35px;
                height: 35px;
                margin-right: 8px;
            }
            
            .brand-text {
                font-size: 1.2rem;
            }
            
            .navbar-nav {
                flex-wrap: wrap;
                gap: 2px;
            }
            
            .nav-link {
                padding: 8px 12px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 600px) {
            .page-container {
                padding: 20px 10px;
            }
        }

        @media (max-width: 500px) {
            .navbar-container {
                padding: 0 10px;
                height: auto;
                min-height: 60px;
                flex-wrap: wrap;
            }
            
            .navbar-nav {
                width: 100%;
                justify-content: center;
                margin-top: 10px;
                flex-wrap: wrap;
                gap: 2px;
                margin-right: 0;
            }
            
            .nav-link {
                padding: 8px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
@endsection

@section('content')
    <div class="header">
        <a href="{{ route('vaccination.schedule') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Vaccination
        </a>
        <div class="header-icon-container">
            <div class="header-icon">
                <span>📅</span>
            </div>
        </div>
        <h1>Book Vaccination</h1>
        <p>Schedule your pet's vaccination appointment</p>
    </div>

    <div class="page-container">
        <!-- Booking Type Selection -->
        <section class="booking-type-section">
            <div class="booking-type-tabs">
                <div class="booking-tab active" data-type="package">
                    <div class="booking-tab-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <h3>Package Booking</h3>
                    <p>Book a complete vaccination package</p>
                </div>
                <div class="booking-tab" data-type="vet">
                    <div class="booking-tab-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3>Vet Appointment</h3>
                    <p>Book with a specific veterinarian</p>
                </div>
            </div>
        </section>

        <!-- Package Booking Form -->
        <div class="booking-content active" id="package-booking">
            <div class="booking-form-section">
                <div class="section-header">
                    <h2>Package Booking</h2>
                    <p class="section-subtitle">Complete your vaccination package booking</p>
                </div>

                <!-- Selected Package Display -->
                <div class="selected-package" id="packageDisplay">
                    <h3 id="packageName">Premium Protection</h3>
                    <div class="price" id="packagePrice">৳4,500</div>
                    <div class="features">
                        <span class="feature-tag">Core Vaccinations</span>
                        <span class="feature-tag">Rabies Vaccination</span>
                        <span class="feature-tag">Health Checkup</span>
                        <span class="feature-tag">Deworming</span>
                        <span class="feature-tag">3 Follow-ups</span>
                    </div>
                    <button class="change-selection-btn" onclick="openPackageModal()">
                        <i class="fas fa-edit"></i>
                        Change Package
                    </button>
                </div>

                <form class="booking-form" id="packageForm">
                    <div class="form-group">
                        <label class="form-label" for="ownerName">Pet Owner Name *</label>
                        <input type="text" id="ownerName" name="ownerName" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="petName">Pet Name *</label>
                        <input type="text" id="petName" name="petName" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="petType">Pet Type *</label>
                        <select id="petType" name="petType" class="form-select" required>
                            <option value="">Select Pet Type</option>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="rabbit">Rabbit</option>
                            <option value="bird">Bird</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="petAge">Pet Age *</label>
                        <select id="petAge" name="petAge" class="form-select" required>
                            <option value="">Select Age Range</option>
                            <option value="puppy">Puppy/Kitten (0-1 year)</option>
                            <option value="young">Young (1-3 years)</option>
                            <option value="adult">Adult (3-7 years)</option>
                            <option value="senior">Senior (7+ years)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="preferredDate">Preferred Date *</label>
                        <input type="date" id="preferredDate" name="preferredDate" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="preferredTime">Preferred Time *</label>
                        <select id="preferredTime" name="preferredTime" class="form-select" required>
                            <option value="">Select Time</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="17:00">5:00 PM</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label" for="address">Address *</label>
                        <textarea id="address" name="address" class="form-textarea" placeholder="Please provide your complete address" required></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label" for="packageNotes">Additional Notes</label>
                        <textarea id="packageNotes" name="packageNotes" class="form-textarea" placeholder="Any special instructions or concerns about your pet..."></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-calendar-check"></i>
                        Confirm Package Booking
                    </button>
                </form>
            </div>
        </div>

        <!-- Vet Appointment Form -->
        <div class="booking-content" id="vet-booking">
            <div class="booking-form-section">
                <div class="section-header">
                    <h2>Vet Appointment</h2>
                    <p class="section-subtitle">Book an appointment with a vaccination expert</p>
                </div>

                <!-- Selected Vet Display -->
                <div class="selected-vet" id="vetDisplay">
                    <div class="selected-vet-avatar" id="vetAvatar">AI</div>
                    <div class="selected-vet-info">
                        <h3 id="vetName">Dr. Aminul Islam</h3>
                        <p id="vetSpecialty">Vaccination Specialist</p>
                        <p id="vetExperience">12 years experience</p>
                        <button class="change-selection-btn" onclick="openVetModal()">
                            <i class="fas fa-edit"></i>
                            Change Vet
                        </button>
                    </div>
                </div>

                <form class="booking-form" id="vetForm">
                    <div class="form-group">
                        <label class="form-label" for="vetOwnerName">Pet Owner Name *</label>
                        <input type="text" id="vetOwnerName" name="vetOwnerName" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vetPhone">Phone Number *</label>
                        <input type="tel" id="vetPhone" name="vetPhone" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vetEmail">Email Address *</label>
                        <input type="email" id="vetEmail" name="vetEmail" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vetPetName">Pet Name *</label>
                        <input type="text" id="vetPetName" name="vetPetName" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vetPetType">Pet Type *</label>
                        <select id="vetPetType" name="vetPetType" class="form-select" required>
                            <option value="">Select Pet Type</option>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="rabbit">Rabbit</option>
                            <option value="bird">Bird</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="visitType">Visit Type *</label>
                        <select id="visitType" name="visitType" class="form-select" required>
                            <option value="">Select Visit Type</option>
                            <option value="routine">Routine Vaccination</option>
                            <option value="booster">Booster Shot</option>
                            <option value="consultation">Vaccination Consultation</option>
                            <option value="emergency">Emergency Vaccination</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vetPreferredDate">Preferred Date *</label>
                        <input type="date" id="vetPreferredDate" name="vetPreferredDate" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="vetPreferredTime">Preferred Time *</label>
                        <select id="vetPreferredTime" name="vetPreferredTime" class="form-select" required>
                            <option value="">Select Time</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="17:00">5:00 PM</option>
                        </select>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label" for="vetAddress">Address *</label>
                        <textarea id="vetAddress" name="vetAddress" class="form-textarea" placeholder="Please provide your complete address" required></textarea>
                    </div>

                    <div class="form-group full-width">
                        <label class="form-label" for="vetNotes">Additional Notes</label>
                        <textarea id="vetNotes" name="vetNotes" class="form-textarea" placeholder="Any specific concerns or requirements for the appointment..."></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-stethoscope"></i>
                        Confirm Vet Appointment
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Package Selection Modal -->
    <div class="selection-modal" id="packageModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closePackageModal()">×</button>
            <div class="modal-header">
                <h2>Select Vaccination Package</h2>
                <p>Choose the vaccination package that best suits your pet's needs</p>
            </div>
            <div class="selection-grid">
                <div class="selection-item package-selection-item" data-package="Basic Protection">
                    <h3>Basic Protection</h3>
                    <div class="price">৳2,500</div>
                    <ul style="list-style: none; padding: 0; margin: 10px 0; text-align: left;">
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Core Vaccinations</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Rabies Vaccination</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Health Checkup</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Certificate</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> 1 Follow-up</li>
                    </ul>
                </div>
                <div class="selection-item package-selection-item" data-package="Premium Protection">
                    <h3>Premium Protection</h3>
                    <div class="price">৳4,500</div>
                    <ul style="list-style: none; padding: 0; margin: 10px 0; text-align: left;">
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> All Basic Features</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Kennel Cough</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Deworming</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Comprehensive Exam</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> 3 Follow-ups</li>
                    </ul>
                </div>
                <div class="selection-item package-selection-item" data-package="Complete Care">
                    <h3>Complete Care</h3>
                    <div class="price">৳6,800</div>
                    <ul style="list-style: none; padding: 0; margin: 10px 0; text-align: left;">
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> All Premium Features</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Annual Plan</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Blood Work</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Microchip</li>
                        <li><i class="fas fa-check" style="color: #27ae60; margin-right: 8px;"></i> Unlimited Follow-ups</li>
                    </ul>
                </div>
            </div>
            <button class="confirm-selection-btn" onclick="confirmPackageSelection()">
                <i class="fas fa-check"></i>
                Confirm Selection
            </button>
        </div>
    </div>

    <!-- Vet Selection Modal -->
    <div class="selection-modal" id="vetModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeVetModal()">×</button>
            <div class="modal-header">
                <h2>Select Vaccination Expert</h2>
                <p>Choose from our team of specialized vaccination veterinarians</p>
            </div>
            <div class="selection-grid">
                <div class="selection-item vet-selection-item" data-vet="Dr. Aminul Islam">
                    <div class="vet-avatar" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">AI</div>
                    <h3>Dr. Aminul Islam</h3>
                    <p>Vaccination Specialist</p>
                    <p>12 years experience</p>
                    <p style="font-size: 0.8rem; color: #27ae60; font-weight: 600;">⭐ 4.9/5 Rating</p>
                </div>
                <div class="selection-item vet-selection-item" data-vet="Dr. Sultana Razia">
                    <div class="vet-avatar" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">SR</div>
                    <h3>Dr. Sultana Razia</h3>
                    <p>Immunology Expert</p>
                    <p>15 years experience</p>
                    <p style="font-size: 0.8rem; color: #27ae60; font-weight: 600;">⭐ 4.8/5 Rating</p>
                </div>
                <div class="selection-item vet-selection-item" data-vet="Dr. Karim Ahmed">
                    <div class="vet-avatar" style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);">KA</div>
                    <h3>Dr. Karim Ahmed</h3>
                    <p>Preventive Medicine</p>
                    <p>10 years experience</p>
                    <p style="font-size: 0.8rem; color: #27ae60; font-weight: 600;">⭐ 4.7/5 Rating</p>
                </div>
                <div class="selection-item vet-selection-item" data-vet="Dr. Fatema Begum">
                    <div class="vet-avatar" style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);">FB</div>
                    <h3>Dr. Fatema Begum</h3>
                    <p>Pet Wellness Expert</p>
                    <p>8 years experience</p>
                    <p style="font-size: 0.8rem; color: #27ae60; font-weight: 600;">⭐ 4.9/5 Rating</p>
                </div>
                <div class="selection-item vet-selection-item" data-vet="Dr. Mohammad Hassan">
                    <div class="vet-avatar" style="background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);">MH</div>
                    <h3>Dr. Mohammad Hassan</h3>
                    <p>Vaccine Research Specialist</p>
                    <p>18 years experience</p>
                    <p style="font-size: 0.8rem; color: #27ae60; font-weight: 600;">⭐ 4.9/5 Rating</p>
                </div>
                <div class="selection-item vet-selection-item" data-vet="Dr. Nasreen Akter">
                    <div class="vet-avatar" style="background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);">NA</div>
                    <h3>Dr. Nasreen Akter</h3>
                    <p>Senior Immunologist</p>
                    <p>14 years experience</p>
                    <p style="font-size: 0.8rem; color: #27ae60; font-weight: 600;">⭐ 4.8/5 Rating</p>
                </div>
                <div class="selection-item vet-selection-item" data-vet="Dr. Rafiqul Islam">
                    <div class="vet-avatar" style="background: linear-gradient(135deg, #8e44ad 0%, #6c3483 100%);">RI</div>
                    <h3>Dr. Rafiqul Islam</h3>
                    <p>Exotic Pet Vaccination</p>
                    <p>11 years experience</p>
                    <p style="font-size: 0.8rem; color: #27ae60; font-weight: 600;">⭐ 4.7/5 Rating</p>
                </div>
            </div>
            <button class="confirm-selection-btn" onclick="confirmVetSelection()">
                <i class="fas fa-check"></i>
                Confirm Selection
            </button>
        </div>
    </div>

    <script>
        // Get URL parameters
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Initialize the page based on URL parameters
        function initializePage() {
            const packageParam = getUrlParameter('package');
            const vetParam = getUrlParameter('vet');

            if (packageParam) {
                showPackageBooking();
                updatePackageDisplay(packageParam);
            } else if (vetParam) {
                showVetBooking();
                updateVetDisplay(vetParam);
            }
        }

        // Tab switching functionality
        document.querySelectorAll('.booking-tab').forEach(tab => {
            tab.addEventListener('click', function() {
                const type = this.dataset.type;
                
                // Update active tab
                document.querySelectorAll('.booking-tab').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Show appropriate booking form
                if (type === 'package') {
                    showPackageBooking();
                } else {
                    showVetBooking();
                }
            });
        });

        function showPackageBooking() {
            document.getElementById('package-booking').classList.add('active');
            document.getElementById('vet-booking').classList.remove('active');
        }

        function showVetBooking() {
            document.getElementById('vet-booking').classList.add('active');
            document.getElementById('package-booking').classList.remove('active');
        }

        // Update package display based on selection
        function updatePackageDisplay(packageName) {
            const packages = {
                'Basic Protection': {
                    price: '৳2,500',
                    features: ['Core Vaccinations', 'Rabies Vaccination', 'Health Checkup', 'Certificate', '1 Follow-up']
                },
                'Premium Protection': {
                    price: '৳4,500',
                    features: ['Core Vaccinations', 'Rabies Vaccination', 'Health Checkup', 'Deworming', '3 Follow-ups']
                },
                'Complete Care': {
                    price: '৳6,800',
                    features: ['Annual Plan', 'Blood Work', 'Microchip', 'Emergency Support', 'Unlimited Follow-ups']
                }
            };

            const selectedPackage = packages[packageName] || packages['Premium Protection'];
            
            document.getElementById('packageName').textContent = packageName || 'Premium Protection';
            document.getElementById('packagePrice').textContent = selectedPackage.price;
            
            const featuresContainer = document.querySelector('.features');
            featuresContainer.innerHTML = selectedPackage.features.map(feature => 
                `<span class="feature-tag">${feature}</span>`
            ).join('');
        }

        // Update vet display based on selection
        function updateVetDisplay(vetName) {
            const vets = {
                'Dr. Aminul Islam': {
                    avatar: 'AI',
                    specialty: 'Vaccination Specialist',
                    experience: '12 years experience',
                    color: '#3498db'
                },
                'Dr. Sultana Razia': {
                    avatar: 'SR',
                    specialty: 'Immunology Expert',
                    experience: '15 years experience',
                    color: '#e74c3c'
                },
                'Dr. Karim Ahmed': {
                    avatar: 'KA',
                    specialty: 'Preventive Medicine',
                    experience: '10 years experience',
                    color: '#9b59b6'
                },
                'Dr. Fatema Begum': {
                    avatar: 'FB',
                    specialty: 'Pet Wellness Expert',
                    experience: '8 years experience',
                    color: '#f39c12'
                },
                'Dr. Mohammad Hassan': {
                    avatar: 'MH',
                    specialty: 'Vaccine Research Specialist',
                    experience: '18 years experience',
                    color: '#1abc9c'
                },
                'Dr. Nasreen Akter': {
                    avatar: 'NA',
                    specialty: 'Senior Immunologist',
                    experience: '14 years experience',
                    color: '#e67e22'
                },
                'Dr. Rafiqul Islam': {
                    avatar: 'RI',
                    specialty: 'Exotic Pet Vaccination',
                    experience: '11 years experience',
                    color: '#8e44ad'
                }
            };

            const selectedVet = vets[vetName] || vets['Dr. Aminul Islam'];
            
            document.getElementById('vetName').textContent = vetName || 'Dr. Aminul Islam';
            document.getElementById('vetSpecialty').textContent = selectedVet.specialty;
            document.getElementById('vetExperience').textContent = selectedVet.experience;
            document.getElementById('vetAvatar').textContent = selectedVet.avatar;
            document.getElementById('vetAvatar').style.background = `linear-gradient(135deg, ${selectedVet.color} 0%, ${selectedVet.color}dd 100%)`;
        }

        // Modal functionality
        let selectedPackage = 'Premium Protection';
        let selectedVet = 'Dr. Aminul Islam';

        function openPackageModal() {
            document.getElementById('packageModal').classList.add('active');
            // Highlight current selection
            document.querySelectorAll('.package-selection-item').forEach(item => {
                item.classList.remove('selected');
                if (item.dataset.package === selectedPackage) {
                    item.classList.add('selected');
                }
            });
        }

        function closePackageModal() {
            document.getElementById('packageModal').classList.remove('active');
        }

        function openVetModal() {
            document.getElementById('vetModal').classList.add('active');
            // Highlight current selection
            document.querySelectorAll('.vet-selection-item').forEach(item => {
                item.classList.remove('selected');
                if (item.dataset.vet === selectedVet) {
                    item.classList.add('selected');
                }
            });
        }

        function closeVetModal() {
            document.getElementById('vetModal').classList.remove('active');
        }

        function confirmPackageSelection() {
            const selected = document.querySelector('.package-selection-item.selected');
            if (selected) {
                selectedPackage = selected.dataset.package;
                updatePackageDisplay(selectedPackage);
            }
            closePackageModal();
        }

        function confirmVetSelection() {
            const selected = document.querySelector('.vet-selection-item.selected');
            if (selected) {
                selectedVet = selected.dataset.vet;
                updateVetDisplay(selectedVet);
            }
            closeVetModal();
        }

        // Add click handlers for modal items
        document.addEventListener('DOMContentLoaded', function() {
            // Package selection
            document.querySelectorAll('.package-selection-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.package-selection-item').forEach(i => i.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            // Vet selection
            document.querySelectorAll('.vet-selection-item').forEach(item => {
                item.addEventListener('click', function() {
                    document.querySelectorAll('.vet-selection-item').forEach(i => i.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });

            // Close modals when clicking outside
            document.querySelectorAll('.selection-modal').forEach(modal => {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.classList.remove('active');
                    }
                });
            });

            initializePage();
            setMinDate();
        });

        // Form submission handlers
        document.getElementById('packageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const packageName = document.getElementById('packageName').textContent;
            const packagePrice = document.getElementById('packagePrice').textContent;
            
            // In a real application, you would send this data to your backend
            alert(`Package booking submitted!\n\nPackage: ${packageName}\nPrice: ${packagePrice}\nOwner: ${formData.get('ownerName')}\nPet: ${formData.get('petName')}\nDate: ${formData.get('preferredDate')}\nTime: ${formData.get('preferredTime')}`);
            
            // Reset form
            this.reset();
        });

        document.getElementById('vetForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const vetName = document.getElementById('vetName').textContent;
            
            // In a real application, you would send this data to your backend
            alert(`Vet appointment submitted!\n\nVet: ${vetName}\nOwner: ${formData.get('vetOwnerName')}\nPet: ${formData.get('vetPetName')}\nDate: ${formData.get('vetPreferredDate')}\nTime: ${formData.get('vetPreferredTime')}`);
            
            // Reset form
            this.reset();
        });

        // Set minimum date to today
        function setMinDate() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('preferredDate').setAttribute('min', today);
            document.getElementById('vetPreferredDate').setAttribute('min', today);
        }

        // Initialize page
        // Removed DOMContentLoaded as it's now handled above

        // Add animation on scroll
        function animateOnScroll() {
            const sections = document.querySelectorAll('.booking-form-section, .selected-package, .selected-vet');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            sections.forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(section);
            });
        }

        // Initialize animations
        window.addEventListener('load', animateOnScroll);
    </script>
@endsection
