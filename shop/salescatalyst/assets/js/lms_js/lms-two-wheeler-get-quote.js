document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-common-controller-js.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-state-city-controller.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-duplicate-check-app.js.js"></script>');
var leaderImage = '<img src="'+__pathname+'assets/images/ajax-loader.gif" style="margin: 10PX;padding: 0px;width: 25px;height: 25px;">';
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
						$('#lms_car_ncb').html('').append(optionTextncb);
					},function(errorMessage){

					});
			}
		}
	}
})
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
_lmsapp.directive('registrationNumber',function(){
	return{
		restrict : 'AE',
		link : function(scope,element,attr){
			element.on('change',function(){
				scope.getfastlineData($(this));
			});
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
		controller : 'getQuote',
		link : function(scope,element,attr){
			scope.getvehiclemodelmake();
			scope.autoLoadtwowheeler();
			element.on('submit',function(){
				scope.getQuoteInformation();
			})
		},
		controller : function($scope,$http,$compile){
			
			$scope.getclickEnable = false;
			var vehiclencbval = 0;
			var vehicleNumber;
			var vehiclechasisnuber;
			var vehiclecc;
			var vehicledoman;
			var vehivledoreg;
			var vehicleengnum;
			var vehicleModel;
			var vehiclepor;
			var vehiclemake;
			var vehicleIdv;
			var vehiclevariant;
			var vehiclecityreg;
			var changemodelname;
			var changemodelValue = false;
			var vehicleshowrmpice=0;
			var seatingCapacty=0;
			var vehicleAge=0;
			var vehivlerisktype;
			var vehiclefueltype;
			var vehiclestate;

			$scope.autoLoadtwowheeler = function(){
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

			$scope.getfastlineData = function(_parentReg){

				vehicleNumber = _parentReg.val();
				var vehicleObj = new Object();
					vehicleObj.number = vehicleNumber;
				try{
					$http({
						url : __pathname+'get-fastline-data',
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
						$('#lms_two_wheeler_make option').each(function(){
							var _parentMake = $(this);
							if(_parentMake.text() == _datainfo._mk){
								var parentElectedValue = _parentMake.val();
								$('#lms_two_wheeler_make').val( parentElectedValue );
								$scope.selectedMakeOption( parentElectedValue, true );
								changemodelValue = true;
							}
						});

						vehiclecc 			= _datainfo._cc;
						vehiclechasisnuber 	= _datainfo._cn;
						vehicledoman 		= _datainfo._dom;
						vehivledoreg 		= _datainfo._dor;
						vehicleengnum 		= _datainfo._en;
						vehicleModel 		= _datainfo._mk;
						vehiclepor 			= _datainfo._por;
						vehicleNumber 		= _datainfo._rno;
						vehiclemake 		= _datainfo._mk;
						vehicleIdv 			= _datainfo._idv;
						vehiclevariant 		= _datainfo._vr;
						vehiclecityreg 		= _datainfo._cp;
						vehicleshowrmpice	= _datainfo._esp;
						changemodelname		= _datainfo._md;
						seatingCapacty		= _datainfo._sc;
						vehicleAge			= _datainfo._va;
						vehivlerisktype		= _datainfo._rt;
						vehiclefueltype		= _datainfo._ft
						vehiclestate		= _datainfo._sor;

						$('#lms_two_wheeler_man_year').val( _datainfo._dom );
						$('#lms_two_wheeler_registration_date').val( vehivledoreg );
						$('#lms_two_wheeler_city_registration').val( vehiclecityreg );
						$('#lms_car_idv').val( vehicleIdv );
						var _compiledata = $compile(_datainfo._scrollbar)($scope);
						$('.slidecontainer').html('').append( _compiledata );
						
					});
				} catch(errorRespoce){
					console.log(errorRespoce);
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
							_voptionId += '<option id="'+value._mid+'" pType = "'+value._pt+'" statecheck = "'+value._stc+'" variant="'+value._vri+'" name="'+value._itc+'" fuelname = "'+value._vfl+'" cc = "'+value._vcc+'" model="'+value._vmd+'" vehiclescap="'+value._vscp+'" vehiclxsprice="'+value._vesp+'" value="'+value._md+'" '+(changemodelname == value._vmd ? 'selected' : '')+''+($scope.lms_two_wheeler_model == value._md ? 'selected' : '')+'>'+value._md+'</option>';
							} else {
							_voptionId += '<option id="'+value._mid+'" pType = "'+value._pt+'" statecheck = "'+value._stc+'" variant="'+value._vri+'" name="'+value._itc+'" fuelname = "'+value._vfl+'" cc = "'+value._vcc+'" model="'+value._vmd+'" vehiclescap="'+value._vscp+'" vehiclxsprice="'+value._vesp+'" value="'+value._md+'" '+($scope.lms_two_wheeler_model == value._md ? 'selected' : '')+'>'+value._md+'</option>';
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
							_voptionId += '<option id="'+value._mid+'" pType = "'+value._pt+'" statecheck = "'+value._stc+'" variant="'+value._vri+'" name="'+value._itc+'" fuelname = "'+value._vfl+'" cc = "'+value._vcc+'" model="'+value._vmd+'" vehiclescap="'+value._vscp+'" vehiclxsprice="'+value._vesp+'" value="'+value._md+'" '+(changemodelname == value._vmd ? 'selected' : '')+''+($scope.lms_two_wheeler_model == value._md ? 'selected' : '')+'>'+value._md+'-'+value._vcc+ 'CC</option>';
							} else {
							_voptionId += '<option id="'+value._mid+'" pType = "'+value._pt+'" statecheck = "'+value._stc+'" variant="'+value._vri+'" name="'+value._itc+'" fuelname = "'+value._vfl+'" cc = "'+value._vcc+'" model="'+value._vmd+'" vehiclescap="'+value._vscp+'" vehiclxsprice="'+value._vesp+'" value="'+value._md+'" '+($scope.lms_two_wheeler_model == value._md ? 'selected' : '')+'>'+value._md+'-'+value._vcc+ 'CC</option>';
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

				    var calObject = new Object();
				        calObject.makename = makeValuek;
				        calObject.modelname = modelValuek;
				        //
				        calObject.productname = propertyRiskType;
				        calObject.varianttypename = variantnameK;
				        calObject.stateCodeName = $('#lms_two_wheeler_model option:selected').attr('statecheck');
				        calObject.manyear = angular.element(document.getElementById('lms_two_wheeler_man_year')).val();
				     	
				     	vehiclemake = makeValuek;
				     	vehicleModel = modelValuek;
				     	vehiclevariant = variantnameK;
				     	vehiclefueltype = vehiclefueltypek;
				     	vehivlerisktype = propertyRiskType;
						changemodelname = modelValuek;
						
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
							
							vehicleIdv = _amtres.idvvalue;
							
						},function(errorMessage){
							console.log("Something went wrong selectedModalOption !"+Error.message);
				      });

				} catch(Error){
					console.log("Something went wrong selectedModalOption !"+Error.message);
				}

			}
			$scope.getvehiclemodelmake = function(){

				try{
					$http({
						url : __pathname+'cities-two-vehicle',
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
			$scope.getChangeQuoteValue = function( idvChanegValue ){
				vehicleIdv = idvChanegValue;
				$("#lms_car_idv").val( idvChanegValue );
			}
			
			$scope.getQuoteInformation = function(){
				try{
					$scope.getclickEnable = true;
					var calculateformData = new Object();
					calculateformData.vehicleNumber			=	vehicleNumber || $('#lms_two_wheeler_reg_no').val();
					calculateformData.vehiclecc				=	vehiclecc;
					calculateformData.vehiclechasisnuber	=	vehiclechasisnuber;
					calculateformData.vehicledoman			=	vehicledoman || $('#lms_two_wheeler_man_year').val();
					calculateformData.vehivledoreg			=	vehivledoreg || $('#lms_two_wheeler_registration_date').val();
					calculateformData.vehicleModel			=	vehicleModel;
					calculateformData.vehiclepor			=	vehiclepor;
					calculateformData.vehicleengnum			=	vehicleengnum;
					calculateformData.vehiclemake			=	vehiclemake;
					calculateformData.vehicleIdv			=	vehicleIdv;
					calculateformData.vehiclevariant		=	vehiclevariant;
					calculateformData.vehiclecityreg		=	vehiclecityreg;
					calculateformData.vehicleshowrmpice		=	vehicleshowrmpice || $('#lms_two_wheeler_model option:selected').attr('vehiclxsprice');
					calculateformData.changemodelname		=	changemodelname;
					calculateformData.vehicleAge			=	vehicleAge || 0;
					calculateformData.vehivlerisktype		= 	vehivlerisktype;
					calculateformData.vehiclefueltype 		=	vehiclefueltype;
					calculateformData.vehicletenure 		=	$('#lms_car_tenure').val();
					calculateformData.lmscarexistingpapolicy=	$('input[name="lms_car_existing_pa_policy"]:checked').val();
					calculateformData.vehiclestate			=	vehiclestate;
					calculateformData.vehiclencbval			=	$("#lms_car_ncb").val() || vehiclencbval;
					calculateformData.vehiclevallidlicency	=	$('input[name="lms_car_valid_license"]:checked').val();
					calculateformData.vehicleSeatingCapacity = (vehicleSeatingCapacity ? vehicleSeatingCapacity : $('#lms_two_wheeler_model option:selected').attr('vehiclescap'));
					calculateformData.seatingCapacty		=	seatingCapacty || $('#lms_two_wheeler_model option:selected').attr('vehiclescap');

					$http({
						url 		:	__pathname+'get-quote-data',
						method 		: 	'POST',
						cache 		: 	false,
						processData	:	false,
						contentType	:	false,
						dataType 	: 	'json',
						data 		: 	$.param(	calculateformData	),
						async 		: 	true,
						headers		: 	{"Content-Type": 'application/x-www-form-urlencoded'}
					}).then(function(responceData){
						var twoStatus = Object(responceData);
						var _statusreport = newFunction(twoStatus);
						var mmdnsd = _statusreport.message;
						if(mmdnsd.StatusCode != 200){
							alert(mmdnsd.StatusMsg);
							return false;
						}

						var _quoteValuePre = mmdnsd.PremiumDetails;

						var premiumcover = JSON.parse(mmdnsd.Cover);
						var calPremiunAmount = 0;
						var papremium = 0;

						for(var p=1;p<premiumcover.length;p++){
							if(premiumcover[p].Name == 'PAOwnerDriver'){
								papremium = premiumcover[p].Premium;
							}
							calPremiunAmount += (premiumcover[p].Premium)*1;
						}
						if(premiumcover[0].Premium <= 0){
							odPremiumChecker = false;
						}
						var premioumTable = '<table class="table text-center" style="text-align: start;">';
                    		premioumTable += '<tr><td>OD Premium</td><td>:</td><td>'+premiumcover[0].Premium+'</td></tr>';
                    		premioumTable += '<tr><td>PA Premium</td><td>:</td><td>'+papremium+'</td></tr>';
                    		premioumTable += '<tr><td>NCB</td><td>:</td><td>'+premiumcover[0].ExtraDetails.BreakUp.NCB+'</td></tr>';
                    	    premioumTable += '<tr><td>Third Party</td><td>:</td><td>'+calPremiunAmount+'</td></tr>';
                    	    premioumTable += '<tr><td>Tax</td><td>:</td><td>'+_quoteValuePre.ServiceTax+'</td></tr>';
                    		premioumTable += '<tr><td>Total Premium</td><td>:</td><td>'+_quoteValuePre.TotalPremium+'</td></tr>';
                  			premioumTable += '</table>';
                  		/*var premioumTable = '<table class="table text-center" style="text-align: start;">';
                    		premioumTable += '<tr><td>OD Premium</td><td>:</td><td>'+premiumcover[0].Premium+'</td></tr>';
                    		premioumTable += '<tr><td>NCB</td><td>:</td><td>'+premiumcover[0].ExtraDetails.BreakUp.NCB+'</td></tr>';
                    	    premioumTable += '<tr><td>Third Party</td><td>:</td><td>'+calPremiunAmount+'</td></tr>';
                    	    premioumTable += '<tr><td>Tax</td><td>:</td><td>'+_quoteValuePre.ServiceTax+'</td></tr>';
                    		premioumTable += '<tr><td>Total Premium</td><td>:</td><td>'+_quoteValuePre.TotalPremium+'</td></tr>';
                  			premioumTable += '</table>';*/

                  			$('#calPremiumData').html('').append( premioumTable );
						
						$('#lms_est_premium').attr('readonly',true).val( _quoteValuePre.TotalPremium );
						$scope.getclickEnable = false;
					},function(errorRespoce){

						
					});
				} catch(errorRespoce){
					console.log(errorRespoce);
				}
			}
		}
	}
});

function newFunction(twoStatus) {
	return twoStatus.data;
}
