<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Food Shop - PETSROLOGY</title>
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
        
        header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 2px 10px rgba(255,111,97,0.1);
            position: relative;
        }
        
        header h1 {
            font-size: 2.8rem;
            margin: 0;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        header p {
            font-size: 1.2rem;
            margin: 15px 0 0;
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
            transition: background 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .back-btn:hover {
            background: rgba(255,255,255,0.3);
            color: white;
            text-decoration: none;
        }
        
        .shop-section {
            padding: 40px 20px 60px;
            background: #f8f9fa;
        }
        
        .shop-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .filter-section {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.08);
            border-top: 4px solid #ff6f61;
        }
        
        .filter-title {
            color: #ff6f61;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .filter-controls {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
        }
        
        .filter-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        
        .filter-group select,
        .filter-group input {
            padding: 10px 12px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .filter-group select:focus,
        .filter-group input:focus {
            outline: none;
            border-color: #ff6f61;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }
        
        .search-box {
            grid-column: 1 / -1;
            position: relative;
        }
        
        .search-box input {
            width: 100%;
            padding-left: 45px;
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        
        .product-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255,111,97,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(255,111,97,0.15);
            border-color: #ff6f61;
        }
        
        .product-image {
            height: 220px;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.05);
        }
        
        .product-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255,255,255,0.9);
            color: #ff6f61;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .product-info {
            padding: 20px;
        }
        
        .product-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        
        .product-brand {
            color: #ff6f61;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .product-description {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }
        
        .product-features {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 15px;
        }
        
        .feature-tag {
            background: #f8f9fa;
            color: #666;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            border: 1px solid #e9ecef;
        }
        
        .product-price {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .price {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ff6f61;
        }
        
        .old-price {
            font-size: 1rem;
            color: #999;
            text-decoration: line-through;
            margin-left: 10px;
        }
        
        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #ffa500;
        }
        
        .product-actions {
            display: flex;
            gap: 10px;
        }
        
        .add-to-cart {
            flex: 1;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
        }
        
        .wishlist-btn {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e9ecef;
            padding: 12px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .wishlist-btn:hover {
            background: #ff6f61;
            color: white;
            border-color: #ff6f61;
        }
        
        /* Footer Styles - matching other pages */
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
        
        @media (max-width: 768px) {
            .filter-controls {
                grid-template-columns: 1fr;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }
            
            header h1 {
                font-size: 2.2rem;
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
            header {
                padding: 40px 20px 30px;
            }
            .shop-section {
                padding: 30px 15px 50px;
            }
            .filter-section {
                padding: 20px 15px;
            }
            .products-grid {
                grid-template-columns: 1fr;
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
        
        /* Floating Cart Styles */
        .floating-cart {
            position: fixed;
            bottom: 80px;
            right: 30px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
            border: none;
        }
        
        .floating-cart:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(255,111,97,0.6);
        }
        
        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff3333;
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 24px;
            border: 2px solid white;
        }
        
        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 2000;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .cart-overlay.show {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
        }
        
        .cart-panel {
            background: white;
            width: 90%;
            max-width: 500px;
            max-height: 80vh;
            border-radius: 15px;
            overflow: hidden;
            transform: translateY(50px);
            transition: transform 0.3s ease;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        
        .cart-overlay.show .cart-panel {
            transform: translateY(0);
        }
        
        .cart-header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .cart-header h3 {
            margin: 0;
            font-size: 1.3rem;
            font-weight: 700;
        }
        
        .close-cart {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            transition: background 0.3s ease;
        }
        
        .close-cart:hover {
            background: rgba(255,255,255,0.2);
        }
        
        .cart-items {
            max-height: 400px;
            overflow-y: auto;
            padding: 0;
        }
        
        .cart-item {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            gap: 15px;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .cart-item-image {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }
        
        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .cart-item-details {
            flex: 1;
        }
        
        .cart-item-title {
            font-weight: 600;
            color: #333;
            font-size: 0.95rem;
            margin-bottom: 5px;
        }
        
        .cart-item-brand {
            color: #ff6f61;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .cart-item-price {
            color: #333;
            font-weight: 700;
            font-size: 1rem;
            margin-top: 5px;
        }
        
        .cart-item-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f8f9fa;
            border-radius: 20px;
            padding: 5px 10px;
        }
        
        .quantity-btn {
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
            font-size: 1rem;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .quantity-btn:hover {
            background: #ff6f61;
            color: white;
        }
        
        .quantity-display {
            font-weight: 600;
            min-width: 20px;
            text-align: center;
            font-size: 0.9rem;
        }
        
        .remove-item {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 1.1rem;
            padding: 5px;
            border-radius: 50%;
            transition: all 0.2s ease;
        }
        
        .remove-item:hover {
            background: #dc3545;
            color: white;
        }
        
        .cart-footer {
            padding: 20px;
            border-top: 2px solid #f8f9fa;
            background: #fff;
        }
        
        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
        }
        
        .checkout-btn {
            width: 100%;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
        }
        
        .empty-cart {
            text-align: center;
            padding: 40px 20px;
            color: #666;
        }
        
        .empty-cart i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 15px;
        }
        
        .empty-cart h4 {
            margin-bottom: 10px;
            color: #333;
        }
        
        @media (max-width: 768px) {
            .floating-cart {
                width: 55px;
                height: 55px;
                bottom: 20px;
                right: 20px;
            }
            
            .cart-panel {
                width: 95%;
                max-height: 85vh;
            }
            
            .cart-item {
                padding: 12px 15px;
            }
            
            .cart-item-image {
                width: 50px;
                height: 50px;
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
    
    <header>
        <a href="{{ route('pet.supplies') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Pet Supplies</a>
        <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:18px;">
            <div style="width:80px;height:80px;background:rgba(255,255,255,0.15);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 8px 25px rgba(255,111,97,0.3);backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.2);">
                <i class="fas fa-bone" style="font-size:2.5rem;color:white;"></i>
            </div>
        </div>
        <h1>Pet Food Shop</h1>
        <p>Premium nutrition for your beloved pets - healthy, delicious, and trusted brands</p>
    </header>

    <section class="shop-section">
        <div class="shop-container">
            <div class="filter-section">
                <div class="filter-title">
                    <i class="fas fa-filter"></i>
                    Find the Perfect Food
                </div>
                <div class="filter-controls">
                    <div class="filter-group">
                        <label for="petType">Pet Type</label>
                        <select id="petType" name="petType">
                            <option value="">All Pets</option>
                            <option value="dog">Dogs</option>
                            <option value="cat">Cats</option>
                            <option value="bird">Birds</option>
                            <option value="rabbit">Rabbits</option>
                            <option value="fish">Fish</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="ageGroup">Age Group</label>
                        <select id="ageGroup" name="ageGroup">
                            <option value="">All Ages</option>
                            <option value="puppy">Puppy/Kitten</option>
                            <option value="adult">Adult</option>
                            <option value="senior">Senior</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="foodType">Food Type</label>
                        <select id="foodType" name="foodType">
                            <option value="">All Types</option>
                            <option value="dry">Dry Food</option>
                            <option value="wet">Wet Food</option>
                            <option value="treats">Treats</option>
                            <option value="raw">Raw Food</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="priceRange">Price Range</label>
                        <select id="priceRange" name="priceRange">
                            <option value="">All Prices</option>
                            <option value="0-500">৳0 - ৳500</option>
                            <option value="500-1000">৳500 - ৳1,000</option>
                            <option value="1000-2000">৳1,000 - ৳2,000</option>
                            <option value="2000+">৳2,000+</option>
                        </select>
                    </div>
                    <div class="filter-group search-box">
                        <label for="search">Search Products</label>
                        <input type="text" id="search" name="search" placeholder="Search for food brands, ingredients...">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
            </div>

            <div class="products-grid" id="productsGrid">
                <!-- Dog Food Products -->
                <div class="product-card" data-pet="dog" data-age="adult" data-type="dry" data-price="850">
                    <div class="product-image">
                        <img src="https://shop.royalcanin.ca/cdn/shop/products/n5ue7pedongc7yiawvq0.jpg?v=1609254626&width=1500" alt="Royal Canin Adult Dog Food">
                        <div class="product-badge">Popular</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Royal Canin</div>
                        <div class="product-title">Adult Dog Food - Chicken & Rice</div>
                        <div class="product-description">Complete nutrition for adult dogs with high-quality protein and essential nutrients.</div>
                        <div class="product-features">
                            <span class="feature-tag">High Protein</span>
                            <span class="feature-tag">Natural</span>
                            <span class="feature-tag">2kg</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳850</span>
                                <span class="old-price">৳950</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.8</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-pet="cat" data-age="adult" data-type="wet" data-price="450">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqvJIF9kBdHPQT5CoA69Z2zq1pBoHnfqgKkw&s" alt="Whiskas Cat Food">
                        <div class="product-badge">New</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Whiskas</div>
                        <div class="product-title">Cat Food - Tuna in Gravy</div>
                        <div class="product-description">Delicious wet food with real tuna pieces in savory gravy, perfect for adult cats.</div>
                        <div class="product-features">
                            <span class="feature-tag">Real Fish</span>
                            <span class="feature-tag">Gravy</span>
                            <span class="feature-tag">400g</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳450</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.6</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-pet="dog" data-age="puppy" data-type="dry" data-price="1200">
                    <div class="product-image">
                        <img src="https://m.media-amazon.com/images/I/81HfEtQtIDL._UF1000,1000_QL80_.jpg" alt="Pedigree Puppy Food">
                        <div class="product-badge">Premium</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Pedigree</div>
                        <div class="product-title">Puppy Food - Chicken & Milk</div>
                        <div class="product-description">Specially formulated for growing puppies with calcium and DHA for healthy development.</div>
                        <div class="product-features">
                            <span class="feature-tag">Puppy Formula</span>
                            <span class="feature-tag">Calcium+</span>
                            <span class="feature-tag">3kg</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳1,200</span>
                                <span class="old-price">৳1,350</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.7</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-pet="bird" data-age="adult" data-type="treats" data-price="320">
                    <div class="product-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbwYG54uIkxneJ3nyqOfPmkcHBO6W1AB7K8Q&s" alt="Bird Seed Mix">
                        <div class="product-badge">Organic</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Vitakraft</div>
                        <div class="product-title">Bird Seed Mix - Premium Blend</div>
                        <div class="product-description">Natural seed mix with sunflower seeds, millet, and dried fruits for all bird types.</div>
                        <div class="product-features">
                            <span class="feature-tag">Natural</span>
                            <span class="feature-tag">Mixed Seeds</span>
                            <span class="feature-tag">500g</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳320</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-pet="cat" data-age="senior" data-type="dry" data-price="950">
                    <div class="product-image">
                        <img src="https://pxmshare.colgatepalmolive.com/JPEG_1500/R1smRgNvhXECmYV_qdHdo.jpg" alt="Senior Cat Food">
                        <div class="product-badge">Senior</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Hill's Science Diet</div>
                        <div class="product-title">Senior Cat Food - Chicken</div>
                        <div class="product-description">Specially formulated for senior cats with easy-to-digest ingredients and joint support.</div>
                        <div class="product-features">
                            <span class="feature-tag">Senior Formula</span>
                            <span class="feature-tag">Joint Care</span>
                            <span class="feature-tag">1.5kg</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳950</span>
                                <span class="old-price">৳1,100</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.9</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-pet="rabbit" data-age="adult" data-type="dry" data-price="680">
                    <div class="product-image">
                        <img src="https://images-cdn.ubuy.co.id/65b4a8dfd4f9a162d5662ca8-menu-premium-rabbit-food-timothy-hay.jpg" alt="Rabbit Pellets">
                        <div class="product-badge">Natural</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Oxbow</div>
                        <div class="product-title">Rabbit Pellets - Timothy Hay</div>
                        <div class="product-description">High-fiber pellets made from timothy hay, perfect for adult rabbit nutrition.</div>
                        <div class="product-features">
                            <span class="feature-tag">High Fiber</span>
                            <span class="feature-tag">Timothy Hay</span>
                            <span class="feature-tag">1kg</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳680</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.4</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-pet="dog" data-age="adult" data-type="treats" data-price="380">
                    <div class="product-image">
                        <img src="https://images.albertsons-media.com/is/image/ABS/960225872?$ng-ecom-pdp-desktop$&defaultImage=Not_Available" alt="Dog Dental Treats">
                        <div class="product-badge">Bestseller</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Pedigree</div>
                        <div class="product-title">Dentastix - Dental Treats</div>
                        <div class="product-description">Daily dental care treats that help reduce tartar buildup and freshen breath.</div>
                        <div class="product-features">
                            <span class="feature-tag">Dental Care</span>
                            <span class="feature-tag">Fresh Breath</span>
                            <span class="feature-tag">28 Sticks</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳380</span>
                                <span class="old-price">৳420</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.6</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="product-card" data-pet="fish" data-age="adult" data-type="dry" data-price="280">
                    <div class="product-image">
                        <img src="https://static-01.daraz.com.bd/p/692b29da77a63c12c2d2a1b6d403bb48.jpg" alt="Fish Food Flakes">
                        <div class="product-badge">Aquatic</div>
                    </div>
                    <div class="product-info">
                        <div class="product-brand">Tetra</div>
                        <div class="product-title">Tropical Fish Flakes</div>
                        <div class="product-description">Complete nutrition for tropical fish with enhanced colors and vitality.</div>
                        <div class="product-features">
                            <span class="feature-tag">Color Enhancing</span>
                            <span class="feature-tag">Tropical</span>
                            <span class="feature-tag">200g</span>
                        </div>
                        <div class="product-price">
                            <div>
                                <span class="price">৳280</span>
                            </div>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <span>4.3</span>
                            </div>
                        </div>
                        <div class="product-actions">
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>
                                Add to Cart
                            </button>
                            <button class="wishlist-btn">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Floating Cart Button -->
    <button class="floating-cart" onclick="openCart()">
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count" id="cartCount">0</span>
    </button>

    <!-- Cart Overlay -->
    <div class="cart-overlay" id="cartOverlay" onclick="closeCart()">
        <div class="cart-panel" onclick="event.stopPropagation()">
            <div class="cart-header">
                <h3><i class="fas fa-shopping-cart"></i> Shopping Cart</h3>
                <button class="close-cart" onclick="closeCart()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="cart-items" id="cartItems">
                <div class="empty-cart">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>Your cart is empty</h4>
                    <p>Add some food to get started!</p>
                </div>
            </div>
            <div class="cart-footer" id="cartFooter" style="display: none;">
                <div class="cart-total">
                    <span>Total: </span>
                    <span id="cartTotal">৳0</span>
                </div>
                <button class="checkout-btn" onclick="checkout()">
                    <i class="fas fa-credit-card"></i>
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
    
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="{{ url('/welcome') }}"><i class="fas fa-home"></i>Home</a></li>
                    <li><a href="{{ url('/adopt-home') }}"><i class="fas fa-heart"></i>Adopt a Pet</a></li>
                    <li><a href="{{ url('/vet-home') }}"><i class="fas fa-stethoscope"></i>Veterinary Support</a></li>
                    <li><a href="{{ route('pet.supplies') }}"><i class="fas fa-shopping-bag"></i>Pet Supplies</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Services</h3>
                <ul>
                    <li><a href="#"><i class="fas fa-clipboard-check"></i>Health Checkups</a></li>
                    <li><a href="#"><i class="fas fa-syringe"></i>Vaccinations</a></li>
                    <li><a href="#"><i class="fas fa-cut"></i>Pet Grooming</a></li>
                    <li><a href="#"><i class="fas fa-ambulance"></i>Emergency Care</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul>
                    <li><a href="tel:+8801777987654"><i class="fas fa-phone"></i>+880 1777-987654</a></li>
                    <li><a href="mailto:info@petsrology.com"><i class="fas fa-envelope"></i>info@petsrology.com</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i>123 Pet Street, Dhaka</a></li>
                    <li><a href="#"><i class="fas fa-clock"></i>24/7 Emergency Service</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i>Facebook</a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i>YouTube</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 PETSROLOGY. All rights reserved. | Caring for your pets with love and expertise.</p>
        </div>
    </footer>
    
    <script>
        // Cart functionality
        let cart = [];
        
        function updateCartCount() {
            const cartCount = document.getElementById('cartCount');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            cartCount.textContent = totalItems;
            cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
        }
        
        function updateCartDisplay() {
            const cartItems = document.getElementById('cartItems');
            const cartFooter = document.getElementById('cartFooter');
            const cartTotal = document.getElementById('cartTotal');
            
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <h4>Your cart is empty</h4>
                        <p>Add some food to get started!</p>
                    </div>
                `;
                cartFooter.style.display = 'none';
            } else {
                let total = 0;
                cartItems.innerHTML = cart.map(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    return `
                        <div class="cart-item">
                            <div class="cart-item-image">
                                <img src="${item.image}" alt="${item.title}">
                            </div>
                            <div class="cart-item-details">
                                <div class="cart-item-title">${item.title}</div>
                                <div class="cart-item-brand">${item.brand}</div>
                                <div class="cart-item-price">৳${itemTotal}</div>
                            </div>
                            <div class="cart-item-controls">
                                <div class="quantity-control">
                                    <button class="quantity-btn" onclick="changeQuantity('${item.id}', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity-display">${item.quantity}</span>
                                    <button class="quantity-btn" onclick="changeQuantity('${item.id}', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <button class="remove-item" onclick="removeFromCart('${item.id}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                }).join('');
                
                cartTotal.textContent = `৳${total}`;
                cartFooter.style.display = 'block';
            }
            
            updateCartCount();
        }
        
        function addToCart(productCard) {
            const title = productCard.querySelector('.product-title').textContent;
            const brand = productCard.querySelector('.product-brand').textContent;
            const priceText = productCard.querySelector('.price').textContent;
            const price = parseInt(priceText.replace('৳', ''));
            const image = productCard.querySelector('.product-image img').src;
            const id = `${brand}-${title}`.replace(/\s+/g, '-').toLowerCase();
            
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({
                    id,
                    title,
                    brand,
                    price,
                    image,
                    quantity: 1
                });
            }
            
            updateCartDisplay();
            
            // Show success message
            showCartMessage(`${title} added to cart!`);
        }
        
        function changeQuantity(itemId, change) {
            const item = cart.find(item => item.id === itemId);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeFromCart(itemId);
                } else {
                    updateCartDisplay();
                }
            }
        }
        
        function removeFromCart(itemId) {
            cart = cart.filter(item => item.id !== itemId);
            updateCartDisplay();
        }
        
        function openCart() {
            document.getElementById('cartOverlay').classList.add('show');
            document.body.style.overflow = 'hidden';
        }
        
        function closeCart() {
            document.getElementById('cartOverlay').classList.remove('show');
            document.body.style.overflow = 'auto';
        }
        
        function checkout() {
            if (cart.length === 0) return;
            
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const itemCount = cart.reduce((sum, item) => sum + item.quantity, 0);
            
            alert(`Checkout Summary:\n\nItems: ${itemCount}\nTotal: ৳${total}\n\nThank you for shopping with PETSROLOGY!\nRedirecting to payment...`);
            
            // Clear cart after checkout
            cart = [];
            updateCartDisplay();
            closeCart();
        }
        
        function showCartMessage(message) {
            // Create temporary message
            const messageDiv = document.createElement('div');
            messageDiv.style.cssText = `
                position: fixed;
                top: 100px;
                right: 30px;
                background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
                color: white;
                padding: 15px 20px;
                border-radius: 25px;
                font-weight: 600;
                z-index: 3000;
                box-shadow: 0 8px 25px rgba(40, 167, 69, 0.3);
                transform: translateX(400px);
                transition: transform 0.3s ease;
            `;
            messageDiv.textContent = message;
            document.body.appendChild(messageDiv);
            
            // Animate in
            setTimeout(() => {
                messageDiv.style.transform = 'translateX(0)';
            }, 100);
            
            // Animate out and remove
            setTimeout(() => {
                messageDiv.style.transform = 'translateX(400px)';
                setTimeout(() => {
                    document.body.removeChild(messageDiv);
                }, 300);
            }, 3000);
        }

        // Filter functionality
        function filterProducts() {
            const petType = document.getElementById('petType').value;
            const ageGroup = document.getElementById('ageGroup').value;
            const foodType = document.getElementById('foodType').value;
            const priceRange = document.getElementById('priceRange').value;
            const searchTerm = document.getElementById('search').value.toLowerCase();
            
            const products = document.querySelectorAll('.product-card');
            
            products.forEach(product => {
                let show = true;
                
                // Pet type filter
                if (petType && product.dataset.pet !== petType) {
                    show = false;
                }
                
                // Age group filter
                if (ageGroup && product.dataset.age !== ageGroup) {
                    show = false;
                }
                
                // Food type filter
                if (foodType && product.dataset.type !== foodType) {
                    show = false;
                }
                
                // Price range filter
                if (priceRange) {
                    const price = parseInt(product.dataset.price);
                    if (priceRange === '0-500' && (price < 0 || price > 500)) show = false;
                    if (priceRange === '500-1000' && (price < 500 || price > 1000)) show = false;
                    if (priceRange === '1000-2000' && (price < 1000 || price > 2000)) show = false;
                    if (priceRange === '2000+' && price < 2000) show = false;
                }
                
                // Search filter
                if (searchTerm) {
                    const title = product.querySelector('.product-title').textContent.toLowerCase();
                    const brand = product.querySelector('.product-brand').textContent.toLowerCase();
                    const description = product.querySelector('.product-description').textContent.toLowerCase();
                    
                    if (!title.includes(searchTerm) && !brand.includes(searchTerm) && !description.includes(searchTerm)) {
                        show = false;
                    }
                }
                
                product.style.display = show ? 'block' : 'none';
            });
        }
        
        // Add event listeners
        document.getElementById('petType').addEventListener('change', filterProducts);
        document.getElementById('ageGroup').addEventListener('change', filterProducts);
        document.getElementById('foodType').addEventListener('change', filterProducts);
        document.getElementById('priceRange').addEventListener('change', filterProducts);
        document.getElementById('search').addEventListener('input', filterProducts);
        
        // Add to cart functionality
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productCard = this.closest('.product-card');
                addToCart(productCard);
                
                // Visual feedback
                const originalContent = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> Added!';
                this.style.background = '#28a745';
                
                setTimeout(() => {
                    this.innerHTML = originalContent;
                    this.style.background = '';
                }, 2000);
            });
        });
        
        // Wishlist functionality
        document.querySelectorAll('.wishlist-btn').forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
                if (this.classList.contains('active')) {
                    this.style.background = '#ff6f61';
                    this.style.color = 'white';
                    this.querySelector('i').classList.remove('far');
                    this.querySelector('i').classList.add('fas');
                } else {
                    this.style.background = '';
                    this.style.color = '';
                    this.querySelector('i').classList.remove('fas');
                    this.querySelector('i').classList.add('far');
                }
            });
        });
    </script>
</body>
</html>
