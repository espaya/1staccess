<?php

namespace App\Http\Controllers;

use App\Models\SexualHarassment;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SexualHarassmentController extends Controller
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
        $sexual = DB::table('sexual_harassment')->where('applicant_id', $userID)->get();
        $sexualData = [];
        foreach($sexual as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;
            $sexualData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        $full_name = DB::table('users_profile')->where('applicant_id', $userID)->get();
        $fullNameData = [];
        foreach($full_name as $item){
            $applicant_id = $item->applicant_id;
            $full_name = $item->full_name;
            $fullNameData[] = [
                'applicant_id' => $applicant_id,
                'full_name' => $full_name
            ];
        }

        return view('dashboard.sexual-harassment.index', 
        [
            'sexualData' => $sexualData, 
            'fullNameData' => $fullNameData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();
        $request->validate([
            'signature' => 'required'
        ]);

        $sexual = new SexualHarassment();

        // get signature input
        $signatureData = $request->input('signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part

        $signatureBinary = base64_decode($signatureEncoded);

        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';

        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $sexual->signature = $signatureName;
        $sexual->applicant_id = $userID;

        SexualHarassment::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         return redirect()->back()->with('success', 'Sexual Harassment Signed Successfully');
    }

}
