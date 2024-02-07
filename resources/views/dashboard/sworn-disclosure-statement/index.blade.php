
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Sworn Disclosure Statement - 1staccess Home Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="1staccess job application portal" name="description">
        <meta content="1staccess Home Care" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
        <script src="http://code.jquery.com/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>

            <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Include Icons CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">

<!-- Include App CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

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

                                    <img width="30%" src="{{ asset('images/1staccess.png') }}" style="margin-left:220px;">
                                    <p class="mb-sm-0 font-size-18" style="font-size: 14; text-align: center;">
                                    <strong>1st Access Home Care Incorporated</strong>
                                    </p>
                                    <p style="text-align: center; font-size: 11;">
                                        6600 Fieldtan Trail, Moseley, VA, 23120<br>Agency Phone: 804.818.3216
                                    </p>
                                    <p class="mb-sm-0 font-size-18" style="font-size: 11; text-align: center;">
                                        <strong>Sworn Disclosure Statement</strong>
                                    </p><br>
                                        <br>

                                    <p>Employee Name: <u>{{ ucfirst($profileData[0]['full_name']) }}</u> </p>
                                    <br>
                                    <div>
                                 <p>Section 32.1-162.9:1 of the Code of Virginia requires that a sworn disclosure statement or affirmation be completed for each prospective employee for a home care organization.
                                 Employment or volunteering is prohibited if a person has been convicted of any of the offenses specified on the reverse side or has been the subject of a founded complaint of child abuse or neglect.
                                 Convictions include adult convictions and juvenile convictions and adjudications of delinquency based on an offense that would have been at the time of conviction a felony, conviction if committed by an adult within or outside the commonwealth.
                                 Any person making a materially false statement regarding any such offense shall be guilty of a Class 1 misdemeanor. This statement must be provided to and maintained at the exempt facility for prospective employees and volunteers.
                                 </p> <br>
                              </div>                            

                                    
                              @if(!empty($swornData[0]['applicant_id']))
                              <div class="row g-4">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>
                                             <span class="form-label">Mailing Address: </span>{{$swornData[0]['mailing_address']}}</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                @if(!empty($positionData[0]['applicant_id']))
                                                <p><span class="form-label">Position Applied For: </span>{{ $positionData[0]['position'] }}</p>
                                                @else
                                                <p>Position is not available</p> 
                                                @endif
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>1.	Have you ever been convicted of or are you the subject of pending charges for any of the following offenses: murder; malicious wounding by mob; abduction; abduction for immoral purposes; assault and bodily wounding; robbery; carjacking; extortion by threat; any felony stalking violation; sexual assault; arson; burglary; any felony violation relating to possession or distribution of drugs; drive by shooting; use of a machine gun in a crime of violence; aggressive use of a machine gun; use of a sawed-off shotgun in a crime of violence; pandering; crimes against nature involving children; incest; taking indecent liberties with children; abuse and neglect of children, including failing to secure medical attention for an injured child; obscenity offenses; possession of child pornography; electronic facilitation of pornography; abuse and neglect of incapacitated adults; employing or permitting a minor to assist in an act constituting an obscenity or related offence; delivery of drugs to prisoners; escape from jail; felonies by prisoners; within the Commonwealth or any equivalent offense outside the Commonwealth?: {{$swornData[0]['convicted_outside_commonwealth']}}</p>
                                            </div>
                                          </div>
                                       </div>
                                       @if($swornData[0]['convicted_outside_commonwealth'] == "Yes")
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p><span class="form-label">If Yes Specify Crimes: </span>{{$swornData[0]['outside_commonwealth_specify']}}</p>
                                            </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-12">
                                          <div class="form-group">
                                          <label for="inputCity" class="form-label">2.	Have you been convicted of or are you the subject of a pending charge for any other felony in the five(5) years prior to the date of employment or volunteering?: </label>
                                             <div class="form-control-wrap">
                                                <p>{{$swornData[0]['convicted_pending']}}</p>
                                            </div>
                                          </div>
                                       </div>

                                       @if($swornData[0]['convicted_pending'] == "Yes (Convicted)" || $swornData[0]['convicted_pending'] == "Yes (Pending)" )
                                       <div class="col-md-12" id="convicted_pending_specify" style="display:none">
                                          <div class="form-group">
                                             <label for="inputZip" class="form-label">If Yes, Specify Crime(s)</label>
                                             <div class="form-control-wrap">
                                             <p>{{$swornData[0]['convicted_pending_specify']}}</p>
                                            </div>
                                          </div>
                                       </div>
                                       @endif
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputState" class="form-label">3.	Have you ever been the subject of a founded complaint of child abuse or neglect within or outside the Commonwealth?</label>
                                             <div class="form-control-wrap">
                                                <p>{{$swornData[0]['child_abuse']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Applicant Signature</label>
                                             <div class="form-control-wrap">
                                                <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $swornData[0]['signature'] ) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Witnessed by</label>
                                             <div class="form-control-wrap">
                                             <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $swornData[0]['wit_signature'] ) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p><span class="form-label">Date Signed:</span> {{Carbon\Carbon::parse($swornData[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                    </div>  
                            @else
                            <form action="{{ route('sworn-disclosure-statement.store') }}" method="post" enctype="multipart/form-data" onsubmit="submitForm();" class="row g-4">
                                    @csrf
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Mailing Address</label>
                                             <div class="form-control-wrap">
                                                <input name="mailing_address" value="{{ old('mailing_address') }}" type="text" class="form-control @error('mailing_address') is-invalid @enderror" placeholder="Current Mailing Adress Street, Apt No / City / State / Zip" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                          <label for="inputAddress" class="form-label">Position Applied For</label>
                                             <div class="form-control-wrap">
                                                @if(!empty($positionData[0]['applicant_id']))
                                                <input disabled value="{{ $positionData[0]['position'] }}" type="text" class="form-control">
                                                @else
                                                <input disabled value="" type="text" class="form-control"> 
                                                @endif
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>1.	Have you ever been convicted of or are you the subject of pending charges for any of the following offenses: murder; malicious wounding by mob; abduction; abduction for immoral purposes; assault and bodily wounding; robbery; carjacking; extortion by threat; any felony stalking violation; sexual assault; arson; burglary; any felony violation relating to possession or distribution of drugs; drive by shooting; use of a machine gun in a crime of violence; aggressive use of a machine gun; use of a sawed-off shotgun in a crime of violence; pandering; crimes against nature involving children; incest; taking indecent liberties with children; abuse and neglect of children, including failing to secure medical attention for an injured child; obscenity offenses; possession of child pornography; electronic facilitation of pornography; abuse and neglect of incapacitated adults; employing or permitting a minor to assist in an act constituting an obscenity or related offence; delivery of drugs to prisoners; escape from jail; felonies by prisoners; within the Commonwealth or any equivalent offense outside the Commonwealth?</p>
                                                <div class="col-md-3">
                                                   <select onchange="Convicted();" id="convicted_outside_commonwealth" name="convicted_outside_commonwealth" class="form-select @error('convicted_outside_commonwealth') is-invalid @enderror">
                                                      <option value="">Select</option>
                                                      <option value="Yes (Convicted)" {{ old('convicted_outside_commonwealth') == 'Yes (Convicted)' ? 'selected' : '' }}>Yes (Convicted)</option>
                                                      <option value="Yes (Pending)" {{ old('convicted_outside_commonwealth') == 'Yes (Pending)' ? 'selected' : '' }}>Yes (Pending)</option>
                                                      <option value="No" {{ old('convicted_outside_commonwealth') == 'No' ? 'selected' : '' }}>No</option>
                                                   </select>
                                                </div>
                                            </div>
                                          </div>
                                       </div>
                                       <div id="outside_commonwealth_specify" style="display: none;" class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputZip" class="form-label">If Yes Specify Crimes</label>
                                             <div class="form-control-wrap">
                                             <textarea id="outside_commonwealth_specify" name="outside_commonwealth_specify" class="form-control @error('outside_commonwealth_specify') is-invalid @enderror" aria-label="With textarea">{{old('outside_commonwealth_specify')}}</textarea>
                                            </div>
                                          </div>
                                       </div>
                                       <script>
                                          function Convicted() {
                                             var selectBox = document.getElementById("convicted_outside_commonwealth");
                                             var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                                          
                                             var convictedField = document.getElementById("outside_commonwealth_specify");
                                             var convictedValue = convictedField.value;
                                          
                                             if (selectedValue == "Yes (Convicted)" || selectedValue == "Yes (Pending)") {
                                                document.getElementById("outside_commonwealth_specify").style.display = "block";
                                          
                                                if(!convictedValue.trim() === ""){
                                                      return true;
                                                }else{
                                                   return false;
                                                }
                                             } else {
                                                document.getElementById("outside_commonwealth_specify").style.display = "none";
                                                return true;
                                             }
                                          }
                                          window.addEventListener("load", Convicted);
                                       </script>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                          <label for="inputCity" class="form-label">2.	Have you been convicted of or are you the subject of a pending charge for any other felony in the five(5) years prior to the date of employment or volunteering?</label>
                                             <div class="form-control-wrap">
                                             <select onchange="Pending();" id="convicted_pending" name="convicted_pending" class="form-select @error('convicted_pending') is-invalid @enderror">
                                                      <option value="">Select</option>
                                                      <option value="Yes (Convicted)" {{ old('convicted_pending') == 'Yes (Convicted)' ? 'selected' : '' }}>Yes (Convicted)</option>
                                                      <option value="Yes (Pending)" {{ old('convicted_pending') == 'Yes (Pending)' ? 'selected' : '' }}>Yes (Pending)</option>
                                                      <option value="No" {{ old('convicted_pending') == 'No' ? 'selected' : '' }}>No</option>
                                                   </select>
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12" id="convicted_pending_specify" style="display:none">
                                          <div class="form-group">
                                             <label for="inputZip" class="form-label">If Yes, Specify Crime(s)</label>
                                             <div class="form-control-wrap">
                                             <textarea name="convicted_pending_specify" class="form-control @error('convicted_pending_specify') is-invalid @enderror" aria-label="With textarea">{{ old('convicted_pending_specify') }}</textarea>
                                            </div>
                                          </div>
                                       </div>

                                       <script>
                                          function Pending() {
                                             var selectBox = document.getElementById("convicted_pending");
                                             var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                                          
                                             var pendingField = document.getElementById("convicted_pending_specify");
                                             var pendingValue = pendingField.value;
                                          
                                             if (selectedValue == "Yes (Convicted)" || selectedValue == "Yes (Pending)") {
                                                document.getElementById("convicted_pending_specify").style.display = "block";
                                          
                                                if(!pendingValue.trim() === ""){
                                                      return true;
                                                }else{
                                                   return false;
                                                }
                                             } else {
                                                document.getElementById("convicted_pending_specify").style.display = "none";
                                                return true;
                                             }
                                          }
                                          window.addEventListener("load", Pending);
                                       </script>
                                       
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputState" class="form-label">3.	Have you ever been the subject of a founded complaint of child abuse or neglect within or outside the Commonwealth?</label>
                                             <div class="form-control-wrap">
                                                <select name="child_abuse" id="inputState" class="form-select @error('child_abuse') is-invalid @enderror">
                                                   <option value="">Choose...</option>
                                                   <option value="Yes" {{ old('child_abuse') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                   <option value="No" {{ old('child_abuse') == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Applicant Signature</label>
                                             <div class="form-control-wrap">
                                             <div class="flex-row">
                                                <div class="wrapper">
                                                   <canvas id="signature-pad" ></canvas>
                                                   <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                                                </div>
                                                <div class="clear-btn">
                                                   <button id="clear"><span>Clear</span></button>
                                                </div>
                                             </div>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Witnessed by</label>
                                             <div class="form-control-wrap">
                                             <div class="flex-row">
                                                <div class="wrapper">
                                                   <canvas id="wit-signature-pad"></canvas>
                                                   <textarea require style="display:none" name="wit_signature" id="wit-signature-input"></textarea>
                                                </div>
                                                <div class="clear-btn">
                                                   <button id="wit-clear"><span>Clear</span></button>
                                                </div>
                                             </div>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12"><button type="submit" class="btn btn-primary btn-lg">Submit</button></div>
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
        <!-- Include jQuery -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>

<!-- Include Bootstrap JS -->
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Include MetisMenu JS -->
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>

<!-- Include SimpleBar JS -->
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>

<!-- Include Waves JS -->
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<!-- Include App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>
