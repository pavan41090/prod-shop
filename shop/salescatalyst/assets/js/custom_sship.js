    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
        
        $scope.noofchildrens = '1'; 
        $scope.policytypesship = '0';
        var spousedobship = '';
        quotesship.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){

                    var web_url = $('#web_url').val();
                   // alert(web_url);

            if ($scope.quotesship.$valid) {

                  $("#load_model").click();

                var ship_mx_State = $scope.ship_mx_State;
                var ship_mx_City =$scope.ship_mx_City;
                var sship_income =$scope.sship_income;
                var sship_spouse =$scope.sship_spouse;
                var emailsupership =$scope.emailsupership
                var mobilesupership =$scope.mobilesupership;
                var policyterm =$scope.policyterm;
                var noofchildrens =$scope.noofchildrens;
               
               
                if ($('#Spouse_ship').is(":checked")) {   
                  var Spouse_ship = '1';
                  var spousedobship = $scope.spousedobcritical;
                }
                  
                var includechildren =$scope.includechildren;

                var sship_mx_Category = $scope.sship_mx_Category;
                var sship_mx_Line_of_Business = $scope.sship_mx_Line_of_Business;
                var sship_mx_HDFC_Branch_Location = $scope.sship_mx_HDFC_Branch_Location;
                var sship_mx_HDFC_Ergo_Location = $scope.sship_mx_HDFC_Ergo_Location;                                            
                var sship_mx_Priority = $scope.sship_mx_Priority;
                var sship_mx_Target_Date = $scope.sship_mx_Target_Date;
                var sship_mx_TSE_BDR_Code = $scope.sship_mx_TSE_BDR_Code;
                var sship_mx_TL_Code = $scope.sship_mx_TL_Code;
                var sship_mx_SM_Code = $scope.sship_mx_SM_Code;
                var sship_mx_Bank_Verifier_ID = $scope.sship_mx_Bank_Verifier_ID; 
                var sship_mx_Payment_Type = $scope.sship_mx_Payment_Type;
                var sship_mx_Sub_Channel = $scope.sship_mx_Sub_Channel;
                var sship_mx_HDFC_Card_Relationship_No = $scope.sship_mx_HDFC_Card_Relationship_No;
                var sship_mx_HDFC_Card_Last_4_digits = $scope.sship_mx_HDFC_Card_Last_4_digits;
                var sship_FirstName = $scope.sship_FirstName;
                var sship_LastName = $scope.sship_LastName;
                var sship_mx_DOB = $scope.sship_mx_DOB; 
                var sship_mx_Customer_Gender = $scope.sship_mx_Customer_Gender;
                var sship_mx_Case_id = $scope.sship_mx_Case_id;
                var sship_mx_PAN_Card = $scope.sship_mx_PAN_Card;
                var sship_mx_Street1 = $scope.sship_mx_Street1;
                var sship_mx_Street2 = $scope.sship_mx_Street2;
                var sship_mx_Area = $scope.sship_mx_Area;
                var includechildren = includechildren; 
                var sship_mx_Zip = $scope.sship_mx_Zip;
                var sship_Notes = $scope.sship_Notes;       
                var Spouse_ship = Spouse_ship;


                //var SShip_mobile = $scope.SShip_mobile;
                var policytypesship =$scope.policytypesship;
                
                var paramsArray  = {"ship_mx_State": ship_mx_State,
                                    "ship_mx_City": ship_mx_City,
                                    "sship_income": sship_income,
                                    "sship_spouse": sship_spouse,
                                    "emailsupership": emailsupership,
                                    "mobilesupership": mobilesupership,
                                    "policyterm": policyterm,
                                    "noofchildrens": noofchildrens,
                                    "spousedobship" : spousedobship,

                                   


                                    "sship_mx_Category": sship_mx_Category,
                                    "sship_mx_Line_of_Business": sship_mx_Line_of_Business,
                                    "sship_mx_HDFC_Branch_Location": sship_mx_HDFC_Branch_Location,
                                    "sship_mx_HDFC_Ergo_Location": sship_mx_HDFC_Ergo_Location,
                                    "sship_mx_Priority": sship_mx_Priority,
                                    "sship_mx_Target_Date": sship_mx_Target_Date,
                                    "sship_mx_TSE_BDR_Code": sship_mx_TSE_BDR_Code,
                                    "sship_mx_TL_Code": sship_mx_TL_Code,
                                    "sship_mx_SM_Code": sship_mx_SM_Code,
                                    "sship_mx_Bank_Verifier_ID": sship_mx_Bank_Verifier_ID,
                                    "sship_mx_Payment_Type": sship_mx_Payment_Type,
                                    "sship_mx_Sub_Channel": sship_mx_Sub_Channel,
                                    "sship_mx_HDFC_Card_Relationship_No": sship_mx_HDFC_Card_Relationship_No,
                                    "sship_mx_HDFC_Card_Last_4_digits": sship_mx_HDFC_Card_Last_4_digits,
                                    "sship_FirstName":sship_FirstName,
                                    "sship_LastName":sship_LastName,
                                    "sship_mx_DOB":sship_mx_DOB,
                                    "sship_mx_Customer_Gender": sship_mx_Customer_Gender,
                                    "sship_mx_Case_id": sship_mx_Case_id,   
                                    "sship_mx_PAN_Card": sship_mx_PAN_Card,
                                    "sship_mx_Street1": sship_mx_Street1,
                                    "sship_mx_Street2": sship_mx_Street2,
                                    "sship_mx_Area": sship_mx_Area,
                                   
                                    "sship_mx_Zip": sship_mx_Zip,
                                    "sship_Notes": sship_Notes,
                                   
                                    "policytypesship": policytypesship,      
                                
                    }

                    var url = web_url+"Quotesship/calculatePremiumsship/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   // console.log(response.data);
                    var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                        var redirectUrl = web_url+'sship-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

          }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });
