@extends('layouts.app')

@section('title', 'Our Veterinary Team - PETSROLOGY')

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

        /* Filter Section */
        .search-filter-section {
            background: #fff;
            padding: 30px 20px;
            margin: -20px 20px 0;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(255,111,97,0.12);
            position: relative;
            z-index: 2;
        }

        .search-filter-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 25px;
            padding: 8px 20px;
            margin-bottom: 25px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .search-bar:focus-within {
            border-color: #ff6f61;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }

        .search-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 12px 15px;
            font-size: 1rem;
            outline: none;
            font-family: 'Nunito', sans-serif;
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-icon {
            color: #ff6f61;
            font-size: 1.2rem;
        }

        .filters-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .filter-group {
            position: relative;
        }

        .filter-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            background: #fff;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            border-color: #ff6f61;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }

        .clear-filters-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .clear-filters-btn:hover {
            background: #5a6268;
            transform: translateY(-1px);
        }

        .results-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 0 5px;
        }

        .results-count {
            font-size: 0.95rem;
            color: #666;
            font-weight: 600;
        }

        /* Vets Section */
        .vets-section {
            padding: 60px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            border-radius: 2px;
        }

        .section-header h2 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            color: #ff6f61;
            font-weight: 800;
            letter-spacing: 1.2px;
        }

        .section-subtitle {
            font-size: 1.3rem;
            color: #5a6c7d;
            font-weight: 500;
            line-height: 1.8;
        }

        .vets-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 35px;
            margin-bottom: 60px;
        }

        .vet-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.08), 0 2px 8px rgba(0,0,0,0.04);
            padding: 35px 30px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255,111,97,0.05);
            position: relative;
            overflow: hidden;
        }

        .vet-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }

        .vet-card:hover::before {
            left: 0;
        }

        .vet-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(255,111,97,0.15), 0 8px 25px rgba(0,0,0,0.08);
            border-color: rgba(255,111,97,0.2);
        }

        .vet-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 4px solid #fff;
        }

        .vet-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .vet-avatar.initials {
            font-family: 'Nunito', sans-serif;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .vet-avatar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .vet-card:hover .vet-avatar::before {
            transform: translateX(100%);
        }

        .vet-card:hover .vet-avatar {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,111,97,0.4);
        }

        .vet-name {
            font-size: 1.8rem;
            margin: 0 0 8px 0;
            color: #2c3e50;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .vet-specialty {
            color: #ff6f61;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .vet-info {
            margin-bottom: 25px;
        }

        .vet-info-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 8px;
            color: #5a6c7d;
            font-weight: 500;
        }

        .vet-info-item i {
            color: #ff6f61;
            font-size: 0.9rem;
        }

        .vet-description {
            color: #5a6c7d;
            line-height: 1.7;
            margin-bottom: 25px;
            font-size: 1rem;
            font-weight: 500;
        }

        .vet-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .vet-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .vet-btn::before {
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

        .vet-btn:hover::before {
            left: 0;
        }

        .vet-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }

        .vet-btn.secondary {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            color: #ff6f61;
            border: 2px solid #ff6f61;
        }

        .vet-btn.secondary::before {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        }

        .vet-btn.secondary:hover {
            color: white;
        }

        .availability {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 15px;
        }

        .availability.available {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .availability.busy {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .availability.unavailable {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .rating {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-bottom: 15px;
        }

        .stars {
            color: #ffc107;
            font-size: 1.1rem;
        }

        .rating-text {
            color: #5a6c7d;
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* No Results */
        .no-results {
            text-align: center;
            padding: 80px 20px;
            color: #5a6c7d;
        }

        .no-results i {
            font-size: 4rem;
            color: #ff6f61;
            margin-bottom: 20px;
            opacity: 0.7;
        }

        .no-results h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #2c3e50;
            font-weight: 700;
        }

        .no-results p {
            font-size: 1.1rem;
            line-height: 1.6;
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
            .hero-section {
                padding: 100px 0 60px;
                background-attachment: scroll;
            }

            .hero-text h1 {
                font-size: 2.8rem;
                letter-spacing: 1.5px;
            }

            .vets-grid {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 30px;
            }
        }

        @media (max-width: 900px) {
            .hero-text h1 {
                font-size: 2.5rem;
                letter-spacing: 1px;
            }

            .hero-text p {
                font-size: 1.1rem;
            }

            .hero-content {
                padding: 0 15px;
            }

            .vets-section {
                padding: 40px 20px;
            }
            
            .section-header h2 {
                font-size: 2.2rem;
            }
            
            .vets-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .search-filter-section {
                margin: -10px 15px 0;
                padding: 25px 15px;
            }
            
            .filters-row {
                grid-template-columns: 1fr;
                gap: 15px;
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
            
            .header {
                padding: 40px 20px 30px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .vet-card {
                padding: 25px 20px 20px;
            }
            
            .vet-actions {
                flex-direction: column;
                gap: 8px;
            }
            
            .vet-btn {
                width: 100%;
                justify-content: center;
            }
            
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            
            .search-filter-section {
                margin: -10px 10px 0;
                padding: 20px 15px;
            }
            
            .search-bar {
                padding: 6px 15px;
            }
            
            .search-input {
                padding: 10px 12px;
                font-size: 0.9rem;
            }
            
            .filter-select {
                padding: 10px 12px;
                font-size: 0.9rem;
            }
            
            .clear-filters-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
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

        /* Page Container for content after header */
        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
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
            
            .vets-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 25px;
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

            .vets-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 600px) {
            .page-container {
                padding: 20px 10px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="header">
        <a href="{{ url('/vet-home') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Services
        </a>
        <div class="header-icon-container">
            <div class="header-icon">
                <span>👩‍⚕️</span>
            </div>
        </div>
        <h1>Our Veterinary Team</h1>
        <p>Meet our experienced and caring veterinary professionals</p>
    </div>

    <div class="page-container">

    <section class="search-filter-section">
        <div class="search-filter-container">
            <div class="search-bar">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" id="searchInput" placeholder="Search by name or specialty...">
            </div>

            <div class="filters-row">
                <div class="filter-group">
                    <select class="filter-select" id="specialtyFilter">
                        <option value="">All Specialties</option>
                        <option value="general">General Practice</option>
                        <option value="surgery">Surgery</option>
                        <option value="dermatology">Dermatology</option>
                        <option value="cardiology">Cardiology</option>
                        <option value="emergency">Emergency Medicine</option>
                        <option value="exotic">Exotic Animals</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select class="filter-select" id="availabilityFilter">
                        <option value="">All Availability</option>
                        <option value="available">Available Today</option>
                        <option value="busy">Busy</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select class="filter-select" id="experienceFilter">
                        <option value="">All Experience</option>
                        <option value="junior">5-10 years</option>
                        <option value="senior">10-15 years</option>
                        <option value="expert">15+ years</option>
                    </select>
                </div>
                <div class="filter-group">
                    <button class="clear-filters-btn" onclick="clearAllFilters()">
                        <i class="fas fa-times"></i> Clear Filters
                    </button>
                </div>
            </div>

            <div class="results-info">
                <div class="results-count" id="resultsCount">Showing 6 of 6 veterinarians</div>
            </div>
        </div>
    </section>

    <section class="vets-section">
        <div class="section-header">
            <h2>Our Veterinarians</h2>
            <p class="section-subtitle">Dedicated professionals committed to your pet's health and wellbeing</p>
        </div>

        <div class="vets-grid" id="vetsGrid">
            <!-- Dr. Rashida Rahman -->
            <div class="vet-card" data-name="Dr. Rashida Rahman" data-specialty="general" data-availability="available" data-experience="senior">
                <div class="vet-avatar initials" style="background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);">
                    RR
                </div>
                <h3 class="vet-name">Dr. Rashida Rahman</h3>
                <p class="vet-specialty">General Practice</p>
                <div class="availability available">
                    <i class="fas fa-circle"></i>
                    Available Today
                </div>
                <div class="rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="rating-text">(4.9/5)</span>
                </div>
                <div class="vet-info">
                    <div class="vet-info-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>15 years experience</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-clock"></i>
                        <span>9:00 AM - 6:00 PM</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+880 1711-234567</span>
                    </div>
                </div>
                <p class="vet-description">Specialized in comprehensive pet care with expertise in preventive medicine and general health checkups.</p>
                <div class="vet-actions">
                    <a href="{{ route('book.appointment') }}" class="vet-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Appointment
                    </a>
                    <a href="#" class="vet-btn secondary">
                        <i class="fas fa-user"></i>
                        View Profile
                    </a>
                </div>
            </div>

            <!-- Dr. Mohammad Karim -->
            <div class="vet-card" data-name="Dr. Mohammad Karim" data-specialty="surgery" data-availability="busy" data-experience="senior">
                <div class="vet-avatar initials" style="background: linear-gradient(135deg, #4a90e2 0%, #6bb6ff 100%);">
                    MK
                </div>
                <h3 class="vet-name">Dr. Mohammad Karim</h3>
                <p class="vet-specialty">Veterinary Surgeon</p>
                <div class="availability busy">
                    <i class="fas fa-circle"></i>
                    Busy Today
                </div>
                <div class="rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="rating-text">(4.8/5)</span>
                </div>
                <div class="vet-info">
                    <div class="vet-info-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>12 years experience</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-clock"></i>
                        <span>8:00 AM - 4:00 PM</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+880 1711-234568</span>
                    </div>
                </div>
                <p class="vet-description">Expert veterinary surgeon specializing in complex surgical procedures and emergency operations.</p>
                <div class="vet-actions">
                    <a href="{{ route('book.appointment') }}" class="vet-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Appointment
                    </a>
                    <a href="#" class="vet-btn secondary">
                        <i class="fas fa-user"></i>
                        View Profile
                    </a>
                </div>
            </div>

            <!-- Dr. Fatima Sultana -->
            <div class="vet-card" data-name="Dr. Fatima Sultana" data-specialty="dermatology" data-availability="available" data-experience="junior">
                <div class="vet-avatar initials" style="background: linear-gradient(135deg, #e74c3c 0%, #f39c12 100%);">
                    FS
                </div>
                <h3 class="vet-name">Dr. Fatima Sultana</h3>
                <p class="vet-specialty">Veterinary Dermatologist</p>
                <div class="availability available">
                    <i class="fas fa-circle"></i>
                    Available Today
                </div>
                <div class="rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="rating-text">(4.7/5)</span>
                </div>
                <div class="vet-info">
                    <div class="vet-info-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>10 years experience</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-clock"></i>
                        <span>10:00 AM - 7:00 PM</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+880 1711-234569</span>
                    </div>
                </div>
                <p class="vet-description">Specialized in treating skin conditions, allergies, and dermatological issues in pets.</p>
                <div class="vet-actions">
                    <a href="{{ route('book.appointment') }}" class="vet-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Appointment
                    </a>
                    <a href="#" class="vet-btn secondary">
                        <i class="fas fa-user"></i>
                        View Profile
                    </a>
                </div>
            </div>

            <!-- Dr. Abdul Hamid -->
            <div class="vet-card" data-name="Dr. Abdul Hamid" data-specialty="cardiology" data-availability="available" data-experience="expert">
                <div class="vet-avatar initials" style="background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);">
                    AH
                </div>
                <h3 class="vet-name">Dr. Abdul Hamid</h3>
                <p class="vet-specialty">Veterinary Cardiologist</p>
                <div class="availability available">
                    <i class="fas fa-circle"></i>
                    Available Today
                </div>
                <div class="rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="rating-text">(4.9/5)</span>
                </div>
                <div class="vet-info">
                    <div class="vet-info-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>18 years experience</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-clock"></i>
                        <span>9:00 AM - 5:00 PM</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+880 1711-234570</span>
                    </div>
                </div>
                <p class="vet-description">Expert in cardiovascular health, heart disease diagnosis and treatment for pets.</p>
                <div class="vet-actions">
                    <a href="{{ route('book.appointment') }}" class="vet-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Appointment
                    </a>
                    <a href="#" class="vet-btn secondary">
                        <i class="fas fa-user"></i>
                        View Profile
                    </a>
                </div>
            </div>

            <!-- Dr. Nasreen Akter -->
            <div class="vet-card" data-name="Dr. Nasreen Akter" data-specialty="emergency" data-availability="available" data-experience="senior">
                <div class="vet-avatar initials" style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);">
                    NA
                </div>
                <h3 class="vet-name">Dr. Nasreen Akter</h3>
                <p class="vet-specialty">Emergency Medicine</p>
                <div class="availability available">
                    <i class="fas fa-circle"></i>
                    Available 24/7
                </div>
                <div class="rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <span class="rating-text">(4.8/5)</span>
                </div>
                <div class="vet-info">
                    <div class="vet-info-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>13 years experience</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-clock"></i>
                        <span>24/7 Emergency</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+880 1777-987654</span>
                    </div>
                </div>
                <p class="vet-description">Specialized in emergency and critical care medicine, available for urgent pet health situations.</p>
                <div class="vet-actions">
                    <a href="{{ route('book.appointment') }}" class="vet-btn">
                        <i class="fas fa-ambulance"></i>
                        Emergency Call
                    </a>
                    <a href="#" class="vet-btn secondary">
                        <i class="fas fa-user"></i>
                        View Profile
                    </a>
                </div>
            </div>

            <!-- Dr. Mizanur Rahman -->
            <div class="vet-card" data-name="Dr. Mizanur Rahman" data-specialty="exotic" data-availability="unavailable" data-experience="junior">
                <div class="vet-avatar initials" style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);">
                    MR
                </div>
                <h3 class="vet-name">Dr. Mizanur Rahman</h3>
                <p class="vet-specialty">Exotic Animal Specialist</p>
                <div class="availability unavailable">
                    <i class="fas fa-circle"></i>
                    On Leave
                </div>
                <div class="rating">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <span class="rating-text">(4.6/5)</span>
                </div>
                <div class="vet-info">
                    <div class="vet-info-item">
                        <i class="fas fa-graduation-cap"></i>
                        <span>8 years experience</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-clock"></i>
                        <span>Currently Unavailable</span>
                    </div>
                    <div class="vet-info-item">
                        <i class="fas fa-phone"></i>
                        <span>+880 1711-234571</span>
                    </div>
                </div>
                <p class="vet-description">Expert in treating exotic pets including birds, reptiles, and small mammals.</p>
                <div class="vet-actions">
                    <a href="#" class="vet-btn" style="opacity: 0.6; cursor: not-allowed;">
                        <i class="fas fa-calendar-times"></i>
                        Currently Unavailable
                    </a>
                    <a href="#" class="vet-btn secondary">
                        <i class="fas fa-user"></i>
                        View Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="no-results" id="noVetsMessage" style="display: none;">
            <i class="fas fa-search"></i>
            <h3>No Veterinarians Found</h3>
            <p>Try adjusting your search criteria or filters to find available veterinarians.</p>
        </div>
    </section>
    </div>
@endsection

@section('scripts')
    <script>
        // Search and Filter Functionality - adapted from adopt_home.blade.php
        function initializeFilters() {
            const searchInput = document.getElementById('searchInput');
            const specialtyFilter = document.getElementById('specialtyFilter');
            const availabilityFilter = document.getElementById('availabilityFilter');
            const experienceFilter = document.getElementById('experienceFilter');
            const vetCards = document.querySelectorAll('.vet-card');
            const noVetsMessage = document.getElementById('noVetsMessage');
            const resultsCount = document.getElementById('resultsCount');

            function filterVets() {
                const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
                const specialtyValue = specialtyFilter ? specialtyFilter.value : '';
                const availabilityValue = availabilityFilter ? availabilityFilter.value : '';
                const experienceValue = experienceFilter ? experienceFilter.value : '';

                let visibleCount = 0;

                vetCards.forEach(card => {
                    const vetName = card.dataset.name ? card.dataset.name.toLowerCase() : '';
                    const vetSpecialty = card.dataset.specialty || '';
                    const vetAvailability = card.dataset.availability || '';
                    const vetExperience = card.dataset.experience || '';

                    const matchesSearch = !searchTerm || vetName.includes(searchTerm) || 
                        card.querySelector('.vet-specialty').textContent.toLowerCase().includes(searchTerm);
                    const matchesSpecialty = !specialtyValue || vetSpecialty === specialtyValue;
                    const matchesAvailability = !availabilityValue || vetAvailability === availabilityValue;
                    const matchesExperience = !experienceValue || vetExperience === experienceValue;

                    if (matchesSearch && matchesSpecialty && matchesAvailability && matchesExperience) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Update results count
                if (resultsCount) {
                    resultsCount.textContent = `Showing ${visibleCount} of ${vetCards.length} veterinarians`;
                }

                // Show/hide no vets message
                if (noVetsMessage) {
                    if (visibleCount === 0) {
                        noVetsMessage.style.display = 'block';
                    } else {
                        noVetsMessage.style.display = 'none';
                    }
                }
            }

            // Add event listeners with safety checks
            if (searchInput) searchInput.addEventListener('input', filterVets);
            if (specialtyFilter) specialtyFilter.addEventListener('change', filterVets);
            if (availabilityFilter) availabilityFilter.addEventListener('change', filterVets);
            if (experienceFilter) experienceFilter.addEventListener('change', filterVets);
        }

        // Clear all filters function
        function clearAllFilters() {
            const searchInput = document.getElementById('searchInput');
            const specialtyFilter = document.getElementById('specialtyFilter');
            const availabilityFilter = document.getElementById('availabilityFilter');
            const experienceFilter = document.getElementById('experienceFilter');

            if (searchInput) searchInput.value = '';
            if (specialtyFilter) specialtyFilter.value = '';
            if (availabilityFilter) availabilityFilter.value = '';
            if (experienceFilter) experienceFilter.value = '';

            // Trigger filter update
            if (searchInput) searchInput.dispatchEvent(new Event('input'));
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeFilters();

            // Initialize results count
            const resultsCount = document.getElementById('resultsCount');
            const vetCards = document.querySelectorAll('.vet-card');
            if (resultsCount) {
                resultsCount.textContent = `Showing ${vetCards.length} of ${vetCards.length} veterinarians`;
            }
        });

        // Add animation on scroll
        function animateOnScroll() {
            const cards = document.querySelectorAll('.vet-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        }

        // Initialize animations
        window.addEventListener('load', animateOnScroll);
    </script>
@endsection
