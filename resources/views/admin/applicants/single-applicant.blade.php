
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
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Application List</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ ucfirst($full_name) }}</a></li>
                                            <li class="breadcrumb-item active">Application List</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="">
                                    <div class="table-responsive">
                                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 100px">#</th>
                                                    <th scope="col">Application</th>
                                                    <th scope="col">Date Signed</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($employments_applications as $index => $employment)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('a') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-application-for-employment', ['applicant_id' => $applicant_id, 'id' => $employments_applications[$index]->id]) }}" class="text-dark">Application For Employment</a>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($employments_applications[$index]->created_at)->format('M j, Y | g:iA') }}
                                                    </td>

                                                    <td>
                                                        <span class="badge bg-success">Completed</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-application-for-employment', ['applicant_id' => $applicant_id, 'id' => $employments_applications[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($confidentiality_of_information as $index => $confidentiality)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('c') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-confidentiality-of-information', ['applicant_id' => $applicant_id, 'id' => $confidentiality_of_information[$index]->id]) }}" class="text-dark">Confidentiality Of Information Agreement</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($confidentiality_of_information[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-confidentiality-of-information', ['applicant_id' => $applicant_id, 'id' => $confidentiality_of_information[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($criminal_history_search as $index => $criminal_hisotry)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('c') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-criminal-history-search', ['applicant_id' => $applicant_id, 'id' => $criminal_history_search[$index]->id]) }}" class="text-dark">Criminal History Search Consent Form</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($criminal_history_search[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-criminal-history-search', ['applicant_id' => $applicant_id, 'id' => $criminal_history_search[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($drug_testing_policy as $index => $drug_testing)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('d') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('get-drug-testing-policy', ['applicant_id' => $applicant_id, 'id' => $drug_testing_policy[$index]->id]) }}" class="text-dark">Drug Testing Policy</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($drug_testing_policy[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('get-drug-testing-policy', ['applicant_id' => $applicant_id, 'id' => $drug_testing_policy[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($disclaimer_waiver_liability as $index => $disclaimer)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('d') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-disclaimer-waiver-liability', ['applicant_id' => $applicant_id, 'id' => $disclaimer_waiver_liability[$index]->id]) }}" class="text-dark">Disclaimer and Waiver of Liability</a>
                                                        </h5>
                                                    </td>

                                                    <td>
                                                        @if(isset($disclaimer_waiver_liability[$index]))
                                                            {{ \Carbon\Carbon::parse($disclaimer_waiver_liability[$index]->created_at)->format('M j, Y | g:iA') }}
                                                        @else
                                                            N/A
                                                        @endif
                                                    </td>

                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-disclaimer-waiver-liability', ['applicant_id' => $applicant_id, 'id' => $disclaimer_waiver_liability[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($employee_safety as $index => $safety)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('e') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-employee-safety', ['applicant_id' => $applicant_id, 'id' => $employee_safety[$index]->id]) }}" class="text-dark">Employee Safety: Cellular Phone Use</a>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        {{ \Carbon\Carbon::parse($employee_safety[$index]->created_at)->format('M j, Y | g:iA') }}
                                                    </td>

                                                    <td>
                                                        @if(!empty($employee_safety[$index]->signature))
                                                            <span class="badge bg-success">Completed</span>
                                                        @else 
                                                            <span class="badge bg-danger">Not Completed</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-employee-safety', ['applicant_id' => $applicant_id, 'id' => $employee_safety[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($employee_agreement as $index => $employee_agree)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('e') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-employee-agreement', ['applicant_id' => $applicant_id, 'id' => $employee_agreement[$index]->id]) }}" class="text-dark">Employee Agreement</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($employee_agreement[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-employee-agreement', ['applicant_id' => $applicant_id, 'id' => $employee_agreement[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($employee_conduct as $index => $conduct)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('e') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-employee-conduct', ['applicant_id' => $applicant_id, 'id' => $employee_conduct[$index]->id]) }}" class="text-dark">Employee Notification of Policy: Employee Conduct</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($employee_conduct[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-employee-conduct', ['applicant_id' => $applicant_id, 'id' => $employee_conduct[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($employee_dress_code as $index => $dress_code)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('e') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-employee-dress-code', ['applicant_id' => $applicant_id, 'id' => $employee_dress_code[$index]->id]) }}" class="text-dark">Employee Dress Code</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($employee_dress_code[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-employee-dress-code', ['applicant_id' => $applicant_id, 'id' => $employee_dress_code[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($employee_orientation as $index => $orientation)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('e') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-employee-orientation', ['applicant_id' => $applicant_id, 'id' => $employee_orientation[$index]->id]) }}" class="text-dark">Employee Orientation</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($employee_orientation[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-employee-orientation', ['applicant_id' => $applicant_id, 'id' => $employee_orientation[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($employee_reference_check as $index => $employee_reference)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('e') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-employee-reference-check', ['applicant_id' => $applicant_id, 'id' => $employee_reference_check[$index]->id]) }}" class="text-dark">Employee Reference Check</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($employee_reference_check[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-employee-reference-check', ['applicant_id' => $applicant_id, 'id' => $employee_reference_check[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($attendance_tardiness as $index => $attend_tardiness)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('e') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-employee-attendance-tardiness-absenteeism-leave', ['applicant_id' => $applicant_id, 'id' => $attendance_tardiness[$index]->id]) }}" class="text-dark">Employee Notification of Policy: Employee Attendance, Tardiness, Absenteeism and Leave</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($attendance_tardiness[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-employee-attendance-tardiness-absenteeism-leave', ['applicant_id' => $applicant_id, 'id' => $attendance_tardiness[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($infection_control_agreement as $index => $infection)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('f') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-infection-control-agreement', ['applicant_id' => $applicant_id, 'id' => $infection_control_agreement[$index]->id]) }}" class="text-dark">Following Infection Control Agreement</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($infection_control_agreement[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-infection-control-agreement', ['applicant_id' => $applicant_id, 'id' => $infection_control_agreement[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($health_safety_agreement as $index => $health_safety)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('h') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-health-safety-agreement', ['applicant_id' => $applicant_id, 'id' => $health_safety_agreement[$index]->id]) }}" class="text-dark">Health & Safety Agreement</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($health_safety_agreement[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-health-safety-agreement', ['applicant_id' => $applicant_id, 'id' => $health_safety_agreement[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($home_health_aide as $index => $home_health)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('j') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-home-health-aide', ['applicant_id' => $applicant_id, 'id' => $home_health_aide[$index]->id]) }}" class="text-dark">Job Description: Home Health Aide</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($home_health_aide[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-home-health-aide', ['applicant_id' => $applicant_id, 'id' => $home_health_aide[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($non_compete_agreement as $index => $non_compete)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('n') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-non-compete-agreement', ['applicant_id' => $applicant_id, 'id' => $non_compete_agreement[$index]->id]) }}" class="text-dark">Non Compete Agreement</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($non_compete_agreement[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-non-compete-agreement', ['applicant_id' => $applicant_id, 'id' => $non_compete_agreement[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($policies_procedures as $index => $policy)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('p') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-policies-procedures', ['applicant_id' => $applicant_id, 'id' => $policies_procedures[$index]->id]) }}" class="text-dark">Policies and Procedures Orientation Acknowledgement</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($policies_procedures[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-policies-procedures', ['applicant_id' => $applicant_id, 'id' => $policies_procedures[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($reporting as $index => $non_compete)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('r') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-reporting', ['applicant_id' => $applicant_id, 'id' => $reporting[$index]->id]) }}" class="text-dark">Reporting: Abuse/Neglect/Exploitation</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($reporting[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-reporting', ['applicant_id' => $applicant_id, 'id' => $reporting[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($sexual_harassment as $index => $sexual)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('s') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-sexual-harassment', ['applicant_id' => $applicant_id, 'id' => $sexual_harassment[$index]->id]) }}" class="text-dark">Sexual Harassment</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($sexual_harassment[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-sexual-harassment', ['applicant_id' => $applicant_id, 'id' => $sexual_harassment[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($smoking_in_the_workplace as $index => $smoking)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('s') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-smoking-in-the-workplace', ['applicant_id' => $applicant_id, 'id' => $smoking_in_the_workplace[$index]->id]) }}" class="text-dark">Employee Notification of Policy: Smoking In The Workplace</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($smoking_in_the_workplace[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-smoking-in-the-workplace', ['applicant_id' => $applicant_id, 'id' => $smoking_in_the_workplace[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($sworn_disclosure_statement as $index => $sworn)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('s') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-sworn-disclosure-statement', ['applicant_id' => $applicant_id, 'id' => $sworn_disclosure_statement[$index]->id]) }}" class="text-dark">Sworn Disclosure Statement</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($sworn_disclosure_statement[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-sworn-disclosure-statement', ['applicant_id' => $applicant_id, 'id' => $sworn_disclosure_statement[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($universal_precaution as $index => $precaution)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('u') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-universal-precautions', ['applicant_id' => $applicant_id, 'id' => $universal_precaution[$index]->id]) }}" class="text-dark">Training Documentation on Universal Precautions</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($universal_precaution[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-universal-precautions', ['applicant_id' => $applicant_id, 'id' => $universal_precaution[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                @foreach($verification as $index => $verify)
                                                <tr>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle">
                                                                {{ ucfirst('v') }}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-truncate font-size-14">
                                                            <a href="{{ route('view-verification', ['applicant_id' => $applicant_id, 'id' => $verification[$index]->id]) }}" class="text-dark">Verification of Professional License</a>
                                                        </h5>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($verification[$index]->created_at)->format('M j, Y | g:iA') }}</td>
                                                    <td><span class="badge bg-success">Completed</span></td>
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="{{ route('view-verification', ['applicant_id' => $applicant_id, 'id' => $verification[$index]->id]) }}">View</a>
                                                                <a class="dropdown-item" href="#">Append Signature</a>
                                                                <a class="dropdown-item" href="#">Download PDF</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                @include('templates/dashboard/footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        @include('templates/admin/foot')
    </body>
</html>