@extends('layouts.app')

@section('title', 'Adoption Details - PETSROLOGY')

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

        /* Main Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 40px;
        }

        /* Pet Details Section */
        .pet-details {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.12), 0 2px 8px rgba(0,0,0,0.04);
            padding: 40px;
            border: 1px solid rgba(255,111,97,0.05);
            position: relative;
            overflow: hidden;
        }

        .pet-details::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        }

        .pet-header {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
        }

        .pet-image-large {
            width: 280px;
            height: 280px;
            border-radius: 20px;
            object-fit: cover;
            box-shadow: 0 8px 25px rgba(255,111,97,0.15);
            flex-shrink: 0;
        }

        .pet-info-main {
            flex: 1;
        }

        .pet-name {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .pet-breed {
            font-size: 1.3rem;
            color: #ff6f61;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .pet-basic-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            border-left: 4px solid #ff6f61;
        }

        .info-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            font-size: 1.1rem;
            color: #333;
            font-weight: 700;
            margin-top: 5px;
        }

        .pet-tags {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .pet-tag {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(255,111,97,0.3);
        }

        /* Pet Description */
        .pet-description {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.5rem;
            color: #2c3e50;
            font-weight: 800;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: #ff6f61;
        }

        .description-text {
            font-size: 1rem;
            color: #5a6c7d;
            line-height: 1.8;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            border-left: 4px solid #ff6f61;
        }

        /* Health Information */
        .health-info {
            margin-bottom: 30px;
        }

        .health-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .health-item {
            background: #e8f5e8;
            padding: 15px;
            border-radius: 12px;
            border-left: 4px solid #28a745;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .health-item i {
            color: #28a745;
            font-size: 1.2rem;
        }

        .health-item.pending {
            background: #fff3cd;
            border-left-color: #ffc107;
        }

        .health-item.pending i {
            color: #ffc107;
        }

        /* Adoption Sidebar */
        .adoption-sidebar {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .adoption-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.12), 0 2px 8px rgba(0,0,0,0.04);
            padding: 30px;
            border: 1px solid rgba(255,111,97,0.05);
            position: relative;
            overflow: hidden;
        }

        .adoption-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
        }

        .card-title {
            font-size: 1.3rem;
            color: #2c3e50;
            font-weight: 800;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: #ff6f61;
        }

        /* Adoption Fee */
        .adoption-fee {
            text-align: center;
            margin-bottom: 20px;
        }

        .fee-amount {
            font-size: 2.5rem;
            font-weight: 800;
            color: #ff6f61;
            margin-bottom: 5px;
        }

        .fee-includes {
            font-size: 0.9rem;
            color: #666;
            font-style: italic;
        }

        /* Adoption Process */
        .process-steps {
            list-style: none;
        }

        .process-step {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .process-step:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .step-number {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .step-content h4 {
            color: #333;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .step-content p {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Requirements */
        .requirement-list {
            list-style: none;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .requirement-item i {
            color: #ff6f61;
            font-size: 1.1rem;
        }

        /* Contact Information */
        .contact-info {
            text-align: center;
        }

        .contact-item {
            margin-bottom: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .contact-item i {
            color: #ff6f61;
            font-size: 1.2rem;
            margin-bottom: 8px;
            display: block;
        }

        .contact-item strong {
            display: block;
            color: #333;
            margin-bottom: 5px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 25px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 25px;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            text-decoration: none;
            text-align: center;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,111,97,0.4);
            text-decoration: none;
            color: white;
        }

        .btn-secondary {
            background: transparent;
            color: #ff6f61;
            border: 2px solid #ff6f61;
            padding: 12px 25px;
            border-radius: 25px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .btn-secondary:hover {
            background: #ff6f61;
            color: white;
            text-decoration: none;
        }

        /* Contact Section in Left Container */
        .pet-contact-section {
            margin-top: 30px;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 25px;
        }

        .contact-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.08), 0 1px 4px rgba(0,0,0,0.04);
            border: 1px solid rgba(255,111,97,0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .contact-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .contact-card:hover::before {
            transform: translateX(0);
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.15), 0 3px 8px rgba(0,0,0,0.08);
        }

        .contact-icon-wrapper {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            box-shadow: 0 4px 12px rgba(255,111,97,0.3);
        }

        .contact-icon-wrapper i {
            color: white;
            font-size: 1.2rem;
        }

        .contact-details h4 {
            color: #2c3e50;
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0 0 8px 0;
        }

        .contact-details p {
            color: #ff6f61;
            font-size: 1rem;
            font-weight: 600;
            margin: 0 0 5px 0;
        }

        .contact-note {
            color: #666;
            font-size: 0.85rem;
            font-style: italic;
        }

        /* Animation for page load */
        .content-grid {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Additional Professional Styling */
        .highlight-box {
            background: linear-gradient(135deg, rgba(255,111,97,0.1) 0%, rgba(255,148,114,0.05) 100%);
            border: 1px solid rgba(255,111,97,0.2);
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }

        .status-badge {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-badge.urgent {
            background: #dc3545;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .page-container {
                max-width: 1000px;
                padding: 30px 20px;
            }
            
            .content-grid {
                gap: 30px;
            }
        }

        @media (max-width: 900px) {
            .page-container {
                padding: 30px 15px;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
                gap: 30px;
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

            .pet-header {
                flex-direction: column;
                text-align: center;
            }

            .pet-image-large {
                width: 100%;
                max-width: 300px;
                margin: 0 auto;
            }

            .pet-basic-info {
                grid-template-columns: 1fr;
            }

            .health-grid {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .pet-name {
                font-size: 2rem;
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
        <a href="{{ url('/adopt-home') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Pets
        </a>
        <div class="header-icon-container">
            <div class="header-icon">
                <span>🐾</span>
            </div>
        </div>
        <h1>Pet Adoption Details</h1>
        <p>Learn more about your potential new family member</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 15px 20px; text-align: center; margin: 0; box-shadow: 0 2px 10px rgba(40,167,69,0.3);">
            <div style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: center; gap: 10px;">
                <i class="fas fa-check-circle" style="font-size: 1.2rem;"></i>
                <span style="font-weight: 600; font-family: 'Nunito', sans-serif;">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="page-container">

        <div class="content-grid">
        <!-- Pet Details Section -->
        <div class="pet-details">
            <div class="pet-header">
                <img src="{{ $adoptionPost && $adoptionPost->image ? asset('storage/' . $adoptionPost->image) : '' }}" alt="{{ $adoptionPost->pet_name ?? '' }}" class="pet-image-large">
                <div class="pet-info-main">
                    <h1 class="pet-name">{{ $adoptionPost->pet_name ?? '' }}</h1>
                    @if(!empty($adoptionPost->breed))
                        <p class="pet-breed">{{ $adoptionPost->breed }}</p>
                    @endif
                    @if(!empty($adoptionPost->status))
                        <span class="status-badge">{{ $adoptionPost->status }}</span>
                    @endif
                    <div class="pet-basic-info">
                        <div class="info-item">
                            <div class="info-label">Age</div>
                            <div class="info-value">{{ $adoptionPost->age ?? ($adoptionPost->pet_age ?? '') }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Gender</div>
                            <div class="info-value">{{ $adoptionPost->gender ?? '' }}</div>
                        </div>
                        @if(!empty($adoptionPost->weight))
                        <div class="info-item">
                            <div class="info-label">Weight</div>
                            <div class="info-value">{{ $adoptionPost->weight }}</div>
                        </div>
                        @endif
                        @if(!empty($adoptionPost->location))
                        <div class="info-item">
                            <div class="info-label">Location</div>
                            <div class="info-value">{{ $adoptionPost->location }}</div>
                        </div>
                        @endif
                    </div>
                    @if(!empty($adoptionPost->tags))
                    <div class="pet-tags">
                        @foreach(explode(',', $adoptionPost->tags) as $tag)
                            <span class="pet-tag">{{ trim($tag) }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- Pet Description -->
            @if(!empty($adoptionPost->description))
            <div class="pet-description">
                <h3 class="section-title">
                    <i class="fas fa-heart"></i>
                    About {{ $adoptionPost->pet_name }}
                </h3>
                <div class="description-text">
                    {{ $adoptionPost->description }}
                </div>
            </div>
            @endif

            <!-- Health Information -->
            @if(!empty($adoptionPost->health_info))
            <div class="health-info">
                <h3 class="section-title">
                    <i class="fas fa-stethoscope"></i>
                    Health & Medical Information
                </h3>
                <div class="health-grid">
                    @foreach(explode('|', $adoptionPost->health_info) as $health)
                        <div class="health-item">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ $health }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if(!empty($adoptionPost->special_care))
            <div class="highlight-box">
                <h4 style="color: #ff6f61; margin-bottom: 10px;">
                    <i class="fas fa-info-circle"></i>
                    Special Care Notes
                </h4>
                <p style="margin: 0; color: #5a6c7d;">
                    {{ $adoptionPost->special_care }}
                </p>
            </div>
            @endif

            <!-- Contact Information -->
            <div class="pet-contact-section">
                <h3 class="section-title">
                    <i class="fas fa-phone"></i>
                    Contact Our Adoption Team
                </h3>
                <div class="contact-grid">
                    <div class="contact-card">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Call Us</h4>
                            <p>+880 1234-567890</p>
                            <span class="contact-note">Available during business hours</span>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email Us</h4>
                            <p>adopt@petsrology.com</p>
                            <span class="contact-note">We respond within 24 hours</span>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Visit Hours</h4>
                            <p>Daily: 9:00 AM - 6:00 PM</p>
                            <span class="contact-note">No appointment needed</span>
                        </div>
                    </div>
                    <div class="contact-card">
                        <div class="contact-icon-wrapper">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Location</h4>
                            <p>Dhaka Pet Center</p>
                            <span class="contact-note">Easy parking available</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adoption Sidebar -->
        <div class="adoption-sidebar">
            <!-- Adoption Fee -->
            <div class="adoption-card">
                <h3 class="card-title">
                    <i class="fas fa-tag"></i>
                    Adoption Fee
                </h3>
                <div class="adoption-fee">
                    <div class="fee-amount">{{ $adoptionPost->fee ?? '' }}</div>
                    @if(!empty($adoptionPost->fee_includes))
                        <div class="fee-includes">{{ $adoptionPost->fee_includes }}</div>
                    @endif
                </div>
                <div class="action-buttons">
                    <a href="#" class="btn-primary" onclick="startAdoptionProcess()">
                        <i class="fas fa-heart"></i>
                        Start Adoption Process
                    </a>
                    <a href="#" class="btn-secondary" onclick="scheduleVisit()">
                        <i class="fas fa-calendar"></i>
                        Schedule a Visit
                    </a>
                </div>
            </div>

            <!-- Adoption Process -->
            <div class="adoption-card">
                <h3 class="card-title">
                    <i class="fas fa-list-check"></i>
                    Adoption Process
                </h3>
                <ul class="process-steps">
                    <li class="process-step">
                        <div class="step-number">1</div>
                        <div class="step-content">
                            <h4>Submit Application</h4>
                            <p>Fill out our adoption form with your information and preferences.</p>
                        </div>
                    </li>
                    <li class="process-step">
                        <div class="step-number">2</div>
                        <div class="step-content">
                            <h4>Meet & Greet</h4>
                            <p>Schedule a visit to meet your potential new companion.</p>
                        </div>
                    </li>
                    <li class="process-step">
                        <div class="step-number">3</div>
                        <div class="step-content">
                            <h4>Home Check</h4>
                            <p>Our team will visit to ensure a safe environment.</p>
                        </div>
                    </li>
                    <li class="process-step">
                        <div class="step-number">4</div>
                        <div class="step-content">
                            <h4>Finalize Adoption</h4>
                            <p>Complete paperwork and take your new pet home!</p>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Requirements -->
            <div class="adoption-card">
                <h3 class="card-title">
                    <i class="fas fa-clipboard-check"></i>
                    Requirements
                </h3>
                <ul class="requirement-list">
                    <li class="requirement-item">
                        <i class="fas fa-check"></i>
                        <span>Valid government ID</span>
                    </li>
                    <li class="requirement-item">
                        <i class="fas fa-check"></i>
                        <span>Proof of residence</span>
                    </li>
                    <li class="requirement-item">
                        <i class="fas fa-check"></i>
                        <span>Landlord permission (if renting)</span>
                    </li>
                    <li class="requirement-item">
                        <i class="fas fa-check"></i>
                        <span>Meet all family members</span>
                    </li>
                    <li class="requirement-item">
                        <i class="fas fa-check"></i>
                        <span>Commitment to pet care</span>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Function to start adoption process
        function startAdoptionProcess() {
            // Get current pet name from the page (Blade variable)
            var petName = @json($adoptionPost->pet_name ?? 'milo');
            window.location.href = `/adoption-form?pet=${encodeURIComponent(petName)}`;
        }

        // Function to schedule a visit
        function scheduleVisit() {
            var petName = @json($adoptionPost->pet_name ?? 'milo');
            alert('Scheduling a visit to meet ' + petName + '. This will open the visit scheduling system.');
        }
    </script>
@endsection
