@extends('layouts.vet_app')

@section('title', 'Join as Professional Vet - PETSROLOGY')

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #ff6f61 0%, #ff9472 50%, #ffcccb 100%);
        min-height: 100vh;
    }
    
    .hero-section {
        background: linear-gradient(135deg, #ff6f61 0%, #ff9472 100%);
        color: white;
        text-align: center;
        padding: 60px 20px 40px;
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
    
    .hero-content h1 {
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 1rem;
        font-family: 'Nunito', sans-serif;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
    
    .hero-content p {
        font-size: 1.2rem;
        opacity: 0.9;
        line-height: 1.6;
        font-family: 'Nunito', sans-serif;
    }
    
    .contact-form-container {
        background: #fff;
        padding: 3rem;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #f0f0f0;
        max-width: 700px;
        margin: 40px auto;
        position: relative;
    }
    
    .contact-form-container h2 {
        color: #ff6f61;
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 2rem;
        font-family: 'Nunito', sans-serif;
        text-align: center;
    }
    
    /* Status Message Styles */
    .status-container {
        text-align: center;
        padding: 3rem;
    }
    
    .status-icon {
        font-size: 4rem;
        margin-bottom: 2rem;
    }
    
    .status-pending {
        color: #f39c12;
    }
    
    .status-approved {
        color: #27ae60;
    }
    
    .status-rejected {
        color: #e74c3c;
    }
    
    .status-title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }
    
    .status-message {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        line-height: 1.6;
    }
    
    .status-details {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 10px;
        margin-top: 2rem;
        text-align: left;
    }
    
    .status-details h3 {
        color: #ff6f61;
        margin-bottom: 1rem;
        font-size: 1.3rem;
    }
    
    .status-detail-item {
        display: flex;
        justify-content: space-between;
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
    }
    
    .status-detail-item:last-child {
        border-bottom: none;
    }
    
    .form-row {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    
    .form-group {
        margin-bottom: 2rem;
        position: relative;
        flex: 1;
    }
    
    .form-control, .form-select {
        width: 100%;
        padding: 1.2rem;
        border: 2px solid #eee;
        border-radius: 8px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        font-family: 'Nunito', sans-serif;
        box-sizing: border-box;
        background: #fff;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #ff6f61;
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 111, 97, 0.1);
        transform: translateY(-2px);
    }
    
    .form-control:read-only {
        background-color: #f8f9fa;
        cursor: not-allowed;
        color: #6c757d;
    }
    
    .form-control::placeholder {
        color: #999;
        font-weight: 400;
    }
    
    .form-select {
        cursor: pointer;
    }
    
    .file-input-container {
        position: relative;
        overflow: hidden;
        display: inline-block;
        width: 100%;
    }
    
    .file-input-container input[type=file] {
        position: absolute;
        left: -9999px;
    }
    
    .file-input-label {
        display: block;
        padding: 1.2rem;
        border: 2px dashed #ff6f61;
        border-radius: 8px;
        background: rgba(255, 111, 97, 0.05);
        color: #ff6f61;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-family: 'Nunito', sans-serif;
        font-weight: 600;
    }
    
    .file-input-label:hover {
        background: rgba(255, 111, 97, 0.1);
        border-color: #ff9472;
    }
    
    .file-preview {
        margin-top: 1rem;
        text-align: center;
    }
    
    .file-preview img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 3px solid #ff6f61;
        object-fit: cover;
        box-shadow: 0 4px 15px rgba(255, 111, 97, 0.2);
    }
    
    .day-checkbox {
        position: relative;
        overflow: hidden;
    }
    
    .day-checkbox:hover {
        border-color: #ff6f61 !important;
        background: rgba(255, 111, 97, 0.05) !important;
    }
    
    .day-checkbox input[type="checkbox"]:checked + span {
        color: #ff6f61 !important;
    }
    
    .day-checkbox:has(input:checked) {
        border-color: #ff6f61 !important;
        background: rgba(255, 111, 97, 0.1) !important;
    }
    
    .day-checkbox input[type="checkbox"] {
        accent-color: #ff6f61;
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
        margin-top: 1rem;
    }
    
    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 111, 97, 0.4);
    }
    
    .btn-dashboard {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
        padding: 1rem 2rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        font-weight: 600;
        font-family: 'Nunito', sans-serif;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        margin-top: 1rem;
    }
    
    .btn-dashboard:hover {
        transform: translateY(-2px);
        color: white;
        text-decoration: none;
    }
    
    .alert {
        margin-bottom: 2rem;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        font-family: 'Nunito', sans-serif;
        font-weight: 600;
        animation: slideDown 0.3s ease-out;
    }
    
    .alert-success {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        color: white;
        box-shadow: 0 4px 15px rgba(76, 175, 80, 0.2);
    }
    
    .alert-info {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
        box-shadow: 0 4px 15px rgba(52, 152, 219, 0.2);
    }
    
    .alert-error {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
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
    
    @media (max-width: 768px) {
        .contact-form-container {
            margin: 20px;
            padding: 2rem;
        }
        
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .hero-content h1 {
            font-size: 2.2rem;
        }
        
        .hero-section {
            padding: 40px 20px 30px;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div class="hero-content">
        <h1>🩺 Join Our Professional Vet Team</h1>
        <p>Expand your veterinary practice and connect with pet owners who need your expertise</p>
    </div>
</div>

<div style="padding: 40px 20px;">
    <div class="contact-form-container">
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif
        
        @if(session('info'))
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> {{ session('info') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif
        
        @if(isset($existingApplication))
            @if($existingApplication->isPending())
                <div class="status-container">
                    <div class="status-icon status-pending">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h2 class="status-title status-pending">Application Under Review</h2>
                    <p class="status-message">
                        Your veterinary application is currently being reviewed by our team. 
                        We will notify you once the review process is complete.
                    </p>
                    <div class="status-details">
                        <h3>Application Details</h3>
                        <div class="status-detail-item">
                            <strong>Name:</strong>
                            <span>{{ $existingApplication->name }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Email:</strong>
                            <span>{{ $existingApplication->user_email }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Specialization:</strong>
                            <span>{{ ucfirst(str_replace('_', ' ', $existingApplication->role)) }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Experience:</strong>
                            <span>{{ $existingApplication->experience }} years</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Status:</strong>
                            <span class="status-pending" style="font-weight: 600;">Pending Review</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Submitted:</strong>
                            <span>{{ $existingApplication->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('vet.dashboard') }}" class="btn-dashboard">
                        <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                    </a>
                </div>
            @elseif($existingApplication->isApproved())
                <div class="status-container">
                    <div class="status-icon status-approved">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="status-title status-approved">Welcome to Our Vet Network!</h2>
                    <p class="status-message">
                        Congratulations! You are already an approved veterinarian in our network. 
                        You can access your dashboard to manage appointments and view your profile.
                    </p>
                    <div class="status-details">
                        <h3>Your Profile</h3>
                        <div class="status-detail-item">
                            <strong>Name:</strong>
                            <span>{{ $existingApplication->name }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Email:</strong>
                            <span>{{ $existingApplication->user_email }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Specialization:</strong>
                            <span>{{ ucfirst(str_replace('_', ' ', $existingApplication->role)) }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Experience:</strong>
                            <span>{{ $existingApplication->experience }} years</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Status:</strong>
                            <span class="status-approved" style="font-weight: 600;">Active</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Approved:</strong>
                            <span>{{ $existingApplication->updated_at->format('M d, Y h:i A') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('vet.dashboard') }}" class="btn-dashboard">
                        <i class="fas fa-tachometer-alt"></i> Access Dashboard
                    </a>
                </div>
            @elseif($existingApplication->isRejected())
                <div class="status-container">
                    <div class="status-icon status-rejected">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <h2 class="status-title status-rejected">Application Not Approved</h2>
                    <p class="status-message">
                        Unfortunately, your veterinary application was not approved. 
                        Please contact our support team for more information or to discuss reapplying.
                    </p>
                    <div class="status-details">
                        <h3>Application Details</h3>
                        <div class="status-detail-item">
                            <strong>Name:</strong>
                            <span>{{ $existingApplication->name }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Email:</strong>
                            <span>{{ $existingApplication->user_email }}</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Status:</strong>
                            <span class="status-rejected" style="font-weight: 600;">Not Approved</span>
                        </div>
                        <div class="status-detail-item">
                            <strong>Date:</strong>
                            <span>{{ $existingApplication->updated_at->format('M d, Y h:i A') }}</span>
                        </div>
                    </div>
                    <a href="{{ route('vet.contact') }}" class="btn-dashboard">
                        <i class="fas fa-envelope"></i> Contact Support
                    </a>
                </div>
            @endif
        @else
            <h2>Application Form</h2>
            <form method="POST" action="{{ route('vet.join.submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" 
                               placeholder="Full Name *" 
                               value="{{ old('name', $userName ?? '') }}" 
                               readonly required>
                        <small style="color: #666; font-style: italic;">This is auto-filled based on your login credentials and cannot be changed</small>
                        @error('name')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number *" value="{{ old('phone') }}" required>
                        @error('phone')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Practice Location *" value="{{ old('location') }}" required>
                    @error('location')
                        <small style="color: #ff6f61;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <select class="form-control form-select" id="role" name="role" required onchange="togglePriceFields()">
                            <option value="">Select Specialization *</option>
                            <option value="general_checkup" {{ old('role') == 'general_checkup' ? 'selected' : '' }}>General Checkup</option>
                            <option value="surgery" {{ old('role') == 'surgery' ? 'selected' : '' }}>Surgery</option>
                            <option value="both" {{ old('role') == 'both' ? 'selected' : '' }}>Both</option>
                        </select>
                        @error('role')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="experience" name="experience" min="0" placeholder="Years of Experience *" value="{{ old('experience') }}" required>
                        @error('experience')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <!-- Price Fields -->
                <div class="form-row" id="price-fields">
                    <div class="form-group" id="general_price_group" style="display: none;">
                        <input type="number" class="form-control" id="general_price" name="general_price" min="0" step="0.01" placeholder="General Checkup Price (BDT)" value="{{ old('general_price') }}">
                        @error('general_price')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" id="surgery_price_group" style="display: none;">
                        <div style="display: flex; gap: 0.5rem;">
                            <input type="number" class="form-control" id="surgery_price_min" name="surgery_price_min" min="0" step="0.01" placeholder="Min Surgery Price (BDT)" value="{{ old('surgery_price_min') }}">
                            <input type="number" class="form-control" id="surgery_price_max" name="surgery_price_max" min="0" step="0.01" placeholder="Max Surgery Price (BDT)" value="{{ old('surgery_price_max') }}">
                        </div>
                        @error('surgery_price_min')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                        @error('surgery_price_max')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <!-- Visit Time Range -->
                <div class="form-group">
                    <h4 style="color: #ff6f61; margin-bottom: 1rem; font-size: 1.2rem; font-weight: 700;">📅 Availability Schedule</h4>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="visit_start_time" style="color: #666; font-weight: 600; margin-bottom: 0.5rem; display: block;">Start Time *</label>
                            <input type="time" class="form-control" id="visit_start_time" name="visit_start_time" value="{{ old('visit_start_time') }}" required>
                            @error('visit_start_time')
                                <small style="color: #ff6f61;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="visit_end_time" style="color: #666; font-weight: 600; margin-bottom: 0.5rem; display: block;">End Time *</label>
                            <input type="time" class="form-control" id="visit_end_time" name="visit_end_time" value="{{ old('visit_end_time') }}" required>
                            @error('visit_end_time')
                                <small style="color: #ff6f61;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label style="color: #666; font-weight: 600; margin-bottom: 1rem; display: block;">Available Days *</label>
                        <div class="days-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); gap: 0.5rem;">
                            @php
                                $days = [
                                    'monday' => 'Monday',
                                    'tuesday' => 'Tuesday', 
                                    'wednesday' => 'Wednesday',
                                    'thursday' => 'Thursday',
                                    'friday' => 'Friday',
                                    'saturday' => 'Saturday',
                                    'sunday' => 'Sunday'
                                ];
                                $oldDays = old('available_days', []);
                            @endphp
                            
                            @foreach($days as $value => $label)
                                <label class="day-checkbox" style="display: flex; align-items: center; padding: 0.8rem; border: 2px solid #eee; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; background: #fff;">
                                    <input type="checkbox" name="available_days[]" value="{{ $value }}" 
                                           {{ in_array($value, $oldDays) ? 'checked' : '' }}
                                           style="margin-right: 0.5rem; transform: scale(1.2);">
                                    <span style="font-weight: 600; color: #666; font-size: 0.9rem;">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('available_days')
                            <small style="color: #ff6f61;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="file-input-container">
                        <input type="file" id="profile_image" name="profile_image" accept="image/*" required onchange="previewProfileImage(event)">
                        <label for="profile_image" class="file-input-label">
                            <i class="fas fa-camera"></i> Upload Professional Photo *
                        </label>
                    </div>
                    <div id="profileImagePreview" class="file-preview"></div>
                    @error('profile_image')
                        <small style="color: #ff6f61;">{{ $message }}</small>
                    @enderror
                </div>
                
                <button type="submit" class="btn-submit">
                    <i class="fas fa-paper-plane"></i> Submit Application
                </button>
            </form>
        @endif
    </div>
</div>

<script>
    function togglePriceFields() {
        const role = document.getElementById('role').value;
        const generalGroup = document.getElementById('general_price_group');
        const surgeryGroup = document.getElementById('surgery_price_group');
        
        // Hide all price fields initially
        generalGroup.style.display = 'none';
        surgeryGroup.style.display = 'none';
        
        // Show relevant price fields based on role
        if (role === 'general_checkup' || role === 'both') {
            generalGroup.style.display = 'block';
        }
        if (role === 'surgery' || role === 'both') {
            surgeryGroup.style.display = 'block';
        }
    }
    
    function previewProfileImage(event) {
        const preview = document.getElementById('profileImagePreview');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Profile Preview">`;
            };
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    }
    
    // Initialize price fields on page load
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('role')) {
            togglePriceFields();
            
            // Handle old form values for price fields
            const oldRole = '{{ old("role") }}';
            if (oldRole) {
                document.getElementById('role').value = oldRole;
                togglePriceFields();
            }
        }
    });
</script>
@endsection
