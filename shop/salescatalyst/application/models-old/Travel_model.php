<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}



	public function generateQuoteXmlTravel($xmlData){


  		$policyType = trim($xmlData['policyType']);
		if($policyType == 0)
			$policyType = 'I/F';
		else 
			$policyType = 'S';

		$typeofTrip = trim($xmlData['typeofTrip']);
		if($typeofTrip == 0)
			$typeofTrip = 'S';
		else 
			$typeofTrip = 'A';

		$departDate = str_replace('/', '-', $xmlData['departdate']);
		$newEndingDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime($departDate)) . " + 365 day"));
		$departDate = date("Y-m-d", strtotime($departDate));

		$returnDate = str_replace('/', '-', $xmlData['returndate']);
		$returnDate = date("Y-m-d", strtotime($returnDate));


		$tripDuration = trim($xmlData['tripduration']);
		$coverType = trim($xmlData['covertype']);
		if($coverType == 0) {
			$coverType = 'F';
			$clientType = 'Family';
		} else { 
			$coverType = 'I';
			$clientType = 'Individual';
		}	
		
		$maxperTrip = trim($xmlData['maxpertrip']);
		$travelType = trim($xmlData['traveltype']);
		$geographical = trim($xmlData['geographical']);
		$relationship = trim($xmlData['relationship']);
		
		$fordatebirth = str_replace('/', '-', $xmlData['datebirth']);
		$dateBirth =  date("Y-m-d", strtotime($fordatebirth) );
		$ageTravel = $xmlData['ageTravel'];
		
		$nameTravel = strtoupper(trim($xmlData['nametravel']));
		$emailTravel = strtoupper(trim($xmlData['emailtravel']));
		$mobileTravel = trim($xmlData['mobiletravel']);
		
	
		/* for spouse */
		
		if( isset($xmlData['relationship1']) ) {
			$relationship1 = trim($xmlData['relationship1']);
			$fordateBirth1 = str_replace('/', '-', $xmlData['datebirth1']);
			$dateBirth1 =  date("Y-m-d", strtotime($fordateBirth1));
			$ageTravel1 = trim($xmlData['age1']);
		} else {
			$relationship1 = '';
			$dateBirth1 = '';
			$ageTravel1 = '';
		}
		
		// if( isset($xmlData['ageTravel1']) ) {
		// 	$ageTravel1 = trim($xmlData['ageTravel1']);
		// } else {
		// 	$ageTravel1 = '';
		// }	

		/* for children 1 */
		
		if( isset($xmlData['relationship2']) ) {
			$relationship2 = trim($xmlData['relationship2']);
			$fordateBirth2 = str_replace('/', '-', $xmlData['datebirth2']);
			$dateBirth2 =  date("Y-m-d", strtotime($fordateBirth2));
			$ageTravel2 = trim($xmlData['age2']);
		} else {
			$relationship2 = '';
			$dateBirth2 = '';
			$ageTravel2 = '';
		}
		if( isset($xmlData['relationship3']) ) {
			$relationship3 = trim($xmlData['relationship3']);
			$fordateBirth3 = str_replace('/', '-', $xmlData['datebirth3']);
			$dateBirth3 =  date("Y-m-d", strtotime($fordateBirth3));
			$ageTravel3 = trim($xmlData['age3']);
		} else {
			$relationship3 = '';
			$dateBirth3 =  '';
			$ageTravel3 = '';
		}	
		
		$dependsArray = array(
			'relnship1' => $relationship1,
			'dateBirth1' => $dateBirth1,
			'ageTravel1'=> $ageTravel1,
			'relnship2' => $relationship2,
			'dateBirth2'=>  $dateBirth2,
			'ageTravel2'=> $ageTravel2,
			'relnship3' => $relationship3,
			'dateBirth3'=>  $dateBirth3,
			'ageTravel3'=> $ageTravel3,
		);

		// if( isset($xmlData['datebirth3']) ) {
		// 	$fordateBirth3 =	 str_replace('/', '-', $xmlData['datebirth3']);
		// 	$dateBirth3 =  date("Y-m-d", strtotime($fordateBirth3));
		// } else {
		// 	$dateBirth3 = '';
		// }
		// if( isset($xmlData['ageTravel3']) ) {
		// 	$ageTravel3 = trim($xmlData['ageTravel3']);
		// } else {
		// 	$ageTravel3 = '';
		// }	




		$familyType = 'S'; // only self
		// self and spouse
		if($dateBirth1 !== '') { 
			$familyType = 'SS';
		}	

		//self, spouse and one children
		if($dateBirth1 !== '' && $dateBirth2 !== '') {
			$familyType = 'SSC';
		}

		//self, spouse and two childrens
		if($dateBirth1 !== '' && $dateBirth2 !== '' && $dateBirth3 !== '') {
			$familyType = 'SS2C';
		}
		//self and one child
		if($dateBirth1 == '' && $dateBirth2 !== '') {
			$familyType = 'SC';
		}

		//self and with two childrens
		if($dateBirth1 == '' && $dateBirth2 !== '' && $dateBirth3 !== '') {
			$familyType = 'S2C';
		}

		if($policyType == 'S' ) {
			$xml_post_string = $this->getStudentXmlString($policyType,$typeofTrip,$departDate,$returnDate,$tripDuration,$coverType,$travelType,$newEndingDate,$ageTravel,$nameTravel,$emailTravel,$mobileTravel,$dateBirth);

		} else {
			$xml_post_string = $this->getFamilyXmlString($typeofTrip,$departDate,$returnDate,$coverType,$travelType,$familyType,$clientType,$dateBirth,$nameTravel,$emailTravel,$ageTravel,$newEndingDate,$mobileTravel,$dependsArray);
		}


		return $xml_post_string;
	}



	public function getFamilyXmlString($typeofTrip,$departDate,$returnDate,$coverType,$travelType,$familyType,$clientType,$dateBirth,$nameTravel,$emailTravel,$ageTravel,$newEndingDate,$mobileTravel,$dependsArray){


		$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
   <soapenv:Header/>
   <soapenv:Body>
      <prov:serve>
         <prov:SessionDoc>


<Session>
	<SessionData>
		<Index>1</Index>
		<InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
		<UserName>havaStr</UserName>
		<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>		
		<QuoteNo>NA</QuoteNo>
		<OrderNo>NA</OrderNo>
		<Route>INT</Route>
		<Contract>STR</Contract>
		<ProductType>B2C</ProductType>
		<Channel/>
		<TransactionType>Quote</TransactionType>
		<TransactionStatus>Fresh</TransactionStatus>
		<ID>146097008602217542258697</ID>
		<UserAgentID>2C000024</UserAgentID>
		<Source>2C000024</Source>
	</SessionData>
	<Travel>
		<TypeOfBusiness>NB</TypeOfBusiness>
		<TypeOfPolicy>I/F</TypeOfPolicy>
		<TypeOfTrip>'.$typeofTrip.'</TypeOfTrip>
		<DepartureDate>'.$departDate.'</DepartureDate>
		<ReturnDate>'.$departDate.'</ReturnDate>
		<TripDuration>10</TripDuration>
		<TypeOfCover>'.$coverType.'</TypeOfCover>
		<TypeOfTavel>NON_SCH</TypeOfTavel>
		<MaxPerTripDuration>11</MaxPerTripDuration>
		<GeographicalExtension>1</GeographicalExtension>
		<FamilyType>'.$familyType.'</FamilyType>
	</Travel>
	<Quote>
		<PolicyStartDate>'.$departDate.'T00:04:00:40</PolicyStartDate>
		<PolicyEndDate>'.$newEndingDate.'T00:04:00:40</PolicyEndDate>
		<AgentNumber>Robinhood</AgentNumber>
		<AgentName>Robinhood</AgentName>
		<PlanSelected/>
		<Stage/>
	</Quote>
	<Client>
		<ClientType>'.$clientType.'</ClientType>
		<CltDOB>'.$dateBirth.'</CltDOB>
		<GivName>'.$nameTravel.'</GivName>
		<SurName>bfd</SurName>
		<EmailID>'.$emailTravel.'</EmailID>
		<MobileNo>'.$mobileTravel.'</MobileNo>
		<TPClientRefNo>BagiTravel'.date('Ymd').time().'</TPClientRefNo>
		<CltSex>M</CltSex>
		<Age>'.$ageTravel.'</Age>
		<Salut>MR</Salut>
		<Occupation>0001</Occupation>
		<CltAddr01>Gandhinagar</CltAddr01>
		<CltAddr02>Vikroli-West</CltAddr02>
		<CltAddr03/>
		<City>Mumbai</City>
		<State>Maharashtra</State>
		<PinCode>400079</PinCode>
		<MemberDetails>
			<Member>
				<CurrentLocation>INDIA</CurrentLocation>
				<FirstName>'.$nameTravel.'</FirstName>
				<Gender>M</Gender>
				<HoldPassport>Y</HoldPassport>
				<LastName>bfd</LastName>
				<MemberDOB>'.$dateBirth.'</MemberDOB>
				<Nationality>Other</Nationality>
				<Age>'.$ageTravel.'</Age>
				<NomineeName>test nominee</NomineeName>
				<AppointeeName>Proposer bfd</AppointeeName>
				<AppointeeRelationCode>Other</AppointeeRelationCode>
				<NomineeRelationCode>self</NomineeRelationCode>
				<PassportNo>A-1234567</PassportNo>
				<ProposerRelationCode>Self</ProposerRelationCode>
				<Salut>MR</Salut>
			</Member>';
			if($dependsArray["relnship1"]!= '') { 
				$xml_post_string .=  $this->getMemberDetail01($dependsArray,'1'); 
			}
			if($dependsArray["relnship2"]!= '') { 
				$xml_post_string .=  $this->getMemberDetail01($dependsArray,'2'); 
			}
			if($dependsArray["relnship3"]!= '') { 
				$xml_post_string .=  $this->getMemberDetail01($dependsArray,'3'); 
			}


		$xml_post_string .= '</MemberDetails>
		<Nominee>
			<Name>test nominee</Name>
			<Age>33</Age>
			<NomineeRelationCode>Grand Mother</NomineeRelationCode>
			<AppointeeName>Proposer bfd</AppointeeName>
			<AppointeeRelationCode>Self</AppointeeRelationCode>
		</Nominee>
		<SportsPerson>N</SportsPerson>
		<DangerousActivity>N</DangerousActivity>
		<PreExistingIllness>N</PreExistingIllness>
	</Client>
</Session>

				    
         </prov:SessionDoc>
      </prov:serve>
   </soapenv:Body>
</soapenv:Envelope>';
		return $xml_post_string;

	}


