
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Criminal History Search - 1staccess Home Care</title>
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
                                            <li class="breadcrumb-item active">Criminal History Search</li>
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
                                        <strong>Criminal History Search</strong>
                                    </p><br>
                                        <br>

                                    <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                    <p>Name: <span style="text-decoration: underline;">{{$nameQueryData[0]['full_name']}}</span></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                    @if(!empty($criminalHistoryData[0]['created_at']))
                                                   <p>Date: {{ \Carbon\Carbon::parse($criminalHistoryData[0]['created_at'])->format('M d, Y')}}</p>
                                                @else
                                                   <p>Date: <?php echo date('M d, Y'); ?></p>
                                                @endif
                                                    </div>
                                                </div>
                                            </div>

                                        <div>
                                        <br>
                                    </ul> 
                                    <p>I, <span style="text-decoration: underline !important;">({{$nameQueryData[0]['full_name']}})</span> have had no prior convictions of an offense described in the  <strong>Health and Safety Code</strong> which would bar or potentially bar employment as listed below:</p>
                                    <ul>
                                        <li>CRIMINAL HOMICIDE</li>
                                        <li>INDECENCY WITH A CHILD</li>
                                        <li>SOLICITATION OF A CHILD</li>
                                        <li>ARSON</li>
                                        <li>AGGRAVATED ROBBERY</li>
                                        <li>BURGLARY AND CRIMINAL TRESPASS</li>
                                        <li>WEAPONS</li>
                                        <li>PUBLIC LEWDNESS</li>
                                        <li>PUBLIC INDECENCY</li>
                                        <li>KIDNAPPING AND FALSE IMPRISONMENT</li>
                                        <li>AGREEMENT TO ABDUCT FROM CUSTODY</li>
                                        <li>SALE OR PURCHASE OF A CHILD</li>
                                        <li>ROBBERY</li>
                                        <li>ASSAULTIVE OFFENSES</li>
                                        <li>THEFT</li>
                                        <li>FRAUD</li>
                                        <li>INDECENT EXPOSURE</li>
                                        <li>A FELONY VIOLATION OF A STATUTE</li>
                                        <li>INTENDED TO CONTROL THE POSSESSION OR DISTRIBUTION OF AN ILLEGAL SUBSTANCE</li>
                                    </ul>
                                        <br>
                                        @if(!empty($criminalHistoryData[0]['applicant_id']))
                                            <div class="row d-flex align-items-center justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Signature</label> <br>
                                                        <img width="250"  src="{{asset('storage/signature/' . $criminalHistoryData[0]['signature'])}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Date Signed</label>
                                                        <p>{{ \Carbon\Carbon::parse($criminalHistoryData[0]['created_at'])->format('M d, Y')}}</p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        @else
                                        <form  onsubmit="submitForm();" action="{{route('criminal-history-search')}}" method="post" enctype="multipart/form-data">
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
