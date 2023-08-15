<?php

namespace App\Http\Controllers;

use App\Models\ConfidentialityInformation;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConfidentialityOfInformation extends Controller
{
    protected $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->middleware('auth');
        $this->userProfileService = $userProfileService;
    }

    public function index(UserProfileService $userProfileService)
    {
        $profileData = $userProfileService->getUserProfileData();

        // authenticated user
        $userID = Auth::id();

        // db query
        $conf_info = DB::table('confidentiality')->where('applicant_id', $userID)->get();

        // init array
        $conf_infoData = [];

        foreach($conf_info as $item)
        {
            $signature = $item->signature;
            $created_at = $item->created_at;
            $applicant_id = $item->applicant_id;

            $conf_infoData[] = [
                'signature' => $signature,
                'created_at' => $created_at,
                'applicant_id' => $applicant_id
            ];
        }

        return view('dashboard.confidentiality-of-information.index', 
        [
            'conf_infoData' => $conf_infoData, 
            'profileData' => $profileData
        ]
    );
    }

    public function store(Request $request)
    {
        // authenticated user
        $userID = Auth::id();

        // validate input
        $request->validate([
            'signature' => 'required',
        ]);

        // employee safety oobject
        $confidentialityInfo = new ConfidentialityInformation();

        // get signature input
        $signatureData = $request->input('signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part

        $signatureBinary = base64_decode($signatureEncoded);

        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';

        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $confidentialityInfo->signature = $signatureName;
        $confidentialityInfo->applicant_id = $userID;

        ConfidentialityInformation::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
        );

        // refresh page when form is submitted
        return redirect()->back()->with('success', 'Confidentiality of Information Agreement Signed Successfully!');
    }


}
