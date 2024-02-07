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
                        @error('dateOfOrientation')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                           {{$message}}  
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif 
                        
                        @error('hr_supervisor_signature')
                        <p class="alert alert-danger"> {{ $message }} </p>
                        @enderror
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                           <button onclick="printContent();" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-printer">
                           </em><span>Print / Export To PDF</span>
                           </button>
                           <h4 class="mb-sm-0 font-size-18"></h4>
                           <br>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                 <li class="breadcrumb-item active">Employee Orientation</li>
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
                           <img width="30%" src="{{ asset('images/1staccess.png') }}" style="margin-left:220px;">
                                        <p class="mb-sm-0 font-size-18" style="font-size: 14; text-align: center;">
                                            <strong>1st Access Home Care Incorporated</strong>
                                        </p>
                                        <p style="text-align: center; font-size: 11;">
                                            6600 Fieldtan Trail, Moseley, VA, 23120<br>Agency Phone: 804.818.3216
                                        </p>
                                        <p class="mb-sm-0 font-size-18" style="font-size: 11; text-align: center;">
                                            <strong>Employee Orientation</strong>
                                        </p>
                              <div class="row g-4">
                                 <div class="col-md-12">
                                    <p>Employee Name: {{ucfirst($profileData->full_name)}} <span style="margin-left: 100px;">Position: {{ucfirst($employee_orientation_data[0]['position'])}}</span> </p>

                                    <p>
                                       Date of Hire: {{\Carbon\Carbon::parse($employee_orientation_data[0]['date_of_hire'])->format('M d, Y')}}
                                       <span style="margin-left: 100px;">Date of Orientation: {{ \Carbon\Carbon::parse($employee_orientation_data[0]['dateOfOrientation'])->format('F d, Y')}}
                                       </span>
                                    </p>

                                    <p><strong>GENERAL ORIENTATION WITH HUMAN RESOURCES</strong></p>
                                    <ul style="list-style: none;">
                                       <li>➢	HIPAA Privacy Regulations - Review agency’s HIPAA Policy</li>
                                       <li>➢	Discuss policies and procedures in the agency’s Policies and Procedures Manual with focus on new and added updated policies and review policy and procedure examination.</li>
                                       <li>➢	Review employee benefits as applicable to various employee statuses </li>
                                       <li>➢	Review complaint and grievances procedures</li>
                                       <li>➢	Review sexual harassment policy.</li>
                                    </ul>
                                    
                                 </div>
                              </div>
                              
                              <p><strong>GENERAL ORIENTATION WITH MANAGEMENT:</strong></p>
                              <ul style="list-style: none;">
                                 <li>➢	Instructive memos from Supervisor to home care staff.</li>
                                 <li>➢	Sample Visit Notes</li>
                                 <li>➢	Quality Management Process</li>
                                 <li>➢	OSHA Infection Control</li>
                                 <li>➢	Skills Checklist</li>
                                 <li>➢	Detecting Patient Abuse: Child Abuse and Abuse of the Elderly</li>
                              </ul>
                              @if(!empty($employee_orientation_data[0]['applicant_id']))
                                 <p>Signature</p>
                                 <img width="250"  src="{{asset('storage/signature/' . $employee_orientation_data[0]['signature'])}}">
                                 <p>Date Signed</p>
                                 <p>{{ \Carbon\Carbon::parse($employee_orientation_data[0]['created_at'])->format('F d, Y')}}</p>
                              @endif
                              @if(!empty($employee_orientation_data[0]['hr_signature']))
                                 <p>HR Supervisor Signature</p>
                                 <img width="250"  src="{{asset('storage/signature/' . $employee_orientation_data[0]['hr_signature'])}}">
                              @else
                              <form action="{{ route('submit-hr-supervisor-signature', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" enctype="multipart/form-data" onsubmit="submitHRForm();">
                                 @csrf
                                 <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-md-12">
                                       <div class="mb-3">
                                          <label class="form-label">HR Supervisor Signature</label> <br>
                                          <div class="flex-row">
                                             <div class="wrapper">
                                                <canvas id="hr-signature-pad"></canvas>
                                                <textarea require style="display:none" name="hr_supervisor_signature" id="hr-signature-input"></textarea>
                                             </div>
                                             <div class="clear-btn">
                                                <button id="clear_1"><span>Clear</span></button>
                                             </div>
                                          </div>
                                       </div>
                                       @error('hr_supervisor_signature')
                                       <p class="alert alert-danger"> {{ $message }} </p>
                                       @enderror
                                    </div>
                                    <div>
                                       <button value="hr_signature" name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                 </div>
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
      </style>
      <style>
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
      @include('templates/admin/foot')
   </body>
</html>