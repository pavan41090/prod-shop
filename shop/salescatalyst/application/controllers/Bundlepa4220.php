<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Bundlepa extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        if($this->session->userdata('logged_in') == TRUE) {
            $this->data['sub_module'] = 'Bundle Lead PA'; 
            $this->data['module'] = 'leads'; 
			$this->data['desName'] = $this->session->userdata('des_name');
			$this->data['desId'] = $this->session->userdata('des_id');
			$this->data['userType'] = $this->session->userdata('user_type');
			$this->data['userTypeAbbr'] = $this->session->userdata('user_type_abbr');
            $this->data['businessArray'] = $this->Common_model->typebusiness();
            $this->data['salutationArray'] = $this->Common_model->customerSalutation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['languageArray'] = $this->Common_model->language();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();
            $this->data['userDetails'] = $this->User_model->getLoginDetails();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight;
            $this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_pa_bundle',$this->data);
			$this->load->view('layout/footer_inner');
            
        } else {
			redirect('user', 'refresh');
		}
    }

    public function getSum(){
        $this->_getSum();
    }

    private function _getSum(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
           $errorResponce = $this->Bundlemodel->getSummodel();
        } else {
            $errorResponce['status'] = false;
            $errorResponce['message'] = "404 Error Page";
        }
        echo json_encode($errorResponce);
    }

    public function getInsertData(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $responceData = $this->_getInsertData();
        } else {
            $responceData['status'] = false;
            $responceData['message'] = "404 Error Page";
        }
        echo json_encode($responceData);
    }

    private function _getInsertData(){
       return $this->Bundlemodel->getInsertCommandbundle();
    }

}
