@extends('layouts.frontend')

@section('title', 'Schedule Donation - Contact Info - iKonek')

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
            <a href="{{ route('fundraisers') }}" class="nav-item">
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
                        <span class="progress-text">Step 2 of 3</span>
                        <div class="progress-bar-mini">
                            <div class="progress-fill-mini" style="width: 66.66%;"></div>
                        </div>
                    </div>
                </div>
                <p class="page-subtitle">Book your blood donation appointment in just a few steps</p>
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
                <div class="step-item step-active" role="tab" aria-selected="true" aria-label="Step 2: Contact Information">
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
                        <div class="step-sublabel">In progress</div>
                    </div>
                </div>
                <div class="step-item" role="tab" aria-selected="false" aria-label="Step 3: Health Information">
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
                        <div class="step-sublabel">Pending</div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="schedule-card">
                <div class="schedule-card-header">
                    <div class="card-header-title">
                        <img src="{{ asset('assets/icons/phone.svg') }}" alt="" class="card-icon" width="20" height="20">
                        <h2 class="card-title">Contact Information</h2>
                    </div>
                    <p class="card-description">We'll use this to confirm your appointment and send reminders</p>
                </div>

                <div class="schedule-card-content">
                    <form id="contactForm" class="schedule-form" aria-label="Contact information form">
                        <!-- Email and Phone -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    <span class="label-text">
                                        Email Address
                                        <span class="required" aria-label="required">*</span>
                                    </span>
                                    <button type="button" class="help-icon" aria-label="Help: Email address" title="We'll send appointment confirmations and reminders to this email address.">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </button>
                                </label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email" 
                                    class="form-input" 
                                    placeholder="your.email@example.com"
                                    required
                                    aria-required="true"
                                    autocomplete="email"
                                    aria-describedby="emailHelp"
                                >
                                <p id="emailHelp" class="form-helper-text">We'll use this to send you appointment details and reminders</p>
                                <div class="field-status" role="status" aria-live="polite"></div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">
                                    <span class="label-text">
                                        Phone Number
                                        <span class="required" aria-label="required">*</span>
                                    </span>
                                    <button type="button" class="help-icon" aria-label="Help: Phone number" title="Enter your mobile number. We may call to confirm your appointment or notify you of any changes.">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </button>
                                </label>
                                <div class="phone-input-wrapper">
                                    <select id="phoneCountry" class="country-code-select" aria-label="Country code">
                                        <option value="+93" data-country="AF">🇦🇫 +93</option>
                                        <option value="+61" data-country="AU">🇦🇺 +61</option>
                                        <option value="+86" data-country="CN">🇨🇳 +86</option>
                                        <option value="+91" data-country="IN">🇮🇳 +91</option>
                                        <option value="+62" data-country="ID">🇮🇩 +62</option>
                                        <option value="+81" data-country="JP">🇯🇵 +81</option>
                                        <option value="+60" data-country="MY">🇲🇾 +60</option>
                                        <option value="+63" data-country="PH" selected>🇵🇭 +63</option>
                                        <option value="+65" data-country="SG">🇸🇬 +65</option>
                                        <option value="+82" data-country="KR">🇰🇷 +82</option>
                                        <option value="+66" data-country="TH">🇹🇭 +66</option>
                                        <option value="+1" data-country="US">🇺🇸 +1</option>
                                        <option value="+84" data-country="VN">🇻🇳 +84</option>
                                    </select>
                                    <input 
                                        type="tel" 
                                        id="phone" 
                                        name="phone" 
                                        class="form-input phone-number-input" 
                                        placeholder="912 345 6789"
                                        required
                                        aria-required="true"
                                        autocomplete="tel"
                                        aria-describedby="phoneHelp"
                                    >
                                </div>
                                <p id="phoneHelp" class="form-helper-text">Format: +63 XXX XXX XXXX (automatically formatted)</p>
                                <div class="field-status" role="status" aria-live="polite"></div>
                            </div>
                        </div>

                        <!-- Emergency Contact Name and Phone -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="emergencyName" class="form-label">
                                    <span class="label-text">
                                        Emergency Contact Name
                                        <span class="required" aria-label="required">*</span>
                                    </span>
                                    <button type="button" class="help-icon" aria-label="Help: Emergency contact" title="Provide a person we can contact in case of any medical emergency during or after donation.">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </button>
                                </label>
                                <input 
                                    type="text" 
                                    id="emergencyName" 
                                    name="emergencyName" 
                                    class="form-input" 
                                    placeholder="Full name"
                                    required
                                    aria-required="true"
                                    autocomplete="name"
                                    aria-describedby="emergencyNameHelp"
                                >
                                <p id="emergencyNameHelp" class="form-helper-text">A family member or close friend we can reach in case of emergency</p>
                                <div class="field-status" role="status" aria-live="polite"></div>
                            </div>

                            <div class="form-group">
                                <label for="emergencyPhone" class="form-label">
                                    <span class="label-text">
                                        Emergency Contact Phone
                                        <span class="required" aria-label="required">*</span>
                                    </span>
                                    <button type="button" class="help-icon" aria-label="Help: Emergency contact phone" title="Mobile number of your emergency contact. Make sure this person is reachable.">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </button>
                                </label>
                                <div class="phone-input-wrapper">
                                    <select id="emergencyPhoneCountry" class="country-code-select" aria-label="Country code">
                                        <option value="+93" data-country="AF">🇦🇫 +93</option>
                                        <option value="+61" data-country="AU">🇦🇺 +61</option>
                                        <option value="+86" data-country="CN">🇨🇳 +86</option>
                                        <option value="+91" data-country="IN">🇮🇳 +91</option>
                                        <option value="+62" data-country="ID">🇮🇩 +62</option>
                                        <option value="+81" data-country="JP">🇯🇵 +81</option>
                                        <option value="+60" data-country="MY">🇲🇾 +60</option>
                                        <option value="+63" data-country="PH" selected>🇵🇭 +63</option>
                                        <option value="+65" data-country="SG">🇸🇬 +65</option>
                                        <option value="+82" data-country="KR">🇰🇷 +82</option>
                                        <option value="+66" data-country="TH">🇹🇭 +66</option>
                                        <option value="+1" data-country="US">🇺🇸 +1</option>
                                        <option value="+84" data-country="VN">🇻🇳 +84</option>
                                    </select>
                                    <input 
                                        type="tel" 
                                        id="emergencyPhone" 
                                        name="emergencyPhone" 
                                        class="form-input phone-number-input" 
                                        placeholder="912 345 6789"
                                        required
                                        aria-required="true"
                                        autocomplete="tel"
                                        aria-describedby="emergencyPhoneHelp"
                                    >
                                </div>
                                <p id="emergencyPhoneHelp" class="form-helper-text">This should be different from your own phone number</p>
                                <div class="field-status" role="status" aria-live="polite"></div>
                            </div>
                        </div>

                        <!-- Privacy Notice -->
                        <div class="privacy-notice">
                            <svg class="privacy-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <div class="privacy-content">
                                <p class="privacy-title">Privacy Notice:</p>
                                <p class="privacy-text">Your information is secure and will only be used for appointment confirmation and emergency purposes.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="form-actions-wrapper">
                <div class="form-actions-info">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 15V12M12 9H12.01M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Your contact information is encrypted and secure</span>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" id="previousBtn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="btn-text">Previous</span>
                    </button>
                    <button type="button" class="btn btn-continue" id="continueBtn" disabled>
                        <span class="btn-text">Continue to Health Info</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
