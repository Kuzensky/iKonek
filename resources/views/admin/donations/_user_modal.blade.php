<div x-data="userModalData()" x-init="init()">
    <!-- Modal Wrapper -->
    <div x-show="showModal" x-cloak
         style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; overflow-y: auto; padding: 24px;">

        <!-- Backdrop -->
        <div x-show="showModal" @click="closeModal()"
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
             style="position: relative; margin: 40px auto; max-width: 600px; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); z-index: 9999;"
             @click.away="closeModal()"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">

            <!-- Close Button -->
            <button type="button" @click="closeModal()"
                    style="position: absolute; top: 20px; right: 20px; width: 32px; height: 32px; border-radius: 6px; border: none; background: #f1f5f9; color: #64748b; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; z-index: 10;"
                    onmouseover="this.style.background='#e2e8f0'; this.style.color='#1e293b';"
                    onmouseout="this.style.background='#f1f5f9'; this.style.color='#64748b';">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

            <div style="padding: 32px 24px 24px 24px;">
                <!-- Title -->
                <h2 style="font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0;">User Details</h2>
                <p style="font-size: 14px; color: #64748b; margin: 0 0 24px 0;" x-text="'Complete information for ' + userData.name"></p>

                <!-- User Header -->
                <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
                    <div style="width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%); color: #dc2626; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 18px; flex-shrink: 0;"
                         x-text="userData.initials">
                    </div>
                    <div style="flex: 1;">
                        <h3 style="font-size: 18px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;" x-text="userData.name"></h3>
                        <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                            <span x-show="userData.verified" style="padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 500; background: #d1fae5; color: #065f46; line-height: 1; display: inline-flex; align-items: center; justify-content: center; height: 24px;">Active</span>
                            <span x-show="userData.blood_type" style="padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 600; background: #fecaca; color: #dc2626; border: 1px solid #fca5a5; line-height: 1; display: inline-flex; align-items: center; justify-content: center; height: 24px;" x-text="userData.blood_type"></span>
                            <span x-show="userData.verified" style="padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 500; background: #dbeafe; color: #1e40af; line-height: 1; display: inline-flex; align-items: center; justify-content: center; height: 24px; white-space: nowrap;">Verified</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div style="margin-bottom: 24px;">
                    <h4 style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 12px 0;">Contact Information</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0;">Email</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0;" x-text="userData.email"></p>
                        </div>
                        <div x-show="userData.phone">
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0;">Phone</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0;" x-text="userData.phone"></p>
                        </div>
                    </div>
                    <div x-show="userData.address" style="margin-top: 12px;">
                        <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0;">Address</p>
                        <p style="font-size: 14px; color: #1e293b; margin: 0;" x-text="userData.address"></p>
                    </div>
                </div>

                <!-- Donation Statistics -->
                <div style="margin-bottom: 24px;">
                    <h4 style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 12px 0;">Donation Statistics</h4>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;">
                        <div style="text-align: center; padding: 16px; background: #f8fafc; border-radius: 8px;">
                            <p style="font-size: 24px; font-weight: 700; color: #ef4444; margin: 0 0 4px 0;" x-text="userData.donations_count"></p>
                            <p style="font-size: 12px; color: #64748b; margin: 0;">Total Donations</p>
                        </div>
                        <div style="text-align: center; padding: 16px; background: #f8fafc; border-radius: 8px;">
                            <p style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0;" x-text="userData.last_donation"></p>
                            <p style="font-size: 12px; color: #64748b; margin: 0;">Last Donation</p>
                        </div>
                        <div style="text-align: center; padding: 16px; background: #f8fafc; border-radius: 8px;">
                            <p style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0;" x-text="userData.member_since"></p>
                            <p style="font-size: 12px; color: #64748b; margin: 0;">Member Since</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div style="display: flex; justify-content: flex-end; padding-top: 16px; border-top: 1px solid #e5e7eb;">
                    <button type="button" @click="closeModal()"
                            style="padding: 10px 20px; background: white; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-weight: 500; color: #64748b; cursor: pointer; transition: all 0.2s;"
                            onmouseover="this.style.background='#f9fafb'; this.style.borderColor='#d1d5db';"
                            onmouseout="this.style.background='white'; this.style.borderColor='#e5e7eb';">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function userModalData() {
    return {
        showModal: false,
        userData: {
            name: '',
            initials: '',
            email: '',
            phone: '',
            address: '',
            blood_type: '',
            verified: false,
            donations_count: 0,
            last_donation: 'Never',
            member_since: ''
        },

        init() {
            // Watch for modal state changes
            this.$watch('showModal', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });

            // Listen for modal open events
            window.addEventListener('open-user-modal', (event) => {
                console.log('open-user-modal event received', event.detail);
                if (event.detail.user) {
                    this.loadUserData(event.detail.user);
                    this.showModal = true;
                }
            });
        },

        loadUserData(user) {
            this.userData = {
                name: `${user.first_name} ${user.middle_name || ''} ${user.last_name}`.trim(),
                initials: (user.first_name?.charAt(0) || '') + (user.last_name?.charAt(0) || ''),
                email: user.email,
                phone: user.contact_number || '',
                address: user.address || 'N/A',
                blood_type: user.blood_type || '',
                verified: !!user.email_verified_at,
                donations_count: user.donations_count || 0,
                last_donation: user.last_donation || 'Never',
                member_since: user.created_at ? new Date(user.created_at).toLocaleDateString() : 'N/A'
            };
        },

        closeModal() {
            this.showModal = false;
        }
    }
}
</script>
@endpush
