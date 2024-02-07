
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <title>Profile |  1staccess Home Care</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="1staccess job application portal" name="description">
        <meta content="1staccess Home Care" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Include Icons CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">

<!-- Include App CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    </head>

    <body data-sidebar="dark" data-layout-mode="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('templates/dashboard/header')

            @include('templates/dashboard/sidebar')
            <div class="success-alert"></div>
            <div class="danger-alert"></div>
            
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mx-n4 mt-n4 bg-info bg-soft">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            @if(!empty($profileData[0]['user_avatar']))
                                                <img src="{{asset('storage/avatars/' . $profileData[0]['user_avatar'])}}" alt="" class="avatar-md rounded-circle mx-auto d-block">
                                            @else
                                                <img src="{{asset('images/avatar/avatar-placeholder.jpg')}}" alt="" class="avatar-md rounded-circle mx-auto d-block">
                                            @endif
                                            <h5 class="mt-3 mb-1">
                                                @if(!empty($profileData[0]['full_name']))
                                                    {{ ucfirst($profileData[0]['full_name']) }}
                                                @endif
                                            </h5>
                                            <p class="text-muted mb-3">
                                                @if(!empty($positionData[0]['position']))
                                                    {{ ucfirst($positionData[0]['position']) }}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <ul class="list-unstyled hstack gap-3 mb-0 flex-grow-1">
                                                <li>
                                                    <i class="bx bx-map align-middle"></i> {{ $permanentAddressData[0]['permanent_address'] . ', ' . $permanentAddressData[0]['permanent_city'] . ', ' . $permanentAddressData[0]['permanent_state'] . ', ' . $permanentAddressData[0]['permanent_zip'] }}
                                                </li>
                                                <li>
                                                    @if(!empty($empAgreementData[0]['pay_per_hour']) && isset($empAgreementData[0]['pay_per_hour']))
                                                    <i class="bx bx-money align-middle"></i> 
                                                    ${{ number_format($empAgreementData[0]['pay_per_hour'], 2, '.', ',') }} / hrs
                                                    @endif
                                                </li>
                                                <li>
                                                    @if(!empty($empAgreementData[0]['working_days']))
                                                    <i class="bx bx-time align-middle"></i> 
                                                    {{ $empAgreementData[0]['working_days'] }} days working
                                                    @endif
                                                </li>
                                            </ul>
                                            <div class="hstack gap-2">
                                                <button type="button" class="btn btn-primary">Download CV <i class='bx bx-download align-baseline ms-1'></i></button>
                                                <button type="button" class="btn btn-light"><i class='bx bx-bookmark align-baseline'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">    
                                {{session('success')}}   
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @error('avatar')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                                {{ $message }}   
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                        @if(session('request_delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">    
                                {{session('request_delete')}}   
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @error('your_password')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">    
                                {{ $message }}   
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                        <div class="row"> 
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                    @include('templates/dashboard/profile_updates')
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                    </div> <!-- container-fluid -->
                </div><!-- End Page-content -->
                
                @include('templates/dashboard/footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

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

