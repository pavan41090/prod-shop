<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Critical_proposal_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generatePropsalXmlcritical($xmlData){



		$familyType = $xmlData['familyType'];
		$critical_FirstName = $xmlData['critical_FirstName'];
		$critical_mx_DOB = date('Y-m-d', strtotime($xmlData['critical_mx_DOB']));
		$critical_LastName = $xmlData['critical_LastName'];
		$critical_mx_City = $xmlData['critical_mx_City'];
		$critical_mx_State = $xmlData['critical_mx_State'];
		$emailcritical = $xmlData['emailcritical'];
		$mobilecritical = $xmlData['mobilecritical'];
		$emailcritical = $xmlData['emailcritical'];
		
		$ctill_pro_add1 = $xmlData['ctill_pro_add1'];
		$ctill_pro_add2 = $xmlData['ctill_pro_add2'];
		$ctill_pro_landmark = $xmlData['ctill_pro_landmark'];
		$ctill_zip = $xmlData['ctill_zip'];

		$OrderNo = $xmlData['OrderNo'];
		$QuoteNo = $xmlData['QuoteNo'];
		$sumInsured = $xmlData['selectedSumInsured'];
		$productCode = $xmlData['selectedPlanCode'];


		$ctill_pro_policy_sdate = date("Y-m-d");
		$policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($ctill_pro_policy_sdate)) . " + 364 day"));


		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
   <soapenv:Header/>
   <soapenv:Body>
      <prov:serve>
         <prov:SessionDoc>
			  <Session xmlns="http://schemas.cordys.com/default">
				<SessionData>
					<Index>2</Index>
					 <InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
					<UserName>havaEhl</UserName>
					<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
					<QuoteNo>'.$QuoteNo.'</QuoteNo>
					<OrderNo>'.$OrderNo.'</OrderNo>
					<Route>INT</Route>
					<Contract>EHL</Contract>
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
					<UserRole>MASAgent</UserRole>
				</SessionData>
				<Quote>
					<AgentNumber>null</AgentNumber>
					<DealerId>null</DealerId>
					<Stage>3</Stage>
					<PolicyStartDate>'.$ctill_pro_policy_sdate.'</PolicyStartDate>
					<PolicyEndDate>'.$policyEndDate.'</PolicyEndDate>
					<PolicyTerm />
					<FamilyType>'.$familyType.'</FamilyType>
					<TypeOfBusiness>NB</TypeOfBusiness>
					<RiskType />
					<SumInsured>'.$sumInsured.'</SumInsured>
					<ProductCode>'.$productCode.'</ProductCode>
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
					<UWriterRemarks2 />
					<UWriterRemarks3 />
					<UWriterRemarks4 />
					<UWriterRemarks5 />
					<PPCNumber />
					<ReferralReasons />
					<UWLoading />
					<EmployeeDiscount>0</EmployeeDiscount>
				</Quote>
				<Client>
					<CityOfResidence>bangalore</CityOfResidence>
					<ClientType>Individual</ClientType>
					<SurName>'.$critical_LastName.'</SurName>
					<GivName>'.$critical_FirstName.'</GivName>
					<Salut>MR</Salut>
					<CltDOB>'.$critical_mx_DOB.'</CltDOB>
					<CltSex />
					<Marryd>M</Marryd>
					<CltAddr01>'.$ctill_pro_add1.'</CltAddr01>
					<CltAddr02>'.$ctill_pro_add2.'</CltAddr02>
					<CltAddr03>'.$ctill_pro_landmark.'</CltAddr03>
					<City>'.$critical_mx_City.'</City>
					<State>'.$critical_mx_State.'</State>
					<PinCode>'.$ctill_zip.'</PinCode>
					<MobileNo>'.$mobilecritical.'</MobileNo>
					<LandLineNo>'.$mobilecritical.'</LandLineNo>
					<Occupation />
					<EmailID>'.$emailcritical.'</EmailID>
					<TPClientRefNo>' . strtoupper(substr($critical_LastName, 0, 4)).date('Ymd').time(). '</TPClientRefNo>
					<MonthlyIncome>0</MonthlyIncome>
					<AnnualIncome>0.0</AnnualIncome>
					<LoanEMI>0</LoanEMI>
					<Investments>0</Investments>
					<Childrenfees>0</Childrenfees>
					<UtilityPayments>0</UtilityPayments>
					<ProvisionParents>0</ProvisionParents>
					<ProvisionExpenses>0</ProvisionExpenses>
					<MemberDetails>
						<Member>
							<FirstName>'.$critical_FirstName.'</FirstName>
							<IsDiseased>N</IsDiseased>
							<IsHabit>N</IsHabit>
							<IsHospitalized>N</IsHospitalized>
							<IsIllness>N</IsIllness>
							<IsInsuredDeclined>N</IsInsuredDeclined>
							<IsScanning>N</IsScanning>
							<IsSurgeryRecommended>N</IsSurgeryRecommended>
							<IsMedication>N</IsMedication>
							<LastName>'.$critical_LastName.'</LastName>
							<NoofSticks />
							<NoofPegs />
							<NoofPouches />
							<NomineeDOB>'.$critical_mx_DOB.'</NomineeDOB>
							<Occupation />
							<Others />
							<ProposerRelationCode>SELF</ProposerRelationCode>
							<Salut>MR</Salut>
						</Member>
						
					</MemberDetails>
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
						<FirstName>'.$critical_FirstName.'</FirstName>
						<RelationShipWithInsured>Self</RelationShipWithInsured>
						<DoB />
						<Gender />
						<IsIndian />
						<Nationality />
						<Occupation />
						<Income>0.0</Income>
						<Address1 />
						<Address2 />
						<Address3 />
						<FLContactNo />
						<MobileNo />
						<EmailID>'.$emailcritical.'</EmailID>
					</PrimaryInsuredDetails>
					<IsIllness>N</IsIllness>
					<IsHospitalized>N</IsHospitalized>
					<IsMedication>N</IsMedication>
					<SpouseDOB>1990-12-14</SpouseDOB>
					<SpecifierName />
					<SpecifierCode />
					<CustomerRefNo />
					<CustomerAccountNo />
					<IsEmployeeDiscount>N</IsEmployeeDiscount>
					<IPAddress>125.18.59.151</IPAddress>
					<GstinNo />
					<IsPortable>N</IsPortable>
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