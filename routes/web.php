<?php

use App\Http\Controllers\Admin\ApplicantsController;
use App\Http\Controllers\Admin\FormSignings;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceTardinessController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
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
use Illuminate\Support\Facades\Password;

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

// homepage 
Route::get('/', function(){  
    return view('login'); 
})->name('home');

Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

Route::get('/verify', function(){ return view('auth/verify'); })->name('verification.verify');

Route::get('/verify', 'Auth\VerificationController@showResendForm')->name('verification.resend');

// login page route
// Route::match(['get', 'post'], '/', [LoginController::class, 'login'])->name('login');
Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('signin');

Auth::routes();

// admin route
Route::middleware(['web', 'auth', 'admin'])->group(function(){

    // non compete agreement agency rep signature
    Route::post('/admin/applicants/single-applicants/{applicant_id}/non-compete-agreement/{id}/agency-rep-signature', [FormSignings::class, 'saveNonCompeteAgencyRepSignature'])->name('save.nonCompeteAgencyRepSig');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/non-compete-agreement/{id}/agency-rep-signature', [FormSignings::class, 'viewNonCompeteAgencyRepSignature']);

    // policies and procedures rep signature
    Route::post('/admin/applicants/single-applicants/{applicant_id}/policies-and-procedures-orientation-acknowledgement/{id}/rep-signature', [FormSignings::class, 'savePolicyRepSignature'])->name('save.smokingRepSig');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/policies-and-procedures-orientation-acknowledgement/{id}/rep-signature', [FormSignings::class, 'viewPolicyRepSignature']);

    // smoking in the workplace (hr and supervisor signature)
    Route::post('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-smoking-in-the-workplace/{id}/hr-signature', [FormSignings::class, 'saveSmokingInWorkplaceHRSignature'])->name('save.smokingHRSig');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-smoking-in-the-workplace/{id}/supervisor-signature', [FormSignings::class, 'viewSmokingInWorkplaceHRSignature']);


    Route::post('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-smoking-in-the-workplace/{id}/supervisor-signature', [FormSignings::class, 'saveSmokingInWorkplaceSupervisorSignature'])->name('save.smokingSupervisorSig');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-smoking-in-the-workplace/{id}/supervisor-signature', [FormSignings::class, 'viewSmokingInWorkplaceSupervisorSignature']);

    // agency rep signature for non-compete agreement
    Route::post('/admin/applicants/single-applicants/{applicant_id}/non-compete-agreement/{id}/rep-signature', [FormSignings::class, 'saveNonCompeteAgreementRepSignature'])->name('non-compete-agreement-rep-signature');

    // agency rep signature for health and safety agreement
    Route::post('/admin/applicants/single-applicant/{applicant_id}/health-and-safety-agreement/{id}/agency-rep', [FormSignings::class, 'saveHealthSafetyAgreement'])->name('health-safety-agreement-agency-rep');

    // agency rep signature for infection control agreement
    Route::post('/admin/applicants/single-applicants/{applicant_id}/following-infection-control-agreement/{id}/rep-signature', [FormSignings::class, 'saveInfectionControlAgreementRepSignature'])->name('infection-control-agreement-rep-signature');

    // emplooyee orientation RN and HR signature
    Route::post('admin/applicants/single-applicant/{applicant_id}/employee-orientation/{id}/hr-supervisor-signature', [FormSignings::class, 'saveEmployeeOrientationHrSignatures'])->name('submit-hr-supervisor-signature');

    Route::post('admin/applicants/single-applicant/{applicant_id}/employee-orientation/{id}/rn-supervisor-signature', [FormSignings::class, 'saveEmployeeOrientationRNSignatures'])->name('submit-rn-supervisor-signature');

    // employee notification of policy: employee conduct (HR's signature)
    Route::post('admin/applicants/single-applicant/{applicant_id}/employee-notification-of-policy-employee-conduct/{id}/hr-signature', [FormSignings::class, 'saveEmployeeConductHrSignatures'])->name('submit-hr-signature');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-notification-of-policy-employee-conduct/{id}', [FormSignings::class, 'viewEmployeeConductHrSignatures'])->name('view-hrs-signature');

    // employee notification of policy: employee conduct (Supervisor's signature)
    Route::post('admin/applicants/single-applicant/{applicant_id}/employee-notification-of-policy-employee-conduct/{id}', [FormSignings::class, 'saveEmployeeConductSupervisorSignatures'])->name('submit-supervisors-signature');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-notification-of-policy-employee-conduct/{id}', [FormSignings::class, 'viewEmployeeConductSupervisorSignatures'])->name('supervisors-signature');

    // employee  agreement employer signature route
    Route::post('admin/applicants/single-applicant/{applicant_id}/employee-agreement/{id}', [FormSignings::class, 'saveEmployeeAgreementEmployerSignature'])->name('submit-employee-agreement');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-agreement/{id}', [FormSignings::class, 'viewEmployeeAgreementEmployerSignature'])->name('get-employee-agreement');

    // employee safety cellular phone use signature route
    Route::post('admin/applicants/single-applicant/{applicant_id}/employee-safety-cellular-phone-use/{id}', [FormSignings::class, 'saveCellularPhoneUseRepSignature'])->name('submit-cellular-phone-use');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-safety-cellular-phone-use/{id}', [FormSignings::class, 'viewCellularPhoneUseRepSignature'])->name('submit-cellular-phone-use');

    // disclaimer agency rep signature
    Route::post('admin/applicants/single-applicant/{applicant_id}/disclaimer-and-waiver-liability/{id}', [FormSignings::class, 'saveDiscalimerWaiverAgencyRepSignature'])->name('submit-disclaimer-waiver-liability');

    Route::get('admin/applicants/single-applicant/{applicant_id}/disclaimer-and-waiver-liability/{id}', [FormSignings::class, 'viewDisclaimerWaiverLiability'])->name('get-disclaimer-waiver-liability');
    
    // agency management notes route
    Route::post('/admin/applicants/single-applicants/{applicant_id}/application-for-employment/{id}', [FormSignings::class, 'saveAgencyManagementNotes'])->name('agency-management-notes');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/application-for-employment/{id}', [FormSignings::class, 'saveAgencyManagementNotes'])->name('view-agency-management-notes');

    // search route
    Route::get('/searchApplicants', [AdminController::class, 'searchApplicants'])->name('searchApplicants');

    Route::put('/admin/update-account', [AdminController::class, 'updateAccount'])->name('updateAccount');
    Route::put('/admin/update-avatar', [AdminController::class, 'updateAvatar'])->name('updateAvatar');
    Route::match(['put', 'patch'], '/admin/profile', [AdminController::class, 'updateProfile'])->name('profile');
    Route::get('/admin/profile', [AdminController::class, 'showProfilePage'])->name('view-profile');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/policies-and-procedures-orientation-acknowledgement/{id}', [ApplicantsController::class, 'viewPoliciesProcedures'])->name('view-policies-procedures');

    // hr signature route for employee attendance and tardiness
    Route::post('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-employee-attendance-tardiness-absenteeism-leave/{id}/hr-signature', [FormSignings::class, 'saveHRAttendanceTardinessSignature'])->name('post-employee-attendance-tardiness-absenteeism-leave-hr-signature');
    
    Route::get('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-employee-attendance-tardiness-absenteeism-leave/{id}/hr-signature', [FormSignings::class, 'viewHRAttendanceTardinessSignature'])->name('post-employee-attendance-tardiness-absenteeism-leave-hr-signature');

    // supervisor signature route for employee attendance and tardiness
    Route::post('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-employee-attendance-tardiness-absenteeism-leave/{id}/supervisor-signature', [FormSignings::class, 'saveSupervisorAttendanceTardinessSignature'])->name('post-employee-attendance-tardiness-absenteeism-leave-supervisor-signature');
    
    Route::get('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-employee-attendance-tardiness-absenteeism-leave/{id}/supervisor-signature', [FormSignings::class, 'viewSupervisorAttendanceTardinessSignature'])->name('post-employee-attendance-tardiness-absenteeism-leave-supervisor-signature');


    Route::get('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-employee-attendance-tardiness-absenteeism-leave/{id}', [ApplicantsController::class, 'viewAttendanceTardiness'])->name('view-employee-attendance-tardiness-absenteeism-leave');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/application-for-emplyment/{id}', [ApplicantsController::class, 'viewApplicationForEmployment'])->name('view-application-for-employment');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/reporting-abuse-neglect-exploitation/{id}', [ApplicantsController::class, 'viewReporting'])->name('view-reporting');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/verification-of-professional-license/{id}', [ApplicantsController::class, 'viewVerification'])->name('view-verification');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/training-documentation-on-universal-precautions/{id}', [ApplicantsController::class, 'viewUniversalPrecautions'])->name('view-universal-precautions');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/sworn-disclosure-statement/{id}', [ApplicantsController::class, 'viewSwornDisclosureStatement'])->name('view-sworn-disclosure-statement');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/employee-notification-of-policy-smoking-in-the-workplace/{id}', [ApplicantsController::class, 'viewSmokingInTheWorkplace'])->name('view-smoking-in-the-workplace');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/sexual-harassment/{id}', [ApplicantsController::class, 'viewSexualHarassment'])->name('view-sexual-harassment');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/non-compete-agreement/{id}', [ApplicantsController::class, 'viewNonCompeteAgreement'])->name('view-non-compete-agreement');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/following-infection-control-agreement/{id}', [ApplicantsController::class, 'viewInfectionControlAgreement'])->name('view-infection-control-agreement');

    Route::get('/admin/applicants/single-applicants/{applicant_id}/job-description-home-health-aide/{id}', [ApplicantsController::class, 'viewHomeHealthAide'])->name('view-home-health-aide');

    Route::get('/admin/applicants/single-applicant/{applicant_id}/health-and-safety-agreement/{id}', [ApplicantsController::class, 'viewHealthSafetyAgreement'])->name('view-health-safety-agreement');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-reference-check/{id}', [ApplicantsController::class, 'viewEmployeeReferenceCheck'])->name('view-employee-reference-check');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-orientation/{id}', [ApplicantsController::class, 'viewEmployeeOrientation'])->name('view-employee-orientation');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-dress-code/{id}', [ApplicantsController::class, 'viewEmployeeDressCode'])->name('view-employee-dress-code');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-notification-of-policy-employee-conduct/{id}', [ApplicantsController::class, 'viewEmployeeConduct'])->name('view-employee-conduct');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-agreement/{id}', [ApplicantsController::class, 'viewEmployeeAgreement'])->name('view-employee-agreement');

    Route::get('admin/applicants/single-applicant/{applicant_id}/disclaimer-and-waiver-of-liability/{id}', [ApplicantsController::class, 'viewDisclaimerWaiverLiability'])->name('view-disclaimer-waiver-liability');

    Route::get('admin/applicants/single-applicant/{applicant_id}/drug-testing-policy/{id}', [ApplicantsController::class, 'viewDrugTestingPolicy'])->name('get-drug-testing-policy');

    Route::get('admin/applicants/single-applicant/{applicant_id}/criminal-history-search-consent-form/{id}', [ApplicantsController::class, 'viewCriminalHistorySearch'])->name('view-criminal-history-search');

    Route::get('admin/applicants/single-applicant/{applicant_id}/confidentiality-of-information-agreement/{id}', [ApplicantsController::class, 'viewConfidentialityOfInformation'])->name('view-confidentiality-of-information');

    Route::get('admin/applicants/single-applicant/{applicant_id}/employee-safety-cellular-phone-use/{id}', [ApplicantsController::class, 'viewEmployeeSafety'])->name('view-employee-safety');

    Route::resource('admin/applicants/single-applicant', ApplicantsController::class)->only(['show']);

    Route::resource('admin/applicants', ApplicantsController::class)->only(['index'])->names('applicants');

    Route::resource('/admin', AdminController::class)->only(['index', 'store'])->names('admin');

})->middleware(Authenticate::class);


