<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Vaccination - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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
        }

        /* Enhanced Navbar */
        .navbar {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255,111,97,0.1);
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
        }

        .navbar-brand:hover {
            color: #333;
            text-decoration: none;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            margin-right: 15px;
            transition: all 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(255,111,97,0.4);
        }

        .brand-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.6rem;
            font-weight: 900;
            letter-spacing: 1.2px;
            color: #ff6f61;
            text-shadow: 0 2px 4px rgba(255,111,97,0.1);
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

        /* Enhanced Header */
        .header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            text-align: center;
            padding: 80px 20px 60px;
            box-shadow: 0 4px 20px rgba(255,111,97,0.2);
            position: relative;
            overflow: hidden;
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

        /* Main Content */
        .main-content {
            max-width: 1400px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        /* Section Headers */
        .section-header {
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        .section-header::before {
            content: '';
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            border-radius: 2px;
        }

        .section-header h2 {
            font-size: 2.8rem;
            margin-bottom: 15px;
            color: #ff6f61;
            font-weight: 800;
            letter-spacing: 1.2px;
        }

        .section-subtitle {
            font-size: 1.3rem;
            color: #5a6c7d;
            font-weight: 500;
            line-height: 1.8;
        }

        /* Vaccination Packages Section */
        .packages-section {
            margin-bottom: 80px;
        }

        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 35px;
            margin-bottom: 40px;
        }

        .package-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.08), 0 2px 8px rgba(0,0,0,0.04);
            padding: 35px 30px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255,111,97,0.05);
            position: relative;
            overflow: hidden;
        }

        .package-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }

        .package-card:hover::before {
            left: 0;
        }

        .package-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(255,111,97,0.15), 0 8px 25px rgba(0,0,0,0.08);
            border-color: rgba(255,111,97,0.2);
        }

        .package-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: white;
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            transition: all 0.3s ease;
        }

        .package-card:hover .package-icon {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,111,97,0.4);
        }

        .package-name {
            font-size: 1.8rem;
            margin: 0 0 10px 0;
            color: #2c3e50;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .package-price {
            font-size: 2.2rem;
            color: #ff6f61;
            font-weight: 900;
            margin-bottom: 20px;
        }

        .package-features {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
        }

        .package-features li {
            padding: 8px 0;
            color: #5a6c7d;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .package-features li i {
            color: #27ae60;
            font-size: 0.9rem;
        }

        .package-btn {
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
            gap: 8px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .package-btn::before {
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

        .package-btn:hover::before {
            left: 0;
        }

        .package-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }

        .popular-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Vaccination Experts Section */
        .experts-section {
            margin-bottom: 80px;
        }

        .experts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 35px;
        }

        .expert-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.08), 0 2px 8px rgba(0,0,0,0.04);
            padding: 35px 30px 30px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255,111,97,0.05);
            position: relative;
            overflow: hidden;
        }

        .expert-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }

        .expert-card:hover::before {
            left: 0;
        }

        .expert-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 50px rgba(255,111,97,0.15), 0 8px 25px rgba(0,0,0,0.08);
            border-color: rgba(255,111,97,0.2);
        }

        .expert-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            color: white;
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 3px solid #fff;
            font-family: 'Nunito', sans-serif;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .expert-card:hover .expert-avatar {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,111,97,0.4);
        }

        .expert-name {
            font-size: 1.6rem;
            margin: 0 0 8px 0;
            color: #2c3e50;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .expert-specialty {
            color: #ff6f61;
            font-size: 1rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .expert-experience {
            color: #5a6c7d;
            font-size: 0.9rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .expert-rating {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            margin-bottom: 15px;
        }

        .expert-stars {
            color: #ffc107;
            font-size: 1rem;
        }

        .expert-rating-text {
            color: #5a6c7d;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .expert-btn {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(39,174,96,0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .expert-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #229954 0%, #27ae60 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .expert-btn:hover::before {
            left: 0;
        }

        .expert-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(39,174,96,0.4);
            color: white;
            text-decoration: none;
        }

        /* Info Section */
        .info-section {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.08);
            margin-bottom: 80px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .info-item {
            text-align: center;
        }

        .info-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.8rem;
            color: white;
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
        }

        .info-title {
            font-size: 1.4rem;
            color: #2c3e50;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .info-description {
            color: #5a6c7d;
            line-height: 1.7;
            font-weight: 500;
        }

        /* Footer Styles */
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

        /* Responsive Design */
        @media (max-width: 900px) {
            .main-content {
                padding: 40px 20px;
            }
            
            .section-header h2 {
                font-size: 2.2rem;
            }
            
            .packages-grid, .experts-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 30px;
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
            
            .package-card, .expert-card {
                padding: 25px 20px 20px;
            }
            
            .info-section {
                padding: 30px 20px;
            }
        }

        @media (max-width: 500px) {
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
            
            .nav-link {
                padding: 8px 10px;
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
        <a href="{{ url('/vet-home') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Services
        </a>
        <div class="header-icon-container">
            <div class="header-icon">
                <span>💉</span>
            </div>
        </div>
        <h1>Schedule Vaccination</h1>
        <p>Protect your pet with professional vaccination services</p>
    </div>

    <div class="main-content">
        <!-- Vaccination Packages Section -->
        <section class="packages-section">
            <div class="section-header">
                <h2>Vaccination Packages</h2>
                <p class="section-subtitle">Comprehensive vaccination plans tailored for your pet's needs</p>
            </div>

            <div class="packages-grid">
                <!-- Basic Package -->
                <div class="package-card">
                    <div class="package-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="package-name">Basic Protection</h3>
                    <div class="package-price">৳2,500</div>
                    <ul class="package-features">
                        <li><i class="fas fa-check"></i> Core Vaccinations (DHPP)</li>
                        <li><i class="fas fa-check"></i> Rabies Vaccination</li>
                        <li><i class="fas fa-check"></i> Basic Health Checkup</li>
                        <li><i class="fas fa-check"></i> Vaccination Certificate</li>
                        <li><i class="fas fa-check"></i> 1 Follow-up Visit</li>
                    </ul>
                    <a href="{{ route('vaccination.booking', ['package' => 'Basic Protection']) }}" class="package-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Package
                    </a>
                </div>

                <!-- Premium Package -->
                <div class="package-card">
                    <div class="popular-badge">Most Popular</div>
                    <div class="package-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="package-name">Premium Protection</h3>
                    <div class="package-price">৳4,500</div>
                    <ul class="package-features">
                        <li><i class="fas fa-check"></i> All Basic Package Features</li>
                        <li><i class="fas fa-check"></i> Kennel Cough Vaccination</li>
                        <li><i class="fas fa-check"></i> Lyme Disease Protection</li>
                        <li><i class="fas fa-check"></i> Comprehensive Health Exam</li>
                        <li><i class="fas fa-check"></i> Deworming Treatment</li>
                        <li><i class="fas fa-check"></i> 3 Follow-up Visits</li>
                    </ul>
                    <a href="{{ route('vaccination.booking', ['package' => 'Premium Protection']) }}" class="package-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Package
                    </a>
                </div>

                <!-- Complete Package -->
                <div class="package-card">
                    <div class="package-icon">
                        <i class="fas fa-crown"></i>
                    </div>
                    <h3 class="package-name">Complete Care</h3>
                    <div class="package-price">৳6,800</div>
                    <ul class="package-features">
                        <li><i class="fas fa-check"></i> All Premium Package Features</li>
                        <li><i class="fas fa-check"></i> Annual Vaccination Plan</li>
                        <li><i class="fas fa-check"></i> Blood Work & Lab Tests</li>
                        <li><i class="fas fa-check"></i> Microchip Installation</li>
                        <li><i class="fas fa-check"></i> Emergency Support</li>
                        <li><i class="fas fa-check"></i> Unlimited Follow-ups</li>
                    </ul>
                    <a href="{{ route('vaccination.booking', ['package' => 'Complete Care']) }}" class="package-btn">
                        <i class="fas fa-calendar-plus"></i>
                        Book Package
                    </a>
                </div>
            </div>
        </section>

        <!-- Vaccination Experts Section -->
        <section class="experts-section">
            <div class="section-header">
                <h2>Our Vaccination Experts</h2>
                <p class="section-subtitle">Specialized veterinarians with expertise in pet immunization</p>
            </div>

            <div class="experts-grid">
                <!-- Dr. Aminul Islam -->
                <div class="expert-card">
                    <div class="expert-avatar" style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);">
                        AI
                    </div>
                    <h3 class="expert-name">Dr. Aminul Islam</h3>
                    <p class="expert-specialty">Vaccination Specialist</p>
                    <p class="expert-experience">12 years experience in pet immunization</p>
                    <div class="expert-rating">
                        <div class="expert-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="expert-rating-text">(4.9/5)</span>
                    </div>
                    <a href="{{ route('vaccination.booking', ['vet' => 'Dr. Aminul Islam']) }}" class="expert-btn">
                        <i class="fas fa-user-md"></i>
                        Book with Dr. Aminul
                    </a>
                </div>

                <!-- Dr. Sultana Razia -->
                <div class="expert-card">
                    <div class="expert-avatar" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">
                        SR
                    </div>
                    <h3 class="expert-name">Dr. Sultana Razia</h3>
                    <p class="expert-specialty">Immunology Expert</p>
                    <p class="expert-experience">15 years experience in vaccine development</p>
                    <div class="expert-rating">
                        <div class="expert-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="expert-rating-text">(4.8/5)</span>
                    </div>
                    <a href="{{ route('vaccination.booking', ['vet' => 'Dr. Sultana Razia']) }}" class="expert-btn">
                        <i class="fas fa-user-md"></i>
                        Book with Dr. Sultana
                    </a>
                </div>

                <!-- Dr. Karim Ahmed -->
                <div class="expert-card">
                    <div class="expert-avatar" style="background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);">
                        KA
                    </div>
                    <h3 class="expert-name">Dr. Karim Ahmed</h3>
                    <p class="expert-specialty">Preventive Medicine</p>
                    <p class="expert-experience">10 years experience in disease prevention</p>
                    <div class="expert-rating">
                        <div class="expert-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="expert-rating-text">(4.7/5)</span>
                    </div>
                    <a href="{{ route('vaccination.booking', ['vet' => 'Dr. Karim Ahmed']) }}" class="expert-btn">
                        <i class="fas fa-user-md"></i>
                        Book with Dr. Karim
                    </a>
                </div>

                <!-- Dr. Fatema Begum -->
                <div class="expert-card">
                    <div class="expert-avatar" style="background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);">
                        FB
                    </div>
                    <h3 class="expert-name">Dr. Fatema Begum</h3>
                    <p class="expert-specialty">Pet Wellness Expert</p>
                    <p class="expert-experience">8 years experience in comprehensive pet care</p>
                    <div class="expert-rating">
                        <div class="expert-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="expert-rating-text">(4.9/5)</span>
                    </div>
                    <a href="{{ route('vaccination.booking', ['vet' => 'Dr. Fatema Begum']) }}" class="expert-btn">
                        <i class="fas fa-user-md"></i>
                        Book with Dr. Fatema
                    </a>
                </div>

                <!-- Dr. Mohammad Hassan -->
                <div class="expert-card">
                    <div class="expert-avatar" style="background: linear-gradient(135deg, #1abc9c 0%, #16a085 100%);">
                        MH
                    </div>
                    <h3 class="expert-name">Dr. Mohammad Hassan</h3>
                    <p class="expert-specialty">Vaccine Research Specialist</p>
                    <p class="expert-experience">18 years experience in vaccine research</p>
                    <div class="expert-rating">
                        <div class="expert-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="expert-rating-text">(4.9/5)</span>
                    </div>
                    <a href="{{ route('vaccination.booking', ['vet' => 'Dr. Mohammad Hassan']) }}" class="expert-btn">
                        <i class="fas fa-user-md"></i>
                        Book with Dr. Hassan
                    </a>
                </div>

                <!-- Dr. Nasreen Akter -->
                <div class="expert-card">
                    <div class="expert-avatar" style="background: linear-gradient(135deg, #e67e22 0%, #d35400 100%);">
                        NA
                    </div>
                    <h3 class="expert-name">Dr. Nasreen Akter</h3>
                    <p class="expert-specialty">Senior Immunologist</p>
                    <p class="expert-experience">14 years experience in pet immunology</p>
                    <div class="expert-rating">
                        <div class="expert-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="expert-rating-text">(4.8/5)</span>
                    </div>
                    <a href="{{ route('vaccination.booking', ['vet' => 'Dr. Nasreen Akter']) }}" class="expert-btn">
                        <i class="fas fa-user-md"></i>
                        Book with Dr. Nasreen
                    </a>
                </div>

                <!-- Dr. Rafiqul Islam -->
                <div class="expert-card">
                    <div class="expert-avatar" style="background: linear-gradient(135deg, #8e44ad 0%, #6c3483 100%);">
                        RI
                    </div>
                    <h3 class="expert-name">Dr. Rafiqul Islam</h3>
                    <p class="expert-specialty">Exotic Pet Vaccination</p>
                    <p class="expert-experience">11 years experience with exotic pets</p>
                    <div class="expert-rating">
                        <div class="expert-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="expert-rating-text">(4.7/5)</span>
                    </div>
                    <a href="{{ route('vaccination.booking', ['vet' => 'Dr. Rafiqul Islam']) }}" class="expert-btn">
                        <i class="fas fa-user-md"></i>
                        Book with Dr. Rafiqul
                    </a>
                </div>
            </div>
        </section>

        <!-- Information Section -->
        <section class="info-section">
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="info-title">Flexible Scheduling</h3>
                    <p class="info-description">Book appointments that fit your schedule. We offer morning, afternoon, and evening slots to accommodate your busy lifestyle.</p>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="info-title">Certified Vaccines</h3>
                    <p class="info-description">All our vaccines are certified and approved by veterinary authorities, ensuring the highest safety standards for your pet.</p>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="info-title">Caring Support</h3>
                    <p class="info-description">Our team provides compassionate care throughout the vaccination process, ensuring your pet feels comfortable and safe.</p>
                </div>
            </div>
        </section>
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

    <script>
        // Add animation on scroll
        function animateOnScroll() {
            const cards = document.querySelectorAll('.package-card, .expert-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        }

        // Initialize animations
        window.addEventListener('load', animateOnScroll);
    </script>
</body>
</html>
