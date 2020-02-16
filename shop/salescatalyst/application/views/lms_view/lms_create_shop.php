<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="Shop">

<div class="tab-content">
   <div class="tab-pane fade active in" id="car">
      <!--                         <form type="POST" id="carform" name="carform" >
         -->                           
      <div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsCar" novalidate >
          <div class="row">
          <div class="col-md-8">
          <div class="portlet-title tabbable-line">
           
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">Lead Details</span>
               </div>
               
            </div>
          </div>
            <div class="col-md-4">
            <div class="pull-right" style="margin-top: 10px;">
                        <a href="<?php echo base_url(); ?>lms-script-query-ci" target="_blank">
                            <button type="button" class="btn blue btn-default"> Script Query </button>
                        </a>
                      </div>
            </div>
            </div>
           <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Category
                     </label>
                     <input list="Category" placeholder="Select Category" class="form-control input-sm" name="lms_car_category" id="lms_car_category" ng-model="lms_car_category" >
                     <datalist id="Category">
                      
                        <?php 
                           foreach($CategoryArray as $Category )
                           {
                               echo '<option  value="'.$Category['name'].'" style="font-weight:normal; color:#ff0000;"></option>';
                           }
                           ?>   
                     </datalist>
                     <!-- <div ng-if="lmsCar.$submitted || lmsCar.lms_car_category.$dirty" ng-messages="lmsCar.lms_car_category.$error" role="alert">
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
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4"  onkeypress='return restrictAlphabets(event)' placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_hdfc_card_4digt.$dirty" class="required" id="cardwar" ng-messages="lmsCar.lms_car_hdfc_card_4digt.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>
                     </div>
                  </div>
               </div>
            </div>
             <div class="row maincontf">
               

<!--                <div class="col-md-4">
                  <div class="form-group">
                     <label>Priority</label> 
                     <span class="required"> * </span></label>                  
                     <input list="Priority " placeholder="select Priority" class="form-control input-sm" name="lms_car_priority" id="lms_car_priority" ng-model="lms_car_priority" required>
                     <datalist id="Priority ">
                      
                        <option value="Priority 1"></option>
                        <option value="Priority 2"></option>
                        <option value="Priority 3"></option>
                        <option value="Priority 4"></option>
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_priority.$dirty" ng-messages="lmsCar.lms_car_priority.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div> -->
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
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_sub_channel.$dirty" ng-messages="lmsCar.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4" ng-if="channel=='DT'">
                  <div class="form-group">
                     <label>Sub Channel</label>  
                     <span class="required"> * </span></label>   
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

                <div class="row maincontf" ng-if="channel=='Prime' || channel=='VRM' || channel=='Phone Banking' || channel=='COP'">
            <div class="form-group">
                  <div class="col-md-4">
                  <label> Dispatch required on Vision plus address</label> &nbsp;
                  <input class="Spouse_ship" type="checkbox" name="vision_address_name" id="vision_address"  ng-model="vision_address_name" value="1"  />
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

