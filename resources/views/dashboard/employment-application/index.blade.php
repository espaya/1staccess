
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

            <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Include Icons CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">

<!-- Include App CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">


<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
    th {
        background-color: #f2f2f2;
    }
    /* Make table responsive */
    @media screen and (max-width: 600px) {
        table, thead, tbody, th, td, tr {
            display: block;
        }
        thead tr {
            display: none;
        }
        td {
            border: none;
            position: relative;
            padding-left: 50%;
        }
        td:before {
            position: absolute;
            left: 6px;
            content: attr(data-label);
            text-align: left;
            font-weight: bold;
        }
    }
</style>

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
                                    <div class="card-body">
                                    <img width="30%" src="{{ asset('images/1staccess.png') }}" style="margin-left:220px;">
                                    <p class="mb-sm-0 font-size-18" style="font-size: 14; text-align: center;">
                                    <strong>1st Access Home Care Incorporated</strong>
                                    </p>
                                    <p style="text-align: center; font-size: 11;">
                                        6600 Fieldtan Trail, Moseley, VA, 23120<br>Agency Phone: 804.818.3216
                                    </p>
                                    <p class="mb-sm-0 font-size-18" style="font-size: 11; text-align: center;">
                                        <strong>Application For Employment</strong>
                                    </p><br>
                                        
                                    <form id="myForm" action="{{route('dashboard')}}" onsubmit="submitForm();" method="post" enctype="multipart/form-data" class="row g-4">
                                       <div class="col-md-12">

                                       <p>
                                          Employee Hire Date: {{Carbon\Carbon::parse($empApplicationsData[0]['employee_hire_date'])->format('M d, Y') }}

                                          <span style="margin-left: 100px;">Email Address: {{$usersData[0]['email']}}</span>
                                       </p>

                                       <p>Name: {{$usersProfileData[0]['full_name']}}
                                          <span style="margin-left: 100px;">SSN #: {{$empApplicationsData[0]['SSN']}}</span>
                                       </p>

                                       <p>Present Address: {{$presentAddressData[0]['present_address']}}, {{$presentAddressData[0]['present_city']}}, {{$presentAddressData[0]['present_state']}}, {{$presentAddressData[0]['present_zip']}}</p>

                                       <p>Permanent Address: {{$permanentAddressData[0]['permanent_address']}}, {{$permanentAddressData[0]['permanent_city']}}, {{$permanentAddressData[0]['permanent_state']}}, {{$permanentAddressData[0]['permanent_zip']}}</p>

                                       <p>Phone #: {{$usersProfileData[0]['phone']}}
                                          <span style="margin-left: 70px;">If You Are Under 18, Can You Furnish A Work Permit?: {{$empApplicationsData[0]['furnish_work']}}</span>
                                       </p>

                                       <p>Employment Desired: {{$empApplicationsData[0]['employment_desired']}}</p>

                                       <p>Position: {{$empApplicationsData[0]['position']}}
                                          <span style="margin-left: 50px;"> Date You Can Start: {{Carbon\Carbon::parse($empApplicationsData[0]['date_start'])->format('M d, Y') }}</span>
                                          <span style="margin-left: 50px;">Salary: ${{number_format($empApplicationsData[0]['salary'], 2, '.', ',')}}</span>
                                       </p>

                                       <p>Are You Employed Now: {{$empApplicationsData[0]['employed_now']}}
                                       @if($empApplicationsData[0]['employed_now'] == 'Yes')
                                          <span style="margin-left: 50px;">If So May We Inquire Your Present Employer?: {{$empApplicationsData[0]['inqure_present_employer']}}</span>
                                       @endif
                                       </p>

                                       <p>Ever Applied For This Company Before?: {{$empApplicationsData[0]['applied_before']}}
                                       @if($empApplicationsData[0]['applied_before'] == 'Yes')
                                          <span style="margin-left: 25px;">Where?: {{$empApplicationsData[0]['where']}}</span>
                                          <span style="margin-left: 25px;">When?: {{ Carbon\Carbon::parse($empApplicationsData[0]['when'])->format('M d, Y') }}</span>
                                       @endif
                                       </p>

                                       <p>
                                          Are You On Layoff And Subject To Recall?: {{$empApplicationsData[0]['on_layoff_subject_to_recall']}}
                                       </p>

                                       <p>Will You Travel If Required?: {{$empApplicationsData[0]['travel_if_required']}}</p>

                                       <p>Will You Relocate If The Job Requires It?: {{$empApplicationsData[0]['relocate_if_required']}}</p>

                                       <p>Will You Work Overtime If Required?: {{$empApplicationsData[0]['overtime_if_required']}}</p>

                                       <p>Are you able to meet the attendance requirements of this position?: {{$empApplicationsData[0]['attendance_requirements_position']}}</p>

                                       <p>Have you ever been Bonded?: {{$empApplicationsData[0]['bonded']}}</p>

                                       <p>Have you ever been convicted of a felony in the past 7years?: {{$empApplicationsData[0]['convicted']}}</p>

                                       @if($empApplicationsData[0]['convicted'] == 'Yes')
                                       <p>Such conviction may be relevant if job related, but does not bar you from employment. If yes - explain: {{$empApplicationsData[0]['explain_convicted']}}</p>
                                       @endif

                                       <p>Driver's License Number: {{$empApplicationsData[0]['drivers_license']}}
                                          <span>State: {{$empApplicationsData[0]['drivers_license_state']}}</span>
                                       </p>
                                       
                                       <table>
                                          <thead>
                                             <tr>
                                                   <th></th>
                                                   <th>Education</th>
                                                   <th>Name and Location of School</th>
                                                   <th># of Years Completed</th>
                                                   <th>Did you graduate?</th>
                                                   <th>Subjects studied</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                   <td data-label="Education">Academic</td>
                                                   <td data-label="Academic">
                                                      <div>Currently Attending</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>Last Completed</div>
                                                   </td>
                                                   <td data-label="Name / Location of School">
                                                      <div>{{$academicData[0]['edu_current_name_location_school']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['edu_last_name_location_school']}}</div>
                                                   </td>
                                                   <td data-label="# of YearsCompleted">
                                                      <div>{{$academicData[0]['edu_current_number_years']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['edu_last_number_years']}}</div>
                                                   </td>
                                                   <td data-label="Did you graduate">
                                                      <div>{{$academicData[0]['edu_current_did_graduate']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['edu_last_did_graduate']}}</div>
                                                   </td>
                                                   <td data-label="Subjects studied">
                                                      <div>{{$academicData[0]['edu_current_subjects_studied']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['edu_last_subjects_studied']}}</div>
                                                   </td>
                                             </tr>
                                             <tr>
                                                   <td data-label="Education">Trades of Business</td>
                                                   <td data-label="Trades of Business">
                                                      <div>Currently Attending</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>Last Completed</div>
                                                   </td>
                                                   <td data-label="Name / Location of School">
                                                      <div>{{$academicData[0]['trades_current_name_location_school']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['trades_last_current_name_location_school']}}</div>
                                                   </td>
                                                   <td data-label="# of Year Completed">
                                                      <div>{{$academicData[0]['trades_current_number_years']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['trades_last_current_number_years']}}</div>
                                                   </td>
                                                   <td data-label="Did you graduate">
                                                      <div>{{$academicData[0]['trades_current_did_graduate']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['trades_last_current_did_graduate']}}</div>
                                                   </td>
                                                   <td data-label="Subjects studied">
                                                      <div>{{$academicData[0]['trades_current_subjects_studied']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$academicData[0]['trades_last_subjects_studied']}}</div>
                                                   </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <br>

                                       <p>Summarize special skills and qualifications required from employment or other experiences that may qualify you to work with this company: {{$empApplicationsData[0]['special_skills_qualifications']}}</p>

                                       <p><strong>Past Employment Information </strong></p>


                                       <table>
                                          <thead>
                                             <tr>
                                                   <th>Date/Month/Year</th>
                                                   <th>Name and Address of Employer</th>
                                                   <th>Phone Number</th>
                                                   <th>Salary</th>
                                                   <th>Job</th>
                                                   <th>Reason for Leaving</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                   <td data-label="From / To">
                                                      <div>From: {{ Carbon\Carbon::parse($past_emp_data[0]['from_date_1'])->format('M d, Y') }}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>To: {{Carbon\Carbon::parse($past_emp_data[0]['to_date_1'])->format('M d, Y') }}</div>
                                                   </td>
                                                   <td data-label="Name & Address">{{$past_emp_data[0]['name_address_employer_1']}}</td>
                                                   <td data-label="Phone Number">{{$past_emp_data[0]['phone_number_1']}}</td>
                                                   <td data-label="Salary">${{number_format($past_emp_data[0]['salary_1'], 2, '.', ',')}}</td>
                                                   <td data-label="Job">{{$past_emp_data[0]['job_1']}}</td>
                                                   <td data-label="Reason for leaving">{{$past_emp_data[0]['reason_leaving_1']}}</td>
                                             </tr>
                                             @if(!empty($past_emp_data[0]['from_date_2']))
                                             <tr>
                                                   <td data-label="From / To">
                                                      <div>From: {{ Carbon\Carbon::parse($past_emp_data[0]['from_date_2'])->format('M d, Y') }}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>To: {{ Carbon\Carbon::parse($past_emp_data[0]['to_date_2'])->format('M d, Y') }}</div>
                                                   </td>
                                                   <td data-label="Name & Address">{{$past_emp_data[0]['name_address_employer_2']}}</td>
                                                   <td data-label="Phone Number">{{$past_emp_data[0]['phone_number_2']}}</td>
                                                   <td data-label="Salary">${{number_format($past_emp_data[0]['salary_2'], 2, '.', ',')}}</td>
                                                   <td data-label="Job">{{$past_emp_data[0]['job_2']}}</td>
                                                   <td data-label="Reason for leaving">{{$past_emp_data[0]['reason_leaving_2']}}</td>
                                             </tr>
                                             @endif

                                             @if(!empty($past_emp_data[0]['from_date_3']))
                                             <tr>
                                                   <td data-label="From / To">
                                                      <div>From: {{ Carbon\Carbon::parse($past_emp_data[0]['from_date_3'])-format('M d, Y') }}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>To: {{ Carbon\Carbon::parse($past_emp_data[0]['to_date_3'])->format('M d, Y') }}</div>
                                                   </td>
                                                   <td data-label="name & Address">{{$past_emp_data[0]['name_address_employer_3']}}</td>
                                                   <td data-label="Phone Number">{{$past_emp_data[0]['phone_number_3']}}</td>
                                                   <td data-label="Salary">${{number_format($past_emp_data[0]['salary_3'], 2, '.', ',')}}</td>
                                                   <td data-label="Job">{{$past_emp_data[0]['job_3']}}</td>
                                                   <td data-label="Reason for Leaving">{{$past_emp_data[0]['reason_leaving_3']}}</td>
                                             </tr>
                                             @endif
                                             
                                          </tbody>
                                       </table>

                                       <br>

                                       <p><strong>Reference</strong></p>


                                       <table>
                                          <thead>
                                             <tr>
                                                   <th>Name</th>
                                                   <th>Address</th>
                                                   <th>Phone</th>
                                                   <th>Years Acquainted</th>
                                                   
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                   <td data-label="Column 1">{{$referenceData[0]['reference_name_1']}}</td>
                                                   <td data-label="Column 2">{{$referenceData[0]['reference_address_1']}}</td>
                                                   <td data-label="Column 3">{{$referenceData[0]['reference_phone_1']}}</td>
                                                   <td data-label="Column 4">{{$referenceData[0]['reference_years_acquainted_1']}}</td>   
                                             </tr>
                                             <tr>
                                                   <td data-label="Column 1">{{$referenceData[0]['reference_name_2']}}</td>
                                                   <td data-label="Column 2">{{$referenceData[0]['reference_address_2']}}</td>
                                                   <td data-label="Column 3">{{$referenceData[0]['reference_phone_2']}}</td>
                                                   <td data-label="Column 4">{{$referenceData[0]['reference_years_acquainted_2']}}</td>
                                             </tr>
                                             <tr>
                                                   <td data-label="Column 1">{{$referenceData[0]['reference_name_3']}}</td>
                                                   <td data-label="Column 2">{{$referenceData[0]['reference_address_3']}}</td>
                                                   <td data-label="Column 3">{{$referenceData[0]['reference_phone_3']}}</td>
                                                   <td data-label="Column 4">{{$referenceData[0]['reference_years_acquainted_3']}}</td>  
                                             </tr>
                                          </tbody>
                                       </table>

                                       <br>

                                       <p><strong>Language(s)</strong></p>


                                       <table>
                                          <thead>
                                             <tr>
                                                   <th>Language</th>
                                                   <th>Read and Write</th>
                                                   <th>Read and Speak</th>
                                                   <th>Speak Only</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                   <td data-label="Column 1">{{$languageData[0]['language_1']}}</td>
                                                   <td data-label="Column 2">{{$languageData[0]['read_write_1']}}</td>
                                                   <td data-label="Column 3">{{$languageData[0]['read_speak_1']}}</td>
                                                   <td data-label="Column 4">{{$languageData[0]['speak_only_1']}}</td>
                                             </tr>
                                             @if(!empty($languageData[0]['language_2']))
                                             <tr>
                                                   <td data-label="Column 1">{{$languageData[0]['language_2']}}</td>
                                                   <td data-label="Column 2">{{$languageData[0]['read_write_2']}}</td>
                                                   <td data-label="Column 3">{{$languageData[0]['read_speak_2']}}</td>
                                                   <td data-label="Column 4">{{$languageData[0]['speak_only_2']}}</td>
                                             </tr>
                                             @endif
                                          </tbody>
                                       </table>

                                       <br>

                                       <p>Emergency Address: {{$emergencyData[0]['emergency_address']}}, {{$emergencyData[0]['emergency_city']}}, {{$emergencyData[0]['emergency_state']}}, {{$emergencyData[0]['emergency_zip']}}</p>

                                       <div class="form-control-wrap">
                                          <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $signatureData[0]['signature']) }}">
                                          <span style="margin-left: 100px;">{{Carbon\Carbon::parse($signatureData[0]['date_signed'])->format('M d, Y')}}</span>
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
        <!-- Include jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

<!-- Include Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Include MetisMenu JS -->
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>

<!-- Include SimpleBar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>

<!-- Include Waves JS -->
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Include App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>
