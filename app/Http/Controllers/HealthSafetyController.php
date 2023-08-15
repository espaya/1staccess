<?php

namespace App\Http\Controllers;

use App\Models\HealthSafetyAgreement;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HealthSafetyController extends Controller
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

        $health = DB::table('health_safety_agreement')->where('applicant_id', $userID)->get();

        $healthData = [];

        foreach($health as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;

            $healthData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.health-and-safety.index', 
        [
            'healthData' => $healthData, 
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'signature' => 'required'
        ]);

        $health = new HealthSafetyAgreement();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';
 
         // Save the signature file to disk using the Storage facade
         Storage::put('public/signature/' . $signatureName, $signatureBinary);

         $health->signature = $signatureName;
         $health->applicant_id = $userID;

         HealthSafetyAgreement::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         return redirect()->back()->with('success', 'Health Safety Agreement Signed Successfully');
    }
}
