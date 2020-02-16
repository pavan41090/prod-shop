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
        if( paymentType =='Credit Card'){
            $('#emi_applicalble_outer').show();
        } else {
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

});



var app = angular.module('plunker', ['ngMessages']);


app.controller('myCtrl', function($scope, $http) {




    var productType = $('#product_type').val();
  
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

        default:
            $scope.lms_car_line_of_business = 'Miscellaneous';
            break;
    }



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
        
       // $scope.lms_car_cus_type = 'Individual';
        
       

    console.log($scope.lmsCar);
        if ($scope.lmsCar.$valid) {

            var paramsArray = {
                "lms_car_category": $scope.lms_car_category,
                "lms_car_line_of_business": $scope.lms_car_line_of_business,
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
                "lms_car_state": $scope.lms_car_state,
                "lms_car_city": $scope.lms_car_city,
                "lms_car_deatil_lead": $scope.lms_car_deatil_lead,
                "lms_car_email": $scope.lms_car_email,
                "lms_car_mobile": $scope.lms_car_mobile,
                "lms_car_cus_type": $scope.lms_car_cus_type,

                "lms_cus_customer": $scope.lms_cus_customer,
                "lms_cus_language": $scope.lms_cus_language,
                "lms_cus_emi": $scope.lms_cus_emi,
                "lms_cus_emi_yr": $scope.lms_cus_emi_yr,
                "lms_cus_pfee": $scope.lms_cus_pfee,
                "lms_cus_cardlimt": $scope.lms_cus_cardlimt,
                "lms_cus_sdate": $scope.lms_cus_sdate,
                "lms_cus_tle" : $scope.lms_cus_tle,
                "lms_cus_tbusins" : $scope.lms_cus_tbusins,
                "lms_house_number" : $scope.lms_house_number,

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

        if ($scope.lmsCarProposal.$valid) {
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
        
        var spouse_DOB = $('#sship_spouse').val();
        var spousedobship = '0';
        if ($('#Spouse_ship').is(":checked")) {   
            var Spouse_ship = '1';
           
        }

        var paramsArray = { 
                "product_type" : productType,  
                "spouse_ship" : Spouse_ship,
                "ship_spouse_dob" : spouse_DOB,
                "sship_income" : $scope.sship_income,
                "policy_term" : $scope.policyterm,
                "no_of_childrens": $scope.noofchildrens,
                "lms_premium":  $scope.lms_est_premium,
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

    $scope.spouse_suffered = '0';
    $scope.spouse_diseases = '0';
    $scope.spouse_psychiatric = '0';
    $scope.spouse_medication = '0';
    $scope.spouse_fibroid = '0';
    $scope.spouse_cyst = '0';
    $scope.spouse_bltest = '0';
    $scope.spouse_diabetes = '0';
    $scope.spouse_pregnant = '0';
    $scope.spouse_advice = '0';
    $scope.spouse_gutka = '0';

    $scope.child1_suffered = '0';
    $scope.child1_diseases = '0';
    $scope.child1_psychiatric = '0';
    $scope.child1_medication = '0';
    $scope.child1_fibroid = '0';
    $scope.child1_cyst = '0';
    $scope.child1_bltest = '0';
    $scope.child1_diabetes = '0';
    $scope.child1_pregnant = '0';
    $scope.child1_advice = '0';
    $scope.child1_gutka = '0';

    $scope.child2_suffered = '0';
    $scope.child2_diseases = '0';
    $scope.child2_psychiatric = '0';
    $scope.child2_medication = '0';
    $scope.child2_fibroid = '0';
    $scope.child2_cyst = '0';
    $scope.child2_bltest = '0';
    $scope.child2_diabetes = '0';
    $scope.child2_pregnant = '0';
    $scope.child2_advice = '0';
    $scope.child2_gutka = '0';

    $scope.child3_suffered = '0';
    $scope.child3_diseases = '0';
    $scope.child3_psychiatric = '0';
    $scope.child3_medication = '0';
    $scope.child3_fibroid = '0';
    $scope.child3_cyst = '0';
    $scope.child3_bltest = '0';
    $scope.child3_diabetes = '0';
    $scope.child3_pregnant = '0';
    $scope.child3_advice = '0';
    $scope.child3_gutka = '0';

    $scope.pre_ins_portability = '0';
    $scope.ship_tax_primary_insured = '0';

    $scope.shipProposal = function() {
        var web_url = $('#web_url').val();

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
                "spouse_height": $scope.spouse_height,
                "spouse_weight": $scope.spouse_weight,
                
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
                "spouse_salut": $scope.spouse_salut,
                "spouse_fname": $scope.spouse_fname,
                "spouse_lname": $scope.spouse_lname,
                "spouse_dob": $scope.spouse_dob,
                "spouse_gender": $scope.spouse_gender,
                "spouse_occupation": $scope.spouse_occupation,
                "spouse_height": $scope.spouse_height,
                "spouse_weight": $scope.spouse_weight,

                "spouse_suffered": $scope.spouse_suffered,
                "spouse_diseases": $scope.spouse_diseases,
                "spouse_psychiatric": $scope.spouse_psychiatric,
                "spouse_medication": $scope.spouse_medication,
                "spouse_fibroid": $scope.spouse_fibroid,
                "spouse_cyst": $scope.spouse_cyst,
                "spouse_bltest": $scope.spouse_bltest,
                "spouse_diabetes": $scope.spouse_diabetes,
                "spouse_pregnant": $scope.spouse_pregnant,
                "spouse_advice": $scope.spouse_advice,
                "spouse_gutka": $scope.spouse_gutka,


                "spouse_delivery_date": $scope.spouse_delivery_date,
                "spouse_smoke": $scope.spouse_smoke,
                "spouse_alcohol": $scope.spouse_alcohol,
                "spouse_pan_masala": $scope.spouse_pan_masala,
                "spouse_others": $scope.spouse_others,
                
                "spouse_surgery_name1" : $scope.spouse_surgery_name1,
                "spouse_diagnosis_date1" : $scope.spouse_diagnosis_date1,
                "spouse_date_consultation1" : $scope.spouse_date_consultation1,
                "spouse_treatment_type1" : $scope.spouse_treatment_type1,
                "spouse_hospital_name1" : $scope.spouse_hospital_name1,

                "spouse_surgery_name2" : $scope.spouse_surgery_name2,
                "spouse_diagnosis_date2" : $scope.spouse_diagnosis_date2,
                "spouse_date_consultation2" : $scope.spouse_date_consultation2,
                "spouse_treatment_type2" : $scope.spouse_treatment_type2,
                "spouse_hospital_name2" : $scope.spouse_hospital_name2,

                "spouse_surgery_name3" : $scope.spouse_surgery_name3,
                "spouse_diagnosis_date3" : $scope.spouse_diagnosis_date3,
                "spouse_date_consultation3" : $scope.spouse_date_consultation3,
                "spouse_treatment_type3" : $scope.spouse_treatment_type3,
                "spouse_hospital_name3" : $scope.spouse_hospital_name3,



                // child 01 details
                "child1_salut": $scope.child1_salut,
                "child1_fname": $scope.child1_fname,
                "child1_lname": $scope.child1_lname,
                "child1_dob": $scope.child1_dob,
                "child1_gender": $scope.child1_gender,
                "child1_occupation": $scope.child1_occupation,
                "child1_height": $scope.child1_height,
                "child1_weight": $scope.child1_weight,

                "child1_suffered": $scope.child1_suffered,
                "child1_diseases": $scope.child1_diseases,
                "child1_psychiatric": $scope.child1_psychiatric,
                "child1_medication": $scope.child1_medication,
                "child1_fibroid": $scope.child1_fibroid,
                "child1_cyst": $scope.child1_cyst,
                "child1_bltest": $scope.child1_bltest,
                "child1_diabetes": $scope.child1_diabetes,
                "child1_pregnant": $scope.child1_pregnant,
                "child1_advice": $scope.child1_advice,
                "child1_gutka": $scope.child1_gutka,

                "child1_delivery_date": $scope.child1_delivery_date,
                "child1_smoke": $scope.child1_smoke,
                "child1_alcohol": $scope.child1_alcohol,
                "child1_pan_masala": $scope.child1_pan_masala,
                "child1_others": $scope.child1_others,
                
                "child1_surgery_name1" : $scope.child1_surgery_name1,
                "child1_diagnosis_date1" : $scope.child1_diagnosis_date1,
                "child1_date_consultation1" : $scope.child1_date_consultation1,
                "child1_treatment_type1" : $scope.child1_treatment_type1,
                "child1_hospital_name1" : $scope.child1_hospital_name1,

                "child1_surgery_name2" : $scope.child1_surgery_name2,
                "child1_diagnosis_date2" : $scope.child1_diagnosis_date2,
                "child1_date_consultation2" : $scope.child1_date_consultation2,
                "child1_treatment_type2" : $scope.child1_treatment_type2,
                "child1_hospital_name2" : $scope.child1_hospital_name2,

                "child1_surgery_name3" : $scope.child1_surgery_name3,
                "child1_diagnosis_date3" : $scope.child1_diagnosis_date3,
                "child1_date_consultation3" : $scope.child1_date_consultation3,
                "child1_treatment_type3" : $scope.child1_treatment_type3,
                "child1_hospital_name3" : $scope.child1_hospital_name3,

                 // child 02 details
                "child2_salut": $scope.child2_salut,
                "child2_fname": $scope.child2_fname,
                "child2_lname": $scope.child2_lname,
                "child2_dob": $scope.child2_dob,
                "child2_gender": $scope.child2_gender,
                "child2_occupation": $scope.child2_occupation,
                "child2_height": $scope.child2_height,
                "child2_weight": $scope.child2_weight,

                "child2_suffered": $scope.child2_suffered,
                "child2_diseases": $scope.child2_diseases,
                "child2_psychiatric": $scope.child2_psychiatric,
                "child2_medication": $scope.child2_medication,
                "child2_fibroid": $scope.child2_fibroid,
                "child2_cyst": $scope.child2_cyst,
                "child2_bltest": $scope.child2_bltest,
                "child2_diabetes": $scope.child2_diabetes,
                "child2_pregnant": $scope.child2_pregnant,
                "child2_advice": $scope.child2_advice,
                "child2_gutka": $scope.child2_gutka,
                
                "child2_delivery_date": $scope.child2_delivery_date,
                "child2_smoke": $scope.child2_smoke,
                "child2_alcohol": $scope.child2_alcohol,
                "child2_pan_masala": $scope.child2_pan_masala,
                "child2_others": $scope.child2_others,
                
                "child2_surgery_name1" : $scope.child2_surgery_name1,
                "child2_diagnosis_date1" : $scope.child2_diagnosis_date1,
                "child2_date_consultation1" : $scope.child2_date_consultation1,
                "child2_treatment_type1" : $scope.child2_treatment_type1,
                "child2_hospital_name1" : $scope.child2_hospital_name1,

                "child2_surgery_name2" : $scope.child2_surgery_name2,
                "child2_diagnosis_date2" : $scope.child2_diagnosis_date2,
                "child2_date_consultation2" : $scope.child2_date_consultation2,
                "child2_treatment_type2" : $scope.child2_treatment_type2,
                "child2_hospital_name2" : $scope.child2_hospital_name2,

                "child2_surgery_name3" : $scope.child2_surgery_name3,
                "child2_diagnosis_date3" : $scope.child2_diagnosis_date3,
                "child2_date_consultation3" : $scope.child2_date_consultation3,
                "child2_treatment_type3" : $scope.child2_treatment_type3,
                "child2_hospital_name3" : $scope.child2_hospital_name3,


                
                // child 03 details
                "child3_salut": $scope.child3_salut,
                "child3_fname": $scope.child3_fname,
                "child3_lname": $scope.child3_lname,
                "child3_dob": $scope.child3_dob,
                "child3_gender": $scope.child3_gender,
                "child3_occupation": $scope.child3_occupation,
                "child3_height": $scope.child3_height,
                "child3_weight": $scope.child3_weight,

                "child3_suffered": $scope.child3_suffered,
                "child3_diseases": $scope.child3_diseases,
                "child3_psychiatric": $scope.child3_psychiatric,
                "child3_medication": $scope.child3_medication,
                "child3_fibroid": $scope.child3_fibroid,
                "child3_cyst": $scope.child3_cyst,
                "child3_bltest": $scope.child3_bltest,
                "child3_diabetes": $scope.child3_diabetes,
                "child3_pregnant": $scope.child3_pregnant,
                "child3_advice": $scope.child3_advice,
                "child3_gutka": $scope.child3_gutka,

                "child3_delivery_date": $scope.child3_delivery_date,
                "child3_smoke": $scope.child3_smoke,
                "child3_alcohol": $scope.child3_alcohol,
                "child3_pan_masala": $scope.child3_pan_masala,
                "child3_others": $scope.child3_others,
                
                "child3_surgery_name1" : $scope.child3_surgery_name1,
                "child3_diagnosis_date1" : $scope.child3_diagnosis_date1,
                "child3_date_consultation1" : $scope.child3_date_consultation1,
                "child3_treatment_type1" : $scope.child3_treatment_type1,
                "child3_hospital_name1" : $scope.child3_hospital_name1,

                "child3_surgery_name2" : $scope.child3_surgery_name2,
                "child3_diagnosis_date2" : $scope.child3_diagnosis_date2,
                "child3_date_consultation2" : $scope.child3_date_consultation2,
                "child3_treatment_type2" : $scope.child3_treatment_type2,
                "child3_hospital_name2" : $scope.child3_hospital_name2,

                "child3_surgery_name3" : $scope.child3_surgery_name3,
                "child3_diagnosis_date3" : $scope.child3_diagnosis_date3,
                "child3_date_consultation3" : $scope.child3_date_consultation3,
                "child3_treatment_type3" : $scope.child3_treatment_type3,
                "child3_hospital_name3" : $scope.child3_hospital_name3,


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

                "pre_ins_portability": $scope.pre_ins_portability,
                "ship_tax_primary_insured": $scope.ship_tax_primary_insured,

                "port_insurer_name1": $scope.port_insurer_name1,
                "port_policy_number1": $scope.port_policy_number1,
                "port_start_date1": $scope.port_start_date1,
                "port_end_date1" : $scope.port_end_date1,
                "port_sum_insured1": $scope.port_sum_insured1,
                "port_claim_lodged1" : $scope.port_claim_lodged1,
                "port_cumulative_bonus1": $scope.port_cumulative_bonus1,

                "port_insurer_name2": $scope.port_insurer_name2,
                "port_policy_number2": $scope.port_policy_number2,
                "port_start_date2": $scope.port_start_date2,
                "port_end_date2" : $scope.port_end_date2,
                "port_sum_insured2": $scope.port_sum_insured2,
                "port_claim_lodged2" : $scope.port_claim_lodged2,
                "port_cumulative_bonus2": $scope.port_cumulative_bonus2,                


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
                "ship_tax_nationality": $scope.ship_tax_nationality,
                "ship_tax_occupation": $scope.ship_tax_occupation,
                "ship_tax_income": $scope.ship_tax_income,
                "ship_tax_PPC_no": $scope.ship_tax_PPC_no,


            }

            var url = web_url + "LmsSuperShip/lmsProposalDetails/";
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

    $scope.spouse_ctill_pro_suffered = '0';
    $scope.spouse_ctill_pro_sonography = '0';
    $scope.spouse_ctill_pro_surgery = '0';
    $scope.spouse_ctill_pro_medication = '0';
    $scope.spouse_ctill_pro_Patient = '0';
    $scope.spouse_ctill_pro_breathing = '0';
    $scope.spouse_ctill_pro_illness = '0';
    $scope.spouse_ctill_pro_prosemi = '0';

    $scope.child1_ctill_pro_suffered = '0';
    $scope.child1_ctill_pro_sonography = '0';
    $scope.child1_ctill_pro_surgery = '0';
    $scope.child1_ctill_pro_medication = '0';
    $scope.child1_ctill_pro_Patient = '0';
    $scope.child1_ctill_pro_breathing = '0';
    $scope.child1_ctill_pro_illness = '0';
    $scope.child1_ctill_pro_prosemi = '0';

    $scope.child2_ctill_pro_suffered = '0';
    $scope.child2_ctill_pro_sonography = '0';
    $scope.child2_ctill_pro_surgery = '0';
    $scope.child2_ctill_pro_medication = '0';
    $scope.child2_ctill_pro_Patient = '0';
    $scope.child2_ctill_pro_breathing = '0';
    $scope.child2_ctill_pro_illness = '0';
    $scope.child2_ctill_pro_prosemi = '0';

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
                

                "self_salut2": $scope.spouse_salut,
                "self_fname2": $scope.spouse_fname,
                "self_lname2": $scope.spouse_lname,
                "self_dob2": $scope.spouse_dob,

                "suffered2": $scope.spouse_ctill_pro_suffered,
                "sonography2": $scope.spouse_ctill_pro_sonography,
                "surgery2": $scope.spouse_ctill_pro_surgery,
                "medication2": $scope.spouse_ctill_pro_medication,
                "patient2": $scope.spouse_ctill_pro_patient,
                "breathing2": $scope.spouse_ctill_pro_breathing,
                "illness2": $scope.spouse_ctill_pro_illness,


                "self_salut3": $scope.child1_salut,
                "self_fname3": $scope.child1_fname,
                "self_lname3": $scope.child1_lname,
                "self_dob3": $scope.child1_dob,

                "suffered3": $scope.child1_ctill_pro_suffered,
                "sonography3": $scope.child1_ctill_pro_sonography,
                "surgery3": $scope.child1_ctill_pro_surgery,
                "medication3": $scope.child1_ctill_pro_medication,
                "patient3": $scope.child1_ctill_pro_patient,
                "breathing3": $scope.child1_ctill_pro_breathing,
                "illness3": $scope.child1_ctill_pro_illness,
                

                "self_salut4": $scope.child2_salut,
                "self_fname4": $scope.child2_fname,
                "self_lname4": $scope.child2_lname,
                "self_dob4": $scope.child2_dob,

                "suffered4": $scope.child2_ctill_pro_suffered,
                "sonography4": $scope.child2_ctill_pro_sonography,
                "surgery4": $scope.child2_ctill_pro_surgery,
                "medication4": $scope.child2_ctill_pro_medication,
                "patient4": $scope.child2_ctill_pro_patient,
                "breathing4": $scope.child2_ctill_pro_breathing,
                "illness4": $scope.child2_ctill_pro_illness,
               
               
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
                "lms_premium":  $scope.lms_est_premium,
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

        if ($scope.lmspaProposal.$valid) {
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


               

            }

            var url = web_url + "LmsPersonalAccident/lmsPaProposalDetails/";
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



    

    $scope.Home_plans="Silver"
    $scope.HomeProductDetail = function() {
  
    if ($scope.lmshomeDetil.$valid) {
        
       var Home_policy_end = $('#Home_policy_end').val();
        var paramsArray = { 
                "product_type" : productType,  
                "Home_plans" : $scope.Home_plans,
                "Home_policy_start" : $scope.Home_policy_start,
                "Home_policy_end": Home_policy_end,
                "lms_premium":  $scope.lms_est_premium,
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

        if ($scope.lmshomeProposal.$valid) {
             var paramsArray = {                 

                // proposal
                "home_pro_policy_sdate":$scope.home_pro_policy_sdate,
               
                "home_pro_nomie_name" : $scope.home_pro_nname,
                "home_pro_nomie_relation": $scope.home_pro_nomie_relation,
                "home_pro_nomie_age" : $scope.home_pro_nomie_age,
                "home_pro_nameofappoint": $scope.home_pro_nameofappoint,
                "home_pro_appoint_relation": $scope.home_pro_appoint_relation,

                "lms_car_comment":$scope.lms_car_comment,


               

            }

            var url = web_url + "LmsHome/lmsHomeProposalDetails/";
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


});