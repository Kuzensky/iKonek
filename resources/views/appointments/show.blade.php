@extends('layouts.frontend')

@section('title', 'Appointment Ticket - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/ticket.css') }}">
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
            <div class="user-avatar">{{ strtoupper(substr(auth()->user()->first_name, 0, 1)) }}</div>
            <div class="user-details">
                <div class="user-name">{{ auth()->user()->first_name }}</div>
                <div class="user-status">Verified Donor</div>
            </div>
        </div>
        <button class="btn btn-outline logout-btn">Logout</button>
    </div>
</aside>

<main class="dashboard-main">
    <header class="ticket-header">
        <a href="{{ route('dashboard') }}" class="back-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Back to Dashboard
        </a>
        <h1 class="ticket-title">Appointment E-Ticket</h1>
        <p class="ticket-subtitle">Show this QR code at the hospital reception</p>
    </header>

    <div class="ticket-container">
        <div class="ticket-card">
            <!-- Ticket Header -->
            <div class="ticket-card-header">
                <div class="ticket-logo">
                    <img src="{{ asset('assets/img/ikonek-logo.png') }}" alt="iKonek" width="40" height="40">
                    <div class="ticket-logo-text">
                        <span class="logo-i">i</span>Konek
                    </div>
                </div>
                <span class="ticket-badge badge-{{ strtolower($appointment->status) }}">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    {{ ucfirst($appointment->status) }}
                </span>
            </div>

            <!-- QR Code Section -->
            <div class="ticket-qr-section">
                <div class="qr-code">
                    <!-- Generate QR Code using the confirmation code -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode($appointment->confirmation_code) }}"
                         alt="QR Code"
                         width="200"
                         height="200">
                </div>
                <div class="confirmation-code">
                    <p class="confirmation-label">Confirmation Code</p>
                    <p class="confirmation-value">{{ $appointment->confirmation_code }}</p>
                </div>
            </div>

            <!-- Ticket Details -->
            <div class="ticket-details">
                <div class="ticket-section">
                    <h3 class="section-title">Patient Information</h3>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="7" r="4" stroke="#457B9D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <p class="detail-label">Name</p>
                                <p class="detail-value">{{ $appointment->user->first_name }} {{ $appointment->user->last_name }}</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div>
                                <p class="detail-label">Blood Type</p>
                                <p class="detail-value">{{ $appointment->user->blood_type ?? 'Not specified' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ticket-divider"></div>

                <div class="ticket-section">
                    <h3 class="section-title">Appointment Details</h3>
                    <div class="detail-grid">
                        <div class="detail-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="#E63946" stroke-width="2"/>
                                <path d="M16 2V6M8 2V6M3 10H21" stroke="#E63946" stroke-width="2"/>
                            </svg>
                            <div>
                                <p class="detail-label">Date</p>
                                <p class="detail-value">{{ $appointment->appointment_date->format('l, F j, Y') }}</p>
                            </div>
                        </div>
                        <div class="detail-item">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#457B9D" stroke-width="2"/>
                                <path d="M12 6V12L16 14" stroke="#457B9D" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <div>
                                <p class="detail-label">Time</p>
                                <p class="detail-value">{{ $appointment->appointment_date->format('g:i A') }}@if($appointment->end_time) - {{ $appointment->end_time->format('g:i A') }}@endif</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ticket-divider"></div>

                <div class="ticket-section">
                    <h3 class="section-title">Location</h3>
                    <div class="detail-item detail-item-location">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="#16A34A" stroke-width="2"/>
                            <circle cx="12" cy="10" r="3" stroke="#16A34A" stroke-width="2"/>
                        </svg>
                        <div>
                            <p class="detail-label">Hospital</p>
                            <p class="detail-value">{{ $appointment->hospital->name }}</p>
                            <p class="detail-address">{{ $appointment->hospital->address }}</p>
                        </div>
                    </div>
                </div>

                @if($appointment->notes)
                <div class="ticket-divider"></div>

                <div class="ticket-section">
                    <h3 class="section-title">Notes</h3>
                    <p class="ticket-notes">{{ $appointment->notes }}</p>
                </div>
                @endif

                <!-- Preparation Instructions -->
                <div class="ticket-divider"></div>

                <div class="ticket-section">
                    <h3 class="section-title">Preparation Instructions</h3>
                    <div class="instructions-list">
                        <div class="instruction-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Stay well-hydrated by drinking plenty of water</span>
                        </div>
                        <div class="instruction-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Eat a healthy meal before your appointment</span>
                        </div>
                        <div class="instruction-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Avoid fatty foods 24 hours prior to donation</span>
                        </div>
                        <div class="instruction-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Bring a valid ID and this confirmation code</span>
                        </div>
                        <div class="instruction-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Get adequate rest the night before</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket Actions -->
            <div class="ticket-actions">
                <button class="btn btn-primary btn-print" onclick="window.print()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 9V2H18V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 18H4C3.46957 18 2.96086 17.7893 2.58579 17.4142C2.21071 17.0391 2 16.5304 2 16V11C2 10.4696 2.21071 9.96086 2.58579 9.58579C2.96086 9.21071 3.46957 9 4 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V16C22 16.5304 21.7893 17.0391 21.4142 17.4142C21.0391 17.7893 20.5304 18 20 18H18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18 14H6V22H18V14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Print Ticket
                </button>
                @if($appointment->status !== 'cancelled')
                <form action="{{ route('appointments.cancel', $appointment) }}" method="POST" class="cancel-form">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-cancel" onclick="return confirm('Are you sure you want to cancel this appointment?')">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Cancel Appointment
                    </button>
                </form>
                @endif
            </div>
        </div>

        <!-- Help Card -->
        <div class="help-card">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke="#457B9D" stroke-width="2"/>
                <path d="M12 16V12M12 8H12.01" stroke="#457B9D" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <div>
                <h3 class="help-title">Need Help?</h3>
                <p class="help-text">Contact the hospital directly at {{ $appointment->hospital->contact_number ?? '(02) 8711-8000' }} for any questions about your appointment.</p>
            </div>
        </div>
    </div>
</main>

<style>
@media print {
    .dashboard-sidebar,
    .back-btn,
    .ticket-actions,
    .help-card,
    .sidebar-footer {
        display: none !important;
    }

    .ticket-container {
        max-width: 100% !important;
        padding: 0 !important;
    }

    .ticket-card {
        box-shadow: none !important;
        page-break-inside: avoid;
    }
}
</style>

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
})();
</script>
@endsection
