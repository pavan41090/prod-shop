jQuery(document).ready(function() {
    $( function() {
        $( ".custom-date-after" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            startDate: "+0d",
        });

    });   

    $( function() {

     $( ".custom-date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
        });
    });

$( function() {

        $( ".custom-date-dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            minDate: 0, // your min date
            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
          
        });
    });


$('input:radio[name="claimpolicy"]').change(function() {
        if ($(this).val() == 'Yes') {
            $('#ncb2w').attr('disabled', true);
        } else {
            $('#ncb2w').removeAttr('disabled');
        }
    })

    $('input:radio[name="expiringcar"]').change(function() {
        if ($(this).val() == 'Yes') {
            $('#ncbcar').attr('disabled', true);
        } else {
            $('#ncbcar').removeAttr('disabled');
        }
    })

    $("#lms_car_payment_type").on('change', function() {
        var paymentType = $(this).val();
        if(paymentType =='Credit Card'){
            $('#emi_applicalble_outer').show();
            
        }else {
            $('#lms_cus_emi').val(''); 
            $('#emi_applicalble_outer').hide();            
           
            }
        
    });


    $("#lms_cus_emi").on('change', function() {
        var paymentType = $(this).val();
        if( paymentType =='Yes'){
            $('#emi_yr_outer').show();
           
        } else {
            $('#lms_cus_emi_yr').val(''); 
            $('#emi_yr_outer').hide();
           
        }
    });  


$('#lms_car_pan').on('keyup',function(){
        var panVal = $(this).val();
        var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
        if(regpan.test(panVal)){
            $('#pan_error').html('');
        }else {
                $('#pan_error').html('Please Enter Valid Pan Card Number');
        }
    });   


$('.number-validate').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            //$('#premium-validate').html('Please Enter Valid Amount');    
            event.preventDefault();
        } else {
             //$('#premium-validate').html('');
        }
    });

$('.age-validate').keypress(function(event){
        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
            // $('#age-validate-error').addClass('ng-inactive');   
            // $('#age-validate-error').html('werwerwerwer');
            event.preventDefault();
        } else {
            //$('#age-validate-error').html('');
        }
    });


$('#lms_car_dob').on('change', function(){
        var insertedDate = $(this).val();
        //alert(insertedDate);
        if(insertedDate != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate);
                $('#lms_car_dob').val('');
                $('#lms_car_dob').focus();
            }
        }
    });

});


function compareInputDateWithCurrentDate(EnteredDate){

        //var EnteredDate = EnteredDate; // For JQuery
        var date = EnteredDate.substring(0, 2);
        var month = EnteredDate.substring(3, 5);
        var year = EnteredDate.substring(6, 10);
        var myDate = new Date(year, month - 1, date);
        var today = new Date();
        if ( myDate > today ) { 
           //alert('You cannot enter a date in the future!');
            return false;
        }
        return true;

    }

    function compareInputForFutureDate(EnteredDate){

        //var EnteredDate = EnteredDate; // For JQuery
        var date = EnteredDate.substring(0, 2);
        var month = EnteredDate.substring(3, 5);
        var year = EnteredDate.substring(6, 10);
        var myDate = new Date(year, month - 1, date);
        var today = new Date();
        var dd=today.getDate();
        var mm=today.getMonth();
        var yy=today.getFullYear();
        var policy=new Date(yy,mm,dd);
        if ( myDate >= policy ) { 
           //alert('You cannot enter a date in the Past!');
            return true;
        }
        return false;

    }

var app = angular.module('plunker', ['ngMessages']);

app.factory('LmsValidataionservice', ['$http', function ($http) {

        var factory = {};
        var dataresOnj = [];
        factory.checkDuplicateFunc = function(_pypValue,idName,productName,productIdvalue){
        var findMobileNumber = idName;
        var mobileObject = new Object();
        mobileObject.number = findMobileNumber;
        mobileObject.productname = productName;
        mobileObject.leadValue = productIdvalue;
        if(findMobileNumber.length == 10){
            return $http({
                url:__pathname+'checker-dupliate',
                method : 'POST',
                cache : false,
                dataType : 'json',
                data : $.param( mobileObject ),
                headers : {"Content-Type": 'application/x-www-form-urlencoded'}
            }).then(function(responceData){
                var resOnj = Object(responceData);
                var dataresOnj = resOnj.data;
                var messageObj = new Object();
                if(dataresOnj.status == true){
                    _pypValue.parent('div').children('div').html('').append(dataresOnj.message);
                    messageObj.status = false;
                    messageObj.message = dataresOnj.message;
                } else {
                    _pypValue.parent('div').children('div').html('');
                    messageObj.status = true;
                }
                return messageObj;
            });
        }
     }

     return factory;
}]);

