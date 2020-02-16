<script src="<?php echo base_url().'assets/js/lms_js/angular-bundle-pa-min.js'?>"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<?php $thirdUrl = $this->uri->segment(2); ?>
<input type="hidden" id="product_type" value="Bunble PA">
<div class="tab-content">
   <div class="tab-pane fade active in" id="car">
      <div>

      <?php $bundleData = $this->db->where('bundle_lead_id',$lead_details->lead_id)->order_by('bundle_pa_id','DESC')->limit(1)->get('tbl_lead_bundle_product')->row_object(); ?>



         <form name="lmsBundle" novalidate id="lmsBundle" bunlde:Form:Submit>
          <div class="row">
          <input type="hidden" name="hiddenleadId" id="hiddenleadId" ng-model="hiddenleadId" ng-value='"<?php echo $lead_details->lead_id; ?>"' />
          <div class="col-md-12">
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
          </div>
          
          <div class="col-md-8">
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase"> Bundle Lead Details </span>
               </div>

            </div>

            

            </div>
             <div class="col-md-4">
            <div class="pull-right" style="margin-top: 10px;">
                        <a href="<?php echo base_url(); ?>lms-script-query-pa" target="_blank">
                            <button type="button" class="btn blue btn-default"> Script Query </button>
                        </a>
                      </div>
            </div>
            </div>
            
           <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group" ng-init=' lms_car_category = "<?php echo $userDetails->Channel; ?>"'>
                  <label>Category
                     </label>
                     <input list="Category" placeholder="Select Category" class="form-control input-sm" name="lms_car_category" id="lms_car_category" ng-model="lms_car_category" readonly  value="<?php echo 
                      $userDetails->Channel; ?>" required>
                     <datalist id="Category">
                      
                        <?php 
                           foreach($CategoryArray as $Category )
                           {
                               echo '<option  value="'.$Category['name'].'" style="font-weight:normal; color:#ff0000;"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_category.$dirty" ng-messages="lmsBundle.lms_car_category.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Category</div>
                     </div>
                     
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_line_of_business = "Bundle PA" '>
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
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_line_of_business.$dirty" ng-messages="lmsBundle.lms_car_line_of_business.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Line of Business</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_hdfc_card_4digt = "<?php echo $lead_details->HDFC_card_last_4_digits;?>" '>
                     <label>HDFC Card's Last 4 digits
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_hdfc_card_4digt" ng-minlength="4" ng-maxlength="4" maxlength = "4" onkeypress='return restrictAlphabets(event)' placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="lms_car_hdfc_card_4digt" ng-model="lms_car_hdfc_card_4digt" onkeyup="return card_validate(this.value);" required />
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_hdfc_card_4digt.$dirty" class="required" id="cardwar" ng-messages="lmsBundle.lms_car_hdfc_card_4digt.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>
                     </div>
                  </div>
               </div>
            </div>
             <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_aaa_number = "<?php echo $lead_details->aaa_number;?>" '>
                     <label>AAN Number 
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_aaa_number"   placeholder="AAN Number"  class="form-control input-sm" id="lms_aaa_number" ng-model="lms_aaa_number" required />               
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_aaa_number.$dirty" ng-messages="lmsBundle.lms_aaa_number.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter AAN Number</div>
                     </div>
                  </div>
               </div> 

               
               <div class="col-md-4" ng-init = ' lms_car_target_date = "<?php echo ($lead_details->target_date ? $lead_details->target_date : date('d-m-Y')); ?>"' >
                  <div class="form-group">
                     <label>Target Date
                     </label>  <span class="required"> * </span></label>
                     <input type="text" date:Picker data-date-format="dd-mm-yyyy" class="form-control input-sm custom-date-after"  placeholder="DD-MM-YYYY" name="lms_car_target_date" id="lms_car_target_date" ng-model="lms_car_target_date" ng-value='"<?php echo date('d-m-Y'); ?>"' value='"<?php echo date('d-m-Y'); ?>"' required>
                     <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_target_date.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Date</div>
                     </div>
                                     
                  </div>
               </div>

                  <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_hdfc_card_relno = "<?php echo $lead_details->HDFC_card_relationship_no;?>" '>
                     <label>HDFC Card Relationship No/LOS Number
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_hdfc_card_relno" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="lms_car_hdfc_card_relno" ng-model="lms_car_hdfc_card_relno" required />
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_hdfc_card_relno.$dirty" ng-messages="lmsBundle.lms_car_hdfc_card_relno.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_tse_bar_code = "<?php echo $lead_details->TSE_BDR_code;?>" '>
                     <label>TSE/BDR Code
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_tse_bar_code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="lms_car_tse_bar_code" ng-model="lms_car_tse_bar_code" required> 
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_tse_bar_code.$dirty" ng-messages="lmsBundle.lms_car_tse_bar_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_tl_code = "<?php echo $lead_details->TL_code;?>" '>
                     <label>TL Code/DSA Code/Team Code</label> 
                     <span class="required"> * </span></label>                  
                     <input type="text" name="lms_car_tl_code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="lms_car_tl_code" ng-model="lms_car_tl_code" required >  
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_tl_code.$dirty" ng-messages="lmsBundle.lms_car_tl_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_sm_code = "<?php echo $lead_details->SM_code;?>" '>
                     <label>SM Code </label>  
                     <input type="text" name="lms_car_sm_code"  placeholder="SM Code"   class="form-control input-sm" id="lms_car_sm_code" ng-model="lms_car_sm_code"  />                 
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_bank_verify_id = "<?php echo $lead_details->bank_verifier_id;?>" '>
                     <label>Bank Verifier ID
                     <span class="required"> * </span></label>
                     <input type="text" name="lms_car_bank_verify_id"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="lms_car_bank_verify_id" ng-model="lms_car_bank_verify_id" required /> 
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_bank_verify_id.$dirty" ng-messages="lmsBundle.lms_car_bank_verify_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>
                     </div>
                  </div>
               </div>

                      <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_tbusins = "<?php echo $lead_details->business_type;?>" '>
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
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_tbusins.$dirty" ng-messages="lmsBundle.lms_cus_tbusins.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Type Of business </div>
                        </div>
                     </div>
                  </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_payment_type = "<?php echo $lead_details->payment_type;?>" '>
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
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_payment_type.$dirty" ng-messages="lmsBundle.lms_car_payment_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Payment Type</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_sub_channel = "<?php echo $lead_details->priority;?>" '>
                     <label>Priority</label>  
                     <span class="required"> * </span></label>   
                     <select  class="form-control input-sm" name="lms_car_sub_channel" id="lms_car_sub_channel" ng-model="lms_car_sub_channel" >
                         <option value="" disabled selected>Select your option</option><?php 
                           foreach($PriorityArray as $Priority )
                           {
                               echo '<option value="'.$Priority['name'].'">'.$Priority['name'].'</option>';
                           }
                           ?>   
                     </select>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_sub_channel.$dirty" ng-messages="lmsBundle.lms_car_sub_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>


                <?php if($userDetails->Channel == "DT"){ ?>
                <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_campaign_name = "<?php echo $lead_details->sub_channel;?>" '>
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
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_campaign_name.$dirty" ng-messages="lmsBundle.lms_car_campaign_name.$error" role="alert">
                        <div ng-message="required" class="required">Select Your Campaign Name</div>
                     </div>
                  </div>
               </div>
            <?php } ?>

               
               
                 <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_deatil_lead = "<?php echo $lead_details->lead_details;?>" '>
                        <label>Details of Lead
                        </label>   <span class="required"> * </span>
                        <input type="text" name="lms_car_deatil_lead"  placeholder="Details of Lead "   class="form-control input-sm" id="lms_car_deatil_lead" ng-model="lms_car_deatil_lead" required> 
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_deatil_lead.$dirty" ng-messages="lmsBundle.lms_car_deatil_lead.$error" role="alert">
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
                  <label> Dispatch required on Vision plus address </label> &nbsp;
                  <input class="Spouse_ship" type="checkbox" name="vision_address_name" id="vision_address"  ng-model="vision_address_name" value="1"  />
                      </div>
                        
                  <div class="col-md-8"> &nbsp;</div>
                </div>
            </div>
          <?php } ?>
            <h4 class="propsal-seperator">Customer Details </h4>
            <hr> 

            <div class="row maincontf">
            <div class="col-md-4" ng-init = ' lms_car_card_holder_name = "<?php echo ($lead_details->cus_card_name ? $lead_details->cus_card_name : ''); ?>" '>
                  <div class="form-group">
                     <label>Card Holder Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_card_holder_name"  placeholder="Card Holder Name"  class="form-control input-sm" id="lms_car_card_holder_name" ng-model="lms_car_card_holder_name" value="" required />               
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_card_holder_name.$dirty" ng-messages="lmsBundle.lms_car_card_holder_name.$error" role="alert">
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
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_relation_insured.$dirty" ng-messages="lmsBundle.lms_car_relation_insured.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Your option</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_salut = "<?php echo $lead_details->cus_title;?>" '>
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
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_salut.$dirty" ng-messages="lmsBundle.lms_car_salut.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Salutation</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_fname = "<?php echo $lead_details->first_name;?>" '>
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="lms_car_fname"  placeholder="Customer First Name"  class="form-control input-sm" id="lms_car_fname" ng-model="lms_car_fname" required />               
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_fname.$dirty" ng-messages="lmsBundle.lms_car_fname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_lname = "<?php echo $lead_details->last_name;?>" '>
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="lms_car_lname"  placeholder="Customer Last Name"   class="form-control input-sm" id="lms_car_lname"  ng-model="lms_car_lname" required/> 
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_lname.$dirty" ng-messages="lmsBundle.lms_car_lname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>


                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_dob = "<?php echo $lead_details->date_of_birth;?>" '>
                        <label>Customer DOB <span class="required"> * </span></label>
                        <input type="text" id="lms_car_dob" name="lms_car_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_dob" date:Picker bundle:Dob required data-date-format="dd-mm-yyyy" value='<?php echo $lead_details->date_of_birth;?>' >
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_dob.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter DOB</div>
                        </div>
                        <div id="error-message-spouse" style="color:red;"></div>
                     </div>
                  </div>

               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_age = "<?php echo $lead_details->cust_age;?>" '>
                     <label>Customer Age <span class="required"> * </span></label>
                     <input type="text" id="lms_car_age" readonly name="lms_car_age" class="form-control input-sm" placeholder="Customer Age" ng-model="lms_car_age" >
                  </div>
               </div>

               <div class="col-md-4">

                  <div class="form-group" ng-init = ' lms_car_pro_marital = "<?php echo $lead_details->marital_status;?>" '>
                     <label>Marital status <span class="required"> * </span></label>
                     <select id="lms_car_pro_marital" name="lms_car_pro_marital" class="form-control input-sm" ng-model="lms_car_pro_marital"  required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                     </select>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_pro_marital.$dirty" ng-messages="lmsBundle.lms_car_pro_marital.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Marital status</div>
                     </div>
                  </div>

               </div>               

               <div class="col-md-4">

                  <div class="form-group" ng-init = ' lms_car_gender = "<?php echo $lead_details->cust_gender;?>" '>
                     <label>Customer Gender
                     </label>  <span class="required"> * </span>
                     <select  class="form-control input-sm" name="lms_car_gender" id="lms_car_gender" ng-model="lms_car_gender" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                     </select>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_gender.$dirty" ng-messages="lmsBundle.lms_car_gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Customer Gender</div>
                     </div>
                  </div>

               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_pan = "<?php echo $lead_details->cust_pan;?>" '>
                     <label>PAN Card
                     </label>  
                     <input type="text" class="form-control input-sm"  placeholder="PAN NUMBER" ID="lms_car_pan" ng-model="lms_car_pan" name="lms_car_pan" MaxLength="10" >
                     
                     
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_add1 = "<?php echo $lead_details->cust_street1;?>" '>
                     <label>Address 1 <span class="required"> * </span>
                     </label>  
                     <textarea class="form-control" placeholder="Address 1" name="lms_car_add1" rows="2" id="lms_car_add1" ng-model="lms_car_add1" required></textarea>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_add1.$dirty" ng-messages="lmsBundle.lms_car_add1.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_add2 = "<?php echo $lead_details->cust_street2;?>" '>
                     <label>Address 2
                     </label><span class="required"> * </span>
                     <textarea class="form-control"  placeholder="Address 2" name="lms_car_add2" rows="2" id="lms_car_add2" ng-model="lms_car_add2" required></textarea>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_add2.$dirty" ng-messages="lmsBundle.lms_car_add2.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 2</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_add3 = "<?php echo $lead_details->cust_street3;?>" '>
                     <label>Address 3
                     </label><span class="required"> * </span>
                     <textarea class="form-control"  placeholder="Address 3" name="lms_car_add3" rows="2" id="lms_car_add3" ng-model="lms_car_add3" required></textarea>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_add3.$dirty" ng-messages="lmsBundle.lms_car_add3.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 3</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_area = "<?php echo $lead_details->cust_area;?>" '>
                     <label>Area
                     </label><span class="required"> * </span>                          
                     <input type="text" name="lms_car_area"  placeholder="Area"   class="form-control input-sm" id="lms_car_area"  ng-model="lms_car_area">
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_zip = "<?php echo $lead_details->cust_zip;?>" '>
                     <label>Pincode
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="lms_car_zip"  MaxLength="6" onkeyup="return postcode_validate(this.value);" placeholder="Pincode "  class="form-control input-sm" id="lms_car_zip" ng-model="lms_car_zip" required >
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_zip.$dirty" class="required" id="post" ng-messages="lmsBundle.lms_car_zip.$error" role="alert">
                        <div ng-message="required"  class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
              <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_state = "<?php echo $lead_details->cust_state;?>" '>
                     <label> State </label>
                     <input list="state" id="lms_car_state" placeholder="Enter the State"  autocomplete="off" name="lms_car_state" class="form-control input-sm" ng-model="lms_car_state"  >
                   
                  </div>
               </div>
         </div>
         <div class="row">
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_city = "<?php echo $lead_details->cust_city;?>" '>
                     <label> City </label>

                     <input type="text" name="lms_car_city" id="lms_car_city" placeholder="Enter the City" autocomplete="on" maxlength="25" class="form-control input-sm" ng-model="lms_car_city" > 
                   
                  </div>
               </div>
               <div class="col-md-4">

                     <div class="form-group" ng-init = ' lms_house_number = "<?php echo $lead_details->cust_house_number;?>" '>
                        <label>House No & Street Name<span class="required"> * </span></label>
                        <input type="text" id="lms_house_number" name="lms_house_number" class="form-control input-sm" placeholder="House Number" ng-model="lms_house_number"> 
                        
                     </div>

               </div>
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_pro_landmark = "<?php echo $lead_details->cust_landmark;?>" '>
                        <label> Nearest Land Mark <span class="required"> * </span></label>
                        <input type="text" name="lms_car_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="lms_car_pro_landmark" ng-model="lms_car_pro_landmark" />
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_pro_landmark.$dirty" ng-messages="lmsBundle.lms_car_pro_landmark.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Landmark</div>
                        </div>
                     </div>
                  </div>
          
          <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_mobile = "<?php echo $lead_details->cust_phone;?>" '>
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="lms_car_mobile" autocomplete="off" name="lms_car_mobile" class="form-control input-sm" placeholder="Mobile Number" onkeypress='return restrictAlphabets(event)' ng-model="lms_car_mobile" MaxLength="10" onkeyup="return mobile_validate(this.value);" mobile:Number:Duplicate placeholder="Mobile" required /> 
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_mobile.$dirty" class="required" id="mobilewar" ng-messages="lmsBundle.lms_car_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div>
                  </div>
               </div>

                  <div class="col-md-4">

                     <div class="form-group" ng-init = ' lms_car_pro_emergency = "<?php echo $lead_details->emergency_contact_num;?>" '>
                        <label>Alternate Contact Number </label>
                        <input type="text" id="lms_car_pro_emergency" autocomplete="off" name="lms_car_pro_emergency" class="form-control input-sm" onkeypress='return restrictAlphabets(event)' placeholder="Mobile Number" ng-model="lms_car_pro_emergency" MaxLength="10" onkeyup="return mobile_validate_emergency(this.value);" placeholder="Mobile" /> 
                      
                     
                     </div>
                   </div>
           
               </div>
                <div class="row">
               <div class="col-md-4">
                  <div class="form-group" ng-init = ' lms_car_email = "<?php echo trim($lead_details->cust_email); ?>" '>
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="email" id="lms_car_email" name="lms_car_email" class="form-control input-sm" placeholder="E-mail" ng-model="lms_car_email" onkeyup="return email_validate(this.value);" required> 
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_email.$dirty" class="required" id="emailwar" ng-messages="lmsBundle.lms_car_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid E-mail</div>
                     </div>
                  </div>
               </div>
                    <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_pro_gstn = "<?php echo $lead_details->GSTIN;?>" '>
                        <label>GSTIN
                       
                        </label>
                        <input type="text" name="lms_car_pro_gstn" placeholder="Enter GSTIN" class="form-control input-sm" id="lms_car_pro_gstn" disabled="lms_car_pro_gstn" ng-model="lms_car_pro_gstn" >
                       
                     </div>
                  </div>
            
               <div class="col-md-4">
                  <div class="form-group" ng-init=' lms_car_cus_type = "individual" '>
                     <label>Customer Type </label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_car_cus_type" ng-model='lms_car_cus_type' ng-value='"corporate"' value="corporate" disabled="corporate" required> Corporate </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" autocomplete="off" name="lms_car_cus_type" ng-model='lms_car_cus_type' ng-value='"individual"' value="individual" ng-checked = "true" required> Individual </label>
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_cus_type.$dirty" ng-messages="lmsBundle.lms_car_cus_type.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Customer Type</div>
                        </div>
                     </div>
                  </div>
               </div>
         <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_customer = "<?php echo $lead_details->cus_customer;?>" '>
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
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_customer.$dirty" ng-messages="lmsBundle.lms_cus_customer.$error" role="alert">
                           <div ng-message="required" class="required">Please Select contact the customer</div>
                        </div>
                     </div>
                  </div>
         </div>
                  <div class="row">
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_language = "<?php echo $lead_details->cus_language;?>" '>
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
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_language.$dirty" ng-messages="lmsBundle.lms_cus_language.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Language for contact</div>
                        </div>
                     </div>
                  </div>

                <!-- Details of lead moved to Lead details -->
          
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_pro_occupation = "<?php echo $lead_details->occupation;?>" '>
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
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_pro_occupation.$dirty" ng-messages="lmsBundle.lms_car_pro_occupation.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Occupation</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_pfee = "<?php echo $lead_details->processing_fee;?>" '>
                        <label>Processing Fee Applicable<span class="required"> * </span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee" ng-model='lms_cus_pfee' ng-value='"0"'  value="0" checked required> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_pfee"  ng-model='lms_cus_pfee' ng-value='"1"'  value="1" required> Yes </label>  
                           <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_pfee.$dirty" ng-messages="lmsBundle.lms_cus_pfee.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Processing Fee Applicable</div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_cardlimt = "<?php echo $lead_details->cus_cardlimt;?>" '>
                        <label>Enhanced Credit Card Limit </label>
                        <input  placeholder="Enhanced Credit Card Limit" id="lms_cus_cardlimt" disabled="lms_cus_cardlimt" name="lms_cus_cardlimt" class="form-control input-sm" ng-model="lms_cus_cardlimt" ng-model="lms_cus_cardlimt"  />

                        <!--
                           <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_cardlimt.$dirty" ng-messages="lmsBundle.lms_cus_cardlimt.$error" role="alert">
                              <div ng-message="required" class="required">Please Enter Enhanced Credit Card Limit</div>
                           </div> -->
                     </div>
                  </div>
