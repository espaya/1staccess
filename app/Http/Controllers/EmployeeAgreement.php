<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAgreement as ModelsEmployeeAgreement;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeAgreement extends Controller
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

        $agree = DB::table('employee_agreement')->where('applicant_id', $userID)->get();

        $agreeData = [];

        foreach($agree as $item){
            $monday_hour = $item->monday_hour;
            $tuesday_hour = $item->tuesday_hour;
            $wednesday_hour = $item->wednesday_hour;
            $thursday_hour = $item->thursday_hour;
            $friday_hour = $item->friday_hour;
            $saturday_hour = $item->saturday_hour;
            $sunday_hour = $item->sunday_hour;
            $time_off = $item->time_off;
            $pay_per_hour = $item->pay_per_hour;
            $other_agreements = $item->other_agreements;
            $signature = $item->signature;
            $applicant_id = $item->applicant_id;
            $created_at = $item->created_at;

            $agreeData[] = [
                'monday_hour' => $monday_hour,
                'tuesday_hour' => $tuesday_hour,
                'wednesday_hour' => $wednesday_hour,
                'thursday_hour' => $thursday_hour,
                'friday_hour' => $friday_hour,
                'saturday_hour' => $saturday_hour,
                'sunday_hour' => $sunday_hour,
                'time_off' => $time_off,
                'pay_per_hour' => $pay_per_hour,
                'other_agreements' => $other_agreements,
                'signature' => $signature,
                'applicant_id' => $applicant_id,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.employee-agreement.index', 
        [
            'agreeData' => $agreeData,
            'profileData' => $profileData
        ]
        );
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'monday_hour' => 'required',
            'tuesday_hour' => 'required',
            'wednesday_hour' => 'required',
            'thursday_hour' => 'required',
            'friday_hour' => 'required',
            'saturday_hour' => 'required',
            'sunday_hour' => 'required',
            'time_off' => 'required',
            'pay_per_hour' => 'required',
            'other_agreements' => 'required',
            'signature' => 'required'
        ]);

        $empAgree = new ModelsEmployeeAgreement();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';

          // Save the signature file to disk using the Storage facade
          Storage::put('public/signature/' . $signatureName, $signatureBinary);

          $empAgree->signature = $signatureName;
          $empAgree->applicant_id = $userID;
          $empAgree->monday_hour = $request->monday_hour;
          $empAgree->tuesday_hour = $request->tuesday_hour;
          $empAgree->wednesday_hour = $request->wednesday_hour;
          $empAgree->thursday_hour = $request->thursday_hour;
          $empAgree->friday_hour = $request->friday_hour;
          $empAgree->saturday_hour = $request->saturday_hour;
          $empAgree->sunday_hour = $request->sunday_hour;
          $empAgree->time_off = $request->time_off;
          $empAgree->pay_per_hour = $request->pay_per_hour;
          $empAgree->other_agreements = $request->other_agreements;
          
          ModelsEmployeeAgreement::firstOrCreate(
              ['applicant_id' => $userID],
              [
                  'monday_hour' => $request->monday_hour,
                  'tuesday_hour' => $request->tuesday_hour,
                  'wednesday_hour' => $request->wednesday_hour,
                  'thursday_hour' => $request->thursday_hour,
                  'friday_hour' => $request->friday_hour,
                  'saturday_hour' => $request->saturday_hour,
                  'sunday_hour' => $request->sunday_hour,
                  'time_off' => $request->time_off,
                  'pay_per_hour' => $request->pay_per_hour,
                  'other_agreements' => $request->other_agreements,
                  'signature' => $signatureName,
                  'applicant_id' => $userID
              ]
          );
          

        return redirect()->back()->with('success', 'Employee Agreement Signed Successfully');

    }
}
