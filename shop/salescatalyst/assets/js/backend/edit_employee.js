	var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};

        var web_url = $('#web_url').val();
        var employeeId = $('#employeeId').val();
        var paramsArray  = {"employeeId" : employeeId};

  
        
        var url = web_url+"Backend/getEmployeeDetailById";
            $http.get(url,{params:paramsArray}).then( function(response) {
            $scope.emp_code = response.data['emp_code'];
            $scope.user_name = response.data['user_name'];
            $scope.user_email = response.data['email_address'];
            $scope.mobileuser = response.data['mobile_number'];
            $scope.user_empname = response.data['emp_name'];
            $scope.user_team = response.data['team_name'];
            $scope.user_location = response.data['loc_name'];
            $scope.user_designation = response.data['des_name'];
            $scope.user_state = response.data['state'];
            $scope.user_city = response.data['city'];
            $scope.user_region = response.data['region_name'];
            $scope.user_channel = response.data['Channel'];

            var opt_stt = $('option[value="'+response.data['state']+'"]');
            var stt_id = opt_stt.length ? opt_stt.attr('id') : 'NO OPTION';
            updateCityDropDown(stt_id,'default');


        });       
          
        $scope.user_empname = 'sdaas';

        $scope.pset = function(){
          
            if ($scope.userprofile.$valid) {
                
                $("#load_model").click();
                
                var employeeId = $('#employeeId').val();
                var emp_code=$scope.emp_code;
                var user_name=$scope.user_name;
                var user_email=$scope.user_email;
                var user_empname =$scope.user_empname;
                var user_team =$scope.user_team;
                var mobile_user =$scope.mobileuser;
                var user_designation =$scope.user_designation;
                var user_location =$scope.user_location;
                var user_state =$scope.user_state;
                var user_city =$scope.user_city;
                var user_channel =$scope.user_channel;
                var user_region = $scope.user_region;
                var opt_team = $('option[value="'+user_team+'"]');
                var team_id = opt_team.length ? opt_team.attr('id') : 'NO OPTION';
              
                var opt_desc = $('option[value="'+user_designation+'"]');
                var desc_id = opt_desc.length ? opt_desc.attr('id') : 'NO OPTION';
                
                var opt_loc = $('option[value="'+user_location+'"]');
                var loc_id = opt_loc.length ? opt_loc.attr('id') : 'NO OPTION';

                var opt_reg = $('option[value="'+user_region+'"]');
                var reg_id = opt_reg.length ? opt_reg.attr('id') : 'NO OPTION';

                var paramsArray  = {"userId" : employeeId,
                                    "emp_code" : emp_code,
                                    "user_name" : user_name,
                                    "user_email" : user_email,
                                    "user_empname" : user_empname,
                                    "user_team": team_id,
                                    "mobile_user": mobile_user,
                                    "user_designation": desc_id,
                                    "user_location": loc_id,
                                    "user_state": user_state,
                                    "user_city": user_city,
                                    "user_region": reg_id,
                                    "user_channel": Channel,
                    }

                    var url = web_url+"Backend/updateEmployee/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                    //console.log(response.data);
                    //alert(response.data.trim());
                    if(response.data.trim() == 'success') {
                        $('#alert-response').show();
                        $('#alert-response').html('Profile updated succesfully...');
                        $('#alert-response').addClass('alert-success');
                        $("#closeModel").click();
                    } else {
                        $('#alert-response').show();
                        $('#alert-response').html('Some thing went wrong, Please try again...');
                        $('#alert-response').addClass('alert-danger');
                        $("#closeModel").click();
                    }    
                });                                

            }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   


        $scope.repwd = function(){

            var web_url = $('#web_url').val();
            if ($scope.resetpwd.$valid) {

                $("#load_model").click();
                var reset_currentpwd = $scope.reset_currentpwd;
                var reset_newpwd =$scope.reset_newpwd;
               
                var paramsArray  = {
                            "reset_currentpwd": reset_currentpwd,
                            "reset_newpwd": reset_newpwd,
                    }

                    var url = web_url+"User/resetPasswordUpdate/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   // console.log(response.data);
                    if(response.data == 'success') {
                        $('#alert-response').show();
                        $('#alert-response').html('Succesfully updated...');
                        $('#alert-response').addClass('alert-success');
                        //alert('Succesfully posted values');
                        //$("#closeModel").click();
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

            }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   





    });




jQuery(document).ready(function() { 
    //alert('Page Loaded...');
    $("#user_state").on('change', function() {
        var state_id = $(this).val();
        var opt_stt = $('option[value="'+state_id+'"]');
        var stt_id = opt_stt.length ? opt_stt.attr('id') : 'NO OPTION';
        updateCityDropDown(stt_id,'');
    });    
});

    function updateCityDropDown(stt_id,type){

        var webUbrl = $('#web_url').val();
        var URL = webUbrl+'Commoncontrol/getCityByStateID/';
        $.ajax({

            url : URL,
            type : 'POST',
            data : {'state_id' : stt_id},
            dataType:'json',
            success: function( data){
                if(type !== 'default') {
                    $('#city-div').hide();      
                    $('#city-loader').show();
                    $('#user_city').val('');
                    $("#user_city").attr("placeholder", "Select City");
                }
                $('#city').find('option')
                      .remove()
                      .end()
                      .append('<option value="">Select city</option>')
                      .val('');
                             
                $.each(data, function(key, value) {
                    $('#city').append($("<option></option>")
                               .attr("value",value['id'])
                               .text(value['name']));
                            
                });  
                setTimeout(function(){ 
                    $('#city-div').show();      
                    $('#city-loader').hide();
                }, 1500); 
            },
        });
    }





    