<?php

ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Motor extends CI_Controller {

	private $column_search;

	public function __construct()
	{
	    parent::__construct();
		error_reporting(0);
		$this->column_search = array('motor_application_number','motor_category','motor_employee_code','motor_sm_name','motor_sm_code','motor_customer_name',
			'motor_aaa_number','motor_vehicle_type','motor_register_number','motor_city_registration');
		$userLogin = $this->session->userdata('logged_in');
		date_default_timezone_set('Asia/Kolkata');
		if (empty($userLogin)) {
			redirect(base_url(),'refresh');
		}
	}

	public function index(){

			$thiswheelquote = $this->db->select('*')->from('tbl_motor')->where('motor_sno',$this->uri->segment(2))->get()->row_object();
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

			$this->data['leadDataing'] = $thiswheelquote;
			$this->data['prdt_privilage']  = $userRight;
            $this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_motorlead',$this->data);
		
	}

	public function getCreateLead(){
		$this->_getCreateLead();
		return false;
	}

	private function generateApplicationNumber(){

        $row = $this->db->query('SELECT MAX(motor_sno) AS `maxid` FROM `tbl_motor`')->row();
        if ($row) {
            $maxid = $row->maxid;   
        } else {
            $maxid = 1;
        }

        return 'BAGI'.date('Ymd').$maxid;
        exit(); 

    }

	private function _getCreateLead(){


		if($this->session->userdata('logged_in') == TRUE) {
		$thispost = $this->input->post();

			$applicationNumber = $this->generateApplicationNumber();

			$inputData['motor_category'] = $thispost['lms_car_category'];
			$inputData['motor_employee_code'] = $thispost['empcode'];
			$inputData['motor_sm_name'] = $thispost['smname'];
			$inputData['motor_sm_code'] = $thispost['smcode'];
			$inputData['motor_customer_name'] = $thispost['customername'];
			$inputData['motor_aaa_number'] = $thispost['aannumber'];
			$inputData['motor_vehicle_type'] = $thispost['vehicletype'];
			$inputData['motor_register_number'] = $thispost['regno'];
			$inputData['motor_city_registration'] = $thispost['lms_two_wheeler_city_registration'];
			$inputData['motor_expire_date'] = $thispost['polexpdate'];
			$inputData['motor_previous_ncb'] = $thispost['prencb'];
			$inputData['motor_previous_company'] = $thispost['preinscomp'];

			if(empty($thispost['motorSno'])){

				$inputData['motor_application_number'] = $applicationNumber;
				$inputData['motor_added_by'] = $this->session->userdata('emp_id');
				$this->db->insert('tbl_motor',$inputData);

				$statusUpdate['status'] = true;
				$statusUpdate['update'] = false;

			} else {

				$this->db->set($inputData)->where('motor_sno',$thispost['motorSno'])->update('tbl_motor');
				$statusUpdate['status'] = true;
				$statusUpdate['update'] = true;

			}

			echo json_encode($statusUpdate);

		} else {

			redirect(base_url());
			return false;
		}

	}

	public function getDatamotordashboard(){
		$this->_getDatamotordashboard();		
	}

	private function _getDatamotordashboard(){

			$thisPost = $this->input->post();

			$inputSql = "SELECT * FROM `tbl_motor` WHERE motor_added_by = '".$this->session->userdata('emp_id')."'";
			if(!empty($thisPost['search']['value'])){

				$inputSql .= " AND ";

				foreach ($this->column_search as $item)
		        {
		            if($_POST['search']['value'])
		            {
		                 
		                $inputSql .= " ".$item." LIKE '%".$_POST['search']['value']."%' " ;

		                if(count($this->column_search) - 1 != $i) //last loop
                   		 $inputSql .= " OR ";

		            }

		            $i++;
		        }

			}

			$resultinputSql = $this->db->query($inputSql);
			$i=1;

			foreach ($resultinputSql->result() as $key => $value) {


            $detailLink = base_url().'view-lead-details/'.$lead->lead_id;
            $editLink = base_url().'regenerate-lead/'.$lead->lead_id;
            $no++;
            $row = array();
            $row[] = $i;
            $row[] = $value->motor_application_number;
            $row[] = $value->motor_category;
            $row[] = $value->motor_employee_code;
            $row[] = $value->motor_sm_name;
            $row[] = $value->motor_customer_name;
            $row[] = $value->motor_vehicle_type;
            $row[] = $value->motor_register_number;
            $row[] = '<a href="'.base_url('view-motor-lead-details/'.$value->motor_sno).'">  <button type="button" class="btn blue btn-default" > View </button></a> &nbsp; <a href="'.base_url('lms-create-update/'.$value->motor_sno).'">  <button type="button" class="btn blue btn-default" >Edit </button></a>';
    		
    		$data[] = $row;
    		$i++;
			}

		$output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => 3,
            "recordsFiltered" => 3,
            "data" => $data,
	    );
		echo json_encode($output);
	}

	public function leadViewByLeadId(){

    	
    	$leadId = $this->uri->segment(2);
    	
	   	$this->data['module'] = 'leads'; 
		$this->data['sub_module'] = 'Car';
		$this->data['title']="Lead Details"; 
	   	$this->data['leadId'] = $leadId; 

	   	$this->data['logged_user_type'] = $this->session->userdata('user_type_abbr');
		$this->data['lead_details'] = $this->Lms_car_model->getLeadDetailsByLeadId($leadId);
		
        $this->data['lead_details_edit']=$this->Lms_car_model->getLeadDetailsByLeadIdforEdit($leadId);
		$this->data['member_details'] = $this->Lms_car_model->getMemberDetailsByLeadId($leadId);
		$this->data['pre_ins_details'] = $this->Lms_car_model->getPreviousInsuranceDetailsByLeadId($leadId);
		$this->data['primary_ins_details'] = $this->Lms_car_model->getPrimaryInsuredDetailsByLeadId($leadId);
		$this->data['comment_details'] = $this->Lms_car_model->getCommentsByLeadId($leadId);
		$this->data['valuables_details'] = $this->Lms_car_model->getValuableDetailsByLeadId($leadId);
		$this->data['PEEI_details'] = $this->Lms_car_model->getPEEIDetailsByLeadId($leadId);
		$this->data['pre_claim_details'] = $this->Lms_car_model->getPreClaimDetailsByLeadId($leadId);


		$thisData = $this->db->where('lead_id',$leadId)->order_by('quote_id','DESC')->limit(1)->get('tbl_quote_reg_table')->row_object();

		$this->data['quotedetails'] = $thisData;

		$thiswheelquote = $this->db->select('*')->from('tbl_motor')->where('motor_sno',$this->uri->segment(2))->get()->row_object();
		$this->data['quoteData'] = $thiswheelquote;
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('lms_view/lms_lead_details_motor-duplicate',$this->data);
		$this->load->view('layout/footer_inner');

    
	}

	public function getDashboard(){
		
		if ($this->session->userdata('logged_in') == TRUE) {
	
		    $this->data['module'] = 'Dashboard'; 
			$this->data['sub_module'] = 'Car';
			$this->data['title']="Motor Lead List"; 
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('lms_view/lms_motor-lead_listing',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}
	}

}

?>
