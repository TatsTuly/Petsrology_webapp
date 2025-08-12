@extends('layouts.app')

@section('title', 'Book Appointment - PETSROLOGY')

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

        /* Appointment Section */
        .appointment-section {
            margin-bottom: 40px;
        }

        .appointment-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            overflow: hidden;
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
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .page-container {
                max-width: 1000px;
                padding: 30px 20px;
            }
            
            .appointment-container {
                max-width: 1000px;
                gap: 30px;
            }
        }
        
        @media (max-width: 900px) {
            .page-container {
                padding: 30px 15px;
            }
            
            .appointment-container {
                grid-template-columns: 1fr;
                gap: 30px;
                max-width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .header {
                padding: 40px 20px 30px;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 6px 12px;
                font-size: 0.8rem;
            }

            .appointment-form-section {
                padding: 30px 25px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }

        @media (max-width: 600px) {
            .page-container {
                padding: 20px 10px;
            }
            
            .appointment-form-section {
                padding: 25px 20px;
            }
        }

    </style>
@endsection

@section('content')
    <div class="header">
        <a href="{{ url('/vet-home') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Back to Veterinary
        </a>
        <div class="header-icon-container">
            <div class="header-icon">
                <span>📅</span>
            </div>
        </div>
        <h1>Book Appointment</h1>
        <p>Schedule your pet's visit with our expert veterinary team</p>
    </div>

    <div class="page-container">
        <!-- Appointment Section -->
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
@endsection

@section('scripts')
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
@endsection
