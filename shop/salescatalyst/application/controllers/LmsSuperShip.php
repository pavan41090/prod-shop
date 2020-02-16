<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsSuperShip extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');

		
	}

	public function createLmsSship(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads';
			$this->data['sub_module'] = 'Super Ship'; 

			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['userDetails'] = $this->User_model->getLoginDetails();
           // $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['occupationlistArray'] = $this->Common_model->getoccupation();
            //$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
            $this->data['PriorityArray'] = $this->Common_model->getPriority();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['languageArray'] = $this->Common_model->language();
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();

            $this->data['sdateArray'] = $this->Common_model->sdate();
     		$this->data['businessArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();
            
			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_sship',$this->data);
			$this->load->view('layout/footer_inner');

	} else {
			redirect('user', 'refresh');
		}

	}	


	public function lmsProductDetails(){

		$productData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'product_type'		=>  $this->input->get_post('product_type'),
			'pre_insurance' 	=> '',
			'reg_number'		=> '',
			'manufacture_year' 	=> '',
			'manufacturer' 		=> '',
			'model_varient' 	=> '',
			'registration_city' => '',
			'policy_expire_date'=> '',
			'IDV_value' 		=> '',
			'show_room_value' 	=> '',
			'expiring_policy_claim'=> '',
			'expiring_policy_NCB'  => '',
			
			'ship_spouse_include'=> $this->input->get_post('spouse_ship'),
			'ship_spouse_dob'=> $this->input->get_post('ship_spouse_dob'),
			'ship_income'=> $this->input->get_post('sship_income'),
			'ship_policy_term'=> $this->input->get_post('policy_term'),
			'ship_no_of_children'=> $this->input->get_post('no_of_childrens'),
			'lms_premium' 		 => $this->input->get_post('lms_premium'),
			'sum_insured' => $this->input->get_post('ss_sum_insured'),
			'ss_hospital_daily' => $this->input->get_post('ss_hospital_daily'),
			'ss_critical' => $this->input->get_post('ss_critical'),
			'ss_sum_insured_critical' => $this->input->get_post('ss_sum_insured_critical'),
			'created_by'=> $this->session->userdata('emp_id'),
 		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		
$this->lmsProposalDetails();

	}

