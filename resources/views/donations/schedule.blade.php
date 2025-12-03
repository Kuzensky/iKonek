@extends('layouts.frontend')

@section('title', 'Schedule Donation - iKonek')

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
                        <span class="progress-text">Step 1 of 3</span>
                        <div class="progress-bar-mini">
                            <div class="progress-fill-mini" style="width: 33.33%;"></div>
                        </div>
                    </div>
                </div>
                <p class="page-subtitle">Book your blood donation appointment in just a few steps. This will only take 2-3 minutes.</p>
            </div>

            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="step-item step-active" role="tab" aria-selected="true" aria-label="Step 1: Location and Time">
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
                        <div class="step-label">Location & Time</div>
                        <div class="step-sublabel">Choose hospital</div>
                    </div>
                </div>
                <div class="step-item" role="tab" aria-selected="false" aria-label="Step 2: Contact Information">
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
                        <div class="step-sublabel">Verify details</div>
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
                        <div class="step-sublabel">Final check</div>
                    </div>
                </div>
            </div>

            <!-- Form Card -->
            <div class="schedule-card">
                <div class="schedule-card-header">
                    <div class="card-header-title">
                        <img src="{{ asset('assets/icons/location.svg') }}" alt="" class="card-icon" width="20" height="20">
                        <h2 class="card-title">Select Location & Time</h2>
                    </div>
                    <p class="card-description">Choose your preferred hospital and appointment time</p>
                </div>

                <div class="schedule-card-content">
                    <form id="scheduleForm" class="schedule-form" aria-label="Schedule donation form">
                        <!-- Hospital Selection -->
                        <div class="form-group">
                            <label for="hospital" class="form-label">
                                <span class="label-text">
                                    Hospital / Blood Bank
                                    <span class="required" aria-label="required">*</span>
                                </span>
                                <button type="button" class="help-icon" aria-label="Help: Choose the nearest hospital to you" title="Choose the nearest hospital or blood bank to you">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </label>
                            <div class="custom-select">
                                <select id="hospital" name="hospital" class="form-select" required aria-required="true">
                                    <option value="" disabled selected>Choose your preferred hospital or blood bank</option>
                                    <option value="philippine-general">Philippine General Hospital - Manila</option>
                                    <option value="makati-medical">Makati Medical Center - Makati City</option>
                                    <option value="st-lukes">St. Luke's Medical Center - Quezon City</option>
                                    <option value="manila-doctors">Manila Doctors Hospital - Manila</option>
                                    <option value="chinese-general">Chinese General Hospital - Manila</option>
                                </select>
                                <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="field-status" role="status" aria-live="polite"></div>
                        </div>

                        <!-- Preferred Date -->
                        <div class="form-group">
                            <label for="preferredDate" class="form-label">
                                <span class="label-text">
                                    Preferred Date
                                    <span class="required" aria-label="required">*</span>
                                </span>
                                <button type="button" class="help-icon" aria-label="Help: Select appointment date" title="Choose a date that works best for you. We recommend booking at least 3 days in advance.">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </label>
                            <input 
                                type="date" 
                                id="preferredDate" 
                                name="preferredDate" 
                                class="form-input" 
                                required
                                aria-required="true"
                                aria-describedby="dateHelp"
                            >
                            <p id="dateHelp" class="form-helper-text">You can schedule appointments up to 90 days in advance</p>
                            <div class="field-status" role="status" aria-live="polite"></div>
                        </div>

                        <!-- Preferred Time -->
                        <div class="form-group">
                            <label for="preferredTime" class="form-label">
                                <span class="label-text">
                                    Preferred Time
                                    <span class="required" aria-label="required">*</span>
                                </span>
                                <button type="button" class="help-icon" aria-label="Help: Select appointment time" title="Choose your preferred time slot. Most blood banks operate from 8:00 AM to 5:00 PM.">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </label>
                            <div class="custom-select">
                                <select id="preferredTime" name="preferredTime" class="form-select" required aria-required="true" aria-describedby="timeHelp">
                                    <option value="" disabled selected>Select your preferred time slot</option>
                                    <option value="08:00">8:00 AM - Morning slot</option>
                                    <option value="09:00">9:00 AM - Morning slot</option>
                                    <option value="10:00">10:00 AM - Morning slot</option>
                                    <option value="11:00">11:00 AM - Late morning</option>
                                    <option value="12:00">12:00 PM - Noon</option>
                                    <option value="13:00">1:00 PM - Early afternoon</option>
                                    <option value="14:00">2:00 PM - Afternoon slot</option>
                                    <option value="15:00">3:00 PM - Afternoon slot</option>
                                    <option value="16:00">4:00 PM - Late afternoon</option>
                                    <option value="17:00">5:00 PM - Evening slot</option>
                                </select>
                                <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p id="timeHelp" class="form-helper-text">Donation appointments typically take 45-60 minutes</p>
                            <div class="field-status" role="status" aria-live="polite"></div>
                        </div>

                        <!-- Blood Type -->
                        <div class="form-group">
                            <label for="bloodType" class="form-label">
                                <span class="label-text">
                                    Your Blood Type
                                    <span class="required" aria-label="required">*</span>
                                </span>
                                <button type="button" class="help-icon" aria-label="Help: Blood type information" title="If you don't know your blood type, you can find out during your first donation.">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </label>
                            <div class="custom-select">
                                <select id="bloodType" name="bloodType" class="form-select" required aria-required="true" aria-describedby="bloodTypeHelp">
                                    <option value="" disabled selected>Select your blood type</option>
                                    <option value="O+">O+ (Positive) - Most common, can donate to O+, A+, B+, AB+</option>
                                    <option value="O-">O- (Negative) - Universal donor, can donate to all types</option>
                                    <option value="A+">A+ (Positive) - Can donate to A+ and AB+</option>
                                    <option value="A-">A- (Negative) - Can donate to A+, A-, AB+, AB-</option>
                                    <option value="B+">B+ (Positive) - Can donate to B+ and AB+</option>
                                    <option value="B-">B- (Negative) - Can donate to B+, B-, AB+, AB-</option>
                                    <option value="AB+">AB+ (Positive) - Universal recipient, can receive from all</option>
                                    <option value="AB-">AB- (Negative) - Rarest type, can receive from all negative types</option>
                                    <option value="unknown">I don't know my blood type</option>
                                </select>
                                <svg class="select-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p id="bloodTypeHelp" class="form-helper-text" style="display: none;"></p>
                            <div class="field-status" role="status" aria-live="polite"></div>
                        </div>

                        <!-- First Time Donor Checkbox -->
                        <div class="form-group">
                            <div class="checkbox-container">
                                <input 
                                    type="checkbox" 
                                    id="firstTime" 
                                    name="firstTime" 
                                    class="form-checkbox"
                                    aria-describedby="firstTimeHelp"
                                >
                                <label for="firstTime" class="checkbox-label">
                                    <span class="checkbox-title">This is my first time donating blood</span>
                                    <span id="firstTimeHelp" class="checkbox-subtitle">We'll provide extra guidance and support for first-time donors</span>
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
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 8V12L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Average booking time: 2 minutes</span>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-save-draft" id="saveDraftBtn" aria-label="Save as draft">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H16L21 8V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M17 21V13H7V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 3V8H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Save for Later
                    </button>
                    <button type="button" class="btn btn-continue" id="continueBtn" disabled aria-label="Continue to next step">
                        <span class="btn-text">Continue to Contact Info</span>
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

