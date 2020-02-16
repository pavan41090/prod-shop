<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotepa extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('pa_model');
	    $this->load->model('Pa_proposal_model');
	}

	public function createQuotepa(){

		if($this->session->userdata('logged_in') == TRUE) {

            $this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['sub_module'] = 'Personal Accident'; 
			$this->data['module'] = 'leads';

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/page_header_inner',$this->data);
			$this->load->view('quote/lms_quote_create_pa',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}		

	}	




	public function calculatePremiumpa(){

		$this->data['pa_state'] = $this->input->get_post('pa_state');
		$this->data['pa_city'] = $this->input->get_post('pa_city');
		$this->data['occupation'] = $this->input->get_post('occupation');
		$this->data['gainful'] = $this->input->get_post('gainful');
		$this->data['emailpa'] = $this->input->get_post('emailpa');
		$this->data['pamobile'] = $this->input->get_post('pamobile');
		$this->data['FirstName'] = $this->input->get_post('pa_FirstName');
		$this->data['LastName'] = $this->input->get_post('pa_LastName');
		$this->data['dateofbirthpa'] = $this->input->get_post('pa_dob');

		$userdata = array(
			'pa_state' => $this->input->get_post('pa_state'),
			'pa_city' => $this->input->get_post('pa_city'),
			'occupation' => $this->input->get_post('occupation'),
			'gainful' => $this->input->get_post('gainful'),
			'emailpa' => $this->input->get_post('emailpa'),
			'pamobile' => $this->input->get_post('pamobile'),
			

			'pa_mx_Category' => $this->input->get_post('pa_mx_Category'),
			'pa_mx_Line_of_Business' => $this->input->get_post('pa_mx_Line_of_Business'),
			'pa_mx_HDFC_Branch_Location' => $this->input->get_post('pa_mx_HDFC_Branch_Location'),
			'pa_mx_HDFC_Ergo_Location' => $this->input->get_post('pa_mx_HDFC_Ergo_Location'),
			'pa_mx_Priority' => $this->input->get_post('pa_mx_Priority'),
			'pa_mx_Target_Date' => $this->input->get_post('pa_mx_Target_Date'),
			'pa_mx_TSE_BDR_Code' => $this->input->get_post('pa_mx_TSE_BDR_Code'),
			'pa_mx_TL_Code' => $this->input->get_post('pa_mx_TL_Code'),
			'pa_mx_SM_Code' => $this->input->get_post('pa_mx_SM_Code'),
			'pa_mx_Bank_Verifier_ID' => $this->input->get_post('pa_mx_Bank_Verifier_ID'),
			'pa_mx_Payment_Type' => $this->input->get_post('pa_mx_Payment_Type'),
			'pa_mx_Sub_Channel' => $this->input->get_post('pa_mx_Sub_Channel'),
			'pa_mx_HDFC_Card_Relationship_No' => $this->input->get_post('pa_mx_HDFC_Card_Relationship_No'),
			'pa_mx_HDFC_Card_Last_4_digits' => $this->input->get_post('pa_mx_HDFC_Card_Last_4_digits'),
			'pa_FirstName' => $this->input->get_post('pa_FirstName'),
			'pa_LastName' => $this->input->get_post('pa_LastName') ,
			'pa_dob' => $this->input->get_post('pa_dob'),
			'pa_mx_Customer_Gender' => $this->input->get_post('pa_mx_Customer_Gender'),
			'pa_mx_Case_id' => $this->input->get_post('pa_mx_Case_id'),
			'pa_mx_PAN_Card' => $this->input->get_post('pa_mx_PAN_Card'),
			'pa_mx_Street1' => $this->input->get_post('pa_mx_Street1'),
			'pa_mx_Street2' => $this->input->get_post('pa_mx_Street2'),
			'pa_mx_Area' => $this->input->get_post('pa_mx_Area'),
			'pa_mx_Zip' => $this->input->get_post('pa_mx_Zip'),
			'pa_Notes' => $this->input->get_post('pa_Notes'),
			'emailpa' => $this->input->get_post('emailpa'),
			'pamobile' => $this->input->get_post('pamobile'),
            			
		);	
		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->pa_model->generateQuoteXmlpa($this->data);

		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		$apiData = array(
		 	'api_request_pa' => $requestXml,
		 	'api_response_pa_xml' => $curl,
		 	'api_response_pa' => $output,
		);		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])){
		//if(count($output) > 1) {
			echo 'success';
		} else {
			echo 'failed';
		}

	}


	public function paPremium(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$api_request = $this->session->userdata('api_request_pa');
			$api_response = $this->session->userdata('api_response_pa');
			$api_response_tw_xml = $this->session->userdata('api_response_pa_xml');
	

			$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];
			$premiumArray = $responseExtArray['PremiumSet']['tuple'];

			$this->data['OrderNo'] = $responseExtArray['OrderNo'];
			$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];

			$premium_array = array();
			$TotalDisablementArray = array();
			foreach ($premiumArray as $key => $value ){

				$sumInsured = $value['old']['Plan']['SumInsured'];
				switch ($sumInsured) {
					case '1000000' :
						$TotalDisablement = '1,50,0000';
						$PartialDisablement = '2% to 75% of Sum Insured';
						$HospitalDailyCash = '-';
						$IndemnityBenefit = '-';
					break;

					case '2000000' :
						$TotalDisablement = '3,00,0000';
						$PartialDisablement = '2% to 75% of Sum Insured';
						$HospitalDailyCash = '-';
						$IndemnityBenefit = '-';
					break;

					case '3000000' :
						$TotalDisablement = '4,50,0000';
						$PartialDisablement = '2% to 75% of Sum Insured';
						$HospitalDailyCash = 'Rs 1,000 per day';
						$IndemnityBenefit = 'Rs 60,00,000 for Accidental death and for Permanent Total Disability';
					break;

					default:
						$TotalDisablement = '-';
						$PartialDisablement = '-';
						$HospitalDailyCash = '-';
						$IndemnityBenefit = '-';
				}

				$TotalDisablementArray[] = array('tDisablement'=> $TotalDisablement );
				$PartialDisablementArray[] = array('pDisablement'=> $PartialDisablement );
				$HospitalDailyCashArray[] = array('hDailyCashh'=> $HospitalDailyCash );
				$IndemnityBenefitArray[] = array('iBenefit'=> $IndemnityBenefit );


			$premium_array[] = array(

				'cover_code' 		=> $value['old']['Plan']['COVER_CODE'],
				'SumInsured' 		=> $sumInsured,
				'Premium' 			=> $value['old']['Plan']['Premium'],
				'ServiceTax' 		=> $value['old']['Plan']['ServiceTax'],
				'TotalPremium' 		=> $value['old']['Plan']['TotalPremium'],
				'ShortDesc' 		=> $value['old']['Plan']['ShortDesc'],
				'TotalDisablement' 	=> $TotalDisablement,
				'PartDisablement' 	=> $PartialDisablement,
				'HospDailyCash' 	=> $HospitalDailyCash,
				'IndemnityBenefit' 	=> $IndemnityBenefit,
			);

		}

		$premium_choice_array['premium_array'] = $premium_array;
		$premium_choice_array['TotalDisablementArray'] = $TotalDisablementArray;
		$premium_choice_array['PartialDisablementArray'] = $PartialDisablementArray;
		$premium_choice_array['HospitalDailyCashArray'] = $HospitalDailyCashArray;
		$premium_choice_array['IndemnityBenefitArray'] = $IndemnityBenefitArray;

		$this->data['premium_choice_array'] = $premium_choice_array;

		$helpArray = array(
				'Accidental_Death'=>'The benefit is payable in the event of bodily injury caused by an accident, where accident means a sudden, unforeseen, and involuntary event caused by external, visible and violent means.',
				
				'Permanent_Partial'=>'The benefit is payable in the event of bodily injury caused by accidental, violent, external and visible means which as a direct consequence thereof, totally disables and prevents the Insured from attending to any business or occupation of any and every kind or from attending to his/her usual & normal duties for a continuous period of twelve calendar months from the date of the accident, with no hopes of improvement at the end of that period.',

				'Hospital_DailyCash'=>'This benefit provides for payment of a daily allowance for the number of days the Insured is hospitalized following treatment of bodily injury caused by accidental, external, violent and visible means, if the hospitalisation exceeds 2 days and a valid claim is admissible under the policy. The maximum number of days for which the benefit is payable is 50 days.',
				
				'Double_Indemnity'=>'This benefit provides for payment of Double Indemnity, i.e. 200% of the sum insured in case of death or Permanent Total Disablement, due to bodily injury caused by accidental, external, violent and visible means whilst traveling as a passenger in a public conveyance. Public conveyance shall mean Passenger carrying Bus, Air Plane, Train or Passenger carrying ship or vessel. Benefits payable under this Section shall not be cumulative to Section 1 and Section 2 of the benefit schedule.',
			);
			$this->data['helpArray'] = $helpArray;
		
			$this->data['title']="Premium Response - Personal Accident";
			$this->data['module'] = 'leads';
		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('quote/premium_pa',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}

	}		


	public function sendQuote()
	{

		$orderNo = $this->input->get_post('OrderNo');
        $quoteNo = $this->input->get_post('QuoteNo');

		// $orderNo = 'VDJC107645';
       	// $quoteNo = 'QRN201710250000862';

        $soapUrl = SOAP_URL.'cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com';
        $requestXml = $this->TwoWheeler_model->getPdfString($orderNo, $quoteNo);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		$pdfString = $output['soapenv:Body']['MISPolicyPDFDownloadResponse']['pdfURL']; 



    	$config = Array(
	 	 	'protocol' => 'smtp',
	  		'smtp_host' => 'ssl://smtp.googlemail.com',
	  		'smtp_port' => 587,
	  		'smtp_user' => 'shajihavas@gmail.com', // change it to yours
	  		'smtp_pass' => 'October04th!	', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'iso-8859-1',
	  		'wordwrap' => TRUE
		);
		$base64 = base64_decode($pdfString);
		$config['encoding'] = 'base64';
        $message = '';
        	$this->load->library('email', $config);
      		$this->email->set_newline("\r\n");
      		$this->email->from('shajihavas@gmail.com'); // change it to yours
      		$this->email->to('shajihavas@gmail.com');// change it to yours
      		$this->email->subject('Your quote from BAGI');
      		$this->email->message('HI <br/><br/> Please find attached Quote');
      		$this->email->attach($base64,'attachment','report.pdf','application/pdf');
      		if($this->email->send())
     		{
      			echo 'Email sent.';
     		} else {
    			 show_error($this->email->print_debugger());
    		}


	}




	// qms start

	public function qmscreateQuotepa(){

		if($this->session->userdata('logged_in') == TRUE) {

            $this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

       		$this->data['occupationArray'] = $this->Common_model->getOccupationList();

			$this->data['module'] = 'qms';
			$this->data['sub_module'] = 'Personal Accident'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/qms_page_header_inner',$this->data);
			$this->load->view('qms_quote/qms_quote_create_pa',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}		

	}



	public function qmsCalculatePremiumpa(){



		$this->data['pa_state'] = $this->input->get_post('pa_state');
		$this->data['pa_city'] = $this->input->get_post('pa_city');
		$this->data['occupation'] = $this->input->get_post('pa_occupation');
		$this->data['gainful'] = $this->input->get_post('pa_gainful');
		$this->data['emailpa'] = $this->input->get_post('pa_email');
		$this->data['pamobile'] = $this->input->get_post('pa_mobile');
		$this->data['FirstName'] = $this->input->get_post('pa_first_name');
		$this->data['LastName'] = $this->input->get_post('pa_last_name');
		$this->data['dateofbirthpa'] = $this->input->get_post('pa_dob');

		$userdata = array(
			'pa_state' => $this->input->get_post('pa_state'),
			'pa_city' => $this->input->get_post('pa_city'),
			'pa_occupation' => $this->input->get_post('pa_occupation'),
			'pa_gainful' => $this->input->get_post('pa_gainful'),
			'pa_email' => $this->input->get_post('pa_email'),
			'pa_mobile' => $this->input->get_post('pa_mobile'),
			'pa_FirstName' => $this->input->get_post('pa_first_name'),
			'pa_LastName' => $this->input->get_post('pa_last_name') ,
			'pa_dob' => $this->input->get_post('pa_dob'),

			'pa_spouse' => $this->input->get_post('pa_spouse') ,
			'pa_spouse_dob' => $this->input->get_post('pa_spouse_dob'),
			'pa_include_child' => $this->input->get_post('pa_include_child') ,
			'pa_zip' => $this->input->get_post('pa_zip'),
			
            			
		);	
		$this->session->set_userdata($userdata);


// echo '<pre>';
// print_r($this->data);
// exit();


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->pa_model->generateQuoteXmlpa($this->data);

		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		$apiData = array(
		 	'api_request_pa' => $requestXml,
		 	'api_response_pa_xml' => $curl,
		 	'api_response_pa' => $output,
		);		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])){
		//if(count($output) > 1) {
			echo 'success';
		} else {
			echo 'failed';
		}

	}


	public function qmsPaPremium(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$api_request = $this->session->userdata('api_request_pa');
			$api_response = $this->session->userdata('api_response_pa');
			$api_response_tw_xml = $this->session->userdata('api_response_pa_xml');

		
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
				$sumInsured = $value['old']['Plan']['SumInsured'];
				switch ($sumInsured) {
					case '1000000' :
						$TotalDisablement = '1,50,0000';
						$PartialDisablement = '2% to 75% of Sum Insured';
						$HospitalDailyCash = '-';
						$IndemnityBenefit = '-';
					break;

					case '2000000' :
						$TotalDisablement = '3,00,0000';
						$PartialDisablement = '2% to 75% of Sum Insured';
						$HospitalDailyCash = '-';
						$IndemnityBenefit = '-';
					break;

					case '3000000' :
						$TotalDisablement = '4,50,0000';
						$PartialDisablement = '2% to 75% of Sum Insured';
						$HospitalDailyCash = 'Rs 1,000 per day';
						$IndemnityBenefit = 'Rs 60,00,000 for Accidental death and for Permanent Total Disability';
					break;

					default:
						$TotalDisablement = '-';
						$PartialDisablement = '-';
						$HospitalDailyCash = '-';
						$IndemnityBenefit = '-';
				}


				$userdata=array(
					'sumInsured'=>$value['old']['Plan']['SumInsured']
				);
				$this->session->set_userdata($userdata);

				$TotalDisablementArray[] = array('tDisablement'=> $TotalDisablement );
				$PartialDisablementArray[] = array('pDisablement'=> $PartialDisablement );
				$HospitalDailyCashArray[] = array('hDailyCashh'=> $HospitalDailyCash );
				$IndemnityBenefitArray[] = array('iBenefit'=> $IndemnityBenefit );


			$premium_array[] = array(

				'cover_code' 		=> $value['old']['Plan']['COVER_CODE'],
				'SumInsured' 		=> $sumInsured,
				'Premium' 			=> $value['old']['Plan']['Premium'],
				'ServiceTax' 		=> $value['old']['Plan']['ServiceTax'],
				'TotalPremium' 		=> $value['old']['Plan']['TotalPremium'],
				'ShortDesc' 		=> $value['old']['Plan']['ShortDesc'],
				'TotalDisablement' 	=> $TotalDisablement,
				'PartDisablement' 	=> $PartialDisablement,
				'HospDailyCash' 	=> $HospitalDailyCash,
				'IndemnityBenefit' 	=> $IndemnityBenefit,
			);

			$userdata=array(
				'cover_code'=>$value['old']['Plan']['COVER_CODE']
			);
			$this->session->set_userdata($userdata);
		}

		$premium_choice_array['premium_array'] = $premium_array;
		$premium_choice_array['TotalDisablementArray'] = $TotalDisablementArray;
		$premium_choice_array['PartialDisablementArray'] = $PartialDisablementArray;
		$premium_choice_array['HospitalDailyCashArray'] = $HospitalDailyCashArray;
		$premium_choice_array['IndemnityBenefitArray'] = $IndemnityBenefitArray;

		$this->data['premium_choice_array'] = $premium_choice_array;

 // echo '<pre>';
 // print_r($premium_choice_array);
 // exit();


		$helpArray = array(
				'Accidental_Death'=>'The benefit is payable in the event of bodily injury caused by an accident, where accident means a sudden, unforeseen, and involuntary event caused by external, visible and violent means.',
				'Permanent_Partial'=>'The benefit is payable in the event of bodily injury caused by accidental, violent, external and visible means which as a direct consequence thereof, totally disables and prevents the Insured from attending to any business or occupation of any and every kind or from attending to his/her usual & normal duties for a continuous period of twelve calendar months from the date of the accident, with no hopes of improvement at the end of that period.',
				'Hospital_DailyCash'=>'This benefit provides for payment of a daily allowance for the number of days the Insured is hospitalized following treatment of bodily injury caused by accidental, external, violent and visible means, if the hospitalisation exceeds 2 days and a valid claim is admissible under the policy. The maximum number of days for which the benefit is payable is 50 days.',
				'Double_Indemnity'=>'This benefit provides for payment of Double Indemnity, i.e. 200% of the sum insured in case of death or Permanent Total Disablement, due to bodily injury caused by accidental, external, violent and visible means whilst traveling as a passenger in a public conveyance. Public conveyance shall mean Passenger carrying Bus, Air Plane, Train or Passenger carrying ship or vessel. Benefits payable under this Section shall not be cumulative to Section 1 and Section 2 of the benefit schedule.',
			);
			$this->data['helpArray'] = $helpArray;


			$this->data['title']=" Personal Accident";
			$this->data['module'] = 'qms';
			
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_quote/qms_premium_pa',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}

	}	


			
	public function qmsPaProposal(){

		if($this->session->userdata('logged_in') == TRUE) {

		$this->data['stateArray'] = $this->Common_model->getStateList();
        $this->data['CategoryArray'] = $this->Common_model->getCategory();
        $this->data['BusinessArray'] = $this->Common_model->getBusiness();
        $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
        $this->data['PaymentArray'] = $this->Common_model->getPayment();
        $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

        $this->data['occupationArray'] = $this->Common_model->getOccupationList();

		$this->data['title']=" Personal Accident Proposal";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_proposal_pa',$this->data);
		$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}		

	}

	public function premiumUpdatePa()
  {

  	 $userdata = array(
			
			'Premium' => $this->input->get_post('Premium'),
			'ServiceTax' => $this->input->get_post('ServiceTax'), 
			'PremiumPayable' => $this->input->get_post('PremiumPayable'),
			'PlanName' => $this->input->get_post('PlanName'),
			'selPlan' => $this->input->get_post('selPlan'),
		);	
	   	$this->session->set_userdata($userdata);
  }

	public function getSessionPa(){
  	$sessionData = array(
  	'pa_FirstName' => $this->session->userdata('pa_FirstName'),
  	'pa_LastName' => $this->session->userdata('pa_LastName'),
  	'pa_dob' => $this->session->userdata('pa_dob'),
  	'pa_city' => $this->session->userdata('pa_city'),
  	'pa_state' => $this->session->userdata('pa_state'),
  	'pa_email' => $this->session->userdata('pa_email'),
  	'pa_mobile' => $this->session->userdata('pa_mobile'),
  	'pa_occupation' => $this->session->userdata('pa_occupation'),

  	'pa_pro_title' => $this->session->userdata('pa_pro_title'),
  	'pa_pro_houseno' => $this->session->userdata('pa_pro_houseno'),
  	'pa_pro_locality' => $this->session->userdata('pa_pro_locality'),
  	'pa_pro_landmark' => $this->session->userdata('pa_pro_landmark'),
  	'pa_pro_emnum' => $this->session->userdata('pa_pro_emnum'),
  	'pa_pro_gstn' => $this->session->userdata('pa_pro_gstn'),
  	'pa_pro_nname' => $this->session->userdata('pa_pro_nname'),
  	'pa_pro_ndob' => $this->session->userdata('pa_pro_ndob'),
   	'pa_pro_relation' => $this->session->userdata('pa_pro_relation'),
   	'pa_pro_policy_sdate' => $this->session->userdata('pa_pro_policy_sdate'),
   
  	);
  	echo json_encode($sessionData);	
  }

  public function paProposalInformation(){


		$userdata = array(

		
			'pa_pro_policy_sdate'=> $this->input->get_post('pa_pro_policy_sdate'),
			'pa_pro_title'=> $this->input->get_post('pa_pro_title'),
			'pa_pro_houseno'=> $this->input->get_post('pa_pro_houseno'),
			'pa_pro_locality'=> $this->input->get_post('pa_pro_locality'),
			'pa_pro_landmark' => $this->input->get_post('pa_pro_landmark'),
			'pa_pro_emnum' => $this->input->get_post('pa_pro_emnum'),
			'pa_pro_gstn' => $this->input->get_post('pa_pro_gstn'),
			'pa_pro_nname' => $this->input->get_post('pa_pro_nname'),
			'pa_pro_ndob' => $this->input->get_post('pa_pro_ndob'),
			'pa_pro_relation' => $this->input->get_post('pa_pro_relation'),
			'pa_pro_emnum'=> $this->input->get_post('pa_pro_emnum'),
			'pa_pro_nname'=> $this->input->get_post('pa_pro_nname'),
			'pa_pro_ndob'=> $this->input->get_post('pa_pro_ndob'),
			'pa_pro_title'=>$this->input->get_post('pa_pro_title'),

			
			
		);	
		$this->session->set_userdata($userdata);

	}


	public function paProposalView(){

		if($this->session->userdata('logged_in') == TRUE) {

  		$familyType = trim($this->session->userdata('pa_spouse'));
		if($familyType == 0)
			$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		$this->data['pa_pro_policy_sdate']=$this->session->userdata('pa_pro_policy_sdate');
		$this->data['pa_FirstName']=$this->session->userdata('pa_FirstName');
		$this->data['pa_LastName']=$this->session->userdata('pa_LastName');
		$this->data['pa_dob']=$this->session->userdata('pa_dob');
		$this->data['pa_city']=$this->session->userdata('pa_city');
		$this->data['pa_state']=$this->session->userdata('pa_state');
		$this->data['pa_email']=$this->session->userdata('pa_email');
		$this->data['pa_mobile']=$this->session->userdata('pa_mobile');
		$this->data['pa_pro_houseno']=$this->session->userdata('pa_pro_houseno');
		$this->data['pa_zip']=$this->session->userdata('pa_zip');
		
		$this->data['PlanName']=$this->session->userdata('PlanName');
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');
			

		$this->data['title']="Personal Accident proposal";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_pa_proposal_view',$this->data);
		$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}		
	
	}


	public function paUpdateProposal(){

		$familyType = trim($this->session->userdata('Spouse_critical'));
		if($familyType == 0)
		$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		$this->data['pa_pro_policy_sdate']=$this->session->userdata('pa_pro_policy_sdate');
		$this->data['pa_FirstName']=$this->session->userdata('pa_FirstName');
		$this->data['pa_pro_title']=$this->session->userdata('pa_pro_title');
		$this->data['pa_LastName']=$this->session->userdata('pa_LastName');
		$this->data['pa_dob']=$this->session->userdata('pa_dob');
		$this->data['pa_city']=$this->session->userdata('pa_city');
		$this->data['pa_state']=$this->session->userdata('pa_state');
		$this->data['pa_email']=$this->session->userdata('pa_email');
		$this->data['pa_mobile']=$this->session->userdata('pa_mobile');
		$this->data['pa_pro_houseno']=$this->session->userdata('pa_pro_houseno');
		$this->data['pa_pro_locality']=$this->session->userdata('pa_pro_locality');
		
		$this->data['pa_pro_landmark']=$this->session->userdata('pa_pro_landmark');
		$this->data['pa_pro_gstn']=$this->session->userdata('pa_pro_gstn');
		$this->data['pa_zip']=$this->session->userdata('pa_zip');
		
		$this->data['pa_occupation']=$this->session->userdata('pa_occupation');
		$this->data['pa_pro_relation']=$this->session->userdata('pa_pro_relation');
		$this->data['pa_pro_nname']=$this->session->userdata('pa_pro_nname');
		$this->data['pa_pro_ndob']=$this->session->userdata('pa_pro_ndob');

		$this->data['OrderNo']=$this->session->userdata('OrderNo');
		$this->data['QuoteNo']=$this->session->userdata('QuoteNo');			
		$this->data['sumInsured']=$this->session->userdata('sumInsured');
		$this->data['cover_code']=$this->session->userdata('cover_code');



		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');



		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Pa_proposal_model->generateQuoteXmlPa($this->data);
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
	

	public function proposalPAResult(){
	
		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['title']="Personal Accident Proposal";
			$this->data['module'] = 'qms'; 

			$this->data['orderNo']=$this->session->userdata('orderNo');
			$this->data['quoteNo']=$this->session->userdata('quoteNo');	
			$this->data['emailId']=$this->session->userdata('pa_email');	
			$this->data['custName']=$this->session->userdata('pa_FirstName');	

		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_result_PA',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}		
	
	
	}


	public function sess_clr() {

         $array_items = array('pa_pro_policy_sdate',
         					  'pa_pro_title',
         					  'pa_pro_houseno',
         					  'pa_pro_locality',
         					  'pa_pro_landmark',
         					  'pa_pro_emnum',
         					  'pa_pro_gstn',
         					  'pa_pro_nname',
         					  'pa_pro_ndob',
         					  'pa_pro_relation',
         					  'pa_pro_nname',
         					  'pa_pro_ndob',
         					  'pa_state',
         					  'pa_city',
         					  'pa_occupation',
         					  'pa_gainful',
         					  'pa_email',
         					  'pa_mobile',
         					  'pa_FirstName',
         					  'pa_LastName',
         					  'pa_dob',
         					  'pa_spouse',
         					  'pa_spouse_dob',
         					  'pa_include_child',
         					  'pa_zip',
         					  'Premium',
         					  'ServiceTax',
         					  'PremiumPayable',
         					  'orderNo',
         					  'quoteNo',
     );

      	$this->session->unset_userdata($array_items);
      	redirect('create-quote-personal-accident', 'refresh');

	 
       
	}



}

