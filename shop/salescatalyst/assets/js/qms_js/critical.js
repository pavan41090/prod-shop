    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
       
        $scope.critical_include_child = '0';
        quotecritical.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){

            var web_url = $('#web_url').val();
            if ($scope.quotecritical.$valid) {

                $("#load_model").click();
                var critical_spouse = '0';
                var critical_spouse_dob = '';
                if ($('#critical_spouse').is(":checked")) {   
                  critical_spouse = '1';
                  var critical_spouse_dob = $scope.critical_spouse_dob;
                }
                             
                               
                var critical_first_name = $scope.critical_first_name;
                var critical_last_name = $scope.critical_last_name;
                var critical_dob = $scope.critical_dob; 
                var critical_state = $scope.critical_state;                           
                var critical_zip = $scope.critical_zip;
                var critical_city = $scope.critical_city;
                var critical_email = $scope.critical_email;
                var critical_mobile = $scope.critical_mobile;
                var critical_occupation = $scope.critical_occupation;
                var critical_include_child = $scope.critical_include_child;
                    var paramsArray  = {
                        "critical_first_name": critical_first_name,
                        "critical_last_name": critical_last_name,
                        "critical_dob": critical_dob,
                        "critical_state": critical_state,
                        "critical_city":critical_city,
                        "critical_zip": critical_zip,
                        "critical_email":critical_email,
                        "critical_mobile":critical_mobile,
                        "critical_occupation": critical_occupation,
                        "critical_spouse": critical_spouse,
                        "critical_spouse_dob": critical_spouse_dob,
                        "critical_include_child": critical_include_child,
                    }
                
                    var url = web_url+"QuoteCritical/qmsCalculatePremiumCritical/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   // console.log(response.data);
                    if(response.data == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-critical-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

           }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });
