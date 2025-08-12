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
                <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=280&h=280&fit=crop&auto=format" alt="Milo" class="pet-image-large" id="petImage">
                <div class="pet-info-main">
                    <h1 class="pet-name" id="petName">Milo</h1>
                    <p class="pet-breed" id="petBreed">Mixed Breed Cat</p>
                    <span class="status-badge" id="statusBadge">Available</span>
                    
                    <div class="pet-basic-info">
                        <div class="info-item">
                            <div class="info-label">Age</div>
                            <div class="info-value" id="petAge">1 Year Old</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Gender</div>
                            <div class="info-value" id="petGender">Female</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Weight</div>
                            <div class="info-value" id="petWeight">4.2 kg</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Location</div>
                            <div class="info-value" id="petLocation">Dhaka Center</div>
                        </div>
                    </div>

                    <div class="pet-tags">
                        <span class="pet-tag">Friendly</span>
                        <span class="pet-tag">Indoor Cat</span>
                        <span class="pet-tag">Playful</span>
                        <span class="pet-tag">Good with Kids</span>
                    </div>
                </div>
            </div>

            <!-- Pet Description -->
            <div class="pet-description">
                <h3 class="section-title">
                    <i class="fas fa-heart"></i>
                    About Milo
                </h3>
                <div class="description-text">
                    Milo is a sweet and affectionate mixed breed cat who loves to play and cuddle. She has been with us for 3 months and has shown incredible resilience and love for humans. Milo is perfect for families with children and gets along well with other cats. She enjoys interactive toys, sunny windowsills, and gentle pets. This beautiful girl is looking for a loving forever home where she can share all the love she has to give.
                </div>
            </div>

            <!-- Health Information -->
            <div class="health-info">
                <h3 class="section-title">
                    <i class="fas fa-stethoscope"></i>
                    Health & Medical Information
                </h3>
                <div class="health-grid">
                    <div class="health-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Vaccinated</span>
                    </div>
                    <div class="health-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Spayed</span>
                    </div>
                    <div class="health-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Microchipped</span>
                    </div>
                    <div class="health-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Dewormed</span>
                    </div>
                    <div class="health-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Health Check Complete</span>
                    </div>
                    <div class="health-item pending">
                        <i class="fas fa-clock"></i>
                        <span>Dental Cleaning Scheduled</span>
                    </div>
                </div>
            </div>

            <div class="highlight-box">
                <h4 style="color: #ff6f61; margin-bottom: 10px;">
                    <i class="fas fa-info-circle"></i>
                    Special Care Notes
                </h4>
                <p style="margin: 0; color: #5a6c7d;">
                    Milo prefers quiet environments and may need a few days to adjust to her new home. She's very food-motivated and responds well to treats during training sessions.
                </p>
            </div>

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
                    <div class="fee-amount">৳2,500</div>
                    <div class="fee-includes">Includes vaccinations, spaying, and microchip</div>
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
            // Get current pet name from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const petName = urlParams.get('pet') || 'milo';
            
            // Redirect to adoption form with pet parameter
            window.location.href = `/adoption-form?pet=${encodeURIComponent(petName)}`;
        }

        // Function to schedule a visit
        function scheduleVisit() {
            // Show visit scheduling modal or redirect to scheduling page
            alert('Scheduling a visit to meet ' + document.getElementById('petName').textContent + '. This will open the visit scheduling system.');
            // In a real implementation, this would open a calendar/scheduling system
        }

        // Function to load pet data (this would typically come from the backend)
        function loadPetData(petName) {
            // Pet database - in a real app, this would come from the backend
            const petDatabase = {
                'milo': {
                    name: 'Milo',
                    breed: 'Mixed Breed Cat',
                    age: '1 Year Old',
                    gender: 'Female',
                    weight: '4.2 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Milo is a sweet and affectionate mixed breed cat who loves to play and cuddle. She has been with us for 3 months and has shown incredible resilience and love for humans. Milo is perfect for families with children and gets along well with other cats.',
                    fee: '৳2,500',
                    tags: ['Friendly', 'Indoor Cat', 'Playful', 'Good with Kids'],
                    health: {
                        completed: ['Vaccinated', 'Spayed', 'Microchipped', 'Dewormed', 'Health Check Complete'],
                        pending: ['Dental Cleaning Scheduled']
                    },
                    specialCare: 'Milo prefers quiet environments and may need a few days to adjust to her new home. She\'s very food-motivated and responds well to treats during training sessions.'
                },
                'sir whiskerlot': {
                    name: 'Sir Whiskerlot',
                    breed: 'Maine Coon',
                    age: '2 Years Old',
                    gender: 'Female',
                    weight: '6.8 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1573865526739-10659fec78a5?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Sir Whiskerlot is a majestic Maine Coon with a gentle temperament. Despite her regal name, she is very calm and loves to be petted. She would be perfect for a quiet household and enjoys lounging in sunny spots.',
                    fee: '৳3,500',
                    tags: ['Calm', 'Large', 'Gentle', 'Quiet'],
                    health: {
                        completed: ['Vaccinated', 'Spayed', 'Microchipped', 'Dewormed', 'Health Check Complete', 'Grooming Complete'],
                        pending: []
                    },
                    specialCare: 'Sir Whiskerlot has a long coat that requires daily brushing to prevent matting. She enjoys quiet spaces and may hide initially but warms up quickly with patience.'
                },
                'buddy': {
                    name: 'Buddy',
                    breed: 'Golden Retriever',
                    age: '2 Years Old',
                    gender: 'Male',
                    weight: '28 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1552053831-71594a27632d?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Buddy is an energetic and loyal Golden Retriever who loves playing fetch and swimming. He is well-trained and great with children. Buddy needs an active family who can provide him with plenty of exercise and mental stimulation.',
                    fee: '৳5,000',
                    tags: ['Active', 'Large', 'Family-friendly', 'Trained'],
                    health: {
                        completed: ['Vaccinated', 'Neutered', 'Microchipped', 'Dewormed', 'Health Check Complete', 'Hip Screening Normal'],
                        pending: ['Annual Booster Due']
                    },
                    specialCare: 'Buddy requires daily exercise (2+ hours) and mental stimulation. He loves water activities and needs regular grooming due to his double coat. Best suited for active families with a yard.'
                },
                'luna': {
                    name: 'Luna',
                    breed: 'Labrador',
                    age: '1.5 Years Old',
                    gender: 'Female',
                    weight: '25 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Luna is a playful and energetic Labrador who loves water activities. She is very social and gets along well with other dogs and children. Luna needs an active family who enjoys outdoor activities.',
                    fee: '৳4,500',
                    tags: ['Playful', 'Medium', 'Swimming', 'Social'],
                    health: {
                        completed: ['Vaccinated', 'Spayed', 'Microchipped', 'Dewormed', 'Health Check Complete'],
                        pending: ['Swimming Safety Assessment']
                    },
                    specialCare: 'Luna is a strong swimmer but should always be supervised around water. She needs plenty of exercise and mental stimulation. Great with children but may be too energetic for toddlers initially.'
                },
                'charlie': {
                    name: 'Charlie',
                    breed: 'Parakeet',
                    age: '6 Months Old',
                    gender: 'Male',
                    weight: '0.8 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1452570053594-1b985d6ea890?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Charlie is a vibrant and talkative parakeet who loves to interact with people. He can learn words and phrases quickly and enjoys playing with toys. Charlie needs someone who can spend time teaching him and providing mental stimulation.',
                    fee: '৳1,500',
                    tags: ['Vocal', 'Small', 'Colorful', 'Interactive'],
                    health: {
                        completed: ['Health Check Complete', 'Wing Clipping Optional', 'Beak & Nail Trim'],
                        pending: ['Quarantine Period Complete']
                    },
                    specialCare: 'Charlie needs a spacious cage, daily social interaction, and mental stimulation with toys. He requires a varied diet including fresh fruits and vegetables. Keep away from drafts and strong odors.'
                },
                'mochi': {
                    name: 'Mochi',
                    breed: 'Persian Cat',
                    age: '3 Years Old',
                    gender: 'Female',
                    weight: '5.5 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Mochi is a beautiful Persian cat with special needs. She is very quiet and loves to cuddle. Despite her age, she has so much love to give and would be perfect for someone looking for a calm, gentle companion.',
                    fee: '৳2,000',
                    tags: ['Quiet', 'Cuddly', 'Senior', 'Special Needs'],
                    health: {
                        completed: ['Vaccinated', 'Spayed', 'Microchipped', 'Dewormed'],
                        pending: ['Eye Treatment Ongoing', 'Special Diet Required']
                    },
                    specialCare: 'Mochi has mild eye issues requiring daily cleaning with saline solution. She needs a special diet for sensitive digestion and daily grooming due to her long coat. Perfect for quiet homes with patient owners.'
                },
                'snowball': {
                    name: 'Snowball',
                    breed: 'Holland Lop Rabbit',
                    age: '8 Months Old',
                    gender: 'Female',
                    weight: '1.8 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Snowball is an adorable Holland Lop rabbit who is litter trained and very gentle. She loves fresh vegetables and enjoys hopping around in safe spaces. Perfect for families looking for a quiet, low-maintenance pet.',
                    fee: '৳1,800',
                    tags: ['Quiet', 'Small', 'Soft', 'Litter Trained'],
                    health: {
                        completed: ['Health Check Complete', 'Spayed', 'Nail Trimming', 'Teeth Check Normal'],
                        pending: ['Habitat Setup Consultation']
                    },
                    specialCare: 'Snowball needs a spacious hutch with hiding spots and daily exercise time outside the cage. She requires fresh hay daily, limited pellets, and fresh vegetables. Keep away from loud noises and sudden movements.'
                },
                'max': {
                    name: 'Max',
                    breed: 'Beagle',
                    age: '10 Months Old',
                    gender: 'Male',
                    weight: '12 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1551717743-49959800b1f6?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Max is a curious and friendly Beagle puppy who loves exploring and playing. He is house trained and gets along wonderfully with children. Max would be perfect for an active family who enjoys outdoor adventures.',
                    fee: '৳4,200',
                    tags: ['Curious', 'Medium', 'Good with kids', 'House Trained'],
                    health: {
                        completed: ['Vaccinated', 'Neutered', 'Microchipped', 'Dewormed', 'House Training Complete'],
                        pending: ['Obedience Training Recommended']
                    },
                    specialCare: 'Max is still a puppy and needs consistent training and socialization. He requires regular exercise and mental stimulation to prevent destructive behavior. Great with children but needs supervision during play.'
                },
                'whiskers': {
                    name: 'Whiskers',
                    breed: 'Tabby Cat',
                    age: '8 Months Old',
                    gender: 'Male',
                    weight: '3.8 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1533738363-b7f9aef128ce?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Whiskers is an affectionate young tabby cat who loves attention and quiet spaces. He is neutered and loves to purr when petted. Perfect for someone looking for an indoor companion who enjoys calm environments.',
                    fee: '৳2,200',
                    tags: ['Affectionate', 'Indoor', 'Quiet', 'Neutered'],
                    health: {
                        completed: ['Vaccinated', 'Neutered', 'Microchipped', 'Dewormed', 'Health Check Complete'],
                        pending: ['Behavioral Assessment Complete']
                    },
                    specialCare: 'Whiskers is very affectionate but can be shy with strangers initially. He prefers quiet environments and indoor living. Responds well to gentle interaction and regular feeding schedules.'
                },
                'bella': {
                    name: 'Bella',
                    breed: 'German Shepherd',
                    age: '5 Years Old',
                    gender: 'Female',
                    weight: '32 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1589941013453-ec89f33b5e95?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Bella is a well-trained and loyal German Shepherd who would make an excellent family guardian. She is protective yet gentle with children and has excellent obedience training. Perfect for experienced dog owners.',
                    fee: '৳6,000',
                    tags: ['Loyal', 'Large', 'Protective', 'Well-trained'],
                    health: {
                        completed: ['Vaccinated', 'Spayed', 'Microchipped', 'Dewormed', 'Hip Screening Normal', 'Advanced Training Complete'],
                        pending: ['Senior Health Monitoring']
                    },
                    specialCare: 'Bella is a mature dog who needs experienced owners familiar with large breeds. She requires regular exercise but not as intensive as younger dogs. Excellent guard dog with protective instincts.'
                },
                'sunny': {
                    name: 'Sunny',
                    breed: 'Cockatiel',
                    age: '2 Years Old',
                    gender: 'Female',
                    weight: '0.9 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Sunny is a beautiful cockatiel who loves to sing and whistle. She is very social and enjoys interacting with people. Sunny would be perfect for someone who appreciates the musical nature of birds.',
                    fee: '৳2,800',
                    tags: ['Musical', 'Small', 'Social', 'Vocal'],
                    health: {
                        completed: ['Health Check Complete', 'Wing Clipping Complete', 'Beak & Nail Trim', 'Sex Verification'],
                        pending: ['Breeding History Assessment']
                    },
                    specialCare: 'Sunny is very social and needs daily interaction. She requires a large cage, varied diet with seeds, pellets, and fresh foods. Keep away from kitchen fumes and maintain consistent temperature.'
                },
                'spike': {
                    name: 'Spike',
                    breed: 'Guinea Pig',
                    age: '1.5 Years Old',
                    gender: 'Male',
                    weight: '1.2 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1548767797-d8c844163c4c?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Spike is a very social guinea pig who loves interaction and fresh vegetables. He makes cute squeaking sounds when excited and enjoys gentle handling. Perfect for families with children.',
                    fee: '৳1,200',
                    tags: ['Social', 'Small', 'Gentle', 'Interactive'],
                    health: {
                        completed: ['Health Check Complete', 'Neutered', 'Nail Trimming', 'Teeth Check Normal'],
                        pending: ['Companion Assessment']
                    },
                    specialCare: 'Spike is very social and would benefit from having another guinea pig companion. He needs fresh vegetables daily, unlimited hay, and vitamin C supplements. Requires a large cage with hiding spots.'
                },
                'shadow': {
                    name: 'Shadow',
                    breed: 'Black Cat',
                    age: '2.5 Years Old',
                    gender: 'Male',
                    weight: '4.8 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1561948955-570b270e7c36?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Shadow is a sleek black cat with a mysterious charm. He is very affectionate once he warms up to you and loves to follow his humans around. Perfect for someone who appreciates the elegance of black cats.',
                    fee: '৳2,300',
                    tags: ['Mysterious', 'Affectionate', 'Loyal', 'Indoor'],
                    health: {
                        completed: ['Vaccinated', 'Neutered', 'Microchipped', 'Dewormed', 'Health Check Complete'],
                        pending: ['Socialization Assessment']
                    },
                    specialCare: 'Shadow can be initially shy but becomes very loyal once bonded. He prefers indoor living and quiet environments. Takes time to warm up to new people but forms strong attachments.'
                },
                'ruby': {
                    name: 'Ruby',
                    breed: 'Poodle',
                    age: '1 Year Old',
                    gender: 'Female',
                    weight: '8 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1551717743-49959800b1f6?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Ruby is an energetic young poodle with a beautiful curly coat. She is intelligent, easily trainable, and loves to play. Ruby would be perfect for an active family who enjoys training and playing with dogs.',
                    fee: '৳4,800',
                    tags: ['Energetic', 'Intelligent', 'Trainable', 'Playful'],
                    health: {
                        completed: ['Vaccinated', 'Spayed', 'Microchipped', 'Dewormed', 'Health Check Complete', 'Professional Grooming'],
                        pending: ['Advanced Training Recommended']
                    },
                    specialCare: 'Ruby needs regular professional grooming every 6-8 weeks due to her curly coat. She\'s highly intelligent and requires mental stimulation. Excellent for families who enjoy active training sessions.'
                },
                'nibbles': {
                    name: 'Nibbles',
                    breed: 'Hamster',
                    age: '4 Months Old',
                    gender: 'Male',
                    weight: '0.15 kg',
                    location: 'Dhaka Center',
                    image: 'https://images.unsplash.com/photo-1425082661705-1834bfd09dca?w=280&h=280&fit=crop&auto=format',
                    status: 'Available',
                    description: 'Nibbles is a cute little hamster who loves to run on his wheel and explore his habitat. He is very active during evening hours and enjoys sunflower seeds as treats. Perfect for children learning pet responsibility.',
                    fee: '৳800',
                    tags: ['Tiny', 'Active', 'Nocturnal', 'Low-maintenance'],
                    health: {
                        completed: ['Health Check Complete', 'Habitat Setup Complete', 'Diet Assessment'],
                        pending: ['Handling Training for Owner']
                    },
                    specialCare: 'Nibbles is nocturnal and most active during evening hours. He needs a quiet location during day time for sleeping. Requires fresh bedding weekly and small portions of fresh vegetables as treats.'
                }
            };

            // Get pet data or use default
            const petData = petDatabase[petName] || petDatabase['milo'];

            // Update the page with pet data
            document.getElementById('petName').textContent = petData.name;
            document.getElementById('petBreed').textContent = petData.breed;
            document.getElementById('petAge').textContent = petData.age;
            document.getElementById('petGender').textContent = petData.gender;
            document.getElementById('petWeight').textContent = petData.weight;
            document.getElementById('petLocation').textContent = petData.location;
            document.getElementById('petImage').src = petData.image;
            document.getElementById('statusBadge').textContent = petData.status;
            
            // Update description
            const descriptionElement = document.querySelector('.description-text');
            if (descriptionElement) {
                descriptionElement.textContent = petData.description;
            }
            
            // Update About section title
            const aboutTitle = document.querySelector('.pet-description .section-title');
            if (aboutTitle) {
                aboutTitle.innerHTML = `<i class="fas fa-heart"></i> About ${petData.name}`;
            }
            
            // Update adoption fee
            const feeElement = document.querySelector('.fee-amount');
            if (feeElement) {
                feeElement.textContent = petData.fee;
            }
            
            // Update tags
            const tagsContainer = document.querySelector('.pet-tags');
            if (tagsContainer && petData.tags) {
                tagsContainer.innerHTML = petData.tags.map(tag => 
                    `<span class="pet-tag">${tag}</span>`
                ).join('');
            }

            // Update health information
            const healthGrid = document.querySelector('.health-grid');
            if (healthGrid && petData.health) {
                let healthHTML = '';
                
                // Add completed health items
                petData.health.completed.forEach(item => {
                    healthHTML += `
                        <div class="health-item">
                            <i class="fas fa-check-circle"></i>
                            <span>${item}</span>
                        </div>
                    `;
                });
                
                // Add pending health items
                petData.health.pending.forEach(item => {
                    healthHTML += `
                        <div class="health-item pending">
                            <i class="fas fa-clock"></i>
                            <span>${item}</span>
                        </div>
                    `;
                });
                
                healthGrid.innerHTML = healthHTML;
            }

            // Update special care notes
            const specialCareElement = document.querySelector('.highlight-box p');
            if (specialCareElement && petData.specialCare) {
                specialCareElement.textContent = petData.specialCare;
            }
        }

        // Load pet data when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Get the pet name from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const petName = urlParams.get('pet') || 'milo';
            loadPetData(petName);
        });

        // Add smooth scrolling for internal navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection
