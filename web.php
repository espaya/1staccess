<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmploymentApplicationController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// homepage 
Route::get('/', function(){ 
    return view('login'); 
});



Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');



// user route
Route::middleware(['auth', 'dashboard'])->group(function () {
    Route::resource('/dashboard', HomeController::class)->name('store', 'dashboard');
    // Route::post('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [EmploymentApplicationController::class, 'create'])->name('create');
});


// admin route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.dashboard');
});



Route::post('register', [RegisterController::class, 'create'])->name('register');


