
<!doctype html>
<html lang="en">

   @include('templates/admin/head')

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            @include('templates/admin/header')
            @include('templates/admin/sidebar')

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                            @error('signature')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                            {{$message}}  
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if(session('success'))
                                 <div class="alert alert-success alert-dismissible fade show" role="alert">    
                                    {{session('success')}}   
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                 </div>
                                 @endif
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <button onclick="printContent();" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-printer">
                                 </em><span>Print / Export To PDF</span>
                                 </button>
                                <h4 class="mb-sm-0 font-size-18"></h4><br>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Application For Employment</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <script>
                           function printContent(){
                              var printArea = document.getElementById('printArea');
                              var printContents = printArea.innerHTML;
                              var originalContents = document.body.innerHTML;
                              document.body.innerHTML = printContents;
                              window.print();
                              document.body.innerHTML = originalContents;
                           } 
                        </script>
                        <div id="printArea" class="row d-flex align-items-center justify-content-center">
                            <div class="col-xl-8">
                                <div style="padding: 20px;" class="card">
                                    <div class="card-body">
                                    <p class="mb-sm-0 font-size-18" style="font-size: 14; text-align: center;">
                                    <strong>1st Access Home Care Incorporated</strong>
                                    </p>
                                    <p style="text-align: center; font-size: 11;">
                                        6600 Fieldtan Trail, Moseley, VA, 23120<br>Agency Phone: 804.818.3216
                                    </p>
                                    <p class="mb-sm-0 font-size-18" style="font-size: 11; text-align: center;">
                                        <strong>Application For Employment</strong></p><br>
                                        <br>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <p style="font-size: 10;">
                                                            Client Hire Date: <u>{{ \Carbon\Carbon::parse($employment_data[0]['employee_hire_date'])->format('M d, Y') }} </u> 

                                                            <span style="margin-left: 100px;">Email Address: <u>{{$user->email}}</u></span>
                                                        </p>

                                                        <p>Name: <u>{{$profileData->full_name}}</u></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Name: {{$profileData->full_name}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">
                                                            Social Security #: {{ $employment_data[0]['SSN'] }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Present Address: {{ $employment_data[0]['present_address'] .' ' . $employment_data[0]['present_city'] .' ' . $employment_data[0]['present_state'] . ' ' . $employment_data[0]['present_zip'] }}</label>
                                            </div>


                                        <div class="mb-3">
                                            <label for="formrow-firstname-input" class="form-label">Permanent Address: {{ $employment_data[0]['permanent_address'] .' ' . $employment_data[0]['permanent_city'] .' ' . $employment_data[0]['permanent_state'] . ' ' . $employment_data[0]['permanent_zip'] }}</label>
                                        </div>


                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Phone Number: {{$profileData->phone}}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">If you are under 18 can you furnish a permit? {{ $employment_data[0]['furnish_work'] }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Employment Desired: {{ $employment_data[0]['employment_desired'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">
                                                            Position: {{ $employment_data[0]['position'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">
                                                            Date You Can Start: {{ \Carbon\Carbon::parse($employment_data[0]['date_start'])->format('M d, Y') }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">
                                                            Salary: ${{ number_format($employment_data[0]['salary'], 2) }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Ever Applied For This Company Before: {{ $employment_data[0]['applied_before'] }}</label>
                                                    </div>
                                                </div>
                                                @if($employment_data[0]['applied_before'] == 'Yes')
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Where: {{ $employment_data[0]['where'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">When: {{ \Carbon\Carbon::parse($employment_data[0]['when'])->format('M d, Y') }}</label>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Are You On Layoff And Subject To Recall: {{ $employment_data[0]['on_layoff_subject_to_recall'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Will You Travel If Required: {{ $employment_data[0]['travel_if_required'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Will You Relocate If Required?: {{ $employment_data[0]['relocate_if_required'] }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Will You Work Overtime If Required?: {{ $employment_data[0]['overtime_if_required'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Are you able to meet the attendance requirements of this position?: {{ $employment_data[0]['attendance_requirements_position'] }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Have You Ever Been Bonded?: {{ $employment_data[0]['bonded'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Have you ever been convicted of a felony in the past 7years?: {{ $employment_data[0]['convicted'] }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($employment_data[0]['convicted'] == 'Yes')
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Such conviction may be relevant if job related, but does not bar you from employment. If yes - explain: {{ $employment_data[0]['explain_convicted'] }}</label>
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Driver's License Number:
                                                         {{ $employment_data[0]['drivers_license'] }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">State: {{ $employment_data[0]['drivers_license_state'] }}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <h4 class="mb-sm-0 font-size-18">Academic / Education</h4>
                                            <p><strong>(Currently Attending)</strong></p>
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Name And Location Of School: {{ $employment_data[0]['edu_current_name_location_school'] }}</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Number Of Years Completed: {{ $employment_data[0]['edu_current_number_years']}} year(s)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Did You Graduate?: {{ $employment_data[0]['edu_current_did_graduate']}}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Subjects Studied?: {{ $employment_data[0]['edu_current_subjects_studied'] }}</label>
                                            </div>
                                            <hr>
                                            <p><strong>(Last Completed)</strong></p>
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Name And Location Of School: {{$employment_data[0]['edu_last_name_location_school']}}</label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Number Of Years Completed: {{$employment_data[0]['edu_last_number_years']}} year(s)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Did You Graduate?: {{$employment_data[0]['edu_last_did_graduate']}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">
                                                    Subjects Studied?: {{$employment_data[0]['edu_last_subjects_studied']}}</label>
                                            </div>

                                            <hr>
                                            <h4 class="mb-sm-0 font-size-18">Trades of Business / Education</h4>
                                            <p><strong>(Currently Attending)</strong></p>
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label"> Name And Location Of School: {{$employment_data[0]['trades_current_name_location_school']}} </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Number Of Years Completed: {{$employment_data[0]['trades_current_number_years']}} year(s)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Did You Graduate?: {{$employment_data[0]['trades_current_did_graduate']}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Subjects Studied?: {{ $employment_data[0]['trades_current_subjects_studied'] }}</label>
                                            </div>
                                            <hr>
                                            <p><strong>(Last Completed)</strong></p><br>
                                            <div class="mb-3">
                                                <label for="formrow-email-input" class="form-label">Name And Location Of School: {{$employment_data[0]['trades_last_current_name_location_school']}} </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Number Of Years Completed: {{$employment_data[0]['trades_last_current_number_years']}} Year(s)</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Did You Graduate?: {{ $employment_data[0]['trades_last_current_did_graduate']}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Subjects Studied?: {{$employment_data[0]['trades_last_subjects_studied']}} </label>
                                            </div>

                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">Summarize special skills and qualifications required from employment or other experiences that may qualify you to work with this company: {{$employment_data[0]['special_skills_qualifications']}} </label>
                                            </div>


                                            <hr>
                                            <h6 class="mb-sm-0 font-size-16">Previous Employeer</h6>
                                            <p>#1</p>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">From: {{\Carbon\Carbon::parse($employment_data[0]['from_date_1'])->format('M d, Y')}}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">To: {{\Carbon\Carbon::parse($employment_data[0]['to_date_1'])->format('M d, Y')}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Name and Address of Employer: {{$employment_data[0]['name_address_employer_1']}} </label>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Phone: {{$employment_data[0]['phone_number_1']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Salary: ${{number_format($employment_data[0]['salary_1'], 2)}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Job: {{$employment_data[0]['job_1']}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Reason(s) For Leaving: {{$employment_data[0]['reason_leaving_1']}} </label>
                                            </div>

                                        @if(!empty($employment_data[0]['from_date_2']))
                                            <p>#2</p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">From: {{ \Carbon\Carbon::parse($employment_data[0]['from_date_2'])->format('M d, Y')}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">To: {{\Carbon\Carbon::parse($employment_data[0]['to_date_2'])->format('M d, Y')}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Name And Address Of Employer: {{$employment_data[0]['name_address_employer_2']}} </label>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Phone: {{$employment_data[0]['phone_number_2']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Salary: ${{number_format($employment_data[0]['salary_2'], 2)}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Job: {{$employment_data[0]['job_2']}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Reason(s) For Leaving: {{ $employment_data[0]['reason_leaving_2'] }} </label>
                                            </div>
                                        @endif
                                        @if(!empty($employment_data[0]['from_date_3']))
                                            <p>#3</p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">From: {{\Carbon\Carbon::parse($employment_data[0]['from_date_3'])->format('M d, Y')}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">To: {{\Carbon\Carbon::parse($employment_data[0]['to_date_3'])->format('M d, Y')}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Name And Address Of Employer: {{$employment_data[0]['name_address_employer_3']}} </label>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Phone: {{$employment_data[0]['phone_number_3']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Salary: ${{number_format($employment_data[0]['salary_3'], 2)}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Job: {{$employment_data[0]['job_3']}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="formrow-password-input" class="form-label">Reason(s) For Leaving: {{$employment_data[0]['reason_leaving_3']}} </label>
                                            </div>
                                        @endif

                                            <h4 class="mb-sm-0 font-size-18">References</h4>
                                            <p>Give the name of three persons not related to you to whom you have known at least 1year</p>
                                            <p>#1</p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Name: {{$employment_data[0]['reference_name_1']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Address: {{$employment_data[0]['reference_address_1']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Phone: {{$employment_data[0]['reference_phone_1']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Years Acquainted: {{$employment_data[0]['reference_years_acquainted_1']}} </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <p>#2</p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Name: {{$employment_data[0]['reference_name_2']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Address: {{$employment_data[0]['reference_address_2']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Phone: {{$employment_data[0]['reference_phone_2']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Years Acquainted: {{$employment_data[0]['reference_years_acquainted_2']}} </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <p>#3</p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Name: {{$employment_data[0]['reference_name_3']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Address: {{$employment_data[0]['reference_address_3']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Phone: {{$employment_data[0]['reference_phone_3']}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Years Acquainted: {{$employment_data[0]['reference_years_acquainted_3']}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                        <br>
                                            <h4 class="mb-sm-0 font-size-16">Any foreign language(s).</h4>
                                            <p>#1</p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Language: {{ucfirst($employment_data[0]['language_1'])}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Read and Write: {{ucfirst($employment_data[0]['read_write_1'])}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Read and Speak: {{ucfirst($employment_data[0]['read_speak_1'])}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Speak Only: {{ucfirst($employment_data[0]['speak_only_1'])}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if(!empty($employment_data[0]['language_2']))
                                            <p>#2</p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Language: {{ucfirst($employment_data[0]['language_2'])}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Read and Write: {{ucfirst($employment_data[0]['read_write_2'])}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Read and Speak: {{ucfirst($employment_data[0]['read_speak_2'])}} </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Speak Only: {{ucfirst($employment_data[0]['speak_only_2'])}} </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="mb-3">
                                                <label for="formrow-firstname-input" class="form-label">In case of emergency notify: {{$employment_data[0]['emergency_address'] . ' ' . $employment_data[0]['emergency_city'] . ' ' . $employment_data[0]['emergency_state'] . ' ' . $employment_data[0]['emergency_zip']}}
                                                </label>
                                            </div>

                                            <div class="row">
                                                <h5>INITIAL	Conditions of Employment - please read carefully</h5>
                                                <p>Reporting to work with impaired abilities; or the possession, consumption or distribution of drugs or alcohol on company premises and/or worksites, shall be grounds for disciplinary action, including discharge. A condition of employment includes willingness on the part of applicant or employee to agree to the terms put forth by 1st Access Home Care Incorporated. We are committed to operating a drug free workplace. Violations of our drug and alcohol policy will result in dismissal.</p>

                                                <p>It is understood and agreed upon that any misrepresentation by me in this application will be sufficient cause for cancellation of this application and/or separation from the employer’s service if I have been employed. Furthermore, I understand that just as I am free to resign anytime, the Employer reserves the right to terminate my contract at any time, with or without cause and without prior notice. I understand that no representative of the employer has the authority to make any assurances to the contrary.</p>

                                                <p>I give the employer the right to investigate all police, driving and personal records and references if job related. I hereby release from liability the Employer and it’s representatives for seeking such information and all other persons, corporations or organizations for furnishing such information.</p>

                                                <p>The Employer is an Equal Opportunity Employer. The Employer does not discriminate in employment and no question on this application is used for the purpose of limiting or excusing any applicant’s consideration for employment on a basis prohibited by local, state or Federal law</p>

                                                <p>Any controversy of any kind arising between the parties under this agreement or otherwise (or any agent, officer, director or affiliate of any party), including but not limited to common law, statutory, tort or contract claims, will be submitted to mediation and failing settlement in mediation, to binding arbitration. Unless otherwise agreed mediation and arbitration designated by staff professionals will govern any mediation and arbitration. The parties will select the mediator or arbitrator from the designated company panel of mediators and will notify the designated company, in writing, to initiate the selection process. The arbitration will be subject to and governed by the provisions of the Federal Arbitration Act. 9 U.S.C Section1-et seq. The parties hereto stipulate that this agreement involves matters affecting interstate commerce.</p>

                                                <p>This application is current for 90 days. At the conclusion of this time if I have not heard from the Employer and still wish to be considered for employment, it will be necessary to fill out a new application.</p>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label"><strong>Signature of Applicant:
                                                        </strong></label><br>
                                                        <img width="250" class="img-fluid" src="{{asset('storage/signature/' . $employment_data[0]['signature'])}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Date: {{ \Carbon\Carbon::parse($employment_data[0]['date_signed'])->format('M d, Y')}}</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label"><strong>AGENCY MANAGEMENT NOTES:
                                                        </strong></label>
                                                        @if(empty($notesData))
                                                        <form action="{{route('agency-management-notes', ['applicant_id' => $applicant_id, 'id' => $id] )}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('GET')
                                                            <div class="mb-3">
                                                                <textarea name="agency_managements_notes" class="form-control @error('agency_managements_notes') is-invalid @enderror" cols="10" rows="10">{{ old('agency_managements_notes') }}</textarea> 
                                                                @error('agency_managements_notes') 
                                                                    <p class="alert alert-danger"> {{ $message }} </p>
                                                                @enderror
                                                            </div>
                                                            <div>
                                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                            </div>
                                                        </form>
                                                        @else 
                                                            @if(!empty($notesData[0]['agency_managements_notes']))
                                                                <p>{{ $notesData[0]['agency_managements_notes'] }}</p>
                                                            @else
                                                                <p>No data available</p>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @include('templates/dashboard/footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

<script type="text/javascript">
   var canvas = document.getElementById("signature-pad");
   var signaturePad = new SignaturePad(canvas);
   
   document.getElementById("clear").addEventListener('click', function(event) {
      event.preventDefault();
      signaturePad.clear();
   });
   
   
   function submitForm() {
     if(!signaturePad.isEmpty()){
       //Unterschrift in verstecktes Feld übernehmen
       document.getElementById('signature-input').value = signaturePad.toDataURL();
     }
   }
   
</script>
<style>
   .flex-row {
   display: flex;
   }
   .wrapper {
   border: 1px solid #4b00ff;
   border-right: 0;
   }
   canvas#signature-pad {
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }
   button#clear {
   height: 100%;
   background: #4b00ff;
   border: 1px solid transparent;
   color: #fff;
   font-weight: 600;
   cursor: pointer;
   }
   button#clear span {
   transform: rotate(90deg);
   display: block;
   }
</style>


        <!-- JAVASCRIPT -->
        @include('templates/admin/foot')

    </body>
</html>
