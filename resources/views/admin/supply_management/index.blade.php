
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Supply Management | PETSROLOGY</title>
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
        .management-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .management-card {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.8);
            position: relative;
            overflow: hidden;
        }
        
        .management-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #2980b9);
            transition: left 0.5s ease;
        }
        
        .management-card:hover::before {
            left: 0;
        }
        
        .management-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .card-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            font-size: 1.5rem;
        }
        
        .card-icon i {
            color: white;
            font-size: 1.8rem;
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
            border: none;
            cursor: pointer;
        }
        
        .card-btn:hover {
            background: linear-gradient(135deg, #2980b9, #1f4e79);
            color: white;
            text-decoration: none;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .card-btn.active {
            background: linear-gradient(135deg, #27ae60, #229954);
            box-shadow: 0 3px 10px rgba(39, 174, 96, 0.3);
        }
        
        .card-btn.active:hover {
            background: linear-gradient(135deg, #229954, #1e7e44);
            box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
        }
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 20px 15px;
            }
            .welcome-section h2 {
                font-size: 2rem;
            }
            .management-grid {
                grid-template-columns: 1fr;
            }
            .header-container {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .admin-nav {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill="white" d="M12 2L2 7V10C2 16 6 20.5 12 22C18 20.5 22 16 22 10V7L12 2ZM12 4.14L20 8.35V10C20 15.5 16.5 19.26 12 20.22C7.5 19.26 4 15.5 4 10V8.35L12 4.14ZM15.5 7C15.1 7 14.73 7.13 14.42 7.34L12 9.76L9.58 7.34C9.27 7.13 8.9 7 8.5 7C7.67 7 7 7.67 7 8.5C7 8.9 7.13 9.27 7.34 9.58L9.76 12L7.34 14.42C7.13 14.73 7 15.1 7 15.5C7 16.33 7.67 17 8.5 17C8.9 17 9.27 16.87 9.58 16.66L12 14.24L14.42 16.66C14.73 16.87 15.1 17 15.5 17C16.33 17 17 16.33 17 15.5C17 15.1 16.87 14.73 16.66 14.42L14.24 12L16.66 9.58C16.87 9.27 17 8.9 17 8.5C17 7.67 16.33 7 15.5 7Z"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <h1>PETSROLOGY</h1>
                    <p>Supply Management System</p>
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

    <div class="dashboard-container">
        <div class="welcome-section">
            <h2>📦 Supply Management</h2>
            <p>Manage all food and toy products in one centralized location. Monitor inventory, update product details, and maintain your pet supply catalog efficiently.</p>
        </div>
        
        <div style="text-align:center; margin-bottom: 30px;">
            <button id="show-food-btn" class="card-btn" style="margin-right: 15px;">
                <i class="fas fa-bone"></i> Food Products
            </button>
            <button id="show-toy-btn" class="card-btn">
                <i class="fas fa-gamepad"></i> Toy Products
            </button>
        </div>
        @include('admin.supply_management._crud_sections')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const foodBtn = document.getElementById('show-food-btn');
                const toyBtn = document.getElementById('show-toy-btn');
                const foodSection = document.getElementById('food-products-section');
                const toySection = document.getElementById('toy-products-section');
                function showFood() {
                    foodSection.style.display = 'block';
                    toySection.style.display = 'none';
                    foodBtn.classList.add('active');
                    toyBtn.classList.remove('active');
                }
                function showToy() {
                    foodSection.style.display = 'none';
                    toySection.style.display = 'block';
                    toyBtn.classList.add('active');
                    foodBtn.classList.remove('active');
                }
                foodBtn.addEventListener('click', showFood);
                toyBtn.addEventListener('click', showToy);
                // Show food by default
                showFood();
            });
        </script>
    </div>
</body>
</html>
