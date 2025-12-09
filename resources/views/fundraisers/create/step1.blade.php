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
    <style>
        main.dashboard-main { max-width: 100% !important; }
    </style>
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

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger" style="margin: 20px; padding: 15px; background: #fee; border: 1px solid #fcc; border-radius: 8px; color: #c33;">
                <strong>Please fix the following errors:</strong>
                <ul style="margin-top: 10px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Container -->
        <div class="fundraiser-form-container">
            <form class="fundraiser-form" id="fundraiserForm" method="POST" action="{{ route('fundraisers.create.step1.store') }}" enctype="multipart/form-data">
                @csrf
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
                            <label class="form-label" for="title">
                                Campaign Title
                                <span class="required">*</span>
                            </label>
                            <input
                                type="text"
                                id="title"
                                name="title"
                                class="form-input @error('title') is-invalid @enderror"
                                placeholder="e.g., Help Maria Fight Leukemia - Urgent Medical Support Needed"
                                maxlength="100"
                                value="{{ old('title', $data['title'] ?? '') }}"
                                required
                            >
                            <p class="form-helper"><span id="titleCharCount">{{ strlen(old('title', $data['title'] ?? '')) }}</span> / 100 characters</p>
                        </div>

                        <!-- Category Selection -->
                        <div class="form-group full-width">
                            <label class="form-label">
                                Category
                                <span class="required">*</span>
                            </label>
                            <div class="category-grid">
                                <label class="category-card">
                                    <input type="radio" name="category" value="medical" class="category-radio" {{ old('category', $data['category'] ?? '') == 'medical' ? 'checked' : '' }} required>
                                    <div class="category-content">
                                        <img src="{{ asset('assets/icons/red-heart.svg') }}" alt="" class="category-icon">
                                        <div class="category-info">
                                            <div class="category-name">Medical Emergency</div>
                                            <div class="category-desc">Critical medical treatment</div>
                                        </div>
                                    </div>
                                </label>

                                <label class="category-card">
                                    <input type="radio" name="category" value="disaster_relief" class="category-radio" {{ old('category', $data['category'] ?? '') == 'disaster_relief' ? 'checked' : '' }}>
                                    <div class="category-content">
                                        <img src="{{ asset('assets/icons/shield.svg') }}" alt="" class="category-icon">
                                        <div class="category-info">
                                            <div class="category-name">Disaster Relief</div>
                                            <div class="category-desc">Typhoons, earthquake, fire victims</div>
                                        </div>
                                    </div>
                                </label>

                                <label class="category-card">
                                    <input type="radio" name="category" value="education" class="category-radio" {{ old('category', $data['category'] ?? '') == 'education' ? 'checked' : '' }}>
                                    <div class="category-content">
                                        <img src="{{ asset('assets/icons/achievement.svg') }}" alt="" class="category-icon">
                                        <div class="category-info">
                                            <div class="category-name">Education Support</div>
                                            <div class="category-desc">School fees, supplies, scholarship</div>
                                        </div>
                                    </div>
                                </label>

                                <label class="category-card">
                                    <input type="radio" name="category" value="emergency" class="category-radio" {{ old('category', $data['category'] ?? '') == 'emergency' ? 'checked' : '' }}>
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
                            <label class="form-label" for="description">
                                Campaign Description
                                <span class="required">*</span>
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                class="form-textarea @error('description') is-invalid @enderror"
                                placeholder="Share your story in detail... Tell donors why their support matters and how the funds will be used. Be specific about the medical treatment needed, expenses, and impact their donation will make."
                                maxlength="2000"
                                rows="8"
                                required
                            >{{ old('description', $data['description'] ?? '') }}</textarea>
                            <p class="form-helper"><span id="descCharCount">{{ strlen(old('description', $data['description'] ?? '')) }}</span> / 2000 characters (minimum 50)</p>
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
                                    <p class="upload-subtitle">Maximum 5 images, 5MB each (JPG, PNG, GIF)</p>
                                </div>
                                <input type="file" id="images" name="images[]" accept="image/*" multiple hidden>
                            </div>
                            <div class="upload-preview" id="uploadPreview"></div>
                        </div>

                        <!-- Goal Amount -->
                        <div class="form-group">
                            <label class="form-label" for="goal_amount">
                                Goal Amount (₱)
                                <span class="required">*</span>
                            </label>
                            <div class="input-with-prefix">
                                <span class="input-prefix">₱</span>
                                <input
                                    type="number"
                                    id="goal_amount"
                                    name="goal_amount"
                                    class="form-input with-prefix @error('goal_amount') is-invalid @enderror"
                                    placeholder="50000"
                                    min="1000"
                                    max="10000000"
                                    value="{{ old('goal_amount', $data['goal_amount'] ?? '') }}"
                                    required
                                >
                            </div>
                            <p class="form-helper">Minimum: ₱1,000 | Maximum: ₱10,000,000</p>
                        </div>

                        <!-- Campaign Duration -->
                        <div class="form-group">
                            <label class="form-label" for="campaign_duration">
                                Campaign Duration
                                <span class="required">*</span>
                            </label>
                            <select id="campaign_duration" name="campaign_duration" class="form-select @error('campaign_duration') is-invalid @enderror" required>
                                <option value="">Select duration</option>
                                <option value="30" {{ old('campaign_duration', $data['campaign_duration'] ?? '30') == '30' ? 'selected' : '' }}>30 days (Recommended)</option>
                                <option value="60" {{ old('campaign_duration', $data['campaign_duration'] ?? '') == '60' ? 'selected' : '' }}>60 days</option>
                                <option value="90" {{ old('campaign_duration', $data['campaign_duration'] ?? '') == '90' ? 'selected' : '' }}>90 days</option>
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
                </div>

                <!-- Form Actions -->
                <div class="form-actions">
                    <a href="{{ route('fundraisers.index') }}" class="btn btn-outline btn-cancel">
                        Cancel
                    </a>
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
@endsection

@push('scripts')
<script>
    // Character counters
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const imagesInput = document.getElementById('images');
    const uploadArea = document.getElementById('uploadArea');
    const uploadPreview = document.getElementById('uploadPreview');

    let selectedFiles = [];

    if (titleInput) {
        titleInput.addEventListener('input', () => {
            document.getElementById('titleCharCount').textContent = titleInput.value.length;
        });
    }

    if (descriptionInput) {
        descriptionInput.addEventListener('input', () => {
            document.getElementById('descCharCount').textContent = descriptionInput.value.length;
        });
    }

    // Image upload handling
    if (uploadArea && imagesInput) {
        uploadArea.addEventListener('click', () => imagesInput.click());

        imagesInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            if (files.length > 5) {
                alert('You can only upload a maximum of 5 images');
                return;
            }
            displayImagePreviews(files);
        });
    }

    function displayImagePreviews(files) {
        uploadPreview.innerHTML = '';
        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const div = document.createElement('div');
                div.className = 'preview-item';
                div.innerHTML = `
                    <img src="${e.target.result}" alt="${file.name}" class="preview-image">
                    <button type="button" class="preview-remove" data-index="${index}" aria-label="Remove image">×</button>
                `;
                uploadPreview.appendChild(div);

                div.querySelector('.preview-remove').addEventListener('click', function() {
                    const dt = new DataTransfer();
                    const input = imagesInput;
                    const { files } = input;

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        if (index !== i)
                            dt.items.add(file);
                    }

                    input.files = dt.files;
                    div.remove();
                });
            };
            reader.readAsDataURL(file);
        });
    }
</script>
@endpush
