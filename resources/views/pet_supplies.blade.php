@extends('layouts.app')

@section('title', 'Pet Supplies - PETSROLOGY')

@section('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: #333;
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
    </style>
@endsection

@section('content')
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
                <a href="{{ route('shop.toys') }}" class="supply-link">Browse Toys</a>
            </div>
            <div class="supply-card">
                <div class="supply-icon">🛏️</div>
                <div class="supply-title">Beds & Comfort</div>
                <div class="supply-desc">Soft beds, cozy blankets, and comfort items for restful naps and sweet dreams.</div>
                <a href="/shop-beds" class="supply-link">See Beds</a>
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
@endsection