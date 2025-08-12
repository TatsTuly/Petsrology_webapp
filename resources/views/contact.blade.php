@extends('layouts.app')

@section('title', 'Contact Us - PETSROLOGY')

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

        .contact-header {
            text-align: center;
            margin: 3rem auto 2rem;
            max-width: 800px;
            padding: 0 1rem;
            display: none;
        }

        .contact-header h1 {
            color: #ff6f61;
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
            font-family: 'Nunito', sans-serif;
        }

        .contact-header p {
            color: #333;
            font-size: 1.1rem;
            opacity: 0.8;
            line-height: 1.6;
            font-family: 'Nunito', sans-serif;
        }

        .contact-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .contact-form-container {
            background: #fff;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #f0f0f0;
        }

        .contact-form-container h2 {
            color: #ff6f61;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            font-family: 'Nunito', sans-serif;
        }

        .contact-sidebar {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid #f0f0f0;
        }

        .form-group {
            margin-bottom: 2rem;
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 1.2rem;
            border: 2px solid #eee;
            border-radius: 8px;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #ff6f61;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 111, 97, 0.1);
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: #999;
            font-weight: 400;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 150px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            color: white;
            padding: 1.2rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            font-weight: 600;
            font-family: 'Nunito', sans-serif;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 111, 97, 0.4);
        }

        .contact-info {
            margin-bottom: 2rem;
        }

        .contact-info h3 {
            color: #ff6f61;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-family: 'Nunito', sans-serif;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.2rem;
            padding: 0.5rem 0;
        }

        .contact-item i {
            color: #ff6f61;
            margin-right: 1rem;
            font-size: 1.2rem;
            width: 20px;
            text-align: center;
        }

        .contact-item p {
            margin: 0;
            color: #666;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
        }

        .map-container {
            margin-top: 2rem;
        }

        .map-container iframe {
            width: 100%;
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: center;
        }

        .social-links a {
            color: #ff6f61;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 111, 97, 0.1);
        }

        .social-links a:hover {
            color: white;
            background: #ff6f61;
            transform: translateY(-3px);
        }

        .alert {
            max-width: 1200px;
            margin: 1rem auto;
            padding: 1rem 2rem;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            text-align: center;
            animation: slideDown 0.3s ease-out;
        }

        .alert-success {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.2);
        }

        .alert-error {
            background: linear-gradient(135deg, #ff6f61, #ff4444);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.2);
        }

        .alert ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .alert ul li {
            margin: 0.5rem 0;
        }

        @keyframes slideDown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .success-message {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: none;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.2);
            animation: slideDown 0.3s ease-out;
        }

        .error-message {
            color: #ff6f61;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: none;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            animation: slideDown 0.3s ease-out;
        }

        /* Responsive Design */
        @media (max-width: 900px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 768px) {
            .contact-layout {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin: 1.5rem auto;
                padding: 0 1rem;
            }

            .contact-header {
                margin: 2rem auto 1.5rem;
            }

            .contact-header h1 {
                font-size: 2rem;
            }

            .contact-header p {
                font-size: 1rem;
            }

            .contact-form-container,
            .contact-sidebar {
                padding: 1.5rem;
            }

            .alert {
                margin: 1rem;
                padding: 0.875rem 1.5rem;
            }
        }

        @media (max-width: 700px) {
            .hero-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .contact-header h1 {
                font-size: 1.8rem;
            }

            .contact-form-container,
            .contact-sidebar {
                padding: 1rem;
            }

            .form-control {
                padding: 0.8rem;
            }

            .btn-submit {
                padding: 0.8rem 1.5rem;
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
                    <i class="fas fa-envelope" style="font-size: 30px; color: white;"></i>
                </div>
            </div>
            <h1 class="hero-title">Contact Us</h1>
            <p class="hero-subtitle">We'd love to hear from you! Get in touch with our team and we'll get back to you as soon as possible.</p>
        </div>
    </section>

    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Please fill out the form below and we'll get back to you as soon as possible.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <ul style="list-style: none; margin: 0; padding: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="contact-layout">
        <div class="contact-form-container">
            <h2>Send us a Message</h2>
            <div class="success-message" id="successMessage">
                Thank you for your message! We'll get back to you soon.
            </div>
            <form id="contactForm" onsubmit="return validateForm(event)">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="Full Name" required>
                    <div class="error-message" id="nameError"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                    <div class="error-message" id="emailError"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="message" rows="6" placeholder="Your Message" required></textarea>
                    <div class="error-message" id="messageError"></div>
                </div>
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>

        <div class="contact-sidebar">
            <div class="contact-info">
                <h3>Contact Information</h3>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>295/2 Dhaka, Bangladesh</p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <p>+880 1603221681</p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <p>contact@petsrology.com</p>
                </div>
                <div class="contact-item">
                    <i class="fas fa-clock"></i>
                    <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
                </div>
            </div>

            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.8987445333937!2d90.3543872!3d23.7608652!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2s!4v1234567890!5m2!1sen!2s"
                    height="250" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>

            <div class="social-links">
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function validateForm(event) {
            event.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            let isValid = true;

            // Reset error messages
            document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');

            // Validate name
            if (name.length < 2) {
                document.getElementById('nameError').textContent = 'Name must be at least 2 characters long';
                document.getElementById('nameError').style.display = 'block';
                isValid = false;
            }

            // Validate email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').textContent = 'Please enter a valid email address';
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
            }

            // Validate message
            if (message.length < 10) {
                document.getElementById('messageError').textContent = 'Message must be at least 10 characters long';
                document.getElementById('messageError').style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                // Show success message
                document.getElementById('successMessage').style.display = 'block';
                // Reset form
                document.getElementById('contactForm').reset();
                // Hide success message after 5 seconds
                setTimeout(() => {
                    document.getElementById('successMessage').style.display = 'none';
                }, 5000);
            }

            return false;
        }

        // Smooth scroll to form when clicking contact links
        document.querySelectorAll('a[href="#contactForm"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection