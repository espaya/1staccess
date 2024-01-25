<div class="container">
   <div  style="margin-bottom: 50px !important; margin-top:50px" class="row">
      <div class="col-md-2"></div>
      <div class=" col-md-8">
         <form id="myForm" action="{{route('dashboard')}}" onsubmit="submitForm();" method="post" enctype="multipart/form-data" class="row g-4">
            @csrf
            <div class="col-md-12">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Employee Hire Date</label>
                  <div class="form-control-wrap">
                     <input name="employee_hire_date" value="{{old('employee_hire_date')}}" type="date" class="form-control @error('employee_hire_date') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Full Name</label>
                  <div class="form-control-wrap">
                     <input name="full_name" value="{{old('full_name')}}" type="text" class="form-control @error('full_name') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputPassword4" class="form-label">Social Security #</label>
                  <div class="form-control-wrap">
                     <input name="SSN" value="{{old('SSN')}}" type="text" class="form-control @error('SSN') is-invalid @enderror" id="inputPassword4">
                  </div>
               </div>
            </div>
            <!-- Present Address -->
            <div class="col-12">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Present Address</label>
                  <div class="form-control-wrap">
                     <input name="present_address" value="{{old('present_address')}}" type="text" class="form-control @error('present_address') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputCity" class="form-label">City</label>
                  <div class="form-control-wrap">
                     <input name="present_city" value="{{old('present_city')}}" type="text" class="form-control @error('present_city') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputState" class="form-label">State</label>
                  <div class="form-control-wrap">
                     <select name="present_state" id="inputState" class="form-select @error('present_state') is-invalid @enderror">
                        <option value="{{old('present_state')}}" selected>Choose...</option>
                        <option value="AK" {{ old('present_state') == 'AK' ? 'selected' : '' }}>AK</option>
                        <option value="AL" {{ old('present_state') == 'AL' ? 'selected' : '' }}>AL</option>
                        <option value="AR" {{ old('present_state') == 'AR' ? 'selected' : '' }}>AR</option>
                        <option value="AZ"  {{ old('present_state') == 'AZ' ? 'selected' : '' }}>AZ</option>
                        <option value="CA"  {{ old('present_state') == 'CA' ? 'selected' : '' }}>CA</option>
                        <option value="CO"  {{ old('present_state') == 'CO' ? 'selected' : '' }}>CO</option>
                        <option value="CT"  {{ old('present_state') == 'CT' ? 'selected' : '' }}>CT</option>
                        <option value="DC"  {{ old('present_state') == 'DC' ? 'selected' : '' }}>DC</option>
                        <option value="DE"  {{ old('present_state') == 'DE' ? 'selected' : '' }}>DE</option>
                        <option value="FL"  {{ old('present_state') == 'FL' ? 'selected' : '' }}>FL</option>
                        <option value="GA"  {{ old('present_state') == 'GA' ? 'selected' : '' }}>GA</option>
                        <option value="HI"  {{ old('present_state') == 'HI' ? 'selected' : '' }}>HI</option>
                        <option value="IA" {{ old('present_state') == 'IA' ? 'selected' : '' }}>IA</option>
                        <option value="ID" {{ old('present_state') == 'ID' ? 'selected' : '' }}>ID</option>
                        <option value="IL" {{ old('present_state') == 'IL' ? 'selected' : '' }}>IL</option>
                        <option value="IN" {{ old('present_state') == 'IN' ? 'selected' : '' }}>IN</option>
                        <option value="KS" {{ old('present_state') == 'KS' ? 'selected' : '' }}>KS</option>
                        <option value="KY" {{ old('present_state') == 'KY' ? 'selected' : '' }}>KY</option>
                        <option value="LA" {{ old('present_state') == 'LA' ? 'selected' : '' }}>LA</option>
                        <option value="MA" {{ old('present_state') == 'MA' ? 'selected' : '' }}>MA</option>
                        <option value="MD" {{ old('present_state') == 'MD' ? 'selected' : '' }}>MD</option>
                        <option value="ME" {{ old('present_state') == 'ME' ? 'selected' : '' }}>ME</option>
                        <option value="MI" {{ old('present_state') == 'MI' ? 'selected' : '' }}>MI</option>
                        <option value="MN" {{ old('present_state') == 'MN' ? 'selected' : '' }}>MN</option>
                        <option value="MO" {{ old('present_state') == 'MO' ? 'selected' : '' }}>MO</option>
                        <option value="MS" {{ old('present_state') == 'MS' ? 'selected' : '' }}>MS</option>
                        <option value="MT" {{ old('present_state') == 'MT' ? 'selected' : '' }}>MT</option>
                        <option value="NC" {{ old('present_state') == 'NC' ? 'selected' : '' }}>NC</option>
                        <option value="ND" {{ old('present_state') == 'ND' ? 'selected' : '' }}>ND</option>
                        <option value="NE" {{ old('present_state') == 'NE' ? 'selected' : '' }}>NE</option>
                        <option value="NH" {{ old('present_state') == 'NH' ? 'selected' : '' }}>NH</option>
                        <option value="NJ" {{ old('present_state') == 'NJ' ? 'selected' : '' }}>NJ</option>
                        <option value="NM" {{ old('present_state') == 'NM' ? 'selected' : '' }}>NM</option>
                        <option value="NV" {{ old('present_state') == 'NV' ? 'selected' : '' }}>NV</option>
                        <option value="NY" {{ old('present_state') == 'NY' ? 'selected' : '' }}>NY</option>
                        <option value="OH" {{ old('present_state') == 'OH' ? 'selected' : '' }}>OH</option>
                        <option value="OK" {{ old('present_state') == 'OK' ? 'selected' : '' }}>OK</option>
                        <option value="OR" {{ old('present_state') == 'OR' ? 'selected' : '' }}>OR</option>
                        <option value="PA" {{ old('present_state') == 'PA' ? 'selected' : '' }}>PA</option>
                        <option value="RI" {{ old('present_state') == 'RI' ? 'selected' : '' }}>RI</option>
                        <option value="SC" {{ old('present_state') == 'SC' ? 'selected' : '' }}>SC</option>
                        <option value="SD" {{ old('present_state') == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="TN" {{ old('present_state') == 'TN' ? 'selected' : '' }}>TN</option>
                        <option value="TX" {{ old('present_state') == 'TX' ? 'selected' : '' }}>TX</option>
                        <option value="UT" {{ old('present_state') == 'UT' ? 'selected' : '' }}>UT</option>
                        <option value="VA" {{ old('present_state') == 'VA' ? 'selected' : '' }}>VA</option>
                        <option value="VT" {{ old('present_state') == 'VT' ? 'selected' : '' }}>VT</option>
                        <option value="WA" {{ old('present_state') == 'WA' ? 'selected' : '' }}>WA</option>
                        <option value="WI" {{ old('present_state') == 'WI' ? 'selected' : '' }}>WI</option>
                        <option value="WV" {{ old('present_state') == 'WV' ? 'selected' : '' }}>WV</option>
                        <option value="WY" {{ old('present_state') == 'WY' ? 'selected' : '' }}>WY</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Zip</label>
                  <div class="form-control-wrap">
                     <input name="present_zip" value="{{old('present_zip')}}" type="text" class="form-control @error('present_zip') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <hr style="padding-top: 10px;">
            <div class="col-md-12">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Present address same as permanent address?</label>
                  <div class="mb-3">           
                     <div class="form-check">
                        <input name="present_permanent_address" value="Yes" class="form-check-input @error('present_permanent_address') is-invalid @enderror" type="radio" id="yesRadio" {{ old('present_permanent_address') == 'Yes' ? 'checked' : '' }}>
                        <label class="form-check-label" for="yesRadio">
                           Yes
                        </label>
                     </div>
                     <div class="form-check">
                        <input name="present_permanent_address" value="No" class="form-check-input @error('present_permanent_address') is-invalid @enderror" type="radio" id="noRadio" {{ old('present_permanent_address') == 'No' ? 'checked' : '' }}>
                        <label class="form-check-label" for="noRadio">
                           No
                        </label>
                     </div>
                     
                  </div>
               </div>
            </div>
            <script>
   document.addEventListener("DOMContentLoaded", function() {
      var yesRadio = document.getElementById("yesRadio");
      var noRadio = document.getElementById("noRadio");

      // Function to toggle visibility based on radio button state
      function toggleVisibility() {
         var displayValue = yesRadio.checked ? "none" : "block";
         document.getElementById("permanentAddress").style.display = displayValue;
         document.getElementById("permanentCity").style.display = displayValue;
         document.getElementById("permanentState").style.display = displayValue;
         document.getElementById("permanentZip").style.display = displayValue;
      }

      // Initial toggle on page load
      toggleVisibility();

      // Event listeners for radio buttons
      yesRadio.addEventListener("change", toggleVisibility);
      noRadio.addEventListener("change", toggleVisibility);
   });
</script>


            <hr style="margin-top: 10px; margin-bottom: 10px;">
            <!-- Permanent Address -->
            <div id="permanentAddress" class="col-12">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Permanent Address</label>
                  <div class="form-control-wrap">
                     <input name="permanent_address" value="{{old('permanent_address')}}" type="text" class="form-control @error('permanent_address') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div id="permanentCity" class="col-md-6">
               <div class="form-group">
                  <label for="inputCity" class="form-label">City</label>
                  <div class="form-control-wrap">
                     <input name="permanent_city" value="{{old('permanent_city')}}" type="text" class="form-control @error('permanent_city') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div id="permanentState" class="col-md-4">
               <div class="form-group">
                  <label for="inputState" class="form-label">State</label>
                  <div class="form-control-wrap">
                     <select name="permanent_state" id="inputState" class="form-select @error('permanent_state') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="AK" {{ old('permanent_state') == 'AK' ? 'selected' : '' }}>AK</option>
                        <option value="AL" {{ old('permanent_state') == 'AL' ? 'selected' : '' }}>AL</option>
                        <option value="AR" {{ old('permanent_state') == 'AR' ? 'selected' : '' }}>AR</option>
                        <option value="AZ"  {{ old('permanent_state') == 'AZ' ? 'selected' : '' }}>AZ</option>
                        <option value="CA"  {{ old('permanent_state') == 'CA' ? 'selected' : '' }}>CA</option>
                        <option value="CO"  {{ old('permanent_state') == 'CO' ? 'selected' : '' }}>CO</option>
                        <option value="CT"  {{ old('permanent_state') == 'CT' ? 'selected' : '' }}>CT</option>
                        <option value="DC"  {{ old('permanent_state') == 'DC' ? 'selected' : '' }}>DC</option>
                        <option value="DE"  {{ old('permanent_state') == 'DE' ? 'selected' : '' }}>DE</option>
                        <option value="FL"  {{ old('permanent_state') == 'FL' ? 'selected' : '' }}>FL</option>
                        <option value="GA"  {{ old('permanent_state') == 'GA' ? 'selected' : '' }}>GA</option>
                        <option value="HI"  {{ old('permanent_state') == 'HI' ? 'selected' : '' }}>HI</option>
                        <option value="IA" {{ old('permanent_state') == 'IA' ? 'selected' : '' }}>IA</option>
                        <option value="ID" {{ old('permanent_state') == 'ID' ? 'selected' : '' }}>ID</option>
                        <option value="IL" {{ old('permanent_state') == 'IL' ? 'selected' : '' }}>IL</option>
                        <option value="IN" {{ old('permanent_state') == 'IN' ? 'selected' : '' }}>IN</option>
                        <option value="KS" {{ old('permanent_state') == 'KS' ? 'selected' : '' }}>KS</option>
                        <option value="KY" {{ old('permanent_state') == 'KY' ? 'selected' : '' }}>KY</option>
                        <option value="LA" {{ old('permanent_state') == 'LA' ? 'selected' : '' }}>LA</option>
                        <option value="MA" {{ old('permanent_state') == 'MA' ? 'selected' : '' }}>MA</option>
                        <option value="MD" {{ old('permanent_state') == 'MD' ? 'selected' : '' }}>MD</option>
                        <option value="ME" {{ old('permanent_state') == 'ME' ? 'selected' : '' }}>ME</option>
                        <option value="MI" {{ old('permanent_state') == 'MI' ? 'selected' : '' }}>MI</option>
                        <option value="MN" {{ old('permanent_state') == 'MN' ? 'selected' : '' }}>MN</option>
                        <option value="MO" {{ old('permanent_state') == 'MO' ? 'selected' : '' }}>MO</option>
                        <option value="MS" {{ old('permanent_state') == 'MS' ? 'selected' : '' }}>MS</option>
                        <option value="MT" {{ old('permanent_state') == 'MT' ? 'selected' : '' }}>MT</option>
                        <option value="NC" {{ old('permanent_state') == 'NC' ? 'selected' : '' }}>NC</option>
                        <option value="ND" {{ old('permanent_state') == 'ND' ? 'selected' : '' }}>ND</option>
                        <option value="NE" {{ old('permanent_state') == 'NE' ? 'selected' : '' }}>NE</option>
                        <option value="NH" {{ old('permanent_state') == 'NH' ? 'selected' : '' }}>NH</option>
                        <option value="NJ" {{ old('permanent_state') == 'NJ' ? 'selected' : '' }}>NJ</option>
                        <option value="NM" {{ old('permanent_state') == 'NM' ? 'selected' : '' }}>NM</option>
                        <option value="NV" {{ old('permanent_state') == 'NV' ? 'selected' : '' }}>NV</option>
                        <option value="NY" {{ old('permanent_state') == 'NY' ? 'selected' : '' }}>NY</option>
                        <option value="OH" {{ old('permanent_state') == 'OH' ? 'selected' : '' }}>OH</option>
                        <option value="OK" {{ old('permanent_state') == 'OK' ? 'selected' : '' }}>OK</option>
                        <option value="OR" {{ old('permanent_state') == 'OR' ? 'selected' : '' }}>OR</option>
                        <option value="PA" {{ old('permanent_state') == 'PA' ? 'selected' : '' }}>PA</option>
                        <option value="RI" {{ old('permanent_state') == 'RI' ? 'selected' : '' }}>RI</option>
                        <option value="SC" {{ old('permanent_state') == 'SC' ? 'selected' : '' }}>SC</option>
                        <option value="SD" {{ old('permanent_state') == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="TN" {{ old('permanent_state') == 'TN' ? 'selected' : '' }}>TN</option>
                        <option value="TX" {{ old('permanent_state') == 'TX' ? 'selected' : '' }}>TX</option>
                        <option value="UT" {{ old('permanent_state') == 'UT' ? 'selected' : '' }}>UT</option>
                        <option value="VA" {{ old('permanent_state') == 'VA' ? 'selected' : '' }}>VA</option>
                        <option value="VT" {{ old('permanent_state') == 'VT' ? 'selected' : '' }}>VT</option>
                        <option value="WA" {{ old('permanent_state') == 'WA' ? 'selected' : '' }}>WA</option>
                        <option value="WI" {{ old('permanent_state') == 'WI' ? 'selected' : '' }}>WI</option>
                        <option value="WV" {{ old('permanent_state') == 'WV' ? 'selected' : '' }}>WV</option>
                        <option value="WY" {{ old('permanent_state') == 'WY' ? 'selected' : '' }}>WY</option>
                     </select>
                  </div>
               </div>
            </div>
            <div id="permanentZip" class="col-md-2">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Zip</label>
                  <div class="form-control-wrap">
                     <input name="permanent_zip" value="{{old('permanent_zip')}}" type="text" class="form-control @error('permanent_zip') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            

            <hr style="margin-top: 70px; margin-bottom: 30px;">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Phone</label>
                  <div class="form-control-wrap">
                     <input name="phone" value="{{old('phone')}}" type="text" class="form-control @error('phone') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputState" class="form-label">If you are under 18 can you furnish a work? </label>
                  <div class="form-control-wrap">
                     <select name="furnish_work" id="inputState" class="form-select @error('furnish_work') is-invalid @enderror">
                        <option value="" selected="">Choose...</option>
                        <option value="Yes" {{old('furnish_work') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('furnish_work') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputState" class="form-label">Employment Desired</label>
                  <div class="form-control-wrap">
                     <select name="employment_desired" id="inputState" class="form-select @error('furnish_work') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Full Time" {{old('employment_desired') == 'Full Time' ? 'selected' : ''}}>Full Time</option>
                        <option value="Part Time" {{old('employment_desired') == 'Part Time' ? 'selected' : ''}}>Part Time</option>
                        <option value="Temp" {{old('employment_desired') == 'Temp' ?      'selected' : ''}}>Temp</option>
                        <option value="Seasonal" {{old('employment_desired') == 'Seasonal' ?  'selected' : ''}}>Seasonal</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Position</label>
                  <div class="form-control-wrap">
                     <input name="position" value="{{old('position')}}" type="text" class="form-control @error('position') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Date You Can Start</label>
                  <div class="form-control-wrap">
                     <input name="date_start" value="{{old('date_start')}}" type="date" class="form-control @error('date_start') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Salary</label>
                  <div class="form-control-wrap">
                     <input name="salary" value="{{old('salary')}}" type="text" class="form-control @error('salary') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label class="form-label">Are You Employed Now</label>
                  <div class="form-control-wrap">
                     <select name="employed_now" id="employed_now" class="form-select @error('employed_now') is-invalid @enderror" onchange="showPresentEmployer()">
                        <option value="">Choose...</option>
                        <option value="Yes" {{ old('employed_now') == 'Yes' ? 'selected' : '' }}>Yes</option>
                        <option value="No" {{ old('employed_now') == 'No' ? 'selected' : '' }}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-6" id="inqure_present_employer" style="display:none;">
               <div class="form-group">
                  <label for="inputState" class="form-label">If so, may we inquire of your present employer?</label>
                  <div class="form-control-wrap">
                     <select name="inqure_present_employer" id="inquire_present_employer" class="form-select @error('inquire_present_employer') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('inqure_present_employer') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('inqure_present_employer') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <script>
               /* if employed = yes, show inquire present employer field*/
               function showPresentEmployer() {
                   var selectBox = document.getElementById("employed_now");
                   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
               
                   var inqurePresentEmployerField = document.getElementById('inquire_present_employer');
                   var inqurePresentEmployerValue = inqurePresentEmployerField.value;
               
                   if (selectedValue == "Yes") {
                       document.getElementById("inqure_present_employer").style.display = "block";
                       // inqure_present_employer field cannot be empty
                       if(!inqurePresentEmployerValue.trim() == ""){
                           return true;
                       }else{
                        return false;
                       }
                   } else {
                       document.getElementById("inqure_present_employer").style.display = "none";
                       return true;
                   }
               }

               // trigger function on page load
               window.addEventListener("load", showPresentEmployer);
               
            </script>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputState" class="form-label">Ever Applied For This Company Before?</label>
                  <div class="form-control-wrap">
                     <select onchange="showWhereWhen();" name="applied_before" id="applied_before" class="form-select @error('applied_before') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('applied_before') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('applied_before') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div id="where" style="display: none;" class="col-md-3">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Where?</label>
                  <div class="form-control-wrap">
                     <input name="where" value="{{old('where')}}" type="text" class="form-control @error('where') is-invalid @enderror" id="where">
                  </div>
               </div>
               @error('where')
               <p class="alert alert-danger">{{$message}}</p>
               @endif
            </div>
            <div id="when" style="display: none;" class="col-md-3">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">When?</label>
                  <div class="form-control-wrap">
                     <input name="when" value="{{old('when')}}" type="date" class="form-control @error('when') is-invalid @enderror" id="when">
                  </div>
               </div>
               @error('when')
               <p class="alert alert-danger">{{$message}}</p>
               @endif
            </div>
            <script>
               /* if employed = yes, show where & when fields */
               function showWhereWhen() {
                   var selectBox = document.getElementById("applied_before");
                   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
               
                   var whereField = document.getElementById("where");
                   var whereValue = whereField.value;
               
                   var whenField = document.getElementById("when");
                   var whenValue = whenField.value;
               
                   if (selectedValue == "Yes") {
                       document.getElementById("where").style.display = "block";
                       document.getElementById("when").style.display = "block";
               
                       if(!whereValue.trim() === "" || !whenValue.trim() === ""){
                           return true;
                       }else{
                        return false;
                       }
               
                   } else {
                       document.getElementById("where").style.display = "none";
                       document.getElementById("when").style.display = "none";
                       return true;
                   }
               }
               window.addEventListener("load", showWhereWhen);
            </script>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputState" class="form-label">Are You On Layoff And Subject To Recall?</label>
                  <div class="form-control-wrap">
                     <select name="on_layoff_subject_to_recall" id="inputState" class="form-select @error('on_layoff_subject_to_recall') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('on_layoff_subject_to_recall') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('on_layoff_subject_to_recall') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputState" class="form-label">Will You Travel if Required?</label>
                  <div class="form-control-wrap">
                     <select name="travel_if_required" id="inputState" class="form-select @error('travel_if_required') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('travel_if_required') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('travel_if_required') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputState" class="form-label">Will you relocate if the job requires it?</label>
                  <div class="form-control-wrap">
                     <select name="relocate_if_required" id="inputState" class="form-select @error('relocate_if_required') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('relocate_if_required') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('relocate_if_required') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputState" class="form-label">Will you work overtime if required?</label>
                  <div class="form-control-wrap">
                     <select name="overtime_if_required" id="inputState" class="form-select @error('overtime_if_required') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('overtime_if_required') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('overtime_if_required') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="inputState" class="form-label">Are you able to meet the attendance requirements of this position?</label>
                  <div class="form-control-wrap">
                     <select name="attendance_requirements_position" id="inputState" class="form-select @error('attendance_requirements_position') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('attendance_requirements_position') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('attendance_requirements_position') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputState" class="form-label">Have you ever been Bonded?</label>
                  <div class="form-control-wrap">
                     <select name="bonded" id="inputState" class="form-select @error('bonded') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('bonded') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('bonded') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="inputState" class="form-label">Have you ever been convicted of a felony in the past 7years?</label>
                  <div class="form-control-wrap">
                     <select name="convicted" id="convicted" class="form-select @error('convicted') is-invalid @enderror" onchange="showTextArea()">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('convicted') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('convicted') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-12" id="textareaDiv" style="display: none;">
               <div class="form-group">
                  <label for="exampleFormControlTextarea8" class="form-label">Such conviction may be relevant if job related, but does not bar you from employment. If yes - explain</label>    
                  <div class="form-control-wrap">        
                     <textarea name="explain_convicted" class="form-control @error('explain_convicted') is-invalid @enderror" id="explain_convicted" rows="3">{{old('explain_convicted')}}</textarea>    
                  </div>
               </div>
            </div>
            <script>
               /* if convicted = yes, show textarea*/
               function showTextArea() {
                   var selectBox = document.getElementById("convicted");
                   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
               
                   var explainConvictedField = document.getElementById("explain_convicted");
                   var explainConvictedValue = explainConvictedField.value;
               
                   if (selectedValue == "Yes") {
                       document.getElementById("textareaDiv").style.display = "block";
                       if(!explainConvictedValue.trim() === ""){
                        return true;
                       }else{
                        return false;
                       }
                   } else {
                       document.getElementById("textareaDiv").style.display = "none";
                       return true;
                   }
               }

               // trigger the showTextArea() function on page load
               window.addEventListener("load", showTextArea);

            </script>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Driver's License #</label>
                  <div class="form-control-wrap">
                     <input name="drivers_license" value="{{old('drivers_license')}}" type="text" class="form-control @error('drivers_license') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputState" class="form-label">State</label>
                  <div class="form-control-wrap">
                     <select name="drivers_license_state" id="inputState" class="form-select @error('drivers_license_state') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="AK" {{ old('drivers_license_state') == 'AK' ? 'selected' : '' }}>AK</option>
                        <option value="AL" {{ old('drivers_license_state') == 'AL' ? 'selected' : '' }}>AL</option>
                        <option value="AR" {{ old('drivers_license_state') == 'AR' ? 'selected' : '' }}>AR</option>
                        <option value="AZ"  {{ old('drivers_license_state') == 'AZ' ? 'selected' : '' }}>AZ</option>
                        <option value="CA"  {{ old('drivers_license_state') == 'CA' ? 'selected' : '' }}>CA</option>
                        <option value="CO"  {{ old('drivers_license_state') == 'CO' ? 'selected' : '' }}>CO</option>
                        <option value="CT"  {{ old('drivers_license_state') == 'CT' ? 'selected' : '' }}>CT</option>
                        <option value="DC"  {{ old('drivers_license_state') == 'DC' ? 'selected' : '' }}>DC</option>
                        <option value="DE"  {{ old('drivers_license_state') == 'DE' ? 'selected' : '' }}>DE</option>
                        <option value="FL"  {{ old('drivers_license_state') == 'FL' ? 'selected' : '' }}>FL</option>
                        <option value="GA"  {{ old('drivers_license_state') == 'GA' ? 'selected' : '' }}>GA</option>
                        <option value="HI"  {{ old('drivers_license_state') == 'HI' ? 'selected' : '' }}>HI</option>
                        <option value="IA" {{ old('drivers_license_state') == 'IA' ? 'selected' : '' }}>IA</option>
                        <option value="ID" {{ old('drivers_license_state') == 'ID' ? 'selected' : '' }}>ID</option>
                        <option value="IL" {{ old('drivers_license_state') == 'IL' ? 'selected' : '' }}>IL</option>
                        <option value="IN" {{ old('drivers_license_state') == 'IN' ? 'selected' : '' }}>IN</option>
                        <option value="KS" {{ old('drivers_license_state') == 'KS' ? 'selected' : '' }}>KS</option>
                        <option value="KY" {{ old('drivers_license_state') == 'KY' ? 'selected' : '' }}>KY</option>
                        <option value="LA" {{ old('drivers_license_state') == 'LA' ? 'selected' : '' }}>LA</option>
                        <option value="MA" {{ old('drivers_license_state') == 'MA' ? 'selected' : '' }}>MA</option>
                        <option value="MD" {{ old('drivers_license_state') == 'MD' ? 'selected' : '' }}>MD</option>
                        <option value="ME" {{ old('drivers_license_state') == 'ME' ? 'selected' : '' }}>ME</option>
                        <option value="MI" {{ old('drivers_license_state') == 'MI' ? 'selected' : '' }}>MI</option>
                        <option value="MN" {{ old('drivers_license_state') == 'MN' ? 'selected' : '' }}>MN</option>
                        <option value="MO" {{ old('drivers_license_state') == 'MO' ? 'selected' : '' }}>MO</option>
                        <option value="MS" {{ old('drivers_license_state') == 'MS' ? 'selected' : '' }}>MS</option>
                        <option value="MT" {{ old('drivers_license_state') == 'MT' ? 'selected' : '' }}>MT</option>
                        <option value="NC" {{ old('drivers_license_state') == 'NC' ? 'selected' : '' }}>NC</option>
                        <option value="ND" {{ old('drivers_license_state') == 'ND' ? 'selected' : '' }}>ND</option>
                        <option value="NE" {{ old('drivers_license_state') == 'NE' ? 'selected' : '' }}>NE</option>
                        <option value="NH" {{ old('drivers_license_state') == 'NH' ? 'selected' : '' }}>NH</option>
                        <option value="NJ" {{ old('drivers_license_state') == 'NJ' ? 'selected' : '' }}>NJ</option>
                        <option value="NM" {{ old('drivers_license_state') == 'NM' ? 'selected' : '' }}>NM</option>
                        <option value="NV" {{ old('drivers_license_state') == 'NV' ? 'selected' : '' }}>NV</option>
                        <option value="NY" {{ old('drivers_license_state') == 'NY' ? 'selected' : '' }}>NY</option>
                        <option value="OH" {{ old('drivers_license_state') == 'OH' ? 'selected' : '' }}>OH</option>
                        <option value="OK" {{ old('drivers_license_state') == 'OK' ? 'selected' : '' }}>OK</option>
                        <option value="OR" {{ old('drivers_license_state') == 'OR' ? 'selected' : '' }}>OR</option>
                        <option value="PA" {{ old('drivers_license_state') == 'PA' ? 'selected' : '' }}>PA</option>
                        <option value="RI" {{ old('drivers_license_state') == 'RI' ? 'selected' : '' }}>RI</option>
                        <option value="SC" {{ old('drivers_license_state') == 'SC' ? 'selected' : '' }}>SC</option>
                        <option value="SD" {{ old('drivers_license_state') == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="TN" {{ old('drivers_license_state') == 'TN' ? 'selected' : '' }}>TN</option>
                        <option value="TX" {{ old('drivers_license_state') == 'TX' ? 'selected' : '' }}>TX</option>
                        <option value="UT" {{ old('drivers_license_state') == 'UT' ? 'selected' : '' }}>UT</option>
                        <option value="VA" {{ old('drivers_license_state') == 'VA' ? 'selected' : '' }}>VA</option>
                        <option value="VT" {{ old('drivers_license_state') == 'VT' ? 'selected' : '' }}>VT</option>
                        <option value="WA" {{ old('drivers_license_state') == 'WA' ? 'selected' : '' }}>WA</option>
                        <option value="WI" {{ old('drivers_license_state') == 'WI' ? 'selected' : '' }}>WI</option>
                        <option value="WV" {{ old('drivers_license_state') == 'WV' ? 'selected' : '' }}>WV</option>
                        <option value="WY" {{ old('drivers_license_state') == 'WY' ? 'selected' : '' }}>WY</option>
                     </select>
                  </div>
               </div>
            </div>
            <hr style="margin-top: 80px; margin-bottom: 40px;">
            <div class="col-12">
               <h4>Education</h4>
               <p>Currently Attending</p>
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Name and Location of School</label>
                  <div class="form-control-wrap">
                     <input name="edu_current_name_location_school" value="{{old('edu_current_name_location_school')}}" type="text" class="form-control @error('edu_current_name_location_school') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Number of Years Completed</label>
                  <div class="form-control-wrap">
                     <input name="edu_current_number_years" value="{{old('edu_current_number_years')}}" type="number" class="form-control @error('edu_current_number_years') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputState" class="form-label">Did You Graduate?</label>
                  <div class="form-control-wrap">
                     <select name="edu_current_did_graduate" id="inputState" class="form-select @error('edu_current_did_graduate') is-invalid @enderror">
                        <option value="" selected="">Choose...</option>
                        <option value="Yes" {{old('edu_current_did_graduate') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('edu_current_did_graduate') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Subjects Studied</label>
                  <div class="form-control-wrap">
                     <input name="edu_current_subjects_studied" value="{{old('edu_current_subjects_studied')}}" type="text" class="form-control @error('edu_current_subjects_studied') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <div class="col-12">
               <p>Last Completed</p>
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Name and Location of School</label>
                  <div class="form-control-wrap">
                     <input name="edu_last_name_location_school" value="{{old('edu_last_name_location_school')}}" type="text" class="form-control @error('edu_last_name_location_school') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Number of Years Completed</label>
                  <div class="form-control-wrap">
                     <input name="edu_last_number_years" value="{{old('edu_last_number_years')}}" type="number" class="form-control @error('edu_last_number_years') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputState" class="form-label">Did You Graduate?</label>
                  <div class="form-control-wrap">
                     <select name="edu_last_did_graduate" id="inputState" class="form-select @error('edu_last_did_graduate') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('edu_last_did_graduate') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('edu_last_did_graduate') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Subjects Studied</label>
                  <div class="form-control-wrap">
                     <input name="edu_last_subjects_studied" value="{{old('edu_last_subjects_studied')}}" type="text" class="form-control @error('edu_last_subjects_studied') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <hr style="margin-top: 70px; margin-bottom: 30px;">
            <div class="col-12">
               <h4>Trades of Business</h4>
               <p>Currently Attending</p>
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Name and Location of School</label>
                  <div class="form-control-wrap">
                     <input name="trades_current_name_location_school" value="{{old('trades_current_name_location_school')}}" type="text" class="form-control @error('trades_current_name_location_school') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Number of Years Completed</label>
                  <div class="form-control-wrap">
                     <input name="trades_current_number_years" value="{{old('trades_current_number_years')}}" type="number" class="form-control @error('trades_current_number_years') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputState" class="form-label">Did You Graduate?</label>
                  <div class="form-control-wrap">
                     <select name="trades_current_did_graduate" id="inputState" class="form-select @error('trades_current_did_graduate') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('trades_current_did_graduate') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('trades_current_did_graduate') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Subjects Studied</label>
                  <div class="form-control-wrap">
                     <input name="trades_current_subjects_studied" value="{{old('trades_current_subjects_studied')}}" type="text" class="form-control @error('trades_current_subjects_studied') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <div class="col-12">
               <p>Last Attended</p>
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Name and Location of School</label>
                  <div class="form-control-wrap">
                     <input name="trades_last_current_name_location_school" value="{{old('trades_last_current_name_location_school')}}" type="text" class="form-control @error('trades_last_current_name_location_school') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Number of Years Completed</label>
                  <div class="form-control-wrap">
                     <input name="trades_last_current_number_years" value="{{old('trades_last_current_number_years')}}" type="number" class="form-control @error('trades_last_current_number_years') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputState" class="form-label">Did You Graduate?</label>
                  <div class="form-control-wrap">
                     <select name="trades_last_current_did_graduate" id="inputState" class="form-select @error('trades_last_current_did_graduate') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="Yes" {{old('trades_last_current_did_graduate') == 'Yes' ? 'selected' : ''}}>Yes</option>
                        <option value="No" {{old('trades_last_current_did_graduate') == 'No' ? 'selected' : ''}}>No</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Subjects Studied</label>
                  <div class="form-control-wrap">
                     <input name="trades_last_subjects_studied" value="{{old('trades_last_subjects_studied')}}" type="text" class="form-control @error('trades_last_subjects_studied') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea8" class="form-label">
               Summarize special skills and qualifications required from employment or other experiences that may qualify you to work with this company. 
               </label>    
               <div class="form-control-wrap">        
                  <textarea name="special_skills_qualifications" class="form-control @error('special_skills_qualifications') is-invalid @enderror"  rows="3">{{old('special_skills_qualifications')}}</textarea>    
               </div>
            </div>
            <hr style="margin-top: 70px; margin-bottom: 30px;">
            <h4>Past Employment Information</h4>
            <div class="col-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">From</label>
                  <div class="form-control-wrap">
                     <input name="from_date_1" value="{{old('from_date_1')}}" type="date" class="form-control @error('from_date_1') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">To</label>
                  <div class="form-control-wrap">
                     <input name="to_date_1" value="{{old('to_date_1')}}" type="date" class="form-control @error('to_date_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Name and Address of Employer</label>
                  <div class="form-control-wrap">
                     <input name="name_address_employer_1" value="{{old('name_address_employer_1')}}" type="text" class="form-control @error('name_address_employer_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Phone number</label>
                  <div class="form-control-wrap">
                     <input name="phone_number_1" value="{{old('phone_number_1')}}" type="text" class="form-control @error('phone_number_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Salary</label>
                  <div class="form-control-wrap">
                     <input name="salary_1" value="{{old('salary_1')}}" type="number" class="form-control @error('salary_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Job</label>
                  <div class="form-control-wrap">
                     <input name="job_1" value="{{old('job_1')}}" type="text" class="form-control @error('job_1') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Reason for Leaving</label>
                  <div class="form-control-wrap">
                     <input name="reason_leaving_1" value="{{old('reason_leaving_1')}}" type="text" class="form-control @error('reason_leaving_1') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <hr>
            <div class="col-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">From</label>
                  <div class="form-control-wrap">
                     <input name="from_date_2" value="{{old('from_date_2')}}" type="date" class="form-control @error('from_date_2') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">To</label>
                  <div class="form-control-wrap">
                     <input name="to_date_2" value="{{old('to_date_2')}}" type="date" class="form-control @error('to_date_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Name and Address of Employer</label>
                  <div class="form-control-wrap">
                     <input name="name_address_employer_2" value="{{old('name_address_employer_2')}}" type="text" class="form-control @error('name_address_employer_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Phone number</label>
                  <div class="form-control-wrap">
                     <input name="phone_number_2" value="{{old('phone_number_2')}}" type="text" class="form-control @error('phone_number_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Job</label>
                  <div class="form-control-wrap">
                     <input name="job_2" value="{{old('job_2')}}" type="text" class="form-control @error('job_2') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Salary</label>
                  <div class="form-control-wrap">
                     <input name="salary_2" value="{{old('salary_2')}}" type="number" class="form-control @error('salary_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Reason for Leaving</label>
                  <div class="form-control-wrap">
                     <input name="reason_leaving_2" value="{{old('reason_leaving_2')}}" type="text" class="form-control @error('reason_leaving_2') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <hr>
            <div class="col-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">From</label>
                  <div class="form-control-wrap">
                     <input name="from_date_3" value="{{old('from_date_3')}}" type="date" class="form-control @error('from_date_3') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">To</label>
                  <div class="form-control-wrap">
                     <input name="to_date_3" value="{{old('to_date_3')}}" type="date" class="form-control @error('to_date_3') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Name and Address of Employer</label>
                  <div class="form-control-wrap">
                     <input name="name_address_employer_3" value="{{old('name_address_employer_3')}}" type="text" class="form-control @error('name_address_employer_3') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Phone number</label>
                  <div class="form-control-wrap">
                     <input name="phone_number_3" value="{{old('phone_number_3')}}" type="text" class="form-control @error('phone_number_3') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Job</label>
                  <div class="form-control-wrap">
                     <input name="job_3" value="{{old('job_3')}}" type="text" class="form-control @error('job_3') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Salary</label>
                  <div class="form-control-wrap">
                     <input name="salary_3" value="{{old('salary_3')}}" type="number" class="form-control @error('salary_3') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Reason for Leaving</label>
                  <div class="form-control-wrap">
                     <input name="reason_leaving_3" value="{{old('reason_leaving_3')}}" type="text" class="form-control @error('reason_leaving_3') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <hr style="margin-top: 70px; margin-bottom: 30px;">
            <div class="col-12">
               <h4>References</h4>
               <p>Give the name of three persons not related to you to whom you have known at least 1year</p>
            </div>
            <div class="col-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Name</label>
                  <div class="form-control-wrap">
                     <input name="reference_name_1" value="{{old('reference_name_1')}}" type="text" class="form-control @error('reference_name_1') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Address</label>
                  <div class="form-control-wrap">
                     <input name="reference_address_1" value="{{old('reference_address_1')}}" type="text" class="form-control @error('reference_address_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Phone</label>
                  <div class="form-control-wrap">
                     <input name="reference_phone_1" value="{{old('reference_phone_1')}}" type="text" class="form-control @error('reference_phone_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Years Acquainted</label>
                  <div class="form-control-wrap">
                     <input name="reference_years_acquainted_1" value="{{old('reference_years_acquainted_1')}}" type="number" class="form-control @error('reference_years_acquainted_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Name</label>
                  <div class="form-control-wrap">
                     <input name="reference_name_2" value="{{old('reference_name_2')}}" type="text" class="form-control @error('reference_name_2') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Address</label>
                  <div class="form-control-wrap">
                     <input name="reference_address_2" value="{{old('reference_address_2')}}" type="text" class="form-control @error('reference_address_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Phone</label>
                  <div class="form-control-wrap">
                     <input name="reference_phone_2" value="{{old('reference_phone_2')}}" type="text" class="form-control @error('reference_phone_2') is-invalid enderror @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Years Acquainted</label>
                  <div class="form-control-wrap">
                     <input name="reference_years_acquainted_2" value="{{old('reference_years_acquainted_2')}}" type="number" class="form-control @error('reference_years_acquainted_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Name</label>
                  <div class="form-control-wrap">
                     <input name="reference_name_3" value="{{old('reference_name_3')}}" type="text" class="form-control @error('reference_name_3') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Address</label>
                  <div class="form-control-wrap">
                     <input name="reference_address_3" value="{{old('reference_address_3')}}" type="text" class="form-control @error('reference_address_3') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Phone</label>
                  <div class="form-control-wrap">
                     <input name="reference_phone_3" value="{{old('reference_phone_3')}}" type="text" class="form-control @error('reference_phone_3') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Years Acquainted</label>
                  <div class="form-control-wrap">
                     <input name="reference_years_acquainted_3" value="{{old('reference_years_acquainted_3')}}" type="number" class="form-control @error('reference_years_acquainted_3') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <hr style="margin-top: 70px; margin-bottom: 30px;">
            <div class="col-md-12">
               <h4>Languages</h4>
               <p>1# Required. List any foreign language(s) and check the box that best describes your skill level.</p>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Language</label>
                  <div class="form-control-wrap">
                     <input name="language_1" value="{{old('language_1')}}" type="text" class="form-control @error('language_1') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Read and Write</label>
                  <div class="form-control-wrap">
                     <input name="read_write_1" value="{{old('read_write_1')}}" type="text" class="form-control @error('read_write_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Read and Speak</label>
                  <div class="form-control-wrap">
                     <input name="read_speak_1" value="{{old('read_speak_1')}}" type="text" class="form-control @error('read_speak_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Speak Only</label>
                  <div class="form-control-wrap">
                     <input name="speak_only_1" value="{{old('speak_only_1')}}" type="text" class="form-control @error('speak_only_1') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-12">
               <p>#2 Optional</p>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Language</label>
                  <div class="form-control-wrap">
                     <input name="language_2" value="{{old('language_2')}}" type="text" class="form-control @error('language_2') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
               @error('language_2')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Read and Write</label>
                  <div class="form-control-wrap">
                     <input name="read_write_2" value="{{old('read_write_2')}}" type="text" class="form-control @error('read_write_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Read and Speak</label>
                  <div class="form-control-wrap">
                     <input name="read_speak_2" value="{{old('read_speak_2')}}" type="text" class="form-control @error('read_speak_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="form-group">
                  <label for="inputCity" class="form-label">Speak Only</label>
                  <div class="form-control-wrap">
                     <input name="speak_only_2" value="{{old('speak_only_2')}}" type="text" class="form-control @error('speak_only_2') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <hr style="margin-top: 70px; margin-bottom: 30px;">
            <div class="col-12">
               <h4>Emergency</h4>
               <p>In case of emergency notify</p>
            </div>
            <div class="col-12">
               <div class="form-group">
                  <label for="inputAddress2" class="form-label">Address</label>
                  <div class="form-control-wrap">
                     <input name="emergency_address" value="{{old('emergency_address')}}" type="text" class="form-control @error('emergency_address') is-invalid @enderror" id="inputAddress2">
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="inputCity" class="form-label">City</label>
                  <div class="form-control-wrap">
                     <input name="emergency_city" value="{{old('emergency_city')}}" type="text" class="form-control @error('emergency_city') is-invalid @enderror" id="inputCity">
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputState" class="form-label">State</label>
                  <div class="form-control-wrap">
                     <select name="emergency_state" id="inputState" class="form-select @error('emergency_state') is-invalid @enderror">
                        <option value="">Choose...</option>
                        <option value="AK" {{ old('emergency_state') == 'AK' ? 'selected' : '' }}>AK</option>
                        <option value="AL" {{ old('emergency_state') == 'AL' ? 'selected' : '' }}>AL</option>
                        <option value="AR" {{ old('emergency_state') == 'AR' ? 'selected' : '' }}>AR</option>
                        <option value="AZ"  {{ old('emergency_state') == 'AZ' ? 'selected' : '' }}>AZ</option>
                        <option value="CA"  {{ old('emergency_state') == 'CA' ? 'selected' : '' }}>CA</option>
                        <option value="CO"  {{ old('emergency_state') == 'CO' ? 'selected' : '' }}>CO</option>
                        <option value="CT"  {{ old('emergency_state') == 'CT' ? 'selected' : '' }}>CT</option>
                        <option value="DC"  {{ old('emergency_state') == 'DC' ? 'selected' : '' }}>DC</option>
                        <option value="DE"  {{ old('emergency_state') == 'DE' ? 'selected' : '' }}>DE</option>
                        <option value="FL"  {{ old('emergency_state') == 'FL' ? 'selected' : '' }}>FL</option>
                        <option value="GA"  {{ old('emergency_state') == 'GA' ? 'selected' : '' }}>GA</option>
                        <option value="HI"  {{ old('emergency_state') == 'HI' ? 'selected' : '' }}>HI</option>
                        <option value="IA" {{ old('emergency_state') == 'IA' ? 'selected' : '' }}>IA</option>
                        <option value="ID" {{ old('emergency_state') == 'ID' ? 'selected' : '' }}>ID</option>
                        <option value="IL" {{ old('emergency_state') == 'IL' ? 'selected' : '' }}>IL</option>
                        <option value="IN" {{ old('emergency_state') == 'IN' ? 'selected' : '' }}>IN</option>
                        <option value="KS" {{ old('emergency_state') == 'KS' ? 'selected' : '' }}>KS</option>
                        <option value="KY" {{ old('emergency_state') == 'KY' ? 'selected' : '' }}>KY</option>
                        <option value="LA" {{ old('emergency_state') == 'LA' ? 'selected' : '' }}>LA</option>
                        <option value="MA" {{ old('emergency_state') == 'MA' ? 'selected' : '' }}>MA</option>
                        <option value="MD" {{ old('emergency_state') == 'MD' ? 'selected' : '' }}>MD</option>
                        <option value="ME" {{ old('emergency_state') == 'ME' ? 'selected' : '' }}>ME</option>
                        <option value="MI" {{ old('emergency_state') == 'MI' ? 'selected' : '' }}>MI</option>
                        <option value="MN" {{ old('emergency_state') == 'MN' ? 'selected' : '' }}>MN</option>
                        <option value="MO" {{ old('emergency_state') == 'MO' ? 'selected' : '' }}>MO</option>
                        <option value="MS" {{ old('emergency_state') == 'MS' ? 'selected' : '' }}>MS</option>
                        <option value="MT" {{ old('emergency_state') == 'MT' ? 'selected' : '' }}>MT</option>
                        <option value="NC" {{ old('emergency_state') == 'NC' ? 'selected' : '' }}>NC</option>
                        <option value="ND" {{ old('emergency_state') == 'ND' ? 'selected' : '' }}>ND</option>
                        <option value="NE" {{ old('emergency_state') == 'NE' ? 'selected' : '' }}>NE</option>
                        <option value="NH" {{ old('emergency_state') == 'NH' ? 'selected' : '' }}>NH</option>
                        <option value="NJ" {{ old('emergency_state') == 'NJ' ? 'selected' : '' }}>NJ</option>
                        <option value="NM" {{ old('emergency_state') == 'NM' ? 'selected' : '' }}>NM</option>
                        <option value="NV" {{ old('emergency_state') == 'NV' ? 'selected' : '' }}>NV</option>
                        <option value="NY" {{ old('emergency_state') == 'NY' ? 'selected' : '' }}>NY</option>
                        <option value="OH" {{ old('emergency_state') == 'OH' ? 'selected' : '' }}>OH</option>
                        <option value="OK" {{ old('emergency_state') == 'OK' ? 'selected' : '' }}>OK</option>
                        <option value="OR" {{ old('emergency_state') == 'OR' ? 'selected' : '' }}>OR</option>
                        <option value="PA" {{ old('emergency_state') == 'PA' ? 'selected' : '' }}>PA</option>
                        <option value="RI" {{ old('emergency_state') == 'RI' ? 'selected' : '' }}>RI</option>
                        <option value="SC" {{ old('emergency_state') == 'SC' ? 'selected' : '' }}>SC</option>
                        <option value="SD" {{ old('emergency_state') == 'SD' ? 'selected' : '' }}>SD</option>
                        <option value="TN" {{ old('emergency_state') == 'TN' ? 'selected' : '' }}>TN</option>
                        <option value="TX" {{ old('emergency_state') == 'TX' ? 'selected' : '' }}>TX</option>
                        <option value="UT" {{ old('emergency_state') == 'UT' ? 'selected' : '' }}>UT</option>
                        <option value="VA" {{ old('emergency_state') == 'VA' ? 'selected' : '' }}>VA</option>
                        <option value="VT" {{ old('emergency_state') == 'VT' ? 'selected' : '' }}>VT</option>
                        <option value="WA" {{ old('emergency_state') == 'WA' ? 'selected' : '' }}>WA</option>
                        <option value="WI" {{ old('emergency_state') == 'WI' ? 'selected' : '' }}>WI</option>
                        <option value="WV" {{ old('emergency_state') == 'WV' ? 'selected' : '' }}>WV</option>
                        <option value="WY" {{ old('emergency_state') == 'WY' ? 'selected' : '' }}>WY</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                  <label for="inputZip" class="form-label">Zip</label>
                  <div class="form-control-wrap">
                     <input name="emergency_zip" value="{{old('emergency_zip')}}" type="text" class="form-control @error('emergency_zip') is-invalid @enderror" id="inputZip">
                  </div>
               </div>
            </div>
            <hr style="margin-top: 70px; margin-bottom: 30px;">
            <div class="col-12">
               <h4>Conditions of Employment - please read carefully</h4>
               <p>
                  Reporting to work with impaired abilities; or the possession, consumption or distribution of drugs or alcohol on company premises and/or worksites, shall be grounds for disciplinary action, including discharge. A condition of employment includes willingness on the part of applicant or employee to agree to the terms put forth by 1st Access Home Care Incorporated. We are committed to operating a drug free workplace. Violations of our drug and alcohol policy will result in dismissal.
               </p>
               <p>
                  It is understood and agreed upon that any misrepresentation by me in this application will be sufficient cause for cancellation of this application and/or separation from the employer’s service if I have been employed. Furthermore, I understand that just as I am free to resign anytime, the Employer reserves the right to terminate my contract at any time, with or without cause and without prior notice. I understand that no representative of the employer has the authority to make any assurances to the contrary.
               </p>
               <p>
                  I give the employer the right to investigate all police, driving and personal records and references if job related. I hereby release from liability the Employer and it’s representatives for seeking such information and all other persons, corporations or organizations for furnishing such information.
               </p>
               <p>
                  The Employer is an Equal Opportunity Employer. The Employer does not discriminate in employment and no question on this application is used for the purpose of limiting or excusing any applicant’s consideration for employment on a basis prohibited by local, state or Federal law
               </p>
               <p>
                  Any controversy of any kind arising between the parties under this agreement or otherwise (or any agent, officer, director or affiliate of any party), including but not limited to common law, statutory, tort or contract claims, will be submitted to mediation and failing settlement in mediation, to binding arbitration. Unless otherwise agreed mediation and arbitration designated by staff professionals will govern any mediation and arbitration.
                  The parties will select the mediator or arbitrator from the designated company panel of mediators and will notify the designated company, in writing, to initiate the selection process. The arbitration will be subject to and governed by the provisions of the Federal Arbitration Act. 9 U.S.C Section1-et seq. The parties hereto stipulate that this agreement involves matters affecting interstate commerce.
               </p>
               <p>
                  This application is current for 90 days. At the conclusion of this time if I have not heard from the Employer and still wish to be considered for employment, it will be necessary to fill out a new application.
               </p>
            </div>
            <div class="col-md-8">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Signature</label>
                  <div class="flex-row">
                     <div class="wrapper">
                        <canvas id="signature-pad" width="400" height="200"></canvas>
                        <textarea require style="display:none" name="signature" id="signature-input"></textarea>
                     </div>
                     <div class="clear-btn">
                        <button id="clear"><span>Clear</span></button>
                     </div>
                  </div>
                  @error('signature')
                  <div>
                     <p class="alert alert-warning">{{ $message}}</p>
                  </div>
                  @enderror
               </div>
            </div>
            @error('signature')
            <style>
               .wrapper {
               border: 1px solid red !important;
               border-right: 0;
               }
               button#clear {
               height: 100%;
               background: red !important;
               border: 1px solid transparent;
               color: #fff;
               font-weight: 600;
               cursor: pointer;
               }
            </style>
            @endif
            <div class="col-md-4">
               <div class="form-group">
                  <label for="inputEmail4" class="form-label">Date</label>
                  <div class="form-control-wrap">
                     <input name="date_signed" value="{{old('date_signed')}}" type="date" class="form-control @error('date_signed') is-invalid @enderror" id="inputEmail4">
                  </div>
               </div>
            </div>
            <div class="col-12">
               <button id="submit" name="submit" type="submit" class="btn btn-primary">Submit & Continue</button>
            </div>
         </form>
      </div>
   </div>
</div>
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