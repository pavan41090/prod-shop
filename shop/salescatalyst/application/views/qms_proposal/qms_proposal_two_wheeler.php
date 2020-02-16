<script src="<?php echo base_url(); ?>assets/js/qms_js/tw_proposal.js"></script>
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
               <span>Two-wheeler Proposal </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption"> Quote Two-Wheeler Proposal </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">
                     <form name="quoteTw" novalidate>
                        <h4 class="propsal-seperator">Tell us more about your two wheeler policy </h4>
                        <hr>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                <label>Existing insurance company name</label>
                                <input list="relationship" placeholder="Select Existing Insurance Company" id="tw_prop_existing_insure" name="tw_prop_existing_insure" class="form-control input-sm" ng-model="tw_prop_existing_insure" >
                                <datalist id="relationship">
                                    <option value="Bajaj Allianz General Insurance Co. Ltd."></option>
                                    <option value="Bharti AXA General Insurance Co. Ltd."></option>
                                    <option value="Cholamandalam MS General Insurance Co. Ltd."></option>
                                    <option value="Future Generali India Insurance Co. Ltd."></option>
                                    <option value="HDFC ERGO General Insurance Co. Ltd."></option>
                                    <option value="ICICI Lombard General Insurance Co. Ltd."></option>
                                    <option value="IFFCO Tokio General Insurance Co. Ltd."></option>
                                    <option value="Kotak Mahindra General Insurance Co. Ltd."></option>
                                    <option value="Liberty Videocon General Insurance Co. Ltd."></option>
                                    <option value="Magma HDI General Insurance Co. Ltd."></option>
                                    <option value="National Insurance Co. Ltd."></option>
                                    <option value="Raheja QBE General Insurance Co. Ltd."></option>
                                    <option value="Reliance General Insurance Co. Ltd."></option>
                                    <option value="Royal Sundaram General Insurance Co. Ltd."></option>
                                    <option value="SBI General Insurance Co. Ltd."></option>
                                    <option value="Shriram General Insurance Co. Ltd."></option>
                                    <option value="Tata AIG General Insurance Co. Ltd."></option>
                                    <option value="The New India Assurance Co. Ltd."></option>
                                    <option value="The Oriental Insurance Co. Ltd."></option>
                                    <option value="United India Insurance Co. Ltd."></option>
                                    <option value="Universal Sompo General Insurance Co. Ltd."></option>

                                </datalist>
                                <!--  <div ng-if="quoteTw.$submitted || quoteTw.tw_prop_existing_insure.$dirty" ng-messages="quoteTw.tw_prop_existing_insure.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Existing insurance company name</div>
                                 </div> -->
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Existing policy number
                                 
                                 </label>
                                 <input  placeholder="Select Existing policy number" id="tw_pro_existing_policynum" name="tw_pro_existing_policynum" class="form-control input-sm" ng-model="tw_pro_existing_policynum" ng-model="tw_pro_existing_policynum">
                                  <!-- <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_existing_policynum.$dirty" ng-messages="quoteTw.tw_pro_existing_policynum.$error" role="alert">
                                    <div ng-message="required" class="required">Please Existing policy number</div>
                                 </div> -->
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Existing policy expiry date <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_existing_policy_expiry"  placeholder="DD-MM-YYYY" class="form-control input-sm" id="tw_pro_existing_policy_expiry" ng-model="tw_pro_existing_policy_expiry"   required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_existing_policy_expiry.$dirty" ng-messages="quoteTw.tw_pro_existing_policy_expiry.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter policy expiry date</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <h4 class="propsal-seperator" >Tell us more about your two wheeler </h4>
                        <hr>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Proposed policy start date
                                 <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_existing_policy_start"  placeholder="DD-MM-YYYY" class="form-control input-sm" id="tw_pro_existing_policy_start" ng-model="tw_pro_existing_policy_start"   required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_existing_policy_start.$dirty" ng-messages="quoteTw.tw_pro_existing_policy_start.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter policy start date</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Registration date
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="tw_pro_regis_date"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="tw_pro_regis_date" ng-model="tw_pro_regis_date" required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_regis_date.$dirty" ng-messages="quoteTw.tw_pro_regis_date.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Registration date </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>My 2W's registration number is <span class="required"> * </span></label>
                              <input placeholder="Registration number" id="tw_pro_regi_num" name="tw_pro_regi_num" class="form-control input-sm" ng-model="tw_pro_regi_num"  required>
                                 
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_regi_num.$dirty" ng-messages="quoteTw.tw_pro_regi_num.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter registration number</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>My 2W's engine number is
                                 <span class="required"> * </span></label>
                                  <input placeholder="Engine number" id="tw_pro_engine_num" name="tw_pro_engine_num" class="form-control input-sm" ng-model="tw_pro_engine_num"  required>
                                    <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_engine_num.$dirty" ng-messages="quoteTw.tw_pro_engine_num.$error" role="alert">
                                       <div ng-message="required" class="required">Please Enter engine number is</div>
                                    </div>
                                 </div>
                              </div>
                          
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>My 2W's chasis number is<span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_chasis_num"  placeholder="Enter Chasis Number" class="form-control input-sm" id="tw_pro_chasis_num" ng-model="tw_pro_chasis_num" required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_chasis_num.$dirty" ng-messages="quoteTw.tw_pro_chasis_num.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Chasis Number</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>My 2W's is financed
                                 <span class="required"> * </span></label>
                                 <div class="radio-list">
                                       <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                                       <input type="radio" name="tw_pro_financed" ng-model='tw_pro_financed' ng-value="0" value="0" required /> Yes </label>
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="tw_pro_financed" ng-model='tw_pro_financed' ng-value="1" value="1" required /> No </label>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_financed.$dirty" ng-messages="quoteTw.tw_pro_financed.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select My 2W's is financed</div>
                                 </div>
                              </div>
                           </div>
                           </div>
                        </div>
                        <h4 class="propsal-seperator" >Tell us more about your self </h4>
                        <hr>
                         <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> First Name <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_fname" placeholder="Enter First Name" class="form-control input-sm" id="tw_pro_fname" ng-model="tw_pro_fname" required/>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_fname.$dirty" ng-messages="quoteTw.tw_pro_fname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter First Name</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Last Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_lname" placeholder="Enter Last Name" class="form-control input-sm" id="tw_pro_lname" ng-model="tw_pro_lname" required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_lname.$dirty" ng-messages="quoteTw.tw_pro_lname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Date of Birth
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="tw_pro_dob"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="tw_pro_dob" ng-model="tw_pro_dob" required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_dob.$dirty" ng-messages="quoteTw.tw_pro_dob.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                           <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Gender <span class="required"> * </span></label>
                              <input list="gender" placeholder="Select Gender" id="tw_pro_gender" name="tw_pro_gender" class="form-control input-sm" ng-model="tw_pro_gender"  required>
                                 <datalist id="gender">
                                  
                                    <option value="Male"></option>
                                    <option value="Female"></option>
                                 </datalist>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_gender.$dirty" ng-messages="quoteTw.tw_pro_gender.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Gender</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Marital status <span class="required"> * </span></label>
                              <input list="material" placeholder="Select Marital status" id="tw_pro_material" name="tw_pro_material" class="form-control input-sm" ng-model="tw_pro_material"  required>
                                 <datalist id="material">
                                  
                                    <option value="Single"></option>
                                    <option value="Married"></option>
                                 </datalist>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_material.$dirty" ng-messages="quoteTw.tw_pro_material.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Marital status</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Occupation <span class="required"> * </span></label>
                              <input list="Occupation" placeholder="Select Occupation" id="tw_pro_occupation" name="tw_pro_occupation" class="form-control input-sm" ng-model="tw_pro_occupation"  required>
                                 <datalist id="Occupation">

                                       <option value="5000">MANAGER/ADMINISTRATIVE</option>
                                       <option value="5001">BUSINESS OWNER</option>
                                       <option value="5002">SALESPERSON DOING FIELD VISITS</option>
                                       <option value="5003">PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)</option>
                                       <option value="5004">IT/ITES PROFESSIONAL</option>
                                       <option value="5005">BUILDER/CONTRACTOR</option>
                                       <option value="5006">MACHINE OPERATOR/MANUAL LABOR</option>
                                       <option value="5007">DRIVER (PRIVATE BUS / CAR)</option>

                   <!--                  <option value="MANAGER/ADMINISTRATIVE"></option>
                                         <option id ="5001" value="BUSINESS OWNER"></option>
                                         <option id ="5002" value="SALESPERSON DOING FIELD VISITS"></option>
                                         <option id ="5003" value="PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)"></option>
                                         <option id ="5004" value="IT/ITES PROFESSIONAL"></option>
                                         <option id ="5005" value="BUILDER/CONTRACTOR"></option>
                                         <option id ="5006" value="MACHINE OPERATOR/MANUAL LABOR"></option>
                                         <option id ="5007" value="DRIVER (PRIVATE BUS / CAR)"></option> -->
                                  
