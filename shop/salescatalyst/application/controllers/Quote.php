<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Car_proposal_model');
		
	}


	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'leads'; 
			
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('leads/lead_index');
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}
	}


	public function createQuote(){

		if ($this->session->userdata('logged_in') == TRUE) {

	        $str = file_get_contents(base_url().'/assets/json/model-make.json');
            $dataArraycar = json_decode($str, true);
			$dataArraycar = $this->Common_model->array_sort($dataArraycar, 'MANUFACTURE', SORT_ASC);

	         $filtercar = array("FPV");
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
	        $brandVariantscar    = array();
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


	            $carbrandVariants[$carmanufacture][] = $carvariant;
	            $carmbrandVariants[$carmanufacture][] = $carmodel.'-'.$carvariant;
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

			$this->data['city'] = $this->Common_model->getCityList();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();
			

// echo '<pre>';
// print_r( $this->data['branchLocation']);
// exit();

			$this->data['module'] = 'leads'; 
			$this->data['sub_module'] = 'Car'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/page_header_inner',$this->data);
			$this->load->view('quote/quote_create',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}

	}
	

	public function calculatePremium(){
		
   
		$this->data['carCc'] = $this->input->get_post('car_cc');
		$this->data['carFuel'] = $this->input->get_post('car_fuel');
		$this->data['carSeating'] = $this->input->get_post('car_seating');
		
		$this->data['manufacturercar'] = $this->input->get_post('manufacturercar');
		$this->data['carvariant'] = $this->input->get_post('carvariant');
		$this->data['idvamount'] = $this->input->get_post('idvamount');
		$this->data['caramount'] = $this->input->get_post('caramount');
		$this->data['carregistrationnumber'] = $this->input->get_post('carregistrationnumber');
		$this->data['foocar'] = $this->input->get_post('foocar');
		$this->data['emailcar'] = $this->input->get_post('emailcar');
		$this->data['mobilecar'] = $this->input->get_post('mobilecar');
		$this->data['policytypecar'] = $this->input->get_post('policytypecar');
		$this->data['expiringcar'] = $this->input->get_post('expiringcar');
		$this->data['ncbcar'] = $this->input->get_post('ncbcar');
		$this->data['dateExpirycar'] = $this->input->get_post('dateExpirycar');
		$this->data['carState'] = $this->input->get_post('carState');
		$this->data['mx_DOB'] = $this->input->get_post('mx_DOB');
		$this->data['car_FirstName'] = $this->input->get_post('FirstName');
		$this->data['mx_state'] = $this->input->get_post('mx_State');
		$this->data['mx_city'] = $this->input->get_post('mx_City');
		$this->data['carCityReg'] = $this->input->get_post('citycar');
	

		$apiData = array(
		
			'manufacturercar' => $this->input->get_post('manufacturercar'),
			'carvariant' => $this->input->get_post('carvariant'),
			'idvamount' => $this->input->get_post('idvamount'),
			'caramount' => $this->input->get_post('caramount'),
			'carregistrationnumber' => $this->input->get_post('carregistrationnumber'),
			'foocar' => $this->input->get_post('foocar'),
			'citycar' => $this->input->get_post('citycar'),
			'emailcar' => $this->input->get_post('emailcar'),
			'mobilecar' => $this->input->get_post('mobilecar'),
			'policytypecar' => $this->input->get_post('policytypecar'),
			'expiringcar' => $this->input->get_post('expiringcar'),
			'ncbcar' => $this->input->get_post('ncbcar'),
			'dateExpirycar' => $this->input->get_post('dateExpirycar'),
			'mx_DOB' => $this->input->get_post('mx_DOB'),
			'carState' => $this->input->get_post('carState'),

			);
			$this->session->set_userdata($apiData);		

		
		$userdata = array(
			
			'mx_Category' => $this->input->get_post('mx_Category'),
			'mx_Line_of_Business' => $this->input->get_post('mx_Line_of_Business'),
			'mx_HDFC_Branch_Location' => $this->input->get_post('mx_HDFC_Branch_Location'),
			'mx_HDFC_Ergo_Location' => $this->input->get_post('mx_HDFC_Ergo_Location'),
			'mx_Priority' => $this->input->get_post('mx_Priority'),
			'mx_Target_Date' => $this->input->get_post('mx_Target_Date'),
			'mx_TSE_BDR_Code' => $this->input->get_post('mx_TSE_BDR_Code'),
			'mx_TL_Code' => $this->input->get_post('mx_TL_Code'),
			'mx_SM_Code' => $this->input->get_post('mx_SM_Code'),
			'mx_Bank_Verifier_ID' => $this->input->get_post('mx_Bank_Verifier_ID'),
			'mx_Payment_Type' => $this->input->get_post('mx_Payment_Type'),
			'mx_Sub_Channel' => $this->input->get_post('mx_Sub_Channel'),
			'mx_HDFC_Card_Relationship_No' => $this->input->get_post('mx_HDFC_Card_Relationship_No'),
			'mx_HDFC_Card_Last_4_digits' => $this->input->get_post('mx_HDFC_Card_Last_4_digits'),
			'FirstName' => $this->input->get_post('FirstName'),
			'LastName' => $this->input->get_post('LastName'),
			'mx_DOB' => $this->input->get_post('mx_DOB'),
			'mx_Customer_Gender' => $this->input->get_post('mx_Customer_Gender'),
			'mx_Case_id' => $this->input->get_post('mx_Case_id'),
			'mx_PAN_Card' => $this->input->get_post('mx_PAN_Card'),
			'mx_Street1' => $this->input->get_post('mx_Street1'),
			'mx_Street2' => $this->input->get_post('mx_Street2'),
			'mx_Area' => $this->input->get_post('mx_Area'),
			'mx_City' => $this->input->get_post('mx_City'),
			'mx_State' => $this->input->get_post('mx_State'),
			'mx_Zip' => $this->input->get_post('mx_Zip'),
			'Notes' => $this->input->get_post('Notes'),
			'EmailAddress' => trim($this->input->get_post('emailcar')),
			'mobilecar' => $this->input->get_post('mobilecar'),
			'caroptionsRadios' => $this->input->get_post('caroptionsRadios'),
			'carState' => $this->input->get_post('carState'),

		);
		$this->session->set_userdata($userdata);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		//$soapUrl = "https://www.uat.bhartiaxaonline.co.in/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";

		$requestXml = $this->Common_model->generateQuoteXml($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);
// echo '<pre>';
// print_r($requestXml);
//  exit();
		$apiData = array(
			'api_request' => $requestXml,
			'api_response' => $output,
		);		
		$this->session->set_userdata($apiData);
		
		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
		

		//if(count($output) > 1) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}



	public function carPremium(){

		if ($this->session->userdata('logged_in') == TRUE) {
			$api_request = $this->session->userdata('api_request');
			$api_response = $this->session->userdata('api_response');

		
			$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];


			$premiumArray = $responseExtArray['PremiumSet']['Cover'];

			$this->data['selDeduct'] = '0';

			if($this->session->userdata('nonElectricalValue')) { 
			    $this->data['nonElectricalValue'] = $this->session->userdata('nonElectricalValue'); 
			} else { 
			    $this->data['nonElectricalValue'] = 0; 
			}
			if($this->session->userdata('nonElectricalCheck')){
			    $this->data['nonElectricalCheck'] = $this->session->userdata('nonElectricalCheck'); 
			} else { 
			    $this->data['nonElectricalCheck'] = 0; 
			}    
			if($this->session->userdata('electricalValue')){
			    $this->data['electricalValue'] = $this->session->userdata('electricalValue');
			} else {
			    $this->data['electricalValue'] = 0;
			}

			if($this->session->userdata('electricalCheck')){
			    $this->data['electricalCheck'] = $this->session->userdata('electricalCheck');
			} else{
			    $this->data['electricalCheck'] = 'N';
			}

			if($this->session->userdata('antiTheft')){
			    $this->data['antiTheft'] = $this->session->userdata('antiTheft');  
			} else {
			    $this->data['antiTheft'] = 0;
			}
			if($this->session->userdata('lpgCngKitValue')){
			    $this->data['lpgCngKitValue'] =  $this->session->userdata('lpgCngKitValue');
			} else {
			    $this->data['lpgCngKitValue'] = 0;
			}

			if($this->session->userdata('driverLibillity')) {
			    $this->data['driverLibillity'] =  $this->session->userdata('driverLibillity');
			} else {
			    $this->data['driverLibillity'] =  false;
			}

			//temporary variables
			$this->data['PAFDeductPremium'] = 0;
			$this->data['ODDeductiblePremiumValue'] = 0;


			$this->data['ODDeductiblePremium'] = $premiumArray[0]['ExtraDetails']['BreakUp']['ODDeductible'];
			$this->data['ODDeductiblePremiumValue'] = $premiumArray[0]['ExtraDetails']['Deductible'];

			$this->data['selDeduct'] = $premiumArray[0]['ExtraDetails']['Deductible'];
			$this->data['PAFDeductPremium']= $premiumArray[3]['Premium'];
			$this->data['selectPAFDeduct'] = $premiumArray[3]['ExtraDetails']['PAFamilySI'];
			$this->data['NonElecAccessoryPremium'] = $premiumArray[0]['ExtraDetails']['BreakUp']['NonElecAccessory'];
			$this->data['elecAccessoryPremium'] = $premiumArray[0]['ExtraDetails']['BreakUp']['Accessory'];
			$this->data['antiTheftPremium'] = round($premiumArray[0]['ExtraDetails']['BreakUp']['AntiTheft']);
			$this->data['lpgCngKitPremium'] = round($premiumArray[0]['ExtraDetails']['BreakUp']['BiFuel']);
			$this->data['LLDriverPremium'] = round($premiumArray[1]['ExtraDetails']['BreakUp']['LLDriver']);

			$this->data['OrderNo'] = $responseExtArray['OrderNo'];
			$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];
			$this->data['taxValue'] = $responseExtArray['PremiumSet']['ServiceTax'];


			$apiData = array(
				'OrderNo' => $responseExtArray['OrderNo'],
				'QuoteNo' => $responseExtArray['QuoteNo'],
			);		
			$this->session->set_userdata($apiData);
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

				'Personal_Accident'=>'The Personal Accident Cover for Unnamed Passengers provides compensation towards injury sustained in an accident while mounting, dismounting or traveling in the insured car to any passengers other than the insured and/or driver.The cover provides for Rs 1 lakhs compensation upon death and permanent total disablement (like loss of two limbs, loss of sight in both eyes, etc.) and 50% compensation upon partial total disablement (like loss of one limb, loss of sight in one eye etc.)',
				
				'LPG_CNG'=>'If you have an LPG/CNG kit separately fitted in your car then-.Kindly input the value of the LPG/CNG kit as per the billing invoice and click Re Calculate.Kindly ensure that LPG/CNG is endorsed on your RC copy before you proceedPlease ensure that the LPG/CNG kit was fitted separately by you and was not in-built by the car manufacturer. If you have any doubts, please call us at 080-49123900 or email us at motor@bharti-axagi.co.in',

				'ARAI_Approved'=>'If you have an ARAI Approved Anti-Theft device fitted separately in your car, then you are eligible for an Anti-Theft discount of 2.5% on the OD component subject to a maximum of Rs. 500. Kindly ensure that the device was fitted separately by you and was not in-built by the car manufacturer.',
				
				'Electrical_Accessories'=>'If you have electrical accessories like stereo separately fitted in your car then kindly input the value of the electrical accessories as per the billing invoice and click Re CalculatePlease ensure that electrical accessories were fitted separately by you and were not in-built by the car manufacturer. If you have any doubts, please call us at 080-49123900 or email us atmotor@bharti-axagi.co.in',
				
				'Non_Electrical'=>'Non-Electrical',
				
			);
			$this->data['helpArray'] = $helpArray;

			$this->data['title']="Premium Response Car";
			$this->data['module'] = 'leads';
			
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('quote/car_premium',$this->data);
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}	

	}



	public function calculatePremiumRepeat(){

		$this->data['manufacturercar'] = $this->session->userdata('manufacturercar');
		$this->data['carvariant'] = $this->session->userdata('carvariant');
		$this->data['idvamount']  = $this->session->userdata('idvamount');
		$this->data['caramount']  = $this->session->userdata('caramount');
		$this->data['carregistrationnumber'] = $this->session->userdata('carregistrationnumber');
		$this->data['foocar'] = $this->session->userdata('foocar');
		$this->data['citycar'] = $this->session->userdata('mx_City');
		$this->data['emailcar'] = $this->session->userdata('emailcar');
		$this->data['mobilecar'] = $this->session->userdata('mobilecar');
		$this->data['policytypecar'] = $this->session->userdata('policytypecar');
		$this->data['ncbcar'] = $this->session->userdata('ncbcar');
		$this->data['age'] = $this->session->userdata('age');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['password'] = $this->session->userdata('password');
		$this->data['expiringcar'] = $this->session->userdata('expiringcar');
		$this->data['vModal'] = $this->session->userdata('vModal');
		$this->data['vVariant'] = $this->session->userdata('vVariant');
		$this->data['OrderNo'] = $this->session->userdata('OrderNo');
		$this->data['QuoteNo'] = $this->session->userdata('QuoteNo');
		$this->data['carState'] = $this->session->userdata('carState');
		$this->data['dateExpirycar'] = $this->session->userdata('dateExpirycar');
		$this->data['carCityReg'] = $this->session->userdata('citycar');
		$this->data['car_city'] = $this->session->userdata('mx_City');
		$this->data['mx_state'] = $this->session->userdata('mx_State');
		$this->data['mx_DOB'] =$this->session->userdata('mx_DOB');
		$this->data['car_cityofreg'] = $this->input->get_post('car_cityofreg');



		$this->data['voluntaryDeductible'] = $this->input->get_post('voluntaryDeductible');
		$this->data['accidentFamilyCover'] = $this->input->get_post('accidentFamilyCover');
		$this->data['nonElectricalValue'] = $this->input->get_post('nonElectricalValue');
		$this->data['nonElectricalCheck'] = $this->input->get_post('nonElectricalCheck');
		$this->data['electricalValue'] = $this->input->get_post('electricalValue');
		$this->data['electricalCheck'] = $this->input->get_post('electricalCheck');
		$this->data['antiTheft'] = $this->input->get_post('antiTheft');
		$this->data['lpgCngKit'] = $this->input->get_post('lpgCngKit');
		$this->data['lpgCngKitValue'] = $this->input->get_post('lpgCngKitValue');
		$this->data['lpgCngKitType'] = $this->input->get_post('lpgCngKitType');
		$this->data['driverLibillity'] = $this->input->get_post('driverLibillity');
		$this->data['ProspectId'] = $this->input->get_post('ProspectId');

		$_SESSION['nonElectricalValue'] = $this->input->get_post('nonElectricalValue');
		$_SESSION['nonElectricalCheck'] = $this->input->get_post('nonElectricalCheck');	
		$_SESSION['electricalValue'] = $this->input->get_post('electricalValue');
		$_SESSION['electricalCheck'] = $this->input->get_post('electricalCheck');	
		$_SESSION['antiTheft'] =  $this->input->get_post('antiTheft');	
		$_SESSION['lpgCngKitValue'] = $this->input->get_post('lpgCngKitValue');	
		$_SESSION['driverLibillity'] = $this->input->get_post('driverLibillity');
		$_SESSION['ProspectId'] = $this->input->get_post('ProspectId');

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com"; 
		$requestXml = $this->Common_model->generateQuoteXmlRepeat($this->data);
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

 print_r($requestXml);
 exit();		

		$apiData = array(
			'api_request' => $requestXml,
			'api_response' => $output,
		);		
		$this->session->set_userdata($apiData);





		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
		//if(count($output) > 1) {
			echo 'success';
		} else {
			echo 'failed';
		}

	}



	public function quoteView() {

		$quoteIdString = $this->uri->segment(2);
		$quoteId = base64_decode($quoteIdString);

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com"; 


		$requestXml = '<SOAP:Envelope xmlns:SOAP="http://schemas.xmlsoap.org/soap/envelope/">
			  <SOAP:Body>
			    <RetrieveQuoteByQuoteNo xmlns="http://schemas.cordys.com/bagi/b2c/general/1.0" preserveSpace="no" qAccess="0" qValues="">
			      <quoteNo>'.$quoteId.'</quoteNo>
			    </RetrieveQuoteByQuoteNo>
			  </SOAP:Body>
			</SOAP:Envelope>';

		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);


		$outputResponse = $output['SOAP:Body']['RetrieveQuoteByQuoteNoResponse']['tuple']['old']['retrieveQuoteByQuoteNo']['retrieveQuoteByQuoteNo'];
		$vechicleArray = $outputResponse['Session']['Vehicle'];
		$this->data['vechicleModal'] = $vechicleArray['Make'].' - '.$vechicleArray['Model'];
		$this->data['cityOfRegistration'] = $outputResponse['Session']['Client']['CityOfResidence'];
		$this->data['dateOfManufacture'] = $vechicleArray['DateOfManufacture'];
		$this->data['IDVValue'] = $vechicleArray['IDV'];
		$quoteArray = $outputResponse['Session']['Quote'];
		$this->data['policyExpiryDate'] = $quoteArray['ExistingPolicy']['EndDate'];
		$this->data['NCBExpiry'] = $quoteArray['ExistingPolicy']['NCB'];
		$this->data['policyExpiry'] = $quoteArray['ExistingPolicy']['Claims'];
		$this->data['premiumArray'] = $quoteArray['Premium'];

		$taxValue = 0;
		$totalPremium  = 0;	
		$prDescArray = array();
		foreach ($this->data['premiumArray']['Cover'] as $key => $value ){
		    if(isset($value['ExtraDetails']['BreakUp']))
		    $this->data['prDescArray'][$key] = $value['Name'];    
		}
		$this->data['prAmt'] = round($this->data['premiumArray']['PremiumAmount']);
		$this->data['taxValue'] = round($this->data['premiumArray']['ServiceTax']);
		$this->data['totalPremium'] = $this->data['prAmt']+$this->data['taxValue'];

		$this->data['ODDeductiblePremium'] = 0;
		$this->data['selDeduct'] = 'NO';
		$this->data['LLDriverPremium'] = 0; 
		$this->data['driverLibillity'] = 'NO';
		$this->data['PAFDeductPremium'] = 0;
		$this->data['selectPAFDeduct'] = 'NO';
		$this->data['lpgCngKitPremium']  = 0;
		$this->data['lpgCngKitValue'] = 'NO';
		$this->data['antiTheftPremium']  = 0;
		$this->data['antiTheft'] = 'NO';
		$this->data['elecAccessoryPremium'] = 0;
		$this->data['electricalValue'] = 0; 
		$this->data['electricalCheck'] = 'NO';
		$this->data['NonElecAccessoryPremium'] = 0;
		$this->data['nonElectricalCheck'] = 'NO';


		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner');
		$this->load->view('quote/quote_view',$this->data);
		$this->load->view('layout/footer_inner');

	}



	/************************************ QMS starts related codes started here *******************************/


	public function qmsCreateQuote(){

		if ($this->session->userdata('logged_in') == TRUE) {

	        $str = file_get_contents(base_url().'/assets/json/model-make.json');
            $dataArraycar = json_decode($str, true);
			$dataArraycar = $this->Common_model->array_sort($dataArraycar, 'MANUFACTURE', SORT_ASC);

	         $filtercar = array("FPV");
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
	        $brandVariantscar    = array();
	        foreach($dataArraycar as $eachDataCar){
	            $carmanufacture = $eachDataCar['MANUFACTURE'] ? $eachDataCar['MANUFACTURE'] : '';
	            $carvariant = $eachDataCar['VARIANT'] ? $eachDataCar['VARIANT'] : '';
	            $carmodel = $eachDataCar['MODEL'] ? $eachDataCar['MODEL'] : '';
	            $carEX_SHOWROOM_PRICE = $eachDataCar['EX_SHOWROOM_PRICE'] ? $eachDataCar['EX_SHOWROOM_PRICE'] : '';
	           
	            $carhashKey = base64_encode($carmanufacture.$carvariant);
	            $carmhashKey = base64_encode($carmodel.'-'.$carvariant);
	            $carhashBrandCategoriesed[$carhashKey] = $eachDataCar;
	            $carmhashBrandCategoriesed[$carmhashKey] = $carEX_SHOWROOM_PRICE;
				
 				$carCC = $eachDataCar['CC'] ? $eachDataCar['CC'] : '';
				$carCCCategoriesed[$carmhashKey] = $carCC;
 				$carFUEL = $eachDataCar['FUEL'] ? $eachDataCar['FUEL'] : '';
				$carFUELCategoriesed[$carmhashKey] = $carFUEL;

 				$carSEATING = $eachDataCar['SEATING_CAPACITY'] ? $eachDataCar['SEATING_CAPACITY'] : '';
				$carSEATINGCategoriesed[$carmhashKey] = $carSEATING;


	            $carbrandVariants[$carmanufacture][] = $carvariant;
	            $carmbrandVariants[$carmanufacture][] = $carmodel.'-'.$carvariant;
	        }

	     	// echo '<pre>';
	     	// print_r($carCCCategoriesed);
	     	// exit();

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

			$this->data['city'] = $this->Common_model->getCityList();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();
			


			$this->data['module'] = 'qms'; 
			$this->data['sub_module'] = 'Car'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/qms_page_header_inner',$this->data);
			$this->load->view('qms_quote/qms_quote_create_car',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}

	}







	public function qmsCalculatePremium(){
		



		$this->data['manufacturercar'] = $this->input->get_post('car_manufacturer');
		$this->data['carvariant'] = $this->input->get_post('car_variant');
		$this->data['idvamount'] = $this->input->get_post('car_idv_amount');
		$this->data['caramount'] = $this->input->get_post('car_amount');
		$this->data['carregistrationnumber'] = $this->input->get_post('car_regno');
		$this->data['foocar'] = $this->input->get_post('car_yearofmanufacture');
		$this->data['mx_city'] = $this->input->get_post('car_city');
		$this->data['emailcar'] = $this->input->get_post('car_email');
		$this->data['mobilecar'] = $this->input->get_post('car_mobile');
		$this->data['policytypecar'] = $this->input->get_post('car_policy_type');
		$this->data['expiringcar'] = $this->input->get_post('car_expiring_policy');
		$this->data['ncbcar'] = $this->input->get_post('car_ncb_percentage');
		$this->data['dateExpirycar'] = $this->input->get_post('car_policy_expire');
		$this->data['mx_state'] = $this->input->get_post('mx_state');
		$this->data['carCityReg'] = $this->input->get_post('car_cityofreg');
		$this->data['mx_DOB'] = $this->input->get_post('mx_DOB');
		$this->data['carState'] = $this->input->get_post('carState');

		$this->data['carCc'] = $this->input->get_post('car_cc');
		$this->data['carFuel'] = $this->input->get_post('car_fuel');
		$this->data['carSeating'] = $this->input->get_post('car_seating');


		$this->data['voluntaryDeductible'] = $this->input->get_post('voluntaryDeductible');
		$this->data['accidentFamilyCover'] = $this->input->get_post('accidentFamilyCover');
		$this->data['nonElectricalValue'] = $this->input->get_post('nonElectricalValue');
		$this->data['nonElectricalCheck'] = $this->input->get_post('nonElectricalCheck');
		$this->data['electricalValue'] = $this->input->get_post('electricalValue');
		$this->data['electricalCheck'] = $this->input->get_post('electricalCheck');
		$this->data['antiTheft'] = $this->input->get_post('antiTheft');
		$this->data['lpgCngKit'] = $this->input->get_post('lpgCngKit');
		$this->data['lpgCngKitValue'] = $this->input->get_post('lpgCngKitValue');
		$this->data['lpgCngKitType'] = $this->input->get_post('lpgCngKitType');
		$this->data['driverLibillity'] = $this->input->get_post('driverLibillity');
		$this->data['ProspectId'] = $this->input->get_post('ProspectId');

		$_SESSION['nonElectricalValue'] = $this->input->get_post('nonElectricalValue');
		$_SESSION['nonElectricalCheck'] = $this->input->get_post('nonElectricalCheck');	
		$_SESSION['electricalValue'] = $this->input->get_post('electricalValue');
		$_SESSION['electricalCheck'] = $this->input->get_post('electricalCheck');	
		$_SESSION['antiTheft'] =  $this->input->get_post('antiTheft');	
		$_SESSION['lpgCngKitValue'] = $this->input->get_post('lpgCngKitValue');	
		$_SESSION['driverLibillity'] = $this->input->get_post('driverLibillity');
		$_SESSION['ProspectId'] = $this->input->get_post('ProspectId');



		$apiData = array(
			'car_firstname'=> $this->input->get_post('car_firstname'),
			'car_lastname'=> $this->input->get_post('car_lastname'),
			'car_dob'=> $this->input->get_post('car_dob'),
			'manufacturercar' => $this->input->get_post('car_manufacturer'),
			'carvariant' => $this->input->get_post('car_variant'),
			'idvamount' => $this->input->get_post('car_idv_amount'),
			'caramount' => $this->input->get_post('car_amount'),
			'carregistrationnumber' => $this->input->get_post('car_regno'),
			'foocar' => $this->input->get_post('car_yearofmanufacture'),

			'mx_city' => $this->input->get_post('car_city'),
			'emailcar' => $this->input->get_post('car_email'),
			'mobilecar' => $this->input->get_post('car_mobile'),
			'policytypecar' => $this->input->get_post('car_policy_type'),
			'expiringcar' => $this->input->get_post('car_expiring_policy'),
			'ncbcar' => $this->input->get_post('car_ncb_percentage'),
			'dateExpirycar' => $this->input->get_post('car_policy_expire'),
			'mx_state' => $this->input->get_post('mx_state'),
			'carCc' => $this->input->get_post('car_cc'),
			'carFuel' => $this->input->get_post('car_fuel'),
			'carSeating' => $this->input->get_post('car_seating'),
			'carCityReg' => $this->input->get_post('car_cityofreg'),
			'carState' => $this->input->get_post('carState'),
		);		
		$this->session->set_userdata($apiData);
		

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		//echo $soapUrl; 
		$requestXml = $this->Common_model->generateQuoteXml($this->data);
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);
// print_r($requestXml);
// exit();

		$apiData = array(
			'api_request' => $requestXml,
			'api_response' => $output,
		);		
		$this->session->set_userdata($apiData);
		
		$responseArray =  $output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body'];



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


		// if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
		// 	echo 'success';
		// } else {
		// 	echo 'failed';
		// }
	}



	public function qmsCarPremium(){
	



		if ($this->session->userdata('logged_in') == TRUE) {
			$api_request = $this->session->userdata('api_request');
			$api_response = $this->session->userdata('api_response');

		
			$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];


			$premiumArray = $responseExtArray['PremiumSet']['Cover'];

			$this->data['selDeduct'] = '0';

			if($this->session->userdata('nonElectricalValue')) { 
			    $this->data['nonElectricalValue'] = $this->session->userdata('nonElectricalValue'); 
			} else { 
			    $this->data['nonElectricalValue'] = 0; 
			}
			if($this->session->userdata('nonElectricalCheck')){
			    $this->data['nonElectricalCheck'] = $this->session->userdata('nonElectricalCheck'); 
			} else { 
			    $this->data['nonElectricalCheck'] = 0; 
			}    
			if($this->session->userdata('electricalValue')){
			    $this->data['electricalValue'] = $this->session->userdata('electricalValue');
			} else {
			    $this->data['electricalValue'] = 0;
			}

			if($this->session->userdata('electricalCheck')){
			    $this->data['electricalCheck'] = $this->session->userdata('electricalCheck');
			} else{
			    $this->data['electricalCheck'] = 'N';
			}

			if($this->session->userdata('antiTheft')){
			    $this->data['antiTheft'] = $this->session->userdata('antiTheft');  
			} else {
			    $this->data['antiTheft'] = 0;
			}
			if($this->session->userdata('lpgCngKitValue')){
			    $this->data['lpgCngKitValue'] =  $this->session->userdata('lpgCngKitValue');
			} else {
			    $this->data['lpgCngKitValue'] = 0;
			}

			if($this->session->userdata('driverLibillity')) {
			    $this->data['driverLibillity'] =  $this->session->userdata('driverLibillity');
			} else {
			    $this->data['driverLibillity'] =  false;
			}

			//temporary variables
			$this->data['PAFDeductPremium'] = 0;
			$this->data['ODDeductiblePremiumValue'] = 0;


			$this->data['ODDeductiblePremium'] = $premiumArray[0]['ExtraDetails']['BreakUp']['ODDeductible'];
			$this->data['ODDeductiblePremiumValue'] = $premiumArray[0]['ExtraDetails']['Deductible'];

			$this->data['selDeduct'] = $premiumArray[0]['ExtraDetails']['Deductible'];
			$this->data['PAFDeductPremium']= $premiumArray[3]['Premium'];
			$this->data['selectPAFDeduct'] = $premiumArray[3]['ExtraDetails']['PAFamilySI'];
			$this->data['NonElecAccessoryPremium'] = $premiumArray[0]['ExtraDetails']['BreakUp']['NonElecAccessory'];
			$this->data['elecAccessoryPremium'] = $premiumArray[0]['ExtraDetails']['BreakUp']['Accessory'];
			$this->data['antiTheftPremium'] = round($premiumArray[0]['ExtraDetails']['BreakUp']['AntiTheft']);
			$this->data['lpgCngKitPremium'] = round($premiumArray[0]['ExtraDetails']['BreakUp']['BiFuel']);
			$this->data['LLDriverPremium'] = round($premiumArray[1]['ExtraDetails']['BreakUp']['LLDriver']);

			$this->data['OrderNo'] = $responseExtArray['OrderNo'];
			$this->data['QuoteNo'] = $responseExtArray['QuoteNo'];
			$this->data['taxValue'] = $responseExtArray['PremiumSet']['ServiceTax'];


			$apiData = array(
				'OrderNo' => $responseExtArray['OrderNo'],
				'QuoteNo' => $responseExtArray['QuoteNo'],
			);		
			$this->session->set_userdata($apiData);
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

				'Personal_Accident'=>'The Personal Accident Cover for Unnamed Passengers provides compensation towards injury sustained in an accident while mounting, dismounting or traveling in the insured car to any passengers other than the insured and/or driver.The cover provides for Rs 1 lakhs compensation upon death and permanent total disablement (like loss of two limbs, loss of sight in both eyes, etc.) and 50% compensation upon partial total disablement (like loss of one limb, loss of sight in one eye etc.)',
				
				'LPG_CNG'=>'If you have an LPG/CNG kit separately fitted in your car then-.Kindly input the value of the LPG/CNG kit as per the billing invoice and click Re Calculate.Kindly ensure that LPG/CNG is endorsed on your RC copy before you proceedPlease ensure that the LPG/CNG kit was fitted separately by you and was not in-built by the car manufacturer. If you have any doubts, please call us at 080-49123900 or email us at motor@bharti-axagi.co.in',

				'ARAI_Approved'=>'If you have an ARAI Approved Anti-Theft device fitted separately in your car, then you are eligible for an Anti-Theft discount of 2.5% on the OD component subject to a maximum of Rs. 500. Kindly ensure that the device was fitted separately by you and was not in-built by the car manufacturer.',
				
				'Electrical_Accessories'=>'If you have electrical accessories like stereo separately fitted in your car then kindly input the value of the electrical accessories as per the billing invoice and click Re CalculatePlease ensure that electrical accessories were fitted separately by you and were not in-built by the car manufacturer. If you have any doubts, please call us at 080-49123900 or email us atmotor@bharti-axagi.co.in',
				
				'Non_Electrical'=>'Non-Electrical',
				
			);

			$this->data['helpArray'] = $helpArray;

			$this->data['title']="Premium Response Car";
			$this->data['module'] = 'qms';


			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('qms_quote/qms_premium_car',$this->data);
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}	



	}

	public function qmscalculatePremiumRepeat(){
	
		$this->data['manufacturercar'] = $this->session->userdata('manufacturercar');
		$this->data['carvariant'] = $this->session->userdata('carvariant');
		$this->data['idvamount']  = $this->session->userdata('idvamount');
		$this->data['caramount']  = $this->session->userdata('caramount');
		$this->data['carregistrationnumber'] = $this->session->userdata('carregistrationnumber');
		$this->data['foocar'] = $this->session->userdata('foocar');
		$this->data['citycar'] = $this->session->userdata('mx_city');
		$this->data['emailcar'] = $this->session->userdata('emailcar');
		$this->data['mobilecar'] = $this->session->userdata('mobilecar');
		$this->data['policytypecar'] = $this->session->userdata('policytypecar');
		$this->data['ncbcar'] = $this->session->userdata('ncbcar');
		$this->data['age'] = $this->session->userdata('age');
		$this->data['username'] = $this->session->userdata('username');
		$this->data['password'] = $this->session->userdata('password');
		$this->data['expiringcar'] = $this->session->userdata('expiringcar');
		$this->data['vModal'] = $this->session->userdata('vModal');
		$this->data['vVariant'] = $this->session->userdata('vVariant');
		$this->data['OrderNo'] = $this->session->userdata('OrderNo');
		$this->data['QuoteNo'] = $this->session->userdata('QuoteNo');
		$this->data['carState'] = $this->session->userdata('carState');
		$this->data['dateExpirycar'] = $this->session->userdata('dateExpirycar');
		$this->data['carCityReg'] = $this->session->userdata('carCityReg');
		
		$this->data['mx_state'] = $this->session->userdata('mx_state');
		$this->data['mx_DOB'] =$this->session->userdata('mx_DOB');
		$this->data['car_cityofreg'] = $this->input->get_post('car_cityofreg');



		$this->data['voluntaryDeductible'] = $this->input->get_post('voluntaryDeductible');
		$this->data['accidentFamilyCover'] = $this->input->get_post('accidentFamilyCover');
		$this->data['nonElectricalValue'] = $this->input->get_post('nonElectricalValue');
		$this->data['nonElectricalCheck'] = $this->input->get_post('nonElectricalCheck');
		$this->data['electricalValue'] = $this->input->get_post('electricalValue');
		$this->data['electricalCheck'] = $this->input->get_post('electricalCheck');
		$this->data['antiTheft'] = $this->input->get_post('antiTheft');
		$this->data['lpgCngKit'] = $this->input->get_post('lpgCngKit');
		$this->data['lpgCngKitValue'] = $this->input->get_post('lpgCngKitValue');
		$this->data['lpgCngKitType'] = $this->input->get_post('lpgCngKitType');
		$this->data['driverLibillity'] = $this->input->get_post('driverLibillity');
		$this->data['ProspectId'] = $this->input->get_post('ProspectId');

		$_SESSION['nonElectricalValue'] = $this->input->get_post('nonElectricalValue');
		$_SESSION['nonElectricalCheck'] = $this->input->get_post('nonElectricalCheck');	
		$_SESSION['electricalValue'] = $this->input->get_post('electricalValue');
		$_SESSION['electricalCheck'] = $this->input->get_post('electricalCheck');	
		$_SESSION['antiTheft'] =  $this->input->get_post('antiTheft');	
		$_SESSION['lpgCngKitValue'] = $this->input->get_post('lpgCngKitValue');	
		$_SESSION['driverLibillity'] = $this->input->get_post('driverLibillity');
		$_SESSION['ProspectId'] = $this->input->get_post('ProspectId');

		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com"; 
		$requestXml = $this->Common_model->generateQuoteXmlRepeat($this->data);
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

// print_r($requestXml);
// exit();		

		$apiData = array(
			'api_request' => $requestXml,
			'api_response' => $output,
		);		
		$this->session->set_userdata($apiData);





		if(isset($output['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse'])) {
		//if(count($output) > 1) {
			echo 'success';
		} else {
			echo 'failed';
		}

	}




 
 	public function carProposal()
	{

		    $this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['branchLocation'] = $this->Common_model->getBranchLocation();


        $this->data['car_pro_material']=$this->session->userdata('car_pro_material');
		$this->data['car_pro_gender']=$this->session->userdata('car_pro_gender');
		$this->data['car_pro_engine_num']=$this->session->userdata('car_pro_engine_num');
		$this->data['car_pro_chasis_num']=$this->session->userdata('car_pro_chasis_num');
		$this->data['car_pro_regis_date']=$this->session->userdata('car_pro_regis_date');
		$this->data['car_pro_nname']=$this->session->userdata('car_pro_nname');
		$this->data['car_pro_nage']=$this->session->userdata('car_pro_nage');
		$this->data['car_pro_nomie_relation']=$this->session->userdata('car_pro_nomie_relation');
		$this->data['car_pro_nameofappoint']=$this->session->userdata('car_pro_nameofappoint');
		$this->data['car_pro_appoint_relation']=$this->session->userdata('car_pro_appoint_relation');
		$this->data['car_pro_add1']=$this->session->userdata('car_pro_add1');
		$this->data['car_pro_new_policy_start']=$this->session->userdata('car_pro_new_policy_start');
		$this->data['car_pro_emergency']=$this->session->userdata('car_pro_emergency');
		$this->data['car_pro_occupation']=$this->session->userdata('car_pro_occupation');
		$this->data['car_pro_add2']=$this->session->userdata('car_pro_add2');
		$this->data['car_pro_zip']=$this->session->userdata('car_pro_zip');

		$this->data['title']="Quotes - Car proposal";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_car_proposal',$this->data);
		$this->load->view('layout/footer_inner');
		
//		$this->load->view('lead_history/list_lead',$this->data);

	}


	public function getSessionValues()
 	{
    	$sessionData = array(
   		   'car_first_name' => $this->session->userdata('car_firstname'),
   		   'car_last_name' => $this->session->userdata('car_lastname'),
   		   'car_dob' => $this->session->userdata('car_dob'),
   		   'car_city' => $this->session->userdata('mx_city'),
   		   'car_state' => $this->session->userdata('mx_state'),
   		   'car_email' => $this->session->userdata('emailcar'),
   		   'car_mobile' => $this->session->userdata('mobilecar'),
   		   'car_registration' => $this->session->userdata('carregistrationnumber'),
   		   'car_pro_gender' => $this->session->userdata('car_pro_gender'),
   		   'car_pro_marital'=> $this->session->userdata('car_pro_marital'),
		    'car_pro_engine_num'=> $this->session->userdata('car_pro_engine_num'),
			'car_pro_chasis_num'=> $this->session->userdata('car_pro_chasis_num'),
			'car_pro_regis_date' => $this->session->userdata('car_pro_regis_date'),
			'car_pro_nname' => $this->session->userdata('car_pro_nname'),
			'car_pro_nage' => $this->session->userdata('car_pro_nage'),
			'car_pro_nomie_relation' => $this->session->userdata('car_pro_nomie_relation'),
			'car_pro_nameofappoint' => $this->session->userdata('car_pro_nameofappoint'),
			'car_pro_appoint_relation' => $this->session->userdata('car_pro_appoint_relation'),
			'car_pro_add1' => $this->session->userdata('car_pro_add1'),
			'car_pro_new_policy_start' => $this->session->userdata('car_pro_new_policy_start'),
			'car_pro_emergency' => $this->session->userdata('car_pro_emergency'),
			'car_pro_zip' => '643554',
			'car_pro_occupation' => $this->session->userdata('car_pro_occupation'),
			'car_pro_add2' => $this->session->userdata('car_pro_add2'),
			'car_pro_emergency' => $this->session->userdata('car_pro_emergency'),
			'car_pro_landmark' => $this->session->userdata('car_pro_landmark'),
			'car_pro_gstn' => $this->session->userdata('car_pro_gstn'),
			'car_pro_drive'=> $this->session->userdata('car_pro_drive'),
			'car_pro_parking'=> $this->session->userdata('car_pro_parking'),
			'car_pro_who_drive'=> $this->session->userdata('car_pro_who_drive'),
			'car_pro_kms'=> $this->session->userdata('car_pro_kms'),
			'car_pro_ydage'=> $this->session->userdata('car_pro_ydage'),
			'car_pro_driver'=> $this->session->userdata('car_pro_driver'),
   		  	
   		  	'car_prop_existing_insure'=> $this->session->userdata('car_prop_existing_insure'),
   		  	'car_pro_existing_policynum'=> $this->session->userdata('car_pro_existing_policynum'),
   		  	'car_pro_existing_policy_expiry'=> $this->session->userdata('car_pro_existing_policy_expiry'),
   		  	'car_pro_existing_policy_start'=>date("d-m-Y"),
  		);

    	//$this->session->userdata('car_pro_gender')
  		
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
			'car_pro_marital'=> $this->input->get_post('car_pro_marital'),
			'car_pro_gender'=> $this->input->get_post('car_pro_gender'),
			'car_pro_engine_num'=> $this->input->get_post('car_pro_engine_num'),
			'car_pro_chasis_num'=> $this->input->get_post('car_pro_chasis_num'),
			'car_pro_regis_date' => $this->input->get_post('car_pro_regis_date'),
			'car_pro_nname' => $this->input->get_post('car_pro_nname'),
			'car_pro_nage' => $this->input->get_post('car_pro_nage'),
			'car_pro_nomie_relation' => $this->input->get_post('car_pro_nomie_relation'),
			'car_pro_nameofappoint' => $this->input->get_post('car_pro_nameofappoint'),
			'car_pro_appoint_relation' => $this->input->get_post('car_pro_appoint_relation'),
			'car_pro_add1' => $this->input->get_post('car_pro_add1'),
			'car_pro_new_policy_start' => $this->input->get_post('car_pro_new_policy_start'),
			'car_pro_emergency' => $this->input->get_post('car_pro_emergency'),
			'car_pro_zip' => '643554',
			'car_pro_occupation' => $this->input->get_post('car_pro_occupation'),
			'car_pro_add2' => $this->input->get_post('car_pro_add2'),
			'car_pro_emergency' => $this->input->get_post('car_pro_emergency'),
			'car_prop_existing_insure'=> $this->input->get_post('car_prop_existing_insure'),
			'car_pro_existing_policynum'=> $this->input->get_post('car_pro_existing_policynum'),
			'car_pro_existing_policy_expiry'=> $this->input->get_post('car_pro_existing_policy_expiry'),
			'car_pro_landmark'=> $this->input->get_post('car_pro_landmark'),
			'car_pro_gstn'=> $this->input->get_post('car_pro_gstn'),
			'car_pro_drive'=> $this->input->get_post('car_pro_drive'),
			'car_pro_parking'=> $this->input->get_post('car_pro_parking'),
			'car_pro_who_drive'=> $this->input->get_post('car_pro_who_drive'),
			'car_pro_kms'=> $this->input->get_post('car_pro_kms'),
			'car_pro_ydage'=> $this->input->get_post('car_pro_ydage'),
			'car_pro_driver'=> $this->input->get_post('car_pro_driver'),
		);	
		$this->session->set_userdata($userdata);

	}

	


	public function carPayment()
	{

		$this->data['car_first_name']=$this->session->userdata('car_firstname');
		$this->data['car_last_name']=$this->session->userdata('car_lastname');
		$this->data['car_dob']=$this->session->userdata('car_dob');
		$this->data['car_city']=$this->session->userdata('mx_city');
		$this->data['car_state']=$this->session->userdata('mx_state');
		$this->data['car_email']=$this->session->userdata('emailcar');
		$this->data['car_mobile']=$this->session->userdata('mobilecar');
		$this->data['carFuel']=$this->session->userdata('carFuel');
		$this->data['carCc']=$this->session->userdata('carCc');
		$this->data['caramount']=$this->session->userdata('caramount');
		$this->data['idvamount']=$this->session->userdata('idvamount');
		$this->data['ncbcar']=$this->session->userdata('ncbcar');
		$this->data['policytypecar']=$this->session->userdata('policytypecar');
		$this->data['expiringcar']=$this->session->userdata('expiringcar');
		$this->data['carSeating']=$this->session->userdata('carSeating');
		$this->data['manufacturercar']=$this->session->userdata('manufacturercar');
		$this->data['carvariant']=$this->session->userdata('carvariant');


		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');
		    
		$this->data['car_pro_marital']=$this->session->userdata('car_pro_marital');
		$this->data['car_pro_gender']=$this->session->userdata('car_pro_gender');
		$this->data['car_pro_engine_num']=$this->session->userdata('car_pro_engine_num');
		$this->data['car_pro_chasis_num']=$this->session->userdata('car_pro_chasis_num');
		$this->data['car_pro_regis_date']=$this->session->userdata('car_pro_regis_date');
		$this->data['car_pro_nname']=$this->session->userdata('car_pro_nname');
		$this->data['car_pro_nage']=$this->session->userdata('car_pro_nage');
		$this->data['car_pro_nomie_relation']=$this->session->userdata('car_pro_nomie_relation');
		$this->data['car_pro_nameofappoint']=$this->session->userdata('car_pro_nameofappoint');
		$this->data['car_pro_appoint_relation']=$this->session->userdata('car_pro_appoint_relation');
		$this->data['car_pro_add1']=$this->session->userdata('car_pro_add1');
		$this->data['car_pro_new_policy_start']=$this->session->userdata('car_pro_new_policy_start');
		$this->data['car_pro_emergency']=$this->session->userdata('car_pro_emergency');
		$this->data['car_pro_occupation']=$this->session->userdata('car_pro_occupation');
		$this->data['car_pro_add2']=$this->session->userdata('car_pro_add2');
		$this->data['car_pro_zip']=$this->session->userdata('car_pro_zip');

		$this->data['title']="Kindly review your car proposal ";
		$this->data['module'] = 'qms'; 
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_car_proposal_view',$this->data);
		$this->load->view('layout/footer_inner');
	
	}


	public function carUpdateProposal(){

		
		$this->data['car_first_name']=$this->session->userdata('car_firstname');
		$this->data['car_last_name']=$this->session->userdata('car_lastname');
		$this->data['car_dob']=$this->session->userdata('car_dob');
		$this->data['car_reg_city']=$this->session->userdata('carCityReg');
		$this->data['car_reg_state']=$this->session->userdata('carState');
		$this->data['car_city']=$this->session->userdata('mx_city');
		$this->data['car_state']=$this->session->userdata('mx_state');
		$this->data['car_email']=$this->session->userdata('emailcar');
		$this->data['car_mobile']=$this->session->userdata('mobilecar');
		$this->data['carFuel']=$this->session->userdata('carFuel');
		$this->data['carCc']=$this->session->userdata('carCc');
		$this->data['caramount']=$this->session->userdata('caramount');
		$this->data['idvamount']=$this->session->userdata('idvamount');
		$this->data['ncbcar']=$this->session->userdata('ncbcar');
		$this->data['client_type']=$this->session->userdata('policytypecar');
		$this->data['claim_policy']=$this->session->userdata('expiringcar');
		$this->data['car_seating']=$this->session->userdata('carSeating');
		$this->data['car_menufacture']=$this->session->userdata('manufacturercar');
		$this->data['car_vary']=$this->session->userdata('carvariant');
		$this->data['car_rg_no']=$this->session->userdata('carregistrationnumber');



		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');
		    
		$this->data['car_pro_material']=$this->session->userdata('car_pro_material');
		$this->data['car_pro_gender']=$this->session->userdata('car_pro_gender');
		$this->data['car_pro_engine_num']=$this->session->userdata('car_pro_engine_num');
		$this->data['car_pro_chasis_num']=$this->session->userdata('car_pro_chasis_num');
		$this->data['car_pro_regis_date']=$this->session->userdata('car_pro_regis_date');
		$this->data['car_pro_nname']=$this->session->userdata('car_pro_nname');
		$this->data['car_pro_nage']=$this->session->userdata('car_pro_nage');
		$this->data['car_pro_nomie_relation']=$this->session->userdata('car_pro_nomie_relation');
		$this->data['car_pro_nameofappoint']=$this->session->userdata('car_pro_nameofappoint');
		$this->data['car_pro_appoint_relation']=$this->session->userdata('car_pro_appoint_relation');
		$this->data['car_pro_add1']=$this->session->userdata('car_pro_add1');
		$this->data['car_pro_new_policy_start']=$this->session->userdata('car_pro_new_policy_start');
		$this->data['car_pro_emergency']=$this->session->userdata('car_pro_emergency');
		$this->data['car_pro_occupation']=$this->session->userdata('car_pro_occupation');
		$this->data['car_pro_add2']=$this->session->userdata('car_pro_add2');
		$this->data['car_pro_zip']=$this->session->userdata('car_pro_zip');


		$this->data['OrderNo'] = $this->session->userdata('OrderNo');
		$this->data['QuoteNo'] = $this->session->userdata('QuoteNo');

		

		
		
		$this->data['Premium']=$this->session->userdata('Premium');
		$this->data['ServiceTax']=$this->session->userdata('ServiceTax');
		$this->data['PremiumPayable']=$this->session->userdata('PremiumPayable');


		$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Car_proposal_model->quoteXmlProposal($this->data);
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



	public function carproposalResult(){
	

		$this->data['title']="Proposal Result";
		$this->data['module'] = 'qms'; 

		$this->data['orderNo']=$this->session->userdata('orderNo');
		$this->data['quoteNo']=$this->session->userdata('quoteNo');	
		$this->data['emailId']=$this->session->userdata('emailcar');
		$this->data['custName']=$this->session->userdata('car_first_name');	

		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('qms_proposal/qms_car_proposal_result',$this->data);
		$this->load->view('layout/footer_inner');
	
	}




			
			public function sess_clrcar() {
		 	
         $array_items = array('car_firstname',
         					  'car_lastname',
         					  'car_dob',
         					  'mx_city',
         					  'mx_state',
         					  'emailcar',
         					  'mobilecar',
         					  'carregistrationnumber',
         					  'car_pro_gender',
         					  'car_pro_marital',
         					  'car_pro_engine_num',
         					  'car_pro_chasis_num',
         					  'car_pro_regis_date',
         					  'car_pro_nname',
         					  'car_pro_nage',
         					  'car_pro_nomie_relation',
         					  'tvl_pro_nomie_relation',
         					  'car_pro_nameofappoint',
         					  'car_pro_appoint_relation',
         					  'car_pro_add1',
         					  'car_pro_new_policy_start',
         					  'car_pro_emergency',
         					  'car_pro_occupation',
         					  'car_pro_add2',
         					  'car_pro_landmark',
         					  'car_pro_gstn',
         					  'car_pro_drive',
         					  'car_pro_parking',
         					  'car_pro_who_drive',
         					  'car_pro_kms',
         					  'car_pro_ydage',
         					  'car_pro_driver',
         					  'car_prop_existing_insure',
         					  'car_pro_existing_policynum',
         					  'car_pro_existing_policy_expiry',
         					  'car_seating',
         					  'car_fuel',
         					  'car_cc',
         					  'manufacturercar',
         					  'carvariant',
         					  'ncbcar',
         					  'idvamount',
         					 
         					  'Premium',
         					  'ServiceTax',
         					  'PremiumPayable',
         					  'orderNo',
         					  'quoteNo',
     );

      	$this->session->unset_userdata($array_items);
      	redirect('create-quote-car', 'refresh');
       
	}

	




}

?>