<script src="<?php echo base_url(); ?>assets/js/lms_js/lms-personal-bussiness-js.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="UPP LONG TERM">

<style>
.slidecontainer {
  width: 100%;
}
.required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
}
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
</style>

<!--  id="twowheelData" -->
<?php if(!empty($comment_details)){ ?>
<div class="portlet-body planbox" style="color: #000;">
                  <div>
          <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                   <i class="icon-globe font-dark hide"></i>
                   <span class="caption-subject font-dark bold uppercase">COMMENT HISTORY </span>
                  </div>
                 </div>
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
             <?php } ?>
<form id="lmsUppData" name="lmsCar" novalidate upp:long:term:policy>
<div class="tab-content">
  <div class="col-md-8">
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase"> UPP Long Term Details </span>
               </div>

            </div>

            

            </div>
             <div class="col-md-4">
            <div class="pull-right" style="margin-top: 10px;">
                        <a href="<?php echo base_url(); ?>lms-script-query-twowheel" target="_blank">
                            <button type="button" class="btn blue btn-default"> Script Query </button>
                        </a>
                      </div>
            </div>
   <div class="tab-pane fade active in" id="car">
     <input type="hidden" id="productlead_id" name="productlead_id" ng-model="productlead_id" value="<?php echo $lead_details->lead_id;?>">   
      <div>
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">Lead Details</span>
               </div>
            </div>

             <div class="row maincontf" >
			   
               <div class="col-md-4">

                  <div class="form-group" ng-init = ' lms_car_category = "<?php echo $userDetails->Channel; ?>" '>
                     <label>Category
                     </label>
                     <input list="Category" placeholder="Select Category" class="form-control input-sm" name="lms_car_category" id="lms_car_category" ng-model="lms_car_category" readonly value="<?php echo $userDetails->Channel; ?>">
                     <datalist id="Category">
                      
                        <?php 
                           foreach($CategoryArray as $Category )
                           {
                               echo '<option  value="'.$Category['name'].'" style="font-weight:normal; color:#ff0000;"></option>';
                           }
                           ?>   
                     </datalist>
                     
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_line_of_business = "UPP LONG TERM" '>
                     <label>Line of Business
                     <span class="required"> * </span></label>                          
                     <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="lms_car_line_of_business" id="lms_car_line_of_business" ng-model="lms_car_line_of_business" required readonly="readonly">
                     <datalist id="Business">
                      <option value="UPP LONG TERM"></option>
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_line_of_business.$dirty" ng-messages="lmsCar.lms_car_line_of_business.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Line of Business</div>
                     </div>
                  </div>

               </div>
             <div class="col-md-4">
                  <div class="form-group"n ng-init = ' lms_car_hdfc_card_4digt = "<?php echo $lead_details->HDFC_card_last_4_digits; ?>" '>
                     <label>HDFC Card's Last 4 digits
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" onkeypress='return restrictAlphabets(event)' placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);"  value="<?php echo $lead_details->HDFC_card_last_4_digits; ?>" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_hdfc_card_4digt.$dirty" class="required" id="cardwar" ng-messages="lmsCar.lms_car_hdfc_card_4digt.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>
                     </div>
                  </div>
               </div>
            </div>

              <div class="row maincontf">
               <div class="col-md-4" ng-init = ' lms_aaa_number = "<?php echo $lead_details->aaa_number?>" '>
                  <div class="form-group">
                     <label>AAN Number 
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_aaa_number"   placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" value="<?php echo $lead_details->aaa_number?>" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_aaa_number.$dirty" ng-messages="lmsCar.lms_aaa_number.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter AAN Number</div>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_target_date = "<?php echo ($lead_details->target_date ? $lead_details->target_date : date('d-m-Y')); ?>" '>
                     <label>Target Date
                     </label>  <span class="required"> * </span></label>
                     <input type="text" data-date-format="dd-mm-yyyy" class="form-control input-sm custom-date-aftera"  placeholder="DD-MM-YYYY" name="lms_car_target_date" id="lms_car_target_date" ng-model="lms_car_target_date" value="<?php echo ($lead_details->target_date ? $lead_details->target_date : date('d-m-Y')); ?>" required >
                     <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lms_car_target_date.$error" role="alert" >
                        <div ng-message="required" class="required">Please Select Date</div>
                     </div>
                                     
                  </div>
               </div>

                     <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_hdfc_card_relno = "<?php echo $lead_details->HDFC_card_relationship_no; ?>"'>
                     <label>HDFC Card Relationship No/LOS Number
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_hdfc_card_relno" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="lms_car_hdfc_card_relno" ng-model="lms_car_hdfc_card_relno" value="<?php echo $lead_details->HDFC_card_relationship_no; ?>" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_hdfc_card_relno.$dirty" ng-messages="lmsCar.lms_car_hdfc_card_relno.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_tse_bar_code = "<?php echo $lead_details->TSE_BDR_code; ?>" '>
                     <label>TSE/BDR Code
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_tse_bar_code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="lms_car_tse_bar_code" ng-model="lms_car_tse_bar_code" value="<?php echo $lead_details->TSE_BDR_code; ?>" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tse_bar_code.$dirty" ng-messages="lmsCar.lms_car_tse_bar_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_tl_code = "<?php echo $lead_details->TL_code; ?>" '>
                     <label>TL Code/DSA Code/Team Code</label> 
                     <span class="required"> * </span></label>                  
                     <input type="text" name="lms_car_tl_code" placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="lms_car_tl_code" ng-model="lms_car_tl_code" value="<?php echo $lead_details->TL_code; ?>" required >  
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tl_code.$dirty" ng-messages="lmsCar.lms_car_tl_code.$error" role="alert">
                        <div ng-message="required" class="required"> Please Enter TL Code/DSA Code/Team Code </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_sm_code = "<?php echo $lead_details->SM_code; ?>" '>
                     <label>SM Code </label>  
                     <input type="text" name="lms_car_sm_code" placeholder="SM Code" class="form-control input-sm" id="lms_car_sm_code" ng-model="lms_car_sm_code" value="<?php echo $lead_details->SM_code; ?>" />                 
             
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_bank_verify_id = "<?php echo $lead_details->bank_verifier_id; ?>" '>
                     <label>Bank Verifier ID
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_bank_verify_id" placeholder="Bank Verifier ID"  class="form-control input-sm" id="lms_car_bank_verify_id" ng-model="lms_car_bank_verify_id" value="<?php echo $lead_details->bank_verifier_id; ?>" required /> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_bank_verify_id.$dirty" ng-messages="lmsCar.lms_car_bank_verify_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_tbusins = "<?php echo ($lead_details->business_type ? $lead_details->business_type : ''); ?>" '>
                        <label>Type Of business  <span class="required"> * </span></label>
                        <select name="lms_cus_tbusins" id="lms_cus_tbusins" class="form-control input-sm" ng-model="lms_cus_tbusins" required>
                           <option value="" disabled selected>Select your option</option>
                           <?php foreach($businessArray as $tbus ) { ?>
                                <option value='<?php echo $tbus['name']; ?>' ng-selected='<?php echo ($tbus['name'] == $lead_details->business_type) ? true : false ; ?>'><?php echo $tbus['name']; ?></option>
                              <?php } ?>                                       
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_tbusins.$dirty" ng-messages="lmsCar.lms_cus_tbusins.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Type Of business </div>
                        </div>
                     </div>
                  </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_payment_type = "<?php echo ($lead_details->payment_type ? $lead_details->payment_type : ''); ?>" '>
                     <label>Payment Type
                     <span class="required"> * </span></label>                          
                     <select class="form-control input-sm" name="lms_car_payment_type" id="lms_car_payment_type" ng-model="lms_car_payment_type" required>
                        <option value="" disabled selected>Select your option</option>
                          <?php foreach($PaymentArray as $Payment ) { ?>
                               <option value="<?php echo $Payment['name']; ?>" ng-selected='<?php echo ($Payment['name'] == $lead_details->payment_type) ? true :false; ?>'><?php echo $Payment['name']; ?></option>
                           <?php } ?>   
                     </select> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_payment_type.$dirty" ng-messages="lmsCar.lms_car_payment_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Payment Type</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_priority = "<?php echo ($lead_details->priority ? $lead_details->priority : ''); ?>" '>
                     <label>Priority</label>  
                     <span class="required"> * </span></label>   
                      <select class="form-control input-sm" name="lms_car_priority" id="lms_car_priority" ng-model="lms_car_priority">
                        <option value="" disabled selected>Select your option</option> 
                           <?php foreach($PriorityArray as $Priority ) { ?>
                               <option value="<?php echo $Priority['name']; ?>" ng-selected='<?php echo ($Priority['name'] == $lead_details->priority) ? true : false; ?>'><?php echo $Priority['name']; ?></option>
                           <?php } ?>   
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_priority.$dirty" ng-messages="lmsCar.lms_car_priority.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>
              <?php if($userDetails->Channel == "DT"){ ?>
                <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_campaign_name = "<?php echo $lead_details->sub_channel; ?>" '>
                     <label>Sub Channel</label>  
                     <span class="required"> * </span></label>   
                     <select class="form-control input-sm" name="lms_car_campaign_name" id="lms_car_campaign_name" ng-model="lms_car_campaign_name" >
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
             <?php } ?>
                <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_deatil_lead = "<?php echo $lead_details->lead_details; ?>" '>
                     <label>Details of Lead
                     </label>   <span class="required"> * </span>
                     <input type="text" name="lms_car_deatil_lead"  placeholder="Details of Lead "  class="form-control input-sm" id="lms_car_deatil_lead" ng-model="lms_car_deatil_lead" value="<?php echo $lead_details->lead_details; ?>" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_deatil_lead.$dirty" ng-messages="lmsCar.lms_car_deatil_lead.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Details of Lead</div>
                     </div>
                  </div>
               </div>

               
            </div>
            <?php $arrayPrimIChannel = array('Prime','VRM','Phone Banking','COP'); ?>
            <?php if(in_array($userDetails->Channel, $arrayPrimIChannel)){ ?>
               <div class="row maincontf">
            <div class="form-group">
                  <div class="col-md-4">
                  <label> Dispatch required on Vision plus address</label> &nbsp;
                  <input class="Spouse_ship" type="checkbox" name="vision_address_name" id="vision_address_name" ng-model="vision_address_name" value="1"  />
                      </div>
                        
                  <div class="col-md-8"> &nbsp;</div>
                </div>
            </div>
          <?php } ?>
            <h4 class="propsal-seperator">Customer Details </h4>
            <hr> 

            <div class="row maincontf">
              <?php //require_once 'customer-extra-feilds-form.php'; ?>