/* Password resset routes */
Route::get('forgot-password', function(){
    return view('auth/passwords.email');
})->middleware('guest')->name('forgot-password');

Route::post('/forgot-password', function(Request $request){

    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT 
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
        
})->middleware('guest')->name('password-email');


// user route
Route::middleware(['web', 'auth', 'dashboard'])->group(function () {

    Route::put('dashboard/profile/request-delete/{id}', [DeleteAccountController::class, 'store'])->name('request-delete-store');

    Route::resource('dashboard/profile/request-delete/', DeleteAccountController::class)->only(['index', 'store', 'udate'])->names('request-delete');

    Route::put('dashboard/profile/profile-avatar/{id}', [AvatarController::class, 'update'])->name('profile-avatar-update');

    Route::resource('dashboard/profile/profile-avatar/', AvatarController::class)->only(['index', 'store', 'update'])->names('profile-avatar');

    Route::put('dashboard/profile/{id}', [ProfileController::class, 'update'])->name('profile-update');

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

    Route::get('dashboard/attendance-tardiness', [AttendanceTardinessController::class, 'index'])->name('view-attendance-tardiness');
    Route::post('dashboard/attendance-tardiness', [AttendanceTardinessController::class, 'store'])->name('attendance-tardiness');

    Route::get('dashboard/drug-testing-policy', [DrugTestingPolicyController::class, 'index'])->name('view-drug-testing-policy');
    Route::post('dashboard/drug-testing-policy',[ DrugTestingPolicyController::class, 'store'])->name('drug-testing-policy');

    Route::get('dashboard/employee-dress-code', [EmployeeDressCodeController::class, 'index'])->name('get-employee-dress-code');
    Route::post('dashboard/employee-dress-code', [EmployeeDressCodeController::class, 'store'])->name('employee-dress-code');

    Route::get('dashboard/disclaimer-waiver-liability', [DisclaimerWaiverLiabilityController::class, 'index'])->name('show-disclaimer-waiver-liability');
    Route::post('dashboard/disclaimer-waiver-liability', [DisclaimerWaiverLiabilityController::class, 'store'])->name('disclaimer-waiver-liability');

    Route::get('dashboard/criminal-history-search', [CriminalHistorySearch::class, 'index'])->name('get-criminal-history-search');
    Route::post('dashboard/criminal-history-search', [CriminalHistorySearch::class, 'store'])->name('criminal-history-search');

    Route::get('dashboard/confidentiality-of-information', [ConfidentialityOfInformation::class, 'index'])->name('show-confidentiality-of-information');
    Route::post('dashboard/confidentiality-of-information', [ConfidentialityOfInformation::class, 'store'])->name('confidentiality-of-information');

    Route::get('dashboard/employee-safety', [EmployeeSafetyController::class, 'index'])->name('show-employee-safety');
    Route::post('dashboard/employee-safety', [EmployeeSafetyController::class, 'store'])->name('employee-safety');

    Route::resource('dashboard/employment-application', EmploymentApplicationController::class);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('show-dashboard');  
    Route::post('/dashboard', [HomeController::class, 'store'])->name('dashboard');  
})->middleware(Authenticate::class);


Route::post('register', [RegisterController::class, 'create'])->name('signup');

}); // prevent back button after logout