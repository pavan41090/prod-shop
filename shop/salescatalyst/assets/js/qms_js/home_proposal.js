jQuery(document).ready(function() {   
    $( function() {

        $("#home_pro_policy_sdate").datepicker({
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

       
         var web_url = $('#web_url').val();

           var url = web_url+"Quotehome/getSessionHome";
            $http.get(url,{params:''}).then( function(response) {
            $scope.home_pro_policy_sdate = response.data['home_pro_policy_sdate'];
            $scope.home_pro_fname = response.data['home_FirstName'];
            $scope.home_pro_lname = response.data['home_LastName'];
            $scope.home_pro_dob = response.data['home_dob'];
            $scope.home_pro_city = response.data['home_city'];
            $scope.home_pro_state = response.data['home_state'];
            $scope.home_pro_mobile = response.data['home_mobile'];
            $scope.home_pro_email = response.data['home_email'];

            
            $scope.home_pro_title = response.data['home_pro_title'];
            $scope.home_pro_add1 = response.data['home_pro_add1'];
            $scope.home_pro_add2 = response.data['home_pro_add2'];
            $scope.home_pro_landmark = response.data['home_pro_landmark'];
            $scope.home_pro_zip = response.data['home_pro_zip'];
            $scope.home_pro_gstn = response.data['home_pro_gstn'];
    
            $scope.home_occupation = response.data['home_occupation'];

             $scope.home_pro_nname = response.data['home_pro_nname'];
            $scope.home_pro_ndob = response.data['home_pro_ndob'];
             $scope.home_pro_nage = response.data['home_pro_nage'];
            $scope.home_pro_relation = response.data['home_pro_relation'];
        });       


       // PA.setAttribute("autocomplete", "off");
        $scope.proposal = function() {

            var web_url = $('#web_url').val();
        
            if ($scope.home.$valid) {
                
                $("#load_model").click();
                var home_pro_policy_sdate = $scope.home_pro_policy_sdate;
                var home_pro_title = $scope.home_pro_title;
                var home_pro_fname = $scope.home_pro_fname;
                var home_pro_lname = $scope.home_pro_lname;
                var home_pro_dob = $scope.home_pro_dob;
                var home_pro_add1 = $scope.home_pro_add1;
                var home_pro_add2 = $scope.home_pro_add2;
                var home_pro_landmark = $scope.home_pro_landmark;
                var home_pro_city = $scope.home_pro_city;
                var home_pro_state = $scope.home_pro_state;
                var home_pro_mobile = $scope.home_pro_mobile;
                var home_pro_email = $scope.home_pro_email;
                var home_pro_zip = $scope.home_pro_zip;
                var home_pro_gstn=$scope.home_pro_gstn;
                var home_pro_nname = $scope.home_pro_nname;
                var home_pro_ndob = $scope.home_pro_ndob;
                var home_pro_nage =$('#home_pro_nage').val();
                var home_pro_relation = $scope.home_pro_relation;
                var home_occupation =$scope.home_occupation;
                
                // alert(home_pro_nage);
                // exit();
                

                var paramsArray  = {"home_pro_policy_sdate": home_pro_policy_sdate,
                                    "home_pro_title": home_pro_title,
                                    "home_pro_fname": home_pro_fname,
                                    "home_pro_lname": home_pro_lname,
                                    "home_pro_dob": home_pro_dob,
                                    "home_pro_add1": home_pro_add1,
                                    "home_pro_add2": home_pro_add2,
                                    "home_pro_landmark": home_pro_landmark,
                                    "home_pro_city": home_pro_city,
                                    "home_pro_state": home_pro_state,
                                    "home_pro_mobile": home_pro_mobile,
                                    "home_pro_email": home_pro_email,
                                    "home_pro_zip":home_pro_zip,
                                    "home_pro_gstn":home_pro_gstn,
                                    "home_pro_nname": home_pro_nname,
                                    "home_pro_ndob":home_pro_ndob,
                                    "home_pro_nage":home_pro_nage,
                                    "home_pro_relation": home_pro_relation,
                                    "home_occupation" :home_occupation,

                    }
                   
                   var url = web_url+"Quotehome/homeProposalInformation/";
                        $http.get(url,{params:paramsArray}).then( function(response) {

                       // console.log(response.data);
                        
                            var redirectUrl = web_url+'qms-home-proposal-view/'
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
                var url = web_url+"Quotehome/homeUpdateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                    var responseData = response.data; 
                    responseData = responseData.trim();                   
                    if(responseData == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-home-proposal-result/'
                        window.location.href = redirectUrl;
                    } else {
                        //alert('Some thing went wrong, Please try again. ');
                        alert(responseData);   
                        $("#closeModel").click();
                    }

            })   

        }       

    });