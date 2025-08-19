@extends('layouts.vet_app')

@section('title', 'Contact Us - PETSROLOGY')

@section('styles')
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            background: #f8f9fa;
        }

        /* Enhanced Header */
        .hero-section {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            text-align: center;
            padding: 80px 20px 60px;
            box-shadow: 0 4px 20px rgba(255,111,97,0.2);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
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

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .header-icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 25px;
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

        .hero-section h1 {
            font-size: 3rem;
            margin: 0 0 15px 0;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .hero-section p {
            font-size: 1.3rem;
            margin: 0;
            opacity: 0.95;
            font-weight: 500;
        }

        /* Back button for vet pages */
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

        /* Contact Content */
        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
            background: #f8f9fa;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        .contact-info {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,111,97,0.1);
        }

        .contact-form-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,111,97,0.1);
        }

        .section-title {
            color: #2c3e50;
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-align: center;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            padding: 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            border-left: 4px solid #ff6f61;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(255,111,97,0.1);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .info-content h3 {
            color: #2c3e50;
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0 0 5px 0;
        }

        .info-content p {
            color: #5a6c7d;
            margin: 0;
            font-size: 0.95rem;
        }

        /* Form Styles */
        .contact-form {
            display: grid;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        label {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        input, textarea, select {
            padding: 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #ff6f61;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .submit-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            justify-self: center;
            min-width: 200px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,111,97,0.4);
        }

        /* Success/Error Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border-left: 4px solid #28a745;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border-left: 4px solid #dc3545;
        }

        /* Location Map Section */
        .location-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,111,97,0.1);
            text-align: center;
        }

        .map-placeholder {
            background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);
            height: 300px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 1.1rem;
            margin-top: 20px;
            border: 2px dashed #dee2e6;
        }

        /* FAQ Section */
        .faq-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,111,97,0.1);
            margin-top: 40px;
        }

        .faq-item {
            border-bottom: 1px solid #e9ecef;
            padding: 20px 0;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            color: #2c3e50;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .faq-answer {
            color: #5a6c7d;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .hero-section {
                padding: 60px 20px 40px;
            }

            .hero-section h1 {
                font-size: 2.2rem;
            }

            .contact-container {
                padding: 40px 15px;
            }

            .back-btn {
                top: 15px;
                right: 15px;
                padding: 8px 15px;
                font-size: 0.85rem;
            }
        }
    </style>
@endsection

@section('content')
<div class="main-content">
    <section class="hero-section">
        <!-- Back button for vet context -->
        @if(session('user_role') === 'vet')
            <a href="{{ route('vet.dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Back to Dashboard
            </a>
        @endif
        
        <div class="hero-content">
            <div class="header-icon-container">
                <div class="header-icon">
                    <span>📞</span>
                </div>
            </div>
            <h1>Contact Us</h1>
            <p>Get in touch with our veterinary team - We're here to help your pets</p>
        </div>
    </section>

    <div class="contact-container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i>
                <ul style="margin: 10px 0 0 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="contact-grid">
            <!-- Contact Information -->
            <div class="contact-info">
                <h2 class="section-title">Get in Touch</h2>
                
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <h3>Our Location</h3>
                        <p>House 15, Road 27, Block K<br>Banani, Dhaka-1213, Bangladesh</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="info-content">
                        <h3>Call Us</h3>
                        <p>Pet Care: +880 1711-234567<br>Emergency: +880 1777-987654</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h3>Email Us</h3>
                        <p>petcare@petsrology.com.bd<br>support@petsrology.com.bd</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="info-content">
                        <h3>Working Hours</h3>
                        <p>Sun-Thu: 9:00 AM - 9:00 PM<br>Fri-Sat: 10:00 AM - 7:00 PM<br>Emergency: 24/7 Available</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-section">
                <h2 class="section-title">Send us a Message</h2>
                
                <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">First Name *</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email', session('user_email')) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <select id="subject" name="subject" required>
                            <option value="">Select a subject...</option>
                            <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="appointment" {{ old('subject') == 'appointment' ? 'selected' : '' }}>Appointment Request</option>
                            <option value="emergency" {{ old('subject') == 'emergency' ? 'selected' : '' }}>Emergency</option>
                            <option value="adoption" {{ old('subject') == 'adoption' ? 'selected' : '' }}>Pet Adoption</option>
                            <option value="vet_services" {{ old('subject') == 'vet_services' ? 'selected' : '' }}>Veterinary Services</option>
                            <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>Complaint</option>
                            <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" placeholder="Please describe your inquiry in detail..." required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        Send Message
                    </button>
                </form>
            </div>
        </div>

        <!-- Location Section -->
        <div class="location-section">
            <h2 class="section-title">Visit Our Clinic</h2>
            <p style="color: #5a6c7d; margin-bottom: 20px;">Find us at the heart of Banani, easily accessible by public transport</p>
            <div class="map-placeholder">
                <div>
                    <i class="fas fa-map" style="font-size: 2rem; margin-bottom: 10px; color: #ff6f61;"></i>
                    <p>Interactive map will be integrated here</p>
                    <p><strong>House 15, Road 27, Block K, Banani, Dhaka-1213</strong></p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2 class="section-title">Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle" style="color: #ff6f61;"></i>
                    What are your emergency contact hours?
                </div>
                <div class="faq-answer">
                    Our emergency veterinary services are available 24/7. You can reach us at +880 1777-987654 for any pet emergency.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle" style="color: #ff6f61;"></i>
                    How quickly do you respond to messages?
                </div>
                <div class="faq-answer">
                    We typically respond to all inquiries within 2-4 hours during business hours, and within 24 hours on weekends.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle" style="color: #ff6f61;"></i>
                    Can I schedule appointments through this contact form?
                </div>
                <div class="faq-answer">
                    While you can request appointments through this form, we recommend using our dedicated appointment booking system for faster scheduling.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    <i class="fas fa-question-circle" style="color: #ff6f61;"></i>
                    Do you provide consultation for pet adoption?
                </div>
                <div class="faq-answer">
                    Yes! Our veterinarians provide comprehensive consultation for new pet owners, including health checks, vaccination schedules, and care guidance.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
