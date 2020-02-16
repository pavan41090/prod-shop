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
                          <div class="col-md-5 labeltxtleft"> Application No. </div>
                          <div class="col-md-7">: <label id="lms_edit_application_no"></label>  </div>
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
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" onkeypress='return restrictAlphabets(event)' placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);" required />
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
                     <input type="text" name="lms_aaa_number" onkeypress='return restrictAlphabets(event)' placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" required />               
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
                      <select  class="form-control input-sm" name="lms_car_sub_channel" id="lms_car_sub_channel" ng-model="lms_car_sub_channel">
                        <option value="" disabled selected>Select your option</option> 

                           <?php 
                           foreach($PriorityArray as $Priority )
                           {
                               echo '<option value="'.$Priority['name'].'">'.$Priority['name'].'</option>';
                           }
                           ?>   

                       <!--  <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option> -->
                     </select>
                 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_sub_channel.$dirty" ng-messages="lmsCar.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4" ng-if="lms_car_category=='DT'">
                  <div class="form-group">
                     <label>Sub Channel
                     </label>   <span class="required"> * </span>
                     <select  class="form-control input-sm" name="lms_car_campaign_name" id="lms_car_campaign_name" ng-model="lms_car_campaign_name" required>
                        <option value="" disabled selected>Select your option</option> 
                     <?php 
                           foreach($CampaignArray as $Campaign )
                           {
                               echo '<option value="'.$Campaign['name'].'">'.$Campaign['name'].'</option>';
                           }
                           ?>
                       
                           <!-- <option value="DAILY_CAMPAIGN_GI_DC1">DAILY_CAMPAIGN_GI_DC1</option>
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
                           <option value="Renewed CVM">Renewed CVM</option>   -->       
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
         <?php $arrayPrimIChannel = array('Prime','VRM','Phone Banking','COP'); ?>
        <?php if(in_array($userDetails->Channel, $arrayPrimIChannel)){ ?>
         <div class="row maincontf" >
            <div class="form-group">
                  <div class="col-md-4">
                  <label> Dispatch required on Vision plus address</label> &nbsp;
                  <input class="Spouse_ship" type="checkbox" name="vision_address_name" id="vision_address"  ng-model="vision_address_name"   />
                      </div>
                        
                  <div class="col-md-8"> &nbsp;</div>
                </div>
            </div>
         <?php } ?>
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
                     </label> 
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
                     <input type="text" name="lms_car_area"  placeholder="Area"   class="form-control input-sm" id="lms_car_area"  ng-model="lms_car_area">
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
                     <input list="state" id="lms_car_state" placeholder="Enter the State"  autocomplete="off" name="lms_car_state" class="form-control input-sm" ng-model="lms_car_state" >
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
                        <input type="text" name="lms_car_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="lms_car_pro_landmark" ng-model="lms_car_pro_landmark"/>
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
                        <label>Alternate contact Number</label>
                        <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeypress='return restrictAlphabets(event)' onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile"  /> 
                      <!--  <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_emergency.$dirty" class="required" id="emergencyContact" ng-messages="lmsCar.lms_car_pro_emergency.$error" role="alert">
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
                        <input type="radio" name="lms_car_cus_type" value="corporate" disabled="corporate"  id="lms_car_cus_type_corporate"> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" id="lms_car_cus_type_individual" checked required value="individual"> Individual </label>
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
                        <select name="lms_cus_sdate" id="lms_cus_sdate" class="form-control input-sm" ng-model="lms_cus_sdate" >
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
                        <label>Enhanced Credit Card Limit </label>
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
         <form name="lmsCarDetil" novalidate >
            <div class="carhide" id="cardeatail">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Car Details</span>
                  </div>
               </div>

               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Registration Number <span class="required"> * </span></label>
                        <input type="text" id="lms_car_reg_no" name="lms_car_reg_no" class="form-control input-sm " placeholder="Registration Number" ng-model="lms_car_reg_no" required />
                        <div ng-if="lmsCarDetil.$submitted || lmsCarDetil.lms_car_reg_no.$dirty" ng-messages="lmsCarDetil.lms_car_reg_no.$error" style="color:red" role="alert">
                           <div ng-message="required" class="required">Please Enter Registration Number</div>
                        </div>
                        <!--                                    <p ng-show="form.lms_car_reg_no.$invalid && form.lms_car_reg_no.$dirty">Registration Number Required</p>
                           -->
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Year of manufacture <span class="required"> * </span></label>
                        <input list="Year of manufacture" placeholder="Year of manufacture" name="lms_car_manufacture_year" id="lms_car_manufacture_year" class="form-control input-sm" ng-model="lms_car_manufacture_year" required>
                        <datalist id="Year of manufacture">
                       
                           <?php 
                              $now = date('Y');
                              $then = $now - 9;
                              $years = range( $now, $then );
                              foreach( $years as $v ) {
                                 echo "<option value=".$v.">".$v."</option>";
                              }
                              ?>
                        </datalist>
                        <div ng-if="lmsCarDetil.$submitted || lmsCarDetil.lms_car_manufacture_year.$dirty" ng-messages="lmsCarDetil.lms_car_manufacture_year.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Year of Manufacture</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Manufacturer <span class="required"> * </span></label>
                        <?php ?>
                        <input list="Manufacturer" placeholder="Select Manufacturer" id="lms_car_manufacturer" name="lms_car_manufacturer" class="form-control input-sm" ng-model="lms_car_manufacturer" required>
                        <datalist id="Manufacturer">
                       
                           <?php echo $carbrandArray; ?>
                           <?php foreach($carbrandArray as $carbrand) {
                              echo '<option value="'.$carbrand.'">'.$carbrand.'</option>';
                              } 
                              ?>
                        </datalist>
                        <div ng-if="lmsCarDetil.$submitted || lmsCarDetil.lms_car_manufacturer.$dirty" ng-messages="lmsCarDetil.lms_car_manufacturer.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Manufaturer</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Model Varient <span class="required"> * </span></label>
                        <div id="lms_car_variant-loader" style="padding: 0 25%; display: none;">
                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                        </div>
                        <div id="lms_car_variant-div" style="">
                           <input list="car_vary" placeholder="Select model variants" id="lms_car_variant" name="lms_car_variant" class="form-control input-sm" ng-model="lms_car_variant" required>
                           <datalist id="car_vary">
                            
                           </datalist>
                           <div ng-if="lmsCarDetil.$submitted || lmsCarDetil.lms_car_variant.$dirty" ng-messages="lmsCarDetil.lms_car_variant.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Model Varient</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>City of Registration <span class="required"> * </span></label>
                        <input list="cityofreg" placeholder="City of Registration" id="lms_car_reg_city" name="lms_car_reg_city" class="form-control input-sm" ng-model="lms_car_reg_city" required>
                        <datalist id="cityofreg">

                           <?php 
                              foreach($city as $cval )
                              {
                                  echo '<option value="'.$cval.'">'.$cval.'</option>';
                              }
                              ?>                                       
                        </datalist>
                        <div ng-if="lmsCarDetil.$submitted || lmsCarDetil.lms_car_reg_city.$dirty" ng-messages="lmsCarDetil.lms_car_reg_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Select City of Registration</div>
                           <input type="hidden" name="car_state" id="car_state" ng-model='car_state'>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Policy Expire Date <span class="required"> * </span></label>
                       
                        <input type="text" id="lms_car_policy_exp_date" name="lms_car_policy_exp_date" class="form-control input-sm custom-date" placeholder="Policy Expire Date" ng-model="lms_car_policy_exp_date" required data-date-format="dd-mm-yyyy">
                        <div ng-if="lmsCarDetil.$submitted" ng-messages="lmsCarDetil.lms_car_policy_exp_date.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Policy Expire Date</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>IDV <span class="required"> * </span></label>
                        <input type="hidden" id="caractualamount" name="caractualamount" />
                        <input type="hidden" id="caramount" name="caramount" class="form-control input-sm" placeholder=""/>
                        <!-- <input type="text" id="caramount" name="caramount" class="form-control input-sm" placeholder="IDV: Rs. 3,64,233" ng-model="caramount" /> -->
                        <input type="text" id="lms_car_idv" name="lms_car_idv" class="form-control input-sm" placeholder="IDV Amount"/>
                     </div>
                     <div class="slider-wrapper">
                        <input type="hidden" class="js-decimal" />
                        <label class="display-box-label"></label><br />
                        <div id="js-display-decimal" class="display-box"></div>
                     </div>
                     <div ng-if="lmsCarDetil.$submitted || lmsCarDetil.lms_car_idv.$dirty" ng-messages="lmsCarDetil.lms_car_idv.$error" role="alert">
                        <div ng-message="required" class="required">Please IDV</div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Claim in expiring policy <span class="required">  </span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_claim_policy" ng-model='lms_car_claim_policy' ng-value='"0"'  value="0" checked required> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_claim_policy"  ng-model='lms_car_claim_policy' ng-value='"1"'  value="1" required> Yes </label>  
                           <div ng-if="lmsCarDetil.$submitted || lmsCarDetil.lms_car_claim_policy.$dirty" ng-messages="lmsCarDetil.lms_car_claim_policy.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Claim in expiring policy</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <div id="value_disable">
                           <label>NCB in Expiring policy( % ) <span class="required">  </span></label>  
                           <select name="lms_car_ncb" class="form-control input-sm" id="lms_car_ncb" ng-model="lms_car_ncb" required>
                              <option value="" disabled selected>Select your option</option>
                              <option value="0">0</option>
                              <option value="20">20</option>
                              <option value="25">25</option>
                              <option value="35">35</option>
                              <option value="45">45</option>
                              <option value="55">55</option>
                              <option value="65">65</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>



              <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount<span class="required"> * </span></label>
                       
               <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" required>
                        <div ng-if="lmsCarDetil.$submitted" ng-messages="lmsCarDetil.lms_est_premium.$error" class="required" id="premium-validate" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
                     </div>
                  </div>
               </div>

               <input type="hidden" id="lms_edit_product_id" name="lms_edit_product_id" class="form-control input-sm" ng-model="lms_edit_product_id" />

               <input type="submit" class="btn blue btn-default" style="float:right;" value="Update" ng-click="updateCardetail()"   />
               <br><br>

               <!-- car details hidedive end here -->
            </div>
         </form>
      </div>



      <div ng-app="plunker" ng-controller="myCtrl">
        <form name="lmsCarProposal" novalidate >
            <div class="carhide" id="carproposal">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Car Proposal</span>
                  </div>
               </div>



              
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Existing insurance company name </label>
                        <input list="exinsure" placeholder="Select Existing Insurance Company" id="lms_car_prop_existing_insure" name="lms_car_prop_existing_insure" class="form-control input-sm" ng-model="lms_car_prop_existing_insure">
                        <datalist id="exinsure">
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
                        <!--  <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_prop_existing_insure.$dirty" ng-messages="lmsCarProposal.lms_car_prop_existing_insure.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Existing insurance company name</div>
                           </div> -->
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Existing policy number</label>
                        <input  placeholder="Select Existing policy number" id="lms_car_pro_existing_policynum" name="lms_car_pro_existing_policynum" class="form-control input-sm" ng-model="lms_car_pro_existing_policynum" ng-model="lms_car_pro_existing_policynum" >
                       
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Existing policy expiry date </label>
                        <input type="text" name="lms_car_pro_existing_policy_expiry"  placeholder="DD-MM-YYYY" class="form-control input-sm custom-date-after" id="lms_car_pro_existing_policy_expiry " ng-model="lms_car_pro_existing_policy_expiry" data-date-format="dd-mm-yyyy" />
                     
                     </div>
                  </div>
               </div>
               
               <div class="row maincontf">
                  <div class="col-md-4">
                    
                     <div class="form-group">
                        <label>Proposed policy start date <span class="required"> * </span></label>
                        <input type="text" id="lms_car_pro_policy_start" name="lms_car_pro_policy_start" class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" ng-model="lms_car_pro_policy_start" required data-date-format="dd-mm-yyyy" ng-change="checkPolicyStartDate('lms_car_pro_policy_start')">
                        <div>
						<span ng-if="lmsCarProposal.$submitted" ng-messages="lmsCarProposal.lms_car_pro_policy_start.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter policy start date</div>
						   </span>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">

                     <div class="form-group">
                        <label>Registration date<span class="required"> * </span></label>
                        <input type="text" id="lms_car_pro_regis_date" name="lms_car_pro_regis_date" class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" ng-model="lms_car_pro_regis_date" required data-date-format="dd-mm-yyyy">
                        <div ng-if="lmsCarProposal.$submitted" ng-messages="lmsCarProposal.lms_car_pro_regis_date.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter policy start date</div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Was the previous policy a Standalone Third party policy? <span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_stand_alone" id="lms_car_pro_prev_stand_alone_yes" /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_stand_alone" id="lms_car_pro_prev_stand_alone_no" /> No </label>
                        </div>
                     </div>
                  </div>

               </div>
              


            <div class="row maincontf">

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Depreciation cover included in the previous policy?<span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_depre" id="lms_car_pro_prev_depre_yes" /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_depre" id="lms_car_pro_prev_depre_no" /> No </label>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Electrical/Non-electrical accessories included in the previous policy?<span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_electric" id="lms_car_pro_prev_electric_yes" /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_electric" id="lms_car_pro_prev_electric_no" /> No </label>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>External fitted CNG/LPG kit included in the previous policy?<span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_cng_lpg" id="lms_car_pro_prev_cng_lpg_yes" /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_cng_lpg" id="lms_car_pro_prev_cng_lpg_no" /> No </label>
                        </div>
                     </div>
                  </div> 

            </div>   


               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Vehicle engine number is<span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_engine_num"  placeholder="Enter Engine number" class="form-control input-sm" id="lms_car_pro_engine_num" ng-model="lms_car_pro_engine_num" required />
                        <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_engine_num.$dirty" ng-messages="lmsCarProposal.lms_car_pro_engine_num.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter engine number is</div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Vehicle chasis number is<span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_chasis_num"  placeholder="Enter Chasis Number" class="form-control input-sm" id="lms_car_pro_chasis_num" ng-model="lms_car_pro_chasis_num" required />
                        <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_chasis_num.$dirty" ng-messages="lmsCarProposal.lms_car_pro_chasis_num.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Chasis Number</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Vehicle is financed
                        <span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_financed" id="lms_car_pro_financed_yes" class="lms_car_pro_financed" value="1" /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_financed" id="lms_car_pro_financed_no" class="lms_car_pro_financed"  value="0" /> No </label>
                        </div>
                     </div>
                  </div>
               </div>
            

               <div class="row maincontf" id="vechicle_finiance_div">

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Financing institution name</label>
                        <input type="text" name="lms_car_pro_fin_ins_name"  placeholder="Financing institution name" class="form-control input-sm" id="lms_car_pro_fin_ins_name" ng-model="lms_car_pro_fin_ins_name" />
