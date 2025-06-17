<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETSROLOGY - Your Pet's Best Friend</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .drawer {
            position: fixed;
            left: 0;
            top: 0;
            width: 300px; /* Increased width */
            height: 100%;
            background: #fff;
            box-shadow: 2px 0 8px rgba(0,0,0,0.08);
            z-index: 1000;
            padding-top: 60px;
            transform: translateX(-100%);
            transition: transform 0.3s;
        }
        .drawer.open {
            transform: translateX(0);
        }
        .drawer-header {
            position: fixed;
            left: 0;
            top: 0;
            width: 300px; /* Increased width */
            height: 60px;
            background: #ff6f61;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: bold;
            letter-spacing: 2px;
        }
        .drawer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .drawer ul li {
            padding: 18px 30px;
            border-bottom: 1px solid #f0f0f0;
        }
        .drawer ul li a {
            color: #333;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.2s;
        }
        .drawer ul li a:hover {
            color: #ff6f61;
        }
        .drawer-toggle {
            position: fixed;
            left: 20px;
            top: 20px;
            background: #ff6f61;
            color: #fff;
            border: none;
            border-radius: 4px;
            width: 40px;
            height: 40px;
            font-size: 1.5rem;
            z-index: 1100;
            cursor: pointer;
            transition: background 0.2s;
        }
        .drawer-toggle:hover {
            background: #e65c50;
        }
        .main-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin-left: 0;
            transition: margin-left 0.3s;
        }
        .drawer.open ~ .main-content {
            margin-left: 300px;
        }
        header {
            padding: 40px 20px;
            text-align: center;
            background: #fff;
            box-shadow: 0 4px 18px rgba(0,0,0,0.05);
            position: relative;
        }
        header h1 {
            margin: 0;
            font-size: 2.5rem;
            color: #ff6f61;
            letter-spacing: 1px;
        }
        header p {
            font-size: 1.2rem;
            color: #666;
            margin: 10px 0 0 0;
        }
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 40px 20px;
            gap: 32px;
            flex: 1;
        }
        .feature {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            margin: 20px 0;
            padding: 32px 28px 28px 28px;
            text-align: center;
            width: 320px;
            transition: box-shadow 0.25s, transform 0.25s, border 0.25s;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        .feature:hover {
            box-shadow: 0 8px 32px rgba(255,111,97,0.18), 0 3px 12px rgba(0,0,0,0.08);
            border: 2px solid #ff6f61;
            transform: translateY(-8px) scale(1.03);
        }
        .feature img {
            width: 48px;
            height: 48px;
            margin-bottom: 18px;
            border-radius: 0;
            background: none;
            box-shadow: none;
            transition: transform 0.2s;
        }
        .feature:hover img {
            transform: scale(1.12) rotate(-6deg);
        }
        .feature h3 {
            margin: 10px 0 8px 0;
            font-size: 1.45rem;
            color: #ff6f61;
            letter-spacing: 1px;
            font-weight: 700;
        }
        .feature p {
            font-size: 1.05rem;
            color: #555;
            margin-bottom: 0;
        }
        .feature::after {
            content: "";
            position: absolute;
            left: -60px;
            top: -60px;
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, #ff6f6130 60%, transparent 100%);
            z-index: 0;
            opacity: 0.7;
            pointer-events: none;
            transition: opacity 0.2s;
        }
        .feature:hover::after {
            opacity: 1;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
            width: 100%;
        }
        footer p {
            margin: 0;
            font-size: 0.9rem;
        }
        .auth-buttons {
            margin-top: 25px;
            display: flex;
            justify-content: center;
            gap: 14px;
        }
        .btn {
            display: inline-block;
            padding: 9px 22px;
            border-radius: 24px;
            font-size: 1rem;
            font-weight: 700;
            text-decoration: none;
            transition:
                background 0.25s,
                color 0.25s,
                box-shadow 0.25s,
                transform 0.18s,
                letter-spacing 0.18s;
            box-shadow: 0 2px 8px rgba(255,111,97,0.10);
            letter-spacing: 1px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .login-btn {
            background: linear-gradient(90deg, #ff6f61 60%, #ff9472 100%);
            color: #fff !important;
            border: none;
            box-shadow: 0 2px 12px rgba(255,111,97,0.13);
        }
        .login-btn:hover, .login-btn:focus {
            background: linear-gradient(90deg, #e65c50 60%, #ff9472 100%);
            color: #fff !important;
            box-shadow: 0 6px 24px rgba(255,111,97,0.20);
            transform: translateY(-2px) scale(1.07);
            letter-spacing: 2px;
        }
        .signup-btn {
            background: #fff;
            color: #ff6f61 !important;
            border: 2px solid #ff6f61;
            box-shadow: 0 2px 12px rgba(255,111,97,0.07);
        }
        .signup-btn:hover, .signup-btn:focus {
            background: #ff6f61;
            color: #fff !important;
            box-shadow: 0 6px 24px rgba(255,111,97,0.20);
            transform: translateY(-2px) scale(1.07);
            letter-spacing: 2px;
            border: 2px solid #ff6f61;
        }
        @media (max-width: 900px) {
            .features {
                flex-direction: column;
                align-items: center;
                gap: 0;
            }
        }
        @media (max-width: 700px) {
            .drawer, .drawer-header {
                width: 220px; /* Also increase for mobile */
            }
            .drawer.open ~ .main-content {
                margin-left: 220px;
            }
            .feature {
                width: 90vw;
                min-width: 0;
            }
        }
    </style>
</head>
<body>
    <button class="drawer-toggle" id="drawerToggle">&#9776;</button>
    <nav class="drawer" id="drawer">
        <div class="drawer-header">PETSROLOGY</div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Adopt a Pet</a></li>
            <li><a href="#">Veterinary Support</a></li>
            <li><a href="#">Pet Supplies</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="main-content">
        <header>
            <h1>Welcome to PETSROLOGY</h1>
            <p>Your one-stop platform for all pet needs</p>
            <div style="margin-top: 25px; display: flex; justify-content: center; gap: 16px;">
                <a href="#" style="background:#ff6f61;color:#fff;text-align:center;padding:12px 32px;border-radius:5px;text-decoration:none;font-weight:600;transition:background 0.2s;font-size:1.1rem;">Login</a>
                <a href="#" style="background:#fff;color:#ff6f61;text-align:center;padding:12px 32px;border-radius:5px;text-decoration:none;font-weight:600;border:2px solid #ff6f61;transition:background 0.2s;font-size:1.1rem;">Sign Up</a>
            </div>
        </header>

        <section class="features">
            <div class="feature">
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f415.png" alt="Adopt a Pet" />
                <h3>Adopt a Pet</h3>
                <p>Find your perfect furry friend and give them a loving home.</p>
            </div>
            <div class="feature">
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f43e.png" alt="Veterinary Support" />
                <h3>Veterinary Support</h3>
                <p>Get expert veterinary advice and support for your pets.</p>
            </div>
            <div class="feature">
                <img src="https://cdn.jsdelivr.net/gh/twitter/twemoji@14.0.2/assets/72x72/1f6d2.png" alt="Pet Supplies" />
                <h3>Pet Supplies</h3>
                <p>Shop for high-quality pet food, toys, and accessories.</p>
            </div>
        </section>

        <footer>
            <p>&copy; 2025 PETSROLOGY. All rights reserved.</p>
        </footer>
    </div>
    <script>
        const drawer = document.getElementById('drawer');
        const toggle = document.getElementById('drawerToggle');
        toggle.addEventListener('click', () => {
            drawer.classList.toggle('open');
            document.querySelector('.main-content').classList.toggle('drawer-open');
        });
        document.addEventListener('click', function(e) {
            if (
                drawer.classList.contains('open') &&
                !drawer.contains(e.target) &&
                e.target !== toggle
            ) {
                drawer.classList.remove('open');
                document.querySelector('.main-content').classList.remove('drawer-open');
            }
        });
    </script>
</body>
</html>
