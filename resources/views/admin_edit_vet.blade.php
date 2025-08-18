<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Vet | PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Nunito', sans-serif;
        }
        
        .admin-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        }
        
        .header-container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        
        .admin-brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .admin-logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.3);
        }
        
        .brand-text h1 {
            font-size: 1.7rem;
            font-weight: 800;
            margin: 0;
        }
        
        .back-btn {
            background: linear-gradient(135deg, #95a5a6, #7f8c8d);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(149, 165, 166, 0.3);
        }
        
        .back-btn:hover {
            background: linear-gradient(135deg, #7f8c8d, #95a5a6);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
        }
        
        .hero-section {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 4px 20px rgba(243, 156, 18, 0.2);
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
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            line-height: 1.6;
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
            color: #2c3e50;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
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
            border-color: #f39c12;
            outline: none;
            box-shadow: 0 0 0 3px rgba(243, 156, 18, 0.1);
            transform: translateY(-2px);
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
            border: 2px dashed #f39c12;
            border-radius: 8px;
            background: rgba(243, 156, 18, 0.05);
            color: #f39c12;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
        }
        
        .file-input-label:hover {
            background: rgba(243, 156, 18, 0.1);
            border-color: #e67e22;
        }
        
        .file-preview {
            margin-top: 1rem;
            text-align: center;
        }
        
        .file-preview img, .current-image img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #f39c12;
            object-fit: cover;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.2);
        }
        
        .current-image {
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .current-image p {
            color: #666;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .day-checkbox {
            position: relative;
            overflow: hidden;
        }
        
        .day-checkbox:hover {
            border-color: #f39c12 !important;
            background: rgba(243, 156, 18, 0.05) !important;
        }
        
        .day-checkbox input[type="checkbox"]:checked + span {
            color: #f39c12 !important;
        }
        
        .day-checkbox:has(input:checked) {
            border-color: #f39c12 !important;
            background: rgba(243, 156, 18, 0.1) !important;
        }
        
        .day-checkbox input[type="checkbox"] {
            accent-color: #f39c12;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #f39c12, #e67e22);
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
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.3);
            margin-top: 1rem;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(243, 156, 18, 0.4);
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
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.2);
        }
        
        .vet-info-card {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            text-align: center;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.2);
        }
        
        .vet-info-card h3 {
            margin: 0 0 0.5rem 0;
            font-size: 1.5rem;
        }
        
        .vet-info-card .status-badge {
            display: inline-block;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }
        
        .status-approved { background: rgba(255,255,255,0.2); }
        .status-pending { background: rgba(255,193,7,0.8); color: #333; }
        .status-rejected { background: rgba(220,53,69,0.8); }
        
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
</head>
<body>
    <!-- Admin Header -->
    <div class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="brand-text">
                    <h1>Edit Vet</h1>
                </div>
            </div>
            <div class="admin-nav">
                <a href="{{ route('admin.vet.management') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Back to Management
                </a>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-content">
            <h1>🩺 Edit Veterinarian</h1>
            <p>Update veterinarian information and settings</p>
        </div>
    </div>

    <div style="padding: 40px 20px;">
        <div class="contact-form-container">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- Current Vet Info Card -->
            <div class="vet-info-card">
                <h3>{{ $vet->name }}</h3>
                <p>{{ $vet->phone }} • {{ $vet->location }}</p>
                <div class="status-badge status-{{ $vet->status }}">
                    {{ ucfirst($vet->status) }}
                </div>
            </div>
            
            <h2>Update Information</h2>
            <form method="POST" action="{{ route('admin.vet.update', $vet->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name *" value="{{ old('name', $vet->name) }}" required>
                        @error('name')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number *" value="{{ old('phone', $vet->phone) }}" required>
                        @error('phone')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Practice Location *" value="{{ old('location', $vet->location) }}" required>
                    @error('location')
                        <small style="color: #e74c3c;">{{ $message }}</small>
                    @enderror
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <select class="form-control form-select" id="role" name="role" required onchange="togglePriceFields()">
                            <option value="">Select Specialization *</option>
                            <option value="general_checkup" {{ old('role', $vet->role) == 'general_checkup' ? 'selected' : '' }}>General Checkup</option>
                            <option value="surgery" {{ old('role', $vet->role) == 'surgery' ? 'selected' : '' }}>Surgery</option>
                            <option value="both" {{ old('role', $vet->role) == 'both' ? 'selected' : '' }}>Both</option>
                        </select>
                        @error('role')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" id="experience" name="experience" min="0" placeholder="Years of Experience *" value="{{ old('experience', $vet->experience) }}" required>
                        @error('experience')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <!-- Price Fields -->
                <div class="form-row" id="price-fields">
                    <div class="form-group" id="general_price_group" style="display: none;">
                        <input type="number" class="form-control" id="general_price" name="general_price" min="0" step="0.01" placeholder="General Checkup Price (BDT)" value="{{ old('general_price', $vet->general_price) }}">
                        @error('general_price')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" id="surgery_price_group" style="display: none;">
                        <div style="display: flex; gap: 0.5rem;">
                            <input type="number" class="form-control" id="surgery_price_min" name="surgery_price_min" min="0" step="0.01" placeholder="Min Surgery Price (BDT)" value="{{ old('surgery_price_min', $vet->surgery_price_min) }}">
                            <input type="number" class="form-control" id="surgery_price_max" name="surgery_price_max" min="0" step="0.01" placeholder="Max Surgery Price (BDT)" value="{{ old('surgery_price_max', $vet->surgery_price_max) }}">
                        </div>
                        @error('surgery_price_min')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                        @error('surgery_price_max')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <!-- Visit Time Range -->
                <div class="form-group">
                    <h4 style="color: #2c3e50; margin-bottom: 1rem; font-size: 1.2rem; font-weight: 700;">📅 Availability Schedule</h4>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="visit_start_time" style="color: #666; font-weight: 600; margin-bottom: 0.5rem; display: block;">Start Time *</label>
                            <input type="time" class="form-control" id="visit_start_time" name="visit_start_time" value="{{ old('visit_start_time', $vet->visit_start_time) }}" required>
                            @error('visit_start_time')
                                <small style="color: #e74c3c;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="visit_end_time" style="color: #666; font-weight: 600; margin-bottom: 0.5rem; display: block;">End Time *</label>
                            <input type="time" class="form-control" id="visit_end_time" name="visit_end_time" value="{{ old('visit_end_time', $vet->visit_end_time) }}" required>
                            @error('visit_end_time')
                                <small style="color: #e74c3c;">{{ $message }}</small>
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
                                // $vet->available_days is already an array due to model casting
                                $selectedDays = old('available_days', $vet->available_days ?? []);
                            @endphp
                            
                            @foreach($days as $value => $label)
                                <label class="day-checkbox" style="display: flex; align-items: center; padding: 0.8rem; border: 2px solid #eee; border-radius: 8px; cursor: pointer; transition: all 0.3s ease; background: #fff;">
                                    <input type="checkbox" name="available_days[]" value="{{ $value }}" 
                                           {{ in_array($value, $selectedDays) ? 'checked' : '' }}
                                           style="margin-right: 0.5rem; transform: scale(1.2);">
                                    <span style="font-weight: 600; color: #666; font-size: 0.9rem;">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('available_days')
                            <small style="color: #e74c3c;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <!-- Current Profile Image -->
                @if($vet->profile_image)
                <div class="form-group">
                    <div class="current-image">
                        <p>Current Profile Image:</p>
                        <img src="{{ $vet->getProfileImageUrl() }}" alt="Current Profile">
                    </div>
                </div>
                @endif
                
                <div class="form-group">
                    <div class="file-input-container">
                        <input type="file" id="profile_image" name="profile_image" accept="image/*" onchange="previewProfileImage(event)">
                        <label for="profile_image" class="file-input-label">
                            <i class="fas fa-camera"></i> Update Professional Photo
                        </label>
                    </div>
                    <div id="profileImagePreview" class="file-preview"></div>
                    @error('profile_image')
                        <small style="color: #e74c3c;">{{ $message }}</small>
                    @enderror
                </div>
                
                <!-- Status Update -->
                <div class="form-group">
                    <label style="color: #666; font-weight: 600; margin-bottom: 0.5rem; display: block;">Status</label>
                    <select class="form-control form-select" name="status">
                        <option value="approved" {{ old('status', $vet->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="pending" {{ old('status', $vet->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="rejected" {{ old('status', $vet->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                    @error('status')
                        <small style="color: #e74c3c;">{{ $message }}</small>
                    @enderror
                </div>
                
                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i> Update Veterinarian
                </button>
            </form>
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
            togglePriceFields();
        });
    </script>
</body>
</html>
