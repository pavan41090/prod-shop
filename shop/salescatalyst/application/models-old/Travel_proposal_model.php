	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_proposal_model extends CI_Model {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Common_model');

  }


    public function quoteXmlProposal($xmlData){

    $OrderNo=trim($xmlData['OrderNo']);
    $QuoteNo=trim($xmlData['QuoteNo']);
    $selPlan=trim($xmlData['sel_plan']);


    $travel_policyType = trim($xmlData['travel_policyType']);
    $travel_typeofTrip = trim($xmlData['travel_typeofTrip']);
    //$travel_departdate = trim($xmlData['travel_departdate']);
   // $travel_returndate = trim($xmlData['travel_returndate']);
    $travel_tripduration = strtoupper(trim($xmlData['travel_tripduration']));
    $travel_covertype = strtoupper(trim($xmlData['travel_covertype']));
    $travel_traveltype = trim($xmlData['travel_traveltype']);
    $travel_geographical = trim($xmlData['travel_geographical']);
    $travel_maxpertrip = trim($xmlData['travel_maxpertrip']);
    //$tvl_pro_dob = trim($xmlData['tvl_pro_dob']);
    $travel_name = trim($xmlData['travel_name']);
    $travel_LastName = trim($xmlData['travel_LastName']);
    $travel_email = trim($xmlData['travel_email']);
    $travel_mobile = trim($xmlData['travel_mobile']);
    $travel_gender = trim($xmlData['travel_gender']);
    $ageTravel = trim($xmlData['ageTravel']);
    $tvl_pro_passport_no = trim($xmlData['tvl_pro_passport_no']);
    $tvl_pro_nname = trim($xmlData['tvl_pro_nname']);
    $tvl_pro_add1 = trim($xmlData['tvl_pro_add1']);
    $tvl_pro_add2 = trim($xmlData['tvl_pro_add2']);
    $tvl_pro_nrelation = trim($xmlData['tvl_pro_nrelation']);
    $tvl_pro_national = trim($xmlData['tvl_pro_national']);
    $travel_City = trim($xmlData['travel_City']);
    $travel_State = trim($xmlData['travel_State']);
    $tvl_pro_zip = trim($xmlData['tvl_pro_zip']);
    
    $tvl_pro_dob = str_replace('/', '-', $xmlData['tvl_pro_dob']);
    $tvl_pro_dob = date("Y-m-d", strtotime($tvl_pro_dob));

    $travel_departdate = str_replace('/', '-', $xmlData['travel_departdate']);
    $travel_departdate = date("Y-m-d", strtotime($travel_departdate));

    $travel_returndate = str_replace('/', '-', $xmlData['travel_returndate']);
    $travel_returndate = date("Y-m-d", strtotime($travel_returndate));
  
  
    $policyStartDate = date("Y-m-d");
    $policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($policyStartDate)) . " + 364 day"));
 
  $xml_post_string = '
  <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
   <soapenv:Header/>
   <soapenv:Body>
      <prov:serve>
         <prov:SessionDoc>
	<Session>
      <SessionData>
        <Index>2</Index>
        <InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
		<UserName>havaStr</UserName>
		<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
        <OrderNo>'.$OrderNo.'</OrderNo>
        <QuoteNo>'.$QuoteNo.'</QuoteNo>
        <Route>INT</Route>
        <Contract>STR</Contract>
        <ProductType>B2C</ProductType>
        <Channel></Channel>
        <TransactionType>Quote</TransactionType>
        <TransactionStatus>Fresh</TransactionStatus>

        <ID>148844185605817463105438</ID>
        <UserAgentID>2C000098</UserAgentID>
        <Source>2C000098</Source>
      </SessionData>
      <Travel>
        <TypeOfBusiness>NB</TypeOfBusiness>
        <TypeOfPolicy>'.$travel_policyType.'</TypeOfPolicy>
        <TypeOfTrip>'.$travel_typeofTrip.'</TypeOfTrip>
        <DepartureDate>'.$travel_departdate.'</DepartureDate>
        <ReturnDate>'.$travel_returndate.'</ReturnDate>
        <TripDuration>'.$travel_tripduration.'</TripDuration>
        <TypeOfCover>'.$travel_covertype.'</TypeOfCover>
        <TypeOfTavel>'.$travel_traveltype.'</TypeOfTavel>
        <MaxPerTripDuration>'.$travel_tripduration.'</MaxPerTripDuration>
        <GeographicalExtension>'.$travel_geographical.'</GeographicalExtension>
        <FamilyType>S</FamilyType>
      </Travel>
      <Quote>
        <PolicyStartDate>'.$policyStartDate.'</PolicyStartDate>
        <PolicyEndDate>'.$policyEndDate.'</PolicyEndDate>

        <AgentNumber />
        <AgentName />
        <PlanSelected>'.$selPlan.'</PlanSelected>
        <Stage />
      </Quote>
      <Client>
        <ClientType>Individual</ClientType>
        <CltDOB>'.$tvl_pro_dob.'</CltDOB>
        <GivName>'.$travel_name.'</GivName>
        <SurName>'.$travel_LastName.'</SurName>
        <EmailID>'.$travel_email.'</EmailID>
        <MobileNo>'.$travel_mobile.'</MobileNo>

        <TPClientRefNo>TRAVEL16619322373</TPClientRefNo>
        <CltSex>'.$travel_gender.'</CltSex>
        <Age>'.$ageTravel.'</Age>
        <Salut>MR</Salut>

        <Occupation />
        <CltAddr01>'.$tvl_pro_add1.'</CltAddr01>
        <CltAddr02>'.$tvl_pro_add2.'</CltAddr02>
        <CltAddr03>Near Kamlalaya Centre</CltAddr03>
        <City>'.$travel_City.'</City>
        <State>'.$travel_State.'</State>
        <PinCode>'.$tvl_pro_zip.'</PinCode>
        <MemberDetails>
        '.$this->Common_model->getmemberDetails($travel_name,$travel_gender,$travel_LastName,$tvl_pro_dob,$tvl_pro_national,$tvl_pro_nname,$tvl_pro_nrelation,$tvl_pro_passport_no).'  
          
        
        </MemberDetails>
        <Nominee>
          <Name>'.$travel_name.'</Name>
          <Age>'.$ageTravel.'</Age>
          <NomineeRelationCode>'.$tvl_pro_nrelation.'</NomineeRelationCode>
          <AppointeeName />
          <AppointeeRelationCode />
        </Nominee>
        <SportsPerson>N</SportsPerson>
        <DangerousActivity>N</DangerousActivity>
        <PreExistingIllness>N</PreExistingIllness>
      </Client>
    </Session>
	
	 
         </prov:SessionDoc>
      </prov:serve>
   </soapenv:Body>
  </soapenv:Envelope>';
    return $xml_post_string;

 }


 

}

?>