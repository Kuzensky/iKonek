<div x-data="statusModalData()" x-init="init()" x-cloak>
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

    <!-- Modal Wrapper -->
    <div x-show="showModal"
         style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; width: 90%; max-width: 480px; pointer-events: auto;"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate(-50%, -50%) scale(0.95)"
         x-transition:enter-end="opacity-100 transform translate(-50%, -50%) scale(1)"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate(-50%, -50%) scale(1)"
         x-transition:leave-end="opacity-0 transform translate(-50%, -50%) scale(0.95)">

        <!-- Modal Content -->
        <div style="position: relative; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);"
             @click.stop>

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

                <!-- Action Buttons - 2x2 Grid -->
                <div style="margin-bottom: 20px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <!-- Approve & Activate (Primary - Green) -->
                        <button type="button" @click="selectStatus('active')" class="status-action-btn status-primary-green"
                                :class="{'status-selected': selectedStatus === 'active'}">
                            Approve & Activate
                        </button>

                        <!-- Mark as Completed (Primary - Red) -->
                        <button type="button" @click="selectStatus('completed')" class="status-action-btn status-primary-red"
                                :class="{'status-selected': selectedStatus === 'completed'}">
                            Mark as Completed
                        </button>

                        <!-- Suspend Campaign (Secondary - Ghost) -->
                        <button type="button" @click="selectStatus('suspended')" class="status-action-btn status-ghost"
                                :class="{'status-selected-ghost': selectedStatus === 'suspended'}">
                            Suspend Campaign
                        </button>

                        <!-- Mark as Cancelled (Secondary - Ghost) -->
                        <button type="button" @click="selectStatus('cancelled')" class="status-action-btn status-ghost"
                                :class="{'status-selected-ghost': selectedStatus === 'cancelled'}">
                            Mark as Cancelled
                        </button>
                    </div>
                </div>

                <style>
                    /* Base button styles */
                    .status-action-btn {
                        padding: 16px 20px !important;
                        border-radius: 6px !important;
                        font-size: 15px !important;
                        font-weight: 600 !important;
                        cursor: pointer !important;
                        transition: all 0.2s ease !important;
                        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
                        border: none !important;
                        outline: none !important;
                        box-sizing: border-box !important;
                    }

                    /* Primary Green Button */
                    .status-primary-green {
                        background: #10b981 !important;
                        color: white !important;
                    }
                    .status-primary-green:hover {
                        background: #059669 !important;
                    }
                    .status-primary-green.status-selected {
                        background: #059669 !important;
                        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.35) !important;
                    }

                    /* Primary Red Button */
                    .status-primary-red {
                        background: #ef4444 !important;
                        color: white !important;
                    }
                    .status-primary-red:hover {
                        background: #dc2626 !important;
                    }
                    .status-primary-red.status-selected {
                        background: #dc2626 !important;
                        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.35) !important;
                    }

                    /* Ghost/Secondary Buttons */
                    .status-ghost {
                        background: white !important;
                        color: #64748b !important;
                        border: 1px solid #cbd5e1 !important;
                    }
                    .status-ghost:hover {
                        background: #f8fafc !important;
                        border-color: #94a3b8 !important;
                    }
                    .status-ghost.status-selected-ghost {
                        background: #f8fafc !important;
                        border: 2px solid #94a3b8 !important;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
                    }
                </style>


                <!-- Footer -->
                <div style="display: flex; justify-content: flex-end; gap: 12px; padding-top: 16px; border-top: 1px solid #e5e7eb;">
                    <button type="button" @click="closeModal()"
                            style="padding: 12px 24px; border: 2px solid #e5e7eb; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; transition: all 0.2s; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: white; color: #64748b;"
                            onmouseover="this.style.borderColor='#cbd5e1'; this.style.background='#f8fafc';"
                            onmouseout="this.style.borderColor='#e5e7eb'; this.style.background='white';">
                        Cancel
                    </button>
                    <button type="submit"
                            :disabled="!selectedStatus"
                            class="update-status-btn"
                            :class="{ 'disabled': !selectedStatus }"
                            onmouseover="if (!this.disabled) { this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(239, 68, 68, 0.4)'; }"
                            onmouseout="if (!this.disabled) { this.style.transform=''; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)'; }">
                        Update Status
                    </button>
                </div>

                <style>
                    .update-status-btn {
                        padding: 12px 32px;
                        border: none;
                        border-radius: 10px;
                        font-size: 15px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.2s;
                        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
                        color: white;
                        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
                    }

                    .update-status-btn.disabled {
                        opacity: 0.6;
                        cursor: not-allowed;
                        background: #cbd5e1;
                        color: #94a3b8;
                        box-shadow: none;
                    }

                    .update-status-btn:not(.disabled):hover {
                        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
                    }
                </style>
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
