<?php

namespace App\Http\Controllers;

use App\Models\Reporting;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ReportingController extends Controller
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
        $fName = DB::table('users_profile')->where('applicant_id', $userID)->get();
        $fNameData = [];
        foreach($fName as $item){
            $full_name = $item->full_name;
            $applicant_id = $item->applicant_id;
            $fNameData[] = [
                'full_name' => $full_name,
                'applicant_id' => $applicant_id
            ];
        }
        $reporting = DB::table('reporting')->where('applicant_id', $userID)->get();
        $reportingData = [];
        foreach($reporting as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;
            $reportingData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }
        return view('dashboard/reporting.index', 
        [
            'fNameData' => $fNameData, 
            'reportingData' => $reportingData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
           'signature' => 'required'
        ]);

        $reporting = new Reporting();

        // get signature input
        $signatureData = $request->input('signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part

        $signatureBinary = base64_decode($signatureEncoded);

        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';

        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $reporting->signature = $signatureName;
        $reporting->applicant_id = $userID;

        Reporting::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         return redirect()->back()->with('success', 'Reporting: Abuse/Neglect/Exploitation Signed Successfully');
    }
}
