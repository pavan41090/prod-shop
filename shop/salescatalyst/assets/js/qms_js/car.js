

jQuery(document).ready(function() {    
 
    $( function() {
        // $( "#datepicker2w" ).datepicker({
        //     changeMonth: true,
        //     changeYear: true,
        //     //dateFormat: "dd/mm/yy",
        //     yearRange: "-10:+00"
        // });
        $( "#car_policy_expire" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            yearRange: "-10:+00",
            todayHighlight: true,
            autoclose: true,
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
                    $scope.car_policy_type = '0';
                   $scope.car_expiring_policy='0';
                     $scope.car_expiring_policy = '0';
                    $scope.car_policy_type = 'individual';
                    $car_ncb_percentage ='0';
                    quoteCar.setAttribute( "autocomplete", "off" );
                 $scope.pset = function(){

                    var web_url = $('#web_url').val();
                    // alert(web_url);
                    

                    if ($scope.quoteCar.$valid) {
                        
                        $("#load_model").click();
                        
                        
                        var car_firstname = $scope.car_firstname;
                        var car_lastname = $scope.car_lastname;
                        var car_dob = $scope.car_dob;
                        var mx_state = $scope.car_state;
                        var car_city = $scope.car_city;
                        var car_email = $scope.car_email;
                        var car_mobile = $scope.car_mobile;
                        var car_regno = $scope.car_regno;
                        var car_yearofmanufacture = $scope.car_yearofmanufacture;
                        var car_manufacturer = $scope.car_manufacturer;
                        var car_variant = $scope.car_variant;
                        var car_cityofreg = $scope.car_cityofreg;
                        var car_policy_type = $scope.car_policy_type;
                        var car_policy_expire = $scope.car_policy_expire;
                        var car_idv_amount = $('#car_idvamount').val();
                        var car_cc = $('#car_cc').val();
                        var car_fuel = $('#car_fuel').val();
                        var car_seating = $('#car_seating').val();
                        var caramount = $('#caramount').val();
                        var carState = $('#car_reg_state').val();

            // alert(car_policy_type);
            // alert(car_cc);
                        var car_expiring_policy = $scope.car_expiring_policy;
                        var car_ncb_percentage = $scope.car_ncb_percentage;                        
                     
                        var paramsArray  = {
                                             "car_firstname": car_firstname,
                                             "car_lastname": car_lastname,
                                             "car_dob": car_dob,
                                             "mx_state": mx_state,
                                             "car_city": car_city,
                                             "car_email": car_email,
                                             "car_mobile": car_mobile,
                                             "car_regno": car_regno,
                                             "car_yearofmanufacture": car_yearofmanufacture,
                                             "car_manufacturer": car_manufacturer,
                                             "car_variant": car_variant,
                                             "car_cityofreg": car_cityofreg,
                                             "car_policy_expire": car_policy_expire,
                                             "car_idv_amount": car_idv_amount,
                                             "car_expiring_policy": car_expiring_policy,
                                             "car_ncb_percentage": car_ncb_percentage,
                                             "car_amount" : caramount,  
                                             "car_cc": car_cc,  
                                             "car_fuel": car_fuel,  
                                             "car_seating": car_seating,  
                                             "car_policy_type" : car_policy_type,
                                             "carState" :carState,
                                            
                                         }                    

                                        var url = web_url+"Quote/qmsCalculatePremium/";
                                        $http.get(url,{params:paramsArray}).then( function(response) {

                                        // var responseData = response.data; 
                                        // responseData = responseData.trim();                   
                                        // if(responseData == 'success') {
                                        //     alert('Succesfully posted values');
                                        //     var redirectUrl = web_url+'qms-car-premium/'
                                        //     window.location.href = redirectUrl;
                                        // } else {
                                            
                                        //     $("#closeModel").click();
                                        //     alert('Some thing went wrong, Please try again. ')
                                        // }  

                                        var responseData = response.data; 
                                        responseData = responseData.trim();                   
                                        if(responseData == 'success') {
                                            alert('Succesfully posted values');
                                            var redirectUrl = web_url+'qms-car-premium/'
                                            window.location.href = redirectUrl;
                                        } else {
                                            //alert('Some thing went wrong, Please try again. ');
                                             alert(responseData);   
                                            $("#closeModel").click();
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
            var nonElectricalValue = $('#nonElectricalValue').val();
            var nonElectricalCheck =  $('#nonElectricalCheck').val();
            var electricalValue = $('#electricalValue').val();
            var electricalCheck =  $('#electricalCheck').val();
            var antiTheft = $('#antiTheft').val();
            var lpgCngKitValue = $('#lpgCngKitValue').val();
            var driverLibillity = $('#driverLibillity').val();

   
            // var voluntaryDeductible = $scope.voluntaryDeductible;
            // var accidentFamilyCover = $scope.accident_family_cover;
            // var nonElectricalValue = $scope.nonElectricalValue;
            // var nonElectricalCheck =  $scope.nonElectricalCheck;
            // var electricalValue = $scope.electricalValue;
            // var electricalCheck =  $scope.electricalCheck;
            // var antiTheft = $scope.antiTheft;
            // var lpgCngKitValue = $scope.lpgCngKitValue;
            // var driverLibillity = $scope.driverLibillity;
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


            var url = web_url+"Quote/qmscalculatePremiumRepeat/";
            $http.get(url,{params:paramsArray}).then( function(response) {
                
             
               // var responseData = response.data; 
               // responseData = responseData.trim();                   
               //  if(responseData == 'success') {
               //     alert('Succesfully posted values');
               //      var redirectUrl = web_url+'car-premium/'
               //      window.location.href = redirectUrl;
               //  } else {
               //      $("#closeModel").click();
               //      alert('Some thing went wrong, Please try again. ')
               //  } 


                var responseData = response.data; 
                responseData = responseData.trim();                   
                if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-car-premium/'
                    window.location.href = redirectUrl;
                } else {
                    //alert('Some thing went wrong, Please try again. ');
                     alert(responseData);   
                    $("#closeModel").click();
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



