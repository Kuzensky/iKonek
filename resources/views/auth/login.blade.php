<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - iKonek</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/login.css') }}">
</head>
<body>
    <div class="login-page">
        <div class="login-background" aria-hidden="true">
            <div class="login-shape login-shape-1"></div>
            <div class="login-shape login-shape-2"></div>
        </div>
        <div class="login-container">
            <a href="{{ route('home') }}" class="back-to-home">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Back to home</span>
            </a>
            <div class="login-card">
                <div class="login-header">
                    <div class="login-logo">
                        <span class="logo-text"><span class="logo-i">i</span>Konek</span>
                    </div>
                    <h1 class="login-title">Welcome Back</h1>
                    <p class="login-subtitle">Sign in to continue saving lives</p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input @error('email') error @enderror" placeholder="your.email@example.com" value="{{ old('email') }}" required autofocus>
                        @error('email')<span class="form-error active">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="password-input-wrapper">
                            <input type="password" id="password" name="password" class="form-input password-input @error('password') error @enderror" placeholder="Enter your password" required>
                            <button type="button" class="password-toggle" id="togglePassword">
                                <svg class="eye-icon eye-off" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                <svg class="eye-icon eye-on" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                            </button>
                        </div>
                        @error('password')<span class="form-error active">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-options">
                        <div class="checkbox-wrapper">
                            <input type="checkbox" id="remember" name="remember" class="form-checkbox">
                            <label for="remember" class="checkbox-label">Remember me</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-login">Log In</button>
                    <p class="signup-prompt">Don't have an account? <a href="{{ route('register') }}" class="signup-link">Sign up</a></p>
                </form>
            </div>
            <div class="security-badge">🔒 Secure and encrypted connection</div>
        </div>
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', () => {
                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;
                const eyeOff = togglePassword.querySelector('.eye-off');
                const eyeOn = togglePassword.querySelector('.eye-on');
                if (eyeOff && eyeOn) {
                    eyeOff.style.display = type === 'password' ? 'block' : 'none';
                    eyeOn.style.display = type === 'text' ? 'block' : 'none';
                }
            });
        }
    </script>
</body>
</html>
