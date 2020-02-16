<script src="<?php echo base_url(); ?>assets/js/qms_js/sship.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="tab-content">
   <div class="tab-pane fade active in" id="health">
      <div ng-controller="MainCtrl">
         <form name="quotesship" novalidate >
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">create Quote</span>
               </div>
            </div>
            <!--start create leads-->
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="sship_first_name"  placeholder="Customer First Name"  class="form-control input-sm" id="sship_first_name" ng-model="sship_first_name" required />               
                     <div ng-if="quotesship.$submitted || quotesship.sship_first_name.$dirty" ng-messages="quotesship.sship_first_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="sship_last_name"  placeholder="Customer Last Name"   class="form-control input-sm" id="sship_last_name"  ng-model="sship_last_name" required/> 
                     <div ng-if="quotesship.$submitted || quotesship.sship_last_name.$dirty" ng-messages="quotesship.sship_last_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>DOB
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name=" "  placeholder="DD-MM-YYYY"  onkeyup="return dob_validate(this.value);"   class="form-control input-sm" id="sship_dob" ng-model="sship_dob" required />
                     <div ng-if="quotesship.$submitted || quotesship.sship_dob.$dirty" class="required" id="dobalert" ng-messages="quotesship.sship_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter DOB</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>State <span class="required"> * </span></label>
                     <input list="state" placeholder="Select State" id="sship_state" name="sship_state" class="form-control input-sm" ng-model="sship_state" required>
                     <datalist id="state">
                        <option value="">Select State</option>
                        <?php 
                           foreach($stateArray as $state )
                           {
                               echo '<option  value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="quotesship.$submitted || quotesship.sship_state.$dirty" ng-messages="quotesship.sship_state.$error" role="alert">
                        <div ng-message="required" class="required">Please Select State</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> City <span class="required"> * </span></label>
                     <div id="sship_city-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="sship_city-div" style="">
<!--                         <select id="sship_city" name="sship_city" class="form-control input-sm" ng-model="sship_city" required>
                           <option value="">Select city</option>
                        </select> -->
                        <input list="city" placeholder="Select city" id="sship_city"  name="sship_city" class="form-control input-sm" ng-model="sship_city" required>
                            <datalist id="city">
                                <option value="">Select city</option>
                            </datalist> 

                        <div ng-if="quotesship.$submitted || quotesship.sship_city.$dirty" ng-messages="quotesship.sship_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Pincode<span class="required"> * </span></label>                          
                     <input type="text" name="critical_zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="sship_zip" ng-model="sship_zip" required >
                     <div ng-if="quotesship.$submitted || quotesship.sship_zip.$dirty"  class="required" id="post" ng-messages="quotesship.sship_zip.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Policy Term (in Years)
                     <span class="required"> * </span></label>  
                     <input list="Policy_Term" placeholder=" Select Policy Term" id="sship_policy_term" name="sship_policy_term" class="form-control input-sm" ng-model="sship_policy_term" required>
                     <datalist id="Policy_Term">
                        <option value="Select Policy Term"></option>
                        <option value="1"></option>
                        <option value="2"></option>
                        <option value="3"></option>
                     </datalist>
                     <div ng-if="quotesship.$submitted" ng-messages="quotesship.sship_policy_term.$error" role="alert">
                        <div ng-message="required" class="required">Please Select your Policy Term</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Email <span class="required"> * </span></label>                          
                     <input type="text" id="sship_email" name="sship_email" class="form-control input-sm" placeholder="E-Mail" ng-model="sship_email" onkeyup="return email_validate(this.value);" required>   
                     <p class="required" id="emailwar"></p>
                     <div ng-if="quotesship.$submitted || quotesship.sship_email.$dirty" ng-messages="quotesship.sship_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter your E-mail</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>                          
                     <input type="text" id="sship_mobile" name="sship_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="sship_mobile"  maxlength="10" onkeyup="return mobile_validate(this.value);" required>  
                     <div ng-if="quotesship.$submitted || quotesship.sship_mobile.$dirty" class="required" id="mobilewar" ng-messages="quotesship.sship_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter your E-mail</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Income (P.A)
                     <span class="required"> * </span></label>
                     <div class="radio-list">
                        <input type="text" id="sship_income" name="sship_income" class="form-control input-sm" placeholder="Income (P.A)" ng-model="sship_income" required /> 
                        <div ng-if="quotesship.$submitted || quotesship.sship_income.$dirty" ng-messages="quotesship.sship_income.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter your Income</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <div class="question">
                        <label>Include Spouse</label> <span class="required">  </span>
                        
                        <input class="sship_spouse" type="checkbox" name="sship_spouse" id="sship_spouse_check" value="1" ng-model="sship_spouse_check" />
                     </div>
                     <div class="answer">
                        <input type="text" id="sship_spouse_value" name="sship_spouse_value" class="form-control input-sm" placeholder="Spouse Date of Birth" ng-model="sship_spouse_value">
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Include Children </label><span class="required">  </span>
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="sship_include_child"  ng-model='sship_include_child' ng-value='0' required> 0 </label>   
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="sship_include_child" ng-model='sship_include_child'  ng-value='1' required> 1 </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="sship_include_child" ng-model='sship_include_child'  ng-value='2' required> 2 </label>    
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="sship_include_child" ng-model='sship_include_child'  ng-value='3' required> 3 </label>        
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
               </div>
               <div class="col-md-4">
                  &nbsp;
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-2">
                  <div class="form-group">
                     <!--<button type="submit"  class="btn blue btn-default" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
                     <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                     <!-- Modal -->
                     <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                        <div class="modal-dialog">
                           <img src="assets/images/ajax-loader.gif"></img>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <button type="submit" class="btn blue btn-default" ng-click="pset()">Calculate Premium</button> 
                     <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="form-group">
                     <button type="button" id="reset" class="btn blue btn-default">Reset</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>    
   $('input[name="typeoftrip"]').on('change', function() {
     $('.multitrips').toggle(+this.value === 1 && this.checked);
   
   }).change();
    $('input[name="policyType"]').on('click', function() {
    
      var value = $(this).val();
      if(value == 1) {
         $('#annualTrip').hide();  
      } else {
         $('#annualTrip').show();  
      }
     //annualTrip
   }).change();
    $('input[name="policyType"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#covertype').hide();  
      } else {
         $('#covertype').show();  
      }
     
   }).change();
