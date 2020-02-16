_lmsapp.factory('checkDuplicater',function($http,$scope){
	var service = {};
	service.checkDuplicateFunc = function(idName,productName){
		let findMobileNumber = $('#'+idName).val();
		let mobileObject = new Object();
		mobileObject.number = findMobileNumber;
		mobileObject.productname = productName;
		if(findMobileNumber.length == 10){
			$http({
				url:__pathname+'checker-dupliate',
				method : 'POST',
				cache : false,
				dataType : 'json',
				data : $.param( mobileObject ),
				headers : {"Content-Type": 'application/x-www-form-urlencoded'}
			}).then(function(responceData){
				console.log(responceData);
			});
		}
	}
	return service;
});