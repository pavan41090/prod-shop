<script src="<?php echo base_url(); ?>assets/js/qms_js/sship_proposal.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title">QMS - <?php echo $title ?>
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
               <span> Proposal </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption"> Quote Super Ship Proposal </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">
                    


                   <form name="quoteSship" novalidate>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              

<!-- 
                              <div class="form-group">
                                 <label> Policy start date <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_policy_start"  placeholder="DD-MM-YYYY" class="form-control input-sm" id="sship_pro_policy_start" ng-model="sship_pro_policy_start" onkeyup="return dob_validate(this.value);"   required />
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_policy_start.$dirty" ng-messages="quoteSship.sship_pro_policy_start.$error" class="required" id="dobalert" role="alert">
                                    <div ng-message="required"  class="required">Please Enter Policy start date</div>
                                 </div>
                              </div>
 -->

             
                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="sship_pro_policy_start" name="sship_pro_policy_start" class="form-control input-sm" placeholder="DD-MM-YYYY" ng-model="sship_pro_policy_start" required>
                     <div ng-if="quoteSship.$submitted" ng-messages="quoteSship.sship_pro_policy_start.$error" role="alert">
                        <div ng-message="required" class="required">Please enter policy start date</div>
                     </div>
                  </div>         


                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                <label>Title<span class="required"> * </span></label>
                                <input list="relationship" placeholder="Select Title" id="sship_pro_title" name="sship_pro_title" class="form-control input-sm" ng-model="sship_pro_title" required>
                                <datalist id="relationship">
                                    <option value="MR"></option>
                                    <option value="MRS"></option>
                                    
                                </datalist>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_title.$dirty" ng-messages="quoteSship.sship_pro_title.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Title</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>First Name
                                 <span class="required"> * </span>
                                 </label>
                                 <input  placeholder="First Name" id="sship_pro_fname" name="sship_pro_fname" class="form-control input-sm" ng-model="sship_pro_fname" ng-model="sship_pro_fname" required>
                                  <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_fname.$dirty" ng-messages="quoteSship.sship_pro_fname.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter First Name</div>
                            </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Last Name
                                 <span class="required"> * </span>
                                 </label>
                                 <input  placeholder="Last Name" id="sship_pro_lname" name="sship_pro_lnamesship_pro_lname" class="form-control input-sm" ng-model="sship_pro_lname" ng-model="sship_pro_lname" required>
                                  <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_lname.$dirty" ng-messages="quoteSship.sship_pro_lname.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Last Name</div>
                            </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> DOB<span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_dob"  placeholder="DD-MM-YYYY" class="form-control input-sm" id="sship_pro_dob" ng-model="sship_pro_dob" onkeyup="return dob_validatedob(this.value);"   required />
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_dob.$dirty" ng-messages="quoteSship.sship_pro_dob.$error"  class="required" id="dobalertdob" role="alert">
                                    <div ng-message="required"  class="required">Please Enter DOB</div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 1 <span class="required"> * </span></label>
                              <input placeholder="Address Line 1" id="sship_pro_add1" name="sship_pro_add1" class="form-control input-sm" ng-model="sship_pro_add1"  required>
                                 
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_add1.$dirty" ng-messages="quoteSship.sship_pro_add1.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address1</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 2 <span class="required"> * </span></label>
                              <input placeholder="Address Line 2" id="sship_pro_add2" name="sship_pro_add2" class="form-control input-sm" ng-model="sship_pro_add2"  required>
                                 
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_add2.$dirty" ng-messages="quoteSship.sship_pro_add2.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address2</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nearest Landmark <span class="required"> * </span></label>
                              <input placeholder="Nearest Landmark" id="sship_pro_nland" name="sship_pro_nland" class="form-control input-sm" ng-model="sship_pro_nland"  required>
                                 
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_nland.$dirty" ng-messages="quoteSship.sship_pro_nland.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nearest Land Mark</div>
                                 </div>
                              </div>
                           </div>
                         <div class="col-md-4">
                           <div class="form-group">
                            <label>Pincode<span class="required"> * </span></label>                          
                           <input type="text" name="sship_pro_zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="sship_pro_zip" ng-model="sship_pro_zip" required >

                           <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_zip.$dirty" class="required" id="post" ng-messages="quoteSship.sship_pro_zip.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Pincode</div>
                           </div>
                           </div>
                         </div>
                        </div>



                        <div class="row maincontf">
                          

                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> State <span class="required"> * </span></label>
                            <input list="state" placeholder="Select State" id="sship_pro_state" name="sship_pro_state" class="form-control input-sm" ng-model="sship_pro_state" required >
                            <datalist id="state">
                                <option value="">Select State</option>
                                <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>
                            </datalist>
                             
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_state.$dirty" ng-messages="quoteSship.sship_pro_state.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter State</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                <label> City<span class="required"> * </span></label>
                                       <div id="sship_pro_city-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="sship_pro_city-div" style="">
                                             <input list="city" placeholder="Select city" id="sship_pro_city"  name="sship_pro_city" class="form-control input-sm" ng-model="sship_pro_city" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                       </datalist>   
                               
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_city.$dirty" ng-messages="quoteSship.sship_pro_city.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter City</div>
                                 </div>
                              </div>
                          </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="sship_pro_mobile" name="sship_pro_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="sship_pro_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteSship.sship_pro_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>
                        </div>

                        <div class="row maincontf">

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Emergency contact Number <span class="required"> * </span></label>
                            <input type="text" id="sship_pro_emergency" name="sship_pro_emergency" class="form-control input-sm" placeholder="Enter Emergency contact Number" ng-model="sship_pro_emergency" MaxLength="10" onkeyup="mobile_valid(this.value);" required>
                                  <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_emergency.$dirty" class="required" id="mobilewarning" ng-messages="quoteSship.sship_pro_emergency.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>


                           <div class="col-md-4">
                              <div class="form-group">
                            <label>E-mail <span class="required"> * </span></label>
                            <input type="text" id="sship_pro_email" name="sship_pro_email" class="form-control input-sm" placeholder="Enter E-Mail" ng-model="sship_pro_email" onkeyup="return email_validate(this.value);" required>
                                  <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_email.$dirty" class="required" id="emailwar" ng-messages="quoteSship.sship_pro_email.$error" role="alert">

                                <div ng-message="required" class="required">Please Enter Email</div>
                            </div>
                              </div>
                           </div>
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>GSTIN
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="sship_pro_gstn" placeholder="Enter GSTIN" class="form-control input-sm" id="sship_pro_gstn" ng-model="sship_pro_gstn" required />
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_gstn.$dirty" ng-messages="quoteSship.sship_pro_gstn.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Gstn</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                       

                        <div class="row maincontf">
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Gender <span class="required"> * </span></label>
                              <input list="gender" placeholder="Select Gender" id="sship_pro_gender" name="sship_pro_gender" class="form-control input-sm" ng-model="sship_pro_gender"  required>
                                 <datalist id="gender">
                                  
                                    <option value="Male"></option>
                                    <option value="Female"></option>
                                 </datalist>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_gender.$dirty" ng-messages="quoteSship.sship_pro_gender.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Gender</div>
                                 </div>
                              </div>
                           </div>
                          
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Height(in CM's)<span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_height"  placeholder="Enter Height(in CM's)" class="form-control input-sm" id="sship_pro_height" ng-model="sship_pro_height" required />
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_height.$dirty" ng-messages="quoteSship.sship_pro_height.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Height</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Weight(in KG's)<span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_Weight"  placeholder="EnterWeight(in KG's)" class="form-control input-sm" id="sship_pro_Weight" ng-model="sship_pro_Weight" required />
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_Weight.$dirty" ng-messages="quoteSship.sship_pro_Weight.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Weight</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                         <div class="row maincontf">
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Occupation <span class="required"> * </span></label>
                              <input list="Occupation" placeholder="Select Occupation" id="sship_pro_occupation" name="sship_pro_occupation" class="form-control input-sm" ng-model="sship_pro_occupation"  required>
                                 <datalist id="Occupation">
                                  
                                   <option value="5000">MANAGER/ADMINISTRATIVE</option>
                                   <option value="5001">BUSINESS OWNER</option>
                                     <option value="5002">SALESPERSON DOING FIELD VISITS</option>
                                  <option value="5003">PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)</option>
                                   <option value="5004">IT/ITES PROFESSIONAL</option>
                                  <option value="5005">BUILDER/CONTRACTOR</option>
                                  <option value="5006">MACHINE OPERATOR/MANUAL LABOR</option>
                                   <option value="5007">DRIVER (PRIVATE BUS / CAR)</option>
                                 </datalist>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_occupation.$dirty" ng-messages="quoteSship.sship_pro_occupation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Occupation</div>
                                 </div>
                              </div>
                           </div>   
                        </div>

                          <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury or accident or advised/consuming medication or undergone/advised/awaiting any surgical procedure ( other than Normal /assisted Delivery or Caesarean section without any complication) or undergone any investigations, in the past 4 years?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_suffered" ng-model='sship_pro_suffered' ng-value="1" value="1" required/ > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_suffered" ng-model='sship_pro_suffered' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_suffered.$dirty" ng-messages="quoteSship.sship_pro_suffered.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                         <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have any of the following conditions /diseases -: High blood pressure, diabetes or sugar, any heart related ailment, brain stroke, Paralysis, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits, HIV/AIDS / any other sexually transmitted disease, Ulcer (Stomach / Intestine), Anemia, Leukemia or any other blood/lymphatic system disorder

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_diseases" ng-model='sship_pro_diseases' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_diseases" ng-model='sship_pro_diseases' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_diseases.$dirty" ng-messages="quoteSship.sship_pro_diseases.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have multiple sclerosis, epilepsy, tremors, paralysis, psychiatric/mental illnesses or sleep disorder

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_psychiatric" ng-model='sship_pro_psychiatric' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_psychiatric" ng-model='sship_pro_psychiatric' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_psychiatric.$dirty" ng-messages="quoteSship.sship_pro_psychiatric.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have you taken any medication for more than 2 weeks in last 5 years?

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_medication" ng-model='sship_pro_medication' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_medication" ng-model='sship_pro_medication' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_medication.$dirty" ng-messages="quoteSship.sship_pro_medication.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Are you currently suffering from or have ever suffered from Dysfunctional uterine bleeding, Fibroid, Cyst / Fibroadenoma or any other Gynaecological / Breast disorder?

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Fibroid" ng-model='sship_pro_Fibroid' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Fibroid" ng-model='sship_pro_Fibroid' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_Fibroid.$dirty" ng-messages="quoteSship.sship_pro_Fibroid.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
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
                                    <input type="radio" name="sship_pro_cyst" ng-model='sship_pro_cyst' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_cyst" ng-model='sship_pro_cyst' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_cyst.$dirty" ng-messages="quoteSship.sship_pro_cyst.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Undertaken any lab/blood tests, imaging tests viz. scans/MRI in the last 5 years other than routine health check-up or pre-employment check-up?

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_bltest" ng-model='sship_pro_bltest' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_bltest" ng-model='sship_pro_bltest' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_bltest.$dirty" ng-messages="quoteSship.sship_pro_bltest.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Any complaint of diabetes, hypertension or any complication during current or earlier pregnancy?

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_diabetes" ng-model='sship_pro_diabetes' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_diabetes" ng-model='sship_pro_diabetes' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_diabetes.$dirty" ng-messages="quoteSship.sship_pro_diabetes.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                         <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Is the insured person pregnant? If yes, please mention the expected date of delivery
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_pregnant" ng-model='sship_pro_pregnant' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_pregnant" ng-model='sship_pro_pregnant' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_pregnant.$dirty" ng-messages="quoteSship.sship_pro_pregnant.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>


                         <div class="row maincontf">  
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have any person proposed to be insured received any advice/ treatment / consultation for any medical condition in the last 4 years? If yes, please specify
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_advice" ng-model='sship_pro_advice' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_advice" ng-model='sship_pro_advice' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_advice.$dirty" ng-messages="quoteSship.sship_pro_advice.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                         <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Does any person proposed to be Insured smoke or consume Gutka/ Pan Masala /alcohol? If yes, please indicate the name and quantity per week

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Gutka" ng-model='sship_pro_Gutka' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Gutka" ng-model='sship_pro_Gutka' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_Gutka.$dirty" ng-messages="quoteSship.sship_pro_Gutka.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                         

                  </br>
                        



                    <h4 class="propsal-seperator">Family Doctor's Details,if any</h4>
                       <hr> 
                        
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>  Name <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_doc_name" placeholder="Enter doctor Name" class="form-control input-sm" id="sship_pro_doc_name" ng-model="sship_pro_doc_name" required/>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_doc_name.$dirty" ng-messages="quoteSship.sship_pro_doc_name.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Doctor Name</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Qualification <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_doc_qualifi" placeholder="Enter Qualification" class="form-control input-sm" id="sship_pro_doc_qualifi" ng-model="sship_pro_doc_qualifi" required/>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_doc_qualifi.$dirty" ng-messages="quoteSship.sship_pro_doc_qualifi.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Qualificationk</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
<!--                               <div class="form-group">
                                 <label> Address <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_doc_addr" placeholder="Enter Qualification" class="form-control input-sm" id="sship_pro_doc_addr" ng-model="sship_pro_doc_addr" required/>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_doc_addr" ng-messages="quoteSship.sship_pro_doc_addr.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Doctor's address</div>
                                 </div>
                              </div> -->

                              <div class="form-group">
                                 <label> Address <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_doc_addr" placeholder="Enter Address" class="form-control input-sm" id="sship_pro_doc_addr" ng-model="sship_pro_doc_addr" required/>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_doc_addr.$dirty" ng-messages="quoteSship.sship_pro_doc_addr.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Qualificationk</div>
                                 </div>
                              </div>

                           </div>
                        </div>
                         <div class="row maincontf">
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="sship_pro_doc_mobile" name="sship_pro_doc_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="sship_pro_doc_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_doc_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteSship.sship_pro_doc_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Clinic/Hospital Number <span class="required"> * </span></label>
                            <input type="text" id="sship_pro_hos_num" name="sship_pro_hos_num" class="form-control input-sm" placeholder="Clinic / Hospital Number" ng-model="sship_pro_hos_num" MaxLength="10" onkeyup="mobile_validatehos(this.value);" required>
                                  <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_hos_num.$dirty" class="required" id="mobilewarhos" ng-messages="quoteSship.sship_pro_hos_num.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>
                        </div>


                        
                     <h4 class="propsal-seperator">Nominee Details</h4>
                     <hr>
                           <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Name of Nominee for Primary Insured
                                 <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_nname" placeholder="Enter Name of Nominee " class="form-control input-sm" id="sship_pro_nname" ng-model="sship_pro_nname" required />
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_nname.$dirty" ng-messages="quoteSship.sship_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary insured
                                 <span class="required"> * </span></label>
                                 <input list="nreal" placeholder="Relationship With Primary insured " id="sship_pro_nomie_relation" name="sship_pro_nomie_relation" class="form-control input-sm" ng-model="sship_pro_nomie_relation"  required>
                                 <datalist id="nreal">
                                      <option value="Father"></option>
                                      <option value="Mother"></option>
                                      <option value="Brother"></option>
                                      <option value="Sister"></option>
                                      <option value="Spouse"></option>
                                      <option value="Son"></option>
                                      <option value="Daughter"></option>
                                 </datalist>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_nomie_relation.$dirty" ng-messages="quoteSship.sship_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Name Of Appointee <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="sship_pro_nameofappoint" ng-model="sship_pro_nameofappoint" required/>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_nameofappoint.$dirty" ng-messages="quoteSship.sship_pro_nameofappoint.$error" role="alert">
                                    <div ng-message="required" class="required">Please EnterName Of Appointee</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">  
                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee
                                 <span class="required"> * </span></label>
                                 <input list="nreal" placeholder="Select Appointee Relationship " id="sship_pro_appoint_relation" name="sship_pro_appoint_relation" class="form-control input-sm" ng-model="sship_pro_appoint_relation"  required>
                                 <datalist id="nreal">
                                    <option value="Father"></option>
                                    <option value="Mother"></option>
                                    <option value="Brother"></option>
                                    <option value="Sister"></option>
                                    <option value="Spouse"></option>
                                    <option value="Son"></option>
                                    <option value="Daughter"></option>
                                 </datalist>
                                 <div ng-if="quoteSship.$submitted || quoteSship.sship_pro_appoint_relation.$dirty" ng-messages="quoteSship.sship_pro_appoint_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        </br>
                        
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <a href="<?php echo base_url(); ?>qms-super-ship-premium">
                                 <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                     <a href="<?php echo base_url(); ?>qms-sship-proposal-view" >
                                       <button type="submit"  class="btn blue btn-default send_quote" ng-click="proposal()" >Procced to Payment</button>
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


    $("#sship_pro_state").on('change', function() {
        var state_id = $(this).val();
        updateCityDropdown(state_id);
    });



    function updateCityDropdown(state_id){
        var dataString ='state_id=' + state_id;
        var webUrl = $('#web_url').val()
        var URL = webUrl+'Commoncontrol/getCityByStateID/';
        $.ajax({
            url : URL,
            type : 'POST',
            data : {'state_id' : state_id},
                dataType:'json',
                success: function( data){
                 $('#sship_pro_city-div').hide();      
                 $('#sship_pro_city-loader').show();
                  $('#sship_pro_city').find('option')
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
                    $('#sship_pro_city-div').show();      
                    $('#sship_pro_city-loader').hide();
                    $('#sship_pro_city').focus();
                  }, 1500); 
              },
          });
      }


      // $("#sship_pro_state").on('click', function() {
      //   $('#sship_pro_state').val('');
      // });  
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

