var app = angular.module('plunker', ['ngMessages']);

app.controller('myCtrl', function($scope, $http,$timeout,$rootScope) {
    
    $scope.emiObj={
    lms_cus_emi:"",
    lms_cus_emi_yr:""
};
  

$scope.child1={};
$scope.child2={};
$scope.child3={};
$scope.spouse={};
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
				  $scope.zonewisecalculation();
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
		var ss_crtical = $('#ss_crtical');
		var criticalcheck=0;
		var criticalValue=0;
		if(ss_crtical.is(':checked')){
			
			//if(data == 'critical'){
				$(".answer1").show();
				$(".sumInsured").show();
			//}
			
			 criticalcheck = 1;
			 criticalValue = $('#ss_sum_insured_critical').val();
		} else {
			$(".answer1").hide();
			$(".sumInsured").hide();
		}
		
		//
       // 
		 
		var ss_hospital_daily = $('#ss_hospital_daily');
		var Spouse_ship = $('#Spouse_ship');
		var checkhospital=0;
		if(ss_hospital_daily.is(':checked')){
			checkhospital = 1;
		}
		if(Spouse_ship.is(':checked')){
			selectedspouse = 1;
		}
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
	} else {
		return false;
	}
}

$scope.onEmiChange = function(){
    if($scope.emiObj.lms_cus_emi!="Yes"){
        $scope.emiObj.lms_cus_emi_yr="";
    }
};

$scope.onBmical=function(){
    var height=parseInt($scope.sship_pro_height);
    var weight=parseInt($scope.sship_pro_Weight);
    var BMI=weight/height/height*10000;
    if(BMI<15 || BMI>34){
        alert("Lead Cannot be saved, BMI exceeding limits");
        return false;
    }
    else{
        return true;
    }
};

$scope.onBmicalspouse=function(){
    var height=parseInt($scope.spouse.spouse_height);
    var weight=parseInt($scope.spouse.spouse_weight);
    var BMI=weight/height/height*10000;
    if(BMI<15 || BMI>34){
        alert("Lead Cannot be saved, BMI exceeding limits");
        return false;
    }
    else{
        return true;
    }
};

$scope.onBmicalchild1=function(){
    var height=parseInt($scope.child1.child1_height);
    var weight=parseInt($scope.child1.child1_weight);
    var BMI=weight/height/height*10000;
    if(BMI<15 || BMI>34){
        alert("Lead Cannot be saved, BMI exceeding limits");
        return false;
    }
    else{
        return true;
    }
};

$scope.onBmicalchild2=function(){
    var height=parseInt($scope.child2.child2_height);
    var weight=parseInt($scope.child2.child2_weight);
    var BMI=weight/height/height*10000;
    if(BMI<15 || BMI>34){
        alert("Lead Cannot be saved, BMI exceeding limits");
        return false;
    }
    else{
        return true;
    }
};

$scope.onBmicalchild3=function(){
    var height=parseInt($scope.child3.child3_height);
    var weight=parseInt($scope.child3.child3_weight);
    var BMI=weight/height/height*10000;
    if(BMI<15 || BMI>34){
        alert("Lead Cannot be saved, BMI exceeding limits");
        return false;
    }
    else{
        return true;
    }
};

