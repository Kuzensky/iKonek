@extends('layouts.frontend')

@section('title', 'Fundraisers - iKonek')

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
    <link rel="stylesheet" href="{{ asset('css/components/modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/donation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/receipt.css') }}">
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
                <div class="user-avatar">P</div>
                <div class="user-details">
                    <div class="user-name">Priya</div>
                    <div class="user-status">Verified Donor</div>
                </div>
            </div>
            <button class="btn btn-outline logout-btn">Logout</button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="dashboard-main">
        <!-- Fundraisers Header -->
        <header class="dashboard-header">
            <div class="header-content">
                <div class="greeting-section">
                    <h1 class="header-title">Fundraisers 💝</h1>
                    <p class="header-subtitle">Support humanitarian causes or start your own campaign</p>
                </div>
                <div class="quick-stats">
                    <div class="quick-stat-item">
                        <span class="quick-stat-value">4</span>
                        <span class="quick-stat-label">Active Campaigns</span>
                    </div>
                    <div class="quick-stat-divider"></div>
                    <div class="quick-stat-item">
                        <span class="quick-stat-value">₱1.6M</span>
                        <span class="quick-stat-label">Raised Total</span>
                    </div>
                </div>
            </div>
            <div class="header-actions">
                <button class="btn btn-primary btn-start-fundraiser">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 11H5M12 18V4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Start a Fundraiser</span>
                </button>
            </div>
        </header>

        <!-- Tabs -->
        <div class="fundraisers-tabs">
            <button class="tab-btn active" data-tab="explore">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                    <path d="M21 21L16.65 16.65" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                Explore Campaigns
            </button>
            <button class="tab-btn" data-tab="my-campaigns">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2"/>
                    <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                </svg>
                My Campaigns
            </button>
        </div>

        <!-- Tab Content -->
        <div class="tab-content active" id="explore-tab">
            <div class="section-header" style="margin-bottom: 28px;">
                <h2 class="section-title">Active Fundraising Campaigns</h2>
                <p class="section-subtitle">Make an impact by supporting these causes</p>
            </div>
            <div class="fundraisers-grid" id="fundraisersGrid">
                <!-- Campaign cards will be dynamically inserted here -->
            </div>
        </div>

        <div class="tab-content" id="my-campaigns-tab">
            <div class="empty-state">
                <div class="empty-state-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="rgba(230, 57, 70, 0.3)" stroke-width="2" fill="rgba(230, 57, 70, 0.05)"/>
                    </svg>
                </div>
                <h3 class="empty-state-title">No campaigns yet</h3>
                <p class="empty-state-text">Start your first fundraiser to support a cause you care about and make a difference in people's lives.</p>
                <button class="btn btn-primary">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 11H5M12 18V4" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Start a Fundraiser
                </button>
            </div>
        </div>
    </main>

    <script>
        // Fundraisers data and functionality
        const fundraisersData = [
            {
                id: 1,
                title: "Hope for Typhoon Victims in Mindanao",
                organizer: "Red Cross Philippines",
                category: "Disaster Relief",
                raised: 450000,
                goal: 1000000,
                contributors: 320,
                daysLeft: 25
            },
            {
                id: 2,
                title: "Children's Cancer Fund - St. Luke's",
                organizer: "St. Luke's Foundation",
                category: "Medical Assistance",
                raised: 780000,
                goal: 1500000,
                contributors: 512,
                daysLeft: 40
            },
            {
                id: 3,
                title: "Emergency Surgery Support for Baby Angelo",
                organizer: "Santos Family",
                category: "Medical Emergency",
                raised: 125000,
                goal: 200000,
                contributors: 98,
                daysLeft: 12
            },
            {
                id: 4,
                title: "Community Health Program - Tondo Manila",
                organizer: "Gawad Kalinga",
                category: "Healthcare Access",
                raised: 240000,
                goal: 500000,
                contributors: 156,
                daysLeft: 35
            }
        ];

        class FundraisersManager {
            constructor() {
                this.container = document.getElementById('fundraisersGrid');
                this.init();
            }
            
            init() {
                if (this.container) {
                    this.renderFundraisers();
                    this.attachEventListeners();
                }
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0
                }).format(amount);
            }
            
            calculatePercentage(raised, goal) {
                return Math.min(Math.round((raised / goal) * 100), 100);
            }
            
            createFundraiserCard(fundraiser) {
                const percentage = this.calculatePercentage(fundraiser.raised, fundraiser.goal);
                
                return `
                    <div class="fundraiser-card" data-id="${fundraiser.id}">
                        <div class="fundraiser-header">
                            <div class="fundraiser-header-top">
                                <h3 class="fundraiser-title">${fundraiser.title}</h3>
                                <span class="fundraiser-category">${fundraiser.category}</span>
                            </div>
                            <p class="fundraiser-organizer">by ${fundraiser.organizer}</p>
                        </div>
                        
                        <div class="fundraiser-progress">
                            <div class="fundraiser-amounts">
                                <span class="fundraiser-raised">${this.formatCurrency(fundraiser.raised)}</span>
                                <span class="fundraiser-goal">of ${this.formatCurrency(fundraiser.goal)}</span>
                            </div>
                            
                            <div class="fundraiser-progress-bar">
                                <div class="fundraiser-progress-fill" data-percentage="${percentage}" style="width: 0%"></div>
                            </div>
                            
                            <div class="fundraiser-stats">
                                <div class="fundraiser-stat">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2"/>
                                        <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                        <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2"/>
                                        <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                    <span>${fundraiser.contributors} contributors</span>
                                </div>
                                <div class="fundraiser-stat">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <span>${fundraiser.daysLeft} days left</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="fundraiser-action">
                            <button class="btn-view-campaign" data-id="${fundraiser.id}">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                View Campaign
                            </button>
                            <button class="btn-donate" data-id="${fundraiser.id}">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                Donate Now
                            </button>
                        </div>
                    </div>
                `;
            }
            
            renderFundraisers() {
                this.container.innerHTML = fundraisersData
                    .map(fundraiser => this.createFundraiserCard(fundraiser))
                    .join('');
                
                // Animate progress bars
                setTimeout(() => {
                    document.querySelectorAll('.fundraiser-progress-fill').forEach(bar => {
                        const percentage = bar.getAttribute('data-percentage');
                        bar.style.width = `${percentage}%`;
                    });
                }, 100);
            }
            
            attachEventListeners() {
                // Donate button clicks
                this.container.addEventListener('click', (e) => {
                    const donateBtn = e.target.closest('.btn-donate');
                    if (donateBtn) {
                        const fundraiserId = donateBtn.getAttribute('data-id');
                        this.handleDonate(fundraiserId);
                    }
                    
                    // View Campaign button clicks
                    const viewBtn = e.target.closest('.btn-view-campaign');
                    if (viewBtn) {
                        const fundraiserId = viewBtn.getAttribute('data-id');
                        this.handleViewCampaign(fundraiserId);
                    }
                });
            }
            
            handleViewCampaign(fundraiserId) {
                // Redirect to view campaign page
                window.location.href = `view-campaign.html?id=${fundraiserId}`;
            }
            
            handleDonate(fundraiserId) {
                const fundraiser = fundraisersData.find(f => f.id == fundraiserId);
                if (fundraiser) {
                    // Open donation modal
                    const modal = new DonationModal(fundraiser);
                    modal.open();
                }
            }
        }

        // Donation Modal Class
        class DonationModal {
            constructor(fundraiser) {
                this.fundraiser = fundraiser;
                this.selectedAmount = null;
                this.customAmount = null;
                this.selectedPayment = null;
                this.currentStep = 1;
                this.donorName = '';
                this.donorEmail = '';
                this.donorPhone = '+63 ';
                this.donorMessage = '';
                this.isAnonymous = false;
                this.init();
            }
            
            init() {
                this.createModal();
                this.attachEventListeners();
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0
                }).format(amount);
            }
            
            calculatePercentage(raised, goal) {
                return Math.min(Math.round((raised / goal) * 100), 100);
            }
            
            createModal() {
                const percentage = this.calculatePercentage(this.fundraiser.raised, this.fundraiser.goal);
                
                const modalHTML = `
                    <div class="donation-modal" id="donationModal">
                        <div class="modal-overlay" id="modalOverlay"></div>
                        <div class="modal-content donation-modal-content">
                            <button class="modal-close" id="modalClose" aria-label="Close">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            
                            <div class="modal-header">
                                <div class="modal-title-wrapper">
                                    <img src="{{ asset('assets/icons/heart.svg') }}" alt="" class="modal-icon">
                                    <h2 class="modal-title">Make a Donation</h2>
                                </div>
                                <p class="modal-description">Support ${this.fundraiser.title}</p>
                            </div>
                            
                            <div class="modal-body">
                                <!-- Progress Steps -->
                                <div class="donation-steps">
                                    <div class="donation-step ${this.currentStep >= 1 ? 'active' : ''}">
                                        <div class="step-circle">
                                            ${this.currentStep > 1 ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>' : '1'}
                                        </div>
                                        <span class="step-label">Amount</span>
                                    </div>
                                    <div class="step-connector ${this.currentStep >= 2 ? 'active' : ''}"></div>
                                    <div class="donation-step ${this.currentStep >= 2 ? 'active' : ''}">
                                        <div class="step-circle">2</div>
                                        <span class="step-label">Details</span>
                                    </div>
                                </div>
                                
                                ${this.currentStep === 1 ? this.renderStep1(percentage) : this.renderStep2()}
                            </div>
                            
                            <div class="modal-footer">
                                ${this.currentStep === 2 ? '<button type="button" class="btn btn-outline" id="backBtn">Back</button>' : '<button type="button" class="btn btn-outline" id="cancelBtn">Cancel</button>'}
                                <button type="button" class="btn btn-primary" id="continueBtn" disabled>
                                    ${this.currentStep === 1 ? 'Continue' : 'Confirm Donation'}
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                
                // Remove existing modal if any
                const existingModal = document.getElementById('donationModal');
                if (existingModal) {
                    existingModal.remove();
                }
                
                // Add modal to body
                document.body.insertAdjacentHTML('beforeend', modalHTML);
                this.modal = document.getElementById('donationModal');
            }
            
            renderStep1(percentage) {
                return `
                    <!-- Campaign Summary -->
                    <div class="campaign-summary">
                        <div class="summary-header">
                            <p class="summary-label">Campaign</p>
                            <h3 class="summary-title">${this.fundraiser.title}</h3>
                        </div>
                        <div class="summary-progress">
                            <div class="summary-amounts">
                                <span class="summary-raised">${this.formatCurrency(this.fundraiser.raised)} raised</span>
                                <span class="summary-goal">Goal: ${this.formatCurrency(this.fundraiser.goal)}</span>
                            </div>
                            <div class="summary-progress-bar">
                                <div class="summary-progress-fill" style="width: ${percentage}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Amount Selection -->
                    <div class="form-section">
                        <label class="form-label">
                            Select Amount
                            <span class="required">*</span>
                        </label>
                        <div class="amount-grid">
                            <button type="button" class="amount-btn ${this.selectedAmount === 100 ? 'selected' : ''}" data-amount="100">₱100</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 250 ? 'selected' : ''}" data-amount="250">₱250</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 500 ? 'selected' : ''}" data-amount="500">₱500</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 1000 ? 'selected' : ''}" data-amount="1000">₱1,000</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 2500 ? 'selected' : ''}" data-amount="2500">₱2,500</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 5000 ? 'selected' : ''}" data-amount="5000">₱5,000</button>
                        </div>
                    </div>
                    
                    <!-- Custom Amount -->
                    <div class="form-section">
                        <label class="form-label">Or Enter Custom Amount</label>
                        <div class="custom-amount-wrapper">
                            <span class="currency-symbol">₱</span>
                            <input 
                                type="number" 
                                id="customAmount" 
                                class="custom-amount-input" 
                                placeholder="Enter amount"
                                min="50"
                                max="1000000"
                                value="${this.customAmount || ''}"
                            >
                        </div>
                        <p class="form-helper">Minimum: ₱50 | Maximum: ₱1,000,000</p>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="form-section">
                        <label class="form-label">
                            Payment Method
                            <span class="required">*</span>
                        </label>
                        <div class="payment-grid">
                            <button type="button" class="payment-btn ${this.selectedPayment === 'gcash' ? 'selected' : ''}" data-method="gcash">
                                <img src="{{ asset('assets/icons/phone-red.svg') }}" alt="">
                                <span>GCash</span>
                            </button>
                            <button type="button" class="payment-btn ${this.selectedPayment === 'maya' ? 'selected' : ''}" data-method="maya">
                                <img src="{{ asset('assets/icons/phone-red.svg') }}" alt="">
                                <span>Maya (PayMaya)</span>
                            </button>
                            <button type="button" class="payment-btn ${this.selectedPayment === 'card' ? 'selected' : ''}" data-method="card">
                                <img src="{{ asset('assets/icons/card-red.svg') }}" alt="">
                                <span>Credit/Debit Card</span>
                            </button>
                            <button type="button" class="payment-btn ${this.selectedPayment === 'bank' ? 'selected' : ''}" data-method="bank">
                                <img src="{{ asset('assets/icons/money-red.svg') }}" alt="">
                                <span>Bank Transfer</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Info Box -->
                    <div class="donation-info">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <p>100% of your donation goes to the fundraiser. iKonek does not charge any fees.</p>
                    </div>
                `;
            }
            
            renderStep2() {
                const amount = this.customAmount || this.selectedAmount;
                const paymentLabels = {
                    'gcash': 'GCash',
                    'maya': 'Maya (PayMaya)',
                    'card': 'Credit/Debit Card',
                    'bank': 'Bank Transfer'
                };
                
                return `
                    <!-- Donation Summary -->
                    <div class="donation-summary-card">
                        <h3 class="summary-card-title">Donation Summary</h3>
                        <div class="summary-item">
                            <span class="summary-item-label">Amount</span>
                            <span class="summary-item-value">${this.formatCurrency(amount)}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-item-label">Payment Method</span>
                            <span class="summary-item-value">${paymentLabels[this.selectedPayment]}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-item-label">Campaign</span>
                            <span class="summary-item-value">${this.fundraiser.title}</span>
                        </div>
                    </div>
                    
                    <!-- Anonymous Checkbox -->
                    <div class="form-section">
                        <label class="anonymous-checkbox">
                            <input type="checkbox" id="anonymousCheckbox" ${this.isAnonymous ? 'checked' : ''}>
                            <span class="checkbox-custom"></span>
                            <div class="checkbox-label">
                                <span class="checkbox-title">Donate Anonymously</span>
                                <span class="checkbox-description">Your name will not be shown publicly</span>
                            </div>
                        </label>
                    </div>
                    
                    <!-- Donor Details Form -->
                    <div class="form-section">
                        <label class="form-label">
                            Your Name
                            <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="donorName" 
                            class="form-input" 
                            placeholder="Enter your full name"
                            value="${this.donorName}"
                            ${this.isAnonymous ? 'disabled' : ''}
                        >
                    </div>
                    
                    <div class="form-section">
                        <label class="form-label">
                            Email
                            <span class="required">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="donorEmail" 
                            class="form-input" 
                            placeholder="example@email.com"
                            value="${this.donorEmail}"
                        >
                    </div>
                    
                    <div class="form-section">
                        <label class="form-label">
                            Phone Number
                            <span class="required">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="donorPhone" 
                            class="form-input" 
                            placeholder="+63 912 345 6789"
                            value="${this.donorPhone}"
                            maxlength="16"
                        >
                    </div>
                    
                    <div class="form-section">
                        <label class="form-label">Message (Optional)</label>
                        <textarea 
                            id="donorMessage" 
                            class="form-textarea" 
                            placeholder="Write a message of support..."
                            maxlength="500"
                            rows="4"
                        >${this.donorMessage}</textarea>
                        <p class="form-helper char-counter"><span id="charCount">${this.donorMessage.length}</span>/500 characters</p>
                    </div>
                    
                    <!-- Receipt Info Box -->
                    <div class="donation-info">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <p>You will receive a receipt via email after your donation is processed.</p>
                    </div>
                `;
            }
            
            attachEventListeners() {
                // Close modal events
                const closeBtn = document.getElementById('modalClose');
                const cancelBtn = document.getElementById('cancelBtn');
                const backBtn = document.getElementById('backBtn');
                const overlay = document.getElementById('modalOverlay');
                
                closeBtn.addEventListener('click', () => this.close());
                if (cancelBtn) {
                    cancelBtn.addEventListener('click', () => this.close());
                }
                if (backBtn) {
                    backBtn.addEventListener('click', () => this.goToStep1());
                }
                overlay.addEventListener('click', () => this.close());
                
                // ESC key to close
                const escapeHandler = (e) => {
                    if (e.key === 'Escape' && this.modal && this.modal.style.display === 'flex') {
                        this.close();
                    }
                };
                document.addEventListener('keydown', escapeHandler);
                
                if (this.currentStep === 1) {
                    this.attachStep1Listeners();
                } else {
                    this.attachStep2Listeners();
                }
                
                // Continue button
                const continueBtn = document.getElementById('continueBtn');
                continueBtn.addEventListener('click', () => this.handleContinue());
            }
            
            attachStep1Listeners() {
                // Amount selection
                document.querySelectorAll('.amount-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('selected'));
                        e.target.classList.add('selected');
                        this.selectedAmount = parseInt(e.target.getAttribute('data-amount'));
                        
                        // Clear custom amount
                        const customInput = document.getElementById('customAmount');
                        customInput.value = '';
                        this.customAmount = null;
                        
                        this.validateForm();
                    });
                });
                
                // Custom amount input
                const customInput = document.getElementById('customAmount');
                customInput.addEventListener('input', (e) => {
                    const value = parseInt(e.target.value);
                    
                    if (value >= 50) {
                        // Clear preset amounts
                        document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('selected'));
                        this.selectedAmount = null;
                        this.customAmount = value;
                    } else {
                        this.customAmount = null;
                    }
                    
                    this.validateForm();
                });
                
                // Payment method selection
                document.querySelectorAll('.payment-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        document.querySelectorAll('.payment-btn').forEach(b => b.classList.remove('selected'));
                        e.currentTarget.classList.add('selected');
                        this.selectedPayment = e.currentTarget.getAttribute('data-method');
                        this.validateForm();
                    });
                });
            }
            
            attachStep2Listeners() {
                // Anonymous checkbox
                const anonymousCheckbox = document.getElementById('anonymousCheckbox');
                const donorNameInput = document.getElementById('donorName');
                
                anonymousCheckbox.addEventListener('change', (e) => {
                    this.isAnonymous = e.target.checked;
                    if (this.isAnonymous) {
                        donorNameInput.disabled = true;
                        donorNameInput.value = '';
                        this.donorName = '';
                    } else {
                        donorNameInput.disabled = false;
                    }
                    this.validateForm();
                });
                
                // Form inputs
                donorNameInput.addEventListener('input', (e) => {
                    this.donorName = e.target.value;
                    this.validateForm();
                });
                
                const donorEmailInput = document.getElementById('donorEmail');
                donorEmailInput.addEventListener('input', (e) => {
                    this.donorEmail = e.target.value;
                    this.validateForm();
                });
                
                const donorPhoneInput = document.getElementById('donorPhone');
                donorPhoneInput.addEventListener('input', (e) => {
                    let value = e.target.value;
                    
                    // Ensure +63 prefix
                    if (!value.startsWith('+63')) {
                        value = '+63 ';
                        e.target.value = value;
                    }
                    
                    if (value.length < 4) {
                        value = '+63 ';
                        e.target.value = value;
                    }
                    
                    // Format the phone number: +63 XXX XXX XXXX
                    const numbers = value.slice(3).replace(/\D/g, '');
                    if (numbers.length > 0) {
                        let formatted = '+63 ';
                        if (numbers.length <= 3) {
                            formatted += numbers;
                        } else if (numbers.length <= 6) {
                            formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3);
                        } else {
                            formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3, 6) + ' ' + numbers.slice(6, 10);
                        }
                        value = formatted;
                        e.target.value = formatted;
                    }
                    
                    this.donorPhone = value;
                    this.validateForm();
                });
                
                donorPhoneInput.addEventListener('click', (e) => {
                    if (e.target.selectionStart < 4) {
                        e.target.setSelectionRange(e.target.value.length, e.target.value.length);
                    }
                });
                
                donorPhoneInput.addEventListener('keydown', (e) => {
                    const input = e.target;
                    // Prevent deleting the +63 prefix
                    if ((e.key === 'Backspace' || e.key === 'Delete') && input.selectionStart <= 4) {
                        e.preventDefault();
                    }
                });
                
                const donorMessageInput = document.getElementById('donorMessage');
                donorMessageInput.addEventListener('input', (e) => {
                    this.donorMessage = e.target.value;
                    const charCount = document.getElementById('charCount');
                    if (charCount) {
                        charCount.textContent = e.target.value.length;
                    }
                });
            }
            
            validateForm() {
                const continueBtn = document.getElementById('continueBtn');
                
                if (this.currentStep === 1) {
                    const hasAmount = this.selectedAmount !== null || this.customAmount !== null;
                    const hasPayment = this.selectedPayment !== null;
                    continueBtn.disabled = !(hasAmount && hasPayment);
                } else {
                    // Step 2 validation
                    const hasName = this.isAnonymous || this.donorName.trim().length > 0;
                    const hasEmail = this.donorEmail.trim().length > 0 && this.validateEmail(this.donorEmail);
                    const hasPhone = this.donorPhone.length >= 13; // +63 XXX XXX XXXX (minimum valid length)
                    continueBtn.disabled = !(hasName && hasEmail && hasPhone);
                }
            }
            
            validateEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            goToStep1() {
                this.currentStep = 1;
                this.refreshModal();
            }
            
            goToStep2() {
                this.currentStep = 2;
                this.refreshModal();
            }
            
            refreshModal() {
                const percentage = this.calculatePercentage(this.fundraiser.raised, this.fundraiser.goal);
                const modalBody = document.querySelector('.modal-body');
                const modalFooter = document.querySelector('.modal-footer');
                
                // Update progress steps and body
                const progressHTML = `
                    <div class="donation-steps">
                        <div class="donation-step ${this.currentStep >= 1 ? 'active' : ''}">
                            <div class="step-circle">
                                ${this.currentStep > 1 ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>' : '1'}
                            </div>
                            <span class="step-label">Amount</span>
                        </div>
                        <div class="step-connector ${this.currentStep >= 2 ? 'active' : ''}"></div>
                        <div class="donation-step ${this.currentStep >= 2 ? 'active' : ''}">
                            <div class="step-circle">2</div>
                            <span class="step-label">Details</span>
                        </div>
                    </div>
                    ${this.currentStep === 1 ? this.renderStep1(percentage) : this.renderStep2()}
                `;
                
                modalBody.innerHTML = progressHTML;
                
                // Update footer
                modalFooter.innerHTML = `
                    ${this.currentStep === 2 ? '<button type="button" class="btn btn-outline" id="backBtn">Back</button>' : '<button type="button" class="btn btn-outline" id="cancelBtn">Cancel</button>'}
                    <button type="button" class="btn btn-primary" id="continueBtn" disabled>
                        ${this.currentStep === 1 ? 'Continue' : 'Confirm Donation'}
                    </button>
                `;
                
                // Re-attach event listeners
                this.attachEventListeners();
            }
            
            handleContinue() {
                if (this.currentStep === 1) {
                    this.goToStep2();
                } else {
                    // Step 2: Process donation
                    this.processDonation();
                }
            }
            
            processDonation() {
                const amount = this.customAmount || this.selectedAmount;
                
                // Save donation data
                const donationData = {
                    fundraiser: this.fundraiser,
                    amount: amount,
                    paymentMethod: this.selectedPayment,
                    donor: {
                        name: this.isAnonymous ? 'Anonymous' : this.donorName,
                        email: this.donorEmail,
                        phone: this.donorPhone,
                        message: this.donorMessage,
                        isAnonymous: this.isAnonymous
                    },
                    timestamp: new Date().toISOString()
                };
                
                localStorage.setItem('donationData', JSON.stringify(donationData));
                
                // Close donation modal
                this.close();
                
                // Show receipt modal
                setTimeout(() => {
                    new ReceiptModal(donationData);
                }, 400);
            }
            
            open() {
                this.modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                // Animate modal
                setTimeout(() => {
                    this.modal.classList.add('active');
                }, 10);
            }
            
            close() {
                this.modal.classList.remove('active');
                document.body.style.overflow = '';
                
                setTimeout(() => {
                    this.modal.style.display = 'none';
                    this.modal.remove();
                }, 300);
            }
        }

        // Receipt Modal Class
        class ReceiptModal {
            constructor(donationData) {
                this.donationData = donationData;
                this.createModal();
                this.attachEventListeners();
                this.open();
            }
            
            createModal() {
                const { amount, fundraiser, donor } = this.donationData;
                
                const modalHTML = `
                    <div class="receipt-modal" id="receiptModal">
                        <div class="modal-overlay" id="receiptOverlay"></div>
                        <div class="modal-content receipt-modal-content">
                            <div class="receipt-header">
                                <div class="receipt-icon-wrapper">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 6L9 17L4 12" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h2 class="receipt-title">Thank You for Your Donation!</h2>
                                <p class="receipt-description">
                                    Your generous contribution of 
                                    <span class="receipt-amount">${this.formatCurrency(amount)}</span> 
                                    to 
                                    <strong>${fundraiser.title}</strong> 
                                    has been processed successfully.
                                </p>
                            </div>
                            
                            <div class="receipt-body">
                                <div class="receipt-info-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <p>A receipt has been sent to your email. Your support makes a real difference!</p>
                                </div>
                                
                                <div class="receipt-share">
                                    <p class="share-label">Share your good deed</p>
                                    <div class="share-buttons">
                                        <button class="share-btn facebook" aria-label="Share on Facebook">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                                            </svg>
                                        </button>
                                        <button class="share-btn twitter" aria-label="Share on Twitter">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                                            </svg>
                                        </button>
                                        <button class="share-btn copy" aria-label="Copy link">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="receipt-footer">
                                <button type="button" class="btn btn-primary btn-done" id="doneBtn">Done</button>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.insertAdjacentHTML('beforeend', modalHTML);
                this.modal = document.getElementById('receiptModal');
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(amount);
            }
            
            attachEventListeners() {
                const doneBtn = document.getElementById('doneBtn');
                const overlay = document.getElementById('receiptOverlay');
                
                doneBtn.addEventListener('click', () => this.close());
                overlay.addEventListener('click', () => this.close());
                
                // Share buttons
                const facebookBtn = this.modal.querySelector('.share-btn.facebook');
                const twitterBtn = this.modal.querySelector('.share-btn.twitter');
                const copyBtn = this.modal.querySelector('.share-btn.copy');
                
                facebookBtn.addEventListener('click', () => this.shareOnFacebook());
                twitterBtn.addEventListener('click', () => this.shareOnTwitter());
                copyBtn.addEventListener('click', () => this.copyLink());
                
                // ESC key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.modal.style.display === 'flex') {
                        this.close();
                    }
                });
            }
            
            shareOnFacebook() {
                const { amount, fundraiser } = this.donationData;
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`I just donated ${this.formatCurrency(amount)} to ${fundraiser.title} on iKonek!`);
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
            }
            
            shareOnTwitter() {
                const { amount, fundraiser } = this.donationData;
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`I just donated ${this.formatCurrency(amount)} to ${fundraiser.title} on iKonek! #iKonek #Fundraising`);
                window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
            }
            
            copyLink() {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    const copyBtn = this.modal.querySelector('.share-btn.copy');
                    const originalHTML = copyBtn.innerHTML;
                    copyBtn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                    setTimeout(() => {
                        copyBtn.innerHTML = originalHTML;
                    }, 2000);
                });
            }
            
            open() {
                this.modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                setTimeout(() => {
                    this.modal.classList.add('active');
                }, 10);
            }
            
            close() {
                this.modal.classList.remove('active');
                document.body.style.overflow = '';
                
                setTimeout(() => {
                    this.modal.style.display = 'none';
                    this.modal.remove();
                }, 300);
            }
        }

        // Initialize fundraisers manager
        new FundraisersManager();
        
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

        // Tab functionality
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Show corresponding content
                const targetContent = document.getElementById(`${tabName}-tab`);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });

        // Start fundraiser button
        const startFundraiserBtns = document.querySelectorAll('.btn-start-fundraiser, .empty-state .btn-primary');
        startFundraiserBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                window.location.href = 'start-fundraiser-step1.html';
            });
        });
    </script>
