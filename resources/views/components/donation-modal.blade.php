<div id="donationModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.6); align-items: center; justify-content: center; z-index: 10000; padding: 20px;">
    <div id="donationModalContent" style="background: white; border-radius: 20px; max-width: 500px; width: 100%; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 60px rgba(0,0,0,0.3);">
        <!-- Header -->
        <div style="padding: 24px 24px 20px; border-bottom: 2px solid #f0f0f0;">
            <div style="display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" style="color: #E63946;">
                        <path d="M20.84 4.61C20.3292 4.099 19.7228 3.69364 19.0554 3.41708C18.3879 3.14052 17.6725 2.99817 16.95 2.99817C16.2275 2.99817 15.5121 3.14052 14.8446 3.41708C14.1772 3.69364 13.5708 4.099 13.06 4.61L12 5.67L10.94 4.61C9.9083 3.57831 8.50903 2.99871 7.05 2.99871C5.59096 2.99871 4.19169 3.57831 3.16 4.61C2.1283 5.64169 1.54871 7.04097 1.54871 8.5C1.54871 9.95903 2.1283 11.3583 3.16 12.39L4.22 13.45L12 21.23L19.78 13.45L20.84 12.39C21.351 11.8792 21.7564 11.2728 22.0329 10.6053C22.3095 9.93789 22.4518 9.22248 22.4518 8.5C22.4518 7.77752 22.3095 7.06211 22.0329 6.39467C21.7564 5.72723 21.351 5.12087 20.84 4.61Z" stroke="currentColor" stroke-width="2" fill="none"/>
                    </svg>
                    <h2 style="margin: 0; font-size: 20px; color: #1D3557; font-weight: 700;">Make a Donation</h2>
                </div>
                <button id="closeDonationModalBtn" style="background: none; border: none; cursor: pointer; padding: 4px; color: #999; font-size: 24px; line-height: 1;">&times;</button>
            </div>
            <p id="modalCampaignSubtitle" style="margin: 8px 0 0; font-size: 13px; color: #666;"></p>
        </div>

        <!-- Content -->
        <div style="padding: 24px;">
            <!-- Campaign Info -->
            <div style="background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%); padding: 16px; border-radius: 12px; margin-bottom: 24px; border: 1px solid #e0e0e0;">
                <div style="font-size: 13px; color: #666; margin-bottom: 4px;">Campaign</div>
                <div id="modalCampaignTitle" style="font-size: 15px; color: #1D3557; font-weight: 600; margin-bottom: 12px;"></div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <div id="modalCurrentAmount" style="font-size: 20px; font-weight: 700; color: #E63946;"></div>
                        <div style="font-size: 12px; color: #999;">raised</div>
                    </div>
                    <div style="text-align: right;">
                        <div id="modalGoalAmount" style="font-size: 14px; color: #666;"></div>
                    </div>
                </div>
                <div style="width: 100%; height: 6px; background: #e0e0e0; border-radius: 3px; margin-top: 12px; overflow: hidden;">
                    <div id="modalProgressBar" style="height: 100%; background: linear-gradient(90deg, #E63946 0%, #d12835 100%);"></div>
                </div>
            </div>

            <!-- Select Amount -->
            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: #1D3557; margin-bottom: 12px;">
                    Select Amount <span style="color: #E63946;">*</span>
                </label>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 12px;">
                    <button class="amount-btn" data-amount="100" style="padding: 12px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 15px; font-weight: 600; color: #1D3557; cursor: pointer; transition: all 0.2s;">₱100</button>
                    <button class="amount-btn" data-amount="250" style="padding: 12px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 15px; font-weight: 600; color: #1D3557; cursor: pointer; transition: all 0.2s;">₱250</button>
                    <button class="amount-btn" data-amount="500" style="padding: 12px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 15px; font-weight: 600; color: #1D3557; cursor: pointer; transition: all 0.2s;">₱500</button>
                    <button class="amount-btn" data-amount="1000" style="padding: 12px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 15px; font-weight: 600; color: #1D3557; cursor: pointer; transition: all 0.2s;">₱1,000</button>
                    <button class="amount-btn" data-amount="2500" style="padding: 12px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 15px; font-weight: 600; color: #1D3557; cursor: pointer; transition: all 0.2s;">₱2,500</button>
                    <button class="amount-btn" data-amount="5000" style="padding: 12px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 15px; font-weight: 600; color: #1D3557; cursor: pointer; transition: all 0.2s;">₱5,000</button>
                </div>
                <div style="margin-top: 12px;">
                    <label style="display: block; font-size: 13px; color: #666; margin-bottom: 6px;">Or Enter Custom Amount</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #1D3557; font-weight: 600;">₱</span>
                        <input type="number" id="customAmount" placeholder="Enter amount" style="width: 100%; padding: 12px 12px 12px 32px; border: 2px solid #e0e0e0; border-radius: 10px; font-size: 15px; outline: none;" min="50" max="1000000">
                    </div>
                    <div style="font-size: 12px; color: #999; margin-top: 6px;">Minimum: ₱50 | Maximum: ₱1,000,000</div>
                </div>
            </div>

            <!-- Payment Method -->
            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 14px; font-weight: 600; color: #1D3557; margin-bottom: 12px;">
                    Payment Method <span style="color: #E63946;">*</span>
                </label>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                    <button class="payment-btn" data-method="gcash" style="padding: 14px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 14px; font-weight: 500; color: #1D3557; cursor: pointer; transition: all 0.2s; text-align: left; display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 20px;">💰</span>
                        <span>GCash</span>
                    </button>
                    <button class="payment-btn" data-method="maya" style="padding: 14px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 14px; font-weight: 500; color: #1D3557; cursor: pointer; transition: all 0.2s; text-align: left; display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 20px;">💳</span>
                        <span>Maya (PayMaya)</span>
                    </button>
                    <button class="payment-btn" data-method="card" style="padding: 14px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 14px; font-weight: 500; color: #1D3557; cursor: pointer; transition: all 0.2s; text-align: left; display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 20px;">💳</span>
                        <span>Credit/Debit Card</span>
                    </button>
                    <button class="payment-btn" data-method="bank" style="padding: 14px; border: 2px solid #e0e0e0; background: white; border-radius: 10px; font-size: 14px; font-weight: 500; color: #1D3557; cursor: pointer; transition: all 0.2s; text-align: left; display: flex; align-items: center; gap: 10px;">
                        <span style="font-size: 20px;">🏦</span>
                        <span>Bank Transfer</span>
                    </button>
                </div>
            </div>

            <!-- Info Banner -->
            <div style="background: #e8f4f8; padding: 12px 16px; border-radius: 10px; margin-bottom: 20px; display: flex; gap: 10px; align-items: start;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" style="flex-shrink: 0; margin-top: 2px;">
                    <circle cx="12" cy="12" r="10" stroke="#0088cc" stroke-width="2"/>
                    <path d="M12 16V12M12 8H12.01" stroke="#0088cc" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <p style="margin: 0; font-size: 13px; color: #0088cc; line-height: 1.5;">
                    100% of your donation goes directly to this campaign. No fees deducted.
                </p>
            </div>

            <!-- Action Buttons -->
            <div style="display: flex; gap: 10px;">
                <button id="cancelDonationBtn" style="flex: 1; padding: 14px; background: #f0f0f0; border: none; border-radius: 10px; font-size: 15px; font-weight: 600; color: #666; cursor: pointer;">
                    Cancel
                </button>
                <button id="proceedDonation" style="flex: 2; padding: 14px; background: linear-gradient(135deg, #E63946 0%, #d12835 100%); border: none; border-radius: 10px; font-size: 15px; font-weight: 600; color: white; cursor: pointer; box-shadow: 0 4px 12px rgba(230, 57, 70, 0.3);">
                    Continue
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom scrollbar for donation modal */
    #donationModalContent::-webkit-scrollbar {
        width: 6px;
    }

    #donationModalContent::-webkit-scrollbar-track {
        background: transparent;
        margin: 20px 0;
    }

    #donationModalContent::-webkit-scrollbar-thumb {
        background: rgba(29, 53, 87, 0.2);
        border-radius: 10px;
    }

    #donationModalContent::-webkit-scrollbar-thumb:hover {
        background: rgba(29, 53, 87, 0.35);
    }

    #donationModalContent::-webkit-scrollbar-button {
        display: none;
    }

    /* For Firefox */
    #donationModalContent {
        scrollbar-width: thin;
        scrollbar-color: rgba(29, 53, 87, 0.2) transparent;
    }
</style>
