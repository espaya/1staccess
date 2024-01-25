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
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <button onclick="printContent();" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-printer">
                           </em><span>Print / Export To PDF</span>
                           </button>
                           <h4 class="mb-sm-0 font-size-18"></h4>
                           <br>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                 <li class="breadcrumb-item active">Attendance, Tardiness, Absenteeism & Leave</li>
                              </ol>
                           </div>
                        </div>
                        @if(session('success'))
                        <p class="alert alert-success"> {{ session('success') }} </p>
                        @enderror
                        @if(session('error'))
                        <p class="alert alert-danger"> {{ session('error') }} </p>
                        @enderror
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
                        <div class="card">
                           <div class="card-body">
                              <div>
                                 <h4 class="mb-sm-0 font-size-18">Employee Notification of Policy: Employee Attendance, Tardiness, Absenteeism & Leave</h4><br>
                                 <p>Name: <u> {{ucfirst($profileData->full_name)}} </u> </p>
                                 <p>Hire Date: {{\Carbon\Carbon::parse($attendance_tardiness_data[0]['hire_date'])->format('M d, Y')}} </p>
                                 <p>Title: {{ucfirst($attendance_tardiness_data[0]['position'])}} </p>
                                
                                 <p>Exempt employees are owners, officers, management and supervisors. All full time employees are required to put in a full day's work and a full 40 hour work week. All employees regardless of classification, are required to arrive on time and appropriately complete their designated hours and tasks as assigned.</p>
                                 <br>
                                 <h5>ATTENDANCE:</h5>
                                 <ul>
                                    <li>1.	The employee must notify the Supervisor in all events of tardiness. If the office is closed, call the answering service to have on-call Supervisor paged and relay information to him or her. Only 3 tardiness in a calendar month will be accepted unless very extenuating circumstances are present and approved by the Supervisor. More than 3 tardiness within a given month may result in counselling with Supervisor and every effort made to avoid further tardiness. A copy of counselling will be placed in the personnel file. Two consecutive months of written warnings for excessive tardiness may result in dismissal or termination</li>
                                    <li>2.	No show/no call situations are not tolerated and may result in termination.</li>
                                    <li>3.	Perfect attendance throughout the year may be rewarded at year - end at the discretion of supervisor and/or administrator.</li>
                                 </ul>
                                 <br>
                                 <h5>ABSENTEEISM:</h5>
                                 <ul>
                                    <li>1.	Employees are required to inform the Supervisor as soon as possible when absenteeism is known, to allow the Agency time to cover assignments. The employee is not excused from work until the Supervisor approves the absence or verified he/she is aware.</li>
                                    <li>2.	Illness and or injury that requires a physician’s treatment and that may take more than a day for recovery will need to be called in and discussed with the Supervisor. When the office is closed, request the answering service to contact the person on call with the information and give your phone number for follow-up.</li>
                                    <li>3.	If an employee needs to be absent for reasons other than illness, he/she must submit a Leave Request Form at least 14 days prior to time requested.</li>
                                    <li>4.	More than 3 consecutive days of absenteeism requires a physician’s note  for illness or injury sustained. Medically verified illness may be excused. Failure to provide proper notice will result in counselling and a written warning will be placed in the personnel file.</li>
                                    <li>5.	Excessive absenteeism without just cause or physician’s excuse is reason for dismissal.</li>
                                    <li>6.	<strong>No shows / no calls are not tolerated.</strong> The need to follow policy and procedure is a courtesy to other employees. Disciplinary action may be supervised in an effort to avoid any further complications.</li>
                                    <li>7.	Notice to your Supervisor in writing for consideration on a requested leave of absence must be submitted at least 14 days to leave, unless there is a cause of emergency or illness.</li>
                                 </ul>
                                 <br>
                                 <p>____ <strong>I</strong> acknowledge that I have been oriented to the Agency’s policy regarding <strong>ATTENDANCE</strong> and <strong>ABSENTEEISM,</strong> and I agree to follow all guidelines, both written and verbal. I understand that, if the guidelines, policies and procedures are not followed, that I may be immediately terminated. I also had the opportunity to ask questions regarding this policy and I know where it's located for future reference</p>
                              </div>
                              @if(!empty($attendance_tardiness_data[0]['applicant_id']))
                              <div class="row d-flex align-items-center justify-content-center">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">Signature</label> <br>
                                       <img width="250"  src="{{asset('storage/signature/' . $attendance_tardiness_data[0]['signature'])}}">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">Date Signed</label>
                                       <p>{{ \Carbon\Carbon::parse($attendance_tardiness_data[0]['created_at'])->format('M d, Y')}}</p>
                                    </div>
                                 </div>
                              </div>
                              @endif

                              <!-- Supervisor Signature -->
                              @if(!empty($attendance_tardiness_data[0]['supervisor_signature']))
                              <div class="row d-flex align-items-center justify-content-center">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">Signature</label> <br>
                                       <img width="250"  src="{{asset('storage/signature/' . $attendance_tardiness_data[0]['supervisor_signature'])}}">
                                    </div>
                                 </div>
                              </div>
                              @else
                              <form action="{{ route('post-employee-attendance-tardiness-absenteeism-leave-supervisor-signature', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" enctype="multipart/form-data" onsubmit="submitForm();">
                                 @csrf
                                 <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-md-12">
                                       <div class="mb-3">
                                          <label class="form-label">Supervisor Signature</label> <br>
                                          <div class="flex-row">
                                             <div class="wrapper">
                                                <canvas id="signature-pad"></canvas>
                                                <textarea require style="display:none" name="supervisor_signature" id="signature-input"></textarea>
                                             </div>
                                             <div class="clear-btn">
                                                <button id="clear"><span>Clear</span></button>
                                             </div>
                                          </div>
                                       </div>
                                       <div>
                                          <button name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                    </div>
                                    @error('supervisor_signature')
                                    <p class="alert alert-danger"> {{ $message }} </p>
                                    @enderror
                                 </div>
                              </form>
                              @endif
                              <br><br>
                              <!-- HR Signature -->
                              @if(!empty($attendance_tardiness_data[0]['hr_signature']))
                              <div class="row d-flex align-items-center justify-content-center">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">HR Signature</label> <br>
                                       <img width="250"  src="{{asset('storage/signature/' . $attendance_tardiness_data[0]['hr_signature'])}}">
                                    </div>
                                 </div>
                              </div>
                              @else
                              <form action="{{ route('post-employee-attendance-tardiness-absenteeism-leave-hr-signature', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" onsubmit="submitHRForm();" enctype="multipart/form-data">
                                 @csrf
                                 @method('POST')
                                 <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-md-12">
                                       <div class="mb-3">
                                          <label class="form-label">HR Signature</label> <br>
                                          <div class="flex-row">
                                             <div class="wrapper">
                                                <canvas id="hr-signature-pad"></canvas>
                                                <textarea require style="display:none" name="hr_signature" id="hr-signature-input"></textarea>
                                             </div>
                                             <div class="clear-btn">
                                                <button id="clear_1"><span>Clear</span></button>
                                             </div>
                                          </div>
                                       </div>
                                       <div>
                                          <button name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                    </div>
                                 </div>
                                 @error('hr_signature')
                                    <p class="alert alert-danger"> {{ $message }} </p>
                                 @enderror
                              </form>
                              @endif
                           </div>
                     </div>
                     <!-- end card body -->
                  </div>
                  <!-- end card -->
               </div>
            </div>
         </div>
         <!-- container-fluid -->
      </div>
      <!-- End Page-content -->
      @include('templates/dashboard/footer')
      </div>
      <!-- end main content-->
      </div>
      <!-- END layout-wrapper -->
      
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

      <script type="text/javascript">
         var canvas = document.getElementById("hr-signature-pad");
         var signaturePad1 = new SignaturePad(canvas);
         
         document.getElementById("clear_1").addEventListener('click', function(event) {
            event.preventDefault();
            signaturePad1.clear();
         });
         
         
         function submitHRForm() {
           if(!signaturePad1.isEmpty()){
             //Unterschrift in verstecktes Feld übernehmen
             document.getElementById('hr-signature-input').value = signaturePad1.toDataURL();
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

         canvas#hr-signature-pad {
         background: #fff;
         width: 100%;
         height: 100%;
         cursor: crosshair;
         }
         button#clear_1 {
         height: 100%;
         background: #4b00ff;
         border: 1px solid transparent;
         color: #fff;
         font-weight: 600;
         cursor: pointer;
         }
         button#clear_1 span {
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