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

        <!-- Form Container -->
        <div class="fundraiser-form-container">
            <form class="fundraiser-form" id="fundraiserForm">
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
                            <label class="form-label" for="paymentMethod">
                                Bank / E-Wallet
                                <span class="required">*</span>
                            </label>
                            <select id="paymentMethod" class="form-select">
                                <option value="">Select your bank or e-wallet</option>
                                <optgroup label="Banks">
                                    <option value="bdo">BDO - Banco de Oro</option>
                                    <option value="bpi">BPI - Bank of the Philippine Islands</option>
                                    <option value="metrobank">Metrobank</option>
                                    <option value="unionbank">UnionBank</option>
                                    <option value="landbank">LandBank</option>
                                    <option value="pnb">PNB - Philippine National Bank</option>
                                    <option value="securitybank">Security Bank</option>
                                    <option value="chinabank">China Bank</option>
                                    <option value="rcbc">RCBC</option>
                                </optgroup>
                                <optgroup label="E-Wallets">
                                    <option value="gcash">GCash</option>
                                    <option value="maya">Maya (PayMaya)</option>
                                    <option value="grabpay">GrabPay</option>
                                    <option value="paymongo">PayMongo</option>
                                </optgroup>
                            </select>
                        </div>

                        <!-- Account Number -->
                        <div class="form-group">
                            <label class="form-label" for="accountNumber">
                                Account Number
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="accountNumber" 
                                class="form-input" 
                                placeholder="1234567890"
                                maxlength="20"
                            >
                        </div>

                        <!-- Account Name -->
                        <div class="form-group">
                            <label class="form-label" for="accountName">
                                Account Name
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="accountName" 
                                class="form-input" 
                                placeholder="Name as it appears on account"
                            >
                        </div>
                    </div>
                </div>

                <!-- Progress Indicator -->
                <div class="progress-indicator final-step">
                    <div class="progress-indicator-content">
                        <span class="progress-text">Final Step! 🎉</span>
                        <span class="progress-percentage">Almost Done</span>
                    </div>
                    <div class="progress-bar-wrapper">
                        <div class="progress-bar-fill" style="width: 95%"></div>
                    </div>
                </div>

                <!-- Platform Fee Notice -->
                <div class="fee-notice enhanced">
                    <div class="fee-notice-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="#457B9D" stroke-width="2"/>
                            <path d="M12 16V12M12 8H12.01" stroke="#457B9D" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="fee-notice-content">
                        <p class="notice-title">Platform Fee & Security</p>
                        <p class="notice-text">
                            iKonek charges a <strong>5% platform fee</strong> on successful donations to maintain and improve our services. All payment information is encrypted and securely verified. Funds will be transferred to your account within 5-7 business days after verification.
                        </p>
                        <div class="security-badges">
                            <span class="security-badge">🔒 Bank-level Encryption</span>
                            <span class="security-badge">✓ Verified Payments</span>
                            <span class="security-badge">🛡️ Fraud Protection</span>
                        </div>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="terms-section">
                    <label class="checkbox-container">
                        <input type="checkbox" id="agreeTerms" class="checkbox-input">
                        <span class="checkbox-custom"></span>
                        <span class="checkbox-label">
                            I agree to the <a href="#" class="terms-link">Terms and Conditions</a> and <a href="#" class="terms-link">Privacy Policy</a>.
                        </span>
                    </label>
                    
                    <div class="confirmation-text">
                        <p>I confirm that all information provided is accurate and truthful, and that I have the legal right to create this fundraiser on behalf of the beneficiary. I understand that providing false information may result in campaign suspension and legal action.</p>
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
                    <button type="submit" class="btn btn-primary btn-submit">
                        Submit for Review
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div class="confirmation-modal" id="confirmationModal">
        <div class="modal-overlay" id="modalOverlay"></div>
        <div class="modal-content confirmation-modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirm Fundraiser Submission</h2>
            </div>
            
            <div class="modal-body">
                <p class="modal-description">
                    Please review your campaign details before submitting. Once submitted, your fundraiser will be reviewed by our team within 24-48 hours.
                </p>
                
                <div class="confirmation-details">
                    <div class="detail-item">
                        <span class="detail-label">Campaign Title</span>
                        <span class="detail-value" id="confirmTitle">-</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Goal Amount</span>
                        <span class="detail-value" id="confirmGoal">-</span>
                    </div>
                    
                    <div class="detail-item">
                        <span class="detail-label">Beneficiary</span>
                        <span class="detail-value" id="confirmBeneficiary">-</span>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" id="reviewAgainBtn">
                    Review Again
                </button>
                <button type="button" class="btn btn-primary" id="confirmSubmitBtn">
                    Confirm & Submit
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        // Start Fundraiser Step 4 - Payment Information
        class PaymentForm {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.paymentMethodSelect = document.getElementById('paymentMethod');
                this.accountNumberInput = document.getElementById('accountNumber');
                this.accountNameInput = document.getElementById('accountName');
                this.agreeTermsCheckbox = document.getElementById('agreeTerms');
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
            }
            
            attachEventListeners() {
                // Account number formatting
                if (this.accountNumberInput) {
                    this.accountNumberInput.addEventListener('input', (e) => this.formatAccountNumber(e));
                }
                
                // Form submission
                if (this.form) {
                    this.form.addEventListener('submit', (e) => this.handleSubmit(e));
                }
                
                // Auto-save draft
                const formInputs = this.form.querySelectorAll('input, select');
                formInputs.forEach(input => {
                    if (input.type !== 'checkbox') {
                        input.addEventListener('change', () => this.saveDraft());
                    }
                });
                
                // Previous button
                const prevBtn = document.querySelector('.btn-previous');
                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        window.location.href = 'start-fundraiser-step3.html';
                    });
                }
                
                // Terms links
                document.querySelectorAll('.terms-link').forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        alert('Terms and Conditions / Privacy Policy will be displayed here.');
                    });
                });
            }
            
            formatAccountNumber(e) {
                // Remove non-numeric characters
                let value = e.target.value.replace(/\D/g, '');
                e.target.value = value;
            }
            
            validateForm() {
                const errors = [];
                
                // Payment method validation
                const paymentMethod = this.paymentMethodSelect.value;
                if (!paymentMethod) {
                    errors.push('Please select a bank or e-wallet');
                }
                
                // Account number validation
                const accountNumber = this.accountNumberInput.value.trim();
                if (!accountNumber) {
                    errors.push('Account number is required');
                } else if (accountNumber.length < 8) {
                    errors.push('Account number must be at least 8 digits');
                }
                
                // Account name validation
                const accountName = this.accountNameInput.value.trim();
                if (!accountName) {
                    errors.push('Account name is required');
                } else if (accountName.length < 3) {
                    errors.push('Account name must be at least 3 characters');
                }
                
                // Terms agreement validation
                if (!this.agreeTermsCheckbox.checked) {
                    errors.push('You must agree to the Terms and Conditions');
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
                
                // Save draft before showing confirmation
                this.saveDraft();
                
                // Show confirmation modal
                this.showConfirmationModal();
            }
            
            showConfirmationModal() {
                const modal = document.getElementById('confirmationModal');
                const overlay = document.getElementById('modalOverlay');
                const reviewAgainBtn = document.getElementById('reviewAgainBtn');
                const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
                
                // Get draft data
                const draftData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Populate confirmation details
                document.getElementById('confirmTitle').textContent = draftData.title || '-';
                document.getElementById('confirmGoal').textContent = draftData.goalAmount 
                    ? `₱${new Intl.NumberFormat('en-PH').format(draftData.goalAmount)}` 
                    : '-';
                document.getElementById('confirmBeneficiary').textContent = 
                    draftData.beneficiary?.name || '-';
                
                // Show modal
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                setTimeout(() => {
                    modal.classList.add('active');
                }, 10);
                
                // Review Again button
                reviewAgainBtn.onclick = () => {
                    this.closeConfirmationModal();
                };
                
                // Confirm & Submit button
                confirmSubmitBtn.onclick = () => {
                    this.closeConfirmationModal();
                    this.submitFundraiser();
                };
                
                // Close on overlay click
                overlay.onclick = () => {
                    this.closeConfirmationModal();
                };
                
                // Close on ESC key
                const escHandler = (e) => {
                    if (e.key === 'Escape') {
                        this.closeConfirmationModal();
                        document.removeEventListener('keydown', escHandler);
                    }
                };
                document.addEventListener('keydown', escHandler);
            }
            
            closeConfirmationModal() {
                const modal = document.getElementById('confirmationModal');
                modal.classList.remove('active');
                document.body.style.overflow = '';
                
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }
            
            submitFundraiser() {
                // Get form data
                const formData = this.getFormData();
                
                // Get existing draft from previous steps
                const existingData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Merge with Step 4 data
                const finalData = {
                    ...existingData,
                    payment: formData,
                    currentStep: 4,
                    status: 'pending_review',
                    submittedAt: new Date().toISOString()
                };
                
                // Save final data
                localStorage.setItem('fundraiserDraft', JSON.stringify(finalData));
                
                // Show success message
                this.showSuccessMessage(finalData);
            }
            
            getFormData() {
                return {
                    paymentMethod: this.paymentMethodSelect.value,
                    paymentMethodName: this.paymentMethodSelect.options[this.paymentMethodSelect.selectedIndex].text,
                    accountNumber: this.accountNumberInput.value.trim(),
                    accountName: this.accountNameInput.value.trim(),
                    agreedToTerms: this.agreeTermsCheckbox.checked,
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    
                    // Get existing draft
                    const existingDraft = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Update with payment data
                    const updatedDraft = {
                        ...existingDraft,
                        payment: formData,
                        currentStep: 4
                    };
                    
                    localStorage.setItem('fundraiserDraft', JSON.stringify(updatedDraft));
                    console.log('Payment draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    const payment = data.payment;
                    
                    if (!payment) return;
                    
                    // Restore form values
                    if (payment.paymentMethod) {
                        this.paymentMethodSelect.value = payment.paymentMethod;
                    }
                    
                    if (payment.accountNumber) {
                        this.accountNumberInput.value = payment.accountNumber;
                    }
                    
                    if (payment.accountName) {
                        this.accountNameInput.value = payment.accountName;
                    }
                    
                    if (payment.agreedToTerms) {
                        this.agreeTermsCheckbox.checked = true;
                    }
                    
                    console.log('Payment draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
            
            showSuccessMessage(data) {
                // Redirect to success page
                window.location.href = 'start-fundraiser-success.html';
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new PaymentForm();
            });
        } else {
            new PaymentForm();
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

        // Start Fundraiser Step 4 - Payment Information
        class PaymentForm {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.paymentMethodSelect = document.getElementById('paymentMethod');
                this.accountNumberInput = document.getElementById('accountNumber');
                this.accountNameInput = document.getElementById('accountName');
                this.agreeTermsCheckbox = document.getElementById('agreeTerms');
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
            }
            
            attachEventListeners() {
                // Account number formatting
                if (this.accountNumberInput) {
                    this.accountNumberInput.addEventListener('input', (e) => this.formatAccountNumber(e));
                }
                
                // Form submission
                if (this.form) {
                    this.form.addEventListener('submit', (e) => this.handleSubmit(e));
                }
                
                // Auto-save draft
                const formInputs = this.form.querySelectorAll('input, select');
                formInputs.forEach(input => {
                    if (input.type !== 'checkbox') {
                        input.addEventListener('change', () => this.saveDraft());
                    }
                });
                
                // Previous button
                const prevBtn = document.querySelector('.btn-previous');
                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        window.location.href = 'start-fundraiser-step3.html';
                    });
                }
                
                // Terms links
                document.querySelectorAll('.terms-link').forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        alert('Terms and Conditions / Privacy Policy will be displayed here.');
                    });
                });
            }
            
            formatAccountNumber(e) {
                // Remove non-numeric characters
                let value = e.target.value.replace(/\D/g, '');
                e.target.value = value;
            }
            
            validateForm() {
                const errors = [];
                
                // Payment method validation
                const paymentMethod = this.paymentMethodSelect.value;
                if (!paymentMethod) {
                    errors.push('Please select a bank or e-wallet');
                }
                
                // Account number validation
                const accountNumber = this.accountNumberInput.value.trim();
                if (!accountNumber) {
                    errors.push('Account number is required');
                } else if (accountNumber.length < 8) {
                    errors.push('Account number must be at least 8 digits');
                }
                
                // Account name validation
                const accountName = this.accountNameInput.value.trim();
                if (!accountName) {
                    errors.push('Account name is required');
                } else if (accountName.length < 3) {
                    errors.push('Account name must be at least 3 characters');
                }
                
                // Terms agreement validation
                if (!this.agreeTermsCheckbox.checked) {
                    errors.push('You must agree to the Terms and Conditions');
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
                
                // Save draft before showing confirmation
                this.saveDraft();
                
                // Show confirmation modal
                this.showConfirmationModal();
            }
            
            showConfirmationModal() {
                const modal = document.getElementById('confirmationModal');
                const overlay = document.getElementById('modalOverlay');
                const reviewAgainBtn = document.getElementById('reviewAgainBtn');
                const confirmSubmitBtn = document.getElementById('confirmSubmitBtn');
                
                // Get draft data
                const draftData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Populate confirmation details
                document.getElementById('confirmTitle').textContent = draftData.title || '-';
                document.getElementById('confirmGoal').textContent = draftData.goalAmount 
                    ? `₱${new Intl.NumberFormat('en-PH').format(draftData.goalAmount)}` 
                    : '-';
                document.getElementById('confirmBeneficiary').textContent = 
                    draftData.beneficiary?.name || '-';
                
                // Show modal
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                setTimeout(() => {
                    modal.classList.add('active');
                }, 10);
                
                // Review Again button
                reviewAgainBtn.onclick = () => {
                    this.closeConfirmationModal();
                };
                
                // Confirm & Submit button
                confirmSubmitBtn.onclick = () => {
                    this.closeConfirmationModal();
                    this.submitFundraiser();
                };
                
                // Close on overlay click
                overlay.onclick = () => {
                    this.closeConfirmationModal();
                };
                
                // Close on ESC key
                const escHandler = (e) => {
                    if (e.key === 'Escape') {
                        this.closeConfirmationModal();
                        document.removeEventListener('keydown', escHandler);
                    }
                };
                document.addEventListener('keydown', escHandler);
            }
            
            closeConfirmationModal() {
                const modal = document.getElementById('confirmationModal');
                modal.classList.remove('active');
                document.body.style.overflow = '';
                
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            }
            
            submitFundraiser() {
                // Get form data
                const formData = this.getFormData();
                
                // Get existing draft from previous steps
                const existingData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                
                // Merge with Step 4 data
                const finalData = {
                    ...existingData,
                    payment: formData,
                    currentStep: 4,
                    status: 'pending_review',
                    submittedAt: new Date().toISOString()
                };
                
                // Save final data
                localStorage.setItem('fundraiserDraft', JSON.stringify(finalData));
                
                // Show success message
                this.showSuccessMessage(finalData);
            }
            
            getFormData() {
                return {
                    paymentMethod: this.paymentMethodSelect.value,
                    paymentMethodName: this.paymentMethodSelect.options[this.paymentMethodSelect.selectedIndex].text,
                    accountNumber: this.accountNumberInput.value.trim(),
                    accountName: this.accountNameInput.value.trim(),
                    agreedToTerms: this.agreeTermsCheckbox.checked,
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    
                    // Get existing draft
                    const existingDraft = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Update with payment data
                    const updatedDraft = {
                        ...existingDraft,
                        payment: formData,
                        currentStep: 4
                    };
                    
                    localStorage.setItem('fundraiserDraft', JSON.stringify(updatedDraft));
                    console.log('Payment draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    const payment = data.payment;
                    
                    if (!payment) return;
                    
                    // Restore form values
                    if (payment.paymentMethod) {
                        this.paymentMethodSelect.value = payment.paymentMethod;
                    }
                    
                    if (payment.accountNumber) {
                        this.accountNumberInput.value = payment.accountNumber;
                    }
                    
                    if (payment.accountName) {
                        this.accountNameInput.value = payment.accountName;
                    }
                    
                    if (payment.agreedToTerms) {
                        this.agreeTermsCheckbox.checked = true;
                    }
                    
                    console.log('Payment draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
            
            showSuccessMessage(data) {
                // Redirect to success page
                window.location.href = 'start-fundraiser-success.html';
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new PaymentForm();
            });
        } else {
            new PaymentForm();
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
