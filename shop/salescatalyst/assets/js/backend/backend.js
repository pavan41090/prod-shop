    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       

 
        $scope.pset = function(){
           
            var web_url = $('#web_url').val();
           
            if ($scope.userprofile.$valid) {

                $("#load_model").click();

                
                 
                var emp_code = $scope.emp_code;
                var user_name = $scope.user_name;
                var user_email =$scope.user_email;
                var user_empname =$scope.user_empname;
                var mobileuser =$scope.mobileuser;
                var user_designation =$scope.user_designation;
                var user_team = $scope.user_team;
                var user_location = $scope.user_location;
                var user_state = $scope.user_state;
                var user_city = $scope.user_city;                                            
                var user_region = $scope.user_region;
                var user_channel = $scope.user_channel;
               
               



                var paramsArray  = {"emp_code": emp_code,
                                    "user_name": user_name,
                                    "user_email": user_email,
                                    "user_empname": user_empname,
                                    "mobileuser": mobileuser,
                                    "user_designation": user_designation,
                                    "user_team": user_team,
                                    "user_location": user_location,
                                    "user_state": user_state,
                                    "user_city": user_city,
                                    "user_channel" :user_channel,
                                    "user_region": user_region

                                                                                 
                                
                    }

            console.log(paramsArray);
                var url = web_url+"Backend/addEmployee";
                $http.get(url,{params:paramsArray}).then( function(response) {
                                       
                if(response.data == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'pa-premium/'
                    window.location.href = redirectUrl;
                } else {
                    
                    $("#closeModel").click();
                    alert('Some thing went wrong, Please try again. ')
                }                     


                });


            }
        };

    });





   app.controller('MainCtrlRe', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        $scope.voluntaryDeductible = '0';
        $scope.driverLibillity = 'false';
        $scope.restrictTPPDCover = 'false';
      

        



 
 

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
