@extends('layouts.frontend')

@section('title', 'Schedule Donation - Health Info - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/schedule-donation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/modal.css') }}">
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
            <a href="{{ route('donations.schedule') }}" class="nav-item active">
                <img src="{{ asset('assets/icons/schedule.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">Schedule Donation</span>
            </a>
            <a href="{{ route('history') }}" class="nav-item">
                <img src="{{ asset('assets/icons/history-blue.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">My History</span>
            </a>
            <a href="{{ route('fundraisers.index') }}" class="nav-item">
                <img src="{{ asset('assets/icons/fundraisers-blue.svg') }}" alt="" class="nav-icon" width="20" height="20">
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
        <div class="schedule-donation-container">
            <!-- Page Header -->
            <div class="page-header">
                <div class="header-top">
                    <h1 class="page-title">Schedule a Donation</h1>
                    <div class="progress-indicator">
                        <span class="progress-text">Step 3 of 3</span>
                        <div class="progress-bar-mini">
                            <div class="progress-fill-mini" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <p class="page-subtitle">Almost done! Just a few health questions to ensure a safe donation</p>
            </div>

            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="step-item step-completed" role="tab" aria-selected="false" aria-label="Step 1: Location completed">
                    <div class="step-content">
                        <div class="step-number" aria-hidden="true">
                            <span class="step-number-text">1</span>
                            <svg class="step-check" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3333 4L6 11.3333L2.66667 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="step-connector"></div>
                    </div>
                    <div class="step-label-wrapper">
                        <div class="step-label">Location</div>
                        <div class="step-sublabel">Completed</div>
                    </div>
                </div>
                <div class="step-item step-completed" role="tab" aria-selected="false" aria-label="Step 2: Contact completed">
                    <div class="step-content">
                        <div class="step-number" aria-hidden="true">
                            <span class="step-number-text">2</span>
                            <svg class="step-check" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3333 4L6 11.3333L2.66667 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="step-connector"></div>
                    </div>
                    <div class="step-label-wrapper">
                        <div class="step-label">Contact</div>
                        <div class="step-sublabel">Completed</div>
                    </div>
                </div>
                <div class="step-item step-active" role="tab" aria-selected="true" aria-label="Step 3: Health Information">
                    <div class="step-content">
                        <div class="step-number" aria-hidden="true">
                            <span class="step-number-text">3</span>
                            <svg class="step-check" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3333 4L6 11.3333L2.66667 8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    <div class="step-label-wrapper">
                        <div class="step-label">Health</div>
                        <div class="step-sublabel">Final step</div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="schedule-card">
                <div class="schedule-card-header">
                    <div class="card-header-title">
                        <img src="{{ asset('assets/icons/shield.svg') }}" alt="" class="card-icon" width="20" height="20">
                        <h2 class="card-title">Health Information</h2>
                    </div>
                    <p class="card-description">Help us ensure a safe donation experience</p>
                </div>

                <div class="schedule-card-content">
                    <form id="healthForm" class="schedule-form" aria-label="Health information form">
                        <!-- Last Donation Date -->
                        <div class="form-group">
                            <label for="lastDonation" class="form-label">
                                <span class="label-text">Last Donation Date (Optional)</span>
                                <button type="button" class="help-icon" aria-label="Help: Last donation date" title="If you've donated before, enter the date. We'll verify you've waited the required 8 weeks between donations.">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </label>
                            <input 
                                type="date" 
                                id="lastDonation" 
                                name="lastDonation" 
                                class="form-input"
                                aria-describedby="lastDonationHelp"
                            >
                            <p id="lastDonationHelp" class="form-helper-text">You must wait at least 8 weeks (56 days) between whole blood donations</p>
                            <div class="field-status" role="status" aria-live="polite"></div>
                        </div>

                        <!-- Medical Conditions -->
                        <div class="form-group">
                            <label for="medicalConditions" class="form-label">
                                <span class="label-text">Medical Conditions (Optional)</span>
                                <button type="button" class="help-icon" aria-label="Help: Medical conditions" title="Include any chronic conditions, recent illnesses, allergies, or health concerns. This helps us ensure your safety and the safety of recipients.">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </label>
                            <textarea 
                                id="medicalConditions" 
                                name="medicalConditions" 
                                class="form-textarea"
                                rows="4"
                                placeholder="e.g., High blood pressure, diabetes, asthma, allergies to medications..."
                                aria-describedby="medicalHelp"
                            ></textarea>
                            <p id="medicalHelp" class="form-helper-text">This information is confidential and helps us ensure a safe donation</p>
                            <div class="field-status" role="status" aria-live="polite"></div>
                        </div>

                        <!-- Current Medications -->
                        <div class="form-group">
                            <label for="medications" class="form-label">
                                <span class="label-text">Current Medications (Optional)</span>
                                <button type="button" class="help-icon" aria-label="Help: Current medications" title="List all prescription medications, over-the-counter drugs, vitamins, and supplements you're currently taking. Include dosage if known.">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </label>
                            <textarea 
                                id="medications" 
                                name="medications" 
                                class="form-textarea"
                                rows="4"
                                placeholder="e.g., Aspirin 100mg daily, Vitamin C supplements, Birth control pills..."
                                aria-describedby="medicationsHelp"
                            ></textarea>
                            <p id="medicationsHelp" class="form-helper-text">Include prescription drugs, vitamins, and supplements. Some medications may affect donation eligibility</p>
                            <div class="field-status" role="status" aria-live="polite"></div>
                        </div>

                        <!-- Eligibility Requirements Box -->
                        <div class="eligibility-notice">
                            <svg class="eligibility-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <div class="eligibility-content">
                                <p class="eligibility-title">Eligibility Requirements:</p>
                                <ul class="eligibility-list">
                                    <li>Must be at least 18 years old</li>
                                    <li>Weigh at least 50 kg (110 lbs)</li>
                                    <li>Be in good health</li>
                                    <li>Well-rested and have eaten a meal</li>
                                    <li>Wait at least 8 weeks between whole blood donations</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Confirmation Checkbox -->
                        <div class="form-group">
                            <div class="confirmation-checkbox">
                                <input 
                                    type="checkbox" 
                                    id="confirmation" 
                                    name="confirmation" 
                                    class="form-checkbox"
                                    required
                                    aria-required="true"
                                    aria-describedby="confirmationHelp"
                                >
                                <label for="confirmation" class="checkbox-label">
                                    <span class="checkbox-title">I confirm that the information provided is accurate and I meet the eligibility requirements for blood donation. I understand that false information may put recipients at risk.</span>
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="form-actions-wrapper">
                <div class="form-actions-info">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Final step! Review and confirm your appointment</span>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="previousBtn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="btn-text">Previous</span>
                    </button>
                    <button type="button" class="btn btn-confirm" id="confirmBtn" disabled>
                        <span class="btn-text">Confirm Appointment</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <!-- Confirmation Modal (Hidden by default) -->
    <div id="confirmationModal" class="modal confirmation-modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription" style="display: none;">
        <div class="modal-overlay" aria-hidden="true"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalTitle" class="modal-title">Confirm Your Appointment</h2>
                <p id="modalDescription" class="modal-description">Please review your appointment details carefully before confirming.</p>
            </div>
            <div class="modal-body">
                <div class="confirmation-details">
                    <div class="confirmation-details-row">
                        <span class="confirmation-details-label">Date</span>
                        <span class="confirmation-details-value" id="modalDate">-</span>
                    </div>
                    <div class="confirmation-details-row">
                        <span class="confirmation-details-label">Time</span>
                        <span class="confirmation-details-value" id="modalTime">-</span>
                    </div>
                    <div class="confirmation-details-row">
                        <span class="confirmation-details-label">Location</span>
                        <span class="confirmation-details-value" id="modalLocation">-</span>
                    </div>
                    <div class="confirmation-details-row">
                        <span class="confirmation-details-label">Blood Type</span>
                        <span class="confirmation-details-value" id="modalBloodType">-</span>
                    </div>
                </div>
                <div class="confirmation-email-note">
                    A confirmation email will be sent to
                    <strong id="modalEmail">-</strong>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" id="cancelConfirmBtn" aria-label="Cancel and go back">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Cancel</span>
                </button>
                <button type="button" class="btn btn-primary" id="finalConfirmBtn" aria-label="Confirm appointment">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Confirm Appointment</span>
                </button>
            </div>
        </div>
    </div>

    <script>
