@extends('layouts.frontend')

@section('title', 'Start a Fundraiser - Step 1 - iKonek')

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
    <link rel="stylesheet" href="{{ asset('css/components/start-fundraiser.css') }}">
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
        <!-- Header -->
        <header class="fundraiser-header">
            <div class="header-content">
                <div class="header-back-btn">
                    <a href="{{ route('fundraisers.index') }}" class="back-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Back to Fundraisers
                    </a>
                </div>
                <div class="header-text-content">
                    <h1 class="header-title">Start a Fundraiser 💝</h1>
                    <p class="header-subtitle">Create your campaign in 4 easy steps and start receiving support from our generous community</p>
                </div>
                <div class="header-stats">
                    <div class="header-stat-item">
                        <span class="stat-number">5,000+</span>
                        <span class="stat-label">Active Campaigns</span>
                    </div>
                    <div class="header-stat-divider"></div>
                    <div class="header-stat-item">
                        <span class="stat-number">₱50M+</span>
                        <span class="stat-label">Funds Raised</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Progress Steps -->
        <div class="fundraiser-steps">
            <div class="step-item active">
                <div class="step-circle">1</div>
                <span class="step-label">Campaign Details</span>
            </div>
            <div class="step-connector active"></div>
            <div class="step-item">
                <div class="step-circle">2</div>
                <span class="step-label">Beneficiary Info</span>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-circle">3</div>
                <span class="step-label">Your Details</span>
            </div>
            <div class="step-connector"></div>
            <div class="step-item">
                <div class="step-circle">4</div>
                <span class="step-label">Payment Setup</span>
            </div>
        </div>

        <!-- Form Container -->
        <div class="fundraiser-form-container">
            <form class="fundraiser-form" id="fundraiserForm">
                <!-- Campaign Details Section -->
                <div class="form-section-card">
                    <div class="form-section-header">
                        <img src="{{ asset('assets/icons/campaigns-card.svg') }}" alt="" class="section-icon">
                        <div class="section-header-content">
                            <h2 class="section-title">Campaign Details</h2>
                            <p class="section-subtitle">Tell us about your fundraising campaign</p>
                        </div>
                    </div>

                    <div class="form-grid">
                        <!-- Campaign Title -->
                        <div class="form-group full-width">
                            <label class="form-label" for="campaignTitle">
                                Campaign Title
                                <span class="required">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="campaignTitle" 
                                class="form-input" 
                                placeholder="e.g., Help Maria Fight Leukemia - Urgent Medical Support Needed"
                                maxlength="120"
                            >
                            <p class="form-helper"><span id="titleCharCount">0</span> / 120 characters</p>
                        </div>

                        <!-- Category Selection -->
                        <div class="form-group full-width">
                            <label class="form-label">
                                Category
                                <span class="required">*</span>
                            </label>
                            <div class="category-grid">
                                <label class="category-card">
                                    <input type="radio" name="category" value="medical-emergency" class="category-radio">
                                    <div class="category-content">
                                        <img src="{{ asset('assets/icons/red-heart.svg') }}" alt="" class="category-icon">
                                        <div class="category-info">
                                            <div class="category-name">Medical Emergency</div>
                                            <div class="category-desc">Critical medical treatment</div>
                                        </div>
                                    </div>
                                </label>

                                <label class="category-card">
                                    <input type="radio" name="category" value="disaster-relief" class="category-radio">
                                    <div class="category-content">
                                        <img src="{{ asset('assets/icons/shield.svg') }}" alt="" class="category-icon">
                                        <div class="category-info">
                                            <div class="category-name">Disaster Relief</div>
                                            <div class="category-desc">Typhoons, earthquake, fire victims</div>
                                        </div>
                                    </div>
                                </label>

                                <label class="category-card">
                                    <input type="radio" name="category" value="education-support" class="category-radio">
                                    <div class="category-content">
                                        <img src="{{ asset('assets/icons/achievement.svg') }}" alt="" class="category-icon">
                                        <div class="category-info">
                                            <div class="category-name">Education Support</div>
                                            <div class="category-desc">School fees, supplies, scholarship</div>
                                        </div>
                                    </div>
                                </label>

                                <label class="category-card">
                                    <input type="radio" name="category" value="emergency-assistance" class="category-radio">
                                    <div class="category-content">
                                        <img src="{{ asset('assets/icons/red-blood-2.svg') }}" alt="" class="category-icon">
                                        <div class="category-info">
                                            <div class="category-name">Emergency Assistance</div>
                                            <div class="category-desc">Urgent community needs</div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Campaign Description -->
                        <div class="form-group full-width">
                            <label class="form-label" for="campaignDescription">
                                Campaign Description
                                <span class="required">*</span>
                            </label>
                            <textarea 
                                id="campaignDescription" 
                                class="form-textarea"
                                placeholder="Share your story in detail... Tell donors why their support matters and how the funds will be used. Be specific about the medical treatment needed, expenses, and impact their donation will make."
                                maxlength="3000"
                                rows="8"
                            ></textarea>
                            <p class="form-helper"><span id="descCharCount">0</span> / 3000 characters (minimum 150)</p>
                        </div>

                        <!-- Campaign Images -->
                        <div class="form-group full-width">
                            <label class="form-label">
                                Campaign Images (Optional)
                            </label>
                            <div class="upload-area" id="uploadArea">
                                <img src="{{ asset('assets/icons/donate.svg') }}" alt="" class="upload-icon">
                                <div class="upload-content">
                                    <p class="upload-title">Click to upload images</p>
                                    <p class="upload-subtitle">Maximum 5 images, 3MB each (JPG, PNG, GIF)</p>
                                </div>
                                <input type="file" id="campaignImages" accept="image/*" multiple hidden>
                            </div>
                            <div class="upload-preview" id="uploadPreview"></div>
                        </div>

                        <!-- Goal Amount -->
                        <div class="form-group">
                            <label class="form-label" for="goalAmount">
                                Goal Amount (₱)
                                <span class="required">*</span>
                            </label>
                            <div class="input-with-prefix">
                                <span class="input-prefix">₱</span>
                                <input 
                                    type="number" 
                                    id="goalAmount" 
                                    class="form-input with-prefix" 
                                    placeholder="50000"
                                    min="5000"
                                    max="10000000"
                                >
                            </div>
                            <p class="form-helper">Minimum: ₱5,000 | Maximum: ₱10,000,000</p>
                        </div>

                        <!-- Campaign Duration -->
                        <div class="form-group">
                            <label class="form-label" for="campaignDuration">
                                Campaign Duration
                                <span class="required">*</span>
                            </label>
                            <select id="campaignDuration" class="form-select">
                                <option value="">Select duration</option>
                                <option value="30" selected>30 days (Recommended)</option>
                                <option value="60">60 days</option>
                                <option value="90">90 days</option>
                                <option value="custom">Custom duration</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Help Section -->
                <div class="help-section">
                    <div class="success-examples-card">
                        <div class="examples-header">
                            <div class="examples-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" fill="#FFC107" stroke="#FFA000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="examples-title">💡 Tips for a Successful Campaign</h3>
                                <p class="examples-subtitle">Follow these best practices from our top fundraisers</p>
                            </div>
                        </div>
                        <div class="tips-grid">
                            <div class="tip-card">
                                <div class="tip-card-icon">📝</div>
                                <div class="tip-card-content">
                                    <h4>Clear Title</h4>
                                    <p>Use a descriptive, emotional title that explains what you need</p>
                                </div>
                            </div>
                            <div class="tip-card">
                                <div class="tip-card-icon">📸</div>
                                <div class="tip-card-content">
                                    <h4>Add Photos</h4>
                                    <p>Campaigns with images receive 40% more donations</p>
                                </div>
                            </div>
                            <div class="tip-card">
                                <div class="tip-card-icon">💬</div>
                                <div class="tip-card-content">
                                    <h4>Tell Your Story</h4>
                                    <p>Share specific details about how funds will be used</p>
                                </div>
                            </div>
                            <div class="tip-card">
                                <div class="tip-card-icon">🎯</div>
                                <div class="tip-card-content">
                                    <h4>Set Realistic Goals</h4>
                                    <p>Break down costs to show donors where money goes</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="info-notice-box">
                        <div class="info-notice-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="#16A34A" stroke-width="2"/>
                                <path d="M12 16V12M12 8H12.01" stroke="#16A34A" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="info-notice-text">
                            <p><strong>💾 Auto-Save Enabled!</strong> Your progress is automatically saved. You can return anytime to continue creating your campaign.</p>
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <button type="button" class="btn btn-outline btn-cancel">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary btn-continue">
                        Continue
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Start Fundraiser Step 1 - Inline JavaScript
        class StartFundraiser {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.titleInput = document.getElementById('campaignTitle');
                this.descriptionInput = document.getElementById('campaignDescription');
                this.imagesInput = document.getElementById('campaignImages');
                this.uploadArea = document.getElementById('uploadArea');
                this.uploadPreview = document.getElementById('uploadPreview');
                this.goalAmountInput = document.getElementById('goalAmount');
                this.durationSelect = document.getElementById('campaignDuration');
                
                this.selectedImages = [];
                this.maxImages = 5;
                this.maxImageSize = 3 * 1024 * 1024; // 3MB
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
            }
            
            attachEventListeners() {
                // Character counters
                if (this.titleInput) {
                    this.titleInput.addEventListener('input', () => this.updateCharCount('title'));
                }
                
                if (this.descriptionInput) {
                    this.descriptionInput.addEventListener('input', () => this.updateCharCount('description'));
                }
                
                // Upload area
                if (this.uploadArea) {
                    this.uploadArea.addEventListener('click', () => this.imagesInput.click());
                    this.uploadArea.addEventListener('dragover', (e) => this.handleDragOver(e));
                    this.uploadArea.addEventListener('drop', (e) => this.handleDrop(e));
                }
                
                if (this.imagesInput) {
                    this.imagesInput.addEventListener('change', (e) => this.handleImageSelect(e));
                }
                
                // Form submission
                if (this.form) {
                    this.form.addEventListener('submit', (e) => this.handleSubmit(e));
                }
                
                // Auto-save draft
                const formInputs = this.form.querySelectorAll('input, textarea, select');
                formInputs.forEach(input => {
                    input.addEventListener('change', () => this.saveDraft());
                });
            }
            
            updateCharCount(type) {
                if (type === 'title') {
                    const count = this.titleInput.value.length;
                    const counter = document.getElementById('titleCharCount');
                    if (counter) {
                        counter.textContent = count;
                    }
                } else if (type === 'description') {
                    const count = this.descriptionInput.value.length;
                    const counter = document.getElementById('descCharCount');
                    if (counter) {
                        counter.textContent = count;
                    }
                }
            }
            
            handleDragOver(e) {
                e.preventDefault();
                e.stopPropagation();
                this.uploadArea.style.borderColor = '#E63946';
                this.uploadArea.style.background = 'rgba(230, 57, 70, 0.08)';
            }
            
            handleDrop(e) {
                e.preventDefault();
                e.stopPropagation();
                this.uploadArea.style.borderColor = '';
                this.uploadArea.style.background = '';
                
                const files = Array.from(e.dataTransfer.files);
                this.processImages(files);
            }
            
            handleImageSelect(e) {
                const files = Array.from(e.target.files);
                this.processImages(files);
            }
            
            processImages(files) {
                const imageFiles = files.filter(file => file.type.startsWith('image/'));
                
                if (this.selectedImages.length + imageFiles.length > this.maxImages) {
                    alert(`You can only upload a maximum of ${this.maxImages} images.`);
                    return;
                }
                
                imageFiles.forEach(file => {
                    if (file.size > this.maxImageSize) {
                        alert(`${file.name} is too large. Maximum size is 3MB.`);
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.selectedImages.push({
                            file: file,
                            dataUrl: e.target.result,
                            name: file.name
                        });
                        this.renderImagePreviews();
                    };
                    reader.readAsDataURL(file);
                });
            }
            
            renderImagePreviews() {
                if (!this.uploadPreview) return;
                
                this.uploadPreview.innerHTML = this.selectedImages.map((img, index) => `
                    <div class="preview-item">
                        <img src="${img.dataUrl}" alt="${img.name}" class="preview-image">
                        <button type="button" class="preview-remove" data-index="${index}" aria-label="Remove image">
                            &times;
                        </button>
                    </div>
                `).join('');
                
                // Attach remove handlers
                this.uploadPreview.querySelectorAll('.preview-remove').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const index = parseInt(e.currentTarget.getAttribute('data-index'));
                        this.removeImage(index);
                    });
                });
            }
            
            removeImage(index) {
                this.selectedImages.splice(index, 1);
                this.renderImagePreviews();
                this.saveDraft();
            }
            
            validateForm() {
                const errors = [];
                
                // Title validation
                const title = this.titleInput.value.trim();
                if (!title) {
                    errors.push('Campaign title is required');
                } else if (title.length < 10) {
                    errors.push('Campaign title must be at least 10 characters');
                }
                
                // Category validation
                const category = this.form.querySelector('input[name="category"]:checked');
                if (!category) {
                    errors.push('Please select a category');
                }
                
                // Description validation
                const description = this.descriptionInput.value.trim();
                if (!description) {
                    errors.push('Campaign description is required');
                } else if (description.length < 150) {
                    errors.push('Campaign description must be at least 150 characters');
                }
                
                // Goal amount validation
                const goalAmount = parseFloat(this.goalAmountInput.value);
                if (!goalAmount) {
                    errors.push('Goal amount is required');
                } else if (goalAmount < 5000) {
                    errors.push('Goal amount must be at least ₱5,000');
                } else if (goalAmount > 10000000) {
                    errors.push('Goal amount cannot exceed ₱10,000,000');
                }
                
                // Duration validation
                const duration = this.durationSelect.value;
                if (!duration) {
                    errors.push('Please select campaign duration');
                }
                
                return errors;
            }
            
            handleSubmit(e) {
                e.preventDefault();
                
                const errors = this.validateForm();
                
                if (errors.length > 0) {
                    alert('Please fix the following errors:\n\n' + errors.join('\n'));
                    return;
                }
                
                // Get form data
                const formData = this.getFormData();
                
                // Save to localStorage
                localStorage.setItem('fundraiserDraft', JSON.stringify(formData));
                
                // Navigate to next step
                window.location.href = 'start-fundraiser-step2.html';
            }
            
            getFormData() {
                const category = this.form.querySelector('input[name="category"]:checked');
                
                return {
                    title: this.titleInput.value.trim(),
                    category: category ? category.value : '',
                    description: this.descriptionInput.value.trim(),
                    goalAmount: parseFloat(this.goalAmountInput.value),
                    duration: this.durationSelect.value,
                    images: this.selectedImages.map(img => ({
                        name: img.name,
                        dataUrl: img.dataUrl
                    })),
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    localStorage.setItem('fundraiserDraft', JSON.stringify(formData));
                    console.log('Draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    
                    // Restore form values
                    if (data.title) {
                        this.titleInput.value = data.title;
                        this.updateCharCount('title');
                    }
                    
                    if (data.category) {
                        const categoryRadio = this.form.querySelector(`input[name="category"][value="${data.category}"]`);
                        if (categoryRadio) {
                            categoryRadio.checked = true;
                        }
                    }
                    
                    if (data.description) {
                        this.descriptionInput.value = data.description;
                        this.updateCharCount('description');
                    }
                    
                    if (data.goalAmount) {
                        this.goalAmountInput.value = data.goalAmount;
                    }
                    
                    if (data.duration) {
                        this.durationSelect.value = data.duration;
                    }
                    
                    if (data.images && data.images.length > 0) {
                        this.selectedImages = data.images;
                        this.renderImagePreviews();
                    }
                    
                    console.log('Draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new StartFundraiser();
            });
        } else {
            new StartFundraiser();
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

        // Cancel button
        const cancelBtn = document.querySelector('.btn-cancel');
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to cancel? All entered data will be lost.')) {
                    window.location.href = '{{ route('fundraisers.index') }}';
                }
            });
        }
    </script>
