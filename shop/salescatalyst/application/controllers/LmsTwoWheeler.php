<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsTwoWheeler extends CI_Controller {

	public $makeLeadId;
	public $makeuserId;
	public $leadApplicationnumber;
	public $makeeditApplicationId;
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');
		$this->makeLeadId;
		$this->makeuserId;
		$this->leadApplicationnumber;
		$this->makeeditApplicationId;
		$this->quoteSeriveBool = false;
		$this->vehicleOrdernumber;
		$this->vehicleQuotationNumner;
		$this->thisaddonStatus;
		$this->thissubmitCheck;
		error_reporting(0);
	}


	public function getCreatetwowheelData(){
		try{
			
	 		if($_SERVER['REQUEST_METHOD'] != "POST"){
	 			redirect('user','refresh');
	 			die();
	 		}

	 		$inputPostData = $this->input->post();
	 		
	 		$this->makeeditApplicationId = $inputPostData['productlead_id'];
	 		$this->thissubmitCheck = $inputPostData['booleanName'];
	 		$keytwoAddonCheck = array_key_exists("twoAddon",$inputPostData);
	 		if($keytwoAddonCheck){
	 			$this->thisaddonStatus = true;
	 		} else {
	 			$this->thisaddonStatus = false;
	 		}

	 		if(empty($this->makeeditApplicationId)){

	 			if($this->thissubmitCheck == 'false'){
	 				//['TotalPremium']
	 				$this->quoteSeriveBool = true;
					$quoteInforation = $this->getQuoteorderinfo();
					$xquoteInforation['addon'] = true;
					$xquoteInforation['OrderNo'] = $quoteInforation['OrderNo'];
					$xquoteInforation['QuoteNo'] = $quoteInforation['QuoteNo'];
					$xquoteInforation['PremiumDetails'] = $quoteInforation['PremiumDetails'];
					$xquoteInforation['info'] = 'QuoteNo';
					$xquoteInforation['StatusCode'] = $quoteInforation['StatusCode'];
					$xquoteInforation['Cover'] = json_encode($quoteInforation['Cover']);
					$this->session->set_userdata('quoteInforation',$quoteInforation,true);
					echo json_encode($xquoteInforation);

	 			}

			}

			if($this->thissubmitCheck == 'false'){
				exit();
			}

	 		$keyageCheck = array_key_exists("lms_car_age",$inputPostData);
	 		if($keyageCheck){
	 			$ageCus = $this->security->xss_clean($inputPostData['lms_car_age']);
	 		} else {
	 			$ageCus = '';
	 		}

	 		$gstnkeycheck = array_key_exists("lms_car_pro_gstn",$inputPostData);
	 		$gstnValue = '';
	 		if($gstnkeycheck){
	 			$gstnValue = $this->security->xss_clean($inputPostData['lms_car_pro_gstn']);
	 		}

	 		$checkhouseNumber = array_key_exists("lms_house_number",$inputPostData);
	 		$housenumberValue = '';
	 		if($checkhouseNumber){
	 			$housenumberValue = $this->security->xss_clean($inputPostData['lms_house_number']);
	 		}

	 		$checkEmiCus = array_key_exists("lms_cus_emi",$inputPostData);
	 		$lms_cus_emi='';

	 		if($checkEmiCus){
	 			$lms_cus_emi = $this->security->xss_clean($inputPostData['lms_cus_emi']);
	 		}

	 		$checklms_cus_emi_yr = array_key_exists("lms_cus_emi_yr",$inputPostData);
	 		$lms_cus_emi_yr = '';
	 		if($checklms_cus_emi_yr){
	 			$lms_cus_emi_yr = $this->security->xss_clean($inputPostData['lms_cus_emi_yr']);
	 		}

	 		$checklms_cus_cardlimt = array_key_exists("lms_cus_cardlimt",$inputPostData);
	 		$lms_cus_cardlimt = '';
	 		if($checklms_cus_cardlimt){
	 			$lms_cus_cardlimt = $this->security->xss_clean($inputPostData['lms_cus_cardlimt']);
	 		}

	 		$customerData = array(
	 		'cus_card_name' 	=> $this->security->xss_clean($inputPostData['lms_car_card_holder_name']),
			'cus_relation_ishued' 	=> $this->security->xss_clean($inputPostData['lms_car_relation_insured']),
			'cus_title' 	=> $this->security->xss_clean($inputPostData['lms_car_salut']),
			'first_name'	=> $this->security->xss_clean($inputPostData['lms_car_fname']),
			'last_name' 	=> $this->security->xss_clean($inputPostData['lms_car_lname']),
			'date_of_birth'	=> $this->security->xss_clean($inputPostData['lms_car_dob']),
			'cust_age'      => $ageCus,
			'cust_gender' 	=> $this->security->xss_clean($inputPostData['lms_car_gender']),
			'cust_pan' 		=> $this->security->xss_clean($inputPostData['lms_car_pan']),
			'cust_street1' 	=> $this->security->xss_clean($inputPostData['lms_car_add1']),
			'cust_street2' 	=> $this->security->xss_clean($inputPostData['lms_car_add2']),
			'cust_street3' 	=> $this->security->xss_clean($inputPostData['lms_car_add3']),
			'cust_area' 	=> $this->security->xss_clean($inputPostData['lms_car_area']),
			'cust_zip' 		=> $this->security->xss_clean($inputPostData['lms_car_zip']),
			'cust_state' 	=> $this->security->xss_clean($inputPostData['lms_car_state']),
			'cust_city' 	=> $this->security->xss_clean($inputPostData['lms_car_city']),
			'cust_email' 	=> $this->security->xss_clean($inputPostData['lms_car_email']),
			'cust_phone' 	=> $this->security->xss_clean($inputPostData['lms_car_mobile']),
			'cust_type' 	=> $this->security->xss_clean($inputPostData['lms_car_cus_type']),
			'cust_landmark' => $this->security->xss_clean($inputPostData['lms_car_pro_landmark']),
 			'marital_status'=> $this->security->xss_clean($inputPostData['lms_car_pro_marital']),
			'occupation'	=> $this->security->xss_clean($inputPostData['lms_car_pro_occupation']),
			'emergency_contact_num' => $this->security->xss_clean($inputPostData['lms_car_pro_emergency']),
			'GSTIN' 		=> $gstnValue,
			'cust_house_number' => $housenumberValue,
			'cus_customer' 		=> $this->security->xss_clean($inputPostData['lms_cus_customer']),
			'cus_language' 		=> $this->security->xss_clean($inputPostData['lms_cus_language']),
			'cus_emi' 			=> $lms_cus_emi,
			'cus_emi_yr' 		=> $lms_cus_emi_yr,
			'processing_fee	'	=> $this->security->xss_clean($inputPostData['lms_cus_pfee']),
 			'cus_cardlimt'		=> $lms_cus_cardlimt,
			'statement_date'	=> $this->security->xss_clean($inputPostData['lms_cus_sdate']),
			'temp_LE'           => $this->security->xss_clean($inputPostData['lms_cus_tle']) || 0,
			'business_type'	    => $this->security->xss_clean($inputPostData['lms_cus_tbusins']),
			'created_by'        => $this->session->userdata('emp_id'),
			);

			if(empty($this->makeeditApplicationId)){

						$this->db->set($customerData)->insert( 'tbl_customer' );
						$customerInsertId = $this->db->insert_Id();
						$applicationNumber = $this->Lms_car_model->generateApplicationNumber();
						$this->leadApplicationnumber = $applicationNumber;

			} else {

				$thisCusData = $this->db->select('customer_id,lead_application_id')->where('lead_id',$this->makeeditApplicationId)->get('tbl_lead');
				$thisQuery = $this->db->last_query();
				$thisCusDataRes = $thisCusData->row_object();
				$customerInsertId = $thisCusDataRes->customer_id;
				$this->leadApplicationnumber = $thisCusDataRes->lead_application_id;
				$this->db->set($customerData)->where('cust_id',$customerInsertId)->update( 'tbl_customer' );

			}
			$this->makeuserId = $customerInsertId;
			
			$subChannel = "";

			if($this->input->get_post('lms_car_campaign_name') != FALSE){

					$subChannel = $this->security->xss_clean($inputPostData['lms_car_campaign_name']);
			}

			$checklms_car_channel = array_key_exists("lms_car_channel",$inputPostData);
			$lms_car_channel = '';
			if($checklms_car_channel){
				$lms_car_channel = $this->security->xss_clean($inputPostData['lms_car_channel']);
			}

			$checkvision_address_name = array_key_exists("vision_address_name",$inputPostData);
			$vision_address_name = '';
			if($checkvision_address_name){
				$vision_address_name = $this->security->xss_clean($inputPostData['vision_address_name']);
			}

			$subChanelCheck = array_key_exists('lms_car_sub_channel', $inputPostData);
			$lms_car_sub_channel = '';
			if($subChanelCheck){
				$lms_car_sub_channel = $this->security->xss_clean($inputPostData['lms_car_sub_channel']);
			}

			$leadDataInsert = array(
				'category'=> $this->security->xss_clean($inputPostData['lms_car_category']),
				'line_of_business'=> $this->security->xss_clean($inputPostData['lms_car_line_of_business']),
				'priority' => $lms_car_sub_channel,
				'target_date' => $this->security->xss_clean($inputPostData['lms_car_target_date']),
				'TSE_BDR_code' => $this->security->xss_clean($inputPostData['lms_car_tse_bar_code']),
				'TL_code' => $this->security->xss_clean($inputPostData['lms_car_tl_code']),
				'SM_code' => $this->security->xss_clean($inputPostData['lms_car_sm_code']),
				'bank_verifier_id'=> $this->security->xss_clean($inputPostData['lms_car_bank_verify_id']),
				'case_id' => $this->security->xss_clean($inputPostData['lms_car_case_id']),
				'payment_type' => $this->security->xss_clean($inputPostData['lms_car_payment_type']),
				'sub_channel' =>$subChannel,
				'channel' => $lms_car_channel,
				'HDFC_card_relationship_no' => $this->security->xss_clean($inputPostData['lms_car_hdfc_card_relno']),
				'HDFC_card_last_4_digits' => $this->security->xss_clean($inputPostData['lms_car_hdfc_card_4digt']),
				'lead_application_id'=> $this->leadApplicationnumber,
				'customer_id'=>$customerInsertId,
				'lead_details' => $this->security->xss_clean($inputPostData['lms_car_deatil_lead']),
				'aaa_number' => $this->security->xss_clean($inputPostData['lms_aaa_number']),
				'priority' => $this->security->xss_clean($inputPostData['lms_car_priority']),
				'created_by' => $this->session->userdata('emp_id'),
				'vision_address' => $vision_address_name,
				'lead_status'=>"9999",
				'created_on' => date("Y-m-d G:i:s"),
				'lead_status' => 'Lead Generated'

			);
			if(empty($this->makeeditApplicationId)){
			$this->db->set( $leadDataInsert )->insert( 'tbl_lead' );
			$insertleadId = $this->db->insert_Id();

			if($insertleadId){
				$this->db->set(array(
					'lead_id' => $insertleadId,
					'quote_data' => json_encode($this->session->userdata('quoteResDisplay'))
				)
				)->insert('tbl_quote_reg_table');
			}
			$this->makeLeadId = $insertleadId;
			} else {
				$this->db->set( $leadDataInsert )->where('lead_id',$this->makeeditApplicationId)->update( 'tbl_lead' );
				$this->makeLeadId = $this->makeeditApplicationId;				
			}
			$this->getInsertProductData();
	 		return;
	 	
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getInsertProductData(){
		
		try{

			$premiumAmont = ( $this->security->xss_clean($this->input->get_post('lms_car_final_pre_amount')) ? $this->security->xss_clean($this->input->get_post('lms_car_final_pre_amount')) : $this->security->xss_clean($this->input->get_post('lms_est_premium')) );

			$productData['travel_cover_type'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_cover_type'));
			$productData['pre_insurance'] = $this->security->xss_clean($this->input->get_post('lms_car_prop_existing_insure'));
			$productData['reg_number'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_reg_no'));
			$productData['manufacture_year'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_man_year'));
			$productData['manufacturer'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_make'));
			$productData['model_varient'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_model'));
			$productData['registration_city'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_city_registration'));
			$productData['IDV_value'] = $this->security->xss_clean($this->input->get_post('lms_car_idv'));
			$productData['show_room_value'] = $this->security->xss_clean($this->input->get_post('vehicleExShowroomPrice'));
			$productData['vehicle_register_date'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_registration_date'));
			$productData['vehicle_tenure'] = $this->security->xss_clean($this->input->get_post('lms_car_tenure'));
			$productData['home_policy_start'] = $this->security->xss_clean($this->input->get_post('lsm_car_pyp_starts_date'));
			$productData['home_policy_end'] = $this->security->xss_clean($this->input->get_post('lsm_car_pyp_ends_date'));
			$productData['hme_previous_claims'] = $this->security->xss_clean($this->input->get_post('lms_motor_pyp_available'));
			$productData['expiring_policy_NCB'] = $this->security->xss_clean($this->input->get_post('lms_car_ncb'));
			$productData['valid_license'] = $this->security->xss_clean($this->input->get_post('lms_car_valid_license'));
			$productData['declaration_valid_license'] = $this->security->xss_clean($this->input->get_post('lms_car_valid_license_declaration'));
			$productData['lms_premium'] = $premiumAmont;
			$productData['expiring_policy_claim'] = $this->security->xss_clean($this->input->get_post('lms_car_claim_policy'));
			$productData['created_by'] = $this->session->userdata('emp_id');
			$productData['is_existing_pa_policy'] = $this->security->xss_clean($this->input->get_post('lms_car_existing_pa_policy'));
			$productData['standalone_pa_policy'] = $this->security->xss_clean($this->input->get_post('lms_car_do_u_need_stand_pa'));
			$productData['pa_to_own_driver'] = $this->security->xss_clean($this->input->get_post('lms_car_pa_own_driver'));

		if(empty($this->makeeditApplicationId)){

			$productData['customer_id'] = $this->makeuserId;
			$productData['lead_id'] = $this->makeLeadId;
			$productData['product_type'] = 'Two Wheeler';

			$this->db->set($productData)->insert('tbl_product');
		} else {
			$this->db->set($productData)->where('lead_id',$this->makeeditApplicationId)->update('tbl_product');
		}
		
		$this->lmsTwoProposalDetails();
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function lmsTwoProposalDetails(){

		try{

			$proposalData['existing_insure'] = $this->security->xss_clean($this->input->get_post('lms_car_prop_existing_insure'));
			$proposalData['existing_policy_num'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_existing_policynum'));
			$proposalData['existing_policy_expiry'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_existing_policy_expiry'));
			$proposalData['new_policy_start'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_policy_start'));
			$proposalData['prop_mtr_reg_date'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_regis_date'));
			$proposalData['prop_mtr_regi_num'] = $this->security->xss_clean($this->input->get_post('lms_two_wheeler_reg_no'));
			$proposalData['prop_mtr_engine_num'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_engine_num'));
			$proposalData['prop_mtr_chasis_num'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_chasis_num'));
			$proposalData['prop_mtr_financed'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_financed'));
			$proposalData['prop_mtr_fin_ins_name'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_fin_ins_name'));
			$proposalData['prop_mtr_fin_ins_city'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_fin_ins_city'));
			$proposalData['prop_mtr_prev_stand_alone'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_prev_stand_alone'));
			$proposalData['prop_mtr_prev_prev_depre'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_prev_depre'));
			$proposalData['prop_mtr_prev_prev_electric'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_prev_electric'));
			$proposalData['prop_mtr_prev_prev_cng_lpg'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_prev_cng_lpg'));

			if(empty($this->makeeditApplicationId)){
				$proposalData['customer_id'] = $this->makeuserId;
				$proposalData['lead_id'] = $this->makeLeadId;
				$proposalId = $this->db->set($proposalData)->insert('tbl_propsal');
			} else {
				$proposalId = $this->db->set($proposalData)->where('lead_id',$this->makeeditApplicationId)->update('tbl_propsal');
			}
			
			$nomineeData['nominee_name'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_nname'));
			$nomineeData['nominee_age'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_nage'));
			$nomineeData['nominee_relationship'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_nomie_relation'));
			$nomineeData['appointee_name'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_nameofappoint'));
			$nomineeData['appointee_relationship'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_appoint_relation'));

			if(empty($this->makeeditApplicationId)){
				$nomineeData['customer_id'] = $this->makeuserId;
				$nomineeData['lead_id'] = $this->makeLeadId;
				$nomineeId = $this->db->set( $nomineeData )->insert('tbl_nominee');
			} else {
				$nomineeId = $this->db->set( $nomineeData )->where('lead_id',$this->makeeditApplicationId)->update('tbl_nominee');
			}

			
			$driverData['driving_exp'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_drive'));
			$driverData['night_parking'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_parking'));
			$driverData['driver_count'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_who_drive'));
			$driverData['KM_per_year'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_kms'));
			$driverData['young_driver_age'] = $this->security->xss_clean($this->input->get_post('lms_car_pro_ydage'));
			$driverData['ext_driver'] = $this->security->xss_clean($this->input->get_post('lms_lms_car_pro_driver'));

			if(empty($this->makeeditApplicationId)){
			$driverData['customer_id'] = $this->makeuserId;
			$driverData['lead_id'] = $this->makeLeadId;
			$driverId = $this->db->set($driverData)->insert('tbl_driving_habits');
			} else {
			$driverId = $this->db->set($driverData)->where('lead_id',$this->makeeditApplicationId)->update('tbl_driving_habits');
			}

	   		if($this->input->get_post('lms_car_comment') != ''){

				$commentData = array(
					'comment'	=> $this->security->xss_clean($this->input->get_post('lms_car_comment')),
					'lead_id'	=> $this->makeLeadId,
					'status'  	=> 1,
					'created_on' => $this->session->userdata('emp_id'),
					'created_by' =>date("Y-m-d G:i:s"),
				);
				$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
			}

			if(!empty($this->makeeditApplicationId)){

				$this->Useractivity->getInsertHistory(array(
					'emp_id' => $this->session->userdata('emp_id'),
					'leadId' => $this->makeeditApplicationId,
					'type' => 15
					));

				//$this->db->set(array('quote_status'=>0))->where('quote_lead_sno',$this->makeeditApplicationId)->update('tbl_vehicle_quote_details');
			}

			$detailsVehilcle = array( 
				'vehiclerikType' => $this->security->xss_clean($this->input->get_post('vehiclerikType')),
				'vehiclefueltype' => $this->security->xss_clean($this->input->get_post('vehiclefueltype')),
				'vehicleVariant' => $this->security->xss_clean($this->input->get_post('vehicleVariant')),
				'vehicleVehicleAge' => $this->security->xss_clean($this->input->get_post('vehicleVehicleAge')),
				'vehiclecc' => $this->security->xss_clean($this->input->get_post('vehiclecc')),
				'vehicleSeatingCapacity' => $this->security->xss_clean($this->input->get_post('vehicleSeatingCapacity')),
				'vehiclemodel' => $this->security->xss_clean($this->input->get_post('vehiclemodel')),
				'vehicleRegState' => $this->security->xss_clean($this->input->get_post('vehicleRegState')),
				'vehiclemaxidv' => $this->security->xss_clean($this->input->get_post('vehiclemaxidv')),
				'vehicleminidv' => $this->security->xss_clean($this->input->get_post('vehicleminidv'))
			);

		if(empty($this->makeeditApplicationId)){

			$this->quoteSeriveBool = true;
			
			$sessionquoteInforation = $this->session->userdata('quoteInforation');
			if(empty($sessionquoteInforation)){
				$quoteInforation = $this->getQuoteorderinfo();
			} else {
				$quoteInforation = $sessionquoteInforation;
			}

			$quoteInforInsertion = array(
				'quote_lead_sno' => $this->makeLeadId,
				'quote_orderNum' => $this->session->userdata('vehicleOrdernumber'),
				'quote_QuoteNum' => $this->session->userdata('vehicleQuotationNumner'),
				'vehicle_details_req'=> json_encode($detailsVehilcle),
				'quote_type' => 1
			);
			$this->db->set($quoteInforInsertion)->insert('tbl_vehicle_quote_details');
			
			$quoteInforInsertion2 = array(
				'quote_lead_sno' => $this->makeLeadId,
				'quote_orderNum' => $this->security->xss_clean($quoteInforation['OrderNo']),
				'quote_QuoteNum' => $this->security->xss_clean($quoteInforation['QuoteNo']),
				'vehicle_details_req'=> json_encode($detailsVehilcle),
				'quote_type' => 2
			);

			$this->db->set($quoteInforInsertion2)->insert('tbl_vehicle_quote_details');

			}
			if($this->session->userdata('quoteInforation')){
				$this->session->unset_userdata('quoteInforation');
			}
			$dataReturn['status'] = true;
			$dataReturn['message'] = $this->leadApplicationnumber;
			echo json_encode($dataReturn);
	
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}

	}

	public function createLmsTwoWheeler(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['city'] = $this->Common_model->getCityList();
	   		$str = file_get_contents(APPPATH.'../assets/json/model-make.json');
	      
	        $dataArraycar = json_decode($str, true);
			$dataArraycar = $this->Common_model->array_sort($dataArraycar, 'MANUFACTURE', SORT_ASC);
	         $filtercar = array("FTW");
	         foreach($dataArraycar as $arrcar)
	            {
	                foreach($filtercar as $valuecar)
	                {
	                    if(in_array($valuecar,$arrcar))
	                    {
	                        $dataArraycarnew[]=$arrcar;
	                    }
	                }
	            }
			
	        $carbrandArray = array_unique(array_filter(array_column($dataArraycarnew,'MANUFACTURE')));
	        $hashBrandCategoriesedcar = array();
	        $brandVariantscar = array();
	        foreach($dataArraycar as $eachDataCar){
	            $carmanufacture = $eachDataCar['MANUFACTURE'] ? $eachDataCar['MANUFACTURE'] : '';
	            $carvariant = $eachDataCar['VARIANT'] ? $eachDataCar['VARIANT'] : '';
	            $carmodel = $eachDataCar['MODEL'] ? $eachDataCar['MODEL'] : '';
	            $carEX_SHOWROOM_PRICE = $eachDataCar['EX_SHOWROOM_PRICE'] ? $eachDataCar['EX_SHOWROOM_PRICE'] : '';
	            $carhashKey = base64_encode($carmanufacture.$carvariant);
	            $carmhashKey = base64_encode($carmodel.'-'.$carvariant);
	            $carhashBrandCategoriesed[$carhashKey] = $eachDataCar;
	            $carmhashBrandCategoriesed[$carmhashKey] = $carEX_SHOWROOM_PRICE;
	            $carbrandVariants[$carmanufacture][] = $carvariant;
	            $carmbrandVariants[$carmanufacture][] = $carmodel.'-'.$carvariant;
	        }

	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carbrandArray'] = $carbrandArray;
	        $this->data['carbrandVariants'] = $carbrandVariants;
	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carhashBrandCategoriesed'] = $carhashBrandCategoriesed;
	       	$this->data['carmhashBrandCategoriesed'] = $carmhashBrandCategoriesed;
	        $this->data['carmhashKey'] = $carmhashKey;
	        $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['PriorityArray'] = $this->Common_model->getPriority();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();

            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['languageArray'] = $this->Common_model->language();
            
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();
            
            $this->data['sdateArray'] = $this->Common_model->sdate();
     		$this->data['businessArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();
     		$this->data['userDetails'] = $this->User_model->getLoginDetails();

            $this->data['module'] = 'leads';

			$this->data['sub_module'] = 'Two Wheeler'; 

			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	
			            
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_two_wheeler',$this->data);
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}

	}

	public function getTwohellerData(){

		try{
			
			$rtaNumber = $this->security->xss_clean($this->input->post('number'));
			$rtaCode = $this->TwoWheeler_model->gettwowheelrtainfo($rtaNumber);
			if($rtaCode->num_rows()>0){
				$dataResponce['status'] = true;
				$rtarow = $rtaCode->row_object(); 
				$dataResponce['message'] = array(
					'_rsn' => $rtarow->rta_sno,
					'_rco' => $rtarow->rta_code,
					'_rst' => $rtarow->state_name,
					'_rln' => $rtarow->rta_location_name,
					'_rld' => $rtarow->rta_long_desc
				);
			} else {
				$dataResponce['status'] = false;
			}

			echo json_encode($dataResponce);
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getmakeandmodelnfo(){
		try{
			$makedata = $this->TwoWheeler_model->getmakemodelinfo();
			foreach ($makedata->result() as $value) {
				# code...
				$datainfo[] = array(
					'_mid' => $value->make_sno,
					'_mk' => $value->make_name
				);
			}
			$responceData['status'] = true;
			$responceData['message'] = $datainfo;
			echo json_encode($responceData);

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getvariantmakeandmodelnfo(){
		try{

			if($_SERVER['REQUEST_METHOD'] != "POST"){
				redirect('user','refresh');
				die();
			}
			$thismake = $this->input->post();
			$thismakevalue = $this->security->xss_clean($thismake['make']);
			$makedata = $this->TwoWheeler_model->getmodelvariantdata($thismakevalue);
			if($makedata->num_rows()>0){
				foreach ($makedata->result() as $value) {
				# code...
				$datainfo[] = array(
						'_mid' => $value->vm_id,
						'_mk' => $value->vm_make,
						'_md' => $value->model,
						'_pt' => $value->vm_product_type,
						'_itc' => $value->vm_item_code,
						'_vri' => $value->vm_variant,
						'_stc' => $value->vm_state_code,
						'_vmd' => $value->vm_model,
						'_vfl' => $value->vm_fuel,
						'_vcc' => $value->vm_cc,
						'_vscp' => $value->vm_seating_capacity,
						'_vesp' => $value->vm_ex_showroom_price
				);
				}
				$responceData['status'] = true;
				$responceData['message'] = $datainfo;
			} else {
				$responceData['status'] = false;
			}
			
			echo json_encode($responceData);

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}


	public function getcalculatetwowheeler(){
		try{

			if($_SERVER['REQUEST_METHOD'] != "POST"){
				redirect('user','refresh');
				die();
			}

			$postArray = $this->input->post();
			$makename = $this->security->xss_clean($postArray['makename']);
			$modelname = $this->security->xss_clean($postArray['modelname']);
			$productname = $this->security->xss_clean($postArray['productname']);
			$varianttypename = $this->security->xss_clean($postArray['varianttypename']);
			$stateCodeName = $this->security->xss_clean($postArray['stateCodeName']);
			$manyear = $this->security->xss_clean($postArray['manyear']);

			$rescalData = $this->TwoWheeler_model->__callCurl($makename,$modelname,$productname,$varianttypename,$stateCodeName,$manyear);

			echo json_encode($rescalData);

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getfastlinedatatwowheeler(){

		try{

			if($_SERVER['REQUEST_METHOD'] != "POST"){
				redirect('user','refresh');
				die();
			}

			$postArray = $this->input->post();
			$number = $this->security->xss_clean($postArray['number']);
			$letsgetData = $this->TwoWheeler_model->getIntigratefastline($number);
			echo json_encode($letsgetData);
			
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getQuoteSeriveProposal(){
		$this->quoteSeriveBool = false;
		$this->getQuoteorderinfo();
	}

	public function getQuoteorderinfo(){

		try{

			if($_SERVER['REQUEST_METHOD'] != "POST"){
				redirect('user','refresh');
				die();
			}
			$postArray = $this->input->post();
			//print_r($postArray);
			$tbl_make_masterData = $this->db->select('make_name')->where('make_sno',$postArray['lms_two_wheeler_make'])->get('tbl_make_master')->row_object();

			$twoData['ncbvalue'] = 0;
			$twoData['pypstartsdate'] = 'No';
			$twoData['pypendsdate'] = 'No';
			//print_r($postArray);
			
			$twoData['RegisterDate'] = $this->security->xss_clean(($postArray['vehicleRegisterDate'] ? $postArray['vehicleRegisterDate'] : $postArray['lms_two_wheeler_registration_date']));
			$twoData['ManfactureDate'] = $this->security->xss_clean(($postArray['vehicleManfactureDate'] ? $postArray['vehicleManfactureDate'] : $postArray['lms_two_wheeler_man_year']));
			$twoData['rikType'] = $this->security->xss_clean(($postArray['vehiclerikType'] ? $postArray['vehiclerikType'] :$postArray['lms_car_tenure']));
			$twoData['make'] = $this->security->xss_clean(($postArray['vehiclemake'] ? $postArray['vehiclemake'] : $tbl_make_masterData->make_name));
			$twoData['model'] = $this->security->xss_clean($postArray['vehiclemodel']);
			$twoData['fueltype'] = $this->security->xss_clean(($postArray['vehiclefueltype'] ? $postArray['vehiclefueltype'] : $postArray['vehiclefueltype']));
			$twoData['Variant'] = $this->security->xss_clean($postArray['vehicleVariant']);
			$twoData['idv'] = $this->security->xss_clean(($postArray['vehicleidv'] ? $postArray['vehicleidv'] : $postArray['lms_car_idv']));
			$twoData['VehicleAge'] = $this->security->xss_clean($postArray['vehicleVehicleAge']);
			$twoData['cc'] = $this->security->xss_clean($postArray['vehiclecc']);
			$twoData['PlaceOfRegistration'] = $this->security->xss_clean(($postArray['vehiclePlaceOfRegistration'] ? $postArray['vehiclePlaceOfRegistration'] : $postArray['lms_two_wheeler_city_registration']));
			$twoData['SeatingCapacity'] = $this->security->xss_clean($postArray['vehicleSeatingCapacity']);
			$twoData['ExShowroomPrice'] = $this->security->xss_clean($postArray['vehicleExShowroomPrice']);
			$twoData['PreviousChecker'] = $this->security->xss_clean(($postArray['vehiclePreviousChecker'] ? $postArray['vehiclePreviousChecker'] : $postArray['lms_motor_pyp_available']));
			$twoData['vehiclethirdparty'] = $this->security->xss_clean(($postArray['vehiclethirdpartyValue'] ? $postArray['vehiclethirdpartyValue'] : $postArray['lms_car_pro_prev_stand_alone']));
			$twoData['depPreviousPolicy'] = $this->security->xss_clean(($postArray['depPreviousPolicyValue'] ? $postArray['depPreviousPolicyValue'] : $postArray['lms_car_pro_prev_depre']));
			
			$twoData['vehicleRegisterNumber'] = $this->security->xss_clean(($postArray['vehicleRegisterNumber'] ? $postArray['vehicleRegisterNumber'] : $postArray['lms_two_wheeler_reg_no']));
			$twoData['vehicleRegState'] = $this->security->xss_clean($postArray['vehicleRegState']);
			$twoData['vehicleemailId'] = $this->security->xss_clean(($postArray['vehicleemailId'] ? $postArray['vehicleemailId'] : $postArray['lms_car_email']));
			$twoData['vehicleMobile'] = $this->security->xss_clean(($postArray['vehicleMobile'] ? $postArray['vehicleMobile'] : $postArray['lms_car_mobile']));
			$twoData['lmscartenure'] = $this->security->xss_clean(($postArray['lmscartenure'] ? $postArray['lmscartenure'] : $postArray['lms_car_tenure']));
			$lmscarvalidlicense = $this->security->xss_clean((!empty($postArray['lmscarvalidlicense']) ? $postArray['lmscarvalidlicense'] : (!empty($postArray['lms_car_valid_license']) ? $postArray['lms_car_valid_license'] : 0))) || 0;
			$twoData['lmscarvalidlicense'] = ($lmscarvalidlicense ? $lmscarvalidlicense : 0);

			$twoData['lmscarexistingpapolicy'] = $this->security->xss_clean(($postArray['lmscarexistingpapolicy'] ? $postArray['lmscarexistingpapolicy'] : $postArray['lms_car_existing_pa_policy']));
			$twoData['lmscardouneedstandpa'] = $this->security->xss_clean(($postArray['lmscardouneedstandpa'] ? $postArray['lmscardouneedstandpa'] : $postArray['lms_car_pro_prev_stand_alone']));

			if($postArray['vehiclePreviousChecker'] != 0 || $postArray['lms_motor_pyp_available'] != 0){
				$twoData['ncbvalue'] = $this->security->xss_clean(($postArray['ncbvalue'] ? $postArray['ncbvalue'] : ($postArray['lms_car_ncb'] ? $postArray['lms_car_ncb'] : '0')));

				$twoData['pypstartsdate'] = $this->security->xss_clean(($postArray['pypstartsdate'] ? $postArray['pypstartsdate'] : $postArray['lsm_car_pyp_starts_date']));

				$twoData['pypendsdate'] = $this->security->xss_clean(($postArray['pypendsdate'] ? $postArray['pypendsdate'] : $postArray['lsm_car_pyp_ends_date']));
			 	
			}
			$twoData['clickdeclarativelicence'] = '0';//$this->security->xss_clean(($postArray['clickdeclarativelicence'] ? $postArray['clickdeclarativelicence'] : $postArray['clickdeclarativelicence']));
			//lmscartenure chasisNumber  lms_motor_pyp_available
			$twoData['engineeNumber'] = $this->security->xss_clean(($postArray['lms_car_pro_engine_num']) ? $postArray['lms_car_pro_engine_num'] : $postArray['engineeNumber']);
			$twoData['chasisNumber'] = $this->security->xss_clean(($postArray['lms_car_pro_chasis_num']) ? $postArray['lms_car_pro_chasis_num'] : $postArray['chasisNumber']);
			$twoData['lmssalut'] = $this->security->xss_clean(($postArray['lms_car_salut']) ? $postArray['lms_car_salut'] : $postArray['lmssalut']);
			$twoData['lmsfname'] = $this->security->xss_clean(($postArray['lms_car_fname']) ? $postArray['lms_car_fname'] : $postArray['lmsfname']);

			$twoData['lmslname'] = $this->security->xss_clean(($postArray['lms_car_lname']) ? $postArray['lms_car_lname'] : $postArray['lmslname']);
			$twoData['lmsdob'] = $this->security->xss_clean(($postArray['lms_car_dob']) ? $postArray['lms_car_dob'] : $postArray['lmsdob']);
			$twoData['lmsgender'] = $this->security->xss_clean(($postArray['lms_car_gender']) ? $postArray['lms_car_gender'] : $postArray['lmsgender']);
			$twoData['lmsoccupation'] = $this->security->xss_clean($postArray['lmsoccupation']);
			$twoData['lmsmaterial'] = $this->security->xss_clean(($postArray['lms_car_pro_marital']) ? $postArray['lms_car_pro_marital'] : $postArray['lmsmaterial']);
			$twoData['lmsadd2'] = $this->security->xss_clean(($postArray['lms_car_add1']) ? $postArray['lms_car_add1'] : $postArray['lmsadd2']);
			$twoData['lmsadd3'] = $this->security->xss_clean(($postArray['lms_car_add2']) ? $postArray['lms_car_add2'] : $postArray['lmsadd3']);
			$twoData['lmsadd1'] = $this->security->xss_clean(($postArray['lms_car_add3'] ? $postArray['lms_car_add3'] : $postArray['lmsadd1']));
			$twoData['lmscity'] = $this->security->xss_clean(($postArray['lms_car_city'] ? $postArray['lms_car_city'] : $postArray['lmscity']));
			$twoData['lmsstate'] = $this->security->xss_clean(($postArray['lms_car_state']) ? $postArray['lms_car_state'] : $postArray['lmsstate']);
			$twoData['lmspincode'] = $this->security->xss_clean(($postArray['lms_car_zip']) ? $postArray['lms_car_zip'] : $postArray['lmspincode']);
			$twoData['lmsnominename'] = $this->security->xss_clean(($postArray['lms_car_pro_nname']) ? $postArray['lms_car_pro_nname'] : $postArray['lmsnominename']);
			$twoData['lmsnomineage'] = $this->security->xss_clean(($postArray['lms_car_pro_nage']) ? $postArray['lms_car_pro_nage'] : $postArray['lmsnomineage']);
			$twoData['lmsnominerelation'] = $this->security->xss_clean(($postArray['lms_car_pro_nomie_relation']) ? $postArray['lms_car_pro_nomie_relation'] : $postArray['lmsnominerelation']);
			$twoData['lmspolicynumber'] = $this->security->xss_clean(($postArray['lms_car_pro_existing_policynum']) ? $postArray['lms_car_pro_existing_policynum'] : $postArray['lmspolicynumber']);
			$twoData['lmsexistingname'] = $this->security->xss_clean(($postArray['lms_car_prop_existing_insure']) ? $postArray['lms_car_prop_existing_insure'] : $postArray['lmsexistingname']);
			$twoData['OrderNo'] = $this->session->userdata('vehicleOrdernumber');
			$twoData['QuoteNo'] = $this->session->userdata('vehicleQuotationNumner');
			$twoData['twoAddon'] = ($this->thisaddonStatus ? $this->thisaddonStatus : false);

			//print_r($twoData);

			if(!$this->quoteSeriveBool){

				$letsgetData = $this->TwoWheeler_model->gettwowheelerquoteinfo($twoData,false);
				$this->session->set_userdata('vehicleOrdernumber',$letsgetData['OrderNo'],true);
				$this->session->set_userdata('vehicleQuotationNumner',$letsgetData['QuoteNo'],true);
				echo json_encode($letsgetData);

			} else {
				$letsgetData = $this->TwoWheeler_model->getProposalVlueResponc($twoData,false);
				return $letsgetData;
			}
			
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getQuoteinformationpaymentgateway(){

		try{

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getCheckDateManfacture(){

		try{
			$varNewDate = Date('Y');
			$inputPost = $this->input->post('value');
			$yearDiff = $varNewDate-$inputPost;
			if($yearDiff == 0){
				$valuue['value'] = array('20-0','25-20');
			} elseif($yearDiff == 1){
				$valuue['value'] = array('20-0','25-20');
			} elseif($yearDiff == 2){
				$valuue['value'] = array('20-0','25-20','35-25');
			} elseif($yearDiff == 3){
				$valuue['value'] = array('20-0','25-20','35-25','45-35');
			} elseif($yearDiff == 4){
				$valuue['value'] = array('20-0','25-20','35-25','45-35','50-45');
			} elseif($yearDiff == 5){
				$valuue['value'] = array('20-0','25-20','35-25','45-35','50-45','50-50');
			} else {
				$valuue['value'] = array('20-0','25-20','35-25','45-35','50-45','50-50');
			}
			echo json_encode($valuue);
		} catch(Exception $error){
			log_message('error','Something went wrong .'.__FUNCTION__.'Report:'.json_encode(value));
		}
	}
	
	public function lmsPaScriptQuery(){

  	 if ($this->session->userdata('logged_in') == TRUE) {
		 
		$this->data['sub_module']='Home';
	    $this->data['module'] = 'leads'; 
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/lms_page_header_inner_script',$this->data);
		$this->load->view('lms_view/script_query_twheel');
		$this->load->view('layout/footer_inner');

	} else {
		redirect('user', 'refresh');
	}

  }

}

?>