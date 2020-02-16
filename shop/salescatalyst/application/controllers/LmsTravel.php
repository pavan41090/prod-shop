<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsTravel extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
   	   	$this->load->model('User_model');
	
	}

	public function createLmsTravel(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads';
			$this->data['sub_module'] = 'Travel'; 

			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();
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
			$this->load->view('lms_view/lms_create_travel',$this->data);
			$this->load->view('layout/footer_inner');

	} else {
			redirect('user', 'refresh');
		}

	}


	public function lmsTravelProductDetails(){

		$productData = array(
			'customer_id'  	 	=> $this->session->userdata('customerId'),
			'lead_id' 	   	    => $this->session->userdata('leadId'),
			'product_type'		=> $this->input->get_post('product_type'),
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
			
			'travel_policy_type'=> $this->input->get_post('travel_policy_type'),
			'travel_type_trip'=> $this->input->get_post('travel_type_trip'),
			'travel_cover_type'=> $this->input->get_post('travel_cover_type'),
			'travel_depart_date'=> $this->input->get_post('travel_depart_date'),
			'travel_return_date'=> $this->input->get_post('travel_return_date'),
			'travel_trip_duration'=> $this->input->get_post('travel_trip_duration'),
			'traveltype'=> $this->input->get_post('traveltype'),
			'geographical'=> $this->input->get_post('geographical'),
			'travel_max_trip'=> $this->input->get_post('travel_max_trip'),
			'lms_premium' => $this->input->get_post('lms_premium'),
			'created_by'=> $this->session->userdata('emp_id'),
 		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
	}
	
	public function lmsTravelProposalDetails(){

			$proposalData = array(
				'customer_id'  	 	=>$this->session->userdata('customerId'),
				'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'existing_insure'		=> '',
				'existing_policy_num' 	=> '',
				'existing_policy_expiry'=> '',
				'new_policy_start' 		=> '',
				'prop_mtr_reg_date' 	=> '',
				'prop_mtr_regi_num' 	=> '',
				'prop_mtr_engine_num' 	=> '',
				'prop_mtr_chasis_num'	=> '',
				'prop_mtr_financed' 	=> '',
				'sship_pro_height' 		=> '',
				'sship_pro_Weight'		=> '',
				'travel_pro_present_india'  =>	$this->input->get_post('tvl_pro_present_india'),
				'travel_pro_vaild_passport' =>	$this->input->get_post('tvl_pro_vaild_passport'),
				'travel_pro_national'  	 	=>	$this->input->get_post('tvl_pro_national'),
				'travel_pro_passport_no'    =>	$this->input->get_post('tvl_pro_passport_no'),
				'created_by'			    =>  $this->session->userdata('emp_id'),
			);


			$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');


		$nomineeData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('tvl_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('tvl_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('tvl_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('tvl_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('tvl_pro_appoint_relation'),
			'created_by'			=> $this->session->userdata('emp_id'),
 
		);

		$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');
		//var_dump($nomineeId);
		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('leadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s"),
			);
			$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}
			
		$optionData = array(
			'customer_id'	=> $this->session->userdata('customerId'),
			'lead_id' 	   	=> $this->session->userdata('leadId'),
			'option_1'		=> $this->input->get_post('tvl_pro_prosemi'),
			'option_2' 		=> $this->input->get_post('tvl_pro_illness'),
			'option_3'		=> $this->input->get_post('tvl_pro_engage'),
		);
		$driverId = $this->Lms_car_model->insertDataCommon($optionData,'tbl_prop_options');

		$leadData = array(
			'lead_status'	=> 'Lead Generated',
				'updated_by'        => $this->session->userdata('emp_id'),
				//'updated_on'        => date("Y-m-d G:i:s"),
						);
		$lead_id = $this->session->userdata('leadId');
	    $travelId = $this->Lms_car_model->updateDataCommon($leadData,'tbl_lead','lead_id',$lead_id);

	    if(isset($travelId)){
			echo $this->session->userdata('leadNumber');
		} else{
			echo "false";
		}
	}



		public function lmsTravelProductUpdateDetails(){
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
			
			'travel_policy_type'=> $this->input->get_post('travel_policy_type'),
			'travel_type_trip'=> $this->input->get_post('travel_type_trip'),
			'travel_cover_type'=> $this->input->get_post('travel_cover_type'),
			'travel_depart_date'=> $this->input->get_post('travel_depart_date'),
			'travel_return_date'=> $this->input->get_post('travel_return_date'),
			'travel_trip_duration'=> $this->input->get_post('travel_trip_duration'),
			'traveltype'=> $this->input->get_post('traveltype'),
			'geographical'=> $this->input->get_post('geographical'),
			'travel_max_trip'=> $this->input->get_post('travel_max_trip'),
			'lms_premium' => $this->input->get_post('lms_premium'),
			//'created_by'=> $this->session->userdata('emp_id'),
 		);

		//$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		$lmsEditProductId =  $this->input->get_post('lms_edit_product_id');
		$productId = $this->Lms_car_model->updateDataCommon($productUpdateData,'tbl_product','product_id',$lmsEditProductId);
		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
	}



	public function lmsTravelProposalUpdateDetails(){
		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
				'updated_by'        => $this->session->userdata('emp_id'),	
				//'updated_on'        => date("Y-m-d G:i:s"),		
			);
		$lead_id = $this->session->userdata('lmsEditLeadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);

	 		$proposalUpdateData = array(
				//'customer_id'  	 	=>$this->session->userdata('customerId'),
				//'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'existing_insure'		=> '',
				'existing_policy_num' 	=> '',
				'existing_policy_expiry'=> '',
				'new_policy_start' 		=> '',
				'prop_mtr_reg_date' 	=> '',
				'prop_mtr_regi_num' 	=> '',
				'prop_mtr_engine_num' 	=> '',
				'prop_mtr_chasis_num'	=> '',
				'prop_mtr_financed' 	=> '',
				'sship_pro_height' 		=> '',
				'sship_pro_Weight'		=> '',
				'travel_pro_present_india'  =>	$this->input->get_post('tvl_pro_present_india'),
				'travel_pro_vaild_passport' =>	$this->input->get_post('tvl_pro_vaild_passport'),
				'travel_pro_national'  	 	=>	$this->input->get_post('tvl_pro_national'),
				'travel_pro_passport_no'    =>	$this->input->get_post('tvl_pro_passport_no'),
				//'created_by'			    =>  $this->session->userdata('emp_id'),
			);


		//	$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');
		$lmsEditProposalId =  $this->input->get_post('lms_edit_proposal_id');
		$this->Lms_car_model->updateDataCommon($proposalUpdateData,'tbl_propsal','propsal_id',$lmsEditProposalId);

		$nomineeUpdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('tvl_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('tvl_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('tvl_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('tvl_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('tvl_pro_appoint_relation'),
			//'created_by'			=> $this->session->userdata('emp_id'),
 
		);

		//$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');
		$lmsEditNomineeId =  $this->input->get_post('lms_edit_nominee_id');
		$this->Lms_car_model->updateDataCommon($nomineeUpdateData,'tbl_nominee','nominee_id',$lmsEditNomineeId);

		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('lmsEditLeadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' =>date("Y-m-d G:i:s"),
			);
			$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}
			
		$optionsUpdateData = array(
			//'customer_id'	=> $this->session->userdata('customerId'),
			//'lead_id' 	   	=> $this->session->userdata('leadId'),
			'option_1'		=> $this->input->get_post('tvl_pro_prosemi'),
			'option_2' 		=> $this->input->get_post('tvl_pro_illness'),
			'option_3'		=> $this->input->get_post('tvl_pro_engage'),
		);

		$lmsEditOptionId =  $this->input->get_post('lms_edit_option_id');
		$updateOptionId = $this->Lms_car_model->updateDataCommon($optionsUpdateData,'tbl_prop_options','option_id',$lmsEditOptionId);

	    if(isset($updateOptionId)){
			echo $this->session->userdata('lmsEditApplicationId');
		} else{
			echo "false";
		}
	}



}?>		