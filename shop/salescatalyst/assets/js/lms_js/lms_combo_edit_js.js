var app = angular.module('plunker', ['ngMessages']);
app.factory('LmsValidataionservice', ['$http', function ($http) {

        var factory = {};
        var dataresOnj = [];
        factory.checkDuplicateFunc = function(_pypValue,idName,productName){
        var findMobileNumber = idName;
        var mobileObject = new Object();
        mobileObject.number = findMobileNumber;
        mobileObject.productname = productName;
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
  

/***** calculation Data *****/
$('#lms_car_zip').on('keyup',function(){
   if($(this).val().length>5){
      var webUbrl = $('#web_url').val();
     $.ajax({
   
              url : webUbrl+'Commoncontrol/getCityByPincode',
               type : 'POST',
               data : {
                   'cus_pincode' : $('#lms_car_zip').val()},
               dataType:'json',
             
               success: function( data){
                  //var jsonD=JSON.parse(data);
                  $('#lms_car_city').val(data.cus_cityName),
                  $('#lms_car_state').val(data.cus_stateName);
				 // $scope.zonewisecalculation();
               }
            });
   }
});
$scope.zonewisecalculation = function(data){
	
	var lms_car_zip = $scope.lms_car_zip || '';
	if(lms_car_zip.length>0){
		var selectedsumin = $scope.ss_sum_insured;
		var selectedchil = $scope.noofchildrens;
		var selectedage = $('#lms_car_dob').val() || '';
		var age;
		var selectedspouse=0;
		if(selectedage){
			
		/***age calculation****/
		var date2 = selectedage;
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '-' + mm + '-' + yyyy;
        today = new Date(today.split('-')[2], today.split('-')[1] - 1, today.split('-')[0]);
        date2= new Date(date2.split('-')[2], date2.split('-')[1] - 1, date2.split('-')[0]);
        var timeDiff = Math.abs(date2.getTime() - today.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
        var months = Math.floor(diffDays / 31);
        age = Math.floor(months / 12);
		//selectedspouse = 1;
		/** close here*****/
		} else {
			//selectedspouse = 0;
			age = 0;
		}
		var criticalcheck=0;
		var criticalValue=0;        
		 
		var dataObject = new Object();
		dataObject.age = age;
		dataObject.children = selectedchil;
		dataObject.sumassured = selectedsumin;
		dataObject.spouse = selectedspouse;
		dataObject.pincode = lms_car_zip;
		dataObject.hospital = checkhospital;
		dataObject.crititcalcheck = criticalcheck;
		dataObject.criticalvalue = criticalValue;
		$http({
			url:web_url+'Calculations/getCalculationData',
			method:'POST',
			dataType:'json',
			data:$.param( dataObject ),
			headers: {
				"Content-Type": 'application/x-www-form-urlencoded'
			}
		}).then(function(responce){
			var responceData = responce.data;
			//if(checkhospital == 0)
			$('#lms_est_premium').val(responceData.result);
		},function(errorMessage){
		});
	} 
}

$scope.onEmiChange = function(){
    if($scope.emiObj.lms_cus_emi!="Yes"){
        $scope.emiObj.lms_cus_emi_yr="";
    }
};

    //});


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

     

    $('#sship_pro_policy_start').on('change', function(){
        var insertedDate = $(this).val();
        ///alert(insertedDate);
        if(insertedDate != ''){
            var compare = compareInputForFutureDate(insertedDate);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the Past! You entered date is - '+ insertedDate);
                $('#sship_pro_policy_start').val('');
                $('#sship_pro_policy_start').focus();
            }
        }
    });


$scope.sync=function(){
    $timeout(function(){$scope.$apply()},1000);
}


    var productType = $('#product_type').val();
    var web_url = $('#web_url').val();
    var leadId =  $('#lead_id').val();
        
        var paramsArray = {"leadId": leadId}
        var url = web_url+"LmsCar/lmsGetLeadDetailsByJson";
            $http.get(url,{params:paramsArray}).then( function(response) {

           // console.log(response.data);   
           // return false;

            $scope.formData = {};

            $('#lms_edit_application_no').html(response.data[0]['lead_application_id']);
            $('#lms_edit_product').html(response.data[0]['product_type']);
            $('#lms_edit_status').html(response.data[0]['lead_status']);
            
            $scope.lms_edit_application_Id = response.data[0]['lms_edit_application_Id'];

            $scope.lms_edit_lead_id = response.data[0]['lead_id'];
            $scope.lms_edit_customer_id = response.data[0]['cust_id'];
            $scope.lms_edit_product_id = response.data[0]['product_id'];
            $scope.lms_edit_proposal_id = response.data[0]['propsal_id'];
            $scope.lms_edit_nominee_id = response.data[0]['nominee_id'];
            $scope.lms_edit_drhabit_id = response.data[0]['habits_id']; 
            $scope.lms_edit_family_doctor_id = response.data[0]['family_doctor_id'];
            $scope.lms_edit_option_id = response.data[0]['option_id'];
            $scope.lms_car_category = response.data[0]['category'];
            $scope.lms_car_line_of_business = response.data[0]['line_of_business'];
            $scope.lms_car_hdfc_branch_location = response.data[0]['HDFC_branch_loc'];
            $scope.lms_car_hdfc_ergo_location = response.data[0]['HDFC_ergo_loc'];
            $scope.lms_aaa_number = response.data[0]['aaa_number'];
            $scope.lms_car_target_date = response.data[0]['target_date'];
            $scope.lms_car_tse_bar_code = response.data[0]['TSE_BDR_code'];           
            $scope.lms_car_tl_code = response.data[0]['TL_code'];           
            $scope.lms_car_sm_code = response.data[0]['SM_code'];           
            $scope.lms_car_bank_verify_id = response.data[0]['bank_verifier_id']; 
            $('#lms_car_bank_verify_id') .val(response.data[0]['bank_verifier_id']);        
            $scope.lms_car_payment_type = response.data[0]['payment_type'];
            $('#lms_car_payment_type').val(response.data[0]['payment_type']);         
            $scope.lms_car_sub_channel = response.data[0]['priority'];   
            $scope.lms_car_deatil_lead = response.data[0]['lead_details'];
            $('#lms_car_deatil_lead') .val(response.data[0]['lead_details']);      
            $scope.lms_car_hdfc_card_relno = response.data[0]['HDFC_card_relationship_no'];           
            $scope.lms_car_hdfc_card_4digt = response.data[0]['HDFC_card_last_4_digits'];
            $scope.lms_car_card_holder_name = response.data[0]['cuscardname'];
            $scope.lms_car_relation_insured = response.data[0]['cusrelationishued'];
            $scope.lms_car_salut = response.data[0]['cus_title'];     
            $scope.lms_car_fname = response.data[0]['first_name'];                      
            $scope.lms_car_lname = response.data[0]['last_name'];                 
            $scope.lms_car_dob = response.data[0]['date_of_birth']; 
            
            $scope.lms_car_pro_marital = response.data[0]['marital_status'];      
            $scope.lms_car_gender = response.data[0]['cust_gender'];      
            $scope.lms_car_case_id = response.data[0]['case_id'];        
            $scope.lms_car_pan = response.data[0]['cust_pan'];        
            $scope.lms_car_add1 = response.data[0]['cust_street1'];
            $scope.lms_car_add2 = response.data[0]['cust_street2'];        
            $scope.lms_car_add3 = response.data[0]['cust_street3'];        
            $scope.lms_car_area = response.data[0]['cust_area'];        
            $scope.lms_car_zip = response.data[0]['cust_zip'];       
            $scope.lms_car_state = response.data[0]['cust_state'];     
            $scope.lms_car_city = response.data[0]['cust_city'];        
            $scope.lms_car_pro_landmark = response.data[0]['cust_landmark'];    
            $scope.lms_car_pro_emergency = response.data[0]['emergency_contact_num'];   
            $scope.lms_car_pro_gstn = response.data[0]['GSTIN'];  
            $scope.lms_car_email = response.data[0]['cust_email'];  
            $scope.lms_car_mobile = response.data[0]['cust_phone'];
            $scope.lms_cus_customer = response.data[0]['cus_customer'];     
            $scope.lms_cus_language = response.data[0]['cus_language'];    
            $scope.lms_cus_tbusins = response.data[0]['business_type'];
            $scope.lms_house_number = response.data[0]['cust_house_number'];

            $('#lms_house_number').val(response.data[0]['cust_house_number']);
            $scope.lms_car_sum_insured = response.data[0]['sum_insured'];
            $scope.lms_car_age = response.data[0]['cust_age'];
            $scope.lms_car_campaign_name = response.data[0]['sub_channel'];
            //$('#lms_car_campaign').val(response.data[0]['sub_channel']);
            $scope.vision_address = response.data[0]['vision_address'];  
            $('#vision_address_name').val(response.data[0]['vision_address'])      

            if(response.data[0]['cust_type'] == 'corporate') {
                $("#uniform-lms_car_cus_type_corporate span").addClass("checked", true);
            } else { 
                $("#uniform-lms_car_cus_type_individual span").addClass("checked", true); 
            }


            
            if(response.data[0]['processing_fee'] == '1') {
                $("#uniform-processing_fee_yes span").addClass("checked", true);
            } else {
                $("#uniform-processing_fee_no span").addClass("checked", true);
            }

            $scope.lms_cus_cardlimt = response.data[0]['cus_cardlimt'];           
            $scope.lms_cus_sdate = response.data[0]['statement_date'];
            //$('#lms_cus_sdate').val(response.data[0]['statement_date']);

            //$scope.lms_cus_tle = response.data[0]['temp_LE'];  
            if(response.data[0]['temp_LE'] == '1') {
                $("#uniform-lms_cus_tle_yes span").addClass("checked", true);
            } else {
                $("#uniform-lms_cus_tle_no span").addClass("checked", true);
            }

            $scope.lms_car_pro_occupation = response.data[0]['occupation'];
            //$('#lms_car_pro_occupation').val(response.data[0]['occupation']);        
            $scope.emiObj.lms_cus_emi = response.data[0]['cus_emi'];                
            $scope.emiObj.lms_cus_emi_yr = response.data[0]['cus_emi_yr'];           

//alert(response.data[0]['prop_mtr_prev_stand_alone']);            
//lms_car_pro_prev_stand_alone_yes

if(response.data[0]['prop_mtr_prev_stand_alone'] == '1') { $("#uniform-lms_car_pro_prev_stand_alone_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_stand_alone_no span").addClass("checked", true);}
if(response.data[0]['prop_mtr_prev_prev_depre'] == '1') { $("#uniform-lms_car_pro_prev_depre_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_depre_no span").addClass("checked", true);}
if(response.data[0]['prop_mtr_prev_prev_electric'] == '1') { $("#uniform-lms_car_pro_prev_electric_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_electric_no span").addClass("checked", true);}
if(response.data[0]['prop_mtr_prev_prev_cng_lpg'] == '1') { $("#uniform-lms_car_pro_prev_cng_lpg_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_cng_lpg_no span").addClass("checked", true);}


var clainprevious = response.data[0]['hme_previous_claims'];

if(clainprevious == 'yes'){
	$('#claim_detail_div').attr('style','border: 1px solid #CCC; padding: 10px; margin-top: 20px; display:bock');
} else {
	$('#claim_detail_div').attr('style','border: 1px solid #CCC; padding: 10px; margin-top: 20px; display:none');
}
   


            //$scope.pa_pro_appoint_relation = response.data[0]['appointee_relationship'];
            $('#pa_pro_appoint_relation').val(response.data[0]['appointee_relationship']);
            $scope.fname_mem2= response.data[0][''];

            //ship related...
           // $scope.spouse.spouse_ship.active = true;
           // $scope.noofchildrens = 0; 
         $scope.lms_est_premium = response.data[0]['lms_premium'];  
            
    $scope.policyterm =  response.data[0]['ship_policy_term'];
    

    var memberDetails = response.data[0]['member_details'];    

     var previousInsuredArray =  response.data[0]['previous_insured'];
        for (j = 0; j < previousInsuredArray.length; j++) { 
            var x = j+1;
                var fieled_insurer_name = 'port_insurer_name'+x; 
                var fieled_port_policy_number = 'port_policy_number'+x; 
                var fieled_port_start_date = 'port_start_date'+x; 
                var fieled_port_end_date = 'port_end_date'+x; 
                var fieled_port_sum_insured = 'port_sum_insured'+x; 
                var fieled_port_claim_lodged = 'port_claim_lodged'+x; 
                var fieled_port_cumulative_bonus = 'port_cumulative_bonus'+x; 

                var fieled_port_pre_insurance_id = 'port_pre_insurance_id'+x; 

                $scope[fieled_insurer_name]  = previousInsuredArray[j]['pre_name'];
                $scope[fieled_port_policy_number]  = previousInsuredArray[j]['prer_policy_number'];
                $scope[fieled_port_start_date] = previousInsuredArray[j]['pre_from_date'];
                $scope[fieled_port_end_date]   = previousInsuredArray[j]['pre_to_date'];
                $scope[fieled_port_sum_insured]   = previousInsuredArray[j]['pre_sum_insured'];
                $scope[fieled_port_claim_lodged]   = previousInsuredArray[j]['pre_claim_lodged'];
                $scope[fieled_port_cumulative_bonus]   = previousInsuredArray[j]['pre_cum_bonus'];
                $scope[fieled_port_pre_insurance_id]   = previousInsuredArray[j]['pre_ins_id'];
              
            //}    
        //}    
    }

 
            $scope.gainful = response.data[0]['gainful'];
            $scope.pa_pro_policy_sdate = response.data[0]['new_policy_start'];
            $scope.hme_sum_insured = response.data[0]['sum_insured'];
            $scope.pa_pro_nname = response.data[0]['nominee_name'];
            $scope.pa_pro_nomie_age = response.data[0]['nominee_age'];
            $scope.pa_pro_nomie_relation = response.data[0]['nominee_relationship'];
            $scope.pa_pro_nameofappoint = response.data[0]['appointee_name'];
            $scope.pa_pro_appoint_relation = response.data[0]['appointee_relationship'];
             
        if(response.data[0]['travel_pro_present_india'] == 'Yes') { 
            $("#uniform-tvl_pro_present_india_yes span").addClass("checked", true);
        } else {
            $("#uniform-tvl_pro_present_india_no span").addClass("checked", true);
        }
        if(response.data[0]['travel_pro_vaild_passport'] == 'Yes') { 
            $("#uniform-tvl_pro_vaild_passport_yes span").addClass("checked", true);
        } else {
            $("#uniform-tvl_pro_vaild_passport_no span").addClass("checked", true);
        }
   


    

    });   

 /* reading from database compvare here*/

     
 

   $scope.formData = {};
   $scope.lms_car_claim_policy = '0'; 
   $scope.updatedatacus = true;
   $scope.updateprogressdatacus = false; 
   $scope.updatehomedetails = true;
   $scope.updateprocesshomedetails = false;
   $scope.updateleadhomeprg = false; 
   $scope.updateleadhome = true;

 $scope.updateCustomer = function() {
    var dobdate = $('#lms_car_dob').val(); 
    if( dobdate == undefined || dobdate.length == 0)
        {
           alert("Please Select DOB");
           return false;
       }
        if ($scope.lmsCar.$valid) {
        if( dobdate == undefined || dobdate.length == 0)
        {
            alert("Please Select DOB");
           return false;
       }

	   setTimeout(function(){
		//$scope.channel=$('#lms_car_category').val();
	  $scope.$apply();
	},1000);
		   var customerAge = $('#lms_car_age').val();
		   if(customerAge < 18) {
			alert('Please check, age is less than 18');
			$('#lms_car_dob').focus();
				return false;
			} else if(customerAge > 65) {
				alert('Please check, age is more than 65');
				$('#lms_car_dob').focus();
				return false;
		   }
	    var findMobileNumber = $('#lms_car_mobile').val();
        var mobileObject = new Object();
        mobileObject.number = findMobileNumber;
        mobileObject.productname = $('#lms_car_line_of_business').val();
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
                            $scope.comboDataUpdateFun();
                            return true;
                        }
                } else {
                    $('#lms_car_mobile').parent('div').children('div').html('');
                    $scope.comboDataUpdateFun();
                    return true;
                }
            });
        }

        }
}

