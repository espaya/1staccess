<?php

namespace App\Http\Controllers;

use App\Models\Smoking;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SmokingInTheWorkplace extends Controller
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
        $smoking = DB::table('smoking_in_the_workplace')->where('applicant_id', $userID)->get();
        $smokingData = [];
        foreach($smoking as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;
            $smokingData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        // get employee full name
        $fullName = DB::table('users_profile')->where('applicant_id', $userID)->get();
        $fullNameData = [];
        foreach($fullName as $item){
            $fullName = $item->full_name;
            $applicant_id = $item->applicant_id;
            $fullNameData[] = [
                'full_name' => $fullName,
                'applicant_id' => $applicant_id
            ];
        }

        // get employee hire date
        $hireDate = DB::table('employments_applications')->where('applicant_id', $userID)->get();
        $hireDateData = [];
        foreach($hireDate as $item){
            $applicant_id = $item->applicant_id;
            $hire_date = $item->employee_hire_date;
            $hireDateData[] = [
                'applicant_id' => $applicant_id,
                'employee_hire_date' => $hire_date
            ];
        }

        return view('dashboard.smoking-in-the-workplace.index', 
        [
            'smokingData' => $smokingData, 
            'fullNameData' => $fullNameData, 
            'hireDateData' => $hireDateData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();
        $request->validate([
            'signature' => 'required'
        ]);

        $workplace = new Smoking();

        // get signature input
        $signatureData = $request->input('signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part

        $signatureBinary = base64_decode($signatureEncoded);

        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';

        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $workplace->signature = $signatureName;
        $workplace->applicant_id = $userID;

        Smoking::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         return redirect()->back()->with('success', 'Supervisor\'s Signature Added Successfully');

    }

}
