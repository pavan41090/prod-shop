<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateQuoteXmlHealth($xmlData){

		

		$health_FirstName = $xmlData['health_FirstName'];
		$health_LastName = $xmlData['health_LastName'];
		$health_mx_DOB = date('Y-m-d', strtotime($xmlData['health_mx_DOB']));
		$health_mx_State = $xmlData['health_mx_State'];
		$health_mx_City = $xmlData['health_mx_City'];
		$health_mx_Zip = $xmlData['health_mx_Zip'];
		$mobilehealth = $xmlData['mobilehealth'];
		$occupation = $xmlData['occupation'];
		$emailhealth = $xmlData['emailhealth'];
        $health_mx_Customer_Gender=$xmlData['health_mx_Gender'];
        $includeSpouse = $xmlData['Spouse_health'];
        $includechildren = $xmlData['includechildren'];


        $familyType = 'S';	
        if($includeSpouse == 1){
        	$familyType = 'ss';	
        }

        $familyType = 'ss';	

		$policyStartDate = date("Y-m-d");
		$policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($policyStartDate)) . " + 364 day"));


		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
   <soapenv:Header/>
   <soapenv:Body>
      <prov:serve>
         <prov:SessionDoc>
  <Session xmlns="http://schemas.cordys.com/default">
	<SessionData>
		<Index>1</Index>
		<InitTime>'.gmdate('D, d M Y H:i:s').'GMT</InitTime>
			<UserName>havaEhl</UserName>
			<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
		<QuoteNo>NA</QuoteNo>
		<OrderNo>NA</OrderNo>
		<Route>INT</Route>
		<Contract>EHL</Contract>
		<Channel>havaEhl</Channel>
		<TransactionType>Quote</TransactionType>
		<TransactionStatus>Fresh</TransactionStatus>
		<ID>148905755590317947519155</ID>
		<UserAgentID>2C000024</UserAgentID>
		<Source>2C000024</Source>
	</SessionData>
	<Quote>
		<SelectedProducts />
		<Premium />
		<AgentNumber />
		<DealerId />
		<PolicyStartDate>'.$policyStartDate.'T00:00:00.000</PolicyStartDate>
		<PolicyEndDate>'.$policyEndDate.'T23:59:59.000</PolicyEndDate>
		<FamilyType>'.$familyType.'</FamilyType>
		<TypeOfBusiness>NB</TypeOfBusiness>
		<RiskType />
		<SumInsured />
		<ProductCode>ESC</ProductCode>
		<ExistingPolicy />
		<MailQuote />
		
	</Quote>
	<Client>
		<CityOfResidence />
		<ClientType>Individual</ClientType>
		<GivName>'.$health_FirstName.'</GivName>
		<SurName>'.$health_LastName.'</SurName>
		<Salut>MR</Salut>
		<CltDOB>'.$health_mx_DOB.'</CltDOB>
		<CltSex>'.$health_mx_Customer_Gender.'</CltSex>
		<Marryd />
		<CltAddr01 />
		<CltAddr02 />
		<CltAddr03 />
		<City>'.$health_mx_City.'</City>
		<State>'.$health_mx_State.'</State>
		<GstinNo></GstinNo>
		<PinCode>'.$health_mx_Zip.'</PinCode>
		<MobileNo>'.$mobilehealth.'</MobileNo>
		<LandLineNo />
		<Occupation>'.$occupation.'</Occupation>
		<EmailID>'.$emailhealth.'</EmailID>
		<TPClientRefNo>'.strtoupper(substr($emailhealth, 0, 3)).date('Ymd').time().'</TPClientRefNo>
		<MonthlyIncome />
		<AnnualIncome>0.00</AnnualIncome>
		<Childrenfees>0</Childrenfees>
		<MemberDetails>
			<Member>
				<FirstName>'.$health_FirstName.'</FirstName>
				<IsHospitalized>Y</IsHospitalized>
				<IsIllness>Y</IsIllness>
				<IsMedication>Y</IsMedication>
				<LastName>vx</LastName>
				<NomineeDOB>'.$health_mx_DOB.'</NomineeDOB>
				<ProposerRelationCode>SELF</ProposerRelationCode>
				<Salut>MR</Salut>
			</Member>
		</MemberDetails>
		<FinancierDetails>
			<IsFinanced />
			<InstitutionName />
			<InstitutionCity />
		</FinancierDetails>
		<PrimaryInsuredDetails>
			<IsPrimaryInsured />
			<ProposerRelationCode />
			<FirstName />
			<RelationShipWithInsured />
		</PrimaryInsuredDetails>
		<IsIllness />
		<IsHospitalized />
		<IsMedication />
		<isHSBC>True</isHSBC>
	</Client>
</Session>         
         </prov:SessionDoc>
      </prov:serve>
   </soapenv:Body>
</soapenv:Envelope>'; 
		return $xml_post_string;
	}




}