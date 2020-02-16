<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsHome extends CI_Controller {

	public $makeLeadId;
	public $makeuserId;
	public $leadApplicationnumber;
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');
		$this->makeLeadId;
		$this->makeuserId;
		$this->leadApplicationnumber;
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
			$this->data['userDetails'] = $this->User_model->getLoginDetails();
			
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
		
		$valuablescheck = 0;
		$peecheck = 0;
		$structurecheck = 0;
		
		$hme_sum_insured_providedpp = $this->input->get_post('hme_sum_insured_provided');
		
				if(count($hme_sum_insured_providedpp)>0 && in_array('valuables',$hme_sum_insured_providedpp)){
					$valuablescheck = 1;
				}
				if(count($hme_sum_insured_providedpp)>0 && in_array('SIM_PEE',$hme_sum_insured_providedpp)){
					$peecheck = 1;
				}
				if(count($hme_sum_insured_providedpp)>0 && in_array('structure',$hme_sum_insured_providedpp)){
					$structurecheck = 1;
				}
		$providedJsonData = array(
					'valuables'=>$valuablescheck,
					'pee'=>$peecheck,
					'structure'=>$structurecheck
					);
		
			$productData = array(
			'customer_id'  	 	=>	$this->makeuserId,
			'lead_id' 	   	    =>	$this->makeLeadId,
			'product_type'		=>  'Home',
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
			'lms_premium' 	=> $this->input->get_post('lms_est_premium'),
			//'lms_premium' 	=> $this->input->get_post('lms_est_premium'),
			'created_by'=> $this->session->userdata('emp_id'),
			'hme_sum_insured_provided' 	=> json_encode($providedJsonData)
 		);
		
 		$this->db->set($productData)->insert('tbl_product');
		
		$productId = $this->db->insert_Id();
		
		$valuesablesds = $this->input->post('hme_itm_des_val');
		$valuesablesweight = $this->input->post('hme_weight_val');
		$valuesablesiv = $this->input->post('hme_SI_val');
	
		for($v=0;$v<count($valuesablesds);$v++){
			$firstdesvalue = $valuesablesds[$v];
			if(!empty($firstdesvalue)){
			$valuableData = array(
					'customer_id'  	=> $this->makeuserId,
					'lead_id' 	   	=> $this->makeLeadId,
					'hme_itm_des'	=> $valuesablesds[$v],
					'hme_weight'	=> $valuesablesweight[$v],
					'hme_SI'		=> $valuesablesiv[$v],
					'status'		=> 1,
					'created_by'	=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($valuableData,'tbl_valuable_details');
			}
		}
		
		$hme_itm_des_PEEArray = $this->input->get_post('hme_itm_des_PEE');
		$hme_make_PEEArray = $this->input->get_post('hme_make_PEE');
		$hme_mdl_PEEArray = $this->input->get_post('hme_mdl_PEE');
		$hme_yom_PEEArray = $this->input->get_post('hme_yom_PEE');
		$hme_imei_PEEcArray = $this->input->get_post('hme_imei_PEE');
		$hme_SI_PEEArray = $this->input->get_post('hme_SI_PEE');
		
		for($pe=0;$pe<count($hme_itm_des_PEEArray);$pe++){
			if($hme_itm_des_PEEArray[$pe] != ''){
				$peeData = array(
					'customer_id'  	=> $this->makeuserId,
					'lead_id' 	   	=> $this->makeLeadId,
					'hme_itm_des'	=> $hme_itm_des_PEEArray[$pe],
					'hme_make'		=> $hme_make_PEEArray[$pe],
					'hme_model'		=> $hme_mdl_PEEArray[$pe],
					'hme_YOM'		=> $hme_yom_PEEArray[$pe],
					'hme_IMEI'		=> $hme_imei_PEEcArray[$pe],
					'hme_SI'		=> $hme_SI_PEEArray[$pe],
					'status'		=> 1,
					'created_by'	=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($peeData,'tbl_pee_details');
			}
		}
		
		$hme_long_desArray = $this->input->get_post('hme_long_des');
		$hme_assets_damageArray = $this->input->get_post('hme_assets_damage');
		$hme_cause_lossArray = $this->input->get_post('hme_cause_loss');
		$hme_ins_placeArray = $this->input->get_post('hme_ins_place');
		$hme_policy_yrArray = $this->input->get_post('hme_policy_yr');
		$hme_ins_claimArray = $this->input->get_post('hme_ins_claim');
		$hme_loss_amtArray = $this->input->get_post('hme_loss_amt');

		for($pr=0;$pr<count($hme_long_desArray);$pr++){
			if($hme_long_desArray[$pr] != ''){
				$claimData = array(
					'customer_id'  		=> $this->makeuserId,
					'lead_id' 	   		=> $this->makeLeadId,
					'hme_long_des'		=> $hme_long_desArray[$pr],
					'hme_assets_damage'	=> $hme_assets_damageArray[$pr],
					'hme_cause_loss'	=> $hme_cause_lossArray[$pr],
					'hme_ins_place'		=> $hme_ins_placeArray[$pr],
					'hme_policy_yr'		=> $hme_policy_yrArray[$pr],
					'hme_ins_claim'		=> $hme_ins_claimArray[$pr],
					'hme_loss_amt'		=> $hme_loss_amtArray[$pr],
					'status'			=> 1,
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$medicalHistoryId = $this->Lms_car_model->insertDataCommon($claimData,'tbl_claim_details');
			}
		}

		if(isset($productId)){
		 	$this->lmsHomeProposalDetails();
		 	return true;
		} else{
		   return false;
		}

	}


	public function lmsHomeProposalDetails(){
		
		$policyStartDate = $this->input->get_post('home_pro_policy_sdate');
		 $makeleadid = $this->makeLeadId;
		 $thisuserId = $this->makeuserId;
		 $toDayDate = date('d-m-Y');
		 $strStart = strtotime(Date($policyStartDate));
		 $strEnd   = strtotime($toDayDate); 
		 
			$proposalData = array(
				'customer_id'  	 	=> $thisuserId,
				'lead_id' 	   	    => $makeleadid,
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

			if($this->input->get_post('home_pro_nname')!="" && $this->input->get_post('home_pro_nomie_relation')!="" && $this->input->get_post('home_pro_nomie_age')!=""){
				$nomineeData = array(
					'customer_id'  	 	=> $thisuserId,
					'lead_id' 	   	    => $makeleadid,
					'nominee_name'		=> $this->input->get_post('home_pro_nname'),
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
				'lead_id'	=> $makeleadid,
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			
			$this->db->set($commentData)->insert('tbl_comments');
		}
		
		$this->Useractivity->getInsertHistory(array(
		'emp_id' => $this->session->userdata('emp_id'),
		'leadId' => $makeleadid,
		'type' => 1
		));

		$thisCommentId = $this->db->insert_Id();
	    if($thisCommentId){

				$dataReturn['status'] = true;
				$dataReturn['message'] = $this->leadApplicationnumber;

		} else {

		   		$dataReturn['status'] = false;
				$dataReturn['message'] = $this->leadApplicationnumber;

		}
		
		echo json_encode($dataReturn);
  	}


	public function lmsHomeUpdateProductDetails(){
		
		$valuablescheck = 0;
		$peecheck = 0;
		$structurecheck = 0;
		
		$hmprovided = $this->input->get_post('hme_sum_insured_provided');
		if(!empty($hmprovided)){
		if(in_array('valuables',$this->input->get_post('hme_sum_insured_provided'))){
			$valuablescheck = 1;
		}
		if(in_array('SIM_PEE',$this->input->get_post('hme_sum_insured_provided'))){
			$peecheck = 1;
		}
		if(in_array('structure',$this->input->get_post('hme_sum_insured_provided'))){
			$structurecheck = 1;
		}
	}
		$providedJsonData = array(
					'valuables'=>$valuablescheck,
					'pee'=>$peecheck,
					'structure'=>$structurecheck
					);
		//$providedJsonData = array('valuables'=>$this->input->get_post('hme_checked_valuables'),'pee'=>$this->input->get_post('hme_checked_SIM_PEE'),'structure'=>$this->input->get_post('hme_checked_SIM_structure'));

		$productUpdateData = array(
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
			'Home_plans'=> $this->security->xss_clean($this->input->get_post('Home_plans')),
			'Home_policy_start'=> $this->security->xss_clean($this->input->get_post('Home_policy_start')),
			'Home_policy_end' => $this->security->xss_clean($this->input->get_post('Home_policy_end')),
			'hme_building_type'=> $this->security->xss_clean($this->input->get_post('hme_building_type')),
            'hme_property_ownership'=> $this->security->xss_clean($this->input->get_post('hme_property_ownership')),
            'hme_property_type'=> $this->security->xss_clean($this->input->get_post('hme_property_type')),
            'hme_previous_claims'=> $this->security->xss_clean($this->input->get_post('hme_previous_claims')),
            'hme_no_of_floors'=> $this->security->xss_clean($this->input->get_post('hme_no_of_floors')),
            'hme_year_of_construction'=> $this->security->xss_clean($this->input->get_post('hme_year_of_construction')),
            'hme_independent_house' => $this->security->xss_clean($this->input->get_post('hme_independent_house')),
            'hme_compound_wall' => $this->security->xss_clean($this->input->get_post('hme_compound_wall')),
            'hme_build_up' => $this->security->xss_clean($this->input->get_post('hme_build_up')),
            'hme_risk_address_same' => $this->security->xss_clean($this->input->get_post('hme_risk_address_same')),
            'hme_risk_address1' => $this->security->xss_clean($this->input->get_post('hme_risk_address1')),
            'hme_risk_address2' => $this->security->xss_clean($this->input->get_post('hme_risk_address2')),
            'hme_risk_area' => $this->security->xss_clean($this->input->get_post('hme_risk_area')),
            'hme_risk_pincode' => $this->security->xss_clean($this->input->get_post('hme_risk_pincode')),
            'hme_risk_state' => $this->security->xss_clean($this->input->get_post('hme_risk_state')),
            'hme_risk_city' => $this->security->xss_clean($this->input->get_post('hme_risk_city')),
            'hme_risk_nearest_land_mark' => $this->security->xss_clean($this->input->get_post('hme_risk_nearest_land_mark')),
			'sum_insured' => $this->security->xss_clean($this->input->get_post('hme_sum_insured')),
			'lms_premium' => $this->security->xss_clean($this->input->get_post('lms_est_premium')),
			'hme_sum_insured_provided' 	=> json_encode($providedJsonData),
 		);

		#$lmsEditProductId =  $this->input->get_post('lms_edit_product_id');
		#$productId = $this->Lms_car_model->updateDataCommon($productUpdateData,'tbl_product','product_id',$lmsEditProductId);
		#$producttblArray = array( 'product_id' => '(SELECT product_id FROM tbl_product WHERE lead_id = "'.$this->makeLeadId.'")');
		$productId  = $this->db->set( $productUpdateData )->where( 'lead_id', $this->makeLeadId )->update('tbl_product');

		$valuesablesds = $this->input->post('hme_itm_des_val');
		$valuesablesweight = $this->input->post('hme_weight_val');
		$valuesablesiv = $this->input->post('hme_SI_val');
		$checkvalu_update_id = $this->input->post('valu_update_id');
		
		if($valuablescheck == 1){

		for($i = 0; $i<count($valuesablesds); $i++ ){
		
			$lmsEditvaluableId =  $checkvalu_update_id[$i];
			if($lmsEditvaluableId != ''){
			//if($valuesablesds[$i] != ''){
				$valuableUpdateData = array(
					'hme_itm_des'	=> $valuesablesds[$i],
					'hme_weight'	=> $valuesablesweight[$i],
					'hme_SI'		=> $valuesablesiv[$i],
					'status'		=> 1,
				);
				
				 $this->Lms_car_model->updateDataCommon($valuableUpdateData,'tbl_valuable_details','valuable_id',$lmsEditvaluableId);
				//}
			} else {	
			
				if($valuesablesds[$i] != ''){
					$valuableData = array(
						'lead_id'       => $this->makeLeadId,
						'hme_itm_des'	=> $valuesablesds[$i],
						'hme_weight'	=> $valuesablesweight[$i],
						'hme_SI'		=> $valuesablesiv[$i],
						'status'		=> 1,
						'created_by'	=> $this->session->userdata('emp_id'),	
					);
					$this->db->set($valuableData)->set(array( 'customer_id' => '(SELECT customer_id FROM tbl_lead where lead_id = "'.$this->makeLeadId.'")'),'',false)->insert( 'tbl_valuable_details' );
					#$this->Lms_car_model->insertDataCommon($valuableData,'tbl_valuable_details');
				}
			}	

		}
		
		} else {
			
			$this->db->set('status',0)->where('lead_id',$this->session->userdata('lmsEditLeadId'))->update('tbl_valuable_details');
		}
		

		$hme_itm_des_PEEArray = $this->input->get_post('hme_itm_des_PEE');
		$hme_make_PEEArray = $this->input->get_post('hme_make_PEE');
		$hme_mdl_PEEArray = $this->input->get_post('hme_mdl_PEE');
		$hme_yom_PEEArray = $this->input->get_post('hme_yom_PEE');
		$hme_imei_PEEcArray = $this->input->get_post('hme_imei_PEE');
		$hme_SI_PEEArray = $this->input->get_post('hme_SI_PEE');
		$pee_update_idArray = $this->input->get_post('pee_update_id');
		
		if($peecheck == 1){
		
			for($i = 0; $i<count($hme_itm_des_PEEArray); $i++ ){
			
			$lmsEditPeeId =  $pee_update_idArray[$i];

			if($lmsEditPeeId != ''){

				//if($hme_itm_des_PEEArray[$i] != ''){

					$peeUpdateData = array(
					
						'hme_itm_des'	=> $hme_itm_des_PEEArray[$i],
						'hme_make'		=> $hme_make_PEEArray[$i],
						'hme_model'		=> $hme_mdl_PEEArray[$i],
						'hme_YOM'		=> $hme_yom_PEEArray[$i],
						'hme_IMEI'		=> $hme_imei_PEEcArray[$i],
						'hme_SI'		=> $hme_SI_PEEArray[$i],
						'status'		=> 1

					);

				//}

				 $this->Lms_car_model->updateDataCommon($peeUpdateData,'tbl_pee_details','pee_id',$lmsEditPeeId);
			
			} else {

				if($hme_itm_des_PEEArray[$i] != ''){

					$peeData = array(
						'lead_id'   	=> $this->makeLeadId,
						'hme_itm_des'	=> $hme_itm_des_PEEArray[$i],
						'hme_make'		=> $hme_make_PEEArray[$i],
						'hme_model'		=> $hme_mdl_PEEArray[$i],
						'hme_YOM'		=> $hme_yom_PEEArray[$i],
						'hme_IMEI'		=> $hme_imei_PEEcArray[$i],
						'hme_SI'		=> $hme_SI_PEEArray[$i],
						'status'		=> 1,
						'created_by'	=> $this->session->userdata('emp_id'),	
					);
					#$this->Lms_car_model->insertDataCommon($peeData,'tbl_pee_details');

					$this->db->set($peeData)->set(array('customer_id'=>'(SELECT customer_id FROM tbl_lead where lead_id = "'.$this->makeLeadId.'")'),'',false)->insert('tbl_pee_details');
				}
			}	
		}
		
		} else {
			
			$this->db->set('status',0)->where('lead_id',$this->session->userdata('lmsEditLeadId'))->update('tbl_pee_details');
			
		}

		$hme_long_desArray = $this->input->get_post('hme_long_des');
		$hme_assets_damageArray = $this->input->get_post('hme_assets_damage');
		$hme_cause_lossArray = $this->input->get_post('hme_cause_loss');
		$hme_ins_placeArray = $this->input->get_post('hme_ins_place');
		$hme_policy_yrArray = $this->input->get_post('hme_policy_yr');
		$hme_ins_claimArray = $this->input->get_post('hme_ins_claim');
		$hme_loss_amtArray = $this->input->get_post('hme_loss_amt');
		$pre_claim_update_idArray = $this->input->get_post('pre_claim_update_id');

		for($i = 0; $i < count($hme_long_desArray); $i++ ){
			
			$lmsEditClaimId =  $pre_claim_update_idArray[$i];

			if($lmsEditClaimId != ''){

					$claimUpdateData = array(
						'hme_long_des'		=> $hme_long_desArray[$i],
						'hme_assets_damage'	=> $hme_assets_damageArray[$i],
						'hme_cause_loss'	=> $hme_cause_lossArray[$i],
						'hme_ins_place'		=> $hme_ins_placeArray[$i],
						'hme_policy_yr'		=> $hme_policy_yrArray[$i],
						'hme_ins_claim'		=> $hme_ins_claimArray[$i],
						'hme_loss_amt'		=> $hme_loss_amtArray[$i],
						'status'			=> 1
					);

				 $this->Lms_car_model->updateDataCommon($claimUpdateData,'tbl_claim_details','claim_id',$lmsEditClaimId);
			
			} else {

				if($hme_long_desArray[$i] != ''){

					$claimData = array(
						'lead_id'   		=> $this->makeLeadId,
						'hme_long_des'		=> $hme_long_desArray[$i],
						'hme_assets_damage'	=> $hme_assets_damageArray[$i],
						'hme_cause_loss'	=> $hme_cause_lossArray[$i],
						'hme_ins_place'		=> $hme_ins_placeArray[$i],
						'hme_policy_yr'		=> $hme_policy_yrArray[$i],
						'hme_ins_claim'		=> $hme_ins_claimArray[$i],
						'hme_loss_amt'		=> $hme_loss_amtArray[$i],
						'status'			=> 1,
						'created_by'		=> $this->session->userdata('emp_id'),	
					);
					#$medicalHistoryId = $this->Lms_car_model->insertDataCommon($claimData,'tbl_claim_details');
					$this->db->set($claimData)->set(array('customer_id'=>'(SELECT customer_id FROM tbl_lead where lead_id = "'.$this->makeLeadId.'")'),'',false)->insert('tbl_claim_details');
				}
			}	
		}

		if($productId){
		 	$this->lmsHomeUpdateProposalDetails();
		}
	}

	public function lmsHomeUpdateProposalDetails(){
		
		$policyStartDate = $this->input->get_post('home_pro_policy_sdate');
		
		 $toDayDate = date('d-m-Y');
		 $strStart = strtotime(Date($policyStartDate));
		 $strEnd   = strtotime($toDayDate); 
		 
		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by' => $this->session->userdata('emp_id'),
			'updated_on' => date("Y-m-d G:i:s")
		);
		
		$lead_id = $this->makeLeadId;
		$thisDetetials = $this->Lms_car_model->getLeadProductTypeByLeadID($lead_id);
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
		$this->db->set( $proposalUpdateData )->where('lead_id',$this->makeLeadId)->update( 'tbl_propsal' );

		$nomineeUpdateData = array(
			'nominee_name'		=> $this->input->get_post('home_pro_nname'),
			'nominee_age' 		=> $this->input->get_post('home_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('home_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('home_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('home_pro_appoint_relation')
 		);
			
		$this->db->set( $nomineeUpdateData )->where('lead_id',$this->makeLeadId)->update( 'tbl_nominee' );

		$commentDatas = $this->input->get_post('lms_car_comment');
		if(!empty($commentDatas)){
			
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('lmsEditLeadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
			
			$this->db->set($commentData)->insert('tbl_comments');
		}	
	
	    if(isset($leadUpdateChange)){
			
			$this->Useractivity->getInsertHistory(array(
			'emp_id' => $this->session->userdata('emp_id'),
			'leadId' => $lead_id,
			'type' => 2
			));
			
			$dataReturn['status'] = true;
			$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
			
		} else{
			
			$dataReturn['status'] = false;
		   	$dataReturn['message'] = $thisDetetials[0]->lead_application_id;
		}

		echo json_encode($dataReturn);
 }



 public function lmsHomeScriptQuery(){

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

 public function getCreathomeLead(){
	 	try{
	 		if($_SERVER['REQUEST_METHOD'] != "POST"){
	 			redirect('user','refresh');
	 			die();
	 		}

	 		$inputPostData = $this->input->post();

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
			'temp_LE'           => $this->security->xss_clean($inputPostData['lms_cus_tle']),
			'business_type'	    => $this->security->xss_clean($inputPostData['lms_cus_tbusins']),
			'created_by'        => $this->session->userdata('emp_id'),
			);

			$this->db->set($customerData)->insert( 'tbl_customer' );
			$customerInsertId = $this->db->insert_Id();
			$this->makeuserId = $customerInsertId;
			$applicationNumber = $this->Lms_car_model->generateApplicationNumber();
			$this->leadApplicationnumber = $applicationNumber;
			$subChannel="";
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
			$leadDataInsert = array(
				'category'=> $this->security->xss_clean($inputPostData['lms_car_category']),
				'line_of_business'=> $this->security->xss_clean($inputPostData['lms_car_line_of_business']),
				'priority' => $this->security->xss_clean($inputPostData['lms_car_sub_channel']),
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
				'created_by' => $this->session->userdata('emp_id'),
				'vision_address' => $vision_address_name,
				'lead_status'=>"9999",
				'created_on' => date("Y-m-d G:i:s"),
				'lead_status' => 'Lead Generated'

			);

			$this->db->set( $leadDataInsert )->insert( 'tbl_lead' );
			$insertleadId = $this->db->insert_Id();
			$this->makeLeadId = $insertleadId;
			$this->lmsHomeProductDetails();
	 		return;

	 	} catch(Exception $error){

	 	}
 }
 
 public function getUpdateHomedatainformation(){
	 try{
		 
		 if($_SERVER['REQUEST_METHOD'] != 'POST'){
		 	redirect('user','refresh');
		 	die();
		 }
		$this->makeLeadId = $this->security->xss_clean($this->input->post('lead_id'));
		$personalDetailsCheck = $this->Home_model->homeUpdateCustomerDetails( $this->makeLeadId );

		//if($personalDetailsCheck['status']){
			$this->lmsHomeUpdateProductDetails();
		//}
		
	 } catch(Exception $error){
	 }
 }

}

?>		