jQuery(document).ready(function() {   
    $( function() {

        $("#pa_pro_policy_sdate").datepicker({
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

        $scope.pa_pro_suffered = "0";
        $scope.pa_pro_Sonography = '0';
        $scope.pa_pro_surgery = "0";
        $scope.pa_pro_medication = "0";
        $scope.pa_pro_Patient = "0";
        $scope.pa_pro_breathing="0";
        $scope.pa_pro_illness="0";
        $scope.pa_pro_suffered="0";
        $scope.pa_pro_prosemi="0";
         var web_url = $('#web_url').val();

           var url = web_url+"Quotepa/getSessionPa";
            $http.get(url,{params:''}).then( function(response) {
            $scope.pa_pro_policy_sdate = response.data['pa_pro_policy_sdate'];
            $scope.pa_pro_fname = response.data['pa_FirstName'];
            $scope.pa_pro_lname = response.data['pa_LastName'];
            $scope.pa_pro_dob = response.data['pa_dob'];
            $scope.pa_pro_city = response.data['pa_city'];
            $scope.pa_pro_state = response.data['pa_state'];
            $scope.pa_pro_mobile = response.data['pa_mobile'];
            $scope.pa_pro_email = response.data['pa_email'];

            
            $scope.pa_pro_title = response.data['pa_pro_title'];
            $scope.pa_pro_houseno = response.data['pa_pro_houseno'];
            $scope.pa_pro_locality = response.data['pa_pro_locality'];
            $scope.pa_pro_landmark = response.data['pa_pro_landmark'];
            $scope.pa_pro_emnum = response.data['pa_pro_emnum'];
            $scope.pa_pro_gstn = response.data['pa_pro_gstn'];
    // alert(response.data['pa_occupation']);
    // alert(response.data['pa_state']);
    // alert(response.data['pa_city']);

            $scope.pa_occupation = response.data['pa_occupation'];

            //var opt_occ = $('option[value="'+response.data['pa_occupation']+'"]');
            //var occ_pa = opt_occ.length ? opt_occ.attr('id') : 'NO OPTION';


        
       //alert(occ_pa);

          //  $scope.pa_occupation = occ_pa;

            $scope.pa_pro_nname = response.data['pa_pro_nname'];
            $scope.pa_pro_ndob = response.data['pa_pro_ndob'];
            $scope.pa_pro_relation = response.data['pa_pro_relation'];
        });       


       // PA.setAttribute("autocomplete", "off");
        $scope.proposal = function() {

            var web_url = $('#web_url').val();
        
            if ($scope.PA.$valid) {
                
                $("#load_model").click();
                var pa_pro_policy_sdate = $scope.pa_pro_policy_sdate;
                var pa_pro_title = $scope.pa_pro_title;
                var pa_pro_fname = $scope.pa_pro_fname;
                var pa_pro_lname = $scope.pa_pro_lname;
                var pa_pro_dob = $scope.pa_pro_dob;
                var pa_pro_houseno = $scope.pa_pro_houseno;
                var pa_pro_locality = $scope.pa_pro_locality;
                var pa_pro_landmark = $scope.pa_pro_landmark;
                var pa_pro_city = $scope.pa_pro_city;
                var pa_pro_state = $scope.pa_pro_state;
                var pa_pro_mobile = $scope.pa_pro_mobile;
                var pa_pro_email = $scope.pa_pro_email;
                var pa_pro_emnum = $scope.pa_pro_emnum;
                var pa_pro_gstn=$scope.pa_pro_gstn;
                var pa_pro_nname = $scope.pa_pro_nname;
                var pa_pro_ndob = $scope.pa_pro_ndob;
                var pa_pro_relation = $scope.pa_pro_relation;
                
                

                var paramsArray  = {"pa_pro_policy_sdate": pa_pro_policy_sdate,
                                    "pa_pro_title": pa_pro_title,
                                    "pa_pro_fname": pa_pro_fname,
                                    "pa_pro_lname": pa_pro_lname,
                                    "pa_pro_dob": pa_pro_dob,
                                    "pa_pro_houseno": pa_pro_houseno,
                                    "pa_pro_locality": pa_pro_locality,
                                    "pa_pro_landmark": pa_pro_landmark,
                                    "pa_pro_city": pa_pro_city,
                                    "pa_pro_state": pa_pro_state,
                                    "pa_pro_mobile": pa_pro_mobile,
                                    "pa_pro_email": pa_pro_email,
                                    "pa_pro_emnum":pa_pro_emnum,
                                    "pa_pro_gstn":pa_pro_gstn,
                                    "pa_pro_nname": pa_pro_nname,
                                    "pa_pro_ndob":pa_pro_ndob,
                                    "pa_pro_relation": pa_pro_relation,
                    }
                   
                   var url = web_url+"Quotepa/paProposalInformation/";
                        $http.get(url,{params:paramsArray}).then( function(response) {

                       // console.log(response.data);
                        
                            var redirectUrl = web_url+'qms-pa-proposal-view/'
                            window.location.href = redirectUrl;
                        
                    });                  

                } // if ($scope.quoteTravel.$valid) { ends here    
            } // $scope.pset = function(){ ends here   


            $scope.confirm_proposal = function() {

                if (!($('.verDocOpt').is(':checked'))) {
                    alert("Please select the verified documents/option");
                    return false;
                }


                $('#load_modal').click();  
                var url = web_url+"Quotepa/paUpdateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                    var responseData = response.data; 
                    responseData = responseData.trim();                   
                    if(responseData == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-pa-proposal-result/'
                        window.location.href = redirectUrl;
                    } else {
                        //alert('Some thing went wrong, Please try again. ');
                        alert(responseData);   
                        $("#closeModel").click();
                    }

            })   

        }       

    });