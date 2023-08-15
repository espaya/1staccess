
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Universal Precautions Training Document - 1staccess Home Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="1staccess job application portal" name="description">
        <meta content="1staccess Home Care" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>

        @vite(['resources/css/bootstrap.min.css', 'resources/css/icons.min.css', 'resources/css/app.min.css'])

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
                                            <li class="breadcrumb-item active">Universal Precautions Training Document</li>
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
                                    <h4 class="mb-sm-0 font-size-18">Universal Precautions Training Document</h4><br>

                            @if(!empty($nameData[0]['applicant_id']))
                              <div class="col-md-6">
                                 <p>Name: {{$nameData[0]['full_name']}}</p>
                              </div>
                              @endif
                              @if(!empty($precautionsData[0]['applicant_id']))
                              <div class="col-md-6">
                                 <p>Date: {{Carbon\Carbon::parse($precautionsData[0]['created_at'])->format('M d, Y')}}</p>
                              </div>
                              @endif

                              <div>
                              <h5 class="nk-block-title">➢	LESSON 1 - BLOOD BORNE INFECTION</h5>
                              <p>Definition of Exposure. <br>
                                 Spread of HIV infection in the general population.<br>
                                 Symptoms and effects of HIV infection. <br>
                                 Spread of Hepatitis B, including number of infections, hospitalization, and deaths caused by HBV each year. <br>
                                 Symptoms of effects of HBV infection and HBV vaccination. <br>
                                 The hepatitis B virus HIV virus can be transmitted in the workplace.<br>
                                 It is estimated that there are 1and ½ million HIV carriers in the US <br>
                                 There may be as many as one million carriers of HBV
                                 </p>
                              </div> <br> 
                              <div>
                              <h5 class="nk-block-title">➢	LESSON 2 - TRANSMISSION OF BLOOD BORNE INFECTION</h5>
                              <p>Sources of blood borne infections in the workplace. <br>
                                 Four primary ways of getting blood borne infections outside the workplace. <br>
                                 Three primary ways of getting blood borne infections at work. <br>
                                 Risky jobs, tasks and work practices.
                              </p>
                              </div> <br>

                              <div>
                              <h5 class="nk-block-title">➢	LESSON 3 - EXPOSURE CONTROL</h5>
                              <p>The HBV vaccine for all workers who come into contact with blood or other potentially infectious body fluids on the job. <br>
                              The definition of Universal Precautions. <br>
                              The steps that should be taken after an exposure incident in order to prevent infection.<br>
                              My right in case of exposure and/or infection.<br>
                              I have the right to have HBV vaccinations provided to me free of charge if I am at risk for infection. If I refuse it at this time, I have the right to be vaccinated free of charge at any time in the future provided I am still at risk for infection.
                              </p>
                              </div> <br>

                              <div>
                              <h5 class="nk-block-title">➢	LESSON 4 - USING PERSONAL PROTECTIVE EQUIPMENT</h5>
                              <p>Types of Personal Protective Equipment (PPE) required for different tasks or situations.<br>
                                 Key requirements for selecting, providing, using, and disposing of or cleaning PPE.<br>
                                 Limitations of personal protective equipment.
                              </p>
                              </div> <br>

                              <div>
                              <h5 class="nk-block-title">➢	LESSON 5 - WORK PRACTICE CONTROLS</h5>
                              <p>Disposing of used needles or other sharps. <br>
                                 Working with lab materials.<br>
                                 Decontaminating work areas, instruments, and equipment.<br>
                                 Identifying and handling regulated waste.<br>
                                 Hand washing and other personal hygiene and health practices.
                              </p>
                              </div> <br>
                              <div>
                                 <p><strong>*I have received training covering all of the above topics and been informed of my rights accordingly.</strong></p>
                              </div> <br>

                                    
                              @if(!empty($precautionsData[0]['applicant_id']))
                              <div class="row g-4">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                                <img class="img-fluid" src="{{ asset('storage/signature/' . $precautionsData[0]['signature'] ) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                               <p>
                                             <span class="form-label">Date: </span>{{ \Carbon\Carbon::parse($precautionsData[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                    </div>  
                            @else
                            <form action="{{ route('universal-precautions.store') }}" onsubmit="submitForm();" method="post" enctype="multipart/form-data" class="row g-4">
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
                                             <label for="inputPassword4" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                                <input  value="<?php echo date('M d, Y') ?>" type="text" class="form-control" disabled>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12"><button type="submit" class="btn btn-primary btn-lg">Submit</button></div>
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
        @vite(['resources/libs/jquery/jquery.min.js', 
        'resources/libs/bootstrap/js/bootstrap.bundle.min.js', 
        'resources/libs/metismenu/metisMenu.min.js', 
        'resources/libs/simplebar/simplebar.min.js', 
        'resources/libs/node-waves/waves.min.js',  
        'resources/js/app.js'])

    </body>
</html>
