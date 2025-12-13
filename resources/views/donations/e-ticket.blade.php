<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket - {{ $appointment->confirmation_code }}</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .ticket-container {
            background: white;
            max-width: 480px;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            margin: 0 auto;
        }

        /* Ticket Card Header */
        .ticket-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 32px;
            background: linear-gradient(135deg, #FFFFFF 0%, #F8F9FA 100%);
            border-bottom: 2px dashed rgba(29, 53, 87, 0.1);
        }

        .ticket-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .ticket-logo img {
            width: 40px;
            height: 40px;
        }

        .ticket-logo-text {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #1D3557;
        }

        .ticket-logo-text .logo-i {
            color: #E63946;
        }

        .ticket-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            font-weight: 600;
            background: #E63946;
            color: white;
        }

        /* Hero Section with QR and Key Info */
        .ticket-hero {
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 0;
            border-bottom: 2px dashed rgba(29, 53, 87, 0.1);
        }

        .ticket-qr-side {
            background: linear-gradient(135deg, #F8F9FA 0%, #F0F4F8 100%);
            padding: 32px 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 2px dashed rgba(29, 53, 87, 0.1);
        }

        .qr-wrapper {
            text-align: center;
        }

        .qr-code {
            display: inline-block;
            padding: 12px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(29, 53, 87, 0.12);
            margin-bottom: 20px;
        }

        .qr-code img {
            display: block;
            border-radius: 8px;
        }

        .confirmation-code {
            background: linear-gradient(135deg, #E63946 0%, #D12835 100%);
            padding: 12px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(230, 57, 70, 0.2);
        }

        .confirmation-label {
            font-family: 'Inter', sans-serif;
            font-size: 11px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.85);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin: 0 0 4px 0;
        }

        .confirmation-value {
            font-family: 'JetBrains Mono', 'Courier New', monospace;
            font-size: 16px;
            font-weight: 700;
            color: white;
            letter-spacing: 2px;
            margin: 0;
        }

        .ticket-info-side {
            padding: 32px;
            background: linear-gradient(135deg, #FFFFFF 0%, #FAFBFC 100%);
        }

        .ticket-quick-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .quick-info-group {
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }

        .quick-info-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #E63946 0%, #D12835 100%);
            border-radius: 10px;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 2px 8px rgba(230, 57, 70, 0.2);
        }

        .quick-info-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .quick-info-label {
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 600;
            color: rgba(29, 53, 87, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .quick-info-value {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 600;
            color: #1D3557;
            line-height: 1.4;
        }

        .quick-info-address {
            font-family: 'Inter', sans-serif;
            font-size: 13px;
            color: rgba(29, 53, 87, 0.65);
            line-height: 1.5;
            margin-top: 2px;
        }

        /* Preparation Instructions */
        .ticket-details {
            padding: 32px;
        }

        .ticket-section {
            margin-bottom: 32px;
        }

        .ticket-section:last-child {
            margin-bottom: 0;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: 600;
            color: #1D3557;
            margin: 0 0 20px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: linear-gradient(180deg, #E63946 0%, #D12835 100%);
            border-radius: 2px;
        }

        .instructions-box {
            padding: 20px;
            background: #F3F4F6;
            border-radius: 12px;
        }

        .instruction-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: #1D3557;
            padding: 10px 0;
        }

        .instruction-item:not(:last-child) {
            border-bottom: 1px solid rgba(29, 53, 87, 0.08);
            padding-bottom: 12px;
            margin-bottom: 12px;
        }

        .instruction-item svg {
            flex-shrink: 0;
            color: #10B981;
        }

        /* Footer Actions */
        .ticket-actions {
            display: flex;
            gap: 12px;
            padding: 24px 32px;
            background: #F8F9FA;
            border-top: 2px dashed rgba(29, 53, 87, 0.1);
        }

        .btn {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 24px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #E63946 0%, #D12835 100%);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #D12835 0%, #B01E2B 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #457B9D;
            border: 2px solid #457B9D;
        }

        .btn-secondary:hover {
            background: #F0F9FF;
            border-color: #457B9D;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .ticket-hero {
                grid-template-columns: 1fr;
            }

            .ticket-qr-side {
                border-right: none;
                border-bottom: 2px dashed rgba(29, 53, 87, 0.1);
                padding: 28px 20px;
            }

            .ticket-info-side {
                padding: 28px 20px;
            }

            .quick-info-icon {
                width: 36px;
                height: 36px;
            }

            .quick-info-value {
                font-size: 14px;
            }

            .ticket-details {
                padding: 24px 20px;
            }

            .ticket-actions {
                flex-direction: column;
                padding: 20px;
            }
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .ticket-container {
                box-shadow: none;
                max-width: 100%;
            }

            .ticket-actions {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        <!-- Ticket Header -->
        <div class="ticket-card-header">
            <div class="ticket-logo">
                <img src="{{ asset('assets/img/ikonek-logo.png') }}" alt="iKonek" width="40" height="40">
                <div class="ticket-logo-text">
                    <span class="logo-i">i</span>Konek
                </div>
            </div>
            <span class="ticket-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                {{ ucfirst($appointment->status) }}
            </span>
        </div>

        <!-- Hero Section with QR Code and Key Info -->
        <div class="ticket-hero">
            <!-- QR Code Side -->
            <div class="ticket-qr-side">
                <div class="qr-wrapper">
                    <div class="qr-code">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($appointment->confirmation_code) }}"
                             alt="QR Code"
                             width="150"
                             height="150">
                    </div>
                    <div class="confirmation-code">
                        <p class="confirmation-label">Confirmation Code</p>
                        <p class="confirmation-value">{{ $appointment->confirmation_code }}</p>
                    </div>
                </div>
            </div>

            <!-- Key Info Side -->
            <div class="ticket-info-side">
                <div class="ticket-quick-info">
                    <!-- Date & Time -->
                    <div class="quick-info-group">
                        <div class="quick-info-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor" stroke-width="2"/>
                                <path d="M16 2V6M8 2V6M3 10H21" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="quick-info-content">
                            <span class="quick-info-label">Date & Time</span>
                            <span class="quick-info-value">{{ $appointment->appointment_date->format('M j, Y') }} at {{ $appointment->appointment_date->format('g:i A') }}</span>
                        </div>
                    </div>

                    <!-- Patient Name -->
                    <div class="quick-info-group">
                        <div class="quick-info-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="quick-info-content">
                            <span class="quick-info-label">Patient Name</span>
                            <span class="quick-info-value">{{ $appointment->user->first_name }} {{ $appointment->user->last_name }}</span>
                        </div>
                    </div>

                    <!-- Blood Type -->
                    <div class="quick-info-group">
                        <div class="quick-info-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="quick-info-content">
                            <span class="quick-info-label">Blood Type</span>
                            <span class="quick-info-value">{{ $appointment->user->blood_type ?? 'Not specified' }}</span>
                        </div>
                    </div>

                    <!-- Hospital -->
                    <div class="quick-info-group">
                        <div class="quick-info-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10C21 17 12 23 12 23C12 23 3 17 3 10C3 7.61305 3.94821 5.32387 5.63604 3.63604C7.32387 1.94821 9.61305 1 12 1C14.3869 1 16.6761 1.94821 18.364 3.63604C20.0518 5.32387 21 7.61305 21 10Z" stroke="currentColor" stroke-width="2"/>
                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="quick-info-content">
                            <span class="quick-info-label">Location</span>
                            <span class="quick-info-value">{{ $appointment->hospital->name }}</span>
                            <span class="quick-info-address">{{ $appointment->hospital->address }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Details -->
        <div class="ticket-details">
            <!-- Preparation Instructions -->
            <div class="ticket-section">
                <h3 class="section-title">Preparation Instructions</h3>
                <div class="instructions-box">
                    <div class="instruction-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Stay well-hydrated by drinking plenty of water</span>
                    </div>
                    <div class="instruction-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Eat a healthy meal before your appointment</span>
                    </div>
                    <div class="instruction-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Avoid fatty foods 24 hours prior to donation</span>
                    </div>
                    <div class="instruction-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Bring a valid ID and this confirmation code</span>
                    </div>
                    <div class="instruction-item">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span>Get adequate rest the night before</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ticket Actions -->
        <div class="ticket-actions">
            <button class="btn btn-primary" onclick="window.print()">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 9V2H18V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 18H4C3.46957 18 2.96086 17.7893 2.58579 17.4142C2.21071 17.0391 2 16.5304 2 16V11C2 10.4696 2.21071 9.96086 2.58579 9.58579C2.96086 9.21071 3.46957 9 4 9H20C20.5304 9 21.0391 9.21071 21.4142 9.58579C21.7893 9.96086 22 10.4696 22 11V16C22 16.5304 21.7893 17.0391 21.4142 17.4142C21.0391 17.7893 20.5304 18 20 18H18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18 14H6V22H18V14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Print Ticket
            </button>
            <a href="{{ route('history') }}" class="btn btn-secondary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to History
            </a>
        </div>
    </div>
</body>
</html>
