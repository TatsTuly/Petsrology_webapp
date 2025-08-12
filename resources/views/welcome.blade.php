@extends('layouts.app')

@section('title', 'PETSROLOGY - Your Pet\'s Best Friend')

@section('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            background: #f8f9fa;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 80px 20px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: float 20s linear infinite;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-40px, -40px) rotate(360deg); }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            letter-spacing: 2px;
        }
        
        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 40px;
            opacity: 0.95;
            font-weight: 400;
            line-height: 1.6;
        }
        
        .stats-section {
            background: white;
            padding: 60px 20px;
            margin: -30px 20px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            position: relative;
            z-index: 3;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: #ff6f61;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #666;
            font-weight: 600;
        }
        
        .welcome-section {
            background: #fff;
            padding: 60px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .welcome-section h2 {
            font-size: 2.8rem;
            color: #ff6f61;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .welcome-section p {
            font-size: 1.3rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .cta-btn {
            background: #ff6f61;
            color: white;
            padding: 15px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            border: none;
            cursor: pointer;
        }
        
        .cta-btn:hover {
            background: #e65c50;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }
        
        .cta-btn.secondary {
            background: transparent;
            color: #ff6f61;
            border: 2px solid #ff6f61;
            box-shadow: none;
        }
        
        .cta-btn.secondary:hover {
            background: #ff6f61;
            color: white;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin: 0 20px 60px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .feature {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
        }
        
        .feature::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }
        
        .feature:hover::before {
            left: 0;
        }
        
        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255,111,97,0.15);
            border-color: #ff6f61;
        }
        
        .feature img {
            width: 60px;
            height: 60px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }
        
        .feature:hover img {
            transform: scale(1.1) rotate(5deg);
        }
        
        .feature h3 {
            margin: 0 0 15px 0;
            font-size: 1.6rem;
            color: #ff6f61;
            font-weight: 700;
        }
        
        .feature p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        .feature-btn {
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            position: relative;
            overflow: hidden;
        }
        
        .feature-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }
        
        .feature-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e65c50, #ff6f61);
            transition: left 0.3s ease;
            z-index: -1;
        }
        
        .feature-btn:hover::before {
            left: 0;
        }
        .fade-in-title {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s 0.3s forwards;
        }
        .fade-in-subtitle {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s 0.6s forwards;
        }
        .stat-item {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        .stat-item:nth-child(1) { animation-delay: 0.9s; }
        .stat-item:nth-child(2) { animation-delay: 1.1s; }
        .stat-item:nth-child(3) { animation-delay: 1.3s; }
        .stat-item:nth-child(4) { animation-delay: 1.5s; }
        .feature {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }
        .feature:nth-child(1) { animation-delay: 1.7s; }
        .feature:nth-child(2) { animation-delay: 1.9s; }
        .feature:nth-child(3) { animation-delay: 2.1s; }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 1150px) {
            .nav-link, .logout-btn {
                padding: 12px 14px;
                font-size: 0.9rem;
            }
            .navbar-container {
                padding: 0 15px;
            }
        }
        @media (max-width: 900px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.2rem;
            }
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            .features {
                grid-template-columns: 1fr;
                margin: 0 20px 40px;
            }
            .navbar-nav {
                gap: 4px;
            }
            .nav-link, .logout-btn {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
        @media (max-width: 700px) {
            .hero-title {
                font-size: 2rem;
            }
            .stats-container {
                grid-template-columns: 1fr;
            }
            .stats-section {
                margin: -20px 10px 30px;
                padding: 40px 20px;
            }
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
            .brand-logo {
                width: 35px;
                height: 35px;
                margin-right: 8px;
            }
            .brand-text {
                font-size: 1.2rem;
            }
            .nav-link, .logout-btn {
                padding: 8px 10px;
                font-size: 0.8rem;
            }
            .feature {
                margin: 0;
            }
        }
    </style>
@endsection

@section('content')
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:30px;">
                    <div style="width:80px;height:80px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.3);">
                        <svg width="50" height="50" viewBox="0 0 44 44" fill="none">
                            <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                            <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                            <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                            <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                            <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        </svg>
                    </div>
                </div>
                <h1 class="hero-title fade-in-title">Welcome to PETSROLOGY</h1>
                <p class="hero-subtitle fade-in-subtitle">Your comprehensive platform for pet care, adoption, and supplies. Connecting pet lovers with everything they need for their furry friends.</p>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="stats-container">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Pets Adopted</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">150+</span>
                    <span class="stat-label">Verified Vets</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Happy Customers</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
        </section>

        <!-- Welcome Section -->
        <section class="welcome-section">
            <h2>Everything Your Pet Needs, All in One Place</h2>
            <p>From finding your perfect companion to ensuring their health and happiness, PETSROLOGY is your trusted partner in pet care.</p>
            <div class="cta-buttons">
                <a href="{{ url('/adopt-home') }}" class="cta-btn">Start Adopting</a>
                <a href="{{ route('contact') }}" class="cta-btn secondary">Get in Touch</a>
            </div>
        </section>

        <section class="features">
            <div class="feature">
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f415.png" alt="Adopt a Pet" />
                <h3>Adopt a Pet</h3>
                <p>Find your perfect furry friend and give them a loving home.</p>
                <a href="{{ url('/adopt-home') }}" class="feature-btn">Browse Pets</a>
            </div>
            <div class="feature">
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f43e.png" alt="Veterinary Support" />
                <h3>Veterinary Support</h3>
                <p>Get expert veterinary advice and support for your pets.</p>
                <a href="{{ url('/vet-home') }}" class="feature-btn">Find a Vet</a>
            </div>
            <div class="feature">
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f6d2.png" alt="Pet Supplies" />
                <h3>Pet Supplies</h3>
                <p>Shop for high-quality pet food, toys, and accessories.</p>
                <a href="{{ route('pet.supplies') }}" class="feature-btn">Shop Now</a>
            </div>
        </section>
@endsection
