
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
                                            <li class="breadcrumb-item active">Sexual Harassment</li>
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
                                    <h4 class="mb-sm-0 font-size-18">Sexual Harassment</h4><br>
                                 <p><strong>Name of Employee:</strong> <u>{{ ucfirst($profileData->full_name) }}</u></p>
                                 
                                 <div>
                                 <p>1st Access Home Care does not tolerate <strong>Sexual Harassment,</strong> as it is a form of gender-based discrimination.</p>
                                 <p>
                                 <strong>Definition:</strong><br>
                                 Under Title VII of the Civil Rights Act of 1964, any type of discrimination based on an individual’s gender (male / female) is illegal. Sexual harassment is considered to be a form of gender discrimination. According to the Equal Employment Opportunity Commission sexual harassment is “unwelcome sexual advances, request for sexual favors, and other verbal or physical conduct of a sexual nature when submission to the conduct enters into employment decisions and/or the conduct unreasonably interferes with an individual’s work performance or creates an intimidating, hostile, or offensive working environment.”
                                 </p>
                                 <p>
                                 The Agency will not tolerate any form of sexual harassment from any of its employees. 
                                 The Agency encourages that any behavior which could be construed as sexual harassment be reported immediately to the Supervisor and/or Administrator. There is no need to fear retaliation. Both females and males can be sexually harassed when exposed to unwelcome sexual advances or to a pattern of verbal abuse, threatening, crude, impolite, or unprofessional conduct.<br>
                                 </p>
                                 <p style="padding-left: 30px;">
                                 ●	Quid pro quo sexual harassment is also against company policy.<br>
                                 ●	The Agency encourages and urges an employee to come forward and discuss any sexual harassment that may have occured with an Administrator.<br>
                                 ●	Every complaint will be taken seriously and investigated immediately. 
                                 Investigations will be documented.<br>
                                 ●	Any employee involved in a sexual harassment complaint will have a full opportunity to give a full account of their recollection of the incident or incidents.<br>
                                 ●	The incident(s)  will be investigated thoroughly and appropriate action will be taken.
                                 </p>
                              </div> <br>
                                    
                              @if(!empty($sexual_harassment_data[0]['applicant_id']))
                              <div class="row g-4">
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                             <img width="250" class="img-fluid" src="{{ asset('storage/signature/' . $sexual_harassment_data[0]['signature']) }}">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                             <p>
                                             <span class="form-label">Date: </span>{{ \Carbon\Carbon::parse($sexual_harassment_data[0]['created_at'])->format('M d, Y')}}</p>
                                            </div>
                                          </div>
                                       </div>
                                    </div>   
                            @else
                            <form onsubmit="submitForm();" action="{{ route('sexual-harassment.store') }}" method="post" enctype="multipart/form-data" class="row g-4">
                                    @csrf
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Signature</label>
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
                                             <label for="inputPassword4" class="form-label">Date</label>
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
        @iinclude('templates/admin/foot')

    </body>
</html>
