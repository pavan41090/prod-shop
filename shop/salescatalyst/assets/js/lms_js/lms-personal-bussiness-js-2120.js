document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-common-controller-js.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-state-city-controller.js"></script>');
document.writeln('<script src="'+__pathname+'assets/js/lms_js/lms-app-duplicate-check-app.js.js"></script>');
var leaderImage = '<img src="'+__pathname+'assets/images/ajax-loader.gif" style="margin: 10PX;padding: 0px;width: 25px;height: 25px;">';
_lmsapp.directive('getLoanPremium',function(){

	return {
		restrict : 'AE',
		link : function(scope,element,attr){
			element.on('keyup change',function(){
				scope.elementgetHtmlData();
			});
		}
	}

});

_lmsapp.directive('customerDob',function(){

	return {
		restrict : 'AE',
		link : function(scope,element,attr){
			element.on('change',function(){
				scope.calculateagedob();
			});
		}
	}

});

_lmsapp.directive('uppLongTermPolicy',function(){

return {
	restrict : 'AE',
	link : function(scope,element,attr){

		scope.autoloaderData();
		element.on('submit',function(){
			scope.submitPolicydata();
			return false;
		});
	
	},
	controller:function($scope,$http){
		$scope.autoloaderData = function(){
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

		$scope.calculateagedob = function(){
				var electedYear = $('#lms_car_dob').val();

				var date2String = electedYear;
				var selectedDate = date2String.toString();
				var splitdate = selectedDate.split('-');
				var yearThen = parseInt(splitdate[2]);
		        var monthThen = parseInt(splitdate[1]);
		        var dayThen = parseInt(splitdate[0]);
				var birthday = new Date(yearThen, monthThen-1, dayThen);
		        var today = new Date();
				var differenceInMilisecond = today.valueOf() - birthday.valueOf();
				var years = Math.floor(differenceInMilisecond / (365.25 * 24 * 60 * 60 * 1000));

				if(electedYear.length > 0){

				if( years <= 60 ) {
				$('#error-age-message').html('');
				$scope.lms_upp_age = years;
				$('#lms_upp_age').val(years);
				return true;
				} else if( years > 0 ) {
				$('#error-age-message').html('').append('Outside Max Age is 0-60 years');
				return false;
				} else {
				$('#error-age-message').html('').append('Outside Max Age of 60 years');
				return false;
				}

				}
				 
		}

		$scope.getLoanamount = function(){
			var getLoanAmountvalue = $scope.getLoanAmountvalue();
			if(getLoanAmountvalue == true){
				$scope.calculatePremiumData();
			}
		}

		$scope.elementgetHtmlData = function(){
			$scope.calculatePremiumData();
		}

		$scope.submitPolicydata = function(){

			var calculateagedob = $scope.calculateagedob();

			if(calculateagedob == false){
				return false;
			}
			var lsmhomevalidation = $scope.lmsCar.$valid;
			if(lsmhomevalidation == false){
				return false;
			}

			$http({
				url : __pathname+'get-insert-upp',
				method : 'POST',
				cache : false,
				data : $.param( $('#lmsUppData').serializeArray() ),
				dataType : 'json',
				async : true,
				headers: {
						"Content-Type": 'application/x-www-form-urlencoded'
				}

			}).then(function(responceData){

				var _statusreport = Object(responceData);
				if(_statusreport.data.status == true){
					alert('Succesfully posted values, Lead Number is'+_statusreport.data.applicationNumber);
					location.reload();
				}

			},function(errorMessage){

			});

			return false;
		}

		$scope.calculatePremiumData = function(){

			var loanamountObj = new Object();
			loanamountObj.amount = $('#lms_upp_loan_amount').val();;
			loanamountObj.age = 30;
			loanamountObj.tenure = $('#lms_upp_tenure').val();;
			loanamountObj.loantype = $('#lms_upp_type_loan').val();

			$http({
				url : __pathname+'lms-cal-loan-amount',
				method : 'POST',
				cache : false,
				data : $.param( loanamountObj ),
				dataType : 'json',
				async : true,
				headers: {
						"Content-Type": 'application/x-www-form-urlencoded'
				}

			}).then(function(responceData){

				var responceDat = new Object(responceData);
				$('#htmlAppendData').html('').append(responceDat.data.htmldata);

			},function(errorMessage){

			});
		}

		$scope.getLoanAmountvalue = function(){

			var loanAmountreturn = $('#lms_upp_loan_amount').val();
			var loanplantype = $('#lms_upp_type_loan').val();
			
			if(loanplantype == 0){
				$('#error-loan-Amount').html('').append('Please Select Type Of Loan!');
				return false;
			}

			if(loanplantype == 1 && loanplantype != 0){
				if(loanAmountreturn > 1000000){
					$('#error-loan-Amount').html('').append('Outside Max limit of 10 Lakh');
					return false;
				} else {
					$('#error-loan-Amount').html('');
					return true;
				}
			}

			if(loanplantype == 2 && loanplantype != 0){
				if(loanAmountreturn > 1500000){
					$('#error-loan-Amount').html('').append('Outside Max limit of 15 Lakh');
					return false;
				} else {
					$('#error-loan-Amount').html('');
					return true;
				}
			}

		}
	}
}
});
_lmsapp.directive('uppLoanAmount',function(){
	return {
		restrict : 'AE',
		link : function(scope,element,attr){
			element.on('keyup',function(){
				scope.getLoanamount();
			});
		}
	}
})
