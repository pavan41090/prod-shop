<script src="<?php echo base_url(); ?>assets/js/lms_js/lms_car.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="Health">

<div class="tab-content">
   <div class="tab-pane fade active in" id="car">
      <!--                         <form type="POST" id="carform" name="carform" >
         -->                           
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
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" onkeypress='return restrictAlphabets(event)' placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);" required />
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
                              foreach($businessTypeArray as $tbus )
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

                     <input type="text" name="lms_car_city" id="lms_car_city" placeholder="Enter the City" autocomplete="on" maxlength="25" ng-model="lms_car_city" class="form-control input-sm"   > 
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
              
              <!-- Dertails of lead moved to lead details -->

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
                           </div> 
                           -->
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
                           <div>{{emiObj.lms_cus_emi}}</div>
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
           
            <input type="submit" class="btn blue btn-default" style="float:right;" value="continue" ng-click="customer()"   />
            <br><br>
         </form>
      </div>
      </div>
      
       

      
      
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
                      <label>Include Spouse </label><span class="required"> </span>
                       <input class="Spouse_ship" type="checkbox" name="Spouse_ship" class="Spouse_ship" id="Spouse_ship" value="1" />
                   </div>
                  <div class="answer">
                 <input ng-init="loadSpouseDate()"type="text" id="sship_spouse" name="sship_spouse" class="form-control input-sm custom-date-dob"  data-date-format="dd-mm-yyyy" placeholder="Spouse Date of Birth" ng-model="sship_spouse" >
              </div>
             </div>
          </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Include Children </label><span class="required">  </span>
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" class="noofchildrens"  ng-model='noofchildrens' ng-value='0'  value="0" required> 0 </label>   
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" class="noofchildrens" ng-model='noofchildrens'  ng-value='1'  value="1" required> 1 </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" class="noofchildrens" ng-model='noofchildrens'  ng-value='2'  value="2" required> 2 </label>    
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="noofchildrens" class="noofchildrens" ng-model='noofchildrens'  ng-value='3'  value="3" required> 3 </label>        
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                     <div class="form-group">
                        <label>Income (P.A)
                        <span class="required"> * </span></label>
                        <div class="radio-list">
                           <input type="text" id="sship_income" name="sship_income" class="form-control input-sm number-validate" placeholder="Income (P.A)" ng-model="sship_income" required /> 
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
                        <label>Policy Term (in Years)
                        <span class="required"> * </span></label>  
                        <input list="Policy_Term" placeholder=" Select Policy Term" id="policyterm" name="policyterm" class="form-control input-sm number-validate" ng-model="policyterm" required>
                        <datalist id="Policy_Term">
                         
                           <option value="1"></option>
                           <option value="2"></option>
                           <option value="3"></option>
                        </datalist>
                        <div ng-if="lmsShipProduct.$submitted" ng-messages="lmsShipProduct.policyterm.$error" role="alert">
                           <div ng-message="required" class="required">Please Select your Policy Term</div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount<span class="required"> * </span></label>

                        <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" required>
                        <div ng-if="lmsShipProduct.$submitted" ng-messages="lmsShipProduct.lms_est_premium.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
                     </div>
                  </div>


               </div>

            
                <input type="submit" class="btn blue btn-default" style="float:right;" value="continue" ng-click="shipProductDetail()"   />
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
                     <span class="caption-subject font-dark bold uppercase">HEALTH PROPOSAL SELF</span>
                  </div>
               </div>

            <div class="row maincontf">
              <div class="col-md-4">
                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="sship_pro_policy_start" name="sship_pro_policy_start" class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" ng-model="sship_pro_policy_start" required data-date-format="dd-mm-yyyy">
                     <div>
					 <span ng-if="lmsShipProposal.$submitted" ng-messages="lmsShipProposal.sship_pro_policy_start.$error" role="alert">
                        <div ng-message="required" class="required">Please enter policy start date</div>
						</span>
                     </div>
                  </div>   
               </div>                           
                     
                          
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Height(in CM's)<span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_height"  placeholder="Enter Height(in CM's)" class="form-control input-sm number-validate" id="sship_pro_height" ng-model="sship_pro_height" required />
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_height.$dirty" ng-messages="lmsShipProposal.sship_pro_height.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Height</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Weight(in KG's)<span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_Weight"  placeholder="EnterWeight(in KG's)" class="form-control input-sm number-validate" id="sship_pro_Weight" ng-model="sship_pro_Weight" required />
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_Weight.$dirty" ng-messages="lmsShipProposal.sship_pro_Weight.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Weight</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     

                          <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury, accident or any medical condition?
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
                                 <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured admitted to a hospital or a nursing home or had any test or imaging like CT/MRI scan Sonography or 2D Echo etc. done in the last ten years other than routine health check-up or pre-employment check-up?
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
                                 <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured had any surgery in the last ten years or has surgery ever been recommended or are you awaiting any surgical operation?

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
                                 <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured taken any medication for more than 2 weeks in last 5 years?

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

                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have You Been Hospitalized As An In-Patient In The Last 4 Years?

                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Fibroid" ng-model='sship_pro_Fibroid' ng-value="1" value="1" required/> Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="sship_pro_Fibroid" ng-model='sship_pro_Fibroid' ng-value="0" value="0" required/> No </label>
                                 </div>
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_Fibroid.$dirty" ng-messages="lmsShipProposal.sship_pro_Fibroid.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select</div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured ever had or has a doctor ever said that you have any of the following conditions / diseases: High blood pressure, diabetes or sugar, any heart related ailment, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits?

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
                                 <div class="col-md-10"><label>Has any application for life, Health or critical illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?

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
                  </br>
                        


   <div id="spouse-propsal-details" style="display: none;">
   
      <div class="portlet-title tabbable-line">
         <div class="caption leadtit">
            <i class="icon-globe font-dark hide"></i>
            <span class="caption-subject font-dark bold uppercase">Details of your Spouse</span>
         </div>
      </div>

           <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Salutation </label>
                     <input list="saluteSpouse" id="spouse_salut" placeholder="Salutation" name="spouse_salut" class="form-control input-sm" ng-model="spouse.spouse_salut">
                     <datalist id="saluteSpouse">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse First Name</label>  
                     <input type="text" name="spouse_fname"  placeholder="Spouse First Name"  class="form-control input-sm" id="spouse_fname" ng-model="spouse.spouse_fname" />        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="spouse_lname"  placeholder="Spouse Last Name"   class="form-control input-sm" id="spouse_lname"  ng-model="spouse.spouse_lname"/> 
                  </div>
               </div>
            </div>

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Spouse DOB </label>
                     <input type="text" id="spouse_dob" name="spouse_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="spouse.spouse_dob" data-date-format="dd-mm-yyyy">
                  </div>
               </div>
            </div>      

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury, accident or any medical condition?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_suffered" ng-model='spouse_suffered' ng-value="1" value="1" required/ > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_suffered" ng-model='spouse_suffered' ng-value="0" value="0" required/> No </label>
                  </div>
               
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured admitted to a hospital or a nursing home or had any test or imaging like CT/MRI scan Sonography or 2D Echo etc. done in the last ten years other than routine health check-up or pre-employment check-up?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_diseases" ng-model='spouse_diseases' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_diseases" ng-model='spouse_diseases' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_diseases.$dirty" ng-messages="lmsShipProposal.sship_pro_diseases.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured had any surgery in the last ten years or has surgery ever been recommended or are you awaiting any surgical operation?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_psychiatric" ng-model='spouse_psychiatric' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_psychiatric" ng-model='spouse_psychiatric' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_psychiatric.$dirty" ng-messages="lmsShipProposal.sship_pro_psychiatric.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured taken any medication for more than 2 weeks in last 5 years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_medication" ng-model='spouse_medication' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_medication" ng-model='spouse_medication' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_medication.$dirty" ng-messages="lmsShipProposal.sship_pro_medication.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have You Been Hospitalized As An In-Patient In The Last 4 Years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_fibroid" ng-model='spouse_fibroid' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_fibroid" ng-model='spouse_fibroid' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_Fibroid.$dirty" ng-messages="lmsShipProposal.sship_pro_Fibroid.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured ever had or has a doctor ever said that you have any of the following conditions / diseases: High blood pressure, diabetes or sugar, any heart related ailment, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_cyst" ng-model='spouse_cyst' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_cyst" ng-model='spouse_cyst' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_cyst.$dirty" ng-messages="lmsShipProposal.sship_pro_cyst.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
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
                     <input type="radio" name="spouse_bltest" ng-model='spouse_bltest' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="spouse_bltest" ng-model='spouse_bltest' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_bltest.$dirty" ng-messages="lmsShipProposal.sship_pro_bltest.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>
      </br>

