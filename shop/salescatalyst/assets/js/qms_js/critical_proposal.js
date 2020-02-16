jQuery(document).ready(function() {   
    $( function() {

        $("#ctill_pro_policy_sdate").datepicker({
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

        $scope.ctill_pro_suffered = "0";
        $scope.ctill_pro_Sonography = '0';
        $scope.ctill_pro_surgery = "0";
        $scope.ctill_pro_medication = "0";
        $scope.ctill_pro_Patient = "0";
        $scope.ctill_pro_breathing="0";
        $scope.ctill_pro_illness="0";
        $scope.ctill_pro_suffered="0";
        $scope.ctill_pro_prosemi="0";
         var web_url = $('#web_url').val();

           var url = web_url+"Quotecritical/getSessionCritical";
            $http.get(url,{params:''}).then( function(response) {
            $scope.ctill_pro_policy_sdate = response.data['ctill_pro_policy_sdate'];
            $scope.ctill_pro_fname = response.data['critical_FirstName'];
            $scope.ctill_pro_lname = response.data['critical_LastName'];
            $scope.ctill_pro_dob = response.data['critical_mx_DOB'];
            $scope.ctill_pro_city = response.data['critical_mx_City'];
            $scope.ctill_pro_state = response.data['critical_mx_State'];
            $scope.ctill_pro_mobile = response.data['mobilecritical'];
            $scope.ctill_pro_email = response.data['emailcritical'];

            $scope.ctill_prop_relationship = response.data['ctill_prop_relationship'];
            $scope.ctill_pro_title = response.data['ctill_pro_title'];
            $scope.ctill_pro_add1 = response.data['ctill_pro_add1'];
            $scope.ctill_pro_add2 = response.data['ctill_pro_add2'];
            $scope.ctill_pro_landmark = response.data['ctill_pro_landmark'];
            $scope.ctill_pro_emnum = response.data['ctill_pro_emnum'];
            $scope.ctill_pro_gstn = response.data['ctill_pro_gstn'];
            $scope.ctill_pro_yname = response.data['ctill_pro_yname'];
            $scope.ctill_pro_relation = response.data['ctill_pro_relation'];
           
           
           
            
            // var opt_stt = $('option[value="'+response.data['state']+'"]');
            // var stt_id = opt_stt.length ? opt_stt.attr('id') : 'NO OPTION';
            // updateCityDropDown(stt_id,'default');


        });       


        //quoteTravel.setAttribute("autocomplete", "off");
        $scope.proposal = function() {

            var web_url = $('#web_url').val();
        
            if ($scope.critical.$valid) {
                
                $("#load_model").click();
                var ctill_pro_policy_sdate = $scope.ctill_pro_policy_sdate;
                var ctill_pro_title = $scope.ctill_pro_title;
                var ctill_pro_fname = $scope.ctill_pro_fname;
                var ctill_pro_lname = $scope.ctill_pro_lname;
                var ctill_pro_dob = $scope.ctill_pro_dob;
                var ctill_pro_add1 = $scope.ctill_pro_add1;
                var ctill_pro_add2 = $scope.ctill_pro_add2;
                var ctill_pro_landmark = $scope.ctill_pro_landmark;
                var ctill_pro_city = $scope.ctill_pro_city;
                var ctill_pro_state = $scope.ctill_pro_state;
                var ctill_pro_mobile = $scope.ctill_pro_mobile;
                var ctill_pro_email = $scope.ctill_pro_email;
                var ctill_pro_emnum = $scope.ctill_pro_emnum;
                var ctill_pro_gstn=$scope.ctill_pro_gstn;
                var ctill_pro_yname = $scope.ctill_pro_yname;
                var ctill_pro_relation = $scope.ctill_pro_relation;
                
                

                var paramsArray  = {"ctill_pro_policy_sdate": ctill_pro_policy_sdate,
                                    "ctill_pro_title": ctill_pro_title,
                                    "ctill_pro_fname": ctill_pro_fname,
                                    "ctill_pro_lname": ctill_pro_lname,
                                    "ctill_pro_dob": ctill_pro_dob,
                                    "ctill_pro_add1": ctill_pro_add1,
                                    "ctill_pro_add2": ctill_pro_add2,
                                    "ctill_pro_landmark": ctill_pro_landmark,
                                    "ctill_pro_city": ctill_pro_city,
                                    "ctill_pro_state": ctill_pro_state,
                                    "ctill_pro_mobile": ctill_pro_mobile,
                                    "ctill_pro_email": ctill_pro_email,
                                    "ctill_pro_emnum":ctill_pro_emnum,
                                    "ctill_pro_gstn":ctill_pro_gstn,
                                    "ctill_pro_yname": ctill_pro_yname,
                                    "ctill_pro_relation": ctill_pro_relation,
                                   
                                    
                                    
                                    
                                      
                    }
                   
                   var url = web_url+"Quotecritical/ciProposalInformation/";
                        $http.get(url,{params:paramsArray}).then( function(response) {

                       // console.log(response.data);
                        
                            var redirectUrl = web_url+'qms-critical-proposal-view/'
                            window.location.href = redirectUrl;
                        
                    });                  

                } // if ($scope.quoteTravel.$valid) { ends here    
            } // $scope.pset = function(){ ends here   


            $scope.confirm_proposal = function() {
                  $('#load_modal').click();  
                var url = web_url+"Quotecritical/ciUpdateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-critical-proposal-result/'
                    window.location.href = redirectUrl;
                } else {
                    //alert('Some thing went wrong, Please try again. ');
                     alert(responseData);   
                    $("#closeModel").click();
                }

            })   

        }       

    });