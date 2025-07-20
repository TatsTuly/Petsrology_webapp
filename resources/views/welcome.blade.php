<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETSROLOGY - Your Pet's Best Friend</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-container {
            width: 100%;
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
        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 8px;
            margin-right: 10px;
        }
        .nav-item {
            position: relative;
        }
        .nav-link {
            display: block;
            padding: 12px 18px;
            color: #ff6f61;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 111, 97, 0.1);
            transition: left 0.3s ease;
            z-index: -1;
        }
        .nav-link:hover {
            color: #ff6f61;
            text-decoration: none;
            transform: translateY(-2px);
            background: rgba(255, 111, 97, 0.1);
        }
        .nav-link.active {
            background: #ff6f61;
            color: #fff;
        }
        .nav-link:hover::before {
            left: 0;
        }
        .nav-link.active {
            background: #ff6f61;
            color: #fff;
        }
        .nav-link.active::before {
            left: 0;
            background: #ff6f61;
        }
        .main-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background: transparent;
            box-shadow: none;
            padding: 0;
        }
        .welcome-section {
            background: #fff;
            padding: 60px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .welcome-section h2 {
            font-size: 2.8rem;
            color:#ff6f61;
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
        .feature::after {
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
        .feature:hover::after {
            opacity: 1;
        }
        /* Footer Styles - matching contact page */
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
        .logout-btn {
            background: transparent;
            color: #ff6f61;
            padding: 12px 18px;
            border-radius: 0;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            position: relative;
            overflow: hidden;
        }
        .logout-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 111, 97, 0.1);
            transition: left 0.3s ease;
            z-index: -1;
        }
        .logout-btn:hover {
            color: #ff6f61;
            text-decoration: none;
            transform: translateY(-2px);
            background: rgba(255, 111, 97, 0.1);
        }
        .logout-btn:hover::before {
            left: 0;
        }
        .logout-btn i {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/welcome') }}" class="navbar-brand">
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
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/welcome') }}" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/adopt-home') }}" class="nav-link">Adopt a Pet</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/vet-home') }}" class="nav-link">Veterinary Support</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pet.supplies') }}" class="nav-link">Pet Supplies</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/welcome') }}" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/user/dashboard') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main-content">
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

        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <h3>About PETSROLOGY</h3>
                    <ul>
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Mission & Vision</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#">Pet Adoption</a></li>
                        <li><a href="#">Veterinary Care</a></li>
                        <li><a href="#">Pet Supplies</a></li>
                        <li><a href="#">Pet Training</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Support</h3>
                    <ul>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Connect With Us</h3>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 PETSROLOGY. All rights reserved.</p>
            </div>
        </footer>
    </div>
    <script>
        // Add any additional JavaScript functionality here if needed
    </script>
</body>
</html>
