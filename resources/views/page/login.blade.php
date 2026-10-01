<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Accountant Portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            background: #f7f3ee;
            color: #3e3a39;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }

        /* card */
        .login-card {
            background: #fefcf9;
            border-radius: 1.8rem;
            padding: 2.8rem 2.2rem;
            box-shadow: 0 15px 35px rgba(140, 110, 90, 0.08);
            border: 1px solid #e7ddd2;
        }

        /* brand / header */
        .login-brand {
            text-align: center;
            margin-bottom: 2.2rem;
        }

        .login-brand .brand-icon {
            background: #f0e7df;
            width: 66px;
            height: 66px;
            border-radius: 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.2rem;
        }

        .login-brand .brand-icon i {
            font-size: 2rem;
            color: #9b7b62;
        }

        .login-brand h1 {
            font-size: 1.8rem;
            font-weight: 500;
            color: #5e4b3c;
            letter-spacing: -0.01em;
            margin-bottom: 0.4rem;
        }

        .login-brand p {
            color: #8a786a;
            font-size: 0.95rem;
            font-weight: 350;
        }

        /* form groups */
        .form-group {
            margin-bottom: 1.4rem;
        }

        .form-group label {
            display: block;
            font-size: 0.88rem;
            font-weight: 500;
            color: #6e5b4d;
            margin-bottom: 0.5rem;
            letter-spacing: 0.01em;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 1.1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #b3937b;
            font-size: 1rem;
            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            padding: 0.85rem 1rem 0.85rem 2.8rem;
            font-size: 0.95rem;
            font-family: inherit;
            color: #4a3f37;
            background: #fcf9f6;
            border: 1px solid #e6dcd2;
            border-radius: 0.9rem;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }

        .input-wrapper input::placeholder {
            color: #b3a497;
            font-weight: 350;
        }

        .input-wrapper input:focus {
            border-color: #c9a98d;
            background: #fffdfa;
            box-shadow: 0 0 0 4px rgba(200, 170, 145, 0.12);
        }

        /* remember & forgot row */
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.8rem;
            font-size: 0.88rem;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #7d6c5f;
            cursor: pointer;
            font-weight: 400;
        }

        .remember input {
            accent-color: #b28b6e;
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .forgot-link {
            color: #9b7b62;
            text-decoration: none;
            font-weight: 450;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: #7a5c44;
            text-decoration: underline;
        }

        /* button */
        .btn-login {
            width: 100%;
            padding: 0.9rem 1rem;
            font-size: 1rem;
            font-family: inherit;
            font-weight: 500;
            letter-spacing: 0.02em;
            color: #fefcf9;
            background: #a8866d;
            border: none;
            border-radius: 0.9rem;
            cursor: pointer;
            transition: background 0.25s, transform 0.15s, box-shadow 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-login:hover {
            background: #977457;
            box-shadow: 0 8px 18px rgba(150, 115, 90, 0.22);
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        /* divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin: 1.8rem 0 1.4rem;
            color: #b3a294;
            font-size: 0.8rem;
            font-weight: 400;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #ebe2d9;
        }

        /* social buttons */
        .social-row {
            display: flex;
            gap: 0.8rem;
        }

        .social-btn {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem;
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 450;
            color: #6e5b4d;
            background: #fcf9f6;
            border: 1px solid #e6dcd2;
            border-radius: 0.9rem;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s;
        }

        .social-btn:hover {
            background: #f6f0e9;
            border-color: #d8c8b9;
        }

        .social-btn i {
            font-size: 1rem;
            color: #a8866d;
        }

        /* footer */
        .login-footer {
            text-align: center;
            margin-top: 1.8rem;
            font-size: 0.9rem;
            color: #8a786a;
            font-weight: 350;
        }

        .login-footer a {
            color: #9b7b62;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .login-footer a:hover {
            color: #7a5c44;
            text-decoration: underline;
        }

        /* error alert (for Laravel validation) */
        .alert-error {
            background: #fdeeea;
            color: #a54a3a;
            border: 1px solid #f2d5cd;
            padding: 0.75rem 1rem;
            border-radius: 0.8rem;
            font-size: 0.85rem;
            margin-bottom: 1.4rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .alert-error i {
            color: #c06b58;
        }

        /* responsive */
        @media (max-width: 480px) {
            body {
                padding: 1.2rem 1rem;
            }
            .login-card {
                padding: 2.2rem 1.6rem;
                border-radius: 1.5rem;
            }
            .login-brand h1 {
                font-size: 1.55rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">
            <!-- Brand header -->
            <div class="login-brand">
                <div class="brand-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h1>ApexBooks</h1>
                <p>Sign in to your accountant portal</p>
            </div>

            {{-- Laravel: display validation errors --}}
            @if ($errors->any())
                <div class="alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            {{-- Laravel login form --}}
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="you@example.com" 
                            required 
                            autofocus
                        >
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Enter your password" 
                            required
                        >
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="form-options">
                    <label class="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn-login" id="submitBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    Sign in
                </button>
            </form>

            <!-- Divider -->
            <div class="divider">or continue with</div>

            <!-- Social (placeholder) -->
            <div class="social-row">
                <button type="button" class="social-btn">
                    <i class="fab fa-google"></i> Google
                </button>
                <button type="button" class="social-btn">
                    <i class="fab fa-microsoft"></i> Microsoft
                </button>
            </div>

            <!-- Footer -->
            <div class="login-footer">
                Don't have an account? <a href="#">Create one</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('loginForm');
            const submitBtn = document.getElementById('submitBtn');

            if (form && submitBtn) {
                form.addEventListener('submit', function () {
                    // Prevent double submission and show loading state
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Signing in...';
                });
            }
        });
    </script>

</body>
</html>