@extends('layouts.frontend')

@section('title', 'View Campaign - iKonek')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/campaigns.css') }}">
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
    <main class="dashboard-main campaign-view-main">
        <!-- Back Button -->
        <div class="campaign-back">
            <a href="{{ route('fundraisers.index') }}" class="back-link">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M12 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to Fundraisers
            </a>
        </div>

        <!-- Campaign Container -->
        <div class="campaign-container">
            <!-- Campaign Header Image -->
            <div class="campaign-image-container">
                <img src="{{ $fundraiser->featured_image ? asset('storage/' . $fundraiser->featured_image) : asset('assets/img/campaign-placeholder.jpg') }}" alt="{{ $fundraiser->title }}" class="campaign-image">
                <div class="campaign-category-badge">{{ $fundraiser->category }}</div>
            </div>

            <!-- Campaign Content Grid -->
            <div class="campaign-content-grid">
                <!-- Main Content -->
                <div class="campaign-main-content">
                    <!-- Campaign Title & Organizer -->
                    <div class="campaign-title-section">
                        <h1 class="campaign-title">{{ $fundraiser->title }}</h1>
                        <p class="campaign-organizer">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2"/>
                                <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            by <span>{{ $fundraiser->creator->name ?? $fundraiser->creator->first_name . ' ' . $fundraiser->creator->last_name }}</span>
                        </p>
                    </div>

                    <!-- Campaign Progress -->
                    <div class="campaign-progress-section">
                        <div class="campaign-amounts">
                            <div class="amount-raised">
                                <span class="amount-value">₱{{ number_format($fundraiser->current_amount, 0) }}</span>
                                <span class="amount-label">raised</span>
                            </div>
                            <div class="amount-goal">
                                <span class="amount-label">of</span>
                                <span class="amount-value">₱{{ number_format($fundraiser->goal_amount, 0) }}</span>
                            </div>
                        </div>

                        <div class="campaign-progress-bar">
                            <div class="campaign-progress-fill" style="width: {{ $fundraiser->progress_percentage }}%"></div>
                        </div>

                        <div class="campaign-stats-row">
                            <div class="campaign-stat">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2"/>
                                    <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                    <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2"/>
                                    <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2"/>
                                </svg>
                                <span><strong>{{ $fundraiser->verifiedContributions()->distinct('user_id')->count('user_id') }}</strong> contributors</span>
                            </div>
                            <div class="campaign-stat">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                <span><strong>{{ $fundraiser->days_remaining }}</strong> days left</span>
                            </div>
                        </div>
                    </div>

                    <!-- Campaign Description -->
                    <div class="campaign-description-section">
                        <h2 class="section-title">About This Campaign</h2>
                        <div class="campaign-description">
                            {!! nl2br(e($fundraiser->description)) !!}
                            @if($fundraiser->story)
                                <h3 style="margin-top: 24px; font-size: 18px; font-weight: 600;">The Story</h3>
                                {!! nl2br(e($fundraiser->story)) !!}
                            @endif
                        </div>
                    </div>

                    <!-- Recent Donations -->
                    <div class="campaign-donations-section">
                        <h2 class="section-title">Recent Donations</h2>
                        <div class="donations-list">
                            @forelse($fundraiser->verifiedContributions()->latest()->limit(10)->get() as $contribution)
                                <div class="donation-item">
                                    <div class="donation-avatar">
                                        {{ strtoupper(substr($contribution->user->first_name, 0, 1)) }}
                                    </div>
                                    <div class="donation-info">
                                        <p class="donation-donor">{{ $contribution->user->name ?? $contribution->user->first_name . ' ' . $contribution->user->last_name }}</p>
                                        <p class="donation-amount">₱{{ number_format($contribution->amount, 0) }}</p>
                                        <p class="donation-date">{{ $contribution->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-donations">
                                    <p style="text-align: center; color: #6c757d; padding: 40px 20px;">No donations yet. Be the first to support this campaign!</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="campaign-sidebar">
                    <!-- Donation Card -->
                    <div class="donation-card">
                        <h3 class="donation-card-title">Support This Campaign</h3>
                        <button class="btn btn-primary btn-donate-large" id="donateBtn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            Donate Now
                        </button>
                        
                        <div class="donation-info-box">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 16V12M12 8H12.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <p>100% of your donation goes directly to this campaign. No fees deducted.</p>
                        </div>
                    </div>

                    <!-- Organizer Card -->
                    <div class="organizer-card">
                        <h3 class="organizer-card-title">Campaign Organizer</h3>
                        <div class="organizer-info">
                            <div class="organizer-avatar">
                                {{ strtoupper(substr($fundraiser->creator->first_name, 0, 1)) }}
                            </div>
                            <div class="organizer-details">
                                <p class="organizer-name">{{ $fundraiser->creator->name ?? $fundraiser->creator->first_name . ' ' . $fundraiser->creator->last_name }}</p>
                                <p class="organizer-badge">Verified Organizer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Donation Modal -->
    @include('components.donation-modal')

    <script>
        // Fundraisers data for view-campaign page
        const fundraisersData = [
            {
                id: 1,
                title: "Hope for Typhoon Victims in Mindanao",
                organizer: "Red Cross Philippines",
                category: "Disaster Relief",
                raised: 450000,
                goal: 1000000,
                contributors: 320,
                daysLeft: 25,
                image: "../assets/img/campaign-typhoon.jpg",
                description: `
                    <p>Typhoon Odette has devastated communities across Mindanao, leaving thousands of families without homes, food, and clean water. The Red Cross Philippines is on the ground providing emergency relief, medical assistance, and shelter to those affected by this disaster.</p>
                    
                    <p>Your generous donation will help us provide:</p>
                    <ul>
                        <li>Emergency food packages for affected families</li>
                        <li>Clean water and sanitation facilities</li>
                        <li>Temporary shelter materials and blankets</li>
                        <li>Medical supplies and healthcare services</li>
                        <li>Psychosocial support for trauma victims</li>
                    </ul>
                    
                    <p>Every contribution, no matter how small, makes a significant difference in helping these communities rebuild their lives. Together, we can bring hope and relief to those who need it most.</p>
                `,
                recentDonations: [
                    { name: "Maria Santos", amount: 5000, time: "2 hours ago" },
                    { name: "Juan Dela Cruz", amount: 2500, time: "5 hours ago" },
                    { name: "Anonymous", amount: 10000, time: "1 day ago" },
                    { name: "Sofia Reyes", amount: 1000, time: "1 day ago" },
                    { name: "Miguel Torres", amount: 3000, time: "2 days ago" }
                ]
            },
            {
                id: 2,
                title: "Children's Cancer Fund - St. Luke's",
                organizer: "St. Luke's Foundation",
                category: "Medical Assistance",
                raised: 780000,
                goal: 1500000,
                contributors: 512,
                daysLeft: 40,
                image: "../assets/img/campaign-children.jpg",
                description: `
                    <p>St. Luke's Foundation is dedicated to supporting children battling cancer and providing them with access to world-class medical treatment. Our Children's Cancer Fund helps families who cannot afford the high costs of chemotherapy, radiation therapy, and other essential treatments.</p>
                    
                    <p>Your donation will directly support:</p>
                    <ul>
                        <li>Chemotherapy and radiation treatments</li>
                        <li>Surgical procedures and hospital care</li>
                        <li>Medications and medical supplies</li>
                        <li>Nutritional support during treatment</li>
                        <li>Counseling services for patients and families</li>
                    </ul>
                    
                    <p>Every child deserves a fighting chance against cancer. With your help, we can ensure that no child is denied treatment due to financial constraints. Together, we can give these brave children hope for a healthier future.</p>
                `,
                recentDonations: [
                    { name: "Carlos Mendoza", amount: 15000, time: "1 hour ago" },
                    { name: "Isabel Garcia", amount: 8000, time: "3 hours ago" },
                    { name: "Roberto Cruz", amount: 5000, time: "6 hours ago" },
                    { name: "Anonymous", amount: 20000, time: "12 hours ago" },
                    { name: "Elena Martinez", amount: 3500, time: "1 day ago" }
                ]
            },
            {
                id: 3,
                title: "Emergency Surgery Support for Baby Angelo",
                organizer: "Santos Family",
                category: "Medical Emergency",
                raised: 125000,
                goal: 200000,
                contributors: 98,
                daysLeft: 12,
                image: "../assets/img/campaign-baby.jpg",
                description: `
                    <p>Baby Angelo is a 6-month-old infant who was diagnosed with a congenital heart defect that requires urgent surgery. His parents, a young couple from Quezon City, are struggling to raise the funds needed for this life-saving operation.</p>
                    
                    <p>The surgery will cost approximately ₱200,000 and includes:</p>
                    <ul>
                        <li>Pre-operative medical tests and consultations</li>
                        <li>Open-heart surgery by a pediatric cardiac surgeon</li>
                        <li>ICU care and post-operative monitoring</li>
                        <li>Medications and medical supplies</li>
                        <li>Follow-up consultations and rehabilitation</li>
                    </ul>
                    
                    <p>Baby Angelo's condition is critical, and time is of the essence. Every donation brings us closer to giving this precious child a chance at a healthy life. Please help us save Baby Angelo's life.</p>
                `,
                recentDonations: [
                    { name: "Ana Bautista", amount: 5000, time: "30 minutes ago" },
                    { name: "Jose Ramos", amount: 2000, time: "2 hours ago" },
                    { name: "Linda Santos", amount: 3000, time: "4 hours ago" },
                    { name: "Anonymous", amount: 10000, time: "8 hours ago" },
                    { name: "Pedro Diaz", amount: 1500, time: "1 day ago" }
                ]
            },
            {
                id: 4,
                title: "Community Health Program - Tondo Manila",
                organizer: "Gawad Kalinga",
                category: "Healthcare Access",
                raised: 240000,
                goal: 500000,
                contributors: 156,
                daysLeft: 35,
                image: "../assets/img/campaign-community.jpg",
                description: `
                    <p>Gawad Kalinga is launching a comprehensive community health program in Tondo, Manila, one of the most densely populated areas in the Philippines. This program aims to provide accessible healthcare services to underserved families and improve overall community health.</p>
                    
                    <p>Your support will fund:</p>
                    <ul>
                        <li>Free medical consultations and health screenings</li>
                        <li>Immunization programs for children</li>
                        <li>Health education workshops and seminars</li>
                        <li>Basic medicines and medical supplies</li>
                        <li>Maternal and child health services</li>
                        <li>Mobile health clinics for remote areas</li>
                    </ul>
                    
                    <p>Access to healthcare is a fundamental right, yet many families in Tondo struggle to afford basic medical services. With your donation, we can bridge this gap and create a healthier, stronger community for everyone.</p>
                `,
                recentDonations: [
                    { name: "Ramon Flores", amount: 8000, time: "1 hour ago" },
                    { name: "Gloria Navarro", amount: 4000, time: "3 hours ago" },
                    { name: "Antonio Reyes", amount: 6000, time: "5 hours ago" },
                    { name: "Anonymous", amount: 15000, time: "10 hours ago" },
                    { name: "Carmen Silva", amount: 2500, time: "1 day ago" }
                ]
            }
        ];

        // Campaign View Class
        class CampaignView {
            constructor() {
                this.campaignId = this.getCampaignIdFromUrl();
                this.campaign = null;
                this.init();
            }
            
            getCampaignIdFromUrl() {
                const urlParams = new URLSearchParams(window.location.search);
                return parseInt(urlParams.get('id'));
            }
            
            init() {
                if (!this.campaignId) {
                    this.showError();
                    return;
                }
                
                this.campaign = fundraisersData.find(c => c.id === this.campaignId);
                
                if (!this.campaign) {
                    this.showError();
                    return;
                }
                
                this.renderCampaign();
                this.attachEventListeners();
            }
            
            showError() {
                window.location.href = '{{ route('fundraisers.index') }}';
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(amount);
            }
            
            calculatePercentage(raised, goal) {
                return Math.min(Math.round((raised / goal) * 100), 100);
            }
            
            getInitials(name) {
                if (name === 'Anonymous') return 'A';
                const parts = name.split(' ');
                if (parts.length >= 2) {
                    return parts[0][0] + parts[1][0];
                }
                return name[0];
            }
            
            renderCampaign() {
                document.title = `${this.campaign.title} - iKonek`;
                
                const campaignImage = document.getElementById('campaignImage');
                if (campaignImage) {
                    campaignImage.src = this.campaign.image;
                    campaignImage.alt = this.campaign.title;
                    campaignImage.onerror = function() {
                        this.src = '../assets/img/campaign-placeholder.jpg';
                    };
                }
                
                const categoryBadge = document.getElementById('campaignCategory');
                if (categoryBadge) {
                    categoryBadge.textContent = this.campaign.category;
                }
                
                const titleElement = document.getElementById('campaignTitle');
                if (titleElement) {
                    titleElement.textContent = this.campaign.title;
                }
                
                const organizerElement = document.getElementById('campaignOrganizer');
                const organizerName = document.getElementById('organizerName');
                if (organizerElement) {
                    organizerElement.textContent = this.campaign.organizer;
                }
                if (organizerName) {
                    organizerName.textContent = this.campaign.organizer;
                }
                
                const amountRaised = document.getElementById('amountRaised');
                const amountGoal = document.getElementById('amountGoal');
                if (amountRaised) {
                    amountRaised.textContent = this.formatCurrency(this.campaign.raised);
                }
                if (amountGoal) {
                    amountGoal.textContent = this.formatCurrency(this.campaign.goal);
                }
                
                const percentage = this.calculatePercentage(this.campaign.raised, this.campaign.goal);
                const progressFill = document.getElementById('progressFill');
                if (progressFill) {
                    setTimeout(() => {
                        progressFill.style.width = `${percentage}%`;
                    }, 100);
                }
                
                const contributorsCount = document.getElementById('contributorsCount');
                const daysLeft = document.getElementById('daysLeft');
                if (contributorsCount) {
                    contributorsCount.textContent = this.campaign.contributors;
                }
                if (daysLeft) {
                    daysLeft.textContent = this.campaign.daysLeft;
                }
                
                const description = document.getElementById('campaignDescription');
                if (description) {
                    description.innerHTML = this.campaign.description;
                }
                
                this.renderDonations();
            }
            
            renderDonations() {
                const donationsList = document.getElementById('donationsList');
                if (!donationsList || !this.campaign.recentDonations) return;
                
                const donationsHTML = this.campaign.recentDonations.map(donation => `
                    <div class="donation-item">
                        <div class="donation-avatar">${this.getInitials(donation.name)}</div>
                        <div class="donation-details">
                            <p class="donation-name">${donation.name}</p>
                            <p class="donation-time">${donation.time}</p>
                        </div>
                        <div class="donation-amount">${this.formatCurrency(donation.amount)}</div>
                    </div>
                `).join('');
                
                donationsList.innerHTML = donationsHTML;
            }
            
            attachEventListeners() {
                const donateBtn = document.getElementById('donateBtn');
                if (donateBtn) {
                    donateBtn.addEventListener('click', () => this.handleDonate());
                }
                
                const facebookBtn = document.querySelector('.share-btn.facebook');
                const twitterBtn = document.querySelector('.share-btn.twitter');
                const copyBtn = document.querySelector('.share-btn.copy');
                
                if (facebookBtn) {
                    facebookBtn.addEventListener('click', () => this.shareOnFacebook());
                }
                if (twitterBtn) {
                    twitterBtn.addEventListener('click', () => this.shareOnTwitter());
                }
                if (copyBtn) {
                    copyBtn.addEventListener('click', () => this.copyLink());
                }
            }
            
            handleDonate() {
                if (typeof DonationModal !== 'undefined') {
                    const modal = new DonationModal(this.campaign);
                    modal.open();
                } else {
                    window.location.href = `{{ route('fundraisers.index') }}?donate=${this.campaignId}`;
                }
            }
            
            shareOnFacebook() {
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`Help support: ${this.campaign.title}`);
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
            }
            
            shareOnTwitter() {
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`Help support: ${this.campaign.title} on iKonek! #iKonek #Fundraising`);
                window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
            }
            
            copyLink() {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    const copyBtn = document.querySelector('.share-btn.copy');
                    if (copyBtn) {
                        const originalText = copyBtn.innerHTML;
                        copyBtn.innerHTML = `
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Link Copied!</span>
                        `;
                        copyBtn.style.color = '#22C55E';
                        copyBtn.style.borderColor = '#22C55E';
                        
                        setTimeout(() => {
                            copyBtn.innerHTML = originalText;
                            copyBtn.style.color = '';
                            copyBtn.style.borderColor = '';
                        }, 2000);
                    }
                }).catch(err => {
                    console.error('Failed to copy link:', err);
                    alert('Failed to copy link. Please copy manually: ' + url);
                });
            }
        }

        // Initialize campaign view
        document.addEventListener('DOMContentLoaded', () => {
            // Pass fundraiser data from Blade to JavaScript
            const fundraiserData = @json($fundraiser);

            // Show donation modal
            function showDonationModal(campaign) {
                const modal = document.getElementById('donationModal');

                // Populate modal with campaign data
                document.getElementById('modalCampaignSubtitle').textContent = `Support ${campaign.title}`;
                document.getElementById('modalCampaignTitle').textContent = campaign.title;
                document.getElementById('modalCurrentAmount').textContent = `₱${Number(campaign.current_amount).toLocaleString()}`;
                document.getElementById('modalGoalAmount').textContent = `Goal: ₱${Number(campaign.goal_amount).toLocaleString()}`;
                document.getElementById('modalProgressBar').style.width = `${(campaign.current_amount / campaign.goal_amount * 100)}%`;

                // Show modal
                modal.style.display = 'flex';

                // Setup event listeners (only once)
                if (!modal.dataset.initialized) {
                    setupDonationModalListeners();
                    modal.dataset.initialized = 'true';
                }
            }

            // Close donation modal
            function closeDonationModal() {
                document.getElementById('donationModal').style.display = 'none';
            }

            // Setup modal event listeners
            function setupDonationModalListeners() {
                // Amount button clicks
                document.querySelectorAll('.amount-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.querySelectorAll('.amount-btn').forEach(b => {
                            b.style.borderColor = '#e0e0e0';
                            b.style.background = 'white';
                            b.style.color = '#1D3557';
                        });
                        this.style.borderColor = '#E63946';
                        this.style.background = 'rgba(230, 57, 70, 0.05)';
                        this.style.color = '#E63946';
                        document.getElementById('customAmount').value = '';
                    });
                });

                // Payment method clicks
                document.querySelectorAll('.payment-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.querySelectorAll('.payment-btn').forEach(b => {
                            b.style.borderColor = '#e0e0e0';
                            b.style.background = 'white';
                        });
                        this.style.borderColor = '#E63946';
                        this.style.background = 'rgba(230, 57, 70, 0.05)';
                    });
                });

                // Close button (X) click
                document.getElementById('closeDonationModalBtn').addEventListener('click', () => {
                    closeDonationModal();
                });

                // Cancel button click
                document.getElementById('cancelDonationBtn').addEventListener('click', () => {
                    closeDonationModal();
                });

                // Proceed button
                document.getElementById('proceedDonation').addEventListener('click', () => {
                    const selectedAmount = document.querySelector('.amount-btn[style*="rgb(230, 57, 70)"]')?.dataset.amount
                        || document.getElementById('customAmount').value;
                    const selectedPayment = document.querySelector('.payment-btn[style*="rgb(230, 57, 70)"]')?.dataset.method;

                    if (!selectedAmount || selectedAmount < 50) {
                        alert('Please select or enter a valid amount (minimum ₱50)');
                        return;
                    }
                    if (!selectedPayment) {
                        alert('Please select a payment method');
                        return;
                    }

                    alert(`Processing ₱${Number(selectedAmount).toLocaleString()} donation via ${selectedPayment.toUpperCase()}\n\nPayment gateway integration coming soon!`);
                    closeDonationModal();
                });
            }

            // Handle donate button click
            const donateBtn = document.getElementById('donateBtn');
            if (donateBtn) {
                donateBtn.addEventListener('click', () => {
                    showDonationModal(fundraiserData);
                });
            }
        });

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

