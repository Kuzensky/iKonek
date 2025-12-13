@extends('layouts.frontend')

@section('title', 'My History - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/history.css') }}">
    <style>
        /* Override max-width for history page */
        main.dashboard-main {
            max-width: 100% !important;
        }

        /* Notification Styles */
        .notification-wrapper {
            position: relative;
        }

        .notification-btn {
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #E63946;
            color: white;
            border-radius: 10px;
            padding: 2px 6px;
            font-size: 11px;
            font-weight: 600;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-dropdown {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            width: 380px;
            max-height: 500px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            overflow: hidden;
        }

        .notification-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-header h3 {
            font-size: 16px;
            font-weight: 600;
            color: #1D3557;
            margin: 0;
        }

        .mark-all-read {
            background: none;
            border: none;
            color: #457B9D;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            padding: 4px 8px;
        }

        .mark-all-read:hover {
            color: #1D3557;
        }

        .notification-list {
            max-height: 400px;
            overflow-y: auto;
        }

        .notification-item {
            padding: 16px 20px;
            border-bottom: 1px solid #f3f4f6;
            display: flex;
            gap: 12px;
            transition: background 0.2s;
        }

        .notification-item:hover {
            background: #f8f9fa;
        }

        .notification-item.unread {
            background: #f0f9ff;
        }

        .notification-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: #E63946;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-size: 14px;
            font-weight: 600;
            color: #1D3557;
            margin: 0 0 4px 0;
        }

        .notification-message {
            font-size: 13px;
            color: #64748b;
            margin: 0 0 6px 0;
            line-height: 1.4;
        }

        .notification-time {
            font-size: 12px;
            color: #94a3b8;
        }

        .mark-read-btn {
            background: none;
            border: none;
            color: #457B9D;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .mark-read-btn:hover {
            background: #e0f2fe;
        }

        .no-notifications {
            padding: 40px 20px;
            text-align: center;
        }

        .no-notifications svg {
            margin: 0 auto 16px;
            color: #cbd5e1;
        }

        .no-notifications p {
            color: #94a3b8;
            font-size: 14px;
            margin: 0;
        }
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
            <a href="{{ route('history') }}" class="nav-item active">
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
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-status">Verified Donor</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline logout-btn">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <!-- Header -->
        <header class="dashboard-header">
            <div class="header-content">
                <div class="greeting-section">
                    <h1 class="header-title">My History 📋</h1>
                    <p class="header-subtitle">Track your donations and contributions over time</p>
                </div>
                <div class="quick-stats">
                    <div class="quick-stat-item">
                        <span class="quick-stat-value">{{ $totalDonations }}</span>
                        <span class="quick-stat-label">Donations</span>
                    </div>
                    <div class="quick-stat-divider"></div>
                    <div class="quick-stat-item">
                        <span class="quick-stat-value">₱{{ $totalContributions >= 1000 ? number_format($totalContributions / 1000, 1) . 'K' : number_format($totalContributions) }}</span>
                        <span class="quick-stat-label">Contributed</span>
                    </div>
                </div>
            </div>
            <div class="header-actions">
                <div class="notification-wrapper" x-data="{ open: false }" @click.away="open = false">
                    <button class="notification-btn" aria-label="Notifications" @click="open = !open">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="notification-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                    </button>

                    <!-- Notifications Dropdown -->
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="notification-dropdown"
                         style="display: none;">
                        <div class="notification-header">
                            <h3>Notifications</h3>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                            <form action="{{ route('notifications.mark-all-read') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="mark-all-read">Mark all as read</button>
                            </form>
                            @endif
                        </div>
                        <div class="notification-list">
                            @forelse(auth()->user()->notifications()->take(10)->get() as $notification)
                            <div class="notification-item {{ $notification->read_at ? 'read' : 'unread' }}">
                                <div class="notification-icon">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                                <div class="notification-content">
                                    <p class="notification-title">{{ $notification->data['title'] ?? 'Notification' }}</p>
                                    <p class="notification-message">{{ $notification->data['message'] ?? 'You have a new notification' }}</p>
                                    <span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                                @if(!$notification->read_at)
                                <form action="{{ route('notifications.mark-read', $notification->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="mark-read-btn" title="Mark as read">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                            @empty
                            <div class="no-notifications">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 8C18 6.4087 17.3679 4.88258 16.2426 3.75736C15.1174 2.63214 13.5913 2 12 2C10.4087 2 8.88258 2.63214 7.75736 3.75736C6.63214 4.88258 6 6.4087 6 8C6 15 3 17 3 17H21C21 17 18 15 18 8Z" stroke="currentColor" stroke-width="2" opacity="0.3"/>
                                </svg>
                                <p>No notifications</p>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Summary Cards -->
        <div class="stats-summary-grid">
            <div class="summary-stat-card summary-donations">
                <div class="stat-header">
                    <div class="stat-icon-wrapper stat-icon-red">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" fill="#E63946" opacity="0.2"/>
                            <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h4 class="stat-title">Blood Donations</h4>
                </div>
                <div class="stat-content">
                    <p class="stat-value">{{ $totalDonations }}</p>
                    <p class="stat-label">Total donations</p>
                    <div class="stat-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: {{ $goldProgress }}%;"></div>
                        </div>
                        <p class="progress-text">{{ $donationsToGold > 0 ? $donationsToGold . ' more to Gold Donor status' : 'Gold Donor status achieved!' }}</p>
                    </div>
                </div>
            </div>

            <div class="summary-stat-card summary-funds">
                <div class="stat-header">
                    <div class="stat-icon-wrapper stat-icon-green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h4 class="stat-title">Fundraisers</h4>
                </div>
                <div class="stat-content">
                    <p class="stat-value">₱{{ number_format($totalContributions, 2) }}</p>
                    <p class="stat-label">Total contributions</p>
                    @if($campaignsSupported > 0)
                    <div class="stat-badge">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" fill="#16A34A" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>{{ $campaignsSupported }} {{ $campaignsSupported == 1 ? 'campaign' : 'campaigns' }} supported</span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="summary-stat-card summary-impact">
                <div class="stat-header">
                    <div class="stat-icon-wrapper stat-icon-blue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="9" cy="7" r="4" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h4 class="stat-title">Member Since</h4>
                </div>
                <div class="stat-content">
                    <p class="stat-value">{{ $memberSince }}</p>
                    <p class="stat-label">{{ $accountAge }} as donor</p>
                    <div class="stat-link">
                        <a href="#">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            View achievements
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs and Content -->
        <div class="history-content">
            <!-- Section Header -->
            <div class="section-header-with-tabs">
                <div class="section-header">
                    <h2 class="section-title">Activity Records</h2>
                    <p class="section-subtitle">View and manage all your donations and contributions</p>
                </div>
                
                <!-- Tab List -->
                <div class="history-tabs">
                    <button class="history-tab" data-tab="scheduled">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                            <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>Scheduled</span>
                        @if($scheduledDonations->count() > 0)
                            <span class="tab-badge">{{ $scheduledDonations->count() }}</span>
                        @endif
                    </button>
                    <button class="history-tab active" data-tab="history">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>History</span>
                    </button>
                    <button class="history-tab" data-tab="fundraisers">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Fundraisers</span>
                    </button>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="history-tab-content">
                <!-- Scheduled Tab -->
                <div class="tab-panel" id="scheduled-panel">
                    @if($upcomingAppointments->isEmpty() && $scheduledDonations->isEmpty())
                        <div style="text-align: center; padding: 80px 24px;">
                            <h3>No Scheduled Appointments</h3>
                            <p style="color: #666; margin-top: 8px;">You don't have any upcoming blood donation appointments.</p>
                            <a href="{{ route('donations.schedule') }}" class="btn-action-primary" style="margin-top: 24px; display: inline-flex; align-items: center; gap: 8px;">
                                Schedule Donation
                            </a>
                        </div>
                    @else
                    <div class="history-list">
                        @foreach($upcomingAppointments as $appointment)
                        <!-- Upcoming Appointment -->
                        <div class="history-record scheduled-record">
                            <div class="record-left">
                                <div class="record-icon-wrapper record-icon-red">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="4" width="18" height="18" rx="2" stroke="#E63946" stroke-width="2"/>
                                        <path d="M16 2V6M8 2V6M3 10H21" stroke="#E63946" stroke-width="2"/>
                                    </svg>
                                </div>

                                <div class="record-info">
                                    <div class="record-header">
                                        <h4 class="record-title">{{ $appointment->hospital->name }}</h4>
                                        <span class="badge badge-{{ strtolower($appointment->status) }}">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </div>

                                    <div class="record-meta">
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $appointment->appointment_date->format('F d, Y \a\t g:i A') }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $appointment->hospital->address }}, {{ $appointment->hospital->city }}</span>
                                        </div>
                                    </div>

                                    <div class="record-countdown">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="#457B9D" stroke-width="2"/>
                                            <path d="M12 6V12L16 14" stroke="#457B9D" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                        <span>{{ $appointment->appointment_date->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="record-actions">
                                <a href="{{ route('appointments.show', $appointment->id) }}" class="btn-action-primary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V9L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13 2V9H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    View E-Ticket
                                </a>
                                <button class="btn-action-secondary btn-cancel-appointment" data-appointment-id="{{ $appointment->id }}">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 9L9 15M9 9L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Cancel
                                </button>
                            </div>
                        </div>
                        @endforeach

                        @foreach($scheduledDonations as $donation)
                        <!-- Scheduled Donation -->
                        <div class="history-record scheduled-record">
                            <div class="record-left">
                                <div class="record-icon-wrapper record-icon-red">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="4" width="18" height="18" rx="2" stroke="#E63946" stroke-width="2"/>
                                        <path d="M16 2V6M8 2V6M3 10H21" stroke="#E63946" stroke-width="2"/>
                                    </svg>
                                </div>

                                <div class="record-info">
                                    <div class="record-header">
                                        <h4 class="record-title">{{ $donation->hospital->name }}</h4>
                                        <span class="badge badge-confirmed">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            Confirmed
                                        </span>
                                    </div>
                                    
                                    <div class="record-meta">
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $donation->appointment ? $donation->appointment->appointment_date->format('F d, Y \a\t g:i A') : 'N/A' }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $donation->hospital->address }}, {{ $donation->hospital->city }}</span>
                                        </div>
                                    </div>

                                    @if($donation->appointment)
                                    <div class="record-countdown">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="#457B9D" stroke-width="2"/>
                                            <path d="M12 6V12L16 14" stroke="#457B9D" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                        <span>{{ $donation->appointment->appointment_date->diffForHumans() }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="record-actions">
                                @if($donation->appointment)
                                <a href="{{ route('appointments.show', $donation->appointment->id) }}" class="btn-action-primary">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V9L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13 2V9H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    View E-Ticket
                                </a>
                                <button class="btn-action-secondary btn-cancel-appointment" data-appointment-id="{{ $donation->appointment->id }}">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15 9L9 15M9 9L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Cancel
                                </button>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- History Tab -->
                <div class="tab-panel active" id="history-panel">
                    @if($completedDonations->isEmpty() && $pastAppointments->isEmpty())
                        <div style="text-align: center; padding: 80px 24px;">
                            <h3>No Donation History</h3>
                            <p style="color: #666; margin-top: 8px;">You haven't completed any blood donations yet.</p>
                            <a href="{{ route('donations.schedule') }}" class="btn-action-primary" style="margin-top: 24px; display: inline-flex; align-items: center; gap: 8px;">
                                Schedule Your First Donation
                            </a>
                        </div>
                    @else
                    <div class="history-list">
                        @foreach($pastAppointments as $appointment)
                        <!-- Appointment Record -->
                        <div class="history-record">
                            <div class="record-left">
                                <div class="record-icon-wrapper record-icon-red">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="4" width="18" height="18" rx="2" stroke="#E63946" stroke-width="2"/>
                                        <path d="M16 2V6M8 2V6M3 10H21" stroke="#E63946" stroke-width="2"/>
                                    </svg>
                                </div>

                                <div class="record-info">
                                    <div class="record-header">
                                        <h4 class="record-title">{{ $appointment->hospital->name }}</h4>
                                        <span class="badge badge-{{ strtolower($appointment->status) }}">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </div>

                                    <div class="record-meta">
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $appointment->appointment_date->format('F d, Y \a\t g:i A') }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $appointment->hospital->address }}, {{ $appointment->hospital->city }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('appointments.show', $appointment->id) }}" class="btn-action-secondary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V9L13 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13 2V9H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                View Ticket
                            </a>
                        </div>
                        @endforeach

                        @foreach($completedDonations as $donation)
                        <!-- Donation Record -->
                        <div class="history-record">
                            <div class="record-left">
                                <div class="record-icon-wrapper record-icon-red">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" fill="#E63946" opacity="0.2"/>
                                        <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                                <div class="record-info">
                                    <div class="record-header">
                                        <h4 class="record-title">{{ $donation->hospital->name }}</h4>
                                        <span class="badge badge-verified">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            Verified
                                        </span>
                                    </div>
                                    
                                    <div class="record-meta">
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $donation->donation_date ? $donation->donation_date->format('F d, Y') : 'N/A' }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $donation->hospital->address }}, {{ $donation->hospital->city }}</span>
                                        </div>
                                    </div>

                                    <div class="record-badges">
                                        <span class="badge badge-blood-type">{{ $donation->blood_type }}</span>
                                        <span class="badge badge-volume">450ml</span>
                                        <span class="record-impact">Helped {{ $donation->lives_impacted ?? 3 }} {{ Str::plural('person', $donation->lives_impacted ?? 3) }}</span>
                                    </div>
                                </div>
                            </div>

                            <button class="btn-action-secondary btn-certificate">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Download Certificate
                            </button>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Fundraisers Tab -->
                <div class="tab-panel" id="fundraisers-panel">
                    @if($contributions->isEmpty())
                        <div style="text-align: center; padding: 80px 24px;">
                            <h3>No Fundraiser Contributions</h3>
                            <p style="color: #666; margin-top: 8px;">You haven't contributed to any fundraisers yet.</p>
                            <a href="{{ route('fundraisers.index') }}" class="btn-action-primary" style="margin-top: 24px; display: inline-flex; align-items: center; gap: 8px;">
                                View Fundraisers
                            </a>
                        </div>
                    @else
                    <div class="history-list">
                        @foreach($contributions as $contribution)
                        <!-- Fundraiser Contribution -->
                        <div class="history-record">
                            <div class="record-left">
                                <div class="record-icon-wrapper record-icon-green">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" fill="#16A34A" opacity="0.2"/>
                                        <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                                <div class="record-info">
                                    <div class="record-header">
                                        <h4 class="record-title">{{ $contribution->fundraiser->title }}</h4>
                                        <span class="badge badge-{{ $contribution->status === 'verified' ? 'verified' : 'pending' }}">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                @if($contribution->status === 'verified')
                                                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M22 4L12 14.01L9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                @else
                                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                @endif
                                            </svg>
                                            {{ ucfirst($contribution->status) }}
                                        </span>
                                    </div>

                                    <div class="record-meta">
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <span>{{ $contribution->created_at->format('F d, Y') }}</span>
                                        </div>
                                        <div class="meta-item">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                                <path d="M12 16v-4M12 8h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span>{{ $contribution->fundraiser->getCategoryDisplayName() }}</span>
                                        </div>
                                    </div>

                                    <div class="record-badges">
                                        <span class="badge badge-amount">₱{{ number_format($contribution->amount, 0) }}</span>
                                    </div>
                                </div>
                            </div>

                            <button class="btn-action-secondary btn-receipt">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Download Receipt
                            </button>
                        </div>
                        @endforeach

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <script>
// History Page - Combined Navigation, History, and App Scripts
(function() {
    // History Page Module
    function initHistoryPage() {
        const tabs = document.querySelectorAll('.history-tab');
        const panels = document.querySelectorAll('.tab-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                switchTab(tabName, tabs, panels);
            });
        });

        const certificateButtons = document.querySelectorAll('.btn-certificate');
        certificateButtons.forEach(button => {
            button.addEventListener('click', handleCertificateDownload);
        });

        const viewTicketButtons = document.querySelectorAll('.btn-view-ticket');
        viewTicketButtons.forEach(button => {
            button.addEventListener('click', handleViewTicket);
        });

        const cancelButtons = document.querySelectorAll('.btn-cancel-appointment');
        cancelButtons.forEach(button => {
            button.addEventListener('click', handleCancelAppointment);
        });

        const receiptButtons = document.querySelectorAll('.btn-receipt');
        receiptButtons.forEach(button => {
            button.addEventListener('click', handleReceiptDownload);
        });
    }

    function switchTab(tabName, tabs, panels) {
        tabs.forEach(tab => tab.classList.remove('active'));
        panels.forEach(panel => panel.classList.remove('active'));

        const selectedTab = document.querySelector(`[data-tab="${tabName}"]`);
        const selectedPanel = document.getElementById(`${tabName}-panel`);

        if (selectedTab && selectedPanel) {
            selectedTab.classList.add('active');
            selectedPanel.classList.add('active');
            loadTabData(tabName);
        }
    }

    function loadTabData(tabName) {
        console.log(`Loading data for ${tabName} tab`);
    }

    function handleCertificateDownload(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const hospital = record.querySelector('.record-title')?.textContent;
        const originalText = button.innerHTML;
        button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/></svg> Downloading...';
        button.disabled = true;

        setTimeout(() => {
            console.log(`Downloading certificate for ${hospital}`);
            button.innerHTML = originalText;
            button.disabled = false;
            alert(`Certificate for ${hospital} has been downloaded!`);
        }, 1500);
    }

    function handleViewTicket(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const hospital = record.querySelector('.record-title')?.textContent;
        alert(`Opening e-ticket for ${hospital}...\n\nThis would display your appointment confirmation with QR code.`);
    }

    function handleCancelAppointment(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const appointmentId = button.dataset.appointmentId;
        const hospital = record.querySelector('.record-title')?.textContent;
        const confirmed = confirm(`Are you sure you want to cancel your appointment at ${hospital}?`);

        if (confirmed) {
            // Disable button and show loading state
            button.disabled = true;
            button.textContent = 'Cancelling...';

            // Make POST request to cancel appointment
            fetch(`/appointments/${appointmentId}/cancel`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            })
            .then(response => {
                if (response.ok) {
                    // Success - remove the record from UI
                    record.style.opacity = '0';
                    record.style.transform = 'translateX(-20px)';

                    setTimeout(() => {
                        record.remove();
                        const remainingRecords = document.querySelectorAll('.scheduled-record');
                        if (remainingRecords.length === 0) {
                            showEmptyState();
                        }
                    }, 300);
                } else {
                    throw new Error('Failed to cancel appointment');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to cancel appointment. Please try again.');
                button.disabled = false;
                button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 9L9 15M9 9L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Cancel';
            });
        }
    }

    function showEmptyState() {
        const scheduledPanel = document.querySelector('#scheduled-panel .history-list');
        if (scheduledPanel) {
            scheduledPanel.innerHTML = '<div class="empty-state"><p>No upcoming donations scheduled</p></div>';
        }
    }

    function handleReceiptDownload(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const fundraiserTitle = record.querySelector('.record-title')?.textContent;
        const amount = record.querySelector('.badge-amount')?.textContent;
        
        const originalText = button.innerHTML;
        button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/></svg> Downloading...';
        button.disabled = true;

        setTimeout(() => {
            console.log(`Downloading receipt for ${fundraiserTitle} - ${amount}`);
            button.innerHTML = originalText;
            button.disabled = false;
            alert(`Receipt for "${fundraiserTitle}" (${amount}) has been downloaded!`);
        }, 1500);
    }

    // Notification dropdown is handled by Alpine.js

    // Set active navigation
    document.querySelectorAll('.nav-item').forEach(item => {
        if (item.getAttribute('href') === 'history.html') {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });

    // Initialize on DOM ready
    if (document.querySelector('.history-tabs')) {
        initHistoryPage();
    }

    console.log('History page initialized');
})();
    </script>
