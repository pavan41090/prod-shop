<?php
   	defined('BASEPATH') OR exit('No direct script access allowed');
	ob_start();
	require_once FILE_PATH."/application/third_party/PHPExcel.php";
	require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";

	class Twoexcelmodel extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function getSearchtwo(){
		$this->getCreateExcelData();
	}

	private function getSearchResult(){

		$dateInnput = $this->input->post();

        $thisstartdate = '';
        $thienddate = '';
        if(!empty($dateInnput['startDate'])){
            $startdate = str_replace('/', '-', $dateInnput['startDate'] );
            $OriginalStartdate = date('Y-m-d',strtotime($startdate));
            $thisstartdate = date("Y-m-d", strtotime($OriginalStartdate));
        }

        if(!empty($dateInnput['endDate'])){
            $enddate = str_replace('/', '-', $dateInnput['endDate'] );
            $OriginalEnddate = date('Y-m-d',strtotime($enddate));
            $thienddate = date("Y-m-d", strtotime($OriginalEnddate));
        }

		$twoSelectsql = '`tbl_lead.lead_id`, `tbl_lead.lead_application_id`, `tbl_lead.customer_id`, `tbl_lead.category`, `tbl_lead.line_of_business`, `tbl_lead.HDFC_branch_loc`, `tbl_lead.HDFC_ergo_loc`, `tbl_lead.priority`, `tbl_lead.target_date`, `tbl_lead.TSE_BDR_code`, `tbl_lead.TL_code`, `tbl_lead.SM_code`, `tbl_lead.bank_verifier_id`, `tbl_lead.aaa_number`, `tbl_lead.case_id`, `tbl_lead.payment_type`, `tbl_lead.sub_channel`, `tbl_lead.HDFC_card_relationship_no`, `tbl_lead.HDFC_card_last_4_digits`, `tbl_lead.lead_details`, `tbl_lead.lead_status`, `tbl_lead.lead_sub_status`, `tbl_lead.lead_re_status`, `tbl_lead.approve_status`, `tbl_lead.payment_status`, `tbl_lead.payment_details`, `tbl_lead.reject_comments`, `tbl_lead.reject_code`, DATE(tbl_lead.created_on) created_on, `tbl_lead.created_by`, `tbl_lead.updated_on`, `tbl_lead.updated_by`, `tbl_lead.channel`, `tbl_lead.vision_address`, `tbl_lead.plan`, `tbl_lead.lead_transaction_id`,`tbl_customer.cust_id`, `tbl_customer.cus_card_name`, `tbl_customer.cus_relation_ishued`, `tbl_customer.cus_title`, `tbl_customer.first_name`, `tbl_customer.last_name`, `tbl_customer.date_of_birth`, `tbl_customer.cust_age`, `tbl_customer.cust_gender`, `tbl_customer.marital_status`, `tbl_customer.cust_pan`, `tbl_customer.cust_street1`, `tbl_customer.cust_street2`, `tbl_customer.cust_street3`, `tbl_customer.cust_area`, `tbl_customer.cust_zip`, `tbl_customer.cust_state`, `tbl_customer.cust_city`, `tbl_customer.cust_landmark`, `tbl_customer.cust_email`, `tbl_customer.cust_phone`, `tbl_customer.cust_type`, `tbl_customer.occupation`, `tbl_customer.cust_house_number`, `tbl_customer.emergency_contact_num`, `tbl_customer.GSTIN`, `tbl_customer.cus_customer`, `tbl_customer.cus_language`, `tbl_customer.cus_emi`, `tbl_customer.cus_emi_yr`, `tbl_customer.processing_fee`, `tbl_customer.cus_cardlimt`, `tbl_customer.statement_date`, `tbl_customer.temp_LE`, `tbl_customer.business_type`,`tbl_propsal.propsal_id`, `tbl_propsal.customer_id`, `tbl_propsal.lead_id`, `tbl_propsal.existing_insure`, `tbl_propsal.existing_policy_num`, `tbl_propsal.existing_policy_expiry`, `tbl_propsal.new_policy_start`, `tbl_propsal.prop_mtr_reg_date`, `tbl_propsal.prop_mtr_regi_num`, `tbl_propsal.prop_mtr_engine_num`, `tbl_propsal.prop_mtr_chasis_num`, `tbl_propsal.prop_mtr_financed`, `tbl_propsal.prop_mtr_fin_ins_name`, `tbl_propsal.prop_mtr_fin_ins_city`, `tbl_propsal.prop_mtr_prev_stand_alone`, `tbl_propsal.prop_mtr_prev_prev_depre`, `tbl_propsal.prop_mtr_prev_prev_electric`, `tbl_propsal.prop_mtr_prev_prev_cng_lpg`, `tbl_propsal.sship_pro_height`, `tbl_propsal.sship_pro_Weight`, `tbl_propsal.ship_pre_insurer`, `tbl_propsal.ship_primary_insured`, `tbl_propsal.travel_pro_present_india`, `tbl_propsal.travel_pro_vaild_passport`, `tbl_propsal.travel_pro_national`, `tbl_propsal.travel_pro_passport_no`, `tbl_nominee.nominee_name`, `tbl_nominee.nominee_age`, `tbl_nominee.nominee_relationship`, `tbl_nominee.appointee_name`, `tbl_nominee.appointee_relationship`,`tbl_product.product_type`, `tbl_product.pre_insurance`, `tbl_product.reg_number`, `tbl_product.manufacture_year`, `tbl_product.manufacturer`, `tbl_product.vehicle_register_date`, `tbl_product.vehicle_tenure`, `tbl_product.model_varient`, `tbl_product.registration_city`, `tbl_product.policy_expire_date`, `tbl_product.IDV_value`, `tbl_product.show_room_value`, `tbl_product.expiring_policy_claim`, `tbl_product.expiring_policy_NCB`, `tbl_product.sum_insured`, `tbl_product.lms_premium`, `tbl_product.ship_spouse_include`, `ship_spouse_dob`, `ship_income`, `ship_policy_term`, `ship_no_of_children`, `home_plans`, `home_policy_start`, `home_policy_end`, `tbl_product.hme_building_type`, `tbl_product.hme_property_ownership`, `tbl_product.hme_property_type`, `tbl_product.hme_previous_claims`, `tbl_product.hme_no_of_floors`, `tbl_product.hme_year_of_construction`, `tbl_product.hme_independent_house`, `tbl_product.hme_compound_wall`, `tbl_product.hme_build_up`, `tbl_product.hme_sum_insured_provided`, `tbl_product.hme_risk_address_same`, `tbl_product.hme_risk_address1`, `tbl_product.hme_risk_address2`, `tbl_product.hme_risk_area`, `tbl_product.hme_risk_pincode`, `tbl_product.hme_risk_state`, `tbl_product.hme_risk_city`, `tbl_product.hme_risk_nearest_land_mark`, `tbl_product.gainful`, `tbl_product.travel_policy_type`, `tbl_product.travel_type_trip`, `tbl_product.travel_cover_type`, `tbl_product.travel_depart_date`, `tbl_product.travel_return_date`, `tbl_product.travel_trip_duration`, `tbl_product.traveltype`, `tbl_product.geographical`, `tbl_product.travel_max_trip`, `tbl_product.ss_critical`, `tbl_product.ss_sum_insured_critical`, `tbl_product.ss_hospital_daily`, `tbl_product.valid_license`, `tbl_product.declaration_valid_license`, `tbl_product.is_existing_pa_policy`, `tbl_product.standalone_pa_policy`, `tbl_product.pa_to_own_driver`';
		$this->db->select($twoSelectsql);
		$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_lead.customer_id','INNER');
		$this->db->join('tbl_propsal','tbl_propsal.lead_id = tbl_lead.lead_id','LEFT');
		$this->db->join('tbl_nominee','tbl_nominee.lead_id = tbl_lead.lead_id','LEFT');
		$this->db->join('tbl_product','tbl_product.lead_id = tbl_lead.lead_id','LEFT');
		if(isset($dateInnput['product']) && $dateInnput['product']!=""){
            $this->db->where('tbl_product.product_type',$dateInnput['product']);
        }
        if(!empty($thisstartdate) || !empty($thienddate) ){
			$this->db->where(" date(tbl_lead.created_on) BETWEEN '".$this->startdate."' AND '".$this->enddate."' ");
		}
		$this->db->where('tbl_lead.line_of_business','Two Wheeler');
		$thisTwoRe = $this->db->get('tbl_lead');
		return $thisTwoRe;
	}

	private function getCreateExcelData(){
		
        $fileTwoName = 'Two wheeler data - '.time().'.xlsx';  
        $twoobjPHPExcel = new PHPExcel();
        $twoobjPHPExcel->setActiveSheetIndex(0);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead No');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('C1', 'Lead Registered Date');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lead Registered Time');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('F1', 'Category');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('G1', 'Lead Status');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('H1', 'Salutation');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('I1', 'First Name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('J1', 'Last Name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('K1', 'Mobile Number');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('L1', 'Email');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gender');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('N1', 'Customer DOB');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('O1', 'Customer Age');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('P1', 'Marital Status');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('P1', 'Address1');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Address2');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('S1', 'Area');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('T1', 'House & Street No');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('U1', 'City');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('V1', 'State');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('W1', 'Zipcode');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('X1', 'Customer Type');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Alternate Mobile Number');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Pan Number');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Occupation');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AB1', 'EMI');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AC1', 'EMI Years');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sub Channel');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Case Id');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AF1', 'HDFCRelation_no/ReferenceNo');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AG1', 'HDFCCardNo/CustomerID');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AH1', 'TL Code/DSACode');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AI1', 'SM Code');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Bank Verifier');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Payment Type');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Lead Details');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Right time to contact the Customer');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Language');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Processing Fee Applicable');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Statement Date');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Temp LE');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Type of Business');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Target Date');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AT1', 'TES/BDR Code');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AU1', 'GSTIN');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AV1', 'AAN No');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Proposed Policy Start Date');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AX1', 'User Name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AY1', 'User Location');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Supervisor Name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BA1', 'Nominee Name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Nominee Age');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Nominee Relationship');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Appointee Name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Appointee Relationship of Nominee');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Registration No');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Manufacturing Year');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BH1', 'City of registration');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BI1', 'manufacturer');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'model');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BK1', 'registration date');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BL1', 'tenure');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BM1', 'PYP Available');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BN1', 'PYP Start date');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BO1', 'PYP End date');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BP1', 'PYP Insurance Co');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'PYP No.');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BR1', 'claim in expiring policy');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BS1', 'NCB');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BT1', 'IDV');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BU1', 'Total Premium');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BV1', 'Dep Cover');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BW1', 'TP Only PYP');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BX1', 'Dep Included in PYP');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BY1', 'Valid License');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'Is Existing PA Policy');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CA1', 'PA declaration');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CB1', 'engine no');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CC1', 'chassis no');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CD1', 'vehicle financed');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CE1', 'Financing institution name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CF1', 'Financing institution city');

        $twoDataResult = $this->getSearchResult();
        $nv=2;
       	foreach ($twoDataResult->result() as $akey => $avalue) {

       	$suername = $this->db->query("SELECT GROUP_CONCAT(user_name) supername FROM `tbl_users` WHERE FIND_IN_SET( emp_id,(SELECT history_user_id FROM tbl_user_activity_history WHERE history_lead_id = '".$avalue->lead_id."' && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1))")->row_object();

       	$twoobjPHPExcel->getActiveSheet()->SetCellValue('A'.$nv, $nv);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('B'.$nv, $avalue->lead_application_id);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('C'.$nv, $avalue->created_on);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('D'.$nv, $avalue->created_on);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('E'.$nv, $avalue->line_of_business);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('F'.$nv, $avalue->category);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('G'.$nv, $avalue->lead_status);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('H'.$nv, $avalue->cus_title);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('I'.$nv, $avalue->first_name);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('J'.$nv, $avalue->last_name);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('K'.$nv, $avalue->cust_phone);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('L'.$nv, $avalue->cust_email);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('M'.$nv, $avalue->cust_gender);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('N'.$nv, $avalue->date_of_birth);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('O'.$nv, $avalue->cust_age);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('P'.$nv, $avalue->marital_status);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('P'.$nv, $avalue->cust_street1);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('Q'.$nv, $avalue->cust_street2);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('S'.$nv, $avalue->cust_area);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('T'.$nv, $avalue->cust_house_number);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('U'.$nv, $avalue->cust_city);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('V'.$nv, $avalue->cust_state);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('W'.$nv, $avalue->cust_zip);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('X'.$nv, $avalue->cust_type);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('Y'.$nv, $avalue->emergency_contact_num);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('Z'.$nv, $avalue->cust_pan);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AA'.$nv, $avalue->occupation);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AB'.$nv, $avalue->cus_emi);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AC'.$nv, $avalue->cus_emi_yr);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AD'.$nv, $avalue->sub_channel);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AE'.$nv, $avalue->case_id);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AF'.$nv, $avalue->HDFC_card_relationship_no);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AG'.$nv, $avalue->HDFC_card_last_4_digits);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AH'.$nv, $avalue->TL_code);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AI'.$nv, $avalue->SM_code);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AJ'.$nv, $avalue->bank_verifier_id);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AK'.$nv, $avalue->payment_type);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AL'.$nv, $avalue->lead_details);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AM'.$nv, $avalue->cus_customer);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AN'.$nv, $avalue->cus_language);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AO'.$nv, $avalue->processing_fee);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AP'.$nv, $avalue->statement_date);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AQ'.$nv, $avalue->temp_LE);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AR'.$nv, $avalue->business_type);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AS'.$nv, $avalue->target_date);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AT'.$nv, $avalue->TSE_BDR_code);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AU'.$nv, $avalue->GSTIN);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AV'.$nv, $avalue->aaa_number);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AW'.$nv, $avalue->new_policy_start);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AX'.$nv, 'User Name');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AY'.$nv, 'User Location');
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('AZ'.$nv, $suername->supername);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BA'.$nv, $avalue->nominee_name);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BB'.$nv, $avalue->nominee_age);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BC'.$nv, $avalue->nominee_relationship);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BD'.$nv, $avalue->appointee_name);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BD'.$nv, $avalue->appointee_relationship);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BF'.$nv, $avalue->reg_number);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BG'.$nv, $avalue->manufacture_year);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BH'.$nv, $avalue->registration_city);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BI'.$nv, $avalue->manufacturer);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BJ'.$nv, $avalue->model_varient);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BK'.$nv, $avalue->vehicle_register_date);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BL'.$nv, $avalue->vehicle_tenure);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BM'.$nv, $avalue->hme_previous_claims);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BN'.$nv, $avalue->home_policy_start);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BO'.$nv, $avalue->home_policy_end);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BP'.$nv, $avalue->existing_insure);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BQ'.$nv, $avalue->existing_policy_num);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BR'.$nv, $avalue->expiring_policy_claim);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BS'.$nv, $avalue->expiring_policy_NCB);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BT'.$nv, $avalue->IDV_value);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BU'.$nv, $avalue->lms_premium);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BV'.$nv, $avalue->prop_mtr_prev_prev_depre);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BW'.$nv, $avalue->prop_mtr_prev_stand_alone);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BX'.$nv, $avalue->prop_mtr_prev_prev_depre);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BY'.$nv, $avalue->valid_license);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('BZ'.$nv, $avalue->is_existing_pa_policy);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CA'.$nv, $avalue->declaration_valid_license);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CB'.$nv, $avalue->prop_mtr_engine_num);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CC'.$nv, $avalue->prop_mtr_chasis_num);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CD'.$nv, $avalue->prop_mtr_financed);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CE'.$nv, $avalue->prop_mtr_fin_ins_name);
        $twoobjPHPExcel->getActiveSheet()->SetCellValue('CF'.$nv, $avalue->prop_mtr_fin_ins_city);
        $nv++;
       	}
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileTwoName.'"');
		header('Cache-Control: max-age=0');
        $oxbjWriter = PHPExcel_IOFactory::createWriter($twoobjPHPExcel, 'Excel2007');
        $oxbjWriter->save('php://output');
	}

}