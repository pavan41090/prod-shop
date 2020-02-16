<script src="<?php echo base_url(); ?>assets/js/lms_js/lms-two-wheeler-js.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="Two Wheeler">
<script>
_lmsapp.controller('myController',function($scope){
$scope['lms_cus_emi'] = '<?php echo $lead_details->cus_emi; ?>';
$scope['lead_api_id'] = '<?php echo $lead_details->lead_id; ?>';
$scope['lms_two_wheeler_make'] = '<?php echo $lead_details->manufacturer; ?>';
$scope['lms_two_wheeler_model'] = '<?php echo $lead_details->model_varient; ?>';
$scope['lms_motor_pyp_available'] = '<?php echo $lead_details->hme_previous_claims; ?>';
$scope['lms_car_claim_policy'] = '<?php echo $lead_details->expiring_policy_claim; ?>';
$scope['lms_car_pro_prev_stand_alone'] = '<?php echo $lead_details->prop_mtr_prev_stand_alone; ?>';
$scope['lms_car_pro_prev_depre'] = '1';//'<?php echo $lead_details->prop_mtr_prev_prev_depre; ?>';
});
</script>

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
<script>
/*
 var idvalue = 20;
  $('#lms_car_ncb option').each(function(){
    if($(this).val() > idvalue){
      $(this).remove();
    }
  });
*/
</script>
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
 <form id="twowheelData" name="lmsCar" novalidate>