$scope.loadSpouseDate=function(){
    $( "#sship_spouse" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            minDate: 0, // your min date
            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
          
        });
    $('#sship_spouse').on('change', function(){
        var insertedDate = $(this).val();
        ///alert(insertedDate);
        if(insertedDate != ''){
          
          var calculateAge= calculateSpouseAge(insertedDate);
            if(calculateAge==false){

                alert('spouse age should be greater than 18 years');
                $('#sship_spouse').val('');
                $('#sship_spouse').focus();

            }
        }        
      });
}
 
   $scope.child1Age=function(){
     
        $( "#child1_dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            minDate: 0, // your min date
            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
          
        });


    
    $('#child1_dob').on('change', function(){
        var insertedDate1 = $(this).val();
        //alert(insertedDate);
        if(insertedDate1 != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate1);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate1);
                $('#child1_dob').val('');
                $('#child1_dob').focus();
            }
        }
    });
}

 $scope.child2Age=function(){
     
        $( "#child2_dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            minDate: 0, // your min date
            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
          
        });


    
    $('#child2_dob').on('change', function(){
        var insertedDate2 = $(this).val();
        //alert(insertedDate);
        if(insertedDate2 != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate2);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate2);
                $('#child2_dob').val('');
                $('#child2_dob').focus();
            }
        }
    });
}




 $scope.child3Age=function(){
     
        $( "#child3_dob" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
            todayHighlight: true,
            autoclose: true,
            minDate: 0, // your min date
            maxDate: '+1w', // one week will always be 5 business day - not sure if you are including current day
          
        });


    
    $('#child3_dob').on('change', function(){
        var insertedDate3 = $(this).val();
        //alert(insertedDate);
        if(insertedDate3 != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate3);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate3);
                $('#child3_dob').val('');
                $('#child3_dob').focus();
            }
        }
    });
}

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
     function calculateSpouseAge(dateofbirth){
       
		var date2String = dateofbirth;
		
		var selectedDate = date2String.toString();
		var splitdate = selectedDate.split('-');
	
		var yearThen = parseInt(splitdate[2]);
        var monthThen = parseInt(splitdate[1]);
        var dayThen = parseInt(splitdate[0]);
		
		var birthday = new Date(yearThen, monthThen-1, dayThen);
		
        var today = new Date();
		
		var differenceInMilisecond = today.valueOf() - birthday.valueOf();
	
		var years = Math.floor(differenceInMilisecond / 31536000000);
		
		 if(years < 18) {
                return false;
                } else {
					return true;
				}
        /*var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '-' + mm + '-' + yyyy;
        today = new Date(today.split('-')[2], today.split('-')[1] - 1, today.split('-')[0]);
        date2 = new Date(date2.split('-')[2], date2.split('-')[1] - 1, date2.split('-')[0]);
        var timeDiff = Math.abs(date2.getTime() - today.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
        var months = Math.floor(diffDays / 31);
        var years = Math.floor(months / 12);

           if(years < 18) {
                
                return false;
                }  
             else{
                return true;
             }*/   
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

    

/*$scope.autoPopulate = function(){
    $scope.onPrimaryInsured();
}*/

$scope.onFormSubmit = function(){
    $rootScope.$broadcast("setFormValues",{
       "ship_tax_salut": $('#lms_car_salut').val(),
       "ship_tax_your_name": $('#lms_car_fname').val(),
       "ship_tax_primary_relation": $('#sship_pro_nomie_relation').val(),
       "ship_tax_dob": $('#lms_car_dob').val(),
       "ship_tax_gender": $('#lms_car_gender').val(),
       "ship_tax_addr1": $('#lms_car_add1').val(),
       "ship_tax_addr2": $('#lms_car_add2').val(),
       "ship_tax_landmark": $('#lms_car_pro_landmark').val(),
       "ship_tax_fixed_line": $('#lms_car_pro_emergency').val(),
       "ship_tax_mobile_no": $('#lms_car_mobile').val(),
       "ship_tax_email_id": $('#lms_car_email').val(),
       "ship_tax_occupation": $('#lms_car_pro_occupation').val(),
       "ship_tax_income": $('#sship_income').val(),
       "self_salut": $('#lms_car_salut').val(),
       "self_fname": $('#lms_car_fname').val(),
       "self_lname": $('#lms_car_lname').val(),
       "self_dob": $('#lms_car_dob').val(),
       "self_gender": $('#lms_car_gender').val(),
       "spouse_dob":$('#sship_spouse').val(),
       "self_occupation": $('#lms_car_pro_occupation').val(),
        "Spouse_ship": $scope.spouse.spouse_ship,
       "noofchildrens":$scope.noofchildrens
    });
}

/*$scope.onPrimaryInsured=function(){
    $("#ship_tax_salut").val($('#lms_car_salut').val());
    $("#ship_tax_your_name").val($('#lms_car_fname').val());
    $("#ship_tax_primary_relation").val($('#sship_pro_nomie_relation').val());
    $("#ship_tax_dob").val($('#lms_car_dob').val());
    $("#ship_tax_gender").val($('#lms_car_gender').val());
    $("#ship_tax_addr1").val($('#lms_car_add1').val());
    $("#ship_tax_addr2").val($('#lms_car_add2').val());
    $("#ship_tax_landmark").val($('#lms_car_pro_landmark').val());
    $("#ship_tax_fixed_line").val($('#lms_car_pro_emergency').val());
    $("#ship_tax_mobile_no").val($('#lms_car_mobile').val());
    $("#ship_tax_email_id").val($('#lms_car_email').val());
    $("#ship_tax_occupation").val($('#lms_car_pro_occupation').val());
    $("#ship_tax_income").val($('#sship_income').val());
   // $timeout($scope.$apply(),1000);
};*/

$scope.$on("setFormValues",function(evt,data){
    $scope.ship_tax_salut=data.ship_tax_salut;
    $scope.ship_tax_your_name=data.ship_tax_your_name;
    $scope.ship_tax_primary_relation=data.ship_tax_primary_relation;
    $scope.ship_tax_dob=data.ship_tax_dob;
    $scope.ship_tax_gender=data.ship_tax_gender;
    $scope.ship_tax_addr1=data.ship_tax_addr1;
    $scope.ship_tax_addr2=data.ship_tax_addr2;
    $scope.ship_tax_landmark=data.ship_tax_landmark;
    $scope.ship_tax_fixed_line=data.ship_tax_fixed_line;
    $scope.ship_tax_mobile_no=data.ship_tax_mobile_no;
    $scope.ship_tax_email_id=data.ship_tax_email_id;
    $scope.ship_tax_occupation=data.ship_tax_occupation;
    $scope.ship_tax_income=data.ship_tax_income;
    $scope.self_salut=data.self_salut;
    $scope.self_fname=data.self_fname;
    $scope.self_lname=data.self_lname;
    $scope.self_dob=data.self_dob;
    $scope.self_gender=data.self_gender;
    $scope.self_occupation=data.self_occupation;
    $scope.spouse.spouse_dob=data.spouse_dob;
    $scope.spouse.spouse_ship=data.Spouse_ship;
    $scope.noofchildrens=data.noofchildrens;
});

/*$scope.autoPopulateSelf=function(){
     $("#self_salut").val($('#lms_car_salut').val());
     $("#self_fname").val($('#lms_car_fname').val());
     $("#self_lname").val($('#lms_car_lname').val());
     $("#self_dob").val($('#lms_car_dob').val());
     $("#self_gender").val($('#lms_car_gender').val());
     $("#self_occupation").val($('#lms_car_pro_occupation').val());
     //$timeout($scope.$apply(),1500);
}*/

$scope.sync=function(){
    $timeout(function(){$scope.$apply()},1000);
}

$scope.onQuestionnaire=function(){

    if(parseInt($scope.sship_pro_suffered)==1||parseInt($scope.sship_pro_diseases)==1||parseInt($scope.sship_pro_psychiatric)==1
        ||parseInt($scope.sship_pro_medication)==1||parseInt($scope.sship_pro_cyst)==1||parseInt($scope.sship_pro_bltest)==1||
        parseInt($scope.sship_pro_diabetes)==1||parseInt($scope.sship_pro_advice)==1||parseInt($scope.sship_pro_gutka)==1||
        parseInt($scope.spouse.spouse_suffered)==1||parseInt($scope.spouse.spouse_diseases)==1||parseInt($scope.spouse.spouse_psychiatric)==1||parseInt($scope.spouse.spouse_medication)==1
        ||parseInt($scope.spouse.spouse_fibroid)==1||parseInt($scope.spouse.spouse_cyst)==1||parseInt($scope.spouse.spouse_bltest)==1||parseInt($scope.spouse.spouse_diabetes)==1
        ||parseInt($scope.spouse.spouse_pregnant)==1||parseInt($scope.spouse.spouse_advice)==1||parseInt($scope.spouse.spouse_gutka)==1||parseInt($scope.child1.child1_suffered)==1||
        parseInt($scope.child1.child1_diseases)==1||parseInt($scope.child1.child1_psychiatric)==1||parseInt($scope.child1.child1_medication==1)||parseInt($scope.child1.child1_cyst)==1||
        parseInt($scope.child1.child1_bltest)==1||parseInt($scope.child1.child1_diabetes)==1||parseInt($scope.child1.child1_advice==1)||parseInt($scope.child1.child1_gutka)==1||
        parseInt($scope.child2.child2_suffered)==1||parseInt($scope.child2.child2_diseases)==1||parseInt($scope.child2.child2_psychiatric)==1||parseInt($scope.child2.child2_medication)==1
        ||parseInt($scope.child2.child2_cyst)==1||parseInt($scope.child2.child2_bltest)==1||parseInt($scope.child2.child2_diabetes)==1||parseInt($scope.child2.child2_advice)==1||
        parseInt($scope.child2.child2_gutka)==1||parseInt($scope.child3.child3_suffered)==1||parseInt($scope.child3.child3_diseases)==1||parseInt($scope.child3.child3_psychiatric)==1||
        parseInt($scope.child3.child3_medication)==1||parseInt($scope.child3.child3_cyst)==1||parseInt($scope.child3.child3_bltest)==1||parseInt($scope.child3.child3_diabetes)==1||
        parseInt($scope.child3.child3_advice)==1||parseInt($scope.child3.child3_gutka)==1){
            
            alert("Lead Cannot be generated");
            return false;
            
    }else{
        return true;
    }
};


    var productType = $('#product_type').val();
    var web_url = $('#web_url').val();
    var leadId =  $('#lead_id').val();
        
        var paramsArray = {"leadId": leadId,}
        var url = web_url+"LmsCar/lmsGetLeadDetailsByJson/";
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
            // by madhesh
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

            $scope.lms_car_reg_no = response.data[0]['reg_number'];           
            $scope.lms_car_manufacture_year = response.data[0]['manufacture_year'];           
            $scope.lms_car_manufacturer = response.data[0]['manufacturer'];           
            $scope.lms_car_variant = response.data[0]['model_varient'];           
            $scope.lms_car_reg_city = response.data[0]['registration_city'];           
            $scope.lms_car_policy_exp_date = response.data[0]['policy_expire_date'];           
            $('#lms_car_idv').val(response.data[0]['IDV_value']) ;           
            $scope.lms_car_claim_policy = response.data[0]['expiring_policy_claim'];           
            $scope.lms_car_ncb = response.data[0]['expiring_policy_NCB'];           
            $scope.lms_est_premium = response.data[0]['lms_premium'];  

            $scope.lms_car_prop_existing_insure = response.data[0]['existing_insure'];
            $scope.lms_car_pro_existing_policynum = response.data[0]['existing_policy_num'];
            $scope.lms_car_pro_existing_policy_expiry = response.data[0]['existing_policy_expiry'];
            $scope.lms_car_pro_policy_start = response.data[0]['new_policy_start'];
            $scope.lms_car_pro_regis_date = response.data[0]['prop_mtr_reg_date'];
            $scope.lms_car_pro_engine_num = response.data[0]['prop_mtr_engine_num'];
            $scope.lms_car_pro_chasis_num = response.data[0]['prop_mtr_chasis_num'];
           
            
//alert(response.data[0]['prop_mtr_prev_stand_alone']);            
//lms_car_pro_prev_stand_alone_yes

if(response.data[0]['prop_mtr_prev_stand_alone'] == '1') { $("#uniform-lms_car_pro_prev_stand_alone_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_stand_alone_no span").addClass("checked", true);}
if(response.data[0]['prop_mtr_prev_prev_depre'] == '1') { $("#uniform-lms_car_pro_prev_depre_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_depre_no span").addClass("checked", true);}
if(response.data[0]['prop_mtr_prev_prev_electric'] == '1') { $("#uniform-lms_car_pro_prev_electric_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_electric_no span").addClass("checked", true);}
if(response.data[0]['prop_mtr_prev_prev_cng_lpg'] == '1') { $("#uniform-lms_car_pro_prev_cng_lpg_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_cng_lpg_no span").addClass("checked", true);}

if(response.data[0]['prop_mtr_financed'] == '1') { 
    $('#vechicle_finiance_div').show();
    $("#uniform-lms_car_pro_financed_yes span").addClass("checked", true);
} else {
    $('#vechicle_finiance_div').hide();
    $("#uniform-lms_car_pro_financed_no span").addClass("checked", true);
}

var clainprevious = response.data[0]['hme_previous_claims'];

if(clainprevious == 'yes'){
	$('#claim_detail_div').attr('style','border: 1px solid #CCC; padding: 10px; margin-top: 20px; display:bock');
} else {
	$('#claim_detail_div').attr('style','border: 1px solid #CCC; padding: 10px; margin-top: 20px; display:none');
}
            $scope.lms_car_pro_fin_ins_name = response.data[0]['prop_mtr_fin_ins_name'];
            $scope.lms_car_pro_fin_ins_city = response.data[0]['prop_mtr_fin_ins_city'];           
            $scope.lms_car_pro_nname = response.data[0]['nominee_name'];
            $scope.lms_car_pro_nage = response.data[0]['nominee_age'];
            $scope.lms_car_pro_nomie_relation = response.data[0]['nominee_relationship'];
            $scope.lms_car_pro_nameofappoint = response.data[0]['appointee_name'];
            $scope.lms_car_pro_appoint_relation = response.data[0]['appointee_relationship'];
            $scope.lms_car_pro_drive = response.data[0]['driving_exp'];
            $scope.lms_car_pro_parking = response.data[0]['night_parking'];
            $scope.lms_car_pro_who_drive = response.data[0]['driver_count'];
            $scope.lms_car_pro_kms = response.data[0]['KM_per_year'];
            $scope.lms_car_pro_ydage = response.data[0]['young_driver_age'];
            $scope.lms_lms_car_pro_driver = response.data[0]['ext_driver'];
            $scope.hme_building_type = response.data[0]['hme_building_type']; 
            $scope.hme_property_ownership= response.data[0]['hme_property_ownership']; 
            $scope.hme_property_type= response.data[0]['hme_property_type']; 
            $scope.hme_previous_claims= response.data[0]['hme_previous_claims']; 
            $scope.hme_no_of_floors= response.data[0]['hme_no_of_floors']; 
            $scope.hme_year_of_construction= response.data[0]['hme_year_of_construction']; 
            $scope.hme_independent_house= response.data[0]['hme_independent_house']; 
            $scope.hme_compound_wall= response.data[0]['hme_compound_wall']; 
            $scope.hme_build_up= response.data[0]['hme_build_up'];
            $scope.hme_sum_insured = response.data[0]['sum_insured'];
            $scope.hme_sum_insured_provided= response.data[0]['hme_sum_insured_provided']; 
            $scope.hme_risk_address_same = response.data[0]['hme_risk_address_same']; 
            $scope.hme_risk_address1= response.data[0]['hme_risk_address1']; 
            $scope.hme_risk_address2= response.data[0]['hme_risk_address2']; 
            $scope.hme_risk_area= response.data[0]['hme_risk_area']; 
            $scope.hme_risk_pincode= response.data[0]['hme_risk_pincode']; 
            $scope.hme_risk_state= response.data[0]['hme_risk_state']; 
            $scope.hme_risk_city= response.data[0]['hme_risk_city']; 
            $scope.hme_risk_nearest_land_mark= response.data[0]['hme_risk_nearest_land_mark'];
            //$scope.lms_car_comment = response.data[0]['comment'];


            //home related  
            //$scope.Home_policy_start = response.data[0]['home_policy_start'];
            // $('#Home_policy_start').val(response.data[0]['home_policy_start']);
            // $scope.Home_policy_end = response.data[0]['home_policy_end'];
            //$('#Home_policy_end').val(response.data[0]['home_policy_end']);
            $scope.home_pro_policy_sdate = response.data[0]['new_policy_start'];
            // $('#home_pro_policy_sdate').val(response.data[0]['new_policy_start']);
            $scope.home_pro_nname = response.data[0]['nominee_name'];
            $scope.home_pro_nomie_age = response.data[0]['nominee_age'];
            $scope.home_pro_nomie_relation = response.data[0]['nominee_relationship'];
            $scope.home_pro_nameofappoint = response.data[0]['appointee_name'];
            $scope.home_pro_appoint_relation = response.data[0]['appointee_relationship'];

            //$scope.pa_pro_appoint_relation = response.data[0]['appointee_relationship'];
            $('#pa_pro_appoint_relation').val(response.data[0]['appointee_relationship']);
            $scope.fname_mem2= response.data[0][''];

            //ship related...
           // $scope.spouse.spouse_ship.active = true;
           // $scope.noofchildrens = 0; 
            $scope.ss_sum_insured=response.data[0]['sum_insured'];
            if(response.data[0]['ship_spouse_include'] == 1){
                $("#uniform-Spouse_ship span").addClass("checked", true);
                $("#Spouse_ship").prop("checked",true);
                $(".answer").show();
                $("#spouse-propsal-details").show();
                $scope.sship_spouse =  response.data[0]['ship_spouse_dob'];
                $scope.spouse.spouse_DOB =  response.data[0]['ship_spouse_dob'];
            }
			//pa_pro_nameofappoint
            $scope.sship_pro_Weight= response.data[0]['sship_pro_Weight'];
            $scope.sship_pro_height= response.data[0]['sship_pro_height'];
            $("#uniform-noofchildrens0 span").removeClass("checked");
            $("#uniform-noofchildrens1 span").removeClass("checked");
            $("#uniform-noofchildrens2 span").removeClass("checked");
            $("#uniform-noofchildrens3 span").removeClass("checked");
            switch(response.data[0]['ship_no_of_children']){
                case '0':
                   $("#uniform-noofchildrens0 span").addClass("checked", true);
                   // $("#noofchildrens0").trigger("click");
                    $scope.noofchildrens="0";

                    break;
                case '1':
                    $("#uniform-noofchildrens1 span").addClass("checked", true);
                    $scope.noofchildrens="1";
                   // $("#noofchildrens1").trigger("click");
                    break;
                case '2':
                    $("#uniform-noofchildrens2 span").addClass("checked", true);
                    $scope.noofchildrens="2";
                   // $("#noofchildrens2").trigger("click");
                    break;
                case '3':
                    $("#uniform-noofchildrens3 span").addClass("checked", true);
                    $scope.noofchildrens="3";
                   // $("#noofchildrens3").trigger("click");
                    break;

                default:
                    $("#uniform-noofchildrens0 span").addClass("checked", true);
                    $scope.noofchildrens="0";
                   // $("#noofchildrens0").trigger("click");
                    break;
            }
           // showChildrenDiv($scope.noofchildrens);

//$scope.ship_pro_doc_name ='fdfdsfsdf';

    $scope.sship_income =  response.data[0]['ship_income'];
    $scope.policyterm =  response.data[0]['ship_policy_term'];
    $scope.sship_pro_policy_start = response.data[0]['new_policy_start'];

    var memberDetails = response.data[0]['member_details'];

    //Populate Spouse
   for (i = 0; i < memberDetails.length; i++) {
       
        if(memberDetails[i].mem_type=="Spouse")
        {
            $scope.spouse.spouse_salut=memberDetails[i].mem_title;
            $scope.spouse.spouse_fname=memberDetails[i].mem_first_name;
            $scope.spouse.spouse_lname=memberDetails[i].mem_last_name;
            $scope.spouse.spouse_dob=memberDetails[i].mem_DOB;
            $scope.spouse.spouse_gender=memberDetails[i].mem_gender;
            $scope.spouse.spouse_occupation=memberDetails[i].mem_ocupation;
            $scope.spouse.spouse_height=memberDetails[i].mem_height;
            $scope.spouse.spouse_weight=memberDetails[i].mem_weight;
            $scope.spouse.spouse_ship=true;
        }

           if(memberDetails[i].mem_type=="Child 1"){

            $scope.child1.child1_salut=memberDetails[i].mem_title;
            $scope.child1.child1_fname=memberDetails[i].mem_first_name;
            $scope.child1.child1_lname=memberDetails[i].mem_last_name;
            $scope.child1.child1_dob=memberDetails[i].mem_DOB;
            $scope.child1.child1_gender=memberDetails[i].mem_gender;
            $scope.child1.child1_occupation=memberDetails[i].mem_ocupation;
            $scope.child1.child1_height=memberDetails[i].mem_height;
            $scope.child1.child1_weight=memberDetails[i].mem_weight;
			$scope.child1option=memberDetails[i].option_id;
            $scope.noofchildrens='1';
             }

             if(memberDetails[i].mem_type=="Child 2"){

            $scope.child2.child2_salut=memberDetails[i].mem_title;
            $scope.child2.child2_fname=memberDetails[i].mem_first_name;
            $scope.child2.child2_lname=memberDetails[i].mem_last_name;
            $scope.child2.child2_dob=memberDetails[i].mem_DOB;
            $scope.child2.child2_gender=memberDetails[i].mem_gender;
            $scope.child2.child2_occupation=memberDetails[i].mem_ocupation;
            $scope.child2.child2_height=memberDetails[i].mem_height;
            $scope.child2.child2_weight=memberDetails[i].mem_weight;
            $scope.noofchildrens='2';
             }
            
             if(memberDetails[i].mem_type=="Child 3"){

            $scope.child3.child3_salut=memberDetails[i].mem_title;
            $scope.child3.child3_fname=memberDetails[i].mem_first_name;
            $scope.child3.child3_lname=memberDetails[i].mem_last_name;
            $scope.child3.child3_dob=memberDetails[i].mem_DOB;
            $scope.child3.child3_gender=memberDetails[i].mem_gender;
            $scope.child3.child3_occupation=memberDetails[i].mem_ocupation;
            $scope.child3.child3_height=memberDetails[i].mem_height;
            $scope.child3.child3_weight=memberDetails[i].mem_weight;
            $scope.noofchildrens='3';
             }



        /*if(memberDetails[i].mem_type.indexOf("Child")===0){
            var childNumber=memberDetails[i].mem_type.split(/\s+/)[1];
            $scope["child"+childNumber+".child"+childNumber+"_salut"]=memberDetails[i].mem_title;
            $scope["child"+childNumber+".child"+childNumber+"_fname"]=memberDetails[i].mem_first_name;
            $scope["child"+childNumber+".child"+childNumber+"_lname"]=memberDetails[i].mem_last_name;
            $scope["child"+childNumber+".child"+childNumber+"_dob"]=memberDetails[i].mem_DOB;
            $scope["child"+childNumber+".child"+childNumber+"_gender"]=memberDetails[i].mem_gender;
            $scope["child"+childNumber+".child"+childNumber+"_height"]=memberDetails[i].mem_height;
            $scope["child"+childNumber+".child"+childNumber+"_weight"]=memberDetails[i].mem_weight;
            $scope.noofchildrens=true;
        }*/
      }

    var i = 0;
	
    for (i = 0; i < memberDetails.length; i++) { 
    var b = i+1;
        var filed_salut = 'salut_mem'+b; 
        var filed_fname = 'fname_mem'+b; 
        var filed_lname = 'lname_mem'+b; 
        var filed_dob   = 'dob_mem'+b; 
       //delivery_date

        var filed_gender    = 'gender_mem'+b; 
        var filed_occup     = 'occupation_mem'+b; 
        var filed_height    = 'height_mem'+b; 
        var filed_weight    = 'weight_mem'+b;
		
		var update_id='';
		if(memberDetails[i].mem_type=="Self"){
		update_id = 'edit_option_id1';
		} else if(memberDetails[i].mem_type=="Spouse"){
		update_id = 'edit_option_id2';
		} else if(memberDetails[i].mem_type=="Child 1"){
		update_id = 'edit_option_id3';
		} else if(memberDetails[i].mem_type=="Child 2"){
		update_id = 'edit_option_id4';
		} else if(memberDetails[i].mem_type=="Child 3"){
		update_id = 'edit_option_id5';
		}
		
		
        $scope[filed_salut] = memberDetails[i]['mem_title'];
        $scope[filed_fname] = memberDetails[i]['mem_first_name'];
        $scope[filed_lname] = memberDetails[i]['mem_last_name'];
        $scope[filed_dob]   = memberDetails[i]['mem_DOB'];
        $scope[update_id]   = memberDetails[i]['option_id'];

        $scope[filed_gender]  = memberDetails[i]['mem_gender'];
        $scope[filed_occup]   = memberDetails[i]['mem_ocupation'];
        $scope[filed_height]  = memberDetails[i]['mem_height'];
        $scope[filed_weight]  = memberDetails[i]['mem_weight'];

        var filed_delivery_date   = 'delivery_date_mem'+b; 
        var filed_smoke   = 'smoke_mem'+b; 
        var filed_alcohol   = 'alcohol_mem'+b; 
        var filed_pan_masala   = 'pan_masala_mem'+b;
        var filed_others   = 'others_mem'+b; 
        
        //alert(memberDetails[i]['delivery_date']);
        $scope[filed_delivery_date]  = memberDetails[i]['delivery_date'];
        $scope[filed_smoke]  = memberDetails[i]['smoke'];
        $scope[filed_alcohol]  = memberDetails[i]['alcohol'];
        $scope[filed_pan_masala]  = memberDetails[i]['pan_masala'];
        $scope[filed_others]  = memberDetails[i]['others'];


if(memberDetails[i]['option_1'] == '1') { $("#uniform-ship_suffered_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_suffered_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_2'] == '1') { $("#uniform-ship_diseases_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_diseases_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_3'] == '1') { $("#uniform-ship_psychiatric_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_psychiatric_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_4'] == '1') { $("#uniform-ship_medication_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_medication_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_5'] == '1') { $("#uniform-ship_fibroid_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_fibroid_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_6'] == '1') { $("#uniform-ship_cyst_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_cyst_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_7'] == '1') { $("#uniform-ship_bltest_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_bltest_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_8'] == '1') { $("#uniform-ship_diabetes_yes_mem"+b+" span").addClass("checked", true);} else {$("#uniform-ship_diabetes_no_mem"+b+" span").addClass("checked", true);}
if(memberDetails[i]['option_9'] == '1') { 
    $("#uniform-ship_pregnant_yes_mem"+b+" span").addClass("checked", true);
    $('#spouse_delivery_date_div'+b).show();
} else {
    $("#uniform-ship_pregnant_no_mem"+b+" span").addClass("checked", true);
    $('#spouse_delivery_date_div'+b).hide();
}
if(memberDetails[i]['option_10'] == '1') {
    $("#uniform-ship_treatment_yes_mem"+b+" span").addClass("checked", true);
    $('#spouse_treatment_div'+b).show();
} else {
    $("#uniform-ship_treatment_no_mem"+b+" span").addClass("checked", true);
    $('#spouse_treatment_div'+b).hide();
}
if(memberDetails[i]['option_11'] == '1') { 
    $("#uniform-ship_gutka_yes_mem"+b+" span").addClass("checked", true);
    $('#spouse_gutka_div'+b).show();
} else {
    $("#uniform-ship_gutka_no_mem"+b+" span").addClass("checked", true);
    $('#spouse_gutka_div'+b).hide();
}
       

var medicalArray =  memberDetails[i]['medical_history'];
//alert(medicalArray.length)

        for (j = 0; j < medicalArray.length; j++) { 
            var x = j+1;
           // alert(medicalArray[j]['diseases_name']);
            //if (typeof medicalArray[j]['diseases_name'] === 'undefined') {
            //if (medicalArray[j]['diseases_name'] !== "") {
           
                var fieled_surgery_name = 'surgery_name'+x+'_mem'+b; 
                var fieled_diagnosis_date = 'diagnosis_date'+x+'_mem'+b; 
                var fieled_date_consultation = 'date_consultation'+x+'_mem'+b; 
                var fieled_treatment_type = 'treatment_type'+x+'_mem'+b; 
                var fieled_hospital_name = 'hospital_name'+x+'_mem'+b; 

                var fieled_medical_update_id = 'medical_update_id'+x+'_mem'+b; 
                        
                $scope[fieled_surgery_name]  = medicalArray[j]['diseases_name'];
                $scope[fieled_diagnosis_date]  = medicalArray[j]['diagnosis_date'];
                $scope[fieled_date_consultation]  = medicalArray[j]['last_consultation'];
                $scope[fieled_treatment_type]  = medicalArray[j]['treatment_type'];
                $scope[fieled_hospital_name]  = medicalArray[j]['hospital_name'];

                $scope[fieled_medical_update_id]  = medicalArray[j]['history_id'];
            //}    
        }    
    };    


        $scope.sship_pro_doc_name = response.data[0]['sship_pro_doc_name'];
        $scope.sship_pro_doc_qualifi = response.data[0]['sship_pro_doc_qualifi'];
        $scope.sship_pro_doc_addr = response.data[0]['sship_pro_doc_addr'];
        $scope.sship_pro_doc_mobile = response.data[0]['sship_pro_doc_mobile'];
        $scope.sship_pro_hos_num = response.data[0]['sship_pro_hos_num'];

        $scope.sship_pro_nname = response.data[0]['nominee_name'];
        $scope.sship_pro_nomie_age = response.data[0]['nominee_age'];
        $scope.sship_pro_nomie_relation = response.data[0]['nominee_relationship'];
        $scope.sship_pro_nameofappoint = response.data[0]['appointee_name'];
        $scope.sship_pro_appoint_relation = response.data[0]['appointee_relationship'];
        if(response.data[0]['ss_hospital_daily']=="1"){
            $("#uniform-ss_hospital_daily span").addClass("checked", true);
            $scope.ss_hospital_daily=true;
        }
        if(response.data[0]['ss_critical']=="1"){
            $("#uniform-ss_crtical span").addClass("checked", true);
            $(".answer1").show();
            $scope.ss_critical=true;
        }
        $scope.ss_sum_insured_critical= response.data[0]['ss_sum_insured_critical'];


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

 
if(response.data[0]['ship_pre_insurer'] == '1') { 

    $("#uniform-pre_ins_portability_yes span").addClass("checked", true);
    $('#portability_div').show();
} else {
    $("#uniform-pre_ins_portability_no span").addClass("checked", true);
    $('#portability_div').hide();
}

if(response.data[0]['ship_primary_insured'] == '1') { 
    $("#ship_tax_primary_insured_yes").parent().addClass("checked", true);
    $scope.ship_tax_primary_insured="1";
    $('#tax_primary_insured_div').hide();
} else {
    $("#ship_tax_primary_insured_no").parent().addClass("checked", true);
    $scope.ship_tax_primary_insured="0";
    $('#tax_primary_insured_div').show();
}

    var primaryInsuredArray =  response.data[0]['primary_insured'];
if (typeof primaryInsuredArray !== 'undefined' && primaryInsuredArray.length > 0) {
    $scope.ship_tax_salut       =  primaryInsuredArray[0]['prim_title'];
    $scope.ship_tax_your_name   =  primaryInsuredArray[0]['prim_name'];
    $scope.ship_tax_primary_relation =  primaryInsuredArray[0]['prim_relation'];
    $scope.ship_tax_dob         =  primaryInsuredArray[0]['prim_dob'];
    $scope.ship_tax_gender      =  primaryInsuredArray[0]['prim_gender'];
    $scope.ship_tax_addr1       =  primaryInsuredArray[0]['prim_addr1'];
    $scope.ship_tax_addr2       =  primaryInsuredArray[0]['prim_addr2'];
    $scope.ship_tax_landmark    =  primaryInsuredArray[0]['prim_landmark'];
    $scope.ship_tax_fixed_line  =  primaryInsuredArray[0]['prim_fixed_line'];
    $scope.ship_tax_mobile_no   =  primaryInsuredArray[0]['prim_mobile'];
    $scope.ship_tax_email_id    =  primaryInsuredArray[0]['prim_email'];
    $scope.ship_tax_occupation  =  primaryInsuredArray[0]['prim_occupation'];
    $scope.ship_tax_income      =  primaryInsuredArray[0]['prim_income'];
    $scope.ship_tax_PPC_no      =  primaryInsuredArray[0]['prim_PPC_No'];
    $scope.edit_prim_ins_id     =  primaryInsuredArray[0]['prim_ins_id'];

    if(primaryInsuredArray[0]['prim_nationality'] == '1') { 
        $("#ship_tax_nationality_yes").parent().addClass("checked", true);
        $scope.ship_tax_nationality="1";
        $('#ship_tax_nationality_yes').prop("checked",true);
    } else {
        $("#ship_tax_nationality_no").parent().addClass("checked", true);
        $scope.ship_tax_nationality="0";
        $('#ship_tax_nationality_no').prop("checked",true);
    }
}


$scope.ctill_pro_policy_sdate = response.data[0]['new_policy_start'];
if(response.data[0]['option_1'] == '1') { $("#uniform-ctill_pro_suffered_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_suffered_no span").addClass("checked", true);}
if(response.data[0]['option_2'] == '1') { $("#uniform-ctill_pro_Sonography_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_Sonography_no span").addClass("checked", true);}
if(response.data[0]['option_3'] == '1') { $("#uniform-ctill_pro_surgery_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_surgery_no span").addClass("checked", true);}
if(response.data[0]['option_4'] == '1') { $("#uniform-ctill_pro_medication_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_medication_no span").addClass("checked", true);}
if(response.data[0]['option_5'] == '1') { $("#uniform-ctill_pro_Patient_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_Patient_no span").addClass("checked", true);}
if(response.data[0]['option_6'] == '1') { $("#uniform-ctill_pro_breathing_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_breathing_no span").addClass("checked", true);}
if(response.data[0]['option_7'] == '1') { $("#uniform-ctill_pro_illness_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_illness_no span").addClass("checked", true);}
if(response.data[0]['option_8'] == '1') { $("#uniform-ctill_pro_prosemi_yes span").addClass("checked", true);} else {$("#uniform-ctill_pro_prosemi_no span").addClass("checked", true);}


            $scope.ctill_pro_nname = response.data[0]['nominee_name'];
            $scope.ctill_pro_nomie_age = response.data[0]['nominee_age'];
            $scope.ctill_pro_nomie_relation = response.data[0]['nominee_relationship'];
            $scope.ctill_pro_nameofappoint = response.data[0]['appointee_name'];
            $scope.ctill_pro_appoint_relation = response.data[0]['appointee_relationship'];


//PA Starts 
$scope.gainful = response.data[0]['gainful'];
$scope.pa_pro_policy_sdate = response.data[0]['new_policy_start'];

            $scope.pa_pro_nname = response.data[0]['nominee_name'];
            $scope.pa_pro_nomie_age = response.data[0]['nominee_age'];
            $scope.pa_pro_nomie_relation = response.data[0]['nominee_relationship'];
            $scope.pa_pro_nameofappoint = response.data[0]['appointee_name'];
            $scope.pa_pro_appoint_relation = response.data[0]['appointee_relationship'];
             
if(response.data[0]['option_1'] == '1') { $("#uniform-pa_pro_suffered_yes span").addClass("checked", true);} else {$("#uniform-pa_pro_suffered_no span").addClass("checked", true);}
if(response.data[0]['option_2'] == '1') { $("#uniform-pa_pro_Sonography_yes span").addClass("checked", true);} else {$("#uniform-pa_pro_Sonography_no span").addClass("checked", true);}
if(response.data[0]['option_3'] == '1') { $("#uniform-pa_pro_surgery_yes span").addClass("checked", true);} else {$("#uniform-pa_pro_surgery_no span").addClass("checked", true);}
if(response.data[0]['option_4'] == '1') {
    $("#uniform-pa_pro_medication_yes span").addClass("checked", true);
    $('#similar_policy_comment_div').show('');
    $scope.similar_policy_comment = response.data[0]['pa_option_comment'];
} else {
    $("#uniform-pa_pro_medication_no span").addClass("checked", true);
}

            $scope.travel_depart_date = response.data[0]['travel_depart_date'];
            $scope.travel_return_date = response.data[0]['travel_return_date'];
            $scope.travel_trip_duration = response.data[0]['travel_trip_duration'];
            $scope.traveltype = response.data[0]['traveltype'];
            $scope.geographical = response.data[0]['geographical'];
            $scope.travel_max_trip = response.data[0]['travel_max_trip'];
            $scope.travel_relationship = 'Self';
            $scope.travel_date_birth = '10-03-1981';
            $scope.travel_age = '36';

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
    
        $scope.tvl_pro_national = response.data[0]['travel_pro_national'];
        $scope.tvl_pro_passport_no = response.data[0]['travel_pro_passport_no'];         

        $scope.tvl_pro_nname = response.data[0]['nominee_name'];
        $scope.tvl_pro_nomie_age = response.data[0]['nominee_age'];
        $scope.tvl_pro_nomie_relation = response.data[0]['nominee_relationship'];
        $scope.tvl_pro_nameofappoint = response.data[0]['appointee_name'];
        $scope.tvl_pro_appoint_relation = response.data[0]['appointee_relationship'];


if(response.data[0]['option_1'] == '1') { $("#uniform-tvl_pro_prosemi_yes span").addClass("checked", true);} else {$("#uniform-tvl_pro_prosemi_no span").addClass("checked", true);}
if(response.data[0]['option_2'] == '1') { $("#uniform-tvl_pro_engage_yes span").addClass("checked", true);} else {$("#uniform-tvl_pro_engage_no span").addClass("checked", true);}
if(response.data[0]['option_3'] == '1') { $("#uniform-tvl_pro_illness_yes span").addClass("checked", true);} else {$("#uniform-tvl_pro_illness_no span").addClass("checked", true);}

if(response.data[0]['hme_sum_insured_valuables'] > 0){
	
	$("#uniform-valuables span").addClass("checked", true);
    $('#valuables').attr('checked',true);
	
} else {
	
	 $('#valuable_detail_div').attr('style',"display:none");
	 
}

if(response.data[0]['hme_sum_insured_pee'] > 0){
	
	$("#uniform-SIM_PEE span").addClass("checked", true);
    $('#PEE').attr('checked',true);
	
} else {
	
	 $('#SIM_PEE_detail_div').attr('style',"display:none");
	 
}

if(response.data[0]['hme_sum_insured_structure'] > 0){
	$("#SIM_structure_div span").addClass("checked", true);
    $('#SIM_structure').attr('checked',true);
} else {
	$('#SIM_structure').attr('checked',false);
}

    var valuablesArray =   response.data[0]['valuables_desc'];
	
    if (typeof valuablesArray !== 'undefined' && valuablesArray.length > 0) {
		 
         $('#valuable_div').show();
         
		 $('#valuable_detail_div').attr('style',"display:block");
		 console.log(valuablesArray.length);
        for (j = 0; j < valuablesArray.length; j++) { 
            var k = j+1; 
            var fieled_hme_itm_des_val = 'hme_itm_des_val'+k; 
            var fieled_hme_weight_val = 'hme_weight_val'+k; 
            var fieled_hme_SI_val = 'hme_SI_val'+k; 
            var fieled_valuable_update_id = 'valuable_update_id'+k; 
                    
            $scope[fieled_hme_itm_des_val]  = valuablesArray[j]['hme_itm_des'];
            $scope[fieled_hme_weight_val]  = valuablesArray[j]['hme_weight'];
            $scope[fieled_hme_SI_val]  = valuablesArray[j]['hme_SI'];
            $scope[fieled_valuable_update_id]  = valuablesArray[j]['valuable_id'];
        } 
    } else {
		 $('#valuable_detail_div').attr('style',"display:none");
	}


if(response.data[0]['cust_street1'] == response.data[0]['hme_risk_address1']) { $("#uniform-hme_address_same span").addClass("checked", true); }

    var peeArray =   response.data[0]['pee_desc'];
    if (typeof peeArray !== 'undefined' && peeArray.length > 0) {
        $('#pee_div').show();
        
		$('#SIM_PEE_detail_div').attr('style',"display:block");
		
		
        for (j = 0; j < peeArray.length; j++) { 
            var k = j+1; 
            var fieled_hme_itm_des_PEE = 'hme_itm_des_PEE'+k; 
            var fieled_hme_make_PEE = 'hme_make_PEE'+k; 
            var fieled_hme_mdl_PEE = 'hme_mdl_PEE'+k; 
            var fieled_hme_yom_PEE = 'hme_yom_PEE'+k; 
            var fieled_hme_imei_PEE = 'hme_imei_PEE'+k; 
            var fieled_hme_SI_PEE = 'hme_SI_PEE'+k; 

            var fieled_valuable_update_id = 'pee_update_id'+k; 
                    
            $scope[fieled_hme_itm_des_PEE]  = peeArray[j]['hme_itm_des'];
            $scope[fieled_hme_make_PEE]  = peeArray[j]['hme_make'];
            $scope[fieled_hme_mdl_PEE]  = peeArray[j]['hme_model'];
            $scope[fieled_hme_yom_PEE]  = peeArray[j]['hme_YOM'];
            $scope[fieled_hme_imei_PEE]  = peeArray[j]['hme_IMEI'];
            $scope[fieled_hme_SI_PEE]  = peeArray[j]['hme_SI'];

            $scope[fieled_valuable_update_id]  = peeArray[j]['pee_id'];
        } 
    } else {
	$('#SIM_PEE_detail_div').attr('style',"display:none");
	}		



    var preClaimArray =   response.data[0]['pre_claim_desc'];
    if (typeof preClaimArray !== 'undefined' && preClaimArray.length > 0) {

            $('#claims_div').show();
            for (j = 0; j < preClaimArray.length; j++) { 
                var k = j+1; 
                var fieled_hme_long_des     = 'hme_long_des'+k; 
                var fieled_hme_assets_damage = 'hme_assets_damage'+k; 
                var fieled_hme_cause_loss   = 'hme_cause_loss'+k; 
                var fieled_hme_ins_place    = 'hme_ins_place'+k; 
                var fieled_hme_policy_yr    = 'hme_policy_yr'+k; 
                var fieled_hme_ins_claim    = 'hme_ins_claim'+k; 
                var fieled_hme_loss_amt     = 'hme_loss_amt'+k; 

                var fieled_pre_claim_update_id = 'pre_claim_update_id'+k; 
                        

                $scope[fieled_hme_long_des]  = preClaimArray[j]['hme_long_des'];
                $scope[fieled_hme_assets_damage]  = preClaimArray[j]['hme_assets_damage'];
                $scope[fieled_hme_cause_loss]  = preClaimArray[j]['hme_cause_loss'];
                $scope[fieled_hme_ins_place]  = preClaimArray[j]['hme_ins_place'];
                $scope[fieled_hme_policy_yr]  = preClaimArray[j]['hme_policy_yr'];
                $scope[fieled_hme_ins_claim]  = preClaimArray[j]['hme_ins_claim'];
                $scope[fieled_hme_loss_amt]  = preClaimArray[j]['hme_loss_amt'];

                $scope[fieled_pre_claim_update_id]  = preClaimArray[j]['claim_id'];
            } 
        }    

    });   

     


    $scope.formData = {};
   


    $scope.lms_car_claim_policy = '0';
    $scope.updateCustomer = function() {
    var dobdate = $('#lms_car_dob').val();

   if( dobdate == undefined || dobdate.length == 0){
	   alert("Please Select DOB");
	   return false;
   }
 
        if( $("#uniform-processing_fee_yes span").hasClass("checked")){ var lms_cus_pfee = '1'; } else { var lms_cus_pfee = '0'; }
       
        if( $("#uniform-lms_car_cus_type_corporate span").hasClass("checked")){ var lms_car_cus_type = 'corporate'; } else { var lms_car_cus_type = 'individual'; }
 
        if( $("#uniform-lms_cus_tle_yes span").hasClass("checked")){ var lms_cus_tle = '1'; } else { var lms_cus_tle = '0'; }
 
        if ($scope.lmsCar.$valid) {

   setTimeout(function(){
    //$scope.channel=$('#lms_car_category').val();
  $scope.$apply();
},1000);

   $scope.vision_address_name=$("#vision_address").is(":checked")?"1":"0";
   $scope.lms_car_campaign_name=$('#lms_car_campaign_name').val();
   
   
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
            var paramsArray = {
                "lms_car_category": $scope.lms_car_category,
                "lms_car_line_of_business": $scope.lms_car_line_of_business,
                //"lms_car_hdfc_branch_location": $scope.lms_car_hdfc_branch_location,
                //"lms_car_hdfc_ergo_location": $scope.lms_car_hdfc_ergo_location,
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
                //by madhesh
                "lms_house_number": $scope.lms_house_number,
                "lms_car_sum_insured":$scope.lms_car_sum_insured,
                "lms_car_age":$('#lms_car_age').val(),//$scope.lms_car_age,
                

                "lms_edit_lead_id": $scope.lms_edit_lead_id,
                "lms_edit_customer_id": $scope.lms_edit_customer_id,
                "lms_edit_application_id":$scope.lms_edit_application_id,
                "lms_cus_type" : $('[name="lms_car_cus_type"]:checked').val(),
				"comment_Date":$scope.functionGetDate(),
            }


            var url = web_url + "LmsCar/lmsUpdateCustomerDetails/";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('cardeatail').className = "carshow";
                    //document.getElementById('hide').className = "carhide";
                }
            });



        }
    }




    $scope.updateCardetail = function() {
        var web_url = $('#web_url').val();

        if ($scope.lmsCarDetil.$valid) {

             var caramount = $('#caramount').val();
             var lms_car_idv = $('#lms_car_idv').val();

            var paramsArray = {  
                "product_type" : productType, 
                "lms_car_reg_no":  $scope.lms_car_reg_no,
                "lms_car_manufacture_year":  $scope.lms_car_manufacture_year,
                "lms_car_manufacturer":  $scope.lms_car_manufacturer,
                "lms_car_variant":  $scope.lms_car_variant,
                "lms_car_reg_city":  $scope.lms_car_reg_city,
                "lms_car_policy_exp_date":  $scope.lms_car_policy_exp_date,
                "caramount": caramount,
                "lms_car_idv": lms_car_idv,
                "carState":  $scope.carState,
                "lms_car_claim_policy":  $scope.lms_car_claim_policy,
                "lms_car_ncb":  $scope.lms_car_ncb,
                "lms_premium":  $scope.lms_est_premium,
                "lms_edit_product_id": $scope.lms_edit_product_id,
            }

            var url = web_url + "LmsCar/lmsUpdateProductDetails/";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    
                }
            });
        }
    }



     $scope.updateProposal = function() {
        var web_url = $('#web_url').val();
                      
        if ($scope.lmsCarProposal.$valid) {
        
            if( $("#uniform-lms_car_pro_financed_yes span").hasClass("checked")) {  var lms_car_pro_financed= '1'; } else {  var lms_car_pro_financed = '0'; }                 
            if( $("#uniform-lms_car_pro_prev_stand_alone_yes span").hasClass("checked")) {  var prev_stand_alone= '1'; } else {  var prev_stand_alone = '0'; }                 
            if( $("#uniform-lms_car_pro_prev_depre_yes span").hasClass("checked")) {  var pro_prev_depre= '1'; } else {  var pro_prev_depre = '0'; }                 
            if( $("#uniform-lms_car_pro_prev_electric_yes span").hasClass("checked")) {  var pro_prev_electric_yes= '1'; } else {  var pro_prev_electric_yes = '0'; }                 
            if( $("#uniform-lms_car_pro_prev_cng_lpg_yes span").hasClass("checked")) {  var prev_cng_lpg_yes  = '1'; } else {  var prev_cng_lpg_yes = '0'; }                 


            var paramsArray = {  
                "lms_car_prop_existing_insure": $scope.lms_car_prop_existing_insure,
                "lms_car_pro_existing_policynum": $scope.lms_car_pro_existing_policynum,
                "lms_car_pro_existing_policy_expiry": $scope.lms_car_pro_existing_policy_expiry,
                "lms_car_pro_policy_start": $scope.lms_car_pro_policy_start,
                "lms_car_pro_regis_date": $scope.lms_car_pro_regis_date,
                "lms_car_pro_engine_num": $scope.lms_car_pro_engine_num,
                "lms_car_pro_chasis_num": $scope.lms_car_pro_chasis_num,

                "lms_car_pro_financed": lms_car_pro_financed,

                "lms_car_pro_fin_ins_name": $scope.lms_car_pro_fin_ins_name,
                "lms_car_pro_fin_ins_city": $scope.lms_car_pro_fin_ins_city,
                "prop_mtr_prev_stand_alone" : prev_stand_alone, 
                "prop_mtr_prev_prev_depre" : pro_prev_depre,
                "prop_mtr_prev_prev_electric" : pro_prev_electric_yes,
                "prop_mtr_prev_prev_cng_lpg" : prev_cng_lpg_yes,


// if(response.data[0]['prop_mtr_prev_stand_alone'] == '1') { $("#uniform-lms_car_pro_prev_stand_alone_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_stand_alone_no span").addClass("checked", true);}
// if(response.data[0]['prop_mtr_prev_prev_depre'] == '1') { $("#uniform-lms_car_pro_prev_depre_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_depre_no span").addClass("checked", true);}
// if(response.data[0]['prop_mtr_prev_prev_electric'] == '1') { $("#uniform-lms_car_pro_prev_electric_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_electric_no span").addClass("checked", true);}
// if(response.data[0]['prop_mtr_prev_prev_cng_lpg'] == '1') { $("#uniform-lms_car_pro_prev_cng_lpg_yes span").addClass("checked", true);} else {$("#uniform-lms_car_pro_prev_cng_lpg_no span").addClass("checked", true);}



            // $scope.lms_car_pro_fin_ins_name = response.data[0]['prop_mtr_fin_ins_name'],
            //$scope.lms_car_pro_fin_ins_city = response.data[0]['prop_mtr_fin_ins_city'],

                "lms_car_pro_nname": $scope.lms_car_pro_nname,
                "lms_car_pro_nage": $scope.lms_car_pro_nage,
                "lms_car_pro_nomie_relation": $scope.lms_car_pro_nomie_relation,
                "lms_car_pro_nameofappoint": $scope.lms_car_pro_nameofappoint,
                "lms_car_pro_appoint_relation": $scope.lms_car_pro_appoint_relation,
                "lms_car_pro_drive": $scope.lms_car_pro_drive,
                "lms_car_pro_parking": $scope.lms_car_pro_parking,
                "lms_car_pro_who_drive": $scope.lms_car_pro_who_drive,
                "lms_car_pro_kms": $scope.lms_car_pro_kms,
                "lms_car_pro_ydage": $scope.lms_car_pro_ydage,
                "lms_lms_car_pro_driver": $scope.lms_lms_car_pro_driver,
                "lms_car_comment" : $scope.lms_car_comment,
                
                "lms_edit_proposal_id": $scope.lms_edit_proposal_id,
                "lms_edit_nominee_id": $scope.lms_edit_nominee_id,
                "lms_edit_drhabit_id": $scope.lms_edit_drhabit_id,
            }

            var url = web_url + "LmsCar/lmsUpdateProposalDetails/";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData != 'false') {
                    alert('Succesfully posted values, Lead Number is '+ responseData);
                    location.reload();
                }
            });
        }
    } 


