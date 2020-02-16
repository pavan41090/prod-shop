    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope, $http) {
        $scope.formData = {};

        $scope.tvl_pro_vaild_passport = "0";
        $scope.tvl_pro_present_india = '0';
        $scope.tvl_pro_prosemi = "0";
        $scope.tvl_pro_engage = "0";
        $scope.tvl_pro_illness = "0";
         var web_url = $('#web_url').val();

           var url = web_url+"Quotetravel/getSessionValues";
            $http.get(url,{params:''}).then( function(response) {
            $scope.tvl_prop_relationship = response.data['travel_relationship'];
            $scope.tvl_pro_fname = response.data['travel_name'];
            $scope.tvl_pro_lname = response.data['travel_LastName'];
            $scope.tvl_pro_dob = response.data['travel_dob'];
            $scope.tvl_pro_gender = response.data['travel_gender'];
            $scope.tvl_pro_city = response.data['travel_City'];
            $scope.tvl_pro_state = response.data['travel_State'];
            $scope.tvl_pro_mobile = response.data['travel_mobile'];
            $scope.tvl_pro_email = response.data['travel_email'];


            $scope.tvl_pro_title = response.data['tvl_pro_title'];
            $scope.tvl_pro_gender = response.data['tvl_pro_gender'];
            $scope.tvl_pro_national = response.data['tvl_pro_national'];
            $scope.tvl_pro_passport_no = response.data['tvl_pro_passport_no'];
            $scope.tvl_pro_gstn = response.data['tvl_pro_gstn'];
            $scope.tvl_pro_nname = response.data['tvl_pro_nname'];
            $scope.tvl_pro_nomie_relation = response.data['tvl_pro_nomie_relation'];
            $scope.tvl_pro_add1 = response.data['tvl_pro_add1'];
            $scope.tvl_pro_add2 = response.data['tvl_pro_add2'];
            $scope.tvl_pro_landmark = response.data['tvl_pro_landmark'];
            $scope.tvl_pro_zip = response.data['tvl_pro_zip'];
           
           
            
            // var opt_stt = $('option[value="'+response.data['state']+'"]');
            // var stt_id = opt_stt.length ? opt_stt.attr('id') : 'NO OPTION';
            // updateCityDropDown(stt_id,'default');


        });       


        //quoteTravel.setAttribute("autocomplete", "off");
        $scope.proposal = function() {

            var web_url = $('#web_url').val();
        
            if ($scope.quoteTravel.$valid) {
                
                $("#load_model").click();
                var tvl_prop_relationship = $scope.tvl_prop_relationship;
                var tvl_pro_title = $scope.tvl_pro_title;
                var tvl_pro_fname = $scope.tvl_pro_fname;
                var tvl_pro_lname = $scope.tvl_pro_lname;
                var tvl_pro_dob = $scope.tvl_pro_dob;
                var tvl_pro_gender = $scope.tvl_pro_gender;
                var tvl_pro_present_india = $scope.tvl_pro_present_india;
                var tvl_pro_vaild_passport = $scope.tvl_pro_vaild_passport;
                var tvl_pro_national = $scope.tvl_pro_national;
                var tvl_pro_passport_no = $scope.tvl_pro_passport_no;
                var tvl_pro_gstn=$scope.tvl_pro_gstn;
                var tvl_pro_nname = $scope.tvl_pro_nname;
                var tvl_pro_nomie_relation = $scope.tvl_pro_nomie_relation;
                var tvl_pro_prosemi = $scope.tvl_pro_prosemi;
                var tvl_pro_engage = $scope.tvl_pro_engage;
                var tvl_pro_add1 = $scope.tvl_pro_add1;
                var tvl_pro_add2 = $scope.tvl_pro_add2;
                var tvl_pro_landmark = $scope.tvl_pro_landmark;
                var tvl_pro_zip = $scope.tvl_pro_zip;
                var tvl_pro_city = $scope.tvl_pro_city;
                var tvl_pro_state = $scope.tvl_pro_state;
                var tvl_pro_mobile = $scope.tvl_pro_mobile;
                var tvl_pro_email = $scope.tvl_pro_email;


                var paramsArray  = {"tvl_prop_relationship": tvl_prop_relationship,
                                    "tvl_pro_title": tvl_pro_title,
                                    "tvl_pro_fname": tvl_pro_fname,
                                    "tvl_pro_lname": tvl_pro_lname,
                                    "tvl_pro_dob": tvl_pro_dob,
                                    "tvl_pro_gender": tvl_pro_gender,
                                    "tvl_pro_present_india": tvl_pro_present_india,
                                    "tvl_pro_vaild_passport": tvl_pro_vaild_passport,
                                    "tvl_pro_national": tvl_pro_national,
                                    "tvl_pro_passport_no": tvl_pro_passport_no,
                                    "tvl_pro_nname": tvl_pro_nname,
                                    "tvl_pro_nomie_relation": tvl_pro_nomie_relation,
                                    "tvl_pro_prosemi": tvl_pro_prosemi,
                                    "tvl_pro_engage": tvl_pro_engage,
                                    "tvl_pro_add1": tvl_pro_add1,
                                    "tvl_pro_add2": tvl_pro_add2,
                                    "tvl_pro_landmark": tvl_pro_landmark,
                                    "tvl_pro_zip": tvl_pro_zip,
                                    "tvl_pro_city": tvl_pro_city,
                                    "tvl_pro_state": tvl_pro_state,
                                    "tvl_pro_mobile": tvl_pro_mobile,
                                    "tvl_pro_email": tvl_pro_email,
                                    "tvl_pro_gstn":tvl_pro_gstn,  
                    }
                    var url = web_url+"Quotetravel/proposalInfommation/";
                    $http.get(url,{params:paramsArray}).then( function(response) {
                    var responseData = response.data; 
                    responseData = responseData.trim();                   
                    if(responseData == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'qms-travel-proposal-view/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

                } // if ($scope.quoteTravel.$valid) { ends here    
            } // $scope.pset = function(){ ends here   


            $scope.confirm_proposal = function() {

                var url = web_url+"Quotetravel/updateProposal/";
                $http.get(url,{params: ''}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-travel-proposal-result/'
                    window.location.href = redirectUrl;
                } else {
                    //alert('Some thing went wrong, Please try again. ');
                     alert(responseData);   
                    $("#closeModel").click();
                }

            })   

        }       

    });