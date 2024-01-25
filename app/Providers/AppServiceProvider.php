<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    

    public function boot()
    {
        // check if current password matches the password in the db
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            $admin_ID = auth()->id();
            return Hash::check($value, DB::table('users')->where('id', $admin_ID)->value('password')); 
        });
    }

}
