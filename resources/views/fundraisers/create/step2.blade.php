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

        <!-- Form Container -->
        <div class="fundraiser-form-container">
            <form class="fundraiser-form" id="fundraiserForm">
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
                            <label class="form-label" for="beneficiaryName">
                                Beneficiary Full Name
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="beneficiaryName" 
                                class="form-input" 
                                placeholder="e.g., Maria Santos Cruz"
                            >
                        </div>

                        <!-- Your Relationship to Beneficiary -->
                        <div class="form-group full-width">
                            <label class="form-label" for="relationship">
                                Your Relationship to Beneficiary
                                <span class="required">*</span>
                            </label>
                            <select id="relationship" class="form-select">
                                <option value="">Select relationship</option>
                                <option value="self">Self (I am the beneficiary)</option>
                                <option value="family">Family Member</option>
                                <option value="friend">Friend</option>
                                <option value="organization">Organization/Charity</option>
                                <option value="community">Community Member</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <!-- Beneficiary Contact Number -->
                        <div class="form-group full-width">
                            <label class="form-label" for="beneficiaryPhone">
                                Beneficiary Contact Number
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="tel" 
                                id="beneficiaryPhone" 
                                class="form-input" 
                                placeholder="+63 912 345 6789"
                                value="+63 "
                                maxlength="16"
                            >
                        </div>

                        <!-- Beneficiary Address -->
                        <div class="form-group full-width">
                            <label class="form-label" for="beneficiaryAddress">
                                Beneficiary Address
                                <span class="required">*</span>
                            </label>
                            <textarea 
                                id="beneficiaryAddress" 
                                class="form-textarea"
                                placeholder="Complete address (Street, Barangay, City/Municipality, Province)"
                                rows="3"
                            ></textarea>
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
        // Start Fundraiser Step 2 - Beneficiary Information
        class BeneficiaryForm {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.nameInput = document.getElementById('beneficiaryName');
                this.relationshipSelect = document.getElementById('relationship');
                this.phoneInput = document.getElementById('beneficiaryPhone');
                this.addressInput = document.getElementById('beneficiaryAddress');
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
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
                        window.location.href = 'start-fundraiser-step1.html';
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
            
            validateForm() {
                const errors = [];
                
                // Name validation
                const name = this.nameInput.value.trim();
                if (!name) {
                    errors.push('Beneficiary full name is required');
                } else if (name.length < 3) {
                    errors.push('Beneficiary name must be at least 3 characters');
                }
                
                // Relationship validation
                const relationship = this.relationshipSelect.value;
                if (!relationship) {
                    errors.push('Please select your relationship to the beneficiary');
                }
                
                // Phone validation
                const phone = this.phoneInput.value;
                if (phone.length < 13) {
                    errors.push('Please enter a valid contact number');
                }
                
                // Address validation
                const address = this.addressInput.value.trim();
                if (!address) {
                    errors.push('Beneficiary address is required');
                } else if (address.length < 10) {
                    errors.push('Please enter a complete address');
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
                
                // Get existing draft from Step 1
                const step1Data = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Merge with Step 2 data
                const combinedData = {
                    ...step1Data,
                    beneficiary: formData,
                    currentStep: 2
                };
                
                // Save to localStorage
                localStorage.setItem('fundraiserDraft', JSON.stringify(combinedData));
                
                // Navigate to next step
                window.location.href = 'start-fundraiser-step3.html';
            }
            
            getFormData() {
                return {
                    name: this.nameInput.value.trim(),
                    relationship: this.relationshipSelect.value,
                    phone: this.phoneInput.value,
                    address: this.addressInput.value.trim(),
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    
                    // Get existing draft
                    const existingDraft = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Update with beneficiary data
                    const updatedDraft = {
                        ...existingDraft,
                        beneficiary: formData,
                        currentStep: 2
                    };
                    
                    localStorage.setItem('fundraiserDraft', JSON.stringify(updatedDraft));
                    console.log('Beneficiary draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    const beneficiary = data.beneficiary;
                    
                    if (!beneficiary) return;
                    
                    // Restore form values
                    if (beneficiary.name) {
                        this.nameInput.value = beneficiary.name;
                    }
                    
                    if (beneficiary.relationship) {
                        this.relationshipSelect.value = beneficiary.relationship;
                    }
                    
                    if (beneficiary.phone) {
                        this.phoneInput.value = beneficiary.phone;
                    }
                    
                    if (beneficiary.address) {
                        this.addressInput.value = beneficiary.address;
                    }
                    
                    console.log('Beneficiary draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new BeneficiaryForm();
            });
        } else {
            new BeneficiaryForm();
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

        // Start Fundraiser Step 2 - Beneficiary Information
        class BeneficiaryForm {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.nameInput = document.getElementById('beneficiaryName');
                this.relationshipSelect = document.getElementById('relationship');
                this.phoneInput = document.getElementById('beneficiaryPhone');
                this.addressInput = document.getElementById('beneficiaryAddress');
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
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
                        window.location.href = 'start-fundraiser-step1.html';
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
            
            validateForm() {
                const errors = [];
                
                // Name validation
                const name = this.nameInput.value.trim();
                if (!name) {
                    errors.push('Beneficiary full name is required');
                } else if (name.length < 3) {
                    errors.push('Beneficiary name must be at least 3 characters');
                }
                
                // Relationship validation
                const relationship = this.relationshipSelect.value;
                if (!relationship) {
                    errors.push('Please select your relationship to the beneficiary');
                }
                
                // Phone validation
                const phone = this.phoneInput.value;
                if (phone.length < 13) {
                    errors.push('Please enter a valid contact number');
                }
                
                // Address validation
                const address = this.addressInput.value.trim();
                if (!address) {
                    errors.push('Beneficiary address is required');
                } else if (address.length < 10) {
                    errors.push('Please enter a complete address');
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
                
                // Get existing draft from Step 1
                const step1Data = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Merge with Step 2 data
                const combinedData = {
                    ...step1Data,
                    beneficiary: formData,
                    currentStep: 2
                };
                
                // Save to localStorage
                localStorage.setItem('fundraiserDraft', JSON.stringify(combinedData));
                
                // Navigate to next step
                window.location.href = 'start-fundraiser-step3.html';
            }
            
            getFormData() {
                return {
                    name: this.nameInput.value.trim(),
                    relationship: this.relationshipSelect.value,
                    phone: this.phoneInput.value,
                    address: this.addressInput.value.trim(),
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    
                    // Get existing draft
                    const existingDraft = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Update with beneficiary data
                    const updatedDraft = {
                        ...existingDraft,
                        beneficiary: formData,
                        currentStep: 2
                    };
                    
                    localStorage.setItem('fundraiserDraft', JSON.stringify(updatedDraft));
                    console.log('Beneficiary draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    const beneficiary = data.beneficiary;
                    
                    if (!beneficiary) return;
                    
                    // Restore form values
                    if (beneficiary.name) {
                        this.nameInput.value = beneficiary.name;
                    }
                    
                    if (beneficiary.relationship) {
                        this.relationshipSelect.value = beneficiary.relationship;
                    }
                    
                    if (beneficiary.phone) {
                        this.phoneInput.value = beneficiary.phone;
                    }
                    
                    if (beneficiary.address) {
                        this.addressInput.value = beneficiary.address;
                    }
                    
                    console.log('Beneficiary draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new BeneficiaryForm();
            });
        } else {
            new BeneficiaryForm();
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
