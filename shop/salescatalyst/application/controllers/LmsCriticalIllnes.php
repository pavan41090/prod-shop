<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsCriticalIllnes extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');

		
	}

	public function createLmsCritical(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads';
			$this->data['sub_module'] = 'Critical Illnes'; 

			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
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

			// $userTypeId = $this->session->userdata('usr_type_id');
			// $this->data['prdt_privilage'] = $this->User_model->get_prdt_privilages($userTypeId);
			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	
			
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_critical',$this->data);
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
			'lms_premium'  => $this->input->get_post('lms_premium'),
			
			'ship_spouse_include'=> $this->input->get_post('spouse_CI'),
			'ship_spouse_dob'=> $this->input->get_post('CI_spouse_dob'),
			'ship_no_of_children'=> $this->input->get_post('no_of_childrens'),
			'created_by'=> $this->session->userdata('emp_id'),
 		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
	}




	public function lmsCiProposalDetails(){

		$proposalData = array(
			'customer_id'  	 		=>$this->session->userdata('customerId'),
			'lead_id' 	   	    	=>$this->session->userdata('leadId'),
			'existing_insure'		=> '',
			'existing_policy_num' 	=> '',
			'existing_policy_expiry'=> '',
			'new_policy_start' 		=> $this->input->get_post('ctill_pro_policy_sdate'),
			'prop_mtr_reg_date' 	=> '',
			'prop_mtr_regi_num' 	=> '',
			'prop_mtr_engine_num' 	=> '',
			'prop_mtr_chasis_num'	=> '',
			'prop_mtr_financed' 	=> '',
			'sship_pro_height' 		=> '',
			'sship_pro_Weight'		=> '',
			'ship_primary_insured'	=> $this->input->get_post('ctill_tax_primary_insured'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);
		$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');


		$nomineeData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('ctill_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('ctill_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('ctill_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('ctill_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('ctill_pro_appoint_relation'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);

		$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');


                // "": $scope.ctill_tax_primary_insured,
                // "": $scope.ctill_tax_your_name,
                // "": $scope.ctill_tax_primary_relation,




		for($x = 1; $x<5; $x++ ){

			if($this->input->get_post('self_salut'.$x) != ''){
				switch ($x) {
					case '1': $mem_type = 'Self'; 	break;
					case '2': $mem_type = 'Spouse'; break;
					case '3': $mem_type = 'Child 1'; break;
					case '4': $mem_type = 'Child 2'; break;
					default:  $mem_type = 'Self'; 	break;
				}

				$memberData = array(
					
					'customer_id'  	=>$this->session->userdata('customerId'),
					'lead_id' 	   	=>$this->session->userdata('leadId'),

					'mem_type'			=> $mem_type,
					'mem_title'			=> $this->input->get_post('self_salut'.$x),
					'mem_first_name'	=> $this->input->get_post('self_lname'.$x),
					'mem_last_name'		=> $this->input->get_post('self_lname'.$x),
					'mem_DOB'			=> $this->input->get_post('self_dob'.$x),
					'mem_relashionship'	=> $mem_type,
									
					'option_1'		=> $this->input->get_post('suffered'.$x),
					'option_2' 		=> $this->input->get_post('sonography'.$x),
					'option_3'		=> $this->input->get_post('surgery'.$x),
					'option_4'  	=> $this->input->get_post('medication'.$x),
					'option_5' 		=> $this->input->get_post('patient'.$x),
					'option_6'		=> $this->input->get_post('breathing'.$x),
					'option_7'   	=> $this->input->get_post('illness'.$x),
					'option_8' 		=> $this->input->get_post('prosemi'.$x),
			
				);
				$this->Lms_car_model->insertDataCommon($memberData,'tbl_prop_options');
			}
		}//for loop ends here..		


		if($this->input->get_post('lms_car_comment') != ''){
			$commentData = array(
				'comment'	=> $this->input->get_post('lms_car_comment'),
				'lead_id'	=> $this->session->userdata('leadId'),
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by'=> date("Y-m-d G:i:s"),
			);
			$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
		}



		if( $this->input->get_post('ctill_tax_your_name') != ''){
			$primaryInsuredData = array(
				'customer_id'  		=> $this->session->userdata('customerId'),
				'lead_id' 	   		=> $this->session->userdata('leadId'),
				'prim_name'			=> $this->input->get_post('ctill_tax_your_name'),
				'prim_relation'		=> $this->input->get_post('ctill_tax_primary_relation'),
				'prim_status'		=> '1',
				'created_by'		=> $this->session->userdata('emp_id'),	
			);
			$medicalHistoryId = $this->Lms_car_model->insertDataCommon($primaryInsuredData,'tbl_primary_insured');
		}	


	
		$leadData = array(
			'lead_status'	=> 'Lead Generated',
			'updated_by'        => $this->session->userdata('emp_id'),	
			//'updated_on'        => date("Y-m-d G:i:s"),			
		);
		$lead_id = $this->session->userdata('leadId');
	    $sship_id = $this->Lms_car_model->updateDataCommon($leadData,'tbl_lead','lead_id',$lead_id);

	    if(isset($sship_id)){
			echo $this->session->userdata('leadNumber');
		} else{
			echo "false";
		}

  }





	public function lmsProductUpdateDetails(){

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
			'lms_premium'  => $this->input->get_post('lms_premium'),
			
			'ship_spouse_include'=> $this->input->get_post('spouse_CI'),
			'ship_spouse_dob'=> $this->input->get_post('CI_spouse_dob'),
			'ship_no_of_children'=> $this->input->get_post('no_of_childrens'),
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





	public function lmsCiProposalUpdateDetails(){

		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'        => $this->session->userdata('emp_id'),
			//'updated_on'        => date("Y-m-d G:i:s"),	
			
		);
		$lead_id = $this->session->userdata('lmsEditLeadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);

		$proposalUpdateData = array(
			//'customer_id'  	 		=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    	=>$this->session->userdata('leadId'),
			'existing_insure'		=> '',
			'existing_policy_num' 	=> '',
			'existing_policy_expiry'=> '',
			'new_policy_start' 		=> $this->input->get_post('ctill_pro_policy_sdate'),
			'prop_mtr_reg_date' 	=> '',
			'prop_mtr_regi_num' 	=> '',
			'prop_mtr_engine_num' 	=> '',
			'prop_mtr_chasis_num'	=> '',
			'prop_mtr_financed' 	=> '',
			'sship_pro_height' 		=> '',
			'sship_pro_Weight'		=> '',
			'ship_pre_insurer'		=> $this->input->get_post('pre_ins_portability'),
			'ship_primary_insured'	=> $this->input->get_post('ship_tax_primary_insured'),

			'created_by'			=> $this->session->userdata('emp_id'),
		);
		//$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');
		$lmsEditProposalId =  $this->input->get_post('lms_edit_proposal_id');
		$this->Lms_car_model->updateDataCommon($proposalUpdateData,'tbl_propsal','propsal_id',$lmsEditProposalId);


		$nomineUpdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'nominee_name'		=> $this->input->get_post('ctill_pro_nomie_name'),
			'nominee_age' 		=> $this->input->get_post('ctill_pro_nomie_age'),
			'nominee_relationship'	=> $this->input->get_post('ctill_pro_nomie_relation'),
			'appointee_name' 		=> $this->input->get_post('ctill_pro_nameofappoint'),
			'appointee_relationship'	=> $this->input->get_post('ctill_pro_appoint_relation'),
			'created_by'			=> $this->session->userdata('emp_id'),
		);

			//$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');
		$lmsEditNomineeId =  $this->input->get_post('lms_edit_nominee_id');
		$this->Lms_car_model->updateDataCommon($nomineUpdateData,'tbl_nominee','nominee_id',$lmsEditNomineeId);


		// $optionsUpdateData = array(
		// 	//'customer_id'	=> $this->session->userdata('customerId'),
		// 	//'lead_id' 	   	=> $this->session->userdata('leadId'),
		// 	'option_1'		=> $this->input->get_post('ctill_pro_suffered'),
		// 	'option_2' 		=> $this->input->get_post('ctill_pro_Sonography'),
		// 	'option_3'		=> $this->input->get_post('ctill_pro_surgery'),
		// 	'option_4'   	=> $this->input->get_post('ctill_pro_medication'),
		// 	'option_5' 		=> $this->input->get_post('ctill_pro_Patient'),
		// 	'option_6'		=> $this->input->get_post('ctill_pro_breathing'),
		// 	'option_7'   	=> $this->input->get_post('ctill_pro_illness'),
		// 	'option_8' 		=> $this->input->get_post('ctill_pro_prosemi'),
		// );
		// //$driverId = $this->Lms_car_model->insertDataCommon($optionData,'tbl_prop_options');
		
		// $lmsEditOptionId =  $this->input->get_post('lms_edit_option_id');
		// $lmsEditOptionId = $this->Lms_car_model->updateDataCommon($optionsUpdateData,'tbl_prop_options','option_id',$lmsEditOptionId);



		for($i = 1; $i<5; $i++) {

			if($this->input->get_post('salut_mem'.$i) !== '') {
				$optionsUpdateData = array(
					'mem_title'		=> 	$this->input->get_post('salut_mem'.$i),	
					'mem_first_name'=> 	$this->input->get_post('fname_mem'.$i),	
					'mem_last_name'	=> 	$this->input->get_post('lname_mem'.$i),
					'mem_DOB'		=> 	$this->input->get_post('dob_mem'.$i),
					// 'mem_height'	=> $this->input->get_post('height_mem'.$i),
					// 'mem_weight'	=> $this->input->get_post('weight_mem'.$i),
					// 'mem_gender'	=>	$this->input->get_post('gender_mem'.$i),
					// 'mem_ocupation'	=> $this->input->get_post('occupation_mem'.$i),
					// 'mem_age'		=> '',
					// 'delivery_date'	=> $this->input->get_post('delivery_date_mem'.$i), 
					// 'smoke'			=> $this->input->get_post('smoke_mem'.$i),
					// 'alcohol'		=> $this->input->get_post('alcohol_mem'.$i),
					// 'pan_masala'	=> $this->input->get_post('pan_masala_mem'.$i),	
					// 'others'		=> $this->input->get_post('others_mem'.$i),
					'option_1'		=> $this->input->get_post('ship_suffered_mem'.$i),
					'option_2' 		=> $this->input->get_post('ship_diseases_mem'.$i),
					'option_3'		=> $this->input->get_post('ship_psychiatric_mem'.$i),
					'option_4'  	=> $this->input->get_post('ship_medication_mem'.$i),
					'option_5' 		=> $this->input->get_post('ship_fibroid_mem'.$i),
					'option_6'		=> $this->input->get_post('ship_cyst_mem'.$i),
					'option_7'   	=> $this->input->get_post('ship_bltest_mem'.$i),
					// 'option_8' 		=> $this->input->get_post('ship_diabetes_mem'.$i),
					// 'option_9'		=> $this->input->get_post('ship_pregnant_mem'.$i),
					// 'option_10'   	=> $this->input->get_post('ship_treatment_mem'.$i),
					// 'option_11' 	=> $this->input->get_post('ship_gutka_mem'.$i),
				);

				//print_r($optionsUpdateData);


				$lmsEditOptionId =  $this->input->get_post('edit_option_id'.$i);
				//echo 'update_id'.$lmsEditOptionId; 
				$this->Lms_car_model->updateDataCommon($optionsUpdateData,'tbl_prop_options','option_id',$lmsEditOptionId);
			}
		}



			$editPrimInsId =  $this->input->get_post('edit_prim_ins_id');
			if($editPrimInsId !== ''){

			//if( $this->input->get_post('edit_prim_ins_id') != ''){

				$primaryInsuredUpdateData = array(
					'prim_title'		=> $this->input->get_post('ship_tax_salut'),
					'prim_name'			=> $this->input->get_post('ship_tax_your_name'),
					'prim_relation'		=> $this->input->get_post('ship_tax_primary_relation'),
					
				);

				$this->Lms_car_model->updateDataCommon($primaryInsuredUpdateData,'tbl_primary_insured','prim_ins_id',$editPrimInsId);
				
			} else {

				$primaryInsuredNewData = array(
					'customer_id'  		=> $this->session->userdata('customerId'),
					'lead_id' 	   		=> $this->session->userdata('leadId'),
					'prim_title'		=> $this->input->get_post('ship_tax_salut'),
					'prim_name'			=> $this->input->get_post('ship_tax_your_name'),
					'prim_relation'		=> $this->input->get_post('ship_tax_primary_relation'),
					'prim_status'		=> '1',
					'created_by'		=> $this->session->userdata('emp_id'),	
				);
				$this->Lms_car_model->insertDataCommon($primaryInsuredNewData,'tbl_primary_insured');
			}	




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
	


	    if(isset($lmsEditOptionId)){
			echo $this->session->userdata('lmsEditApplicationId');
		} else{
			echo "false";
		}
  	}


//script query function
public function lmsCIScriptQuery()
  {

  	 if ($this->session->userdata('logged_in') == TRUE) {
		$this->data['sub_module']='Home';
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