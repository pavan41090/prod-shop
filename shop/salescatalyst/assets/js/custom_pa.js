    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        $scope.expiringtwo = '0';
        $scope.typetwo = '0';
        $scope.claimtwo = '0';
        $scope.clientType = 'Individual';
        $scope.voluntaryDeductible = '0';
        $scope.driverLibillity = 'false';
        $scope.restrictTPPDCover = 'false';

        quotepa.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){
           
            var web_url = $('#web_url').val();
           
            if ($scope.quotepa.$valid) {

                $("#load_model").click();

                
                 
                var pa_state = $scope.pa_state;
                var pa_city = $scope.pa_city;
                var occupation =$scope.occupation;
                var gainful =$scope.gainful;
                var emailpa =$scope.emailpa;
                var pamobile =$scope.pamobile;



                var pa_mx_Category = $scope.pa_mx_Category;
                var pa_mx_Line_of_Business = $scope.pa_mx_Line_of_Business;
                var pa_mx_HDFC_Branch_Location = $scope.pa_mx_HDFC_Branch_Location;
                var pa_mx_HDFC_Ergo_Location = $scope.pa_mx_HDFC_Ergo_Location;                                            
                var pa_mx_Priority = $scope.pa_mx_Priority;
                var pa_mx_Target_Date = $scope.pa_mx_Target_Date;
                var pa_mx_TSE_BDR_Code = $scope.pa_mx_TSE_BDR_Code;
                var pa_mx_TL_Code = $scope.pa_mx_TL_Code;
                var pa_mx_SM_Code = $scope.pa_mx_SM_Code;
                var pa_mx_Bank_Verifier_ID = $scope.pa_mx_Bank_Verifier_ID; 
                var pa_mx_Payment_Type = $scope.pa_mx_Payment_Type;
                var pa_mx_Sub_Channel = $scope.pa_mx_Sub_Channel;
                var pa_mx_HDFC_Card_Relationship_No = $scope.pa_mx_HDFC_Card_Relationship_No;
                var pa_mx_HDFC_Card_Last_4_digits = $scope.pa_mx_HDFC_Card_Last_4_digits;
                var pa_FirstName = $scope.pa_FirstName;
                var pa_LastName = $scope.pa_LastName;
                var pa_dob = $scope.pa_mx_DOB; 
                //alert('dob--'+pa_dob);
                var pa_mx_Customer_Gender = $scope.pa_mx_Customer_Gender;
                var pa_mx_Case_id = $scope.pa_mx_Case_id;
                var pa_mx_PAN_Card = $scope.pa_mx_PAN_Card;
                var pa_mx_Street1 = $scope.pa_mx_Street1;
                var pa_mx_Street2 = $scope.pa_mx_Street2;
                var pa_mx_Area = $scope.pa_mx_Area;
                var pa_mx_Zip = $scope.pa_mx_Zip;
                var pa_Notes = $scope.pa_Notes;       
                var emailpa = $scope.emailpa;
                var mobilepa = $scope.mobilepa;
               



                var paramsArray  = {"pa_state": pa_state,
                                    "pa_city": pa_city,
                                    "occupation": occupation,
                                    "gainful": gainful,
                                    "emailpa": emailpa,
                                    "pamobile": pamobile,
                                    "pa_mx_Category": pa_mx_Category,
                                    "pa_mx_Line_of_Business": pa_mx_Line_of_Business,
                                    "pa_mx_HDFC_Branch_Location": pa_mx_HDFC_Branch_Location,
                                    "pa_mx_HDFC_Ergo_Location": pa_mx_HDFC_Ergo_Location,
                                    "pa_mx_Priority": pa_mx_Priority,
                                    "pa_mx_Target_Date": pa_mx_Target_Date,
                                    "pa_mx_TSE_BDR_Code": pa_mx_TSE_BDR_Code,
                                    "pa_mx_TL_Code": pa_mx_TL_Code,
                                    "pa_mx_SM_Code": pa_mx_SM_Code,
                                    "pa_mx_Bank_Verifier_ID": pa_mx_Bank_Verifier_ID,
                                    "pa_mx_Payment_Type": pa_mx_Payment_Type,
                                    "pa_mx_Sub_Channel": pa_mx_Sub_Channel,
                                    "pa_mx_HDFC_Card_Relationship_No": pa_mx_HDFC_Card_Relationship_No,
                                    "pa_mx_HDFC_Card_Last_4_digits": pa_mx_HDFC_Card_Last_4_digits,
                                    "pa_FirstName": pa_FirstName,
                                    "pa_LastName": pa_LastName,
                                    "pa_dob": pa_dob,
                                    "pa_mx_Customer_Gender": pa_mx_Customer_Gender,
                                    "pa_mx_Case_id": pa_mx_Case_id,   
                                    "pa_mx_PAN_Card": pa_mx_PAN_Card,
                                    "pa_mx_Street1": pa_mx_Street1,
                                    "pa_mx_Street2": pa_mx_Street2,
                                    "pa_mx_Area": pa_mx_Area,
                                    "pa_mx_Zip": pa_mx_Zip,
                                    "pa_Notes": pa_Notes,
                                    "emailpa": emailpa,
                                    "mobilepa": mobilepa,
                                                                                 
                                
                    }

               
                var url = web_url+"Quotepa/calculatePremiumpa/";
                $http.get(url,{params:paramsArray}).then( function(response) {
                                       
               var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
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
      

        // $scope.psetRecalculate = function(){
 
           
        //     var voluntaryDeductible = $scope.voluntaryDeductible;
        //     var driverLibillity = $scope.driverLibillity;
        //     var restrictTPPDCover = $scope.restrictTPPDCover;
            
        //    // alert(voluntaryDeductible); 
        //    // alert('am in re..');

        //         $("#load_model").click();


        //         var paramsArray  = {"voluntaryDeductible": voluntaryDeductible,
        //                              "driverLibillity": driverLibillity,
        //                              "restrictTPPDCover": restrictTPPDCover
                                
        //         }



        //         var url = "http://localhost/bhartiAXA-NEW/quotepa/calculatePremiumpa/";

        //         $http.get(url,{params:paramsArray}).then( function(response) {
                   
        //              console.log(response.data);
        //              var redirectUrl = 'http://localhost/bhartiAXA-NEW/pa-premium/'
        //              window.location.href = redirectUrl;
        //         });


          
        // };



 $scope.saveLead = function(){

            alert('leads');   


            var leadString = $('#leadString').val();
            alert(leadString); 
            $('#load_modal').click();
            $.ajax({
              url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Create?accessKey=u$r3c4de58f6a402ca29db52c2428a78049&secretKey=56c63ad69633990d029bdfe874bba1d9809b2d87',
                dataType: 'json',
                type: 'post',       
                contentType: 'application/json',
                data: leadString,
                processData: false,
                success: function( data){
                    var dataArray =  JSON.stringify(data);
                    var parsedArray = JSON.parse(dataArray);
                    var statusResponse = parsedArray.Status;
                    var ProspectId = parsedArray.Message.Id
                    alert (statusResponse +' Refrence Id is : '+ ProspectId);
                    $('#ProspectId').val(ProspectId);
                    //$( "#re-calculate" ).trigger( "click" );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    $('#load_modal').click();

                    var dataArray =  JSON.stringify(jqXhr);
                    var jsonArray = JSON.parse(dataArray);
                    var statusResponse = JSON.parse(jsonArray.responseText).Status;
                    var ExceptionType = JSON.parse(jsonArray.responseText).ExceptionMessage;
                    alert(statusResponse+' - '+ExceptionType);

                }
            });
                        

           // $scope.reCalculate();



        }    

 

    });