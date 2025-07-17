
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .signup-container {
            max-width: 420px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            padding: 38px 32px 32px 32px;
        }
        .signup-header {
            text-align: center;
            margin-bottom: 28px;
        }
        .signup-header h2 {
            color: #ff6f61;
            margin: 0 0 8px 0;
            font-size: 2rem;
            letter-spacing: 1px;
        }
        .signup-header p {
            color: #666;
            font-size: 1.08rem;
            margin: 0;
        }
        .signup-form label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            color: #444;
        }
        .role-selection {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }
        .role-selection input[type="radio"] {
            display: none;
        }
        .role-label {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 16px;
            border: 2px solid #eee;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 0.95rem;
            color: #666;
            background: #fafafa;
        }
        .role-label:hover {
            border-color: #ff6f61;
            background: #fff;
        }
        .role-selection input[type="radio"]:checked + .role-label {
            border-color: #ff6f61;
            background: #ff6f61;
            color: white;
        }
        .role-label i {
            font-size: 1.1rem;
        }
        .signup-form input {
            width: 100%;
            padding: 11px 14px;
            border-radius: 7px;
            border: 1.5px solid #eee;
            margin-bottom: 18px;
            font-size: 1rem;
            background: #fafafa;
            transition: border 0.2s;
        }
        .signup-form input:focus {
            border: 1.5px solid #ff6f61;
            outline: none;
            background: #fff;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 11px 0;
            border-radius: 24px;
            font-size: 1.08rem;
            font-weight: 700;
            text-decoration: none;
            background: linear-gradient(90deg, #ff6f61 60%, #ff9472 100%);
            color: #fff;
            border: none;
            box-shadow: 0 2px 12px rgba(255,111,97,0.13);
            letter-spacing: 1px;
            cursor: pointer;
            transition: background 0.25s, box-shadow 0.25s, transform 0.18s, letter-spacing 0.18s;
        }
        .btn:hover, .btn:focus {
            background: linear-gradient(90deg, #e65c50 60%, #ff9472 100%);
            box-shadow: 0 6px 24px rgba(255,111,97,0.20);
            transform: translateY(-2px) scale(1.04);
            letter-spacing: 2px;
        }
        .login-link {
            display: block;
            text-align: center;
            margin-top: 22px;
            color: #ff6f61;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .login-link:hover {
            color: #e65c50;
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .signup-container {
                padding: 22px 8vw 22px 8vw;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <div class="signup-header">
            
            <div style="width:54px;height:54px;background:linear-gradient(135deg,#ff6f61 70%,#ff9472 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 8px rgba(255,111,97,0.13);margin:0 auto 10px auto;">
                <svg width="34" height="34" viewBox="0 0 44 44" fill="none">
                    <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                    <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                    <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                    <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                </svg>
            </div>
            <p>Join PETSROLOGY and start your pet journey today!</p>
            <h2>Create Your Account</h2>
        </div>
        <form class="signup-form" method="POST" action="{{ route('signup.submit') }}">
            @csrf
            
            <label for="role">Sign Up As</label>
            <div class="role-selection">
                <input type="radio" id="customer" name="role" value="customer" checked>
                <label for="customer" class="role-label">
                    <i class="fas fa-user"></i>
                    Customer
                </label>
                
                <input type="radio" id="vet" name="role" value="vet">
                <label for="vet" class="role-label">
                    <i class="fas fa-stethoscope"></i>
                    Veterinarian
                </label>
            </div>
            
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required placeholder="Your Name">

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required placeholder="you@email.com">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Create a password">

            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Repeat your password">

            <button type="submit" class="btn">Sign Up</button>
        </form>
        <a href="{{ url('/login') }}" class="login-link">Already have an account? Login</a>
    </div>
</body>
</html>