</div>
<div class="row">
                   <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_sdate = "<?php echo $lead_details->statement_date;?>" '>
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
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_sdate.$dirty" ng-messages="lmsBundle.lms_cus_sdate.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Statement Date </div>
                        </div>
                     </div>
                  </div>
                 
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_cus_tle = "<?php echo $lead_details->temp_LE;?>" '>
                        <label>Temp LE <span class="required">  *</span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" ng-model='lms_cus_tle' ng-value='"0"'  value="0" checked> No </label>
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_cus_tle" disabled="lms_cus_tle" ng-model='lms_cus_tle' ng-value='"1"' value="1"> Yes </label>  
                           <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_tle.$dirty" ng-messages="lmsBundle.lms_cus_tle.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Temp LE </div>
                           </div>
                        </div>
                     </div>
                  </div>

         

                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_case_id = "<?php echo $lead_details->case_id;?>" '>
                        <label>Case id
                        <span class="required"> * </span>
                        </label>
                        <input type="text" name="lms_car_case_id"  placeholder="Case id"    class="form-control input-sm" id="lms_car_case_id" ng-model="lms_car_case_id" required />
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_case_id.$dirty" ng-messages="lmsBundle.lms_car_case_id.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Case id</div>
                        </div>
                     </div>
                  </div>
               </div>


                 <div class="row maincontf" >

                  <div id="emi_applicalble_outer" ng-if='lms_car_payment_type=="Credit Card"'>
                     <div class="col-md-4">
                        <div class="form-group" ng-init = ' emiObj.lms_cus_emi = "<?php echo $lead_details->cus_emi;?>" '>
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

                           <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_emi.$dirty" ng-messages="lmsBundle.lms_cus_emi.$error" role="alert">
                              <div ng-message="required" class="required">Select your option </div>
                           </div>
                        </div>
                     </div>

                     <div id="emi_yr_outer" ng-if='emiObj.lms_cus_emi=="Yes"'>
                        <div class="col-md-4">
                           <div class="form-group" ng-init = ' emiObj.lms_cus_emi_yr = "<?php echo $lead_details->cus_emi_yr;?>" '>
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
                              <div ng-if="lmsBundle.$submitted || lmsBundle.lms_cus_emi_yr.$dirty" ng-messages="lmsBundle.lms_cus_emi_yr.$error" role="alert">
                              <div ng-message="required" class="required">Select your option </div>
                           </div>

                           </div>
                        </div>
                     </div>
                  </div> <!-- id="emi_applicalble" ends here-->
               </div>  
          
          