/*
$dependsArray = arrray(
			$relnship1 => $relationship1,
			$dateBirth1 =>  $dateBirth1,
			$ageTravel1 => $ageTravel1,
			$relnship2 => $relationship2,
			$dateBirth2 =>  $dateBirth2,
			$ageTravel2 => $ageTravel2,
			$relnship3 => $relationship3,
			$dateBirth3 =>  $dateBirth3,
			$ageTravel3 => $ageTravel3,
		);

*/


	public function getMemberDetail01($dependsArray, $mem) {
		switch ($mem) {
			case '1':
				$relation = 'Spouse';
				break;
			case '2':
				$relation = 'Child1';
				break;
			case '3':
				$relation = 'Child2';
				break;
			
			default:
				$relation = 'Self';
				break;
		}

		return '<Member>
				<CurrentLocation>INDIA</CurrentLocation>
				<FirstName>'.$dependsArray["relnship".$mem].'</FirstName>
				<Gender>M</Gender>
				<HoldPassport>Y</HoldPassport>
				<LastName>bfd</LastName>
				<MemberDOB>'.$dependsArray["dateBirth".$mem].'</MemberDOB>
				<Nationality>Other</Nationality>
				<Age>'.$dependsArray["ageTravel".$mem].'</Age>
				<NomineeName>test nominee</NomineeName>
				<AppointeeName>Proposer bfd</AppointeeName>
				<AppointeeRelationCode>Other</AppointeeRelationCode>
				<NomineeRelationCode>'.$relation.'</NomineeRelationCode>
				<PassportNo>A-1234567</PassportNo>
				<ProposerRelationCode></ProposerRelationCode>
				<Salut>MR</Salut>
			</Member>';
	}


	//public function getStudentXmlString($policyType,$typeofTrip,$departDate,$returnDate,$tripDuration,$coverType,$travelType,$newEndingDate,$ageTravel,$nameTravel,$emailTravel,$mobileTravel,$dateBirth){


