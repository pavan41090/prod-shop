<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends MX_Controller {

	public function __construct(){
		parent::__construct();
	}


	public function getLeadINfo(){

	}

	public function getinfoThird(){

		if(($_SERVER['REQUEST_METHOD'] == "POST") && isset($_SERVER['HTTPS'])){

			$thisInput = $this->input->post();

			$explodeString = explode('|', $thisInput);

			if($explodeString[1] == 'DD19A'){
				$shopPlanName = 5;
			} else if($explodeString[1] == 'DD19B'){
				$shopPlanName = 10;
			} else if($explodeString[1] == 'DD19C'){
				$shopPlanName = 20;
			} else if($explodeString[1] == 'DD19D'){
				$shopPlanName = 35;
			}

			$dataPlanName['planName'] = $shopPlanName;
			$dataPlanName['premiumValue'] = $explodeString[4];
			$dataPlanName['mobilenumber'] = $explodeString[3];
			$this->load->view('index',$dataPlanName);

		} else {

		}
	}

	public function index()
	{

		try{

			if($_SERVER['REQUEST_METHOD'] == "POST"){

				$thisinput = $this->input->post();

				$reemailid = $this->security->xss_clean($this->input->post('emailid'));
				$reemobilenumber = $this->security->xss_clean($this->input->post('mobilenumber'));
				$dataInsertion['shop_plan_name'] = $this->security->xss_clean($this->input->post('planname'));
				$this->form_validation->set_rules('planname','Select Plan Name!','trim|required');
				$dataInsertion['shop_aof_ref_number'] = $this->security->xss_clean($this->input->post('aofrefnumber'));
				$this->form_validation->set_rules('aofrefnumber','Enter AOF Reference No!','trim|required');
				$dataInsertion['shop_premises_covered'] = $this->security->xss_clean($this->input->post('premisescovered'));
				$this->form_validation->set_rules('premisescovered','Select Premises to be Covered!','trim|required');
				$dataInsertion['shop_insured_name'] = $this->security->xss_clean($this->input->post('insuredname'));
				$this->form_validation->set_rules('insuredname','Enter Insured Name','trim|required');
				$dataInsertion['shop_owner_name'] = $this->security->xss_clean($this->input->post('ownername'));
				$this->form_validation->set_rules('ownername','Enter Owners Name','trim|required');
				$dataInsertion['shop_gender'] = $this->security->xss_clean($this->input->post('gender'));
				$this->form_validation->set_rules('gender','Select Gender','trim|required');
				$dataInsertion['shop_owner_dob'] = $this->security->xss_clean($this->input->post('ownerdob'));
				$this->form_validation->set_rules('ownerdob','Enter Owners DOB','trim|required');
				$dataInsertion['shop_mobile_number'] = $reemobilenumber;
				$this->form_validation->set_rules('mobilenumber','Enter Mobile Number','trim|required');
				$dataInsertion['shop_email_id'] = $reemailid;
				$this->form_validation->set_rules('emailid','Enter Email ID','trim|required');

				$communicationData = array(
					'communicationaddress' => $this->security->xss_clean($this->input->post('communicationaddress')),
					'CommunicationCity' => $this->security->xss_clean($this->input->post('CommunicationCity')),
					'CommunicationState' => $this->security->xss_clean($this->input->post('CommunicationState')),
					'CommunicationPincode' => $this->security->xss_clean($this->input->post('CommunicationPincode'))
				);

				$risknData = array(
					'riskaddress' => $this->security->xss_clean($this->input->post('riskaddress')),
					'riskPincode' => $this->security->xss_clean($this->input->post('riskPincode')),
					'riskState' => $this->security->xss_clean($this->input->post('riskState')),
					'riskCity' => $this->security->xss_clean($this->input->post('riskCity'))
				);

				$dataInsertion['shop_communication_address'] = json_encode($communicationData);
				$dataInsertion['shop_resk_addresss'] = json_encode($risknData);

				$this->form_validation->set_rules('communicationaddress','Enter Communication Address','trim|required');
				$this->form_validation->set_rules('CommunicationCity','Enter Communication City','trim|required');
				$this->form_validation->set_rules('CommunicationState','Enter Communication State','trim|required');
				$this->form_validation->set_rules('CommunicationPincode','Enter Communication Pincode','trim|required');

				$dataInsertion['shop_same_com_resk'] = $this->security->xss_clean($this->input->post('samecommunication'));
				$dataInsertion['shop_nominee_name'] = $this->security->xss_clean($this->input->post('nomineename'));
				$this->form_validation->set_rules('nomineename','Enter Nominee Name','trim|required');
				$dataInsertion['shop_nominee_dob'] = $this->security->xss_clean($this->input->post('nomineedob'));
				$this->form_validation->set_rules('nomineedob','Enter Nominee DOB','trim|required');
				$dataInsertion['shop_created_on'] = date('Y-m-d H:i:s');
				$this->form_validation->set_rules('nomineerelation','Enter Nominee Relation','trim|required');
				$dataInsertion['shop_nominee_relation'] = $this->security->xss_clean($this->input->post('nomineerelation'));
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
				$this->load->view('index');
				
			}

		} catch(Excception $error){
			log_message('error','Some thing went wrong in '.__FUNCTION__.':Error name:'.json_encode($error));
		}
		
	}

	public function getCustomerOtp(){
		try{

			if($_SERVER['REQUEST_METHOD'] != "POST"){
				redirect(base_url());
				exit();
			}

			$thistermsPost = $this->input->post();
			$termsArray = array(
				'dealingaccessories' => $this->security->xss_clean($thistermsPost['dealingaccessories']),
				'termsandcondition' => $this->security->xss_clean($thistermsPost['termsandcondition']),
				'termscontent' => $this->security->xss_clean($thistermsPost['termscontent']),
				'autorenewaldata' => $this->security->xss_clean($thistermsPost['autorenewaldata']),
				'premiumPayment' => $this->security->xss_clean($thistermsPost['premiumPayment']),
			);
			$termsDataSet['shop_account_number'] = $this->security->xss_clean($thistermsPost['accountNumber']);
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

	public function getUser(){

		$thirdUrl = $this->uri->segment(2);
		$selectedValeus = $this->db->select('shop_plan_name,shop_aof_ref_number,shop_premises_covered,shop_insured_name,shop_owner_name,shop_gender,shop_owner_dob,shop_mobile_number,shop_email_id,shop_communication_address,shop_same_com_resk,shop_resk_addresss,shop_nominee_name,shop_nominee_dob,shop_status,shop_cus_id,shop_terms_conditions,shop_account_number,shop_otp_status,lead_order_id')->where('shop_cus_id',$thirdUrl)->get( TABLE_SHOP_LEAD_NUMBER );

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

		if($_SERVER['REQUEST_METHOD'] == "POST"){

			$intpuOtp = $this->input->post();
			$resinputOtp = $this->security->xss_clean($intpuOtp['otpnumber']);
			$selectOtp = $this->db->select('shop_otp_customer')->where(
				array(
					'shop_cus_id' => $this->session->userdata('sessionCustomerVal'),
					'shop_otp_status' => 0
				)
			)->get( TABLE_SHOP_LEAD_NUMBER );

			if($selectOtp->num_rows() > 0){

				$rowselectOtp = $selectOtp->row_object();

				if($rowselectOtp->status == 0){

					if($rowselectOtp->shop_otp_customer == $resinputOtp){
						$this->db->set(array('shop_otp_status'=>1,'shop_status'=>1))->where( array(
					'shop_cus_id' => $this->session->userdata('sessionCustomerVal'),
					'shop_otp_status' => 0
					) )->update( TABLE_SHOP_LEAD_NUMBER );

						if($this->db->affected_rows()>0){
							$leadOrderNumber = $this->Shopmodel->generateApplicationNumber();
							$this->db->set('lead_order_id',$leadOrderNumber)->where('shop_cus_id',$this->session->userdata('sessionCustomerVal'))->update( TABLE_SHOP_LEAD_NUMBER );
							if($this->db->affected_rows() > 0){
								$this->Shopmodel->senMailCmpleteOrderID($leadOrderNumber);
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

						$otpReturn['status'] = false;
						$otpReturn['message'] = "Otp Not Matched!";

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

		if($_SERVER['REQUEST_METHOD'] != "POST"){
			redirect('user', 'refresh');
			die();
		}
		$stateName = $this->security->xss_clean($this->input->post('stateName'));
        $query['cities'] = $this->Shopmodel->getCitiesModelNames($stateName);
        echo json_encode($query);

	}

}
