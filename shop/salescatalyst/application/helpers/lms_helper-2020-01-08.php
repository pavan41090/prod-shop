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
			'0',
			'20',
			'25',
			'35',
			'45',
			'50'
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
