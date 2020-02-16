<script src="<?php echo base_url(); ?>assets/js/qms_js/tw.js"></script>
<div class="tab-content">
   <div class="tab-pane fade " id="car">
      TAB 1
   </div>
   <div class="tab-pane fade active in" id="two">
      <div ng-controller="MainCtrl">
         <form name="quoteTwo" novalidate >
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">create Quote</span>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="tw_first_name"  placeholder="Customer First Name"  class="form-control input-sm" id="tw_first_name" ng-model="tw_first_name" required />               
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_first_name.$dirty" ng-messages="quoteTwo.tw_first_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="tw_last_name"  placeholder="Customer Last Name"   class="form-control input-sm" id="tw_last_name"  ng-model="tw_last_name" required/> 
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_last_name.$dirty" ng-messages="quoteTwo.tw_last_name.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>DOB
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="tw_dob"  placeholder="DD-MM-YYYY" class="form-control input-sm" id="tw_dob" ng-model="tw_dob" onkeyup="return dob_validate(this.value);"   required />
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_dob.$dirty" class="required" id="dobalert" ng-messages="quoteTwo.tw_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter DOB</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label> State <span class="required"> * </span></label>
                     <input list="state" placeholder="Select State" id="tw_state" name="tw_state" class="form-control input-sm" ng-model="tw_state" required>
                     <datalist id="state">
                        <option value="">Select State</option>
                        <?php 
                           foreach($stateArray as $state )
                           {
                               echo '<option value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_state.$dirty" ng-messages="quoteTwo.tw_state.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter State</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> City <span class="required"> * </span></label>
                     <div id="tw_city_loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="tw_city_div" style="">
                        <input list="city" id="tw_city" name="tw_city" placeholder="Select city" class="form-control input-sm" ng-model="tw_city" required>
                        <datalist id="city">
                           <option value="">Select city</option>
                        </datalist>
                        <div ng-if="quoteTwo.$submitted || quoteTwo.tw_city.$dirty" ng-messages="quoteTwo.tw_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div>
                  </div>
               </div>
                 <div class="col-md-4">
                  <div class="form-group">
                     <label>Pincode<span class="required"> * </span></label>                          
                     <input type="text" name="tw_zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="tw_zip" ng-model="tw_zip" required >

                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_zip.$dirty" class="required" id="post" ng-messages="quoteTwo.tw_zip.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">

               <div class="col-md-4">
                  <div class="form-group">
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="email" id="tw_email" name="tw_email" class="form-control input-sm" placeholder="E-mail" ng-model="tw_email" onkeyup="return email_validate(this.value);"  required /> 
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_email.$dirty" class="required" ng-messages="quoteTwo.tw_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter E-mail</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="tw_mobile" name="tw_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="tw_mobile" MaxLength="10" onkeyup="return mobile_validate(this.value);" required /> 
                     <div ng-if="quoteTwo.$submitted || quoteTwo.mobiletwo.$dirty" class="required" ng-messages="quoteTwo.tw_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Mobile Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Client Type <span class="required"> * </span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="tw_client_type" ng-model='tw_client_type' checked ng-value='"Individual"'  value="individual" required> Individual </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="tw_client_type"  ng-model='tw_client_type' ng-value='"Corporate"'  value="corporate" required> Corporate </label>                                
                     </div>
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_client_type.$dirty" ng-messages="quoteTwo.tw_client_type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Client Type</div>
                     </div>
                  </div>
               </div>
            </div>
            <!--End crate leads-->
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Registration Number
                     <span class="required"> * </span></label>
                     <input type="text" id="tw_reg_no" name="tw_reg_no" class="form-control input-sm" placeholder="Registration Number" ng-model="tw_reg_no" required />
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_reg_no.$dirty" ng-messages="quoteTwo.tw_reg_no.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Registration Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Year of manufacture
                     <span class="required"> * </span></label>                          
                     <input list="Year of manufacture" placeholder="Year of manufacture" name="tw_manufacture_year" id="tw_manufacture_year" class="form-control input-sm" ng-model="tw_manufacture_year" required>
                     <datalist id="Year of manufacture">
                        <option value="">Year of manufacture</option>
                        <?php 
                           $now = date('Y');
                           $then = $now - 9;
                           
                           // THEN USE WITH THIS //
                           $years = range( $now, $then );
                           
                           foreach( $years as $v ) {
                              echo "<option value=".$v.">".$v."</option>";
                           }
                           ?>
                     </datalist>
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_manufacture_year.$dirty" ng-messages="quoteTwo.tw_manufacture_year.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Year of manufacture</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Manufacturer
                     <span class="required"> * </span></label>  
                     <?php ?>
                     <input list="Manufacturer" placeholder="Select Manufacturer" id="tw_manufacturer" name="tw_manufacturer" class="form-control input-sm" ng-model="tw_manufacturer" required>
                     <datalist id="Manufacturer">
                        <option value="">Select Manufaturer</option>
                        <?php echo $carbrandArray; ?>
                        <?php foreach($carbrandArray as $carbrand) {
                           echo '<option value="'.$carbrand.'">'.$carbrand.'</option>';
                           } 
                           ?>
                     </datalist>
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_manufacturer.$dirty" ng-messages="quoteTwo.tw_manufacturer.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Manufacturer</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Model Varient <span class="required"> * </span></label>
                     <div id="tw_variant_loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="tw_variant_div" style="">
                        <input list="tw_vary" id="tw_variant" placeholder="Select model variants" name="tw_variant" class="form-control input-sm" ng-model="tw_variant" required>
                        <datalist id="tw_vary">
                           <option value="">Select model variants</option>
                       </datalist>
                        <div ng-if="quoteTwo.$submitted || quoteTwo.tw_variant.$dirty" ng-messages="quoteTwo.tw_variant.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Model Varient</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>City of Registration <span class="required"> * </span></label>
                     <input list="cityofreg" placeholder="City of Registration" id="tw_reg_city" name="tw_reg_city" class="form-control input-sm" ng-model="tw_reg_city" required>
                     <datalist id="cityofreg">
                        <option value="Select City"></option>
                        <?php 
                           foreach($city as $cval )
                           {
                               echo '<option value="'.$cval.'">'.$cval.'</option>';
                           }
                           ?>                                       
                     </datalist>
                     <input type="hidden" name="car_state" id="car_state" ng-model='car_state'>
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_reg_city.$dirty" ng-messages="quoteTwo.tw_reg_city.$error" role="alert">
                        <div ng-message="required" class="required">Please Select City of Registration</div>
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Tenure
                     <span class="required"> * </span></label>                          
                     <input list="tenure" placeholder="Select Tenure" class="form-control input-sm" name="tw_tenure" id="tw_tenure" ng-model="tw_tenure">
                     <datalist id="tenure">
                        <option value="">Select Tenure</option>
                        <option>1 year</option>
                        <option>2 year</option>
                        <option>3 year</option>
                     </datalist>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>IDV <span class="required"> * </span></label>
                     <input type="hidden" id="caractualamount" name="caractualamount" />
                     <input type="hidden" id="tw_amount" name="tw_amount" class="form-control input-sm" placeholder="" ng-model="tw_amount"/>
                     <input type="hidden" id="car_cc" name="car_cc" class="form-control input-sm" />
                     <input type="hidden" id="car_fuel" name="car_fuel" class="form-control input-sm" />
                     <input type="hidden" id="car_seating" name="car_seating" class="form-control input-sm" />
                     <input type="text" id="car_idvamount" name="idvamount" ng-model="idvamount" class="form-control input-sm" placeholder="IDV Amount11"/>
                  </div>
                  <div class="slider-wrapper">
                     <input type="text" class="js-decimal" />
                     <label class="display-box-label"></label><br />
                     <div id="js-display-decimal" class="display-box"></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Claim in Expiry Policy <span class="required"> * </span></label>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="tw_claim_policy" ng-model='tw_claim_policy' checked ng-value='"0"'  value="0"  required> Yes </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="tw_claim_policy"  ng-model='tw_claim_policy' ng-value='"1"'  value="1" required> No </label>                                
                     </div>
                     <div ng-if="quoteTwo.$submitted || quoteTwo.tw_claim_policy.$dirty" ng-messages="quoteTwo.tw_claim_policy.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Claim in Expiry Policy</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <div id="value_disable">
                        <label>NCB in Expiring policy (%) </label>  
                        <input list="ncb" name="tw_ncb_value" placeholder=" Select NCB in Expiring policy" class="form-control input-sm" id="tw_ncb_value" ng-model="tw_ncb_value">
                        <datalist id="ncb">
                           <option value="">NCB in Expiring policy</option>
                           <option value="0"></option>
                           <option value="20"></option>
                           <option value="25"></option>
                           <option value="35"></option>
                           <option value="45"></option>
                           <option value="55"></option>
                           <option value="65"></option>
                       </datalist>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Previous Policy Available</label> <span class="required">  </span>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="tw_prv_policy" ng-model='tw_prv_policy' ng-value='"0"'  value="0" checked> No </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="tw_prv_policy"  ng-model='tw_prv_policy' ng-value='"1"'  value="1"> Yes </label>                                
                     </div>
                  </div>
               </div>
               <div class="business-fields">
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Policy Start Date <span class="required"> * </span></label>  
                        <input type="text" id="tw_prv_plcy_start_date" name="tw_prv_plcy_start_date" class="form-control input-sm" placeholder="Policy Start Date" ng-model="tw_prv_plcy_start_date">
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label>Policy End Date
                        <span class="required"> * </span></label>                          
                        <input type="text" id="tw_prv_plcy_end_date" name="tw_prv_plcy_end_date" class="form-control input-sm" placeholder="Policy End Date" ng-model="tw_prv_plcy_end_date">
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-2">
                  <div class="form-group">
                     <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                        <div class="modal-dialog">
                           <img src="assets/images/ajax-loader.gif"></img>
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                     <button type="submit" class="btn blue btn-default" ng-click="pset()">Calculate Premium</button> 
                     <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
                     <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="form-group">
                     <button type="button" id="reset" class="btn blue btn-default">Reset</button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="tab-pane fade" id="health">
      <p>TAB3</p>
   </div>
</div>
</div>
</div>  
</div> 
</div>            
</div>
</div>        
<script>
   // select the relevant <input> elements, and using on() to bind a change event-handler:
   $('input[name="tw_prv_policy"]').on('change', function() {
      $('.business-fields').toggle(+this.value === 1 && this.checked);
   }).change();
   
   
   
   
   
   
      jQuery(document).ready(function() { 
    
         
         loadIdvValueSlider(0,0,0); 
         
   
         var dt = new Date();
         var currentyear = dt.getFullYear();
             
         var carbrandString = JSON.stringify(<?php echo json_encode($carbrandArray); ?>);
         var carmodelVariantsString = JSON.stringify(<?php echo json_encode($carbrandVariants); ?>);
         var carmodelsString = JSON.stringify(<?php echo json_encode($carmbrandVariants); ?>);
         var carhashBrandCategoriesedString = JSON.stringify(<?php echo json_encode($carhashBrandCategoriesed); ?>);
         var carmhashBrandCategoriesedString = JSON.stringify(<?php echo json_encode($carmhashBrandCategoriesed); ?>);
         var carhashkeys = JSON.stringify(<?php echo json_encode($carmhashKey); ?>);
   
   /* additional dynamic fields */ 
      var carCCCategoriesed = JSON.stringify(<?php echo json_encode($carCCCategoriesed); ?>);
      var carFUELCategoriesed = JSON.stringify(<?php echo json_encode($carFUELCategoriesed); ?>);
      var carSEATINGCategoriesed = JSON.stringify(<?php echo json_encode($carSEATINGCategoriesed); ?>);
   
   
      var carCCCategoriesed = JSON.parse(carCCCategoriesed);
      var carFUELCategoriesed = JSON.parse(carFUELCategoriesed);
      var carSEATINGCategoriesed = JSON.parse(carSEATINGCategoriesed);
   
   
         var carbrandArray = JSON.parse(carbrandString);
         var carbrandVariants = JSON.parse(carmodelVariantsString);
         var carmbrandVariants = JSON.parse(carmodelsString);
         var carhashBrandCategoriesed = JSON.parse(carhashBrandCategoriesedString);
         var carmhashBrandCategoriesed = JSON.parse(carmhashBrandCategoriesedString);
         var carhashkeysprice = JSON.parse(carhashkeys);
         var amt ='';
         var pct = '';
         
        
         $('#tw_manufacturer').change(function() {
            $('#tw_variant_div').hide();      
            $('#tw_variant_loader').show();  
            $('#tw_vary').find('option')
                 .remove()
                 .end()
                 .append('<option value="">Select Model Variants</option>')
                 .val('');
            if(typeof(carmbrandVariants[$(this).val()]) == "undefined" && carmbrandVariants[$(this).val()] == null) {
                 return;
            }
            $.each(carmbrandVariants[$(this).val()], function(key, value) {
                 $('#tw_vary')
                     .append($("<option></option>")
                         .attr("value",value)
                         .text(value));
            }); 
               setTimeout(function(){
                  $('#tw_variant_div').show();      
                  $('#tw_variant_loader').hide();
               }, 1500);
         });
   
   
   
         $(document).on('change', '#tw_variant', function() {
             $('#caramount').val('');
             var cyear = $('#tw_manufacture_year').val();
             var noyears = currentyear - cyear;
             var carhashKey = $(this).val();
             var carhashVal = window.btoa(carhashKey);
             if (typeof(carmhashBrandCategoriesed[carhashVal]) == "undefined" && carmhashBrandCategoriesed[carhashVal] == null) {
                 return;
         }
         
         if (typeof(carCCCategoriesed[carhashVal]) == "undefined" && carCCCategoriesed[carhashVal] == null) {
            return;
         }
         if (typeof(carFUELCategoriesed[carhashVal]) == "undefined" && carFUELCategoriesed[carhashVal] == null) {
            return;
         }         
         if (typeof(carSEATINGCategoriesed[carhashVal]) == "undefined" && carSEATINGCategoriesed[carhashVal] == null) {
              return;
         }
   
          
          var amount = carmhashBrandCategoriesed[carhashVal];
          var carCC = carCCCategoriesed[carhashVal];
          var carFuel = carFUELCategoriesed[carhashVal];
          var carSeating = carSEATINGCategoriesed[carhashVal];
   
          $('#car_cc').val(carCC);
          $('#car_fuel').val(carFuel);
          $('#car_seating').val(carSeating);
          
   
            if(noyears == 0){
                 amt = amount;
            }
               if(noyears == 1){ amt= percentagecalcar('20%',amount); }
               if(noyears == 2){ amt= percentagecalcar('20%',amount); }
               if(noyears == 3){ amt= percentagecalcar('30%',amount); }
               if(noyears == 4){ amt= percentagecalcar('40%',amount); }
               if(noyears == 5){ amt= percentagecalcar('50%',amount); }
               if(noyears == 6){ amt= percentagecalcar('55%',amount); }
               if(noyears == 7){ amt= percentagecalcar('59%',amount); }
               if(noyears == 8){ amt= percentagecalcar('64%',amount); }
               if(noyears == 9){ amt= percentagecalcar('67%',amount); }
               if(noyears == 10){ amt= percentagecalcar('70%',amount);}
               $('#tw_amount').val(amt);
               $('#caractualamount').val(amt);
               $('#idvamount').val(carmhashBrandCategoriesed[amount]);
   
               updateIDVvalue(amt,noyears);
         });
   
            function updateIDVvalue(caramount, car_age){
   
               //alert('hii am here');
           var idv_car = 0;
           var d = new Date();
           var curr_year = d.getFullYear();
          
   
           switch (car_age) {
   
               case 1:
                   idv_car = caramount*0.95;
                   break;
               case 2:
                   idv_car = caramount*0.8;
                   break;
               case 3:
                   idv_car = caramount*0.7;
                   break;
               case 4:
                   idv_car = caramount*0.6;
                   break;
               case 5:
                   idv_car = caramount*0.5;
                   break;
               case 6:
                   idv_car = caramount*0.45;
                   break;
               case 7:
                   idv_car = caramount*0.41;
                   break;
               case 8:
                   idv_car = caramount*0.36;
                   break;
               case 9:
                   idv_car = caramount*0.33;
                   break;
               case 10:
                   idv_car = caramount*0.3;
               break;
           }
   
            $('#car_idvamount').val(idv_car);
            var min =percentagecal('15%',idv_car,'min');
            var max =percentagecal('15%',idv_car,'max');
   
           $('.range-bar').addClass("previous");
            loadIdvValueSlider(min,max,idv_car); 
   
         }
   
   
         function percentagecalcar(pct,amount) {
                 pct = parseFloat(pct) / 100;
                 amt = amount - pct;
                 return amt;
         }
   
   
         function percentagecal(pct,amount,qnt) {
            pcts = parseFloat(pct) / 100;
            if(qnt == 'min'){
               var amt = amount - (amount*pcts); 
            } else {
               var amt = amount + (amount*pcts);
            }
            return amt;
         }
   
   
   
   
         $('#tw_reg_city').change(function(){
   
            var selectedCity = $(this).val();
           
            var cityArray = JSON.parse('<?php echo json_encode($cityComplete); ?>');
            for (i = 0; i < cityArray.length; i++) {
               if(cityArray[i].city === selectedCity){ 
                // alert(cityArray[i].state);
                 $('#car_state').val(cityArray[i].state); 
               }
            }
   
         });
   
   
   
   
   })
   
   
</script>
<script>
   $("#tw_state").on('change', function() {
     
      $('#tw_city_div').hide();      
      $('#tw_city_loader').show();       
   
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
                 $('#city').find('option')
                      .remove()
                      .end()
                      .append('<option value="">Select city</option>')
                      .val('');
                             
                          $.each(data, function(key, value) {
                             $('#city')
                             .append($("<option></option>")
                             .attr("value",value['id'])
                             .text(value['name']));
                            
                          });  
                          setTimeout(function(){
                       $('#tw_city_div').show();      
                       $('#tw_city_loader').hide();
                       $('#tw_city').focus();
                    }, 1500); 
                  },
   
               });
   
         });
</script>
<script>
   $('input[name="tw_claim_policy"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#value_disable').show(); 
          
      } else {
         
         $('#value_disable').hide(); 
          
      }
   }).change();


   function postcode_validate(zipcode)
{
   var txt = '';
   var regPostcode = /^([1-9])([0-9]){5}$/;
   if(regPostcode.test(zipcode) == false)
   {
      text =  "Please enter a valid Postcode";  
   } else {
      text = '';
   }
   $('#post').html(text);
}
   
</script>