<!--                <div class="col-md-4">
                  <div class="form-group">
                     <label>DOB
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_do"  placeholder="DD-MM-YYYY"  class="form-control input-sm custom-date" id="lms_car_do"  required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_do.$dirty" id="dobalert" ng-messages="lmsCar.lms_car_do.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter DOB</div>
                     </div>
                  </div>
               </div> -->


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
                     <input type="text" name="lms_car_area"  placeholder="Area"   class="form-control input-sm" id="lms_car_area"  ng-model="lms_car_area" >
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
                     <input type="text" name="lms_car_zip"  MaxLength="6" onkeyup="return postcode_validate(this.value);" placeholder="Pincode "  class="form-control input-sm number-validate" id="lms_car_zip" ng-model="lms_car_zip" required >
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
                        <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" onkeypress='return restrictAlphabets(event)' placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile"  /> 
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
                        <input type="radio" name="lms_car_cus_type" ng-model='lms_car_cus_type' ng-value='"corporate"' value="corporate" disabled="corporate" required> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" autocomplete="off" name="lms_car_cus_type" ng-model='lms_car_cus_type' ng-value='"individual"' value="individual" checked required> Individual </label>
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
                           <input type="radio" name="lms_cus_pfee" ng-model='lms_cus_pfee' ng-value='"0"'  value="0" checked required> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee"  ng-model='lms_cus_pfee' ng-value='"1"'  value="1" required> Yes </label>  
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_pfee.$dirty" ng-messages="lmsCar.lms_cus_pfee.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Processing Fee Applicable</div>
                           </div>
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
                           <input type="radio" name="lms_cus_tle" ng-model='lms_cus_tle' ng-value='"0"'  value="0" checked required> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" disabled="lms_cus_tle" ng-model='lms_cus_tle' ng-value='"1"'  value="1" required> Yes </label>  
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_tle.$dirty" ng-messages="lmsCar.lms_cus_tle.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Temp LE </div>
                           </div>
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
            <input type="submit" class="btn blue btn-default" style="float:right;" value="continue" id="hide" ng-click="customer()"   />
            <br><br>
         </form>
      </div>

        

     
      <div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsshopDetil" novalidate >
            <div class="carhide" id="cardeatail">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Shop Details</span>
                  </div>
               </div>
              <div class="row maincontf">
               <div class="col-md-4">
               <div class="form-group">
                                <label>Type of Building Construction</label>
                                 <span class="required"> * </span>
                                <select id="shop_building_type" name="shop_building_type" class="form-control input-sm" ng-model="shop_building_type"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Kutcha">Kutcha</option>
                                    <option value="Standard">Standard</option>
                                    
                                  </select> 
                                 <div ng-if="lmsshopDetil.$submitted || lmsshopDetil.shop_building_type.$dirty" ng-messages="lmsshopDetil.shop_building_type.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Building Construction</div>
                                 </div>
                              </div>
                  
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                                <label>Property Ownership</label>
                                 <span class="required"> * </span>
                                <select id="shop_property_ownership" name="shop_property_ownership" class="form-control input-sm" ng-model="shop_property_ownership"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Owned">Owned</option>
                                    <option value="Rented">Rented</option>
                                    
                                  </select> 
                                 <div ng-if="lmsshopDetil.$submitted || lmsshopDetil.shop_property_ownership.$dirty" ng-messages="lmsshopDetil.shop_property_ownership.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Property Ownership</div>
                                 </div>
                              </div>
               </div>
               <div class="col-md-4">
                     <div class="form-group">
                                <label>Do you have any claims in previous year</label>
                                 <span class="required"> * </span>
                                <select id="shop_previous_claims" name="shop_previous_claims" class="form-control input-sm" ng-model="shop_previous_claims"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                    
                                  </select> 
                                 <div ng-if="lmsshopDetil.$submitted || lmsshopDetil.shop_previous_claims.$dirty" ng-messages="lmsshopDetil.shop_previous_claims.$error" role="alert">
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
                                <input type="text" name="shop_no_of_floors" placeholder="No of Floors " class="form-control input-sm number-validate" id="shop_no_of_floors" ng-model="shop_no_of_floors" required />
                                 <div ng-if="lmsshopDetil.$submitted || lmsshopDetil.shop_no_of_floors.$dirty" ng-messages="lmsshopDetil.shop_no_of_floors.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter No of Floors</div>
                                 </div>
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Year of construction</label>
                                 <span class="required"> * </span>
                                <input type="text" name="shop_year_of_construction" placeholder="Year of construction" class="form-control input-sm number-validate" id="shop_year_of_construction" ng-model="shop_year_of_construction" required />
                                 <div ng-if="lmsshopDetil.$submitted || lmsshopDetil.shop_year_of_construction.$dirty" ng-messages="lmsshopDetil.shop_year_of_construction.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Year of Construction</div>
                                 </div>
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Sum Insured</label>
                                 <span class="required"> * </span>
                                <select id="shop_sum_insured" name="shop_sum_insured" class="form-control input-sm" ng-model="shop_sum_insured"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="500000">5,00,000</option>
                                    <option value="1000000">10,00,000</option>
                                    <option value="1500000">15,00,000</option>
                                    <option value="2000000">20,00,000</option>
                                    </select> 
                                 <div ng-if="lmsshopDetil.$submitted || lmsshopDetil.shop_sum_insured.$dirty" ng-messages="lmsshopDetil.shop_sum_insured.$error" role="alert">
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
                  <input class="Spouse_ship" type="checkbox" name="shop_risk_address_same" id="shop_risk_address_same"  ng-model="shop_risk_address_same" value="1"  />
                      </div>
                        
                  <div class="col-md-8"> &nbsp;</div>
                </div>
            </div>   

            
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Risk Address 1</label>
                                 <span class="required"> * </span>
                                 <input type="text" name="shop_risk_address1" placeholder="Risk Address 1" class="form-control input-sm" id="shop_risk_address1" ng-model="shop_risk_address1"/>
                                <!--  <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.shop_risk_address1.$dirty" ng-messages="lmshomeDetil.shop_risk_address1.$error" role="alert"> -->
                                    <div id="shop_risk_address1_error" class="required"></div>
                                <!--  </div> -->
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Risk Address 2</label>
                                 <span class="required"> * </span>
                               <input type="text" name="shop_risk_address2" placeholder="Risk Address 2 " class="form-control input-sm" id="shop_risk_address2" ng-model="shop_risk_address2"/>
                               <!--   <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.shop_risk_address2.$dirty" ng-messages="lmshomeDetil.shop_risk_address2.$error" role="alert"> -->
                                    <div id="shop_risk_address2_error" class="required"></div>
                                 <!-- </div> -->
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Area</label>
                        <span class="required"> * </span>
                       <input type="text" name="shop_risk_area" placeholder="Risk Area " class="form-control input-sm" id="shop_risk_area" ng-model="shop_risk_area" />
