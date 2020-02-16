    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        
        $scope.Home_plans = '0';
      
        quoteHome.setAttribute( "autocomplete", "off" );
        var web_url = $('#web_url').val();
        $scope.pset = function(){
        // alert("anchor");      
        if ($scope.quoteHome.$valid) {
             
                $("#load_model").click();

                var Home_plans = $scope.Home_plans;
                var Home_policy_start =$scope.Home_policy_start
                var Home_policy_end =$('#Home_policy_end').val();
                var home_mobile =$scope.home_mobile
                var home_email =$scope.home_email
                
                var Home_mx_Category = $scope.Home_mx_Category;
                var Home_mx_Line_of_Business = $scope.Home_mx_Line_of_Business;
                var Home_mx_HDFC_Branch_Location = $scope.Home_mx_HDFC_Branch_Location;
                var Home_mx_HDFC_Ergo_Location = $scope.Home_mx_HDFC_Ergo_Location;                                            
                var Home_mx_Priority = $scope.Home_mx_Priority;
                var Home_mx_Target_Date = $scope.Home_mx_Target_Date;
                var Home_mx_TSE_BDR_Code = $scope.Home_mx_TSE_BDR_Code;
                var Home_mx_TL_Code = $scope.Home_mx_TL_Code;
                var Home_mx_SM_Code = $scope.Home_mx_SM_Code;
                var Home_mx_Bank_Verifier_ID = $scope.Home_mx_Bank_Verifier_ID; 
                var Home_mx_Payment_Type = $scope.Home_mx_Payment_Type;
                var Home_mx_Sub_Channel = $scope.Home_mx_Sub_Channel;
                var Home_mx_HDFC_Card_Relationship_No = $scope.Home_mx_HDFC_Card_Relationship_No;
                var Home_mx_HDFC_Card_Last_4_digits = $scope.Home_mx_HDFC_Card_Last_4_digits;
                var Home_FirstName = $scope.Home_FirstName;
                var Home_LastName = $scope.Home_LastName;
                var Home_mx_DOB = $scope.Home_mx_DOB; 
                var Home_mx_Customer_Gender = $scope.Home_mx_Customer_Gender;
                var Home_mx_Case_id = $scope.Home_mx_Case_id;
                var Home_mx_PAN_Card = $scope.Home_mx_PAN_Card;
                var Home_mx_Street1 = $scope.Home_mx_Street1;
                var Home_mx_Street2 = $scope.Home_mx_Street2;
                var Home_mx_Area = $scope.Home_mx_Area;
                var Home_mx_City = $scope.Home_mx_City;
                var Home_mx_State = $scope.Home_mx_State;
                var Home_mx_Zip = $scope.Home_mx_Zip;
                var Home_Notes = $scope.Home_Notes;       
               
                var paramsArray  = {"Home_plans": Home_plans,
                                    "Home_policy_start": Home_policy_start,
                                    "Home_policy_end": Home_policy_end,
                                    "home_mobile": home_mobile,
                                    "home_email": home_email,
                                  
                                    "Home_mx_Category": Home_mx_Category,
                                    "Home_mx_Line_of_Business": Home_mx_Line_of_Business,
                                    "Home_mx_HDFC_Branch_Location": Home_mx_HDFC_Branch_Location,
                                    "Home_mx_HDFC_Ergo_Location": Home_mx_HDFC_Ergo_Location,
                                    "Home_mx_Priority": Home_mx_Priority,
                                    "Home_mx_Target_Date": Home_mx_Target_Date,
                                    "Home_mx_TSE_BDR_Code": Home_mx_TSE_BDR_Code,
                                    "Home_mx_TL_Code": Home_mx_TL_Code,
                                    "Home_mx_SM_Code": Home_mx_SM_Code,
                                    "Home_mx_Bank_Verifier_ID": Home_mx_Bank_Verifier_ID,
                                    "Home_mx_Payment_Type": Home_mx_Payment_Type,
                                    "Home_mx_Sub_Channel": Home_mx_Sub_Channel,
                                    "Home_mx_HDFC_Card_Relationship_No": Home_mx_HDFC_Card_Relationship_No,
                                    "Home_mx_HDFC_Card_Last_4_digits": Home_mx_HDFC_Card_Last_4_digits,
                                    "Home_FirstName":Home_FirstName,
                                    "Home_LastName":Home_LastName,
                                    "Home_mx_DOB":Home_mx_DOB,
                                    "Home_mx_Customer_Gender": Home_mx_Customer_Gender,
                                    "Home_mx_Case_id": Home_mx_Case_id,   
                                    "Home_mx_PAN_Card": Home_mx_PAN_Card,
                                    "Home_mx_Street1": Home_mx_Street1,
                                    "Home_mx_Street2": Home_mx_Street2,
                                    "Home_mx_Area": Home_mx_Area,
                                    "Home_mx_City": Home_mx_City,
                                    "Home_mx_State": Home_mx_State,
                                    "Home_mx_Zip": Home_mx_Zip,
                                    "Home_Notes": Home_Notes,
                                   
                    }


                    var url = web_url+"Quotehome/calculatePremiumHome/";
                    $http.get(url,{params:paramsArray}).then( function(response) {
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                        var redirectUrl = web_url+'home-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        
                        $("#closeModel").click();
                        alert('Some thing went wrong, Please try again. ')
                    }    
                });
            }
        }; //if ($scope.quoteHome.$valid) ends here 


        

    });
    
    