<!--first continue button removed -->
        <div> 
            <?php $pa_sum_insured_tenure = json_decode($resultArray->pa_sum_insured_tenure); ?>
            <?php $tenure1Array = ''; ?>
            <?php $tenure2Array = ''; ?>
            <?php $tenure3Array = ''; ?>
            <?php foreach ($pa_sum_insured_tenure as $key => $value) {
              $namevalue = explode('-',$value);
              # code...
              if($namevalue[0] == 1){
                $tenure1Array .= $namevalue[1].',';
              }

              if($namevalue[0] == 2){
                $tenure2Array .= $namevalue[1].',';
              }

              if($namevalue[0] == 3){
                $tenure3Array .= $namevalue[1].',';
              }

            }
            $explodeValue = explode(',',trim($tenure1Array,','));
            $explodeValue1 = explode(',',trim($tenure2Array,','));
            $explodeValue2 = explode(',',trim($tenure3Array,','));
            ?>
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Product details</span>
                  </div>
               </div>
                <div class="row maincontf">
                  <div class="col-md-4">
                    <?php $inputSqlQuery = $this->db->select('pa_sum_insured_tenure')->where(array('pa_user'=>$this->session->userdata('emp_id')))->get('tbl_bundle_pa_selection');   ?>
                     <div class="form-group" ng-init = ' lms_car_sum_insured = "<?php echo $lead_details->sum_insured;?>" '>
                        <label>PA Sum Insured<span class="required"> * </span></label>
                        <?php if($inputSqlQuery->num_rows()>0){ ?>
                        <select id="lms_car_sum_insured" name="lms_car_sum_insured" class="form-control input-sm" ng-model="lms_car_sum_insured" change:Premium:Data required ng-if="lms_car_tenure == '1'">
                           <option value="" disabled selected>Select your option</option>
                           <?php foreach ($this->Bundlemodel->getpasuminsured() as $key => $value) { ?>
                            <?php if(in_array($key, $explodeValue)) { ?>
                           <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                         <?php } } ?>
                        </select>
                        <select id="lms_car_sum_insured" name="lms_car_sum_insured" class="form-control input-sm" ng-model="lms_car_sum_insured" change:Premium:Data required ng-if="lms_car_tenure == '2'">
                           <option value="" disabled selected>Select your option</option>
                           <?php foreach ($this->Bundlemodel->getpasuminsured() as $key => $value) { ?>
                            <?php if(in_array($key, $explodeValue1)) { ?>
                           <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                         <?php } } ?>
                        </select>
                        <select id="lms_car_sum_insured" name="lms_car_sum_insured" class="form-control input-sm" ng-model="lms_car_sum_insured" change:Premium:Data required ng-if="lms_car_tenure == '3'" >
                           <option value="" disabled selected>Select your option</option>
                           <?php foreach ($this->Bundlemodel->getpasuminsured() as $key => $value) { ?>
                            <?php if(in_array($key, $explodeValue2)) { ?>
                           <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                         <?php } } ?>
                        </select>
                        <?php } else { ?>
                          <select id="lms_car_sum_insured" name="lms_car_sum_insured" class="form-control input-sm" ng-model="lms_car_sum_insured" change:Premium:Data required >
                           <option value="" disabled selected>Select your option</option>
                           <?php foreach ($this->Bundlemodel->getpasuminsured() as $key => $value) { ?>
                           <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                         <?php } ?>
                        </select>
                        <?php } ?>           
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_car_sum_insured.$dirty" ng-messages="lmsBundle.lms_car_sum_insured.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Sum Insured</div>
                        </div>
                     </div>

                  </div>
                         <div class="col-md-4">
             <div class="form-group" ng-init = ' lms_include_spouse = "<?php echo $bundleData->bundle_include_spouse; ?>"'>
            <label> Include Spouse </label>
            <input type="checkbox" id="lms_include_spouse" click:Premium:Data include:Spouse name="lms_include_spouse" class="Spouse_ship" placeholder="Premium Amount" ng-model="lms_include_spouse" ng-value='"1"' value='"1"' readonly="" ng-checked = 'lms_include_spouse == "1"'>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_include_spouse.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
            </div>
            </div>
      <!--   -->
          <div class="form-group col-md-4" ng-show = 'lms_include_spouse == "1"' ng-init=' lms_chlds_count = "<?php echo ($bundleData->bundle_child_s ? $bundleData->bundle_child_s : 0); ?>" '>
                        <label> Childs <span class="required"> * </span></label>
                        <div class="radio-list">
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="lms_chlds_count" ng-model='lms_chlds_count' ng-checked = true  value="0" ng-required='lms_include_spouse == "1"' ng-click='changepremiumRadio()'> 0 </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" autocomplete="off" name="lms_chlds_count" ng-model='lms_chlds_count'  value="1" checked ng-required='lms_include_spouse == "1"' ng-click='changepremiumRadio()'> 1 </label>
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" autocomplete="off" name="lms_chlds_count" ng-model='lms_chlds_count'  value="2" checked ng-required='lms_include_spouse == "1"' ng-click='changepremiumRadio()'> 2 </label>
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_chlds_count.$dirty" ng-messages="lmsBundle.lms_chlds_count.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Customer Type</div>
                        </div>
                     </div>
                        
                        </div>
                 
            </div>
      <fieldset>
            
        <div class="row maincontf" ng-show = 'lms_include_spouse == "1" ' >
                        <div class="form-group col-md-4" ng-init=' lms_car_spouse_dob = "<?php echo $bundleData->bundle_spouse_dob; ?>" '>
                        <label> Spouse DOB <span class="required"> * </span></label>
                        <input type="text" date:Picker bundle:Dob id="lms_car_spouse_dob" name="lms_car_spouse_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_spouse_dob" ng-required = ' lms_include_spouse == "1" ' data-date-format="dd-mm-yyyy" value='<?php echo $bundleData->bundle_spouse_dob; ?>'>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_spouse_dob.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required"> Please Enter DOB </div>
                        </div>
                        <div id="error-message-spouse" style="color:red;"></div>
                        
                        </div>
                       
          <div class="form-group col-md-4" ng-show="lms_chlds_count == '1' || lms_chlds_count == '2'" ng-init=' lms_car_child_one_dob = "<?php echo $bundleData->bundle_child_one_dob; ?>" '>
                        <label>Child 1 DOB <span class="required"> * </span></label>
                        <input type="text" date:Picker childs:Dob id="lms_car_child_one_dob" name="lms_car_child_one_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_child_one_dob" ng-required="lms_chlds_count == '1' || lms_chlds_count == '2'" data-date-format="dd-mm-yyyy" value='<?php echo ($bundleData->bundle_child_one_dob ? trim($bundleData->bundle_child_one_dob) : ''); ?>'>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_child_one_dob.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter Child DOB</div>
                        </div>
                        <div id="error-message-child" style="color:red;"></div>
                        </div>
                        
            <div class="form-group col-md-4" ng-show="lms_chlds_count == '2'" ng-init=' lms_car_child_two_dob = "<?php echo $bundleData->bundle_child_two_dob; ?>" '>
                        <label>Child 2 DOB <span class="required"> * </span></label>
                        <input type="text" date:Picker childs:Dob id="lms_car_child_two_dob" name="lms_car_child_two_dob" class="form-control input-sm custom-date-dob" placeholder="DD-MM-YYYY" ng-model="lms_car_child_two_dob" ng-required="lms_chlds_count == '2'" data-date-format="dd-mm-yyyy" value='<?php echo $bundleData->bundle_child_two_dob; ?>'>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_child_two_dob.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter Child DOB</div>
                        </div>
                        <div id="error-message-child" style="color:red;"></div>
                        </div>
            </div>
      <div class="row maincontf" ng-show = 'lms_include_spouse == "1" ' ng-init=' lms_car_spouse_name = "<?php echo $bundleData->bundle_spouse_name; ?>" '>
                        <div class="form-group col-md-4">
                        <label> Spouse Name <span class="required"> * </span></label>
                        <input type="text" id="lms_car_spouse_name" name="lms_car_spouse_name" class="form-control input-sm custom-date-dob" placeholder="Spouse Name" ng-model="lms_car_spouse_name" ng-required = ' lms_include_spouse == "1" ' value=''>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_spouse_name.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required"> Please Enter Name </div>
                        </div>
                        <div id="error-message-spouse" style="color:red;"></div>
                        
                        </div>
                       
          <div class="form-group col-md-4" ng-show="lms_chlds_count == '1' || lms_chlds_count == '2'" ng-init=' lms_car_child_one_name = "<?php echo $bundleData->bundle_child_one_name; ?>" '>
                        <label>Child 1 Name <span class="required"> * </span></label>
                        <input type="text" id="lms_car_child_one_name" name="lms_car_child_one_name" class="form-control input-sm" placeholder="Child 1 name" ng-model="lms_car_child_one_name" ng-required="lms_chlds_count == '1' || lms_chlds_count == '2'" value=''>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_child_one_name.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter Child 1 Name</div>
                        </div>
                        <div id="error-message-child" style="color:red;"></div>
                        </div>
                        
          <div class="form-group col-md-4" ng-show="lms_chlds_count == '2'" ng-init=' lms_car_child_two_name = "<?php echo $bundleData->bundle_child_two_name; ?>" '>
                        <label>Child 2 Name <span class="required"> * </span></label>
                        <input type="text" id="lms_car_child_two_name" name="lms_car_child_two_name" class="form-control input-sm" placeholder="Child 2 Name" ng-model="lms_car_child_two_name" ng-required="lms_chlds_count == '2'" value=''>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_child_two_name.$error" id="dob_error" class="required" role="alert">
                           <div ng-message="required" class="required">Please Enter Child 2 Name</div>
                        </div>
                        <div id="error-message-child" style="color:red;"></div>
                        </div>
            </div>
      <div class="row"> &nbsp; </div>
      <div class="row maincontf">

            <div class="col-md-4 form-group" ng-init = ' lms_car_waller_offering = "<?php echo (!empty($thirdUrl) ? $bundleData->bundle_annual_wallet : '1'); ?>" '>
            <label> Annual Wallet Offering <span class="required"> * </span></label>
            <input type="checkbox" click:Premium:Data id="lms_car_waller_offering" name="lms_car_waller_offering" class="Spouse_ship" placeholder="Premium Amount" ng-model="lms_car_waller_offering" ng-value='"1"' value="1" ng-checked = 'lms_car_waller_offering == "1"'>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_waller_offering.$error" role="alert">
                           <div ng-message="required" class="required">Please select Annual Wallet Offering</div>
                        </div>
                      
            </div>

             <div class="col-md-4 form-group" ng-init = ' lms_bundle_upp = "<?php echo $bundleData->bundle_include_upp; ?>"'>
            <label>UPP Long Term</label>
            <input type="checkbox" click:Premium:Data include:Upp id="lms_bundle_upp" name="lms_bundle_upp" class="lms_bundle_upp" ng-model="lms_bundle_upp" ng-value='"1"' value="1"  ng-checked = 'lms_bundle_upp == "1"'>
                        <!-- <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_bundle_upp.$error" role="alert">
                           <div ng-message="required" class="required">Please select Annual Wallet Offering</div>
                        </div>  -->
            </div>

            <div class="col-md-4 form-group" ng-init = ' lms_car_tenure = "<?php echo ($bundleData->bundle_tenure ? $bundleData->bundle_tenure : 1); ?>" '>
            <label> Tenure  <span class="required"> * </span></label>
            <select id="lms_car_tenure" name="lms_car_tenure" change:Premium:Data class="form-control input-sm" ng-model="lms_car_tenure" ng-change="loadBunldePacv(this)"  required>
                           <option value="1" selected>1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
                        </select>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_tenure.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
            </div>

      <div class="col-md-4 form-group" ng-init = ' lms_car_plan_type = "<?php echo ($bundleData->bundle_plan ? $bundleData->bundle_plan : 1); ?>" '>
            <label> Plan  <span class="required"> * </span></label>
            <select id="lms_car_plan_type" name="lms_car_plan_type" class="form-control input-sm" ng-model="lms_car_plan_type" change:Premium:Data required>
                           <option value="1" selected>Plan 1</option>
                           <?php /*<option value="2">Plan 2</option>
                           <option value="3">Plan 3</option> */ ?>
                        </select>
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_car_plan_type.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Premium Amount</div>
                        </div>
            </div>



      
      </div>

        <!-- upp -->

         <div ng-show = "lms_bundle_upp == '1'">
               <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">UPP Long Term Details</span>
                  </div>
               </div>

               <div class="row maincontf" ng-show = "lms_bundle_upp == '1'">
             <div class="col-md-3">
                  <div class="form-group" ng-init=' lms_bundle_upp_type_loan = "<?php echo ($bundleData->bundle_upp_type_of_loan ? $bundleData->bundle_upp_type_of_loan : ''); ?>" '>
                    <label> Type Of Loan <span class="required"> * </span></label>
                    <select id="lms_bundle_upp_type_loan" name="lms_bundle_upp_type_loan" class="form-control input-sm" ng-model="lms_bundle_upp_type_loan" change:Premium:Data ng-required='lms_bundle_upp == "1"'>
                      <option value="" selected="selected">Select Option</option>
                      <option value="1">Personal Loan</option>
                      <option value="2">Bussiness Loan</option>
                     </select>
                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_bundle_upp_type_loan.$dirty" ng-messages="lmsBundle.lms_bundle_upp_type_loan.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Type Of Loan</div>
                     </div>
                  </div>
               </div>
         
         
         <div class="col-md-3">
            <div class="form-group" ng-init =' lms_bundle_upp_loan_amount = "<?php echo $bundleData->bundle_upp_loan_amount; ?>" '>
                     <label> Loan Amount <span class="required"> * </span></label>
                     <input type="text" placeholder="Loan Amount" class="form-control input-sm" name="lms_bundle_upp_loan_amount" id="lms_bundle_upp_loan_amount" ng-model="lms_bundle_upp_loan_amount" value="<?php echo $lead_details->cust_email; ?>" upp:loan:amount change:Premium:Data ng-required='lms_bundle_upp == "1"'>

                     <div ng-if="lmsBundle.$submitted || lmsBundle.lms_bundle_upp_loan_amount.$dirty" class="required" id="emailwar" ng-messages="lmsBundle.lms_bundle_upp_loan_amount.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Loan Amount</div>
                     </div>
                     <div id="error-loan-Amount" class="required"></div>
                     
                  </div>

               </div>
    
         <div class="col-md-3">
            <div class="form-group" ng-init=' lms_bundle_upp_age = "<?php echo $lead_details->cust_age; ?>" '>
                     <label> Age <span class="required"> * </span></label>
                     <input placeholder="Age" class="form-control input-sm" name="lms_bundle_upp_age" id="lms_bundle_upp_age" change:Premium:Data ng-model="lms_bundle_upp_age" value="" disabled>
                     <!-- <div ng-if="lmsBundle.$submitted || lmsBundle.lms_bundle_upp_age.$dirty" ng-messages="lmsBundle.lms_bundle_upp_age.$error" role="alert" >
                        <div ng-message="required" class="required">Please Enter Age</div>
                     </div> -->
                     <div class="required" id="error-age-message"></div>
                  </div>
              </div>
                   <div class="col-md-3" ng-init = ' lms_bundle_upp_tenure = "<?php echo ($bundleData->bundle_upp_tenure ? $bundleData->bundle_upp_tenure : ''); ?>" '>
                     <div class="form-group">
                        <label>Tenure<span class="required"> * </span></label>
                        <select name="lms_bundle_upp_tenure" class="form-control input-sm" id="lms_bundle_upp_tenure" ng-model="lms_bundle_upp_tenure" upp:loan:amount change:Premium:Data ng-required='lms_bundle_upp == "1"'>
                              <option value="" selected="" disabled="">Select Option</option>
                              <?php foreach (getupplongterm() as $key => $value) { ?>
                              <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                            <?php } ?>
                           </select>
                        <div ng-if="lmsBundle.$submitted || lmsBundle.lms_bundle_upp_tenure.$dirty" ng-messages="lmsBundle.lms_bundle_upp_tenure.$error" class="required" id="lms_bundle_upp_tenure" role="alert">
                           <div ng-message="required" class="required">Please Enter Tenure</div>
                        </div>
                     </div>
                  </div>
               </div>     <br>

             </div>
      
    

      <div class="row maincontf">
            <div class="portlet-title tabbable-line">
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase" style="padding-left: 17px;">Premium Details</span>
                  </div>
               </div>

                 <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_est_premium = "<?php echo ($bundleData->bundle_premium_amount? $bundleData->bundle_premium_amount : '0');?>" '>
                        <label> Bundle PA Premium Amount<span class="required"> * </span></label>
                       
                        <input type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Bundle PA Premium Amount" ng-model="lms_est_premium" readonly="">
                        <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.lms_est_premium.$error" role="alert">
                           <div ng-message="required" class="required">Bundle Pa Premium Amount</div>
                        </div>
                     </div>
                  </div>  
     

       
                 <div class="col-md-4">
                     <div class="form-group" ng-init = ' upp_tot_pre = "<?php echo ($bundleData->bundle_upp_total_prem? $bundleData->bundle_upp_total_prem : '0');?>" '>
                        <label>UPP Long Term Premium Amount<span class="required"> * </span></label>
                       
                        <input type="text" id="upp_tot_pre" name="upp_tot_pre" class="form-control input-sm number-validate" placeholder="UPP Long Term Premium Amount" ng-model="upp_tot_pre" readonly="">
                        <!-- <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.upp_tot_pre.$error" role="alert">
                           <div ng-message="required" class="required">UPP Long Term Premium Amount</div>
                        </div> -->
                     </div>
                  </div>  
       
                 <div class="col-md-4">
                     <div class="form-group" ng-init = ' total_premium = "<?php echo ($bundleData->total_premium? $bundleData->total_premium : '0');?>" '>
                        <label>Total Premium<span class="required"> * </span></label>
                       
                        <input type="text" id="total_premium" name="total_premium" class="form-control input-sm number-validate" placeholder="Total Premium Amount" ng-model="total_premium" readonly="">
                        <!-- <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.total_premium.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Total Premium Amount</div>
                        </div> -->
                     </div>
                  </div>  
                 </div>  
      
            </fieldset>
        </div>

               

 <input style="display: none" type="text"  id="pa_sum" name="pa_sum" ng-model="pa_sum">
 <input style="display: none" type="text" id="acci_hosp" name="acci_hosp" ng-model="acci_hosp">
 <input style="display: none" type="text"  id="credit_shied" name="credit_shied"   ng-model="credit_shied">
 <input style="display: none" type="text"  id="critical_ill" name="critical_ill"   ng-model="critical_ill">
    
        <div>

               <div class="portlet-title tabbable-line">
               <br/><br/><br/><br/>
                  <div class="caption leadtit">
                     <i class="icon-globe font-dark hide"></i>
                     <span class="caption-subject font-dark bold uppercase">Personal Accident Proposal</span>
                  </div>
               </div>

             
                        <div class="row maincontf">
                           <div class="col-md-4">
                             
                  <div class="form-group" ng-init = ' pa_pro_policy_sdate = "<?php echo $lead_details->new_policy_start;?>" '>
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" date:Picker id="pa_pro_policy_sdate" name="pa_pro_policy_sdate" class="form-control input-sm custom-date-after" placeholder="DD-MM-YYYY" ng-model="pa_pro_policy_sdate" required data-date-format="dd-mm-yyyy" proposed:Date:Check value='<?php echo $lead_details->new_policy_start;?>'>
                     <div ng-if="lmsBundle.$submitted" ng-messages="lmsBundle.pa_pro_policy_sdate.$error" id="dob_error" class="required" role="alert">
                        <div ng-message="required" class="required">Please Enter policy start date</div>
                     </div>
           <div id="check-policy-date"></div>
                  </div>

                              
                           </div>
                        </div>
      
                      
                         <h4 class="propsal-seperator">Nominee Details</h4>
                     <hr>
                           <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nname = "<?php echo $lead_details->nominee_name;?>" '>
                                 <label>Name of Nominee for Primary Insured
                                 <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_nname" placeholder="Enter Name of Nominee " class="form-control input-sm" id="pa_pro_nname" ng-model="pa_pro_nname" required />
                                 <div ng-if="lmsBundle.$submitted || lmsBundle.pa_pro_nname.$dirty" ng-messages="lmsBundle.pa_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Name of Nominee </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nomie_relation = "<?php echo $lead_details->nominee_relationship;?>" '>
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
                                 <div ng-if="lmsBundle.$submitted || lmsBundle.pa_pro_nomie_relation.$dirty" ng-messages="lmsBundle.pa_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nomie_age = "<?php echo $lead_details->nominee_age;?>" '>
                                 <label> Nominee Age <span class="required"> * </span></label>
                                 <input type="text" name="pa_pro_nomie_age" placeholder="Enter Nominee Age" maxlength="2" class="form-control input-sm age-validate" id="pa_pro_nomie_age" ng-model="pa_pro_nomie_age" onkeypress='return restrictAlphabets(event)' required/>
                                 <div ng-if="lmsBundle.$submitted || lmsBundle.pa_pro_nomie_age.$dirty" ng-messages="lmsBundle.pa_pro_nomie_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Age</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_nameofappoint = "<?php echo $lead_details->appointee_name;?>" '>
                                 <label> Name Of Appointee</label>
                                 <input type="text" name="pa_pro_nameofappoint" placeholder="EnterName Of Appointee" class="form-control input-sm" id="pa_pro_nameofappoint" ng-model="pa_pro_nameofappoint" />
                                  <div ng-if="lmsBundle.$submitted || lmsBundle.pa_pro_nameofappoint.$dirty" ng-messages="lmsBundle.pa_pro_nameofappoint.$error" role="alert">
                                    <div ng-message="required" class="required">Please EnterName Of Appointee</div>
                                 </div> 
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group" ng-init = ' pa_pro_appoint_relation = "<?php echo $lead_details->appointee_relationship;?>" '>
                                 <label>Appointee Relationship with nominee</label>
                                 <select id="pa_pro_appoint_relation" name="pa_pro_appoint_relation" class="form-control input-sm" ng-model="pa_pro_appoint_relation" >
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

                        <br>
                        <h4 class="propsal-seperator">Add New Comment </h4>
                        <hr>
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
                           <div ng-if="lmsBundle.$submitted || lmsBundle.declaration.$dirty" ng-messages="lmsBundle.declaration.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept Decleration</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12">&nbsp;</div>

                        <div class="col-md-12">
                           <input class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="0" required />
                           <label> Premium Payment has not been done through cash mode </label><span class="required">*</span>
                           <div ng-if="lmsBundle.$submitted || lmsBundle.premiumPayment.$dirty" ng-messages="lmsBundle.premiumPayment.$error" role="alert">
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
                          <input type="hidden" name="hiddenLeadid" id="hiddenLeadid" value="<?php echo $this->session->userdata('emp_id'); ?>">
                           <input type="submit" class="btn blue btn-default send_quote" id="saveleadbundleData" value="Save Lead">
                        </div>
                     </div>
                  </div>
               </div>
           </div>
         </form>
      </div>
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
</div>
<script type="text/javascript">
function restrictAlphabets(e){
var x=e.which||e.keycode;
if((x>=48 && x<=57) || x==8 ||
(x>=35 && x<=40)|| x==46)
return true;
else
return false;
}
$('.pa_pro_medication').on('click',function(){
var  similarOpt = $(this).val();
if(similarOpt == 1 ){
$('#similar_policy_comment_div').show('slow');
} else {
$('#similar_policy_comment_div').hide('slow');
}
});   
</script>
<script>
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
data : {'state_id' : state_id},
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
$('#lms_car_dob').on('change', function(){
$('#lms_car_age').val('');
$('#lms_bundle_upp_age').val('');
var date2 = $('#lms_car_dob').val();
var travel_age = calculateCustomer_age(date2);
if (isNaN(travel_age)) {
return false;
} else {
$('#lms_car_age').val(travel_age);
$('#lms_bundle_upp_age').val(travel_age);

}
});

function calculateCustomer_age(date2) {
var selectedDate = date2.toString();
var splitdate = selectedDate.split('-');
var yearThen = parseInt(splitdate[2]);
var monthThen = parseInt(splitdate[1]);
var dayThen = parseInt(splitdate[0]);
var birthday = new Date(yearThen, monthThen-1, dayThen);
var today = new Date();
var differenceInMilisecond = today.valueOf() - birthday.valueOf();
var years = Math.floor(differenceInMilisecond / 31536000000);
return years;
}
</script>
</body>
</html>
