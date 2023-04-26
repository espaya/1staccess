<?php

namespace App\Http\Controllers;

use App\Models\AcademicTrades;
use App\Models\c;
use App\Models\Emergency;
use App\Models\EmploymentApplication;
use App\Models\Files;
use App\Models\Language;
use App\Models\PastEmpInfo;
use App\Models\PremanentAddress;
use App\Models\PresentAdrress;
use App\Models\Profile;
use App\Models\Reference;
use App\Models\Signature;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home');
    }

    public function store(Request $request)
    {
        // validate form data
        $request->validate([
        'SSN'                                           => 'required|regex:/^\d{3}-\d{2}-\d{4}$/',
        'full_name'                                     => 'required|regex:/^[a-zA-Z., -]/',
        'furnish_work'                                  => 'required',
        // 'employment_desired'                         => 'required',
        'position'                                      => 'required',
        'date_start'                                    => 'required',
        'salary'                                        => 'required',
        'employed_now'                                  => 'required',
        'inqure_present_employer'                       => 'required',
        'applied_before'                                => 'required',
        'where'                                         => 'required',
        'when'                                          => 'required',
        'on_layoff_subject_to_recall'                   => 'required',
        'travel_if_required'                            => 'required',
        'relocate_if_required'                          => 'required',
        'overtime_if_required'                          => 'required',
        'attendance_requirements_position'              => 'required',
        'bonded'                                        => 'required',
        'convicted'                                     => 'required',
        // 'explain_convicted'                          => 'required',
        'drivers_license'                               => 'required',
        'drivers_license_state'                         => 'required',
        'special_skills_qualifications'                 => 'required',

        'phone'                                         => 'required|regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/',

        'present_address'                               => 'required',
        'present_city'                                  => 'required',
        'present_state'                                 => 'required',
        'present_zip'                                   => 'required|regex:/^\d{5}(-\d{4})?$/',

        'permanent_address'                             => 'required',
        'permanent_city'                                => 'required',
        'permanent_state'                               => 'required',
        'permanent_zip'                                 => 'required|regex:/^\d{5}(-\d{4})?$/',

        'edu_current_name_location_school'              => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'edu_current_number_years'                      => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'edu_current_did_graduate'                      => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'edu_current_subjects_studied'                  => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'edu_last_name_location_school'                 => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'edu_last_number_years'                         => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'edu__last_did_graduate'                        => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'edu_last_subjects_studied'                     => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_current_name_location_school'           => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_current_number_years'                   => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_current_did_graduate'                   => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_current_subjects_studied'               => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_last_current_name_location_school'      => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_last_current_number_years'              => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_last_current_did_graduate'              => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',
        'trades_last_subjects_studied'                  => 'required|regex:/^[a-zA-Z 0-9\s,.-]+$/',

        'from_date_1'                                   => 'required',
        'to_date_1'                                     => 'required',
        'name_address_employer_1'                       => 'required|regex:/^[a-zA-Z 0-9,. -]+$/',
        'phone_number_1'                                => 'required|regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/',
        'job_1'                                         => 'required|regex:/^[a-zA-Z]+$/',
        'reason_leaving_1'                              => 'required',
        'from_date_2',
        'to_date_2',
        'name_address_employer_2',
        'phone_number_2',
        'job_2',
        'reason_leaving_2',
        'from_date_3',
        'to_date_3',
        'name_address_employer_3',
        'phone_number_3',
        'job_3',
        'reason_leaving_3',

        'reference_name_1'                      => 'required|regex:/^[a-zA-Z]+$/',
        'reference_address_1'                   => 'required|regex:/^[a-zA-Z]+$/',
        'reference_phone_1'                     => 'required|regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/',
        'reference_years_acquainted_1'          => 'required|regex:/^[a-zA-Z0-9]+$/',
        'reference_name_2'                      => 'required|regex:/^[a-zA-Z]+$/',
        'reference_address_2'                   => 'required|regex:/^[a-zA-Z]+$/',
        'reference_phone_2'                     => 'required|regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/',
        'reference_years_acquainted_2'          => 'required|regex:/^[a-zA-Z]+$/',
        'reference_name_3'                      => 'required|regex:/^[a-zA-Z]+$/',
        'reference_address_3'                   => 'required|regex:/^[a-zA-Z]+$/',
        'reference_phone_3'                     => 'required|regex:/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/',
        'reference_years_acquainted_3'          => 'required|regex:/^[a-zA-Z0-9]+$/',

        'language_1'                            => 'required|regex:/^[a-zA-Z]+$/',
        'read_write_1'                          => 'required|regex:/^[a-zA-Z]+$/',
        'read_speak_1'                          => 'required|regex:/^[a-zA-Z]+$/',
        'speak_only_1'                          => 'required|regex:/^[a-zA-Z]+$/',
        'language_2',
        'read_write_2',
        'read_speak_2',
        'speak_only_2',

        'emergency_address'                     => 'required',
        'emergency_city'                        => 'required',
        'emergency_state'                       => 'required',
        'emergency_zip'                         => 'required',

        'social_security_card'                  => 'required|regex:/^(pdf|jpe?g|png)$/i',
        'covid_proof'                           => 'required|regex:/^(pdf|jpe?g|png)$/i',
        'pca_hha_certificate'                   => 'required|regex:/^(pdf|jpe?g|png)$/i',
        'proof_ppd'                             => 'required|regex:/^(pdf|jpe?g|png)$/i',
        'cpr_certificate'                       => 'required|regex:/^(pdf|jpe?g|png)$/i',

        'signature'                             => 'required',
        'date_signed'                           => 'required'

        ]);

        
        $EmpApp = new EmploymentApplication();
        $AcadTrad = new AcademicTrades();
        $AppFiles = new Files();
        $UserProfile = new Profile();
        $Emergency = new Emergency();
        $PastEmp = new PastEmpInfo();
        $Signature = new Signature();
        $PresAddr = new PresentAdrress();
        $PermAddr = new PremanentAddress();
        $Reference = new Reference();
        $Lang = new Language();


        // language
        $Lang->language_1 = $request->language_1;
        $Lang->read_write_1 = $request->read_write_1;
        $Lang->read_speak_1 = $request->read_speak_1;
        $Lang->speak_only_1 = $request->speak_only_1;
        $Lang->language_2 = $request->language_2;
        $Lang->read_write_2 = $request->read_write_2;
        $Lang->read_speak_2 = $request->read_speak_2;
        $Lang->speak_only_2 = $request->speak_only_2;



        // reference
        $Reference->reference_name_1 = $request->reference_name_1;
        $Reference->reference_address_1 = $request->reference_address_1;
        $Reference->reference_phone_1 = $request->reference_phone_1;
        $Reference->reference_years_acquainted_1 = $request->reference_years_acquainted_1;
        $Reference->reference_name_2 = $request->reference_name_2;
        $Reference->reference_address_2 = $request->reference_address_2;
        $Reference->reference_phone_2 = $request->reference_phone_2;
        $Reference->reference_years_acquainted_2 = $request->reference_years_acquainted_2;
        $Reference->reference_name_3 = $request->reference_name_3;
        $Reference->reference_address_3 = $request->reference_address_3;
        $Reference->reference_phone_3 = $request->reference_phone_3;
        $Reference->reference_years_acquainted_3 = $request->reference_years_acquainted_3;
        $Reference->save();

        // employment application
        $EmpApp->SSN = $request->SSN;
        $EmpApp->furnish_work = $request->furnish_work;
        $EmpApp->employment_desired = $request->employment_desired;
        $EmpApp->position = $request->position;
        $EmpApp->date_start = $request->date_start;
        $EmpApp->salary = $request->salary;
        $EmpApp->employed_now = $request->employed_now;
        $EmpApp->inqure_present_employer = $request->inqure_present_employer;
        $EmpApp->applied_before = $request->applied_before;
        $EmpApp->where = $request->where;
        $EmpApp->when = $request->when;
        $EmpApp->on_layoff_subject_to_recall = $request->on_layoff_subject_to_recall;
        $EmpApp->travel_if_required = $request->travel_if_required;
        $EmpApp->relocate_if_required = $request->relocate_if_required;
        $EmpApp->overtime_if_required = $request->overtime_if_required;
        $EmpApp->attendance_requirements_position = $request->attendance_requirements_position;
        $EmpApp->bonded = $request->bonded;
        $EmpApp->convicted = $request->convicted;
        $EmpApp->explain_convicted = $request->explain_convicted;
        $EmpApp->drivers_license = $request->drivers_license;
        $EmpApp->drivers_license_state = $request->drivers_license_state;
        $EmpApp->special_skills_qualifications = $request->special_skills_qualifications;
        $EmpApp->save();

        // present address
        $PresAddr->present_address = $request->present_address;
        $PresAddr->present_city = $request->present_city;
        $PresAddr->present_state = $request->present_state;
        $PresAddr->present_zip  = $request->present_zip;
        $PresAddr->save();

        // permanent address
        $PermAddr->permanent_address = $request->permanent_address;
        $PermAddr->permanent_city= $request->permanent_city;
        $PermAddr->permanent_state = $request->permanent_state;
        $PermAddr->permanent_zip = $request->permanent_zip;
        $PermAddr->save();
        
        // Academic, Education, Trades Business
        $AcadTrad->edu_current_name_location_school = $request->edu_current_name_location_school;
        $AcadTrad->edu_current_number_years = $request->edu_current_number_years;
        $AcadTrad->edu_current_did_graduate = $request->edu_current_did_graduate;
        $AcadTrad->edu_current_subjects_studied = $request->edu_current_subjects_studied;
        $AcadTrad->edu_last_name_location_school = $request->edu_last_name_location_school;
        $AcadTrad->edu_last_number_years = $request->edu_last_number_years;
        $AcadTrad->edu__last_did_graduate = $request->edu__last_did_graduate;
        $AcadTrad->edu_last_subjects_studied = $request->edu_last_subjects_studied;

        $AcadTrad->trades_current_name_location_school = $request->trades_current_name_location_school;
        $AcadTrad->trades_current_number_years = $request->trades_current_number_years;
        $AcadTrad->trades_current_did_graduate = $request->trades_current_did_graduate;
        $AcadTrad->trades_current_subjects_studied = $request->trades_current_subjects_studied;
        $AcadTrad->trades_last_current_name_location_school = $request->trades_last_current_name_location_school;
        $AcadTrad->trades_last_current_number_years = $request->trades_last_current_number_years;
        $AcadTrad->trades_last_current_did_graduate = $request->trades_last_current_did_graduate;
        $AcadTrad->trades_last_subjects_studied = $request->trades_last_subjects_studied;
        $AcadTrad->save();

        // past employment info
        $PastEmp->from_date_1 = $request->from_date_1;
        $PastEmp->to_date_1 = $request->to_date_1;
        $PastEmp->name_address_employer_1 = $request->name_address_employer_1;
        $PastEmp->phone_number_1 = $request->phone_number_1;
        $PastEmp->job_1 = $request->job_1;
        $PastEmp->reason_leaving_1 = $request->reason_leaving_1;

        $PastEmp->from_date_2 = $request->from_date_2;
        $PastEmp->to_date_2 = $request->to_date_2;
        $PastEmp->name_address_employer_2 = $request->name_address_employer_2;
        $PastEmp->phone_number_2 = $request->phone_number_2;
        $PastEmp->job_2 = $request->job_2;
        $PastEmp->reason_leaving_2 = $request->reason_leaving_2;

        $PastEmp->from_date_3 = $request->from_date_3;
        $PastEmp->to_date_3 = $request->to_date_3;
        $PastEmp->name_address_employer_3 = $request->name_address_employer_3;
        $PastEmp->phone_number_3 = $request->phone_number_3;
        $PastEmp->job_3 = $request->job_3;
        $PastEmp->reason_leaving_3 = $request->reason_leaving_3;
        $PastEmp->save();

        // files
        $AppFiles->social_security_card = $request->social_security_card;
        $AppFiles->covid_proof = $request->covid_proof;
        $AppFiles->pca_hha_certificate = $request->pca_hha_certificate;
        $AppFiles->proof_ppd = $request->proof_ppd;
        $AppFiles->cpr_certificate = $request->cpr_certificate;
        $AppFiles->save();

        //user profile
        $UserProfile->full_name = $request->full_name;
        $UserProfile->phone = $request->phone;
        $UserProfile->save();

        //emergency
        $Emergency->emergency_address = $request->emergency_address;
        $Emergency->emergency_city = $request->emergency_city;
        $Emergency->emergency_state = $request->emergency_state;
        $Emergency->emergency_zip = $request->emergency_zip;
        $Emergency->save();

        //Signature 
        $Signature->signature = $request->signature;
        $Signature->date_signed = $request->date_signed;
        $Signature->save();
    }

    public function show(){
        // return view('dashboard.home');
    }
}
