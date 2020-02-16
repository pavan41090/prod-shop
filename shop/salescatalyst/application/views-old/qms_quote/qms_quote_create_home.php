<script src="<?php echo base_url(); ?>assets/js/qms_js/home.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="tab-content">
   <div class="tab-pane fade " id="car">
      TAB 1
   </div>
   <div class="tab-pane fade" id="two">
      TAB 2
   </div>
   <div class="tab-pane fade" id="travel">
      TAB 3
   </div>
   <div class="tab-pane fade active in" id="home">
      <div ng-controller="MainCtrl">
         <form name="quoteHome" novalidate >
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
                     <input type="text" name="home_first_name"  placeholder="Customer First Name"  class="form-control input-sm" id="home_first_name" ng-model="home_first_name" required />               
                     <div ng-if="quoteHome.$submitted || quoteHome.home_first_name.$dirty" ng-messages="quoteHome.home_first_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="home_last_name"  placeholder="Customer Last Name"   class="form-control input-sm" id="home_last_name"  ng-model="home_last_name" required/> 
                     <div ng-if="quoteHome.$submitted || quoteHome.home_last_name.$dirty" ng-messages="quoteHome.home_last_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>

                 <div class="col-md-4">
                  <div class="form-group">
                     <label>DOB
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="home_dob"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="home_dob" onkeyup="return dob_validate(this.value);" ng-model="home_dob" required />
                     <div ng-if="quoteHome.$submitted || quoteHome.home_dob.$dirty" class="required" id="dobalert" ng-messages="quoteHome.home_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter DOB</div>
                     </div>
                  </div>
               </div>

            </div>
            
            
            <div class="row maincontf">
              
               
               <div class="col-md-4">
                  <div class="form-group">
                     <label>State
                     </label><span class="required"> * </span>
                     <input list="state" placeholder="Select State" id="home_state" name="home_state" class="form-control input-sm" ng-model="home_state" required>
                      <datalist id="state">
                        <option value="">Select State</option>
                        <?php 
                           foreach($stateArray as $state )
                           {
                               echo '<option value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.home_state.$dirty" ng-messages="quoteHome.home_state.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter State</div>
                     </div>
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="form-group">
                     <label>City <span class="required"> * </span>
                     </label> 
                     <div id="home_city-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="home_city-div" style="">
                        <input list="home_city_list" placeholder="Select city" id="home_city" name="home_city" class="form-control input-sm" ng-model="home_city" required>
                        <datalist id="home_city_list">
                           <option value="">Select city</option>
                  </datalist>
                        <div ng-if="quoteHome.$submitted || quoteHome.home_city.$dirty" ng-messages="quoteHome.home_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div>
                  </div>
               </div>


                <div class="col-md-4">
                  <div class="form-group">
                     <label>Plans
                     <span class="required"> * </span></label>
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="home_plans" ng-model='home_plans' checked ng-value="0"  value="0" required> Silver </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="home_plans"  ng-model='home_plans' ng-value="1"  value="1" required> Gold</label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="home_plans"  ng-model='home_plans' ng-value="2"  value="2" required> Platinum </label>
                        <p class="required" id="error_age_structure"></p>
                        <div ng-if="quoteHome.$submitted || quoteHome.home_plans.$dirty" ng-messages="quoteHome.home_plans.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Plan</div>
                        </div>
                     </div>
                  </div>
               </div>




            </div>
            <div class="row maincontf">
               
               

              
                <div class="col-md-4">
                  <div class="form-group">
                     <label>Policy Start
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="home_policy_start"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="home_policy_start" ng-model="home_policy_start" required />
                     <div ng-if="quoteHome.$submitted " ng-messages="quoteHome.home_policy_start.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Policy Start Date</div>
                     </div>
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="form-group">
                     <label>Policy End
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="home_policy_end"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="home_policy_end" ng-model="home_policy_end" required />
                     <div ng-if="quoteHome.$submitted " ng-messages="quoteHome.home_policy_end.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Policy End Date</div>
                     </div>
                  </div>
               </div>


               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>                          
                     <input type="text" id="home_mobile" name="home_mobile" MaxLength="10" class="form-control input-sm" placeholder="Mobile Number" ng-model="home_mobile" onkeyup="return mobile_validate(this.value);" required>  
                  
                     <div ng-if="quoteHome.$submitted || quoteHome.home_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteHome.home_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Mobile Number</div>
                     </div>
                  </div>
               </div>
              
            </div>
           
           
            <div class="row maincontf">
               
              
               
            
            
               <div class="col-md-4">
                  <div class="form-group">
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="text" id="home_email" name="home_email" class="form-control input-sm" placeholder="E-Mail" ng-model="home_email" onkeyup="return email_validate(this.value);" required>   
                     
                     <div ng-if="quoteHome.$submitted || quoteHome.home_email.$dirty" class="required" id="emailwar" ng-messages="quoteHome.home_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Policy End Date</div>
                     </div>
                  </div>
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
<!-- <script >
   $('input[name="home_plans"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#home_fields_hide').hide(); 
         $('#error_age_structure').html('Pls contact Bank!!');
         //document.getElementById("demo").innerHTML = "Pls contact Bank!!"; 
      } else {
         
         $('#home_fields_hide ').show(); 
         document.getElementById("error_age_structure").innerHTML = ""; 
      }
   }).change();
   
   
   
   $('input[name="basement"]').on('click', function() {
      var value = $(this).val();
      if(value == 0) {
         $('#home_fields_hide').hide(); 
          document.getElementById("error_basement").innerHTML = "Hi!!"; 
      } else {
         
         $('#home_fields_hide ').show();  
         document.getElementById("error_basement").innerHTML = ""; 
      }
   }).change();
   </script>
   
   <script>
   
   $('input[name="basement"]').on('click', function() {
      var value = $(this).val();
      if(value == 0) {
         $('#construct').hide(); 
         
      } else {
         
         $('#construct ').show();  
      }
   }).change();
   
   </script>
   
   <script>
   
   $('input[name="Construction"]').on('click', function() {
      var value = $(this).val();
      if(value == 0) {
         $('#home_fields_hide').hide(); 
         document.getElementById("error_construct").innerHTML = "go back!!"; 
      } else {
         
         $('#home_fields_hide').show(); 
         document.getElementById("error_construct").innerHTML = "";  
      }
   }).change();
   
   </script>-->
