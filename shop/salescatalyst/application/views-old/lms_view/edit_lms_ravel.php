<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car_edit.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="Travel">
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
                     <input type="text" name="lms_aaa_number" placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" required />               
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
                  <div class="form-group" >
                     <label>Sub Channel </label>   <span class="required"> * </span>

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
             <!-- Details of lead -->

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
                        <label>Alternate Contact Number <span class="required"> * </span></label>
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
         <form name="lmstravelDetil" novalidate >
            <div class="carhide" id="cardeatail">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Travel Details</span>
                  </div>
               </div>

               
               <div class="row maincontf">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Policy Type
                                <span class="required"> * </span></label>
                            <div class="radio-list">
                                <label class="radio-inline" style="font-size:12px;">
                                    <input type="radio" name="travel_policy_type" ng-model='travel_policy_type'  value="Individual" required> Individual/Family </label>
                                <label class="radio-inline" style="font-size:12px;">
                                    <input type="radio" name="travel_policy_type" ng-model='travel_policy_type' value="Student" required> Student </label>
                                <div ng-if="lmstravelDetil.$submitted || lmstravelDetil.travel_policy_type.$dirty" ng-messages="lmstravelDetil.travel_policy_type.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Policy Type</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Type of Trip
                                <span class="required"> * </span></label>
                            <div class="radio-list">
                                <label class="radio-inline " style="font-size:12px;">
                                    <input type="radio" name="travel_type_trip" ng-model='travel_type_trip'  value="Single Trip" required> Single Trip </label>

                                <label class="radio-inline" style="font-size:12px;" id="annualTrip">
                                    <input type="radio" name="travel_type_trip" ng-model='travel_type_trip' value="Annual Trip" required> Annual Multi Trip </label>
                                <div ng-if="lmstravelDetil.$submitted || lmstravelDetil.travel_type_trip.$dirty" ng-messages="lmstravelDetil.travel_type_trip.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Type of Trip</div>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="col-md-4">
               <div class="form-group">
                  <label>Cover Type <span class="required"> * </span></label>
                  <div class="radio-list">

                    <label class="radio-inline" style="font-size:12px;" >
                     <input type="radio" name="travel_cover_type" ng-model='travel_cover_type'   value="Individual" > Individual </label>
                  <label class="radio-inline" style="font-size:12px;"  id="coverTypeFamily">
                     <input type="radio" name="travel_cover_type"  ng-model='travel_cover_type'   value="Family"> Family Floater </label>   
                     
                                                  
                     <div ng-if="lmstravelDetil.$submitted || lmstravelDetil.travel_cover_type.$dirty" ng-messages="lmstravelDetil.travel_cover_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Cover Type</div>
                     </div>
                  </div>
               </div>
            </div>

            </div>
                <div class="row maincontf">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Depart Date
                                <span class="required"> * </span></label>
                            <input type="text" id="travel_depart_date" name="travel_depart_date" class="form-control input-sm" placeholder="Depart Date" ng-model="travel_depart_date" required>
                            <div ng-if="lmstravelDetil.$submitted " ng-messages="lmstravelDetil.travel_depart_date.$error" role="alert">

                                <div ng-message="required" class="required">Please Select Depart Date</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Return Date <span class="required"> * </span></label>
                            <input type="text" id="travel_return_date" name="travel_return_date" class="form-control input-sm" placeholder="Return Date" ng-model="travel_return_date" required>
                            <div ng-if="lmstravelDetil.$submitted " ng-messages="lmstravelDetil.travel_return_date.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Return Date</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Trip Duration </label>
                            <input type="text" id="travel_trip_duration" name="travel_trip_duration" class="form-control input-sm" placeholder="travel_trip_duration" ng-model="travel_trip_duration" readonly="readonly">
                            <div ng-if="lmstravelDetil.$submitted || lmstravelDetil.travel_trip_duration.$dirty" ng-messages="lmstravelDetil.travel_trip_duration.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Trip Duration</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row maincontf">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Travel Type <span class="required"> * </span></label>
                            <input list="travel_type" placeholder="Select Travel Type" id="traveltype" name="traveltype" class="form-control input-sm" ng-model="traveltype" required>
                            <datalist id="travel_type">
                              
                                <option value="Non Schengen"></option>
                                <option value="Schengen"></option>
                            </datalist>
                            <div ng-if="lmstravelDetil.$submitted || lmstravelDetil.traveltype.$dirty" ng-messages="lmstravelDetil.traveltype.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Travel Type</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Geographical Covertravel age <span class="required"> * </span></label>
                            <input list="travel_geographical" placeholder="Select  travel geographical" id="geographical" name="geographical" class="form-control input-sm" ng-model="geographical" required>
                            <datalist id="travel_geographical">
                                <option id='1' value="World-wide including USA and Canada"></option>
                                <option id='2' value="World-wide excluding USA and Canada but including Japan"></option>
                                <option id='3' value="Asia excluding Japan"></option>
                            </datalist>
                            <div ng-if="lmstravelDetil.$submitted || lmstravelDetil.geographical.$dirty" ng-messages="lmstravelDetil.geographical.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Geographical Covertravel_age</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="multitrips">
                            <div class="form-group">
                                <label>Max per trip duration </label>
                                <div class="radio-list">
                                    <label class="radio-inline" style="font-size:12px;">
                                        <input type="radio" name="travel_max_trip" ng-model='travel_max_trip' checked ng-value='"thirtydays"' value="thirtydays"> 30 Days </label>
                                    <label class="radio-inline" style="font-size:12px;">
                                        <input type="radio" name="travel_max_trip" ng-model='travel_max_trip' ng-value='"fourtfivedays"' value="fourtfivedays"> 45 Days </label>
                                    <label class="radio-inline" style="font-size:12px;">
                                        <input type="radio" name="travel_max_trip" ng-model='travel_max_trip' ng-value='"sixtydays"' value="sixtydays"> 60 Days </label>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- input !-->
                <div id="member_student">

                    <div class="row maincontf">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Relationship <span class="required"> * </span></label>
                                <input list="relationship" placeholder="Select travel relationship" id="travel_relationship" name="travel_relationship" class="form-control input-sm" ng-model="travel_relationship" required>
                                <datalist id="relationship">
                                  
                                    <option value="Self"></option>
                                    <option value="spouse"></option>
                                    <option value="Children1"></option>
                                    <option value="Children2"></option>
                                </datalist>
                                <div ng-if="lmstravelDetil.$submitted || lmstravelDetil.travel_relationship.$dirty" ng-messages="lmstravelDetil.travel_relationship.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select travel relationship</div>
                                </div>
                            </div>
                        </div>



                  <div class="col-md-4">
                    
                     <div class="form-group">
                        <label>DOB <span class="required"> * </span></label>
                        <input type="text" id="travel_date_birth" name="travel_date_birth" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="travel_date_birth" required data-date-format="dd-mm-yyyy">
                        <div ng-if="lmstravelDetil.$submitted" ng-messages="lmstravelDetil.travel_date_birth.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter DOB</div>
                        </div>
                     </div>
                  </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age" id="travel_age" class="form-control input-sm" placeholder="age" ng-model="travel_age" readonly="">
                                 <div ng-if="lmstravelDetil.$submitted " ng-messages="lmstravelDetil.travel_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Age</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label>&nbsp;</label>

                               
                            </div>
                        </div>
                    </div>

                </div>

                <!-- <div id="member_family" style="border: 1px solid #CCC; padding: 5px 15px;">

                    <div class="row maincontf" id="member_row_1">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Relationship </label>
                                <input list="relation" id="travel_relationship_1" placeholder="Select travel relationship" name="travel_relationship_1" class="form-control input-sm" ng-model="travel_relationship_1">
                                <datalist id="relation">
                                  
                                    <option value="Self"></option>
                                    <option value="spouse"></option>
                                    <option value="Children1"></option>
                                    <option value="Children2"></option>
                                </datalist>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Of Birth </label>
                                <input type="text" id="travel_dob_1" name="travel_dob_1" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="travel_dob_1">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age_1" id="travel_age_1" class="form-control input-sm travel_age" placeholder="age" ng-model="travel_age_1" />


                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label> &nbsp;</label>
                                <button id="btn_hide_1" class="clearRow btn blue btn-default"> Clear</button>
                            </div>
                        </div>
                    </div>

                    <div class="row maincontf" id="member_row_2">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Relationship</label>
                                <input list="relation" placeholder="Select travel relationship" id="travel_relationship_2" name="travel_relationship_2" class="form-control input-sm" ng-model="travel_relationship_2">
                                <datalist id="relation">
                                 
                                    <option value="Self">Self</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="chld1">Children1</option>
                                    <option value="chld2">Children2</option>
                               </datalist>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Of Birth </label>
                                <input type="text" id="travel_dob_2" name="travel_dob_2" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="travel_dob_2">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age_2" id="travel_age_2" class="form-control input-sm travel_age" placeholder="age" ng-model="travel_age_2" />

                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label> &nbsp;</label>
                                <button id="btn_hide_2" class="clearRow btn blue btn-default"> Clear</button>
                            </div>
                        </div>
                    </div>

                    <div class="row maincontf" id="member_row_3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>travel_relationship </label>
                                <input list="relation" placeholder="Select travel relationship" id="travel_relationship_3" name="travel_relationship_3" class="form-control input-sm" ng-model="travel_relationship_3">
                                <datalist id="relation">
                                  
                                    <option value="Self"></option>
                                    <option value="spouse"></option>
                                    <option value="Children1"></option>
                                    <option value="Children2"></option>
                               </datalist>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="text" id="travel_dob_3" name="travel_dob_3" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="travel_dob_3">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age_3" id="travel_age_3" class="form-control input-sm travel_age" placeholder="age" ng-model="travel_age_3" />

                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <label> &nbsp;</label>
                                <button id="btn_hide_3" class="clearRow btn blue btn-default"> Clear</button>
                            </div>
                        </div>
                    </div>

                </div> -->

              <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount<span class="required"> * </span></label>
                       
               <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" required>
                        <div ng-if="lmstravelDetil.$submitted" ng-messages="lmstravelDetil.lms_est_premium.$error" class="required" id="premium-validate" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
                     </div>
                  </div>
               </div>

               <input type="hidden" id="lms_edit_product_id" name="lms_edit_product_id" class="form-control input-sm" ng-model="lms_edit_product_id" />
               
               <div class="row maincontf">&nbsp;</div>

                <input type="submit" class="btn blue btn-default" style="float:right;" value="continue" id="hide" ng-click="TravelProductUpdateDetail()"   />
               <br><br>

               <!-- car details hidedive end here -->
            </div>
         </form>
      </div>  

      

   <div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsTravelProposal" novalidate >
            <div class="carhide" id="carproposal">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase"><?php echo $sub_module; ?> Proposal</span>
                  </div>
               </div>


              
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Presently in India
                                 <span class="required"> * </span></label>
                                 <div class="radio-list">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_present_india" id='tvl_pro_present_india_yes'  value="Yes" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_present_india" id='tvl_pro_present_india_no'  value="No"> No </label>
                                 <!--    <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_present_india.$dirty" ng-messages="lmsTravelProposal.tvl_pro_present_india.$error" role="alert">
                                       <div ng-message="required" class="required">Please Select Presently in India</div>
                                    </div> -->
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <div class="form-group">
                                    <label>Holds Valid Indian Passport
                                    <span class="required"> * </span></label>
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="tvl_pro_vaild_passport" id='tvl_pro_vaild_passport_yes'  value="Yes" > Yes </label>
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="tvl_pro_vaild_passport" id='tvl_pro_vaild_passport_no'  value="No"> No </label>
                                   <!--     <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_vaild_passport.$dirty" ng-messages="lmsTravelProposal.tvl_pro_vaild_passport.$error" role="alert">
                                          <div ng-message="required" class="required">Please Select Presently in India</div>
                                       </div> -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nationality <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_national"  placeholder="Enter Nationality" class="form-control input-sm" id="tvl_pro_national" ng-model="tvl_pro_national" required />
                                 <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_national.$dirty" ng-messages="lmsTravelProposal.tvl_pro_national.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nationality</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Passport No
                                 <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_passport_no" placeholder="Enter Passport No" class="form-control input-sm" id="tvl_pro_passport_no" ng-model="tvl_pro_passport_no" required />
                                 <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_passport_no.$dirty" ng-messages="lmsTravelProposal.tvl_pro_passport_no.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Passport No</div>
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
                                 <input type="text" name="tvl_pro_nname" placeholder="Enter Name of Nominee" class="form-control input-sm" id="tvl_pro_nname" ng-model="tvl_pro_nname" required />
                                 <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_nname.$dirty" ng-messages="lmsTravelProposal.tvl_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary insured
                                 <span class="required"> * </span></label>
                                 <select id="tvl_pro_nomie_relation" name="tvl_pro_nomie_relation" class="form-control input-sm" ng-model="tvl_pro_nomie_relation"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                  </select>
                                 <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_nomie_relation.$dirty" ng-messages="lmsTravelProposal.tvl_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_nomie_age" placeholder="Enter Nominee Age"  class="form-control input-sm age-validate" id="tvl_pro_nomie_age" ng-model="tvl_pro_nomie_age" required/>
                                 <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_nomie_age.$dirty" ng-messages="lmsTravelProposal.tvl_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Name Of Appointee </label>
                                 <input type="text" name="tvl_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="tvl_pro_nameofappoint" ng-model="tvl_pro_nameofappoint"/>
