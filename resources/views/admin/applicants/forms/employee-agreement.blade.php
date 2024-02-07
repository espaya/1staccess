
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
                                            <li class="breadcrumb-item active">Employment Agreement</li>
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
                                       <strong>Employment Agreement</strong>
                                    </p>
                                    @if(!empty($employee_agreement_data[0]['applicant_id']))
                                 <!-- <div class="row g-4"> -->
                                    <!-- <div class="col-md-12"> -->
                                          <p>1.	The employee will carry out the duties and responsibilities listed in the job description/list of assigned tasks ,and signed by employee and employer</p>
                                         	<p> 2. Following are the hours the employee will work:</p>
                                             <p style="padding-left: 20px;">Monday: {{ $employee_agreement_data[0]['monday_hour'] }} Hours<br>
                                                Tuesday: {{ $employee_agreement_data[0]['tuesday_hour'] }} Hours<br>
                                                Wednesday: {{ $employee_agreement_data[0]['wednesday_hour'] }} Hours<br>
                                                Thursday: {{ $employee_agreement_data[0]['thursday_hour'] }} Hours<br>
                                                Friday: {{ $employee_agreement_data[0]['friday_hour'] }} Hours<br>
                                                Saturday: {{ $employee_agreement_data[0]['saturday_hour'] }} Hours<br>
                                                Sunday: {{ $employee_agreement_data[0]['sunday_hour'] }} Hours
                                          </p>
                                          <p>3. The employee will have the following time off: {{ $employee_agreement_data[0]['time_off'] }}</p>
                                          <p>4.	The employer will pay the employee per hour: ${{ number_format($employee_agreement_data[0]['pay_per_hour'], 2, '.', ',') }}</p>
                                          <p>5.	When leaving the employee will give the approximate time of return, and if possible, leave a phone number where he/she can reach. Also, when the employee will be late in returning, he/she will call to let the employer know.</p>
                                          <p>6.	The employee is responsible for paying for long-distance telephone calls made/received by the employee.</p>
                                          <p>7.	The employee will not be paid for scheduled hours not worked unless the time not worked is covered by a benefit as provided by the employer.</p>
                                          <p>8.	Both parties to this agreement will respect each other’s individuality and treat each other accordingly. Both will attempt to be flexible and work at solving problems as they arise.</p>
                                          <p> 9. At least 2 weeks’ notice will be given by the employee regarding termination of this agreement.</p>
                                          <p>Other agreements/benefits: {{ $employee_agreement_data[0]['other_agreements'] }}</p>

                                          <p>Employee Signature:</p>
                                          <img width="250" src="{{asset('storage/signature/' . $employee_agreement_data[0]['signature'])}}">
                                          <p>Date:</p>
                                          <p>{{ \Carbon\Carbon::parse($employee_agreement_data[0]['created_at'])->format('M d, Y')}}</p>
                                          @if(!empty($employee_agreement_data[0]['employer_signature']))
                                             <p>Employer Signature:</p>
                                                <div class="form-control-wrap">
                                                   <img width="250" src="{{asset('storage/signature/' . $employee_agreement_data[0]['employer_signature'])}}">
                                             </div> 
                                          @else
                                             <form action="{{ route('submit-employee-agreement', ['applicant_id' => $applicant_id, 'id' => $id]) }}" method="post" enctype="multipart/form-data" onsubmit="submitForm();">
                                                <!-- Employer Signature -->
                                                @csrf 
                                                <div class="row d-flex align-items-center justify-content-center">
                                                   <div class="col-md-12">
                                                      <div class="mb-3">
                                                         <label class="form-label">Employer Signature</label> <br>
                                                         <div class="flex-row">
                                                            <div class="wrapper">
                                                               <canvas id="signature-pad"></canvas>
                                                               <textarea require style="display:none" name="employer_signature" id="signature-input"></textarea>
                                                            </div>
                                                            <div class="clear-btn">
                                                               <button id="clear"><span>Clear</span></button>
                                                            </div>
                                                         </div>
                                                         @error('employer_signature')
                                                            <p class="alert alert-danger"> {{ $message }} </p>
                                                         @enderror
                                                      </div>
                                                      <div>
                                                         <button name="submit" type="submit" class="btn btn-primary w-md">Submit</button>
                                                      </div>
                                                   </div>
                                                </div>
                                             </form>
                                          @endif
                                       </div>
                                       
                                       @endif
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
