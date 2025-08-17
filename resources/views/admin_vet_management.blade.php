<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Vet Management | PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: #333;
            margin: 0;
            min-height: 100vh;
        }
        .admin-header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 24px 0 18px 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
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
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }
        .brand-text h1 {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: 2px;
            background: linear-gradient(45deg, #fff, #ecf0f1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .admin-nav {
            display: flex;
            align-items: center;
            gap: 20px;
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
        }
        .logout-btn:hover {
            background: linear-gradient(135deg, #c0392b 0%, #a93226 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }
        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .page-subtitle {
            color: #7f8c8d;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .management-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        .management-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
            position: relative;
            overflow: hidden;
        }
        .management-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9);
        }
        .management-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }
        .card-icon i {
            color: white;
            font-size: 1.5rem;
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .card-description {
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        .card-btn {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 3px 10px rgba(52, 152, 219, 0.3);
        }
        .card-btn:hover {
            background: linear-gradient(135deg, #2980b9, #1f4e79);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #3498db;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .stat-label {
            color: #7f8c8d;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .alert {
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
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
                padding: 20px 15px;
            }
            .page-title {
                font-size: 2rem;
            }
            .management-grid {
                grid-template-columns: 1fr;
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
                    <i class="fas fa-user-md"></i>
                </div>
                <div class="brand-text">
                    <h1>Vet Management</h1>
                </div>
            </div>
            <div class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" style="color: white; text-decoration: none; margin-right: 20px;">
                    <i class="fas fa-dashboard"></i> Dashboard
                </a>
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">🩺 Veterinary Management System</h1>
            <p class="page-subtitle">Manage veterinarians, requests, and approvals</p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">{{ $vets->count() }}</div>
                <div class="stat-label">Total Vets</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $vets->where('status', 'approved')->count() }}</div>
                <div class="stat-label">Approved Vets</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $vets->where('status', 'pending')->count() }}</div>
                <div class="stat-label">Pending Requests</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $vets->where('status', 'rejected')->count() }}</div>
                <div class="stat-label">Rejected</div>
            </div>
        </div>

        <!-- Management Cards -->
        <div class="management-grid">
            <!-- Add New Vet -->
            <div class="management-card">
                <div class="card-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3 class="card-title">Add New Vet</h3>
                <p class="card-description">Add a new veterinarian directly to the system with approved status</p>
                <a href="{{ route('admin.vet.create') }}" class="card-btn">
                    <i class="fas fa-plus"></i> Add Vet
                </a>
            </div>

            <!-- Vet Requests -->
            <div class="management-card">
                <div class="card-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="card-title">Vet Requests</h3>
                <p class="card-description">Review and approve pending veterinarian applications</p>
                <a href="{{ route('admin.vet.requests') }}" class="card-btn">
                    <i class="fas fa-clipboard-list"></i> View Requests
                    @if($vets->where('status', 'pending')->count() > 0)
                        <span style="background: #e74c3c; padding: 2px 8px; border-radius: 10px; font-size: 0.8rem; margin-left: 5px;">
                            {{ $vets->where('status', 'pending')->count() }}
                        </span>
                    @endif
                </a>
            </div>

            <!-- Show All Vets -->
            <div class="management-card">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="card-title">All Approved Vets</h3>
                <p class="card-description">View all approved veterinarians with their details</p>
                <a href="{{ route('admin.vet.showAll') }}" class="card-btn">
                    <i class="fas fa-eye"></i> View All Vets
                </a>
            </div>

            <!-- Manage Existing Vets -->
            <div class="management-card">
                <div class="card-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <h3 class="card-title">Manage Vets</h3>
                <p class="card-description">Update or delete existing veterinarian profiles</p>
                <a href="#vets-list" class="card-btn">
                    <i class="fas fa-cog"></i> Manage
                </a>
            </div>
        </div>

        <!-- Vets List -->
        <div id="vets-list" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);">
            <h2 style="color: #2c3e50; margin-bottom: 25px; font-size: 1.8rem;">
                <i class="fas fa-list"></i> All Veterinarians
            </h2>
            
            @if($vets->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                        <thead>
                            <tr style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-bottom: 2px solid #dee2e6;">
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">ID</th>
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">Photo</th>
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">Name</th>
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">Phone</th>
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">Location</th>
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">Role</th>
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">Status</th>
                                <th style="padding: 15px; text-align: left; font-weight: 700; color: #2c3e50;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vets as $vet)
                                <tr style="border-bottom: 1px solid #e9ecef; transition: background 0.3s ease;" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='white'">
                                    <td style="padding: 15px; font-weight: 600; color: #2c3e50;">{{ $vet->id }}</td>
                                    <td style="padding: 15px;">
                                        @if($vet->profile_image)
                                            <img src="{{ asset('storage/' . $vet->profile_image) }}" alt="Profile" style="width: 40px; height: 40px; border-radius: 50%; border: 2px solid #3498db; object-fit: cover;">
                                        @else
                                            <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #3498db, #2980b9); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                                {{ strtoupper(substr($vet->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td style="padding: 15px; font-weight: 600; color: #2c3e50;">{{ $vet->name }}</td>
                                    <td style="padding: 15px; color: #7f8c8d;">{{ $vet->phone }}</td>
                                    <td style="padding: 15px; color: #7f8c8d;">{{ $vet->location }}</td>
                                    <td style="padding: 15px;">
                                        <span style="padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; background: linear-gradient(135deg, #3498db, #2980b9); color: white;">
                                            {{ ucwords(str_replace('_', ' ', $vet->role)) }}
                                        </span>
                                    </td>
                                    <td style="padding: 15px;">
                                        @if($vet->status == 'approved')
                                            <span style="padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; background: linear-gradient(135deg, #27ae60, #2ecc71); color: white;">
                                                <i class="fas fa-check"></i> Approved
                                            </span>
                                        @elseif($vet->status == 'pending')
                                            <span style="padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; background: linear-gradient(135deg, #f39c12, #e67e22); color: white;">
                                                <i class="fas fa-clock"></i> Pending
                                            </span>
                                        @else
                                            <span style="padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; background: linear-gradient(135deg, #e74c3c, #c0392b); color: white;">
                                                <i class="fas fa-times"></i> Rejected
                                            </span>
                                        @endif
                                    </td>
                                    <td style="padding: 15px;">
                                        <div style="display: flex; gap: 8px;">
                                            <a href="{{ route('admin.vet.edit', $vet->id) }}" style="background: linear-gradient(135deg, #3498db, #2980b9); color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none; font-size: 0.8rem; transition: all 0.3s ease;">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="{{ route('admin.vet.destroy', $vet->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this vet?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; padding: 6px 12px; border: none; border-radius: 5px; cursor: pointer; font-size: 0.8rem; transition: all 0.3s ease;">
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
            @else
                <div style="text-align: center; padding: 50px; color: #7f8c8d;">
                    <i class="fas fa-user-md" style="font-size: 4rem; margin-bottom: 20px; opacity: 0.3;"></i>
                    <h3 style="margin-bottom: 10px;">No Veterinarians Found</h3>
                    <p>Start by adding your first veterinarian to the system.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