public function lmsCustomerDetails(){
		
		$cusData = array(
			'cus_card_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_card_name')),
			'cus_relation_ishued' 	=> $this->security->xss_clean($this->input->get_post('lms_car_relation_insure')),
			'cus_title' 	=> $this->input->get_post('lms_car_salut'),
			'first_name'	=> $this->input->get_post('lms_car_fname'),
			'last_name' 	=> $this->input->get_post('lms_car_lname'),
			'date_of_birth'	=> $this->input->get_post('lms_car_dob'),
			'cust_age'      => $this->input->get_post('lms_car_age'),
			'cust_gender' 	=> $this->input->get_post('lms_car_gender'),
			'cust_pan' 		=> $this->input->get_post('lms_car_pan'),
			'cust_street1' 	=> $this->input->get_post('lms_car_add1'),
			'cust_street2' 	=> $this->input->get_post('lms_car_add2'),
			'cust_street3' 	=> $this->input->get_post('lms_car_add3'),
			'cust_area' 	=> ($this->input->get_post('lms_car_area') ? $this->input->get_post('lms_car_area') : ''),
			'cust_zip' 		=> $this->input->get_post('lms_car_zip'),
			'cust_state' 	=> $this->input->get_post('lms_car_state'),
			'cust_city' 	=> $this->input->get_post('lms_car_city'),
			'cust_email' 	=> $this->input->get_post('lms_car_email'),
			'cust_phone' 	=> $this->input->get_post('lms_car_mobile'),
			'cust_type' 	=> $this->input->get_post('lms_car_cus_type'),
			'cust_landmark' => ($this->input->get_post('lms_car_pro_landmark') ? $this->input->get_post('lms_car_pro_landmark') : ''),
 			'marital_status'=> $this->input->get_post('lms_car_pro_marital'),
			'occupation'	=> $this->input->get_post('lms_car_pro_occupation'),
			'emergency_contact_num' => $this->input->get_post('lms_car_pro_emergency'),
			'GSTIN' => $this->input->get_post('lms_car_pro_gstn'),
			'cust_house_number' => $this->input->get_post('lms_house_number'),
			'cus_customer' 		=> $this->input->get_post('lms_cus_customer'),
			'cus_language' 		=> $this->input->get_post('lms_cus_language'),
			'cus_emi' 			=> $this->input->get_post('lms_cus_emi'),
			'cus_emi_yr' 		=> $this->input->get_post('lms_cus_emi_yr'),
			'processing_fee	'	=> $this->input->get_post('lms_cus_pfee'),
 			'cus_cardlimt'		=>$this->input->get_post('lms_cus_cardlimt'),
			'statement_date'	=>$this->input->get_post('lms_cus_sdate'),
			'temp_LE'           =>$this->input->get_post('lms_cus_tle'),
			'business_type'	    =>$this->input->get_post('lms_cus_tbusins'),
			'created_by'        => $this->session->userdata('emp_id'),
		);

		$customerId = $this->Lms_car_model->insertDataCommon($cusData,'tbl_customer');
		$applicationNumber = $this->Lms_car_model->generateApplicationNumber();
		$subChannel="";
		if($this->input->get_post('lms_car_campaign_name') != FALSE){
				$subChannel=$this->input->get_post('lms_car_campaign_name');
		}
		
		$timestamp = $this->input->get_post('comment_Date');
		//date('Y-m-d G:i:s'); 
		$leadData = array(
			'category'=> $this->input->get_post('lms_car_category'),
			'line_of_business'=> $this->input->get_post('lms_car_line_of_business'),
			'priority' => ($this->input->get_post('lms_car_sub_channel') ? $this->input->get_post('lms_car_sub_channel') : ''),
			'target_date' => $this->input->get_post('lms_car_target_date'),
			'TSE_BDR_code' => $this->input->get_post('lms_car_tse_bar_code'),
			'TL_code' => $this->input->get_post('lms_car_tl_code'),
			'SM_code' => $this->input->get_post('lms_car_sm_code'),
			'bank_verifier_id'=> $this->input->get_post('lms_car_bank_verify_id'),
			'case_id' => $this->input->get_post('lms_car_case_id'),
			'payment_type' => $this->input->get_post('lms_car_payment_type'),
			'sub_channel' =>$subChannel,
			'channel' => $this->input->get_post('lms_car_channel'),
			'HDFC_card_relationship_no' => $this->input->get_post('lms_car_hdfc_card_relno'),
			'HDFC_card_last_4_digits' => $this->input->get_post('lms_car_hdfc_card_4digt'),
			'lead_application_id'=> $applicationNumber,
			'customer_id'=>$customerId,
			'lead_details'=>$this->input->get_post('lms_car_deatil_lead'),
			'aaa_number'=>$this->input->get_post('lms_aaa_number'),
			'created_by'=> $this->session->userdata('emp_id'),
			'vision_address'=>$this->input->get_post('vision_address_name'),
			'lead_status'=>"9999",
			'created_on' => date("Y-m-d G:i:s")
		);
		$this->db->set($leadData)->insert('tbl_lead');
		$leadId = $this->db->insert_id();
		$leadData = array(
			'customerId' => $customerId,
			'leadId' 	=> $leadId,
			'leadNumber' => $applicationNumber,
		);
		$this->session->set_userdata($leadData);		
		//return $leadId;
		
		$this->lmsProductDetails();
	}



	public function lmsProposalDetails(){
		
		$policyStartDate = $this->input->get_post('sship_pro_policy_start');
		
		 $toDayDate = date('d-m-Y');
		 $strStart = strtotime(Date($policyStartDate));
		 $strEnd   = strtotime($toDayDate); 
		 
		///if($strStart >= $strEnd) {
		
		$proposalData = array(
			'customer_id'  	 		=>$this->session->userdata('customerId'),
			'lead_id' 	   	    	=>$this->session->userdata('leadId'),
			'existing_insure'		=> '',
			'existing_policy_num' 	=> '',
			'existing_policy_expiry'=> '',
			'new_policy_start' 		=> $policyStartDate,
			'prop_mtr_reg_date' 	=> '',
			'prop_mtr_regi_num' 	=> '',
			'prop_mtr_engine_num' 	=> '',
			'prop_mtr_chasis_num'	=> '',
			'prop_mtr_financed' 	=> '',
			'sship_pro_height' 		=> $this->input->get_post('sship_pro_height'),
			'sship_pro_Weight'		=> $this->input->get_post('sship_pro_Weight'),
			//'sship_pro_height_feet'=> $this->input->get_post('sship_pro_height_feet'),
			//'sship_pro_height_inches'=>$this->input->get_post('sship_pro_height_inches'),
			'ship_pre_insurer'		=> $this->input->get_post('pre_ins_portability'),
			'ship_primary_insured'	=> $this->input->get_post('ship_tax_primary_insured'),
			'created_by'			=> $this->session->userdata('emp_id'),

		);
		$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');
		


		$nomineeData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('sship_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('sship_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('sship_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('sship_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('sship_pro_appoint_relation'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);

		$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');


		#if($this->input->get_post('sship_pro_doc_name')!=""  $this->input->get_post('sship_pro_doc_qualifi')!="" || $this->input->get_post('sship_pro_doc_addr')!="" && $this->input->get_post('sship_pro_doc_mobile') !="" && $this->input->get_post('sship_pro_hos_num')!=""){

		$doctorData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'sship_pro_doc_name'	=> $this->input->get_post('sship_pro_doc_name'),
			'sship_pro_doc_qualifi' => $this->input->get_post('sship_pro_doc_qualifi'),
			'sship_pro_doc_addr'	=> $this->input->get_post('sship_pro_doc_addr'),
			'sship_pro_doc_mobile'  => $this->input->get_post('sship_pro_doc_mobile'),
			'sship_pro_hos_num' 	=> $this->input->get_post('sship_pro_hos_num'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);
		$doctorData = $this->Lms_car_model->insertDataCommon($doctorData,'tbl_family_doctor');

	#}
		// Options - proposal	
		$optionsData = array(
			'customer_id'  	=> $this->session->userdata('customerId'),
			'lead_id' 	   	=> $this->session->userdata('leadId'),
			'mem_type' 		=> 'Self',

			'mem_title'			=> $this->input->get_post('self_salut'),
			'mem_first_name'	=> $this->input->get_post('self_fname'),
			'mem_last_name'		=> $this->input->get_post('self_lname'),
			'mem_DOB'			=> $this->input->get_post('self_dob'),
			'mem_gender'		=> $this->input->get_post('self_gender'),
			'mem_ocupation'		=> $this->input->get_post('self_occupation'),
			'mem_height'		=> $this->input->get_post('sship_pro_height'),
			'mem_weight'		=> $this->input->get_post('sship_pro_Weight'),
			'mem_height_feet'   => $this->input->get_post('sship_pro_height_feet'),
			'mem_height_inches' => $this->input->get_post('sship_pro_height_inches'),
			'mem_relashionship'	=> 'Self',
			'delivery_date'		=> $this->input->get_post('delivery_date'),
			'smoke'				=> $this->input->get_post('smoke'),
			'alcohol'			=> $this->input->get_post('alcohol'),
			'pan_masala'		=> $this->input->get_post('pan_masala'),
			'others'			=> $this->input->get_post('others'),

			'option_1'		=> $this->input->get_post('sship_pro_suffered'),
			'option_2' 		=> $this->input->get_post('sship_pro_diseases'),
			'option_3'		=> $this->input->get_post('sship_pro_psychiatric'),
			'option_4'  	=> $this->input->get_post('sship_pro_medication'),
			'option_5' 		=> $this->input->get_post('sship_pro_fibroid'),
			'option_6'		=> $this->input->get_post('sship_pro_cyst'),
			'option_7'   	=> $this->input->get_post('sship_pro_bltest'),
			'option_8' 		=> $this->input->get_post('sship_pro_diabetes'),
			'option_9'		=> $this->input->get_post('sship_pro_pregnant'),
			'option_10'   	=> $this->input->get_post('sship_pro_advice'),
			'option_11' 	=> $this->input->get_post('sship_pro_Gutka'),
			'created_by'	=> $this->session->userdata('emp_id'),	
		);
		$optionId = $this->Lms_car_model->insertDataCommon($optionsData,'tbl_prop_options');

		for($i = 1; $i<4; $i++ ){
			if($this->input->get_post('surgery_name'.$i) != ''){
				$medicalHistoryData = array(
					'customer_id'  		=> $this->session->userdata('customerId'),
					'lead_id' 	   		=> $this->session->userdata('leadId'),
					'option_id'			=> $optionId,
					'diseases_name'		=> $this->input->get_post('surgery_name'.$i),
					'diagnosis_date'	=> $this->input->get_post('diagnosis_date'.$i),
					'last_consultation'	=> $this->input->get_post('date_consultation'.$i),
					'treatment_type'	=> $this->input->get_post('treatment_type'.$i),
					'hospital_name'		=> $this->input->get_post('hospital_name'.$i),
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($medicalHistoryData,'tbl_member_medical_history');
			}
		}//for loop ends here..		



		if($this->input->get_post('spouse_salut') != '' ){
			$optionsSpouseData = array(
				'customer_id'  	=>$this->session->userdata('customerId'),
				'lead_id' 	   	=>$this->session->userdata('leadId'),

				'mem_type'			=> 'Spouse',
				'mem_title'			=> $this->input->get_post('spouse_salut'),
				'mem_first_name'	=> $this->input->get_post('spouse_fname'),
				'mem_last_name'		=> $this->input->get_post('spouse_lname'),
				'mem_DOB'			=> $this->input->get_post('spouse_dob'),
				'mem_gender'		=> $this->input->get_post('spouse_gender'),
				'mem_ocupation'		=> $this->input->get_post('spouse_occupation'),
				'mem_height'		=> $this->input->get_post('spouse_height'),
				'mem_weight'		=> $this->input->get_post('spouse_weight'),
				'mem_height_feet'   => $this->input->get_post('spouse_height_feet'),
			    'mem_height_inches' => $this->input->get_post('spouse_height_inches'),
				'mem_relashionship'	=> 'Spouse',

				'delivery_date'		=> $this->input->get_post('spouse_delivery_date'),
				'smoke'				=> $this->input->get_post('spouse_smoke'),
				'alcohol'			=> $this->input->get_post('spouse_alcohol'),
				'pan_masala'		=> $this->input->get_post('spouse_pan_masala'),
				'others'			=> $this->input->get_post('spouse_others'),

				'option_1'		=> $this->input->get_post('spouse_suffered'),
				'option_2' 		=> $this->input->get_post('spouse_diseases'),
				'option_3'		=> $this->input->get_post('spouse_psychiatric'),
				'option_4'  	=> $this->input->get_post('spouse_medication'),
				'option_5' 		=> $this->input->get_post('spouse_fibroid'),
				'option_6'		=> $this->input->get_post('spouse_cyst'),
				'option_7'   	=> $this->input->get_post('spouse_bltest'),
				'option_8' 		=> $this->input->get_post('spouse_diabetes'),
				'option_9'		=> $this->input->get_post('spouse_pregnant'),
				'option_10'   	=> $this->input->get_post('spouse_advice'),
				'option_11' 	=> $this->input->get_post('spouse_gutka'),
				'created_by'	=> $this->session->userdata('emp_id'),	
			);
			$optionId = $this->Lms_car_model->insertDataCommon($optionsSpouseData,'tbl_prop_options');



			for($s = 1; $s<4; $s++ ){
				if($this->input->get_post('spouse_surgery_name'.$s) != ''){
					$medicalHistoryData = array(
						'customer_id'  		=> $this->session->userdata('customerId'),
						'lead_id' 	   		=> $this->session->userdata('leadId'),
						'option_id'			=> $optionId,
						'diseases_name'		=> $this->input->get_post('spouse_surgery_name'.$s),
						'diagnosis_date'	=> $this->input->get_post('spouse_diagnosis_date'.$s),
						'last_consultation'	=> $this->input->get_post('spouse_date_consultation'.$s),
						'treatment_type'	=> $this->input->get_post('spouse_treatment_type'.$s),
						'hospital_name'		=> $this->input->get_post('spouse_hospital_name'.$s),
						'created_by'		=> $this->session->userdata('emp_id'),	
					);
					$medicalHistoryId = $this->Lms_car_model->insertDataCommon($medicalHistoryData,'tbl_member_medical_history');
				}
			}//for loop ends here..		

		}// if($this->input->get_post('spouse_salut') !== '' ){ ends here.


		if($this->input->get_post('child1_salut') != '' ){	

			$optionsChild1Data = array(
				'customer_id'  	=>$this->session->userdata('customerId'),
				'lead_id' 	   	=>$this->session->userdata('leadId'),

				'mem_type'			=> 'Child 1',
				'mem_title'			=> $this->input->get_post('child1_salut'),
				'mem_first_name'	=> $this->input->get_post('child1_fname'),
				'mem_last_name'		=> $this->input->get_post('child1_lname'),
				'mem_DOB'			=> $this->input->get_post('child1_dob'),
				'mem_gender'		=> $this->input->get_post('child1_gender'),
				'mem_ocupation'		=> $this->input->get_post('child1_occupation'),
				'mem_height'		=> $this->input->get_post('child1_height'),
				'mem_weight'		=> $this->input->get_post('child1_weight'),
				'mem_height_feet'   => $this->input->get_post('child1_height_feet'),
			    'mem_height_inches' => $this->input->get_post('child1_height_inches'),
				'mem_relashionship'	=> 'Child 1',
	            
				'delivery_date'		=> $this->input->get_post('child1_delivery_date'),
				'smoke'				=> $this->input->get_post('child1_smoke'),
				'alcohol'			=> $this->input->get_post('child1_alcohol'),
				'pan_masala'		=> $this->input->get_post('child1_pan_masala'),
				'others'			=> $this->input->get_post('child1_others'),

				'option_1'		=> $this->input->get_post('child1_suffered'),
				'option_2' 		=> $this->input->get_post('child1_diseases'),
				'option_3'		=> $this->input->get_post('child1_psychiatric'),
				'option_4'  	=> $this->input->get_post('child1_medication'),
				'option_5' 		=> $this->input->get_post('child1_fibroid'),
				'option_6'		=> $this->input->get_post('child1_cyst'),
				'option_7'   	=> $this->input->get_post('child1_bltest'),
				'option_8' 		=> $this->input->get_post('child1_diabetes'),
				'option_9'		=> $this->input->get_post('child1_pregnant'),
				'option_10'   	=> $this->input->get_post('child1_advice'),
				'option_11' 	=> $this->input->get_post('child1_gutka'),
				'created_by'	=> $this->session->userdata('emp_id'),	
			);
			$optionId = $this->Lms_car_model->insertDataCommon($optionsChild1Data,'tbl_prop_options');


			for($ch1 = 1; $ch1<4; $ch1++ ){
				if($this->input->get_post('spouse_surgery_name'.$ch1) != ''){
					$medicalHistoryData = array(
						'customer_id'  		=> $this->session->userdata('customerId'),
						'lead_id' 	   		=> $this->session->userdata('leadId'),
						'option_id'			=> $optionId,
						'diseases_name'		=> $this->input->get_post('spouse_surgery_name'.$ch1),
						'diagnosis_date'	=> $this->input->get_post('spouse_diagnosis_date'.$ch1),
						'last_consultation'	=> $this->input->get_post('spouse_date_consultation'.$ch1),
						'treatment_type'	=> $this->input->get_post('spouse_treatment_type'.$ch1),
						'hospital_name'		=> $this->input->get_post('spouse_hospital_name'.$ch1),
						'created_by'		=> $this->session->userdata('emp_id'),	
					);
					$medicalHistoryId = $this->Lms_car_model->insertDataCommon($medicalHistoryData,'tbl_member_medical_history');
				}
			}//for loop ends here..	
		}// if($this->input->get_post('child1_salut') != '' ){ ends here.. 	

		
		if($this->input->get_post('child2_salut') != '' ){			
			$optionsChild2Data = array(
				'customer_id'  	=>$this->session->userdata('customerId'),
				'lead_id' 	   	=>$this->session->userdata('leadId'),

				'mem_type'			=> 'Child 2',
				'mem_title'			=> $this->input->get_post('child2_salut'),
				'mem_first_name'	=> $this->input->get_post('child2_fname'),
				'mem_last_name'		=> $this->input->get_post('child2_lname'),
				'mem_DOB'			=> $this->input->get_post('child2_dob'),
				'mem_gender'		=> $this->input->get_post('child2_gender'),
				'mem_ocupation'		=> $this->input->get_post('child2_occupation'),
				'mem_height'		=> $this->input->get_post('child2_height'),
				'mem_weight'		=> $this->input->get_post('child2_weight'),
				'mem_height_feet'   => $this->input->get_post('child2_height_feet'),
			    'mem_height_inches' => $this->input->get_post('child2_height_inches'),
				'mem_relashionship'	=> 'Child 2',
				
				'delivery_date'		=> $this->input->get_post('child2_delivery_date'),
				'smoke'				=> $this->input->get_post('child2_smoke'),
				'alcohol'			=> $this->input->get_post('child2_alcohol'),
				'pan_masala'		=> $this->input->get_post('child2_pan_masala'),
				'others'			=> $this->input->get_post('child2_others'),

				'option_1'		=> $this->input->get_post('child2_suffered'),
				'option_2' 		=> $this->input->get_post('child2_diseases'),
				'option_3'		=> $this->input->get_post('child2_psychiatric'),
				'option_4'  	=> $this->input->get_post('child2_medication'),
				'option_5' 		=> $this->input->get_post('child2_fibroid'),
				'option_6'		=> $this->input->get_post('child2_cyst'),
				'option_7'   	=> $this->input->get_post('child2_bltest'),
				'option_8' 		=> $this->input->get_post('child2_diabetes'),
				'option_9'		=> $this->input->get_post('child2_pregnant'),
				'option_10'   	=> $this->input->get_post('child2_advice'),
				'option_11' 	=> $this->input->get_post('child2_gutka'),
				'created_by'	=> $this->session->userdata('emp_id'),	
			);
			$optionId = $this->Lms_car_model->insertDataCommon($optionsChild2Data,'tbl_prop_options');

			for($ch2 = 1; $ch2<4; $ch2++ ){
				if($this->input->get_post('spouse_surgery_name'.$ch2) != ''){
					$medicalHistoryData = array(
						'customer_id'  		=> $this->session->userdata('customerId'),
						'lead_id' 	   		=> $this->session->userdata('leadId'),
						'option_id'			=> $optionId,
						'diseases_name'		=> $this->input->get_post('spouse_surgery_name'.$ch2),
						'diagnosis_date'	=> $this->input->get_post('spouse_diagnosis_date'.$ch2),
						'last_consultation'	=> $this->input->get_post('spouse_date_consultation'.$ch2),
						'treatment_type'	=> $this->input->get_post('spouse_treatment_type'.$ch2),
						'hospital_name'		=> $this->input->get_post('spouse_hospital_name'.$ch2),
						'created_by'		=> $this->session->userdata('emp_id'),	
					);
					$medicalHistoryId = $this->Lms_car_model->insertDataCommon($medicalHistoryData,'tbl_member_medical_history');
				}
			}//for loop ends here..	
		} // if($this->input->get_post('child2_salut') != '' ){	 ends here..	


		if($this->input->get_post('child3_salut') != '' ){		
			$optionsChild3Data = array(
				'customer_id'  	=>$this->session->userdata('customerId'),
				'lead_id' 	   	=>$this->session->userdata('leadId'),

				'mem_type'			=> 'Child 3',
				'mem_title'			=> $this->input->get_post('child3_salut'),
				'mem_first_name'	=> $this->input->get_post('child3_fname'),
				'mem_last_name'		=> $this->input->get_post('child3_lname'),
				'mem_DOB'			=> $this->input->get_post('child3_dob'),
				'mem_gender'		=> $this->input->get_post('child3_gender'),
				'mem_ocupation'		=> $this->input->get_post('child3_occupation'),
				'mem_height'		=> $this->input->get_post('child3_height'),
				'mem_weight'		=> $this->input->get_post('child3_weight'),
				'mem_height_feet'   => $this->input->get_post('child3_height_feet'),
			    'mem_height_inches' => $this->input->get_post('child3_height_inches'),
				'mem_relashionship'	=> 'Child 3',
				
				'delivery_date'		=> $this->input->get_post('child3_delivery_date'),
				'smoke'				=> $this->input->get_post('child3_smoke'),
				'alcohol'			=> $this->input->get_post('child3_alcohol'),
				'pan_masala'		=> $this->input->get_post('child3_pan_masala'),
				'others'			=> $this->input->get_post('child3_others'),

				'option_1'		=> $this->input->get_post('child3_suffered'),
				'option_2' 		=> $this->input->get_post('child3_diseases'),
				'option_3'		=> $this->input->get_post('child3_psychiatric'),
				'option_4'  	=> $this->input->get_post('child3_medication'),
				'option_5' 		=> $this->input->get_post('child3_fibroid'),
				'option_6'		=> $this->input->get_post('child3_cyst'),
				'option_7'   	=> $this->input->get_post('child3_bltest'),
				'option_8' 		=> $this->input->get_post('child3_diabetes'),
				'option_9'		=> $this->input->get_post('child3_pregnant'),
				'option_10'   	=> $this->input->get_post('child3_advice'),
				'option_11' 	=> $this->input->get_post('child3_gutka'),
				'created_by'	=> $this->session->userdata('emp_id'),	
			);
			$optionId = $this->Lms_car_model->insertDataCommon($optionsChild3Data,'tbl_prop_options');

			for($ch3 = 1; $ch3<4; $ch3++ ){
				if($this->input->get_post('spouse_surgery_name'.$ch3) != ''){
					$medicalHistoryData = array(
						'customer_id'  		=> $this->session->userdata('customerId'),
						'lead_id' 	   		=> $this->session->userdata('leadId'),
						'option_id'			=> $optionId,
						'diseases_name'		=> $this->input->get_post('spouse_surgery_name'.$ch3),
						'diagnosis_date'	=> $this->input->get_post('spouse_diagnosis_date'.$ch3),
						'last_consultation'	=> $this->input->get_post('spouse_date_consultation'.$ch3),
						'treatment_type'	=> $this->input->get_post('spouse_treatment_type'.$ch3),
						'hospital_name'		=> $this->input->get_post('spouse_hospital_name'.$ch3),
						'created_by'		=> $this->session->userdata('emp_id'),	
					);
					$medicalHistoryId = $this->Lms_car_model->insertDataCommon($medicalHistoryData,'tbl_member_medical_history');
				}
			}//for loop ends here..	
		} // if($this->input->get_post('child2_salut') != '' ){	 ends here..	

			//     "": $scope.port_insurer_name1,
           //      "": $scope.port_policy_number1,
           //      "": $scope.port_start_date1,
           //      "" : $scope.port_end_date1,
           //      "": $scope.port_sum_insured1,
           //      "" : $scope.port_claim_lodged1,
           //      "": $scope.port_cumulative_bonus1,

		for($x = 1; $x<3; $x++ ){
			if($this->input->get_post('port_insurer_name'.$x) != ''){
				$preInsuranceData = array(
					'customer_id'  		=> $this->session->userdata('customerId'),
					'lead_id' 	   		=> $this->session->userdata('leadId'),
					'pre_name'			=> $this->input->get_post('port_insurer_name'.$x),
					'prer_policy_number'=> $this->input->get_post('port_policy_number'.$x),
					'pre_from_date'		=> $this->input->get_post('port_start_date'.$x),
					'pre_to_date'		=> $this->input->get_post('port_end_date'.$x),
					'pre_sum_insured'	=> $this->input->get_post('port_sum_insured'.$x),
					'pre_claim_lodged'	=> $this->input->get_post('port_claim_lodged'.$x),
					'pre_cum_bonus'		=> $this->input->get_post('port_cumulative_bonus'.$x),
					'pre_status'		=> '1',
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($preInsuranceData,'tbl_pre_insurance');
			}
		}//for loop ends here..		

				  														//prim_status	creaded_on	created_by


			if( $this->input->get_post('ship_tax_your_name') != ''){
				$primaryInsuredData = array(
					'customer_id'  		=> $this->session->userdata('customerId'),
					'lead_id' 	   		=> $this->session->userdata('leadId'),
					'prim_title'		=> $this->input->get_post('ship_tax_salut'),
					'prim_name'			=> $this->input->get_post('ship_tax_your_name'),
					'prim_relation'		=> $this->input->get_post('ship_tax_primary_relation'),
					'prim_dob'			=> $this->input->get_post('ship_tax_dob'),
					'prim_gender'		=> $this->input->get_post('ship_tax_gender'),
					'prim_addr1'		=> $this->input->get_post('ship_tax_addr1'),
					'prim_addr2'		=> $this->input->get_post('ship_tax_addr2'),
					'prim_landmark'		=> $this->input->get_post('ship_tax_landmark'),
					'prim_fixed_line'	=> $this->input->get_post('ship_tax_fixed_line'),
					'prim_mobile'		=> $this->input->get_post('ship_tax_mobile_no'),
					'prim_email'		=> $this->input->get_post('ship_tax_email_id'),
					'prim_nationality'	=> $this->input->get_post('ship_tax_nationality'),
					'prim_occupation'	=> $this->input->get_post('ship_tax_occupation'),
					'prim_income'		=> $this->input->get_post('ship_tax_income'),
					'prim_PPC_No'		=> $this->input->get_post('ship_tax_PPC_no'),
					'prim_status'		=> '1',
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($primaryInsuredData,'tbl_primary_insured');
			}	


		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('leadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			//->set(array('created_by'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
			$this->db->set($commentData)->insert('tbl_comments');
			#$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}	
		$leadData = array(
			'lead_status'	=> 'Lead Generated',
			'updated_by'        => $this->session->userdata('emp_id'),
			'updated_on'        => date("Y-m-d G:i:s")
		);
		$lead_id = $this->session->userdata('leadId');
	    #$sship_id = $this->Lms_car_model->updateDataCommon($leadData,'tbl_lead','lead_id',$lead_id);
		//->set(array('updated_on'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
		$sship_id = $this->db->set($leadData)->where('lead_id',$lead_id)->update('tbl_lead');
	    if(isset($sship_id)){
			$dataReturn['status'] = true;
			$dataReturn['message'] = $this->session->userdata('leadNumber');
		} else{
			$dataReturn['status'] = false;
			$dataReturn['message'] = $this->session->userdata('leadNumber');
		}
		
		//} else {
		//	$dataReturn['status'] = false;
		//	$dataReturn['message'] = 'Please Select Policy Starts Date Future';
			
		//}
		
		echo json_encode($dataReturn);
  	}

public function lmsUpdateCustomerDetails(){



        $lmsEditLeadId	= $this->input->get_post('lms_edit_lead_id');   
        $lmsEditCustId	= $this->input->get_post('lms_edit_customer_id');
        $lmsEditApplicationId	= $this->input->get_post('lms_edit_application_id');
        $leadData = array(
			'lmsEditLeadId' => $lmsEditLeadId,
			'lmsEditCustId' => $lmsEditCustId,
			'lmsEditApplicationId'=>$lmsEditApplicationId,
		);


		$this->session->set_userdata($leadData);        
		/*$emiYears ="";
		if($this->input->get_post('lms_cus_emi') == "No"){
				$emiYears=$this->input->get_post('lms_cus_emi_yr') = '';
		}*/
		
		$cusUpdateData = array(
			'cus_card_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_card_name')),
			'cus_relation_ishued' 	=> $this->security->xss_clean($this->input->get_post('lms_car_relation_insure')),
			'cus_title' 	=> $this->security->xss_clean($this->input->get_post('lms_car_salut')),
			'first_name'	=> $this->security->xss_clean($this->input->get_post('lms_car_fname')),
			'last_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_lname')),
			'date_of_birth'	=> $this->security->xss_clean($this->input->get_post('lms_car_dob')),
			'cust_gender' 	=> $this->security->xss_clean($this->input->get_post('lms_car_gender')),
			'cust_age'      => $this->security->xss_clean($this->input->get_post('lms_car_age')),
			'cust_pan' 		=> $this->security->xss_clean($this->input->get_post('lms_car_pan')),
			'cust_street1' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add1')),
			'cust_street2' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add2')),
			'cust_street3' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add3')),
			'cust_area' 	=> $this->security->xss_clean($this->input->get_post('lms_car_area')),
			'cust_zip' 		=> $this->security->xss_clean($this->input->get_post('lms_car_zip')),
			'cust_state' 	=> $this->security->xss_clean($this->input->get_post('lms_car_state')),
			'cust_city' 	=> $this->security->xss_clean($this->input->get_post('lms_car_city')),
			'cust_email' 	=> $this->security->xss_clean($this->input->get_post('lms_car_email')),
			'cust_phone' 	=> $this->security->xss_clean($this->input->get_post('lms_car_mobile')),
			'cust_type' 	=> $this->security->xss_clean($this->input->get_post('lms_car_cus_type')),
			'cust_landmark' => $this->security->xss_clean($this->input->get_post('lms_car_pro_landmark')),
 			'marital_status'		 => $this->security->xss_clean($this->input->get_post('lms_car_pro_marital')),
			'occupation'			 => $this->security->xss_clean($this->input->get_post('lms_car_pro_occupation')),
			'cust_house_number'			 => $this->security->xss_clean($this->input->get_post('lms_house_number')),
			'emergency_contact_num'  => $this->security->xss_clean($this->input->get_post('lms_car_pro_emergency')),
			'GSTIN'					 => $this->security->xss_clean($this->input->get_post('lms_car_pro_gstn')),
			'cus_customer' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_customer')),
			'cus_language' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_language')),
			'cus_emi' 			=> $this->security->xss_clean($this->input->get_post('lms_cus_emi')),
			'cus_emi_yr' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_emi_yr')),
			'processing_fee	'	=> $this->security->xss_clean($this->input->get_post('lms_cus_pfee')),
 			'cus_cardlimt'		=> $this->security->xss_clean($this->input->get_post('lms_cus_cardlimt')),
			'statement_date'	=> $this->security->xss_clean($this->input->get_post('lms_cus_sdate')),
			'temp_LE'           => $this->security->xss_clean($this->input->get_post('lms_cus_tle')),
			'business_type'	    => $this->security->xss_clean($this->input->get_post('lms_cus_tbusins')),
			'cust_type'	    => $this->security->xss_clean($this->input->get_post('lms_cus_type'))
		);

		
		
    	$this->Lms_car_model->updateDataCommon($cusUpdateData,'tbl_customer','cust_id',$lmsEditCustId);

		$leadUpdateData = array(
			'category'=> $this->input->get_post('lms_car_category'),
			'line_of_business'=> $this->input->get_post('lms_car_line_of_business'),
			//'HDFC_branch_loc'=> $this->input->get_post('lms_car_hdfc_branch_location'),
			//'HDFC_ergo_loc' => $this->input->get_post('lms_car_hdfc_ergo_location'), 
			'priority' => $this->input->get_post('lms_car_sub_channel'),
			'target_date' => $this->input->get_post('lms_car_target_date'),
			'TSE_BDR_code' => $this->input->get_post('lms_car_tse_bar_code'),
			'TL_code' => $this->input->get_post('lms_car_tl_code'),
			'SM_code' => $this->input->get_post('lms_car_sm_code'),
			'bank_verifier_id'=> $this->input->get_post('lms_car_bank_verify_id'),
			'case_id' => $this->input->get_post('lms_car_case_id'),
			'payment_type' => $this->input->get_post('lms_car_payment_type'),
			'vision_address'=>$this->input->get_post('lms_car_vision_address'),
			'sub_channel' =>$this->input->get_post('lms_car_campaign_name'),
			'HDFC_card_relationship_no' => $this->input->get_post('lms_car_hdfc_card_relno'),
			'HDFC_card_last_4_digits' => $this->input->get_post('lms_car_hdfc_card_4digt'),
			'lead_details'=>$this->input->get_post('lms_car_deatil_lead'),
			'aaa_number'=>$this->input->get_post('lms_aaa_number'),
			'created_by'=> $this->session->userdata('emp_id'),
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'  => $this->session->userdata('emp_id'),	
			'updated_on' => date('Y-m-d G:i:s')
		);
		
		$leadId = $this->Lms_car_model->updateDataCommon($leadUpdateData,'tbl_lead','lead_id',$lmsEditLeadId);
		
		$this->lmsProductUpdateDetails();
	}
    



	public function lmsProductUpdateDetails(){

		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Lead Generated",
			'updated_by'        => $this->session->userdata('emp_id'),
			//'updated_on'        => date("Y-m-d G:i:s"),	
			
		);
		$lead_id = $this->session->userdata('lmsEditLeadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);

		$productUpdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>$this->session->userdata('leadId'),
			//'product_type'		=>  $this->input->get_post('product_type'),
			'pre_insurance' 	=> '',
			'reg_number'		=> '',
			'manufacture_year' 	=> '',
			'manufacturer' 		=> '',
			'model_varient' 	=> '',
			'registration_city' => '',
			'policy_expire_date'=> '',
			'IDV_value' 		=> '',
			'show_room_value' 	=> '',
			'expiring_policy_claim'=> '',
			'expiring_policy_NCB'  => '',
			
			'ship_spouse_include'=> $this->input->get_post('spouse_ship'),
			'ship_spouse_dob'=> $this->input->get_post('ship_spouse_dob'),
			'ship_income'=> $this->input->get_post('sship_income'),
			'ship_policy_term'=> $this->input->get_post('policy_term'),
			'ship_no_of_children'=> $this->input->get_post('no_of_childrens'),
			'lms_premium' 		 => $this->input->get_post('lms_premium'),
			'ss_hospital_daily' => $this->input->get_post('ss_hospital_daily'),
			'ss_critical' => $this->input->get_post('ss_critical'),
			'sum_insured' => $this->input->get_post('ss_sum_insured'),
			'ss_sum_insured_critical' => $this->input->get_post('ss_sum_insured_critical'),
			//'created_by'=> $this->session->userdata('emp_id'),
 		);

		$lmsEditProductId =  $this->input->get_post('lms_edit_product_id');
		$productId = $this->Lms_car_model->updateDataCommon($productUpdateData,'tbl_product','product_id',$lmsEditProductId);

		
         $this->lmsProposalUpdateDetails();

	}

	



	 public function lmsProposalUpdateDetails(){		
		
		$policyStartDate = $this->input->get_post('sship_pro_policy_start');
		
		 $toDayDate = date('d-m-Y');
		 $strStart = strtotime(Date($policyStartDate));
		 $strEnd   = strtotime($toDayDate); 
		 
		//if($strStart >= $strEnd){
			
			$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Lead Generated",
			'updated_by' => $this->session->userdata('emp_id'),
			'updated_on' => date("Y-m-d G:i:s")
		);
		
		$lead_id = $this->session->userdata('lmsEditLeadId');

		$thisDetetials = $this->Lms_car_model->getLeadProductTypeByLeadID($lead_id);
		// $application_id=$this->session->userdata('lmsEditApplicationId');
	    // $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);
		//->set(array('updated_on' => "DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
		$this->db->set($statusData)->where('lead_id',$lead_id)->update('tbl_lead');

		$proposalUpdateData = array(
			//'customer_id'  	 		=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    	=>$this->session->userdata('leadId'),
			'existing_insure'		=> '',
			'existing_policy_num' 	=> '',
			'existing_policy_expiry'=> '',
			'new_policy_start' 		=> $this->input->get_post('sship_pro_policy_start'),
			'prop_mtr_reg_date' 	=> '',
			'prop_mtr_regi_num' 	=> '',
			'prop_mtr_engine_num' 	=> '',
			'prop_mtr_chasis_num'	=> '',
			'prop_mtr_financed' 	=> '',
			'sship_pro_height' 		=> $this->input->get_post('sship_pro_height'),
			'sship_pro_Weight'		=> $this->input->get_post('sship_pro_Weight'),
			'ship_pre_insurer'		=> $this->input->get_post('pre_ins_portability'),
			'ship_primary_insured'	=> $this->input->get_post('ship_tax_primary_insured'),
			'created_by'			=> $this->session->userdata('emp_id'),
						
			
			
		);
		$lmsEditProposalId =  $this->input->get_post('lms_edit_proposal_id');
		$this->Lms_car_model->updateDataCommon($proposalUpdateData,'tbl_propsal','propsal_id',$lmsEditProposalId);

		$nomineUpdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('sship_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('sship_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('sship_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('sship_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('sship_pro_appoint_relation'),
			//'created_by'			=> $this->session->userdata('emp_id'),
		);

		//$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');
		$lmsEditNomineeId =  $this->input->get_post('lms_edit_nominee_id');
		
		$this->Lms_car_model->updateDataCommon($nomineUpdateData,'tbl_nominee','nominee_id',$lmsEditNomineeId);


		$doctorUpdateData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'sship_pro_doc_name'	=> $this->input->get_post('sship_pro_doc_name'),
			'sship_pro_doc_qualifi' => $this->input->get_post('sship_pro_doc_qualifi'),
			'sship_pro_doc_addr'	=> $this->input->get_post('sship_pro_doc_addr'),
			'sship_pro_doc_mobile'  => $this->input->get_post('sship_pro_doc_mobile'),
			'sship_pro_hos_num' 	=> $this->input->get_post('sship_pro_hos_num'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);
		//$doctorData = $this->Lms_car_model->insertDataCommon($doctorData,'tbl_family_doctor');
		
		$lmsEditDoctorId =  $this->input->get_post('lms_edit_family_doctor_id');
		 $this->Lms_car_model->updateDataCommon($doctorUpdateData,'tbl_family_doctor','family_doctor_id',$lmsEditDoctorId);

               

		for($i = 1; $i<6; $i++) {

			if($this->input->get_post('salut_mem'.$i) != '') {
				$optionsUpdateData = array(
					'mem_title'		=> 	$this->input->get_post('salut_mem'.$i),	
					'mem_first_name'=> 	$this->input->get_post('fname_mem'.$i),	
					'mem_last_name'	=> 	$this->input->get_post('lname_mem'.$i),
					'mem_DOB'		=> 	$this->input->get_post('dob_mem'.$i),
					'mem_height'	=> $this->input->get_post('height_mem'.$i),
					'mem_weight'	=> $this->input->get_post('weight_mem'.$i),
					'mem_height_feet'=> $this->input->get_post('height_feet_mem'.$i),
					'mem_height_inches'=> $this->input->get_post('height_inches_mem'.$i),
					'mem_gender'	=>	$this->input->get_post('gender_mem'.$i),
					'mem_ocupation'	=> $this->input->get_post('occupation_mem'.$i),
					'mem_age'		=> '',
					'delivery_date'	=> $this->input->get_post('delivery_date_mem'.$i), 
					'smoke'			=> $this->input->get_post('smoke_mem'.$i),
					'alcohol'		=> $this->input->get_post('alcohol_mem'.$i),
					'pan_masala'	=> $this->input->get_post('pan_masala_mem'.$i),	
					'others'		=> $this->input->get_post('others_mem'.$i),
					'option_1'		=> $this->input->get_post('ship_suffered_mem'.$i),
					'option_2' 		=> $this->input->get_post('ship_diseases_mem'.$i),
					'option_3'		=> $this->input->get_post('ship_psychiatric_mem'.$i),
					'option_4'  	=> $this->input->get_post('ship_medication_mem'.$i),
					'option_5' 		=> $this->input->get_post('ship_fibroid_mem'.$i),
					'option_6'		=> $this->input->get_post('ship_cyst_mem'.$i),
					'option_7'   	=> $this->input->get_post('ship_bltest_mem'.$i),
					'option_8' 		=> $this->input->get_post('ship_diabetes_mem'.$i),
					'option_9'		=> $this->input->get_post('ship_pregnant_mem'.$i),
					'option_10'   	=> $this->input->get_post('ship_treatment_mem'.$i),
					'option_11' 	=> $this->input->get_post('ship_gutka_mem'.$i),
				);
				$lmsEditOptionId =  $this->input->get_post('edit_option_id'.$i);
				// if($i==2){
				// 	var_dump($optionsUpdateData);
				// 	die();
				// }
				
				$proposal_id =$this->Lms_car_model->updateDataCommon($optionsUpdateData,'tbl_prop_options','option_id',$lmsEditOptionId);
			}


        	for($x = 1; $x<2; $x++){
				$portPreInsuranceId =  $this->input->get_post('port_pre_insurance_id'.$x);
				if($portPreInsuranceId !== ''){
					$portPreInsArray = array(
						'pre_name' 			=> $this->input->get_post('port_insurer_name'.$x),	
						'prer_policy_number' => $this->input->get_post('port_policy_number'.$x),	
						'pre_from_date' 	=> $this->input->get_post('port_start_date'.$x),	
						'pre_to_date' 		=> $this->input->get_post('port_end_date'.$x),	
						'pre_sum_insured' 	=> $this->input->get_post('port_sum_insured'.$x),	
						'pre_claim_lodged' 	=> $this->input->get_post('port_claim_lodged'.$x),	
						'pre_cum_bonus' 	=> $this->input->get_post('port_cumulative_bonus'.$x),	
					);
					$this->Lms_car_model->updateDataCommon($portPreInsArray,'tbl_pre_insurance','pre_ins_id',$portPreInsuranceId);
				} else {
					$portPreInsNewArray = array(
						'lead_id'   		=> $this->session->userdata('lmsEditLeadId'),
						'customer_id' 		=> $this->session->userdata('lmsEditCustId'),	
						'pre_name' 			=> $this->input->get_post('port_insurer_name'.$x),	
						'prer_policy_number' => $this->input->get_post('port_policy_number'.$x),	
						'pre_from_date' 	=> $this->input->get_post('port_start_date'.$x),	
						'pre_to_date' 		=> $this->input->get_post('port_end_date'.$x),	
						'pre_sum_insured' 	=> $this->input->get_post('port_sum_insured'.$x),	
						'pre_claim_lodged' 	=> $this->input->get_post('port_claim_lodged'.$x),	
						'pre_cum_bonus' 	=> $this->input->get_post('port_cumulative_bonus'.$x),	
					);
					//$this->Lms_car_model->updateDataCommon($portPreInsArray,'tbl_pre_insurance','pre_ins_id',$portPreInsuranceId);
					$this->Lms_car_model->insertDataCommon($portPreInsNewArray,'tbl_pre_insurance');

				}	
			}

		}

			$editPrimInsId =  $this->input->get_post('edit_prim_ins_id');
			if($editPrimInsId !== ''){

			//if( $this->input->get_post('edit_prim_ins_id') != ''){

				$primaryInsuredUpdateData = array(
					'prim_title'		=> $this->input->get_post('ship_tax_salut'),
					'prim_name'			=> $this->input->get_post('ship_tax_your_name'),
					'prim_relation'		=> $this->input->get_post('ship_tax_primary_relation'),
					'prim_dob'			=> $this->input->get_post('ship_tax_dob'),
					'prim_gender'		=> $this->input->get_post('ship_tax_gender'),
					'prim_addr1'		=> $this->input->get_post('ship_tax_addr1'),
					'prim_addr2'		=> $this->input->get_post('ship_tax_addr2'),
					'prim_landmark'		=> $this->input->get_post('ship_tax_landmark'),
					'prim_fixed_line'	=> $this->input->get_post('ship_tax_fixed_line'),
					'prim_mobile'		=> $this->input->get_post('ship_tax_mobile_no'),
					'prim_email'		=> $this->input->get_post('ship_tax_email_id'),
					'prim_nationality'	=> $this->input->get_post('ship_tax_nationality'),
					'prim_occupation'	=> $this->input->get_post('ship_tax_occupation'),
					'prim_income'		=> $this->input->get_post('ship_tax_income'),
					'prim_PPC_No'		=> $this->input->get_post('ship_tax_PPC_no'),
				);

				$this->Lms_car_model->updateDataCommon($primaryInsuredUpdateData,'tbl_primary_insured','prim_ins_id',$editPrimInsId);
				
			} else {

				$primaryInsuredNewData = array(
					'customer_id'  		=> $this->session->userdata('customerId'),
					'lead_id' 	   		=> $this->session->userdata('leadId'),
					'prim_title'		=> $this->input->get_post('ship_tax_salut'),
					'prim_name'			=> $this->input->get_post('ship_tax_your_name'),
					'prim_relation'		=> $this->input->get_post('ship_tax_primary_relation'),
					'prim_dob'			=> $this->input->get_post('ship_tax_dob'),
					'prim_gender'		=> $this->input->get_post('ship_tax_gender'),
					'prim_addr1'		=> $this->input->get_post('ship_tax_addr1'),
					'prim_addr2'		=> $this->input->get_post('ship_tax_addr2'),
					'prim_landmark'		=> $this->input->get_post('ship_tax_landmark'),
					'prim_fixed_line'	=> $this->input->get_post('ship_tax_fixed_line'),
					'prim_mobile'		=> $this->input->get_post('ship_tax_mobile_no'),
					'prim_email'		=> $this->input->get_post('ship_tax_email_id'),
					'prim_nationality'	=> $this->input->get_post('ship_tax_nationality'),
					'prim_occupation'	=> $this->input->get_post('ship_tax_occupation'),
					'prim_income'		=> $this->input->get_post('ship_tax_income'),
					'prim_PPC_No'		=> $this->input->get_post('ship_tax_PPC_no'),
					'prim_status'		=> '1',
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$this->Lms_car_model->insertDataCommon($primaryInsuredNewData,'tbl_primary_insured');
			}	



		


			for($x = 1; $x<4; $x++){
				$lmsEditMedicalId =  $this->input->get_post('medical_update_id'.$x.'_mem'.$i);
				if($lmsEditMedicalId !== ''){
					//echo $lmsEditMedicalId.'am in -- '.$this->input->get_post('surgery_name'.$x.'_mem'.$i); 
					$medicalArray = array(
						'diseases_name' 	=> $this->input->get_post('surgery_name'.$x.'_mem'.$i),	
						'diagnosis_date' 	=> $this->input->get_post('diagnosis_date'.$x.'_mem'.$i),	
						'last_consultation' => $this->input->get_post('date_consultation'.$x.'_mem'.$i),	
						'treatment_type' 	=> $this->input->get_post('treatment_type'.$x.'_mem'.$i),	
						'hospital_name' 	=> $this->input->get_post('hospital_name'.$x.'_mem'.$i),	
					);
					$lmsEditMedicalId =  $this->input->get_post('medical_update_id'.$x.'_mem'.$i);
					$this->Lms_car_model->updateDataCommon($medicalArray,'tbl_member_medical_history','history_id',$lmsEditMedicalId);
				} else {
					$medicalNewArray = array(
						//'history_id'	=>
						'lead_id'   		=> $this->session->userdata('lmsEditLeadId'),
						'customer_id' 		=> $this->session->userdata('lmsEditCustId'),
						'option_id'			=> $this->input->get_post('edit_option_id'.$i),
						'diseases_name' 	=> $this->input->get_post('surgery_name'.$x.'_mem'.$i),	
						'diagnosis_date' 	=> $this->input->get_post('diagnosis_date'.$x.'_mem'.$i),	
						'last_consultation' => $this->input->get_post('date_consultation'.$x.'_mem'.$i),	
						'treatment_type' 	=> $this->input->get_post('treatment_type'.$x.'_mem'.$i),	
						'hospital_name' 	=> $this->input->get_post('hospital_name'.$x.'_mem'.$i),	
					);

					$optionId = $this->Lms_car_model->insertDataCommon($medicalNewArray,'tbl_member_medical_history');

				}	

			}




		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('lmsEditLeadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			//'created_by' => $this->input->get_post('comment_Date')//date("Y-m-d G:i:s"),
			//->set(array('created_by' => "DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')" ),'',FALSE)
			$this->db->set($commentData)->insert('tbl_comments');
			#$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}
		
		if(isset($proposal_id)){
			$dataReturn['status'] = true;
			$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
		} else{
			$dataReturn['status'] = false;
			$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
			//echo "false";
		}
		
		//} else {
		///	$dataReturn['status'] = false;
		///	$dataReturn['message'] = 'Please Select Policy Starts Date Future';
			
		//}
		
		echo json_encode($dataReturn);
  	}


}?>		
