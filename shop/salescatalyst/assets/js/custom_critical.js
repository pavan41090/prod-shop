    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
        $scope.includespouse = '0';
        $scope.includechildren = '0'; 
        $scope.policytypecritical = '0';
        $scope.spousedobcritical = '';
        var Spouse_critical = '0';

        quotecritical.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){

            var web_url = $('#web_url').val();
           if ($scope.quotecritical.$valid) {

                $("#load_model").click();
              
                var emailcritical =$scope.emailcritical
                var occupation =$scope.occupation

                if ($('#Spouse_critical').is(":checked")) {   
                  Spouse_critical = '1';
                  spousedobcritical = $scope.spousedobcritical;
                }
                             
                var includechildren =$scope.includechildren;

                var critical_mx_Category = $scope.critical_mx_Category;
                var critical_mx_Line_of_Business = $scope.critical_mx_Line_of_Business;
                var critical_mx_HDFC_Branch_Location = $scope.critical_mx_HDFC_Branch_Location;
                var critical_mx_HDFC_Ergo_Location = $scope.critical_mx_HDFC_Ergo_Location;                                            
                var critical_mx_Priority = $scope.critical_mx_Priority;
                var critical_mx_Target_Date = $scope.critical_mx_Target_Date;
                var critical_mx_TSE_BDR_Code = $scope.critical_mx_TSE_BDR_Code;
                var critical_mx_TL_Code = $scope.critical_mx_TL_Code;
                var critical_mx_SM_Code = $scope.critical_mx_SM_Code;
                var critical_mx_Bank_Verifier_ID = $scope.critical_mx_Bank_Verifier_ID; 
                var critical_mx_Payment_Type = $scope.critical_mx_Payment_Type;
                var critical_mx_Sub_Channel = $scope.critical_mx_Sub_Channel;
                var critical_mx_HDFC_Card_Relationship_No = $scope.critical_mx_HDFC_Card_Relationship_No;
                var critical_mx_HDFC_Card_Last_4_digits = $scope.critical_mx_HDFC_Card_Last_4_digits;
                var critical_FirstName = $scope.critical_FirstName;
                var critical_LastName = $scope.critical_LastName;
                var critical_mx_DOB = $scope.critical_mx_DOB; 
                var critical_mx_Customer_Gender = $scope.critical_mx_Customer_Gender;
                var critical_mx_Case_id = $scope.critical_mx_Case_id;
                var critical_mx_PAN_Card = $scope.critical_mx_PAN_Card;
                var critical_mx_Street1 = $scope.critical_mx_Street1;
                var critical_mx_Street2 = $scope.critical_mx_Street2;
                var critical_mx_Area = $scope.critical_mx_Area;
                var critical_mx_City = $scope.critical_mx_City;
                var critical_mx_State = $scope.critical_mx_State;
                var critical_mx_Zip = $scope.critical_mx_Zip;
                var critical_Notes = $scope.critical_Notes;       
                var emailcritical = $scope.emailcritical;
                var mobilecritical = $scope.mobilecritical;
                var policytypecritical =$scope.policytypecritical;
             
                             var paramsArray  = {
                                   
                                    "emailcritical": emailcritical,
                                    "occupation": occupation,
                                    "Spouse_critical": Spouse_critical,
                                    "spousedobcritical": spousedobcritical,
                                    "includechildren": includechildren,
                                    
                                    "critical_mx_Category": critical_mx_Category,
                                    "critical_mx_Line_of_Business": critical_mx_Line_of_Business,
                                    "critical_mx_HDFC_Branch_Location": critical_mx_HDFC_Branch_Location,
                                    "critical_mx_HDFC_Ergo_Location": critical_mx_HDFC_Ergo_Location,
                                    "critical_mx_Priority": critical_mx_Priority,
                                    "critical_mx_Target_Date": critical_mx_Target_Date,
                                    "critical_mx_TSE_BDR_Code": critical_mx_TSE_BDR_Code,
                                    "critical_mx_TL_Code": critical_mx_TL_Code,
                                    "critical_mx_SM_Code": critical_mx_SM_Code,
                                    "critical_mx_Bank_Verifier_ID": critical_mx_Bank_Verifier_ID,
                                    "critical_mx_Payment_Type": critical_mx_Payment_Type,
                                    "critical_mx_Sub_Channel": critical_mx_Sub_Channel,
                                    "critical_mx_HDFC_Card_Relationship_No": critical_mx_HDFC_Card_Relationship_No,
                                    "critical_mx_HDFC_Card_Last_4_digits": critical_mx_HDFC_Card_Last_4_digits,
                                    "critical_FirstName":critical_FirstName,
                                    "critical_LastName":critical_LastName,
                                    "critical_mx_DOB":critical_mx_DOB,
                                    "critical_mx_Customer_Gender": critical_mx_Customer_Gender,
                                    "critical_mx_Case_id": critical_mx_Case_id,   
                                    "critical_mx_PAN_Card": critical_mx_PAN_Card,
                                    "critical_mx_Street1": critical_mx_Street1,
                                    "critical_mx_Street2": critical_mx_Street2,
                                    "critical_mx_Area": critical_mx_Area,
                                    "critical_mx_City": critical_mx_City,
                                    "critical_mx_State": critical_mx_State,
                                    "critical_mx_Zip": critical_mx_Zip,
                                    "critical_Notes": critical_Notes,
                                    "emailcritical": emailcritical,
                                    "mobilecritical": mobilecritical,
                                
                    }
                    
                    var url = web_url+"QuoteCritical/calculatePremiumcritical/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   // console.log(response.data);
                    var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                        var redirectUrl = web_url+'critical-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

           }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });
