<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #ff6f61;
            --secondary-color: #ff9472;
            --text-color: #333;
            --background-color: #f9f9f9;
            --shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;  /* Changed from Roboto to Nunito */
            background: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Navigation Styles */
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
            font-family: 'Nunito', sans-serif;  /* Added font-family */
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

        .nav-link.active {
            background: #ff6f61;
            color: #fff;
        }

        .nav-link:hover::before {
            left: 0;
        }

        .contact-header {
            text-align: center;
            margin: 3rem auto 2rem;
            max-width: 800px;
            padding: 0 1rem;
        }

        .contact-header h1 {
            color: var(--primary-color);
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
            font-family: 'Nunito', sans-serif;
        }

        .contact-header p {
            color: var(--text-color);
            font-size: 1.1rem;
            opacity: 0.8;
            line-height: 1.6;
            font-family: 'Nunito', sans-serif;
        }

        .contact-layout {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 2rem;
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .contact-form-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }

        .contact-sidebar {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #eee;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(255, 111, 97, 0.1);
        }

        .btn-submit {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
            font-weight: 500;
            transition: transform 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
        }

        .contact-info {
            margin-bottom: 2rem;
        }

        .contact-info h3 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .contact-item i {
            color: var(--primary-color);
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .map-container {
            margin-top: 2rem;
        }

        .map-container iframe {
            width: 100%;
            border-radius: 5px;
            border: none;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .social-links a {
            color: var(--primary-color);
            font-size: 1.5rem;
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: var(--secondary-color);
        }

        .alert {
            max-width: 1200px;
            margin: 1rem auto;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            text-align: center;
            animation: slideDown 0.3s ease-out;
        }

        .alert-success {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.2);
        }

        .alert-error {
            background: linear-gradient(45deg, #ff6f61, #ff4444);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 111, 97, 0.2);
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

        /* Update existing success and error message styles */
        .success-message {
            background: linear-gradient(45deg, #4CAF50, #45a049);
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

        @media (max-width: 768px) {
            .contact-layout {
                grid-template-columns: 1fr;
            }

            .navbar-container {
                flex-direction: column;
                padding: 1rem;
            }

            .navbar-brand {
                margin-bottom: 1rem;
            }

            .navbar-nav {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            footer {
                padding: 1.5rem 0;
                margin-top: 2rem;
            }

            footer p {
                font-size: 0.9rem;
            }

            .contact-header h1 {
                font-size: 2rem;
            }

            .contact-header p {
                font-size: 1rem;
            }

            .alert {
                margin: 1rem;
                padding: 0.875rem 1.5rem;
            }
        }

        @media (max-width: 900px) {
            .navbar-nav {
                gap: 4px;
            }
            .nav-link {
                padding: 10px 16px;
                font-size: 0.9rem;
                font-family: 'Nunito', sans-serif;  /* Added font-family */
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
                font-family: 'Nunito', sans-serif;  /* Added font-family */
            }
        }

        /* Footer Styles */
        footer {
            background: #fff;
            padding: 2rem 0;
            margin-top: 2rem;
            box-shadow: 0 -2px 15px rgba(0,0,0,0.1);
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .footer-section {
            display: flex;
            flex-direction: column;
        }

        .footer-section h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .footer-links a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #eee;
        }

        .footer-bottom p {
            font-size: 0.875rem;
            color: #777;
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
                    <a href="{{ route('pet.supplies') }}" class="nav-link">Pet Supplies</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact') }}" class="nav-link active">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/welcome') }}" class="nav-link">About Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-content">
        <div class="contact-header">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Please fill out the form below.</p>
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
                        <textarea class="form-control" id="message" rows="5" placeholder="Your Message" required></textarea>
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
                </div>

                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.476468621499!2d67.0821!3d24.8607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDUxJzM4LjUiTiA2N8KwMDQnNTUuNiJF!5e0!3m2!1sen!2s!4v1234567890!5m2!1sen!2s"
                        height="250" 
                        allowfullscreen="" 
                        loading="lazy">
                    </iframe>
                </div>

                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>

        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <h3>About PETSROLOGY</h3>
                    <ul class="footer-links">
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Mission & Vision</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Our Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Pet Adoption</a></li>
                        <li><a href="#">Veterinary Care</a></li>
                        <li><a href="#">Pet Supplies</a></li>
                        <li><a href="#">Pet Training</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Connect With Us</h3>
                    <ul class="footer-links">
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
</body>
</html>