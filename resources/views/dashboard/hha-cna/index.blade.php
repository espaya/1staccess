<?php
   use Illuminate\Support\Facades\Auth;
   
   $user = Auth::id(); // id of authenticated user
   
   if (!Auth::check()) {
       // The user is not logged in, so redirect to the homepage
       return view('/');
   }
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="author" content="Softnio">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
      <script src="http://code.jquery.com/jquery.min.js"></script>
      <script src="http://code.jquery.com/ui/1.8.17/jquery-ui.min.js"></script>
      <title>Home Health Aide & Certified Nursing Assistant - First Access Homecare Inc</title>
      <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
          <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Include Icons CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">

<!-- Include App CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
   </head>
   <body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
      <div class="nk-app-root">
         <div class="nk-main">
            <div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
               <div class="nk-sidebar-element nk-sidebar-head">
                  <div class="nk-sidebar-brand">
                     <a href="{{ url('/dashboard/') }}" class="logo-link">
                        <div class="logo-wrap">
                            <img src="{{asset('images/1staccess.png')}}" width="300" height="50">
                        </div>
                     </a>
                     <div class="nk-compact-toggle me-n1">
                        <button class="btn btn-md btn-icon text-light btn-no-hover compact-toggle">
                        <em class="icon off ni ni-chevrons-left"></em><em class="icon on ni ni-chevrons-right"></em>
                        </button>
                     </div>
                     <div class="nk-sidebar-toggle me-n1">
                        <button class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle">
                        <em class="icon ni ni-arrow-left"></em>
                        </button>
                     </div>
                  </div>
               </div>
               @include('templates/dashboard/sidebar')
            </div>
            <div class="nk-wrap">
               <div class="nk-header nk-header-fixed">
                  <div class="container-fluid">
                     <div class="nk-header-wrap">
                        <div class="nk-header-logo ms-n1">
                           <div class="nk-sidebar-toggle"><button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none"><em class="icon ni ni-menu"></em></button><button class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu"></em></button></div>
                           <div class="nk-navbar-toggle me-2"><button class="btn btn-sm btn-icon btn-zoom navbar-toggle d-sm-none"><em class="icon ni ni-menu-right"></em></button><button class="btn btn-md btn-icon btn-zoom navbar-toggle d-none d-sm-inline-flex"><em class="icon ni ni-menu-right"></em></button></div>
                           <a href="{{url('/dashboard/')}}" class="logo-link">
                              <!-- <div class="logo-wrap"> -->
                              <img src="{{asset('images/1staccess.png')}}" width="150" height="37.5">
                                 <!-- </div> -->
                           </a>
                        </div>
                        @include('templates/dashboard/nav')
                        @include('templates/dashboard/header_tools')
                     </div>
                  </div>
               </div>
               <div class="nk-content">
                  <div class="container">
                     <div class="nk-content-inner">
                        <div class="nk-content-body">
                           <div class="nk-block">
                              <div class="nk-block-head">
                                 <div class="nk-block-head-content wide-md">
                                    <h3 class="nk-block-title">HOME HEALTH AIDE AND CERTIFIED NURSING ASSISTANT</h3>
                                 </div>
                              </div>
                              <div class="card">
                                 <div class="card-body">
                                    <form class="row g-4">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputEmail4" class="form-label">Employee Name</label>
                                             <div class="form-control-wrap">
                                                <input name="employeeName" value="" type="text" class="form-control" id="inputEmail4" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="inputPassword4" class="form-label">Employee Signature</label>
                                             <div class="form-control-wrap">
                                                <input name="employeePassword" value="" type="text" class="form-control" id="inputPassword4" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <label for="inputAddress" class="form-label">Company Contacted</label>
                                             <div class="form-control-wrap">
                                                <input name="companyContacted" value="" type="text" class="form-control" id="inputAddress" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                             <p><strong>Mr. / Mrs.</strong></p>
                                          </div>
                                       </div>
                                       <div class="col-8">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <input name="companyContacted" value="" type="text" class="form-control" id="inputAddress" autocomplete="off">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                             <div class="form-control-wrap">
                                                <p>is checking employment with our company. It is our policy to ask for references prior to employment. Please complete this form for our records and sign below. We would greatly appreciate your assistance.</p>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12">
                                          <div class="form-group">
                                          <h5>Please Verify Employment Dates</h5>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                          <label for="inputCity" class="form-label">From</label>
                                             <div class="form-control-wrap">
                                             <input type="date" class="form-control" id="inputCity">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                          <div class="form-group">
                                          <label for="inputCity" class="form-label">To</label>
                                             <div class="form-control-wrap">
                                             <input type="date" class="form-control" id="inputCity">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputState" class="form-label">Eligible For Hire?</label>
                                             <div class="form-control-wrap">
                                                <select id="inputState" class="form-select">
                                                   <option selected="">Choose...</option>
                                                   <option value="Yes">Yes</option>
                                                   <option value="No">No</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputZip" class="form-label">Comments</label>
                                             <div class="form-control-wrap">
                                             <textarea class="form-control" aria-label="With textarea"></textarea>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label for="inputState" class="form-label">Information Was Received By</label>
                                             <div class="form-control-wrap">
                                                <select id="inputState" class="form-select">
                                                   <option selected="">Choose...</option>
                                                   <option>Phone</option>
                                                   <option>Mail</option>
                                                   <option>Fax</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-8">
                                          <div class="form-group">
                                             <label for="inputZip" class="form-label">Name of Company</label>
                                             <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="inputZip">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="inputZip" class="form-label">(If Faxed) Company Contact Signature</label>
                                             <div class="form-control-wrap">
                                                <input disabled type="text" class="form-control" id="inputZip">
                                            </div>
                                          </div>
                                       </div>
                                       
                                       <div class="col-4">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Signature of Agency Representative & Title</label>
                                             <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="inputZip" disabled>
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-4">
                                       <div class="form-group">
                                             <label for="inputZip" class="form-label">Date</label>
                                             <div class="form-control-wrap">
                                                <input type="date" class="form-control" id="inputZip">
                                            </div>
                                          </div>
                                       </div>
                                       <div class="col-12"><button type="submit" class="btn btn-primary btn-lg">Submit</button></div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @include('templates/dashboard/footer')
         </div>
      </div>
      </div>
   </body>
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
</html>