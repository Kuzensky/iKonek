@extends('layouts.frontend')

@section('title', 'Start a Fundraiser - Step 3 - iKonek')

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
            <a href="{{ route('fundraisers') }}" class="nav-item active">
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
                <div class="user-avatar">P</div>
                <div class="user-details">
                    <div class="user-name">Priya</div>
                    <div class="user-status">Verified Donor</div>
                </div>
            </div>
            <button class="btn btn-outline logout-btn">Logout</button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <!-- Header -->
        <header class="fundraiser-header">
            <div class="header-content">
                <div class="header-back-btn">
                    <a href="{{ route('fundraisers.create.step2') }}" class="back-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Previous Step
                    </a>
                </div>
                <div class="header-text-content">
                    <h1 class="header-title">Your Contact Details 📞</h1>
                    <p class="header-subtitle">We'll use this information to keep you updated on your campaign progress and donations</p>
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
            <div class="step-item active">
                <div class="step-circle">3</div>
                <span class="step-label">Your Details</span>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-circle">4</div>
                <span class="step-label">Payment Setup</span>
            </div>
        </div>

        <!-- Form Container -->
        <div class="fundraiser-form-container">
            <form class="fundraiser-form" id="fundraiserForm">
                <!-- Organizer Information Section -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <img src="{{ asset('assets/icons/profile-blue.svg') }}" alt="" class="section-icon">
                        <div class="section-header-content">
                            <h2 class="section-title">Organizer Information</h2>
                            <p class="section-subtitle">Your contact information as the campaign organizer</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <!-- Your Full Name -->
                        <div class="form-group full-width">
                            <label class="form-label" for="organizerName">
                                Your Full Name
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="organizerName" 
                                class="form-input" 
                                placeholder="Your complete name as it appears on your ID"
                            >
                        </div>

                        <!-- Email Address -->
                        <div class="form-group">
                            <label class="form-label" for="organizerEmail">
                                Email Address
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="organizerEmail" 
                                class="form-input" 
                                placeholder="your.email@example.com"
                            >
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group">
                            <label class="form-label" for="organizerPhone">
                                Phone Number
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="organizerPhone" 
                                class="form-input" 
                                placeholder="+63 912 345 6789"
                                value="+63 "
                                maxlength="16"
                            >
                        </div>
                    </div>
                </div>

                <!-- Progress Indicator -->
                <div class="progress-indicator">
                    <div class="progress-indicator-content">
                        <span class="progress-text">Step 3 of 4</span>
                        <span class="progress-percentage">75% Complete</span>
                    </div>
                    <div class="progress-bar-wrapper">
                        <div class="progress-bar-fill" style="width: 75%"></div>
                    </div>
                </div>

                <!-- Info Notice -->
                <div class="info-notice enhanced">
                    <div class="notice-icon-wrapper">
                        <img src="{{ asset('assets/icons/blue-heart.svg') }}" alt="" class="notice-icon">
                    </div>
                    <div class="notice-content-wrapper">
                        <p class="notice-text">
                            <strong>📧 Stay Connected:</strong> We'll use this information to contact you about your campaign and send updates. You'll also receive instant notifications when donations are made to your campaign.
                        </p>
                    </div>
                </div>
                
                <div class="milestone-indicator">
                    <div class="milestone-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="#FFC107" stroke="#FFA000" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="milestone-text">
                        <p><strong>Almost There!</strong> Just one more step after this and your campaign will be ready for review. 🎉</p>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-outline btn-previous">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Previous
                    </button>
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

    <script>
        // Start Fundraiser Step 3 - Organizer Information
        class OrganizerForm {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.nameInput = document.getElementById('organizerName');
                this.emailInput = document.getElementById('organizerEmail');
                this.phoneInput = document.getElementById('organizerPhone');
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
                // Removed auto-loading of user data - fields are now manual
            }
            
            attachEventListeners() {
                // Phone number formatting
                if (this.phoneInput) {
                    this.phoneInput.addEventListener('input', (e) => this.formatPhoneNumber(e));
                    this.phoneInput.addEventListener('click', (e) => this.handlePhoneClick(e));
                    this.phoneInput.addEventListener('keydown', (e) => this.handlePhoneKeydown(e));
                }
                
                // Form submission
                if (this.form) {
                    this.form.addEventListener('submit', (e) => this.handleSubmit(e));
                }
                
                // Auto-save draft
                const formInputs = this.form.querySelectorAll('input, textarea, select');
                formInputs.forEach(input => {
                    input.addEventListener('change', () => this.saveDraft());
                });
                
                // Previous button
                const prevBtn = document.querySelector('.btn-previous');
                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        window.location.href = 'start-fundraiser-step2.html';
                    });
                }
            }
            
            formatPhoneNumber(e) {
                let value = e.target.value;
                
                // Ensure +63 prefix is always present
                if (!value.startsWith('+63')) {
                    value = '+63 ';
                    e.target.value = value;
                }
                
                // Prevent removing the +63 prefix
                if (value.length < 4) {
                    value = '+63 ';
                    e.target.value = value;
                }
                
                // Format the phone number: +63 XXX XXX XXXX
                const numbers = value.slice(3).replace(/\D/g, '');
                if (numbers.length > 0) {
                    let formatted = '+63 ';
                    if (numbers.length <= 3) {
                        formatted += numbers;
                    } else if (numbers.length <= 6) {
                        formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3);
                    } else {
                        formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3, 6) + ' ' + numbers.slice(6, 10);
                    }
                    e.target.value = formatted;
                }
            }
            
            handlePhoneClick(e) {
                if (e.target.selectionStart < 4) {
                    e.target.setSelectionRange(e.target.value.length, e.target.value.length);
                }
            }
            
            handlePhoneKeydown(e) {
                const input = e.target;
                // Prevent deleting the +63 prefix
                if ((e.key === 'Backspace' || e.key === 'Delete') && input.selectionStart <= 4) {
                    e.preventDefault();
                }
            }
            
            validateEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            validateForm() {
                const errors = [];
                
                // Name validation
                const name = this.nameInput.value.trim();
                if (!name) {
                    errors.push('Your full name is required');
                } else if (name.length < 3) {
                    errors.push('Name must be at least 3 characters');
                }
                
                // Email validation
                const email = this.emailInput.value.trim();
                if (!email) {
                    errors.push('Email address is required');
                } else if (!this.validateEmail(email)) {
                    errors.push('Please enter a valid email address');
                }
                
                // Phone validation
                const phone = this.phoneInput.value;
                if (phone.length < 13) {
                    errors.push('Please enter a valid phone number');
                }
                
                return errors;
            }
            
            handleSubmit(e) {
                e.preventDefault();
                
                const errors = this.validateForm();
                
                if (errors.length > 0) {
                    alert('Please fix the following errors:\n\n' + errors.join('\n'));
                    return;
                }
                
                // Get form data
                const formData = this.getFormData();
                
                // Get existing draft from previous steps
                const existingData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Merge with Step 3 data
                const combinedData = {
                    ...existingData,
                    organizer: formData,
                    currentStep: 3
                };
                
                // Save to localStorage
                localStorage.setItem('fundraiserDraft', JSON.stringify(combinedData));
                
                // Navigate to next step
                window.location.href = 'start-fundraiser-step4.html';
            }
            
            getFormData() {
                return {
                    name: this.nameInput.value.trim(),
                    email: this.emailInput.value.trim(),
                    phone: this.phoneInput.value,
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    
                    // Get existing draft
                    const existingDraft = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Update with organizer data
                    const updatedDraft = {
                        ...existingDraft,
                        organizer: formData,
                        currentStep: 3
                    };
                    
                    localStorage.setItem('fundraiserDraft', JSON.stringify(updatedDraft));
                    console.log('Organizer draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    const organizer = data.organizer;
                    
                    if (!organizer) return;
                    
                    // Restore form values
                    if (organizer.name) {
                        this.nameInput.value = organizer.name;
                    }
                    
                    if (organizer.email) {
                        this.emailInput.value = organizer.email;
                    }
                    
                    if (organizer.phone) {
                        this.phoneInput.value = organizer.phone;
                    }
                    
                    console.log('Organizer draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new OrganizerForm();
            });
        } else {
            new OrganizerForm();
        }

        // Logout functionality
        const logoutBtn = document.querySelector('.logout-btn');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to logout?')) {
                    this.textContent = 'Logging out...';
                    this.disabled = true;
                    setTimeout(() => {
                        localStorage.removeItem('isLoggedIn');
                        localStorage.removeItem('userData');
                        window.location.href = "{{ route('login') }}";
                    }, 800);
                }
            });
        }
    </script>
