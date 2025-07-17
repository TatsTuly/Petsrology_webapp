<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - PETSROLOGY</title>
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
        
        .appointment-section {
            padding: 40px 20px 60px;
            background: #f8f9fa;
        }
        
        .appointment-container {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
        }
        
        .appointment-form-section {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.12);
            border-top: 4px solid #ff6f61;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-header h2 {
            color: #ff6f61;
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .form-header p {
            color: #666;
            font-size: 1rem;
            margin: 0;
        }
        
        .appointment-form {
            display: grid;
            gap: 20px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-group label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff6f61;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
        }
        
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .form-group select {
            cursor: pointer;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
        }
        
        .appointment-info {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        
        .info-card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.08);
            border-left: 4px solid #ff6f61;
        }
        
        .info-card h3 {
            color: #ff6f61;
            font-size: 1.3rem;
            margin-bottom: 15px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .info-card ul li {
            padding: 8px 0;
            color: #666;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-card ul li i {
            color: #ff6f61;
            width: 16px;
        }
        
        .service-packages {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(255,111,97,0.08);
            border-left: 4px solid #ff6f61;
        }
        
        .service-packages h3 {
            color: #ff6f61;
            font-size: 1.3rem;
            margin-bottom: 20px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .package-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border: 2px solid transparent;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .package-item:hover {
            border-color: #ff6f61;
            background: #fff;
        }
        
        .package-item h4 {
            color: #333;
            font-size: 1.1rem;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .package-item p {
            color: #666;
            font-size: 0.9rem;
            margin: 0;
            line-height: 1.4;
        }
        
        .package-price {
            color: #ff6f61;
            font-weight: 700;
            font-size: 1rem;
            margin-top: 8px;
        }
        
        .emergency-notice {
            background: linear-gradient(135deg, #d32f2f 0%, #f44336 100%);
            color: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(211, 47, 47, 0.3);
            border: 3px solid #fff;
        }
        
        .emergency-section {
            max-width: 600px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .emergency-notice h3 {
            margin: 0 0 15px 0;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .emergency-notice p {
            margin: 0 0 20px 0;
            font-size: 1.1rem;
        }
        
        .emergency-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .emergency-btn:hover {
            background: white;
            color: #d32f2f;
            text-decoration: none;
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
            .appointment-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .appointment-form-section {
                padding: 30px 25px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
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
            .appointment-section {
                padding: 30px 15px 50px;
            }
            .appointment-form-section {
                padding: 25px 20px;
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
                    <a href="{{ url('/vet-home') }}" class="nav-link active">Veterinary Support</a>
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
    
    <div class="main-content">
        <header>
            <a href="{{ url('/vet-home') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Veterinary</a>
            <div style="display:flex;flex-direction:column;align-items:center;margin-bottom:18px;">
                <div style="width:70px;height:70px;background:rgba(255,255,255,0.2);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 12px rgba(255,111,97,0.13);">
                    <span style="font-size:2.5rem;">📅</span>
                </div>
            </div>
            <h1>Book Appointment</h1>
            <p>Schedule professional veterinary care for your beloved pet</p>
        </header>

        <section class="appointment-section">
            <div class="appointment-container">
                <div class="appointment-form-section">
                    <div class="form-header">
                        <h2>Schedule Your Visit</h2>
                        <p>Fill in the details below to book an appointment with our veterinary team</p>
                    </div>
                    
                    <form class="appointment-form" id="appointmentForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ownerName">Pet Owner Name *</label>
                                <input type="text" id="ownerName" name="ownerName" required>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number *</label>
                                <input type="tel" id="phoneNumber" name="phoneNumber" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="petName">Pet Name *</label>
                                <input type="text" id="petName" name="petName" required>
                            </div>
                            <div class="form-group">
                                <label for="petType">Pet Type *</label>
                                <select id="petType" name="petType" required>
                                    <option value="">Select Pet Type</option>
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                    <option value="bird">Bird</option>
                                    <option value="rabbit">Rabbit</option>
                                    <option value="hamster">Hamster</option>
                                    <option value="guinea-pig">Guinea Pig</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="petAge">Pet Age</label>
                                <input type="text" id="petAge" name="petAge" placeholder="e.g., 2 years">
                            </div>
                            <div class="form-group">
                                <label for="petBreed">Pet Breed</label>
                                <input type="text" id="petBreed" name="petBreed" placeholder="e.g., Golden Retriever">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="serviceType">Service Type *</label>
                                <select id="serviceType" name="serviceType" required>
                                    <option value="">Select Service</option>
                                    <option value="general-checkup">General Checkup</option>
                                    <option value="vaccination">Vaccination</option>
                                    <option value="surgery">Surgery Consultation</option>
                                    <option value="grooming">Pet Grooming</option>
                                    <option value="emergency">Emergency</option>
                                    <option value="dental">Dental Care</option>
                                    <option value="skin-treatment">Skin Treatment</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="preferredDate">Preferred Date *</label>
                                <input type="date" id="preferredDate" name="preferredDate" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="preferredTime">Preferred Time *</label>
                                <select id="preferredTime" name="preferredTime" required>
                                    <option value="">Select Time</option>
                                    <option value="09:00">9:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="11:00">11:00 AM</option>
                                    <option value="12:00">12:00 PM</option>
                                    <option value="14:00">2:00 PM</option>
                                    <option value="15:00">3:00 PM</option>
                                    <option value="16:00">4:00 PM</option>
                                    <option value="17:00">5:00 PM</option>
                                    <option value="18:00">6:00 PM</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="urgency">Urgency Level</label>
                                <select id="urgency" name="urgency">
                                    <option value="routine">Routine</option>
                                    <option value="urgent">Urgent</option>
                                    <option value="emergency">Emergency</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="symptoms">Symptoms / Reason for Visit</label>
                            <textarea id="symptoms" name="symptoms" placeholder="Please describe any symptoms or the reason for your visit..."></textarea>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="additionalNotes">Additional Notes</label>
                            <textarea id="additionalNotes" name="additionalNotes" placeholder="Any special requirements or additional information..."></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-calendar-check"></i>
                            Book Appointment
                        </button>
                    </form>
                </div>
                
                <div class="appointment-info">
                    <div class="info-card">
                        <h3><i class="fas fa-clock"></i> Appointment Guidelines</h3>
                        <ul>
                            <li><i class="fas fa-check"></i> Appointments are confirmed within 2 hours</li>
                            <li><i class="fas fa-check"></i> Please arrive 10 minutes early</li>
                            <li><i class="fas fa-check"></i> Bring your pet's medical history</li>
                            <li><i class="fas fa-check"></i> Keep your pet fasted for surgery consultations</li>
                            <li><i class="fas fa-check"></i> Cancellations must be made 24 hours in advance</li>
                        </ul>
                    </div>
                    
                    <div class="service-packages">
                        <h3><i class="fas fa-package"></i> Service Packages</h3>
                        
                        <div class="package-item">
                            <h4>Basic Health Checkup</h4>
                            <p>General examination, weight check, temperature, and basic health assessment</p>
                            <div class="package-price">৳ 1,500</div>
                        </div>
                        
                        <div class="package-item">
                            <h4>Complete Wellness Package</h4>
                            <p>Full examination, blood tests, vaccination update, and health certificate</p>
                            <div class="package-price">৳ 3,500</div>
                        </div>
                        
                        <div class="package-item">
                            <h4>Grooming & Care</h4>
                            <p>Bath, nail trimming, ear cleaning, teeth brushing, and styling</p>
                            <div class="package-price">৳ 2,000</div>
                        </div>
                        
                        <div class="package-item">
                            <h4>Emergency Consultation</h4>
                            <p>Immediate examination and treatment for urgent health issues</p>
                            <div class="package-price">৳ 2,500</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Emergency Notice - Centered in the middle of the page -->
            <div class="emergency-section">
                <div class="emergency-notice">
                    <h3><i class="fas fa-exclamation-triangle"></i> Emergency?</h3>
                    <p>For immediate medical attention, call our emergency hotline</p>
                    <a href="tel:+8801777987654" class="emergency-btn">
                        <i class="fas fa-phone"></i> +880 1777-987654
                    </a>
                </div>
            </div>
        </section>
    </div>
    
    <script>
        // Set minimum date to today
        document.getElementById('preferredDate').min = new Date().toISOString().split('T')[0];
        
        // Form submission handler
        document.getElementById('appointmentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const appointmentData = Object.fromEntries(formData);
            
            // Validate required fields
            const requiredFields = ['ownerName', 'phoneNumber', 'petName', 'petType', 'serviceType', 'preferredDate', 'preferredTime'];
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!appointmentData[field]) {
                    isValid = false;
                    document.getElementById(field).style.borderColor = '#dc3545';
                } else {
                    document.getElementById(field).style.borderColor = '#e9ecef';
                }
            });
            
            if (isValid) {
                // Show success message
                alert(`Appointment booked successfully!
                
Pet Owner: ${appointmentData.ownerName}
Pet Name: ${appointmentData.petName}
Service: ${appointmentData.serviceType}
Date: ${appointmentData.preferredDate}
Time: ${appointmentData.preferredTime}

We will call you at ${appointmentData.phoneNumber} within 2 hours to confirm your appointment.

Thank you for choosing PETSROLOGY!`);
                
                // Reset form
                this.reset();
            } else {
                alert('Please fill in all required fields marked with *');
            }
        });
        
        // Add real-time validation
        document.querySelectorAll('input[required], select[required]').forEach(field => {
            field.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.style.borderColor = '#dc3545';
                } else {
                    this.style.borderColor = '#28a745';
                }
            });
        });
        
        // Phone number formatting
        document.getElementById('phoneNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.startsWith('880')) {
                    value = '+' + value;
                } else if (!value.startsWith('+880') && value.length === 11) {
                    value = '+880' + value.substring(1);
                }
            }
            e.target.value = value;
        });
    </script>
    
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
</body>
</html>
