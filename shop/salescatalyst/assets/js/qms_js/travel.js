	var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
        $scope.travel_policy_type = '0';
        $scope.travel_type_trip = '0'; 
        $scope.travel_cover_type = '0';
        $scope.travel_max_trip='thirtydays';
      

        quoteTravel.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){

                    var web_url = $('#web_url').val();
                   // alert(web_url);

            if ($scope.quoteTravel.$valid) {

                  $("#load_model").click();

                var travel_first_name = $scope.travel_first_name;
                var travel_last_name =$scope.travel_last_name;
                var travel_state =$scope.travel_state;
                var travel_city =$scope.travel_city;
                var travel_policy_type =$scope.travel_policy_type;
                var travel_type_trip =$scope.travel_type_trip;
                var travel_cover_type =$scope.travel_cover_type;
                var travel_depart_date =$scope.travel_depart_date;
                var travel_return_date =$scope.travel_return_date;
                var travel_trip_duration =$('#travel_trip_duration').val();
                var travel_type =$scope.travel_type;
                var travel_geographical =$scope.geographical;
                var travel_max_trip =$scope.travel_max_trip;
                var travel_relationship =$scope.travel_relationship;
                var travel_date_birth =$scope.travel_date_birth;
                var travel_age = $('#travel_age').val();
                var travel_relationship_1 =$scope.travel_relationship_1;
                var travel_dob_1 =$scope.travel_dob_1;
                var travel_age_1 =$('#travel_age_1').val();
                var travel_relationship_2 =$scope.travel_relationship_2;
                var travel_dob_2 =$scope.travel_dob_2;
                var travel_age_2 =$('#travel_age_2').val();
                var travel_relationship_3 =$scope.travel_relationship_3;
                var travel_dob_3 =$scope.travel_dob_3;
                var travel_age_3 =$('#travel_age_3').val();
                var travel_email =$scope.travel_email;
                var travel_mobile =$scope.travel_mobile;



                var opt_geographical = $('option[value="'+travel_geographical+'"]');
                var travel_geographical = opt_geographical.length ? opt_geographical.attr('id') : 'NO OPTION';

// alert(opt_geographical);
// alert(travel_geographical);
               // var travel_geographical = travel_geographical.length ? travel_geographical.attr('id') : 'NO OPTION';   
                
               
                
                var paramsArray  = {"travel_first_name": travel_first_name,
                                    "travel_last_name": travel_last_name,
                                    "travel_state": travel_state,
                                    "travel_city": travel_city,
                                    "travel_policy_type": travel_policy_type,
                                    "travel_type_trip": travel_type_trip,
                                    "travel_cover_type": travel_cover_type,
                                    "travel_depart_date": travel_depart_date,
                                    "travel_return_date": travel_return_date,
                                    "travel_trip_duration": travel_trip_duration,
                                    "travel_type": travel_type,
                                    "travel_geographical": travel_geographical,
                                    "travel_max_trip": travel_max_trip,
                                    "travel_relationship": travel_relationship,
                                    "travel_date_birth": travel_date_birth,
                                    "travel_age": travel_age,
                                    "travel_relationship_1": travel_relationship_1,
                                    "travel_dob_1": travel_dob_1,
                                    "travel_age_1": travel_age_1,
                                    "travel_relationship_2": travel_relationship_2,
                                    "travel_dob_2": travel_dob_2,
                                    "travel_age_2": travel_age_2,
                                    "travel_relationship_3": travel_relationship_3,
                                    "travel_dob_3": travel_dob_3,
                                    "travel_age_3": travel_age_3,
                                    "travel_email": travel_email,
                                    "travel_mobile": travel_mobile,
                    }

                    var url = web_url+"Quotetravel/qmsCalculatePremiumTravel/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                    var responseData = response.data; 
                    responseData = responseData.trim();                   
                    if(responseData == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-travel-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

            }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });
