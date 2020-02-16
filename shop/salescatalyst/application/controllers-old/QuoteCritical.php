<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotecritical extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('critical_model');
		$this->load->model('Critical_proposal_model');
	}

	public function createQuoteCritical(){


		if($this->session->userdata('logged_in') == TRUE) {


			$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['CategoryArray'] = $this->Common_model->getCategory();
			$this->data['BusinessArray'] = $this->Common_model->getBusiness();
			$this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
			$this->data['PaymentArray'] = $this->Common_model->getPayment();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['CategoryArray'] = $this->Common_model->getCategory();
			$this->data['BusinessArray'] = $this->Common_model->getBusiness();
			$this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
			$this->data['PaymentArray'] = $this->Common_model->getPayment();

	   
			$this->data['sub_module'] = 'Critical Illnes';
			$this->data['module'] = 'leads'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/page_header_inner',$this->data);
			$this->load->view('quote/quote_create_critical');
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}		

	}	




	public function calculatePremiumCritical(){

		$this->data['critical_FirstName'] = $this->input->get_post('critical_FirstName');
		$this->data['critical_LastName'] = $this->input->get_post('critical_LastName');
		$this->data['critical_mx_DOB'] = $this->input->get_post('critical_mx_DOB');
		$this->data['emailcritical'] = $this->input->get_post('emailcritical');
		$this->data['mobilecritical'] = $this->input->get_post('mobilecritical');
		$this->data['occupation'] = $this->input->get_post('occupation');
		$this->data['Spouse_critical'] = $this->input->get_post('Spouse_critical');
		$this->data['spousedobcritical'] = $this->input->get_post('spousedobcritical');
		$this->data['includechildren'] = $this->input->get_post('includechildren');
		$this->data['critical_mx_City'] = $this->input->get_post('critical_mx_City');
		$this->data['critical_mx_State'] = $this->input->get_post('critical_mx_State');
        	$this->data['critical_mx_Zip'] = $this->input->get_post('critical_mx_Zip');
		$this->data['critical_mx_Gender'] = $this->input->get_post('critical_mx_Customer_Gender');


		$userdata = array(

			
			'emailcritical' => $this->input->get_post('emailcritical'),
            'occupation' => $this->input->get_post('occupation'),
			'Spouse_critical' => $this->input->get_post('Spouse_critical'),
			'spousedobcritical' => $this->input->get_post('spousedobcritical'),
			'includechildren' => $this->input->get_post('includechildren'),

			'critical_mx_Category' => $this->input->get_post('critical_mx_Category'),
			'critical_mx_Line_of_Business' => $this->input->get_post('critical_mx_Line_of_Business'),
			'critical_mx_HDFC_Branch_Location' => $this->input->get_post('critical_mx_HDFC_Branch_Location'),
			'critical_mx_HDFC_Ergo_Location' => $this->input->get_post('critical_mx_HDFC_Ergo_Location'),
			'critical_mx_Priority' => $this->input->get_post('critical_mx_Priority'),
			'critical_mx_Target_Date' => $this->input->get_post('critical_mx_Target_Date'),
			'critical_mx_TSE_BDR_Code' => $this->input->get_post('critical_mx_TSE_BDR_Code'),
			'critical_mx_TL_Code' => $this->input->get_post('critical_mx_TL_Code'),
			'critical_mx_SM_Code' => $this->input->get_post('critical_mx_SM_Code'),
			'critical_mx_Bank_Verifier_ID' => $this->input->get_post('critical_mx_Bank_Verifier_ID'),
			'critical_mx_Payment_Type' => $this->input->get_post('critical_mx_Payment_Type'),
			'critical_mx_Sub_Channel' => $this->input->get_post('critical_mx_Sub_Channel'),
			'critical_mx_HDFC_Card_Relationship_No' => $this->input->get_post('critical_mx_HDFC_Card_Relationship_No'),
			'critical_mx_HDFC_Card_Last_4_digits' => $this->input->get_post('critical_mx_HDFC_Card_Last_4_digits'),
			'critical_FirstName' => $this->input->get_post('critical_FirstName') ,
			'critical_LastName' => $this->input->get_post('critical_LastName') ,
			'critical_mx_DOB' => $this->input->get_post('critical_mx_DOB'),
			'critical_mx_Customer_Gender' => $this->input->get_post('critical_mx_Customer_Gender'),
			'critical_mx_Case_id' => $this->input->get_post('critical_mx_Case_id'),
			'critical_mx_PAN_Card' => $this->input->get_post('critical_mx_PAN_Card'),
			'critical_mx_Street1' => $this->input->get_post('critical_mx_Street1'),
			'critical_mx_Street2' => $this->input->get_post('critical_mx_Street2'),
			'critical_mx_Area' => $this->input->get_post('critical_mx_Area'),
			'critical_mx_City' => $this->input->get_post('critical_mx_City'),
			'critical_mx_State' => $this->input->get_post('critical_mx_State'),
			'critical_mx_Zip' => $this->input->get_post('critical_mx_Zip'),
			'critical_Notes' => $this->input->get_post('critical_Notes'),
			'emailcritical' => $this->input->get_post('emailcritical'),
			'mobilecritical' => $this->input->get_post('mobilecritical'),
           			
		);	
		

		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->critical_model->generateQuoteXmlcritical($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);



		 $apiData = array(
		 	'api_request_critical' => $requestXml,
		 	'api_response_critical_xml' => $curl,
		 	'api_response_critical' => $output,
		 );		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
		}
		


	}


	public function criticalPremium(){

		if ($this->session->userdata('logged_in') == TRUE) {		

			$api_request = $this->session->userdata('api_request_critical');
			$api_response = $this->session->userdata('api_response_critical');
			$api_response_tw_xml = $this->session->userdata('api_request_critical_xml');

		    $responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];
			$premiumArray = $responseExtArray['PremiumSet']['tuple'];

			$this->data['OrderNo'] = $responseExtArray['OrderNo'];
			$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];


			$premium_array = array();
			$TotalDisablementArray = array();

			foreach ($premiumArray as $key => $value ){

				$sumInsured = $value['old']['Product']['SumInsured'];
				$coverCode = $value['old']['Product']['ProductCode'];
				$TotalPremium = $value['old']['Product']['PremiumPayable'];
				if($coverCode == 'ESC'){		
					$coverCodeHigh = $value['old']['Product']['ProductCode'];
					$TotalPremiumHigh = $value['old']['Product']['PremiumPayable'];
					$premium_array[] = array(
						'coverCode' 		=> $coverCode,
						'SumInsured' 		=> $sumInsured,
						'Premium' 			=> $value['old']['Product']['Premium'],
						'ServiceTax' 		=> $value['old']['Product']['ServiceTax'],
						'TotalPremium' 		=> $TotalPremium,
						'ProductType' 		=> $value['old']['Product']['ProductType'],
			
					);
				}

			}

			$this->data['premium_array'] = $premium_array;

 			$this->data['title']="Premium Response - Critical Illnes";
			$this->data['module'] = 'leads'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('quote/premium_critical',$this->data);
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}

	}		


	// public function sendQuote()
	// {

	// 	$orderNo = $this->input->get_post('OrderNo');
 //        $quoteNo = $this->input->get_post('QuoteNo');



 //        // $orderNo = 'VDJC107645';
 //       	// $quoteNo = 'QRN201710250000862';

 //        $soapUrl = SOAP_URL.'cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com';
 //        $requestXml = $this->TwoWheeler_model->getPdfString($orderNo, $quoteNo);
		
	// 	$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
	// 	$output =$this->Common_model->xmlstr_to_array($curl);

	// 	$pdfString = $output['soapenv:Body']['MISPolicyPDFDownloadResponse']['pdfURL']; 



 //    	$config = Array(
	//  	 	'protocol' => 'smtp',
	//   		'smtp_host' => 'ssl://smtp.googlemail.com',
	//   		'smtp_port' => 587,
	//   		'smtp_user' => 'shajihavas@gmail.com', // change it to yours
	//   		'smtp_pass' => 'October04th!	', // change it to yours
	//   		'mailtype' => 'html',
	//   		'charset' => 'iso-8859-1',
	//   		'wordwrap' => TRUE
	// 	);
	// 	$base64 = base64_decode($pdfString);
	// 	$config['encoding'] = 'base64';
 //        $message = '';
 //        	$this->load->library('email', $config);
 //      		$this->email->set_newline("\r\n");
 //      		$this->email->from('shajihavas@gmail.com'); // change it to yours
 //      		$this->email->to('shajihavas@gmail.com');// change it to yours
 //      		$this->email->subject('Your quote from BAGI');
 //      		$this->email->message('HI <br/><br/> Please find attached Quote');
 //      		$this->email->attach($base64,'attachment','report.pdf','application/pdf');
 //      		if($this->email->send())
 //     		{
 //      			echo 'Email sent.';
 //     		} else {
 //    			 show_error($this->email->print_debugger());
 //    		}


	// }



	// qms start



