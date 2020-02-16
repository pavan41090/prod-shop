document.writeln('<script src="'+__pathname+'assets/js/lms_js/property_owner_type_struture.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-common-controller-js.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-duplicate-check-app.js.js"></script>');
_lmsapp.directive('input', [function () {
  'use strict';
  var directiveDefinitionObject = {
    restrict: 'AE',
    require: '?ngModel',
    link: function postLink(scope, iElement, iAttrs, ngModelController) {
		if(iAttrs.type == 'radio'){
			if(iAttrs.title != undefined)
			if(iAttrs.title == iAttrs.value){
				var _parentRadio = $('#'+iAttrs.id);
				$('#uniform-processing_fee_no span').attr('class','checked');
				_parentRadio.attr('checked',true);
			}
		}
      if (iAttrs.value && ngModelController) {
        ngModelController.$setViewValue(iAttrs.value);
      }
	  
    }
  };

  return directiveDefinitionObject;
}]);
_lmsapp.directive('dirCheckNumeric',function(){
	return {
		restrict : 'AE',
		controller : 'homeCtrl',
		link : function(scope,element,attr){
			element.on('keyup',function(){
				var _parentthis = $(this);
				var PHONE_REGEXP = /^\d{0,9}(\.\d{1,9})?$/;
				var pincodeValuein = _parentthis.val();
				var isMatchRegex = PHONE_REGEXP.test( pincodeValuein );
				if(isMatchRegex == false){
					_parentthis.val('');
				}
			});
		}
	}
});
_lmsapp.directive('pincodeValidation',['LmsValidataionservice',function(LmsValidataionservice){
	return {
		restrict : 'AE',
		controller : 'homeCtrl',
		link : function(scope,element,attr){
			element.on('keyup',function(){
				var _parentthis = $(this);
				var PHONE_REGEXP = /^\d{0,9}(\.\d{1,9})?$/;
				var pincodeValuein = _parentthis.val();
				var isMatchRegex = PHONE_REGEXP.test( pincodeValuein );
				if(isMatchRegex == false){
					_parentthis.val('');
				}
				if(isMatchRegex == true && pincodeValuein.length > 5){
					scope.getPicodeDatainfo( pincodeValuein );
				}
			});
		}
	}
}]);
_lmsapp.directive('editLmsHome',function(){
return {
	restrict : 'AE',
	controller : 'homeCtrl',
	link : function (scope,element,attr){
		scope.loadinitfunction();

		scope.lms_cus_tle = 0;
		scope.checkPolicyStartDate = function(dateTime){
			scope.checkcheckPolicyStartDate(dateTime);
		};
		onEmiChange = function(){
		if(($('#lms_cus_emi').val()).toLowerCase() == 'yes'){
			$('#emi_yr_outer').show();
		} else {
		$('#emi_yr_outer').hide();
		}
		};
		element.on('submit',function(){
			scope.submitHomeeditfunction($(this));
		});
	}
}
});
_lmsapp.directive('formHomeLead',['LmsValidataionservice',function(LmsValidataionservice){
	return {

		restrict : 'AE',
		controller : 'homeCtrl',
		link : function(scope,element,attr){
			var pagename = angular.element(document.getElementById('product_type')).val();
			scope.lms_car_line_of_business = pagename;
			scope.saveleadPleasewait = false;
			scope.saveleadbtn = false;
			scope.saveleadctn = true;
			scope.lms_cus_tle = 0;
			scope.lms_cus_pfee = 0;
			//scope.lms_car_category = 'DT';
			scope.loadinitfunction();
			scope.emiavvailabledis = false;
			scope.paymentCheckfunction = function(){
				
			//	
			}
			
			scope.checkPolicyStartDate = function(dateTime){
				scope.checkcheckPolicyStartDate(dateTime);
			};
			element.on('submit',function(){
				scope.submitHomefunction($(this));
			})
		}

	}
}]);
_lmsapp.directive('paymentCheckFunction',['LmsValidataionservice',function(LmsValidataionservice){
	return {
		restrict : 'AE',
		controller : 'homeCtrl',
		link : function(scope,element,attr){
			element.on('change',function(){
				var checkdisemi = LmsValidataionservice.emiPaymentcheckdis($(this).val());
				scope.emiavvailabledis = checkdisemi;
			});
		}
	}
}])
_lmsapp.controller('homeCtrl',function($scope,$http,LmsValidataionservice){
$scope.checkcheckPolicyStartDate = function(dateTime){
	var timestatus = LmsValidataionservice.ctlcheckPolicyStartDate(dateTime);
	if(timestatus == false) return false;
}

$scope.getPicodeDatainfo = function(pincodeValue){
	
	try{
	   var _pathurl = angular.element(document.getElementById('web_url')).val();
       var picodeObject = new Object();
	   picodeObject.cus_pincode = pincodeValue;
	   $http({
		   url : _pathurl+'Commoncontrol/getCityByPincode',
		   method : 'POST',
		   cache : false,
		   dataType:'json',
           data : $.param( picodeObject ),
		   headers: {
			   "Content-Type": 'application/x-www-form-urlencoded'
			   }
	   }).then(function(responcePincode){
		   var pinres = Object(responcePincode);
		   var pinData = pinres.data;
		   $scope.lms_car_city = pinData.cus_cityName;
		   $scope.lms_car_state = pinData.cus_stateName;
		   $('input#lms_car_city').val(pinData.cus_cityName);
		   $('input#lms_car_state').val(pinData.cus_stateName);
		 
	   },function(erroeResponce){
		   console.info("getPicodeDatainfo having error please try:"+erroeResponce.message);
	   });

	} catch(Error){
	}
}

$scope.loadinitfunction = function(){
if($scope.lms_car_category == 'COP'){
		$('#valuable_detail_div').show();
		$('#SIM_PEE_detail_div').show();
	}
	$('#uniform-declaration span').prop('class','');
	var date = new Date();
    var lms_car_target_date =  ('0' + date.getDate()).slice(-2) + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + date.getFullYear();
	$('#lms_car_target_date').val( lms_car_target_date );
	$( ".custom-date-dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            minDate: 0, // your min date
            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
          
     });
	 $( ".custom-date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
      });
	 $( ".custom-date-after" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            startDate: "+0d",
        });

	 
	 $('select').each(function(){
		 var __selectedId = $(this);
		 $scope[__selectedId.attr('id')] = __selectedId.attr('title');
	 });

	 $('textarea').each(function(){
	 	var __selectedId = $(this);
		 $scope[__selectedId.attr('id')] = __selectedId.attr('title');
	 });

}

