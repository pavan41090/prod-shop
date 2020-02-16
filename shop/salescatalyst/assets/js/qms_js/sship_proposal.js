    jQuery(document).ready(function() {   
        $( function() {
            $("#sship_pro_policy_start").datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true,
                startDate: "+0d",
            });
        }); 

        //$('#sship_pro_state').editableSelect({ filter: false });    
        
    });    


    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope, $http) {
        $scope.formData = {};

         $scope.sship_pro_suffered = '0';
         $scope.sship_pro_diseases = '0';
         $scope.sship_pro_psychiatric = '0';
         $scope.sship_pro_medication = '0';
         $scope.sship_pro_cyst = '0';
         $scope.sship_pro_Fibroid='0';
         $scope.sship_pro_bltest = '0';
         $scope.sship_pro_diabetes = '0';
         $scope.sship_pro_pregnant = '0';
         $scope.sship_pro_advice = '0';
         $scope.sship_pro_Gutka = '0';
         $scope.sship_pro_protability='0';
         $scope.sship_pro_pinsured='0';


        
       
         var web_url = $('#web_url').val();

           var url = web_url+"Quotesship/getSessionValuesSship";
            $http.get(url,{params:''}).then( function(response) {
           
            $scope.sship_pro_fname = response.data['sship_first_name'];
            $scope.sship_pro_lname = response.data['sship_last_name'];
            $scope.sship_pro_dob = response.data['sship_dob'];
            $scope.sship_pro_state = response.data['sship_pro_state'];
            $scope.sship_pro_city = response.data['sship_pro_city'];
            $scope.sship_pro_zip = response.data['sship_pro_zip'];
            $scope.sship_pro_mobile = response.data['sship_pro_mobile'];
            $scope.sship_pro_email = response.data['sship_pro_email'];
            $scope.sship_pro_occupation = response.data['sship_pro_occupation'];
            $scope.sship_pro_gender = response.data['sship_pro_gender'];
            
            $scope.sship_pro_add1 = response.data['sship_pro_add1'];
            $scope.sship_pro_add2 = response.data['sship_pro_add2'];
            $scope.sship_pro_nland = response.data['sship_pro_nland'];
            $scope.sship_pro_policy_start = response.data['sship_pro_policy_start'];
            $scope.sship_pro_title = response.data['sship_pro_title'];
            $scope.sship_pro_emergency = response.data['sship_pro_emergency'];
            $scope.sship_pro_gstn = response.data['sship_pro_gstn'];
            $scope.sship_pro_height = response.data['sship_pro_height'];
            $scope.sship_pro_Weight = response.data['sship_pro_Weight'];

            $scope.sship_pro_nname = response.data['sship_pro_nname'];
            $scope.sship_pro_nomie_relation = response.data['sship_pro_nomie_relation'];
            $scope.sship_pro_nameofappoint = response.data['sship_pro_nameofappoint'];
            $scope.sship_pro_appoint_relation = response.data['sship_pro_appoint_relation'];

            $scope.sship_pro_doc_name = response.data['sship_pro_doc_name'];
            $scope.sship_pro_doc_qualifi = response.data['sship_pro_doc_qualifi'];
            $scope.sship_pro_doc_addr = response.data['sship_pro_doc_addr'];
            $scope.sship_pro_doc_mobile = response.data['sship_pro_doc_mobile'];
            $scope.sship_pro_hos_num = response.data['sship_pro_hos_num'];

        });       


        //quoteHealth.setAttribute("autocomplete", "off");
        $scope.proposal = function() {
            var web_url = $('#web_url').val();
               if ($scope.quoteSship.$valid) {

                    $("#load_modal").click();
                    var sship_pro_policy_start = $scope.sship_pro_policy_start;
                    var sship_pro_title = $scope.sship_pro_title;
                    var sship_pro_fname = $scope.sship_pro_fname;
                    var sship_pro_lname = $scope.sship_pro_lname;
                    var sship_pro_dob = $scope.sship_pro_dob;
                    var sship_pro_add1 = $scope.sship_pro_add1;
                    var sship_pro_add2 = $scope.sship_pro_add2;
                    var sship_pro_nland=$scope.sship_pro_nland;
                    var sship_pro_zip = $scope.sship_pro_zip;
                    var sship_pro_state = $scope.sship_pro_state;
                    var sship_pro_city = $scope.sship_pro_city;
                    var sship_pro_mobile = $scope.sship_pro_mobile;
                    var sship_pro_emergency = $scope.sship_pro_emergency;                                             
                    var sship_pro_email = $scope.sship_pro_email;
                    var sship_pro_gstn = $scope.sship_pro_gstn;
                    var sship_pro_gender = $scope.sship_pro_gender;
                    var sship_pro_height = $scope.sship_pro_height;
                    var sship_pro_Weight = $scope.sship_pro_Weight;
                    var sship_pro_occupation = $scope.sship_pro_occupation;

                    var sship_pro_suffered = $scope.sship_pro_suffered;
                    var sship_pro_diseases = $scope.sship_pro_diseases;
                    var sship_pro_psychiatric = $scope.sship_pro_psychiatric;
                    var sship_pro_medication = $scope.sship_pro_medication;
                    var sship_pro_cyst = $scope.sship_pro_cyst;
                    var sship_pro_bltest = $scope.sship_pro_bltest;
                    var sship_pro_diabetes = $scope.sship_pro_diabetes; 
                    var sship_pro_pregnant = $scope.sship_pro_pregnant;
                    var sship_pro_advice = $scope.sship_pro_advice;
                    var sship_pro_Gutka = $scope.sship_pro_Gutka;
                    
                    var sship_pro_nname = $scope.sship_pro_nname;
                    var sship_pro_nomie_relation = $scope.sship_pro_nomie_relation;
                    var sship_pro_nameofappoint = $scope.sship_pro_nameofappoint;
                    var sship_pro_appoint_relation = $scope.sship_pro_appoint_relation;

                    var sship_pro_doc_name = $scope.sship_pro_doc_name;
                    var sship_pro_doc_qualifi = $scope.sship_pro_doc_qualifi;
                    var sship_pro_doc_addr = $scope.sship_pro_doc_addr;       
                    var sship_pro_doc_mobile = $scope.sship_pro_doc_mobile;
                    var sship_pro_hos_num = $scope.sship_pro_hos_num;

                    var paramsArray  = {
                                        "sship_pro_fname": sship_pro_fname,
                                        "sship_pro_lname": sship_pro_lname,
                                        "sship_pro_dob": sship_pro_dob,
                                        "sship_pro_state": sship_pro_state,
                                        "sship_pro_city": sship_pro_city,
                                        "sship_pro_mobile": sship_pro_mobile,
                                        "sship_pro_gender": sship_pro_gender,
                                        "sship_pro_zip": sship_pro_zip,
                                        "sship_pro_email": sship_pro_email,
                                        "sship_pro_occupation":sship_pro_occupation,

                                        "sship_pro_add1": sship_pro_add1,
                                        "sship_pro_add2": sship_pro_add2,
                                        "sship_pro_nland":sship_pro_nland,
                                        "sship_pro_policy_start": sship_pro_policy_start,
                                        "sship_pro_title": sship_pro_title,
                                        "sship_pro_emergency": sship_pro_emergency, 
                                        "sship_pro_gstn": sship_pro_gstn, 
                                        "sship_pro_height": sship_pro_height,
                                        "sship_pro_Weight": sship_pro_Weight,
                                        

                                        "sship_pro_suffered": sship_pro_suffered,
                                        "sship_pro_diseases": sship_pro_diseases,
                                        "sship_pro_psychiatric": sship_pro_psychiatric,
                                        "sship_pro_medication": sship_pro_medication,
                                        "sship_pro_cyst": sship_pro_cyst,
                                        "sship_pro_bltest": sship_pro_bltest,
                                        "sship_pro_diabetes": sship_pro_diabetes, 
                                        "sship_pro_pregnant": sship_pro_pregnant,
                                        "sship_pro_advice": sship_pro_advice,
                                        "sship_pro_Gutka": sship_pro_Gutka,


                                        "sship_pro_nname": sship_pro_nname,
                                        "sship_pro_nomie_relation": sship_pro_nomie_relation,
                                        "sship_pro_nameofappoint": sship_pro_nameofappoint,
                                        "sship_pro_appoint_relation": sship_pro_appoint_relation,

                                        "sship_pro_doc_name": sship_pro_doc_name,
                                        "sship_pro_doc_qualifi": sship_pro_doc_qualifi,
                                        "sship_pro_doc_addr": sship_pro_doc_addr,
                                        "sship_pro_doc_mobile": sship_pro_doc_mobile,
                                        "sship_pro_hos_num": sship_pro_hos_num,
                        }
            // console.log (paramsArray);

                        var url = web_url+"Quotesship/sshipProposalInfommation/";
                        $http.get(url,{params:paramsArray}).then( function(response) {
                            var redirectUrl = web_url+'qms-sship-proposal-view/';
                            window.location.href = redirectUrl;
                        });                 

                } else {
                    if($scope.quoteSship.sship_pro_policy_start.$valid === false) { $('#sship_pro_policy_start').focus();  }

                    else if($scope.quoteSship.sship_pro_title.$valid === false) { $('#sship_pro_title').focus(); } 
                    else if($scope.quoteSship.sship_pro_fname.$valid === false) { $('#sship_pro_fname').focus(); }
                    else if($scope.quoteSship.sship_pro_lname.$valid === false) { $('#sship_pro_lname').focus(); }
                    else if($scope.quoteSship.sship_pro_dob.$valid === false) { $('#sship_pro_dob').focus(); }
                    else if($scope.quoteSship.sship_pro_add1.$valid === false) { $('#sship_pro_add1').focus(); }
                    else if($scope.quoteSship.sship_pro_add2.$valid === false) { $('#sship_pro_add2').focus(); }
                    else if($scope.quoteSship.sship_pro_nland.$valid === false) { $('#sship_pro_nland').focus(); }
                    else if($scope.quoteSship.sship_pro_zip.$valid === false) { $('#sship_pro_zip').focus(); }
                    else if($scope.quoteSship.sship_pro_state.$valid === false) { $('#sship_pro_state').focus(); }
                    else if($scope.quoteSship.sship_pro_city.$valid === false) { $('#sship_pro_city').focus(); }
                    else if($scope.quoteSship.sship_pro_mobile.$valid === false) { $('#sship_pro_mobile').focus(); }
                    
                    // if($scope.quoteSship.sship_pro_emergency.$valid === false) { $('#sship_pro_emergency').focus(); }
                    // if($scope.quoteSship.sship_pro_email.$valid === false) { $('#sship_pro_email').focus(); }
                    // if($scope.quoteSship.sship_pro_gstn.$valid === false) { $('#sship_pro_gstn').focus(); }
                    // if($scope.quoteSship.sship_pro_gender.$valid === false) { $('#sship_pro_gender').focus(); }
                    // if($scope.quoteSship.sship_pro_height.$valid === false) { $('#sship_pro_height').focus(); }
                    // if($scope.quoteSship.sship_pro_Weight.$valid === false) { $('#sship_pro_Weight').focus(); }
                    // if($scope.quoteSship.sship_pro_occupation.$valid === false) { $('#sship_pro_occupation').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }
                    // if($scope.quoteSship.sship_pro.$valid === false) { $('#sship_pro_mobile').focus(); }


                } // if ($scope.quoteTravel.$valid) { ends here    


        } // $scope.pset = function(){ ends here   


             $scope.confirm_proposal = function() {
                $("#load_modal").click();
                var url = web_url+"Quotesship/sshipUpdateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-sship-proposal-result/'
                    window.location.href = redirectUrl;
                } else {
                    //alert('Some thing went wrong, Please try again. ');
                     alert(responseData);   
                    $("#closeModel").click();
                }

            })   

        }       

        $scope.backToHome = function() {
                $("#load_modal").click();
                var url = web_url+"Quotesship/sessionClearShip/";
                $http.get(url,{params: ''}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    var redirectUrl = web_url+'create-quote-super-ship/'
                    window.location.href = redirectUrl;
                } else {
                    $("#closeModel").click();
                }

            })  


        }    

    });