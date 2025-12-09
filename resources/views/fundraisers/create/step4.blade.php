@extends('layouts.frontend')

@section('title', 'Start a Fundraiser - Step 4 - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/fundraisers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/start-fundraiser.css') }}">
    <style>
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .modal-overlay.active {
            display: flex !important;
            opacity: 1;
        }
        .confirmation-modal {
            background: white;
            border-radius: 16px;
            padding: 32px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            z-index: 100000;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        .modal-overlay.active .confirmation-modal {
            transform: scale(1);
        }
        .modal-header {
            text-align: center;
            margin-bottom: 24px;
        }
        .modal-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }
        .modal-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }
        .modal-subtitle {
            color: #666;
            font-size: 14px;
        }
        .modal-body {
            margin-bottom: 24px;
            min-height: 100px;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .summary-label {
            color: #666;
            font-weight: 500;
        }
        .summary-value {
            color: #1a1a1a;
            font-weight: 600;
        }
        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }
    </style>
@endpush

@section('content')
<!-- Sidebar -->
    <aside class="dashboard-sidebar">
        <div class="sidebar-header">
            <div class="logo">
                <img src="{{ asset('assets/img/ikonek-logo.png') }}" alt="iKonek Logo" class="logo-image">
                <div class="logo-text">
                    <span class="logo-i">i</span>Konek
                </div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('dashboard') }}" class="nav-item">
                <img src="{{ asset('assets/icons/dashboard-blue.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">Dashboard</span>
            </a>
            <a href="{{ route('donations.schedule') }}" class="nav-item">
                <img src="{{ asset('assets/icons/schedule.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">Schedule Donation</span>
            </a>
            <a href="{{ route('history') }}" class="nav-item">
                <img src="{{ asset('assets/icons/history-blue.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">My History</span>
            </a>
            <a href="{{ route('fundraisers.index') }}" class="nav-item active">
                <img src="{{ asset('assets/icons/fundraisers.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">Fundraisers</span>
            </a>
            <a href="{{ route('profile.show') }}" class="nav-item">
                <img src="{{ asset('assets/icons/profile-blue.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">Profile</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-status">Verified Donor</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline logout-btn">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <!-- Header -->
        <header class="fundraiser-header">
            <div class="header-content">
                <div class="header-back-btn">
                    <a href="{{ route('fundraisers.create.step3') }}" class="back-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Previous Step
                    </a>
                </div>
                <div class="header-text-content">
                    <h1 class="header-title">Payment Setup 💳</h1>
                    <p class="header-subtitle">Securely add your payment details where donations will be transferred</p>
                </div>
            </div>
        </header>

        <!-- Progress Steps -->
        <div class="fundraiser-steps">
            <div class="step-item completed">
                <div class="step-circle">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="step-label">Campaign Details</span>
            </div>
            <div class="step-connector completed"></div>
            <div class="step-item completed">
                <div class="step-circle">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="step-label">Beneficiary Info</span>
            </div>
            <div class="step-connector completed"></div>
            <div class="step-item completed">
                <div class="step-circle">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="step-label">Your Details</span>
            </div>
            <div class="step-connector completed"></div>
            <div class="step-item active">
                <div class="step-circle">4</div>
                <span class="step-label">Payment Setup</span>
            </div>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger" style="margin: 20px; padding: 15px; background: #fee; border: 1px solid #fcc; border-radius: 8px; color: #c33;">
                <strong>Please fix the following errors:</strong>
                <ul style="margin-top: 10px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Container -->
        <div class="fundraiser-form-container">
            <form class="fundraiser-form" id="fundraiserForm" method="POST" action="{{ route('fundraisers.create.submit') }}">
                @csrf
                <!-- Payment Information Section -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <img src="{{ asset('assets/icons/money-green.svg') }}" alt="" class="section-icon">
                        <div class="section-header-content">
                            <h2 class="section-title">Payment Information</h2>
                            <p class="section-subtitle">Where should donations be sent?</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <!-- Bank / E-Wallet Selection -->
                        <div class="form-group full-width">
                            <label class="form-label" for="payment_method">
                                Bank / E-Wallet
                                <span class="required">*</span>
                            </label>
                            <select id="payment_method" name="payment_method" class="form-select @error('payment_method') is-invalid @enderror" required>
                                <option value="">Select your bank or e-wallet</option>
                                <optgroup label="Banks">
                                    <option value="BDO">BDO - Banco de Oro</option>
                                    <option value="BPI">BPI - Bank of the Philippine Islands</option>
                                    <option value="Metrobank">Metrobank</option>
                                    <option value="UnionBank">UnionBank</option>
                                    <option value="LandBank">LandBank</option>
                                    <option value="PNB">PNB - Philippine National Bank</option>
                                    <option value="Security Bank">Security Bank</option>
                                    <option value="China Bank">China Bank</option>
                                </optgroup>
                                <optgroup label="E-Wallets">
                                    <option value="GCash">GCash</option>
                                    <option value="PayMaya">PayMaya (Maya)</option>
                                    <option value="GrabPay">GrabPay</option>
                                    <option value="ShopeePay">ShopeePay</option>
                                </optgroup>
                            </select>
                        </div>

                        <!-- Account Number -->
                        <div class="form-group full-width">
                            <label class="form-label" for="account_number">
                                Account Number / Mobile Number
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                id="account_number"
                                name="account_number"
                                class="form-input @error('account_number') is-invalid @enderror"
                                placeholder="Enter your account or mobile number"
                                value="{{ old('account_number', $data['account_number'] ?? '') }}"
                                required
                            >
                            <p class="form-helper">For e-wallets, enter your registered mobile number</p>
                        </div>

                        <!-- Account Name -->
                        <div class="form-group full-width">
                            <label class="form-label" for="account_name">
                                Account Name
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                id="account_name"
                                name="account_name"
                                class="form-input @error('account_name') is-invalid @enderror"
                                placeholder="Full name as shown in your account"
                                value="{{ old('account_name', $data['account_name'] ?? '') }}"
                                required
                            >
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <img src="{{ asset('assets/icons/shield.svg') }}" alt="" class="section-icon">
                        <div class="section-header-content">
                            <h2 class="section-title">Terms & Verification</h2>
                            <p class="section-subtitle">Please review and accept to proceed</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <!-- Terms Checkbox -->
                        <div class="form-group full-width">
                            <label class="checkbox-label">
                                <input type="checkbox" id="terms_agreed" name="terms_agreed" class="form-checkbox" required>
                                <span class="checkbox-text">
                                    I agree to the <a href="#" target="_blank" style="color: #E63946; text-decoration: underline;">Terms and Conditions</a> and understand that:
                                    <ul style="margin-top: 8px; margin-left: 20px; font-size: 13px; color: #666;">
                                        <li>All campaigns are subject to review and approval</li>
                                        <li>iKonek charges a 5% platform fee on donations received</li>
                                        <li>Funds will be transferred upon campaign completion or monthly</li>
                                        <li>Fraudulent campaigns will be reported to authorities</li>
                                    </ul>
                                </span>
                            </label>
                        </div>

                        <!-- Information Accuracy Checkbox -->
                        <div class="form-group full-width">
                            <label class="checkbox-label">
                                <input type="checkbox" id="information_accurate" name="information_accurate" class="form-checkbox" required>
                                <span class="checkbox-text">
                                    I certify that all information provided is <strong>accurate and truthful</strong>. I understand that providing false information may result in campaign suspension and legal action.
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Progress Indicator -->
                <div class="progress-indicator">
                    <div class="progress-indicator-content">
                        <span class="progress-text">Step 4 of 4</span>
                        <span class="progress-percentage">100% Complete</span>
                    </div>
                    <div class="progress-bar-wrapper">
                        <div class="progress-bar-fill" style="width: 100%"></div>
                    </div>
                </div>

                <!-- Info Notice -->
                <div class="info-notice enhanced">
                    <div class="notice-icon-wrapper">
                        <img src="{{ asset('assets/icons/blue-heart.svg') }}" alt="" class="notice-icon">
                    </div>
                    <div class="notice-content-wrapper">
                        <p class="notice-text">
                            <strong>🔐 Bank-Level Security:</strong> All payment information is encrypted and securely stored. We never share your financial details with unauthorized parties.
                        </p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('fundraisers.create.step3') }}" class="btn btn-outline btn-previous">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Previous
                    </a>
                    <button type="submit" class="btn btn-primary btn-submit">
                        Submit Campaign
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    const fundraiserForm = document.getElementById('fundraiserForm');

    // Add confirmation on form submit
    if (fundraiserForm) {
        fundraiserForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Show simple confirmation dialog
            const confirmed = confirm('Are you ready to submit your campaign?\n\nYour campaign will be reviewed by our team before going live. You will receive a notification once it has been approved.\n\nClick OK to submit or Cancel to review your details.');

            if (confirmed) {
                // Show loading state on submit button
                const submitBtn = fundraiserForm.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<span style="display: inline-flex; align-items: center; gap: 8px;">Submitting... <span style="display: inline-block; width: 16px; height: 16px; border: 2px solid #fff; border-top-color: transparent; border-radius: 50%; animation: spin 0.6s linear infinite;"></span></span>';
                    submitBtn.disabled = true;
                }

                // Submit the form
                this.submit();
            }
        });
    }
</script>
<style>
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
</style>
@endpush
