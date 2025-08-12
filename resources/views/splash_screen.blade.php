<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETSROLOGY - Loading...</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;900&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
            background: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .splash-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            position: relative;
        }
        .custom-logo {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg,#ff6f61 70%,#ff9472 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 18px rgba(255,111,97,0.13);
            margin-bottom: 24px;
            animation: bounce 1.6s infinite alternate;
        }
        @keyframes bounce {
            0% { transform: translateY(0);}
            100% { transform: translateY(-18px);}
        }
        .splash-title {
            font-family: 'Nunito', sans-serif;
            font-size: 2.6rem;
            font-weight: 900;
            color: #ff6f61;
            letter-spacing: 3px;
            margin-bottom: 10px;
            z-index: 2;
            text-shadow: 0 2px 8px #ff947220;
        }
        .splash-slogan {
            font-family:'Nunito',sans-serif;
            font-size:1.1rem;
            color:#888;
            margin-bottom:18px;
            text-align:center;
        }
        /* Custom loader animation */
        .loader {
            animation: rotate 1s infinite;
            height: 50px;
            width: 50px;
            margin-top: 18px;
        }
        .loader:before,
        .loader:after {
            border-radius: 50%;
            content: "";
            display: block;
            height: 20px;
            width: 20px;
        }
        .loader:before {
            animation: ball1 1s infinite;
            background-color: #fff;
            box-shadow: 30px 0 0 #ff6f61;
            margin-bottom: 10px;
        }
        .loader:after {
            animation: ball2 1s infinite;
            background-color: #ff6f61;
            box-shadow: 30px 0 0 #fff;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg) scale(0.8) }
            50% { transform: rotate(360deg) scale(1.2) }
            100% { transform: rotate(720deg) scale(0.8) }
        }
        @keyframes ball1 {
            0% {
                box-shadow: 30px 0 0 #ff6f61;
            }
            50% {
                box-shadow: 0 0 0 #ff6f61;
                margin-bottom: 0;
                transform: translate(15px, 15px);
            }
            100% {
                box-shadow: 30px 0 0 #ff6f61;
                margin-bottom: 10px;
            }
        }
        @keyframes ball2 {
            0% {
                box-shadow: 30px 0 0 #fff;
            }
            50% {
                box-shadow: 0 0 0 #fff;
                margin-top: -20px;
                transform: translate(15px, 15px);
            }
            100% {
                box-shadow: 30px 0 0 #fff;
                margin-top: 0;
            }
        }
        @media (max-width: 600px) {
            .custom-logo { width: 64px; height: 64px; }
            .splash-title { font-size: 2rem; }
            .loader { width: 38px; height: 38px; }
        }
@endsection

@section('content')
    <div class="splash-container">
        <div class="custom-logo">
            <svg width="54" height="54" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="22" cy="30" rx="11" ry="8" fill="#fff"/>
                <ellipse cx="12" cy="18" rx="4" ry="5" fill="#fff"/>
                <ellipse cx="32" cy="18" rx="4" ry="5" fill="#fff"/>
                <ellipse cx="17" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
                <ellipse cx="27" cy="11" rx="2.2" ry="2.8" fill="#fff"/>
            </svg>
        </div>
        <div class="splash-title">PETSROLOGY</div>
        <div class="splash-slogan">
            Your one-stop platform for all pet needs
        </div>
        <div class="loader"></div>
    </div>
    
    <script>
        setTimeout(function() {
            window.location.href = "{{ url('/landing') }}";
        }, 5000);
    </script>
</body>
</html>