<!--                                  <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_nameofappoint.$dirty" ng-messages="lmsTravelProposal.tvl_pro_nameofappoint.$error" role="alert">
                                    <div ng-message="required" class="required">Please EnterName Of Appointee</div>
                                 </div> -->
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="tvl_pro_appoint_relation" name="tvl_pro_appoint_relation" class="form-control input-sm" ng-model="tvl_pro_appoint_relation">
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
                       
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Are any of the above travellers professional/semi professional sportspeople?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_prosemi" id='tvl_pro_prosemi_yes' ng-value="0" value="0" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_prosemi" id='tvl_pro_prosemi_no' ng-value="1" value="1"> No </label>
                                 </div>
                     <!--             <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_prosemi.$dirty" ng-messages="lmsTravelProposal.tvl_pro_prosemi.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div> -->
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Do any of the above travellers engage in adventure sports?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_engage" id='tvl_pro_engage_yes' ng-value="0" value="0" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_engage" id='tvl_pro_engage_no' ng-value="1" value="1"> No </label>
                                 </div>
                            <!--      <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_engage.$dirty" ng-messages="lmsTravelProposal.tvl_pro_engage.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Do any of the above travellers engage in adventure sports?</div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Are any of the above travellers presently suffering from any pre existing illness/disease including Blood Preasure /Diabetes etc
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">

                                    <input type="radio" name="tvl_pro_illness" id='tvl_pro_illness_yes' ng-value="0" value="0" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_illness" id='tvl_pro_illness_no' ng-value="1" value="1"> No </label>
                                 </div>
                            <!--      <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.tvl_pro_illness.$dirty" ng-messages="lmsTravelProposal.tvl_pro_illness.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select suffering from any pre existing illness</div>
                                 </div>
                                 -->
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
                           <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.declaration.$dirty" ng-messages="lmsTravelProposal.declaration.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Decleration</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>

                        <div class="col-md-12">
                           <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="0" required />
                           <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                           <div ng-if="lmsTravelProposal.$submitted || lmsTravelProposal.premiumPayment.$dirty" ng-messages="lmsTravelProposal.premiumPayment.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Premium Payment Mode</div>
                           </div>
                        </div>



                     </div>
                  </div>                           

                  <input type="hidden" id="lms_edit_application_Id" name="lms_edit_application_Id" class="form-control input-sm" ng-model="lms_edit_application_Id" />
                  <input type="hidden" id="lms_edit_customer_id" name="lms_edit_customer_id" class="form-control input-sm" ng-model="lms_edit_customer_id" />
                  <input type="hidden" id="lms_edit_lead_id" name="lms_edit_lead_id" class="form-control input-sm" ng-model="lms_edit_lead_id" />
                 
