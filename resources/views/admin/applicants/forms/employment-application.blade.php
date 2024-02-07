
<!doctype html>
<html lang="en">

   @include('templates/admin/head')

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
                                        <br>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <p style="font-size: 10;">
                                                            Client Hire Date: <u>{{ \Carbon\Carbon::parse($employment_data[0]['employee_hire_date'])->format('M d, Y') }} </u> 

                                                            <span style="margin-left: 100px;">Email Address: <u>{{$user->email}}</u></span>
                                                        </p>

                                                        <p>Name: {{$profileData->full_name}}
                                                            <span style="margin-left: 100px;">Social Security #: 
                                                                {{ $employment_data[0]['SSN'] }}

                                                            </span>
                                                        </p>

                                                        <P>Present Address: {{ $employment_data[0]['present_address'] .' ' . $employment_data[0]['present_city'] .' ' . $employment_data[0]['present_state'] . ' ' . $employment_data[0]['present_zip'] }}
                                                        </P>

                                                        <p>Permanent Address: {{ $employment_data[0]['permanent_address'] .' ' . $employment_data[0]['permanent_city'] .' ' . $employment_data[0]['permanent_state'] . ' ' . $employment_data[0]['permanent_zip'] }}
                                                        </p>

                                                        <p>Phone Number: {{$profileData->phone}}
                                                            <span style="margin-left: 100px;">If you are under 18 can you furnish a permit? 
                                                                {{ $employment_data[0]['furnish_work'] }}
                                                            </span>
                                                        </p>

                                                        <p>Employment Desired: {{ $employment_data[0]['employment_desired'] }}</p>
                                                       
                                                        <p>Position: {{ $employment_data[0]['position'] }}
                                                            <span  style="margin-left: 70px;">Date You Can Start: {{ \Carbon\Carbon::parse($employment_data[0]['date_start'])->format('M d, Y') }}
                                                            </span>
                                                            <span style="margin-left: 70px;">Salary: ${{ number_format($employment_data[0]['salary'], 2) }}</span>
                                                        </p>

                                                        <p>
                                                            Are you employed now? {{ $employment_data[0]['employed_now']}}
                                                            <span style="margin-left: 100px;">If so, may we inqure your present employer? 
                                                            {{$employment_data[0]['inqure_present_employer']}} </span>
                                                         </p>

                                                        <p>Ever Applied For This Company Before: 
                                                            {{ $employment_data[0]['applied_before'] }}
                                                            @if($employment_data[0]['applied_before'] == 'Yes')
                                                            <span style="margin-left: 50px;">Where: {{ $employment_data[0]['where'] }}
                                                            </span>
                                                            <span style="margin-left: 50px;">When: {{ \Carbon\Carbon::parse($employment_data[0]['when'])->format('M d, Y') }}
                                                            </span>
                                                            @endif
                                                        </p>

                                                        <p>Are You On Layoff And Subject To Recall: {{ $employment_data[0]['on_layoff_subject_to_recall'] }}</p>

                                                        <p>Will You Travel If Required: {{ $employment_data[0]['travel_if_required'] }}
                                                        </p>

                                                        <p>Will You Work Overtime If Required?: {{ $employment_data[0]['overtime_if_required'] }}</p>

                                                        <p>
                                                        Are you able to meet the attendance requirements of this position?: 
                                                        {{ $employment_data[0]['attendance_requirements_position'] }}
                                                        </p>

                                                        <p>Have You Ever Been Bonded?: {{ $employment_data[0]['bonded'] }}</p>

                                                        <p>Have you ever been convicted of a felony in the past 7years?: 
                                                            {{ $employment_data[0]['convicted'] }}
                                                        </p>

                                                        @if($employment_data[0]['convicted'] == 'Yes')
                                                        <p>Such conviction may be relevant if job related, but does not bar you from employment. If yes - explain: {{ $employment_data[0]['explain_convicted'] }}
                                                        </p>
                                                        @endif

                                                        <p>Driver's License Number: {{ $employment_data[0]['drivers_license'] }}
                                                        <span style="margin-left: 100px;">State: {{ $employment_data[0]['drivers_license_state'] }}</span>
                                                        </p>

                                                        <br>

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
                                                      <div>{{ $employment_data[0]['edu_current_name_location_school'] }}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$employment_data[0]['edu_last_name_location_school']}}</div>
                                                   </td>
                                                   <td data-label="# of YearsCompleted">
                                                      <div>{{ $employment_data[0]['edu_current_number_years']}} year(s)</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$employment_data[0]['edu_last_number_years']}}</div>
                                                   </td>
                                                   <td data-label="Did you graduate">
                                                      <div>{{ $employment_data[0]['edu_current_did_graduate']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$employment_data[0]['edu_last_did_graduate']}}</div>
                                                   </td>
                                                   <td data-label="Subjects studied">
                                                      <div>{{ $employment_data[0]['edu_current_subjects_studied'] }}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>Subjects Studied?: {{$employment_data[0]['edu_last_subjects_studied']}}</div>
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
                                                      <div>{{$employment_data[0]['trades_current_name_location_school']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$employment_data[0]['trades_last_current_name_location_school']}}</div>
                                                   </td>
                                                   <td data-label="# of Year Completed">
                                                      <div>{{$employment_data[0]['trades_current_number_years']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$employment_data[0]['trades_last_current_number_years']}}</div>
                                                   </td>
                                                   <td data-label="Did you graduate">
                                                      <div>{{$employment_data[0]['trades_current_did_graduate']}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{ $employment_data[0]['trades_last_current_did_graduate']}}</div>
                                                   </td>
                                                   <td data-label="Subjects studied">
                                                      <div>{{ $employment_data[0]['trades_current_subjects_studied'] }}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>{{$employment_data[0]['trades_last_subjects_studied']}}</div>
                                                   </td>
                                             </tr>
                                          </tbody>
                                       </table>

                                       <br>

                                       <p>Summarize special skills and qualifications required from employment or other experiences that may qualify you to work with this company: <u>{{$employment_data[0]['special_skills_qualifications']}}</u></p>

                                            <hr>
                                            <p><strong>Past Employment Information</strong></p>

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
                                                      <div>From: {{\Carbon\Carbon::parse($employment_data[0]['from_date_1'])->format('M d, Y')}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>To: {{\Carbon\Carbon::parse($employment_data[0]['to_date_1'])->format('M d, Y')}}</div>
                                                   </td>
                                                   <td data-label="Name & Address">{{$employment_data[0]['name_address_employer_1']}}</td>
                                                   <td data-label="Phone Number">{{$employment_data[0]['phone_number_1']}}</td>
                                                   <td data-label="Salary">${{number_format($employment_data[0]['salary_1'], 2)}}</td>
                                                   <td data-label="Job">{{$employment_data[0]['job_1']}}</td>
                                                   <td data-label="Reason for leaving">{{$employment_data[0]['reason_leaving_1']}}</td>
                                             </tr>
                                             @if(!empty($employment_data[0]['from_date_2']))
                                             <tr>
                                                   <td data-label="From / To">
                                                      <div>From: {{ \Carbon\Carbon::parse($employment_data[0]['from_date_2'])->format('M d, Y')}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>To: {{\Carbon\Carbon::parse($employment_data[0]['to_date_2'])->format('M d, Y')}}</div>
                                                   </td>
                                                   <td data-label="Name & Address">{{$employment_data[0]['name_address_employer_2']}}</td>
                                                   <td data-label="Phone Number">{{$employment_data[0]['phone_number_2']}}</td>
                                                   <td data-label="Salary">${{number_format($employment_data[0]['salary_2'], 2)}}</td>
                                                   <td data-label="Job">{{$employment_data[0]['job_2']}}</td>
                                                   <td data-label="Reason for leaving">{{ $employment_data[0]['reason_leaving_2'] }}</td>
                                             </tr>
                                             @endif
                                             

                                             @if(!empty($employment_data[0]['from_date_3']))
                                             <tr>
                                                   <td data-label="From / To">
                                                      <div>From: {{\Carbon\Carbon::parse($employment_data[0]['from_date_3'])->format('M d, Y')}}</div>
                                                      <div style="border-top: 1px solid black;"></div>
                                                      <div>To: {{\Carbon\Carbon::parse($employment_data[0]['to_date_3'])->format('M d, Y')}}</div>
                                                   </td>
                                                   <td data-label="name & Address">{{$employment_data[0]['name_address_employer_3']}}</td>
                                                   <td data-label="Phone Number">{{$employment_data[0]['phone_number_3']}}</td>
                                                   <td data-label="Salary">${{number_format($employment_data[0]['salary_3'], 2)}}</td>
                                                   <td data-label="Job">{{$employment_data[0]['job_3']}}</td>
                                                   <td data-label="Reason for Leaving">{{$employment_data[0]['reason_leaving_3']}}</td>
                                             </tr>
                                             @endif
                                             
                                          </tbody>
                                       </table>

                                       <br>
                                        

                                            <p><strong>References</strong></p>
                                            <p>Give the name of three persons not related to you to whom you have known at least 1year</p>
                                        
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
                                                   <td data-label="Name">{{$employment_data[0]['reference_name_1']}}</td>
                                                   <td data-label="Address">{{$employment_data[0]['reference_address_1']}}</td>
                                                   <td data-label="Phone">{{$employment_data[0]['reference_phone_1']}}</td>
                                                   <td data-label="Years Acquainted">{{$employment_data[0]['reference_years_acquainted_1']}}</td>   
                                             </tr>
                                             <tr>
                                                   <td data-label="Name">{{$employment_data[0]['reference_name_2']}}</td>
                                                   <td data-label="Address">{{$employment_data[0]['reference_address_2']}}</td>
                                                   <td data-label="Phone">{{$employment_data[0]['reference_phone_2']}}</td>
                                                   <td data-label="Years Acquainted">{{$employment_data[0]['reference_years_acquainted_2']}}</td>
                                             </tr>
                                             <tr>
                                                   <td data-label="Name">{{$employment_data[0]['reference_name_3']}}</td>
                                                   <td data-label="Address">{{$employment_data[0]['reference_address_3']}}</td>
                                                   <td data-label="Phone">{{$employment_data[0]['reference_phone_3']}}</td>
                                                   <td data-label="Years Acquainted">{{$employment_data[0]['reference_years_acquainted_3']}}</td>  
                                             </tr>
                                          </tbody>
                                       </table>


                                        <br>
                                            <p><strong>Any foreign language(s).</strong></p>

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
                                                   <td data-label="Language">{{ucfirst($employment_data[0]['language_1'])}}</td>
                                                   <td data-label="Read and Write">{{ucfirst($employment_data[0]['read_write_1'])}}</td>
                                                   <td data-label="Speak and Write">{{ucfirst($employment_data[0]['read_speak_1'])}}</td>
                                                   <td data-label="Speak Only">{{ucfirst($employment_data[0]['speak_only_1'])}}</td>
                                             </tr>
                                             @if(!empty($employment_data[0]['language_2']))
                                             <tr>
                                                   <td data-label="Language">{{ucfirst($employment_data[0]['language_2'])}}</td>
                                                   <td data-label="Read and Write">{{ucfirst($employment_data[0]['read_write_2'])}}</td>
                                                   <td data-label="Read and Speak">{{ucfirst($employment_data[0]['read_speak_2'])}}</td>
                                                   <td data-label="Speak Only">{{ucfirst($employment_data[0]['speak_only_2'])}}</td>
                                             </tr>
                                             @endif
                                          </tbody>
                                       </table>

                                       <br>
                                            

                                            <p>In case of emergency notify: {{$employment_data[0]['emergency_address'] . ' ' . $employment_data[0]['emergency_city'] . ' ' . $employment_data[0]['emergency_state'] . ' ' . $employment_data[0]['emergency_zip']}}</p>

                                            <div class="row">
                                                <h5>INITIAL	Conditions of Employment - please read carefully</h5>
                                                <p>Reporting to work with impaired abilities; or the possession, consumption or distribution of drugs or alcohol on company premises and/or worksites, shall be grounds for disciplinary action, including discharge. A condition of employment includes willingness on the part of applicant or employee to agree to the terms put forth by 1st Access Home Care Incorporated. We are committed to operating a drug free workplace. Violations of our drug and alcohol policy will result in dismissal.</p>

                                                <p>It is understood and agreed upon that any misrepresentation by me in this application will be sufficient cause for cancellation of this application and/or separation from the employer’s service if I have been employed. Furthermore, I understand that just as I am free to resign anytime, the Employer reserves the right to terminate my contract at any time, with or without cause and without prior notice. I understand that no representative of the employer has the authority to make any assurances to the contrary.</p>

                                                <p>I give the employer the right to investigate all police, driving and personal records and references if job related. I hereby release from liability the Employer and it’s representatives for seeking such information and all other persons, corporations or organizations for furnishing such information.</p>

                                                <p>The Employer is an Equal Opportunity Employer. The Employer does not discriminate in employment and no question on this application is used for the purpose of limiting or excusing any applicant’s consideration for employment on a basis prohibited by local, state or Federal law</p>

                                                <p>Any controversy of any kind arising between the parties under this agreement or otherwise (or any agent, officer, director or affiliate of any party), including but not limited to common law, statutory, tort or contract claims, will be submitted to mediation and failing settlement in mediation, to binding arbitration. Unless otherwise agreed mediation and arbitration designated by staff professionals will govern any mediation and arbitration. The parties will select the mediator or arbitrator from the designated company panel of mediators and will notify the designated company, in writing, to initiate the selection process. The arbitration will be subject to and governed by the provisions of the Federal Arbitration Act. 9 U.S.C Section1-et seq. The parties hereto stipulate that this agreement involves matters affecting interstate commerce.</p>

                                                <p>This application is current for 90 days. At the conclusion of this time if I have not heard from the Employer and still wish to be considered for employment, it will be necessary to fill out a new application.</p>
                                            </div>


                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div>
                                            <p>Signature of Applicant:</p>
                                                <img width="250" class="img-fluid" src="{{asset('storage/signature/' . $employment_data[0]['signature'])}}">
                                               <span style="margin-left: 100px;">Date: {{ \Carbon\Carbon::parse($employment_data[0]['date_signed'])->format('M d, Y')}}</span>
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