<!--                         <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.shop_risk_area.$dirty" ng-messages="lmshomeDetil.shop_risk_area.$error" role="alert">
 -->                           <div id="shop_risk_area_error" class="required"></div>
                        </div>
<!--                      </div>
 -->                  </div>
                  
               </div>
               
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk Pincode</label>
                           <span class="required"> * </span>
                           <input type="text" name="shop_risk_pincode" placeholder="Risk Pincode" class="form-control input-sm number-validate" id="shop_risk_pincode" ng-model="shop_risk_pincode" />
<!--                            <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.shop_risk_pincode.$dirty" ng-messages="lmshomeDetil.shop_risk_pincode.$error" role="alert">
 -->                              <div id="shop_risk_pincode_error" class="required"></div>
<!--                            </div>
 -->                        </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk State</label>
                           <span class="required"> * </span>
                         <input type="text" name="shop_risk_state" placeholder="Risk State" class="form-control input-sm" id="shop_risk_state" ng-model="shop_risk_state" />
<!--                            <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.shop_risk_state.$dirty" ng-messages="lmshomeDetil.shop_risk_state.$error" role="alert">
 -->                              <div id="shop_risk_state_error" class="required"></div>
<!--                            </div>
 -->                        </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk City</label>
                           <span class="required"> * </span>
                          <input type="text" name="shop_risk_city" placeholder="Risk City " class="form-control input-sm" id="shop_risk_city" ng-model="shop_risk_city" />
<!--                            <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.shop_risk_city.$dirty" ng-messages="lmshomeDetil.shop_risk_city.$error" role="alert">
 -->                              <div id="shop_risk_city_error" class="required"></div>
                        <!--    </div>
 -->                        </div>
                  </div>
                  
               </div>
               
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Nearest Land Mark</label>
                        <span class="required"> * </span>
                        <input type="text" name="shop_risk_nearest_land_mark" placeholder="Risk Nearest Land Mark" class="form-control input-sm" id="shop_risk_nearest_land_mark" ng-model="shop_risk_nearest_land_mark" />
