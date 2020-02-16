<script src="<?php echo base_url(); ?>assets/js/qms_js/critical_proposal.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title">Quotes - <?php echo $title ?>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html ">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Quote</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span>critical-illnes Proposal </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption">Critical-illnes Proposal </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">
                     <form name="critical" novalidate>
                        <div class="row maincontf">
                           <div class="col-md-4">
<!--                              
                              <div class="form-group">
                                 <label>Policy Start Date
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="ctill_pro_policy_sdate"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="ctill_pro_policy_sdate" ng-model="ctill_pro_policy_sdate" required />
                                 <div ng-if="critical.$submitted || critical.ctill_pro_policy_sdate.$dirty" ng-messages="critical.ctill_pro_policy_sdate.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div> -->


                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="ctill_pro_policy_sdate" name="ctill_pro_policy_sdate" class="form-control input-sm" placeholder="DD-MM-YYYY" ng-model="ctill_pro_policy_sdate" required>
                     <div ng-if="quoteCar.$submitted" ng-messages="quoteCar.ctill_pro_policy_sdate.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter policy start date</div>
                     </div>
                  </div>


                           </div>
                        </div>
                        <h4 class="propsal-seperator">Tell us more about your self </h4>
                        <hr>
                         <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Title
                                 <span class="required"> * </span>
                                 </label>
                                 <input list="title" placeholder="Select Title" id="ctill_pro_title" name="ctill_pro_title" class="form-control input-sm" ng-model="ctill_pro_title" ng-model="ctill_pro_title" required>
                                 <datalist id="title">
                                    <option value="Mr"></option>
                                    <option value="Mrs"></option>
                                  </datalist>
                                  <div ng-if="critical.$submitted || critical.ctill_pro_title.$dirty" ng-messages="critical.ctill_pro_title.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Title</div>
                            </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> First Name <span class="required"> * </span></label>
                                 <input type="text" name="ctill_pro_fname" placeholder="Enter First Name" class="form-control input-sm" id="ctill_pro_fname" ng-model="ctill_pro_fname" required/>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_fname.$dirty" ng-messages="critical.ctill_pro_fname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter First Name</div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Last Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="ctill_pro_lname" placeholder="Enter Last Name" class="form-control input-sm" id="ctill_pro_lname" ng-model="ctill_pro_lname" required />
                                 <div ng-if="critical.$submitted || critical.ctill_pro_lname.$dirty" ng-messages="critical.ctill_pro_lname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Date of Birth
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="ctill_pro_dob"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="ctill_pro_dob" ng-model="ctill_pro_dob" required />
                                 <div ng-if="critical.$submitted || critical.ctill_pro_dob.$dirty" ng-messages="critical.ctill_pro_dob.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 1
                                 <span class="required"> * </span></label>
                                 <input type="text" name="ctill_pro_add1" placeholder="Enter Address Line 1" class="form-control input-sm" id="ctill_pro_add1" ng-model="ctill_pro_add1" required />
                                 <div ng-if="critical.$submitted || critical.ctill_pro_add1.$dirty" ng-messages="critical.ctill_pro_add1.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address1</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 2
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="ctill_pro_add2" placeholder="Enter Address Line 2" class="form-control input-sm" id="ctill_pro_add2" ng-model="ctill_pro_add2" required />
                                 <div ng-if="critical.$submitted || critical.ctill_pro_add2.$dirty" ng-messages="critical.ctill_pro_add2.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address2</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">

                            <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nearest Land Mark <span class="required"> * </span></label>
                                 <input type="text" name="ctill_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="ctill_pro_landmark" ng-model="ctill_pro_landmark" required/>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_landmark.$dirty" ng-messages="critical.ctill_pro_landmark.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Landmark</div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> State <span class="required"> * </span></label>
                            <input list="state" placeholder="Select State" id="ctill_pro_state" name="ctill_pro_state" class="form-control input-sm" ng-model="ctill_pro_state" required>
                            <datalist id="state">
                                <option value="">Select State</option>
                                <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>
                            </datalist>
                             
                                 <div ng-if="critical.$submitted || critical.ctill_pro_state.$dirty" ng-messages="critical.ctill_pro_state.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter State</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                <label> City <span class="required"> * </span></label>
                                       <div id="ctill_pro_city-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="ctill_pro_city-div" style="">
                                             <input list="city" placeholder="Select city" id="ctill_pro_city"  name="ctill_pro_city" class="form-control input-sm" ng-model="ctill_pro_city" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                       </datalist>   
                               
                                 <div ng-if="critical.$submitted || critical.ctill_pro_city.$dirty" ng-messages="critical.ctill_pro_city.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter City</div>
                                 </div>
                              </div>
                          </div>
                           </div>

                        </div>
                        <div class="row maincontf">
                          
                           <div class="col-md-4">
                              <div class="form-group">
                            <label>E-mail <span class="required"> * </span></label>
                            <input type="text" id="ctill_pro_email" name="ctill_pro_email" class="form-control input-sm" placeholder="Enter E-Mail" ng-model="ctill_pro_email" onkeyup="return email_validate(this.value,);" required>
                                  <div ng-if="critical.$submitted || critical.ctill_pro_email.$dirty" class="required" id="emailwar" ng-messages="critical.ctill_pro_email.$error" role="alert">

                                <div ng-message="required" class="required">Please Enter Email</div>
                            </div>
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="ctill_pro_mobile" name="ctill_pro_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="ctill_pro_mobile" MaxLength="10" onkeyup="mobile_validate_ci(this.value,'mob');" required>
                                  <div ng-if="critical.$submitted || critical.ctill_pro_mobile.$dirty" class="required" id="mobilewar" ng-messages="critical.ctill_pro_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Emergency Contact Number <span class="required"> * </span></label>
                            <input type="text" id="ctill__emnum" name="ctill_pro_emnum" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="ctill_pro_emnum" MaxLength="10" onkeyup="mobile_validate_ci(this.value,'emer');" required>
                                  <div ng-if="critical.$submitted || critical.ctill_pro_emnum.$dirty" class="required" id="mobileemer" ng-messages="critical.ctill_pro_emnum.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Emergency Number</div>
                            </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>GSTN
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="ctill_pro_gstn" placeholder="Enter GSTN" class="form-control input-sm" id="ctill_pro_gstn" ng-model="ctill_pro_gstn" required />
                                 <div ng-if="critical.$submitted || critical.ctill_pro_gstn.$dirty" ng-messages="critical.ctill_pro_gstn.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Gstn</div>
                                 </div>
                              </div>
                           </div>

                           
                          
                        </div>
                        
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury, accident or any medical condition?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_suffered" ng-model='ctill_pro_suffered' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_suffered" ng-model='ctill_pro_suffered' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_suffered.$dirty" ng-messages="critical.ctill_pro_suffered.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select suffering from any disease</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Have you or any other member(s) proposed to be insured admitted to a hospital or a nursing home or had any test or imaging like CT/MRI scan Sonography or 2D Echo etc. done in the last ten years other than routine health check-up or pre-employment check-up?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_Sonography" ng-model='ctill_pro_Sonography' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_Sonography" ng-model='ctill_pro_Sonography' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_Sonography.$dirty" ng-messages="critical.ctill_pro_Sonography.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select pre-employment check-up</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Have you or any other member(s) proposed to be insured had any surgery in the last ten years or has surgery ever been recommended or are you awaiting any surgical operation?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_surgery" ng-model='ctill_pro_surgery' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_surgery" ng-model='ctill_pro_surgery' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_surgery.$dirty" ng-messages="critical.ctill_pro_surgery.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select any surgical operation</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Have you or any other member(s) proposed to be insured taken any medication for more than 2 weeks in last 5 years?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_medication" ng-model='ctill_pro_medication' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_medication" ng-model='ctill_pro_medication' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_medication.$dirty" ng-messages="critical.ctill_pro_medication.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select any medication for more than 2 weeks in last 5 years</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Have You Been Hospitalized As An In-Patient In The Last 4 Years?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_Patient" ng-model='ctill_pro_Patient' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_Patient" ng-model='ctill_pro_Patient' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_Patient.$dirty" ng-messages="critical.ctill_pro_Patient.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select As An In-Patient In The Last 4 Years</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured ever had or has a doctor ever said that you have any of the following conditions / diseases: High blood pressure, diabetes or sugar, any heart related ailment, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_breathing" ng-model='ctill_pro_breathing' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_breathing" ng-model='ctill_pro_breathing' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_breathing.$dirty" ng-messages="critical.ctill_pro_breathing.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Has any application for life, Health or critical illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">

                                    <input type="radio" name="ctill_pro_illness" ng-model='ctill_pro_illness' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_illness" ng-model='ctill_pro_illness' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_illness.$dirty" ng-messages="critical.ctill_pro_illness.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select suffering from any pre existing illness</div>
                                 </div>
                                
                              </div>
                           </div>
                        </div>
                       <h4 class="propsal-seperator">Information For Issuance Of Tax Statement(Section 80D Of Income Tax Act 1961) </h4>
                        <hr>

                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Are you the primary insured?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_prosemi" ng-model='ctill_pro_prosemi' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="ctill_pro_prosemi" ng-model='ctill_pro_prosemi' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_prosemi.$dirty" ng-messages="critical.ctill_pro_prosemi.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                         <div class="row maincontf">
                        <div class="col-md-4">
                              <div class="form-group">
                                 <label>Your Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="ctill_pro_yname" placeholder="Enter Last Name" class="form-control input-sm" id="ctill_pro_yname" ng-model="ctill_pro_yname" required />
                                 <div ng-if="critical.$submitted || critical.ctill_pro_yname.$dirty" ng-messages="critical.ctill_pro_yname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                       
                         <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary Insured <span class="required"> * </span></label>
                              <input list="relation" placeholder="Select Gender" id="ctill_pro_relation" name="ctill_pro_relation" class="form-control input-sm" ng-model="ctill_pro_relation"  required>
                                 <datalist id="relation">
                                  
                                    <option value="Father"></option>
                                    <option value="Mother"></option>
                                    <option value="Brother"></option>
                                    <option value="Sister"></option>
                                    <option value="Spouse"></option>
                                    <option value="Son"></option>
                                    <option value="Daughter"></option>

                                 </datalist>
                                 <div ng-if="critical.$submitted || critical.ctill_pro_relation.$dirty" ng-messages="critical.ctill_pro_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Gender</div>
                                 </div>
                              </div>
                           </div>
                           
                           
                        </div>
              
                          
                           
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <a href="qms-critical-premium">
                                 <button type="button" id="" class="btn blue btn-default">Back</button>
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                     <a href="<?php echo base_url(); ?>qms-critical-proposal-view"  >
                                    <button type="submit"  class="btn blue btn-default send_quote" ng-click="proposal()" >Procced to Proposal</button>
                                    </a>
                                 </div>
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
   <!--<div class="note note-info">
      <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
      </div>-->