// Navigation Module - Enhanced UX

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
    
    /**
     * Mobile Menu Functionality
     */
    setupMobileMenu() {
        if (!this.menuToggle) return;
        
        // Toggle menu on button click
        this.menuToggle.addEventListener('click', () => {
            this.toggleMenu();
        });
        
        // Close menu when clicking overlay
        if (this.navOverlay) {
            this.navOverlay.addEventListener('click', () => {
                this.closeMenu();
            });
        }
        
        // Close menu when clicking on a link
        this.links.forEach(link => {
            link.addEventListener('click', () => {
                this.closeMenu();
            });
        });
        
        // Prevent body scroll when menu is open
        this.navLinks?.addEventListener('touchmove', (e) => {
            if (this.isMenuOpen) {
                e.stopPropagation();
            }
        }, { passive: true });
    }
    
    /**
     * Toggle Menu State
     */
    toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
        
        if (this.isMenuOpen) {
            this.openMenu();
        } else {
            this.closeMenu();
        }
    }
    
    /**
     * Open Mobile Menu
     */
    openMenu() {
        this.isMenuOpen = true;
        this.menuToggle?.classList.add('active');
        this.navLinks?.classList.add('active');
        this.navOverlay?.classList.add('active');
        this.menuToggle?.setAttribute('aria-expanded', 'true');
        this.menuToggle?.setAttribute('aria-label', 'Close navigation menu');
        this.navOverlay?.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        
        // Focus first link for accessibility
        setTimeout(() => {
            this.links[0]?.focus();
        }, 300);
    }
    
    /**
     * Close Mobile Menu
     */
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
    
    /**
     * Enhanced Scroll Behavior
     */
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
    
    /**
     * Handle Scroll Effects
     */
    handleScroll() {
        const currentScroll = window.pageYOffset;
        
        // Add shadow and shrink on scroll
        if (currentScroll > 50) {
            this.nav.classList.add('scrolled');
        } else {
            this.nav.classList.remove('scrolled');
        }
        
        // Close mobile menu on scroll
        if (this.isMenuOpen && Math.abs(currentScroll - this.lastScroll) > 50) {
            this.closeMenu();
        }
        
        this.lastScroll = currentScroll;
    }
    
    /**
     * Smooth Scroll with Offset
     */
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
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                        
                        // Update URL without jumping
                        history.pushState(null, null, href);
                        
                        // Set focus for accessibility
                        target.setAttribute('tabindex', '-1');
                        target.focus({ preventScroll: true });
                    }
                }
            });
        });
    }
    
    /**
     * Active Link Based on Scroll Position
     */
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
        
        // Initial check
        this.updateActiveLink(sections);
    }
    
    /**
     * Update Active Link
     */
    updateActiveLink(sections) {
        const scrollPos = window.pageYOffset + this.nav.offsetHeight + 100;
        const windowHeight = window.innerHeight;
        
        let currentSection = null;
        
        // Find the section that's currently most visible in the viewport
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionBottom = sectionTop + section.offsetHeight;
            
            // Check if section is in viewport
            if (sectionTop <= scrollPos && sectionBottom > scrollPos) {
                currentSection = section;
            }
        });
        
        // If no section found (at top of page), highlight the hero/first section
        if (!currentSection && scrollPos < (sections[0]?.offsetTop + 200)) {
            currentSection = sections[0];
        }
        
        // Update active class
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
    
    /**
     * Keyboard Navigation Support
     */
    setupKeyboardNavigation() {
        // ESC key to close menu
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isMenuOpen) {
                this.closeMenu();
                this.menuToggle?.focus();
            }
        });
        
        // Tab trapping in mobile menu
        if (this.navLinks) {
            this.navLinks.addEventListener('keydown', (e) => {
                if (!this.isMenuOpen) return;
                
                if (e.key === 'Tab') {
                    const focusableElements = this.navLinks.querySelectorAll(
                        'a, button, [tabindex]:not([tabindex="-1"])'
                    );
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
    
    /**
     * Handle Window Resize
     */
    handleResize() {
        let resizeTimer;
        
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                // Close menu on desktop resize
                if (window.innerWidth > 768 && this.isMenuOpen) {
                    this.closeMenu();
                }
            }, 250);
        });
    }
}

