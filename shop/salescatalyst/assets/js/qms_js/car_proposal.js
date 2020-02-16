    
jQuery(document).ready(function() {   
    $( function() {

        $("#car_pro_existing_policy_expiry").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            //startDate: "+0d",
        });

        $("#car_pro_existing_policy_start").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            startDate: "+0d",
        });


        $("#car_pro_regis_date").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            //startDate: "+0d",
        });

    });     

        
});     



    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope, $http) {
        $scope.formData = {};

         $scope.car_pro_financed = '0';

        
       
         var web_url = $('#web_url').val();

           var url = web_url+"Quote/getSessionValues";
            $http.get(url,{params:''}).then( function(response) {
           
            $scope.car_pro_fname = response.data['car_first_name'];
            $scope.car_pro_lname = response.data['car_last_name'];
            $scope.car_pro_dob = response.data['car_dob'];
            $scope.car_pro_regi_num = response.data['car_registration'];
            $scope.car_pro_city = response.data['car_city'];
            $scope.car_pro_state = response.data['car_state'];
            $scope.car_pro_mobile = response.data['car_mobile'];
            $scope.car_pro_email = response.data['car_email'];
            $scope.car_pro_gender = response.data['car_pro_gender'];
            $scope.car_pro_marital = response.data['car_pro_marital'];
            $scope.car_pro_occupation= response.data['car_pro_occupation'];
            $scope.car_pro_add1= response.data['car_pro_add1'];
            $scope.car_pro_add2= response.data['car_pro_add2'];
           
            $scope.car_pro_emergency = response.data['car_pro_emergency'];                                         
            
            $scope.car_pro_gender= response.data['car_pro_gender'];
            $scope.car_pro_nname= response.data['car_pro_nname'];
            $scope.car_pro_nage= response.data['car_pro_nage'];
            $scope.car_pro_nomie_relation= response.data['car_pro_nomie_relation'];
            $scope.car_pro_nameofappoint= response.data['car_pro_nameofappoint'];
            $scope.car_pro_appoint_relation = response.data['car_pro_appoint_relation'];  


            $scope.car_prop_existing_insure = response.data['car_prop_existing_insure'];  
            $scope.car_pro_existing_policynum = response.data['car_pro_existing_policynum'];  
            $scope.car_pro_existing_policy_expiry = response.data['car_pro_existing_policy_expiry'];  
            $scope.car_pro_existing_policy_start = response.data['car_pro_existing_policy_start'];  
            $scope.car_pro_regis_date = response.data['car_pro_regis_date'];  
            $scope.car_pro_engine_num = response.data['car_pro_engine_num'];  
            $scope.car_pro_chasis_num = response.data['car_pro_chasis_num']; 
            $scope.car_pro_landmark = response.data['car_pro_landmark']; 
            $scope.car_pro_gstn = response.data['car_pro_gstn'];

            $scope.car_pro_drive = response.data['car_pro_drive'];  
            $scope.car_pro_parking = response.data['car_pro_parking']; 
            $scope.car_pro_who_drive = response.data['car_pro_who_drive']; 
            $scope.car_pro_kms = response.data['car_pro_kms']; 
            $scope.car_pro_ydage = response.data['car_pro_ydage']; 
            $scope.car_pro_driver = response.data['car_pro_driver']; 
            $scope.car_pro_driver = response.data['car_pro_driver']; 



        });       


        
        $scope.proposal = function() {
            quoteCar.setAttribute("autocomplete", "off");
            
                var web_url = $('#web_url').val();
                // alert(web_url);


   
      
                if ($scope.quoteCar.$valid) {

                    $("#load_model").click();


                    var car_prop_existing_insure = $scope.car_prop_existing_insure;
                    var car_pro_existing_policynum = $scope.car_pro_existing_policynum;
                    var car_pro_existing_policy_expiry = $scope.car_pro_existing_policy_expiry;
                    var car_pro_existing_policy_start = $scope.car_pro_existing_policy_start;
                    var car_pro_regis_date = $scope.car_pro_regis_date;
                    var car_pro_regi_num = $scope.car_pro_regi_num;
                    var car_pro_engine_num = $scope.car_pro_engine_num;
                    var car_pro_chasis_num = $scope.car_pro_chasis_num;
                    var car_pro_financed = $scope.car_pro_financed;

                    var car_pro_fname = $scope.car_pro_fname;                                        
                    var car_pro_lname = $scope.car_pro_lname;
                    var car_pro_dob = $scope.car_pro_dob;
                    var car_pro_gender = $scope.car_pro_gender;
                    var car_pro_marital = $scope.car_pro_marital;
                    var car_pro_occupation = $scope.car_pro_occupation;
                    var car_pro_add1 = $scope.car_pro_add1;
                    var car_pro_add2 = $scope.car_pro_add2;
                    var car_pro_landmark = $scope.car_pro_landmark;
                    var car_pro_state = $scope.car_pro_state;
                    var car_pro_city = $scope.car_pro_city;
                    var car_pro_mobile = $scope.car_pro_mobile;
                    var car_pro_emergency = $scope.car_pro_emergency;                                             
                    var car_pro_email = $scope.car_pro_email;
                    var car_pro_gstn = $scope.car_pro_gstn;
                    var car_pro_nname = $scope.car_pro_nname;
                    var car_pro_nage = $scope.car_pro_nage;
                    var car_pro_nomie_relation = $scope.car_pro_nomie_relation;
                    var car_pro_nameofappoint = $scope.car_pro_nameofappoint;
                    var car_pro_appoint_relation = $scope.car_pro_appoint_relation;
                    var car_pro_drive = $scope.car_pro_drive;
                    var car_pro_parking = $scope.car_pro_parking;
                    var car_pro_who_drive = $scope.car_pro_who_drive;
                    var car_pro_kms = $scope.car_pro_kms;
                    var car_pro_ydage = $scope.car_pro_ydage;
                    var car_pro_driver=$scope.car_pro_driver;   

                                        

                    var paramsArray  = {"car_prop_existing_insure": car_prop_existing_insure,
                                        "car_pro_existing_policynum": car_pro_existing_policynum,
                                        "car_pro_existing_policy_expiry": car_pro_existing_policy_expiry,
                                        "car_pro_new_policy_start": car_pro_existing_policy_start,
                                        "car_pro_regis_date": car_pro_regis_date,
                                        "car_pro_regi_num": car_pro_regi_num,
                                        "car_pro_engine_num": car_pro_engine_num,
                                        "car_pro_chasis_num": car_pro_chasis_num,
                                        "car_pro_financed": car_pro_financed,

                                        "car_pro_fname": car_pro_fname,
                                        "car_pro_lname": car_pro_lname,
                                        "car_pro_dob": car_pro_dob,
                                        "car_pro_gender": car_pro_gender,
                                        "car_pro_marital": car_pro_marital,
                                        "car_pro_occupation": car_pro_occupation,
                                        "car_pro_add1": car_pro_add1,
                                        "car_pro_add2": car_pro_add2,
                                        "car_pro_landmark": car_pro_landmark,
                                        "car_pro_state": car_pro_state,
                                        "car_pro_city": car_pro_city,
                                        "car_pro_mobile": car_pro_mobile,
                                        "car_pro_emergency": car_pro_emergency,
                                        "car_pro_email": car_pro_email,
                                        "car_pro_gstn": car_pro_gstn,
                                        "car_pro_nname": car_pro_nname,
                                        "car_pro_nage": car_pro_nage,
                                        "car_pro_nomie_relation": car_pro_nomie_relation,
                                        "car_pro_nameofappoint": car_pro_nameofappoint,
                                        "car_pro_appoint_relation": car_pro_appoint_relation,
                                        "car_pro_drive": car_pro_drive,
                                        "car_pro_parking": car_pro_parking,
                                        "car_pro_who_drive": car_pro_who_drive,
                                        "car_pro_kms": car_pro_kms,
                                        "car_pro_ydage": car_pro_ydage,
                                        "car_pro_emergency": car_pro_emergency,
                                        "car_pro_driver":car_pro_driver,


                                        
                        }
            // console.log (paramsArray);


                        var url = web_url+"Quote/premiumInformation/";
                        $http.get(url,{params:paramsArray}).then( function(response) {

                            var redirectUrl = web_url+'qms-car-proposal-view/'
                            window.location.href = redirectUrl;
                    });                                

                } // if ($scope.quoteTravel.$valid) { ends here    
            } // $scope.pset = function(){ ends here   



                 $scope.confirm_proposal = function() {

                var url = web_url+"Quote/carUpdateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-car-proposal-result/'
                    window.location.href = redirectUrl;
                } else {
                    //alert('Some thing went wrong, Please try again. ');
                     alert(responseData);   
                    $("#closeModel").click();
                }

            })   

        }       
    });