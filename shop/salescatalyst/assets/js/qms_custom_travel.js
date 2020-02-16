	var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        
        $scope.policyType = '0';
        $scope.Type_of_Trip = '0'; 
        $scope.covertype = '0';
		$scope.maxpertrip='0';
		
        $scope.pset = function(){
          // alert('inside sscope');
           
            if ($scope.quoteTravel.$valid) {

               // $("#load_model").click();

                var policyType = $scope.policyType;
				var TypeofTrip =$scope.typeoftrip;
				var departdate =$scope.departdate;
				var returndate =$scope.returndate;
				var tripduration = $('#tripduration').val();
				var covertype =$scope.covertype;
				var maxpertrip =$scope.maxpertrip;
				var traveltype =$scope.traveltype;
				var geographical =$scope.geographical;
				var relationship =$scope.relationship;
				var datebirth =$scope.datebirth;
				var age =$('#age').val();
			    var nametravel =$scope.nametravel;
                var emailtravel =$scope.emailtravel;
				var mobiletravel =$scope.mobiletravel;

                var relationship1 =$scope.relationship_1;
                var datebirth1 =$scope.datebirth_1;
                var age1 =$('#age_1').val();
            
                var relationship2 =$scope.relationship_2;
                var datebirth2 =$scope.datebirth_2;
                var age1 =$('#age_2').val();
                var relationship3 =$scope.relationship_3;
                var datebirth3 =$scope.datebirth_3;
                var age1 =$('#age_3').val();


				var paramsArray  = {"policyType": policyType,
                                    "TypeofTrip": TypeofTrip,
                                    "departdate": departdate,
                                    "returndate": returndate,
                                    "tripduration": tripduration,
                                    "covertype": covertype,
                                    "maxpertrip": maxpertrip,
                                    "traveltype": traveltype,
                                    "geographical": geographical,
                                    "relationship": relationship,
                                    "datebirth": datebirth,
                                    "age": age,
                                    "nametravel":nametravel,
									"emailtravel": emailtravel,
									"mobiletravel": mobiletravel,
                                    
                                    "relationship1": relationship1,
                                    "datebirth1": datebirth1,
                                    "age1": age1,                                    
                                    "relationship2": relationship2,
                                    "datebirth2": datebirth2,
                                    "age2": age2,                                    
                                    "relationship3": relationship3,
                                    "datebirth3": datebirth3,
                                    "age3": age3,                                    

                    }

           

                    var url = "http://localhost/bhartiAXA-NEW/quoteTravel/qmsCalculatePremiumTravel/";

                    $http.get(url,{params:paramsArray}).then( function(response) {
                   // alert('got');    
                    var redirectUrl = 'http://localhost/bhartiAXA-NEW/qms-travel-premium/'
                    //window.location.href = redirectUrl;
                    });

            }       
        };


 

    });
	
	