// home related code starts here 


    $scope.HomeUpdateProductDetail = function() {
		
	var dateChecker = $scope.calculateConstructionAge();
    var valuables = $('#valuables').parent('span').attr('class');
	
		if(valuables == 'checked'){
			
			var __desc = $('#hme_itm_des_val1');
			var __weight = $('#hme_weight_val1');
			var __sival = $('#hme_SI_val1');
			
			var countError=0;
			if((__desc.val()).length == 0){

				$('#error-hme_itm_des_val').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Long Description</div>');
				countError++;
			} else {
				$('#error-hme_itm_des_val').html('');
			}
			if((__weight.val()).length == 0){
				$('#error-hme_weight_val').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Weight in gm</div>');
				countError++;
			} else {
				$('#error-hme_weight_val').html('');
			}
			if((__sival.val()).length == 0){
				$('#error-hme_SI_val').html('').append('<div style="color: #e02222;font-size: 12px;padding-left: 2px;">Please Enter Sum Insured</div>');
				countError++;
			} else {
				$('#error-hme_SI_val').html('');
			}
			
			if( countError > 0 ){
			return false;
			}
			
		}
    if ($scope.lmshomeDetil.$valid && (dateChecker == true)) {
        
       var Home_policy_end = $('#Home_policy_end').val();

        var hmeRiskAddress1 = $('#hme_risk_address1').val();
        var hmeRiskAddress2 = $('#hme_risk_address2').val();
        var hmeRiskArea = $('#hme_risk_area').val();
        var hmeRiskPincode = $('#hme_risk_pincode').val();
        var hmeRiskState = $('#hme_risk_state').val();
        var hmeRiskCity = $('#hme_risk_city').val();
        var hmeRiskNearestLandMark = $('#hme_risk_nearest_land_mark').val();
		
		var errorCount=0;
        if(hmeRiskAddress1 == ''){ 
		$('#hme_risk_address1_error').html('Please Enter Riks Address1');
		errorCount++;
		} else { $('#hme_risk_address1_error').html(''); }
		
        if(hmeRiskAddress2 == ''){ 
		$('#hme_risk_address2_error').html('Please Enter Riks Address2');
		errorCount++;
		} else { $('#hme_risk_address2_error').html(''); }
        if(hmeRiskArea == ''){ $('#hme_risk_area_error').html('Please Enter Risk Area');
		errorCount++;
		} else { $('#hme_risk_area_error').html(''); }
        if(hmeRiskPincode == ''){ $('#hme_risk_pincode_error').html('Please Enter Pin Code');
		errorCount++;		
		} else { $('#hme_risk_pincode_error').html(''); }
        if(hmeRiskState == ''){ $('#hme_risk_state_error').html('Please Enter Risk State');
		errorCount++;
		} else { $('#hme_risk_state_error').html(''); }
        if(hmeRiskCity == ''){ $('#hme_risk_city_error').html('Please Enter Risk City');
		errorCount++;
		} else { $('#hme_risk_city_error').html(''); }
        if(hmeRiskNearestLandMark == ''){ $('#hme_risk_nearest_land_mark_error').html('Please Enter Risk Land Mark');
		errorCount++;		
		} else { $('#hme_risk_nearest_land_mark_error').html(''); 
		}
		
		if(errorCount>0){
			return false;
		}
		//hme_previous_claims
        var paramsArray = {
			
                "product_type" : productType,  
                'hme_building_type': $scope.hme_building_type,
                'hme_property_ownership': $scope.hme_property_ownership,
                'hme_property_type': $scope.hme_property_type,
                'hme_previous_claims': $scope.hme_previous_claims,
                'hme_no_of_floors': $scope.hme_no_of_floors,
                'hme_year_of_construction': $scope.hme_year_of_construction,
                'hme_independent_house': $scope.hme_independent_house,
                'hme_compound_wall': $scope.hme_compound_wall,
                'hme_build_up': $scope.hme_build_up,
                'hme_sum_insured_provided': $scope.hme_sum_insured_provided,
                'hme_risk_address_same': $scope.hme_risk_address_same,
                
                'hme_risk_address1': hmeRiskAddress1,
                'hme_risk_address2': hmeRiskAddress2,
                'hme_risk_area': hmeRiskArea,
                'hme_risk_pincode': hmeRiskPincode,
                'hme_risk_state': hmeRiskState,
                'hme_risk_city': hmeRiskCity,
                'hme_risk_nearest_land_mark': hmeRiskNearestLandMark,
                'lms_edit_product_id': $scope.lms_edit_product_id,
				'hme_checked_valuables' : (($('#uniform-valuables span').attr('class') == 'checked') ? 1 : 0),
				'hme_checked_SIM_PEE' : (($('#uniform-SIM_PEE span').attr('class')  == 'checked') ? 1 : 0),
				'hme_checked_SIM_structure' : (($('#uniform-SIM_structure span').attr('class')  == 'checked') ? 1 : 0),
                'hme_itm_des_val1': $scope.hme_itm_des_val1,
                'hme_weight_val1':$scope.hme_weight_val1,
                'hme_SI_val1':$scope.hme_SI_val1,
                'valu_update_id1':$scope.valuable_update_id1,
                
                'hme_itm_des_val2': $scope.hme_itm_des_val2,
                'hme_weight_val2':$scope.hme_weight_val2,
                'hme_SI_val2':$scope.hme_SI_val2,
                'valu_update_id2':$scope.valuable_update_id2,
                
                'hme_itm_des_val3': $scope.hme_itm_des_val3,
                'hme_weight_val3':$scope.hme_weight_val3,
                'hme_SI_val3':$scope.hme_SI_val3,
                'valu_update_id3':$scope.valuable_update_id3,
                
                'hme_itm_des_val4': $scope.hme_itm_des_val4,
                'hme_weight_val4':$scope.hme_weight_val4,
                'hme_SI_val4':$scope.hme_SI_val4,
                'valu_update_id4':$scope.valuable_update_id4, 
				
                'hme_itm_des_val5': $scope.hme_itm_des_val5,
                'hme_weight_val5':$scope.hme_weight_val5,
                'hme_SI_val5':$scope.hme_SI_val5,
                'valu_update_id5':$scope.valuable_update_id5, 
				
                'hme_itm_des_val6': $scope.hme_itm_des_val6,
                'hme_weight_val6':$scope.hme_weight_val6,
                'hme_SI_val6':$scope.hme_SI_val6,
                'valu_update_id6':$scope.valuable_update_id6,
				
                'hme_itm_des_PEE1': $scope.hme_itm_des_PEE1,
                'hme_make_PEE1':$scope.hme_make_PEE1,
                'hme_mdl_PEE1':$scope.hme_mdl_PEE1,
                'hme_yom_PEE1': $scope.hme_yom_PEE1,
                'hme_imei_PEE1':$scope.hme_imei_PEE1,
                'hme_SI_PEE1':$scope.hme_SI_PEE1,
                'pee_update_id1':$scope.pee_update_id1,
                
                'hme_itm_des_PEE2': $scope.hme_itm_des_PEE2,
                'hme_make_PEE2':$scope.hme_make_PEE2,
                'hme_mdl_PEE2':$scope.hme_mdl_PEE2,
                'hme_yom_PEE2': $scope.hme_yom_PEE2,
                'hme_imei_PEE2':$scope.hme_imei_PEE2,
                'hme_SI_PEE2':$scope.hme_SI_PEE2,
                'pee_update_id2':$scope.pee_update_id2,
                
                'hme_itm_des_PEE3': $scope.hme_itm_des_PEE3,
                'hme_make_PEE3':$scope.hme_make_PEE3,
                'hme_mdl_PEE3':$scope.hme_mdl_PEE3,
                'hme_yom_PEE3': $scope.hme_yom_PEE3,
                'hme_imei_PEE3':$scope.hme_imei_PEE3,
                'hme_SI_PEE3':$scope.hme_SI_PEE3,                
                'pee_update_id3':$scope.pee_update_id3,
                
                'hme_itm_des_PEE4': $scope.hme_itm_des_PEE4,
                'hme_make_PEE4':$scope.hme_make_PEE4,
                'hme_mdl_PEE4':$scope.hme_mdl_PEE4,
                'hme_yom_PEE4': $scope.hme_yom_PEE4,
                'hme_imei_PEE4':$scope.hme_imei_PEE4,
                'hme_SI_PEE4':$scope.hme_SI_PEE4,
                'pee_update_id4':$scope.pee_update_id4,


                'hme_long_des1': ($('#hme_previous_claims').val() == 'yes' ? $scope.hme_long_des1 : ''),
                'hme_assets_damage1':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_assets_damage1 : ''),
                'hme_cause_loss1':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_cause_loss1 : ''),
                'hme_ins_place1': ($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_place1 : ''),
                'hme_policy_yr1':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_policy_yr1 : ''),
                'hme_ins_claim1':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_claim1 : ''),
                'hme_loss_amt1':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_loss_amt1 : ''),
                'pre_claim_update_id1': $scope.pre_claim_update_id1,

                'hme_long_des2': ($('#hme_previous_claims').val() == 'yes' ? $scope.hme_long_des2 : ''),
                'hme_assets_damage2':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_assets_damage2 : ''),
                'hme_cause_loss2':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_cause_loss2 : ''),
                'hme_ins_place2': ($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_place2 : ''),
                'hme_policy_yr2':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_policy_yr2 : ''),
                'hme_ins_claim2':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_claim2 : ''),
                'hme_loss_amt2':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_loss_amt2 : ''),
                'hme_long_des3':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_long_des3 : '') ,
                'pre_claim_update_id2':$scope.pre_claim_update_id2,
                
                'hme_assets_damage3':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_assets_damage3 : ''),
                'hme_cause_loss3':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_cause_loss3 : ''),
                'hme_ins_place3': ($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_place3 : ''),
                'hme_policy_yr3':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_policy_yr3 : ''),
                'hme_ins_claim3':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_claim3 : ''),
                'hme_loss_amt3':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_loss_amt3 : ''),
                'hme_long_des4': ($('#hme_previous_claims').val() == 'yes' ? $scope.hme_long_des4 : ''),
                'pre_claim_update_id3':$scope.pre_claim_update_id3,

                'hme_assets_damage4':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_assets_damage4 : ''),
                'hme_cause_loss4':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_cause_loss4 : ''),
                'hme_ins_place4': ($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_place4 : ''),
                'hme_policy_yr4':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_policy_yr4 : ''),
                'hme_ins_claim4':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_ins_claim4 : ''),
                'hme_loss_amt4':($('#hme_previous_claims').val() == 'yes' ? $scope.hme_loss_amt4 : ''),
                'pre_claim_update_id4': $scope.pre_claim_update_id4,                

                'hme_sum_insured': $scope.hme_sum_insured,
                "lms_premium":  $('#lms_est_premium').val(),

                "lms_edit_product_id": $scope.lms_edit_product_id,
    

            }

            //console.log(paramsArray);

            var url = web_url + "LmsHome/lmsHomeUpdateProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                                      
                }
            });
        }
    }


     $scope.homeUpdateProposal = function() {
		 
        var web_url = $('#web_url').val();
     
        var checkpolicytime = $scope.checkPolicyStartDate('home_pro_policy_sdate');
        if ($scope.lmshomeProposal.$valid && (checkpolicytime == true)) {
             var paramsArray = {                 
                // proposal
                "home_pro_policy_sdate":$scope.home_pro_policy_sdate,
                "home_pro_nomie_name" : $scope.home_pro_nname,
                "home_pro_nomie_relation": $scope.home_pro_nomie_relation,
                "home_pro_nomie_age" : $scope.home_pro_nomie_age,
                "home_pro_nameofappoint": $scope.home_pro_nameofappoint,
                "home_pro_appoint_relation": $scope.home_pro_appoint_relation,
                "lms_car_comment":$scope.lms_car_comment,

                "lms_edit_proposal_id": $scope.lms_edit_proposal_id,
                "lms_edit_nominee_id": $scope.lms_edit_nominee_id,
				"comment_Date":$scope.functionGetDate(),
            }

            var url = web_url + "LmsHome/lmsHomeUpdateProposalDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
				var responseData = Object(response.data);
                
				var responceDataR = Object(responseData);
	
                if (responceDataR.status == true) {
                    alert('Succesfully posted values, Lead Number is '+ responceDataR.message);
                    location.reload();
                } else {
					alert(responceDataR.message);
					return false;
				}
                /*
				var responseData = response.data;
                responseData = responseData.trim();

                if (responseData != 'false') {
                    alert('Succesfully posted values, Lead Number is '+ responseData);
                    location.reload();
                }
				*/
            });
        }
    } 





