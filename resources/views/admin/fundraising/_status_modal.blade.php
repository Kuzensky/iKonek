<div x-data="statusModalData()" x-init="init()" x-cloak>
    <!-- Modal Wrapper -->
    <div x-show="showModal"
         style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 9999; overflow-y: auto;">

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
             style="position: relative; width: 90%; max-width: 480px; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); z-index: 9999; margin: 40px auto;"
             @click.stop
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">

            <!-- Close Button -->
            <button type="button" @click="closeModal()"
                    style="position: absolute; top: 16px; right: 16px; width: 28px; height: 28px; border-radius: 6px; border: none; background: transparent; color: #64748b; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; z-index: 10; font-size: 24px; line-height: 1;">
                ×
            </button>

            <form :action="'/admin/fundraising/' + campaignId + '/update-status'" method="POST" style="padding: 28px 24px 24px 24px;">
                @csrf

                <!-- Header -->
                <div style="margin-bottom: 24px; padding-bottom: 20px; border-bottom: 2px solid #f1f5f9;">
                    <h2 style="font-size: 20px; font-weight: 700; color: #1e293b; margin: 0 0 6px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; letter-spacing: -0.02em;">Update Campaign Status</h2>
                    <p style="font-size: 14px; color: #64748b; margin: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Manage the status of this fundraising campaign</p>
                </div>

                <!-- Campaign Info -->
                <div style="margin-bottom: 24px; padding: 16px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-radius: 10px; border: 1px solid #e2e8f0;">
                    <h3 style="font-size: 15px; font-weight: 600; color: #1e293b; margin: 0 0 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; word-break: break-word;" x-text="campaignTitle"></h3>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 13px; color: #64748b; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Current status:</span>
                        <span style="display: inline-flex; align-items: center; gap: 5px; padding: 5px 12px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; border-radius: 20px; font-size: 12px; font-weight: 600; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; box-shadow: 0 2px 6px rgba(16, 185, 129, 0.3);">
                            <svg width="8" height="8" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="12" r="12"></circle>
                            </svg>
                            <span x-text="currentStatus"></span>
                        </span>
                    </div>
                </div>

                <!-- Hidden Status Input -->
                <input type="hidden" name="status" x-model="selectedStatus">

                <!-- Update Notes -->
                <div style="margin-bottom: 24px;">
                    <label style="display: block; font-size: 14px; font-weight: 600; color: #1e293b; margin-bottom: 10px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
                        Update Notes (Optional)
                    </label>
                    <textarea name="notes" rows="3"
                              style="width: 100%; padding: 12px 14px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; resize: vertical; transition: all 0.2s; box-sizing: border-box; background: #f8fafc;"
                              placeholder="Add notes about this status update..."
                              onfocus="this.style.borderColor='#3b82f6'; this.style.boxShadow='0 0 0 4px rgba(59, 130, 246, 0.1)'; this.style.background='white';"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'; this.style.background='#f8fafc';"></textarea>
                </div>

                <!-- Action Buttons Grid -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;">
                    <!-- Approve & Activate -->
                    <button type="button" @click="selectStatus('active')"
                            :style="selectedStatus === 'active' ? 'background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white; border: none; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4); transform: translateY(-2px);' : 'background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); color: #059669; border: none; box-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);'"
                            style="padding: 14px 18px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;"
                            onmouseover="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 8px rgba(16, 185, 129, 0.2)'; }"
                            onmouseout="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(16, 185, 129, 0.1)'; }">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        Approve & Activate
                    </button>

                    <!-- Mark as Completed -->
                    <button type="button" @click="selectStatus('completed')"
                            :style="selectedStatus === 'completed' ? 'background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white; border: none; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4); transform: translateY(-2px);' : 'background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); color: #2563eb; border: none; box-shadow: 0 2px 4px rgba(59, 130, 246, 0.1);'"
                            style="padding: 14px 18px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;"
                            onmouseover="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 8px rgba(59, 130, 246, 0.2)'; }"
                            onmouseout="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(59, 130, 246, 0.1)'; }">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        Mark as Completed
                    </button>

                    <!-- Suspend Campaign -->
                    <button type="button" @click="selectStatus('suspended')"
                            :style="selectedStatus === 'suspended' ? 'background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); color: white; border: none; box-shadow: 0 4px 12px rgba(249, 115, 22, 0.4); transform: translateY(-2px);' : 'background: linear-gradient(135deg, #fed7aa 0%, #fdba74 100%); color: #ea580c; border: none; box-shadow: 0 2px 4px rgba(249, 115, 22, 0.1);'"
                            style="padding: 14px 18px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;"
                            onmouseover="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 8px rgba(249, 115, 22, 0.2)'; }"
                            onmouseout="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(249, 115, 22, 0.1)'; }">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        Suspend Campaign
                    </button>

                    <!-- Cancel Campaign -->
                    <button type="button" @click="selectStatus('cancelled')"
                            :style="selectedStatus === 'cancelled' ? 'background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; border: none; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4); transform: translateY(-2px);' : 'background: linear-gradient(135deg, #fecaca 0%, #fca5a5 100%); color: #dc2626; border: none; box-shadow: 0 2px 4px rgba(239, 68, 68, 0.1);'"
                            style="padding: 14px 18px; border-radius: 10px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;"
                            onmouseover="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 8px rgba(239, 68, 68, 0.2)'; }"
                            onmouseout="if(!this.style.transform.includes('translateY(-2px)')) { this.style.transform=''; this.style.boxShadow='0 2px 4px rgba(239, 68, 68, 0.1)'; }">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        Cancel Campaign
                    </button>
                </div>

                <!-- Footer -->
                <div style="display: flex; justify-content: flex-end; padding-top: 16px; border-top: 1px solid #e5e7eb;">
                    <button type="submit"
                            :disabled="!selectedStatus"
                            :style="!selectedStatus ? 'opacity: 0.5; cursor: not-allowed; background: #e5e7eb; color: #94a3b8;' : 'background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); color: white; box-shadow: 0 4px 12px rgba(30, 41, 59, 0.3);'"
                            style="padding: 12px 32px; border: none; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;"
                            onmouseover="if (!this.disabled) { this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(30, 41, 59, 0.4)'; }"
                            onmouseout="if (!this.disabled) { this.style.transform=''; this.style.boxShadow='0 4px 12px rgba(30, 41, 59, 0.3)'; }">
                        Update Status
                    </button>
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
        campaignId: null,
        campaignTitle: '',
        currentStatus: '',
        selectedStatus: '',

        init() {
            this.$watch('showModal', value => {
                document.body.style.overflow = value ? 'hidden' : '';
                if (!value) {
                    this.selectedStatus = '';
                }
            });

            window.addEventListener('open-status-modal', (event) => {
                if (event.detail.campaignId) {
                    this.campaignId = event.detail.campaignId;
                    this.campaignTitle = event.detail.campaignTitle || 'Campaign';
                    this.currentStatus = event.detail.currentStatus || 'Active';
                    this.showModal = true;
                }
            });
        },

        selectStatus(status) {
            this.selectedStatus = status;
        },

        closeModal() {
            this.showModal = false;
            this.campaignId = null;
            this.campaignTitle = '';
            this.currentStatus = '';
            this.selectedStatus = '';
        }
    }
}
</script>
@endpush
