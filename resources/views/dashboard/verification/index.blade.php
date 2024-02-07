
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Verification of Professional License - 1staccess Homecare Inc</title>
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

                                    <img width="30%" src="{{ asset('images/1staccess.png') }}" style="margin-left:220px;">
                                    <p class="mb-sm-0 font-size-18" style="font-size: 14; text-align: center;">
                                    <strong>1st Access Home Care Incorporated</strong>
                                    </p>
                                    <p style="text-align: center; font-size: 11;">
                                        6600 Fieldtan Trail, Moseley, VA, 23120<br>Agency Phone: 804.818.3216
                                    </p>
                                    <p class="mb-sm-0 font-size-18" style="font-size: 11; text-align: center;">
                                        <strong>Verification of Professional License</strong>
                                    </p><br>
                                        <br>

                                    <p>Employee Name: <u>{{ ucfirst($profileData[0]['full_name']) }}</u> </p>
                                   <br>
                              @if(!empty($verificationData[0]['applicant_id']))
                                 <div class="row g-4">
                                       <div class="col-md-12">
                                       <div class="form-group">
                                          <div class="form-check form-check-inline">
                                             <p><span class="form-label">Check Off Discipline Needing Verification: </span>{{implode(', ', explode(',', $verificationData[0]['disciplines']))}}</p>
                                          </div>
                                       </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">License Number: </span>{{$verificationData[0]['licenseNumber']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">Expiration Date Of License: </span>{{Carbon\Carbon::parse($verificationData[0]['expirationDate'])->format('M d, Y')}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p><span class="form-label">Date Verified: </span>{{Carbon\Carbon::parse($verificationData[0]['dateVerified'])->format('M d, Y')}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">License Verified By: </span>{{ucfirst($verificationData[0]['licenseVerifiedBy'])}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">Action Outstanding:</span> {{$verificationData[0]['actionOutstanding']}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">Comments: </span>{{$verificationData[0]['comments']}}</p>
                                             </div>
                                          </div>
                                       </div><br>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Signature of Agency Representative</label>
                                             <div class="form-control-wrap">
                                                <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $verificationData[0]['signature'] ) }}">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p><span class="form-label">Date: </span>{{Carbon\Carbon::parse($verificationData[0]['created_at'])->format('M d, Y')}}</p> 
                                             </div>
                                          </div>
                                       </div>
                                    </div>   
                            @else
                            <form action="{{ route('verification.store') }}" method="post" enctype="multipart/form-data" onsubmit="submitForm();" class="row g-4">
                                    @csrf
                                       <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="inputPassword4" class="form-label">Check Off Discipline Needing Verification</label><br>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input @error('disciplines') is-invalid @enderror" type="checkbox" id="checkboxRN" name="disciplines[]" value="RN" {{ old('disciplines') && in_array('RN', old('disciplines')) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="checkboxRN">RN</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input @error('disciplines') is-invalid @enderror" type="checkbox" id="checkboxLPN" name="disciplines[]" value="LPN" {{ old('disciplines') && in_array('LPN', old('disciplines')) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="checkboxLPN">LPN</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input @error('disciplines') is-invalid @enderror" type="checkbox" id="checkboxHHA" name="disciplines[]" value="HHA" {{ old('disciplines') && in_array('HHA', old('disciplines')) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="checkboxHHA">HHA</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                             <input class="form-check-input @error('disciplines') is-invalid @enderror" type="checkbox" id="checkboxCNA" name="disciplines[]" value="CNA" {{ old('disciplines') && in_array('CNA', old('disciplines')) ? 'checked' : '' }}>
                                             <label class="form-check-label" for="checkboxCNA">CNA</label>
                                          </div>
                                          
                                       </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">License Number</label>
                                             <div class="form-control-wrap">
                                                <input name="licenseNumber" value="{{ old('licenseNumber') }}" type="text" class="form-control @error('licenseNumber') is-invalid @enderror" autocomplete="off">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Expiration Date Of License</label>
                                             <div class="form-control-wrap">
                                                <input name="expirationDate" value="{{old('expirationDate')}}" type="date" class="form-control @error('expirationDate') is-invalid @enderror" autocomplete="off">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Date Verified</label>
                                             <div class="form-control-wrap">
                                                <input name="dateVerified" value="{{old('dateVerified')}}" type="date" class="form-control @error('dateVerified') is-invalid @enderror" autocomplete="off">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">License Verified By</label>
                                             <div class="form-control-wrap">
                                                <select name="licenseVerifiedBy" class="form-select @error('licenseVerifiedBy') is-invalid @enderror">
                                                   <option value="">Choose...</option>
                                                   <option value="written" {{ old('licenseVerifiedBy') == 'written' ? 'selected' : '' }}>Written</option>
                                                   <option value="phone" {{ old('licenseVerifiedBy') == 'phone' ? 'selected' : '' }}>Phone</option>
                                                   <option value="fax" {{ old('licenseVerifiedBy') == 'fax' ? 'selected' : '' }}>Fax</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Action Outstanding</label>
                                             <div class="form-control-wrap">
                                                <select name="actionOutstanding" class="form-select @error('actionOutstanding') is-invalid @enderror" id="inputAddress">
                                                   <option value="">Choose...</option>
                                                   <option value="Yes" {{ old('actionOutstanding') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                                   <option value="No" {{ old('actionOutstanding') == 'No' ? 'selected' : '' }}>No</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="textarea" class="form-label">Comments</label>
                                             <div class="form-control-wrap">
                                                <textarea name="comments" class="form-control @error('comments') is-invalid @enderror" id="textarea">{{old('comments')}}</textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-8">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Signature of Agency Representative</label>
                                             <div class="form-control-wrap">
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
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                                <input disabled value="<?php echo date('M d, Y'); ?>" type="text" class="form-control">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12"><button type="submit" class="btn btn-primary btn-lg">Submit</button></div>
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
