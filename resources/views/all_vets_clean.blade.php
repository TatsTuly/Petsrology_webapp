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

        /* No vets available styling */
        .no-vets-available {
            text-align: center;
            padding: 80px 20px;
            color: #5a6c7d;
            grid-column: 1 / -1;
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
            
            .vets-grid {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 30px;
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
            
            .search-filter-section {
                margin: -10px 15px 0;
                padding: 25px 15px;
            }
            
            .filters-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        @media (max-width: 600px) {
            .page-container {
                padding: 20px 10px;
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
                <div class="results-count" id="resultsCount">
                    Showing {{ $vets->count() }} of {{ $vets->count() }} veterinarians
                </div>
            </div>
        </div>
    </section>

    <section class="vets-section">
        <div class="section-header">
            <h2>Our Veterinarians</h2>
            <p class="section-subtitle">Dedicated professionals committed to your pet's health and wellbeing</p>
        </div>

        <div class="vets-grid" id="vetsGrid">
            @if($vets->count() > 0)
                @foreach($vets as $vet)
                    <div class="vet-card" 
                         data-name="Dr. {{ $vet->name }}" 
                         data-specialty="{{ $vet->role }}" 
                         data-availability="available" 
                         data-experience="senior">
                        <div class="vet-avatar">
                            @if($vet->profile_image)
                                <img src="{{ $vet->getProfileImageUrl() }}" alt="Dr. {{ $vet->name }}">
                            @else
                                <div class="initials" style="background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);">
                                    {{ strtoupper(substr($vet->name, 0, 2)) }}
                                </div>
                            @endif
                        </div>
                        <h3 class="vet-name">Dr. {{ $vet->name }}</h3>
                        <p class="vet-specialty">
                            @if($vet->role == 'general_checkup')
                                General Practice
                            @elseif($vet->role == 'surgery')
                                Surgical Specialist
                            @elseif($vet->role == 'both')
                                General & Surgical
                            @endif
                        </p>
                        <div class="availability available">
                            <i class="fas fa-circle"></i>
                            Available Today
                        </div>
                        <div class="rating">
                            <div class="stars">
                                @php
                                    $rating = $vet->rating ?? 4.5;
                                    $fullStars = floor($rating);
                                    $hasHalfStar = ($rating - $fullStars) >= 0.5;
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $fullStars)
                                        <i class="fas fa-star"></i>
                                    @elseif($i == $fullStars + 1 && $hasHalfStar)
                                        <i class="fas fa-star-half-alt"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="rating-text">({{ number_format($vet->rating ?? 4.5, 1) }}/5)</span>
                        </div>
                        <div class="vet-info">
                            <div class="vet-info-item">
                                <i class="fas fa-graduation-cap"></i>
                                <span>{{ $vet->experience }} years experience</span>
                            </div>
                            <div class="vet-info-item">
                                <i class="fas fa-clock"></i>
                                <span>{{ \Carbon\Carbon::parse($vet->visit_start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($vet->visit_end_time)->format('g:i A') }}</span>
                            </div>
                            <div class="vet-info-item">
                                <i class="fas fa-phone"></i>
                                <span>{{ $vet->phone }}</span>
                            </div>
                        </div>
                        <p class="vet-description">
                            Specialized in {{ $vet->role == 'general_checkup' ? 'comprehensive pet care and general health checkups' : ($vet->role == 'surgery' ? 'surgical procedures and specialized treatments' : 'comprehensive care and surgical procedures') }}.
                        </p>
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
                @endforeach
            @else
                <div class="no-vets-available">
                    <i class="fas fa-user-md" style="font-size: 3rem; color: #ccc; margin-bottom: 20px;"></i>
                    <h3 style="color: #666; margin-bottom: 10px;">No Veterinarians Available</h3>
                    <p style="color: #999;">We don't have any approved veterinarians at the moment. Please check back later.</p>
                </div>
            @endif
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
        // Search and Filter Functionality
        function initializeFilters() {
            const searchInput = document.getElementById('searchInput');
            const specialtyFilter = document.getElementById('specialtyFilter');
            const availabilityFilter = document.getElementById('availabilityFilter');
            const experienceFilter = document.getElementById('experienceFilter');
            const vetCards = document.querySelectorAll('.vet-card');
            const noVetsMessage = document.getElementById('noVetsMessage');
            const resultsCount = document.getElementById('resultsCount');

            function filterVets() {
                const searchTerm = searchInput.value.toLowerCase();
                const specialty = specialtyFilter.value;
                const availability = availabilityFilter.value;
                const experience = experienceFilter.value;

                let visibleCount = 0;

                vetCards.forEach(card => {
                    const vetName = card.dataset.name.toLowerCase();
                    const vetSpecialty = card.dataset.specialty;
                    const vetAvailability = card.dataset.availability;
                    const vetExperience = card.dataset.experience;

                    const matchesSearch = !searchTerm || vetName.includes(searchTerm);
                    const matchesSpecialty = !specialty || vetSpecialty === specialty;
                    const matchesAvailability = !availability || vetAvailability === availability;
                    const matchesExperience = !experience || vetExperience === experience;

                    const isVisible = matchesSearch && matchesSpecialty && matchesAvailability && matchesExperience;

                    if (isVisible) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Update results count
                const totalVets = {{ $vets->count() }};
                resultsCount.textContent = `Showing ${visibleCount} of ${totalVets} veterinarians`;

                // Show/hide no results message
                if (visibleCount === 0) {
                    noVetsMessage.style.display = 'block';
                } else {
                    noVetsMessage.style.display = 'none';
                }
            }

            // Attach event listeners
            searchInput.addEventListener('input', filterVets);
            specialtyFilter.addEventListener('change', filterVets);
            availabilityFilter.addEventListener('change', filterVets);
            experienceFilter.addEventListener('change', filterVets);
        }

        function clearAllFilters() {
            document.getElementById('searchInput').value = '';
            document.getElementById('specialtyFilter').value = '';
            document.getElementById('availabilityFilter').value = '';
            document.getElementById('experienceFilter').value = '';
            
            // Re-run the filter function to show all vets
            const event = new Event('input');
            document.getElementById('searchInput').dispatchEvent(event);
        }

        // Initialize filters when page loads
        document.addEventListener('DOMContentLoaded', initializeFilters);
    </script>
@endsection