</div>   


<div id="child1-propsal-details" style="display: none;">


      <div class="portlet-title tabbable-line">
         <div class="caption leadtit">
            <i class="icon-globe font-dark hide"></i>
            <span class="caption-subject font-dark bold uppercase">Details of your Child 1</span>
         </div>
      </div>

           <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Salutation </label>
                     <input list="salutechild1" id="child1_salut" placeholder="Salutation" name="child1_salut" class="form-control input-sm" ng-model="child1.child1_salut">
                     <datalist id="salutechild1">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 First Name</label>  
                     <input type="text" name="child1_fname"  placeholder="child1 First Name"  class="form-control input-sm" id="child1_fname" ng-model="child1.child1_fname" />        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="child1_lname"  placeholder="child1 Last Name"   class="form-control input-sm" id="child1_lname"  ng-model="child1.child1_lname"/> 
                  </div>
               </div>
            </div>

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 1 DOB </label>
                     <input type="text" id="child1_dob" name="child1_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="child1.child1_dob" data-date-format="dd-mm-yyyy">
                  </div>
               </div>
            </div>      

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury, accident or any medical condition?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_suffered" ng-model='child1.child1_suffered' ng-value="1" value="1" required/ > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_suffered" ng-model='child1.child1_suffered' ng-value="0" value="0" required/> No </label>
                  </div>
               
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured admitted to a hospital or a nursing home or had any test or imaging like CT/MRI scan Sonography or 2D Echo etc. done in the last ten years other than routine health check-up or pre-employment check-up?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_diseases" ng-model='child1.child1_diseases' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_diseases" ng-model='child1.child1_diseases' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_diseases.$dirty" ng-messages="lmsShipProposal.sship_pro_diseases.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured had any surgery in the last ten years or has surgery ever been recommended or are you awaiting any surgical operation?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_psychiatric" ng-model='child1.child1_psychiatric' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_psychiatric" ng-model='child1.child1_psychiatric' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_psychiatric.$dirty" ng-messages="lmsShipProposal.sship_pro_psychiatric.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured taken any medication for more than 2 weeks in last 5 years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_medication" ng-model='child1.child1_medication' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_medication" ng-model='child1.child1_medication' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_medication.$dirty" ng-messages="lmsShipProposal.sship_pro_medication.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have You Been Hospitalized As An In-Patient In The Last 4 Years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_fibroid" ng-model='child1.child1_fibroid' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_fibroid" ng-model='child1.child1_fibroid' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_Fibroid.$dirty" ng-messages="lmsShipProposal.sship_pro_Fibroid.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured ever had or has a doctor ever said that you have any of the following conditions / diseases: High blood pressure, diabetes or sugar, any heart related ailment, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_cyst" ng-model='child1.child1_cyst' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_cyst" ng-model='child1.child1_cyst' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_cyst.$dirty" ng-messages="lmsShipProposal.sship_pro_cyst.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
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
                     <input type="radio" name="child1_bltest" ng-model='child1.child1_bltest' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child1_bltest" ng-model='child1.child1_bltest' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_bltest.$dirty" ng-messages="lmsShipProposal.sship_pro_bltest.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>
      </br>