$scope.homevalidatingfunction = function(){
	
	try{
		console.log($scope.lmsHome.$error);
		var lsmhomevalidation = $scope.lmsHome.$valid;
		var buildingType = $scope.hme_building_type;
		var selecedDateTime = LmsValidataionservice.calculateConstructionAge('hme_year_of_construction');
		var dobdate = $('#lms_car_dob').val();
		var calculateAge = LmsValidataionservice.calculateSpouseAge(dobdate);
		if((lsmhomevalidation === true ) && (dobdate.length == 0 || dobdate.length <= 0)){
			alert("Please Select DOB!");
			return false;
		}
		if((lsmhomevalidation === true ) && (dobdate.length > 0 && calculateAge == false)){
                alert('Age should be greater than 18 years');
                return false;
        }
		var valuables = $('#valuables').parent('span').attr('class');
		var simpee = $('#SIM_PEE').parent('span').attr('class');
		var previousClaims = $('#hme_previous_claims').val();
		if((lsmhomevalidation === true ) && (valuables == 'checked')){
		//var _validateval = LmsValidataionservice.validataionValuables();
		//if(_validateval == false) return false;
		}
		if((lsmhomevalidation === true ) && (simpee == 'checked' || ($('#SIM_PEE').is(':checked') == true))){
			/*var peevalidate = LmsValidataionservice.validatestruturepee();
			if(peevalidate == false){
				return false;
			}*/
		}
		if((lsmhomevalidation === true ) && (previousClaims.length == 0)){
		alert('Please Select Do you have any claims in previous year');
		return false;
		} else {
			if(previousClaims == 'yes'){
				/*
				var _boolprevious = LmsValidataionservice.previousClaimsfactory();
				if(_boolprevious == false){
					return false;
				}
				*/
			}
		}
		if(buildingType == '' ){
        	alert('Please select Type of Building Construction');
	    } else {
			
	        if(buildingType == 'Kutcha'){
	             alert('Kutcha Construction not allowed');
	             $('#hme_building_type').val('');
	             $('#hme_building_type').focus();
	             return false;
	        }
	    }
	    if(lsmhomevalidation == true){
	    	var timestatus = LmsValidataionservice.ctlcheckPolicyStartDate('home_pro_policy_sdate');
			if(timestatus == false) return false;
	    }
		var checkdisemi = $('#lms_car_payment_type').val();
		
		if(checkdisemi == 'Credit Card'){
				var vallms_cus_emi = angular.element(document.getElementById('lms_cus_emi')).val();
				console.log(vallms_cus_emi);
				var vallms_cus_emi_yr = angular.element(document.getElementById('lms_cus_emi_yr')).val();
				console.log(vallms_cus_emi_yr);
				if(vallms_cus_emi.length == 0){
					$('#lms_cus_emi-error div').show();
					return false;
				} else {
					$('#lms_cus_emi-error div').hide();
				}
				if(vallms_cus_emi.toLowerCase() == 'yes' && vallms_cus_emi_yr.length == 0){
					$('#lms_cus_emi_yr div').show();
					return false;
				} else {
					$('#lms_cus_emi_yr div').hide();
				}
		}
		
		if(lsmhomevalidation === true && selecedDateTime === true){
			return true;
		} else {
			return false;
		}
	} catch(Error){
	}
}
$scope.submitHomefunction = function(thisDatahome){

	try{
		var homevalidatingfunction = $scope.homevalidatingfunction();
		if(homevalidatingfunction === true){
			$scope.submitfinalLead(thisDatahome);
		} else {
			return false;
		}
	} catch(Error){
		console.info("submitHomefunction having error please try:"+Error.message);
	}
}

