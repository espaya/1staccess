
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Home Health Aide - 1staccess Home Care</title>
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
                                            <li class="breadcrumb-item active">Home Health Aide</li>
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
                                        <strong>Home Health Aide</strong>
                                    </p><br>
                                        <br>

                                    <p>Employee Name: <u>{{ ucfirst($profileData[0]['full_name']) }}</u> </p>
                                    
                                <div class="row g-4">
                              <p>

                              <strong>REPORTS TO: SUPERVISING REGISTERED NURSE</strong><br>
                                 <strong>DEPARTMENT: CLINICAL</strong><br><br>
                                
                                 <strong>POSITION SUMMARY:</strong><br>
                                 Works under the supervision of the designated Registered Nurse. Provides direct client care as assigned by the registered nurse. Provides quality and delivery of home care services.
                                 Assist in the home care services that reflect the home care agency philosophy and standards of home health nursing care of assigned clients. <br><br>
                                 
                                    <strong>POSITION QUALIFICATIONS:</strong><br>
                                    ●	High school graduation required.<br>
                                    ●	Home Health Aide certification required as obtained through successful completion of and approved program.<br>
                                    ●	 Shall have on year-full-time experience in home health care in an institutional setting, such as a hospital or nursing home OR shall have one year-full-time experience within the last 5 years in direct client care in a home health agency setting; OR <br>
                                    ●	Evidence of sympathetic attitude toward care of the sick. <br>
                                    ●	Demonstrated ability to read, write, and carry out directions. <br>
                                    ●	Evidence of maturity and ability to deal effectively with job demands. <br>
                                    ●	Good verbal and written communications skills required. <br>
                                    ●	Attends 12 hours of Aide oriented in services per year. <br>
                                    ●	Participates in professional meetings when directed. <br>
                                    ●	Shall have a criminal history check conducted prior to being offered permanent employment with this agency. <br>
                                    ●	Is able to work closely supervised to ensure competence in providing client care. <br><br>
                                    
                                 <strong>PHYSICAL REQUIREMENTS:</strong><br>
                              ●	Visual/hearing ability sufficient to comprehend written /verbal communication. <br>
                              ●	Ability to perform tasks involving physical activity, which may include heavy lifting and extensive bending and standing. <br>
                              ●	Ability to deal effectively with stress. <br>
                              ●	Able to work a minimum of 40 hours per week. <br>
                              ●	Able to bend and stand an average of 6 hours per day. <br>
                              ●	Able to lift up to 50 - 75 pounds. <br>
                              ●	Able to write up to 3 hours per day. <br>
                              ●	Able to work in a stressful environment. <br>
                              ●	Able to drive 45 - 50 miles per day. <br>
                              ●	Able to access and communicate will ill clients, co-workers and general public. <br>
                              ●	Is neat in appearance and practice,with good personal hygiene.<br><br>
                             
                              <strong>May be employed by the agency if he/she has met the following conditions:</strong><br>
                              Home Health Aide is expected to pass competency examination with at least a 80% or better. The content of the competency evaluation of the Agency will include and not limited to: <br>
                              ●	Communication skills. <br>
                              ●	Observation, reporting, and documentation of a client’s status and the care or service furnished.<br>
                              ●	Reading and recording temperatures, pulse, and respiration, and blood pressures.<br>
                              ●	Basic infection control procedures and instruction on universal precautions.<br>
                              ●	Basic elements of body functions and changes in body function that must be reported to the Supervisor.<br>
                              ●	Maintenance of a clean, healthy, and safe environment.<br>
                              ●	Recognizing emergencies and knowledge of emergency procedures. <br>
                              ●	The physical, emotional, and developmental needs of and ways to work with the populations served by the Agency including, the need for respect for the client and his or her privacy and property. <br><br>
                              
                              <strong>PHYSICAL REQUIREMENTS:</strong><br>
                              ●	The appropriate and safe techniques in personal hygiene and grooming include: <br>
                                 -	Bed bath<br>
                                 -	Sponge, tub or shower bath;<br>
                                 -	Shampoo, sink, tub or bed;<br>
                                 -	Nail and hair care;<br>
                                 -	Oral hygiene and;<br>
                                 -	Toileting and eliminating;<br>
                                 -	Safe transfer techniques and ambulation;<br>
                                 -	Normal range of motion and position;<br>
                                 -	Adequate nutrition and fluid intake;<br>
                                 -	Client rights; and <br>
                                 -	Any other task that the Agency may choose to have the home health aide perform. <br><br>
                                 
                                 <strong>DUTIES:</strong><br>
                                 
                                 1.	Ensure quality and safe delivery of home care services.<br>
                                    ●	Participates in development and implementation of client plans of care per home care agency policy and procedure, as appropriate. <br>
                                    ●	Participates in client case conferences according to home health care agency policy and procedure, as appropriate.<br>
                                    ●	The provided home health aide services reflect client plans of care. <br>
                                    ●	Information regarding client plans of care is submitted to the Home Care Registered Nurse in a timely manner. <br><br>
                                 
                                 2.	Implement current Home Health Aide services. <br>
                                    ●	Client plans of care are discussed with the Home Care Registered Nurse on a regular basis.<br>
                                    ●	Client clinical records are documented per Home Care agency policy and procedure.<br>
                                    ●	Client assignments and reports are received from the Home Care Registered Nurse.<br><br>
                                 
                                 <strong>Acknowledgement:</strong><br>
                                 *I have reviewed my job description and agree to perform all duties mentioned to the best of my ability; I understand that my job duties may change as the needs of the agency change. I further agree to notify my immediate Supervisor if I am unable to complete any of my job duties in a timely manner.
                                 </p> <br>
                              </div>
                                    
                              @if(!empty($homeHealthData[0]['applicant_id']))
                              <div class="row g-4">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                                <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $homeHealthData[0]['signature']) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                             <p>{{ \Carbon\Carbon::parse($homeHealthData[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                    </div>   
                            @else
                            <form onsubmit="submitForm();" action="{{ route('home-health-aide.store') }}" method="post" enctype="multipart/form-data" class="row g-4">
                                    @csrf
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                                <div class="flex-row">
                                                   <div class="wrapper">
                                                      <canvas></canvas>
                                                      <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                                                   </div>
                                                   <div class="clear-btn">
                                                      <button id="clear"><span>Clear</span></button>
                                                   </div>
                                                </div>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                                <input disabled value="<?php echo date('M d, Y') ?>" type="text" class="form-control">
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
