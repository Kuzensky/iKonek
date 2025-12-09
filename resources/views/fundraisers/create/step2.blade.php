@extends('layouts.frontend')

@section('title', 'Start a Fundraiser - Step 2 - iKonek')

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
        main.dashboard-main { max-width: 100% !important; }
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
                    <a href="{{ route('fundraisers.create.step1') }}" class="back-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Previous Step
                    </a>
                </div>
                <div class="header-text-content">
                    <h1 class="header-title">Beneficiary Information 👥</h1>
                    <p class="header-subtitle">Help us verify who will receive the funds to ensure transparency and donor confidence</p>
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
            <div class="step-item active">
                <div class="step-circle">2</div>
                <span class="step-label">Beneficiary Info</span>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-circle">3</div>
                <span class="step-label">Your Details</span>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
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
            <form class="fundraiser-form" id="fundraiserForm" method="POST" action="{{ route('fundraisers.create.step2.store') }}">
                @csrf
                <!-- Beneficiary Information Section -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <img src="{{ asset('assets/icons/people.svg') }}" alt="" class="section-icon">
                        <div class="section-header-content">
                            <h2 class="section-title">Beneficiary Information</h2>
                            <p class="section-subtitle">Who will receive the funds from this campaign?</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <!-- Beneficiary Full Name -->
                        <div class="form-group full-width">
                            <label class="form-label" for="beneficiary_name">
                                Beneficiary Full Name
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                id="beneficiary_name"
                                name="beneficiary_name"
                                class="form-input @error('beneficiary_name') is-invalid @enderror"
                                placeholder="e.g., Maria Santos Cruz"
                                value="{{ old('beneficiary_name', $data['beneficiary_name'] ?? '') }}"
                                required
                            >
                        </div>

                        <!-- Your Relationship to Beneficiary -->
                        <div class="form-group full-width">
                            <label class="form-label" for="beneficiary_relationship">
                                Your Relationship to Beneficiary
                                <span class="required">*</span>
                            </label>
                            <select id="beneficiary_relationship" name="beneficiary_relationship" class="form-select @error('beneficiary_relationship') is-invalid @enderror" required>
                                <option value="">Select relationship</option>
                                <option value="Self (I am the beneficiary)" {{ old('beneficiary_relationship', $data['beneficiary_relationship'] ?? '') == 'Self (I am the beneficiary)' ? 'selected' : '' }}>Self (I am the beneficiary)</option>
                                <option value="Family Member" {{ old('beneficiary_relationship', $data['beneficiary_relationship'] ?? '') == 'Family Member' ? 'selected' : '' }}>Family Member</option>
                                <option value="Friend" {{ old('beneficiary_relationship', $data['beneficiary_relationship'] ?? '') == 'Friend' ? 'selected' : '' }}>Friend</option>
                                <option value="Organization/Charity" {{ old('beneficiary_relationship', $data['beneficiary_relationship'] ?? '') == 'Organization/Charity' ? 'selected' : '' }}>Organization/Charity</option>
                                <option value="Community Member" {{ old('beneficiary_relationship', $data['beneficiary_relationship'] ?? '') == 'Community Member' ? 'selected' : '' }}>Community Member</option>
                                <option value="Other" {{ old('beneficiary_relationship', $data['beneficiary_relationship'] ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <!-- Beneficiary Contact Number -->
                        <div class="form-group full-width">
                            <label class="form-label" for="beneficiary_contact">
                                Beneficiary Contact Number
                                <span class="required">*</span>
                            </label>
                            <input
                                type="tel"
                                id="beneficiary_contact"
                                name="beneficiary_contact"
                                class="form-input @error('beneficiary_contact') is-invalid @enderror"
                                placeholder="+63 912 345 6789"
                                value="{{ old('beneficiary_contact', $data['beneficiary_contact'] ?? '') }}"
                                maxlength="20"
                                required
                            >
                        </div>

                        <!-- Beneficiary Address -->
                        <div class="form-group full-width">
                            <label class="form-label" for="beneficiary_address">
                                Beneficiary Address
                                <span class="required">*</span>
                            </label>
                            <textarea
                                id="beneficiary_address"
                                name="beneficiary_address"
                                class="form-textarea @error('beneficiary_address') is-invalid @enderror"
                                placeholder="Complete address (Street, Barangay, City/Municipality, Province)"
                                rows="3"
                                required
                            >{{ old('beneficiary_address', $data['beneficiary_address'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Progress Indicator -->
                <div class="progress-indicator">
                    <div class="progress-indicator-content">
                        <span class="progress-text">Step 2 of 4</span>
                        <span class="progress-percentage">50% Complete</span>
                    </div>
                    <div class="progress-bar-wrapper">
                        <div class="progress-bar-fill" style="width: 50%"></div>
                    </div>
                </div>

                <!-- Info Notice -->
                <div class="info-notice enhanced">
                    <div class="notice-icon-wrapper">
                        <img src="{{ asset('assets/icons/blue-heart.svg') }}" alt="" class="notice-icon">
                    </div>
                    <div class="notice-content-wrapper">
                        <p class="notice-text">
                            <strong>🛡️ Privacy & Security:</strong> All beneficiary information will be verified to ensure transparency and protect donors. We may contact the beneficiary during our review process to confirm authenticity.
                        </p>
                    </div>
                </div>

                <div class="help-tip-box">
                    <div class="help-tip-icon">📝</div>
                    <div class="help-tip-content">
                        <p><strong>Quick Tip:</strong> Accurate beneficiary details speed up the verification process. Double-check all information before submitting.</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('fundraisers.create.step1') }}" class="btn btn-outline btn-previous">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Previous
                    </a>
                    <button type="submit" class="btn btn-primary btn-continue">
                        Continue
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
    // Phone number formatting
    const phoneInput = document.getElementById('beneficiary_contact');

    if (phoneInput && !phoneInput.value) {
        phoneInput.value = '+63 ';
    }

    if (phoneInput) {
        phoneInput.addEventListener('input', (e) => {
            let value = e.target.value;

            // Ensure +63 prefix
            if (!value.startsWith('+63')) {
                value = '+63 ';
                e.target.value = value;
            }

            // Prevent removing prefix
            if (value.length < 4) {
                value = '+63 ';
                e.target.value = value;
            }
        });

        phoneInput.addEventListener('keydown', (e) => {
            // Prevent deleting the +63 prefix
            if ((e.key === 'Backspace' || e.key === 'Delete') && e.target.selectionStart <= 4) {
                e.preventDefault();
            }
        });
    }
</script>
@endpush
