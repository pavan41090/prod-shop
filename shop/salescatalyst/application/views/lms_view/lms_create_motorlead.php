<script>
  _lmsapp.directive('datePicker', function() {
  return {
    restrict: 'AE',
    scope: {
      date: '='
    },
    link: function(scope, element, attr) {
      jQuery(element[0]).datepicker({
        dateFormat: 'dd-mm-yy',
        defaultDate: new Date(),
        maxDate: '0',
        onSelect: function(date) {
          scope.$apply(function() {
            scope.date = date;
          });
        },
        autoclose: true
      });
    }
  };
});
_lmsapp.directive('myMotorSubmit',function(){

  return {

    restrict  : 'AE',
    link      : function(scope,element,attr){

      element.on('submit',function(){
                
        scope.getInsertCmd();
        return false;

      })

    },
    controller  : function($scope,$http){

      $scope.getInsertCmd = function(){

        var lmsBundlevalidation = $scope.lmsCar.$valid;
        if(lmsBundlevalidation === false){
          return false;
        }

        var changeObjectPremium = $('#motorData').serializeArray();
        $http({
            url : __pathname+'lms-create-insert',
            method : 'POST',
            dataType : 'json',
            data : $.param( changeObjectPremium ),
            headers: {
                "Content-Type": 'application/x-www-form-urlencoded'
            }

        }).then(function(responceData){
          var objectData = Object(responceData);
          var premiuData = objectData.data;
          if(premiuData.update == true){
            alert('Lead Updated Successfully!');
            location.reload();
            return false;
          } else {
            alert('Lead Created Successfully!');
            location.reload();
            return false;
          }
        },function(errorResponce){
            console.log('Something went wrong!');
            alert('Something went wrong! please try after some time.');
            return false;
        });

      }

    }
  }

});
</script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="product_type" value="Motor Lead">
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

