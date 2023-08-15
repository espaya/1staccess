<?php

namespace App\Http\Controllers;

use App\Models\EmployeeReferenceCheck;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeReferenceController extends Controller
{
    protected $userProfileService;

    public function __construct(UserProfileService $userProfileService)
    {
        $this->userProfileService = $userProfileService;
    }

    public function index(UserProfileService $userProfileService)
    {
        $profileData = $userProfileService->getUserProfileData();

        // authenticated user
        $userID = Auth::id();
        // query users_profile table
        $user_profile = DB::table('users_profile')->where('applicant_id', $userID)->get();

        $userProfileData = [];

        foreach($user_profile as $item){
            $full_name = $item->full_name;

            $userProfileData[] = [
                'full_name' => $full_name
            ];
        }

        //query employee_reference_check table
        $empRefCheck = DB::table('employee_reference_check')->where('applicant_id', $userID)->get();

        $empRefCheckData = [];

        foreach($empRefCheck as $item){
            $applicant_id = $item->applicant_id;
            $company_contacted = $item->company_contacted;
            $employer_name = $item->employer_name;
            $from_date = $item->from_date;
            $to_date = $item->to_date;
            $eligible_for_hire = $item->eligible_for_hire;
            $comments = $item->comments;
            $received_by = $item->received_by;
            $name_of_company = $item->name_of_company;
            $signature = $item->signature;
            $rep_signature = $item->rep_signature;
            $rep_title = $item->rep_title;
            $created_at = $item->created_at;

            $empRefCheckData[] = [
                'applicant_id' => $applicant_id,
                'company_contacted' => $company_contacted,
                'employer_name' => $employer_name,
                'from_date' => $from_date,
                'to_date' => $to_date,
                'eligible_for_hire' => $eligible_for_hire,
                'comments' => $comments,
                'received_by' => $received_by,
                'name_of_company' => $name_of_company,
                'signature' => $signature,
                'rep_signature' => $rep_signature,
                'rep_title' => $rep_title,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.employee-reference-check.index', 
        [
            'userProfileData' => $userProfileData, 
            'empRefCheckData' => $empRefCheckData,
            'profileData' => $profileData
        ]);
    }


    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'company_contacted' => 'required',
            'employer_name' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'eligible_for_hire' => 'required',
            'comments' => 'required',
            'received_by' => 'required',
            'name_of_company' => 'required',
            'signature' => 'required',
            'rep_signature' => 'required',
            'rep_title' => 'required'
        ]);

        // dd($request->all());

        $empRef = new EmployeeReferenceCheck();

        // get signature input
$signatureData = $request->input('signature');
$repSignatureData = $request->input('rep_signature');

$signatureParts = explode(',', $signatureData);
$repSignatureParts = explode(',', $repSignatureData);

$signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
$repSignatureEncoded = $repSignatureParts[1]; // Extract the base64-encoded part

$signatureBinary = base64_decode($signatureEncoded);
$repSignatureBinary = base64_decode($repSignatureEncoded);

// Generate a unique filename for the signature file
$signatureName = time() . '.png';
$repSignatureName = time() . '_rep.png';

// Save the signature file
Storage::put('public/signature/' . $signatureName, $signatureBinary);

// Save the repSignature file
Storage::put('public/signature/' . $repSignatureName, $repSignatureBinary);


         $empRef->applicant_id = $userID;
         $empRef->company_contacted = $request->company_contacted;
         $empRef->employer_name = $request->employer_name;
         $empRef->from_date = $request->from_date;
         $empRef->to_date = $request->to_date;
         $empRef->eligible_for_hire = $request->eligible_for_hire;   
         $empRef->comments = $request->comments;
         $empRef->received_by = $request->received_by;
         $empRef->name_of_company = $request->name_of_company;
         $empRef->signature = $signatureName;
         $empRef->rep_signature = $repSignatureName;
         $empRef->rep_title = $request->rep_title;

         

         EmployeeReferenceCheck::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'applicant_id' => $userID,
                'company_contacted' => $request->company_contacted,
                'employer_name' => $request->employer_name,
                'from_date' => $request->from_date,
                'to_date' => $request->to_date,
                'eligible_for_hire' => $request->eligible_for_hire,   
                'comments' => $request->comments,
                'received_by' => $request->received_by,
                'name_of_company' => $request->name_of_company,
                'signature' => $signatureName,
                'rep_signature' => $repSignatureName,
                'rep_title' => $request->rep_title
            ]
        );
        

         return redirect()->back()->with('success', 'Employee Reference Check Signed Successfully');

    }

}
