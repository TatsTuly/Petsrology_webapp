
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Supply Management | PETSROLOGY</title>
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
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
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
    <div class="admin-header">
        <div class="header-container">
            <div class="admin-brand">
                <div class="admin-logo">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="brand-text">
                    <h1>Supply Management</h1>
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
        <div class="page-header">
            <h1 class="page-title">📦 Supply Management</h1>
            <p class="page-subtitle">Manage all food and toy products in one place</p>
        </div>
        <div style="text-align:center; margin-bottom: 30px;">
            <button id="show-food-btn" class="card-btn" style="margin-right: 10px;">Food Product</button>
            <button id="show-toy-btn" class="card-btn">Toy Product</button>
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
