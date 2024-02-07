
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
                            @error('supervisor_signature')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                            {{$message}}  
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            @error('hr_signature')
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
                                            <li class="breadcrumb-item active">Employee Notification of Policy: Smoking in The Workplace</li>
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
                                            <strong>Employee Notification of Policy: Smoking in The Workplace</strong>
                                        </p><br>
                                    <p>Name of Employee: {{ ucfirst($profileData->full_name) }} <span style="margin-left: 100px;">Hire Date: {{\Carbon\Carbon::parse($smoking_in_the_workplace_data[0]['hire_date'])->format('M d, Y')}} </span></p>
                                    
                                    <p>Title: <span>Department: </span></p>
                                    
                                    <p>It is the policy of the Agency that smoking will not be allowed in areas where that can be observed by clients or the public. The employee may smoke in approved areas, if any.</p>
                                    <p>To support the policy of not allowing smoking in other than designated smoking areas, the Agency has posted “No Smoking” and “Smoking” signs in the appropriate areas, if any
                                    Each sign posted in an area where smoking is prohibited carries the internationally recognized symbol for no smoking - a red circle containing a lit cigarette with a line drawn diagonally through the circle. Please observe these signs at all times.
                                    </p>
                                    <p>The Agency identifies and implements a process for monitoring compliance with the policy.
                                    The employee will receive a copy of this policy in the employee’s orientation package. 
                                    In addition, copies of the policy are posted in various locations throughout the agency.
                                    </p> <br>
                                    @if(!empty($smoking_in_the_workplace_data[0]['applicant_id']))
                                            <div class="row d-flex align-items-center justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <p>Signature</p> <br>
                                                        <img width="250"  src="{{ asset('storage/signature/' . $smoking_in_the_workplace_data[0]['signature']) }}">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <p>Date Signed</p>
                                                        <p>{{ \Carbon\Carbon::parse($smoking_in_the_workplace_data[0]['created_at'])->format('M d, Y')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <!-- Employer Signature -->
                                       <div class="row d-flex align-items-center justify-content-center">
                                        @if(!empty($smoking_in_the_workplace_data[0]['supervisor_signature']))
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Supervisor Signature</label> <br>
                                                    <img width="250"  src="{{ asset('storage/signature/' . $smoking_in_the_workplace_data[0]['supervisor_signature']) }}">
                                                </div>
                                            </div>
                                        @else 
                                        <form onsubmit="submitSupervisorForm();" action="{{ route('save.smokingSupervisorSig', ['applicant_id' => $applicant_id, 'id' => $id])}}" method="post" enctype="multipart/form-data">
                                                @csrf 
                                                @method('POST')
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Supervisor Signature</label> <br>
                                                        <div class="flex-row">
                                                        <div class="wrapper">
                                                            <canvas id="supervisor-signature-pad"></canvas>
                                                            <textarea require style="display:none" name="supervisor_signature" id="supervisor-signature-input"></textarea>
                                                        </div>
                                                        <div class="clear-btn">
                                                            <button id="supervisor-clear"><span>Clear</span></button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                    </div><br><br>
                                                </div>
                                            </form>
                                        @endif

                                        @if(!empty($smoking_in_the_workplace_data[0]['hr_signature']))
                                        <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Supervisor Signature</label> <br>
                                                    <img width="250"  src="{{ asset('storage/signature/' . $smoking_in_the_workplace_data[0]['hr_signature']) }}">
                                                </div>
                                            </div>
                                        @else 
                                        <form onsubmit="submitHRForm();" action="{{ route('save.smokingHRSig', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" enctype="multipart/form-data">
                                            @csrf 
                                            @method('POST')
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label class="form-label">HR Signature</label> <br>
                                                <div class="flex-row">
                                                   <div class="wrapper">
                                                      <canvas id="hr-signature-pad"></canvas>
                                                      <textarea require style="display:none" name="hr_signature" id="hr-signature-input"></textarea>
                                                   </div>
                                                   <div class="clear-btn">
                                                      <button id="hr-clear"><span>Clear</span></button>
                                                   </div>
                                                </div>
                                             </div>
                                             <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div><br><br>
                                          </div>
                                        </form>
                                        @endif 
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
   var canvas = document.getElementById("supervisor-signature-pad");
   var signaturePad = new SignaturePad(canvas);
   
   document.getElementById("supervisor-clear").addEventListener('click', function(event) {
      event.preventDefault();
      signaturePad.clear();
   });
   
   
   function submitSupervisorForm() {
     if(!signaturePad.isEmpty()){
       //Unterschrift in verstecktes Feld übernehmen
       document.getElementById('supervisor-signature-input').value = signaturePad.toDataURL();
     }
   }
   
</script>
<script type="text/javascript">
   var canvas1 = document.getElementById("hr-signature-pad");
   var signaturePad1 = new SignaturePad(canvas1);
   
   document.getElementById("hr-clear").addEventListener('click', function(event) {
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
   canvas#supervisor-signature-pad {
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }
   button#supervisor-clear {
   height: 100%;
   background: #4b00ff;
   border: 1px solid transparent;
   color: #fff;
   font-weight: 600;
   cursor: pointer;
   }
   button#supervisor-clear span {
   transform: rotate(90deg);
   display: block;
   }

   canvas#hr-signature-pad {
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }
   button#hr-clear {
   height: 100%;
   background: #4b00ff;
   border: 1px solid transparent;
   color: #fff;
   font-weight: 600;
   cursor: pointer;
   }
   button#hr-clear span {
   transform: rotate(90deg);
   display: block;
   }
</style>
 

        <!-- JAVASCRIPT -->
        @include('templates/admin/foot')

    </body>
</html>