// super sship related code starts here.. 


$scope.noofchildrens= '0';
$scope.sship_pro_suffered = '0';
    $scope.sship_pro_diseases = '0';
    $scope.sship_pro_psychiatric = '0';
    $scope.sship_pro_medication = '0';
    $scope.sship_pro_fibroid = '0';
    $scope.sship_pro_cyst = '0';
    $scope.sship_pro_bltest = '0';
    $scope.sship_pro_diabetes = '0';
    $scope.sship_pro_pregnant = '0';
    $scope.sship_pro_advice = '0';
    $scope.sship_pro_gutka = '0';

    $scope.spouse.spouse_suffered = '0';
    $scope.spouse.spouse_diseases = '0';
    $scope.spouse.spouse_psychiatric = '0';
    $scope.spouse.spouse_medication = '0';
    $scope.spouse.spouse_fibroid = '0';
    $scope.spouse.spouse_cyst = '0';
    $scope.spouse.spouse_bltest = '0';
    $scope.spouse.spouse_diabetes = '0';
    $scope.spouse.spouse_pregnant = '0';
    $scope.spouse.spouse_advice = '0';
    $scope.spouse.spouse_gutka = '0';

    $scope.child1.child1_suffered = '0';
    $scope.child1.child1_diseases = '0';
    $scope.child1.child1_psychiatric = '0';
    $scope.child1.child1_medication = '0';
    $scope.child1.child1_fibroid = '0';
    $scope.child1.child1_cyst = '0';
    $scope.child1.child1_bltest = '0';
    $scope.child1.child1_diabetes = '0';
    $scope.child1.child1_pregnant = '0';
    $scope.child1.child1_advice = '0';
    $scope.child1.child1_gutka = '0';

    $scope.child2.child2_suffered = '0';
    $scope.child2.child2_diseases = '0';
    $scope.child2.child2_psychiatric = '0';
    $scope.child2.child2_medication = '0';
    $scope.child2.child2_fibroid = '0';
    $scope.child2.child2_cyst = '0';
    $scope.child2.child2_bltest = '0';
    $scope.child2.child2_diabetes = '0';
    $scope.child2.child2_pregnant = '0';
    $scope.child2.child2_advice = '0';
    $scope.child2.child2_gutka = '0';

    $scope.child3.child3_suffered = '0';
    $scope.child3.child3_diseases = '0';
    $scope.child3.child3_psychiatric = '0';
    $scope.child3.child3_medication = '0';
    $scope.child3.child3_fibroid = '0';
    $scope.child3.child3_cyst = '0';
    $scope.child3.child3_bltest = '0';
    $scope.child3.child3_diabetes = '0';
    $scope.child3.child3_pregnant = '0';
    $scope.child3.child3_advice = '0';
    $scope.child3.child3_gutka = '0';

   // $scope.pre_ins_portability = '0';
    //$scope.ship_tax_primary_insured = '0';


