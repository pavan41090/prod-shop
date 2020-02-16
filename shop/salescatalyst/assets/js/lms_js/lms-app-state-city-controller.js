_lmsapp.directive('getStateCity',function(){
return{
	restrict : 'AE',
	controller : 'MyController',
	link : function(scope,element,attr){
		element.on('change',function(){
			var _parentMy = $(this);
			scope.myStatefunction(_parentMy);
		});
	},
	controller : function($scope,$http){
		$scope.myStatefunction = function(_parentMy){
			try{
				var pincodeObj = new Object();
				pincodeObj.cus_pincode = _parentMy.val();
				$http({
					url : __pathname+'Commoncontrol/getCityByPincode',
					method : 'POST',
					cache : false,
					dataType : 'json',
					data : $.param( pincodeObj ),
					headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
						}
				}).then(function(responceMessage){
					var responcePin = Object(responceMessage);
					var pinData = responcePin.data;
					$('#lms_car_city').val(pinData.cus_cityName),
                    $('#lms_car_state').val(pinData.cus_stateName)
				},function(errorMessage){
					console.log('Something went wrong!'+error.message);
				})
			} catch(error){
				console.log('Something went wrong!'+error.message);
			}
		}
	}
}
});
_lmsapp.directive('getCityState',function(){

	return {
		restrict : 'AE',
		controller : 'myStateCtrl',
		link : function(scope,element,attr){
			element.on('change',function(){
				var _parentMy = $(this);
				scope.myChangeStateCity(_parentMy);
			})
		},
		controller : function($scope,$http){
			$scope.myStatefunction = function(_parentMy){
			try{
				var pincodeObj = new Object();
				pincodeObj.state_id = _parentMy.val();
				$http({
					url : __pathname+'Commoncontrol/getCityByStateID',
					method : 'POST',
					cache : false,
					dataType : 'json',
					data : $.param( pincodeObj ),
					headers: {
								"Content-Type": 'application/x-www-form-urlencoded'
						}
				}).then(function(responceMessage){
					var responcePin = Object(responceMessage);
					var pinData = responcePin.data;
					console.log(pinData);
					//$('#lms_car_city').val(pinData.cus_cityName),
                    //$('#lms_car_state').val(pinData.cus_stateName)
				},function(errorMessage){
					console.log('Something went wrong!'+error.message);
				})
			} catch(error){
				console.log('Something went wrong!'+error.message);
			}
		}
		}
	}

});