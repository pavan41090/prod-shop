<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotehome extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Home_model');
		 $this->load->model('home_proposal_model');
	}


	public function createQuoteHome(){
		if ($this->session->userdata('logged_in') == TRUE) {

		$this->data['stateArray'] = $this->Common_model->getStateList();
		$this->data['sub_module']='Home';
		$this->data['stateArray'] = $this->Common_model->getStateList();
		$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
	    $this->data['CategoryArray'] = $this->Common_model->getCategory();
        $this->data['BusinessArray'] = $this->Common_model->getBusiness();
        $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
        $this->data['PaymentArray'] = $this->Common_model->getPayment();

        $this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/page_header_inner',$this->data);
		$this->load->view('quote/quote_create_home');
		$this->load->view('layout/footer_inner');
	
		} else {
			redirect('user', 'refresh');
		}


	}	





public function calculatePremiumHome(){

	// echo '<pre>';
	// print_r($_GET);
	// exit();
		$this->data['Home_FirstName'] = $this->input->get_post('Home_FirstName');
		$this->data['Home_LastName'] = $this->input->get_post('Home_LastName');
		$this->data['Home_mx_DOB'] = $this->input->get_post('Home_mx_DOB');
		$this->data['Home_plans'] = $this->input->get_post('Home_plans');
		$this->data['Home_policy_start'] = $this->input->get_post('Home_policy_start');
		$this->data['Home_policy_end'] = $this->input->get_post('Home_policy_end');
		$this->data['home_mobile'] = $this->input->get_post('home_mobile');
		$this->data['home_email'] = $this->input->get_post('home_email');
		$this->data['Home_mx_City'] = $this->input->get_post('Home_mx_City');
		$this->data['Home_mx_State'] = $this->input->get_post('Home_mx_State');
        $this->data['Home_mx_Zip'] = $this->input->get_post('Home_mx_Zip');
		


		$userdata = array(
            'Home_plans' => $this->input->get_post('Home_plans'),
            'Home_policy_start' => $this->input->get_post('Home_policy_start'),
            'Home_policy_end' => $this->input->get_post('Home_policy_end'),

			'Home_mx_Category' => $this->input->get_post('Home_mx_Category'),
			'Home_mx_Line_of_Business' => $this->input->get_post('Home_mx_Line_of_Business'),
			'Home_mx_HDFC_Branch_Location' => $this->input->get_post('Home_mx_HDFC_Branch_Location'),
			'Home_mx_HDFC_Ergo_Location' => $this->input->get_post('Home_mx_HDFC_Ergo_Location'),
			'Home_mx_Priority' => $this->input->get_post('Home_mx_Priority'),
			'Home_mx_Target_Date' => $this->input->get_post('Home_mx_Target_Date'),
			'Home_mx_TSE_BDR_Code' => $this->input->get_post('Home_mx_TSE_BDR_Code'),
			'Home_mx_TL_Code' => $this->input->get_post('Home_mx_TL_Code'),
			'Home_mx_SM_Code' => $this->input->get_post('Home_mx_SM_Code'),
			'Home_mx_Bank_Verifier_ID' => $this->input->get_post('Home_mx_Bank_Verifier_ID'),
			'Home_mx_Payment_Type' => $this->input->get_post('Home_mx_Payment_Type'),
			'Home_mx_Sub_Channel' => $this->input->get_post('Home_mx_Sub_Channel'),
			'Home_mx_HDFC_Card_Relationship_No' => $this->input->get_post('Home_mx_HDFC_Card_Relationship_No'),
			'Home_mx_HDFC_Card_Last_4_digits' => $this->input->get_post('Home_mx_HDFC_Card_Last_4_digits'),
			'Home_FirstName' => $this->input->get_post('Home_FirstName') ,
			'Home_LastName' => $this->input->get_post('Home_LastName') ,
			'Home_mx_DOB' => $this->input->get_post('Home_mx_DOB'),
			'Home_mx_Customer_Gender' => $this->input->get_post('Home_mx_Customer_Gender'),
			'Home_mx_Case_id' => $this->input->get_post('Home_mx_Case_id'),
			'Home_mx_PAN_Card' => $this->input->get_post('Home_mx_PAN_Card'),
			'Home_mx_Street1' => $this->input->get_post('Home_mx_Street1'),
			'Home_mx_Street2' => $this->input->get_post('Home_mx_Street2'),
			'Home_mx_Area' => $this->input->get_post('Home_mx_Area'),
			'Home_mx_City' => $this->input->get_post('Home_mx_City'),
			'Home_mx_State' => $this->input->get_post('Home_mx_State'),
			'Home_mx_Zip' => $this->input->get_post('Home_mx_Zip'),
			'Home_Notes' => $this->input->get_post('Home_Notes'),
			'home_mobile' => $this->input->get_post('home_mobile'),
			'home_email' => $this->input->get_post('home_email'),
           			
		);	
		

		$this->session->set_userdata($userdata);


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2B,cn=cordys,cn=defaultInst106,o=mydomain.com";
		$requestXml = $this->Home_model->generateQuoteXmlHome($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
	

		$output =$this->Common_model->xmlstr_to_array($curl);


		 $apiData = array(
		 	'api_request_home' => $requestXml,
		 	'api_response_home_xml' => $curl,
		 	'api_response_home' => $output,
		 );		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['AmexQuoteHandlerResponse']['PremiumSet']['HMEBenefitDetails'])){
			echo 'success';
		} else {
			echo 'failed';
		}
		

	}


	public function HomePremium() {

		if ($this->session->userdata('logged_in') == TRUE) {

		$api_request = $this->session->userdata('api_request_home');
		$api_response = $this->session->userdata('api_response_home');
		$api_response_tw_xml = $this->session->userdata('api_response_home_xml');
		$responseExtArray = $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['PremiumSet']['HMEBenefitDetails'];
		  $responseExtArrayGold = $responseExtArray['Gold'];
		  $responseExtArrayPlatinum = $responseExtArray['Platinum'];
		  $responseExtArraySilver = $responseExtArray['Silver'];

	$this->data['OrderNo'] = $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['QuoteNo'];
	$this->data['QuoteNo'] = $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['OrderNo'];

  	$premiumGoldBenefitsArray = array(); 
 	foreach ($responseExtArrayGold['Covers'] as $key => $value ){
		$premiumGoldBenefitsArray[] = array(
			'label'=> $value['BenefitType'],
 			'value'=> $value['SumInsured'],
 		);
	}

	$premiumGoldArray = array(
		'planName' => 'GOLD',
		'sumInsured' => $responseExtArrayGold['Covers'][0]['SumInsured'],
		'serviceTax' => round($responseExtArrayGold['PremiumSet']['ServiceTax']),
		'premium' => round($responseExtArrayGold['PremiumSet']['Premium']),
		'premiumPayable' => round($responseExtArrayGold['PremiumSet']['PremiumPayable']),
		'benefits' => $premiumGoldBenefitsArray,
	);



	 $premiumPlatinumBenefitsArray = array(); 
 	foreach ($responseExtArrayPlatinum['Covers'] as $key => $value ){
		$premiumPlatinumBenefitsArray[] = array(
			'label'=> $value['BenefitType'],
 			'value'=> $value['SumInsured'],
 		);
	}

	$premiumPlatinumArray = array(
		'planName' => 'PLATINUM',
		'sumInsured' => $responseExtArrayPlatinum['Covers'][0]['SumInsured'],
		'serviceTax' => round($responseExtArrayPlatinum['PremiumSet']['ServiceTax']),
		'premium' => round($responseExtArrayPlatinum['PremiumSet']['Premium']),
		'premiumPayable' => round($responseExtArrayPlatinum['PremiumSet']['PremiumPayable']),
		'benefits' => $premiumPlatinumBenefitsArray,
	);
	$premiumSilverBenefitsArray = array(); 
 	foreach ($responseExtArraySilver['Covers'] as $key => $value ){
		$premiumSilverBenefitsArray[] = array(
			'label'=> $value['BenefitType'],
 			'value'=> $value['SumInsured'],
 		);
	}

	$premiumSilverArray = array(
		'planName' => 'SILVER',
		'sumInsured' => $responseExtArraySilver['Covers'][0]['SumInsured'],
		'serviceTax' => round($responseExtArraySilver['PremiumSet']['ServiceTax']),
		'premium' => round($responseExtArraySilver['PremiumSet']['Premium']),
		'premiumPayable' => round($responseExtArraySilver['PremiumSet']['PremiumPayable']),
		'benefits' => $premiumSilverBenefitsArray,
	);


	$premiumArray = array(
		'planSilver' =>  $premiumSilverArray,
		'planGold' =>  $premiumGoldArray,
		'planPlatinum' =>  $premiumPlatinumArray,
	);

	$this->data['premiumArray']= $premiumArray;


	$this->data['title']="Premium Response Home";
	$this->data['module'] = 'leads';

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('quote/premium_home',$this->data);
		$this->load->view('layout/footer_inner');

			} else {
			redirect('user', 'refresh');
		}
		

	}



	public function qmscreateQuoteHome(){
		// echo phpinfo();
		// exit();
		if ($this->session->userdata('logged_in') == TRUE) {

		$this->data['stateArray'] = $this->Common_model->getStateList();
		$this->data['sub_module']='Home';
		$this->data['stateArray'] = $this->Common_model->getStateList();
		$this->data['branchLocation'] = $this->Common_model->getBranchLocation();
	    $this->data['CategoryArray'] = $this->Common_model->getCategory();
        $this->data['BusinessArray'] = $this->Common_model->getBusiness();
        $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
        $this->data['PaymentArray'] = $this->Common_model->getPayment();

        $this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('layout/qms_page_header_inner',$this->data);
		$this->load->view('qms_quote/qms_quote_create_home');
		$this->load->view('layout/footer_inner');
	
		} else {
			redirect('user', 'refresh');
		}


	}


	public function qmsCalculatePremiumHome(){

	// echo '<pre>';
	// print_r($_GET);
	// exit();
		$this->data['Home_FirstName'] = $this->input->get_post('home_first_name');
		$this->data['Home_LastName'] = $this->input->get_post('home_last_name');
		$this->data['Home_mx_DOB'] = $this->input->get_post('home_dob');
		$this->data['Home_plans'] = $this->input->get_post('home_plans');
		$this->data['Home_policy_start'] = $this->input->get_post('home_policy_start');
		$this->data['Home_policy_end'] = $this->input->get_post('home_policy_end');
		$this->data['home_mobile'] = $this->input->get_post('home_mobile');
		$this->data['home_email'] = $this->input->get_post('home_email');
		$this->data['Home_mx_City'] = $this->input->get_post('home_city');
		$this->data['Home_mx_State'] = $this->input->get_post('home_state');
       


		$userdata = array(
			'Home_FirstName' => $this->input->get_post('home_first_name') ,
			'Home_LastName' => $this->input->get_post('home_last_name') ,
			'home_dob' => $this->input->get_post('home_dob'),
			'Home_plans' => $this->input->get_post('home_plans'),
            'Home_policy_start' => $this->input->get_post('home_policy_start'),
            'Home_policy_end' => $this->input->get_post('home_policy_end'),
			'home_city' => $this->input->get_post('home_city'),
			'home_state' => $this->input->get_post('home_state'),
			'home_mobile' => $this->input->get_post('home_mobile'),
			'home_email' => $this->input->get_post('home_email'),
		);	
		

		$this->session->set_userdata($userdata);


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2B,cn=cordys,cn=defaultInst106,o=mydomain.com";
		$requestXml = $this->Home_model->generateQuoteXmlHome($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
	

		$output =$this->Common_model->xmlstr_to_array($curl);


// print_r($requestXml);
// exit();

		 $apiData = array(
		 	'api_request_home' => $requestXml,
		 	'api_response_home_xml' => $curl,
		 	'api_response_home' => $output,
		 );		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['AmexQuoteHandlerResponse']['PremiumSet']['HMEBenefitDetails'])){
			echo 'success';
		} else {
			echo 'failed';
		}
		

	}	



	public function qmsHomePremium() {

		if ($this->session->userdata('logged_in') == TRUE) {

			$api_request = $this->session->userdata('api_request_home');
			$api_response = $this->session->userdata('api_response_home');
			$api_response_tw_xml = $this->session->userdata('api_response_home_xml');
			$responseExtArray = $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['PremiumSet']['HMEBenefitDetails'];
		  	$responseExtArrayGold = $responseExtArray['Gold'];
		  	$responseExtArrayPlatinum = $responseExtArray['Platinum'];
		  	$responseExtArraySilver = $responseExtArray['Silver'];

			$this->data['OrderNo'] = $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['QuoteNo'];
			$this->data['QuoteNo'] = $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['OrderNo'];

			$userdata = array(
				'OrderNo' => $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['QuoteNo'],
				'QuoteNo' => $api_response['soapenv:Body']['AmexQuoteHandlerResponse']['OrderNo'],
			);	
			$this->session->set_userdata($userdata);


  			$premiumGoldBenefitsArray = array(); 
		 	foreach ($responseExtArrayGold['Covers'] as $key => $value ){
				$premiumGoldBenefitsArray[] = array(
					'label'=> $value['BenefitType'],
		 			'value'=> $value['SumInsured'],
		 		);
			}

			$premiumGoldArray = array(
				'planName' => 'GOLD',
				'sumInsured' => $responseExtArrayGold['Covers'][0]['SumInsured'],
				'serviceTax' => round($responseExtArrayGold['PremiumSet']['ServiceTax']),
				'premium' => round($responseExtArrayGold['PremiumSet']['Premium']),
				'premiumPayable' => round($responseExtArrayGold['PremiumSet']['PremiumPayable']),
				'benefits' => $premiumGoldBenefitsArray,
			);

			$premiumPlatinumBenefitsArray = array(); 
		 	foreach ($responseExtArrayPlatinum['Covers'] as $key => $value ){
				$premiumPlatinumBenefitsArray[] = array(
					'label'=> $value['BenefitType'],
		 			'value'=> $value['SumInsured'],
		 		);
			}

			$premiumPlatinumArray = array(
				'planName' => 'PLATINUM',
				'sumInsured' => $responseExtArrayPlatinum['Covers'][0]['SumInsured'],
				'serviceTax' => round($responseExtArrayPlatinum['PremiumSet']['ServiceTax']),
				'premium' => round($responseExtArrayPlatinum['PremiumSet']['Premium']),
				'premiumPayable' => round($responseExtArrayPlatinum['PremiumSet']['PremiumPayable']),
				'benefits' => $premiumPlatinumBenefitsArray,
			);
			$premiumSilverBenefitsArray = array(); 
		 	foreach ($responseExtArraySilver['Covers'] as $key => $value ){
				$premiumSilverBenefitsArray[] = array(
					'label'=> $value['BenefitType'],
		 			'value'=> $value['SumInsured'],
		 		);
			}

			$premiumSilverArray = array(
				'planName' => 'SILVER',
				'sumInsured' => $responseExtArraySilver['Covers'][0]['SumInsured'],
				'serviceTax' => round($responseExtArraySilver['PremiumSet']['ServiceTax']),
				'premium' => round($responseExtArraySilver['PremiumSet']['Premium']),
				'premiumPayable' => round($responseExtArraySilver['PremiumSet']['PremiumPayable']),
				'benefits' => $premiumSilverBenefitsArray,
			);

			$premiumArray = array(
				'planSilver' =>  $premiumSilverArray,
				'planGold' =>  $premiumGoldArray,
				'planPlatinum' =>  $premiumPlatinumArray,
			);

			$this->data['premiumArray']= $premiumArray;
			$this->data['title']="Premium Response Home";
			$this->data['module'] = 'leads';

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_quote/qms_premium_home',$this->data);
			$this->load->view('layout/footer_inner');

			} else {
			redirect('user', 'refresh');
		}
		

	}

	public function qmsHomeProposal(){

		if($this->session->userdata('logged_in') == TRUE) {

		$this->data['stateArray'] = $this->Common_model->getStateList();
        $this->data['CategoryArray'] = $this->Common_model->getCategory();
        $this->data['BusinessArray'] = $this->Common_model->getBusiness();
        $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
        $this->data['PaymentArray'] = $this->Common_model->getPayment();
        $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

        $this->data['occupationArray'] = $this->Common_model->getOccupationList();

		$this->data['title']=" Home Proposal";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_proposal_home',$this->data);
		$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}		

	}

	public function premiumUpdateHome()
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

  public function getSessionHome(){


   	$sessionData = array(
  	'home_FirstName' => $this->session->userdata('Home_FirstName'),
  	'home_LastName' => $this->session->userdata('Home_LastName'),
  	'home_dob' => $this->session->userdata('home_dob'),
  	'home_city' => $this->session->userdata('home_city'),
  	'home_state' => $this->session->userdata('home_state'),
  	'home_email' => $this->session->userdata('home_email'),
  	'home_mobile' => $this->session->userdata('home_mobile'),
  	'home_occupation' => $this->session->userdata('home_occupation'),

  	'home_pro_title' => $this->session->userdata('home_pro_title'),
  	'home_pro_add1' => $this->session->userdata('home_pro_add1'),
  	'home_pro_add2' => $this->session->userdata('home_pro_add2'),
  	'home_pro_landmark' => $this->session->userdata('home_pro_landmark'),
  	'home_pro_zip' => $this->session->userdata('home_pro_zip'),
  	'home_pro_gstn' => $this->session->userdata('home_pro_gstn'),
  	'home_pro_nname' => $this->session->userdata('home_pro_nname'),
  	'home_pro_ndob' => $this->session->userdata('home_pro_ndob'),
   	'home_pro_relation' => $this->session->userdata('home_pro_relation'),
   	'home_pro_policy_sdate' => $this->session->userdata('Home_policy_start'),
   	'home_pro_nage' => $this->session->userdata('home_pro_nage'),
   
  	);
  	echo json_encode($sessionData);	
  }

  public function homeProposalInformation(){


		$userdata = array(

		
			'home_pro_policy_sdate'=> $this->input->get_post('home_pro_policy_sdate'),
			'home_pro_title'=> $this->input->get_post('home_pro_title'),
			'home_pro_add1'=> $this->input->get_post('home_pro_add1'),
			'home_pro_add2'=> $this->input->get_post('home_pro_add2'),
			'home_pro_landmark' => $this->input->get_post('home_pro_landmark'),
			'home_pro_zip' => $this->input->get_post('home_pro_zip'),
			'home_pro_gstn' => $this->input->get_post('home_pro_gstn'),
			'home_pro_nname' => $this->input->get_post('home_pro_nname'),
			'home_pro_ndob' => $this->input->get_post('home_pro_ndob'),
			'home_pro_relation' => $this->input->get_post('home_pro_relation'),
			'home_pro_emnum'=> $this->input->get_post('home_pro_emnum'),
			'home_pro_ndob'=> $this->input->get_post('home_pro_ndob'),
			'home_pro_title'=>$this->input->get_post('home_pro_title'),
			'home_occupation'=>$this->input->get_post('home_occupation'),
			'home_pro_nage'=>$this->input->get_post('home_pro_nage'),
			
		);	
		$this->session->set_userdata($userdata);

	}

	public function homeProposalView(){

		if($this->session->userdata('logged_in') == TRUE) {

  		$familyType = trim($this->session->userdata('home_spouse'));
		if($familyType == 0)
			$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		$this->data['home_pro_policy_sdate']=$this->session->userdata('home_pro_policy_sdate');
		$this->data['home_FirstName']=$this->session->userdata('Home_FirstName');
		$this->data['home_LastName']=$this->session->userdata('Home_LastName');
		$this->data['home_dob']=$this->session->userdata('home_dob');
		$this->data['home_city']=$this->session->userdata('home_city');
		$this->data['home_state']=$this->session->userdata('home_state');
		$this->data['home_email']=$this->session->userdata('home_email');
		$this->data['home_mobile']=$this->session->userdata('home_mobile');
		$this->data['home_pro_add1']=$this->session->userdata('home_pro_add1');
		$this->data['home_zip']=$this->session->userdata('home_pro_zip');



		$this->data['PlanName']=$this->session->userdata('PlanName');
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');
			

		$this->data['title']="Personal Accident proposal";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_home_proposal_view',$this->data);
		$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}		
	
	}


	public function homeUpdateProposal(){

		$familyType = trim($this->session->userdata('Spouse_critical'));
		if($familyType == 0)
		$familyType = 'S';
		else 
			$familyType = 'SS';

		$this->data['familyType']=$familyType;
		$this->data['home_pro_policy_sdate']=$this->session->userdata('home_pro_policy_sdate');
		$this->data['home_FirstName']=$this->session->userdata('Home_FirstName');
		$this->data['home_pro_title']=$this->session->userdata('home_pro_title');
		$this->data['home_LastName']=$this->session->userdata('Home_LastName');
		$this->data['home_dob']=$this->session->userdata('home_dob');
		$this->data['home_city']=$this->session->userdata('home_city');
		$this->data['home_state']=$this->session->userdata('home_state');
		$this->data['home_email']=$this->session->userdata('home_email');
		$this->data['home_mobile']=$this->session->userdata('home_mobile');
		$this->data['home_pro_add1']=$this->session->userdata('home_pro_add1');
		$this->data['home_pro_add2']=$this->session->userdata('home_pro_add2');
		
		$this->data['home_pro_landmark']=$this->session->userdata('home_pro_landmark');
		$this->data['home_pro_gstn']=$this->session->userdata('home_pro_gstn');
		$this->data['home_zip']=$this->session->userdata('home_zip');
		
		$this->data['home_occupation']=$this->session->userdata('home_occupation');
		$this->data['home_pro_relation']=$this->session->userdata('home_pro_relation');
		$this->data['home_pro_nname']=$this->session->userdata('home_pro_nname');
		$this->data['home_pro_nage']=$this->session->userdata('home_pro_nage');

		$this->data['OrderNo']=$this->session->userdata('OrderNo');
		$this->data['QuoteNo']=$this->session->userdata('QuoteNo');			
		$this->data['sumInsured']=$this->session->userdata('sumInsured');
		$this->data['cover_code']=$this->session->userdata('cover_code');



		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');




		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2B,cn=cordys,cn=defaultInst106,o=mydomain.com";
		$requestXml = $this->home_proposal_model->generateProposalXmlhome($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
	

		$output =$this->Common_model->xmlstr_to_array($curl);


// print_r($requestXml);
// exit();

		 $apiData = array(
		 	'api_request_home' => $requestXml,
		 	'api_response_home_xml' => $curl,
		 	'api_response_home' => $output,
		 );		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['AmexQuoteHandlerResponse']['PremiumSet']['HMEBenefitDetails'])){
			echo 'success';
		} else {
			echo 'failed';
		}
		

		
	}
	

	public function proposalHomeResult(){
	
		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['title']="Home Proposal";
			$this->data['module'] = 'qms'; 

			$this->data['orderNo']=$this->session->userdata('OrderNo');
			$this->data['quoteNo']=$this->session->userdata('QuoteNo');	
			$this->data['emailId']=$this->session->userdata('home_email');	
			$this->data['custName']=$this->session->userdata('Home_FirstName');	

		
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_proposal/qms_proposal_result_home',$this->data);
			$this->load->view('layout/footer_inner');
		
		} else {
			redirect('user', 'refresh');
		}		
	
	
	}


	public function sess_clrHome() {

         $array_items = array('home_pro_policy_sdate',
         					  'home_pro_title',
         					  'home_pro_add1',
         					  'home_pro_add2',
         					  'home_pro_landmark',
         					  'home_pro_zip',
         					  'home_pro_gstn',
         					  'home_pro_nname',
         					  'home_pro_ndob',
         					  'home_pro_relation',
         					  'home_pro_emnum',
         					  'home_occupation',
         					  'home_pro_nage',
         					  'Home_FirstName',
         					  'Home_LastName',
         					  'home_dob',
         					  'home_city',
         					  'home_state',
         					  'home_email',
         					  'home_mobile',
         					  'Premium',
         					  'ServiceTax',
         					  'PremiumPayable',
         					  'OrderNo',
         					  'QuoteNo',
     );

      	$this->session->unset_userdata($array_items);
      	redirect('create-quote-home', 'refresh');

	 
       
	}





}

