<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Supplies Support - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
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
        .header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: #fff;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 2px 10px rgba(255,111,97,0.1);
        }
        .header h1 {
            font-size: 2.5rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .header p {
            font-size: 1.1rem;
            margin: 10px 0 0;
            opacity: 0.9;
        }
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 2px;
            transition: background 0.3s;
        }
        .back-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        .supplies-section {
            max-width: 900px;
            margin: -40px auto 0 auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            padding: 38px 32px 32px 32px;
        }
        .supplies-title {
            color: #ff6f61;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 18px;
            text-align: center;
        }
        .supplies-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
            margin-bottom: 30px;
        }
        .supply-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(255,111,97,0.08);
            padding: 22px 18px;
            text-align: center;
            transition: box-shadow 0.2s, transform 0.2s;
            border: 2px solid transparent;
        }
        .supply-card:hover {
            box-shadow: 0 8px 32px rgba(255,111,97,0.18), 0 3px 12px rgba(0,0,0,0.08);
            border: 2px solid #ff6f61;
            transform: translateY(-5px) scale(1.03);
        }
        .supply-icon {
            font-size: 2.2rem;
            margin-bottom: 10px;
            color: #ff6f61;
        }
        .supply-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 6px;
            color: #333;
        }
        .supply-desc {
            color: #666;
            font-size: 0.98rem;
            margin-bottom: 10px;
        }
        .supply-link {
            display: inline-block;
            margin-top: 8px;
            padding: 7px 18px;
            border-radius: 20px;
            background: linear-gradient(90deg, #ff6f61 60%, #ff9472 100%);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.98rem;
            transition: background 0.2s, transform 0.18s;
        }
        .supply-link:hover {
            background: linear-gradient(90deg, #e65c50 60%, #ff9472 100%);
            transform: scale(1.05);
        }
        .support-contact {
            margin-top: 30px;
            text-align: center;
            color: #888;
            font-size: 1rem;
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
        @media (max-width: 900px) {
            .supplies-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .navbar-nav {
                gap: 4px;
            }
            .nav-link {
                padding: 10px 16px;
                font-size: 0.9rem;
            }
        }
        @media (max-width: 600px) {
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
            .supplies-section {
                padding: 18px 4vw 18px 4vw;
            }
            .supplies-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }
        }
        @media (max-width: 1150px) {
            .nav-link {
                padding: 12px 14px;
                font-size: 0.9rem;
            }
            .navbar-container {
                padding: 0 15px;
            }
        }
        @media (max-width: 900px) {
            .navbar-nav {
                gap: 4px;
            }
            .nav-link {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
        }
        @media (max-width: 700px) {
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
            .nav-link {
                padding: 8px 10px;
                font-size: 0.8rem;
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
                    <a href="{{ url('/welcome') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/adopt-home') }}" class="nav-link">Adopt a Pet</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/vet-home') }}" class="nav-link">Veterinary Support</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pet.supplies') }}" class="nav-link active">Pet Supplies</a>
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
    <div class="header">
        <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:18px;">
            <div style="width:70px;height:70px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 12px rgba(255,111,97,0.13);">
                <span style="font-size:2.5rem;">🛒</span>
            </div>
        </div>
        <h1>Pet Supplies Support</h1>
        <p>Find everything your pet needs, from food to toys and more!</p>
    </div>
    <div class="supplies-section">
        <div class="supplies-title">Popular Pet Supplies</div>
        <div class="supplies-grid">
            <div class="supply-card">
                <div class="supply-icon">🍖</div>
                <div class="supply-title">Pet Food</div>
                <div class="supply-desc">Nutritious food for cats, dogs, birds, and more. Choose from top brands and healthy options.</div>
                <a href="{{ route('shop.food') }}" class="supply-link">Shop Food</a>
            </div>
            <div class="supply-card">
                <div class="supply-icon">🧸</div>
                <div class="supply-title">Toys & Enrichment</div>
                <div class="supply-desc">Keep your pet active and happy with a variety of toys, puzzles, and enrichment products.</div>
                <a href="#" class="supply-link">Browse Toys</a>
            </div>
            <div class="supply-card">
                <div class="supply-icon">🛏️</div>
                <div class="supply-title">Beds & Comfort</div>
                <div class="supply-desc">Soft beds, cozy blankets, and comfort items for restful naps and sweet dreams.</div>
                <a href="#" class="supply-link">See Beds</a>
            </div>
            <div class="supply-card">
                <div class="supply-icon">🧼</div>
                <div class="supply-title">Grooming & Hygiene</div>
                <div class="supply-desc">Shampoos, brushes, and hygiene essentials to keep your pet clean and healthy.</div>
                <a href="#" class="supply-link">Grooming Care</a>
            </div>
            <div class="supply-card">
                <div class="supply-icon">🏥</div>
                <div class="supply-title">Health & Wellness</div>
                <div class="supply-desc">Supplements, vitamins, and health products for your pet's well-being.</div>
                <a href="#" class="supply-link">Health Products</a>
            </div>
            <div class="supply-card">
                <div class="supply-icon">🚗</div>
                <div class="supply-title">Travel & Carriers</div>
                <div class="supply-desc">Carriers, crates, and travel accessories for safe and comfortable journeys.</div>
                <a href="#" class="supply-link">Travel Gear</a>
            </div>
        </div>
        <div class="support-contact">
            <strong>Need help?</strong> Contact our support team at <a href="mailto:support@petsrology.com" style="color:#ff6f61;text-decoration:underline;">support@petsrology.com</a> or call +880 1777-123456.
        </div>
    </div>
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
</body>
</html>