</div>   

<div id="child2-propsal-details" style="display: none;">
  
      <div class="portlet-title tabbable-line">
         <div class="caption leadtit">
            <i class="icon-globe font-dark hide"></i>
            <span class="caption-subject font-dark bold uppercase">Details of your Child 2</span>
         </div>
      </div>

           <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Salutation </label>
                     <input list="salutechild2" id="child2_salut" placeholder="Salutation" name="child2_salut" class="form-control input-sm" ng-model="child2.child2_salut">
                     <datalist id="salutechild2">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 First Name</label>  
                     <input type="text" name="child2_fname"  placeholder="child2 First Name"  class="form-control input-sm" id="child2_fname" ng-model="child2.child2_fname" />        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="child2_lname"  placeholder="child2 Last Name"   class="form-control input-sm" id="child2_lname"  ng-model="child2.child2_lname"/> 
                  </div>
               </div>
            </div>

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 2 DOB </label>
                     <input type="text" id="child2_dob" name="child2_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="child2.child2_dob" data-date-format="dd-mm-yyyy">
                  </div>
               </div>
            </div>      

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury, accident or any medical condition?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_suffered" ng-model='child2.child2_suffered' ng-value="1" value="1" required/ > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_suffered" ng-model='child2.child2_suffered' ng-value="0" value="0" required/> No </label>
                  </div>
               
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured admitted to a hospital or a nursing home or had any test or imaging like CT/MRI scan Sonography or 2D Echo etc. done in the last ten years other than routine health check-up or pre-employment check-up?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_diseases" ng-model='child2.child2_diseases' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_diseases" ng-model='child2.child2_diseases' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_diseases.$dirty" ng-messages="lmsShipProposal.sship_pro_diseases.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured had any surgery in the last ten years or has surgery ever been recommended or are you awaiting any surgical operation?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_psychiatric" ng-model='child2.child2_psychiatric' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_psychiatric" ng-model='child2.child2_psychiatric' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_psychiatric.$dirty" ng-messages="lmsShipProposal.sship_pro_psychiatric.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured taken any medication for more than 2 weeks in last 5 years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_medication" ng-model='child2.child2_medication' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_medication" ng-model='child2.child2_medication' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_medication.$dirty" ng-messages="lmsShipProposal.sship_pro_medication.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have You Been Hospitalized As An In-Patient In The Last 4 Years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_fibroid" ng-model='child2.child2_fibroid' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_fibroid" ng-model='child2.child2_fibroid' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_Fibroid.$dirty" ng-messages="lmsShipProposal.sship_pro_Fibroid.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured ever had or has a doctor ever said that you have any of the following conditions / diseases: High blood pressure, diabetes or sugar, any heart related ailment, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_cyst" ng-model='child2.child2_cyst' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_cyst" ng-model='child2.child2_cyst' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_cyst.$dirty" ng-messages="lmsShipProposal.sship_pro_cyst.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
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
                     <input type="radio" name="child2_bltest" ng-model='child2.child2_bltest' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child2_bltest" ng-model='child2.child2_bltest' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_bltest.$dirty" ng-messages="lmsShipProposal.sship_pro_bltest.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>
      </br>