<form id="motorData" name="lmsCar" my:Motor:Submit novalidate>
<div class="tab-content">
  
   <div class="tab-pane fade active in" id="car">
       <div>
            <div class=".carhide" id="cardeatail">
            <div> &nbsp; </div>
             <div class="row maincontf">
              <div ng-init=' motorSno = "<?php echo $leadDataing->motor_sno; ?>" '>
                <input type="hidden" name="motorSno" ngModel="motorSno" id="motorSno" value="<?php echo $leadDataing->motor_sno; ?>">
              </div>
			       <div class="col-md-4">
                  <div class="form-group" ng-init=' lms_car_category = "<?php echo $userDetails->Channel; ?>" '>
                     <label>Category
                     </label>
                     <input list="Category" placeholder="Select Category" class="form-control input-sm" name="lms_car_category" id="lms_car_category" ng-model="lms_car_category" readonly value="<?php echo $userDetails->Channel; ?>" required>
                     <datalist id="Category">
                        <?php 
                           foreach($CategoryArray as $Category )
                           {
                               echo '<option  value="'.$Category['name'].'" style="font-weight:normal; color:#ff0000;"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="lmsCar.$submitted || lmsCar.lms_car_category.$dirty" ng-messages="lmsCar.lms_car_category.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Category</div>
                     </div>
                  </div>
               </div>
			   
			   
			   <div class="col-md-4">
            <div class="form-group" ng-init=' empcode = "<?php echo $leadDataing->motor_employee_code; ?>" '>
                     <label> Employee Code <span class="required"> * </span></label>
                     <input maxlength=10 class="form-control input-sm" name="empcode" id="empcode" ng-model="empcode"  value="" placeholder="Employee Code" required>
                  </div>
                  <div ng-if="lmsCar.$submitted || lmsCar.empcode.$dirty" ng-messages="lmsCar.empcode.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Employee Code</div>
                     </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init=' smname = "<?php echo $leadDataing->motor_sm_name; ?>" '>
                     <label>SM Name <span class="required"> * </span></label>  
                     <input type="text" name="smname"  placeholder="SM Name"   class="form-control input-sm" id="smname" ng-model="smname" required />                 
                    <div ng-if="lmsCar.$submitted || lmsCar.smname.$dirty" ng-messages="lmsCar.smname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter SM Name</div>
                     </div>
                  </div>
               </div>
            </div>

               <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group" ng-init=' smcode = "<?php echo $leadDataing->motor_sm_code; ?>" '>
                     <label>SM Code <span class="required"> * </span></label>  
                     <input type="text" name="smcode"  placeholder="SM Code"  class="form-control input-sm" id="smcode" ng-model="smcode" required />                 
                  <div ng-if="lmsCar.$submitted || lmsCar.smcode.$dirty" ng-messages="lmsCar.smcode.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter SM Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init=' customername = "<?php echo $leadDataing->motor_customer_name; ?>" '>
                     <label>Customer Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="customername"  placeholder="Customer Name" class="form-control input-sm" id="customername" ng-model="customername" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.customername.$dirty" ng-messages="lmsCar.customername.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group" ng-init=' aannumber = "<?php echo $leadDataing->motor_aaa_number; ?>" '>
                     <label>AAN Number 
                     <span class="required"> * </span></label>  
                     <input type="text" name="aannumber"  placeholder="AAN Number"  class="form-control input-sm" id="aannumber" ng-model="aannumber" required />               
                     <div ng-if="lmsCar.$submitted || lmsCar.aannumber.$dirty" ng-messages="lmsCar.aannumber.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter AAN Number</div>
                     </div>
                  </div>
               </div>
            </div>
			   <div class="row maincontf">
                <div class="col-md-4">
                     <div class="form-group" ng-init=' vehicletype = "<?php echo $leadDataing->motor_vehicle_type; ?>" '>
                        <label>Vehicle Type<span class="required"> * </span></label>
                        <select name="vehicletype" class="form-control input-sm" id="vehicletype" ng-model="vehicletype" placeholder="Select Vehicle Type" required />
                              <option value="" disabled selected> Select Vehicle Type </option>
                              <option value="Car"> Car </option>
                              <option value="Two Wheeler"> Two Wheeler </option>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.vehicletype.$dirty" ng-messages="lmsCar.vehicletype.$error" class="required" id="vehicletype" role="alert">
                           <div ng-message="required" class="required">Please Select Vehicle Type</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
            <div class="form-group" ng-init=' regno = "<?php echo $leadDataing->motor_register_number; ?>" '>
                     <label> Registration Number <span class="required"> * </span></label>
                     <input placeholder="Registration Number" maxlength=11 class="form-control input-sm" name="regno" id="regno" ng-model="regno" registration:Number style="text-transform: uppercase;" value="" required>
                     <div ng-if="lmsCar.$submitted || lmsCar.regno.$dirty" ng-messages="lmsCar.regno.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Registration Number</div>
                     </div>
                     
                  </div>

               </div>
			   <div class="col-md-4">
                  <div class="form-group" ng-init=' lms_two_wheeler_city_registration = "<?php echo $leadDataing->motor_city_registration; ?>" '>
                     <label> City of Registration <span class="required"> * </span></label>
					 <input list="cityRegistration" class="form-control input-sm" placeholder="City of Registration" name="lms_two_wheeler_city_registration" id="lms_two_wheeler_city_registration" value="" ng-model="lms_two_wheeler_city_registration" required>
                 </div>
               </div>
			   
			         <div ng-if="lmsCar.$submitted || lmsCar.lms_two_wheeler_city_registration.$dirty" ng-messages="lmsCar.lms_two_wheeler_city_registration.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter City of Registration</div>
                     </div>
			   
               </div>
			<div class="row maincontf">
				<div class="col-md-4">
					<div class="form-group" ng-init=' polexpdate = "<?php echo $leadDataing->motor_expire_date; ?>" '>
						<label> Policy Expiry Date <span class="required"> * </span> </label>
					 <input class="form-control input-sm custom-date" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" name="polexpdate" id="polexpdate" ng-model="polexpdate" value="" required>
                      
                  </div>

                  <div ng-if="lmsCar.$submitted || lmsCar.polexpdate.$dirty" ng-messages="lmsCar.polexpdate.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Policy Expiry Date</div>
                     </div>

               </div>
                      <div class="col-md-4">
                     <div class="form-group" ng-init=' prencb = "<?php echo $leadDataing->motor_previous_ncb; ?>" '>
                           <label>Previous Year NCB <span class="required"> * </span></label>
                           <select name="prencb" class="form-control input-sm" id="prencb" ng-model="prencb" required>
                              <option value="" disabled selected>Select your option</option>
                              <?php foreach (ncbVales() as $key => $value) { ?>
                                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                              <?php } ?>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.prencb.$dirty" ng-messages="lmsCar.prencb.$error" role="alert">
                              <div ng-message="required" class="required">Please Select NCB in Expiring policy( % )</div>
                           </div>

                     </div>
                     </div>	
                     <div class="col-md-4">
                     <div class="form-group" ng-init=' preinscomp = "<?php echo $leadDataing->motor_previous_company; ?>" '>
                        <label>Previous Insurance Company<span class="required"> * </span></label>
                        <select name="preinscomp" class="form-control input-sm" id="preinscomp" ng-model="preinscomp" placeholder="Select Previous Insurance Company" required />
                              <option value="" disabled selected>Select Vehicle Type</option>
                              <option value="HDFC ERGO">HDFC ERGO</option>
                              <option value="Bharti AXA">Bharti AXA</option>
                              <option value="Others">Others</option>
                           </select>
                        <div ng-if="lmsCar.$submitted || lmsCar.preinscomp.$dirty" ng-messages="lmsCar.preinscomp.$error" class="required" id="preinscomp" role="alert">
                           <div ng-message="required" class="required">Please Select Vehicle Type</div>
                        </div>
                     </div>
                  </div>
               </div>

			   <div class="row maincontf">
                <div class="pull-right">
                <div id="loader-check" ng-show="getclickEnable"><img src="<?php echo base_url().'assets/images/ajax-loader.gif'; ?>"></div>
                <div class="form-group">
                <button type="submit" name="submit" id="submit" class="btn blue btn-default">Save Lead</button>
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
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    var date_input=$('input[name="polexpdate"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script> 
</body>
</html>
