@extends('layouts.app')

@section('title', 'PETSROLOGY - Your Pet\'s Best Friend')

@section('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            background: #f8f9fa;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 80px 20px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: float 20s linear infinite;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) rotate(0deg); }
            100% { transform: translate(-40px, -40px) rotate(360deg); }
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            letter-spacing: 2px;
        }
        
        .hero-subtitle {
            font-size: 1.4rem;
            margin-bottom: 40px;
            opacity: 0.95;
            font-weight: 400;
            line-height: 1.6;
        }
        
        .stats-section {
            background: white;
            padding: 60px 20px;
            margin: -30px 20px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            position: relative;
            z-index: 3;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: #ff6f61;
            margin-bottom: 10px;
            display: block;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #666;
            font-weight: 600;
        }
        
        .welcome-section {
            background: #fff;
            padding: 60px 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .welcome-section h2 {
            font-size: 2.8rem;
            color: #ff6f61;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .welcome-section p {
            font-size: 1.3rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }
        
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .cta-btn {
            background: #ff6f61;
            color: white;
            padding: 15px 35px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            border: none;
            cursor: pointer;
        }
        
        .cta-btn:hover {
            background: #e65c50;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }
        
        .cta-btn.secondary {
            background: transparent;
            color: #ff6f61;
            border: 2px solid #ff6f61;
            box-shadow: none;
        }
        
        .cta-btn.secondary:hover {
            background: #ff6f61;
            color: white;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin: 0 20px 60px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .feature {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
        }
        
        .feature::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff6f61, #ff9472);
            transition: left 0.5s ease;
        }
        
        .feature:hover::before {
            left: 0;
        }
        
        .feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(255,111,97,0.15);
            border-color: #ff6f61;
        }
        
        .feature img {
            width: 60px;
            height: 60px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
        }
        
        .feature:hover img {
            transform: scale(1.1) rotate(5deg);
        }
        
        .feature h3 {
            margin: 0 0 15px 0;
            font-size: 1.6rem;
            color: #ff6f61;
            font-weight: 700;
        }
        
        .feature p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.6;
        }
        
        .feature-btn {
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            position: relative;
            overflow: hidden;
        }
        
        .feature-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.4);
            color: white;
            text-decoration: none;
        }
        
        .feature-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e65c50, #ff6f61);
            transition: left 0.3s ease;
            z-index: -1;
        }
        
        .feature-btn:hover::before {
            left: 0;
        }
        .fade-in-title {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s 0.3s forwards;
        }
        .fade-in-subtitle {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s 0.6s forwards;
        }
        .stat-item {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        .stat-item:nth-child(1) { animation-delay: 0.9s; }
        .stat-item:nth-child(2) { animation-delay: 1.1s; }
        .stat-item:nth-child(3) { animation-delay: 1.3s; }
        .stat-item:nth-child(4) { animation-delay: 1.5s; }
        .feature {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }
        .feature:nth-child(1) { animation-delay: 1.7s; }
        .feature:nth-child(2) { animation-delay: 1.9s; }
        .feature:nth-child(3) { animation-delay: 2.1s; }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 1150px) {
            .nav-link, .logout-btn {
                padding: 12px 14px;
                font-size: 0.9rem;
            }
            .navbar-container {
                padding: 0 15px;
            }
        }
        @media (max-width: 900px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.2rem;
            }
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            .features {
                grid-template-columns: 1fr;
                margin: 0 20px 40px;
            }
            .navbar-nav {
                gap: 4px;
            }
            .nav-link, .logout-btn {
                padding: 10px 12px;
                font-size: 0.85rem;
            }
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
        @media (max-width: 700px) {
            .hero-title {
                font-size: 2rem;
            }
            .stats-container {
                grid-template-columns: 1fr;
            }
            .stats-section {
                margin: -20px 10px 30px;
                padding: 40px 20px;
            }
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
            .nav-link, .logout-btn {
                padding: 8px 10px;
                font-size: 0.8rem;
            }
            .feature {
                margin: 0;
            }
        }

        /* Floating Chatbot Button Styles */
        .chatbot-container {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1000;
        }

        .chatbot-button {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(255, 111, 97, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .chatbot-button:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(255, 111, 97, 0.4);
        }

        .chatbot-button i {
            font-size: 24px;
            color: white;
            transition: transform 0.3s ease;
        }

        .chatbot-button:hover i {
            transform: scale(1.1);
        }

        .chatbot-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.6s ease;
        }

        .chatbot-button:hover::before {
            width: 100%;
            height: 100%;
        }

        .chat-popup {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 280px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px) scale(0.9);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .chat-popup.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .chat-header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .chat-avatar {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .chat-info h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
        }

        .chat-info p {
            margin: 2px 0 0 0;
            font-size: 12px;
            opacity: 0.9;
        }

        .chat-body {
            padding: 20px;
            text-align: center;
        }

        .chat-message {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 14px;
            color: #333;
            line-height: 1.5;
        }

        .chat-button {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 14px;
        }

        .chat-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.3);
        }

        .chat-iframe-container {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 420px;
            height: 550px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px) scale(0.9);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            border: 3px solid transparent;
            background-clip: padding-box;
            backdrop-filter: blur(10px);
        }

        .chat-iframe-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #ff6f61, #ff9472, #ffb347);
            border-radius: 20px;
            z-index: -1;
            margin: -3px;
        }

        .chat-iframe-container.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .iframe-header {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 50%, #ffb347 100%);
            color: white;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 16px;
            font-weight: 700;
            position: relative;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .iframe-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.3) 1px, transparent 1px);
            background-size: 20px 20px;
            animation: headerFloat 15s linear infinite;
        }

        @keyframes headerFloat {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-20px, -20px); }
        }

        .iframe-header-content {
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 2;
            position: relative;
        }

        .iframe-avatar {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            animation: avatarPulse 3s ease-in-out infinite;
        }

        @keyframes avatarPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .iframe-title {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .iframe-title h4 {
            margin: 0;
            font-size: 16px;
            font-weight: 700;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .iframe-title p {
            margin: 0;
            font-size: 12px;
            opacity: 0.9;
            font-weight: 500;
        }

        .iframe-close {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            font-size: 16px;
            cursor: pointer;
            opacity: 0.9;
            transition: all 0.3s ease;
            padding: 8px;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            z-index: 2;
            position: relative;
        }

        .iframe-close:hover {
            opacity: 1;
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1);
        }

        .chatbot-iframe {
            width: 100%;
            height: calc(100% - 68px);
            border: none;
            background: white;
            border-radius: 0 0 17px 17px;
        }

        /* Enhanced loading animation */
        .iframe-loading {
            position: absolute;
            top: 68px;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10;
            border-radius: 0 0 17px 17px;
        }

        .loading-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid #e9ecef;
            border-top: 3px solid #ff6f61;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .loading-text {
            color: #666;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
        }

        /* Enhance mobile design */

        .close-chat {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .close-chat:hover {
            opacity: 1;
        }

        /* Pulse animation for attention */
        @keyframes pulse {
            0% {
                box-shadow: 0 4px 20px rgba(255, 111, 97, 0.3);
            }
            50% {
                box-shadow: 0 4px 20px rgba(255, 111, 97, 0.6);
            }
            100% {
                box-shadow: 0 4px 20px rgba(255, 111, 97, 0.3);
            }
        }

        .chatbot-button.pulse {
            animation: pulse 2s infinite;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .chatbot-container {
                bottom: 20px;
                right: 20px;
            }
            
            .chatbot-button {
                width: 55px;
                height: 55px;
            }
            
            .chatbot-button i {
                font-size: 22px;
            }
            
            .chat-popup {
                width: 260px;
                bottom: 75px;
            }

            .chat-iframe-container {
                width: calc(100vw - 30px);
                height: 450px;
                right: -15px;
                bottom: 75px;
                border-radius: 18px;
            }

            .iframe-header {
                padding: 15px 18px;
                font-size: 15px;
            }

            .iframe-avatar {
                width: 32px;
                height: 32px;
                font-size: 16px;
            }

            .iframe-title h4 {
                font-size: 15px;
            }

            .iframe-close {
                width: 28px;
                height: 28px;
                font-size: 14px;
            }

            .chatbot-iframe {
                height: calc(100% - 64px);
                border-radius: 0 0 15px 15px;
            }

            .iframe-loading {
                top: 64px;
                border-radius: 0 0 15px 15px;
            }
        }
    </style>
@endsection

@section('content')
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-content">
                <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:30px;">
                    <div style="width:80px;height:80px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.3);">
                        <svg width="50" height="50" viewBox="0 0 44 44" fill="none">
                            <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                            <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                            <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                            <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                            <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        </svg>
                    </div>
                </div>
                <h1 class="hero-title fade-in-title">Welcome to PETSROLOGY</h1>
                <p class="hero-subtitle fade-in-subtitle">Your comprehensive platform for pet care, adoption, and supplies. Connecting pet lovers with everything they need for their furry friends.</p>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="stats-section">
            <div class="stats-container">
                <div class="stat-item">
                    <span class="stat-number" data-target="{{ $petsAdopted }}">0</span>
                    <span class="stat-label">Pets Adopted</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="{{ $verifiedVets }}">0</span>
                    <span class="stat-label">Verified Vets</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-target="{{ $totalCustomers }}">0</span>
                    <span class="stat-label">Happy Customers</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number" data-special="24/7">24/7</span>
                    <span class="stat-label">Support Available</span>
                </div>
            </div>
        </section>

        <!-- Welcome Section -->
        <section class="welcome-section">
            <h2>Everything Your Pet Needs, All in One Place</h2>
            <p>From finding your perfect companion to ensuring their health and happiness, PETSROLOGY is your trusted partner in pet care.</p>
            <div class="cta-buttons">
                <a href="{{ url('/adopt-home') }}" class="cta-btn">Start Adopting</a>
                <a href="{{ route('contact') }}" class="cta-btn secondary">Get in Touch</a>
            </div>
        </section>

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

<!-- Floating Chatbot -->
<div class="chatbot-container">
    <button class="chatbot-button pulse" id="chatbotBtn">
        <i class="fas fa-comments"></i>
    </button>
    
    <div class="chat-popup" id="chatPopup">
        <button class="close-chat" id="closeChat">
            <i class="fas fa-times"></i>
        </button>
        
        <div class="chat-header">
            <div class="chat-avatar">
                <i class="fas fa-robot"></i>
            </div>
            <div class="chat-info">
                <h4>Petsrology Assistant</h4>
                <p>Online now</p>
            </div>
        </div>
        
        <div class="chat-body">
            <div class="chat-message">
                Hi! I am Petsrology Assistant. 🐾<br>
                How can I help you today with your pet care needs?
            </div>
            <button class="chat-button" id="startChatBtn">
                <i class="fas fa-paper-plane"></i>
                Start Chatting
            </button>
        </div>
    </div>
    
    <!-- Chatbot iframe container -->
    <div class="chat-iframe-container" id="chatIframe">
        <div class="iframe-header">
            <div class="iframe-header-content">
                <div class="iframe-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="iframe-title">
                    <h4>Petsrology Assistant</h4>
                    <p>AI-Powered Pet Care Support</p>
                </div>
            </div>
            <button class="iframe-close" id="closeIframe">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="iframe-loading" id="iframeLoading">
            <div class="loading-spinner"></div>
            <div class="loading-text">Connecting to Petsrology Assistant...</div>
        </div>
        <iframe class="chatbot-iframe" id="chatbotFrame" src="" style="display: none;"></iframe>
    </div>
</div>

<script>
// Counter Animation for Welcome Page
function animateCounters() {
    const counters = document.querySelectorAll('.stat-number[data-target]');
    const specialCounters = document.querySelectorAll('.stat-number[data-special]');
    
    // Handle regular counters with dynamic data
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            // Format numbers appropriately
            if (target >= 1000) {
                const displayValue = Math.floor(current / 100) / 10;
                counter.textContent = displayValue.toFixed(1) + 'K+';
            } else if (target >= 100) {
                counter.textContent = Math.floor(current) + '+';
            } else if (target > 0) {
                counter.textContent = Math.floor(current) + '+';
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 16);
    });
    
    // Handle special counters (like 24/7)
    specialCounters.forEach(counter => {
        const specialValue = counter.getAttribute('data-special');
        // Add a subtle animation effect
        counter.style.transform = 'scale(1.1)';
        counter.style.transition = 'transform 0.3s ease';
        setTimeout(() => {
            counter.style.transform = 'scale(1)';
        }, 300);
    });
}

