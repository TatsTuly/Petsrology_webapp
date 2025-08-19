<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Admin Dashboard</title>
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

        /* Header */
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

        /* Main Content */
        .main-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

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
            display: flex;
            align-items: center;
            gap: 15px;
            background: linear-gradient(45deg, #2c3e50, #34495e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .page-subtitle {
            color: #5a6c7d;
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            transition: left 0.5s ease;
        }

        .stat-card:hover::before {
            left: 0;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin: 0 auto 20px;
            color: white;
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
            transition: all 0.3s ease;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stat-icon.total { background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); }
        .stat-icon.active { background: linear-gradient(135deg, #27ae60 0%, #229954 100%); }
        .stat-icon.inactive { background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%); }
        .stat-icon.admin { background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%); }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 8px;
            background: linear-gradient(45deg, #2c3e50, #3498db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            color: #5a6c7d;
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* Search and Filter Section */
        .controls-section {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
        }

        .controls-grid {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 20px;
            align-items: end;
        }

        .search-group {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #ecf0f1;
            border-radius: 15px;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            transition: all 0.3s ease;
            background: #fff;
        }

        .search-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #5a6c7d;
        }

        .filter-select {
            padding: 15px 20px;
            border: 2px solid #ecf0f1;
            border-radius: 15px;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            background: #fff;
            min-width: 150px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .btn {
            padding: 15px 25px;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Nunito', sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
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

        .btn-success {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-success:hover {
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        .btn-danger:hover {
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }

        .btn-warning:hover {
            box-shadow: 0 6px 20px rgba(243, 156, 18, 0.4);
        }

        /* Users Table */
        .table-container {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
        }

        .table-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            padding: 25px 30px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .table-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin: 0;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
        }

        .users-table th,
        .users-table td {
            padding: 20px 30px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }

        .users-table th {
            background: #f8f9fa;
            font-weight: 700;
            color: #2c3e50;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .users-table tbody tr {
            transition: all 0.3s ease;
        }

        .users-table tbody tr:hover {
            background: #f8f9fa;
            transform: scale(1.01);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-details h4 {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .user-email {
            color: #5a6c7d;
            font-size: 0.95rem;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .status-active {
            background: linear-gradient(135deg, #d5f5e3 0%, #c3f7d0 100%);
            color: #27ae60;
            border: 1px solid #a9dfbf;
        }

        .status-inactive {
            background: linear-gradient(135deg, #fdeaa7 0%, #fbdb7c 100%);
            color: #f39c12;
            border: 1px solid #f7dc6f;
        }

        .role-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: capitalize;
            letter-spacing: 0.5px;
        }

        .role-admin {
            background: linear-gradient(135deg, #e8daef 0%, #d2b4de 100%);
            color: #8e44ad;
            border: 1px solid #bb8fce;
        }

        .role-user {
            background: linear-gradient(135deg, #d6eaf8 0%, #aed6f1 100%);
            color: #3498db;
            border: 1px solid #85c1e9;
        }

        .actions-cell {
            display: flex;
            gap: 10px;
        }

        .btn-sm {
            padding: 8px 12px;
            font-size: 0.85rem;
            min-width: auto;
            border-radius: 10px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(10px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
            animation: modalSlideIn 0.3s ease;
            border: 1px solid rgba(255,255,255,0.8);
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ecf0f1;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2c3e50;
            margin: 0;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.8rem;
            color: #5a6c7d;
            cursor: pointer;
            padding: 10px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            background: #ecf0f1;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #2c3e50;
            font-size: 1rem;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #ecf0f1;
            border-radius: 15px;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            transition: all 0.3s ease;
            background: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #ecf0f1;
            border-radius: 15px;
            font-size: 1rem;
            font-family: 'Nunito', sans-serif;
            background: #fff;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .modal-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #ecf0f1;
        }

        /* Alert Messages */
        .alert {
            padding: 20px 25px;
            border-radius: 15px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .alert-success {
            background: linear-gradient(135deg, #d5f5e3 0%, #c3f7d0 100%);
            color: #27ae60;
            border: 2px solid #a9dfbf;
        }

        .alert-error {
            background: linear-gradient(135deg, #fadbd8 0%, #f5b7b1 100%);
            color: #e74c3c;
            border: 2px solid #f1948a;
        }

        .alert-info {
            background: linear-gradient(135deg, #d6eaf8 0%, #aed6f1 100%);
            color: #3498db;
            border: 2px solid #85c1e9;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 30px;
            padding: 30px;
        }

        .pagination-btn {
            padding: 10px 15px;
            border: 2px solid #ecf0f1;
            background: #fff;
            color: #5a6c7d;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 600;
            font-family: 'Nunito', sans-serif;
        }

        .pagination-btn:hover,
        .pagination-btn.active {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            border-color: #3498db;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 20px;
            }

            .controls-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .users-table {
                font-size: 0.9rem;
            }

            .users-table th,
            .users-table td {
                padding: 15px 20px;
            }

            .page-title {
                font-size: 2rem;
            }

            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
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
        }
    </style>
</head>
<body>
    <!-- Admin Header -->
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
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

    <!-- Main Content -->
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-users"></i>
                User Management
            </h1>
            <p class="page-subtitle">Manage and monitor all registered users in your system</p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number" id="totalUsers">{{ $users->count() }}</div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon active">
                    <i class="fas fa-user-check"></i>
                </div>
                <div class="stat-number" id="activeUsers">{{ $users->where('role', 'user')->count() }}</div>
                <div class="stat-label">Regular Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon admin">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stat-number" id="adminUsers">{{ $users->where('role', 'admin')->count() }}</div>
                <div class="stat-label">Admin Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon inactive">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number" id="recentUsers">{{ $users->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                <div class="stat-label">New This Week</div>
            </div>
        </div>

        <!-- Search and Filter Controls -->
        <div class="controls-section">
            <div class="controls-grid">
                <div class="search-group">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" id="searchInput" placeholder="Search by name, email, or ID...">
                </div>
                <select class="filter-select" id="roleFilter">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <button class="btn btn-primary" onclick="openAddUserModal()">
                    <i class="fas fa-plus"></i>
                    Add New User
                </button>
            </div>
        </div>

        <!-- Users Table -->
        <div class="table-container">
            <div class="table-header">
                <h3 class="table-title">All Users</h3>
            </div>
            <table class="users-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    @foreach($users as $user)
                    <tr data-user-id="{{ $user->id }}" data-role="{{ $user->role }}" data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}">
                        <td>
                            <div class="user-info">
                                <div class="user-avatar" style="background: linear-gradient(135deg, {{ ['#3498db', '#27ae60', '#f39c12', '#e74c3c', '#9b59b6', '#1abc9c'][($user->id % 6)] }} 0%, {{ ['#2980b9', '#229954', '#e67e22', '#c0392b', '#8e44ad', '#16a085'][($user->id % 6)] }} 100%);">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div class="user-details">
                                    <h4>{{ $user->name }}</h4>
                                    <div class="user-email">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="role-badge {{ $user->role === 'admin' ? 'role-admin' : 'role-user' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('M d, Y') }}</td>
                        <td>
                            <span class="status-badge status-active">Active</span>
                        </td>
                        <td>
                            <div class="actions-cell">
                                <button class="btn btn-sm btn-warning" onclick="editUser({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit User Modal -->
    <div class="modal" id="userModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Add New User</h2>
                <button class="modal-close" onclick="closeUserModal()">&times;</button>
            </div>
            <form id="userForm" method="POST">
                @csrf
                <input type="hidden" id="userId" name="user_id">
                <input type="hidden" id="formMethod" name="_method">
                
                <div class="form-group">
                    <label class="form-label" for="userName">Full Name</label>
                    <input type="text" class="form-input" id="userName" name="name" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="userEmail">Email Address</label>
                    <input type="email" class="form-input" id="userEmail" name="email" required>
                </div>
                
                <div class="form-group" id="passwordGroup">
                    <label class="form-label" for="userPassword">Password</label>
                    <input type="password" class="form-input" id="userPassword" name="password">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="userRole">Role</label>
                    <select class="form-select" id="userRole" name="role" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                
                <div class="modal-actions">
                    <button type="button" class="btn" onclick="closeUserModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <i class="fas fa-save"></i>
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirm Deletion</h2>
                <button class="modal-close" onclick="closeDeleteModal()">&times;</button>
            </div>
            <div style="margin-bottom: 2rem;">
                <p>Are you sure you want to delete the user <strong id="deleteUserName"></strong>?</p>
                <p style="color: #ef4444; font-size: 0.9rem; margin-top: 1rem;">This action cannot be undone.</p>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn" onclick="closeDeleteModal()">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="fas fa-trash"></i>
                    Delete User
                </button>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let currentEditUserId = null;
        let currentDeleteUserId = null;

        // Search and filter functionality
        document.getElementById('searchInput').addEventListener('input', filterUsers);
        document.getElementById('roleFilter').addEventListener('change', filterUsers);

        function filterUsers() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const roleFilter = document.getElementById('roleFilter').value;
            const rows = document.querySelectorAll('#usersTableBody tr');

            rows.forEach(row => {
                const name = row.getAttribute('data-name');
                const email = row.getAttribute('data-email');
                const id = row.getAttribute('data-user-id');
                const role = row.getAttribute('data-role');

                const matchesSearch = name.includes(searchTerm) || 
                                    email.includes(searchTerm) || 
                                    id.includes(searchTerm);
                const matchesRole = !roleFilter || role === roleFilter;

                if (matchesSearch && matchesRole) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        // Modal functions
        function openAddUserModal() {
            document.getElementById('modalTitle').textContent = 'Add New User';
            document.getElementById('userForm').reset();
            document.getElementById('userId').value = '';
            document.getElementById('formMethod').value = '';
            document.getElementById('userForm').action = '/admin/users/store';
            document.getElementById('passwordGroup').style.display = 'block';
            document.getElementById('userPassword').required = true;
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-plus"></i> Add User';
            document.getElementById('userModal').classList.add('active');
            currentEditUserId = null;
        }

        function editUser(id, name, email, role) {
            document.getElementById('modalTitle').textContent = 'Edit User';
            document.getElementById('userId').value = id;
            document.getElementById('userName').value = name;
            document.getElementById('userEmail').value = email;
            document.getElementById('userRole').value = role;
            document.getElementById('formMethod').value = 'PUT';
            document.getElementById('userForm').action = '/admin/users/update/' + id;
            document.getElementById('passwordGroup').style.display = 'none';
            document.getElementById('userPassword').required = false;
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save"></i> Update User';
            document.getElementById('userModal').classList.add('active');
            currentEditUserId = id;
        }

        function closeUserModal() {
            document.getElementById('userModal').classList.remove('active');
            document.getElementById('userForm').reset();
            currentEditUserId = null;
        }

        function deleteUser(id, name) {
            document.getElementById('deleteUserName').textContent = name;
            document.getElementById('deleteModal').classList.add('active');
            currentDeleteUserId = id;
            
            document.getElementById('confirmDeleteBtn').onclick = function() {
                // Create a form and submit it
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/users/delete/' + id;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(methodField);
                document.body.appendChild(form);
                form.submit();
            };
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
            currentDeleteUserId = null;
        }

        // Form submission
        document.getElementById('userForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const originalContent = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            submitBtn.disabled = true;
            
            // Submit the form
            setTimeout(() => {
                this.submit();
            }, 500);
        });

        // Close modals when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('modal')) {
                e.target.classList.remove('active');
            }
        });

        // Close modals with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeUserModal();
                closeDeleteModal();
            }
        });

        // Auto-hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-10px)';
                setTimeout(() => {
                    alert.remove();
                }, 300);
            });
        }, 5000);
    </script>
</body>
</html>