@endsection

@push('scripts')
    <script>

        // Start Fundraiser Step 1 - Inline JavaScript
        class StartFundraiser {
            constructor() {
                this.form = document.getElementById('fundraiserForm');
                this.titleInput = document.getElementById('campaignTitle');
                this.descriptionInput = document.getElementById('campaignDescription');
                this.imagesInput = document.getElementById('campaignImages');
                this.uploadArea = document.getElementById('uploadArea');
                this.uploadPreview = document.getElementById('uploadPreview');
                this.goalAmountInput = document.getElementById('goalAmount');
                this.durationSelect = document.getElementById('campaignDuration');
                
                this.selectedImages = [];
                this.maxImages = 5;
                this.maxImageSize = 3 * 1024 * 1024; // 3MB
                
                this.init();
            }
            
            init() {
                this.attachEventListeners();
                this.loadDraftData();
            }
            
            attachEventListeners() {
                // Character counters
                if (this.titleInput) {
                    this.titleInput.addEventListener('input', () => this.updateCharCount('title'));
                }
                
                if (this.descriptionInput) {
                    this.descriptionInput.addEventListener('input', () => this.updateCharCount('description'));
                }
                
                // Upload area
                if (this.uploadArea) {
                    this.uploadArea.addEventListener('click', () => this.imagesInput.click());
                    this.uploadArea.addEventListener('dragover', (e) => this.handleDragOver(e));
                    this.uploadArea.addEventListener('drop', (e) => this.handleDrop(e));
                }
                
                if (this.imagesInput) {
                    this.imagesInput.addEventListener('change', (e) => this.handleImageSelect(e));
                }
                
                // Form submission
                if (this.form) {
                    this.form.addEventListener('submit', (e) => this.handleSubmit(e));
                }
                
                // Auto-save draft
                const formInputs = this.form.querySelectorAll('input, textarea, select');
                formInputs.forEach(input => {
                    input.addEventListener('change', () => this.saveDraft());
                });
            }
            
            updateCharCount(type) {
                if (type === 'title') {
                    const count = this.titleInput.value.length;
                    const counter = document.getElementById('titleCharCount');
                    if (counter) {
                        counter.textContent = count;
                    }
                } else if (type === 'description') {
                    const count = this.descriptionInput.value.length;
                    const counter = document.getElementById('descCharCount');
                    if (counter) {
                        counter.textContent = count;
                    }
                }
            }
            
            handleDragOver(e) {
                e.preventDefault();
                e.stopPropagation();
                this.uploadArea.style.borderColor = '#E63946';
                this.uploadArea.style.background = 'rgba(230, 57, 70, 0.08)';
            }
            
            handleDrop(e) {
                e.preventDefault();
                e.stopPropagation();
                this.uploadArea.style.borderColor = '';
                this.uploadArea.style.background = '';
                
                const files = Array.from(e.dataTransfer.files);
                this.processImages(files);
            }
            
            handleImageSelect(e) {
                const files = Array.from(e.target.files);
                this.processImages(files);
            }
            
            processImages(files) {
                const imageFiles = files.filter(file => file.type.startsWith('image/'));
                
                if (this.selectedImages.length + imageFiles.length > this.maxImages) {
                    alert(`You can only upload a maximum of ${this.maxImages} images.`);
                    return;
                }
                
                imageFiles.forEach(file => {
                    if (file.size > this.maxImageSize) {
                        alert(`${file.name} is too large. Maximum size is 3MB.`);
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.selectedImages.push({
                            file: file,
                            dataUrl: e.target.result,
                            name: file.name
                        });
                        this.renderImagePreviews();
                    };
                    reader.readAsDataURL(file);
                });
            }
            
            renderImagePreviews() {
                if (!this.uploadPreview) return;
                
                this.uploadPreview.innerHTML = this.selectedImages.map((img, index) => `
                    <div class="preview-item">
                        <img src="${img.dataUrl}" alt="${img.name}" class="preview-image">
                        <button type="button" class="preview-remove" data-index="${index}" aria-label="Remove image">
                            &times;
                        </button>
                    </div>
                `).join('');
                
                // Attach remove handlers
                this.uploadPreview.querySelectorAll('.preview-remove').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const index = parseInt(e.currentTarget.getAttribute('data-index'));
                        this.removeImage(index);
                    });
                });
            }
            
            removeImage(index) {
                this.selectedImages.splice(index, 1);
                this.renderImagePreviews();
                this.saveDraft();
            }
            
            validateForm() {
                const errors = [];
                
                // Title validation
                const title = this.titleInput.value.trim();
                if (!title) {
                    errors.push('Campaign title is required');
                } else if (title.length < 10) {
                    errors.push('Campaign title must be at least 10 characters');
                }
                
                // Category validation
                const category = this.form.querySelector('input[name="category"]:checked');
                if (!category) {
                    errors.push('Please select a category');
                }
                
                // Description validation
                const description = this.descriptionInput.value.trim();
                if (!description) {
                    errors.push('Campaign description is required');
                } else if (description.length < 150) {
                    errors.push('Campaign description must be at least 150 characters');
                }
                
                // Goal amount validation
                const goalAmount = parseFloat(this.goalAmountInput.value);
                if (!goalAmount) {
                    errors.push('Goal amount is required');
                } else if (goalAmount < 5000) {
                    errors.push('Goal amount must be at least ₱5,000');
                } else if (goalAmount > 10000000) {
                    errors.push('Goal amount cannot exceed ₱10,000,000');
                }
                
                // Duration validation
                const duration = this.durationSelect.value;
                if (!duration) {
                    errors.push('Please select campaign duration');
                }
                
                return errors;
            }
            
            handleSubmit(e) {
                e.preventDefault();
                
                const errors = this.validateForm();
                
                if (errors.length > 0) {
                    alert('Please fix the following errors:\n\n' + errors.join('\n'));
                    return;
                }
                
                // Get form data
                const formData = this.getFormData();
                
                // Save to localStorage
                localStorage.setItem('fundraiserDraft', JSON.stringify(formData));
                
                // Navigate to next step
                window.location.href = 'start-fundraiser-step2.html';
            }
            
            getFormData() {
                const category = this.form.querySelector('input[name="category"]:checked');
                
                return {
                    title: this.titleInput.value.trim(),
                    category: category ? category.value : '',
                    description: this.descriptionInput.value.trim(),
                    goalAmount: parseFloat(this.goalAmountInput.value),
                    duration: this.durationSelect.value,
                    images: this.selectedImages.map(img => ({
                        name: img.name,
                        dataUrl: img.dataUrl
                    })),
                    timestamp: new Date().toISOString()
                };
            }
            
            saveDraft() {
                try {
                    const formData = this.getFormData();
                    localStorage.setItem('fundraiserDraft', JSON.stringify(formData));
                    console.log('Draft saved');
                } catch (error) {
                    console.error('Error saving draft:', error);
                }
            }
            
            loadDraftData() {
                try {
                    const draftData = localStorage.getItem('fundraiserDraft');
                    if (!draftData) return;
                    
                    const data = JSON.parse(draftData);
                    
                    // Restore form values
                    if (data.title) {
                        this.titleInput.value = data.title;
                        this.updateCharCount('title');
                    }
                    
                    if (data.category) {
                        const categoryRadio = this.form.querySelector(`input[name="category"][value="${data.category}"]`);
                        if (categoryRadio) {
                            categoryRadio.checked = true;
                        }
                    }
                    
                    if (data.description) {
                        this.descriptionInput.value = data.description;
                        this.updateCharCount('description');
                    }
                    
                    if (data.goalAmount) {
                        this.goalAmountInput.value = data.goalAmount;
                    }
                    
                    if (data.duration) {
                        this.durationSelect.value = data.duration;
                    }
                    
                    if (data.images && data.images.length > 0) {
                        this.selectedImages = data.images;
                        this.renderImagePreviews();
                    }
                    
                    console.log('Draft loaded');
                } catch (error) {
                    console.error('Error loading draft:', error);
                }
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                new StartFundraiser();
            });
        } else {
            new StartFundraiser();
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

        // Cancel button
        const cancelBtn = document.querySelector('.btn-cancel');
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
                if (confirm('Are you sure you want to cancel? All entered data will be lost.')) {
                    window.location.href = '{{ route('fundraisers.index') }}';
                }
            });
        }
    
    </script>
@endpush
