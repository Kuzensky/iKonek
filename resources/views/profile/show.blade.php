@extends('layouts.frontend')

@section('title', 'My Profile - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/profile.css') }}">
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
            <a href="{{ route('fundraisers.index') }}" class="nav-item">
                <img src="{{ asset('assets/icons/fundraisers-blue.svg') }}" alt="" class="nav-icon" width="20" height="20">
                <span class="nav-text">Fundraisers</span>
            </a>
            <a href="{{ route('profile.show') }}" class="nav-item active">
                <img src="{{ asset('assets/icons/profile.svg') }}" alt="" class="nav-icon" width="20" height="20">
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
        <header class="profile-header">
            <div class="profile-header-wrapper">
                <div class="profile-header-content">
                    <div class="profile-header-text">
                        <h1 class="profile-title">My Profile</h1>
                        <p class="profile-subtitle">Manage your account information and preferences</p>
                    </div>
                    <div class="profile-header-actions">
                        <button class="btn btn-secondary btn-icon" aria-label="Settings">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 1v6m0 6v10M1 12h6m6 0h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </button>
                        <button class="btn btn-primary btn-edit-profile">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Edit Profile
                        </button>
                    </div>
                </div>
                
                <!-- Quick Stats Banner -->
                <div class="profile-stats-banner">
                    <div class="stat-banner-item">
                        <div class="stat-banner-icon">
                            <img src="{{ asset('assets/icons/red-blood-1.svg') }}" alt="" width="24" height="24">
                        </div>
                        <div class="stat-banner-content">
                            <span class="stat-banner-value">12</span>
                            <span class="stat-banner-label">Total Donations</span>
                        </div>
                    </div>
                    <div class="stat-banner-divider"></div>
                    <div class="stat-banner-item">
                        <div class="stat-banner-icon">
                            <img src="{{ asset('assets/icons/lives-saved.svg') }}" alt="" width="24" height="24">
                        </div>
                        <div class="stat-banner-content">
                            <span class="stat-banner-value">36</span>
                            <span class="stat-banner-label">Lives Saved</span>
                        </div>
                    </div>
                    <div class="stat-banner-divider"></div>
                    <div class="stat-banner-item">
                        <div class="stat-banner-icon">
                            <img src="{{ asset('assets/icons/achievement.svg') }}" alt="" width="24" height="24">
                        </div>
                        <div class="stat-banner-content">
                            <span class="stat-banner-value">2</span>
                            <span class="stat-banner-label">Years Active</span>
                        </div>
                    </div>
                    <div class="stat-banner-divider"></div>
                    <div class="stat-banner-item">
                        <div class="stat-banner-icon">
                            <img src="{{ asset('assets/icons/shield.svg') }}" alt="" width="24" height="24">
                        </div>
                        <div class="stat-banner-content">
                            <span class="stat-banner-value verified-badge">✓</span>
                            <span class="stat-banner-label">Verified Donor</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Profile Content -->
        <div class="profile-content">
            <!-- Profile Summary Card -->
            <aside class="profile-summary-card">
                <div class="profile-avatar-section">
                    <div class="profile-avatar-container">
                        <div class="profile-avatar-large" id="profileAvatar">PR</div>
                        <button class="avatar-upload-btn" id="avatarUploadBtn" aria-label="Change avatar">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="13" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <input type="file" id="avatarInput" accept="image/*" style="display: none;" aria-label="Upload avatar image">
                    </div>
                </div>
                
                <div class="profile-summary-info">
                    <h2 class="profile-name">Priya Reyes</h2>
                    <p class="profile-donor-status">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#28A745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Verified Donor
                    </p>
                    <div class="profile-blood-type-badge">
                        <img src="{{ asset('assets/icons/white-blood-fill.svg') }}" alt="" width="14" height="14">
                        <span>O POSITIVE</span>
                    </div>
                </div>

                <div class="profile-divider"></div>

                <div class="profile-stats">
                    <div class="profile-stat-group">
                        <div class="profile-stat-item">
                            <div class="profile-stat-icon">
                                <img src="{{ asset('assets/icons/calendar-red.svg') }}" alt="" width="18" height="18">
                            </div>
                            <div class="profile-stat-details">
                                <span class="profile-stat-label">Member since</span>
                                <p class="profile-stat-value">January 2023</p>
                            </div>
                        </div>

                        <div class="profile-stat-item">
                            <div class="profile-stat-icon">
                                <img src="{{ asset('assets/icons/red-blood-1.svg') }}" alt="" width="18" height="18">
                            </div>
                            <div class="profile-stat-details">
                                <span class="profile-stat-label">Total donations</span>
                                <p class="profile-stat-value">12 donations</p>
                            </div>
                        </div>

                        <div class="profile-stat-item">
                            <div class="profile-stat-icon">
                                <img src="{{ asset('assets/icons/lives-saved.svg') }}" alt="" width="18" height="18">
                            </div>
                            <div class="profile-stat-details">
                                <span class="profile-stat-label">Lives saved</span>
                                <p class="profile-stat-value">36 lives</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-divider"></div>

                <div class="profile-achievements">
                    <h3 class="profile-achievements-title">Achievements</h3>
                    <div class="achievement-badges">
                        <div class="achievement-badge" title="First Blood Donor">
                            <img src="{{ asset('assets/icons/achievement.svg') }}" alt="" width="24" height="24">
                        </div>
                        <div class="achievement-badge" title="10+ Donations">
                            <img src="{{ asset('assets/icons/star.svg') }}" alt="" width="24" height="24">
                        </div>
                        <div class="achievement-badge" title="Life Saver">
                            <img src="{{ asset('assets/icons/shield.svg') }}" alt="" width="24" height="24">
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Profile Details Section -->
            <div class="profile-details">
                <!-- Personal Information Card -->
                <section class="profile-card">
                    <div class="profile-card-header">
                        <div class="profile-card-title">
                            <div class="profile-card-icon">
                                <img src="{{ asset('assets/icons/profile-blue.svg') }}" alt="" width="20" height="20">
                            </div>
                            <h3>Personal Information</h3>
                        </div>
                        <p class="profile-card-description">Your basic account details</p>
                    </div>

                    <div class="profile-card-content">
                        <div class="profile-field-row">
                            <div class="profile-field">
                                <label class="profile-field-label">First Name</label>
                                <div class="profile-field-value-wrapper">
                                    <p class="profile-field-value">Priya</p>
                                </div>
                            </div>
                            <div class="profile-field">
                                <label class="profile-field-label">Middle Name</label>
                                <div class="profile-field-value-wrapper">
                                    <p class="profile-field-value">Santos</p>
                                </div>
                            </div>
                        </div>

                        <div class="profile-field">
                            <label class="profile-field-label">Last Name</label>
                            <div class="profile-field-value-wrapper">
                                <p class="profile-field-value">Reyes</p>
                            </div>
                        </div>

                        <div class="profile-field-row">
                            <div class="profile-field">
                                <div class="profile-field-label-with-icon">
                                    <img src="{{ asset('assets/icons/calendar-red.svg') }}" alt="" width="16" height="16">
                                    <label class="profile-field-label">Date of Birth</label>
                                </div>
                                <div class="profile-field-value-wrapper">
                                    <p class="profile-field-value">June 15, 1995</p>
                                    <span class="profile-field-meta">(29 years old)</span>
                                </div>
                            </div>
                            <div class="profile-field">
                                <div class="profile-field-label-with-icon">
                                    <img src="{{ asset('assets/icons/blood-drop.svg') }}" alt="" width="16" height="16">
                                    <label class="profile-field-label">Blood Type</label>
                                </div>
                                <div class="profile-field-value-wrapper">
                                    <p class="profile-field-value">O POSITIVE</p>
                                    <span class="profile-field-badge">Universal Donor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Contact Information Card -->
                <section class="profile-card">
                    <div class="profile-card-header">
                        <div class="profile-card-title">
                            <div class="profile-card-icon">
                                <img src="{{ asset('assets/icons/phone.svg') }}" alt="" width="20" height="20">
                            </div>
                            <h3>Contact Information</h3>
                        </div>
                        <p class="profile-card-description">How we can reach you</p>
                    </div>

                    <div class="profile-card-content">
                        <div class="profile-field">
                            <label class="profile-field-label">Email Address</label>
                            <div class="profile-field-value-wrapper">
                                <p class="profile-field-value">priya.reyes@email.com</p>
                                <span class="profile-field-status verified">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#28A745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Verified
                                </span>
                            </div>
                        </div>

                        <div class="profile-field">
                            <div class="profile-field-label-with-icon">
                                <img src="{{ asset('assets/icons/phone.svg') }}" alt="" width="16" height="16">
                                <label class="profile-field-label">Phone Number</label>
                            </div>
                            <div class="profile-field-value-wrapper">
                                <p class="profile-field-value">+63 912 345 6789</p>
                                <span class="profile-field-status verified">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#28A745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Verified
                                </span>
                            </div>
                        </div>

                        <div class="profile-field">
                            <div class="profile-field-label-with-icon">
                                <img src="{{ asset('assets/icons/location-blue.svg') }}" alt="" width="16" height="16">
                                <label class="profile-field-label">Address</label>
                            </div>
                            <div class="profile-field-value-wrapper">
                                <p class="profile-field-value">Quezon City, Metro Manila</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Emergency Contact Card -->
                <section class="profile-card">
                    <div class="profile-card-header">
                        <div class="profile-card-title">
                            <div class="profile-card-icon">
                                <img src="{{ asset('assets/icons/people.svg') }}" alt="" width="20" height="20">
                            </div>
                            <h3>Emergency Contact</h3>
                        </div>
                        <p class="profile-card-description">Person to contact in case of emergency</p>
                    </div>

                    <div class="profile-card-content">
                        <div class="profile-field">
                            <label class="profile-field-label">Contact Name</label>
                            <div class="profile-field-value-wrapper">
                                <p class="profile-field-value">Maria Reyes</p>
                                <span class="profile-field-meta">Mother</span>
                            </div>
                        </div>

                        <div class="profile-field">
                            <label class="profile-field-label">Contact Phone</label>
                            <div class="profile-field-value-wrapper">
                                <p class="profile-field-value">+63 917 123 4567</p>
                            </div>
                        </div>

                        <div class="profile-field">
                            <label class="profile-field-label">Relationship</label>
                            <div class="profile-field-value-wrapper">
                                <p class="profile-field-value">Mother</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Additional Actions Card -->
                <section class="profile-card profile-actions-card">
                    <div class="profile-card-header">
                        <div class="profile-card-title">
                            <div class="profile-card-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                    <path d="M12 1v6m0 6v10M1 12h6m6 0h10" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <h3>Account Actions</h3>
                        </div>
                        <p class="profile-card-description">Manage your account settings</p>
                    </div>

                    <div class="profile-card-content">
                        <div class="profile-actions-list">
                            <button class="profile-action-item">
                                <div class="profile-action-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="profile-action-content">
                                    <span class="profile-action-title">Change Password</span>
                                    <span class="profile-action-description">Update your password regularly</span>
                                </div>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>

                            <button class="profile-action-item">
                                <div class="profile-action-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="profile-action-content">
                                    <span class="profile-action-title">Notification Preferences</span>
                                    <span class="profile-action-description">Manage how you receive updates</span>
                                </div>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>

                            <button class="profile-action-item">
                                <div class="profile-action-icon">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="profile-action-content">
                                    <span class="profile-action-title">Download My Data</span>
                                    <span class="profile-action-description">Get a copy of your information</span>
                                </div>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <script>
