
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Adoption Management | PETSROLOGY Admin Dashboard</title>
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
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Enhanced Header */
        .admin-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 20px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            max-width: 1200px;
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
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .brand-text h1 {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 2px;
            background: linear-gradient(45deg, #fff, #ecf0f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-text p {
            font-size: 1rem;
            opacity: 0.9;
            margin: 0;
            font-weight: 500;
        }

        .admin-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-user {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 18px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }
        .nav-link {
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.25);
            transform: translateY(-1px);
        }

        .logout-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        /* Main Container */
        .admin-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9, #e74c3c, #f39c12);
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #2c3e50, #34495e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            color: #5a6c7d;
            font-size: 1.125rem;
            font-weight: 400;
            line-height: 1.6;
        }

        /* Alert Styles */
        .alert {
            padding: 1.25rem 1.5rem;
            border-radius: var(--border-radius-lg);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            font-weight: 500;
            backdrop-filter: blur(10px);
            border: 1px solid transparent;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.15) 100%);
            border-color: rgba(16, 185, 129, 0.2);
            color: #065f46;
        }

        .alert-error {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.15) 100%);
            border-color: rgba(239, 68, 68, 0.2);
            color: #991b1b;
        }

        .alert-icon {
            font-size: 1.25rem;
            margin-top: 0.125rem;
        }

        /* Enhanced Tab System */
        .admin-tabs {
            display: flex;
            gap: 8px;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            flex-wrap: wrap;
        }

        .admin-tab-btn {
            background: transparent;
            border: 2px solid transparent;
            color: #5a6c7d;
            padding: 15px 25px;
            border-radius: 15px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            outline: none;
            display: flex;
            align-items: center;
            gap: 8px;
            min-width: 140px;
            justify-content: center;
            position: relative;
            font-family: 'Nunito', sans-serif;
        }

        .admin-tab-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 15px;
            padding: 2px;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .admin-tab-btn:hover {
            background: rgba(52, 152, 219, 0.1);
            color: #2c3e50;
            transform: translateY(-2px);
            border-color: rgba(52, 152, 219, 0.3);
        }

        .admin-tab-btn.active {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
            transform: translateY(-2px);
        }

        .admin-tab-btn.active::before {
            opacity: 1;
        }

        .tab-icon {
            font-size: 1rem;
        }

        /* Enhanced Tab Content */
        .admin-tab-content {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            min-height: 600px;
            position: relative;
        }

        .admin-tab-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-xl) var(--border-radius-xl) 0 0;
        }
        /* Enhanced Form Styles */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #ecf0f1;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff;
            color: #2c3e50;
            font-family: 'Nunito', sans-serif;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
            transform: translateY(-1px);
        }

        .form-control::placeholder {
            color: #5a6c7d;
            opacity: 0.8;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        /* Enhanced Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 15px 25px;
            border: none;
            border-radius: 15px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            min-width: 140px;
            position: relative;
            overflow: hidden;
            font-family: 'Nunito', sans-serif;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
        }

        .btn-danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
            box-shadow: none !important;
        }

        /* Search Section */
        .search-section {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            border: 2px dashed var(--border-color);
            border-radius: var(--border-radius-lg);
            padding: 2.5rem;
            margin-bottom: 2rem;
            text-align: center;
            position: relative;
        }

        .search-section::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: var(--primary-gradient);
            border-radius: var(--border-radius-lg);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .search-section:hover::before {
            opacity: 0.05;
        }

        .search-form {
            display: flex;
            gap: 1rem;
            max-width: 450px;
            margin: 1.5rem auto 0;
            align-items: end;
        }

        .search-form .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        /* Enhanced Table Styles */
        .data-table-container {
            overflow-x: auto;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--border-color);
        }

        .data-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background: var(--bg-card);
            border-radius: var(--border-radius-lg);
        }

        .data-table th {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            padding: 1.25rem 1.5rem;
            text-align: left;
            font-weight: 700;
            color: var(--text-primary);
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--border-color);
            position: relative;
        }

        .data-table th:first-child {
            border-top-left-radius: var(--border-radius-lg);
        }

        .data-table th:last-child {
            border-top-right-radius: var(--border-radius-lg);
        }

        .data-table td {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: top;
            transition: background-color 0.2s ease;
        }

        .data-table tbody tr:hover {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .data-table tbody tr:last-child td:first-child {
            border-bottom-left-radius: var(--border-radius-lg);
        }

        .data-table tbody tr:last-child td:last-child {
            border-bottom-right-radius: var(--border-radius-lg);
        }

        /* Enhanced Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            padding: 0.5rem 0.875rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .status-pending {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(30, 64, 175, 0.15) 100%);
            color: #1e40af;
            border-color: rgba(59, 130, 246, 0.3);
        }

        .status-confirmed {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(5, 150, 105, 0.15) 100%);
            color: #065f46;
            border-color: rgba(16, 185, 129, 0.3);
        }

        .status-cancelled {
            background: linear-gradient(135deg, rgba(107, 114, 128, 0.15) 0%, rgba(75, 85, 99, 0.15) 100%);
            color: #374151;
            border-color: rgba(107, 114, 128, 0.3);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius-sm);
            font-size: 0.75rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            min-width: 80px;
        }

        .action-btn:hover {
            transform: translateY(-1px);
        }

        /* Enhanced Card Styles */
        .pet-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
            margin-bottom: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .pet-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            transform: scaleX(0);
            transition: transform 0.5s ease;
        }

        .pet-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .pet-card:hover::before {
            transform: scaleX(1);
        }

        .pet-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .pet-name {
            font-size: 1.5rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 8px;
            font-family: 'Nunito', sans-serif;
        }

        .pet-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 1.25rem;
            margin-top: 1.5rem;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.375rem;
        }

        .detail-label {
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .detail-value {
            font-size: 0.875rem;
            color: var(--text-primary);
            font-weight: 500;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-secondary);
        }

        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.4;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .empty-state-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-primary);
        }

        .empty-state-text {
            font-size: 0.875rem;
            line-height: 1.6;
        }

        /* Loading Animation */
        .loading {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--text-secondary);
        }

        .loading::before {
            content: '';
            width: 20px;
            height: 20px;
            border: 2px solid var(--border-color);
            border-top: 2px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
                padding: 2rem 1.5rem;
            }

            .page-title {
                font-size: 2rem;
            }

            .header-container {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .admin-nav {
                flex-direction: column;
                gap: 10px;
            }

            .admin-tabs {
                flex-direction: column;
                gap: 12px;
            }

            .admin-tab-btn {
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
                font-size: 0.85rem;
            }

            .data-table th,
            .data-table td {
                padding: 12px;
            }

            .pet-card {
                padding: 25px;
            }

            .admin-container {
                padding: 0 20px;
            }
        }

        /* Utility Classes */
        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <svg width="30" height="30" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                        <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <h1>PETSROLOGY</h1>
                    <p>Administrator Dashboard</p>
                </div>
            </div>
            <nav class="admin-nav">
                <div class="admin-user">
                    <i class="fas fa-user-shield"></i>
                    <span>{{ session('admin_email', 'Admin User') }}</span>
                </div>
                <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>
    <div class="admin-container">
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-heart"></i>
                Adoption Management
            </h1>
            <p class="page-subtitle">Manage pet adoption posts, requests, and monitor the adoption process</p>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle alert-icon"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-triangle alert-icon"></i>
            <span>{{ session('error') }}</span>
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-error">
            <i class="fas fa-exclamation-triangle alert-icon"></i>
            <div>
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="admin-tabs">
            <button class="admin-tab-btn active" onclick="showTab('create')" id="tab-create">
                <i class="fas fa-plus"></i>
                Create Post
            </button>
            <button class="admin-tab-btn" onclick="showTab('update')" id="tab-update">
                <i class="fas fa-edit"></i>
                Update Post
            </button>
            <button class="admin-tab-btn" onclick="showTab('delete')" id="tab-delete">
                <i class="fas fa-trash-alt"></i>
                Delete Post
            </button>
            <button class="admin-tab-btn" onclick="showTab('request')" id="tab-request">
                <i class="fas fa-inbox"></i>
                Adoption Requests
            </button>
            <button class="admin-tab-btn" onclick="showTab('showall')" id="tab-showall">
                <i class="fas fa-list"></i>
                Show All Pets
            </button>
        </div>
        <div class="admin-tab-content" id="tab-content-create">
            <form action="{{ route('admin.adoption.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="category" class="form-label">
                            <i class="fas fa-tags"></i>
                            Category
                        </label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Dog">Dog</option>
                            <option value="Cat">Cat</option>
                            <option value="Bird">Bird</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">
                            <i class="fas fa-heading"></i>
                            Title
                        </label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter pet title" required>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="breed" class="form-label">
                            <i class="fas fa-dna"></i>
                            Breed
                        </label>
                        <input type="text" class="form-control" id="breed" name="breed" placeholder="Enter breed">
                    </div>
                    <div class="form-group">
                        <label for="weight" class="form-label">
                            <i class="fas fa-weight"></i>
                            Weight
                        </label>
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="e.g., 2.5 kg">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="location" class="form-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Location
                    </label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                </div>
                
                <div class="form-group">
                    <label for="tags" class="form-label">
                        <i class="fas fa-hashtag"></i>
                        Tags
                        <span style="font-weight: 400; color: var(--text-secondary); font-size: 0.75rem;">(comma separated)</span>
                    </label>
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="friendly, vaccinated, house-trained">
                </div>
                
                <div class="form-group">
                    <label for="health_info" class="form-label">
                        <i class="fas fa-stethoscope"></i>
                        Health Info
                        <span style="font-weight: 400; color: var(--text-secondary); font-size: 0.75rem;">(separate items with |)</span>
                    </label>
                    <input type="text" class="form-control" id="health_info" name="health_info" placeholder="Vaccinated | Spayed/Neutered | Health checked">
                </div>
                
                <div class="form-group">
                    <label for="special_care" class="form-label">
                        <i class="fas fa-heart"></i>
                        Special Care Notes
                    </label>
                    <textarea class="form-control" id="special_care" name="special_care" rows="3" placeholder="Any special care requirements or notes"></textarea>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="fee" class="form-label">
                            <i class="fas fa-dollar-sign"></i>
                            Adoption Fee
                        </label>
                        <input type="text" class="form-control" id="fee" name="fee" placeholder="e.g., $50">
                    </div>
                    <div class="form-group">
                        <label for="fee_includes" class="form-label">
                            <i class="fas fa-list-check"></i>
                            Fee Includes
                        </label>
                        <input type="text" class="form-control" id="fee_includes" name="fee_includes" placeholder="Vaccinations, microchip, etc.">
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="pet_name" class="form-label">
                            <i class="fas fa-paw"></i>
                            Pet Name
                        </label>
                        <input type="text" class="form-control" id="pet_name" name="pet_name" placeholder="Enter pet's name" required>
                    </div>
                    <div class="form-group">
                        <label for="pet_age" class="form-label">
                            <i class="fas fa-birthday-cake"></i>
                            Pet Age
                        </label>
                        <input type="number" class="form-control" id="pet_age" name="pet_age" placeholder="Age in years" min="0" max="25" required>
                    </div>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="gender" class="form-label">
                            <i class="fas fa-venus-mars"></i>
                            Gender
                        </label>
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="character" class="form-label">
                            <i class="fas fa-smile"></i>
                            Character/Personality
                        </label>
                        <input type="text" class="form-control" id="character" name="character" placeholder="Friendly, energetic, calm, etc." required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description" class="form-label">
                        <i class="fas fa-align-left"></i>
                        Description
                    </label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Provide a detailed description of the pet" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="image" class="form-label">
                        <i class="fas fa-image"></i>
                        Pet Image
                    </label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.5rem; display: block;">
                        Supported formats: JPG, PNG, WebP (Max: 5MB)
                    </small>
                </div>
                <div class="form-group" style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Create Adoption Post
                    </button>
                </div>
            </form>
        </div>
        <div class="admin-tab-content" id="tab-content-update" style="display:none;">
            <div class="search-section">
                <h3 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.25rem; font-weight: 700;">
                    <i class="fas fa-search"></i>
                    Find Pet to Update
                </h3>
                <p style="color: var(--text-secondary); margin-bottom: 0;">Enter the adoption post ID to search and update pet information</p>
                <form method="GET" action="" id="searchUpdateForm" class="search-form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="update_adoption_id" id="update_adoption_id" placeholder="Enter Adoption Post ID" required>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="searchAdoptionPostById('update')">
                        <i class="fas fa-search"></i>
                        Search
                    </button>
                </form>
            </div>
            <div id="updateFormContainer"></div>
        </div>
        
        <div class="admin-tab-content" id="tab-content-delete" style="display:none;">
            <div class="search-section">
                <h3 style="color: var(--text-primary); margin-bottom: 1rem; font-size: 1.25rem; font-weight: 700;">
                    <i class="fas fa-exclamation-triangle" style="color: #ef4444;"></i>
                    Find Pet to Delete
                </h3>
                <p style="color: var(--text-secondary); margin-bottom: 0;">Enter the adoption post ID to search and permanently delete pet information</p>
                <form method="GET" action="" id="searchDeleteForm" class="search-form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="delete_adoption_id" id="delete_adoption_id" placeholder="Enter Adoption Post ID" required>
                    </div>
                    <button type="button" class="btn btn-danger" onclick="searchAdoptionPostById('delete')">
                        <i class="fas fa-search"></i>
                        Search
                    </button>
                </form>
            </div>
            <div id="deleteFormContainer"></div>
        </div>
        <div class="admin-tab-content" id="tab-content-request" style="display:none;">
            <div class="page-header" style="margin-bottom: 2rem;">
                <h2 style="color: var(--text-primary); margin-bottom: 0.75rem; font-size: 1.75rem; font-weight: 700; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-inbox"></i>
                    Adoption Requests
                </h2>
                <p style="color: var(--text-secondary); font-size: 1rem; margin: 0;">Review and manage incoming adoption requests from potential pet owners</p>
            </div>
            <div class="data-table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-paw"></i> Pet</th>
                            <th><i class="fas fa-envelope"></i> User Email</th>
                            <th><i class="fas fa-user"></i> Name</th>
                            <th><i class="fas fa-phone"></i> Phone</th>
                            <th><i class="fas fa-flag"></i> Status</th>
                            <th><i class="fas fa-cogs"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($adoptionRequests as $req)
                        <tr>
                            <td><strong>{{ $req->id }}</strong></td>
                            <td>{{ optional($req->adoptionPost)->pet_name ?? '-' }}</td>
                            <td>{{ $req->email }}</td>
                            <td>{{ $req->firstName }} {{ $req->lastName }}</td>
                            <td>{{ $req->phone }}</td>
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
                                <div class="action-buttons">
                                    @if($req->status == 0)
                                        <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/confirm') }}" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="action-btn btn-success">
                                                <i class="fas fa-check"></i>
                                                Confirm
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/cancel') }}" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="action-btn btn-danger">
                                                <i class="fas fa-times"></i>
                                                Cancel
                                            </button>
                                        </form>
                                    @elseif($req->status == 1)
                                        <button class="action-btn btn-success" disabled>
                                            <i class="fas fa-check"></i>
                                            Confirmed
                                        </button>
                                        <form method="POST" action="{{ url('/admin/adoption-request/'.$req->id.'/cancel') }}" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="action-btn btn-danger">
                                                <i class="fas fa-times"></i>
                                                Cancel
                                            </button>
                                        </form>
                                    @else
                                        <button class="action-btn btn-danger" disabled>
                                            <i class="fas fa-times"></i>
                                            Cancelled
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-inbox"></i>
                                    </div>
                                    <div class="empty-state-title">No Adoption Requests</div>
                                    <div class="empty-state-text">There are currently no adoption requests to review.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            </table>
            </div>
        </div>
        <div class="admin-tab-content" id="tab-content-showall" style="display:none;">
            <div class="page-header" style="margin-bottom: 2rem;">
                <h2 style="color: var(--text-primary); margin-bottom: 0.75rem; font-size: 1.75rem; font-weight: 700; display: flex; align-items: center; gap: 0.75rem;">
                    <i class="fas fa-list"></i>
                    All Available Pets
                </h2>
                <p style="color: var(--text-secondary); font-size: 1rem; margin: 0;">Complete overview of all pets available for adoption</p>
            </div>
            
            <div class="data-table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag"></i> ID</th>
                            <th><i class="fas fa-paw"></i> Name</th>
                            <th><i class="fas fa-birthday-cake"></i> Age</th>
                            <th><i class="fas fa-map-marker-alt"></i> Location</th>
                            <th><i class="fas fa-venus-mars"></i> Gender</th>
                            <th><i class="fas fa-tags"></i> Category</th>
                            <th><i class="fas fa-flag"></i> Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($adoptionPosts as $post)
                        <tr>
                            <td><strong>{{ $post->id }}</strong></td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                    <i class="fas fa-heart" style="color: #667eea; font-size: 0.75rem;"></i>
                                    {{ $post->pet_name }}
                                </div>
                            </td>
                            <td>{{ $post->pet_age }} years</td>
                            <td>{{ $post->location ?: '-' }}</td>
                            <td>
                                <i class="fas fa-{{ $post->gender === 'Male' ? 'mars' : 'venus' }}" 
                                   style="color: {{ $post->gender === 'Male' ? '#3b82f6' : '#ec4899' }}; margin-right: 0.25rem;"></i>
                                {{ $post->gender }}
                            </td>
                            <td>
                                <span style="background: var(--primary-gradient); color: white; padding: 0.25rem 0.75rem; border-radius: 50px; font-size: 0.75rem; font-weight: 600;">
                                    {{ $post->category }}
                                </span>
                            </td>
                            <td>
                                @if($post->status === 'adopted')
                                    <span class="status-badge status-confirmed">
                                        <i class="fas fa-check"></i>
                                        Adopted
                                    </span>
                                @elseif($post->status === 'active')
                                    <span class="status-badge status-pending">
                                        <i class="fas fa-clock"></i>
                                        Available
                                    </span>
                                @else
                                    <span class="status-badge">
                                        {{ ucfirst($post->status) }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-paw"></i>
                                    </div>
                                    <div class="empty-state-title">No Pets Available</div>
                                    <div class="empty-state-text">There are currently no pets listed for adoption.</div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        // AJAX search and form rendering for update/delete by ID
        function searchAdoptionPostById(type) {
            const adoptionId = document.getElementById(type + '_adoption_id').value;
            if (!adoptionId) return;
            
            // Show loading state
            document.getElementById(type + 'FormContainer').innerHTML = `
                <div style="text-align: center; padding: 2rem;">
                    <div class="loading">Searching for pet...</div>
                </div>
            `;
            
            fetch(`/admin/adoption-management/search-by-id/${adoptionId}`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.id) {
                        if (type === 'update') renderUpdateForm(data);
                        else renderDeleteForm(data);
                    } else {
                        document.getElementById(type + 'FormContainer').innerHTML = `
                            <div class="alert alert-error" style="margin-top: 1rem;">
                                <i class="fas fa-exclamation-triangle alert-icon"></i>
                                <span>No adoption post found for ID: ${adoptionId}</span>
                            </div>
                        `;
                    }
                })
                .catch(() => {
                    document.getElementById(type + 'FormContainer').innerHTML = `
                        <div class="alert alert-error" style="margin-top: 1rem;">
                            <i class="fas fa-exclamation-triangle alert-icon"></i>
                            <span>Error searching for adoption post. Please try again.</span>
                        </div>
                    `;
                });
        }

        function renderUpdateForm(post) {
            document.getElementById('updateFormContainer').innerHTML = `
                <div class="pet-card" style="margin-top: 2rem;">
                    <div class="pet-card-header">
                        <div>
                            <div class="pet-name">Update: ${post.pet_name}</div>
                            <p style="color: var(--text-secondary); margin: 0;">Edit the information for this pet</p>
                        </div>
                        <span class="status-badge status-pending">
                            <i class="fas fa-edit"></i>
                            Editing
                        </span>
                    </div>
                    <form action="/admin/adoption-management/update/${post.id}" method="POST" enctype="multipart/form-data">
                        <input type='hidden' name='_token' value='${document.querySelector('input[name=_token]').value}'>
                        <div class="form-grid">
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-heading"></i>
                                    Title
                                </label>
                                <input type='text' class='form-control' name='title' value='${post.title}' required>
                            </div>
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-paw"></i>
                                    Pet Name
                                </label>
                                <input type='text' class='form-control' name='pet_name' value='${post.pet_name}' required>
                            </div>
                        </div>
                        <div class="form-grid">
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-birthday-cake"></i>
                                    Pet Age
                                </label>
                                <input type='number' class='form-control' name='pet_age' value='${post.pet_age}' required>
                            </div>
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-venus-mars"></i>
                                    Gender
                                </label>
                                <select class='form-select' name='gender' required>
                                    <option value='Male' ${post.gender==='Male'?'selected':''}>Male</option>
                                    <option value='Female' ${post.gender==='Female'?'selected':''}>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='form-label'>
                                <i class="fas fa-smile"></i>
                                Character/Personality
                            </label>
                            <input type='text' class='form-control' name='character' value='${post.character}' required>
                        </div>
                        <div class='form-group'>
                            <label class='form-label'>
                                <i class="fas fa-align-left"></i>
                                Description
                            </label>
                            <textarea class='form-control' name='description' rows='4' required>${post.description}</textarea>
                        </div>
                        <div class='form-group'>
                            <label class='form-label'>
                                <i class="fas fa-image"></i>
                                Update Image
                            </label>
                            <input type='file' class='form-control' name='image' accept="image/*">
                            <small style="color: var(--text-secondary); font-size: 0.75rem; margin-top: 0.5rem; display: block;">
                                Leave empty to keep current image
                            </small>
                        </div>
                        <div class="form-group" style="margin-top: 2rem;">
                            <button type='submit' class='btn btn-primary'>
                                <i class="fas fa-save"></i>
                                Update Pet Information
                            </button>
                        </div>
                    </form>
                </div>
            `;
        }

        function renderDeleteForm(post) {
            document.getElementById('deleteFormContainer').innerHTML = `
                <div class="pet-card" style="margin-top: 2rem; border: 2px solid #ef4444;">
                    <div class="pet-card-header">
                        <div>
                            <div class="pet-name" style="color: #dc2626;">Delete: ${post.pet_name}</div>
                            <p style="color: var(--text-secondary); margin: 0;">This action cannot be undone</p>
                        </div>
                        <span class="status-badge status-cancelled">
                            <i class="fas fa-exclamation-triangle"></i>
                            Danger Zone
                        </span>
                    </div>
                    <div style="background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.05) 100%); padding: 1.5rem; border-radius: var(--border-radius-lg); margin-bottom: 1.5rem; border-left: 4px solid #ef4444;">
                        <p style="color: #991b1b; font-weight: 600; margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.5rem;">
                            <i class="fas fa-exclamation-triangle"></i>
                            Warning: This will permanently delete this pet from the system
                        </p>
                        <p style="color: var(--text-secondary); font-size: 0.875rem; margin: 0;">
                            All associated adoption requests and data will be removed. This action cannot be undone.
                        </p>
                    </div>
                    <form action="/admin/adoption-management/delete/${post.id}" method="POST">
                        <input type='hidden' name='_token' value='${document.querySelector('input[name=_token]').value}'>
                        <div class="form-grid">
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-hashtag"></i>
                                    Post ID
                                </label>
                                <input type='text' class='form-control' value='${post.id}' readonly style="background: #f8fafc;">
                            </div>
                            <div class='form-group'>
                                <label class='form-label'>
                                    <i class="fas fa-paw"></i>
                                    Pet Name
                                </label>
                                <input type='text' class='form-control' value='${post.pet_name}' readonly style="background: #f8fafc;">
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 2rem;">
                            <button type='submit' class='btn btn-danger' onclick="return confirm('Are you absolutely sure you want to delete this pet? This action cannot be undone.')">
                                <i class="fas fa-trash-alt"></i>
                                Permanently Delete Pet
                            </button>
                        </div>
                    </form>
                </div>
            `;
        }
        function showTab(tab) {
            const tabs = ['create', 'update', 'delete', 'request', 'showall'];
            tabs.forEach(function(t) {
                document.getElementById('tab-content-' + t).style.display = (t === tab) ? '' : 'none';
                document.getElementById('tab-' + t).classList.toggle('active', t === tab);
            });
        }
    </script>
</body>
</html>