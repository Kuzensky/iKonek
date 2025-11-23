@extends('layouts.frontend')

@section('title', 'iKonek - Connecting Communities, Saving Lives')
@section('meta-description', 'iKonek - Every Drop Counts. Every Click Matters. Connect communities and save lives through blood donation and humanitarian campaigns.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/components/navigation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/hero.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/stats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/how-it-works.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/campaigns.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/hospitals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/cards.css') }}">
@endpush

@section('content')
    @include('partials.navigation')

    <!-- Hero Section -->
    <section class="hero" id="hero" role="banner" aria-label="Main hero section">
        <div class="hero-background" aria-hidden="true">
            <div class="organic-shape shape-1"></div>
            <div class="organic-shape shape-2"></div>
            <div class="organic-shape shape-3"></div>
            <div class="organic-shape shape-4"></div>
            <div class="organic-shape shape-5"></div>
            <div class="organic-shape shape-6"></div>
        </div>

        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <!-- Trust Badge -->
                    <div class="hero-badge" role="status">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z" fill="#E63946"/>
                            <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span><strong>DOH Verified</strong> • Trusted by 10,000+ Filipinos</span>
                    </div>

                    <h1 class="hero-title">
                        <span class="hero-title-eyebrow">Welcome to</span>
                        <span class="hero-title-main">
                            <span class="hero-title-brand"><span style="color: var(--color-primary);">i</span>Konek</span>
                        </span>
                        <span class="hero-title-tagline">
                            <span class="tagline-highlight">Every Drop Counts.</span>
                            <span class="tagline-normal">Every Click Saves Lives.</span>
                        </span>
                    </h1>

                    <p class="hero-description">
                        The Philippines' most trusted platform connecting donors with hospitals and humanitarian causes.
                        <strong>Schedule blood donations, support medical campaigns, and track your life-saving impact</strong>—all in one secure platform.
                    </p>

                    <!-- Value Propositions -->
                    <div class="hero-features">
                        <div class="feature-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M20 6L9 17l-5-5" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Book in 2 minutes</span>
                        </div>
                        <div class="feature-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M20 6L9 17l-5-5" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>150+ Verified Hospitals</span>
                        </div>
                        <div class="feature-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M20 6L9 17l-5-5" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>100% Free & Secure</span>
                        </div>
                    </div>

                    <!-- Call to Actions -->
                    <div class="hero-cta">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-lg btn-cta-primary" aria-label="Start donating blood - Sign up now">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                            <div class="btn-content">
                                <span class="btn-text-main">Start Saving Lives</span>
                                <span class="btn-text-sub">Free Sign Up • No Credit Card</span>
                            </div>
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline btn-lg btn-cta-secondary" aria-label="Login to existing account">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4M10 17l5-5-5-5M15 12H3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>I'm Already a Donor</span>
                        </a>
                    </div>

                    <!-- Social Proof Stats -->
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-icon-wrapper">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="9" cy="7" r="4" stroke="#E63946" stroke-width="2"/>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="stat-content">
                                <div class="stat-value">10,000+</div>
                                <div class="stat-label">Active Donors</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon-wrapper">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                </svg>
                            </div>
                            <div class="stat-content">
                                <div class="stat-value">25,000+</div>
                                <div class="stat-label">Lives Saved</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon-wrapper">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <polyline points="9 22 9 12 15 12 15 22" stroke="#E63946" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="stat-content">
                                <div class="stat-value">150+</div>
                                <div class="stat-label">Partner Hospitals</div>
                            </div>
                        </div>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="hero-trust-indicators">
                        <div class="trust-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="#28A745" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>SSL Encrypted</span>
                        </div>
                        <div class="trust-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="#28A745" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>Data Privacy Act Compliant</span>
                        </div>
                        <div class="trust-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="#28A745" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>24/7 Support Available</span>
                        </div>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="hero-image-container">
                        <img src="{{ asset('assets/img/hero-image.png') }}" alt="Illustration showing people donating blood at a medical facility" class="hero-image">
                    </div>

                    <!-- Floating Cards with Real-time Updates -->
                    <div class="hero-card card-appointment" role="complementary" aria-label="Next available appointment">
                        <div class="card-icon icon-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="3" y="4" width="18" height="18" rx="2" stroke="#E63946" stroke-width="2"/>
                                <line x1="16" y1="2" x2="16" y2="6" stroke="#E63946" stroke-width="2" stroke-linecap="round"/>
                                <line x1="8" y1="2" x2="8" y2="6" stroke="#E63946" stroke-width="2" stroke-linecap="round"/>
                                <line x1="3" y1="10" x2="21" y2="10" stroke="#E63946" stroke-width="2"/>
                            </svg>
                            <div class="card-pulse"></div>
                        </div>
                        <div class="card-content">
                            <div class="card-label">Next Available Slot</div>
                            <div class="card-value">Today, 2:00 PM</div>
                            <div class="card-badge">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="#28A745">
                                    <circle cx="12" cy="12" r="10"/>
                                </svg>
                                <span>3 spots left</span>
                            </div>
                        </div>
                    </div>

                    <div class="hero-card card-campaigns" role="complementary" aria-label="Active campaigns information">
                        <div class="card-icon icon-secondary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" stroke="#1D3557" stroke-width="2"/>
                            </svg>
                            <div class="card-pulse"></div>
                        </div>
                        <div class="card-content">
                            <div class="card-label">Active Campaigns</div>
                            <div class="card-value">23 Fundraisers</div>
                            <div class="card-badge urgent">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="#FFC107">
                                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                                </svg>
                                <span>5 urgent</span>
                            </div>
                        </div>
                    </div>

                    <!-- New Impact Card -->
                    <div class="hero-card card-impact" role="complementary" aria-label="Total impact statistics">
                        <div class="card-icon icon-success">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" stroke="#28A745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="card-content">
                            <div class="card-label">This Month</div>
                            <div class="card-value">₱2.3M Raised</div>
                            <div class="card-trend">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                    <polyline points="18 15 12 9 6 15" stroke="#28A745" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>+23% from last month</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trusted Organizations Marquee -->
        <div class="trusted-by">
            <div class="trusted-by-card">
                <div class="trusted-header">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5z" fill="#E63946"/>
                        <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <p class="trusted-label">Trusted by <strong>150+ leading healthcare institutions</strong> nationwide</p>
                </div>
                <div class="trusted-logos-wrapper">
                    <div class="trusted-logos" aria-label="Scrolling list of partner organizations">
                        <span class="logo-item">Red Cross Philippines</span>
                        <span class="logo-item">Philippine General Hospital</span>
                        <span class="logo-item">Philippine Heart Center</span>
                        <span class="logo-item">DOH Blood Services</span>
                        <span class="logo-item">St. Luke's Medical Center</span>
                        <span class="logo-item">Makati Medical Center</span>
                        <span class="logo-item">The Medical City</span>
                        <span class="logo-item">Veterans Memorial Medical Center</span>
                        <span class="logo-item">National Kidney Institute</span>
                        <span class="logo-item">Lung Center of the Philippines</span>
                        <!-- Duplicate for seamless loop -->
                        <span class="logo-item">Red Cross Philippines</span>
                        <span class="logo-item">Philippine General Hospital</span>
                        <span class="logo-item">Philippine Heart Center</span>
                        <span class="logo-item">DOH Blood Services</span>
                        <span class="logo-item">St. Luke's Medical Center</span>
                        <span class="logo-item">Makati Medical Center</span>
                        <span class="logo-item">The Medical City</span>
                        <span class="logo-item">Veterans Memorial Medical Center</span>
                        <span class="logo-item">National Kidney Institute</span>
                        <span class="logo-item">Lung Center of the Philippines</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">How iKonek Works</h2>
                <p class="section-description">
                    Making a difference is just four simple steps away. Start your journey to saving lives today.
                </p>
            </div>

            <div class="steps-container">
                <div class="step-wrapper">
                    <div class="step-card">
                        <div class="step-icon icon-red">
                            <img src="{{ asset('assets/icons/search.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="step-content">
                            <div class="step-number">Step 1</div>
                            <h3 class="step-title">Find a Hospital</h3>
                            <p class="step-description">
                                Browse our network of partner hospitals and blood donation centers across the Philippines.
                            </p>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <div class="step-wrapper">
                    <div class="step-card">
                        <div class="step-icon icon-navy">
                            <img src="{{ asset('assets/icons/schedule.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="step-content">
                            <div class="step-number">Step 2</div>
                            <h3 class="step-title">Schedule Appointment</h3>
                            <p class="step-description">
                                Pick a convenient date and time slot that works best for your schedule.
                            </p>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <div class="step-wrapper">
                    <div class="step-card">
                        <div class="step-icon icon-red">
                            <img src="{{ asset('assets/icons/blood-bag.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="step-content">
                            <div class="step-number">Step 3</div>
                            <h3 class="step-title">Donate & Save Lives</h3>
                            <p class="step-description">
                                Visit the hospital and make your life-saving donation. Every drop counts!
                            </p>
                        </div>
                    </div>
                    <div class="step-connector"></div>
                </div>

                <div class="step-wrapper">
                    <div class="step-card">
                        <div class="step-icon icon-navy">
                            <img src="{{ asset('assets/icons/tracking.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="step-content">
                            <div class="step-number">Step 4</div>
                            <h3 class="step-title">Track Your Impact</h3>
                            <p class="step-description">
                                Receive updates on how your donation is making a difference in your community.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Campaigns Section -->
    <section class="campaigns" id="campaigns">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Featured Campaigns</h2>
                <p class="section-description">
                    Join thousands of Filipinos making a difference. Support these urgent medical fundraising campaigns and help save lives in our community.
                </p>
            </div>

            <div class="campaigns-grid" id="campaignsGrid">
                <!-- Campaign cards will be dynamically inserted here -->
            </div>

            <div class="section-footer">
                <button class="btn btn-outline-secondary">View All Campaigns</button>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="section-header">
                <div class="about-badge">
                    <img src="{{ asset('assets/icons/heart.svg') }}" alt="" class="badge-icon" width="16" height="16">
                    <span>Building a Healthier Philippines</span>
                </div>
                <h2 class="section-title">About <span style="color: var(--color-primary);">i</span>Konek</h2>
                <p class="section-description">
                    More than a platform—we're a movement connecting communities and transforming lives across the Philippines.
                </p>
            </div>

            <div class="about-hero">
                <div class="about-hero-content">
                    <h3 class="about-main-title">
                        Bridging the gap between <span class="highlight-text">those who can help</span> and <span class="highlight-text">those who need it</span>
                    </h3>
                    <p class="about-lead-text">
                        Born from a vision of making healthcare support accessible to every Filipino, iKonek has become the nation's trusted digital bridge for blood donation and humanitarian causes.
                    </p>
                </div>
            </div>

            <div class="about-impact">
                <div class="impact-card">
                    <div class="impact-icon icon-red">
                        <img src="{{ asset('assets/icons/donor.svg') }}" alt="" width="32" height="32">
                    </div>
                    <div class="impact-content">
                        <div class="impact-value">10,000+</div>
                        <div class="impact-label">Active Filipino Donors</div>
                        <p class="impact-description">Growing community of life-savers</p>
                    </div>
                </div>

                <div class="impact-card">
                    <div class="impact-icon icon-navy">
                        <img src="{{ asset('assets/icons/hospital.svg') }}" alt="" width="32" height="32">
                    </div>
                    <div class="impact-content">
                        <div class="impact-value">150+</div>
                        <div class="impact-label">Partner Hospitals</div>
                        <p class="impact-description">Nationwide network of trusted facilities</p>
                    </div>
                </div>

                <div class="impact-card">
                    <div class="impact-icon icon-red">
                        <img src="{{ asset('assets/icons/heart.svg') }}" alt="" width="32" height="32">
                    </div>
                    <div class="impact-content">
                        <div class="impact-value">₱50M+</div>
                        <div class="impact-label">Raised for Medical Causes</div>
                        <p class="impact-description">Direct impact on Filipino families</p>
                    </div>
                </div>
            </div>

            <div class="about-mission">
                <div class="mission-content">
                    <h3 class="mission-title">Our Mission</h3>
                    <p class="mission-text">
                        We're revolutionizing healthcare support in the Philippines by creating a seamless digital experience that connects donors with hospitals and humanitarian campaigns. Through innovative technology and strategic partnerships across Metro Manila, Cebu, Davao, and beyond, we're building a nationwide network of compassion where every Filipino can make a tangible difference with just a few clicks.
                    </p>
                    <div class="mission-cta">
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            <img src="{{ asset('assets/icons/heart.svg') }}" alt="" width="20" height="20">
                            Join Our Mission
                        </a>
                        <button class="btn btn-outline-secondary">Learn More</button>
                    </div>
                </div>
            </div>

            <div class="about-values">
                <h3 class="values-heading">Our Core Values</h3>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon icon-red">
                            <img src="{{ asset('assets/icons/heart.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Empathy First</h4>
                            <p class="value-description">
                                Every life matters. Every contribution counts. We put compassion at the heart of everything we do to build a healthier Philippines.
                            </p>
                        </div>
                    </div>

                    <div class="value-card">
                        <div class="value-icon icon-navy">
                            <img src="{{ asset('assets/icons/community.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Community Driven</h4>
                            <p class="value-description">
                                Connecting Filipinos from Luzon to Mindanao, creating a powerful network of support that transcends boundaries.
                            </p>
                        </div>
                    </div>

                    <div class="value-card">
                        <div class="value-icon icon-red">
                            <img src="{{ asset('assets/icons/target.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Mission Focused</h4>
                            <p class="value-description">
                                Laser-focused on eliminating barriers in blood donation and humanitarian fundraising through technology and innovation.
                            </p>
                        </div>
                    </div>

                    <div class="value-card">
                        <div class="value-icon icon-navy">
                            <img src="{{ asset('assets/icons/shield.svg') }}" alt="" width="28" height="28">
                        </div>
                        <div class="value-content">
                            <h4 class="value-title">Trust & Transparency</h4>
                            <p class="value-description">
                                Verified hospitals, authenticated campaigns, and complete visibility. Your trust is our foundation, transparency is our promise.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partner Hospitals Section -->
    <section class="hospitals" id="hospitals">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Trusted <span style="color: var(--color-primary);">Partner Hospitals</span></h2>
                <p class="section-description">
                    Schedule your life-saving blood donation at any of our <strong>150+ verified partner hospitals</strong> across the Philippines—from Luzon to Mindanao. Safe, convenient, and always near you.
                </p>
            </div>

            <div class="hospitals-grid" id="hospitalsGrid">
                <!-- Hospital cards will be dynamically inserted here -->
            </div>

            <div class="hospitals-cta">
                <div class="cta-content">
                    <div class="cta-icon">
                        <img src="{{ asset('assets/icons/search.svg') }}" alt="Search" width="28" height="28">
                    </div>
                    <div class="cta-text">
                        <h3 class="cta-title">Can't find a hospital near you?</h3>
                        <p class="cta-description">
                            We're constantly expanding our network across the Philippines. Help us reach your community.
                        </p>
                    </div>
                    <div class="cta-actions">
                        <button class="btn btn-primary">
                            <img src="{{ asset('assets/icons/white-blood-fill.svg') }}" alt="Add" width="16" height="16">
                            Suggest a Hospital
                        </button>
                        <button class="btn btn-outline-secondary">
                            View All 150+ Hospitals
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection

