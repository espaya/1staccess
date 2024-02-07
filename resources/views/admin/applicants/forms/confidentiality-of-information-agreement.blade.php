
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
                                            <li class="breadcrumb-item active">Confidentiality Of Information Agreement</li>
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
                                        <strong>Confidentiality of Information Agreement</strong>
                                    </p><br>
                                        <br>
                                        <div>
                                            <p>Employee Name: <u>{{ ucfirst($profileData->full_name) }}</u></p>
                                            <p><strong>Confidentiality of Information Agreement</strong></p>
                                            <ul>
                                                <li>All information designated confidential that is obtained or generated as a result of any or all of the operations of the Agency will be dealt with in a confidential manner.</li>

                                                <li>All information that is gathered, maintained or stored by the Agency becomes the Agency’s property and cannot be released without proper authorization from the administration.</li>

                                                <li>Altering information is prohibited by the Agency and by law. Correction of any identified erroneous information must be done according to Agency policy</li>

                                            </ul>

                                            <p><strong>What we can do to maintain the confidentiality of Information</strong></p>
                                            <ul>
                                                <li>In order to protect any individual from invasion of privacy and to protect the interest of the Agency, any information gathered for client care or operations will be gathered, maintained and stored in such a manner as to ensure confidentiality.</li>

                                                <li>Access to information will be limited to a need to know basis to perform the scope of one’s duties and responsibilities.</li>

                                                <li>Dissemination of information will be handled according to Agency policy, and staff will be informed during orientation, will sign the confidentiality statement and it will be placed in the employee’s file</li>
                                            </ul>
                                    
                                            <p><strong>I understand that I am responsible for following this Confidentiality Policy Agreement & The Guidelines, both written and verbal</strong></p>
                                        
                                        @if(!empty($confidentialityData[0]['applicant_id']))
                                        <p>Employee Signature</p>
                                        <img width="250"  src="{{asset('storage/signature/' . $confidentialityData[0]['signature'])}}">
                                        <p>Date: {{ \Carbon\Carbon::parse($confidentialityData[0]['created_at'])->format('M d, Y')}}</p>
                                            
                                        @else
                                        <form action="{{route('confidentiality-of-information')}}" method="post" enctype="multipart/form-data" onsubmit="submitForm();">
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