@endsection

@push('scripts')
    <script>

        // Start Fundraiser Step 3 - Organizer Information
        class OrganizerForm {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.nameInput = document.getElementById('organizerName');
                this.emailInput = document.getElementById('organizerEmail');
                this.phoneInput = document.getElementById('organizerPhone');
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
                // Removed auto-loading of user data - fields are now manual
            }
            
            attachEventListeners() {
                // Phone number formatting
                if (this.phoneInput) {
                    this.phoneInput.addEventListener('input', (e) => this.formatPhoneNumber(e));
                    this.phoneInput.addEventListener('click', (e) => this.handlePhoneClick(e));
                    this.phoneInput.addEventListener('keydown', (e) => this.handlePhoneKeydown(e));
                }
                
                // Form submission
                if (this.form) {
                    this.form.addEventListener('submit', (e) => this.handleSubmit(e));
                }
                
                // Auto-save draft
                const formInputs = this.form.querySelectorAll('input, textarea, select');
                formInputs.forEach(input => {
                    input.addEventListener('change', () => this.saveDraft());
                });
                
                // Previous button
                const prevBtn = document.querySelector('.btn-previous');
                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        window.location.href = 'start-fundraiser-step2.html';
                    });
                }
            }
            
            formatPhoneNumber(e) {
                let value = e.target.value;
                
                // Ensure +63 prefix is always present
                if (!value.startsWith('+63')) {
                    value = '+63 ';
                    e.target.value = value;
                }
                
                // Prevent removing the +63 prefix
                if (value.length < 4) {
                    value = '+63 ';
                    e.target.value = value;
                }
                
                // Format the phone number: +63 XXX XXX XXXX
                const numbers = value.slice(3).replace(/\D/g, '');
                if (numbers.length > 0) {
                    let formatted = '+63 ';
                    if (numbers.length <= 3) {
                        formatted += numbers;
                    } else if (numbers.length <= 6) {
                        formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3);
                    } else {
                        formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3, 6) + ' ' + numbers.slice(6, 10);
                    }
                    e.target.value = formatted;
                }
            }
            
            handlePhoneClick(e) {
                if (e.target.selectionStart < 4) {
                    e.target.setSelectionRange(e.target.value.length, e.target.value.length);
                }
            }
            
            handlePhoneKeydown(e) {
                const input = e.target;
                // Prevent deleting the +63 prefix
                if ((e.key === 'Backspace' || e.key === 'Delete') && input.selectionStart <= 4) {
                    e.preventDefault();
                }
            }
            
            validateEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            validateForm() {
                const errors = [];
                
                // Name validation
                const name = this.nameInput.value.trim();
                if (!name) {
                    errors.push('Your full name is required');
                } else if (name.length < 3) {
                    errors.push('Name must be at least 3 characters');
                }
                
                // Email validation
                const email = this.emailInput.value.trim();
                if (!email) {
                    errors.push('Email address is required');
                } else if (!this.validateEmail(email)) {
                    errors.push('Please enter a valid email address');
                }
                
                // Phone validation
                const phone = this.phoneInput.value;
                if (phone.length < 13) {
                    errors.push('Please enter a valid phone number');
                }
                
                return errors;
            }
            
            handleSubmit(e) {
                e.preventDefault();
                
                const errors = this.validateForm();
                
                if (errors.length > 0) {
                    alert('Please fix the following errors:\n\n' + errors.join('\n'));
                    return;
                }
                
                // Get form data
                const formData = this.getFormData();
                
                // Get existing draft from previous steps
                const existingData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Merge with Step 3 data
                const combinedData = {
                    ...existingData,
                    organizer: formData,
                    currentStep: 3
                };
                
                // Save to localStorage
                localStorage.setItem('fundraiserDraft', JSON.stringify(combinedData));
                
                // Navigate to next step
                window.location.href = 'start-fundraiser-step4.html';
            }
            
            getFormData() {
                return {
                    name: this.nameInput.value.trim(),
                    email: this.emailInput.value.trim(),
                    phone: this.phoneInput.value,
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    
                    // Get existing draft
                    const existingDraft = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Update with organizer data
                    const updatedDraft = {
                        ...existingDraft,
                        organizer: formData,
                        currentStep: 3
                    };
                    
                    localStorage.setItem('fundraiserDraft', JSON.stringify(updatedDraft));
                    console.log('Organizer draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    const organizer = data.organizer;
                    
                    if (!organizer) return;
                    
                    // Restore form values
                    if (organizer.name) {
                        this.nameInput.value = organizer.name;
                    }
                    
                    if (organizer.email) {
                        this.emailInput.value = organizer.email;
                    }
                    
                    if (organizer.phone) {
                        this.phoneInput.value = organizer.phone;
                    }
                    
                    console.log('Organizer draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new OrganizerForm();
            });
        } else {
            new OrganizerForm();
        }

        // Logout functionality
        const logoutBtn = document.querySelector('.logout-btn');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to logout?')) {
                    this.textContent = 'Logging out...';
                    this.disabled = true;
                    setTimeout(() => {
                        localStorage.removeItem('isLoggedIn');
                        localStorage.removeItem('userData');
                        window.location.href = "{{ route('login') }}";
                    }, 800);
                }
            });
        }
    
    </script>
@endpush
