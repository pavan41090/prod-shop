<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TwoWheeler_model extends CI_Model {


	public $RegisterDatenew;
	public $ManfactureDate;
	public $VehicleAge;
	public $ccData;
	public $PlaceOfRegistration;
	public $SeatingCapacity;
	public $ExShowroomPrice;
	public $datePolicyStartDate;
	public $rikType;
	public $make;
	public $Variant;
	public $fueltype;
	public $idv;
	public $vehicleRegisterNumber;
	public $vehicleemailId;
	public $vehicleMobile;
	public $vehicleRegState;
	public $PADriverSelected;
	public $ncbvalue;
	public $ispadeclarationv;
	public $ispaderivedClass;

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    error_reporting(0);
	    $this->RegisterDatenew;
	    $this->ManfactureDate;
	    $this->VehicleAge;
	    $this->ccData;
	    $this->PlaceOfRegistration;
	    $this->SeatingCapacity;
	    $this->ExShowroomPrice;
	    $this->datePolicyStartDate;
	    $this->rikType;
	    $this->make;
	    $this->fueltype;
	    $this->Variant;
	    $this->idv;
	    $this->vehicleRegisterNumber;
	    $this->vehicleRegState;
	    $this->vehicleemailId;
	    $this->vehicleMobile;
	    $this->PADriverSelected;
	    $this->ncbvalue;
	    $this->ispadeclarationv;
	    $this->ispaderivedClass;
	    $this->checkengineeNumber;
	    $this->checkchasisNumber;
	    $this->lmssalut;
	    $this->firstname;
	    $this->timefirstName = time();
	    $this->birthdayalmsdob;
	    $this->genderName;
	    $this->occupationValue;
	    $this->materialStatus;
	    $this->vehicleAddress1;
	    $this->vehicleAddress2;
	    $this->vehicleAddress3;
	    $this->vehiclenomineName;
	    $this->vehiclenomineAge;
	    $this->vehiclenomineRelation;
	    $this->vehicleState;
	    $this->vehicleCity;
	    $this->vehiclePincode;
	    $this->lmsexistingname;
	    $this->lmspolicynumber;
	    $this->ZeroDepriciationSelected;
	    $this->RoadsideAssistanceSelected;
	    $this->InvoicePriceSelected;
	    $this->PAFamilyPremiumSelected;
	    $this->HospitalCashSelected;
	    $this->MedicalExpensesSelected;
	    $this->AmbulanceChargesSelected;
	    $this->CosumableCoverSelected;
	    $this->HydrostaticLockSelected;
	    $this->KeyReplacementSelected;
	    $this->NoClaimBonusSameSlabSelected;
	    $this->EngineGearBoxProtectionSelected;
	    $this->vehiclepolicytenure;
	    $this->isexisstingPAA;
	    $this->validaLicency;
	    $this->expirePolicyStartDate;
	    $this->applicationId;
	    $this->lmscarexistingpapolicy;
	    define('username','havaMtr');
	    define('TABLE_POLICY','tbl_policy_details_table');
	    define('TABLE_LEAD','tbl_lead');
		define('password','b4SQh1ZMgm6+urb/Vpd2JI88F6YiY9P/Nha/UtxxL5bI5QzYKTXcYY8XIy7FhY0lOP/B2vEePttRNGl0jh31yQ==');
//AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==');
		//b4SQh1ZMgm6+urb/Vpd2JI88F6YiY9P/Nha/UtxxL5bI5QzYKTXcYY8XIy7FhY0lOP/B2vEePttRNGl0jh31yQ==
	    set_time_limit(0);
	}
 
	public function gettwowheelrtainfo($vehicleNumner){

		try{

			$this->db->select('rta_sno,rta_code,rta_state,rta_location_name,rta_long_desc,tbl_master_states.state_name');
			$this->db->join('tbl_master_states','tbl_master_states.state_id=tbl_rta_location.rta_state','INNER');
			$this->db->where('rta_code',substr($vehicleNumner,0,4));
			$rtaData = $this->db->get('tbl_rta_location');

			log_message('info', __FUNCTION__.'Query:'.$this->db->last_query());
			return $rtaData;

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getleadDetailsQuoteById($leadIdInfo){
		try{

			$this->db->select('tbl_lead.lead_id,tbl_product.hme_previous_claims,tbl_product.expiring_policy_NCB,tbl_product.reg_number,tbl_product.show_room_value,

				tbl_customer.cus_title,
				tbl_customer.first_name,
				tbl_customer.last_name,
				tbl_customer.cust_area,
				tbl_customer.cust_zip,
				tbl_customer.cust_street2,
				tbl_customer.cust_street1,
				tbl_customer.cust_street3,
				tbl_customer.marital_status,
				tbl_customer.occupation,
				tbl_customer.cust_city,
				tbl_customer.cust_state,
				tbl_propsal.prop_mtr_engine_num,
				tbl_propsal.existing_insure,
				tbl_propsal.prop_mtr_chasis_num,
				tbl_propsal.existing_policy_num,
				tbl_nominee.nominee_name,
				tbl_nominee.nominee_age,
				tbl_nominee.nominee_relationship,
				tbl_propsal.prop_mtr_prev_prev_depre,tbl_propsal.prop_mtr_prev_stand_alone,

				tbl_product.home_policy_end,tbl_product.vehicle_register_date,tbl_product.manufacture_year,tbl_product.vehicle_tenure,tbl_product.valid_license,tbl_product.is_existing_pa_policy,tbl_product.manufacturer,tbl_product.model_varient,tbl_product.IDV_value,tbl_product.registration_city,tbl_vehicle_quote_details.quote_orderNum,tbl_vehicle_quote_details.quote_QuoteNum,tbl_vehicle_quote_details.vehicle_details_req,tbl_make_master.make_name,tbl_customer.cust_phone,tbl_customer.cust_email,tbl_product.lms_premium');
			$this->db->join('tbl_product','tbl_product.lead_id = tbl_lead.lead_id','INNER');
			$this->db->join('tbl_propsal','tbl_propsal.lead_id = tbl_lead.lead_id','INNER');
			$this->db->join('tbl_nominee','tbl_lead.lead_id = tbl_nominee.lead_id','LEFT');
			$this->db->join('tbl_customer','tbl_customer.cust_id = tbl_lead.customer_id','INNER');
                        //$this->db->join('tbl_master_states','tbl_master_states.state_id=tbl_rta_location.rta_state','INNER');
			$this->db->join('tbl_make_master','tbl_make_master.make_sno = tbl_product.manufacturer','INNER');
			$this->db->join('tbl_vehicle_quote_details','tbl_vehicle_quote_details.quote_lead_sno = tbl_lead.lead_id','INNER');
			$this->db->where(array('tbl_lead.lead_application_id'=>$leadIdInfo,'tbl_vehicle_quote_details.quote_status'=>1));
			$tbl_leadData = $this->db->get('tbl_lead');
			
			return $tbl_leadData;

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getmakemodelinfo(){
		try{
			$this->db->select('make_sno,make_name');
			$variantInfo = $this->db->get('tbl_make_master');
			return $variantInfo;

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getmodelvariantdata($vmmake){
		try{
			
			$this->db->select('tbl_variant_manfatcure.vm_id, tbl_variant_manfatcure.vm_item_code, tbl_make_master.make_name vm_make, CONCAT(tbl_variant_manfatcure.vm_model, "-", tbl_variant_manfatcure.vm_variant) model, tbl_variant_manfatcure.vm_product_type,tbl_variant_manfatcure.vm_variant,tbl_variant_manfatcure.vm_state_code,tbl_variant_manfatcure.vm_model,tbl_variant_manfatcure.vm_fuel,tbl_variant_manfatcure.vm_cc,tbl_variant_manfatcure.vm_seating_capacity,tbl_variant_manfatcure.vm_ex_showroom_price');
			$this->db->join('tbl_make_master','tbl_make_master.make_sno = tbl_variant_manfatcure.vm_make','INNER');
			$this->db->where('tbl_variant_manfatcure.vm_make',$vmmake);
			$variantInfo = $this->db->order_by('tbl_variant_manfatcure.vm_model','ASC')->group_by('vm_variant')->get('tbl_variant_manfatcure');
			
			return $variantInfo;

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function _getxmlDatatoJson($dataxml){

		try{

			$file_name = 'assets/uploads/makemodel-res-'.time(). ".json";  
			file_put_contents($file_name, $dataxml);
			chmod($file_name, 0777);

			$doc = simplexml_load_string($dataxml);
			$getIDVResponse = json_decode(json_encode($doc->Body->getIDVResponse),true);

			$add12 = ceil($getIDVResponse['IDV']*12)/100;
			$maxValue = ceil($getIDVResponse['IDV']+$add12);
			$minValue = ceil($getIDVResponse['IDV']-$add12);
			$idvvalue = $getIDVResponse['IDV'];

			$dataReturn['idvvalue'] = $getIDVResponse['IDV'];
			$dataReturn['_price'] = $getIDVResponse['Ex_Showromm_Price'];
			$dataReturn['statuscode'] = $getIDVResponse['Status_Code'];
			$dataReturn['status'] = $getIDVResponse['Status'];
			$dataReturn['_max'] = $maxValue;
			$dataReturn['_min'] = $minValue;
			$dataReturn['_scrollbar'] = '<div class="row"><div class="col-md-3" style="font-size: 12px;">Min:<em>'.$minValue.'</em></div><div class="col-md-6"><input type="range" min="'.$minValue.'" max="'.$maxValue.'" value="'.$idvvalue.'" change:Idv:Range id="idvrange" ></div><div class="col-md-3" style="font-size: 12px;">Max:<em>'.$maxValue.'</em></div></div>';

			return $dataReturn;

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function _getFastlinedataxml($resposeXml,$numbeVehicle){
		try{
			$docfastline = simplexml_load_string($resposeXml);
			$fastlinedocbody = json_decode(json_encode($docfastline->Body->FastLaneProcessResponse),true);
			if(array_key_exists('StatusCode', $fastlinedocbody) && $fastlinedocbody['StatusCode'] == '404'){

			$rtaCode = $this->gettwowheelrtainfo($numbeVehicle);
			$rtarow = $rtaCode->row_object();

				$fastLineArray['_fststatus'] = false;
				$fastLineArray['_rsn'] = $rtarow->rta_sno;
				$fastLineArray['_rco'] = $rtarow->rta_code;
				$fastLineArray['_sor'] = $rtarow->state_name;
				$fastLineArray['_cp'] = $rtarow->rta_location_name;
				$fastLineArray['_por'] = $rtarow->rta_location_name;
				$fastLineArray['_rld'] = $rtarow->rta_long_desc;

			} else {

			$add12 = ceil($fastlinedocbody['IDV']*12)/100;
			$maxValue = ceil($fastlinedocbody['IDV']+$add12);
			$minValue = ceil($fastlinedocbody['IDV']-$add12);
			$idvvalue = $fastlinedocbody['IDV'];

			$fastLineArray['_fststatus'] = true;
			$fastLineArray['_rt'] = $fastlinedocbody['RiskType'];
			$fastLineArray['_mk'] = $fastlinedocbody['Make'];
			$fastLineArray['_md'] = $fastlinedocbody['Model'];
			$fastLineArray['_ft'] = $fastlinedocbody['FuelType'];
			$fastLineArray['_vr'] = $fastlinedocbody['Variant'];
			$fastLineArray['_cc'] = $fastlinedocbody['CC'];
			$fastLineArray['_sc'] = $fastlinedocbody['SeatingCapacity'];
			$fastLineArray['_esp'] = $fastlinedocbody['ExShowroomPrice'];
			$fastLineArray['_va'] = $fastlinedocbody['VehicleAge'];
			$fastLineArray['_dor'] = date('d/m/Y',strtotime($fastlinedocbody['DateOfRegistration']));
			$fastLineArray['_dom'] = $fastlinedocbody['DateOfManufacture'];
			$fastLineArray['_en'] = $fastlinedocbody['EngineNo'];
			$fastLineArray['_cn'] = $fastlinedocbody['ChasisNo'];
			$fastLineArray['_rno'] = $fastlinedocbody['RegistrationNo'];
			$fastLineArray['_cp'] = $fastlinedocbody['CityOfResidence'];
			$fastLineArray['_por'] = $fastlinedocbody['PlaceOfRegistration'];
			$fastLineArray['_rzn'] = $fastlinedocbody['RegistrationZone'];
			$fastLineArray['_sor'] = $fastlinedocbody['stateofregistration'];
			$fastLineArray['_idv'] = $idvvalue;
			$fastLineArray['_max'] = $maxValue;
			$fastLineArray['_min'] = $minValue;

			$fastLineArray['_scrollbar'] = '<div class="row"><div class="col-md-3" style="font-size: 12px;">Min:<em>'.$minValue.'</em></div><div class="col-md-6"><input type="range" change:Idv:Range min="'.$minValue.'" max="'.$maxValue.'" value="'.$idvvalue.'"  id="idvrange" ></div><div class="col-md-3" style="font-size: 12px;">Max:<em>'.$maxValue.'</em></div></div>';
			
			}
			return $fastLineArray;

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function __getCreatCall($apiCall,$callxmlData){

		try{

			$xfile_name = 'assets/uploads/callxmlData.json';  
			file_put_contents($xfile_name, $callxmlData);
			chmod($xfile_name, 0777);

			 $curl = curl_init();
			 curl_setopt_array($curl, array(
			  CURLOPT_URL => $apiCall,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_TIMEOUT => 10,
			  CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
			  CURLOPT_SSL_VERIFYPEER => false,
			  CURLOPT_SSL_VERIFYHOST => 0,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $callxmlData,
			  CURLOPT_HTTPHEADER => array(
			  	"Content-Type: text/xml"
			  ),
			));
			
			curl_setopt($curl, CURLOPT_PROXY, "10.92.89.12");
			curl_setopt($curl, CURLOPT_PROXYPORT, "8080");
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			$xfile_name = 'assets/uploads/response-'.time(). ".json";  
			file_put_contents($xfile_name, $response);
			chmod($xfile_name, 0777);
			return $response;
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}

	}

	public function __callCurl($makename,$modelname,$productname,$varianttypename,$stateCodeName,$manyear){

		try{
			//pioMtr
			//AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==
			$callxmlData = "<Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\"><Body><getIDV xmlns=\"http://schemas.cordys.com/default\"><UserName>".username."</UserName><Password>".password."</Password><Make>".$makename."</Make><Model>".$modelname."</Model><Producttype>".$productname."</Producttype><Variant>".$varianttypename."</Variant><StateCode>".$stateCodeName."</StateCode><Manfaturingyear>".$manyear."</Manfaturingyear></getIDV></Body></Envelope>";

			$file_name = 'assets/uploads/makemodel-'.time(). ".json";  
			file_put_contents($file_name, $callxmlData);
			chmod($file_name, 0777);

			$response = $this->__getCreatCall(FLASH_API_CALL,$callxmlData);

			return $this->_getxmlDatatoJson($response);

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getIntigratefastline($numbeVehicle){

		try{
			
			$fastLineData = "<Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\">\r\n\t<Body>\r\n\t\t<FastLaneProcess xmlns=\"http://schemas.cordys.com/bagi/b2c/emotor/bpm/1.0\">\r\n<ns0:RegNo xmlns:ns0=\"http://schemas.cordys.com/default\">".$numbeVehicle."</ns0:RegNo>\r\n<ns0:UserName xmlns:ns0=\"http://schemas.cordys.com/default\">".FLASH_API_CALL_USERNAME."</ns0:UserName>\r\n<ns0:Password xmlns:ns0=\"http://schemas.cordys.com/default\">".FLASH_API_CALL_PASSWORD."</ns0:Password>\r\n\t\t</FastLaneProcess>\r\n\t</Body>\r\n</Envelope>\r\n";

			$response = $this->__getCreatCall(FLASH_API_CALL,$fastLineData);
			return $this->_getFastlinedataxml($response,$numbeVehicle);

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}

	}

	public function __callgetReadxmlQuoteData($xmlQuoteData){

		try {

			$doc = new DOMDocument();
			$doc->loadXML($xmlQuoteData);
			$root = $doc->documentElement;
			$output = $this->Common_model->domnode_to_array($root);
			$quoteBody = $output['Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body'];
			$quoteResData = $quoteBody['processTPRequestResponse']['response'];
			$PremiumSetArray = $quoteResData['PremiumSet'];
			$quoteResDisplay['OrderNo'] = $quoteResData['OrderNo'];
			$quoteResDisplay['QuoteNo'] = $quoteResData['QuoteNo'];
			$quoteResDisplay['info'] = 'QuoteNo';
			$quoteResDisplay['StatusCode'] = $quoteResData['StatusCode'];
			$quoteResDisplay['StatusMsg'] = $quoteResData['StatusMsg'];
			$quoteResDisplay['Cover'] = json_encode($PremiumSetArray['Cover']);

			$addonStatus = false;
			foreach ($PremiumSetArray['Cover'] as $key => $value) {
				# code...
				if($value['Type'] == 'Addon'){
					$addonStatus = true;
					$addonData[] = array(
						'name' => $value['Name'],
						'Desc' => $value['Desc'],
						'Premium' => ceil($value['Premium'])
					);
				}
			}
			$quoteResDisplay['addonStatus'] = $addonStatus;
			$quoteResDisplay['addonData'] = $addonData;
			$quoteResDisplay['PremiumDetails'] = $PremiumSetArray['PremiumDetails'];
			$this->session->set_userdata('quoteResDisplay',$quoteResDisplay);

			return $quoteResDisplay;
			

		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function getProposalVlueResponc($quoteResDisplay){

		 try{
		 	$this->createthisValues($quoteResDisplay);
		 	$pxquotexml = $this->__proposalServiceCallindex($quoteResDisplay['OrderNo'],$quoteResDisplay['QuoteNo']);
			$proposalresponse = $this->__getCreatCall(FLASH_API_CALL,$pxquotexml);
			$file_name = 'assets/uploads/proposal-res-'.$this->vehicleMobile.'-'.time().".json";  
			file_put_contents($file_name, $proposalresponse);
			chmod($file_name, 0777);
			//print_r($proposalresponse);
		 	$pdoc = new DOMDocument();
			$pdoc->loadXML($proposalresponse);
			$proot = $pdoc->documentElement;
			$poutput = $this->Common_model->domnode_to_array($proot);
			$pquoteBody = $poutput['Body']['serveResponse']['tuple']['old']['serve']['serve']['SOAP:Envelope']['SOAP:Body'];
			$pquoteResData = $pquoteBody['processTPRequestResponse']['response'];
			$pPremiumSetArray = $pquoteResData['PremiumSet'];
			$pquoteResDisplay['OrderNo'] = $pquoteResData['OrderNo'];
			$pquoteResDisplay['info'] = 'Proposal';
			$pquoteResDisplay['QuoteNo'] = $pquoteResData['QuoteNo'];
			$pquoteResDisplay['StatusCode'] = $pquoteResData['StatusCode'];
			$pquoteResDisplay['Cover'] = json_encode($pPremiumSetArray['Cover']);
			$pquoteResDisplay['PremiumDetails'] = $pPremiumSetArray['PremiumDetails'];

			if(!empty($this->applicationId)){

				$dataInsert['policy_lead_no'] = '(SELECT lead_id FROM '.TABLE_LEAD.' WHERE lead_application_id = "'.$this->applicationId.'" )'; 
	        	$AdataInsert['policy_number'] = ''; 
	        	$AdataInsert['policy_start_date'] = str_replace('T00:00:00.000', '', $this->datePolicyStartDate); 
	        	$AdataInsert['policy_end_date'] = $this->expirePolicyStartDate; 
	        	$AdataInsert['policy_created_by'] = ($this->session->userdata('customerId') ? $this->session->userdata('customerId') : 0); 
	        	$AdataInsert['policy_created_on'] = date("Y-m-d G:i:s"); 
	        	$AdataInsert['policy_data'] = $pquoteResData; 
	        	$AdataInsert['policy_status'] = 1; 
	        	$this->db->set($dataInsert,'',false)->set($AdataInsert)->insert(TABLE_POLICY);

			}

			return $pquoteResDisplay;

		 } catch(Exception $error){

		 }
	}

	public function __proposalServiceCallindex($orderNumber,$quoteNumber){

/*<tns:DateOfRegistration>".$this->RegisterDatenew."T00:00:00</tns:DateOfRegistration>
        <tns:DateOfManufacture>".$this->ManfactureDate."-01-01T00:00:00</tns:DateOfManufacture>
        */

        $rtamastername = $this->db->where('rta_code',substr($this->vehicleRegisterNumber, 0,4))->get('tbl_rta_location')->row_object()->rta_tw;

        $this->expirePolicyStartDate = date('Y-m-d', strtotime('+ 1 year -1 days', strtotime($this->datePolicyStartDate)));
	$quotexmlxx = "<Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\">
		<Body>
		<serve xmlns=\"http://schemas.cordys.com/gateway/Provider\">
		<SessionDoc><Session>
      <SessionData>
        <Index>2</Index>
        <InitTime>".gmdate('D, d M Y H:i:s')."</InitTime>
        <UserName>".username."</UserName>
        <Password>".password."</Password>
        <OrderNo>".$orderNumber."</OrderNo>
        <QuoteNo>".$quoteNumber."</QuoteNo>
        <Route>INT</Route>
        <Contract>MTR</Contract>
        <Channel>qrMtr</Channel>
        <TransactionType>Quote</TransactionType>
        <TransactionStatus>Fresh</TransactionStatus>
        <ID>151073242054517038782981</ID>
        <UserAgentID>11008704</UserAgentID>
        <Source>81001336</Source>
      </SessionData>
      <tns:Vehicle xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
        <tns:TypeOfBusiness>TR</tns:TypeOfBusiness>
        <tns:AccessoryInsured>N</tns:AccessoryInsured>
        <tns:AccessoryValue>0</tns:AccessoryValue>
        <tns:NonElecAccessoryInsured>N</tns:NonElecAccessoryInsured>
        <tns:BiFuelKit>
          <tns:IsBiFuelKit>N</tns:IsBiFuelKit>
          <tns:BiFuelKitValue>0</tns:BiFuelKitValue>
          <tns:ExternallyFitted>0</tns:ExternallyFitted>
        </tns:BiFuelKit>
        <DateOfRegistration>".$this->RegisterDatenew."T00:00:00</DateOfRegistration>
        <DateOfManufacture>".$this->ManfactureDate."-01-01T00:00:00</DateOfManufacture>
        <tns:RiskType>".$this->rikType."</tns:RiskType>
        <tns:Make>".$this->make."</tns:Make>
        <tns:Model>".$this->model."</tns:Model>
        <tns:FuelType>".$this->fueltype."</tns:FuelType>
        <tns:Variant>".$this->Variant."</tns:Variant>
        <tns:IDV>".$this->idv."</tns:IDV>
        <tns:VehicleAge>".($this->VehicleAge == 0 ? (date('Y')-$this->ManfactureDate) : $this->VehicleAge)."</tns:VehicleAge>
        <tns:CC>".$this->ccData."</tns:CC>
        <tns:PlaceOfRegistration>".$this->PlaceOfRegistration."</tns:PlaceOfRegistration>
        <tns:SeatingCapacity>".$this->SeatingCapacity."</tns:SeatingCapacity>
        <tns:ExShowroomPrice>".$this->ExShowroomPrice."</tns:ExShowroomPrice>
        <tns:EngineNo>".$this->checkengineeNumber."</tns:EngineNo>
        <tns:ChasisNo>".$this->checkchasisNumber."</tns:ChasisNo>
        <tns:DriveExperiance>19</tns:DriveExperiance>
        <tns:PaidDriver>False</tns:PaidDriver>
        <tns:RegistrationNo>".$this->vehicleRegisterNumber."</tns:RegistrationNo>
      </tns:Vehicle>
      <tns:Quote xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
        <tns:ExistingPolicy>
          <tns:Claims>0</tns:Claims>
          <tns:PolicyType>Comprehensive</tns:PolicyType>
          <tns:EndDate>".date('Y-m-d').'T00:00:00.000'."</tns:EndDate>
          <tns:NCB>".$this->ncbvalue."</tns:NCB>
          <tns:PolicyNo>".($this->lmspolicynumber ? $this->lmspolicynumber : '0')."</tns:PolicyNo>
          <tns:InsuranceCompany>".($this->lmsexistingname ? $this->lmsexistingname : '0')."</tns:InsuranceCompany>
        </tns:ExistingPolicy>
        <tns:PolicyStartDate>".$this->datePolicyStartDate."</tns:PolicyStartDate>
        <tns:Deductible>0</tns:Deductible>
        <tns:PAFamilySI>0</tns:PAFamilySI>
        <tns:Premium>
          <tns:Discount />
        </tns:Premium>
        <tns:SelectedCovers>
          <tns:CarDamageSelected>True</tns:CarDamageSelected>
          <tns:TPLiabilitySelected>True</tns:TPLiabilitySelected>
          <tns:PADriverSelected>".$this->PADriverSelected."</tns:PADriverSelected>
          <tns:ZeroDepriciationSelected>".$this->ZeroDepriciationSelected."</tns:ZeroDepriciationSelected>
          <tns:PAFamilyPremiumSelected>".$this->PAFamilyPremiumSelected."</tns:PAFamilyPremiumSelected>
          <tns:RoadsideAssistanceSelected>".$this->RoadsideAssistanceSelected."</tns:RoadsideAssistanceSelected>
          <tns:InvoicePriceSelected>".$this->InvoicePriceSelected."</tns:InvoicePriceSelected>
          <tns:InvoicePriceCoverAmount />
          <tns:HospitalCashSelected>".$this->HospitalCashSelected."</tns:HospitalCashSelected>
          <tns:MedicalExpensesSelected>".$this->MedicalExpensesSelected."</tns:MedicalExpensesSelected>
          <tns:AmbulanceChargesSelected>".$this->AmbulanceChargesSelected."</tns:AmbulanceChargesSelected>
          <tns:CosumableCoverSelected>".$this->CosumableCoverSelected."</tns:CosumableCoverSelected>
          <tns:HydrostaticLockSelected>".$this->HydrostaticLockSelected."</tns:HydrostaticLockSelected>
          <tns:KeyReplacementSelected>".$this->KeyReplacementSelected."</tns:KeyReplacementSelected>
          <tns:NoClaimBonusSameSlabSelected>".$this->NoClaimBonusSameSlabSelected."</tns:NoClaimBonusSameSlabSelected>
          <tns:EngineGearBoxProtectionSelected>".$this->EngineGearBoxProtectionSelected."</tns:EngineGearBoxProtectionSelected>
        </tns:SelectedCovers>
        <tns:PolicyEndDate>".date('Y-m-d', strtotime('+ 1 year -1 days', strtotime($this->datePolicyStartDate))).'T23:59:59.000'."</tns:PolicyEndDate>";
        if($this->vehiclepolicytenure > 1){
        	$quotexmlxx .= "<tns:PolicyTenure>".$this->vehiclepolicytenure."</tns:PolicyTenure>";
        }

        if(($this->validaLicency == 1 && $this->lmscarexistingpapolicy == 1) || ($this->validaLicency == 1)){
			$quotexmlxx .= "<tns:IsExistingPA>".$this->isexisstingPAA."</tns:IsExistingPA>";
			$quotexmlxx .= "<tns:PADeclaration>".$this->ispaderivedClass."</tns:PADeclaration>";
		} else if($this->validaLicency == 0){
			$quotexml .= "<IsExistingPA>".$this->isexisstingPAA."</IsExistingPA>";
			$quotexml .= "<PADeclaration>".$this->ispaderivedClass."</PADeclaration>";
		} else {
			$quotexmlxx .= "<tns:IsExistingPA />";
			$quotexmlxx .= "<tns:PADeclaration />";
		}
		//<IsExistingPA>".$this->isexisstingPAA."</IsExistingPA>
		$quotexmlxx .= "
      </tns:Quote>
      <tns:POSP xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
        <tns:PospFlag>N</tns:PospFlag>
        <tns:PospName />
        <tns:PospContactNo />
        <tns:PanNo />
        <tns:AadharNo />
      </tns:POSP>
      <tns:Client xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
        <tns:ClientType>Individual</tns:ClientType>
        <tns:FinancierDetails>
          <tns:IsFinanced>0</tns:IsFinanced>
        </tns:FinancierDetails>
        <tns:CltDOB>".$this->birthdayalmsdob."</tns:CltDOB>
        <tns:Salut>".$this->lmssalut."</tns:Salut>
        <tns:GivName>".$this->firstname."-".$this->timefirstName."</tns:GivName>
        <tns:ClientExtraTag01>".$this->vehicleRegState."</tns:ClientExtraTag01>
        <tns:CityOfResidence>".$this->PlaceOfRegistration."</tns:CityOfResidence>
        <tns:EmailID>".$this->vehicleemailId."</tns:EmailID>
        <tns:MobileNo>".$this->vehicleMobile."</tns:MobileNo>
        <tns:SurName>PAILWAN</tns:SurName>
        <tns:CltSex>".$this->genderName."</tns:CltSex>
        <tns:Marryd>".$this->materialStatus."</tns:Marryd>
        <tns:Occupation>".$this->occupationValue."</tns:Occupation>
        <tns:CltAddr01>".str_replace(' ', '', $this->vehicleAddress1)."</tns:CltAddr01>
        <tns:CltAddr02>".str_replace(' ', '', $this->vehicleAddress2)."</tns:CltAddr02>
        <tns:CltAddr03>".str_replace(' ', '', $this->vehicleAddress3)."</tns:CltAddr03>
        <tns:City>".$this->vehicleCity."</tns:City>
        <tns:State>".$this->vehicleState."</tns:State>
        <tns:PinCode>".$this->vehiclePincode."</tns:PinCode>
        <tns:Nominee>
          <tns:Name>".$this->vehiclenomineName."</tns:Name>
          <tns:Age>".$this->vehiclenomineAge."</tns:Age>
          <tns:Relationship>".$this->vehiclenomineRelation."</tns:Relationship>
        </tns:Nominee>
        <tns:RegistrationZone>".$rtamastername."</tns:RegistrationZone>
		<IsDrviningLicencePresent>Y</IsDrviningLicencePresent>
        <tns:GstinNo />
      </tns:Client>
    </Session></SessionDoc>
		</serve>
		</Body>
		</Envelope>";
		//date('Y-m-d',strtotime("+1 years -1 days"))

		$file_name = 'assets/uploads/proposal-'.$this->vehicleMobile.'-'.time(). ".json";  
		file_put_contents($file_name, $quotexmlxx);
		chmod($file_name, 0777);
    	return $quotexmlxx;
	}

	public function _getQuoteSerivceIndex(){
		//<DateOfRegistration>".$this->RegisterDatenew."T00:00:00</DateOfRegistration>
		//<DateOfManufacture>".$this->ManfactureDate."-01-01T00:00:00</DateOfManufacture>
		$rtamastername = $this->db->where('rta_code',substr($this->vehicleRegisterNumber, 0,4))->get('tbl_rta_location')->row_object()->rta_tw;
$quotexml = "<Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\">
		<Body>
		<serve xmlns=\"http://schemas.cordys.com/gateway/Provider\">
		<SessionDoc><Session>
		<SessionData>
		<Index>1</Index>
		<InitTime>".gmdate('D, d M Y H:i:s')."</InitTime>
		<UserName>".username."</UserName>
		<Password>".password."</Password>
		<OrderNo>NA</OrderNo>
		<QuoteNo>NA</QuoteNo>
		<Route>INT</Route>
		<Contract>MTR</Contract>
		<Channel></Channel>
		<TransactionType>Quote</TransactionType>
		<TransactionStatus>Fresh</TransactionStatus>
		<ID>151073239593817142182060</ID>
		<UserAgentID>11008704</UserAgentID>
		<Source>81001336</Source>
		</SessionData>
		<Vehicle xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
		<TypeOfBusiness>TR</TypeOfBusiness>
		<AccessoryInsured>N</AccessoryInsured>
		<AccessoryValue>0</AccessoryValue>
		<NonElecAccessoryInsured>N</NonElecAccessoryInsured>
		<BiFuelKit>
		<IsBiFuelKit>N</IsBiFuelKit>
		<BiFuelKitValue>0</BiFuelKitValue>
		<ExternallyFitted>N</ExternallyFitted>
		</BiFuelKit>
		<DateOfRegistration>".$this->RegisterDatenew."T00:00:00</DateOfRegistration>
        <DateOfManufacture>".$this->ManfactureDate."-01-01T00:00:00</DateOfManufacture>
		<RiskType>".$this->rikType."</RiskType>
		<Make>".$this->make."</Make>
		<Model>".$this->model."</Model>
		<FuelType>".$this->fueltype."</FuelType>
		<Variant>".$this->Variant."</Variant>
		<IDV>".$this->idv."</IDV>
		<VehicleAge>".($this->VehicleAge == 0 ? (date('Y')-$this->ManfactureDate) : $this->VehicleAge)."</VehicleAge>
		<CC>".$this->ccData."</CC>
		<PlaceOfRegistration>".$this->PlaceOfRegistration."</PlaceOfRegistration>
		<SeatingCapacity>".$this->SeatingCapacity."</SeatingCapacity>
		<VehicleExtraTag01>".$this->SeatingCapacity."</VehicleExtraTag01>
		<RegistrationNo>".$this->vehicleRegisterNumber."</RegistrationNo>
		<ExShowroomPrice>".$this->ExShowroomPrice."</ExShowroomPrice>
		</Vehicle>
		<Quote xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
		<ExistingPolicy>
		<Claims>0</Claims>
		<PolicyType>Comprehensive</PolicyType>
		<EndDate>".date('Y-m-d').'T00:00:00.000'."</EndDate>
		<NCB>".$this->ncbvalue."</NCB>
		</ExistingPolicy>
		<PolicyStartDate>".$this->datePolicyStartDate."</PolicyStartDate>
		<Deductible>0</Deductible>
		<PAFamilySI>0</PAFamilySI>
		<AgentNumber>0</AgentNumber>
		<DealerId>0</DealerId>
		<Premium>
		<Discount />
		</Premium>
		<SelectedCovers>
		<CarDamageSelected>True</CarDamageSelected>
		<TPLiabilitySelected>True</TPLiabilitySelected>
		<PADriverSelected>".$this->PADriverSelected."</PADriverSelected>
		<ZeroDepriciationSelected>False</ZeroDepriciationSelected>
		<PAFamilyPremiumSelected>".$this->PAFamilyPremiumSelected."</PAFamilyPremiumSelected>
		</SelectedCovers>
		<PolicyEndDate>".date('Y-m-d', strtotime('+ 1 year -1 days', strtotime($this->datePolicyStartDate))).'T23:59:59.000'."</PolicyEndDate>";
		//".$this->ZeroDepriciationSelected."
		if($this->vehiclepolicytenure > 1){
		$quotexml .= "<PolicyTenure>".$this->vehiclepolicytenure."</PolicyTenure>";
		}

		if(($this->validaLicency == 1 && $this->lmscarexistingpapolicy == 1)){
			$quotexml .= "<IsExistingPA>".$this->isexisstingPAA."</IsExistingPA>";
			$quotexml .= "<PADeclaration>".$this->ispaderivedClass."</PADeclaration>";
		} else if($this->validaLicency == 0){
			$quotexml .= "<IsExistingPA>".$this->isexisstingPAA."</IsExistingPA>";
			$quotexml .= "<PADeclaration>".$this->ispaderivedClass."</PADeclaration>";
		} else {
			$quotexml .= "<IsExistingPA />";
			$quotexml .= "<PADeclaration />";
		}
		$quotexml .= "</Quote>
		<POSP xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
		<PospFlag>N</PospFlag>
		<PospName/>
		<PospContactNo/>
		<PanNo/>
		<AadharNo/>
		</POSP>
		<Client xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
		<ClientType>Individual</ClientType>
		<CltDOB>".$this->birthdayalmsdob."</CltDOB>
		<FinancierDetails>
		<IsFinanced>0</IsFinanced>
		</FinancierDetails>
		 <GivName>".$this->firstname."-".$this->timefirstName."</GivName>
		<SurName />
		<ClientExtraTag01>".$this->vehicleRegState."</ClientExtraTag01>
		<CityOfResidence>".$this->PlaceOfRegistration."</CityOfResidence>
		<EmailID>".$this->vehicleemailId."</EmailID>
		<MobileNo>".$this->vehicleMobile."</MobileNo>
		<RegistrationZone>".$rtamastername."</RegistrationZone>
		<IsDrviningLicencePresent>Y</IsDrviningLicencePresent>
		</Client>
		</Session></SessionDoc>
		</serve>
		</Body>
		</Envelope>";
//echo $quotexml;
		return $quotexml;
	}

	public function createthisValues($twowheelData){

		$preinspectionscenario = 1;
		$this->applicationId = $twowheelData['applicationId'];
		$PreviousChecker = $twowheelData['PreviousChecker'];
		$vehiclethirdparty = $twowheelData['vehiclethirdparty'];
		$depPreviousPolicy = $twowheelData['depPreviousPolicy'];
		$pypendsdate = $twowheelData['pypendsdate'];
		$lmscartenure = $twowheelData['lmscartenure'];

		$this->ZeroDepriciationSelected = ($twoAddon == true ? 'True' : 'False');
		$this->RoadsideAssistanceSelected = ($twoAddon == true ? 'True' : 'False');
		$this->InvoicePriceSelected = ($twoAddon == true ? 'True' : 'False');
		$this->PAFamilyPremiumSelected = ($twoAddon == true ? 'True' : 'False');
		$this->HospitalCashSelected = ($twoAddon == true ? 'True' : 'False');
		$this->MedicalExpensesSelected = ($twoAddon == true ? 'True' : 'False');
		$this->AmbulanceChargesSelected = ($twoAddon == true ? 'True' : 'False');
		$this->CosumableCoverSelected = ($twoAddon == true ? 'True' : 'False');
		$this->HydrostaticLockSelected = ($twoAddon == true ? 'True' : 'False');
		$this->KeyReplacementSelected = ($twoAddon == true ? 'True' : 'False');
		$this->NoClaimBonusSameSlabSelected = ($twoAddon == true ? 'True' : 'False');
		$this->EngineGearBoxProtectionSelected = ($twoAddon == true ? 'True' : 'False');
		
		if($lmscartenure == 1){
			$vehicleRiskTyppe = 'FTW';
			$vehiclepolicytenure = 1;
		} else if($lmscartenure == 2){
			$vehicleRiskTyppe = 'LT2';
			$vehiclepolicytenure = 2;
		} else if($lmscartenure == 3){
			$vehicleRiskTyppe = 'LT3';
			$vehiclepolicytenure = 3;
		} else {
			$vehicleRiskTyppe = 'FTW';
			$vehiclepolicytenure = 1;
		}
		//echo $vehicleRiskTyppe
		//$vehicleRiskTyppe = 'FTW';
		$checkpypendsdate = date("Y-m-d", strtotime($pypendsdate));
		$toDate = date('Y-m-d');
		$originalDate = trim($twowheelData['RegisterDate']);//str_replace('/', '-',  ));

		$myDateTime = DateTime::createFromFormat('d/m/Y', $originalDate);
		$this->RegisterDatenew = $myDateTime->format('Y-m-d');

		//echo $originalDatedate = date('Y-m-d',strtotime($originalDate));
		//str_replace('/', '-', $originalDate);
		//$this->RegisterDatenew = date("Y-m-d", strtotime($originalDatedate));

		$lmsdoboriginalDate = str_replace('/', '-', $twowheelData['lmsdob'] );
		$this->birthdayalmsdob = date( 'Ymd',strtotime($lmsdoboriginalDate) );
		if($vehiclethirdparty <= 0){
			$preinspectionscenario = 0;
		}

		if($depPreviousPolicy <= 0){
			$preinspectionscenario = 0;
		}

		if($PreviousChecker*1 > 0){

		if($checkpypendsdate > $toDate){

			if($preinspectionscenario > 0){
				$datePolicyStartDate = date('Y-m-d', strtotime(' + 1 days')).'T00:00:00.000';
			} else {
				$datePolicyStartDate = date('Y-m-d', strtotime(' + 1 days')).'T00:00:00.000';
			}

		} else {
			
			if(($checkpypendsdate == $toDate) || ($checkpypendsdate < $toDate)){
				
				if($preinspectionscenario > 0){
					$datePolicyStartDate = date('Y-m-d').'T00:00:00.000';
				} else {
					$datePolicyStartDate = date('Y-m-d', strtotime(' + 2 days')).'T00:00:00.000';
				}
			}
		} } else {
			$preinspectionscenario = 0;
			$datePolicyStartDate = date('Y-m-d', strtotime(' + 2 days')).'T00:00:00.000';
		}

		$lmsmaterial = ($twowheelData['lmsmaterial'] == 'Single' ? 'S' : 'M');
		$this->lmssalut = $twowheelData['lmssalut'];
		$this->materialStatus = $lmsmaterial;
		$this->firstname = $twowheelData['lmsfname'];
		$this->datePolicyStartDate = $datePolicyStartDate;
		$this->ManfactureDate = $twowheelData['ManfactureDate'];
		$this->VehicleAge = $twowheelData['VehicleAge'];
		$this->ccData = $twowheelData['cc'];
		$this->PlaceOfRegistration = $twowheelData['PlaceOfRegistration'];
		$this->SeatingCapacity = $twowheelData['SeatingCapacity'];
		$this->ExShowroomPrice = $twowheelData['ExShowroomPrice'];
		$this->rikType = $vehicleRiskTyppe;//$twowheelData['rikType'];
		$this->vehiclepolicytenure = $vehiclepolicytenure;//$twowheelData['rikType'];
		$this->make = $twowheelData['make'];
		$this->model = $twowheelData['model'];
		$this->fueltype = $twowheelData['fueltype'];
		$this->Variant = $twowheelData['Variant'];
		$this->idv = $twowheelData['idv'];
		$this->vehicleRegisterNumber = $twowheelData['vehicleRegisterNumber'];
		$this->vehicleRegState = $twowheelData['vehicleRegState'];
		$this->vehicleemailId = $twowheelData['vehicleemailId'];
		$this->vehicleAddress1 = $twowheelData['lmsadd1'];
		$this->vehicleAddress2 = $twowheelData['lmsadd2'];
		$this->vehicleAddress3 = $twowheelData['lmsadd3'];
		$this->vehicleMobile = $twowheelData['vehicleMobile'];
		$this->vehicleState = $twowheelData['lmsstate'];
		$this->vehicleCity = $twowheelData['lmscity'];
		$this->vehiclePincode = $twowheelData['lmspincode'];
		$this->vehiclenomineName = $twowheelData['lmsnominename'];
		$this->vehiclenomineAge = $twowheelData['lmsnomineage'];
		$this->vehiclenomineRelation = $twowheelData['lmsnominerelation'];

		//$this->PADriverSelected = ($twowheelData['lmscardouneedstandpa'] == '1' ? 'true' : 'false');

		$lmscarexistingpapolicy = $twowheelData['lmscarexistingpapolicy'];
		$this->lmscarexistingpapolicy = $lmscarexistingpapolicy;
		$this->validaLicency = $twowheelData['lmscarvalidlicense'];
		if($this->validaLicency == 1 && $lmscarexistingpapolicy == 1){ //if($lmscarexistingpapolicy > 0){
			$padeclarationv = 'true';
			$paderivedClass = 'YES';//'NO';
			$isexisstingPAA = 'true';//'NO';
		} else if($this->validaLicency == 0){
			$padeclarationv = 'true';
			$paderivedClass = 'YES';//'NO';
			$isexisstingPAA = 'true';//'NO';
		} else {
			$padeclarationv = 'false';
			$paderivedClass = 'NO';//'YES';
			$isexisstingPAA = 'false';//'NO';
		}
		$this->isexisstingPAA = $isexisstingPAA;
		$OccupationData = occupationfunction();
		foreach ($OccupationData as $key => $value) {
			
			if($value == $twowheelData['lmsoccupation']){
				$this->occupationValue = $key;
			}
		}
		if(empty($this->occupationValue)){
			$this->occupationValue = '0007';
		}
		$this->genderName = ($twowheelData['lmsgender'] == 'Male') ? 'M' : 'F';
		$this->PADriverSelected = $padeclarationv;
		$this->ispaderivedClass = $paderivedClass;
		$this->ncbvalue = ($twowheelData['ncbvalue'] ? $twowheelData['ncbvalue'] : '0');
		$this->checkengineeNumber = $twowheelData['engineeNumber'];
		$this->checkchasisNumber = $twowheelData['chasisNumber'];
		$this->lmsexistingname = $twowheelData['lmsexistingname'];
		$this->lmspolicynumber = $twowheelData['lmspolicynumber'];
	}

	public function gettwowheelerquoteinfo($twowheelData){
		$this->createthisValues($twowheelData);
		$xquotexml = $this->_getQuoteSerivceIndex('1','NA','NA');
		$response = $this->__getCreatCall(FLASH_API_CALL,$xquotexml);
		$file_namep = 'assets/uploads/quote-res-'.$this->vehicleMobile.'-'.time(). ".json";  
		file_put_contents($file_namep, $response);
		chmod($file_namep, 0777);
		return $this->__callgetReadxmlQuoteData($response);
	}

	public function reCallifEmpty($leadQuoteId,$leadQuoteNo,$leadlms_premium,$leadlead_id){
		try{
			$this->getCreatepaymentgateWay($leadQuoteId,$leadQuoteNo,$leadlms_premium,$leadlead_id);
		} catch(Exception $error){
			log_message('error','');
		}
	}

	public function getCreatepaymentgateWay($leadQuoteId,$leadQuoteNo,$leadlms_premium,$leadlead_id){

		try{
			$prrrr = explode('.',$leadlms_premium);

			$getwayCode = "<Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\">
  						 <Body>
  						 <TPOnlinePaymentProcess xmlns=\"http://schemas.cordys.com/com/bagi/tp/onlinePaymentProcess\">
  						 <TPPaymentRequest>
  						 <UserDetails>
  						 <UserName>".FLASH_API_CALL_USERNAME."</UserName>
  						 <Password>".FLASH_API_CALL_PASSWORD."</Password>
  						 </UserDetails>
  						 <PaymentDetails>
  						 <TransactionRefNumber>".$leadQuoteNo."</TransactionRefNumber>
  						 <TransactionAmount>".$prrrr[0].".00</TransactionAmount>
  						 <BankCode>HDFC</BankCode>
  						 <BankRefNumber />
  						 <TransactionDate>".date('Y-m-d')."T00:00:00</TransactionDate>
  						 <Provider>TPBilldesk</Provider>
  						 <AdditionalInfo1></AdditionalInfo1>
  						 <AdditionalInfo2></AdditionalInfo2>
  						 <AdditionalInfo3></AdditionalInfo3>
  						 </PaymentDetails>
  						 <PolicyDetails>
  						 <OrderNo>".$leadQuoteId."</OrderNo>
  						 <Product>MTR</Product>
  						 </PolicyDetails>
  						 </TPPaymentRequest>
  						 </TPOnlinePaymentProcess>
  						 </Body></Envelope>";
  						 $file_nameg = 'assets/uploads/gateway-input-'.$leadQuoteId.'-'.time().".json";  
						file_put_contents($file_nameg, $getwayCode);
						chmod($file_nameg, 0777);
						$response = $this->__getCreatCall(FLASH_API_CALL,$getwayCode);

						if($response == ''){
							$this->reCallifEmpty($leadQuoteId,$leadQuoteNo,$leadlms_premium,$leadlead_id);
							return;
						} else {

							$gatewayfile_name = 'assets/uploads/gateway-res-'.$leadQuoteId.'-'.time().".json";  
						    file_put_contents($gatewayfile_name, $response); 
						    chmod($gatewayfile_name, 0777);
							$docgateway = simplexml_load_string($response);
							$fastlinedocbody = json_decode(json_encode($docgateway->Body->TPOnlinePaymentProcessResponse->TPPaymentMessage->TPPaymentResponse),true);
							$resCodegateway = $fastlinedocbody;
							
							$dataPolicyinfo['PolicyNumber'] = $resCodegateway['PolicyNumber'];
							$dataPolicyinfo['OrderNumber'] = $resCodegateway['OrderNumber'];
							$dataPolicyinfo['TransactionRefNumber'] = $resCodegateway['TransactionRefNumber'];
							$dataPolicyinfo['BagiTransactionRefNumber'] = $resCodegateway['BagiTransactionRefNumber'];
							$dataPolicyinfo['StatusCode'] = $resCodegateway['StatusCode'];
							$oldData = $this->db->query("SELECT vehicle_details_req FROM tbl_vehicle_quote_details WHERE quote_lead_sno = $leadlead_id order by quote_sno DESC LIMIT 1")->row_object();

												$quoteInforInsertion = array(
												'quote_lead_sno' => $leadlead_id,
												'quote_orderNum' => $resCodegateway['OrderNumber'],
												'quote_QuoteNum' => $leadQuoteNo,
												'lead_policy_number' => ($resCodegateway['PolicyNumber'] ? $resCodegateway['PolicyNumber'] : ''),
												'lead_policy_bagi_transaction_number' => ($resCodegateway['BagiTransactionRefNumber'] ? $resCodegateway['BagiTransactionRefNumber'] : ''),
												'lead_transaction_number' => ( $resCodegateway['TransactionRefNumber'] ? $resCodegateway['TransactionRefNumber'] : ''),
												'vehicle_details_req' => $oldData->vehicle_details_req,
												'quote_type' => 2
												);
												
							$this->db->set($quoteInforInsertion)->insert('tbl_vehicle_quote_details');
							if($this->db->affected_rows() > 0){
								$this->db->set('policy_number',$resCodegateway['PolicyNumber'])->where('policy_lead_no',$leadlead_id)->update( TABLE_POLICY );
								$dataPolicyinfo['status'] = true;
							} else {
								$dataPolicyinfo['status'] = false;
							}
							
							return $dataPolicyinfo;

						}

		} catch(Exception $error){

		}
	}	

}