<div class="tab-content">
  <div class="col-md-8">
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase"> Two Wheeler Details </span>
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

             <div class="row maincontf" ng-init="loadtwowheeldata()">
			   
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
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" onkeypress='return restrictAlphabets(event)' placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);"  value="<?php echo $lead_details->HDFC_card_last_4_digits; ?>" required />
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
                     <input type="text" name="lms_aaa_number"   placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" value="<?php echo $lead_details->aaa_number?>" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_aaa_number.$dirty" ng-messages="lmsCar.lms_aaa_number.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter AAN Number</div>
                     </div>
                  </div>
               </div>

               
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Target Date
                     </label>  <span class="required"> * </span></label>
                     <input type="text" data-date-format="dd-mm-yyyy" class="form-control input-sm custom-date-after"  placeholder="DD-MM-YYYY" name="lms_car_target_date" id="lms_car_target_date" ng-model="lms_car_target_date" value="<?php echo ($lead_details->target_date ? $lead_details->target_date : date('d-m-Y')); ?>" required >
                     <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lms_car_target_date.$error" role="alert" >
                        <div ng-message="required" class="required">Please Select Date</div>
                     </div>
                                     
                  </div>
               </div>

                     <div class="col-md-4">
                  <div class="form-group">
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
                  <div class="form-group">
                     <label>TSE/BDR Code
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_tse_bar_code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="lms_car_tse_bar_code" ng-model="lms_car_tse_bar_code" value="<?php echo $lead_details->TSE_BDR_code; ?>" required> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tse_bar_code.$dirty" ng-messages="lmsCar.lms_car_tse_bar_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>TL Code/DSA Code/Team Code</label> 
                     <span class="required"> * </span></label>                  
                     <input type="text" name="lms_car_tl_code" placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="lms_car_tl_code" ng-model="lms_car_tl_code" value="<?php echo $lead_details->TL_code; ?>" required >  
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tl_code.$dirty" ng-messages="lmsCar.lms_car_tl_code.$error" role="alert">
                        <div ng-message="required" class="required"> Please Enter TL Code/DSA Code/Team Code </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>SM Code </label>  
                     <input type="text" name="lms_car_sm_code" placeholder="SM Code" class="form-control input-sm" id="lms_car_sm_code" ng-model="lms_car_sm_code" value="<?php echo $lead_details->SM_code; ?>" />                 
             
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
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
                <div class="col-md-4" ng-if="channel=='DT'">
                  <div class="form-group">
                     <label>Sub Channel</label>  
                     <span class="required"> * </span></label>   
                     <select class="form-control input-sm" name="lms_car_sub_channel" id="lms_car_sub_channel" ng-model="lms_car_sub_channel" >
                        <option value="" disabled selected>Select your option</option> 
                           <?php 
                           foreach($CampaignArray as $Campaign )
                           {
                               echo '<option value="'.$Campaign['name'].'">'.$Campaign['name'].'</option>';
                           }
                           ?>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_sub_channel.$dirty" ng-messages="lmsCar.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Select Your Campaign Name</div>
                     </div>
                  </div>
               </div>

                <div class="col-md-4">
                  <div class="form-group">
                     <label>Details of Lead
                     </label>   <span class="required"> * </span>
                     <input type="text" name="lms_car_deatil_lead"  placeholder="Details of Lead "   class="form-control input-sm" id="lms_car_deatil_lead" ng-model="lms_car_deatil_lead" value="<?php echo $lead_details->lead_details; ?>" required> 
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
              <?php require_once 'customer-extra-feilds-form.php'; ?>
               <div class="col-md-4">
                  <div class="form-group">
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
                  <div class="form-group">
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_fname"  placeholder="Customer First Name"  class="form-control input-sm" id="lms_car_fname" ng-model="lms_car_fname" value="<?php echo $lead_details->first_name; ?>" required />               
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
                     <input type="text" name="lms_car_lname"  placeholder="Customer Last Name"   class="form-control input-sm" id="lms_car_lname"  ng-model="lms_car_lname" value="<?php echo $lead_details->last_name; ?>" required/> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_lname.$dirty" ng-messages="lmsCar.lms_car_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>


                  <div class="col-md-4">
                    
                     <div class="form-group">
                        <label>DOB <span class="required"> * </span></label>
                        <input type="text" id="lms_car_dob" name="lms_car_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_dob" value="<?php echo $lead_details->date_of_birth; ?>" required data-date-format="dd-mm-yyyy">
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
                  <div class="form-group">
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
                        <div ng-message="required" class="required">Please Enter Address 2</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>PAN Card
                     </label> 
                     <input type="text" class="form-control input-sm" value="<?php echo $lead_details->cust_pan; ?>" placeholder="PAN NUMBER" ID="lms_car_pan" ng-model="lms_car_pan" name="lms_car_pan" MaxLength="10" >
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Area
                     </label><span class="required"> * </span>                          
                     <input type="text" name="lms_car_area"  placeholder="Area" class="form-control input-sm" id="lms_car_area"  ng-model="lms_car_area" value="<?php echo $lead_details->cust_area?>">
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
                     <input type="text" name="lms_car_zip"  MaxLength="6" onkeyup="return postcode_validate(this.value);" placeholder="Pincode" value="<?php echo $lead_details->cust_zip?>" class="form-control input-sm" id="lms_car_zip" ng-model="lms_car_zip" get:State:City required >
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_zip.$dirty" class="required" id="post" ng-messages="lmsCar.lms_car_zip.$error" role="alert">
                        <div ng-message="required"  class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
           <div class="col-md-4">
                  <div class="form-group">
                  <label>State </label>
                   <input type="text" name="lms_car_state" id="lms_car_state" placeholder="Enter the State" autocomplete="on" maxlength="25" class="form-control input-sm" value="<?php echo $lead_details->cust_state?>" ng-model="lms_car_state" get:City:State>  
                  </div> 
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> City  </label>
                     <input type="text" name="lms_car_city" id="lms_car_city" placeholder="Enter the City" autocomplete="on" maxlength="25" class="form-control input-sm" value="<?php echo $lead_details->cust_city?>" ng-model="lms_car_city" / > 
                  </div>
               </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Nearest Land Mark <span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="lms_car_pro_landmark" ng-model="lms_car_pro_landmark" value="<?php echo $lead_details->cust_landmark?>" />
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_landmark.$dirty" ng-messages="lmsCar.lms_car_pro_landmark.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Landmark</div>
                        </div>
                     </div>
                  </div>

              
                  <!-- Replaced mobile number as per user concern by madhesh-->
                    <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="lms_car_mobile" autocomplete="off" name="lms_car_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="lms_car_mobile" onkeyup="return mobile_validate(this.value);" MaxLength="10" placeholder="Mobile" mobile:Number:Duplicate value="<?php echo $lead_details->cust_phone?>" required /> 
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsCar.lms_car_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div>
                  </div>
               </div>


                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Alternate Contact Number </label>
                        <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" onkeypress='return restrictAlphabets(event)' placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile"  /> 
                     </div>
                 </div>

               <div class="col-md-4">
                  <div class="form-group">
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
                     <div class="form-group">
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
                     <div class="form-group">
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
                  <div class="form-group">
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
               
                  <?php /*
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Enhanced Credit Card Limit </label>
                        <input  placeholder="Enhanced Credit Card Limit" id="lms_cus_cardlimt" disabled="lms_cus_cardlimt" name="lms_cus_cardlimt" class="form-control input-sm" ng-model="lms_cus_cardlimt" ng-model="lms_cus_cardlimt"  />
                     </div>
                  </div>
                  */?>
                  <?php /*
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Temp LE <span class="required">  *</span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" disabled ng-model='lms_cus_tle' value="1"  required> Yes </label> <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" checked="true" ng-model='lms_cus_tle' value="0" required> No </label>
                            
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_cus_tle.$dirty" ng-messages="lmsCar.lms_cus_tle.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Temp LE </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  */ ?>
               </div>
             
               <div class="row maincontf" >
             
                  <div id="emi_applicalble_outer" ng-if='lms_car_payment_type=="Credit Card"'>
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
                     <span class="caption-subject font-dark bold uppercase">Two Wheeler Details</span>
                  </div>
               </div>

               <div class="row maincontf">
			       <div class="col-md-4">
                  <div class="form-group">
                     <label> Cover Type <span class="required"> * </span></label>
					            <?php $arrayCoverType = array('1'=>'Comprehensive'); ?>
                           <select id="lms_two_wheeler_cover_type" name="lms_two_wheeler_cover_type" class="form-control input-sm" required>
                        <?php foreach($arrayCoverType as $ct) { ?>
						        s<option value="<?php echo $ct; ?>" <?php if(strtolower($ct) == 'comprehensive') { echo 'ng-selected=lms_two_wheeler_cover_type'; } ?>><?php echo $ct; ?></option>
						      <?php } ?>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_cover_type.$dirty" ng-messages="lmsCar.lms_two_wheeler_cover_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Cover Type</div>
                     </div>
                  </div>
               </div>
			   
			   
			   <div class="col-md-3">
            <div class="form-group">
                     <label> Registration Number <span class="required"> * </span></label>
                     <input placeholder="Registration Number" maxlength=11 class="form-control input-sm" name="lms_two_wheeler_reg_no" id="lms_two_wheeler_reg_no" ng-model="lms_two_wheeler_reg_no" registration:Number style="text-transform: uppercase;" value="<?php echo $lead_details->reg_number; ?>">
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_reg_no.$dirty" ng-messages="lmsCar.lms_two_wheeler_reg_no.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Registration Number</div>
                     </div>
                     
                  </div>

               </div>

               <div class="col-md-1">
                  <div class="form-group" id="loadRegisterNumber">
                  </div>
               </div>
			   
			         <div class="col-md-4">
                  <div class="form-group">
                     <label> Manufacturing Year <span class="required"> * </span></label>
        					 <?php
        					 $startYear = 2019;
        					 ?>
                     <select id="lms_two_wheeler_man_year" ng-model="lms_two_wheeler_man_year" placeholder="Manufacturing Year" name="lms_two_wheeler_man_year" class="form-control input-sm" manufacturing:Year>
                        <option value="" selected>Select Manufacturing Year</option>
                        <?php for($i=$startYear; $i>=($startYear-15); $i--){ ?>
						            <option value="<?php echo $i; ?>" ng-selected = '<?php echo ($i == $lead_details->manufacture_year) ? true : false ?>'><?php echo $i; ?></option>
						            <?php } ?>
                     </select>
                     <?php /* <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_man_year.$dirty" ng-messages="lmsCar.lms_two_wheeler_man_year.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Manufacturing Year</div>
                     </div> */ ?>
                  </div>
               </div>
			   
			   <div class="col-md-4">
                  <div class="form-group">
                     <label> City of Registration <span class="required"> * </span></label>
					 <input list="" class="form-control input-sm" placeholder="City of Registration" name="lms_two_wheeler_city_registration" id="lms_two_wheeler_city_registration" value="<?php echo $lead_details->registration_city; ?>" ng-model="lms_two_wheeler_city_registration">
                 </div>

                 <datalist id="cityRegistration">
                  <?php $citiesNames = $this->db->query("SELECT * FROM `tbl_rta_location` WHERE 1 GROUP BY `rta_location_name` ORDER by rta_location_name"); ?>
                  <?php foreach ($citiesNames->result() as $key => $value) { ?>
                    <option value="<?php echo $value->rta_location_name ?>">
                    <?php } ?>
                 </datalist>

               </div>
			   
			   <div class="col-md-3" ng-init = ' lms_two_wheeler_make = "<?php echo ($lead_details->manufacturer ? $lead_details->manufacturer : ''); ?> " '>
                  <div class="form-group">
                     <label> Manufacturer <span class="required"> * </span></label>
                     <select class="form-control input-sm" ng-init="loadManfacurerData('<?php echo ($lead_details->manufacturer ? $lead_details->manufacturer : ''); ?>')" placeholder="Select Make" name="lms_two_wheeler_make" id="lms_two_wheeler_make" ng-model="lms_two_wheeler_make" change:Make:Dir>
                        <option value="" disabled selected>Select Make</option>
                  </select>
                     <?php /* <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_make.$dirty" ng-messages="lmsCar.lms_two_wheeler_make.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Make</div>
                     </div> */ ?>
                  </div>
               </div>
			           <div class="col-md-1">
                  <div class="form-group" id="loadManufacurer">
                  </div>
               </div>
			   <div class="col-md-4" ng-init = ' lms_two_wheeler_model = "<?php echo ($lead_details->model_varient ? $lead_details->model_varient : ''); ?>" '>
                  <div class="form-group">
                  <label> Model Varient <span class="required"> * </span></label>
					 <select list="modelvariantsList" class="form-control input-sm" placeholder="Select City of Registration" name="lms_two_wheeler_model" id="lms_two_wheeler_model" ng-init="loadModalinfoData('<?php echo $lead_details->model_varient; ?>')" ng-model="lms_two_wheeler_model" change:Model:Dir>
                   <option value="" ng-selected="true">Select Model</option>
                </select>
                     <?php /* <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_model.$dirty" ng-messages="lmsCar.lms_two_wheeler_model.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Modeln</div>
                     </div> */ ?>
                  </div>   
               </div>

			      <div class="col-md-4">
             <div class="form-group">

               <label> Registration Date <span class="required"> * </span> </label>
					 <input class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" name="lms_two_wheeler_registration_date" id="lms_two_wheeler_registration_date" ng-model="lms_two_wheeler_registration_date" value="<?php echo $lead_details->vehicle_register_date; ?>" ng-change="phoneNumberPattern()" registeration:Date>
                      <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_registration_date.$dirty" ng-messages="lmsCar.lms_two_wheeler_registration_date.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Registration Date</div>
                     </div>
