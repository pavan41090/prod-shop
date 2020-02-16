<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_proposal_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateProposalXmlhome($xmlData){



		$familyType = $xmlData['familyType'];
		$home_FirstName = $xmlData['home_FirstName'];
		$home_dob = date('Y-m-d', strtotime($xmlData['home_dob']));
		$home_LastName = $xmlData['home_LastName'];
		$home_city = $xmlData['home_city'];
		$home_state = $xmlData['home_state'];
		$home_email = $xmlData['home_email'];
		$home_mobile = $xmlData['home_mobile'];
		
		
		$home_pro_add1 = $xmlData['home_pro_add1'];
		$home_pro_add2 = $xmlData['home_pro_add2'];
		$home_pro_landmark = $xmlData['home_pro_landmark'];
		$home_zip = $xmlData['home_zip'];
		$home_occupation=$xmlData['home_occupation'];

		$home_pro_relation=$xmlData['home_pro_relation'];
		$home_pro_nname=$xmlData['home_pro_nname'];
		$home_pro_nage=$xmlData['home_pro_nage'];

		$OrderNo = $xmlData['OrderNo'];
		$QuoteNo = $xmlData['QuoteNo'];
		$sumInsured = $xmlData['sumInsured'];
		$cover_code = substr($xmlData['cover_code'], 0, 3);


		$home_pro_policy_sdate = date("Y-m-d");
		$policyEndDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($home_pro_policy_sdate)) . " + 364 day"));


		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '
		 
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:def="http://schemas.cordys.com/default">
   <soapenv:Header/>
   <soapenv:Body>
      <def:AmexQuoteHandler>
         <def:request>

<Session>
					<SessionData>
						<Index>2</Index>
						<InitTime>Fri, 09 Mar 2018 12:34:43 GMT</InitTime>
						<UserName>bhartiAxaHme</UserName>
						<Password>ineW/VKENK9UE45PyuIDtN2QRp9/1tDWYoi7zVW5stPB5edG7gmaMKD67pjWK6S4ebeezuHvBRiGObfrA0kMYTDA==</Password>
						<OrderNo>'.$OrderNo.'</OrderNo>
						<QuoteNo>'.$QuoteNo.'</QuoteNo>
						<Route>INT</Route>
						<Contract>HME</Contract>
						<ProductType>AMX</ProductType>
						<Channel>AMXHME</Channel>
						<TransactionType>Quote</TransactionType>
						<TransactionStatus>Fresh</TransactionStatus>
						<ID>E5E32194-237F-4FB1-BFD9-2765812008A9</ID>
						<UserAgentID>00001124</UserAgentID>
						<Source>00001124</Source>
					</SessionData>
					<Quote>
						<PolicyStartDate>'.$home_pro_policy_sdate.'T23:59:59.000</PolicyStartDate>
						<PolicyEndDate>'.$policyEndDate.'T23:59:59.000</PolicyEndDate>
						<PlanSelected>Silver</PlanSelected>
					</Quote>
					<Client>
						<ClientType>Individual</ClientType>
						<CltDOB>'.$home_dob.'</CltDOB>
						<GivName>'.$home_FirstName.'</GivName>
						<SurName>'.$home_LastName.'</SurName>
						<EmailID>'.$home_email.'</EmailID>
						<MobileNo>'.$home_mobile.'</MobileNo>
						<TPClientRefNo>BagiAmex081117125422248</TPClientRefNo>
						<CltSex>F</CltSex>
						<Age>27</Age>
						<Salut />
						<Occupation>'.$home_occupation.'</Occupation>
						<CltAddr01>'.$home_pro_add1.'</CltAddr01>
						<CltAddr02>'.$home_pro_add2.'</CltAddr02>
						<CltAddr03>'.$home_pro_landmark.'</CltAddr03>
						<City>'.$home_city.'</City>
						<State>'.$home_state.'</State>
						<PinCode>'.$home_zip.'</PinCode>
						<IPAddress>125.18.59.151</IPAddress>
						<NomineeName>'.$home_pro_nname.'</NomineeName>
						<NomineeAge>'.$home_pro_nage.'</NomineeAge>
						<NomineeRelation>'.$home_pro_relation.'</NomineeRelation>
					</Client>
					</Session>         
         </def:request>
      </def:AmexQuoteHandler>
   </soapenv:Body>
</soapenv:Envelope>'; 
		return $xml_post_string;
	}


}