<script src="<?php echo base_url(); ?>assets/backend-js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/backend-js/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/backend-js/dataTables.bootstrap.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/backend-js/backend_common.js"></script>
<div class="container-fluid">
   <!-- BEGIN PAGE HEADER-->
   <!-- BEGIN THEME PANEL -->
   <!-- END THEME PANEL -->
   <!-- END PAGE HEADER-->
   <div class="row">
      <div class="col-md-12">
         <div class="portlet box gray-gray">
            <div class="portlet-body planbox backend-mainbg">
               <div style="color:#000;">
                  <div ng-controller="BharathiCtrl">
                     <div class="portlet-title tabbable-line" >
                        <div class="caption leadtit">
                           <div class="alert bold uppercase" id="alert-response" > Sum Assured Calculations</div>
                           <!--                                   <div class="alert alert-danger bold uppercase">Success msg</div>
                              -->    
<div class="answer1">

 <div class="form-group col-md-6" >
                              <label>Select Zone:</label>
                              <span class="required"> * </span>
                              <select id="summ_zone" name="summ_zone" class="form-control" ng-model="summ_zone" ng-change="changeSumassuredzone()">
                                    <option value="" disabled selected >Select zone</option>
                                    <option value="1">Zone 1</option>
                                    <option value="2">Zone 2</option>
                                    <option value="3">Zone 3</option>
                                    </select> 
                                 <!-- <div ng-if="lmsShipProduct.$submitted || lmsShipProduct.ss_sum_insured.$dirty" ng-messages="lmsShipProduct.ss_sum_insured.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select In Sum Insured Amount</div>
                                 </div> -->
              </div>
			  
			  <div class="form-group col-md-6" >
                              <label>Sum Insured:</label>
                              <span class="required"> * </span>
                              <select id="summ_assured" name="summ_assured" class="form-control" ng-model="summ_assured" ng-change="changeSumassuredzone()">
                                    <option value="" disabled selected >Select your option</option>
                                    <option value="500000">500000</option>
                                    <option value="750000">750000</option>
                                    <option value="1000000">1000000</option>
                                    </select> 
                                 <!-- <div ng-if="lmsShipProduct.$submitted || lmsShipProduct.ss_sum_insured.$dirty" ng-messages="lmsShipProduct.ss_sum_insured.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select In Sum Insured Amount</div>
                                 </div> -->
              </div>
</div>							  
                        </div>
                     </div>
                     <div>
                        <br />  
                        <div id="load-sum-data"></div>
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
<script>
var bharathi = angular.module('plunker',[]);
bharathi.directive('input', [function () {
  'use strict';
  var directiveDefinitionObject = {
    restrict: 'E',
    require: '?ngModel',
    link: function postLink(scope, iElement, iAttrs, ngModelController) {
      if (iAttrs.value && ngModelController) {
        ngModelController.$setViewValue(iAttrs.value);
      }
	  
    }
  };

  return directiveDefinitionObject;
}]);
bharathi.directive('myChange', function() {
  return function(scope, element) {
    element.bind('keyup keydown', function() {
	
	  var attrid = element[0].name;
      var valuees = element[0].value;
	  var zoneid = element[0].id;
	  var changeObj = new Object();
	  
	  changeObj.keyvalue = valuees;
	  changeObj.key = attrid;
	  changeObj.zone = zoneid;
	  
	  scope.changeKeydata(changeObj);
		
    });
  };
});
bharathi.controller('BharathiCtrl',function($scope,$http,$compile){
	
	$scope.changeKeydata = (changeObj) => {
		$http({
			url:'<?php echo base_url(); ?>/Calculations/getUpdatefeilds',
			method:'POST',
			dataType:'json',
			data:$.param( changeObj ),
			headers: {
				"Content-Type": 'application/x-www-form-urlencoded'
			}
		}).then(function(responce){
			console.log(responce);
		},function(errorMessage){
		});
	}
	$scope.changeSumassuredzone = () => {
	var dataObject = new Object();
	var zone = $scope.summ_zone;
	var assured = $scope.summ_assured;
	dataObject.zone = zone;
	dataObject.assured = assured;
	if(zone == "" && assured == ""){
		return false;
	}
	$http({
			url:'<?php echo base_url(); ?>/Calculations/getZonelist',
			method:'POST',
			dataType:'json',
			data:$.param( dataObject ),
			headers: {
				"Content-Type": 'application/x-www-form-urlencoded'
			}
		}).then(function(responce){
			var datares = responce.data;
			var responcef = datares.result[0];
			
			var appendData = $compile(responcef)($scope);
			
			$('#load-sum-data').html('').append(appendData);
		},function(errorMessage){
		});
	};
});
</script>