@extends('admin.layouts.app')

@section('title', 'Hospital Management')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/hospitals.css') }}">
@endpush

@section('content')
<header class="admin-header">
    <div>
        <h1 class="header-title">Hospital Management</h1>
        <p class="header-subtitle">Manage partner hospitals and blood donation centers</p>
    </div>
    <div class="header-actions">
        <a href="{{ route('admin.hospitals.create') }}" class="btn btn-primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Add Hospital
        </a>
    </div>
</header>

<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon stat-icon-blue">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M3 9L12 2L21 9V20C21 21.1 20.1 22 19 22H5C3.9 22 3 21.1 3 20V9Z" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Total</p>
            <p class="stat-value">{{ number_format($stats['total']) }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-red">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Blood Banks</p>
            <p class="stat-value">{{ number_format($stats['blood_banks']) }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-yellow">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Pend</p>
            <p class="stat-value">{{ number_format($stats['pending']) }}</p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-green">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect x="3" y="3" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                <path d="M9 12h6M12 9v6" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Total</p>
            <p class="stat-value">{{ number_format($stats['total_capacity'] ?? 0) }}</p>
        </div>
    </div>
</div>

<!-- Search & Filters -->
<div class="filters-section">
    <form method="GET" action="{{ route('admin.hospitals.index') }}" class="filters-form">
        <div class="search-input">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search hospitals by name, city, or address">
        </div>

        <select name="status" class="filter-select">
            <option value="">All Status</option>
            <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
            <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        <select name="province" class="filter-select">
            <option value="">All Regions</option>
            @foreach($provinces as $province)
                <option value="{{ $province }}" {{ request('province') === $province ? 'selected' : '' }}>
                    {{ $province }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-filter">Apply</button>
        @if(request()->hasAny(['search', 'status', 'province']))
            <a href="{{ route('admin.hospitals.index') }}" class="btn btn-clear">Clear</a>
        @endif
    </form>
</div>

<!-- Hospital Cards Grid -->
<div class="hospitals-grid">
    @forelse($hospitals as $hospital)
    <div class="hospital-card">
        <div class="hospital-card-header">
            <div class="hospital-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M3 9L12 2L21 9V20C21 21.1 20.1 22 19 22H5C3.9 22 3 21.1 3 20V9Z" stroke="currentColor" stroke-width="2"/>
                </svg>
            </div>
            <div class="hospital-title">
                <h3 class="hospital-name">{{ $hospital->name }}</h3>
                <span class="status-badge {{ $hospital->getStatusBadgeClass() }}">
                    {{ ucfirst($hospital->status) }}
                </span>
            </div>
        </div>

        <div class="hospital-card-body">
            <div class="hospital-info-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" stroke="currentColor" stroke-width="2"/>
                    <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>
                </svg>
                <p>{{ $hospital->address }}, {{ $hospital->city }}, {{ $hospital->province }}</p>
            </div>

            @if($hospital->website)
            <div class="hospital-info-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" stroke="currentColor" stroke-width="2"/>
                </svg>
                <a href="{{ $hospital->website }}" target="_blank" class="hospital-link">
                    {{ Str::limit($hospital->website, 30) }}
                </a>
            </div>
            @endif

            @if($hospital->contact_number)
            <div class="hospital-info-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="currentColor" stroke-width="2"/>
                </svg>
                <p>{{ $hospital->contact_number }}</p>
            </div>
            @endif

            @if($hospital->is_24_7)
            <div class="hospital-availability">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/>
                </svg>
                <span>24/7</span>
            </div>
            @endif

            @if($hospital->blood_types_available && count($hospital->blood_types_available) > 0)
            <div class="blood-types-section">
                <p class="blood-types-label">Blood Type:</p>
                <div class="blood-types-tags">
                    @foreach($hospital->blood_types_available as $type)
                    <span class="blood-type-tag">{{ $type }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            @if($hospital->bed_capacity)
            <div class="capacity-section">
                <div class="capacity-item">
                    <p class="capacity-label">Capacity</p>
                    <p class="capacity-value">{{ number_format($hospital->bed_capacity) }}</p>
                </div>
                @if($hospital->available_beds_this_week)
                <div class="capacity-item">
                    <p class="capacity-label">This week</p>
                    <p class="capacity-value">{{ number_format($hospital->available_beds_this_week) }} available</p>
                </div>
                @endif
            </div>
            @endif
        </div>

        <div class="hospital-card-actions">
            <a href="{{ route('admin.hospitals.edit', $hospital) }}" class="btn-icon" title="Edit">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" stroke="currentColor" stroke-width="2"/>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke="currentColor" stroke-width="2"/>
                </svg>
            </a>
            <form method="POST" action="{{ route('admin.hospitals.destroy', $hospital) }}" class="delete-form" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-icon btn-icon-danger" title="Delete"
                    onclick="return confirm('Are you sure you want to delete this hospital?\n\nThis action cannot be undone.')">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="2"/>
                        <path d="M10 11v6M14 11v6" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="no-hospitals">
        <svg width="64" height="64" viewBox="0 0 24 24" fill="none">
            <path d="M3 9L12 2L21 9V20C21 21.1 20.1 22 19 22H5C3.9 22 3 21.1 3 20V9Z" stroke="currentColor" stroke-width="2"/>
        </svg>
        <p>No hospitals found</p>
        <a href="{{ route('admin.hospitals.create') }}" class="btn btn-primary">Add Your First Hospital</a>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($hospitals->hasPages())
<div class="pagination-section">
    {{ $hospitals->withQueryString()->links() }}
</div>
@endif

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
@endsection