<!--                                     <option value="Media/Sports/Armed forces"></option>
                                    <option value="Government employees"></option>
                                    <option value="Professionals (CA, Doctor, lawyer)"></option>
                                    <option value="Private (Sales and marketing)"></option>
                                    <option value="Private (other than Sales / marketing)"></option>
                                    <option value="Self employed / self business"></option>
                                    <option value="Others"></option> -->
                                 </datalist>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_occupation.$dirty" ng-messages="quoteTw.tw_pro_occupation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Occupation</div>
                                 </div>
                              </div>
                           </div>
                           </div>


                           <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 1
                                 <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_add1" placeholder="Enter Address Line 1" class="form-control input-sm" id="tw_pro_add1" ng-model="tw_pro_add1" required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_add1.$dirty" ng-messages="quoteTw.tw_pro_add1.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address1</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 2
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="tw_pro_add2" placeholder="Enter Address Line 2" class="form-control input-sm" id="tw_pro_add2" ng-model="tw_pro_add2" required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_add2.$dirty" ng-messages="quoteTw.tw_pro_add2.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address2</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nearest Land Mark <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="tw_pro_landmark" ng-model="tw_pro_landmark" required/>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_landmark.$dirty" ng-messages="quoteTw.tw_pro_landmark.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Landmark</div>
                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="row maincontf">
                          

                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> State <span class="required"> * </span></label>
                            <input list="state" placeholder="Select State" id="tw_pro_state" name="tw_pro_state" class="form-control input-sm" ng-model="tw_pro_state" required>
                            <datalist id="state">
                                <option value="">Select State</option>
                                <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>
                            </datalist>
                             
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_state.$dirty" ng-messages="quoteTw.tw_pro_state.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter State</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                <label> City <span class="required"> * </span></label>
                                       <div id="tw_pro_city-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="tw_pro_city-div" style="">
                                             <input list="city" placeholder="Select city" id="tw_pro_city"  name="tw_pro_city" class="form-control input-sm" ng-model="tw_pro_city" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                       </datalist>   
                               
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_city.$dirty" ng-messages="quoteTw.tw_pro_city.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter City</div>
                                 </div>
                              </div>
                          </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="tw_pro_mobile" name="tw_pro_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="tw_pro_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteTw.tw_pro_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Emergency contact Number <span class="required"> * </span></label>
                            <input type="text" id="tw_pro_emergency" name="tw_pro_emergency" class="form-control input-sm" placeholder="Enter Emergency contact Number" ng-model="tw_pro_emergency" MaxLength="10" onkeyup="mobile_valid(this.value);" required>
                                  <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_emergency.$dirty" class="required" id="mobilewarning" ng-messages="quoteTw.tw_pro_emergency.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>


                           <div class="col-md-4">
                              <div class="form-group">
                            <label>E-mail <span class="required"> * </span></label>
                            <input type="text" id="tw_pro_email" name="tw_pro_email" class="form-control input-sm" placeholder="Enter E-Mail" ng-model="tw_pro_email" onkeyup="return email_validate(this.value);" required>
                                  <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_email.$dirty" class="required" id="emailwar" ng-messages="quoteTw.tw_pro_email.$error" role="alert">

                                <div ng-message="required" class="required">Please Enter Email</div>
                            </div>
                              </div>
                           </div>
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>GSTIN
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="tw_pro_gstn" placeholder="Enter GSTIN" class="form-control input-sm" id="tw_pro_gstn" ng-model="tw_pro_gstn" required />
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_gstn.$dirty" ng-messages="quoteTw.tw_pro_gstn.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Gstn</div>
                                 </div>
                              </div>
                           </div>

                           
                       
                           
                        </div>
                       
                        
                        
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Name <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_nname" placeholder="Enter Nominee Name" class="form-control input-sm" id="tw_pro_nname" ng-model="tw_pro_nname" required/>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_nname.$dirty" ng-messages="quoteTw.tw_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Name</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_nage" placeholder="Enter Nominee Age" class="form-control input-sm" id="tw_pro_nage" ng-model="tw_pro_nage" required/>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_nage.$dirty" ng-messages="quoteTw.tw_pro_nage.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Landmark</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee Relationship
                                 <span class="required"> * </span></label>
                                 <input list="nreal" placeholder="Select Nominee Relationship " id="tw_pro_nomie_relation" name="tw_pro_nomie_relation" class="form-control input-sm" ng-model="tw_pro_nomie_relation"  required>
                                 <datalist id="nreal">
                                    <option value="Father"></option>
                                    <option value="Mother"></option>
                                    <option value="Brother"></option>
                                    <option value="Sister"></option>
                                    <option value="Spouse"></option>
                                    <option value="Son"></option>
                                    <option value="Daughter"></option>
                                    </datalist>
                                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_nomie_relation.$dirty" ng-messages="quoteTw.tw_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Name Of Appointee(if nominee is minor)</label>
                                 <input type="text" name="tw_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="tw_pro_nameofappoint" ng-model="tw_pro_nameofappoint"/>
                               <!--   <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_nameofappoint.$dirty" ng-messages="quoteTw.tw_pro_nameofappoint.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Name</div>
                                 </div> -->
                              </div>
                           </div>
                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee</label>
                                 <input list="nreal" placeholder="Select Appointee Relationship " id="tw_pro_appoint_relation" name="tw_pro_appoint_relation" class="form-control input-sm" ng-model="tw_pro_appoint_relation" >
                                 <datalist id="nreal">
                                    <option value="Spouse"></option>
                                    <option value="Father"></option>
                                 </datalist>