</div>
<script>
     $("#ctill_pro_state").on('change', function() {
      
              
              

       var state_id = $(this).val();
       var dataString ='state_id=' + state_id;
       var webUrl = $('#web_url').val()
       var URL = webUrl+'Commoncontrol/getCityByStateID/';
         $.ajax({

               url : URL,
                type : 'POST',
                data : {
                    'state_id' : state_id},
                dataType:'json',
              
                success: function( data){
               
                  //var stateArray = JSON.parse(data);
         $('#ctill_pro_city-div').hide();      
         $('#ctill_pro_city-loader').show();
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
               $('#ctill_pro_city-div').show();      
               $('#ctill_pro_city-loader').hide();
               $('#ctill_pro_city').focus();
            }, 1500); 
                   },

                });

          });
</script>

<script>

// POSTCODE

function postcode_validate(zipcode)
{
   var txt = '';
   var regPostcode = /^([1-9])([0-9]){5}$/;
   if(regPostcode.test(zipcode) == false)
   {
      text =  "Please enter a valid Postcode";  
   } else {
      text = '';
   }
   $('#post').html(text);
}



// MOBILE

   function mobile_validate_ci(Mobile,type)
{
   
   var Mobilenum = /^([1-9])([0-9]){9}$/;
   if(Mobilenum.test(Mobile) == false)
   {
      text = "Please Enter a Valid Mobile Number";  
   } else {
      text="";
   }

  if(type == 'mob')
      $('#mobilewar').html(text);
  else 
      $('#mobileemer').html(text);
    
}


// EMAIL

 function email_validate(email)
{
   
  var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
   if(re.test(email) == false)
   {
      text = "Please Enter a Valid Email";  
   } else {
      text="";
   }
   $('#emailwar').html(text);
}
</script>
