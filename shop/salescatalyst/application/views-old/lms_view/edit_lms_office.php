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
                     <label>HDFC Card's Last 4 digits
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" placeholder="HDFC Card's Last 4 digits" onkeypress='return restrictAlphabets(event)'  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);" required />
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
                     <input type="text" name="lms_aaa_number" onkeypress='return restrictAlphabets(event)'  placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" required />               
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
             <div class="col-md-4" ng-if="channel=='DT'">
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
                     
                     <label>Sub Channel</label>   <span class="required"> * </span>
                      <select  class="form-control input-sm" name="lms_car_campaign_name" id="lms_car_campaign_name" ng-model="lms_car_campaign_name" required>
                        <option value="" disabled selected>Select your option</option> 
                     <?php 
                           foreach($CampaignArray as $Campaign )
                           {
                               echo '<option value="'.$Campaign['name'].'">'.$Campaign['name'].'</option>';
                           }
                           ?>
                     
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
                  <!--   <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pan.$dirty" id="pan_error" class="required" ng-messages="lmsCar.lms_car_pan.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pan card number</div>
                     </div> -->
                 
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
             <!-- Details of lead moved to lead details -->

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
                        <label>Alternate Contact Number </label>
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
                        <input type="radio" name="lms_car_cus_type" value="corporate" disabled="corporate" id="lms_car_cus_type_corporate"> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" id="lms_car_cus_type_individual" checked value="individual"> Individual </label>
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
                        <label>Enhanced Credit Card Limit </label>
                        <input  placeholder="Enhanced Credit Card Limit" id="lms_cus_cardlimt" disabled="lms_cus_cardlimt" name="lms_cus_cardlimt" class="form-control input-sm" ng-model="lms_cus_cardlimt" ng-model="lms_cus_cardlimt"  />
                          <!-- <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_cardlimt.$dirty" ng-messages="lmsCar.lms_cus_cardlimt.$error" role="alert">
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
         <form name="lmshomeDetil" novalidate >
            <div class="carhide" id="cardeatail">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Office Details</span>
                  </div>
               </div>
              <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Type of Building Construction</label>
                           <span class="required"> * </span>
                          <select id="hme_building_type" name="hme_building_type" class="form-control input-sm" ng-model="hme_building_type"  required>
                              <option value="" disabled selected>Select your option</option>
                              <option value="Kutcha">Kutcha</option>
                              <option value="Standard">Standard</option>
                            </select> 
                           <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.hme_building_type.$dirty" ng-messages="lmshomeDetil.hme_building_type.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Building Construction</div>
                           </div>
                     </div>
                  </div>


               <div class="col-md-4">
                  <div class="form-group">
                    <label>Property Ownership</label>
                     <span class="required"> * </span>
                    <select id="hme_property_ownership" name="hme_property_ownership" class="form-control input-sm" ng-model="hme_property_ownership"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Owned">Owned</option>
                        <option value="Rented">Rented</option>
                        
                      </select> 
                     <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.hme_property_ownership.$dirty" ng-messages="lmshomeDetil.hme_property_ownership.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Property Ownership</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                    <label>Do you have any claims in previous year</label>
                     <span class="required"> * </span>
                    <select id="hme_previous_claims" name="hme_previous_claims" class="form-control input-sm" ng-model="hme_previous_claims"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        
                      </select> 
                     <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.hme_previous_claims.$dirty" ng-messages="lmshomeDetil.hme_previous_claims.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Do you have any claims in previous year</div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="row maincontf">
      
               <div class="col-md-4">
               <div class="form-group">
                    <label>No of Floors</label>
                     <span class="required"> * </span>
                    <input type="text" name="hme_no_of_floors" placeholder="No of Floors " class="form-control input-sm number-validate" id="hme_no_of_floors" ng-model="hme_no_of_floors" required />
                     <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.hme_no_of_floors.$dirty" ng-messages="lmshomeDetil.hme_no_of_floors.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter No of Floors</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                    <label>Year of construction</label>
                     <span class="required"> * </span>
                    <input type="text" name="hme_year_of_construction" placeholder="Year of construction" class="form-control input-sm number-validate" id="hme_year_of_construction" ng-model="hme_year_of_construction" required />
                     <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.hme_year_of_construction.$dirty" ng-messages="lmshomeDetil.hme_year_of_construction.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Year of Construction</div>
                     </div>
                  </div>
               </div>
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Sum Insured</label>
                        <span class="required"> * </span>
                       <select id="hme_sum_insured" name="hme_sum_insured" class="form-control input-sm" ng-model="hme_sum_insured"  required>
                           <option value="" disabled selected>Select your option</option>
                           <option value="500000">5,00,000</option>
                           <option value="1000000">10,00,000</option>
                           <option value="2000000">20,00,000</option>
                           <option value="3000000">30,00,000</option>
                           <option value="4000000">40,00,000</option>
                           <option value="5000000">50,00,000</option>
                           <option value="7500000">75,00,000</option>
                         </select> 
                        <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.hme_sum_nsured.$dirty" ng-messages="lmshomeDetil.hme_sum_insured.$error" role="alert">
                           <div ng-message="required" class="required">Please Select In Sum Insured Amount</div>
                        </div>
                     </div>
                  </div>
              </div>


               <div class="row maincontf">
                 <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount<span class="required"> * </span></label>
                       
                        <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" readonly="">
                        <div ng-if="lmshomeDetil.$submitted" ng-messages="lmshomeDetil.lms_est_premium.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
                     </div>
                  </div>
               </div>   

               <div class="row maincontf">
                  <div class="form-group">
                        <div class="col-md-4">
                        <label>Communication address same as Risk Address</label> &nbsp;
                        <input class="Spouse_ship" type="checkbox" name="hme_risk_address_same" id="hme_address_same"  ng-model="hme_risk_address_same" value="1"  />
                            </div>
                              
                        <div class="col-md-8"> &nbsp;</div>
                      </div>
                  </div>  

               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Address 1</label>
                        <span class="required"> * </span>
                        <input type="text" name="hme_risk_address1" placeholder="Risk Address 1" class="form-control input-sm" id="hme_risk_address1" ng-model="hme_risk_address1"/>
                        <div id="hme_risk_address1_error" class="required"></div>
                     </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Address 2</label>
                        <span class="required"> * </span>
                      <input type="text" name="hme_risk_address2" placeholder="Risk Address 2 " class="form-control input-sm" id="hme_risk_address2" ng-model="hme_risk_address2"/>

                     <div id="hme_risk_address2_error" class="required"></div>

                     </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Area</label>
                        <span class="required"> * </span>
                       <input type="text" name="hme_risk_area" placeholder="Risk Area " class="form-control input-sm" id="hme_risk_area" ng-model="hme_risk_area" />
                        <div id="hme_risk_area_error" class="required"></div>
                        </div>
                   </div>
                  
               </div>
               


               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk Pincode</label>
                           <span class="required"> * </span>
                           <input type="text" name="hme_risk_pincode" placeholder="Risk Pincode" class="form-control input-sm number-validate" id="hme_risk_pincode" ng-model="hme_risk_pincode" />
                            <div id="hme_risk_pincode_error" class="required"></div>
                       </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk State</label>
                           <span class="required"> * </span>
                         <input type="text" name="hme_risk_state" placeholder="Risk State" class="form-control input-sm" id="hme_risk_state" ng-model="hme_risk_state" />
                             <div id="hme_risk_state_error" class="required"></div>
                        </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk City</label>
                           <span class="required"> * </span>
                          <input type="text" name="hme_risk_city" placeholder="Risk City " class="form-control input-sm" id="hme_risk_city" ng-model="hme_risk_city" />
                            <div id="hme_risk_city_error" class="required"></div>
                     </div>
                  </div>
                  
               </div>



               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Nearest Land Mark</label>
                        <span class="required"> * </span>
                        <input type="text" name="hme_risk_nearest_land_mark" placeholder="Risk Nearest Land Mark" class="form-control input-sm" id="hme_risk_nearest_land_mark" ng-model="hme_risk_nearest_land_mark" />
                           <div id="hme_risk_nearest_land_mark_error" class="required"></div>
                    </div>
                  </div>
                  
                  <div class="col-md-4">&nbsp;</div>
                  <div class="col-md-4">&nbsp;</div>
                  
            </div>

 <div class="row maincontf">
    &nbsp;
 </div>


      <div class="row maincontf" id="claims_div" style="display: none;">
     
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-12 labeltxtleft">Previous Year Claim Description</div>
            </div>
        </div>

         <div class="col-md-12">
            <div class="form-group">

                  <table border="1" class="table table-bordered table-striped dataTable no-footer" style="font-size: 12px ">
                     <tr align="center">
                        <td>Long Description</td>
                        <td>Assets Damaged</td>
                        <td>Cause Of Loss</td>
                        <td>Insurance In Place</td>
                        <td>Policy Year / Loss Year</td>
                        <td>Insurance Claimed</td>
                        <td>Loss Of Amount</td>
                       
                     </tr>

                     <?php for( $p = 1; $p < 5;  $p++ ) { ?>
                     <tr>
                        <td>
                           <input type="text" name="hme_long_des<?php echo $p; ?>" placeholder="Long Description" class="form-control input-sm" id="hme_long_des<?php echo $p; ?>" ng-model="hme_long_des<?php echo $p; ?>"  />
                        </td>   
                       
                        <td>
                           <input type="text" name="hme_assets_damage<?php echo $p;?>" placeholder="Damages" class="form-control input-sm" id="hme_assets_damage<?php echo $p;?>" ng-model="hme_assets_damage<?php echo $p;?>"  />
                        </td>   
                       
                        <td>
                           <input type="text" name="hme_cause_loss<?php echo $p; ?>" placeholder="Cause of loss" class="form-control input-sm" id="hme_cause_loss<?php echo $p; ?>" ng-model="hme_cause_loss<?php echo $p; ?>"  />
                        </td>   
                       
                        <td>
                           <select id="hme_ins_place<?php echo $p; ?>" name="hme_ins_place<?php echo $p; ?>" class="form-control input-sm" ng-model="hme_ins_place<?php echo $p; ?>" >
                              <option value="" disabled selected>Select</option>
                              <option value="Yes" selected>Yes</option>
                              <option value="No">No</option>
                           </select>                             
                        </td>   
                       
                        <td>
                           <input type="text" name="hme_policy_yr<?php echo $p; ?>" placeholder="Policy" class="form-control input-sm" id="hme_policy_yr<?php echo $p; ?>" ng-model="hme_policy_yr<?php echo $p; ?>"  />
                        </td>   
                       
                        <td> 
                             <select id="hme_ins_claim<?php echo $p; ?>" name="hme_ins_claim<?php echo $p; ?>" class="form-control input-sm" ng-model="hme_ins_claim<?php echo $p; ?>" >
                                 <option value="" disabled selected>Select</option>
                                 <option value="Yes" selected>Yes</option>
                                 <option value="No">No</option>
                              </select>                                                    
                        </td>   
                       
                        <td>     
                           <input type="text" name="hme_loss_amt<?php echo $p; ?>" placeholder="Loss" class="form-control input-sm" id="hme_loss_amt<?php echo $p; ?>" ng-model="hme_loss_amt<?php echo $p; ?>"  />

                        <input type="hidden" name="pre_claim_update_id<?php echo $p; ?>" ng-model="pre_claim_update_id<?php echo $p; ?>" >
                        </td>   
                       


                     </tr>

                  <?php }  ?>                                     
                  </table>   

            </div>
         </div>
      </div>






                <input type="hidden" id="lms_edit_product_id" name="lms_edit_product_id" class="form-control input-sm" ng-model="lms_edit_product_id" />
               <input type="submit" class="btn blue btn-default" style="float:right;" value="Update" ng-click="officeUpdateProductDetail()"   />
               <br><br>

               <!-- car details hidedive end here -->
            </div>
         </form>
      </div>




      <div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmshomeProposal" novalidate >
            <div class="carhide" id="carproposal">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Office Proposal</span>
                  </div>
               </div>

             
                           <div class="row maincontf">
                           <div class="col-md-4">
                             

                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="home_pro_policy_sdate"  name="home_pro_policy_sdate" class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" ng-model="home_pro_policy_sdate" required data-date-format="dd-mm-yyyy">
                     <div ng-if="lmshomeProposal.$submitted" ng-messages="lmshomeProposal.home_pro_policy_sdate.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter policy start date</div>
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
                                 <input type="text" name="home_pro_nname" placeholder="Enter Name of Nominee " class="form-control input-sm" id="home_pro_nname" ng-model="home_pro_nname" required />
                                 <div ng-if="lmshomeProposal.$submitted || lmshomeProposal.home_pro_nname.$dirty" ng-messages="lmshomeProposal.home_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary insured
                                 <span class="required"> * </span></label>
                                 <select id="home_pro_nomie_relation" name="home_pro_nomie_relation" class="form-control input-sm" ng-model="home_pro_nomie_relation"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                  </select>
                                 <div ng-if="lmshomeProposal.$submitted || lmshomeProposal.home_pro_nomie_relation.$dirty" ng-messages="lmshomeProposal.home_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="home_pro_nomie_age" maxlength="2" placeholder="Enter Nominee Age" class="form-control input-sm age-validate" id="home_pro_nomie_age" ng-model="home_pro_nomie_age" required/>
                                 <div ng-if="lmshomeProposal.$submitted || lmshomeProposal.home_pro_nomie_age.$dirty" ng-messages="lmshomeProposal.home_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Name Of Appointee </label>
                                 <input type="text" name="home_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="home_pro_nameofappoint" ng-model="home_pro_nameofappoint"/>
                     
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="home_pro_appoint_relation" name="home_pro_appoint_relation" class="form-control input-sm" ng-model="home_pro_appoint_relation">
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

                        <h4 class="propsal-seperator">Add New Comment </h4>
                        <hr>
                        <div id="recentComment" style="font-weight:bold;color:red">
                
              </div>
                        <div class="row ">
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
                           <label> I hereby declare that the customer has a HDFC Bank Relationship – (Bank Account/Credit Card/LOS Number) </label><span class="required">*</span>
                           <div ng-if="lmshomeProposal.$submitted || lmshomeProposal.declaration.$dirty" ng-messages="lmshomeProposal.declaration.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Decleration</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>

                        <div class="col-md-12">
                           <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="0" required />
                           <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                           <div ng-if="lmshomeProposal.$submitted || lmshomeProposal.premiumPayment.$dirty" ng-messages="lmshomeProposal.premiumPayment.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Premium Payment Mode</div>
                           </div>
                        </div>
                     </div>
                  </div> 
                  <input type="hidden" id="lms_edit_proposal_id" name="lms_edit_proposal_id" class="form-control input-sm" ng-model="lms_edit_proposal_id" />
                  <input type="hidden" id="lms_edit_nominee_id" name="lms_edit_nominee_id" class="form-control input-sm" ng-model="lms_edit_nominee_id" /> 

               <div class="row">
                  <div class="col-md-6">
   
                  </div>
                  <div class="col-md-6">
                     <div class="pull-right">
                        <div class="form-group">
                           <a href="<?php echo base_url(); ?>qms-car-proposal-view" >
                           <button type="submit"  class="btn blue btn-default" ng-click="homeUpdateProposal()" >Update Lead</button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>

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
        
          $(document).ready(function() {
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


</body>
</html>