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
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                           {{session('error')}}   
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
                                 <strong>Disclaimer and Waiver of Liability</strong>
                              </p>
                              <p>Name of Employee: <u>{{ ucfirst($profileData->full_name) }}</u></p>
                              
                              <p>I acknowledge and will adhere to the rules and regulations as set forth by the Office of Licensure and Certification. I understand that the falsification of documents, particularly those pertaining to the submission of visit notes where in fact no visits was made, is considered to be fraud and is subject to filing of a criminal grievance, civil and/or criminal prosecution, and immediate termination. I therefore hold the home health care agency, its shareholders, directors and officers, harmless from any falsified documents.</p>
                              <p><strong>I have read and understand the above information. I understand that the falsification of documents, particularly those pertaining to the submission of visit notes where in fact no visits was made, is considered to be fraud and is subject to filing of a criminal grievance, civil and/or criminal prosecution, and immediate termination.</strong></p>
                              </ul> 
                              <br>
                              @if(!empty($disclaimer_waiver_liability_data[0]['applicant_id']))
                              <div class="row d-flex align-items-center justify-content-center">
                                 <div class="col-md-12">
                                    <div class="mb-3">
                                       <label class="form-label">Employee Signature</label> <br>
                                       <img width="250"  src="{{asset('storage/signature/' . $disclaimer_waiver_liability_data[0]['signature'])}}">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="mb-3">
                                       <label class="form-label">Date Signed</label>
                                       <p>{{ \Carbon\Carbon::parse($disclaimer_waiver_liability_data[0]['created_at'])->format('M d, Y')}}</p>
                                    </div>
                                 </div>
                              </div>

                                 @if(!empty($disclaimer_waiver_liability_data[0]['rep_signature']))
                                    <p class="form-label">Agency Representative Signature</p>
                                    <img width="250"  src="{{asset('storage/signature/' . $disclaimer_waiver_liability_data[0]['rep_signature'])}}">
                                 @else 
                                    <!-- Agency Representative Signature -->
                                    <form action="{{ route('submit-disclaimer-waiver-liability', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" onsubmit="submitForm();" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
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
                                             <label class="form-label">Date Signed:</label>
                                             <input disabled name="date_rep_signed" type="text" value="<?php echo date("F j, Y"); ?>" class="form-control">
                                          </div>
                                    </div>
                                    <div>
                                          <button name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                    </form>
                                 @endif
                                 @endif
                              
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