<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sship_proposal_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generatePropsalXmlShip($xmlData){


		$familyType = $xmlData['familyType'];
		$sship_FirstName = $xmlData['sship_FirstName'];
		$sship_dob = date('Y-m-d', strtotime($xmlData['sship_dob']));
		$sship_LastName = $xmlData['sship_LastName'];
		$sship_city = $xmlData['sship_city'];
		$sship_state = $xmlData['sship_state'];
		$sship_email = $xmlData['sship_email'];
		$sship_mobile = $xmlData['sship_mobile'];
		$sship_pro_title= $xmlData['sship_pro_title'];
		
		$sship_pro_add1 = $xmlData['sship_pro_add1'];
		$sship_pro_add2 = $xmlData['sship_pro_add2'];
		$sship_pro_landmark = $xmlData['sship_pro_nland'];     
		$sship_zip = $xmlData['sship_zip'];

		$OrderNo = $xmlData['OrderNo'];
		$QuoteNo = $xmlData['QuoteNo'];
		$sumInsured = round($xmlData['sumInsured'],0);
		$coverCode= $xmlData['coverCode'];
		$policyterm = $xmlData['policyterm'];
		
		$sshipProHeight = $xmlData['sshipProHeight'];
		$sshipProWeight = $xmlData['sshipProWeight'];
		$sshipProNominiName = $xmlData['sship_pro_nname'];
		$sshipProNomieRelation = $xmlData['sship_pro_nomie_relation'];

		$sshipProDocName = $xmlData['sship_pro_doc_name'];
		$sshipProDocQualifi = $xmlData['sship_pro_doc_qualifi'];
		$sshipProDocAddr = $xmlData['sship_pro_doc_addr'];
		$sshipProDocMobile = $xmlData['sship_pro_doc_mobile'];
		$sshipProHosNum = $xmlData['sship_pro_hos_num'];
		$sshipIncome = $xmlData['sship_income'];
		$sshipProTitle = $xmlData['sship_pro_title'];
		

		
		$sship_pro_policy_start = date("Y-m-d");
		$sship_pro_policy_end = date("Y-m-d", strtotime(date("Y-m-d", strtotime($sship_pro_policy_start)) . " + 364 day"));

		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
	<soapenv:Header/>
	<soapenv:Body>
		<prov:serve>
			<prov:SessionDoc>
						
		<Session>
        <SessionData>
          <Index>2</Index>
        <InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
			<UserName>havaEhl</UserName>
			<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
          <QuoteNo>'.$QuoteNo.'</QuoteNo>
          <OrderNo>'.$OrderNo.'</OrderNo>
          <Route>INT</Route>
          <Contract>EHL</Contract>
          <Channel></Channel>
          <TransactionType>Quote</TransactionType>
          <TransactionStatus>Fresh</TransactionStatus>
          <ID>150174468546117263688404</ID>
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
          <AgentNumber>null</AgentNumber>
          <DealerId>null</DealerId>
          <Stage>3</Stage>
          <PolicyStartDate>'.$sship_pro_policy_start.'</PolicyStartDate>
          <PolicyEndDate>'.$sship_pro_policy_end.'</PolicyEndDate>
          <PolicyTerm>'.$policyterm.'</PolicyTerm>
          <FamilyType>'.$familyType.'</FamilyType>
          <TypeOfBusiness>NB</TypeOfBusiness>
          <RiskType />
          <SumInsured>'.$sumInsured.'</SumInsured>
          <ProductCode>'.$coverCode.'</ProductCode>
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
          <CityOfResidence>'.$sship_city.'</CityOfResidence>
          <ClientType>Individual</ClientType>
          <SurName>'.$sship_LastName.'</SurName>
          <GivName>'.$sship_FirstName.'</GivName>
          <Salut>'.$sship_pro_title.'</Salut>
          <CltDOB>'.$sship_dob.'</CltDOB>
          <CltSex />
          <Marryd>M</Marryd>
          <CltAddr01>'.$sship_pro_add1.'</CltAddr01>
          <CltAddr02>'.$sship_pro_add2.'</CltAddr02>
          <CltAddr03></CltAddr03>
          <City>'.$sship_city.'</City>
          <State>'.$sship_state.'</State>
          <PinCode>'.$sship_zip.'</PinCode>
          <MobileNo>'.$sship_mobile.'</MobileNo>
          <LandLineNo>'.$sship_mobile.'</LandLineNo>
          <Occupation />
          <EmailID>'.$sship_email.'</EmailID>
          <TPClientRefNo>BAGI'.date('Ymd').time().'</TPClientRefNo>
          <MonthlyIncome>0</MonthlyIncome>
          <AnnualIncome>'.$sshipIncome.'</AnnualIncome>
          <LoanEMI>0</LoanEMI>
          <Investments>0</Investments>
          <Childrenfees>0</Childrenfees>
          <UtilityPayments>0</UtilityPayments>
          <ProvisionParents>0</ProvisionParents>
          <ProvisionExpenses>0</ProvisionExpenses>
          <MemberDetails>
            <Member>
              <FirstName>'.$sship_LastName.'</FirstName>
              <Gender>M</Gender>
              <Height>'.$sshipProHeight .'</Height>
              <IsDiseased>N</IsDiseased>
              <IsHabit>N</IsHabit>
              <IsHospitalized>N</IsHospitalized>
              <IsIllness>N</IsIllness>
              <IsInsuredDeclined>N</IsInsuredDeclined>
              <IsScanning>N</IsScanning>
              <IsSurgeryRecommended>N</IsSurgeryRecommended>
              <IsMedication>N</IsMedication>
              <LastName>'.$sship_LastName.'</LastName>
              <NoofSticks />
              <NoofPegs />
              <NoofPouches />
              <NomineeDOB>'.$sship_dob.'</NomineeDOB>
              <Occupation>Manager/Administrative</Occupation>
              <Others />
              <ProposerRelationCode>SELF</ProposerRelationCode>
              <Salut>'.$sshipProTitle.'</Salut>
              <Weight>'.$sshipProWeight .'</Weight>
            </Member>
          </MemberDetails>
          <NomineeDetails>
            <NomineeName>'.$sshipProNominiName.'</NomineeName>
            <NomineeRelationShip>'.$sshipProNomieRelation.'</NomineeRelationShip>
            <AppointeeName />
            <AppointeeRelationShip />
          </NomineeDetails>
          <FamilyDoctorDeatils>
            <Name>DR'.$sshipProDocName.'</Name>
            <Qualification>'.$sshipProDocQualifi .'</Qualification>
            <Address>'.$sshipProDocAddr.'</Address>
            <ContactNo>'.$sshipProDocMobile.'</ContactNo>
            <ClinicNo>'.$sshipProHosNum.'</ClinicNo>
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
            <FirstName>HITIN KUMAR</FirstName>
            <RelationShipWithInsured>Self</RelationShipWithInsured>
            <DoB />
            <Gender />
          </PrimaryInsuredDetails>
          <IsIllness>N</IsIllness>
          <IsHospitalized>N</IsHospitalized>
          <IsMedication>N</IsMedication>
          <SpouseDOB>1990-08-16</SpouseDOB>
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
          <InstrumentAmount />x
        </Payment>
          </Session>						

			</prov:SessionDoc>
		</prov:serve>
	</soapenv:Body>
</soapenv:Envelope>'; 
		return $xml_post_string;
	}


}