</script>
<script>
   $(".answer").hide();
   $(".sship_spouse").click(function() {
       if($(this).is(":checked")) {
           $(".answer").show();
       } else {
           $(".answer").hide();
       }
   });
</script>
<script>
   $("#sship_state").on('change', function() {
     
             
   
      var state_id = $(this).val();
      var dataString ='state_id=' + state_id;
      var webUbrl = $('#web_url').val();
      var URL = webUbrl+'Commoncontrol/getCityByStateID/';
        $.ajax({
   
              url : URL,
               type : 'POST',
               data : {
                   'state_id' : state_id},
               dataType:'json',
             
               success: function( data){
              
                 //var stateArray = JSON.parse(data);
        $('#sship_city-div').hide();      
        $('#sship_city-loader').show();
        $('#city').find('option')
             .remove()
             .end()
             .append('<option value="">Select city</option>')
             .val('');
                    
                 $.each(data, function(key, value) {
                    $('#city')
                    .append($("<option></option>")
                    .attr("value",value['id'])
                    .text(value['name']));
                   
                 });  
                 setTimeout(function(){
              $('#sship_city-div').show();      
              $('#sship_city-loader').hide();
               $('#sship_city').focus();
           }, 1500); 
                  },
   
               });
   
         });
</script>
<!-- Mobile -->
<script>
   $(document).ready(function(){
      var date_input=$('input[name="sship_mx_Target_Date"]'); //our date input has the name "date"
      
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
         format: 'dd-mm-yyyy',
         container: container,
         todayHighlight: true,
         autoclose: true,
      })
   });
</script>