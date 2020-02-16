<script src="<?php echo base_url(); ?>assets/js/qms_js/health.js"></script>
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
   <div class="tab-pane fade" id="home">
      TAB 4
   </div>
   <div class="tab-pane fade active in" id="health">
      <div ng-controller="MainCtrl">
         <form name="quoteHealth" novalidate >
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
                     <input type="text" name="health_first_name"  placeholder="Customer First Name"  class="form-control input-sm" id="health_first_name" ng-model="health_first_name" required />               
                     <div ng-if="quoteHealth.$submitted || quoteHealth.health_first_name.$dirty" ng-messages="quoteHealth.health_first_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="health_last_name"  placeholder="Customer Last Name"   class="form-control input-sm" id="health_last_name"  ng-model="health_last_name" required/> 
                     <div ng-if="quoteHealth.$submitted || quoteHealth.health_last_name.$dirty" ng-messages="quoteHealth.health_last_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>DOB
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="health_dob"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="health_dob" ng-model="health_dob" onkeyup="return dob_validate(this.value);" required />
                     <div ng-if="quoteHealth.$submitted || quoteHealth.health_dob.$dirty" class="required" id="dobalert" ng-messages="quoteHealth.health_dob.$error" role="alert">
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
                     <input list="state" placeholder="Select State" id="health_state" name="health_state" class="form-control input-sm" ng-model="health_state" required>
                     <datalist id="state">
                        <option value="">Select State</option>
                        <?php 
                           foreach($stateArray as $state )
                           {
                               echo '<option value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="quoteHealth.$submitted || quoteHealth.health_state.$dirty" ng-messages="quoteHealth.health_state.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter State</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>City <span class="required"> * </span>
                     </label> 
                     <div id="health_city-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="health_city-div" style="">
                        <input list="city" placeholder="Select city" id="health_city" name="health_city" class="form-control input-sm" ng-model="health_city" required>
                        <datalist id="city">
                           <option value="">Select city</option>
                      </datalist>
                        <div ng-if="quoteHealth.$submitted || quoteHealth.health_city.$dirty" ng-messages="quoteHealth.health_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Pincode<span class="required"> * </span></label>                          
                     <input type="text" name="health_zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="health_zip" ng-model="health_zip" required >

                     <div ng-if="quoteHealth.$submitted || quoteHealth.health_zip.$dirty" class="required" id="post" ng-messages="quoteHealth.health_zip.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>

            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>                          
                     <input type="text" id="health_mobile" name="health_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="health_mobile" " MaxLength="10" onkeyup="mobile_validate(this.value);" required>   
                     <div ng-if="quoteHealth.$submitted || quoteHealth.health_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteHealth.health_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Mobile Number</div>
                     </div>
                  </div>
               </div>
<div class="col-md-4">
                  <div class="form-group">
                     <label>Email <span class="required"> * </span></label>                          
                     <input type="text" id="health_email" name="health_email" class="form-control input-sm" placeholder="E-Mail" ng-model="health_email"  onkeyup="return email_validate(this.value);" required>
                     <div ng-if="quoteHealth.$submitted || quoteHealth.health_email.$dirty" class="required" id="emailwar" ng-messages="quoteHealth.health_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter your E-mail</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Occupation<span class="required"> * </span></label>
                     <div class="radio-list">
                        <input  list="health_occupation_list" placeholder="Select health_occupation" id="health_occupation" name="health_occupation" class="form-control input-sm" ng-model="health_occupation" required>
                        <datalist id="health_occupation_list">
                           <option value="5000">MANAGER/ADMINISTRATIVE</option>
                           <option value="5001">BUSINESS OWNER</option>
                           <option value="5002">SALESPERSON DOING FIELD VISITS</option>
                           <option value="5003">PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)</option>
                           <option value="5004">IT/ITES PROFESSIONAL</option>
                           <option value="5005">BUILDER/CONTRACTOR</option>
                           <option value="5006">MACHINE OPERATOR/MANUAL LABOR</option>
                           <option value="5007">DRIVER (PRIVATE BUS / CAR)</option>
                        </datalist>
                        <div ng-if="quoteHealth.$submitted || quoteHealth.health_occupation.$dirty" ng-messages="quoteHealth.health_occupation.$error" role="alert">
                           <div ng-message="required" class="required">Please Select your health_occupation</div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
            <div class="row maincontf">

            <div class="col-md-4">
               <div class="form-group">
               <label>Customer Gender</label>  <span class="required"> * </span>
               <input list="customer_gender" placeholder="Select Gender"   class="form-control input-sm" name="health_gender" id="health_gender" ng-model="health_gender" required>
                  <datalist id="customer_gender">
                     <option value="Select Gender"></option>
                     <option value="male"></option>
                     <option value="female"></option>
                  </datalist>
                  <div ng-if="quoteHealth.$submitted || quoteHealth.health_gender.$dirty" ng-messages="quoteHealth.health_gender.$error" role="alert">
                     <div ng-message="required" class="required">Please Select Customer Gende</div>
                  </div>
               </div>
            </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <div class="question">
                        <label>Include Spouse DOB </label>
                        <input class="coupon_question" type="checkbox" id="health_spouse_dob_check" name="health_spouse_dob_check"  value="1" />
                     </div>
                     <div class="answer">
                        <input type="text" id="health_spouse_dob_value" name="health_spouse_dob_value" class="form-control input-sm" placeholder="Spouse Date of Birth" ng-model="health_spouse_dob_value" >
                        <!--        <div ng-if="quoteSShip.$submitted" ng-messages="quoteSShip.dateofbirthhealth.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter your Date of Birth</div>
                           </div> -->
                     </div>
                  </div>
               </div>               


               <div class="col-md-4">
                  <div class="form-group">
                     <label>Include Children</label> <span class="required"> </span>
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="health_include_children"  ng-model='health_include_children' checked="checked" ng-value="0"  value="0" required> 0 </label>   
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="health_include_children" ng-model='health_include_children' ng-value="1"  value="1" required> 1 </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="health_include_children" ng-model='health_include_children' ng-value="2"  value="2" > 2 </label>      
                     </div>
                     <!--                                           <div ng-if="quoteHealth.$submitted || quoteHealth.health_include_children.$dirty" ng-messages="quoteHealth.health_include_children.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Children</div>
                        
                        </div> -->
                  </div>
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
                     <!--  <button  class="btn blue btn-default" ng-click="pset()" ng-disabled="form.$invalid" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
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
 $("#health_state").on('change', function() {      

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
         $('#health_city-div').hide();      
         $('#health_city-loader').show();
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
               $('#health_city-div').show();      
               $('#health_city-loader').hide();
               $('#health_city').focus();
              }, 1500); 
                 
              
           
            
                },
               
            });
                   


   });


</script>

<script>
$(".answer").hide();
$(".coupon_question").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
    } else {
        $(".answer").hide();
    }
});
</script>

<script>
   $(document).ready(function(){
      var date_input=$('input[name="health_mx_Target_Date"]'); //our date input has the name "date"
      
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
         format: 'dd-mm-yyyy',
         container: container,
         todayHighlight: true,
         autoclose: true,
      })
   });
</script> 