function mobile_validaterfix(Mobile)
{
    var Mobilenum = /^([1-9])([0-9]){9}$/;
    if(Mobilenum.test(Mobile) == false)
    {
        text = "Please Enter a Valid Mobile Number";  
    } else {
        text="";
    }
    $('#mobilewarfix').html(text);
}

function mobile_validatehos(Mobile)
{
   
    var Mobilenum = /^([1-9])([0-9]){9}$/;
    if(Mobilenum.test(Mobile) == false)
    {
        text = "Please Enter a Valid Mobile Number";  
    } else {
        text="";
    }
    $('#mobilewarhos').html(text);
}

function mobile_validatepi(Mobile)
{
    var Mobilenum = /^([1-9])([0-9]){9}$/;
    if(Mobilenum.test(Mobile) == false)
    {
        text = "Please Enter a Valid Mobile Number";  
    } else {
        text="";
    }
    $('#mobilewarp').html(text);
}

function mobile_valid(Mobile)
{
    var Mobilenum = /^([1-9])([0-9]){9}$/;
    if(Mobilenum.test(Mobile) == false)
    {
        text = "Please Enter a Valid Mobile Number";  
    } else {
        text="";
    }
    $('#mobilewarning').html(text);
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


function email_validates(email)
{
    var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
    if(re.test(email) == false)
    {
        text = "Please Enter a Valid Email";  
    } else {
        text="";
   }
   $('#emailwarning').html(text);
}
</script>
<script> 
function dob_validate (dob)
{
    var dobstr =  /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;
    if(dobstr.test(dob) == false)
    {
        text =  "Please Enter The Date Format (DD-MM-YYYY)";  
    } else {
        text = '';
        var str = dob;
        var res = str.split("-");
        var year = str.length;
        if(res[0] > 31 ) {
            text =  "Please Enter valid Date";  
        } else if(res[1] > 12) {
            text =  "Please Enter valid Month"; 
        } else if(res[2].length !== 4 ) {
            text =  "Please Enter valid Year"; 
        }
    }
    $('#dobalert').html(text);
}

function dob_validatedob (dob)
{
    var dobstr =  /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;
    if(dobstr.test(dob) == false)
    {
        text =  "Please Enter The Date Format (DD-MM-YYYY)";  
    } else {
        text = '';
        var str = dob;
        var res = str.split("-");
        var year = str.length;
        if(res[0] > 31 ) {
            text =  "Please Enter valid Date";  
        } else if(res[1] > 12) {
            text =  "Please Enter valid Month"; 
        } else if(res[2].length !== 4 ) {
            text =  "Please Enter valid Year"; 
        }
   }
   $('#dobalertdob').html(text);
}

function dob_validater (dob)
{
    var dobstr =  /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;
    // var text = '';
    if(dobstr.test(dob) == false)
    {
        text =  "Please Enter The Date Format (DD-MM-YYYY)";  
    } else {
        text = '';
        var str = dob;
        var res = str.split("-");
        var year = str.length;
        if(res[0] > 31 ) {
            text =  "Please Enter valid Date";  
        } else if(res[1] > 12) {
            text =  "Please Enter valid Month"; 
        } else if(res[2].length !== 4 ) {
            text =  "Please Enter valid Year"; 
        }
    }
    $('#dobalerts').html(text);
}

</script>