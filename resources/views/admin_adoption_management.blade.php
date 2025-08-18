
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Adoption Management | PETSROLOGY Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8fafc;
            color: #1a202c;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header Styles */
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }

        .admin-brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-logo {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: transform 0.3s ease;
        }

        .admin-logo:hover {
            transform: scale(1.05);
        }

        .brand-text h1 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .brand-text .subtitle {
            font-size: 0.875rem;
            opacity: 0.9;
            font-weight: 400;
        }

        .admin-nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateY(-1px);
        }

        .logout-btn {
            background: rgba(239, 68, 68, 0.9);
            color: white;
            border: none;
            padding: 0.625rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            backdrop-filter: blur(10px);
        }

        .logout-btn:hover {
            background: rgba(220, 38, 38, 0.9);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* Main Container */
        .admin-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        /* Page Header */
        .page-header {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .page-title {
            font-size: 2.25rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1.125rem;
            font-weight: 400;
        }

        /* Alerts */
        .alert {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #065f46;
        }

        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #991b1b;
        }

        .alert-icon {
            font-size: 1.25rem;
            margin-top: 0.125rem;
        }

        /* Tab Navigation */
        .tab-navigation {
            background: white;
            border-radius: 16px;
            padding: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .tab-list {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .tab-button {
            background: transparent;
            border: 2px solid #e5e7eb;
            color: #6b7280;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-width: 120px;
            justify-content: center;
        }

        .tab-button:hover {
            border-color: #d1d5db;
            background: #f9fafb;
            transform: translateY(-1px);
        }

        .tab-button.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-color: #667eea;
            color: white;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .tab-icon {
            font-size: 1rem;
        }

        /* Tab Content */
        .tab-content {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            min-height: 500px;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        /* Form Styles */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: white;
            color: #1f2937;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            justify-content: center;
            min-width: 120px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(239, 68, 68, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        /* Search Section */
        .search-section {
            background: #f8fafc;
            border: 2px dashed #d1d5db;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .search-form {
            display: flex;
            gap: 1rem;
            max-width: 400px;
            margin: 0 auto;
            align-items: end;
        }

        .search-form .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .data-table th {
            background: #f8fafc;
            padding: 1rem 1.5rem;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            border-bottom: 1px solid #e5e7eb;
        }

        .data-table td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: top;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table tbody tr:hover {
            background: #f8fafc;
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.375rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .status-pending {
            background: rgba(251, 191, 36, 0.1);
            color: #92400e;
            border: 1px solid rgba(251, 191, 36, 0.2);
        }

        .status-confirmed {
            background: rgba(16, 185, 129, 0.1);
            color: #065f46;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .status-cancelled {
            background: rgba(239, 68, 68, 0.1);
            color: #991b1b;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .status-available {
            background: rgba(34, 197, 94, 0.1);
            color: #166534;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .status-adopted {
            background: rgba(168, 85, 247, 0.1);
            color: #581c87;
            border: 1px solid rgba(168, 85, 247, 0.2);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .action-btn:hover {
            transform: translateY(-1px);
        }

        /* Card Styles */
        .pet-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            margin-bottom: 1rem;
        }

        .pet-card-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .pet-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.25rem;
        }

        .pet-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .detail-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .detail-value {
            font-size: 0.875rem;
            color: #1f2937;
            font-weight: 500;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: #6b7280;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state-title {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-state-text {
            font-size: 0.875rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-container {
                padding: 1rem;
                flex-direction: column;
                gap: 1rem;
            }

            .admin-container {
                padding: 0 1rem;
            }

            .page-header {
                padding: 1.5rem;
            }

            .page-title {
                font-size: 1.875rem;
            }

            .tab-list {
                flex-direction: column;
            }

            .tab-button {
                min-width: auto;
                width: 100%;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .search-form {
                flex-direction: column;
                max-width: none;
            }

            .action-buttons {
                flex-direction: column;
            }

            .data-table {
                font-size: 0.75rem;
            }

            .data-table th,
            .data-table td {
                padding: 0.75rem;
            }
        }

        /* Loading State */
        .loading {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .loading::before {
            content: '';
            width: 16px;
            height: 16px;
            border: 2px solid #e5e7eb;
            border-top: 2px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Form Container */
        .form-container {
            background: #f8fafc;
            border-radius: 12px;
            padding: 2rem;
            border: 2px solid #e5e7eb;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="brand-text">
                    <h1>PETSROLOGY</h1>
                    <div class="subtitle">Admin Dashboard</div>
                </div>
            </div>
            <nav class="admin-nav">
                <a href="{{ url('/admin/adoption-management') }}" class="nav-link">
                    <i class="fas fa-heart"></i>
                    Adoptions
                </a>
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="#" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Container -->
    <div class="admin-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-heart" style="margin-right: 0.75rem; color: #ef4444;"></i>
                Adoption Management
            </h1>
            <p class="page-subtitle">Manage pet adoptions, requests, and track adoption status efficiently</p>
        </div>

        <!-- Alerts -->
        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle alert-icon"></i>
            <div>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-triangle alert-icon"></i>
            <div>
                <strong>Error!</strong> {{ session('error') }}
            </div>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-error">
            <i class="fas fa-exclamation-triangle alert-icon"></i>
            <div>
                <strong>Validation Errors:</strong>
                <ul style="margin: 0.5rem 0 0 0; padding-left: 1rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <!-- Tab Navigation -->
        <div class="tab-navigation">
            <div class="tab-list">
                <button class="tab-button active" data-tab="create" id="tab-create">
                    <i class="fas fa-plus tab-icon"></i>
                    Create Post
                </button>
                <button class="tab-button" data-tab="update" id="tab-update">
                    <i class="fas fa-edit tab-icon"></i>
                    Update Post
                </button>
                <button class="tab-button" data-tab="delete" id="tab-delete">
                    <i class="fas fa-trash tab-icon"></i>
                    Delete Post
                </button>
                <button class="tab-button" data-tab="requests" id="tab-requests">
                    <i class="fas fa-inbox tab-icon"></i>
                    Adoption Requests
                </button>
                <button class="tab-button" data-tab="showall" id="tab-showall">
                    <i class="fas fa-list tab-icon"></i>
                    All Pets
                </button>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            <!-- Create Post Tab -->
            <div class="tab-pane active" id="content-create">
                <form action="{{ route('admin.adoption.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="category" class="form-label">
                                <i class="fas fa-tag" style="margin-right: 0.5rem;"></i>
                                Category
                            </label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="">Select Category</option>
                                <option value="Dog">🐕 Dog</option>
                                <option value="Cat">🐱 Cat</option>
                                <option value="Bird">🐦 Bird</option>
                                <option value="Others">🐾 Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label">
                                <i class="fas fa-heading" style="margin-right: 0.5rem;"></i>
                                Title
                            </label>
                            <input type="text" class="form-control" id="title" name="title" 
                                   placeholder="Enter an attractive title" required>
                        </div>

                        <div class="form-group">
                            <label for="pet_name" class="form-label">
                                <i class="fas fa-paw" style="margin-right: 0.5rem;"></i>
                                Pet Name
                            </label>
                            <input type="text" class="form-control" id="pet_name" name="pet_name" 
                                   placeholder="Pet's name" required>
                        </div>

                        <div class="form-group">
                            <label for="breed" class="form-label">
                                <i class="fas fa-dna" style="margin-right: 0.5rem;"></i>
                                Breed
                            </label>
                            <input type="text" class="form-control" id="breed" name="breed" 
                                   placeholder="Pet breed">
                        </div>

                        <div class="form-group">
                            <label for="pet_age" class="form-label">
                                <i class="fas fa-birthday-cake" style="margin-right: 0.5rem;"></i>
                                Age (months)
                            </label>
                            <input type="number" class="form-control" id="pet_age" name="pet_age" 
                                   placeholder="Age in months" min="0" required>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="form-label">
                                <i class="fas fa-venus-mars" style="margin-right: 0.5rem;"></i>
                                Gender
                            </label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">♂️ Male</option>
                                <option value="Female">♀️ Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="weight" class="form-label">
                                <i class="fas fa-weight" style="margin-right: 0.5rem;"></i>
                                Weight
                            </label>
                            <input type="text" class="form-control" id="weight" name="weight" 
                                   placeholder="e.g., 5.5 kg">
                        </div>

                        <div class="form-group">
                            <label for="location" class="form-label">
                                <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem;"></i>
                                Location
                            </label>
                            <input type="text" class="form-control" id="location" name="location" 
                                   placeholder="Current location">
                        </div>

                        <div class="form-group">
                            <label for="fee" class="form-label">
                                <i class="fas fa-money-bill" style="margin-right: 0.5rem;"></i>
                                Adoption Fee
                            </label>
                            <input type="text" class="form-control" id="fee" name="fee" 
                                   placeholder="e.g., ৳5000 or Free">
                        </div>

                        <div class="form-group">
                            <label for="fee_includes" class="form-label">
                                <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                                Fee Includes
                            </label>
                            <input type="text" class="form-control" id="fee_includes" name="fee_includes" 
                                   placeholder="Vaccinations, Spay/Neuter, etc.">
                        </div>

                        <div class="form-group">
                            <label for="character" class="form-label">
                                <i class="fas fa-smile" style="margin-right: 0.5rem;"></i>
                                Character/Personality
                            </label>
                            <input type="text" class="form-control" id="character" name="character" 
                                   placeholder="Friendly, Playful, Calm, etc." required>
                        </div>

                        <div class="form-group">
                            <label for="tags" class="form-label">
                                <i class="fas fa-tags" style="margin-right: 0.5rem;"></i>
                                Tags <span style="font-weight: 400; color: #6b7280;">(comma separated)</span>
                            </label>
                            <input type="text" class="form-control" id="tags" name="tags" 
                                   placeholder="friendly, vaccinated, house-trained">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="health_info" class="form-label">
                            <i class="fas fa-heart-pulse" style="margin-right: 0.5rem;"></i>
                            Health Information <span style="font-weight: 400; color: #6b7280;">(separate with |)</span>
                        </label>
                        <input type="text" class="form-control" id="health_info" name="health_info" 
                               placeholder="Vaccinated | Dewormed | Health checked">
                    </div>

                    <div class="form-group">
                        <label for="special_care" class="form-label">
                            <i class="fas fa-hand-holding-heart" style="margin-right: 0.5rem;"></i>
                            Special Care Notes
                        </label>
                        <textarea class="form-control" id="special_care" name="special_care" rows="3" 
                                  placeholder="Any special care requirements or medical conditions"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">
                            <i class="fas fa-file-text" style="margin-right: 0.5rem;"></i>
                            Description
                        </label>
                        <textarea class="form-control" id="description" name="description" rows="4" 
                                  placeholder="Detailed description about the pet..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image" class="form-label">
                            <i class="fas fa-camera" style="margin-right: 0.5rem;"></i>
                            Pet Image
                        </label>
                        <input type="file" class="form-control" id="image" name="image" 
                               accept="image/*" onchange="previewImage(this)">
                        <div id="imagePreview" style="margin-top: 1rem;"></div>
                    </div>

                    <div style="margin-top: 2rem;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Create Adoption Post
                        </button>
                    </div>
                </form>
            </div>
            <!-- Update Post Tab -->
            <div class="tab-pane" id="content-update">
                <div class="search-section">
                    <h3 style="margin-bottom: 1rem; color: #374151;">
                        <i class="fas fa-search" style="margin-right: 0.5rem;"></i>
                        Find Pet to Update
                    </h3>
                    <p style="color: #6b7280; margin-bottom: 1.5rem;">
                        Enter the adoption post ID to search and update pet information
                    </p>
                    <div class="search-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="update_adoption_id" 
                                   placeholder="Enter Adoption Post ID" required>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="searchAdoptionPostById('update')">
                            <i class="fas fa-search"></i>
                            Search
                        </button>
                    </div>
                </div>
                <div id="updateFormContainer"></div>
            </div>

            <!-- Delete Post Tab -->
            <div class="tab-pane" id="content-delete">
                <div class="search-section">
                    <h3 style="margin-bottom: 1rem; color: #374151;">
                        <i class="fas fa-exclamation-triangle" style="margin-right: 0.5rem; color: #ef4444;"></i>
                        Find Pet to Delete
                    </h3>
                    <p style="color: #6b7280; margin-bottom: 1.5rem;">
                        <strong>Warning:</strong> This action cannot be undone. Enter the adoption post ID to delete.
                    </p>
                    <div class="search-form">
                        <div class="form-group">
                            <input type="text" class="form-control" id="delete_adoption_id" 
                                   placeholder="Enter Adoption Post ID" required>
                        </div>
                        <button type="button" class="btn btn-danger" onclick="searchAdoptionPostById('delete')">
                            <i class="fas fa-search"></i>
                            Search
                        </button>
                    </div>
                </div>
                <div id="deleteFormContainer"></div>
            </div>

            <!-- Adoption Requests Tab -->
            <div class="tab-pane" id="content-requests">
                <div style="margin-bottom: 2rem;">
                    <h3 style="margin-bottom: 0.5rem; color: #374151;">
                        <i class="fas fa-inbox" style="margin-right: 0.5rem; color: #667eea;"></i>
                        Adoption Requests Management
                    </h3>
                    <p style="color: #6b7280;">Manage and respond to adoption requests from potential pet parents</p>
                </div>

                @php $requests = \App\Models\AdoptionRequest::with('adoptionPost')->orderBy('created_at','desc')->get(); @endphp
                
                @if($requests->count() > 0)
                <!-- Filters -->
                <div style="background: #f8fafc; padding: 1rem; border-radius: 12px; margin-bottom: 1.5rem; border: 2px solid #e5e7eb;">
                    <div style="display: flex; gap: 1rem; align-items: end; flex-wrap: wrap;">
                        <div class="form-group" style="margin-bottom: 0; min-width: 200px;">
                            <label class="form-label" style="font-size: 0.75rem;">Filter by Status</label>
                            <select id="statusFilter" class="form-select" onchange="filterRequests()">
                                <option value="">All Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Confirmed</option>
                                <option value="2">Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group" style="margin-bottom: 0; min-width: 200px;">
                            <label class="form-label" style="font-size: 0.75rem;">Search Applicant</label>
                            <input type="text" id="searchApplicant" class="form-control" placeholder="Search by name or email" onkeyup="filterRequests()">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="clearFilters()" style="height: fit-content;">
                            <i class="fas fa-refresh"></i>
                            Clear Filters
                        </button>
                    </div>
                </div>

                <div style="overflow-x: auto;">
                    <table class="data-table" id="requestsTable">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Pet Name</th>
                                <th>Applicant</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $req)
                            <tr class="request-row" data-status="{{ $req->status }}" data-applicant="{{ strtolower($req->firstName . ' ' . $req->lastName . ' ' . $req->email) }}">
                                <td>
                                    <span style="font-weight: 600; color: #374151;">#{{ $req->id }}</span>
                                </td>
                                <td>
                                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                                        <div>
                                            <div style="font-weight: 600; color: #1f2937;">
                                                {{ optional($req->adoptionPost)->pet_name ?? 'N/A' }}
                                            </div>
                                            <div style="font-size: 0.75rem; color: #6b7280;">
                                                {{ optional($req->adoptionPost)->category ?? 'Unknown' }}
                                                @if($req->adoptionPost)
                                                • ID: #{{ $req->adoptionPost->id }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div style="font-weight: 500; color: #1f2937;">
                                        {{ $req->firstName }} {{ $req->lastName }}
                                    </div>
                                    <div style="font-size: 0.75rem; color: #6b7280;">
                                        {{ $req->email }}
                                    </div>
                                    @if($req->age)
                                    <div style="font-size: 0.75rem; color: #9ca3af;">
                                        Age: {{ $req->age }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <div style="font-size: 0.875rem;">
                                        <i class="fas fa-phone" style="margin-right: 0.25rem; color: #6b7280;"></i>
                                        {{ $req->phone }}
                                    </div>
                                    @if($req->address)
                                    <div style="font-size: 0.75rem; color: #6b7280; margin-top: 0.25rem;">
                                        <i class="fas fa-map-marker-alt" style="margin-right: 0.25rem;"></i>
                                        {{ $req->address }}, {{ $req->city }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    @if($req->status == 0)
                                        <span class="status-badge status-pending">
                                            <i class="fas fa-clock"></i>
                                            Pending
                                        </span>
                                    @elseif($req->status == 1)
                                        <span class="status-badge status-confirmed">
                                            <i class="fas fa-check"></i>
                                            Confirmed
                                        </span>
                                    @else
                                        <span class="status-badge status-cancelled">
                                            <i class="fas fa-times"></i>
                                            Cancelled
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div style="font-size: 0.875rem; color: #374151;">
                                        {{ $req->created_at->format('M j, Y') }}
                                    </div>
                                    <div style="font-size: 0.75rem; color: #6b7280;">
                                        {{ $req->created_at->format('h:i A') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        @if($req->status == 0)
                                            <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/confirm') }}" style="display: inline;" onsubmit="return confirmRequest(event, '{{ $req->firstName }} {{ $req->lastName }}', '{{ optional($req->adoptionPost)->pet_name }}')">
                                                @csrf
                                                <button type="submit" class="btn btn-success action-btn">
                                                    <i class="fas fa-check"></i>
                                                    Confirm
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/cancel') }}" style="display: inline;" onsubmit="return cancelRequest(event, '{{ $req->firstName }} {{ $req->lastName }}')">
                                                @csrf
                                                <button type="submit" class="btn btn-danger action-btn">
                                                    <i class="fas fa-times"></i>
                                                    Cancel
                                                </button>
                                            </form>
                                            <button type="button" class="btn" onclick="showRequestDetails({{ $req->id }})" style="background: #6366f1; color: white;">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </button>
                                        @elseif($req->status == 1)
                                            <button class="btn btn-success action-btn" disabled>
                                                <i class="fas fa-check"></i>
                                                Confirmed
                                            </button>
                                            <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/cancel') }}" style="display: inline;" onsubmit="return cancelRequest(event, '{{ $req->firstName }} {{ $req->lastName }}')">
                                                @csrf
                                                <button type="submit" class="btn btn-danger action-btn">
                                                    <i class="fas fa-times"></i>
                                                    Cancel
                                                </button>
                                            </form>
                                            <button type="button" class="btn" onclick="showRequestDetails({{ $req->id }})" style="background: #6366f1; color: white;">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </button>
                                        @else
                                            <button class="btn btn-danger action-btn" disabled>
                                                <i class="fas fa-times"></i>
                                                Cancelled
                                            </button>
                                            <button type="button" class="btn" onclick="showRequestDetails({{ $req->id }})" style="background: #6366f1; color: white;">
                                                <i class="fas fa-eye"></i>
                                                View
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Request Details Modal Placeholder -->
                <div id="requestDetailsModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 10000;">
                    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border-radius: 12px; padding: 2rem; max-width: 600px; max-height: 80vh; overflow-y: auto; width: 90%;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <h3 style="margin: 0; color: #374151;">Request Details</h3>
                            <button onclick="closeRequestDetails()" style="background: none; border: none; font-size: 1.5rem; cursor: pointer; color: #6b7280;">×</button>
                        </div>
                        <div id="requestDetailsContent">
                            <!-- Content will be loaded here -->
                        </div>
                    </div>
                </div>

                @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <div class="empty-state-title">No Adoption Requests</div>
                    <div class="empty-state-text">There are no adoption requests to display at the moment.</div>
                </div>
                @endif
            </div>

            <!-- Show All Pets Tab -->
            <div class="tab-pane" id="content-showall">
                <div style="margin-bottom: 2rem;">
                    <h3 style="margin-bottom: 0.5rem; color: #374151;">
                        <i class="fas fa-list" style="margin-right: 0.5rem; color: #667eea;"></i>
                        All Pets Available for Adoption
                    </h3>
                    <p style="color: #6b7280;">Overview of all pets in the adoption system</p>
                </div>

                @if($adoptionPosts->count() > 0)
                <div style="display: grid; gap: 1.5rem;">
                    @foreach($adoptionPosts as $post)
                    <div class="pet-card">
                        <div class="pet-card-header">
                            <div>
                                <div class="pet-name">{{ $post->pet_name }}</div>
                                <div style="color: #6b7280; font-size: 0.875rem;">
                                    ID: #{{ $post->id }} • {{ $post->category }}
                                </div>
                            </div>
                            <div>
                                @if(isset($post->status))
                                    @if($post->status === 'adopted')
                                        <span class="status-badge status-adopted">
                                            <i class="fas fa-heart"></i>
                                            Adopted
                                        </span>
                                    @elseif($post->status === 'active')
                                        <span class="status-badge status-available">
                                            <i class="fas fa-heart"></i>
                                            Available
                                        </span>
                                    @else
                                        <span class="status-badge">{{ ucfirst($post->status) }}</span>
                                    @endif
                                @else
                                    <span class="status-badge status-available">
                                        <i class="fas fa-heart"></i>
                                        Available
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="pet-details">
                            <div class="detail-item">
                                <div class="detail-label">Age</div>
                                <div class="detail-value">{{ $post->pet_age }} months</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Gender</div>
                                <div class="detail-value">
                                    {{ $post->gender === 'Male' ? '♂️' : '♀️' }} {{ $post->gender }}
                                </div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Breed</div>
                                <div class="detail-value">{{ $post->breed ?: 'Mixed' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Location</div>
                                <div class="detail-value">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 0.25rem; color: #ef4444;"></i>
                                    {{ $post->location ?: 'Not specified' }}
                                </div>
                            </div>
                            @if($post->fee)
                            <div class="detail-item">
                                <div class="detail-label">Adoption Fee</div>
                                <div class="detail-value">{{ $post->fee }}</div>
                            </div>
                            @endif
                            <div class="detail-item">
                                <div class="detail-label">Added</div>
                                <div class="detail-value">{{ $post->created_at->format('M j, Y') }}</div>
                            </div>
                        </div>
                        
                        @if($post->character)
                        <div style="margin-top: 1rem; padding: 0.75rem; background: #f8fafc; border-radius: 8px; border-left: 4px solid #667eea;">
                            <div class="detail-label" style="margin-bottom: 0.25rem;">Personality</div>
                            <div style="font-size: 0.875rem; color: #374151;">{{ $post->character }}</div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-paw"></i>
                    </div>
                    <div class="empty-state-title">No Pets Available</div>
                    <div class="empty-state-text">There are no pets in the adoption system yet. Create your first adoption post!</div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabPanes = document.querySelectorAll('.tab-pane');

            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    
                    // Remove active class from all buttons and panes
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabPanes.forEach(pane => pane.classList.remove('active'));
                    
                    // Add active class to clicked button and corresponding pane
                    this.classList.add('active');
                    document.getElementById('content-' + tabId).classList.add('active');
                });
            });
        });

        // Image preview function
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div style="position: relative; display: inline-block;">
                            <img src="${e.target.result}" alt="Preview" 
                                 style="max-width: 200px; max-height: 200px; border-radius: 12px; 
                                        box-shadow: 0 4px 12px rgba(0,0,0,0.1); object-fit: cover;">
                            <button type="button" onclick="clearImagePreview()" 
                                    style="position: absolute; top: -8px; right: -8px; 
                                           background: #ef4444; color: white; border: none; 
                                           border-radius: 50%; width: 24px; height: 24px; 
                                           font-size: 12px; cursor: pointer;">×</button>
                        </div>
                    `;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearImagePreview() {
            document.getElementById('imagePreview').innerHTML = '';
            document.getElementById('image').value = '';
        }

        // Search and form rendering functions
        function searchAdoptionPostById(type) {
            const adoptionId = document.getElementById(type + '_adoption_id').value.trim();
            if (!adoptionId) {
                showAlert('Please enter an adoption post ID', 'error');
                return;
            }

            // Show loading state
            const container = document.getElementById(type + 'FormContainer');
            container.innerHTML = `
                <div style="text-align: center; padding: 2rem; color: #6b7280;">
                    <div class="loading">Searching for post...</div>
                </div>
            `;

            fetch(\`/admin/adoption-management/search-by-id/\${adoptionId}\`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data && data.id) {
                        if (type === 'update') {
                            renderUpdateForm(data);
                        } else {
                            renderDeleteForm(data);
                        }
                    } else {
                        container.innerHTML = \`
                            <div class="empty-state">
                                <div class="empty-state-icon">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="empty-state-title">No Pet Found</div>
                                <div class="empty-state-text">
                                    No adoption post found with ID: <strong>\${adoptionId}</strong>
                                </div>
                            </div>
                        \`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    container.innerHTML = \`
                        <div class="alert alert-error">
                            <i class="fas fa-exclamation-triangle alert-icon"></i>
                            <div>
                                <strong>Error!</strong> Unable to search for adoption post. Please try again.
                            </div>
                        </div>
                    \`;
                });
        }

        function renderUpdateForm(post) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            document.getElementById('updateFormContainer').innerHTML = `
                <div class="form-container">
                    <h4 style="margin-bottom: 1.5rem; color: #374151; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-edit" style="color: #667eea;"></i>
                        Update Pet Information
                    </h4>
                    
                    <form action="/admin/adoption-management/update/${post.id}" method="POST" enctype="multipart/form-data">
                        <input type='hidden' name='_token' value='${csrfToken}'>
                        
                        <div class="form-grid">
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-tag" style="margin-right: 0.5rem;"></i>
                                    Category
                                </label>
                                <select class='form-select' name='category' required>
                                    <option value='Dog' ${post.category==='Dog'?'selected':''}>🐕 Dog</option>
                                    <option value='Cat' ${post.category==='Cat'?'selected':''}>🐱 Cat</option>
                                    <option value='Bird' ${post.category==='Bird'?'selected':''}>🐦 Bird</option>
                                    <option value='Others' ${post.category==='Others'?'selected':''}>🐾 Others</option>
                                </select>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-heading" style="margin-right: 0.5rem;"></i>
                                    Title
                                </label>
                                <input type='text' class='form-control' name='title' value='${post.title || ''}' required>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-paw" style="margin-right: 0.5rem;"></i>
                                    Pet Name
                                </label>
                                <input type='text' class='form-control' name='pet_name' value='${post.pet_name || ''}' required>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-dna" style="margin-right: 0.5rem;"></i>
                                    Breed
                                </label>
                                <input type='text' class='form-control' name='breed' value='${post.breed || ''}'>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-birthday-cake" style="margin-right: 0.5rem;"></i>
                                    Age (months)
                                </label>
                                <input type='number' class='form-control' name='pet_age' value='${post.pet_age || ''}' min="0" required>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-venus-mars" style="margin-right: 0.5rem;"></i>
                                    Gender
                                </label>
                                <select class='form-select' name='gender' required>
                                    <option value='Male' ${post.gender==='Male'?'selected':''}>♂️ Male</option>
                                    <option value='Female' ${post.gender==='Female'?'selected':''}>♀️ Female</option>
                                </select>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-smile" style="margin-right: 0.5rem;"></i>
                                    Character/Personality
                                </label>
                                <input type='text' class='form-control' name='character' value='${post.character || ''}' required>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-weight" style="margin-right: 0.5rem;"></i>
                                    Weight
                                </label>
                                <input type='text' class='form-control' name='weight' value='${post.weight || ''}'>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem;"></i>
                                    Location
                                </label>
                                <input type='text' class='form-control' name='location' value='${post.location || ''}'>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-money-bill" style="margin-right: 0.5rem;"></i>
                                    Adoption Fee
                                </label>
                                <input type='text' class='form-control' name='fee' value='${post.fee || ''}'>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-check-circle" style="margin-right: 0.5rem;"></i>
                                    Fee Includes
                                </label>
                                <input type='text' class='form-control' name='fee_includes' value='${post.fee_includes || ''}'>
                            </div>
                            
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-tags" style="margin-right: 0.5rem;"></i>
                                    Tags
                                </label>
                                <input type='text' class='form-control' name='tags' value='${post.tags || ''}' placeholder="comma separated">
                            </div>
                        </div>
                        
                        <div class='form-group'>
                            <label class='form-label'>
                                <i class="fas fa-heart-pulse" style="margin-right: 0.5rem;"></i>
                                Health Information
                            </label>
                            <input type='text' class='form-control' name='health_info' value='${post.health_info || ''}' placeholder="separate with |">
                        </div>
                        
                        <div class='form-group'>
                            <label class='form-label'>
                                <i class="fas fa-hand-holding-heart" style="margin-right: 0.5rem;"></i>
                                Special Care Notes
                            </label>
                            <textarea class='form-control' name='special_care' rows='3'>${post.special_care || ''}</textarea>
                        </div>
                        
                        <div class='form-group'>
                            <label class='form-label'>
                                <i class="fas fa-file-text" style="margin-right: 0.5rem;"></i>
                                Description
                            </label>
                            <textarea class='form-control' name='description' rows='4' required>${post.description || ''}</textarea>
                        </div>
                        
                        <div class='form-group'>
                            <label class='form-label'>
                                <i class="fas fa-camera" style="margin-right: 0.5rem;"></i>
                                Update Image (optional)
                            </label>
                            <input type='file' class='form-control' name='image' accept="image/*" onchange="previewUpdateImage(this)">
                            <small style="color: #6b7280; font-size: 0.75rem;">Leave empty to keep current image</small>
                            <div id="updateImagePreview" style="margin-top: 1rem;"></div>
                        </div>
                        
                        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
                            <button type='submit' class='btn btn-primary'>
                                <i class="fas fa-save"></i>
                                Update Pet Information
                            </button>
                            <button type="button" class="btn" onclick="document.getElementById('updateFormContainer').innerHTML = ''" 
                                    style="background: #6b7280; color: white;">
                                <i class="fas fa-times"></i>
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            `;
        }

        function renderDeleteForm(post) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            document.getElementById('deleteFormContainer').innerHTML = `
                <div class="form-container" style="border-color: #fecaca; background: #fef2f2;">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1.5rem; 
                                padding: 1rem; background: white; border-radius: 8px; border-left: 4px solid #ef4444;">
                        <i class="fas fa-exclamation-triangle" style="color: #ef4444; font-size: 2rem;"></i>
                        <div>
                            <h4 style="color: #991b1b; margin: 0 0 0.25rem 0;">Confirm Deletion</h4>
                            <p style="color: #7f1d1d; margin: 0; font-size: 0.875rem;">
                                This action cannot be undone. The pet and all related data will be permanently removed.
                            </p>
                        </div>
                    </div>
                    
                    <div class="pet-card" style="margin-bottom: 1.5rem;">
                        <div class="pet-card-header">
                            <div>
                                <div class="pet-name">${post.pet_name || 'Unknown'}</div>
                                <div style="color: #6b7280; font-size: 0.875rem;">
                                    ID: #${post.id} • ${post.category || 'Unknown'} • ${post.title || 'No title'}
                                </div>
                            </div>
                        </div>
                        <div class="pet-details">
                            <div class="detail-item">
                                <div class="detail-label">Age</div>
                                <div class="detail-value">${post.pet_age || 'Unknown'} months</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Gender</div>
                                <div class="detail-value">${post.gender || 'Unknown'}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Breed</div>
                                <div class="detail-value">${post.breed || 'Not specified'}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Location</div>
                                <div class="detail-value">${post.location || 'Not specified'}</div>
                            </div>
                            ${post.fee ? `
                            <div class="detail-item">
                                <div class="detail-label">Fee</div>
                                <div class="detail-value">${post.fee}</div>
                            </div>
                            ` : ''}
                            <div class="detail-item">
                                <div class="detail-label">Added</div>
                                <div class="detail-value">${new Date(post.created_at).toLocaleDateString()}</div>
                            </div>
                        </div>
                        
                        ${post.description ? `
                        <div style="margin-top: 1rem; padding: 0.75rem; background: white; border-radius: 8px;">
                            <div class="detail-label" style="margin-bottom: 0.25rem;">Description</div>
                            <div style="font-size: 0.875rem; color: #374151;">${post.description}</div>
                        </div>
                        ` : ''}
                    </div>
                    
                    <form action="/admin/adoption-management/delete/${post.id}" method="POST">
                        <input type='hidden' name='_token' value='${csrfToken}'>
                        <div style="display: flex; gap: 1rem; justify-content: center;">
                            <button type="button" class="btn" onclick="document.getElementById('deleteFormContainer').innerHTML = ''" 
                                    style="background: #6b7280; color: white;">
                                <i class="fas fa-times"></i>
                                Cancel
                            </button>
                            <button type='submit' class='btn btn-danger' 
                                    onclick="return confirm('⚠️ FINAL CONFIRMATION\\n\\nAre you absolutely sure you want to delete this pet?\\n\\nPet: ${post.pet_name}\\nID: #${post.id}\\n\\nThis action CANNOT be undone!')">
                                <i class="fas fa-trash"></i>
                                Delete Permanently
                            </button>
                        </div>
                    </form>
                </div>
            `;
        }

        // Image preview functions
        function previewUpdateImage(input) {
            const preview = document.getElementById('updateImagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <div style="position: relative; display: inline-block;">
                            <img src="${e.target.result}" alt="Preview" 
                                 style="max-width: 150px; max-height: 150px; border-radius: 8px; 
                                        box-shadow: 0 2px 8px rgba(0,0,0,0.1); object-fit: cover;">
                            <button type="button" onclick="clearUpdateImagePreview()" 
                                    style="position: absolute; top: -8px; right: -8px; 
                                           background: #ef4444; color: white; border: none; 
                                           border-radius: 50%; width: 20px; height: 20px; 
                                           font-size: 10px; cursor: pointer;">×</button>
                        </div>
                    `;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearUpdateImagePreview() {
            document.getElementById('updateImagePreview').innerHTML = '';
            document.querySelector('input[name="image"]').value = '';
        }

        function showAlert(message, type) {
            const alertClass = type === 'error' ? 'alert-error' : 'alert-success';
            const icon = type === 'error' ? 'exclamation-triangle' : 'check-circle';
            
            const alert = document.createElement('div');
            alert.className = \`alert \${alertClass}\`;
            alert.innerHTML = \`
                <i class="fas fa-\${icon} alert-icon"></i>
                <div>\${message}</div>
            \`;
            
            document.querySelector('.admin-container').insertBefore(alert, document.querySelector('.tab-navigation'));
            
            setTimeout(() => {
                alert.remove();
            }, 5000);
        }
    </script>
</body>
</html>
