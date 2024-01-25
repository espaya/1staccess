
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
                                    <p>Employee Name: <u>{{ ucfirst($profileData[0]['full_name']) }}</u> </p>
                                    <h4 class="mb-sm-0 font-size-18">Non-Compete Agreement</h4><br>
                                    <div>
                                 <p>As an employee of 1st Access Home Care, the employee acknowledges that they will be in receipt of confidential information. This information shall include but not limited to, procedures manuals, in-house policies, patient lists, patient’s medical records, financial information and billing records, certifications and applications, actual and prospective markets and patient’s, business plans and marketing strategies, customer lists, sales and marketing data, operating systems, income statements, asset and liability information, financial projections and any other confidential information gathered, revealed, acquired or generated by or for 1st Access Home Care. Each employee shall protect and hold in confidence the confidential information to anyone except with the express written consent of Clarissa Ayensu(Administrator). The employee acknowledges and understands the competitive sensitivity of the confidential information and the potential for significant material harm that could result to 1st Access Home Care in the event that confidential information is disseminated to others, in particular competitors. Therefore the employee agrees that the appropriate remedy would be an immediate injunction against the violating employee in joining and prohibiting the use and continued dissemination of the confidential information. Further, each employee agrees that the dissemination of the confidential information would cause damages for which damages could not be readily ascertained and would constitute a breach of duty owed by the employee to 1st Access Home Care. Each employee agrees to pay 1st Access Home Care in any action to enforce this confidentiality agreement or cost of litigation, including attorney’s fees and other damages found by the trier fact.</p>
                                 <p>
                                 As consideration for employment and for the release of this confidential information, the employee agrees not to compete against 1st Access Home Care or to utilize any of the confidential information for a period of two (2) years from the date of their employment terminated with 1st Access Home Care. This Non-Compete Agreement shall be limited to Prince William County and contiguous counties. This Non-Compete Agreement is not intended to prohibit from working as a nurse, therapist or other position in the health service industries but is intended to prohibit employee from working with a competitor of 1st Access Home Care in the home health industry and utilizing any of the confidential information of 1st Access Home Care or contacting any of 1st Access Home Care patients. Employees agree and warrant that they will not contact, engage, discuss, negotiate or contract with any patient or family member of a patient for those purposes of developing or promoting home health care services of said patient. All parties acknowledge that this confidential information is of a proprietary nature to 1st Access Home Care and if the confidential information was revealed to the general public or to a competitor, the revelation would destroy or impair the expected success of 1st Access Home Care.
                                 </p>
                                 <p><strong>*ANY CONTROVERSY OR CLAIM ARISING OUT OF OR RELATING TO THIS AGREEMENT SHALL BE SUBMITTED TO ARBITRATION BEFORE ONE(1) ARBITRATOR IN RICHMOND, VIRGINIA IN ACCORDANCE WITH THE COMMERCIAL ARBITRATION RULES OF THE AMERICAN ARBITRATION ASSOCIATION JUDGEMENT UPON THE AWARD RENDERED BY THE ARBITRATOR MAY BE ENTERED BY ANY COURT HAVING JURISDICTION THEREOF. ARBITRATION SHALL BE THE EXCLUSIVE,FINAL AND BINDING METHOD OF RESOLUTION OF ANY CLAIM OR CONTROVERSY BETWEEN 1st Access Home Care AND EMPLOYEE ARISING FROM THIS AGREEMENT</strong></p>
                                 <p>I HAVE READ AND UNDERSTAND THE ABOVE AND WILL COMPLY WITH THIS AGREEMENT.</p> <br>
                              </div>
                                    
                              @if(!empty( $nonCompeteData[0]['applicant_id']))
                                    <div class="row g-4">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                             <img width="250" src="{{asset('storage/signature/' . $nonCompeteData[0]['signature'])}}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                             <p>{{ \Carbon\Carbon::parse($nonCompeteData[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                    </div>
                              @else
                              <form onsubmit="submitForm();" action="{{ route('non-compete-agreement.store') }}" method="post" enctype="multipart/form-data" class="row g-4">
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
        @vite(['resources/libs/jquery/jquery.min.js', 
        'resources/libs/bootstrap/js/bootstrap.bundle.min.js', 
        'resources/libs/metismenu/metisMenu.min.js', 
        'resources/libs/simplebar/simplebar.min.js', 
        'resources/libs/node-waves/waves.min.js',  
        'resources/js/app.js'])

    </body>
</html>
