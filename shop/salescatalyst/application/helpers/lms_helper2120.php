<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('priorityfunction')){

	function priorityfunction(){

		$arrayPriority = array('High','Medium','Low');
		return $arrayPriority;

	}
}

if(!function_exists('occupationfunction')){

	function occupationfunction(){

		$arrayOCupation = array(
			'0001' => 'Media/Sports/Armed forces',
			'0002' => 'Government employees',
			'0003' => 'Professionals (CA, Doctor, lawyer)',
			'0004' => 'Private (Sales and marketing)',
			'0005' => 'Private (other than Sales / marketing)',
			'0006' => 'Self employed / self business',
			'0007' => 'Others'
		);

		return $arrayOCupation;

	}
}

if(!function_exists('suminsuredfunction')){

	function suminsuredfunction(){

		$sumArray = array(
			'5,00,000',
			'10,00,000',
			'20,00,000',
			'30,00,000',
			'40,00,000',
			'50,00,000',
			'75,00,000'
		);

		return $sumArray;
	}
}

if(!function_exists('realationshiofunction')){

	function realationshiofunction(){

		$realationArray = array(
			'1' => 'Father',
			'2' => 'Mother',
			'3' => 'Brother',
			'4' => 'Sister',
			'5' => 'Spouse',
			'6' => 'Son',
			'7' => 'Daughter'
		);
		asort($realationArray);
		return $realationArray;
	}

}

if(!function_exists('arealationshiofunction')){

	function arealationshiofunction(){

		$realationArray = array(
			'1' => 'Father',
			'2' => 'Mother',
			'3' => 'Brother',
			'4' => 'Sister',
			'5' => 'Spouse',
			'6' => 'Son',
			'7' => 'Daughter',
			'8' => 'Self'
		);
		asort($realationArray);
		return $realationArray;
	}

}

if(!function_exists('propertytypefunction')){

	function propertytypefunction(){

		$propertyArray = array(
			'Apartment',
			'Independent House',
			'Housing Society'
		);

		asort($propertyArray);
		return $propertyArray;

	}	
}

if(!function_exists('propertyownershipfunction')){

	function propertyownershipfunction(){
		$ownerArray = array(
			'Owned',
			'Rented'
		);
		return $ownerArray;
	}	
}

if(!function_exists('constructiontypefunction')){

	function constructiontypefunction(){

		$constructionArray = array(
			'Kutcha',
			'Standard'
		);
		return $constructionArray;
		
	}
}

if(!function_exists('peedescoptions')){

	function peedescoptions(){

		$constructionArray = array(
			'Mobile Phone',
			'Laptop',
			'Tablet',
			'Camera'
		);
		return $constructionArray;
		
	}
}

if(!function_exists('ncbVales')){
	function ncbVales(){
		$constructionArray = array(
			'20' => '0',
			'25' => '20',
			'35' => '25',
			'45' => '35',
			'50' => '45',
			'50' => '50',
		);
		return $constructionArray;
		
	}
}

if(!function_exists('exisitingInsCompanies')){

	function exisitingInsCompanies(){

		$constructionArray = array(
			'Bajaj Allianz General Insurance Co. Ltd.',
			'Bharti AXA General Insurance Co. Ltd.',
			'Cholamandalam MS General Insurance Co. Ltd.',
			'Future Generali India Insurance Co. Ltd.',
			'HDFC ERGO General Insurance Co. Ltd.',
			'ICICI Lombard General Insurance Co. Ltd.',
			'IFFCO Tokio General Insurance Co. Ltd.',
			'Kotak Mahindra General Insurance Co. Ltd.',
			'Liberty Videocon General Insurance Co. Ltd.',
			'Magma HDI General Insurance Co. Ltd.',
			'National Insurance Co. Ltd.',
			'Raheja QBE General Insurance Co. Ltd.',
			'Reliance General Insurance Co. Ltd.',
			'Royal Sundaram General Insurance Co. Ltd.',
			'SBI General Insurance Co. Ltd.',
			'Shriram General Insurance Co. Ltd.',
			'Tata AIG General Insurance Co. Ltd.',
			'The New India Assurance Co. Ltd.',
			'The Oriental Insurance Co. Ltd.',
			'United India Insurance Co. Ltd.',
			'Universal Sompo General Insurance Co. Ltd.'
		);
		return $constructionArray;
		
	}
}


