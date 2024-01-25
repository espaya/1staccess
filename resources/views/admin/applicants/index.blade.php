
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

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Applicants</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashbaord</a></li>
                                            <li class="breadcrumb-item active">Applicants</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card job-filter">
                                    <div class="card-body">
                                        <form action="{{ route('searchApplicants') }}" enctype="multipart/form-data" method="GET">
                                            <div class="row g-3">
                                                <div class="col-xxl-8 col-lg-8">
                                                    <div class="position-relative">
                                                        <input name="search" value="{{ old('search') }}" type="text" class="form-control @error('search') is-invalid @enderror" id="search" autocomplete="off" placeholder="Search for applicant">
                                                    </div>
                                                </div>
                                                <div class="col-xxl-2 col-lg-4">
                                                    <div class="position-relative h-100 hstack gap-3">
                                                        <button type="submit" class="btn btn-primary h-100 w-100"><i class="bx bx-search-alt align-middle"></i> Find Applicant</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col--> 
                        </div>
                        <!--end row-->

                        <div class="row">
                        @if(request('search'))
                        @foreach($searchResults as $user)
                        <div class="col-xl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center mb-3">
                                                    @if(!empty($user->user_avatar))
                                                        <img src="{{ asset('storage/avatars/' . $user->user_avatar) }}" alt="" class="avatar-sm rounded-circle">
                                                    @else
                                                    <img src="{{asset('images/avatar/avatar-placeholder.jpg')}}" alt="" class="avatar-sm rounded-circle"> 
                                                    @endif
                                                    <h6 class="font-size-15 mt-3 mb-1">{{ $user->full_name}}</h6>
                                                </div>
                                                <div class="d-flex mb-3 justify-content-center gap-2 text-muted">
                                                    <div>
                                                        <i class='bx bx-map align-middle text-primary'></i> Louisiana, New Orleans USA
                                                    </div>
                                                </div>
                                                <div class="mt-4 pt-1">
                                                    <a href="{{ route('single-applicant.show', ['single_applicant' => $user->applicant_id]) }}" class="btn btn-soft-primary d-block">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                        @else
                        @foreach($profile as $user)
                            @if(!empty($user))
                                <div class="col-xl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="text-center mb-3">
                                                    @if(!empty($user->user_avatar))
                                                        <img src="{{ asset('storage/avatars/' . $user->user_avatar) }}" alt="" class="avatar-sm rounded-circle">
                                                    @else
                                                    <img src="{{asset('images/avatar/avatar-placeholder.jpg')}}" alt="" class="avatar-sm rounded-circle"> 
                                                    @endif
                                                    <h6 class="font-size-15 mt-3 mb-1">{{ $user->full_name}}</h6>
                                                </div>
                                                <div class="d-flex mb-3 justify-content-center gap-2 text-muted">
                                                    <div>
                                                        <i class='bx bx-map align-middle text-primary'></i> Louisiana, New Orleans USA
                                                    </div>
                                                </div>
                                                <div class="mt-4 pt-1">
                                                    <a href="{{ route('single-applicant.show', ['single_applicant' => $user->applicant_id]) }}" class="btn btn-soft-primary d-block">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else 
                                @endif
                            @endforeach
                        @endif
                        </div>
                        <div class="row">
                             <div class="col-lg-12">
                                <ul class="pagination pagination-rounded justify-content-center mt-4">
                                @if(request('search'))
                                    @if($searchResults instanceof Illuminate\Pagination\LengthAwarePaginator)
                                        {{$searchResults->links('vendor/pagination.pagination')}}
                                    @endif
                                @else 
                                    @if($profile instanceof Illuminate\Pagination\LengthAwarePaginator)
                                        {{$profile->links('vendor/pagination.pagination')}}
                                    @endif
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div><!-- End Page-content -->   
                @include('templates/dashboard/footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        <!-- JAVASCRIPT -->
        @include('templates/admin/foot')
    </body>
</html>
