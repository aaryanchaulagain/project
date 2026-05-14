<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: black;
            min-height: 100vh;
            padding: 24px 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin: 0;
        }

        /* Logo on top-left */
        .logo {
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 2rem;
            font-weight: 700;
            color: #dc3545;
            letter-spacing: 2px;
            cursor: pointer;
        }

        .signin-card {
            background: rgba(229, 214, 214, 0.75);
            padding: 40px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
        }

        .signin-card h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .form-control {
            background: #fff;
            /* light input background */
            border: 1px solid #ccc;
            /* subtle border */
            color: #000;
            /* dark text for readability */
            padding: 10px;
            border-radius: 4px;
            transition: all 0.2s ease-in-out;
        }

        .form-control:focus {
            background: #fff;
            /* keep background white on focus */
            color: #000;
            /* keep text dark */
            border: 1px solid #e50914;
            /* red border on focus */
            box-shadow: 0 0 5px rgba(229, 9, 20, 0.5);
            /* subtle glow */
            outline: none;
        }


        .btn-roomxaa {
            background: #e50914;
            border: none;
            width: 100%;
            padding: 10px;
            font-weight: 600;
            font-size: 1rem;
            margin-top: 20px;
        }

        .btn-roomxaa:hover {
            background: #f6121d;
        }

        a {
            color: #000000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: #fff;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            font-size: 0.9rem;
        }
       

        @media (max-width: 480px) {
            .logo {
                left: 16px;
                font-size: 1.5rem;
            }

            .signin-card {
                padding: 28px 20px;
            }

            .options {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }
        }

    </style>
</head>

<body>
    <!-- Logo -->
    <a href="/">
        <div class="logo">ROOMCHAA</div>
    </a>

    <!-- Sign In Card -->
    <div class="signin-card">
        <h1>Sign In</h1>
        <form class="form-container" method="POST" action="{{ route('user.signin') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email or phone number" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="options">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#">Need help?</a>
            </div>

            <button type="submit" class="btn btn-roomxaa">Sign In</button>
            @if (session('error'))
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            <p class="mt-4" style="font-size: 0.9rem;">
                New to RoomXAA? <a href="{{ route('register') }}">Sign up now</a>.
            </p>
            <p style="font-size: 0.8rem; color: #000000;">
                This page is protected by Admin to ensure you're not a bot.
            </p>
        </form>
    </div>
</body>

</html>