// Profile Page Module - Bundled
(function() {
    class ProfileManager {
        constructor() {
            this.isEditing = false;
            this.init();
        }

        init() {
            this.setupEventListeners();
            this.setActiveNavigation();
            this.loadUserProfile();
            this.animateStats();
            this.setupTooltips();
            this.setupAvatarUploadHandler();
            this.loadSavedAvatar();
        }

        setupEventListeners() {
            const editProfileBtn = document.querySelector('.btn-edit-profile');
            if (editProfileBtn) {
                editProfileBtn.addEventListener('click', () => this.handleEditProfile());
            }

            const settingsBtn = document.querySelector('.btn-icon');
            if (settingsBtn) {
                settingsBtn.addEventListener('click', () => this.handleSettings());
            }

            const avatarUploadBtn = document.querySelector('.avatar-upload-btn');
            if (avatarUploadBtn) {
                avatarUploadBtn.addEventListener('click', () => this.handleAvatarUpload());
            }

            const actionItems = document.querySelectorAll('.profile-action-item');
            actionItems.forEach((item, index) => {
                item.addEventListener('click', () => this.handleActionClick(index));
            });

            const logoutBtn = document.querySelector('.logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', () => this.handleLogout());
            }

            this.setupCardHoverEffects();
        }

        setupCardHoverEffects() {
            const cards = document.querySelectorAll('.profile-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        }

        animateStats() {
            const statValues = document.querySelectorAll('.stat-banner-value');
            statValues.forEach(stat => {
                if (!stat.classList.contains('verified-badge')) {
                    const finalValue = parseInt(stat.textContent);
                    let currentValue = 0;
                    const increment = Math.ceil(finalValue / 30);
                    const timer = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= finalValue) {
                            stat.textContent = finalValue;
                            clearInterval(timer);
                        } else {
                            stat.textContent = currentValue;
                        }
                    }, 40);
                }
            });
        }

        setupTooltips() {
            const badges = document.querySelectorAll('.achievement-badge');
            badges.forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    const tooltip = this.getAttribute('title');
                    if (tooltip) {
                        this.style.position = 'relative';
                    }
                });
            });
        }

        setActiveNavigation() {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                if (item.getAttribute('href') === 'profile.html') {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        loadUserProfile() {
            const userData = this.getUserData();
            this.updateProfileUI(userData);
            this.calculateAndDisplayAge(userData.dateOfBirth);
        }

        getUserData() {
            const defaultUser = {
                firstName: 'Priya',
                middleName: 'Santos',
                lastName: 'Reyes',
                dateOfBirth: 'June 15, 1995',
                bloodType: 'O POSITIVE',
                email: 'priya.reyes@email.com',
                phone: '+63 912 345 6789',
                address: 'Quezon City, Metro Manila',
                emergencyContactName: 'Maria Reyes',
                emergencyContactPhone: '+63 917 123 4567',
                emergencyContactRelationship: 'Mother',
                memberSince: 'January 2023',
                totalDonations: 12,
                livesSaved: 36,
                yearsActive: 2,
                avatar: 'PR',
                verified: true
            };

            const storedUser = localStorage.getItem('userData');
            return storedUser ? JSON.parse(storedUser) : defaultUser;
        }

        updateProfileUI(userData) {
            console.log('Profile data loaded:', userData);
            
            const valueWrappers = document.querySelectorAll('.profile-field-value-wrapper');
            valueWrappers.forEach(wrapper => {
                wrapper.classList.add('loading');
            });

            setTimeout(() => {
                valueWrappers.forEach(wrapper => {
                    wrapper.classList.remove('loading');
                });
            }, 500);
        }

        calculateAndDisplayAge(dateOfBirth) {
            const age = this.calculateAge(dateOfBirth);
            const metaElement = document.querySelector('.profile-field-meta');
            if (metaElement && metaElement.textContent.includes('years old')) {
                metaElement.textContent = `(${age} years old)`;
            }
        }

        handleEditProfile() {
            window.location.href = 'edit-profile.html';
        }

        handleSettings() {
            this.showNotification('Settings panel coming soon!', 'info');
        }

        handleAvatarUpload() {
            const fileInput = document.getElementById('avatarInput');
            if (fileInput) {
                fileInput.click();
            }
        }

        setupAvatarUploadHandler() {
            const fileInput = document.getElementById('avatarInput');
            const avatarElement = document.getElementById('profileAvatar');
            const sidebarAvatar = document.querySelector('.user-avatar');
            
            if (!fileInput || !avatarElement) return;

            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    this.showNotification('Please select a valid image file', 'error');
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    this.showNotification('Image size must be less than 5MB', 'error');
                    return;
                }

                const reader = new FileReader();
                reader.onload = (event) => {
                    const imageUrl = event.target.result;
                    
                    avatarElement.style.backgroundImage = `url(${imageUrl})`;
                    avatarElement.style.backgroundSize = 'cover';
                    avatarElement.style.backgroundPosition = 'center';
                    avatarElement.textContent = '';
                    
                    if (sidebarAvatar) {
                        sidebarAvatar.style.backgroundImage = `url(${imageUrl})`;
                        sidebarAvatar.style.backgroundSize = 'cover';
                        sidebarAvatar.style.backgroundPosition = 'center';
                        sidebarAvatar.textContent = '';
                    }
                    
                    localStorage.setItem('userAvatar', imageUrl);
                    this.showNotification('Avatar updated successfully!', 'success');
                };
                
                reader.onerror = () => {
                    this.showNotification('Failed to read image file', 'error');
                };
                
                reader.readAsDataURL(file);
            });
        }

        loadSavedAvatar() {
            const savedAvatar = localStorage.getItem('userAvatar');
            if (savedAvatar) {
                const avatarElement = document.getElementById('profileAvatar');
                const sidebarAvatar = document.querySelector('.user-avatar');
                
                if (avatarElement) {
                    avatarElement.style.backgroundImage = `url(${savedAvatar})`;
                    avatarElement.style.backgroundSize = 'cover';
                    avatarElement.style.backgroundPosition = 'center';
                    avatarElement.textContent = '';
                }
                
                if (sidebarAvatar) {
                    sidebarAvatar.style.backgroundImage = `url(${savedAvatar})`;
                    sidebarAvatar.style.backgroundSize = 'cover';
                    sidebarAvatar.style.backgroundPosition = 'center';
                    sidebarAvatar.textContent = '';
                }
            }
        }

        handleActionClick(index) {
            const actions = [
                'Change Password',
                'Notification Preferences',
                'Download My Data'
            ];
            
            this.showNotification(`${actions[index]} functionality coming soon!`, 'info');
        }

        showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `profile-notification ${type}`;
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 16px 24px;
                background: white;
                border-left: 4px solid ${type === 'success' ? '#28A745' : type === 'error' ? '#DC3545' : '#E63946'};
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 1000;
                font-family: 'Inter', sans-serif;
                font-size: 14px;
                max-width: 300px;
                animation: slideIn 0.3s ease-out;
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }

        handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                const logoutBtn = document.querySelector('.logout-btn');
                logoutBtn.textContent = 'Logging out...';
                logoutBtn.disabled = true;

                setTimeout(() => {
                    localStorage.removeItem('isLoggedIn');
                    localStorage.removeItem('userData');
                    window.location.href = "{{ route('login') }}";
                }, 800);
            }
        }

        calculateAge(dateOfBirth) {
            const birthDate = new Date(dateOfBirth);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            return age;
        }
    }

    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    document.head.appendChild(style);

    document.addEventListener('DOMContentLoaded', () => {
        new ProfileManager();
    });
})();
    </script>
