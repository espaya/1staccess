
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
        @vite(['resources/css/bootstrap.min.css', 'resources/css/icons.min.css', 'resources/css/app.min.css', 'resources/libs/dropzone/min/dropzone.min.css'])

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
                                            <h5 class="mt-3 mb-1">{{ ucfirst($profileData[0]['full_name']) }}</h5>
                                            <p class="text-muted mb-3">{{ ucfirst($positionData[0]['position']) }}</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <ul class="list-unstyled hstack gap-3 mb-0 flex-grow-1">
                                                <li>
                                                    <i class="bx bx-map align-middle"></i> {{ $permanentAddressData[0]['permanent_address'] . ', ' . $permanentAddressData[0]['permanent_city'] . ', ' . $permanentAddressData[0]['permanent_state'] . ', ' . $permanentAddressData[0]['permanent_zip'] }}
                                                </li>
                                                <li>
                                                    <i class="bx bx-money align-middle"></i> ${{ number_format($empAgreementData[0]['pay_per_hour'], 2, '.', ',') }} / hrs
                                                </li>
                                                <li>
                                                    <i class="bx bx-time align-middle"></i> {{ $empAgreementData[0]['working_days'] }} days working
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
                            <div class="col-lg-4">
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
      @vite(['resources/libs/jquery/jquery.min.js', 
      'resources/libs/bootstrap/js/bootstrap.bundle.min.js', 
      'resources/libs/metismenu/metisMenu.min.js', 
      'resources/libs/simplebar/simplebar.min.js', 
      'resources/libs/node-waves/waves.min.js',  
      'resources/js/app.js', 'resources/libs/dropzone/min/dropzone.min.js'])

    </body>
</html> 

