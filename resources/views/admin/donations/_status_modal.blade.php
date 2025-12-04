<div x-data="statusModalData()" x-init="init()">
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

            <form :action="`/admin/donations/${donationId}/update-status`" method="POST" @submit="handleSubmit" autocomplete="off" style="padding: 32px 24px 24px 24px;">
                <!-- Title -->
                <h2 style="font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;">Update Donation Status</h2>
                <p style="font-size: 14px; color: #64748b; margin: 0 0 24px 0;">Manage the status of this blood donation record</p>

                @csrf
                <input type="hidden" name="status" x-model="selectedStatus">

                <!-- Donation Info (Read-only) -->
                <div class="modal-info-section">
                    <div class="info-row">
                        <span class="info-label">Donor:</span>
                        <span class="info-value" x-text="donationData.donor_name"></span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Blood Type:</span>
                        <span class="blood-type-badge-small" x-text="donationData.blood_type"></span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Hospital:</span>
                        <span class="info-value" x-text="donationData.hospital_name"></span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Scheduled Date:</span>
                        <span class="info-value" x-text="donationData.scheduled_date"></span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Current Status:</span>
                        <span class="status-badge-small" :class="'badge-' + donationData.status" x-text="donationData.status_display"></span>
                    </div>
                </div>

                <!-- Update Notes -->
                <div class="form-group" style="margin-top: 24px;">
                    <label for="status-notes" style="display: block; font-size: 14px; font-weight: 500; color: #1e293b; margin-bottom: 8px;">Update Notes</label>
                    <textarea id="status-notes" name="notes" x-model="notes" class="form-textarea"
                              placeholder="Add notes about this status update..." rows="3"></textarea>
                </div>

                <!-- Action Buttons Grid -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 24px;">
                    <button type="button" @click="selectStatus('verified')"
                            style="padding: 12px; border: none; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.2s; background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(16, 185, 129, 0.3)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                        Mark as Verified
                    </button>

                    <button type="button" @click="selectStatus('failed')"
                            style="padding: 12px; border: none; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.2s; background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;"
                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)';"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                        Mark as Failed
                    </button>

                    <button type="button" @click="selectStatus('pending')"
                            style="padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.2s; background: white; color: #64748b;"
                            onmouseover="this.style.background='#f9fafb'; this.style.borderColor='#d1d5db';"
                            onmouseout="this.style.background='white'; this.style.borderColor='#e5e7eb';">
                        Set to Pending
                    </button>

                    <button type="button" @click="selectStatus('cancelled')"
                            style="padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.2s; background: white; color: #64748b;"
                            onmouseover="this.style.background='#f9fafb'; this.style.borderColor='#d1d5db';"
                            onmouseout="this.style.background='white'; this.style.borderColor='#e5e7eb';">
                        Mark as Cancelled
                    </button>
                </div>

                <!-- Footer -->
                <div style="display: flex; justify-content: flex-end; margin-top: 24px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                    <button type="button" @click="closeModal()" class="btn btn-secondary">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function statusModalData() {
    return {
        showModal: false,
        selectedStatus: '',
        notes: '',
        donationId: null,
        donationData: {
            donor_name: '',
            blood_type: '',
            hospital_name: '',
            scheduled_date: '',
            status: '',
            status_display: ''
        },

        init() {
            // Watch for modal state changes
            this.$watch('showModal', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });

            // Listen for modal open events
            window.addEventListener('open-status-modal', (event) => {
                console.log('open-status-modal event received', event.detail);
                if (event.detail.donation) {
                    this.loadDonationData(event.detail.donation);
                    this.showModal = true;
                }
            });
        },

        loadDonationData(donation) {
            this.donationId = donation.id;
            this.donationData = {
                donor_name: `${donation.user.first_name} ${donation.user.middle_name || ''} ${donation.user.last_name}`.trim(),
                blood_type: donation.blood_type,
                hospital_name: donation.hospital.name,
                scheduled_date: donation.appointment ? new Date(donation.appointment.appointment_date).toLocaleString() : 'N/A',
                status: donation.status,
                status_display: donation.status.charAt(0).toUpperCase() + donation.status.slice(1)
            };
            this.notes = '';
            this.selectedStatus = '';
        },

        selectStatus(status) {
            this.selectedStatus = status;
            // Submit form immediately after selecting status
            this.$el.querySelector('form').submit();
        },

        closeModal() {
            this.showModal = false;
            setTimeout(() => {
                this.notes = '';
                this.selectedStatus = '';
                this.donationId = null;
            }, 300);
        },

        handleSubmit(e) {
            if (!this.selectedStatus) {
                e.preventDefault();
                alert('Please select a status by clicking one of the action buttons.');
            }
        }
    }
}
</script>
@endpush
