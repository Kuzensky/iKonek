<div x-data="detailsModalData()" x-init="init()" x-cloak>
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
             style="position: relative; margin: 40px auto; max-width: 700px; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); z-index: 9999;"
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

            <div style="padding: 32px 24px 24px 24px;">
                <!-- Title -->
                <h2 style="font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 20px 0;">Campaign Details</h2>

                <!-- Loading State -->
                <div x-show="loading" style="text-align: center; padding: 40px; color: #64748b;">
                    Loading...
                </div>

                <!-- Campaign Details -->
                <div x-show="!loading && campaign" style="display: flex; flex-direction: column; gap: 20px;">
                    <!-- Campaign Title & Status -->
                    <div>
                        <h3 style="font-size: 18px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;" x-text="campaign.title"></h3>
                        <div style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
                            <span class="status-badge" :class="campaign.status_badge_class" x-text="campaign.status_display"></span>
                            <span class="category-badge" :class="campaign.category_badge_class" x-text="campaign.category_display"></span>
                            <span x-show="campaign.is_featured" class="badge-featured">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                Featured
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <h4 style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;">Description</h4>
                        <p style="font-size: 14px; color: #64748b; margin: 0; line-height: 1.6;" x-text="campaign.description"></p>
                    </div>

                    <!-- Progress -->
                    <div>
                        <h4 style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;">Fundraising Progress</h4>
                        <div class="progress-info" style="margin-bottom: 8px;">
                            <span class="progress-amount" style="font-weight: 600; color: #1e293b;" x-text="'₱' + campaign.current_amount_formatted"></span>
                            <span class="progress-goal" style="color: #64748b;" x-text="'of ₱' + campaign.goal_amount_formatted"></span>
                        </div>
                        <div class="progress-bar-container" style="height: 8px; background: #f8fafc; border-radius: 4px; overflow: hidden;">
                            <div class="progress-bar-fill" style="height: 100%; background: linear-gradient(90deg, #ef4444 0%, #dc2626 100%); border-radius: 4px; transition: width 0.3s;" :style="'width: ' + campaign.progress_percentage + '%'"></div>
                        </div>
                        <div style="margin-top: 8px; font-size: 13px; color: #64748b;">
                            <span x-text="campaign.progress_percentage + '% funded'"></span>
                        </div>
                    </div>

                    <!-- Info Grid -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                        <!-- Organizer -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0;">Organizer</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500;" x-text="campaign.creator_name"></p>
                        </div>

                        <!-- Category -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0;">Category</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500;" x-text="campaign.category_display"></p>
                        </div>

                        <!-- Start Date -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0;">Start Date</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500;" x-text="campaign.start_date"></p>
                        </div>

                        <!-- End Date -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0;">End Date</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500;" x-text="campaign.end_date"></p>
                        </div>
                    </div>

                    <!-- Beneficiary Info -->
                    <div x-show="campaign.beneficiary_name">
                        <h4 style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 8px 0;">Beneficiary Information</h4>
                        <div style="background: #f8fafc; padding: 12px; border-radius: 8px;">
                            <p style="font-size: 14px; color: #1e293b; margin: 0 0 4px 0; font-weight: 500;" x-text="campaign.beneficiary_name"></p>
                            <p style="font-size: 13px; color: #64748b; margin: 0;" x-text="campaign.beneficiary_contact"></p>
                        </div>
                    </div>

                    <!-- Created At -->
                    <div style="padding-top: 12px; border-top: 1px solid #e5e7eb;">
                        <p style="font-size: 13px; color: #64748b; margin: 0;">
                            Created on <span x-text="campaign.created_at"></span>
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div style="display: flex; justify-content: flex-end; padding-top: 16px; border-top: 1px solid #e5e7eb; margin-top: 20px;">
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
function detailsModalData() {
    return {
        showModal: false,
        loading: false,
        campaign: null,

        init() {
            this.$watch('showModal', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });

            window.addEventListener('open-details-modal', (event) => {
                if (event.detail.campaignId) {
                    this.loadCampaignData(event.detail.campaignId);
                    this.showModal = true;
                }
            });
        },

        async loadCampaignData(campaignId) {
            this.loading = true;
            try {
                const response = await fetch(`/admin/fundraising/${campaignId}`, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                const data = await response.json();
                this.campaign = data;
            } catch (error) {
                console.error('Failed to load campaign details:', error);
            } finally {
                this.loading = false;
            }
        },

        closeModal() {
            this.showModal = false;
            this.campaign = null;
        }
    }
}
</script>
@endpush
