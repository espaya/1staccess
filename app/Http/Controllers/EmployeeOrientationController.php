<?php

namespace App\Http\Controllers;

use App\Models\EmployeeOrientation;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeOrientationController extends Controller
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

        $empApp = DB::table('employments_applications')->where('applicant_id', $userID)->get();
        $empAppData = [];
        foreach($empApp as $item){
            $position = $item->position;
            $employee_hire_date = $item->employee_hire_date;
            $empAppData[] = [
                'position' => $position,
                'employee_hire_date' => $employee_hire_date
            ];
        }

        $name = DB::table('users_profile')->where('applicant_id', $userID)->get();
        $nameData = [];
        foreach($name as $item)
        {
            $full_name = $item->full_name;
            $nameData[] = [
                'full_name' => $full_name
            ];
        }

        $employeeOrientation = DB::table('employee_orientation')->where('applicant_id', $userID)->get();

        // $employeeOrientation = DB::select("SELECT * FROM employee_orientation WHERE applicant_id IS NOT NULL AND applicant_id = ?", [$userID]);

        $employeeOrientationData = [];

        foreach($employeeOrientation as $item){

            $dateOfOrientation = $item->dateOfOrientation;
            $signature = $item->signature;
            $created_at = $item->created_at;
            $applicant_id = $item->applicant_id;

            $employeeOrientationData[] = [
                'dateOfOrientation' => $dateOfOrientation,
                'signature' => $signature,
                'created_at' => $created_at,
                'applicant_id' => $applicant_id
            ];

        }
        
        return view('dashboard.employee-orientation.index', [
            'empAppData' => $empAppData, 
            'nameData' => $nameData, 
            'employeeOrientationData' => $employeeOrientationData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'signature' => 'required',
            'dateOfOrientation' => 'required'
        ]);

        $empOrient = new EmployeeOrientation();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';

         // Save the signature file to disk using the Storage facade
         Storage::put('public/signature/' . $signatureName, $signatureBinary);

         $empOrient->signature = $signatureName;
         $empOrient->applicant_id = $userID;
         $empOrient->dateOfOrientation = $request->dateOfOrientation;

         EmployeeOrientation::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID,
                'dateOfOrientation' => $request->dateOfOrientation
            ]
        );        

         return redirect()->back()->with('success', 'Employee Orientation Signed Successfully');

    }
}
