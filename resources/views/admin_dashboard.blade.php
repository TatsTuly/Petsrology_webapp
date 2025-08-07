<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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
        
        .dashboard-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .welcome-section {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            border: 1px solid rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
        }
        
        .welcome-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9, #e74c3c, #f39c12);
        }
        
        .welcome-section h2 {
            color: #2c3e50;
            margin-bottom: 15px;
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(45deg, #2c3e50, #34495e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .welcome-section p {
            font-size: 1.1rem;
            color: #5a6c7d;
            line-height: 1.6;
            margin: 0;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
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
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 1.8rem;
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
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
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .quick-actions {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.8);
        }
        
        .quick-actions h3 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(45deg, #2c3e50, #3498db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
        }
        
        .action-btn {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px 25px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border: 2px solid rgba(108, 117, 125, 0.1);
            border-radius: 15px;
            text-decoration: none;
            color: #2c3e50;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .action-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #6c757d, #495057);
            transition: left 0.5s ease;
        }
        
        .action-btn.user-management::before {
            background: linear-gradient(90deg, #3498db, #2980b9);
        }
        
        .action-btn.vet-management::before {
            background: linear-gradient(90deg, #27ae60, #229954);
        }
        
        .action-btn.project-management::before {
            background: linear-gradient(90deg, #f39c12, #e67e22);
        }
        
        .action-btn:hover::before {
            left: 0;
        }
        
        .action-btn:hover {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(108,117,125,0.3);
        }
        
        .action-btn.user-management:hover {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.3);
        }
        
        .action-btn.vet-management:hover {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            box-shadow: 0 10px 25px rgba(39, 174, 96, 0.3);
        }
        
        .action-btn.project-management:hover {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            box-shadow: 0 10px 25px rgba(243, 156, 18, 0.3);
        }
        
        .action-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.2);
            transition: all 0.3s ease;
        }
        
        .action-btn:hover .action-icon {
            background: linear-gradient(135deg, #ffffff 0%, #ecf0f1 100%);
            color: #495057;
            transform: scale(1.1) rotate(5deg);
        }
        
        .action-btn.user-management .action-icon {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.2);
        }
        
        .action-btn.vet-management .action-icon {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.2);
        }
        
        .action-btn.project-management .action-icon {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            box-shadow: 0 5px 15px rgba(243, 156, 18, 0.2);
        }
        
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .admin-nav {
                flex-direction: column;
                gap: 10px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .actions-grid {
                grid-template-columns: 1fr;
            }
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
                <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
    </header>
    
    <main class="dashboard-container">
        <section class="welcome-section">
            <h2>Welcome to Admin Dashboard</h2>
            <p>Manage your PETSROLOGY platform from this central control panel. Monitor statistics, manage users, and oversee all platform activities.</p>
        </section>
        
        <section class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">1,247</div>
                <div class="stat-label">Total Users</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-paw"></i>
                </div>
                <div class="stat-number">2,580</div>
                <div class="stat-label">Pets Listed</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="stat-number">892</div>
                <div class="stat-label">Successful Adoptions</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-stethoscope"></i>
                </div>
                <div class="stat-number">156</div>
                <div class="stat-label">Veterinarians</div>
            </div>
        </section>
        
        <section class="quick-actions">
            <h3>Quick Actions</h3>
            <div class="actions-grid">
                <a href="#" class="action-btn user-management">
                    <div class="action-icon">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <span>User Management</span>
                </a>
                
                <a href="{{ url('/login?role=vet') }}" class="action-btn vet-management">
                    <div class="action-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <span>Vet Management</span>
                </a>
                
                <a href="#" class="action-btn project-management">
                    <div class="action-icon">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <span>Project Management</span>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-paw"></i>
                    </div>
                    <span>Pet Management</span>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <span>Analytics</span>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span>System Settings</span>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <span>Security</span>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <span>Reports</span>
                </a>
            </div>
        </section>
    </main>
</body>
</html>
