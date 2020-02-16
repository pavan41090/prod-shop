	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tw_proposal_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Common_model');

  }


    public function quoteXmlProposalTW($xmlData){

    $tw_first_name = trim($xmlData['tw_first_name']);
    $tw_last_name = trim($xmlData['tw_last_name']);
    $tw_pro_regis_date = trim($xmlData['tw_pro_regis_date']);
   
    $tw_manufacture = strtoupper(trim($xmlData['tw_manufacture']));
    $tw_carvariant = strtoupper(trim($xmlData['tw_carvariant']));
    $car_cc = trim($xmlData['car_cc']);
    $car_seating = trim($xmlData['car_seating']);
    $car_fuel = trim($xmlData['car_fuel']);

    $split = explode('-', $tw_carvariant);
    $vModal = $split[0];
    $vVariant = $split[1];
   
   
    $tw_idvamount = trim($xmlData['tw_idvamount']);

    $tw_pro_engine_num = trim($xmlData['tw_pro_engine_num']);
    $tw_pro_chasis_num = trim($xmlData['tw_pro_chasis_num']);
    $tw_registration = trim($xmlData['tw_registration']);

    $tw_reg_city = trim($xmlData['tw_reg_city']);
    $tw_amount = trim($xmlData['tw_amount']);
    $tw_year = trim($xmlData['tw_year']);
    $tw_claimtwo = trim($xmlData['tw_claimtwo']);
    $tw_ncbtwo =trim($xmlData['tw_ncbtwo']);

    $tw_pro_new_policy_start = trim($xmlData['tw_pro_new_policy_start']);
    $tw_clientType = trim($xmlData['tw_clientType']);
    $tw_dob = trim($xmlData['tw_dob']);
    $tw_first_name = trim($xmlData['tw_first_name']);
    $tw_reg_city = trim($xmlData['tw_reg_city']);
    $tw_email = trim($xmlData['tw_email']);
    $tw_mobile = trim($xmlData['tw_mobile']);
    

    $tw_pro_emergency = trim($xmlData['tw_pro_emergency']);
    $tw_last_name = trim($xmlData['tw_last_name']);
    $tw_pro_gender = trim($xmlData['tw_pro_gender']);
    $tw_pro_material = trim($xmlData['tw_pro_material']);
    $tw_zip = trim($xmlData['tw_zip']);
    $tw_pro_occupation = trim($xmlData['tw_pro_occupation']);
    $tw_pro_add1 = trim($xmlData['tw_pro_add1']);
    $tw_pro_add2 = trim($xmlData['tw_pro_add2']);
    $carState=trim($xmlData['tw_city']);

    $tw_pro_nname = trim($xmlData['tw_pro_nname']);
    $tw_pro_nage = trim($xmlData['tw_pro_nage']);
    $tw_pro_nomie_relation = trim($xmlData['tw_pro_nomie_relation']);
    $tw_pro_appoint_relation=trim($xmlData['tw_pro_appoint_relation']);

    
    $orderNo = trim($xmlData['orderNo']);
    $quoteNo =trim($xmlData['quoteNo']);



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
      <OrderNo>'.$orderNo.'</OrderNo>
      <QuoteNo>'.$quoteNo.'</QuoteNo>
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
    <tns:DateOfRegistration>' .date('Y-m-d',strtotime($tw_pro_regis_date)).'00:00:00.000</tns:DateOfRegistration>
    <tns:RiskType>FTW</tns:RiskType>
    <tns:Make>'.$tw_manufacture.'</tns:Make>
    <tns:Model>'.$vModal.'</tns:Model>
    <tns:FuelType>'.$car_fuel.'</tns:FuelType>
    <tns:Variant>'.$vVariant.'</tns:Variant>
    <tns:IDV>'.$tw_idvamount.'</tns:IDV>
    <tns:EngineNo>'.$tw_pro_engine_num.'</tns:EngineNo>
    <tns:ChasisNo>'. $tw_pro_chasis_num.'</tns:ChasisNo>
    <tns:DriveExperiance />
    <tns:NoOfDrivers />
    <tns:ParkingType />
    <tns:AnnualMileage />
    <tns:YoungestDriverAge />
    <tns:PaidDriver />
    <tns:VehicleAge>6</tns:VehicleAge>
    <tns:CC>'.$car_cc.'</tns:CC>
    <tns:PlaceOfRegistration>'.$tw_reg_city.'</tns:PlaceOfRegistration>
    <tns:SeatingCapacity>'.$car_seating.'</tns:SeatingCapacity>
    <tns:VehicleExtraTag01 />
      <tns:RegistrationNo>'.$tw_registration.'</tns:RegistrationNo>
      <tns:ExShowroomPrice>'. $tw_amount.'</tns:ExShowroomPrice>
      <tns:DateOfManufacture>' .date('Y',strtotime($tw_year)).'-04-01T00:00:00.000</tns:DateOfManufacture>
  </tns:Vehicle>
  <tns:Quote xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
    <tns:ExistingPolicy>
        <tns:Claims>'.$tw_claimtwo.'</tns:Claims>
        <tns:PolicyType>Comprehensive</tns:PolicyType>
      <tns:EndDate />
        <tns:NCB>'.$tw_ncbtwo.'</tns:NCB>
      <tns:PolicyNo />
      <tns:InsuranceCompany />
    </tns:ExistingPolicy>
    <tns:PolicyStartDate>' .date('Y-m-d',strtotime($tw_pro_new_policy_start)).'T00:00:00.000</tns:PolicyStartDate>
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
     <tns:PolicyEndDate>' .date('Y-m-d', strtotime('+1 year', strtotime($tw_pro_new_policy_start))).'T23:59:59.000</tns:PolicyEndDate>
  </tns:Quote>
  <tns:Client xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
    <tns:ClientType>'.$tw_clientType.'</tns:ClientType>
    <tns:CltDOB>' .date('Ymd',strtotime($tw_dob)).'</tns:CltDOB>
    <tns:FinancierDetails>
      <tns:IsFinanced>0</tns:IsFinanced>
      <tns:InstitutionName />
      <tns:InstitutionCity />
    </tns:FinancierDetails>
    <tns:GivName>'.$tw_first_name.'</tns:GivName>
    <tns:ClientExtraTag01>KARNATAKA</tns:ClientExtraTag01>
    <tns:CityOfResidence>SHIMOGA</tns:CityOfResidence>
    <tns:EmailID>'. $tw_email.'</tns:EmailID>
    <tns:MobileNo>'.$tw_mobile.'</tns:MobileNo>
    <tns:LandLineNo>'.$tw_mobile.'</tns:LandLineNo>
    <tns:SurName>H V</tns:SurName>
    <tns:CltSex>M</tns:CltSex>
    <tns:Marryd>S</tns:Marryd>
    <tns:Occupation>0005</tns:Occupation>
    <tns:CltAddr01>'.$tw_pro_add1.'</tns:CltAddr01>
    <tns:CltAddr02>'.$tw_pro_add2.'</tns:CltAddr02>
    <tns:CltAddr03>SLN</tns:CltAddr03>
    <tns:City>Shimoga</tns:City>
    <tns:State>KARNATAKA</tns:State>
    <tns:PinCode>'.$tw_zip.'</tns:PinCode>
    <tns:Nominee>
      <tns:Name>'.$tw_pro_nname.'</tns:Name>
      <tns:Age>'.$tw_pro_nage.'</tns:Age>
      <tns:Relationship>'.$tw_pro_nomie_relation.'</tns:Relationship>
      <tns:Appointee />
      <tns:AppointeeRelation>'.$tw_pro_appoint_relation.'</tns:AppointeeRelation>
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
    </soapenv:Envelope>';



//   $xml_post_string = '
//   <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
//   <soapenv:Header/>
//   <soapenv:Body>
//     <prov:serve>
//       <prov:SessionDoc>
// <Session>
//   <SessionData xmlns="http://schemas.cordys.com/bagi/b2c/emotor/bpm/1.0">
//     <Index>2</Index>
//     <InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
//     <UserName>havaMtr</UserName>
//     <Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
//     <OrderNo>'.$orderNo.'</OrderNo>
//     <QuoteNo>'.$quoteNo.'</QuoteNo>
//     <Route>INT</Route>
//     <Contract>MTR</Contract>
//     <Channel></Channel>
//     <TransactionType>Quote</TransactionType>
//     <TransactionStatus>Fresh</TransactionStatus>
//     <ID>150528210235817060626908</ID>
//     <UserAgentID>2C000002</UserAgentID>
//     <Source>2C000002</Source>
//     <IsCCUser>N</IsCCUser>
//   </SessionData>
//   <tns:Vehicle xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
//     <tns:TypeOfBusiness>NB</tns:TypeOfBusiness>
//     <tns:AccessoryInsured>N</tns:AccessoryInsured>
//     <tns:AccessoryValue>0</tns:AccessoryValue>
//     <tns:AntiTheftDevice>N</tns:AntiTheftDevice>
//     <tns:BiFuelKit>
//       <tns:IsBiFuelKit>N</tns:IsBiFuelKit>
//       <tns:BiFuelKitValue>0</tns:BiFuelKitValue>
//       <tns:ExternallyFitted>N</tns:ExternallyFitted>
//     </tns:BiFuelKit>
//     <tns:DateOfRegistration>' .date('Y-m-d',strtotime($tw_pro_regis_date)).'00:00:00.000</tns:DateOfRegistration>
//     <tns:RiskType>FTW</tns:RiskType>
//     <tns:Make>'.$tw_manufacture.'</tns:Make>
//     <tns:Model>'.$vModal.'</tns:Model>
//     <tns:FuelType>'.$car_fuel.'</tns:FuelType>
//     <tns:Variant>'.$vVariant.'</tns:Variant>
//     <tns:IDV>'.$tw_idvamount.'</tns:IDV>
//     <tns:EngineNo>'.$tw_pro_engine_num.'</tns:EngineNo>
//     <tns:ChasisNo>'. $tw_pro_chasis_num.'</tns:ChasisNo>
//     <tns:DriveExperiance />
//     <tns:NoOfDrivers />
//     <tns:ParkingType />
//     <tns:AnnualMileage />
//     <tns:YoungestDriverAge />
//     <tns:PaidDriver />
//     <tns:VehicleAge>6</tns:VehicleAge>
//     <tns:CC>'.$car_cc.'</tns:CC>
//     <tns:PlaceOfRegistration>'.$tw_reg_city.'</tns:PlaceOfRegistration>
//     <tns:SeatingCapacity>'.$car_seating.'</tns:SeatingCapacity>
//     <tns:VehicleExtraTag01 />
//     <tns:RegistrationNo>'.$tw_registration.'</tns:RegistrationNo>
//     <tns:ExShowroomPrice>'. $tw_amount.'</tns:ExShowroomPrice>
//     <tns:DateOfManufacture>' .date('Y',strtotime($tw_year)).'-04-01T00:00:00.000</tns:DateOfManufacture>
//   </tns:Vehicle>
//   <tns:Quote xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
//     <tns:ExistingPolicy>
//       <tns:Claims>'.$tw_claimtwo.'</tns:Claims>
//       <tns:PolicyType>Comprehensive</tns:PolicyType>
//       <tns:EndDate />
//       <tns:NCB>'.$tw_ncbtwo.'</tns:NCB>
//       <tns:PolicyNo />
//       <tns:InsuranceCompany />
//     </tns:ExistingPolicy>
//     <tns:PolicyStartDate>' .date('Y-m-d',strtotime($tw_pro_new_policy_start)).'T00:00:00.000</tns:PolicyStartDate>
//     <tns:Deductible>0</tns:Deductible>
//     <tns:PAFamilySI>0</tns:PAFamilySI>
//     <tns:AgentNumber>2C000002</tns:AgentNumber>
//     <tns:DealerId></tns:DealerId>
//     <tns:Premium>
//       <tns:Discount />
//     </tns:Premium>
//     <tns:SelectedCovers>
//       <tns:CarDamageSelected>true</tns:CarDamageSelected>
//       <tns:TPLiabilitySelected>true</tns:TPLiabilitySelected>
//       <tns:PADriverSelected>true</tns:PADriverSelected>
//       <tns:ZeroDepriciationSelected>true</tns:ZeroDepriciationSelected>
//       <tns:RoadsideAssistanceSelected>true</tns:RoadsideAssistanceSelected>
//       <tns:InvoicePriceSelected>false</tns:InvoicePriceSelected>
//       <tns:InvoicePriceCoverAmount />
//       <tns:PAFamilyPremiumSelected>false</tns:PAFamilyPremiumSelected>
//       <tns:HospitalCashSelected>false</tns:HospitalCashSelected>
//       <tns:MedicalExpensesSelected>false</tns:MedicalExpensesSelected>
//       <tns:AmbulanceChargesSelected>false</tns:AmbulanceChargesSelected>
//       <tns:CosumableCoverSelected>false</tns:CosumableCoverSelected>
//       <tns:HydrostaticLockSelected>false</tns:HydrostaticLockSelected>
//       <tns:KeyReplacementSelected>false</tns:KeyReplacementSelected>
//       <tns:NoClaimBonusSameSlabSelected>false</tns:NoClaimBonusSameSlabSelected>
//       <tns:EngineGearBoxProtectionSelected>false</tns:EngineGearBoxProtectionSelected>
//     </tns:SelectedCovers>
//     <tns:PolicyEndDate>' .date('Y-m-d', strtotime('+1 year', strtotime($tw_pro_new_policy_start))).'T23:59:59.000</tns:PolicyEndDate>
//   </tns:Quote>
//   <tns:Client xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
//     <tns:ClientType>'.$tw_clientType.'</tns:ClientType>
//     <tns:CltDOB>' .date('Ymd',strtotime($tw_dob)).'</tns:CltDOB>
//     <tns:FinancierDetails>
//       <tns:IsFinanced>0</tns:IsFinanced>
//       <tns:InstitutionName />
//       <tns:InstitutionCity />
//     </tns:FinancierDetails>
//     <tns:GivName>'.$tw_first_name.'</tns:GivName>
//     <tns:ClientExtraTag01>'.$carState.'</tns:ClientExtraTag01>
//     <tns:CityOfResidence>'.$tw_reg_city.'</tns:CityOfResidence>
//     <tns:EmailID>'. $tw_email.'</tns:EmailID>
//     <tns:MobileNo>'.$tw_mobile.'</tns:MobileNo>
//     <tns:LandLineNo>'.$tw_pro_emergency.'</tns:LandLineNo>
//     <tns:SurName>H V</tns:SurName>
//     <tns:CltSex>'.$tw_pro_gender.'</tns:CltSex>
//     <tns:Marryd>'.$tw_pro_material.'</tns:Marryd>
//     <tns:Occupation>'.$tw_pro_occupation.'</tns:Occupation>
//     <tns:CltAddr01>'.$tw_pro_add1.'</tns:CltAddr01>
//     <tns:CltAddr02>'.$tw_pro_add2.'</tns:CltAddr02>
//     <tns:CltAddr03>SLN</tns:CltAddr03>
//     <tns:City>'.$tw_reg_city.'</tns:City>
//     <tns:State>'.$carState.'</tns:State>
//     <tns:PinCode>'.$tw_zip.'</tns:PinCode>
//     <tns:Nominee>
//       <tns:Name>'.$tw_pro_nname.'</tns:Name>
//       <tns:Age>'.$tw_pro_nage.'</tns:Age>
//       <tns:Relationship>'.$tw_pro_nomie_relation.'</tns:Relationship>
//       <tns:Appointee />
//       <tns:AppointeeRelation>'.$tw_pro_appoint_relation.'</tns:AppointeeRelation>
//     </tns:Nominee>
//     <tns:RegistrationZone>B</tns:RegistrationZone>
//     <GstinNo />
//   </tns:Client>
//   <Payment>
//     <PaymentMode />
//     <PaymentType />
//     <TxnReferenceNo />
//     <TxnAmount />
//     <TxnDate />
//     <BankCode />
//     <InstrumentAmount />
//   </Payment>
// </Session>
//           </prov:SessionDoc>
//         </prov:serve>
//       </soapenv:Body>
//     </soapenv:Envelope>';






    return $xml_post_string;






 }


}

?>