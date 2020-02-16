	var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
       
        $scope.policyType = '0';
        $scope.Type_of_Trip = '0'; 
        $scope.covertype = '0';
        $scope.maxpertrip='0';
        $scope.typeoftrip='0';
        $scope.maxpertrip='thirtydays';
        quoteTravel.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){

                    var web_url = $('#web_url').val();
                   // alert(web_url);

            if ($scope.quoteTravel.$valid) {

                  $("#load_model").click();

                var policyType = $scope.policyType;
                var TypeofTrip =$scope.typeoftrip;
                var departdate =$scope.departdate;
                var returndate =$scope.returndate;
                var tripduration =$('#tripduration').val();
                var covertype =$scope.covertype;
                var maxpertrip =$scope.maxpertrip;
                var traveltype =$scope.traveltype;
                var geographical =$scope.geographical;
                var relationship =$scope.relationship;
                var datebirth =$scope.datebirth;
                var age = $('#age').val();
              

                var relationship_1 =$scope.relationship_1;
                var datebirth_1 =$scope.datebirth_1;
                var age_1 =$('#age_1').val();
                var relationship_2 =$scope.relationship_2;
                var datebirth_2 =$scope.datebirth_2;
                var age_2 =$('#age_2').val();

                var relationship_3 =$scope.relationship_3;
                var datebirth_3 =$scope.datebirth_3;
                var age_3 =$('#age_3').val();

                var nametravel =$scope.nametravel;
                var emailtravel =$scope.emailtravel;
                var mobiletravel =$scope.mobiletravel;  

                var travel_mx_Category = $scope.travel_mx_Category;
                var travel_mx_Line_of_Business = $scope.travel_mx_Line_of_Business;
                var travel_mx_HDFC_Branch_Location = $scope.travel_mx_HDFC_Branch_Location;
                var travel_mx_HDFC_Ergo_Location = $scope.travel_mx_HDFC_Ergo_Location;                                            
                var travel_mx_Priority = $scope.travel_mx_Priority;
                var travel_mx_Target_Date = $scope.travel_mx_Target_Date;
                var travel_mx_TSE_BDR_Code = $scope.travel_mx_TSE_BDR_Code;
                var travel_mx_TL_Code = $scope.travel_mx_TL_Code;
                var travel_mx_SM_Code = $scope.travel_mx_SM_Code;
                var travel_mx_Bank_Verifier_ID = $scope.travel_mx_Bank_Verifier_ID; 
                var travel_mx_Payment_Type = $scope.travel_mx_Payment_Type;
                var travel_mx_Sub_Channel = $scope.travel_mx_Sub_Channel;
                var travel_mx_HDFC_Card_Relationship_No = $scope.travel_mx_HDFC_Card_Relationship_No;
                var travel_mx_HDFC_Card_Last_4_digits = $scope.travel_mx_HDFC_Card_Last_4_digits;
                var travel_FirstName = $scope.travel_FirstName;
                var travel_LastName = $scope.travel_LastName;
                var travel_dob = $scope.date_birth; 
                var travel_mx_Customer_Gender = $scope.travel_mx_Customer_Gender;
                var travel_mx_Case_id = $scope.travel_mx_Case_id;
                var travel_mx_PAN_Card = $scope.travel_mx_PAN_Card;
                var travel_mx_Street1 = $scope.travel_mx_Street1;
                var travel_mx_Street2 = $scope.travel_mx_Street2;
                var travel_mx_Area = $scope.travel_mx_Area;
                var travel_mx_City = $scope.travel_mx_City;
                var travel_mx_State = $scope.travel_mx_State;
                var travel_mx_Zip = $scope.travel_mx_Zip;
                var travel_Notes = $scope.travel_Notes;       
                var emailtravel = $scope.emailtravel;
                var mobiletravel = $scope.mobiletravel;
                var policytypetravel = '';
                
                var paramsArray  = {"policyType": policyType,
                                    "TypeofTrip": TypeofTrip,
                                    "departdate": departdate,
                                    "returndate": returndate,
                                    "tripduration": tripduration,
                                    "covertype": covertype,
                                    "maxpertrip": maxpertrip,
                                    "traveltype": traveltype,
                                    "geographical": geographical,
                                    "relationship": relationship,
                                    "datebirth": datebirth,
                                    "age": age,

                                    "relationship_1": relationship_1,
                                    "datebirth_1": datebirth_1,
                                    "age_1": age_1,
                                    "relationship_2": relationship_2,
                                    "datebirth_2": datebirth_2,
                                    "age_2": age_2,

                                    "relationship_3": relationship_3,
                                    "datebirth_3": datebirth_3,
                                    "age_3": age_3,
                                    "nametravel": nametravel,
                                    "emailtravel": emailtravel,
                                    "mobiletravel": mobiletravel,


                                     "travel_mx_Category": travel_mx_Category,
                                    "travel_mx_Line_of_Business": travel_mx_Line_of_Business,
                                    "travel_mx_HDFC_Branch_Location": travel_mx_HDFC_Branch_Location,
                                    "travel_mx_HDFC_Ergo_Location": travel_mx_HDFC_Ergo_Location,
                                    "travel_mx_Priority": travel_mx_Priority,
                                    "travel_mx_Target_Date": travel_mx_Target_Date,
                                    "travel_mx_TSE_BDR_Code": travel_mx_TSE_BDR_Code,
                                    "travel_mx_TL_Code": travel_mx_TL_Code,
                                    "travel_mx_SM_Code": travel_mx_SM_Code,
                                    "travel_mx_Bank_Verifier_ID": travel_mx_Bank_Verifier_ID,
                                    "travel_mx_Payment_Type": travel_mx_Payment_Type,
                                    "travel_mx_Sub_Channel": travel_mx_Sub_Channel,
                                    "travel_mx_HDFC_Card_Relationship_No": travel_mx_HDFC_Card_Relationship_No,
                                    "travel_mx_HDFC_Card_Last_4_digits": travel_mx_HDFC_Card_Last_4_digits,
                                    "travel_FirstName": travel_FirstName,
                                    "travel_LastName": travel_LastName,
                                    "travel_dob": date_birth,
                                    "travel_mx_Customer_Gender": travel_mx_Customer_Gender,
                                    "travel_mx_Case_id": travel_mx_Case_id,   
                                    "travel_mx_PAN_Card": travel_mx_PAN_Card,
                                    "travel_mx_Street1": travel_mx_Street1,
                                    "travel_mx_Street2": travel_mx_Street2,
                                    "travel_mx_Area": travel_mx_Area,
                                    "travel_mx_City": travel_mx_City,
                                    "travel_mx_State": travel_mx_State,
                                    "travel_mx_Zip": travel_mx_Zip,
                                    "travel_Notes": travel_Notes,
                                    "emailtravel": emailtravel,
                                    "mobiletravel": mobiletravel,
                                    "policytypetravel": policytypetravel      
                                
                    }

                    var url = web_url+"Quotetravel/calculatePremiumTravel/";
                    $http.get(url,{params:paramsArray}).then( function(response) {

                   var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                        var redirectUrl = web_url+'travel-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        alert('Some thing went wrong, Please try again. ');
                        $("#closeModel").click();
                    }    
                });                                

            }// if ($scope.quoteTravel.$valid) { ends here    
        }// $scope.pset = function(){ ends here   
    });
