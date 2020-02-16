<script src="<?php echo base_url(); ?>assets/js/qms_js/car.js"></script>
<div class="tab-content">
   <div class="tab-pane fade active in" id="car">
      <!--                         <form type="POST" id="carform" name="carform" >
         -->                           
      <div ng-app="plunker" ng-controller="myCtrl">
         <form name="quoteCar" novalidate >
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
                     <input type="text" name="car_firstname"  placeholder="Customer First Name"  class="form-control input-sm" id="car_firstname" ng-model="car_firstname" required />               
                     <div ng-if="quoteCar.$submitted || quoteCar.car_firstname.$dirty" ng-messages="quoteCar.car_firstname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="car_lastname"  placeholder="Customer Last Name"   class="form-control input-sm" id="car_lastname"  ng-model="car_lastname" required/> 
                     <div ng-if="quoteCar.$submitted || quoteCar.car_lastname.$dirty" ng-messages="quoteCar.car_lastname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>DOB
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="car_dob"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="car_dob" ng-model="car_dob" required />
                     <div ng-if="quoteCar.$submitted || quoteCar.car_dob.$dirty" class="required" id="dobalert" ng-messages="quoteCar.car_dob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter DOB</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label> State <span class="required"> * </span></label>
                     <input list="state" id="car_state" autocomplete="off" placeholder="Select State"   name="car_state" class="form-control input-sm" ng-model="car_state" required>
                     <datalist id="state">
                        <option value="">Select State</option>
                        <?php 
                           foreach($stateArray as $state )
                           {
                               echo '<option value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="quoteCar.$submitted || quoteCar.car_state.$dirty" ng-messages="quoteCar.car_state.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter State</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label> City <span class="required"> * </span></label>
                     <div id="car_city-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="car_city-div" style="">
                        <input list="city" id="car_city"  placeholder="Select City"  name="car_city" class="form-control input-sm" ng-model="car_city" required>
                        <datalist id="city">
                           <option value="">Select city</option>
                        </datalist>
                        <div ng-if="quoteCar.$submitted || quoteCar.car_city.$dirty" ng-messages="quoteCar.car_city.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="email" id="car_email" name="car_email" class="form-control input-sm" placeholder="E-mail" ng-model="car_email" onkeyup="return email_validate(this.value);" required> 
                     <div ng-if="quoteCar.$submitted || quoteCar.car_email.$dirty" class="required" id="emailwar" ng-messages="quoteCar.car_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid E-mail</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>
                     <input type="text" id="car_mobile" name="car_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="car_mobile" MaxLength="10" onkeyup="return mobile_validate(this.value);" placeholder="Pincode " required /> 
                     <div ng-if="quoteCar.$submitted || quoteCar.car_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteCar.car_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Type <span class="required"> * </span></label>                          
                     <div class="radio-list">
                        
                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="car_policy_type" ng-model='car_policy_type' ng-value=""individual"" value="individual"> Individual </label>

                        <label class="radio-inline" style="font-size:13px;">
                        <input type="radio" name="car_policy_type" ng-model='car_policy_type' ng-value=""corporate"" value="corporate" > Corporate </label>

                        <div ng-if="quoteCar.$submitted || quoteCar.car_policy_type.$dirty" ng-messages="quoteCar.car_policy_type.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter Customer Type</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Registration Number <span class="required"> * </span></label>
                     <input type="text" id="car_regno" name="car_regno" class="form-control input-sm" placeholder="Registration Number" ng-model="car_regno" required />
                     <div ng-if="quoteCar.$submitted || quoteCar.car_regno.$dirty" ng-messages="quoteCar.car_regno.$error" style="color:red" role="alert">
                        <div ng-message="required" class="required">Please Enter Registration Number</div>
                     </div>
                     <!--<p ng-show="form.car_regno.$invalid && form.car_regno.$dirty">Registration Number Required</p>
                        -->
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Year of manufacture <span class="required"> * </span></label>
                     <input list="Year of manufacture" placeholder="Year of manufacture" name="car_yearofmanufacture" id="car_yearofmanufacture" class="form-control input-sm" ng-model="car_yearofmanufacture" required>
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
                     <div ng-if="quoteCar.$submitted || quoteCar.car_yearofmanufacture.$dirty" ng-messages="quoteCar.car_yearofmanufacture.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Year of Manufacture</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Manufacturer <span class="required"> * </span></label>
                     <?php ?>
                     <input list="Manufacturer" placeholder="Select Manufacturer" id="car_manufacturer" name="car_manufacturer" class="form-control input-sm" ng-model="car_manufacturer" required>
                     <datalist id="Manufacturer">
                        <option value="">Select Manufaturer</option>
                        <?php echo $carbrandArray; ?>
                        <?php foreach($carbrandArray as $carbrand) {
                           echo '<option value="'.$carbrand.'">'.$carbrand.'</option>';
                           } 
                           ?>
                     </datalist>
                     <div ng-if="quoteCar.$submitted || quoteCar.car_manufacturer.$dirty" ng-messages="quoteCar.car_manufacturer.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Manufaturer</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Model Varient <span class="required"> * </span></label>
                     <div id="car_variant-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="car_variant-div" style="">
                        <input list="car_vary" placeholder="Select model variants" id="car_variant" name="car_variant" class="form-control input-sm" ng-model="car_variant" required>
                        <datalist id="car_vary">
                           <option value="">Select model variants</option>
                     </datalist>
                        <div ng-if="quoteCar.$submitted || quoteCar.car_variant.$dirty" ng-messages="quoteCar.car_variant.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Model Varient</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>City of Registration <span class="required"> * </span></label>
                     <input list="cityofreg" placeholder="City of Registration" id="car_cityofreg" name="car_cityofreg" class="form-control input-sm" ng-model="car_cityofreg" required>
                     <datalist id="cityofreg">
                        <option value="Select City"></option>
                        <?php 
                           foreach($city as $cval )
                           {
                               echo '<option value="'.$cval.'">'.$cval.'</option>';
                           }
                           ?>                                       
                     </datalist>
                     <div ng-if="quoteCar.$submitted || quoteCar.car_cityofreg.$dirty" ng-messages="quoteCar.car_cityofreg.$error" role="alert">
                        <div ng-message="required" class="required">Please Select City of Registration</div>
                        <input type="hidden" name="car_reg_state" id="car_reg_state" ng-model='car_reg_state'>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Policy Expire Date <span class="required"> * </span></label>
                     <input type="text" id="car_policy_expire" name="car_policy_expire" class="form-control input-sm" placeholder="Policy Expire Date" ng-model="car_policy_expire" required>
                     <div ng-if="quoteCar.$submitted" ng-messages="quoteCar.car_policy_expire.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Policy Expire Date</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>IDV <span class="required"> * </span></label>
                     <input type="hidden" id="caractualamount" name="caractualamount" />
                     <input type="hidden" id="caramount" name="caramount" class="form-control input-sm" placeholder=""/>
                     <input type="hidden" id="car_cc" name="car_cc" class="form-control input-sm" />
                     <input type="hidden" id="car_fuel" name="car_fuel" class="form-control input-sm" />
                     <input type="hidden" id="car_seating" name="car_seating" class="form-control input-sm" />
                     <!-- <input type="text" id="caramount" name="caramount" class="form-control input-sm" placeholder="IDV: Rs. 3,64,233" ng-model="caramount" /> -->
                     <input type="text" id="car_idvamount" name="car_idvamount" class="form-control input-sm" placeholder="IDV Amount"/>
                  </div>
                  <div class="slider-wrapper">
                     <input type="text" class="js-decimal" />
                     <label class="display-box-label"></label><br />
                     <div id="js-display-decimal" class="display-box"></div>
                  </div>
                  <div ng-if="quoteCar.$submitted || quoteCar.car_idvamount.$dirty" ng-messages="quoteCar.car_idvamount.$error" role="alert">
                     <div ng-message="required" class="required">Please IDV</div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Claim in expiring policy</label> <span class="required"> </span>                          
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="car_expiring_policy" ng-model='car_expiring_policy' ng-value='"0"'  value="0" checked required> No </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="car_expiring_policy"  ng-model='car_expiring_policy' ng-value='"1"'  value="1" required> Yes </label>  
                        <div ng-if="quoteCar.$submitted || quoteCar.car_expiring_policy.$dirty" ng-messages="quoteCar.car_expiring_policy.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Claim in expiring policy</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <div id="ncb_policy_value_div">
                        <label>NCB in Expiring policy (%) </label> <span class="required">  </span> 
                        <input list="ncb" name="car_ncb_percentage" placeholder="NCB in Expiring policy" class="form-control input-sm" id="car_ncb_percentage" ng-model="car_ncb_percentage">
                           <datalist id="ncb">
                           <option value=""></option>
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
               <div>
                  <div class="form-group">
                     <div class="col-md-12">
      <!--                   <div class="checkbox-list" data-error-container="#form_2_services_error">
                           <label>
                           <input type="checkbox" value="1" name="service" /> I hereby declare that the customer has a HDFC Bank relationship </label>
                           <label>
                           <input type="checkbox" value="2" name="service" /> Premium Payment has not been done through cash mode </label>
                           <label>
                        </div> --><br/>
                        <div id="form_2_services_error"> </div>
                     </div>
                  </div>
               </div>
               <div class="row maincontf">
                  <div class="col-md-2">
                     <div class="form-group">
                        <!--<button type="submit"  class="btn blue btn-default" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
                        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                           <div class="modal-dialog">
                              <img src="assets/images/ajax-loader.gif"></img>
                              <button type="button" class="btn btn-default" id="closeModel" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                        <button type="submit" class="btn blue btn-default" ng-click="pset()">Calculate Premium</button>
                        <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
                        <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">                                       
                        <!--                                     <button  class="btn blue btn-default" ng-click="pset()" ng-disabled="form.$invalid" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
                        <!--  <button ng-disabled="form.$invalid" class="btn">Submit</button> -->
                     </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                        <button type="button" id="reset" class="btn blue btn-default">Reset</button>
                     </div>
                  </div>
               </div>
         </form>
         </div> <!-- controller ends here -->
      </div>
      <div class="tab-pane fade" id="two">
         <p>TAB2</p>
      </div>
      <div class="tab-pane fade" id="health">
         <p>TAB3</p>
      </div>
      <div class="tab-pane fade" id="tab_1_4">
         <p> Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore
            wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh
            craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan. 
         </p>
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
<script type="text/javascript">
   jQuery(document).ready(function() { 
      
      loadIdvValueSlider(0,0,0); 
      
     var dt = new Date();
      var currentyear = dt.getFullYear();
          
      var carbrandString = JSON.stringify(<?php echo json_encode($carbrandArray); ?>);
      var carmodelVariantsString = JSON.stringify(<?php echo json_encode($carbrandVariants); ?>);
      var carmodelsString = JSON.stringify(<?php echo json_encode($carmbrandVariants); ?>);
      var carhashBrandCategoriesedString = JSON.stringify(<?php echo json_encode($carhashBrandCategoriesed); ?>);
      var carmhashBrandCategoriesedString = JSON.stringify(<?php echo json_encode($carmhashBrandCategoriesed); ?>);
      
     /* additional dynamic fields */ 
      var carCCCategoriesed = JSON.stringify(<?php echo json_encode($carCCCategoriesed); ?>);
      var carFUELCategoriesed = JSON.stringify(<?php echo json_encode($carFUELCategoriesed); ?>);
      var carSEATINGCategoriesed = JSON.stringify(<?php echo json_encode($carSEATINGCategoriesed); ?>);
   
   
      var carCCCategoriesed = JSON.parse(carCCCategoriesed);
      var carFUELCategoriesed = JSON.parse(carFUELCategoriesed);
      var carSEATINGCategoriesed = JSON.parse(carSEATINGCategoriesed);
   
   
   
   
      var carhashkeys = JSON.stringify(<?php echo json_encode($carmhashKey); ?>);
      var carbrandArray = JSON.parse(carbrandString);
      var carbrandVariants = JSON.parse(carmodelVariantsString);
      var carmbrandVariants = JSON.parse(carmodelsString);
      var carhashBrandCategoriesed = JSON.parse(carhashBrandCategoriesedString);
      var carmhashBrandCategoriesed = JSON.parse(carmhashBrandCategoriesedString);
      var carhashkeysprice = JSON.parse(carhashkeys);
      
   
      var amt ='';
      var pct = '';
      
     
      $('#car_manufacturer').change(function() {
         $('#car_variant-div').hide();      
         $('#car_variant-loader').show();  
         $('#car_vary').find('option')
              .remove()
              .end()
              .append('<option value="">Select Model Variants</option>')
              .val('');
   
         if(typeof(carmbrandVariants[$(this).val()]) == "undefined" && carmbrandVariants[$(this).val()] == null) {
              return;
         }
   
         $.each(carmbrandVariants[$(this).val()], function(key, value) {
              $('#car_vary')
                  .append($("<option></option>")
                      .attr("value",value)
                      .text(value));
         }); 
            setTimeout(function(){
               $('#car_variant-div').show();      
               $('#car_variant-loader').hide();
               $('#car_variant').focus();
            }, 1500);
   
   
   
   
      });
   
   
   
      $('#car_cityofreg').change(function(){
   
        var selectedCity = $(this).val();
        var cityArray = JSON.parse('<?php echo json_encode($cityComplete); ?>');
         for (i = 0; i < cityArray.length; i++) {
            if(cityArray[i].city === selectedCity){ 
              //alert(cityArray[i].state);
              $('#car_reg_state').val(cityArray[i].state); 
            }
         }
   
      });
   
   
   
      $(document).on('change', '#car_variant', function() {
   
          $('#caramount').val('');
          var cyear = $('#car_yearofmanufacture').val();
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
          
   
          
          //$('#caramount').val(carmhashBrandCategoriesed[carhashVal]);
          if(noyears == 0){
              amt = amount;
          }
          if(noyears == 1){
             amt= percentagecalcar('20%',amount)
             //amt = amount;
          }
          if(noyears == 2){
             amt= percentagecalcar('20%',amount)
             //amt = amount;
          }
          if(noyears == 3){
             amt= percentagecalcar('30%',amount)
             //amt = amount;
          }
          if(noyears == 4){
             amt= percentagecalcar('40%',amount)
             //amt = amount;
          }
          if(noyears == 5){
             amt= percentagecalcar('50%',amount)
             //amt = amount;
          }
          if(noyears == 6){
             amt= percentagecalcar('55%',amount)
             //amt = amount;
          }
          if(noyears == 7){
             amt= percentagecalcar('59%',amount)
             //amt = amount;
          }
          if(noyears == 8){
             amt= percentagecalcar('64%',amount)
             //amt = amount;
          }
          if(noyears == 9){
             amt= percentagecalcar('67%',amount)
             //amt = amount;
          }
          if(noyears == 10){
             amt= percentagecalcar('70%',amount)
             //amt = amount;
          }
          $('#caramount').val(amt);
          $('#caractualamount').val(amt);
          $('#car_idvamount').val(carmhashBrandCategoriesed[amount]);
   
   
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
   
        // $('.previous').html("");
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
   
   })
</script>
<script>
   $("#car_state").on('change', function() {
     
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
        $('#car_city-div').hide();      
        $('#car_city-loader').show();
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
              $('#car_city-div').show();      
              $('#car_city-loader').hide();
              $('#car_city').focus();  
           }, 1500); 
                  },
   
               });
   
         });
</script>
<script>
   $('input[name="car_expiring_policy"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#ncb_policy_value_div').hide(); 
      } else {
        $('#ncb_policy_value_div').show(); 
      }
   }).change();
   
</script>
</body>
</html>