<script>
   $("#home_state").on('change', function() {      
   
         var state_id = $(this).val();
         var dataString ='state_id=' + state_id;
  
var weburl = $('#web_url').val();
       var URL = weburl+'Commoncontrol/getCityByStateID/';
 
           $.ajax({
   
                 url : URL,
                  type : 'POST',
                  data : {
                      'state_id' : state_id},
                  dataType:'json',
                
                  success: function( data){
                 
                    //var stateArray = JSON.parse(data);
           $('#home_city-div').hide();      
           $('#home_city-loader').show();
           $('#home_city').val('');
           $('#home_city_list').find('option')
                .remove()
                .end()
                .append('<option value="">Select city</option>')
                .val('');
                       
                    $.each(data, function(key, value) {
                       $('#home_city_list')
                       .append($("<option></option>")
                       .attr("value",value['id'])
                       .text(value['name']));
                      
                    });  
                    setTimeout(function(){
                 $('#home_city-div').show();      
                 $('#home_city-loader').hide();
                 $('#home_city').focus();
                }, 1500); 
                   
                
             
              
                  },
                 
              });
                     
   
   
     });
   
   
</script>
<script>
//date select to add 1 year
  $(document).ready(function () {
    
      $("#home_policy_end").attr("disabled", "disabled"); 

      $("#home_policy_start").datepicker({
         format: 'dd-mm-yyyy',
         autoclose: true,
         todayHighlight: true,
         startDate: "+0d",
      }); 

      // $("#home_policy_end").datepicker({
      //    format: 'dd-mm-yyyy',
      //    autoclose: true,
      //    todayHighlight: true,
      // }); 
          
      $("#home_policy_start").on('change', function() { 

      var date2 = $('#home_policy_start').datepicker('getDate');
         date2.setDate(date2.getDate() + 364);
         $('#home_policy_end').datepicker('setDate', date2);
         $("#home_policy_end").attr("disabled", "disabled"); 
         
      });

        });

        
</script>


<!-- <script>
   $(document).ready(function(){
      var date_input=$('input[name="Home_mx_Target_Date"]'); //our date input has the name "date"
      
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
         format: 'dd-mm-yyyy',
         container: container,
         todayHighlight: true,
         autoclose: true,
      })
   });
</script> 
 -->
