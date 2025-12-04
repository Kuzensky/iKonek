@extends('admin.layouts.app')

@section('title', 'User & Donation Management')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/hospitals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/donations.css') }}">
@endpush

@section('content')
<div x-data="donationManager()">
    <header class="admin-header">
        <div>
            <h1 class="header-title">User & Donation Management</h1>
            <p class="header-subtitle">View user records and manage donation statuses</p>
        </div>
    </header>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <!-- Total Users -->
        <div class="stat-card">
            <div class="stat-icon stat-icon-blue">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2"/>
                    <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="stat-content">
                <p class="stat-label">Total Users</p>
                <p class="stat-value">{{ number_format($stats['total_users']) }}</p>
            </div>
        </div>

        <!-- Active Users -->
        <div class="stat-card">
            <div class="stat-icon stat-icon-green">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2"/>
                    <polyline points="22 4 12 14.01 9 11.01" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="stat-content">
                <p class="stat-label">Active Users</p>
                <p class="stat-value">{{ number_format($stats['active_users']) }}</p>
            </div>
        </div>

        <!-- Total Donations -->
        <div class="stat-card">
            <div class="stat-icon stat-icon-red">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="stat-content">
                <p class="stat-label">Total Donations</p>
                <p class="stat-value">{{ number_format($stats['total_donations']) }}</p>
            </div>
        </div>

        <!-- Pending Donations -->
        <div class="stat-card">
            <div class="stat-icon stat-icon-yellow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="stat-content">
                <p class="stat-label">Pending Donations</p>
                <p class="stat-value">{{ number_format($stats['pending_donations']) }}</p>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="tabs-container">
        <button @click="activeTab = 'donations'"
                :class="{'active': activeTab === 'donations'}"
                class="tab-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            Donation Records
        </button>
        <button @click="activeTab = 'users'"
                :class="{'active': activeTab === 'users'}"
                class="tab-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
            </svg>
            User Records
        </button>
    </div>

    <!-- Donation Records Tab -->
    <div x-show="activeTab === 'donations'">
        <!-- Search & Filters -->
        <div class="filters-section">
            <form method="GET" action="{{ route('admin.donations.index') }}" class="filters-form">
                <div class="search-input">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                        <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search by donor name, hospital, or email...">
                </div>

                <select name="status" class="filter-select">
                    <option value="">All Status</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="verified" {{ request('status') === 'verified' ? 'selected' : '' }}>Verified</option>
                    <option value="failed" {{ request('status') === 'failed' ? 'selected' : '' }}>Failed</option>
                    <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>

                <select name="blood_type" class="filter-select">
                    <option value="">All Types</option>
                    @foreach(['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'] as $type)
                        <option value="{{ $type }}" {{ request('blood_type') === $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-filter">Apply</button>
                @if(request()->hasAny(['search', 'status', 'blood_type']))
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-clear">Clear</a>
                @endif
            </form>
        </div>

        <!-- Donations List -->
        <div class="donations-list">
            @forelse($donations as $donation)
            <div class="donation-row">
                <!-- Left Section: Avatar + Donor Info -->
                <div class="donation-row-left">
                    <div class="donor-avatar">{{ $donation->getUserInitials() }}</div>
                    <div class="donor-info">
                        <div class="donor-name-row">
                            <h3 class="donor-name">{{ $donation->getDonorFullName() }}</h3>
                            @if($donation->user->email_verified_at)
                                <span class="user-badge user-badge-verified">Verified</span>
                            @else
                                <span class="user-badge user-badge-pending">Pending</span>
                            @endif
                            <span class="blood-type-badge">{{ $donation->blood_type }}</span>
                        </div>

                        <div class="donor-details">
                            <div class="detail-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                                    <path d="M3 9L12 2L21 9V20C21 21.1 20.1 22 19 22H5C3.9 22 3 21.1 3 20V9Z" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span>{{ $donation->hospital->name }}</span>
                            </div>
                            <div class="detail-item">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2"/>
                                    <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span>{{ $donation->user->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Section: Date + Actions -->
                <div class="donation-row-right">
                    @if($donation->appointment)
                    <div class="donation-date-single">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                            <path d="M16 2v4M8 2v4M3 10h18" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>{{ $donation->appointment->appointment_date->format('Y-m-d') }} at {{ $donation->appointment->appointment_date->format('h:i A') }}</span>
                    </div>
                    @endif
                    <button @click="openStatusModal({{ $donation->id }}, {{ json_encode($donation->toArray()) }})"
                            class="btn-update">
                        Update Status
                    </button>
                </div>

                <!-- Notes Section: Full Width -->
                @if($donation->notes)
                <div class="donation-notes-full">
                    <span class="label">Notes:</span>
                    <p class="notes-text">{{ Str::limit($donation->notes, 100) }}</p>
                </div>
                @endif
            </div>
            @empty
            <div class="no-records">
                <p>No donation records found</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($donations->hasPages())
        <div class="pagination-section">
            {{ $donations->withQueryString()->links() }}
        </div>
        @endif
    </div>

    <!-- User Records Tab -->
    <div x-show="activeTab === 'users'" x-cloak>
        <!-- Search & Filters for Users -->
        <div class="filters-section">
            <form method="GET" action="{{ route('admin.donations.index') }}" class="filters-form">
                <input type="hidden" name="tab" value="users">

                <div class="search-input">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                        <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <input type="text" name="user_search" value="{{ request('user_search') }}"
                           placeholder="Search by name or email...">
                </div>

                <select name="verification_status" class="filter-select">
                    <option value="">All Status</option>
                    <option value="verified" {{ request('verification_status') === 'verified' ? 'selected' : '' }}>Verified</option>
                    <option value="unverified" {{ request('verification_status') === 'unverified' ? 'selected' : '' }}>Unverified</option>
                </select>

                <select name="user_blood_type" class="filter-select">
                    <option value="">All Blood Types</option>
                    @foreach(['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'] as $type)
                        <option value="{{ $type }}" {{ request('user_blood_type') === $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-filter">Apply</button>
                @if(request()->hasAny(['user_search', 'verification_status', 'user_blood_type']))
                    <a href="{{ route('admin.donations.index') }}?tab=users" class="btn btn-clear">Clear</a>
                @endif
            </form>
        </div>

        <!-- Users List -->
        <div class="users-list">
            @forelse($users as $user)
            <div class="user-card">
                <!-- Left: Avatar -->
                <div class="user-card-avatar">
                    {{ strtoupper(substr($user->first_name ?? '', 0, 1) . substr($user->last_name ?? '', 0, 1)) }}
                </div>

                <!-- Middle: User Info -->
                <div class="user-card-info">
                    <!-- Name Row -->
                    <div class="user-card-name-row">
                        <h3 class="user-card-name">{{ trim("{$user->first_name} {$user->middle_name} {$user->last_name}") }}</h3>
                        <div class="user-card-badges">
                            @if($user->email_verified_at)
                                <span class="status-badge-inactive">Inactive</span>
                            @else
                                <span class="status-badge-active">Active</span>
                            @endif
                            @if($user->blood_type)
                                <span class="blood-type-badge-card">{{ $user->blood_type }}</span>
                            @endif
                            @if($user->email_verified_at)
                                <span class="verified-badge">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                        <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                    </svg>
                                    Verified
                                </span>
                            @endif
                        </div>
                    </div>

                    <!-- Contact Grid -->
                    <div class="user-card-contact-grid">
                        <div class="contact-item">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2"/>
                                <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span>{{ $user->email }}</span>
                        </div>
                        @if($user->contact_number)
                        <div class="contact-item">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span>{{ $user->contact_number }}</span>
                        </div>
                        @endif
                    </div>

                    <!-- Stats Row -->
                    <div class="user-card-stats-row">
                        <div class="stat-item">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span class="stat-value">{{ $user->donations_count }} {{ Str::plural('donation', $user->donations_count) }}</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Last donation:</span>
                            <span class="stat-value">Never</span>
                        </div>
                        <div class="stat-item">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <span class="stat-label">Registered:</span>
                            <span class="stat-value">{{ $user->created_at->format('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Right: View Details Button -->
                <div class="user-card-actions">
                    <button @click="openUserModal({{ $user->id }}, {{ json_encode($user->toArray()) }})" class="btn-view-details">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor" stroke-width="2"/>
                            <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>
            @empty
            <div class="no-records">
                <p>No users found</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination for users -->
        @if($users->hasPages())
        <div class="pagination-section">
            {{ $users->appends(['tab' => 'users'])->links('pagination::default', ['pageName' => 'users_page']) }}
        </div>
        @endif
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif

    <!-- Include Modals -->
    @include('admin.donations._status_modal')
    @include('admin.donations._user_modal')
</div>
@endsection

@push('scripts')
<script>
function donationManager() {
    return {
        activeTab: '{{ request("tab", "donations") }}',

        openStatusModal(id, donation) {
            console.log('Opening status modal for donation:', id);
            window.dispatchEvent(new CustomEvent('open-status-modal', {
                detail: { donation: donation }
            }));
        },

        openUserModal(id, user) {
            console.log('Opening user modal for user:', id);
            window.dispatchEvent(new CustomEvent('open-user-modal', {
                detail: { user: user }
            }));
        }
    }
}
</script>
@endpush
