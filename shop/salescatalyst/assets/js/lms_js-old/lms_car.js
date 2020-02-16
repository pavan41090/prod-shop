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

    $('.dob_higher').on('change', function(){
        var insertedDate = $(this).val();
        var currentId =  $(this).attr('id');
        //alert(insertedDate);
        if(insertedDate != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate);
                $('#'+currentId).val('');
                $('#'+currentId).focus();
            }
        }
    });


    $('#spouse_DOB').on('change', function(){
        var insertedDate = $(this).val();
        ///alert(insertedDate);
        if(insertedDate != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate);
                $('#spouse_DOB').val('');
                $('#spouse_DOB').focus();
            }
        }
    });

     


    $('#sship_spouse').on('change', function(){
        var insertedDate = $(this).val();
        ///alert(insertedDate);
        if(insertedDate != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate);
                $('#sship_spouse').val('');
                $('#sship_spouse').focus();
            }
        }
    });

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
   



    $('#travel_date_birth').on('change', function(){
        var insertedDate = $(this).val();
        ///alert(insertedDate);
        if(insertedDate != ''){
            var compare = compareInputDateWithCurrentDate(insertedDate);
            //alert(compare);
            if(compare == false){
                alert('You cannot enter a date in the future! You entered date is - '+ insertedDate);
                $('#travel_date_birth').val('');
                $('#travel_date_birth').focus();
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
        /*var date2 =dateofbirth;
        var today = new Date();
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
             }  */ 
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

app.controller('myCtrl', function($scope, $http,$timeout,$rootScope) {

$scope.emiObj={
    lms_cus_emi:"",
    lms_cus_emi_yr:""
};

$scope.child1={};
$scope.child2={};
$scope.child3={};
//$scope.child4={};
$scope.spouse={};

/***** calculation Data *****/
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
				  $scope.zonewisecalculation();
               }
            });
		
   }
});
$scope.zonewisecalculation = function(data) {
	
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
/**** ends Here ****/
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
    $scope.spouse.spouse_ship=data.Spouse_ship;
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
    $scope.spouse.spouse_dob=data.spouse_dob;
    $scope.self_gender=data.self_gender;
    $scope.self_occupation=data.self_occupation;
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





$scope.isDisabled = false;
    $scope.customer = function(){
        $scope.isDisabled = true;
        return true;
    };


    var productType = $('#product_type').val();
	
  //  $scope.lms_car_category=$('#lms_car_category').val();

 setTimeout(function(){
    //$scope.channel=$('#lms_car_category').val();
  $scope.$apply();
},1000);

   
    switch (productType) {
        case 'Car':
            $scope.lms_car_line_of_business = 'Motor 4W';
            break;
        case 'Two Wheeler':
            $scope.lms_car_line_of_business = 'Motor 2W';
            break;
        case 'Travel':
            $scope.lms_car_line_of_business = 'Travel';
            break;
        case 'Health':
            $scope.lms_car_line_of_business = 'Health';
            break;
        case 'Home':
            $scope.lms_car_line_of_business = 'Home';
            break;
        case 'Personal Accident':
            $scope.lms_car_line_of_business = 'Personal Accident';
            break; 
        case 'Critical Illnes':
            $scope.lms_car_line_of_business = 'Critical Illnes';
            break;
        case 'Super Ship':
            $scope.lms_car_line_of_business = 'Super Ship';
            break;
        case 'Combo':
            $scope.lms_car_line_of_business = 'Combo';
            break;        
        case 'Office':
            $scope.lms_car_line_of_business = 'Office';
            break;        
        case 'Shop':
            $scope.lms_car_line_of_business = 'Shop';
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
        if($scope.lmsCar.$valid){
            $scope.isDisabled = false;
			$scope.customerdis= function() {
				$scope.isDisabled = true;
				return false;
			};


        }
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
                    alert(customerAge);
                    alert('Please check, age is less than 18');
                    $('#lms_car_dob').focus();
                    return false;
                } else if(customerAge > 65) {
                    alert('Please check, age is more than 65');
                    $('#lms_car_dob').focus();
                    return false;
                } 
            }  if(lineOfBusiness == 'Combo'){

                 
                if(customerAge < 18) {
                    
                    alert('Please check, age is less than 18');
                    $('#lms_car_dob').focus();
                    return false;
                } else if(customerAge >= 55) {
                    alert('Please check, age is more than 55');
                    $('#lms_car_dob').focus();
                    return false;
                } 



}
  
            
//Age validation in Home page by madheshwaran

    if (lineOfBusiness =='Home') {
        var date2String = $('#lms_car_dob').val();
		
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

                alert('Please check, age is less than 18');
                return false;
                }
  				
            }

 



////////////////////////////////

if($scope.channel==null || $scope.channel==undefined )

