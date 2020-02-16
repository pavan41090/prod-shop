<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotetravel extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Travel_model');
	 	$this->load->model('Travel_proposal_model');
	} 


	public function qmsCreateQuoteTravel(){

		if($this->session->userdata('logged_in') == TRUE) {
			$this->data['sub_module'] = 'Travel'; 


			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/qms_page_header_inner',$this->data);
			$this->load->view('qms_quote/qms_quote_create_travel');
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}
	}	


	public function qmsCalculatePremiumTravel() {


		$this->data['policyType'] = $this->input->get_post('travel_policy_type');
		$this->data['typeofTrip'] = $this->input->get_post('travel_type_trip');
		$this->data['departdate'] = $this->input->get_post('travel_depart_date');
		$this->data['returndate'] = $this->input->get_post('travel_return_date');
		$this->data['tripduration'] = $this->input->get_post('travel_trip_duration');
		$this->data['covertype'] = $this->input->get_post('travel_cover_type');
		$this->data['maxpertrip'] = $this->input->get_post('travel_max_trip');
		$this->data['traveltype'] = $this->input->get_post('travel_type');
		$this->data['geographical'] = $this->input->get_post('travel_geographical');
		$this->data['relationship'] = $this->input->get_post('travel_relationship');
		$this->data['datebirth'] = $this->input->get_post('travel_date_birth');
		$this->data['ageTravel'] = $this->input->get_post('travel_age');
		$this->data['relationship1'] = $this->input->get_post('travel_relationship_1');
		$this->data['datebirth1'] = $this->input->get_post('travel_dob_1');
		$this->data['age1'] = $this->input->get_post('travel_age_1');
		$this->data['relationship2'] = $this->input->get_post('travel_relationship_2');
		$this->data['datebirth2'] = $this->input->get_post('travel_dob_2');
		$this->data['age2'] = $this->input->get_post('travel_age_2');
		$this->data['relationship3'] = $this->input->get_post('travel_relationship_3');
		$this->data['datebirth3'] = $this->input->get_post('travel_dob_3');
		$this->data['age3'] = $this->input->get_post('travel_age_3');
		$this->data['emailtravel'] = $this->input->get_post('travel_email');
		$this->data['mobiletravel'] = $this->input->get_post('travel_mobile');
		$this->data['nametravel'] = $this->input->get_post('travel_first_name');

// echo '<pre>';
// print_r($this->data);
// exit();
		
		$userdata = array(
			'travel_policyType' => $this->input->get_post('travel_policy_type'),
			'travel_typeofTrip' => $this->input->get_post('travel_type_trip'),
			'travel_departdate' => $this->input->get_post('travel_depart_date'),
			'travel_returndate' => $this->input->get_post('travel_return_date'),
			'travel_tripduration' => $this->input->get_post('travel_trip_duration'),
			'travel_covertype' => $this->input->get_post('travel_cover_type'),
			'travel_maxpertrip' => $this->input->get_post('travel_max_trip'),
			'travel_traveltype' => $this->input->get_post('travel_type'),
			'travel_geographical' => $this->input->get_post('travel_geographical'),
			'travel_relationship' => $this->input->get_post('travel_relationship'),
			'travel_email' => $this->input->get_post('travel_email'),
			'travel_name' => $this->input->get_post('travel_first_name'),
			'travel_City' => $this->input->get_post('travel_city'),
			'travel_State' => $this->input->get_post('travel_state'),
			'travel_LastName' => $this->input->get_post('travel_last_name') ,  
			'travel_mobile' => $this->input->get_post('travel_mobile'),			
			'travel_dob' => $this->input->get_post('travel_date_birth'),
		    'ageTravel'=> $this->input->get_post('travel_age'),


		);	
		$this->session->set_userdata($userdata);		

		//$soapUrl = "https://uat.bhartiaxaonline.co.in/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$soapUrl = SOAP_URL."/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		$requestXml = $this->Travel_model->generateQuoteXmlTravel($this->data);

		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		// print_r($requestXml);
		// exit();

		$apiData = array(
		 	'api_request_traval' => $requestXml,
		 	'api_response_traval_xml' => $curl,
		 	'api_response_traval' => $output,
		);		


		$this->session->set_userdata($apiData);

if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response']['PremiumSet']['tuple'])) {
	// if(count($output) > 1) {
			echo 'success';
		} else {
			echo 'failed';
		}


	}

 	





	public function qmsTravelPremium(){

		if ($this->session->userdata('logged_in') == TRUE) {
			$api_request = $this->session->userdata('api_request_traval');
			$api_response = $this->session->userdata('api_response_traval');
			$api_response_tw_xml = $this->session->userdata('api_response_traval_xml');


			$this->data['title']="Premium Response Travel";
			$this->data['module'] = 'qms';
			$this->data['sub_module'] = 'Travel';


			$policyType = $this->session->userdata('travel_policyType');
			$typeOfTrip = $this->session->userdata('travel_typeofTrip');


			if($policyType == 0)
				$this->data['policy_type'] = 'Individual/Family';
			else 
				$this->data['policy_type'] = 'Student';

			if($typeOfTrip == 0)
				$this->data['type_of_trip'] = 'Single Trip';
			else 
				$this->data['type_of_trip'] = 'Annual Multi Trip';


			$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response']['PremiumSet']['tuple'];
		
			$responseQuoteArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];

			$premium_choice_array = array();
			foreach ($responseExtArray as $key => $value ){
				$premium_choice_array[] = array(
					'PlanName' 		=>$value['old']['PlanSet']['PlanName'],
					'SumInsured' 	=> $value['old']['PlanSet']['SumInsured'],
					'Premium' => $value['old']['PlanSet']['Premium'],
					'PremiumPayable' => $value['old']['PlanSet']['PremiumPayable'],
					'ServiceTax' => $value['old']['PlanSet']['ServiceTax'],
					'PlanId' => $value['old']['PlanSet']['PlanId'],
				);

			}	

			$this->data['premium_choice_array'] = $premium_choice_array;



		$this->data['orderNo'] = $responseQuoteArray['OrderNo'];
		$this->data['quoteNo'] = $responseQuoteArray['QuoteNo'];
		
		$this->data['emailId'] = $this->session->userdata('travel_email');

		$apiData = array(
				'OrderNo' => $responseQuoteArray['OrderNo'],
				'QuoteNo' => $responseQuoteArray['QuoteNo'],
			);		
		$this->session->set_userdata($apiData);

		$this->load->view('layout/header_inner',$this->data);
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_quote/qms_premium_travel',$this->data);
		$this->load->view('layout/footer_inner');


		} else {
			redirect('user', 'refresh');
		}
	}




	public function createQuoteTravel(){

		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['sub_module'] = 'Travel';

			$this->data['module'] = 'leads'; 
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/page_header_inner',$this->data);
			$this->load->view('quote/quote_create_travel');
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}
	}	


	public function calculatePremiumTravel() {

	
		$this->data['policyType'] = $this->input->get_post('policyType');
		$this->data['typeofTrip'] = $this->input->get_post('typeofTrip');
		$this->data['departdate'] = $this->input->get_post('departdate');
		$this->data['returndate'] = $this->input->get_post('returndate');
		$this->data['tripduration'] = $this->input->get_post('tripduration');
		$this->data['covertype'] = $this->input->get_post('covertype');
		$this->data['maxpertrip'] = $this->input->get_post('maxpertrip');
		$this->data['traveltype'] = $this->input->get_post('traveltype');
		$this->data['geographical'] = $this->input->get_post('geographical');
		$this->data['relationship'] = $this->input->get_post('relationship');
		$this->data['datebirth'] = $this->input->get_post('datebirth');
		
		$this->data['ageTravel'] = $this->input->get_post('age');

		$this->data['relationship1'] = $this->input->get_post('relationship_1');
		$this->data['datebirth1'] = $this->input->get_post('datebirth_1');
		$this->data['age1'] = $this->input->get_post('age_1');
		$this->data['relationship2'] = $this->input->get_post('relationship_2');
		$this->data['datebirth2'] = $this->input->get_post('datebirth_2');
		$this->data['age2'] = $this->input->get_post('age_2');
		$this->data['relationship3'] = $this->input->get_post('relationship_3');
		$this->data['datebirth3'] = $this->input->get_post('datebirth_3');
		$this->data['age3'] = $this->input->get_post('age_3');	

		$this->data['emailtravel'] = $this->input->get_post('emailtravel');
		$this->data['mobiletravel'] = $this->input->get_post('mobiletravel');
		$this->data['nametravel'] = $this->input->get_post('nametravel');

		
		$userdata = array(
			'travel_policyType' => $this->input->get_post('policyType'),
			'travel_typeofTrip' => $this->input->get_post('typeofTrip'),
			'travel_departdate' => $this->input->get_post('departdate'),
			'travel_returndate' => $this->input->get_post('returndate'),
			'travel_tripduration' => $this->input->get_post('tripduration'),
			'travel_covertype' => $this->input->get_post('covertype'),
			'travel_maxpertrip' => $this->input->get_post('maxpertrip'),
			'travel_traveltype' => $this->input->get_post('traveltype'),
			'travel_geographical' => $this->input->get_post('geographical'),
			'travel_relationship' => $this->input->get_post('relationship'),
			'travel_datebirth' => $this->input->get_post('datebirth'),
			'travel_age' => $this->input->get_post('ageTravel'),
			'travel_relationship1' => $this->input->get_post('relationship1'),
			'travel_spouse' => $this->input->get_post('spouse'),
			'travel_age1' => $this->input->get_post('age1'),
			'travel_relationship2' => $this->input->get_post('relationship2'),
			'travel_child' => $this->input->get_post('child'),
			'travel_age2' => $this->input->get_post('age2'),
			'travel_emailtravel' => $this->input->get_post('emailtravel'),
			'travel_mobiletravel' => $this->input->get_post('mobiletravel'),
			'travel_nametravel' => $this->input->get_post('nametravel'),



			'travel_mx_Category' => $this->input->get_post('travel_mx_Category'),
			'travel_mx_Line_of_Business' => $this->input->get_post('travel_mx_Line_of_Business'),
			'travel_mx_HDFC_Branch_Location' => $this->input->get_post('travel_mx_HDFC_Branch_Location'),
			'travel_mx_HDFC_Ergo_Location' => $this->input->get_post('travel_mx_HDFC_Ergo_Location'),
			'travel_mx_Priority' => $this->input->get_post('travel_mx_Priority'),
			'travel_mx_Target_Date' => $this->input->get_post('travel_mx_Target_Date'),
			'travel_mx_TSE_BDR_Code' => $this->input->get_post('travel_mx_TSE_BDR_Code'),
			'travel_mx_TL_Code' => $this->input->get_post('travel_mx_TL_Code'),
			'travel_mx_SM_Code' => $this->input->get_post('travel_mx_SM_Code'),
			'travel_mx_Bank_Verifier_ID' => $this->input->get_post('travel_mx_Bank_Verifier_ID'),
			'travel_mx_Payment_Type' => $this->input->get_post('travel_mx_Payment_Type'),
			'travel_mx_Sub_Channel' => $this->input->get_post('travel_mx_Sub_Channel'),
			'travel_mx_HDFC_Card_Relationship_No' => $this->input->get_post('travel_mx_HDFC_Card_Relationship_No'),
			'travel_mx_HDFC_Card_Last_4_digits' => $this->input->get_post('travel_mx_HDFC_Card_Last_4_digits'),
			'travel_FirstName' => $this->input->get_post('travel_FirstName'),
			'travel_LastName' => $this->input->get_post('travel_LastName') ,
			'travel_dob' => $this->input->get_post('travel_dob'),
			'travel_mx_Customer_Gender' => $this->input->get_post('travel_mx_Customer_Gender'),
			'travel_mx_Case_id' => $this->input->get_post('travel_mx_Case_id'),
			'travel_mx_PAN_Card' => $this->input->get_post('travel_mx_PAN_Card'),
			'travel_mx_Street1' => $this->input->get_post('travel_mx_Street1'),
			'travel_mx_Street2' => $this->input->get_post('travel_mx_Street2'),
			'travel_mx_Area' => $this->input->get_post('travel_mx_Area'),
			'travel_mx_City' => $this->input->get_post('travel_mx_City'),
			'travel_mx_State' => $this->input->get_post('travel_mx_State'),
			'travel_mx_Zip' => $this->input->get_post('travel_mx_Zip'),
			'travel_Notes' => $this->input->get_post('travel_Notes'),
			'emailtravel' => $this->input->get_post('emailtravel'),
			'mobiletravel' => $this->input->get_post('mobiletravel'),
            'policytypetravel' => $this->input->get_post('policytypetravel'),			
	
		);	
		$this->session->set_userdata($userdata);		

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Travel_model->generateQuoteXmlTravel($this->data);


			
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		
		
		$output =$this->Common_model->xmlstr_to_array($curl);

		 $apiData = array(
		 	'api_request_traval' => $requestXml,
		 	'api_response_traval_xml' => $curl,
		 	'api_response_traval' => $output,
		 );		
		$this->session->set_userdata($apiData);
		if(count($output) > 1) {
			echo 'success';
		} else {
			echo 'failed';
		}

	}


	public function travelPremium(){
if ($this->session->userdata('logged_in') == TRUE) {

		$api_request = $this->session->userdata('api_request_traval');
		$api_response = $this->session->userdata('api_response_traval');
		$api_response_tw_xml = $this->session->userdata('api_response_traval_xml');
		

		
			$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response']['PremiumSet']['tuple'];
		
			$responseQuoteArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];

			$premium_choice_array = array();
			foreach ($responseExtArray as $key => $value ){
				$premium_choice_array[] = array(
					'PlanName' 		=>$value['old']['PlanSet']['PlanName'],
					'SumInsured' 	=> $value['old']['PlanSet']['SumInsured'],
					'Premium' => $value['old']['PlanSet']['Premium'],
					'PremiumPayable' => $value['old']['PlanSet']['PremiumPayable'],
					'ServiceTax' => $value['old']['PlanSet']['ServiceTax'],
					'PlanId' => $value['old']['PlanSet']['PlanId'],
				);

			}	

			$this->data['premium_choice_array'] = $premium_choice_array;

		$this->data['title']="Premium Response Travel";
		$this->data['module'] = 'leads'; 

		$this->data['OrderNo']= $responseQuoteArray['OrderNo'];
		$this->data['QuoteNo']= $responseQuoteArray['QuoteNo'];

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('quote/premium_travel',$this->data);
		$this->load->view('layout/footer_inner');

} else {
	redirect('user', 'refresh');
}

	}


	public function proposal(){
	
			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

		$this->data['title']="Travel proposal";
		$this->data['module'] = 'leads'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_quote/qms_proposal_travel',$this->data);
//		$this->load->view('lead_history/list_lead',$this->data);
		$this->load->view('layout/footer_inner');
	
	}



	public function updateSessionPremiumData(){


		$userdata = array(
			'selPlan' => $this->input->get_post('selPlan'),
			'Premium' => $this->input->get_post('Premium'),
			'ServiceTax' => $this->input->get_post('ServiceTax'),
			'PremiumPayable' => $this->input->get_post('PremiumPayable'),
			'premiumbefore' => $this->input->get_post('premiumbefore'),
			'premiumbefore' => $this->input->get_post('premiumbefore'),
		);	
		$this->session->set_userdata($userdata);
	}
       

	public function getSessionValues()
 	{
    	$sessionData = array(
   		   'travel_relationship' => $this->session->userdata('travel_relationship'),
   		   'travel_name' => $this->session->userdata('travel_name'),
   		   'travel_LastName' => $this->session->userdata('travel_LastName'),
   		   'travel_dob' => $this->session->userdata('travel_dob'),
   		   'travel_gender' => $this->session->userdata('travel_gender'),
   		   'travel_City' => $this->session->userdata('travel_City'),
   		   'travel_State' => $this->session->userdata('travel_State'),
   		   'travel_mobile' => $this->session->userdata('travel_mobile'),
   		   'travel_email' => $this->session->userdata('travel_email'),

   		   'tvl_prop_relationship' => $this->session->userdata('tvl_prop_relationship'),
   		   'tvl_pro_dob' => $this->session->userdata('tvl_pro_dob'),
   		   'travel_covertype' => $this->session->userdata('travel_covertype'),
   		   'tvl_pro_passport_no' => $this->session->userdata('tvl_pro_passport_no'),
   		   'tvl_pro_nname' => $this->session->userdata('tvl_pro_nname'),
   		   'tvl_pro_add1' => $this->session->userdata('tvl_pro_add1'),
   		   'tvl_pro_add2' => $this->session->userdata('tvl_pro_add2'),
   		   'tvl_pro_nomie_relation' => $this->session->userdata('tvl_pro_nomie_relation'),
   		   'tvl_pro_national' => $this->session->userdata('tvl_pro_national'),
   		   'tvl_pro_zip' => $this->session->userdata('tvl_pro_zip'),
   		   'tvl_pro_gstn' => $this->session->userdata('tvl_pro_gstn'),
   		   'tvl_pro_title' => $this->session->userdata('tvl_pro_title'),
   		   'tvl_pro_gender' => $this->session->userdata('tvl_pro_gender'),
   		   'tvl_pro_landmark' => $this->session->userdata('tvl_pro_landmark'),
   		  

  		);
  		echo json_encode($sessionData);	
	}


      public function proposalInfommation(){


		$userdata = array(
			'tvl_prop_relationship' => $this->input->get_post('tvl_prop_relationship'),
			'tvl_pro_dob' => $this->input->get_post('tvl_pro_dob'),
			'travel_covertype' => $this->input->get_post('travel_cover_type'),
			'tvl_pro_passport_no' => $this->input->get_post('tvl_pro_passport_no'),
			'tvl_pro_nname' => $this->input->get_post('tvl_pro_nname'),
			'tvl_pro_add1' => $this->input->get_post('tvl_pro_add1'),
			'tvl_pro_add2' => $this->input->get_post('tvl_pro_add2'),
			'tvl_pro_nomie_relation' => $this->input->get_post('tvl_pro_nomie_relation'),
			'tvl_pro_national' => $this->input->get_post('tvl_pro_national'),
			'tvl_pro_zip' => $this->input->get_post('tvl_pro_zip'),
			'tvl_pro_gstn' => $this->input->get_post('tvl_pro_gstn'),
			'tvl_pro_title' => $this->input->get_post('tvl_pro_title'),
			'tvl_pro_gender' => $this->input->get_post('tvl_pro_gender'),
			'tvl_pro_landmark' => $this->input->get_post('tvl_pro_landmark'),
		//	'tvl_pro_national' => $this->input->get_post(' '),
			//'tvl_pro_passport_no' => $this->input->get_post('tvl_pro_passport_no'),

			//'tvl_pro_nname' => $this->input->get_post('tvl_pro_nname'),
		//	'tvl_pro_nomie_relation' => $this->input->get_post('tvl_pro_nomie_relation'),
			

		);	
		$this->session->set_userdata($userdata);
		echo 'success';
	}


	public function viewPropsal(){

		$policyType = trim($this->session->userdata('travel_policyType'));
		if($policyType == 0)
			$policyType = 'Individual/Family';
		else 
			$policyType = 'Student';

		$typeofTrip =trim($this->session->userdata('travel_typeofTrip'));
		if($typeofTrip == 0)
			$typeofTrip = 'Single Trip';
		else 
			$typeofTrip = 'Annual Multi Trip';

		$typeofcover =trim($this->session->userdata('travel_covertype'));
		if($typeofcover == 0)
			$typeofcover = ' Individual  ';
		else 
			$typeofcover = 'Family Floater';
           
		$this->data['travel_policyType']=$policyType;
		$this->data['travel_covertype']=$typeofcover;
		$this->data['travel_typeofTrip']=$typeofTrip;
		$this->data['travel_departdate']=$this->session->userdata('travel_departdate');
		$this->data['travel_returndate']=$this->session->userdata('travel_returndate');
		$this->data['travel_tripduration']=$this->session->userdata('travel_tripduration');
		
		$this->data['tvl_prop_relationship']=$this->session->userdata('tvl_prop_relationship');
		$this->data['tvl_pro_dob']=$this->session->userdata('tvl_pro_dob');
		$this->data['tvl_pro_passport_no']=$this->session->userdata('tvl_pro_passport_no');
		$this->data['tvl_pro_nname']=$this->session->userdata('tvl_pro_nname');

		$this->data['travel_geographical']=$this->session->userdata('travel_geographical');
		$this->data['travel_traveltype']=$this->session->userdata('travel_traveltype');
		$this->data['travel_maxpertrip']=$this->session->userdata('travel_maxpertrip');
		$this->data['travel_name']=$this->session->userdata('travel_name');
		$this->data['travel_LastName']=$this->session->userdata('travel_LastName');
		$this->data['travel_email']=$this->session->userdata('travel_email');
		$this->data['travel_mobile']=$this->session->userdata('travel_mobile');
		
		$this->data['travel_gender']=$this->session->userdata('travel_gender');
		$this->data['ageTravel']=$this->session->userdata('ageTravel');
		$this->data['tvl_pro_passport_no']=$this->session->userdata('tvl_pro_passport_no');
		$this->data['tvl_pro_nname']=$this->session->userdata('tvl_pro_nname');
		$this->data['tvl_pro_add1']=$this->session->userdata('tvl_pro_add1');
		$this->data['tvl_pro_add2']=$this->session->userdata('tvl_pro_add2');
		$this->data['tvl_pro_nrelation']=$this->session->userdata('tvl_pro_nomie_relation');
		$this->data['tvl_pro_national']=$this->session->userdata('tvl_pro_national');
		$this->data['tvl_pro_zip']=$this->session->userdata('tvl_pro_zip');


		$this->data['travel_City']=$this->session->userdata('travel_City');
		$this->data['travel_State']=$this->session->userdata('travel_State');
		$this->data['PlanName']=$this->session->userdata('PlanName');
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');

		//$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		//$requestXml = $this->Travel_proposal_model->quoteXmlProposal($this->data);
		

		$this->data['title']="Kindly review your Travel proposal";
		$this->data['module'] = 'qms'; 

		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_quote/qms_proposal_view',$this->data);
		$this->load->view('layout/footer_inner');
		

	}



	public function updateProposal(){

		$policyType = trim($this->session->userdata('travel_policyType'));
		if($policyType == 0)
			$policyType = 'I';
		else 
			$policyType = 'S';

		$typeofTrip =trim($this->session->userdata('travel_typeofTrip'));
		if($typeofTrip == 0)
			$typeofTrip = 'S';
		else 
			$typeofTrip = 'A';

		$typeofcover =trim($this->session->userdata('travel_covertype'));
		if($typeofcover == 0)
			$typeofcover = 'F';
		else 
			$typeofcover = 'F';
           
		$this->data['travel_policyType']=$policyType;
		$this->data['travel_covertype']=$typeofcover;
		$this->data['travel_typeofTrip']=$typeofTrip;
		$this->data['travel_departdate']=$this->session->userdata('travel_departdate');
		$this->data['travel_returndate']=$this->session->userdata('travel_returndate');
		$this->data['travel_tripduration']=$this->session->userdata('travel_tripduration');
		
		$this->data['tvl_prop_relationship']=$this->session->userdata('tvl_prop_relationship');
		$this->data['tvl_pro_dob']=$this->session->userdata('tvl_pro_dob');
		$this->data['tvl_pro_passport_no']=$this->session->userdata('tvl_pro_passport_no');
		$this->data['tvl_pro_nname']=$this->session->userdata('tvl_pro_nname');

		$this->data['travel_geographical']=$this->session->userdata('travel_geographical');
		//$this->data['travel_traveltype']=$this->session->userdata('travel_traveltype');
		$this->data['travel_traveltype']='NA';
		$this->data['travel_maxpertrip']=$this->session->userdata('travel_maxpertrip');
		$this->data['travel_name']=$this->session->userdata('travel_name');
		$this->data['travel_LastName']=$this->session->userdata('travel_LastName');
		$this->data['travel_email']=$this->session->userdata('travel_email');
		$this->data['travel_mobile']=$this->session->userdata('travel_mobile');
		
		$this->data['travel_gender']=$this->session->userdata('travel_gender');
		$this->data['ageTravel']=$this->session->userdata('ageTravel');
		$this->data['tvl_pro_passport_no']=$this->session->userdata('tvl_pro_passport_no');
		$this->data['tvl_pro_nname']=$this->session->userdata('tvl_pro_nname');
		$this->data['tvl_pro_add1']=$this->session->userdata('tvl_pro_add1');
		$this->data['tvl_pro_add2']=$this->session->userdata('tvl_pro_add2');
		$this->data['tvl_pro_nrelation']=$this->session->userdata('tvl_pro_nomie_relation');
		$this->data['tvl_pro_national']=$this->session->userdata('tvl_pro_national');
		$this->data['tvl_pro_zip']=$this->session->userdata('tvl_pro_zip');


		$this->data['travel_City']=$this->session->userdata('travel_City');
		$this->data['travel_State']=$this->session->userdata('travel_State');
		$this->data['plan_name']=$this->session->userdata('PlanName');

		$this->data['sel_plan']=$this->session->userdata('selPlan');

		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');

		$this->data['OrderNo'] = $this->session->userdata('OrderNo');
		$this->data['QuoteNo'] = $this->session->userdata('QuoteNo');

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Travel_proposal_model->quoteXmlProposal($this->data);
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



	public function proposalResult(){
	

		$this->data['title']=" Proposal Traval";
		$this->data['module'] = 'qms'; 

		$this->data['orderNo']=$this->session->userdata('orderNo');
		$this->data['quoteNo']=$this->session->userdata('quoteNo');	
		$this->data['emailId']=$this->session->userdata('travel_email');	
		$this->data['custName']=$this->session->userdata('travel_name');	


		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_proposal_result_travel',$this->data);
		$this->load->view('layout/footer_inner');
	
	}


	public function sess_clrTravel() {
		 
         $array_items = array('travel_relationship',
         					  'travel_name',
         					  'travel_LastName',
         					  'travel_dob',
         					  'travel_gender',
         					  'travel_City',
         					  'travel_State',
         					  'travel_mobile',
         					  'travel_email',
         					  'tvl_prop_relationship',
         					  'tvl_pro_dob',
         					  'travel_covertype',
         					  'tvl_pro_passport_no',
         					  'tvl_pro_nname',
         					  'tvl_pro_add1',
         					  'tvl_pro_add2',
         					  'tvl_pro_nomie_relation',
         					  'tvl_pro_national',
         					  'tvl_pro_zip',
         					  'tvl_pro_gstn',
         					  'tvl_pro_title',
         					  'tvl_pro_gender',
         					  'tvl_pro_landmark',
         					 
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
