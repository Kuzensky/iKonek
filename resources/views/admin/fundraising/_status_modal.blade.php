<div x-data="statusModalData()" x-init="init()" x-cloak>
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
             style="position: relative; margin: 40px auto; max-width: 550px; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); z-index: 9999;"
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

            <form :action="'/admin/fundraising/' + campaignId + '/update-status'" method="POST" style="padding: 32px 24px 24px 24px;">
                @csrf

                <!-- Title -->
                <h2 style="font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;">Update Campaign Status</h2>
                <p style="font-size: 14px; color: #64748b; margin: 0 0 24px 0;">Choose an action to update the campaign status</p>

                <!-- Hidden Status Input -->
                <input type="hidden" name="status" x-model="selectedStatus">

                <!-- Action Buttons -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 20px;">
                    <!-- Approve & Activate -->
                    <button type="button" @click="selectStatus('active')"
                            :class="{ 'selected': selectedStatus === 'active' }"
                            style="padding: 16px; border-radius: 10px; border: 2px solid; text-align: center; cursor: pointer; transition: all 0.2s; background: white;"
                            :style="selectedStatus === 'active' ? 'border-color: #10b981; background: #d1fae5;' : 'border-color: #e5e7eb;'"
                            onmouseover="if (this.getAttribute(':class').indexOf('active') === -1) { this.style.borderColor='#d1d5db'; }"
                            onmouseout="if (this.getAttribute(':class').indexOf('active') === -1) { this.style.borderColor='#e5e7eb'; }">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" :stroke="selectedStatus === 'active' ? '#10b981' : '#64748b'" stroke-width="2" style="margin: 0 auto 8px;">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <div style="font-size: 14px; font-weight: 600; margin-bottom: 4px;" :style="selectedStatus === 'active' ? 'color: #065f46;' : 'color: #1e293b;'">Approve & Activate</div>
                        <div style="font-size: 12px;" :style="selectedStatus === 'active' ? 'color: #047857;' : 'color: #64748b;'">Make campaign live</div>
                    </button>

                    <!-- Mark as Completed -->
                    <button type="button" @click="selectStatus('completed')"
                            :class="{ 'selected': selectedStatus === 'completed' }"
                            style="padding: 16px; border-radius: 10px; border: 2px solid; text-align: center; cursor: pointer; transition: all 0.2s; background: white;"
                            :style="selectedStatus === 'completed' ? 'border-color: #3b82f6; background: #dbeafe;' : 'border-color: #e5e7eb;'"
                            onmouseover="if (this.getAttribute(':class').indexOf('completed') === -1) { this.style.borderColor='#d1d5db'; }"
                            onmouseout="if (this.getAttribute(':class').indexOf('completed') === -1) { this.style.borderColor='#e5e7eb'; }">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" :stroke="selectedStatus === 'completed' ? '#3b82f6' : '#64748b'" stroke-width="2" style="margin: 0 auto 8px;">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <div style="font-size: 14px; font-weight: 600; margin-bottom: 4px;" :style="selectedStatus === 'completed' ? 'color: #1e40af;' : 'color: #1e293b;'">Mark as Completed</div>
                        <div style="font-size: 12px;" :style="selectedStatus === 'completed' ? 'color: #2563eb;' : 'color: #64748b;'">Goal reached</div>
                    </button>

                    <!-- Suspend Campaign -->
                    <button type="button" @click="selectStatus('suspended')"
                            :class="{ 'selected': selectedStatus === 'suspended' }"
                            style="padding: 16px; border-radius: 10px; border: 2px solid; text-align: center; cursor: pointer; transition: all 0.2s; background: white;"
                            :style="selectedStatus === 'suspended' ? 'border-color: #f59e0b; background: #fed7aa;' : 'border-color: #e5e7eb;'"
                            onmouseover="if (this.getAttribute(':class').indexOf('suspended') === -1) { this.style.borderColor='#d1d5db'; }"
                            onmouseout="if (this.getAttribute(':class').indexOf('suspended') === -1) { this.style.borderColor='#e5e7eb'; }">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" :stroke="selectedStatus === 'suspended' ? '#f59e0b' : '#64748b'" stroke-width="2" style="margin: 0 auto 8px;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <div style="font-size: 14px; font-weight: 600; margin-bottom: 4px;" :style="selectedStatus === 'suspended' ? 'color: #9a3412;' : 'color: #1e293b;'">Suspend Campaign</div>
                        <div style="font-size: 12px;" :style="selectedStatus === 'suspended' ? 'color: #ea580c;' : 'color: #64748b;'">Temporarily pause</div>
                    </button>

                    <!-- Cancel Campaign -->
                    <button type="button" @click="selectStatus('cancelled')"
                            :class="{ 'selected': selectedStatus === 'cancelled' }"
                            style="padding: 16px; border-radius: 10px; border: 2px solid; text-align: center; cursor: pointer; transition: all 0.2s; background: white;"
                            :style="selectedStatus === 'cancelled' ? 'border-color: #ef4444; background: #fee2e2;' : 'border-color: #e5e7eb;'"
                            onmouseover="if (this.getAttribute(':class').indexOf('cancelled') === -1) { this.style.borderColor='#d1d5db'; }"
                            onmouseout="if (this.getAttribute(':class').indexOf('cancelled') === -1) { this.style.borderColor='#e5e7eb'; }">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" :stroke="selectedStatus === 'cancelled' ? '#ef4444' : '#64748b'" stroke-width="2" style="margin: 0 auto 8px;">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <div style="font-size: 14px; font-weight: 600; margin-bottom: 4px;" :style="selectedStatus === 'cancelled' ? 'color: #991b1b;' : 'color: #1e293b;'">Cancel Campaign</div>
                        <div style="font-size: 12px;" :style="selectedStatus === 'cancelled' ? 'color: #dc2626;' : 'color: #64748b;'">Permanently stop</div>
                    </button>
                </div>

                <!-- Notes Textarea -->
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 13px; font-weight: 500; color: #1e293b; margin-bottom: 6px;">
                        Notes (Optional)
                    </label>
                    <textarea name="notes" rows="3"
                              style="width: 100%; padding: 12px 14px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-family: inherit; resize: vertical; transition: all 0.2s;"
                              placeholder="Add notes about this status change..."
                              onfocus="this.style.borderColor='#ef4444'; this.style.boxShadow='0 0 0 3px rgba(239, 68, 68, 0.1)';"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none';"></textarea>
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
                            :disabled="!selectedStatus"
                            style="padding: 10px 20px; background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.2s;"
                            :style="!selectedStatus ? 'opacity: 0.5; cursor: not-allowed;' : ''"
                            onmouseover="if (!this.disabled) { this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(239, 68, 68, 0.3)'; }"
                            onmouseout="this.style.transform=''; this.style.boxShadow='';">
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
            this.selectedStatus = '';
        }
    }
}
</script>
@endpush