</div>   

<div id="child3-propsal-details" style="display: none;">

      <div class="portlet-title tabbable-line">
         <div class="caption leadtit">
            <i class="icon-globe font-dark hide"></i>
            <span class="caption-subject font-dark bold uppercase">Details of your Child 3</span>
         </div>
      </div>

           <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Salutation </label>
                     <input list="salutechild3" id="child3_salut" placeholder="Salutation" name="child3_salut" class="form-control input-sm" ng-model="child3.child3_salut">
                     <datalist id="salutechild3">
                        <?php 
                           foreach($salutationArray as $salut )
                           {
                               echo '<option value="'.$salut['id'].'"></option>';
                           }
                        ?>   
                     </datalist>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 First Name</label>  
                     <input type="text" name="child3_fname"  placeholder="child3 First Name"  class="form-control input-sm" id="child3_fname" ng-model="child3.child3_fname" />        
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="child3_lname"  placeholder="child3 Last Name"   class="form-control input-sm" id="child3_lname"  ng-model="child3.child3_lname"/> 
                  </div>
               </div>
            </div>

            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Child 3 DOB </label>
                     <input type="text" id="child3_dob" name="child3_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="child3.child3_dob" data-date-format="dd-mm-yyyy">
                  </div>
               </div>
            </div>      

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you suffered from or are you currently suffering from any disease, illness, disability, injury, accident or any medical condition?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_suffered" ng-model='child3.child3_suffered' ng-value="1" value="1" required/ > Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_suffered" ng-model='child3.child3_suffered' ng-value="0" value="0" required/> No </label>
                  </div>
               
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured admitted to a hospital or a nursing home or had any test or imaging like CT/MRI scan Sonography or 2D Echo etc. done in the last ten years other than routine health check-up or pre-employment check-up?
                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_diseases" ng-model='child3.child3_diseases' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_diseases" ng-model='child3.child3_diseases' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_diseases.$dirty" ng-messages="lmsShipProposal.sship_pro_diseases.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured had any surgery in the last ten years or has surgery ever been recommended or are you awaiting any surgical operation?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_psychiatric" ng-model='child3.child3_psychiatric' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_psychiatric" ng-model='child3.child3_psychiatric' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_psychiatric.$dirty" ng-messages="lmsShipProposal.sship_pro_psychiatric.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured taken any medication for more than 2 weeks in last 5 years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_medication" ng-model='child3.child3_medication' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_medication" ng-model='child3.child3_medication' ng-value="0" value="0" required/> No </label>
                  </div>
                 <!--  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_medication.$dirty" ng-messages="lmsShipProposal.sship_pro_medication.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have You Been Hospitalized As An In-Patient In The Last 4 Years?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_fibroid" ng-model='child3.child3_fibroid' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_fibroid" ng-model='child3.child3_fibroid' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_Fibroid.$dirty" ng-messages="lmsShipProposal.sship_pro_Fibroid.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>

         <div class="row maincontf">
            <div class="col-md-12">
               <div class="form-group">
                  <div class="col-md-10"><label>Have you or any other member(s) proposed to be insured ever had or has a doctor ever said that you have any of the following conditions / diseases: High blood pressure, diabetes or sugar, any heart related ailment, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits?

                     <span class="required"> * </span></label>
                  </div>
                  <div class="col-md-2">
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_cyst" ng-model='child3.child3_cyst' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_cyst" ng-model='child3.child3_cyst' ng-value="0" value="0" required/> No </label>
                  </div>
                <!--   <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_cyst.$dirty" ng-messages="lmsShipProposal.sship_pro_cyst.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
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
                     <input type="radio" name="child3_bltest" ng-model='child3.child3_bltest' ng-value="1" value="1" required/> Yes </label>
                     <label class="radio-inline" style="font-size:13px;">
                     <input type="radio" name="child3_bltest" ng-model='child3.child3_bltest' ng-value="0" value="0" required/> No </label>
                  </div>
               <!--    <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_bltest.$dirty" ng-messages="lmsShipProposal.sship_pro_bltest.$error" role="alert">
                     <div ng-message="required" class="required">Please Select</div>
                  </div> -->
               </div>
            </div>
         </div>
      </br>
