@extends('layouts.vet_app')

@section('title', 'Veterinary Hub - PETSROLOGY')

@section('styles')
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: linear-gradient(135deg, #ff9472 0%, #ff6f61 50%, #ffcccb 100%);
        min-height: 100vh;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, rgba(255,111,97,0.95) 0%, rgba(255,148,114,0.9) 100%);
        color: white;
        padding: 80px 20px 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
        margin-bottom: 60px;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
        background-size: 30px 30px;
        animation: float 20s linear infinite;
    }

    @keyframes float {
        0% { transform: translate(0, 0) rotate(0deg); }
        100% { transform: translate(-30px, -30px) rotate(360deg); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        margin: 0 auto;
    }

    .hero-title {
        font-size: 3.2rem;
        font-weight: 900;
        margin-bottom: 20px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        letter-spacing: 1px;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        font-weight: 400;
        margin-bottom: 30px;
        opacity: 0.95;
        line-height: 1.5;
    }

    /* Stats Section */
    .stats-section {
        max-width: 1200px;
        margin: 0 auto 60px;
        padding: 0 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
    }

    .stat-card {
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        padding: 30px 20px;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 8px 30px rgba(255,111,97,0.12);
        border: 1px solid rgba(255,148,114,0.2);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(255,111,97,0.18);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 900;
        color: #ff6f61;
        margin-bottom: 10px;
    }

    .stat-label {
        font-size: 1rem;
        color: #666;
        font-weight: 600;
    }

    /* Main Content Container */
    .vet-homepage-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 40px;
        justify-items: center;
    }

    /* Enhanced Card Design */
    .vet-card {
        background: linear-gradient(135deg, #fff 0%, #fff8f6 100%);
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(255,111,97,0.15);
        padding: 50px 40px;
        text-align: center;
        width: 100%;
        max-width: 400px;
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .vet-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #ff6f61, #ff9472);
        border-radius: 24px 24px 0 0;
    }

    .vet-card:hover {
        box-shadow: 0 20px 50px rgba(255,111,97,0.25);
        transform: translateY(-10px);
        border-color: #ff9472;
    }

    .vet-card-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #ff6f61, #ff9472);
        border-radius: 50%;
        margin: 0 auto 25px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: white;
        box-shadow: 0 8px 25px rgba(255,111,97,0.3);
    }

    .vet-card-title {
        font-size: 1.8rem;
        color: #2c3e50;
        font-weight: 800;
        margin-bottom: 20px;
        letter-spacing: 0.5px;
    }

    .vet-card-desc {
        font-size: 1.1rem;
        color: #555;
        margin-bottom: 35px;
        line-height: 1.7;
        font-weight: 400;
    }

    .vet-card-btn {
        background: linear-gradient(135deg, #ff6f61, #ff9472);
        color: white;
        border: none;
        padding: 16px 40px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 6px 20px rgba(255,111,97,0.25);
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
    }

    .vet-card-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: left 0.6s;
    }

    .vet-card-btn:hover::before {
        left: 100%;
    }

    .vet-card-btn:hover {
        background: linear-gradient(135deg, #e65c50, #ff8366);
        transform: translateY(-3px);
        color: white;
        text-decoration: none;
        box-shadow: 0 8px 25px rgba(255,111,97,0.35);
    }

    /* Features Section */
    .features-section {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        margin: 60px 20px 0;
        padding: 60px 40px;
        border-radius: 30px;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .features-title {
        text-align: center;
        font-size: 2.5rem;
        color: white;
        font-weight: 800;
        margin-bottom: 50px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
    }

    .feature-item {
        text-align: center;
        color: white;
    }

    .feature-icon {
        width: 60px;
        height: 60px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .feature-title {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .feature-desc {
        font-size: 1rem;
        opacity: 0.9;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }

        .vet-homepage-container {
            grid-template-columns: 1fr;
            gap: 30px;
            padding: 20px 15px;
        }

        .vet-card {
            padding: 40px 30px;
        }

        .features-section {
            margin: 40px 15px 0;
            padding: 40px 20px;
        }

        .features-title {
            font-size: 2rem;
        }

        .stats-section {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .stat-number {
            font-size: 2rem;
        }
    }

    @media (max-width: 480px) {
        .stats-section {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Veterinary Excellence Hub</h1>
        <p class="hero-subtitle">Empowering veterinary professionals to provide exceptional care and connect with pet families in need</p>
    </div>
</div>

<!-- Statistics Section -->
<div class="stats-section">
    <div class="stat-card">
        <div class="stat-number">500+</div>
        <div class="stat-label">Registered Vets</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">2K+</div>
        <div class="stat-label">Appointments</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">1.5K+</div>
        <div class="stat-label">Happy Pets</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">24/7</div>
        <div class="stat-label">Support</div>
    </div>
</div>

<!-- Main Content -->
<div class="vet-homepage-container">
    <div class="vet-card">
        <div class="vet-card-icon">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="vet-card-title">Join Our Network</div>
        <div class="vet-card-desc">Become a certified member of our trusted veterinary network. Expand your practice, connect with pet owners, and make a meaningful impact in animal healthcare.</div>
        <a href="{{ url('/vet-join') }}" class="vet-card-btn">Get Started</a>
    </div>
    
    <div class="vet-card">
        <div class="vet-card-icon">
            <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="vet-card-title">Manage Appointments</div>
        <div class="vet-card-desc">Access your comprehensive dashboard to view, schedule, and manage appointments efficiently. Stay organized and provide seamless care for all your patients.</div>
        <a href="{{ url('/vet-appointments') }}" class="vet-card-btn">View Dashboard</a>
    </div>
</div>

<!-- Features Section -->
<div class="features-section">
    <h2 class="features-title">Why Choose PETSROLOGY?</h2>
    <div class="features-grid">
        <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="feature-title">Trusted Platform</div>
            <div class="feature-desc">Secure and reliable platform trusted by veterinary professionals nationwide</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="feature-title">24/7 Availability</div>
            <div class="feature-desc">Round-the-clock support system for emergency consultations and assistance</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-heart"></i>
            </div>
            <div class="feature-title">Compassionate Care</div>
            <div class="feature-desc">Dedicated to promoting the highest standards of animal welfare and treatment</div>
        </div>
        <div class="feature-item">
            <div class="feature-icon">
                <i class="fas fa-network-wired"></i>
            </div>
            <div class="feature-title">Professional Network</div>
            <div class="feature-desc">Connect with fellow veterinarians and share knowledge within our community</div>
        </div>
    </div>
</div>
@endsection