{

$scope.cateValue = $scope.lms_car_category;

}
else{
    $scope.cateValue = $scope.channel;
}         
$scope.lms_car_city=$('#lms_car_city').val();
$scope.lms_car_state=$('#lms_car_state').val();
$scope.vision_address_name=$("#vision_address").is(":checked")?"1":"0";
$scope.lms_car_campaign_name =$('#lms_car_campaign_name').val();



    var paramsArray = {
                    "lms_car_category": $scope.cateValue,
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
					"comment_Date":$scope.functionGetDate()
                }


                var url = web_url + "LmsCar/lmsCustomerDetails/";
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
        //} //age validation ends here..    

    }

    $scope.cardetail = function() {
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
            }

            var url = web_url + "LmsCar/lmsProductDetails/";
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



    $scope.lms_car_pro_financed = '0';

    $scope.lms_car_pro_prev_stand_alone = '0';
    $scope.lms_car_pro_prev_depre = '0';
    $scope.lms_car_pro_prev_electric = '0';
    $scope.lms_car_pro_prev_cng_lpg = '0';

     $scope.proposal = function() {
        var web_url = $('#web_url').val();
		var checkpolicytime = $scope.checkPolicyStartDate('lms_car_pro_policy_start');
        if ($scope.lmsCarProposal.$valid && (checkpolicytime == true)) {
             var paramsArray = {  
                "lms_car_prop_existing_insure": $scope.lms_car_prop_existing_insure,
                "lms_car_pro_existing_policynum": $scope.lms_car_pro_existing_policynum,
                "lms_car_pro_existing_policy_expiry": $scope.lms_car_pro_existing_policy_expiry,
                "lms_car_pro_policy_start": $scope.lms_car_pro_policy_start,
                "lms_car_pro_regis_date": $scope.lms_car_pro_regis_date,
                "lms_car_pro_engine_num": $scope.lms_car_pro_engine_num,
                "lms_car_pro_chasis_num": $scope.lms_car_pro_chasis_num,
                "lms_car_pro_financed": $scope.lms_car_pro_financed,


                "lms_car_pro_fin_ins_name": $scope.lms_car_pro_fin_ins_name,
                "lms_car_pro_fin_ins_city": $scope.lms_car_pro_fin_ins_city,
                "lms_car_pro_prev_stand_alone": $scope.lms_car_pro_prev_stand_alone,
                "lms_car_pro_prev_depre": $scope.lms_car_pro_prev_depre,
                "lms_car_pro_prev_electric": $scope.lms_car_pro_prev_electric,
                "lms_car_pro_prev_cng_lpg": $scope.lms_car_pro_prev_cng_lpg,
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

            }

            var url = web_url + "LmsCar/lmsProposalDetails/";
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


// super sship related code starts here.. 


$scope.noofchildrens= 'Silver';

$scope.shipProductDetail = function() {
   // alert('fsdfsdf');
   // var productType = $('#product_type').val();
   // alert(productType);
if ($scope.lmsShipProduct.$valid) {
    //$scope.isDisabled = false;
   $scope.customerdis= function() {
      // $scope.isDisabled = true;
       return false;
   };
}

 
    if ($scope.lmsShipProduct.$valid) {
        
        var spouse_DOB = $('#sship_spouse').val();
        var spousedobship = '0';
        if ($('#Spouse_ship').is(":checked")) {   
            var Spouse_ship = '1';
           
        }
        var criticalVal = $('#ss_sum_insured_critical').val();
		
		if($('#ss_crtical').is(":checked")){
			
			if(criticalVal.length == 0){
				$('#sumcriticalValue').html('').append('Please Select In Sum Insured Amount');
				return false;
				} else {
					$('#sumcriticalValue').html('');
				}
				
		}
        /*var critial = $('#ss_ss_crtical').val();
        var sscritical = '0';
        if ($('#ss_crtical').is(":checked")) {   
            var criticalss = '1';
           
        }*/

var premiumdata = $scope.lms_est_premium || $('#lms_est_premium').val();

        var paramsArray = { 
                "product_type" : productType,  
                "spouse_ship" : Spouse_ship,
                "ship_spouse_dob" : spouse_DOB,
                "sship_income" : $scope.sship_income,
                "policy_term" : $scope.policyterm,
                "no_of_childrens": $scope.noofchildrens,
                "lms_premium":  premiumdata,
                "ss_sum_insured" : $scope.ss_sum_insured,
                "ss_hospital_daily": $scope.ss_hospital_daily?"1":"0",
                "ss_critical":$scope.ss_critical?"1":"0",
                "ss_sum_insured_critical":$scope.ss_sum_insured_critical
            }

            var url = web_url + "LmsSuperShip/lmsProductDetails";
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
    $scope.ship_tax_primary_insured = '0';

    $scope.shipProposal = function() {
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

    /*if(!$scope.onQuestionnaire()){
        return;
   }*/
        if ($scope.lmsShipProposal.$valid) {
          
             var paramsArray = {  
                "sship_pro_policy_start": $scope.sship_pro_policy_start,
                //"sship_pro_height": $scope.sship_pro_height,
                //"sship_pro_Weight": $scope.sship_pro_Weight,

                // Options - proposal
                "sship_pro_suffered": $scope.sship_pro_suffered,
                "sship_pro_diseases": $scope.sship_pro_diseases,
                "sship_pro_psychiatric": $scope.sship_pro_psychiatric,
                "sship_pro_medication": $scope.sship_pro_medication,
                "sship_pro_fibroid": $scope.sship_pro_fibroid,
                "sship_pro_cyst": $scope.sship_pro_cyst,
                "sship_pro_bltest": $scope.sship_pro_bltest,
                "sship_pro_diabetes": $scope.sship_pro_diabetes,
                "sship_pro_pregnant": $scope.sship_pro_pregnant,
                "sship_pro_advice": $scope.sship_pro_advice,
                "sship_pro_Gutka": $scope.sship_pro_gutka,


                "self_salut": $scope.self_salut,
                "self_fname": $scope.self_fname,
                "self_lname": $scope.self_lname,
                "self_dob": $scope.self_dob,
                "self_gender": $scope.self_gender,
                "self_occupation": $scope.self_occupation,
                "spouse_height": $scope.spouse.spouse_height,
                "spouse_weight": $scope.spouse.spouse_weight,
                
                "sship_pro_height": $scope.sship_pro_height,
                "sship_pro_Weight": $scope.sship_pro_Weight,

                "delivery_date": $scope.delivery_date,
                "smoke": $scope.smoke,
                "alcohol": $scope.alcohol,
                "pan_masala": $scope.pan_masala,
                "others": $scope.others,
                
                "surgery_name1" : $scope.surgery_name1,
                "diagnosis_date1" : $scope.diagnosis_date1,
                "date_consultation1" : $scope.date_consultation1,
                "treatment_type1" : $scope.treatment_type1,
                "hospital_name1" : $scope.hospital_name1,

                "surgery_name2" : $scope.surgery_name2,
                "diagnosis_date2" : $scope.diagnosis_date2,
                "date_consultation2" : $scope.date_consultation2,
                "treatment_type2" : $scope.treatment_type2,
                "hospital_name2" : $scope.hospital_name2,

                "surgery_name3" : $scope.surgery_name3,
                "diagnosis_date3" : $scope.diagnosis_date3,
                "date_consultation3" : $scope.date_consultation3,
                "treatment_type3" : $scope.treatment_type3,
                "hospital_name3" : $scope.hospital_name3,


                // spouse details
                "spouse_salut": $scope.spouse.spouse_salut,
                "spouse_fname": $scope.spouse.spouse_fname,
                "spouse_lname": $scope.spouse.spouse_lname,
                "spouse_dob": $scope.spouse.spouse_dob,
                "spouse_gender": $scope.spouse.spouse_gender,
                "spouse_occupation": $scope.spouse.spouse_occupation,
                "spouse_height": $scope.spouse.spouse_height,
                "spouse_weight": $scope.spouse.spouse_weight,

                "spouse_suffered": $scope.spouse.spouse_suffered,
                "spouse_diseases": $scope.spouse.spouse_diseases,
                "spouse_psychiatric": $scope.spouse.spouse_psychiatric,
                "spouse_medication": $scope.spouse.spouse_medication,
                "spouse_fibroid": $scope.spouse.spouse_fibroid,
                "spouse_cyst": $scope.spouse.spouse_cyst,
                "spouse_bltest": $scope.spouse.spouse_bltest,
                "spouse_diabetes": $scope.spouse.spouse_diabetes,
                "spouse_pregnant": $scope.spouse.spouse_pregnant,
                "spouse_advice": $scope.spouse.spouse_advice,
                "spouse_gutka": $scope.spouse.spouse_gutka,


                "spouse_delivery_date": $scope.spouse.spouse_delivery_date,
                "spouse_smoke": $scope.spouse.spouse_smoke,
                "spouse_alcohol": $scope.spouse.spouse_alcohol,
                "spouse_pan_masala": $scope.spouse.spouse_pan_masala,
                "spouse_others": $scope.spouse.spouse_others,
                
                "spouse_surgery_name1" : $scope.spouse.spouse_surgery_name1,
                "spouse_diagnosis_date1" : $scope.spouse.spouse_diagnosis_date1,
                "spouse_date_consultation1" : $scope.spouse.spouse_date_consultation1,
                "spouse_treatment_type1" : $scope.spouse.spouse_treatment_type1,
                "spouse_hospital_name1" : $scope.spouse.spouse_hospital_name1,

                "spouse_surgery_name2" : $scope.spouse.spouse_surgery_name2,
                "spouse_diagnosis_date2" : $scope.spouse.spouse_diagnosis_date2,
                "spouse_date_consultation2" : $scope.spouse.spouse_date_consultation2,
                "spouse_treatment_type2" : $scope.spouse.spouse_treatment_type2,
                "spouse_hospital_name2" : $scope.spouse.spouse_hospital_name2,

                "spouse_surgery_name3" : $scope.spouse.spouse_surgery_name3,
                "spouse_diagnosis_date3" : $scope.spouse.spouse_diagnosis_date3,
                "spouse_date_consultation3" : $scope.spouse.spouse_date_consultation3,
                "spouse_treatment_type3" : $scope.spouse.spouse_treatment_type3,
                "spouse_hospital_name3" : $scope.spouse.spouse_hospital_name3,



                // child 01 details
                "child1_salut": $scope.child1.child1_salut,
                "child1_fname": $scope.child1.child1_fname,
                "child1_lname": $scope.child1.child1_lname,
                "child1_dob": $scope.child1.child1_dob,
                "child1_gender": $scope.child1.child1_gender,
                "child1_occupation": $scope.child1.child1_occupation,
                "child1_height": $scope.child1.child1_height,
                "child1_weight": $scope.child1.child1_weight,

                "child1_suffered": $scope.child1.child1_suffered,
                "child1_diseases": $scope.child1.child1_diseases,
                "child1_psychiatric": $scope.child1.child1_psychiatric,
                "child1_medication": $scope.child1.child1_medication,
                "child1_fibroid": $scope.child1.child1_fibroid,
                "child1_cyst": $scope.child1.child1_cyst,
                "child1_bltest": $scope.child1.child1_bltest,
                "child1_diabetes": $scope.child1.child1_diabetes,
                "child1_pregnant": $scope.child1.child1_pregnant,
                "child1_advice": $scope.child1.child1_advice,
                "child1_gutka": $scope.child1.child1_gutka,

                "child1_delivery_date": $scope.child1.child1_delivery_date,
                "child1_smoke": $scope.child1.child1_smoke,
                "child1_alcohol": $scope.child1.child1_alcohol,
                "child1_pan_masala": $scope.child1.child1_pan_masala,
                "child1_others": $scope.child1.child1_others,
                
                "child1_surgery_name1" : $scope.child1.child1_surgery_name1,
                "child1_diagnosis_date1" : $scope.child1.child1_diagnosis_date1,
                "child1_date_consultation1" : $scope.child1.child1_date_consultation1,
                "child1_treatment_type1" : $scope.child1.child1_treatment_type1,
                "child1_hospital_name1" : $scope.child1.child1_hospital_name1,

                "child1_surgery_name2" : $scope.child1.child1_surgery_name2,
                "child1_diagnosis_date2" : $scope.child1.child1_diagnosis_date2,
                "child1_date_consultation2" : $scope.child1.child1_date_consultation2,
                "child1_treatment_type2" : $scope.child1.child1_treatment_type2,
                "child1_hospital_name2" : $scope.child1.child1_hospital_name2,

                "child1_surgery_name3" : $scope.child1.child1_surgery_name3,
                "child1_diagnosis_date3" : $scope.child1.child1_diagnosis_date3,
                "child1_date_consultation3" : $scope.child1.child1_date_consultation3,
                "child1_treatment_type3" : $scope.child1.child1_treatment_type3,
                "child1_hospital_name3" : $scope.child1.child1_hospital_name3,

                 // child 02 details
                "child2_salut": $scope.child2.child2_salut,
                "child2_fname": $scope.child2.child2_fname,
                "child2_lname": $scope.child2.child2_lname,
                "child2_dob": $scope.child2.child2_dob,
                "child2_gender": $scope.child2.child2_gender,
                "child2_occupation": $scope.child2.child2_occupation,
                "child2_height": $scope.child2.child2_height,
                "child2_weight": $scope.child2.child2_weight,

                "child2_suffered": $scope.child2.child2_suffered,
                "child2_diseases": $scope.child2.child2_diseases,
                "child2_psychiatric": $scope.child2.child2_psychiatric,
                "child2_medication": $scope.child2.child2_medication,
                "child2_fibroid": $scope.child2.child2_fibroid,
                "child2_cyst": $scope.child2.child2_cyst,
                "child2_bltest": $scope.child2.child2_bltest,
                "child2_diabetes": $scope.child2.child2_diabetes,
                "child2_pregnant": $scope.child2.child2_pregnant,
                "child2_advice": $scope.child2.child2_advice,
                "child2_gutka": $scope.child2.child2_gutka,
                
                "child2_delivery_date": $scope.child2.child2_delivery_date,
                "child2_smoke": $scope.child2.child2_smoke,
                "child2_alcohol": $scope.child2.child2_alcohol,
                "child2_pan_masala": $scope.child2.child2_pan_masala,
                "child2_others": $scope.child2.child2_others,
                
                "child2_surgery_name1" : $scope.child2.child2_surgery_name1,
                "child2_diagnosis_date1" : $scope.child2.child2_diagnosis_date1,
                "child2_date_consultation1" : $scope.child2.child2_date_consultation1,
                "child2_treatment_type1" : $scope.child2.child2_treatment_type1,
                "child2_hospital_name1" : $scope.child2.child2_hospital_name1,

                "child2_surgery_name2" : $scope.child2.child2_surgery_name2,
                "child2_diagnosis_date2" : $scope.child2.child2_diagnosis_date2,
                "child2_date_consultation2" : $scope.child2.child2_date_consultation2,
                "child2_treatment_type2" : $scope.child2.child2_treatment_type2,
                "child2_hospital_name2" : $scope.child2.child2_hospital_name2,

                "child2_surgery_name3" : $scope.child2.child2_surgery_name3,
                "child2_diagnosis_date3" : $scope.child2.child2_diagnosis_date3,
                "child2_date_consultation3" : $scope.child2.child2_date_consultation3,
                "child2_treatment_type3" : $scope.child2.child2_treatment_type3,
                "child2_hospital_name3" : $scope.child2.child2_hospital_name3,


                
                // child 03 details
                "child3_salut": $scope.child3.child3_salut,
                "child3_fname": $scope.child3.child3_fname,
                "child3_lname": $scope.child3.child3_lname,
                "child3_dob": $scope.child3.child3_dob,
                "child3_gender": $scope.child3.child3_gender,
                "child3_occupation": $scope.child3.child3_occupation,
                "child3_height": $scope.child3.child3_height,
                "child3_weight": $scope.child3.child3_weight,

                "child3_suffered": $scope.child3.child3_suffered,
                "child3_diseases": $scope.child3.child3_diseases,
                "child3_psychiatric": $scope.child3.child3_psychiatric,
                "child3_medication": $scope.child3.child3_medication,
                "child3_fibroid": $scope.child3.child3_fibroid,
                "child3_cyst": $scope.child3.child3_cyst,
                "child3_bltest": $scope.child3.child3_bltest,
                "child3_diabetes": $scope.child3.child3_diabetes,
                "child3_pregnant": $scope.child3.child3_pregnant,
                "child3_advice": $scope.child3.child3_advice,
                "child3_gutka": $scope.child3.child3_gutka,

                "child3_delivery_date": $scope.child3.child3_delivery_date,
                "child3_smoke": $scope.child3.child3_smoke,
                "child3_alcohol": $scope.child3.child3_alcohol,
                "child3_pan_masala": $scope.child3.child3_pan_masala,
                "child3_others": $scope.child3.child3_others,
                
                "child3_surgery_name1" : $scope.child3.child3_surgery_name1,
                "child3_diagnosis_date1" : $scope.child3.child3_diagnosis_date1,
                "child3_date_consultation1" : $scope.child3.child3_date_consultation1,
                "child3_treatment_type1" : $scope.child3.child3_treatment_type1,
                "child3_hospital_name1" : $scope.child3.child3_hospital_name1,

                "child3_surgery_name2" : $scope.child3.child3_surgery_name2,
                "child3_diagnosis_date2" : $scope.child3.child3_diagnosis_date2,
                "child3_date_consultation2" : $scope.child3.child3_date_consultation2,
                "child3_treatment_type2" : $scope.child3.child3_treatment_type2,
                "child3_hospital_name2" : $scope.child3.child3_hospital_name2,

                "child3_surgery_name3" : $scope.child3.child3_surgery_name3,
                "child3_diagnosis_date3" : $scope.child3.child3_diagnosis_date3,
                "child3_date_consultation3" : $scope.child3.child3_date_consultation3,
                "child3_treatment_type3" : $scope.child3.child3_treatment_type3,
                "child3_hospital_name3" : $scope.child3.child3_hospital_name3,


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

                //"pre_ins_portability": $scope.pre_ins_portability,
                "ship_tax_primary_insured": $scope.ship_tax_primary_insured,

                /*"port_insurer_name1": $scope.port_insurer_name1,
                "port_policy_number1": $scope.port_policy_number1,
                "port_start_date1": $scope.port_start_date1,
                "port_end_date1" : $scope.port_end_date1,
                "port_sum_insured1": $scope.port_sum_insured1,
                "port_claim_lodged1" : $scope.port_claim_lodged1,
                "port_cumulative_bonus1": $scope.port_cumulative_bonus1,
*/
                /*"port_insurer_name2": $scope.port_insurer_name2,
                "port_policy_number2": $scope.port_policy_number2,
                "port_start_date2": $scope.port_start_date2,
                "port_end_date2" : $scope.port_end_date2,
                "port_sum_insured2": $scope.port_sum_insured2,
                "port_claim_lodged2" : $scope.port_claim_lodged2,
                "port_cumulative_bonus2": $scope.port_cumulative_bonus2,   */            


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
				"comment_Date":$scope.functionGetDate()


            }

            var url = web_url + "LmsSuperShip/lmsProposalDetails";
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

    /* Supership related code ends here...*/

    /* critial illeness related code starts here... */


    $scope.noofchildrens= '0';

    $scope.CIProductDetail = function() {
 
    if ($scope.lmsciDetil.$valid) {
        
        var spouse_DOB = $('#ci_spouse_DOB').val();
        var spouse_ci = '0';
        if ($('#Spouse_ship').is(":checked")) {   
            var spouse_CI = '1';
            //var spousedobship = $scope.spousedobcritical;
        }

        var paramsArray = { 
                "product_type" : productType,  
                "spouse_CI" : spouse_CI,
                "CI_spouse_dob" : spouse_DOB,
                "no_of_childrens": $scope.noofchildrens,
                "lms_premium":  $scope.lms_est_premium,
            }

            var url = web_url + "LmsCriticalIllnes/lmsProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }



    $scope.ctill_pro_suffered = '0';
    $scope.ctill_pro_sonography = '0';
    $scope.ctill_pro_surgery = '0';
    $scope.ctill_pro_medication = '0';
    $scope.ctill_pro_patient = '0';
    $scope.ctill_pro_breathing = '0';
    $scope.ctill_pro_illness = '0';
    $scope.ctill_pro_prosemi = '0';

    $scope.spouse.spouse_ctill_pro_suffered = '0';
    $scope.spouse.spouse_ctill_pro_sonography = '0';
    $scope.spouse.spouse_ctill_pro_surgery = '0';
    $scope.spouse.spouse_ctill_pro_medication = '0';
    $scope.spouse.spouse_ctill_pro_Patient = '0';
    $scope.spouse.spouse_ctill_pro_breathing = '0';
    $scope.spouse.spouse_ctill_pro_illness = '0';
    $scope.spouse.spouse_ctill_pro_prosemi = '0';

    $scope.child1.child1_ctill_pro_suffered = '0';
    $scope.child1.child1_ctill_pro_sonography = '0';
    $scope.child1.child1_ctill_pro_surgery = '0';
    $scope.child1.child1_ctill_pro_medication = '0';
    $scope.child1.child1_ctill_pro_Patient = '0';
    $scope.child1.child1_ctill_pro_breathing = '0';
    $scope.child1.child1_ctill_pro_illness = '0';
    $scope.child1.child1_ctill_pro_prosemi = '0';

    $scope.child2.child2_ctill_pro_suffered = '0';
    $scope.child2.child2_ctill_pro_sonography = '0';
    $scope.child2.child2_ctill_pro_surgery = '0';
    $scope.child2.child2_ctill_pro_medication = '0';
    $scope.child2.child2_ctill_pro_Patient = '0';
    $scope.child2.child2_ctill_pro_breathing = '0';
    $scope.child2.child2_ctill_pro_illness = '0';
    $scope.child2.child2_ctill_pro_prosemi = '0';

    $scope.ciProposal = function() {
        var web_url = $('#web_url').val();

        if ($scope.lmsCiProposal.$valid) {
             var paramsArray = {  
               
                // proposal
                "ctill_pro_policy_sdate":$scope.ctill_pro_policy_sdate,
                "ctill_tax_primary_insured": $scope.ctill_tax_primary_insured,

                "ctill_tax_your_name": $scope.ctill_tax_your_name,
                "ctill_tax_primary_relation": $scope.ctill_tax_primary_relation,
                // Options
                // "ctill_pro_suffered": $scope.ctill_pro_suffered,
                // "ctill_pro_Sonography": $scope.ctill_pro_sonography,
                // "ctill_pro_surgery": $scope.ctill_pro_surgery,
                // "ctill_pro_medication": $scope.ctill_pro_medication,
                // "ctill_pro_Patient": $scope.ctill_pro_patient,
                // "ctill_pro_breathing": $scope.ctill_pro_breathing,
                // "ctill_pro_illness": $scope.ctill_pro_illness,
                // "ctill_pro_prosemi": $scope.ctill_pro_prosemi,


                "self_salut1": $scope.self_salut,
                "self_fname1": $scope.self_fname,
                "self_lname1": $scope.self_lname,
                "self_dob1": $scope.self_dob,
 
                "suffered1": $scope.ctill_pro_suffered,
                "sonography1": $scope.ctill_pro_sonography,
                "surgery1": $scope.ctill_pro_surgery,
                "medication1": $scope.ctill_pro_medication,
                "patient1": $scope.ctill_pro_patient,
                "breathing1": $scope.ctill_pro_breathing,
                "illness1": $scope.ctill_pro_illness,
                

                "self_salut2": $scope.spouse.spouse_salut,
                "self_fname2": $scope.spouse.spouse_fname,
                "self_lname2": $scope.spouse.spouse_lname,
                "self_dob2": $scope.spouse.spouse_dob,

                "suffered2": $scope.spouse.spouse_ctill_pro_suffered,
                "sonography2": $scope.spouse.spouse_ctill_pro_sonography,
                "surgery2": $scope.spouse.spouse_ctill_pro_surgery,
                "medication2": $scope.spouse.spouse_ctill_pro_medication,
                "patient2": $scope.spouse.spouse_ctill_pro_patient,
                "breathing2": $scope.spouse.spouse_ctill_pro_breathing,
                "illness2": $scope.spouse.spouse_ctill_pro_illness,


                "self_salut3": $scope.child1.child1_salut,
                "self_fname3": $scope.child1.child1_fname,
                "self_lname3": $scope.child1.child1_lname,
                "self_dob3": $scope.child1.child1_dob,

                "suffered3": $scope.child1.child1_ctill_pro_suffered,
                "sonography3": $scope.child1.child1_ctill_pro_sonography,
                "surgery3": $scope.child1.child1_ctill_pro_surgery,
                "medication3": $scope.child1.child1_ctill_pro_medication,
                "patient3": $scope.child1.child1_ctill_pro_patient,
                "breathing3": $scope.child1.child1_ctill_pro_breathing,
                "illness3": $scope.child1.child1_ctill_pro_illness,
                

                "self_salut4": $scope.child2.child2_salut,
                "self_fname4": $scope.child2.child2_fname,
                "self_lname4": $scope.child2.child2_lname,
                "self_dob4": $scope.child2.child2_dob,

                "suffered4": $scope.child2.child2_ctill_pro_suffered,
                "sonography4": $scope.child2.child2_ctill_pro_sonography,
                "surgery4": $scope.child2.child2_ctill_pro_surgery,
                "medication4": $scope.child2.child2_ctill_pro_medication,
                "patient4": $scope.child2.child2_ctill_pro_patient,
                "breathing4": $scope.child2.child2_ctill_pro_breathing,
                "illness4": $scope.child2.child2_ctill_pro_illness,
               
               
                "ctill_pro_nomie_name" : $scope.ctill_pro_nname,
                "ctill_pro_nomie_relation": $scope.ctill_pro_nomie_relation,
                "ctill_pro_nomie_age" : $scope.ctill_pro_nomie_age,
                "ctill_pro_nameofappoint": $scope.ctill_pro_nameofappoint,
                "ctill_pro_appoint_relation": $scope.ctill_pro_appoint_relation,
                "lms_car_comment": $scope.lms_car_comment,
            
            }

            var url = web_url + "LmsCriticalIllnes/lmsCiProposalDetails/";
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




   
     
   $scope.PaProductDetail = function() {
 
    if ($scope.lmspaDetil.$valid) {
        
       var Home_policy_end = $('#Home_policy_end').val();
        var paramsArray = { 
                "product_type" : productType,  
                "gainful": $scope.gainful,
                "sum_insured": $scope.lms_car_sum_insured,
                "lms_premium": $('#lms_est_premium').val(),
            }

            var url = web_url + "LmsPersonalAccident/lmsPaProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }

    $scope.pa_pro_suffered = '0';
    $scope.pa_pro_Sonography = '0';
    $scope.pa_pro_surgery = '0';
    $scope.pa_pro_medication = '0';

    $scope.paProposal = function() {
		
        var web_url = $('#web_url').val();
         // alert($scope.pa_pro_nname);
		 
		 var checkpolicytime = $scope.checkPolicyStartDate('pa_pro_policy_sdate');
		 
        if ($scope.lmspaProposal.$valid && (checkpolicytime == true)) {
             var paramsArray = {  


                // proposal
                "pa_pro_policy_sdate":$scope.pa_pro_policy_sdate,
               

                // Options
                "pa_pro_suffered": $scope.pa_pro_suffered,
                "pa_pro_Sonography": $scope.pa_pro_Sonography,
                "pa_pro_surgery": $scope.pa_pro_surgery,
                "pa_pro_medication": $scope.pa_pro_medication,
                
               

                //Nominee Details
                "pa_pro_nomie_name" : $scope.pa_pro_nname,
                "pa_pro_nomie_relation": $scope.pa_pro_nomie_relation,
                "pa_pro_nomie_age" : $scope.pa_pro_nomie_age,
                "pa_pro_nameofappoint": $scope.pa_pro_nameofappoint,
                "pa_pro_appoint_relation": $scope.pa_pro_appoint_relation,
                "pa_similar_policy_comment": $scope.similar_policy_comment,

                "lms_car_comment":$scope.lms_car_comment,

				 "comment_Date":$scope.functionGetDate()

            }

            var url = web_url + "LmsPersonalAccident/lmsPaProposalDetails";
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
			
             
            });
        }
    } 



    

    //$scope.Home_plans="Silver"
    $scope.HomeProductDetail = function() {
  
    var buildingType = $scope.hme_building_type;
	
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
    if(buildingType == '' ){
		
        alert('Please select Type of Building Construction');
		
    } else {
		
        if(buildingType == 'Kutcha'){
             alert('Kutcha Construction not allowed');
             $('#hme_building_type').val('');
             $('#hme_building_type').focus();
             return false;
        }
    }
	
	var selecedDateTime = $scope.calculateConstructionAge();
    if ($scope.lmshomeDetil.$valid && (selecedDateTime == true)) {
        
        var hmeRiskAddress1 = $('#hme_risk_address1').val();
        var hmeRiskAddress2 = $('#hme_risk_address2').val();
        var hmeRiskArea = $('#hme_risk_area').val();
        var hmeRiskPincode = $('#hme_risk_pincode').val();
        var hmeRiskState = $('#hme_risk_state').val();
        var hmeRiskCity = $('#hme_risk_city').val();
        var hmeRiskNearestLandMark = $('#hme_risk_nearest_land_mark').val();
		var countter=0;
        if(hmeRiskAddress1 == ''){ 
		$('#hme_risk_address1_error').html('Please Enter Riks Address1');
		countter++;
		} else { $('#hme_risk_address1_error').html(''); 
		}
        if(hmeRiskAddress2 == ''){ 
		$('#hme_risk_address2_error').html('Please Enter Riks Address2');
		countter++;
		} else { $('#hme_risk_address2_error').html(''); }
        if(hmeRiskArea == ''){ $('#hme_risk_area_error').html('Please Enter Risk Area');
		countter++;
		} else { $('#hme_risk_area_error').html(''); }
        if(hmeRiskPincode == ''){ 
		$('#hme_risk_pincode_error').html('Please Enter Pin Code');
		countter++;
		} else { $('#hme_risk_pincode_error').html(''); }
        if(hmeRiskState == ''){ 
		$('#hme_risk_state_error').html('Please Enter Risk State');
		countter++;
		} else { $('#hme_risk_state_error').html(''); }
        if(hmeRiskCity == ''){
			$('#hme_risk_city_error').html('Please Enter Risk City');
			countter++;
			} else { $('#hme_risk_city_error').html(''); }
        if(hmeRiskNearestLandMark == ''){ 
		$('#hme_risk_nearest_land_mark_error').html('Please Enter Risk Land Mark');
		countter++;
		} else { $('#hme_risk_nearest_land_mark_error').html(''); }
		
		if(countter > 0) return false;
        var Home_policy_end = $('#Home_policy_end').val();
      //var preClaim = $('#hme_previous_claims').val();

        var paramsArray = { 
                "product_type" : productType,  
                //"Home_plans" : $scope.Home_plans,
                //"Home_policy_start" : $scope.Home_policy_start,
                //"Home_policy_end": Home_policy_end,

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
				
				'hme_checked_valuables' : (($('#uniform-valuables span').attr('class') == 'checked') ? 1 : 0),
				'hme_checked_SIM_PEE' : (($('#uniform-SIM_PEE span').attr('class')  == 'checked') ? 1 : 0),
				'hme_checked_SIM_structure' : (($('#uniform-SIM_structure span').attr('class')  == 'checked') ? 1 : 0),
				
                'hme_itm_des_val1': $scope.hme_itm_des_val1,
                'hme_weight_val1':$scope.hme_weight_val1,
                'hme_SI_val1':$scope.hme_SI_val1,
                'hme_itm_des_val2': $scope.hme_itm_des_val2,
                'hme_weight_val2':$scope.hme_weight_val2,
                'hme_SI_val2':$scope.hme_SI_val2,
                'hme_itm_des_val3': $scope.hme_itm_des_val3,
                'hme_weight_val3':$scope.hme_weight_val3,
                'hme_SI_val3':$scope.hme_SI_val3,
                'hme_itm_des_val4': $scope.hme_itm_des_val4,
                'hme_weight_val4':$scope.hme_weight_val4,
                'hme_SI_val4':$scope.hme_SI_val4,
                'hme_itm_des_val5': $scope.hme_itm_des_val5,
                'hme_weight_val5':$scope.hme_weight_val5,
                'hme_SI_val5':$scope.hme_SI_val5,
                'hme_itm_des_val6': $scope.hme_itm_des_val6,
                'hme_weight_val6':$scope.hme_weight_val6,
                'hme_SI_val6':$scope.hme_SI_val6,

                'hme_itm_des_PEE1': $scope.hme_itm_des_PEE1,
                'hme_make_PEE1':$scope.hme_make_PEE1,
                'hme_mdl_PEE1':$scope.hme_mdl_PEE1,
                'hme_yom_PEE1': $scope.hme_yom_PEE1,
                'hme_imei_PEE1':$scope.hme_imei_PEE1,
                'hme_SI_PEE1':$scope.hme_SI_PEE1,
                'hme_itm_des_PEE2': $scope.hme_itm_des_PEE2,
                'hme_make_PEE2':$scope.hme_make_PEE2,
                'hme_mdl_PEE2':$scope.hme_mdl_PEE2,
                'hme_yom_PEE2': $scope.hme_yom_PEE2,
                'hme_imei_PEE2':$scope.hme_imei_PEE2,
                'hme_SI_PEE2':$scope.hme_SI_PEE2,
                'hme_itm_des_PEE3': $scope.hme_itm_des_PEE3,
                'hme_make_PEE3':$scope.hme_make_PEE3,
                'hme_mdl_PEE3':$scope.hme_mdl_PEE3,
                'hme_yom_PEE3': $scope.hme_yom_PEE3,
                'hme_imei_PEE3':$scope.hme_imei_PEE3,
                'hme_SI_PEE3':$scope.hme_SI_PEE3,                
                'hme_itm_des_PEE4': $scope.hme_itm_des_PEE4,
                'hme_make_PEE4':$scope.hme_make_PEE4,
                'hme_mdl_PEE4':$scope.hme_mdl_PEE4,
                'hme_yom_PEE4': $scope.hme_yom_PEE4,
                'hme_imei_PEE4':$scope.hme_imei_PEE4,
                'hme_SI_PEE4':$scope.hme_SI_PEE4,
                'hme_itm_des_PEE5': $scope.hme_itm_des_PEE5,
                'hme_make_PEE5':$scope.hme_make_PEE5,
                'hme_mdl_PEE5':$scope.hme_mdl_PEE5,
                'hme_yom_PEE5': $scope.hme_yom_PEE5,
                'hme_imei_PEE5':$scope.hme_imei_PEE5,
                'hme_SI_PEE5':$scope.hme_SI_PEE5,
                'hme_itm_des_PEE6': $scope.hme_itm_des_PEE6,
                'hme_make_PEE6':$scope.hme_make_PEE6,
                'hme_mdl_PEE6':$scope.hme_mdl_PEE6,
                'hme_yom_PEE6': $scope.hme_yom_PEE6,
                'hme_imei_PEE6':$scope.hme_imei_PEE6,
                'hme_SI_PEE6':$scope.hme_SI_PEE6,



                'hme_long_des1': $scope.hme_long_des1,
                'hme_assets_damage1':$scope.hme_assets_damage1,
                'hme_cause_loss1':$scope.hme_cause_loss1,
                'hme_ins_place1': $scope.hme_ins_place1,
                'hme_policy_yr1':$scope.hme_policy_yr1,
                'hme_ins_claim1':$scope.hme_ins_claim1,
                'hme_loss_amt1':$scope.hme_loss_amt1,
                'hme_long_des2': $scope.hme_long_des2,
                'hme_assets_damage2':$scope.hme_assets_damage2,
                'hme_cause_loss2':$scope.hme_cause_loss2,
                'hme_ins_place2': $scope.hme_ins_place2,
                'hme_policy_yr2':$scope.hme_policy_yr2,
                'hme_ins_claim2':$scope.hme_ins_claim2,
                'hme_loss_amt2':$scope.hme_loss_amt2,
                'hme_long_des3': $scope.hme_long_des3,
                'hme_assets_damage3':$scope.hme_assets_damage3,
                'hme_cause_loss3':$scope.hme_cause_loss3,
                'hme_ins_place3': $scope.hme_ins_place3,
                'hme_policy_yr3':$scope.hme_policy_yr3,
                'hme_ins_claim3':$scope.hme_ins_claim3,
                'hme_loss_amt3':$scope.hme_loss_amt3,
                'hme_long_des4': $scope.hme_long_des4,
                'hme_assets_damage4':$scope.hme_assets_damage4,
                'hme_cause_loss4':$scope.hme_cause_loss4,
                'hme_ins_place4': $scope.hme_ins_place4,
                'hme_policy_yr4':$scope.hme_policy_yr4,
                'hme_ins_claim4':$scope.hme_ins_claim4,
                'hme_loss_amt4':$scope.hme_loss_amt4,                

                'hme_sum_insured': $scope.hme_sum_insured,
                "lms_premium":  $('#lms_est_premium').val(),
            }

            // As per user requirements i removed this one field mandatory 
//Preclaim discription validation
        /*if(preClaim == 'yes'){ 

        if ($scope.hme_previous_claims=="yes" && (paramsArray.hme_long_des1 == null || paramsArray.hme_long_des1 == '' || paramsArray.hme_long_des1 == 'undefined')){ 
            
            alert("please enter the Long Description at least 1");
            return false;
            }
  }*/


         
// item discription validation
 /*if($('#valuables').is(":checked")){ 
         
        

        if (paramsArray.hme_SI_val1 == null || paramsArray.hme_SI_val1 =='' || paramsArray.hme_SI_val1 =='undefined') {

            alert("please enter the Valuable Item Description at least 1");
            return false;
            }
  
  }
*/
  //portable electronic validation
/*
if($('#SIM_PEE').is(":checked")){ 

               if (paramsArray.hme_itm_des_PEE1 == null || paramsArray.hme_itm_des_PEE1 =='' || paramsArray.hme_itm_des_PEE1 =='undefined') {

    alert("please enter the Valuable Portable Electronic Equipment at least 1");
    return false;
}
  
            }*/

// alert box for valuable things
var total_sum_insured = 0;
var calculated_sum_insured = 0;

if(!(paramsArray.hme_SI_val1 == null) && !(paramsArray.hme_SI_val1 == 'undefined')){
    
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_val1);
  
}

if(!(paramsArray.hme_SI_val2 == null) && !(paramsArray.hme_SI_val2 == 'undefined')){
 
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_val2);

}

if(!(paramsArray.hme_SI_val3 == null) && !(paramsArray.hme_SI_val3 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_val3);
}

if(!(paramsArray.hme_SI_val4 == null) && !(paramsArray.hme_SI_val4 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_val5);
}

if(!(paramsArray.hme_SI_val5 == null) && !(paramsArray.hme_SI_val5 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_val5);
}

if(!(paramsArray.hme_SI_val6 == null) && !(paramsArray.hme_SI_val6 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_val6);
}

calculated_sum_insured=parseInt(total_sum_insured);
var hme_si = parseInt(paramsArray.hme_sum_insured);
if(hme_si < calculated_sum_insured){
    alert("insured values is more than your seleced plan .");
    return false;
}


//alert box for Protable Electronic Equipments
var total_sum_insured = 0;
var calculated_sum_insured = 0;

if(!(paramsArray.hme_SI_PEE1 == null) && !(paramsArray.hme_SI_PEE1 == 'undefined')){
    
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_PEE1);
   
}

if(!(paramsArray.hme_SI_PEE2 == null) && !(paramsArray.hme_SI_PEE2 == 'undefined')){
  
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_PEE2);
    
}

if(!(paramsArray.hme_SI_PEE3 == null) && !(paramsArray.hme_SI_PEE3 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_PEE3);
}

if(!(paramsArray.hme_SI_PEE4 == null) && !(paramsArray.hme_SI_PEE4 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_PEE4);
}

if(!(paramsArray.hme_SI_PEE5 == null) && !(paramsArray.hme_SI_PEE5 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_PEE5);
}

if(!(paramsArray.hme_SI_PEE6 == null) && !(paramsArray.hme_SI_PEE6 == 'undefined')){
    total_sum_insured=parseInt(total_sum_insured)+parseInt(paramsArray.hme_SI_PEE6);
}

calculated_sum_insured=parseInt(total_sum_insured);
var hme_si = parseInt(paramsArray.hme_sum_insured);
if(hme_si < calculated_sum_insured){
    alert("insured values is more than your seleced plan .");
    return false;
}





            var url = web_url + "LmsHome/lmsHomeProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }

     $scope.homeProposal = function() {
        var web_url = $('#web_url').val();
         // alert($scope.pa_pro_nname);
        var proNomieAge = $scope.home_pro_nomie_age;
        var homeProNameofAppoint = $('#home_pro_nameofappoint').val();

        var checkpolicytime = $scope.checkPolicyStartDate('home_pro_policy_sdate');
        if ($scope.lmshomeProposal.$valid && (checkpolicytime == true)) {

            if(proNomieAge < 18 && homeProNameofAppoint == ''){
                $('#app_name_error').html('Please Enter Appointee Name');
                $('#home_pro_nameofappoint').focus();
                return false;
            } else {
                $('#app_name_error').html('');
            }


            var paramsArray = {                 
                "home_pro_policy_sdate":$scope.home_pro_policy_sdate,
                "home_pro_nomie_name" : $scope.home_pro_nname,
                "home_pro_nomie_relation": $scope.home_pro_nomie_relation,
                "home_pro_nomie_age" : proNomieAge,
                "home_pro_nameofappoint": $scope.home_pro_nameofappoint,
                "home_pro_appoint_relation": $scope.home_pro_appoint_relation,
                "lms_car_comment":$scope.lms_car_comment,
                "comment_Date":$scope.functionGetDate(),
            }

            var url = web_url + "LmsHome/lmsHomeProposalDetails";
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
               
            });
        }
    } 

    $scope.travel_policy_type = 'Student';
    $scope.travel_type_trip ='Single Trip';
    $scope.travel_cover_type = 'Individual';
    $scope.travel_max_trip = 'thirtydays';
     $scope.travel_relationship = 'Self';
     $scope.TravelProductDetail = function() {
 
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
                "travel_age" : $('#travel_age').val(),
                "travel_relationship_1": $scope.travel_relationship_,
                "travel_dob_1" :$scope.travel_dob_1,
                "travel_age_1": $('#travel_age_1').val(),
                "travel_relationship_2": $scope.travel_relationship_2,
                "travel_dob_2" :$scope.travel_dob_2,
                "travel_age_2": $('#travel_age_2').val(),
                "travel_relationship_3": $scope.travel_relationship_3,
                "travel_dob_3" :$scope.travel_dob_3,
                "travel_age_3": $('#travel_age_3').val(),
                "lms_premium":  $scope.lms_est_premium,
            }

            var url = web_url + "LmsTravel/lmsTravelProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }



    $scope.tvl_pro_present_india = 'Yes';
    $scope.tvl_pro_vaild_passport ='Yes';
    $scope.tvl_pro_prosemi = '1';
    $scope.tvl_pro_engage = '1';
    $scope.tvl_pro_illness = '1';
    $scope.travel_relationship = 'Self';
     $scope.TravelProposal = function() {
        var web_url = $('#web_url').val();
         // alert($scope.pa_pro_nname);

        if ($scope.lmsTravelProposal.$valid) {
             var paramsArray = {                 

                // proposal
                "tvl_pro_present_india" : $scope.tvl_pro_present_india,
                "tvl_pro_vaild_passport" :$scope.tvl_pro_vaild_passport,
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
                "lms_car_comment": $scope.lms_car_comment,



            }


            var url = web_url + "LmsTravel/lmsTravelProposalDetails/";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();

                if (responseData != 'false') {
                    alert('Succesfully posted values, Lead Number is '+ responseData);
                    location.reload();
                }
                // if (responseData == 'success') {
                //     alert('Succesfully posted values');
                //     location.reload();
                    
                // }
            });
        }
    } 







    $scope.shopProductDetail = function() {
        //alert('dsdasd');
  

  //console.log($scope.lmsshopDetil); 
    var buildingType = $scope.shop_building_type; 
    if(buildingType == '' ){
        alert('Please select Type of Building Construction')
    } else {
        if(buildingType == 'Kutcha'){
             alert('Kutcha Construction not allowed');
             $('#shop_building_type').val('');
             $('#shop_building_type').focus();
             return false;
        }
    }

    if ($scope.lmsshopDetil.$valid) {
        //alert('inside');
        var shopRiskAddress1 = $('#shop_risk_address1').val();
        var shopRiskAddress2 = $('#shop_risk_address2').val();
        var shopRiskArea = $('#shop_risk_area').val();
        var shopRiskPincode = $('#shop_risk_pincode').val();
        var shopRiskState = $('#shop_risk_state').val();
        var shopRiskCity = $('#shop_risk_city').val();
        var shopRiskNearestLandMark = $('#shop_risk_nearest_land_mark').val();

        if(shopRiskAddress1 == ''){ $('#shop_risk_address1_error').html('Please Enter Riks Address1'); } else { $('#shop_risk_address1_error').html(''); }
        if(shopRiskAddress2 == ''){ $('#shop_risk_address2_error').html('Please Enter Riks Address2'); } else { $('#shop_risk_address2_error').html(''); }
        if(shopRiskArea == ''){ $('#shop_risk_area_error').html('Please Enter Risk Area'); } else { $('#shop_risk_area_error').html(''); }
        if(shopRiskPincode == ''){ $('#shop_risk_pincode_error').html('Please Enter Pin Code'); } else { $('#shop_risk_pincode_error').html(''); }
        if(shopRiskState == ''){ $('#shop_risk_state_error').html('Please Enter Risk State'); } else { $('#shop_risk_state_error').html(''); }
        if(shopRiskCity == ''){ $('#shop_risk_city_error').html('Please Enter Risk City'); } else { $('#shop_risk_city_error').html(''); }
        if(shopRiskNearestLandMark == ''){ $('#shop_risk_nearest_land_mark_error').html('Please Enter Risk Land Mark'); } else { $('#shop_risk_nearest_land_mark_error').html(''); }

       var shop_policy_end = $('#Home_policy_end').val();
        var paramsArray = { 
                "product_type" : productType,  
                //"Home_plans" : $scope.Home_plans,
                //"Home_policy_start" : $scope.Home_policy_start,
                //"Home_policy_end": Home_policy_end,

                'shop_building_type': $scope.shop_building_type,
                'shop_property_ownership': $scope.shop_property_ownership,
                'shop_property_type': $scope.shop_property_type,
                'shop_previous_claims': $scope.shop_previous_claims,
                'shop_no_of_floors': $scope.shop_no_of_floors,
                'shop_year_of_construction': $scope.shop_year_of_construction,
                'shop_independent_house': $scope.shop_independent_house,
                'shop_compound_wall': $scope.shop_compound_wall,
                'shop_build_up': $scope.shop_build_up,
                'shop_sum_insured_provided': $scope.shop_sum_insured_provided,
                'shop_risk_address_same': $scope.shop_risk_address_same,
                
                'shop_risk_address1': shopRiskAddress1,
                'shop_risk_address2': shopRiskAddress2,
                'shop_risk_area': shopRiskArea,
                'shop_risk_pincode': shopRiskPincode,
                'shop_risk_state': shopRiskState,
                'shop_risk_city': shopRiskCity,
                'shop_risk_nearest_land_mark': shopRiskNearestLandMark,


                'shop_long_des1': $scope.shop_long_des1,
                'shop_assets_damage1':$scope.shop_assets_damage1,
                'shop_cause_loss1':$scope.shop_cause_loss1,
                'shop_ins_place1': $scope.shop_ins_place1,
                'shop_policy_yr1':$scope.shop_policy_yr1,
                'shop_ins_claim1':$scope.shop_ins_claim1,
                'shop_loss_amt1':$scope.shop_loss_amt1,
                'shop_long_des2': $scope.shop_long_des2,
                'shop_assets_damage2':$scope.shop_assets_damage2,
                'shop_cause_loss2':$scope.shop_cause_loss2,
                'shop_ins_place2': $scope.shop_ins_place2,
                'shop_policy_yr2':$scope.shop_policy_yr2,
                'shop_ins_claim2':$scope.shop_ins_claim2,
                'shop_loss_amt2':$scope.shop_loss_amt2,
                'shop_long_des3': $scope.shop_long_des3,
                'shop_assets_damage3':$scope.shop_assets_damage3,
                'shop_cause_loss3':$scope.shop_cause_loss3,
                'shop_ins_place3': $scope.shop_ins_place3,
                'shop_policy_yr3':$scope.shop_policy_yr3,
                'shop_ins_claim3':$scope.shop_ins_claim3,
                'shop_loss_amt3':$scope.shop_loss_amt3,
                'shop_long_des4': $scope.shop_long_des4,
                'shop_assets_damage4':$scope.shop_assets_damage4,
                'shop_cause_loss4':$scope.shop_cause_loss4,
                'shop_ins_place4': $scope.shop_ins_place4,
                'shop_policy_yr4':$scope.shop_policy_yr4,
                'shop_ins_claim4':$scope.shop_ins_claim4,
                'shop_loss_amt4':$scope.shop_loss_amt4,                

                'shop_sum_insured': $scope.shop_sum_insured,
                "lms_premium":  $('#lms_est_premium').val(),
            }

            if ($scope.shop_previous_claims=="yes" && (paramsArray.shop_long_des1 == null || paramsArray.shop_long_des1 == '' || paramsArray.shop_long_des1 == 'undefined')){ 
            
                alert("please enter the Long Description at least 1");
                return false;
            }

            var url = web_url + "LmsShop/lmsShopProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }


    $scope.shopProposalDetail = function() {
        var web_url = $('#web_url').val();
         // alert($scope.pa_pro_nname);
        var proNomieAge = $scope.shop_pro_nomie_age;
        var shopProNameofAppoint = $('#shop_pro_nameofappoint').val();

        if ($scope.lmsShopProposal.$valid) {


            if(proNomieAge < 18 && shopProNameofAppoint == ''){
                $('#app_name_error').html('Please Enter Appointee Name');
                $('#shop_pro_nameofappoint').focus();
                return false;
            } else {
                $('#app_name_error').html('');
            }


            var paramsArray = {                 
                "shop_pro_policy_sdate":$scope.home_pro_policy_sdate,
                "shop_pro_nomie_name" : $scope.shop_pro_nname,
                "shop_pro_nomie_relation": $scope.shop_pro_nomie_relation,
                "shop_pro_nomie_age" : proNomieAge,
                "shop_pro_nameofappoint": $scope.shop_pro_nameofappoint,
                "shop_pro_appoint_relation": $scope.shop_pro_appoint_relation,
                "lms_car_comment":$scope.lms_car_comment,
            }

            var url = web_url + "LmsShop/lmsShopProposalDetails/";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();

                if (responseData != 'false') {
                    alert('Succesfully posted values, Lead Number is '+ responseData);
                    location.reload();
                }                
                // if (responseData == 'success') {
                //     alert('Succesfully posted values');
                //     location.reload();
                    
                // }
            });
        }
    } 






    $scope.officeProductDetail = function() {
 
  //console.log($scope.lmsofficeDetil); 
    var buildingType = $scope.office_building_type; 
    if(buildingType == '' ){
        alert('Please select Type of Building Construction')
    } else {
        if(buildingType == 'Kutcha'){
             alert('Kutcha Construction not allowed');
             $('#office_building_type').val('');
             $('#office_building_type').focus();
             return false;
        }
    }

    if ($scope.lmsofficeDetil.$valid) {
        //alert('inside');
        var officeRiskAddress1 = $('#office_risk_address1').val();
        var officeRiskAddress2 = $('#office_risk_address2').val();
        var officeRiskArea = $('#office_risk_area').val();
        var officeRiskPincode = $('#office_risk_pincode').val();
        var officeRiskState = $('#office_risk_state').val();
        var officeRiskCity = $('#office_risk_city').val();
        var officeRiskNearestLandMark = $('#office_risk_nearest_land_mark').val();

        if(officeRiskAddress1 == ''){ $('#office_risk_address1_error').html('Please Enter Riks Address1'); } else { $('#office_risk_address1_error').html(''); }
        if(officeRiskAddress2 == ''){ $('#office_risk_address2_error').html('Please Enter Riks Address2'); } else { $('#office_risk_address2_error').html(''); }
        if(officeRiskArea == ''){ $('#office_risk_area_error').html('Please Enter Risk Area'); } else { $('#office_risk_area_error').html(''); }
        if(officeRiskPincode == ''){ $('#office_risk_pincode_error').html('Please Enter Pin Code'); } else { $('#office_risk_pincode_error').html(''); }
        if(officeRiskState == ''){ $('#office_risk_state_error').html('Please Enter Risk State'); } else { $('#office_risk_state_error').html(''); }
        if(officeRiskCity == ''){ $('#office_risk_city_error').html('Please Enter Risk City'); } else { $('#office_risk_city_error').html(''); }
        if(officeRiskNearestLandMark == ''){ $('#office_risk_nearest_land_mark_error').html('Please Enter Risk Land Mark'); } else { $('#office_risk_nearest_land_mark_error').html(''); }

       var office_policy_end = $('#Home_policy_end').val();
        var paramsArray = { 
                "product_type" : productType,  
                //"Home_plans" : $scope.Home_plans,
                //"Home_policy_start" : $scope.Home_policy_start,
                //"Home_policy_end": Home_policy_end,

                'office_building_type': $scope.office_building_type,
                'office_property_ownership': $scope.office_property_ownership,
                'office_property_type': $scope.office_property_type,
                'office_previous_claims': $scope.office_previous_claims,
                'office_no_of_floors': $scope.office_no_of_floors,
                'office_year_of_construction': $scope.office_year_of_construction,
                'office_independent_house': $scope.office_independent_house,
                'office_compound_wall': $scope.office_compound_wall,
                'office_build_up': $scope.office_build_up,
                'office_sum_insured_provided': $scope.office_sum_insured_provided,
                'office_risk_address_same': $scope.office_risk_address_same,
            
                'office_risk_address1': officeRiskAddress1,
                'office_risk_address2': officeRiskAddress2,
                'office_risk_area': officeRiskArea,
                'office_risk_pincode': officeRiskPincode,
                'office_risk_state': officeRiskState,
                'office_risk_city': officeRiskCity,
                'office_risk_nearest_land_mark': officeRiskNearestLandMark,


                'office_long_des1': $scope.office_long_des1,
                'office_assets_damage1':$scope.office_assets_damage1,
                'office_cause_loss1':$scope.office_cause_loss1,
                'office_ins_place1': $scope.office_ins_place1,
                'office_policy_yr1':$scope.office_policy_yr1,
                'office_ins_claim1':$scope.office_ins_claim1,
                'office_loss_amt1':$scope.office_loss_amt1,
                'office_long_des2': $scope.office_long_des2,
                'office_assets_damage2':$scope.office_assets_damage2,
                'office_cause_loss2':$scope.office_cause_loss2,
                'office_ins_place2': $scope.office_ins_place2,
                'office_policy_yr2':$scope.office_policy_yr2,
                'office_ins_claim2':$scope.office_ins_claim2,
                'office_loss_amt2':$scope.office_loss_amt2,
                'office_long_des3': $scope.office_long_des3,
                'office_assets_damage3':$scope.office_assets_damage3,
                'office_cause_loss3':$scope.office_cause_loss3,
                'office_ins_place3': $scope.office_ins_place3,
                'office_policy_yr3':$scope.office_policy_yr3,
                'office_ins_claim3':$scope.office_ins_claim3,
                'office_loss_amt3':$scope.office_loss_amt3,
                'office_long_des4': $scope.office_long_des4,
                'office_assets_damage4':$scope.office_assets_damage4,
                'office_cause_loss4':$scope.office_cause_loss4,
                'office_ins_place4': $scope.office_ins_place4,
                'office_policy_yr4':$scope.office_policy_yr4,
                'office_ins_claim4':$scope.office_ins_claim4,
                'office_loss_amt4':$scope.office_loss_amt4,                

                'office_sum_insured': $scope.office_sum_insured,
                "lms_premium":  $('#lms_est_premium').val()
            }

            //offc product alert box 
           if ($scope.office_previous_claims=="yes" && (paramsArray.office_long_des1 == null || paramsArray.office_long_des1 == '' || paramsArray.office_long_des1 == 'undefined')){ 
            
            alert("please enter the Long Description at least 1");
            return false;
            }
  

            var url = web_url + "LmsOffice/lmsOfficeProductDetails";
            $http.get(url, {
                params: paramsArray
            }).then(function(response) {
                var responseData = response.data;
                responseData = responseData.trim();
                if (responseData == 'success') {
                    alert('Succesfully posted values');
                    document.getElementById('carproposal').className = "carshow";
                    document.getElementById('hide').className = "carhide";
                    
                }
            });
        }
    }




    $scope.officeProposalDetail = function() {
      

        var web_url = $('#web_url').val();
         // alert($scope.pa_pro_nname);
        var proNomieAge = $scope.office_pro_nomie_age;
        var officeProNameofAppoint = $('#office_pro_nameofappoint').val();
        

        if ($scope.lmsOfficeProposal.$valid) {    

            if(proNomieAge < 18 && officeProNameofAppoint == ''){
                $('#app_name_error').html('Please Enter Appointee Name');
                $('#office_pro_nameofappoint').focus();
                return false;
            } else {
                $('#app_name_error').html('');
            }

            var paramsArray = {                 
                "office_pro_policy_sdate":$scope.office_pro_policy_sdate,
                "office_pro_nomie_name" : $scope.office_pro_nname,
                "office_pro_nomie_relation": $scope.office_pro_nomie_relation,
                "office_pro_nomie_age" : proNomieAge,
                "office_pro_nameofappoint": $scope.office_pro_nameofappoint,
                "office_pro_appoint_relation": $scope.office_pro_appoint_relation,
                "lms_car_comment":$scope.lms_car_comment,
            }


            var url = web_url + "LmsOffice/lmsOfficeProposalDetails/";
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