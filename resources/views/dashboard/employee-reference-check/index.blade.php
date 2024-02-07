
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Employee Reference Check - 1staccess Home Care</title>
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
                                            <li class="breadcrumb-item active">Employee Reference Check</li>
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
                                            <strong>Employee Reference Check</strong>
                                        </p>
                                    <br>
                                    <br>
                                    @if(!empty($empRefCheckData[0]['applicant_id']))
                                    <div class="row g-4">
                                          <div class="col-md-12">

                                          <p><strong>1st Access Home Care has my authorization to check my references.</strong></p>
                                             
                                             <p><strong>Employee Name: </strong>{{ucfirst($userProfileData[0]['full_name'])}}</p>

                                             <p>Employee Signature</p>
                                                <div class="form-control-wrap">
                                                   <img width="250" src="{{asset('storage/signature/' . $empRefCheckData[0]['signature'])}}">
                                                </div>

                                             <p>
                                                <span>Company Contacted: </span>{{ucfirst($empRefCheckData[0]['company_contacted'])}}</p>
                                             
                                             <p>Mr./Mrs. <span style="text-decoration: underline;">{{ucfirst($empRefCheckData[0]['employer_name'])}}</span> is checking employment with our company. It is our policy to ask for references prior to employment. Please complete this form for our records and sign below. We would greatly appreciate your assistance.</p>

                                             <p><strong>Please Verify Employment Dates</strong></p>
                                             <p><span>From: </span>{{Carbon\Carbon::parse($empRefCheckData[0]['from_date'])->format('M d, Y')}}</p>

                                             <p><span>To: </span>{{Carbon\Carbon::parse($empRefCheckData[0]['to_date'])->format('M d, Y')}}</p>

                                             <p>
                                                <span>Eligible For Hire?: </span>{{ucfirst($empRefCheckData[0]['eligible_for_hire'])}}</p>

                                             <p><strong>Comments</strong></p>
                                             <p>{{ucfirst($empRefCheckData[0]['comments'])}}</p>

                                             <p>
                                                <span>Information Was Received By: </span>{{ucfirst($empRefCheckData[0]['received_by'])}}</p>

                                             <p><span>Name of Company: </span>{{ucfirst($empRefCheckData[0]['name_of_company'])}}</p>

                                       @if($empRefCheckData[0]['received_by'] == 'Fax')
                                          <p>(IF FAXED)Company Contacted Signature</p>
                                          <img width="250" src="{{asset('storage/signature/' . $empRefCheckData[0]['company_signature'])}}">
                                       @endif
                                       <p><span>Date: </span>{{ \Carbon\Carbon::parse($empRefCheckData[0]['created_at'])->format('F d, Y') }}</
                                          </div>
                                          <div class="col-md-12">
                                          <div class="form-group">
                                                <label class="form-label">Signature of Agency Representative</label>
                                                <div class="form-control-wrap">
                                                <img width="250" src="{{asset('storage/signature/' . $empRefCheckData[0]['rep_signature'])}}">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                          <div class="form-group">
                                                <div class="form-control-wrap">
                                                   <p><span class="form-label">Agency Representative's Title: </span>{{ucfirst($empRefCheckData[0]['rep_title'])}}</p>
                                             </div>
                                             </div>
                                          </div>
                                    </div>
                                 @else
                                 <form action="{{route('employee-reference-check.store')}}" method="post" enctype="multipart/form-data" onsubmit="submitForm();" class="row g-4">
                                       @csrf
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="inputEmail4" class="form-label">Employee Name</label>
                                                <div class="form-control-wrap">
                                                   <input disabled value="{{ucfirst($userProfileData[0]['full_name'])}}" type="text" class="form-control" id="inputEmail4" autocomplete="off">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="inputPassword4" class="form-label">Employee Signature</label>
                                                <div class="form-control-wrap">
                                                <div class="flex-row">
                                                      <div class="wrapper">
                                                         <canvas title="@error('signature') This field is required @enderror" id="signature-pad" ></canvas>
                                                         <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                                                      </div>
                                                      <div class="clear-btn">
                                                         <button id="clear"><span>Clear</span></button>
                                                      </div>
                                                   </div>
                                             </div>
                                             @error('signature')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                                                   {{$message}}  
                                                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                             @endif
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="inputAddress" class="form-label">Company Contacted</label>
                                                <div class="form-control-wrap">
                                                   <input name="company_contacted" value="{{old('company_contacted')}}" type="text" class="form-control @error('company_contacted') is-invalid @enderror" autocomplete="off">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <p><strong>Mr. / Mrs.</strong></p>
                                             </div>
                                          </div>
                                          <div class="col-md-8">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                   <input title="@error('employer_name') This field is required @enderror" name="employer_name" value="{{old('employer_name')}}" type="text" class="form-control @error('employer_name') is-invalid @enderror" autocomplete="off">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <div class="form-control-wrap">
                                                   <p>is checking employment with our company. It is our policy to ask for references prior to employment. Please complete this form for our records and sign below. We would greatly appreciate your assistance.</p>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                             <h5>Please Verify Employment Dates</h5>
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                             <label for="inputCity" class="form-label">From</label>
                                                <div class="form-control-wrap">
                                                <input title="@error('from_date') This field is required @enderror" name="from_date" value="{{old('from_date')}}" type="date" class="form-control @error('from_date') is-invalid @enderror">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                             <label for="inputCity" class="form-label">To</label>
                                                <div class="form-control-wrap">
                                                <input title="@error('to_date') This field is required @enderror" name="to_date" value="{{old('to_date')}}" type="date" class="form-control @error('to_date') is-invalid @enderror">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="inputState" class="form-label">Eligible For Hire?</label>
                                                <div class="form-control-wrap">
                                                   <select title="@error('eligible_for_hire') This field is required @enderror" name="eligible_for_hire" class="form-select @error('eligible_for_hire') is-invalid @enderror">
                                                      <option value="">Choose...</option>
                                                      <option value="Yes" {{old('eligible_for_hire') == 'Yes' ? 'selected' : ''}}>Yes</option>
                                                      <option value="No" {{old('eligible_for_hire') == 'No' ? 'selected' : ''}}>No</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <div class="form-group">
                                                <label for="inputZip" class="form-label">Comments</label>
                                                <div class="form-control-wrap">
                                                <textarea title="@error('comments') This field is required @enderror" name="comments" class="form-control @error('comments') is-invalid @enderror" aria-label="With textarea">{{old('comments')}}</textarea>
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="inputState" class="form-label">Information Was Received By</label>
                                                <div class="form-control-wrap">
                                                   <select title="@error('received_by') This field is required @enderror" name="received_by" class="form-select  @error('received_by') is-invalid @enderror">
                                                      <option value="">Choose...</option>
                                                      <option value="Phone" {{old('received_by') == 'Phone' ? 'selected' : ''}}>Phone</option>
                                                      <option value="Mail" {{old('received_by') == 'Mail' ? 'selected' : ''}}>Mail</option>
                                                      <option value="Fax" {{old('received_by') == 'Fax' ? 'selected' : ''}}>Fax</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-8">
                                             <div class="form-group">
                                                <label for="inputZip" class="form-label">Name of Company</label>
                                                <div class="form-control-wrap">
                                                   <input title="@error('name_of_company') This field is required @enderror" name="name_of_company" value="{{old('name_of_company')}}" type="text" class="form-control @error('name_of_company') is-invalid @enderror" autocomplete="off">
                                             </div>
                                             </div>
                                          </div>
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="inputPassword4" class="form-label">(IF FAXED)Company Contacted Signature</label>
                                                <div class="form-control-wrap">
                                                <div class="flex-row">
                                                      <div class="wrapper">
                                                         <canvas id="company-signature-pad" ></canvas>
                                                         <textarea require style="display:none" name="company_signature" id="company-signature-input"></textarea>
                                                      </div>
                                                      <div class="clear-btn">
                                                         <button id="company-clear"><span>Clear</span></button>
                                                      </div>
                                                   </div>
                                             </div>
                                             @error('company_signature')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                                                   {{$message}}  
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                             @endif 
                                             </div>
                                          </div>
                                          
                                          <div class="col-md-6">
                                          <div class="form-group">
                                                <label for="inputZip" class="form-label">Signature of Agency Representative</label>
                                                <div class="form-control-wrap">
                                                   <div class="flex-row">
                                                      <div class="wrapper">
                                                         <canvas title="@error('rep_signature') This field is required @enderror" class="" id="rep-signature-pad"></canvas>
                                                         <textarea require style="display:none" name="rep_signature" id="rep-signature-input"></textarea>
                                                      </div>
                                                      <div class="clear-btn">
                                                         <button id="rep-clear"><span>Clear</span></button>
                                                      </div>
                                                   </div>
                                                </div>
                                                @error('rep_signature')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                                                   {{$message}}  
                                                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                @endif
                                             </div>
                                          </div>
                                          <div class="col-md-4">
                                             <div class="form-group">
                                                <label for="inputZip" class="form-label">Agency Representative's Title</label>
                                                <div class="form-control-wrap">
                                                   <input title="@error('rep_title') This field is required @enderror" name="rep_title" value="{{old('rep_title')}}" type="text" class="form-control @error('rep_title') is-invalid @enderror" autocomplete="off">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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

   // rep signature
   var rep_canvas = document.getElementById("rep-signature-pad");
   var repSignaturePad = new SignaturePad(rep_canvas);
   
   document.getElementById("rep-clear").addEventListener('click', function(event){
      event.preventDefault();
      repSignaturePad.clear();
   });

   // company signature
   var company_canvas = document.getElementById("company-signature-pad");
   var companySignaturePad = new SignaturePad(company_canvas);
   
   document.getElementById("company-clear").addEventListener('click', function(event){
      event.preventDefault();
      companySignaturePad.clear();
   });
   
   
   function submitForm() {
     if(!signaturePad.isEmpty()){
       document.getElementById('signature-input').value = signaturePad.toDataURL();
     }
     //rep signature
     if(!repSignaturePad.isEmpty()){
      document.getElementById('rep-signature-input').value = repSignaturePad.toDataURL();
     }

     //company signature
     if(!companySignaturePad.isEmpty()){
      document.getElementById('company-signature-input').value = companySignaturePad.toDataURL();
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
   canvas#signature-pad, #rep-signature-pad{
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }

   canvas#company-signature-pad {
   background: #fff;
   width: 100%;
   height: 100%;
   cursor: crosshair;
   }

   button#clear, #rep-clear, #company-clear {
   height: 100%;
   background: #4b00ff;
   border: 1px solid transparent;
   color: #fff;
   font-weight: 600;
   cursor: pointer;
   }

   button#clear span, #rep-clear span{
   transform: rotate(90deg);
   display: block;
   }

   button#company-clear span {
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
