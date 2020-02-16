_lmsapp.factory('LmsValidataionservice', ['$http', function ($http) {

		var factory = {};
		var dataresOnj = [];
		factory.checkDuplicateFunc = function(_pypValue,idName,productName,productIdvalue){
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
		
		factory.calculateConstructionAge = function(ageCalender){

			try{
				var electedYear = $('#'+ageCalender).val();
				if(electedYear.length == 0 || electedYear.length <= 0){
					$('#'+ageCalender).focus();
					return false;
				}
				var toDayDate = new Date();
				var yearThen = parseInt(electedYear);
		        var monthThen = parseInt(toDayDate.getMonth()+1);
		        var dayThen = parseInt(toDayDate.getDate());
				var birthday = new Date(yearThen, monthThen-1, dayThen);
		        var today = new Date();
				var differenceInMilisecond = today.valueOf() - birthday.valueOf();
				var years = Math.floor(differenceInMilisecond / 31536000000);
				if( years > 25 ) {
		         alert('Construction Age more than 25 years not allowed');
		         $('#'+ageCalender).val('');
		         $('#'+ageCalender).focus();
				 return false;
		      } else {
				  return true;
			  }
			} catch(Error){
				console.log("Error Message IN date"+Error.message);
			}
		}

		factory.calculateSpouseAge = function(dateofbirth){
			try{
				var date2String = dateofbirth;
				var selectedDate = date2String.toString();
				var splitdate = selectedDate.split('-');
				var yearThen = parseInt(splitdate[2]);
		        var monthThen = parseInt(splitdate[1]);
		        var dayThen = parseInt(splitdate[0]);
				var birthday = new Date(yearThen, monthThen-1, dayThen);
		        var today = new Date();
				var differenceInMilisecond = today.valueOf() - birthday.valueOf();
				var years = Math.floor(differenceInMilisecond / (365.25 * 24 * 60 * 60 * 1000));
				
					 if(years < 18) {
					 	 //alert('spouse age should be greater than 18 years');
		                $('#sship_spouse').val('');
		                $('#sship_spouse').focus();
		                return false;
		                } else {
						return true;
				 }
			} catch(Error){
				console.error(Error);
				console.log("Error Message IN date calculateSpouseAge"+Error.message);
			}
     	}

     	factory.risksameAddress = function(){
     			var hmeRiskAddress1 = $('#hme_risk_address1').val();
		        var hmeRiskAddress2 = $('#hme_risk_address2').val();
		        var hmeRiskArea = $('#hme_risk_area').val();
		        var hmeRiskPincode = $('#hme_risk_pincode').val();
		        var hmeRiskState = $('#hme_risk_state').val();
		        var hmeRiskCity = $('#hme_risk_city').val();
		        var hmeRiskNearestLandMark = $('#hme_risk_nearest_land_mark').val();
				var countter=0;
		        if(hmeRiskAddress1 == ''){ 
				$('#hme_risk_address1_error').html('Please Enter Riks Address1');
				countter++;
				} else { $('#hme_risk_address1_error').html(''); 
				}
		        if(hmeRiskAddress2 == ''){ 
				$('#hme_risk_address2_error').html('Please Enter Riks Address2');
				countter++;
				} else { $('#hme_risk_address2_error').html(''); }
		        if(hmeRiskArea == ''){ $('#hme_risk_area_error').html('Please Enter Risk Area');
				countter++;
				} else { $('#hme_risk_area_error').html(''); }
		        if(hmeRiskPincode == ''){ 
				$('#hme_risk_pincode_error').html('Please Enter Pin Code');
				countter++;
				} else { $('#hme_risk_pincode_error').html(''); }
		        if(hmeRiskState == ''){ 
				$('#hme_risk_state_error').html('Please Enter Risk State');
				countter++;
				} else { $('#hme_risk_state_error').html(''); }
		        if(hmeRiskCity == ''){
					$('#hme_risk_city_error').html('Please Enter Risk City');
					countter++;
					} else { $('#hme_risk_city_error').html(''); }
		        if(hmeRiskNearestLandMark == ''){
				$('#hme_risk_nearest_land_mark_error').html('Please Enter Risk Land Mark');
				countter++;
				} else { $('#hme_risk_nearest_land_mark_error').html(''); }

				if(countter > 0){
					return false;
				} else {
					return true;
				}

     	}

     	factory.previousClaimsfactory = function(){

				try{

					var hme_long_desone = $('#hme_long_des1');
					console.log(hme_long_desone);
					var hme_assets_damageone = $('#hme_assets_damage1');
					var hme_cause_lossone = $('#hme_cause_loss1');
					var hme_ins_placeone = $('#hme_ins_place1');
					var hme_policy_yrone = $('#hme_policy_yr1');
					var hme_ins_claimone = $('#hme_ins_claim1');
					var hme_loss_amtone = $('#hme_loss_amt1');
					
					var _pcount = 0;
					if((hme_long_desone.val()).length == 0){
						$('#error-hme_long_des').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Long Description </div>');
						_pcount++;
					} else {
						$('#error-hme_long_des').html('');
					}
					
					if((hme_assets_damageone.val()).length == 0){
						$('#error-hme_assets_damage').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Assets Damaged </div>');
						_pcount++;
					} else {
						$('#error-hme_assets_damage').html('');
					}
					
					if((hme_cause_lossone.val()).length == 0){
						$('#error-hme_cause_loss').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Cause Of Loss </div>');
						_pcount++;
					} else {
						$('#error-hme_cause_loss').html('');
					}
					
					if((hme_ins_placeone.val()).length == 0){
						$('#error-hme_ins_place').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Insurance In Place </div>');
						_pcount++;
					} else {
						$('#error-hme_ins_place').html('');
					}
					
					if((hme_policy_yrone.val()).length == 0){
						$('#error-hme_policy_yr').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Policy Year / Loss Year </div>');
						_pcount++;
					} else {
						$('#error-hme_policy_yr').html('');
					}
					
					if((hme_ins_claimone.val()).length == 0){
						$('#error-hme_ins_claim').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Insurance Claimed </div>');
						_pcount++;
					} else {
						$('#error-hme_ins_claim').html('');
					}
					
					if((hme_loss_amtone.val()).length == 0){
						$('#error-hme_loss_amt').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Loss Of Amount </div>');
						_pcount++;
					} else {
						$('#error-hme_loss_amt').html('');
					}
					
					if(_pcount > 0){
						return false;
					} else {
						return true;
					}

				} catch(Error){
					console.log("Error Message IN date previousClaimsfactory "+Error.message);
				}
			
     	}

     	factory.validatestruturepee = function(){
     		try{

     			var _dp = $('#hme_itm_des_PEE1');
				var _ma = $('#hme_make_PEE1');
				var _mp = $('#hme_mdl_PEE1');
				
				var _yp = $('#hme_yom_PEE1');
				var _ip = $('#hme_imei_PEE1');
				var _sp = $('#hme_SI_PEE1');
				
				var _scount = 0;
				if((_dp.val()).length == 0){
					$('#error-hme_itm_des_PEE').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Item Description</div>');
					_scount++;
				} else {
					$('#error-hme_itm_des_PEE').html('');
				}
				
				if((_ma.val()).length == 0){
					$('#error-hme_make_PEE').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Portable Electronic Equipment</div>');
					_scount++;
				} else {
					$('#error-hme_make_PEE').html('');
				}
				
				if((_mp.val()).length == 0){
					$('#error-hme_mdl_PEE').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Model</div>');
					_scount++;
				} else {
					$('#error-hme_mdl_PEE').html('');
				}
				
				if((_yp.val()).length == 0){
					$('#error-hme_yom_PEE').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter YOM</div>');
					_scount++;
				} else {
					$('#error-hme_yom_PEE').html('');
				}
				
				if((_ip.val()).length == 0){
					$('#error-hme_imei_PEE').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Serial / IMEI Number</div>');
					_scount++;
				} else {
					$('#error-hme_imei_PEE').html('');
				}
				
				if((_sp.val()).length == 0){
					$('#error-hme_SI_PEE').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Sum Insured</div>');
					_scount++;
				} else {
					$('#error-hme_SI_PEE').html('');
				}
				
				if( _scount > 0 ){
					return false;
				} else {
					return true;
				}

     		} catch(Error){
     			console.log("Error Message IN date validatestruturepee--"+Error.message);
     		}
     	}

     factory.validataionValuables = function(){

     	try{
     		var __desc = $('#hme_itm_des_val1');
			var __weight = $('#hme_weight_val1');
			var __sival = $('#hme_SI_val1');
			var countError=0;
			if((__desc.val()).length == 0){
				$('#error-hme_itm_des_val').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Long Description</div>');
				countError++;
			} else {
				$('#error-hme_itm_des_val').html('');
			}
			if((__weight.val()).length == 0){
				$('#error-hme_weight_val').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Weight in gm</div>');
				countError++;
			} else {
				$('#error-hme_weight_val').html('');
			}
			if((__sival.val()).length == 0){
				$('#error-hme_SI_val').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Sum Insured</div>');
				countError++;
			} else {
				$('#error-hme_SI_val').html('');
			}
			
				if( countError > 0 ){
				return false;
				} else {
				return true;
				}
     	} catch(Error){

     	}
     }

     factory.ctlcheckPolicyStartDate = function(dataIdclick){
		try{
        var dateSelected = $('#'+dataIdclick).val();
        var date = dateSelected.substring(0, 2);
        var month = dateSelected.substring(3, 5);
        var year = dateSelected.substring(6, 10);
        var myDate = new Date(year, month - 1, date);
        var today = new Date();
        var daytoday = today.getDate();
        var daymonth = today.getMonth();
        var dayyear = today.getFullYear();
        var latestDate = new Date(dayyear,daymonth,daytoday);
        
        var __parent = $('#'+dataIdclick).parent('div').find('div');
        if ( +latestDate != +myDate && +latestDate > +myDate) {
            alert('Please Select Policy Starts Date Future!');
            __parent.html('').append('<div ng-message="required" class="required">Please Select Policy Starts Date Future!</div>');
            return false;
        }
        __parent.html('');
        return true;
    } catch(Error){
    	console.log('ctlcheckPolicyStartDate Error log'+Error.message);
    } 
    }
	
	factory.calculateConstructionAge = function(){
		
		var electedYear = $('#hme_year_of_construction').val();
		var toDayDate = new Date();
		var yearThen = parseInt(electedYear);
        var monthThen = parseInt(toDayDate.getMonth()+1);
        var dayThen = parseInt(toDayDate.getDate());
		
		var birthday = new Date(yearThen, monthThen-1, dayThen);
		
        var today = new Date();
		
		var differenceInMilisecond = today.valueOf() - birthday.valueOf();
		
		var years = Math.floor(differenceInMilisecond / 31536000000);
		
		if( years > 25 ) {
         alert('Construction Age more than 25 years not allowed');
         $(this).val('');
         $(this).focus();
		 return false;
      } else {
		  return true;
	  }
		
   
	}
	
	factory.emiPaymentcheckdis = function( valuepayment ){
		if(valuepayment == 'Credit Card'){
			return  true;
		}
		return false;
	}
	
	factory.getPicodeDatainfo = function(pincodeValue){
	
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
		   $('#lms_car_city').val(pinData.cus_cityName);
		   $('#lms_car_state').val(pinData.cus_stateName);
		   //angular.element(document.getElementById('lms_car_city')).val(pinData.cus_cityName);
          // angular.element(document.getElementById('lms_car_state')).val(pinData.cus_stateName);
	   },function(erroeResponce){
		   console.info("getPicodeDatainfo having error please try:"+erroeResponce.message);
	   });

	} catch(Error){
	}
}

	return factory;

}]);