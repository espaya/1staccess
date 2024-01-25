
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
                                    <h4 class="mb-sm-0 font-size-18">Employment Agreement</h4><br>
                                    @if(!empty($employee_agreement_data[0]['applicant_id']))
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
                                             <p style="padding-left: 20px;">Monday: {{ $employee_agreement_data[0]['monday_hour'] }} Hours<br>
                                                Tuesday: {{ $employee_agreement_data[0]['tuesday_hour'] }} Hours<br>
                                                Wednesday: {{ $employee_agreement_data[0]['wednesday_hour'] }} Hours<br>
                                                Thursday: {{ $employee_agreement_data[0]['thursday_hour'] }} Hours<br>
                                                Friday: {{ $employee_agreement_data[0]['friday_hour'] }} Hours<br>
                                                Saturday: {{ $employee_agreement_data[0]['saturday_hour'] }} Hours<br>
                                                Sunday: {{ $employee_agreement_data[0]['sunday_hour'] }} Hours
                                                </p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label"> 3.	The employee will have the following time off: {{ $employee_agreement_data[0]['time_off'] }}</label>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">4.	The employer will pay the employee per hour: ${{ number_format($employee_agreement_data[0]['pay_per_hour'], 2, '.', ',') }}</label>
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
                                             <label for="inputZip" class="form-label">Other agreements/benefits: {{ $employee_agreement_data[0]['other_agreements'] }}</label>
                                          </div>
                                       </div>

                                       <div class="col-12">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Employee Signature:</label>
                                             <div class="form-control-wrap">
                                                <img width="250" src="{{asset('storage/signature/' . $employee_agreement_data[0]['signature'])}}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Date:</label>
                                             <div class="form-control-wrap">
                                             <p>{{ \Carbon\Carbon::parse($employee_agreement_data[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                          @if(!empty($employee_agreement_data[0]['employer_signature']))
                                          <div class="col-12">
                                             <div class="form-group">
                                                   <label for="inputZip" class="form-label">Employer Signature:</label>
                                                   <div class="form-control-wrap">
                                                      <img width="250" src="{{asset('storage/signature/' . $employee_agreement_data[0]['employer_signature'])}}">
                                                </div>
                                                </div>
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
