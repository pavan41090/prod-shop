<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsHome extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');
		
	}

	public function createLmsHome(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads';
			$this->data['sub_module'] = 'Home'; 

			$this->data['stateArray'] = $this->Common_model->getStateList();
			//$this->data['pincodeArray'] = $this->Common_model->getPincodeList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            //$this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['PriorityArray'] = $this->Common_model->getPriority();
            //$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
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
			$this->load->view('lms_view/lms_create_home',$this->data);
			$this->load->view('layout/footer_inner');

	} else {
			redirect('user', 'refresh');
		}

	}	



	public function lmsHomeProductDetails(){
		
		
		$providedJsonData = array('valuables'=>$this->input->get_post('hme_checked_valuables'),'pee'=>$this->input->get_post('hme_checked_SIM_PEE'),'structure'=>$this->input->get_post('hme_checked_SIM_structure'));
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
			
            'hme_building_type'=> $this->input->get_post('hme_building_type'),
            'hme_property_ownership'=> $this->input->get_post('hme_property_ownership'),
            'hme_property_type'=> $this->input->get_post('hme_property_type'),
            'hme_previous_claims'=> $this->input->get_post('hme_previous_claims'),
            'hme_no_of_floors'=> $this->input->get_post('hme_no_of_floors'),
            'hme_year_of_construction'=> $this->input->get_post('hme_year_of_construction'),
            'hme_independent_house'=> $this->input->get_post('hme_independent_house'),
            'hme_compound_wall'=> $this->input->get_post('hme_compound_wall'),
            'hme_build_up'=> $this->input->get_post('hme_build_up'),
            'hme_sum_insured_provided'=> $this->input->get_post('hme_sum_insured_provided'),
            'hme_risk_address_same'=> $this->input->get_post('hme_risk_address_same'),
            'hme_risk_address1'=> $this->input->get_post('hme_risk_address1'),
            'hme_risk_address2'=> $this->input->get_post('hme_risk_address2'),
            'hme_risk_area' => $this->input->get_post('hme_risk_area'),
            'hme_risk_pincode'=> $this->input->get_post('hme_risk_pincode'),
            'hme_risk_state'=> $this->input->get_post('hme_risk_state'),
            'hme_risk_city'=> $this->input->get_post('hme_risk_city'),
            'hme_risk_nearest_land_mark'=> $this->input->get_post('hme_risk_nearest_land_mark'),

			'sum_insured' => $this->input->get_post('hme_sum_insured'),
			'lms_premium' 	=> $this->input->get_post('lms_premium'),
			'created_by'=> $this->session->userdata('emp_id'),
			'hme_sum_insured_provided' 	=> json_encode($providedJsonData)
 		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');

		for($i = 1; $i<7; $i++ ){
			if($this->input->get_post('hme_itm_des_val'.$i) != ''){
				$valuableData = array(
					'customer_id'  	=> $this->session->userdata('customerId'),
					'lead_id' 	   	=> $this->session->userdata('leadId'),
					'hme_itm_des'	=> $this->input->get_post('hme_itm_des_val'.$i),
					'hme_weight'	=> $this->input->get_post('hme_weight_val'.$i),
					'hme_SI'		=> $this->input->get_post('hme_SI_val'.$i),
					'status'		=> '1',
					'created_by'	=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($valuableData,'tbl_valuable_details');
			}
		}
			

		for($i = 1; $i<7; $i++ ){
			if($this->input->get_post('hme_itm_des_PEE'.$i) != ''){
				$peeData = array(
					'customer_id'  	=> $this->session->userdata('customerId'),
					'lead_id' 	   	=> $this->session->userdata('leadId'),
					'hme_itm_des'	=> $this->input->get_post('hme_itm_des_PEE'.$i),
					'hme_make'		=> $this->input->get_post('hme_make_PEE'.$i),
					'hme_model'		=> $this->input->get_post('hme_mdl_PEE'.$i),
					'hme_YOM'		=> $this->input->get_post('hme_yom_PEE'.$i),
					'hme_IMEI'		=> $this->input->get_post('hme_imei_PEE'.$i),
					'hme_SI'		=> $this->input->get_post('hme_SI_PEE'.$i),
					'status'		=> '1',
					'created_by'	=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($peeData,'tbl_pee_details');
			}
		}

		for($i = 1; $i<5; $i++ ){
			if($this->input->get_post('hme_long_des'.$i) != ''){
				$claimData = array(
					'customer_id'  		=> $this->session->userdata('customerId'),
					'lead_id' 	   		=> $this->session->userdata('leadId'),
					'hme_long_des'		=> $this->input->get_post('hme_long_des'.$i),
					'hme_assets_damage'	=> $this->input->get_post('hme_assets_damage'.$i),
					'hme_cause_loss'	=> $this->input->get_post('hme_cause_loss'.$i),
					'hme_ins_place'		=> $this->input->get_post('hme_ins_place'.$i),
					'hme_policy_yr'		=> $this->input->get_post('hme_policy_yr'.$i),
					'hme_ins_claim'		=> $this->input->get_post('hme_ins_claim'.$i),
					'hme_loss_amt'		=> $this->input->get_post('hme_loss_amt'.$i),
					'status'			=> '1',
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($claimData,'tbl_claim_details');
			}
		}
	


		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
	}



	public function lmsHomeProposalDetails(){
		
		$policyStartDate = $this->input->get_post('home_pro_policy_sdate');
		
		 $toDayDate = date('d-m-Y');
		 $strStart = strtotime(Date($policyStartDate));
		 $strEnd   = strtotime($toDayDate); 
		 
		//if($strStart >= $strEnd){
			
			$proposalData = array(
				'customer_id'  	 	=>$this->session->userdata('customerId'),
				'lead_id' 	   	    =>$this->session->userdata('leadId'),
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

			if($this->input->get_post('home_pro_nomie_name')!="" && $this->input->get_post('home_pro_nomie_relation')!="" && $this->input->get_post('home_pro_nomie_age')!=""){
				$nomineeData = array(
					'customer_id'  	 	=>$this->session->userdata('customerId'),
					'lead_id' 	   	    =>$this->session->userdata('leadId'),
					'nominee_name'		=> $this->input->get_post('home_pro_nomie_name'),
					'nominee_age' 		=> $this->input->get_post('home_pro_nomie_age'),
					'nominee_relationship'	=> $this->input->get_post('home_pro_nomie_relation'),
					'appointee_name' 		=> $this->input->get_post('home_pro_nameofappoint'),
					'appointee_relationship'	=> $this->input->get_post('home_pro_appoint_relation'),
					'created_by'			=> $this->session->userdata('emp_id'),
		 
				);

				$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');
			}
		
		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('leadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			
			//'created_by' => $this->input->get_post('comment_Date')///date("Y-m-d G:i:s"),
			//$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
			//->set(array('created_by'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
			$this->db->set($commentData)->insert('tbl_comments');
		}	
	
		$leadData = array(
			    'lead_status'	    => 'Lead Generated',
				'updated_by'        => $this->session->userdata('emp_id'),
				'updated_on'        => date("Y-m-d G:i:s")				
		);
		$lead_id = $this->session->userdata('leadId');
		//->set(array('updated_on'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
		$leadUpdate = $this->db->set($leadData)->where('lead_id',$lead_id)->update('tbl_lead');
	    // $leadUpdate = $this->Lms_car_model->updateDataCommon($leadData,'tbl_lead','lead_id',$lead_id);
	    if(isset($leadUpdate)){
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


	public function lmsHomeUpdateProductDetails(){
		
		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'        => $this->session->userdata('emp_id'),
			//'updated_on'        => date("Y-m-d G:i:s"),	
			
		);
		$lead_id = $this->session->userdata('lmsEditLeadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);
		
		$providedJsonData = array('valuables'=>$this->input->get_post('hme_checked_valuables'),'pee'=>$this->input->get_post('hme_checked_SIM_PEE'),'structure'=>$this->input->get_post('hme_checked_SIM_structure'));

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
			 'hme_building_type'=> $this->input->get_post('hme_building_type'),
            'hme_property_ownership'=> $this->input->get_post('hme_property_ownership'),
            'hme_property_type'=> $this->input->get_post('hme_property_type'),
            'hme_previous_claims'=> $this->input->get_post('hme_previous_claims'),
            'hme_no_of_floors'=> $this->input->get_post('hme_no_of_floors'),
            'hme_year_of_construction'=> $this->input->get_post('hme_year_of_construction'),
            'hme_independent_house'=> $this->input->get_post('hme_independent_house'),
            'hme_compound_wall'=> $this->input->get_post('hme_compound_wall'),
            'hme_build_up'=> $this->input->get_post('hme_build_up'),
            'hme_sum_insured_provided'=> $this->input->get_post('hme_sum_insured_provided'),
            'hme_risk_address_same'=> $this->input->get_post('hme_risk_address_same'),
            'hme_risk_address1'=> $this->input->get_post('hme_risk_address1'),
            'hme_risk_address2'=> $this->input->get_post('hme_risk_address2'),
            'hme_risk_area' => $this->input->get_post('hme_risk_area'),
            'hme_risk_pincode'=> $this->input->get_post('hme_risk_pincode'),
            'hme_risk_state'=> $this->input->get_post('hme_risk_state'),
            'hme_risk_city'=> $this->input->get_post('hme_risk_city'),
            'hme_risk_nearest_land_mark'=> $this->input->get_post('hme_risk_nearest_land_mark'),

			'sum_insured' => $this->input->get_post('hme_sum_insured'),
			'hme_sum_insured_provided' 	=> json_encode($providedJsonData),
 		);


		//$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		$lmsEditProductId =  $this->input->get_post('lms_edit_product_id');
		$productId = $this->Lms_car_model->updateDataCommon($productUpdateData,'tbl_product','product_id',$lmsEditProductId);
		
		if($this->input->get_post('hme_checked_valuables')){
		for($i = 1; $i<5; $i++ ){
		
			$lmsEditvaluableId =  $this->input->get_post('valu_update_id'.$i);
			if($lmsEditvaluableId != ''){

				$valuableUpdateData = array(
					//'lead_id'   		=> $this->session->userdata('lmsEditLeadId'),
					//'customer_id' 		=> $this->session->userdata('lmsEditCustId'),
					'hme_itm_des'	=> $this->input->get_post('hme_itm_des_val'.$i),
					'hme_weight'	=> $this->input->get_post('hme_weight_val'.$i),
					'hme_SI'		=> $this->input->get_post('hme_SI_val'.$i),
					'status'		=> '1',
					//'created_by'	=> $this->session->userdata('emp_id'),	
				);
				 $this->Lms_car_model->updateDataCommon($valuableUpdateData,'tbl_valuable_details','valuable_id',$lmsEditvaluableId);
			
			} else {	
			
				if($this->input->get_post('hme_itm_des_val'.$i) != ''){
					$valuableData = array(
						'lead_id'   		=> $this->session->userdata('lmsEditLeadId'),
						'customer_id' 		=> $this->session->userdata('lmsEditCustId'),
						'hme_itm_des'	=> $this->input->get_post('hme_itm_des_val'.$i),
						'hme_weight'	=> $this->input->get_post('hme_weight_val'.$i),
						'hme_SI'		=> $this->input->get_post('hme_SI_val'.$i),
						'status'		=> '1',
						'created_by'	=> $this->session->userdata('emp_id'),	
					);
					$this->Lms_car_model->insertDataCommon($valuableData,'tbl_valuable_details');
				}
			}	

		}
		
		} else {
			
			$this->db->set('status',0)->where('lead_id',$this->session->userdata('lmsEditLeadId'))->update('tbl_valuable_details');
		}
		
		
		if($this->input->get_post('hme_checked_SIM_PEE')){
		
			for($i = 1; $i<5; $i++ ){
			

			$lmsEditPeeId =  $this->input->get_post('pee_update_id'.$i);
			if($lmsEditPeeId != ''){

					$peeUpdateData = array(
					
						'hme_itm_des'	=> $this->input->get_post('hme_itm_des_PEE'.$i),
						'hme_make'		=> $this->input->get_post('hme_make_PEE'.$i),
						'hme_model'		=> $this->input->get_post('hme_mdl_PEE'.$i),
						'hme_YOM'		=> $this->input->get_post('hme_yom_PEE'.$i),
						'hme_IMEI'		=> $this->input->get_post('hme_imei_PEE'.$i),
						'hme_SI'		=> $this->input->get_post('hme_SI_PEE'.$i),
						'status'		=> '1',
					);
				 $this->Lms_car_model->updateDataCommon($peeUpdateData,'tbl_pee_details','pee_id',$lmsEditPeeId);
			
			} else {

				if($this->input->get_post('hme_itm_des_PEE'.$i) != ''){
					$peeData = array(
						'lead_id'   		=> $this->session->userdata('lmsEditLeadId'),
						'customer_id' 		=> $this->session->userdata('lmsEditCustId'),
						'hme_itm_des'	=> $this->input->get_post('hme_itm_des_PEE'.$i),
						'hme_make'		=> $this->input->get_post('hme_make_PEE'.$i),
						'hme_model'		=> $this->input->get_post('hme_mdl_PEE'.$i),
						'hme_YOM'		=> $this->input->get_post('hme_yom_PEE'.$i),
						'hme_IMEI'		=> $this->input->get_post('hme_imei_PEE'.$i),
						'hme_SI'		=> $this->input->get_post('hme_SI_PEE'.$i),
						'status'		=> '1',
						'created_by'	=> $this->session->userdata('emp_id'),	
					);
					$this->Lms_car_model->insertDataCommon($peeData,'tbl_pee_details');
				}
			}	
		}
		
		} else {
			
			$this->db->set('status',0)->where('lead_id',$this->session->userdata('lmsEditLeadId'))->update('tbl_pee_details');
			
		}

		for($i = 1; $i<5; $i++ ){
			
			$lmsEditClaimId =  $this->input->get_post('pre_claim_update_id'.$i);
			if($lmsEditClaimId != ''){

					$claimUpdateData = array(
						'hme_long_des'		=> $this->input->get_post('hme_long_des'.$i),
						'hme_assets_damage'	=> $this->input->get_post('hme_assets_damage'.$i),
						'hme_cause_loss'	=> $this->input->get_post('hme_cause_loss'.$i),
						'hme_ins_place'		=> $this->input->get_post('hme_ins_place'.$i),
						'hme_policy_yr'		=> $this->input->get_post('hme_policy_yr'.$i),
						'hme_ins_claim'		=> $this->input->get_post('hme_ins_claim'.$i),
						'hme_loss_amt'		=> $this->input->get_post('hme_loss_amt'.$i),
						'status'			=> '1',
					);
				 $this->Lms_car_model->updateDataCommon($claimUpdateData,'tbl_claim_details','claim_id',$lmsEditClaimId);
			
			} else {
				if($this->input->get_post('hme_long_des'.$i) != ''){
					$claimData = array(
						'lead_id'   		=> $this->session->userdata('lmsEditLeadId'),
						'customer_id' 		=> $this->session->userdata('lmsEditCustId'),
						'hme_long_des'		=> $this->input->get_post('hme_long_des'.$i),
						'hme_assets_damage'	=> $this->input->get_post('hme_assets_damage'.$i),
						'hme_cause_loss'	=> $this->input->get_post('hme_cause_loss'.$i),
						'hme_ins_place'		=> $this->input->get_post('hme_ins_place'.$i),
						'hme_policy_yr'		=> $this->input->get_post('hme_policy_yr'.$i),
						'hme_ins_claim'		=> $this->input->get_post('hme_ins_claim'.$i),
						'hme_loss_amt'		=> $this->input->get_post('hme_loss_amt'.$i),
						'status'			=> '1',
						'created_by'		=> $this->session->userdata('emp_id'),	
					);
					$medicalHistoryId = $this->Lms_car_model->insertDataCommon($claimData,'tbl_claim_details');
				}
			}	
		}


		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
	}



	public function lmsHomeUpdateProposalDetails(){
		
		
		$policyStartDate = $this->input->get_post('home_pro_policy_sdate');
		
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
	    #->set(array('updated_on'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
		$leadUpdateChange = $this->db->set($statusData)->where('lead_id',$lead_id)->update('tbl_lead');
		
		$proposalUpdateData = array(
			
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
			'sship_pro_Weight'		=> ''
		);

		$lmsEditProposalId =  $this->input->get_post('lms_edit_proposal_id');
		$this->Lms_car_model->updateDataCommon($proposalUpdateData,'tbl_propsal','propsal_id',$lmsEditProposalId);

		$nomineeUpdateData = array(
			'nominee_name'		=> $this->input->get_post('home_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('home_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('home_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('home_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('home_pro_appoint_relation')
 		);
			
		$lmsEditNomineeId =  $this->input->get_post('lms_edit_nominee_id');
		$this->Lms_car_model->updateDataCommon($nomineeUpdateData,'tbl_nominee','nominee_id',$lmsEditNomineeId);
		
		$commentDatas = $this->input->get_post('lms_car_comment');
		if(!empty($commentDatas)){
			
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('lmsEditLeadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			//->set(array('created_by'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),'',FALSE)
			$this->db->set($commentData)->insert('tbl_comments');
		}	
	
	    if(isset($leadUpdateChange)){
			
			$dataReturn['status'] = true;
			$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
			
		} else{
			
			$dataReturn['status'] = false;
		   	$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
		}
			
		//} else {
		//	$dataReturn['status'] = false;
		//	$dataReturn['message'] = 'Please Select Policy Starts Date Future';
			
		//}

		echo json_encode($dataReturn);
 }



public function lmsHomeScriptQuery()
  {

  	 if ($this->session->userdata('logged_in') == TRUE) {
		$this->data['sub_module']='Home';
	    $this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/lms_page_header_inner_script',$this->data);
		$this->load->view('lms_view/script_query_home');
		$this->load->view('layout/footer_inner');

	} else {
		redirect('user', 'refresh');
	}

  }




}?>		