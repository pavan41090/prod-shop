    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        $scope.expiringtwo = '0';
        $scope.typetwo = '0';
        //$scope.claimtwo = '0';
        $scope.clientType = 'Individual';
        $scope.policytypetwo = '0';
        $scope.claimtwo = '0';
          
        $scope.voluntaryDeductible = '0';
        $scope.driverLibillity = 'false';
        $scope.restrictTPPDCover = 'false';
        quoteTwo.setAttribute( "autocomplete", "off" ); 

        $scope.pset = function(){
            //alert('inside sscope');
            var web_url = $('#web_url').val();
            
            if ($scope.quoteTwo.$valid) {

                $("#load_model").click();

                var registration = $scope.tworegistrationnumber;
                var manufacture = $scope.manufacturertwo;
                var yearTw = $scope.footwo;
                var carvariant = $scope.carvariant;
                var mobiletwo = $scope.mobiletwo;
                var emailtwo = $scope.emailtwo;
                var twocity = $scope.twocity;
                var expiringtwo = $scope.expiringtwo;
                var clientType = $scope.clientType;
                var claimtwo = $scope.claimtwo; 
                var startdatetwo = $scope.startdatetwo;
                var enddatetwo = $scope.enddatetwo;
                var ncbtwo = $scope.ncbtwo;
                var mx_tenure = $scope.mx_tenure;
                var idvamount = $('#idvamount').val();
                var caramount = $('#caramount').val();
                var carState = $('#car_state').val();
                var voluntaryDeductible = $scope.voluntaryDeductible;
                var driverLibillity = $scope.driverLibillity;
                var restrictTPPDCover = $scope.restrictTPPDCover;      



                var tw_mx_Category = $scope.tw_mx_Category;
                var tw_mx_Line_of_Business = $scope.tw_mx_Line_of_Business;
                var tw_mx_HDFC_Branch_Location = $scope.tw_mx_HDFC_Branch_Location;
                var tw_mx_HDFC_Ergo_Location = $scope.tw_mx_HDFC_Ergo_Location;                                            
                var tw_mx_Priority = $scope.tw_mx_Priority;
                var tw_mx_Target_Date = $scope.tw_mx_Target_Date;
                var tw_mx_TSE_BDR_Code = $scope.tw_mx_TSE_BDR_Code;
                var tw_mx_TL_Code = $scope.tw_mx_TL_Code;
                var tw_mx_SM_Code = $scope.tw_mx_SM_Code;
                var tw_mx_Bank_Verifier_ID = $scope.tw_mx_Bank_Verifier_ID; 
                var tw_mx_Payment_Type = $scope.tw_mx_Payment_Type;
                var tw_mx_Sub_Channel = $scope.tw_mx_Sub_Channel;
                var tw_mx_HDFC_Card_Relationship_No = $scope.tw_mx_HDFC_Card_Relationship_No;
                var tw_mx_HDFC_Card_Last_4_digits = $scope.tw_mx_HDFC_Card_Last_4_digits;
                var tw_FirstName = $scope.tw_FirstName;
                var tw_LastName = $scope.tw_LastName;
                var tx_dob = $scope.tx_dob; 
                var tw_mx_Customer_Gender = $scope.tw_mx_Customer_Gender;
                var tw_mx_Case_id = $scope.tw_mx_Case_id;
                var tw_mx_PAN_Card = $scope.tw_mx_PAN_Card;
                var tw_mx_Street1 = $scope.tw_mx_Street1;
                var tw_mx_Street2 = $scope.tw_mx_Street2;
                var tw_mx_Area = $scope.tw_mx_Area;
                var tw_mx_City = $scope.tw_mx_City;
                var tw_mx_State = $scope.tw_mx_State;
                var tw_mx_Zip = $scope.tw_mx_Zip;
                var tw_Notes = $scope.tw_Notes;       
                var emailtwo = $scope.emailtwo;
                var mobiletwo = $scope.mobiletwo;
                var policytypetwo = $scope.policytypetwo;



                var paramsArray  = {"registration": registration,
                                    "manufacture": manufacture,
                                    "yearTw": yearTw,
                                    "carvariant": carvariant,
                                    "mobiletwo": mobiletwo,
                                    "emailtwo": emailtwo,
                                    "twocity": twocity,
                                    "expiringtwo": expiringtwo,
                                    "clientType": clientType,
                                    "claimtwo": claimtwo,
                                    "startdatetwo": startdatetwo,
                                    "enddatetwo": enddatetwo,
                                    "ncbtwo": ncbtwo,
                                    "mx_tenure": mx_tenure,
                                    "idvamount": idvamount,
                                    "caramount": caramount,
                                    "voluntaryDeductible": voluntaryDeductible,
                                    "driverLibillity": driverLibillity,
                                    "restrictTPPDCover": restrictTPPDCover,


                                    "tw_mx_Category": tw_mx_Category,
                                    "tw_mx_Line_of_Business": tw_mx_Line_of_Business,
                                    "tw_mx_HDFC_Branch_Location": tw_mx_HDFC_Branch_Location,
                                    "tw_mx_HDFC_Ergo_Location": tw_mx_HDFC_Ergo_Location,
                                    "tw_mx_Priority": tw_mx_Priority,
                                    "tw_mx_Target_Date": tw_mx_Target_Date,
                                    "tw_mx_TSE_BDR_Code": tw_mx_TSE_BDR_Code,
                                    "tw_mx_TL_Code": tw_mx_TL_Code,
                                    "tw_mx_SM_Code": tw_mx_SM_Code,
                                    "tw_mx_Bank_Verifier_ID": tw_mx_Bank_Verifier_ID,
                                    "tw_mx_Payment_Type": tw_mx_Payment_Type,
                                    "tw_mx_Sub_Channel": tw_mx_Sub_Channel,
                                    "tw_mx_HDFC_Card_Relationship_No": tw_mx_HDFC_Card_Relationship_No,
                                    "tw_mx_HDFC_Card_Last_4_digits": tw_mx_HDFC_Card_Last_4_digits,
                                    "tw_FirstName": tw_FirstName,
                                    "tw_LastName": tw_LastName,
                                    "tx_dob": tx_dob,
                                    "tw_mx_Customer_Gender": tw_mx_Customer_Gender,
                                    "tw_mx_Case_id": tw_mx_Case_id,   
                                    "tw_mx_PAN_Card": tw_mx_PAN_Card,
                                    "tw_mx_Street1": tw_mx_Street1,
                                    "tw_mx_Street2": tw_mx_Street2,
                                    "tw_mx_Area": tw_mx_Area,
                                    "tw_mx_City": tw_mx_City,
                                    "tw_mx_State": tw_mx_State,
                                    "tw_mx_Zip": tw_mx_Zip,
                                    "tw_Notes": tw_Notes,
                                    "emailtwo": emailtwo,
                                    "mobiletwo": mobiletwo,
                                    "policytypetwo": policytypetwo,
                                    "carState": carState,                                                                   
                                
                    }



               
                var url = web_url+"Quotetw/calculatePremiumTW/";
                $http.get(url,{params:paramsArray}).then( function(response) {
                                       
                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'two-wheeler-premium/'
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

        $scope.voluntaryDeductible = 0;
        $scope.driverLibillity = 'false';
        $scope.restrictTPPDCover = 'false';
      

        $scope.psetRecalculate = function(){
  
        var web_url = $('#web_url').val();

           
            var voluntaryDeductible = $('#voluntaryDeductible').val();
            var driverLibillity = $('#driverLibillity').val();
            var restrictTPPDCover = $('#restrictTPPDCover').val();
            


                $("#load_model").click();


                var paramsArray  = {"voluntaryDeductible": voluntaryDeductible,
                                     "driverLibillity": driverLibillity,
                                     "restrictTPPDCover": restrictTPPDCover
                                
                }





                var url = web_url+"Quotetw/calculatePremiumTWRepeate/";
                $http.get(url,{params:paramsArray}).then( function(response) {
                if(response.data == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'two-wheeler-premium/'
                    window.location.href = redirectUrl;
                } else {
                    $("#closeModel").click();
                    alert('Some thing went wrong, Please try again. ')
                }                     


                });


          
        };





    });