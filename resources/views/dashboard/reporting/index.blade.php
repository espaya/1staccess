
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Reporting: Abuse/neglect/Exploitation - 1staccess Home Care</title>
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
                                            <li class="breadcrumb-item active">Reporting: Abuse/neglect/Exploitation</li>
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
                                    @if(!empty($fNameData[0]['applicant_id']))
                                    <p><strong>Employee Name:</strong> <u>{{ $fNameData[0]['full_name']}}</u></p>
                                    @endif
                                    <h4 class="mb-sm-0 font-size-18">Reporting: Abuse/neglect/Exploitation</h4><br>
                                    <div>
                                 <p><strong>All agency staff are required to report suspected abuse / neglect / exploitation and develop a plan to minimize the risk of such. The care health employee is responsible to report and document:</strong></p>
                                 <p>
                                    ●	A child’s susceptibility to abuse includes self-abuse and neglect.<br>
                                    ●	Elderly individuals as children are susceptible to abuse as well.<br>
                                    ●	Physical components, such as impairments and the ability of patient/caregiver to provide adequate care.<br>
                                    ●	Mental impairments, such as mental retardation, Alzheimer’s disease, disorientation, confusion etc.<br>
                                    ●	Emotional status, such as passive personality, depression etc.<br>
                                    ●	Physical environment, such as safety in or outside the home.<br>
                                    The employee is responsible to report all incidents to the Administrator and/or Supervisor. A written report may be forwarded for Social Services with the request for referral. The Supervisor will review the situation and investigate to determine if this is a reportable incident. If, so it will be reported to the appropriate agency or Adult/Child Protection Agency by the Supervisor/Administrator or an appropriate designee.
                                 </p>
                                 <p><strong>*I have read and understand the information above. As a home health employee, it is my responsibility to report and document any suspected abuse, neglect or exploitation.</strong></p>
                              </div>
                                    
                              @if(!empty($reportingData[0]['applicant_id']))
                              <div class="row g-4">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                             <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $reportingData[0]['signature']) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p>
                                             <span class="form-label">Date: </span>{{ \Carbon\Carbon::parse($reportingData[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                    </div>   
                            @else
                            <form onsubmit="submitForm();" action="{{ route('reporting.store') }}" method="post" enctype="multipart/form-data" class="row g-4">
                                    @csrf
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
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
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                                <input disabled value="<?php echo date('M d, Y'); ?>" type="text" class="form-control">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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
