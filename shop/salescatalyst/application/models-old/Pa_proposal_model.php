<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pa_proposal_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateQuoteXmlPa($xmlData){



		$familyType = $xmlData['familyType'];
		$pa_FirstName = $xmlData['pa_FirstName'];
		$pa_dob = date('Y-m-d', strtotime($xmlData['pa_dob']));
		$pa_LastName = $xmlData['pa_LastName'];
		$pa_city = $xmlData['pa_city'];
		$pa_state = $xmlData['pa_state'];
		$pa_email = $xmlData['pa_email'];
		$pa_mobile = $xmlData['pa_mobile'];
		
		
		$pa_pro_houseno = $xmlData['pa_pro_houseno'];
		$pa_pro_locality = $xmlData['pa_pro_locality'];
		$pa_pro_landmark = $xmlData['pa_pro_landmark'];
		$pa_zip = $xmlData['pa_zip'];
		$pa_occupation=$xmlData['pa_occupation'];

		$pa_pro_relation=$xmlData['pa_pro_relation'];
		$pa_pro_nname=$xmlData['pa_pro_nname'];
		$pa_pro_ndob=$xmlData['pa_pro_ndob'];

		$OrderNo = $xmlData['OrderNo'];
		$QuoteNo = $xmlData['QuoteNo'];
		$sumInsured = $xmlData['sumInsured'];
		$cover_code = substr($xmlData['cover_code'], 0, 3);


		$pa_pro_policy_sdate = date("Y-m-d");
		$policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($pa_pro_policy_sdate)) . " + 364 day"));


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
				<InitTime>' . gmdate('D, d M Y H:i:s') . 'GMT</InitTime>
				<UserName>havaEhl</UserName>
				<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
				<QuoteNo>'.$QuoteNo.'</QuoteNo>
				<OrderNo>'.$OrderNo.'</OrderNo>
				<Route>INT</Route>
				<Contract>EPA</Contract>
				<Channel>havaEhl</Channel>
				<TransactionType>Quote</TransactionType>
				<TransactionStatus>Fresh</TransactionStatus>
				<ID>148905755590317947519155</ID>
				<UserAgentID>2C000024</UserAgentID>
				<Source>2C000024</Source>
				
				<ExtraTag01 />
				<ExtraTag02 />
				<ExtraTag03 />
				<ExtraTag04 />
				<ExtraTag05 />
			</SessionData>
			<Quote>
				<AgentNumber />
				<DealerId />
					<PolicyStartDate>'.$pa_pro_policy_sdate.'T23:59:59.000</PolicyStartDate>
					<PolicyEndDate>'.$policyEndDate.'T23:59:59.000</PolicyEndDate>
				<FamilyType>100</FamilyType>
				<TypeOfBusiness>NB</TypeOfBusiness>
				<RiskType />
				<RateType>G</RateType>
				<SumInsured>'.$sumInsured.'</SumInsured>
				<ProductCode>'.$cover_code.'</ProductCode>
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
				<CityOfResidence>'.$pa_city.'</CityOfResidence>
				<ClientType>Individual</ClientType>
				<SurName>'.$pa_LastName.'</SurName>
				<GivName>'.$pa_FirstName.'</GivName>
				<Salut>MR</Salut>
				<CltDOB>'.$pa_dob.'</CltDOB>
				<CltSex />
				<Marryd>M</Marryd>
				<CltAddr01>'.$pa_pro_houseno.'</CltAddr01>
				<CltAddr02>'.$pa_pro_locality.'</CltAddr02>
				<CltAddr03>'.$pa_pro_landmark.'</CltAddr03>
				<City>'.$pa_city.'</City>
				<State>'.$pa_state.'</State>
				<PinCode>'.$pa_zip.'</PinCode>
				<MobileNo>'.$pa_mobile.'</MobileNo>
				<LandLineNo>9108729687</LandLineNo>
				<Occupation>'.$pa_occupation.'</Occupation>
				<EmailID>'.$pa_email.'</EmailID>
				<TPClientRefNo>BagiHlthB2C1492614610</TPClientRefNo>
				<MonthlyIncome>0</MonthlyIncome>
				<AnnualIncome>300000</AnnualIncome>
				<LoanEMI>0</LoanEMI>
				<Investments>0</Investments>
				<Childrenfees>0</Childrenfees>
				<UtilityPayments>0</UtilityPayments>
				<ProvisionParents>0</ProvisionParents>
				<ProvisionExpenses>0</ProvisionExpenses>
				<MemberDetails>
					<Member>
						<FirstName>'.$pa_FirstName.'</FirstName>
						<IsHospitalized>N</IsHospitalized>
						<IsIllness>N</IsIllness>
						<IsMedication>N</IsMedication>
						<LastName>'.$pa_LastName.'</LastName>
						<MemberDOB>'.$pa_dob.'</MemberDOB>
						<NomineeDOB>'.$pa_pro_ndob.'</NomineeDOB>
						<NomineeName>'.$pa_pro_nname.'</NomineeName>
						<OccupationGroupCode>'.$pa_occupation.'</OccupationGroupCode>
						<ProposerRelationCode>SELF</ProposerRelationCode>
						<Relationship>'.$pa_pro_relation.'</Relationship>
						<Salut>MR</Salut>
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
					<IsPrimaryInsured>Y</IsPrimaryInsured>
					<ProposerRelationCode>SELF</ProposerRelationCode>
					<FirstName />
					<RelationShipWithInsured />
				</PrimaryInsuredDetails>
				<IsIllness>N</IsIllness>
				<IsHospitalized>N</IsHospitalized>
				<IsMedication>N</IsMedication>
				<Remarks />
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