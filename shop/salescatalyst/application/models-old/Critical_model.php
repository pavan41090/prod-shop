<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Critical_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateQuoteXmlcritical($xmlData){



		$critical_FirstName = $xmlData['critical_FirstName'];
		$critical_LastName = $xmlData['critical_LastName'];
		$critical_mx_DOB = date('Y-m-d', strtotime($xmlData['critical_mx_DOB']));
		$critical_mx_State = $xmlData['critical_mx_State'];
		$critical_mx_City = $xmlData['critical_mx_City'];
		$critical_mx_Zip = $xmlData['critical_mx_Zip'];
		$mobilecritical = $xmlData['mobilecritical'];
		$occupation = $xmlData['occupation'];
		$emailcritical = $xmlData['emailcritical'];
		if(isset($xmlData['critical_mx_Gender'])) {
        	$critical_mx_Customer_Gender = $xmlData['critical_mx_Gender'];
        } else {
        	$critical_mx_Customer_Gender = '';
        }	
        $Spouse_critical = $xmlData['Spouse_critical'];
        $familyType = 'S';	
        if($Spouse_critical == 1){
        	$familyType = 'ss';	
        }


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
					<GivName>'.$critical_FirstName.'</GivName>
					<SurName>'.$critical_LastName.'</SurName>
					<Salut>MR</Salut>
					<CltDOB>'.$critical_mx_DOB.'</CltDOB>
					<CltSex>'.$critical_mx_Customer_Gender.'</CltSex>
					<Marryd />
					<CltAddr01 />
					<CltAddr02 />
					<CltAddr03 />
					<City>'.$critical_mx_City.'</City>
					<State>'.$critical_mx_State.'</State>
					<GstinNo></GstinNo>
					<PinCode>'.$critical_mx_Zip.'</PinCode>
					<MobileNo>'.$mobilecritical.'</MobileNo>
					<LandLineNo />
					<Occupation>'.$occupation.'</Occupation>
					<EmailID>'.$emailcritical.'</EmailID>
					<TPClientRefNo>'.strtoupper(substr($emailcritical, 0, 4)).date('Ymd').time().'</TPClientRefNo>
					<MonthlyIncome />
					<AnnualIncome>0.00</AnnualIncome>
					<Childrenfees>0</Childrenfees>
					<MemberDetails>
						<Member>
							<FirstName>Jerin Jayaraj</FirstName>
							<IsHospitalized>Y</IsHospitalized>
							<IsIllness>Y</IsIllness>
							<IsMedication>Y</IsMedication>
							<LastName>vx</LastName>
							<NomineeDOB>1990-03-09</NomineeDOB>
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