<!--                         <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_chasis_num.$dirty" ng-messages="lmsCarProposal.lms_car_pro_chasis_num.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Chasis Number</div>
                        </div> -->
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Financing institution city</label>
                        <input type="text" name="lms_car_pro_fin_ins_city"  placeholder="Financing institution city" class="form-control input-sm" id="lms_car_pro_fin_ins_city" ng-model="lms_car_pro_fin_ins_city" />
<!--                         <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_chasis_num.$dirty" ng-messages="lmsCarProposal.lms_car_pro_chasis_num.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Chasis Number</div>
                        </div> -->
                     </div>
                  </div>                  
               </div>   


               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Nominee Name <span class="required"> * </span></label>
                        <input type="text"  name="lms_car_pro_nname" placeholder="Enter Nominee Name" class="form-control input-sm" id="lms_car_pro_nname" ng-model="lms_car_pro_nname"  required/>
                        <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_nname.$dirty" ng-messages="lmsCarProposal.lms_car_pro_nname.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Nominee Name</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Nominee Age <span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_nage"  placeholder="Enter Nominee Age" class="form-control input-sm age-validate" id="lms_car_pro_nage" ng-model="lms_car_pro_nage" required/>
                        <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_nage.$dirty" ng-messages="lmsCarProposal.lms_car_pro_nage.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Nominee Age</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Nominee Relationship
                        <span class="required"> * </span></label>
                        <select id="lms_car_pro_nomie_relation" name="lms_car_pro_nomie_relation" class="form-control input-sm" ng-model="lms_car_pro_nomie_relation"  required>
                           <option value="" disabled selected>Select your option</option>
                           <option value="Father">Father</option>
                           <option value="Mother">Mother</option>
                           <option value="Brother">Brother</option>
                           <option value="Sister">Sister</option>
                           <option value="Spouse">Spouse</option>
                           <option value="Son">Son</option>
                           <option value="Daughter">Daughter</option>
                        </select>
                        <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_nomie_relation.$dirty" ng-messages="lmsCarProposal.lms_car_pro_nomie_relation.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Last Name</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
                  
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Name Of Appointee(if nominee is minor) </label>
                        <input type="text" name="lms_car_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="lms_car_pro_nameofappoint" ng-model="lms_car_pro_nameofappoint" >
                        <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_nameofappoint.$dirty" ng-messages="lmsCarProposal.lms_car_pro_nameofappoint.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Nominee Name</div>
                        </div>
                     </div>
                  </div>
                   <div class="col-md-4">
                     <div class="form-group">
                        <label>Appointee Relationship with nominee
                        </label>
                        <select id="lms_car_pro_appoint_relation" name="lms_car_pro_appoint_relation" class="form-control input-sm" ng-model="lms_car_pro_appoint_relation"  >
                           <option value="" disabled selected>Select your option</option>
                           <option value="Father">Father</option>
                           <option value="Mother">Mother</option>
                           <option value="Brother">Brother</option>
                           <option value="Sister">Sister</option>
                           <option value="Spouse">Spouse</option>
                           <option value="Son">Son</option>
                           <option value="Daughter">Daughter</option>
                        </select>
                        <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_appoint_relation.$dirty" ng-messages="lmsCarProposal.lms_car_pro_appoint_relation.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Last Name</div>
                        </div>
                     </div>
                  </div>
               </div>
              
               <h4 class="propsal-seperator">Tell us about your driving related habits </h4>
               <hr>
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>I have been driving a car for </label>
                        <input list="drivecar" placeholder="Select " id="lms_car_pro_drive" name="lms_car_pro_drive" class="form-control input-sm" ng-model="lms_car_pro_drive" >
                        <datalist id="drivecar">
                           <option value="0-1 Years"></option>
                           <option value="1-2 Years"></option>
                           <option value="2-3 Years"></option>
                           <option value="3-5 Years"></option>
                           <option value="More than 5 years"></option>
                        </datalist>
                        <!-- <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_drive.$dirty" ng-messages="lmsCarProposal.lms_car_pro_drive.$error" role="alert">
                           <div ng-message="required" class="required">Please Select I have been driving two wheeler</div>
                           </div> -->
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>My parking at night is</label>
                        <input list="parking" placeholder="Select " id="lms_car_pro_parking" name="lms_car_pro_parking" class="form-control input-sm" ng-model="lms_car_pro_parking" >
                        <datalist id="parking">
                           <option value="Covered"></option>
                           <option value="Open (Road Side)"></option>
                           <option value="Open (Inside compound)"></option>
                        </datalist>
                        <!-- <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_parking.$dirty" ng-messages="lmsCarProposal.lms_car_pro_parking.$error" role="alert">
                           <div ng-message="required" class="required">Please Select My parking at night</div>
                           </div> -->
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>My family members who can drive are</label>
                        <input list="family" placeholder="Select " id="lms_car_pro_who_drive" name="lms_car_pro_who_drive" class="form-control input-sm" ng-model="lms_car_pro_who_drive" >
                        <datalist id="family">
                           <option value="1"></option>
                           <option value="2"></option>
                           <option value="3"></option>
                           <option value="More than 3"></option>
                        </datalist>
                        <!--  <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_who_drive.$dirty" ng-messages="lmsCarProposal.lms_car_pro_who_drive.$error" role="alert">
                           <div ng-message="required" class="required">Please Select My family members who can drive</div>
                           </div> -->
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Annually,we drive our car about kms </label>
                        <input list="kms" placeholder="Select " id="lms_car_pro_kms" name="lms_car_pro_kms" class="form-control input-sm" ng-model="lms_car_pro_kms" >
                        <datalist id="kms">
                           <option value="30"></option>
                           <option value="40"></option>
                           <option value="60"></option>
                           <option value="80"></option>
                        </datalist>
                        <!--  <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_kms.$dirty" ng-messages="lmsCarProposal.lms_car_pro_kms.$error" role="alert">
                           <div ng-message="required" class="required">Please Select we drive our two-wheeler about kms</div>
                           </div> -->
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>The youngest driver in my family is aged </label>
                        <input type="text" name="lms_car_pro_ydage" placeholder="Enter Young driver Age" class="form-control input-sm" id="lms_car_pro_ydage" ng-model="lms_car_pro_ydage" >
                        <!--  <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.lms_car_pro_ydage.$dirty" ng-messages="lmsCarProposal.lms_car_pro_ydage.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter youngest driver in my family is aged</div>
                           </div> -->
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Do i use a driver</label>
                        <input list="DRIVER" placeholder="Select " id="lms_lms_car_pro_driver" name="lms_lms_car_pro_driver" class="form-control input-sm" ng-model="lms_lms_car_pro_driver" >
                        <datalist id="DRIVER">
                           <option value="Yes"></option>
                           <option value="No"></option>
                        </datalist>
                        <!--  <div ng-if="lmsCarProposal.$submitted || quotesCar.lms_lms_car_pro_driver.$dirty" ng-messages="lmsCarProposal.lms_lms_car_pro_driver.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Do i use a driver</div>
                           </div> -->
                     </div>
                  </div>
               </div>
              
              <h4 class="propsal-seperator">Add New Comment </h4>
               <hr>
                <div id="recentComment" style="font-weight:bold;color:red">
                
              </div>
                 <div class="row">

                     <div class="form-group">
                       <div class="col-md-12">
                        <!--  <label class="newcoments">Add New Comment </label> -->
                         
                         <textarea class="form-control" rows="5" id="lms_car_comment" name="lms_car_comment" ng-model="lms_car_comment" placeholder="Comments"></textarea>
                         <div style="display: none;" class="required" id="cmt_error">Comment should not be blank</div>
                   <!--       <div class="leavecomoment">
                           <input type="button" name="add_comment" id="add_comment" class="btn blue btn-default" value="Leave Comment">
                        </div> -->
                       </div>
                     </div>
                 </div>
                 <div class="row">&nbsp;</div>


                 <div class="row lmsresbor">
                     <div class="form-group">
                        <div class="col-md-12">
                           <input class="Spouse_ship" type="checkbox" name="declaration" id="declaration"  ng-model="declaration" value="0" required />
                           <label> I hereby declare that the customer has a HDFC Bank Relationship – (Bank Account/Credit Card/LOS Number) </label><span class="required">*</span>
                           <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.declaration.$dirty" ng-messages="lmsCarProposal.declaration.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Decleration</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>

                        <div class="col-md-12">
                           <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="0" required />
                           <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                           <div ng-if="lmsCarProposal.$submitted || lmsCarProposal.premiumPayment.$dirty" ng-messages="lmsCarProposal.premiumPayment.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Premium Payment Mode</div>
                           </div>
                        </div>
                     </div>
                  </div> 

         

               <div class="row">
                  <div class="col-md-6">
  
                  </div>
                  <div class="col-md-6">
                     <div class="pull-right">
                        <div class="form-group">
                           <a href="<?php echo base_url(); ?>qms-car-proposal-view" >
                           <button type="submit"  class="btn blue btn-default send_quote" ng-click="updateProposal()" >Save Lead</button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>


                <!-- proposal hidedive end here -->
            </div>
         </form>



      </div>
      <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%;">
         <div class="modal-dialog">
            <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
            <button type="button" class="btn btn-default" id= "close_modal" data-dismiss="modal">Close</button>
         </div>
      </div>

      <input type='hidden' id="load_modal" data-toggle="modal" data-target="#myModal">    



      <!-- controller ends here -->
   </div>


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
<script type="text/javascript">
   jQuery(document).ready(function() { 
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

     // loadIdvValueSlider(0,0,0); 
      
     var dt = new Date();
      var currentyear = dt.getFullYear();
          
      var carbrandString = JSON.stringify(null);
      var carmodelVariantsString = JSON.stringify(null);
      var carmodelsString = JSON.stringify(null);
      var carhashBrandCategoriesedString = JSON.stringify(null);
      var carmhashBrandCategoriesedString = JSON.stringify(null);
      var carhashkeys = JSON.stringify(null);
   
      var carbrandArray = JSON.parse(carbrandString);
      var carbrandVariants = JSON.parse(carmodelVariantsString);
      var carmbrandVariants = JSON.parse(carmodelsString);
      var carhashBrandCategoriesed = JSON.parse(carhashBrandCategoriesedString);
      var carmhashBrandCategoriesed = JSON.parse(carmhashBrandCategoriesedString);
      var carhashkeysprice = JSON.parse(carhashkeys);
      var amt ='';
      var pct = '';
      
     
      $('#lms_car_manufacturer').change(function() {
         $('#lms_car_variant-div').hide();      
         $('#lms_car_variant-loader').show();  
         $('#car_vary').find('option')
              .remove()
              .end()
              .append('<option value="">Select Model Variants</option>')
              .val('');
   
         if(typeof(carmbrandVariants[$(this).val()]) == "undefined" && carmbrandVariants[$(this).val()] == null) {
              return;
         }
   
         $.each(carmbrandVariants[$(this).val()], function(key, value) {
              $('#car_vary')
                  .append($("<option></option>")
                      .attr("value",value)
                      .text(value));
         }); 
            setTimeout(function(){
               $('#lms_car_variant-div').show();      
               $('#lms_car_variant-loader').hide();
               $('#lms_car_variant').focus();
            }, 1500);
   
   
   
   
      });
   
   
   
      $('#lms_car_reg_city').change(function(){
   
         var selectedCity = $(this).val();
   
         var cityArray = JSON.parse('<?php echo json_encode($cityComplete); ?>');
         for (i = 0; i < cityArray.length; i++) {
            if(cityArray[i].city === selectedCity){ 
              //alert(cityArray[i].state);
              $('#car_state').val(cityArray[i].state); 
            }
         }
   
      });
   
   
   
      $(document).on('change', '#lms_car_variant', function() {
   
          $('#caramount').val('');
          var cyear = $('#lms_car_manufacture_year').val();
          var noyears = currentyear - cyear;
      
          var carhashKey = $(this).val();
          var carhashVal = window.btoa(carhashKey);
          
          if (typeof(carmhashBrandCategoriesed[carhashVal]) == "undefined" && carmhashBrandCategoriesed[carhashVal] == null) {
              return;
          }
   
          var amount = carmhashBrandCategoriesed[carhashVal];
          
          //$('#caramount').val(carmhashBrandCategoriesed[carhashVal]);
          if(noyears == 0){
              amt = amount;
          }
          if(noyears == 1){
             amt= percentagecalcar('20%',amount)
             //amt = amount;
          }
          if(noyears == 2){
             amt= percentagecalcar('20%',amount)
             //amt = amount;
          }
          if(noyears == 3){
             amt= percentagecalcar('30%',amount)
             //amt = amount;
          }
          if(noyears == 4){
             amt= percentagecalcar('40%',amount)
             //amt = amount;
          }
          if(noyears == 5){
             amt= percentagecalcar('50%',amount)
             //amt = amount;
          }
          if(noyears == 6){
             amt= percentagecalcar('55%',amount)
             //amt = amount;
          }
          if(noyears == 7){
             amt= percentagecalcar('59%',amount)
             //amt = amount;
          }
          if(noyears == 8){
             amt= percentagecalcar('64%',amount)
             //amt = amount;
          }
          if(noyears == 9){
             amt= percentagecalcar('67%',amount)
             //amt = amount;
          }
          if(noyears == 10){
             amt= percentagecalcar('70%',amount)
             //amt = amount;
          }
          $('#caramount').val(amt);
          $('#caractualamount').val(amt);
          $('#lms_car_idv').val(carmhashBrandCategoriesed[amount]);
   
            updateIDVvalue(amt,noyears);
      });
   
         function updateIDVvalue(caramount, car_age){
   
            //alert('hii am here');
        var idv_car = 0;
        var d = new Date();
        var curr_year = d.getFullYear();
       
   
        switch (car_age) {
   
            case 1:
                idv_car = caramount*0.95;
                break;
            case 2:
                idv_car = caramount*0.8;
                break;
            case 3:
                idv_car = caramount*0.7;
                break;
            case 4:
                idv_car = caramount*0.6;
                break;
            case 5:
                idv_car = caramount*0.5;
                break;
            case 6:
                idv_car = caramount*0.45;
                break;
            case 7:
                idv_car = caramount*0.41;
                break;
            case 8:
                idv_car = caramount*0.36;
                break;
            case 9:
                idv_car = caramount*0.33;
                break;
            case 10:
                idv_car = caramount*0.3;
            break;
        }
   
         $('#lms_car_idv').val(idv_car);
         var min =percentagecal('15%',idv_car,'min');
         var max =percentagecal('15%',idv_car,'max');
   
        // $('.previous').html("");
        $('.range-bar').addClass("previous");
         loadIdvValueSlider(min,max,idv_car); 
   
      }
   
   
      function percentagecalcar(pct,amount) {
              pct = parseFloat(pct) / 100;
              amt = amount - pct;
              return amt;
      }
   
   
      function percentagecal(pct,amount,qnt) {
         pcts = parseFloat(pct) / 100;
         if(qnt == 'min'){
            var amt = amount - (amount*pcts); 
         } else {
            var amt = amount + (amount*pcts);
         }
         return amt;
      }
   
   })
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
   $('input[name="lms_car_claim_policy"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#value_disable').hide(); 
          
      } else {
         
         $('#value_disable').show(); 
          
      }
   }).change();
   
</script>


<script>
   $(".lms_car_pro_financed").on('change', function() {
      var value = $(this).val();
      if(value ==1) {
         $('#vechicle_finiance_div').show(); 
      } else {
         $('#vechicle_finiance_div').hide(); 
      }
   });
</script>
<!--  <script>
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
  



});
   </script> -->



<!-- <script>
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
      </script> -->

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