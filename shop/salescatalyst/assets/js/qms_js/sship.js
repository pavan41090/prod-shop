    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
        
        $scope.sship_include_child = '0'
        $scope.policytypesship = '0';        
      
        var spousedobship = '';
        quotesship.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){

            var web_url = $('#web_url').val();

           
            var sship_include_spouse = '0';
            var sship_spouse_value = '';
            if ($('#critical_spouse').is(":checked")) {   
                var sship_include_spouse = '1';
                var sship_spouse_dob = $scope.sship_spouse_value;
            }


            if ($scope.quotesship.$valid) {

                $("#load_model").click();

                var sship_first_name = $scope.sship_first_name;
                var sship_last_name =$scope.sship_last_name;
                var sship_dob =$scope.sship_dob;
                var sship_state =$scope.sship_state;
                var sship_city =$scope.sship_city
                var sship_income =$scope.sship_income;
                var sship_policy_term =$scope.sship_policy_term;
                var sship_email =$scope.sship_email; 
                var sship_mobile =$scope.sship_mobile;
                var sship_include_child = $scope.sship_include_child;
                var sship_zip = $scope.sship_zip;
               
                
                var paramsArray  = {"sship_first_name": sship_first_name,
                                    "sship_last_name": sship_last_name,
                                    "sship_dob": sship_dob,
                                    "sship_state": sship_state,
                                    "sship_city": sship_city,
                                    "sship_income": sship_income,
                                    "sship_policy_term": sship_policy_term,
                                    "sship_email": sship_email,
                                    "sship_mobile" : sship_mobile,
                                    "sship_include_spouse": sship_include_spouse,
                                    "sship_spouse_dob": sship_spouse_dob,
                                    "sship_include_child":sship_include_child,
                                    "sship_zip": sship_zip,
                                
                    }

                    var url = web_url+"Quotesship/qmsCalculatePremiumSship/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   // console.log(response.data);
                    if(response.data == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-super-ship-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

          }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });


  