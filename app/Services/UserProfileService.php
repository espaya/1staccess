<?php 

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class UserProfileService
{
    public function getAdminAccount()
    {
        $adminAccount = DB::table('admin_profile_migration')->first();

        if(!empty($adminAccount))
        
            return [
                'admin_fullname' => $adminAccount->admin_fullname,
                'admin_phone' => $adminAccount->admin_phone,
                'admin_avatar' => $adminAccount->admin_avatar,
                'admin_address' => $adminAccount->admin_address
            ];
        
    }

    public function getUser()
    {
        $userID = Auth::id();
        $user = DB::table('users')->where('id', $userID)->first();

        return [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
        ];
    }

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