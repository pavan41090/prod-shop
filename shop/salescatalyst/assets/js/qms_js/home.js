    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        
        $scope.Home_plans = '0';
        quoteHome.setAttribute( "autocomplete", "off" );
        $scope.home_plans='0';
        
        var web_url = $('#web_url').val();
        $scope.pset = function(){
        // alert("anchor");      
        if ($scope.quoteHome.$valid) {
             
                $("#load_model").click();

                var home_first_name = $scope.home_first_name;
                var home_last_name = $scope.home_last_name;
                var home_dob = $scope.home_dob; 
                var home_state = $scope.home_state;
                var home_city = $scope.home_city;
                var home_plans = $scope.home_plans;
                var home_policy_start = $scope.home_policy_start;
                var home_policy_end =$('#home_policy_end').val();
                var home_mobile = $scope.home_mobile;
                var home_email = $scope.home_email;
                     
               
                var paramsArray  = {"home_first_name": home_first_name,
                                    "home_last_name": home_last_name,
                                    "home_dob": home_dob,
                                    "home_state": home_state,
                                    "home_city": home_city,
                                    "home_plans":home_plans,
                                    "home_policy_start":home_policy_start,
                                    "home_policy_end":home_policy_end,
                                    "home_mobile": home_mobile,
                                    "home_email": home_email,
                                    
                                   
                    }


                    var url = web_url+"Quotehome/qmsCalculatePremiumHome/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                    if(response.data == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-home-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        
                        $("#closeModel").click();
                        alert('Some thing went wrong, Please try again. ')
                    }    
                });
            }
        }; //if ($scope.quoteHome.$valid) ends here 


        

    });
    
    