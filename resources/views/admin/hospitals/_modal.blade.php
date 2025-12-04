<div x-data="hospitalFormData()" x-init="init()">
    <!-- Custom Modal -->
    <div x-show="showModal"
         x-cloak
         style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; overflow-y: auto; padding: 24px;">
        <!-- Backdrop -->
        <div x-show="showModal"
             @click="closeModal()"
             style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 9998;"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
        </div>

        <!-- Modal Content -->
        <div x-show="showModal"
             style="position: relative; margin: 40px auto; max-width: 800px; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); z-index: 9999; overflow: hidden;"
             @click.away="closeModal()"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">

            <!-- Close Button -->
            <button type="button" @click="closeModal()" style="position: absolute; top: 20px; right: 20px; width: 32px; height: 32px; border-radius: 6px; border: none; background: #f1f5f9; color: #64748b; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; z-index: 10;" onmouseover="this.style.background='#e2e8f0'; this.style.color='#1e293b';" onmouseout="this.style.background='#f1f5f9'; this.style.color='#64748b';">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            <form x-bind:action="editMode ? updateUrl : storeUrl" method="POST" @submit="handleSubmit" autocomplete="off" style="padding: 32px 24px 24px 24px;">
                <!-- Title -->
                <h2 style="font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;" x-text="editMode ? 'Edit Hospital Details' : 'Add New Hospital'"></h2>
                <p style="font-size: 14px; color: #64748b; margin: 0 0 24px 0;" x-text="editMode ? ('Update the information for ' + (formData.name || 'the hospital')) : 'Enter the details of the new partner hospital'"></p>
                @csrf
                <input type="hidden" x-ref="methodInput" name="_method" x-bind:value="editMode ? 'PATCH' : 'POST'">

                <!-- Form Content -->
                <!-- Hospital Name -->
                <div class="form-group">
                    <label for="hospital-name">Hospital Name <span class="required">*</span></label>
                    <input type="text" id="hospital-name" name="name" class="form-input"
                           x-model="formData.name" required>
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="hospital-address">Address <span class="required">*</span></label>
                    <input type="text" id="hospital-address" name="address" class="form-input"
                           x-model="formData.address" required>
                    @error('address')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- City & Region -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="hospital-city">City <span class="required">*</span></label>
                        <input type="text" id="hospital-city" name="city" class="form-input"
                               x-model="formData.city" required>
                        @error('city')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hospital-region">Region <span class="required">*</span></label>
                        <select id="hospital-region" name="region" class="form-select"
                                x-model="formData.region" required>
                            <option value="">Select region</option>
                            @foreach($regions as $region)
                                <option value="{{ $region }}">{{ $region }}</option>
                            @endforeach
                        </select>
                        @error('region')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Phone & Email -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="hospital-phone">Phone Number</label>
                        <input type="text" id="hospital-phone" name="contact_number" class="form-input"
                               x-model="formData.contact_number" placeholder="(02) 1234-5678">
                        @error('contact_number')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hospital-email">Email Address</label>
                        <input type="email" id="hospital-email" name="email" class="form-input"
                               x-model="formData.email" placeholder="info@hospital.ph">
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Blood Types Accepted -->
                <div class="form-group">
                    <label>Blood Types Accepted</label>
                    <div class="blood-types-grid">
                        @foreach(['O+', 'O-', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'] as $type)
                            <label class="checkbox-inline">
                                <input type="checkbox"
                                       name="blood_types_available[]"
                                       value="{{ $type }}"
                                       x-model="formData.blood_types">
                                <span>{{ $type }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('blood_types_available')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Operating Hours & Monthly Capacity -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="hospital-hours">Operating Hours</label>
                        <input type="text" id="hospital-hours" name="operating_hours" class="form-input"
                               x-model="formData.operating_hours" placeholder="e.g., 24/7, MON-FRI 8AM-5PM">
                        @error('operating_hours')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hospital-capacity">Monthly Capacity</label>
                        <input type="number" id="hospital-capacity" name="monthly_capacity" class="form-input"
                               x-model="formData.monthly_capacity" min="0" placeholder="Number of donations per month">
                        @error('monthly_capacity')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="hospital-status">Status <span class="required">*</span></label>
                    <select id="hospital-status" name="status" class="form-select"
                            x-model="formData.status" required>
                        <option value="active">Active</option>
                        <option value="pending">Pending Review</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Buttons -->
                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                    <button type="button" @click="closeModal()" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-primary" x-text="editMode ? 'Save Changes' : 'Add Hospital'"></button>
                </div>
            </form>

        </div>
    </div>
</div>

@push('scripts')
<script>
function hospitalFormData() {
    return {
        showModal: false,
        editMode: false,
        hospitalId: null,
        storeUrl: '{{ route("admin.hospitals.store") }}',
        updateUrl: '',
        formData: {
            name: '',
            address: '',
            city: '',
            region: '',
            contact_number: '',
            email: '',
            blood_types: [],
            operating_hours: '',
            monthly_capacity: '',
            status: 'pending'
        },

        init() {
            console.log('Hospital form modal initialized');

            // Watch for showModal changes to control body scroll
            this.$watch('showModal', value => {
                if (value) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });

            // Listen for modal open events
            window.addEventListener('open-hospital-modal', (event) => {
                console.log('open-hospital-modal event received', event.detail);
                if (event.detail.mode === 'create') {
                    console.log('Opening create modal');
                    this.resetForm();
                    this.editMode = false;
                    this.showModal = true;
                } else if (event.detail.mode === 'edit' && event.detail.hospital) {
                    console.log('Opening edit modal');
                    this.loadHospitalData(event.detail.hospital);
                    this.editMode = true;
                    this.hospitalId = event.detail.hospital.id;
                    this.updateUrl = `/admin/hospitals/${event.detail.hospital.id}`;
                    this.showModal = true;
                }
            });

            // Auto-open modal if there are validation errors
            @if($errors->any())
                this.showModal = true;
                @if(old('_method') === 'PATCH' && request()->route('hospital'))
                    this.loadHospitalData(@json(request()->route('hospital')));
                    this.editMode = true;
                    this.hospitalId = {{ request()->route('hospital')->id ?? 'null' }};
                    this.updateUrl = `/admin/hospitals/{{ request()->route('hospital')->id ?? '' }}`;
                @else
                    this.formData.name = '{{ old('name') }}';
                    this.formData.address = '{{ old('address') }}';
                    this.formData.city = '{{ old('city') }}';
                    this.formData.region = '{{ old('region') }}';
                    this.formData.contact_number = '{{ old('contact_number') }}';
                    this.formData.email = '{{ old('email') }}';
                    this.formData.operating_hours = '{{ old('operating_hours') }}';
                    this.formData.monthly_capacity = '{{ old('monthly_capacity') }}';
                    this.formData.status = '{{ old('status', 'pending') }}';
                    this.formData.blood_types = @json(old('blood_types_available', []));
                @endif
            @endif
        },

        resetForm() {
            this.formData = {
                name: '',
                address: '',
                city: '',
                region: '',
                contact_number: '',
                email: '',
                blood_types: [],
                operating_hours: '',
                monthly_capacity: '',
                status: 'pending'
            };
            this.hospitalId = null;
            this.editMode = false;
        },

        loadHospitalData(hospital) {
            this.formData = {
                name: hospital.name || '',
                address: hospital.address || '',
                city: hospital.city || '',
                region: hospital.region || '',
                contact_number: hospital.contact_number || '',
                email: hospital.email || '',
                blood_types: hospital.blood_types_available || [],
                operating_hours: hospital.operating_hours || '',
                monthly_capacity: hospital.monthly_capacity || '',
                status: hospital.status || 'pending'
            };
        },

        closeModal() {
            this.showModal = false;
            setTimeout(() => this.resetForm(), 300); // Reset after modal closes
        },

        handleSubmit(e) {
            // Let the form submit normally
            // Laravel will handle validation and redirect
        }
    }
}
</script>
@endpush
