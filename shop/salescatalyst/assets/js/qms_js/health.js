    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
        //$scope.includespouse = '0';
        //$scope.includechildren = '0'; 
        //$scope.policytypehealth = '0';
        $scope.health_include_children = '0';
        var health_spouse_dob_check = '0';

     quoteHealth.setAttribute( "autocomplete", "off" );

        $scope.pset = function(){

            var web_url = $('#web_url').val();
            if ($scope.quoteHealth.$valid) {

                $("#load_model").click();
              
               
               

                if ($('#health_spouse_dob_check').is(":checked")) {   
                    var health_spouse_dob_check = '1';
                    var health_spouse_dob_value = $scope.health_spouse_dob_value;                  
                }
                             
                var health_first_name =$scope.health_first_name;
                var health_last_name = $scope.health_last_name;
                var health_dob = $scope.health_dob;
                var health_state = $scope.health_state; 
                var health_city = $scope.health_city;
                var health_zip = $scope.health_zip;

                var health_gender = $scope.health_gender;
                var health_email = $scope.health_email;
                var health_mobile = $scope.health_mobile;
                var health_occupation = $scope.health_occupation;

                var health_include_children = $scope.health_include_children;
               
               
             
                             var paramsArray  = {
                                   
                    
                                    "health_first_name": health_first_name,
                                    "health_last_name": health_last_name,
                                    "health_dob": health_dob,
                                    "health_state": health_state,
                                    "health_city": health_city,
                                    "health_gender": health_gender,
                                    "health_zip": health_zip,
                                    "health_email": health_email,
                                    "health_mobile": health_mobile,
                                    "health_occupation": health_occupation,
                                    "health_spouse_dob_check" : health_spouse_dob_check,
                                    "health_spouse_dob_value": health_spouse_dob_value,
                                    "health_include_children": health_include_children,
                                    
                                
                    }
                    
                    var url = web_url+"Quotehealth/qmsCalculatePremiumHealth/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   // console.log(response.data);
                    if(response.data == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-health-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

           }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });
