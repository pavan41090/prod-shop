  // $(document).ready(function() {    
  //       $( "#tw_pro_regis_date" ).datepicker({
  //           changeMonth: true,
  //           changeYear: true,
  //           //dateFormat: "dd/mm/yy",
  //           yearRange: "-10:+00"
  //       });

  //   })    



    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope, $http) {
        $scope.formData = {};

         $scope.tw_pro_financed = '0';
  
         var web_url = $('#web_url').val();

           var url = web_url+"Quotetw/getSessionValuesTW";
            $http.get(url,{params:''}).then( function(response) {
           
            $scope.tw_pro_fname = response.data['tw_first_name'];
            $scope.tw_pro_lname = response.data['tw_last_name'];
            $scope.tw_pro_dob = response.data['tw_dob'];
            $scope.tw_pro_regi_num = response.data['tw_registration'];
            $scope.tw_pro_city = response.data['tw_city'];
            $scope.tw_pro_state = response.data['tw_state'];
            $scope.tw_pro_mobile = response.data['tw_mobile'];
            $scope.tw_pro_email = response.data['tw_email'];

            $scope.tw_pro_gender = response.data['tw_pro_gender'];
            $scope.tw_pro_material = response.data['tw_pro_marital'];
            $scope.tw_pro_occupation= response.data['tw_pro_occupation'];
            $scope.tw_pro_add1= response.data['tw_pro_add1'];
            $scope.tw_pro_add2= response.data['tw_pro_add2'];
           
            $scope.tw_pro_emergency = response.data['tw_pro_emergency'];                                         
            
            $scope.tw_pro_gender= response.data['tw_pro_gender'];
            $scope.tw_pro_nname= response.data['tw_pro_nname'];
            $scope.tw_pro_nage= response.data['tw_pro_nage'];
            $scope.tw_pro_nomie_relation= response.data['tw_pro_nomie_relation'];
            $scope.tw_pro_nameofappoint= response.data['tw_pro_nameofappoint'];
            $scope.tw_pro_appoint_relation = response.data['tw_pro_appoint_relation'];  


            $scope.tw_prop_existing_insure = response.data['tw_prop_existing_insure'];  
            $scope.tw_pro_existing_policynum = response.data['tw_pro_existing_policynum'];  
            $scope.tw_pro_existing_policy_expiry = response.data['tw_pro_existing_policy_expiry'];  
            $scope.tw_pro_existing_policy_start = response.data['tw_pro_new_policy_start'];  
            $scope.tw_pro_regis_date = response.data['tw_pro_regis_date'];  
            $scope.tw_pro_engine_num = response.data['tw_pro_engine_num'];  
            $scope.tw_pro_chasis_num = response.data['tw_pro_chasis_num']; 
            $scope.tw_pro_landmark = response.data['tw_pro_landmark']; 
            $scope.tw_pro_gstn = response.data['tw_pro_gstn']; 
            $scope.tw_pro_drive_two =response.data['tw_pro_drive_two'];
            
            $scope.tw_pro_parking =response.data['tw_pro_parking'];
            $scope.tw_pro_who_drive =response.data['tw_pro_who_drive'];
            $scope.tw_pro_kms =response.data['tw_pro_kms'];
            $scope.tw_pro_ydage =response.data['tw_pro_ydage'];
            
            // alert(response.data['tw_pro_existing_policy_expiry']);
            // $scope.tw_pro_existing_policy_expiry = response.data['existing_policy_expiry_date'];
            // $scope.tw_pro_existing_policy_start = response.data['proposed_policy_start_date'];


        });       


        
        $scope.proposal = function() {
            quoteTw.setAttribute("autocomplete", "off");
            
                var web_url = $('#web_url').val();
                // alert(web_url);


   
      
                if ($scope.quoteTw.$valid) {

                    $("#load_model").click();


                    var tw_prop_existing_insure = $scope.tw_prop_existing_insure;
                    var tw_pro_existing_policynum = $scope.tw_pro_existing_policynum;
                    var tw_pro_existing_policy_expiry = $scope.tw_pro_existing_policy_expiry;
                    var tw_pro_existing_policy_start = $scope.tw_pro_existing_policy_start;
                    var tw_pro_regis_date = $scope.tw_pro_regis_date;
                    var tw_pro_regi_num = $scope.tw_pro_regi_num;
                    var tw_pro_engine_num = $scope.tw_pro_engine_num;
                    var tw_pro_chasis_num = $scope.tw_pro_chasis_num;
                    var tw_pro_financed = $scope.tw_pro_financed;

                    var tw_pro_fname = $scope.tw_pro_fname;                                        
                    var tw_pro_lname = $scope.tw_pro_lname;
                    var tw_pro_dob = $scope.tw_pro_dob;
                    var tw_pro_gender = $scope.tw_pro_gender;
                    var tw_pro_material = $scope.tw_pro_material;
                    var tw_pro_occupation = $scope.tw_pro_occupation;
                    var tw_pro_add1 = $scope.tw_pro_add1;
                    var tw_pro_add2 = $scope.tw_pro_add2;
                    var tw_pro_landmark = $scope.tw_pro_landmark;
                    var tw_pro_state = $scope.tw_pro_state;
                    var tw_pro_city = $scope.tw_pro_city;
                    var tw_pro_mobile = $scope.tw_pro_mobile;
                    var tw_pro_emergency = $scope.tw_pro_emergency;                                             
                    var tw_pro_email = $scope.tw_pro_email;
                    var tw_pro_gstn = $scope.tw_pro_gstn;
                    var tw_pro_nname = $scope.tw_pro_nname;
                    var tw_pro_nage = $scope.tw_pro_nage;
                    var tw_pro_nomie_relation = $scope.tw_pro_nomie_relation;
                    var tw_pro_nameofappoint = $scope.tw_pro_nameofappoint;
                    var tw_pro_appoint_relation = $scope.tw_pro_appoint_relation;
                    var tw_pro_drive_two = $scope.tw_pro_drive_two;
                    var tw_pro_parking = $scope.tw_pro_parking;
                    var tw_pro_who_drive = $scope.tw_pro_who_drive;
                    var tw_pro_kms = $scope.tw_pro_kms;
                    var tw_pro_ydage = $scope.tw_pro_ydage;
                          
                // var opt_tw_pro_occu = $('option[value="'+tw_pro_occupation_txt+'"]');
                // var tw_pro_occupation = opt_tw_pro_occu.length ? opt_tw_pro_occu.attr('id') : 'NO OPTION';

                                        




                    var paramsArray  = {"tw_prop_existing_insure": tw_prop_existing_insure,
                                        "tw_pro_existing_policynum": tw_pro_existing_policynum,
                                        "tw_pro_existing_policy_expiry": tw_pro_existing_policy_expiry,
                                        "tw_pro_new_policy_start": tw_pro_existing_policy_start,
                                        "tw_pro_regis_date": tw_pro_regis_date,
                                        "tw_pro_regi_num": tw_pro_regi_num,
                                        "tw_pro_engine_num": tw_pro_engine_num,
                                        "tw_pro_chasis_num": tw_pro_chasis_num,
                                        "tw_pro_financed": tw_pro_financed,

                                        "tw_pro_fname": tw_pro_fname,
                                        "tw_pro_lname": tw_pro_lname,
                                        "tw_pro_dob": tw_pro_dob,
                                        "tw_pro_gender": tw_pro_gender,
                                        "tw_pro_material": tw_pro_material,
                                        "tw_pro_occupation": tw_pro_occupation,
                                        "tw_pro_add1": tw_pro_add1,
                                        "tw_pro_add2": tw_pro_add2,
                                        "tw_pro_landmark": tw_pro_landmark,
                                        "tw_pro_state": tw_pro_state,
                                        "tw_pro_city": tw_pro_city,
                                        "tw_pro_mobile": tw_pro_mobile,
                                        "tw_pro_emergency": tw_pro_emergency,
                                        "tw_pro_email": tw_pro_email,
                                        "tw_pro_gstn": tw_pro_gstn,
                                        "tw_pro_nname": tw_pro_nname,
                                        "tw_pro_nage": tw_pro_nage,
                                        "tw_pro_nomie_relation": tw_pro_nomie_relation,
                                        "tw_pro_nameofappoint": tw_pro_nameofappoint,
                                        "tw_pro_appoint_relation": tw_pro_appoint_relation,
                                        "tw_pro_drive_two": tw_pro_drive_two,
                                        "tw_pro_parking": tw_pro_parking,
                                        "tw_pro_who_drive": tw_pro_who_drive,
                                        "tw_pro_kms": tw_pro_kms,
                                        "tw_pro_ydage": tw_pro_ydage,
                                        "tw_pro_emergency": tw_pro_emergency,
                                        


                                        
                        }
            // console.log (paramsArray);


                        var url = web_url+"Quotetw/premiumInformation/";
                        $http.get(url,{params:paramsArray}).then( function(response) {

                       // console.log(response.data);
                        
                            var redirectUrl = web_url+'qms-two-wheeler-proposal-view/'
                            window.location.href = redirectUrl;
                        
                    });                                

                } // if ($scope.quoteTravel.$valid) { ends here    
            } // $scope.pset = function(){ ends here   



                 $scope.confirm_proposal = function() {

                var url = web_url+"Quotetw/twUpdateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-two-wheeler-proposal-result/'
                    window.location.href = redirectUrl;
                } else {
                    //alert('Some thing went wrong, Please try again. ');
                     alert(responseData);   
                    $("#closeModel").click();
                }

            })   

        }       
    });