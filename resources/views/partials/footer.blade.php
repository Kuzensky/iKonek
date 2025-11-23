<!-- Footer -->
<footer class="footer">
    <div class="container">
        <!-- Footer Top - Newsletter & CTA -->
        <div class="footer-top">
            <div class="footer-cta-section">
                <div class="footer-cta-content">
                    <h3 class="footer-cta-title">Ready to Make a Difference?</h3>
                    <p class="footer-cta-description">
                        Join thousands of Filipinos saving lives through blood donation and humanitarian support
                    </p>
                    <div class="footer-cta-buttons">
                        <a href="{{ route('register') }}" class="btn btn-primary">
                            <img src="{{ asset('assets/icons/heart.svg') }}" alt="" width="18" height="18">
                            Become a Donor
                        </a>
                        <button class="btn btn-outline-light">
                            <img src="{{ asset('assets/icons/search.svg') }}" alt="" width="18" height="18">
                            Find a Hospital
                        </button>
                    </div>
                </div>

                <div class="footer-newsletter">
                    <h4 class="newsletter-heading">Stay Updated</h4>
                    <p class="newsletter-description">
                        Get the latest updates on blood drives, campaigns, and ways to help your community
                    </p>
                    <form class="newsletter-form" id="newsletterForm">
                        <div class="input-group">
                            <input
                                type="email"
                                class="newsletter-input"
                                placeholder="Enter your email address"
                                aria-label="Email address for newsletter"
                                required
                            >
                            <button type="submit" class="btn btn-primary newsletter-btn">
                                Subscribe
                            </button>
                        </div>
                        <p class="newsletter-privacy">
                            We respect your privacy. Unsubscribe anytime.
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer Main - Links & Info -->
        <div class="footer-main">
            <div class="footer-brand">
                <div class="footer-logo">
                    <div class="logo-icon">
                        <img src="{{ asset('assets/icons/blood-drop.svg') }}" alt="iKonek Logo" width="20" height="20">
                    </div>
                    <span class="logo-text"><span class="logo-i">i</span>Konek</span>
                </div>
                <p class="footer-tagline">Every Drop Counts. Every Click Matters.</p>
                <p class="footer-description">
                    Connecting communities and saving lives across the Philippines through innovative digital healthcare solutions.
                </p>

                <!-- Social Media Links -->
                <div class="footer-social">
                    <h5 class="social-heading">Follow Us</h5>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-links-grid">
                <div class="footer-column">
                    <h4 class="footer-heading">Platform</h4>
                    <ul class="footer-links">
                        <li><a href="#how-it-works">How It Works</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#hospitals">Partner Hospitals</a></li>
                        <li><a href="#campaigns">Campaigns</a></li>
                        <li><a href="#features">Features</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4 class="footer-heading">For Donors</h4>
                    <ul class="footer-links">
                        <li><a href="#schedule">Schedule Donation</a></li>
                        <li><a href="#eligibility">Eligibility Check</a></li>
                        <li><a href="#history">Donation History</a></li>
                        <li><a href="#rewards">Donor Rewards</a></li>
                        <li><a href="#faqs">FAQs</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4 class="footer-heading">For Organizations</h4>
                    <ul class="footer-links">
                        <li><a href="#partner">Become a Partner</a></li>
                        <li><a href="#hospital-portal">Hospital Portal</a></li>
                        <li><a href="#campaign-create">Create Campaign</a></li>
                        <li><a href="#resources">Resources</a></li>
                        <li><a href="#contact">Contact Sales</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4 class="footer-heading">Support</h4>
                    <ul class="footer-links">
                        <li><a href="#help">Help Center</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li><a href="#feedback">Give Feedback</a></li>
                        <li><a href="#report">Report Issue</a></li>
                        <li><a href="#safety">Safety Guidelines</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Contact Info -->
        <div class="footer-contact-bar">
            <div class="contact-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                <a href="mailto:support@ikonek.ph">support@ikonek.ph</a>
            </div>
            <div class="contact-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <a href="tel:+6328123456">+63 (02) 8123-4567</a>
            </div>
            <div class="contact-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg>
                <span>Manila, Philippines</span>
            </div>
            <div class="contact-item">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <span>24/7 Emergency Support</span>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p class="footer-copyright">
                    &copy; 2025 iKonek. All rights reserved.
                </p>
                <div class="footer-legal-links">
                    <a href="#privacy">Privacy Policy</a>
                    <a href="#terms">Terms of Service</a>
                    <a href="#cookies">Cookie Policy</a>
                    <a href="#accessibility">Accessibility</a>
                </div>
                <div class="footer-badges">
                    <div class="badge-item" title="DOH Accredited">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L3 7v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-9-5zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V7.3l7-3.11v8.8z"/>
                        </svg>
                        <span>DOH Verified</span>
                    </div>
                    <div class="badge-item" title="Data Privacy Compliant">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/>
                        </svg>
                        <span>Secure</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