// Navigation Module code here - same as previous pages
class Navigation {
    constructor() {
        this.nav = document.getElementById('mainNav');
        this.menuToggle = document.getElementById('mobileMenuToggle');
        this.navLinks = document.getElementById('navLinks');
        this.navOverlay = document.getElementById('navOverlay');
        this.links = document.querySelectorAll('.nav-link');
        this.lastScroll = 0;
        this.isMenuOpen = false;
        this.init();
    }
    init() {
        if (!this.nav) return;
        this.setupMobileMenu();
        this.setupScrollBehavior();
        this.setupSmoothScroll();
        this.setupActiveLink();
        this.setupKeyboardNavigation();
        this.handleResize();
    }
    setupMobileMenu() {
        if (!this.menuToggle) return;
        this.menuToggle.addEventListener('click', () => { this.toggleMenu(); });
        if (this.navOverlay) {
            this.navOverlay.addEventListener('click', () => { this.closeMenu(); });
        }
        this.links.forEach(link => {
            link.addEventListener('click', () => { this.closeMenu(); });
        });
        this.navLinks?.addEventListener('touchmove', (e) => {
            if (this.isMenuOpen) { e.stopPropagation(); }
        }, { passive: true });
    }
    toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
        if (this.isMenuOpen) { this.openMenu(); } else { this.closeMenu(); }
    }
    openMenu() {
        this.isMenuOpen = true;
        this.menuToggle?.classList.add('active');
        this.navLinks?.classList.add('active');
        this.navOverlay?.classList.add('active');
        this.menuToggle?.setAttribute('aria-expanded', 'true');
        this.menuToggle?.setAttribute('aria-label', 'Close navigation menu');
        this.navOverlay?.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        setTimeout(() => { this.links[0]?.focus(); }, 300);
    }
    closeMenu() {
        this.isMenuOpen = false;
        this.menuToggle?.classList.remove('active');
        this.navLinks?.classList.remove('active');
        this.navOverlay?.classList.remove('active');
        this.menuToggle?.setAttribute('aria-expanded', 'false');
        this.menuToggle?.setAttribute('aria-label', 'Open navigation menu');
        this.navOverlay?.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }
    setupScrollBehavior() {
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    this.handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }
    handleScroll() {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 50) {
            this.nav.classList.add('scrolled');
        } else {
            this.nav.classList.remove('scrolled');
        }
        if (this.isMenuOpen && Math.abs(currentScroll - this.lastScroll) > 50) {
            this.closeMenu();
        }
        this.lastScroll = currentScroll;
    }
    setupSmoothScroll() {
        this.links.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    const targetId = href.substring(1);
                    const target = document.getElementById(targetId);
                    if (target) {
                        const navHeight = this.nav.offsetHeight;
                        const targetPosition = target.offsetTop - navHeight - 20;
                        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
                        history.pushState(null, null, href);
                        target.setAttribute('tabindex', '-1');
                        target.focus({ preventScroll: true });
                    }
                }
            });
        });
    }
    setupActiveLink() {
        const sections = Array.from(this.links).map(link => {
            const href = link.getAttribute('href');
            if (href && href.startsWith('#')) {
                const id = href.substring(1);
                return document.getElementById(id);
            }
            return null;
        }).filter(Boolean);
        if (sections.length === 0) return;
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    this.updateActiveLink(sections);
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
        this.updateActiveLink(sections);
    }
    updateActiveLink(sections) {
        const scrollPos = window.pageYOffset + this.nav.offsetHeight + 100;
        let currentSection = null;
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionBottom = sectionTop + section.offsetHeight;
            if (sectionTop <= scrollPos && sectionBottom > scrollPos) {
                currentSection = section;
            }
        });
        if (!currentSection && scrollPos < (sections[0]?.offsetTop + 200)) {
            currentSection = sections[0];
        }
        this.links.forEach(link => {
            link.classList.remove('active');
            if (currentSection) {
                const href = link.getAttribute('href');
                if (href === `#${currentSection.id}`) {
                    link.classList.add('active');
                }
            }
        });
    }
    setupKeyboardNavigation() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isMenuOpen) {
                this.closeMenu();
                this.menuToggle?.focus();
            }
        });
        if (this.navLinks) {
            this.navLinks.addEventListener('keydown', (e) => {
                if (!this.isMenuOpen) return;
                if (e.key === 'Tab') {
                    const focusableElements = this.navLinks.querySelectorAll('a, button, [tabindex]:not([tabindex="-1"])');
                    const firstElement = focusableElements[0];
                    const lastElement = focusableElements[focusableElements.length - 1];
                    if (e.shiftKey && document.activeElement === firstElement) {
                        e.preventDefault();
                        lastElement.focus();
                    } else if (!e.shiftKey && document.activeElement === lastElement) {
                        e.preventDefault();
                        firstElement.focus();
                    }
                }
            });
        }
    }
    handleResize() {
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (window.innerWidth > 768 && this.isMenuOpen) {
                    this.closeMenu();
                }
            }, 250);
        });
    }
}

