<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsPersonalAccident extends CI_Controller {

	public $makeCustomerId;
	public $makeLeadId;

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');
	   	$this->makeCustomerId;
		$this->makeLeadId;
		
	}

	public function createLmsPa(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads';
			$this->data['sub_module'] = 'Personal Accident'; 

			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['PriorityArray'] = $this->Common_model->getPriority();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['languageArray'] = $this->Common_model->language();
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();

            $this->data['sdateArray'] = $this->Common_model->sdate();
     		$this->data['businessArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();
     		$this->data['userDetails'] = $this->User_model->getLoginDetails();
			
			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight;

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_pa',$this->data);
			$this->load->view('layout/footer_inner');

	} else {
			redirect('user', 'refresh');
		}

	}


	
  public function lmsCustomerDetails(){

		
		$cusData = array(
			'cus_card_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_card_name')),
			'cus_relation_ishued' 	=> $this->security->xss_clean($this->input->get_post('lms_car_relation_insure')),
			'cus_title' 	=> $this->security->xss_clean($this->input->get_post('lms_car_salut')),
			'first_name'	=> $this->security->xss_clean($this->input->get_post('lms_car_fname')),
			'last_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_lname')),
			'date_of_birth'	=> $this->security->xss_clean($this->input->get_post('lms_car_dob')),
			'cust_age'      => $this->security->xss_clean($this->input->get_post('lms_car_age')),
			'cust_gender' 	=> $this->security->xss_clean($this->input->get_post('lms_car_gender')),
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
 			'marital_status'=> $this->security->xss_clean($this->input->get_post('lms_car_pro_marital')),
			'occupation'	=> $this->security->xss_clean($this->input->get_post('lms_car_pro_occupation')),
			'emergency_contact_num' => $this->security->xss_clean($this->input->get_post('lms_car_pro_emergency')),
			'GSTIN' => $this->security->xss_clean($this->input->get_post('lms_car_pro_gstn')),
			'cust_house_number' => $this->security->xss_clean($this->input->get_post('lms_house_number')),
			'cus_customer' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_customer')),
			'cus_language' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_language')),
			'cus_emi' 			=> $this->security->xss_clean($this->input->get_post('lms_cus_emi')),
			'cus_emi_yr' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_emi_yr')),
			'processing_fee	'	=> $this->security->xss_clean($this->input->get_post('lms_cus_pfee')),
 			'cus_cardlimt'		=> $this->security->xss_clean($this->input->get_post('lms_cus_cardlimt')),
			'statement_date'	=> $this->security->xss_clean($this->input->get_post('lms_cus_sdate')),
			'temp_LE'           => $this->security->xss_clean($this->input->get_post('lms_cus_tle')),
			'business_type'	    => $this->security->xss_clean($this->input->get_post('lms_cus_tbusins')),
			'created_by'        => $this->security->xss_clean($this->session->userdata('emp_id')),
		);

		$this->db->set($cusData)->insert('tbl_customer');
		$customerId = $this->db->insert_id();
		$this->makeCustomerId = $customerId;
		$applicationNumber = $this->Lms_car_model->generateApplicationNumber();
		$subChannel="";
		if($this->input->get_post('lms_car_campaign_name') != FALSE){
				$subChannel=$this->input->get_post('lms_car_campaign_name');
		}
		
		$timestamp = $this->input->get_post('comment_Date');
		//date('Y-m-d G:i:s'); 
		$leadData = array(
			'category'=> $this->security->xss_clean($this->input->get_post('lms_car_category')),
			'line_of_business'=> $this->security->xss_clean($this->input->get_post('lms_car_line_of_business')),
			'priority' => $this->security->xss_clean($this->input->get_post('lms_car_sub_channel')),
			'target_date' => $this->security->xss_clean($this->input->get_post('lms_car_target_date')),
			'TSE_BDR_code' => $this->security->xss_clean($this->input->get_post('lms_car_tse_bar_code')),
			'TL_code' => $this->security->xss_clean($this->input->get_post('lms_car_tl_code')),
			'SM_code' => $this->security->xss_clean($this->input->get_post('lms_car_sm_code')),
			'bank_verifier_id'=> $this->security->xss_clean($this->input->get_post('lms_car_bank_verify_id')),
			'case_id' => $this->security->xss_clean($this->input->get_post('lms_car_case_id')),
			'payment_type' => $this->security->xss_clean($this->input->get_post('lms_car_payment_type')),
			'sub_channel' => $this->security->xss_clean($subChannel),
			'channel' => $this->security->xss_clean($this->input->get_post('lms_car_channel')),
			'HDFC_card_relationship_no' => $this->security->xss_clean($this->input->get_post('lms_car_hdfc_card_relno')),
			'HDFC_card_last_4_digits' => $this->security->xss_clean($this->input->get_post('lms_car_hdfc_card_4digt')),
			'lead_application_id'=> $this->security->xss_clean($applicationNumber),
			'customer_id' => $this->security->xss_clean($customerId),
			'lead_details' => $this->security->xss_clean($this->input->get_post('lms_car_deatil_lead')),
			'aaa_number' => $this->security->xss_clean($this->input->get_post('lms_aaa_number')),
			'created_by'=> $this->session->userdata('emp_id'),
			'vision_address' => $this->security->xss_clean($this->input->get_post('vision_address_name')),
			'lead_status'=>"9999",
			'created_on' => date("Y-m-d G:i:s")
		);
		$this->db->set($leadData)->insert('tbl_lead');
		$leadId = $this->db->insert_id();
		$this->makeLeadId = $leadId;
		$leadData = array(
			'customerId' => $customerId,
			'leadId' 	=> $leadId,
			'leadNumber' => $applicationNumber,
		);
		$this->session->set_userdata($leadData);		
		$this->lmsPaProductDetails();
	}
	


	public function lmsPaProductDetails(){

		$productData = array(
			'customer_id'  	 	=>$this->makeCustomerId,
			'lead_id' 	   	    =>$this->makeLeadId,
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
			
			'gainful'=> '',
			'sum_insured' => $this->input->get_post('sum_insured'),
			'lms_premium' => $this->input->get_post('lms_premium'),
			//'created_by'=> $this->session->userdata('emp_id'),
 		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		$this->lmsPaProposalDetails();
	}



	public function lmsPaProposalDetails(){
		
		
		$policyStartDate = $this->input->get_post('pa_pro_policy_sdate');
		
		 $toDayDate = date('d-m-Y');
		 $strStart = strtotime(Date($policyStartDate));
		 $strEnd   = strtotime($toDayDate); 
		 
		//if($strStart >= $strEnd){
			
			$proposalData = array(
				'customer_id'  	 	=>$this->makeCustomerId,
				'lead_id' 	   	    =>$this->makeLeadId,
				'existing_insure'		=> '',
				'existing_policy_num' 	=> '',
				'existing_policy_expiry'=> '',
				'new_policy_start' 		=> $policyStartDate,
				'prop_mtr_reg_date' 	=> '',
				'prop_mtr_regi_num' 	=> '',
				'prop_mtr_engine_num' 	=> '',
				'prop_mtr_chasis_num'	=> '',
				'prop_mtr_financed' 	=> '',
				'sship_pro_height' 		=> '',
				'sship_pro_Weight'		=> '',
				'created_by'			=> $this->session->userdata('emp_id'),
				
				
			);

		$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');
		
			$nomineeData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('pa_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('pa_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('pa_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('pa_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('pa_pro_appoint_relation'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);

		$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');


		$optionData = array(
			'customer_id'	=> $this->session->userdata('customerId'),
			'lead_id' 	   	=> $this->session->userdata('leadId'),
			'option_1'		=> $this->input->get_post('pa_pro_suffered'),
			'option_2' 		=> $this->input->get_post('pa_pro_Sonography'),
			'option_3'		=> $this->input->get_post('pa_pro_surgery'),
			'option_4'   	=> $this->input->get_post('pa_pro_medication'),
			'pa_option_comment'=>$this->input->get_post('pa_similar_policy_comment'),
			
		);
		$driverId = $this->Lms_car_model->insertDataCommon($optionData,'tbl_prop_options');
		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->makeLeadId,
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			//set(array('created_by'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
			$this->db->set($commentData)->insert('tbl_comments');
			//$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}	
		$leadData = array(
			'lead_status'	=> 'Lead Generated',
			'updated_by'        => $this->session->userdata('emp_id'),
			'updated_on'        => date("Y-m-d G:i:s")
		);
			
		$lead_id = $this->makeLeadId;
		//set(array('updated_on'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
		$this->db->set($leadData)->where('lead_id',$lead_id)->update('tbl_lead');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($leadData,'tbl_lead','lead_id',$lead_id);
		
	    if(isset($leadUpdate)){
			
			$dataReturn['status'] = true;
			$dataReturn['message'] = $this->session->userdata('leadNumber');
			
		} else{
			
		   	$dataReturn['status'] = false;
		   	$dataReturn['message'] = '';
		}
		
		//} else {
			//$dataReturn['status'] = false;
		//	$dataReturn['message'] = 'Please Select Policy Starts Date Future';
			
		//}
		
		echo json_encode($dataReturn);

  }





	public function lmsPaProductUpdateDetails(){

		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'        => $this->session->userdata('emp_id'),	
			//'updated_on'        => date("Y-m-d G:i:s"),
		);
		$lead_id = $this->session->userdata('lmsEditLeadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);
	    
		$productUpdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			///'lead_id' 	   	    =>$this->session->userdata('leadId'),
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
			'sum_insured'=> $this->input->get_post('hme_sum_insured'),
			'gainful'=> $this->input->get_post('gainful'),
			'lms_premium' => $this->input->get_post('lms_premium'),
			//'created_by'=> $this->session->userdata('emp_id'),
 		);
		
		//$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		$lmsEditProductId =  $this->input->get_post('lms_edit_product_id');
		$productId = $this->Lms_car_model->updateDataCommon($productUpdateData,'tbl_product','product_id',$lmsEditProductId);
		
		$this->lmsPaProposalUpdateDetails();
	}






	public function lmsPaProposalUpdateDetails(){
		
		$policyStartDate = $this->input->get_post('pa_pro_policy_sdate');
		
		 $toDayDate = date('d-m-Y');
		 $strStart = strtotime(Date($policyStartDate));
		 $strEnd   = strtotime($toDayDate); 
		 
		//if($strStart >= $strEnd){
			
			$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'        => $this->session->userdata('emp_id'),
			'updated_on'        => date("Y-m-d G:i:s")
		);
		$lead_id = $this->session->userdata('lmsEditLeadId');
		$thisDetetials = $this->Lms_car_model->getLeadProductTypeByLeadID($lead_id);
		//->set(array('updated_on'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
		$updateLeadData = $this->db->set($statusData)->where('lead_id',$lead_id)->update('tbl_lead');
		
	    #$leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);

			$proposalUpdateData = array(
				//'customer_id'  	 	=>$this->session->userdata('customerId'),
				//'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'existing_insure'		=> '',
				'existing_policy_num' 	=> '',
				'existing_policy_expiry'=> '',
				'new_policy_start' 		=> $policyStartDate,
				'prop_mtr_reg_date' 	=> '',
				'prop_mtr_regi_num' 	=> '',
				'prop_mtr_engine_num' 	=> '',
				'prop_mtr_chasis_num'	=> '',
				'prop_mtr_financed' 	=> '',
				'sship_pro_height' 		=> '',
				'sship_pro_Weight'		=> '',
				'created_by'			=> $this->session->userdata('emp_id'),
			);

		
		
		$lmsEditProposalId =  $this->input->get_post('lms_edit_proposal_id');
		$this->Lms_car_model->updateDataCommon($proposalUpdateData,'tbl_propsal','propsal_id',$lmsEditProposalId);

		$nomineeupdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('pa_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('pa_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('pa_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('pa_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('pa_pro_appoint_relation'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);

		
		$lmsEditNomineeId =  $this->input->get_post('lms_edit_nominee_id');
		$this->Lms_car_model->updateDataCommon($nomineeupdateData,'tbl_nominee','nominee_id',$lmsEditNomineeId);

		$optionsUpdateData = array(
			//'customer_id'	=> $this->session->userdata('customerId'),
			//'lead_id' 	   	=> $this->session->userdata('leadId'),
			'option_1'		=> $this->input->get_post('pa_pro_suffered'),
			'option_2' 		=> $this->input->get_post('pa_pro_Sonography'),
			'option_3'		=> $this->input->get_post('pa_pro_surgery'),
			'option_4'   	=> $this->input->get_post('pa_pro_medication'),
			'pa_option_comment'=>$this->input->get_post('pa_similar_policy_comment'),
			
		);
		
		
		$lmsEditOptionId =  $this->input->get_post('lms_edit_option_id');
		$this->Lms_car_model->updateDataCommon($optionsUpdateData,'tbl_prop_options','option_id',$lmsEditOptionId);

		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('lmsEditLeadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			
			$this->db->set($commentData)->insert('tbl_comments');
			
			//$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}	

		
	    if(isset($updateLeadData)){
			$dataReturn['status'] = true;
			$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
		} else {
		   	$dataReturn['status'] = false;
			$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
		}
		
		//} else {
		//	$dataReturn['status'] = false;
		//	$dataReturn['message'] = 'Please Select Policy Starts Date Future';
			
		//}
		
		echo json_encode($dataReturn);

  }
//script query function
public function lmsPaScriptQuery()
  {

  	 if ($this->session->userdata('logged_in') == TRUE) {
		$this->data['sub_module']='Home';
	    $this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/lms_page_header_inner_script',$this->data);
		$this->load->view('lms_view/script_query _pa');
		$this->load->view('layout/footer_inner');

	} else {
		redirect('user', 'refresh');
	}

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
		
		$this->lmsPaProductUpdateDetails();
		
    }
   



}?>		
