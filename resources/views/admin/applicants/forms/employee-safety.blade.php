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
                     @if(session('error'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">    
                           {{session('error')}}   
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
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
                           <h4 class="mb-sm-0 font-size-18"></h4>
                           <br>
                           <div class="page-title-right">
                              <ol class="breadcrumb m-0">
                                 <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                 <li class="breadcrumb-item active">Employee Safety! Cellular Phone Use</li>
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
                              <div>
                              <p>Employee Name: {{ $profileData->full_name }}</p>
                                <br>
                                 <h4 class="mb-sm-0 font-size-18">Employee Safety! Cellular Phone Use</h4>
                                 <br>
                                 <p><strong class="text-black">1st Access Home Care Incorporated</strong> Does Not Permit employees whilst on company time to talk on cellular phones while on the job. This is very dangerous and should be avoided any time. It is mandatory that I must pull over and stop my vehicle each time I conduct Agency business per cellular phone.
                                 </p>
                                 <p> The agency is not responsible for any moving violations, accidents or other incidents that may occur while I am using my cellular phone and driving.
                                 </p>
                                 <p><strong class="text-black">I have read and understand the above information of the Agency regulation regarding cellular phone use and I will comply.</strong>
                                 </ul> 
                                 <br>
                                 @if(!empty($employee_safety_data[0]['applicant_id']))
                                 <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-md-12">
                                       <div class="mb-3">
                                          <label class="form-label">Signature</label> <br>
                                          <img width="250" class="img-fluid" src="{{asset('storage/signature/' . $employee_safety_data[0]['signature'])}}">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                       <label class="form-label">Date Signed: {{ \Carbon\Carbon::parse($employee_safety_data[0]['created_at'])->format('M d, Y')}}</label>
                                    </div>
                                 </div>
                                    @if(!empty($employee_safety_data[0]['rep_signature']))
                                    <div class="row d-flex align-items-center justify-content-center">
                                    <div class="col-md-12">
                                       <div class="mb-3">
                                          <label class="form-label">Agency Representative Signature</label> <br>
                                          <img width="250" class="img-fluid" src="{{asset('storage/signature/' . $employee_safety_data[0]['rep_signature'])}}">
                                       </div>
                                    </div>
                                 </div>
                                    @else 
                                       <hr style="color: black !important; width:100px !important">
                                       <form action="{{ route('submit-cellular-phone-use', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" enctype="multipart/form-data" onsubmit="submitForm();">
                                          @csrf
                                          <!-- Agency Representative Signature -->
                                          <div class="row d-flex align-items-center justify-content-center">
                                             <div class="col-md-12">
                                                <div class="mb-3">
                                                   <label class="form-label">Agency Representative</label> <br>
                                                   <div class="flex-row">
                                                      <div class="wrapper">
                                                         <canvas id="signature-pad"></canvas>
                                                         <textarea require style="display:none" name="rep_signature" id="signature-input"></textarea>
                                                      </div>
                                                      <div class="clear-btn">
                                                         <button id="clear"><span>Clear</span></button>
                                                      </div>
                                                   </div>
                                                   @error('rep_signature')
                                                   <p class="alert alert-danger"> {{ $message }} </p>
                                                   @enderror
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="mb-3">
                                             <button name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
                                             </div>
                                          </div>
                                       </form>
                                    @endif
                                 @endif

                              </div>
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
      @include('templates/admin/foot')
   </body>
</html>