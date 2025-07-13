<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Pet - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
        .greeting-section {
            padding: 30px 20px 20px;
            background: #fff;
        }
        .greeting-content {
            max-width: 800px;
            margin: 0 auto;
        }
        .greeting-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            overflow: hidden;
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
            font-size: 1.1rem;
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
            padding: 0 20px 40px;
            background: #fff;
        }
        .pets-content {
            max-width: 800px;
            margin: 0 auto;
        }
        .pets-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .pet-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: box-shadow 0.25s, transform 0.25s, border 0.25s;
            border: 2px solid transparent;
            cursor: pointer;
        }
        .pet-card:hover {
            box-shadow: 0 8px 32px rgba(255,111,97,0.18), 0 3px 12px rgba(0,0,0,0.08);
            border: 2px solid #ff6f61;
            transform: translateY(-3px) scale(1.01);
        }
        .pet-image {
            width: 80px;
            height: 80px;
            border-radius: 15px;
            object-fit: cover;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            overflow: hidden;
        }
        .pet-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }
        .pet-info {
            flex: 1;
        }
        .pet-info h3 {
            margin: 0 0 5px 0;
            font-size: 1.3rem;
            color: #333;
            font-weight: 700;
        }
        .pet-breed {
            color: #666;
            margin: 0 0 5px 0;
            font-size: 1rem;
        }
        .pet-details {
            color: #888;
            font-size: 0.9rem;
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
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
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
            <a href="{{ url('/welcome') }}" class="back-btn">← Back to Home</a>
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
                    <div class="user-avatar">
                        <img src="{{ asset('assets/user_image/pic1.png') }}" alt="User Avatar" />
                    </div>
                    <div class="greeting-text">
                        <h2>Hi, Shaf</h2>
                    </div>
                </div>
                <h3 style="margin: 0; font-size: 1.5rem; color: #333; font-weight: 700;">Adopt your pet's here!</h3>
            </div>
        </section>

        <section class="categories">
            <div class="categories-content">
                <div class="categories-grid">
                    <div class="category-card active" onclick="filterPets('cats')">
                        <div class="category-icon">🐱</div>
                        <h4>Cats</h4>
                    </div>
                    <div class="category-card" onclick="filterPets('dogs')">
                        <div class="category-icon">🐶</div>
                        <h4>Dogs</h4>
                    </div>
                    <div class="category-card" onclick="filterPets('birds')">
                        <div class="category-icon">🐦</div>
                        <h4>Birds</h4>
                    </div>
                    <div class="category-card" onclick="filterPets('other')">
                        <div class="category-icon">🐰</div>
                        <h4>Other</h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="pets-section">
            <div class="pets-content">
                <div class="pets-grid" id="petsGrid">
                    <div class="pet-card" data-category="cats">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=160&h=160&fit=crop&auto=format" alt="Milo" />
                        </div>
                        <div class="pet-info">
                            <h3>Milo</h3>
                            <p class="pet-breed">Mixed</p>
                            <p class="pet-details">Female, 1 year old</p>
                        </div>
                    </div>
                    <div class="pet-card" data-category="cats">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1573865526739-10659fec78a5?w=160&h=160&fit=crop&auto=format" alt="Sir Whiskerlot" />
                        </div>
                        <div class="pet-info">
                            <h3>Sir Whiskerlot</h3>
                            <p class="pet-breed">Maine Coon</p>
                            <p class="pet-details">Female, 2 year old</p>
                        </div>
                    </div>
                    <div class="pet-card" data-category="cats">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=160&h=160&fit=crop&auto=format" alt="Mochi" />
                        </div>
                        <div class="pet-info">
                            <h3>Mochi</h3>
                            <p class="pet-breed">Persian cat</p>
                            <p class="pet-details">Female, 3 years year old</p>
                        </div>
                    </div>
                    <div class="pet-card" data-category="dogs" style="display: none;">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1552053831-71594a27632d?w=160&h=160&fit=crop&auto=format" alt="Buddy" />
                        </div>
                        <div class="pet-info">
                            <h3>Buddy</h3>
                            <p class="pet-breed">Golden Retriever</p>
                            <p class="pet-details">Male, 2 years old</p>
                        </div>
                    </div>
                    <div class="pet-card" data-category="dogs" style="display: none;">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=160&h=160&fit=crop&auto=format" alt="Luna" />
                        </div>
                        <div class="pet-info">
                            <h3>Luna</h3>
                            <p class="pet-breed">Labrador</p>
                            <p class="pet-details">Female, 1.5 years old</p>
                        </div>
                    </div>
                    <div class="pet-card" data-category="birds" style="display: none;">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1452570053594-1b985d6ea890?w=160&h=160&fit=crop&auto=format" alt="Charlie" />
                        </div>
                        <div class="pet-info">
                            <h3>Charlie</h3>
                            <p class="pet-breed">Parakeet</p>
                            <p class="pet-details">Male, 6 months old</p>
                        </div>
                    </div>
                    <div class="pet-card" data-category="other" style="display: none;">
                        <div class="pet-image">
                            <img src="https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?w=160&h=160&fit=crop&auto=format" alt="Snowball" />
                        </div>
                        <div class="pet-info">
                            <h3>Snowball</h3>
                            <p class="pet-breed">Holland Lop Rabbit</p>
                            <p class="pet-details">Female, 8 months old</p>
                        </div>
                    </div>
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
            <p>&copy; 2025 PETSROLOGY. All rights reserved.</p>
        </footer>
    </div>
    <script>
        function filterPets(category) {
    
            document.querySelectorAll('.category-card').forEach(card => {
                card.classList.remove('active');
            });
            
            event.target.closest('.category-card').classList.add('active');
            
            document.querySelectorAll('.pet-card').forEach(pet => {
                if (pet.dataset.category === category) {
                    pet.style.display = 'flex';
                } else {
                    pet.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