// Health Information Form Module - Schedule Donation Step 3
class HealthInfoForm {
    constructor() {
        this.form = document.getElementById('healthForm');
        this.confirmBtn = document.getElementById('confirmBtn');
        this.previousBtn = document.getElementById('previousBtn');
        this.lastDonationInput = document.getElementById('lastDonation');
        this.medicalConditionsInput = document.getElementById('medicalConditions');
        this.medicationsInput = document.getElementById('medications');
        this.confirmationCheckbox = document.getElementById('confirmation');
        this.modal = document.getElementById('confirmationModal');
        this.init();
    }
    init() {
        this.loadPreviousStepsData();
        this.setDateConstraints();
        this.addEventListeners();
        this.validateForm();
        this.loadSavedData();
    }
    loadPreviousStepsData() {
        const step1Data = localStorage.getItem('scheduleFormData');
        const step2Data = localStorage.getItem('contactFormData');
        if (!step1Data || !step2Data) {
            this.showMessage('Please complete all previous steps', 'error');
            setTimeout(() => {
                if (!step1Data) {
                    window.location.href = '{{ route('donations.schedule') }}';
                } else {
                    window.location.href = '{{ route('donations.step2') }}';
                }
            }, 2000);
            return false;
        }
        return true;
    }
    setDateConstraints() {
        const today = new Date();
        const maxDate = new Date();
        maxDate.setDate(maxDate.getDate() - 56);
        const formatDate = (date) => {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };
        this.lastDonationInput.max = formatDate(today);
    }
    addEventListeners() {
        this.lastDonationInput.addEventListener('change', (e) => {
            this.validateLastDonationDate(e.target);
            this.validateForm();
        });
        this.lastDonationInput.addEventListener('click', function() {
            try { this.showPicker(); } catch (e) { this.focus(); }
        });
        this.medicalConditionsInput.addEventListener('input', () => { this.validateForm(); });
        this.medicationsInput.addEventListener('input', () => { this.validateForm(); });
        this.confirmationCheckbox.addEventListener('change', () => { this.validateForm(); });
        this.confirmBtn.addEventListener('click', () => this.handleConfirm());
        this.previousBtn.addEventListener('click', () => this.handlePrevious());
        let autoSaveTimeout;
        this.form.addEventListener('input', () => {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => this.autoSave(), 1500);
        });
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleConfirm();
        });
        this.setupHelpTooltips();
        document.getElementById('cancelConfirmBtn')?.addEventListener('click', () => { this.closeModal(); });
        document.getElementById('finalConfirmBtn')?.addEventListener('click', () => { this.processFinalConfirmation(); });
        const modalOverlay = document.querySelector('.modal-overlay');
        modalOverlay?.addEventListener('click', () => { this.closeModal(); });
    }
    validateLastDonationDate(input) {
        const value = input.value;
        const statusEl = input.closest('.form-group').querySelector('.field-status');
        if (!statusEl || !value) {
            if (statusEl) statusEl.classList.remove('show');
            input.classList.remove('valid', 'invalid');
            return true;
        }
        const selectedDate = new Date(value);
        const today = new Date();
        const eightWeeksAgo = new Date();
        eightWeeksAgo.setDate(eightWeeksAgo.getDate() - 56);
        if (selectedDate > today) {
            input.classList.remove('valid');
            input.classList.add('invalid');
            statusEl.textContent = 'Date cannot be in the future';
            statusEl.className = 'field-status error show';
            return false;
        }
        if (selectedDate > eightWeeksAgo) {
            input.classList.remove('valid');
            input.classList.add('invalid');
            const daysUntilEligible = Math.ceil((selectedDate - eightWeeksAgo) / (1000 * 60 * 60 * 24));
            statusEl.textContent = `You must wait ${daysUntilEligible} more days before donating again`;
            statusEl.className = 'field-status error show';
            return false;
        }
        input.classList.remove('invalid');
        input.classList.add('valid');
        statusEl.textContent = 'Eligible to donate ✓';
        statusEl.className = 'field-status success show';
        return true;
    }
    validateForm() {
        const isConfirmed = this.confirmationCheckbox.checked;
        let isDateValid = true;
        if (this.lastDonationInput.value) {
            isDateValid = this.validateLastDonationDate(this.lastDonationInput);
        }
        const isValid = isConfirmed && isDateValid;
        this.confirmBtn.disabled = !isValid;
        const btnText = this.confirmBtn.querySelector('.btn-text');
        if (btnText) {
            if (!isConfirmed) {
                btnText.textContent = 'Please confirm eligibility';
            } else if (!isDateValid) {
                btnText.textContent = 'Check donation date';
            } else {
                btnText.textContent = 'Confirm Appointment';
            }
        }
        return isValid;
    }
    handleConfirm() {
        if (!this.validateForm()) {
            this.showMessage('Please complete all required fields', 'error');
            return;
        }
        const healthData = {
            lastDonation: this.lastDonationInput.value || null,
            medicalConditions: this.medicalConditionsInput.value.trim() || null,
            medications: this.medicationsInput.value.trim() || null,
            confirmed: this.confirmationCheckbox.checked,
            timestamp: new Date().toISOString()
        };
        localStorage.setItem('healthFormData', JSON.stringify(healthData));
        const step1Data = JSON.parse(localStorage.getItem('scheduleFormData') || '{}');
        const step2Data = JSON.parse(localStorage.getItem('contactFormData') || '{}');
        this.showConfirmationModal({ ...step1Data, ...step2Data, ...healthData });
    }
    showConfirmationModal(appointmentData) {
        const formatDate = (dateString) => {
            if (!dateString) return '-';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        };
        document.getElementById('modalDate').textContent = formatDate(appointmentData.date);
        document.getElementById('modalTime').textContent = appointmentData.time || '-';
        document.getElementById('modalLocation').textContent = appointmentData.hospitalName || appointmentData.hospital || '-';
        document.getElementById('modalBloodType').textContent = appointmentData.bloodType || '-';
        document.getElementById('modalEmail').textContent = appointmentData.email || '-';
        this.modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    processFinalConfirmation() {
        const finalConfirmBtn = document.getElementById('finalConfirmBtn');
        finalConfirmBtn.disabled = true;
        finalConfirmBtn.textContent = 'Processing...';
        const step1Data = JSON.parse(localStorage.getItem('scheduleFormData') || '{}');
        const step2Data = JSON.parse(localStorage.getItem('contactFormData') || '{}');
        const healthData = JSON.parse(localStorage.getItem('healthFormData') || '{}');
        const appointment = {
            id: 'APT-' + Date.now(),
            ...step1Data,
            ...step2Data,
            ...healthData,
            status: 'confirmed',
            createdAt: new Date().toISOString()
        };
        const appointments = JSON.parse(localStorage.getItem('appointments') || '[]');
        appointments.push(appointment);
        localStorage.setItem('appointments', JSON.stringify(appointments));
        console.log('Appointment created:', appointment);
        setTimeout(() => { window.location.href = '{{ route('donations.confirmation') }}'; }, 800);
    }
    closeModal() {
        this.modal.style.display = 'none';
        document.body.style.overflow = '';
    }
    handlePrevious() {
        this.autoSave();
        const hasData = this.lastDonationInput.value || this.medicalConditionsInput.value || this.medicationsInput.value || this.confirmationCheckbox.checked;
        if (hasData) {
            const confirm = window.confirm('Your progress has been saved. Go back to Step 2?');
            if (confirm) { window.location.href = '{{ route('donations.step2') }}'; }
        } else {
            window.location.href = '{{ route('donations.step2') }}';
        }
    }
    autoSave() {
        const healthData = {
            lastDonation: this.lastDonationInput.value || null,
            medicalConditions: this.medicalConditionsInput.value.trim() || null,
            medications: this.medicationsInput.value.trim() || null,
            confirmed: this.confirmationCheckbox.checked,
            savedAt: new Date().toISOString()
        };
        localStorage.setItem('healthFormData', JSON.stringify(healthData));
    }
    loadSavedData() {
        const savedData = localStorage.getItem('healthFormData');
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                if (data.lastDonation) {
                    this.lastDonationInput.value = data.lastDonation;
                    setTimeout(() => { this.validateLastDonationDate(this.lastDonationInput); }, 100);
                }
                if (data.medicalConditions) this.medicalConditionsInput.value = data.medicalConditions;
                if (data.medications) this.medicationsInput.value = data.medications;
                if (data.confirmed) this.confirmationCheckbox.checked = data.confirmed;
                this.validateForm();
            } catch (e) {
                console.error('Error loading saved data:', e);
            }
        }
    }
    setupHelpTooltips() {
        const helpIcons = document.querySelectorAll('.help-icon');
        helpIcons.forEach(icon => {
            icon.addEventListener('click', (e) => {
                e.preventDefault();
                const title = icon.getAttribute('title');
                this.showTooltip(title, icon);
            });
        });
    }
    showTooltip(message, element) {
        document.querySelectorAll('.custom-tooltip').forEach(t => t.remove());
        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = message;
        tooltip.style.cssText = 'position: absolute; background: #1D3557; color: white; padding: 12px 16px; border-radius: 8px; font-size: 13px; line-height: 18px; max-width: 280px; z-index: 1000; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); animation: tooltipFade 0.3s ease;';
        document.body.appendChild(tooltip);
        const rect = element.getBoundingClientRect();
        tooltip.style.top = `${rect.bottom + 8}px`;
        tooltip.style.left = `${rect.left - tooltip.offsetWidth / 2 + rect.width / 2}px`;
        setTimeout(() => {
            tooltip.style.animation = 'tooltipFadeOut 0.3s ease';
            setTimeout(() => tooltip.remove(), 300);
        }, 3000);
    }
    showMessage(message, type = 'info') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.textContent = message;
        let bgColor = '#457B9D';
        if (type === 'success') bgColor = '#16A34A';
        if (type === 'error') bgColor = '#DC3545';
        messageDiv.style.cssText = `position: fixed; top: 20px; right: 20px; padding: 16px 24px; background: ${bgColor}; color: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); z-index: 1000; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 500; animation: slideIn 0.3s ease; max-width: 400px;`;
        document.body.appendChild(messageDiv);
        setTimeout(() => {
            messageDiv.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                if (messageDiv.parentNode) { document.body.removeChild(messageDiv); }
            }, 300);
        }, 3000);
    }
}

