<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            //tuly test
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

        .search-filter-section {
            background: #fff;
            padding: 30px 20px;
            margin: -20px 20px 0;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(255,111,97,0.12);
            position: relative;
            z-index: 2;
        }

        .search-filter-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 25px;
            padding: 8px 20px;
            margin-bottom: 25px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .search-bar:focus-within {
            border-color: #ff6f61;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }

        .search-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 12px 15px;
            font-size: 1rem;
            outline: none;
            font-family: 'Nunito', sans-serif;
        }

        .search-input::placeholder {
            color: #999;
        }

        .search-icon {
            color: #ff6f61;
            font-size: 1.2rem;
        }

        .filters-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .filter-group {
            position: relative;
        }

        .filter-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            background: #fff;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            border-color: #ff6f61;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }

        .clear-filters-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .clear-filters-btn:hover {
            background: #5a6268;
            transform: translateY(-1px);
        }

        .results-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 0 5px;
        }

        .results-count {
            color: #666;
            font-weight: 600;
        }

        .view-toggle {
            display: flex;
            gap: 8px;
        }

        .view-btn {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            padding: 8px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .view-btn.active {
            background: #ff6f61;
            color: white;
            border-color: #ff6f61;
        }

        .view-btn:hover {
            border-color: #ff6f61;
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
        .greeting-section {
            padding: 40px 20px 30px;
            background: #f8f9fa;
        }

        .greeting-content {
            max-width: 1000px;
            margin: 0 auto;
        }

        .greeting-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            font-weight: 700;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(255,111,97,0.2);
        }

        .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .greeting-text h2 {
            margin: 0;
            font-size: 1.8rem;
            color: #333;
            font-weight: 700;
        }

        .greeting-text p {
            margin: 5px 0 0;
            color: #666;
            font-size: 1rem;
        }

        .stats-summary {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #ff6f61;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
            margin-top: 2px;
        }
        .categories {
            padding: 20px 20px 40px;
            background: #fff;
        }
        .categories-content {
            max-width: 800px;
            margin: 0 auto;
        }
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        .category-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            padding: 20px;
            text-align: center;
            transition: box-shadow 0.25s, transform 0.25s, border 0.25s;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .category-card:hover {
            box-shadow: 0 8px 32px rgba(255,111,97,0.18), 0 3px 12px rgba(0,0,0,0.08);
            border: 2px solid #ff6f61;
            transform: translateY(-5px) scale(1.02);
        }
        .category-card.active {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: 2px solid #ff6f61;
        }
        .category-icon {
            width: 40px;
            height: 40px;
            margin: 0 auto 10px;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .category-card h4 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
        }
        .pets-section {
            padding: 30px 20px 60px;
            background: #f8f9fa;
        }

        .pets-content {
            max-width: 1000px;
            margin: 0 auto;
        }

        .pets-grid {
            display: grid;
            gap: 25px;
            transition: all 0.3s ease;
        }

        .pets-grid.grid-view {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        }

        .pets-grid.list-view {
            grid-template-columns: 1fr;
        }

        .pet-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.08);
            padding: 25px;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .pet-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        }

        .pet-card:hover {
            box-shadow: 0 8px 30px rgba(255,111,97,0.15);
            border-color: #ff6f61;
            transform: translateY(-5px);
        }

        .list-view .pet-card {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .grid-view .pet-card {
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .pet-image {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            object-fit: cover;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(255,111,97,0.1);
            flex-shrink: 0;
        }

        .grid-view .pet-image {
            margin: 0 auto 20px;
        }

        .pet-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .pet-info {
            flex: 1;
        }

        .grid-view .pet-info {
            text-align: center;
        }

        .pet-info h3 {
            margin: 0 0 8px 0;
            font-size: 1.4rem;
            color: #333;
            font-weight: 700;
        }

        .pet-breed {
            color: #ff6f61;
            margin: 0 0 6px 0;
            font-size: 1rem;
            font-weight: 600;
        }

        .pet-details {
            color: #666;
            font-size: 0.95rem;
            margin: 0 0 15px 0;
        }

        .pet-tags {
            display: flex;
            gap: 8px;
            margin-bottom: 15px;
            flex-wrap: wrap;
        }

        .grid-view .pet-tags {
            justify-content: center;
        }

        .pet-tag {
            background: #f8f9fa;
            color: #666;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .pet-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .grid-view .pet-actions {
            justify-content: center;
        }

        .adopt-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .adopt-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255,111,97,0.3);
        }

        .favorite-btn {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e9ecef;
            padding: 8px 12px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .favorite-btn:hover,
        .favorite-btn.active {
            background: #ff6f61;
            color: white;
            border-color: #ff6f61;
        }

        .no-pets-message {
            text-align: center;
            padding: 60px 20px;
            color: #666;
        }

        .no-pets-message i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 20px;
            display: block;
        }

        .no-pets-message h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #999;
        }

        .no-pets-message p {
            font-size: 1rem;
            margin: 0;
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
        @media (max-width: 900px) {
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .pet-card {
                flex-direction: column;
                text-align: center;
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
            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            .greeting-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
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
                    <a href="{{ url('/adopt-home') }}" class="nav-link active">Adopt a Pet</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/vet-home') }}" class="nav-link">Veterinary Support</a>
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
            <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:18px;">
                <div style="width:70px;height:70px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 12px rgba(255,111,97,0.13);">
                    <span style="font-size:2.5rem;">🐾</span>
                </div>
            </div>
            <h1>Adopt a Pet</h1>
            <p>Find your perfect companion and give them a loving home</p>
        </header>

        <section class="greeting-section">
            <div class="greeting-content">
                <div class="greeting-header">
                    <div class="user-info">
                        <div class="user-avatar">
                            <img src="{{ asset('assets/user_image/pic1.png') }}" alt="User Avatar" />
                        </div>
                        <div class="greeting-text">
                            <h2>Hi, Shaf</h2>
                            <p>Ready to find your new best friend?</p>
                        </div>
                    </div>
                    <div class="stats-summary">
                        <div class="stat-item">
                            <span class="stat-number" id="totalPets">16</span>
                            <div class="stat-label">Available Pets</div>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">25</span>
                            <div class="stat-label">Happy Adoptions</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="search-filter-section">
            <div class="search-filter-container">
                <div class="search-bar">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" id="searchInput" placeholder="Search by name, breed, or type...">
                </div>

                <div class="filters-row">
                    <div class="filter-group">
                        <select class="filter-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="cats">Cats</option>
                            <option value="dogs">Dogs</option>
                            <option value="birds">Birds</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <select class="filter-select" id="ageFilter">
                            <option value="">All Ages</option>
                            <option value="young">Young (Under 1 year)</option>
                            <option value="adult">Adult (1-3 years)</option>
                            <option value="senior">Senior (3+ years)</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <select class="filter-select" id="genderFilter">
                            <option value="">All Genders</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <button class="clear-filters-btn" onclick="clearAllFilters()">
                            <i class="fas fa-times"></i> Clear Filters
                        </button>
                    </div>
                </div>

                <div class="results-info">
                    <div class="results-count" id="resultsCount">Showing 16 of 16 pets</div>
                    <div class="view-toggle">
                        <button class="view-btn active" id="gridViewBtn" onclick="toggleView('grid')">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button class="view-btn" id="listViewBtn" onclick="toggleView('list')">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="pets-section">
            <div class="pets-content">
                <div class="pets-grid grid-view" id="petsGrid">
                    <div class="pet-card" data-category="cats" data-age="adult" data-gender="female" data-name="milo" data-breed="mixed">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=160&h=160&fit=crop&auto=format" alt="Milo" />
                        </div>
                        <div class="pet-info">
                            <h3>Milo</h3>
                            <p class="pet-breed">Mixed Breed</p>
                            <p class="pet-details">Female • 1 year old • Vaccinated</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Friendly</span>
                                <span class="pet-tag">Indoor</span>
                                <span class="pet-tag">Playful</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Milo')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="cats" data-age="adult" data-gender="female" data-name="sir whiskerlot" data-breed="maine coon">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1573865526739-10659fec78a5?w=160&h=160&fit=crop&auto=format" alt="Sir Whiskerlot" />
                        </div>
                        <div class="pet-info">
                            <h3>Sir Whiskerlot</h3>
                            <p class="pet-breed">Maine Coon</p>
                            <p class="pet-details">Female • 2 years old • Spayed</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Calm</span>
                                <span class="pet-tag">Large</span>
                                <span class="pet-tag">Gentle</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Sir Whiskerlot')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="cats" data-age="senior" data-gender="female" data-name="mochi" data-breed="persian">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=160&h=160&fit=crop&auto=format" alt="Mochi" />
                        </div>
                        <div class="pet-info">
                            <h3>Mochi</h3>
                            <p class="pet-breed">Persian Cat</p>
                            <p class="pet-details">Female • 3 years old • Special needs</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Quiet</span>
                                <span class="pet-tag">Cuddly</span>
                                <span class="pet-tag">Senior</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Mochi')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="dogs" data-age="adult" data-gender="male" data-name="buddy" data-breed="golden retriever">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?w=160&h=160&fit=crop&auto=format" alt="Buddy" />
                        </div>
                        <div class="pet-info">
                            <h3>Buddy</h3>
                            <p class="pet-breed">Golden Retriever</p>
                            <p class="pet-details">Male • 2 years old • Trained</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Active</span>
                                <span class="pet-tag">Large</span>
                                <span class="pet-tag">Family-friendly</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Buddy')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="dogs" data-age="adult" data-gender="female" data-name="luna" data-breed="labrador">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=160&h=160&fit=crop&auto=format" alt="Luna" />
                        </div>
                        <div class="pet-info">
                            <h3>Luna</h3>
                            <p class="pet-breed">Labrador</p>
                            <p class="pet-details">Female • 1.5 years old • Energetic</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Playful</span>
                                <span class="pet-tag">Medium</span>
                                <span class="pet-tag">Swimming</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Luna')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="birds" data-age="young" data-gender="male" data-name="charlie" data-breed="parakeet">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1452570053594-1b985d6ea890?w=160&h=160&fit=crop&auto=format" alt="Charlie" />
                        </div>
                        <div class="pet-info">
                            <h3>Charlie</h3>
                            <p class="pet-breed">Parakeet</p>
                            <p class="pet-details">Male • 6 months old • Talkative</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Vocal</span>
                                <span class="pet-tag">Small</span>
                                <span class="pet-tag">Colorful</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Charlie')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="other" data-age="young" data-gender="female" data-name="snowball" data-breed="rabbit">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?w=160&h=160&fit=crop&auto=format" alt="Snowball" />
                        </div>
                        <div class="pet-info">
                            <h3>Snowball</h3>
                            <p class="pet-breed">Holland Lop Rabbit</p>
                            <p class="pet-details">Female • 8 months old • Litter trained</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Quiet</span>
                                <span class="pet-tag">Small</span>
                                <span class="pet-tag">Soft</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Snowball')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="dogs" data-age="young" data-gender="male" data-name="max" data-breed="beagle">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1551717743-49959800b1f6?w=160&h=160&fit=crop&auto=format" alt="Max" />
                        </div>
                        <div class="pet-info">
                            <h3>Max</h3>
                            <p class="pet-breed">Beagle</p>
                            <p class="pet-details">Male • 10 months old • House trained</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Curious</span>
                                <span class="pet-tag">Medium</span>
                                <span class="pet-tag">Good with kids</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Max')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="cats" data-age="young" data-gender="male" data-name="whiskers" data-breed="tabby">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1533738363-b7f9aef128ce?w=160&h=160&fit=crop&auto=format" alt="Whiskers" />
                        </div>
                        <div class="pet-info">
                            <h3>Whiskers</h3>
                            <p class="pet-breed">Tabby Cat</p>
                            <p class="pet-details">Male • 8 months old • Neutered</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Affectionate</span>
                                <span class="pet-tag">Indoor</span>
                                <span class="pet-tag">Quiet</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Whiskers')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="dogs" data-age="senior" data-gender="female" data-name="bella" data-breed="german shepherd">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1589941013453-ec89f33b5e95?w=160&h=160&fit=crop&auto=format" alt="Bella" />
                        </div>
                        <div class="pet-info">
                            <h3>Bella</h3>
                            <p class="pet-breed">German Shepherd</p>
                            <p class="pet-details">Female • 5 years old • Well-trained</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Loyal</span>
                                <span class="pet-tag">Large</span>
                                <span class="pet-tag">Protective</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Bella')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="birds" data-age="adult" data-gender="female" data-name="sunny" data-breed="cockatiel">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=160&h=160&fit=crop&auto=format" alt="Sunny" />
                        </div>
                        <div class="pet-info">
                            <h3>Sunny</h3>
                            <p class="pet-breed">Cockatiel</p>
                            <p class="pet-details">Female • 2 years old • Sings beautifully</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Musical</span>
                                <span class="pet-tag">Small</span>
                                <span class="pet-tag">Social</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Sunny')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="other" data-age="adult" data-gender="male" data-name="spike" data-breed="guinea pig">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1548767797-d8c844163c4c?w=160&h=160&fit=crop&auto=format" alt="Spike" />
                        </div>
                        <div class="pet-info">
                            <h3>Spike</h3>
                            <p class="pet-breed">Guinea Pig</p>
                            <p class="pet-details">Male • 1.5 years old • Very social</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Gentle</span>
                                <span class="pet-tag">Small</span>
                                <span class="pet-tag">Cuddly</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Spike')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="cats" data-age="adult" data-gender="male" data-name="shadow" data-breed="black cat">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1561948955-570b270e7c36?w=160&h=160&fit=crop&auto=format" alt="Shadow" />
                        </div>
                        <div class="pet-info">
                            <h3>Shadow</h3>
                            <p class="pet-breed">Black Cat</p>
                            <p class="pet-details">Male • 2.5 years old • Independent</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Independent</span>
                                <span class="pet-tag">Indoor/Outdoor</span>
                                <span class="pet-tag">Mysterious</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Shadow')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="dogs" data-age="young" data-gender="female" data-name="ruby" data-breed="poodle">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1616190265687-b7ebf7aa31ac?w=160&h=160&fit=crop&auto=format" alt="Ruby" />
                        </div>
                        <div class="pet-info">
                            <h3>Ruby</h3>
                            <p class="pet-breed">Toy Poodle</p>
                            <p class="pet-details">Female • 9 months old • Hypoallergenic</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Smart</span>
                                <span class="pet-tag">Small</span>
                                <span class="pet-tag">Fluffy</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Ruby')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pet-card" data-category="other" data-age="young" data-gender="male" data-name="nibbles" data-breed="hamster">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1425082661705-1834bfd09dca?w=160&h=160&fit=crop&auto=format" alt="Nibbles" />
                        </div>
                        <div class="pet-info">
                            <h3>Nibbles</h3>
                            <p class="pet-breed">Syrian Hamster</p>
                            <p class="pet-details">Male • 4 months old • Playful</p>
                            <div class="pet-tags">
                                <span class="pet-tag">Active</span>
                                <span class="pet-tag">Tiny</span>
                                <span class="pet-tag">Adorable</span>
                            </div>
                            <div class="pet-actions">
                                <button class="adopt-btn" onclick="adoptPet('Nibbles')">Adopt Me</button>
                                <button class="favorite-btn" onclick="toggleFavorite(this)">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="no-pets-message" id="noPetsMessage" style="display: none;">
                    <i class="fas fa-search"></i>
                    <h3>No pets found</h3>
                    <p>Try adjusting your search criteria or filters</p>
                </div>
            </div>
        </section>

        <section class="contact-section">
            <div class="contact-content">
                <h2>Contact Our Adoption Team</h2>
                <p class="contact-subtitle">We're here to help you find your perfect companion</p>
                <div class="contact-info">
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <h4>Visit Us</h4>
                        <p>House 15, Road 27, Block K<br>Banani, Dhaka-1213<br>Bangladesh</p>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📞</span>
                        <h4>Call Us</h4>
                        <p>+880 1777-123456<br>+880 1888-654321</p>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📧</span>
                        <h4>Email Us</h4>
                        <p>adopt@petsrology.com<br>info@petsrology.com</p>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">🕐</span>
                        <h4>Open Hours</h4>
                        <p>Mon-Sat: 9AM-7PM<br>Sunday: 10AM-5PM</p>
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
        // Search and Filter Functionality
        function initializeFilters() {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const ageFilter = document.getElementById('ageFilter');
            const genderFilter = document.getElementById('genderFilter');
            const petCards = document.querySelectorAll('.pet-card');
            const noPetsMessage = document.getElementById('noPetsMessage');
            const resultsCount = document.getElementById('resultsCount');

            function filterPets() {
                const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
                const categoryValue = categoryFilter ? categoryFilter.value : '';
                const ageValue = ageFilter ? ageFilter.value : '';
                const genderValue = genderFilter ? genderFilter.value : '';

                let visibleCount = 0;

                petCards.forEach(card => {
                    const petName = card.dataset.name ? card.dataset.name.toLowerCase() : '';
                    const petBreed = card.dataset.breed ? card.dataset.breed.toLowerCase() : '';
                    const petCategory = card.dataset.category || '';
                    const petAge = card.dataset.age || '';
                    const petGender = card.dataset.gender || '';

                    const matchesSearch = !searchTerm || petName.includes(searchTerm) || petBreed.includes(searchTerm);
                    const matchesCategory = !categoryValue || petCategory === categoryValue;
                    const matchesAge = !ageValue || petAge === ageValue;
                    const matchesGender = !genderValue || petGender === genderValue;

                    if (matchesSearch && matchesCategory && matchesAge && matchesGender) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                // Update results count
                if (resultsCount) {
                    resultsCount.textContent = `Showing ${visibleCount} of ${petCards.length} pets`;
                }

                // Show/hide no pets message
                if (noPetsMessage) {
                    if (visibleCount === 0) {
                        noPetsMessage.style.display = 'block';
                    } else {
                        noPetsMessage.style.display = 'none';
                    }
                }
            }

            // Add event listeners with safety checks
            if (searchInput) searchInput.addEventListener('input', filterPets);
            if (categoryFilter) categoryFilter.addEventListener('change', filterPets);
            if (ageFilter) ageFilter.addEventListener('change', filterPets);
            if (genderFilter) genderFilter.addEventListener('change', filterPets);
        }

        // Clear all filters function
        function clearAllFilters() {
            const searchInput = document.getElementById('searchInput');
            const categoryFilter = document.getElementById('categoryFilter');
            const ageFilter = document.getElementById('ageFilter');
            const genderFilter = document.getElementById('genderFilter');

            if (searchInput) searchInput.value = '';
            if (categoryFilter) categoryFilter.value = '';
            if (ageFilter) ageFilter.value = '';
            if (genderFilter) genderFilter.value = '';

            // Trigger filter update
            const event = new Event('change');
            if (categoryFilter) categoryFilter.dispatchEvent(event);
        }

        // View Toggle Functionality
        function toggleView(viewType) {
            const petsGrid = document.getElementById('petsGrid');
            const gridBtn = document.getElementById('gridViewBtn');
            const listBtn = document.getElementById('listViewBtn');

            if (petsGrid && gridBtn && listBtn) {
                if (viewType === 'grid') {
                    petsGrid.className = 'pets-grid grid-view';
                    gridBtn.classList.add('active');
                    listBtn.classList.remove('active');
                } else {
                    petsGrid.className = 'pets-grid list-view';
                    listBtn.classList.add('active');
                    gridBtn.classList.remove('active');
                }
            }
        }

        // Pet Card Actions
        function adoptPet(petName) {
            alert(`Thank you for your interest in adopting ${petName}! Please contact us at adopt@petsrology.com or call (555) 123-4567 to start the adoption process.`);
        }

        function toggleFavorite(button) {
            const icon = button.querySelector('i');
            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                button.style.color = '#ff6f61';
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                button.style.color = '#666';
            }
        }

        // Filter Button Actions for Category Cards
        function filterPetsByCategory(category) {
            const categoryFilter = document.getElementById('categoryFilter');
            categoryFilter.value = category;
            categoryFilter.dispatchEvent(new Event('change'));

            // Update active category card
            document.querySelectorAll('.category-card').forEach(card => card.classList.remove('active'));
            if (event && event.target) {
                event.target.closest('.category-card').classList.add('active');
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            initializeFilters();

            // Set default active view button
            const gridBtn = document.getElementById('gridViewBtn');
            if (gridBtn) gridBtn.classList.add('active');

            // Initialize stats
            const totalPetsElement = document.getElementById('totalPets');
            const petCards = document.querySelectorAll('.pet-card');
            if (totalPetsElement) {
                totalPetsElement.textContent = petCards.length;
            }

            // Initialize results count
            const resultsCount = document.getElementById('resultsCount');
            if (resultsCount) {
                resultsCount.textContent = `Showing ${petCards.length} of ${petCards.length} pets`;
            }
        });
    </script>
</body>
</html>
