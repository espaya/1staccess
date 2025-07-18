
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
                                            <li class="breadcrumb-item active">Following Infection Control Agreement</li>
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
                                            <strong>Following Infection Control Agreement</strong>
                                        </p>

                                <div class="row g-4">
                                 <p>1st Access Home Care wants to improve client outcomes by identifying and reducing the risk of infection in clients and Agency staff.</p>
                                 <p>The Agency will document infections that are acquired while the client is receiving services from the Agency. The documentation will include at a minimum the date that the infection was detected, the client’s name or number, primary diagnosis, signs/symptoms, type of infection, pathogens identified and treatment.</p>
                                 <p>The infection control program will include surveillance, identification, prevention, control and reporting. Targeted surveillance of infections will focus on specific client population or procedures.</p>
                                 <p>Infection Control Standards are established in compliance with the recommendations of the National Center for Disease Control. All staff are educated on these standards and they are practiced consistently. Any incidents of infection related to care and service are reported.</p>
                                 <p><em>I recognize and I am fully aware of the fact that any client may be contagious at any time and that this may not always be a known fact while care is being provided. I will follow all Infection Control and Universal Precautions Procedures of the Agency. I also state that currently I am in excellent health and have no impairments that may alter my job performance.</em></p>

                                 
                              </div>
                              
                                    <div class="row g-4">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                                <img width="250" src="{{ asset('storage/signature/' . $infection_control_agreement_data[0]['signature']) }}">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                             <p>{{ \Carbon\Carbon::parse($infection_control_agreement_data[0]['created_at'])->format('F d, Y')}}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    </div>
                                    @if(!empty($infection_control_agreement_data[0]['agency_rep_signature']))
                                    <div class="row d-flex align-items-center justify-content-center">
                                       <div class="col-md-6">
                                          <div class="mb-3">
                                             <label class="form-label">Agency Representative Signature</label> <br>
                                             <img width="250"  src="{{asset('storage/signature/' . $infection_control_agreement_data[0]['agency_rep_signature'])}}">
                                          </div>
                                       </div>
                                    </div>
                                    @else
                                    <form action="{{ route('infection-control-agreement-rep-signature', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" enctype="multipart/form-data" onsubmit="submitForm();">
                                       @csrf
                                       <div class="row d-flex align-items-center justify-content-center">
                                          <div class="col-md-12">
                                             <div class="mb-3">
                                                <label class="form-label">Supervisor Signature</label> <br>
                                                <div class="flex-row">
                                                   <div class="wrapper">
                                                      <canvas id="signature-pad"></canvas>
                                                      <textarea require style="display:none" name="agency_rep_signature" id="signature-input"></textarea>
                                                   </div>
                                                   <div class="clear-btn">
                                                      <button id="clear"><span>Clear</span></button>
                                                   </div>
                                                </div>
                                                @error('agency_rep_signature')
                                                <p class="alert alert-danger"> {{ $message }} </p>
                                                @enderror
                                             </div>
                                             <div>
                                                <button name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
                                          </div>
                                          </div>
                                          @error('supervisor_signature')
                                          <p class="alert alert-danger"> {{ $message }} </p>
                                          @enderror
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
