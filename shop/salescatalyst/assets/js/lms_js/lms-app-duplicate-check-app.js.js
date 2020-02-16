_lmsapp.directive('mobileNumberDuplicate',['LmsValidataionservice',function(LmsValidataionservice){
return {
	restrict : 'AE',
	link : function(scope,element,attr){
		element.on('keyup',function(){
			var _pypValue = $(this);
			scope.getonChangeevent(_pypValue);
		});
	},
	controller : function($scope,$http){

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
		$scope.getonChangeevent = function(_pypValue){
			var mobileDuRes = $scope.checkDuplicateFunc(_pypValue,_pypValue.val(),$('#lms_car_line_of_business').val(),$('#productlead_id').val());
		}
	}
}
}]);