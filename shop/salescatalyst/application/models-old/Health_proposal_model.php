<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Health_proposal_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generatePropsalXmlHealth($xmlData){



		$familyType = $xmlData['familyType'];
		$health_FirstName = $xmlData['health_FirstName'];
		$health_dob = date('Y-m-d', strtotime($xmlData['health_dob']));
		$health_LastName = $xmlData['health_LastName'];
		$health_city = $xmlData['health_city'];
		$health_state = $xmlData['health_state'];
		$health_email = $xmlData['health_email'];
		$health_mobile = $xmlData['health_mobile'];
		$helth_pro_title= $xmlData['helth_pro_title'];
		
		$helth_pro_add1 = $xmlData['helth_pro_add1'];
		$helth_pro_add2 = $xmlData['helth_pro_add2'];
		$health_pro_landmark = $xmlData['helth_pro_nland'];
		$health_zip = $xmlData['health_zip'];

		$OrderNo = $xmlData['OrderNo'];
		$QuoteNo = $xmlData['QuoteNo'];
		$sumInsured = $xmlData['sumInsured'];
		$coverCode= $xmlData['coverCode'];


		$helth_pro_policy_start = date("Y-m-d");
		$policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($helth_pro_policy_start)) . " + 364 day"));


		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '
		<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
			<soapenv:Header/>
			<soapenv:Body>
				<prov:serve>
					<prov:SessionDoc>
<Session>
	<SessionData>
		<Index>2</Index>
		<InitTime>Wed, 21 Feb 2018 07:35:50 GMT</InitTime>
		<UserName>havaMtr</UserName>
		<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
		<QuoteNo>'.$QuoteNo.'</QuoteNo>
		<OrderNo>'.$OrderNo.'</OrderNo>
		<Route>INT</Route>
		<Contract>EHL</Contract>
		<Channel></Channel>
		<TransactionType>Quote</TransactionType>
		<TransactionStatus>Fresh</TransactionStatus>
		<ID>151921219943417398938814</ID>
		<UserAgentID>2C000024</UserAgentID>
		<Source>2C000024</Source>
		<IsCCUser>N</IsCCUser>
		<ExtraTag01 />
		<ExtraTag02 />
		<ExtraTag03 />
		<ExtraTag04 />
		<ExtraTag05 />
	</SessionData>
	<Quote>
		<AgentNumber>null</AgentNumber>
		<DealerId>null</DealerId>
		<PolicyStartDate>'.$helth_pro_policy_start.'T00:00:00.000</PolicyStartDate>
		<PolicyEndDate>'.$policyEndDate.'T23:59:59.000</PolicyEndDate>
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
		<MailQuote />
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
	</Quote>
	<Client>
		<CityOfResidence>'.$health_city.'</CityOfResidence>
		<ClientType>Individual</ClientType>
		<SurName>'.$health_LastName.'</SurName>
		<GivName>'.$health_FirstName.'</GivName>
		<Salut>'.$helth_pro_title.'</Salut>
		<CltDOB>'.$health_dob.'</CltDOB>
		<CltSex />
		<Marryd>S</Marryd>
		<CltAddr01>'.$helth_pro_add1.'</CltAddr01>
		<CltAddr02>'.$helth_pro_add2.'</CltAddr02>
		<CltAddr03 />
		<City>'.$health_city.'</City>
		<State>'.$health_state.'</State>
		<PinCode>'.$health_zip.'</PinCode>
		<MobileNo>'.$health_mobile.'</MobileNo>
		<LandLineNo></LandLineNo>
		<Occupation />
		<EmailID>'.$health_email.'</EmailID>
		<TPClientRefNo>shaj9898989898</TPClientRefNo>
		<MonthlyIncome>0</MonthlyIncome>
		<AnnualIncome>0</AnnualIncome>
		<LoanEMI>0</LoanEMI>
		<Investments>0</Investments>
		<Childrenfees>0</Childrenfees>
		<UtilityPayments>0</UtilityPayments>
		<ProvisionParents>0</ProvisionParents>
		<ProvisionExpenses>0</ProvisionExpenses>
		<MemberDetails>
			<Member>
				<FirstName>'.$health_FirstName.'</FirstName>
				<IsHospitalized>N</IsHospitalized>
				<IsIllness>N</IsIllness>
				<IsMedication>N</IsMedication>
				<LastName>'.$health_LastName.'</LastName>
				<NomineeDOB>'.$health_dob.'</NomineeDOB>
				<ProposerRelationCode>SELF</ProposerRelationCode>
				<Salut>MR</Salut>
			</Member>
			<Member>
				<FirstName>spouse</FirstName>
				<IsIllness>N</IsIllness>
				<IsScanning>N</IsScanning>
				<IsSurgeryRecommended>N</IsSurgeryRecommended>
				<IsMedication>N</IsMedication>
				<IsHospitalized>N</IsHospitalized>
				<IsDiseased>N</IsDiseased>
				<IsInsuredDeclined>N</IsInsuredDeclined>
				<LastName>One</LastName>
				<NomineeDOB>1996-06-12</NomineeDOB>
				<ProposerRelationCode>SPOUSE</ProposerRelationCode>
				<Salut>MRS</Salut>
			</Member>
		</MemberDetails>
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
			<IsPrimaryInsured>N</IsPrimaryInsured>
			<ProposerRelationCode>SELF</ProposerRelationCode>
			<FirstName>shaji</FirstName>
			<RelationShipWithInsured>Spouse</RelationShipWithInsured>
		</PrimaryInsuredDetails>
		<IsIllness>N</IsIllness>
		<IsHospitalized>N</IsHospitalized>
		<IsMedication>N</IsMedication>
		<SpouseDOB>1996-06-12</SpouseDOB>
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