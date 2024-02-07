
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Employee Agreement - 1staccess Home Care</title>
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
                            @error('dateOfOrientation')
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
                                            <li class="breadcrumb-item active">Employee Agreement</li>
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
                                        <strong>Employee Agreement</strong>
                                    </p><br>
                                        <br>
                                    <p>Employee Name: <u>{{ ucfirst($profileData[0]['full_name']) }}</u> </p>
                                   
                                    @if(!empty($agreeData[0]['applicant_id']))
                                 <div class="row g-4">
                                    <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             1.	The employee will carry out the duties and responsibilities listed in the job description/list of assigned tasks ,and signed by employee and employer
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             2.	Following are the hours the employee will work: <br>
                                             <p style="padding-left: 20px;">Monday: {{ $agreeData[0]['monday_hour'] }} Hours<br>
                                                Tuesday: {{ $agreeData[0]['tuesday_hour'] }} Hours<br>
                                                Wednesday: {{ $agreeData[0]['wednesday_hour'] }} Hours<br>
                                                Thursday: {{ $agreeData[0]['thursday_hour'] }} Hours<br>
                                                Friday: {{ $agreeData[0]['friday_hour'] }} Hours<br>
                                                Saturday: {{ $agreeData[0]['saturday_hour'] }} Hours<br>
                                                Sunday: {{ $agreeData[0]['sunday_hour'] }} Hours
                                                </p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label"> 3.	The employee will have the following time off:</label>
                                             <div class="form-control-wrap">
                                             <p>{{ $agreeData[0]['time_off'] }}</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">4.	The employer will pay the employee per hour.</label>
                                             <div class="form-control-wrap">
                                             <p>${{ number_format($agreeData[0]['pay_per_hour'], 2, '.', ',') }}</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             5.	When leaving the employee will give the approximate time of return, and if possible, leave a phone number where he/she can reach.<br> Also, when the employee will be late in returning, he/she will call to let the employer know.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             6.	The employee is responsible for paying for long-distance telephone calls made/received by the employee.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             7.	The employee will not be paid for scheduled hours not worked unless the time not worked is covered by a benefit as provided by the employer.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             8.	Both parties to this agreement will respect each other’s individuality and treat each other accordingly. Both will attempt to be flexible and work at solving problems as they arise.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             9.	At least 2 weeks’ notice will be given by the employee regarding termination of this agreement.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Other agreements/benefits:</label>
                                             <div class="form-control-wrap">
                                             <p>{{ $agreeData[0]['other_agreements'] }}</p>
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Employee Signature:</label>
                                             <div class="form-control-wrap">
                                                <img width="250" src="{{asset('storage/signature/' . $agreeData[0]['signature'])}}">
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-4">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Date:</label>
                                             <div class="form-control-wrap">
                                             <p>{{ \Carbon\Carbon::parse($agreeData[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                 </div>
                                
                                        </div>
                                        @else
                                        <form onsubmit="submitForm();" action="{{ route('employee-agreement.store') }}" method="post" enctype="multipart/form-data" class="row g-4">
                                       @csrf
                                    <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             1.	The employee will carry out the duties and responsibilities listed in the job description/list of assigned tasks ,and signed by employee and employer
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             2.	Following are the hours the employee will work: 
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Monday</label>
                                             <div class="form-control-wrap">
                                                <input name="monday_hour" value="{{ old('monday_hour') }}" type="number" class="form-control @error('monday_hour') is-invalid @enderror" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Tuesday</label>
                                             <div class="form-control-wrap">
                                                <input name="tuesday_hour" value="{{ old('tuesday_hour') }}" type="number" class="form-control @error('tuesday_hour') is-invalid @enderror" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Wednesday</label>
                                             <div class="form-control-wrap">
                                                <input name="wednesday_hour" value="{{ old('wednesday_hour') }}" type="number" class="form-control @error('wednesday_hour') is-invalid @enderror" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Thursday</label>
                                             <div class="form-control-wrap">
                                                <input name="thursday_hour" value="{{ old('thursday_hour') }}" type="number" class="form-control @error('thursday_hour') is-invalid @enderror" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Friday</label>
                                             <div class="form-control-wrap">
                                                <input name="friday_hour" value="{{ old('friday_hour') }}" type="number" class="form-control @error('friday_hour') is-invalid @enderror" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Saturday</label>
                                             <div class="form-control-wrap">
                                                <input name="saturday_hour" value="{{ old('saturday_hour') }}" type="number" class="form-control @error('saturday_hour') is-invalid @enderror" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Sunday</label>
                                             <div class="form-control-wrap">
                                                <input name="sunday_hour" value="{{ old('sunday_hour') }}" type="number" class="form-control @error('sunday_hour') is-invalid @enderror" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label"> 3.	The employee will have the following time off:</label>
                                             <div class="form-control-wrap">
                                                <input name="time_off" value="{{ old('time_off') }}" type="text" class="form-control @error('time_off') is-invalid @enderror">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">4.	The employer will pay the employee per hour.</label>
                                             <div class="form-control-wrap">
                                                <input name="pay_per_hour" value="{{ old('pay_per_hour') }}" type="number" class="form-control @error('pay_per_hour') is-invalid @enderror">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             5.	When leaving the employee will give the approximate time of return, and if possible, leave a phone number where he/she can reach.<br> Also, when the employee will be late in returning, he/she will call to let the employer know.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             6.	The employee is responsible for paying for long-distance telephone calls made/received by the employee.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             7.	The employee will not be paid for scheduled hours not worked unless the time not worked is covered by a benefit as provided by the employer.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             8.	Both parties to this agreement will respect each other’s individuality and treat each other accordingly. Both will attempt to be flexible and work at solving problems as they arise.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             9.	At least 2 weeks’ notice will be given by the employee regarding termination of this agreement.
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Other agreements/benefits:</label>
                                             <div class="form-control-wrap">
                                                <input name="other_agreements" value="{{ old('other_agreements') }}" type="text" class="form-control @error('other_agreements') is-invalid @enderror">
                                            </div>
                                          </div>
                                       </div>

                                       <div class="col-md-8">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Employee Signature:</label>
                                             <div class="form-control-wrap">
                                             <div class="flex-row">
                                                   <div class="wrapper">
                                                      <canvas id="signature-pad" width="800" height="400"></canvas>
                                                      <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                                                   </div>
                                                   <div class="clear-btn">
                                                      <button id="clear"><span>Clear</span></button>
                                                   </div>
                                                </div>
                                            </div>
                                            @error('signature')
                                             <p class="alert alert-danger"> {{ $message }} </p>
                                            @enderror
                                          </div>
                                       </div>

                                       <div class="col-md-4">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Date:</label>
                                             <div class="form-control-wrap">
                                                <input disabled value="<?php echo date('M d, Y') ?>" type="text" class="form-control" id="inputZip">
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
