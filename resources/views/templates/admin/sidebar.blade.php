<div class="vertical-menu">
   <div data-simplebar="" class="h-100">
      <!--- Sidemenu -->
      <div id="sidebar-menu">
         <!-- Left Menu Start -->
         <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menu</li>
            <li>
               <a href="{{url('admin')}}" class="waves-effect">
               <i class="bx bx-home-circle"></i>
               <span key="t-dashboards">Dashboard</span>
               </a>
            </li>
            <li class="mm-active">
               <a href="javascript: void(0);" class="has-arrow waves-effect" aria-expanded="true">
               <i class="bx bx-user"></i>
               <span key="t-multi-level">Applicants</span>
               </a>
               <ul class="sub-menu mm-collapse mm-show" aria-expanded="true">
                  <li>
                     <a href="{{url('admin/applicants')}}" key="t-level-1-1" aria-expanded="false">View All Applicants</a>
                  </li>
                  @if(!empty($applicant_id))
                  <li class="mm-active">
                     <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2" aria-expanded="true"> {{$profileData->full_name}} </a>
                     <ul class="sub-menu mm-collapse mm-show" aria-expanded="true">
                        <?php $employmentApplicationId = null; ?>
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\EmploymentApplication'], $applicant_id))
                        <li><a href="{{ route('view-application-for-employment', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\EmploymentApplication'], $applicant_id)]) }}" key="t-level-2-1">Application For Employment</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\ConfidentialityInformation'], $applicant_id))   
                        <li><a href="{{ route('view-confidentiality-of-information', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\ConfidentialityInformation'], $applicant_id)]) }}" key="t-level-2-2">Confidentiality of Information Agreement</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\CriminalHistorySearch'], $applicant_id)) 
                        <li><a href="{{ route('view-criminal-history-search', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\CriminalHistorySearch'], $applicant_id)]) }}" key="t-level-2-3">Criminal History Search Consent Form</a></li>
                        @endif 
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\DrugTestingPolicy'], $applicant_id)) 
                        <li><a href="{{ route('view-drug-testing-policy', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\DrugTestingPolicy'], $applicant_id)]) }}" key="t-level-2-4">Drug Testing Policy</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\DisclaimerWaiverLiability'], $applicant_id))
                        <li><a href="{{ route('view-disclaimer-waiver-liability', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\DisclaimerWaiverLiability'], $applicant_id)]) }}" key="t-level-2-5">Disclaimer and Waiver of Liability</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeSafety'], $applicant_id))
                        <li><a href="{{ route('view-employee-safety', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeSafety'], $applicant_id)]) }}" key="t-level-2-6">Employee Safety: Cellular Phone Use</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeAgreement'], $applicant_id))
                        <li><a href="{{ route('view-employee-agreement', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeAgreement'], $applicant_id)]) }}" key="t-level-2-7">Employee Agreement</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeConduct'], $applicant_id))
                        <li><a href="{{ route('view-employee-conduct', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeConduct'], $applicant_id)]) }}" key="t-level-2-8">Employee Notification of Policy: Employee Conduct</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeDressCode'], $applicant_id))
                        <li><a href="{{ route('view-employee-dress-code', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeDressCode'], $applicant_id)]) }}" key="t-level-2-9">Employee Dress Code</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeOrientation'], $applicant_id))
                        <li><a href="{{ route('view-employee-orientation', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeeOrientation'], $applicant_id)]) }}" key="t-level-2-10">Employee Orientation</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeereferenceCheck'], $applicant_id))
                        <li><a href="{{ route('view-employee-reference-check', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\EmployeereferenceCheck'], $applicant_id)]) }}" key="t-level-2-11">Employee Reference Check</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\AttendanceTardiness'], $applicant_id))
                        <li>
                           <a href="{{ route('view-employee-attendance-tardiness-absenteeism-leave', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\AttendanceTardiness'], $applicant_id)]) }}" key="t-level-2-12">Employee Notification of Policy: Employee Attendance, Tardiness, Absenteeism and Leave</a>
                        </li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\InfectionControlAgreement'], $applicant_id))
                        <li><a href="{{ route('view-infection-control-agreement', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\InfectionControlAgreement'], $applicant_id)]) }}" key="t-level-2-13">Following Infection Control Agreement</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\HealthSafetyAgreement'], $applicant_id))
                        <li><a href="{{ route('view-health-safety-agreement', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\HealthSafetyAgreement'], $applicant_id)]) }}" key="t-level-2-14">Health & Safety Agreement</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\HomeHealthAide'], $applicant_id))
                        <li><a href="{{ route('view-home-health-aide', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\HomeHealthAide'], $applicant_id)]) }}" key="t-level-2-15">Job Description: Home Health Aide</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\NonCompeteAgreement'], $applicant_id))
                        <li><a href="{{ route('view-non-compete-agreement', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\NonCompeteAgreement'], $applicant_id)]) }}" key="t-level-2-16">Non Compete Agreement</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\PolicyAndProcedure'], $applicant_id))
                        <li><a href="{{ route('view-policies-procedures', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\PolicyAndProcedure'], $applicant_id)]) }}" key="t-level-2-17">Policies and Procedures Orientation Acknowledgement</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\Reporting'], $applicant_id))
                        <li><a href="{{ route('view-reporting', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\Reporting'], $applicant_id)]) }}" key="t-level-2-16">Reporting: Abuse/Neglect/Exploitation</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\SexualHarassment'], $applicant_id))
                        <li><a href="{{ route('view-sexual-harassment', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\SexualHarassment'], $applicant_id)]) }}" key="t-level-2-16">Sexual Harassment</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\Smoking'], $applicant_id))
                        <li>
                           <a href="{{ route('view-smoking-in-the-workplace', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\Smoking'], $applicant_id)]) }}" key="t-level-2-16">Employee Notification of Policy: Smoking In The Workplace</a>
                        </li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\SwornDisclosure'], $applicant_id))
                        <li><a href="{{ route('view-sworn-disclosure-statement', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\SwornDisclosure'], $applicant_id)]) }}" key="t-level-2-16">Sworn Disclosure Statement</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\UniversalPrecautions'], $applicant_id))
                        <li><a href="{{ route('view-universal-precautions', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\UniversalPrecautions'], $applicant_id)]) }}" key="t-level-2-16">Training Documentation on Universal Precautions</a></li>
                        @endif
                        @if(\App\Services\FormService::isAnyFormFilled(['\App\Models\Verification'], $applicant_id))
                        <li><a href="{{ route('view-verification', ['applicant_id' => $applicant_id, 'id' => \App\Services\FormService::isAnyFormFilled(['\App\Models\Verification'], $applicant_id)]) }}" key="t-level-2-16">Verification of Professional License</a></li>
                        @endif
                     </ul>
                  </li>
                  @endif
               </ul>
            </li>
         </ul>
      </div>
      <!-- Sidebar -->
   </div>
</div>