// Schedule Donation Step 2 - Contact Information Form Module

class ContactInfoForm {
    constructor() {
        this.form = document.getElementById('contactForm');
        this.continueBtn = document.getElementById('continueBtn');
        this.previousBtn = document.getElementById('previousBtn');
        this.emailInput = document.getElementById('email');
        this.phoneInput = document.getElementById('phone');
        this.phoneCountrySelect = document.getElementById('phoneCountry');
        this.emergencyNameInput = document.getElementById('emergencyName');
        this.emergencyPhoneInput = document.getElementById('emergencyPhone');
        this.emergencyPhoneCountrySelect = document.getElementById('emergencyPhoneCountry');
        
        this.init();
    }

    init() {
        // Load previous step data
        this.loadPreviousStepData();
        
        // Add event listeners
        this.addEventListeners();
        
        // Initial validation check
        this.validateForm();
    }

    loadPreviousStepData() {
        const formData = localStorage.getItem('scheduleFormData');
        if (!formData) {
            // Redirect back to step 1 if no data found
            this.showMessage('Please complete Step 1 first', 'error');
            setTimeout(() => {
                window.location.href = 'schedule-donation.html';
            }, 2000);
            return;
        }
        
        // Load saved contact info if exists
        const contactData = localStorage.getItem('contactFormData');
        if (contactData) {
            try {
                const data = JSON.parse(contactData);
                if (data.email) this.emailInput.value = data.email;
                if (data.phone) this.phoneInput.value = data.phone;
                if (data.phoneCountry) this.phoneCountrySelect.value = data.phoneCountry;
                if (data.emergencyName) this.emergencyNameInput.value = data.emergencyName;
                if (data.emergencyPhone) this.emergencyPhoneInput.value = data.emergencyPhone;
                if (data.emergencyPhoneCountry) this.emergencyPhoneCountrySelect.value = data.emergencyPhoneCountry;
                
                // Validate loaded fields
                setTimeout(() => {
                    if (data.email) this.validateField(this.emailInput, 'email');
                    if (data.phone) this.validateField(this.phoneInput, 'phone');
                    if (data.emergencyName) this.validateField(this.emergencyNameInput, 'text');
                    if (data.emergencyPhone) this.validateField(this.emergencyPhoneInput, 'phone');
                    this.validateForm();
                }, 100);
            } catch (e) {
                console.error('Error loading contact data:', e);
            }
        }
    }

