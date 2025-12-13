<div x-data="detailsModalData()" x-init="init()" x-cloak>
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
             style="position: relative; width: 90%; max-width: 600px; background: white; border-radius: 12px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3); z-index: 9999; margin: 40px auto;"
             @click.stop
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">

            <!-- Close Button -->
            <button type="button" @click="closeModal()"
                    style="position: absolute; top: 20px; right: 20px; width: 32px; height: 32px; border-radius: 6px; border: none; background: #f1f5f9; color: #64748b; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; z-index: 10; font-size: 20px; line-height: 1;">
                ×
            </button>

            <div style="padding: 32px 24px 24px 24px;">
                <!-- Header -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 20px; font-weight: 600; color: #1e293b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Campaign Details</h2>
                    <p style="font-size: 13px; color: #64748b; margin: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Complete information about this campaign</p>
                </div>

                <!-- Loading State -->
                <div x-show="loading" style="text-align: center; padding: 40px; color: #64748b;">
                    Loading...
                </div>

                <!-- Campaign Details -->
                <div x-show="!loading && campaign" style="display: flex; flex-direction: column; gap: 24px;">

                    <!-- Title + Status -->
                    <div style="display: flex; justify-content: space-between; align-items: center; gap: 16px;">
                        <h3 style="font-size: 18px; font-weight: 600; color: #1e293b; margin: 0; word-break: break-word; overflow-wrap: break-word; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; flex: 1; min-width: 0;" x-text="campaign?.title || ''"></h3>
                        <span x-show="campaign?.status === 'active'" style="display: flex; align-items: center; gap: 6px; padding: 6px 12px; background: #10b981; color: white; border-radius: 20px; font-size: 13px; font-weight: 500; flex-shrink: 0; white-space: nowrap; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
                            ● Active
                        </span>
                    </div>

                    <!-- Progress Section -->
                    <div style="background: #f8fafc; padding: 20px; border-radius: 12px; border: 1px solid #e2e8f0;">
                        <!-- Raised / Goal -->
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 16px;">
                            <div>
                                <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Raised</p>
                                <p style="font-size: 24px; font-weight: 700; color: #ef4444; margin: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="'₱' + (campaign?.current_amount_formatted || '0')"></p>
                            </div>
                            <div style="text-align: right;">
                                <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Goal</p>
                                <p style="font-size: 24px; font-weight: 700; color: #1e293b; margin: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="'₱' + (campaign?.goal_amount_formatted || '0')"></p>
                            </div>
                        </div>

                        <!-- Progress Bar - COMPLETELY REMADE -->
                        <div style="width: 100%; height: 12px; background-color: #e5e7eb !important; border-radius: 6px; overflow: hidden; margin-bottom: 12px; position: relative;">
                            <div x-show="campaign?.progress_percentage > 0"
                                 :style="`width: ${campaign?.progress_percentage || 0}%; height: 100%; background: linear-gradient(90deg, #1e3a8a 0%, #ef4444 100%) !important; border-radius: 6px; position: absolute; top: 0; left: 0;`">
                            </div>
                        </div>

                        <!-- Percentage / Donors -->
                        <div style="display: flex; justify-content: space-between; font-size: 13px; color: #64748b; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
                            <span x-text="(campaign?.progress_percentage || 0) + '% funded'"></span>
                            <span x-text="(campaign?.contributors_count || 0) + ' donors'"></span>
                        </div>
                    </div>

                    <!-- Info Grid -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; padding: 24px 0; border-top: 1px solid #e5e7eb; border-bottom: 1px solid #e5e7eb;">
                        <!-- Organizer -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Organizer</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0 0 2px 0; font-weight: 500; word-break: break-word; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="campaign?.creator_name || ''"></p>
                            <p style="font-size: 12px; color: #64748b; margin: 0; word-break: break-word; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="campaign?.creator_email || ''"></p>
                        </div>

                        <!-- Beneficiary -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Beneficiary</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500; word-break: break-word; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="campaign?.beneficiary_name || 'N/A'"></p>
                        </div>

                        <!-- Category -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 6px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Category</p>
                            <span style="display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: 500; background: #fef2f2; color: #dc2626; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="campaign?.category_display || ''"></span>
                        </div>

                        <!-- Location -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Location</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500; word-break: break-word; overflow-wrap: break-word; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="campaign?.beneficiary_address || 'N/A'"></p>
                        </div>

                        <!-- Created -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Created</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="campaign?.created_date || ''"></p>
                        </div>

                        <!-- Deadline -->
                        <div>
                            <p style="font-size: 12px; color: #64748b; margin: 0 0 4px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Deadline</p>
                            <p style="font-size: 14px; color: #1e293b; margin: 0; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-text="campaign?.deadline || ''"></p>
                        </div>
                    </div>

                    <!-- Campaign Story -->
                    <div style="padding: 4px 0 0 0;">
                        <h4 style="font-size: 14px; font-weight: 600; color: #1e293b; margin: 0 0 12px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">Campaign Story</h4>
                        <div style="font-size: 14px; color: #64748b; line-height: 1.7; word-break: break-word; overflow-wrap: break-word; max-width: 100%; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;" x-html="(campaign?.story || campaign?.description || 'No story provided.')"></div>
                    </div>
                </div>

                <!-- Footer -->
                <div style="display: flex; justify-content: flex-end; padding-top: 20px; border-top: 1px solid #e5e7eb; margin-top: 24px;">
                    <button type="button" @click="closeModal()"
                            style="padding: 10px 24px; background: white; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 14px; font-weight: 500; color: #64748b; cursor: pointer; transition: all 0.2s; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;">
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
                console.log('Modal opened with campaign ID:', event.detail.campaignId);
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
                console.log('Campaign data loaded:', data);
                console.log('Progress percentage:', data.progress_percentage);
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
