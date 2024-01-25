
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
                            @error('rep_signature')
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
                                            <li class="breadcrumb-item active">Employee Reference Check</li>
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
                                    <h4 class="mb-sm-0 font-size-18">Employee Reference Check</h4><br>
                                    <br>
                                    <div class="row g-4">
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                   <p><span class="form-label">Employee Name: {{ ucfirst($profileData->full_name) }} </span></p>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                <p>
                                                <span class="form-label">Company Contacted: </span>{{ucfirst($employee_reference_check_data[0]['company_contacted'])}}</p>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <p>Mr./Mrs. <span style="text-decoration: underline;">{{ucfirst($employee_reference_check_data[0]['employer_name'])}}</span> is checking employment with our company. It is our policy to ask for references prior to employment. Please complete this form for our records and sign below. We would greatly appreciate your assistance.</p>
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-12">
                                             <div class="form-group">
                                             <h5>Please Verify Employment Dates</h5>
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                <p><span class="form-label">From: </span>{{Carbon\Carbon::parse($employee_reference_check_data[0]['from_date'])->format('M d, Y')}}</p>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                <p><span class="form-label">To: </span>{{Carbon\Carbon::parse($employee_reference_check_data[0]['to_date'])->format('M d, Y')}}</p>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                <p>
                                                <span class="form-label">Eligible For Hire?: </span>{{ucfirst($employee_reference_check_data[0]['eligible_for_hire'])}}</p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="inputZip" class="form-label">Comments</label>
                                                <div class="form-control-wrap">
                                                <p>{{ucfirst($employee_reference_check_data[0]['comments'])}}</p>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                <p>
                                                <span class="form-label">Information Was Received By: </span>{{ucfirst($employee_reference_check_data[0]['received_by'])}}</p>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                <p><span class="form-label">Name of Company: </span>{{ucfirst($employee_reference_check_data[0]['name_of_company'])}}</p>
                                             </div>
                                             </div>
                                          </div>
                                          <hr>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="inputPassword4" class="form-label">Employee Signature</label>
                                                <div class="form-control-wrap">
                                                <img width="250" src="{{asset('storage/signature/' . $employee_reference_check_data[0]['signature'])}}">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                   <p>
                                                <span class="form-label">Date: </span>{{ \Carbon\Carbon::parse($employee_reference_check_data[0]['created_at'])->format('F d, Y') }}</p>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                          <div class="form-group">
                                                <label class="form-label">Signature of Agency Representative</label>
                                                <div class="form-control-wrap">
                                                <img width="250" src="{{asset('storage/signature/' . $employee_reference_check_data[0]['rep_signature'])}}">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                          <div class="form-group">
                                                <div class="form-control-wrap">
                                                   <p><span class="form-label">Agency Representative's Title: </span>{{ucfirst($employee_reference_check_data[0]['rep_title'])}}</p>
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

   // rep signature
   var rep_canvas = document.getElementById("rep-signature-pad");
   var repSignaturePad = new SignaturePad(rep_canvas);
   
   document.getElementById("rep-clear").addEventListener('click', function(event){
      event.preventDefault();
      repSignaturePad.clear();
   });
   
   
   function submitForm() {
     if(!signaturePad.isEmpty()){
       document.getElementById('signature-input').value = signaturePad.toDataURL();
     }
     //rep signature
     if(!repSignaturePad.isEmpty()){
      document.getElementById('rep-signature-input').value = repSignaturePad.toDataURL();
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
   canvas#signature-pad, #rep-signature-pad {
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }

   button#clear, #rep-clear {
   height: 100%;
   background: #4b00ff;
   border: 1px solid transparent;
   color: #fff;
   font-weight: 600;
   cursor: pointer;
   }

   button#clear span, #rep-clear span {
   transform: rotate(90deg);
   display: block;
   }

</style>
 

        <!-- JAVASCRIPT -->
        @include('templates/admin/foot')

    </body>
</html>
