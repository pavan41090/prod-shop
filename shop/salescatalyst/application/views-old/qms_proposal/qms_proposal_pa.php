<script src="<?php echo base_url(); ?>assets/js/qms_js/pa_proposal.js"></script>
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
               <span>Personal Accident</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption">Personal Accident Proposal </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">
                     <form name="PA" novalidate>
                        
                        <div class="row maincontf">
                           <div class="col-md-4">
                             
<!-- 
                             <div class="form-group">
                                 <label>Policy Start Date
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="pa_pro_policy_sdate"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="pa_pro_policy_sdate" ng-model="pa_pro_policy_sdate" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_policy_sdate.$dirty" ng-messages="PA.pa_pro_policy_sdate.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Policy Start Date </div>
                                 </div>
                              </div> -->

                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="pa_pro_policy_sdate" name="pa_pro_policy_sdate" class="form-control input-sm" placeholder="DD-MM-YYYY" ng-model="pa_pro_policy_sdate" required>
                     <div ng-if="quoteCar.$submitted" ng-messages="quoteCar.pa_pro_policy_sdate.$error" role="alert">
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
                                 <label>Salutation
                                 <span class="required"> * </span>
                                 </label>
                                 <input list="title" placeholder="Select Salutation" id="pa_pro_title" name="pa_pro_title" class="form-control input-sm" ng-model="pa_pro_title" ng-model="pa_pro_title" required>
                                 <datalist id="title">
                                    <option value="Mr"></option>
                                    <option value="Mrs"></option>
                                  </datalist>
                                  <div ng-if="PA.$submitted || PA.pa_pro_title.$dirty" ng-messages="PA.pa_pro_title.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Title</div>
                            </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> First Name <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_fname" placeholder="Enter First Name" class="form-control input-sm" id="pa_pro_fname" ng-model="pa_pro_fname" required/>
                                 <div ng-if="PA.$submitted || PA.pa_pro_fname.$dirty" ng-messages="PA.pa_pro_fname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter First Name</div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Last Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_lname" placeholder="Enter Last Name" class="form-control input-sm" id="pa_pro_lname" ng-model="pa_pro_lname" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_lname.$dirty" ng-messages="PA.pa_pro_lname.$error" role="alert">
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
                                 <input type="text" name="pa_pro_dob"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="pa_pro_dob" ng-model="pa_pro_dob" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_dob.$dirty" ng-messages="PA.pa_pro_dob.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>House No.&Street Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_houseno" placeholder="Enter House No & Street Name" class="form-control input-sm" id="pa_pro_houseno" ng-model="pa_pro_houseno" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_houseno.$dirty" ng-messages="PA.pa_pro_houseno.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address1</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">   
                                 <label>Locality and Area
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="pa_pro_locality" placeholder="Enter Locality" class="form-control input-sm" id="pa_pro_locality" ng-model="pa_pro_locality" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_locality.$dirty" ng-messages="PA.pa_pro_locality.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address2</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">

                            <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nearest Land Mark <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="pa_pro_landmark" ng-model="pa_pro_landmark" required/>
                                 <div ng-if="PA.$submitted || PA.pa_pro_landmark.$dirty" ng-messages="PA.pa_pro_landmark.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Landmark</div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> State <span class="required"> * </span></label>
                            <input list="state" placeholder="Select State" id="pa_pro_state" name="pa_pro_state" class="form-control input-sm" ng-model="pa_pro_state" required>
                            <datalist id="state">
                                <option value="">Select State</option>
                                <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>
                            </datalist>
                             
                                 <div ng-if="PA.$submitted || PA.pa_pro_state.$dirty" ng-messages="PA.pa_pro_state.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter State</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                <label> City <span class="required"> * </span></label>
                                       <div id="pa_pro_city-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="pa_pro_city-div" style="">
                                             <input list="city" placeholder="Select city" id="pa_pro_city"  name="pa_pro_city" class="form-control input-sm" ng-model="pa_pro_city" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                       </datalist>   
                               
                                 <div ng-if="PA.$submitted || PA.pa_pro_city.$dirty" ng-messages="PA.pa_pro_city.$error" role="alert">
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
                            <input type="text" id="pa_pro_email" name="pa_pro_email" class="form-control input-sm" placeholder="Enter E-Mail" ng-model="pa_pro_email" onkeyup="return email_validate(this.value);" required>
                                  <div ng-if="PA.$submitted || PA.pa_pro_email.$dirty" class="required" id="emailwar" ng-messages="PA.pa_pro_email.$error" role="alert">

                                <div ng-message="required" class="required">Please Enter Email</div>
                            </div>
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="pa_pro_mobile" name="pa_pro_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="pa_pro_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="PA.$submitted || PA.pa_pro_mobile.$dirty" class="required" id="mobilewar" ng-messages="PA.pa_pro_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Emergency Contact Number <span class="required"> * </span></label>
                            <input type="text" id="pa_pro_emnum" name="pa_pro_emnum" class="form-control input-sm" placeholder="Enter Emergency Mobile Number" ng-model="pa_pro_emnum" MaxLength="10" onkeyup="emobile_validate(this.value);" required>
                                  <div ng-if="PA.$submitted || PA.pa_pro_emnum.$dirty" class="required" id="mobilewarn" ng-messages="PA.pa_pro_emnum.$error" role="alert">
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
                                 <input type="text" name="pa_pro_gstn" placeholder="Enter GSTN" class="form-control input-sm" id="pa_pro_gstn" ng-model="pa_pro_gstn" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_gstn.$dirty" ng-messages="PA.pa_pro_gstn.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Gstn</div>
                                 </div>
                              </div>
                           </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Occupation
                                       <span class="required"> * </span></label>
                                       <div class="radio-list">
                                           <input list="pa_occupation_list" placeholder="Select occupation" id="pa_occupation" name="pa_occupation" class="form-control input-sm" ng-model="pa_occupation" required>
                                          <datalist id="pa_occupation_list">

                                            
                                          <?php 
                                          foreach($occupationArray as $occ )
                                          {
                                              echo '<option id="'.$occ['id'].'" data-value= "'.$occ['name'].'"></option>';
                                          }
                                          ?>  
