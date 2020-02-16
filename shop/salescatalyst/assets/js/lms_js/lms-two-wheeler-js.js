document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-common-controller-js.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-state-city-controller.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-duplicate-check-app.js.js"></script>');
var leaderImage = '<img src="'+__pathname+'assets/images/ajax-loader.gif" style="margin: 10PX;padding: 0px;width: 25px;height: 25px;">';
_lmsapp.directive('changeMakeDir',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('change',function(){
			scope.selectedMakeOption($(this).val(),false);
		})
	}
}
});
_lmsapp.directive('manufacturingYear',function(){
	return {
		restrict : 'AE',
		link : function(scope,element,attr){
			element.on('change',function(){
				scope.ncbCheckerU($(this).val());
			})
		},
		controller:function($scope,$http){
			$scope.ncbCheckerU = function(selectedVaue){

				var vehicleObj = new Object();
				vehicleObj.value = selectedVaue;
				$http({
						url : __pathname+'get-man-fac',
						method : 'POST',
						cache : false,
						data : $.param( vehicleObj ),
						dataType : 'json',
						async : true,
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
						}

					}).then(function(responceData){
						var __resData = Object(responceData);
						var _datainfo = __resData.data;
						var idvalue = _datainfo;
						var checkValuencb = idvalue.value;
						var optionTextncb = '<option value="" disabled selected>Select your option</option>';
						for (var i=0; i < checkValuencb.length; i++) {
							var spiltvaluess = checkValuencb[i].split('-');
							optionTextncb += "<option value = '"+spiltvaluess[0]+"'>"+spiltvaluess[1]+"</option>";
						}
						console.log(optionTextncb);
						$('#lms_car_ncb').html('').append(optionTextncb);
					},function(errorMessage){

					});
			}
		}
	}
})
_lmsapp.directive('proposalCalculation',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('click',function(){
			var _thisFormF = $('#twowheelData');
			scope.recalculateAddonProposal(_thisFormF);
		});
	}
}
});
_lmsapp.directive('idExistingPaPolicy',function(){
	return{
		restrict : 'AE',
		link : function(scope,element,attr){
			element.on('click',function(){
				scope['lms_car_is_exisiting_pa'] = $(this).val();
			});
		}
	}
})
_lmsapp.directive('policyExpireDate',function(){
	return{
		restrict : 'AE',
		link : function(scope,element,attr){
			element.on('change',function(){
				var _parentDate = $('[id^="lms_car_pro_existing_policy_expiry"]');
				_parentDate.val($(this).val());
				_parentDate.attr('readonly',true);
				_parentDate.attr('disabled',true);
			});
		}
	}
});
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
		link : function(scope,element,attr){
			element.on('keyup',function(){
				var _parentthis = $(this);
				var PHONE_REGEXP = /^\d{0,9}(\.\d{1,9})?$/;
				var pincodeValuein = _parentthis.val();
				var isMatchRegex = PHONE_REGEXP.test( pincodeValuein );
				if(isMatchRegex == false){
					_parentthis.val('');
				}

				if(pincodeValuein >= 18){
					$('#lms_car_pro_nameofappoint').attr('readonly',true);
					$('#lms_car_pro_appoint_relation').attr('readonly',true);
					$('#lms_car_pro_appoint_relation').attr('disabled',true);
				} else {
					$('#lms_car_pro_nameofappoint').attr('readonly',false);
					$('#lms_car_pro_appoint_relation').attr('readonly',false);
					$('#lms_car_pro_appoint_relation').attr('disabled',false);
				}
			});
		}
	}
});
_lmsapp.directive('changeModelDir',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('change',function(){
			scope.selectedModalOption($(this));
		})
	}
}
});
_lmsapp.directive('tpPolicy',function(){
return{
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('click',function(){
			var _thisTP = $(this).val();
			scope.thirdpartyPolicy(_thisTP);
		})
	}
}
});
_lmsapp.directive('changeIdvRange',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('change',function(){
			scope.getChangeQuoteValue($(this).val());
		})
	}
}
});
_lmsapp.directive('twoWheelPremiumCal',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('click',function(){
			scope.getQuoteInformation();
		})
	}
}
});
_lmsapp.directive('pypChecker',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('click',function(){
			var _pypValue = $(this).val();
			scope.pypCheckfunction(_pypValue);
		});
	}
}
});
_lmsapp.factory('twowheelerValidation',['$http','LmsValidataionservice',function($http,LmsValidataionservice){

	var twoFactory = new Object();

	twoFactory.chekMYvalidations = function(){
		var dobdate = $('#lms_car_dob').val();
		var dobValidation = LmsValidataionservice.calculateSpouseAge( dobdate );
		if(dobdate.length > 0 && dobValidation == false){
                alert('Age should be greater than 18 years');
                return false;
        } else {
        	return true;
        }
	}

	return twoFactory;

}]);
_lmsapp.directive('depPreviousPolicy',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('click',function(){
			var _thisDep = $(this).val();
			scope.depPreviousPolicyFun( _thisDep );
		})
	}
}
});
_lmsapp.directive('twoWheelerCreate',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('click',function(){
			var _pypValue = $('#twowheelData');//var _pypValue = $(this);
			scope.createTwowheeler(_pypValue,true);
		});
	}
}
});

_lmsapp.directive('registerationDate',function(){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('change',function(){
			scope.getregisteredYear();
		});
	}
}
});

