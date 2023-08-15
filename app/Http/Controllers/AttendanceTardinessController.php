<?php

namespace App\Http\Controllers;

use App\Models\AttendanceTardiness;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AttendanceTardinessController extends Controller
{
    protected $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    public function index(UserProfileService $userProfileService)
    {
        // user avatar
        $profileData = $userProfileService->getUserProfileData();

        $userID = Auth::id();

        $attendance = DB::table('attendance_tardiness')->where('applicant_id', $userID)->get();

        $attendanceData = [];

        foreach($attendance as $item){
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;

            $attendanceData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.attendance-tardiness.index', 
        [
            'attendanceData' => $attendanceData, 
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

        $attendance = new AttendanceTardiness();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';
 
         // Save the signature file to disk using the Storage facade
         Storage::put('public/signature/' . $signatureName, $signatureBinary);

         $attendance->signature = $signatureName;
         $attendance->applicant_id = $userID;

         AttendanceTardiness::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         return redirect()->back()->with('success', 'Employee Attendance, Tardiness, Absenteeism and Leave Signed Successfully');

    }
}
