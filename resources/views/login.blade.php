<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PETSROLOGY</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .login-container {
            max-width: 420px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 18px rgba(255,111,97,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
            padding: 38px 32px 32px 32px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-header h2 {
            color: #ff6f61;
            margin: 0 0 8px 0;
            font-size: 2rem;
            letter-spacing: 1px;
        }
        .login-header p {
            color: #666;
            font-size: 1.08rem;
            margin: 0;
        }
        .login-header .logo {
            width:54px;
            height:54px;
            background:linear-gradient(135deg,#ff6f61 70%,#ff9472 100%);
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            box-shadow:0 2px 8px rgba(255,111,97,0.13);
            margin:0 auto 10px auto;
        }
        .login-form label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            color: #444;
        }
        .login-form input {
            width: 100%;
            padding: 11px 14px;
            border-radius: 7px;
            border: 1.5px solid #eee;
            margin-bottom: 18px;
            font-size: 1rem;
            background: #fafafa;
            transition: border 0.2s;
        }
        .login-form input:focus {
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
        .signup-link {
            display: block;
            text-align: center;
            margin-top: 22px;
            color: #ff6f61;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .signup-link:hover {
            color: #e65c50;
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .login-container {
                padding: 22px 8vw 22px 8vw;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="logo">
                <svg width="34" height="34" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                    <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                    <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                    <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                    <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                </svg>
            </div>
            <p>Welcome back! Please login to your account.</p>
            <h2>Login to PETSROLOGY</h2>
        </div>
        <form class="login-form" method="POST" action="#">
            
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required placeholder="you@email.com">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Your password">

            <button type="submit" class="btn">Login</button>
        </form>
        <div style="margin: 24px 0 10px 0; text-align: center; color: #aaa; font-size: 1rem;">
            <span style="background: #fff; padding: 0 12px;">or</span>
        </div>
        <div style="display: flex; flex-direction: column; gap: 14px;">
            <a href="#" style="display:flex;align-items:center;justify-content:center;gap:10px;background:#fff;color:#444;border:1.5px solid #eee;border-radius:24px;padding:10px 0;font-weight:600;font-size:1.05rem;text-decoration:none;transition:background 0.2s,box-shadow 0.2s;">
                <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" alt="Google" style="width:22px;height:22px;"> Continue with Google
            </a>
            <a href="#" style="display:flex;align-items:center;justify-content:center;gap:10px;background:#1877f3;color:#fff;border:none;border-radius:24px;padding:10px 0;font-weight:600;font-size:1.05rem;text-decoration:none;transition:background 0.2s,box-shadow 0.2s;">
                <svg width="22" height="22" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="16" fill="#1877f3"/><path d="M21.5 16.5h-3v9h-4v-9h-2v-3h2v-2c0-2.2 1.3-3.5 3.5-3.5h3v3h-2c-.6 0-1 .4-1 1v1.5h3l-.5 3z" fill="#fff"/></svg>
                Continue with Facebook
            </a>
            <a href="#" style="display:flex;align-items:center;justify-content:center;gap:10px;background:#24292f;color:#fff;border:none;border-radius:24px;padding:10px 0;font-weight:600;font-size:1.05rem;text-decoration:none;transition:background 0.2s,box-shadow 0.2s;">
                <svg width="22" height="22" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="16" fill="#24292f"/><path d="M20.5 25v-2.9c0-.8-.3-1.3-.7-1.6 2.3-.3 4.7-1.1 4.7-5 0-1.1-.4-2-1-2.7.1-.3.4-1.3-.1-2.7 0 0-.9-.3-2.8 1-.8-.2-1.7-.3-2.6-.3s-1.8.1-2.6.3c-1.9-1.3-2.8-1-2.8-1-.5 1.4-.2 2.4-.1 2.7-.6.7-1 1.6-1 2.7 0 3.9 2.4 4.7 4.7 5-.3.2-.6.7-.6 1.4V25" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Continue with GitHub
            </a>
        </div>
        <a href="{{ url('/signup') }}" class="signup-link">Don't have an account? Sign Up</a>
    </div>
</body>
</html>