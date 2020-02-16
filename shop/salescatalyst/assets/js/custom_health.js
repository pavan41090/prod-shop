    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
        $scope.includespouse = '0';
        $scope.includechildren = '0'; 
        $scope.policytypehealth = '0';
        $scope.spousedobhealth = '';
        var Spouse_health = '0';

        quoteHealth.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){

            var web_url = $('#web_url').val();
            if ($scope.quoteHealth.$valid) {

                $("#load_model").click();
              
                var emailhealth =$scope.emailhealth
                var occupation =$scope.occupation

                if ($('#Spouse_health').is(":checked")) {   
                  Spouse_health = '1';
                  spousedobhealth = $scope.spousedobhealth;
                }
                             
                var includechildren =$scope.includechildren;

                var health_mx_Category = $scope.health_mx_Category;
                var health_mx_Line_of_Business = $scope.health_mx_Line_of_Business;
                var health_mx_HDFC_Branch_Location = $scope.health_mx_HDFC_Branch_Location;
                var health_mx_HDFC_Ergo_Location = $scope.health_mx_HDFC_Ergo_Location;                                            
                var health_mx_Priority = $scope.health_mx_Priority;
                var health_mx_Target_Date = $scope.health_mx_Target_Date;
                var health_mx_TSE_BDR_Code = $scope.health_mx_TSE_BDR_Code;
                var health_mx_TL_Code = $scope.health_mx_TL_Code;
                var health_mx_SM_Code = $scope.health_mx_SM_Code;
                var health_mx_Bank_Verifier_ID = $scope.health_mx_Bank_Verifier_ID; 
                var health_mx_Payment_Type = $scope.health_mx_Payment_Type;
                var health_mx_Sub_Channel = $scope.health_mx_Sub_Channel;
                var health_mx_HDFC_Card_Relationship_No = $scope.health_mx_HDFC_Card_Relationship_No;
                var health_mx_HDFC_Card_Last_4_digits = $scope.health_mx_HDFC_Card_Last_4_digits;
                var health_FirstName = $scope.health_FirstName;
                var health_LastName = $scope.health_LastName;
                var health_mx_DOB = $scope.health_mx_DOB; 
                var health_mx_Customer_Gender = $scope.health_mx_Customer_Gender;
                var health_mx_Case_id = $scope.health_mx_Case_id;
                var health_mx_PAN_Card = $scope.health_mx_PAN_Card;
                var health_mx_Street1 = $scope.health_mx_Street1;
                var health_mx_Street2 = $scope.health_mx_Street2;
                var health_mx_Area = $scope.health_mx_Area;
                var health_mx_City = $scope.health_mx_City;
                var health_mx_State = $scope.health_mx_State;
                var health_mx_Zip = $scope.health_mx_Zip;
                var health_Notes = $scope.health_Notes;       
                var emailhealth = $scope.emailhealth;
                var mobilehealth = $scope.mobilehealth;
                var policytypehealth =$scope.policytypehealth;
             
                             var paramsArray  = {
                                   
                                    "emailhealth": emailhealth,
                                    "occupation": occupation,
                                    "Spouse_health": Spouse_health,
                                    "spousedobhealth": spousedobhealth,
                                    "includechildren": includechildren,
                                    
                                    "health_mx_Category": health_mx_Category,
                                    "health_mx_Line_of_Business": health_mx_Line_of_Business,
                                    "health_mx_HDFC_Branch_Location": health_mx_HDFC_Branch_Location,
                                    "health_mx_HDFC_Ergo_Location": health_mx_HDFC_Ergo_Location,
                                    "health_mx_Priority": health_mx_Priority,
                                    "health_mx_Target_Date": health_mx_Target_Date,
                                    "health_mx_TSE_BDR_Code": health_mx_TSE_BDR_Code,
                                    "health_mx_TL_Code": health_mx_TL_Code,
                                    "health_mx_SM_Code": health_mx_SM_Code,
                                    "health_mx_Bank_Verifier_ID": health_mx_Bank_Verifier_ID,
                                    "health_mx_Payment_Type": health_mx_Payment_Type,
                                    "health_mx_Sub_Channel": health_mx_Sub_Channel,
                                    "health_mx_HDFC_Card_Relationship_No": health_mx_HDFC_Card_Relationship_No,
                                    "health_mx_HDFC_Card_Last_4_digits": health_mx_HDFC_Card_Last_4_digits,
                                    "health_FirstName":health_FirstName,
                                    "health_LastName":health_LastName,
                                    "health_mx_DOB":health_mx_DOB,
                                    "health_mx_Customer_Gender": health_mx_Customer_Gender,
                                    "health_mx_Case_id": health_mx_Case_id,   
                                    "health_mx_PAN_Card": health_mx_PAN_Card,
                                    "health_mx_Street1": health_mx_Street1,
                                    "health_mx_Street2": health_mx_Street2,
                                    "health_mx_Area": health_mx_Area,
                                    "health_mx_City": health_mx_City,
                                    "health_mx_State": health_mx_State,
                                    "health_mx_Zip": health_mx_Zip,
                                    "health_Notes": health_Notes,
                                    "emailhealth": emailhealth,
                                    "mobilehealth": mobilehealth,
                                
                    }
                    
                    var url = web_url+"Quotehealth/calculatePremiumHealth/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   // console.log(response.data);
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                        var redirectUrl = web_url+'health-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

           }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });
