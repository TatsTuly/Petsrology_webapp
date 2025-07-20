<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .page-container {
            display: flex;
            width: 900px;
            max-width: 90%;
            margin: 40px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(108,117,125,0.15), 0 3px 10px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        .login-container {
            width: 60%;
            padding: 48px 50px;
        }
        .login-header {
            margin-bottom: 32px;
        }
        .login-header h2 {
            color: #2c3e50;
            margin: 0 0 15px 0;
            font-size: 2.2rem;
            letter-spacing: 1px;
            font-weight: 700;
            background: linear-gradient(45deg, #2c3e50, #3498db);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .login-header p {
            color: #666;
            font-size: 1.1rem;
            margin: 0 0 12px 0;
            line-height: 1.5;
        }
        .admin-badge {
            display: inline-flex;
            align-items: center;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }
        .admin-badge i {
            margin-right: 6px;
            font-size: 0.9rem;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #444;
            font-size: 1.05rem;
        }
        .login-form input {
            width: 100%;
            padding: 14px 45px 14px 16px;
            border-radius: 10px;
            border: 1.5px solid #eee;
            font-size: 1rem;
            background: #fafafa;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }
        .login-form input:focus {
            border: 1.5px solid #3498db;
            outline: none;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(52, 152, 219, 0.1);
        }
        .input-icon {
            position: absolute;
            right: 16px;
            top: 44px;
            color: #aaa;
            font-size: 1.1rem;
            line-height: 0;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 0.95rem;
        }
        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .remember-me input[type="checkbox"] {
            width: auto;
            margin: 0;
            accent-color: #3498db;
        }
        .forgot-password {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        .forgot-password:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 14px 0;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            color: #fff;
            border: none;
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn:hover, .btn:focus {
            background: linear-gradient(135deg, #2980b9 0%, #1f6391 100%);
            box-shadow: 0 12px 35px rgba(52, 152, 219, 0.4);
            transform: translateY(-3px);
            letter-spacing: 1.5px;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        .back-link i {
            margin-right: 6px;
        }
        
        /* Side container styles */
        .side-container {
            width: 40%;
            background: linear-gradient(135deg, #2c3e50 0%, #3498db 100%);
            color: white;
            padding: 48px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .side-logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }
        .side-logo {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            padding: 2px;
            box-sizing: border-box;
        }
        .brand-name {
            font-size: 1.8rem;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .admin-info {
            margin-top: 0;
        }
        .admin-info h3 {
            font-size: 1.4rem;
            margin-bottom: 20px;
            font-weight: 600;
            color: #fff;
        }
        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            font-size: 1rem;
            line-height: 1.5;
        }
        .info-item i {
            width: 30px;
            font-size: 1.2rem;
            margin-right: 10px;
            margin-top: 2px;
            color: rgba(255,255,255,0.8);
        }
        .info-item span {
            flex: 1;
        }
        .security-notice {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 12px;
            margin-top: 30px;
            border-left: 4px solid rgba(255, 255, 255, 0.3);
        }
        .security-notice h4 {
            margin: 0 0 10px 0;
            font-size: 1.1rem;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .security-notice p {
            margin: 0;
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.4;
        }
        .admin-features {
            margin-top: 30px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9);
        }
        .feature-item i {
            width: 20px;
            margin-right: 10px;
            color: rgba(255, 255, 255, 0.7);
        }
        
        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
                width: 95%;
            }
            .login-container, .side-container {
                width: 100%;
                padding: 30px;
            }
            .side-container {
                order: -1;
                padding-bottom: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="login-container">
            <div class="login-header">
                <div class="admin-badge">
                    <i class="fas fa-shield-alt"></i>
                    Administrator Access
                </div>
                <h2>Admin Dashboard</h2>
                <p>Secure login for PETSROLOGY administrators</p>
            </div>
            <form class="login-form" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                
                <div class="form-group">
                    <label for="admin_email">Admin Email</label>
                    <input type="email" id="admin_email" name="admin_email" required placeholder="admin@petsrology.com">
                    <span class="input-icon"><i class="fas fa-user-shield"></i></span>
                </div>

                <div class="form-group">
                    <label for="admin_password">Admin Password</label>
                    <input type="password" id="admin_password" name="admin_password" required placeholder="Enter admin password">
                    <span class="input-icon"><i class="fas fa-lock"></i></span>
                </div>

                <div class="remember-forgot">
                    <div class="remember-me">
                        <input type="checkbox" id="remember_admin" name="remember_admin">
                        <label for="remember_admin">Remember me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" class="btn">Access Dashboard</button>
            </form>
            
            <a href="{{ url('/landing') }}" class="back-link">
                <i class="fas fa-arrow-left"></i>
                Back to Main Site
            </a>
        </div>
        
        <div class="side-container">
            <div class="side-logo-container">
                <div class="side-logo">
                    <svg width="40" height="40" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; margin: auto;">
                        <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                        <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                        <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                        <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    </svg>
                </div>
                <div class="brand-name">PETSROLOGY</div>
            </div>
            
            <div class="admin-info">
                <h3>Admin Portal</h3>
                <div class="info-item">
                    <i class="fas fa-database"></i>
                    <span>Manage all pet records, user accounts, and veterinarian profiles</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-chart-line"></i>
                    <span>View comprehensive analytics and adoption statistics</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-users-cog"></i>
                    <span>Control user permissions and system settings</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-shield-check"></i>
                    <span>Monitor security and manage platform safety</span>
                </div>
                
                <div class="admin-features">
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                        <span>Real-time monitoring</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                        <span>Advanced reporting tools</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                        <span>Secure data management</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check"></i>
                        <span>24/7 system access</span>
                    </div>
                </div>
            </div>
            
            <div class="security-notice">
                <h4>
                    <i class="fas fa-exclamation-triangle"></i>
                    Security Notice
                </h4>
                <p>This is a restricted area. All access attempts are logged and monitored. Only authorized personnel should proceed.</p>
            </div>
        </div>
    </div>
</body>
</html>