<!-- 
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <a href="<?php // echo base_url(); ?>qms-car-premium" >
                        <button type="button"  class="btn blue btn-default">Back</button>
                        </a>
                     </div>
                  </div> -->
                  <div class="col-md-12">
                     <div class="pull-right">
                        <div class="form-group">
                           <a href="<?php echo base_url(); ?>qms-car-proposal-view" >
                           <button type="submit"  class="btn blue btn-default send_quote" ng-click="TravelUpdateProposal()" >Update Lead</button>
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
   $('.multitrips').hide();
   $('#annualTrip').hide();
   $('#coverTypeFamily').hide();
   $('.multitrips').hide();
   $('#member_family').hide();


   
   // $('input[name="travel_type_trip"]').on('change', function() {
   //      //$('.multitrips').toggle(+this.value === 1 && this.checked);
   //      var value = $(this).val();
   //      if (value == 0) {
   //          $('.multitrips').hide();
   //      } else {
   //          $('.multitrips').show();
   //      }

   //  }).change();
</script>
<script>
    // $('input[name="travel_policy_type"]').on('click', function() {
    //     // $('#annualTrip').toggle(+this.value === A && this.checked);
    //     //  alert('checked');
    //     var value = $(this).val();
    //     if (value == 1) {
    //         $('#annualTrip').hide();
    //         $('#coverTypeFamily').hide();

    //     } else {
    //         $('#annualTrip').show();
    //         $('#coverTypeFamily ').show();

    //     }
    //     //annualTrip
    // }).change();
