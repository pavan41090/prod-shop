<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leads extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
		
	}

	public function index()
	{
		$this->load->view('layout/qms_header_inner');
		$this->load->view('layout/qms_menu_inner');
		$this->load->view('quote/quote_index');
		$this->load->view('layout/footer_inner');
	}


	public function createQuote(){

        $str = file_get_contents(base_url().'/assets/json/model-make.json');
      
        $dataArraycar = json_decode($str, true);

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
        $hashBrandCategoriesedcar = [];
        $brandVariantscar    = [];
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
		$this->data['city'] = $this->Common_model->getCityList();

		$this->data['sub_module'] = 'Car'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner');
		$this->load->view('layout/page_header_inner',$this->data);
		$this->load->view('quote/quote_create',$this->data);
		$this->load->view('layout/footer_inner');

	}
	

	public function calculatePremium(){
		
		
		$this->data['manufacturercar'] = $this->input->get_post('manufacturercar');
		$this->data['carvariant'] = $this->input->get_post('carvariant');
		$this->data['idvamount'] = $this->input->get_post('idvamount');
		$this->data['caramount'] = $this->input->get_post('caramount');
		$this->data['carregistrationnumber'] = $this->input->get_post('carregistrationnumber');
		$this->data['foocar'] = $this->input->get_post('foocar');
		$this->data['citycar'] = $this->input->get_post('citycar');
		$this->data['emailcar'] = $this->input->get_post('emailcar');
		$this->data['mobilecar'] = $this->input->get_post('mobilecar');
		$this->data['policytypecar'] = $this->input->get_post('policytypecar');
		$this->data['expiringcar'] = $this->input->get_post('expiringcar');
		$this->data['ncbcar'] = $this->input->get_post('ncbcar');



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
			'caroptionsRadios' => $this->input->get_post('caroptionsRadios')

		);
		$this->session->set_userdata($userdata);

		$soapUrl = "https://uat.bhartiaxaonline.co.in/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
		
		$requestXml = $this->Common_model->generateQuoteXml($this->data);
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);

		$apiData = array(
			'api_request' => $requestXml,
			'api_response' => $output,
		);		
		$this->session->set_userdata($apiData);
	}



	public function carPremium(){
		 // echo '<pre>';
		 // print_r($this->session->userdata); 
		 // exit(); 
		$api_request = $this->session->userdata('api_request');
		$api_response = $this->session->userdata('api_response');
		
		$responseExtArray = $api_response['soapenv:Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body']['processTPRequestResponse']['response'];

		$premiumArray = $responseExtArray['PremiumSet']['Cover'];

		$this->data['selDeduct'] = '2500';

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

  // echo '<pre>';
  // print_r($this->data);
  // exit();

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



    


		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner');
		$this->load->view('quote/car_premium',$this->data);
		$this->load->view('layout/footer_inner');
	

	}



	public function calculatePremiumRepeat(){

		$this->data['manufacturercar'] = $this->session->userdata('manufacturercar');
		$this->data['carvariant'] = $this->session->userdata('carvariant');
		$this->data['idvamount']  = $this->session->userdata('idvamount');
		$this->data['caramount']  = $this->session->userdata('caramount');
		$this->data['carregistrationnumber'] = $this->session->userdata('carregistrationnumber');
		$this->data['foocar'] = $this->session->userdata('foocar');
		$this->data['citycar'] = $this->session->userdata('citycar');
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


		$soapUrl = "https://uat.bhartiaxaonline.co.in/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com"; 


		$requestXml = $this->Common_model->generateQuoteXmlRepeat($this->data);

print_r($requestXml);
echo '********************************************************************';
		
		$curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		$output =$this->Common_model->xmlstr_to_array($curl);
print_r($output);
		$apiData = array(
			'api_request' => $requestXml,
			'api_response' => $output,
		);		
		$this->session->set_userdata($apiData);



	}


	public function quoteView() {

		$quoteIdString = $this->uri->segment(2);
		$quoteId = base64_decode($quoteIdString);

		$soapUrl = "https://uat.bhartiaxaonline.co.in/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com"; 

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



}

?>