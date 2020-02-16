	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_proposal_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Common_model');

  }


    public function quoteXmlProposal($xmlData){

    $OrderNo=trim($xmlData['OrderNo']);
    $QuoteNo=trim($xmlData['QuoteNo']);

    $car_first_name = trim($xmlData['car_first_name']);
    $car_last_name = trim($xmlData['car_last_name']);
    $car_pro_regis_date = trim($xmlData['car_pro_regis_date']);
   
    $car_manufacture = strtoupper(trim($xmlData['car_menufacture']));
    $car_carvariant = strtoupper(trim($xmlData['car_vary']));
    $car_cc = trim($xmlData['carCc']);
    $car_seating = trim($xmlData['car_seating']);
    $car_fuel = trim($xmlData['carFuel']);

    $split = explode('-', $car_carvariant);
    $vModal = $split[0];
    $vVariant = $split[1];
   
   
    $car_idvamount = trim($xmlData['idvamount']);

    $car_pro_engine_num = trim($xmlData['car_pro_engine_num']);
    $car_pro_chasis_num = trim($xmlData['car_pro_chasis_num']);
    $car_registration = trim($xmlData['car_rg_no']);

    
    $car_amount = trim($xmlData['caramount']);
    //$car_year = trim($xmlData['car_year']);
    $car_claim = trim($xmlData['claim_policy']);
    $car_ncb =trim($xmlData['ncbcar']);

    $car_pro_new_policy_start = trim($xmlData['car_pro_new_policy_start']);
    $car_clientType = trim($xmlData['client_type']);
    $car_dob = trim($xmlData['car_dob']);
    $car_first_name = trim($xmlData['car_first_name']);
    $car_reg_city = trim($xmlData['car_reg_city']);
    $car_reg_state = trim($xmlData['car_reg_state']);

    $car_city = trim($xmlData['car_city']);
    $car_state = trim($xmlData['car_state']);
    $car_email = trim($xmlData['car_email']);
    $car_mobile = trim($xmlData['car_mobile']);
    

    $car_pro_emergency = trim($xmlData['car_pro_emergency']);
    $car_last_name = trim($xmlData['car_last_name']);
    $car_pro_gender = trim($xmlData['car_pro_gender']);
    $car_pro_material = trim($xmlData['car_pro_material']);
    $car_zip = trim($xmlData['car_pro_zip']);
    $car_pro_occupation = trim($xmlData['car_pro_occupation']);
    $car_pro_add1 = trim($xmlData['car_pro_add1']);
    $car_pro_add2 = trim($xmlData['car_pro_add2']);
    

    $car_pro_nname = trim($xmlData['car_pro_nname']);
    $car_pro_nage = trim($xmlData['car_pro_nage']);
    $car_pro_nomie_relation = trim($xmlData['car_pro_nomie_relation']);
    $car_pro_appoint_relation=trim($xmlData['car_pro_appoint_relation']);

    // $tvl_pro_dob = str_replace('/', '-', $xmlData['tvl_pro_dob']);
    // $tvl_pro_dob = date("Y-m-d", strtotime($tvl_pro_dob));

    // $travel_departdate = str_replace('/', '-', $xmlData['travel_departdate']);
    // $travel_departdate = date("Y-m-d", strtotime($travel_departdate));

    // $travel_returndate = str_replace('/', '-', $xmlData['travel_returndate']);
    // $travel_returndate = date("Y-m-d", strtotime($travel_returndate));
  
  
//$travel_departdate = trim($xmlData['travel_departdate']);
 //$travel_returndate = trim($xmlData['travel_returndate']);
 
  $xml_post_string = '
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
  <soapenv:Header/>
  <soapenv:Body>
    <prov:serve>
      <prov:SessionDoc>
<Session>
  <SessionData xmlns="http://schemas.cordys.com/bagi/b2c/emotor/bpm/1.0">
    <Index>2</Index>
    <InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
    <UserName>havaMtr</UserName>
    <Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
    <OrderNo>'.$OrderNo.'</OrderNo>
    <QuoteNo>'.$QuoteNo.'</QuoteNo>
    <Route>INT</Route>
    <Contract>MTR</Contract>
    <Channel></Channel>
    <TransactionType>Quote</TransactionType>
    <TransactionStatus>Fresh</TransactionStatus>
    <ID>150528210235817060626908</ID>
    <UserAgentID>2C000002</UserAgentID>
    <Source>2C000002</Source>
    <IsCCUser>N</IsCCUser>
  </SessionData>
  <tns:Vehicle xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
    <tns:TypeOfBusiness>NB</tns:TypeOfBusiness>
    <tns:AccessoryInsured>N</tns:AccessoryInsured>
    <tns:AccessoryValue>0</tns:AccessoryValue>
    <tns:AntiTheftDevice>N</tns:AntiTheftDevice>
    <tns:BiFuelKit>
      <tns:IsBiFuelKit>N</tns:IsBiFuelKit>
      <tns:BiFuelKitValue>0</tns:BiFuelKitValue>
      <tns:ExternallyFitted>N</tns:ExternallyFitted>
    </tns:BiFuelKit>
    <tns:DateOfRegistration>' .date('Y-m-d',strtotime($car_pro_regis_date)).'T00:00:00.000</tns:DateOfRegistration>
    <tns:RiskType>FPV</tns:RiskType>
    <tns:Make>'.$car_manufacture.'</tns:Make>
    <tns:Model>'.$vModal.'</tns:Model>
    <tns:FuelType>'.$car_fuel.'</tns:FuelType>
    <tns:Variant>'.$vVariant.'</tns:Variant>
    <tns:IDV>'.$car_idvamount.'</tns:IDV>
    <tns:EngineNo>'.$car_pro_engine_num.'</tns:EngineNo>
    <tns:ChasisNo>'.$car_pro_chasis_num.'</tns:ChasisNo>
    <tns:DriveExperiance />
    <tns:NoOfDrivers />
    <tns:ParkingType />
    <tns:AnnualMileage />
    <tns:YoungestDriverAge />
    <tns:PaidDriver />
    <tns:VehicleAge>6</tns:VehicleAge>
    <tns:CC>'.$car_cc.'</tns:CC>
    <tns:PlaceOfRegistration>'.$car_reg_city.'</tns:PlaceOfRegistration>
    <tns:SeatingCapacity>'.$car_seating.'</tns:SeatingCapacity>
    <tns:VehicleExtraTag01 />
    <tns:RegistrationNo>'.$car_registration.'</tns:RegistrationNo>
    <tns:ExShowroomPrice>'.$car_amount.'</tns:ExShowroomPrice>
    <tns:DateOfManufacture>2012-04-01T00:00:00.000</tns:DateOfManufacture>
  </tns:Vehicle>
  <tns:Quote xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
    <tns:ExistingPolicy>
      <tns:Claims>'.$car_claim .'</tns:Claims>
      <tns:PolicyType>Comprehensive</tns:PolicyType>
      <tns:EndDate />
      <tns:NCB>'.$car_ncb.'</tns:NCB>
      <tns:PolicyNo />
      <tns:InsuranceCompany />
    </tns:ExistingPolicy>
    <tns:PolicyStartDate>' .date('Y-m-d',strtotime($car_pro_new_policy_start)).'T23:59:59.000</tns:PolicyStartDate>
    <tns:Deductible>0</tns:Deductible>
    <tns:PAFamilySI>0</tns:PAFamilySI>
    <tns:AgentNumber>2C000002</tns:AgentNumber>
    <tns:DealerId></tns:DealerId>
    <tns:Premium>
      <tns:Discount />
    </tns:Premium>
    <tns:SelectedCovers>
      <tns:CarDamageSelected>true</tns:CarDamageSelected>
      <tns:TPLiabilitySelected>true</tns:TPLiabilitySelected>
      <tns:PADriverSelected>true</tns:PADriverSelected>
      <tns:ZeroDepriciationSelected>true</tns:ZeroDepriciationSelected>
      <tns:RoadsideAssistanceSelected>true</tns:RoadsideAssistanceSelected>
      <tns:InvoicePriceSelected>false</tns:InvoicePriceSelected>
      <tns:InvoicePriceCoverAmount />
      <tns:PAFamilyPremiumSelected>false</tns:PAFamilyPremiumSelected>
      <tns:HospitalCashSelected>false</tns:HospitalCashSelected>
      <tns:MedicalExpensesSelected>false</tns:MedicalExpensesSelected>
      <tns:AmbulanceChargesSelected>false</tns:AmbulanceChargesSelected>
      <tns:CosumableCoverSelected>false</tns:CosumableCoverSelected>
      <tns:HydrostaticLockSelected>false</tns:HydrostaticLockSelected>
      <tns:KeyReplacementSelected>false</tns:KeyReplacementSelected>
      <tns:NoClaimBonusSameSlabSelected>false</tns:NoClaimBonusSameSlabSelected>
      <tns:EngineGearBoxProtectionSelected>false</tns:EngineGearBoxProtectionSelected>
    </tns:SelectedCovers>
    <tns:PolicyEndDate>' .date('Y-m-d', strtotime('+1 year', strtotime($car_pro_regis_date))).'T23:59:59.000</tns:PolicyEndDate>
  </tns:Quote>
  <tns:Client xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
    <tns:ClientType>Individual</tns:ClientType>
    <tns:CltDOB>' .date('Ymd',strtotime($car_dob)).'</tns:CltDOB>
    <tns:FinancierDetails>
      <tns:IsFinanced>0</tns:IsFinanced>
      <tns:InstitutionName />
      <tns:InstitutionCity />
    </tns:FinancierDetails>
    <tns:GivName>'.$car_first_name.'</tns:GivName>
    <tns:ClientExtraTag01>'.$car_reg_state.'</tns:ClientExtraTag01>
    <tns:CityOfResidence>'.$car_reg_city.'</tns:CityOfResidence>
    <tns:EmailID>'.$car_email.'</tns:EmailID>
    <tns:MobileNo>'.$car_mobile.'</tns:MobileNo>
    <tns:LandLineNo>'.$car_pro_emergency.'</tns:LandLineNo>
    <tns:SurName>'.$car_last_name.' V</tns:SurName>
    <tns:CltSex>'.$car_pro_gender.'</tns:CltSex>
    <tns:Marryd>'.$car_pro_material.'</tns:Marryd>
    <tns:Occupation>'.$car_pro_occupation.'</tns:Occupation>
    <tns:CltAddr01>'.$car_pro_add1.'</tns:CltAddr01>
    <tns:CltAddr02>'.$car_pro_add2.'</tns:CltAddr02>
    <tns:CltAddr03>SLN</tns:CltAddr03>
    <tns:City>'.$car_city.'</tns:City>
    <tns:State>'.$car_state.'</tns:State>
    <tns:PinCode>'.$car_zip.'</tns:PinCode>
    <tns:Nominee>
      <tns:Name>'.$car_pro_nname.'</tns:Name>
      <tns:Age>'.$car_pro_nage.'</tns:Age>
      <tns:Relationship>'.$car_pro_nomie_relation.'</tns:Relationship>
      <tns:Appointee />
      <tns:AppointeeRelation>'.$car_pro_appoint_relation.'</tns:AppointeeRelation>
    </tns:Nominee>
    <tns:RegistrationZone>B</tns:RegistrationZone>
    <GstinNo />
  </tns:Client>
  <Payment>
    <PaymentMode />
    <PaymentType />
    <TxnReferenceNo />
    <TxnAmount />
    <TxnDate />
    <BankCode />
    <InstrumentAmount />
  </Payment>
</Session>
          </prov:SessionDoc>
        </prov:serve>
      </soapenv:Body>
    </soapenv:Envelope>
  
';
    return $xml_post_string;

 }


}

?>