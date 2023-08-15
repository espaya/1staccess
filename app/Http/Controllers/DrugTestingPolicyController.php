<?php

namespace App\Http\Controllers;

use App\Models\DrugTestingPolicy;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DrugTestingPolicyController extends Controller
{
    protected $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    public function index(UserProfileService $userProfileService)
    {
        $profileData = $userProfileService->getUserProfileData();

        // auth user
        $userID = Auth::id();
        // db query
        $drugTesting = DB::table('drug_testing_policy')->where('applicant_id', $userID)->get();

        $drugTestingData = [];

        foreach($drugTesting as $item ){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;

            $drugTestingData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.drug-testing-policy.index', 
        [
            'drugTestingData' => $drugTestingData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'signature' => 'required'
        ]);

        $drugTesting = new DrugTestingPolicy();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';
 
         // Save the signature file to disk using the Storage facade
         Storage::put('public/signature/' . $signatureName, $signatureBinary);

         $drugTesting->signature = $signatureName;
         $drugTesting->applicant_id = $userID;

         DrugTestingPolicy::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

           // refresh page when form is submitted
        return redirect()->back()->with('success', 'Drug Testing Policy Signed Successfully!');

    }
}