@endsection

@push('scripts')
    <script>

// History Page - Combined Navigation, History, and App Scripts
(function() {
    // History Page Module
    function initHistoryPage() {
        const tabs = document.querySelectorAll('.history-tab');
        const panels = document.querySelectorAll('.tab-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                switchTab(tabName, tabs, panels);
            });
        });

        const certificateButtons = document.querySelectorAll('.btn-certificate');
        certificateButtons.forEach(button => {
            button.addEventListener('click', handleCertificateDownload);
        });

        const viewTicketButtons = document.querySelectorAll('.btn-view-ticket');
        viewTicketButtons.forEach(button => {
            button.addEventListener('click', handleViewTicket);
        });

        const cancelButtons = document.querySelectorAll('.btn-cancel-appointment');
        cancelButtons.forEach(button => {
            button.addEventListener('click', handleCancelAppointment);
        });

        const receiptButtons = document.querySelectorAll('.btn-receipt');
        receiptButtons.forEach(button => {
            button.addEventListener('click', handleReceiptDownload);
        });
    }

    function switchTab(tabName, tabs, panels) {
        tabs.forEach(tab => tab.classList.remove('active'));
        panels.forEach(panel => panel.classList.remove('active'));

        const selectedTab = document.querySelector(`[data-tab="${tabName}"]`);
        const selectedPanel = document.getElementById(`${tabName}-panel`);

        if (selectedTab && selectedPanel) {
            selectedTab.classList.add('active');
            selectedPanel.classList.add('active');
            loadTabData(tabName);
        }
    }

    function loadTabData(tabName) {
        console.log(`Loading data for ${tabName} tab`);
    }

    function handleCertificateDownload(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const hospital = record.querySelector('.record-title')?.textContent;
        const originalText = button.innerHTML;
        button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/></svg> Downloading...';
        button.disabled = true;

        setTimeout(() => {
            console.log(`Downloading certificate for ${hospital}`);
            button.innerHTML = originalText;
            button.disabled = false;
            alert(`Certificate for ${hospital} has been downloaded!`);
        }, 1500);
    }

    function handleViewTicket(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const hospital = record.querySelector('.record-title')?.textContent;
        alert(`Opening e-ticket for ${hospital}...\n\nThis would display your appointment confirmation with QR code.`);
    }

    function handleCancelAppointment(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const appointmentId = button.dataset.appointmentId;
        const hospital = record.querySelector('.record-title')?.textContent;
        const confirmed = confirm(`Are you sure you want to cancel your appointment at ${hospital}?`);

        if (confirmed) {
            // Disable button and show loading state
            button.disabled = true;
            button.textContent = 'Cancelling...';

            // Make POST request to cancel appointment
            fetch(`/appointments/${appointmentId}/cancel`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                }
            })
            .then(response => {
                if (response.ok) {
                    // Success - remove the record from UI
                    record.style.opacity = '0';
                    record.style.transform = 'translateX(-20px)';

                    setTimeout(() => {
                        record.remove();
                        const remainingRecords = document.querySelectorAll('.scheduled-record');
                        if (remainingRecords.length === 0) {
                            showEmptyState();
                        }
                    }, 300);
                } else {
                    throw new Error('Failed to cancel appointment');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to cancel appointment. Please try again.');
                button.disabled = false;
                button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15 9L9 15M9 9L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Cancel';
            });
        }
    }

    function showEmptyState() {
        const scheduledPanel = document.querySelector('#scheduled-panel .history-list');
        if (scheduledPanel) {
            scheduledPanel.innerHTML = '<div class="empty-state"><p>No upcoming donations scheduled</p></div>';
        }
    }

    function handleReceiptDownload(event) {
        const button = event.currentTarget;
        const record = button.closest('.history-record');
        if (!record) return;

        const fundraiserTitle = record.querySelector('.record-title')?.textContent;
        const amount = record.querySelector('.badge-amount')?.textContent;
        
        const originalText = button.innerHTML;
        button.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/></svg> Downloading...';
        button.disabled = true;

        setTimeout(() => {
            console.log(`Downloading receipt for ${fundraiserTitle} - ${amount}`);
            button.innerHTML = originalText;
            button.disabled = false;
            alert(`Receipt for "${fundraiserTitle}" (${amount}) has been downloaded!`);
        }, 1500);
    }

    // Notification dropdown is handled by Alpine.js

    // Set active navigation
    document.querySelectorAll('.nav-item').forEach(item => {
        if (item.getAttribute('href') === 'history.html') {
            item.classList.add('active');
        } else {
            item.classList.remove('active');
        }
    });

    // Initialize on DOM ready
    if (document.querySelector('.history-tabs')) {
        initHistoryPage();
    }

    console.log('History page initialized');
})();
    
    </script>
@endpush