app.directive('mobileNumberDuplicate',['LmsValidataionservice',function(LmsValidataionservice){
return {
    restrict : 'AE',
    link : function(scope,element,attr){
        element.on('keyup',function(){
            var _pypValue = $(this);
            scope.getonChangeevent(_pypValue);
        });
    },
    controller : function($scope,$http){

        $scope.checkDuplicateFunc = function(_pypValue,idName,productName,productIdvalue){
        var findMobileNumber = idName;
        var mobileObject = new Object();
        mobileObject.number = findMobileNumber;
        mobileObject.productname = productName;
        mobileObject.leadValue = productIdvalue;
        if(findMobileNumber.length == 10){
            return $http({
                url:__pathname+'checker-dupliate',
                method : 'POST',
                cache : false,
                dataType : 'json',
                data : $.param( mobileObject ),
                headers : {"Content-Type": 'application/x-www-form-urlencoded'}
            }).then(function(responceData){
                var resOnj = Object(responceData);
                var dataresOnj = resOnj.data;
                var messageObj = new Object();
                if(dataresOnj.status == true){
                    _pypValue.parent('div').children('div').html('').append(dataresOnj.message);
                    messageObj.status = false;
                    messageObj.message = dataresOnj.message;
                } else {
                    _pypValue.parent('div').children('div').html('');
                    messageObj.status = true;
                }
                return messageObj;
            });
        }
}

        $scope.getonChangeevent = function(_pypValue){
            var mobileDuRes = $scope.checkDuplicateFunc(_pypValue,_pypValue.val(),$('#lms_car_line_of_business').val(),$('#lead_id').val());
        }
    }
}
}]);
app.controller('myCtrl', function($scope, $http,$timeout,$rootScope,LmsValidataionservice) {

$scope.emiObj={
    lms_cus_emi:"",
    lms_cus_emi_yr:""
};

$scope.saveleadctn = true;
$scope.saveleadPleasewait = false;

$('#lms_car_zip').on('keyup',function(){
   if($(this).val().length>5){
      var webUbrl = $('#web_url').val();
     $.ajax({
   
              url : webUbrl+'Commoncontrol/getCityByPincode/',
               type : 'POST',
               data : {
                   'cus_pincode' : $('#lms_car_zip').val()},
               dataType:'json',
             
               success: function( data){
                  //var jsonD=JSON.parse(data);
                  $('#lms_car_city').val(data.cus_cityName),
                  $('#lms_car_state').val(data.cus_stateName);
                  /*$scope.zonewisecalculation();*/
               }
            });
        
   }
});

$scope.onEmiChange = function(){
    if($scope.emiObj.lms_cus_emi!="Yes"){
        $scope.emiObj.lms_cus_emi_yr="";
    }
};


$scope.sync=function(){
    $timeout(function(){$scope.$apply()},1000);
}

   
    
 // $scope.lms_car_category=$('#lms_car_category').val();
 

 setTimeout(function(){$scope.$apply(); },1000);

     var productType = $('#product_type').val();
    switch (productType) {
        case 'Personal Accident':
            $scope.lms_car_line_of_business = 'Personal Accident';
            break;               
        default:
            $scope.lms_car_line_of_business = 'Miscellaneous';
            break;
    }


//$scope.lmsCar.$setPristine();

    $scope.formData = {};
    $scope.lms_car_cus_type = 'individual';
    $scope.lms_car_claim_policy = '0';

    $scope.lms_cus_pfee = '0';

    $scope.lms_cus_tle = '0';
    var date = new Date();
    $scope.lms_car_target_date =  ('0' + date.getDate()).slice(-2) + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + date.getFullYear();
    var web_url = $('#web_url').val();
    //var product_type = $('#product_type').val();
    
    $scope.customer = function() {
      
            
        var dobdate = $('#lms_car_dob').val();
       
        if($scope.lmsCar.$valid && (dobdate.length==0)){
            alert("Please Select DOB");
            return false;
        }
        
        if ($scope.lmsCar.$valid) {

        /////////////////////////
            var customerAge = $('#lms_car_age').val();
            var lineOfBusiness = $scope.lms_car_line_of_business;
            if(lineOfBusiness == 'Personal Accident'){
                if(customerAge < 18) {
                    alert('Please check, age is less than 18');
                    $('#lms_car_dob').focus();
                    return false;
                } else if(customerAge > 65) {
                    alert('Please check, age is more than 65');
                    $('#lms_car_dob').focus();
                    return false;
                } 
        }

        var findMobileNumber = $('#lms_car_mobile').val();
        var mobileObject = new Object();
        mobileObject.number = findMobileNumber;
        mobileObject.productname = 'Personal Accident';
        mobileObject.leadValue = $('#lead_id').val();
        if(findMobileNumber.length == 10){
            $http({
                url:__pathname+'checker-dupliate',
                method : 'POST',
                cache : false,
                dataType : 'json',
                data : $.param( mobileObject ),
                headers : {"Content-Type": 'application/x-www-form-urlencoded'}
            }).then(function(responceData){
                var resOnj = Object(responceData);
                var dataresOnj = resOnj.data;
                var messageObj = new Object();
                if(dataresOnj.status == true){
                    $('#lms_car_mobile').parent('div').children('div').html('').append(dataresOnj.message);
                    var Aprompt = confirm(dataresOnj.message);
                    if(!Aprompt){
                       var finalConfirm = confirm('Lead is canceling');
                        if(finalConfirm){
                            alert('Lead Canceled! reloading page');
                            location.reload();
                            return false;
                        } else {
                            return false;
                        }
                        return false;
                        } else {
                            $scope.pafunctionInsertion();
                            return true;
                        }
                        

                } else {
                    $('#lms_car_mobile').parent('div').children('div').html('');
                    $scope.pafunctionInsertion();
                    return true;
                }
            });
        }

    }        
}

$scope.pafunctionInsertion = function(){
$('#saveleadctn').attr('type','button');
$('#saveleadctn').attr('value','Please wait..');
 var customerAge = $('#lms_car_age').val();
var cateValue = '';
if($scope.channel == null || $scope.channel == undefined ){

  cateValue = $('#lms_car_category').val();
  

} else {
   cateValue = $scope.channel;
}
$scope.lms_car_city=$('#lms_car_city').val();
$scope.lms_car_state=$('#lms_car_state').val();
$scope.vision_address_name=$("#vision_address").is(":checked")?"1":"0";
$scope.lms_car_campaign_name =$('#lms_car_campaign_name').val();

 $scope.saveleadbtn = false;
 
 var paramsArray = {
                    "lms_car_category": cateValue,
                    "lms_car_line_of_business": $scope.lms_car_line_of_business,
                    "vision_address_name":$scope.vision_address_name,
                    "lms_car_hdfc_branch_location": $scope.lms_car_hdfc_branch_location,
                    "lms_car_hdfc_ergo_location": $scope.lms_car_hdfc_ergo_location,
                    "lms_car_target_date": $scope.lms_car_target_date,
                    "lms_car_tse_bar_code": $scope.lms_car_tse_bar_code,
                    "lms_car_tl_code": $scope.lms_car_tl_code,
                    "lms_car_sm_code": $scope.lms_car_sm_code,
                    "lms_car_bank_verify_id": $scope.lms_car_bank_verify_id,
                    "lms_car_payment_type": $scope.lms_car_payment_type,
                    "lms_car_sub_channel": $scope.lms_car_sub_channel,
                    "lms_car_hdfc_card_relno": $scope.lms_car_hdfc_card_relno,
                    "lms_car_hdfc_card_4digt": $scope.lms_car_hdfc_card_4digt,
                    "lms_car_card_name": $scope.lms_car_card_holder_name,
                    "lms_car_relation_insure": $scope.lms_car_relation_insured,
                    "lms_car_salut": $scope.lms_car_salut,
                    
                    "lms_car_fname": $scope.lms_car_fname,
                    "lms_car_lname": $scope.lms_car_lname,
                    "lms_car_dob": $scope.lms_car_dob,
                    'lms_car_age': customerAge,
                    "lms_car_gender": $scope.lms_car_gender,
                    "lms_car_case_id": $scope.lms_car_case_id,
                    "lms_car_campaign_name" : $scope.lms_car_campaign_name,
                    "lms_car_pro_marital": $scope.lms_car_pro_marital,
                    "lms_car_pro_occupation": $scope.lms_car_pro_occupation,
                    "lms_car_pro_landmark": $scope.lms_car_pro_landmark,
                    "lms_car_pro_emergency": $scope.lms_car_pro_emergency,
                    "lms_car_pro_gstn": $scope.lms_car_pro_gstn, 
                    "lms_aaa_number": $scope.lms_aaa_number,
                    "lms_car_pan": $scope.lms_car_pan,
                    "lms_car_add1": $scope.lms_car_add1,
                    "lms_car_add2": $scope.lms_car_add2,
                    "lms_car_add3": $scope.lms_car_add3,
                    "lms_car_area": $scope.lms_car_area,
                    "lms_car_zip": $scope.lms_car_zip,
                    "lms_car_state": $scope.lms_car_state,
                    "lms_car_city": $scope.lms_car_city,
                    "lms_car_deatil_lead": $scope.lms_car_deatil_lead,
                    "lms_car_email": $scope.lms_car_email,
                    "lms_car_mobile": $scope.lms_car_mobile,
                    "lms_car_cus_type": $scope.lms_car_cus_type,
                    "lms_cus_customer": $scope.lms_cus_customer,
                    "lms_cus_language": $scope.lms_cus_language,
                    "lms_cus_emi": $scope.emiObj.lms_cus_emi,
                    "lms_cus_emi_yr": $scope.emiObj.lms_cus_emi_yr,
                    "lms_cus_pfee": $scope.lms_cus_pfee,
                    "lms_cus_cardlimt": $scope.lms_cus_cardlimt,
                    "lms_cus_sdate": $scope.lms_cus_sdate,
                    "lms_cus_tle" : $scope.lms_cus_tle,
                    "lms_cus_tbusins" : $scope.lms_cus_tbusins,
                    "lms_house_number" : $scope.lms_house_number,
                     "product_type" : productType,  
                "sum_insured": $scope.lms_car_sum_insured,
                "lms_premium": $('#lms_est_premium').val(),
                  // proposal
                "pa_pro_policy_sdate":$scope.pa_pro_policy_sdate,
               
                //Nominee Details
                "pa_pro_nomie_name" : $scope.pa_pro_nname,
                "pa_pro_nomie_relation": $scope.pa_pro_nomie_relation,
                "pa_pro_nomie_age" : $scope.pa_pro_nomie_age,
                "pa_pro_nameofappoint": $scope.pa_pro_nameofappoint,
                "pa_pro_appoint_relation": $scope.pa_pro_appoint_relation,
                "pa_similar_policy_comment": $scope.similar_policy_comment,
                "comment_Date":$scope.functionGetDate(),
                "lms_car_comment":$scope.lms_car_comment
            }
                

              var url = web_url + "LmsPersonalAccident/lmsCustomerDetails";
                $http.get(url, {
                    params: paramsArray
                }).then(function(response) {
                var responseData = Object(response.data);
                
                var responceDataR = Object(responseData);
    
                if (responceDataR.status == true ) {
                   
                    $scope.saveleadbtn = false;
                    alert('Succesfully posted values, Lead Number is '+ responceDataR.message);
                    location.reload();
                    $("#paform :input").prop("disabled", true);
    
                } else {
                    alert(responceDataR.message);
                    return false;
                }
            
             
            });
}




     $scope.functionGetDate = function(){
        
        var dateAdded = new Date();
        var day = dateAdded.getDate();
        var year = dateAdded.getFullYear();
        var month = dateAdded.getMonth() + 1;
        var hours = dateAdded.getHours();
        var minuts = dateAdded.getMinutes();
        var seconds = dateAdded.getSeconds();

        var finalData = year+'-'+(month > 9 ? month : '0'+month)+'-'+(day > 9 ? day : '0'+day)+' '+hours+':'+(minuts > 9 ? minuts : '0'+minuts)+':'+seconds;
        
        return finalData;
    }

    $scope.checkPolicyStartDate = function(dataIdclick){
    
        var dateSelected = $('#'+dataIdclick).val();

        var date = dateSelected.substring(0, 2);
        var month = dateSelected.substring(3, 5);
        var year = dateSelected.substring(6, 10);
        var myDate = new Date(year, month - 1, date);
        var today = new Date();
        var daytoday = today.getDate();
        var daymonth = today.getMonth();
        var dayyear = today.getFullYear();
        var latestDate = new Date(dayyear,daymonth,daytoday);
        
        var __parent = $('#'+dataIdclick).parent('div').find('div');
        if ( +latestDate != +myDate && +latestDate > +myDate) {
            alert('Please Select Policy Starts Date Future!');
            __parent.html('').append('<div ng-message="required" class="required">Please Select Policy Starts Date Future!</div>');
            return false;
        }
        __parent.html('');
        return true;
    }
});