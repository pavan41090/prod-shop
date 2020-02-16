    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        
        var web_url = $('#web_url').val();

        $scope.forgotpass = function(){
          // alert('clicked');

            if ($scope.forgot_pass.$valid) {

                var forgotEmail = $scope.forgot_email;
                var paramsArray  = {"forgotEmail": forgotEmail}
                var url = web_url+"User/forgotPassword/";

                console.log("coming");
                $http.get(url,{params:paramsArray}).then( function(response) {
                               console.log("method is working");
                if(response.data == 'success') {
                    console.log("method is working")
                    alert('Succesfully posted values');
                    //var redirectUrl = web_url+'two-wheeler-premium/'
                    //window.location.href = redirectUrl;
                } else {
                    //console.log("value is not value is working")
                    $("#closeModel").click();
                    alert('Some thing went wrong, Please try again. ')
                }                     


                });

            }    

        }// if ($scope.quoteTravel.$valid) { ends here   


        $scope.updatePass = function(){

            if ($scope.update_pass.$valid) {    

                update_pass
                alert('update');
            

                var newpassword = $scope.newpassword;
                var newpassword = $scope.confirmpassword;


                var paramsArray  = {"newpassword": newpassword}
                var url = web_url+"User/updatePassword/";
                $http.get(url,{params:paramsArray}).then( function(response) {
                                       
                if(response.data == 'success') {
                    //alert('Password updated succesfully');
                    var responseString = 'Password updated succesfully, Please <a href="">CLICK HERE</a> for login '; 
                } else {
                    var responseString = 'Link has  been  expired, Please <a href="">CLICK HERE</a> for another link'; 
                }                     
                    $('#response-message').html(responseString);

                });




            } //if ($scope.forgot_pass.$valid) { ends here 
        }//  $scope.updatePass = function(){ ends here..
        
    });