public function getStudentXmlString($policyType,$typeofTrip,$departDate,$returnDate,$tripDuration,$coverType,$travelType,$newEndingDate,$ageTravel,$nameTravel,$emailTravel,$mobileTravel,$dateBirth) {

	
	$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
   <soapenv:Header/>
   <soapenv:Body>
      <prov:serve>
         <prov:SessionDoc>
			<Session>
				<SessionData>
					<Index>1</Index>
					<InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
					<UserName>havaStr</UserName>
					<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
					<OrderNo>NA</OrderNo>
					<QuoteNo>NA</QuoteNo>
					<Route>INT</Route>
					<Contract>STR</Contract>
					<ProductType>B2C</ProductType>
					<Channel></Channel>
					<TransactionType>Quote</TransactionType>
					<TransactionStatus>Fresh</TransactionStatus>
					<ID>149735724285617262512311</ID>
					<UserAgentID>2C000002</UserAgentID>
					<Source>2C000002</Source>
				</SessionData>
				<Travel>
					<TypeOfBusiness />
					<TypeOfPolicy>'.$policyType.'</TypeOfPolicy>
					<TypeOfTrip>'.$typeofTrip.'</TypeOfTrip>
					<DepartureDate>'.$departDate.'</DepartureDate>
					<ReturnDate>'.$returnDate.'</ReturnDate>
					<TripDuration>'.$tripDuration.'</TripDuration>
					<TypeOfCover>'.$coverType.'</TypeOfCover>
					<TypeOfTavel>NA</TypeOfTavel>
					<MaxPerTripDuration />
					<GeographicalExtension>1</GeographicalExtension>
					<LoadingDiscount />
					<Remarks />
					<FamilyType>S</FamilyType>
				</Travel>
				<Quote>
					<PolicyStartDate>'.$departDate.'</PolicyStartDate>
					<PolicyEndDate>'.$newEndingDate.'</PolicyEndDate>
					<AgentNumber />
					<AgentName />
					<PlanSelected />
					<Stage>1</Stage>
				</Quote> 
				<Client>
					<ClientType>Individual</ClientType>
					<CltDOB>'.$dateBirth.'</CltDOB>
					<GivName>'.$nameTravel.'</GivName>
					<SurName>HIRECHOTI</SurName>
					<EmailID>'.$emailTravel.'</EmailID>
					<MobileNo>'.$mobileTravel.'</MobileNo>
					<TPClientRefNo>BagiTravel'.date('Ymd').time().'</TPClientRefNo>
					<CltSex />
					<Age>'.$ageTravel.'</Age>
					<Salut>MR</Salut>
					<Occupation />
					<CltAddr01 />
					<CltAddr02 />
					<CltAddr03 />
					<City />
					<State />
					<PinCode />
					<MemberDetails>
						<Member>
							<Age>'.$ageTravel.'</Age>
							<FirstName>'.$nameTravel.'</FirstName>
							<LastName>HIRECHOTI</LastName>
							<MemberDOB>'.$dateBirth.'</MemberDOB>
							<ProposerRelationCode>Self</ProposerRelationCode>
						</Member>
					</MemberDetails>
					<Nominee>
						<Name />
						<Age>0</Age>
						<NomineeRelationCode />
					</Nominee>
					<SportsPerson>N</SportsPerson>
					<DangerousActivity>N</DangerousActivity>
					<PreExistingIllness>N</PreExistingIllness>
				</Client>
			</Session>
         
         </prov:SessionDoc>
      </prov:serve>
   </soapenv:Body>
</soapenv:Envelope>';
		return $xml_post_string;

	}





}

?>