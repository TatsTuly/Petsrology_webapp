@extends('layouts.app')

@section('title', 'Dr. {{ $vet->name }} - Veterinary Profile - PETSROLOGY')

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

        /* Profile Container */
        .profile-container {
            max-width: 1200px;
            margin: -40px auto 0;
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .profile-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(255,111,97,0.1), 0 8px 25px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid rgba(255,111,97,0.05);
        }

        .profile-header {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 50px 40px;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: 700;
            color: white;
            box-shadow: 0 15px 40px rgba(255,111,97,0.3);
            border: 5px solid #fff;
            position: relative;
            overflow: hidden;
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-avatar.initials {
            font-family: 'Nunito', sans-serif;
            letter-spacing: 2px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .profile-name {
            font-size: 2.5rem;
            margin: 0 0 10px 0;
            color: #2c3e50;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .profile-specialty {
            color: #ff6f61;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .profile-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .stars {
            color: #ffc107;
            font-size: 1.4rem;
        }

        .rating-text {
            color: #5a6c7d;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .profile-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .profile-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 6px 20px rgba(255,111,97,0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .profile-btn::before {
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

        .profile-btn:hover::before {
            left: 0;
        }

        .profile-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 12px 30px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }

        .profile-btn.secondary {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            color: #ff6f61;
            border: 2px solid #ff6f61;
        }

        .profile-btn.secondary::before {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        }

        .profile-btn.secondary:hover {
            color: white;
        }

        /* Profile Content */
        .profile-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
        }

        .profile-section {
            padding: 40px;
        }

        .profile-section.left {
            border-right: 1px solid #e9ecef;
        }

        .section-title {
            font-size: 1.8rem;
            color: #2c3e50;
            margin-bottom: 25px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #ff6f61;
            font-size: 1.5rem;
        }

        .info-grid {
            display: grid;
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
            border-radius: 12px;
            border: 1px solid rgba(255,111,97,0.1);
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.08);
            border-color: rgba(255,111,97,0.2);
        }

        .info-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .info-content h4 {
            color: #2c3e50;
            font-size: 1.1rem;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .info-content p {
            color: #5a6c7d;
            font-size: 1rem;
            font-weight: 500;
            margin: 0;
        }

        .experience-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .price-info {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border: 2px solid #ffc107;
            border-radius: 15px;
            padding: 25px;
            margin-top: 20px;
        }

        .price-info h4 {
            color: #856404;
            font-size: 1.3rem;
            margin-bottom: 15px;
            font-weight: 800;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(133,100,4,0.2);
        }

        .price-item:last-child {
            border-bottom: none;
        }

        .price-label {
            color: #856404;
            font-weight: 600;
        }

        .price-value {
            color: #856404;
            font-weight: 800;
            font-size: 1.1rem;
        }

        .availability-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 15px;
        }

        .availability-status.available {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .description-section {
            grid-column: 1 / -1;
            padding: 40px;
            border-top: 1px solid #e9ecef;
            background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
        }

        .description-text {
            color: #5a6c7d;
            font-size: 1.1rem;
            line-height: 1.8;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 60px 20px 40px;
            }

            .profile-container {
                margin: -20px auto 0;
                padding: 0 15px;
            }

            .profile-header {
                padding: 30px 20px;
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
                font-size: 2.5rem;
            }

            .profile-name {
                font-size: 2rem;
            }

            .profile-specialty {
                font-size: 1.2rem;
            }

            .profile-content {
                grid-template-columns: 1fr;
            }

            .profile-section.left {
                border-right: none;
                border-bottom: 1px solid #e9ecef;
            }

            .profile-section {
                padding: 30px 20px;
            }

            .profile-actions {
                flex-direction: column;
            }

            .profile-btn {
                width: 100%;
                justify-content: center;
            }

            .back-btn {
                top: 15px;
                right: 15px;
                padding: 8px 15px;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .profile-header {
                padding: 25px 15px;
            }

            .profile-section {
                padding: 25px 15px;
            }

            .info-item {
                padding: 15px;
            }

            .price-info {
                padding: 20px;
            }

            .description-section {
                padding: 30px 15px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="header">
        <a href="{{ route('all.vets') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to All Vets
        </a>
    </div>

    <div class="profile-container">
        <div class="profile-card">
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    @if($vet->profile_image)
                        <img src="{{ $vet->getProfileImageUrl() }}" alt="Dr. {{ $vet->name }}">
                    @else
                        <div class="initials">
                            {{ strtoupper(substr($vet->name, 0, 2)) }}
                        </div>
                    @endif
                </div>
                <h1 class="profile-name">Dr. {{ $vet->name }}</h1>
                <p class="profile-specialty">
                    @if($vet->role == 'general_checkup')
                        General Practice Veterinarian
                    @elseif($vet->role == 'surgery')
                        Surgical Specialist
                    @elseif($vet->role == 'both')
                        General Practice & Surgical Specialist
                    @endif
                </p>
                <div class="profile-rating">
                    <div class="stars">
                        @php
                            $rating = $vet->getRating();
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
                    <span class="rating-text">({{ number_format($rating, 1) }}/5)</span>
                </div>
                <div class="profile-actions">
                    <a href="{{ route('book.appointment') }}" class="profile-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Appointment
                    </a>
                    <a href="tel:{{ $vet->phone }}" class="profile-btn secondary">
                        <i class="fas fa-phone"></i>
                        Call Now
                    </a>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="profile-content">
                <!-- Left Section - Contact & Basic Info -->
                <div class="profile-section left">
                    <h2 class="section-title">
                        <i class="fas fa-info-circle"></i>
                        Contact Information
                    </h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <h4>Phone Number</h4>
                                <p>{{ $vet->phone }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h4>Location</h4>
                                <p>{{ $vet->location }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h4>Visit Hours</h4>
                                <p>{{ \Carbon\Carbon::parse($vet->visit_start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($vet->visit_end_time)->format('g:i A') }}</p>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-calendar"></i>
                            </div>
                            <div class="info-content">
                                <h4>Available Days</h4>
                                <p>{{ $vet->getAvailableDaysFormatted() }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="availability-status available">
                        <i class="fas fa-circle"></i>
                        Available Today
                    </div>
                </div>

                <!-- Right Section - Experience & Pricing -->
                <div class="profile-section">
                    <h2 class="section-title">
                        <i class="fas fa-user-md"></i>
                        Professional Details
                    </h2>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="info-content">
                                <h4>Experience</h4>
                                <p>{{ $vet->experience }} years in veterinary practice</p>
                                <div class="experience-badge" style="margin-top: 10px;">
                                    <i class="fas fa-award"></i>
                                    @if($vet->experience >= 15)
                                        Expert Level
                                    @elseif($vet->experience >= 10)
                                        Senior Level
                                    @else
                                        Professional Level
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                            <div class="info-content">
                                <h4>Specialization</h4>
                                <p>
                                    @if($vet->role == 'general_checkup')
                                        Comprehensive pet care, health checkups, preventive medicine, vaccinations
                                    @elseif($vet->role == 'surgery')
                                        Surgical procedures, complex operations, post-operative care
                                    @elseif($vet->role == 'both')
                                        Complete veterinary care including general practice and surgical procedures
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Information -->
                    <div class="price-info">
                        <h4><i class="fas fa-dollar-sign"></i> Service Pricing</h4>
                        @if($vet->role == 'general_checkup' || $vet->role == 'both')
                            @if($vet->general_price)
                                <div class="price-item">
                                    <span class="price-label">General Checkup</span>
                                    <span class="price-value">৳{{ number_format($vet->general_price, 0) }}</span>
                                </div>
                            @endif
                        @endif
                        
                        @if($vet->role == 'surgery' || $vet->role == 'both')
                            @if($vet->surgery_price_min && $vet->surgery_price_max)
                                <div class="price-item">
                                    <span class="price-label">Surgery</span>
                                    <span class="price-value">৳{{ number_format($vet->surgery_price_min, 0) }} - ৳{{ number_format($vet->surgery_price_max, 0) }}</span>
                                </div>
                            @endif
                        @endif
                        
                        <div class="price-item">
                            <span class="price-label">Consultation</span>
                            <span class="price-value">Contact for rates</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="description-section">
                <h2 class="section-title" style="justify-content: center; margin-bottom: 30px;">
                    <i class="fas fa-heart"></i>
                    About Dr. {{ $vet->name }}
                </h2>
                <p class="description-text">
                    Dr. {{ $vet->name }} is a dedicated veterinary professional with {{ $vet->experience }} years of experience in 
                    @if($vet->role == 'general_checkup')
                        providing comprehensive pet care and health services. Specializing in preventive medicine, health checkups, and general veterinary care, Dr. {{ $vet->name }} is committed to keeping your pets healthy and happy.
                    @elseif($vet->role == 'surgery')
                        specialized surgical procedures and advanced veterinary care. With expertise in complex surgical operations, Dr. {{ $vet->name }} provides the highest level of surgical care for your beloved pets.
                    @elseif($vet->role == 'both')
                        comprehensive veterinary care, offering both general practice and specialized surgical services. Dr. {{ $vet->name }} provides complete healthcare solutions for your pets, from routine checkups to complex surgical procedures.
                    @endif
                    
                    Located in {{ $vet->location }}, Dr. {{ $vet->name }} is available for consultations and treatments, ensuring your pet receives the best possible care with a compassionate and professional approach.
                </p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add smooth scrolling animation
        document.addEventListener('DOMContentLoaded', function() {
            // Animate profile card on load
            const profileCard = document.querySelector('.profile-card');
            if (profileCard) {
                profileCard.style.opacity = '0';
                profileCard.style.transform = 'translateY(50px)';
                profileCard.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                
                setTimeout(() => {
                    profileCard.style.opacity = '1';
                    profileCard.style.transform = 'translateY(0)';
                }, 100);
            }

            // Animate info items
            const infoItems = document.querySelectorAll('.info-item');
            infoItems.forEach((item, index) => {
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px)';
                item.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
                
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'translateY(0)';
                }, 300 + (index * 100));
            });
        });

        // Add phone number formatting
        const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
        phoneLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Optional: Add analytics tracking here
                console.log('Phone call initiated to:', this.getAttribute('href'));
            });
        });
    </script>
@endsection
