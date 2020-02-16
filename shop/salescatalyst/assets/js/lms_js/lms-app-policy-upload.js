_lmsapp = angular.module('plunker', []);
console.log(__pathname);
_lmsapp.directive('policyUploadDoc',function(){
	return {
		restrict : 'AE',
		controller : 'policyUploadCtrl',
		link : function(scope,element,attr){
			element.on('submit',function(){
			let _parent = $(this);
			scope.submitPolicyUploader( _parent );
			});
	  }
	}
});
_lmsapp.controller('policyUploadCtrl',function($http,$scope){
	let __parentUplaoder = $('#processing-bar-limit');
	$scope.fileCountInsert = function(resCount,upload_path,startCount){
		$scope.cmdInserting(resCount,upload_path,startCount);
	}

	$scope.cmdInserting = function(resCount,upload_path,startCount){
		try{
			console.log(upload_path);
			let startObj = new Object();
			startObj.startCount = startCount;
			startObj.uploadpath = upload_path;
			startObj.resCount = resCount;
			$http({
            	url : __pathname+'policy-doc-data',
				method : 'POST',
				cache : false,
				data : $.param( startObj ),
				dataType : 'json',
                processData: false,
				headers: {
						"Content-Type": 'application/x-www-form-urlencoded'
				}
            }).then(function(responceData){
            	var __xesData = Object(responceData);
            	let _xesCalCount = __xesData.data;
            	let _nextmber = _xesCalCount.nextNumber;
            	let _totalCount = _xesCalCount.totalCount;
            	if(_xesCalCount.nextStatus){
	            	$scope.fileCountInsert(_xesCalCount.nextNumber,upload_path,startCount);
	            	__parentUplaoder.html('').append('<p><progress style="width: 100%;" value="'+_nextmber+'" max="'+_totalCount+'"></progress></p>');
            	} else {
            		__parentUplaoder.html('').append('<p>Completed!<progress style="width: 100%;" value="'+_nextmber+'" max="'+_totalCount+'"></progress></p>');
            	}
            },function(Error){
            	console.log("Something went wrong!"+Error.message);
            });
			} catch(Error){
				console.log("Something went wrong!"+Error.message);
			}

	}

	$scope.submitPolicyUploader = function(_thisPolicy){
			try{
			
			var fileInput = _thisPolicy.find('#uploadPolicyDoc')[0];
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('uploadPolicyDoc', file);
            __parentUplaoder.html('Please wait Uploading is in process');

            $http({
            	url : __pathname+'policy-upload-doc',
				method : 'POST',
				cache : false,
				data : formData,
				dataType : 'json',
                processData: false,
				headers: {
						"Content-Type": undefined
				}
            }).then(function(responceData){
            	var __resData = Object(responceData);
            	let _resCalCount = __resData.data;
            	let _startCount = 1;
            	if(_resCalCount.status){
            		$scope.fileCountInsert(_startCount,_resCalCount.upload_path,_resCalCount.cellrows);
            	}
            	__parentUplaoder.html('').append('<p><progress style="width: 100%;" value="50" max="100"></progress></p>');
            },function(Error){
            	console.log("Something went wrong!"+Error.message);
            });
			} catch(Error){
				console.log("Something went wrong!"+Error.message);
			}

		return false;
	}

});