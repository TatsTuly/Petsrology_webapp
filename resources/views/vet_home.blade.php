<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinary Support - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #333;
            line-height: 1.6;
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
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 2px 10px rgba(255,111,97,0.1);
        }
        header h1 {
            font-size: 2.5rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
        }
        header p {
            font-size: 1.1rem;
            margin: 10px 0 0;
            opacity: 0.9;
        }
        .back-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .back-btn:hover {
            background: rgba(255,255,255,0.3);
        }
        .services {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .services h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #ff6f61;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .services-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 40px;
            font-weight: 400;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
            margin-bottom: 40px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .service-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            padding: 28px 24px 24px 24px;
            text-align: center;
            width: 100%;
            max-width: 320px;
            margin: 0 auto;
            transition: box-shadow 0.25s, transform 0.25s, border 0.25s;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        .service-card:hover {
            box-shadow: 0 8px 32px rgba(255,111,97,0.18), 0 3px 12px rgba(0,0,0,0.08);
            border: 2px solid #ff6f61;
            transform: translateY(-8px) scale(1.03);
        }
        .service-card::after {
            content: "";
            position: absolute;
            left: -60px;
            top: -60px;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, #ff6f6130 60%, transparent 100%);
            z-index: 0;
            opacity: 0.7;
            pointer-events: none;
            transition: opacity 0.2s;
        }
        .service-card:hover::after {
            opacity: 1;
        }
        .service-icon {
            font-size: 3rem;
            margin-bottom: 18px;
            display: block;
            transition: transform 0.2s;
        }
        .service-card:hover .service-icon {
            transform: scale(1.12) rotate(-6deg);
        }
        .service-card h3 {
            font-size: 1.45rem;
            margin: 10px 0 8px 0;
            color: #ff6f61;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .service-card p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
            font-size: 1.05rem;
        }
        .service-btn {
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
        }
        .service-btn:hover {
            background: #e65c50;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 4px 16px rgba(255,111,97,0.13);
        }
        }
        .emergency-section {
            background: #fff3f2;
            padding: 40px 20px;
            margin: 20px 0;
        }
        .emergency-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .emergency-content h2 {
            color: #d32f2f;
            font-size: 2rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        .emergency-content p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 25px;
        }
        .emergency-btn {
            background: #d32f2f;
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            font-size: 1.1rem;
            transition: background 0.2s, transform 0.15s;
            text-decoration: none;
            display: inline-block;
        }
        .emergency-btn:hover {
            background: #b71c1c;
            transform: translateY(-2px) scale(1.04);
        }
        .contact-section {
            background: white;
            padding: 60px 20px;
            margin: 0;
            box-shadow: 0 4px 18px rgba(0,0,0,0.05);
        }
        .contact-content {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }
        .contact-content h2 {
            color: #ff6f61;
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .contact-subtitle {
            font-size: 1.2rem;
            color: #666;
            margin-bottom: 50px;
            font-weight: 400;
        }
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
            margin-bottom: 40px;
        }
        .contact-item {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(255,111,97,0.08), 0 1px 4px rgba(0,0,0,0.03);
            padding: 20px 18px 18px 18px;
            text-align: center;
            width: 180px;
            transition: box-shadow 0.25s, transform 0.25s, border 0.25s;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        .contact-item:hover {
            box-shadow: 0 6px 24px rgba(255,111,97,0.12), 0 2px 8px rgba(0,0,0,0.06);
            border: 2px solid #ff6f61;
            transform: translateY(-5px) scale(1.02);
        }
        .contact-item::after {
            content: "";
            position: absolute;
            left: -40px;
            top: -40px;
            width: 80px;
            height: 80px;
            background: radial-gradient(circle, #ff6f6120 60%, transparent 100%);
            z-index: 0;
            opacity: 0.7;
            pointer-events: none;
            transition: opacity 0.2s;
        }
        .contact-item:hover::after {
            opacity: 1;
        }
        .contact-icon {
            font-size: 2rem;
            margin-bottom: 12px;
            display: block;
            transition: transform 0.2s;
        }
        .contact-item:hover .contact-icon {
            transform: scale(1.08) rotate(-4deg);
        }
        .contact-item h4 {
            color: #ff6f61;
            margin: 8px 0 6px 0;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .contact-item p {
            color: #555;
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.5;
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
        }
        @media (max-width: 900px) {
            .services {
                padding: 30px 20px;
            }
            .services h2 {
                font-size: 2rem;
            }
            .services-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            .emergency-section {
                padding: 30px 20px;
            }
            .emergency-content h2 {
                font-size: 1.8rem;
            }
            .contact-section {
                padding: 50px 20px;
            }
            .contact-content h2 {
                font-size: 2rem;
            }
            .contact-info {
                flex-direction: column;
                align-items: center;
                gap: 20px;
            }
            .contact-item {
                width: 90vw;
                min-width: 0;
                max-width: 280px;
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
            header {
                padding: 40px 20px 30px;
            }
            header h1 {
                font-size: 2rem;
            }
            .service-card {
                width: 90vw;
                min-width: 0;
            }
            .services-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 6px 12px;
                font-size: 0.8rem;
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
                    <a href="{{ url('/welcome') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/adopt-home') }}" class="nav-link">Adopt a Pet</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/vet-home') }}" class="nav-link active">Veterinary Support</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pet.supplies') }}" class="nav-link">Pet Supplies</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/welcome') }}" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/welcome') }}" class="nav-link">About Us</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="main-content">
        <header>
            <a href="{{ url('/welcome') }}" class="back-btn">← Back to Home</a>
            <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:18px;">
                <div style="width:70px;height:70px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 12px rgba(255,111,97,0.13);">
                    <span style="font-size:2.5rem;">🏥</span>
                </div>
            </div>
            <h1>Veterinary Support</h1>
            <p>Professional care for your beloved pets</p>
        </header>

        <section class="services">
            <h2>Our Pet Care Services</h2>
            <p class="services-subtitle">Comprehensive healthcare solutions for your beloved companions</p>
            <div class="services-grid">
                <div class="service-card">
                    <span class="service-icon">🩺</span>
                    <h3>General Checkup</h3>
                    <p>Comprehensive health examinations to keep your pet healthy and detect any issues early. Regular checkups are essential for your pet's wellbeing.</p>
                    <a href="{{ route('book.appointment') }}" class="service-btn">Book Appointment</a>
                </div>
                <div class="service-card">
                    <span class="service-icon">💉</span>
                    <h3>Vaccinations</h3>
                    <p>Essential vaccination services to protect your pet from diseases and infections. Keep your furry friend safe with up-to-date immunizations.</p>
                    <a href="{{ route('book.appointment') }}" class="service-btn">Schedule Vaccination</a>
                </div>
                <div class="service-card">
                    <span class="service-icon">🏥</span>
                    <h3>Surgery</h3>
                    <p>Advanced surgical procedures performed by experienced veterinary surgeons. From routine spaying to complex operations, we provide expert care.</p>
                    <a href="{{ route('book.appointment') }}" class="service-btn">Surgical Consultation</a>
                </div>
                <div class="service-card">
                    <span class="service-icon">✂️</span>
                    <h3>Pet Grooming</h3>
                    <p>Professional grooming services including bathing, nail trimming, hair cutting, and overall hygiene care for your beloved pet.</p>
                    <a href="{{ route('book.appointment') }}" class="service-btn">Book Grooming</a>
                </div>
            </div>
        </section>

        <section class="emergency-section">
            <div class="emergency-content">
                <h2>🚨 Pet Emergency Services</h2>
                <p>We provide 24/7 emergency veterinary care for your pets in urgent situations. Our experienced veterinary team is always ready to help your furry friends during critical moments.</p>
                <a href="#" class="emergency-btn">Call Pet Emergency: +880 1777-987654</a>
            </div>
        </section>

        <section class="contact-section">
            <div class="contact-content">
                <h2>Contact Our Pet Care Team</h2>
                <p class="contact-subtitle">Professional veterinary services for your beloved companions</p>
                <div class="contact-info">
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <h4>Our Location</h4>
                        <p>House 15, Road 27, Block K<br>Banani, Dhaka-1213<br>Bangladesh</p>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <h4>Call Us</h4>
                        <p>Pet Care: +880 1711-234567<br>Emergency: +880 1777-987654</p>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📧</span>
                        <h4>Email Us</h4>
                        <p>petcare@petsrology.com.bd<br>emergency@petsrology.com.bd</p>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">🕒</span>
                        <h4>Visit Hours</h4>
                        <p>Sun-Thu: 9:00 AM - 9:00 PM<br>Fri-Sat: 10:00 AM - 7:00 PM<br>Emergency: 24/7</p>
                    </div>
                </div>
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
