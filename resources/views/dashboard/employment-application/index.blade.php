
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Application For Employment - 1staccess Home Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="1staccess job application portal" name="description">
        <meta content="1staccess Home Care" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>

        @vite(['resources/css/bootstrap.min.css', 'resources/css/icons.min.css', 'resources/css/app.min.css'])

    </head>

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            
            @include('templates/dashboard/header')
            @include('templates/dashboard/sidebar')

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
                                        <h4 class="mb-sm-0 font-size-18">Application For Employment</h4><br>
                                        <br>

                                        <form id="myForm" action="{{route('dashboard')}}" onsubmit="submitForm();" method="post" enctype="multipart/form-data" class="row g-4">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>Employee Hire Date: {{$empApplicationsData[0]['employee_hire_date']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>Email Address: {{$usersData[0]['email']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>Name: {{$usersProfileData[0]['full_name']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>SSN #: {{$empApplicationsData[0]['SSN']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><strong>Present Address</strong></p>
                                                <p>{{$presentAddressData[0]['present_address']}}, {{$presentAddressData[0]['present_city']}}, {{$presentAddressData[0]['present_state']}}, {{$presentAddressData[0]['present_zip']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><strong>Permanent Address</strong></p>
                                                <p>{{$permanentAddressData[0]['permanent_address']}}, {{$permanentAddressData[0]['permanent_city']}}, {{$permanentAddressData[0]['permanent_state']}}, {{$permanentAddressData[0]['permanent_zip']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>Phone #: {{$usersProfileData[0]['phone']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>If You Are Under 18, Can You Furnish A Work Permit?: {{$empApplicationsData[0]['furnish_work']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Employment Desired: {{$empApplicationsData[0]['employment_desired']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Position: {{$empApplicationsData[0]['position']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Date You Can Start: {{$empApplicationsData[0]['date_start']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Salary: ${{number_format($empApplicationsData[0]['salary'], 2, '.', ',')}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Are You Employed Now: {{$empApplicationsData[0]['employed_now']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       @if($empApplicationsData[0]['employed_now'] == 'Yes')
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>If So May We Inquire Your Present Employer?: {{$empApplicationsData[0]['inqure_present_employer']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Ever Applied For This Company Before?: {{$empApplicationsData[0]['applied_before']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       @if($empApplicationsData[0]['applied_before'] == 'Yes')
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>where?: {{$empApplicationsData[0]['where']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>When?: {{$empApplicationsData[0]['when']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Are You On Layoff And Subject To Recall?: {{$empApplicationsData[0]['on_layoff_subject_to_recall']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Will You Travel If Required?: {{$empApplicationsData[0]['travel_if_required']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Will You Relocate If The Job Requires It?: {{$empApplicationsData[0]['relocate_if_required']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Will You Work Overtime If Required?: {{$empApplicationsData[0]['overtime_if_required']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Are you able to meet the attendance requirements of this position?: {{$empApplicationsData[0]['attendance_requirements_position']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Have you ever been Bonded?: {{$empApplicationsData[0]['bonded']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Have you ever been convicted of a felony in the past 7years?: {{$empApplicationsData[0]['convicted']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       @if($empApplicationsData[0]['convicted'] == 'Yes')
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Such conviction may be relevant if job related, but does not bar you from employment. If yes - explain: {{$empApplicationsData[0]['explain_convicted']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <p>Driver's License Number: {{$empApplicationsData[0]['drivers_license']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <p>State: {{$empApplicationsData[0]['drivers_license_state']}}</p>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <p><strong>Academic/Education(Currently Attending) </strong></p>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name and Location of School</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_current_name_location_school']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label"># of Years Completed</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_current_number_years']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Did You Graduate</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_current_did_graduate']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Subjects Studied</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_current_subjects_studied']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <p><strong>Academic/Education(Last Completed) </strong></p>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name and Location of School</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_last_name_location_school']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Present Address -->
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label"># of Years Completed</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_last_number_years']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Did You Graduate</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_last_did_graduate']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Subjects Studied</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['edu_last_subjects_studied']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <p><strong>Trades of Business/Education(Currently Attending) </strong></p>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name and Location of School</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_current_name_location_school']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Present Address -->
                                       <div class="col-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label"># of Years Completed</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_current_number_years']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Did You Graduate</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_current_did_graduate']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Subjects Studied</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_current_subjects_studied']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <p><strong>Trades of Business/Education(Last Completed) </strong></p>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name and Location of School</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_last_current_name_location_school']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Present Address -->
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label"># of Years Completed</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_last_current_number_years']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Did You Graduate</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_last_current_did_graduate']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Subjects Studied</label>
                                             <div class="form-control-wrap">
                                                <p>{{$academicData[0]['trades_last_subjects_studied']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <p>Summarize special skills and qualifications required from employment or other experiences that may qualify you to work with this company:</p>
                                             <div class="form-control-wrap">
                                                <p>{{$empApplicationsData[0]['special_skills_qualifications']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <p><strong>Past Employment Information </strong></p>
                                       <p>#1</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">From</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['from_date_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">To</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['to_date_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name and Address of Employer</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['name_address_employer_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Phone Number</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['phone_number_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Salary</label>
                                             <div class="form-control-wrap">
                                                <p>${{number_format($past_emp_data[0]['salary_1'], 2, '.', ',')}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Job</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['job_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Reason For Leaving</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['reason_leaving_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       @if(!empty($past_emp_data[0]['from_date_2']))
                                       <p>#2</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">From</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['from_date_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">To</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['to_date_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name and Address of Employer</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['name_address_employer_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Phone Number</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['phone_number_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Salary</label>
                                             <div class="form-control-wrap">
                                                <p>${{number_format($past_emp_data[0]['salary_2'], 2, '.', ',')}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Job</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['job_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Reason For Leaving</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['reason_leaving_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       @if(!empty($past_emp_data[0]['from_date_3']))
                                       <p>#3</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">From</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['from_date_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">To</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['to_date_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name and Address of Employer</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['name_address_employer_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Phone Number</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['phone_number_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Salary</label>
                                             <div class="form-control-wrap">
                                                <p>${{number_format($past_emp_data[0]['salary_3'], 2, '.', ',')}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Job</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['job_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputCity" class="form-label">Reason For Leaving</label>
                                             <div class="form-control-wrap">
                                                <p>{{$past_emp_data[0]['reason_leaving_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <hr>
                                       <p><strong>Reference</strong></p>
                                       <p>#1</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_name_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Address</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_address_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Phone</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_phone_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Years Acquainted: {{$referenceData[0]['reference_years_acquainted_1']}}</label>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <p>#2</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_name_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Address</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_address_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Phone</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_phone_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Years Acquainted: {{$referenceData[0]['reference_years_acquainted_2']}}</label>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <p>#3</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Name</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_name_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Address</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_address_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-2">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Phone</label>
                                             <div class="form-control-wrap">
                                                <p>{{$referenceData[0]['reference_phone_3']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Years Acquainted: {{$referenceData[0]['reference_years_acquainted_3']}}</label>
                                             <div class="form-control-wrap">
                                                <p></p>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <p><strong>Language(s)</strong></p>
                                       <p>#1</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Language</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['language_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Read and Write</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['read_write_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Read and Speak</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['read_speak_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Speak Only</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['speak_only_1']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       @if($languageData[0]['language_2'])
                                       <p>#2</p>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Language</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['language_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Read and Write</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['read_write_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Read and Speak</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['read_speak_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress2" class="form-label">Speak Only</label>
                                             <div class="form-control-wrap">
                                                <p>{{$languageData[0]['speak_only_2']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       @endif
                                       <hr>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><strong>Emergency Address</strong></p>
                                                <p>{{$emergencyData[0]['emergency_address']}}, {{$emergencyData[0]['emergency_city']}}, {{$emergencyData[0]['emergency_state']}}, {{$emergencyData[0]['emergency_zip']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <div class="col-md-8">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Signature</label>
                                             <div class="form-control-wrap">
                                                <img class="img-fluid" src="{{ asset('storage/signature/' . $signatureData[0]['signature']) }}">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                                <p>{{Carbon\Carbon::parse($signatureData[0]['date_signed'])->format('M d, Y')}}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </form>
                                        
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
        @vite(['resources/libs/jquery/jquery.min.js', 
        'resources/libs/bootstrap/js/bootstrap.bundle.min.js', 
        'resources/libs/metismenu/metisMenu.min.js', 
        'resources/libs/simplebar/simplebar.min.js', 
        'resources/libs/node-waves/waves.min.js',  
        'resources/js/app.js'])

    </body>
</html>
