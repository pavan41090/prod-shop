<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsShop extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');
		
	}

	public function createLmsShop(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads';
			$this->data['sub_module'] = 'Shop'; 

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

     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();


			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	


			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_shop',$this->data);
			$this->load->view('layout/footer_inner');

	} else {
			redirect('user', 'refresh');
		}

	}	



	public function lmsShopProductDetails(){


		$productData = array(
			'customer_id'  	 	=>	$this->session->userdata('customerId'),
			'lead_id' 	   	    =>	$this->session->userdata('leadId'),
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
            'hme_building_type'=> $this->input->get_post('shop_building_type'),
            'hme_property_ownership'=> $this->input->get_post('shop_property_ownership'),
            'hme_property_type'=> '',
            'hme_previous_claims'=> $this->input->get_post('shop_previous_claims'),
            'hme_no_of_floors'=> $this->input->get_post('shop_no_of_floors'),
            'hme_year_of_construction'=> $this->input->get_post('shop_year_of_construction'),
            'hme_independent_house'=> '',
            'hme_compound_wall'=> '',
            'hme_build_up'=> '',
            'hme_sum_insured_provided'=> $this->input->get_post('shop_sum_insured_provided'),
            'hme_risk_address_same'=> $this->input->get_post('shop_risk_address_same'),
            'hme_risk_address1'=> $this->input->get_post('shop_risk_address1'),
            'hme_risk_address2'=> $this->input->get_post('shop_risk_address2'),
            'hme_risk_area' => $this->input->get_post('shop_risk_area'),
            'hme_risk_pincode'=> $this->input->get_post('shop_risk_pincode'),
            'hme_risk_state'=> $this->input->get_post('shop_risk_state'),
            'hme_risk_city'=> $this->input->get_post('shop_risk_city'),
            'hme_risk_nearest_land_mark'=> $this->input->get_post('shop_risk_nearest_land_mark'),

			'sum_insured' => $this->input->get_post('shop_sum_insured'),
			'lms_premium' 	=> $this->input->get_post('lms_premium'),
			'created_by'=> $this->session->userdata('emp_id'),
 		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');




		for($i = 1; $i<5; $i++ ){
			if($this->input->get_post('shop_long_des'.$i) != ''){
				$claimData = array(
					'customer_id'  		=> $this->session->userdata('customerId'),
					'lead_id' 	   		=> $this->session->userdata('leadId'),
					'hme_long_des'		=> $this->input->get_post('shop_long_des'.$i),
					'hme_assets_damage'	=> $this->input->get_post('shop_assets_damage'.$i),
					'hme_cause_loss'	=> $this->input->get_post('shop_cause_loss'.$i),
					'hme_ins_place'		=> $this->input->get_post('shop_ins_place'.$i),
					'hme_policy_yr'		=> $this->input->get_post('shop_policy_yr'.$i),
					'hme_ins_claim'		=> $this->input->get_post('shop_ins_claim'.$i),
					'hme_loss_amt'		=> $this->input->get_post('shop_loss_amt'.$i),
					'status'			=> '1',
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$this->Lms_car_model->insertDataCommon($claimData,'tbl_claim_details');
			}
		}
		
		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
	}



	public function lmsShopProposalDetails(){
			$proposalData = array(
				'customer_id'  	 	=>$this->session->userdata('customerId'),
				'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'existing_insure'		=> '',
				'existing_policy_num' 	=> '',
				'existing_policy_expiry'=> '',
				'new_policy_start' 		=> $this->input->get_post('shop_pro_policy_sdate'),
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
			'nominee_name'		=> $this->input->get_post('shop_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('shop_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('shop_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('shop_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('shop_pro_appoint_relation'),
			'created_by'			=> $this->session->userdata('emp_id'),
 
		);

		$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');
		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('leadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' =>date("Y-m-d G:i:s"),
			);
			$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}	
	
		$leadData = array(
			'lead_status'	=> 'Lead Generated',
				'updated_by'        => $this->session->userdata('emp_id'),
				//'updated_on'        => date("Y-m-d G:i:s"),	
						
		);
		$lead_id = $this->session->userdata('leadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($leadData,'tbl_lead','lead_id',$lead_id);
	    if(isset($leadUpdate)){
			echo $this->session->userdata('leadNumber');
		} else{
		   		echo "false";
		}
  	}


	public function lmsShopUpdateProductDetails(){
		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'        => $this->session->userdata('emp_id'),
			//'updated_on'        => date("Y-m-d G:i:s"),	
		
		);
		$lead_id = $this->session->userdata('lmsEditLeadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);

		$productUpdateData = array(
			//'customer_id'  	 	=>	$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>	$this->session->userdata('leadId'),
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
			
			'Home_plans'=> $this->input->get_post('Home_plans'),
			'Home_policy_start'=> $this->input->get_post('Home_policy_start'),
			'Home_policy_end'=> $this->input->get_post('Home_policy_end'),
			'lms_premium' 	=> $this->input->get_post('lms_premium'),
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



	public function lmsShopUpdateProposalDetails(){

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
			'new_policy_start' 		=> $this->input->get_post('home_pro_policy_sdate'),
			'prop_mtr_reg_date' 	=> '',
			'prop_mtr_regi_num' 	=> '',
			'prop_mtr_engine_num' 	=> '',
			'prop_mtr_chasis_num'	=> '',
			'prop_mtr_financed' 	=> '',
			'sship_pro_height' 		=> '',
			'sship_pro_Weight'		=> '',
			//'created_by'			=> $this->session->userdata('emp_id'),
		);

		$lmsEditProposalId =  $this->input->get_post('lms_edit_proposal_id');
		$this->Lms_car_model->updateDataCommon($proposalUpdateData,'tbl_propsal','propsal_id',$lmsEditProposalId);

		$nomineeUpdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('home_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('home_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('home_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('home_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('home_pro_appoint_relation'),
			//'created_by'			=> $this->session->userdata('emp_id'),
 		);
			
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
	
	    if(isset($proposalUpdateData)){
			echo $this->session->userdata('lmsEditApplicationId');
		} else{
		   		echo "false";
		}
  	}



public function lmsShopScriptQuery()
  {

  	 if ($this->session->userdata('logged_in') == TRUE) {
		$this->data['sub_module']='Shop';
	    $this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/lms_page_header_inner_script',$this->data);
		$this->load->view('lms_view/script_query');
		$this->load->view('layout/footer_inner');

	} else {
		redirect('user', 'refresh');
	}

  }




}?>		