<!--                                  <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_appoint_relation.$dirty" ng-messages="quoteTw.tw_pro_appoint_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                        <h4 class="propsal-seperator">Tell us about your driving related habits </h4>
                        <hr>
                         <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                <label>I have been driving two wheeler for </label>
                                <input list="driving_experience" placeholder="Select " id="tw_pro_drive_two" name="tw_pro_drive_two" class="form-control input-sm" ng-model="tw_pro_drive_two" >
                                <datalist id="driving_experience">
                                    <option value="0-1 Years"></option>
                                    <option value="1-2 Years"></option>
                                    <option value="2-3 Years"></option>
                                    <option value="3-5 Years"></option>
                                    <option value="More than 5 years"></option>
                                </datalist>
                 <!--                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_drive_two.$dirty" ng-messages="quoteTw.tw_pro_drive_two.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select I have been driving two wheeler</div>
                                 </div> -->
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                <label>My parking at night is</label>
                                <input list="parking_at_night" placeholder="Select " id="tw_pro_parking" name="tw_pro_parking" class="form-control input-sm" ng-model="tw_pro_parking">
                                <datalist id="parking_at_night">
                                    <option value="Covered"></option>
                                    <option value="Open (Road Side)"></option>
                                    <option value="Open (Inside compound)"></option>
                                    
                                </datalist>
                               <!--   <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_parking.$dirty" ng-messages="quoteTw.tw_pro_parking.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select My parking at night</div>
                                 </div> -->
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                <label>My family members who can drive are</label>
                                <input list="who-drives" placeholder="Select " id="tw_pro_who_drive" name="tw_pro_who_drive" class="form-control input-sm" ng-model="tw_pro_who_drive" >
                                <datalist id="who-drives">
                                    <option value="1"></option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="More than 3"></option>
                                </datalist>
                 <!--                 <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_who_drive.$dirty" ng-messages="quoteTw.tw_pro_who_drive.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select My family members who can drive</div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                <label>Annually,we drive our two-wheeler about kms </label>
                                <input list="km-driven" placeholder="Select " id="tw_pro_kms" name="tw_pro_kms" class="form-control input-sm" ng-model="tw_pro_kms" >
                                <datalist id="km-driven">
                                    <option value="Less than 2500"></option>
                                    <option value="2500-5000"></option>
                                    <option value="5000-10000"></option>
                                    <option value="10000-25000"></option>
                                    <option value="More than 25000"></option>
                                </datalist>
                                 <!-- <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_kms.$dirty" ng-messages="quoteTw.tw_pro_kms.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select we drive our two-wheeler about kms</div>
                                 </div> -->
                              </div>
                           </div>
                           <div class="col-md-4">
                             <div class="form-group">
                                 <label>The youngest driver in my family is aged <span class="required"> * </span></label>
                                 <input type="text" name="tw_pro_ydage" placeholder="Enter Young driver Age" class="form-control input-sm" id="tw_pro_ydage" ng-model="tw_pro_ydage"/>
                                 <!-- <div ng-if="quoteTw.$submitted || quoteTw.tw_pro_ydage.$dirty" ng-messages="quoteTw.tw_pro_ydage.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter youngest driver in my family is aged</div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <a href="quote-two-wheeler-premium">
                                 <button type="button" id="" class="btn blue btn-default">Back</button>
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                     <a href="<?php echo base_url(); ?>qms-travel-proposal-view" >
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
     $("#tw_pro_state").on('change', function() {
      
              
              

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
         $('#tw_pro_city-div').hide();      
         $('#tw_pro_city-loader').show();
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
               $('#tw_pro_city-div').show();      
               $('#tw_pro_city-loader').hide();
               $('#tw_pro_city').focus();
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
</script>
