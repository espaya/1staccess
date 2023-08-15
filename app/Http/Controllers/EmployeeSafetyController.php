<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSafety;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeSafetyController extends Controller
{
    
    protected $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->middleware('auth');
        $this->userProfileService = $userProfileService;
    }

    public function index(UserProfileService $userProfileService)
    {
        // profile avatar
        $profileData = $userProfileService->getUserProfileData();

        $userID = Auth::id();
        $empSafety = DB::table('employee_safety')->where('applicant_id', $userID)->get();
        $empSafetyData = [];

        foreach($empSafety as $item){
            $signature = $item->signature;
            $created_at = $item->created_at;
            $applicant_id = $item->applicant_id;

            $empSafetyData[] = [
                'signature' => $signature,
                'created_at' => $created_at,
                'applicant_id' => $applicant_id
            ];
        }

        return view(
            'dashboard.employee-safety.index', [
                'empSafetyData' => $empSafetyData,
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
        $employeeSafety = new EmployeeSafety();

        // get signature input
        $signatureData = $request->input('signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part

        $signatureBinary = base64_decode($signatureEncoded);

        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';

        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $employeeSafety->signature = $signatureName;
        $employeeSafety->applicant_id = $userID;

        EmployeeSafety::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
        );

        // refresh page when form is submitted
        return redirect()->back()->with('success', 'Employee Safety Cellular Phone Use Signed Successfully!');
    }
}
