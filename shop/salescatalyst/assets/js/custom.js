

jQuery(document).ready(function() {    
 
    $( function() {
        $( "#datepicker2w" ).datepicker({
            changeMonth: true,
            changeYear: true,
            //dateFormat: "dd/mm/yy",
            yearRange: "-10:+00"
        });
        $( "#datepickercar" ).datepicker({
            changeMonth: true,
            changeYear: true,
            //dateFormat: "dd/mm/yy",
            yearRange: "-10:+00"
        });
        
    });

    $('input:radio[name="claimpolicy"]').change(function() {
        if ($(this).val()=='Yes') {
            $('#ncb2w').attr('disabled',true);
        } else  {
            $('#ncb2w').removeAttr('disabled');
        }
    })

    $('input:radio[name="expiringcar"]').change(function() {
        if ($(this).val()=='Yes') { 
         $('#ncbcar').attr('disabled',true);
        } else{
            $('#ncbcar').removeAttr('disabled');
        }
    })
});





    var app = angular.module('plunker', ['ngMessages']);

        

             app.controller('myCtrl', function($scope,$http) {
                 $scope.formData = {};
                 $scope.policytypecar = 'corporate';
                 $scope.caroptionsRadios = '0';
                 $scope.expiringcar='0';
                  quoteCar.setAttribute( "autocomplete", "off" ); 
                 $scope.pset = function(){

                    var web_url = $('#web_url').val();
                    //alert(web_url);
                    
                     if ($scope.quoteCar.$valid) {
                        
                        $("#load_model").click();
                        
                        var mx_Category = $scope.mx_Category;
                        var mx_Line_of_Business = $scope.mx_Line_of_Business;
                        var mx_HDFC_Branch_Location = $scope.mx_HDFC_Branch_Location;
                        var mx_HDFC_Ergo_Location = $scope.mx_HDFC_Ergo_Location;
                        var mx_Priority = $scope.mx_Priority;
                        var mx_Target_Date = $scope.mx_Target_Date;
                        var mx_TSE_BDR_Code = $scope.mx_TSE_BDR_Code;
                        var mx_TL_Code = $scope.mx_TL_Code;
                        var mx_SM_Code = $scope.mx_SM_Code;
                        var mx_Bank_Verifier_ID = $scope.mx_Bank_Verifier_ID;
                        var mx_Payment_Type = $scope.mx_Payment_Type;
                        var mx_Sub_Channel = $scope.mx_Sub_Channel;
                        var mx_HDFC_Card_Relationship_No = $scope.mx_HDFC_Card_Relationship_No;
                        var mx_HDFC_Card_Last_4_digits = $scope.mx_HDFC_Card_Last_4_digits;
                        var FirstName = $scope.FirstName;
                        var LastName = $scope.LastName;
                        var mx_DOB = $scope.mx_DOB;
                        var mx_Customer_Gender = $scope.mx_Customer_Gender;
                        var mx_Case_id = $scope.mx_Case_id;
                        var mx_PAN_Card = $scope.mx_PAN_Card;
                        var mx_Street1 = $scope.mx_Street1;
                        var mx_Street2 = $scope.mx_Street2;
                        var mx_Area = $scope.mx_Area;
                        var mx_City = $scope.mx_City;
                        var mx_State = $scope.mx_State;
                        var mx_Zip = $scope.mx_Zip;
                        var Notes = $scope.Notes;
                        var carregistrationnumber = $scope.carregistrationnumber;
                        var foocar = $scope.foocar;
                        var manufacturercar = $scope.manufacturercar;
                        var carvariant = $scope.carvariant;
                        var emailcar = $scope.emailcar;
                        var mobilecar = $scope.mobilecar;
                        
                        var citycar = $scope.carcity;
                        var policytypecar = $scope.policytypecar;
                        var dateExpirycar = $scope.datepickercar;
                        var caramount = $('#caramount').val();
                        var idvamount = $('#idvamount').val();
                        var carState = $('#car_state').val();

                        var expiringcar = $scope.expiringcar;
                        var ncbcar = $scope.ncbcar;
                     
                        var paramsArray  = {"mx_Category": mx_Category,
                                             "mx_Line_of_Business": mx_Line_of_Business,
                                             "mx_HDFC_Branch_Location": mx_HDFC_Branch_Location,
                                             "mx_HDFC_Ergo_Location": mx_HDFC_Ergo_Location,
                                             "mx_Priority": mx_Priority,
                                             "mx_Target_Date": mx_Target_Date,
                                             "mx_TSE_BDR_Code": mx_TSE_BDR_Code,
                                             "mx_TL_Code": mx_TL_Code,
                                             "mx_SM_Code": mx_SM_Code,
                                             "mx_Bank_Verifier_ID": mx_Bank_Verifier_ID,
                                             "mx_Payment_Type": mx_Payment_Type,
                                             "mx_Sub_Channel": mx_Sub_Channel,
                                             "mx_HDFC_Card_Relationship_No": mx_HDFC_Card_Relationship_No,
                                             "mx_HDFC_Card_Last_4_digits": mx_HDFC_Card_Last_4_digits,
                                             "FirstName": FirstName,
                                             "LastName": LastName,
                                             "mx_DOB": mx_DOB,
                                             "mx_Customer_Gender": mx_Customer_Gender,
                                             "mx_Case_id": mx_Case_id,
                                             "mx_PAN_Card": mx_PAN_Card,
                                             "mx_Street1": mx_Street1,
                                             "mx_Street2": mx_Street2,
                                             "mx_Area": mx_Area,
                                             "mx_City": mx_City,
                                             "mx_State": mx_State,
                                             "mx_Zip": mx_Zip,
                                             "Notes": Notes,
                                             "carregistrationnumber": carregistrationnumber,
                                             "foocar": foocar,
                                             "manufacturercar": manufacturercar,
                                             "carvariant": carvariant,
                                             "emailcar": emailcar,
                                             "mobilecar": mobilecar,
                                             
                                             "citycar": citycar,    
                                             "policytypecar": policytypecar,
                                             "dateExpirycar": dateExpirycar,
                                             "caramount": caramount,
                                             "expiringcar": expiringcar,
                                             "ncbcar": ncbcar,
                                             "idvamount": idvamount, 
                                             "carState": carState,
                                         }                    

                                        var url = web_url+"Quote/calculatePremium/";
                                        $http.get(url,{params:paramsArray}).then( function(response) {

                                         var responseData = response.data; 
                                         responseData = responseData.trim();                   
                                         if(responseData == 'success') {
                                            alert('Succesfully posted values');
                                            var redirectUrl = web_url+'car-premium/'
                                            window.location.href = redirectUrl;
                                        } else {
                                            
                                            $("#closeModel").click();
                                            alert('Some thing went wrong, Please try again. ')
                                        }    
                                    });
                     }
                 };
    
             });


    
    app.controller('myCtrlRe', function($scope,$http) {

        //$scope.nonElectricalCheck= 'N';


        $scope.electricalValue = 0;
        $scope.electricalCheck ='Y';
        $scope.voluntaryDeductible = 0;
        $scope.accident_family_cover = 0;
        $scope.nonElectricalValue = 0;
        $scope.antiTheft = 0;
        $scope.lpgCngKitValue = 0;
        $scope.driverLibillity = 0;
        $scope.reCalculate = function(){

            var web_url = $('#web_url').val();        

          $('#load_modal').click();  
        
   
            var voluntaryDeductible = $('#voluntaryDeductible').val();
            var accidentFamilyCover = $('#accidentFamilyCover').val();
            var nonElectricalValue = $scope.nonElectricalValue;
            var nonElectricalCheck =  $scope.nonElectricalCheck;
            var electricalValue = $scope.electricalValue;
            var electricalCheck =  $scope.electricalCheck;
            var antiTheft = $scope.antiTheft;
            var lpgCngKitValue = $('#lpgCngKit').val();
            var driverLibillity = $('#driverLibillity').val();
            //var ProspectId = $scope.ProspectId;
            var ProspectId = $('#ProspectId').val();

            if(lpgCngKitValue != '' && lpgCngKitValue != 0){
               var lpgCngKit = 'Y'; 
               var lpgCngKitType = 'C'
            } else {
               var lpgCngKit = 'N'; 
               var lpgCngKitType = 'P'
            }        
            
            var paramsArray  = {"voluntaryDeductible": voluntaryDeductible,
                             "accidentFamilyCover": accidentFamilyCover,
                             "nonElectricalValue": nonElectricalValue,
                             "nonElectricalCheck": nonElectricalCheck,
                             "electricalValue": electricalValue,
                             "electricalCheck": electricalCheck,
                             "antiTheft": antiTheft,
                             "lpgCngKitValue": lpgCngKitValue,
                             "driverLibillity": driverLibillity,
                             "ProspectId": ProspectId,
                             "lpgCngKit": lpgCngKit,
                             "lpgCngKitType": lpgCngKitType
                         }


            var url = web_url+"Quote/calculatePremiumRepeat/";
            $http.get(url,{params:paramsArray}).then( function(response) {
                
             
               var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'car-premium/'
                    window.location.href = redirectUrl;
                } else {
                    $("#closeModel").click();
                    alert('Some thing went wrong, Please try again. ')
                }             

            });   
                   

        }


        $scope.saveLead = function(){
            //alert('leads');   

            var leadString = $('#leadString').val();
            //alert(leadString); 
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
                    $('#closeModel').click();

                    var dataArray =  JSON.stringify(jqXhr);
                    var jsonArray = JSON.parse(dataArray);
                    var statusResponse = JSON.parse(jsonArray.responseText).Status;
                    var ExceptionType = JSON.parse(jsonArray.responseText).ExceptionMessage;
                    alert(statusResponse+' - '+ExceptionType);
                    $("#closeModel").click();

                }
            });
                        

           // $scope.reCalculate();
            
        }
    }); 



