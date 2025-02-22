_lmsshopapp.directive('checkNomineeDob',function(){
return{
	restrict : 'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		scope.autoloadFunction();
		element.on('change',function(){
			let dateOfBirthNominee = $(this).val();
			scope.nomineeagefuction(dateOfBirthNominee);
		});
	}
}
});
_lmsshopapp.directive('generalInsuranceDeclaration',function(){
return{
	restrict:'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		element.on('click',function(){
			scope.termsconditionsclick();
		});
	}
}
});
_lmsshopapp.directive('privacyPolicy',function(){
return{
	restrict:'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		element.on('click',function(){
			scope.termsconditionsclickpp();
		});
	}
}
});
_lmsshopapp.directive('termsAndCondition',function(){
return{
	restrict:'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		element.on('click',function(){
			scope.termsconditionsclicktac();
		});
	}
}
});

_lmsshopapp.directive('paymentCondition',function(){
return{
	restrict:'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		element.on('click',function(){
			scope.termsconditionsclickpayment();
		});
	}
}
});

_lmsshopapp.directive('shopCusData',function(){
return{
	restrict : 'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		scope.autoloadFunction();
		element.on('submit',function(){
			let _parentClick = $(this);
			scope.createLeadShop(_parentClick);
		})
	}
}
});
_lmsshopapp.directive('shopSendOtp',function(){
return{
	restrict : 'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		scope.autoloadFunction();
		element.on('submit',function(){
			let _parentClick = $(this);
			scope.customerotpMessage(_parentClick);
		})
	}
}
});
_lmsshopapp.directive('checkSameRisk',function(){
return{
	restrict : 'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){

		element.on('click',function(){
			if($(this).is(':checked')){
				$('#riskaddress').val( $('#communicationaddress').val() );
				$('#riskCity').val( $('#CommunicationCity').val() );
				$('#riskState').val( $('#CommunicationState').val() );
				$('#riskPincode').val( $('#CommunicationPincode').val() );
			} else {
				$('#riskaddress').val( '' );
				$('#riskCity').val( '' );
				$('#riskState').val( '' );
				$('#riskPincode').val( '' );
			}
		});
	}
}
});
_lmsshopapp.directive('shopSubmitOtp',function(){
return{
	restrict : 'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		element.on('submit',function(){
			let _parentOtp = $(this);
			scope.submitOtpMessage(_parentOtp);
		});
	}
}
});
_lmsshopapp.directive('checkOwnerDob',function(){
return{
	restrict : 'AE',
	controller : 'myShopCtrl',
	link : function(scope,element,attr){
		scope.autoloadFunction();
		element.on('change',function(){
			let dateOfBirthOwner = $(this).val();
			if(dateOfBirthOwner.length > 0){
				scope.owneragefunction(dateOfBirthOwner);
			}
		})
	}
}
});
_lmsshopapp.directive('pincodeValidation',function(){
	return {
		restrict : 'AE',
		controller : 'myShopCtrl',
		link : function(scope,element,attr){
			element.on('keyup',function(){
				let _parentthis = $(this);
				let PHONE_REGEXP = /^\d{0,9}(\.\d{1,9})?$/;
				let pincodeValuein = _parentthis.val();
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
});
_lmsshopapp.directive('numbericValidation',function(){
	return {
		restrict : 'AE',
		controller : 'myShopCtrl',
		link : function(scope,element,attr){
			element.on('keyup',function(){
				let _parentthis = $(this);
				let PHONE_REGEXP = /^[0-9]*$/;
				let pincodeValuein = _parentthis.val();
				var isMatchRegex = PHONE_REGEXP.test( pincodeValuein );
				if(isMatchRegex == false){
					_parentthis.val('');
				}
			});
		}
	}
});

_lmsshopapp.directive('repincodeValidation',function(){
	return {
		restrict : 'AE',
		controller : 'myShopCtrl',
		link : function(scope,element,attr){
			element.on('keyup',function(){
				let _parentthis = $(this);
				let PHONE_REGEXP = /^\d{0,9}(\.\d{1,9})?$/;
				let pincodeValuein = _parentthis.val();
				var isMatchRegex = PHONE_REGEXP.test( pincodeValuein );
				if(isMatchRegex == false){
					_parentthis.val('');
				}
				if(isMatchRegex == true && pincodeValuein.length > 5){
					scope.regetPicodeDatainfo( pincodeValuein );
				}
			});
		}
	}
});
_lmsshopapp.controller('myShopCtrl',function($scope,$http,$compile){

$scope.termsValueccheck = false;
$scope.termsValueccheckpp = false;
$scope.termsValuecchecktac = false;
$scope.termsValueccheckpayment = false;

$scope.autoloadFunction = function(){
	$scope.sentMessageStatus = false;
	$scope.pleasewaitbutton = false;
	$scope.submitbutton = true;
	$scope.otpPleasewait = false;
	$scope.otpsubmitform = true;
	$scope.otpmessagebody = false;
}

$scope.termsconditionsclick = function(){
	$scope.termsValueccheck = true;
}

$scope.termsconditionsclickpp = function(){
	$scope.termsValueccheckpp = true;
}

$scope.termsconditionsclicktac = function(){
	$scope.termsValuecchecktac = true;
}

$scope.termsconditionsclickpayment = function(){
	$scope.termsValueccheckpayment = true;
}

$scope.nomineeagefuction = function(dateOfBirthNominee){
	let nomineedob = $scope.checkDateReturnYear(dateOfBirthNominee);
				if(nomineedob < 18 || nomineedob > 110){
				$scope.sentMessageStatus = false;
				return false
				} else {
				$scope.sentMessageStatus = true;
				}
}

$scope.owneragefunction = function(dateOfBirthOwner){
		let owneredob = $scope.checkDateReturnYear(dateOfBirthOwner);
				if(owneredob < 18 || owneredob > 60){
				$scope.sentMessageStatus = false;
				return false
				} else {
				$scope.sentMessageStatus = true;
				}
}

$scope.checkDateReturnYear = function(dateofbirth){
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
				return years;
			} catch(Error){
				console.error(Error);
				console.log("Error Message IN date calculateSpouseAge"+Error.message);
			}
}

$scope.createLeadShop = function(thisData){

	try{
		let formShopData = new FormData();
		let formDatathis = thisData.serializeArray();
		let lsmShopValidation = $scope.shopCusData.$valid;

		let nomineedobvalue = $('#nomineedob').val();
		let ownerdobvalue = $('#ownerdob').val();
		let nomineedob = $scope.checkDateReturnYear(nomineedobvalue);
		let owneredob = $scope.checkDateReturnYear(ownerdobvalue);
		if(nomineedob < 18 || nomineedob > 110){
			alert('Please select nominee age between 18 - 110 years');
			return false
		}

		if(owneredob < 18 || owneredob > 60){
			alert('This plan is available for age 18 to 60');
			return false
		}
		if(lsmShopValidation == false){
			return false;
		}
			$scope.pleasewaitbutton = true;
			$scope.submitbutton = false;
					$http({
						url : _pathurl+'shop',
						method : 'POST',
						cache : false,
						dataType : 'json',
						data : $.param( formDatathis ),
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
							}
					}).then(function(responceData){
						let checkRes = Object(responceData);
						let resData = checkRes.data;
						if(resData.status == true && resData.errorStatus == false){
							alert("Lead Successfully created and link has been sent to customer mobile and email");
							$('#shopCusData :input').attr('disabled', true);
							$('.submitC').find('input').attr('value','Completed');
						}
					},function(erroeResponce){
						console.info("submitfinalLead having error please try:"+Error.message);
					});
	} catch(error){
		console.log(error);
		console.log("Error Message IN date createLeadShop " + Error.message);
	}
}

$scope.customerotpMessage = function(otpMessage){
		
	try{

		let formShopData = new FormData();
		let formDatathis = otpMessage.serializeArray();
		let lsmShopValidation = $scope.shopsendOTP.$valid;
		if(lsmShopValidation == false){
			return false;
		}
		if(lsmShopValidation == true){
		if($scope.termsValueccheck == false || $scope.termsValueccheckpp == false || $scope.termsValuecchecktac == false || $scope.termsValueccheckpayment == false){
		alert('Please click and read General Insurance declaration, Privacy Policy, Terms & conditions & Payment authorization to proceed further');
		return false;
		}
		}
			$scope.otpPleasewait = true;
			$scope.otpsubmitform = false;

			$('#shopsendOTP :input').attr('disabled',true);
					$http({
						url : _pathurl+'otp-message',
						method : 'POST',
						cache : false,
						dataType : 'json',
						data : $.param( formDatathis ),
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
							}
					}).then(function(responceData){
						let checkOTPstat = Object(responceData);
						let datacheckOTPstat = checkOTPstat.data;
						if(datacheckOTPstat.status){
							alert(datacheckOTPstat.message);
							$scope.otpmessagebody = true;
							location.reload();
						} else {
							alert(datacheckOTPstat.message);
						}
					},function(erroeResponce){
						console.info("submitfinalLead having error please try:"+Error.message);
					});
} catch(error){
		console.log(error);
		console.log("Error Message IN date createLeadShop " + Error.message);
}
}

$scope.submitOtpMessage = function(messageOtp){

	try{
		let formShopData = new FormData();
		let formDatathis = messageOtp.serializeArray();
		let lsmShopValidation = $scope.shopsubmitOTP.$valid;
		if(lsmShopValidation == false){
			return false;
		}
					$('#submitOtpData').attr('value','Please Wait..');
					$('#submitOtpData').attr('disabled',true);
					$http({
						url : _pathurl+'submit-otp',
						method : 'POST',
						cache : false,
						dataType : 'json',
						data : $.param( formDatathis ),
						headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
							}
					}).then(function(responceData){
						let otpMessageStatsus = Object(responceData);
						let _otpInfo = otpMessageStatsus.data;
						if(_otpInfo.status == true){
							$('#shopsubmitOTP :input').attr('disabled',true);
							$('#error-otp-message').html('');
							$('#submitOtpData').hide();
							$('#otpnumber').hide();
							$('.otpdetails').hide();
							$('#submitOtpData').attr('value','Thanks!');;
							$('#success-otp-message').html('').append('<p>'+_otpInfo.message+'</p>');
						} else {
							$('#submitOtpData').attr('value','Submit OTP');
					        $('#submitOtpData').attr('disabled',false);
							$('#error-otp-message').html('').append(_otpInfo.message);
						}
					},function(erroeResponce){
						console.info("submitfinalLead having error please try:"+Error.message);
					});
	} catch(error){
		console.log("Error Message IN date createLeadShop " + Error.message);
	}
}

$scope.getPicodeDatainfo = function(pincodeValue){
	
	try{
       let picodeObject = new Object();
	   picodeObject.cus_pincode = pincodeValue;
	   $http({
		   url : _pathurl+'pincode-master',
		   method : 'POST',
		   cache : false,
		   dataType:'json',
           data : $.param( picodeObject ),
		   headers: {
			   "Content-Type": 'application/x-www-form-urlencoded'
			   }
	   }).then(function(responcePincode){
		   let pinres = Object(responcePincode);
		   let pinData = pinres.data;
		   $('input#CommunicationState').val(pinData.cus_stateName);
		   $('input#CommunicationState').change();
		   $('input#CommunicationState').blur();
		   $('input#CommunicationState').click();
		   $scope.getcityNameState( pinData.cus_stateName );
		 
	   },function(erroeResponce){
		   console.info("getPicodeDatainfo having error please try:"+erroeResponce.message);
	   });

	} catch(Error){
	}
}

$scope.regetPicodeDatainfo = function(pincodeValue){
	
	try{
       let picodeObject = new Object();
	   picodeObject.cus_pincode = pincodeValue;
	   $http({
		   url : _pathurl+'pincode-master',
		   method : 'POST',
		   cache : false,
		   dataType:'json',
           data : $.param( picodeObject ),
		   headers: {
			   "Content-Type": 'application/x-www-form-urlencoded'
			   }
	   }).then(function(responcePincode){
		   let pinres = Object(responcePincode);
		   let pinData = pinres.data;
		   $('input#riskState').val(pinData.cus_stateName);
		   $('input#riskState').change();
		   $('input#riskState').blur();
		   $('input#riskState').click();
		   $scope.regetcityNameState( pinData.cus_stateName );
		 
	   },function(erroeResponce){
		   console.info("getPicodeDatainfo having error please try:"+erroeResponce.message);
	   });

	} catch(Error){
	}
}

$scope.regetcityNameState = function(pincodeValue){
	
	try{

       let picodeObject = new Object();
	   picodeObject.stateName = pincodeValue;
	   $http({
		   url : _pathurl+'city-master',
		   method : 'POST',
		   cache : false,
		   dataType:'json',
           data : $.param( picodeObject ),
		   headers: {
			   "Content-Type": 'application/x-www-form-urlencoded'
		}

	   }).then(function(responcePincode){

		   let cityres = Object(responcePincode);
		   let datacityres = cityres.data;
		   let citieslist = datacityres.cities;
		   let htmlcitiesnames = '';
		   for(var k=0;k<citieslist.length;k++){
		   	htmlcitiesnames += '<option value="'+citieslist[k].cname+'">';
		   }

		   $('#recitiesbrowse').html('').append( htmlcitiesnames );
		 
	   },function(erroeResponce){
		   console.info("getcityNameState having error please try:"+erroeResponce.message);
	   });

	} catch(Error){
	}
}

$scope.getcityNameState = function(pincodeValue){
	
	try{

       let picodeObject = new Object();
	   picodeObject.stateName = pincodeValue;
	   $http({
		   url : _pathurl+'city-master',
		   method : 'POST',
		   cache : false,
		   dataType:'json',
           data : $.param( picodeObject ),
		   headers: {
			   "Content-Type": 'application/x-www-form-urlencoded'
		}

	   }).then(function(responcePincode){

		   let cityres = Object(responcePincode);
		   let datacityres = cityres.data;
		   let citieslist = datacityres.cities;
		   let htmlcitiesnames = '';
		   for(var k=0;k<citieslist.length;k++){
		   	htmlcitiesnames += '<option value="'+citieslist[k].cname+'">';
		   }

		   $('#citiesbrowse').html('').append( htmlcitiesnames );
		 
	   },function(erroeResponce){
		   console.info("getcityNameState having error please try:"+erroeResponce.message);
	   });

	} catch(Error){
	}
}

});
