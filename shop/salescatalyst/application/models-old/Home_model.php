<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateQuoteXmlHome($xmlData){

		

		$Home_FirstName = $xmlData['Home_FirstName'];
		$Home_LastName = $xmlData['Home_LastName'];
		$Home_mx_DOB = $xmlData['Home_mx_DOB'];
		$Home_mx_State = $xmlData['Home_mx_State'];
		$Home_mx_City = $xmlData['Home_mx_City'];
		//$Home_mx_Zip = $xmlData['Home_mx_Zip'];
		$home_mobile = $xmlData['home_mobile'];
		$home_email = $xmlData['home_email'];
		$Home_mx_Zip = '560008';

		
      	$Home_plans = $xmlData['Home_plans'];
		switch ($Home_plans) {
      		case '0':
      			$homePlan = 'Silver';	
      			break;
      		case '1':
      			$homePlan = 'Gold';	
      			break;
      		case '1':
      			$homePlan = 'Platinum';	
      			break;
      		
      		default:
				$homePlan = 'Silver';	
      			break;
      	}      	
		$Home_policy_start = date('Y-m-d',strtotime($xmlData['Home_policy_start']));
		$Home_policy_end = date('Y-m-d',strtotime($xmlData['Home_policy_end']));
		
		



		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:def="http://schemas.cordys.com/default">
   <soapenv:Header/>
   <soapenv:Body>
      <def:AmexQuoteHandler>
         <def:request>

<Session>
					<SessionData>
						<Index>1</Index>
						<InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
						<UserName>bhartiAxaHme</UserName>
						<Password>ineW/VKENK9UE45PyuIDtN2QRp9/1tDWYoi7zVW5stPB5edG7gmaMKD67pjWK6S4ebeezuHvBRiGObfrA0kMYTDA==</Password>
						<OrderNo>NA</OrderNo>
						<QuoteNo>NA</QuoteNo>
						<Route>INT</Route>
						<Contract>HME</Contract>
						<ProductType>HDF</ProductType>
						<Channel>HDFHME</Channel>
						<TransactionType>Quote</TransactionType>
						<TransactionStatus>Fresh</TransactionStatus>
						<ID>BBCF7910-C058-4F6E-9D66-DBBEC230D15D</ID>
						<UserAgentID>2C000123</UserAgentID>
						<Source>2C000123</Source>
					</SessionData>
					<Quote>
						<PolicyStartDate>'.$Home_policy_start.'</PolicyStartDate>
						<PolicyEndDate>'.$Home_policy_end.'</PolicyEndDate>
						<PlanSelected>'.$homePlan.'</PlanSelected>
					</Quote>
					<Client>
						<ClientType>Individual</ClientType>
						<CltDOB />
						<GivName>'.$Home_FirstName.'</GivName>
						<SurName>'.$Home_LastName.'</SurName>
						<EmailID>'.$home_email.'</EmailID>
						<MobileNo>'.$home_mobile.'</MobileNo>
						<TPClientRefNo>BagiAmex'.date('Ymd').time().'</TPClientRefNo>
						<CltSex />
						<Age>0</Age>
						<Salut />
						<Occupation />
						<CltAddr01 />
						<CltAddr02 />
						<CltAddr03 />
						<City />
						<State />
						<PinCode />
						<IPAddress>'.$currentIp.'</IPAddress>
						<NomineeName />
						<NomineeAge>0</NomineeAge>
						<NomineeRelation />
						<GSTNo />
					</Client>
				</Session>         
         </def:request>
      </def:AmexQuoteHandler>
   </soapenv:Body>
</soapenv:Envelope>'; 
		return $xml_post_string;
	}


}