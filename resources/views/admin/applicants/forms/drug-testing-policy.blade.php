
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
                                            <li class="breadcrumb-item active">Drug Testing Policy</li>
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
                                    <h4 class="mb-sm-0 font-size-18">Drug Testing Policy</h4><br>
                                    <p>Agency employees may not possess, distribute or use alcoholic beverages or controlled substances. Including inhalants while on premises of property controlled by the Agency or while in the course of conducting company business or engaged in any company sponsored activity.</p>

                                        <P>Patients or visitors may not possess, distribute and/or use alcoholic beverages or controlled substances, while on the premises of property controlled by the Agency.</P>

                                        <P>Any employee who has knowledge of a person or persons violating this policy must report it to his/her Supervisor immediately.</P>

                                        <P>Based on reasonable cause, the Agency may conduct searches or inspection of an employee’s personal belongings and may be asked to take a drug test. Refusal to consent may result in termination.</P>

                                        <P><strong>*I HAVE READ AND UNDERSTAND THE ABOVE AND WILL COMPLY WITH THIS AGREEMENT</strong></P>    <br>

                                        @if(!empty($drug_testing_policy_data[0]['applicant_id']))
                                            <div class="row d-flex align-items-center justify-content-center">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Signature</label> <br>
                                                        <img width="250"  src="{{asset('storage/signature/' . $drug_testing_policy_data[0]['signature'])}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Date Signed</label>
                                                        <p>{{ \Carbon\Carbon::parse($drug_testing_policy_data[0]['created_at'])->format('M d, Y')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
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
