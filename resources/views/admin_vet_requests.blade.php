<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Vet Requests | PETSROLOGY</title>
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
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
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
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            text-align: center;
            padding: 60px 20px 40px;
            box-shadow: 0 4px 20px rgba(231, 76, 60, 0.2);
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
            background: linear-gradient(90deg, #e74c3c, #c0392b);
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: 0 5px 20px rgba(231, 76, 60, 0.3);
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
        
        .requests-table-container {
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
        
        .requests-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Nunito', sans-serif;
        }
        
        .requests-table th,
        .requests-table td {
            padding: 18px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .requests-table th {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            color: #2c3e50;
            font-weight: 700;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .requests-table tbody tr {
            transition: all 0.3s ease;
        }
        
        .requests-table tbody tr:hover {
            background: rgba(231, 76, 60, 0.05);
            transform: scale(1.01);
        }
        
        .vet-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 3px solid #e74c3c;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(231, 76, 60, 0.2);
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
        
        .btn-approve {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
            color: white;
            box-shadow: 0 3px 10px rgba(39, 174, 96, 0.3);
        }
        
        .btn-approve:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .btn-reject {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            box-shadow: 0 3px 10px rgba(231, 76, 60, 0.3);
        }
        
        .btn-reject:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .btn-view {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
        }
        
        .btn-view:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
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
            
            .requests-table th,
            .requests-table td {
                padding: 12px 8px;
                font-size: 0.9rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 5px;
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
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="brand-text">
                    <h1>Vet Requests</h1>
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
            <h1>📋 Veterinarian Requests</h1>
            <p>Review and manage vet application requests</p>
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
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-number">{{ $pendingCount ?? 0 }}</div>
                <div class="stat-label">Pending Requests</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-number">{{ $todayRequests ?? 0 }}</div>
                <div class="stat-label">Today's Requests</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-number">{{ $weekRequests ?? 0 }}</div>
                <div class="stat-label">This Week</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ $totalRequests ?? 0 }}</div>
                <div class="stat-label">Total Requests</div>
            </div>
        </div>

        <!-- Vet Requests Table -->
        <div class="requests-table-container">
            <div class="table-header">
                <h2><i class="fas fa-list-alt"></i> Veterinarian Applications</h2>
                <div style="color: rgba(255,255,255,0.8); font-weight: 600;">
                    <i class="fas fa-users"></i> {{ $vets->count() }} {{ $vets->count() == 1 ? 'Request' : 'Requests' }}
                </div>
            </div>
            
            @if($vets->count() > 0)
                <div class="table-responsive">
                    <table class="requests-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Specialization</th>
                                <th>Experience</th>
                                <th>Applied Date</th>
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
                                </td>
                                <td style="color: #7f8c8d; font-weight: 600;">{{ $vet->phone }}</td>
                                <td style="color: #7f8c8d; font-weight: 600;">{{ $vet->location }}</td>
                                <td>
                                    <span style="background: rgba(52, 152, 219, 0.1); color: #3498db; padding: 4px 10px; border-radius: 15px; font-size: 0.85rem; font-weight: 600;">
                                        {{ ucwords(str_replace('_', ' ', $vet->role)) }}
                                    </span>
                                </td>
                                <td style="color: #7f8c8d; font-weight: 600;">{{ $vet->experience }} years</td>
                                <td style="color: #7f8c8d; font-weight: 600;">{{ $vet->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="status-badge status-{{ $vet->status }}">
                                        {{ ucfirst($vet->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        @if($vet->status === 'pending')
                                            <form method="POST" action="{{ route('admin.vet.approve', $vet->id) }}" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-approve" onclick="return confirm('Are you sure you want to approve this vet?')">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.vet.reject', $vet->id) }}" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-reject" onclick="return confirm('Are you sure you want to reject this vet?')">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span style="color: #95a5a6; font-size: 0.85rem; font-weight: 600;">
                                                {{ ucfirst($vet->status) }}
                                            </span>
                                        @endif
                                        <a href="{{ route('admin.vet.edit', $vet->id) }}" class="btn btn-view">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <h3>No Requests Found</h3>
                    <p>There are currently no vet application requests to review.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
