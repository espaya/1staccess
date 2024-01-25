
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
                                            <li class="breadcrumb-item active">Sworn Disclosure Statement</li>
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
                                    <h4 class="mb-sm-0 font-size-18">Sworn Disclosure Statement</h4><br>

                                    <div>
                                 <p>Section 32.1-162.9:1 of the Code of Virginia requires that a sworn disclosure statement or affirmation be completed for each prospective employee for a home care organization.
                                 Employment or volunteering is prohibited if a person has been convicted of any of the offenses specified on the reverse side or has been the subject of a founded complaint of child abuse or neglect.
                                 Convictions include adult convictions and juvenile convictions and adjudications of delinquency based on an offense that would have been at the time of conviction a felony, conviction if committed by an adult within or outside the commonwealth.
                                 Any person making a materially false statement regarding any such offense shall be guilty of a Class 1 misdemeanor. This statement must be provided to and maintained at the exempt facility for prospective employees and volunteers.
                                 </p> <br>
                              </div>                            

                              <div class="row g-4">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>
                                             <span class="form-label">Name: </span>{{ ucfirst($profileData->full_name) }}</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>
                                             <span class="form-label">Social Security #: </span>{{ ucfirst($sworn_disclosure_statement_data[0]['SSN']) }}</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>
                                             <span class="form-label">Mailing Address: </span>{{ ucfirst($sworn_disclosure_statement_data[0]['mailing_address']) }}</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">Position Applied For: </span>{{ ucfirst($sworn_disclosure_statement_data[0]['position']) }}</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>1.	Have you ever been convicted of or are you the subject of pending charges for any of the following offenses: murder; malicious wounding by mob; abduction; abduction for immoral purposes; assault and bodily wounding; robbery; carjacking; extortion by threat; any felony stalking violation; sexual assault; arson; burglary; any felony violation relating to possession or distribution of drugs; drive by shooting; use of a machine gun in a crime of violence; aggressive use of a machine gun; use of a sawed-off shotgun in a crime of violence; pandering; crimes against nature involving children; incest; taking indecent liberties with children; abuse and neglect of children, including failing to secure medical attention for an injured child; obscenity offenses; possession of child pornography; electronic facilitation of pornography; abuse and neglect of incapacitated adults; employing or permitting a minor to assist in an act constituting an obscenity or related offence; delivery of drugs to prisoners; escape from jail; felonies by prisoners; within the Commonwealth or any equivalent offense outside the Commonwealth?: {{ ucfirst($sworn_disclosure_statement_data[0]['convicted_outside_commonwealth']) }}</p>
                                            </div>
                                          </div>
                                       </div>
                                       @if($sworn_disclosure_statement_data[0]['convicted_outside_commonwealth'] == "Yes")
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p><span class="form-label">If Yes Specify Crimes: </span>{{$sworn_disclosure_statement_data[0]['outside_commonwealth_specify']}}</p>
                                            </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-12">
                                          <div class="form-group">
                                          <label for="inputCity" class="form-label">2.	Have you been convicted of or are you the subject of a pending charge for any other felony in the five(5) years prior to the date of employment or volunteering?: {{$sworn_disclosure_statement_data[0]['convicted_pending']}}</label>
                                          </div>
                                       </div>

                                       @if($sworn_disclosure_statement_data[0]['convicted_pending'] === "Yes (Convicted)" || $sworn_disclosure_statement_data[0]['convicted_pending'] === "Yes (Pending)" )
                                       <div class="col-md-12" id="convicted_pending_specify" style="display:none">
                                          <div class="form-group">
                                             <label for="inputZip" class="form-label">If Yes, Specify Crime(s)</label>
                                             <div class="form-control-wrap">
                                             <p>{{$sworn_disclosure_statement_data[0]['convicted_pending_specify']}}</p>
                                            </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputState" class="form-label">3.	Have you ever been the subject of a founded complaint of child abuse or neglect within or outside the Commonwealth: {{$sworn_disclosure_statement_data[0]['child_abuse']}}</label>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Applicant Signature</label>
                                             <div class="form-control-wrap">
                                                <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $sworn_disclosure_statement_data[0]['signature'] ) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Witnessed by</label>
                                             <div class="form-control-wrap">
                                             <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $sworn_disclosure_statement_data[0]['wit_signature'] ) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p><span class="form-label">Date Signed:</span> {{Carbon\Carbon::parse($sworn_disclosure_statement_data[0]['created_at'])->format('M d, Y')}}</p>
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

            var witCanvas = document.getElementById("wit-signature-pad");
            var witSignaturePad = new SignaturePad(witCanvas);
            
            document.getElementById("clear").addEventListener('click', function(event) {
               event.preventDefault();
               signaturePad.clear();
            });

            document.getElementById("wit-clear").addEventListener('click', function(event){
               event.preventDefault();
               witSignaturePad.clear();
            });
            
            
            function submitForm() {
            if(!signaturePad.isEmpty()){
               //Unterschrift in verstecktes Feld übernehmen
               document.getElementById('signature-input').value = signaturePad.toDataURL();
            }

            if(!witSignaturePad.isEmpty()){
               document.getElementById('wit-signature-input').value = witSignaturePad.toDataURL();
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
   canvas#signature-pad, canvas#wit-signature-pad {
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }
   button#clear, button#wit-clear {
   height: 100%;
   background: #4b00ff;
   border: 1px solid transparent;
   color: #fff;
   font-weight: 600;
   cursor: pointer;
   }
   button#clear span, button#wit-clear span {
   transform: rotate(90deg);
   display: block;
   }
</style> 

        <!-- JAVASCRIPT -->
        @include('templates/admin/foot')

    </body>
</html>