@push('scripts')
    <script>
        // ===========================
        // CAMPAIGNS DATA & MANAGER
        // ===========================
        const campaignsData = [
            {
                id: 1,
                title: "Help Baby Sofia's Heart Surgery",
                organizer: "Sofia's Family • Manila, Philippines",
                category: "Medical Treatment",
                raised: 450000,
                goal: 800000,
                supporters: 234,
                daysLeft: 12
            },
            {
                id: 2,
                title: "Kidney Transplant for Tatay Ernesto",
                organizer: "Ernesto Support Group • Cebu, Philippines",
                category: "Medical Treatment",
                raised: 1200000,
                goal: 1500000,
                supporters: 456,
                daysLeft: 8
            },
            {
                id: 3,
                title: "Cancer Treatment for Teacher Maria",
                organizer: "Former Students of Maria • Davao City, Philippines",
                category: "Medical Treatment",
                raised: 380000,
                goal: 600000,
                supporters: 189,
                daysLeft: 15
            }
        ];

        class CampaignsManager {
            constructor() {
                this.container = document.getElementById('campaignsGrid');
                this.init();
            }

            init() {
                if (this.container) {
                    this.renderCampaigns();
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
                return Math.round((raised / goal) * 100);
            }

            createCampaignCard(campaign) {
                const percentage = this.calculatePercentage(campaign.raised, campaign.goal);

                return `
                    <div class="card campaign-card">
                        <div class="campaign-header">
                            <div class="campaign-info">
                                <div class="campaign-badge">${campaign.category}</div>
                                <h3 class="campaign-title">${campaign.title}</h3>
                                <p class="campaign-organizer">${campaign.organizer}</p>
                            </div>

                            <div class="campaign-progress">
                                <div class="campaign-amount">
                                    <div class="campaign-raised-container">
                                        <div class="campaign-raised">${this.formatCurrency(campaign.raised)}</div>
                                        <div class="campaign-goal">raised of ${this.formatCurrency(campaign.goal)}</div>
                                    </div>
                                    <div class="campaign-percentage">${percentage}%</div>
                                </div>

                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: ${percentage}%"></div>
                                </div>

                                <div class="campaign-meta">
                                    <div class="campaign-meta-item">
                                        <img src="{{ asset('assets/icons/users.svg') }}" alt="Supporters" width="18" height="18">
                                        <span>${campaign.supporters} supporters</span>
                                    </div>
                                    <div class="campaign-meta-item">
                                        <img src="{{ asset('assets/icons/clock.svg') }}" alt="Time left" width="18" height="18">
                                        <span>${campaign.daysLeft} days left</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="campaign-button" aria-label="Donate to ${campaign.title}">
                            <img src="{{ asset('assets/icons/heart-white.svg') }}" alt="" width="18" height="18">
                            Donate Now
                        </button>
                    </div>
                `;
            }

            renderCampaigns() {
                this.container.innerHTML = campaignsData
                    .map(campaign => this.createCampaignCard(campaign))
                    .join('');

                setTimeout(() => {
                    document.querySelectorAll('.progress-fill').forEach(bar => {
                        bar.style.transition = 'width 1s ease-out';
                    });
                }, 100);
            }
        }

        // ===========================
        // HOSPITALS DATA & MANAGER
        // ===========================
        const hospitalsData = [
            {
                id: 1,
                name: "Philippine General Hospital",
                category: "National Referral Center",
                location: "Taft Avenue, Manila",
                region: "Metro Manila",
                phone: "(02) 8554-8400",
                hours: "Mon-Sat: 8:00 AM - 5:00 PM",
                availability: "Available Today"
            },
            {
                id: 2,
                name: "Philippine Heart Center",
                category: "Cardiovascular Specialty",
                location: "East Avenue, Quezon City",
                region: "Metro Manila",
                phone: "(02) 8925-2401",
                hours: "Mon-Fri: 8:00 AM - 4:00 PM",
                availability: "Available Today"
            },
            {
                id: 3,
                name: "Vicente Sotto Memorial Medical Center",
                category: "Regional Hospital",
                location: "B. Rodriguez St, Cebu City",
                region: "Visayas",
                phone: "(032) 253-9891",
                hours: "Mon-Sat: 8:00 AM - 5:00 PM",
                availability: "Available Tomorrow"
            },
            {
                id: 4,
                name: "Southern Philippines Medical Center",
                category: "Regional Hospital",
                location: "J.P. Laurel Ave, Davao City",
                region: "Mindanao",
                phone: "(082) 227-2731",
                hours: "Mon-Sat: 8:00 AM - 5:00 PM",
                availability: "Available Today"
            },
            {
                id: 5,
                name: "St. Luke's Medical Center",
                category: "Tertiary Hospital",
                location: "E. Rodriguez Sr. Ave, Quezon City",
                region: "Metro Manila",
                phone: "(02) 8789-7700",
                hours: "24/7 Blood Bank Services",
                availability: "Available Now"
            },
            {
                id: 6,
                name: "The Medical City",
                category: "Multi-Specialty Hospital",
                location: "Ortigas Avenue, Pasig City",
                region: "Metro Manila",
                phone: "(02) 8988-1000",
                hours: "Mon-Sat: 7:00 AM - 6:00 PM",
                availability: "Available Today"
            }
        ];

        class HospitalsManager {
            constructor() {
                this.container = document.getElementById('hospitalsGrid');
                this.filterButtons = document.querySelectorAll('.filter-btn');
                this.currentFilter = 'all';
                this.init();
            }

            init() {
                if (this.container) {
                    this.renderHospitals();
                    this.setupFilters();
                }
            }

            setupFilters() {
                this.filterButtons.forEach(button => {
                    button.addEventListener('click', (e) => {
                        this.filterButtons.forEach(btn => btn.classList.remove('active'));
                        e.target.classList.add('active');
                        const filter = e.target.getAttribute('data-filter');
                        this.currentFilter = filter;
                        this.renderHospitals();
                    });
                });
            }

            filterHospitals() {
                if (this.currentFilter === 'all') {
                    return hospitalsData;
                }

                const filterMap = {
                    'metro-manila': 'Metro Manila',
                    'visayas': 'Visayas',
                    'mindanao': 'Mindanao'
                };

                return hospitalsData.filter(hospital =>
                    hospital.region === filterMap[this.currentFilter]
                );
            }

            createHospitalCard(hospital) {
                return `
                    <div class="card hospital-card" data-region="${hospital.region.toLowerCase().replace(' ', '-')}">
                        <div class="hospital-header">
                            <div class="hospital-badge">${hospital.category}</div>
                            <h3 class="hospital-name">${hospital.name}</h3>
                        </div>

                        <div class="hospital-details">
                            <div class="hospital-detail">
                                <img src="{{ asset('assets/icons/location.svg') }}" alt="Location" width="20" height="20">
                                <span><strong>Location:</strong> ${hospital.location}</span>
                            </div>

                            <div class="hospital-detail">
                                <img src="{{ asset('assets/icons/phone.svg') }}" alt="Phone" width="20" height="20">
                                <span><strong>Contact:</strong> ${hospital.phone}</span>
                            </div>

                            <div class="hospital-detail">
                                <img src="{{ asset('assets/icons/clock.svg') }}" alt="Hours" width="20" height="20">
                                <span><strong>Hours:</strong> ${hospital.hours}</span>
                            </div>

                            <div class="hospital-detail">
                                <img src="{{ asset('assets/icons/calendar.svg') }}" alt="Availability" width="20" height="20">
                                <span style="color: var(--color-success); font-weight: var(--font-weight-bold);">
                                    ${hospital.availability}
                                </span>
                            </div>
                        </div>

                        <div class="hospital-action">
                            <button class="hospital-button">
                                <img src="{{ asset('assets/icons/calendar.svg') }}" alt="" width="16" height="16">
                                Schedule Appointment
                            </button>
                        </div>
                    </div>
                `;
            }

            renderHospitals() {
                const filteredHospitals = this.filterHospitals();

                if (filteredHospitals.length === 0) {
                    this.container.innerHTML = `
                        <div class="no-results">
                            <p>No hospitals found in this region. Try another filter.</p>
                        </div>
                    `;
                    return;
                }

                this.container.innerHTML = filteredHospitals
                    .map(hospital => this.createHospitalCard(hospital))
                    .join('');
            }
        }

        // ===========================
        // NAVIGATION MANAGER
        // ===========================
        class Navigation {
            constructor() {
                this.nav = document.getElementById('mainNav');
                this.menuToggle = document.getElementById('mobileMenuToggle');
                this.navLinks = document.getElementById('navLinks');
                this.navOverlay = document.getElementById('navOverlay');
                this.links = document.querySelectorAll('.nav-link');
                this.lastScroll = 0;
                this.isMenuOpen = false;

                this.init();
            }

            init() {
                if (!this.nav) return;

                this.setupMobileMenu();
                this.setupScrollBehavior();
                this.setupSmoothScroll();
                this.setupActiveLink();
                this.setupKeyboardNavigation();
                this.handleResize();
            }

            setupMobileMenu() {
                if (!this.menuToggle) return;

                this.menuToggle.addEventListener('click', () => {
                    this.toggleMenu();
                });

                if (this.navOverlay) {
                    this.navOverlay.addEventListener('click', () => {
                        this.closeMenu();
                    });
                }

                this.links.forEach(link => {
                    link.addEventListener('click', () => {
                        this.closeMenu();
                    });
                });

                this.navLinks?.addEventListener('touchmove', (e) => {
                    if (this.isMenuOpen) {
                        e.stopPropagation();
                    }
                }, { passive: true });
            }

            toggleMenu() {
                this.isMenuOpen = !this.isMenuOpen;

                if (this.isMenuOpen) {
                    this.openMenu();
                } else {
                    this.closeMenu();
                }
            }

            openMenu() {
                this.isMenuOpen = true;
                this.menuToggle?.classList.add('active');
                this.navLinks?.classList.add('active');
                this.navOverlay?.classList.add('active');
                this.menuToggle?.setAttribute('aria-expanded', 'true');
                this.menuToggle?.setAttribute('aria-label', 'Close navigation menu');
                this.navOverlay?.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';

                setTimeout(() => {
                    this.links[0]?.focus();
                }, 300);
            }

            closeMenu() {
                this.isMenuOpen = false;
                this.menuToggle?.classList.remove('active');
                this.navLinks?.classList.remove('active');
                this.navOverlay?.classList.remove('active');
                this.menuToggle?.setAttribute('aria-expanded', 'false');
                this.menuToggle?.setAttribute('aria-label', 'Open navigation menu');
                this.navOverlay?.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            }

            setupScrollBehavior() {
                let ticking = false;

                window.addEventListener('scroll', () => {
                    if (!ticking) {
                        window.requestAnimationFrame(() => {
                            this.handleScroll();
                            ticking = false;
                        });
                        ticking = true;
                    }
                }, { passive: true });
            }

            handleScroll() {
                const currentScroll = window.pageYOffset;

                if (currentScroll > 50) {
                    this.nav.classList.add('scrolled');
                } else {
                    this.nav.classList.remove('scrolled');
                }

                if (this.isMenuOpen && Math.abs(currentScroll - this.lastScroll) > 50) {
                    this.closeMenu();
                }

                this.lastScroll = currentScroll;
            }

            setupSmoothScroll() {
                this.links.forEach(link => {
                    link.addEventListener('click', (e) => {
                        const href = link.getAttribute('href');

                        if (href && href.startsWith('#')) {
                            e.preventDefault();
                            const targetId = href.substring(1);
                            const target = document.getElementById(targetId);

                            if (target) {
                                const navHeight = this.nav.offsetHeight;
                                const targetPosition = target.offsetTop - navHeight - 20;

                                window.scrollTo({
                                    top: targetPosition,
                                    behavior: 'smooth'
                                });

                                history.pushState(null, null, href);

                                target.setAttribute('tabindex', '-1');
                                target.focus({ preventScroll: true });
                            }
                        }
                    });
                });
            }

            setupActiveLink() {
                const sections = Array.from(this.links).map(link => {
                    const href = link.getAttribute('href');
                    if (href && href.startsWith('#')) {
                        const id = href.substring(1);
                        return document.getElementById(id);
                    }
                    return null;
                }).filter(Boolean);

                if (sections.length === 0) return;

                let ticking = false;

                window.addEventListener('scroll', () => {
                    if (!ticking) {
                        window.requestAnimationFrame(() => {
                            this.updateActiveLink(sections);
                            ticking = false;
                        });
                        ticking = true;
                    }
                }, { passive: true });

                this.updateActiveLink(sections);
            }

            updateActiveLink(sections) {
                const scrollPos = window.pageYOffset + this.nav.offsetHeight + 100;

                let currentSection = null;

                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionBottom = sectionTop + section.offsetHeight;

                    if (sectionTop <= scrollPos && sectionBottom > scrollPos) {
                        currentSection = section;
                    }
                });

                if (!currentSection && scrollPos < (sections[0]?.offsetTop + 200)) {
                    currentSection = sections[0];
                }

                this.links.forEach(link => {
                    link.classList.remove('active');
                    if (currentSection) {
                        const href = link.getAttribute('href');
                        if (href === `#${currentSection.id}`) {
                            link.classList.add('active');
                        }
                    }
                });
            }

            setupKeyboardNavigation() {
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.isMenuOpen) {
                        this.closeMenu();
                        this.menuToggle?.focus();
                    }
                });

                if (this.navLinks) {
                    this.navLinks.addEventListener('keydown', (e) => {
                        if (!this.isMenuOpen) return;

                        if (e.key === 'Tab') {
                            const focusableElements = this.navLinks.querySelectorAll(
                                'a, button, [tabindex]:not([tabindex="-1"])'
                            );
                            const firstElement = focusableElements[0];
                            const lastElement = focusableElements[focusableElements.length - 1];

                            if (e.shiftKey && document.activeElement === firstElement) {
                                e.preventDefault();
                                lastElement.focus();
                            } else if (!e.shiftKey && document.activeElement === lastElement) {
                                e.preventDefault();
                                firstElement.focus();
                            }
                        }
                    });
                }
            }

            handleResize() {
                let resizeTimer;

                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimer);
                    resizeTimer = setTimeout(() => {
                        if (window.innerWidth > 768 && this.isMenuOpen) {
                            this.closeMenu();
                        }
                    }, 250);
                });
            }
        }

        // ===========================
        // ANIMATIONS MANAGER
        // ===========================
        class AnimationsManager {
            constructor() {
                this.init();
            }

            init() {
                this.setupIntersectionObserver();
                this.setupCounterAnimation();
            }

            setupIntersectionObserver() {
                const options = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.1
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-in');

                            if (entry.target.classList.contains('stat-value') ||
                                entry.target.classList.contains('about-stat-value')) {
                                this.animateCounter(entry.target);
                            }
                        }
                    });
                }, options);

                const elements = document.querySelectorAll(`
                    .card,
                    .step-card,
                    .value-card,
                    .stat-item,
                    .about-stat,
                    .trusted-by-card
                `);

                elements.forEach(el => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(20px)';
                    el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
                    observer.observe(el);
                });

                const style = document.createElement('style');
                style.textContent = `
                    .animate-in {
                        opacity: 1 !important;
                        transform: translateY(0) !important;
                    }
                `;
                document.head.appendChild(style);
            }

            setupCounterAnimation() {
                // Triggered by intersection observer
            }

            animateCounter(element) {
                const text = element.textContent;
                const hasPhp = text.includes('₱');
                const hasPlus = text.includes('+');
                const hasM = text.includes('M');

                let targetNumber = parseInt(text.replace(/[^\d]/g, ''));

                if (hasM) {
                    targetNumber = targetNumber;
                }

                let currentNumber = 0;
                const duration = 2000;
                const steps = 60;
                const increment = targetNumber / steps;
                const stepDuration = duration / steps;

                const counter = setInterval(() => {
                    currentNumber += increment;

                    if (currentNumber >= targetNumber) {
                        currentNumber = targetNumber;
                        clearInterval(counter);
                    }

                    let displayText = Math.floor(currentNumber).toLocaleString();

                    if (hasPhp && hasM) {
                        displayText = `₱${displayText}M`;
                    } else if (hasPhp) {
                        displayText = `₱${displayText}`;
                    }

                    if (hasPlus) {
                        displayText += '+';
                    }

                    element.textContent = displayText;
                }, stepDuration);
            }
        }

        // ===========================
        // MAIN APP
        // ===========================
        class App {
            constructor() {
                this.init();
            }

            init() {
                console.log('iKonek App Initialized');

                this.navigation = new Navigation();
                this.campaignsManager = new CampaignsManager();
                this.hospitalsManager = new HospitalsManager();
                this.animationsManager = new AnimationsManager();

                this.setupEventListeners();
                this.hideLoader();
            }

            setupEventListeners() {
                document.querySelectorAll('.btn-primary, .btn-outline').forEach(button => {
                    button.addEventListener('click', (e) => {
                        const text = button.textContent.trim();

                        if (text.includes('Login')) {
                            this.handleLogin();
                        } else if (text.includes('Register')) {
                            this.handleRegister();
                        } else if (text.includes('Donate')) {
                            this.handleDonate(button);
                        }
                    });
                });

                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', (e) => {
                        const href = anchor.getAttribute('href');
                        if (href === '#') return;

                        e.preventDefault();
                        const target = document.querySelector(href);

                        if (target) {
                            const offsetTop = target.offsetTop - 80;
                            window.scrollTo({
                                top: offsetTop,
                                behavior: 'smooth'
                            });
                        }
                    });
                });
            }

            handleLogin() {
                console.log('Login clicked');
                window.location.href = '{{ route('login') }}';
            }

            handleRegister() {
                console.log('Register clicked');
                window.location.href = '{{ route('register') }}';
            }

            handleDonate(button) {
                console.log('Donate clicked');
                const card = button.closest('.campaign-card');
                const title = card ? card.querySelector('.campaign-title').textContent : 'this campaign';
                alert(`Donation functionality for "${title}" will be implemented in the next phase.`);
            }

            hideLoader() {
                setTimeout(() => {
                    document.body.classList.add('loaded');
                }, 500);
            }
        }

        // Initialize app when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            window.iKonekApp = new App();
        });
    </script>
@endpush
