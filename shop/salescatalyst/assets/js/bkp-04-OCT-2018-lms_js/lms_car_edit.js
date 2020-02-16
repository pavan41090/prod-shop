$(document).ready(function() {
    $("#load_modal").click();
    setTimeout(showPage, 5000);
    function showPage() {
        $("#close_modal").click();
    };

});


var app = angular.module('plunker', ['ngMessages']);

app.controller('myCtrl', function($scope, $http) {

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
            $scope.lms_car_payment_type = response.data[0]['payment_type'];           
            $scope.lms_car_sub_channel = response.data[0]['sub_channel'];           
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
            $scope.lms_car_deatil_lead = response.data[0]['lead_details'];           
            $scope.lms_car_pro_landmark = response.data[0]['cust_landmark'];           
            $scope.lms_car_pro_emergency = response.data[0]['emergency_contact_num'];           
            $scope.lms_car_pro_gstn = response.data[0]['GSTIN'];           
            $scope.lms_car_email = response.data[0]['cust_email'];           
            $scope.lms_car_mobile = response.data[0]['cust_phone']; 

            //$scope.lms_car_cus_type = response.data[0]['cust_type']; 
            if(response.data[0]['cust_type'] == 'corporate') {
                $("#uniform-lms_car_cus_type_corporate span").addClass("checked", true);
            } else { 
                $("#uniform-lms_car_cus_type_individual span").addClass("checked", true); 
            }

            $scope.lms_cus_customer = response.data[0]['cus_customer'];           
            $scope.lms_cus_language = response.data[0]['cus_language'];           
            $scope.lms_cus_tbusins = response.data[0]['business_type'];
            
            if(response.data[0]['processing_fee'] == '1') {
                $("#uniform-processing_fee_yes span").addClass("checked", true);
            } else {
                $("#uniform-processing_fee_no span").addClass("checked", true);
            }

            $scope.lms_cus_cardlimt = response.data[0]['cus_cardlimt'];           
            $scope.lms_cus_sdate = response.data[0]['statement_date'];

            //$scope.lms_cus_tle = response.data[0]['temp_LE'];  
            if(response.data[0]['temp_LE'] == '1') {
                $("#uniform-lms_cus_tle_yes span").addClass("checked", true);
            } else {
                $("#uniform-lms_cus_tle_no span").addClass("checked", true);
            }

            $scope.lms_car_pro_occupation = response.data[0]['occupation'];           
            $scope.lms_cus_emi = response.data[0]['cus_emi'];                
            $scope.lms_cus_emi_yr = response.data[0]['cus_emi_yr'];           

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

            //home related  
            $scope.Home_policy_start = response.data[0]['home_policy_start'];
            $scope.Home_policy_end = response.data[0]['home_policy_end'];
            $scope.home_pro_policy_sdate = response.data[0]['new_policy_start'];
            $scope.home_pro_nname = response.data[0]['nominee_name'];
            $scope.home_pro_nomie_age = response.data[0]['nominee_age'];
            $scope.home_pro_nomie_relation = response.data[0]['nominee_relationship'];
            $scope.home_pro_nameofappoint = response.data[0]['appointee_name'];
            $scope.home_pro_appoint_relation = response.data[0]['appointee_relationship'];

            //ship related...
           // $scope.Spouse_ship.active = true;
           // $scope.noofchildrens = 0; 
           
            if(response.data[0]['ship_spouse_include'] == 1){
                $("#uniform-Spouse_ship span").addClass("checked", true);
                $(".answer").show();
                $scope.sship_spouse =  response.data[0]['ship_spouse_dob'];
                $scope.spouse_DOB =  response.data[0]['ship_spouse_dob'];
            } 

            switch(response.data[0]['ship_no_of_children']){
                case '0':
                    $("#uniform-noofchildrens0 span").addClass("checked", true);
                    break;
                case '1':
                    $("#uniform-noofchildrens1 span").addClass("checked", true);
                    break;
                case '2':
                    $("#uniform-noofchildrens2 span").addClass("checked", true);
                    break;
                case '3':
                    $("#uniform-noofchildrens3 span").addClass("checked", true);
                    break;

                default:
                    $("#uniform-noofchildrens0 span").addClass("checked", true);
                    break;
            }

//$scope.ship_pro_doc_name ='fdfdsfsdf';

    $scope.sship_income =  response.data[0]['ship_income'];
    $scope.policyterm =  response.data[0]['ship_policy_term'];
    $scope.sship_pro_policy_start = response.data[0]['new_policy_start'];

    var memberDetails = response.data[0]['member_details'];

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
        var update_id = 'edit_option_id'+b;


  
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
    $("#uniform-ship_tax_primary_insured_yes span").addClass("checked", true);
    $('#tax_primary_insured_div').show();
} else {
    $("#uniform-ship_tax_primary_insured_no span").addClass("checked", true);
    $('#tax_primary_insured_div').hide();
}

    var primaryInsuredArray =  response.data[0]['primary_insured'];

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

if(primaryInsuredArray[0]['prim_nationality'] == '1') { $("#uniform-ship_tax_nationality_yes span").addClass("checked", true);} else {$("#uniform-ship_tax_nationality_no span").addClass("checked", true);}

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
            $scope.pa_pro_nameofappoint = response.data[0]['appointee_relationship'];
             
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

    });   








    $scope.formData = {};
    
    $scope.lms_car_claim_policy = '0';
    $scope.updateCustomer = function() {


        if( $("#uniform-processing_fee_yes span").hasClass("checked")){ var lms_cus_pfee = '1'; } else { var lms_cus_pfee = '0'; }
       
        if( $("#uniform-lms_car_cus_type_corporate span").hasClass("checked")){ var lms_car_cus_type = 'corporate'; } else { var lms_car_cus_type = 'individual'; }
 
        if( $("#uniform-lms_cus_tle_yes span").hasClass("checked")){ var lms_cus_tle = '1'; } else { var lms_cus_tle = '0'; }
 
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
                "lms_car_cus_type": lms_car_cus_type,

                "lms_cus_customer": $scope.lms_cus_customer,
                "lms_cus_language": $scope.lms_cus_language,
                "lms_cus_emi": $scope.lms_cus_emi,
                "lms_cus_emi_yr": $scope.lms_cus_emi_yr,
                "lms_cus_pfee": lms_cus_pfee,
                "lms_cus_cardlimt": $scope.lms_cus_cardlimt,
                "lms_cus_sdate": $scope.lms_cus_sdate,
                "lms_cus_tle": lms_cus_tle,
                "lms_cus_tbusins": $scope.lms_cus_tbusins,

                "lms_edit_lead_id": $scope.lms_edit_lead_id,
                "lms_edit_customer_id": $scope.lms_edit_customer_id,
                "lms_edit_application_id":$scope.lms_edit_application_id,
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

 $scope.Home_plans="Silver"
    $scope.HomeUpdateProductDetail = function() {
  
    if ($scope.lmshomeDetil.$valid) {
        
       var Home_policy_end = $('#Home_policy_end').val();
        var paramsArray = { 
                "product_type" : productType,  
                "Home_plans" : $scope.Home_plans,
                "Home_policy_start" : $scope.Home_policy_start,
                "Home_policy_end": Home_policy_end,
                "lms_premium":  $scope.lms_est_premium,
                "lms_edit_product_id": $scope.lms_edit_product_id,
    

            }

            var url = web_url + "LmsHome/lmsHomeUpdateProductDetails";
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


     $scope.homeUpdateProposal = function() {
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

                "lms_edit_proposal_id": $scope.lms_edit_proposal_id,
                "lms_edit_nominee_id": $scope.lms_edit_nominee_id,

            }

            var url = web_url + "LmsHome/lmsHomeUpdateProposalDetails/";
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


//$scope.noofchildrens= '0';

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

        if( $("#uniform-noofchildrens0 span").hasClass("checked")){ 
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


        var paramsArray = { 
                "product_type" : productType,  
                "spouse_ship" : Spouse_ship,
                "ship_spouse_dob" : spouse_DOB,
                "sship_income" : $scope.sship_income,
                "policy_term" : $scope.policyterm,
                "no_of_childrens": noofchildrens,
                "lms_premium":  $scope.lms_est_premium,
                "lms_edit_product_id": $scope.lms_edit_product_id,

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




//console.log($scope.lmsShipProposal);
        if ($scope.lmsShipProposal.$valid) {

            var paramsArray = {  

                "sship_pro_policy_start": $scope.sship_pro_policy_start,
                "pre_ins_portability": pre_ins_portability,
                "ship_tax_primary_insured" : ship_tax_primary_insured,
                "edit_option_id1": $scope.edit_option_id1,
                "salut_mem1" : $scope.salut_mem1,
                "fname_mem1": $scope.fname_mem1,
                "lname_mem1": $scope.lname_mem1,
                "dob_mem1": $scope.dob_mem1,
                "gender_mem1":$scope.gender_mem1,
                "occupation_mem1":$scope.occupation_mem1,
                "height_mem1":$scope.height_mem1,
                "weight_mem1":$scope.weight_mem1,
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


                "edit_option_id2": $scope.edit_option_id2,
                "salut_mem2" : $scope.salut_mem2,
                "fname_mem2": $scope.fname_mem2,
                "lname_mem2": $scope.lname_mem2,
                "dob_mem2": $scope.dob_mem2,
                "gender_mem2":$scope.gender_mem2,
                "occupation_mem2":$scope.occupation_mem2,
                "height_mem2":$scope.height_mem2,
                "weight_mem2":$scope.weight_mem2,
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
                "salut_mem3" : $scope.salut_mem3,
                "fname_mem3": $scope.fname_mem3,
                "lname_mem3": $scope.lname_mem3,
                "dob_mem3": $scope.dob_mem3,
                "gender_mem3":$scope.gender_mem3,
                "occupation_mem3":$scope.occupation_mem3,
                "height_mem3":$scope.height_mem3,
                "weight_mem3":$scope.weight_mem3,
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
                "salut_mem4" : $scope.salut_mem4,
                "fname_mem4": $scope.fname_mem4,
                "lname_mem4": $scope.lname_mem4,
                "dob_mem4": $scope.dob_mem4,
                "gender_mem4":$scope.gender_mem4,
                "occupation_mem4":$scope.occupation_mem4,
                "height_mem4":$scope.height_mem4,
                "weight_mem4":$scope.weight_mem4,
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
                "salut_mem5" : $scope.salut_mem5,
                "fname_mem5": $scope.fname_mem5,
                "lname_mem5": $scope.lname_mem5,
                "dob_mem5": $scope.dob_mem5,
                "gender_mem5":$scope.gender_mem5,
                "occupation_mem5":$scope.occupation_mem5,
                "height_mem5":$scope.height_mem5,
                "weight_mem5":$scope.weight_mem5,
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
                "ship_tax_nationality": ship_tax_nationality,
                "ship_tax_occupation": $scope.ship_tax_occupation,
                "ship_tax_income": $scope.ship_tax_income,
                "ship_tax_PPC_no": $scope.ship_tax_PPC_no,
                "edit_prim_ins_id" : $scope.edit_prim_ins_id,

            }

            var url = web_url + "LmsSuperShip/lmsProposalUpdateDetails/";
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
                "lms_premium":  $scope.lms_est_premium,
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
                "gainful": $scope.gainful,
                "lms_premium":  $scope.lms_est_premium,
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
                    document.getElementById('hide').className = "carhide";
                    
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
                var lms_car_comment = $scope.lms_car_comment;
            } else { 
                var pa_pro_medication = '0'; 
                var lms_car_comment = '';
            }


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
            }

            var url = web_url + "LmsPersonalAccident/lmsPaProposalUpdateDetails/";
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



    //$scope.tvl_pro_present_india = 'Yes';
    //$scope.tvl_pro_vaild_passport ='Yes';
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


});