public function qmscreateQuoteCritical(){


		if($this->session->userdata('logged_in') == TRUE) {


			$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['CategoryArray'] = $this->Common_model->getCategory();
			$this->data['BusinessArray'] = $this->Common_model->getBusiness();
			$this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
			$this->data['PaymentArray'] = $this->Common_model->getPayment();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['CategoryArray'] = $this->Common_model->getCategory();
			$this->data['BusinessArray'] = $this->Common_model->getBusiness();
			$this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
			$this->data['PaymentArray'] = $this->Common_model->getPayment();

	   		$this->data['module'] = 'qms'; 
			$this->data['sub_module'] = 'Critical Illnes';
			

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/qms_page_header_inner',$this->data);
			$this->load->view('qms_quote/qms_quote_create_critical');
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}		

	}	



	public function qmsCalculatePremiumCritical(){

		$this->data['critical_FirstName'] = $this->input->get_post('critical_first_name');
		$this->data['critical_LastName'] = $this->input->get_post('critical_last_name');
		$this->data['critical_mx_DOB'] = $this->input->get_post('critical_dob');
		$this->data['critical_mx_Zip'] = $this->input->get_post('critical_zip');
		$this->data['emailcritical'] = $this->input->get_post('critical_email');
		$this->data['mobilecritical'] = $this->input->get_post('critical_mobile');
		$this->data['occupation'] = $this->input->get_post('critical_occupation');
		$this->data['Spouse_critical'] = $this->input->get_post('critical_spouse');
		$this->data['includechildren'] = $this->input->get_post('critical_include_child');
		$this->data['critical_mx_City'] = $this->input->get_post('critical_city');
		$this->data['critical_mx_State'] = $this->input->get_post('critical_state');
        


		$userdata = array(


            'occupation' => $this->input->get_post('occupation'),
			'Spouse_critical' => $this->input->get_post('critical_spouse'),
			'includechildren' => $this->input->get_post('includechildren'),
			'critical_FirstName' => $this->input->get_post('critical_first_name') ,
			'critical_LastName' => $this->input->get_post('critical_last_name') ,
			'critical_mx_DOB' => $this->input->get_post('critical_dob'),
			'critical_mx_City' => $this->input->get_post('critical_city'),
			'critical_mx_State' => $this->input->get_post('critical_state'),
			'emailcritical' => $this->input->get_post('critical_email'),
			'mobilecritical' => $this->input->get_post('critical_mobile'),
			'ctill_zip' => $this->input->get_post('critical_zip'),
           			
		);	
		

		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->critical_model->generateQuoteXmlcritical($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

// print_r($requestXml);
// exit();

		 $apiData = array(
		 	'api_request_critical' => $requestXml,
		 	'api_response_critical_xml' => $curl,
		 	'api_response_critical' => $output,
		 );		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
		}
		


	}


	public function qmsCriticalPremium(){

	if ($this->session->userdata('logged_in') == TRUE) {		

		$api_request = $this->session->userdata('api_request_critical');
		$api_response = $this->session->userdata('api_response_critical');
		$api_response_tw_xml = $this->session->userdata('api_request_critical_xml');

	    $responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];
		$premiumArray = $responseExtArray['PremiumSet']['tuple'];

		$this->data['OrderNo'] = $responseExtArray['OrderNo'];
		$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];


		    $userdata = array(
				'OrderNo' => $responseExtArray['OrderNo'],
				'QuoteNo' => $responseExtArray['QuoteNo'],
			);	
			$this->session->set_userdata($userdata);

		$premium_array = array();
		$TotalDisablementArray = array();

		foreach ($premiumArray as $key => $value ){

			$sumInsured = $value['old']['Product']['SumInsured'];
			$coverCode = $value['old']['Product']['ProductCode'];
			$TotalPremium = $value['old']['Product']['PremiumPayable'];

			$userdata = array(
				'sumInsured' => $value['old']['Product']['SumInsured'],
				
			);	
			$this->session->set_userdata($userdata);


				if($coverCode == 'ESC'){		
			
				$coverCodeHigh = $value['old']['Product']['ProductCode'];
				$TotalPremiumHigh = $value['old']['Product']['PremiumPayable'];
				$premium_array[] = array(

				'coverCode' 		=> $coverCode,
				'SumInsured' 		=> $sumInsured,
				'Premium' 			=> $value['old']['Product']['Premium'],
				'ServiceTax' 		=> $value['old']['Product']['ServiceTax'],
				'TotalPremium' 		=> $TotalPremium,
				'ProductType' 		=> $value['old']['Product']['ProductType'],


			);

			

		}
	}



		$this->data['premium_array'] = $premium_array;

  // echo '<pre>';
  // print_r($premium_array);
  // exit();
		$this->data['title']="Premium Response - Critical Illnes";
		$this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_quote/qms_premium_critical',$this->data);
		$this->load->view('layout/footer_inner');



		} else {
			redirect('user', 'refresh');
		}

	}
	// print_r($userdata);
	// exit();
	public function ciProposal(){
	
		if($this->session->userdata('logged_in') == TRUE) {
		
			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['title']="Critical-illnes proposal";
			$this->data['module'] = 'qms'; 
		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_critical_illnes',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
		redirect('user', 'refresh');
		}		

	}

  public function premiumUpdateCritical()
  {

  	 $userdata = array(
			
			'Premium' => $this->input->get_post('Premium'),
			'ServiceTax' => $this->input->get_post('ServiceTax'),
			'PremiumPayable' => $this->input->get_post('PremiumPayable'),
			'selectedPlanCode' => substr($this->input->get_post('selectedPlan'), 0, 3),
			'selectedPlanName' => $this->input->get_post('selectedPlanName'),
			'selectedSumInsured' => substr($this->input->get_post('selectedPlan'), 3),

		);	

	$this->session->set_userdata($userdata);
  }


  public function getSessionCritical(){
  	$sessionData = array(
  	'critical_FirstName' => $this->session->userdata('critical_FirstName'),
  	'critical_LastName' => $this->session->userdata('critical_LastName'),
  	'critical_mx_DOB' => $this->session->userdata('critical_mx_DOB'),
  	'critical_mx_City' => $this->session->userdata('critical_mx_City'),
  	'critical_mx_State' => $this->session->userdata('critical_mx_State'),
  	'emailcritical' => $this->session->userdata('emailcritical'),
  	'mobilecritical' => $this->session->userdata('mobilecritical'),
  	
  	'ctill_prop_relationship' => $this->session->userdata('ctill_prop_relationship'),
  	'ctill_pro_title' => $this->session->userdata('ctill_pro_title'),
  	'ctill_pro_add1' => $this->session->userdata('ctill_pro_add1'),
  	'ctill_pro_add2' => $this->session->userdata('ctill_pro_add2'),
  	'ctill_pro_landmark' => $this->session->userdata('ctill_pro_landmark'),
  	'ctill_pro_emnum' => $this->session->userdata('ctill_pro_emnum'),
  	'ctill_pro_gstn' => $this->session->userdata('ctill_pro_gstn'),
  	'ctill_pro_yname' => $this->session->userdata('ctill_pro_yname'),
   	'ctill_pro_relation' => $this->session->userdata('ctill_pro_relation'),
   	'ctill_pro_policy_sdate' => $this->session->userdata('ctill_pro_policy_sdate'),
   
  	);
  	echo json_encode($sessionData);	
  }

  public function ciProposalInformation(){


		$userdata = array(

		
			'ctill_pro_policy_sdate'=> $this->input->get_post('ctill_pro_policy_sdate'),
			'ctill_pro_title'=> $this->input->get_post('ctill_pro_title'),
			'ctill_pro_add1'=> $this->input->get_post('ctill_pro_add1'),
			'ctill_pro_add2'=> $this->input->get_post('ctill_pro_add2'),
			'ctill_pro_landmark' => $this->input->get_post('ctill_pro_landmark'),
			'ctill_pro_emnum' => $this->input->get_post('ctill_pro_emnum'),
			'ctill_pro_gstn' => $this->input->get_post('ctill_pro_gstn'),
			'ctill_pro_yname' => $this->input->get_post('ctill_pro_yname'),
			'ctill_pro_relation' => $this->input->get_post('ctill_pro_relation'),
			
			
		);	
		$this->session->set_userdata($userdata);

	}


	public function ciProposalView(){

		if($this->session->userdata('logged_in') == TRUE) {

	  		$familyType = trim($this->session->userdata('Spouse_critical'));
			if($familyType == 0)
				$familyType = 'Self';
			else 
				$familyType = 'Self, Spouse';

			$this->data['familyType']=$familyType;
			$this->data['ctill_pro_policy_sdate']=$this->session->userdata('ctill_pro_policy_sdate');
			$this->data['critical_FirstName']=$this->session->userdata('critical_FirstName');
			$this->data['critical_LastName']=$this->session->userdata('critical_LastName');
			$this->data['critical_mx_DOB']=$this->session->userdata('critical_mx_DOB');
			$this->data['critical_mx_City']=$this->session->userdata('critical_mx_City');
			$this->data['critical_mx_State']=$this->session->userdata('critical_mx_State');
			$this->data['emailcritical']=$this->session->userdata('emailcritical');
			$this->data['mobilecritical']=$this->session->userdata('mobilecritical');
			$this->data['ctill_pro_add1']=$this->session->userdata('ctill_pro_add1');
			$this->data['ctill_pro_zip']=$this->session->userdata('ctill_zip');
		
			$this->data['Premium']=$this->session->userdata('Premium');
			$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
			$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');	

			$this->data['selectedPlanCode']=$this->session->userdata('selectedPlanCode');
			$this->data['selectedPlanName']=$this->session->userdata('selectedPlanName');
			$this->data['selectedSumInsured']=$this->session->userdata('selectedSumInsured');
			$this->data['title']="Critical-illnes proposal";
			$this->data['module'] = 'qms'; 
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_critical_proposal_view',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}		
	
	}


	public function ciUpdateProposal(){

			$familyType = trim($this->session->userdata('Spouse_critical'));
		if($familyType == 0)
			$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		$this->data['ctill_pro_policy_sdate']=$this->session->userdata('ctill_pro_policy_sdate');
		$this->data['critical_FirstName']=$this->session->userdata('critical_FirstName');
		
		$this->data['critical_LastName']=$this->session->userdata('critical_LastName');
		$this->data['critical_mx_DOB']=$this->session->userdata('critical_mx_DOB');
		$this->data['critical_mx_City']=$this->session->userdata('critical_mx_City');
		$this->data['critical_mx_State']=$this->session->userdata('critical_mx_State');
		$this->data['emailcritical']=$this->session->userdata('emailcritical');
		$this->data['mobilecritical']=$this->session->userdata('mobilecritical');
		$this->data['ctill_pro_add1']=$this->session->userdata('ctill_pro_add1');
		$this->data['ctill_pro_add2']=$this->session->userdata('ctill_pro_add2');
		
		$this->data['ctill_pro_landmark']=$this->session->userdata('ctill_pro_landmark');
		$this->data['ctill_pro_gstn']=$this->session->userdata('ctill_pro_gstn');
		$this->data['ctill_zip']=$this->session->userdata('ctill_zip');

		$this->data['OrderNo']=$this->session->userdata('OrderNo');
		$this->data['QuoteNo']=$this->session->userdata('QuoteNo');			
		//$this->data['sumInsured']=$this->session->userdata('sumInsured');	

		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');

			$this->data['selectedPlanCode']=$this->session->userdata('selectedPlanCode');
			$this->data['selectedPlanName']=$this->session->userdata('selectedPlanName');
			$this->data['selectedSumInsured']=$this->session->userdata('selectedSumInsured');



		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Critical_proposal_model->generatePropsalXmlcritical($this->data);
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		
		$responseArray =  $output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body'];

 // print_r($requestXml);
 // exit();

		if(isset($responseArray['processTPRequestResponse']['response'])) {
			$orderNo = $responseArray['processTPRequestResponse']['response']['OrderNo'];	
			$quoteNo = $responseArray['processTPRequestResponse']['response']['QuoteNo'];	

			$userdata = array(
				'orderNo' => $orderNo,
				'quoteNo' => $quoteNo,
			);	
			$this->session->set_userdata($userdata);	
			echo 'success';
		} else {	
			$faultArray = $responseArray['SOAP:Fault']['detail']['bpm:FaultDetails']['cordys:FaultDetailString'];
			$falutMessage = $this->Common_model->get_string_between($faultArray,'<faultstring xml:lang="en-US">','</faultstring>');
			echo json_encode($falutMessage);
		}	
	}



	public function proposalCIResult(){
	
		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['title']="Proposal Critical Illness";
			$this->data['module'] = 'qms'; 

			$this->data['orderNo']=$this->session->userdata('orderNo');
			$this->data['quoteNo']=$this->session->userdata('quoteNo');	
			$this->data['emailId']=$this->session->userdata('emailcritical');	
			$this->data['custName']=$this->session->userdata('critical_FirstName');	

		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_result_critical',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}		
	
	
	}


	public function sess_clrci() {

	
         $array_items = array('critical_FirstName',
         					  'critical_LastName',
         					  'critical_mx_DOB',
         					  'critical_mx_City',
         					  'critical_mx_State',
         					  'emailcritical',
         					  'mobilecritical',
         					  'ctill_prop_relationship',
         					  'ctill_pro_title',
         					  'ctill_pro_add1',
         					  'ctill_pro_add2',
         					  'ctill_pro_landmark',
         					  'ctill_pro_emnum',
         					  'ctill_pro_gstn',
         					  'ctill_pro_yname',
         					  'ctill_pro_relation',
         					  'ctill_pro_policy_sdate',
         					  'selectedSumInsured',
         					  
         					 
         					  'Premium',
         					  'ServiceTax',
         					  'PremiumPayable',
         					  'orderNo',
         					  'quoteNo',
     );

      	$this->session->unset_userdata($array_items);
      	redirect('create-quote-critical-illnes', 'refresh');

	 
       
	}

}

