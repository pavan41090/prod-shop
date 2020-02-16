<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car_edit.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="Car">
<input type="hidden" name="lead_id" id="lead_id" value="<?php echo $leadId; ?>" >


<div class="tab-content">
   <div class="tab-pane fade active in" id="car">
      <!--                         <form type="POST" id="carform" name="carform" >
         -->       
      <div class="row">
         <div class="pull-right">
            <a href="<?php echo base_url(); ?>lms-lead-list">
               <button type="button"  class="btn blue btn-default" > << Back</button>
            </a>
         </div>
      </div>                  

                    
      <div ng-app="plunker" ng-controller="myCtrl">


         <form name="lmsCar" novalidate >
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">Lead Details</span>
               </div>
            </div>

            <div class="row maincontf">
                  <div class="col-md-4">
                      <div class="row">
                          <div class="col-md-4 labeltxtleft"> Application No. </div>
                          <div class="col-md-8">: <label id="lms_edit_application_no"></label>  </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="row">
                          <div class="col-md-4 labeltxtleft"> Product  </div>
                          <div class="col-md-8">: <label id="lms_edit_product"></label> </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="row">
                          <div class="col-md-4 labeltxtleft"> Lead Status  </div>
                          <div class="col-md-8">: <label id="lms_edit_status"></label> </div>
                      </div>
                  </div> 

            </div>  



            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Category
                     <span class="required"> * </span></label>
                     <input list="Category" placeholder="Select Category" class="form-control input-sm" name="lms_car_category" id="lms_car_category" ng-model="lms_car_category" required>
                     <datalist id="Category">
                      
                        <?php 
                           foreach($CategoryArray as $Category )
                           {
                               echo '<option  value="'.$Category['name'].'" style="font-weight:normal; color:#ff0000;"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_category.$dirty" ng-messages="lmsCar.lms_car_category.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Category</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Line of Business
                     <span class="required"> * </span></label>                          
                     <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="lms_car_line_of_business" id="lms_car_line_of_business" ng-model="lms_car_line_of_business" required readonly="readonly">
                     <datalist id="Business">
                    
                        <?php 
                           foreach($BusinessArray as $Business )
                           {
                               echo '<option value="'.$Business['name'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_line_of_business.$dirty" ng-messages="lmsCar.lms_car_line_of_business.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Line of Business</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Branch Location
                     <span class="required"> * </span></label>  
                     <!--                                     <select class="form-control input-sm" name="lms_car_hdfc_branch_location" id="lms_car_hdfc_branch_location" ng-model="lms_car_hdfc_branch_location" required>
                        -->                                    <input list="lms_car_hdfc_branch_locations"  placeholder="Select HDFC Branch Location"  class="form-control input-sm" name="lms_car_hdfc_branch_location" id="lms_car_hdfc_branch_location" ng-model="lms_car_hdfc_branch_location" required>
                     <!--   <input list="browsers" name="browser"> -->
                     <datalist id="lms_car_hdfc_branch_locations">
                      
                        <?php 
                           foreach($branchLocation as $blc )
                           {
                               echo '<option value="'.$blc.'">'.$blc.'</option>';
                           }
                           ?>   
                     </datalist>
                     <!--                                     </select>
                        -->                                   
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_hdfc_branch_location.$dirty" ng-messages="lmsCar.lms_car_hdfc_branch_location.$error" role="alert">
                        <div ng-message="required" class="required">Please Select HDFC Branch Location</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Bharati AXA GI Location</label>
                     <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="lms_car_hdfc_ergo_location" id="lms_car_hdfc_ergo_location" ng-model="lms_car_hdfc_ergo_location" >
                     <datalist id="Location">
                      
                        <?php 
                           foreach($GiLocationArray as $GiLocation )
                           {
                               echo '<option value="'.$GiLocation['name'].'"></option>';
                           }
                           ?>   
                     </datalist>
                 
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>AAN Number 
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_aaa_number"  placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_aaa_number.$dirty" ng-messages="lmsCar.lms_aaa_number.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter AAN Number</div>
                     </div>
                  </div>
               </div>

               
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Target Date
                     </label>  <span class="required"> * </span></label>
                     <input type="text" data-date-format="dd-mm-yyyy" class="form-control input-sm custom-date-after"  placeholder="DD-MM-YYYY" name="lms_car_target_date" id="lms_car_target_date" ng-model="lms_car_target_date" required>
                     <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lms_car_target_date.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Date</div>
                     </div>
                     <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="lms_car_target_date" id="lms_car_target_date" ng-model="lms_car_target_date" /> -->                 
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>TSE/BDR Code
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_tse_bar_code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="lms_car_tse_bar_code" ng-model="lms_car_tse_bar_code" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tse_bar_code.$dirty" ng-messages="lmsCar.lms_car_tse_bar_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>TL Code/DSA Code/Team Code</label> 
                     <span class="required"> * </span></label>                  
                     <input type="text" name="lms_car_tl_code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="lms_car_tl_code" ng-model="lms_car_tl_code" required >  
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tl_code.$dirty" ng-messages="lmsCar.lms_car_tl_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>SM Code </label>  
                     <input type="text" name="lms_car_sm_code"  placeholder="SM Code"   class="form-control input-sm" id="lms_car_sm_code" ng-model="lms_car_sm_code"  />                 
             <!--         <div ng-if="lmsCar.$submitted || lmsCar.lms_car_sm_code.$dirty" ng-messages="lmsCar.lms_car_sm_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter SM Code</div>
                     </div> -->
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Bank Verifier ID
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_bank_verify_id"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="lms_car_bank_verify_id" ng-model="lms_car_bank_verify_id" required /> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_bank_verify_id.$dirty" ng-messages="lmsCar.lms_car_bank_verify_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Payment Type
                     <span class="required"> * </span></label>                          
                     <select class="form-control input-sm" name="lms_car_payment_type" id="lms_car_payment_type" ng-model="lms_car_payment_type" required>
                        <option value="" disabled selected>Select your option</option>
                        <?php 
                           foreach($PaymentArray as $Payment )
                           {
                               echo '<option value="'.$Payment['name'].'">'.$Payment['name'].'</option>';
                           }
                           ?>   
                     </select> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_payment_type.$dirty" ng-messages="lmsCar.lms_car_payment_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Payment Type</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Sub Channel</label>  
                     <span class="required"> * </span></label>   
                     <select  class="form-control input-sm" name="lms_car_sub_channel" id="lms_car_sub_channel" ng-model="lms_car_sub_channel" required>
                        <option value="" disabled selected>Select your option</option>                    
                        <option value="Sub_Channel 1">Sub Channel 1</option>
                        <option value="Sub_Channel 2">Sub Channel 2</option>
                        <option value="Sub_Channel 3">Sub Channel 3</option>
                        <option value="Sub_Channel 4">Sub Channel 4</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_sub_channel.$dirty" ng-messages="lmsCar.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Sub Channel</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Card Relationship No/LOS Number
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_hdfc_card_relno" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="lms_car_hdfc_card_relno" ng-model="lms_car_hdfc_card_relno" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_hdfc_card_relno.$dirty" ng-messages="lmsCar.lms_car_hdfc_card_relno.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Card's Last 4 digits
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_hdfc_card_4digt.$dirty" class="required" id="cardwar" ng-messages="lmsCar.lms_car_hdfc_card_4digt.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>
                     </div>
                  </div>
               </div>
            </div>

            <h4 class="propsal-seperator">Customer Details </h4>
            <hr> 

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label> Salutation <span class="required"> * </span></label>
                     <input list="salute" id="lms_car_salut" placeholder="Salutation" name="lms_car_salut" class="form-control input-sm" ng-model="lms_car_salut" required>
                     <datalist id="salute">
                      
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_salut.$dirty" ng-messages="lmsCar.lms_car_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Salutation</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_fname"  placeholder="Customer First Name"  class="form-control input-sm" id="lms_car_fname" ng-model="lms_car_fname" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_fname.$dirty" ng-messages="lmsCar.lms_car_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_lname"  placeholder="Customer Last Name"   class="form-control input-sm" id="lms_car_lname"  ng-model="lms_car_lname" required/> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_lname.$dirty" ng-messages="lmsCar.lms_car_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>

            </div>   

            <div class="row maincontf">




                  <div class="col-md-4">
                    
                     <div class="form-group">
                        <label>DOB <span class="required"> * </span></label>
                        <input type="text" id="lms_car_dob" name="lms_car_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_dob" required data-date-format="dd-mm-yyyy">
                        <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lms_car_dob.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter DOB</div>
                        </div>
                     </div>
                  </div>


               <div class="col-md-4">
                  <div class="form-group">
                     <label>Marital status <span class="required"> * </span></label>
                     <select id="lms_car_pro_marital" name="lms_car_pro_marital" class="form-control input-sm" ng-model="lms_car_pro_marital"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_marital.$dirty" ng-messages="lmsCar.lms_car_pro_marital.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Marital status</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Gender
                     </label>  <span class="required"> * </span>
                     <select  class="form-control input-sm" name="lms_car_gender" id="lms_car_gender" ng-model="lms_car_gender" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_gender.$dirty" ng-messages="lmsCar.lms_car_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Customer Gender</div>
                     </div>
                  </div>
               </div>               

            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Case id
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_case_id"  placeholder="Case id"    class="form-control input-sm" id="lms_car_case_id" ng-model="lms_car_case_id" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_case_id.$dirty" ng-messages="lmsCar.lms_car_case_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Case id</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>PAN Card
                     </label> <span class="required"> * </span>   
                     <input type="text" class="form-control input-sm"  placeholder="PAN NUMBER" ID="lms_car_pan" ng-model="lms_car_pan" name="lms_car_pan" MaxLength="10" required>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pan.$dirty" id="pan_error" class="required" ng-messages="lmsCar.lms_car_pan.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pan card number</div>
                     </div>
                     <p class="required" id="demo"></p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Address 1 <span class="required"> * </span>
                     </label>  
                     <textarea class="form-control" placeholder="Address 1" name="lms_car_add1" rows="2" id="lms_car_add1" ng-model="lms_car_add1" required></textarea>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_add1.$dirty" ng-messages="lmsCar.lms_car_add1.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Address 2
                     </label><span class="required"> * </span>
                     <textarea class="form-control"  placeholder="Address 2" name="lms_car_add2" rows="2" id="lms_car_add2" ng-model="lms_car_add2" required></textarea>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_add2.$dirty" ng-messages="lmsCar.lms_car_add2.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 2</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Area
                     </label><span class="required"> * </span>                          
                     <input type="text" name="lms_car_area"  placeholder="Area"   class="form-control input-sm" id="lms_car_area"  ng-model="lms_car_area" required>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_area.$dirty" ng-messages="lmsCar.lms_car_area.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Area</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Pincode
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_zip"  MaxLength="6" onkeyup="return postcode_validate(this.value);" placeholder="Pincode "  class="form-control input-sm" id="lms_car_zip" ng-model="lms_car_zip" required >
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_zip.$dirty" class="required" id="post" ng-messages="lmsCar.lms_car_zip.$error" role="alert">
                        <div ng-message="required"  class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label> State <span class="required"> * </span></label>
                     <input list="state" id="lms_car_state" placeholder="Select State"  autocomplete="off" name="lms_car_state" class="form-control input-sm" ng-model="lms_car_state" required>
                     <datalist id="state">
                      
                        <?php 
                           foreach($stateArray as $state )
                           {
                               echo '<option value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_state.$dirty" ng-messages="lmsCar.lms_car_state.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter State</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> City <span class="required"> * </span></label>
                     <div id="lms_car_city-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="lms_car_city-div" style="">
                        <input list="city" id="lms_car_city" placeholder="Select city" autocomplete="off" name="lms_car_city" class="form-control input-sm" ng-model="lms_car_city" required>
                        <datalist id="city">
                         
                        </datalist>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_city.$dirty" ng-messages="lmsCar.lms_car_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Details of Lead
                     </label>   <span class="required"> * </span>
                     <input type="text" name="lms_car_deatil_lead"  placeholder="Details of Lead "   class="form-control input-sm" id="lms_car_deatil_lead" ng-model="lms_car_deatil_lead" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_deatil_lead.$dirty" ng-messages="lmsCar.lms_car_deatil_lead.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Details of Lead</div>
                     </div>
                  </div>
               </div>
            </div>

               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Nearest Land Mark <span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="lms_car_pro_landmark" ng-model="lms_car_pro_landmark" required/>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_landmark.$dirty" ng-messages="lmsCar.lms_car_pro_landmark.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Landmark</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">

                     <div class="form-group">
                        <label>Emergency contact Number <span class="required"> * </span></label>
                        <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile" required /> 
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_emergency.$dirty" class="required" id="emergencyContact" ng-messages="lmsCar.lms_car_pro_emergency.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                        </div>
                     </div>
          

                 </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>GSTIN
                       
                        </label>
                        <input type="text" name="lms_car_pro_gstn" placeholder="Enter GSTIN" class="form-control input-sm" id="lms_car_pro_gstn" ng-model="lms_car_pro_gstn" >
                       
                     </div>
                  </div>
               </div>




            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="email" id="lms_car_email" name="lms_car_email" class="form-control input-sm" placeholder="E-mail" ng-model="lms_car_email" onkeyup="return email_validate(this.value);" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_email.$dirty" class="required" id="emailwar" ng-messages="lmsCar.lms_car_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid E-mail</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="lms_car_mobile" autocomplete="off" name="lms_car_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="lms_car_mobile" MaxLength="10" onkeyup="return mobile_validate(this.value);" placeholder="Mobile" required /> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsCar.lms_car_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Type <span class="required"> </span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" ng-model='lms_car_cus_type' ng-value='corporate' value="corporate" checked required> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" ng-model='lms_car_cus_type' ng-value='individual' value="individual" required> Individual </label>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_cus_type.$dirty" ng-messages="lmsCar.lms_car_cus_type.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Customer Type</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row maincontf"> 
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Right time to contact the customer <span class="required"> * </span></label>
                        <select list="customer" placeholder="contact the customer" name="lms_cus_customer" id="lms_cus_customer" class="form-control input-sm" ng-model="lms_cus_customer" required>
                        <option value="" disabled selected>Select your option</option>                       
                        <?php 
                           foreach($CustomerArray as $customer )
                           {
                               echo '<option value="'.$customer['name'].'">'.$customer['name'].'</option>';
                           }
                           ?>                                  
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_customer.$dirty" ng-messages="lmsCar.lms_cus_customer.$error" role="alert">
                           <div ng-message="required" class="required">Please Select contact the customer</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Language for contact  <span class="required"> * </span></label>
                        <input list="language" placeholder="Language for contact" name="lms_cus_language" id="lms_cus_language" class="form-control input-sm" ng-model="lms_cus_language" required>
                       <datalist id="language">
                          
                           <?php 
                           foreach($languageArray as $language )
                           {
                               echo '<option value="'.$language['name'].'"></option>';
                           }
                           ?>                                       
                        </datalist>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_language.$dirty" ng-messages="lmsCar.lms_cus_language.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Language for contact</div>
                        </div>
                     </div>
                  </div>

                 <div class="col-md-4">
                     <div class="form-group">
                        <label>Type Of business  <span class="required"> * </span></label>
                        <select name="lms_cus_tbusins" id="lms_cus_tbusins" class="form-control input-sm" ng-model="lms_cus_tbusins" required>
                       
                           <option value="" disabled selected>Select your option</option>
                           <?php 
                              foreach($businessArray as $tbus )
                              {
                                 echo '<option value="'.$tbus['name'].'">'.$tbus['name'].'</option>';
                              }
                              ?>                                       
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_tbusins.$dirty" ng-messages="lmsCar.lms_cus_tbusins.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Type Of business </div>
                        </div>
                     </div>
                  </div>
               </div>
             
                  
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Processing Fee Applicable<span class="required"> * </span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee" ng-model='lms_cus_pfee' ng-value='0'  value="0" required> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee"  ng-model='lms_cus_pfee' ng-value='1'  value="1" required> Yes </label>  
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_pfee.$dirty" ng-messages="lmsCar.lms_cus_pfee.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Processing Fee Applicable</div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Enhanced Credit Card Limit <span class="required"> * </span></label>
                        <input  placeholder="Enhanced Credit Card Limit" id="lms_cus_cardlimt" name="lms_cus_cardlimt" class="form-control input-sm" ng-model="lms_cus_cardlimt" ng-model="lms_cus_cardlimt" required />
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_cardlimt.$dirty" ng-messages="lmsCar.lms_cus_cardlimt.$error" role="alert">
                              <div ng-message="required" class="required">Please Enter Enhanced Credit Card Limit</div>
                           </div>
                     </div>
                  </div>

                   <div class="col-md-4">
                     <div class="form-group">
                        <label>Statement Date<span class="required"> * </span></label>
                        <select name="lms_cus_sdate" id="lms_cus_sdate" class="form-control input-sm" ng-model="lms_cus_sdate" required>
                           <option value="" disabled selected>Select your option</option>                      
                           <?php 
                           foreach($sdateArray as $sdate )
                           {
                               echo '<option value="'.$sdate['name'].'">'.$sdate['name'].'</option>';
                           }
                           ?>                                         
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_sdate.$dirty" ng-messages="lmsCar.lms_cus_sdate.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Statement Date </div>
                        </div>
                     </div>
                  </div>
                 
               </div>
                <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Temp LE <span class="required">  *</span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" ng-model='lms_cus_tle' ng-value='0'  value="0" required> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle"  ng-model='lms_cus_tle' ng-value='1'  value="1" required> Yes </label>  
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_tle.$dirty" ng-messages="lmsCar.lms_cus_tle.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Temp LE </div>
                           </div>
                        </div>
                     </div>
                  </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Occupation <span class="required"> * </span></label>
                     <select id="lms_car_pro_occupation" name="lms_car_pro_occupation" class="form-control input-sm" ng-model="lms_car_pro_occupation"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Media/Sports/Armed forces">Media/Sports/Armed forces</option>
                        <option value="Government employees">Government employees</option>
                        <option value="Professionals (CA, Doctor, lawyer)">Professionals (CA, Doctor, lawyer)</option>
                        <option value="Private (Sales and marketing)">Private (Sales and marketing)</option>
                        <option value="Private (other than Sales / marketing)">Private (other than Sales / marketing)</option>
                        <option value="Self employed / self business">Self employed / self business</option>
                        <option value="Others">Others</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_occupation.$dirty" ng-messages="lmsCar.lms_car_pro_occupation.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Occupation</div>
                     </div>
                  </div>
               </div>



               </div>
               <div class="row maincontf">

                  <div id="emi_applicalble_outer" style=" display: none;" >
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>EMI Applicable  <span class="required"> * </span></label>
                           <select name="lms_cus_emi" id="lms_cus_emi" class="form-control input-sm" ng-model="lms_cus_emi">
                              <option value="" disabled selected>Select your option</option>
                              <?php 
                              foreach($emiArray as $emi )
                              {
                                 echo '<option value="'.$emi['name'].'">'.$emi['name'].'</option>';
                              }
                              ?>                                           
                           </select>

                        </div>
                     </div>

                     <div id="emi_yr_outer" style="display: none;">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>EMI Years  <span class="required"> * </span></label>
                              <select name="lms_cus_emi_yr" id="lms_cus_emi_yr" class="form-control input-sm" ng-model="lms_cus_emi_yr">
                                 <option value="" disabled selected>Select your option</option>
                                 <?php 
                                 foreach($emiYRArray as $emi )
                                 {
                                    echo '<option value="'.$emi['name'].'">'.$emi['name'].'</option>';
                                 }
                                 ?>                                           
                              </select>

                           </div>
                        </div>
                     </div>
                  </div> <!-- id="emi_applicalble" ends here-->
               </div>   
                  <input type="hidden" id="lms_edit_application_Id" name="lms_edit_application_Id" class="form-control input-sm" ng-model="lms_edit_application_Id" />
                  <input type="hidden" id="lms_edit_customer_id" name="lms_edit_customer_id" class="form-control input-sm" ng-model="lms_edit_customer_id" />
                  <input type="hidden" id="lms_edit_lead_id" name="lms_edit_lead_id" class="form-control input-sm" ng-model="lms_edit_lead_id" />
                 
                  <input type="submit" class="btn blue btn-default" style="float:right;" value="Update"  ng-click="updateCustomer()"   />
            <br><br>
         </form>
      </div>

       


      



   
     
  


    


      





      <!-- controller ends here -->
   </div>



</div>

</div>
</div>
</div>
</div>
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
<i class="icon-login"></i>
</a>
<!-- END QUICK SIDEBAR -->
</div>

<script>
  $(document).ready(function () {
    
      $("#Home_policy_end").attr("disabled", "disabled"); 

      $("#Home_policy_start").datepicker({
         format: 'dd-mm-yyyy',
         autoclose: true,
      }); 

      $("#Home_policy_end").datepicker({
         format: 'dd-mm-yyyy',
         autoclose: true,
      }); 
          
      $("#Home_policy_start").on('change', function() { 

      var date2 = $('#Home_policy_start').datepicker('getDate');
         date2.setDate(date2.getDate() + 364);
         $('#Home_policy_end').datepicker('setDate', date2);
         $("#Home_policy_end").attr("disabled", "disabled"); 
         
      });
   });









   $("#lms_car_state").on('change', function() {
     
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
        $('#lms_car_city-div').hide();      
        $('#lms_car_city-loader').show();
        $('#city').find('option')
             .remove()
             .end()
             .append('<option value="">Select city</option>')
             .val('');
                    
                 $.each(data, function(key, value) {
                    $('#city')
                    .append($("<option></option>")
                    .attr("value",value['id'])
                    );
                   
                 });  
                 setTimeout(function(){
              $('#lms_car_city-div').show();      
              $('#lms_car_city-loader').hide();
              $('#lms_car_city').focus();
           }, 1500); 
                  },
   
               });
   
         });
</script>
<

</body>
</html>