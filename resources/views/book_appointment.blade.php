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
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
            width: 100%;
        }

        /* Main Appointment Container */
        .appointment-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin: -40px auto 0;
            position: relative;
            z-index: 2;
        }

        /* Form Section */
        .appointment-form-section {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(255,111,97,0.12), 0 8px 25px rgba(0,0,0,0.05);
            border-top: 4px solid #ff6f61;
            position: relative;
            overflow: hidden;
        }

        .appointment-form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #ff6f61 0%, #ff9472 100%);
        }

        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }

        .form-header h2 {
            color: #2c3e50;
            font-size: 2.2rem;
            margin-bottom: 12px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .form-header p {
            color: #5a6c7d;
            font-size: 1.1rem;
            margin: 0;
            font-weight: 500;
        }
        
        .appointment-form {
            display: grid;
            gap: 25px;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            position: relative;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        .form-group label {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group label .required {
            color: #ff6f61;
            font-size: 1.2rem;
        }

        .form-group label i {
            color: #ff6f61;
            font-size: 1rem;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 15px 18px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            font-family: 'Nunito', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
            font-weight: 500;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff6f61;
            box-shadow: 0 0 0 4px rgba(255,111,97,0.1);
            transform: translateY(-2px);
        }

        .form-group input:valid,
        .form-group select:valid {
            border-color: #28a745;
        }
        
        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .form-group select {
            cursor: pointer;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid #ff6f61;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 18px 35px;
            border-radius: 30px;
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #e65c50 0%, #ff6f61 100%);
            transition: left 0.4s ease;
            z-index: -1;
        }

        .submit-btn:hover::before {
            left: 0;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(255,111,97,0.4);
        }

        .submit-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }
        
        /* Info Section */
        .appointment-info {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }
        
        .info-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(255,111,97,0.08);
            border-left: 5px solid #ff6f61;
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(255,111,97,0.12);
        }
        
        .info-card h3 {
            color: #2c3e50;
            font-size: 1.4rem;
            margin-bottom: 20px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .info-card h3 i {
            color: #ff6f61;
            font-size: 1.3rem;
        }
        
        .info-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .info-card ul li {
            padding: 12px 0;
            color: #5a6c7d;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .info-card ul li:hover {
            color: #2c3e50;
            padding-left: 10px;
        }
        
        .info-card ul li i {
            color: #ff6f61;
            width: 18px;
            font-size: 1rem;
        }

        /* Success/Error Messages */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            display: none;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert.success {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .alert.error {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        /* Estimated Cost Display */
        .cost-estimate {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border: 2px solid #ffc107;
            border-radius: 15px;
            padding: 20px;
            margin-top: 15px;
            display: none;
        }

        .cost-estimate h4 {
            color: #856404;
            font-size: 1.2rem;
            margin-bottom: 10px;
            font-weight: 800;
        }

        .cost-estimate .price {
            color: #856404;
            font-weight: 800;
            font-size: 1.5rem;
        }
        
        /* Emergency Notice */
        .emergency-notice {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            color: white;
            border-radius: 18px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 8px 30px rgba(220, 53, 69, 0.3);
            border: 3px solid #fff;
            margin-top: 25px;
        }
        
        .emergency-notice h3 {
            margin: 0 0 15px 0;
            font-size: 1.4rem;
            font-weight: 800;
        }
        
        .emergency-notice p {
            margin: 0 0 20px 0;
            font-size: 1rem;
            opacity: 0.95;
        }
        
        .emergency-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: 2px solid white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            backdrop-filter: blur(10px);
        }
        
        .emergency-btn:hover {
            background: white;
            color: #dc3545;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .page-container {
                max-width: 1000px;
                padding: 30px 20px;
            }
            
            .appointment-container {
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
            }
        }
        
        @media (max-width: 768px) {
            .header {
                padding: 60px 20px 40px;
            }
            
            .header h1 {
                font-size: 2.2rem;
            }
            
            .back-btn {
                top: 15px;
                right: 15px;
                padding: 8px 15px;
                font-size: 0.85rem;
            }

            .appointment-form-section {
                padding: 30px 25px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .form-header h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 600px) {
            .page-container {
                padding: 20px 10px;
            }
            
            .appointment-form-section {
                padding: 25px 20px;
            }

            .info-card {
                padding: 20px;
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
        <div class="appointment-container">
            <!-- Form Section -->
            <div class="appointment-form-section">
                <div class="form-header">
                    <h2><i class="fas fa-calendar-plus"></i> Schedule Your Visit</h2>
                    <p>Fill in the details below to book an appointment with our veterinary team</p>
                </div>

                <!-- Alert Messages -->
                <div id="alert-container"></div>
                
                <form class="appointment-form" id="appointmentForm">
                    @csrf
                    <!-- Owner Information -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="ownerName">
                                <i class="fas fa-user"></i>
                                Pet Owner Name <span class="required">*</span>
                            </label>
                            <input type="text" id="ownerName" name="owner_name" value="{{ $user ? $user->name : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="ownerPhone">
                                <i class="fas fa-phone"></i>
                                Phone Number <span class="required">*</span>
                            </label>
                            <input type="tel" id="ownerPhone" name="owner_phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="ownerEmail">
                            <i class="fas fa-envelope"></i>
                            Email Address
                        </label>
                        <input type="email" id="ownerEmail" name="owner_email" value="{{ $user ? $user->email : '' }}">
                    </div>
                    
                    <!-- Pet Information -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="petName">
                                <i class="fas fa-paw"></i>
                                Pet Name <span class="required">*</span>
                            </label>
                            <input type="text" id="petName" name="pet_name" required>
                        </div>
                        <div class="form-group">
                            <label for="petType">
                                <i class="fas fa-dog"></i>
                                Pet Type <span class="required">*</span>
                            </label>
                            <select id="petType" name="pet_type" required>
                                <option value="">Select Pet Type</option>
                                <option value="dog">🐕 Dog</option>
                                <option value="cat">🐱 Cat</option>
                                <option value="bird">🦜 Bird</option>
                                <option value="rabbit">🐰 Rabbit</option>
                                <option value="hamster">🐹 Hamster</option>
                                <option value="guinea-pig">🐹 Guinea Pig</option>
                                <option value="fish">🐠 Fish</option>
                                <option value="turtle">🐢 Turtle</option>
                                <option value="other">🐾 Other</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="petAge">
                                <i class="fas fa-birthday-cake"></i>
                                Pet Age
                            </label>
                            <input type="text" id="petAge" name="pet_age" placeholder="e.g., 2 years 3 months">
                        </div>
                        <div class="form-group">
                            <label for="petBreed">
                                <i class="fas fa-dna"></i>
                                Pet Breed
                            </label>
                            <input type="text" id="petBreed" name="pet_breed" placeholder="e.g., Golden Retriever">
                        </div>
                    </div>

                    <!-- Service and Vet Selection -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="serviceType">
                                <i class="fas fa-medical-kit"></i>
                                Service Type <span class="required">*</span>
                            </label>
                            <select id="serviceType" name="service_type" required>
                                <option value="">Select Service</option>
                                <option value="general-checkup">🩺 General Checkup</option>
                                <option value="vaccination">💉 Vaccination</option>
                                <option value="surgery">🏥 Surgery Consultation</option>
                                <option value="grooming">✂️ Pet Grooming</option>
                                <option value="emergency">🚨 Emergency</option>
                                <option value="dental">🦷 Dental Care</option>
                                <option value="skin-treatment">🧴 Skin Treatment</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vetId">
                                <i class="fas fa-user-md"></i>
                                Preferred Veterinarian
                            </label>
                            <select id="vetId" name="vet_id">
                                <option value="">Any Available Vet</option>
                                @foreach($vets as $vet)
                                    <option value="{{ $vet->id }}" data-role="{{ $vet->role }}">
                                        Dr. {{ $vet->name }} - {{ $vet->role == 'general_checkup' ? 'General Practice' : ($vet->role == 'surgery' ? 'Surgical Specialist' : 'General & Surgical') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <!-- Date and Time -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="preferredDate">
                                <i class="fas fa-calendar"></i>
                                Preferred Date <span class="required">*</span>
                            </label>
                            <input type="date" id="preferredDate" name="preferred_date" required>
                        </div>
                        <div class="form-group">
                            <label for="preferredTime">
                                <i class="fas fa-clock"></i>
                                Preferred Time <span class="required">*</span>
                                <div class="loading-spinner" id="timeSlotLoader"></div>
                            </label>
                            <select id="preferredTime" name="preferred_time" required>
                                <option value="">Select Date First</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="urgencyLevel">
                            <i class="fas fa-exclamation-triangle"></i>
                            Urgency Level
                        </label>
                        <select id="urgencyLevel" name="urgency_level">
                            <option value="routine">🟢 Routine Visit</option>
                            <option value="urgent">🟡 Urgent Care</option>
                            <option value="emergency">🔴 Emergency</option>
                        </select>
                    </div>
                    
                    <!-- Medical Information -->
                    <div class="form-group full-width">
                        <label for="symptoms">
                            <i class="fas fa-notes-medical"></i>
                            Symptoms / Reason for Visit
                        </label>
                        <textarea id="symptoms" name="symptoms" placeholder="Please describe any symptoms, concerns, or the specific reason for your visit. This helps our veterinarians prepare for your appointment."></textarea>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="additionalNotes">
                            <i class="fas fa-comment"></i>
                            Additional Notes
                        </label>
                        <textarea id="additionalNotes" name="additional_notes" placeholder="Any special requirements, behavioral notes, or additional information that might be helpful for the visit."></textarea>
                    </div>

                    <!-- Cost Estimate -->
                    <div class="cost-estimate" id="costEstimate">
                        <h4><i class="fas fa-calculator"></i> Estimated Cost</h4>
                        <div class="price" id="estimatedPrice">৳ 0</div>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="submitBtn">
                        <i class="fas fa-calendar-check"></i>
                        <span>Book Appointment</span>
                        <div class="loading-spinner" id="submitLoader" style="display: none;"></div>
                    </button>
                </form>
            </div>
            
            <!-- Info Section -->
            <div class="appointment-info">
                <div class="info-card">
                    <h3><i class="fas fa-info-circle"></i> Appointment Guidelines</h3>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Appointments are confirmed within 2 hours</li>
                        <li><i class="fas fa-clock"></i> Please arrive 10 minutes early</li>
                        <li><i class="fas fa-file-medical"></i> Bring your pet's medical history</li>
                        <li><i class="fas fa-utensils"></i> Keep your pet fasted for surgery consultations</li>
                        <li><i class="fas fa-times-circle"></i> Cancellations must be made 24 hours in advance</li>
                        <li><i class="fas fa-phone"></i> We'll call to confirm your appointment</li>
                    </ul>
                </div>

                <div class="info-card">
                    <h3><i class="fas fa-user-md"></i> Our Veterinarians</h3>
                    <ul>
                        @foreach($vets->take(3) as $vet)
                            <li>
                                <i class="fas fa-stethoscope"></i>
                                Dr. {{ $vet->name }} - {{ $vet->experience }} years experience
                            </li>
                        @endforeach
                        @if($vets->count() > 3)
                            <li>
                                <i class="fas fa-plus"></i>
                                And {{ $vets->count() - 3 }} more experienced veterinarians
                            </li>
                        @endif
                    </ul>
                </div>
                
                <!-- Emergency Notice -->
                <div class="emergency-notice">
                    <h3><i class="fas fa-ambulance"></i> Emergency?</h3>
                    <p>For immediate medical attention, call our 24/7 emergency hotline</p>
                    <a href="tel:+8801777987654" class="emergency-btn">
                        <i class="fas fa-phone"></i> +880 1777-987654
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Set minimum date to today
    document.getElementById('preferredDate').min = new Date().toISOString().split('T')[0];
    
    // Global variables
    let availableVets = @json($vets);
    let isSubmitting = false;
    let vetAvailabilityData = null;

    // Check for URL parameters (from vaccination booking page)
    const urlParams = new URLSearchParams(window.location.search);
    const preselectedVetId = urlParams.get('vet_id');
    const preselectedVetName = urlParams.get('vet_name');
    const preselectedSpecialization = urlParams.get('specialization');
    const preselectedServiceType = urlParams.get('service_type');
    const fromPage = urlParams.get('from');

    // Initialize form functionality
    document.addEventListener('DOMContentLoaded', function() {
        initializeFormHandlers();
        
        // Pre-fill form if coming from vaccination booking
        if (fromPage === 'vaccination_booking') {
            preSelectVetFromBooking();
            
            // Show a welcome message
            showAlert(`Welcome! You've selected ${preselectedVetName || 'a veterinarian'} for vaccination services. Please complete the appointment details below.`, 'success', true);
        }
        
        updateCostEstimate();
        loadVetAvailabilityData();
    });

    function preSelectVetFromBooking() {
        // Pre-select service type
        if (preselectedServiceType) {
            const serviceSelect = document.getElementById('serviceType');
            serviceSelect.value = preselectedServiceType;
            filterVetsByService();
        }

        // Pre-select vet if available in our vet list
        if (preselectedVetId) {
            const vetSelect = document.getElementById('vetId');
            // Check if this vet ID exists in our options
            const vetOption = vetSelect.querySelector(`option[value="${preselectedVetId}"]`);
            if (vetOption) {
                vetSelect.value = preselectedVetId;
            } else if (preselectedVetName) {
                // If exact ID doesn't match, try to find by name
                const options = vetSelect.querySelectorAll('option');
                for (let option of options) {
                    if (option.textContent.includes(preselectedVetName.replace('Dr. ', ''))) {
                        vetSelect.value = option.value;
                        break;
                    }
                }
            }
            
            // Update form based on vet selection
            updateDateRestrictions();
            displayVetAvailabilityInfo();
        }

        // Update cost estimate with pre-selected values
        updateCostEstimate();
    }

    function loadVetAvailabilityData() {
        fetch('http://localhost/Petsrology_webapp/public/api/vet-availability.php')
            .then(response => response.json())
            .then(data => {
                if (!data.error) {
                    vetAvailabilityData = data;
                    updateDateRestrictions();
                }
            })
            .catch(error => {
                console.error('Error loading vet availability:', error);
            });
    }

    function displayVetAvailabilityInfo() {
        const vetId = document.getElementById('vetId').value;
        
        if (!vetAvailabilityData || !vetId) {
            return;
        }
        
        const selectedVet = vetAvailabilityData.vets.find(v => v.id == vetId);
        if (selectedVet) {
            const dayNames = {
                'monday': 'Mon',
                'tuesday': 'Tue', 
                'wednesday': 'Wed',
                'thursday': 'Thu',
                'friday': 'Fri',
                'saturday': 'Sat',
                'sunday': 'Sun'
            };
            
            const availableDaysText = selectedVet.available_days
                .map(day => dayNames[day] || day)
                .join(', ');
                
            const startTime = new Date('2000-01-01 ' + selectedVet.working_hours.start).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            const endTime = new Date('2000-01-01 ' + selectedVet.working_hours.end).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            
            // Show availability info below vet selection
            const vetSelect = document.getElementById('vetId');
            const existingInfo = document.getElementById('vetAvailabilityInfo');
            
            if (existingInfo) {
                existingInfo.remove();
            }
            
            const infoDiv = document.createElement('div');
            infoDiv.id = 'vetAvailabilityInfo';
            infoDiv.style.cssText = 'margin-top: 8px; padding: 8px; background: #f8f9fa; border-radius: 4px; font-size: 0.85em; color: #666;';
            infoDiv.innerHTML = `
                <i class="fas fa-calendar-alt"></i> Available: ${availableDaysText}<br>
                <i class="fas fa-clock"></i> Hours: ${startTime} - ${endTime}
            `;
            
            vetSelect.parentNode.appendChild(infoDiv);
        }
    }

    function updateDateRestrictions() {
        const vetId = document.getElementById('vetId').value;
        const dateInput = document.getElementById('preferredDate');
        
        if (!vetAvailabilityData) return;
        
        let availableDays = [];
        
        if (vetId && vetId !== '') {
            // Get specific vet's available days
            const selectedVet = vetAvailabilityData.vets.find(v => v.id == vetId);
            if (selectedVet) {
                availableDays = selectedVet.available_days;
            }
        } else {
            // Get all available days from all vets
            availableDays = vetAvailabilityData.all_available_days;
        }
        
        // Update date input with custom validation
        dateInput.addEventListener('input', function() {
            validateSelectedDate(this.value, availableDays);
        });
        
        // Also validate on blur
        dateInput.addEventListener('blur', function() {
            validateSelectedDate(this.value, availableDays);
        });
        
        console.log('Available days for booking:', availableDays);
    }

    function validateSelectedDate(selectedDate, availableDays) {
        if (!selectedDate || !availableDays || !availableDays.length) return;
        
        try {
            const dayOfWeek = new Date(selectedDate).toLocaleDateString('en-US', { weekday: 'long' }).toLowerCase();
            const dateInput = document.getElementById('preferredDate');
            const timeSelect = document.getElementById('preferredTime');
            
            if (!availableDays.includes(dayOfWeek)) {
                // Show warning for unavailable day
                showAlert(`Sorry, no vets are available on ${dayOfWeek}s. Please select a different date.`, 'error');
                dateInput.style.borderColor = '#dc3545';
                timeSelect.innerHTML = '<option value="">No slots available for this date</option>';
                timeSelect.disabled = true;
            } else {
                dateInput.style.borderColor = '#28a745';
                timeSelect.disabled = false;
                // Load time slots for this date
                loadAvailableTimeSlots();
            }
        } catch (error) {
            console.error('Error validating date:', error);
            // Don't block form submission on date validation errors
        }
    }

    function initializeFormHandlers() {
        console.log('Initializing form handlers...');
        
        // Date change handler - load available time slots
        const dateInput = document.getElementById('preferredDate');
        if (dateInput) {
            console.log('Date input found, adding event listener');
            dateInput.addEventListener('change', function() {
                console.log('Date changed to:', this.value);
                loadAvailableTimeSlots();
            });
        } else {
            console.error('Date input not found!');
        }

        // Vet change handler - update available times and date restrictions
        const vetSelect = document.getElementById('vetId');
        if (vetSelect) {
            console.log('Vet select found, adding event listener');
            vetSelect.addEventListener('change', function() {
                console.log('Vet changed to:', this.value);
                updateDateRestrictions();
                displayVetAvailabilityInfo();
                const currentDate = document.getElementById('preferredDate').value;
                if (currentDate) {
                    loadAvailableTimeSlots();
                }
                updateCostEstimate();
            });
        } else {
            console.error('Vet select not found!');
        }

        // Service type change handler - update cost estimate and filter vets
        const serviceSelect = document.getElementById('serviceType');
        if (serviceSelect) {
            console.log('Service select found, adding event listener');
            serviceSelect.addEventListener('change', function() {
                console.log('Service changed to:', this.value);
                filterVetsByService();
                updateCostEstimate();
            });
        } else {
            console.error('Service select not found!');
        }

        // Phone number formatting
        const phoneInput = document.getElementById('ownerPhone');
        if (phoneInput) {
            console.log('Phone input found, adding event listener');
            phoneInput.addEventListener('input', function(e) {
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
        } else {
            console.error('Phone input not found!');
        }

        // Real-time validation
        const requiredFields = document.querySelectorAll('input[required], select[required]');
        console.log('Found', requiredFields.length, 'required fields');
        requiredFields.forEach(field => {
            field.addEventListener('blur', validateField);
            field.addEventListener('input', validateField);
        });

        // Form submission - MOST IMPORTANT
        const form = document.getElementById('appointmentForm');
        if (form) {
            console.log('Form found, adding submit event listener');
            form.addEventListener('submit', function(e) {
                console.log('Form submit event triggered!');
                handleFormSubmission(e);
            });
        } else {
            console.error('CRITICAL: Appointment form not found!');
        }
    }

    function loadAvailableTimeSlots() {
        const date = document.getElementById('preferredDate').value;
        const vetId = document.getElementById('vetId').value;
        const timeSelect = document.getElementById('preferredTime');
        const loader = document.getElementById('timeSlotLoader');

        if (!date) {
            timeSelect.innerHTML = '<option value="">Select Date First</option>';
            return;
        }

        // Show loading
        loader.style.display = 'inline-block';
        timeSelect.disabled = true;

        // Fetch available slots
        fetch(`http://localhost/Petsrology_webapp/public/api/slots.php?date=${date}&vet_id=${vetId}`)
            .then(response => {
                console.log('Response status:', response.status);
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }
                
                return response.text(); // Get as text first to debug
            })
            .then(textData => {
                console.log('Raw response:', textData);
                
                try {
                    const data = JSON.parse(textData);
                    console.log('Parsed data:', data);
                    
                    timeSelect.innerHTML = '<option value="">Select Time</option>';
                    
                    // Handle slots data
                    if (typeof data === 'object' && Object.keys(data).length === 0) {
                        timeSelect.innerHTML = '<option value="">No slots available for this date</option>';
                    } else if (typeof data === 'object') {
                        Object.entries(data).forEach(([value, text]) => {
                            const option = document.createElement('option');
                            option.value = value;
                            option.textContent = text;
                            timeSelect.appendChild(option);
                        });
                    } else {
                        console.error('Unexpected data format:', data);
                        timeSelect.innerHTML = '<option value="">Invalid response format</option>';
                    }

                } catch (parseError) {
                    console.error('JSON parse error:', parseError);
                    console.error('Raw response that failed to parse:', textData);
                    timeSelect.innerHTML = '<option value="">Server returned invalid data</option>';
                    showAlert('Server returned invalid response. Please check console for details.', 'error');
                }

                loader.style.display = 'none';
                timeSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error loading time slots:', error);
                timeSelect.innerHTML = '<option value="">Failed to load slots</option>';
                showAlert(`Network error: ${error.message}. Please check your connection and try again.`, 'error');
                loader.style.display = 'none';
                timeSelect.disabled = false;
            });
    }

    function filterVetsByService() {
        const serviceType = document.getElementById('serviceType').value;
        const vetSelect = document.getElementById('vetId');

        // Reset vet options
        vetSelect.innerHTML = '<option value="">Any Available Vet</option>';

        availableVets.forEach(vet => {
            const option = document.createElement('option');
            option.value = vet.id;
            option.dataset.role = vet.role;

            // Filter based on service compatibility
            let isCompatible = true;
            if (serviceType === 'general-checkup' && vet.role === 'surgery') {
                isCompatible = false;
            } else if (serviceType === 'surgery' && vet.role === 'general_checkup') {
                isCompatible = false;
            }

            if (isCompatible) {
                const roleText = vet.role === 'general_checkup' ? 'General Practice' : 
                               vet.role === 'surgery' ? 'Surgical Specialist' : 'General & Surgical';
                option.textContent = `Dr. ${vet.name} - ${roleText}`;
                vetSelect.appendChild(option);
            }
        });
    }

    function updateCostEstimate() {
        const serviceType = document.getElementById('serviceType').value;
        const vetId = document.getElementById('vetId').value;
        const costEstimate = document.getElementById('costEstimate');
        const estimatedPrice = document.getElementById('estimatedPrice');

        if (!serviceType) {
            costEstimate.style.display = 'none';
            return;
        }

        // Base costs for services
        const baseCosts = {
            'general-checkup': 1500,
            'vaccination': 800,
            'surgery': 5000,
            'grooming': 2000,
            'emergency': 2500,
            'dental': 3000,
            'skin-treatment': 2200
        };

        let cost = baseCosts[serviceType] || 1500;

        // If specific vet is selected, use their pricing
        if (vetId) {
            const selectedVet = availableVets.find(v => v.id == vetId);
            if (selectedVet) {
                if (serviceType === 'general-checkup' && selectedVet.general_price) {
                    cost = selectedVet.general_price;
                } else if (serviceType === 'surgery' && selectedVet.surgery_price_min) {
                    cost = selectedVet.surgery_price_min;
                }
            }
        }

        estimatedPrice.textContent = `৳ ${cost.toLocaleString()}`;
        costEstimate.style.display = 'block';
    }

    function validateField() {
        const field = this;
        const value = field.value.trim();

        if (field.hasAttribute('required') && !value) {
            field.style.borderColor = '#dc3545';
            return false;
        } else if (value) {
            field.style.borderColor = '#28a745';
            return true;
        } else {
            field.style.borderColor = '#e9ecef';
            return true;
        }
    }

    function handleFormSubmission(e) {
        e.preventDefault();

        if (isSubmitting) return;

        const form = e.target;
        const formData = new FormData(form);
        const submitBtn = document.getElementById('submitBtn');
        const submitLoader = document.getElementById('submitLoader');

        // Log form data for debugging
        console.log('Form data being submitted:');
        for (let [key, value] of formData.entries()) {
            console.log(key, ':', value);
        }

        // Validate all required fields
        let isValid = true;
        const requiredFields = form.querySelectorAll('input[required], select[required]');
        
        requiredFields.forEach(field => {
            if (!validateField.call(field)) {
                isValid = false;
            }
        });

        if (!isValid) {
            showAlert('Please fill in all required fields marked with *', 'error');
            return;
        }

        // Show loading state
        isSubmitting = true;
        submitBtn.disabled = true;
        submitLoader.style.display = 'inline-block';
        submitBtn.querySelector('span').textContent = 'Booking Appointment...';

        // Submit form via AJAX
        fetch('http://localhost/Petsrology_webapp/public/api/book-appointment.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response headers:', response.headers);
            
            if (!response.ok) {
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }
            return response.text();
        })
        .then(textData => {
            console.log('Raw response:', textData);
            
            try {
                const data = JSON.parse(textData);
                console.log('Parsed response:', data);
                
                if (data.success) {
                    showSuccessMessage(data);
                    form.reset();
                    document.getElementById('costEstimate').style.display = 'none';
                    document.getElementById('preferredTime').innerHTML = '<option value="">Select Date First</option>';
                    
                    // Remove vet availability info
                    const existingInfo = document.getElementById('vetAvailabilityInfo');
                    if (existingInfo) {
                        existingInfo.remove();
                    }
                } else {
                    if (data.details && Array.isArray(data.details)) {
                        showAlert('Validation errors: ' + data.details.join(', '), 'error');
                    } else {
                        showAlert(data.message || data.error || 'Failed to book appointment', 'error');
                    }
                }
            } catch (parseError) {
                console.error('JSON parse error:', parseError);
                console.error('Raw response:', textData);
                
                // Check if response looks like HTML (error page)
                if (textData.trim().startsWith('<')) {
                    showAlert('Server error occurred. Please check the console for details.', 'error');
                } else {
                    showAlert('Server returned invalid response', 'error');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert(error.message || 'Failed to book appointment. Please try again.', 'error');
        })
        .finally(() => {
            isSubmitting = false;
            submitBtn.disabled = false;
            submitLoader.style.display = 'none';
            submitBtn.querySelector('span').textContent = 'Book Appointment';
        });
    }

    function showSuccessMessage(data) {
        const message = `
            <div class="alert success">
                <i class="fas fa-check-circle"></i>
                <div>
                    <h4 style="margin: 0 0 5px 0;">Appointment Booked Successfully! 🎉</h4>
                    <p style="margin: 0;"><strong>Appointment Number:</strong> ${data.appointment_number}</p>
                    <p style="margin: 5px 0 0 0;">We will call you within 2 hours to confirm your appointment. Thank you for choosing PETSROLOGY!</p>
                </div>
            </div>
        `;
        showAlert(message, 'success', false);
    }

    function showAlert(message, type = 'info', autoHide = true) {
        const alertContainer = document.getElementById('alert-container');
        
        if (type === 'success' && !autoHide) {
            alertContainer.innerHTML = message;
        } else {
            const alertClass = type === 'error' ? 'error' : 'success';
            alertContainer.innerHTML = `
                <div class="alert ${alertClass}">
                    <i class="fas fa-${type === 'error' ? 'exclamation-triangle' : 'check-circle'}"></i>
                    ${message}
                </div>
            `;
        }

        const alert = alertContainer.querySelector('.alert');
        if (alert) {
            alert.style.display = 'flex';
            
            if (autoHide) {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 5000);
            }

            // Scroll to alert
            alert.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    // Add animation on load
    document.addEventListener('DOMContentLoaded', function() {
        const formSection = document.querySelector('.appointment-form-section');
        const infoSection = document.querySelector('.appointment-info');

        // Animate form section
        setTimeout(() => {
            formSection.style.opacity = '0';
            formSection.style.transform = 'translateY(30px)';
            formSection.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            
            setTimeout(() => {
                formSection.style.opacity = '1';
                formSection.style.transform = 'translateY(0)';
            }, 100);
        }, 200);

        // Animate info section
        setTimeout(() => {
            infoSection.style.opacity = '0';
            infoSection.style.transform = 'translateY(30px)';
            infoSection.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            
            setTimeout(() => {
                infoSection.style.opacity = '1';
                infoSection.style.transform = 'translateY(0)';
            }, 200);
        }, 400);
    });
</script>
@endsection
