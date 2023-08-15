<?php

namespace App\Http\Controllers;

use App\Models\CriminalHistorySearch as ModelsCriminalHistorySearch;
use App\Services\UserProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CriminalHistorySearch extends Controller
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
        // db query
        $criminalHistory = DB::table('criminal_history_search')->where('applicant_id', $userID)->get();
        $nameQuery = DB::table('users_profile')->where('applicant_id', $userID)->get();
        // init array
        $criminalHistoryData = [];
        $nameQueryData = [];

        foreach($nameQuery as $item)
        {
            $full_name = $item->full_name;

            $nameQueryData[] = [
                'full_name' => $full_name
            ];

        }

        foreach($criminalHistory as $item)
        {
            $applicant_id = $item->applicant_id;
            $signature = $item->signature;
            $created_at = $item->created_at;

            $criminalHistoryData[] = [
                'applicant_id' => $applicant_id,
                'signature' => $signature,
                'created_at' => $created_at
            ]; 
        }
        return view('dashboard.criminal-history-search.index', [
            'criminalHistoryData' => $criminalHistoryData, 
            'nameQueryData' => $nameQueryData,
            'profileData' => $profileData
        ]);
    }

    public function store(Request $request)
    {
        // authenticated user
        $userID = Auth::id();
        // validate input
        $request->validate([
            'signature' => 'required'
        ]);

        $criminalHistory = new ModelsCriminalHistorySearch();

         // get signature input
         $signatureData = $request->input('signature');

         $signatureParts = explode(',', $signatureData);
         $signatureEncoded = $signatureParts[1]; // Extract the base64-encoded part
 
         $signatureBinary = base64_decode($signatureEncoded);
 
         // Generate a unique filename for the signature file
         $signatureName = time() . '.png';
 
         // Save the signature file to disk using the Storage facade
         Storage::put('public/signature/' . $signatureName, $signatureBinary);

         $criminalHistory->signature = $signatureName;
         $criminalHistory->applicant_id = $userID;

         ModelsCriminalHistorySearch::firstOrCreate(
            ['applicant_id' => $userID],
            [
                'signature' => $signatureName,
                'applicant_id' => $userID
            ]
         );

         // refresh page when form is submitted
        return redirect()->back()->with('success', 'Criminal History Search Consent Form Signed Successfully!');

    }
}