<!--                         <div ng-if="lmshomeDetil.$submitted || lmshomeDetil.shop_risk_nearest_land_mark.$dirty" ng-messages="lmshomeDetil.shop_risk_nearest_land_mark.$error" role="alert">
 -->                           <div id="shop_risk_nearest_land_mark_error" class="required"></div>
<!--                         </div>
 -->                     </div>
                  </div>
                  
                  <div class="col-md-4">&nbsp;</div>
                  
                  <div class="col-md-4">&nbsp;</div>
                  
               </div>
               
                
   
            
               
          
<div id="claim_detail_div" style="border: 1px solid #CCC; padding: 10px; margin-top: 20px; display: none;" > 

    <div class="row maincontf">
      <div class="col-md-2"> <div class="form-group"> <label>Long Description </label> </div></div>
      <div class="col-md-2"><div class="form-group"><label>Assets Damaged </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Cause Of Loss </label></div></div>
      <div class="col-md-1"><div class="form-group"><label>Insurance In Place </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Policy Year / Loss Year </label></div></div>
      <div class="col-md-1"><div class="form-group"><label>Insurance Claimed </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Loss Of Amount </label></div></div>
   </div>

<?php for( $p = 1; $p < 5;  $p++ ) { ?>


   <div class="row maincontf">
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="shop_long_des<?php echo $p; ?>" placeholder="Long Description" class="form-control input-sm" id="shop_long_des<?php echo $p; ?>" ng-model="shop_long_des<?php echo $p; ?>"  />
         </div>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="shop_assets_damage<?php echo $p;?>" placeholder="Damages" class="form-control input-sm" id="shop_assets_damage<?php echo $p;?>" ng-model="shop_assets_damage<?php echo $p;?>"  />
         </div>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="shop_cause_loss<?php echo $p; ?>" placeholder="Cause of loss" class="form-control input-sm" id="shop_cause_loss<?php echo $p; ?>" ng-model="shop_cause_loss<?php echo $p; ?>"  />
         </div>
      </div>
      
      <div class="col-md-1">
         <div class="form-group">

           <select id="shop_ins_place<?php echo $p; ?>" name="shop_ins_place<?php echo $p; ?>" class="form-control input-sm" ng-model="shop_ins_place<?php echo $p; ?>" >
               <option value="" disabled selected>Select</option>
               <option value="Yes" selected>Yes</option>
               <option value="No">No</option>
            </select> 

      <!--       <input type="text" name="shop_ins_place<?php //echo $p; ?>" placeholder="Insurance" class="form-control input-sm" id="shop_ins_place<?php //echo $p; ?>" ng-model="shop_ins_place<?php //echo $p; ?>"  /> -->
         </div>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="shop_policy_yr<?php echo $p; ?>" placeholder="Policy" class="form-control input-sm" id="shop_policy_yr<?php echo $p; ?>" ng-model="shop_policy_yr<?php echo $p; ?>"  />
         </div>
      </div>
      
      <div class="col-md-1">
         <div class="form-group">
          
           <select id="shop_ins_claim<?php echo $p; ?>" name="shop_ins_claim<?php echo $p; ?>" class="form-control input-sm" ng-model="shop_ins_claim<?php echo $p; ?>" >
               <option value="" disabled selected>Select</option>
               <option value="Yes" selected>Yes</option>
               <option value="No">No</option>
            </select> 
<!-- 
            <input type="text" name="shop_ins_claim<?php // echo $p; ?>" placeholder="Sum Insured" class="form-control input-sm" id="shop_ins_claim<?php // echo $p; ?>" ng-model="shop_ins_claim<?php // echo $p; ?>"  /> -->
         </div>
      </div>
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="shop_loss_amt<?php echo $p; ?>" placeholder="Loss" class="form-control input-sm" id="shop_loss_amt<?php echo $p; ?>" ng-model="shop_loss_amt<?php echo $p; ?>"  />
         </div>
      </div>
   </div>

<?php } ?>   
            
