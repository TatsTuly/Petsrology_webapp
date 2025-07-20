<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETSROLOGY - Find Your Perfect Pet Companion</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Nunito', sans-serif;
            background: #f8f9fa;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            height: 70px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
            margin-left: 0;
        }
        .navbar-brand:hover {
            color: #333;
            text-decoration: none;
        }

        .brand-logo {
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff6f61 70%, #ff9472 100%);
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(255,111,97,0.13);
            margin-right: 12px;
        }

        .brand-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: 1px;
            color: #ff6f61;
        }

        .navbar-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .nav-btn {
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .nav-btn.login {
            background: transparent;
            color: #ff6f61;
            border: 2px solid #ff6f61;
        }

        .nav-btn.login:hover {
            background: #ff6f61;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
        }

        .nav-btn.signup {
            background: #ff6f61;
            color: white;
            border: 2px solid #ff6f61;
        }

        .nav-btn.signup:hover {
            background: #e65c50;
            border-color: #e65c50;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(230,92,80,0.3);
        }

        .nav-btn.admin {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border: 2px solid #3498db;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .nav-btn.admin:hover {
            background: linear-gradient(135deg, #2980b9 0%, #1f6391 100%);
            border-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.4);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 120px 20px 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="1.5" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="60" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="80" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="80" r="1.5" fill="rgba(255,255,255,0.1)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
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

        .hero-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .hero-btn {
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .hero-btn.primary {
            background: white;
            color: #ff6f61;
        }

        .hero-btn.primary:hover {
            background: #f8f9fa;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            color: #ff6f61;
        }

        .hero-btn.secondary {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
        }

        .hero-btn.secondary:hover {
            background: white;
            color: #ff6f61;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255,255,255,0.3);
        }

        /* Quick Search Section */
        .quick-search {
            background: white;
            padding: 60px 20px;
            margin-top: -40px;
            position: relative;
            z-index: 10;
        }

        .quick-search-container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .quick-search h2 {
            font-size: 2.5rem;
            color: #ff6f61;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .quick-search p {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 40px;
        }

        .search-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .search-option {
            background: #f8f9fa;
            padding: 30px 20px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .search-option:hover {
            background: white;
            border-color: #ff6f61;
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255,111,97,0.15);
        }

        .search-option img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }

        .search-option h3 {
            font-size: 1.3rem;
            color:#ff6f61;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .search-option p {
            color: #666;
            font-size: 0.95rem;
            margin: 0;
        }

        .search-cta {
            text-align: center;
        }

        .search-btn {
            background: #ff6f61;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .search-btn:hover {
            background: #e65c50;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
        }

        /* Features Section */
        .features-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 80px 20px;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .features-header {
            margin-bottom: 60px;
        }

        .features-header h2 {
            font-size: 2.5rem;
            color: #ff6f61;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .features-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .feature-card {
            background: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }
        
        .feature-card:hover::before {
            left: 0;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255,111,97,0.15);
            border-color: #ff6f61;
        }
        
        .feature-card::after {
            content: "";
            position: absolute;
            right: 20px;
            top: 20px;
            width: 40px;
            height: 40px;
            background: radial-gradient(circle, rgba(255,111,97,0.1) 50%, transparent 70%);
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .feature-card:hover::after {
            opacity: 1;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.8rem;
            color: white;
            transition: all 0.3s ease;
        }
        
        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .feature-btn {
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            position: relative;
            overflow: hidden;
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

        .feature-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 80px 20px;
        }

        .stats-container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
        }

        .stat-item {
            padding: 20px;
            transition: all 0.3s ease;
            border-radius: 15px;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,111,97,0.05), rgba(255,148,114,0.05));
            transition: left 0.5s ease;
            z-index: -1;
        }
        
        .stat-item:hover::before {
            left: 0;
        }
        
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(255,111,97,0.1);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            color: #ff6f61;
            display: block;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .stat-item:hover .stat-number {
            transform: scale(1.1);
            text-shadow: 0 2px 8px rgba(255,111,97,0.3);
        }

        .stat-label {
            font-size: 1.1rem;
            color: #666;
            font-weight: 600;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        .cta-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            padding: 60px 20px 20px;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
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
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #ff6f61;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #555;
        }

        .footer-bottom p {
            margin: 0;
            color: #ccc;
        }

        /* Fade-in animations */
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
        
        .fade-in-actions {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s 0.9s forwards;
        }
        
        .search-option {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .search-option:nth-child(1) { animation-delay: 1.2s; }
        .search-option:nth-child(2) { animation-delay: 1.4s; }
        .search-option:nth-child(3) { animation-delay: 1.6s; }
        
        .feature-card {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .feature-card:nth-child(1) { animation-delay: 1.8s; }
        .feature-card:nth-child(2) { animation-delay: 2.0s; }
        .feature-card:nth-child(3) { animation-delay: 2.2s; }
        
        .stat-item {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .stat-item:nth-child(1) { animation-delay: 2.4s; }
        .stat-item:nth-child(2) { animation-delay: 2.6s; }
        .stat-item:nth-child(3) { animation-delay: 2.8s; }
        .stat-item:nth-child(4) { animation-delay: 3.0s; }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Pulse animation for CTA buttons */
        .cta-pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        /* Bounce animation for hero actions */
        .hero-actions {
            animation: bounceIn 1s 1.2s both;
        }
        
        @keyframes bounceIn {
            0% { opacity: 0; transform: scale(0.3); }
            50% { opacity: 1; transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* Responsive Design */
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/landing') }}" class="navbar-brand">
                <div class="brand-logo">
                    <svg width="28" height="28" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                        <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    </svg>
                </div>
                <span class="brand-text">PETSROLOGY</span>
            </a>
            
            <div class="navbar-actions">
                <a href="{{ url('/login') }}" class="nav-btn login">Login</a>
                <a href="{{ url('/signup') }}" class="nav-btn signup">Sign Up</a>
                <a href="{{ url('/admin/login') }}" class="nav-btn admin">Admin Dashboard</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title fade-in-title">Find Your Perfect Pet Companion</h1>
            <p class="hero-subtitle fade-in-subtitle">Connect with loving pets in need of homes, access expert veterinary care, and discover everything you need for your furry friend's happiness.</p>
            <div class="hero-actions fade-in-actions">
                <a href="{{ url('/signup') }}" class="hero-btn primary">Get Started Today</a>
                <a href="{{ url('/login') }}" class="hero-btn secondary">Already a Member?</a>
            </div>
        </div>
    </section>

    <!-- Quick Search Section -->
    <section class="quick-search">
        <div class="quick-search-container">
            <h2>What Are You Looking For?</h2>
            <p>Discover amazing pets, expert care, and premium supplies all in one place</p>
            
            <div class="search-options">
                <div class="search-option" onclick="redirectToSignup()">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f415.png" alt="Adopt a Pet">
                    <h3>Adopt a Pet</h3>
                    <p>Find your perfect companion from our verified shelters and rescues</p>
                </div>
                
                <div class="search-option" onclick="redirectToSignup()">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f43e.png" alt="Vet Care">
                    <h3>Veterinary Care</h3>
                    <p>Connect with certified veterinarians for expert pet care</p>
                </div>
                
                <div class="search-option" onclick="redirectToSignup()">
                    <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f6d2.png" alt="Pet Supplies">
                    <h3>Pet Supplies</h3>
                    <p>Shop premium food, toys, and accessories for your pet</p>
                </div>
            </div>
            
            <div class="search-cta">
                <a href="{{ url('/signup') }}" class="search-btn">Start Your Journey</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="features-container">
            <div class="features-header">
                <h2>Why Choose PETSROLOGY?</h2>
                <p>We're committed to connecting pets with loving families and providing comprehensive care solutions</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Verified & Safe</h3>
                    <p>All our pets come from verified shelters and rescues. Every veterinarian is licensed and certified.</p>
                    <a href="{{ url('/signup') }}" class="feature-btn">Learn More</a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Comprehensive Care</h3>
                    <p>From adoption to daily care, we provide everything your pet needs for a happy, healthy life.</p>
                    <a href="{{ url('/signup') }}" class="feature-btn">Explore Services</a>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community Support</h3>
                    <p>Join thousands of pet lovers sharing experiences, tips, and support in our caring community.</p>
                    <a href="{{ url('/signup') }}" class="feature-btn">Join Community</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-container">
            <div class="stats-grid">
                <div class="stat-item">
                    <span class="stat-number">2,500+</span>
                    <span class="stat-label">Pets Rescued</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">1,200+</span>
                    <span class="stat-label">Happy Families</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">150+</span>
                    <span class="stat-label">Certified Vets</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-container">
            <h2>Ready to Find Your Perfect Pet?</h2>
            <p>Join thousands of pet lovers who have found their perfect companions through PETSROLOGY. Start your journey today!</p>
            <div class="cta-buttons">
                <a href="{{ url('/signup') }}" class="hero-btn primary cta-pulse">Create Free Account</a>
                <a href="{{ url('/login') }}" class="hero-btn secondary">Sign In</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>About PETSROLOGY</h3>
                <ul>
                    <li><a href="{{ url('/signup') }}">Our Story</a></li>
                    <li><a href="{{ url('/signup') }}">Mission & Vision</a></li>
                    <li><a href="{{ url('/signup') }}">Team</a></li>
                    <li><a href="{{ url('/signup') }}">Careers</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Find Pets</h3>
                <ul>
                    <li><a href="{{ url('/signup') }}">Dogs for Adoption</a></li>
                    <li><a href="{{ url('/signup') }}">Cats for Adoption</a></li>
                    <li><a href="{{ url('/signup') }}">Other Pets</a></li>
                    <li><a href="{{ url('/signup') }}">Pet Care Tips</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Services</h3>
                <ul>
                    <li><a href="{{ url('/signup') }}">Veterinary Care</a></li>
                    <li><a href="{{ url('/signup') }}">Pet Supplies</a></li>
                    <li><a href="{{ url('/signup') }}">Training Services</a></li>
                    <li><a href="{{ url('/signup') }}">Emergency Care</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Support</h3>
                <ul>
                    <li><a href="{{ url('/signup') }}">Help Center</a></li>
                    <li><a href="{{ url('/signup') }}">Contact Us</a></li>
                    <li><a href="{{ url('/signup') }}">Privacy Policy</a></li>
                    <li><a href="{{ url('/signup') }}">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 PETSROLOGY. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function redirectToSignup() {
            window.location.href = "{{ url('/signup') }}";
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            }
        });

        // Animate stats on scroll
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const statNumbers = entry.target.querySelectorAll('.stat-number');
                    statNumbers.forEach(stat => {
                        const finalValue = stat.textContent;
                        const numValue = parseInt(finalValue.replace(/[^0-9]/g, ''));
                        if (numValue && !stat.classList.contains('animated')) {
                            stat.classList.add('animated');
                            animateNumber(stat, numValue, finalValue);
                        }
                    });
                }
            });
        }, observerOptions);

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }

        function animateNumber(element, target, originalText) {
            let start = 0;
            const duration = 2000;
            const increment = target / (duration / 16);
            
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = originalText;
                    clearInterval(timer);
                } else {
                    const currentValue = Math.floor(start);
                    if (originalText.includes('+')) {
                        element.textContent = currentValue + '+';
                    } else if (originalText.includes('/')) {
                        element.textContent = originalText.replace(/[0-9]+/, currentValue);
                    } else {
                        element.textContent = currentValue;
                    }
                }
            }, 16);
        }
    </script>
</body>
</html>