@endsection

@push('scripts')
    <script>

// Profile Page Module - Bundled
(function() {
    class ProfileManager {
        constructor() {
            this.isEditing = false;
            this.init();
        }

        init() {
            this.setupEventListeners();
            this.setActiveNavigation();
            this.loadUserProfile();
            this.animateStats();
            this.setupTooltips();
            this.setupAvatarUploadHandler();
            this.loadSavedAvatar();
        }

        setupEventListeners() {
            const editProfileBtn = document.querySelector('.btn-edit-profile');
            if (editProfileBtn) {
                editProfileBtn.addEventListener('click', () => this.handleEditProfile());
            }

            const settingsBtn = document.querySelector('.btn-icon');
            if (settingsBtn) {
                settingsBtn.addEventListener('click', () => this.handleSettings());
            }

            const avatarUploadBtn = document.querySelector('.avatar-upload-btn');
            if (avatarUploadBtn) {
                avatarUploadBtn.addEventListener('click', () => this.handleAvatarUpload());
            }

            const actionItems = document.querySelectorAll('.profile-action-item');
            actionItems.forEach((item, index) => {
                item.addEventListener('click', () => this.handleActionClick(index));
            });

            const logoutBtn = document.querySelector('.logout-btn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', () => this.handleLogout());
            }

            this.setupCardHoverEffects();
        }

        setupCardHoverEffects() {
            const cards = document.querySelectorAll('.profile-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        }

        animateStats() {
            const statValues = document.querySelectorAll('.stat-banner-value');
            statValues.forEach(stat => {
                if (!stat.classList.contains('verified-badge')) {
                    const finalValue = parseInt(stat.textContent);
                    let currentValue = 0;
                    const increment = Math.ceil(finalValue / 30);
                    const timer = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= finalValue) {
                            stat.textContent = finalValue;
                            clearInterval(timer);
                        } else {
                            stat.textContent = currentValue;
                        }
                    }, 40);
                }
            });
        }

        setupTooltips() {
            const badges = document.querySelectorAll('.achievement-badge');
            badges.forEach(badge => {
                badge.addEventListener('mouseenter', function() {
                    const tooltip = this.getAttribute('title');
                    if (tooltip) {
                        this.style.position = 'relative';
                    }
                });
            });
        }

        setActiveNavigation() {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                if (item.getAttribute('href') === 'profile.html') {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        loadUserProfile() {
            const userData = this.getUserData();
            this.updateProfileUI(userData);
            this.calculateAndDisplayAge(userData.dateOfBirth);
        }

        getUserData() {
            const defaultUser = {
                firstName: 'Priya',
                middleName: 'Santos',
                lastName: 'Reyes',
                dateOfBirth: 'June 15, 1995',
                bloodType: 'O POSITIVE',
                email: 'priya.reyes@email.com',
                phone: '+63 912 345 6789',
                address: 'Quezon City, Metro Manila',
                emergencyContactName: 'Maria Reyes',
                emergencyContactPhone: '+63 917 123 4567',
                emergencyContactRelationship: 'Mother',
                memberSince: 'January 2023',
                totalDonations: 12,
                livesSaved: 36,
                yearsActive: 2,
                avatar: 'PR',
                verified: true
            };

            const storedUser = localStorage.getItem('userData');
            return storedUser ? JSON.parse(storedUser) : defaultUser;
        }

        updateProfileUI(userData) {
            console.log('Profile data loaded:', userData);
            
            const valueWrappers = document.querySelectorAll('.profile-field-value-wrapper');
            valueWrappers.forEach(wrapper => {
                wrapper.classList.add('loading');
            });

            setTimeout(() => {
                valueWrappers.forEach(wrapper => {
                    wrapper.classList.remove('loading');
                });
            }, 500);
        }

        calculateAndDisplayAge(dateOfBirth) {
            const age = this.calculateAge(dateOfBirth);
            const metaElement = document.querySelector('.profile-field-meta');
            if (metaElement && metaElement.textContent.includes('years old')) {
                metaElement.textContent = `(${age} years old)`;
            }
        }

        handleEditProfile() {
            window.location.href = 'edit-profile.html';
        }

        handleSettings() {
            this.showNotification('Settings panel coming soon!', 'info');
        }

        handleAvatarUpload() {
            const fileInput = document.getElementById('avatarInput');
            if (fileInput) {
                fileInput.click();
            }
        }

        setupAvatarUploadHandler() {
            const fileInput = document.getElementById('avatarInput');
            const avatarElement = document.getElementById('profileAvatar');
            const sidebarAvatar = document.querySelector('.user-avatar');
            
            if (!fileInput || !avatarElement) return;

            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (!file) return;

                if (!file.type.startsWith('image/')) {
                    this.showNotification('Please select a valid image file', 'error');
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    this.showNotification('Image size must be less than 5MB', 'error');
                    return;
                }

                const reader = new FileReader();
                reader.onload = (event) => {
                    const imageUrl = event.target.result;
                    
                    avatarElement.style.backgroundImage = `url(${imageUrl})`;
                    avatarElement.style.backgroundSize = 'cover';
                    avatarElement.style.backgroundPosition = 'center';
                    avatarElement.textContent = '';
                    
                    if (sidebarAvatar) {
                        sidebarAvatar.style.backgroundImage = `url(${imageUrl})`;
                        sidebarAvatar.style.backgroundSize = 'cover';
                        sidebarAvatar.style.backgroundPosition = 'center';
                        sidebarAvatar.textContent = '';
                    }
                    
                    localStorage.setItem('userAvatar', imageUrl);
                    this.showNotification('Avatar updated successfully!', 'success');
                };
                
                reader.onerror = () => {
                    this.showNotification('Failed to read image file', 'error');
                };
                
                reader.readAsDataURL(file);
            });
        }

        loadSavedAvatar() {
            const savedAvatar = localStorage.getItem('userAvatar');
            if (savedAvatar) {
                const avatarElement = document.getElementById('profileAvatar');
                const sidebarAvatar = document.querySelector('.user-avatar');
                
                if (avatarElement) {
                    avatarElement.style.backgroundImage = `url(${savedAvatar})`;
                    avatarElement.style.backgroundSize = 'cover';
                    avatarElement.style.backgroundPosition = 'center';
                    avatarElement.textContent = '';
                }
                
                if (sidebarAvatar) {
                    sidebarAvatar.style.backgroundImage = `url(${savedAvatar})`;
                    sidebarAvatar.style.backgroundSize = 'cover';
                    sidebarAvatar.style.backgroundPosition = 'center';
                    sidebarAvatar.textContent = '';
                }
            }
        }

        handleActionClick(index) {
            const actions = [
                'Change Password',
                'Notification Preferences',
                'Download My Data'
            ];
            
            this.showNotification(`${actions[index]} functionality coming soon!`, 'info');
        }

        showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `profile-notification ${type}`;
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 16px 24px;
                background: white;
                border-left: 4px solid ${type === 'success' ? '#28A745' : type === 'error' ? '#DC3545' : '#E63946'};
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 1000;
                font-family: 'Inter', sans-serif;
                font-size: 14px;
                max-width: 300px;
                animation: slideIn 0.3s ease-out;
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }

        handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                const logoutBtn = document.querySelector('.logout-btn');
                logoutBtn.textContent = 'Logging out...';
                logoutBtn.disabled = true;

                setTimeout(() => {
                    localStorage.removeItem('isLoggedIn');
                    localStorage.removeItem('userData');
                    window.location.href = "{{ route('login') }}";
                }, 800);
            }
        }

        calculateAge(dateOfBirth) {
            const birthDate = new Date(dateOfBirth);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            return age;
        }
    }

    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    document.head.appendChild(style);

    document.addEventListener('DOMContentLoaded', () => {
        new ProfileManager();
    });
})();
    
    </script>
@endpush
