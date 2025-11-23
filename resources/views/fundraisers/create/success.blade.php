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
        <div class="success-container">
            <!-- Celebration Animation -->
            <div class="celebration-wrapper">
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
            </div>

            <!-- Success Icon -->
            <div class="success-icon-wrapper">
                <div class="success-icon pulse">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <!-- Success Message -->
            <div class="success-header">
                <h1 class="success-title">🎉 Congratulations!</h1>
                <p class="success-subtitle">Your Fundraiser Has Been Submitted Successfully!</p>
                <p class="success-description">
                    Thank you for taking the first step to make a difference! Your fundraiser is now under review by our dedicated team. We'll carefully verify all information to ensure transparency and protect our generous donor community.
                </p>
                <div class="success-badges">
                    <div class="success-badge-item">
                        <div class="badge-icon">✅</div>
                        <span>Submitted</span>
                    </div>
                    <div class="success-badge-item">
                        <div class="badge-icon">🔒</div>
                        <span>Secure</span>
                    </div>
                    <div class="success-badge-item">
                        <div class="badge-icon">✨</div>
                        <span>Verified Soon</span>
                    </div>
                </div>
                <div class="review-timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon active">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <span class="timeline-label">Submitted</span>
                    </div>
                    <div class="timeline-connector"></div>
                    <div class="timeline-item">
                        <div class="timeline-icon">🔍</div>
                        <span class="timeline-label">Under Review</span>
                    </div>
                    <div class="timeline-connector"></div>
                    <div class="timeline-item">
                        <div class="timeline-icon">✓</div>
                        <span class="timeline-label">Approved (24-48h)</span>
                    </div>
                    <div class="timeline-connector"></div>
                    <div class="timeline-item">
                        <div class="timeline-icon">🚀</div>
                        <span class="timeline-label">Live!</span>
                    </div>
                </div>
            </div>

            <!-- Campaign Summary Card -->
            <div class="summary-card">
                <div class="summary-header">
                    <h2 class="summary-title">Campaign Summary</h2>
                    <p class="summary-subtitle">Review your fundraiser details</p>
                </div>

                <div class="summary-content">
                    <div class="summary-item">
                        <div class="summary-item-icon">
                            <img src="{{ asset('assets/icons/campaigns-card.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="summary-item-content">
                            <span class="summary-item-label">Campaign Title</span>
                            <span class="summary-item-value" id="summaryTitle">-</span>
                            <span class="summary-item-meta" id="summaryCategory">-</span>
                        </div>
                    </div>

                    <div class="summary-item">
                        <div class="summary-item-icon">
                            <img src="{{ asset('assets/icons/money-green.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="summary-item-content">
                            <span class="summary-item-label">Goal Amount</span>
                            <span class="summary-item-value" id="summaryGoal">-</span>
                        </div>
                    </div>

                    <div class="summary-item">
                        <div class="summary-item-icon">
                            <img src="{{ asset('assets/icons/calendar-red.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="summary-item-content">
                            <span class="summary-item-label">Campaign Duration</span>
                            <span class="summary-item-value" id="summaryDuration">-</span>
                        </div>
                    </div>

                    <div class="summary-item">
                        <div class="summary-item-icon">
                            <img src="{{ asset('assets/icons/people.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="summary-item-content">
                            <span class="summary-item-label">Beneficiary</span>
                            <span class="summary-item-value" id="summaryBeneficiary">-</span>
                        </div>
                    </div>

                    <div class="summary-item">
                        <div class="summary-item-icon">
                            <img src="{{ asset('assets/icons/pending-icon.svg') }}" alt="" width="20" height="20">
                        </div>
                        <div class="summary-item-content">
                            <span class="summary-item-label">Status</span>
                            <span class="status-badge status-under-review">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                    <path d="M12 6V12L16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                Under Review
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Share Section -->
            <div class="share-section">
                <div class="share-header">
                    <img src="{{ asset('assets/icons/heart.svg') }}" alt="" class="share-icon">
                    <div class="share-header-content">
                        <h3 class="share-title">Share Your Campaign</h3>
                        <p class="share-subtitle">Get the word out and start receiving support</p>
                    </div>
                </div>

                <div class="share-buttons">
                    <button class="share-btn share-btn-facebook">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                        </svg>
                        Facebook
                    </button>

                    <button class="share-btn share-btn-twitter">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="currentColor"/>
                        </svg>
                        Twitter
                    </button>

                    <button class="share-btn share-btn-copy">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="9" y="9" width="13" height="13" rx="2" ry="2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Copy Link
                    </button>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="success-actions">
                <button class="btn btn-outline btn-create-another">
                    Create Another
                </button>
                <button class="btn btn-primary btn-view-fundraisers">
                    View My Fundraisers
                </button>
            </div>
        </div>
    </main>

    <script>
        // Fundraiser Success Page
        class FundraiserSuccess {
            constructor() {
                this.init();
            }
            
            init() {
                this.loadCampaignData();
                this.attachEventListeners();
                this.animateSuccess();
            }
            
            loadCampaignData() {
                try {
                    const campaignData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Campaign Title
                    const titleElement = document.getElementById('summaryTitle');
                    if (titleElement && campaignData.title) {
                        titleElement.textContent = campaignData.title;
                    }
                    
                    // Category
                    const categoryElement = document.getElementById('summaryCategory');
                    if (categoryElement && campaignData.category) {
                        const categoryNames = {
                            'medical-emergency': 'Medical Emergency',
                            'disaster-relief': 'Disaster Relief',
                            'education-support': 'Education Support',
                            'emergency-assistance': 'Emergency Assistance'
                        };
                        categoryElement.textContent = categoryNames[campaignData.category] || campaignData.category;
                    }
                    
                    // Goal Amount
                    const goalElement = document.getElementById('summaryGoal');
                    if (goalElement && campaignData.goalAmount) {
                        goalElement.textContent = this.formatCurrency(campaignData.goalAmount);
                    }
                    
                    // Duration
                    const durationElement = document.getElementById('summaryDuration');
                    if (durationElement && campaignData.duration) {
                        durationElement.textContent = `${campaignData.duration} days`;
                    }
                    
                    // Beneficiary
                    const beneficiaryElement = document.getElementById('summaryBeneficiary');
                    if (beneficiaryElement && campaignData.beneficiary?.name) {
                        beneficiaryElement.textContent = campaignData.beneficiary.name;
                    }
                    
                    console.log('Campaign data loaded successfully');
                } catch (error) {
                    console.error('Error loading campaign data:', error);
                }
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
                // Share buttons
                const facebookBtn = document.querySelector('.share-btn-facebook');
                const twitterBtn = document.querySelector('.share-btn-twitter');
                const copyBtn = document.querySelector('.share-btn-copy');
                
                if (facebookBtn) {
                    facebookBtn.addEventListener('click', () => this.shareOnFacebook());
                }
                
                if (twitterBtn) {
                    twitterBtn.addEventListener('click', () => this.shareOnTwitter());
                }
                
                if (copyBtn) {
                    copyBtn.addEventListener('click', () => this.copyLink());
                }
                
                // Action buttons
                const createAnotherBtn = document.querySelector('.btn-create-another');
                const viewFundraisersBtn = document.querySelector('.btn-view-fundraisers');
                
                if (createAnotherBtn) {
                    createAnotherBtn.addEventListener('click', () => {
                        // Clear draft and go to step 1
                        localStorage.removeItem('fundraiserDraft');
                        window.location.href = 'start-fundraiser-step1.html';
                    });
                }
                
                if (viewFundraisersBtn) {
                    viewFundraisersBtn.addEventListener('click', () => {
                        window.location.href = 'fundraisers.html';
                    });
                }
            }
            
            shareOnFacebook() {
                const campaignData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                const url = encodeURIComponent(window.location.origin + '/fundraisers.html');
                const text = encodeURIComponent(`Please support my fundraiser: ${campaignData.title || 'My Campaign'}`);
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
            }
            
            shareOnTwitter() {
                const campaignData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                const url = encodeURIComponent(window.location.origin + '/fundraisers.html');
                const text = encodeURIComponent(`Please support my fundraiser: ${campaignData.title || 'My Campaign'} #iKonek #Fundraising`);
                window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
            }
            
            copyLink() {
                const url = window.location.origin + '/fundraisers.html';
                navigator.clipboard.writeText(url).then(() => {
                    const copyBtn = document.querySelector('.share-btn-copy');
                    const originalHTML = copyBtn.innerHTML;
                    
                    copyBtn.innerHTML = `
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Copied!
                    `;
                    
                    setTimeout(() => {
                        copyBtn.innerHTML = originalHTML;
                    }, 2000);
                }).catch(err => {
                    console.error('Failed to copy link:', err);
                    alert('Failed to copy link. Please try again.');
                });
            }
            
            animateSuccess() {
                // Animate success icon
                const successIcon = document.querySelector('.success-icon-wrapper');
                if (successIcon) {
                    setTimeout(() => {
                        successIcon.style.opacity = '1';
                        successIcon.style.transform = 'scale(1)';
                    }, 100);
                }
                
                // Animate content
                const elements = [
                    '.success-header',
                    '.summary-card',
                    '.share-section',
                    '.success-actions'
                ];
                
                elements.forEach((selector, index) => {
                    const element = document.querySelector(selector);
                    if (element) {
                        setTimeout(() => {
                            element.style.opacity = '1';
                            element.style.transform = 'translateY(0)';
                        }, 200 + (index * 100));
                    }
                });
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new FundraiserSuccess();
            });
        } else {
            new FundraiserSuccess();
        }

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

        // Fundraiser Success Page
        class FundraiserSuccess {
            constructor() {
                this.init();
            }
            
            init() {
                this.loadCampaignData();
                this.attachEventListeners();
                this.animateSuccess();
            }
            
            loadCampaignData() {
                try {
                    const campaignData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                    
                    // Campaign Title
                    const titleElement = document.getElementById('summaryTitle');
                    if (titleElement && campaignData.title) {
                        titleElement.textContent = campaignData.title;
                    }
                    
                    // Category
                    const categoryElement = document.getElementById('summaryCategory');
                    if (categoryElement && campaignData.category) {
                        const categoryNames = {
                            'medical-emergency': 'Medical Emergency',
                            'disaster-relief': 'Disaster Relief',
                            'education-support': 'Education Support',
                            'emergency-assistance': 'Emergency Assistance'
                        };
                        categoryElement.textContent = categoryNames[campaignData.category] || campaignData.category;
                    }
                    
                    // Goal Amount
                    const goalElement = document.getElementById('summaryGoal');
                    if (goalElement && campaignData.goalAmount) {
                        goalElement.textContent = this.formatCurrency(campaignData.goalAmount);
                    }
                    
                    // Duration
                    const durationElement = document.getElementById('summaryDuration');
                    if (durationElement && campaignData.duration) {
                        durationElement.textContent = `${campaignData.duration} days`;
                    }
                    
                    // Beneficiary
                    const beneficiaryElement = document.getElementById('summaryBeneficiary');
                    if (beneficiaryElement && campaignData.beneficiary?.name) {
                        beneficiaryElement.textContent = campaignData.beneficiary.name;
                    }
                    
                    console.log('Campaign data loaded successfully');
                } catch (error) {
                    console.error('Error loading campaign data:', error);
                }
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
                // Share buttons
                const facebookBtn = document.querySelector('.share-btn-facebook');
                const twitterBtn = document.querySelector('.share-btn-twitter');
                const copyBtn = document.querySelector('.share-btn-copy');
                
                if (facebookBtn) {
                    facebookBtn.addEventListener('click', () => this.shareOnFacebook());
                }
                
                if (twitterBtn) {
                    twitterBtn.addEventListener('click', () => this.shareOnTwitter());
                }
                
                if (copyBtn) {
                    copyBtn.addEventListener('click', () => this.copyLink());
                }
                
                // Action buttons
                const createAnotherBtn = document.querySelector('.btn-create-another');
                const viewFundraisersBtn = document.querySelector('.btn-view-fundraisers');
                
                if (createAnotherBtn) {
                    createAnotherBtn.addEventListener('click', () => {
                        // Clear draft and go to step 1
                        localStorage.removeItem('fundraiserDraft');
                        window.location.href = 'start-fundraiser-step1.html';
                    });
                }
                
                if (viewFundraisersBtn) {
                    viewFundraisersBtn.addEventListener('click', () => {
                        window.location.href = 'fundraisers.html';
                    });
                }
            }
            
            shareOnFacebook() {
                const campaignData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                const url = encodeURIComponent(window.location.origin + '/fundraisers.html');
                const text = encodeURIComponent(`Please support my fundraiser: ${campaignData.title || 'My Campaign'}`);
                window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}&quote=${text}`, '_blank', 'width=600,height=400');
            }
            
            shareOnTwitter() {
                const campaignData = JSON.parse(localStorage.getItem('fundraiserDraft') || '{}');
                const url = encodeURIComponent(window.location.origin + '/fundraisers.html');
                const text = encodeURIComponent(`Please support my fundraiser: ${campaignData.title || 'My Campaign'} #iKonek #Fundraising`);
                window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
            }
            
            copyLink() {
                const url = window.location.origin + '/fundraisers.html';
                navigator.clipboard.writeText(url).then(() => {
                    const copyBtn = document.querySelector('.share-btn-copy');
                    const originalHTML = copyBtn.innerHTML;
                    
                    copyBtn.innerHTML = `
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 6L9 17L4 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Copied!
                    `;
                    
                    setTimeout(() => {
                        copyBtn.innerHTML = originalHTML;
                    }, 2000);
                }).catch(err => {
                    console.error('Failed to copy link:', err);
                    alert('Failed to copy link. Please try again.');
                });
            }
            
            animateSuccess() {
                // Animate success icon
                const successIcon = document.querySelector('.success-icon-wrapper');
                if (successIcon) {
                    setTimeout(() => {
                        successIcon.style.opacity = '1';
                        successIcon.style.transform = 'scale(1)';
                    }, 100);
                }
                
                // Animate content
                const elements = [
                    '.success-header',
                    '.summary-card',
                    '.share-section',
                    '.success-actions'
                ];
                
                elements.forEach((selector, index) => {
                    const element = document.querySelector(selector);
                    if (element) {
                        setTimeout(() => {
                            element.style.opacity = '1';
                            element.style.transform = 'translateY(0)';
                        }, 200 + (index * 100));
                    }
                });
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new FundraiserSuccess();
            });
        } else {
            new FundraiserSuccess();
        }

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
