<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundraiserStep1Request;
use App\Http\Requests\FundraiserStep2Request;
use App\Http\Requests\FundraiserStep3Request;
use App\Http\Requests\FundraiserStep4Request;
use App\Models\Fundraiser;
use App\Models\FundraiserImage;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class FundraiserSessionController extends Controller
{
    protected $imageService;

    public function __construct(ImageUploadService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Show Step 1 - Campaign Details
     */
    public function step1()
    {
        $data = session('fundraiser_draft.step1', []);
        return view('fundraisers.create.step1', compact('data'));
    }

    /**
     * Store Step 1 data
     */
    public function storeStep1(FundraiserStep1Request $request)
    {
        $data = $request->validated();

        // Handle image uploads to temporary storage
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $this->imageService->storeTemporaryImage($image);
            }
            $data['uploaded_images'] = $imagePaths;
        }

        // Store in session
        session()->put('fundraiser_draft.step1', $data);

        return redirect()->route('fundraisers.create.step2');
    }

    /**
     * Show Step 2 - Beneficiary Information
     */
    public function step2()
    {
        // Check if step 1 is completed
        if (!session()->has('fundraiser_draft.step1')) {
            return redirect()->route('fundraisers.create.step1')
                ->with('error', 'Please complete Step 1 first');
        }

        $data = session('fundraiser_draft.step2', []);
        return view('fundraisers.create.step2', compact('data'));
    }

    /**
     * Store Step 2 data
     */
    public function storeStep2(FundraiserStep2Request $request)
    {
        session()->put('fundraiser_draft.step2', $request->validated());
        return redirect()->route('fundraisers.create.step3');
    }

    /**
     * Show Step 3 - Organizer Information
     */
    public function step3()
    {
        // Check if previous steps are completed
        if (!session()->has('fundraiser_draft.step1') ||
            !session()->has('fundraiser_draft.step2')) {
            return redirect()->route('fundraisers.create.step1')
                ->with('error', 'Please complete previous steps first');
        }

        // Pre-fill with user data
        $data = session('fundraiser_draft.step3', [
            'organizer_name' => auth()->user()->name ?? '',
            'organizer_email' => auth()->user()->email ?? '',
            'organizer_phone' => auth()->user()->phone ?? '',
        ]);

        return view('fundraisers.create.step3', compact('data'));
    }

    /**
     * Store Step 3 data
     */
    public function storeStep3(FundraiserStep3Request $request)
    {
        session()->put('fundraiser_draft.step3', $request->validated());
        return redirect()->route('fundraisers.create.step4');
    }

    /**
     * Show Step 4 - Payment Information
     */
    public function step4()
    {
        // Check if previous steps are completed
        if (!session()->has('fundraiser_draft.step1') ||
            !session()->has('fundraiser_draft.step2') ||
            !session()->has('fundraiser_draft.step3')) {
            return redirect()->route('fundraisers.create.step1')
                ->with('error', 'Please complete previous steps first');
        }

        $data = session('fundraiser_draft.step4', []);
        return view('fundraisers.create.step4', compact('data'));
    }

    /**
     * Show review/confirmation data (AJAX)
     */
    public function review(Request $request)
    {
        $draftData = session('fundraiser_draft');

        if (!$draftData) {
            return response()->json(['error' => 'No draft data found'], 400);
        }

        return response()->json([
            'title' => $draftData['step1']['title'] ?? '',
            'goal_amount' => $draftData['step1']['goal_amount'] ?? 0,
            'beneficiary' => $draftData['step2']['beneficiary_name'] ?? '',
            'category' => $draftData['step1']['category'] ?? '',
            'duration' => $draftData['step1']['campaign_duration'] ?? 30,
        ]);
    }

    /**
     * Submit final fundraiser
     */
    public function submit(FundraiserStep4Request $request)
    {
        // Validate all steps are completed
        if (!session()->has('fundraiser_draft.step1') ||
            !session()->has('fundraiser_draft.step2') ||
            !session()->has('fundraiser_draft.step3')) {
            return redirect()->route('fundraisers.create.step1')
                ->with('error', 'Please complete all steps');
        }

        $draftData = session('fundraiser_draft');

        // Store step 4 data
        $draftData['step4'] = $request->validated();

        // Calculate dates
        $startDate = now();
        $duration = $draftData['step1']['campaign_duration'];
        $endDate = now()->addDays($duration);

        // Create fundraiser
        $fundraiser = Fundraiser::create([
            'user_id' => auth()->id(),
            'title' => $draftData['step1']['title'],
            'description' => $draftData['step1']['description'],
            'category' => $draftData['step1']['category'],
            'goal_amount' => $draftData['step1']['goal_amount'],
            'current_amount' => 0,
            'campaign_duration_days' => $duration,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'beneficiary_name' => $draftData['step2']['beneficiary_name'],
            'beneficiary_relationship' => $draftData['step2']['beneficiary_relationship'],
            'beneficiary_contact' => $draftData['step2']['beneficiary_contact'],
            'beneficiary_address' => $draftData['step2']['beneficiary_address'],
            'organizer_name' => $draftData['step3']['organizer_name'],
            'organizer_email' => $draftData['step3']['organizer_email'],
            'organizer_phone' => $draftData['step3']['organizer_phone'],
            'payment_method' => $draftData['step4']['payment_method'],
            'account_number' => encrypt($draftData['step4']['account_number']),
            'account_name' => $draftData['step4']['account_name'],
            'status' => 'pending',
            'is_featured' => false,
            'terms_agreed' => true,
            'information_accurate' => true,
        ]);

        // Move images from temp to permanent storage
        if (isset($draftData['step1']['uploaded_images'])) {
            foreach ($draftData['step1']['uploaded_images'] as $index => $tempPath) {
                $permanentPath = $this->imageService->moveTemporaryToPermanent($tempPath, $fundraiser->id);

                FundraiserImage::create([
                    'fundraiser_id' => $fundraiser->id,
                    'image_path' => $permanentPath,
                    'order' => $index,
                ]);

                // Set first image as featured
                if ($index === 0) {
                    $fundraiser->update(['featured_image' => $permanentPath]);
                }
            }
        }

        // Dispatch events
        event(new \App\Events\PlatformStatsUpdated());
        event(new \App\Events\AdminDashboardStatsUpdated());

        // Send notification
        $fundraiser->creator->notify(
            new \App\Notifications\CampaignSubmittedNotification($fundraiser)
        );

        // Store fundraiser ID in session for success page
        session()->put('last_created_fundraiser_id', $fundraiser->id);

        // Clear draft data
        session()->forget('fundraiser_draft');

        return redirect()->route('fundraisers.success');
    }

    /**
     * Clear session data
     */
    public function clearSession()
    {
        session()->forget('fundraiser_draft');
        return redirect()->route('fundraisers.create.step1')
            ->with('success', 'Session cleared');
    }
}
