<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDressCode;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeDressCodeController extends Controller
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
        // db query
        $dressCode = DB::table('employee_dress_code')->where('applicant_id', $userID)->get();

        $dressCodeData = [];

        foreach($dressCode as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;

            $dressCodeData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.employee-dress-code.index', 
        [
            'dressCodeData' => $dressCodeData, 
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

        $dressCode = new EmployeeDressCode();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';
 
         // Save the signature file to disk using the Storage facade
         Storage::put('public/signature/' . $signatureName, $signatureBinary);

         $dressCode->signature = $signatureName;
         $dressCode->applicant_id = $userID;

         EmployeeDressCode::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

          // refresh page when form is submitted
        return redirect()->back()->with('success', 'Employee Dress Code Signed Successfully!');

    }
}