    addEventListeners() {
        // Email validation
        this.emailInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'email');
            this.validateForm();
        });

        this.emailInput.addEventListener('input', () => {
            this.validateForm();
        });

        // Phone validation
        this.phoneInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'phone');
            this.validateForm();
        });

        this.phoneInput.addEventListener('input', (e) => {
            this.formatPhoneNumber(e.target);
            this.validateForm();
        });

        // Emergency name validation
        this.emergencyNameInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'text');
            this.validateForm();
        });

        this.emergencyNameInput.addEventListener('input', () => {
            this.validateForm();
        });

        // Emergency phone validation
        this.emergencyPhoneInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'phone');
            this.validateForm();
        });

        this.emergencyPhoneInput.addEventListener('input', (e) => {
            this.formatPhoneNumber(e.target);
            this.validateForm();
        });

        // Focus handlers to remove validation states
        [this.emailInput, this.phoneInput, this.emergencyNameInput, this.emergencyPhoneInput].forEach(input => {
            input.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        });

        // Button handlers
        this.continueBtn.addEventListener('click', () => this.handleContinue());
        this.previousBtn.addEventListener('click', () => this.handlePrevious());

        // Auto-save on input
        let autoSaveTimeout;
        this.form.addEventListener('input', () => {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => this.autoSave(), 1500);
        });

        // Prevent form submission
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleContinue();
        });
        
        // Setup help tooltips
        this.setupHelpTooltips();
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
        // Remove existing tooltips
        document.querySelectorAll('.custom-tooltip').forEach(t => t.remove());
        
        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = message;
        tooltip.style.cssText = `
            position: absolute;
            background: #1D3557;
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            line-height: 18px;
            max-width: 280px;
            z-index: 1000;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            animation: tooltipFade 0.3s ease;
        `;
        
        document.body.appendChild(tooltip);
        
        const rect = element.getBoundingClientRect();
        tooltip.style.top = `${rect.bottom + 8}px`;
        tooltip.style.left = `${rect.left - tooltip.offsetWidth / 2 + rect.width / 2}px`;
        
        setTimeout(() => {
            tooltip.style.animation = 'tooltipFadeOut 0.3s ease';
            setTimeout(() => tooltip.remove(), 300);
        }, 3000);
    }

    handleFieldFocus(field) {
        field.classList.remove('invalid', 'valid');
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        if (statusEl) {
            statusEl.classList.remove('show');
        }
    }

    validateField(field, type) {
        const value = field.value.trim();
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        
        if (!statusEl) return false;

        let isValid = false;
        let message = '';

        switch(type) {
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                isValid = emailRegex.test(value);
                message = isValid ? 'Valid email address ✓' : 'Please enter a valid email address';
                break;

            case 'phone':
                const countryCode = field.id === 'phone' 
                    ? this.phoneCountrySelect.value 
                    : this.emergencyPhoneCountrySelect.value;
                const digits = value.replace(/\D/g, '');
                
                if (countryCode === '+63') {
                    isValid = digits.length === 10 && digits.startsWith('9');
                    message = isValid ? 'Valid Philippine mobile number ✓' : 'Enter 10 digits starting with 9';
                } else {
                    isValid = digits.length >= 7 && digits.length <= 15;
                    message = isValid ? 'Valid phone number ✓' : 'Enter a valid phone number';
                }
                break;

            case 'text':
                isValid = value.length >= 2;
                message = isValid ? 'Name confirmed ✓' : 'Please enter a valid name';
                break;
        }

        if (value === '') {
            field.classList.remove('valid', 'invalid');
            statusEl.classList.remove('show');
            return false;
        }

        if (isValid) {
            field.classList.remove('invalid');
            field.classList.add('valid');
            statusEl.textContent = message;
            statusEl.className = 'field-status success show';
        } else {
            field.classList.remove('valid');
            field.classList.add('invalid');
            statusEl.textContent = message;
            statusEl.className = 'field-status error show';
        }

        return isValid;
    }

    formatPhoneNumber(input) {
        let value = input.value.replace(/\D/g, '');
        const countryCode = input.id === 'phone' 
            ? this.phoneCountrySelect.value 
            : this.emergencyPhoneCountrySelect.value;
        
        // Format based on country code
        if (countryCode === '+63') {
            // Philippine format: XXX XXX XXXX
            if (value.length <= 3) {
                input.value = value;
            } else if (value.length <= 6) {
                input.value = `${value.substring(0, 3)} ${value.substring(3)}`;
            } else {
                input.value = `${value.substring(0, 3)} ${value.substring(3, 6)} ${value.substring(6, 10)}`;
            }
        } else {
            // Generic international format
            input.value = value;
        }
    }

    validatePhone(phone, countryCode = '+63') {
        const digits = phone.replace(/\D/g, '');
        
        // Validation based on country code
        if (countryCode === '+63') {
            // Philippine numbers: 10 digits (without country code)
            return digits.length === 10 && digits.startsWith('9');
        } else {
            // Generic validation: 7-15 digits
            return digits.length >= 7 && digits.length <= 15;
        }
    }

    getFullPhoneNumber(input, countrySelect) {
        const countryCode = countrySelect.value;
        const digits = input.value.replace(/\D/g, '');
        return `${countryCode} ${digits}`;
    }

    validateForm() {
        const emailValid = this.validateEmail(this.emailInput.value);
        const phoneValid = this.validatePhone(this.phoneInput.value, this.phoneCountrySelect.value);
        const emergencyNameValid = this.emergencyNameInput.value.trim().length >= 2;
        const emergencyPhoneValid = this.validatePhone(this.emergencyPhoneInput.value, this.emergencyPhoneCountrySelect.value);
        
        const isValid = emailValid && phoneValid && emergencyNameValid && emergencyPhoneValid;
        
        // Update button state
        this.continueBtn.disabled = !isValid;
        
        // Update button text
        const btnText = this.continueBtn.querySelector('.btn-text');
        if (btnText) {
            if (!emailValid) {
                btnText.textContent = 'Enter valid email';
            } else if (!phoneValid) {
                btnText.textContent = 'Enter valid phone';
            } else if (!emergencyNameValid) {
                btnText.textContent = 'Enter emergency contact';
            } else if (!emergencyPhoneValid) {
                btnText.textContent = 'Enter emergency phone';
            } else {
                btnText.textContent = 'Continue to Health Info';
            }
        }
        
        return isValid;
    }

    validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email.trim());
    }

    handleContinue() {
        if (this.validateForm()) {
            // Final validation on all fields
            const emailValid = this.validateField(this.emailInput, 'email');
            const phoneValid = this.validateField(this.phoneInput, 'phone');
            const nameValid = this.validateField(this.emergencyNameInput, 'text');
            const emergencyPhoneValid = this.validateField(this.emergencyPhoneInput, 'phone');

            if (!emailValid || !phoneValid || !nameValid || !emergencyPhoneValid) {
                this.showMessage('Please fix the errors before continuing', 'error');
                return;
            }

            // Show loading state
            this.continueBtn.disabled = true;
            const btnText = this.continueBtn.querySelector('.btn-text');
            const originalText = btnText.textContent;
            btnText.textContent = 'Processing...';
            
            // Get form data
            const contactData = {
                email: this.emailInput.value.trim(),
                phone: this.getFullPhoneNumber(this.phoneInput, this.phoneCountrySelect),
                phoneCountry: this.phoneCountrySelect.value,
                emergencyName: this.emergencyNameInput.value.trim(),
                emergencyPhone: this.getFullPhoneNumber(this.emergencyPhoneInput, this.emergencyPhoneCountrySelect),
                emergencyPhoneCountry: this.emergencyPhoneCountrySelect.value,
                timestamp: new Date().toISOString()
            };
            
            // Save to localStorage
            localStorage.setItem('contactFormData', JSON.stringify(contactData));
            
            // Simulate processing
            setTimeout(() => {
                this.showMessage('Contact information saved! Moving to health questionnaire...', 'success');
                
                // Navigate to step 3
                setTimeout(() => {
                    window.location.href = 'schedule-donation-step3.html';
                }, 1500);
            }, 800);
        }
    }

    handlePrevious() {
        // Auto-save current progress
        this.autoSave();
        
        // Show confirmation
        const hasData = this.emailInput.value || this.phoneInput.value || 
                       this.emergencyNameInput.value || this.emergencyPhoneInput.value;
        
        if (hasData) {
            const confirm = window.confirm('Your progress has been saved. Go back to Step 1?');
            if (confirm) {
                window.location.href = 'schedule-donation.html';
            }
        } else {
            window.location.href = 'schedule-donation.html';
        }
    }

    autoSave() {
        const contactData = {
            email: this.emailInput.value.trim(),
            phone: this.phoneInput.value.trim(),
            phoneCountry: this.phoneCountrySelect.value,
            emergencyName: this.emergencyNameInput.value.trim(),
            emergencyPhone: this.emergencyPhoneInput.value.trim(),
            emergencyPhoneCountry: this.emergencyPhoneCountrySelect.value,
            savedAt: new Date().toISOString()
        };
        
        localStorage.setItem('contactFormData', JSON.stringify(contactData));
    }

    showMessage(message, type = 'info') {
        // Create message element
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.textContent = message;
        
        let bgColor = '#457B9D';
        if (type === 'success') bgColor = '#16A34A';
        if (type === 'error') bgColor = '#DC3545';
        
        messageDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            background: ${bgColor};
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            animation: slideIn 0.3s ease;
            max-width: 400px;
        `;
        
        document.body.appendChild(messageDiv);
        
        // Remove message after 3 seconds
        setTimeout(() => {
            messageDiv.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    document.body.removeChild(messageDiv);
                }
            }, 300);
        }, 3000);
    }
}

// Add animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    @keyframes tooltipFade {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes tooltipFadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-8px);
        }
    }
`;
document.head.appendChild(style);

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new Navigation();
    new ContactInfoForm();
});
    </script>