// Trigger animation when stats section comes into view
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            setTimeout(animateCounters, 800); // Delay to sync with CSS animation
            observer.unobserve(entry.target);
        }
    });
}, {
    threshold: 0.5
});

// Start observing when page loads
document.addEventListener('DOMContentLoaded', function() {
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }
});

// Chatbot functionality
document.addEventListener('DOMContentLoaded', function() {
    const chatbotBtn = document.getElementById('chatbotBtn');
    const chatPopup = document.getElementById('chatPopup');
    const closeChat = document.getElementById('closeChat');
    const startChatBtn = document.getElementById('startChatBtn');
    const chatIframe = document.getElementById('chatIframe');
    const closeIframe = document.getElementById('closeIframe');
    const chatbotFrame = document.getElementById('chatbotFrame');
    
    // Toggle chat popup
    chatbotBtn.addEventListener('click', function() {
        chatPopup.classList.toggle('show');
        // Remove pulse animation when clicked
        chatbotBtn.classList.remove('pulse');
        // Hide iframe if open
        chatIframe.classList.remove('show');
    });
    
    // Close chat popup
    closeChat.addEventListener('click', function() {
        chatPopup.classList.remove('show');
    });
    
    // Start chat - show iframe with chatbot
    startChatBtn.addEventListener('click', function() {
        const chatbotUrl = 'http://localhost:3000/chatbot';
        const iframeLoading = document.getElementById('iframeLoading');
        
        // Show iframe container and loading animation
        chatPopup.classList.remove('show');
        chatIframe.classList.add('show');
        iframeLoading.style.display = 'flex';
        chatbotFrame.style.display = 'none';
        
        // Load the chatbot
        chatbotFrame.src = chatbotUrl;
        
        // Hide loading and show iframe after a delay (simulating load time)
        setTimeout(() => {
            iframeLoading.style.display = 'none';
            chatbotFrame.style.display = 'block';
        }, 2000);
        
        // Also handle actual iframe load event
        chatbotFrame.onload = function() {
            setTimeout(() => {
                iframeLoading.style.display = 'none';
                chatbotFrame.style.display = 'block';
            }, 500);
        };
    });
    
    // Close iframe
    closeIframe.addEventListener('click', function() {
        chatIframe.classList.remove('show');
        // Reset iframe after animation completes
        setTimeout(() => {
            chatbotFrame.src = '';
            chatbotFrame.style.display = 'none';
            document.getElementById('iframeLoading').style.display = 'flex';
        }, 400);
    });
    
    // Close popup and iframe when clicking outside
    document.addEventListener('click', function(event) {
        if (!chatbotBtn.contains(event.target) && 
            !chatPopup.contains(event.target) && 
            !chatIframe.contains(event.target)) {
            chatPopup.classList.remove('show');
            chatIframe.classList.remove('show');
        }
    });
    
    // Add pulse animation after page loads (for attention)
    setTimeout(() => {
        chatbotBtn.classList.add('pulse');
    }, 3000);
});
</script>
@endsection
