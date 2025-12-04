@extends('admin.layouts.app')

@section('title', 'Settings')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/settings.css') }}">
@endpush

@section('content')
<div x-data="settingsManager()">
    <div class="page-header">
        <h1 class="page-title">Settings</h1>
        <p class="page-subtitle">Manage platform configuration and preferences</p>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif

    <!-- Tabs -->
    <div class="tabs-container">
        <button class="tab-button" :class="{ 'active': activeTab === 'general' }" @click="switchTab('general')">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M12 1v6m0 6v6m5.2-13.2l-4.2 4.2m-4.2 0l-4.2-4.2m0 12.4l4.2-4.2m4.2 0l4.2 4.2M23 12h-6m-6 0H1"></path>
            </svg>
            General
        </button>
        <button class="tab-button" :class="{ 'active': activeTab === 'security' }" @click="switchTab('security')">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
            </svg>
            Security
        </button>
    </div>

    <!-- General Tab -->
    <div x-show="activeTab === 'general'" x-cloak>
        <div class="tab-header">
            <h2 class="tab-title">General Settings</h2>
            <p class="tab-description">Configure basic platform information and settings</p>
        </div>

        <form method="POST" action="{{ route('admin.settings.updateGeneral') }}" class="settings-form">
            @csrf

            <!-- Platform Information -->
            <div class="settings-section">
                <h2 class="section-title">Platform Information</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="platform_name">Platform Name</label>
                        <input type="text"
                               id="platform_name"
                               name="platform_name"
                               value="{{ old('platform_name', $settings['platform_name'] ?? 'iKonek') }}"
                               class="form-input @error('platform_name') error @enderror"
                               required>
                        @error('platform_name')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="platform_tagline">Tagline</label>
                        <input type="text"
                               id="platform_tagline"
                               name="platform_tagline"
                               value="{{ old('platform_tagline', $settings['platform_tagline'] ?? '') }}"
                               class="form-input @error('platform_tagline') error @enderror"
                               placeholder="Every Drop Counts. Every Click Matters.">
                        @error('platform_tagline')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="settings-section">
                <h2 class="section-title">Contact Information</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_email">Contact Email</label>
                        <input type="email"
                               id="contact_email"
                               name="contact_email"
                               value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                               class="form-input @error('contact_email') error @enderror"
                               required>
                        @error('contact_email')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contact_phone">Phone Number</label>
                        <input type="text"
                               id="contact_phone"
                               name="contact_phone"
                               value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                               class="form-input @error('contact_phone') error @enderror"
                               required>
                        @error('contact_phone')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="contact_address">Office Address</label>
                    <textarea id="contact_address"
                              name="contact_address"
                              class="form-input @error('contact_address') error @enderror"
                              rows="3"
                              required>{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                    @error('contact_address')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Regional Settings -->
            <div class="settings-section">
                <h2 class="section-title">Regional Settings</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="timezone">Timezone</label>
                        <select id="timezone"
                                name="timezone"
                                class="form-input @error('timezone') error @enderror"
                                required>
                            @foreach($timezones as $value => $label)
                            <option value="{{ $value }}"
                                    {{ old('timezone', $settings['timezone'] ?? 'Asia/Manila') === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                        @error('timezone')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="default_language">Default Language</label>
                        <select id="default_language"
                                name="default_language"
                                class="form-input @error('default_language') error @enderror"
                                required>
                            @foreach($languages as $value => $label)
                            <option value="{{ $value }}"
                                    {{ old('default_language', $settings['default_language'] ?? 'en') === $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                        @error('default_language')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- System Status -->
            <div class="settings-section">
                <h2 class="section-title">System Status</h2>
                <div class="maintenance-mode-wrapper">
                    <div class="maintenance-mode-info">
                        <div class="maintenance-mode-label">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="warning-icon">
                                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                <line x1="12" y1="9" x2="12" y2="13"></line>
                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                            </svg>
                            <div>
                                <strong>Maintenance Mode</strong>
                                <p>Enable this to put the site under maintenance</p>
                            </div>
                        </div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox"
                               name="maintenance_mode"
                               value="1"
                               {{ old('maintenance_mode', $settings['maintenance_mode'] ?? '0') === '1' ? 'checked' : '' }}>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>

            <!-- Admin Profile -->
            <div class="settings-section">
                <h2 class="section-title">Admin Profile</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="admin_name">Name</label>
                        <input type="text"
                               id="admin_name"
                               name="admin_name"
                               value="{{ old('admin_name', $admin->name) }}"
                               class="form-input @error('admin_name') error @enderror"
                               required>
                        @error('admin_name')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="admin_email">Email</label>
                        <input type="email"
                               id="admin_email"
                               name="admin_email"
                               value="{{ old('admin_email', $admin->email) }}"
                               class="form-input @error('admin_email') error @enderror"
                               required>
                        @error('admin_email')
                        <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Save Changes</button>
            </div>
        </form>
    </div>

    <!-- Security Tab -->
    <div x-show="activeTab === 'security'" x-cloak>
        <div class="tab-header">
            <h2 class="tab-title">Change Password</h2>
            <p class="tab-description">Update your admin account password</p>
        </div>

        <form method="POST" action="{{ route('admin.settings.updatePassword') }}" class="settings-form">
            @csrf

            <div class="settings-section">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <div class="password-input-wrapper">
                        <input :type="showCurrentPassword ? 'text' : 'password'"
                               id="current_password"
                               name="current_password"
                               class="form-input @error('current_password') error @enderror"
                               required>
                        <button type="button"
                                class="toggle-password"
                                @click="showCurrentPassword = !showCurrentPassword">
                            <svg x-show="!showCurrentPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg x-show="showCurrentPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" x-cloak>
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('current_password')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <div class="password-input-wrapper">
                        <input :type="showNewPassword ? 'text' : 'password'"
                               id="new_password"
                               name="new_password"
                               class="form-input @error('new_password') error @enderror"
                               required>
                        <button type="button"
                                class="toggle-password"
                                @click="showNewPassword = !showNewPassword">
                            <svg x-show="!showNewPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg x-show="showNewPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" x-cloak>
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('new_password')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <div class="password-input-wrapper">
                        <input :type="showConfirmPassword ? 'text' : 'password'"
                               id="new_password_confirmation"
                               name="new_password_confirmation"
                               class="form-input @error('new_password_confirmation') error @enderror"
                               required>
                        <button type="button"
                                class="toggle-password"
                                @click="showConfirmPassword = !showConfirmPassword">
                            <svg x-show="!showConfirmPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg x-show="showConfirmPassword" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" x-cloak>
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('new_password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Update Password</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function settingsManager() {
    return {
        activeTab: '{{ $activeTab }}',
        showCurrentPassword: false,
        showNewPassword: false,
        showConfirmPassword: false,

        switchTab(tab) {
            this.activeTab = tab;
            // Update URL without reload
            const url = new URL(window.location);
            url.searchParams.set('tab', tab);
            window.history.pushState({}, '', url);
        }
    }
}
</script>
@endpush