@push('scripts')
    <script>

        // Fundraisers data for view-campaign page
        const fundraisersData = [
            {
                id: 1,
                title: "Hope for Typhoon Victims in Mindanao",
                organizer: "Red Cross Philippines",
                category: "Disaster Relief",
                raised: 450000,
                goal: 1000000,
                contributors: 320,
                daysLeft: 25,
                image: "../assets/img/campaign-typhoon.jpg",
                description: `
                    <p>Typhoon Odette has devastated communities across Mindanao, leaving thousands of families without homes, food, and clean water. The Red Cross Philippines is on the ground providing emergency relief, medical assistance, and shelter to those affected by this disaster.</p>
                    
                    <p>Your generous donation will help us provide:</p>
                    <ul>
                        <li>Emergency food packages for affected families</li>
                        <li>Clean water and sanitation facilities</li>
                        <li>Temporary shelter materials and blankets</li>
                        <li>Medical supplies and healthcare services</li>
                        <li>Psychosocial support for trauma victims</li>
                    </ul>
                    
                    <p>Every contribution, no matter how small, makes a significant difference in helping these communities rebuild their lives. Together, we can bring hope and relief to those who need it most.</p>
                `,
                recentDonations: [
                    { name: "Maria Santos", amount: 5000, time: "2 hours ago" },
                    { name: "Juan Dela Cruz", amount: 2500, time: "5 hours ago" },
                    { name: "Anonymous", amount: 10000, time: "1 day ago" },
                    { name: "Sofia Reyes", amount: 1000, time: "1 day ago" },
                    { name: "Miguel Torres", amount: 3000, time: "2 days ago" }
                ]
            },
            {
                id: 2,
                title: "Children's Cancer Fund - St. Luke's",
                organizer: "St. Luke's Foundation",
                category: "Medical Assistance",
                raised: 780000,
                goal: 1500000,
                contributors: 512,
                daysLeft: 40,
                image: "../assets/img/campaign-children.jpg",
                description: `
                    <p>St. Luke's Foundation is dedicated to supporting children battling cancer and providing them with access to world-class medical treatment. Our Children's Cancer Fund helps families who cannot afford the high costs of chemotherapy, radiation therapy, and other essential treatments.</p>
                    
                    <p>Your donation will directly support:</p>
                    <ul>
                        <li>Chemotherapy and radiation treatments</li>
                        <li>Surgical procedures and hospital care</li>
                        <li>Medications and medical supplies</li>
                        <li>Nutritional support during treatment</li>
                        <li>Counseling services for patients and families</li>
                    </ul>
                    
                    <p>Every child deserves a fighting chance against cancer. With your help, we can ensure that no child is denied treatment due to financial constraints. Together, we can give these brave children hope for a healthier future.</p>
                `,
                recentDonations: [
                    { name: "Carlos Mendoza", amount: 15000, time: "1 hour ago" },
                    { name: "Isabel Garcia", amount: 8000, time: "3 hours ago" },
                    { name: "Roberto Cruz", amount: 5000, time: "6 hours ago" },
                    { name: "Anonymous", amount: 20000, time: "12 hours ago" },
                    { name: "Elena Martinez", amount: 3500, time: "1 day ago" }
                ]
            },
            {
                id: 3,
                title: "Emergency Surgery Support for Baby Angelo",
                organizer: "Santos Family",
                category: "Medical Emergency",
                raised: 125000,
                goal: 200000,
                contributors: 98,
                daysLeft: 12,
                image: "../assets/img/campaign-baby.jpg",
                description: `
                    <p>Baby Angelo is a 6-month-old infant who was diagnosed with a congenital heart defect that requires urgent surgery. His parents, a young couple from Quezon City, are struggling to raise the funds needed for this life-saving operation.</p>
                    
                    <p>The surgery will cost approximately ₱200,000 and includes:</p>
                    <ul>
                        <li>Pre-operative medical tests and consultations</li>
                        <li>Open-heart surgery by a pediatric cardiac surgeon</li>
                        <li>ICU care and post-operative monitoring</li>
                        <li>Medications and medical supplies</li>
                        <li>Follow-up consultations and rehabilitation</li>
                    </ul>
                    
                    <p>Baby Angelo's condition is critical, and time is of the essence. Every donation brings us closer to giving this precious child a chance at a healthy life. Please help us save Baby Angelo's life.</p>
                `,
                recentDonations: [
                    { name: "Ana Bautista", amount: 5000, time: "30 minutes ago" },
                    { name: "Jose Ramos", amount: 2000, time: "2 hours ago" },
                    { name: "Linda Santos", amount: 3000, time: "4 hours ago" },
                    { name: "Anonymous", amount: 10000, time: "8 hours ago" },
                    { name: "Pedro Diaz", amount: 1500, time: "1 day ago" }
                ]
            },
            {
                id: 4,
                title: "Community Health Program - Tondo Manila",
                organizer: "Gawad Kalinga",
                category: "Healthcare Access",
                raised: 240000,
                goal: 500000,
                contributors: 156,
                daysLeft: 35,
                image: "../assets/img/campaign-community.jpg",
                description: `
                    <p>Gawad Kalinga is launching a comprehensive community health program in Tondo, Manila, one of the most densely populated areas in the Philippines. This program aims to provide accessible healthcare services to underserved families and improve overall community health.</p>
                    
                    <p>Your support will fund:</p>
                    <ul>
                        <li>Free medical consultations and health screenings</li>
                        <li>Immunization programs for children</li>
                        <li>Health education workshops and seminars</li>
                        <li>Basic medicines and medical supplies</li>
                        <li>Maternal and child health services</li>
                        <li>Mobile health clinics for remote areas</li>
                    </ul>
                    
                    <p>Access to healthcare is a fundamental right, yet many families in Tondo struggle to afford basic medical services. With your donation, we can bridge this gap and create a healthier, stronger community for everyone.</p>
                `,
                recentDonations: [
                    { name: "Ramon Flores", amount: 8000, time: "1 hour ago" },
                    { name: "Gloria Navarro", amount: 4000, time: "3 hours ago" },
                    { name: "Antonio Reyes", amount: 6000, time: "5 hours ago" },
                    { name: "Anonymous", amount: 15000, time: "10 hours ago" },
                    { name: "Carmen Silva", amount: 2500, time: "1 day ago" }
                ]
            }
        ];

        // Campaign View Class
        class CampaignView {
            constructor() {
                this.campaignId = this.getCampaignIdFromUrl();
                this.campaign = null;
                this.init();
            }
            
            getCampaignIdFromUrl() {
                const urlParams = new URLSearchParams(window.location.search);
                return parseInt(urlParams.get('id'));
            }
            
            init() {
                if (!this.campaignId) {
                    this.showError();
                    return;
                }
                
                this.campaign = fundraisersData.find(c => c.id === this.campaignId);
                
                if (!this.campaign) {
                    this.showError();
                    return;
                }
                
                this.renderCampaign();
                this.attachEventListeners();
            }
            
            showError() {
                window.location.href = '{{ route('fundraisers.index') }}';
            }
            
            formatCurrency(amount) {
                return new Intl.NumberFormat('en-PH', {
                    style: 'currency',
                    currency: 'PHP',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(amount);
            }
            
            calculatePercentage(raised, goal) {
                return Math.min(Math.round((raised / goal) * 100), 100);
            }
            
            getInitials(name) {
                if (name === 'Anonymous') return 'A';
                const parts = name.split(' ');
                if (parts.length >= 2) {
                    return parts[0][0] + parts[1][0];
                }
                return name[0];
            }
            
            renderCampaign() {
                document.title = `${this.campaign.title} - iKonek`;
                
                const campaignImage = document.getElementById('campaignImage');
                if (campaignImage) {
                    campaignImage.src = this.campaign.image;
                    campaignImage.alt = this.campaign.title;
                    campaignImage.onerror = function() {
                        this.src = '../assets/img/campaign-placeholder.jpg';
                    };
                }
                
                const categoryBadge = document.getElementById('campaignCategory');
                if (categoryBadge) {
                    categoryBadge.textContent = this.campaign.category;
                }
                
                const titleElement = document.getElementById('campaignTitle');
                if (titleElement) {
                    titleElement.textContent = this.campaign.title;
                }
                
                const organizerElement = document.getElementById('campaignOrganizer');
                const organizerName = document.getElementById('organizerName');
                if (organizerElement) {
                    organizerElement.textContent = this.campaign.organizer;
                }
                if (organizerName) {
                    organizerName.textContent = this.campaign.organizer;
                }
                
                const amountRaised = document.getElementById('amountRaised');
                const amountGoal = document.getElementById('amountGoal');
                if (amountRaised) {
                    amountRaised.textContent = this.formatCurrency(this.campaign.raised);
                }
                if (amountGoal) {
                    amountGoal.textContent = this.formatCurrency(this.campaign.goal);
                }
                
                const percentage = this.calculatePercentage(this.campaign.raised, this.campaign.goal);
                const progressFill = document.getElementById('progressFill');
                if (progressFill) {
                    setTimeout(() => {
                        progressFill.style.width = `${percentage}%`;
                    }, 100);
                }
                
                const contributorsCount = document.getElementById('contributorsCount');
                const daysLeft = document.getElementById('daysLeft');
                if (contributorsCount) {
                    contributorsCount.textContent = this.campaign.contributors;
                }
                if (daysLeft) {
                    daysLeft.textContent = this.campaign.daysLeft;
                }
                
                const description = document.getElementById('campaignDescription');
                if (description) {
                    description.innerHTML = this.campaign.description;
                }
                
                this.renderDonations();
            }
            
            renderDonations() {
                const donationsList = document.getElementById('donationsList');
                if (!donationsList || !this.campaign.recentDonations) return;
                
                const donationsHTML = this.campaign.recentDonations.map(donation => `
                    <div class="donation-item">
                        <div class="donation-avatar">${this.getInitials(donation.name)}</div>
                        <div class="donation-details">
                            <p class="donation-name">${donation.name}</p>
                            <p class="donation-time">${donation.time}</p>
                        </div>
                        <div class="donation-amount">${this.formatCurrency(donation.amount)}</div>
                    </div>
                `).join('');
                
                donationsList.innerHTML = donationsHTML;
            }
            
            attachEventListeners() {
                const donateBtn = document.getElementById('donateBtn');
                if (donateBtn) {
                    donateBtn.addEventListener('click', () => this.handleDonate());
                }
                
                const facebookBtn = document.querySelector('.share-btn.facebook');
                const twitterBtn = document.querySelector('.share-btn.twitter');
                const copyBtn = document.querySelector('.share-btn.copy');
                
                if (facebookBtn) {
                    facebookBtn.addEventListener('click', () => this.shareOnFacebook());
                }
                if (twitterBtn) {
                    twitterBtn.addEventListener('click', () => this.shareOnTwitter());
                }
                if (copyBtn) {
                    copyBtn.addEventListener('click', () => this.copyLink());
                }
            }
            
            handleDonate() {
                if (typeof DonationModal !== 'undefined') {
                    const modal = new DonationModal(this.campaign);
                    modal.open();
                } else {
                    window.location.href = `{{ route('fundraisers.index') }}?donate=${this.campaignId}`;
                }
            }
            
            shareOnFacebook() {
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`Help support: ${this.campaign.title}`);
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
            }
            
            shareOnTwitter() {
                const url = encodeURIComponent(window.location.href);
                const text = encodeURIComponent(`Help support: ${this.campaign.title} on iKonek! #iKonek #Fundraising`);
                window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
            }
            
            copyLink() {
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    const copyBtn = document.querySelector('.share-btn.copy');
                    if (copyBtn) {
                        const originalText = copyBtn.innerHTML;
                        copyBtn.innerHTML = `
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Link Copied!</span>
                        `;
                        copyBtn.style.color = '#22C55E';
                        copyBtn.style.borderColor = '#22C55E';
                        
                        setTimeout(() => {
                            copyBtn.innerHTML = originalText;
                            copyBtn.style.color = '';
                            copyBtn.style.borderColor = '';
                        }, 2000);
                    }
                }).catch(err => {
                    console.error('Failed to copy link:', err);
                    alert('Failed to copy link. Please copy manually: ' + url);
                });
            }
        }

        // Initialize campaign view
        document.addEventListener('DOMContentLoaded', () => {
            // Pass fundraiser data from Blade to JavaScript
            const fundraiserData = @json($fundraiser);

            // Show donation modal
            function showDonationModal(campaign) {
                const modal = document.getElementById('donationModal');

                // Populate modal with campaign data
                document.getElementById('modalCampaignSubtitle').textContent = `Support ${campaign.title}`;
                document.getElementById('modalCampaignTitle').textContent = campaign.title;
                document.getElementById('modalCurrentAmount').textContent = `₱${Number(campaign.current_amount).toLocaleString()}`;
                document.getElementById('modalGoalAmount').textContent = `Goal: ₱${Number(campaign.goal_amount).toLocaleString()}`;
                document.getElementById('modalProgressBar').style.width = `${(campaign.current_amount / campaign.goal_amount * 100)}%`;

                // Show modal
                modal.style.display = 'flex';

                // Setup event listeners (only once)
                if (!modal.dataset.initialized) {
                    setupDonationModalListeners();
                    modal.dataset.initialized = 'true';
                }
            }

            // Close donation modal
            function closeDonationModal() {
                document.getElementById('donationModal').style.display = 'none';
            }

            // Setup modal event listeners
            function setupDonationModalListeners() {
                // Amount button clicks
                document.querySelectorAll('.amount-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.querySelectorAll('.amount-btn').forEach(b => {
                            b.style.borderColor = '#e0e0e0';
                            b.style.background = 'white';
                            b.style.color = '#1D3557';
                        });
                        this.style.borderColor = '#E63946';
                        this.style.background = 'rgba(230, 57, 70, 0.05)';
                        this.style.color = '#E63946';
                        document.getElementById('customAmount').value = '';
                    });
                });

                // Payment method clicks
                document.querySelectorAll('.payment-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        document.querySelectorAll('.payment-btn').forEach(b => {
                            b.style.borderColor = '#e0e0e0';
                            b.style.background = 'white';
                        });
                        this.style.borderColor = '#E63946';
                        this.style.background = 'rgba(230, 57, 70, 0.05)';
                    });
                });

                // Close button (X) click
                document.getElementById('closeDonationModalBtn').addEventListener('click', () => {
                    closeDonationModal();
                });

                // Cancel button click
                document.getElementById('cancelDonationBtn').addEventListener('click', () => {
                    closeDonationModal();
                });

                // Proceed button
                document.getElementById('proceedDonation').addEventListener('click', () => {
                    const selectedAmount = document.querySelector('.amount-btn[style*="rgb(230, 57, 70)"]')?.dataset.amount
                        || document.getElementById('customAmount').value;
                    const selectedPayment = document.querySelector('.payment-btn[style*="rgb(230, 57, 70)"]')?.dataset.method;

                    if (!selectedAmount || selectedAmount < 50) {
                        alert('Please select or enter a valid amount (minimum ₱50)');
                        return;
                    }
                    if (!selectedPayment) {
                        alert('Please select a payment method');
                        return;
                    }

                    alert(`Processing ₱${Number(selectedAmount).toLocaleString()} donation via ${selectedPayment.toUpperCase()}\n\nPayment gateway integration coming soon!`);
                    closeDonationModal();
                });
            }

            // Handle donate button click
            const donateBtn = document.getElementById('donateBtn');
            if (donateBtn) {
                donateBtn.addEventListener('click', () => {
                    showDonationModal(fundraiserData);
                });
            }
        });

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
@endpush