$scope.submitHomeeditfunction = function(thisDatahome){

	try{
		var homevalidatingfunction = $scope.homevalidatingfunction();
		
		if(homevalidatingfunction === true){
			$scope.updatehomeDatainformation(thisDatahome);
		} else {
			return false;
		}
	} catch(Error){
		console.info("submitHomefunction having error please try:"+Error.message);
	}
}
$scope.checkDuplicateFunc = function(_pypValue,idName,productName,productIdvalue){
		var findMobileNumber = idName;
		var mobileObject = new Object();
		mobileObject.number = findMobileNumber;
		mobileObject.productname = productName;
		mobileObject.leadValue = productIdvalue;
		if(findMobileNumber.length == 10){
			return $http({
				url:__pathname+'checker-dupliate',
				method : 'POST',
				cache : false,
				dataType : 'json',
				data : $.param( mobileObject ),
				headers : {"Content-Type": 'application/x-www-form-urlencoded'}
			}).then(function(responceData){
				var resOnj = Object(responceData);
				var dataresOnj = resOnj.data;
				var messageObj = new Object();
				if(dataresOnj.status == true){
					_pypValue.parent('div').children('div').html('').append(dataresOnj.message);
					messageObj.status = false;
					messageObj.message = dataresOnj.message;
				} else {
					_pypValue.parent('div').children('div').html('');
					messageObj.status = true;
				}
				return messageObj;
			});
		}
}
$scope.updatehomeDatainformation = function(thisDatahome){
				
				try{
					var _pathurl = angular.element(document.getElementById('web_url')).val();
					var homeriskAddress = LmsValidataionservice.risksameAddress();
				    if(homeriskAddress == false) return false;
					$scope.saveleadPleasewait = true;
					$scope.saveleadctn = false;
					var homeformData = new FormData();
					var editFormData = thisDatahome.serializeArray();
					
					editFormData.product_type = angular.element(document.getElementById('product_type')).val();
					editFormData.leadIDID = angular.element(document.getElementById('lead_id')).val();
					var findMobileNumber = $('#lms_car_mobile').val();
				        var mobileObject = new Object();
				        mobileObject.number = findMobileNumber;
				        mobileObject.productname = 'Home';
				        mobileObject.leadValue = $('#lead_id').val();
				        if(findMobileNumber.length == 10){
				            $http({
				                url:__pathname+'checker-dupliate',
				                method : 'POST',
				                cache : false,
				                dataType : 'json',
				                data : $.param( mobileObject ),
				                headers : {"Content-Type": 'application/x-www-form-urlencoded'}
				            }).then(function(responceData){
				                var resOnj = Object(responceData);
				                var dataresOnj = resOnj.data;
				                var messageObj = new Object();
				                if(dataresOnj.status == true){
				                    $('#lms_car_mobile').parent('div').children('div').html('').append(dataresOnj.message);
				                    var Aprompt = confirm(dataresOnj.message);
				                    if(!Aprompt){
				                       var finalConfirm = confirm('Lead is canceling');
				                        if(finalConfirm){
				                            alert('Lead Canceled! reloading page');
				                            location.reload();
				                            return false;
				                        } else {
				                            return false;
				                        }
				                        return false;
				                        } else {
				                            $scope.checkUpdateHome(editFormData);
				                            return true;
				                        }
				                        

				                } else {
				                    $('#lms_car_mobile').parent('div').children('div').html('');
				                    $scope.checkUpdateHome(editFormData);
				                    return true;
				                }
				            });
				     }
					
	} catch(Error){
		console.info("submitfinalLead having error please try:"+Error.message);
	}
}
$scope.checkUpdateHome = function(editFormData){
	$http({
						url : __pathname+'LmsHome/getUpdateHomedatainformation',
						method : 'POST',
						cache : false,
						dataType : 'json',
						data : $.param( editFormData ),
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
							}
					}).then(function(responceData){
						var homeRes = Object(responceData);
						var _homeObj = homeRes.data;
						if(_homeObj.status){
                    		alert('Succesfully posted values, Lead Number is '+ _homeObj.message);
                    		window.open(__pathname+'lms-lead-list','_self');
						}
					},function(erroeResponce){
						console.info("submitfinalLead having error please try:"+Error.message);
					});
}
$scope.submitfinalLead = function(thisDatahome){
				
				try{
					var _pathurl = angular.element(document.getElementById('web_url')).val();
					var homeriskAddress = LmsValidataionservice.risksameAddress();
				    if(homeriskAddress == false) return false;
				    var findMobileNumber = $('#lms_car_mobile').val();
				        var mobileObject = new Object();
				        mobileObject.number = findMobileNumber;
				        mobileObject.productname = 'Home';
				        mobileObject.leadValue = $('#lead_id').val();
				        if(findMobileNumber.length == 10){
				            $http({
				                url:__pathname+'checker-dupliate',
				                method : 'POST',
				                cache : false,
				                dataType : 'json',
				                data : $.param( mobileObject ),
				                headers : {"Content-Type": 'application/x-www-form-urlencoded'}
				            }).then(function(responceData){
				                var resOnj = Object(responceData);
				                var dataresOnj = resOnj.data;
				                var messageObj = new Object();
				                if(dataresOnj.status == true){
				                    $('#lms_car_mobile').parent('div').children('div').html('').append(dataresOnj.message);
				                    var Aprompt = confirm(dataresOnj.message);
				                    if(!Aprompt){
				                       var finalConfirm = confirm('Lead is canceling');
				                        if(finalConfirm){
				                            alert('Lead Canceled! reloading page');
				                            location.reload();
				                            return false;
				                        } else {
				                            return false;
				                        }
				                        return false;
				                        } else {
				                            $scope.submitHomeData(thisDatahome);
				                            return true;
				                        }
				                        

				                } else {
				                    $('#lms_car_mobile').parent('div').children('div').html('');
				                    $scope.submitHomeData(thisDatahome);
				                    return true;
				                }
				            });
				     }
	} catch(Error){
		console.info("submitfinalLead having error please try:"+Error.message);
	}
}

$scope.submitHomeData = function(thisDatahome){
	var homeformData = new FormData();
					var formData = thisDatahome.serializeArray();
					formData.product_type = angular.element(document.getElementById('product_type')).val();
					$('#customerDetails :input').prop('disabled',true);
					$http({
						url : __pathname+'LmsHome/getCreathomeLead',
						method : 'POST',
						cache : false,
						dataType : 'json',
						data : $.param( formData ),
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
							}
					}).then(function(responceData){
						var homeRes = Object(responceData);
						var _homeObj = homeRes.data;
						if(_homeObj.status){
                    		alert('Succesfully posted values, Lead Number is '+ _homeObj.message);
                    		location.reload();
						}
					},function(erroeResponce){
						console.info("submitfinalLead having error please try:"+Error.message);
					});
}

$scope.copconv=function(){
	if($scope.lms_car_category=='COP'){
		$scope.valuables=true;
		$scope.PEE=true;
	}
}
		
});