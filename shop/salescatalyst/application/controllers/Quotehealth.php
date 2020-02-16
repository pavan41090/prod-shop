<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotehealth extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Health_model');
	    $this->load->model('Health_proposal_model');
		 
	}

	public function createQuoteHealth(){


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

	   
		$this->data['sub_module'] = 'Health'; 
		$this->data['module'] = 'leads';

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/page_header_inner',$this->data);
		$this->load->view('quote/quote_create_health');
		$this->load->view('layout/footer_inner');


		} else {
			redirect('user', 'refresh');
		}		

	}	




	public function calculatePremiumHealth(){

		$this->data['health_FirstName'] = $this->input->get_post('health_FirstName');
		$this->data['health_LastName'] = $this->input->get_post('health_LastName');
		$this->data['health_mx_DOB'] = $this->input->get_post('health_mx_DOB');
		$this->data['emailhealth'] = $this->input->get_post('emailhealth');
		$this->data['mobilehealth'] = $this->input->get_post('mobilehealth');
		$this->data['occupation'] = $this->input->get_post('occupation');
		$this->data['Spouse_health'] = $this->input->get_post('Spouse_health');
		$this->data['spousedobhealth'] = $this->input->get_post('spousedobhealth');
		$this->data['includechildren'] = $this->input->get_post('includechildren');
		$this->data['health_mx_City'] = $this->input->get_post('health_mx_City');
		$this->data['health_mx_State'] = $this->input->get_post('health_mx_State');
        $this->data['health_mx_Zip'] = $this->input->get_post('health_mx_Zip');
		$this->data['health_mx_Gender'] = $this->input->get_post('health_mx_Customer_Gender');


		$userdata = array(

			
			'emailhealth' => $this->input->get_post('emailhealth'),
            'occupation' => $this->input->get_post('occupation'),
			'Spouse_health' => $this->input->get_post('Spouse_health'),
			'spousedobhealth' => $this->input->get_post('spousedobhealth'),
			'includechildren' => $this->input->get_post('includechildren'),

			'health_mx_Category' => $this->input->get_post('health_mx_Category'),
			'health_mx_Line_of_Business' => $this->input->get_post('health_mx_Line_of_Business'),
			'health_mx_HDFC_Branch_Location' => $this->input->get_post('health_mx_HDFC_Branch_Location'),
			'health_mx_HDFC_Ergo_Location' => $this->input->get_post('health_mx_HDFC_Ergo_Location'),
			'health_mx_Priority' => $this->input->get_post('health_mx_Priority'),
			'health_mx_Target_Date' => $this->input->get_post('health_mx_Target_Date'),
			'health_mx_TSE_BDR_Code' => $this->input->get_post('health_mx_TSE_BDR_Code'),
			'health_mx_TL_Code' => $this->input->get_post('health_mx_TL_Code'),
			'health_mx_SM_Code' => $this->input->get_post('health_mx_SM_Code'),
			'health_mx_Bank_Verifier_ID' => $this->input->get_post('health_mx_Bank_Verifier_ID'),
			'health_mx_Payment_Type' => $this->input->get_post('health_mx_Payment_Type'),
			'health_mx_Sub_Channel' => $this->input->get_post('health_mx_Sub_Channel'),
			'health_mx_HDFC_Card_Relationship_No' => $this->input->get_post('health_mx_HDFC_Card_Relationship_No'),
			'health_mx_HDFC_Card_Last_4_digits' => $this->input->get_post('health_mx_HDFC_Card_Last_4_digits'),
			'health_FirstName' => $this->input->get_post('health_FirstName') ,
			'health_LastName' => $this->input->get_post('health_LastName') ,
			'health_mx_DOB' => $this->input->get_post('health_mx_DOB'),
			'health_mx_Customer_Gender' => $this->input->get_post('health_mx_Customer_Gender'),
			'health_mx_Case_id' => $this->input->get_post('health_mx_Case_id'),
			'health_mx_PAN_Card' => $this->input->get_post('health_mx_PAN_Card'),
			'health_mx_Street1' => $this->input->get_post('health_mx_Street1'),
			'health_mx_Street2' => $this->input->get_post('health_mx_Street2'),
			'health_mx_Area' => $this->input->get_post('health_mx_Area'),
			'health_mx_City' => $this->input->get_post('health_mx_City'),
			'health_mx_State' => $this->input->get_post('health_mx_State'),
			'health_mx_Zip' => $this->input->get_post('health_mx_Zip'),
			'health_Notes' => $this->input->get_post('health_Notes'),
			'emailhealth' => $this->input->get_post('emailhealth'),
			'mobilehealth' => $this->input->get_post('mobilehealth'),
           			
		);	
		

		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Health_model->generateQuoteXmlHealth($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);



		 $apiData = array(
		 	'api_request_health' => $requestXml,
		 	'api_response_health_xml' => $curl,
		 	'api_response_health' => $output,
		 );		
		$this->session->set_userdata($apiData);

	if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}


	public function healthPremium(){

if ($this->session->userdata('logged_in') == TRUE) {		

		$api_request = $this->session->userdata('api_request_health');
		$api_response = $this->session->userdata('api_response_health');
		$api_response_tw_xml = $this->session->userdata('api_request_health_xml');

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
		$coverCodeHigh = '';
		$TotalPremiumHigh = ''; 
		foreach ($premiumArray as $key => $value ){

			$sumInsured = $value['old']['Product']['SumInsured'];
			$coverCode = $value['old']['Product']['ProductCode'];
			$TotalPremium = $value['old']['Product']['PremiumPayable'];

//				if($coverCode != $coverCodeHigh && $TotalPremium > $TotalPremiumHigh ){		
				if($coverCode == 'ESC'){		
			
			switch ($sumInsured) {
					case '200000.00' :
						$hospitalisation = $sumInsured;
						$dayCateTreatment = '100% Covered';
						$roomRentSubmit = 'Normal: 2,000 <br/> ICU/CCU : 3,000';
						$prePostHosp = '30 Days | 60 Days';
						$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 2,0000';
						$hospCashallowance = '<i class="fa fa-rupee"></i> 200 X 10 Days';
						$ambulCharges = '<i class="fa fa-rupee"></i> 1,500';
						$accompanyingPerson  = '<i class="fa fa-rupee"></i> 250 X 5 Days';
						$criticalIllness = ' - ';
						$ambulCharges = '<i class="fa fa-rupee"></i> 1500';
						$transplantationOrgans = ' - ';
						$dreadDisease = ' - ';
						$inpatientPhysiotherapy = ' - ';
//						$ambulCharges = '1500';
//						$ambulCharges = '1500';
					break;

					case '300000.00' :
						$hospitalisation = $sumInsured;
						$dayCateTreatment = '100% Covered';
						$roomRentSubmit = 'Normal: 3,000 <br/> ICU/CCU : 4,500';
						$prePostHosp = '60 Days | 90 Days';
						$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 30,000';
						$hospCashallowance = '<i class="fa fa-rupee"></i> 750 X 30 Days';
						$ambulCharges = '<i class="fa fa-rupee"></i> 2,500';
						$accompanyingPerson = '<i class="fa fa-rupee"></i> 250 X 10 Days';
						$criticalIllness = $sumInsured;
						$transplantationOrgans = ' - ';
						$dreadDisease = ' - ';
						$inpatientPhysiotherapy = '<i class="fa fa-rupee"></i> 1,500';
//						$ambulCharges = '1500';
//						$ambulCharges = '1500';

					break;

					case '400000.00' :
						$hospitalisation = $sumInsured;
						$dayCateTreatment = '100% Covered';
						$roomRentSubmit = '100% Covered';
						$prePostHosp = '60 Days | 90 Days';
						$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 40,000';
						$hospCashallowance = '<i class="fa fa-rupee"></i> 1,000 X 30 Days';
						$ambulCharges = '<i class="fa fa-rupee"></i> 2,500';
						$accompanyingPerson = '<i class="fa fa-rupee"></i> 250 X 10 Days';
						$criticalIllness = $sumInsured;
						$transplantationOrgans = ' - ';
						$dreadDisease = ' - ';
						$inpatientPhysiotherapy = '<i class="fa fa-rupee"></i> 1500';
//						$ambulCharges = '1500';
//						$ambulCharges = '1500';

					break;
					
					case '500000.00' :
						$hospitalisation = $sumInsured;
						$dayCateTreatment = '100% Covered';
						$roomRentSubmit = '100% Covered';
						$prePostHosp = '60 Days | 90 Days';
						$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 50,000';
						$hospCashallowance = '<i class="fa fa-rupee"></i> 1,000 X 30 Days';
						$ambulCharges = '<i class="fa fa-rupee"></i> 2,500';
						$accompanyingPerson = '<i class="fa fa-rupee"></i> 250 X 10 Days';
						$criticalIllness = $sumInsured;
						$transplantationOrgans = ' - ';
						$dreadDisease = ' - ';
						$inpatientPhysiotherapy = '<i class="fa fa-rupee"></i> 1500';
//						$ambulCharges = '1500';
//						$ambulCharges = '1500';

					break;

					default:
						$hospitalisation = '-';
						$dayCateTreatment = '-';
						$roomRentSubmit = '-';
						$prePostHosp = '-';
						$DomiciliaryHosp = '-';
						$hospCashallowance = '-';
						$ambulCharges = '-';
						$accompanyingPerson = '-';
						$criticalIllness = '-';
						$ambultransplantationOrgansCharges = '-';
						$dreadDisease = '-';
						$inpatientPhysiotherapy = '-';
//						$ambulCharges = '-';
//						$ambulCharges = '-';

				}

				$hospitalisationArray[] = array('hospitalisation'=> $hospitalisation, 'help'=>'Cashless Hospitalisation');
				$dayCateTreatmentArray[] = array('dayCateTreatment'=> $dayCateTreatment);
				$roomRentSubmitArray[] = array('roomRentSubmit'=> $roomRentSubmit );
				$prePostHospArray[] = array('prePostHosp'=> $prePostHosp );
				$DomiciliaryHospArray[] = array('DomiciliaryHosp'=> $DomiciliaryHosp );
				$hospCashallowanceArray[] = array('hospCashallowance'=> $hospCashallowance );
				$ambulChargesArray[] = array('ambulCharges'=> $ambulCharges );
				$accompanyingPersonArray[] = array('accompanyingPerson'=> $accompanyingPerson );
				$criticalIllnessArray[] = array('criticalIllness'=> $criticalIllness );
				$transplantationOrgansArray[] = array('transplantationOrgans'=> $transplantationOrgans );
				$dreadDiseaseArray[] = array('dreadDisease'=> $dreadDisease );
				$inpatientPhysiotherapyArray[] = array('inpatientPhysiotherapy'=> $inpatientPhysiotherapy );
//				$ambulChargesArray[] = array('ambulCharges'=> $ambulCharges );
//				$ambulChargesArray[] = array('ambulCharges'=> $ambulCharges );





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

		$premium_choice_array['premium_array'] = $premium_array;
		$premium_choice_array['hospitalisationArray'] = $hospitalisationArray;
		$premium_choice_array['dayCateTreatmentArray'] = $dayCateTreatmentArray;
		$premium_choice_array['roomRentSubmitArray'] = $roomRentSubmitArray;
		$premium_choice_array['prePostHospArray'] = $prePostHospArray;
		$premium_choice_array['DomiciliaryHospArray'] = $DomiciliaryHospArray;
		$premium_choice_array['hospCashallowanceArray'] = $hospCashallowanceArray;
		$premium_choice_array['ambulChargesArray'] = $ambulChargesArray;
		$premium_choice_array['accompanyingPersonArray'] = $accompanyingPersonArray;
		$premium_choice_array['criticalIllnessArray'] = $criticalIllnessArray;
		$premium_choice_array['transplantationOrgansArray'] = $transplantationOrgansArray;
		$premium_choice_array['dreadDiseaseArray'] = $dreadDiseaseArray;
		$premium_choice_array['inpatientPhysiotherapyArray'] = $inpatientPhysiotherapyArray;
		//$premium_choice_array['ambulChargesArray'] = $ambulChargesArray;


		$this->data['premium_choice_array'] = $premium_choice_array;

  // echo '<pre>';
  // print_r($responseExtArray);
  // exit();

		$helpArray = array(



				'Day_caretreatment'=>'This benefit provides for hospitalisation expenses incurred in case of treatment, where 24 hours of hospitalization is not required due to technologically advanced treatment protocol. Some examples of day care treatment include Dialysis, Chemotherapy, Radiotherapy, Eye surgery, Kidney Stone removal, Tonsillectomy etc.',

				'Room_rent'=>'Daily room rent capping is applicable on the Rs. 2 lakh and Rs. 3 lakh plan for 1 Normal Room at 1% of sum insured and , 2> ICU/CCU (Intensive / Critical Care Unit) at 1.5% of sum insured.However room rent capping is not applicable on Rs. 5 lakh sum insured',

				'PrePost_Hospitalisation'=>'Pre-hospitalization covers relevant medical hospitalization expenses incurred prior to hospitalisation fortreatment of disease, illness or injuryduring a period up to the number of days as specified.Pre-hospitalization covers relevant medical hospitalization expenses incurred prior to hospitalisation fortreatment of disease, illness or injuryduring a period up to the number of days as specified.',

				'Domicilliary_Hospitalisation'=>'Domicilliary Hospitalisation',

				'Hospital_CashAllowance'=>'Hospital Cash Allowance provides for payment of a fixed amount per day of hospitalization after the first 3 days as an in-patient in the Hospital / Nursing Home. The benefit table indicates the allowance per day and the maximum number of days.',





				'Ambulance_Charges'=>'Ambulance Charges provides for reimbursement expenses incurred for the insureds transportation by ambulance to and from the Hospital for treatment of disease / illness / injury / critical illness in a Hospital as an in-patient for which a valid claim under this Policy is admissible.',

				'Accompanying_Person'=>'Accompanying Persons Expenses provides for payment of an allowance to the Insured towards expenses incurred on the accompanying person at the Hospital/Nursing Home during his/her hospitalization. The benefit table indicates the allowance per day and the maximum number of days.',


				'Critical_Illnesscover'=>'If the Insured, 30 days after the inception of the policy, is diagnosed for any of the 20 listed critical illness and survives for more than 30 days post such diagnosis, the sum insured shall be payable to the Insured as compensatory benefit. This policy can be taken as a stand-alone cover and in addition to the hospitalization cover.The Critical Illnesses covered under this policy include Cancer, First Heart Attack, Kidney Failure, Stroke, Major Burns, Major Organ Transplantation, Coronary Artery By-pass surgery etc.',

				'Transplantation_OfOrgans'=>'Transplantation of Organs',

				'Dread_Disease'=>'Dread disease Recouperation Benefit',


				'Home_Nursing'=>'This benefit provides for payment to the Insuredan allowance for medical care services of anurse at the residence of the Insured following dischargefrom Hospital after a treatment for a disease / illness / injury / criticalillness for which a valid claim under this Policy is admissible providedsuch medical care services are confirmed as being necessary by theattending Medical Practitioner, subject tothe limit prescribed in the Schedule to this Policy.',

				

				
			);
			$this->data['helpArray'] = $helpArray;


		$this->data['title']="Premium Response Health";
		$this->data['module'] = 'leads';


		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('quote/premium_health',$this->data);
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



	public function qmscreateQuoteHealth(){


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

	   
		$this->data['sub_module'] = 'Health'; 
		

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/qms_page_header_inner',$this->data);
		$this->load->view('qms_quote/qms_quote_create_health');
		$this->load->view('layout/footer_inner');


		} else {
			redirect('user', 'refresh');
		}		

	}	




	public function qmsCalculatePremiumHealth(){

		$this->data['health_FirstName'] = $this->input->get_post('health_first_name');
		$this->data['health_LastName'] = $this->input->get_post('health_last_name');
		$this->data['health_mx_DOB'] = $this->input->get_post('health_dob');
		$this->data['emailhealth'] = $this->input->get_post('health_email');
		$this->data['mobilehealth'] = $this->input->get_post('health_mobile');
		$this->data['occupation'] = $this->input->get_post('health_occupation');
		$this->data['Spouse_health'] = $this->input->get_post('health_spouse_dob_check');
		$this->data['spousedobhealth'] = $this->input->get_post('health_spouse_dob_value');
		$this->data['includechildren'] = $this->input->get_post('health_include_children');
		$this->data['health_mx_City'] = $this->input->get_post('health_city');
		$this->data['health_mx_State'] = $this->input->get_post('health_state');
		$this->data['health_mx_Zip'] = $this->input->get_post('health_zip');
		$this->data['health_mx_Gender'] = $this->input->get_post('health_gender');
       


		$userdata = array(

			'health_zip' => $this->input->get_post('health_zip'),
			'health_gender' => $this->input->get_post('health_gender'),
            'health_occupation' => $this->input->get_post('health_occupation'),
			'Spouse_health' => $this->input->get_post('health_spouse_dob_value'),
			'health_spouse_dob_value' => $this->input->get_post('health_spouse_dob_value'),
			'health_include_children' => $this->input->get_post('health_include_children'),
			'health_spouse_dob_check' => $this->input->get_post('health_spouse_dob_check'),
			'health_FirstName' => $this->input->get_post('health_first_name') ,
			'health_LastName' => $this->input->get_post('health_last_name') ,
			'health_dob' => $this->input->get_post('health_dob'),
			'health_city' => $this->input->get_post('health_city'),
			'health_state' => $this->input->get_post('health_state'),
			'health_email' => $this->input->get_post('health_email'),
			'health_mobile' => $this->input->get_post('health_mobile'),
		);	
		

		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Health_model->generateQuoteXmlHealth($this->data);
	
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);


		 $apiData = array(
		 	'api_request_health' => $requestXml,
		 	'api_response_health_xml' => $curl,
		 	'api_response_health' => $output,
		 );		
		$this->session->set_userdata($apiData);

	    if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}

	public function qmshealthPremium(){

	   if ($this->session->userdata('logged_in') == TRUE) {		

			$api_request = $this->session->userdata('api_request_health');
			$api_response = $this->session->userdata('api_response_health');
			$api_response_tw_xml = $this->session->userdata('api_request_health_xml');

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
			$coverCodeHigh = '';
			$TotalPremiumHigh = ''; 
			foreach ($premiumArray as $key => $value ){

				$sumInsured = $value['old']['Product']['SumInsured'];
				$coverCode = $value['old']['Product']['ProductCode'];
				$TotalPremium = $value['old']['Product']['PremiumPayable'];

				$userdata = array(
					'sumInsured' => $value['old']['Product']['SumInsured'],
					'coverCode' =>$value['old']['Product']['ProductCode'],
					
				);	
				$this->session->set_userdata($userdata);

	//				if($coverCode != $coverCodeHigh && $TotalPremium > $TotalPremiumHigh ){		
					if($coverCode == 'ESC'){		
				
				switch ($sumInsured) {
						case '200000.00' :
							$hospitalisation = $sumInsured;
							$dayCateTreatment = '100% Covered';
							$roomRentSubmit = 'Normal: 2,000 <br/> ICU/CCU : 3,000';
							$prePostHosp = '30 Days | 60 Days';
							$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 2,0000';
							$hospCashallowance = '<i class="fa fa-rupee"></i> 200 X 10 Days';
							$ambulCharges = '<i class="fa fa-rupee"></i> 1,500';
							$accompanyingPerson  = '<i class="fa fa-rupee"></i> 250 X 5 Days';
							$criticalIllness = ' - ';
							$ambulCharges = '<i class="fa fa-rupee"></i> 1500';
							$transplantationOrgans = ' - ';
							$dreadDisease = ' - ';
							$inpatientPhysiotherapy = ' - ';
	//						$ambulCharges = '1500';
	//						$ambulCharges = '1500';
						break;

						case '300000.00' :
							$hospitalisation = $sumInsured;
							$dayCateTreatment = '100% Covered';
							$roomRentSubmit = 'Normal: 3,000 <br/> ICU/CCU : 4,500';
							$prePostHosp = '60 Days | 90 Days';
							$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 30,000';
							$hospCashallowance = '<i class="fa fa-rupee"></i> 750 X 30 Days';
							$ambulCharges = '<i class="fa fa-rupee"></i> 2,500';
							$accompanyingPerson = '<i class="fa fa-rupee"></i> 250 X 10 Days';
							$criticalIllness = $sumInsured;
							$transplantationOrgans = ' - ';
							$dreadDisease = ' - ';
							$inpatientPhysiotherapy = '<i class="fa fa-rupee"></i> 1,500';
	//						$ambulCharges = '1500';
	//						$ambulCharges = '1500';

						break;

						case '400000.00' :
							$hospitalisation = $sumInsured;
							$dayCateTreatment = '100% Covered';
							$roomRentSubmit = '100% Covered';
							$prePostHosp = '60 Days | 90 Days';
							$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 40,000';
							$hospCashallowance = '<i class="fa fa-rupee"></i> 1,000 X 30 Days';
							$ambulCharges = '<i class="fa fa-rupee"></i> 2,500';
							$accompanyingPerson = '<i class="fa fa-rupee"></i> 250 X 10 Days';
							$criticalIllness = $sumInsured;
							$transplantationOrgans = ' - ';
							$dreadDisease = ' - ';
							$inpatientPhysiotherapy = '<i class="fa fa-rupee"></i> 1500';
	//						$ambulCharges = '1500';
	//						$ambulCharges = '1500';

						break;
						
						case '500000.00' :
							$hospitalisation = $sumInsured;
							$dayCateTreatment = '100% Covered';
							$roomRentSubmit = '100% Covered';
							$prePostHosp = '60 Days | 90 Days';
							$DomiciliaryHosp = '<i class="fa fa-rupee"></i> 50,000';
							$hospCashallowance = '<i class="fa fa-rupee"></i> 1,000 X 30 Days';
							$ambulCharges = '<i class="fa fa-rupee"></i> 2,500';
							$accompanyingPerson = '<i class="fa fa-rupee"></i> 250 X 10 Days';
							$criticalIllness = $sumInsured;
							$transplantationOrgans = ' - ';
							$dreadDisease = ' - ';
							$inpatientPhysiotherapy = '<i class="fa fa-rupee"></i> 1500';
	//						$ambulCharges = '1500';
	//						$ambulCharges = '1500';

						break;

						default:
							$hospitalisation = '-';
							$dayCateTreatment = '-';
							$roomRentSubmit = '-';
							$prePostHosp = '-';
							$DomiciliaryHosp = '-';
							$hospCashallowance = '-';
							$ambulCharges = '-';
							$accompanyingPerson = '-';
							$criticalIllness = '-';
							$ambultransplantationOrgansCharges = '-';
							$dreadDisease = '-';
							$inpatientPhysiotherapy = '-';
	//						$ambulCharges = '-';
	//						$ambulCharges = '-';

					}

					$hospitalisationArray[] = array('hospitalisation'=> $hospitalisation, 'help'=>'Cashless Hospitalisation');
					$dayCateTreatmentArray[] = array('dayCateTreatment'=> $dayCateTreatment);
					$roomRentSubmitArray[] = array('roomRentSubmit'=> $roomRentSubmit );
					$prePostHospArray[] = array('prePostHosp'=> $prePostHosp );
					$DomiciliaryHospArray[] = array('DomiciliaryHosp'=> $DomiciliaryHosp );
					$hospCashallowanceArray[] = array('hospCashallowance'=> $hospCashallowance );
					$ambulChargesArray[] = array('ambulCharges'=> $ambulCharges );
					$accompanyingPersonArray[] = array('accompanyingPerson'=> $accompanyingPerson );
					$criticalIllnessArray[] = array('criticalIllness'=> $criticalIllness );
					$transplantationOrgansArray[] = array('transplantationOrgans'=> $transplantationOrgans );
					$dreadDiseaseArray[] = array('dreadDisease'=> $dreadDisease );
					$inpatientPhysiotherapyArray[] = array('inpatientPhysiotherapy'=> $inpatientPhysiotherapy );
	//				$ambulChargesArray[] = array('ambulCharges'=> $ambulCharges );
	//				$ambulChargesArray[] = array('ambulCharges'=> $ambulCharges );

					$coverCodeHigh = $value['old']['Product']['ProductCode'];
					$TotalPremiumHigh = $value['old']['Product']['PremiumPayable'];
					
					//$sumInsured = round($sumInsured, 0);

					$premium_array[] = array(
						'coverCode' 		=> $coverCode.round($sumInsured, 0),
						'SumInsured' 		=> $sumInsured,
						'Premium' 			=> $value['old']['Product']['Premium'],
						'ServiceTax' 		=> $value['old']['Product']['ServiceTax'],
						'TotalPremium' 		=> $TotalPremium,
						'ProductType' 		=> $value['old']['Product']['ProductType'],
					);

			}

		}

		$premium_choice_array['premium_array'] = $premium_array;
		$premium_choice_array['hospitalisationArray'] = $hospitalisationArray;
		$premium_choice_array['dayCateTreatmentArray'] = $dayCateTreatmentArray;
		$premium_choice_array['roomRentSubmitArray'] = $roomRentSubmitArray;
		$premium_choice_array['prePostHospArray'] = $prePostHospArray;
		$premium_choice_array['DomiciliaryHospArray'] = $DomiciliaryHospArray;
		$premium_choice_array['hospCashallowanceArray'] = $hospCashallowanceArray;
		$premium_choice_array['ambulChargesArray'] = $ambulChargesArray;
		$premium_choice_array['accompanyingPersonArray'] = $accompanyingPersonArray;
		$premium_choice_array['criticalIllnessArray'] = $criticalIllnessArray;
		$premium_choice_array['transplantationOrgansArray'] = $transplantationOrgansArray;
		$premium_choice_array['dreadDiseaseArray'] = $dreadDiseaseArray;
		$premium_choice_array['inpatientPhysiotherapyArray'] = $inpatientPhysiotherapyArray;
		//$premium_choice_array['ambulChargesArray'] = $ambulChargesArray;

		$this->data['premium_choice_array'] = $premium_choice_array;

		$helpArray = array(

				'Day_caretreatment'=>'This benefit provides for hospitalisation expenses incurred in case of treatment, where 24 hours of hospitalization is not required due to technologically advanced treatment protocol. Some examples of day care treatment include Dialysis, Chemotherapy, Radiotherapy, Eye surgery, Kidney Stone removal, Tonsillectomy etc.',

				'Room_rent'=>'Daily room rent capping is applicable on the Rs. 2 lakh and Rs. 3 lakh plan for 1 Normal Room at 1% of sum insured and , 2> ICU/CCU (Intensive / Critical Care Unit) at 1.5% of sum insured.However room rent capping is not applicable on Rs. 5 lakh sum insured',

				'PrePost_Hospitalisation'=>'Pre-hospitalization covers relevant medical hospitalization expenses incurred prior to hospitalisation fortreatment of disease, illness or injuryduring a period up to the number of days as specified.Pre-hospitalization covers relevant medical hospitalization expenses incurred prior to hospitalisation fortreatment of disease, illness or injuryduring a period up to the number of days as specified.',

				'Domicilliary_Hospitalisation'=>'Domicilliary Hospitalisation',

				'Hospital_CashAllowance'=>'Hospital Cash Allowance provides for payment of a fixed amount per day of hospitalization after the first 3 days as an in-patient in the Hospital / Nursing Home. The benefit table indicates the allowance per day and the maximum number of days.',

				'Ambulance_Charges'=>'Ambulance Charges provides for reimbursement expenses incurred for the insureds transportation by ambulance to and from the Hospital for treatment of disease / illness / injury / critical illness in a Hospital as an in-patient for which a valid claim under this Policy is admissible.',

				'Accompanying_Person'=>'Accompanying Persons Expenses provides for payment of an allowance to the Insured towards expenses incurred on the accompanying person at the Hospital/Nursing Home during his/her hospitalization. The benefit table indicates the allowance per day and the maximum number of days.',

				'Critical_Illnesscover'=>'If the Insured, 30 days after the inception of the policy, is diagnosed for any of the 20 listed critical illness and survives for more than 30 days post such diagnosis, the sum insured shall be payable to the Insured as compensatory benefit. This policy can be taken as a stand-alone cover and in addition to the hospitalization cover.The Critical Illnesses covered under this policy include Cancer, First Heart Attack, Kidney Failure, Stroke, Major Burns, Major Organ Transplantation, Coronary Artery By-pass surgery etc.',

				'Transplantation_OfOrgans'=>'Transplantation of Organs',

				'Dread_Disease'=>'Dread disease Recouperation Benefit',

				'Home_Nursing'=>'This benefit provides for payment to the Insuredan allowance for medical care services of anurse at the residence of the Insured following dischargefrom Hospital after a treatment for a disease / illness / injury / criticalillness for which a valid claim under this Policy is admissible providedsuch medical care services are confirmed as being necessary by theattending Medical Practitioner, subject tothe limit prescribed in the Schedule to this Policy.',
			);
			$this->data['helpArray'] = $helpArray;
			$this->data['title']="Premium Response Health";
			$this->data['module'] = 'leads';

		// echo '<pre>';
		// print_r($this->data);
		// exit();

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_quote/qms_premium_health',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}

	}		


  // public function premiumUpdateHealth()
  // {

  // 	 $userdata = array(
			
		// 	'Premium' => $this->input->get_post('Premium'),
		// 	'ServiceTax' => $this->input->get_post('ServiceTax'),
		// 	'PremiumPayable' => $this->input->get_post('PremiumPayable'),
		// 	'selectedPlanCode' => substr($this->input->get_post('selectedPlan'), 0, 3),
		// 	'selectedPlanName' => $this->input->get_post('selectedPlanName'),
		// 	'selectedSumInsured' => substr($this->input->get_post('selectedSumInsured'), 3),

		// );	

		// $this->session->set_userdata($userdata);
  // 	}




	public function healthProposal()
	{

		if($this->session->userdata('logged_in') == TRUE) {
		    $this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['title']="Personal Accident Health";
			$this->data['module'] = 'qms'; 
		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_health',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}	

	}


	public function getSessionValuesHealth()
 	{
    	$sessionData = array(
   		   'helth_first_name' => $this->session->userdata('health_FirstName'),
   		   'helth_last_name' => $this->session->userdata('health_LastName'),
   		   'helth_dob' => $this->session->userdata('health_dob'),
   		   'helth_pro_state' => $this->session->userdata('health_state'),
   		   'helth_pro_city' => $this->session->userdata('health_city'),
   		   'helth_pro_zip' => $this->session->userdata('health_zip'),
   		   'helth_pro_mobile' => $this->session->userdata('health_mobile'),
   		   'helth_pro_email' => $this->session->userdata('health_email'),
   		   'helth_pro_occupation' => $this->session->userdata('health_occupation'),
   		   'helth_pro_gender' => $this->session->userdata('health_gender'),

   		   'helth_pro_add1' => $this->session->userdata('helth_pro_add1'),
   		   'helth_pro_add2' => $this->session->userdata('helth_pro_add2'),
   		   'helth_pro_nland' => $this->session->userdata('helth_pro_nland'),
   		   'helth_pro_policy_start' => $this->session->userdata('helth_pro_policy_start'),
   		   'helth_pro_title' => $this->session->userdata('helth_pro_title'),
   		   'helth_pro_emergency' => $this->session->userdata('helth_pro_emergency'),
   		   'helth_pro_gstn' => $this->session->userdata('helth_pro_gstn'),
   		   'helth_pro_height' => $this->session->userdata('helth_pro_height'),
   		   'helth_pro_Weight' => $this->session->userdata('helth_pro_Weight'),

   		   // 'helth_pro_nname' => $this->session->userdata('helth_pro_nname'),
   		   // 'helth_pro_nomie_relation' => $this->session->userdata('helth_pro_nomie_relation'),
   		   // 'helth_pro_nameofappoint' => $this->session->userdata('helth_pro_nameofappoint'),
   		   // 'helth_pro_appoint_relation' => $this->session->userdata('helth_pro_appoint_relation'),

   		   // 'helth_pro_dname' => $this->session->userdata('helth_pro_dname'),
   		   // 'helth_pro_qualifi' => $this->session->userdata('helth_pro_qualifi'),
   		   // 'helth_pro_dadds' => $this->session->userdata('helth_pro_dadds'),
   		   // 'helth_pro_dmobile' => $this->session->userdata('helth_pro_dmobile'),
   		   // 'helth_pro_chmobile' => $this->session->userdata('helth_pro_chmobile'),

   		   'helth_pro_pinsured' => $this->session->userdata('helth_pro_pinsured'),
   		   'helth_pro_yname' => $this->session->userdata('helth_pro_yname'),
   		   'helth_pro_drive_prirelation' => $this->session->userdata('helth_pro_drive_prirelation'),
   		   'helth_pro_pdob' => $this->session->userdata('helth_pro_pdob'),
   		   'helth_pro_pgender' => $this->session->userdata('helth_pro_pgender'),
   		   'helth_pro_padd1' => $this->session->userdata('helth_pro_padd1'),
   		   'helth_pro_padd2' => $this->session->userdata('helth_pro_padd2'),
   		   'helth_pro_pnland' => $this->session->userdata('helth_pro_pnland'),
   		   'helth_pro_pemail' => $this->session->userdata('helth_pro_pemail'),
   		   'helth_pro_nationalty' => $this->session->userdata('helth_pro_nationalty'),
   		   'helth_pro_poccupation' => $this->session->userdata('helth_pro_poccupation'),
   		   'helth_pro_incomein' => $this->session->userdata('helth_pro_incomein'),
   		   'helth_pro_ppc' => $this->session->userdata('helth_pro_ppc'),

   		   // 'helth_pro_bankname' => $this->session->userdata('helth_pro_bankname'),
   		   // 'helth_pro_ifsc' => $this->session->userdata('helth_pro_ifsc'),
   		   // 'helth_pro_bbranch' => $this->session->userdata('helth_pro_bbranch'),
   		   // 'helth_pro_Aholname' => $this->session->userdata('helth_pro_Aholname'),
   		   // 'helth_pro_ano' => $this->session->userdata('helth_pro_ano'),
  		);
  		echo json_encode($sessionData);	
	}

	public function premiumUpdateHealth()
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

	public function healthProposalInfommation(){


		$userdata = array(
			'helth_pro_add1' => $this->input->get_post('helth_pro_add1'),
			'helth_pro_add2' => $this->input->get_post('helth_pro_add2'),
			'helth_pro_policy_start' => $this->input->get_post('helth_pro_policy_start'),
			'helth_pro_title' => $this->input->get_post('helth_pro_title'),
			'helth_pro_emergency' => $this->input->get_post('helth_pro_emergency'),
			'helth_pro_gstn' => $this->input->get_post('helth_pro_gstn'),
			'helth_pro_height' => $this->input->get_post('helth_pro_height'),
			'helth_pro_Weight' => $this->input->get_post('helth_pro_Weight'),
			
			// 'helth_pro_nname' => $this->input->get_post('helth_pro_nname'),
			// 'helth_pro_nomie_relation' => $this->input->get_post('helth_pro_nomie_relation'),
			// 'helth_pro_nameofappoint' => $this->input->get_post('helth_pro_nameofappoint'),
			// 'helth_pro_appoint_relation' => $this->input->get_post('helth_pro_appoint_relation'),
			'helth_pro_nland' => $this->input->get_post('helth_pro_nland'),

			'helth_pro_dname' => $this->input->get_post('helth_pro_dname'),
			'helth_pro_qualifi' => $this->input->get_post('helth_pro_qualifi'),
			'helth_pro_dadds' => $this->input->get_post('helth_pro_dadds'),
			'helth_pro_dmobile' => $this->input->get_post('helth_pro_dmobile'),
			'helth_pro_chmobile' => $this->input->get_post('helth_pro_chmobile'),

			'helth_pro_pinsured' => $this->input->get_post('helth_pro_pinsured'),
			'helth_pro_yname' => $this->input->get_post('helth_pro_yname'),
			'helth_pro_drive_prirelation' => $this->input->get_post('helth_pro_drive_prirelation'),
			'helth_pro_pdob' => $this->input->get_post('helth_pro_pdob'),
			'helth_pro_pgender' => $this->input->get_post('helth_pro_pgender'),
			'helth_pro_padd1' => $this->input->get_post('helth_pro_padd1'),
			'helth_pro_padd2' => $this->input->get_post('helth_pro_padd2'),
			'helth_pro_pnland' => $this->input->get_post('helth_pro_pnland'),
			'helth_pro_pemail' => $this->input->get_post('helth_pro_pemail'),
			'helth_pro_nationalty' => $this->input->get_post('helth_pro_nationalty'),
			'helth_pro_poccupation' => $this->input->get_post('helth_pro_poccupation'),
			'helth_pro_incomein' => $this->input->get_post('helth_pro_incomein'),
			'helth_pro_ppc' => $this->input->get_post('helth_pro_ppc'),

			// 'helth_pro_bankname' => $this->input->get_post('helth_pro_bankname'),
			// 'helth_pro_ifsc' => $this->input->get_post('helth_pro_ifsc'),
			// 'helth_pro_bbranch' => $this->input->get_post('helth_pro_bbranch'),
			// 'helth_pro_Aholname' => $this->input->get_post('helth_pro_Aholname'),
			// 'helth_pro_ano' => $this->input->get_post('helth_pro_ano'),
		

		);	
		$this->session->set_userdata($userdata);
		
	}

	public function viewPropsalHealth(){

		if($this->session->userdata('logged_in') == TRUE) {

			$familyType = trim($this->session->userdata('health_spouse_dob_check'));
		if($familyType == 0)
			$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;


		           
		
		$this->data['health_FirstName']=$this->session->userdata('health_FirstName');
		$this->data['health_LastName']=$this->session->userdata('health_LastName');
		$this->data['health_dob']=$this->session->userdata('health_dob');
		$this->data['health_state']=$this->session->userdata('health_state');
		$this->data['health_city']=$this->session->userdata('health_city');
		$this->data['health_zip']=$this->session->userdata('health_zip');
		$this->data['health_mobile']=$this->session->userdata('health_mobile');
		$this->data['health_email']=$this->session->userdata('health_email');
 		$this->data['helth_pro_add1']=$this->session->userdata('helth_pro_add1');
		$this->data['helth_pro_policy_start']=$this->session->userdata('helth_pro_policy_start');
		$this->data['helth_pro_title']=$this->session->userdata('helth_pro_title');

		$this->data['PlanName']=$this->session->userdata('PlanName');
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');

		
		$this->data['title']="Kindly review your Health proposal";
		$this->data['module'] = 'qms'; 

		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_health_proposal_view',$this->data);
		$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}	
		

	}

	public function healthUpdateProposal(){

			$familyType = trim($this->session->userdata('Spouse_critical'));
		if($familyType == 0)
			$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		$this->data['helth_pro_policy_start']=$this->session->userdata('helth_pro_policy_start');
		$this->data['health_FirstName']=$this->session->userdata('health_FirstName');
		$this->data['health_LastName']=$this->session->userdata('health_LastName');
		$this->data['health_dob']=$this->session->userdata('health_dob');
		$this->data['health_city']=$this->session->userdata('health_city');
		$this->data['health_state']=$this->session->userdata('health_state');
		$this->data['health_email']=$this->session->userdata('health_email');
		$this->data['health_mobile']=$this->session->userdata('health_mobile');
		$this->data['helth_pro_add1']=$this->session->userdata('helth_pro_add1');
		$this->data['helth_pro_add2']=$this->session->userdata('helth_pro_add2');

		$this->data['helth_pro_title']=$this->session->userdata('helth_pro_title');
		
		$this->data['helth_pro_nland']=$this->session->userdata('helth_pro_nland');
		$this->data['helth_pro_gstn']=$this->session->userdata('helth_pro_gstn');
		$this->data['health_zip']=$this->session->userdata('health_zip');

		$this->data['OrderNo']=$this->session->userdata('OrderNo');
		$this->data['QuoteNo']=$this->session->userdata('QuoteNo');			
		$this->data['sumInsured']=$this->session->userdata('selectedSumInsured');	
		$this->data['coverCode']=$this->session->userdata('selectedPlanCode');

		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');



		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Health_proposal_model->generatePropsalXmlHealth($this->data);


		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		
		$responseArray =  $output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body'];

 //  

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

	
	public function proposalHealthResult(){
	
		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['title']="Health Proposal";
			$this->data['module'] = 'qms'; 

			$this->data['orderNo']=$this->session->userdata('orderNo');
			$this->data['quoteNo']=$this->session->userdata('quoteNo');	
			$this->data['emailId']=$this->session->userdata('health_email');	
			$this->data['custName']=$this->session->userdata('health_FirstName');	

		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_result_health',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}		
	
	
	}


	public function sess_clrHealth() {

		 
         $array_items = array('health_FirstName',
         					  'health_LastName',
         					  'health_dob',
         					  'health_state',
         					  'health_city',
         					  'health_zip',
         					  'health_mobile',
         					  'health_email',
         					  'health_occupation',
         					  'health_gender',
         					  'helth_pro_add1',
         					  'helth_pro_add2',
         					  'helth_pro_nland',
         					  'helth_pro_policy_start',
         					  'helth_pro_title',
         					  'helth_pro_emergency',
         					  'helth_pro_gstn',
         					  'helth_pro_height',
         					  'helth_pro_Weight',
         					  'helth_pro_pinsured',
         					  'helth_pro_yname',
         					  'helth_pro_drive_prirelation',
         					  'helth_pro_pdob',
         					  'helth_pro_pgender',
         					  'helth_pro_padd1',
         					  'helth_pro_padd2',
         					  'helth_pro_pnland',
         					  'helth_pro_pemail',
         					  'helth_pro_nationalty',
         					  'helth_pro_poccupation',
         					  'helth_pro_incomein',
         					  'helth_pro_ppc',
         					  'Premium',
         					  'ServiceTax',
         					  'PremiumPayable',
         					  'orderNo',
         					  'quoteNo',
     );

      	$this->session->unset_userdata($array_items);
      	redirect('create-quote-health', 'refresh');

	 
       
	}

}

