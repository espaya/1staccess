<?php

namespace App\Http\Controllers;

use App\Models\UniversalPrecautions;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UniversalPrecautionsController extends Controller
{
    protected $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    public function index(UserProfileService $userProfileService)
    {
        $profileData = $userProfileService->getUserProfileData();

        $userID = Auth::id();

        $precautions = DB::table('universal_precaution')->where('applicant_id', $userID)->get();
        $precautionsData = [];
        foreach($precautions as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;
            $precautionsData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        $name = DB::table('users_profile')->where('applicant_id', $userID)->get();
        $nameData = [];
        foreach($name as $item){
            $applicant_id = $item->applicant_id;
            $full_name = $item->full_name;
            $nameData[] = [
                'applicant_id' => $applicant_id,
                'full_name' => $full_name
            ];
        }

        return view('dashboard.universal-precautions.index', 
        [
            'precautionsData' => $precautionsData, 
            'nameData' => $nameData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'signature' => 'required'
        ]);

        $universal = new UniversalPrecautions();

        // get signature input
        $signatureData = $request->input('signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part

        $signatureBinary = base64_decode($signatureEncoded);

        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';

        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $universal->signature = $signatureName;
        $universal->applicant_id = $userID;

        UniversalPrecautions::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         return redirect()->back()->with('success', 'Universal Precautions Training Document Signed Successfully');

    }
}
