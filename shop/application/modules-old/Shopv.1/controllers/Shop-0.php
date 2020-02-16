<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MX_Controller {

	public function __construct(){
		parent::__construct();
	}


	public function getLeadINfo(){

	}

	public function getinfoThird(){

		if($_SERVER['REQUEST_METHOD'] == "POST"){

			$thisInput = $this->input->post();
			$valuePostArray = $thisInput['data'];
			$explodeString = explode('|', $valuePostArray);
			$plannameDis = '';
			if($explodeString[1] == 'DD19A'){
				$shopPlanName = 5;
				$plannameDis = 'Plan A';
			} else if($explodeString[1] == 'DD19B'){
				$shopPlanName = 10;
				$plannameDis = 'Plan B';
			} else if($explodeString[1] == 'DD19C'){
				$shopPlanName = 20;
				$plannameDis = 'Plan C';
			} else if($explodeString[1] == 'DD19D'){
				$shopPlanName = 35;
				$plannameDis = 'Plan D';
			}

			$dataPlanName['planName'] = $shopPlanName;
			$dataPlanName['emplyeecode'] = $explodeString[2];
			$dataPlanName['plannameDis'] = $plannameDis;
			$dataPlanName['thirdValueData'] = $valuePostArray;
			$dataPlanName['mobilenumber'] = $explodeString[3];
			session_destroy();
			$this->load->view('index',$dataPlanName);

		} else {

		}
	}

	public function index()
	{

		try{
			$db = get_instance()->db->conn_id;
			if($_SERVER['REQUEST_METHOD'] == "POST"){

				$thisinput = $this->input->post();

				$reemailid = mysqli_real_escape_string($db,$this->input->post('emailid'));
				$reemobilenumber = mysqli_real_escape_string($db,$this->input->post('mobilenumber'));
				$dataInsertion['shop_plan_name'] = mysqli_real_escape_string($db,$this->input->post('planname'));
				$this->form_validation->set_rules('planname','Select Plan Name!','trim|required');
				$dataInsertion['shop_aof_ref_number'] = mysqli_real_escape_string($db,$this->input->post('aofrefnumber'));
				$dataInsertion['shop_premises_covered'] = mysqli_real_escape_string($db,$this->input->post('premisescovered'));
				$this->form_validation->set_rules('premisescovered','Select Premises to be Covered!','trim|required');
				$dataInsertion['shop_insured_name'] = mysqli_real_escape_string($db,$this->input->post('insuredname'));
				$this->form_validation->set_rules('insuredname','Enter Insured Name','trim|required');
				$dataInsertion['shop_owner_name'] = mysqli_real_escape_string($db,$this->input->post('ownername'));
				$this->form_validation->set_rules('ownername','Enter Owners Name','trim|required');
				$dataInsertion['shop_gender'] = mysqli_real_escape_string($db,$this->input->post('gender'));
				$this->form_validation->set_rules('gender','Select Gender','trim|required');
				$dataInsertion['shop_owner_dob'] = mysqli_real_escape_string($db,$this->input->post('ownerdob'));
				$this->form_validation->set_rules('ownerdob','Enter Owners DOB','trim|required');
				$dataInsertion['shop_mobile_number'] = $reemobilenumber;
				$this->form_validation->set_rules('mobilenumber','Enter Mobile Number','trim|required');
				$dataInsertion['shop_email_id'] = $reemailid;
				$this->form_validation->set_rules('emailid','Enter Email ID','trim|required');

				$communicationData = array(
					'communicationaddress' => mysqli_real_escape_string($db,$this->input->post('communicationaddress')),
					'CommunicationCity' => mysqli_real_escape_string($db,$this->input->post('CommunicationCity')),
					'CommunicationState' => mysqli_real_escape_string($db,$this->input->post('CommunicationState')),
					'CommunicationPincode' => mysqli_real_escape_string($db,$this->input->post('CommunicationPincode'))
				);

				$risknData = array(
					'riskaddress' => mysqli_real_escape_string($db,$this->input->post('riskaddress')),
					'riskPincode' => mysqli_real_escape_string($db,$this->input->post('riskPincode')),
					'riskState' => mysqli_real_escape_string($db,$this->input->post('riskState')),
					'riskCity' => mysqli_real_escape_string($db,$this->input->post('riskCity'))
				);
				/*,
				'checkbankrecords' => mysqli_real_escape_string($db,$thistermsPost['checkbankrecords']),
				'confirmrelation' => mysqli_real_escape_string($db,$thistermsPost['confirmrelation']),
				'confirminformation' => mysqli_real_escape_string($db,$thistermsPost['confirminformation']),
				'confirmautorenewal' => mysqli_real_escape_string($db,$thistermsPost['confirmautorenewal']),*/
				
				$rmdeclarationArray = array(
				'rmdeclarationagree' => mysqli_real_escape_string($db,$thistermsPost['rmdeclarationagree'])
				);
				$dataInsertion['shop_communication_address'] = json_encode($communicationData);
				$dataInsertion['shop_resk_addresss'] = json_encode($risknData);

				$this->form_validation->set_rules('communicationaddress','Enter Communication Address','trim|required');
				$this->form_validation->set_rules('CommunicationCity','Enter Communication City','trim|required');
				$this->form_validation->set_rules('CommunicationState','Enter Communication State','trim|required');
				$this->form_validation->set_rules('CommunicationPincode','Enter Communication Pincode','trim|required');
				$dataInsertion['shop_declarations'] = json_encode($rmdeclarationArray);
				$dataInsertion['shop_same_com_resk'] = mysqli_real_escape_string($db,$this->input->post('samecommunication'));
				$dataInsertion['shop_nominee_name'] = mysqli_real_escape_string($db,$this->input->post('nomineename'));
				$this->form_validation->set_rules('nomineename','Enter Nominee Name','trim|required');
				$dataInsertion['shop_nominee_dob'] = mysqli_real_escape_string($db,$this->input->post('nomineedob'));
				$this->form_validation->set_rules('nomineedob','Enter Nominee DOB','trim|required');
				$dataInsertion['shop_created_on'] = date('Y-m-d H:i:s');
				$this->form_validation->set_rules('nomineerelation','Enter Nominee Relation','trim|required');
				$dataInsertion['shop_nominee_relation'] = mysqli_real_escape_string($db,$this->input->post('nomineerelation'));
				$dataInsertion['shop_other_data'] = mysqli_real_escape_string($db,$this->input->post('thirdValueData'));
				$dataInsertion['shop_created_ip_address'] = $this->input->ip_address();
				$customer_id_url = $this->Shopmodel->generateRandomNumber();
				$dataInsertion['shop_cus_id'] = $customer_id_url;

				if($this->form_validation->run() == FALSE){
					$returnMessage['errorStatus'] = true;
				} else {
					
					$this->db->set( $dataInsertion )->insert( TABLE_SHOP_LEAD_NUMBER );
					if($this->db->affected_rows()>0){
						$thisLastId = $this->db->insert_id();
						$this->Shopmodel->createLink($customer_id_url,$reemailid,$reemobilenumber);
						$returnMessage['status'] = true;
					} else {
						$returnMessage['status'] = false;
					}
					$returnMessage['errorStatus'] = false;
				}
				echo json_encode($returnMessage);

			} else {

				session_destroy();
				$dataPlanName['planName'] = '5';
				$this->load->view('index',$dataPlanName);
				
			}

		} catch(Excception $error){
			log_message('error','Some thing went wrong in '.__FUNCTION__.':Error name:'.json_encode($error));
		}
		
	}

	public function resendgetCustomerOtp(){
		if($_SERVER['REQUEST_METHOD'] != "POST"){
				redirect(base_url());
				exit();
			}
		 $this->getSendResenderMessage();
	}

	public function getCustomerOtp(){
		try{

			if($_SERVER['REQUEST_METHOD'] != "POST"){
				redirect(base_url());
				exit();
			}

			$db = get_instance()->db->conn_id;
			$thistermsPost = $this->input->post();
			$termsArray = array(
				'dealingaccessories' => mysqli_real_escape_string($db,$thistermsPost['dealingaccessories']),
				'termsandcondition' => mysqli_real_escape_string($db,$thistermsPost['termsandcondition']),
				'termscontent' => mysqli_real_escape_string($db,$thistermsPost['termscontent']),
				'autorenewaldata' => mysqli_real_escape_string($db,$thistermsPost['autorenewaldata']),
				'premiumPayment' => mysqli_real_escape_string($db,$thistermsPost['premiumPayment']),
			);

			$termsDataSet['shop_account_number'] = mysqli_real_escape_string($db,$thistermsPost['accountNumber']);
			$termsDataSet['shop_terms_conditions'] = json_encode($termsArray);
			$this->db->set( $termsDataSet )->where( 'shop_cus_id',$this->session->userdata('sessionCustomerVal') )->update( TABLE_SHOP_LEAD_NUMBER );
			$affectedRows = $this->db->affected_rows();
			$geneotp = $this->Shopmodel->getOtpsend();
			$dataUpdate['shop_otp_customer'] = $geneotp;
			$this->db->set($dataUpdate)->where('shop_cus_id',$this->session->userdata('sessionCustomerVal'))->update( TABLE_SHOP_LEAD_NUMBER );
			if($this->db->affected_rows()>0){
				$sttausMessage = $this->Shopmodel->getSendingOtp($geneotp);
				if($sttausMessage && $affectedRows){
					$otpStatusRes['status'] = true;
					$otpStatusRes['message'] = "A OTP has been sent to mobile and email Please check!";
					$this->session->set_userdata('customer_otp_status',true,true);
					$this->session->set_userdata('customer_otp_value',$geneotp,true);
				} else {
					$otpStatusRes['status'] = true;
					$otpStatusRes['message'] = "Something went wrong! Please try after some time!";
				}
				

			} else {
				$otpStatusRes['status'] = false;
				$otpStatusRes['message'] = "Something went wrong! Please try after some time!";
			}
			echo json_encode($otpStatusRes);
		} catch(Excception $error){
			log_message('error','Some thing went wrong in '.__FUNCTION__.':Error name:'.json_encode($error));
		}
	}

	private function getSendResenderMessage(){
		try{
			if($_SERVER['REQUEST_METHOD'] != 'POST'){
				redirect(base_url(),'refresh');
				die();
			}
			$geneotp = $this->Shopmodel->getOtpsend();
			$dataUpdate['shop_otp_customer'] = $geneotp;
			$dataUpdate['shop_otp_status'] = 0;
			$this->db->set($dataUpdate)->where('shop_cus_id',$this->session->userdata('sessionCustomerVal'))->update( TABLE_SHOP_LEAD_NUMBER );
			$affectedRows = $this->db->affected_rows();

			if( $affectedRows > 0 ){
				$sttausMessage = $this->Shopmodel->getSendingOtp($geneotp);

				if($sttausMessage && $affectedRows){
					$otpStatusRes['status'] = true;
					$otpStatusRes['message'] = "Wrong OTP entered. A new OTP has been sent to your mobile number and email id. Please enter correct OTP to proceed";
					$this->session->set_userdata('customer_otp_status',true,true);
					$this->session->set_userdata('customer_otp_value',$geneotp,true);
				} else {
					$otpStatusRes['status'] = true;
					$otpStatusRes['message'] = "Something went wrong! Please try after some time!";
				}

			}
			echo json_encode($otpStatusRes);
		} catch(Excception $error){
			log_message('error','Some thing went wrong in '.__FUNCTION__.':Error name:'.json_encode($error));
		}
	}

	public function getUser(){

		$thirdUrl = $this->uri->segment(2);
		$selectedValeus = $this->db->select('shop_plan_name,shop_aof_ref_number,shop_premises_covered,shop_insured_name,shop_owner_name,shop_gender,shop_owner_dob,shop_mobile_number,shop_email_id,shop_communication_address,shop_same_com_resk,shop_resk_addresss,shop_nominee_name,shop_nominee_dob,shop_status,shop_cus_id,shop_terms_conditions,shop_account_number,shop_otp_status,lead_order_id,shop_declarations,shop_nominee_relation,shop_other_data')->where('shop_cus_id',$thirdUrl)->get( TABLE_SHOP_LEAD_NUMBER );

		if($selectedValeus->num_rows()>0){
			$rowObject = $selectedValeus->row_object();
			if($rowObject->shop_status == 1){
				$this->session->unset_userdata('sessionCustomer');
				$this->session->unset_userdata('sessionCustomerVal');
			} else {
				$this->session->set_userdata('sessionCustomer',true,true);
				$this->session->set_userdata('sessionCustomerVal',$thirdUrl,true);
			}
			$dataMessage['information'] = $rowObject;
		}
		$this->load->view('index',$dataMessage);

	}

	public function getSubmitOtp(){
		$db = get_instance()->db->conn_id;
		if($_SERVER['REQUEST_METHOD'] == "POST"){

			$intpuOtp = $this->input->post();
			$resinputOtp = mysqli_real_escape_string($db,$intpuOtp['otpnumber']);
			
			$selectOtp = $this->db->select('shop_otp_customer')->where(
				array(
					'shop_cus_id' => $this->session->userdata('sessionCustomerVal')
				)
			)->where_in('shop_otp_status',array('0','2','4'))->get( TABLE_SHOP_LEAD_NUMBER );

			if($selectOtp->num_rows() > 0){

				$rowselectOtp = $selectOtp->row_object();

				if($rowselectOtp->status == 0){

					if($rowselectOtp->shop_otp_customer == $resinputOtp){

						$this->db->set(array('shop_otp_status'=>1,'shop_status'=>1))->where( array(
						'shop_cus_id' => $this->session->userdata('sessionCustomerVal')
						))->where_in('shop_otp_status',array('0','2','4'))->update( TABLE_SHOP_LEAD_NUMBER );

						if($this->db->affected_rows()>0){

							$leadOrderNumber = $this->Shopmodel->generateApplicationNumber();
							$this->db->set('lead_order_id',$leadOrderNumber)->where('shop_cus_id',$this->session->userdata('sessionCustomerVal'))->update( TABLE_SHOP_LEAD_NUMBER );
							if($this->db->affected_rows() > 0){
								$this->Shopmodel->senMailCmpleteOrderID($leadOrderNumber);
								session_destroy();
								$otpReturn['status'] = true;
								$otpReturn['message'] = "Thank You for buying Bharti AXA Genral Insurance. You can close this page. Order ID:".$leadOrderNumber;
							} else {
								$otpReturn['status'] = false;
								$otpReturn['message'] = "Something went wrong Please try again!";
							}
							

						} else {

							$otpReturn['status'] = false;
							$otpReturn['message'] = "Something went wrong Please try again!";

						}

					} else {

						$this->db->query("UPDATE ".TABLE_SHOP_LEAD_NUMBER." SET shop_otp_status = shop_otp_status+2 WHERE shop_cus_id = '".$this->session->userdata('sessionCustomerVal')."' && shop_otp_status IN ('0','2','4') ");
						if($this->db->affected_rows()>0){
							$updatedCount = $this->db->query("SELECT shop_otp_status FROM ".TABLE_SHOP_LEAD_NUMBER." WHERE shop_cus_id = '".$this->session->userdata('sessionCustomerVal')."' LIMIT 1")->row_object();
							if($updatedCount->shop_otp_status == 6){
								$otpReturn['messageCount'] = true;
							} else {
								$otpReturn['messageCount'] = false;
							}
						}

						$otpReturn['status'] = false;
						$otpReturn['message'] = "Wrong OTP entered. Please enter correct OTP to proceed";

					}

				} else {

					$otpReturn['status'] = false;
					$otpReturn['message'] = "Something went wrong Please try again!";
				}
				
			} else {
				$otpReturn['status'] = false;
			}

			echo json_encode($otpReturn);

		} else {

			redirect(base_url());
			exit();

		}
}

   public function getCityByPincode(){

		if($_SERVER['REQUEST_METHOD'] != "POST"){
			redirect('user', 'refresh');
			die();
		}
		$cus_pincode = $this->input->get_post('cus_pincode');
        $query = $this->Shopmodel->getCityPincode($cus_pincode);
        echo json_encode($query);
	}

	public function getCitiesNames(){
		$db = get_instance()->db->conn_id;
		if($_SERVER['REQUEST_METHOD'] != "POST"){
			redirect('user', 'refresh');
			die();
		}
		$db = get_instance()->db->conn_id;
		$stateName = mysqli_real_escape_string($db,$this->input->post('stateName'));
        $query['cities'] = $this->Shopmodel->getCitiesModelNames($stateName);
        echo json_encode($query);

	}

}
