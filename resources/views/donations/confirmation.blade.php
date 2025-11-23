@extends('layouts.frontend')

@section('title', 'Appointment Confirmed - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/confirmation.css') }}">
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
        <div class="confirmation-container">
            <!-- Success Icon -->
            <div class="success-icon-wrapper">
                <div class="success-icon">
                    <img src="{{ asset('assets/icons/check-mark-green.svg') }}" alt="Success" width="40" height="40">
                </div>
            </div>

            <!-- Success Message -->
            <div class="success-message" role="status" aria-live="polite">
                <h1 class="success-title">Donation Scheduled Successfully!</h1>
                <p class="success-description">
                    Your appointment has been confirmed. We've sent the details to<br>
                    <strong id="confirmEmail">aguzarjoel07@gmail.com</strong>
                </p>
                <p class="success-description" style="margin-top: 8px; font-size: 14px;">
                    Please arrive 15 minutes early and bring a valid ID.
                </p>
            </div>

            <!-- Confirmation Card -->
            <div class="confirmation-card">
                <div class="confirmation-card-header">
                    <img src="{{ asset('assets/icons/blood-drop.svg') }}" alt="" class="card-header-icon" width="20" height="20">
                    <h2 class="confirmation-card-title">Appointment Confirmation</h2>
                </div>

                <div class="confirmation-card-content">
                    <!-- Date & Time -->
                    <div class="confirmation-info-box">
                        <div class="info-box-icon date-icon">
                            <img src="{{ asset('assets/icons/calendar-red.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="info-box-content">
                            <p class="info-box-label">Date & Time</p>
                            <p class="info-box-value" id="appointmentDate">Friday, October 10, 2025</p>
                            <p class="info-box-subvalue">
                                <img src="{{ asset('assets/icons/clock.svg') }}" alt="" width="16" height="16" class="inline-icon">
                                <span id="appointmentTime">9:00 AM</span>
                            </p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="confirmation-info-box">
                        <div class="info-box-icon location-icon">
                            <img src="{{ asset('assets/icons/location-blue.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="info-box-content">
                            <p class="info-box-label">Location</p>
                            <p class="info-box-value" id="appointmentLocation">Philippine General Hospital</p>
                            <p class="info-box-subvalue" id="appointmentAddress">Taft Avenue, Manila</p>
                            <p class="info-box-subvalue">
                                <img src="{{ asset('assets/icons/phone.svg') }}" alt="" width="14" height="14" class="inline-icon">
                                <span id="appointmentPhone">+63 2 8554 8400</span>
                            </p>
                        </div>
                    </div>

                    <!-- Blood Type -->
                    <div class="confirmation-info-box">
                        <div class="info-box-icon blood-icon">
                            <img src="{{ asset('assets/icons/red-blood-1.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="info-box-content">
                            <p class="info-box-label">Blood Type</p>
                            <p class="info-box-value" id="appointmentBloodType">B-</p>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="confirmation-info-box">
                        <div class="info-box-icon contact-icon">
                            <img src="{{ asset('assets/icons/profile-blue.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="info-box-content">
                            <p class="info-box-label">Contact Information</p>
                            <p class="info-box-subvalue">
                                <img src="{{ asset('assets/icons/notification.svg') }}" alt="" width="14" height="14" class="inline-icon">
                                <span id="appointmentEmail">aguzarjoel07@gmail.com</span>
                            </p>
                            <p class="info-box-subvalue">
                                <img src="{{ asset('assets/icons/phone.svg') }}" alt="" width="14" height="14" class="inline-icon">
                                <span id="appointmentContactPhone">+639184648984</span>
                            </p>
                        </div>
                    </div>

                    <!-- Important Reminders -->
                    <div class="reminders-box">
                        <div class="reminders-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="reminders-content">
                            <p class="reminders-title">Important Reminders:</p>
                            <ul class="reminders-list">
                                <li>Arrive 15 minutes before your scheduled time</li>
                                <li>Bring a valid government-issued ID</li>
                                <li>Eat a healthy meal and stay hydrated before donation</li>
                                <li>Get adequate sleep the night before</li>
                                <li>Wear comfortable clothing with sleeves that can be rolled up</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="confirmation-actions">
                <button type="button" class="btn btn-primary" id="downloadTicketBtn" aria-label="Download appointment ticket">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 15V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 10L12 15L17 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 15V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="btn-text">Download Ticket</span>
                </button>
                <button type="button" class="btn btn-outline-primary" id="shareBtn" aria-label="Share appointment">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 6L12 2L8 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 2V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="btn-text">Share</span>
                </button>
                <button type="button" class="btn btn-outline" id="scheduleAnotherBtn" aria-label="Schedule another donation">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="btn-text">Schedule Another</span>
                </button>
            </div>
        </div>
    </main>

    <script>
