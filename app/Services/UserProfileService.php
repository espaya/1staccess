<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileService
{
    public function getUserProfileData()
    {
        $userID = Auth::id();
        $profile = DB::table('users_profile')->where('applicant_id', $userID)->get();

        $profileData = [];

        foreach($profile as $item)
        {
            $applicant_id = $item->applicant_id;
            $full_name = $item->full_name;
            $user_avatar = $item->user_avatar;

            $profileData[] = [
                'applicant_id' => $applicant_id,
                'full_name' => $full_name,
                'user_avatar' => $user_avatar
            ];
        }
        
        return $profileData;
    }
}