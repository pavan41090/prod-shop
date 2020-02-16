    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        $scope.expiringtwo = '0';
        $scope.typetwo = '0';
        //$scope.claimtwo = '0';
        $scope.tw_client_type = 'Individual';
        $scope.tw_claim_policy = '1';
        $scope.tw_prv_policy = '0';
        $scope.clientType = 'Individual';
        $scope.voluntaryDeductible = '0';
        $scope.driverLibillity = 'false';
        $scope.restrictTPPDCover = 'false';


         quoteTwo.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){
            //alert('inside sscope');
            var web_url = $('#web_url').val();
           
            if ($scope.quoteTwo.$valid) {

                $("#load_model").click();             
             
               
                var tw_first_name = $scope.tw_first_name;
                var tw_last_name = $scope.tw_last_name;
                var tw_dob = $scope.tw_dob; 
                var tw_state = $scope.tw_state;
                var tw_city = $scope.tw_city;
                var tw_email = $scope.tw_email;
                var tw_mobile = $scope.tw_mobile;
                var tw_client_type = $scope.tw_client_type;
                var tw_reg_no = $scope.tw_reg_no;
                var tw_manufacture_year = $scope.tw_manufacture_year;
                var tw_manufacturer = $scope.tw_manufacturer;
                var tw_variant = $scope.tw_variant;
                var tw_reg_city = $scope.tw_reg_city;
                var tw_tenure=$scope.tw_tenure;
                var caractualamount = $('#caractualamount').val();
                var tw_amount = $('#tw_amount').val();
                var car_cc = $('#car_cc').val();
                var driverLibillity = $scope.driverLibillity;
                var car_fuel = $('#car_fuel').val();
                var car_seating = $('#car_seating').val();
                var car_idvamount = $('#car_idvamount').val();
                var carState = $('#car_state').val();
                var tw_claim_policy = $scope.tw_claim_policy;
                var tw_ncb_value = $scope.tw_ncb_value;
                var tw_prv_policy = $scope.tw_prv_policy;
                var tw_prv_plcy_start_date=$scope.tw_prv_plcy_start_date;
                var tw_prv_plcy_end_date = $scope.tw_prv_plcy_end_date;
                var tw_zip=$scope.tw_zip;
                //alert(tw_zip);
             
               

                var paramsArray  = {"tw_first_name": tw_first_name,
                                    "tw_last_name": tw_last_name,
                                    "tw_dob": tw_dob,
                                    "tw_state": tw_state,
                                    "tw_city": tw_city,
                                    "tw_email": tw_email,
                                    "tw_mobile": tw_mobile,
                                    "tw_client_type": tw_client_type,
                                    "tw_reg_no": tw_reg_no, 
                                    "tw_manufacture_year": tw_manufacture_year,
                                    "tw_manufacturer": tw_manufacturer,
                                    "tw_variant": tw_variant,
                                    "tw_reg_city": tw_reg_city,
                                    "tw_tenure":tw_tenure,
                                    "caractualamount": caractualamount,
                                    "tw_amount": tw_amount,
                                    "car_cc": car_cc,
                                    "car_fuel": car_fuel,
                                    "car_seating": car_seating,
                                    "car_idvamount": car_idvamount,
                                    "tw_claim_policy": tw_claim_policy,
                                    "tw_ncb_value": tw_ncb_value,
                                    "tw_prv_policy": tw_prv_policy,
                                    "tw_prv_plcy_start_date":tw_prv_plcy_start_date,
                                    "tw_prv_plcy_end_date": tw_prv_plcy_end_date,
                                    "carState": carState,
                                    "driverLibillity": driverLibillity,
                                    "tw_zip":tw_zip,   

                                                                                              
                                
                    }



               
                var url = web_url+"Quotetw/qmsCalculatePremiumTW/";
                $http.get(url,{params:paramsArray}).then( function(response) {
                                       
                    var responseData = response.data; 
                    responseData = responseData.trim();                   
                    if(responseData == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'quote-two-wheeler-premium/'
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
      

        $scope.psetRecalculate = function(){
  
        var web_url = $('#web_url').val();

           
            var voluntaryDeductible = $scope.voluntaryDeductible;
            var driverLibillity = $scope.driverLibillity;
            var restrictTPPDCover = $scope.restrictTPPDCover;
            


                $("#load_model").click();


                var paramsArray  = {"voluntaryDeductible": voluntaryDeductible,
                                     "driverLibillity": driverLibillity,
                                     "restrictTPPDCover": restrictTPPDCover
                                
                }





                var url = web_url+"Quotetw/qmsCalculatePremiumTWRepeate/";
                $http.get(url,{params:paramsArray}).then( function(response) {
                    var responseData = response.data; 
                    responseData = responseData.trim();                   
                    if(responseData == 'success') {
                        alert('Succesfully posted values');
                        var redirectUrl = web_url+'quote-two-wheeler-premium/'
                        window.location.href = redirectUrl;
                    } else {
                        $("#closeModel").click();
                        alert('Some thing went wrong, Please try again. ')
                    }                     

                });


          
        };



 $scope.saveLead = function(){

           

            var leadString = $('#leadString').val();
          
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