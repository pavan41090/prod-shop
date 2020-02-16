<?php

ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Getquote extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		error_reporting(0);
		$userLogin = $this->session->userdata('logged_in');
		date_default_timezone_set('Asia/Kolkata');
		if (empty($userLogin)) {
			redirect(base_url(),'refresh');
		}
	}

	public function index(){
		if($this->session->userdata('logged_in') == TRUE) {
			
			$this->data['city'] = $this->Common_model->getCityList();
	   		$str = file_get_contents(APPPATH.'../assets/json/model-make.json');
	      
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
			$this->data['PriorityArray'] = $this->Common_model->getPriority();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();

            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['languageArray'] = $this->Common_model->language();
            
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();
            
            $this->data['sdateArray'] = $this->Common_model->sdate();
     		$this->data['businessArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();
     		$this->data['userDetails'] = $this->User_model->getLoginDetails();

            $this->data['module'] = 'leads';

			$this->data['sub_module'] = 'Two Wheeler'; 

			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	
			            
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_two_wheeler-get-cote',$this->data);
			$this->load->view('layout/footer_inner');
		}
	}

	public function getquotedata(){
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			
			$inputPost = $this->input->post();
			$preinspectionscenario = 1;
			$toDate = date('Y-m-d');
			
			$myDateTime = DateTime::createFromFormat('d/m/Y', $inputPost['vehivledoreg']);
			$RegisterDatenew = $myDateTime->format('Y-m-d');
			
			$vehiclepolicytenure 	= 		$inputPost['vehicleIdv'];
			$vehicleRegisterNumber 	= 		$inputPost['vehicleNumber'];
			$ManfactureDate 		= 		$inputPost['vehicledoman'];
			$PlaceOfRegistration 	= 		$inputPost['vehiclecityreg'];
			$vehivlerisktype		=		$inputPost['vehivlerisktype'];
			$vehiclecc				=		$inputPost['vehiclecc'];
			$vehiclechasisnuber		=		$inputPost['vehiclechasisnuber'];
			$thismake				= 		$inputPost['vehiclemake'];
			$vehicleModel			= 		$inputPost['changemodelname'];
			$vehiclefueltype		=		$inputPost['vehiclefueltype'];
			$vehiclevariant			=		$inputPost['vehiclevariant'];
			$vehicleIdv				=		$inputPost['vehicleIdv'];
			$seatingCapacty			=		$inputPost['seatingCapacty'];
			$vehicleAge				=		$inputPost['vehicleAge'];
			$vehicleshowrmpice		=		$inputPost['vehicleshowrmpice'];
			$lmscartenure 			= 		$inputPost['vehicletenure'];
			$PreviousChecker 		= 		$inputPost['PreviousChecker'];
			$vehiclestate			=		$inputPost['vehiclestate'];
			$this->validaLicency 	= 		$inputPost['vehiclevallidlicency'];

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
			$lmscarexistingpapolicy		= 	$inputPost['lmscarexistingpapolicy'];
			$thisdatePolicyStartDate 	= 	$datePolicyStartDate;

			if($lmscarexistingpapolicy > 0){
				$padeclarationv = 'true';
				$paderivedClass = 'YES';//'NO';
				$isexisstingPAA = 'true';//'NO';
			} else {
				$padeclarationv = 'false';
				$paderivedClass = 'NO';//'YES';
				$isexisstingPAA = 'false';//'NO';
			}
			$this->PADriverSelected = $padeclarationv;
			$this->isexisstingPAA = $isexisstingPAA;
			$this->ispaderivedClass = $paderivedClass;
			$vehiclencbval 			= 		$inputPost['vehiclencbval'];

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
				<DateOfRegistration>".$RegisterDatenew."T00:00:00</DateOfRegistration>
				<DateOfManufacture>".$ManfactureDate."-01-01T00:00:00</DateOfManufacture>
				<RiskType>".$vehicleRiskTyppe."</RiskType>
				<Make>".$thismake."</Make>
				<Model>".$vehicleModel."</Model>
				<FuelType>".$vehiclefueltype."</FuelType>
				<Variant>".$vehiclevariant."</Variant>
				<IDV>".$vehicleIdv."</IDV>
				<VehicleAge>".($vehicleAge == 0 ? (date('Y')-$ManfactureDate) : $vehicleAge)."</VehicleAge>
				<CC>".$vehiclecc."</CC>
				<PlaceOfRegistration>".$PlaceOfRegistration."</PlaceOfRegistration>
				<SeatingCapacity>".$seatingCapacty."</SeatingCapacity>
				<VehicleExtraTag01>".$seatingCapacty."</VehicleExtraTag01>
				<RegistrationNo>".$vehicleRegisterNumber."</RegistrationNo>
				<ExShowroomPrice>".$vehicleshowrmpice."</ExShowroomPrice>
				</Vehicle>
				<Quote xmlns:tns=\"http://schemas.cordys.com/bagi/b2c/emotor/2.0\">
				<ExistingPolicy>
				<Claims>0</Claims>
				<PolicyType>Comprehensive</PolicyType>
				<EndDate>".date('Y-m-d').'T00:00:00.000'."</EndDate>
				<NCB>".$vehiclencbval."</NCB>
				</ExistingPolicy>
				<PolicyStartDate>".$thisdatePolicyStartDate."</PolicyStartDate>
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
				<PAFamilyPremiumSelected>False</PAFamilyPremiumSelected>
				</SelectedCovers>
				<PolicyEndDate>".date('Y-m-d', strtotime('+ 1 year -1 days', strtotime($thisdatePolicyStartDate))).'T23:59:59.000'."</PolicyEndDate>";
				//".$this->ZeroDepriciationSelected."
				if($vehiclepolicytenure > 1){
				$quotexml .= "<PolicyTenure>".$vehiclepolicytenure."</PolicyTenure>";
				}
				if($this->validaLicency >0){
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
				<CltDOB>00000000</CltDOB>
				<FinancierDetails>
				<IsFinanced>0</IsFinanced>
				</FinancierDetails>
				 <GivName>firstname-surname</GivName>
				<SurName />
				<ClientExtraTag01>".$vehiclestate."</ClientExtraTag01>
				<CityOfResidence>".$PlaceOfRegistration."</CityOfResidence>
				<EmailID>sample@gmail.com</EmailID>
				<MobileNo>9999999999</MobileNo>
				<RegistrationZone>B</RegistrationZone>
				<IsDrviningLicencePresent>Y</IsDrviningLicencePresent>
				</Client>
				</Session></SessionDoc>
				</serve>
				</Body>
				</Envelope>";
				$file_namep = 'assets/uploads/calculation.json';

				file_put_contents($file_namep, $quotexml);
				chmod($file_namep, 0777);
				$response = $this->TwoWheeler_model->__getCreatCall(FLASH_API_CALL,$quotexml);
				$error_response['message'] = $this->TwoWheeler_model->__callgetReadxmlQuoteData($response);
				$error_response['status'] = true;

		} else {
			$error_response['status'] = false;
		}
		echo json_encode($error_response);
	}

}

?>