<!-- 
                                          <option id="5000" value="MANAGER/ADMINISTRATIVE"> </option>
                                          <option id="5001" value="BUSINESS OWNER"></option">
                                          <option id="5002" value="SALESPERSON DOING FIELD VISITS"></option>
                                          <option id="5003" value="PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)"></option>
                                          <option id="5004" value="IT/ITES PROFESSIONAL"></option>
                                          <option id="5005" value="BUILDER/CONTRACTOR"></option>
                                          <option id="5006" value="MACHINE OPERATOR/MANUAL LABOR"></option>
                                          <option id="5007" value="DRIVER (PRIVATE BUS / CAR)"></option">   -->


                                         <!--  <option value="">Select pa_occupation</option>
                                         <option value="5000">MANAGER/ADMINISTRATIVE</option>
                                         <option value="5001">BUSINESS OWNER</option>
                                         <option value="5002">SALESPERSON DOING FIELD VISITS</option>
                                         <option value="5003">PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)</option>
                                         <option value="5004">IT/ITES PROFESSIONAL</option>
                                         <option value="5005">BUILDER/CONTRACTOR</option>
                                         <option value="5006">MACHINE OPERATOR/MANUAL LABOR</option>
                                         <option value="5007">DRIVER (PRIVATE BUS / CAR)</option> -->
                                        </datalist>
                                          <div ng-if="PA.$submitted || PA.pa_occupation.$dirty" ng-messages="PA.pa_occupation.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select your pa_occupation</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                           </div>
                        
                        
                       
                         <div class="row maincontf">
                        <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_nname" placeholder="Enter Nominee Name" class="form-control input-sm" id="pa_pro_nname" ng-model="pa_pro_nname" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_nname.$dirty" ng-messages="PA.pa_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                         <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee Date of Birth
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="pa_pro_ndob"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="pa_pro_ndob" ng-model="pa_pro_ndob" required />
                                 <div ng-if="PA.$submitted || PA.pa_pro_ndob.$dirty" ng-messages="PA.pa_pro_ndob.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div>
                           </div>
                         <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee is My <span class="required"> * </span></label>
                              <input list="relation" placeholder="Select Nominee is My" id="pa_pro_relation" name="pa_pro_relation" class="form-control input-sm" ng-model="pa_pro_relation"  required>
                                 <datalist id="relation">
                                  
                                    <option value="Father"></option>
                                    <option value="Mother"></option>
                                    <option value="Brother"></option>
                                    <option value="Sister"></option>
                                 </datalist>
                                 <div ng-if="PA.$submitted || PA.pa_pro_relation.$dirty" ng-messages="PA.pa_pro_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Relationship</div>
                                 </div>
                              </div>
                           </div>
                           
                           
                        </div>
                     <br>

                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Does the insured suffer from or is undergoing treatment for gout, paralysis, arthritis, epilepsy or any other seizure disorder?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_suffered" ng-model='pa_pro_suffered' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_suffered" ng-model='pa_pro_suffered' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="PA.$submitted || PA.pa_pro_suffered.$dirty" ng-messages="PA.pa_pro_suffered.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select suffering from any disease</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Does the insured suffer from or is undergoing treatment for any physical/mental defect, impairment, deformity or infirmity affecting mobility, speech, hearing ability or sight ?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_Sonography" ng-model='pa_pro_Sonography' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_Sonography" ng-model='pa_pro_Sonography' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="PA.$submitted || PA.pa_pro_Sonography.$dirty" ng-messages="PA.pa_pro_Sonography.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select pre-employment check-up</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Have you ever been hospitalized as an in-patient in the past?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_surgery" ng-model='pa_pro_surgery' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_surgery" ng-model='pa_pro_surgery' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="PA.$submitted || PA.pa_pro_surgery.$dirty" ng-messages="PA.pa_pro_surgery.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select any surgical operation</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Any other similar policy ever applied/currently covered with Bharti AXA or any other insurer?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_medication" ng-model='pa_pro_medication' ng-value="1" value="1" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="pa_pro_medication" ng-model='pa_pro_medication' ng-value="0" value="0"> No </label>
                                 </div>
                                 <div ng-if="PA.$submitted || PA.pa_pro_medication.$dirty" ng-messages="PA.pa_pro_medication.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select any medication for more than 2 weeks in last 5 years</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Pls Provide Details
                                    <span class="required"> </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <textarea rows="4" cols="20" name="pa_pro_detail"   id="pa_pro_detail" ng-model="pa_pro_detail"  ></textarea>
                                 
                                 <div ng-if="PA.$submitted || PA.pa_pro_detail.$dirty" ng-messages="PA.pa_pro_detail.$error" role="alert">
                                    <div ng-message="required" class="required">Please Provide Details</div>
                                 </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                       
                           
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <a href="qms-pa-premium">
                                 <button type="button" id="" class="btn blue btn-default">Back</button>
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                     <a href="<?php echo base_url(); ?>qms-pa-proposal-view"  >
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
     $("#pa_pro_state").on('change', function() {
      
              
              

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
         $('#pa_pro_city-div').hide();      
         $('#pa_pro_city-loader').show();
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
               $('#pa_pro_city-div').show();      
               $('#pa_pro_city-loader').hide();
               $('#pa_pro_city').focus();
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

   function mobile_validate(Mobile)
{
   
   var Mobilenum = /^([1-9])([0-9]){9}$/;
   if(Mobilenum.test(Mobile) == false)
   {
      text = "Please Enter a Valid Mobile Number";  
   } else {
      text="";
   }
   $('#mobilewar').html(text);
}

 function emobile_validate(Mobile)
{
   
   var Mobilenum = /^([1-9])([0-9]){9}$/;
   if(Mobilenum.test(Mobile) == false)
   {
      text = "Please Enter a Valid Mobile Number";  
   } else {
      text="";
   }
   $('#mobilewarn').html(text);
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