$scope.shipUpdateProductDetail = function() {

 
    if ($scope.lmsShipProduct.$valid) {
        
        
        var spousedobship = '0';
        if( $("#uniform-Spouse_ship span").hasClass("checked")){ 
        //if ($('#Spouse_ship').is(":checked")) {   
            var Spouse_ship = '1';
            var spouse_DOB = $('#sship_spouse').val();
        } else {
            var Spouse_ship = '0';
            var spouse_DOB = '';
        }

        /*if( $("#uniform-noofchildrens0 span").hasClass("checked")){ 
            var noofchildrens = '0'; 
        } else if( $("#uniform-noofchildrens1 span").hasClass("checked")) { 
            var noofchildrens = '1'; 
        } else if( $("#uniform-noofchildrens2 span").hasClass("checked")) { 
            var noofchildrens = '2'; 
        } else if( $("#uniform-noofchildrens3 span").hasClass("checked")) { 
            var noofchildrens = '3'; 
        } else { 
            var noofchildrens = '0'; 
        }
*/

        var criticalVal = $('select[id="ss_sum_insured_critical"]').val();
		
		if($('#ss_crtical').is(":checked")){
			
			if(criticalVal.length == 0 || criticalVal == '? object:null ?'){
				$('#sumcriticalValue').html('').append('Please Select In Sum Insured Amount');
				return false;
				} else {
					$('#sumcriticalValue').html('');
				}
				
		}

        var paramsArray = { 
                "product_type" : productType,  
                "spouse_ship" : Spouse_ship,
                "ship_spouse_dob" : spouse_DOB,
                "sship_income" : $scope.sship_income,
                "policy_term" : $scope.policyterm,
                "no_of_childrens": $scope.noofchildrens,
                "lms_premium":  $('#lms_est_premium').val(),//$scope.lms_est_premium,
                "ss_sum_insured" : $scope.ss_sum_insured,
                "lms_edit_product_id": $scope.lms_edit_product_id,
                "ss_hospital_daily": $scope.ss_hospital_daily?"1":"0",
                "ss_critical":$scope.ss_critical?"1":"0",
                "ss_sum_insured_critical":$scope.ss_sum_insured_critical

            }

            var url = web_url + "LmsSuperShip/lmsProductUpdateDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                        document.getElementById('carproposal').className = "carshow";
                     //document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }    




 
    $scope.shipUpdateProposal = function() {
        var web_url = $('#web_url').val();
         if(!$scope.onBmical()){
        return;
   }

        if(!$scope.onBmicalspouse()){
        return;
   }

        if(!$scope.onBmicalchild1()){
        return;
   }

        if(!$scope.onBmicalchild2()){
        return;
   }

        if(!$scope.onBmicalchild3()){
        return;
   }

        if(!$scope.onQuestionnaire()){
        return;
   }


        for (var i = 1; i < 6; i++) { 
                
            if( $("#uniform-ship_suffered_yes_mem"+i+" span").hasClass("checked")){ this["ship_suffered_mem"+i] = '1'; } else { this["ship_suffered_mem"+i] = '0'; } 
            if( $("#uniform-ship_diseases_yes_mem"+i+" span").hasClass("checked")){ this["ship_diseases_mem"+i] = '1'; } else { this["ship_diseases_mem"+i] = '0'; } 
            if( $("#uniform-ship_psychiatric_yes_mem"+i+" span").hasClass("checked")){ this["ship_psychiatric_mem"+i] = '1'; } else { this["ship_psychiatric_mem"+i] = '0'; } 
            if( $("#uniform-ship_medication_yes_mem"+i+" span").hasClass("checked")){ this["ship_medication_mem"+i] = '1'; } else { this["ship_medication_mem"+i] = '0'; } 
            if( $("#uniform-ship_fibroid_yes_mem"+i+" span").hasClass("checked")){ this["ship_fibroid_mem"+i] = '1'; } else { this["ship_fibroid_mem"+i] = '0'; } 
            if( $("#uniform-ship_cyst_yes_mem"+i+" span").hasClass("checked")){ this["ship_cyst_mem"+i] = '1'; } else { this["ship_cyst_mem"+i] = '0'; } 
            if( $("#uniform-ship_bltest_yes_mem"+i+" span").hasClass("checked")){ this["ship_bltest_mem"+i] = '1'; } else { this["ship_bltest_mem"+i] = '0'; } 
           
            if( $("#uniform-ship_diabetes_yes_mem"+i+" span").hasClass("checked")){ this["ship_diabetes_mem"+i] = '1'; } else { this["ship_diabetes_mem"+i] = '0'; } 
            if( $("#uniform-ship_pregnant_yes_mem"+i+" span").hasClass("checked")){ this["ship_pregnant_mem"+i] = '1'; } else { this["ship_pregnant_mem"+i] = '0'; } 
            if( $("#uniform-ship_treatment_yes_mem"+i+" span").hasClass("checked")){ this["ship_treatment_mem"+i] = '1'; } else { this["ship_treatment_mem"+i] = '0'; } 
            if( $("#uniform-ship_gutka_yes_mem"+i+" span").hasClass("checked")){ this["ship_gutka_mem"+i] = '1'; } else { this["ship_gutka_mem"+i] = '0'; } 
        }

        if( $("#uniform-pre_ins_portability_yes span").hasClass("checked")){ var pre_ins_portability = '1'; } else { var pre_ins_portability = '0'; } 
        if( $("#uniform-ship_tax_primary_insured_yes span").hasClass("checked")){ var ship_tax_primary_insured = '1'; } else { var ship_tax_primary_insured = '0'; } 

        if( $("#uniform-ship_tax_nationality_yes span").hasClass("checked")){ var ship_tax_nationality = '1'; } else { var ship_tax_nationality = '0'; } 
		
		var sship_pro_policy_start = $('#sship_pro_policy_start').val();
		if(sship_pro_policy_start.length == 0){
			alert("Please select Proposed policy start date");
			return false;
		}
		//console.log($scope.lmsShipProposal);
        if ($scope.lmsShipProposal.$valid) {

            var paramsArray = {  

                "sship_pro_policy_start": $scope.sship_pro_policy_start,
                "pre_ins_portability": pre_ins_portability,
                "ship_tax_primary_insured" : $scope.ship_tax_primary_insured,
                "edit_option_id1": $scope.edit_option_id1,
                "salut_mem1" : $scope.self_salut,
                "fname_mem1": $scope.self_fname,
                "lname_mem1": $scope.self_lname,
                "dob_mem1": $scope.self_dob,
                "gender_mem1":$scope.self_gender,
                "occupation_mem1":$scope.self_occupation,
                "height_mem1":$scope.sship_pro_height,
                "weight_mem1":$scope.sship_pro_Weight,
                "delivery_date_mem1":$scope.delivery_date_mem1,
                "smoke_mem1":$scope.smoke_mem1,
                "alcohol_mem1":$scope.alcohol_mem1,
                "pan_masala_mem1":$scope.pan_masala_mem1,
                "others_mem1":$scope.others_mem1,
                "ship_suffered_mem1":this.ship_suffered_mem1,
                "ship_diseases_mem1":this.ship_diseases_mem1,
                "ship_psychiatric_mem1":this.ship_psychiatric_mem1,
                "ship_medication_mem1":this.ship_medication_mem1,
                "ship_fibroid_mem1":this.ship_fibroid_mem1,
                "ship_cyst_mem1":this.ship_cyst_mem1,
                "ship_bltest_mem1":this.ship_bltest_mem1,
                "ship_diabetes_mem1":this.ship_diabetes_mem1,
                "ship_pregnant_mem1":this.ship_pregnant_mem1,
                "ship_treatment_mem1":this.ship_treatment_mem1,
                "ship_gutka_mem1":this.ship_gutka_mem1,
                "medical_update_id1_mem1": $scope.medical_update_id1_mem1,
                "medical_update_id2_mem1": $scope.medical_update_id2_mem1,
                "medical_update_id3_mem1": $scope.medical_update_id3_mem1,
                "surgery_name1_mem1": $scope.surgery_name1_mem1,
                "diagnosis_date1_mem1": $scope.diagnosis_date1_mem1,
                "date_consultation1_mem1": $scope.date_consultation1_mem1,
                "treatment_type1_mem1": $scope.treatment_type1_mem1,
                "hospital_name1_mem1": $scope.hospital_name1_mem1,
                "surgery_name2_mem1": $scope.surgery_name2_mem1,
                "diagnosis_date2_mem1": $scope.diagnosis_date2_mem1,
                "date_consultation2_mem1": $scope.date_consultation2_mem1,
                "treatment_type2_mem1": $scope.treatment_type2_mem1,
                "hospital_name2_mem1": $scope.hospital_name2_mem1, 
                "surgery_name3_mem1": $scope.surgery_name3_mem1,
                "diagnosis_date3_mem1": $scope.diagnosis_date3_mem1,
                "date_consultation3_mem1": $scope.date_consultation3_mem1,
                "treatment_type3_mem1": $scope.treatment_type3_mem1,
                "hospital_name3_mem1": $scope.hospital_name3_mem1, 

                "sship_pro_height":$scope.sship_pro_height,
                "sship_pro_Weight":$scope.sship_pro_Weight,
                "edit_option_id2": $scope.edit_option_id2,
                "salut_mem2" : $scope.spouse.spouse_salut,
                "fname_mem2": $scope.spouse.spouse_fname,
                "lname_mem2": $scope.spouse.spouse_lname,
                "dob_mem2": $scope.spouse.spouse_dob,
                "gender_mem2":$scope.spouse.spouse_gender,
                "occupation_mem2":$scope.spouse.spouse_occupation,
                "height_mem2":$scope.spouse.spouse_height,
                "weight_mem2":$scope.spouse.spouse_weight,
                "delivery_date_mem2":$scope.delivery_date_mem2,
                "smoke_mem2":$scope.smoke_mem2,
                "alcohol_mem2":$scope.alcohol_mem2,
                "pan_masala_mem2":$scope.pan_masala_mem2,
                "others_mem2":$scope.others_mem2,
                "ship_suffered_mem2":this.ship_suffered_mem2,
                "ship_diseases_mem2":this.ship_diseases_mem2,
                "ship_psychiatric_mem2":this.ship_psychiatric_mem2,
                "ship_medication_mem2":this.ship_medication_mem2,
                "ship_fibroid_mem2":this.ship_fibroid_mem2,
                "ship_cyst_mem2":this.ship_cyst_mem2,
                "ship_bltest_mem2":this.ship_bltest_mem2,
                "ship_diabetes_mem2":this.ship_diabetes_mem2,
                "ship_pregnant_mem2":this.ship_pregnant_mem2,
                "ship_treatment_mem2":this.ship_treatment_mem2,
                "ship_gutka_mem2":this.ship_gutka_mem2,
                "medical_update_id1_mem2": $scope.medical_update_id1_mem2,
                "medical_update_id2_mem2": $scope.medical_update_id2_mem2,
                "medical_update_id3_mem2": $scope.medical_update_id3_mem2,
                "surgery_name1_mem2": $scope.surgery_name1_mem2,
                "diagnosis_date1_mem2": $scope.diagnosis_date1_mem2,
                "date_consultation1_mem2": $scope.date_consultation1_mem2,
                "treatment_type1_mem2": $scope.treatment_type1_mem2,
                "hospital_name1_mem2": $scope.hospital_name1_mem2,
                "surgery_name2_mem2": $scope.surgery_name2_mem2,
                "diagnosis_date2_mem2": $scope.diagnosis_date2_mem2,
                "date_consultation2_mem2": $scope.date_consultation2_mem2,
                "treatment_type2_mem2": $scope.treatment_type2_mem2,
                "hospital_name2_mem2": $scope.hospital_name2_mem2, 
                "surgery_name3_mem2": $scope.surgery_name3_mem2,
                "diagnosis_date3_mem2": $scope.diagnosis_date3_mem2,
                "date_consultation3_mem2": $scope.date_consultation3_mem2,
                "treatment_type3_mem2": $scope.treatment_type3_mem2,
                "hospital_name3_mem2": $scope.hospital_name3_mem2,

                "edit_option_id3": $scope.edit_option_id3,
                "salut_mem3" : $scope.child1.child1_salut,
                "fname_mem3": $scope.child1.child1_fname,
                "lname_mem3": $scope.child1.child1_lname,
                "dob_mem3": $scope.child1.child1_dob,
                "gender_mem3":$scope.child1.child1_gender,
                "occupation_mem3":$scope.occupation_mem3,
                "height_mem3":$scope.child1.child1_height,
                "weight_mem3":$scope.child1.child1_weight,
                "delivery_date_mem3":$scope.delivery_date_mem3,
                "smoke_mem3":$scope.smoke_mem3,
                "alcohol_mem3":$scope.alcohol_mem3,
                "pan_masala_mem3":$scope.pan_masala_mem3,
                "others_mem3":$scope.others_mem3,
                "ship_suffered_mem3":this.ship_suffered_mem3,
                "ship_diseases_mem3":this.ship_diseases_mem3,
                "ship_psychiatric_mem3":this.ship_psychiatric_mem3,
                "ship_medication_mem3":this.ship_medication_mem3,
                "ship_fibroid_mem3":this.ship_fibroid_mem3,
                "ship_cyst_mem3":this.ship_cyst_mem3,
                "ship_bltest_mem3":this.ship_bltest_mem3,
                "ship_diabetes_mem3":this.ship_diabetes_mem3,
                "ship_pregnant_mem3":this.ship_pregnant_mem3,
                "ship_treatment_mem3":this.ship_treatment_mem3,
                "ship_gutka_mem3":this.ship_gutka_mem3,
                "medical_update_id1_mem3": $scope.medical_update_id1_mem3,
                "medical_update_id2_mem3": $scope.medical_update_id2_mem3,
                "medical_update_id3_mem3": $scope.medical_update_id3_mem3,
                "surgery_name1_mem3": $scope.surgery_name1_mem3,
                "diagnosis_date1_mem3": $scope.diagnosis_date1_mem3,
                "date_consultation1_mem3": $scope.date_consultation1_mem3,
                "treatment_type1_mem3": $scope.treatment_type1_mem3,
                "hospital_name1_mem3": $scope.hospital_name1_mem3,
                "surgery_name2_mem3": $scope.surgery_name2_mem3,
                "diagnosis_date2_mem3": $scope.diagnosis_date2_mem3,
                "date_consultation2_mem3": $scope.date_consultation2_mem3,
                "treatment_type2_mem3": $scope.treatment_type2_mem3,
                "hospital_name2_mem3": $scope.hospital_name2_mem3, 
                "surgery_name3_mem3": $scope.surgery_name3_mem3,
                "diagnosis_date3_mem3": $scope.diagnosis_date3_mem3,
                "date_consultation3_mem3": $scope.date_consultation3_mem3,
                "treatment_type3_mem3": $scope.treatment_type3_mem3,
                "hospital_name3_mem3": $scope.hospital_name3_mem3, 

                "edit_option_id4": $scope.edit_option_id4,
                "salut_mem4" : $scope.child2.child2_salut,
                "fname_mem4": $scope.child2.child2_fname,
                "lname_mem4": $scope.child2.child2_lname,
                "dob_mem4": $scope.child2.child2_dob,
                "gender_mem4":$scope.child2.child2_gender,
                "occupation_mem4":$scope.occupation_mem4,
                "height_mem4":$scope.child2.child2_height,
                "weight_mem4":$scope.child2.child2_weight,
                "delivery_date_mem4":$scope.delivery_date_mem4,
                "smoke_mem4":$scope.smoke_mem4,
                "alcohol_mem4":$scope.alcohol_mem4,
                "pan_masala_mem4":$scope.pan_masala_mem4,
                "others_mem4":$scope.others_mem4,
                "ship_suffered_mem4":this.ship_suffered_mem4,
                "ship_diseases_mem4":this.ship_diseases_mem4,
                "ship_psychiatric_mem4":this.ship_psychiatric_mem4,
                "ship_medication_mem4":this.ship_medication_mem4,
                "ship_fibroid_mem4":this.ship_fibroid_mem4,
                "ship_cyst_mem4":this.ship_cyst_mem4,
                "ship_bltest_mem4":this.ship_bltest_mem4,
                "ship_diabetes_mem4":this.ship_diabetes_mem4,
                "ship_pregnant_mem4":this.ship_pregnant_mem4,
                "ship_treatment_mem4":this.ship_treatment_mem4,
                "ship_gutka_mem4":this.ship_gutka_mem4,
                "medical_update_id1_mem4": $scope.medical_update_id1_mem4,
                "medical_update_id2_mem4": $scope.medical_update_id2_mem4,
                "medical_update_id3_mem4": $scope.medical_update_id3_mem4,
                "surgery_name1_mem4": $scope.surgery_name1_mem4,
                "diagnosis_date1_mem4": $scope.diagnosis_date1_mem4,
                "date_consultation1_mem4": $scope.date_consultation1_mem4,
                "treatment_type1_mem4": $scope.treatment_type1_mem4,
                "hospital_name1_mem4": $scope.hospital_name1_mem4,
                "surgery_name2_mem4": $scope.surgery_name2_mem4,
                "diagnosis_date2_mem4": $scope.diagnosis_date2_mem4,
                "date_consultation2_mem4": $scope.date_consultation2_mem4,
                "treatment_type2_mem4": $scope.treatment_type2_mem4,
                "hospital_name2_mem4": $scope.hospital_name2_mem4, 
                "surgery_name3_mem4": $scope.surgery_name3_mem4,
                "diagnosis_date3_mem4": $scope.diagnosis_date3_mem4,
                "date_consultation3_mem4": $scope.date_consultation3_mem4,
                "treatment_type3_mem4": $scope.treatment_type3_mem4,
                "hospital_name3_mem4": $scope.hospital_name3_mem4, 


                "edit_option_id5": $scope.edit_option_id5,
                "salut_mem5" : $scope.child3.child3_salut,
                "fname_mem5": $scope.child3.child3_fname,
                "lname_mem5": $scope.child3.child3_lname,
                "dob_mem5": $scope.child3.child3_dob,
                "gender_mem5":$scope.child3.child3_gender,
                "occupation_mem5":$scope.occupation_mem5,
                "height_mem5":$scope.child3.child3_height,
                "weight_mem5":$scope.child3.child3_weight,
                "delivery_date_mem5":$scope.delivery_date_mem5,
                "smoke_mem5":$scope.smoke_mem5,
                "alcohol_mem5":$scope.alcohol_mem5,
                "pan_masala_mem5":$scope.pan_masala_mem5,
                "others_mem5":$scope.others_mem5,
                "ship_suffered_mem5":this.ship_suffered_mem5,
                "ship_diseases_mem5":this.ship_diseases_mem5,
                "ship_psychiatric_mem5":this.ship_psychiatric_mem5,
                "ship_medication_mem5":this.ship_medication_mem5,
                "ship_fibroid_mem5":this.ship_fibroid_mem5,
                "ship_cyst_mem5":this.ship_cyst_mem5,
                "ship_bltest_mem5":this.ship_bltest_mem5,
                "ship_diabetes_mem5":this.ship_diabetes_mem5,
                "ship_pregnant_mem5":this.ship_pregnant_mem5,
                "ship_treatment_mem5":this.ship_treatment_mem5,
                "ship_gutka_mem5":this.ship_gutka_mem5,
                "medical_update_id1_mem5": $scope.medical_update_id1_mem5,
                "medical_update_id2_mem5": $scope.medical_update_id2_mem5,
                "medical_update_id3_mem5": $scope.medical_update_id3_mem5,
                "surgery_name1_mem5": $scope.surgery_name1_mem5,
                "diagnosis_date1_mem5": $scope.diagnosis_date1_mem5,
                "date_consultation1_mem5": $scope.date_consultation1_mem5,
                "treatment_type1_mem5": $scope.treatment_type1_mem5,
                "hospital_name1_mem5": $scope.hospital_name1_mem5,
                "surgery_name2_mem5": $scope.surgery_name2_mem5,
                "diagnosis_date2_mem5": $scope.diagnosis_date2_mem5,
                "date_consultation2_mem5": $scope.date_consultation2_mem5,
                "treatment_type2_mem5": $scope.treatment_type2_mem5,
                "hospital_name2_mem5": $scope.hospital_name2_mem5, 
                "surgery_name3_mem5": $scope.surgery_name3_mem5,
                "diagnosis_date3_mem5": $scope.diagnosis_date3_mem5,
                "date_consultation3_mem5": $scope.date_consultation3_mem5,
                "treatment_type3_mem5": $scope.treatment_type3_mem5,
                "hospital_name3_mem5": $scope.hospital_name3_mem5, 
                /////////////////////

               
               
                //Doctor Details
                "sship_pro_doc_name": $scope.sship_pro_doc_name,
                "sship_pro_doc_qualifi": $scope.sship_pro_doc_qualifi,
                "sship_pro_doc_addr": $scope.sship_pro_doc_addr,
                "sship_pro_doc_mobile": $scope.sship_pro_doc_mobile,
                "sship_pro_hos_num": $scope.sship_pro_hos_num,

                // Nominee Details
                "sship_pro_nomie_name" : $scope.sship_pro_nname,
                "sship_pro_nomie_relation": $scope.sship_pro_nomie_relation,
                "sship_pro_nomie_age" : $scope.sship_pro_nomie_age,
                "sship_pro_nameofappoint": $scope.sship_pro_nameofappoint,
                "sship_pro_appoint_relation": $scope.sship_pro_appoint_relation,
                "lms_car_comment": $scope.lms_car_comment,

                "lms_edit_proposal_id": $scope.lms_edit_proposal_id,
                "lms_edit_nominee_id": $scope.lms_edit_nominee_id,
                "lms_edit_family_doctor_id": $scope.lms_edit_family_doctor_id,


                "port_insurer_name1" : $scope.port_insurer_name1,
                "port_policy_number1" : $scope.port_policy_number1,
                "port_start_date1"  : $scope.port_start_date1,
                "port_end_date1" : $scope.port_end_date1,
                "port_sum_insured1" : $scope.port_sum_insured1,
                "port_claim_lodged1" : $scope.port_claim_lodged1,
                "port_cumulative_bonus1" : $scope.port_cumulative_bonus1,
                "port_pre_insurance_id1": $scope.port_pre_insurance_id1,

                "port_insurer_name2" : $scope.port_insurer_name2,
                "port_policy_number2" : $scope.port_policy_number2,
                "port_start_date2"  : $scope.port_start_date2,
                "port_end_date2" : $scope.port_end_date2,
                "port_sum_insured2" : $scope.port_sum_insured2,
                "port_claim_lodged2" : $scope.port_claim_lodged2,
                "port_cumulative_bonus2" : $scope.port_cumulative_bonus2,
                "port_pre_insurance_id2": $scope.port_pre_insurance_id2,

                "ship_tax_salut": $scope.ship_tax_salut,
                "ship_tax_your_name": $scope.ship_tax_your_name,
                "ship_tax_primary_relation": $scope.ship_tax_primary_relation,
                "ship_tax_dob": $scope.ship_tax_dob,
                "ship_tax_gender": $scope.ship_tax_gender,
                "ship_tax_addr1": $scope.ship_tax_addr1,
                "ship_tax_addr2": $scope.ship_tax_addr2,
                "ship_tax_landmark": $scope.ship_tax_landmark,
                "ship_tax_fixed_line": $scope.ship_tax_fixed_line,
                "ship_tax_mobile_no": $scope.ship_tax_mobile_no,
                "ship_tax_email_id": $scope.ship_tax_email_id,
                "ship_tax_nationality": $('[name=ship_tax_nationality]').val(),
                "ship_tax_occupation": $scope.ship_tax_occupation,
                "ship_tax_income": $scope.ship_tax_income,
                "ship_tax_PPC_no": $scope.ship_tax_PPC_no,
                "edit_prim_ins_id" : $scope.edit_prim_ins_id,
				"comment_Date":$scope.functionGetDate()

            }

            var url = web_url + "LmsSuperShip/lmsProposalUpdateDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
				
				var responseData = Object(response.data);
                
				var responceDataR = Object(responseData);
	
                if (responceDataR.status == true) {
                    alert('Succesfully posted values, Lead Number is '+ responceDataR.message);
                    location.reload();
                } else {
					alert(responceDataR.message);
					return false;
				}
				/*
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData != 'false') {
                   alert('Succesfully posted values, Lead Number is'+responseData);
                   location.reload();
                }                
              */
            });
        }
    }             

    /* Supership related code ends here...*/



   /*var custId= data.lms_edit_customer_id;
         var url = web_url + "LmsSuperShip/lmsDeleteSuperShip";
            $http.get(url, {custId}).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                       // document.getElementById('carproposal').className = "carshow";
                     //document.getElementById('hide').className = "carhide";
                    
                }
           });*/

    /* critial illeness related code starts here... */

    $scope.CIUpdateProductDetail = function() {
 
    if ($scope.lmsciDetil.$valid) {
    
        if( $("#uniform-Spouse_ship span").hasClass("checked")){   
            var spouse_CI = '1';
            var spouse_DOB = $('#spouse_DOB').val();
        } else {
            var spouse_CI = '0';
            var spouse_DOB = '';
        }

        if( $("#uniform-noofchildrens0 span").hasClass("checked")){ 
            var CI_noofchildrens = '0'; 
        } else if( $("#uniform-noofchildrens1 span").hasClass("checked")) { 
            var CI_noofchildrens = '1'; 
        } else if( $("#uniform-noofchildrens2 span").hasClass("checked")) { 
            var CI_noofchildrens = '2'; 
        } else if( $("#uniform-noofchildrens3 span").hasClass("checked")) { 
            var CI_noofchildrens = '3'; 
        } else { 
            var CI_noofchildrens = '0'; 
        }

        var paramsArray = { 
                "product_type" : productType,  
                "spouse_CI" : spouse_CI,
                "CI_spouse_dob" : spouse_DOB,
                "no_of_childrens": CI_noofchildrens,
                "lms_premium":  $('#lms_est_premium').val(),//$scope.lms_est_premium,
                "lms_edit_product_id": $scope.lms_edit_product_id,
            }

            var url = web_url + "LmsCriticalIllnes/lmsProductUpdateDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    //document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }



    $scope.ciUpdateProposal = function() {
        var web_url = $('#web_url').val();

        if ($scope.lmsCiProposal.$valid) {

                // if( $("#uniform-ctill_pro_suffered_yes span").hasClass("checked")){ var ctill_pro_suffered = '1'; } else { var ctill_pro_suffered = '0'; }
                // if( $("#uniform-ctill_pro_Sonography_yes span").hasClass("checked")){ var ctill_pro_Sonography = '1'; } else { var ctill_pro_Sonography = '0'; }
                // if( $("#uniform-ctill_pro_surgery_yes span").hasClass("checked")){ var ctill_pro_surgery = '1'; } else { var ctill_pro_surgery = '0'; }
                // if( $("#uniform-ctill_pro_medication_yes span").hasClass("checked")){ var ctill_pro_medication = '1'; } else { var ctill_pro_medication = '0'; }
                // if( $("#uniform-ctill_pro_Patient_yes span").hasClass("checked")){ var ctill_pro_Patient = '1'; } else { var ctill_pro_Patient = '0'; }
                // if( $("#uniform-ctill_pro_breathing_yes span").hasClass("checked")){ var ctill_pro_breathing = '1'; } else { var ctill_pro_breathing = '0'; }
                // if( $("#uniform-ctill_pro_illness_yes span").hasClass("checked")){ var ctill_pro_illness = '1'; } else { var ctill_pro_illness = '0'; }
                // if( $("#uniform-ctill_pro_prosemi_yes span").hasClass("checked")){ var ctill_pro_prosemi = '1'; } else { var ctill_pro_prosemi = '0'; }
                // //alert(ctill_pro_Sonography);


  for (var i = 1; i < 5; i++) { 
                
            if( $("#uniform-ship_suffered_yes_mem"+i+" span").hasClass("checked")){ this["ship_suffered_mem"+i] = '1'; } else { this["ship_suffered_mem"+i] = '0'; } 
            if( $("#uniform-ship_diseases_yes_mem"+i+" span").hasClass("checked")){ this["ship_diseases_mem"+i] = '1'; } else { this["ship_diseases_mem"+i] = '0'; } 
            if( $("#uniform-ship_psychiatric_yes_mem"+i+" span").hasClass("checked")){ this["ship_psychiatric_mem"+i] = '1'; } else { this["ship_psychiatric_mem"+i] = '0'; } 
            if( $("#uniform-ship_medication_yes_mem"+i+" span").hasClass("checked")){ this["ship_medication_mem"+i] = '1'; } else { this["ship_medication_mem"+i] = '0'; } 
            if( $("#uniform-ship_fibroid_yes_mem"+i+" span").hasClass("checked")){ this["ship_fibroid_mem"+i] = '1'; } else { this["ship_fibroid_mem"+i] = '0'; } 
            if( $("#uniform-ship_cyst_yes_mem"+i+" span").hasClass("checked")){ this["ship_cyst_mem"+i] = '1'; } else { this["ship_cyst_mem"+i] = '0'; } 
            if( $("#uniform-ship_bltest_yes_mem"+i+" span").hasClass("checked")){ this["ship_bltest_mem"+i] = '1'; } else { this["ship_bltest_mem"+i] = '0'; } 
           
          
        }

        if( $("#uniform-pre_ins_portability_yes span").hasClass("checked")){ var pre_ins_portability = '1'; } else { var pre_ins_portability = '0'; } 
        if( $("#uniform-ship_tax_primary_insured_yes span").hasClass("checked")){ var ship_tax_primary_insured = '1'; } else { var ship_tax_primary_insured = '0'; } 

             var paramsArray = {  
                        
                "ctill_pro_policy_sdate":$scope.ctill_pro_policy_sdate,
                "pre_ins_portability": pre_ins_portability,
                "ship_tax_primary_insured" : ship_tax_primary_insured,

                "edit_option_id1": $scope.edit_option_id1,
                "salut_mem1" : $scope.salut_mem1,
                "fname_mem1": $scope.fname_mem1,
                "lname_mem1": $scope.lname_mem1,
                "dob_mem1": $scope.dob_mem1,                
                "ship_suffered_mem1":this.ship_suffered_mem1,
                "ship_diseases_mem1":this.ship_diseases_mem1,
                "ship_psychiatric_mem1":this.ship_psychiatric_mem1,
                "ship_medication_mem1":this.ship_medication_mem1,
                "ship_fibroid_mem1":this.ship_fibroid_mem1,
                "ship_cyst_mem1":this.ship_cyst_mem1,
                "ship_bltest_mem1":this.ship_bltest_mem1,
                
                "edit_option_id2": $scope.edit_option_id2,
                "salut_mem2" : $scope.salut_mem2,
                "fname_mem2": $scope.fname_mem2,
                "lname_mem2": $scope.lname_mem2,
                "dob_mem2": $scope.dob_mem2,                
                "ship_suffered_mem2":this.ship_suffered_mem2,
                "ship_diseases_mem2":this.ship_diseases_mem2,
                "ship_psychiatric_mem2":this.ship_psychiatric_mem2,
                "ship_medication_mem2":this.ship_medication_mem2,
                "ship_fibroid_mem2":this.ship_fibroid_mem2,
                "ship_cyst_mem2":this.ship_cyst_mem2,
                "ship_bltest_mem2":this.ship_bltest_mem2,               


                "edit_option_id3": $scope.edit_option_id3,
                "salut_mem3" : $scope.salut_mem3,
                "fname_mem3" : $scope.fname_mem3,
                "lname_mem3": $scope.lname_mem3,
                "dob_mem3": $scope.dob_mem3,                
                "ship_suffered_mem3":this.ship_suffered_mem3,
                "ship_diseases_mem3":this.ship_diseases_mem3,
                "ship_psychiatric_mem3":this.ship_psychiatric_mem3,
                "ship_medication_mem3":this.ship_medication_mem3,
                "ship_fibroid_mem3":this.ship_fibroid_mem3,
                "ship_cyst_mem3":this.ship_cyst_mem3,
                "ship_bltest_mem3":this.ship_bltest_mem3,               

                "edit_option_id4": $scope.edit_option_id4,
                "salut_mem4" : $scope.salut_mem4,
                "fname_mem4" : $scope.fname_mem4,
                "lname_mem4": $scope.lname_mem4,
                "dob_mem4": $scope.dob_mem4,                
                "ship_suffered_mem4":this.ship_suffered_mem4,
                "ship_diseases_mem4":this.ship_diseases_mem4,
                "ship_psychiatric_mem4":this.ship_psychiatric_mem4,
                "ship_medication_mem4":this.ship_medication_mem4,
                "ship_fibroid_mem4":this.ship_fibroid_mem4,
                "ship_cyst_mem4":this.ship_cyst_mem4,
                "ship_bltest_mem4":this.ship_bltest_mem4,   

                // "ctill_pro_suffered": ctill_pro_suffered,
                // "ctill_pro_Sonography": ctill_pro_Sonography,
                // "ctill_pro_surgery": ctill_pro_surgery,
                // "ctill_pro_medication": ctill_pro_medication,
                // "ctill_pro_Patient": ctill_pro_Patient,
                // "ctill_pro_breathing": ctill_pro_breathing,
                // "ctill_pro_illness": ctill_pro_illness,
                // "ctill_pro_prosemi": ctill_pro_prosemi,
           

                "ctill_pro_nomie_name" : $scope.ctill_pro_nname,
                "ctill_pro_nomie_relation": $scope.ctill_pro_nomie_relation,
                "ctill_pro_nomie_age" : $scope.ctill_pro_nomie_age,
                "ctill_pro_nameofappoint": $scope.ctill_pro_nameofappoint,
                "ctill_pro_appoint_relation": $scope.ctill_pro_appoint_relation,
                "lms_car_comment": $scope.lms_car_comment,

                "lms_edit_proposal_id": $scope.lms_edit_proposal_id,
                "lms_edit_nominee_id": $scope.lms_edit_nominee_id,
                "lms_edit_option_id":$scope.lms_edit_option_id,
               

                "ship_tax_salut": $scope.ship_tax_salut,
                "ship_tax_your_name": $scope.ship_tax_your_name,
                "ship_tax_primary_relation": $scope.ship_tax_primary_relation,
                "edit_prim_ins_id" : $scope.edit_prim_ins_id,

            }

            var url = web_url + "LmsCriticalIllnes/lmsCiProposalUpdateDetails/";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData != 'false') {
                    alert('Succesfully posted values, Lead Number is '+ responseData);
                    //location.reload();
                }
            });
        }
    } 




   
     
   $scope.PaProductUpdateDetail = function() {
 
    if ($scope.lmspaDetil.$valid) {
        
       var Home_policy_end = $('#Home_policy_end').val();
        var paramsArray = { 
                "product_type" : productType,  
                "hme_sum_insured": $('#lms_car_sum_insured').val() || $('#hme_sum_insured').val(),//$scope.hme_sum_insured,
                "lms_premium":  $('#lms_est_premium').val(),
                "lms_edit_product_id":$scope.lms_edit_product_id
            }

            var url = web_url + "LmsPersonalAccident/lmsPaProductUpdateDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    //document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }




    // $scope.pa_pro_suffered = '0';
    // $scope.pa_pro_Sonography = '0';
    // $scope.pa_pro_surgery = '0';
    // $scope.pa_pro_medication = '0';

    $scope.paUpdateProposal = function() {
        var web_url = $('#web_url').val();
         // alert($scope.pa_pro_nname);
            if( $("#uniform-pa_pro_suffered_yes span").hasClass("checked")){ var pa_pro_suffered = '1'; } else { var pa_pro_suffered = '0'; }
            if( $("#uniform-pa_pro_Sonography_yes span").hasClass("checked")){ var pa_pro_Sonography = '1'; } else { var pa_pro_Sonography = '0'; }
            if( $("#uniform-pa_pro_surgery_yes span").hasClass("checked")){ var pa_pro_surgery = '1'; } else { var pa_pro_surgery = '0'; }
            if( $("#uniform-pa_pro_medication_yes span").hasClass("checked")){
                var pa_pro_medication = '1'; 
               
            } else { 
                var pa_pro_medication = '0'; 
				
            }
		 var lms_car_comment = $scope.lms_car_comment;

        if ($scope.lmspaProposal.$valid) {
             var paramsArray = {  
                // proposal
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
                "comment_Date":$scope.functionGetDate()
            }

            var url = web_url + "LmsPersonalAccident/lmsPaProposalUpdateDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
				var responseData = Object(response.data);
                
				var responceDataR = Object(responseData);
	
                if (responceDataR.status == true) {
                    alert('Succesfully posted values, Lead Number is '+ responceDataR.message);
                    location.reload();
                } else {
					alert(responceDataR.message);
					return false;
				}
				/*
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData != 'false') {
                    alert('Succesfully posted values, Lead Number is '+ responseData);
                    location.reload();
                }                
             */
            });
        }
    } 


   

    $scope.travel_policy_type = 'Student';
    $scope.travel_type_trip ='Single Trip';
    $scope.travel_cover_type = 'Individual';
    $scope.travel_max_trip = 'thirtydays';
     $scope.TravelProductUpdateDetail = function() {
 
    if ($scope.lmstravelDetil.$valid) {
        
       var travel_trip_duration = $('#travel_trip_duration').val();
       var travel_age = $('#travel_age').val();
      
        var paramsArray = { 
                "product_type" : productType,  
                "travel_policy_type" : $scope.travel_policy_type,
                "travel_type_trip" :$scope.travel_type_trip,
                "travel_cover_type": $scope.travel_cover_type,
                "travel_depart_date" : $scope.travel_depart_date,
                "travel_return_date" :$scope.travel_return_date,
                "travel_trip_duration": travel_trip_duration,
                "traveltype" :$scope.traveltype,
                "geographical": $scope.geographical,
                "travel_max_trip" : $scope.travel_max_trip,
                "travel_relationship" :$scope.travel_relationship,
                "travel_date_birth": $scope.travel_date_birth,
                "travel_age" :$scope.travel_age,
                "travel_relationship_1": $scope.travel_relationship_,
                "travel_dob_1" :$scope.travel_dob_1,
                "travel_age_1": $scope.travel_age_1,
                "travel_relationship_2": $scope.travel_relationship_2,
                "travel_dob_2" :$scope.travel_dob_2,
                "travel_age_2": $scope.travel_age_2,
                "travel_relationship_3": $scope.travel_relationship_3,
                "travel_dob_3" :$scope.travel_dob_3,
                "travel_age_3": $scope.travel_age_3,
                "lms_premium":  $scope.lms_est_premium,
                "lms_edit_product_id": $scope.lms_edit_product_id,
            }

            var url = web_url + "LmsTravel/lmsTravelProductUpdateDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    //document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }


    $scope.tvl_pro_prosemi = '1';
    $scope.tvl_pro_engage = '1';
    $scope.tvl_pro_illness = '1';
     $scope.TravelUpdateProposal = function() {
        var web_url = $('#web_url').val();
        
        if( $("#uniform-tvl_pro_present_india_yes span").hasClass("checked")){ var tvl_pro_present_india = 'Yes'; } else { var tvl_pro_present_india = 'No'; }
        if( $("#uniform-tvl_pro_vaild_passport_no span").hasClass("checked")){ var tvl_pro_vaild_passport = 'Yes'; } else { var tvl_pro_vaild_passport = 'No'; }

        if( $("#uniform-tvl_pro_prosemi_yes span").hasClass("checked")){ var tvl_pro_prosemi = '1'; } else { var tvl_pro_prosemi = '0'; }
        if( $("#uniform-tvl_pro_engage_yes span").hasClass("checked")){ var tvl_pro_engage = '1'; } else { var tvl_pro_engage = '0'; }
        if( $("#uniform-tvl_pro_illness_yes span").hasClass("checked")){ var tvl_pro_illness = '1'; } else { var tvl_pro_illness = '0'; }
        
        if ($scope.lmsTravelProposal.$valid) {
             var paramsArray = {                 

                // proposal
                "tvl_pro_present_india" : tvl_pro_present_india, 
                "tvl_pro_vaild_passport" :tvl_pro_vaild_passport,
                "tvl_pro_national": $scope.tvl_pro_national,
                "tvl_pro_passport_no" : $scope.tvl_pro_passport_no,

                 // Options
                "tvl_pro_prosemi": $scope.tvl_pro_prosemi,
                "tvl_pro_engage": $scope.tvl_pro_engage,
                "tvl_pro_illness": $scope.tvl_pro_illness,
                           
                                          
                //Nominee Details

                "tvl_pro_nomie_name" : $scope.tvl_pro_nname,
                "tvl_pro_nomie_relation": $scope.tvl_pro_nomie_relation,
                "tvl_pro_nomie_age" : $scope.tvl_pro_nomie_age,
                "tvl_pro_nameofappoint": $scope.tvl_pro_nameofappoint,
                "tvl_pro_appoint_relation": $scope.tvl_pro_appoint_relation,

                "lms_edit_lead_id": $scope.lms_edit_lead_id,
                "lms_edit_customer_id": $scope.lms_edit_customer_id,
                "lms_edit_application_id":$scope.lms_edit_application_id,

                "lms_car_comment": $scope.lms_car_comment,
            }


            var url = web_url + "LmsTravel/lmsTravelProposalUpdateDetails/";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();

                if (responseData != 'false') {
                    alert('Succesfully posted values, Lead Number is '+ responseData);
                    location.reload();
                }
           
            });
        }
    } 





    $scope.officeUpdateProductDetail = function() {
  
        if ($scope.lmshomeDetil.$valid) {
            
           var Home_policy_end = $('#Home_policy_end').val();

            var hmeRiskAddress1 = $('#hme_risk_address1').val();
            var hmeRiskAddress2 = $('#hme_risk_address2').val();
            var hmeRiskArea = $('#hme_risk_area').val();
            var hmeRiskPincode = $('#hme_risk_pincode').val();
            var hmeRiskState = $('#hme_risk_state').val();
            var hmeRiskCity = $('#hme_risk_city').val();
            var hmeRiskNearestLandMark = $('#hme_risk_nearest_land_mark').val();

            if(hmeRiskAddress1 == ''){ $('#hme_risk_address1_error').html('Please Enter Riks Address1'); } else { $('#hme_risk_address1_error').html(''); }
            if(hmeRiskAddress2 == ''){ $('#hme_risk_address2_error').html('Please Enter Riks Address2'); } else { $('#hme_risk_address2_error').html(''); }
            if(hmeRiskArea == ''){ $('#hme_risk_area_error').html('Please Enter Risk Area'); } else { $('#hme_risk_area_error').html(''); }
            if(hmeRiskPincode == ''){ $('#hme_risk_pincode_error').html('Please Enter Pin Code'); } else { $('#hme_risk_pincode_error').html(''); }
            if(hmeRiskState == ''){ $('#hme_risk_state_error').html('Please Enter Risk State'); } else { $('#hme_risk_state_error').html(''); }
            if(hmeRiskCity == ''){ $('#hme_risk_city_error').html('Please Enter Risk City'); } else { $('#hme_risk_city_error').html(''); }
            if(hmeRiskNearestLandMark == ''){ $('#hme_risk_nearest_land_mark_error').html('Please Enter Risk Land Mark'); } else { $('#hme_risk_nearest_land_mark_error').html(''); }

            var paramsArray = { 
                "product_type" : productType,  

                'hme_building_type': $scope.hme_building_type,
                'hme_property_ownership': $scope.hme_property_ownership,
                'hme_previous_claims': $scope.hme_previous_claims,
                'hme_no_of_floors': $scope.hme_no_of_floors,
                'hme_year_of_construction': $scope.hme_year_of_construction,
                'hme_sum_insured_provided': $scope.hme_sum_insured_provided,
                'hme_risk_address_same': $scope.hme_risk_address_same,
                
                'hme_risk_address1': hmeRiskAddress1,
                'hme_risk_address2': hmeRiskAddress2,
                'hme_risk_area': hmeRiskArea,
                'hme_risk_pincode': hmeRiskPincode,
                'hme_risk_state': hmeRiskState,
                'hme_risk_city': hmeRiskCity,
                'hme_risk_nearest_land_mark': hmeRiskNearestLandMark,
                'lms_edit_product_id': $scope.lms_edit_product_id,

                'hme_long_des1': $scope.hme_long_des1,
                'hme_assets_damage1':$scope.hme_assets_damage1,
                'hme_cause_loss1':$scope.hme_cause_loss1,
                'hme_ins_place1': $scope.hme_ins_place1,
                'hme_policy_yr1':$scope.hme_policy_yr1,
                'hme_ins_claim1':$scope.hme_ins_claim1,
                'hme_loss_amt1':$scope.hme_loss_amt1,
                'pre_claim_update_id1': $scope.pre_claim_update_id1,

                'hme_long_des2': $scope.hme_long_des2,
                'hme_assets_damage2':$scope.hme_assets_damage2,
                'hme_cause_loss2':$scope.hme_cause_loss2,
                'hme_ins_place2': $scope.hme_ins_place2,
                'hme_policy_yr2':$scope.hme_policy_yr2,
                'hme_ins_claim2':$scope.hme_ins_claim2,
                'hme_loss_amt2':$scope.hme_loss_amt2,
                'hme_long_des3': $scope.hme_long_des3,
                'pre_claim_update_id2': $scope.pre_claim_update_id2,
                
                'hme_assets_damage3':$scope.hme_assets_damage3,
                'hme_cause_loss3':$scope.hme_cause_loss3,
                'hme_ins_place3': $scope.hme_ins_place3,
                'hme_policy_yr3':$scope.hme_policy_yr3,
                'hme_ins_claim3':$scope.hme_ins_claim3,
                'hme_loss_amt3':$scope.hme_loss_amt3,
                'hme_long_des4': $scope.hme_long_des4,
                'pre_claim_update_id3': $scope.pre_claim_update_id3,

                'hme_assets_damage4':$scope.hme_assets_damage4,
                'hme_cause_loss4':$scope.hme_cause_loss4,
                'hme_ins_place4': $scope.hme_ins_place4,
                'hme_policy_yr4':$scope.hme_policy_yr4,
                'hme_ins_claim4':$scope.hme_ins_claim4,
                'hme_loss_amt4':$scope.hme_loss_amt4,
                'pre_claim_update_id4': $scope.pre_claim_update_id4,                

                'hme_sum_insured': $scope.hme_sum_insured,
                "lms_premium":  $('#lms_est_premium').val(),
                "lms_edit_product_id": $scope.lms_edit_product_id,

            }

            var url = web_url + "LmsOffice/lmsOfficeUpdateProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                                      
                }
            });
        }
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
	
	$scope.calculateConstructionAge = function(){
		
		var electedYear = $('#hme_year_of_construction').val();
		
		var toDayDate = new Date();
		
		var yearThen = parseInt(electedYear);
        var monthThen = parseInt(toDayDate.getMonth()+1);
        var dayThen = parseInt(toDayDate.getDate());
		
		var birthday = new Date(yearThen, monthThen-1, dayThen);
		
        var today = new Date();
		
		var differenceInMilisecond = today.valueOf() - birthday.valueOf();
		
		var years = Math.floor(differenceInMilisecond / 31536000000);
		
		if( years > 25 ) {
         alert('Construction Age more than 25 years not allowed');
         $(this).val('');
         $(this).focus();
		 return false;
      } else {
		  return true;
	  }
		
   
	}
	
});
    
















