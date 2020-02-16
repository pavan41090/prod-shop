
jQuery(document).ready(function() {   
    $( function() {

        $("#helth_pro_policy_start").datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            startDate: "+0d",
        });
    });     

        
});    


    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope, $http) {
        $scope.formData = {};

         $scope.helth_pro_suffered = '0';
         $scope.helth_pro_diseases = '0';
         $scope.helth_pro_psychiatric = '0';
         $scope.helth_pro_medication = '0';
         $scope.helth_pro_cyst = '0';
         $scope.helth_pro_Fibroid='0';
         $scope.helth_pro_bltest = '0';
         $scope.helth_pro_diabetes = '0';
         $scope.helth_pro_pregnant = '0';
         $scope.helth_pro_advice = '0';
         $scope.helth_pro_Gutka = '0';
         $scope.helth_pro_protability='0';
         $scope.helth_pro_pinsured ='0';
         $scope.helth_pro_nationalty='0';


        
       
         var web_url = $('#web_url').val();

           var url = web_url+"Quotehealth/getSessionValuesHealth";
            $http.get(url,{params:''}).then( function(response) {
           
            $scope.helth_pro_fname = response.data['helth_first_name'];
            $scope.helth_pro_lname = response.data['helth_last_name'];
            $scope.helth_pro_dob = response.data['helth_dob'];
            $scope.helth_pro_state = response.data['helth_pro_state'];
            $scope.helth_pro_city = response.data['helth_pro_city'];
            $scope.helth_pro_zip = response.data['helth_pro_zip'];
            $scope.helth_pro_mobile = response.data['helth_pro_mobile'];
            $scope.helth_pro_email = response.data['helth_pro_email'];
            $scope.helth_pro_occupation = response.data['helth_pro_occupation'];
            $scope.helth_pro_gender = response.data['helth_pro_gender'];
          
            $scope.helth_pro_add1 = response.data['helth_pro_add1'];
            $scope.helth_pro_add2 = response.data['helth_pro_add2'];
            $scope.helth_pro_nland = response.data['helth_pro_nland'];
            $scope.helth_pro_policy_start = response.data['helth_pro_policy_start'];
            $scope.helth_pro_title = response.data['helth_pro_title'];
            $scope.helth_pro_emergency = response.data['helth_pro_emergency'];
            $scope.helth_pro_gstn = response.data['helth_pro_gstn'];
            $scope.helth_pro_height = response.data['helth_pro_height'];
            $scope.helth_pro_Weight = response.data['helth_pro_Weight'];

            //$scope.helth_pro_nname = response.data['helth_pro_nname'];
           // $scope.helth_pro_nomie_relation = response.data['helth_pro_nomie_relation'];
           // $scope.helth_pro_nameofappoint = response.data['helth_pro_nameofappoint'];
            //$scope.helth_pro_appoint_relation = response.data['helth_pro_appoint_relation'];

            // $scope.helth_pro_dname = response.data['helth_pro_dname'];
            // $scope.helth_pro_qualifi = response.data['helth_pro_qualifi'];
            // $scope.helth_pro_dadds = response.data['helth_pro_dadds'];
            // $scope.helth_pro_dmobile = response.data['helth_pro_dmobile'];
            // $scope.helth_pro_chmobile = response.data['helth_pro_chmobile'];
         

            $scope.helth_pro_pinsured = response.data['helth_pro_pinsured'];
            $scope.helth_pro_yname = response.data['helth_pro_yname'];
            $scope.helth_pro_drive_prirelation = response.data['helth_pro_drive_prirelation'];
            $scope.helth_pro_pdob = response.data['helth_pro_pdob'];
            $scope.helth_pro_pgender = response.data['helth_pro_pgender'];
            $scope.helth_pro_padd1 = response.data['helth_pro_padd1'];
            $scope.helth_pro_padd2 = response.data['helth_pro_padd2'];
            $scope.helth_pro_pnland = response.data['helth_pro_pnland'];
            $scope.helth_pro_pemail = response.data['helth_pro_pemail'];
            $scope.helth_pro_nationalty = response.data['helth_pro_nationalty'];
            $scope.helth_pro_poccupation = response.data['helth_pro_poccupation'];
            $scope.helth_pro_incomein = response.data['helth_pro_incomein'];
            $scope.helth_pro_ppc = response.data['helth_pro_ppc'];


            // $scope.helth_pro_bankname = response.data['helth_pro_bankname'];
            // $scope.helth_pro_ifsc = response.data['helth_pro_ifsc'];
            // $scope.helth_pro_bbranch = response.data['helth_pro_bbranch'];
            // $scope.helth_pro_Aholname = response.data['helth_pro_Aholname'];
            // $scope.helth_pro_ano = response.data['helth_pro_ano'];

        });       


        //quoteHealth.setAttribute("autocomplete", "off");
        $scope.proposal = function() {

                var web_url = $('#web_url').val();
                // alert(web_url);


   
      
                if ($scope.quoteHealth.$valid) {

                    $("#load_model").click();


                    var helth_pro_policy_start = $scope.helth_pro_policy_start;
                    var helth_pro_title = $scope.helth_pro_title;
                    var helth_pro_fname = $scope.helth_pro_fname;
                    var helth_pro_lname = $scope.helth_pro_lname;
                    var helth_pro_dob = $scope.helth_pro_dob;
                    var helth_pro_add1 = $scope.helth_pro_add1;
                    var helth_pro_add2 = $scope.helth_pro_add2;
                    var helth_pro_nland=$scope.helth_pro_nland;
                    var helth_pro_zip = $scope.helth_pro_zip;
                    var helth_pro_state = $scope.helth_pro_state;
                    var helth_pro_city = $scope.helth_pro_city;
                    var helth_pro_mobile = $scope.helth_pro_mobile;
                    var helth_pro_emergency = $scope.helth_pro_emergency;                                             
                    var helth_pro_email = $scope.helth_pro_email;
                    var helth_pro_gstn = $scope.helth_pro_gstn;
                    var helth_pro_gender = $scope.helth_pro_gender;
                    var helth_pro_height = $scope.helth_pro_height;
                    var helth_pro_Weight = $scope.helth_pro_Weight;
                    var helth_pro_occupation = $scope.helth_pro_occupation;

                    var helth_pro_suffered = $scope.helth_pro_suffered;
                    var helth_pro_diseases = $scope.helth_pro_diseases;
                    var helth_pro_psychiatric = $scope.helth_pro_psychiatric;
                    var helth_pro_medication = $scope.helth_pro_medication;
                    var helth_pro_cyst = $scope.helth_pro_cyst;
                    var helth_pro_bltest = $scope.helth_pro_bltest;
                    var helth_pro_diabetes = $scope.helth_pro_diabetes; 
                    var helth_pro_pregnant = $scope.helth_pro_pregnant;
                    var helth_pro_advice = $scope.helth_pro_advice;
                    var helth_pro_Gutka = $scope.helth_pro_Gutka;
                    
                   // var helth_pro_nname = $scope.helth_pro_nname;
                   // var helth_pro_nomie_relation = $scope.helth_pro_nomie_relation;
                   // var helth_pro_nameofappoint = $scope.helth_pro_nameofappoint;
                    //var helth_pro_appoint_relation = $scope.helth_pro_appoint_relation;

                    // var helth_pro_dname = $scope.helth_pro_dname;
                    // var helth_pro_qualifi = $scope.helth_pro_qualifi;
                    // var helth_pro_dadds = $scope.helth_pro_dadds;       
                    // var helth_pro_dmobile = $scope.helth_pro_dmobile;
                    // var helth_pro_chmobile = $scope.helth_pro_chmobile;

                    var helth_pro_pinsured = $scope.helth_pro_pinsured;
                    var helth_pro_yname = $scope.helth_pro_yname;
                    var helth_pro_drive_prirelation = $scope.helth_pro_drive_prirelation;
                    var helth_pro_pdob = $scope.helth_pro_pdob;
                    var helth_pro_pgender = $scope.helth_pro_pgender;                
                    var helth_pro_padd1 = $scope.helth_pro_padd1;
                    var helth_pro_padd2 = $scope.helth_pro_padd2;
                    var helth_pro_pnland = $scope.helth_pro_pnland;
                    var helth_pro_pemail = $scope.helth_pro_pemail;
                    var helth_pro_nationalty = $scope.helth_pro_nationalty;
                    var helth_pro_poccupation = $scope.helth_pro_poccupation;
                    var helth_pro_incomein = $scope.helth_pro_incomein;
                    var helth_pro_ppc = $scope.helth_pro_ppc;
                    

                    // var helth_pro_bankname = $scope.helth_pro_bankname;
                    // var helth_pro_ifsc = $scope.helth_pro_ifsc;
                    // var helth_pro_bbranch = $scope.helth_pro_bbranch;
                    // var helth_pro_Aholname = $scope.helth_pro_Aholname;
                    // var helth_pro_ano = $scope.helth_pro_ano;
                    

                    var paramsArray  = {
                                        "helth_pro_fname": helth_pro_fname,
                                        "helth_pro_lname": helth_pro_lname,
                                        "helth_pro_dob": helth_pro_dob,
                                        "helth_pro_state": helth_pro_state,
                                        "helth_pro_city": helth_pro_city,
                                        "helth_pro_mobile": helth_pro_mobile,
                                        "helth_pro_gender": helth_pro_gender,
                                        "helth_pro_zip": helth_pro_zip,
                                        "helth_pro_email": helth_pro_email,
                                        "helth_pro_occupation":helth_pro_occupation,

                                        "helth_pro_add1": helth_pro_add1,
                                        "helth_pro_add2": helth_pro_add2,
                                        "helth_pro_nland":helth_pro_nland,
                                        "helth_pro_policy_start": helth_pro_policy_start,
                                        "helth_pro_title": helth_pro_title,
                                        "helth_pro_emergency": helth_pro_emergency, 
                                        "helth_pro_gstn": helth_pro_gstn, 
                                        "helth_pro_height": helth_pro_height,
                                        "helth_pro_Weight": helth_pro_Weight,
                                        

                                        "helth_pro_suffered": helth_pro_suffered,
                                        "helth_pro_diseases": helth_pro_diseases,
                                        "helth_pro_psychiatric": helth_pro_psychiatric,
                                        "helth_pro_medication": helth_pro_medication,
                                        "helth_pro_cyst": helth_pro_cyst,
                                        "helth_pro_bltest": helth_pro_bltest,
                                        "helth_pro_diabetes": helth_pro_diabetes, 
                                        "helth_pro_pregnant": helth_pro_pregnant,
                                        "helth_pro_advice": helth_pro_advice,
                                        "helth_pro_Gutka": helth_pro_Gutka,

                                        //"helth_pro_nname": helth_pro_nname,
                                        //"helth_pro_nomie_relation": helth_pro_nomie_relation,
                                        //"helth_pro_nameofappoint": helth_pro_nameofappoint,
                                        //"helth_pro_appoint_relation": helth_pro_appoint_relation,

                                        // "helth_pro_dname": helth_pro_dname,
                                        // "helth_pro_qualifi": helth_pro_qualifi,
                                        // "helth_pro_dadds": helth_pro_dadds,
                                        // "helth_pro_dmobile": helth_pro_dmobile,
                                        // "helth_pro_chmobile": helth_pro_chmobile,

                                        "helth_pro_pinsured": helth_pro_pinsured,
                                        "helth_pro_yname":helth_pro_yname,
                                        "helth_pro_drive_prirelation": helth_pro_drive_prirelation,
                                        "helth_pro_pdob": helth_pro_pdob,
                                        "helth_pro_pgender": helth_pro_pgender,    
                                        "helth_pro_padd1": helth_pro_padd1,
                                        "helth_pro_padd2": helth_pro_padd2,
                                        "helth_pro_pnland": helth_pro_pnland,
                                        "helth_pro_pemail": helth_pro_pemail,
                                        "helth_pro_nationalty": helth_pro_nationalty,
                                        "helth_pro_poccupation": helth_pro_poccupation,
                                        "helth_pro_incomein": helth_pro_incomein,
                                        "helth_pro_ppc": helth_pro_ppc,
                                        
                                        // "helth_pro_bankname": helth_pro_bankname,
                                        // "helth_pro_ifsc": helth_pro_ifsc,
                                        // "helth_pro_bbranch": helth_pro_bbranch,
                                        // "helth_pro_Aholname": helth_pro_Aholname,
                                        // "helth_pro_ano": helth_pro_ano,
                                       
                                        
                        }
            // console.log (paramsArray);

                        var url = web_url+"Quotehealth/healthProposalInfommation/";
                        $http.get(url,{params:paramsArray}).then( function(response) {

                       // console.log(response.data);
                        
                            var redirectUrl = web_url+'qms-health-proposal-view/'
                            window.location.href = redirectUrl;
                        
                    });                 

                } // if ($scope.quoteTravel.$valid) { ends here    
        } // $scope.pset = function(){ ends here   


             $scope.confirm_proposal = function() {

                var url = web_url+"Quotehealth/healthUpdateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-health-proposal-result/'
                    window.location.href = redirectUrl;
                } else {
                    //alert('Some thing went wrong, Please try again. ');
                     alert(responseData);   
                    $("#closeModel").click();
                }

            })   

        }       


    });