// Navigation Module (Compact version)
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
        this.setupDashboardActiveLink();
    }
    setupDashboardActiveLink() {
        const sidebarLinks = document.querySelectorAll('.sidebar-nav .nav-item');
        if (sidebarLinks.length === 0) return;
        const currentPage = window.location.pathname.split('/').pop();
        sidebarLinks.forEach(link => {
            link.classList.remove('active');
            const linkHref = link.getAttribute('href');
            if (linkHref && (linkHref === currentPage || 
                (currentPage.startsWith('schedule-donation') && linkHref === 'schedule-donation.html'))) {
                link.classList.add('active');
            }
        });
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

// Confirmation Page Module
class ConfirmationPage {
    constructor() {
        this.scheduleAnotherBtn = document.getElementById('scheduleAnotherBtn');
        this.downloadTicketBtn = document.getElementById('downloadTicketBtn');
        this.shareBtn = document.getElementById('shareBtn');
        this.init();
    }
    init() {
        this.addEventListeners();
        this.loadAppointmentData();
        this.clearFormData();
    }
    loadAppointmentData() {
        const appointments = JSON.parse(localStorage.getItem('appointments') || '[]');
        if (appointments.length === 0) {
            console.warn('No appointment data found');
            return;
        }
        const appointment = appointments[appointments.length - 1];
        this.displayAppointmentData(appointment);
    }
    displayAppointmentData(appointment) {
        const formatDate = (dateString) => {
            if (!dateString) return '-';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        };
        document.getElementById('confirmEmail').textContent = appointment.email || '-';
        document.getElementById('appointmentDate').textContent = formatDate(appointment.date);
        document.getElementById('appointmentTime').textContent = appointment.time || '-';
        document.getElementById('appointmentLocation').textContent = appointment.hospitalName || appointment.hospital || '-';
        document.getElementById('appointmentAddress').textContent = appointment.address || 'Taft Avenue, Manila';
        document.getElementById('appointmentPhone').textContent = appointment.hospitalPhone || '+63 2 8554 8400';
        document.getElementById('appointmentBloodType').textContent = appointment.bloodType || '-';
        document.getElementById('appointmentEmail').textContent = appointment.email || '-';
        document.getElementById('appointmentContactPhone').textContent = appointment.phoneNumber || appointment.phone || '-';
        this.currentAppointment = appointment;
    }
    addEventListeners() {
        this.scheduleAnotherBtn?.addEventListener('click', () => { this.handleScheduleAnother(); });
        this.downloadTicketBtn?.addEventListener('click', () => { this.handleDownloadTicket(); });
        this.shareBtn?.addEventListener('click', () => { this.handleShare(); });
    }
    handleScheduleAnother() {
        this.clearFormData();
        window.location.href = 'schedule-donation.html';
    }
    handleDownloadTicket() {
        const appointment = this.currentAppointment;
        if (!appointment) {
            this.showMessage('Unable to generate ticket', 'error');
            return;
        }
        const btnText = this.downloadTicketBtn.querySelector('.btn-text');
        btnText.textContent = 'Generating...';
        this.downloadTicketBtn.disabled = true;
        setTimeout(() => { this.generateImageTicket(appointment); }, 500);
    }
    async generateImageTicket(appointment) {
        try {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 1080;
            canvas.height = 1400;
            const formatDate = (dateString) => {
                if (!dateString) return '-';
                const date = new Date(dateString);
                return date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            };
            const bgGradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
            bgGradient.addColorStop(0, '#F8F9FA');
            bgGradient.addColorStop(1, '#FFFFFF');
            ctx.fillStyle = bgGradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = '#1D3557';
            ctx.fillRect(0, 0, canvas.width, 160);
            ctx.fillStyle = '#E63946';
            ctx.font = 'bold 64px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('i', canvas.width / 2 - 65, 80);
            ctx.fillStyle = '#FFFFFF';
            ctx.fillText('  Konek', canvas.width / 2 + 25, 80);
            ctx.font = '22px Arial, sans-serif';
            ctx.fillStyle = 'rgba(255, 255, 255, 0.9)';
            ctx.fillText('Blood Donation Platform', canvas.width / 2, 125);
            const iconY = 230;
            ctx.fillStyle = 'rgba(22, 163, 74, 0.2)';
            ctx.beginPath();
            ctx.arc(canvas.width / 2 + 4, iconY + 4, 56, 0, Math.PI * 2);
            ctx.fill();
            const iconGradient = ctx.createRadialGradient(canvas.width / 2, iconY, 0, canvas.width / 2, iconY, 56);
            iconGradient.addColorStop(0, '#16A34A');
            iconGradient.addColorStop(1, '#15803D');
            ctx.fillStyle = iconGradient;
            ctx.beginPath();
            ctx.arc(canvas.width / 2, iconY, 56, 0, Math.PI * 2);
            ctx.fill();
            ctx.strokeStyle = '#FFFFFF';
            ctx.lineWidth = 8;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';
            ctx.beginPath();
            ctx.moveTo(canvas.width / 2 - 24, iconY);
            ctx.lineTo(canvas.width / 2 - 8, iconY + 20);
            ctx.lineTo(canvas.width / 2 + 28, iconY - 20);
            ctx.stroke();
            ctx.fillStyle = '#1D3557';
            ctx.font = 'bold 42px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('Appointment Confirmed!', canvas.width / 2, 340);
            ctx.fillStyle = 'rgba(230, 57, 70, 0.1)';
            ctx.beginPath();
            ctx.roundRect(canvas.width / 2 - 140, 360, 280, 40, 20);
            ctx.fill();
            ctx.fillStyle = '#E63946';
            ctx.font = 'bold 18px Arial, sans-serif';
            ctx.fillText(`ID: ${appointment.id}`, canvas.width / 2, 386);
            const cardX = 60;
            const cardY = 440;
            const cardWidth = canvas.width - 120;
            const cardHeight = 720;
            ctx.fillStyle = 'rgba(0, 0, 0, 0.08)';
            ctx.beginPath();
            ctx.roundRect(cardX + 4, cardY + 4, cardWidth, cardHeight, 16);
            ctx.fill();
            ctx.fillStyle = '#FFFFFF';
            ctx.beginPath();
            ctx.roundRect(cardX, cardY, cardWidth, cardHeight, 16);
            ctx.fill();
            ctx.strokeStyle = 'rgba(29, 53, 87, 0.1)';
            ctx.lineWidth = 2;
            ctx.stroke();
            const cardHeaderGradient = ctx.createLinearGradient(cardX, cardY, cardX + cardWidth, cardY);
            cardHeaderGradient.addColorStop(0, 'rgba(113, 156, 99, 0.15)');
            cardHeaderGradient.addColorStop(1, 'rgba(113, 156, 99, 0.08)');
            ctx.fillStyle = cardHeaderGradient;
            ctx.fillRect(cardX, cardY, cardWidth, 60);
            ctx.fillStyle = '#1D3557';
            ctx.font = 'bold 24px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('Appointment Details', canvas.width / 2, cardY + 38);
            const drawInfoBox = (icon, label, value, subvalue, y, iconBg) => {
                const boxX = cardX + 40;
                const boxWidth = cardWidth - 80;
                const boxGradient = ctx.createLinearGradient(boxX, y, boxX + boxWidth, y);
                boxGradient.addColorStop(0, '#F8F9FA');
                boxGradient.addColorStop(1, 'rgba(248, 249, 250, 0.5)');
                ctx.fillStyle = boxGradient;
                ctx.beginPath();
                ctx.roundRect(boxX, y, boxWidth, subvalue ? 90 : 70, 12);
                ctx.fill();
                ctx.strokeStyle = 'rgba(29, 53, 87, 0.08)';
                ctx.lineWidth = 1;
                ctx.stroke();
                const iconX = boxX + 28;
                const iconY = y + (subvalue ? 45 : 35);
                ctx.fillStyle = iconBg;
                ctx.beginPath();
                ctx.arc(iconX, iconY, 24, 0, Math.PI * 2);
                ctx.fill();
                ctx.font = '28px Arial, sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText(icon, iconX, iconY + 10);
                ctx.fillStyle = 'rgba(29, 53, 87, 0.6)';
                ctx.font = '14px Arial, sans-serif';
                ctx.textAlign = 'left';
                ctx.fillText(label.toUpperCase(), boxX + 70, y + 22);
                ctx.fillStyle = '#1D3557';
                ctx.font = 'bold 20px Arial, sans-serif';
                ctx.fillText(value, boxX + 70, y + 48);
                if (subvalue) {
                    ctx.fillStyle = 'rgba(29, 53, 87, 0.7)';
                    ctx.font = '16px Arial, sans-serif';
                    ctx.fillText(subvalue, boxX + 70, y + 72);
                }
            };
            let currentY = cardY + 90;
            drawInfoBox('📅', 'Date & Time', formatDate(appointment.date), '🕐 ' + (appointment.time || '-'), currentY, 'rgba(230, 57, 70, 0.1)');
            currentY += 110;
            drawInfoBox('📍', 'Location', appointment.hospitalName || appointment.hospital || '-', appointment.address || 'Taft Avenue, Manila', currentY, 'rgba(29, 53, 87, 0.1)');
            currentY += 110;
            drawInfoBox('🩸', 'Blood Type', appointment.bloodType || '-', null, currentY, 'rgba(230, 57, 70, 0.1)');
            currentY += 90;
            drawInfoBox('📧', 'Contact Information', appointment.email || '-', '📞 ' + (appointment.phoneNumber || appointment.phone || '-'), currentY, 'rgba(29, 53, 87, 0.1)');
            const remindersY = 1190;
            const remindersX = cardX;
            const remindersWidth = cardWidth;
            const remindersGradient = ctx.createLinearGradient(remindersX, remindersY, remindersX + remindersWidth, remindersY);
            remindersGradient.addColorStop(0, '#EFF6FF');
            remindersGradient.addColorStop(1, '#DBEAFE');
            ctx.fillStyle = remindersGradient;
            ctx.beginPath();
            ctx.roundRect(remindersX, remindersY, remindersWidth, 160, 16);
            ctx.fill();
            ctx.strokeStyle = '#BFDBFE';
            ctx.lineWidth = 3;
            ctx.stroke();
            ctx.fillStyle = '#1E40AF';
            ctx.font = 'bold 22px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('⚠️  Important Reminders', canvas.width / 2, remindersY + 35);
            ctx.fillStyle = '#1E3A8A';
            ctx.font = '17px Arial, sans-serif';
            ctx.textAlign = 'left';
            const reminders = [
                '✓  Arrive 15 minutes before your scheduled time',
                '✓  Bring a valid government-issued ID',
                '✓  Eat a healthy meal and stay well hydrated'
            ];
            let reminderY = remindersY + 65;
            reminders.forEach(reminder => {
                ctx.fillText(reminder, remindersX + 40, reminderY);
                reminderY += 30;
            });
            ctx.fillStyle = 'rgba(29, 53, 87, 0.5)';
            ctx.font = '16px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('Thank you for saving lives! 🩸', canvas.width / 2, 1370);
            canvas.toBlob((blob) => {
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `iKonek-Appointment-${appointment.id}.png`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
                this.downloadTicketBtn.querySelector('.btn-text').textContent = 'Download Ticket';
                this.downloadTicketBtn.disabled = false;
                this.showMessage('Ticket image downloaded successfully!', 'success');
            }, 'image/png');
        } catch (error) {
            console.error('Error generating ticket:', error);
            this.downloadTicketBtn.querySelector('.btn-text').textContent = 'Download Ticket';
            this.downloadTicketBtn.disabled = false;
            this.showMessage('Error generating ticket', 'error');
        }
    }
    handleShare() {
        const appointment = this.currentAppointment;
        if (!appointment) {
            this.showMessage('Unable to share appointment', 'error');
            return;
        }
        const formatDate = (dateString) => {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        };
        const shareText = `I just scheduled a blood donation appointment with iKonek!

Date: ${formatDate(appointment.date)}
Time: ${appointment.time}
Location: ${appointment.hospitalName || appointment.hospital}

Join me in saving lives! 🩸`;
        if (navigator.share) {
            navigator.share({
                title: 'iKonek Blood Donation Appointment',
                text: shareText,
            })
            .then(() => { this.showMessage('Shared successfully!', 'success'); })
            .catch((error) => {
                if (error.name !== 'AbortError') {
                    console.error('Error sharing:', error);
                    this.fallbackShare(shareText);
                }
            });
        } else {
            this.fallbackShare(shareText);
        }
    }
    fallbackShare(text) {
        navigator.clipboard.writeText(text)
            .then(() => { this.showMessage('Appointment details copied to clipboard!', 'success'); })
            .catch(() => { this.showMessage('Unable to share appointment', 'error'); });
    }
    clearFormData() {
        localStorage.removeItem('scheduleFormData');
        localStorage.removeItem('contactFormData');
        localStorage.removeItem('healthFormData');
        localStorage.removeItem('scheduleFormDraft');
    }
    showMessage(message, type = 'info') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `toast-message toast-${type}`;
        let bgColor = '#457B9D';
        let icon = 'ℹ️';
        if (type === 'success') {
            bgColor = '#16A34A';
            icon = '✓';
        }
        if (type === 'error') {
            bgColor = '#DC3545';
            icon = '✕';
        }
        messageDiv.innerHTML = `<span class=\"toast-icon\">${icon}</span><span class=\"toast-text\">${message}</span>`;
        messageDiv.style.cssText = `position: fixed; top: 20px; right: 20px; padding: 16px 24px; background: ${bgColor}; color: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); z-index: 10000; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 500; animation: slideIn 0.3s ease; display: flex; align-items: center; gap: 12px; max-width: 400px;`;
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
.toast-icon { font-size: 18px; line-height: 1; }
.toast-text { flex: 1; }
`;
document.head.appendChild(style);

document.addEventListener('DOMContentLoaded', () => {
    new Navigation();
    new ConfirmationPage();
});
    </script>
@endsection

@push('scripts')
    <script>

// Navigation Module (Compact version)
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
        this.setupDashboardActiveLink();
    }
    setupDashboardActiveLink() {
        const sidebarLinks = document.querySelectorAll('.sidebar-nav .nav-item');
        if (sidebarLinks.length === 0) return;
        const currentPage = window.location.pathname.split('/').pop();
        sidebarLinks.forEach(link => {
            link.classList.remove('active');
            const linkHref = link.getAttribute('href');
            if (linkHref && (linkHref === currentPage || 
                (currentPage.startsWith('schedule-donation') && linkHref === 'schedule-donation.html'))) {
                link.classList.add('active');
            }
        });
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

// Confirmation Page Module
class ConfirmationPage {
    constructor() {
        this.scheduleAnotherBtn = document.getElementById('scheduleAnotherBtn');
        this.downloadTicketBtn = document.getElementById('downloadTicketBtn');
        this.shareBtn = document.getElementById('shareBtn');
        this.init();
    }
    init() {
        this.addEventListeners();
        this.loadAppointmentData();
        this.clearFormData();
    }
    loadAppointmentData() {
        const appointments = JSON.parse(localStorage.getItem('appointments') || '[]');
        if (appointments.length === 0) {
            console.warn('No appointment data found');
            return;
        }
        const appointment = appointments[appointments.length - 1];
        this.displayAppointmentData(appointment);
    }
    displayAppointmentData(appointment) {
        const formatDate = (dateString) => {
            if (!dateString) return '-';
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        };
        document.getElementById('confirmEmail').textContent = appointment.email || '-';
        document.getElementById('appointmentDate').textContent = formatDate(appointment.date);
        document.getElementById('appointmentTime').textContent = appointment.time || '-';
        document.getElementById('appointmentLocation').textContent = appointment.hospitalName || appointment.hospital || '-';
        document.getElementById('appointmentAddress').textContent = appointment.address || 'Taft Avenue, Manila';
        document.getElementById('appointmentPhone').textContent = appointment.hospitalPhone || '+63 2 8554 8400';
        document.getElementById('appointmentBloodType').textContent = appointment.bloodType || '-';
        document.getElementById('appointmentEmail').textContent = appointment.email || '-';
        document.getElementById('appointmentContactPhone').textContent = appointment.phoneNumber || appointment.phone || '-';
        this.currentAppointment = appointment;
    }
    addEventListeners() {
        this.scheduleAnotherBtn?.addEventListener('click', () => { this.handleScheduleAnother(); });
        this.downloadTicketBtn?.addEventListener('click', () => { this.handleDownloadTicket(); });
        this.shareBtn?.addEventListener('click', () => { this.handleShare(); });
    }
    handleScheduleAnother() {
        this.clearFormData();
        window.location.href = 'schedule-donation.html';
    }
    handleDownloadTicket() {
        const appointment = this.currentAppointment;
        if (!appointment) {
            this.showMessage('Unable to generate ticket', 'error');
            return;
        }
        const btnText = this.downloadTicketBtn.querySelector('.btn-text');
        btnText.textContent = 'Generating...';
        this.downloadTicketBtn.disabled = true;
        setTimeout(() => { this.generateImageTicket(appointment); }, 500);
    }
    async generateImageTicket(appointment) {
        try {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.width = 1080;
            canvas.height = 1400;
            const formatDate = (dateString) => {
                if (!dateString) return '-';
                const date = new Date(dateString);
                return date.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
            };
            const bgGradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
            bgGradient.addColorStop(0, '#F8F9FA');
            bgGradient.addColorStop(1, '#FFFFFF');
            ctx.fillStyle = bgGradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = '#1D3557';
            ctx.fillRect(0, 0, canvas.width, 160);
            ctx.fillStyle = '#E63946';
            ctx.font = 'bold 64px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('i', canvas.width / 2 - 65, 80);
            ctx.fillStyle = '#FFFFFF';
            ctx.fillText('  Konek', canvas.width / 2 + 25, 80);
            ctx.font = '22px Arial, sans-serif';
            ctx.fillStyle = 'rgba(255, 255, 255, 0.9)';
            ctx.fillText('Blood Donation Platform', canvas.width / 2, 125);
            const iconY = 230;
            ctx.fillStyle = 'rgba(22, 163, 74, 0.2)';
            ctx.beginPath();
            ctx.arc(canvas.width / 2 + 4, iconY + 4, 56, 0, Math.PI * 2);
            ctx.fill();
            const iconGradient = ctx.createRadialGradient(canvas.width / 2, iconY, 0, canvas.width / 2, iconY, 56);
            iconGradient.addColorStop(0, '#16A34A');
            iconGradient.addColorStop(1, '#15803D');
            ctx.fillStyle = iconGradient;
            ctx.beginPath();
            ctx.arc(canvas.width / 2, iconY, 56, 0, Math.PI * 2);
            ctx.fill();
            ctx.strokeStyle = '#FFFFFF';
            ctx.lineWidth = 8;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';
            ctx.beginPath();
            ctx.moveTo(canvas.width / 2 - 24, iconY);
            ctx.lineTo(canvas.width / 2 - 8, iconY + 20);
            ctx.lineTo(canvas.width / 2 + 28, iconY - 20);
            ctx.stroke();
            ctx.fillStyle = '#1D3557';
            ctx.font = 'bold 42px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('Appointment Confirmed!', canvas.width / 2, 340);
            ctx.fillStyle = 'rgba(230, 57, 70, 0.1)';
            ctx.beginPath();
            ctx.roundRect(canvas.width / 2 - 140, 360, 280, 40, 20);
            ctx.fill();
            ctx.fillStyle = '#E63946';
            ctx.font = 'bold 18px Arial, sans-serif';
            ctx.fillText(`ID: ${appointment.id}`, canvas.width / 2, 386);
            const cardX = 60;
            const cardY = 440;
            const cardWidth = canvas.width - 120;
            const cardHeight = 720;
            ctx.fillStyle = 'rgba(0, 0, 0, 0.08)';
            ctx.beginPath();
            ctx.roundRect(cardX + 4, cardY + 4, cardWidth, cardHeight, 16);
            ctx.fill();
            ctx.fillStyle = '#FFFFFF';
            ctx.beginPath();
            ctx.roundRect(cardX, cardY, cardWidth, cardHeight, 16);
            ctx.fill();
            ctx.strokeStyle = 'rgba(29, 53, 87, 0.1)';
            ctx.lineWidth = 2;
            ctx.stroke();
            const cardHeaderGradient = ctx.createLinearGradient(cardX, cardY, cardX + cardWidth, cardY);
            cardHeaderGradient.addColorStop(0, 'rgba(113, 156, 99, 0.15)');
            cardHeaderGradient.addColorStop(1, 'rgba(113, 156, 99, 0.08)');
            ctx.fillStyle = cardHeaderGradient;
            ctx.fillRect(cardX, cardY, cardWidth, 60);
            ctx.fillStyle = '#1D3557';
            ctx.font = 'bold 24px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('Appointment Details', canvas.width / 2, cardY + 38);
            const drawInfoBox = (icon, label, value, subvalue, y, iconBg) => {
                const boxX = cardX + 40;
                const boxWidth = cardWidth - 80;
                const boxGradient = ctx.createLinearGradient(boxX, y, boxX + boxWidth, y);
                boxGradient.addColorStop(0, '#F8F9FA');
                boxGradient.addColorStop(1, 'rgba(248, 249, 250, 0.5)');
                ctx.fillStyle = boxGradient;
                ctx.beginPath();
                ctx.roundRect(boxX, y, boxWidth, subvalue ? 90 : 70, 12);
                ctx.fill();
                ctx.strokeStyle = 'rgba(29, 53, 87, 0.08)';
                ctx.lineWidth = 1;
                ctx.stroke();
                const iconX = boxX + 28;
                const iconY = y + (subvalue ? 45 : 35);
                ctx.fillStyle = iconBg;
                ctx.beginPath();
                ctx.arc(iconX, iconY, 24, 0, Math.PI * 2);
                ctx.fill();
                ctx.font = '28px Arial, sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText(icon, iconX, iconY + 10);
                ctx.fillStyle = 'rgba(29, 53, 87, 0.6)';
                ctx.font = '14px Arial, sans-serif';
                ctx.textAlign = 'left';
                ctx.fillText(label.toUpperCase(), boxX + 70, y + 22);
                ctx.fillStyle = '#1D3557';
                ctx.font = 'bold 20px Arial, sans-serif';
                ctx.fillText(value, boxX + 70, y + 48);
                if (subvalue) {
                    ctx.fillStyle = 'rgba(29, 53, 87, 0.7)';
                    ctx.font = '16px Arial, sans-serif';
                    ctx.fillText(subvalue, boxX + 70, y + 72);
                }
            };
            let currentY = cardY + 90;
            drawInfoBox('📅', 'Date & Time', formatDate(appointment.date), '🕐 ' + (appointment.time || '-'), currentY, 'rgba(230, 57, 70, 0.1)');
            currentY += 110;
            drawInfoBox('📍', 'Location', appointment.hospitalName || appointment.hospital || '-', appointment.address || 'Taft Avenue, Manila', currentY, 'rgba(29, 53, 87, 0.1)');
            currentY += 110;
            drawInfoBox('🩸', 'Blood Type', appointment.bloodType || '-', null, currentY, 'rgba(230, 57, 70, 0.1)');
            currentY += 90;
            drawInfoBox('📧', 'Contact Information', appointment.email || '-', '📞 ' + (appointment.phoneNumber || appointment.phone || '-'), currentY, 'rgba(29, 53, 87, 0.1)');
            const remindersY = 1190;
            const remindersX = cardX;
            const remindersWidth = cardWidth;
            const remindersGradient = ctx.createLinearGradient(remindersX, remindersY, remindersX + remindersWidth, remindersY);
            remindersGradient.addColorStop(0, '#EFF6FF');
            remindersGradient.addColorStop(1, '#DBEAFE');
            ctx.fillStyle = remindersGradient;
            ctx.beginPath();
            ctx.roundRect(remindersX, remindersY, remindersWidth, 160, 16);
            ctx.fill();
            ctx.strokeStyle = '#BFDBFE';
            ctx.lineWidth = 3;
            ctx.stroke();
            ctx.fillStyle = '#1E40AF';
            ctx.font = 'bold 22px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('⚠️  Important Reminders', canvas.width / 2, remindersY + 35);
            ctx.fillStyle = '#1E3A8A';
            ctx.font = '17px Arial, sans-serif';
            ctx.textAlign = 'left';
            const reminders = [
                '✓  Arrive 15 minutes before your scheduled time',
                '✓  Bring a valid government-issued ID',
                '✓  Eat a healthy meal and stay well hydrated'
            ];
            let reminderY = remindersY + 65;
            reminders.forEach(reminder => {
                ctx.fillText(reminder, remindersX + 40, reminderY);
                reminderY += 30;
            });
            ctx.fillStyle = 'rgba(29, 53, 87, 0.5)';
            ctx.font = '16px Arial, sans-serif';
            ctx.textAlign = 'center';
            ctx.fillText('Thank you for saving lives! 🩸', canvas.width / 2, 1370);
            canvas.toBlob((blob) => {
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `iKonek-Appointment-${appointment.id}.png`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
                this.downloadTicketBtn.querySelector('.btn-text').textContent = 'Download Ticket';
                this.downloadTicketBtn.disabled = false;
                this.showMessage('Ticket image downloaded successfully!', 'success');
            }, 'image/png');
        } catch (error) {
            console.error('Error generating ticket:', error);
            this.downloadTicketBtn.querySelector('.btn-text').textContent = 'Download Ticket';
            this.downloadTicketBtn.disabled = false;
            this.showMessage('Error generating ticket', 'error');
        }
    }
    handleShare() {
        const appointment = this.currentAppointment;
        if (!appointment) {
            this.showMessage('Unable to share appointment', 'error');
            return;
        }
        const formatDate = (dateString) => {
            const date = new Date(dateString);
            return date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        };
        const shareText = `I just scheduled a blood donation appointment with iKonek!

Date: ${formatDate(appointment.date)}
Time: ${appointment.time}
Location: ${appointment.hospitalName || appointment.hospital}

Join me in saving lives! 🩸`;
        if (navigator.share) {
            navigator.share({
                title: 'iKonek Blood Donation Appointment',
                text: shareText,
            })
            .then(() => { this.showMessage('Shared successfully!', 'success'); })
            .catch((error) => {
                if (error.name !== 'AbortError') {
                    console.error('Error sharing:', error);
                    this.fallbackShare(shareText);
                }
            });
        } else {
            this.fallbackShare(shareText);
        }
    }
    fallbackShare(text) {
        navigator.clipboard.writeText(text)
            .then(() => { this.showMessage('Appointment details copied to clipboard!', 'success'); })
            .catch(() => { this.showMessage('Unable to share appointment', 'error'); });
    }
    clearFormData() {
        localStorage.removeItem('scheduleFormData');
        localStorage.removeItem('contactFormData');
        localStorage.removeItem('healthFormData');
        localStorage.removeItem('scheduleFormDraft');
    }
    showMessage(message, type = 'info') {
        const messageDiv = document.createElement('div');
        messageDiv.className = `toast-message toast-${type}`;
        let bgColor = '#457B9D';
        let icon = 'ℹ️';
        if (type === 'success') {
            bgColor = '#16A34A';
            icon = '✓';
        }
        if (type === 'error') {
            bgColor = '#DC3545';
            icon = '✕';
        }
        messageDiv.innerHTML = `<span class=\"toast-icon\">${icon}</span><span class=\"toast-text\">${message}</span>`;
        messageDiv.style.cssText = `position: fixed; top: 20px; right: 20px; padding: 16px 24px; background: ${bgColor}; color: white; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); z-index: 10000; font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 500; animation: slideIn 0.3s ease; display: flex; align-items: center; gap: 12px; max-width: 400px;`;
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
.toast-icon { font-size: 18px; line-height: 1; }
.toast-text { flex: 1; }
`;
document.head.appendChild(style);

document.addEventListener('DOMContentLoaded', () => {
    new Navigation();
    new ConfirmationPage();
});
    
    </script>
@endpush
