<!-- Navigation -->
<nav class="navigation" id="mainNav" role="navigation" aria-label="Main navigation">
    <div class="container">
        <div class="nav-content">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo" aria-label="iKonek - Home">
                <img src="{{ asset('assets/img/ikonek-logo.png') }}" alt="iKonek Logo" class="logo-image">
                <span class="logo-text" aria-hidden="true"><span class="logo-i">i</span>Konek</span>
            </a>
            
            <!-- Desktop Navigation -->
            <div class="nav-links" id="navLinks" role="menu">
                <a href="#how-it-works" class="nav-link" role="menuitem">
                    <span class="nav-link-text">How It Works</span>
                    <span class="nav-link-indicator"></span>
                </a>
                <a href="#campaigns" class="nav-link" role="menuitem">
                    <span class="nav-link-text">Campaigns</span>
                    <span class="nav-link-indicator"></span>
                </a>
                <a href="#about" class="nav-link" role="menuitem">
                    <span class="nav-link-text">About Us</span>
                    <span class="nav-link-indicator"></span>
                </a>
                <a href="#hospitals" class="nav-link" role="menuitem">
                    <span class="nav-link-text">Partner Hospitals</span>
                    <span class="nav-link-indicator"></span>
                </a>

                
                <!-- CTA Buttons -->
                <div class="nav-actions">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-text nav-btn-login">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-text nav-btn-login" aria-label="Login to your account">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg>
                            <span>Login</span>
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm nav-btn-register" aria-label="Create new account">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <line x1="20" y1="8" x2="20" y2="14"></line>
                                <line x1="23" y1="11" x2="17" y2="11"></line>
                            </svg>
                            <span>Get Started</span>
                        </a>
                    @endauth
                </div>
            </div>
            
            <!-- Mobile Menu Toggle -->
            <button 
                class="mobile-menu-toggle" 
                id="mobileMenuToggle"
                aria-label="Open navigation menu" 
                aria-expanded="false"
                aria-controls="navLinks"
            >
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>
    </div>
    
    <!-- Mobile Menu Overlay -->
    <div class="nav-overlay" id="navOverlay" aria-hidden="true"></div>
</nav>
