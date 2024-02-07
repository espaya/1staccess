<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Attendance, Tardiness, Absenteeism & Leave - 1staccess Home Care</title>
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

                              <img width="30%" src="{{ asset('images/1staccess.png') }}" style="margin-left:220px;">
                                    <p class="mb-sm-0 font-size-18" style="font-size: 14; text-align: center;">
                                    <strong>1st Access Home Care Incorporated</strong>
                                    </p>
                                    <p style="text-align: center; font-size: 11;">
                                        6600 Fieldtan Trail, Moseley, VA, 23120<br>Agency Phone: 804.818.3216
                                    </p>
                                    <p class="mb-sm-0 font-size-18" style="font-size: 11; text-align: center;">
                                        <strong>Employee Notification of Policy: Attendance, Tardiness, Absenteeism and Leave</strong>
                                    </p>

                                 <p>Employee Name: <u>{{ ucfirst($profileData[0]['full_name']) }}</u> </p>
                                 
                                 <br>
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
                              @if(!empty($attendanceData[0]['applicant_id']))
                              <div class="row d-flex align-items-center justify-content-center">
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">Signature</label> <br>
                                       <img width="250"  src="{{asset('storage/signature/' . $attendanceData[0]['signature'])}}">
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">Date Signed</label>
                                       <p>{{ \Carbon\Carbon::parse($attendanceData[0]['created_at'])->format('M d, Y')}}</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @else
                           <form action="{{route('attendance-tardiness')}}" method="post" onsubmit="submitForm();">
                              @csrf
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="mb-3">
                                       <label for="formrow-password-input" class="form-label">Signature</label>
                                       <div class="flex-row">
                                          <div class="wrapper">
                                             <canvas id="signature-pad"></canvas>
                                             <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                                          </div>
                                          <div class="clear-btn">
                                             <button id="clear"><span>Clear</span></button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label for="formrow-email-input" class="form-label">Date</label>
                                       <input disabled value="<?php echo date('M d, Y'); ?>" type="text" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div>
                                 <button type="submit" class="btn btn-primary w-md btn-lg">Submit</button>
                              </div>
                        </div>
                        </form>
                        @endif
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
      <!-- Right Sidebar -->
      <div class="right-bar">
         <div data-simplebar="" class="h-100">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">
               <h5 class="m-0 me-2">Settings</h5>
               <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
               <i class="mdi mdi-close noti-icon"></i>
               </a>
            </div>
            <!-- Settings -->
            <hr class="mt-0">
            <h6 class="text-center mb-0">Choose Layouts</h6>
            <div class="p-4">
               <div class="mb-2">
                  <img src="assets/images/layouts/layout-1.jpg" class="img-thumbnail" alt="layout images">
               </div>
               <div class="form-check form-switch mb-3">
                  <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked="">
                  <label class="form-check-label" for="light-mode-switch">Light Mode</label>
               </div>
               <div class="mb-2">
                  <img src="assets/images/layouts/layout-2.jpg" class="img-thumbnail" alt="layout images">
               </div>
               <div class="form-check form-switch mb-3">
                  <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch">
                  <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
               </div>
               <div class="mb-2">
                  <img src="assets/images/layouts/layout-3.jpg" class="img-thumbnail" alt="layout images">
               </div>
               <div class="form-check form-switch mb-3">
                  <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch">
                  <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
               </div>
               <div class="mb-2">
                  <img src="assets/images/layouts/layout-4.jpg" class="img-thumbnail" alt="layout images">
               </div>
               <div class="form-check form-switch mb-5">
                  <input class="form-check-input theme-choice" type="checkbox" id="dark-rtl-mode-switch">
                  <label class="form-check-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
               </div>
            </div>
         </div>
         <!-- end slimscroll-menu-->
      </div>
      <!-- /Right-bar -->
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