</div>   



                    <h4 class="propsal-seperator">Family Doctor's Details,if any</h4>
                       <hr> 
                        
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Doctor's Name <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_doc_name" placeholder="Enter doctor Name" class="form-control input-sm" id="sship_pro_doc_name" ng-model="sship_pro_doc_name" required/>
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_name.$dirty" ng-messages="lmsShipProposal.sship_pro_doc_name.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Doctor's Doctor Name</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Doctor's Qualification <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_doc_qualifi" placeholder="Enter Qualification" class="form-control input-sm" id="sship_pro_doc_qualifi" ng-model="sship_pro_doc_qualifi" required/>
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_qualifi.$dirty" ng-messages="lmsShipProposal.sship_pro_doc_qualifi.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Doctor's Qualification</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Doctor's Address <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_doc_addr" placeholder="Enter Address" class="form-control input-sm" id="sship_pro_doc_addr" ng-model="sship_pro_doc_addr" required/>
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_addr.$dirty" ng-messages="lmsShipProposal.sship_pro_doc_addr.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Doctor's Address</div>
                                 </div>
                              </div>

                           </div>
                        </div>
                         <div class="row maincontf">
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Doctor's Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="sship_pro_doc_mobile" name="sship_pro_doc_mobile" class="form-control input-sm number-validate" placeholder="Enter Mobile Number" ng-model="sship_pro_doc_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_doc_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsShipProposal.sship_pro_doc_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Doctor's Mobile Number</div>
                            </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Clinic/Hospital Number <span class="required"> * </span></label>
                            <input type="text" id="sship_pro_hos_num" name="sship_pro_hos_num" class="form-control input-sm" placeholder="Clinic / Hospital Number" ng-model="sship_pro_hos_num" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_hos_num.$dirty" class="required" id="mobilewar" ng-messages="lmsShipProposal.sship_pro_hos_num.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Clinic/Hospital Number </div>
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
                                 <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_nname.$dirty" ng-messages="lmsShipProposal.sship_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary insured
                                 <span class="required"> * </span></label>
                                 <select id="sship_pro_nomie_relation" name="sship_pro_nomie_relation" class="form-control input-sm" ng-model="sship_pro_nomie_relation"  required>
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
                                 <label> Name Of Appointee</label>
                                 <input type="text" name="sship_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="sship_pro_nameofappoint" ng-model="sship_pro_nameofappoint"/>
                                 <!-- <div ng-if="lmsShipProposal.$submitted || lmsShipProposal.sship_pro_nameofappoint.$dirty" ng-messages="lmsShipProposal.sship_pro_nameofappoint.$error" role="alert">
                                    <div ng-message="required" class="required">Please EnterName Of Appointee</div>
                                 </div> -->
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">  
                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="sship_pro_appoint_relation" name="sship_pro_appoint_relation" class="form-control input-sm" ng-model="sship_pro_appoint_relation">
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

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="sship_pro_nomie_age" placeholder="Enter Nominee Age"  class="form-control input-sm age-validate" maxlength="2" id="sship_pro_nomie_age" ng-model="sship_pro_nomie_age" required/>
                                 <div ng-if="lmsShipProposal.$submitted || lmsCiProposal.sship_pro_nomie_age.$dirty" ng-messages="lmsShipProposal.sship_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>

                        </div>

            <h4 class="propsal-seperator">Add New Comment </h4>
               <hr>

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
               <!--       <div class="form-group">
                        <a href="<?php //echo base_url(); ?>qms-car-premium" >
                        <button type="button"  class="btn blue btn-default">Back</button>
                        </a>
                     </div> -->
                  </div>
                  <div class="col-md-6">
                     <div class="pull-right">
                        <div class="form-group">
                           <a href="<?php echo base_url(); ?>qms-car-proposal-view" >
                           <button type="submit"  class="btn blue btn-default send_quote" ng-click="shipProposal()" >Save Lead</button>
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
$(".answer").hide();
$(".Spouse_ship").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
        $("#spouse-propsal-details").show();
    } else {
        $(".answer").hide();
        $("#spouse-propsal-details").hide();
    }
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
   
   //$(".answer").hide();
   $(".Spouse_ship").click(function() {
       if($(this).is(":checked")) {
         $(".answer").show();
        // ("#spouse-propsal-details").show();
   } else {
        $(".answer").hide();
        //$("#spouse-propsal-details").hide();
   }
});


$(".noofchildrens").click(function() {

   var noOfChildredns = $(this).val();
   //alert(noOfChildredns);
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



});   

   //
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