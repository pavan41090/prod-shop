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

if(!function_exists('selectingtheplans')){

	function selectingtheplans(){

		$constructionArray = array(
			'5' => array(
				array(
				'planame' => 'Fire & burglary excluding theft (for Content)',
				'value' => '500,000'
				),
				array(
					'planame' => 'Money In Safe /Tilt',
					'value' => '25,000'
				),
				array(
					'planame' => 'Money In Transit (Theft)',
					'value' => '25,000'
				),
				array(
					'planame' => 'Public Liability (Legal Liability)',
					'value' => '25,000'
				),
				array(
					'planame' => 'PA owner Death only',
					'value' => '500,000'
				),
				array(
					'planame' => 'Hospital Cash ( Daily cash Benefit for 10 days)',
					'value' => '500/day'
				)),

			 '10' => array(
				array(
				'planame' => 'Fire & burglary excluding theft (for Content)',
				'value' => '1,000,000'
				),
				array(
					'planame' => 'Money In Safe /Tilt',
					'value' => '25,000'
				),
				array(
					'planame' => 'Money In Transit (Theft)',
					'value' => '25,000'
				),
				array(
					'planame' => 'Public Liability (Legal Liability)',
					'value' => '50,000'
				),
				array(
					'planame' => 'PA owner Death only',
					'value' => '1,000,000'
				),
				array(
					'planame' => 'Hospital Cash ( Daily cash Benefit for 10 days)',
					'value' => '500/day'
				)),

			 '20' => array(
				array(
				'planame' => 'Fire & burglary excluding theft (for Content)',
				'value' => '2,000,000'
				),
				array(
					'planame' => 'Money In Safe /Tilt',
					'value' => '75,000'
				),
				array(
					'planame' => 'Money In Transit (Theft)',
					'value' => '75,000'
				),
				array(
					'planame' => 'Public Liability (Legal Liability)',
					'value' => '100,000'
				),
				array(
					'planame' => 'PA owner Death only',
					'value' => '1,500,000'
				),
				array(
					'planame' => 'Hospital Cash ( Daily cash Benefit for 10 days)',
					'value' => '1000/day'
				)),

			  '35' => array(
				array(
				'planame' => 'Fire & burglary excluding theft (for Content)',
				'value' => '3,500,000'
				),
				array(
					'planame' => 'Money In Safe /Tilt',
					'value' => '100,000'
				),
				array(
					'planame' => 'Money In Transit (Theft)',
					'value' => '100,000'
				),
				array(
					'planame' => 'Public Liability (Legal Liability)',
					'value' => '150,000'
				),
				array(
					'planame' => 'PA owner Death only',
					'value' => '1,500,000'
				),
				array(
					'planame' => 'Hospital Cash ( Daily cash Benefit for 10 days)',
					'value' => '2000/day'
				))

		);
		return $constructionArray;
		
	}
}