const style = document.createElement('style');
style.textContent = `
@keyframes slideIn { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
@keyframes slideOut { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
@keyframes tooltipFade { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
@keyframes tooltipFadeOut { from { opacity: 1; transform: translateY(0); } to { opacity: 0; transform: translateY(-8px); } }
`;
document.head.appendChild(style);

document.addEventListener('DOMContentLoaded', () => {
    new Navigation();
    new HealthInfoForm();
});
    </script>
@endsection

@push('scripts')
    <script>

// Navigation Module code here - same as previous pages
class Navigation {
    constructor() {
        this.nav = document.getElementById('mainNav');
        this.menuToggle = document.getElementById('mobileMenuToggle');
        this.navLinks = document.getElementById('navLinks');
        this.navOverlay = document.getElementById('navOverlay');
        this.links = document.querySelectorAll('.nav-link');
        this.lastScroll = 0;
        this.isMenuOpen = false;
        this.init();
    }
    init() {
        if (!this.nav) return;
        this.setupMobileMenu();
        this.setupScrollBehavior();
        this.setupSmoothScroll();
        this.setupActiveLink();
        this.setupKeyboardNavigation();
        this.handleResize();
    }
    setupMobileMenu() {
        if (!this.menuToggle) return;
        this.menuToggle.addEventListener('click', () => { this.toggleMenu(); });
        if (this.navOverlay) {
            this.navOverlay.addEventListener('click', () => { this.closeMenu(); });
        }
        this.links.forEach(link => {
            link.addEventListener('click', () => { this.closeMenu(); });
        });
        this.navLinks?.addEventListener('touchmove', (e) => {
            if (this.isMenuOpen) { e.stopPropagation(); }
        }, { passive: true });
    }
    toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
        if (this.isMenuOpen) { this.openMenu(); } else { this.closeMenu(); }
    }
    openMenu() {
        this.isMenuOpen = true;
        this.menuToggle?.classList.add('active');
        this.navLinks?.classList.add('active');
        this.navOverlay?.classList.add('active');
        this.menuToggle?.setAttribute('aria-expanded', 'true');
        this.menuToggle?.setAttribute('aria-label', 'Close navigation menu');
        this.navOverlay?.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        setTimeout(() => { this.links[0]?.focus(); }, 300);
    }
    closeMenu() {
        this.isMenuOpen = false;
        this.menuToggle?.classList.remove('active');
        this.navLinks?.classList.remove('active');
        this.navOverlay?.classList.remove('active');
        this.menuToggle?.setAttribute('aria-expanded', 'false');
        this.menuToggle?.setAttribute('aria-label', 'Open navigation menu');
        this.navOverlay?.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }
    setupScrollBehavior() {
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    this.handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }
    handleScroll() {
        const currentScroll = window.pageYOffset;
        if (currentScroll > 50) {
            this.nav.classList.add('scrolled');
        } else {
            this.nav.classList.remove('scrolled');
        }
        if (this.isMenuOpen && Math.abs(currentScroll - this.lastScroll) > 50) {
            this.closeMenu();
        }
        this.lastScroll = currentScroll;
    }
    setupSmoothScroll() {
        this.links.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href');
                if (href && href.startsWith('#')) {
                    e.preventDefault();
                    const targetId = href.substring(1);
                    const target = document.getElementById(targetId);
                    if (target) {
                        const navHeight = this.nav.offsetHeight;
                        const targetPosition = target.offsetTop - navHeight - 20;
                        window.scrollTo({ top: targetPosition, behavior: 'smooth' });
                        history.pushState(null, null, href);
                        target.setAttribute('tabindex', '-1');
                        target.focus({ preventScroll: true });
                    }
                }
            });
        });
    }
    setupActiveLink() {
        const sections = Array.from(this.links).map(link => {
            const href = link.getAttribute('href');
            if (href && href.startsWith('#')) {
                const id = href.substring(1);
                return document.getElementById(id);
            }
            return null;
        }).filter(Boolean);
        if (sections.length === 0) return;
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    this.updateActiveLink(sections);
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
        this.updateActiveLink(sections);
    }
    updateActiveLink(sections) {
        const scrollPos = window.pageYOffset + this.nav.offsetHeight + 100;
        let currentSection = null;
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionBottom = sectionTop + section.offsetHeight;
            if (sectionTop <= scrollPos && sectionBottom > scrollPos) {
                currentSection = section;
            }
        });
        if (!currentSection && scrollPos < (sections[0]?.offsetTop + 200)) {
            currentSection = sections[0];
        }
        this.links.forEach(link => {
            link.classList.remove('active');
            if (currentSection) {
                const href = link.getAttribute('href');
                if (href === `#${currentSection.id}`) {
                    link.classList.add('active');
                }
            }
        });
    }
    setupKeyboardNavigation() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isMenuOpen) {
                this.closeMenu();
                this.menuToggle?.focus();
            }
        });
        if (this.navLinks) {
            this.navLinks.addEventListener('keydown', (e) => {
                if (!this.isMenuOpen) return;
                if (e.key === 'Tab') {
                    const focusableElements = this.navLinks.querySelectorAll('a, button, [tabindex]:not([tabindex="-1"])');
                    const firstElement = focusableElements[0];
                    const lastElement = focusableElements[focusableElements.length - 1];
                    if (e.shiftKey && document.activeElement === firstElement) {
                        e.preventDefault();
                        lastElement.focus();
                    } else if (!e.shiftKey && document.activeElement === lastElement) {
                        e.preventDefault();
                        firstElement.focus();
                    }
                }
            });
        }
    }
    handleResize() {
        let resizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                if (window.innerWidth > 768 && this.isMenuOpen) {
                    this.closeMenu();
                }
            }, 250);
        });
    }
}

