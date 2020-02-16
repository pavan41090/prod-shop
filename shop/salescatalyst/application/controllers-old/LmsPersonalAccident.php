<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class LmsPersonalAccident extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');
		
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


	public function lmsPaProductDetails(){

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
			
			'gainful'=> '',
			'sum_insured' => $this->input->get_post('sum_insured'),
			'lms_premium' => $this->input->get_post('lms_premium'),
			//'created_by'=> $this->session->userdata('emp_id'),
 		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
	}



	public function lmsPaProposalDetails(){
		
		
		$policyStartDate = $this->input->get_post('pa_pro_policy_sdate');
		
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
				'lead_id'	=> $this->session->userdata('leadId'),
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
			
		$lead_id = $this->session->userdata('leadId');
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
		if(isset($productId)){
		 	echo "success";
		} else{
		   echo "false";
		}
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


}?>		