</div> 

               <br><br>

               <input type="submit" class="btn blue btn-default" style="float:right;" value="continue" id="hide" ng-click="shopProductDetail()"   />
               <br><br>

               <!-- car details hidedive end here -->
            </div>
         </form>
      </div>


      <div ng-app="plunker" ng-controller="myCtrl">
         <form name="lmsShopProposal" novalidate >
            <div class="carhide" id="carproposal">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Shop Proposal</span>
                  </div>
               </div>

             
                           <div class="row maincontf">
                           <div class="col-md-4">
                             

                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="shop_pro_policy_sdate"  name="shop_pro_policy_sdate" class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" ng-model="shop_pro_policy_sdate" required data-date-format="dd-mm-yyyy">
                     <div ng-if="lmsShopProposal.$submitted" ng-messages="lmsShopProposal.shop_pro_policy_sdate.$error" role="alert">
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
                                 <input type="text" name="shop_pro_nname" placeholder="Enter Name of Nominee " class="form-control input-sm" id="shop_pro_nname" ng-model="shop_pro_nname" required />
                                 <div ng-if="lmsShopProposal.$submitted || lmsShopProposal.shop_pro_nname.$dirty" ng-messages="lmsShopProposal.shop_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary insured
                                 <span class="required"> * </span></label>
                                 <select id="shop_pro_nomie_relation" name="shop_pro_nomie_relation" class="form-control input-sm" ng-model="shop_pro_nomie_relation"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                  </select>
                                 <div ng-if="lmsShopProposal.$submitted || lmsShopProposal.shop_pro_nomie_relation.$dirty" ng-messages="lmsShopProposal.shop_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="shop_pro_nomie_age" maxlength="2" placeholder="Enter Nominee Age" class="form-control input-sm age-validate" id="shop_pro_nomie_age" ng-model="shop_pro_nomie_age" required/>
                                 <div ng-if="lmsShopProposal.$submitted || lmsShopProposal.shop_pro_nomie_age.$dirty" ng-messages="lmsShopProposal.shop_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Name Of Appointee </label>
                                 <input type="text" name="shop_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="shop_pro_nameofappoint" ng-model="shop_pro_nameofappoint" />
                                  <!-- <div ng-if="lmsShopProposal.$submitted || lmsShopProposal.shop_pro_nameofappoint.$dirty" ng-messages="lmsShopProposal.shop_pro_nameofappoint.$error" role="alert"> -->
                                    <div class="required" id="app_name_error"></div>
                                 <!-- </div> -->
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="shop_pro_appoint_relation" name="shop_pro_appoint_relation" class="form-control input-sm" ng-model="shop_pro_appoint_relation">
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

                        <div class="row ">
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
                           <div ng-if="lmsShopProposal.$submitted || lmsShopProposal.declaration.$dirty" ng-messages="lmsShopProposal.declaration.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Decleration</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>

                        <div class="col-md-12">
                           <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="0" required />
                           <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                           <div ng-if="lmsShopProposal.$submitted || lmsShopProposal.premiumPayment.$dirty" ng-messages="lmsShopProposal.premiumPayment.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Premium Payment Mode</div>
                           </div>
                        </div>
                     </div>
                  </div> 


               <div class="row">
                  <div class="col-md-6">
                <!--      <div class="form-group">
                        <a href="<?php //echo base_url(); ?>qms-car-premium" >
                        <button type="button"  class="btn blue btn-default">Back</button>
                        </a>
                     </div> -->
                  </div>
                  <div class="col-md-6">
                     <div class="pull-right">
                        <div class="form-group">
                           <a href="<?php echo base_url(); ?>qms-car-proposal-view" >
                           <button type="submit"  class="btn blue btn-default send_quote" ng-click="shopProposalDetail()" >Save Lead</button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
                <!-- proposal hide dive end here -->
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
<!-- END CONTENT BODY -->
</div>


