
<!doctype html>
<html lang="en">

    @include('templates/admin/head')

    <body data-sidebar="dark" data-layout-mode="light">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('templates/admin/header')

            @include('templates/admin/sidebar')
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
                                            @if(!empty($adminAccount['admin_avatar']))
                                                <img src="{{asset('storage/avatars/' . $adminAccount['admin_avatar'])}}" alt="" class="avatar-md rounded-circle mx-auto d-block">
                                            @else
                                                <img src="{{asset('images/avatar/avatar-placeholder.jpg')}}" alt="" class="avatar-md rounded-circle mx-auto d-block">
                                            @endif
                                            <h5 class="mt-3 mb-1"></h5>
                                            <p class="text-muted mb-3"></p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <ul class="list-unstyled hstack gap-3 mb-0 flex-grow-1">
                                                @if(!empty($adminAccount['admin_fullname']))
                                                <li>
                                                    <i class="bx bx-user align-middle"> {{ ucfirst($adminAccount['admin_fullname']) }} </i>
                                                </li>
                                                @endif

                                                @if(!empty($adminAccount['admin_fullname']))
                                                <li>
                                                    <i class="bx bx-map align-middle">{{ ucfirst($adminAccount['admin_address']) }}</i> 
                                                </li>
                                                @endif

                                                @if(!empty($adminAccount['admin_fullname']))
                                                <li>
                                                    <i class="bx bx-phone align-middle"> {{$adminAccount['admin_phone']}} </i> 
                                                </li>
                                                @endif
                                            </ul>
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
                                        @include('templates/admin/profile_updates')
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