@endsection

@push('scripts')
    <script>

        // Fundraisers data and functionality
        const fundraisersData = [
            {
                id: 1,
                title: "Hope for Typhoon Victims in Mindanao",
                organizer: "Red Cross Philippines",
                category: "Disaster Relief",
                raised: 450000,
                goal: 1000000,
                contributors: 320,
                daysLeft: 25
            },
            {
                id: 2,
                title: "Children's Cancer Fund - St. Luke's",
                organizer: "St. Luke's Foundation",
                category: "Medical Assistance",
                raised: 780000,
                goal: 1500000,
                contributors: 512,
                daysLeft: 40
            },
            {
                id: 3,
                title: "Emergency Surgery Support for Baby Angelo",
                organizer: "Santos Family",
                category: "Medical Emergency",
                raised: 125000,
                goal: 200000,
                contributors: 98,
                daysLeft: 12
            },
            {
                id: 4,
                title: "Community Health Program - Tondo Manila",
                organizer: "Gawad Kalinga",
                category: "Healthcare Access",
                raised: 240000,
                goal: 500000,
                contributors: 156,
                daysLeft: 35
            }
        ];

        class FundraisersManager {
            constructor() {
                this.container = document.getElementById('fundraisersGrid');
                this.init();
            }
            
            init() {
                if (this.container) {
                    this.renderFundraisers();
                    this.attachEventListeners();
                }
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0
                }).format(amount);
            }
            
            calculatePercentage(raised, goal) {
                return Math.min(Math.round((raised / goal) * 100), 100);
            }
            
            createFundraiserCard(fundraiser) {
                const percentage = this.calculatePercentage(fundraiser.raised, fundraiser.goal);
                
                return `
                    <div class="fundraiser-card" data-id="${fundraiser.id}">
                        <div class="fundraiser-header">
                            <div class="fundraiser-header-top">
                                <h3 class="fundraiser-title">${fundraiser.title}</h3>
                                <span class="fundraiser-category">${fundraiser.category}</span>
                            </div>
                            <p class="fundraiser-organizer">by ${fundraiser.organizer}</p>
                        </div>
                        
                        <div class="fundraiser-progress">
                            <div class="fundraiser-amounts">
                                <span class="fundraiser-raised">${this.formatCurrency(fundraiser.raised)}</span>
                                <span class="fundraiser-goal">of ${this.formatCurrency(fundraiser.goal)}</span>
                            </div>
                            
                            <div class="fundraiser-progress-bar">
                                <div class="fundraiser-progress-fill" data-percentage="${percentage}" style="width: 0%"></div>
                            </div>
                            
                            <div class="fundraiser-stats">
                                <div class="fundraiser-stat">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2"/>
                                        <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                        <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2"/>
                                        <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                    <span>${fundraiser.contributors} contributors</span>
                                </div>
                                <div class="fundraiser-stat">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <span>${fundraiser.daysLeft} days left</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="fundraiser-action">
                            <button class="btn-view-campaign" data-id="${fundraiser.id}">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                View Campaign
                            </button>
                            <button class="btn-donate" data-id="${fundraiser.id}">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                Donate Now
                            </button>
                        </div>
                    </div>
                `;
            }
            
            renderFundraisers() {
                this.container.innerHTML = fundraisersData
                    .map(fundraiser => this.createFundraiserCard(fundraiser))
                    .join('');
                
                // Animate progress bars
                setTimeout(() => {
                    document.querySelectorAll('.fundraiser-progress-fill').forEach(bar => {
                        const percentage = bar.getAttribute('data-percentage');
                        bar.style.width = `${percentage}%`;
                    });
                }, 100);
            }
            
            attachEventListeners() {
                // Donate button clicks
                this.container.addEventListener('click', (e) => {
                    const donateBtn = e.target.closest('.btn-donate');
                    if (donateBtn) {
                        const fundraiserId = donateBtn.getAttribute('data-id');
                        this.handleDonate(fundraiserId);
                    }
                    
                    // View Campaign button clicks
                    const viewBtn = e.target.closest('.btn-view-campaign');
                    if (viewBtn) {
                        const fundraiserId = viewBtn.getAttribute('data-id');
                        this.handleViewCampaign(fundraiserId);
                    }
                });
            }
            
            handleViewCampaign(fundraiserId) {
                // Redirect to view campaign page
                window.location.href = `view-campaign.html?id=${fundraiserId}`;
            }
            
            handleDonate(fundraiserId) {
                const fundraiser = fundraisersData.find(f => f.id == fundraiserId);
                if (fundraiser) {
                    // Open donation modal
                    const modal = new DonationModal(fundraiser);
                    modal.open();
                }
            }
        }

        // Donation Modal Class
        class DonationModal {
            constructor(fundraiser) {
                this.fundraiser = fundraiser;
                this.selectedAmount = null;
                this.customAmount = null;
                this.selectedPayment = null;
                this.currentStep = 1;
                this.donorName = '';
                this.donorEmail = '';
                this.donorPhone = '+63 ';
                this.donorMessage = '';
                this.isAnonymous = false;
                this.init();
            }
            
            init() {
                this.createModal();
                this.attachEventListeners();
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0
                }).format(amount);
            }
            
            calculatePercentage(raised, goal) {
                return Math.min(Math.round((raised / goal) * 100), 100);
            }
            
            createModal() {
                const percentage = this.calculatePercentage(this.fundraiser.raised, this.fundraiser.goal);
                
                const modalHTML = `
                    <div class="donation-modal" id="donationModal">
                        <div class="modal-overlay" id="modalOverlay"></div>
                        <div class="modal-content donation-modal-content">
                            <button class="modal-close" id="modalClose" aria-label="Close">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            
                            <div class="modal-header">
                                <div class="modal-title-wrapper">
                                    <img src="{{ asset('assets/icons/heart.svg') }}" alt="" class="modal-icon">
                                    <h2 class="modal-title">Make a Donation</h2>
                                </div>
                                <p class="modal-description">Support ${this.fundraiser.title}</p>
                            </div>
                            
                            <div class="modal-body">
                                <!-- Progress Steps -->
                                <div class="donation-steps">
                                    <div class="donation-step ${this.currentStep >= 1 ? 'active' : ''}">
                                        <div class="step-circle">
                                            ${this.currentStep > 1 ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>' : '1'}
                                        </div>
                                        <span class="step-label">Amount</span>
                                    </div>
                                    <div class="step-connector ${this.currentStep >= 2 ? 'active' : ''}"></div>
                                    <div class="donation-step ${this.currentStep >= 2 ? 'active' : ''}">
                                        <div class="step-circle">2</div>
                                        <span class="step-label">Details</span>
                                    </div>
                                </div>
                                
                                ${this.currentStep === 1 ? this.renderStep1(percentage) : this.renderStep2()}
                            </div>
                            
                            <div class="modal-footer">
                                ${this.currentStep === 2 ? '<button type="button" class="btn btn-outline" id="backBtn">Back</button>' : '<button type="button" class="btn btn-outline" id="cancelBtn">Cancel</button>'}
                                <button type="button" class="btn btn-primary" id="continueBtn" disabled>
                                    ${this.currentStep === 1 ? 'Continue' : 'Confirm Donation'}
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                
                // Remove existing modal if any
                const existingModal = document.getElementById('donationModal');
                if (existingModal) {
                    existingModal.remove();
                }
                
                // Add modal to body
                document.body.insertAdjacentHTML('beforeend', modalHTML);
                this.modal = document.getElementById('donationModal');
            }
            
            renderStep1(percentage) {
                return `
                    <!-- Campaign Summary -->
                    <div class="campaign-summary">
                        <div class="summary-header">
                            <p class="summary-label">Campaign</p>
                            <h3 class="summary-title">${this.fundraiser.title}</h3>
                        </div>
                        <div class="summary-progress">
                            <div class="summary-amounts">
                                <span class="summary-raised">${this.formatCurrency(this.fundraiser.raised)} raised</span>
                                <span class="summary-goal">Goal: ${this.formatCurrency(this.fundraiser.goal)}</span>
                            </div>
                            <div class="summary-progress-bar">
                                <div class="summary-progress-fill" style="width: ${percentage}%"></div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Amount Selection -->
                    <div class="form-section">
                        <label class="form-label">
                            Select Amount
                            <span class="required">*</span>
                        </label>
                        <div class="amount-grid">
                            <button type="button" class="amount-btn ${this.selectedAmount === 100 ? 'selected' : ''}" data-amount="100">₱100</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 250 ? 'selected' : ''}" data-amount="250">₱250</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 500 ? 'selected' : ''}" data-amount="500">₱500</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 1000 ? 'selected' : ''}" data-amount="1000">₱1,000</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 2500 ? 'selected' : ''}" data-amount="2500">₱2,500</button>
                            <button type="button" class="amount-btn ${this.selectedAmount === 5000 ? 'selected' : ''}" data-amount="5000">₱5,000</button>
                        </div>
                    </div>
                    
                    <!-- Custom Amount -->
                    <div class="form-section">
                        <label class="form-label">Or Enter Custom Amount</label>
                        <div class="custom-amount-wrapper">
                            <span class="currency-symbol">₱</span>
                            <input 
                                type="number" 
                                id="customAmount" 
                                class="custom-amount-input" 
                                placeholder="Enter amount"
                                min="50"
                                max="1000000"
                                value="${this.customAmount || ''}"
                            >
                        </div>
                        <p class="form-helper">Minimum: ₱50 | Maximum: ₱1,000,000</p>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="form-section">
                        <label class="form-label">
                            Payment Method
                            <span class="required">*</span>
                        </label>
                        <div class="payment-grid">
                            <button type="button" class="payment-btn ${this.selectedPayment === 'gcash' ? 'selected' : ''}" data-method="gcash">
                                <img src="{{ asset('assets/icons/phone-red.svg') }}" alt="">
                                <span>GCash</span>
                            </button>
                            <button type="button" class="payment-btn ${this.selectedPayment === 'maya' ? 'selected' : ''}" data-method="maya">
                                <img src="{{ asset('assets/icons/phone-red.svg') }}" alt="">
                                <span>Maya (PayMaya)</span>
                            </button>
                            <button type="button" class="payment-btn ${this.selectedPayment === 'card' ? 'selected' : ''}" data-method="card">
                                <img src="{{ asset('assets/icons/card-red.svg') }}" alt="">
                                <span>Credit/Debit Card</span>
                            </button>
                            <button type="button" class="payment-btn ${this.selectedPayment === 'bank' ? 'selected' : ''}" data-method="bank">
                                <img src="{{ asset('assets/icons/money-red.svg') }}" alt="">
                                <span>Bank Transfer</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Info Box -->
                    <div class="donation-info">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <p>100% of your donation goes to the fundraiser. iKonek does not charge any fees.</p>
                    </div>
                `;
            }
            
            renderStep2() {
                const amount = this.customAmount || this.selectedAmount;
                const paymentLabels = {
                    'gcash': 'GCash',
                    'maya': 'Maya (PayMaya)',
                    'card': 'Credit/Debit Card',
                    'bank': 'Bank Transfer'
                };
                
                return `
                    <!-- Donation Summary -->
                    <div class="donation-summary-card">
                        <h3 class="summary-card-title">Donation Summary</h3>
                        <div class="summary-item">
                            <span class="summary-item-label">Amount</span>
                            <span class="summary-item-value">${this.formatCurrency(amount)}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-item-label">Payment Method</span>
                            <span class="summary-item-value">${paymentLabels[this.selectedPayment]}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-item-label">Campaign</span>
                            <span class="summary-item-value">${this.fundraiser.title}</span>
                        </div>
                    </div>
                    
                    <!-- Anonymous Checkbox -->
                    <div class="form-section">
                        <label class="anonymous-checkbox">
                            <input type="checkbox" id="anonymousCheckbox" ${this.isAnonymous ? 'checked' : ''}>
                            <span class="checkbox-custom"></span>
                            <div class="checkbox-label">
                                <span class="checkbox-title">Donate Anonymously</span>
                                <span class="checkbox-description">Your name will not be shown publicly</span>
                            </div>
                        </label>
                    </div>
                    
                    <!-- Donor Details Form -->
                    <div class="form-section">
                        <label class="form-label">
                            Your Name
                            <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="donorName" 
                            class="form-input" 
                            placeholder="Enter your full name"
                            value="${this.donorName}"
                            ${this.isAnonymous ? 'disabled' : ''}
                        >
                    </div>
                    
                    <div class="form-section">
                        <label class="form-label">
                            Email
                            <span class="required">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="donorEmail" 
                            class="form-input" 
                            placeholder="example@email.com"
                            value="${this.donorEmail}"
                        >
                    </div>
                    
                    <div class="form-section">
                        <label class="form-label">
                            Phone Number
                            <span class="required">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="donorPhone" 
                            class="form-input" 
                            placeholder="+63 912 345 6789"
                            value="${this.donorPhone}"
                            maxlength="16"
                        >
                    </div>
                    
                    <div class="form-section">
                        <label class="form-label">Message (Optional)</label>
                        <textarea 
                            id="donorMessage" 
                            class="form-textarea" 
                            placeholder="Write a message of support..."
                            maxlength="500"
                            rows="4"
                        >${this.donorMessage}</textarea>
                        <p class="form-helper char-counter"><span id="charCount">${this.donorMessage.length}</span>/500 characters</p>
                    </div>
                    
                    <!-- Receipt Info Box -->
                    <div class="donation-info">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <p>You will receive a receipt via email after your donation is processed.</p>
                    </div>
                `;
            }
            
            attachEventListeners() {
                // Close modal events
                const closeBtn = document.getElementById('modalClose');
                const cancelBtn = document.getElementById('cancelBtn');
                const backBtn = document.getElementById('backBtn');
                const overlay = document.getElementById('modalOverlay');
                
                closeBtn.addEventListener('click', () => this.close());
                if (cancelBtn) {
                    cancelBtn.addEventListener('click', () => this.close());
                }
                if (backBtn) {
                    backBtn.addEventListener('click', () => this.goToStep1());
                }
                overlay.addEventListener('click', () => this.close());
                
                // ESC key to close
                const escapeHandler = (e) => {
                    if (e.key === 'Escape' && this.modal && this.modal.style.display === 'flex') {
                        this.close();
                    }
                };
                document.addEventListener('keydown', escapeHandler);
                
                if (this.currentStep === 1) {
                    this.attachStep1Listeners();
                } else {
                    this.attachStep2Listeners();
                }
                
                // Continue button
                const continueBtn = document.getElementById('continueBtn');
                continueBtn.addEventListener('click', () => this.handleContinue());
            }
            
            attachStep1Listeners() {
                // Amount selection
                document.querySelectorAll('.amount-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('selected'));
                        e.target.classList.add('selected');
                        this.selectedAmount = parseInt(e.target.getAttribute('data-amount'));
                        
                        // Clear custom amount
                        const customInput = document.getElementById('customAmount');
                        customInput.value = '';
                        this.customAmount = null;
                        
                        this.validateForm();
                    });
                });
                
                // Custom amount input
                const customInput = document.getElementById('customAmount');
                customInput.addEventListener('input', (e) => {
                    const value = parseInt(e.target.value);
                    
                    if (value >= 50) {
                        // Clear preset amounts
                        document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('selected'));
                        this.selectedAmount = null;
                        this.customAmount = value;
                    } else {
                        this.customAmount = null;
                    }
                    
                    this.validateForm();
                });
                
                // Payment method selection
                document.querySelectorAll('.payment-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        document.querySelectorAll('.payment-btn').forEach(b => b.classList.remove('selected'));
                        e.currentTarget.classList.add('selected');
                        this.selectedPayment = e.currentTarget.getAttribute('data-method');
                        this.validateForm();
                    });
                });
            }
            
            attachStep2Listeners() {
                // Anonymous checkbox
                const anonymousCheckbox = document.getElementById('anonymousCheckbox');
                const donorNameInput = document.getElementById('donorName');
                
                anonymousCheckbox.addEventListener('change', (e) => {
                    this.isAnonymous = e.target.checked;
                    if (this.isAnonymous) {
                        donorNameInput.disabled = true;
                        donorNameInput.value = '';
                        this.donorName = '';
                    } else {
                        donorNameInput.disabled = false;
                    }
                    this.validateForm();
                });
                
                // Form inputs
                donorNameInput.addEventListener('input', (e) => {
                    this.donorName = e.target.value;
                    this.validateForm();
                });
                
                const donorEmailInput = document.getElementById('donorEmail');
                donorEmailInput.addEventListener('input', (e) => {
                    this.donorEmail = e.target.value;
                    this.validateForm();
                });
                
                const donorPhoneInput = document.getElementById('donorPhone');
                donorPhoneInput.addEventListener('input', (e) => {
                    let value = e.target.value;
                    
                    // Ensure +63 prefix
                    if (!value.startsWith('+63')) {
                        value = '+63 ';
                        e.target.value = value;
                    }
                    
                    if (value.length < 4) {
                        value = '+63 ';
                        e.target.value = value;
                    }
                    
                    // Format the phone number: +63 XXX XXX XXXX
                    const numbers = value.slice(3).replace(/\D/g, '');
                    if (numbers.length > 0) {
                        let formatted = '+63 ';
                        if (numbers.length <= 3) {
                            formatted += numbers;
                        } else if (numbers.length <= 6) {
                            formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3);
                        } else {
                            formatted += numbers.slice(0, 3) + ' ' + numbers.slice(3, 6) + ' ' + numbers.slice(6, 10);
                        }
                        value = formatted;
                        e.target.value = formatted;
                    }
                    
                    this.donorPhone = value;
                    this.validateForm();
                });
                
                donorPhoneInput.addEventListener('click', (e) => {
                    if (e.target.selectionStart < 4) {
                        e.target.setSelectionRange(e.target.value.length, e.target.value.length);
                    }
                });
                
                donorPhoneInput.addEventListener('keydown', (e) => {
                    const input = e.target;
                    // Prevent deleting the +63 prefix
                    if ((e.key === 'Backspace' || e.key === 'Delete') && input.selectionStart <= 4) {
                        e.preventDefault();
                    }
                });
                
                const donorMessageInput = document.getElementById('donorMessage');
                donorMessageInput.addEventListener('input', (e) => {
                    this.donorMessage = e.target.value;
                    const charCount = document.getElementById('charCount');
                    if (charCount) {
                        charCount.textContent = e.target.value.length;
                    }
                });
            }
            
            validateForm() {
                const continueBtn = document.getElementById('continueBtn');
                
                if (this.currentStep === 1) {
                    const hasAmount = this.selectedAmount !== null || this.customAmount !== null;
                    const hasPayment = this.selectedPayment !== null;
                    continueBtn.disabled = !(hasAmount && hasPayment);
                } else {
                    // Step 2 validation
                    const hasName = this.isAnonymous || this.donorName.trim().length > 0;
                    const hasEmail = this.donorEmail.trim().length > 0 && this.validateEmail(this.donorEmail);
                    const hasPhone = this.donorPhone.length >= 13; // +63 XXX XXX XXXX (minimum valid length)
                    continueBtn.disabled = !(hasName && hasEmail && hasPhone);
                }
            }
            
            validateEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }
            
            goToStep1() {
                this.currentStep = 1;
                this.refreshModal();
            }
            
            goToStep2() {
                this.currentStep = 2;
                this.refreshModal();
            }
            
            refreshModal() {
                const percentage = this.calculatePercentage(this.fundraiser.raised, this.fundraiser.goal);
                const modalBody = document.querySelector('.modal-body');
                const modalFooter = document.querySelector('.modal-footer');
                
                // Update progress steps and body
                const progressHTML = `
                    <div class="donation-steps">
                        <div class="donation-step ${this.currentStep >= 1 ? 'active' : ''}">
                            <div class="step-circle">
                                ${this.currentStep > 1 ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>' : '1'}
                            </div>
                            <span class="step-label">Amount</span>
                        </div>
                        <div class="step-connector ${this.currentStep >= 2 ? 'active' : ''}"></div>
                        <div class="donation-step ${this.currentStep >= 2 ? 'active' : ''}">
                            <div class="step-circle">2</div>
                            <span class="step-label">Details</span>
                        </div>
                    </div>
                    ${this.currentStep === 1 ? this.renderStep1(percentage) : this.renderStep2()}
                `;
                
                modalBody.innerHTML = progressHTML;
                
                // Update footer
                modalFooter.innerHTML = `
                    ${this.currentStep === 2 ? '<button type="button" class="btn btn-outline" id="backBtn">Back</button>' : '<button type="button" class="btn btn-outline" id="cancelBtn">Cancel</button>'}
                    <button type="button" class="btn btn-primary" id="continueBtn" disabled>
                        ${this.currentStep === 1 ? 'Continue' : 'Confirm Donation'}
                    </button>
                `;
                
                // Re-attach event listeners
                this.attachEventListeners();
            }
            
            handleContinue() {
                if (this.currentStep === 1) {
                    this.goToStep2();
                } else {
                    // Step 2: Process donation
                    this.processDonation();
                }
            }
            
            processDonation() {
                const amount = this.customAmount || this.selectedAmount;
                
                // Save donation data
                const donationData = {
                    fundraiser: this.fundraiser,
                    amount: amount,
                    paymentMethod: this.selectedPayment,
                    donor: {
                        name: this.isAnonymous ? 'Anonymous' : this.donorName,
                        email: this.donorEmail,
                        phone: this.donorPhone,
                        message: this.donorMessage,
                        isAnonymous: this.isAnonymous
                    },
                    timestamp: new Date().toISOString()
                };
                
                localStorage.setItem('donationData', JSON.stringify(donationData));
                
                // Close donation modal
                this.close();
                
                // Show receipt modal
                setTimeout(() => {
                    new ReceiptModal(donationData);
                }, 400);
            }
            
            open() {
                this.modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                // Animate modal
                setTimeout(() => {
                    this.modal.classList.add('active');
                }, 10);
            }
            
            close() {
                this.modal.classList.remove('active');
                document.body.style.overflow = '';
                
                setTimeout(() => {
                    this.modal.style.display = 'none';
                    this.modal.remove();
                }, 300);
            }
        }

        // Receipt Modal Class
        class ReceiptModal {
            constructor(donationData) {
                this.donationData = donationData;
                this.createModal();
                this.attachEventListeners();
                this.open();
            }
            
            createModal() {
                const { amount, fundraiser, donor } = this.donationData;
                
                const modalHTML = `
                    <div class="receipt-modal" id="receiptModal">
                        <div class="modal-overlay" id="receiptOverlay"></div>
                        <div class="modal-content receipt-modal-content">
                            <div class="receipt-header">
                                <div class="receipt-icon-wrapper">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 6L9 17L4 12" stroke="#22C55E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <h2 class="receipt-title">Thank You for Your Donation!</h2>
                                <p class="receipt-description">
                                    Your generous contribution of 
                                    <span class="receipt-amount">${this.formatCurrency(amount)}</span> 
                                    to 
                                    <strong>${fundraiser.title}</strong> 
                                    has been processed successfully.
                                </p>
                            </div>
                            
                            <div class="receipt-body">
                                <div class="receipt-info-box">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    <p>A receipt has been sent to your email. Your support makes a real difference!</p>
                                </div>
                                
                                <div class="receipt-share">
                                    <p class="share-label">Share your good deed</p>
                                    <div class="share-buttons">
                                        <button class="share-btn facebook" aria-label="Share on Facebook">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                                            </svg>
                                        </button>
                                        <button class="share-btn twitter" aria-label="Share on Twitter">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                                            </svg>
                                        </button>
                                        <button class="share-btn copy" aria-label="Copy link">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="receipt-footer">
                                <button type="button" class="btn btn-primary btn-done" id="doneBtn">Done</button>
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.insertAdjacentHTML('beforeend', modalHTML);
                this.modal = document.getElementById('receiptModal');
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(amount);
            }
            
            attachEventListeners() {
                const doneBtn = document.getElementById('doneBtn');
                const overlay = document.getElementById('receiptOverlay');
                
                doneBtn.addEventListener('click', () => this.close());
                overlay.addEventListener('click', () => this.close());
                
                // Share buttons
                const facebookBtn = this.modal.querySelector('.share-btn.facebook');
                const twitterBtn = this.modal.querySelector('.share-btn.twitter');
                const copyBtn = this.modal.querySelector('.share-btn.copy');
                
                facebookBtn.addEventListener('click', () => this.shareOnFacebook());
                twitterBtn.addEventListener('click', () => this.shareOnTwitter());
                copyBtn.addEventListener('click', () => this.copyLink());
                
                // ESC key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.modal.style.display === 'flex') {
                        this.close();
                    }
                });
            }
            
            shareOnFacebook() {
                const { amount, fundraiser } = this.donationData;
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`I just donated ${this.formatCurrency(amount)} to ${fundraiser.title} on iKonek!`);
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
            }
            
            shareOnTwitter() {
                const { amount, fundraiser } = this.donationData;
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`I just donated ${this.formatCurrency(amount)} to ${fundraiser.title} on iKonek! #iKonek #Fundraising`);
                window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
            }
            
            copyLink() {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    const copyBtn = this.modal.querySelector('.share-btn.copy');
                    const originalHTML = copyBtn.innerHTML;
                    copyBtn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                    setTimeout(() => {
                        copyBtn.innerHTML = originalHTML;
                    }, 2000);
                });
            }
            
            open() {
                this.modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                setTimeout(() => {
                    this.modal.classList.add('active');
                }, 10);
            }
            
            close() {
                this.modal.classList.remove('active');
                document.body.style.overflow = '';
                
                setTimeout(() => {
                    this.modal.style.display = 'none';
                    this.modal.remove();
                }, 300);
            }
        }

        // Initialize fundraisers manager
        new FundraisersManager();
        
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

        // Tab functionality
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Show corresponding content
                const targetContent = document.getElementById(`${tabName}-tab`);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });

        // Start fundraiser button
        const startFundraiserBtns = document.querySelectorAll('.btn-start-fundraiser, .empty-state .btn-primary');
        startFundraiserBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                window.location.href = 'start-fundraiser-step1.html';
            });
        });
    
    </script>
@endpush