<!-- END QUICK SIDEBAR -->
</div>

<script type="text/javascript">
jQuery(document).ready(function() { 
   $("#shop_building_type").on('change', function() { 
      var buildingType = $(this).val();
      //alert(buildingType);
      if(buildingType == 'Kutcha'){
         alert('Kutcha Construction not allowed');
         $('#shop_building_type').val('');
         $('#shop_building_type').focus();
         return false;
      }
   });   



   $("#shop_risk_address_same").on('change', function() { 

      if($(this).is(":checked")) {
         
         $('#shop_risk_address1').val($('#lms_car_add1').val());
         $('#shop_risk_address2').val($('#lms_car_add2').val());
         $('#shop_risk_area').val($('#lms_car_area').val());
         $('#shop_risk_pincode').val($('#lms_car_zip').val());
         $('#shop_risk_state').val($('#lms_car_state').val());
         $('#shop_risk_city').val($('#lms_car_city').val());
         $('#shop_risk_nearest_land_mark').val($('#lms_car_pro_landmark').val());

         $('#shop_risk_address1_error').html('');
         $('#shop_risk_address2_error').html('');
         $('#shop_risk_area_error').html('');
         $('#shop_risk_pincode_error').html('');
         $('#shop_risk_state_error').html('');
         $('#shop_risk_city_error').html('');
         $('#shop_risk_nearest_land_mark_error').html('');

      } else {
         $('#shop_risk_address1').val('');
         $('#shop_risk_address2').val('');
         $('#shop_risk_area').val('');
         $('#shop_risk_pincode').val('');
         $('#shop_risk_state').val('');
         $('#shop_risk_city').val('');
         $('#shop_risk_nearest_land_mark').val('');
      }
      
   });  
  
   $("#shop_risk_address1").on('click', function() { $('#shop_risk_address1_error').html(''); });   
   $("#shop_risk_address2").on('click', function() { $('#shop_risk_address2_error').html(''); });   
   $("#shop_risk_area").on('click', function() { $('#shop_risk_area_error').html(''); });   
   $("#shop_risk_pincode").on('click', function() { $('#shop_risk_pincode_error').html(''); });   
   $("#shop_risk_state").on('click', function() { $('#shop_risk_state_error').html(''); });   
   $("#shop_risk_city").on('click', function() { $('#shop_risk_city_error').html(''); });   
   $("#shop_risk_nearest_land_mark").on('click', function() { $('#shop_risk_nearest_land_mark_error').html(''); });   



   $('#shop_previous_claims').on('change',function(){

      var preClaim = $(this).val();
      if(preClaim == 'yes'){
         $('#claim_detail_div').show();
      } else {
         $('#claim_detail_div').hide();
      }

   }); 



   $('#shop_year_of_construction').on('change',function(){
      var constYear = $(this).val();
      var curDate = new Date();
      var curYear = 2018;
      var cusAge = Math.abs(curYear - constYear);
      if(cusAge > 25 ) {
         alert('Construction Age more than 25 years not allowed');
         $(this).val('');
         $(this).focus();
      }
   });
      



   $("#shop_sum_insured").on('change', function() {
    
      var sumInsured = $(this).val();
      switch(sumInsured){
         case'500000':
            $('#lms_est_premium').val('10000');
            break;
         case'1000000':
            $('#lms_est_premium').val('15000');
            break;
         case'1500000':
            $('#lms_est_premium').val('20000');
            break;
         case'2000000':
            $('#lms_est_premium').val('25000');
            break;
      }

   });   



});
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
$(document).ready(function(){

    var plan=$("#plan-shop").val();
    if(plan!==undefined && plan != ""){
      var planSplit=plan.split(",");
      $('#shop_sum_insured').empty();
      $('#shop_sum_insured').append('<option value="" disabled selected>Select your option</option>');
      for (var i=0;i<planSplit.length;i++){
       $('#shop_sum_insured').append('<option value="'+planSplit[i]+'">'+planSplit[i]+'</option>');
      }
    }
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



