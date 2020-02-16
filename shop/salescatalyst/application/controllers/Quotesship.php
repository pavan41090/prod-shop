<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotesship extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Sship_model');
	    $this->load->model('Sship_proposal_model');
	    
		 
	}

	public function createQuotesship(){

		if($this->session->userdata('logged_in') == TRUE) {
			$this->data['city'] = $this->Common_model->getCityList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
			$this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();

			$this->data['sub_module'] = 'Super Ship'; 
			$this->data['module'] = 'leads'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/page_header_inner',$this->data);
			$this->load->view('quote/quote_create_sship');
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}		

	}	




	public function calculatePremiumsship(){
		$this->data['sship_FirstName'] = $this->input->get_post('sship_FirstName');
		$this->data['sship_LastName'] = $this->input->get_post('sship_LastName');
		$this->data['sship_mx_DOB'] = $this->input->get_post('sship_mx_DOB');
		$this->data['ship_mx_State'] = $this->input->get_post('ship_mx_State');
		$this->data['ship_mx_City'] = $this->input->get_post('ship_mx_City');
		$this->data['emailsupership'] = $this->input->get_post('emailsupership');
		$this->data['mobilesupership'] = $this->input->get_post('mobilesupership');
		$this->data['sship_mx_Zip'] = $this->input->get_post('sship_mx_Zip');
		$this->data['sship_income'] = $this->input->get_post('sship_income');
		$this->data['policyterm'] = $this->input->get_post('policyterm');

		$this->data['Spouse_ship'] = $this->input->get_post('Spouse_ship');
		$this->data['spousedobship'] = $this->input->get_post('spousedobship');
		$this->data['includechildren'] = $this->input->get_post('includechildren');


		$userdata = array(
			'sship_FirstName' => $this->input->get_post('sship_FirstName'),
			'sship_LastName' => $this->input->get_post('sship_LastName'),
			'sship_mx_DOB' => $this->input->get_post('sship_mx_DOB'),
			'sship_income' => $this->input->get_post('sship_income'),
			'sship_spouse' => $this->input->get_post('sship_spouse'),
			'ship_mx_State' => $this->input->get_post('ship_mx_State'),
			'ship_mx_City' => $this->input->get_post('ship_mx_City'),
			'emailsupership' => $this->input->get_post('emailsupership'),
			'mobilesupership' => $this->input->get_post('mobilesupership'),
			'policyterm' => $this->input->get_post('policyterm'),
			'noofchildrens' => $this->input->get_post('noofchildrens'),

			'sship_mx_Category' => $this->input->get_post('sship_mx_Category'),
			'sship_mx_Line_of_Business' => $this->input->get_post('sship_mx_Line_of_Business'),
			'sship_mx_HDFC_Branch_Location' => $this->input->get_post('sship_mx_HDFC_Branch_Location'),
			'sship_mx_HDFC_Ergo_Location' => $this->input->get_post('sship_mx_HDFC_Ergo_Location'),
			'sship_mx_Priority' => $this->input->get_post('sship_mx_Priority'),
			'sship_mx_Target_Date' => $this->input->get_post('sship_mx_Target_Date'),
			'sship_mx_TSE_BDR_Code' => $this->input->get_post('sship_mx_TSE_BDR_Code'),
			'sship_mx_TL_Code' => $this->input->get_post('sship_mx_TL_Code'),
			'sship_mx_SM_Code' => $this->input->get_post('sship_mx_SM_Code'),
			'sship_mx_Bank_Verifier_ID' => $this->input->get_post('sship_mx_Bank_Verifier_ID'),
			'sship_mx_Payment_Type' => $this->input->get_post('sship_mx_Payment_Type'),
			'sship_mx_Sub_Channel' => $this->input->get_post('sship_mx_Sub_Channel'),
			'sship_mx_HDFC_Card_Relationship_No' => $this->input->get_post('sship_mx_HDFC_Card_Relationship_No'),
			'sship_mx_HDFC_Card_Last_4_digits' => $this->input->get_post('sship_mx_HDFC_Card_Last_4_digits'),
			'sship_mx_Customer_Gender' => $this->input->get_post('sship_mx_Customer_Gender'),
			'sship_mx_Case_id' => $this->input->get_post('sship_mx_Case_id'),
			'sship_mx_PAN_Card' => $this->input->get_post('sship_mx_PAN_Card'),
			'sship_mx_Street1' => $this->input->get_post('sship_mx_Street1'),
			'sship_mx_Street2' => $this->input->get_post('sship_mx_Street2'),
			'sship_mx_Area' => $this->input->get_post('sship_mx_Area'),
			'sship_mx_Zip' => $this->input->get_post('sship_mx_Zip'),
			'sship_Notes' => $this->input->get_post('sship_Notes'),
			
            'policytypesship' => $this->input->get_post('policytypesship'),			
		);	
		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Sship_model->generateQuoteXmlsship($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

// print_r($output);
// exit();

		 $apiData = array(
		 	'api_request_ship' => $requestXml,
		 	'api_response_ship_xml' => $curl,
		 	'api_response_ship' => $output,
		 );		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
		}

	}


	public function SShipPremium(){
		
		if($this->session->userdata('logged_in') == TRUE) {

		$api_request = $this->session->userdata('api_request_ship');
		$api_response = $this->session->userdata('api_response_ship');
		$api_response_ship_xml = $this->session->userdata('api_response_ship_xml');
     
	     // echo '<pre>';
	     // print_r($api_request);
	     // exit();

       $responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];
		$premiumResponseArray = $responseExtArray['PremiumSet']['tuple'];


     	$this->data['OrderNo'] = $responseExtArray['OrderNo'];
		$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];

		$premiumArray = array();
		
		$premiumCSSArray = array();
		$premiumUSSArray = array();
		$premiumVSSArray = array();
		foreach ($premiumResponseArray as $key => $value ){
			$productCode = $value['old']['Product']['ProductCode'];

			switch ($productCode) {
				case 'CSS' :
					$premiumCSSArray[] = array(
						'product_code' => $productCode, 
						'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
						'ServiceTax' => $value['old']['Product']['ServiceTax'], 
						'Premium' => $value['old']['Product']['Premium'], 
						'SumInsured' => $value['old']['Product']['SumInsured'], 
						'shortSI'=> $this->Common_model->convertFormat($value['old']['Product']['SumInsured']),

						);
					break;
				case 'USS' :
					$sumInsured = $value['old']['Product']['SumInsured'];
					if($sumInsured == '2000000.00' || $sumInsured == '3000000.00') {

						$premiumUSSBasicArray[] = array(
							'product_code' => $productCode, 
							'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
							'ServiceTax' => $value['old']['Product']['ServiceTax'], 
							'Premium' => $value['old']['Product']['Premium'], 
							'SumInsured' => $sumInsured, 
							'shortSI'=> $this->Common_model->convertFormat($sumInsured), 

						);

					} else { 

						$premiumUSSArray[] = array(
							'product_code' => $productCode, 
							'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
							'ServiceTax' => $value['old']['Product']['ServiceTax'], 
							'Premium' => $value['old']['Product']['Premium'], 
							'SumInsured' => $sumInsured, 
							'shortSI'=> $this->Common_model->convertFormat($sumInsured), 

						);
					}


				break;
				case 'VSS' :
					$premiumVSSArray[] = array(
						'product_code' => $productCode, 
						'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
						'ServiceTax' => $value['old']['Product']['ServiceTax'], 
						'Premium' => $value['old']['Product']['Premium'], 
						'SumInsured' => $value['old']['Product']['SumInsured'], 
						'shortSI' => $this->Common_model->convertFormat($value['old']['Product']['SumInsured']), 
						);
				break;
				
				default:
					$TotalDisablement = '-';
					$PartialDisablement = '-';
					$HospitalDailyCash = '-';
					$IndemnityBenefit = '-';
				}
		}

		$premiumArray = array(
			'premiumVSSArray' => $premiumVSSArray,
			'premiumCSSArray' => $premiumCSSArray,
			'premiumUSSBasicArray'=>$premiumUSSBasicArray,
			'premiumUSSArray' => $premiumUSSArray,

		);
		
		$this->data['premiumArray'] = $premiumArray;
		$inpatientTreatmentArray = array();
		$preHospitalizationArray = array();
		$postHospitalizationArray = array();

		$organDonorArray = array();
		$dayCareArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();

		foreach ($premiumArray as $key => $pr) {

			switch ($key) {
					case 'premiumVSSArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3000/- Event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => 'N A');
						$outpatientemergencyArray[] = array('outpatientemergency' => 'N A');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'N A');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'N A');

					break;

					case 'premiumCSSArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3,000/- event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => '10,000/- (On continues 10 days hospitalization or more)');
						$outpatientemergencyArray[] = array('outpatientemergency' => '2,500/-');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'N A');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'N A');

					break;

					case 'premiumUSSBasicArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3,000/- Event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => '15,000/-(On continues 10 days hospitalization or more)');
						$outpatientemergencyArray[] = array('outpatientemergency' => '10,000/-');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'Upto Rs. 1,00,000/-');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'Rs.5,000/-');

					break;

					case 'premiumUSSArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3,000/- Event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => '20,000/- (On continues 10 days hospitalization or more)');
						$outpatientemergencyArray[] = array('outpatientemergency' => '10,000/-');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'Upto Rs. 2,00,000/-');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'Rs.7,500/-');

					break;
					
					default:
			}

		}

		$premium_choice_array = array(
			'inpatientTreatmentArray'=>$inpatientTreatmentArray,
			'preHospitalizationArray'=>$preHospitalizationArray,
			'postHospitalizationArray'=>$postHospitalizationArray,
			'organDonorArray'=>$organDonorArray,
			'ayushArray'=>$ayushArray,
			'dayCareArray'=>$dayCareArray,
			'domiciliaryHospitalizationArray'=>$domiciliaryHospitalizationArray,
			'emergencyAmbulanceArray'=>$emergencyAmbulanceArray,
			'restorationInsuredArray'=>$restorationInsuredArray,
			'convalescenceBenefitArray'=>$convalescenceBenefitArray,
			'outpatientemergencyArray'=>$outpatientemergencyArray,
			'domesticAirAmbulanceArray'=>$domesticAirAmbulanceArray,
			'outpatientDentalemergencyArray'=>$outpatientDentalemergencyArray
		);