@endsection

@push('scripts')
    <script>

// Navigation Module - Enhanced UX

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
    
    /**
     * Mobile Menu Functionality
     */
    setupMobileMenu() {
        if (!this.menuToggle) return;
        
        // Toggle menu on button click
        this.menuToggle.addEventListener('click', () => {
            this.toggleMenu();
        });
        
        // Close menu when clicking overlay
        if (this.navOverlay) {
            this.navOverlay.addEventListener('click', () => {
                this.closeMenu();
            });
        }
        
        // Close menu when clicking on a link
        this.links.forEach(link => {
            link.addEventListener('click', () => {
                this.closeMenu();
            });
        });
        
        // Prevent body scroll when menu is open
        this.navLinks?.addEventListener('touchmove', (e) => {
            if (this.isMenuOpen) {
                e.stopPropagation();
            }
        }, { passive: true });
    }
    
    /**
     * Toggle Menu State
     */
    toggleMenu() {
        this.isMenuOpen = !this.isMenuOpen;
        
        if (this.isMenuOpen) {
            this.openMenu();
        } else {
            this.closeMenu();
        }
    }
    
    /**
     * Open Mobile Menu
     */
    openMenu() {
        this.isMenuOpen = true;
        this.menuToggle?.classList.add('active');
        this.navLinks?.classList.add('active');
        this.navOverlay?.classList.add('active');
        this.menuToggle?.setAttribute('aria-expanded', 'true');
        this.menuToggle?.setAttribute('aria-label', 'Close navigation menu');
        this.navOverlay?.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        
        // Focus first link for accessibility
        setTimeout(() => {
            this.links[0]?.focus();
        }, 300);
    }
    
    /**
     * Close Mobile Menu
     */
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
    
    /**
     * Enhanced Scroll Behavior
     */
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
    
    /**
     * Handle Scroll Effects
     */
    handleScroll() {
        const currentScroll = window.pageYOffset;
        
        // Add shadow and shrink on scroll
        if (currentScroll > 50) {
            this.nav.classList.add('scrolled');
        } else {
            this.nav.classList.remove('scrolled');
        }
        
        // Close mobile menu on scroll
        if (this.isMenuOpen && Math.abs(currentScroll - this.lastScroll) > 50) {
            this.closeMenu();
        }
        
        this.lastScroll = currentScroll;
    }
    
    /**
     * Smooth Scroll with Offset
     */
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
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                        
                        // Update URL without jumping
                        history.pushState(null, null, href);
                        
                        // Set focus for accessibility
                        target.setAttribute('tabindex', '-1');
                        target.focus({ preventScroll: true });
                    }
                }
            });
        });
    }
    
    /**
     * Active Link Based on Scroll Position
     */
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
        
        // Initial check
        this.updateActiveLink(sections);
    }
    
    /**
     * Update Active Link
     */
    updateActiveLink(sections) {
        const scrollPos = window.pageYOffset + this.nav.offsetHeight + 100;
        const windowHeight = window.innerHeight;
        
        let currentSection = null;
        
        // Find the section that's currently most visible in the viewport
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionBottom = sectionTop + section.offsetHeight;
            
            // Check if section is in viewport
            if (sectionTop <= scrollPos && sectionBottom > scrollPos) {
                currentSection = section;
            }
        });
        
        // If no section found (at top of page), highlight the hero/first section
        if (!currentSection && scrollPos < (sections[0]?.offsetTop + 200)) {
            currentSection = sections[0];
        }
        
        // Update active class
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
    
    /**
     * Keyboard Navigation Support
     */
    setupKeyboardNavigation() {
        // ESC key to close menu
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && this.isMenuOpen) {
                this.closeMenu();
                this.menuToggle?.focus();
            }
        });
        
        // Tab trapping in mobile menu
        if (this.navLinks) {
            this.navLinks.addEventListener('keydown', (e) => {
                if (!this.isMenuOpen) return;
                
                if (e.key === 'Tab') {
                    const focusableElements = this.navLinks.querySelectorAll(
                        'a, button, [tabindex]:not([tabindex="-1"])'
                    );
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
    
    /**
     * Handle Window Resize
     */
    handleResize() {
        let resizeTimer;
        
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                // Close menu on desktop resize
                if (window.innerWidth > 768 && this.isMenuOpen) {
                    this.closeMenu();
                }
            }, 250);
        });
    }
}

