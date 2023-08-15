<?php

namespace App\Http\Controllers;

use App\Models\EmployeeConduct;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeConductController extends Controller
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

        $empConduct = DB::table('employee_conduct')->where('applicant_id', $userID)->get();

        $empConductData = [];

        foreach($empConduct as $item ){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;

            $empConductData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];

        }

        return view('dashboard.employee-conduct.index', 
        [
            'empConductData' => $empConductData, 
            'profileData' => $profileData
            ]
        );
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'signature' => 'required'
        ]);

        $empConduct = new EmployeeConduct();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';

          // Save the signature file to disk using the Storage facade
          Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $empConduct->signature = $signatureName;
        $empConduct->applicant_id = $userID;

        EmployeeConduct::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
        );

        return redirect()->back()->with('success', 'Employee Conduct Signed Successfully');

    }
}
