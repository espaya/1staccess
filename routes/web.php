<?php
use App\Http\Controllers\AttendanceTardinessController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ConfidentialityOfInformation;
use App\Http\Controllers\CriminalHistorySearch;
use App\Http\Controllers\DeleteAccountController;
use App\Http\Controllers\DisclaimerWaiverLiabilityController;
use App\Http\Controllers\DrugTestingPolicyController;
use App\Http\Controllers\EmployeeAgreement;
use App\Http\Controllers\EmployeeConductController;
use App\Http\Controllers\EmployeeDressCodeController;
use App\Http\Controllers\EmployeeOrientationController;
use App\Http\Controllers\EmployeeReferenceController;
use App\Http\Controllers\EmployeeSafetyController;
use App\Http\Controllers\EmploymentApplicationController;
use App\Http\Controllers\HealthSafetyController;
use App\Http\Controllers\HHACNAController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeHealthAideController;
use App\Http\Controllers\InfectionControlAgreementController;
use App\Http\Controllers\NonCompeteAgreementController;
use App\Http\Controllers\PoliciesAndProceduresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\SexualHarassmentController;
use App\Http\Controllers\SmokingInTheWorkplace;
use App\Http\Controllers\SwornDisclosureController;
use App\Http\Controllers\UniversalPrecautionsController;
use App\Http\Controllers\VerificationController;
use App\Http\Middleware\Authenticate;

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

Route::group(['middleware' => 'prevent-back-history'], function(){
    Auth::routes();


// homepage 
Route::get('/', function(){ 
    return view('login'); 
});

Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');


// user route
Route::middleware(['auth', 'dashboard'])->group(function () {

    Route::put('dashboard/profile/request-delete/{id}', [DeleteAccountController::class, 'store'])->name('request-delete.store');

    Route::resource('dashboard/profile/request-delete/', DeleteAccountController::class)->only(['index', 'store', 'udate'])->names('request-delete');

    Route::put('dashboard/profile/profile-avatar/{id}', [AvatarController::class, 'update'])->name('profile-avatar.update');

    Route::resource('dashboard/profile/profile-avatar/', AvatarController::class)->only(['index', 'store', 'update'])->names('profile-avatar');

    Route::put('dashboard/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('dashboard/profile/', ProfileController::class)->only(['index', 'store', 'update'])->names('profile');

    Route::resource('dashboard/verification', VerificationController::class)->only(['index', 'store'])->names('verification');

    Route::resource('dashboard/universal-precautions', UniversalPrecautionsController::class)->only(['index', 'store'])->names('universal-precautions');

    Route::resource('dashboard/sworn-disclosure-statement', SwornDisclosureController::class)->only(['index', 'store'])->names('sworn-disclosure-statement');

    Route::resource('dashboard/smoking-in-the-workplace', SmokingInTheWorkplace::class)->only(['index', 'store'])->names('smoking-in-the-workplace');

    Route::resource('dashboard/sexual-harassment', SexualHarassmentController::class)->only(['index', 'store'])->names('sexual-harassment');

    Route::resource('dashboard/reporting', ReportingController::class)->only(['index', 'store'])->names('reporting');

    Route::resource('dashboard/policies-and-procedures', PoliciesAndProceduresController::class)->only(['index', 'store'])->names('policies-and-procedures');

    Route::resource('dashboard/non-compete-agreement', NonCompeteAgreementController::class)->only(['index', 'store'])->names('non-compete-agreement');

    Route::resource('dashboard/home-health-aide', HomeHealthAideController::class)->only(['index', 'store'])->names('home-health-aide');

    Route::resource('dashboard/hha-cna', HHACNAController::class)->only(['index', 'store'])->names('hha-cna');

    Route::resource('dashboard/health-and-safety', HealthSafetyController::class)->only(['index', 'store'])->names('health-and-safety');

    Route::resource('dashboard/infection-control-agreement', InfectionControlAgreementController::class)->only(['index', 'store'])->names('infection-control-agreement');

    Route::resource('dashboard/employee-agreement', EmployeeAgreement::class)->only(['index', 'store'])->names('employee-agreement');

    Route::resource('dashboard/employee-reference-check', EmployeeReferenceController::class)->only(['index', 'store'])->names('employee-reference-check');

    Route::resource('dashboard/employee-orientation', EmployeeOrientationController::class)->only(['index', 'store'])->names('employee-orientation');

    Route::resource('dashboard/employee-conduct', EmployeeConductController::class)->only(['index', 'store'])->names('employee-conduct');

    Route::get('dashboard/attendance-tardiness', [AttendanceTardinessController::class, 'index'])->name('attendance-tardiness');
    Route::post('dashboard/attendance-tardiness', [AttendanceTardinessController::class, 'store'])->name('attendance-tardiness');

    Route::get('dashboard/drug-testing-policy', [DrugTestingPolicyController::class, 'index'])->name('drug-testing-policy');
    Route::post('dashboard/drug-testing-policy',[ DrugTestingPolicyController::class, 'store'])->name('drug-testing-policy');

    Route::get('dashboard/employee-dress-code', [EmployeeDressCodeController::class, 'index'])->name('employee-dress-code');
    Route::post('dashboard/employee-dress-code', [EmployeeDressCodeController::class, 'store'])->name('employee-dress-code');

    Route::get('dashboard/disclaimer-waiver-liability', [DisclaimerWaiverLiabilityController::class, 'index'])->name('disclaimer-waiver-liability');
    Route::post('dashboard/disclaimer-waiver-liability', [DisclaimerWaiverLiabilityController::class, 'store'])->name('disclaimer-waiver-liability');

    Route::get('dashboard/criminal-history-search', [CriminalHistorySearch::class, 'index'])->name('criminal-history-search');
    Route::post('dashboard/criminal-history-search', [CriminalHistorySearch::class, 'store'])->name('criminal-history-search');

    Route::get('dashboard/confidentiality-of-information', [ConfidentialityOfInformation::class, 'index'])->name('confidentiality-of-information');
    Route::post('dashboard/confidentiality-of-information', [ConfidentialityOfInformation::class, 'store'])->name('confidentiality-of-information');

    Route::get('dashboard/employee-safety', [EmployeeSafetyController::class, 'index'])->name('employee-safety');
    Route::post('dashboard/employee-safety', [EmployeeSafetyController::class, 'store'])->name('employee-safety');

    Route::resource('dashboard/employment-application', EmploymentApplicationController::class);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');  
    Route::post('/dashboard', [HomeController::class, 'store'])->name('dashboard');  
})->middleware(Authenticate::class);


// admin route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.dashboard');
});

Route::post('register', [RegisterController::class, 'create'])->name('register');

}); // prevent back button after logout