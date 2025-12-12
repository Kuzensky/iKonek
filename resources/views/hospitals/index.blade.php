@extends('layouts.frontend')

@section('title', 'Partner Hospitals - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/hospitals.css') }}">
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
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->first_name }}</div>
                    <div class="user-status">Verified Donor</div>
                </div>
            </div>
            <button class="btn btn-outline logout-btn">Logout</button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <div class="dashboard-header">
            <div class="header-content">
                <h1 class="dashboard-title">Partner Hospitals</h1>
                <p class="dashboard-subtitle">Find a hospital near you to schedule your blood donation</p>
            </div>
        </div>

        <!-- Hospitals Grid -->
        <div class="hospitals-grid">
            @forelse($hospitals as $hospital)
                <div class="card hospital-card">
                    <div class="hospital-header">
                        <div class="hospital-badge">{{ $hospital->region ?? 'Hospital' }}</div>
                        <h3 class="hospital-name">{{ $hospital->name }}</h3>
                    </div>

                    <div class="hospital-details">
                        <div class="hospital-detail">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#E63946" stroke-width="2"/>
                                <circle cx="12" cy="10" r="3" stroke="#E63946" stroke-width="2"/>
                            </svg>
                            <span><strong>Location:</strong> {{ $hospital->address }}, {{ $hospital->city }}</span>
                        </div>

                        <div class="hospital-detail">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M22 16.92V19.92C22.0011 20.1985 21.9441 20.4742 21.8325 20.7293C21.7209 20.9845 21.5573 21.2136 21.3521 21.4019C21.1468 21.5901 20.9046 21.7335 20.6407 21.8227C20.3769 21.9119 20.0974 21.9451 19.82 21.92C16.7428 21.5856 13.787 20.5341 11.19 18.85C8.77382 17.3147 6.72533 15.2662 5.18999 12.85C3.49997 10.2412 2.44824 7.27099 2.11999 4.18C2.09501 3.90347 2.12788 3.62476 2.21649 3.36162C2.30511 3.09849 2.44757 2.85669 2.63477 2.65162C2.82196 2.44655 3.04981 2.28271 3.30379 2.17052C3.55778 2.05833 3.83234 2.00026 4.10999 2H7.10999C7.59524 1.99522 8.06572 2.16708 8.43369 2.48353C8.80166 2.79999 9.04201 3.23945 9.10999 3.72C9.23662 4.68007 9.47144 5.62273 9.80999 6.53C9.94454 6.88792 9.97366 7.27691 9.8939 7.65088C9.81415 8.02485 9.62886 8.36811 9.35999 8.64L8.08999 9.91C9.51355 12.4135 11.5864 14.4864 14.09 15.91L15.36 14.64C15.6319 14.3711 15.9751 14.1858 16.3491 14.1061C16.7231 14.0263 17.1121 14.0555 17.47 14.19C18.3773 14.5286 19.3199 14.7634 20.28 14.89C20.7658 14.9585 21.2094 15.2032 21.5265 15.5775C21.8437 15.9518 22.0122 16.4296 22 16.92Z" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span><strong>Contact:</strong> {{ $hospital->contact_number ?? 'N/A' }}</span>
                        </div>

                        <div class="hospital-detail">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="10" stroke="#E63946" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="#E63946" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <span><strong>Hours:</strong> {{ $hospital->operating_hours ?? 'Please contact for hours' }}</span>
                        </div>

                        <div class="hospital-detail">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M22 4L12 14.01L9 11.01" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span style="color: {{ $hospital->is_active ? '#22C55E' : '#6c757d' }}; font-weight: 600;">
                                {{ $hospital->is_active ? 'Available Today' : 'Contact for availability' }}
                            </span>
                        </div>
                    </div>

                    <div class="hospital-action">
                        <a href="{{ route('hospitals.show', $hospital) }}" class="hospital-button">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                <line x1="16" y1="2" x2="16" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <line x1="8" y1="2" x2="8" y2="6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <line x1="3" y1="10" x2="21" y2="10" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            View Details
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 60px 20px;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" style="margin: 0 auto 16px; color: #e9ecef;">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="9 22 9 12 15 12 15 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h3 style="color: #6c757d; font-size: 18px; margin-bottom: 8px;">No hospitals found</h3>
                    <p style="color: #adb5bd; font-size: 14px;">We're constantly expanding our network. Check back soon!</p>
                </div>
            @endforelse
        </div>
    </main>

    <script>
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