<div class="col-md-4" ng-init = ' lms_car_card_holder_name = "<?php echo ($lead_details->cus_card_name ? $lead_details->cus_card_name : ''); ?>" '>
                  <div class="form-group">
                     <label>Card Holder Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_card_holder_name"  placeholder="Card Holder Name"  class="form-control input-sm" id="lms_car_card_holder_name" ng-model="lms_car_card_holder_name" value="" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_card_holder_name.$dirty" ng-messages="lmsCar.lms_car_card_holder_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Card Holder Name</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4" ng-init = ' lms_car_relation_insured = "<?php echo ($lead_details->cus_relation_ishued ? $lead_details->cus_relation_ishued : ''); ?>" ' >

                  <div class="form-group">
                     <label>Relationship with Insured
                     <span class="required"> * </span></label>  
                     <select id="lms_car_relation_insured" name="lms_car_relation_insured" class="form-control input-sm" ng-model="lms_car_relation_insured" required>
                           <option value="" disabled selected>Select your option</option>
                           
                           <?php foreach (arealationshiofunction() as $key => $value) { ?>
                                       <option value="<?php echo $key; ?>" ng-value="<?php echo $key; ?>" ng-selected = '<?php echo ($key == $lead_details->cus_relation_ishued) ? true : false; ?>'><?php echo $value; ?></option>
                                   <?php  } ?>
                        </select>          
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_relation_insured.$dirty" ng-messages="lmsCar.lms_car_relation_insured.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Your option</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_salut = "<?php echo $lead_details->cus_title; ?>" '>
                     <label> Salutation <span class="required"> * </span></label>
                     <input list="salute" id="lms_car_salut" placeholder="Salutation" name="lms_car_salut" class="form-control input-sm" ng-model="lms_car_salut" value="<?php echo $lead_details->cus_title; ?>" required>
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
                  <div class="form-group" ng-init = ' lms_car_fname = "<?php echo $lead_details->first_name; ?>" '>
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_fname"  placeholder="Customer First Name"  class="form-control input-sm" id="lms_car_fname" ng-model="lms_car_fname" value="<?php echo $lead_details->first_name; ?>" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_fname.$dirty" ng-messages="lmsCar.lms_car_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_lname = "<?php echo $lead_details->last_name; ?>" '>
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_lname"  placeholder="Customer Last Name"   class="form-control input-sm" id="lms_car_lname"  ng-model="lms_car_lname" value="<?php echo $lead_details->last_name; ?>" required/> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_lname.$dirty" ng-messages="lmsCar.lms_car_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>


                  <div class="col-md-4">
                    
                     <div class="form-group" ng-init = ' lms_car_dob = "<?php echo $lead_details->date_of_birth; ?>" '>
                        <label>DOB <span class="required"> * </span></label>
                        <input type="text" id="lms_car_dob" name="lms_car_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_dob" value="<?php echo $lead_details->date_of_birth; ?>" customer:dob required data-date-format="dd-mm-yyyy">
                        <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lms_car_dob.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter DOB</div>
                        </div>
                     </div>
                  </div>


               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_pro_marital = "<?php echo ($lead_details->marital_status ? $lead_details->marital_status : ''); ?>" '>
                     <label>Marital status <span class="required"> * </span></label>
                     <select id="lms_car_pro_marital" name="lms_car_pro_marital" class="form-control input-sm" ng-model="lms_car_pro_marital" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Single" ng-selected = '<?php echo ('Single' == $lead_details->marital_status) ? true : false; ?>'>Single</option>
                        <option value="Married" ng-selected = '<?php echo ('Married' == $lead_details->marital_status) ? true : false; ?>'>Married</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_marital.$dirty" ng-messages="lmsCar.lms_car_pro_marital.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Marital status</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4" ng-init = ' lms_car_gender = "<?php echo ($lead_details->cust_gender ? $lead_details->cust_gender : ''); ?>" '>
                  <div class="form-group">
                     <label>Customer Gender
                     </label>  <span class="required"> * </span>
                     <select  class="form-control input-sm" name="lms_car_gender" id="lms_car_gender" ng-model="lms_car_gender"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male" ng-selected='<?php echo ("Male" == $lead_details->cust_gender) ? true : false; ?>'>Male</option>
                        <option value="Female" ng-selected='<?php echo ("Female" == $lead_details->cust_gender) ? true : false; ?>'>Female</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_gender.$dirty" ng-messages="lmsCar.lms_car_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Customer Gender</div>
                     </div>
                  </div>
               </div>               

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_case_id = "<?php echo $lead_details->case_id; ?>" '>
                     <label>Case id
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_case_id"  placeholder="Case id" class="form-control input-sm" id="lms_car_case_id" ng-model="lms_car_case_id" value="<?php echo $lead_details->case_id; ?>" required />
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_case_id.$dirty" ng-messages="lmsCar.lms_car_case_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Case id</div>
                     </div>
                  </div>
               </div>
               
               <div class="col-md-4" ng-init = ' lms_car_add1 = "<?php echo $lead_details->cust_street1?>" '>
                  <div class="form-group">
                     <label>Address 1 <span class="required"> * </span>
                     </label>
                     <textarea class="form-control" placeholder="Address 1" name="lms_car_add1" rows="2" id="lms_car_add1" ng-model="lms_car_add1" ng-value="<?php echo $lead_details->cust_street1?>" required></textarea>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_add1.$dirty" ng-messages="lmsCar.lms_car_add1.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4" ng-init = ' lms_car_add2 = "<?php echo $lead_details->cust_street2?>" '>
                  <div class="form-group">
                     <label>Address 2
                     </label><span class="required"> * </span>
                     <textarea class="form-control"  placeholder="Address 2" name="lms_car_add2" rows="2" id="lms_car_add2" ng-model="lms_car_add2" required></textarea>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_add2.$dirty" ng-messages="lmsCar.lms_car_add2.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 2</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4" ng-init = ' lms_car_add3 = "<?php echo $lead_details->cust_street3?>" '>
                  <div class="form-group">
                     <label>Address 3
                     </label><span class="required"> * </span>
                     <textarea class="form-control"  placeholder="Address 3" name="lms_car_add3" rows="2" id="lms_car_add3" ng-model="lms_car_add3" required></textarea>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_add3.$dirty" ng-messages="lmsCar.lms_car_add3.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 3</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_pan = "<?php echo $lead_details->cust_pan; ?>" '>
                     <label>PAN Card
                     </label> 
                     <input type="text" class="form-control input-sm" value="<?php echo $lead_details->cust_pan; ?>" placeholder="PAN NUMBER" ID="lms_car_pan" ng-model="lms_car_pan" name="lms_car_pan" MaxLength="10" >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_area = "<?php echo $lead_details->cust_area; ?>" '>
                     <label>Area
                     </label><span class="required"> * </span>                          
                     <input type="text" name="lms_car_area"  placeholder="Area" class="form-control input-sm" id="lms_car_area"  ng-model="lms_car_area" value="<?php echo $lead_details->cust_area?>">
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_area.$dirty" ng-messages="lmsCar.lms_car_area.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Area</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_zip = "<?php echo $lead_details->cust_zip; ?>" '>
                     <label>Pincode
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_zip"  MaxLength="6" onkeyup="return postcode_validate(this.value);" placeholder="Pincode" value="<?php echo $lead_details->cust_zip?>" class="form-control input-sm" id="lms_car_zip" ng-model="lms_car_zip" get:State:City required >
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_zip.$dirty" class="required" id="post" ng-messages="lmsCar.lms_car_zip.$error" role="alert">
                        <div ng-message="required"  class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
           <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_state = "<?php echo $lead_details->cust_state; ?>" '>
                  <label>State </label>
                   <input type="text" name="lms_car_state" id="lms_car_state" placeholder="Enter the State" autocomplete="on" maxlength="25" class="form-control input-sm" value="<?php echo $lead_details->cust_state?>" ng-model="lms_car_state" get:City:State>  
                  </div> 
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_city = "<?php echo $lead_details->cust_city; ?>" '>
                     <label> City  </label>
                     <input type="text" name="lms_car_city" id="lms_car_city" placeholder="Enter the City" autocomplete="on" maxlength="25" class="form-control input-sm" value="<?php echo $lead_details->cust_city?>" ng-model="lms_car_city" / > 
                  </div>
               </div>

                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_pro_landmark = "<?php echo $lead_details->cust_landmark; ?>" '>
                        <label> Nearest Land Mark <span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="lms_car_pro_landmark" ng-model="lms_car_pro_landmark" value="<?php echo $lead_details->cust_landmark?>" />
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_landmark.$dirty" ng-messages="lmsCar.lms_car_pro_landmark.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Landmark</div>
                        </div>
                     </div>
                  </div>

              
                  <!-- Replaced mobile number as per user concern by madhesh-->
                    <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_mobile = "<?php echo $lead_details->cust_phone; ?>" '>
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="lms_car_mobile" autocomplete="off" name="lms_car_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="lms_car_mobile" onkeyup="return mobile_validate(this.value);" MaxLength="10" placeholder="Mobile" mobile:Number:Duplicate value="<?php echo $lead_details->cust_phone?>" required /> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsCar.lms_car_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div>
                  </div>
               </div>


                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_pro_emergency = "<?php echo $lead_details->emergency_contact_num; ?>" '>
                        <label>Alternate Contact Number </label>
                        <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" onkeypress='return restrictAlphabets(event)' placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile"  /> 
                     </div>
                 </div>

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_email = "<?php echo $lead_details->cust_email; ?>" '>
                     <label> E-mail <span class="required"> * </span></label>
                     <input type="email" id="lms_car_email" name="lms_car_email" class="form-control input-sm" placeholder="E-mail" ng-model="lms_car_email" onkeyup="return email_validate(this.value);" value="<?php echo $lead_details->cust_email; ?>" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_email.$dirty" class="required" id="emailwar" ng-messages="lmsCar.lms_car_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid E-mail</div>
                     </div>
                  </div>
               </div>

                <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_pro_occupation = "<?php echo ($lead_details->occupation ? $lead_details->occupation : ''); ?>" '>
                     <label>Occupation <span class="required"> * </span></label>
                     <select id="lms_car_pro_occupation" name="lms_car_pro_occupation" class="form-control input-sm" ng-model="lms_car_pro_occupation" required>
                      <option value="" disabled selected>Select your option</option>
                        <?php foreach (occupationfunction() as $key => $value) { ?>
                           <option value="<?php echo $value; ?>" ng-selected='<?php echo ($value == $lead_details->occupation) ? true : false; ?>'><?php echo $value; ?></option>
                       <?php } ?>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_occupation.$dirty" ng-messages="lmsCar.lms_car_pro_occupation.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Occupation</div>
                     </div>
                  </div>
               </div>

                  <div class="col-md-4" ng-init = ' lms_cus_customer = "<?php echo ($lead_details->cus_customer ? $lead_details->cus_customer : ''); ?>" '>
                     <div class="form-group">
                        <label> Right time to contact the customer <span class="required"> * </span></label>
                        <select list="customer" placeholder="contact the customer" name="lms_cus_customer" id="lms_cus_customer" class="form-control input-sm" ng-model="lms_cus_customer" required>
                        <option value="" disabled selected>Select your option</option>                       
                        <?php foreach($CustomerArray as $customer ) { ?>
                               <option value="<?php echo $customer['name']; ?>" ng-selected = '<?php echo ($customer['name'] == $lead_details->cus_customer) ? true : false ; ?>'><?php echo $customer['name']; ?></option>
                           <?php } ?>                                  
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_customer.$dirty" ng-messages="lmsCar.lms_cus_customer.$error" role="alert">
                           <div ng-message="required" class="required">Please Select contact the customer</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_language = "<?php echo $lead_details->cus_language; ?>" '>
                        <label>Language for contact  <span class="required"> * </span></label>
                        <input list="language" placeholder="Language for contact" name="lms_cus_language" id="lms_cus_language" class="form-control input-sm" ng-model="lms_cus_language" value="<?php echo $lead_details->cus_language; ?>" required>
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

               <div class="col-md-4" ng-init = ' lms_cus_sdate = "<?php echo ($lead_details->statement_date ? $lead_details->statement_date : ''); ?>" '>
                     <div class="form-group">
                        <label>Statement Date<span class="required"> * </span></label>
                        <select name="lms_cus_sdate" id="lms_cus_sdate" class="form-control input-sm" ng-model="lms_cus_sdate" >
                           <option value="" disabled selected>Select your option</option>                      
                           <?php foreach($sdateArray as $sdate ) { ?>
                               <option value="<?php echo $sdate['name']; ?>" ng-selected = '<?php echo ($sdate['name'] == $lead_details->statement_date) ? true : false; ?>'><?php echo $sdate['name']; ?></option>
                           <?php } ?>                                         
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_sdate.$dirty" ng-messages="lmsCar.lms_cus_sdate.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Statement Date </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_pfee = "<?php echo ($lead_details->processing_fee ? $lead_details->processing_fee : '0'); ?>" '>
                        <label>Processing Fee Applicable<span class="required"> * </span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee" ng-checked = '<?php echo (($lead_details->processing_fee ? $lead_details->processing_fee : '0') == '0') ? true : false ; ?>' ng-model='lms_cus_pfee' value="0" required> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee" ng-checked = '<?php echo (($lead_details->processing_fee ? $lead_details->processing_fee : '0') == '1') ? true :false; ?>' ng-model='lms_cus_pfee' value="1" required> Yes </label>

                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_pfee.$dirty" ng-messages="lmsCar.lms_cus_pfee.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Processing Fee Applicable</div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_cus_type = "individual" '>
                     <label>Customer Type <span class="required"> </span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" ng-model='lms_car_cus_type' ng-value='"corporate"' value="corporate" disabled="corporate" required> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" autocomplete="off" name="lms_car_cus_type" ng-model='lms_car_cus_type' value="individual" required checked > Individual </label>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_cus_type.$dirty" ng-messages="lmsCar.lms_car_cus_type.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Customer Type</div>
                        </div>
                     </div>
                  </div>
               </div>
               
               </div>
             
               <div class="row maincontf" >
             
                  <div id="emi_applicalble_outer" ng-if='lms_car_payment_type == "Credit Card"'>
                     <div class="col-md-4" ng-init = ' lms_cus_emi = "<?php echo ($lead_details->cus_emi ? $lead_details->cus_emi : ''); ?>" '>
                        <div class="form-group">
                          
                           <label>EMI Applicable <span class="required"> * </span></label>
                           <select name="lms_cus_emi" id="lms_cus_emi" class="form-control input-sm" ng-model="lms_cus_emi" ng-required = 'lms_car_payment_type=="Credit Card"'>
                              <option value="" disabled selected>Select your option</option>
                              <?php foreach($emiArray as $emi ){ ?>
                                 <option ng-value="<?php echo $emi['name']; ?>" ng-selected = '<?php echo ($emi['name'] == $lead_details->cus_emi) ? true : false ?>'> <?php echo $emi['name']; ?></option>
                              <?php } ?>                                           
                           </select>
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_emi.$dirty" ng-messages="lmsCar.lms_cus_emi.$error" role="alert">
                              <div class="required" ng-message="required"> Please Select EMI Applicable </div>
                           </div>
                        </div>
                     </div>
                     <div id="emi_yr_outer" ng-if='(lms_cus_emi == "Yes")'>
                        <div class="col-md-4" ng-init = ' lms_cus_emi_yr = "<?php echo ($lead_details->cus_emi_yr ? $lead_details->cus_emi_yr : ''); ?>" '>
                           <div class="form-group">
                              <label> EMI Years  <span class="required"> * </span></label>
                              <select name="lms_cus_emi_yr" id="lms_cus_emi_yr" class="form-control input-sm" ng-model="lms_cus_emi_yr" ng-required = 'lms_cus_emi=="Yes"' >
                                 <option value="" disabled selected>Select your option</option>
                                 <?php foreach($emiYRArray as $emi ) { ?>
                                    <option value="<?php echo $emi['name']; ?>" ng-selected = '<?php echo ($emi['name'] == $lead_details->cus_emi_yr) ? true : false; ?>'><?php echo $emi['name']; ?></option>
                                 <?php } ?>                                           
                              </select>
                              <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_emi_yr.$dirty" ng-messages="lmsCar.lms_cus_emi_yr.$error" role="alert">
                              <div class="required" ng-message="required"> Please Select EMI Years </div>
                           </div>
                           </div>
                        </div>
                     </div>

                  </div> <!-- id="emi_applicalble" ends here-->
               </div>  
            
            <br><br>
      </div>

       <div>
            <div class=".carhide" id="cardeatail">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">UPP Long Term Details</span>
                  </div>
               </div>

               <div class="row maincontf">
			       <div class="col-md-3">
                  <div class="form-group" ng-init=' lms_upp_type_loan = "<?php echo ($uppData->upp_plan_type ? $uppData->upp_plan_type : ''); ?>" '>
                    <label> Type Of Loan <span class="required"> * </span></label>
                    <select id="lms_upp_type_loan" name="lms_upp_type_loan" class="form-control input-sm" ng-model="lms_upp_type_loan" get:loan:premium required>
                      <option value="" selected="selected">Select Option</option>
                      <option value="1">Personal Loan</option>
                      <option value="2">Bussiness Loan</option>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_upp_type_loan.$dirty" ng-messages="lmsCar.lms_upp_type_loan.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Type Of Loan</div>
                     </div>
                  </div>
               </div>
			   
			   
			   <div class="col-md-3">
            <div class="form-group" ng-init =' lms_upp_loan_amount = "<?php echo $uppData->upp_plan_amount; ?>" '>
                     <label> Loan Amount <span class="required"> * </span></label>
                     <input type="text" placeholder="Loan Amount" class="form-control input-sm" name="lms_upp_loan_amount" id="lms_upp_loan_amount" ng-model="lms_upp_loan_amount" value="<?php echo $lead_details->cust_email; ?>" upp:loan:amount get:loan:premium required>

                     <div ng-if="lmsCar.$submitted || lmsCar.lms_upp_loan_amount.$dirty" class="required" id="emailwar" ng-messages="lmsCar.lms_upp_loan_amount.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Loan Amount</div>
                     </div>
                     <div id="error-loan-Amount" class="required"></div>
                     
                  </div>

               </div>
			   
         <div class="col-md-3">
            <div class="form-group" ng-init=' lms_upp_age = "<?php echo ($uppData->upp_age ? $uppData->upp_age : ''); ?>" '>
                     <label> Age <span class="required"> * </span></label>
                     <input placeholder="Age" class="form-control input-sm" name="lms_upp_age" id="lms_upp_age" get:loan:premium ng-model="lms_upp_age" readonly="readonly" value="" required>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_upp_age.$dirty" ng-messages="lmsCar.lms_upp_age.$error" role="alert" >
                        <div ng-message="required" class="required">Please Enter Age</div>
                     </div>
                     <div class="required" id="error-age-message"></div>
                  </div>
              </div>
                   <div class="col-md-3" ng-init = ' lms_upp_tenure = "<?php echo ($uppData->upp_tenure ? $uppData->upp_tenure : ''); ?>" '>
                     <div class="form-group">
                        <label>Tenure<span class="required"> * </span></label>
                        <select name="lms_upp_tenure" class="form-control input-sm" id="lms_upp_tenure" ng-model="lms_upp_tenure" get:loan:premium required>
                              <option value="" selected="" disabled="">Select Option</option>
                              <?php foreach (getupplongterm() as $key => $value) { ?>
                              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_upp_tenure.$dirty" ng-messages="lmsCar.lms_upp_tenure.$error" class="required" id="lms_upp_tenure" role="alert">
                           <div ng-message="required" class="required">Please Enter Tenure</div>
                        </div>
                     </div>
                  </div>
               </div>
               <br/>
               <div class="row col-md-12">
                 <div id="htmlAppendData">
                   <?php $thirdvalues = $this->uri->segment(2); if(!empty($thirdvalues)){ ?>
                   <table class="table">
                    <?php $upp_all_json_details = json_decode($uppData->upp_all_json_details); ?>
                    <?php

                              if($uppData->upp_plan_type == 1){

                                if($uppData->upp_plan_amount < 100000){
                                $selectedType = 1;
                                } else if($uppData->upp_plan_amount >= 100000){
                                  $selectedType = 2;
                                }

                              }

                              if($uppData->upp_plan_type == 2){
                            
                                if($uppData->upp_plan_amount < 100000){
                                  $selectedType = 1;
                                } else if($uppData->upp_plan_amount >= 100000 && $uppData->upp_plan_amount <= 300000){
                                  $selectedType = 2;
                                } else if($uppData->upp_plan_amount > 300000 && $uppData->upp_plan_amount <= 1500000){
                                  $selectedType = 3;
                                }

                              }

                              $iiinert = personalbussinessworksheet();
                              $bussinessworksh = bussinessworksheet();
			      $temp = getupplongterm();	

                              if($uppData->upp_plan_type == 1){

                                $iwuerrr = $iiinert['cism'][0];
                                $iwuerrr1 = $iiinert['pasi'][0];
                                $iwuerrr2 = $iiinert['ahsi'][0];

                                $criticalloan = $iwuerrr[$selectedType];
                                $pasicalloan = $iwuerrr1[$selectedType];
                                $ahsicalloan = $iwuerrr2[$selectedType];

                              }
                              
                              if($uppData->upp_plan_type == 2){

                                $businners1 = $bussinessworksh['cism'][0];
                                $businners2 = $bussinessworksh['pasi'][0];
                                $businners3 = $bussinessworksh['ahsi'][0];

                                $criticalloan = $businners2[$selectedType];
                                $pasicalloan = $businners2[$selectedType];
                                $ahsicalloan = $businners3[$selectedType];

                              }
				
			      
			      $loantenure = $temp[$uppData->upp_tenure];
                              $criticalPremiumcal = (($upp_all_json_details->criticalrate*$criticalloan)/1000)*1;
                              $personalPremiumcal = (($upp_all_json_details->peraccrate*$pasicalloan)/1000)*1;
                              $credishiledPremiumcal = (($uppData->upp_plan_amount*$upp_all_json_details->creditshildrate)/1000)*1;
                              $hospitalPremiumcal = (($upp_all_json_details->accdentalhosrate*$ahsicalloan)/1000)*1;

                              ?>

    <tr><td>Loan Amount(Rs)</td><td>:</td><td><?php echo $uppData->upp_plan_amount; ?></td></tr>
    <tr><td>Loan Tenure(Yrs)</td><td>:</td><td><?php echo  $loantenure; ?></td></tr>
    <tr><td>PA Sum Insured</td><td>:</td><td><?php echo $pasicalloan; ?></td></tr>
    <tr><td>Accidental Hospitalization Sum Insured</td><td>:</td><td><?php echo $ahsicalloan; ?></td></tr>
    <tr><td>Credit Shield Sum insured</td><td>:</td><td><?php echo $uppData->upp_plan_amount; ?></td></tr>
    <tr><td>Critical Illness Sum insured</td><td>:</td><td><?php echo $criticalloan; ?></td></tr>
    <tr><td>Total Premium</td><td>:</td><td><?php echo $uppData->upp_premioum_amount; ?></td></tr>
    </table>
  <?php } ?>
                 </div>
               </div>

              <h4 class="propsal-seperator">Nominee Details</h4>
                     <hr>
                           <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nname = "<?php echo ($lead_details->nominee_name ? $lead_details->nominee_name : ''); ?>" '>
                                 <label>Name of Nominee for Primary Insured
                                 <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_nname" placeholder="Enter Name of Nominee " class="form-control input-sm" id="pa_pro_nname" ng-model="pa_pro_nname" required />
                                 <div ng-if="lmsCar.$submitted || lmsCar.pa_pro_nname.$dirty" ng-messages="lmsCar.pa_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nomie_relation = "<?php echo ($lead_details->nominee_relationship ? $lead_details->nominee_relationship : ''); ?>" '>
                                 <label>Relationship With Primary insured
                                 <span class="required"> * </span></label>
                                 <select id="pa_pro_nomie_relation" name="pa_pro_nomie_relation" class="form-control input-sm" ng-model="pa_pro_nomie_relation"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                  </select>
                                 <div ng-if="lmsCar.$submitted || lmsCar.pa_pro_nomie_relation.$dirty" ng-messages="lmsCar.pa_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nomie_age = "<?php echo ($lead_details->nominee_age ? $lead_details->nominee_age : ''); ?>" '>
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_nomie_age" placeholder="Enter Nominee Age" maxlength="2" class="form-control input-sm age-validate" id="pa_pro_nomie_age" ng-model="pa_pro_nomie_age" required/>
                                 <div ng-if="lmsCar.$submitted || lmsCar.pa_pro_nomie_age.$dirty" ng-messages="lmsCar.pa_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nameofappoint = "<?php echo ($lead_details->appointee_name ? $lead_details->appointee_name : ''); ?>" '>
                                 <label> Name Of Appointee</label>
                                 <input type="text" name="pa_pro_nameofappoint" ng-required = " pa_pro_nomie_age != '' && pa_pro_nomie_age < 18" placeholder="EnterName Of Appointee" class="form-control input-sm" id="pa_pro_nameofappoint" ng-model="pa_pro_nameofappoint" />
                                  <div ng-if="lmsCar.$submitted || lmsCar.pa_pro_nameofappoint.$dirty" ng-messages="lmsCar.pa_pro_nameofappoint.$error" role="alert">
                                    <div ng-message="required" class="required">Please EnterName Of Appointee</div>
                                 </div> 
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_appoint_relation = "<?php echo ($lead_details->appointee_relationship ? $lead_details->appointee_relationship : ''); ?>" '>
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="pa_pro_appoint_relation" name="pa_pro_appoint_relation" ng-required = " pa_pro_nomie_age != '' && pa_pro_nomie_age < 18" class="form-control input-sm" ng-model="pa_pro_appoint_relation" >
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
                              <div ng-if="lmsCar.$submitted || lmsCar.pa_pro_appoint_relation.$dirty" ng-messages="lmsCar.pa_pro_appoint_relation.$error" role="alert">
                               <div ng-message="required" class="required">Please Select your option</div>
                            </div>
                           </div>
                        </div>

              
              
              <div class="row maincontf">
                <div id="calPremiumData">
                  
                </div>
              </div>
             
            </div>
      </div>
      <div>
            <div class=".carhide" id="carproposal">
            <h4 class="propsal-seperator">Add New Comment </h4>
               <hr>
                          <div class="row lmsresbor">
                              <div class="form-group">
                                <div class="col-md-12">
                                 <!--  <label class="newcoments">Add New Comment </label> -->
                                  
                                  <textarea class="form-control" rows="5" id="lms_car_comment" name="lms_car_comment" ng-model="lms_car_comment" placeholder="Comments"></textarea>
                                  <div style="display: none;" class="required" id="cmt_error">Comment should not be blank</div>
                            
                                </div>
                              </div>
                          </div>

                 <div class="row">&nbsp;</div>
                 <div class="row lmsresbor" >
                     <div class="form-group" ng-init = ' ngdeclaration = "0" '>
                      
                        <div class="col-md-12" >
                           <input type="checkbox" name="ngdeclaration" id="ngdeclaration" ng-model="ngdeclaration" ng-Value="'0'" required />
                           <label> I hereby declare that the customer has a HDFC Bank Relationship – (Bank Account/Credit Card/LOS Number) </label><span class="required">*</span>
                           <div ng-if="lmsCar.$submitted || lmsCar.ngdeclaration.$dirty" ng-messages="lmsCar.ngdeclaration.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Decleration</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>

                        <div class="col-md-12" ng-init = ' premiumPayment = "0" '>
                           <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" ng-value="0" required />
                           <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                           <div ng-if="lmsCar.$submitted || lmsCar.premiumPayment.$dirty" ng-messages="lmsCar.premiumPayment.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Premium Payment Mode</div>
                           </div>
                        </div>
                     </div>
                 </div>

                 <div class="row maincontf" ng-show = "proposalRequestRes">
                  
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Total Premium (including Add-on)</label>
                        <input type="text" name="lms_car_final_pre_amount" placeholder="Final Premioum Amount" class="form-control input-sm" id="lms_car_final_pre_amount" value="" ng-model="lms_car_pro_nameofappoint">
                     </div>
                  </div>
                   <div class="col-md-4">
                     <div class="form-group">
                        <label> Order Number </label>
                        <input type="text" name="lms_car_order_number_proposal" placeholder="EnterName Of Appointee" class="form-control input-sm" id="lms_car_order_number_proposal" value="" ng-model="lms_car_order_number_proposal">
                        
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Quote Number </label>
                        <input type="text" name="lms_car_quote_number_proposal" placeholder="EnterName Of Appointee" class="form-control input-sm" id="lms_car_quote_number_proposal" value="" ng-model="lms_car_quote_number_proposal">
                        
                     </div>
                  </div>

               </div>
               <div class="row maincontf">
                <div id="FcalPremiumData">
                  
                </div>
              </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="pull-right">
                        <div class="form-group">
                          <button type="submit" class="btn blue btn-default send_quote">Save Lead</button>
                        </div>
                     </div>
                  </div>
               </div>

                <!-- proposal hidedive end here -->
            </div>
        
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
<!-- END QUICK SIDEBAR -->
</div>
 </form>
 
<script>
//Ajax call for city and state pre populate 

$(document).ready(function(){
  $( "#lms_car_target_date" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'dd-mm-yy',
                todayHighlight: true,
                autoclose: true,
                minDate: 0
         });
});

$('#lms_car_zip').on('keyup',function(){
   if($(this).val().length>5){
      var webUbrl = $('#web_url').val();

             $.ajax({
              url : webUbrl+'get-pin-code-data',
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
      var URL = webUbrl+'get-state-dis-data';
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
<script type="text/javascript">
$('input[id="lms_two_wheeler_city_registration"]').on('input', function(e) {
  var input = $(e.target);
  if(input.val().length < 3) {
      input.attr('list', '');
  } else {
      input.attr('list', "cityRegistration");
  }
});
</script>
</body>
</html>
