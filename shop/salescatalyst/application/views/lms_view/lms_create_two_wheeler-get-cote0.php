<script src="<?php echo base_url(); ?>assets/js/lms_js/lms-two-wheeler-get-quote.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="get quote">
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

<form id="twowheelData" name="lmsCar" two:Wheel:Premium:Cal novalidate>
<div class="tab-content">
  
   <div class="tab-pane fade active in" id="car">
       <div>
            <div class=".carhide" id="cardeatail">
            <div> &nbsp; </div>
               <div class="row maincontf">
			       <div class="col-md-4">
                  <div class="form-group">
                     <label> Cover Type <span class="required"> * </span></label>
					   <?php $arrayCoverType = array('1'=>'Comprehensive'); ?>
                       <select id="lms_two_wheeler_cover_type" name="lms_two_wheeler_cover_type" class="form-control input-sm" required>
                        <?php foreach($arrayCoverType as $ct) { ?>
						        <option value="<?php echo $ct; ?>"><?php echo $ct; ?></option>
						<?php } ?>
                     </select>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_cover_type.$dirty" ng-messages="lmsCar.lms_two_wheeler_cover_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Cover Type</div>
                     </div>
                  </div>
               </div>
			   
			   
			   <div class="col-md-4">
            <div class="form-group">
                     <label> Registration Number <span class="required"> * </span></label>
                     <input maxlength=11 class="form-control input-sm" name="lms_two_wheeler_reg_no" id="lms_two_wheeler_reg_no" ng-model="lms_two_wheeler_reg_no" registration:Number style="text-transform: uppercase;" value="" placeholder="Registration Number">
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_reg_no.$dirty" ng-messages="lmsCar.lms_two_wheeler_reg_no.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Registration Number</div>
                     </div>
                     
                  </div>
				  <div class="form-group" id="loadRegisterNumber"></div>
               </div>
			   
			   <div class="col-md-4">
                  <div class="form-group">
                     <label> Manufacturing Year <span class="required"> * </span></label>
					 <?php $startYear = 2019; ?>
                     <select id="lms_two_wheeler_man_year" ng-model="lms_two_wheeler_man_year" placeholder="Manufacturing Year" name="lms_two_wheeler_man_year" class="form-control input-sm" manufacturing:Year>
                        <option value="" disabled selected>Select Manufacturing Year</option>
                        <?php for($i=$startYear; $i>=($startYear-15); $i--){ ?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php } ?>
                     </select>
					 <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_man_year.$dirty" ng-messages="lmsCar.lms_two_wheeler_reg_no.$error" role="alert">
                        <div ng-message="required" class="required">Please select Manufacturing Year</div>
                     </div>
                  </div>
               </div>
			   </div>
			   <div class="row maincontf">
			   
			   <div class="col-md-4">
                  <div class="form-group">
                     <label> City of Registration <span class="required"> * </span></label>
					 <input list="cityRegistration" class="form-control input-sm" placeholder="City of Registration" name="lms_two_wheeler_city_registration" id="lms_two_wheeler_city_registration" value="" ng-model="lms_two_wheeler_city_registration" readonly="readonly">
                 </div>
               </div>
			   
			   <div class="col-md-4">
                  <div class="form-group">
                     <label> Manufacturer <span class="required"> * </span></label>
                     <select class="form-control input-sm" placeholder="Select Make" name="lms_two_wheeler_make" id="lms_two_wheeler_make" ng-model="lms_two_wheeler_make" change:Make:Dir>
                        <option value="" disabled selected> Select Make </option>
                  </select>
                     
                  </div>
				  <div class="form-group" id="loadManufacurer"></div>
               </div>
			   <div class="col-md-4">
                  <div class="form-group">
                  <label> Model Varient <span class="required"> * </span></label>
					 <select list="modelvariantsList" class="form-control input-sm" placeholder="Select City of Registration" name="lms_two_wheeler_model" id="lms_two_wheeler_model" ng-model="lms_two_wheeler_model" change:Model:Dir>
                   <option value="" ng-selected="true">Select Model</option>
                </select>
				
                  </div>   
               </div>
               </div>
			<div class="row maincontf">
				<div class="col-md-4" ng-init='lms_two_wheeler_registration_date=""'>
					<div class="form-group">
						<label> Registration Date <span class="required"> * </span> </label>
					 <input class="form-control input-sm custom-date" placeholder="DD-MM-YYYY" name="lms_two_wheeler_registration_date" id="lms_two_wheeler_registration_date" ng-model="lms_two_wheeler_registration_date" value="" ng-change="phoneNumberPattern()">
                      
                  </div>

               </div>	
                   <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_tenure = "1" '>
                        <label>Tenure<span class="required"> * </span></label>
                        <select name="lms_car_tenure" class="form-control input-sm" id="lms_car_tenure" ng-model="lms_car_tenure">
                              <option value="" disabled selected>Select Tenure</option>
                              <?php for($l=3;$l>=1;$l--){ ?>
                              <option value="<?php echo $l; ?>"><?php echo $l; ?></option>
                            <?php } ?>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_tenure.$dirty" ng-messages="lmsCar.lms_car_tenure.$error" class="required" id="lms_car_tenure" role="alert">
                           <div ng-message="required" class="required">Please Enter Tenure</div>
                        </div>
                     </div>
                  </div>
				  
               </div>
		   <div class="row maincontf">
			 <div class="col-md-4">
			  <div class="form-group">
			<label> Previous policy details available <span class="required"> * </span></label>
				   <div class="radio-list" ng-init = ' lms_motor_pyp_available = "0" '>
							   <label class="radio-inline" style="font-size:12px;">
							   <input type="radio" id="lms_motor_pyp_available" name="lms_motor_pyp_available" ng-model="lms_motor_pyp_available" value='1' required> Yes </label> 
							   <label class="radio-inline" style="font-size:12px;">
							   <input type="radio" id="lms_motor_pyp_available" name="lms_motor_pyp_available" ng-model="lms_motor_pyp_available" value='0' required> No </label> 
							   <div ng-if="lmsCar.$submitted || lmsCar.lms_car_claim_policy.$dirty" ng-messages="lmsCar.lms_car_claim_policy.$error" role="alert">
								  <div ng-message="required" class="required">Please Select Claim in expiring policy</div>
							   </div>
							</div>
							</div>
							</div>
                    <div class="col-md-4">
                     <div class="form-group" ng-show = ' lms_motor_pyp_available == "1" '>
                        <label>Policy start date <span class="required"> * </span></label>
                        <input id="lsm_car_pyp_starts_date" name="lsm_car_pyp_starts_date" class="form-control input-sm custom-date" placeholder="Policy Start Date" value="" ng-model="lsm_car_pyp_starts_date" date:Picker data-date-format="dd-mm-yyyy" >
                       <!-- -->
                        <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lsm_car_pyp_starts_date.$error" role="alert">
                          <!--   -->
                           <div class="required" ng-message="required"> Please Select Policy Expire Date </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group" ng-show = ' lms_motor_pyp_available == "1" '>
                        <label> Policy expiry Date <span class="required"> * </span></label>
                        <input id="lsm_car_pyp_ends_date" name="lsm_car_pyp_ends_date" class="form-control input-sm custom-date" placeholder="Policy Expire Date" ng-model="lsm_car_pyp_ends_date" value="" date:Picker policy:Expire:Date data-date-format="dd-mm-yyyy">
                        <!--   -->
                        <div ng-if="lmsCar.$submitted" ng-messages="lmsCar.lsm_car_pyp_ends_date.$error" role="alert">
                          <!--    -->
                           <div class="required" ng-message="required">Please Select Policy Expire Date</div>
                        </div>
                     </div>
                   
                      </div>
			       </div>
               <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label> IDV <span class="required"> * </span> </label>
                        <input type="text" id="lms_car_idv" name="lms_car_idv" ng-model="lms_car_idv"  value="" class="form-control input-sm" placeholder="IDV Amount"/>
                     </div>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_idv.$dirty" ng-messages="lmsCar.lms_car_idv.$error" role="alert">
                        <div ng-message="required" class="required">Please IDV</div>
                     </div>
					 <div class="form-group" id="loadIDVValue">
                  </div>
                  </div>
                  
               
                  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_claim_policy ="0" '>
                        <label>Claim in expiring policy <span class="required">  </span></label>                          
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_claim_policy" id="lms_car_claim_policy" ng-model='lms_car_claim_policy' value="1" > Yes </label>  

                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_claim_policy" id="lms_car_claim_policy" ng-model='lms_car_claim_policy' value="0" > No </label>
                           
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_claim_policy.$dirty" ng-messages="lmsCar.lms_car_claim_policy.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Claim in expiring policy</div>
                           </div>
                        </div>
                     </div>
                  </div>
				  
				  <div class="col-md-4">
                     <div class="form-group" ng-init = ' lms_car_valid_license = "0" '>
                        <label>Valid License<span class="required"> * </span></label>
                        <div class="radio-list" >
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_valid_license" ng-model='lms_car_valid_license' value="1" required> Yes </label> 

                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_valid_license" ng-model='lms_car_valid_license' value="0" required> No </label>

                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_valid_license.$dirty" ng-messages="lmsCar.lms_car_valid_license.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Valid License</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
               <div class="row maincontf"><div class="col-md-6"><div class="slidecontainer"> &nbsp; </div></div><div class="col-md-6"></div></div>
               <div class="row maincontf">
                <div class="col-md-4">
                 
                     <div class="form-group" ng-init = ' lms_car_pro_prev_stand_alone ="0" '>
                        <label>Was the previous policy a Standalone Third party policy? <span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_stand_alone" ng-model='lms_car_pro_prev_stand_alone' ng-value="1" value="1" tp:Policy required /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_stand_alone" ng-model='lms_car_pro_prev_stand_alone' ng-value="0"  value="0" tp:Policy required /> No </label>
                        </div>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_prev_stand_alone.$dirty" ng-messages="lmsCar.lms_car_pro_prev_stand_alone.$error" class="required" id="premium-validate" role="alert">
                           <div ng-message="required" class="required">Please Select previous policy a Standalone Third party policy</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">

                     <div class="form-group" ng-init = ' lms_car_pro_prev_depre = "0" '>
                        <label> Depreciation cover included in the previous policy? <span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:13px; padding-left: 18px;">
                           <input type="radio" name="lms_car_pro_prev_depre" id="lms_car_pro_prev_depre_yes" ng-model='lms_car_pro_prev_depre' value="1" dep:Previous:Policy required /> Yes </label>
                           <label class="radio-inline" style="font-size:13px;">
                           <input type="radio" name="lms_car_pro_prev_depre" id="lms_car_pro_prev_depre_no" ng-model='lms_car_pro_prev_depre' value="0" dep:Previous:Policy required /> No </label>
                        </div>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_pro_prev_depre.$dirty" ng-messages="lmsCar.lms_car_pro_prev_depre.$error" class="required" id="premium-validate" role="alert">
                           <div ng-message="required" class="required">Please Select Depreciation cover</div>
                        </div>
                     </div>
                  </div>
				  <div class="col-md-4">
                     
                     <div class="form-group" ng-show = ' lms_car_valid_license == "1" '>
                      
                      <label>Is Existing PA Policy<span class="required"> * </span></label>
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" name="lms_car_existing_pa_policy" id="lms_car_existing_pa_policy" ng-model='lms_car_existing_pa_policy' value="1" required> Yes </label> 

                           <label class="radio-inline" style="font-size:12px;">
                           <input type="radio" id="lms_car_existing_pa_policy" name="lms_car_existing_pa_policy" ng-model='lms_car_existing_pa_policy' value="0" required> No </label>
                         </div>
                           <div ng-if="lmsCar.$submitted || lmsCar.lms_car_existing_pa_policy.$dirty" ng-messages="lmsCar.lms_car_existing_pa_policy.$error" role="alert">
                              <div ng-message="required" class="required">Please Select Is Existing PA Policy</div>
                           </div>
                        
                     </div>
                  </div>
              </div>
             
                <div class="row maincontf">
                  <div class="col-md-4" ng-show = ' lms_car_existing_pa_policy == "1" '>
                     <div class="form-group">
                        <div class="radio-list">
                           <label class="radio-inline" style="font-size:12px;">
                           <input type="checkbox" name="lms_car_valid_license_declaration" ng-model='lms_car_valid_license_declaration' value="1"> <pre>Declaration to be added for existing PA cover elsewhere, with SI at least of 15 L. </pre> </label>
                           <div >
                              <div class="required"></div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
                  
               </div>

               
			   <div class="row maincontf">
			   <div class="col-md-4">
                     <div class="form-group" ng-if= ' lms_car_pro_prev_stand_alone == "0" '>
                           <label>NCB in Expiring policy( % ) <span class="required"> * </span></label>
                           <select name="lms_car_ncb" class="form-control input-sm" id="lms_car_ncb" ng-model="lms_car_ncb" ng-disabled = ' lms_car_claim_policy == "1" || lms_motor_pyp_available == "0" || lms_car_pro_prev_stand_alone == "1" '>
                              <option value="" disabled selected>Select your option</option>
                              <?php foreach (ncbVales() as $key => $value) { ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                              <?php } ?>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_ncb.$dirty" ng-messages="lmsCar.lms_car_ncb.$error" role="alert">
                              <div ng-message="required" class="required">Please Select NCB in Expiring policy( % )</div>
                           </div>
                     </div>
					 <div class="form-group" ng-if= ' lms_car_pro_prev_stand_alone == "1" '>
                           <label>NCB in Expiring policy( % ) <span class="required"> * </span></label>
                           <select name="lms_car_ncb" class="form-control input-sm" id="lms_car_ncb" ng-model="lms_car_ncb" ng-disabled = ' lms_car_claim_policy == "1" || lms_motor_pyp_available == "0" || lms_car_pro_prev_stand_alone == "1" '>
                              <option value="" disabled selected>Select your option</option>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.lms_car_ncb.$dirty" ng-messages="lmsCar.lms_car_ncb.$error" role="alert">
                              <div ng-message="required" class="required">Please Select NCB in Expiring policy( % )</div>
                           </div>
                     </div>
                  </div>
			   </div>
			   <div class="row maincontf">
                <div class="pull-right">
                <div id="loader-check" ng-show="getclickEnable"><img src="<?php echo base_url().'assets/images/ajax-loader.gif'; ?>"></div>
                
                <div class="form-group">
                <button type="submit" name="submit" id="submit" class="btn blue btn-default">Get Quote</button>
                </div>
               </div>
               </div>
			   <div class="row maincontf">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Premium Amount<span class="required"> * </span></label>
                       
                       <input readonly type="text" id="lms_est_premium" name="lms_est_premium" class="form-control input-sm number-validate" placeholder="Premium Amount" ng-model="lms_est_premium" value="" >
                        
                     </div>
                  </div>
                  </div>
              
            </div>
  </div>
  <div>
	
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
</body>
</html>