<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create your iKonek account - Join our community and start making a difference">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - iKonek</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&display=swap" rel="stylesheet">

    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

    <!-- Component Styles -->
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/register.css') }}">
</head>
<body>
    <!-- Register Page Container -->
    <div class="register-page">
        <!-- Background Decoration -->
        <div class="register-background" aria-hidden="true">
            <div class="register-shape register-shape-1"></div>
            <div class="register-shape register-shape-2"></div>
        </div>

        <!-- Register Content -->
        <div class="register-container">
            <!-- Back to Home Button -->
            <a href="{{ route('home') }}" class="back-to-home" aria-label="Go back to homepage">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Back to home</span>
            </a>

            <!-- Register Card -->
            <div class="register-card">
                <!-- Logo Header -->
                <div class="register-header">
                    <div class="register-logo">
                        <img src="{{ asset('assets/img/ikonek-logo.png') }}" alt="iKonek Logo" class="logo-image">
                        <span class="logo-text">
                            <span class="logo-i">i</span>Konek
                        </span>
                    </div>

                    <h1 class="register-title">Create Your Account</h1>
                    <p class="register-subtitle">Join our community and start making a difference</p>
                </div>

                <!-- Register Form -->
                <form class="register-form" method="POST" action="{{ route('register') }}" novalidate>
                    @csrf

                    <!-- First Name and Last Name Row -->
                    <div class="form-row">
                        <div class="form-group form-group-half">
                            <label for="first_name" class="form-label">
                                First Name
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                class="form-input @error('first_name') error @enderror"
                                placeholder="First name"
                                value="{{ old('first_name') }}"
                                required
                                aria-required="true"
                                aria-describedby="first_name-error"
                            >
                            @error('first_name')
                                <span class="form-error active" id="first_name-error" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group form-group-half">
                            <label for="last_name" class="form-label">
                                Last Name
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-input @error('last_name') error @enderror"
                                placeholder="Last name"
                                value="{{ old('last_name') }}"
                                required
                                aria-required="true"
                                aria-describedby="last_name-error"
                            >
                            @error('last_name')
                                <span class="form-error active" id="last_name-error" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Middle Name Field -->
                    <div class="form-group">
                        <label for="middle_name" class="form-label">
                            Middle Name
                            <span class="optional">(Optional)</span>
                        </label>
                        <input
                            type="text"
                            id="middle_name"
                            name="middle_name"
                            class="form-input @error('middle_name') error @enderror"
                            placeholder="Middle name"
                            value="{{ old('middle_name') }}"
                            aria-describedby="middle_name-error"
                        >
                        @error('middle_name')
                            <span class="form-error active" id="middle_name-error" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Birthdate, Sex, and Blood Type Row -->
                    <div class="form-row">
                        <div class="form-group form-group-third">
                            <label for="birthdate" class="form-label">
                                Birthdate
                                <span class="required">*</span>
                            </label>
                            <input
                                type="date"
                                id="birthdate"
                                name="birthdate"
                                class="form-input @error('birthdate') error @enderror"
                                value="{{ old('birthdate') }}"
                                required
                                aria-required="true"
                                aria-describedby="birthdate-error"
                            >
                            @error('birthdate')
                                <span class="form-error active" id="birthdate-error" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group form-group-third">
                            <label for="sex" class="form-label">
                                Sex
                                <span class="required">*</span>
                            </label>
                            <div class="select-wrapper">
                                <select
                                    id="sex"
                                    name="sex"
                                    class="form-select @error('sex') error @enderror"
                                    required
                                    aria-required="true"
                                    aria-describedby="sex-error"
                                >
                                    <option value="" disabled selected>Select sex</option>
                                    <option value="male" @selected(old('sex') === 'male')>Male</option>
                                    <option value="female" @selected(old('sex') === 'female')>Female</option>
                                </select>
                                <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                            @error('sex')
                                <span class="form-error active" id="sex-error" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group form-group-third">
                            <label for="blood_type" class="form-label">
                                Blood Type
                                <span class="required">*</span>
                            </label>
                            <div class="select-wrapper">
                                <select
                                    id="blood_type"
                                    name="blood_type"
                                    class="form-select @error('blood_type') error @enderror"
                                    required
                                    aria-required="true"
                                    aria-describedby="blood_type-error"
                                >
                                    <option value="" disabled selected>Select blood type</option>
                                    <option value="A+" @selected(old('blood_type') === 'A+')>A+</option>
                                    <option value="A-" @selected(old('blood_type') === 'A-')>A-</option>
                                    <option value="B+" @selected(old('blood_type') === 'B+')>B+</option>
                                    <option value="B-" @selected(old('blood_type') === 'B-')>B-</option>
                                    <option value="AB+" @selected(old('blood_type') === 'AB+')>AB+</option>
                                    <option value="AB-" @selected(old('blood_type') === 'AB-')>AB-</option>
                                    <option value="O+" @selected(old('blood_type') === 'O+')>O+</option>
                                    <option value="O-" @selected(old('blood_type') === 'O-')>O-</option>
                                </select>
                                <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </div>
                            @error('blood_type')
                                <span class="form-error active" id="blood_type-error" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email
                            <span class="required">*</span>
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input @error('email') error @enderror"
                            placeholder="your.email@example.com"
                            value="{{ old('email') }}"
                            required
                            aria-required="true"
                            aria-describedby="email-error"
                        >
                        @error('email')
                            <span class="form-error active" id="email-error" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Contact Number Field -->
                    <div class="form-group">
                        <label for="contact_number" class="form-label">
                            Contact Number
                            <span class="required">*</span>
                        </label>
                        <input
                            type="tel"
                            id="contact_number"
                            name="contact_number"
                            class="form-input @error('contact_number') error @enderror"
                            placeholder="+63 912 345 6789"
                            value="{{ old('contact_number') }}"
                            required
                            aria-required="true"
                            aria-describedby="contact_number-error"
                        >
                        @error('contact_number')
                            <span class="form-error active" id="contact_number-error" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            Password
                            <span class="required">*</span>
                        </label>
                        <div class="password-input-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input password-input @error('password') error @enderror"
                                placeholder="Create a strong password"
                                required
                                aria-required="true"
                                aria-describedby="password-error password-hint"
                            >
                            <button
                                type="button"
                                class="password-toggle"
                                id="togglePassword"
                                aria-label="Toggle password visibility"
                            >
                                <svg class="eye-icon eye-off" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                    <line x1="1" y1="1" x2="23" y2="23"/>
                                </svg>
                                <svg class="eye-icon eye-on" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        <p class="password-hint" id="password-hint">Must be at least 8 characters long</p>
                        @error('password')
                            <span class="form-error active" id="password-error" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">
                            Confirm Password
                            <span class="required">*</span>
                        </label>
                        <div class="password-input-wrapper">
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="form-input password-input @error('password_confirmation') error @enderror"
                                placeholder="Re-enter your password"
                                required
                                aria-required="true"
                                aria-describedby="password_confirmation-error"
                            >
                            <button
                                type="button"
                                class="password-toggle"
                                id="togglePasswordConfirm"
                                aria-label="Toggle confirm password visibility"
                            >
                                <svg class="eye-icon eye-off" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                                    <line x1="1" y1="1" x2="23" y2="23"/>
                                </svg>
                                <svg class="eye-icon eye-on" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: none;">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </button>
                        </div>
                        @error('password_confirmation')
                            <span class="form-error active" id="password_confirmation-error" role="alert">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Required Field Indicator -->
                    <p class="required-note">
                        <span class="required">*</span> indicates required field
                    </p>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-register">
                        Create Account
                    </button>

                    <!-- Login Link -->
                    <p class="login-prompt">
                        Already have an account?
                        <a href="{{ route('login') }}" class="login-link">Log in</a>
                    </p>
                </form>
            </div>

            <!-- Security Badge -->
            <div class="security-badge">
                Your information is secure and encrypted
            </div>
        </div>
    </div>

    <!-- Scripts - Password toggle functionality -->
    <script>
        function setupPasswordToggle(toggleId, inputId) {
            const toggle = document.getElementById(toggleId);
            const input = document.getElementById(inputId);
            if (!toggle || !input) return;

            toggle.addEventListener('click', () => {
                const type = input.type === 'password' ? 'text' : 'password';
                input.type = type;

                const eyeOff = toggle.querySelector('.eye-off');
                const eyeOn = toggle.querySelector('.eye-on');

                if (eyeOff && eyeOn) {
                    eyeOff.style.display = type === 'password' ? 'block' : 'none';
                    eyeOn.style.display = type === 'text' ? 'block' : 'none';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            setupPasswordToggle('togglePassword', 'password');
            setupPasswordToggle('togglePasswordConfirm', 'password_confirmation');
        });
    </script>
</body>
</html>
