<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - All Vets | PETSROLOGY</title>
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
            max-width: 1400px;
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
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(155, 89, 182, 0.3);
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
            background: linear-gradient(135deg, #9b59b6 0%, #8e44ad 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 4px 20px rgba(155, 89, 182, 0.2);
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
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #9b59b6, #8e44ad);
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #9b59b6, #8e44ad);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 5px 20px rgba(155, 89, 182, 0.3);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #7f8c8d;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .filter-section {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            border: 1px solid #f0f0f0;
        }
        
        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            align-items: end;
        }
        
        .filter-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }
        
        .filter-control {
            width: 100%;
            padding: 12px;
            border: 2px solid #eee;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
        }
        
        .filter-control:focus {
            border-color: #9b59b6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(155, 89, 182, 0.1);
        }
        
        .btn-filter {
            background: linear-gradient(135deg, #9b59b6, #8e44ad);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(155, 89, 182, 0.3);
        }
        
        .btn-filter:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(155, 89, 182, 0.4);
        }
        
        .vets-table-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            border: 1px solid #f0f0f0;
        }
        
        .table-header {
            background: linear-gradient(135deg, #34495e, #2c3e50);
            color: white;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .table-header h2 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .table-responsive {
            overflow-x: auto;
        }
        
        .vets-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Nunito', sans-serif;
        }
        
        .vets-table th,
        .vets-table td {
            padding: 18px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .vets-table th {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: #2c3e50;
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .vets-table tbody tr {
            transition: all 0.3s ease;
        }
        
        .vets-table tbody tr:hover {
            background: rgba(155, 89, 182, 0.05);
            transform: scale(1.01);
        }
        
        .vet-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid #9b59b6;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(155, 89, 182, 0.2);
        }
        
        .vet-contact {
            color: #7f8c8d;
            font-size: 0.9rem;
        }
        
        .status-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-pending {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            box-shadow: 0 3px 10px rgba(243, 156, 18, 0.3);
        }
        
        .status-approved {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            box-shadow: 0 3px 10px rgba(39, 174, 96, 0.3);
        }
        
        .status-rejected {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
        }
        
        .price-info {
            font-size: 0.9rem;
            color: #7f8c8d;
            font-weight: 600;
        }
        
        .availability-info {
            font-size: 0.85rem;
            color: #7f8c8d;
        }
        
        .days-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 3px;
            margin-top: 3px;
        }
        
        .day-pill {
            background: rgba(155, 89, 182, 0.1);
            color: #9b59b6;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 0.7rem;
            font-weight: 600;
        }
        
        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            box-shadow: 0 3px 10px rgba(243, 156, 18, 0.3);
        }
        
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .btn-delete {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
        }
        
        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #bdc3c7;
        }
        
        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #2c3e50;
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
            .container {
                padding: 20px 10px;
            }
            
            .stats-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 15px;
            }
            
            .stat-card {
                padding: 20px;
            }
            
            .hero-content h1 {
                font-size: 2.2rem;
            }
            
            .hero-section {
                padding: 40px 20px 30px;
            }
            
            .vets-table th,
            .vets-table td {
                padding: 12px 8px;
                font-size: 0.9rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }
            
            .filter-grid {
                grid-template-columns: 1fr;
                gap: 15px;
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
                    <i class="fas fa-users-cog"></i>
                </div>
                <div class="brand-text">
                    <h1>All Vets</h1>
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
            <h1>👥 All Veterinarians</h1>
            <p>View and manage all registered veterinarians in the system</p>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Statistics Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ $vets->total() }}</div>
                <div class="stat-label">Total Vets</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-number">{{ $approvedCount ?? 0 }}</div>
                <div class="stat-label">Approved</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number">{{ $pendingCount ?? 0 }}</div>
                <div class="stat-label">Pending</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-number">{{ $rejectedCount ?? 0 }}</div>
                <div class="stat-label">Rejected</div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('admin.vet.showAll') }}">
                <div class="filter-grid">
                    <div class="filter-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="filter-control">
                            <option value="">All Statuses</option>
                            <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="role">Specialization</label>
                        <select name="role" id="role" class="filter-control">
                            <option value="">All Specializations</option>
                            <option value="general_checkup" {{ request('role') === 'general_checkup' ? 'selected' : '' }}>General Checkup</option>
                            <option value="surgery" {{ request('role') === 'surgery' ? 'selected' : '' }}>Surgery</option>
                            <option value="both" {{ request('role') === 'both' ? 'selected' : '' }}>Both</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="filter-control" placeholder="Search location..." value="{{ request('location') }}">
                    </div>
                    <div class="filter-group">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn-filter">
                            <i class="fas fa-filter"></i> Apply Filters
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Vets Table -->
        <div class="vets-table-container">
            <div class="table-header">
                <h2><i class="fas fa-list-alt"></i> Veterinarians Directory</h2>
                <div style="color: rgba(255,255,255,0.8); font-weight: 600;">
                    <i class="fas fa-users"></i> {{ $vets->total() }} {{ $vets->total() == 1 ? 'Vet' : 'Vets' }}
                </div>
            </div>
            
            @if($vets->count() > 0)
                <div class="table-responsive">
                    <table class="vets-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name & Contact</th>
                                <th>Location</th>
                                <th>Specialization</th>
                                <th>Experience</th>
                                <th>Pricing</th>
                                <th>Availability</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vets as $vet)
                            <tr>
                                <td style="font-weight: 700; color: #2c3e50;">#{{ $vet->id }}</td>
                                <td>
                                    @if($vet->profile_image)
                                        <img src="{{ asset('storage/' . $vet->profile_image) }}" alt="Profile" class="vet-image">
                                    @else
                                        <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #bdc3c7, #95a5a6); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                                            {{ substr($vet->name, 0, 1) }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div style="font-weight: 700; color: #2c3e50; margin-bottom: 3px;">{{ $vet->name }}</div>
                                    <div class="vet-contact">{{ $vet->phone }}</div>
                                </td>
                                <td style="color: #7f8c8d; font-weight: 600;">{{ $vet->location }}</td>
                                <td>
                                    <span style="background: rgba(155, 89, 182, 0.1); color: #9b59b6; padding: 4px 10px; border-radius: 15px; font-size: 0.85rem; font-weight: 600;">
                                        {{ ucwords(str_replace('_', ' ', $vet->role)) }}
                                    </span>
                                </td>
                                <td style="color: #7f8c8d; font-weight: 600;">{{ $vet->experience }} years</td>
                                <td>
                                    <div class="price-info">
                                        @if($vet->role === 'general_checkup' || $vet->role === 'both')
                                            @if($vet->general_price)
                                                <div>General: ৳{{ number_format($vet->general_price) }}</div>
                                            @endif
                                        @endif
                                        @if($vet->role === 'surgery' || $vet->role === 'both')
                                            @if($vet->surgery_price_min && $vet->surgery_price_max)
                                                <div>Surgery: ৳{{ number_format($vet->surgery_price_min) }}-{{ number_format($vet->surgery_price_max) }}</div>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="availability-info">
                                        <div>{{ $vet->visit_start_time }} - {{ $vet->visit_end_time }}</div>
                                        @if($vet->available_days)
                                            <div class="days-pills">
                                                @php
                                                    // $vet->available_days is already an array due to model casting
                                                    $days = $vet->available_days ?? [];
                                                    $dayAbbr = [
                                                        'monday' => 'Mon',
                                                        'tuesday' => 'Tue',
                                                        'wednesday' => 'Wed',
                                                        'thursday' => 'Thu',
                                                        'friday' => 'Fri',
                                                        'saturday' => 'Sat',
                                                        'sunday' => 'Sun'
                                                    ];
                                                @endphp
                                                @foreach($days as $day)
                                                    <span class="day-pill">{{ $dayAbbr[$day] ?? $day }}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $vet->status }}">
                                        {{ ucfirst($vet->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.vet.edit', $vet->id) }}" class="btn btn-edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.vet.destroy', $vet->id) }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this vet? This action cannot be undone.')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                @if($vets->hasPages())
                <div style="padding: 20px; text-align: center;">
                    {{ $vets->withQueryString()->links() }}
                </div>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-user-md"></i>
                    <h3>No Vets Found</h3>
                    <p>No veterinarians match the current filters.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
