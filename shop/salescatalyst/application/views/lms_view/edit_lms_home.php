<script src="<?php echo base_url(); ?>assets/js/lms_js/lms-app-home-js.js"></script>
<div class="tab-content" ng-init="loadinitfunction()">
  <form name="lmsHome" novalidate id="customerDetails" edit:Lms:Home>
   <div class="tab-pane fade active in" id="car">
    <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
    <input type="hidden" id="product_type" value="<?php echo $editProductType ?>">
    <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $leadId; ?>">
      <div class="row">
         <div class="pull-right">
            <a href="<?php echo base_url(); ?>lms-lead-list">
               <button type="button"  class="btn blue btn-default" > << Back</button>
            </a>
         </div>
      </div>
                
      <div>
        <hr>
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
                     <input list="Category" placeholder="Select Category" class="form-control input-sm" name="lms_car_category" id="lms_car_category" ng-model="lms_car_category" readonly="readonly" value="<?php echo $lead_details->category; ?>">
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
                     <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="lms_car_line_of_business" id="lms_car_line_of_business" ng-model="lms_car_line_of_business" value="<?php echo $lead_details->line_of_business; ?>" required readonly="readonly">
                     <datalist id="Business">
                    
                        <?php 
                           foreach($BusinessArray as $Business )
                           {
                               echo '<option value="'.$Business['name'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_line_of_business.$dirty" ng-messages="lmsHome.lms_car_line_of_business.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Line of Business</div>
                     </div>
                  </div>
               </div>
			   
                 <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Card's Last 4 digits
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_hdfc_card_4digt" maxlength="4" onkeypress='return restrictAlphabets(event)' placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" value="<?php echo $lead_details->HDFC_card_last_4_digits; ?>" onkeyup="return card_validate(this.value);" required />
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_hdfc_card_4digt.$dirty" class="required" id="cardwar" ng-messages="lmsHome.lms_car_hdfc_card_4digt.$error" role="alert">
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
                     <input type="text" name="lms_aaa_number"  placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" value="<?php echo $lead_details->aaa_number; ?>" required />               
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_aaa_number.$dirty" ng-messages="lmsHome.lms_aaa_number.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter AAN Number</div>
                     </div>
                  </div>
               </div>

               
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Target Date
                     </label>  <span class="required"> * </span></label>
                     <input type="text" data-date-format="dd-mm-yyyy" class="form-control input-sm custom-date-after"  placeholder="DD-MM-YYYY" name="lms_car_target_date" id="lms_car_target_date" ng-model="lms_car_target_date" value="<?php echo $lead_details->target_date?>" required>
                     <div ng-if="lmsHome.$submitted" ng-messages="lmsHome.lms_car_target_date.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Date</div>
                     </div>
                                    
                  </div>
               </div>

                 <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Card Relationship No/LOS Number
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_hdfc_card_relno" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="lms_car_hdfc_card_relno" value="<?php echo $lead_details->HDFC_card_relationship_no; ?>" ng-model="lms_car_hdfc_card_relno" required />
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_hdfc_card_relno.$dirty" ng-messages="lmsHome.lms_car_hdfc_card_relno.$error" role="alert">
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
                     <input type="text" name="lms_car_tse_bar_code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="lms_car_tse_bar_code" ng-model="lms_car_tse_bar_code" value="<?php echo $lead_details->TSE_BDR_code?>" required> 
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_tse_bar_code.$dirty" ng-messages="lmsHome.lms_car_tse_bar_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>TL Code/DSA Code/Team Code</label> 
                     <span class="required"> * </span></label>                  
                     <input type="text" name="lms_car_tl_code" placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="lms_car_tl_code" ng-model="lms_car_tl_code" value="<?php echo $lead_details->TL_code; ?>" required >  
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_tl_code.$dirty" ng-messages="lmsHome.lms_car_tl_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>SM Code </label>  
                     <input type="text" name="lms_car_sm_code"  placeholder="SM Code"   class="form-control input-sm" id="lms_car_sm_code" ng-model="lms_car_sm_code" value="<?php echo $lead_details->SM_code; ?>" />                 
             
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Bank Verifier ID
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_bank_verify_id"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="lms_car_bank_verify_id" ng-model="lms_car_bank_verify_id" value="<?php echo $lead_details->bank_verifier_id; ?>" required /> 
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_bank_verify_id.$dirty" ng-messages="lmsHome.lms_car_bank_verify_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>
                     </div>
                  </div>
               </div>


                   <div class="col-md-4">
                  <div class="form-group"><?php echo $lead_details->business_type; ?>
                     <label>Type Of business  <span class="required"> * </span></label> 
                     <select name="lms_cus_tbusins" title="<?php echo $lead_details->business_type; ?>" id="lms_cus_tbusins" class="form-control input-sm" ng-model="lms_cus_tbusins" required>
                        <option value="" selected>Select your option</option>
                        <?php
						
                           foreach($businessArray as $tbus )
                           {
                              echo '<option value="'.$tbus['name'].'" '.(strtolower($tbus['name']) == strtolower($lead_details->business_type) ? 'ng-selected=lms_cus_tbusins' : '').'>'.$tbus['name'].'</option>';
                           }
                           ?>                                       
                     </select>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_cus_tbusins.$dirty" ng-messages="lmsHome.lms_cus_tbusins.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Type Of business </div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Payment Type
                     <span class="required"> * </span></label>                          
                     <select class="form-control input-sm" title="<?php echo $lead_details->payment_type; ?>" name="lms_car_payment_type" id="lms_car_payment_type" ng-model="lms_car_payment_type" required>
                        <option value="" disabled selected>Select your option</option>
                        <?php 
                           foreach($PaymentArray as $Payment )
                           {
                               echo '<option value="'.$Payment['name'].'" '.($Payment['name'] == $lead_details->payment_type ? 'selected' : '').'>'.$Payment['name'].'</option>';
                           }
                           ?>   
                     </select> 
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_payment_type.$dirty" ng-messages="lmsHome.lms_car_payment_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Payment Type</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Priority</label>  
                     <span class="required"> * </span></label>   
                     <select  class="form-control input-sm" title="<?php echo $lead_details->priority; ?>" name="lms_car_sub_channel" id="lms_car_sub_channel" ng-model="lms_car_sub_channel">
                        <option value="" disabled selected>Select your option</option>                    
                        <?php foreach (priorityfunction() as $key => $value) {
                           # code...
                           echo '<option value="'.$value.'" '.($value == $lead_details->priority ? 'selected' : '').'>'.$value.'</option>';

                        } ?>
                     </select>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_sub_channel.$dirty" ng-messages="lmsHome.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>
               <?php if($lead_details->category == 'DT'){ ?>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Sub Channel
                     </label>   <span class="required"> * </span>
                    <select  class="form-control input-sm" title="<?php echo $lead_details->sub_channel; ?>" name="lms_car_campaign_name" id="lms_car_campaign_name" ng-model="lms_car_campaign_name" required>
                        <option value=""  selected>Select your option</option> 
                     <?php 
                           foreach($CampaignArray as $Campaign )
                           {
                               echo '<option value="'.$Campaign['name'].'" '.($Campaign['name'] == $lead_details->sub_channel ? 'selected' : '').'>'.$Campaign['name'].'</option>';
                           }
                           ?>
                     
                           </select>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_campaign_name.$dirty" ng-messages="lmsHome.lms_car_campaign_name.$error" role="alert">
                        <div ng-message="required" class="required">Select Your Campaign Name</div>
                     </div>
                  </div>
               </div>
              <?php } ?>
                 <div class="col-md-4">
                  <div class="form-group">
                     <label>Details of Lead
                     </label>   <span class="required"> * </span>
                     <input type="text" name="lms_car_deatil_lead"  placeholder="Details of Lead "   class="form-control input-sm" id="lms_car_deatil_lead" ng-model="lms_car_deatil_lead" value="<?php echo $lead_details->lead_details; ?>" required> 
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_deatil_lead.$dirty" ng-messages="lmsHome.lms_car_deatil_lead.$error" role="alert">
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
                  <input class="Spouse_ship" type="checkbox" name="vision_address_name" id="vision_address"  ng-model="vision_address_name" value="<?php echo $lead_details->vision_address; ?>"  />
                      </div>
                        
                  <div class="col-md-8"> &nbsp;</div>
                </div>
            </div>
          <?php } ?>
            <h4 class="propsal-seperator">Customer Details </h4>
            <hr> 
            <div class="row maincontf">
              <?php #require_once 'customer-extra-feilds-form.php'; ?>
		<div class="col-md-4" ng-init = ' lms_car_card_holder_name = "<?php echo ($lead_details->cus_card_name ? $lead_details->cus_card_name : ''); ?>" '>
                  <div class="form-group">
                     <label>Card Holder Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_card_holder_name"  placeholder="Card Holder Name"  class="form-control input-sm" id="lms_car_card_holder_name" ng-model="lms_car_card_holder_name" value="" required />               
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_card_holder_name.$dirty" ng-messages="lmsHome.lms_car_card_holder_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Card Holder Name</div>
                     </div>
                  </div>
               </div>

              <div class="col-md-4" >
		                          <div class="form-group" ng-init = ' lms_car_relation_insured = "<?php echo ($lead_details->cus_relation_ishued ? $lead_details->cus_relation_ishued : ''); ?>" '>
                             <label>Relationship with Insured
                             <span class="required"> * </span></label>  
                             <select id="lms_car_relation_insured" name="lms_car_relation_insured" title="<?php echo $lead_details->cus_relation_ishued?>" class="form-control input-sm" ng-model="lms_car_relation_insured" required>
                                   <option value="" disabled selected>Select your option</option>
                                   
                                   <?php foreach (arealationshiofunction() as $key => $value) { ?>
                                               <option value="<?php echo $key; ?>" <?php echo ($key == $lead_details->cus_relation_ishued) ? 'selected' : ''; ?>><?php echo $value; ?></option>                                           <?php  } ?>
                                </select>          
                             <div ng-if="lmsHome.$submitted || lmsHome.lms_car_relation_insured.$dirty" ng-messages="lmsHome.lms_car_relation_insured.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Your option</div>
                             </div>
                          </div>
                       </div>

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
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_salut.$dirty" ng-messages="lmsHome.lms_car_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Salutation</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_fname"  placeholder="Customer First Name"  class="form-control input-sm" id="lms_car_fname" ng-model="lms_car_fname" value="<?php echo $lead_details->first_name; ?>" required />               
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_fname.$dirty" ng-messages="lmsHome.lms_car_fname.$error" role="alert">
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
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_lname.$dirty" ng-messages="lmsHome.lms_car_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>


                  <div class="col-md-4">
                    
                     <div class="form-group">
                        <label>DOB <span class="required"> * </span></label>
                        <input type="text" id="lms_car_dob" name="lms_car_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_dob" required data-date-format="dd-mm-yyyy" value="<?php echo $lead_details->date_of_birth; ?>">
                        <div ng-if="lmsHome.$submitted" ng-messages="lmsHome.lms_car_dob.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter DOB</div>
                        </div>
                     </div>
                  </div>


               <div class="col-md-4">
                  <div class="form-group">
                     <label>Marital status <span class="required"> * </span></label>
                     <select id="lms_car_pro_marital" title="<?php echo $lead_details->marital_status; ?>" name="lms_car_pro_marital" class="form-control input-sm" ng-model="lms_car_pro_marital"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Single" <?php echo ( strtolower($lead_details->marital_status) == 'single' ? 'selected' : ''); ?> >Single</option>
                        <option value="Married" <?php echo ( strtolower($lead_details->marital_status) == 'married' ? 'selected' : ''); ?>>Married</option>
                     </select>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_pro_marital.$dirty" ng-messages="lmsHome.lms_car_pro_marital.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Marital status</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Gender
                     </label>  <span class="required"> * </span>
                     <select  class="form-control input-sm" title="<?php echo $lead_details->cust_gender; ?>" name="lms_car_gender" id="lms_car_gender" ng-model="lms_car_gender" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male" <?php echo ( strtolower($lead_details->cust_gender) == 'male' ? 'selected' : ''); ?>>Male</option>
                        <option value="Female" <?php echo ( strtolower($lead_details->cust_gender) == 'female' ? 'selected' : ''); ?>>Female</option>
                     </select>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_gender.$dirty" ng-messages="lmsHome.lms_car_gender.$error" role="alert">
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
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_case_id.$dirty" ng-messages="lmsHome.lms_car_case_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Case id</div>
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
                     <label>Address 1 <span class="required"> * </span>
                     </label>  
                     <textarea class="form-control" title="<?php echo $lead_details->cust_street1; ?>" placeholder="Address 1" name="lms_car_add1" rows="2" id="lms_car_add1" ng-model="lms_car_add1" required><?php echo $lead_details->cust_street1; ?></textarea>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_add1.$dirty" ng-messages="lmsHome.lms_car_add1.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Address 2
                     </label><span class="required"> * </span>
                     <textarea class="form-control" title="<?php echo $lead_details->cust_street2; ?>" placeholder="Address 2" name="lms_car_add2" rows="2" id="lms_car_add2" ng-model="lms_car_add2" required><?php echo $lead_details->cust_street2; ?></textarea>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_add2.$dirty" ng-messages="lmsHome.lms_car_add2.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 2</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4" ng-init=' lms_car_add3 = "<?php echo $lead_details->cust_street3; ?>" '>
                  <div class="form-group">
                     <label>Address 3
                     </label><span class="required"> * </span>
                     <textarea class="form-control" title="<?php echo $lead_details->cust_street3; ?>" placeholder="Address 3" name="lms_car_add3" rows="2" id="lms_car_add3" ng-model="lms_car_add3" required></textarea>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_add3.$dirty" ng-messages="lmsHome.lms_car_add3.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 3</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Area
                     </label><span class="required"> * </span>                          
                     <input type="text" name="lms_car_area" placeholder="Area" value="<?php echo $lead_details->cust_area; ?>" class="form-control input-sm" id="lms_car_area"  ng-model="lms_car_area">
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_area.$dirty" ng-messages="lmsHome.lms_car_area.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Area</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Pincode
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_zip" value="<?php echo $lead_details->cust_zip; ?>" pincode:Validation MaxLength="6" ng-pattern="/^\d{0,9}(\.\d{1,9})?$/" onkeyup="return postcode_validate(this.value);" placeholder="Pincode "  class="form-control input-sm" id="lms_car_zip" ng-model="lms_car_zip" required >
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_zip.$dirty" class="required" id="post" ng-messages="lmsHome.lms_car_zip.$error" role="alert">
                        <div ng-message="required"  class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> State </label>
                     <input list="state" id="lms_car_state" placeholder="Enter the  State" value="<?php echo $lead_details->cust_state; ?>" autocomplete="off" name="lms_car_state" class="form-control input-sm" ng-model="lms_car_state" >
					 <div ng-if="lmsHome.$submitted || lmsHome.lms_car_state.$dirty" class="required" id="post" ng-messages="lmsHome.lms_car_state.$error" role="alert">
                        <div ng-message="required"  class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> City </label>

                     <input type="text" name="lms_car_city" id="lms_car_city" placeholder="Enter the City" autocomplete="on" maxlength="25" class="form-control input-sm" ng-model="lms_car_city" value="<?php echo $lead_details->cust_city; ?>">
					 
					 <div ng-if="lmsHome.$submitted || lmsHome.lms_car_city.$dirty" class="required" id="post" ng-messages="lmsHome.lms_car_city.$error" role="alert">
                        <div ng-message="required"  class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
             <!-- details of lead moved to lead details -->

             <div class="col-md-4">
                     <div class="form-group">
                        <label> Nearest Land Mark <span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="lms_car_pro_landmark" ng-model="lms_car_pro_landmark" value="<?php echo $lead_details->cust_landmark; ?>"/>
                        <div ng-if="lmsHome.$submitted || lmsHome.lms_car_pro_landmark.$dirty" ng-messages="lmsHome.lms_car_pro_landmark.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Landmark</div>
                        </div>
                     </div>
                  </div>
                  

                  <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="lms_car_mobile" autocomplete="off" name="lms_car_mobile" class="form-control input-sm" placeholder="Mobile Number" onkeypress='return restrictAlphabets(event)' ng-model="lms_car_mobile" MaxLength="10" onkeyup="return mobile_validate(this.value);" value="<?php echo $lead_details->cust_phone; ?>" placeholder="Mobile" mobile:Number:Duplicate required /> 
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsHome.lms_car_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div>
                  </div>
               </div>
                  <div class="col-md-4">

                     <div class="form-group">
                        <label>Alternate Contact Number </label>
                        <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeypress='return restrictAlphabets(event)' value="<?php echo $lead_details->emergency_contact_num; ?>" onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile"  /> 
                       
                     </div>
          
                 </div>

                 <div class="col-md-4">
                  <div class="form-group">
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="email" id="lms_car_email" name="lms_car_email" class="form-control input-sm" placeholder="E-mail" ng-model="lms_car_email" onkeyup="return email_validate(this.value);" value="<?php echo $lead_details->cust_email; ?>" required> 
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_email.$dirty" class="required" id="emailwar" ng-messages="lmsHome.lms_car_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid E-mail</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                     <div class="form-group">
                        <label>GSTIN
                       
                        </label>
                        <input type="text" name="lms_car_pro_gstn" placeholder="Enter GSTIN" class="form-control input-sm" id="lms_car_pro_gstn" disabled="lms_car_pro_gstn" ng-model="lms_car_pro_gstn" value="<?php echo $lead_details->GSTIN; ?>">
                       
                     </div>
                  </div>
               
              

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Occupation <span class="required"> * </span></label>
                     <select id="lms_car_pro_occupation" title="<?php echo $lead_details->occupation; ?>" name="lms_car_pro_occupation" class="form-control input-sm" ng-model="lms_car_pro_occupation"  required>
                        <option value="" disabled selected>Select your option</option>
                        <?php foreach (occupationfunction() as $key => $value) {
                           # code...
                           echo '<option value="'.$value.'" '.($value == $lead_details->occupation ? 'selected' : '').'>'.$value.'</option>';
                        }
                        ?>
                     </select>
                     <div ng-if="lmsHome.$submitted || lmsHome.lms_car_pro_occupation.$dirty" ng-messages="lmsHome.lms_car_pro_occupation.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Occupation</div>
                     </div>
                  </div>
               </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Right time to contact the customer <span class="required"> * </span></label>
                        <select list="customer" placeholder="contact the customer" title="<?php echo $lead_details->cus_customer; ?>" name="lms_cus_customer" id="lms_cus_customer" class="form-control input-sm" ng-model="lms_cus_customer" required>
                        <option value="" disabled selected>Select your option</option>                       
                        <?php 
                           foreach($CustomerArray as $customer )
                           {
                               echo '<option value="'.$customer['name'].'" '.($customer['name'] == $lead_details->cus_customer ? 'selected' : '').'>'.$customer['name'].'</option>';
                           }
                           ?>                                  
                        </select>
                        <div ng-if="lmsHome.$submitted || lmsHome.lms_cus_customer.$dirty" ng-messages="lmsHome.lms_cus_customer.$error" role="alert">
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
                        <div ng-if="lmsHome.$submitted || lmsHome.lms_cus_language.$dirty" ng-messages="lmsHome.lms_cus_language.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Language for contact</div>
                        </div>
                     </div>
                  </div>

                 
                   <div class="col-md-4">
                     <div class="form-group">
                        <label>Statement Date<span class="required"> * </span></label>
                        <select name="lms_cus_sdate" title="<?php echo $lead_details->statement_date; ?>" id="lms_cus_sdate" class="form-control input-sm" ng-model="lms_cus_sdate" >
                           <option value="" disabled selected>Select your option</option>                      
                           <?php 
                           foreach($sdateArray as $sdate )
                           {
                               echo '<option value="'.$sdate['name'].'" '.($sdate['name'] == $lead_details->statement_date ? 'selected' : '').'>'.$sdate['name'].'</option>';
                           }
                           ?>                                         
                        </select>
                        <div ng-if="lmsHome.$submitted || lmsHome.lms_cus_sdate.$dirty" ng-messages="lmsHome.lms_cus_sdate.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Statement Date </div>
                        </div>
                     </div>
                  </div>
              
               
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Processing Fee Applicable<span class="required"> * </span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee" id="processing_fee_no" title="<?php echo $lead_details->processing_fee; ?>" <?php echo ($lead_details->processing_fee == '0' ? 'checked' : ''); ?> class="processing_fee" value="0"> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee" id="processing_fee_yes" title="<?php echo $lead_details->processing_fee; ?>" <?php echo ($lead_details->processing_fee == '1' ? 'checked' : ''); ?> value="1"> Yes </label>  
                        
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Enhanced Credit Card Limit </label>
                        <input  placeholder="Enhanced Credit Card Limit" id="lms_cus_cardlimt" disabled="lms_cus_cardlimt" name="lms_cus_cardlimt" class="form-control input-sm" ng-model="lms_cus_cardlimt" ng-model="lms_cus_cardlimt" value="<?php echo $lead_details->cus_cardlimt; ?>" />
                           
                     </div>
                  </div>

                 <div class="col-md-4">
                     <div class="form-group">
                        <label> Temp LE <span class="required"> * </span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" id="lms_cus_tle_no" value="0" <?php echo ($lead_details->temp_LE == '0' ? 'checked' : ''); ?>> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" disabled="lms_cus_tle" id="lms_cus_tle_yes"  value="1" <?php echo ($lead_details->temp_LE == '1' ? 'checked' : ''); ?> required> Yes </label>  
                        </div>
                     </div>
                  </div>

                   <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Type <span class="required"> </span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" value="corporate" disabled="corporate" id="lms_car_cus_type_corporate"> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" id="lms_car_cus_type_individual" checked required value="individual"> Individual </label>
                        <div ng-if="lmsHome.$submitted || lmsHome.lms_car_cus_type.$dirty" ng-messages="lmsHome.lms_car_cus_type.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Customer Type</div>
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
                           <select name="lms_cus_emi" title="<?php echo $lead_details->cus_emi; ?>" id="lms_cus_emi" class="form-control input-sm" onChange="onEmiChange()" required >
                              <option value="" selected>Select your option</option>
                              <?php 
                              foreach($emiArray as $emi )
                              {
                                 echo '<option value="'.$emi['name'].'" '.($emi['name'] == $lead_details->cus_emi ? 'selected' : '').'>'.$emi['name'].'</option>';
                              }
                              ?>                                           
                           </select>

                           <div ng-if="lmsHome.$submitted || lmsHome.lms_cus_emi.$dirty" ng-messages="lmsHome.lms_cus_emi.$error" role="alert">
                              <div ng-message="required" class="required">Select your option </div>
                           </div>
                        </div>
                     </div>
					 
                     <div id="emi_yr_outer" style="display:<?php echo (strtolower($lead_details->cus_emi) == 'yes' ? 'block' : 'none'); ?>">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>EMI Years  <span class="required"> * </span></label>
                              <select name="lms_cus_emi_yr" title="<?php echo $lead_details->cus_emi_yr; ?>" id="lms_cus_emi_yr" class="form-control input-sm" required >

                                 <option value="" disabled selected>Select your option</option>
                                 <?php 
                                 foreach($emiYRArray as $emi )
                                 {
                                    echo '<option value="'.$emi['name'].'" '.($emi['name'] == $lead_details->cus_emi_yr ? 'selected' : '').'>'.$emi['name'].'</option>';
                                 }
                                 ?>                                           
                              </select>
                              <div ng-if="lmsHome.$submitted || lmsHome.lms_cus_emi_yr.$dirty" ng-messages="lmsHome.lms_cus_emi_yr.$error" role="alert">
                              <div ng-message="required" class="required">Select your option </div>
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
                     <span class="caption-subject font-dark bold uppercase">Home Details</span>
                  </div>
               </div>
              <div class="row maincontf">
               <div class="col-md-4">
               <div class="form-group">

                                <label>Type of Building Construction</label>
                                 <span class="required"> * </span>
                                
                                <select id="hme_building_type" title="<?php echo $lead_details->hme_building_type; ?>" name="hme_building_type" class="form-control input-sm" ng-model="hme_building_type"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="Kutcha" <?php echo (strtolower($lead_details->hme_building_type) == 'kutcha' ? 'selected' : ''); ?>>Kutcha</option>
                                    <option value="Standard" <?php echo (strtolower($lead_details->hme_building_type) == 'standard' ? 'selected' : ''); ?>>Standard</option>
                                  </select>

                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_building_type.$dirty" ng-messages="lmsHome.hme_building_type.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Building Construction</div>
                                 </div>
                              </div>
                  
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                                <label>Property Ownership</label>
                                 <span class="required"> * </span>
                                <select id="hme_property_ownership" title="<?php echo $lead_details->hme_property_ownership; ?>" name="hme_property_ownership" class="form-control input-sm" ng-model="hme_property_ownership"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <?php foreach (propertyownershipfunction() as $key => $value) {
                                       # code...
                                       echo '<option value="'.$value.'" '.($value == $lead_details->hme_property_ownership ? 'selected' : '').'>'.$value.'</option>';
                                    }
                                    ?>
                                    
                                  </select> 
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_property_ownership.$dirty" ng-messages="lmsHome.hme_property_ownership.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Property Ownership</div>
                                 </div>
                              </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                                <label>Property Type</label>
                                 <span class="required"> * </span>
                                <select id="hme_property_type" title="<?php echo $lead_details->hme_property_type; ?>" name="hme_property_type" class="form-control input-sm" ng-model="hme_property_type"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <?php foreach (propertytypefunction() as $key => $value) {
                                       # code...
                                       echo '<option value="'.$value.'" '.($value == $lead_details->hme_property_type ? 'selected' : '').'>'.ucfirst($value).'</option>';
                                    }
                                    ?>
                                  </select> 
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_property_type.$dirty" ng-messages="lmsHome.hme_property_type.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Property Ownership</div>
                                 </div>
                              </div>
               </div>
            </div>

               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Do you have any claims in previous year</label>
                                 <span class="required"> * </span>
                                <select id="hme_previous_claims" title="<?php echo $lead_details->hme_previous_claims; ?>" name="hme_previous_claims" class="form-control input-sm" ng-model="hme_previous_claims"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="yes" <?php echo (strtolower($lead_details->hme_previous_claims) == 'yes' ? 'selected' : ''); ?>>Yes</option>
                                    <option value="no" <?php echo (strtolower($lead_details->hme_previous_claims) == 'no' ? 'selected' : ''); ?>>No</option>
                                    
                                  </select> 
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_previous_claims.$dirty" ng-messages="lmsHome.hme_previous_claims.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Do you have any claims in previous year</div>
                                 </div>
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>No of Floors</label>
                                 <span class="required"> * </span>
                                <input type="text" name="hme_no_of_floors" placeholder="No of Floors " class="form-control input-sm number-validate" value="<?php echo $lead_details->hme_no_of_floors; ?>" id="hme_no_of_floors" ng-model="hme_no_of_floors" required />
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_no_of_floors.$dirty" ng-messages="lmsHome.hme_no_of_floors.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter No of Floors</div>
                                 </div>
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Year of construction</label>
                                 <span class="required"> * </span>
                                <input type="text" name="hme_year_of_construction" placeholder="Year of construction" class="form-control input-sm number-validate" value="<?php echo $lead_details->hme_year_of_construction; ?>" id="hme_year_of_construction" ng-model="hme_year_of_construction" required />
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_year_of_construction.$dirty" ng-messages="lmsHome.hme_year_of_construction.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Year of Construction</div>
                                 </div>
                              </div>
                  </div>
                  
               </div>

               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Independent House</label>
                                 <span class="required"> * </span>
                                <select id="hme_independent_house" title="<?php echo $lead_details->hme_independent_house; ?>" name="hme_independent_house" class="form-control input-sm" ng-model="hme_independent_house" value="<?php echo $lead_details->hme_independent_house; ?>"  required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="yes" <?php echo (strtolower($lead_details->hme_independent_house) == 'yes' ? 'selected' : ''); ?>>Yes</option>
                                    <option value="no" <?php echo (strtolower($lead_details->hme_independent_house) == 'no' ? 'selected' : ''); ?>>No</option>
                                    
                                  </select> 
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_independent_house .$dirty" ng-messages="lmsHome.hme_independent_house .$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Independent House</div>
                                 </div>
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Compound Wall</label>
                                 <span class="required"> * </span>
                               <select id="hme_compound_wall" name="hme_compound_wall" class="form-control input-sm" ng-model="hme_compound_wall" title="<?php echo $lead_details->hme_compound_wall; ?>" required>
                                    <option value="" disabled selected>Select your option</option>
                                    <option value="yes" <?php echo (strtolower($lead_details->hme_compound_wall) == 'no' ? 'selected' : ''); ?>>Yes</option>
                                    <option value="no" <?php echo (strtolower($lead_details->hme_compound_wall) == 'no' ? 'selected' : ''); ?>>No</option>
                                    
                                  </select>
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_compound_wall.$dirty" ng-messages="lmsHome.hme_compound_wall.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Compound Wall</div>
                                 </div>
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Build up Area</label>
                                 <span class="required"> * </span>
                                <input type="text" name="hme_build_up" placeholder="Build up Area " class="form-control input-sm number-validate" id="hme_build_up" value="<?php echo $lead_details->hme_build_up; ?>" ng-model="hme_build_up" required />
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_build_up.$dirty" ng-messages="lmsHome.hme_build_up.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Build up Area</div>
                                 </div>
                              </div>
                  </div>
                  
               </div>
               
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Sum Insured</label>
                                 <span class="required"> * </span>
                                <select id="hme_sum_insured" name="hme_sum_insured" class="form-control input-sm" title="<?php echo $lead_details->sum_insured; ?>" ng-model="hme_sum_insured"  required>
                                    <option value="" disabled selected>Select your Plan</option>
                                    <?php foreach (suminsuredfunction() as $key => $value) {
                                       # code...
                                      $suvalue = str_replace(',', '',$value);
                                       echo '<option value="'.$suvalue.'" '.($suvalue == $lead_details->sum_insured ? 'selected' : '').'>'.$value.'</option>';
                                    }
                                    ?>
                                  </select> 
                                 <div ng-if="lmsHome.$submitted || lmsHome.hme_sum_nsured.$dirty" ng-messages="lmsHome.hme_sum_insured.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select In Sum Insured Amount</div>
                                 </div>
                              </div>
                  </div>
				  <?php $valuablesCheck = json_decode($lead_details->hme_sum_insured_provided); ?>
                  <div class="col-md-8">
                  <label>Sum Insured to be provided as</label>
                                
                     <div class="form-group">
                                
                        <div class="col-md-3">
                           <input ng-click="copconv()" type="checkbox" class="Spouse_ship hme_sum_insured_provided" name="hme_sum_insured_provided[]" ng-model="valuables" id="valuables" value="valuables" <?php if($valuablesCheck->valuables > 0){ echo 'checked'; } ?> ng-readonly="lms_car_category=='COP'"  />
                           <label> Valuables</label>
                        
                        </div>
                        <div class="col-md-5">
                           <input ng-click="copconv()" class="Spouse_ship hme_sum_insured_provided" type="checkbox" name="hme_sum_insured_provided[]" id="SIM_PEE"  ng-model="PEE" value="SIM_PEE" <?php if($valuablesCheck->pee > 0){ echo 'checked'; } ?> ng-readonly="lms_car_category=='COP'"/>
                           <label>Portable Electronic Equipment</label>
                          
                        </div>
                        <div class="col-md-4" id="SIM_structure_div" ng-show="hme_property_ownership == 'Owned'">
                           <input class="Spouse_ship hme_sum_insured_provided"  type="checkbox" name="hme_sum_insured_provided[]" id="SIM_structure" ng-model="structure" value="structure" <?php if($valuablesCheck->structure > 0){ echo 'checked'; } ?> />
                           <label>Structure</label>
                          
                        </div>
                                 
                     </div>
                  </div>
                  
                  
                  
               </div>


               <div class="row maincontf">
                    <div class="col-md-4">
                        <div class="form-group">
                           <label>Premium Amount<span class="required"> * </span></label>
                          
                           <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" value="<?php echo $lead_details->lms_premium; ?>" readonly="">
                           <div ng-if="lmsHome.$submitted" ng-messages="lmsHome.lms_est_premium.$error" role="alert">
                              <div ng-message="required" class="required">Please Enter Premium Amount</div>
                           </div>
                        </div>
                     </div>
                </div>   

         <div class="row maincontf">
            <div class="form-group">
                  <div class="col-md-4">
                  <label>Communication address same as Risk Address</label> &nbsp;
                  <input class="Spouse_ship" type="checkbox" name="hme_risk_address_same" id="hme_address_same" ng-model="hme_risk_address_same" value="1" <?php if($lead_details->hme_risk_address_same == '1'){ echo 'checked'; } ?> />
                      </div>
                        
                  <div class="col-md-8"> &nbsp;</div>
                </div>
            </div>   

            
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Risk Address 1</label>
                                 <span class="required"> * </span>
                                 <input type="text" name="hme_risk_address1" placeholder="Risk Address 1" class="form-control input-sm" id="hme_risk_address1" value="<?php echo $lead_details->hme_risk_address1; ?>" ng-model="hme_risk_address1"/>
                                
                                    <div id="hme_risk_address1_error" class="required"></div>
                                <!--  </div> -->
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                                <label>Risk Address 2</label>
                                 <span class="required"> * </span>
                               <input type="text" name="hme_risk_address2" placeholder="Risk Address 2 " class="form-control input-sm" id="hme_risk_address2" value="<?php echo $lead_details->hme_risk_address2; ?>" ng-model="hme_risk_address2"/>
                               
                                    <div id="hme_risk_address2_error" class="required"></div>
                                 <!-- </div> -->
                              </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Area</label>
                        <span class="required"> * </span>
                       <input type="text" name="hme_risk_area" value="<?php echo $lead_details->hme_risk_area; ?>" placeholder="Risk Area " class="form-control input-sm" id="hme_risk_area" ng-model="hme_risk_area"/>
                           <div id="hme_risk_area_error" class="required"></div>
                        </div>
<!--                      </div>
 -->                  </div>
                  
               </div>
               
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk Pincode</label>
                           <span class="required"> * </span>
                           <input type="text" name="hme_risk_pincode" placeholder="Risk Pincode" class="form-control input-sm number-validate" id="hme_risk_pincode" ng-model="hme_risk_pincode" value="<?php echo $lead_details->hme_risk_pincode?>" />
<!--                            <div ng-if="lmsHome.$submitted || lmsHome.hme_risk_pincode.$dirty" ng-messages="lmsHome.hme_risk_pincode.$error" role="alert">
 -->                              <div id="hme_risk_pincode_error" class="required"></div>
<!--                            </div>
 -->                        </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk State</label>
                           <span class="required"> * </span>
                         <input type="text" name="hme_risk_state" placeholder="Risk State" class="form-control input-sm" id="hme_risk_state" ng-model="hme_risk_state" value="<?php echo $lead_details->hme_risk_state?>" />
<!--                            <div ng-if="lmsHome.$submitted || lmsHome.hme_risk_state.$dirty" ng-messages="lmsHome.hme_risk_state.$error" role="alert">
 -->                              <div id="hme_risk_state_error" class="required"></div>
<!--                            </div>
 -->                        </div>
                  </div>
                  
                  <div class="col-md-4">
                     <div class="form-group">
                          <label>Risk City</label>
                           <span class="required"> * </span>
                          <input type="text" name="hme_risk_city" placeholder="Risk City " class="form-control input-sm" id="hme_risk_city" ng-model="hme_risk_city" value="<?php echo $lead_details->hme_risk_city?>" />
<!--                            <div ng-if="lmsHome.$submitted || lmsHome.hme_risk_city.$dirty" ng-messages="lmsHome.hme_risk_city.$error" role="alert">
 -->                              <div id="hme_risk_city_error" class="required"></div>
                        <!--    </div>
 -->                        </div>
                  </div>
                  
               </div>
               
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                       <label>Risk Nearest Land Mark</label>
                        <span class="required"> * </span>
                        <input type="text" name="hme_risk_nearest_land_mark" placeholder="Risk Nearest Land Mark" class="form-control input-sm" id="hme_risk_nearest_land_mark" ng-model="hme_risk_nearest_land_mark" value="<?php echo $lead_details->hme_risk_nearest_land_mark?>" />
                           <div id="hme_risk_nearest_land_mark_error" class="required"></div>
<!--                         </div>
 -->                     </div>
                  </div>
                  
                  <div class="col-md-4">&nbsp;</div>
                  
                  <div class="col-md-4">&nbsp;</div>
                  
               </div>
                    
<div id="valuable_detail_div" style="<?php if($valuablesCheck->valuables > 0){ echo 'display: block;'; } else { echo 'display: none;'; } ?> border: 1px solid #CCC; padding: 10px; margin-top: 20px;">
<div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Valuables</span>
                  </div>
               </div>
      <div class="row maincontf">
         <div class="col-md-4">
            <div class="form-group">
              <label>Item Description </label> <span class="required">* </span>       
            </div>
         </div>
           
         <div class="col-md-4">
            <div class="form-group">
                 <label>Weight in gm </label><span class="required">*</span>   
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
              <label>Sum Insured </label><span class="required">*</span>
            </div>
         
         </div>
       </div>
         
   <?php for( $i = 0; $i <= 7;  $i++ ) { $pv = $i+1; ?>
      <div class="row maincontf form-group">
         <div class="col-md-4">
       <div class="form-group">
			<input type="hidden" name="valu_update_id[]" id="valu_update_id<?php echo $pv; ?>" value="<?php echo $valuables_details[$i]->valuable_id; ?>">
			<input type="text" name="hme_itm_des_val[]" placeholder="Item Description" class="form-control input-sm " id="hme_itm_des_val<?php echo $pv; ?>" ng-model="hme_itm_des_val<?php echo $pv; ?>" value="<?php echo $valuables_details[$i]->hme_itm_des; ?>" /> 
               </div>
			   <?php if($i == 0) { ?>
			   <div id="error-hme_itm_des_val"></div>
				<?php } ?>
         </div>
         
         <div class="col-md-4">
            <div class="form-group">
               <input type="text" name="hme_weight_val[]" placeholder="Weight in gm" class="form-control input-sm number-validate " id="hme_weight_val<?php echo $pv; ?>" ng-model="hme_weight_val<?php echo $pv?>" value="<?php echo $valuables_details[$i]->hme_weight?>" />
            </div>
			<?php if($i == 0) { ?>
			   <div id="error-hme_weight_val"></div>
				<?php } ?>
         </div>
         
         <div class="col-md-4">
            <div class="form-group">
               <input type="text" name="hme_SI_val[]" placeholder="Sum Insured" class="form-control input-sm number-validate " id="hme_SI_val<?php echo $pv?>" ng-model="hme_SI_val<?php echo $pv?>" value="<?php echo $valuables_details[$i]->hme_SI?>" />
            </div>
			<?php if($i == 0) { ?>
			   <div id="error-hme_SI_val"></div>
				<?php } ?>
         </div>
         
      </div>
   <?php } ?>

</div>
            
               
<div id="SIM_PEE_detail_div" style="<?php if($valuablesCheck->pee > 0){ echo 'display: block;'; } else { echo 'display: none;'; } ?> border: 1px solid #CCC; padding: 10px; margin-top: 20px;" > 
<div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase"> Portable Electronic Equipment</span>
                  </div>
               </div>
    <div class="row maincontf">
      <div class="col-md-3"> <div class="form-group"><label>Item Description </label> </div></div>
      <div class="col-md-2"><div class="form-group"><label>Make </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Model </label></div></div>
      <div class="col-md-1"><div class="form-group"><label>YOM </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Serial / IMEI Number </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Sum Insured </label></div></div>
   </div>

<?php for( $x = 0; $x <= 7;  $x++ ) { ?>
<?php $pp = $x+1; ?>
   <div class="row maincontf">
      <div class="col-md-3">
         <div class="form-group">
          <input type="hidden" name="pee_update_id[]" value="<?php echo $PEEI_details[$x]->pee_id; ?>">
           <select id="hme_itm_des_PEE<?php echo $pp; ?>" name="hme_itm_des_PEE[]" title="<?php echo $PEEI_details[$x]->hme_itm_des; ?>" class="form-control input-sm" ng-model="hme_itm_des_PEE<?php echo $pp; ?>" >
               <option value="" selected>Select your option</option>
             
               <?php foreach (peedescoptions() as $key => $value) {
                                       # code...
                                       echo '<option value="'.$value.'" '.($value == $PEEI_details[$x]->hme_itm_des ? 'selected' : '').'>'.$value.'</option>';
                                    }
									?>
            </select>
         </div>
         <?php if($pp == 1) { ?><div id="error-hme_itm_des_PEE"></div><?php } ?>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="hme_make_PEE[]" placeholder="Make" class="form-control input-sm" id="hme_make_PEE<?php echo $pp; ?>" ng-model="hme_make_PEE<?php echo $pp; ?>" value="<?php echo $PEEI_details[$x]->hme_make?>" />
         </div>
         <?php if($pp == 1) { ?><div id="error-hme_make_PEE"></div><?php } ?>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="hme_mdl_PEE[]" placeholder="Model" class="form-control input-sm " id="hme_mdl_PEE<?php echo $pp; ?>" ng-model="hme_mdl_PEE<?php echo $pp; ?>" value="<?php echo $PEEI_details[$x]->hme_model?>" />
         </div>
         <?php if($pp == 1) { ?><div id="error-hme_mdl_PEE"></div><?php } ?>
      </div>
      
      <div class="col-md-1">
         <div class="form-group">
            <input type="text" name="hme_yom_PEE[]" placeholder="YOM" class="form-control input-sm number-validate" id="hme_yom_PEE<?php echo $pp; ?>" ng-model="hme_yom_PEE<?php echo $pp; ?>" value="<?php echo $PEEI_details[$x]->hme_YOM?>" />
         </div>
         <?php if($pp == 1) { ?><div id="error-hme_yom_PEE"></div><?php } ?>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="hme_imei_PEE[]" placeholder="IMEI" class="form-control input-sm number-validate" id="hme_imei_PEE<?php echo $pp; ?>" ng-model="hme_imei_PEE<?php echo $pp; ?>" value="<?php echo $PEEI_details[$x]->hme_IMEI?>" />
         </div>
         <?php if($pp == 1) { ?><div id="error-hme_imei_PEE"></div><?php } ?>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="hme_SI_PEE[]" placeholder="Sum Insured" class="form-control input-sm number-validate" id="hme_SI_PEE<?php echo $pp; ?>" ng-model="hme_SI_PEE<?php echo $pp; ?>" value="<?php echo $PEEI_details[$x]->hme_SI?>" />
         </div>
         <?php if($pp == 1) { ?><div id="error-hme_SI_PEE"></div><?php } ?>
      </div>
      
   </div>

<?php } ?>   
            
</div>           


           
<div id="claim_detail_div" style="border: 1px solid #CCC; padding: 10px; margin-top: 20px; <?php if(strtolower($lead_details->hme_previous_claims) == 'yes'){ echo 'display: block;'; } else { echo 'display: none;'; } ?>" > 
<div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase"> Previous Year Claims</span>
                  </div>
               </div>
    <div class="row maincontf">
      <div class="col-md-2"> <div class="form-group" required > <label>Long Description </label> </div></div>
      <div class="col-md-2"><div class="form-group"><label>Assets Damaged </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Cause Of Loss </label></div></div>
      <div class="col-md-1"><div class="form-group"><label>Insurance In Place </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Policy Year / Loss Year </label></div></div>
      <div class="col-md-1"><div class="form-group"><label>Insurance Claimed </label></div></div>
      <div class="col-md-2"><div class="form-group"><label>Loss Of Amount </label></div></div>
   </div>

<?php for( $p = 0; $p <= 5;  $p++ ) { ?>
  <?php $pr = $p+1; ?>
   <div class="row maincontf">
      <div class="col-md-2">
        <input type="hidden" name="pre_claim_update_id[]" id="pre_claim_update_id" value="<?php echo $pre_claim_details[$p]->claim_id;?>">
         <div class="form-group">
            <input type="text" name="hme_long_des[]" placeholder="Long Description" class="form-control input-sm" id="hme_long_des<?php echo $pr; ?>" ng-model="hme_long_des<?php echo $pr; ?>" value="<?php echo $pre_claim_details[$p]->hme_long_des?>" />
         </div>
		 <?php if($pr == 1) { ?><div id="error-hme_long_des"></div><?php } ?>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="hme_assets_damage[]" placeholder="Damages" class="form-control input-sm" id="hme_assets_damage<?php echo $pr;?>" ng-model="hme_assets_damage<?php echo $pr;?>" value="<?php echo $pre_claim_details[$p]->hme_assets_damage?>" />
         </div>
		 <?php if($pr == 1) { ?><div id="error-hme_assets_damage"></div><?php } ?>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="hme_cause_loss[]" placeholder="Cause of loss" class="form-control input-sm" id="hme_cause_loss<?php echo $pr; ?>" ng-model="hme_cause_loss<?php echo $pr; ?>" value="<?php echo $pre_claim_details[$p]->hme_cause_loss?>" />
         </div>
		 <?php if($pr == 1) { ?><div id="error-hme_cause_loss"></div><?php } ?>
      </div>
      
      <div class="col-md-1">
         <div class="form-group">

           <select id="hme_ins_place<?php echo $pr; ?>" name="hme_ins_place[]" class="form-control input-sm" ng-model="hme_ins_place<?php echo $pr; ?>" title="<?php echo $pre_claim_details[$p]->hme_ins_place; ?>">
               <option value="" selected>Select</option>
               <option value="Yes" <?php echo (strtolower($pre_claim_details[$p]->hme_ins_place) == 'no' ? 'selected' : ''); ?>>Yes</option>
               <option value="No" <?php echo (strtolower($pre_claim_details[$p]->hme_ins_place) == 'no' ? 'selected' : ''); ?>>No</option>
            </select> 

         </div>
		 <?php if($pr == 1) { ?><div id="error-hme_ins_place"></div><?php } ?>
      </div>
      
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" maxlength="4" onkeypress='return restrictAlphabets(event)' name="hme_policy_yr[]" placeholder="Policy" class="form-control input-sm" id="hme_policy_yr<?php echo $pr; ?>" ng-model="hme_policy_yr<?php echo $pr; ?>" value="<?php echo $pre_claim_details[$p]->hme_policy_yr?>" />
         </div>
		 <?php if($pr == 1) { ?><div id="error-hme_policy_yr"></div><?php } ?>
      </div>
      
      <div class="col-md-1">
         <div class="form-group">
          
           <select id="hme_ins_claim<?php echo $pr; ?>" name="hme_ins_claim[]" class="form-control input-sm" ng-model="hme_ins_claim<?php echo $pr; ?>" title="<?php echo $pre_claim_details[$p]->hme_ins_claim; ?>">
               <option value="" selected>Select</option>
               <option value="Yes" <?php echo (strtolower($pre_claim_details[$p]->hme_ins_claim) == 'no' ? 'selected' : ''); ?>>Yes</option>
               <option value="No" <?php echo (strtolower($pre_claim_details[$p]->hme_ins_claim) == 'no' ? 'selected' : ''); ?>>No</option>
            </select> 

         </div>
		 <?php if($pr == 1) { ?><div id="error-hme_ins_claim"></div><?php } ?>
      </div>
      <div class="col-md-2">
         <div class="form-group">
            <input type="text" name="hme_loss_amt[]" placeholder="Loss" class="form-control input-sm" id="hme_loss_amt<?php echo $pr; ?>" ng-model="hme_loss_amt<?php echo $pr; ?>" value="<?php echo $pre_claim_details[$p]->hme_loss_amt?>" />
         </div>
		 <?php if($pr == 1) { ?><div id="error-hme_loss_amt"></div><?php } ?>
      </div>
   </div>

<?php } ?>   
            
</div> 

               <br><br>

               <!-- car details hidedive end here -->
            </div>
      </div>


      <div>
         
            <div class=".carhide" id="carproposal">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Home Proposal</span>
                  </div>
               </div>

               <div class="row maincontf">
                <div class="col-md-4">
                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="home_pro_policy_sdate"  name="home_pro_policy_sdate" class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" ng-model="home_pro_policy_sdate" required data-date-format="dd-mm-yyyy" ng-change="checkPolicyStartDate('home_pro_policy_sdate')" value="<?php echo $lead_details->new_policy_start; ?>">
                     <div>
                        <span ng-if="lmsHome.$submitted" ng-messages="lmsHome.home_pro_policy_sdate.$error" role="alert"><div ng-message="required" class="required">Please Enter policy start date</div></span>
                     </div>
                  </div>
                           </div>
                        </div>
      
                         <h4 class="propsal-seperator">Nominee Details</h4>
                     <hr>
                           <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Name of Nominee for Primary Insured <span class="required"> * </span> </label>
                                 <input type="text" name="home_pro_nname" placeholder="Enter Name of Nominee " class="form-control input-sm" id="home_pro_nname" ng-model="home_pro_nname" value="<?php echo $lead_details->nominee_name; ?>" required/>
                                 <div ng-if="lmsHome.$submitted || lmsHome.home_pro_nname.$dirty" ng-messages="lmsHome.home_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Relationship With Primary insured <span class="required"> * </span>
                                </label>
                                 <select id="home_pro_nomie_relation" title="<?php echo $lead_details->nominee_relationship; ?>" name="home_pro_nomie_relation" class="form-control input-sm" ng-model="home_pro_nomie_relation"  >
                                    <option value="" disabled selected>Select your option</option>
                                    <?php foreach (realationshiofunction() as $key => $value) {
                                       # code...
                                       echo '<option value="'.$value.'" '.($value == $lead_details->nominee_relationship ? 'selected' : '').'>'.$value.'</option>';
                                    }
                                    ?>
                                  </select>
                                 <div ng-if="lmsHome.$submitted || lmsHome.home_pro_nomie_relation.$dirty" ng-messages="lmsHome.home_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div> 
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Age <span class="required"> * </span> </label>
                                 <input type="text" name="home_pro_nomie_age" maxlength="2" placeholder="Enter Nominee Age" class="form-control input-sm age-validate" id="home_pro_nomie_age" ng-model="home_pro_nomie_age" value="<?php echo $lead_details->nominee_age; ?>" dir:Check:Numeric />
                                <div ng-if="lmsHome.$submitted || lmsHome.home_pro_nomie_age.$dirty" ng-messages="lmsHome.home_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Name Of Appointee </label>
                                 <input type="text" name="home_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="home_pro_nameofappoint" ng-model="home_pro_nameofappoint" value="<?php echo $lead_details->appointee_name; ?>" />
                                  <!-- <div ng-if="lmsHome.$submitted || lmsHome.home_pro_nameofappoint.$dirty" ng-messages="lmsHome.home_pro_nameofappoint.$error" role="alert"> -->
                                  <!--   <div class="required" id="app_name_error"></div> -->
                                 <!-- </div> -->
                                 
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="home_pro_appoint_relation" title="<?php echo $lead_details->appointee_relationship; ?>" name="home_pro_appoint_relation" class="form-control input-sm" ng-model="home_pro_appoint_relation">
                                    <option value="" disabled selected>Select your option</option>
                                    <?php foreach (realationshiofunction() as $key => $value) {
                                       # code...
                                       echo '<option value="'.$value.'" '.($value == $lead_details->appointee_relationship ? 'selected' : '').'>'.$value.'</option>';
                                    }
                                    ?>
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
                           <input class="Spouse_ship" type="checkbox" name="declaration" id="declaration"  ng-model="declaration" value="" required />
                           <label> I hereby declare that the customer has a HDFC Bank Relationship – (Bank Account/Credit Card/LOS Number) </label><span class="required">*</span>
                           <div ng-if="lmsHome.$submitted || lmsHome.declaration.$dirty" ng-messages="lmsHome.declaration.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Decleration</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>

                        <div class="col-md-12">
                           <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="" required />
                           <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                           <div ng-if="lmsHome.$submitted || lmsHome.premiumPayment.$dirty" ng-messages="lmsHome.premiumPayment.$error" role="alert">
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
                           <button type="submit" class="btn blue btn-default"> Update Lead </button>
                           <button type="button" class="btn blue btn-default" ng-show="updateleadhomeprg" disabled> Please wait.. </button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>

                <!-- proposal hidedive end here -->
            </div>
        
      </div>      



      <!-- controller ends here -->
   </div>


 </form>
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
    
   $("#hme_property_ownership").on('change', function() { 
      var ownership = $(this).val();
      if(ownership == 'Rented'){
         $('#SIM_structure_div').hide();
		 $('#uniform-SIM_structure span').attr('class',"");
		 $('#SIM_structure').attr('checked',false);
      } else {
         $('#SIM_structure_div').show();
      }
	updatePremium();
   }); 


   $("#hme_sum_insured").on('change', function() {
      updatePremium(); 
   });   

   $("#hme_address_same").on('change', function() { 

      
      if($(this).is(":checked")) {
         
         $('#hme_risk_address1').val($('#lms_car_add1').val());
         $('#hme_risk_address2').val($('#lms_car_add2').val());
         $('#hme_risk_area').val($('#lms_car_area').val());
         $('#hme_risk_pincode').val($('#lms_car_zip').val());
         $('#hme_risk_state').val($('#lms_car_state').val());
         $('#hme_risk_city').val($('#lms_car_city').val());
         $('#hme_risk_nearest_land_mark').val($('#lms_car_pro_landmark').val());

         $('#hme_risk_address1_error').html('');
         $('#hme_risk_address2_error').html('');
         $('#hme_risk_area_error').html('');
         $('#hme_risk_pincode_error').html('');
         $('#hme_risk_state_error').html('');
         $('#hme_risk_city_error').html('');
         $('#hme_risk_nearest_land_mark_error').html('');

      } else {
         $('#hme_risk_address1').val('');
         $('#hme_risk_address2').val('');
         $('#hme_risk_area').val('');
         $('#hme_risk_pincode').val('');
         $('#hme_risk_state').val('');
         $('#hme_risk_city').val('');
         $('#hme_risk_nearest_land_mark').val('');
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
  
 $(document).ready(function() {
  console.log("test",$('#lms_carcomment'));

    $("#lms_carcomment").click(function() {                
      console.log("working");
      $.ajax({    //create an ajax request to display.php
        type: "GET",
          url : webUbrl+'Commoncontrol/getCommentsByLeadId/',
           data:{
             'comment' : $('#lms_carcomment').val()},           
              dataType: "json",
          
             //expect html to be returned                
        success: function(data){                    
           
            alert(coming);
        }
 });
    });
});
/*$(document).ready(function(){

     $.ajax({ 

         type: "GET",   
         url: webUbrl+'Commoncontrol/getCommentsByLeadId/',   
         async: false,
         data:{
             'comment' : $('#lms_carcomment').val()},           
              dataType: "json",
         success : function(data)
         {
             alert(coming);
         }
    });

});*/
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
         
           $(document).ready(function() {
         var webUbrl = $('#web_url').val();

      $.ajax({
   
              url : webUbrl+'Commoncontrol/getCommentsByLeadId',
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
$('#hme_previous_claims').on('change',function(){

      var preClaim = $(this).val();
    
      if(preClaim == 'yes'){
  
      $('#claim_detail_div').show();
        
      } else {
         $('#claim_detail_div').hide();
      }      

   });
});

      </script>

</body>
</html>