// Schedule Donation Form Module

class ScheduleDonationForm {
    constructor() {
        this.form = document.getElementById('scheduleForm');
        this.continueBtn = document.getElementById('continueBtn');
        this.saveDraftBtn = document.getElementById('saveDraftBtn');
        this.hospitalSelect = document.getElementById('hospital');
        this.dateInput = document.getElementById('preferredDate');
        this.timeSelect = document.getElementById('preferredTime');
        this.bloodTypeSelect = document.getElementById('bloodType');
        this.firstTimeCheckbox = document.getElementById('firstTime');
        
        this.init();
    }

    init() {
        // Set minimum date to tomorrow
        this.setMinDate();
        
        // Add event listeners
        this.addEventListeners();
        
        // Initial validation check
        this.validateForm();
        
        // Load saved draft if exists
        this.loadDraft();
        
        // Setup help tooltips
        this.setupHelpTooltips();
    }

    setMinDate() {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        
        const maxDate = new Date();
        maxDate.setDate(maxDate.getDate() + 90);
        
        const formatDate = (date) => {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };
        
        this.dateInput.min = formatDate(tomorrow);
        this.dateInput.max = formatDate(maxDate);
    }

    addEventListeners() {
        // Form field changes with visual feedback
        this.hospitalSelect.addEventListener('change', (e) => {
            this.validateField(e.target, 'hospital');
            this.validateForm();
        });
        
        this.dateInput.addEventListener('change', (e) => {
            this.validateField(e.target, 'date');
            this.validateForm();
        });
        
        this.timeSelect.addEventListener('change', (e) => {
            this.validateField(e.target, 'time');
            this.validateForm();
        });
        
        this.bloodTypeSelect.addEventListener('change', (e) => {
            this.validateField(e.target, 'bloodType');
            this.updateBloodTypeInfo(e.target.value);
            this.validateForm();
        });
        
        // Real-time input feedback
        this.hospitalSelect.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        this.dateInput.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        this.timeSelect.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        this.bloodTypeSelect.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        
        // Open date picker when clicking anywhere on the date input
        this.dateInput.addEventListener('click', function() {
            try {
                this.showPicker();
            } catch (e) {
                // Fallback for browsers that don't support showPicker()
                this.focus();
            }
        });
        
        // Continue button click
        this.continueBtn.addEventListener('click', () => this.handleContinue());
        
        // Save draft button
        this.saveDraftBtn.addEventListener('click', () => this.saveDraft());
        
        // Auto-save on form changes (debounced)
        let autoSaveTimeout;
        this.form.addEventListener('input', () => {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => this.autoSave(), 2000);
        });
    }
    
    handleFieldFocus(field) {
        field.classList.remove('invalid', 'valid');
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        if (statusEl) {
            statusEl.classList.remove('show');
        }
    }
    
    validateField(field, fieldType) {
        const value = field.value;
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        
        if (!statusEl) return;
        
        if (value) {
            field.classList.remove('invalid');
            field.classList.add('valid');
            
            let message = '';
            switch(fieldType) {
                case 'hospital':
                    message = 'Hospital selected ✓';
                    break;
                case 'date':
                    const selectedDate = new Date(value);
                    const dayName = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });
                    message = `Appointment on ${dayName} ✓`;
                    break;
                case 'time':
                    const hour = parseInt(value.split(':')[0]);
                    const period = hour < 12 ? 'AM' : 'PM';
                    const displayHour = hour > 12 ? hour - 12 : (hour === 0 ? 12 : hour);
                    message = `${displayHour}:00 ${period} slot reserved ✓`;
                    break;
                case 'bloodType':
                    message = 'Blood type confirmed ✓';
                    break;
            }
            
            statusEl.textContent = message;
            statusEl.className = 'field-status success show';
        } else {
            field.classList.remove('valid');
            statusEl.classList.remove('show');
        }
    }
    
    updateBloodTypeInfo(bloodType) {
        const helpText = document.getElementById('bloodTypeHelp');
        if (!helpText) return;
        
        const info = {
            'O+': 'Can donate to O+, A+, B+, AB+ recipients (38% of population)',
            'O-': 'Universal donor! Can donate to all blood types (7% of population)',
            'A+': 'Can donate to A+ and AB+ recipients (34% of population)',
            'A-': 'Can donate to A+, A-, AB+, AB- (6% of population)',
            'B+': 'Can donate to B+ and AB+ recipients (9% of population)',
            'B-': 'Can donate to B+, B-, AB+, AB- (2% of population)',
            'AB+': 'Universal recipient! Can receive from all types (3% of population)',
            'AB-': 'Rarest blood type! Can receive from all negative types (1% of population)',
            'unknown': 'No worries! We can determine your blood type during donation.'
        };
        
        if (info[bloodType]) {
            helpText.textContent = info[bloodType];
            helpText.style.display = 'flex';
        } else {
            helpText.style.display = 'none';
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

    validateForm() {
        const isValid = this.hospitalSelect.value !== '' && 
                       this.dateInput.value !== '' && 
                       this.timeSelect.value !== '' && 
                       this.bloodTypeSelect.value !== '';
        
        // Update button state
        this.continueBtn.disabled = !isValid;
        
        // Update button text based on state
        const btnText = this.continueBtn.querySelector('.btn-text');
        if (btnText) {
            btnText.textContent = isValid ? 'Continue to Contact Info' : 'Please complete all fields';
        }
        
        return isValid;
    }

    handleContinue() {
        if (this.validateForm()) {
            // Show loading state
            this.continueBtn.disabled = true;
            const btnText = this.continueBtn.querySelector('.btn-text');
            const originalText = btnText.textContent;
            btnText.textContent = 'Processing...';
            
            // Get form data
            const formData = {
                hospital: this.hospitalSelect.value,
                hospitalName: this.hospitalSelect.options[this.hospitalSelect.selectedIndex].text,
                date: this.dateInput.value,
                time: this.timeSelect.value,
                timeDisplay: this.timeSelect.options[this.timeSelect.selectedIndex].text,
                bloodType: this.bloodTypeSelect.value,
                firstTime: this.firstTimeCheckbox.checked,
                timestamp: new Date().toISOString()
            };
            
            // Save to localStorage for next step
            localStorage.setItem('scheduleFormData', JSON.stringify(formData));
            localStorage.removeItem('scheduleFormDraft'); // Clear draft
            
            // Simulate processing
            setTimeout(() => {
                // Show success message
                this.showMessage('Step 1 completed! Moving to contact information...', 'success');
                
                // Navigate to step 2
                setTimeout(() => {
                    window.location.href = '{{ route('donations.step2') }}';
                }, 1500);
            }, 800);
        }
    }
    
    saveDraft() {
        const formData = {
            hospital: this.hospitalSelect.value,
            date: this.dateInput.value,
            time: this.timeSelect.value,
            bloodType: this.bloodTypeSelect.value,
            firstTime: this.firstTimeCheckbox.checked,
            savedAt: new Date().toISOString()
        };
        
        localStorage.setItem('scheduleFormDraft', JSON.stringify(formData));
        this.showMessage('Draft saved! You can continue later.', 'info');
    }
    
    autoSave() {
        if (this.hospitalSelect.value || this.dateInput.value || this.timeSelect.value || this.bloodTypeSelect.value) {
            const formData = {
                hospital: this.hospitalSelect.value,
                date: this.dateInput.value,
                time: this.timeSelect.value,
                bloodType: this.bloodTypeSelect.value,
                firstTime: this.firstTimeCheckbox.checked,
                savedAt: new Date().toISOString()
            };
            
            localStorage.setItem('scheduleFormDraft', JSON.stringify(formData));
        }
    }
    
    loadDraft() {
        const draft = localStorage.getItem('scheduleFormDraft');
        if (draft) {
            try {
                const formData = JSON.parse(draft);
                
                // Show restore message
                const restore = confirm('We found a saved draft from your previous session. Would you like to restore it?');
                
                if (restore) {
                    if (formData.hospital) this.hospitalSelect.value = formData.hospital;
                    if (formData.date) this.dateInput.value = formData.date;
                    if (formData.time) this.timeSelect.value = formData.time;
                    if (formData.bloodType) this.bloodTypeSelect.value = formData.bloodType;
                    if (formData.firstTime) this.firstTimeCheckbox.checked = formData.firstTime;
                    
                    this.validateForm();
                    this.showMessage('Draft restored successfully!', 'success');
                } else {
                    localStorage.removeItem('scheduleFormDraft');
                }
            } catch (e) {
                console.error('Error loading draft:', e);
                localStorage.removeItem('scheduleFormDraft');
            }
        }
    }

    showMessage(message, type = 'info') {
        // Create message element
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.textContent = message;
        messageDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            background: ${type === 'success' ? '#16A34A' : '#457B9D'};
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(messageDiv);
        
        // Remove message after 3 seconds
        setTimeout(() => {
            messageDiv.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(messageDiv);
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
    new ScheduleDonationForm();
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

// Schedule Donation Form Module

class ScheduleDonationForm {
    constructor() {
        this.form = document.getElementById('scheduleForm');
        this.continueBtn = document.getElementById('continueBtn');
        this.saveDraftBtn = document.getElementById('saveDraftBtn');
        this.hospitalSelect = document.getElementById('hospital');
        this.dateInput = document.getElementById('preferredDate');
        this.timeSelect = document.getElementById('preferredTime');
        this.bloodTypeSelect = document.getElementById('bloodType');
        this.firstTimeCheckbox = document.getElementById('firstTime');
        
        this.init();
    }

    init() {
        // Set minimum date to tomorrow
        this.setMinDate();
        
        // Add event listeners
        this.addEventListeners();
        
        // Initial validation check
        this.validateForm();
        
        // Load saved draft if exists
        this.loadDraft();
        
        // Setup help tooltips
        this.setupHelpTooltips();
    }

    setMinDate() {
        const tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        
        const maxDate = new Date();
        maxDate.setDate(maxDate.getDate() + 90);
        
        const formatDate = (date) => {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };
        
        this.dateInput.min = formatDate(tomorrow);
        this.dateInput.max = formatDate(maxDate);
    }

    addEventListeners() {
        // Form field changes with visual feedback
        this.hospitalSelect.addEventListener('change', (e) => {
            this.validateField(e.target, 'hospital');
            this.validateForm();
        });
        
        this.dateInput.addEventListener('change', (e) => {
            this.validateField(e.target, 'date');
            this.validateForm();
        });
        
        this.timeSelect.addEventListener('change', (e) => {
            this.validateField(e.target, 'time');
            this.validateForm();
        });
        
        this.bloodTypeSelect.addEventListener('change', (e) => {
            this.validateField(e.target, 'bloodType');
            this.updateBloodTypeInfo(e.target.value);
            this.validateForm();
        });
        
        // Real-time input feedback
        this.hospitalSelect.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        this.dateInput.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        this.timeSelect.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        this.bloodTypeSelect.addEventListener('focus', (e) => this.handleFieldFocus(e.target));
        
        // Open date picker when clicking anywhere on the date input
        this.dateInput.addEventListener('click', function() {
            try {
                this.showPicker();
            } catch (e) {
                // Fallback for browsers that don't support showPicker()
                this.focus();
            }
        });
        
        // Continue button click
        this.continueBtn.addEventListener('click', () => this.handleContinue());
        
        // Save draft button
        this.saveDraftBtn.addEventListener('click', () => this.saveDraft());
        
        // Auto-save on form changes (debounced)
        let autoSaveTimeout;
        this.form.addEventListener('input', () => {
            clearTimeout(autoSaveTimeout);
            autoSaveTimeout = setTimeout(() => this.autoSave(), 2000);
        });
    }
    
    handleFieldFocus(field) {
        field.classList.remove('invalid', 'valid');
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        if (statusEl) {
            statusEl.classList.remove('show');
        }
    }
    
    validateField(field, fieldType) {
        const value = field.value;
        const statusEl = field.closest('.form-group').querySelector('.field-status');
        
        if (!statusEl) return;
        
        if (value) {
            field.classList.remove('invalid');
            field.classList.add('valid');
            
            let message = '';
            switch(fieldType) {
                case 'hospital':
                    message = 'Hospital selected ✓';
                    break;
                case 'date':
                    const selectedDate = new Date(value);
                    const dayName = selectedDate.toLocaleDateString('en-US', { weekday: 'long' });
                    message = `Appointment on ${dayName} ✓`;
                    break;
                case 'time':
                    const hour = parseInt(value.split(':')[0]);
                    const period = hour < 12 ? 'AM' : 'PM';
                    const displayHour = hour > 12 ? hour - 12 : (hour === 0 ? 12 : hour);
                    message = `${displayHour}:00 ${period} slot reserved ✓`;
                    break;
                case 'bloodType':
                    message = 'Blood type confirmed ✓';
                    break;
            }
            
            statusEl.textContent = message;
            statusEl.className = 'field-status success show';
        } else {
            field.classList.remove('valid');
            statusEl.classList.remove('show');
        }
    }
    
    updateBloodTypeInfo(bloodType) {
        const helpText = document.getElementById('bloodTypeHelp');
        if (!helpText) return;
        
        const info = {
            'O+': 'Can donate to O+, A+, B+, AB+ recipients (38% of population)',
            'O-': 'Universal donor! Can donate to all blood types (7% of population)',
            'A+': 'Can donate to A+ and AB+ recipients (34% of population)',
            'A-': 'Can donate to A+, A-, AB+, AB- (6% of population)',
            'B+': 'Can donate to B+ and AB+ recipients (9% of population)',
            'B-': 'Can donate to B+, B-, AB+, AB- (2% of population)',
            'AB+': 'Universal recipient! Can receive from all types (3% of population)',
            'AB-': 'Rarest blood type! Can receive from all negative types (1% of population)',
            'unknown': 'No worries! We can determine your blood type during donation.'
        };
        
        if (info[bloodType]) {
            helpText.textContent = info[bloodType];
            helpText.style.display = 'flex';
        } else {
            helpText.style.display = 'none';
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

    validateForm() {
        const isValid = this.hospitalSelect.value !== '' && 
                       this.dateInput.value !== '' && 
                       this.timeSelect.value !== '' && 
                       this.bloodTypeSelect.value !== '';
        
        // Update button state
        this.continueBtn.disabled = !isValid;
        
        // Update button text based on state
        const btnText = this.continueBtn.querySelector('.btn-text');
        if (btnText) {
            btnText.textContent = isValid ? 'Continue to Contact Info' : 'Please complete all fields';
        }
        
        return isValid;
    }

    handleContinue() {
        if (this.validateForm()) {
            // Show loading state
            this.continueBtn.disabled = true;
            const btnText = this.continueBtn.querySelector('.btn-text');
            const originalText = btnText.textContent;
            btnText.textContent = 'Processing...';
            
            // Get form data
            const formData = {
                hospital: this.hospitalSelect.value,
                hospitalName: this.hospitalSelect.options[this.hospitalSelect.selectedIndex].text,
                date: this.dateInput.value,
                time: this.timeSelect.value,
                timeDisplay: this.timeSelect.options[this.timeSelect.selectedIndex].text,
                bloodType: this.bloodTypeSelect.value,
                firstTime: this.firstTimeCheckbox.checked,
                timestamp: new Date().toISOString()
            };
            
            // Save to localStorage for next step
            localStorage.setItem('scheduleFormData', JSON.stringify(formData));
            localStorage.removeItem('scheduleFormDraft'); // Clear draft
            
            // Simulate processing
            setTimeout(() => {
                // Show success message
                this.showMessage('Step 1 completed! Moving to contact information...', 'success');
                
                // Navigate to step 2
                setTimeout(() => {
                    window.location.href = '{{ route('donations.step2') }}';
                }, 1500);
            }, 800);
        }
    }
    
    saveDraft() {
        const formData = {
            hospital: this.hospitalSelect.value,
            date: this.dateInput.value,
            time: this.timeSelect.value,
            bloodType: this.bloodTypeSelect.value,
            firstTime: this.firstTimeCheckbox.checked,
            savedAt: new Date().toISOString()
        };
        
        localStorage.setItem('scheduleFormDraft', JSON.stringify(formData));
        this.showMessage('Draft saved! You can continue later.', 'info');
    }
    
    autoSave() {
        if (this.hospitalSelect.value || this.dateInput.value || this.timeSelect.value || this.bloodTypeSelect.value) {
            const formData = {
                hospital: this.hospitalSelect.value,
                date: this.dateInput.value,
                time: this.timeSelect.value,
                bloodType: this.bloodTypeSelect.value,
                firstTime: this.firstTimeCheckbox.checked,
                savedAt: new Date().toISOString()
            };
            
            localStorage.setItem('scheduleFormDraft', JSON.stringify(formData));
        }
    }
    
    loadDraft() {
        const draft = localStorage.getItem('scheduleFormDraft');
        if (draft) {
            try {
                const formData = JSON.parse(draft);
                
                // Show restore message
                const restore = confirm('We found a saved draft from your previous session. Would you like to restore it?');
                
                if (restore) {
                    if (formData.hospital) this.hospitalSelect.value = formData.hospital;
                    if (formData.date) this.dateInput.value = formData.date;
                    if (formData.time) this.timeSelect.value = formData.time;
                    if (formData.bloodType) this.bloodTypeSelect.value = formData.bloodType;
                    if (formData.firstTime) this.firstTimeCheckbox.checked = formData.firstTime;
                    
                    this.validateForm();
                    this.showMessage('Draft restored successfully!', 'success');
                } else {
                    localStorage.removeItem('scheduleFormDraft');
                }
            } catch (e) {
                console.error('Error loading draft:', e);
                localStorage.removeItem('scheduleFormDraft');
            }
        }
    }

    showMessage(message, type = 'info') {
        // Create message element
        const messageDiv = document.createElement('div');
        messageDiv.className = `form-message form-message-${type}`;
        messageDiv.textContent = message;
        messageDiv.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            background: ${type === 'success' ? '#16A34A' : '#457B9D'};
            color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            animation: slideIn 0.3s ease;
        `;
        
        document.body.appendChild(messageDiv);
        
        // Remove message after 3 seconds
        setTimeout(() => {
            messageDiv.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => {
                document.body.removeChild(messageDiv);
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
    new ScheduleDonationForm();
});
    
    </script>
@endpush