_lmsapp.directive('registrationNumber',function(twowheelerValidation,LmsValidataionservice){

	return {

		restrict : 'AE',
		link : function(scope,element,attr){
			scope.getvehiclemodelmake();
			scope.autoLoadtwowheeler();
			scope.phoneNumberPattern = function() {
		    var manyear = $('#lms_two_wheeler_man_year').val();
		    var manregisterDate = $('#lms_two_wheeler_registration_date').val();
		    var splitDate = manregisterDate.split('/')[2];
			   if( splitDate === manyear ) {
		                return true;
		            }
				};
			element.on('change',function(){
				scope.vehilcleNumbercheck($(this));
			});
		},
		controller : function($scope,$http,$compile){
			$scope.ngdeclaration = false;
			var odPremiumChecker = true;
			var makeselectedID = 0;
			var getQuoteClickvcall = 0;
			var makeselectedValue='';
			var modelselectedId = 0;
			var modelselectedValue='';
			var modelselecteditc = 0;
			var productType = '';
			var variantName = '';
			var stateCode = '';
			var manFactorYear = 0;
			var changemodelValue = false;
			var changemodelname = '';
			var fastlineDataStatus = false;
			var vehicleRegisterDate = '';
			var vehicleManfactureDate = '';
			var vehicleminidv = 0;
			var vehiclemaxidv = 0;
			var vehiclerikType = '';
			var vehiclemake='', vehiclemodel = '', vehiclefueltype = '', vehicleVariant = '', vehicleidv = '', vehicleVehicleAge = 0, vehiclecc = '', vehiclePlaceOfRegistration = '',vehicleSeatingCapacity = 0,vehicleExShowroomPrice = 0,
			vehiclePolicyStartDate = '',vehiclePreviousChecker = 0,vehiclethirdpartyValue = 0,depPreviousPolicyValue = 0,vehicleRegState='',vehicleOrdernumber = '', vehicleQuotationNumner = '';
			$scope.lms_motor_pyp_availablek = 0;
			$scope.lead_api_id = 0;
			$scope.pypstartDate = false;
			$scope.pypendDate = false;

			$scope.getQuoteLoader = false;
			$scope.preimumQuoteLoader = true;

			$scope.recalculateProposal = false;
			$scope.saveleadButton = false;
			$scope.isAddDetailsAvailable = false;
			$scope.proposalRequestRes = false;

			$scope.getregisteredYear = function(){
				var registeredDate = $('#lms_two_wheeler_registration_date').val();
				var manfacureYear = $('#lms_two_wheeler_man_year').val();
				var registerDateM = new Date(registeredDate);
				var addedToYearMan = parseInt(manfacureYear)+1;
				var addedToYearReg = registerDateM.getFullYear();

				if(addedToYearReg == addedToYearMan || addedToYearReg == manfacureYear){
					$('#error_reg-man').html('');
					return true;
				} else {
					$('#error_reg-man').html('').append('Registration Date cannot be more than 1 year from Manufacturing Year');
					return false;
				}

			}

			$scope.getRegManComparision = function(){
				var regDate = $('#lms_two_wheeler_registration_date').val();
				var regManYear = $('#lms_two_wheeler_man_year').val();
				var splitDate = regDate.split('/');
				if(splitDate[2] < regManYear){
					alert("Date should be greater than manfacuturing year!");
					return false;
				}
			}

			$scope.getDynamicData = function(){
				    $scope.recalculateProposal = true;
					$scope.saveleadButton = false;
			}
			$scope.untickgetDynamicData = function(){
				    $scope.$emit('recalculateProposal',true);
				    $scope.$broadcast('recalculateProposal',true);
				    $scope.$on('recalculateProposal',true);
					$scope.$emit('saveleadButton', false);
					$scope.$broadcast('saveleadButton', false);
					$scope.$on('saveleadButton', false);
			}

			$scope.addonRecalculateChecker = function(_thisform){
				if($('#twoAddon').is(':checked')){
					$scope.recalculateProposal = true;
					$scope.saveleadButton = false;
				} else {
					$scope.recalculateProposal = false;
					$scope.saveleadButton = true;
				}
			}

			$scope.loadManfacurerData = function(manfactureId){
				$scope.lms_two_wheeler_make = manfactureId;
			}

			$scope.loadModalinfoData = function(manfactureId){
				$scope.lms_two_wheeler_model = manfactureId;
			}

			$scope.pypCheckfunction = function(_pypValue){
				vehiclePreviousChecker = _pypValue*1;
				$scope.lms_motor_pyp_availablek = vehiclePreviousChecker;
			}

			$scope.thirdpartyPolicy = function(_tpValue){
				vehiclethirdpartyValue = _tpValue;
			}

			$scope.depPreviousPolicyFun = function(_depValue){
				depPreviousPolicyValue = _depValue;
			}

			

			$scope.autoLoadtwowheeler = function(){
				$scope.lms_motor_pyp_availablek = 0;
				
				$scope.pleasewaitButton = false;
				$scope.lead_api_id = 0;
				$scope.lms_car_line_of_business = 'Two Wheeler';
				$( ".custom-date-after" ).datepicker({
		            changeMonth: true,
		            changeYear: true,
		            dateFormat: 'dd-mm-yy',
		            todayHighlight: true,
		            autoclose: true,
		            minDate: 0, // your min date
		            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
		     });
			 
			$( ".custom-date-dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            minDate: 0, // your min date
            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
     		});

			 $( '.custom-date' ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',
				todayHighlight: true,
				autoclose: true,
				});

			 $( '.pyp-custom-date' ).datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',
				todayHighlight: true,
				autoclose: true,
				});
			}


			$scope.vehilcleNumbercheck = function(thisData){
				
				try{
					var vehicleNumber = thisData.val();
					if(vehicleNumber.length < 4) return false;
					//if(vehicleNumber.length > 4) return false;
					var webUrl = angular.element(document.getElementById('web_url')).val();
					var vehicleObj = new Object();
					vehicleObj.number = vehicleNumber;
					$('#loadRegisterNumber').html('').append(leaderImage);
					var regCityName = $("#lms_two_wheeler_city_registration").val();
					$http({
						url : webUrl+'get-fastline-data',
						method : 'POST',
						cache : false,
						data : $.param( vehicleObj ),
						dataType : 'json',
						async : true,
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
						}

					}).then(function(responceData){
						var __resData = Object(responceData);
						var _datainfo = __resData.data;
						$('#loadRegisterNumber').html('');
						if(_datainfo._fststatus == true){
							fastlineDataStatus = true;
							$('#lms_two_wheeler_make option').each(function(){
								var _parentMake = $(this);
								if(_parentMake.text() == _datainfo._mk){
									var parentElectedValue = _parentMake.val();
									$('#lms_two_wheeler_make').val( parentElectedValue );
									$scope.selectedMakeOption( parentElectedValue, true );
									changemodelValue = true;
								}
							});
							changemodelname = _datainfo._md;
							$('#lms_two_wheeler_man_year').val( _datainfo._dom );
							$scope.ncbCheckerU( _datainfo._dom );
							$('#lms_car_idv').val( _datainfo._idv );
							$('#lms_two_wheeler_registration_date').val( _datainfo._dor );
							$('#lms_car_pro_engine_num').val( _datainfo._en );
							$('#lms_car_pro_engine_num').change();
							$('#lms_car_pro_chasis_num').val( _datainfo._cn );
							$('#lms_car_pro_chasis_num').change();
 							//vehicleRegState = _datainfo._rst;
 							vehicleRegState = _datainfo._sor;
						} else {
							
							$('#lms_two_wheeler_make').val('');
							$('#lms_two_wheeler_model').val('');
							$('#lms_two_wheeler_man_year').val( '' );
							$('#lms_two_wheeler_registration_date').val( '' );
							vehicleRegState = _datainfo._sor;
						}
						$('#lms_two_wheeler_city_registration').val( _datainfo._cp );

						/*lms_two_wheeler_city_registration*/
						vehicleminidv = _datainfo._min;
						vehiclemaxidv = _datainfo._max;
						vehicleRegisterDate = _datainfo._dor;
						vehicleManfactureDate = _datainfo._dom;
						vehiclerikType = _datainfo._rt;
						vehiclemake = _datainfo._mk;
						vehiclemodel = _datainfo._md;
						vehiclefueltype = _datainfo._ft;
						vehicleVariant = _datainfo._vr;
						vehicleidv = _datainfo._idv;
						vehicleVehicleAge = ( _datainfo._va ? _datainfo._va : 0);
						vehiclecc = _datainfo._cc;
						vehiclecc = _datainfo._cc;
						vehiclePlaceOfRegistration = _datainfo._por;
						vehicleSeatingCapacity = _datainfo._sc;
						vehicleExShowroomPrice = _datainfo._esp;

						var _compiledata = $compile(_datainfo._scrollbar)($scope);
						var scrollbardiv = '';
						$('.slidecontainer').html('').append( _compiledata );
					});

				} catch(Error){
					console.log("Something went wrong!"+Error.message);
				}
			}

			$scope.getvehiclemodelmake = function(){

				try{
					var webUrl = angular.element(document.getElementById('web_url')).val();

					$http({
						url : webUrl+'cities-two-vehicle',
						method : 'POST',
						cache : false,
						headers : {
								"Content-Type": 'application/x-www-form-urlencoded'
							}
					}).then(function(responceInfo){
						var citiesData = Object(responceInfo);
						var __makeData = citiesData.data;
						var _arrayMake = __makeData.message;
						var _optionId='';

						if($scope.lms_two_wheeler_make)
						$scope.selectedMakeOption( $scope.lms_two_wheeler_make, true );

						_optionId += '<option value="" selected>Select Make</option>';
						jQuery.each(_arrayMake,function(index,value){
							_optionId += '<option id="'+value._mid+'" '+($scope.lms_two_wheeler_make ? ($scope.lms_two_wheeler_make ==value._mid ? 'selected' : '') : '')+' value="'+value._mid+'">'+value._mk+'</option>';
						});
						$('#lms_two_wheeler_make').html('').append(_optionId);
					},function(errorMessage){
						console.log("Something went wrong!"+Error.message);
					});

				} catch(Error){
					console.log("Something went wrong!"+Error.message);
				}
			}

			$scope.selectedMakeOption = function(argument,booleanStatement) {
				// body...
				try {
					var webUrl = angular.element(document.getElementById('web_url')).val();
					angular.element(document.getElementById('lms_two_wheeler_model')).val('');
					var makevalue = argument;
					var val = makevalue;
				    makeselectedID = val;
					var makeObject = new Object();
					makeObject.make = makeselectedID;
					$('#loadManufacurer').html('').append(leaderImage);
					$http({
						url : webUrl+'get-make-variants',
						method : 'POST',
						cache : false,
						dataType : 'json',
						data : $.param( makeObject ),
						headers : {
								"Content-Type": 'application/x-www-form-urlencoded'
							}
					}).then(function(responceCheck){
						var _variantRes = Object(responceCheck);
						var _varData = _variantRes.data;
						$('#loadManufacurer').html('');
						if(_varData.status){
							var _varDataMes = _varData.message;
							var _voptionId = '';
							_voptionId +='<option value="">Please Select Option</option>';
							jQuery.each(_varDataMes,function(index,value){
							if(changemodelValue == true){
							_voptionId += '<option id="'+value._mid+'" pType = "'+value._pt+'" statecheck = "'+value._stc+'" variant="'+value._vri+'" name="'+value._itc+'" fuelname = "'+value._vfl+'" cc = "'+value._vcc+'" model="'+value._vmd+'" vehiclescap="'+value._vscp+'" vehiclxsprice="'+value._vesp+'" value="'+value._md+'" '+(changemodelname == value._vmd ? 'selected' : '')+''+($scope.lms_two_wheeler_model == value._md ? 'selected' : '')+'>'+value._md+'-'+value._vcc+ 'CC </option>';
							} else {
							_voptionId += '<option id="'+value._mid+'" pType = "'+value._pt+'" statecheck = "'+value._stc+'" variant="'+value._vri+'" name="'+value._itc+'" fuelname = "'+value._vfl+'" cc = "'+value._vcc+'" model="'+value._vmd+'" vehiclescap="'+value._vscp+'" vehiclxsprice="'+value._vesp+'" value="'+value._md+'" '+($scope.lms_two_wheeler_model == value._md ? 'selected' : '')+'>'+value._md+'-'+value._vcc+ 'CC </option>';
							}
							
							});
							$scope.preimumQuoteLoader = true;
							$('#lms_two_wheeler_model').html('').append( _voptionId );
						} else {

						}
					},function(errorMessage){
						console.log("Something went wrong!"+Error.message);
					});
				} catch(Error){
					console.log("Something went wrong!"+Error.message);
				}
			}

			$scope.selectedModalOption = function(argument){

				try{
					var webUrl = angular.element(document.getElementById('web_url')).val();
					var modelValue = argument.val();
					var val = modelValue;
				    modelselectedId = $('#lms_two_wheeler_model option:selected').attr('id');
				    var makeValuek = $('#lms_two_wheeler_make option:selected').text();
				    var modelValuek = $('#lms_two_wheeler_model option:selected').attr('model');
				    var variantnameK = $('#lms_two_wheeler_model option:selected').attr('variant');
				    var propertyRiskType = $('#lms_two_wheeler_model option:selected').attr('ptype');
				    var vehiclefueltypek = $('#lms_two_wheeler_model option:selected').attr('fuelname');

				    /*lms_two_wheeler_city_registration*/
				    var calObject = new Object();
				        calObject.makename = makeValuek;
				        calObject.modelname = modelValuek;
				        calObject.productname = propertyRiskType;
				        calObject.varianttypename = variantnameK;
				        calObject.stateCodeName = $('#lms_two_wheeler_model option:selected').attr('statecheck');
				        calObject.manyear = angular.element(document.getElementById('lms_two_wheeler_man_year')).val();
				     	
				     	vehiclemake = makeValuek;
				     	vehiclemodel = modelValuek;
				     	vehicleVariant = variantnameK;
				     	vehiclefueltype = vehiclefueltypek;
				     	vehiclerikType = propertyRiskType;
				     	vehiclecc = $('#lms_two_wheeler_model option:selected').attr('cc');
				     	vehicleSeatingCapacity = $('#lms_two_wheeler_model option:selected').attr('vehiclescap');
				     	vehicleExShowroomPrice = $('#lms_two_wheeler_model option:selected').attr('vehiclxsprice');

				     	$('#loadIDVValue').html('').append(leaderImage);

				     	$http({
							url : webUrl+'get_post_make',
							method : 'POST',
							cache : false,
							dataType : 'json',
							data : $.param( calObject ),
							headers : {
									"Content-Type": 'application/x-www-form-urlencoded'
								}
						}).then(function(responceCheck){
							var checkRescal = Object(responceCheck);
							var _amtres = checkRescal.data;
							$('#loadIDVValue').html('');
							var _compiledata = $compile(_amtres._scrollbar)($scope);
							var scrollbardiv = '';
							vehicleidv = _amtres.idvvalue;
							vehicleminidv = _amtres._min;
							vehiclemaxidv = _amtres._max;
							$scope.preimumQuoteLoader = true;
	 						$('.slidecontainer').html('').append( _compiledata );
	 						$('#lms_car_idv').val( _amtres.idvvalue );
						},function(errorMessage){
							console.log("Something went wrong selectedModalOption !"+Error.message);
				      });

				} catch(Error){
					console.log("Something went wrong selectedModalOption !"+Error.message);
				}

			}

			$scope.getChangeQuoteValue = function(idvChanegValue){
				vehicleidv = idvChanegValue;
				//$scope.preimumQuoteLoader = true;
				$("#lms_car_idv").val( idvChanegValue );
			}

			$scope.getQuoteInformation = function(){

				try{

					var getregisteredYear = $scope.getregisteredYear();

					if(getregisteredYear == false){
						return false;
					}
					
					var getRegManComparision = $scope.getRegManComparision();
					if(getRegManComparision == false){
						return false;
					}
					//lms_motor_pyp_available

					var webUrl = angular.element(document.getElementById('web_url')).val();
					var vehicleregDate = $('#lms_two_wheeler_registration_date').val();
					var vehicleManDate = $('#lms_two_wheeler_man_year').val();
					var pypstartsdate = $('#lsm_car_pyp_starts_date').val() || '';
					var pypendsdate = $('#lsm_car_pyp_ends_date').val() || '';
					var lmscartenure = $('#lms_car_tenure').val() || '0';
					var lmscarvalidlicense = $('input[name="lms_car_valid_license"]:checked').val();
					var lmscarclaimpolicy = $('input[name="lms_car_claim_policy"]:checked').val();
					var lmscarexistingpapolicy = $('input[id="lms_car_existing_pa_policy"]:checked').val();
					var pypavailablee = $('input[id="lms_motor_pyp_available"]:checked').val();
					var lmscardouneedstandpa = $('#lms_car_do_u_need_stand_pa').val();
					var xvehiclemake = $('#lms_two_wheeler_make option:selected').text();
					var xvehiclemodel = $('#lms_two_wheeler_model option:selected').attr('model') || 0;
					var lmstwo_wheeler_regno = $('#lms_two_wheeler_reg_no').val();
					var lms_caremail = $('#lms_car_email').val();
					var lms_carmobile = $('#lms_car_mobile').val();
					var lmsnvbvalue = $('#lms_car_ncb option:selected').val();

					var errorCount = 0;
					var errorMessage = '';
					var declarativelicence = $('#lms_car_valid_license_declaration');
					var clickdeclarativelicence = 0;
					if(declarativelicence.is(':checked')){
						clickdeclarativelicence = 1;
					}
					var vehicleRegDa = vehicleregDate;//vehicleRegisterDate || 
					if(vehicleRegDa.length == 0){
						errorMessage += "Please Select Register Date! \n";
						errorCount++;
					}
					var vehicleMandate = vehicleManfactureDate || vehicleManDate;
					if(vehicleMandate.length == 0){
						errorMessage += "Please select manfacute date! \n";
						errorCount++;
					}
					if((pypstartsdate.length == 0 && vehiclePreviousChecker == 1) || (pypendsdate.length == 0 && vehiclePreviousChecker == 1)){
						errorMessage += "Please select PYP start date and end date! \n";
						errorCount++;
					}
					if(xvehiclemake.length == 0){
						errorMessage += "Please select Manufacturer! \n";
						errorCount++;
					}
					if(xvehiclemake.length > 0 && xvehiclemodel.length == 0){
						errorMessage += "Please select Model Varient! \n";
						errorCount++;
					}

					if(lmstwo_wheeler_regno.length == 0){
						errorMessage += "Please Enter Registration Number \n";
						errorCount++;
					}
					if(lms_caremail.length == 0){
						errorMessage += "Please Enter E-mail \n";
						errorCount++;
					}
					if(lms_carmobile.length == 0){
						errorMessage += "Please Enter Mobile Number \n";
						errorCount++;
					}

					if(lmscartenure == 0){
						errorMessage += "Please Select Tenure \n";
						errorCount++;
					}

					if(pypavailablee == 1){
						if(lmsnvbvalue.length == 0 && lmscarclaimpolicy == 1){
							errorMessage += "Please Select NCB Value. \n";
							errorCount++;
						}
					}

					vehiclemake = xvehiclemake;
					vehiclemodel = xvehiclemodel;

					var selectedvehicleidv = $('#lms_car_idv').val();
					var regCityName = $("#lms_two_wheeler_city_registration").val();
					var lms_car_ncb = $('#lms_car_ncb option:selected').val();
					var engineeNumber = $('#lms_car_pro_engine_num').val();
					var chasisNumber = $('#lms_car_pro_chasis_num').val();
					var vehicleNumber = $('#lms_two_wheeler_reg_no').val();
					
					var lmssalut = $('#lms_car_salut').val();
					var lmsfname = $('#lms_car_fname').val();
					var lmslname = $('#lms_car_lname').val();

					if(vehicleNumber.length == 0){
						errorMessage += 'Please Enter Registration Number \n';
						errorCount++;
					}
					if(lmslname.length == 0){
						errorMessage += 'Please Enter Customer Last Name \n';
						errorCount++;
					}
					var lmsdob = $('#lms_car_dob').val();
					
					var lmsgender = $('#lms_car_gender').val() || '';
					
					var lmsoccupation = $('#lms_car_pro_occupation').val() || '';
					var lmsmaterial = $('#lms_car_pro_marital').val() || '';
					var lmsadd1 = $('#lms_car_add3').val();
					var lmsadd2 = $('#lms_car_add2').val();
					var lmsadd3 = $('#lms_car_area').val();
					var lmscity = $('#lms_car_city').val();
					var lmsstate = $('#lms_car_state').val();
					var lmspincode = $('#lms_car_zip').val();
					var lmsnominename = $('#lms_car_pro_nname').val();
					var lmsnomineage = $('#lms_car_pro_nage').val();
					var lmsnominerelation = $('#lms_car_pro_nomie_relation').val() || '';
					
					if(errorCount > 0){
						alert(errorMessage);
						return false;
					}
					var lmsexistingname = $('#lms_car_prop_existing_insure').val();
					var lmspolicynumber = $('#lms_car_pro_existing_policynum').val();

					var quoteServiceObj = new Object();
					quoteServiceObj.vehicleRegisterDate = vehicleRegDa;
					quoteServiceObj.vehicleManfactureDate = vehicleMandate;
					quoteServiceObj.vehiclerikType = (vehiclerikType ? vehiclerikType : $('#lms_two_wheeler_model option:selected').attr('ptype'));
					quoteServiceObj.vehiclemake = xvehiclemake;
					quoteServiceObj.vehiclemodel = xvehiclemodel;
					quoteServiceObj.vehiclefueltype = (vehiclefueltype ? vehiclefueltype : $('#lms_two_wheeler_model option:selected').attr('fuelname'));
					quoteServiceObj.vehicleVariant = (vehicleVariant ? vehicleVariant : $('#lms_two_wheeler_model option:selected').attr('variant'));
					quoteServiceObj.vehicleidv = selectedvehicleidv;
					quoteServiceObj.vehicleVehicleAge = (vehicleVehicleAge ? vehicleVehicleAge : $('#vehicleVehicleAge').val());
					quoteServiceObj.vehiclecc = ( vehiclecc ? vehiclecc : $('#lms_two_wheeler_model option:selected').attr('cc'));
					quoteServiceObj.vehiclePlaceOfRegistration = vehiclePlaceOfRegistration || regCityName;
					quoteServiceObj.vehicleSeatingCapacity = (vehicleSeatingCapacity ? vehicleSeatingCapacity : $('#lms_two_wheeler_model option:selected').attr('vehiclescap'));
					quoteServiceObj.vehicleExShowroomPrice = ( vehicleExShowroomPrice ? vehicleExShowroomPrice : $('#show_room_value').val() );
					quoteServiceObj.vehiclePreviousChecker = vehiclePreviousChecker;
					quoteServiceObj.vehiclethirdpartyValue = vehiclethirdpartyValue;
					quoteServiceObj.depPreviousPolicyValue = depPreviousPolicyValue;
					quoteServiceObj.pypstartsdate = pypstartsdate;
					quoteServiceObj.pypendsdate = pypendsdate;
					quoteServiceObj.vehicleRegisterNumber = lmstwo_wheeler_regno;
					quoteServiceObj.vehicleRegState = vehicleRegState || $('#vehicleRegState').val();
					quoteServiceObj.vehicleemailId = lms_caremail;
					quoteServiceObj.vehicleMobile = lms_carmobile;
					quoteServiceObj.lmscartenure = lmscartenure;
					quoteServiceObj.lmscarvalidlicense = lmscarvalidlicense;
					quoteServiceObj.clickdeclarativelicence = clickdeclarativelicence;
					quoteServiceObj.engineeNumber = engineeNumber;
					quoteServiceObj.chasisNumber = chasisNumber;
					quoteServiceObj.lmssalut = lmssalut;
					quoteServiceObj.lmsfname = lmsfname;
					quoteServiceObj.lmslname = lmslname;
					quoteServiceObj.lmsdob = lmsdob;
					quoteServiceObj.lmsgender = lmsgender;
					quoteServiceObj.lmsoccupation = lmsoccupation;
					quoteServiceObj.lmsmaterial = lmsmaterial;
					quoteServiceObj.lmsadd1 = lmsadd1;
					quoteServiceObj.lmsadd2 = lmsadd2;
					quoteServiceObj.lmsadd3 = lmsadd3;
					quoteServiceObj.lmscity = lmscity;
					quoteServiceObj.lmsstate = lmsstate;
					quoteServiceObj.lmspincode = lmspincode;
					quoteServiceObj.lmsnominename = lmsnominename;
					quoteServiceObj.lmsnomineage = lmsnomineage;
					quoteServiceObj.lmsnominerelation = lmsnominerelation;
					quoteServiceObj.lmsexistingname = lmsexistingname;
					quoteServiceObj.lmspolicynumber = lmspolicynumber;
					
					quoteServiceObj.lmscarexistingpapolicy = (lmscarexistingpapolicy ? lmscarexistingpapolicy : 0);
					quoteServiceObj.lmscardouneedstandpa = (lmscardouneedstandpa ? lmscardouneedstandpa : 0);
					quoteServiceObj.ncbvalue = (lms_car_ncb ? lms_car_ncb : 0);

					$scope.getQuoteLoader = true;

					$http({
						url : webUrl+'two-quote-data',
						method : 'POST',
						cache : false,
						dataType : 'json',
						data : $.param( quoteServiceObj ),
						headers : {
									"Content-Type": 'application/x-www-form-urlencoded'
								}
					}).then(function(returnResponce){
						var quoteRes = Object(returnResponce);
						var quiteData = quoteRes.data;
						console.log(quiteData);

						if(quiteData.StatusCode != 200){
							alert(quiteData.StatusMsg);
							//Cover
							return false;
						}

						var quoteValuePre = quiteData.PremiumDetails;
						vehicleOrdernumber = quiteData.OrderNo;
						vehicleQuotationNumner = quiteData.QuoteNo;

						if(quiteData.addonStatus == true){
						$scope.saveleadButton = false;
						$scope.recalculateProposal = true;
						$scope.isAddDetailsAvailable = true;
						var addonDatainfo = quiteData.addonData[0];
						var parentAddon = $('#AddDetailsAvailable');
						parentAddon.find('[id="addon_mount"]').html(addonDatainfo.Premium);
						parentAddon.find('[id="addontext"]').html(addonDatainfo.Desc);

						} else {

						$scope.proposalRequestRes = false;
						$scope.saveleadButton = true;
						$scope.recalculateProposal = false;
						$scope.isAddDetailsAvailable = false;

						}
						
						$('#quoteInfoDis').html('').append('<label> Quote No: </label><input readonly id="lms_est_QuoteNo" name="lms_est_QuoteNo" class="form-control input-sm number-validate" placeholder="Quote No" value="'+quiteData.QuoteNo+'" ng-model="lms_est_QuoteNo" >');

						var premiumcover = JSON.parse(quiteData.Cover);
						console.log(premiumcover);
						var calPremiunAmount = 0;
						var papremium = 0;

						var odpremiumname = 0;
						var tppremiumname = 0;

						for(var p=0;p<premiumcover.length;p++){

							if(premiumcover[p].Name == 'PAOwnerDriver'){
								papremium = premiumcover[p].Premium;
							}

							if(premiumcover[p].Name == 'CarDamage'){
								odpremiumname = premiumcover[p].Premium;
							}

							if(premiumcover[p].Name == 'ThirdPartyLiability'){
								tppremiumname = premiumcover[p].Premium;
							}

							calPremiunAmount += (premiumcover[p].Premium)*1;
						}
						if(premiumcover[0].Premium <= 0){
							odPremiumChecker = false;
						}
						var premioumTable = '<table class="table text-center" style="text-align: start;">';
                    		premioumTable += '<tr><td>OD Premium</td><td>:</td><td>'+odpremiumname+'</td></tr>';//premiumcover[0].Premium
                    		premioumTable += '<tr><td>PA Premium</td><td>:</td><td>'+papremium+'</td></tr>';
                    		premioumTable += '<tr><td>NCB</td><td>:</td><td>'+premiumcover[0].ExtraDetails.BreakUp.NCB+'</td></tr>';
                    	    premioumTable += '<tr><td>Third Party</td><td>:</td><td>'+tppremiumname+'</td></tr>';
                    	    premioumTable += '<tr><td>Tax</td><td>:</td><td>'+quoteValuePre.ServiceTax+'</td></tr>';
                    		premioumTable += '<tr><td>Total Premium</td><td>:</td><td>'+quoteValuePre.TotalPremium+'</td></tr>';
                  			premioumTable += '</table>';
						$('#calPremiumData').html('').append( premioumTable );
						$('#lms_est_premium').val( quoteValuePre.TotalPremium );

						$scope.getQuoteLoader = false;
						//$scope.preimumQuoteLoader = false;
					},function(errorResponce){
						console.log("Something went wrong getQuoteInformation !"+errorResponce.message);
					});
				} catch(Error){
					console.log("Something went wrong getQuoteInformation !"+Error.message);
				}
				getQuoteClickvcall = 1;
			}

			$scope.isValidChecked = false;
			$scope.isExistingPAChecked = false;
			$scope.isPolicyChecker = false;
			$scope.isPolicyClaiinchecker = false;
			$scope.ischeckStandAlonePA = 0;
			$scope.ischeckexpiryPolicyCLaim = 0;

			$scope.recalculateAddonProposal = function(_thisform){
				$scope.createTwowheeler(_thisform,false);
			}

		    $scope.checkvalidStuff = function (boolean) {
		        $scope.isValidChecked = boolean;
		    }

		    $scope.checkexpiryPolicyCLaim = function(numBerCLaim){
		    	$scope.ischeckexpiryPolicyCLaim = numBerCLaim;
		    	if(numBerCLaim == 1){
		    		$scope.isPolicyClaiinchecker = 0;
		    	} else {
		    		$scope.isPolicyClaiinchecker = 1;
		    	}
		    }
		    $scope.checkExistingPAStuff = function (boolean) {
		        $scope.isExistingPAChecked = ((boolean == undefined || boolean == false ) ? false : true);
		    }

		    $scope.checkPreviousInfo = function(checkedPreiouslink){
     			$scope.isPolicyChecker = checkedPreiouslink;
     			$scope.lms_motor_pyp_availablek = checkedPreiouslink;
     			$scope.lms_motor_pyp_availablek = vehiclePreviousChecker;
			}

			$scope.checkStandAlonePA = function(paBoolean){
				$scope.ischeckStandAlonePA = paBoolean;
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

			$scope.createTwowheeler = function(_twowheelinfo,booleanName){

			try{

				if( odPremiumChecker == false){
					alert("Can't save the lead with OD Premium value 0");
					return false;
				}

				var getRegManComparision = $scope.getRegManComparision();
					if(getRegManComparision == false){
						return false;
					}

				var _thistwoData = _twowheelinfo;
				var _twowheelArray = new Array();
				var _formData = _thistwoData.serializeArray();
				$.each(_formData,function(index,value){
					var _twowheelObj = new Object();
					_twowheelObj.name = value.name;
					_twowheelObj.value = value.value; 
					_twowheelArray.push(_twowheelObj);
				});

				var _vehicleExShowroomPriceObject = new Object();
				_vehicleExShowroomPriceObject.name = 'vehicleExShowroomPrice';
				_vehicleExShowroomPriceObject.value = (vehicleExShowroomPrice ? vehicleExShowroomPrice : $('#show_room_value').val()) ;
				_twowheelArray.push(_vehicleExShowroomPriceObject);
				var _vehiclerikTypeObject = new Object();
				_vehiclerikTypeObject.name = 'vehiclerikType';
				_vehiclerikTypeObject.value = vehiclerikType || $('#lms_two_wheeler_model option:selected').attr('ptype');//$('#vehiclerikType').val();
				_twowheelArray.push(_vehiclerikTypeObject);
				var _vehiclefueltypeObject = new Object();
				_vehiclefueltypeObject.name = 'vehiclefueltype';
				_vehiclefueltypeObject.value = vehiclefueltype || $('#lms_two_wheeler_model option:selected').attr('fuelname');//$('#vehiclefueltype').val();
				_twowheelArray.push(_vehiclefueltypeObject);
				var _vehicleVariantObject = new Object();
				_vehicleVariantObject.name = 'vehicleVariant';
				_vehicleVariantObject.value = vehicleVariant || $('#lms_two_wheeler_model option:selected').attr('variant');//$('#vehicleVariant').val();
				_twowheelArray.push(_vehicleVariantObject);
				var _vehicleVehicleAgeObject = new Object();
				_vehicleVehicleAgeObject.name = 'vehicleVehicleAge';
				_vehicleVehicleAgeObject.value = vehicleVehicleAge || $('#vehicleVehicleAge').val();
				_twowheelArray.push(_vehicleVehicleAgeObject);
				var _vehicleccObject = new Object();
				_vehicleccObject.name = 'vehiclecc';
				_vehicleccObject.value = vehiclecc || $('#lms_two_wheeler_model option:selected').attr('cc');//$('#vehiclecc').val();
				_twowheelArray.push(_vehicleccObject);
				var _nextObject = new Object();
				_nextObject.name = 'vehicleSeatingCapacity';
				_nextObject.value = vehicleSeatingCapacity || $('#lms_two_wheeler_model option:selected').attr('vehiclescap');//$('#vehicleSeatingCapacity').val();
				_twowheelArray.push(_nextObject);
				var _vehicleRegStateObject = new Object();
				_vehicleRegStateObject.name = 'vehicleRegState';
				_vehicleRegStateObject.value = vehicleRegState || $('#vehicleRegState').val();
				_twowheelArray.push(_vehicleRegStateObject);

				var _vehicleOrdernumberObject = new Object();
				_vehicleOrdernumberObject.name = 'vehicleOrdernumber';
				_vehicleOrdernumberObject.value = vehicleOrdernumber || $('#vehicleOrdernumber').val();
				_twowheelArray.push(_vehicleOrdernumberObject);

				var _vehicleQuotationNumnerObject = new Object();
				_vehicleQuotationNumnerObject.name = 'vehicleQuotationNumner';
				_vehicleQuotationNumnerObject.value = vehicleQuotationNumner || $('#lms_est_QuoteNo').val();
				_twowheelArray.push(_vehicleQuotationNumnerObject);
				var _vehiclemodelObject = new Object();
				_vehiclemodelObject.name = 'vehiclemodel';
				_vehiclemodelObject.value = vehiclemodel || $('#vehiclemodel').val();
				_twowheelArray.push(_vehiclemodelObject);

				var _vehicleminidvObj = new Object();
				_vehicleminidvObj.name = 'vehicleminidv';
				_vehicleminidvObj.value = vehicleminidv || $('#vehicleminidv').val();
				_twowheelArray.push(_vehicleminidvObj);
				
				var _vehiclemaxidvObj = new Object();
				_vehiclemaxidvObj.name = 'vehiclemaxidv';
				_vehiclemaxidvObj.value = vehiclemaxidv || $('#vehiclemaxidv').val();
				_twowheelArray.push(_vehiclemaxidvObj);

				var _booleanNameObj = new Object();
				_booleanNameObj.name = 'booleanName';
				_booleanNameObj.value = booleanName;
				_twowheelArray.push(_booleanNameObj);

				var policyExpireDateobj = new Object();
				policyExpireDateobj.name = 'lms_car_pro_existing_policy_expiry';
				policyExpireDateobj.value = $("#lms_car_pro_existing_policy_expiry").val();
				_twowheelArray.push(policyExpireDateobj);

				var policyStartDaete = new Object();
				policyStartDaete.name = 'lms_car_pro_policy_start';
				policyStartDaete.value = $("#lms_car_pro_policy_start").val();

				_twowheelArray.push(policyStartDaete);

				var validationTwo = twowheelerValidation.chekMYvalidations();
				var duplicatecheck = $scope.checkDuplicateFunc($('#lms_car_mobile'),$('#lms_car_mobile').val(),'Two Wheeler',$('#productlead_id').val());

				var lsmhomevalidation = $scope.lmsCar.$valid;
				if(validationTwo == false){
					return false;
				}
				if(lsmhomevalidation == false){
					return false;
				}
				var productlead = $('#productlead_id').val();
				if(lsmhomevalidation == true && (getQuoteClickvcall == 0 && productlead.length == 0)){
				alert("Please Create get quote!");
				return false;
				}

				if(duplicatecheck.status == false){
					var Aprompt = confirm(duplicatecheck.message);
					if(!Aprompt){
						//location.reload();
						//return false;
						var finalConfirm = confirm('Lead is canceling');
                        if(finalConfirm){
                            alert('Lead Canceled! reloading page');
                            location.reload();
                            return false;
                        } else {
                        	return false;
                        }
					}
				}

				if(booleanName == true) {
					$scope.pleasewaitButton = true; 
				    $scope.saveleadButton = false;
			        $("#twowheelData :input").prop("disabled", true);
			 	} else {
					$scope.pleasewaitButton = true; 
			 		$scope.recalculateProposal = false; 
			 	}
				$http({
						url : __pathname+'create-two-wheel-lead',
						method : 'POST',
						cache : false,
						data : $.param( _twowheelArray ),
						dataType : 'json',
						async : true,
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
						}
					}).then(function(responceData){

						var twoStatus = Object(responceData);
						var _statusreport = twoStatus.data;
						if(_statusreport.addon == true){
							var _quoteValuePre = _statusreport.PremiumDetails;
							$scope.proposalRequestRes = true;
							$scope.saveleadButton = true;
							$scope.recalculateProposal = false;
							$scope.pleasewaitButton = false; 

							var Fpremiumcover = JSON.parse(JSON.parse((_statusreport.Cover)));
							var FcalPremiunAmount = 0;
							var papremium = 0;
							for(var p=1;p<Fpremiumcover.length;p++){

								if(Fpremiumcover[p].Name == 'PAOwnerDriver'){
									papremium = Fpremiumcover[p].Premium;
								}

								FcalPremiunAmount += (Fpremiumcover[p].Premium)*1;
							}
							if(Fpremiumcover[0].Premium <= 0){
								odPremiumChecker = false;
							}

							var FpremioumTable = '<table class="table text-center" style="text-align: start;">';
                    		FpremioumTable += '<tr><td>OD Premium</td><td>:</td><td>'+Fpremiumcover[0].Premium+'</td></tr>';
                    		FpremioumTable += '<tr><td>PA Premium</td><td>:</td><td>'+papremium+'</td></tr>';
                    		FpremioumTable += '<tr><td>NCB</td><td>:</td><td>'+Fpremiumcover[0].ExtraDetails.BreakUp.NCB+'</td></tr>';
                    	    FpremioumTable += '<tr><td>Third Party</td><td>:</td><td>'+FcalPremiunAmount+'</td></tr>';
                    	    FpremioumTable += '<tr><td>Tax</td><td>:</td><td>'+_quoteValuePre.ServiceTax+'</td></tr>';
                    		FpremioumTable += '<tr><td>Total Premium</td><td>:</td><td>'+_quoteValuePre.TotalPremium+'</td></tr>';
                  			FpremioumTable += '</table>';
							$('#FcalPremiumData').html('').append( FpremioumTable );

							$('#lms_car_final_pre_amount').attr('readonly',true).val( _quoteValuePre.TotalPremium );
							$('#lms_car_order_number_proposal').attr('readonly',true).val( _statusreport.OrderNo );
							$('#lms_car_quote_number_proposal').attr('readonly',true).val( _statusreport.QuoteNo );
						}

						if(_statusreport.status == true){
							alert('Succesfully posted values, Lead Number is'+_statusreport.message);
							location.reload();
						}

					},function(errorMessage){
					});

				return false;
			} catch(Error){
				console.error("Error Message IN twoWheelerCreate"+Error.message);
			}
			
		}

		}

	}

});
