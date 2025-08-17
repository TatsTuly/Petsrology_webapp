@extends('layouts.app')

@section('title', 'Pet Food Shop - PETSROLOGY')

@section('styles')
    <style>
        /* Override layout styles for full-width header */
        .main-content {
            padding: 0 !important;
            margin: 0 !important;
            min-height: calc(100vh - 70px) !important;
        }

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
            margin: 0 !important;
        }

        /* Enhanced Header - Full Width */
        .header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            text-align: center;
            padding: 80px 20px 60px;
            box-shadow: 0 4px 20px rgba(255,111,97,0.2);
            position: relative;
            overflow: hidden;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            margin-top: 0 !important;
            margin-bottom: 0;
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

        /* Page Container for content after header */
        .page-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
        }
        /* Shop Category Filters */
        .filter-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            border: 1px solid rgba(255,111,97,0.1);
        }

        .filter-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #ff6f61;
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
            grid-template-columns: repeat(4, 1fr);
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
        
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 100px 0 60px;
                background-attachment: scroll;
            }

            .hero-text h1 {
                font-size: 2.5rem;
                letter-spacing: 1px;
            }

            .hero-text p {
                font-size: 1.1rem;
            }

            .hero-content {
                padding: 0 15px;
            }

            .filter-controls {
                grid-template-columns: 1fr;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            header h1 {
                font-size: 2.2rem;
            }
            
        }
        
        @media (max-width: 600px) {
            header {
                padding: 40px 20px 30px;
            }
            .filter-section {
                padding: 20px 15px;
            }
            .products-grid {
                grid-template-columns: 1fr;
            }
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

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            margin-bottom: 40px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(255,111,97,0.2);
            border-color: rgba(255,111,97,0.3);
        }

        .add-to-cart-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .add-to-cart-btn:hover {
            background: linear-gradient(135deg, #e55a50 0%, #ff7f5c 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,111,97,0.4);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .page-container {
                padding: 30px 15px;
            }
            
            .products-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 900px) {
            .header {
                padding: 60px 20px 50px;
            }
            
            .header h1 {
                font-size: 2.5rem;
            }
            
            .header p {
                font-size: 1.1rem;
            }
            
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 50px 15px 40px;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }
            
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 12px 18px;
                font-size: 0.95rem;
            }
            
            .products-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        @media (max-width: 600px) {
            .header {
                padding: 40px 15px 30px;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
            
            .header-icon {
                width: 70px;
                height: 70px;
            }
            
            .header-icon span {
                font-size: 2.5rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Enhanced Header with Back Button -->
    <div class="header">
        <a href="{{ url('/pet-supplies') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Pet Supplies
        </a>
        
        <div class="header-icon-container">
            <div class="header-icon">
                <span>🍽️</span>
            </div>
        </div>
        
        <h1>Pet Food Shop</h1>
        <p>Premium nutrition for your beloved pets - healthy, delicious, and trusted brands</p>
    </div>

    <!-- Page Container -->
    <div class="page-container">
        <!-- Filter Section -->
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
                @php
                    $foodProducts = \App\Models\FoodProduct::where('is_active', true)->get();
                @endphp
                
                @foreach($foodProducts as $product)
                    <div class="product-card" data-pet="{{ $product->pet_type }}" data-age="{{ $product->age_group }}" data-type="{{ $product->food_type }}" data-price="{{ $product->price }}">
                        <div class="product-image">
                            @if($product->image)
                                @if(Str::startsWith($product->image, 'http'))
                                    <img src="{{ $product->image }}" alt="{{ $product->title }}">
                                @else
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                                @endif
                            @else
                                <div style="width: 100%; height: 100%; background: #f8f9fa; display: flex; align-items: center; justify-content: center; color: #999;">
                                    <i class="fas fa-image" style="font-size: 2rem;"></i>
                                </div>
                            @endif
                            @if($product->badge)
                                <div class="product-badge">{{ $product->badge }}</div>
                            @endif
                        </div>
                        <div class="product-info">
                            <div class="product-brand">{{ $product->brand }}</div>
                            <div class="product-title">{{ $product->title }}</div>
                            <div class="product-description">{{ $product->description }}</div>

                            <div class="product-price">
                                <div>
                                    <span class="price">৳{{ number_format($product->price, 0) }}</span>
                                    @if($product->old_price)
                                        <span class="old-price">৳{{ number_format($product->old_price, 0) }}</span>
                                    @endif
                                </div>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <span>{{ $product->rating }}</span>
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
                @endforeach


            </div>
        </div>
    
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
    
    </div> <!-- Close page-container -->
    
@endsection

@section('scripts')
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
@endsection
