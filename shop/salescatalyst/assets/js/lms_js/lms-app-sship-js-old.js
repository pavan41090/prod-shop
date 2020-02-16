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


    /*$('#spouse_DOB').on('change', function(){
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
    });*/

     


   /* $('#sship_spouse').on('change', function(){
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
    });*/

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
	console.log(differenceInMilisecond);
		var years = Math.floor(differenceInMilisecond / (365.25 * 24 * 60 * 60 * 1000));
		
		console.log(years);
		 if(years < 18) {
                return false;
                } else {
					return true;
		}
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

$scope.clickEnable = true;
$scope.pleaseWait = false;
$scope.continueBtn = false;
$scope.homeDetailsdis = true;
$scope.homeprocessDetailsdis = false;
$scope.homectnDetailsdis = false;
$scope.savelead = true;
$scope.pleasewait = false;
$scope.saveleadbtn = false;

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

    /* critial illeness related code starts here... */


    $scope.noofchildrens= '0';

$scope.emiObj={
    lms_cus_emi:"",
    lms_cus_emi_yr:""
};
$scope.clickEnable = true;
$scope.pleaseWait = false;
$scope.continueBtn = false;
$scope.homeDetailsdis = true;
$scope.homeprocessDetailsdis = false;
$scope.homectnDetailsdis = false;
$scope.saveleadctn = true;
$scope.saveleadPleasewait = false;
$scope.saveleadbtn = false;

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

$scope.onspousedobsubmit();
}

 $scope.onspousedobsubmit = function(){
   $('#spouse_dob').val($('#sship_spouse').val());
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
        
        if($('#ss_crtical').is(":checked")){
        var criticalVal = $('#ss_sum_insured_critical').val();
        if(criticalVal.length == 0){
            $('#sumcriticalValue').html('').append('Please Select In Sum Insured Amount');
            return false;
            } else {
                $('#sumcriticalValue').html('');
            }
        }
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
			
        
if ($scope.lmsCar.$valid) {
        var findMobileNumber = $('#lms_car_mobile').val();
        var mobileObject = new Object();
        mobileObject.number = findMobileNumber;
        mobileObject.productname = 'Super Ship';
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
                            $scope.getInsertSupershipAppData();
                            return true;
                        }
                        

                } else {
                    $('#lms_car_mobile').parent('div').children('div').html('');
                    $scope.getInsertSupershipAppData();
                    return true;
                }
            });
        }
   }
}
$scope.getInsertSupershipAppData = function(){
var Spouse_ship=0;
if ($('#Spouse_ship').is(":checked")) {   
    var Spouse_ship = '1';
}
var premiumdata = $scope.lms_est_premium || $('#lms_est_premium').val();
var spouse_DOB = $('#sship_spouse').val();
var spousedobship = '0';
var criticalVal = $('#ss_sum_insured_critical').val();
$scope.lms_car_city=$('#lms_car_city').val();
$scope.lms_car_state=$('#lms_car_state').val();
$scope.vision_address_name=$("#vision_address").is(":checked")?"1":"0";
$scope.lms_car_campaign_name =$('#lms_car_campaign_name').val();
$scope.clickEnable = false;
$scope.pleaseWait = true;
var customerAge = $('#lms_car_age').val();
var cateValue = '';
if($scope.channel == null || $scope.channel == undefined ){

  cateValue = $('#lms_car_category').val();

} else {
   cateValue = $scope.channel;
}  
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
                    //"comment_Date":$scope.functionGetDate(),
                    "product_type" : productType,  
                "spouse_ship" : Spouse_ship,
                "ship_spouse_dob" : spouse_DOB,             //$scope.sship_spouse,            
                "sship_income" : $scope.sship_income,
                "policy_term" : $scope.policyterm,
                "no_of_childrens": $scope.noofchildrens,
                "lms_premium":  premiumdata,
                "ss_sum_insured" : $scope.ss_sum_insured,
                "ss_tenure":$scope.ss_tenure,
                "ss_hospital_daily": $scope.ss_hospital_daily?"1":"0",
                "ss_critical":$scope.ss_critical?"1":"0",
                "ss_sum_insured_critical":$scope.ss_sum_insured_critical,
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
                "spouse_dob": spouse_DOB,
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
                //"comment_Date":$scope.functionGetDate()
                }
                //console.log(paramsArray);
                $scope.savelead = false;
                $scope.pleasewait = true;
                var url = __pathname + "LmsSuperShip/lmsCustomerDetails";
                $http.get(url, {
                    params: paramsArray
                }).then(function(response) {
                var responseData = Object(response.data);
                
                var responceDataR = Object(responseData);
    
                if (responceDataR.status == true) {
                    $scope.savelead = true;
                    $scope.pleasewait = false;
                    alert('Succesfully posted values, Lead Number is '+ responceDataR.message);
                    location.reload();
                    $("#superform :input").prop("disabled",true);
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

	