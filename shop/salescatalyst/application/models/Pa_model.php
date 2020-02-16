<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pa_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateQuoteXmlpa($xmlData){



		$policyStartDate = date("Y-m-d");
		
		$policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($policyStartDate)) . " + 364 day"));

		$paState = trim($xmlData['pa_state']);
		$paCity = $xmlData['pa_city'];
		$occupation = round($xmlData['occupation']);
		$gainful = trim($xmlData['gainful']);
		$emailpa = trim($xmlData['emailpa']);
		$pamobile = round($xmlData['pamobile']);
		$firstName = trim($xmlData['FirstName']);
		$lastName = trim($xmlData['LastName']);
		$dateofbirthpa = date('Y-m-d',strtotime($xmlData['dateofbirthpa']));
		
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
				<InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
				<UserName>havaPa</UserName>
				<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
				<QuoteNo>NA</QuoteNo>
				<OrderNo>NA</OrderNo>
				<Route>INT</Route>
				<Contract>EPA</Contract>
				<Channel>havaPa</Channel>
				<TransactionType>Quote</TransactionType>
				<TransactionStatus>Fresh</TransactionStatus>
				<ID></ID>
				<UserAgentID></UserAgentID>
				<Source></Source>
				
				<ExtraTag01 />
				<ExtraTag02 />
				<ExtraTag03 />
				<ExtraTag04 />
				<ExtraTag05 />
			</SessionData>
			<Quote>
				<AgentNumber />
				<DealerId />
				<PolicyStartDate>'.$policyStartDate.'T00:00:00.000</PolicyStartDate>
				<PolicyEndDate>'.$policyEndDate.'T23:59:59.000</PolicyEndDate>
				<FamilyType>100</FamilyType>
				<TypeOfBusiness>NB</TypeOfBusiness>
				<RiskType />
				<RateType>G</RateType>
				<SumInsured>0</SumInsured>
				<ProductCode>SAP</ProductCode>
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
				<CityOfResidence>KARWAR</CityOfResidence>
				<ClientType>Individual</ClientType>
				<SurName>'.$lastName.'</SurName>
				<GivName>'.$firstName.'</GivName>
				<Salut>MR</Salut>
				<CltDOB>'.$dateofbirthpa.'</CltDOB>
				<CltSex />
				<Marryd>M</Marryd>
				<CltAddr01 />
				<CltAddr02 />
				<CltAddr03 />
				<City>'.$paCity.'</City>
				<State>'.$paState.'</State>
				<PinCode />
				<MobileNo>'.$pamobile.'</MobileNo>
				<LandLineNo />
				<Occupation>'.$occupation.'</Occupation>
				<EmailID>'.$emailpa.'</EmailID>
				<TPClientRefNo>BagiPA'.date('Ymd') . time() .'</TPClientRefNo>
				<MonthlyIncome>0</MonthlyIncome>
				<AnnualIncome>'.$gainful.'</AnnualIncome>
				<LoanEMI>0</LoanEMI>
				<Investments>0</Investments>
				<Childrenfees>0</Childrenfees>
				<UtilityPayments>0</UtilityPayments>
				<ProvisionParents>0</ProvisionParents>
				<ProvisionExpenses>0</ProvisionExpenses>
				<MemberDetails />
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
				<IsIllness>Y</IsIllness>
				<IsHospitalized>Y</IsHospitalized>
				<IsMedication>Y</IsMedication>
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