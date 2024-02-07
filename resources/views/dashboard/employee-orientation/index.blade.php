
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Employee Orientation - 1staccess Home Care</title>
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
                            @error('dateOfOrientation')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                            {{$message}}  
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
                                    <h4 class="mb-sm-0 font-size-18">Employee Orientation</h4><br>

                                    <div class="row g-4">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Name:</label>
                                             <div class="form-control-wrap">
                                                <p>{{ucfirst($nameData[0]['full_name'])}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Position:</label>
                                             <div class="form-control-wrap">
                                                <p>{{ucfirst($empAppData[0]['position'])}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Date of Hire:</label>
                                             <div class="form-control-wrap">
                                             <p>{{ \Carbon\Carbon::parse($empAppData[0]['employee_hire_date'])->format('F d, Y') }}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Date of Orientation:</label>
                                             <div class="form-control-wrap">
                                                @if(!empty($employeeOrientationData[0]['dateOfOrientation']))
                                                <p>{{ \Carbon\Carbon::parse($employeeOrientationData[0]['dateOfOrientation'])->format('F d, Y')}}</p>
                                                @else 
                                                <input disabled value="" type="text" class="form-control">
                                                @endif
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                                    <h5 class="nk-block-title">GENERAL ORIENTATION WITH HUMAN RESOURCES</h5>
                                        <ul style="list-style: none;">
                                          <li>➢	HIPAA Privacy Regulations - Review agency’s HIPAA Policy</li>

                                          <li>➢	Discuss policies and procedures in the agency’s Policies and Procedures Manual with focus on new and added updated policies and review policy and procedure examination.</li>

                                          <li>➢	Review employee benefits as applicable to various employee statuses </li>

                                          <li>➢	Review complaint and grievances procedures</li>

                                          <li>➢	Review sexual harassment policy.</li>
                                        </ul> <br>
                                        <h5 class="nk-block-title">GENERAL ORIENTATION WITH MANAGEMENT:</h5>
                                        <ul style="list-style: none;">
                                            <li>➢	Instructive memos from Supervisor to home care staff.</li>

                                            <li>➢	Sample Visit Notes</li>

                                            <li>➢	Quality Management Process</li>

                                            <li>➢	OSHA Infection Control</li>

                                            <li>➢	Skills Checklist</li>

                                            <li>➢	Detecting Patient Abuse: Child Abuse and Abuse of the Elderly</li>
                                        </ul> <br>
                                    
                                    <br>
                                    @if(!empty($employeeOrientationData[0]['applicant_id']))
                                            <div class="row d-flex align-items-center justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Signature</label> <br>
                                                        <img width="250"  src="{{asset('storage/signature/' . $employeeOrientationData[0]['signature'])}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Date Signed</label>
                                                        <p>{{ \Carbon\Carbon::parse($employeeOrientationData[0]['created_at'])->format('F d, Y')}}</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        @else
                                        <form  onsubmit="submitForm();" action="{{route('employee-orientation.store')}}" method="post" enctype="multipart/form-data">
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

                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Date of Orientation</label>
                                                        <div class="form-control-wrap">
                                                <input name="dateOfOrientation" value="{{old('dateOfOrientation')}}" type="date" class="form-control @error('dateOfOrientation') is-invalid @enderror">
                                             </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
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
