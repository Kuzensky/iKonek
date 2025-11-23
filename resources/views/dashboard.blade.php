@extends('layouts.frontend')

@section('title', 'Dashboard - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
@endpush

@section('content')
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
            <a href="{{ route('dashboard') }}" class="nav-item active">
                <img src="{{ asset('assets/icons/dashboard-white.svg') }}" alt="" class="nav-icon" width="20" height="20">
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

    <main class="dashboard-main">
        <header class="dashboard-header">
            <div class="header-content">
                <div class="greeting-section">
                    <h1 class="header-title">Welcome back, Priya! 👋</h1>
                    <p class="header-subtitle">You're making a difference in people's lives</p>
                </div>
                <div class="quick-stats">
                    <div class="quick-stat-item">
                        <span class="quick-stat-value">12</span>
                        <span class="quick-stat-label">Donations</span>
                    </div>
                    <div class="quick-stat-divider"></div>
                    <div class="quick-stat-item">
                        <span class="quick-stat-value">36</span>
                        <span class="quick-stat-label">Lives Saved</span>
                    </div>
                </div>
            </div>
            <div class="header-actions">
                <div class="notification-wrapper">
                    <button class="notification-btn" aria-label="Notifications">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    <span class="notification-badge">2</span>
                </button>
                    
                    <div class="notification-panel" id="notificationPanel">
                        <div class="notification-header">
                            <h3 class="notification-title">Notifications</h3>
                            <button class="mark-all-read-btn" id="markAllReadBtn">Mark all as read</button>
                        </div>
                        
                        <div class="notification-list" id="notificationList">
                            <div class="notification-item unread" data-id="1">
                                <div class="notification-indicator"></div>
                                <div class="notification-icon notification-icon-reminder">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="notification-content">
                                    <h4 class="notification-item-title">Upcoming Donation Reminder</h4>
                                    <p class="notification-item-text">Your blood donation appointment is scheduled for April 18 at 10:00 AM. Don't forget to stay hydrated!</p>
                                    <span class="notification-time">2 hours ago</span>
                                </div>
                                <button class="notification-close" aria-label="Close notification">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="notification-item unread" data-id="2">
                                <div class="notification-indicator"></div>
                                <div class="notification-icon notification-icon-success">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="notification-content">
                                    <h4 class="notification-item-title">Thank You for Your Donation!</h4>
                                    <p class="notification-item-text">Your recent blood donation helped save 3 lives. You're a hero!</p>
                                    <span class="notification-time">1 day ago</span>
                                </div>
                                <button class="notification-close" aria-label="Close notification">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="notification-item" data-id="3">
                                <div class="notification-indicator"></div>
                                <div class="notification-icon notification-icon-info">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="notification-content">
                                    <h4 class="notification-item-title">New Fundraiser Campaign</h4>
                                    <p class="notification-item-text">A new fundraiser "Hope for Children" is now live. Consider contributing.</p>
                                    <span class="notification-time">3 days ago</span>
                                </div>
                                <button class="notification-close" aria-label="Close notification">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="notification-footer">
                            <a href="#" class="view-all-notifications">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="action-buttons">
            <button class="btn btn-primary btn-action">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 11H5M12 18V4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Schedule New Donation</span>
            </button>
            <button class="btn btn-tertiary btn-action">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Start a Fundraiser</span>
            </button>
            <button class="btn btn-secondary btn-action">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>View My History</span>
            </button>
        </div>

        <!-- Next Appointment Card -->
        <div class="appointment-card">
            <div class="card-header-row">
                <div class="card-title-group">
                    <div class="appointment-header-with-countdown">
                        <div class="appointment-title-row">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="card-icon">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 2V6M8 2V6M3 10H21" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <h3 class="card-title">Your Next Appointment</h3>
                        </div>
                        <div class="countdown-timer">
                            <span class="countdown-item">
                                <span class="countdown-value">5</span>
                                <span class="countdown-label">days</span>
                            </span>
                            <span class="countdown-separator">:</span>
                            <span class="countdown-item">
                                <span class="countdown-value">12</span>
                                <span class="countdown-label">hours</span>
                            </span>
                            <span class="countdown-separator">:</span>
                            <span class="countdown-item">
                                <span class="countdown-value">34</span>
                                <span class="countdown-label">mins</span>
                            </span>
                        </div>
                    </div>
                    <p class="card-description">Your commitment can save up to 3 lives</p>
                </div>
                <span class="badge badge-confirmed">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Confirmed
                </span>
            </div>

            <div class="appointment-details">
                <div class="appointment-item">
                    <div class="appointment-icon-wrapper appointment-icon-red">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="4" width="18" height="18" rx="2" stroke="#E63946" stroke-width="2"/>
                            <path d="M16 2V6M8 2V6M3 10H21" stroke="#E63946" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="appointment-info">
                        <p class="appointment-label">Date & Time</p>
                        <p class="appointment-value">Friday, April 18, 2025</p>
                        <p class="appointment-time">10:00 AM - 11:00 AM</p>
                    </div>
                </div>

                <div class="appointment-item">
                    <div class="appointment-icon-wrapper appointment-icon-blue">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#1D3557" stroke-width="2"/>
                            <circle cx="12" cy="10" r="3" stroke="#1D3557" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="appointment-info">
                        <p class="appointment-label">Location</p>
                        <p class="appointment-value">Philippine General Hospital</p>
                        <p class="appointment-sublabel">Taft Avenue, Ermita, Manila</p>
                        <a href="#" class="appointment-link">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 13V19C18 19.5304 17.7893 20.0391 17.4142 20.4142C17.0391 20.7893 16.5304 21 16 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V8C3 7.46957 3.21071 6.96086 3.58579 6.58579C3.96086 6.21071 4.46957 6 5 6H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15 3H21V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10 14L21 3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Get Directions
                        </a>
                    </div>
                </div>

                <div class="appointment-actions">
                    <button class="btn-appointment-action btn-view-ticket">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V9L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13 2V9H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        View E-Ticket
                    </button>
                    <button class="btn-appointment-action btn-cancel">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M15 9L9 15M9 9L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Cancel
                    </button>
                </div>
            </div>

            <div class="appointment-reminder">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" stroke="#457B9D" stroke-width="2"/>
                    <path d="M12 6V12L16 14" stroke="#457B9D" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <div class="reminder-content">
                    <p class="reminder-title">Preparation Reminder</p>
                    <p class="reminder-text">Stay hydrated and have a good meal before your donation. Avoid fatty foods 24 hours prior.</p>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-section">
            <div class="section-header">
                <h2 class="section-title">Your Impact</h2>
                <p class="section-subtitle">See the difference you're making</p>
            </div>
            <div class="stats-grid">
                <div class="stat-card stat-card-donations">
                    <div class="stat-header">
                        <div class="stat-icon-wrapper stat-icon-red">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" fill="#E63946" opacity="0.2"/>
                                <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4 class="stat-title">Total Donations</h4>
                    </div>
                    <div class="stat-content">
                        <p class="stat-value">12</p>
                        <p class="stat-label">Since January 2023</p>
                        <div class="stat-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 60%;"></div>
                            </div>
                            <p class="progress-text">8 more to reach Gold Donor status</p>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-card-lives">
                    <div class="stat-header">
                        <div class="stat-icon-wrapper stat-icon-blue">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="9" cy="7" r="4" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4 class="stat-title">Lives Impacted</h4>
                    </div>
                    <div class="stat-content">
                        <p class="stat-value">36</p>
                        <p class="stat-label">Estimated people helped</p>
                        <div class="stat-badge">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 2L3 14H12L11 22L21 10H12L13 2Z" fill="#FFC107" stroke="#FFA000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>+3 this month</span>
                        </div>
                    </div>
                </div>

                <div class="stat-card stat-card-funds">
                    <div class="stat-header">
                        <div class="stat-icon-wrapper stat-icon-green">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h4 class="stat-title">Total Contributions</h4>
                    </div>
                    <div class="stat-content">
                        <p class="stat-value">₱3,500</p>
                        <p class="stat-label">To fundraising campaigns</p>
                        <div class="stat-link">
                            <a href="#">
                                View fundraisers
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Card -->
        <div class="activity-card">
            <div class="card-header">
                <div>
                    <h3 class="card-title">Recent Activity</h3>
                    <p class="card-description">Your latest donations and contributions</p>
                </div>
                <div class="activity-filters">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Donations</button>
                    <button class="filter-btn">Fundraisers</button>
                </div>
            </div>

            <div class="activity-list">
                <div class="activity-item">
                    <div class="activity-icon-wrapper activity-icon-red">
                        <img src="{{ asset('assets/icons/red-blood-1.svg') }}" alt="Blood Donation" width="20" height="20">
                    </div>
                    <div class="activity-content">
                        <h4 class="activity-title">Blood Donation</h4>
                        <p class="activity-location">Philippine General Hospital, Manila</p>
                        <p class="activity-date">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            March 15, 2025 at 10:30 AM
                        </p>
                    </div>
                    <div class="activity-status">
                        <span class="badge badge-verified">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Verified
                        </span>
                        <p class="activity-impact">Helped 3 people</p>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon-wrapper activity-icon-green">
                        <img src="{{ asset('assets/icons/fundraisers-green.svg') }}" alt="Fundraiser" width="20" height="20">
                    </div>
                    <div class="activity-content">
                        <h4 class="activity-title">Fundraiser Contribution</h4>
                        <p class="activity-location">Hope for Typhoon Victims Campaign</p>
                        <p class="activity-date">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            March 10, 2025
                        </p>
                    </div>
                    <div class="activity-status">
                        <span class="badge badge-verified">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Verified
                        </span>
                        <p class="activity-amount">₱500</p>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon-wrapper activity-icon-red">
                        <img src="{{ asset('assets/icons/red-blood-1.svg') }}" alt="Blood Donation" width="20" height="20">
                    </div>
                    <div class="activity-content">
                        <h4 class="activity-title">Blood Donation</h4>
                        <p class="activity-location">St. Luke's Medical Center, BGC</p>
                        <p class="activity-date">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            January 20, 2025 at 2:15 PM
                        </p>
                    </div>
                    <div class="activity-status">
                        <span class="badge badge-verified">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Verified
                        </span>
                        <p class="activity-impact">Helped 3 people</p>
                    </div>
                </div>

                <div class="activity-item">
                    <div class="activity-icon-wrapper activity-icon-green">
                        <img src="{{ asset('assets/icons/fundraisers-green.svg') }}" alt="Fundraiser" width="20" height="20">
                    </div>
                    <div class="activity-content">
                        <h4 class="activity-title">Fundraiser Contribution</h4>
                        <p class="activity-location">Children's Cancer Fund</p>
                        <p class="activity-date">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            December 28, 2024
                        </p>
                    </div>
                    <div class="activity-status">
                        <span class="badge badge-pending">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            Processing
                        </span>
                        <p class="activity-amount">₱1,000</p>
                    </div>
                </div>
            </div>

            <div class="activity-footer">
                <button class="view-all-btn">
                    <span>View All Activity</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
    </main>

    <script>

(function() {
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

    // Action buttons functionality
    document.querySelectorAll('.btn-action').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim();
            if (text.includes('Schedule')) {
                window.location.href = 'schedule-donation.html';
            } else if (text.includes('Fundraiser')) {
                window.location.href = 'fundraisers.html';
            } else if (text.includes('History')) {
                window.location.href = 'history.html';
            }
        });
    });

    // Activity filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.textContent.trim();
            console.log('Filtering by:', filter);
        });
    });

    // View all activity button
    const viewAllBtn = document.querySelector('.view-all-btn');
    if (viewAllBtn) {
        viewAllBtn.addEventListener('click', function() {
            window.location.href = 'history.html';
        });
    }

    // Appointment action buttons
    const viewTicketBtn = document.querySelector('.btn-view-ticket');
    if (viewTicketBtn) {
        viewTicketBtn.addEventListener('click', function() {
            alert('E-Ticket will be displayed here.\n\nThis would show your appointment confirmation with QR code.');
        });
    }

    const cancelBtn = document.querySelector('.btn-cancel');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel this appointment?')) {
                alert('Appointment cancelled successfully.');
                location.reload();
            }
        });
    }

    // Notification functionality
    const notificationBtn = document.querySelector('.notification-btn');
    const notificationPanel = document.getElementById('notificationPanel');
    const notificationBadge = document.querySelector('.notification-badge');
    const markAllReadBtn = document.getElementById('markAllReadBtn');
    const notificationList = document.getElementById('notificationList');
    
    // Toggle notification panel
    if (notificationBtn && notificationPanel) {
        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationPanel.classList.toggle('show');
        });
        
        // Close panel when clicking outside
        document.addEventListener('click', function(e) {
            if (!notificationPanel.contains(e.target) && !notificationBtn.contains(e.target)) {
                notificationPanel.classList.remove('show');
            }
        });
    }
    
    // Update notification badge count
    function updateNotificationCount() {
        const unreadCount = document.querySelectorAll('.notification-item.unread').length;
        if (notificationBadge) {
            if (unreadCount > 0) {
                notificationBadge.textContent = unreadCount;
                notificationBadge.style.display = 'flex';
            } else {
                notificationBadge.style.display = 'none';
            }
        }
    }
    
    // Mark all as read
    if (markAllReadBtn) {
        markAllReadBtn.addEventListener('click', function() {
            document.querySelectorAll('.notification-item.unread').forEach(item => {
                item.classList.remove('unread');
            });
            updateNotificationCount();
        });
    }
    
    // Mark individual notification as read when clicked
    if (notificationList) {
        notificationList.addEventListener('click', function(e) {
            const notificationItem = e.target.closest('.notification-item');
            if (notificationItem && !e.target.closest('.notification-close')) {
                notificationItem.classList.remove('unread');
                updateNotificationCount();
            }
        });
    }
    
    // Close individual notifications
    document.querySelectorAll('.notification-close').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const notificationItem = this.closest('.notification-item');
            if (notificationItem) {
                notificationItem.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    notificationItem.remove();
                    updateNotificationCount();
                }, 280);
            }
        });
    });
    
    // Initialize notification count
    updateNotificationCount();

    // Countdown timer update
    function updateCountdown() {
        const appointmentDate = new Date('2025-04-18T10:00:00');
        const now = new Date();
        const diff = appointmentDate - now;

        if (diff > 0) {
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

            const countdownValues = document.querySelectorAll('.countdown-value');
            if (countdownValues.length >= 3) {
                countdownValues[0].textContent = days;
                countdownValues[1].textContent = hours;
                countdownValues[2].textContent = minutes;
            }
        }
    }

    // Update countdown every minute
    updateCountdown();
    setInterval(updateCountdown, 60000);

    // Animate stat cards on scroll
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.stat-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease-out';
        observer.observe(card);
    });

    // Set active navigation
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === 'dashboard.html') {
            item.classList.add('active');
        }
    });

    console.log('Dashboard initialized');
})();
    </script>
