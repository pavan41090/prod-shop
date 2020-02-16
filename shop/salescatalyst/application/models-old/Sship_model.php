<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sship_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateQuoteXmlsship($xmlData){

   


		$sship_FirstName = trim($xmlData['sship_FirstName']);
		$sship_LastName = trim($xmlData['sship_LastName']);
		$sship_mx_DOB = date('Y-m-d',strtotime($xmlData['sship_mx_DOB']));
		$ship_mx_State = trim($xmlData['ship_mx_State']);
		$ship_mx_City = trim($xmlData['ship_mx_City']);
		$emailsupership = trim($xmlData['emailsupership']);
		$mobilesupership = $xmlData['mobilesupership'];
		$sship_mx_Zip = $xmlData['sship_mx_Zip'];

    $sship_income = round($xmlData['sship_income']);
    $policyterm = round($xmlData['policyterm']);
    
    //$Spouse_ship = $xmlData['Spouse_ship'];
    $spousedobship = $xmlData['spousedobship'];
    $includechildren = date('Y-m-d',strtotime($xmlData['includechildren']));


        $include_spouse = $xmlData['Spouse_ship'];
        $familyType = 'S';  
        if($include_spouse == 1){
          $familyType = 'ss'; 
        }


    $policyStartDate = date("Y-m-d");
    $policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($policyStartDate)) . " + 364 day"));

$currentIp = $this->Common_model->get_ip();

		
		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '
		<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
			<soapenv:Header/>
			<soapenv:Body>
				<prov:serve>
					<prov:SessionDoc>
						
  <Session>
        <SessionData>
          <Index>1</Index>
          <InitTime>' . gmdate('D, d M Y H:i:s') . 'GMT</InitTime>
				<UserName>havaEhl</UserName>
				<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
          <QuoteNo>NA</QuoteNo>
          <OrderNo>NA</OrderNo>
          <Route>INT</Route>
          <Contract>EHL</Contract>
          <Channel>bagiMas</Channel>
          <TransactionType>Quote</TransactionType>
          <TransactionStatus>Fresh</TransactionStatus>
          <ID>150174428096517961205884</ID>
          <UserAgentID>2C000026</UserAgentID>
          <Source>2C000026</Source>
          <ExtraTag01 />
          <ExtraTag02 />
          <ExtraTag03 />
          <ExtraTag04 />
          <ExtraTag05 />
          <UserRole>MASAgent</UserRole>
        </SessionData>
        <Quote>
          <AgentNumber />
          <DealerId />
          <Stage>1</Stage>
          <PolicyStartDate>'.$policyStartDate.'T00:00:00.000</PolicyStartDate>
          <PolicyEndDate>'.$policyEndDate.'T23:59:59.000</PolicyEndDate>
          <PolicyTerm>'.$policyterm.'</PolicyTerm>
          <FamilyType>'.$familyType.'</FamilyType>
          <TypeOfBusiness>NB</TypeOfBusiness>
          <RiskType />
          <SumInsured>500000</SumInsured>
          <ProductCode>VSS</ProductCode>
          <ExistingPolicy>
            <Name />
            <PolicyType />
            <PolicyNo />
            <Claims>0</Claims>
            <NCB>0</NCB>
            <InsuranceCompany />
            <SumInsured>0</SumInsured>
            <InceptionDate />
            <ExpiryDate />
            <AgentNumber />
            <DealerId />
          </ExistingPolicy>
          <ExistingPolicyDetails />
          <MailQuote />
          <RateType>G</RateType>
          <QuoteExtraTag01 />
          <QuoteExtraTag02 />
          <QuoteExtraTag03 />
          <QuoteExtraTag04 />
          <QuoteExtraTag05 />
          <QuoteExtraTag06 />
          <QuoteExtraTag07 />
          <QuoteExtraTag08 />
          <QuoteExtraTag09 />
          <QuoteExtraTag10 />
          <SelectedAddons />
          <AgentRemarks />
          <QuoteReferral />
          <UWriterRemarks />
          <ReferralReasons />
          <UWLoading />
        </Quote>
        <Client>
          <CityOfResidence>'.$ship_mx_City.'</CityOfResidence>
          <ClientType>Individual</ClientType>
          <SurName />
          <GivName>'.$sship_FirstName.'</GivName>
          <Salut />
          <CltDOB>'.$sship_mx_DOB.'</CltDOB>
          <CltSex />
          <Marryd>M</Marryd>
          <CltAddr01 />
          <CltAddr02 />
          <CltAddr03 />
          <City>'.$ship_mx_City.'</City>
          <State>'.$ship_mx_State.'</State>
          <PinCode />
          <MobileNo>'.$mobilesupership.'</MobileNo>
          <LandLineNo />
          <Occupation />
          <EmailID>'.$emailsupership.'</EmailID>
          <TPClientRefNo>BAGI'.date('Ymd').time().'</TPClientRefNo>
          <MonthlyIncome>0</MonthlyIncome>
          <AnnualIncome>'.$sship_income.'</AnnualIncome>
          <LoanEMI>0</LoanEMI>
          <Investments>0</Investments>
          <Childrenfees>0</Childrenfees>
          <UtilityPayments>0</UtilityPayments>
          <ProvisionParents>0</ProvisionParents>
          <ProvisionExpenses>0</ProvisionExpenses>
          <MemberDetails />
          <NomineeDetails>
            <NomineeName />
            <NomineeRelationShip />
            <AppointeeName />
            <AppointeeRelationShip />
          </NomineeDetails>
          <FamilyDoctorDeatils>
            <Name />
            <Qualification />
            <Address />
            <ContactNo />
            <ClinicNo />
          </FamilyDoctorDeatils>
          <FinancierDetails>
            <IsFinanced>0</IsFinanced>
            <InstitutionName />
            <InstitutionCity />
          </FinancierDetails>
          <ClientExtraTag01 />
          <ClientExtraTag02 />
          <ClientExtraTag03 />
          <ClientExtraTag04 />
          <ClientExtraTag05 />
          <PrimaryInsuredDetails>
            <IsPrimaryInsured>Y</IsPrimaryInsured>
            <ProposerRelationCode>SELF</ProposerRelationCode>
            <FirstName />
            <RelationShipWithInsured />
            <DoB />
            <Gender />
          </PrimaryInsuredDetails>
          <IsIllness>N</IsIllness>
          <IsHospitalized>N</IsHospitalized>
          <IsMedication>N</IsMedication>
          <SpouseDOB>'.$includechildren.'</SpouseDOB>
          <SpecifierName />
          <SpecifierCode />
          <CustomerRefNo />
          <CustomerAccountNo />
          <IsEmployeeDiscount>N</IsEmployeeDiscount>
          <IPAddress>'.$currentIp.'</IPAddress>
          <GstinNo />
        </Client>
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
		return $xml_post_string;
	}

}