$scope.comboDataUpdateFun = function(){
        
           $scope.updatedatacus = false;
           $scope.updateprogressdatacus = true;
          var dobdate = $('#lms_car_dob').val();
          var customerAge = $('#lms_car_age').val();
          $scope.vision_address_name=$("#vision_address").is(":checked")?"1":"0";
          $scope.lms_car_campaign_name=$('#lms_car_campaign_name').val();
        if( $("#uniform-processing_fee_yes span").hasClass("checked")){ var lms_cus_pfee = '1'; } else { var lms_cus_pfee = '0'; }
       
        if( $("#uniform-lms_car_cus_type_corporate span").hasClass("checked")){ var lms_car_cus_type = 'corporate'; } else { var lms_car_cus_type = 'individual'; }
 
        if( $("#uniform-lms_cus_tle_yes span").hasClass("checked")){ var lms_cus_tle = '1'; } else { var lms_cus_tle = '0'; }
          if( $("#uniform-pa_pro_suffered_yes span").hasClass("checked")){ var pa_pro_suffered = '1'; } else { var pa_pro_suffered = '0'; }
          if( $("#uniform-pa_pro_Sonography_yes span").hasClass("checked")){ var pa_pro_Sonography = '1'; } else { var pa_pro_Sonography = '0'; }
          if( $("#uniform-pa_pro_surgery_yes span").hasClass("checked")){ var pa_pro_surgery = '1'; } else { var pa_pro_surgery = '0'; }
          if( $("#uniform-pa_pro_medication_yes span").hasClass("checked")){
                    var pa_pro_medication = '1'; 
            } else { 
                var pa_pro_medication = '0'; 
            }
           var lms_car_comment = $scope.lms_car_comment;
            var paramsArray = {
                "lms_car_category": $scope.lms_car_category,
                "lms_car_line_of_business": $scope.lms_car_line_of_business,
                "lms_car_target_date": $scope.lms_car_target_date,
                "lms_car_tse_bar_code": $scope.lms_car_tse_bar_code,
                "lms_car_tl_code": $scope.lms_car_tl_code,
                "lms_car_sm_code": $scope.lms_car_sm_code,
                "lms_car_bank_verify_id": $scope.lms_car_bank_verify_id,
                "lms_car_payment_type": $scope.lms_car_payment_type,
                "lms_car_sub_channel": $scope.lms_car_sub_channel,
                "lms_car_campaign_name": $scope.lms_car_campaign_name,
                "vision_address_name" : $scope.vision_address_name,
                "lms_car_hdfc_card_relno": $scope.lms_car_hdfc_card_relno,
                "lms_car_hdfc_card_4digt": $scope.lms_car_hdfc_card_4digt,
                "lms_car_card_name": $scope.lms_car_card_holder_name,
                "lms_car_relation_insure": $scope.lms_car_relation_insured,
                "lms_car_salut": $scope.lms_car_salut,
                "lms_car_fname": $scope.lms_car_fname,
                "lms_car_lname": $scope.lms_car_lname,
                "lms_car_dob": $scope.lms_car_dob,
                "lms_car_gender": $scope.lms_car_gender,
                "lms_car_case_id": $scope.lms_car_case_id,
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
                "lms_car_state":$('#lms_car_state').val(),//$scope.lms_car_state,
                "lms_car_city": $('#lms_car_city').val(),//$scope.lms_car_city,
                "lms_car_deatil_lead": $scope.lms_car_deatil_lead,
                "lms_car_email": $scope.lms_car_email,
                "lms_car_mobile": $scope.lms_car_mobile,
                "lms_car_cus_type": $scope.lms_car_cus_type,
                "lms_cus_customer": $scope.lms_cus_customer,
                "lms_cus_language": $scope.lms_cus_language,
                "lms_cus_emi": $scope.emiObj.lms_cus_emi,
                "lms_cus_emi_yr": $scope.emiObj.lms_cus_emi_yr,
                "lms_cus_pfee": lms_cus_pfee,
                "lms_cus_cardlimt": $scope.lms_cus_cardlimt,
                "lms_cus_sdate": $scope.lms_cus_sdate,
                "lms_cus_tle": $scope.lms_cus_tle,
                "lms_cus_tbusins": $scope.lms_cus_tbusins,
               
                "lms_house_number": $scope.lms_house_number,
                "lms_car_sum_insured":$scope.lms_car_sum_insured,
                "lms_car_age":$('#lms_car_age').val(),
                "lms_edit_lead_id": $scope.lms_edit_lead_id,
                "lms_edit_customer_id": $scope.lms_edit_customer_id,
                "lms_edit_application_id":$scope.lms_edit_application_id,
                "lms_cus_type" : $('[name="lms_car_cus_type"]:checked').val(),
           
                "product_type" : productType,  
                "hme_sum_insured": $('#lms_car_sum_insured').val() || $('#hme_sum_insured').val(),//$scope.hme_sum_insured,
                "lms_premium":  $('#lms_est_premium').val(),
                "lms_edit_product_id":$scope.lms_edit_product_id,

                "pa_pro_policy_sdate":$scope.pa_pro_policy_sdate,
                // Options
                "pa_pro_suffered": pa_pro_suffered,
                "pa_pro_Sonography": pa_pro_Sonography,
                "pa_pro_surgery": pa_pro_surgery,
                "pa_pro_medication": pa_pro_medication,

                //Nominee Details
                "pa_pro_nomie_name" : $scope.pa_pro_nname,
                "pa_pro_nomie_relation": $scope.pa_pro_nomie_relation,
                "pa_pro_nomie_age" : $scope.pa_pro_nomie_age,
                "pa_pro_nameofappoint": $scope.pa_pro_nameofappoint,
                "pa_pro_appoint_relation": $scope.pa_pro_appoint_relation,
                "pa_similar_policy_comment": $scope.similar_policy_comment,

                "lms_car_comment":lms_car_comment,

                "lms_edit_proposal_id": $scope.lms_edit_proposal_id,
                "lms_edit_nominee_id": $scope.lms_edit_nominee_id,
                "lms_edit_option_id":$scope.lms_edit_option_id,
                "comment_Date":$scope.functionGetDate(),
             }
             $scope.updateleadhome = false;
            $scope.updateleadhomeprg = true

             var url = __pathname + "LmsCombo/lmsUpdateCustomerDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = Object(response.data);
                var responceDataR = Object(responseData);
                if (responceDataR.status == true) {
                    $scope.updateleadhome = true;
                    $scope.updateleadhomeprg = false;
                    alert('Succesfully posted values, Lead Number is '+ responceDataR.message);
                    location.reload();
                     $("#comboedit :input").prop("disabled", true);
                } else {
                    alert(responceDataR.message);
                    return false;
                }
                
            });
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
	
	
});