if(!function_exists('pasuminsuredvalue')){
	function pasuminsuredvalue(){
		return array(
			'2500000' => '25,00,000',
			'5000000' => '50,00,000',
			'7500000' => '75,00,000',
			'10000000' => '1,00,00,000',
			'15000000' => '1,50,00,000',
			'20000000' => '2,00,00,000',
			'25000000' => '2,50,00,000',
			'30000000' => '3,00,00,000');
	}
}

if (!function_exists('getupplongterm')) {
	# code...
	function getupplongterm(){
		return array(
			'1' => '1',
			'2' => '1.5',
			'3' => '2',
			'4' => '2.5',
			'5' => '3',
			'6' => '3.5',
			'7' => '4',
			'8' => '4.5',
			'9' => '5'
		);
	}
}

if(!function_exists('pagetuppcriticaldata')){
	#code
	function pagetuppcriticaldata(){

		return array(
			'1' => '3.50',
			'2' => '4.99',
			'3' => '6.30',
			'4' => '7.65',
			'5' => '8.93',
			'6' => '10.10',
			'7' => '11.20',
			'8' => '12.20',
			'9' => '13.13'
		);

	}
}


if(!function_exists('pagetupppersonalaccrates')){
	#code

	function pagetupppersonalaccrates(){

		return array(
			'1' => '0.40',
			'2' => '0.75',
			'3' => '0.75',
			'4' => '1.06',
			'5' => '1.06',
			'6' => '1.33',
			'7' => '1.33',
			'8' => '1.62',
			'9' => '1.62'
		);

	}

}


if(!function_exists('pagetuppcreditshildrates')){
	#code

	function pagetuppcreditshildrates(){

		return array(
			'1' => '0.70',
			'2' => '1.05',
			'3' => '1.40',
			'4' => '1.75',
			'5' => '2.10',
			'6' => '2.45',
			'7' => '2.80',
			'8' => '3.15',
			'9' => '3.50'
		);

	}

}


if(!function_exists('pagetuppaccidenthospitalrates')){
	#code

	function pagetuppaccidenthospitalrates(){

		return array(
			'1' => '1.33',
			'2' => '1.90',
			'3' => '2.40',
			'4' => '2.92',
			'5' => '3.41',
			'6' => '3.85',
			'7' => '4.27',
			'8' => '4.65',
			'9' => '5.01'
		);

	}

}

if(!function_exists('personalbussinessworksheet')){

	#code
	function personalbussinessworksheet(){

		return array(
			'cism' => array(
				array(
					'1' => '100000',
					'2' => '100000'
				)
			),
			'pasi' => array(
			array(
					'1' => '100000',
					'2' => '800000'
				)
			),
			'cssi' => array(
			array(
					'1' => '0',
					'2' => '0'
				)
			),
			'ahsi' => array(
			array(
					'1' => '100000',
					'2' => '100000'
				)
			)
		);

	}

}

if(!function_exists('bussinessworksheet')){
	
	#code
	function bussinessworksheet(){

		return array(
			'cism' => array(
				array(
					'1' => '100000',
					'2' => '100000',
					'3' => '750000'
				)
			),
			'pasi' => array(
			array(
					'1' => '100000',
					'2' => '800000',
					'3' => '750000'
				)
			),
			'cssi' => array(
			array(
					'1' => '0',
					'2' => '0',
					'3' => '100000'
				)
			),
			'ahsi' => array(
			array(
					'1' => '100000',
					'2' => '100000',
					'3' => '100000'
				)
			)
		);

	}

}


if(!function_exists('getAdminlogincheck')){

	function getAdminlogincheck(){

		$loginlib =& get_instance();
		$usrtypeid = $loginlib->session->userdata('usr_type_id');
		if(!in_array($usrtypeid, array('1'))){
			session_destroy();
		 	redirect(base_url());
		 	exit();
		}

	}

}

if(!function_exists('getHdfclogincheck')){

	function getHdfclogincheck(){

		$loginlib =& get_instance();
		$usrtypeid = $loginlib->session->userdata('usr_type_id');
		if(!in_array($usrtypeid, array('2'))){
			session_destroy();
		 	redirect(base_url());
		 	exit();
		}

	}

}

if(!function_exists('getUserlogincheck')){

	function getUserlogincheck(){

		$loginlib =& get_instance();
		$usrtypeid = $loginlib->session->userdata('usr_type_id');
		if(!in_array($usrtypeid, array('2','3','4','5','6','7'))){
			session_destroy();
		 	redirect(base_url());
		 	exit();
		}

	}

}