// Health Information Form Module - Schedule Donation Step 3
class HealthInfoForm {
    constructor() {
        this.form = document.getElementById('healthForm');
        this.confirmBtn = document.getElementById('confirmBtn');
        this.previousBtn = document.getElementById('previousBtn');
        this.lastDonationInput = document.getElementById('lastDonation');
        this.medicalConditionsInput = document.getElementById('medicalConditions');
        this.medicationsInput = document.getElementById('medications');
        this.confirmationCheckbox = document.getElementById('confirmation');
        this.modal = document.getElementById('confirmationModal');
        this.init();
    }
    init() {
        this.loadPreviousStepsData();
        this.setDateConstraints();
        this.addEventListeners();
        this.validateForm();
        this.loadSavedData();
    }
    loadPreviousStepsData() {
        const step1Data = localStorage.getItem('scheduleFormData');
        const step2Data = localStorage.getItem('contactFormData');
        if (!step1Data || !step2Data) {
            this.showMessage('Please complete all previous steps', 'error');
            setTimeout(() => {
                if (!step1Data) {
                    window.location.href = '{{ route('donations.schedule') }}';
                } else {
                    window.location.href = '{{ route('donations.step2') }}';
                }
            }, 2000);
            return false;
        }
        return true;
    }
    setDateConstraints() {
        const today = new Date();
        const maxDate = new Date();
        maxDate.setDate(maxDate.getDate() - 56);
        const formatDate = (date) => {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };
        this.lastDonationInput.max = formatDate(today);
    }
    addEventListeners() {
        this.lastDonationInput.addEventListener('change', (e) => {
            this.validateLastDonationDate(e.target);
            this.validateForm();
        });
        this.lastDonationInput.addEventListener('click', function() {
            try { this.showPicker(); } catch (e) { this.focus(); }
        });
        this.medicalConditionsInput.addEventListener('input', () => { this.validateForm(); });
        this.medicationsInput.addEventListener('input', () => { this.validateForm(); });
        this.confirmationCheckbox.addEventListener('change', () => { this.validateForm(); });
        this.confirmBtn.addEventListener('click', () => this.handleConfirm());
        this.previousBtn.addEventListener('click', () => this.handlePrevious());
        let autoSaveTimeout;
        this.form.addEventListener('input', () => {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => this.autoSave(), 1500);
        });
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleConfirm();
        });
        this.setupHelpTooltips();
        document.getElementById('cancelConfirmBtn')?.addEventListener('click', () => { this.closeModal(); });
        document.getElementById('finalConfirmBtn')?.addEventListener('click', () => { this.processFinalConfirmation(); });
        const modalOverlay = document.querySelector('.modal-overlay');
        modalOverlay?.addEventListener('click', () => { this.closeModal(); });
    }
    validateLastDonationDate(input) {
        const value = input.value;
        const statusEl = input.closest('.form-group').querySelector('.field-status');
        if (!statusEl || !value) {
            if (statusEl) statusEl.classList.remove('show');
            input.classList.remove('valid', 'invalid');
            return true;
        }
        const selectedDate = new Date(value);
        const today = new Date();
        const eightWeeksAgo = new Date();
        eightWeeksAgo.setDate(eightWeeksAgo.getDate() - 56);
        if (selectedDate > today) {
            input.classList.remove('valid');
            input.classList.add('invalid');
            statusEl.textContent = 'Date cannot be in the future';
            statusEl.className = 'field-status error show';
            return false;
        }
        if (selectedDate > eightWeeksAgo) {
            input.classList.remove('valid');
            input.classList.add('invalid');
            const daysUntilEligible = Math.ceil((selectedDate - eightWeeksAgo) / (1000 * 60 * 60 * 24));
            statusEl.textContent = `You must wait ${daysUntilEligible} more days before donating again`;
            statusEl.className = 'field-status error show';
            return false;
        }
        input.classList.remove('invalid');
        input.classList.add('valid');
        statusEl.textContent = 'Eligible to donate ✓';
        statusEl.className = 'field-status success show';
        return true;
    }
    validateForm() {
        const isConfirmed = this.confirmationCheckbox.checked;
        let isDateValid = true;
        if (this.lastDonationInput.value) {
            isDateValid = this.validateLastDonationDate(this.lastDonationInput);
        }
        const isValid = isConfirmed && isDateValid;
        this.confirmBtn.disabled = !isValid;
        const btnText = this.confirmBtn.querySelector('.btn-text');
        if (btnText) {
            if (!isConfirmed) {
                btnText.textContent = 'Please confirm eligibility';
            } else if (!isDateValid) {
                btnText.textContent = 'Check donation date';
            } else {
                btnText.textContent = 'Confirm Appointment';
            }
        }
        return isValid;
    }
    handleConfirm() {
        if (!this.validateForm()) {
            this.showMessage('Please complete all required fields', 'error');
            return;
        }
        const healthData = {
            lastDonation: this.lastDonationInput.value || null,
            medicalConditions: this.medicalConditionsInput.value.trim() || null,
            medications: this.medicationsInput.value.trim() || null,
            confirmed: this.confirmationCheckbox.checked,
            timestamp: new Date().toISOString()
        };
        localStorage.setItem('healthFormData', JSON.stringify(healthData));
        const step1Data = JSON.parse(localStorage.getItem('scheduleFormData') || '{}');
        const step2Data = JSON.parse(localStorage.getItem('contactFormData') || '{}');
        this.showConfirmationModal({ ...step1Data, ...step2Data, ...healthData });
    }
    showConfirmationModal(appointmentData) {
        const formatDate = (dateString) => {
            if (!dateString) return '-';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        };
        document.getElementById('modalDate').textContent = formatDate(appointmentData.date);
        document.getElementById('modalTime').textContent = appointmentData.time || '-';
        document.getElementById('modalLocation').textContent = appointmentData.hospitalName || appointmentData.hospital || '-';
        document.getElementById('modalBloodType').textContent = appointmentData.bloodType || '-';
        document.getElementById('modalEmail').textContent = appointmentData.email || '-';
        this.modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    processFinalConfirmation() {
        const finalConfirmBtn = document.getElementById('finalConfirmBtn');
        finalConfirmBtn.disabled = true;
        finalConfirmBtn.textContent = 'Processing...';
        const step1Data = JSON.parse(localStorage.getItem('scheduleFormData') || '{}');
        const step2Data = JSON.parse(localStorage.getItem('contactFormData') || '{}');
        const healthData = JSON.parse(localStorage.getItem('healthFormData') || '{}');
        const appointment = {
            id: 'APT-' + Date.now(),
            ...step1Data,
            ...step2Data,
            ...healthData,
            status: 'confirmed',
            createdAt: new Date().toISOString()
        };
        const appointments = JSON.parse(localStorage.getItem('appointments') || '[]');
        appointments.push(appointment);
        localStorage.setItem('appointments', JSON.stringify(appointments));
        console.log('Appointment created:', appointment);
        setTimeout(() => { window.location.href = '{{ route('donations.confirmation') }}'; }, 800);
    }
    closeModal() {
        this.modal.style.display = 'none';
        document.body.style.overflow = '';
    }
    handlePrevious() {
        this.autoSave();
        const hasData = this.lastDonationInput.value || this.medicalConditionsInput.value || this.medicationsInput.value || this.confirmationCheckbox.checked;
        if (hasData) {
            const confirm = window.confirm('Your progress has been saved. Go back to Step 2?');
            if (confirm) { window.location.href = '{{ route('donations.step2') }}'; }
        } else {
            window.location.href = '{{ route('donations.step2') }}';
        }
    }
    autoSave() {
        const healthData = {
            lastDonation: this.lastDonationInput.value || null,
            medicalConditions: this.medicalConditionsInput.value.trim() || null,
            medications: this.medicationsInput.value.trim() || null,
            confirmed: this.confirmationCheckbox.checked,
            savedAt: new Date().toISOString()
        };
        localStorage.setItem('healthFormData', JSON.stringify(healthData));
    }
    loadSavedData() {
        const savedData = localStorage.getItem('healthFormData');
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                if (data.lastDonation) {
                    this.lastDonationInput.value = data.lastDonation;
                    setTimeout(() => { this.validateLastDonationDate(this.lastDonationInput); }, 100);
                }
                if (data.medicalConditions) this.medicalConditionsInput.value = data.medicalConditions;
                if (data.medications) this.medicationsInput.value = data.medications;
                if (data.confirmed) this.confirmationCheckbox.checked = data.confirmed;
                this.validateForm();
            } catch (e) {
                console.error('Error loading saved data:', e);
            }
        }
    }
    setupHelpTooltips() {
        const helpIcons = document.querySelectorAll('.help-icon');
        helpIcons.forEach(icon => {
            icon.addEventListener('click', (e) => {
                e.preventDefault();
                const title = icon.getAttribute('title');
                this.showTooltip(title, icon);
            });
        });
    }
    showTooltip(message, element) {
        document.querySelectorAll('.custom-tooltip').forEach(t => t.remove());
        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = message;
        tooltip.style.cssText = 'position: absolute; background: #1D3557; color: white; padding: 12px 16px; border-radius: 8px; font-size: 13px; line-height: 18px; max-width: 280px; z-index: 1000; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); animation: tooltipFade 0.3s ease;';
        document.body.appendChild(tooltip);
        const rect = element.getBoundingClientRect();
        tooltip.style.top = `${rect.bottom + 8}px`;
        tooltip.style.left = `${rect.left - tooltip.offsetWidth / 2 + rect.width / 2}px`;
        setTimeout(() => {
            tooltip.style.animation = 'tooltipFadeOut 0.3s ease';
            setTimeout(() => tooltip.remove(), 300);
        }, 3000);
    }
    showMessage(message, type = 'info') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.textContent = message;
        let bgColor = '#457B9D';
        if (type === 'success') bgColor = '#16A34A';
        if (type === 'error') bgColor = '#DC3545';
        messageDiv.style.cssText = `position: fixed; top: 20px; right: 20px; padding: 16px 24px; background: ${bgColor}; color: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); z-index: 1000; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 500; animation: slideIn 0.3s ease; max-width: 400px;`;
        document.body.appendChild(messageDiv);
        setTimeout(() => {
            messageDiv.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                if (messageDiv.parentNode) { document.body.removeChild(messageDiv); }
            }, 300);
        }, 3000);
    }
}

const style = document.createElement('style');
style.textContent = `
@keyframes slideIn { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
@keyframes slideOut { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
@keyframes tooltipFade { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
@keyframes tooltipFadeOut { from { opacity: 1; transform: translateY(0); } to { opacity: 0; transform: translateY(-8px); } }
`;
document.head.appendChild(style);

document.addEventListener('DOMContentLoaded', () => {
    new Navigation();
    new HealthInfoForm();
});
    
    </script>
@endpush
