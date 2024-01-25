
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
                                            <li class="breadcrumb-item active">Verification of Professional License</li>
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
                                    <h4 class="mb-sm-0 font-size-18">Verification of Professional License</h4><br>
                                    <p>Employee Name: {{ ucfirst($profileData->full_name) }} </p>
                                    <p>Date of Hire: {{ \Carbon\Carbon::parse($verification_data[0]['hire_date'])->format('M d, Y') }} </p>
                              
                              <div class="row g-4">
                                       <div class="col-md-12">
                                       <div class="form-group">
                                          <div class="form-control-wrap">
                                             <p>
                                                Check Off Discipline Needing Verification: {{implode(', ', explode(',', $verification_data[0]['disciplines']))}} <br><br>

                                                License Number: {{$verification_data[0]['licenseNumber']}} <br><br>

                                                Expiration Date Of License: {{Carbon\Carbon::parse($verification_data[0]['expirationDate'])->format('M d, Y')}} <br><br>

                                                Date Verified: {{Carbon\Carbon::parse($verification_data[0]['dateVerified'])->format('M d, Y')}} <br><br>

                                                License Verified By: {{ucfirst($verification_data[0]['licenseVerifiedBy'])}} <br><br>

                                                Action Outstanding: {{$verification_data[0]['actionOutstanding']}} <br><br>

                                                Comments: {{$verification_data[0]['comments']}}

                                             </p>
                                          </div>
                                       </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Signature of Agency Representative</label>
                                             <div class="form-control-wrap">
                                                <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $verification_data[0]['signature'] ) }}">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">Date: </span>{{Carbon\Carbon::parse($verification_data[0]['created_at'])->format('M d, Y')}}</p> 
                                             </div>
                                          </div>
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
