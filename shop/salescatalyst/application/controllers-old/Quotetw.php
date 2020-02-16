<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotetw extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('TwoWheeler_model');
	    $this->load->model('Tw_proposal_model');


		 
	}

	public function createQuoteTW(){

		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['city'] = $this->Common_model->getCityList();
	   		$str = file_get_contents(base_url().'/assets/json/model-make.json');
	      
	        $dataArraycar = json_decode($str, true);
			$dataArraycar = $this->Common_model->array_sort($dataArraycar, 'MANUFACTURE', SORT_ASC);
	         $filtercar = array("FTW");
	         foreach($dataArraycar as $arrcar)
	            {
	                foreach($filtercar as $valuecar)
	                {
	                    if(in_array($valuecar,$arrcar))
	                    {
	                        $dataArraycarnew[]=$arrcar;
	                    }
	                }
	            }
	        $carbrandArray = array_unique(array_filter(array_column($dataArraycarnew,'MANUFACTURE')));
	        $hashBrandCategoriesedcar = array();
	        $brandVariantscar = array();
	        foreach($dataArraycar as $eachDataCar){
	            $carmanufacture = $eachDataCar['MANUFACTURE'] ? $eachDataCar['MANUFACTURE'] : '';
	            $carvariant = $eachDataCar['VARIANT'] ? $eachDataCar['VARIANT'] : '';
	            $carmodel = $eachDataCar['MODEL'] ? $eachDataCar['MODEL'] : '';
	            $carEX_SHOWROOM_PRICE = $eachDataCar['EX_SHOWROOM_PRICE'] ? $eachDataCar['EX_SHOWROOM_PRICE'] : '';
	            $carhashKey = base64_encode($carmanufacture.$carvariant);
	            $carmhashKey = base64_encode($carmodel.'-'.$carvariant);
	            $carhashBrandCategoriesed[$carhashKey] = $eachDataCar;
	            $carmhashBrandCategoriesed[$carmhashKey] = $carEX_SHOWROOM_PRICE;
	            $carbrandVariants[$carmanufacture][] = $carvariant;
	            $carmbrandVariants[$carmanufacture][] = $carmodel.'-'.$carvariant;
	        }

	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carbrandArray'] = $carbrandArray;
	        $this->data['carbrandVariants'] = $carbrandVariants;
	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carhashBrandCategoriesed'] = $carhashBrandCategoriesed;
	       	$this->data['carmhashBrandCategoriesed'] = $carmhashBrandCategoriesed;
	        $this->data['carmhashKey'] = $carmhashKey;
	        $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();

            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();

            $this->data['module'] = 'leads';

			$this->data['sub_module'] = 'Two Wheeler'; 
			

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/page_header_inner',$this->data);
			$this->load->view('quote/quote_create_two_wheeler',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}		

	}	




	public function calculatePremiumTW(){



		$this->data['voluntaryDeductible'] = $this->input->get_post('voluntaryDeductible');
		$this->data['driverLibillity'] = $this->input->get_post('driverLibillity');
		$this->data['restrictTPPDCover'] = $this->input->get_post('restrictTPPDCover');

	

		$this->data['registration'] = $this->input->get_post('registration');
		$this->data['manufacture'] = $this->input->get_post('manufacture');
		$this->data['yearTw'] = $this->input->get_post('yearTw');
		$this->data['carvariant'] = $this->input->get_post('carvariant');
		$this->data['mobiletwo'] = $this->input->get_post('mobiletwo');
		$this->data['emailtwo'] = $this->input->get_post('emailtwo');
		$this->data['twocity'] = $this->input->get_post('twocity');
		$this->data['expiringtwo'] = $this->input->get_post('expiringtwo');
		$this->data['clientType'] = $this->input->get_post('clientType');
		$this->data['claimtwo'] = $this->input->get_post('claimtwo');
		$this->data['startdatetwo'] = $this->input->get_post('startdatetwo');
		$this->data['enddatetwo'] = $this->input->get_post('enddatetwo');
		$this->data['ncbtwo'] = $this->input->get_post('ncbtwo');
		$this->data['mx_tenure'] = $this->input->get_post('mx_tenure');
		$this->data['idvamount'] = $this->input->get_post('idvamount');
		$this->data['caramount'] = $this->input->get_post('caramount');
		$this->data['targetDate'] = $this->input->get_post('tw_mx_Target_Date');
		$this->data['twoState'] = $this->input->get_post('carState');
		$this->data['tw_reg_city'] = $this->input->get_post('twocity');



		$userdata = array(
			'tw_registration' => $this->input->get_post('registration'),
			'tw_manufacture' => $this->input->get_post('manufacture'),
			'tw_yearTw' => $this->input->get_post('yearTw'),
			'tw_carvariant' => $this->input->get_post('carvariant'),
			'tw_mobiletwo' => $this->input->get_post('mobiletwo'),
			'tw_emailtwo' => $this->input->get_post('emailtwo'),
			'tw_twocity' => $this->input->get_post('tw_city'),
			'tw_expiringtwo' => $this->input->get_post('expiringtwo'),
			'tw_clientType' => $this->input->get_post('clientType'),
			'tw_claimtwo' => $this->input->get_post('claimtwo'),
			'tw_startdatetwo' => $this->input->get_post('startdatetwo'),
			'tw_enddatetwo' => $this->input->get_post('enddatetwo'),
			'tw_ncbtwo' => $this->input->get_post('ncbtwo'),
			'tw_mx_tenure' => $this->input->get_post('mx_tenure'),
			'tw_idvamount' => $this->input->get_post('idvamount'),
			'tw_caramount' => $this->input->get_post('caramount'),
			'twoState' => $this->input->get_post('carState'),
			'targetDate' => $this->input->get_post('tw_mx_Target_Date'),
			'tw_reg_city' => $this->input->get_post('tw_reg_city'),


			'tw_mx_Category' => $this->input->get_post('tw_mx_Category'),
			'tw_mx_Line_of_Business' => $this->input->get_post('tw_mx_Line_of_Business'),
			'tw_mx_HDFC_Branch_Location' => $this->input->get_post('tw_mx_HDFC_Branch_Location'),
			'tw_mx_HDFC_Ergo_Location' => $this->input->get_post('tw_mx_HDFC_Ergo_Location'),
			'tw_mx_Priority' => $this->input->get_post('tw_mx_Priority'),
			'tw_mx_Target_Date' => $this->input->get_post('tw_mx_Target_Date'),
			'tw_mx_TSE_BDR_Code' => $this->input->get_post('tw_mx_TSE_BDR_Code'),
			'tw_mx_TL_Code' => $this->input->get_post('tw_mx_TL_Code'),
			'tw_mx_SM_Code' => $this->input->get_post('tw_mx_SM_Code'),
			'tw_mx_Bank_Verifier_ID' => $this->input->get_post('tw_mx_Bank_Verifier_ID'),
			'tw_mx_Payment_Type' => $this->input->get_post('tw_mx_Payment_Type'),
			'tw_mx_Sub_Channel' => $this->input->get_post('tw_mx_Sub_Channel'),
			'tw_mx_HDFC_Card_Relationship_No' => $this->input->get_post('tw_mx_HDFC_Card_Relationship_No'),
			'tw_mx_HDFC_Card_Last_4_digits' => $this->input->get_post('tw_mx_HDFC_Card_Last_4_digits'),
			'tw_FirstName' => $this->input->get_post('tw_FirstName'),
			'tw_LastName' => $this->input->get_post('tw_LastName') ,
			'tx_dob' => $this->input->get_post('tx_dob'),
			'tw_mx_Customer_Gender' => $this->input->get_post('tw_mx_Customer_Gender'),
			'tw_mx_Case_id' => $this->input->get_post('tw_mx_Case_id'),
			'tw_mx_PAN_Card' => $this->input->get_post('tw_mx_PAN_Card'),
			'tw_mx_Street1' => $this->input->get_post('tw_mx_Street1'),
			'tw_mx_Street2' => $this->input->get_post('tw_mx_Street2'),
			'tw_mx_Area' => $this->input->get_post('tw_mx_Area'),
			'tw_mx_City' => $this->input->get_post('tw_mx_City'),
			'tw_mx_State' => $this->input->get_post('tw_mx_State'),
			'tw_mx_Zip' => $this->input->get_post('tw_mx_Zip'),
			'tw_Notes' => $this->input->get_post('tw_Notes'),
			'emailtwo' => $this->input->get_post('emailtwo'),
			'mobiletwo' => $this->input->get_post('mobiletwo'),
            'policytypetwo' => $this->input->get_post('policytypetwo'),			
		);	
		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->TwoWheeler_model->generateQuoteXmlTwoWheeler($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);
// print_r($requestXml);
// exit();
		$apiData = array(
		 	'api_request_tw' => $requestXml,
		 	'api_response_tw_xml' => $curl,
		 	'api_response_tw' => $output,
		);		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
			
		}

	}


	public function twoWheelerPremium(){

	if ($this->session->userdata('logged_in') == TRUE) {	

		$api_request = $this->session->userdata('api_request_tw');
		$api_response = $this->session->userdata('api_response_tw');
		$api_response_tw_xml = $this->session->userdata('api_response_tw_xml');
		

		$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];



		$premiumArray = $responseExtArray['PremiumSet']['Cover'];

		if($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']){
			$this->data['ODDeductiblePremium']= round($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']);
			$this->data['selDeduct'] = round($premiumArray['0']['ExtraDetails']['Deductible']);
		}else {
			$this->data['ODDeductiblePremium']= 0;
			$this->data['selDeduct'] = 0;
		}

		if($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']){
			$this->data['LLDriverPremium']= round($premiumArray['1']['ExtraDetails']['BreakUp']['LLDriver']);
			$this->data['driverLibillity'] = 'True';
		}else {
			$this->data['LLDriverPremium']= 0;
			$this->data['driverLibillity'] = 'False';
		}

		if($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']){
			$this->data['TPPDPremium']= round($premiumArray['1']['ExtraDetails']['BreakUp']['TPPD']);
			$this->data['TPPDSelect'] = 'True';
		}else {
			$this->data['TPPDPremium']= 0;
			$this->data['TPPDSelect'] = 'False';
		}

		$this->data['PAFDeductPremium'] = 0;


		$this->data['OrderNo'] = $responseExtArray['OrderNo'];
		$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];


		$this->data['taxValue'] = $responseExtArray['PremiumSet']['ServiceTax'];

		$userdata = array(
				'orderNo' => $responseExtArray['OrderNo'],
				'quoteNo' => $responseExtArray['QuoteNo'],
		);	
		$this->session->set_userdata($userdata);	
		
		$prAmt = 0;
		$prDesc =''; 
		$prDescArray = array();
		foreach ($premiumArray as $key => $value ){
		    $prAmt =  $prAmt + $value['Premium'];
		    
		    if($value['Premium'] != 0)
		    $prDescArray[$key] = $value['Desc'];    

		}

		$this->data['prAmt'] = $prAmt;
		$this->data['prDescArray'] = $prDescArray;
		$this->data['prAmt'] = round($prAmt);
		$this->data['totalPremium'] = $this->data['prAmt'] + $this->data['taxValue'];

		
		$output1 =$this->Common_model->xmlstr_to_array($api_request);
		$premiumRequest = $output1['soapenv:Body']['prov:serve']['prov:SessionDoc']['Session'];
		$vechicleDetails = $premiumRequest['tns:Vehicle'];

		$this->data['vechicleModal'] = $vechicleDetails['tns:Make'].' '.$vechicleDetails['tns:Model'].''.$vechicleDetails['tns:Variant'];
		$this->data['IDVValue'] = round($vechicleDetails['tns:IDV']);
		$this->data['cityOfRegistration'] = $vechicleDetails['tns:PlaceOfRegistration'];
		$this->data['dateOfManufacture'] = $vechicleDetails['tns:DateOfManufacture'];
		$existingPolicy = $premiumRequest['tns:Quote'];
		$this->data['policyExpiryDate'] = date('d/m/Y',strtotime($existingPolicy['tns:ExistingPolicy']['tns:EndDate']));
		$this->data['policyExpiry'] = $existingPolicy['tns:ExistingPolicy']['tns:Claims'];
		$this->data['NCBExpiry'] = $existingPolicy['tns:ExistingPolicy']['tns:NCB'];




		$helpArray = array(
				'Voluntary_Deductible'=>'Voluntary deductible is the minimum amount that you declare to bear at the time of claim. For example, you opt for a voluntary deductible of Rs. 5,000 and raise a claim of Rs. 22,000 for an accident later in the year. In this scenario, the insurance company will deduct Rs. 5,000 from the claim amount (Rs. 22,000) - and the eligible claim will thus be Rs. 17,000.When you opt for a voluntary deductible, you are eligible for a discount on your premium. Higher the voluntary deductible chose, high is the discount. You can choose not to opt for a voluntary deductible by leaving it zero or nil.',
				
				'Legal_Liability'=>'Legal liability to driver covers the legal compensation claimed by the paid driver in case of accidental damage or loss. The insurance company would be liable for any personal injury to paid driver, conductor or cleaner while in service of the insured in connection with the vehicle insured under the WC Act , 1923.',

				
				
				'Restrict_TPPD'=>'Restrict_TPPD',
				
			);
			$this->data['helpArray'] = $helpArray;

		$this->data['title']="Two Wheelar";
		 $this->data['module'] = 'qms';

		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('quote/two_wheeler_premium',$this->data);
		$this->load->view('layout/footer_inner');
} else {
	redirect('user', 'refresh');
}

	}		


	public function sendQuote()
	{

		$orderNo = $this->input->get_post('OrderNo');
        $quoteNo = $this->input->get_post('QuoteNo');



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


	public function calculatePremiumTWRepeate(){

		$this->data['voluntaryDeductible'] = $this->input->get_post('voluntaryDeductible');
		$this->data['driverLibillity'] = $this->input->get_post('driverLibillity');
		$this->data['restrictTPPDCover'] = $this->input->get_post('restrictTPPDCover');

		$this->data['registration'] = $this->session->userdata('tw_registration');
		$this->data['manufacture'] = $this->session->userdata('tw_manufacture');
		$this->data['yearTw'] = $this->session->userdata('tw_yearTw');
		$this->data['carvariant'] = $this->session->userdata('tw_carvariant');
		$this->data['mobiletwo'] = $this->session->userdata('tw_mobiletwo');
		$this->data['emailtwo'] = $this->session->userdata('tw_emailtwo');
		$this->data['twocity'] = $this->session->userdata('tw_twocity');
		$this->data['expiringtwo'] = $this->session->userdata('tw_expiringtwo');
		$this->data['clientType'] = $this->session->userdata('tw_clientType');
		$this->data['claimtwo'] = $this->session->userdata('tw_claimtwo');
		$this->data['startdatetwo'] = $this->session->userdata('tw_startdatetwo');
		$this->data['enddatetwo'] = $this->session->userdata('tw_enddatetwo');
		$this->data['ncbtwo'] = $this->session->userdata('tw_ncbtwo');
		$this->data['mx_tenure'] = $this->session->userdata('tw_mx_tenure');
		$this->data['idvamount'] = $this->session->userdata('tw_idvamount');
		$this->data['caramount'] = $this->session->userdata('tw_caramount');
		$this->data['targetDate'] = $this->session->userdata('tw_mx_Target_Date');
		$this->data['twoState'] = $this->session->userdata('tw_mx_State');
		$this->data['twoState'] = $this->session->userdata('carState');
		$this->data['tw_reg_city'] = $this->session->userdata('tw_reg_city');


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->TwoWheeler_model->generateQuoteXmlTwoWheeler($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);
		
		 $apiData = array(
		 	'api_request_tw' => $requestXml,
		 	'api_response_tw_xml' => $curl,
		 	'api_response_tw' => $output,
		 );		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
			
		}		

	}


	public function qmsCreateQuoteTW(){

		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['city'] = $this->Common_model->getCityList();
	   		$str = file_get_contents(base_url().'/assets/json/model-make.json');
	      
	        $dataArraycar = json_decode($str, true);
			$dataArraycar = $this->Common_model->array_sort($dataArraycar, 'MANUFACTURE', SORT_ASC);
	         $filtercar = array("FTW");
	         foreach($dataArraycar as $arrcar)
	            {
	                foreach($filtercar as $valuecar)
	                {
	                    if(in_array($valuecar,$arrcar))
	                    {
	                        $dataArraycarnew[]=$arrcar;
	                    }
	                }
	            }
	        $carbrandArray = array_unique(array_filter(array_column($dataArraycarnew,'MANUFACTURE')));
	        $hashBrandCategoriesedcar = array();
	        $brandVariantscar = array();
	        foreach($dataArraycar as $eachDataCar){
	            $carmanufacture = $eachDataCar['MANUFACTURE'] ? $eachDataCar['MANUFACTURE'] : '';
	            $carvariant = $eachDataCar['VARIANT'] ? $eachDataCar['VARIANT'] : '';
	            $carmodel = $eachDataCar['MODEL'] ? $eachDataCar['MODEL'] : '';
	            $carEX_SHOWROOM_PRICE = $eachDataCar['EX_SHOWROOM_PRICE'] ? $eachDataCar['EX_SHOWROOM_PRICE'] : '';
	            $carhashKey = base64_encode($carmanufacture.$carvariant);
	            $carmhashKey = base64_encode($carmodel.'-'.$carvariant);
	            $carhashBrandCategoriesed[$carhashKey] = $eachDataCar;
	            $carmhashBrandCategoriesed[$carmhashKey] = $carEX_SHOWROOM_PRICE;
	            $carbrandVariants[$carmanufacture][] = $carvariant;
	            $carmbrandVariants[$carmanufacture][] = $carmodel.'-'.$carvariant;

 				$carCC = $eachDataCar['CC'] ? $eachDataCar['CC'] : '';
				$carCCCategoriesed[$carmhashKey] = $carCC;
 				$carFUEL = $eachDataCar['FUEL'] ? $eachDataCar['FUEL'] : '';
				$carFUELCategoriesed[$carmhashKey] = $carFUEL;

 				$carSEATING = $eachDataCar['SEATING_CAPACITY'] ? $eachDataCar['SEATING_CAPACITY'] : '';
				$carSEATINGCategoriesed[$carmhashKey] = $carSEATING;

	        }


	        $this->data['carCCCategoriesed'] = $carCCCategoriesed;
	        $this->data['carFUELCategoriesed'] = $carFUELCategoriesed;
	        $this->data['carSEATINGCategoriesed'] = $carSEATINGCategoriesed;
	        
	        
	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carbrandArray'] = $carbrandArray;
	        $this->data['carbrandVariants'] = $carbrandVariants;
	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carhashBrandCategoriesed'] = $carhashBrandCategoriesed;
	       	$this->data['carmhashBrandCategoriesed'] = $carmhashBrandCategoriesed;
	        $this->data['carmhashKey'] = $carmhashKey;
	        $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();

            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();

           
            $this->data['module'] = 'qms'; 
			$this->data['sub_module'] = 'Two Wheeler'; 
			

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/qms_page_header_inner',$this->data);
			$this->load->view('qms_quote/qms_quote_create_two_wheeler',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}		

	}	




  public function qmsCalculatePremiumTW(){



		$this->data['voluntaryDeductible'] = $this->input->get_post('voluntaryDeductible');
		$this->data['driverLibillity'] = $this->input->get_post('driverLibillity');
		$this->data['restrictTPPDCover'] = $this->input->get_post('restrictTPPDCover');

	
		$ncbValue = $this->input->get_post('tw_ncb_value');

		if($ncbValue == ''){

			$ncbValue = 0;
		}

		$this->data['registration'] = $this->input->get_post('tw_reg_no');
		$this->data['manufacture'] = $this->input->get_post('tw_manufacturer');
		$this->data['yearTw'] = $this->input->get_post('tw_manufacture_year');
		$this->data['carvariant'] = $this->input->get_post('tw_variant');
		$this->data['mobiletwo'] = $this->input->get_post('tw_mobile');
		$this->data['emailtwo'] = $this->input->get_post('tw_email');
		$this->data['twocity'] = $this->input->get_post('tw_reg_city');
		$this->data['expiringtwo'] = $this->input->get_post('tw_prv_policy');
		$this->data['clientType'] = $this->input->get_post('tw_client_type');
		$this->data['claimtwo'] = $this->input->get_post('tw_claim_policy');
		$this->data['startdatetwo'] = $this->input->get_post('tw_prv_plcy_start_date');
		$this->data['enddatetwo'] = $this->input->get_post('tw_prv_plcy_end_date');
		$this->data['ncbtwo'] = $ncbValue;
		$this->data['mx_tenure'] = $this->input->get_post('tw_tenure');
		$this->data['idvamount'] = $this->input->get_post('car_idvamount');
		$this->data['caramount'] = $this->input->get_post('caractualamount');
		$this->data['twoState'] = $this->input->get_post('carState');
		$this->data['tw_reg_city'] = $this->input->get_post('tw_reg_city');



		$userdata = array(
			'tw_registration' => $this->input->get_post('tw_reg_no'),
			'tw_manufacture' => $this->input->get_post('tw_manufacturer'),
			'tw_yearTw' => $this->input->get_post('tw_manufacture_year'),
			'tw_carvariant' => $this->input->get_post('tw_variant'),
			'tw_mobiletwo' => $this->input->get_post('tw_mobile'),
			'tw_emailtwo' => $this->input->get_post('tw_email'),
			'tw_twocity' => $this->input->get_post('tw_city'),
			'tw_expiringtwo' => $this->input->get_post('tw_prv_policy'),
			'tw_clientType' => $this->input->get_post('tw_client_type'),
			'tw_claimtwo' => $this->input->get_post('tw_claim_policy'),
			'tw_startdatetwo' => $this->input->get_post('tw_prv_plcy_start_date'),
			'tw_enddatetwo' => $this->input->get_post('tw_prv_plcy_end_date'),
			'tw_ncbtwo' => $ncbValue,
			'tw_mx_tenure' => $this->input->get_post('tw_tenure'),
			'tw_idvamount' => $this->input->get_post('car_idvamount'),
			'tw_caramount' => $this->input->get_post('tw_amount'),
			'twoState' => $this->input->get_post('tw_state'),
			'tw_reg_city' => $this->input->get_post('tw_reg_city'),
			'tw_first_name'=>$this->input->get_post('tw_first_name'),
			'tw_last_name'=>$this->input->get_post('tw_last_name'),
			'tw_dob'=>$this->input->get_post('tw_dob'),
			'car_cc'=>$this->input->get_post('car_cc'),
			'car_fuel'=>$this->input->get_post('car_fuel'),
			'car_seating'=>$this->input->get_post('car_seating'),
			'tw_zip'=>$this->input->get_post('tw_zip'),
			'tw_reg_state'=>$this->input->get_post('carState'),

		);

		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->TwoWheeler_model->generateQuoteXmlTwoWheeler($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);
// print_r($requestXml);
// exit();


		$apiData = array(
		 	'api_request_tw' => $requestXml,
		 	'api_response_tw_xml' => $curl,
		 	'api_response_tw' => $output,
		);		
		$this->session->set_userdata($apiData);

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
			
		}
			

	}


	public function qmsTwoWheelerPremium(){


		if ($this->session->userdata('logged_in') == TRUE) {	

			$api_request = $this->session->userdata('api_request_tw');
			$api_response = $this->session->userdata('api_response_tw');
			$api_response_tw_xml = $this->session->userdata('api_response_tw_xml');
			

			$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];



			$premiumArray = $responseExtArray['PremiumSet']['Cover'];

			if($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']){
				$this->data['ODDeductiblePremium']= round($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']);
				$this->data['selDeduct'] = round($premiumArray['0']['ExtraDetails']['Deductible']);
			}else {
				$this->data['ODDeductiblePremium']= 0;
				$this->data['selDeduct'] = 0;
			}

			if($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']){
				$this->data['LLDriverPremium']= round($premiumArray['1']['ExtraDetails']['BreakUp']['LLDriver']);
				$this->data['driverLibillity'] = 'True';
			}else {
				$this->data['LLDriverPremium']= 0;
				$this->data['driverLibillity'] = 'False';
			}

			if($premiumArray['0']['ExtraDetails']['BreakUp']['ODDeductible']){
				$this->data['TPPDPremium']= round($premiumArray['1']['ExtraDetails']['BreakUp']['TPPD']);
				$this->data['TPPDSelect'] = 'True';
			}else {
				$this->data['TPPDPremium']= 0;
				$this->data['TPPDSelect'] = 'False';
			}

			$this->data['PAFDeductPremium'] = 0;


			$this->data['OrderNo'] = $responseExtArray['OrderNo'];
			$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];
			$this->data['taxValue'] = $responseExtArray['PremiumSet']['ServiceTax'];
		$userdata = array(
				'orderNo' => $responseExtArray['OrderNo'],
				'quoteNo' => $responseExtArray['QuoteNo'],
		);	
		$this->session->set_userdata($userdata);

			$prAmt = 0;
			$prDesc =''; 
			$prDescArray = array();
			foreach ($premiumArray as $key => $value ){
			    $prAmt =  $prAmt + $value['Premium'];
			    
			    if($value['Premium'] != 0)
			    $prDescArray[$key] = $value['Desc'];    

			}

			$this->data['prAmt'] = $prAmt;
			$this->data['prDescArray'] = $prDescArray;
			$this->data['prAmt'] = round($prAmt);
			$this->data['totalPremium'] = $this->data['prAmt'] + $this->data['taxValue'];

			
			$output1 =$this->Common_model->xmlstr_to_array($api_request);
			$premiumRequest = $output1['soapenv:Body']['prov:serve']['prov:SessionDoc']['Session'];
			$vechicleDetails = $premiumRequest['tns:Vehicle'];

			$this->data['vechicleModal'] = $vechicleDetails['tns:Make'].' '.$vechicleDetails['tns:Model'].''.$vechicleDetails['tns:Variant'];
			$this->data['IDVValue'] = round($vechicleDetails['tns:IDV']);
			$this->data['cityOfRegistration'] = $vechicleDetails['tns:PlaceOfRegistration'];
			$this->data['dateOfManufacture'] = $vechicleDetails['tns:DateOfManufacture'];
			$existingPolicy = $premiumRequest['tns:Quote'];
			$this->data['policyExpiryDate'] = date('d/m/Y',strtotime($existingPolicy['tns:ExistingPolicy']['tns:EndDate']));
			$this->data['policyExpiry'] = $existingPolicy['tns:ExistingPolicy']['tns:Claims'];
			$this->data['NCBExpiry'] = $existingPolicy['tns:ExistingPolicy']['tns:NCB'];



	

			$helpArray = array(
					'Voluntary_Deductible'=>'Voluntary deductible is the minimum amount that you declare to bear at the time of claim. For example, you opt for a voluntary deductible of Rs. 5,000 and raise a claim of Rs. 22,000 for an accident later in the year. In this scenario, the insurance company will deduct Rs. 5,000 from the claim amount (Rs. 22,000) - and the eligible claim will thus be Rs. 17,000.When you opt for a voluntary deductible, you are eligible for a discount on your premium. Higher the voluntary deductible chose, high is the discount. You can choose not to opt for a voluntary deductible by leaving it zero or nil.',
					
					'Legal_Liability'=>'Legal liability to driver covers the legal compensation claimed by the paid driver in case of accidental damage or loss. The insurance company would be liable for any personal injury to paid driver, conductor or cleaner while in service of the insured in connection with the vehicle insured under the WC Act , 1923.',

					
					
					'Restrict_TPPD'=>'Restrict_TPPD',
					
				);
				$this->data['helpArray'] = $helpArray;

			$this->data['title']="Two Wheelar";
			 $this->data['module'] = 'qms';

			
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_quote/qms_two_wheeler_premium',$this->data);
			$this->load->view('layout/footer_inner');


	     } else {
		redirect('user', 'refresh');
	     }

	     


	}


	public function qmsCalculatePremiumTWRepeate(){

		$this->data['voluntaryDeductible'] = $this->input->get_post('voluntaryDeductible');
		$this->data['driverLibillity'] = $this->input->get_post('driverLibillity');
		$this->data['restrictTPPDCover'] = $this->input->get_post('restrictTPPDCover');

		$this->data['registration'] = $this->session->userdata('tw_registration');
		$this->data['manufacture'] = $this->session->userdata('tw_manufacture');
		$this->data['yearTw'] = $this->session->userdata('tw_yearTw');
		$this->data['carvariant'] = $this->session->userdata('tw_carvariant');
		$this->data['mobiletwo'] = $this->session->userdata('tw_mobiletwo');
		$this->data['emailtwo'] = $this->session->userdata('tw_emailtwo');
		$this->data['twocity'] = $this->session->userdata('tw_reg_city');
		$this->data['expiringtwo'] = $this->session->userdata('tw_expiringtwo');
		$this->data['clientType'] = $this->session->userdata('tw_clientType');
		$this->data['claimtwo'] = $this->session->userdata('tw_claimtwo');
		$this->data['startdatetwo'] = $this->session->userdata('tw_startdatetwo');
		$this->data['enddatetwo'] = $this->session->userdata('tw_enddatetwo');
		$this->data['ncbtwo'] = $this->session->userdata('tw_ncbtwo');
		$this->data['mx_tenure'] = $this->session->userdata('tw_mx_tenure');
		$this->data['idvamount'] = $this->session->userdata('tw_idvamount');
		$this->data['caramount'] = $this->session->userdata('tw_caramount');
		$this->data['targetDate'] = $this->session->userdata('tw_mx_Target_Date');
		$this->data['twoState'] = $this->session->userdata('tw_reg_state');
		//$this->data['twoState'] = $this->session->userdata('carState');
		$this->data['tw_reg_city'] = $this->session->userdata('tw_reg_city');


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->TwoWheeler_model->generateQuoteXmlTwoWheeler($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		 $apiData = array(
		 	'api_request_tw' => $requestXml,
		 	'api_response_tw_xml' => $curl,
		 	'api_response_tw' => $output,
		);		
		$this->session->set_userdata($apiData);



		// print_r($requestXml);
		// exit();

		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
			echo 'success';
		} else {
			echo 'failed';
			
		}		

	}


	

	


	public function twoWheelerProposal()
	{

		    $this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

		$this->data['title']="Two-Wheeler Propsal";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_proposal_two_wheeler',$this->data);
		$this->load->view('layout/footer_inner');

	}


	public function getSessionValuesTW()
 	{
    	$sessionData = array(
   		   'tw_first_name' => $this->session->userdata('tw_first_name'),
   		   'tw_last_name' => $this->session->userdata('tw_last_name'),
   		   'tw_dob' => $this->session->userdata('tw_dob'),
   		   'tw_city' => $this->session->userdata('tw_twocity'),
   		   'tw_state' => $this->session->userdata('twoState'),
   		   'tw_email' => $this->session->userdata('tw_emailtwo'),
   		   'tw_mobile' => $this->session->userdata('tw_mobiletwo'),
   		   'tw_registration' => $this->session->userdata('tw_registration'),
   		   

   		    'tw_pro_gender' => $this->session->userdata('tw_pro_gender'),
   		    'tw_pro_marital'=> $this->session->userdata('tw_pro_material'),
		    'tw_pro_engine_num'=> $this->session->userdata('tw_pro_engine_num'),
			'tw_pro_chasis_num'=> $this->session->userdata('tw_pro_chasis_num'),
			'tw_pro_regis_date' => $this->session->userdata('tw_pro_regis_date'),
			'tw_pro_nname' => $this->session->userdata('tw_pro_nname'),
			'tw_pro_nage' => $this->session->userdata('tw_pro_nage'),
			'tw_pro_nomie_relation' => $this->session->userdata('tw_pro_nomie_relation'),
			'tw_pro_nameofappoint' => $this->session->userdata('tw_pro_nameofappoint'),
			'tw_pro_appoint_relation' => $this->session->userdata('tw_pro_appoint_relation'),
			'tw_pro_add1' => $this->session->userdata('tw_pro_add1'),
			'tw_pro_new_policy_start' => $this->session->userdata('tw_pro_new_policy_start'),
			'tw_pro_emergency' => $this->session->userdata('tw_pro_emergency'),
			'tw_pro_zip' => '643554',
			'tw_pro_occupation' => $this->session->userdata('tw_pro_occupation'),
			'tw_pro_add2' => $this->session->userdata('tw_pro_add2'),
			'tw_pro_emergency' => $this->session->userdata('tw_pro_emergency'),
			'tw_pro_landmark' => $this->session->userdata('tw_pro_landmark'),
			'tw_pro_gstn' => $this->session->userdata('tw_pro_gstn'),
			'tw_pro_existing_policynum'=> $this->session->userdata('tw_pro_existing_policynum'),
   	   		'tw_prop_existing_insure'=> $this->session->userdata('tw_prop_existing_insure'),
   	   		'tw_pro_drive_two'=> $this->session->userdata('tw_pro_drive_two'),
   	   		'tw_pro_parking'=> $this->session->userdata('tw_pro_parking'),
   	   		'tw_pro_existing_policy_expiry' =>$this->session->userdata('tw_pro_existing_policy_expiry'),
   	   		'tw_pro_who_drive'=> $this->session->userdata('tw_pro_who_drive'),
   	   		'tw_pro_kms'=> $this->session->userdata('tw_pro_kms'),
   	   		'tw_pro_ydage'=> $this->session->userdata('tw_pro_ydage'),
   	   		

  		);
  		echo json_encode($sessionData);		
	}

		public function premiumUpdate()
		{
	      $userdata = array(
			
			'Premium' => $this->input->get_post('Premium'),
			'ServiceTax' => $this->input->get_post('ServiceTax'),
			'PremiumPayable' => $this->input->get_post('PremiumPayable'),
			
		);	
	   	$this->session->set_userdata($userdata);
	   }
	



		public function premiumInformation(){


		$userdata = array(

			
			'tw_pro_material'=> $this->input->get_post('tw_pro_material'),
			'tw_pro_gender'=> $this->input->get_post('tw_pro_gender'),
			'tw_pro_engine_num'=> $this->input->get_post('tw_pro_engine_num'),
			'tw_pro_chasis_num'=> $this->input->get_post('tw_pro_chasis_num'),
			'tw_pro_regis_date' => $this->input->get_post('tw_pro_regis_date'),
			'tw_pro_nname' => $this->input->get_post('tw_pro_nname'),
			'tw_pro_nage' => $this->input->get_post('tw_pro_nage'),
			'tw_pro_nomie_relation' => $this->input->get_post('tw_pro_nomie_relation'),
			'tw_pro_nameofappoint' => $this->input->get_post('tw_pro_nameofappoint'),
			'tw_pro_appoint_relation' => $this->input->get_post('tw_pro_appoint_relation'),
			'tw_pro_add1' => $this->input->get_post('tw_pro_add1'),
			'tw_pro_new_policy_start' => $this->input->get_post('tw_pro_new_policy_start'),
			'tw_pro_emergency' => $this->input->get_post('tw_pro_emergency'),
			// 'tw_pro_zip' => '643554',
			'tw_pro_occupation' => $this->input->get_post('tw_pro_occupation'),
			'tw_pro_add2' => $this->input->get_post('tw_pro_add2'),
			'tw_prop_existing_insure'=> $this->input->get_post('tw_prop_existing_insure'),
			'tw_pro_existing_policynum'=> $this->input->get_post('tw_pro_existing_policynum'),
			'tw_pro_existing_policy_expiry'=> $this->input->get_post('tw_pro_existing_policy_expiry'),
			'tw_pro_landmark'=> $this->input->get_post('tw_pro_landmark'),
			'tw_pro_gstn'=> $this->input->get_post('tw_pro_gstn'),
			'tw_pro_drive_two'=> $this->input->get_post('tw_pro_drive_two'),

			'tw_pro_parking'=> $this->input->get_post('tw_pro_parking'),
			'tw_pro_who_drive'=> $this->input->get_post('tw_pro_who_drive'),
			'tw_pro_kms'=> $this->input->get_post('tw_pro_kms'),
			'tw_pro_ydage'=> $this->input->get_post('tw_pro_ydage'),
		);	
		$this->session->set_userdata($userdata);

	}

	public function viewPropsal(){


		
		
		$this->data['tw_first_name']=$this->session->userdata('tw_first_name');
		$this->data['tw_last_name']=$this->session->userdata('tw_last_name');
		$this->data['tw_dob']=$this->session->userdata('tw_dob');
		
		$this->data['tw_city']=$this->session->userdata('tw_twocity');
		$this->data['tw_state']=$this->session->userdata('twoState');
		$this->data['tw_email']=$this->session->userdata('tw_emailtwo');
		$this->data['tw_mobile']=$this->session->userdata('tw_mobiletwo');

		$this->data['tw_idvamount']=$this->session->userdata('tw_idvamount');
		$this->data['tw_ncbtwo']=$this->session->userdata('tw_ncbtwo');
		$this->data['car_cc']=$this->session->userdata('car_cc');
		$this->data['car_seating']=$this->session->userdata('car_seating');
		$this->data['car_fuel']=$this->session->userdata('car_fuel');
		$this->data['tw_manufacture']=$this->session->userdata('tw_manufacture');
		$this->data['tw_carvariant']=$this->session->userdata('tw_carvariant');
		$this->data['tw_pro_nname']=$this->session->userdata('tw_pro_nname');
		$this->data['tw_pro_add1']=$this->session->userdata('tw_pro_add1');
		$this->data['tw_pro_nage']=$this->session->userdata('tw_pro_nage');
		$this->data['tw_pro_nomie_relation']=$this->session->userdata('tw_pro_nomie_relation');
		$this->data['tw_pro_nameofappoint']=$this->session->userdata('tw_pro_nameofappoint');
		$this->data['tw_pro_appoint_relation']=$this->session->userdata('tw_pro_appoint_relation');
		$this->data['tw_pro_new_policy_start']=$this->session->userdata('tw_pro_new_policy_start');
		$this->data['tw_zip']=$this->session->userdata('tw_zip');
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');

		// $soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		// $requestXml = $this->Travel_proposal_model->quoteXmlProposal($this->data);
		// echo '<pre>';
		// print_r($requestXml);
		// exit();
		

		$this->data['title']="Kindly review your Two-Wheeler proposal";
		$this->data['module'] = 'qms'; 

		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_tw_proposal_view',$this->data);
		$this->load->view('layout/footer_inner');
		

	}



	public function twUpdateProposal(){

		$this->data['tw_pro_occupation']=$this->session->userdata('tw_pro_occupation');
		$this->data['tw_pro_add2']=$this->session->userdata('tw_pro_add2');
		$this->data['tw_pro_add1']=$this->session->userdata('tw_pro_add1');
		
		$this->data['tw_pro_material']=$this->session->userdata('tw_pro_material');
		$this->data['tw_pro_gender']=$this->session->userdata('tw_pro_gender');
		$this->data['tw_clientType']=$this->session->userdata('tw_clientType');
		$this->data['tw_claimtwo']=$this->session->userdata('tw_claimtwo');
		$this->data['tw_year']=$this->session->userdata('tw_yearTw');
		$this->data['tw_amount']=$this->session->userdata('tw_amount');
		$this->data['tw_reg_city']=$this->session->userdata('tw_reg_city');
		$this->data['carState']=$this->session->userdata('carState');
		
		$this->data['tw_pro_regis_date']=$this->session->userdata('tw_pro_regis_date');
		$this->data['tw_pro_engine_num']=$this->session->userdata('tw_pro_engine_num');
		$this->data['tw_pro_chasis_num']=$this->session->userdata('tw_pro_chasis_num');
		$this->data['tw_registration']=$this->session->userdata('tw_registration');
		$this->data['tw_pro_regis_date']=$this->session->userdata('tw_pro_regis_date');
		$this->data['tw_first_name']=$this->session->userdata('tw_first_name');
		$this->data['tw_last_name']=$this->session->userdata('tw_last_name');
		$this->data['tw_dob']=$this->session->userdata('tw_dob');
		
		$this->data['tw_city']=$this->session->userdata('tw_twocity');
		$this->data['tw_state']=$this->session->userdata('twoState');
		$this->data['tw_email']=$this->session->userdata('tw_emailtwo');
		$this->data['tw_mobile']=$this->session->userdata('tw_mobiletwo');
		$this->data['tw_pro_emergency']=$this->session->userdata('tw_pro_emergency');
		

		$this->data['tw_idvamount']=$this->session->userdata('tw_idvamount');
		$this->data['tw_ncbtwo']=$this->session->userdata('tw_ncbtwo');
		$this->data['car_cc']=$this->session->userdata('car_cc');
		$this->data['car_seating']=$this->session->userdata('car_seating');
		$this->data['car_fuel']=$this->session->userdata('car_fuel');
		$this->data['tw_manufacture']=$this->session->userdata('tw_manufacture');
		$this->data['tw_carvariant']=$this->session->userdata('tw_carvariant');
		
		
		$this->data['tw_pro_nname']=$this->session->userdata('tw_pro_nname');
		$this->data['tw_pro_add1']=$this->session->userdata('tw_pro_add1');
		$this->data['tw_pro_nage']=$this->session->userdata('tw_pro_nage');
		$this->data['tw_pro_nomie_relation']=$this->session->userdata('tw_pro_nomie_relation');
		$this->data['tw_pro_nameofappoint']=$this->session->userdata('tw_pro_nameofappoint');
		$this->data['tw_pro_appoint_relation']=$this->session->userdata('tw_pro_appoint_relation');
		$this->data['tw_pro_new_policy_start']=$this->session->userdata('tw_pro_new_policy_start');
		$this->data['tw_zip']=$this->session->userdata('tw_zip');

		$this->data['orderNo']=$this->session->userdata('orderNo');
		$this->data['quoteNo']=$this->session->userdata('quoteNo');			

		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Tw_proposal_model->quoteXmlProposalTW($this->data);
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
	

		$this->data['title']="Proposal Two Wheeler";
		$this->data['module'] = 'qms'; 

		$this->data['orderNo']=$this->session->userdata('orderNo');
		$this->data['quoteNo']=$this->session->userdata('quoteNo');	
		$this->data['emailId']=$this->session->userdata('tw_emailtwo');	
		$this->data['custName']=$this->session->userdata('tw_first_name');	

		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_proposal_result_tw',$this->data);
		$this->load->view('layout/footer_inner');
	
	}


		public function sess_clrtw() {

			
         $array_items = array('tw_first_name',
         					  'tw_last_name',
         					  'tw_dob',
         					  'tw_twocity',
         					  'twoState',
         					  'tw_emailtwo',
         					  'tw_mobiletwo',
         					  'tw_registration',
         					  'tw_pro_gender',
         					  'tw_pro_material',
         					  'tw_pro_engine_num',
         					  'tw_pro_chasis_num',
         					  'tw_pro_nname',
         					  'tw_pro_nage',
         					  'car_pro_nage',
         					  'tw_pro_nomie_relation',
         					  'tw_pro_nameofappoint',
         					  'tw_pro_appoint_relation',
         					  'tw_pro_add1',
         					  'tw_pro_new_policy_start',
         					  'tw_pro_emergency',
         					  'tw_pro_occupation',
         					  'tw_pro_add2',
         					  'tw_pro_landmark',
         					  'tw_pro_gstn',
         					  'tw_pro_existing_policynum',
         					  'tw_prop_existing_insure',
         					  'tw_pro_drive_two',
         					  'tw_pro_parking',
         					  'tw_pro_existing_policy_expiry',
         					  'tw_pro_who_drive',
         					  'tw_pro_kms',
         					  'tw_pro_ydage',
         					  'tw_manufacture',
         					  'tw_carvariant',
         					  'car_seating',
         					  'car_fuel',
         					  'car_cc',
         					  'tw_ncbtwo',
         					  'tw_idvamount',
         					  
         					 
         					  'Premium',
         					  'ServiceTax',
         					  'PremiumPayable',
         					  'orderNo',
         					  'quoteNo',
     );

      	$this->session->unset_userdata($array_items);
      	redirect('create-quote-two-wheeler', 'refresh');

	 
       
	}



}