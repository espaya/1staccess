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
                        @error('rep_signature')
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
                           <h4 class="mb-sm-0 font-size-18"></h4>
                           <br>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                 <li class="breadcrumb-item active">Policies And Procedures Orientation Acknowledgement</li>
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
                              <h4 class="mb-sm-0 font-size-18">Policies And Procedures Orientation Acknowledgement</h4>
                              <br>
                              <p>Name of Employee: {{ ucfirst($profileData->full_name) }}</p>
                              <div>
                                 <p>I acknowledge that I have been oriented to agencies Policies and Procedures Manual and agree to follow all guidelines, both written and verbal. I understand that, if the guidelines, policies and procedures are not followed, that I may be immediately terminated. I also had the opportunity to ask questions regarding the Policies and Procedures Manual and I know where it’s located for future reference.</p>
                                 <br>
                              </div>
                              @if(!empty($policies_procedures_data[0]['applicant_id']))
                              <div class="row g-4">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="inputEmail4" class="form-label">Employee Signature</label>
                                       <div class="form-control-wrap">
                                          <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $policies_procedures_data[0]['signature']) }}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <div class="form-control-wrap">
                                          <p>
                                             <span class="form-label">Date: </span>{{ \Carbon\Carbon::parse($policies_procedures_data[0]['created_at'])->format('M d, Y')}}
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              <!-- Agency Represnetative Signature -->
                              <div class="row d-flex align-items-center justify-content-center">
                                 @if(!empty($policies_procedures_data[0]['rep_signature']))
                                 <div class="col-md-12">
                                    <div class="mb-3">
                                       <label class="form-label">Agency Representative Signature</label> <br>
                                       <img width="250"  src="{{ asset('storage/signature/' . $policies_procedures_data[0]['rep_signature']) }}">
                                    </div>
                                 </div>
                                 @else
                                 <form onsubmit="submitForm();" action="{{ route('save.smokingRepSig', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="col-md-12">
                                       <div class="mb-3">
                                          <label class="form-label">Agency Representative Signature</label> <br>
                                          <div class="flex-row">
                                             <div class="wrapper">
                                                <canvas id="signature-pad"></canvas>
                                                <textarea require style="display:none" name="rep_signature" id="signature-input"></textarea>
                                             </div>
                                             <div class="clear-btn">
                                                <button id="clear"><span>Clear</span></button>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div>
                                             <button type="submit" class="btn btn-primary w-md">Submit</button>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                                 @endif
                              </div>
                           </div>
                           <!-- end card body -->
                        </div>
                        <!-- end card -->
                     </div>
                  </div>
               </div>
               <!-- container-fluid -->
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