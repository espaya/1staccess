
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
                                        <strong>Criminal History Search Consent Form</strong>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                            <p>Name: 
                                                <span style="text-decoration: underline;">
                                                    @if(!empty($profileData)) {{$profileData->full_name}} @endif
                                                </span>
                                                <span style="margin-left: 200px;">Date: 
                                                    @if(!empty($criminal_history_search_data[0]['created_at']))
                                                    {{ \Carbon\Carbon::parse($criminal_history_search_data[0]['created_at'])->format('M d, Y')}}
                                                @endif
                                                </span>
                                            </p>
                                            <p>I, <span style="text-decoration: underline !important;">@if(!empty($profileData)) ({{ ucfirst($profileData->full_name) }}) @endif</span> have had no prior convictions of an offense described in the  <strong>Health and Safety Code</strong> which would bar or potentially bar employment as listed below:</p>
                                            <ul>
                                                <li><strong>CRIMINAL HOMICIDE</strong></li>
                                                <li><strong>INDECENCY WITH A CHILD</strong></li>
                                                <li><strong>SOLICITATION OF A CHILD</strong></li>
                                                <li><strong>ARSON</strong></li>
                                                <li><strong>AGGRAVATED ROBBERY</strong></li>
                                                <li><strong>BURGLARY AND CRIMINAL TRESPASS</strong></li>
                                                <li><strong>WEAPONS</strong></li>
                                                <li><strong>PUBLIC LEWDNESS</strong></li>
                                                <li><strong>PUBLIC INDECENCY</strong></li>
                                                <li><strong>KIDNAPPING AND FALSE IMPRISONMENT</strong></li>
                                                <li><strong>AGREEMENT TO ABDUCT FROM CUSTODY</strong></li>
                                                <li><strong>SALE OR PURCHASE OF A CHILD</strong></li>
                                                <li><strong>ROBBERY</strong></li>
                                                <li><strong>ASSAULTIVE OFFENSES</strong></li>
                                                <li><strong>THEFT</strong></li>
                                                <li><strong>FRAUD</strong></li>
                                                <li><strong>INDECENT EXPOSURE</strong></li>
                                                <li><strong>A FELONY VIOLATION OF A STATUTE</strong></li>
                                                <li><strong>INTENDED TO CONTROL THE POSSESSION OR DISTRIBUTION OF AN ILLEGAL SUBSTANCE</strong></li>
                                            </ul>
                                            <p><strong>
                                            I UNDERSTAND THAT THE HOME HEALTH AGENCY IS REQUIRED TO CONDUCT A CRIMINAL HISTORY CHECK BEFORE OFFERING ME EMPLOYMENT. I, THE UNDERSIGNING, HEREBY AUTHORIZE THIS AGENCY TO CONDUCT AND VERIFY MY CRIMINAL HISTORY BY PERFORMING A CRIMINAL HISTORY CHECK.</strong>
                                            </p>
                                            <p>Signature of Emplooyee <br>
                                                <img width="250"  src="{{asset('storage/signature/' . $criminal_history_search_data[0]['signature'])}}">
                                            </p>
                                        <p>Date Signed</p>
                                        <p>{{ \Carbon\Carbon::parse($criminal_history_search_data[0]['created_at'])->format('M d, Y')}}</p>
                                          
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
