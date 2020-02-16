<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car_edit.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="<?php echo $editProductType ?>">
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
                    </label>
                     <input list="Category" placeholder="Select Category" class="form-control input-sm" name="lms_car_category" id="lms_car_category" ng-model="lms_car_category" readonly="readonly">
                     <datalist id="Category">
                        <?php 
                           foreach($CategoryArray as $Category )
                           {
                               echo '<option  value="'.$Category['name'].'" style="font-weight:normal; color:#ff0000;"></option>';
                           }
                           ?>   
                     </datalist>
                    <!--  <div ng-if="lmsCar.$submitted || lmsCar.lms_car_category.$dirty" ng-messages="lmsCar.lms_car_category.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Category</div>
                     </div> -->
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
                     <label>HDFC Card's Last 4 digits
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" onkeypress='return restrictAlphabets(event)'  placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_hdfc_card_4digt.$dirty" class="required" id="cardwar" ng-messages="lmsCar.lms_car_hdfc_card_4digt.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>
                     </div>
                  </div>
               </div>
                
            </div>
            <div class="row maincontf">
          
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
                     <label>Priority</label>  
                     <span class="required"> * </span></label>   
                     <select  class="form-control input-sm" name="lms_car_sub_channel" id="lms_car_sub_channel" ng-model="lms_car_sub_channel" required>
                         <option value="" disabled selected>Select your option</option>                    
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_sub_channel.$dirty" ng-messages="lmsCar.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>

                   <div class="col-md-4" ng-if="lms_car_category=='DT'">
                  <div class="form-group">
                     <label>Sub Channel </label>   <span class="required"> * </span>
                      <select  class="form-control input-sm" name="lms_car_campaign_name" id="lms_car_campaign_name" ng-model="lms_car_campaign_name" required>
                        <option value="" disabled selected>Select your option</option> 
                        <!-- <?php 
                           foreach($CampaignArray as $Campaign )
                           {
                               echo '<option value="'.$Campaign['name'].'">'.$Campaign['name'].'</option>';
                           }
                           ?>  -->

                           <option value="DAILY_CAMPAIGN_GI_DC1">DAILY_CAMPAIGN_GI_DC1</option>
                           <option value="DAILY_CAMPAIGN_GI_DC2">DAILY_CAMPAIGN_GI_DC2</option>
                           <option value="GI_2YRS_PA">GI_2YRS_PA</option>                              
                           <option value="GI_EARLY_VINTAGE_FHC60">GI_EARLY_VINTAGE_FHC60</option>     
                           <option value="GI_FAMILY_2_YRS_HUB">GI_FAMILY_2_YRS_HUB</option>               
                           <option value="GI_FAMILY_2_YRS_HUB_SPOKE">GI_FAMILY_2_YRS_HUB_SPOKE</option>    
                           <option value="GI_FAMILY_2_YRS_SPOKE">GI_FAMILY_2_YRS_SPOKE</option>          
                           <option value="GI_INWARD_CLEARANCE">GI_INWARD_CLEARANCE</option>         
                           <option value="GI_LI_XSELL">GI_LI_XSELL</option>                              
                           <option value="GI_LIAB">GI_LIAB</option>                              
                           <option value="GI_NEVER_USED_HUB">GI_NEVER_USED_HUB</option>                    <option value="GI_NEVER_USED_SPOKE">GI_NEVER_USED_SPOKE</option>
                           <option value="GI_PERSONAL_ACCIDENT">GI_PERSONAL_ACCIDENT</option>
                           <option value="GI_REG">GI_REG</option>                 
                           <option value="GI_RENEWAL">GI_RENEWAL</option>                              
                           <option value="GI_Renewed">GI_Renewed</option>                              
                           <option value="GI_RETENTION">GI_RETENTION</option>                              
                           <option value="GI_SELF/FAMILY_FHC/IC_1_YR_HUB">GI_SELF/FAMILY_FHC/IC_1_YR_HUB</option>      
                           <option value="GI_SELF/FAMILY_FHC/IC_1_YR_SPOKE">GI_SELF/FAMILY_FHC/IC_1_YR_SPOKE</option>      
                           <option value="LBC_LIABILITY X SELL">LBC_LIABILITY X SELL</option>
                           <option value="Renewed CVM">Renewed CVM</option>         
                           </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_campaign_name.$dirty" ng-messages="lmsCar.lms_car_campaign_name.$error" role="alert">
                        <div ng-message="required" class="required">Select Your Campaign Name</div>
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
            
              <div class="row maincontf" ng-if="lms_car_category=='Prime' || lms_car_category=='VRM' || lms_car_category=='Phone Banking' || lms_car_category=='COP'">
            <div class="form-group">
                  <div class="col-md-4">
                  <label> Dispatch required on Vision plus address</label> &nbsp;
                  <input class="Spouse_ship" type="checkbox" name="vision_address_name" id="vision_address"  ng-model="vision_address_name"   />
                      </div>
                        
                  <div class="col-md-8"> &nbsp;</div>
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
                     <input type="text" class="form-control input-sm"  placeholder="PAN NUMBER" ID="lms_car_pan" ng-model="lms_car_pan" name="lms_car_pan" MaxLength="10" >
                    
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
                     <label> State </label>
                     <input list="state" id="lms_car_state" placeholder="Enter the State"  autocomplete="off" name="lms_car_state" class="form-control input-sm" ng-model="lms_car_state"  >
                   <!--  <datalist id="state">
                      
                        <?php 
                          // foreach($stateArray as $state )
                           {
                              // echo '<option value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_state.$dirty" ng-messages="lmsCar.lms_car_state.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter State</div>
                     </div> -->
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> City </label>

                     <input type="text" name="lms_car_city" id="lms_car_city" placeholder="Enter the City" autocomplete="on" maxlength="25" class="form-control input-sm" ng-model="lms_car_city" > 
                   <!--  <div id="lms_car_city-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php // echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="lms_car_city-div" style="">
                        <input list="city" id="lms_car_city" placeholder="Select city" autocomplete="off" name="lms_car_city" class="form-control input-sm" ng-model="lms_car_city" required>
                        <datalist id="city">
                         
                        </datalist>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_city.$dirty" ng-messages="lmsCar.lms_car_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div> -->
                  </div>
               </div>
               <!-- details of lead moved to lead details -->

                <div class="col-md-4">
                  <div class="form-group">
                     <label> Nearest Land Mark <span class="required"> * </span></label>
                     <input type="text" name="lms_car_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="lms_car_pro_landmark" ng-model="lms_car_pro_landmark" required/>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_landmark.$dirty" ng-messages="lmsCar.lms_car_pro_landmark.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Landmark</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
              
                 <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="lms_car_mobile" autocomplete="off" name="lms_car_mobile" class="form-control input-sm" placeholder="Mobile Number" onkeypress='return restrictAlphabets(event)' ng-model="lms_car_mobile" MaxLength="10" onkeyup="return mobile_validate(this.value);" placeholder="Mobile" required /> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsCar.lms_car_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Alternate Contact Number </span></label>
                     <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeypress='return restrictAlphabets(event)' onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile"  /> 
                    <!-- <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_emergency.$dirty" class="required" id="emergencyContact" ng-messages="lmsCar.lms_car_pro_emergency.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div> -->
                  </div>
               </div>
                <div class="col-md-4">
                  <div class="form-group">
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="email" id="lms_car_email" name="lms_car_email" class="form-control input-sm" placeholder="E-mail" ng-model="lms_car_email" onkeyup="return email_validate(this.value);" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_email.$dirty" class="required" id="emailwar" ng-messages="lmsCar.lms_car_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid E-mail</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
              

               <div class="col-md-4">
                  <div class="form-group">
                     <label>GSTIN
                     </label>
                     <input type="text" name="lms_car_pro_gstn" placeholder="Enter GSTIN" class="form-control input-sm" id="lms_car_pro_gstn" disabled="lms_car_pro_gstn" ng-model="lms_car_pro_gstn" >
                  </div>
               </div>

             
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Type <span class="required"> </span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" value="corporate" id="lms_car_cus_type_corporate"> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" id="lms_car_cus_type_individual" value="individual"> Individual </label>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_cus_type.$dirty" ng-messages="lmsCar.lms_car_cus_type.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Customer Type</div>
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
                     <label>Processing Fee Applicable<span class="required"> * </span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="lms_cus_pfee" id="processing_fee_no" class="processing_fee" value="0"> No </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="lms_cus_pfee" id="processing_fee_yes"  ng-model='lms_cus_pfee' value="1"> Yes </label>  
                        <!--   <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_pfee.$dirty" ng-messages="lmsCar.lms_cus_pfee.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Processing Fee Applicable</div>
                           </div> -->
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Enhanced Credit Card Limit</label>
                     <input  placeholder="Enhanced Credit Card Limit" id="lms_cus_cardlimt" disabled="lms_cus_cardlimt" name="lms_cus_cardlimt" class="form-control input-sm" ng-model="lms_cus_cardlimt" ng-model="lms_cus_cardlimt"  />
                     
                     <!--
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_cardlimt.$dirty" ng-messages="lmsCar.lms_cus_cardlimt.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Enhanced Credit Card Limit</div>
                     </div> -->
                  </div>
               </div>
               
                <div class="col-md-4">
                  <div class="form-group">
                     <label>Temp LE <span class="required">  *</span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="lms_cus_tle" id="lms_cus_tle_no" value="0" > No </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="lms_cus_tle" disabled="lms_cus_tle" id="lms_cus_tle_yes"  value="1" required> Yes </label>  
                        <!--          <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_tle.$dirty" ng-messages="lmsCar.lms_cus_tle.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Temp LE </div>
                           </div> -->
                     </div>
                  </div>
               </div>
            </div>
           
            <div class="row maincontf" >

                  <div id="emi_applicalble_outer" ng-if='lms_car_payment_type=="Credit Card"'>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>EMI Applicable  <span class="required"> * </span></label>
                           
                           <select name="lms_cus_emi" id="lms_cus_emi" class="form-control input-sm" ng-change="onEmiChange()" ng-model="emiObj.lms_cus_emi" required >
                              <option value="" disabled selected>Select your option</option>
                              <?php 
                              foreach($emiArray as $emi )
                              {
                                 echo '<option value="'.$emi['name'].'">'.$emi['name'].'</option>';
                              }
                              ?>                                           
                           </select>

                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_emi.$dirty" ng-messages="lmsCar.lms_cus_emi.$error" role="alert">
                              <div ng-message="required" class="required">Select your option </div>
                           </div>
                        </div>
                     </div>

                     <div id="emi_yr_outer" ng-if='emiObj.lms_cus_emi=="Yes"'>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>EMI Years  <span class="required"> * </span></label>
                              
                              <select name="lms_cus_emi_yr" id="lms_cus_emi_yr" class="form-control input-sm" ng-model="emiObj.lms_cus_emi_yr" required >

                                 <option value="" disabled selected>Select your option</option>
                                 <?php 
                                 foreach($emiYRArray as $emi )
                                 {
                                    echo '<option value="'.$emi['name'].'">'.$emi['name'].'</option>';
                                 }
                                 ?>                                           
                              </select>
                              <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_emi_yr.$dirty" ng-messages="lmsCar.lms_cus_emi_yr.$error" role="alert">
                              <div ng-message="required" class="required">Select your option </div>
                           </div>

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
      <div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsciDetil" novalidate >
            <div class="carhide" id="cardeatail">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Critical Illness Details</span>
                  </div>
               </div>
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <div class="question">
                           <label>Include Spouse </label><span class="required"> </span>
                           <input class="Spouse_ship" type="checkbox" name="Spouse_ship" class="Spouse_ship" id="Spouse_ship" value="1" />
                        </div>
                        <div class="answer">
                           <input type="text" id="spouse_DOB" name="spouse_DOB" class="form-control input-sm custom-date-dob"  data-date-format="dd-mm-yyyy" placeholder="Spouse Date of Birth" ng-model="spouse_DOB" >
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Include Children </label><span class="required">  </span>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="noofchildrens" id="noofchildrens0"  class="noofchildrens" value="0"> 0 </label>   
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="noofchildrens" id="noofchildrens1" class="noofchildrens"  value="1"> 1 </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="noofchildrens" id="noofchildrens2"  class="noofchildrens" value="2"> 2 </label>    
                           <!-- <label class="radio-inline" style="font-size:12px;">
                              <input type="radio" name="noofchildrens" id="noofchildrens3"  value="3"> 3 </label> -->        
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount<span class="required"> * </span></label>
                        <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium" ng-model="lms_est_premium" required>
                        <div ng-if="lmsShipDetil.$submitted" ng-messages="lmsShipDetil.lms_est_premium.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="lms_edit_product_id" name="lms_edit_product_id" class="form-control input-sm" ng-model="lms_edit_product_id" />   
               <input type="submit" class="btn blue btn-default" style="float:right;" value="update" ng-click="CIUpdateProductDetail()"   />
               <br><br>
               <!-- car details hidedive end here -->
            </div>
         </form>
      </div>


      <div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsCiProposal" novalidate >
            <div class="" id="">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Critical Illness Proposal</span>
                  </div>
               </div>

               <div class="row maincontf">
               <div class="col-md-4"> 
                  <div class="form-group">
                        <label>Proposed policy start date <span class="required"> * </span></label>
                        <input type="text" id="ctill_pro_policy_sdate" name="ctill_pro_policy_sdate" class="form-control input-sm custom-date-after" placeholder="DD-MM-YYYY" ng-model="ctill_pro_policy_sdate" required data-date-format="dd-mm-yyyy">
                        <div ng-if="lmsCiProposal.$submitted" ng-messages="lmsCiProposal.ctill_pro_policy_sdate.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter policy start date</div>
                        </div>
                     </div>
                  </div>

               </div>

 <?php
   $i = 0;
      foreach($member_details as $mem) {
      $i++;   
    ?>
           


      <div id="<?php echo str_replace(' ', '', $mem['mem_type']);?>-propsal-details">
         <div class="portlet-title tabbable-line">
            <div class="caption leadtit">
               <i class="icon-globe font-dark hide"></i>
               <span class="caption-subject font-dark bold uppercase">Details of your <?php echo $mem['mem_type']; ?></span>
            </div>
         </div>
         <div class="row maincontf">
              <div class="col-md-4">
                  <div class="form-group">
                     <label>Salutation </label>
                     <select id="salut_mem<?php echo $i; ?>" placeholder="Salutation" class="form-control input-sm" ng-model="salut_mem<?php echo $i; ?>">
                         <option value="" disabled selected>Select your option</option>
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'">'.$salut['id'].'</option>';
                           }
                        ?>   
                     </select>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>First Name</label>  
                     <input type="text"  placeholder="First Name"  class="form-control input-sm" id="fname_mem<?php echo $i; ?>" ng-model="fname_mem<?php echo $i; ?>" />        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" placeholder="Last Name"   class="form-control input-sm" id="lname_mem<?php echo $i;?>"  ng-model="lname_mem<?php echo $i;?>"/> 
                  </div>
               </div>
         </div> 

         <div class="row maincontf">
            <div class="col-md-4">
               <div class="form-group">
                  <label> DOB </label>
                  <input type="text" id="dob_mem<?php echo $i;?>"  class="form-control input-sm custom-date-dob dob_higher" placeholder="DD-MM-YYYY" ng-model="dob_mem<?php echo $i;?>" data-date-format="dd-mm-yyyy">
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury, accident or any medical condition?</label>
                  </div>

                     <div class="col-md-2">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="suffered_mem<?php echo $i;?>" id='ship_suffered_yes_mem<?php echo $i;?>'  / > Yes </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="suffered_mem<?php echo $i;?>"  id='ship_suffered_no_mem<?php echo $i;?>' /> No </label>
                     </div>            

               </div>
            </div>
         </div>
         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured admitted to a hospital or a nursing home or had any test or imaging like CT/MRI scan Sonography or 2D Echo etc. done in the last ten years other than routine health check-up or pre-employment check-up?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="diseases_mem<?php echo $i;?>" id='ship_diseases_yes_mem<?php echo $i;?>' /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="diseases_mem<?php echo $i;?>" id='ship_diseases_no_mem<?php echo $i;?>' /> No </label>
                  </div>            


               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured had any surgery in the last ten years or has surgery ever been recommended or are you awaiting any surgical operation?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="psychiatric_mem<?php echo $i;?>" id='ship_psychiatric_yes_mem<?php echo $i;?>' /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="psychiatric_mem<?php echo $i;?>" id='ship_psychiatric_no_mem<?php echo $i;?>' /> No </label>
                  </div>            

               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured taken any medication for more than 2 weeks in last 5 years? </label>
                  </div>
                     <div class="col-md-2">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="medication_mem<?php echo $i;?>" id='ship_medication_yes_mem<?php echo $i;?>' /> Yes </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="medication_mem<?php echo $i;?>" id='ship_medication_no_mem<?php echo $i;?>' /> No </label>
                     </div>            

               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have You Been Hospitalized As An In-Patient In The Last 4 Years?</label>
                  </div>
                     <div class="col-md-2">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="fibroid_mem<?php echo $i;?>" id='ship_fibroid_yes_mem<?php echo $i;?>' /> Yes </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="fibroid_mem<?php echo $i;?>" id='ship_fibroid_no_mem<?php echo $i;?>' /> No </label>
                     </div>            
                  </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured ever had or has a doctor ever said that you have any of the following conditions / diseases: High blood pressure, diabetes or sugar, any heart related ailment, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits? </label>
                  </div>
                     <div class="col-md-2">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="cyst_mem<?php echo $i;?>" id='ship_cyst_yes_mem<?php echo $i;?>' /> Yes </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="cyst_mem<?php echo $i;?>" id='ship_cyst_no_mem<?php echo $i;?>' /> No </label>
                     </div>            
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Has any application for life, Health or lmsCiProposal illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?   </label>
                  </div>
                     <div class="col-md-2">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="bltest_mem<?php echo $i;?>" id='ship_bltest_yes_mem<?php echo $i;?>'/> Yes </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="bltest_mem<?php echo $i;?>" id='ship_bltest_no_mem<?php echo $i;?>' /> No </label>
                     </div>
               </div>
            </div>
         </div>


      <input type="hidden" id="edit_option_id<?php echo $i;?>" class="form-control input-sm" ng-model="edit_option_id<?php echo $i;?>" />
</br>



      </div> <!-- dynamic div ends here -->



<?php } ?>
               

 <h4 class="propsal-seperator">Nominee Details</h4>
                     <hr>
                           <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Name of Nominee for Primary Insured
                                 <span class="required"> * </span></label>
                                 <input type="text" name="ctill_pro_nname" placeholder="Enter Name of Nominee " class="form-control input-sm" id="ctill_pro_nname" ng-model="ctill_pro_nname" required />
                                 <div ng-if="lmsCiProposal.$submitted || lmsCiProposal.ctill_pro_nname.$dirty" ng-messages="lmsCiProposal.ctill_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary insured
                                 <span class="required"> * </span></label>
                                 <select id="ctill_pro_nomie_relation" name="ctill_pro_nomie_relation" class="form-control input-sm" ng-model="ctill_pro_nomie_relation"  required>
                                       <option value="" disabled selected>Select your option</option>
                                       <option value="Father">Father</option>
                                       <option value="Mother">Mother</option>
                                       <option value="Brother">Brother</option>
                                       <option value="Sister">Sister</option>
                                       <option value="Spouse">Spouse</option>
                                       <option value="Son">Son</option>
                                       <option value="Daughter">Daughter</option>
                                     </select>
                                 <div ng-if="lmsCiProposal.$submitted || lmsCiProposal.ctill_pro_nomie_relation.$dirty" ng-messages="lmsCiProposal.ctill_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="ctill_pro_nomie_age" placeholder="Enter Nominee Age"  class="form-control input-sm age-validate" maxlength="2" id="ctill_pro_nomie_age" ng-model="ctill_pro_nomie_age" required/>
                                 <div ng-if="lmsCiProposal.$submitted || lmsCiProposal.ctill_pro_nomie_age.$dirty" ng-messages="lmsCiProposal.ctill_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Name Of Appointee</label>
                                 <input type="text" name="ctill_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="ctill_pro_nameofappoint" ng-model="ctill_pro_nameofappoint"/>
                                
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="ctill_pro_appoint_relation" name="ctill_pro_appoint_relation" class="form-control input-sm" ng-model="ctill_pro_appoint_relation" >
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                  </select>
                              </div>
                           </div>
                        </div>




      <h4 class="propsal-seperator">Information for Issuance of Tax Statement (Section 80D of Income Tax Act 1961)</h4>
      <hr> 
      <div class="row maincontf">
         
            <div class="form-group">
               <div class="col-md-6">
                     <label>Are you the primary insured?</label>
               </div>
               <div class="col-md-2">
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="ship_tax_primary_insured"  class="ship_tax_primary_insured" id="ship_tax_primary_insured_yes" value="1" /> Yes </label>
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="ship_tax_primary_insured"  class="ship_tax_primary_insured" id="ship_tax_primary_insured_no" value="0" /> No </label>
               </div>
             
            </div>
        
      </div> 