// Schedule Donation Step 2 - Contact Information Form Module

class ContactInfoForm {
    constructor() {
        this.form = document.getElementById('contactForm');
        this.continueBtn = document.getElementById('continueBtn');
        this.previousBtn = document.getElementById('previousBtn');
        this.emailInput = document.getElementById('email');
        this.phoneInput = document.getElementById('phone');
        this.phoneCountrySelect = document.getElementById('phoneCountry');
        this.emergencyNameInput = document.getElementById('emergencyName');
        this.emergencyPhoneInput = document.getElementById('emergencyPhone');
        this.emergencyPhoneCountrySelect = document.getElementById('emergencyPhoneCountry');
        
        this.init();
    }

    init() {
        // Load previous step data
        this.loadPreviousStepData();
        
        // Add event listeners
        this.addEventListeners();
        
        // Initial validation check
        this.validateForm();
    }

    loadPreviousStepData() {
        const formData = localStorage.getItem('scheduleFormData');
        if (!formData) {
            // Redirect back to step 1 if no data found
            this.showMessage('Please complete Step 1 first', 'error');
            setTimeout(() => {
                window.location.href = 'schedule-donation.html';
            }, 2000);
            return;
        }
        
        // Load saved contact info if exists
        const contactData = localStorage.getItem('contactFormData');
        if (contactData) {
            try {
                const data = JSON.parse(contactData);
                if (data.email) this.emailInput.value = data.email;
                if (data.phone) this.phoneInput.value = data.phone;
                if (data.phoneCountry) this.phoneCountrySelect.value = data.phoneCountry;
                if (data.emergencyName) this.emergencyNameInput.value = data.emergencyName;
                if (data.emergencyPhone) this.emergencyPhoneInput.value = data.emergencyPhone;
                if (data.emergencyPhoneCountry) this.emergencyPhoneCountrySelect.value = data.emergencyPhoneCountry;
                
                // Validate loaded fields
                setTimeout(() => {
                    if (data.email) this.validateField(this.emailInput, 'email');
                    if (data.phone) this.validateField(this.phoneInput, 'phone');
                    if (data.emergencyName) this.validateField(this.emergencyNameInput, 'text');
                    if (data.emergencyPhone) this.validateField(this.emergencyPhoneInput, 'phone');
                    this.validateForm();
                }, 100);
            } catch (e) {
                console.error('Error loading contact data:', e);
            }
        }
    }

