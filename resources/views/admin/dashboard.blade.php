@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
@endpush

@section('content')
<header class="admin-header">
    <div>
        <h1 class="header-title">Admin Dashboard</h1>
        <p class="header-subtitle">Monitor and manage iKonek platform</p>
    </div>
    <div class="header-actions">
        <button class="btn btn-analytics active">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="currentColor" stroke-width="2"/>
            </svg>
            Blood Donation Analytics
        </button>
        <button class="btn btn-analytics">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="currentColor" stroke-width="2"/>
            </svg>
            Fundraising Analytics
        </button>
    </div>
</header>

<!-- Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon stat-icon-blue">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2"/>
                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Total Donors</p>
            <p class="stat-value">{{ number_format($stats['total_donors']) }}</p>
            <p class="stat-change positive">+3.5% <span>vs last month</span></p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-pink">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2"/>
                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Total Users</p>
            <p class="stat-value">{{ number_format($stats['total_users']) }}</p>
            <p class="stat-change positive">+2.1% <span>This month</span></p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-purple">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 9L12 2L21 9V20C21 20.5304 20.7893 21.0391 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0391 3 20.5304 3 20V9Z" stroke="currentColor" stroke-width="2"/>
                <path d="M9 22V12H15V22" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Active Hospitals</p>
            <p class="stat-value">{{ $stats['active_hospitals'] }}</p>
            <p class="stat-change positive">+5 <span>In ongoing approval</span></p>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-green">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        <div class="stat-content">
            <p class="stat-label">Total Raised</p>
            <p class="stat-value">₱{{ number_format($stats['total_raised'], 2) }}</p>
            <p class="stat-change positive">+8.2% <span>vs last month</span></p>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="charts-section">
    <div class="chart-card">
        <div class="chart-header">
            <div>
                <h3 class="chart-title">Monthly Blood Donations</h3>
                <p class="chart-subtitle">Donation trends over the past 6 months</p>
            </div>
            <select class="chart-filter">
                <option>Last 6 months</option>
                <option>Last 12 months</option>
                <option>This year</option>
            </select>
        </div>
        <div class="chart-body">
            <canvas id="donationsChart" width="400" height="200"></canvas>
        </div>
    </div>

    <div class="chart-card">
        <div class="chart-header">
            <div>
                <h3 class="chart-title">Blood Type Distribution</h3>
                <p class="chart-subtitle">Breakdown by blood type</p>
            </div>
        </div>
        <div class="chart-body">
            <div class="blood-type-list">
                @foreach(['O+' => 2589, 'A+' => 2217, 'B+' => 1823, 'AB+' => 773, 'O-' => 456, 'A-' => 389, 'B-' => 298, 'AB-' => 125] as $type => $count)
                <div class="blood-type-item">
                    <div class="blood-type-info">
                        <span class="blood-type-label">{{ $type }}</span>
                        <span class="blood-type-count">{{ number_format($count) }}</span>
                    </div>
                    <div class="blood-type-bar">
                        <div class="blood-type-fill" style="width: {{ ($count / 2589) * 100 }}%"></div>
                    </div>
                    <span class="blood-type-percent">{{ number_format(($count / 2589) * 100, 2) }}%</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Donation Status & Top Hospitals -->
<div class="info-section">
    <div class="status-card">
        <h3 class="section-title">Donation Status</h3>
        <p class="section-subtitle">Current status breakdown</p>

        <div class="status-list">
            <div class="status-item status-verified">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" fill="currentColor" opacity="0.1"/>
                    <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="status-info">
                    <p class="status-label">Verified</p>
                    <p class="status-value">{{ number_format($stats['verified_donations']) }}</p>
                </div>
                <span class="status-badge badge-verified">Active</span>
            </div>

            <div class="status-item status-pending">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" fill="currentColor" opacity="0.1"/>
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <div class="status-info">
                    <p class="status-label">Pending</p>
                    <p class="status-value">{{ number_format($stats['pending_donations']) }}</p>
                </div>
                <span class="status-badge badge-pending">Hold</span>
            </div>

            <div class="status-item status-failed">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" fill="currentColor" opacity="0.1"/>
                    <path d="M15 9L9 15M9 9L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <div class="status-info">
                    <p class="status-label">Failed</p>
                    <p class="status-value">{{ number_format($stats['failed_donations']) }}</p>
                </div>
                <span class="status-badge badge-failed">Error</span>
            </div>
        </div>
    </div>

    <div class="hospitals-card">
        <h3 class="section-title">Top Partner Hospitals</h3>
        <p class="section-subtitle">Hospitals by donation volume</p>

        <div class="hospitals-list">
            @forelse($topHospitals as $index => $hospital)
            <div class="hospital-item">
                <span class="hospital-rank">{{ $index + 1 }}</span>
                <div class="hospital-info">
                    <p class="hospital-name">{{ $hospital->name }}</p>
                    <div class="hospital-bar">
                        <div class="hospital-fill" style="width: {{ $topHospitals->first()->donations_count > 0 ? ($hospital->donations_count / $topHospitals->first()->donations_count) * 100 : 0 }}%"></div>
                    </div>
                </div>
                <span class="hospital-count">{{ $hospital->donations_count }}</span>
            </div>
            @empty
            <p class="no-data">No hospital data available</p>
            @endforelse
        </div>
    </div>
</div>

<!-- Recent Blood Donations -->
<div class="recent-donations-card">
    <div class="card-header">
        <h3 class="section-title">Recent Blood Donations</h3>
        <p class="section-subtitle">Latest donation records</p>
    </div>

    <div class="donations-table">
        <table>
            <thead>
                <tr>
                    <th>Donor</th>
                    <th>Hospital</th>
                    <th>Blood Type</th>
                    <th>Date & Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentDonations as $donation)
                <tr>
                    <td>
                        <div class="donor-info">
                            <div class="donor-avatar">{{ strtoupper(substr($donation->user->first_name, 0, 1)) }}</div>
                            <div>
                                <p class="donor-name">{{ $donation->user->first_name }} {{ $donation->user->last_name }}</p>
                                <p class="donor-email">{{ $donation->user->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{ $donation->hospital->name }}</td>
                    <td>
                        <span class="blood-type-badge">{{ $donation->user->blood_type ?? 'N/A' }}</span>
                    </td>
                    <td>
                        <p>{{ $donation->donation_date->format('M d, Y') }}</p>
                        <p class="text-muted">{{ $donation->donation_date->format('g:i A') }}</p>
                    </td>
                    <td>
                        <span class="status-badge badge-{{ strtolower($donation->status) }}">
                            {{ ucfirst($donation->status) }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No recent donations</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Monthly Donations Chart
const ctx = document.getElementById('donationsChart');
if (ctx) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [
                {
                    label: 'Verified',
                    data: [120, 150, 180, 160, 200, 220],
                    backgroundColor: '#22C55E',
                },
                {
                    label: 'Pending',
                    data: [20, 25, 30, 28, 35, 40],
                    backgroundColor: '#FCD34D',
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
</script>
@endpush
