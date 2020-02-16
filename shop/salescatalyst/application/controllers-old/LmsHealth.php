<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LmsHealth extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	   	$this->load->model('User_model');

		
	}

	public function createLmsHealth(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads';
			$this->data['sub_module'] = 'Health'; 

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
     		$this->data['businessTypeArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();

			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_health',$this->data);
			$this->load->view('layout/footer_inner');

	} else {
			redirect('user', 'refresh');
		}

	}	
} ?>