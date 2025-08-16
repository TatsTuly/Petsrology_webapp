<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PETSROLOGY')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 50%, #ffcccb 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
        }
        .main-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
        /* Navbar Styles matching welcome page */
        .vet-navbar {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 0;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 111, 97, 0.1);
            position: relative;
            z-index: 1000;
        }
        
        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .brand-logo {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.3);
        }
        
        .brand-text {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'Nunito', sans-serif;
            letter-spacing: -1px;
        }
        
        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
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
            border-radius: 20px;
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
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.2);
        }
        
        .nav-link:hover::before {
            left: 0;
        }
        
        .nav-link.active {
            background: #ff6f61;
            color: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.3);
        }
        
        .nav-link.active::before {
            left: 0;
            background: #ff6f61;
        }
        
        .logout-btn {
            background: transparent;
            color: #ff6f61;
            border: 2px solid #ff6f61;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .logout-btn:hover {
            background: #ff6f61;
            color: white;
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .vet-navbar {
                padding: 0.5rem 0;
            }
            
            .brand-logo {
                width: 40px;
                height: 40px;
            }
            
            .brand-text {
                font-size: 1.5rem;
            }
            
            .navbar-nav {
                flex-direction: column;
                width: 100%;
                display: none;
            }
            
            .navbar-nav.show {
                display: flex;
            }
            
            .nav-link {
                padding: 10px;
                margin: 5px 0;
            }
        }
        @yield('styles')
    </style>
</head>
<body>
    <div class="main-content">
        <!-- Navbar matching welcome page design -->
        <nav class="vet-navbar">
            <div class="navbar-container">
                <a href="{{ url('/vet-homepage') }}" class="navbar-brand">
                    <div class="brand-logo">
                        🐾
                    </div>
                    <span class="brand-text">PETSROLOGY</span>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('/vet-homepage') }}" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/vet-dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline; margin: 0;">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        
        @yield('content')
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
                <h3>Contact Us</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> House 15, Road 27, Block K, Banani, Dhaka</a></li>
                    <li><a href="#"><i class="fas fa-phone"></i> +880 1711-234567</a></li>
                    <li><a href="#"><i class="fas fa-envelope"></i> info@petsrology.com.bd</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 PETSROLOGY. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
