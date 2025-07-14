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
            margin-right: 20px;
        }
        .nav-item {
            position: relative;
        }
        .nav-link {
            display: block;
            padding: 12px 20px;
            color: #333;
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
            background: #ff6f61;
            transition: left 0.3s ease;
            z-index: -1;
        }
        .nav-link:hover {
            color: #fff;
            text-decoration: none;
            transform: translateY(-2px);
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
        }
        .main-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            padding: 40px 20px;
            text-align: center;
            background: #fff;
            box-shadow: 0 4px 18px rgba(0,0,0,0.05);
            position: relative;
        }
        header h1 {
            margin: 0;
            font-size: 2.5rem;
            color: #ff6f61;
            letter-spacing: 1px;
        }
        header p {
            font-size: 1.2rem;
            color: #666;
            margin: 10px 0 0 0;
        }
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 40px 20px;
            gap: 32px;
            flex: 1;
        }
        .feature {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            margin: 20px 0;
            padding: 32px 28px 28px 28px;
            text-align: center;
            width: 320px;
            transition: box-shadow 0.25s, transform 0.25s, border 0.25s;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        .feature:hover {
            box-shadow: 0 8px 32px rgba(255,111,97,0.18), 0 3px 12px rgba(0,0,0,0.08);
            border: 2px solid #ff6f61;
            transform: translateY(-8px) scale(1.03);
        }
        .feature img {
            width: 48px;
            height: 48px;
            margin-bottom: 18px;
            border-radius: 0;
            background: none;
            box-shadow: none;
            transition: transform 0.2s;
        }
        .feature:hover img {
            transform: scale(1.12) rotate(-6deg);
        }
        .feature h3 {
            margin: 10px 0 8px 0;
            font-size: 1.45rem;
            color: #ff6f61;
            letter-spacing: 1px;
            font-weight: 700;
        }
        .feature p {
            font-size: 1.05rem;
            color: #555;
            margin-bottom: 0;
        }
        .feature::after {
            content: "";
            position: absolute;
            left: -60px;
            top: -60px;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, #ff6f6130 60%, transparent 100%);
            z-index: 1;
            opacity: 0.7;
            pointer-events: none;
            transition: opacity 0.2s;
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
        .auth-buttons {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 14px;
        }
        .btn {
            display: inline-block;
            padding: 9px 22px;
            border-radius: 24px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition:
                background 0.25s,
                color 0.25s,
                box-shadow 0.25s,
                transform 0.18s,
                letter-spacing 0.18s;
            box-shadow: 0 2px 8px rgba(255,111,97,0.10);
            letter-spacing: 1px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: background 0.2s, color 0.2s, border 0.2s, transform 0.15s;
        }
        .login-btn {
            background: #ff6f61;
            color: #fff;
            text-align: center;
            padding: 12px 32px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            border: none;
            margin-right: 8px;
            display: inline-block;
        }
        .login-btn:hover, .login-btn:focus {
            background: #e65c50;
            color: #fff;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 4px 16px rgba(255,111,97,0.13);
        }
        .signup-btn {
            background: #fff;
            color: #ff6f61;
            text-align: center;
            padding: 12px 32px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            border: 2px solid #ff6f61;
            display: inline-block;
        }
        .signup-btn:hover, .signup-btn:focus {
            background: #ff6f61;
            color: #fff;
            border-color: #e65c50;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 4px 16px rgba(255,111,97,0.13);
        }
        .feature-btn {
            background: #ff6f61;
            color: white;
            border: none;
            padding: 9px 22px;
            border-radius: 24px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: background 0.25s, color 0.25s, box-shadow 0.25s, transform 0.18s, letter-spacing 0.18s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(255,111,97,0.10);
            letter-spacing: 1px;
            margin-top: 55px;
            position: relative;
            z-index: 10;
        }
        .feature-btn:hover {
            background: #e65c50;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 4px 16px rgba(255,111,97,0.13);
        }
        .fade-in-title {
            opacity: 0;
            transform: translateY(30px) scale(0.98);
            animation: fadeInUp 1s 0.2s forwards;
        }
        .fade-in-subtitle {
            opacity: 0;
            transform: translateY(30px) scale(0.98);
            animation: fadeInUp 1s 0.7s forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        @media (max-width: 900px) {
            .features {
                flex-direction: column;
                align-items: center;
                gap: 0;
            }
            .navbar-nav {
                gap: 4px;
            }
            .nav-link {
                padding: 10px 16px;
                font-size: 0.9rem;
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
            .feature {
                width: 90vw;
                min-width: 0;
            }
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
                
            </ul>
        </div>
    </nav>
    <div class="main-content">
        <header>

            <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:18px;">
                <div style="width:70px;height:70px;background:linear-gradient(135deg,#ff6f61 70%,#ff9472 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 12px rgba(255,111,97,0.13);">

                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
                        <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                        <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    </svg>
                </div>
            </div>

            <h1 class="fade-in-title">Welcome to PETSROLOGY</h1>
            <p class="fade-in-subtitle">Your one-stop platform for all pet needs</p>
            <div style="margin-top: 25px; display: flex; justify-content: center; gap: 16px;">
                <a href="{{ url('/login') }}" class="btn login-btn">Login</a>
                <a href="{{ url('/signup') }}" class="btn signup-btn">Sign Up</a>
            </div>
        </header>

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