<div id="error_reg-man" class="required"></div>
                  </div>

               </div>	
               <?php /* echo ( $lead_details->vehicle_tenure ? $lead_details->vehicle_tenure : '' ); */?>
                   <div class="col-md-4" ng-init = ' lms_car_tenure = "1" '>
                     <div class="form-group">
                        <label>Tenure<span class="required"> * </span></label>
                       
                        <select readonly name="lms_car_tenure" class="form-control input-sm" id="lms_car_tenure" ng-model="lms_car_tenure" required>
                             <!-- <option value="" disabled selected>Select Tenure</option> -->
                              <?php for($l=1;$l>=1;$l--){ ?>
                              <option value="<?php echo $l; ?>" ng-selected = '<?php echo ($l == $lead_details->vehicle_tenure) ? true : false; ?>'><?php echo $l; ?></option>
                            <?php } ?>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tenure.$dirty" ng-messages="lmsCar.lms_car_tenure.$error" class="required" id="lms_car_tenure" role="alert">
                           <div ng-message="required" class="required">Please Enter Tenure</div>
                        </div>
                     </div>
                  </div>
               </div>
			   <div class="row maincontf">
         <div class="col-md-4" ng-init = ' lms_motor_pyp_available = "<?php echo ($lead_details->hme_previous_claims ? $lead_details->hme_previous_claims : 0); ?>" '>
          <div class="form-group">
        <label> Previous policy details available <span class="required"> * </span></label>
			   <div class="radio-list" ng-init="checkPreviousInfo('<?php echo ($lead_details->hme_previous_claims ? $lead_details->hme_previous_claims : '0'); ?>')">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" id="lms_motor_pyp_available" name="lms_motor_pyp_available" ng-model='lms_motor_pyp_available' value='1' pyp:Checker ng-checked="( '1' == '<?php echo $lead_details->hme_previous_claims; ?>') ? true : false" ng-click="checkPreviousInfo(true)" required> Yes </label> 
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" id="lms_motor_pyp_available" name="lms_motor_pyp_available" ng-model='lms_motor_pyp_available' value='0' pyp:Checker ng-checked="( '0' == '<?php echo ($lead_details->hme_previous_claims ? $lead_details->hme_previous_claims : '0'); ?>') ? true : false" ng-click="checkPreviousInfo(false)" required> No </label> 
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_claim_policy.$dirty" ng-messages="lmsCar.lms_car_claim_policy.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Claim in expiring policy</div>
                           </div>
                        </div>
                        </div>
                        </div>
                        <div class="col-md-8" ng-show="isPolicyChecker == '1'">
                    <div class="col-md-6">
                     <div class="form-group">
                        <label>Policy start date <span class="required"> * </span></label>
                        <input id="lsm_car_pyp_starts_date" name="lsm_car_pyp_starts_date" class="form-control input-sm custom-date" placeholder="Policy Start Date" value="<?php echo $lead_details->home_policy_start; ?>" ng-model="lsm_car_pyp_starts_date" date:Picker data-date-format="dd-mm-yyyy" ng-required="isPolicyChecker == '1'">
                       <!-- -->
                        <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lsm_car_pyp_starts_date.$error" role="alert">
                          <!--   -->
                           <div class="required" ng-message="required"> Please Select Policy Expire Date </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label> Policy expiry Date <span class="required"> * </span></label>
                        <input id="lsm_car_pyp_ends_date" name="lsm_car_pyp_ends_date" class="form-control input-sm custom-date" placeholder="Policy Expire Date" ng-model="lsm_car_pyp_ends_date" value="<?php echo $lead_details->home_policy_end; ?>" date:Picker policy:Expire:Date data-date-format="dd-mm-yyyy" ng-required="isPolicyChecker == '1'">
                        <!--   -->
                        <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lsm_car_pyp_ends_date.$error" role="alert">
                          <!--    -->
                           <div class="required" ng-message="required">Please Select Policy Expire Date</div>
                        </div>
                     </div>
                  </div>
                   
                      </div>
			       </div>
               <div class="row maincontf">
                  <div class="col-md-3">
                     <div class="form-group">
                        <label> IDV <span class="required"> * </span> </label>
                        <input type="text" id="lms_car_idv" name="lms_car_idv" ng-model="lms_car_idv"  value="<?php echo $lead_details->IDV_value; ?>" class="form-control input-sm" placeholder="IDV Amount"/>
                     </div>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_idv.$dirty" ng-messages="lmsCar.lms_car_idv.$error" role="alert">
                        <div ng-message="required" class="required">Please IDV</div>
                     </div>
					         

                  </div>
                   <div class="col-md-1">
                  <div class="form-group" id="loadIDVValue">
                  </div>
               </div>
               
                  <div class="col-md-4" ng-init = ' lms_car_claim_policy = "<?php echo ($lead_details->expiring_policy_claim ? $lead_details->expiring_policy_claim : '0'); ?>" '>
                     <div class="form-group">
                        <label>Claim in expiring policy <span class="required">  </span></label>                          
                        <div class="radio-list" ng-init = " checkexpiryPolicyCLaim('<?php echo ($lead_details->expiring_policy_claim ? $lead_details->expiring_policy_claim : '0'); ?>') ">
                           
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_claim_policy" ng-model='lms_car_claim_policy' value="1" ng-disabled="isPolicyChecker == '0'" ng-click = "checkexpiryPolicyCLaim('1')" ng-checked = '<?php echo (($lead_details->expiring_policy_claim ? $lead_details->expiring_policy_claim : '0') == '1') ? true : false; ?>' ng-required = 'isPolicyChecker == "1" '> Yes </label>  

                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_claim_policy" ng-model='lms_car_claim_policy' value="0" ng-disabled="isPolicyChecker == '0'" ng-click = "checkexpiryPolicyCLaim('0')" ng-checked = '<?php echo (($lead_details->expiring_policy_claim ? $lead_details->expiring_policy_claim : '0') == '0') ? true : false; ?>' ng-required = 'isPolicyChecker=="1"'> No </label>
                           
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_claim_policy.$dirty" ng-messages="lmsCar.lms_car_claim_policy.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Claim in expiring policy</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4" ng-init = ' lms_car_ncb = "<?php echo ($lead_details->expiring_policy_NCB ? $lead_details->expiring_policy_NCB : ''); ?>" '>
                     <div class="form-group">
                        <div id="value_disable">
                           <label> NCB in Expiring policy( % ) <span class="required">  </span></label>  
                           <select ng-disabled="isPolicyChecker == '0' || isPolicyClaiinchecker == '0'" name="lms_car_ncb" class="form-control input-sm" id="lms_car_ncb" ng-model="lms_car_ncb" ng-required = 'isPolicyChecker == "1" && ischeckexpiryPolicyCLaim == "0" ' >
                              <option value="" disabled selected>Select your option</option>
                              <?php foreach (ncbVales() as $key => $value) { ?>
                                <option value="<?php echo $key; ?>" ng-selected = '<?php echo ($lead_details->expiring_policy_NCB == $key) ? true :false; ?>'><?php echo $value; ?></option>
                              <?php } ?>
                           </select>
                        </div>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_ncb.$dirty" ng-messages="lmsCar.lms_car_ncb.$error" role="alert">
                              <div ng-message="required" class="required">Please Select NCB in Expiring policy( % )</div>
                           </div>
                     </div>
                  </div>
               </div>
               <div class="row maincontf"><div class="col-md-6"><div class="slidecontainer"> &nbsp; </div></div><div class="col-md-6"></div></div>
               <div class="row maincontf">
                <div class="col-md-4">
                 
                     <div class="form-group">
                        <label>Was the previous policy a Standalone Third party policy? <span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_stand_alone" ng-model='lms_car_pro_prev_stand_alone' ng-value="1" value="1" tp:Policy  ng-checked = '<?php echo (($lead_details->prop_mtr_prev_stand_alone ? $lead_details->prop_mtr_prev_stand_alone : '0') == '1') ? true : false; ?>' required /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_stand_alone" ng-model='lms_car_pro_prev_stand_alone' ng-value="0"  value="0" tp:Policy ng-checked = '<?php echo (($lead_details->prop_mtr_prev_stand_alone ? $lead_details->prop_mtr_prev_stand_alone : '0') == '0') ? true : false; ?>' required /> No </label>
                        </div>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_prev_stand_alone.$dirty" ng-messages="lmsCar.lms_car_pro_prev_stand_alone.$error" class="required" id="premium-validate" role="alert">
                           <div ng-message="required" class="required">Please Select previous policy a Standalone Third party policy</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">

                     <div class="form-group">
                        <label>Depreciation cover included in the previous policy?<span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_depre" id="lms_car_pro_prev_depre_yes" ng-model='lms_car_pro_prev_depre' value="1" dep:Previous:Policy ng-checked = '<?php echo (($lead_details->prop_mtr_prev_prev_depre ? $lead_details->prop_mtr_prev_prev_depre : '0') == '1') ? true : false; ?>' required /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_depre" id="lms_car_pro_prev_depre_no" ng-model='lms_car_pro_prev_depre' value="0" dep:Previous:Policy ng-checked = '<?php echo (($lead_details->prop_mtr_prev_prev_depre ? $lead_details->prop_mtr_prev_prev_depre : '0') == '0') ? true : false; ?>' required /> No </label>
                        </div>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_prev_depre.$dirty" ng-messages="lmsCar.lms_car_pro_prev_depre.$error" class="required" id="premium-validate" role="alert">
                           <div ng-message="required" class="required">Please Select Depreciation cover</div>
                        </div>
                     </div>
                  </div>
              </div>
             
                <div class="row maincontf">

                <div class="col-md-4" ng-init = ' lms_car_valid_license = "<?php echo ( $lead_details->valid_license ? $lead_details->valid_license : '0'); ?>" '>
                     <div class="form-group">
                        <label>Valid License<span class="required"> * </span></label>
                        <div class="radio-list" ng-init="checkvalidStuff(<?php echo ($lead_details->valid_license ? true : false); ?>)" >
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_valid_license" ng-click="checkvalidStuff(true)" ng-model='lms_car_valid_license' value="1" ng-checked = '<?php echo (($lead_details->valid_license ? $lead_details->valid_license : '0') == '1') ? true : false; ?>' required> Yes </label> 

                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_valid_license" ng-click="checkvalidStuff(false)" ng-model='lms_car_valid_license' value="0" ng-checked = '<?php echo (($lead_details->valid_license ? $lead_details->valid_license : '0') == '0') ? true : false; ?>' required> No </label>

                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_valid_license.$dirty" ng-messages="lmsCar.lms_car_valid_license.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Valid License</div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     
                     <div class="form-group" ng-show="isValidChecked == '1'">
                      
                      <label>Is Existing PA Policy<span class="required"> * </span></label>
                        <div class="radio-list" ng-init="checkExistingPAStuff(<?php echo ($lead_details->is_existing_pa_policy ? true : false); ?>)">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_existing_pa_policy" id="lms_car_existing_pa_policy" ng-model='lms_car_existing_pa_policy' value="1" ng-click="checkExistingPAStuff(true)" ng-checked = '<?php echo (($lead_details->is_existing_pa_policy ? $lead_details->is_existing_pa_policy : '0') == '1') ? true : false; ?>' required> Yes </label> 

                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" id="lms_car_existing_pa_policy" name="lms_car_existing_pa_policy" ng-model='lms_car_existing_pa_policy' value="0" ng-click="checkExistingPAStuff(false)" ng-checked = '<?php echo (($lead_details->is_existing_pa_policy ? $lead_details->is_existing_pa_policy : '0') == '0') ? true : false; ?>' required> No </label>
                         </div>
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_existing_pa_policy.$dirty" ng-messages="lmsCar.lms_car_existing_pa_policy.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Is Existing PA Policy</div>
                           </div>
                        
                     </div>
                  </div>
                  <div class="col-md-4">
                   
                     <div class="form-group" ng-show="isValidChecked == '1' && isExistingPAChecked == '1'">
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="checkbox" name="lms_car_valid_license_declaration" ng-model='lms_car_valid_license_declaration' value="1" ng-checked = '<?php echo (($lead_details->declaration_valid_license ? $lead_details->declaration_valid_license : '0') == '1') ? true : false; ?>' > <pre>Declaration to be added for existing PA cover elsewhere, with SI at least of 15 L. </pre> </label>
                           <!-- ng-if="lmsCar.$submitted || lmsCar.lms_car_valid_license_declaration.$dirty" ng-messages="lmsCar.lms_car_valid_license_declaration.$error" role="alert" -->
                           <div >
                            <!--  ng-message="required" Please Select Declaration -->
                              <div class="required"></div>
                           </div>
                        </div>
                     </div>
                     <?php /*
                     <div class="form-group" ng-show="isValidChecked == '1' && isExistingPAChecked == '0'">
                      <label>Do you need Standalone PA policy<span class="required"> * </span></label>
                       <div class="radio-list" ng-init = " checkStandAlonePA('<?php echo ($lead_details->standalone_pa_policy ? $lead_details->standalone_pa_policy : '0'); ?>') ">
                          
                           <label class="radio-inline" style="font-size:12px;" ng-init = ' lms_car_do_u_need_stand_pa = "<?php echo ($lead_details->standalone_pa_policy ? $lead_details->standalone_pa_policy : '0'); ?>"'>
                           <input type="radio" name="lms_car_do_u_need_stand_pa" id="lms_car_do_u_need_stand_pa" ng-model='lms_car_do_u_need_stand_pa' value="1" ng-click = "checkStandAlonePA('1')" ng-checked = '<?php echo (($lead_details->standalone_pa_policy ? $lead_details->standalone_pa_policy : '0') == '1') ? true : false; ?>' required> Yes </label> 

                           <label class="radio-inline" style="font-size:12px;" ng-init = ' lms_car_do_u_need_stand_pa = "<?php echo ($lead_details->standalone_pa_policy ? $lead_details->standalone_pa_policy : '0'); ?>"'>
                           <input type="radio" id="lms_car_do_u_need_stand_pa" name="lms_car_do_u_need_stand_pa" ng-model='lms_car_do_u_need_stand_pa' value="0" ng-click = "checkStandAlonePA('0')" ng-checked = '<?php echo (($lead_details->standalone_pa_policy ? $lead_details->standalone_pa_policy : '0') == '0') ? true : false; ?>' required> No </label>

                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_do_u_need_stand_pa.$dirty" ng-messages="lmsCar.lms_car_do_u_need_stand_pa.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Is Existing PA Policy</div>
                           </div>
                        </div>
                     </div>
                     
                    <div class="form-group" ng-show = ' ischeckStandAlonePA == "1" ' ng-init = ' lms_car_pa_own_driver = "<?php echo ($lead_details->pa_to_own_driver ? $lead_details->pa_to_own_driver : '0'); ?>"' ng-required = ' ischeckStandAlonePA == "1" '>
                        <label>PA To Owner/Driver</label>
                        <select id="lms_car_pa_own_driver" name="lms_car_pa_own_driver" class="form-control input-sm" ng-model="lms_car_pa_own_driver">
                           <option value="" disabled selected>Select your option</option>
                           <option value="1" ng-selected = '<?php echo ('1' == ($lead_details->pa_to_own_driver ? $lead_details->pa_to_own_driver : '0') ? true : false ); ?>'>1 Year</option>
                           <option value="2" ng-selected = '<?php echo ('2' == ($lead_details->pa_to_own_driver ? $lead_details->pa_to_own_driver : '0') ? true : false ); ?>'>5 years</option>
                           
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pa_own_driver.$dirty" ng-messages="lmsCar.lms_car_pa_own_driver.$error" role="alert">
                           <div ng-message="required" class="required">Please Select PA To Owner/Driver</div>
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group" >
                        <label>PA To Owner/Driver</label>
                        <select id="lms_car_pa_own_driver" name="lms_car_pa_own_driver" class="form-control input-sm" ng-model="lms_car_pa_own_driver" ng-readonly = " lms_car_pro_nage > 18" >
                           <option value="" disabled selected>Select your option</option>
                           <option value="1">1 Year</option>
                           <option value="2">5 years</option>
                           
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pa_own_driver.$dirty" ng-messages="lmsCar.lms_car_pa_own_driver.$error" role="alert">
                           <div ng-message="required" class="required">Please Select PA To Owner/Driver</div>
                        </div>
                     </div>
                  </div>
                  */ ?>
                  </div>
                  
               </div>

               <div class="row maincontf">
                <div class="pull-right">
                <div id="loader-check" ng-show="getQuoteLoader"><img src="<?php echo base_url().'assets/images/ajax-loader.gif'; ?>"></div>
                
                <div class="form-group" ng-show="preimumQuoteLoader">
                <button type="button" ng-model=getQuote two:Wheel:Premium:Cal class="btn blue btn-default">Get Quote</button>
                </div>

               </div>
               </div>
              <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount<span class="required"> * </span></label>
                       
                       <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" value="<?php echo $lead_details->lms_premium; ?>" >
                        
                     </div>
                  </div>
                   <div class="col-md-4">
                    <?php $stateStoreRecords = json_decode($quoteData->vehicle_details_req); ?>
                     <div class="form-group">
                      <input type="hidden" id="vehiclerikType" name="vehiclerikType" ng-model="vehiclerikType" value="<?php echo $stateStoreRecords->vehiclerikType;?>">
                      <input type="hidden" id="show_room_value" name="show_room_value" ng-model="show_room_value" value="<?php echo $lead_details->show_room_value;?>">
                      <input type="hidden" id="vehiclefueltype" name="vehiclefueltype" ng-model="vehiclefueltype" value="<?php echo $stateStoreRecords->vehiclefueltype;?>">
                      <input type="hidden" id="vehicleVariant" name="vehicleVariant" ng-model="vehicleVariant" value="<?php echo $stateStoreRecords->vehicleVariant;?>">
                      <input type="hidden" id="vehicleVehicleAge" name="vehicleVehicleAge" ng-model="vehicleVehicleAge" value="<?php echo $stateStoreRecords->vehicleVehicleAge;?>">
                      <input type="hidden" id="vehiclecc" name="vehiclecc" ng-model="vehiclecc" value="<?php echo $stateStoreRecords->vehiclecc;?>">
                      <input type="hidden" id="vehicleSeatingCapacity" name="vehicleSeatingCapacity" ng-model="vehicleSeatingCapacity" value="<?php echo $stateStoreRecords->vehicleSeatingCapacity;?>">
                      <input type="hidden" id="vehiclemodel" name="vehiclemodel" ng-model="vehiclemodel" value="<?php echo $stateStoreRecords->vehiclemodel;?>">
                      <input type="hidden" id="vehicleRegState" name="vehicleRegState" ng-model="vehicleRegState" value="<?php echo $stateStoreRecords->vehicleRegState;?>">
                      <input type="hidden" id="vehiclemaxidv" name="vehiclemaxidv" ng-model="vehiclemaxidv" value="<?php echo $stateStoreRecords->vehiclemaxidv;?>">
                      <input type="hidden" id="vehicleminidv" name="vehicleminidv" ng-model="vehicleminidv" value="<?php echo $stateStoreRecords->vehicleminidv;?>">
                      <input type="hidden" id="vehicleOrdernumber" name="vehicleOrdernumber" ng-model="vehicleOrdernumber" value="<?php echo $quoteData->quote_orderNum;?>">
                      <input type="hidden" id="quote_QuoteNum" name="quote_QuoteNum" ng-model="quote_QuoteNum" value="<?php echo $quoteData->quote_QuoteNum;?>">
                        <div id="quoteInfoDis">
                        <?php
                        $quote_QuoteNum = $quoteData->quote_QuoteNum;
                        if(!empty($quote_QuoteNum)){ ?>
                        <div class="form-group">
                        <label>Quote No:<span class="required"> * </span></label>
                       <input type="text" id="lms_est_QuoteNo" readonly name="lms_est_QuoteNo" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_QuoteNo" value="<?php echo $quote_QuoteNum; ?>" >
                       </div>
                       <?php } ?> 
                     </div>
                     </div>
                  </div>
               </div>
              <div class="row maincontf">
                <div id="calPremiumData">
                  
                </div>
              </div>
              {{isAddDetailsAvailable}}
              <!--c ng-show = 'isAddDetailsAvailable' -->
               <div class="row maincontf" ng-show = 'isAddDetailsAvailable'>
                 <div class="form-group" id="AddDetailsAvailable">
                        <div class="col-md-12">
                          <div class="caption leadtit">
                            <i class="icon-globe font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">AddOn</span>
                          </div>
                           <input class="twoAddon" ng-checked='true' ng-change="addonRecalculateChecker()" type="checkbox" name="twoAddon" id="twoAddon" ng-model="twoAddon" value="1" />
                           <label id="addontext"> &nbsp; </label><span class="required"> &nbsp; </span><span > <i class="fa">&#xf156;<span id="addon_mount">&nbsp;</span> </i> </span>
                        </div>
                       
                     </div>
               </div>
               <br><br>

            </div>
      </div>
      <div>
            <div class=".carhide" id="carproposal">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Two Wheeler Proposal</span>
                  </div>
               </div>

               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Existing insurance company name </label>
                        <input list="exinsure" ng-disabled="isPolicyChecker == '0'" placeholder="Select Existing Insurance Company" id="lms_car_prop_existing_insure" name="lms_car_prop_existing_insure" class="form-control input-sm" ng-model="lms_car_prop_existing_insure" value="<?php echo $lead_details->existing_insure; ?>" ng-required="isPolicyChecker == '1'">
                        <datalist id="exinsure">
                          <?php foreach (exisitingInsCompanies() as $key => $value) {
                            # code...
                            echo '<option value="'.$value.'"></option>';
                          }
                          ?>
                        </datalist>
                       <div ng-if="lmsCar.$submitted || lmsCar.lms_car_prop_existing_insure.$dirty" ng-messages="lmsCar.lms_car_prop_existing_insure.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Existing insurance company name</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Existing policy number</label>

                        <input ng-disabled="isPolicyChecker == '0'" placeholder="Select Existing policy number" id="lms_car_pro_existing_policynum" name="lms_car_pro_existing_policynum" class="form-control input-sm" ng-model="lms_car_pro_existing_policynum" ng-model="lms_car_pro_existing_policynum" value="<?php echo $lead_details->existing_policy_num; ?>" ng-required="isPolicyChecker == '1'">
                       <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_existing_policynum.$dirty" ng-messages="lmsCar.lms_car_pro_existing_policynum.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Existing policy number</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Existing policy expiry date </label>
                        <input readonly type="text" name="lms_car_pro_existing_policy_expiry"  placeholder="DD-MM-YYYY" class="form-control input-sm" id="lms_car_pro_existing_policy_expiry" ng-model="lms_car_pro_existing_policy_expiry" data-date-format="dd-mm-yyyy" value="<?php echo ($lead_details->existing_policy_expiry ? $lead_details->existing_policy_expiry : date('d-m-Y')); ?>"/>
                        
                     </div>
                     
                  </div>
               </div>
               
               <div class="row maincontf">
                  <div class="col-md-4">
                    
                     <div class="form-group">
                     <!-- ng-disabled="isPolicyChecker == '0'"  -->
                        <label>Proposed policy start date <span class="required"> * </span></label>
                        <input ng-if="isPolicyChecker == '0'" type="text" id="lms_car_pro_policy_start" name="lms_car_pro_policy_start" class="form-control input-sm" date:Picker placeholder="DD-MM-YYYY" ng-model="lms_car_pro_policy_start" required data-date-format="dd-mm-yyyy" value="<?php echo ($lead_details->new_policy_start ? $lead_details->new_policy_start : date('d-m-Y')); ?>">

                        <input ng-if="isPolicyChecker == '1'" type="text" id="lms_car_pro_policy_start" name="lms_car_pro_policy_start" class="form-control input-sm c-custom-date" placeholder="DD-MM-YYYY" ng-model="lms_car_pro_policy_start" required data-date-format="dd-mm-yyyy" date:Picker ng-change="checkPolicyStartDate('lms_car_pro_policy_start')" value="<?php echo $lead_details->new_policy_start; ?>">
                        
                        <div>
						          <span ng-if="lmsCar.$submitted" ng-messages="lmsCar.lms_car_pro_policy_start.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter policy start date</div>
						          </span>
                        </div>
                     </div>

                  </div>
                  
               </div>

               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Vehicle engine number is<span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_engine_num"  placeholder="Enter Engine Number" class="form-control input-sm" id="lms_car_pro_engine_num" ng-model="lms_car_pro_engine_num" value="<?php echo $lead_details->prop_mtr_engine_num; ?>" required />
                        
                     </div>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_engine_num.$dirty" ng-messages="lmsCar.lms_car_pro_engine_num.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Vehicle engine number</div>
                        </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Vehicle chasis number is<span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_chasis_num"  placeholder="Enter Chasis Number" class="form-control input-sm" id="lms_car_pro_chasis_num" ng-model="lms_car_pro_chasis_num" value="<?php echo $lead_details->prop_mtr_chasis_num; ?>" required />
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_chasis_num.$dirty" ng-messages="lmsCar.lms_car_pro_chasis_num.$error" role="alert">
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
                           <input type="radio" name="lms_car_pro_financed" ng-model='lms_car_pro_financed' ng-value="1" class="lms_car_pro_financed" value="1" /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_financed" ng-model='lms_car_pro_financed' ng-value="0"  value="0" class="lms_car_pro_financed" /> No </label>
             
                        </div>
                     </div>
                  </div>
               </div>
            

               
               <div class="row maincontf" id="vechicle_finiance_div" ng-show=' lms_car_pro_financed == "1" '>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Financing institution name</label>
                        <input type="text" name="lms_car_pro_fin_ins_name"  placeholder="Financing Institution" class="form-control input-sm" id="lms_car_pro_fin_ins_name" ng-model="lms_car_pro_fin_ins_name" value="<?php echo $lead_details->prop_mtr_fin_ins_name; ?>" />

                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Financing institution city</label>
                        <input type="text" name="lms_car_pro_fin_ins_city"  placeholder="Financing Institution City" class="form-control input-sm" id="lms_car_pro_fin_ins_city" ng-model="lms_car_pro_fin_ins_city" value="<?php echo $lead_details->prop_mtr_fin_ins_city; ?>" />
              
                     </div>
                  </div>                  

               </div>

                <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Nominee Name <span class="required"> * </span></label>
                        <input type="text"  name="lms_car_pro_nname" placeholder="Enter Nominee Name" class="form-control input-sm" id="lms_car_pro_nname" ng-model="lms_car_pro_nname" value="<?php echo $lead_details->nominee_name; ?>" required/>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_nname.$dirty" ng-messages="lmsCar.lms_car_pro_nname.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Nominee Name</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4" ng-init = ' lms_car_pro_nage = "<?php echo ($lead_details->nominee_age ? $lead_details->nominee_age : '')?>" '>
                     <div class="form-group">
                        <label> Nominee Age <span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_nage" placeholder="Enter Nominee Age" class="form-control input-sm age-validate" id="lms_car_pro_nage" ng-model="lms_car_pro_nage" value="<?php echo $lead_details->nominee_age; ?>" dir:Check:Numeric required/>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_nage.$dirty" ng-messages="lmsCar.lms_car_pro_nage.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Nominee Age</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group" ng-init='lms_car_pro_nomie_relation="<?php echo ($lead_details->nominee_relationship ? $lead_details->nominee_relationship : ''); ?>"'>
                        <label>Nominee Relationship
                        <span class="required"> * </span></label>
                        <select id="lms_car_pro_nomie_relation" name="lms_car_pro_nomie_relation" class="form-control input-sm" ng-model="lms_car_pro_nomie_relation"  required>
                           <option value="" disabled selected>Select your option</option>
                           <?php foreach (realationshiofunction() as $key => $value) { ?>
                                       <option ng-value="<?php echo $value; ?>" ng-selected = '<?php echo ($value == $lead_details->nominee_relationship) ? true : false; ?>'><?php echo $value; ?></option>
                                   <?php  } ?>
                        </select>
                        <div ng-messages="lmsCar.$submitted && lmsCar.lms_car_pro_nomie_relation.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Nominee Relationship</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
                  
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> Name Of Appointee(if nominee is minor) </label>
                        <input type="text" name="lms_car_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="lms_car_pro_nameofappoint" value="<?php echo $lead_details->appointee_name; ?>" ng-model="lms_car_pro_nameofappoint" ng-required = " lms_car_pro_nage < 18" ng-readonly = " lms_car_pro_nage > 18">
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_nameofappoint.$dirty" ng-messages="lmsCar.lms_car_pro_nameofappoint.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Nominee Name</div>
                        </div>
                     </div>
                  </div>
                   <div class="col-md-4">
                     <div class="form-group">
                        <label>Appointee Relationship with nominee
                        </label>
                        <select id="lms_car_pro_appoint_relation" name="lms_car_pro_appoint_relation" class="form-control input-sm" ng-model="lms_car_pro_appoint_relation" ng-readonly = " lms_car_pro_nage > 18" ng-required = " lms_car_pro_nage < 18">
                           <option value="" disabled selected>Select your option</option>
                           <?php foreach (realationshiofunction() as $key => $value) { ?>
                                      <option value="<?php echo $value; ?>" ng-selected = '<?php echo ($value == $lead_details->appointee_relationship) ? true : false; ?>'><?php echo $value; ?></option>
                                   <?php } ?>
                        </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_appoint_relation.$dirty" ng-messages="lmsCar.lms_car_pro_appoint_relation.$error" role="alert">
                           <div ng-message="required" class="required">Please Select your option</div>
                        </div>
                     </div>
                  </div>
               </div>

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
                          <?php $urlSecond = $this->uri->segment(2); ?>
                          <?php if(empty($urlSecond)){ ?>
                           <button type="submit" class="btn blue btn-default send_quote" proposal:Calculation ng-show="recalculateProposal">Re Calculate</button>
                           <button type="submit" class="btn blue btn-default send_quote" two:Wheeler:Create ng-show="saveleadButton">Save Lead</button>
                           <button type="button" class="btn blue btn-default send_quote" ng-show="pleasewaitButton">Please Wait..</button>
                           <?php } else { ?>
                            <button type="submit" class="btn blue btn-default send_quote" two:Wheeler:Create>Save Lead</button>
                           <?php } ?>
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