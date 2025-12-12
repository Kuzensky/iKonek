@extends('layouts.frontend')

@section('title', 'Fundraiser Submitted - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/fundraisers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/fundraiser-success.css') }}">
    <style>
        .success-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 24px;
        }
        .success-icon-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
        }
        .success-icon {
            width: 80px;
            height: 80px;
            background: #16A34A;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }
        .success-icon.pulse {
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .success-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .success-title {
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 12px;
        }
        .success-subtitle {
            font-size: 20px;
            font-weight: 600;
            color: #16A34A;
            margin-bottom: 16px;
        }
        .success-description {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto 24px;
        }
        .success-badges {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .success-badge-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #F0FDF4;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #16A34A;
        }
        .badge-icon {
            font-size: 20px;
        }
        .campaign-summary-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #E5E7EB;
        }
        .summary-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
        }
        .status-badge {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
        }
        .status-pending {
            background: #FEF3C7;
            color: #92400E;
        }
        .campaign-title {
            font-size: 20px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 12px;
        }
        .campaign-meta {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #666;
            font-size: 14px;
        }
        .summary-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .stat-item {
            padding: 16px;
            background: #F9FAFB;
            border-radius: 8px;
        }
        .stat-label {
            font-size: 13px;
            color: #666;
            margin-bottom: 6px;
        }
        .stat-value {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
        }
        .next-steps-card {
            background: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 24px;
        }
        .timeline {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }
        .timeline-item {
            display: flex;
            gap: 16px;
        }
        .timeline-marker {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #E5E7EB;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            flex-shrink: 0;
        }
        .timeline-marker.active {
            background: #16A34A;
            color: white;
        }
        .timeline-content h4 {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 6px;
        }
        .timeline-content p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }
        .share-section {
            background: white;
            border-radius: 16px;
            padding: 32px;
            margin-bottom: 32px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .share-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .share-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .share-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .share-btn.facebook {
            background: #1877F2;
            color: white;
        }
        .share-btn.twitter {
            background: #1DA1F2;
            color: white;
        }
        .share-btn.copy {
            background: #6B7280;
            color: white;
        }
        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .action-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        .btn {
            padding: 14px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-primary {
            background: #E63946;
            color: white;
        }
        .btn-primary:hover {
            background: #D62839;
        }
        .btn-outline {
            background: white;
            color: #666;
            border: 2px solid #E5E7EB;
        }
        .btn-outline:hover {
            border-color: #E63946;
            color: #E63946;
        }
        .support-notice {
            text-align: center;
            padding: 16px;
            background: #F9FAFB;
            border-radius: 8px;
            font-size: 14px;
            color: #666;
        }
        .support-notice a {
            color: #E63946;
            text-decoration: none;
            font-weight: 600;
        }
        .summary-header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }
        .section-title-sm {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0;
        }
        .status-badge-sm {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            background: #FEF3C7;
            color: #92400E;
        }
        .summary-subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 24px;
        }
        .campaign-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .info-section {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: #F9FAFB;
            border-radius: 10px;
        }
        .info-icon {
            font-size: 24px;
            flex-shrink: 0;
        }
        .info-content {
            flex: 1;
        }
        .info-label {
            font-size: 13px;
            color: #666;
            margin-bottom: 4px;
        }
        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
        }
        .summary-stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat-box {
            padding: 20px;
            background: linear-gradient(135deg, #FEF3C7 0%, #FDE68A 100%);
            border-radius: 12px;
            text-align: center;
        }
        .stat-box:nth-child(2) {
            background: linear-gradient(135deg, #DBEAFE 0%, #BFDBFE 100%);
        }
        .stat-box:nth-child(3) {
            background: linear-gradient(135deg, #D1FAE5 0%, #A7F3D0 100%);
        }
        .stat-value-large {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a1a;
            margin-top: 6px;
        }
        .status-box {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            background: #F0F9FF;
            border-radius: 12px;
            border: 2px dashed #93C5FD;
        }
        .status-icon {
            font-size: 32px;
            flex-shrink: 0;
        }
        .status-content {
            flex: 1;
        }
        .status-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 6px;
        }
        .status-badge-yellow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            background: #FEF3C7;
            color: #92400E;
            font-weight: 600;
            font-size: 15px;
        }
        .share-icon-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 16px;
        }
        .share-icon-large {
            font-size: 48px;
            display: block;
        }
        .section-title-centered {
            font-size: 22px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }
        .action-buttons-row {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        .btn-action {
            padding: 14px 32px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            min-width: 200px;
        }
        .btn-secondary {
            background: white;
            color: #666;
            border: 2px solid #E5E7EB;
        }
        .btn-secondary:hover {
            border-color: #E63946;
            color: #E63946;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 57, 70, 0.15);
        }
        .btn-primary-red {
            background: linear-gradient(135deg, #E63946 0%, #D62839 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);
        }
        .btn-primary-red:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(230, 57, 70, 0.4);
        }
        /* Override dashboard-main for success page */
        main.dashboard-main {
            padding-top: 60px;
            background: #F3F4F6;
            min-height: 100vh;
            max-width: 100% !important;
        }
        /* Ensure all cards are visible */
        .campaign-summary-card,
        .next-steps-card,
        .share-section {
            opacity: 1 !important;
            visibility: visible !important;
            display: block !important;
        }
        /* Ensure success header is visible */
        .success-header,
        .success-icon-wrapper {
            display: block !important;
            opacity: 1 !important;
            visibility: visible !important;
        }
    </style>
@endpush

@section('content')
@php
    $fundraiser = null;
    if (session('last_created_fundraiser_id')) {
        $fundraiser = \App\Models\Fundraiser::find(session('last_created_fundraiser_id'));
    }
@endphp

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
            <a href="{{ route('fundraisers.index') }}" class="nav-item active">
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
                <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-status">Verified Donor</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline logout-btn">Logout</button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main" style="background: #F3F4F6; min-height: 100vh; padding: 40px;">
        <div class="success-container" style="max-width: 900px; margin: 0 auto; padding: 40px 24px;">
            <!-- Success Icon -->
            <div style="text-align: center; margin-bottom: 32px; margin-top: 20px;">
                <div style="display: inline-flex; width: 100px; height: 100px; background: #16A34A; border-radius: 50%; align-items: center; justify-content: center; color: white; box-shadow: 0 10px 40px rgba(22, 163, 74, 0.3); animation: pulse 2s ease-in-out infinite;">
                    <svg width="60" height="60" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <!-- Success Message -->
            <div class="success-header" style="text-align: center; margin-bottom: 48px;">
                <h1 class="success-title" style="font-size: 36px; font-weight: 700; color: #1a1a1a; margin-bottom: 16px; line-height: 1.2;">Fundraiser Submitted Successfully!</h1>
                <p class="success-description" style="font-size: 16px; color: #666; line-height: 1.7; max-width: 700px; margin: 0 auto;">
                    Your fundraiser is now under review by our team. We'll verify all information and notify you via email within 24-48 hours once it's approved and live.
                </p>
            </div>

            <!-- Campaign Summary Card -->
            <div class="campaign-summary-card" style="background: white; border-radius: 16px; padding: 32px; margin-bottom: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div class="summary-header-row" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <h3 class="section-title-sm" style="font-size: 20px; font-weight: 700; color: #1a1a1a; margin: 0;">Campaign Summary</h3>
                    <span class="status-badge-sm" style="padding: 6px 14px; border-radius: 20px; font-size: 13px; font-weight: 600; background: #FEF3C7; color: #92400E;">Under Review</span>
                </div>
                <p class="summary-subtitle" style="font-size: 14px; color: #666; margin-bottom: 24px;">Review your fundraiser details</p>

                @if ($fundraiser)
                <div class="campaign-info-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px; margin-bottom: 24px;">
                    <div class="info-section" style="display: flex; align-items: flex-start; gap: 12px; padding: 16px; background: #F9FAFB; border-radius: 10px;">
                        <div class="info-icon" style="font-size: 24px; flex-shrink: 0;">🎯</div>
                        <div class="info-content" style="flex: 1;">
                            <div class="info-label" style="font-size: 13px; color: #666; margin-bottom: 4px;">Campaign Title</div>
                            <div class="info-value" style="font-size: 16px; font-weight: 600; color: #1a1a1a;">{{ $fundraiser->title }}</div>
                        </div>
                    </div>

                    <div class="info-section" style="display: flex; align-items: flex-start; gap: 12px; padding: 16px; background: #F9FAFB; border-radius: 10px;">
                        <div class="info-icon" style="font-size: 24px; flex-shrink: 0;">✅</div>
                        <div class="info-content" style="flex: 1;">
                            <div class="info-label" style="font-size: 13px; color: #666; margin-bottom: 4px;">Category</div>
                            <div class="info-value" style="font-size: 16px; font-weight: 600; color: #1a1a1a;">{{ ucfirst(str_replace('_', ' ', $fundraiser->category)) }}</div>
                        </div>
                    </div>

                    <div class="info-section" style="display: flex; align-items: flex-start; gap: 12px; padding: 16px; background: #F9FAFB; border-radius: 10px;">
                        <div class="info-icon" style="font-size: 24px; flex-shrink: 0;">⏰</div>
                        <div class="info-content" style="flex: 1;">
                            <div class="info-label" style="font-size: 13px; color: #666; margin-bottom: 4px;">Campaign Duration</div>
                            <div class="info-value" style="font-size: 16px; font-weight: 600; color: #1a1a1a;">{{ $fundraiser->campaign_duration_days }} days</div>
                        </div>
                    </div>
                </div>

                <div class="summary-stats-row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
                    <div style="padding: 20px; background: #F9FAFB; border-radius: 12px; text-align: center; border: 1px solid #E5E7EB;">
                        <div style="font-size: 13px; color: #666; margin-bottom: 6px;">Goal Amount</div>
                        <div style="font-size: 20px; font-weight: 700; color: #1a1a1a; margin-top: 6px;">₱{{ number_format($fundraiser->goal_amount, 2) }}</div>
                    </div>
                    <div style="padding: 20px; background: #F9FAFB; border-radius: 12px; text-align: center; border: 1px solid #E5E7EB;">
                        <div style="font-size: 13px; color: #666; margin-bottom: 6px;">Beneficiary</div>
                        <div style="font-size: 20px; font-weight: 700; color: #1a1a1a; margin-top: 6px;">{{ $fundraiser->beneficiary_name }}</div>
                    </div>
                    <div style="padding: 20px; background: #F9FAFB; border-radius: 12px; text-align: center; border: 1px solid #E5E7EB;">
                        <div style="font-size: 13px; color: #666; margin-bottom: 6px;">Organizer</div>
                        <div style="font-size: 20px; font-weight: 700; color: #1a1a1a; margin-top: 6px;">{{ $fundraiser->organizer_name }}</div>
                    </div>
                </div>

                <div class="status-box" style="display: flex; align-items: center; gap: 16px; padding: 20px; background: #F0F9FF; border-radius: 12px; border: 2px dashed #93C5FD;">
                    <div class="status-icon" style="font-size: 32px; flex-shrink: 0;">📄</div>
                    <div class="status-content" style="flex: 1;">
                        <div class="status-title" style="font-size: 14px; color: #666; margin-bottom: 6px;">Status</div>
                        <div class="status-badge-yellow" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; background: #FEF3C7; color: #92400E; font-weight: 600; font-size: 15px;">⚠ Under Review</div>
                    </div>
                </div>
                @else
                <div style="padding: 40px; text-align: center; background: #F9FAFB; border-radius: 12px;">
                    <p style="font-size: 16px; color: #666; margin-bottom: 16px;">Your campaign has been submitted successfully!</p>
                    <p style="font-size: 14px; color: #999;">Campaign details will be available in your dashboard once processed.</p>
                </div>
                @endif
            </div>

            <!-- What Happens Next -->
            <div class="next-steps-card" style="background: white; border-radius: 16px; padding: 40px; margin-bottom: 32px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="text-align: center; margin-bottom: 40px;">
                    <h3 class="section-title" style="font-size: 24px; font-weight: 700; color: #1a1a1a; margin-bottom: 8px; display: inline-flex; align-items: center; gap: 10px;">
                        <span style="font-size: 28px;">📋</span> What Happens Next?
                    </h3>
                    <p style="font-size: 14px; color: #666; margin-top: 8px;">Follow these steps to get your campaign live</p>
                </div>
                <div class="timeline" style="display: flex; flex-direction: column; gap: 0; position: relative;">
                    <div class="timeline-item" style="display: flex; gap: 20px; position: relative; padding-bottom: 40px;">
                        <div style="display: flex; flex-direction: column; align-items: center; position: relative;">
                            <div class="timeline-marker active" style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, #16A34A 0%, #15803D 100%); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0; box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3); z-index: 2;">1</div>
                            <div style="position: absolute; top: 48px; bottom: 0; width: 2px; background: linear-gradient(to bottom, #16A34A, #E5E7EB); left: 50%; transform: translateX(-50%);"></div>
                        </div>
                        <div class="timeline-content" style="flex: 1; padding-top: 8px;">
                            <h4 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin-bottom: 8px;">Review Process (1-3 Business Days)</h4>
                            <p style="font-size: 14px; color: #666; line-height: 1.6;">Our team will verify all information, including beneficiary details and campaign authenticity.</p>
                        </div>
                    </div>
                    <div class="timeline-item" style="display: flex; gap: 20px; position: relative; padding-bottom: 40px;">
                        <div style="display: flex; flex-direction: column; align-items: center; position: relative;">
                            <div class="timeline-marker" style="width: 48px; height: 48px; border-radius: 50%; background: #E5E7EB; color: #6B7280; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0; z-index: 2;">2</div>
                            <div style="position: absolute; top: 48px; bottom: 0; width: 2px; background: #E5E7EB; left: 50%; transform: translateX(-50%);"></div>
                        </div>
                        <div class="timeline-content" style="flex: 1; padding-top: 8px;">
                            <h4 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin-bottom: 8px;">Approval Notification</h4>
                            <p style="font-size: 14px; color: #666; line-height: 1.6;">You'll receive an email and in-app notification once your campaign is approved.</p>
                        </div>
                    </div>
                    <div class="timeline-item" style="display: flex; gap: 20px; position: relative; padding-bottom: 40px;">
                        <div style="display: flex; flex-direction: column; align-items: center; position: relative;">
                            <div class="timeline-marker" style="width: 48px; height: 48px; border-radius: 50%; background: #E5E7EB; color: #6B7280; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0; z-index: 2;">3</div>
                            <div style="position: absolute; top: 48px; bottom: 0; width: 2px; background: #E5E7EB; left: 50%; transform: translateX(-50%);"></div>
                        </div>
                        <div class="timeline-content" style="flex: 1; padding-top: 8px;">
                            <h4 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin-bottom: 8px;">Campaign Goes Live</h4>
                            <p style="font-size: 14px; color: #666; line-height: 1.6;">Your fundraiser will be published and available for donations from our community.</p>
                        </div>
                    </div>
                    <div class="timeline-item" style="display: flex; gap: 20px; position: relative;">
                        <div style="display: flex; flex-direction: column; align-items: center;">
                            <div class="timeline-marker" style="width: 48px; height: 48px; border-radius: 50%; background: #E5E7EB; color: #6B7280; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 20px; flex-shrink: 0;">4</div>
                        </div>
                        <div class="timeline-content" style="flex: 1; padding-top: 8px;">
                            <h4 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin-bottom: 8px;">Start Receiving Donations</h4>
                            <p style="font-size: 14px; color: #666; line-height: 1.6;">Share your campaign and start making a difference!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Share Campaign -->
            <div class="share-section">
                <div class="share-icon-wrapper">
                    <span class="share-icon-large">📣</span>
                </div>
                <h3 class="section-title-centered">Share Your Campaign</h3>
                <p class="share-description">Get the word out and start receiving support</p>
                <div class="share-buttons">
                    <button class="share-btn facebook" onclick="shareOnFacebook()">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        Facebook
                    </button>
                    <button class="share-btn twitter" onclick="shareOnTwitter()">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                        Twitter
                    </button>
                    <button class="share-btn copy" onclick="copyLink()">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Copy Link
                    </button>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons-row">
                <a href="{{ route('fundraisers.index') }}" class="btn-action btn-secondary">
                    Create Another
                </a>
                <a href="{{ route('dashboard') }}" class="btn-action btn-primary-red">
                    View My Fundraisers
                </a>
            </div>

            <!-- Support Notice -->
            <div class="support-notice">
                <strong>Need Help?</strong> If you have any questions or concerns about your campaign, please contact our support team at <a href="mailto:support@ikonek.ph">support@ikonek.ph</a>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    function shareOnFacebook() {
        @if ($fundraiser)
        const url = '{{ route("fundraisers.show", $fundraiser->id) }}';
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`, '_blank', 'width=600,height=400');
        @else
        alert('Campaign details not available');
        @endif
    }

    function shareOnTwitter() {
        @if ($fundraiser)
        const url = '{{ route("fundraisers.show", $fundraiser->id) }}';
        const text = 'Check out my fundraiser: {{ $fundraiser->title }}';
        window.open(`https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent(url)}`, '_blank', 'width=600,height=400');
        @else
        alert('Campaign details not available');
        @endif
    }

    function copyLink() {
        @if ($fundraiser)
        const url = '{{ route("fundraisers.show", $fundraiser->id) }}';
        navigator.clipboard.writeText(url).then(() => {
            const btn = event.currentTarget;
            const originalText = btn.innerHTML;
            btn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg> Copied!';
            btn.style.background = '#16A34A';
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.style.background = '';
            }, 2000);
        });
        @else
        alert('Campaign details not available');
        @endif
    }
</script>
@endpush
