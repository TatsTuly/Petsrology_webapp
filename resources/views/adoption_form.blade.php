<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Application - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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
        }

        /* Navigation Styles */
        .navbar {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255,111,97,0.1);
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
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            margin-right: 15px;
            transition: all 0.3s ease;
            font-size: 1.5rem;
        }

        .brand-text {
            font-family: 'Nunito', sans-serif;
            font-size: 1.6rem;
            font-weight: 900;
            letter-spacing: 1.2px;
            color: #ff6f61;
            text-shadow: 0 2px 4px rgba(255,111,97,0.1);
        }

        .back-btn {
            background: #ff6f61;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            cursor: pointer;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
        }

        .back-btn:hover {
            background: #e65c50;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,111,97,0.4);
            text-decoration: none;
            color: white;
        }

        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        /* Header Section */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
            animation: fadeInUp 0.6s ease-out;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .page-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .pet-info-banner {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            margin: 30px 0;
            box-shadow: 0 8px 25px rgba(255,111,97,0.3);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .pet-info-banner img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .pet-banner-content h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .pet-banner-content p {
            opacity: 0.9;
            font-size: 1rem;
        }

        /* Form Container */
        .form-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            animation: fadeInUp 0.8s ease-out;
        }

        /* Application Form */
        .application-form {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.12), 0 2px 8px rgba(0,0,0,0.04);
            padding: 40px;
            border: 1px solid rgba(255,111,97,0.05);
            position: relative;
            overflow: hidden;
        }

        .application-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        }

        .form-section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 1.4rem;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f8f9fa;
        }

        .section-title i {
            color: #ff6f61;
            font-size: 1.2rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-row.three-col {
            grid-template-columns: 1fr 1fr 1fr;
        }

        label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .required {
            color: #ff6f61;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fff;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #ff6f61;
            box-shadow: 0 0 0 3px rgba(255,111,97,0.1);
            transform: translateY(-1px);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox-item input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 10px;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .radio-item input[type="radio"] {
            width: auto;
            margin: 0;
        }

        /* Sidebar Information */
        .form-sidebar {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .info-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(255,111,97,0.12), 0 2px 8px rgba(0,0,0,0.04);
            padding: 30px;
            border: 1px solid rgba(255,111,97,0.05);
            position: relative;
            overflow: hidden;
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(135deg, #ff6f61, #ff9472);
        }

        .card-title {
            font-size: 1.3rem;
            color: #2c3e50;
            font-weight: 800;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: #ff6f61;
        }

        .process-timeline {
            list-style: none;
        }

        .timeline-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
        }

        .timeline-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .timeline-number {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .timeline-content h4 {
            color: #333;
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 0.95rem;
        }

        .timeline-content p {
            color: #666;
            font-size: 0.85rem;
            line-height: 1.4;
        }

        .requirements-list {
            list-style: none;
        }

        .requirement-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .requirement-item i {
            color: #ff6f61;
            font-size: 1.1rem;
        }

        .requirement-item span {
            font-size: 0.9rem;
            color: #333;
        }

        /* Contact Information */
        .contact-info {
            text-align: center;
        }

        .contact-item {
            margin-bottom: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 12px;
        }

        .contact-item i {
            color: #ff6f61;
            font-size: 1.2rem;
            margin-bottom: 8px;
            display: block;
        }

        .contact-item strong {
            display: block;
            color: #333;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .contact-item span {
            color: #666;
            font-size: 0.85rem;
        }

        /* Form Actions */
        .form-actions {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #f8f9fa;
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 25px;
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255,111,97,0.3);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255,111,97,0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #ff6f61;
            border: 2px solid #ff6f61;
            padding: 13px 35px;
            border-radius: 25px;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-secondary:hover {
            background: #ff6f61;
            color: white;
        }

        /* Progress Indicator */
        .progress-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ff6f61;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.9rem;
        }

        .step-text {
            font-weight: 600;
            color: #ff6f61;
            margin-right: 30px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .main-content {
                padding: 20px 15px;
            }

            .application-form {
                padding: 25px;
            }

            .form-row,
            .form-row.three-col {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .page-title {
                font-size: 2rem;
            }

            .pet-info-banner {
                flex-direction: column;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
                align-items: center;
            }

            .navbar-container {
                padding: 0 15px;
                height: 60px;
            }

            .brand-logo {
                width: 40px;
                height: 40px;
            }

            .brand-text {
                font-size: 1.3rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Form Validation Styles */
        .error {
            border-color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.1);
        }

        .error-message {
            color: #dc3545;
            font-size: 0.8rem;
            margin-top: 5px;
            display: none;
        }

        .success {
            border-color: #28a745;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
        }

        /* Custom Checkbox and Radio Styles */
        input[type="checkbox"],
        input[type="radio"] {
            width: 18px;
            height: 18px;
            accent-color: #ff6f61;
        }

        /* File Upload Styling */
        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: block;
            padding: 12px 16px;
            border: 2px dashed #e9ecef;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .file-upload-label:hover {
            border-color: #ff6f61;
            background: rgba(255,111,97,0.05);
        }

        .file-upload-label i {
            color: #ff6f61;
            font-size: 1.5rem;
            margin-bottom: 10px;
            display: block;
        }

        /* Highlight Important Sections */
        .highlight-section {
            background: linear-gradient(135deg, rgba(255,111,97,0.05) 0%, rgba(255,148,114,0.02) 100%);
            border: 1px solid rgba(255,111,97,0.1);
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
        }

        .highlight-section h4 {
            color: #ff6f61;
            font-weight: 700;
            margin-bottom: 10px;
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
            <a href="{{ url('/adoption-details') }}" class="back-btn" id="backToPetBtn">
                <i class="fas fa-arrow-left"></i>
                Back to Pet Details
            </a>
        </div>
    </nav>

    <div class="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Adoption Application</h1>
            <p class="page-subtitle">Complete this application to begin the adoption process. All information is confidential and will be used solely for the purpose of pet placement.</p>
            
            <div class="pet-info-banner" id="petInfoBanner">
                <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=80&h=80&fit=crop&auto=format" alt="Pet" id="petBannerImage">
                <div class="pet-banner-content">
                    <h3 id="petBannerName">Milo</h3>
                    <p id="petBannerDetails">Mixed Breed • Female • 1 year old</p>
                </div>
            </div>

            <div class="progress-indicator">
                <div class="progress-step">
                    <div class="step-circle">1</div>
                    <span class="step-text">Application</span>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <!-- Application Form -->
            <div class="application-form">
                <form id="adoptionForm" action="{{ route('adoption.form.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pet" id="petNameHidden" value="">
                    
                    <!-- Personal Information -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-user"></i>
                            Personal Information
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">First Name <span class="required">*</span></label>
                                <input type="text" id="firstName" name="firstName" required>
                                <div class="error-message">Please enter your first name</div>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name <span class="required">*</span></label>
                                <input type="text" id="lastName" name="lastName" required>
                                <div class="error-message">Please enter your last name</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email Address <span class="required">*</span></label>
                                <input type="email" id="email" name="email" required>
                                <div class="error-message">Please enter a valid email address</div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number <span class="required">*</span></label>
                                <input type="tel" id="phone" name="phone" required>
                                <div class="error-message">Please enter your phone number</div>
                            </div>
                        </div>

                        <div class="form-row three-col">
                            <div class="form-group">
                                <label for="age">Age <span class="required">*</span></label>
                                <input type="number" id="age" name="age" min="18" max="100" required>
                                <div class="error-message">You must be at least 18 years old</div>
                            </div>
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input type="text" id="occupation" name="occupation">
                            </div>
                            <div class="form-group">
                                <label for="maritalStatus">Marital Status</label>
                                <select id="maritalStatus" name="maritalStatus">
                                    <option value="">Select Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-home"></i>
                            Address Information
                        </h3>
                        
                        <div class="form-group">
                            <label for="address">Street Address <span class="required">*</span></label>
                            <input type="text" id="address" name="address" required>
                            <div class="error-message">Please enter your street address</div>
                        </div>

                        <div class="form-row three-col">
                            <div class="form-group">
                                <label for="city">City <span class="required">*</span></label>
                                <input type="text" id="city" name="city" required>
                                <div class="error-message">Please enter your city</div>
                            </div>
                            <div class="form-group">
                                <label for="state">State/Province</label>
                                <input type="text" id="state" name="state">
                            </div>
                            <div class="form-group">
                                <label for="zipCode">ZIP/Postal Code</label>
                                <input type="text" id="zipCode" name="zipCode">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="housingType">Housing Type <span class="required">*</span></label>
                                <select id="housingType" name="housingType" required>
                                    <option value="">Select Housing Type</option>
                                    <option value="house">House</option>
                                    <option value="apartment">Apartment</option>
                                    <option value="condo">Condominium</option>
                                    <option value="townhouse">Townhouse</option>
                                    <option value="mobile">Mobile Home</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="error-message">Please select your housing type</div>
                            </div>
                            <div class="form-group">
                                <label for="ownRent">Do you own or rent? <span class="required">*</span></label>
                                <select id="ownRent" name="ownRent" required>
                                    <option value="">Select Option</option>
                                    <option value="own">Own</option>
                                    <option value="rent">Rent</option>
                                </select>
                                <div class="error-message">Please specify if you own or rent</div>
                            </div>
                        </div>

                        <div class="form-group" id="landlordInfo" style="display: none;">
                            <label for="landlordContact">Landlord Contact Information</label>
                            <textarea id="landlordContact" name="landlordContact" placeholder="Please provide your landlord's name and contact information"></textarea>
                        </div>
                    </div>

                    <!-- Pet Experience -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-paw"></i>
                            Pet Experience & Household
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Do you currently have pets? <span class="required">*</span></label>
                                <div class="radio-group">
                                    <div class="radio-item">
                                        <input type="radio" id="currentPetsYes" name="currentPets" value="yes" required>
                                        <label for="currentPetsYes">Yes</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" id="currentPetsNo" name="currentPets" value="no" required>
                                        <label for="currentPetsNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Have you had pets before? <span class="required">*</span></label>
                                <div class="radio-group">
                                    <div class="radio-item">
                                        <input type="radio" id="previousPetsYes" name="previousPets" value="yes" required>
                                        <label for="previousPetsYes">Yes</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" id="previousPetsNo" name="previousPets" value="no" required>
                                        <label for="previousPetsNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="currentPetsDetails" style="display: none;">
                            <label for="currentPetsInfo">Current Pets Information</label>
                            <textarea id="currentPetsInfo" name="currentPetsInfo" placeholder="Please describe your current pets (type, breed, age, spayed/neutered status)"></textarea>
                        </div>

                        <div class="form-group" id="previousPetsDetails" style="display: none;">
                            <label for="previousPetsInfo">Previous Pet Experience</label>
                            <textarea id="previousPetsInfo" name="previousPetsInfo" placeholder="Please describe your previous pet experience"></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="householdMembers">Number of Household Members</label>
                                <input type="number" id="householdMembers" name="householdMembers" min="1" max="20">
                            </div>
                            <div class="form-group">
                                <label for="childrenAges">Ages of Children (if any)</label>
                                <input type="text" id="childrenAges" name="childrenAges" placeholder="e.g., 5, 8, 12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Are all household members aware of this adoption?</label>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" id="householdAwareYes" name="householdAware" value="yes">
                                    <label for="householdAwareYes">Yes</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" id="householdAwareNo" name="householdAware" value="no">
                                    <label for="householdAwareNo">No</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Does anyone in your household have pet allergies?</label>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" id="allergiesYes" name="allergies" value="yes">
                                    <label for="allergiesYes">Yes</label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" id="allergiesNo" name="allergies" value="no">
                                    <label for="allergiesNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pet Care Plans -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-heart"></i>
                            Pet Care Plans
                        </h3>
                        
                        <div class="form-group">
                            <label for="reasonForAdoption">Why do you want to adopt this pet? <span class="required">*</span></label>
                            <textarea id="reasonForAdoption" name="reasonForAdoption" required placeholder="Please explain your motivation for adopting this specific pet"></textarea>
                            <div class="error-message">Please explain why you want to adopt this pet</div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="dailySchedule">Describe your daily schedule</label>
                                <textarea id="dailySchedule" name="dailySchedule" placeholder="How many hours per day would the pet be alone?"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exercisePlans">Exercise and Activity Plans</label>
                                <textarea id="exercisePlans" name="exercisePlans" placeholder="How will you ensure the pet gets adequate exercise and mental stimulation?"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="veterinaryCare">Veterinary Care Plans <span class="required">*</span></label>
                            <textarea id="veterinaryCare" name="veterinaryCare" required placeholder="Do you have a veterinarian? How will you handle medical care and expenses?"></textarea>
                            <div class="error-message">Please describe your veterinary care plans</div>
                        </div>

                        <div class="form-group">
                            <label for="emergencyPlans">Emergency and Travel Plans</label>
                            <textarea id="emergencyPlans" name="emergencyPlans" placeholder="What arrangements will you make for the pet during travel or emergencies?"></textarea>
                        </div>

                        <div class="highlight-section">
                            <h4>Financial Commitment</h4>
                            <div class="form-group">
                                <label>Are you prepared for the financial commitment of pet ownership? <span class="required">*</span></label>
                                <div class="radio-group">
                                    <div class="radio-item">
                                        <input type="radio" id="financialYes" name="financialCommitment" value="yes" required>
                                        <label for="financialYes">Yes, I understand the costs involved</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" id="financialNo" name="financialCommitment" value="no" required>
                                        <label for="financialNo">I need more information about costs</label>
                                    </div>
                                </div>
                                <div class="error-message">Please acknowledge the financial commitment</div>
                            </div>
                        </div>
                    </div>

                    <!-- References -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-users"></i>
                            References
                        </h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="vetReference">Veterinary Reference</label>
                                <input type="text" id="vetReference" name="vetReference" placeholder="Veterinary clinic name and phone number">
                            </div>
                            <div class="form-group">
                                <label for="personalReference1">Personal Reference 1</label>
                                <input type="text" id="personalReference1" name="personalReference1" placeholder="Name and phone number">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="personalReference2">Personal Reference 2</label>
                                <input type="text" id="personalReference2" name="personalReference2" placeholder="Name and phone number">
                            </div>
                            <div class="form-group">
                                <label for="employerReference">Employer Reference (Optional)</label>
                                <input type="text" id="employerReference" name="employerReference" placeholder="Employer name and contact">
                            </div>
                        </div>
                    </div>

                    <!-- Agreement -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-file-signature"></i>
                            Agreement & Authorization
                        </h3>
                        
                        <div class="highlight-section">
                            <div class="checkbox-group" style="flex-direction: column; gap: 15px;">
                                <div class="checkbox-item">
                                    <input type="checkbox" id="agreement1" name="agreements[]" value="truthful_info" required>
                                    <label for="agreement1">I certify that all information provided is true and complete <span class="required">*</span></label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="agreement2" name="agreements[]" value="home_visit" required>
                                    <label for="agreement2">I agree to a home visit as part of the adoption process <span class="required">*</span></label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="agreement3" name="agreements[]" value="reference_check" required>
                                    <label for="agreement3">I authorize PETSROLOGY to contact my references <span class="required">*</span></label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="agreement4" name="agreements[]" value="lifetime_commitment" required>
                                    <label for="agreement4">I understand that pet adoption is a lifetime commitment <span class="required">*</span></label>
                                </div>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="agreement5" name="agreements[]" value="return_policy" required>
                                    <label for="agreement5">I agree to return the pet to PETSROLOGY if I can no longer care for it <span class="required">*</span></label>
                                </div>
                            </div>
                            <div class="error-message" id="agreementError">Please accept all required agreements</div>
                        </div>

                        <div class="form-group">
                            <label for="additionalComments">Additional Comments</label>
                            <textarea id="additionalComments" name="additionalComments" placeholder="Any additional information you'd like us to know"></textarea>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="button" class="btn-secondary" onclick="saveDraft()">
                            <i class="fas fa-save"></i>
                            Save Draft
                        </button>
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            Submit Application
                        </button>
                    </div>
                </form>
            </div>

            <!-- Sidebar Information -->
            <div class="form-sidebar">
                <!-- Process Timeline -->
                <div class="info-card">
                    <h3 class="card-title">
                        <i class="fas fa-clipboard-list"></i>
                        Adoption Process
                    </h3>
                    <ul class="process-timeline">
                        <li class="timeline-item">
                            <div class="timeline-number">1</div>
                            <div class="timeline-content">
                                <h4>Application Review</h4>
                                <p>We'll review your application within 2-3 business days</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-number">2</div>
                            <div class="timeline-content">
                                <h4>Reference Check</h4>
                                <p>We'll contact your references to learn more about you</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-number">3</div>
                            <div class="timeline-content">
                                <h4>Home Visit</h4>
                                <p>A team member will visit to ensure a safe environment</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-number">4</div>
                            <div class="timeline-content">
                                <h4>Meet & Greet</h4>
                                <p>You'll meet the pet and see if it's a good match</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-number">5</div>
                            <div class="timeline-content">
                                <h4>Adoption Day</h4>
                                <p>Complete paperwork and take your new friend home!</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Requirements -->
                <div class="info-card">
                    <h3 class="card-title">
                        <i class="fas fa-check-circle"></i>
                        Requirements
                    </h3>
                    <ul class="requirements-list">
                        <li class="requirement-item">
                            <i class="fas fa-id-card"></i>
                            <span>Must be 18 years or older</span>
                        </li>
                        <li class="requirement-item">
                            <i class="fas fa-home"></i>
                            <span>Stable housing situation</span>
                        </li>
                        <li class="requirement-item">
                            <i class="fas fa-dollar-sign"></i>
                            <span>Financial stability for pet care</span>
                        </li>
                        <li class="requirement-item">
                            <i class="fas fa-clock"></i>
                            <span>Time commitment for pet care</span>
                        </li>
                        <li class="requirement-item">
                            <i class="fas fa-heart"></i>
                            <span>Genuine love for animals</span>
                        </li>
                        <li class="requirement-item">
                            <i class="fas fa-handshake"></i>
                            <span>Agreement to our adoption terms</span>
                        </li>
                    </ul>
                </div>

                <!-- Contact Information -->
                <div class="info-card">
                    <h3 class="card-title">
                        <i class="fas fa-phone"></i>
                        Need Help?
                    </h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <strong>Email</strong>
                            <span>adopt@petsrology.com</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <strong>Phone</strong>
                            <span>+880 1777-123456</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <strong>Hours</strong>
                            <span>Mon-Sat: 9AM-7PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Form validation and interaction
        document.addEventListener('DOMContentLoaded', function() {
            // Load pet information from URL parameters
            loadPetInfo();
            
            // Form validation
            setupFormValidation();
            
            // Dynamic form behavior
            setupDynamicBehavior();
        });

        function loadPetInfo() {
            const urlParams = new URLSearchParams(window.location.search);
            const petName = urlParams.get('pet') || 'Milo';
            
            // Pet database for form integration
            const petDatabase = {
                'milo': {
                    name: 'Milo',
                    image: 'https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?w=80&h=80&fit=crop&auto=format',
                    details: 'Mixed Breed • Female • 1 year old'
                },
                'sir whiskerlot': {
                    name: 'Sir Whiskerlot',
                    image: 'https://images.unsplash.com/photo-1573865526739-10659fec78a5?w=80&h=80&fit=crop&auto=format',
                    details: 'Maine Coon • Female • 2 years old'
                },
                'buddy': {
                    name: 'Buddy',
                    image: 'https://images.unsplash.com/photo-1552053831-71594a27632d?w=80&h=80&fit=crop&auto=format',
                    details: 'Golden Retriever • Male • 2 years old'
                },
                'luna': {
                    name: 'Luna',
                    image: 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=80&h=80&fit=crop&auto=format',
                    details: 'Labrador • Female • 1.5 years old'
                },
                'charlie': {
                    name: 'Charlie',
                    image: 'https://images.unsplash.com/photo-1452570053594-1b985d6ea890?w=80&h=80&fit=crop&auto=format',
                    details: 'Parakeet • Male • 6 months old'
                },
                'mochi': {
                    name: 'Mochi',
                    image: 'https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=80&h=80&fit=crop&auto=format',
                    details: 'Persian Cat • Female • 3 years old'
                },
                'snowball': {
                    name: 'Snowball',
                    image: 'https://images.unsplash.com/photo-1585110396000-c9ffd4e4b308?w=80&h=80&fit=crop&auto=format',
                    details: 'Holland Lop Rabbit • Female • 8 months old'
                },
                'max': {
                    name: 'Max',
                    image: 'https://images.unsplash.com/photo-1551717743-49959800b1f6?w=80&h=80&fit=crop&auto=format',
                    details: 'Beagle • Male • 10 months old'
                },
                'whiskers': {
                    name: 'Whiskers',
                    image: 'https://images.unsplash.com/photo-1533738363-b7f9aef128ce?w=80&h=80&fit=crop&auto=format',
                    details: 'Tabby Cat • Male • 8 months old'
                },
                'bella': {
                    name: 'Bella',
                    image: 'https://images.unsplash.com/photo-1589941013453-ec89f33b5e95?w=80&h=80&fit=crop&auto=format',
                    details: 'German Shepherd • Female • 5 years old'
                },
                'sunny': {
                    name: 'Sunny',
                    image: 'https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=80&h=80&fit=crop&auto=format',
                    details: 'Cockatiel • Female • 2 years old'
                },
                'spike': {
                    name: 'Spike',
                    image: 'https://images.unsplash.com/photo-1548767797-d8c844163c4c?w=80&h=80&fit=crop&auto=format',
                    details: 'Guinea Pig • Male • 1.5 years old'
                },
                'shadow': {
                    name: 'Shadow',
                    image: 'https://images.unsplash.com/photo-1561948955-570b270e7c36?w=80&h=80&fit=crop&auto=format',
                    details: 'Black Cat • Male • 2.5 years old'
                },
                'ruby': {
                    name: 'Ruby',
                    image: 'https://images.unsplash.com/photo-1551717743-49959800b1f6?w=80&h=80&fit=crop&auto=format',
                    details: 'Toy Poodle • Female • 9 months old'
                },
                'nibbles': {
                    name: 'Nibbles',
                    image: 'https://images.unsplash.com/photo-1681141289794-ff2f3b2002c3?w=80&h=80&fit=crop&auto=format',
                    details: 'Syrian Hamster • Male • 4 months old'
                }
            };

            const pet = petDatabase[petName.toLowerCase()] || petDatabase['milo'];
            
            document.getElementById('petBannerImage').src = pet.image;
            document.getElementById('petBannerName').textContent = pet.name;
            document.getElementById('petBannerDetails').textContent = pet.details;
            
            // Set the hidden field value
            document.getElementById('petNameHidden').value = petName.toLowerCase();
            
            // Update the back button URL to include the pet parameter
            const backBtn = document.getElementById('backToPetBtn');
            backBtn.href = `/adoption-details?pet=${encodeURIComponent(petName.toLowerCase())}`;
        }

        function setupFormValidation() {
            const form = document.getElementById('adoptionForm');
            const requiredFields = form.querySelectorAll('[required]');
            
            // Real-time validation
            requiredFields.forEach(field => {
                field.addEventListener('blur', function() {
                    validateField(this);
                });
                
                field.addEventListener('input', function() {
                    if (this.classList.contains('error')) {
                        validateField(this);
                    }
                });
            });
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                let isValid = true;
                requiredFields.forEach(field => {
                    if (!validateField(field)) {
                        isValid = false;
                    }
                });
                
                // Check agreements
                const requiredAgreements = document.querySelectorAll('input[name="agreements[]"][required]');
                const agreementError = document.getElementById('agreementError');
                let allAgreed = true;
                
                requiredAgreements.forEach(checkbox => {
                    if (!checkbox.checked) {
                        allAgreed = false;
                    }
                });
                
                if (!allAgreed) {
                    agreementError.style.display = 'block';
                    isValid = false;
                } else {
                    agreementError.style.display = 'none';
                }
                
                if (isValid) {
                    submitApplication();
                } else {
                    // Scroll to first error
                    const firstError = document.querySelector('.error');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        }

        function validateField(field) {
            const errorMessage = field.parentNode.querySelector('.error-message');
            let isValid = true;
            
            // Remove existing error state
            field.classList.remove('error', 'success');
            if (errorMessage) errorMessage.style.display = 'none';
            
            // Check if field is required and empty
            if (field.hasAttribute('required') && !field.value.trim()) {
                isValid = false;
            }
            
            // Specific validations
            if (field.type === 'email' && field.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(field.value)) {
                    isValid = false;
                }
            }
            
            if (field.type === 'number' && field.value) {
                const min = field.getAttribute('min');
                const max = field.getAttribute('max');
                const value = parseInt(field.value);
                
                if (min && value < parseInt(min)) {
                    isValid = false;
                }
                if (max && value > parseInt(max)) {
                    isValid = false;
                }
            }
            
            // Apply validation state
            if (isValid && field.value.trim()) {
                field.classList.add('success');
            } else if (!isValid) {
                field.classList.add('error');
                if (errorMessage) errorMessage.style.display = 'block';
            }
            
            return isValid;
        }

        function setupDynamicBehavior() {
            // Show/hide landlord info based on own/rent selection
            const ownRentSelect = document.getElementById('ownRent');
            const landlordInfo = document.getElementById('landlordInfo');
            
            ownRentSelect.addEventListener('change', function() {
                if (this.value === 'rent') {
                    landlordInfo.style.display = 'block';
                } else {
                    landlordInfo.style.display = 'none';
                }
            });
            
            // Show/hide current pets details
            const currentPetsRadios = document.querySelectorAll('input[name="currentPets"]');
            const currentPetsDetails = document.getElementById('currentPetsDetails');
            
            currentPetsRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'yes') {
                        currentPetsDetails.style.display = 'block';
                    } else {
                        currentPetsDetails.style.display = 'none';
                    }
                });
            });
            
            // Show/hide previous pets details
            const previousPetsRadios = document.querySelectorAll('input[name="previousPets"]');
            const previousPetsDetails = document.getElementById('previousPetsDetails');
            
            previousPetsRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'yes') {
                        previousPetsDetails.style.display = 'block';
                    } else {
                        previousPetsDetails.style.display = 'none';
                    }
                });
            });
        }

        function saveDraft() {
            const formData = new FormData(document.getElementById('adoptionForm'));
            const data = Object.fromEntries(formData);
            
            // Save to localStorage
            localStorage.setItem('adoptionFormDraft', JSON.stringify(data));
            
            // Show confirmation
            alert('Draft saved successfully! You can continue filling the form later.');
        }

        function loadDraft() {
            const savedData = localStorage.getItem('adoptionFormDraft');
            if (savedData) {
                const data = JSON.parse(savedData);
                const form = document.getElementById('adoptionForm');
                
                Object.keys(data).forEach(key => {
                    const field = form.querySelector(`[name="${key}"]`);
                    if (field) {
                        if (field.type === 'checkbox' || field.type === 'radio') {
                            field.checked = data[key] === field.value;
                        } else {
                            field.value = data[key];
                        }
                    }
                });
            }
        }

        function submitApplication() {
            // Show loading state
            const submitBtn = document.querySelector('.btn-primary');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            submitBtn.disabled = true;
            
            // Clear draft on successful submission
            localStorage.removeItem('adoptionFormDraft');
            
            // Submit the form normally - Laravel will handle the rest
            document.getElementById('adoptionForm').submit();
        }

        // Load draft on page load
        window.addEventListener('load', loadDraft);
    </script>
</body>
</html>
