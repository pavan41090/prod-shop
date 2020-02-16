<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car_edit.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lms_js/sship.js"></script>
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
                      <select  class="form-control input-sm" name="lms_car_sub_channel" id="lms_car_sub_channel" ng-model="lms_car_sub_channel" required>
                        <option value="" disabled selected>Select your option</option> 

                           <?php 
                           foreach($PriorityArray as $Priority )
                           {
                               echo '<option value="'.$Priority['name'].'">'.$Priority['name'].'</option>';
                           }
                           ?>   

                    
                     </select>
                 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_sub_channel.$dirty" ng-messages="lmsCar.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>

              
                 <div class="col-md-4" ng-if="lms_car_category=='DT'" >
                  <div class="form-group">
                     <label>Sub Channel</label>   <span class="required"> * </span>
                     <select  class="form-control input-sm" name="lms_car_campaign_name" id="lms_car_campaign_name" ng-model="lms_car_campaign_name" required>
                        <option value="" disabled selected>Select your option</option> 
                      
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
                         <?php 
                           foreach($occupationlistArray as $occupation )
                           {
                               echo '<option value="'.$occupation['name'].'">'.$occupation['name'].'</option>';
                           }
                           ?>
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
                 
                  <input type="submit" class="btn blue btn-default" style="float:right;" value="Update"  ng-disabled="isDisabled"ng-click="updateCustomer(); onFormSubmit(); customerdis()"   />
            <br><br>
         </form>
      </div>

<!--Premium caliculation section-->

<div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsShipProduct" novalidate >
            <div class="carhide" id="cardeatail">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase"><?php echo $sub_module; ?> Details</span>
                  </div>
               </div>
                <div class="row maincontf">
                   <div class="col-md-4">
                <div class="form-group">
                     <div class="question">
                      <label>Include Spouse</label> <span class="required"> </span>
                       <input class="Spouse_ship" type="checkbox" name="Spouse_ship" ng-model="spouse.spouse_ship" class="Spouse_ship test" id="Spouse_ship" ng-disabled="true" value="1"/>
                   </div>
                  <div class="answer" ng-if="spouse.spouse_ship">
                  <label>Spouse DOB</label><span class="required">*</span>
                 <input ng-init="loadSpouseDate()" type="text" id="sship_spouse" name="sship_spouse" class="form-control input-sm custom-date-dob" required data-date-format="dd-mm-yyyy" placeholder="Spouse Date of Birth" ng-model="sship_spouse" ng-change="spouse_dob=sship_spouse"  >
                 <div ng-if="lmsShipProduct.$submitted " ng-messages="lmsShipProduct.sship_spouse.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Spouse DOB</div>
                     </div>
              </div>
             </div>
          </div>
   
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Include Children </label><span class="required">  </span>
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" id="noofchildrens0" class="noofchildrens" ng-model='noofchildrens'   value="0"  ng-disabled="true" required> 0 </label>   
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" id="noofchildrens1" class="noofchildrens" ng-model='noofchildrens'    value="1"  ng-disabled="true" required> 1 </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" id="noofchildrens2" class="noofchildrens" ng-model='noofchildrens'   value="2" ng-disabled="true"  required> 2 </label>    
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" id="noofchildrens3" class="noofchildrens" ng-model='noofchildrens'   value="3" ng-disabled="true"  required> 3 </label>        
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                     <div class="form-group">
                        <label>Income (P.A)
                        <span class="required"> * </span></label>
                        <div class="radio-list">
                           <input type="text" id="sship_income" name="sship_income" class="form-control input-sm" placeholder="Income (P.A)" ng-model="sship_income" required /> 
                           <div ng-if="lmsShipProduct.$submitted || lmsShipProduct.sship_income.$dirty" ng-messages="lmsShipProduct.sship_income.$error" role="alert">
                              <div ng-message="required" class="required">Please Enter your Income</div>
                           </div>
                        </div>
                     </div>
                  </div>
                 
            </div>
             <div class="row maincontf">
                <div class="col-md-4">
                     <div class="form-group">
                        <label>Policy Term (in Years)<span class="required"> * </span></label>  

                        <select id="policyterm" name="policyterm" class="form-control input-sm" ng-model="policyterm" ng-init="policyterm='1'" required>
                         <option value="1">1</option>
                     </select>
                        
                        <div ng-if="lmsShipProduct.$submitted" ng-messages="lmsShipProduct.policyterm.$error" role="alert">
                           <div ng-message="required" class="required">Please Select your Policy Term</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                              <label>Sum Insured</label>
                              <span class="required"> * </span>
                              <select id="ss_sum_insured" name="ss_sum_insured" onchange="calculateCustomer_age()" class="form-control input-sm" ng-model="ss_sum_insured"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="500000">500000</option>
                                    <option value="750000">750000</option>
                                    <option value="1000000">1000000</option>
                                    </select> 
                                 <div ng-if="lmsShipProduct.$submitted || lmsShipProduct.ss_sum_insured.$dirty" ng-messages="lmsShipProduct.ss_sum_insured.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select In Sum Insured Amount</div>
                                 </div>
                              </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount <span class="required"> * </span></label>
                        <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" ng-disabled="true" required>
                        <div ng-if="lmsShipProduct.$submitted" ng-messages="lmsShipProduct.lms_est_premium.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
                     </div>
                  </div>
               </div>
                  <div class="row maincontf">
                  
                  <div class="col-md-4">
                <div class="form-group">
                     <div class="question">
                      <label>Hospital Daily Cash</label><span class="required"> </span>
                      <input type="checkbox" name="ss_hospital_daily" ng-model="ss_hospital_daily" id="ss_hospital_daily" class="form-control input-sm">
                   </div>
                 
             </div>
          </div>

           <div class="col-md-4">
                <div class="form-group">
                     <div class="question">
                      <label>Critical Illness</label><span class="required"> </span>
                       <input type="checkbox" name="ss_critical" ng-model="ss_critical" id="ss_crtical" class="ss_critical" value="1">
                   </div>
                    <div class="answer1">
                 
                     <div class="form-group" >
                              <label>Sum Insured</label>
                              <span class="required"> * </span>
                              <select id="ss_sum_insured_critical" name="ss_sum_insured_critical" class="form-control input-sm  sumInsured" ng-model="ss_sum_insured_critical"  >
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="500000">500000</option>
                                    <option value="750000">750000</option>
                                    <option value="1000000">1000000</option>
                                    </select> 
                                 <!-- <div ng-if="lmsShipProduct.$submitted || lmsShipProduct.ss_sum_insured.$dirty" ng-messages="lmsShipProduct.ss_sum_insured.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select In Sum Insured Amount</div>
                                 </div> -->
              </div>
              </div>              
             </div>
          </div> 
           


                  </div> 

               
         
            
                <input type="submit" class="btn blue btn-default" style="float:right;" value="Update" ng-disabled="isDisabled" ng-click="shipUpdateProductDetail(); onFormSubmit(); customerdis()"   />
               <br><br>

               <!-- car details hidedive end here -->
            </div>
         </form>
      </div>


