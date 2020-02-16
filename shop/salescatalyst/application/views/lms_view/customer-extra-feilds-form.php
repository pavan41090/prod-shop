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
