<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VerificationController extends Controller
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

        $verification = DB::table('verification')->where('applicant_id', $userID)->get();
        $verificationData = [];
        foreach($verification as $item){
            $applicant_id = $item->applicant_id;
            $disciplines = $item->disciplines;
            $licenseNumber = $item->licenseNumber;
            $expirationDate = $item->expirationDate;
            $dateVerified = $item->dateVerified;
            $licenseVerifiedBy = $item->licenseVerifiedBy;
            $actionOutstanding = $item->actionOutstanding;
            $comments = $item->comments;
            $signature = $item->signature;
            $created_at = $item->created_at;
            $verificationData[] = [
                'applicant_id' => $applicant_id,
                'disciplines' => $disciplines,
                'licenseNumber' => $licenseNumber,
                'expirationDate' => $expirationDate,
                'dateVerified' => $dateVerified,
                'licenseVerifiedBy' => $licenseVerifiedBy,
                'actionOutstanding' => $actionOutstanding,
                'comments' => $comments,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.verification.index', 
        [
            'verificationData' => $verificationData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'disciplines' => 'required_without_all:checkboxRN, checkboxLPN,checkboxHHA,checkboxCNA' ,
            'licenseNumber' => 'required',
            'expirationDate' => 'required',
            'dateVerified' => 'required',
            'licenseVerifiedBy' => 'required',
            'actionOutstanding' => 'required',
            'comments' => 'required',
            'signature' => 'required'
        ]);

        $verification = new Verification();

        // get signature input
        $signatureData = $request->input('signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
        
        $signatureBinary = base64_decode($signatureEncoded);
        
        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';
        
        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);

        $verification->signature = $signatureName;
        $verification->applicant_id = $userID;
        $verification->disciplines = $request->disciplines;
        $verification->licenseNumber = $request->licenseNumber;
        $verification->expirationDate = $request->expirationDate;
        $verification->dateVerified = $request->dateVerified;
        $verification->licenseVerifiedBy = $request->licenseVerifiedBy;
        $verification->actionOutstanding = $request->actionOutstanding;
        $verification->comments = $request->comments;

        Verification::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'applicant_id' => $userID,
                'signature' => $signatureName,
                'disciplines' => implode(',', $request->input('disciplines', [])),
                'licenseNumber' => $request->licenseNumber,
                'expirationDate' => $request->expirationDate,
                'dateVerified' => $request->dateVerified,
                'licenseVerifiedBy' => $request->licenseVerifiedBy,
                'actionOutstanding' => $request->actionOutstanding,
                'comments' => $request->comments
            ]
        );

        return redirect()->back()->with('success', 'Verification of Professional License');

    }
}
