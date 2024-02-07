
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
                                            <li class="breadcrumb-item active">Health & Safety Agreement</li>
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
                                            <strong>Health & Safety Agreement</strong>
                                        </p>

                                <div class="row g-4">
                                 <p>I do understand the physical requirements of my job and understand proper lifting and moving techniques which I am expected to use in moving and lifting objects and/or patients.</p>
                                 <p>I have been informed and do fully understand that any injury claimed by me while on the job must be reported immediately to my Supervisor and documented on an Accident/Incident Report Form. I understand that unless an incident report is completed immediately and signed by me,the Agency may not consider a voluntary payment of any medical bills or any other benefits as a result of my injury. I further understand that if the accident/injury is proven to be a result of my failing to follow policy/procedure, the Agency may not be expected to cover medical payments.</p>
                                 <p>I do fully understand that I am not encouraged to lift or transfer any object or patient by myself unless I know that I can safely lift or transfer alone. If I believe there is no one readily available to assist me in lifting or moving patients or equipment while on duty, I am to wait until I can obtain assistance before moving or lifting.</p>
                                 <p>
                                    <em>I have had the opportunity to review and have all questions answered regarding Health and Safety</em>
                                 </p>
                              </div>
                            
                                    <div class="row g-4">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                             <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $health_safety_agreement_data[0]['signature']) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p>
                                             <span class="form-label">Date: </span>{{ \Carbon\Carbon::parse($health_safety_agreement_data[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                    </div>   
                                 @if(!empty($health_safety_agreement_data[0]['agency_rep_signature']))
                                 <div class="row g-4">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Agency Representative Signature</label>
                                             <div class="form-control-wrap">
                                             <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $health_safety_agreement_data[0]['agency_rep_signature']) }}">
                                            </div>
                                          </div>
                                       </div>
                                    </div> 
                                    <!-- Employer Signature -->
                                 @else
                                    <form onsubmit="submitForm();" method="post" enctype="multipart/form-data" action="{{ route('health-safety-agreement-agency-rep', ['applicant_id' => $applicant_id, 'id' => $id]) }}">
                                       @csrf
                                       <div class="row d-flex align-items-center justify-content-center">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label class="form-label">Agency Representative</label> <br>
                                                <div class="flex-row">
                                                   <div class="wrapper">
                                                      <canvas id="signature-pad"></canvas>
                                                      <textarea require style="display:none" name="agency_rep_signature" id="signature-input"></textarea>
                                                   </div>
                                                   <div class="clear-btn">
                                                      <button id="clear"><span>Clear</span></button>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          @error('agency_rep_signature')
                                          <p class="alert alert-danger"> {{ $message }} </p>
                                          @enderror
                                          <div>
                                             <button name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
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
