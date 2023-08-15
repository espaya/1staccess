<?php

namespace App\Http\Controllers;

use App\Models\DisclaimerWaiverLiability;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DisclaimerWaiverLiabilityController extends Controller
{
    protected $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    public function index(UserProfileService $userProfileService)
    {
        $profileData = $userProfileService->getUserProfileData();

        // authenticated user
        $userID = Auth::id();
        // db query
        $disclaimer = DB::table('disclaimer_waiver_liability')->where('applicant_id', $userID)->get();
        $nameQuery = DB::table('users_profile')->where('applicant_id', $userID)->get();

        $disclaimerData = [];

        foreach($disclaimer as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;

            $disclaimerData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        $nameQueryData = [];

        foreach($nameQuery as $item)
        {
            $full_name = $item->full_name;

            $nameQueryData[] = [
                'full_name' => $full_name
            ];

        }

        return view('dashboard.disclaimer-waiver-liability.index', 
        [
            'disclaimerData' => $disclaimerData, 
            'nameQueryData' => $nameQueryData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        // authenticated user
        $userID = Auth::id();
        // validate input
        $request->validate([
            'signature' => 'required'
        ]);

        $disclaimer = new DisclaimerWaiverLiability();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';
 
         // Save the signature file to disk using the Storage facade
         Storage::put('public/signature/' . $signatureName, $signatureBinary);

         $disclaimer->signature = $signatureName;
         $disclaimer->applicant_id = $userID;

         DisclaimerWaiverLiability::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         // refresh page when form is submitted
        return redirect()->back()->with('success', 'Disclaimer And Waiver of Liability Signed Successfully!');

    }
}