    addEventListeners() {
        // Email validation
        this.emailInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'email');
            this.validateForm();
        });

        this.emailInput.addEventListener('input', () => {
            this.validateForm();
        });

        // Phone validation
        this.phoneInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'phone');
            this.validateForm();
        });

        this.phoneInput.addEventListener('input', (e) => {
            this.formatPhoneNumber(e.target);
            this.validateForm();
        });

        // Emergency name validation
        this.emergencyNameInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'text');
            this.validateForm();
        });

        this.emergencyNameInput.addEventListener('input', () => {
            this.validateForm();
        });

        // Emergency phone validation
        this.emergencyPhoneInput.addEventListener('blur', (e) => {
            this.validateField(e.target, 'phone');
            this.validateForm();
        });

        this.emergencyPhoneInput.addEventListener('input', (e) => {
            this.formatPhoneNumber(e.target);
            this.validateForm();
        });

        // Focus handlers to remove validation states
        [this.emailInput, this.phoneInput, this.emergencyNameInput, this.emergencyPhoneInput].forEach(input => {
            input.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        });

        // Button handlers
        this.continueBtn.addEventListener('click', () => this.handleContinue());
        this.previousBtn.addEventListener('click', () => this.handlePrevious());

        // Auto-save on input
        let autoSaveTimeout;
        this.form.addEventListener('input', () => {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => this.autoSave(), 1500);
        });

        // Prevent form submission
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleContinue();
        });
        
        // Setup help tooltips
        this.setupHelpTooltips();
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
        // Remove existing tooltips
        document.querySelectorAll('.custom-tooltip').forEach(t => t.remove());
        
        const tooltip = document.createElement('div');
        tooltip.className = 'custom-tooltip';
        tooltip.textContent = message;
        tooltip.style.cssText = `
            position: absolute;
            background: #1D3557;
            color: white;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 13px;
            line-height: 18px;
            max-width: 280px;
            z-index: 1000;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            animation: tooltipFade 0.3s ease;
        `;
        
        document.body.appendChild(tooltip);
        
        const rect = element.getBoundingClientRect();
        tooltip.style.top = `${rect.bottom + 8}px`;
        tooltip.style.left = `${rect.left - tooltip.offsetWidth / 2 + rect.width / 2}px`;
        
        setTimeout(() => {
            tooltip.style.animation = 'tooltipFadeOut 0.3s ease';
            setTimeout(() => tooltip.remove(), 300);
        }, 3000);
    }

    handleFieldFocus(field) {
        field.classList.remove('invalid', 'valid');
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        if (statusEl) {
            statusEl.classList.remove('show');
        }
    }

    validateField(field, type) {
        const value = field.value.trim();
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        
        if (!statusEl) return false;

        let isValid = false;
        let message = '';

        switch(type) {
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                isValid = emailRegex.test(value);
                message = isValid ? 'Valid email address ✓' : 'Please enter a valid email address';
                break;

            case 'phone':
                const countryCode = field.id === 'phone' 
                    ? this.phoneCountrySelect.value 
                    : this.emergencyPhoneCountrySelect.value;
                const digits = value.replace(/\D/g, '');
                
                if (countryCode === '+63') {
                    isValid = digits.length === 10 && digits.startsWith('9');
                    message = isValid ? 'Valid Philippine mobile number ✓' : 'Enter 10 digits starting with 9';
                } else {
                    isValid = digits.length >= 7 && digits.length <= 15;
                    message = isValid ? 'Valid phone number ✓' : 'Enter a valid phone number';
                }
                break;

            case 'text':
                isValid = value.length >= 2;
                message = isValid ? 'Name confirmed ✓' : 'Please enter a valid name';
                break;
        }

        if (value === '') {
            field.classList.remove('valid', 'invalid');
            statusEl.classList.remove('show');
            return false;
        }

        if (isValid) {
            field.classList.remove('invalid');
            field.classList.add('valid');
            statusEl.textContent = message;
            statusEl.className = 'field-status success show';
        } else {
            field.classList.remove('valid');
            field.classList.add('invalid');
            statusEl.textContent = message;
            statusEl.className = 'field-status error show';
        }

        return isValid;
    }

    formatPhoneNumber(input) {
        let value = input.value.replace(/\D/g, '');
        const countryCode = input.id === 'phone' 
            ? this.phoneCountrySelect.value 
            : this.emergencyPhoneCountrySelect.value;
        
        // Format based on country code
        if (countryCode === '+63') {
            // Philippine format: XXX XXX XXXX
            if (value.length <= 3) {
                input.value = value;
            } else if (value.length <= 6) {
                input.value = `${value.substring(0, 3)} ${value.substring(3)}`;
            } else {
                input.value = `${value.substring(0, 3)} ${value.substring(3, 6)} ${value.substring(6, 10)}`;
            }
        } else {
            // Generic international format
            input.value = value;
        }
    }

    validatePhone(phone, countryCode = '+63') {
        const digits = phone.replace(/\D/g, '');
        
        // Validation based on country code
        if (countryCode === '+63') {
            // Philippine numbers: 10 digits (without country code)
            return digits.length === 10 && digits.startsWith('9');
        } else {
            // Generic validation: 7-15 digits
            return digits.length >= 7 && digits.length <= 15;
        }
    }

    getFullPhoneNumber(input, countrySelect) {
        const countryCode = countrySelect.value;
        const digits = input.value.replace(/\D/g, '');
        return `${countryCode} ${digits}`;
    }

    validateForm() {
        const emailValid = this.validateEmail(this.emailInput.value);
        const phoneValid = this.validatePhone(this.phoneInput.value, this.phoneCountrySelect.value);
        const emergencyNameValid = this.emergencyNameInput.value.trim().length >= 2;
        const emergencyPhoneValid = this.validatePhone(this.emergencyPhoneInput.value, this.emergencyPhoneCountrySelect.value);
        
        const isValid = emailValid && phoneValid && emergencyNameValid && emergencyPhoneValid;
        
        // Update button state
        this.continueBtn.disabled = !isValid;
        
        // Update button text
        const btnText = this.continueBtn.querySelector('.btn-text');
        if (btnText) {
            if (!emailValid) {
                btnText.textContent = 'Enter valid email';
            } else if (!phoneValid) {
                btnText.textContent = 'Enter valid phone';
            } else if (!emergencyNameValid) {
                btnText.textContent = 'Enter emergency contact';
            } else if (!emergencyPhoneValid) {
                btnText.textContent = 'Enter emergency phone';
            } else {
                btnText.textContent = 'Continue to Health Info';
            }
        }
        
        return isValid;
    }

    validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email.trim());
    }

    handleContinue() {
        if (this.validateForm()) {
            // Final validation on all fields
            const emailValid = this.validateField(this.emailInput, 'email');
            const phoneValid = this.validateField(this.phoneInput, 'phone');
            const nameValid = this.validateField(this.emergencyNameInput, 'text');
            const emergencyPhoneValid = this.validateField(this.emergencyPhoneInput, 'phone');

            if (!emailValid || !phoneValid || !nameValid || !emergencyPhoneValid) {
                this.showMessage('Please fix the errors before continuing', 'error');
                return;
            }

            // Show loading state
            this.continueBtn.disabled = true;
            const btnText = this.continueBtn.querySelector('.btn-text');
            const originalText = btnText.textContent;
            btnText.textContent = 'Processing...';
            
            // Get form data
            const contactData = {
                email: this.emailInput.value.trim(),
                phone: this.getFullPhoneNumber(this.phoneInput, this.phoneCountrySelect),
                phoneCountry: this.phoneCountrySelect.value,
                emergencyName: this.emergencyNameInput.value.trim(),
                emergencyPhone: this.getFullPhoneNumber(this.emergencyPhoneInput, this.emergencyPhoneCountrySelect),
                emergencyPhoneCountry: this.emergencyPhoneCountrySelect.value,
                timestamp: new Date().toISOString()
            };
            
            // Save to localStorage
            localStorage.setItem('contactFormData', JSON.stringify(contactData));
            
            // Simulate processing
            setTimeout(() => {
                this.showMessage('Contact information saved! Moving to health questionnaire...', 'success');
                
                // Navigate to step 3
                setTimeout(() => {
                    window.location.href = 'schedule-donation-step3.html';
                }, 1500);
            }, 800);
        }
    }

    handlePrevious() {
        // Auto-save current progress
        this.autoSave();
        
        // Show confirmation
        const hasData = this.emailInput.value || this.phoneInput.value || 
                       this.emergencyNameInput.value || this.emergencyPhoneInput.value;
        
        if (hasData) {
            const confirm = window.confirm('Your progress has been saved. Go back to Step 1?');
            if (confirm) {
                window.location.href = 'schedule-donation.html';
            }
        } else {
            window.location.href = 'schedule-donation.html';
        }
    }

    autoSave() {
        const contactData = {
            email: this.emailInput.value.trim(),
            phone: this.phoneInput.value.trim(),
            phoneCountry: this.phoneCountrySelect.value,
            emergencyName: this.emergencyNameInput.value.trim(),
            emergencyPhone: this.emergencyPhoneInput.value.trim(),
            emergencyPhoneCountry: this.emergencyPhoneCountrySelect.value,
            savedAt: new Date().toISOString()
        };
        
        localStorage.setItem('contactFormData', JSON.stringify(contactData));
    }

    showMessage(message, type = 'info') {
        // Create message element
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.textContent = message;
        
        let bgColor = '#457B9D';
        if (type === 'success') bgColor = '#16A34A';
        if (type === 'error') bgColor = '#DC3545';
        
        messageDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            background: ${bgColor};
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            animation: slideIn 0.3s ease;
            max-width: 400px;
        `;
        
        document.body.appendChild(messageDiv);
        
        // Remove message after 3 seconds
        setTimeout(() => {
            messageDiv.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                if (messageDiv.parentNode) {
                    document.body.removeChild(messageDiv);
                }
            }, 300);
        }, 3000);
    }
}

// Add animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
    @keyframes tooltipFade {
        from {
            opacity: 0;
            transform: translateY(-8px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes tooltipFadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-8px);
        }
    }
`;
document.head.appendChild(style);

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    new Navigation();
    new ContactInfoForm();
});
    
    </script>
@endpush