</script>


<script>
    // $('input[name="travel_policy_type"]').on('click', function() {
    //     var value = $(this).val();
    //     if (value == 1) {
    //         $('.multitrips').hide();
    //         $('#member_family').hide();
    //         // $('#member_student').show();  
    //     } else {
    //         $('.multitrips').show();
    //         $('#member_family').show();
    //         // $('#member_student').hide();
    //     }

    // }).change();
</script>
<script>
    function add_fields() {
        var d = document.getElementById("content");
        d.innerHTML += "<ul ><input type='text'style='width:48px; margin-right:5px;'value='' /><select><option>Test1</option></select> <button onclick='add_fields();'>+</button><button onclick='minus_fields(this);'>-</ul>  ";
    }

    function minus_fields(a) {
        var value = a.parentElement;
        value.remove(a);
    }
</script>

   <script>
  $(document).ready(function(){
    
    var date_input=$('input[name="travel_depart_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })


  })


   $(document).ready(function(){
    
    var date_input=$('input[name="travel_return_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })


  })
</script> 

<script>
    $('#travel_depart_date').change(function() {
        updateDuration();
    })

    $('#travel_return_date').change(function() {
        updateDuration();
    })

    $('#travel_date_birth').on('change', function(){
        $('#travel_age').val('');
        var date2 = $('#travel_date_birth').val();
        var travel_age = calculatetravel_age(date2);
        if (isNaN(travel_age)) {
           
           // $('#travel_date_birth').focus();
            return false;
        } else {
            $('#travel_age').val(travel_age);
        }
    });

    function calculatetravel_age(date2) {

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
        date2 = new Date(date2.split('-')[2], date2.split('-')[1] - 1, date2.split('-')[0]);
        var timeDiff = Math.abs(date2.getTime() - today.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
        var months = Math.floor(diffDays / 31);
        var years = Math.floor(months / 12);
        return years;
    }

    function updateDuration() {
        var today = $('#travel_depart_date').val();
        var date2 = $('#travel_return_date').val();

        today = new Date(today.split('-')[2], today.split('-')[1] - 1, today.split('-')[0]);
        date2 = new Date(date2.split('-')[2], date2.split('-')[1] - 1, date2.split('-')[0]);
        var timeDiff = Math.abs(date2.getTime() - today.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        if (diffDays > 0)
            $("#travel_trip_duration").val(diffDays);

    }

    $('.clearRow').on('click', function() {

        var selectRow = this.id;
        var rowId = selectRow[selectRow.length - 1];

        $('#travel_relationship_' + rowId).val('');
        $('#datebirth_' + rowId).val('');
        $('#travel_age_' + rowId).val('');

        return false;
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
<script>

  $("#lms_cus_emi_yr").val('');
  $("#lms_cus_emi option").each(function() {
      if ($(this).text() == "No") {
            $(this).prop("selected", true);
      }
});
</script>

</body>
</html>