<div id="tax_primary_insured_div">
            <div class="row maincontf">
<!--                <div class="col-md-4">
                  <div class="form-group">
                     <label> Salutation <span class="required"> * </span></label>
                     <select list="salute" id="ship_tax_salut" placeholder="Salutation" name="ship_tax_salut" class="form-control input-sm" ng-model="ship_tax_salut" required>
                        <option value="" disabled selected>Select your option</option>
                        <?php 
                          // foreach($salutationArray as $salut )
                          // {
                               //echo '<option value="'.$salut['id'].'">'.$salut['id'].' </option>';
                           //}
                           ?>   
                     </select>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_salut.$dirty" ng-messages="lmsShipProposal.ship_tax_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Salutation</div>
                     </div>
                  </div>
               </div> -->
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Your Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="ship_tax_your_name"  placeholder="Name"  class="form-control input-sm" id="ship_tax_your_name" ng-model="ship_tax_your_name" required />               
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_your_name.$dirty" ng-messages="lmsShipProposal.ship_tax_your_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Relationship with primary insured
                     <span class="required"> * </span></label>
                     <select id="ship_tax_primary_relation" name="ship_tax_primary_relation" class="form-control input-sm" ng-model="ship_tax_primary_relation"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Brother">Brother</option>
                        <option value="Sister">Sister</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Son">Son</option>
                        <option value="Daughter">Daughter</option>
                      </select>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_primary_relation.$dirty" ng-messages="lmsShipProposal.ship_tax_primary_relation.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Relationship</div>
                     </div>
                  </div>
               </div>
            </div>  
            <input type="hidden" name="edit_prim_ins_id" class="form-control input-sm" ng-model="edit_prim_ins_id"/>  
      </div>



                        <h4 class="propsal-seperator">Add New Comment </h4>
                        <hr>

                        <div id="recentComment" style="font-weight:bold;color:red">
                
                  </div>
                        <div class="row">
                           <div class="form-group">
                                <div class="col-md-12">
                            
                                  
                                  <textarea class="form-control" rows="5" id="lms_car_comment" name="lms_car_comment" ng-model="lms_car_comment" placeholder="Comments"></textarea>
                                  <div style="display: none;" class="required" id="cmt_error">Comment should not be blank</div>
                            
                                </div>
                              </div>
                          </div>
                 <div class="row">&nbsp;</div>

           
               <div class="row lmsresbor">
                  <div class="form-group">
                     <div class="col-md-12">
                        <input class="Spouse_ship" type="checkbox" name="declaration" id="declaration"  ng-model="declaration" value="0" required />
                        <label> I hereby declare that the customer has a HDFC Bank Relationship - (Bank Account/Credit Card/LOS Number) </label><span class="required">*</span>
                        <div ng-if="lmsCiProposal.$submitted || lmsCiProposal.declaration.$dirty" ng-messages="lmsCiProposal.declaration.$error" role="alert">
                           <div ng-message="required" class="required">Please Accept Decleration</div>
                        </div>
                     </div>
                     <div class="col-md-12">&nbsp;</div>
                     <div class="col-md-12">
                        <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="0" required />
                        <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                        <div ng-if="lmsCiProposal.$submitted || lmsCiProposal.premiumPayment.$dirty" ng-messages="lmsCiProposal.premiumPayment.$error" role="alert">
                           <div ng-message="required" class="required">Please Accept Premium Payment Mode</div>
                        </div>
                     </div>
                  </div>
               </div>
               <input type="hidden" id="lms_edit_proposal_id" name="lms_edit_proposal_id" class="form-control input-sm" ng-model="lms_edit_proposal_id" />
               <input type="hidden" id="lms_edit_nominee_id" name="lms_edit_nominee_id" class="form-control input-sm" ng-model="lms_edit_nominee_id" /> 
               <input type="hidden" id="lms_edit_option_id" name="lms_edit_option_id" class="form-control input-sm" ng-model="lms_edit_option_id" />
               <div class="row">
                  
                  <div class="col-md-12">
                     <div class="pull-right">
                        <div class="form-group">
                           
                           <button type="submit"  class="btn blue btn-default" ng-click="ciUpdateProposal()" >Update Lead</button>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <!-- proposal hidedive end here -->
            </div>
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
   $(".answer").hide();
   $(".Spouse_ship").click(function() {
       if($(this).is(":checked")) {
            $(".answer").show();
            $("#Spouse-propsal-details").show();
           
       } else {
            $(".answer").hide();
            $("#Spouse-propsal-details").hide();
       }
   });
   
   
   $(".noofchildrens").click(function() {
   
      var noOfChildredns = $(this).val();
     
      if(noOfChildredns == 1) {
         $("#Child1-propsal-details").show();
         
         $("#Child2-propsal-details").hide();
         $("#Child3-propsal-details").hide();
      
      } else if(noOfChildredns == 2) {
      
         $("#Child1-propsal-details").show();
         $("#Child2-propsal-details").show();
         $("#Child3-propsal-details").hide();
      
      } else if(noOfChildredns == 3) {
         $("#Child1-propsal-details").show();
         $("#Child2-propsal-details").show();
         $("#Child3-propsal-details").show();
      } else {
         $("#Child1-propsal-details").hide();
         $("#Child2-propsal-details").hide();
         $("#Child3-propsal-details").hide();      
      }
   
   });   
   
   
   $(".ship_tax_primary_insured").click(function() {
      var shipTaxPrimaryInsured = $(this).val();
      if(shipTaxPrimaryInsured == 1) {
         $('#tax_primary_insured_div').show();
      } else {
         $('#tax_primary_insured_div').hide();
      }   
   });  
   
   
   
   
