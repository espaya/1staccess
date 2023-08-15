<?php

namespace App\Http\Controllers;

use App\Models\SwornDisclosure;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SwornDisclosureController extends Controller
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

        $postion = DB::table('employments_applications')->where('applicant_id', $userID)->get();
        $postionData = [];
        foreach($postion as $item){
            $applicant_id = $item->applicant_id;
            $postion = $item->position;
            $postionData[] = [
                'applicant_id' => $applicant_id,
                'position' => $postion
            ];
        }

        $sworn = DB::table('sworn_disclosure_statement')->where('applicant_id', $userID)->get();
        $swornData = [];
        foreach($sworn as $item){
            $applicant_id = $item->applicant_id;
            $mailing_address = $item->mailing_address;
            $convicted_outside_commonwealth = $item->convicted_outside_commonwealth;
            $outside_commonwealth_specify = $item->outside_commonwealth_specify;
            $convicted_pending = $item->convicted_pending;
            $convicted_pending_specify = $item->convicted_pending_specify;
            $child_abuse = $item->child_abuse;
            $wit_signature = $item->wit_signature;
            $signature = $item->signature;
            $created_at = $item->created_at;
            $swornData[] = [
                'applicant_id' => $applicant_id,
                'mailing_address' => $mailing_address,
                'convicted_outside_commonwealth' => $convicted_outside_commonwealth,
                'outside_commonwealth_specify' => $outside_commonwealth_specify,
                'convicted_pending' => $convicted_pending,
                'convicted_pending_specify' => $convicted_pending_specify,
                'child_abuse' => $child_abuse,
                'wit_signature' => $wit_signature,
                'signature' => $signature,
                'created_at' => $created_at
            ];
        }

        return view('dashboard.sworn-disclosure-statement.index', 
        [
            'positionData' => $postionData, 
            'swornData' => $swornData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        $userID = Auth::id();

        $request->validate([
            'mailing_address' => 'required',
            'convicted_outside_commonwealth' => 'required',
            'outside_commonwealth_specify' => 'nullable',
            'convicted_pending' => 'required',
            'convicted_pending_specify' => 'nullable',
            'child_abuse' => 'required',
            'wit_signature' => 'required',
            'signature' => 'required',
        ]);

        $swornDisclosure = new SwornDisclosure();

        // get signature input
        $signatureData = $request->input('signature');
        $witSignatureData = $request->input('wit_signature');

        $signatureParts = explode(',', $signatureData);
        $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
        $witSignatureParts = explode(',', $witSignatureData);
        $witSignatureEncoded = $witSignatureParts[1];

        $signatureBinary = base64_decode($signatureEncoded);
        $witSignatureBinary = base64_decode( $witSignatureEncoded);

        // Generate a unique filename for the signature file
        $signatureName = time() . '.png';
        $witSignatureName = time() . '_.png';

        // Save the signature file to disk using the Storage facade
        Storage::put('public/signature/' . $signatureName, $signatureBinary);
        Storage::put('public/signature/' . $witSignatureName, $witSignatureBinary);

        $swornDisclosure->applicant_id = $userID;
        $swornDisclosure->mailing_address = $request->mailing_address;
        $swornDisclosure->convicted_outside_commonwealth = $request->convicted_outside_commonwealth;
        $swornDisclosure->outside_commonwealth_specify = $request->outside_commonwealth_specify;
        $swornDisclosure->convicted_pending = $request->convicted_pending;
        $swornDisclosure->convicted_pending_specify = $request->convicted_pending_specify;
        $swornDisclosure->child_abuse = $request->child_abuse;
        $swornDisclosure->signature = $signatureName;
        $swornDisclosure->wit_signature = $witSignatureName;

        SwornDisclosure::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'mailing_address' => $request->mailing_address,
                'convicted_outside_commonwealth' => $request->convicted_outside_commonwealth,
                'outside_commonwealth_specify' => $request->outside_commonwealth_specify,
                'convicted_pending' => $request->convicted_pending,
                'convicted_pending_specify' => $request->convicted_pending_specify,
                'child_abuse' => $request->child_abuse,
                'signature' => $signatureName,
                'wit_signature' => $witSignatureName,
                'applicant_id' => $userID
            ]
        );

        return redirect()->back()->with('success', 'Sworn Disclosure Statement Signed Successfully');
    }

}
