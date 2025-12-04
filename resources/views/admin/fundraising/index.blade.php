@extends('admin.layouts.app')

@section('title', 'Fundraising Management')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/fundraising.css') }}">
@endpush

@section('content')
<div x-data="fundraisingManager()">
    <div class="page-header">
        <h1 class="page-title">Fundraising Management</h1>
    </div>

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

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon red">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Campaigns</div>
                <div class="stat-value">{{ $stats['total_campaigns'] }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Active Campaigns</div>
                <div class="stat-value">{{ $stats['active_campaigns'] }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon yellow">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Pending Review</div>
                <div class="stat-value">{{ $stats['pending_campaigns'] }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                    <polyline points="17 6 23 6 23 12"></polyline>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Raised</div>
                <div class="stat-value">₱{{ number_format($stats['total_raised'], 2) }}</div>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="tabs-container">
        <button class="tab-button" :class="{ 'active': activeTab === 'campaigns' }" @click="switchTab('campaigns')">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
            </svg>
            Campaigns
        </button>
        <button class="tab-button" :class="{ 'active': activeTab === 'donations' }" @click="switchTab('donations')">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="12" y1="1" x2="12" y2="23"></line>
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
            </svg>
            Donations
        </button>
    </div>

    <!-- Campaigns Tab -->
    <div x-show="activeTab === 'campaigns'" x-cloak>
        <!-- Filters -->
        <form method="GET" action="{{ route('admin.fundraising.index') }}" class="filters-row">
            <input type="hidden" name="tab" value="campaigns">

            <div class="filter-group">
                <label>Search</label>
                <input type="text" name="search" class="filter-input" placeholder="Search campaigns..." value="{{ request('search') }}">
            </div>

            <div class="filter-group">
                <label>Status</label>
                <select name="status" class="filter-select">
                    <option value="">All Statuses</option>
                    @foreach($statuses as $value => $label)
                        <option value="{{ $value }}" {{ request('status') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div class="filter-group">
                <label>Category</label>
                <select name="category" class="filter-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $value => $label)
                        <option value="{{ $value }}" {{ request('category') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-filter">Apply</button>
            <a href="{{ route('admin.fundraising.index', ['tab' => 'campaigns']) }}" class="btn-clear">Clear</a>
        </form>

        <!-- Campaign List -->
        <div class="campaigns-list">
            @forelse($campaigns as $campaign)
            <div class="campaign-card">
                <div class="campaign-header">
                    <div style="flex: 1;">
                        <div class="campaign-title-row">
                            <h3 class="campaign-title">{{ $campaign->title }}</h3>
                            <span class="status-badge {{ $campaign->getStatusBadgeClass() }}">
                                {{ $campaign->getStatusDisplayName() }}
                            </span>
                            <span class="category-badge {{ $campaign->getCategoryBadgeClass() }}">
                                {{ $campaign->getCategoryDisplayName() }}
                            </span>
                            @if($campaign->is_featured)
                            <span class="badge-featured">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                Featured
                            </span>
                            @endif
                        </div>

                        <div class="campaign-meta">
                            <div class="meta-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>by {{ $campaign->creator->first_name }} {{ $campaign->creator->last_name }}</span>
                            </div>
                            <div class="meta-item">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span>{{ $campaign->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="campaign-actions">
                        <button type="button" class="btn-action btn-view" @click="openDetailsModal({{ $campaign->id }})">
                            View Details
                        </button>
                        <button type="button" class="btn-action btn-status" @click="openStatusModal({{ $campaign->id }})">
                            Update Status
                        </button>
                        <form method="POST" action="{{ route('admin.fundraising.toggleFeatured', $campaign) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-action {{ $campaign->is_featured ? 'btn-unfeatured' : 'btn-featured' }}">
                                {{ $campaign->is_featured ? 'Unfeature' : 'Feature' }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Progress Bar -->
                <div class="progress-section">
                    <div class="progress-info">
                        <span class="progress-amount">₱{{ number_format($campaign->current_amount, 2) }}</span>
                        <span class="progress-goal">of ₱{{ number_format($campaign->goal_amount, 2) }}</span>
                    </div>
                    <div class="progress-bar-container">
                        <div class="progress-bar-fill" style="width: {{ $campaign->progress_percentage }}%"></div>
                    </div>
                </div>
            </div>
            @empty
            <div class="no-records">
                <p>No campaigns found</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($campaigns->hasPages())
        <div class="pagination-wrapper">
            {{ $campaigns->appends(['tab' => 'campaigns'])->links('vendor.pagination.custom') }}
        </div>
        @endif
    </div>

    <!-- Donations Tab -->
    <div x-show="activeTab === 'donations'" x-cloak>
        <!-- Filters -->
        <form method="GET" action="{{ route('admin.fundraising.index') }}" class="filters-row">
            <input type="hidden" name="tab" value="donations">

            <div class="filter-group">
                <label>Search</label>
                <input type="text" name="donation_search" class="filter-input" placeholder="Search by donor name..." value="{{ request('donation_search') }}">
            </div>

            <div class="filter-group">
                <label>Status</label>
                <select name="donation_status" class="filter-select">
                    <option value="">All Statuses</option>
                    @foreach($donationStatuses as $value => $label)
                        <option value="{{ $value }}" {{ request('donation_status') === $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-filter">Apply</button>
            <a href="{{ route('admin.fundraising.index', ['tab' => 'donations']) }}" class="btn-clear">Clear</a>
        </form>

        <!-- Contribution List -->
        <div class="donations-grid">
            @forelse($donations as $contribution)
            <div class="donation-card">
                <div class="donation-card-header">
                    <div class="donation-avatar">
                        {{ strtoupper(substr($contribution->user->first_name, 0, 1) . substr($contribution->user->last_name, 0, 1)) }}
                    </div>
                    <div class="donation-header-info">
                        <div class="donation-donor-row">
                            <span class="donation-donor-name">{{ $contribution->user->first_name }} {{ $contribution->user->last_name }}</span>
                        </div>
                        <div class="donation-amount-badge">₱{{ number_format($contribution->amount, 2) }}</div>
                    </div>
                </div>

                <div class="donation-card-body">
                    <div class="donation-campaign-title">
                        Donated to: <strong>{{ $contribution->fundraiser->title }}</strong>
                    </div>
                    <div class="donation-meta">
                        <span class="donation-date">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                            {{ $contribution->created_at->format('M d, Y') }}
                        </span>
                    </div>

                    @if($contribution->notes)
                    <div class="donation-notes">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span>"{{ $contribution->notes }}"</span>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="no-records">
                <p>No contributions found</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($donations->hasPages())
        <div class="pagination-wrapper">
            {{ $donations->appends(['tab' => 'donations'])->links('vendor.pagination.custom') }}
        </div>
        @endif
    </div>

    <!-- Include Modals -->
    @include('admin.fundraising._details_modal')
    @include('admin.fundraising._status_modal')
    @include('admin.fundraising._reject_modal')
</div>
@endsection

@push('scripts')
<script>
function fundraisingManager() {
    return {
        activeTab: '{{ $activeTab }}',
        selectedCampaignId: null,
        selectedContributionId: null,

        switchTab(tab) {
            this.activeTab = tab;
            // Update URL without reload
            const url = new URL(window.location);
            url.searchParams.set('tab', tab);
            window.history.pushState({}, '', url);
        },

        openDetailsModal(campaignId) {
            this.selectedCampaignId = campaignId;
            this.$dispatch('open-details-modal', { campaignId });
        },

        openStatusModal(campaignId) {
            this.selectedCampaignId = campaignId;
            this.$dispatch('open-status-modal', { campaignId });
        },

        openRejectModal(contributionId) {
            this.selectedContributionId = contributionId;
            this.$dispatch('open-reject-modal', { contributionId });
        }
    }
}
</script>
@endpush
