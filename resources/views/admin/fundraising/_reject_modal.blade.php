<div x-data="rejectModalData()" x-init="init()" x-cloak>
    <!-- Modal Wrapper -->
    <div x-show="showModal"
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
             style="position: relative; margin: 40px auto; max-width: 500px; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); z-index: 9999;"
             @click.away="closeModal()"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">

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

            <form :action="'/admin/contributions/' + contributionId + '/reject'" method="POST" style="padding: 32px 24px 24px 24px;">
                @csrf

                <!-- Title -->
                <div style="text-align: center; margin-bottom: 24px;">
                    <div style="width: 56px; height: 56px; border-radius: 50%; background: #fee2e2; color: #ef4444; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px;">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                    </div>
                    <h2 style="font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;">Reject Contribution</h2>
                    <p style="font-size: 14px; color: #64748b; margin: 0;">Please provide a reason for rejecting this contribution. This will be recorded in the system.</p>
                </div>

                <!-- Reason Textarea -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; font-weight: 500; color: #1e293b; margin-bottom: 6px;">
                        Reason for Rejection <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea name="notes" rows="4" required
                              style="width: 100%; padding: 12px 14px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-family: inherit; resize: vertical; transition: all 0.2s;"
                              placeholder="e.g., Invalid payment proof, duplicate submission, suspicious activity..."
                              onfocus="this.style.borderColor='#ef4444'; this.style.boxShadow='0 0 0 3px rgba(239, 68, 68, 0.1)';"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none';"></textarea>
                    <p style="font-size: 12px; color: #64748b; margin: 6px 0 0 0;">The donor will be notified of this rejection.</p>
                </div>

                <!-- Warning Message -->
                <div style="background: #fef3c7; border: 1px solid #fde68a; border-radius: 8px; padding: 12px; margin-bottom: 20px;">
                    <div style="display: flex; gap: 12px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" style="flex-shrink: 0;">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                        <div style="flex: 1;">
                            <p style="font-size: 13px; font-weight: 500; color: #92400e; margin: 0 0 4px 0;">Warning</p>
                            <p style="font-size: 13px; color: #92400e; margin: 0;">This action cannot be undone. The contribution will be permanently marked as rejected.</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div style="display: flex; justify-content: flex-end; gap: 12px; padding-top: 16px; border-top: 1px solid #e5e7eb;">
                    <button type="button" @click="closeModal()"
                            style="padding: 10px 20px; background: white; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-weight: 500; color: #64748b; cursor: pointer; transition: all 0.2s;"
                            onmouseover="this.style.background='#f9fafb'; this.style.borderColor='#d1d5db';"
                            onmouseout="this.style.background='white'; this.style.borderColor='#e5e7eb';">
                        Cancel
                    </button>
                    <button type="submit"
                            style="padding: 10px 20px; background: #ef4444; color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.2s;"
                            onmouseover="this.style.background='#dc2626'; this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)';"
                            onmouseout="this.style.background='#ef4444'; this.style.transform=''; this.style.boxShadow='';">
                        Reject Contribution
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function rejectModalData() {
    return {
        showModal: false,
        contributionId: null,

        init() {
            this.$watch('showModal', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });

            window.addEventListener('open-reject-modal', (event) => {
                if (event.detail.contributionId) {
                    this.contributionId = event.detail.contributionId;
                    this.showModal = true;
                }
            });
        },

        closeModal() {
            this.showModal = false;
            this.contributionId = null;
        }
    }
}
</script>
@endpush
