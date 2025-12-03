<div class="form-container">
    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Basic Information -->
    <div class="form-section">
        <h2 class="form-section-title">Basic Information</h2>
        <div class="form-section-content">
            <div class="form-group">
                <label for="name" class="form-label">Hospital Name <span class="required">*</span></label>
                <input type="text" id="name" name="name" class="form-input"
                       value="{{ old('name', $hospital->name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status <span class="required">*</span></label>
                <select id="status" name="status" class="form-select" required>
                    <option value="active" {{ old('status', $hospital->status ?? 'pending') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="pending" {{ old('status', $hospital->status ?? 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="inactive" {{ old('status', $hospital->status ?? 'pending') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Location Information -->
    <div class="form-section">
        <h2 class="form-section-title">Location Information</h2>
        <div class="form-section-content">
            <div class="form-group">
                <label for="address" class="form-label">Address <span class="required">*</span></label>
                <textarea id="address" name="address" class="form-textarea" rows="3" required>{{ old('address', $hospital->address ?? '') }}</textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="city" class="form-label">City <span class="required">*</span></label>
                    <input type="text" id="city" name="city" class="form-input"
                           value="{{ old('city', $hospital->city ?? '') }}" required>
                </div>

                <div class="form-group">
                    <label for="province" class="form-label">Province <span class="required">*</span></label>
                    <input type="text" id="province" name="province" class="form-input"
                           value="{{ old('province', $hospital->province ?? '') }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="number" id="latitude" name="latitude" class="form-input"
                           step="0.00000001" min="-90" max="90"
                           value="{{ old('latitude', $hospital->latitude ?? '') }}"
                           placeholder="e.g., 14.5995">
                    <small class="form-help">Optional: GPS coordinate for map display</small>
                </div>

                <div class="form-group">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="number" id="longitude" name="longitude" class="form-input"
                           step="0.00000001" min="-180" max="180"
                           value="{{ old('longitude', $hospital->longitude ?? '') }}"
                           placeholder="e.g., 120.9842">
                    <small class="form-help">Optional: GPS coordinate for map display</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="form-section">
        <h2 class="form-section-title">Contact Information</h2>
        <div class="form-section-content">
            <div class="form-group">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" class="form-input"
                       value="{{ old('contact_number', $hospital->contact_number ?? '') }}"
                       placeholder="e.g., +63 912 345 6789">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-input"
                       value="{{ old('email', $hospital->email ?? '') }}"
                       placeholder="e.g., info@hospital.com">
            </div>

            <div class="form-group">
                <label for="website" class="form-label">Website</label>
                <input type="url" id="website" name="website" class="form-input"
                       value="{{ old('website', $hospital->website ?? '') }}"
                       placeholder="e.g., https://www.hospital.com">
            </div>
        </div>
    </div>

    <!-- Operational Information -->
    <div class="form-section">
        <h2 class="form-section-title">Operational Information</h2>
        <div class="form-section-content">
            <div class="form-group">
                <label class="form-checkbox-wrapper">
                    <input type="hidden" name="is_24_7" value="0">
                    <input type="checkbox" id="is_24_7" name="is_24_7" value="1"
                           {{ old('is_24_7', $hospital->is_24_7 ?? false) ? 'checked' : '' }}>
                    <span class="form-checkbox-label">24/7 Operation</span>
                </label>
                <small class="form-help">Check if the hospital operates 24 hours a day, 7 days a week</small>
            </div>

            <div class="form-group">
                <label class="form-label">Blood Types Available</label>
                <div class="blood-types-checkboxes">
                    @php
                        $bloodTypes = ['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];
                        $selectedTypes = old('blood_types_available', $hospital->blood_types_available ?? []);
                    @endphp
                    @foreach($bloodTypes as $type)
                        <label class="form-checkbox-inline">
                            <input type="checkbox" name="blood_types_available[]" value="{{ $type }}"
                                   {{ in_array($type, (array)$selectedTypes) ? 'checked' : '' }}>
                            <span>{{ $type }}</span>
                        </label>
                    @endforeach
                </div>
                <small class="form-help">Select all blood types that this hospital can provide or accept</small>
            </div>
        </div>
    </div>

    <!-- Capacity Information -->
    <div class="form-section">
        <h2 class="form-section-title">Capacity Information</h2>
        <div class="form-section-content">
            <div class="form-group">
                <label for="bed_capacity" class="form-label">Total Bed Capacity</label>
                <input type="number" id="bed_capacity" name="bed_capacity" class="form-input"
                       min="0" value="{{ old('bed_capacity', $hospital->bed_capacity ?? '') }}"
                       placeholder="e.g., 100">
                <small class="form-help">Total number of beds available in the hospital</small>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="available_beds_this_week" class="form-label">Available Beds (This Week)</label>
                    <input type="number" id="available_beds_this_week" name="available_beds_this_week"
                           class="form-input" min="0"
                           value="{{ old('available_beds_this_week', $hospital->available_beds_this_week ?? '') }}"
                           placeholder="e.g., 15">
                </div>

                <div class="form-group">
                    <label for="available_beds_this_month" class="form-label">Available Beds (This Month)</label>
                    <input type="number" id="available_beds_this_month" name="available_beds_this_month"
                           class="form-input" min="0"
                           value="{{ old('available_beds_this_month', $hospital->available_beds_this_month ?? '') }}"
                           placeholder="e.g., 25">
                </div>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" stroke="currentColor" stroke-width="2"/>
                <polyline points="17 21 17 13 7 13 7 21" stroke="currentColor" stroke-width="2"/>
                <polyline points="7 3 7 8 15 8" stroke="currentColor" stroke-width="2"/>
            </svg>
            {{ isset($hospital) ? 'Update Hospital' : 'Create Hospital' }}
        </button>
        <a href="{{ route('admin.hospitals.index') }}" class="btn btn-secondary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                <line x1="19" y1="12" x2="5" y2="12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                <polyline points="12 19 5 12 12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            Cancel
        </a>
    </div>
</div>
