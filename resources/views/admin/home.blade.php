<!doctype html>
<html lang="en">

    @include('templates/admin/head')

    <body data-sidebar="dark" data-layout-mode="light">
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
        <!-- Begin page -->
        <div id="layout-wrapper">
           @include('templates/admin/header') 
            <!-- ========== Left Sidebar Start ========== -->
            @include('templates/admin/sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row mb-4">
                            <div class="col-lg-12">
                                <div class="d-flex align-items-center">
                                    @if(!empty($adminAccount['admin_avatar']))
                                    <img src="{{asset('storage/avatars/' . $adminAccount['admin_avatar'])}}" alt="" class="avatar-sm rounded">
                                    @else 
                                    <img src="{{asset('images/avatar/avatar-placeholder.jpg')}}" alt="" class="avatar-sm rounded">
                                    @endif
                                    <div class="ms-3 flex-grow-1">
                                        <h5 class="mb-2 card-title">Hello, 
                                            @if(!empty($adminAccount['admin_fullname'])) 
                                                {{ ucfirst($adminAccount['admin_fullname']) }}
                                            @else 
                                                {{'Administrator'}} 
                                            @endif 
                                        </h5>
                                        <p class="text-muted mb-0">Ready to jump back in?</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                       
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Applicants</p>
                                                <h4 class="mb-0"> {{$userCount}} </h4>
                                            </div>
                                
                                            <div class="flex-shrink-0 align-self-center">
                                            @if ($userPercentage['percentageIncrease'] > 0)
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="eathereum_sparkline_charts"></div>
                                            @elseif ($userPercentage['percentageIncrease'] < 0)
                                            <div data-colors='["--bs-danger", "--bs-transparent"]' dir="ltr" id="eathereum_sparkline_charts">
                                            </div>
                                            @else
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> 
                                        @if ($userPercentage['percentageIncrease'] > 0)
                                            <span class="badge badge-soft-success me-1">
                                                <i class="bx bx-trending-up align-bottom me-1"></i>
                                                {{ number_format($userPercentage['percentageIncrease'], 2) }}%
                                            </span>
                                            Increase last month
                                        @elseif ($userPercentage['percentageIncrease'] < 0)
                                            <span class="badge badge-soft-danger me-1">
                                                <i class="bx bx-trending-down align-bottom me-1"></i>
                                                {{ number_format(abs($userPercentage['percentageIncrease']), 2) }}%
                                            </span>
                                            Decrease last month
                                        @else
                                            No change from the previous month
                                        @endif
                                        </p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Signed Application(s)</p>
                                                <h4 class="mb-0"> {{$signedApplications}} </h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="new_application_charts">  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"><i class="bx bx-trending-up align-bottom me-1"></i> 24.07%</span> Increase last month</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Unsigned Application(s)</p>
                                                <h4 class="mb-0"> {{$countUnsignedApplications}} </h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-success", "--bs-transparent"]' dir="ltr" id="total_approved_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-success me-1"><i class="bx bx-trending-up align-bottom me-1"></i> 8.41%</span> Increase last month</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-3">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-muted fw-medium">Total Rejected</p>
                                                <h4 class="mb-0">12,487</h4>
                                            </div>
                            
                                            <div class="flex-shrink-0 align-self-center">
                                                <div data-colors='["--bs-danger", "--bs-transparent"]' dir="ltr" id="total_rejected_charts"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body border-top py-3">
                                        <p class="mb-0"> <span class="badge badge-soft-danger me-1"><i class="bx bx-trending-down align-bottom me-1"></i> 20.63%</span> Decrease last month</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->

                        <!--end row-->

                        <!--end row-->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                @include('templates/dashboard/footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- JAVASCRIPT -->
        @include('templates/admin/foot')

    </body>
</html>