$helpArray = array(
				'In_patient_treatment'=>'Covers hospitalisation expenses for period more than 24 hrs..',
				
				'Pre_hospitalization'=>'Medical Expenses incurred in 60 days before the hospitalisation.',

				'Post_hospitalization'=>'Medical Expenses incurred in 90 days after the hospitalisation..',
				
				'Organ_Donor'=>'Medical Expenses on harvesting the organ from the donor for organ transplantation.',

				'Day_careTreatment'=>'Medical Expenses of Day care procedures.',

				'Ayush_Treatment'=>'Medical Expenses for in-patient treatment taken under Ayurveda, Yogic, Unani, Sidha and Homeopathy.',

				'Domiciliary_Hospitalization'=>'Medical Expenses incurred for availing medical treatment at home which would otherwise have required hospitalisation.',

				'Emergency_Surface'=>'Covers expenses incurred for surface transport by ambulance to hospital or between hospitals and/or diagnostic centre for treatment of disease, Illness or Injury in a Hospital as an in-patient.',

				'Restoration_Insured'=>'Re-instatement of hundred percent of the Sum Insured in case where the Sum Insured and No claim bonus are exhausted due to claims made and paid during the Policy Year.',

				'Convalescence_Benefit'=>'Provides for payment of a fixed allowance in case of hospitalization for a continuous period of 10 days or more for treatment for any disease / illness / injury.',

				'Animal_bite'=>'Covers medical expenses of OPD Treatment for vaccinations or immunizations for treatment post an animal bite. This benefit is available only on reimbursement basis.',

				'Outpatient_emergency'=>'Provides for reimbursement of medical expenses incurred towards emergency treatment by a Medical Practitioner for the Insured / Insured Person following an accidental Injury and only if such Emergency Treatment is administered within 24 hours following the accident.',

				'Domestic_Ambulance'=>'Covers expenses of transportation in an airplane or helicopter which is certified to use as an ambulance for Emergency care which require immediate and rapid transportation from the site of first occurrence of the illness / accident to the nearest hospital within a reasonable timeframe.',

				'Outpatient_Dental'=>'Provides for reimbursement of medical expenses incurred towards emergency treatment given by a Dentist following an accident where the Insured / Insured Person suffer injuries or damage to his/her natural teeth and/or gums. Also covers for medical expenses incurred for follow up treatment up to a maximum of 15 days.',

				'Hospital_allowance'=>'Daily cash amount upto to a maximum of 30 days if the hospitalization exceeds for more than 24 hours. First continuous and completed period of 24 hours will act as deductible.',

				'Maternity_Benefit'=>'Covers the medical expenses including (after a waiting period of 9months with the company) for the delivery of a baby and / or expenses related to medically recommended lawful termination of pregnancy but only in life threatening situation under the advice of Medical Practitioner, limited to maximum of two deliveries or terminations during the lifetime of an Insured Person between the ages of 18 years to 45 years (being the age of eldest member in the policy). This is available only with 3 yr. policy term.',

				'New_Baby'=>'Covers medical expenses for any medically necessary treatment described in in-patient care section for the the Newborn baby) the Policy Period within first 90 days of birth.',

				'Lump_sum'=>'Lumpsum benefit for listed Critical Illness, subject to first diagnosed during the policy period and the Insured Person survives 30 days after such diagnosis. Critical illness benefit will lapse after reporting of and payment of one claim for the claiming Insured/Insured person.',

				
			);
			$this->data['helpArray'] = $helpArray;

		$this->data['premium_choice_array'] = $premium_choice_array;

		$this->data['title']="Premium Response Super-Ship";
		$this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('quote/premium_sship',$this->data);
		$this->load->view('layout/footer_inner');



		} else {
			redirect('user', 'refresh');
		}		


	}		


	