<div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsShipProposal" novalidate >
            <div class="carhide" id="carproposal">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">PROPOSAL DETAILS SELF</span>
                  </div>
               </div>


         <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Salutation </label> <span class="required">*</span>
                     <select id="self_salut" name="self_salut" class="form-control input-sm" ng-model="self_salut" >
                         <option value="" disabled selected>Select your option</option>
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'">'.$salut['id'].'</option>';
                           }
                        ?>   
                     </select>
                    <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.self_salut.$dirty" ng-messages="lmsShipProposal.self_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Option</div>
                     </div> -->  

                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>First Name</label> <span class="required">*</span>
                     <input type="text" name="self_fname"  placeholder="First Name"  class="form-control input-sm" id="self_fname" ng-model="self_fname" > 
                     <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.self_fname.$dirty" ng-messages="lmsShipProposal.self_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter First Name</div>
                     </div> -->                            
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Last Name <span class="required"> * </span>
                     </label>
                     <input type="text" name="self_lname"  placeholder="Last Name"   class="form-control input-sm" id="self_lname"  ng-model="self_lname" > 
                     <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.self_salut.$dirty" ng-messages="lmsShipProposal.self_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Last Name</div>
                     </div> -->                      
                  </div>
               </div>
            </div>   

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label> DOB </label> <span class="required">*</span>
                     <input type="text" id="self_dob" name="self_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="self_dob" data-date-format="dd-mm-yyyy" >
                     <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.self_dob.$dirty" ng-messages="lmsShipProposal.self_dob.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter DOB</div>
                     </div> -->                        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Gender </label> <span class="required">*</span>
                     <select  class="form-control input-sm" name="self_gender" id="self_gender" ng-model="self_gender" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                     <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.self_gender.$dirty" ng-messages="lmsShipProposal.self_gender.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Gender</div>
                     </div> -->                       
                  </div>
               </div>               

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Occupation <span class="required"> * </span></label>
                     <select id="self_occupation" name="self_occupation" class="form-control input-sm" ng-model="self_occupation" >
                        <option value="" disabled selected>Select your option</option>
                       <?php 
                           foreach($occupationlistArray as $occupation )
                           {
                               echo '<option value="'.$occupation['name'].'">'.$occupation['name'].'</option>';
                           }
                           ?>
                     </select>
                   <!--   <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_occupation.$dirty" ng-messages="lmsCar.lms_car_pro_occupation.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Occupation</div>
                     </div> -->
                  </div>
               </div>
            </div>



            <div class="row maincontf">
              <div class="col-md-4">
               <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="sship_pro_policy_start" name="sship_pro_policy_start" class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" ng-model="sship_pro_policy_start" required data-date-format="dd-mm-yyyy">
                     <div ng-if="lmsShipProposal.$submitted" ng-messages="lmsShipProposal.sship_pro_policy_start.$error" role="alert">
                        <div ng-message="required" class="required">Please enter policy start date</div>
                     </div>
                  </div>   
               </div>                           
                     
                          
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Height(in CM's)<span class="required"> * </span></label>
                     <input type="text" name="sship_pro_height" onkeypress='return restrictAlphabets(event)' placeholder="Enter Height(in CM's)" class="form-control input-sm" id="sship_pro_height" ng-model="sship_pro_height" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_height.$dirty" ng-messages="lmsShipProposal.sship_pro_height.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Height</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Weight(in KG's)<span class="required"> * </span></label>
                     <input type="text" name="sship_pro_Weight" onkeypress='return restrictAlphabets(event)' placeholder="EnterWeight(in KG's)" class="form-control input-sm" id="sship_pro_Weight" ng-model="sship_pro_Weight" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_Weight.$dirty" ng-messages="lmsShipProposal.sship_pro_Weight.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Weight</div>
                     </div>
                  </div>
               </div>
               <!-- <div ng-change="onBmical()" ng-if="false"  ng-messages="lmsShipProposal.$error" role="alert">
                  <div ng-message="required" class="required">Lead Cannot be saved,BMI exceeding limits</div>
               </div> -->
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
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_suffered.$dirty" ng-messages="lmsShipProposal.sship_pro_suffered.$error" role="alert">
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
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_diseases.$dirty" ng-messages="lmsShipProposal.sship_pro_diseases.$error" role="alert">
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
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_psychiatric.$dirty" ng-messages="lmsShipProposal.sship_pro_psychiatric.$error" role="alert">
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
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_medication.$dirty" ng-messages="lmsShipProposal.sship_pro_medication.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>
<!-- 
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Are you currently suffering from or have ever suffered from Dysfunctional uterine bleeding, Fibroid, Cyst / Fibroadenoma or any other Gynaecological / Breast disorder?

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Fibroid" ng-model='sship_pro_fibroid' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Fibroid" ng-model='sship_pro_fibroid' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_fibroid.$dirty" ng-messages="lmsShipProposal.sship_pro_fibroid.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div> -->

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
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_cyst.$dirty" ng-messages="lmsShipProposal.sship_pro_cyst.$error" role="alert">
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
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_bltest.$dirty" ng-messages="lmsShipProposal.sship_pro_bltest.$error" role="alert">
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
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_diabetes.$dirty" ng-messages="lmsShipProposal.sship_pro_diabetes.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

<!--        <div class="row maincontf">
         <div class="col-md-12">
            <div class="form-group">
               <div class="col-md-10"><label>Is the insured person pregnant? If yes, please mention the expected date of delivery
                  <span class="required"> * </span></label>
               </div>
               <div class="col-md-2">
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="sship_pro_pregnant" ng-model='sship_pro_pregnant' class="sship_pro_pregnant" ng-value="1" value="1" required/> Yes </label>
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="sship_pro_pregnant" ng-model='sship_pro_pregnant' class="sship_pro_pregnant" ng-value="0" value="0" required/> No </label>
               </div>
               <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_pregnant.$dirty" ng-messages="lmsShipProposal.sship_pro_pregnant.$error" role="alert">
                  <div ng-message="required" class="required">Please Select</div>
               </div>
            </div>
         </div>
      </div> -->

         <div class="row maincontf" id="delivery_date_div" style="display: none;">
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-3"><label>Delivery Date</label></div>
                  <div class="col-md-4"><input type="text" name="delivery_date" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy"  ng-model='delivery_date' id="delivery_date" ></div>   
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
                     <input type="radio" name="sship_pro_advice" ng-model='sship_pro_advice' class="treatment" ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="sship_pro_advice" ng-model='sship_pro_advice' class="treatment" ng-value="0" value="0" required/> No </label>
                  </div>
                  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_advice.$dirty" ng-messages="lmsShipProposal.sship_pro_advice.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div>
               </div>
            </div>
         </div>


         <div class="row maincontf" id="treatment_div" style="display: none;">
            <div class="col-md-12" style="border: 1px #000 solid;">
               <div class="form-group col-md-12" > 
                  <div class="col-md-3"><label>Name of Existing Diseases/Surgery</label></div>
                  <div class="col-md-2"><label>Diagnosis Date</label></div>
                  <div class="col-md-2"><label>Date of last consultation</label></div>
                  <div class="col-md-2"><label>Treatment Type</label></div>
                  <div class="col-md-3"><label>Doctor/Hospital Name & Phone No.</label></div>
               </div>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="surgery_name1" ng-model="surgery_name1" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="diagnosis_date1" ng-model="diagnosis_date1" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="diagnosis_date1"></div>
                  <div class="col-md-2"><input type="text" name="date_consultation1" ng-model="date_consultation1" class="form-control input-sm custom-date-dob dob_higher" id="date_consultation1" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="treatment_type1" name="treatment_type1" class="form-control input-sm" ng-model="treatment_type1" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="hospital_name1" ng-model="hospital_name1" class="form-control input-sm" ></div>
               </div>
               <br/>
             
               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="surgery_name2" ng-model="surgery_name2" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="diagnosis_date2" ng-model="diagnosis_date2" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="diagnosis_date2"></div>
                  <div class="col-md-2"><input type="text" name="date_consultation2" ng-model="date_consultation2" class="form-control input-sm custom-date-dob dob_higher" id="date_consultation2" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="treatment_type2" name="treatment_type2" class="form-control input-sm" ng-model="treatment_type2" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="hospital_name2" ng-model="hospital_name2" class="form-control input-sm" ></div>
               </div>

               <br/>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="surgery_name3" ng-model="surgery_name3" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="diagnosis_date3" ng-model="diagnosis_date3" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="diagnosis_date3"></div>
                  <div class="col-md-2"><input type="text" name="date_consultation3" ng-model="date_consultation3" class="form-control input-sm custom-date-dob dob_higher" id="date_consultation3" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="treatment_type3" name="treatment_type3" class="form-control input-sm" ng-model="treatment_type3" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="hospital_name3" ng-model="hospital_name3" class="form-control input-sm" ></div>
               </div>
               <br/>               


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
                        <input type="radio" name="sship_pro_gutka" ng-model='sship_pro_gutka' class="sship_pro_gutka" ng-value="1" value="1" required/> Yes </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="sship_pro_gutka" ng-model='sship_pro_gutka' class="sship_pro_gutka" ng-value="0" value="0" required/> No </label>
                     </div>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_gutka.$dirty" ng-messages="lmsShipProposal.sship_pro_gutka.$error" role="alert">
                        <div ng-message="required" class="required">Please Select</div>
                     </div>
                  </div>
               </div>
            </div>
                         

               <div class="row maincontf" id="sship_pro_gutka_div" style="display: none;">
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Smoke (No. of sticks)</label></div>
                        <div class="col-md-4"><input type="text" name="smoke" ng-model='smoke' id="smoke" ng-model='smoke' ></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Alcohol (No of pegs / Beer Bottles - Each Peg is 30 ml)</label></div>
                        <div class="col-md-4"><input type="text" name="alcohol" ng-model='alcohol' id="alcohol" ng-model='alcohol' ></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Pan Masala (No of Pouches)</label></div>
                        <div class="col-md-4"><input type="text" name="pan_masala" ng-model='pan_masala' id="pan_masala" ng-model='pan_masala'></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Others</label></div>
                        <div class="col-md-4"><input type="text" name="others" ng-model='others' id="others" ng-model='others' ></div>   
                     </div>
                  </div>
               </div> 

               <div>&nbsp;</div>


         <div id="spouse-propsal-details" ng-if="spouse.spouse_ship" >
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Details of your Spouse</span>
                  </div>
               </div>

          <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Salutation <span class="required">*</span> </label>
                     <input list="saluteSpouse" id="spouse_salut" placeholder="Salutation" name="spouse_salut" class="form-control input-sm" ng-model="spouse.spouse_salut" required>
                     <datalist id="saluteSpouse">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_salut.$dirty" ng-messages="lmsShipProposal.spouse_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Salutation</div>
                     </div> 
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse First Name  <span class="required">*</span> </label>  
                     <input type="text" name="spouse_fname"  placeholder="Spouse First Name"  class="form-control input-sm" id="spouse_fname" ng-model="spouse.spouse_fname" required /> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_fname.$dirty" ng-messages="lmsShipProposal.spouse_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Spouse First Name</div>
                     </div>           
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="spouse_lname"  placeholder="Spouse Last Name"   class="form-control input-sm" id="spouse_lname"  ng-model="spouse.spouse_lname" required /> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_lname.$dirty" ng-messages="lmsShipProposal.spouse_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Spouse Last Name</div>
                     </div>
                  </div>
               </div>
            </div>   

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse DOB <span class="required"> * </span> </label>
                     <input type="text" id="spouse_dob" name="spouse_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="spouse.spouse_dob" data-date-format="dd-mm-yyyy" ng-disabled="spouse_dob">
                      <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_dob.$dirty" ng-messages="lmsShipProposal.spouse_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Spouse DOB</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Gender <span class="required"> * </span> </label>
                     <select  class="form-control input-sm" name="spouse_gender" id="spouse_gender" ng-model="spouse.spouse_gender" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_gender.$dirty" ng-messages="lmsShipProposal.spouse_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Spouse Gender</div>
                     </div>
                  </div>
               </div>               

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Occupation <span class="required"> * </span> </label>
                     <select id="spouse_occupation" name="spouse_occupation" class="form-control input-sm" ng-model="spouse.spouse_occupation" required>
                        <option value="" disabled selected>Select your option</option>
                        <?php 
                           foreach($occupationlistArray as $occupation )
                           {
                               echo '<option value="'.$occupation['name'].'">'.$occupation['name'].'</option>';
                           }
                           ?>
                     </select>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_occupation.$dirty" ng-messages="lmsShipProposal.spouse_occupation.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Spouse Occupation</div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Height(in CM's)  <span class="required"> * </span> </label>
                     <input type="text" name="spouse_height" onkeypress='return restrictAlphabets(event)' placeholder="Enter Height(in CM's)" class="form-control input-sm" id="spouse_height" ng-model="spouse.spouse_height" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_height.$dirty" ng-messages="lmsShipProposal.spouse_height.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Spouse Height</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Weight(in KG's) <span class="required"> * </span> </label>
                     <input type="text" name="spouse_weight" onkeypress='return restrictAlphabets(event)' placeholder="EnterWeight(in KG's)" class="form-control input-sm" id="spouse_weight" ng-model="spouse.spouse_weight" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.spouse_weight.$dirty" ng-messages="lmsShipProposal.spouse_weight.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Spouse Weight</div>
                     </div>
                  </div>
               </div>
            </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury or accident or advised/consuming medication or undergone/advised/awaiting any surgical procedure ( other than Normal /assisted Delivery or Caesarean section without any complication) or undergone any investigations, in the past 4 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_suffered" ng-model='spouse.spouse_suffered' ng-value="1" value="1" / > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_suffered" ng-model='spouse.spouse_suffered' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have any of the following conditions /diseases -: High blood pressure, diabetes or sugar, any heart related ailment, brain stroke, Paralysis, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits, HIV/AIDS / any other sexually transmitted disease, Ulcer (Stomach / Intestine), Anemia, Leukemia or any other blood/lymphatic system disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_diseases" ng-model='spouse.spouse_diseases' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_diseases" ng-model='spouse.spouse_diseases' ng-value="0" value="0"/> No </label>
                  </div>
    
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have multiple sclerosis, epilepsy, tremors, paralysis, psychiatric/mental illnesses or sleep disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_psychiatric" ng-model='spouse.spouse_psychiatric' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_psychiatric" ng-model='spouse.spouse_psychiatric' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you taken any medication for more than 2 weeks in last 5 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_medication" ng-model='spouse.spouse_medication' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_medication" ng-model='spouse.spouse_medication' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Are you currently suffering from or have ever suffered from Dysfunctional uterine bleeding, Fibroid, Cyst / Fibroadenoma or any other Gynaecological / Breast disorder?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_fibroid" ng-model='spouse.spouse_fibroid' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_fibroid" ng-model='spouse.spouse_fibroid' ng-value="0" value="0" /> No </label>
                  </div>
              
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Has any application for life, Health or critical illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_cyst" ng-model='spouse.spouse_cyst' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_cyst" ng-model='spouse.spouse_cyst' ng-value="0" value="0" /> No </label>
                  </div>
             
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Undertaken any lab/blood tests, imaging tests viz. scans/MRI in the last 5 years other than routine health check-up or pre-employment check-up?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_bltest" ng-model='spouse.spouse_bltest' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_bltest" ng-model='spouse.spouse_bltest' ng-value="0" value="0" /> No </label>
                  </div>
                
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Any complaint of diabetes, hypertension or any complication during current or earlier pregnancy?
                     </label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_diabetes" ng-model='spouse.spouse_diabetes' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_diabetes" ng-model='spouse.spouse_diabetes' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

          <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Is the insured person pregnant? If yes, please mention the expected date of delivery</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_pregnant" ng-model='spouse.spouse_pregnant' class="spouse_pregnant" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_pregnant" ng-model='spouse.spouse_pregnant' class="spouse_pregnant" ng-value="0" value="0" /> No </label>
                  </div>

               </div>
            </div>
         </div>
         

         <div class="row maincontf" id="spouse_delivery_date_div" style="display: none;">
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-3"><label>Delivery Date</label></div>
                  <div class="col-md-4"><input type="text" name="spouse_delivery_date" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy"  ng-model='spouse.spouse_delivery_date' id="spouse_delivery_date" ></div>   
               </div>
            </div>
         </div>                           
                


          <div class="row maincontf">  
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Have any person proposed to be insured received any advice/ treatment / consultation for any medical condition in the last 4 years? If yes, please specify</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_advice" ng-model='spouse.spouse_advice' class="spouse_treatment" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_advice" ng-model='spouse.spouse_advice' class="spouse_treatment" ng-value="0" value="0"/> No </label>
                  </div>
                
               </div>
            </div>
         </div>







       
         <div class="row maincontf" id="spouse_treatment_div" style="display: none;">
            <div class="col-md-12" style="border: 1px #000 solid;">
               <div class="form-group col-md-12" > 
                  <div class="col-md-3"><label>Name of Existing Diseases/Surgery</label></div>
                  <div class="col-md-2"><label>Diagnosis Date</label></div>
                  <div class="col-md-2"><label>Date of last consultation</label></div>
                  <div class="col-md-2"><label>Treatment Type</label></div>
                  <div class="col-md-3"><label>Doctor/Hospital Name & Phone No.</label></div>
               </div>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="spouse_surgery_name1" ng-model="spouse.spouse_surgery_name1" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="spouse_diagnosis_date1" ng-model="spouse.spouse_diagnosis_date1" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="spouse_diagnosis_date1"></div>
                  <div class="col-md-2"><input type="text" name="spouse_date_consultation1" ng-model="spouse.spouse_date_consultation1" class="form-control input-sm custom-date-dob dob_higher" id="spouse_date_consultation1" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="spouse_treatment_type1" name="spouse_treatment_type1" class="form-control input-sm" ng-model="spouse.spouse_treatment_type1" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="spouse_hospital_name1" ng-model="spouse.spouse_hospital_name1" class="form-control input-sm" ></div>
               </div>
               <br/>
             
               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="spouse_surgery_name2" ng-model="spouse.spouse_surgery_name2" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="spouse_diagnosis_date2" ng-model="spouse.spouse_diagnosis_date2" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="spouse_diagnosis_date2"></div>
                  <div class="col-md-2"><input type="text" name="spouse_date_consultation2" ng-model="spouse.spouse_date_consultation2" class="form-control input-sm custom-date-dob dob_higher" id="spouse_date_consultation2" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="spouse_treatment_type2" name="spouse_treatment_type2" class="form-control input-sm" ng-model="spouse.spouse_treatment_type2" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="spouse_hospital_name2" ng-model="spouse.spouse_hospital_name2" class="form-control input-sm" ></div>
               </div>

               <br/>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="spouse_surgery_name3" ng-model="spouse.spouse_surgery_name3" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="spouse_diagnosis_date3" ng-model="spouse.spouse_diagnosis_date3" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="spouse_diagnosis_date3"></div>
                  <div class="col-md-2"><input type="text" name="spouse_date_consultation3" ng-model="spouse.spouse_date_consultation3" class="form-control input-sm custom-date-dob dob_higher" id="spouse_date_consultation3" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="spouse_treatment_type3" name="spouse_treatment_type3" class="form-control input-sm" ng-model="spouse.spouse_treatment_type3" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="spouse_hospital_name3" ng-model="spouse.spouse_hospital_name3" class="form-control input-sm" ></div>
               </div>
               <br/>               


            </div>
         </div> 





       <div class="row maincontf">
         <div class="col-md-12">
            <div class="form-group">
               <div class="col-md-10"><label>Does any person proposed to be Insured smoke or consume Gutka/ Pan Masala /alcohol? If yes, please indicate the name and quantity per week</label>
               </div>
               <div class="col-md-2">
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="spouse_gutka" ng-model='spouse.spouse_gutka' class="spouse_gutka" ng-value="1" value="1" /> Yes </label>
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="spouse_gutka" ng-model='spouse.spouse_gutka' class="spouse_gutka" ng-value="0" value="0" /> No </label>
               </div>
             
            </div>
         </div>
      </div>


      <div class="row maincontf" id="spouse_gutka_div" style="display: none;">
         <div class="col-md-12">
            <div class="form-group"> 
               <div class="col-md-4"><label>Smoke (No. of sticks)</label></div>
               <div class="col-md-4"><input type="text" name="spouse_smoke" ng-model='spouse.spouse_smoke' id="spouses_moke" ></div>   
            </div>
         </div>
         <br><br>
         <div class="col-md-12">
            <div class="form-group"> 
               <div class="col-md-4"><label>Alcohol (No of pegs / Beer Bottles - Each Peg is 30 ml)</label></div>
               <div class="col-md-4"><input type="text" name="spouse_alcohol" ng-model='spouse.spouse_alcohol' id="spouse_alcohol" ></div>   
            </div>
         </div>
         <br><br>
         <div class="col-md-12">
            <div class="form-group"> 
               <div class="col-md-4"><label>Pan Masala (No of Pouches)</label></div>
               <div class="col-md-4"><input type="text" name="spouse_pan_masala" ng-model='spouse.spouse_pan_masala' id="spouse_pan_masala"></div>   
            </div>
         </div>
         <br><br>
         <div class="col-md-12">
            <div class="form-group"> 
               <div class="col-md-4"><label>Others</label></div>
               <div class="col-md-4"><input type="text" name="spouse_others" ng-model='spouse.spouse_others' id="spouse_others"></div>   
            </div>
         </div>
      </div>   


</br>      
</div>




         <div id="child1-propsal-details" ng-if = "noofchildrens=='1' || noofchildrens=='2' || noofchildrens=='3' " >
         
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">Details of your Child 1 </span>
               </div>
            </div>

          <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Salutation <spam class="required">*</spam> </label>
                     <input list="child1Spouse" id="child1_salut" placeholder="Salutation" name="child1_salut" class="form-control input-sm" ng-model="child1.child1_salut" required>
                     <datalist id="child1Spouse">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                      <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child1_salut.$dirty" ng-messages="lmsShipProposal.child1_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 1 Salutation</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 First Name <spam class="required">*</spam> </label>  
                     <input type="text" name="child1_fname"  placeholder="First Name"  class="form-control input-sm" id="child1_fname" ng-model="child1.child1_fname" required /> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child1_fname.$dirty" ng-messages="lmsShipProposal.child1_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 1 First Name</div>
                     </div>        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="child1_lname"  placeholder="Last Name"   class="form-control input-sm" id="child1_lname"  ng-model="child1.child1_lname" required/> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child1_lname.$dirty" ng-messages="lmsShipProposal.child1_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 1 Last Name</div>
                     </div>
                  </div>
               </div>
            </div>   

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 DOB  <span class="required"> * </span> </label>
                     <input ng-init="child1Age()" type="text" id="child1_dob" name="child1_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="child1.child1_dob" required data-date-format="dd-mm-yyyy">
                     <div ng-if="lmsShipProposal.$submitted " ng-messages="lmsShipProposal.child1_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 1 DOB</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Gender <span class="required"> * </span> </label>
                     <select  class="form-control input-sm" name="child1_gender" id="child1_gender" ng-model="child1.child1_gender" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                      <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child1_gender.$dirty" ng-messages="lmsShipProposal.child1_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 1 Gender</div>
                     </div>
                  </div>
               </div>               

               <!-- <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Occupation </label>
                     <select id="child1_occupation" name="child1_occupation" class="form-control input-sm" ng-model="child1.child1_occupation" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="Media/Sports/Armed forces">Media/Sports/Armed forces</option>
                        <option value="Government employees">Government employees</option>
                        <option value="Professionals (CA, Doctor, lawyer)">Professionals (CA, Doctor, lawyer)</option>
                        <option value="Private (Sales and marketing)">Private (Sales and marketing)</option>
                        <option value="Private (other than Sales / marketing)">Private (other than Sales / marketing)</option>
                        <option value="Self employed / self business">Self employed / self business</option>
                        <option value="Others">Others</option>
                     </select>
                  </div>
               </div> -->
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Height(in CM's) <span class="required"> * </span> </label>
                     <input type="text" name="child1_height" onkeypress='return restrictAlphabets(event)' placeholder="Enter Height(in CM's)" class="form-control input-sm" id="child1_height" ng-model="child1.child1_height" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child1_height.$dirty" ng-messages="lmsShipProposal.child1_height.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 1 Height</div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row maincontf">
               
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Weight(in KG's) <span class="required"> * </span> </label>
                     <input type="text" name="child1_weight" onkeypress='return restrictAlphabets(event)' placeholder="EnterWeight(in KG's)" class="form-control input-sm" id="child1_weight" ng-model="child1.child1_weight" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child1_weight.$dirty" ng-messages="lmsShipProposal.child1_weight.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 1 Weight</div>
                     </div>
                  </div>
               </div>
            </div>
                    

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury or accident or advised/consuming medication or undergone/advised/awaiting any surgical procedure ( other than Normal /assisted Delivery or Caesarean section without any complication) or undergone any investigations, in the past 4 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_suffered" ng-model='child1.child1_suffered' ng-value="1" value="1" / > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_suffered" ng-model='child1.child1_suffered' ng-value="0" value="0" required/> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have any of the following conditions /diseases -: High blood pressure, diabetes or sugar, any heart related ailment, brain stroke, Paralysis, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits, HIV/AIDS / any other sexually transmitted disease, Ulcer (Stomach / Intestine), Anemia, Leukemia or any other blood/lymphatic system disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_diseases" ng-model='child1.child1_diseases' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_diseases" ng-model='child1.child1_diseases' ng-value="0" value="0"/> No </label>
                  </div>
    
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have multiple sclerosis, epilepsy, tremors, paralysis, psychiatric/mental illnesses or sleep disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_psychiatric" ng-model='child1.child1_psychiatric' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_psychiatric" ng-model='child1.child1_psychiatric' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you taken any medication for more than 2 weeks in last 5 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_medication" ng-model='child1.child1_medication' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_medication" ng-model='child1.child1_medication' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

<!--          <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Are you currently suffering from or have ever suffered from Dysfunctional uterine bleeding, Fibroid, Cyst / Fibroadenoma or any other Gynaecological / Breast disorder?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_fibroid" ng-model='child1.child1_fibroid' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_fibroid" ng-model='child1.child1_fibroid' ng-value="0" value="0" /> No </label>
                  </div>
              
               </div>
            </div>
         </div>
 -->
         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Has any application for life, Health or critical illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_cyst" ng-model='child1.child1_cyst' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_cyst" ng-model='child1.child1_cyst' ng-value="0" value="0" /> No </label>
                  </div>
             
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Undertaken any lab/blood tests, imaging tests viz. scans/MRI in the last 5 years other than routine health check-up or pre-employment check-up?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_bltest" ng-model='child1.child1_bltest' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_bltest" ng-model='child1.child1_bltest' ng-value="0" value="0" /> No </label>
                  </div>
                
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Any complaint of diabetes, hypertension or any complication during current or earlier pregnancy?
                     </label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_diabetes" ng-model='child1.child1_diabetes' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_diabetes" ng-model='child1.child1_diabetes' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

<!--           <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Is the insured person pregnant? If yes, please mention the expected date of delivery</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_pregnant" ng-model='child1.child1_pregnant' class="child1_pregnant" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_pregnant" ng-model='child1.child1_pregnant' class="child1_pregnant" ng-value="0" value="0" /> No </label>
                  </div>

               </div>
            </div>
         </div> -->


         <div class="row maincontf" id="child1_delivery_date_div" style="display: none;">
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-3"><label>Delivery Date</label></div>
                  <div class="col-md-4"><input type="text" name="child1_delivery_date" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy"  ng-model='child1.child1_delivery_date' id="child1_delivery_date" ></div>   
               </div>
            </div>
         </div>  



          <div class="row maincontf">  
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Have any person proposed to be insured received any advice/ treatment / consultation for any medical condition in the last 4 years? If yes, please specify</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_advice" ng-model='child1.child1_advice' class="child1_treatment" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_advice" ng-model='child1.child1_advice' class="child1_treatment" ng-value="0" value="0"/> No </label>
                  </div>
                
               </div>
            </div>
         </div>






         <div class="row maincontf" id="child1_treatment_div" style="display: none;">
            <div class="col-md-12" style="border: 1px #000 solid;">
               <div class="form-group col-md-12" > 
                  <div class="col-md-3"><label>Name of Existing Diseases/Surgery</label></div>
                  <div class="col-md-2"><label>Diagnosis Date</label></div>
                  <div class="col-md-2"><label>Date of last consultation</label></div>
                  <div class="col-md-2"><label>Treatment Type</label></div>
                  <div class="col-md-3"><label>Doctor/Hospital Name & Phone No.</label></div>
               </div>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child1_surgery_name1" ng-model="child1.child1_surgery_name1" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child1_diagnosis_date1" ng-model="child1.child1_diagnosis_date1" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child1_diagnosis_date1"></div>
                  <div class="col-md-2"><input type="text" name="child1_date_consultation1" ng-model="child1.child1_date_consultation1" class="form-control input-sm custom-date-dob dob_higher" id="child1_date_consultation1" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child1_treatment_type1" name="child1_treatment_type1" class="form-control input-sm" ng-model="child1.child1_treatment_type1" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="child1_hospital_name1" ng-model="child1.child1_hospital_name1" class="form-control input-sm" ></div>
               </div>
               <br/>
             
               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child1_surgery_name2" ng-model="child1.child1_surgery_name2" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child1_diagnosis_date2" ng-model="child1.child1_diagnosis_date2" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child1_diagnosis_date2"></div>
                  <div class="col-md-2"><input type="text" name="child1_date_consultation2" ng-model="child1.child1_date_consultation2" class="form-control input-sm custom-date-dob dob_higher" id="child1_date_consultation2" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child1_treatment_type2" name="child1_treatment_type2" class="form-control input-sm" ng-model="child1.child1_treatment_type2" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="child1_hospital_name2" ng-model="child1.child1_hospital_name2" class="form-control input-sm" ></div>
               </div>

               <br/>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child1_surgery_name3" ng-model="child1.child1_surgery_name3" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child1_diagnosis_date3" ng-model="child1.child1_diagnosis_date3" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child1_diagnosis_date3"></div>
                  <div class="col-md-2"><input type="text" name="child1_date_consultation3" ng-model="child1.child1_date_consultation3" class="form-control input-sm custom-date-dob dob_higher" id="child1_date_consultation3" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child1_treatment_type3" name="child1_treatment_type3" class="form-control input-sm" ng-model="child1.child1_treatment_type3" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="child1_hospital_name3" ng-model="child1.child1_hospital_name3" class="form-control input-sm" ></div>
               </div>
               <br/>               


            </div>
         </div>

      <div class="row maincontf">
         <div class="col-md-12">
            <div class="form-group">
               <div class="col-md-10"><label>Does any person proposed to be Insured smoke or consume Gutka/ Pan Masala /alcohol? If yes, please indicate the name and quantity per week</label>
               </div>
               <div class="col-md-2">
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="child1_gutka" ng-model='child1.child1_gutka' class="child1_gutka" ng-value="1" value="1" /> Yes </label>
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="child1_gutka" ng-model='child1.child1_gutka' class="child1_gutka" ng-value="0" value="0" /> No </label>
               </div>
             
            </div>
         </div>
      </div>




               <div class="row maincontf" id="child1_gutka_div" style="display: none;">
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Smoke (No. of sticks)</label></div>
                        <div class="col-md-4"><input type="text" name="child1_smoke" ng-model='child1.child1_smoke' id="spouse_smoke" ></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Alcohol (No of pegs / Beer Bottles - Each Peg is 30 ml)</label></div>
                        <div class="col-md-4"><input type="text" name="child1_alcohol" ng-model='child1.child1_alcohol' id="child1_alcohol" ></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Pan Masala (No of Pouches)</label></div>
                        <div class="col-md-4"><input type="text" name="child1_pan_masala" ng-model='child1.child1_pan_masala' id="child1_pan_masala"></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Others</label></div>
                        <div class="col-md-4"><input type="text" name="child1_others" ng-model='child1.child1_others' id="child1_others"></div>   
                     </div>
                  </div>
               </div>       
       



<br>
   </div> <!-- child1-propsal-detail ends here --> 



   <div id="child2-propsal-details" ng-if="noofchildrens== '2' || noofchildrens== '3' ">
   <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">Details of your Child 2 </span>
               </div>
            </div>

          <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Salutation <span class="required"> * </span> </label>
                     <input list="child2Spouse" id="child2_salut" placeholder="Salutation" name="child2_salut" class="form-control input-sm" ng-model="child2.child2_salut" required>
                     <datalist id="child2Spouse">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child2_salut.$dirty" ng-messages="lmsShipProposal.child2_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 2 Salutation</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 First Name <span class="required"> * </span> </label>  
                     <input type="text" name="child2_fname"  placeholder="First Name"  class="form-control input-sm" id="child2_fname" ng-model="child2.child2_fname" required /> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child2_fname.$dirty" ng-messages="lmsShipProposal.child2_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 2 First Name</div>
                     </div>        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="child2_lname"  placeholder="Last Name"   class="form-control input-sm" id="child2_lname"  ng-model="child2.child2_lname" required /> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child2_lname.$dirty" ng-messages="lmsShipProposal.child2_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 2 Last Name</div>
                     </div>
                  </div>
               </div>
            </div>   

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 DOB <span class="required"> * </span> </label>
                     <input ng-init="child2Age()" type="text" id="child2_dob" name="child2_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="child2.child2_dob" required data-date-format="dd-mm-yyyy">
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child2_dob.$dirty" ng-messages="lmsShipProposal.child2_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 2 DOB</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Gender <span class="required"> * </span> </label>
                     <select  class="form-control input-sm" name="child2_gender" id="child2_gender" ng-model="child2.child2_gender" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                      <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child2_gender.$dirty" ng-messages="lmsShipProposal.child2_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 2 Gender</div>
                     </div>
                  </div>
               </div>               

               <!-- <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Occupation </label>
                     <select id="child2_occupation" name="child2_occupation" class="form-control input-sm" ng-model="child2.child2_occupation" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="Media/Sports/Armed forces">Media/Sports/Armed forces</option>
                        <option value="Government employees">Government employees</option>
                        <option value="Professionals (CA, Doctor, lawyer)">Professionals (CA, Doctor, lawyer)</option>
                        <option value="Private (Sales and marketing)">Private (Sales and marketing)</option>
                        <option value="Private (other than Sales / marketing)">Private (other than Sales / marketing)</option>
                        <option value="Self employed / self business">Self employed / self business</option>
                        <option value="Others">Others</option>
                     </select>
                  </div>
               </div> -->
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Height(in CM's) <span class="required"> * </span> </label>
                     <input type="text" name="child2_height" onkeypress='return restrictAlphabets(event)' placeholder="Enter Height(in CM's)" class="form-control input-sm" id="child2_height" ng-model="child2.child2_height" required/>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child2_height.$dirty" ng-messages="lmsShipProposal.child2_height.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 2 Height</div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row maincontf">
               
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Weight(in KG's) <span class="required"> * </span> </label>
                     <input type="text" name="child2_weight" onkeypress='return restrictAlphabets(event)'  placeholder="EnterWeight(in KG's)" class="form-control input-sm" id="child2_weight" ng-model="child2.child2_weight" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child2_weight.$dirty" ng-messages="lmsShipProposal.child2_weight.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 2 Weight</div>
                     </div>
                  </div>
               </div>
            </div>
                    

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury or accident or advised/consuming medication or undergone/advised/awaiting any surgical procedure ( other than Normal /assisted Delivery or Caesarean section without any complication) or undergone any investigations, in the past 4 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_suffered" ng-model='child2.child2_suffered' ng-value="1" value="1" / > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_suffered" ng-model='child2.child2_suffered' ng-value="0" value="0" required/> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have any of the following conditions /diseases -: High blood pressure, diabetes or sugar, any heart related ailment, brain stroke, Paralysis, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits, HIV/AIDS / any other sexually transmitted disease, Ulcer (Stomach / Intestine), Anemia, Leukemia or any other blood/lymphatic system disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_diseases" ng-model='child2.child2_diseases' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_diseases" ng-model='child2.child2_diseases' ng-value="0" value="0"/> No </label>
                  </div>
    
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have multiple sclerosis, epilepsy, tremors, paralysis, psychiatric/mental illnesses or sleep disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_psychiatric" ng-model='child2.child2_psychiatric' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_psychiatric" ng-model='child2.child2_psychiatric' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you taken any medication for more than 2 weeks in last 5 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_medication" ng-model='child2.child2_medication' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_medication" ng-model='child2.child2_medication' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

<!--          <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Are you currently suffering from or have ever suffered from Dysfunctional uterine bleeding, Fibroid, Cyst / Fibroadenoma or any other Gynaecological / Breast disorder?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_fibroid" ng-model='child2.child2_fibroid' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_fibroid" ng-model='child2.child2_fibroid' ng-value="0" value="0" /> No </label>
                  </div>
              
               </div>
            </div>
         </div> -->

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Has any application for life, Health or critical illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_cyst" ng-model='child2.child2_cyst' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_cyst" ng-model='child2.child2_cyst' ng-value="0" value="0" /> No </label>
                  </div>
             
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Undertaken any lab/blood tests, imaging tests viz. scans/MRI in the last 5 years other than routine health check-up or pre-employment check-up?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_bltest" ng-model='child2.child2_bltest' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_bltest" ng-model='child2.child2_bltest' ng-value="0" value="0" /> No </label>
                  </div>
                
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Any complaint of diabetes, hypertension or any complication during current or earlier pregnancy?
                     </label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_diabetes" ng-model='child2.child2_diabetes' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_diabetes" ng-model='child2.child2_diabetes' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

<!--          <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Is the insured person pregnant? If yes, please mention the expected date of delivery</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_pregnant" ng-model='child2.child2_pregnant' class="child2_pregnant" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_pregnant" ng-model='child2.child2_pregnant' class="child2_pregnant" ng-value="0" value="0" /> No </label>
                  </div>

               </div>
            </div>
         </div> -->


         <div class="row maincontf" id="child2_delivery_date_div" style="display: none;">
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-3"><label>Delivery Date</label></div>
                  <div class="col-md-4"><input type="text" name="child2_delivery_date" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy"  ng-model='child2.child2_delivery_date' id="child2_delivery_date" ></div>   
               </div>
            </div>
         </div>  



          <div class="row maincontf">  
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Have any person proposed to be insured received any advice/ treatment / consultation for any medical condition in the last 4 years? If yes, please specify</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_advice" ng-model='child2.child2_advice' class="child2_treatment" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_advice" ng-model='child2.child2_advice' class="child2_treatment" ng-value="0" value="0"/> No </label>
                  </div>
                
               </div>
            </div>
         </div>


         <div class="row maincontf" id="child2_treatment_div" style="display: none;">
            <div class="col-md-12" style="border: 1px #000 solid;">
               <div class="form-group col-md-12" > 
                  <div class="col-md-3"><label>Name of Existing Diseases/Surgery</label></div>
                  <div class="col-md-2"><label>Diagnosis Date</label></div>
                  <div class="col-md-2"><label>Date of last consultation</label></div>
                  <div class="col-md-2"><label>Treatment Type</label></div>
                  <div class="col-md-3"><label>Doctor/Hospital Name & Phone No.</label></div>
               </div>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child2_surgery_name1" ng-model="child2.child2_surgery_name1" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child2_diagnosis_date1" ng-model="child2.child2_diagnosis_date1" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child2_diagnosis_date1"></div>
                  <div class="col-md-2"><input type="text" name="child2_date_consultation1" ng-model="child2.child2_date_consultation1" class="form-control input-sm custom-date-dob dob_higher" id="child2_date_consultation1" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child2_treatment_type1" name="child2_treatment_type1" class="form-control input-sm" ng-model="child2.child2_treatment_type1" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="hospital_name1" ng-model="hospital_name1" class="form-control input-sm" ></div>
               </div>
               <br/>
             
               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child2_surgery_name2" ng-model="child2.child2_surgery_name2" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child2_diagnosis_date2" ng-model="child2.child2_diagnosis_date2" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child2_diagnosis_date2"></div>
                  <div class="col-md-2"><input type="text" name="child2_date_consultation2" ng-model="child2.child2_date_consultation2" class="form-control input-sm custom-date-dob dob_higher" id="child2_date_consultation2" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child2_treatment_type2" name="child2_treatment_type2" class="form-control input-sm" ng-model="child2.child2_treatment_type2" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="child2_hospital_name2" ng-model="child2.child2_hospital_name2" class="form-control input-sm" ></div>
               </div>

               <br/>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child2_surgery_name3" ng-model="child2.child2_surgery_name3" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child2_diagnosis_date3" ng-model="child2.child2_diagnosis_date3" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child2_diagnosis_date3"></div>
                  <div class="col-md-2"><input type="text" name="child2_date_consultation3" ng-model="child2.child2_date_consultation3" class="form-control input-sm custom-date-dob dob_higher" id="child2_date_consultation3" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child2_treatment_type3" name="child2_treatment_type3" class="form-control input-sm" ng-model="child2.child2_treatment_type3" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="child2_hospital_name3" ng-model="child2.child2_hospital_name3" class="form-control input-sm" ></div>
               </div>
               <br/>               


            </div>
         </div> 

       


       <div class="row maincontf">
         <div class="col-md-12">
            <div class="form-group">
               <div class="col-md-10"><label>Does any person proposed to be Insured smoke or consume Gutka/ Pan Masala /alcohol? If yes, please indicate the name and quantity per week</label>
               </div>
               <div class="col-md-2">
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="child2_gutka" ng-model='child2.child2_gutka' class="child2_gutka" ng-value="1" value="1" /> Yes </label>
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="child2_gutka" ng-model='child2.child2_gutka' class="child2_gutka" ng-value="0" value="0" /> No </label>
               </div>
             
            </div>
         </div>
      </div>


       
               <div class="row maincontf" id="child2_gutka_div" style="display: none;">
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Smoke (No. of sticks)</label></div>
                        <div class="col-md-4"><input type="text" name="child2_smoke" ng-model='child2.child2_smoke' id="child2_smoke" ></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Alcohol (No of pegs / Beer Bottles - Each Peg is 30 ml)</label></div>
                        <div class="col-md-4"><input type="text" name="child2_alcohol" ng-model='child2.child2_alcohol' id="child2_alcohol" ></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Pan Masala (No of Pouches)</label></div>
                        <div class="col-md-4"><input type="text" name="child2_pan_masala" ng-model='child2.child2_pan_masala' id="child2_pan_masala"></div>   
                     </div>
                  </div>
                  <br><br>
                  <div class="col-md-12">
                     <div class="form-group"> 
                        <div class="col-md-4"><label>Others</label></div>
                        <div class="col-md-4"><input type="text" name="child2_others" ng-model='child2.child2_others' id="child2_others"></div>   
                     </div>
                  </div>
               </div> 


  <br>
   </div><!-- child2-propsal-detail ends here --> 
 

   <div id="child3-propsal-details" ng-if="noofchildrens== '3'">
     
   <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">Details of your Child 3 </span>
               </div>
            </div>

          <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Salutation <span class="required"> * </span> </label>
                     <input list="child3Spouse" id="child3_salut" placeholder="Salutation" name="child3_salut" class="form-control input-sm" ng-model="child3.child3_salut" required>
                     <datalist id="child3Spouse">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child3_salut.$dirty" ng-messages="lmsShipProposal.child3_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 3 Salutation</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 First Name <span class="required"> * </span> </label>  
                     <input type="text" name="child3_fname"  placeholder="First Name"  class="form-control input-sm" id="child3_fname" ng-model="child3.child3_fname" required /> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child3_fname.$dirty" ng-messages="lmsShipProposal.child3_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 3 First Name</div>
                     </div>       
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="child3_lname"  placeholder="Last Name"   class="form-control input-sm" id="child3_lname"  ng-model="child3.child3_lname" required/> 
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child3_lname.$dirty" ng-messages="lmsShipProposal.child3_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 3 Last Name</div>
                     </div>
                  </div>
               </div>
            </div>   

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 DOB <span class="required"> * </span> </label>
                     <input ng-init="child3Age()" type="text" id="child3_dob" name="child3_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="child3.child3_dob" required data-date-format="dd-mm-yyyy">
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child3_dob.$dirty" ng-messages="lmsShipProposal.child3_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 3 DOB</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Gender <span class="required"> * </span> </label>
                     <select  class="form-control input-sm" name="child3_gender" id="child3_gender" ng-model="child3.child3_gender" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child3_gender.$dirty" ng-messages="lmsShipProposal.child3_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 3 Gender</div>
                     </div>
                  </div>
               </div>               

               <!-- <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Occupation </label>
                     <select id="child3_occupation" name="child3_occupation" class="form-control input-sm" ng-model="child3.child3_occupation" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="Media/Sports/Armed forces">Media/Sports/Armed forces</option>
                        <option value="Government employees">Government employees</option>
                        <option value="Professionals (CA, Doctor, lawyer)">Professionals (CA, Doctor, lawyer)</option>
                        <option value="Private (Sales and marketing)">Private (Sales and marketing)</option>
                        <option value="Private (other than Sales / marketing)">Private (other than Sales / marketing)</option>
                        <option value="Self employed / self business">Self employed / self business</option>
                        <option value="Others">Others</option>
                     </select>
                  </div>
               </div> -->
                <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Height(in CM's) <span class="required"> * </span></label>
                     <input type="text" name="child3_height" onkeypress='return restrictAlphabets(event)'  placeholder="Enter Height(in CM's)" class="form-control input-sm" id="child3_height" ng-model="child3.child3_height" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child3_height.$dirty" ng-messages="lmsShipProposal.child3_height.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 3 Height</div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row maincontf">
              
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Weight(in KG's)<span class="required"> * </span> </label>
                     <input type="text" name="child3_weight"  onkeypress='return restrictAlphabets(event)' placeholder="EnterWeight(in KG's)" class="form-control input-sm" id="child3_weight" ng-model="child3.child3_weight" required />
                     <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.child3_weight.$dirty" ng-messages="lmsShipProposal.child3_weight.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Child 3 Weight</div>
                     </div>
                  </div>
               </div>
            </div>
                    

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury or accident or advised/consuming medication or undergone/advised/awaiting any surgical procedure ( other than Normal /assisted Delivery or Caesarean section without any complication) or undergone any investigations, in the past 4 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_suffered" ng-model='child3.child3_suffered' ng-value="1" value="1" / > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_suffered" ng-model='child3.child3_suffered' ng-value="0" value="0" required/> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have any of the following conditions /diseases -: High blood pressure, diabetes or sugar, any heart related ailment, brain stroke, Paralysis, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits, HIV/AIDS / any other sexually transmitted disease, Ulcer (Stomach / Intestine), Anemia, Leukemia or any other blood/lymphatic system disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_diseases" ng-model='child3.child3_diseases' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_diseases" ng-model='child3.child3_diseases' ng-value="0" value="0"/> No </label>
                  </div>
    
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you ever had or has a doctor ever said that you have multiple sclerosis, epilepsy, tremors, paralysis, psychiatric/mental illnesses or sleep disorder</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_psychiatric" ng-model='child3.child3_psychiatric' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_psychiatric" ng-model='child3.child3_psychiatric' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you taken any medication for more than 2 weeks in last 5 years?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_medication" ng-model='child3.child3_medication' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_medication" ng-model='child3.child3_medication' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

<!--          <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Are you currently suffering from or have ever suffered from Dysfunctional uterine bleeding, Fibroid, Cyst / Fibroadenoma or any other Gynaecological / Breast disorder?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_fibroid" ng-model='child3.child3_fibroid' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_fibroid" ng-model='child3.child3_fibroid' ng-value="0" value="0" /> No </label>
                  </div>
              
               </div>
            </div>
         </div> -->

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Has any application for life, Health or critical illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_cyst" ng-model='child3.child3_cyst' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_cyst" ng-model='child3.child3_cyst' ng-value="0" value="0" /> No </label>
                  </div>
             
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Undertaken any lab/blood tests, imaging tests viz. scans/MRI in the last 5 years other than routine health check-up or pre-employment check-up?</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_bltest" ng-model='child3.child3_bltest' ng-value="1" value="1"/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_bltest" ng-model='child3.child3_bltest' ng-value="0" value="0" /> No </label>
                  </div>
                
               </div>
            </div>
         </div>


         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Any complaint of diabetes, hypertension or any complication during current or earlier pregnancy?
                     </label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_diabetes" ng-model='child3.child3_diabetes' ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_diabetes" ng-model='child3.child3_diabetes' ng-value="0" value="0" /> No </label>
                  </div>
               </div>
            </div>
         </div>

<!--           <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Is the insured person pregnant? If yes, please mention the expected date of delivery</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_pregnant" ng-model='child3.child3_pregnant' class="child3_pregnant" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_pregnant" ng-model='child3.child3_pregnant' class="child3_pregnant"  ng-value="0" value="0" /> No </label>
                  </div>

               </div>
            </div>
         </div> -->


         <div class="row maincontf" id="child3_delivery_date_div" style="display: none;">
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-3"><label>Delivery Date</label></div>
                  <div class="col-md-4"><input type="text" name="child3_delivery_date" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy"  ng-model='child3.child3_delivery_date' id="child3_delivery_date" ></div>   
               </div>
            </div>
         </div>  



          <div class="row maincontf">  
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10">
                     <label>Have any person proposed to be insured received any advice/ treatment / consultation for any medical condition in the last 4 years? If yes, please specify</label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_advice" ng-model='child3.child3_advice' class="child3_treatment" ng-value="1" value="1" /> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_advice" ng-model='child3.child3_advice' class="child3_treatment" ng-value="0" value="0"/> No </label>
                  </div>
                
               </div>
            </div>
         </div>



         <div class="row maincontf" id="child3_treatment_div" style="display: none;">
            <div class="col-md-12" style="border: 1px #000 solid;">
               <div class="form-group col-md-12" > 
                  <div class="col-md-3"><label>Name of Existing Diseases/Surgery</label></div>
                  <div class="col-md-2"><label>Diagnosis Date</label></div>
                  <div class="col-md-2"><label>Date of last consultation</label></div>
                  <div class="col-md-2"><label>Treatment Type</label></div>
                  <div class="col-md-3"><label>Doctor/Hospital Name & Phone No.</label></div>
               </div>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child3_surgery_name1" ng-model="child3.child3_surgery_name1" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child3_diagnosis_date1" ng-model="child3.child3_diagnosis_date1" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child3_diagnosis_date1"></div>
                  <div class="col-md-2"><input type="text" name="child3_date_consultation1" ng-model="child3.child3_date_consultation1" class="form-control input-sm custom-date-dob dob_higher" id="child3_date_consultation1" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child3_treatment_type1" name="child3_treatment_type1" class="form-control input-sm" ng-model="child3.child3_treatment_type1" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="hospital_name1" ng-model="hospital_name1" class="form-control input-sm" ></div>
               </div>
               <br/>
             
               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child3_surgery_name2" ng-model="child3.child3_surgery_name2" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child3_diagnosis_date2" ng-model="child3.child3_diagnosis_date2" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child3_diagnosis_date2"></div>
                  <div class="col-md-2"><input type="text" name="child3_date_consultation2" ng-model="child3.child3_date_consultation2" class="form-control input-sm custom-date-dob dob_higher" id="child3_date_consultation2" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child3_treatment_type2" name="child3_treatment_type2" class="form-control input-sm" ng-model="child3.child3_treatment_type2" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="child3_hospital_name2" ng-model="child3.child3_hospital_name2" class="form-control input-sm" ></div>
               </div>

               <br/>

               <div class="form-group col-md-12"> 
                  <div class="col-md-3"><input type="text" name="child3_surgery_name3" ng-model="child3.child3_surgery_name3" class="form-control input-sm" ></div>
                  <div class="col-md-2"><input type="text" name="child3_diagnosis_date3" ng-model="child3.child3_diagnosis_date3" class="form-control input-sm custom-date-dob dob_higher" data-date-format="dd-mm-yyyy" id="child3_diagnosis_date3"></div>
                  <div class="col-md-2"><input type="text" name="child3_date_consultation3" ng-model="child3.child3_date_consultation3" class="form-control input-sm custom-date-dob dob_higher" id="child3_date_consultation3" data-date-format="dd-mm-yyyy" ></div>
                  <div class="col-md-2">
                     <select id="child3_treatment_type3" name="child3_treatment_type3" class="form-control input-sm" ng-model="child3.child3_treatment_type3" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="In-patient">In Patient</option>
                        <option value="Out-patient">Out Patient</option>
                     </select>
                  </div>
                  <div class="col-md-3"><input type="text" name="child3_hospital_name3" ng-model="child3.child3_hospital_name3" class="form-control input-sm" ></div>
               </div>
               <br/>               


            </div>
         </div> 


       <div class="row maincontf">
         <div class="col-md-12">
            <div class="form-group">
               <div class="col-md-10"><label>Does any person proposed to be Insured smoke or consume Gutka/ Pan Masala /alcohol? If yes, please indicate the name and quantity per week</label>
               </div>
               <div class="col-md-2">
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="child3_gutka" ng-model='child3.child3_gutka' class="child3_gutka" ng-value="1" value="1" /> Yes </label>
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" name="child3_gutka" ng-model='child3.child3_gutka' class="child3_gutka" ng-value="0" value="0" /> No </label>
               </div>
             
            </div>
         </div>
      </div>

         <div class="row maincontf" id="child3_gutka_div" style="display: none;">
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-4"><label>Smoke (No. of sticks)</label></div>
                  <div class="col-md-4"><input type="text" name="child3_smoke" ng-model='child3.child3_smoke' id="child3_smoke" ></div>   
               </div>
            </div>
            <br><br>
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-4"><label>Alcohol (No of pegs / Beer Bottles - Each Peg is 30 ml)</label></div>
                  <div class="col-md-4"><input type="text" name="child3_alcohol" ng-model='child3.child3_alcohol' id="child3_alcohol" ></div>   
               </div>
            </div>
            <br><br>
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-4"><label>Pan Masala (No of Pouches)</label></div>
                  <div class="col-md-4"><input type="text" name="child3_pan_masala" ng-model='child3.child3_pan_masala' id="child3_pan_masala"></div>   
               </div>
            </div>
            <br><br>
            <div class="col-md-12">
               <div class="form-group"> 
                  <div class="col-md-4"><label>Others</label></div>
                  <div class="col-md-4"><input type="text" name="child3_others" ng-model='child3.child3_others' id="child3_others"></div>   
               </div>
            </div>
         </div>       
       




   </div> <!-- child3-propsal-detail ends here --> 
<h4 class="propsal-seperator">Family Doctor's Details,if any</h4>
        <hr> 
         
         <div class="row maincontf">
            <div class="col-md-4">
               <div class="form-group">
                  <label>  Name </label>
                  <input type="text" name="sship_pro_doc_name" placeholder="Enter doctor Name" class="form-control input-sm" id="sship_pro_doc_name" ng-model="sship_pro_doc_name">
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_name.$dirty" ng-messages="lmsShipProposal.sship_pro_doc_name.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Doctor Name</div>
                  </div> -->
               </div>
            </div>

            <div class="col-md-4">
               <div class="form-group">
                  <label> Qualification </label>
                  <input type="text" name="sship_pro_doc_qualifi" placeholder="Enter Qualification" class="form-control input-sm" id="sship_pro_doc_qualifi" ng-model="sship_pro_doc_qualifi">
                  <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_qualifi.$dirty" ng-messages="lmsShipProposal.sship_pro_doc_qualifi.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Qualificationk</div>
                  </div> -->
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label> Address </label>
                  <input type="text" name="sship_pro_doc_addr" placeholder="Enter Address" class="form-control input-sm" id="sship_pro_doc_addr" ng-model="sship_pro_doc_addr">
                  <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_addr.$dirty" ng-messages="lmsShipProposal.sship_pro_doc_addr.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Address</div>
                  </div> -->
               </div>

            </div>
         </div>
         <div class="row maincontf">
            <div class="col-md-4">
               <div class="form-group">
                  <label>Mobile Number </label>
             <input type="text" id="sship_pro_doc_mobile" name="sship_pro_doc_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="sship_pro_doc_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);">
                  <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsShipProposal.sship_pro_doc_mobile.$error" role="alert">
                 <div ng-message="required" class="required">Please Enter Mobile Number</div>
             </div> -->
               </div>
            </div>

            <div class="col-md-4">
               <div class="form-group">
                  <label>Clinic/Hospital Number </label>
             <input type="text" id="sship_pro_hos_num" name="sship_pro_hos_num" class="form-control input-sm" placeholder="Clinic / Hospital Number" ng-model="sship_pro_hos_num" MaxLength="10" onkeyup="mobile_validate(this.value);">
                  <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_hos_num.$dirty" class="required" id="mobilewar" ng-messages="lmsShipProposal.sship_pro_hos_num.$error" role="alert">
                 <div ng-message="required" class="required">Please Enter Clinic/Hospital Number</div>
             </div> -->
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
                  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_nname.$dirty" ng-messages="lmsShipProposal.sship_pro_nname.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label>Relationship With Primary insured
                  <span class="required"> * </span></label>
                  <select id="sship_pro_nomie_relation" name="sship_pro_nomie_relation" class="form-control input-sm" ng-model="sship_pro_nomie_relation"  ng-change="ship_tax_primary_relation=sship_pro_nomie_relation" required>
                     <option value="" disabled selected>Select your option</option>
                     <option value="Father">Father</option>
                     <option value="Mother">Mother</option>
                     <option value="Brother">Brother</option>
                     <option value="Sister">Sister</option>
                     <option value="Spouse">Spouse</option>
                     <option value="Son">Son</option>
                     <option value="Daughter">Daughter</option>
                   </select>
                  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_nomie_relation.$dirty" ng-messages="lmsShipProposal.sship_pro_nomie_relation.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Relationship</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="form-group">
                  <label> Name Of Appointee </label> <span class="required">*</span>
                  <input type="text" name="sship_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="sship_pro_nameofappoint" ng-model="sship_pro_nameofappoint" >
                   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_nameofappoint.$dirty" ng-messages="lmsShipProposal.sship_pro_nameofappoint.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Name of appointee</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row maincontf">  
           <div class="col-md-4">
               <div class="form-group">
                  <label>Appointee Relationship with nominee</label> <span class="required">*</span>
                  <select id="sship_pro_appoint_relation" name="sship_pro_appoint_relation" class="form-control input-sm" ng-model="sship_pro_appoint_relation" >
                     <option value="" disabled selected>Select your option</option>
                     <option value="Father">Father</option>
                     <option value="Mother">Mother</option>
                     <option value="Brother">Brother</option>
                     <option value="Sister">Sister</option>
                     <option value="Spouse">Spouse</option>
                     <option value="Son">Son</option>
                     <option value="Daughter">Daughter</option>
                   </select>
                  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_appoint_relation.$dirty" ng-messages="lmsShipProposal.sship_pro_appoint_relation.$error" role="alert">
                     <div ng-message="required" class="required">Please Enter Relationship of appointee</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_nomie_age" maxlength="2" placeholder="Enter Nominee Age" class="form-control input-sm age-validate" id="sship_pro_nomie_age" ng-model="sship_pro_nomie_age" required/>
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_nomie_age.$dirty" ng-messages="lmsShipProposal.sship_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>

         </div>


      <h4 class="propsal-seperator">Information for Issuance of Tax Statement (Section 80D of Income Tax Act 1961)</h4>
      <hr> 
      <div class="row maincontf">
            <div class="form-group">
               <div class="col-md-6">
                     <label>Are you the primary insured? <span class="required"> * </span></label>
               </div>
              
               <div class="col-md-2">
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" ng-change="autoPopulate()" id="ship_tax_primary_insured_yes" name="ship_tax_primary_insured" ng-model='ship_tax_primary_insured' class="ship_tax_primary_insured" ng-value="1" value="1" /> Yes </label>
                  <label class="radio-inline" style="font-size:13px;">
                  <input type="radio" id="ship_tax_primary_insured_no" ng-change="autoPopulate()"  name="ship_tax_primary_insured" ng-model='ship_tax_primary_insured' class="ship_tax_primary_insured" ng-value="0" value="0"  /> No </label>
               </div>
             
            </div>
        
      </div> 
      <div id="tax_primary_insured_div" ng-if='ship_tax_primary_insured=="0"'>
            <div class="row maincontf" ng-init="autoPopulate()">
               <div class="col-md-4">
                  <div class="form-group">
                     <label> Salutation <span class="required">*</span></label>
                     <select list="salute" id="ship_tax_salut" placeholder="Salutation" name="ship_tax_salut" class="form-control input-sm" ng-model="ship_tax_salut" >
                        <option value="" disabled selected>Select your option</option>
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'">'.$salut['id'].' </option>';
                           }
                           ?>   
                     </select> 
                     <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_salut.$dirty" ng-messages="lmsShipProposal.ship_tax_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Salutation</div>
                     </div> --> 
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Your Name <span class="required">*</span></label>  
                     <input type="text" name="ship_tax_your_name"  placeholder="Name"  class="form-control input-sm" id="ship_tax_your_name" ng-model="ship_tax_your_name">              
              <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_your_name.$dirty" ng-messages="lmsShipProposal.ship_tax_your_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div> --> 
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Relationship with primary insured <span class="required">*</span></label>
                     <select id="ship_tax_primary_relation" name="ship_tax_primary_relation" class="form-control input-sm" ng-model="ship_tax_primary_relation" >
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

            <div class="row maincontf">

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Date Of Birth <span class="required">*</span></label>  
                     <input type="text" name="ship_tax_dob"  placeholder="Date Of Birth"  class="form-control input-sm" id="ship_tax_dob" ng-model="ship_tax_dob">               
                      <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_dob.$dirty" ng-messages="lmsShipProposal.ship_tax_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please enter Date Of Birth</div>
                     </div> --> 
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label> Gender <span class="required">*</span></label> 
                     <select  class="form-control input-sm" name="ship_tax_gender" id="ship_tax_gender" ng-model="ship_tax_gender" >
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                    <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_gender.$dirty" ng-messages="lmsShipProposal.ship_tax_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Gender</div>
                     </div> --> 
                  </div>
               </div>    

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Address line 1 <span class="required">*</span></label>  
                     <input type="text" id="ship_tax_addr1" name="ship_tax_addr1"  placeholder="Address1"  class="form-control input-sm"  ng-model="ship_tax_addr1" >               
                   <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_addr1.$dirty" ng-messages="lmsShipProposal.ship_tax_addr1.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter address line 1</div>
                     </div> --> 
                  </div>
               </div>                                         
            </div>   



            <div class="row maincontf">

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Address line 2 <span class="required">*</span> </label>  
                     <input type="text" name="ship_tax_addr2"  placeholder="Address 2"  class="form-control input-sm" ng-model="ship_tax_addr2" id="ship_tax_addr2" >               
                     <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_addr2.$dirty" ng-messages="lmsShipProposal.ship_tax_addr2.$error" role="alert">
                        <div ng-message="required" class="required">Please enter Date Of Birth</div>
                     </div> --> 
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Nearest Landmark <span class="required
                        ">*</span></label>  
                     <input type="text" name="ship_tax_landmark" id="ship_tax_landmark"  placeholder="Landmark"  class="form-control input-sm" ng-model="ship_tax_landmark" >               
                      <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_landmark.$dirty" ng-messages="lmsShipProposal.ship_tax_landmark.$error" role="alert">
                        <div ng-message="required" class="required">Please enter Nearest Landmark</div>
                     </div> --> 
                  </div>
               </div>
        
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Fixed Line Contact No<span class="required"> *</span></label>  
                     <input type="text" name="ship_tax_fixed_line" id="ship_tax_fixed_line"  placeholder="Fixed Line Contact No"  class="form-control input-sm" MaxLength="10" ng-model="ship_tax_fixed_line" >               
                      <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_fixed_line.$dirty" ng-messages="lmsShipProposal.ship_tax_fixed_line.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter contact number</div>
                     </div> --> 
                  </div>
               </div>                                         
            </div>   

            <div class="row maincontf">

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required">*</span></label>  
                     <input type="text" id="ship_tax_mobile_no" name="ship_tax_mobile_no"  placeholder="Mobile Number"  class="form-control input-sm" MaxLength="10" ng-model="ship_tax_mobile_no" >               
                    <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_mobile_no.$dirty" ng-messages="lmsShipProposal.ship_tax_mobile_no.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Mobile number</div>
                     </div> --> 
                  </div>
               </div>  


               <div class="col-md-4">
                  <div class="form-group">
                     <label>Email ID <span class="required"> *</span></label>  
                     <input type="text" id="ship_tax_email_id" name="ship_tax_email_id"  placeholder="Email ID"  class="form-control input-sm" ng-model="ship_tax_email_id" >               
                     <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_email_id.$dirty" ng-messages="lmsShipProposal.ship_tax_email_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Email Id </div>
                     </div> --> 
                  </div>
               </div>  
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Nationality-Indian <span class="required">*</span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:13px;">
                     
                        <input type="radio" name="ship_tax_nationality" id="ship_tax_nationality_yes" ng-model="ship_tax_nationality"  value="1"  required > Yes </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio"  name="ship_tax_nationality" id="ship_tax_nationality_no" ng-model="ship_tax_nationality"  value="0"  required > No </label>
                         <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_nationality.$dirty" ng-messages="lmsShipProposal.ship_tax_nationality.$error" role="alert">
                           <div ng-message="required" class="required">Please Select nationality </div>
                        </div> 
                     </div>
                  </div>
               </div>
            </div>



            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Occupation <span class="required">*</span> </label>
                     <select id="ship_tax_occupation" name="ship_tax_occupation" class="form-control input-sm"  ng-model="ship_tax_occupation" >
                        <option value="" disabled selected>Select your option</option>
                       <?php 
                           foreach($occupationlistArray as $occupation )
                           {
                               echo '<option value="'.$occupation['name'].'">'.$occupation['name'].'</option>';
                           }
                           ?>
                        
                     </select>
                     <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_occupation.$dirty" ng-messages="lmsShipProposal.ship_tax_occupation.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Occupation</div>
                     </div>  -->
                  </div>
               </div>



               <div class="col-md-4">
                  <div class="form-group">
                     <label>Income <span class="required">*</span></label>  
                     <input type="text" id="ship_tax_income" name="ship_tax_income"  placeholder="Income"  class="form-control input-sm"  ng-model="ship_tax_income" >               
                    <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_income.$dirty" ng-messages="lmsShipProposal.ship_tax_income.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Income </div>
                     </div> --> 
                  </div>
               </div>  

               <div class="col-md-4">
                  <div class="form-group">
                     <label>PPC Number </label>  
                     <input type="text" name="ship_tax_PPC_no"  placeholder="PPC Number"  class="form-control input-sm" ng-model="ship_tax_PPC_no" />               
<!--                      <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.ship_tax_PPC_no.$dirty" ng-messages="lmsShipProposal.ship_tax_PPC_no.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter PPC Number </div>
                     </div> -->
                  </div>
               </div>  


            </div>   

      </div><!-- main div -->   






            <h4 class="propsal-seperator">Add New Comment </h4>
               <hr>
               <div class="portlet-body planbox" style="color: #000;">
                  <div>

                      <div class="box">
                        <?php foreach($comment_details as $cmts) { ?>
                          <div class="row lmsresbor">
                             <div class="col-md-4">
                              <div class="usercome"><?php echo $cmts->emp_name; ?> (<?php echo $cmts->emp_code?>)</div>
                              <div class="userdate"><?php  echo $cmts->created_by;?></div>
                             </div>
                             <div class="col-md-7 textcomm"><?php  echo $cmts->comment;?></div> 
                                                      
                          </div>
                           <?php } ?>

                      </div>
                  </div>
               </div>
               <div class="row">
                  <div class="form-group">
                    <div class="col-md-12">
                     <textarea class="form-control" rows="5" id="lms_car_comment" name="lms_car_comment" ng-model="lms_car_comment" placeholder="Comments" ></textarea>
                      <div style="display: none;" class="required" id="cmt_error">Comment should not be blank</div>
                    </div>
                  </div>
               </div>
               <div class="row">&nbsp;</div>

               <div class="row lmsresbor">
                  <div class="form-group">
                     <div class="col-md-12">
                        <input class="Spouse_ship" type="checkbox" name="declaration" id="declaration"  ng-model="declaration" value="0" required />
                        <label> I hereby declare that the customer has a HDFC Bank Relationship – (Bank Account/Credit Card/LOS Number) </label><span class="required">*</span>
                        <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.declaration.$dirty" ng-messages="lmsShipProposal.declaration.$error" role="alert">
                           <div ng-message="required" class="required">Please Accept Decleration</div>
                        </div>
                     </div>
                     
                     <div class="col-md-12">&nbsp;</div>

                     <div class="col-md-12">
                        <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="0" required />
                        <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                        <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.premiumPayment.$dirty" ng-messages="lmsShipProposal.premiumPayment.$error" role="alert">
                           <div ng-message="required" class="required">Please Accept Premium Payment Mode</div>
                        </div>
                     </div>
                  </div>
               </div> 


               <div class="row">
                  <div class="col-md-6">
                    <!--  <div class="form-group">
                        <a href="<?php //echo base_url(); ?>qms-car-premium" >
                        <button type="button"  class="btn blue btn-default">Back</button>
                        </a>
                     </div> -->
                  </div>
                  <div class="col-md-6">
                     <div class="pull-right">
                        <div class="form-group">
                           <a href="<?php echo base_url(); ?>qms-car-proposal-view" >
                           <button type="submit"  class="btn blue btn-default send_quote" ng-click="shipUpdateProposal()" >Save Lead</button>
                           </a>
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
<div class="clearfix margin-bottom-20"> </div>
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
   
   function calculatePremium(year,age,sumInsured,noOfPerson,isCritical,isHospitalCash,critical){
      var forYearparams=premiumParams[year];
      var premiumAmount;
      if(sumInsured==undefined || sumInsured==null || sumInsured==""){
         return;
      }
      for(var i=0;i<forYearparams.length;i++){
         if(age>=forYearparams[i].start_age && age<=forYearparams[i].end_age){
            var sumInsuredParams=forYearparams[i]['sum_insured'];
            var peopleParams=sumInsuredParams[sumInsured];
            var criticalParams=forYearparams[i]["criticalIllness"];
            var criticalIllness=0;
            var hospitalCash=0;
            //if(peopleParams!=null)
            //{
               if(isCritical && critical!=undefined && critical!=null && critical!=""){
                  criticalIllness=parseInt(criticalParams[critical]);
               }
               if(isHospitalCash){
                  hospitalCash=parseInt(peopleParams[noOfPerson]["hospitalCash"])
               }
               premiumAmount=parseInt(peopleParams[noOfPerson]["basic"]);
            //}
            
            premiumAmount=premiumAmount+criticalIllness+hospitalCash;
            break;
         }
      }
      return premiumAmount;
   }

</script>
<script>


//Ajax call for city and state pre populate 
console.log("test",$('#lms_car_zip'));
$('#lms_car_zip').on('keyup',function(){
   if($(this).val().length>5){
      var webUbrl = $('#web_url').val();
     $.ajax({
   
              url : webUbrl+'Commoncontrol/getCityByPincode/',
               type : 'POST',
               data : {
                   'cus_pincode' : $('#lms_car_zip').val()},
               dataType:'json',
             
               success: function( data){
                  //var jsonD=JSON.parse(data);
                  $('#lms_car_city').val(data.cus_cityName),
                  $('#lms_car_state').val(data.cus_stateName)
               }
            });
   }
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
<script>
//$(".answer").hide();
$(".Spouse_ship").click(function() {
    if($(this).is(":checked")) {
/*        $(".answer").show();
        $("#spouse-propsal-details").show();*/
    } else {
        /*$(".answer").hide();
        $("#spouse-propsal-details").hide();*/
    }
     calculateCustomer_age();
});

$("#ss_hospital_daily").click(function() {
     calculateCustomer_age();
});


$("#ss_sum_insured_critical").change(function(){
   if(this.value > 0)
      calculateCustomer_age();
});

$(".answer1").hide();
$(".ss_critical").click(function() {
    if($(this).is(":checked")) {
          $(".answer1").show();
         $(".sumInsured").show();
    } else {
        $(".answer1").hide();
         $(".sumInsured").hide();
    }
     calculateCustomer_age();
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

<script type="text/javascript">
   /*function showChildrenDiv(noOfChildredns){
      if(noOfChildredns == 1) {
      $("#child1-propsal-details").show();
      
      $("#child2-propsal-details").hide();
      $("#child3-propsal-details").hide();
   
   } else if(noOfChildredns == 2) {
   
      $("#child1-propsal-details").show();
      $("#child2-propsal-details").show();

      $("#child3-propsal-details").hide();
   
   } else if(noOfChildredns == 3) {
      $("#child1-propsal-details").show();
      $("#child2-propsal-details").show();
      $("#child3-propsal-details").show();
   } else {
      $("#child1-propsal-details").hide();
      $("#child2-propsal-details").hide();
      $("#child3-propsal-details").hide();      
   }   
   }*/

$(".noofchildrens").click(function() {

   var noOfChildredns = $(this).val();
   //showChildrenDiv(noOfChildredns);
   calculateCustomer_age();

});   

$(".sship_pro_pregnant").click(function() {
   var pregnantValue = $(this).val();
   if(pregnantValue == 1) {
      $('#delivery_date_div').show();
   } else {
      $('#delivery_date_div').hide();
   }   

});

$(".treatment").click(function() {
   var treatmentValue = $(this).val();
   if(treatmentValue == 1) {
      $('#treatment_div').show();
   } else {
      $('#treatment_div').hide();
   }   
});   

$(".sship_pro_gutka").click(function() {
   var gutkaValue = $(this).val();
   if(gutkaValue == 1) {
      $('#sship_pro_gutka_div').show();
   } else {
      $('#sship_pro_gutka_div').hide();
   }   
});    


$(".spouse_pregnant").click(function() {
   var spousePregnantValue = $(this).val();
   if(spousePregnantValue == 1) {
      $('#spouse_delivery_date_div').show();
   } else {
      $('#spouse_delivery_date_div').hide();
   }   

});

$(".spouse_treatment").click(function() {
   var spouseTreatmentValue = $(this).val();
  
   if(spouseTreatmentValue == 1) {
      $('#spouse_treatment_div').show();
   } else {
      $('#spouse_treatment_div').hide();
   }   
});   


$(".spouse_gutka").click(function() {
   var spouseGutkaValue = $(this).val();
   if(spouseGutkaValue == 1) {
      $('#spouse_gutka_div').show();
   } else {
      $('#spouse_gutka_div').hide();
   }   
});    



$(".child1_pregnant").click(function() {
   var child1PregnantValue = $(this).val();
   if(child1PregnantValue == 1) {
      $('#child1_delivery_date_div').show();
   } else {
      $('#child1_delivery_date_div').hide();
   }   

});

$(".child1_treatment").click(function() {
   var child1TreatmentValue = $(this).val();
   if(child1TreatmentValue == 1) {
      $('#child1_treatment_div').show();
   } else {
      $('#child1_treatment_div').hide();
   }   
});   


$(".child1_gutka").click(function() {
   var child1GutkaValue = $(this).val();
   if(child1GutkaValue == 1) {
      $('#child1_gutka_div').show();
   } else {
      $('#child1_gutka_div').hide();
   }   
});    


$(".child2_pregnant").click(function() {
   var child2PregnantValue = $(this).val();
   if(child2PregnantValue == 1) {
      $('#child2_delivery_date_div').show();
   } else {
      $('#child2_delivery_date_div').hide();
   }   

});

$(".child2_treatment").click(function() {
   var child2TreatmentValue = $(this).val();
   if(child2TreatmentValue == 1) {
      $('#child2_treatment_div').show();
   } else {
      $('#child2_treatment_div').hide();
   }   
});   


$(".child2_gutka").click(function() {
   var child2GutkaValue = $(this).val();
   if(child2GutkaValue == 1) {
      $('#child2_gutka_div').show();
   } else {
      $('#child2_gutka_div').hide();
   }   
});    




$(".child3_pregnant").click(function() {
   var child3PregnantValue = $(this).val();
   if(child3PregnantValue == 1) {
      $('#child3_delivery_date_div').show();
   } else {
      $('#child3_delivery_date_div').hide();
   }   

});

$(".child3_treatment").click(function() {
   var child3TreatmentValue = $(this).val();
   if(child3TreatmentValue == 1) {
      $('#child3_treatment_div').show();
   } else {
      $('#child3_treatment_div').hide();
   }   
});   


$(".child3_gutka").click(function() {
   var child3GutkaValue = $(this).val();
   if(child3GutkaValue == 1) {
      $('#child3_gutka_div').show();
   } else {
      $('#child3_gutka_div').hide();
   }   
});    



$(".pre_ins_portability").click(function() {
   var preIinsPortability = $(this).val();
   if(preIinsPortability == 1) {
      $('#portability_div').show();
   } else {
      $('#portability_div').hide();
   }   
});  

  
$(".ship_tax_primary_insured").click(function() {
   var shipTaxPrimaryInsured = $(this).val();
   if(shipTaxPrimaryInsured == 0) {
      $('#tax_primary_insured_div').show();
   } else {
      $('#tax_primary_insured_div').hide();
   }   
});  


$(document ).ready(function() {
   $('#portability_div').hide();
   $('#tax_primary_insured_div').show();

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

      <script>
         $(document).ready(function () {

        $("#lmsCar").submit(function (e) {

            //stop submitting the form to see the disabled button effect
            e.preventDefault();
         });
     });

         /*$(document).ready(function() {
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
});*/

      </script>

   <script>
      function calculateCustomer_age(){
        var date2=$('#lms_car_dob').val();
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '-' + mm + '-' + yyyy;
        today = new Date(today.split('-')[2], today.split('-')[1] - 1, today.split('-')[0]);
        date2= new Date(date2.split('-')[2], date2.split('-')[1] - 1, date2.split('-')[0]);
        var timeDiff = Math.abs(date2.getTime() - today.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
        var months = Math.floor(diffDays / 31);
        var age = Math.floor(months / 12);
        var year=$('#policyterm').val();
        var val = $("input[name='Spouse_ship']:checked").val();
        var spouse= (val ===null || typeof val === "undefined") ?0 : val;
        var child=$("input[name='noofchildrens']:checked").val();
        var sumInsured=$('#ss_sum_insured').val();
        var critical=$('#ss_sum_insured_critical').val();
        var noOfPerson="1A";
        if(spouse=="1"){
            noOfPerson="2A";
        }
        if(child!="0"){
            noOfPerson= noOfPerson+"+"+child+"K";
        }
       
        val = $("input[name='ss_critical']:checked").val();
        var isCritical = (val ===null || typeof val === "undefined") ? 0 : val;
        
        val = $("input[name='ss_hospital_daily']:checked").val();
        var isHospitalCash = (val ===null || typeof val === "undefined") ? 0 : val;
       
        var premium = calculatePremium(year,age,sumInsured, noOfPerson,isCritical,isHospitalCash,critical);
       
        $('#lms_est_premium').val(premium);
         
        var scope = angular.element($("#lms_est_premium")).scope();
          scope.$apply(function(){
              scope.lms_est_premium = premium;
          });
        return year;
    }
    
   </script>

 <!--        });
    });
      </script> -->

</body>
</html>