@endsection

@push('scripts')
    <script>


(function() {
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

    // Action buttons functionality
    document.querySelectorAll('.btn-action').forEach(btn => {
        btn.addEventListener('click', function() {
            const text = this.textContent.trim();
            if (text.includes('Schedule')) {
                window.location.href = 'schedule-donation.html';
            } else if (text.includes('Fundraiser')) {
                window.location.href = 'fundraisers.html';
            } else if (text.includes('History')) {
                window.location.href = 'history.html';
            }
        });
    });

    // Activity filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const filter = this.textContent.trim();
            console.log('Filtering by:', filter);
        });
    });

    // View all activity button
    const viewAllBtn = document.querySelector('.view-all-btn');
    if (viewAllBtn) {
        viewAllBtn.addEventListener('click', function() {
            window.location.href = 'history.html';
        });
    }

    // Appointment action buttons
    const viewTicketBtn = document.querySelector('.btn-view-ticket');
    if (viewTicketBtn) {
        viewTicketBtn.addEventListener('click', function() {
            alert('E-Ticket will be displayed here.\n\nThis would show your appointment confirmation with QR code.');
        });
    }

    const cancelBtn = document.querySelector('.btn-cancel');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            if (confirm('Are you sure you want to cancel this appointment?')) {
                alert('Appointment cancelled successfully.');
                location.reload();
            }
        });
    }

    // Notification functionality
    const notificationBtn = document.querySelector('.notification-btn');
    const notificationPanel = document.getElementById('notificationPanel');
    const notificationBadge = document.querySelector('.notification-badge');
    const markAllReadBtn = document.getElementById('markAllReadBtn');
    const notificationList = document.getElementById('notificationList');
    
    // Toggle notification panel
    if (notificationBtn && notificationPanel) {
        notificationBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationPanel.classList.toggle('show');
        });
        
        // Close panel when clicking outside
        document.addEventListener('click', function(e) {
            if (!notificationPanel.contains(e.target) && !notificationBtn.contains(e.target)) {
                notificationPanel.classList.remove('show');
            }
        });
    }
    
    // Update notification badge count
    function updateNotificationCount() {
        const unreadCount = document.querySelectorAll('.notification-item.unread').length;
        if (notificationBadge) {
            if (unreadCount > 0) {
                notificationBadge.textContent = unreadCount;
                notificationBadge.style.display = 'flex';
            } else {
                notificationBadge.style.display = 'none';
            }
        }
    }
    
    // Mark all as read
    if (markAllReadBtn) {
        markAllReadBtn.addEventListener('click', function() {
            document.querySelectorAll('.notification-item.unread').forEach(item => {
                item.classList.remove('unread');
            });
            updateNotificationCount();
        });
    }
    
    // Mark individual notification as read when clicked
    if (notificationList) {
        notificationList.addEventListener('click', function(e) {
            const notificationItem = e.target.closest('.notification-item');
            if (notificationItem && !e.target.closest('.notification-close')) {
                notificationItem.classList.remove('unread');
                updateNotificationCount();
            }
        });
    }
    
    // Close individual notifications
    document.querySelectorAll('.notification-close').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const notificationItem = this.closest('.notification-item');
            if (notificationItem) {
                notificationItem.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    notificationItem.remove();
                    updateNotificationCount();
                }, 280);
            }
        });
    });
    
    // Initialize notification count
    updateNotificationCount();

    // Countdown timer update
    function updateCountdown() {
        const appointmentDate = new Date('2025-04-18T10:00:00');
        const now = new Date();
        const diff = appointmentDate - now;

        if (diff > 0) {
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

            const countdownValues = document.querySelectorAll('.countdown-value');
            if (countdownValues.length >= 3) {
                countdownValues[0].textContent = days;
                countdownValues[1].textContent = hours;
                countdownValues[2].textContent = minutes;
            }
        }
    }

    // Update countdown every minute
    updateCountdown();
    setInterval(updateCountdown, 60000);

    // Animate stat cards on scroll
    const observerOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    document.querySelectorAll('.stat-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.6s ease-out';
        observer.observe(card);
    });

    // Set active navigation
    document.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === 'dashboard.html') {
            item.classList.add('active');
        }
    });

    console.log('Dashboard initialized');
})();
    
    </script>
@endpush