// qms start


public function qmsCreateQuotesship(){

		if($this->session->userdata('logged_in') == TRUE) {
			$this->data['city'] = $this->Common_model->getCityList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
			$this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();

			$this->data['sub_module'] = 'Super Ship'; 
			$this->data['module'] = 'qms'; 
			
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/qms_page_header_inner',$this->data);
		$this->load->view('qms_quote/qms_quote_create_sship');
		$this->load->view('layout/footer_inner');


		} else {
			redirect('user', 'refresh');
		}		

	}	


public function qmsCalculatePremiumSship(){

		$this->data['sship_FirstName'] = $this->input->get_post('sship_first_name');
		$this->data['sship_LastName'] = $this->input->get_post('sship_last_name');
		$this->data['sship_mx_DOB'] = $this->input->get_post('sship_dob');
		$this->data['ship_mx_State'] = $this->input->get_post('sship_state');
		$this->data['ship_mx_City'] = $this->input->get_post('sship_city');
		$this->data['emailsupership'] = $this->input->get_post('sship_email');
		$this->data['mobilesupership'] = $this->input->get_post('sship_mobile');
		$this->data['sship_income'] = $this->input->get_post('sship_income');
		$this->data['policyterm'] = $this->input->get_post('sship_policy_term');
		$this->data['Spouse_ship'] = $this->input->get_post('sship_include_spouse');
		$this->data['spousedobship'] = $this->input->get_post('sship_spouse_dob');
		$this->data['includechildren'] = $this->input->get_post('sship_include_child');
		$this->data['sship_mx_Zip'] = $this->input->get_post('sship_zip');

		$userdata = array(
			'sship_FirstName' => $this->input->get_post('sship_first_name'),
			'sship_LastName' => $this->input->get_post('sship_last_name'),
			'sship_mx_DOB' => $this->input->get_post('sship_dob'),
			'sship_income' => $this->input->get_post('sship_income'),
			'sship_spouse' => $this->input->get_post('sship_spouse'),
			'sship_state' => $this->input->get_post('sship_state'),
			'sship_city' => $this->input->get_post('sship_city'),
			'sship_email' => $this->input->get_post('sship_email'),
			'sship_mobile' => $this->input->get_post('sship_mobile'),
			'sship_zip' => $this->input->get_post('sship_zip'),
			'policyterm' => $this->input->get_post('policyterm'),
			'noofchildrens' => $this->input->get_post('noofchildrens'),
			'policyterm' => $this->input->get_post('sship_policy_term'),
			

		);	
		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		$requestXml = $this->Sship_model->generateQuoteXmlsship($this->data);

// print_r($requestXml);
// exit();	

		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);
		$apiData = array(
		 	'api_request_ship' => $requestXml,
		 	'api_response_ship_xml' => $curl,
		 	'api_response_ship' => $output,
		 );		
		$this->session->set_userdata($apiData);
		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
		}

	}


	public function qmsSshipPremium(){
		
	if($this->session->userdata('logged_in') == TRUE) {

		$api_request = $this->session->userdata('api_request_ship');
		$api_response = $this->session->userdata('api_response_ship');
		$api_response_ship_xml = $this->session->userdata('api_response_ship_xml');
     
       $responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];
		$premiumResponseArray = $responseExtArray['PremiumSet']['tuple'];


     	$this->data['orderNo'] = $responseExtArray['OrderNo'];
		$this->data['quoteNo'] = $responseExtArray['QuoteNo'];

		 $userdata = array(
				'OrderNo' => $responseExtArray['OrderNo'],
				'QuoteNo' => $responseExtArray['QuoteNo'],
			);	
			$this->session->set_userdata($userdata);


		$premiumArray = array();
		
		$premiumCSSArray = array();
		$premiumUSSArray = array();
		$premiumVSSArray = array();
		foreach ($premiumResponseArray as $key => $value ){
			$productCode = $value['old']['Product']['ProductCode'];

			$userdata = array(
				
				'coverCode' =>$value['old']['Product']['ProductCode'],
				
			);	
			$this->session->set_userdata($userdata);

			switch ($productCode) {
				case 'CSS' :
					$premiumCSSArray[] = array(
						'product_code' => $productCode, 
						'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
						'ServiceTax' => $value['old']['Product']['ServiceTax'], 
						'Premium' => $value['old']['Product']['Premium'], 
						'SumInsured' => $value['old']['Product']['SumInsured'], 
						'shortSI'=> $this->Common_model->convertFormat($value['old']['Product']['SumInsured']),

						);
					break;
				case 'USS' :
					$sumInsured = $value['old']['Product']['SumInsured'];

					$userdata = array(
				
					'sumInsured' =>$value['old']['Product']['SumInsured'],
				
					);	
					$this->session->set_userdata($userdata);
					if($sumInsured == '2000000.00' || $sumInsured == '3000000.00') {

						$premiumUSSBasicArray[] = array(
							'product_code' => $productCode, 
							'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
							'ServiceTax' => $value['old']['Product']['ServiceTax'], 
							'Premium' => $value['old']['Product']['Premium'], 
							'SumInsured' => $sumInsured, 
							'shortSI'=> $this->Common_model->convertFormat($sumInsured), 

						);

					} else { 

						$premiumUSSArray[] = array(
							'product_code' => $productCode, 
							'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
							'ServiceTax' => $value['old']['Product']['ServiceTax'], 
							'Premium' => $value['old']['Product']['Premium'], 
							'SumInsured' => $sumInsured, 
							'shortSI'=> $this->Common_model->convertFormat($sumInsured), 

						);
					}


				break;
				case 'VSS' :
					$premiumVSSArray[] = array(
						'product_code' => $productCode, 
						'PremiumPayable' => $value['old']['Product']['PremiumPayable'], 
						'ServiceTax' => $value['old']['Product']['ServiceTax'], 
						'Premium' => $value['old']['Product']['Premium'], 
						'SumInsured' => $value['old']['Product']['SumInsured'], 
						'shortSI' => $this->Common_model->convertFormat($value['old']['Product']['SumInsured']), 
						);
				break;
				
				default:
					$TotalDisablement = '-';
					$PartialDisablement = '-';
					$HospitalDailyCash = '-';
					$IndemnityBenefit = '-';
				}
		}

		$premiumArray = array(
			'premiumVSSArray' => $premiumVSSArray,
			'premiumCSSArray' => $premiumCSSArray,
			'premiumUSSBasicArray'=>$premiumUSSBasicArray,
			'premiumUSSArray' => $premiumUSSArray,

		);
		
		$this->data['premiumArray'] = $premiumArray;
		$inpatientTreatmentArray = array();
		$preHospitalizationArray = array();
		$postHospitalizationArray = array();

		$organDonorArray = array();
		$dayCareArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();
		$postHospitalizationArray = array();

		foreach ($premiumArray as $key => $pr) {

			switch ($key) {
					case 'premiumVSSArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3000/- Event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => 'N A');
						$outpatientemergencyArray[] = array('outpatientemergency' => 'N A');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'N A');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'N A');

					break;

					case 'premiumCSSArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3,000/- event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => '10,000/- (On continues 10 days hospitalization or more)');
						$outpatientemergencyArray[] = array('outpatientemergency' => '2,500/-');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'N A');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'N A');

					break;

					case 'premiumUSSBasicArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3,000/- Event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => '15,000/-(On continues 10 days hospitalization or more)');
						$outpatientemergencyArray[] = array('outpatientemergency' => '10,000/-');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'Upto Rs. 1,00,000/-');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'Rs.5,000/-');

					break;

					case 'premiumUSSArray' :
						$inpatientTreatmentArray[] = array('inpatientTreatment' => 'Upto SI');
						$preHospitalizationArray[] = array('preHospitalization' => 'Upto SI - 60 Days');
						$postHospitalizationArray[] = array('postHospitalization'=> 'Upto SI - 90 Days');
						$organDonorArray[] = array('organDonor' => 'Upto SI');
						$ayushArray[] = array('ayush' => 'Upto SI');
						$dayCareArray[] = array('dayCare' => 'Upto SI');
						$domiciliaryHospitalizationArray[] = array('domiciliaryHospitalization' => 'Upto SI');
						$emergencyAmbulanceArray[] = array('emergencyAmbulance' => 'Rs.3,000/- Event');
						$restorationInsuredArray[] = array('restorationInsured' => 'Upto 100% of SI');
						$convalescenceBenefitArray[] = array('convalescenceBenefit' => '20,000/- (On continues 10 days hospitalization or more)');
						$outpatientemergencyArray[] = array('outpatientemergency' => '10,000/-');
						$domesticAirAmbulanceArray[] = array('domesticAirAmbulance' => 'Upto Rs. 2,00,000/-');
						$outpatientDentalemergencyArray[] = array('outpatientDentalemergency' => 'Rs.7,500/-');

					break;
					
					default:
			}

		}

		$premium_choice_array = array(
			'inpatientTreatmentArray'=>$inpatientTreatmentArray,
			'preHospitalizationArray'=>$preHospitalizationArray,
			'postHospitalizationArray'=>$postHospitalizationArray,
			'organDonorArray'=>$organDonorArray,
			'ayushArray'=>$ayushArray,
			'dayCareArray'=>$dayCareArray,
			'domiciliaryHospitalizationArray'=>$domiciliaryHospitalizationArray,
			'emergencyAmbulanceArray'=>$emergencyAmbulanceArray,
			'restorationInsuredArray'=>$restorationInsuredArray,
			'convalescenceBenefitArray'=>$convalescenceBenefitArray,
			'outpatientemergencyArray'=>$outpatientemergencyArray,
			'domesticAirAmbulanceArray'=>$domesticAirAmbulanceArray,
			'outpatientDentalemergencyArray'=>$outpatientDentalemergencyArray
		);


		$helpArray = array(
				'In_patient_treatment'=>'Covers hospitalisation expenses for period more than 24 hrs.',
				
				'Pre_hospitalization'=>'Medical Expenses incurred in 60 days before the hospitalisation.',

				'Post_hospitalization'=>'Medical Expenses incurred in 90 days after the hospitalisation.',
				
				'Organ_Donor'=>'Medical Expenses on harvesting the organ from the donor for organ transplantation.',

				'Day_careTreatment'=>'Medical Expenses of Day care procedures.',

				'Ayush_Treatment'=>'Medical Expenses for in-patient treatment taken under Ayurveda, Yogic, Unani, Sidha and Homeopathy.',

				'Domiciliary_Hospitalization'=>'Medical Expenses incurred for availing medical treatment at home which would otherwise have required hospitalisation.',

				'Emergency_Surface'=>'Covers expenses incurred for surface transport by ambulance to hospital or between hospitals and/or diagnostic centre for treatment of disease, Illness or Injury in a Hospital as an in-patient.',

				'Restoration_Insured'=>'Re-instatement of hundred percent of the Sum Insured in case where the Sum Insured and No claim bonus are exhausted due to claims made and paid during the Policy Year.',

				'Convalescence_Benefit'=>'Provides for payment of a fixed allowance in case of hospitalization for a continuous period of 10 days or more for treatment for any disease / illness / injury.',

				'Animal_bite'=>'Covers medical expenses of OPD Treatment for vaccinations or immunizations for treatment post an animal bite. This benefit is available only on reimbursement basis.',

				'Outpatient_emergency'=>'Provides for reimbursement of medical expenses incurred towards emergency treatment by a Medical Practitioner for the Insured / Insured Person following an accidental Injury and only if such Emergency Treatment is administered within 24 hours following the accident.',

				'Domestic_Ambulance'=>'Covers expenses of transportation in an airplane or helicopter which is certified to use as an ambulance for Emergency care which require immediate and rapid transportation from the site of first occurrence of the illness / accident to the nearest hospital within a reasonable timeframe.',

				'Outpatient_Dental'=>'Provides for reimbursement of medical expenses incurred towards emergency treatment given by a Dentist following an accident where the Insured / Insured Person suffer injuries or damage to his/her natural teeth and/or gums. Also covers for medical expenses incurred for follow up treatment up to a maximum of 15 days.',

				'Hospital_allowance'=>'Daily cash amount upto to a maximum of 30 days if the hospitalization exceeds for more than 24 hours. First continuous and completed period of 24 hours will act as deductible.',

				'Maternity_Benefit'=>'Covers the medical expenses including (after a waiting period of 9months with the company) for the delivery of a baby and / or expenses related to medically recommended lawful termination of pregnancy but only in life threatening situation under the advice of Medical Practitioner, limited to maximum of two deliveries or terminations during the lifetime of an Insured Person between the ages of 18 years to 45 years (being the age of eldest member in the policy). This is available only with 3 yr. policy term.',

				'New_Baby'=>'Covers medical expenses for any medically necessary treatment described in in-patient care section for the the Newborn baby) the Policy Period within first 90 days of birth.',

				'Lump_sum'=>'Lumpsum benefit for listed Critical Illness, subject to first diagnosed during the policy period and the Insured Person survives 30 days after such diagnosis. Critical illness benefit will lapse after reporting of and payment of one claim for the claiming Insured/Insured person.',

			);
		// echo '<pre>';
		// print_r($this->data);
		// exit();
			$this->data['helpArray'] = $helpArray;

			$this->data['premium_choice_array'] = $premium_choice_array;
			$this->data['title']="Premium Response Super-Ship";
			$this->data['module'] = 'leads'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_quote/qms_premium_sship',$this->data);
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}		



	}



	public function sshipProposal()
	{

		if($this->session->userdata('logged_in') == TRUE) {
		    $this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
     		$this->data['occupationlistArray'] = $this->Common_model->getoccupation();       
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['title']="Premium Response Super-Ship";
			$this->data['module'] = 'qms'; 
		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_sship',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}	

	}


	public function getSessionValuesSship()
 	{
    	$sessionData = array(
   		   'sship_first_name' => $this->session->userdata('sship_FirstName'),
   		   'sship_last_name' => $this->session->userdata('sship_LastName'),
   		   'sship_dob' => $this->session->userdata('sship_mx_DOB'),
   		   'sship_pro_state' => $this->session->userdata('sship_state'),
   		   'sship_pro_city' => $this->session->userdata('sship_city'),
   		   'sship_pro_zip' => $this->session->userdata('sship_zip'),
   		   'sship_pro_mobile' => $this->session->userdata('sship_mobile'),
   		   'sship_pro_email' => $this->session->userdata('sship_email'),
   		   'sship_pro_occupation' => $this->session->userdata('sship_pro_occupation'),
   		   'sship_pro_gender' => $this->session->userdata('sship_pro_gender'),
   		   'sship_pro_add1' => $this->session->userdata('sship_pro_add1'),
   		   'sship_pro_add2' => $this->session->userdata('sship_pro_add2'),
   		   'sship_pro_nland' => $this->session->userdata('sship_pro_nland'),
   		   'sship_pro_policy_start' => $this->session->userdata('sship_pro_policy_start'),
   		   'sship_pro_title' => $this->session->userdata('sship_pro_title'),
   		   'sship_pro_emergency' => $this->session->userdata('sship_pro_emergency'),
   		   'sship_pro_gstn' => $this->session->userdata('sship_pro_gstn'),
   		   'sship_pro_height' => $this->session->userdata('sship_pro_height'),
   		   'sship_pro_Weight' => $this->session->userdata('sship_pro_Weight'),

   		   'sship_pro_nname' => $this->session->userdata('sship_pro_nname'),
   		   'sship_pro_nomie_relation' => $this->session->userdata('sship_pro_nomie_relation'),
   		   'sship_pro_nameofappoint' => $this->session->userdata('sship_pro_nameofappoint'),
   		   'sship_pro_appoint_relation' => $this->session->userdata('sship_pro_appoint_relation'),

   		   'sship_pro_dname' => $this->session->userdata('sship_pro_dname'),
   		   'sship_pro_qualifi' => $this->session->userdata('sship_pro_qualifi'),
   		   'sship_pro_dadds' => $this->session->userdata('sship_pro_dadds'),
   		   'sship_pro_dmobile' => $this->session->userdata('sship_pro_dmobile'),
   		   'sship_pro_chmobile' => $this->session->userdata('sship_pro_chmobile'),

   		   'sship_pro_pinsured' => $this->session->userdata('sship_pro_pinsured'),
   		   'sship_pro_yname' => $this->session->userdata('sship_pro_yname'),
   		   'sship_pro_drive_prirelation' => $this->session->userdata('sship_pro_drive_prirelation'),
   		   'sship_pro_pdob' => $this->session->userdata('sship_pro_pdob'),
   		   'sship_pro_pgender' => $this->session->userdata('sship_pro_pgender'),
   		   'sship_pro_padd1' => $this->session->userdata('sship_pro_padd1'),
   		   'sship_pro_padd2' => $this->session->userdata('sship_pro_padd2'),
   		   'sship_pro_pnland' => $this->session->userdata('sship_pro_pnland'),
   		   'sship_pro_pemail' => $this->session->userdata('sship_pro_pemail'),
   		   'sship_pro_nationalty' => $this->session->userdata('sship_pro_nationalty'),
   		   'sship_pro_poccupation' => $this->session->userdata('sship_pro_poccupation'),
   		   'sship_pro_incomein' => $this->session->userdata('sship_pro_incomein'),
   		   'sship_pro_ppc' => $this->session->userdata('sship_pro_ppc'),

   		   'sship_pro_bankname' => $this->session->userdata('sship_pro_bankname'),
   		   'sship_pro_ifsc' => $this->session->userdata('sship_pro_ifsc'),
   		   'sship_pro_bbranch' => $this->session->userdata('sship_pro_bbranch'),
   		   'sship_pro_Aholname' => $this->session->userdata('sship_pro_Aholname'),
   		   'sship_pro_ano' => $this->session->userdata('sship_pro_ano'),

			'sship_pro_doc_name' => $this->session->userdata('sship_pro_doc_name'),
			'sship_pro_doc_qualifi' => $this->session->userdata('sship_pro_doc_qualifi'),
			'sship_pro_doc_addr' => $this->session->userdata('sship_pro_doc_addr'),
			'sship_pro_doc_mobile' => $this->session->userdata('sship_pro_doc_mobile'),
			'sship_pro_hos_num' => $this->session->userdata('sship_pro_hos_num'),

  		);
  		echo json_encode($sessionData);	
	}

	 public function premiumUpdateSship()
  {

  	 $userdata = array(
			
			'Premium' => $this->input->get_post('Premium'),
			'ServiceTax' => $this->input->get_post('ServiceTax'),
			'PremiumPayable' => $this->input->get_post('PremiumPayable'),
			'coverCode'=>substr($this->input->get_post('sumInsured'), 0, 3),
			'sumInsured' => substr($this->input->get_post('sumInsured'),3),
			
		);	

	   	$this->session->set_userdata($userdata);
  }

	public function sshipProposalInfommation(){


		$userdata = array(
			'sship_pro_add1' => $this->input->get_post('sship_pro_add1'),
			'sship_pro_add2' => $this->input->get_post('sship_pro_add2'),
			'sship_pro_policy_start' => $this->input->get_post('sship_pro_policy_start'),
			'sship_pro_title' => $this->input->get_post('sship_pro_title'),
			'sship_pro_emergency' => $this->input->get_post('sship_pro_emergency'),
			'sship_pro_gstn' => $this->input->get_post('sship_pro_gstn'),
			'sship_pro_height' => $this->input->get_post('sship_pro_height'),
			'sship_pro_Weight' => $this->input->get_post('sship_pro_Weight'),
			'sship_pro_nname' => $this->input->get_post('sship_pro_nname'),
			'sship_pro_nomie_relation' => $this->input->get_post('sship_pro_nomie_relation'),
			'sship_pro_nameofappoint' => $this->input->get_post('sship_pro_nameofappoint'),
			'sship_pro_appoint_relation' => $this->input->get_post('sship_pro_appoint_relation'),
			'sship_pro_occupation'=> $this->input->get_post('sship_pro_occupation'),
			'sship_pro_gender'=> $this->input->get_post('sship_pro_gender'),

			'sship_pro_nland' => $this->input->get_post('sship_pro_nland'),
			'sship_pro_dname' => $this->input->get_post('sship_pro_dname'),
			'sship_pro_qualifi' => $this->input->get_post('sship_pro_qualifi'),
			'sship_pro_dadds' => $this->input->get_post('sship_pro_dadds'),
			'sship_pro_dmobile' => $this->input->get_post('sship_pro_dmobile'),
			'sship_pro_chmobile' => $this->input->get_post('sship_pro_chmobile'),

			'sship_pro_pinsured' => $this->input->get_post('sship_pro_pinsured'),
			'sship_pro_yname' => $this->input->get_post('sship_pro_yname'),
			'sship_pro_drive_prirelation' => $this->input->get_post('sship_pro_drive_prirelation'),
			'sship_pro_pdob' => $this->input->get_post('sship_pro_pdob'),
			'sship_pro_pgender' => $this->input->get_post('sship_pro_pgender'),
			'sship_pro_padd1' => $this->input->get_post('sship_pro_padd1'),
			'sship_pro_padd2' => $this->input->get_post('sship_pro_padd2'),
			'sship_pro_pnland' => $this->input->get_post('sship_pro_pnland'),
			'sship_pro_pemail' => $this->input->get_post('sship_pro_pemail'),
			'sship_pro_nationalty' => $this->input->get_post('sship_pro_nationalty'),
			'sship_pro_poccupation' => $this->input->get_post('sship_pro_poccupation'),
			'sship_pro_incomein' => $this->input->get_post('sship_pro_incomein'),
			'sship_pro_ppc' => $this->input->get_post('sship_pro_ppc'),

			// 'sship_pro_bankname' => $this->input->get_post('sship_pro_bankname'),
			// 'sship_pro_ifsc' => $this->input->get_post('sship_pro_ifsc'),
			// 'sship_pro_bbranch' => $this->input->get_post('sship_pro_bbranch'),
			// 'sship_pro_Aholname' => $this->input->get_post('sship_pro_Aholname'),
			// 'sship_pro_ano' => $this->input->get_post('sship_pro_ano'),

			'sship_pro_doc_name' => $this->input->get_post('sship_pro_doc_name'),
			'sship_pro_doc_qualifi' => $this->input->get_post('sship_pro_doc_qualifi'),
			'sship_pro_doc_addr' => $this->input->get_post('sship_pro_doc_addr'),
			'sship_pro_doc_mobile' => $this->input->get_post('sship_pro_doc_mobile'),
			'sship_pro_hos_num' => $this->input->get_post('sship_pro_hos_num'),
		);	
		$this->session->set_userdata($userdata);
		
	}

	public function viewPropsalSship(){

		if($this->session->userdata('logged_in') == TRUE) {

			$familyType = trim($this->session->userdata('sship_spouse'));
		if($familyType == 0)
			$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		
		$this->data['sship_FirstName']=$this->session->userdata('sship_FirstName');
		$this->data['sship_LastName']=$this->session->userdata('sship_LastName');
		$this->data['sship_dob']=$this->session->userdata('sship_mx_DOB');
		$this->data['sship_state']=$this->session->userdata('sship_state');
		$this->data['sship_city']=$this->session->userdata('sship_city');
		$this->data['sship_zip']=$this->session->userdata('sship_zip');
		$this->data['sship_mobile']=$this->session->userdata('sship_mobile');
		$this->data['sship_email']=$this->session->userdata('sship_email');
 		$this->data['sship_pro_add1']=$this->session->userdata('sship_pro_add1');
		$this->data['sship_pro_policy_start']=$this->session->userdata('sship_pro_policy_start');
		$this->data['sship_pro_title']=$this->session->userdata('sship_pro_title');

		$this->data['PlanName']=$this->session->userdata('PlanName');
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');
		
		$this->data['title']="Kindly review your Health proposal";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_sship_proposal_view',$this->data);
		$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}	
	}



	public function sshipUpdateProposal(){

			$familyType = trim($this->session->userdata('sship_spouse'));
		if($familyType == 0)
			$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		$this->data['sship_pro_policy_start']=$this->session->userdata('sship_pro_policy_start');
		$this->data['sship_FirstName']=$this->session->userdata('sship_FirstName');
		$this->data['sship_LastName']=$this->session->userdata('sship_LastName');
		$this->data['sship_dob']=$this->session->userdata('sship_mx_DOB');
		$this->data['sship_city']=$this->session->userdata('sship_city');
		$this->data['sship_state']=$this->session->userdata('sship_state');
		$this->data['sship_email']=$this->session->userdata('sship_email');
		$this->data['sship_mobile']=$this->session->userdata('sship_mobile');
		$this->data['sship_pro_add1']=$this->session->userdata('sship_pro_add1');
		$this->data['sship_pro_add2']=$this->session->userdata('sship_pro_add2');

		$this->data['sship_pro_title']=$this->session->userdata('sship_pro_title');
		$this->data['sship_pro_nland']=$this->session->userdata('sship_pro_nland');
		$this->data['sship_pro_gstn']=$this->session->userdata('sship_pro_gstn');
		$this->data['sship_zip']=$this->session->userdata('sship_zip');
		$this->data['OrderNo']=$this->session->userdata('OrderNo');
		$this->data['QuoteNo']=$this->session->userdata('QuoteNo');			
		$this->data['sumInsured']=$this->session->userdata('sumInsured');	
		$this->data['coverCode']=$this->session->userdata('coverCode');
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');
		$this->data['policyterm']=$this->session->userdata('policyterm');
		$this->data['sshipProHeight'] = $this->session->userdata('sship_pro_height');
   		$this->data['sshipProWeight'] = $this->session->userdata('sship_pro_Weight');

  		$this->data['sship_pro_nname'] = $this->session->userdata('sship_pro_nname');
   		$this->data['sship_pro_nomie_relation'] = $this->session->userdata('sship_pro_nomie_relation');
   		$this->data['sship_pro_nameofappoint'] = $this->session->userdata('sship_pro_nameofappoint');
   		$this->data['sship_pro_appoint_relation'] = $this->session->userdata('sship_pro_appoint_relation');

		$this->data['sship_pro_doc_name'] = $this->session->userdata('sship_pro_doc_name');
		$this->data['sship_pro_doc_qualifi'] = $this->session->userdata('sship_pro_doc_qualifi');
		$this->data['sship_pro_doc_addr'] = $this->session->userdata('sship_pro_doc_addr');
		$this->data['sship_pro_doc_mobile'] = $this->session->userdata('sship_pro_doc_mobile');
		$this->data['sship_pro_hos_num'] = $this->session->userdata('sship_pro_hos_num');
		$this->data['sship_income'] = $this->session->userdata(	'sship_income');


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Sship_proposal_model->generatePropsalXmlShip($this->data);
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





	public function proposalShipResult(){
	
		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['title']="Proposal Critical Illness";
			$this->data['module'] = 'qms'; 

			$this->data['orderNo']=$this->session->userdata('orderNo');
			$this->data['quoteNo']=$this->session->userdata('quoteNo');	
			$this->data['emailId']=$this->session->userdata('sship_email');	
			$this->data['custName']=$this->session->userdata('sship_LastName');	

		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_result_ship',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}		
	
	
	}



	public function sessionClearShip() {

         $array_items = array('sship_FirstName',
         					  'sship_LastName',
         					  'sship_mx_DOB',
         					  'sship_state',
         					  'sship_city',
         					  'sship_zip',
         					  'sship_mobile',
         					  'sship_email',
         					  'sship_pro_occupation',
         					  'sship_pro_gender',
         					  'sship_pro_add1',
         					  'sship_pro_add2',
         					  'sship_pro_nland',
         					  'sship_pro_title',
         					  'sship_pro_emergency',
         					  'sship_pro_gstn',
         					  'sship_pro_height',
         					  'sship_pro_Weight',
         					  'sship_pro_policy_start',
         					  'sship_pro_nname',
         					  'sship_pro_nomie_relation',
         					  'sship_pro_nameofappoint',
         					  'sship_pro_appoint_relation',
         					  'sship_pro_dname',
         					  'sship_pro_qualifi',
         					  'sship_pro_dadds',
         					  'sship_pro_dmobile',
         					  'sship_pro_chmobile',
         					  'sship_pro_pinsured',
         					  'sship_pro_yname',
         					  'sship_pro_drive_prirelation',
         					  'sship_pro_pdob',
         					  'sship_pro_pgender',
         					  'sship_pro_padd1',
         					  'sship_pro_padd2',
         					  'sship_pro_pnland',
         					  'sship_pro_pemail',
         					  'sship_pro_nationalty',
         					  'sship_pro_poccupation',
         					  'sship_pro_incomein',
         					  'sship_pro_ppc',
         					  'sship_pro_bankname',
         					  'sship_pro_ifsc',
         					  'sship_pro_bbranch',
         					  'sship_pro_Aholname',
         					  'sship_pro_ano',
         					  'sship_pro_doc_name',
         					  'sship_pro_doc_qualifi',
         					  'sship_pro_doc_addr',
         					  'sship_pro_doc_mobile',
         					  'sship_pro_hos_num',
         					  'Premium',
         					  'ServiceTax',
         					  'PremiumPayable',
         					  'orderNo',
         					  'quoteNo',
     );
      	$this->session->unset_userdata($array_items);
      	echo 'success';
      	//redirect('create-quote-super-ship', 'refresh');
	}



}