</script>
<script>
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
 <script>
$(document).ready(function() {
   debugger;
   
var test = $("span.username").text();

   
   $.ajax({
    type: "GET",
    url: 'User/getMyprofile/',  
    success: function(response){
      //  alert(response);
var a=JSON.parse(response);

   var ctrlName = 'myCtrl';
     var sel = 'div[ng-controller="' + ctrlName + '"]';
    var scope = angular.element(sel).scope();
      scope.channel=a.channel;
 
if(a.usr_type_name=="HDFC AV")
{

          $("#lms_car_category").prop("readonly", true);
//$("#lms_car_category").removeattr("required");


     $("#lms_car_category").val(a.channel);
     console.log(response);
  }
}
    
});
  
var webUbrl = $('#web_url').val();

      $.ajax({
   
              url : webUbrl+'Commoncontrol/getCommentsByLeadId/',
               type : 'POST',
               data : {'leadId':$('#lead_id').val()},
               dataType:'json',
               success: function( data){
                  //var jsonD=JSON.parse(data);
                  if(data.length>0){
                    $('#recentComment').text("BAGI AV Comment: "+data[0].comment);
                  }
                  
               }

            });


});
   </script>

   
<script>
         /*code: 48-57 Numbers
           8  - Backspace,
           35 - home key, 36 - End key
           37-40: Arrow keys, 46 - Delete key*/
         function restrictAlphabets(e){
            var x=e.which||e.keycode;
            if((x>=48 && x<=57) || x==8 ||
               (x>=35 && x<=40)|| x==46)
               return true;
            else
               return false;
         }
      </script>

      <script>

      $('#lms_aaa_number').keypress(function (e) {
            var regex = new RegExp("^[a-zA-Z0-9-]+$");
             var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
       }

            e.preventDefault();
            return false;
   });
         

      </script>
</body>
</html>