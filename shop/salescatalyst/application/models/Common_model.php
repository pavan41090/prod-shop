<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	}

public function customer(){

  $CustomerArray = array( 
	
		array('id'=> '09:00 AM','name'=>'09:00 AM'),
		array('id'=> '09:30 AM','name'=>'09:30 AM'),
		array('id'=> '10:00 AM','name'=>'10:00 AM'),
		array('id'=> '10:30 AM','name'=>'10:30 AM'),
		array('id'=> '11:00 AM','name'=>'11:00 AM'),
		array('id'=> '11:30 AM','name'=>'11:30 AM'),
		array('id'=> '12:00 PM','name'=>'12:00 PM'),
		array('id'=> '12:30 PM','name'=>'12:30 PM'),
		array('id'=> '13:00 PM','name'=>'13:00 PM'),
		array('id'=> '13:30 PM','name'=>'13:30 PM'),
		array('id'=> '14:00 PM','name'=>'14:00 PM'),
		array('id'=> '14:30 PM','name'=>'14:30 PM'),
		array('id'=> '15:00 PM','name'=>'15:00 PM'),
		array('id'=> '15:30 PM','name'=>'15:30 PM'),
		array('id'=> '16:00 PM','name'=>'16:00 PM'),
		array('id'=> '16:30 PM','name'=>'16:30 PM'),
		array('id'=> '17:00 PM','name'=>'17:00 PM'),
		array('id'=> '17:30 PM','name'=>'17:30 PM'),
		array('id'=> '18:00 PM','name'=>'18:00 PM'),
		array('id'=> '18:30 PM','name'=>'18:30 PM'),	
		array('id'=> '19:00 PM','name'=>'19:00 PM'),
		array('id'=> '19:30 PM','name'=>'19:30 PM'),
	);
	return $CustomerArray;
}

public function language(){

  $languageArray = array( 
  		array('id'=> 'Assamese','name'=>'Assamese'),
  		array('id'=> 'Bengali','name'=>'Bengali'),
		array('id'=> 'Bodo','name'=>'Bodo'),
		array('id'=> 'Dogri','name'=>'Dogri'),
		array('id'=> 'English','name'=>'English'),
		array('id'=> 'Gujarati','name'=>'Gujarati'),
		array('id'=> 'Hindi','name'=>'Hindi'),
		array('id'=> 'Kannada','name'=>'Kannada'),
		array('id'=> 'Kashmiri','name'=>'Kashmiri'),
		array('id'=> 'Konkani','name'=>'Konkani'),
		array('id'=> 'Maithili','name'=>'Maithili'),
		array('id'=> 'Malayalam','name'=>'Malayalam'),
		array('id'=> 'Marathi','name'=>'Marathi'),
		array('id'=> 'Manipuri','name'=>'Manipuri'),
		array('id'=> 'Nepali','name'=>'Nepali'),
		array('id'=> 'Odia','name'=>'Odia'),
		array('id'=> 'Punjabi','name'=>'Punjabi'),
		array('id'=> 'Sanskrit','name'=>'Sanskrit'),
		array('id'=> 'Santali','name'=>'Santali'),
		array('id'=> 'Sindhi','name'=>'Sindhi'),
		array('id'=> 'Tamil','name'=>'Tamil'),
		array('id'=> 'Telugu','name'=>'Telugu'),
		array('id'=> 'Urdu','name'=>'Urdu'),
		
	);
	return $languageArray;
}

public function Emi(){

  $emiArray = array( 
		array('id'=> 'No','name'=>'No'),
		array('id'=> 'Yes','name'=>'Yes'),
	);
	return $emiArray;
}


public function emiYears(){

	  $emiYRArray = array( 
		
		array('id'=> '12','name'=>'1.25 % for 12 months'),
		array('id'=> '24','name'=>'1.1 % for 24 months'),
	);
	return $emiYRArray;
}


public function sdate(){

  $sdateArray = array( 
		array('id'=> 'Today','name'=>'Today'),
		array('id'=> 'After Two Days','name'=>'After Two Days'),
		array('id'=> 'After One Week','name'=>'After One Week'),
		array('id'=> 'After One Month','name'=>'After One Month'),
	);
	return $sdateArray;
}

public function typebusiness(){

  $businessArray = array( 
		array('id'=> 'old','name'=>'Old'),
		array('id'=> 'New','name'=>'New'),
		array('id'=> 'Renewal', 'name'=>'Renewal'),
	);
	return $businessArray;
}

public function customerSalutation(){

  $salutArray = array( 
		array('id'=> 'MR','name'=>'MR'),
		array('id'=> 'MRS','name'=>'MRS'),
		array('id'=> 'MS','name'=>'MS'),
		array('id'=> 'Master','name'=>'Master'),
		array('id'=> 'DR','name'=>'DR'),
	);
	return $salutArray;
}



public function getCategory(){

	$CategoryArray11 = array( 
		//Changing the category value 
	    array('id'=> 'PB','name'=>'Phone Banking'),
		array('id'=> 'DT','name'=>'DT'),
		array('id'=> 'VRM','name'=>'VRM'),
		array('id'=> 'COP','name'=>'COP'),
		array('id'=> 'Prime','name'=>'Prime'),
		array('id'=> 'UO','name'=>'Unified Outbound'),
		array('id'=> 'Other','name'=>'Others'),
	); 

	return $CategoryArray11;


}

//Sub channel Array

public function getCampaignName(){

	$CampaignArray = array( 
		
	    array('id'=> 'DAILY_CAMPAIGN_GI_DC1','name'=>'DAILY_CAMPAIGN_GI_DC1'),
		array('id'=> 'DAILY_CAMPAIGN_GI_DC2','name'=>'DAILY_CAMPAIGN_GI_DC2'),
		array('id'=> 'GI_2YRS_PA','name'=>'GI_2YRS_PA'),
		array('id'=> 'GI_EARLY_VINTAGE_FHC60','name'=>'GI_EARLY_VINTAGE_FHC60'),
		array('id'=> 'GI_FAMILY_2_YRS_HUB','name'=>'GI_FAMILY_2_YRS_HUB'),
		array('id'=> 'GI_FAMILY_2_YRS_HUB_SPOKE','name'=>'GI_FAMILY_2_YRS_HUB_SPOKE'),
		array('id'=> 'GI_FAMILY_2_YRS_SPOKE','name'=>'GI_FAMILY_2_YRS_SPOKE'),
		array('id'=> 'GI_INWARD_CLEARANCE','name'=>'GI_INWARD_CLEARANCE'),
		array('id'=> 'GI_LI_XSELL','name'=>'GI_LI_XSELL'),
		array('id'=> 'GI_LIAB','name'=>'GI_LIAB'),
		array('id'=> 'GI_NEVER_USED_HUB','name'=>'GI_NEVER_USED_HUB'),
		array('id'=> 'GI_NEVER_USED_SPOKE','name'=>'GI_NEVER_USED_SPOKE'),
		array('id'=> 'GI_PERSONAL_ACCIDENT','name'=>'GI_PERSONAL_ACCIDENT'),
		array('id'=> 'GI_REG','name'=>'GI_REG'),
		array('id'=> 'GI_RENEWAL','name'=>'GI_RENEWAL'),
		array('id'=> 'GI_Renewed','name'=>'GI_Renewed'),
		array('id'=> 'GI_RETENTION','name'=>'GI_RETENTION'),
		array('id'=> 'GI_SELF/FAMILY_FHC/IC_1_YR_HUB','name'=>'GI_SELF/FAMILY_FHC/IC_1_YR_HUB'),
		array('id'=> 'GI_SELF/FAMILY_FHC/IC_1_YR_SPOKE','name'=>'GI_SELF/FAMILY_FHC/IC_1_YR_SPOKE'),
		array('id'=> 'LBC_LIABILITY X SELL','name'=>'LBC_LIABILITY X SELL'),
		array('id'=> 'Renewed CVM','name'=>'Renewed CVM'),
	); 

	return $CampaignArray;

}


public function getBusiness(){


$BusinessArray = array( 

		array('id'=> 'Property','name'=>'Property'),
		array('id'=> 'Engineering','name'=>'Engineering'),
		array('id'=> 'Motor_4W','name'=>'Motor 4W'),
		array('id'=> 'Motor_2W','name'=>'Motor 2W'),
		array('id'=> 'Motor_CV','name'=>'Motor CV'),
		array('id'=> 'Travel','name'=>'Travel'),
		array('id'=> 'Health','name'=>'Health'),
		array('id'=> 'Marine','name'=>'Marine'),
		array('id'=> 'Group_Health','name'=>'Group Health'),
		array('id'=> 'Personal_Accident','name'=>' Personal Accident'),
		array('id'=> 'Package_Policy','name'=>'Package Policy'),
		array('id'=> 'Liability','name'=>'Liability'),
		array('id'=> 'Miscellaneous','name'=>'Miscellaneous'),
		array('id'=> 'Home','name'=>'Home'),
		array('id'=> 'Critical Illnes','name'=>'Critical Illnes'),
		array('id'=> 'Super Ship','name'=>'Super Ship'),
	);   

	return $BusinessArray;

}

public function getBranchLocation(){


		$str = file_get_contents(FILE_PATH.'/assets/json/branch-location.json');
		$json = json_decode($str, true);

		$json = $this->array_sort($json, 'Location name', SORT_ASC);
		$location=array();
		$manufaceturer=array();
		foreach($json as $value )
		{
			if(isset($value['Location name'])) {
				array_push($location, $value['Location name']);
			}	
		}
		
		return $location;

}

	public function array_sort($array, $on, $order=SORT_ASC){

	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
	        foreach ($array as $k => $v) {
	            if (is_array($v)) {
	                foreach ($v as $k2 => $v2) {
	                    if ($k2 == $on) {
	                        $sortable_array[$k] = $v2;
	                    }
	                }
	            } else {
	                $sortable_array[$k] = $v;
	            }
	        }

	        switch ($order) {
	            case SORT_ASC:
	                asort($sortable_array);
	                break;
	            case SORT_DESC:
	                arsort($sortable_array);
	                break;
	        }

	        foreach ($sortable_array as $k => $v) {
	            $new_array[$k] = $array[$k];
	        }
	    }

	    return $new_array;
	}


public function getGiLocation(){
	$GiLocationArray = array( 

		array('id'=> '22','name'=>'Mumbai-Andheri','Segment'=>'Metro','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Mumbai-City'),
		array('id'=> '25','name'=>'Mumbai-Vashi','Segment'=>'Metro','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Mumbai-City'),
		array('id'=> '23','name'=>'Mumbai-Worli','Segment'=>'Metro','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Mumbai-City'),
		array('id'=> '24','name'=>'Thane -Mumbai','Segment'=>'Metro','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Thane'),
		array('id'=> '51','name'=>'Hyderabad','Segment'=>'Metro','Zone'=>'SOUTH','State'=>'Telangana','District Name'=>'Hyderabad_Urban'),
		array('id'=> '41','name'=>'Bangalore_Hebbal','Segment'=>'Metro','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Bangalore_Urban'),
          array('id'=> '10','name'=>'Bangalore HO','Segment'=>'Metro','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Bangalore'),

		array('id'=> '11','name'=>'Delhi_CP','Segment'=>'Metro','Zone'=>'NORTH','State'=>'Delhi','District Name'=>'Central'),
		array('id'=> '12','name'=>'Delhi_Pitampura','Segment'=>'Metro','Zone'=>'NORTH','State'=>'Delhi','District Name'=>'North_Delhi'),
		array('id'=> '31','name'=>'Chennai','Segment'=>'Metro','Zone'=>'SOUTH','State'=>'Tamil_Nadu','District Name'=>'Chennai'),
		array('id'=> '71','name'=>'Ahmadabad','Segment'=>'Urban','Zone'=>'WEST','State'=>'Gujarat','District Name'=>'Ahmedabad'),
		array('id'=> 'P1','name'=>'Ludhiana','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Punjab','District Name'=>'Ludhiana'),
		array('id'=> 'T1','name'=>'Coimbatore','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Tamil_Nadu','District Name'=>'Coimbatore'),
		array('id'=> '91','name'=>'Chandigarh','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Chandigarh','District Name'=>'Chandigarh'),
		array('id'=> 'K1','name'=>'Cochin','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Kerala','District Name'=>'Ernakulam'),
		array('id'=> '14','name'=>'Noida','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Uttar_Pradesh','District Name'=>'Gautam_Buddha_Nagar'),
		array('id'=> '61','name'=>'Kolkata-1','Segment'=>'Metro','Zone'=>'EAST','State'=>'West_Bengal','District Name'=>'Kolkatta'),
		array('id'=> '81','name'=>'Pune-1','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Pune'),
		array('id'=> 'M1','name'=>'Indore','Segment'=>'Urban','Zone'=>'WEST','State'=>'Madhya_Pradesh','District Name'=>'Indore'),
		array('id'=> 'A2','name'=>'Vijayawada','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Andhra_Pradesh','District Name'=>'Krishna_(NTR  				_District)'),
		array('id'=> 'A1','name'=>'Vishakhapatnam','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Andhra_Pradesh','District Name'=>'Vishakapatnam'),
		array('id'=> 'G1','name'=>'Baroda','Segment'=>'Urban','Zone'=>'WEST','State'=>'Gujarat','District Name'=>'Vadodara'),
		array('id'=> 'G2','name'=>'Surat','Segment'=>'Urban','Zone'=>'WEST','State'=>'Gujarat','District Name'=>'Surat'),
		array('id'=> '13','name'=>'Gurgaon','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Haryana','District Name'=>'Gurgaon'),
		array('id'=> 'O1','name'=>'Bhubaneswar','Segment'=>'Urban','Zone'=>'EAST','State'=>'Orissa','District Name'=>'Khurda'),
		array('id'=> 'P2','name'=>'Amritsar','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Punjab','District Name'=>'Amritsar'),
		array('id'=> 'P3','name'=>'Jalandhar','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Punjab','District Name'=>'Jalandhar'),
		array('id'=> 'T2','name'=>'Madurai','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Tamil_Nadu','District Name'=>'Madurai'),
		array('id'=> 'T3','name'=>'Salem','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Tamil_Nadu','District Name'=>'Salem'),
		array('id'=> 'U2','name'=>'Kanpur','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Uttar_Pradesh','District Name'=>'Kanpur_(Nagar)'),
		array('id'=> 'M2','name'=>'Bhopal','Segment'=>'Urban','Zone'=>'WEST','State'=>'Madhya_Pradesh','District Name'=>'Bhopal'),
		array('id'=> '62','name'=>'Kolkata-2','Segment'=>'Metro','Zone'=>'EAST','State'=>'West_Bengal','District Name'=>'Kolkatta'),
		array('id'=> 'N1','name'=>'Guwahati','Segment'=>'Urban','Zone'=>'EAST','State'=>'Assam','District Name'=>'Kamrup'),
		array('id'=> 'E2','name'=>'Mangalore','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Dakshina_Kannada'),
		array('id'=> 'E4','name'=>'Mysore','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Mysore'),
		array('id'=> 'Q1','name'=>'Ranchi','Segment'=>'Urban','Zone'=>'EAST','State'=>'Jharkhand','District Name'=>'Ranchi'),
		array('id'=> 'E1','name'=>'Bellary','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Bellary'),
		array('id'=> 'D1','name'=>'Nagpur','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Nagpur'),
		array('id'=> 'H1','name'=>'Hissar','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Haryana','District Name'=>'Hissar'),
		array('id'=> 'R2','name'=>'Udaipur','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Rajasthan','District Name'=>'Udaipur'),
		array('id'=> 'U3','name'=>'Allahabad','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Uttar_Pradesh','District Name'=>'Allahabad'),
		array('id'=> 'D2','name'=>'Nasik','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Nasik'),
		array('id'=> 'U4','name'=>'Agra','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Uttar_Pradesh','District Name'=>'Agra'),
		array('id'=> 'I1','name'=>'Panjim_(Goa)','Segment'=>'Urban','Zone'=>'WEST','State'=>'Goa','District Name'=>'North_Goa'),
		array('id'=> 'U1','name'=>'Lucknow','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Uttar_Pradesh','District Name'=>'Lucknow'),
		array('id'=> 'E6','name'=>'Hubli','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Dharwad'),
		array('id'=> 'R1','name'=>'Jaipur','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Rajasthan','District Name'=>'Jaipur'),
		array('id'=> 'F1','name'=>'Dehradun','Segment'=>'Urban','Zone'=>'NORTH','State'=>'UTTARAKHAND','District Name'=>'Dehradun'),
		array('id'=> '82','name'=>'Pune-2','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Pune'),
		array('id'=> 'C1','name'=>'Raipur','Segment'=>'Urban','Zone'=>'EAST','State'=>'Chattisgarh','District Name'=>'Raipur'),
		array('id'=> '51','name'=>'Secundrabad','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Telangana','District Name'=>'Hyderabad_Urban'),
		array('id'=> '52','name'=>'Thane_Mumbai','Segment'=>'Metro','Zone'=>'WEST','WEST'=>'Maharashtra','District Name'=>'Maharashtra'),
		array('id'=> '53','name'=>'Siliguri','Segment'=>'Urban','Zone'=>'EAST','State'=>'West_Bengal','District Name'=>'Darjeeling'),
		array('id'=> '54','name'=>'Trivandrum','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Kerala','District Name'=>'Trivandrum'),
		array('id'=> '55','name'=>'Solapur','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Solapur'),
		array('id'=> '56','name'=>'Kolhapur','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Kolhapur'),
		array('id'=> '57','name'=>'Sangli','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Sangli'),
		array('id'=> '58','name'=>'Aurangabad','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Aurangabad'),
		array('id'=> '59','name'=>'Jammu','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Jammu & Kashmir','District Name'=>'Jammu'),
		array('id'=> '60','name'=>'Rajkot','Segment'=>'Urban','Zone'=>'WEST','State'=>'Gujarat','District Name'=>'Rajkot'),
		array('id'=> '61','name'=>'Patna','Segment'=>'Urban','Zone'=>'EAST','State'=>'Bihar','District Name'=>'Patna'),
		array('id'=> '62','name'=>'Bijapur','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Bijapur'),
		array('id'=> '63','name'=>'JABALPUR','Segment'=>'Urban','Zone'=>'WEST','State'=>'Madhya Pradesh','District Name'=>'JABALPUR'),
		array('id'=> '64','name'=>'Bilaspur','Segment'=>'Urban','Zone'=>'EAST','State'=>'Chattisgarh','District Name'=>'Bilaspur'),
		array('id'=> '65','name'=>'Kannur','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Kerala','District Name'=>'Kannur'),
		array('id'=> '66','name'=>'Tirunelveli','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Tamil Nadu','District Name'=>'Tirunelveli'),
		array('id'=> '67','name'=>'Tumkur','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Tumkur'),
		array('id'=> '68','name'=>'Erode','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Tamil Nadu','District Name'=>'Erode'),
		array('id'=> '69','name'=>'KARIMNAGAR','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Telangana','District Name'=>'KARIMNAGAR'),
		array('id'=> '70','name'=>'NELLORE','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Andhra Pradesh','District Name'=>'NELLORE'),
		array('id'=> '71','name'=>'Himmatnagar','Segment'=>'Urban','Zone'=>'WEST','State'=>'Gujarat','District Name'=>'Himmatnagar'),
		array('id'=> '72','name'=>'WARANGAL','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Telangana','District Name'=>'WARANGAL'),
		array('id'=> '73','name'=>'KURNOOL','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Andhra Pradesh','District Name'=>'KURNOOL'),
		array('id'=> '74','name'=>'Bareilly','Segment'=>'Urban','Zone'=>'NORTH','State'=>'Uttar Pradesh','District Name'=>'Bareilly'),
		array('id'=> '75','name'=>'Tiruchirappalli','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Tamil Nadu','District Name'=>'Tiruchirappalli'),
		array('id'=> '76','name'=>'Kozhikode','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Kerala','District Name'=>'Kozhikode'),
		array('id'=> '77','name'=>'Thrissur','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Kerala','District Name'=>'Thrissur'),
		array('id'=> '78','name'=>'Kottayam','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Telangana','District Name'=>'Kottayam'),
		array('id'=> '79','name'=>'Belgaum','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Belgaum'),
		array('id'=> '80','name'=>'Gulbarga','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Gulbarga'),
		array('id'=> '81','name'=>'Davangere','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Karnataka','District Name'=>'Davangere'),
		array('id'=> '82','name'=>'Karnal','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Haryana','District Name'=>'Karnal'),
		array('id'=> '83','name'=>'Jamshedpur','Segment'=>'Urban','Zone'=>'EAST','State'=>'Jharkhand','District Name'=>'Jamshedpur'),
		array('id'=> '84','name'=>'Mehsana','Segment'=>'Urban','Zone'=>'WEST','State'=>'Gujarat','District Name'=>'Mehsana'),
		array('id'=> '85','name'=>'Nanded','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Nanded'),
		array('id'=> '86','name'=>'Kalyan','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Kalyan'),
		array('id'=> '87','name'=>'PCMC (Pimpri-Chinchwad)','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'PCMC (Pimpri-Chinchwad)'),
		array('id'=> '88','name'=>'Ahmednagar','Segment'=>'Urban','Zone'=>'WEST','State'=>'Maharashtra','District Name'=>'Ahmednagar'),
		array('id'=> '89','name'=>'Rourkela','Segment'=>'Urban','Zone'=>'EAST','State'=>'Odisha','District Name'=>'Sundergarh'),
		array('id'=> '90','name'=>'B2C','Segment'=>'B2C','Zone'=>'B2C','State'=>'B2C','District Name'=>'B2C'),
		array('id'=> '91','name'=>'Kochi','Segment'=>'Urban','Zone'=>'SOUTH','State'=>'Kerala','District Name'=>'Ernakulam'),
		

		
	
		
	); 

	return $GiLocationArray;
}

public function getPayment(){

	$PaymentArray = array( 
		array('id'=> 'Credit Card','name'=>'Credit Card'),
		array('id'=> 'Online-Payzapp','name'=>'Online-Payzapp'),
		array('id'=> 'Online-Net Banking','name'=>'Online-Net Banking'),
		array('id'=> 'Online-Easy EMI','name'=>'Online-Easy EMI'),
		
	);
	
	return $PaymentArray;


}
public function getPriority(){
	$PriorityArray = array(

		array('id' =>'High' ,'name' =>'High' ),
		array('id' =>'Medium' ,'name' =>'Medium' ),
		array('id' =>'Low' ,'name' =>'Low' ),

		);
	return $PriorityArray;

}

public function getOccupationList(){

	$occupationArray = array( 
		array('id'=> '5000','name'=>'MANAGER/ADMINISTRATIVE'),
		array('id'=> '5001','name'=>'BUSINESS OWNER'),
		array('id'=> '5002','name'=>'SALESPERSON DOING FIELD VISITS'),
		array('id'=> '5003','name'=>'PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)'),
		array('id'=> '5004','name'=>'IT/ITES PROFESSIONAL'),
		array('id'=> '5005','name'=>'BUILDER/CONTRACTOR'),
		array('id'=> '5006','name'=>'MACHINE OPERATOR/MANUAL LABOR'),
		array('id'=> '5007','name'=>'DRIVER (PRIVATE BUS / CAR)'),

	
); 

	return $occupationArray;
	
}

	public function getCityList(){
		$str = file_get_contents(FILE_PATH.'/assets/json/location.json');
		$json = json_decode($str, true);
		$json = $this->array_sort($json, 'RTA_LOC_NAME', SORT_ASC);
		$city=array();
		$manufaceturer=array();
		foreach($json as $value )
		{
		array_push($city, $value['RTA_LOC_NAME']);
		}

		return $city;
	}

	public function getCityListCompleteList(){
		$str = file_get_contents(FILE_PATH.'/assets/json/location.json');
		$json = json_decode($str, true);
		$city=array();
		$manufaceturer=array();
		foreach($json as $value )
		{
			$city[] = array('city'=>$value['RTA_LOC_NAME'], 'state'=>$value['STATE']);
		}

		return $city;
	}

	public function curlXML($url, $request){
		$headers = array(
                        "Content-type: text/xml;charset=\"utf-8\"",
                        "Accept: text/xml",
                        "Cache-Control: no-cache,private",
                        "Content-Encoding: gzip",
                        // "Content-Type: text/xml;charset=UTF-8",
                        "Pragma: no-cache",
                        "X-UA-Compatible: IE=EmulateIE8,IE=EmulateIE10",
                        "X-Content-Security-Policy: default-src 'self' uat.bhartiaxaonline.co.in",
                        "X-Frame-Options: SAMEORIGIN",
                        "Transfer-Encoding: chunked",
                        // "SOAPAction: http://connecting.website.com/WSDL_Service/GetPrice", 
                        "Content-length: " . strlen($request),
                    ); //SOAPAction: your op URL

        // PHP cURL  for https connection with auth
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // converting
        $response = curl_exec($ch); 
        curl_close($ch);

        return $response;
	}


	public function xmlstr_to_array($xmlstr){

		$doc = new DOMDocument();
		$doc->loadXML($xmlstr);
		$root = $doc->documentElement;
		$output = $this->domnode_to_array($root);
		$output['@root'] = $root->tagName;
		return $output;
	}


	public function domnode_to_array($node){
		$output = array();
		switch ($node->nodeType) {
			case XML_CDATA_SECTION_NODE:
			case XML_TEXT_NODE:
				$output = trim($node->textContent);
				break;
			case XML_ELEMENT_NODE:
				for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
					$child = $node->childNodes->item($i);
					$v = $this->domnode_to_array($child);
					if(isset($child->tagName)) {
						$t = $child->tagName;
						if(!isset($output[$t])) $output[$t] = array();
						$output[$t][] = $v;
					} elseif($v || $v === '0') {
						$output = (string) $v;
					}
				}
				if($node->attributes->length && !is_array($output)) { // Has attributes but isn't an array
					$output = array('@content'=>$output); // Change output into an array.
				}
				if(is_array($output)) {
					if($node->attributes->length) {
						$a = array();
						foreach($node->attributes as $attrName => $attrNode) {
							$a[$attrName] = (string) $attrNode->value;
						}
						$output['@attributes'] = $a;
					}
					foreach ($output as $t => $v) {
						if(is_array($v) && count($v)==1 && $t!='@attributes') $output[$t] = $v[0];
					}
				}
			break;
		}
		return $output;
	}

	public function get_ip(){
        if ( function_exists( 'apache_request_headers' ) ) {
            $headers = apache_request_headers();
        } else {
            $headers = $_SERVER;
        }
        //Get the forwarded IP if it exists
        if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
            $the_ip = $headers['X-Forwarded-For'];
        } elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
        ) {
            $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
        } else {
            
            $the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
        }
        if($the_ip == '') return '103.70.129.157';
        return $the_ip;
    }



    public function generateQuoteXml($xmlData) {
	


		$manufacturercar = trim($xmlData['manufacturercar']);
		$carvariant = trim($xmlData['carvariant']);
		$idvamount = round($xmlData['idvamount']);
		$caramount = trim($xmlData['caramount']);
		$carregistrationnumber = trim($xmlData['carregistrationnumber']);
		$foocar = trim($xmlData['foocar']);
		$citycar = trim($xmlData['mx_city']);
		$emailcar = trim($xmlData['emailcar']);
		$mobilecar = trim($xmlData['mobilecar']);
		$policytypecar = trim($xmlData['policytypecar']);
		$expiringcar = $xmlData['expiringcar'];
		$carCityReg = $xmlData['carCityReg'];
		$mxDOB = $xmlData['mx_DOB'];
		$mx_state=$xmlData['mx_state'];

		$carCc = $xmlData['carCc'];
		$carFuel = $xmlData['carFuel'];
		$carSeating = $xmlData['carSeating'];


		$dateExpirycar = date('Y-m-d', strtotime($xmlData['dateExpirycar']));


		$carState = trim($xmlData['carState']);

		if(isset($xmlData['ncbcar'])) {
			$ncbcar = trim($xmlData['ncbcar']);	
		} else {
			$ncbcar = 0;
		}

		//if($ncbcar == '') $ncbcar = 0;
		$split = explode('-', $carvariant);
		$vModal = $split[0];
		$vVariant = $split[1];

		$age = date("Y") - $foocar;
		$username = trim('msagent2');
		$password = md5(trim('Apple12!@#'));
		$currentIp = $this->get_ip();

		$apiData = array(
			'age' => $age,
			'username' => $username,
			'password' => $password,
			'vModal' => $vModal,
			'vVariant' => $vVariant,
			'ncbcar' => $ncbcar

		);		
		$this->session->set_userdata($apiData);


 
		
		$xml_post_string = '
					<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
				<soapenv:Header/>
				<soapenv:Body>
					<prov:serve>
						<prov:SessionDoc>
						
							<Session>
					<SessionData xmlns="http://schemas.cordys.com/bagi/b2c/emotor/bpm/1.0">
						<Index>1</Index>
						<InitTime>' .gmdate('D, d M Y H:i:s').' GMT</InitTime>
						<UserName>havaMtr</UserName>
						<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
						<OrderNo>NA</OrderNo>
						<QuoteNo>NA</QuoteNo>
						<Route>INT</Route>
						<Contract>MTR</Contract>
						<Channel/>
						<TransactionType>Quote</TransactionType>
						<TransactionStatus>Fresh</TransactionStatus>
						<ID>149752000732217958399196</ID>
						<UserAgentID>2C000024</UserAgentID>
						<Source>2C000024</Source>
					</SessionData>
					<tns:Vehicle xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
						<tns:TypeOfBusiness>TR</tns:TypeOfBusiness>
						<tns:AccessoryInsured>N</tns:AccessoryInsured>
						<tns:AccessoryValue>0</tns:AccessoryValue>
						<tns:BiFuelKit>
							<tns:IsBiFuelKit>N</tns:IsBiFuelKit>
							<tns:BiFuelKitValue>0</tns:BiFuelKitValue>
							<tns:ExternallyFitted>N</tns:ExternallyFitted>
						</tns:BiFuelKit>
						<tns:DateOfManufacture>'.$foocar.'-06-01T01:01:00.000</tns:DateOfManufacture>
						<tns:DateOfRegistration>'.$foocar.'-06-01T01:01:00.000</tns:DateOfRegistration>
						<tns:RiskType>FPV</tns:RiskType>
						<tns:Make>' .$manufacturercar.'</tns:Make>
						<tns:Model>'.$vModal.'</tns:Model>
						<tns:FuelType>'.$carFuel.'</tns:FuelType>
						<tns:Variant>'.$vVariant.'</tns:Variant>
						<tns:IDV>'.$idvamount.'</tns:IDV>
						<tns:VehicleAge>'.$age.'</tns:VehicleAge>
						<tns:CC>'.$carCc.'</tns:CC>
						<tns:PlaceOfRegistration>'.$citycar.'</tns:PlaceOfRegistration>
						<tns:SeatingCapacity>'.$carSeating.'</tns:SeatingCapacity>
						<tns:VehicleExtraTag01 />
						<tns:RegistrationNo />
						<tns:ExShowroomPrice>'.round($caramount).'</tns:ExShowroomPrice>
					</tns:Vehicle>
					<tns:Quote xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
						<tns:ExistingPolicy>
							<tns:Claims>'.$expiringcar.'</tns:Claims>
							<tns:PolicyType>Comprehensive</tns:PolicyType>
							<tns:EndDate>'.$dateExpirycar.'T23:59:59.000</tns:EndDate>
							<tns:NCB>' .$ncbcar. '</tns:NCB>
						</tns:ExistingPolicy>
						<tns:PolicyStartDate>' .date('Y-m-d', strtotime('+1 day', strtotime($dateExpirycar))).'T12:30:45.000</tns:PolicyStartDate>
						<tns:Deductible>0</tns:Deductible>
						<tns:PAFamilySI>0</tns:PAFamilySI>
						<tns:AgentNumber />
						<tns:DealerId />
						<tns:Premium>
							<tns:Discount />
						</tns:Premium>
						<tns:SelectedCovers>
							<CarDamageSelected>True</CarDamageSelected>
							<TPLiabilitySelected>True</TPLiabilitySelected>
							<PADriverSelected>True</PADriverSelected>
							<ZeroDepriciationSelected>False</ZeroDepriciationSelected>
							<RoadsideAssistanceSelected>False</RoadsideAssistanceSelected>
							<InvoicePriceSelected>False</InvoicePriceSelected>
							<PAFamilyPremiumSelected>False</PAFamilyPremiumSelected>
							<HospitalCashSelected>False</HospitalCashSelected>
							<MedicalExpensesSelected>False</MedicalExpensesSelected>
							<AmbulanceChargesSelected>False</AmbulanceChargesSelected>
							<EngineGearBoxProtectionSelected>False</EngineGearBoxProtectionSelected>
							<HydrostaticLockSelected>False</HydrostaticLockSelected>
							<KeyReplacementSelected>False</KeyReplacementSelected>
							<NoClaimBonusSameSlabSelected>False</NoClaimBonusSameSlabSelected>
							<CosumableCoverSelected>False</CosumableCoverSelected>
						</tns:SelectedCovers>
						<tns:PolicyEndDate>' .date('Y-m-d', strtotime('+1 year', strtotime($dateExpirycar))).'T23:59:59.000</tns:PolicyEndDate>
					</tns:Quote>
					<tns:Client xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
						<tns:ClientType>Individual</tns:ClientType>
						<tns:CltDOB>'.date('Ymd', strtotime($mxDOB)).'</tns:CltDOB>
						<tns:FinancierDetails>
							<tns:IsFinanced>0</tns:IsFinanced>
						</tns:FinancierDetails>
						<tns:GivName>' . strtoupper(substr($emailcar, 0, 4)).date('Ymd').time(). ' </tns:GivName>
						<tns:SurName />
						<CITY>' .$citycar. '</CITY>
						<state>' .$mx_state. '</state>
						<tns:ClientExtraTag01>' .$carState. '</tns:ClientExtraTag01>
						<tns:CityOfResidence>' .$carCityReg. '</tns:CityOfResidence>
						<tns:EmailID>'.$emailcar.'</tns:EmailID>
						<tns:MobileNo>'.$mobilecar.'</tns:MobileNo>
						<tns:RegistrationZone>A</tns:RegistrationZone>
					</tns:Client>
				</Session></prov:SessionDoc>
					</prov:serve>
				</soapenv:Body>
			</soapenv:Envelope>'; 

		return $xml_post_string;

	}




	public function generateQuoteXmlRepeat($xmlData){


		$currentIp = $this->get_ip();


		$xml_post_string = '
					<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:prov="http://schemas.cordys.com/gateway/Provider">
				<soapenv:Header/>
				<soapenv:Body>
					<prov:serve>
						<prov:SessionDoc>
							<Session>
					<SessionData xmlns="http://schemas.cordys.com/bagi/b2c/emotor/bpm/1.0">
						<Index>1</Index>
						<InitTime>' .gmdate('D, d M Y H:i:s').' GMT</InitTime>
						<UserName>havaMtr</UserName>
						<Password>AZg3Q1SktWKLz0Os/H0MlAxFfI75pjnpKjn9xrV9vimyyS7/5Ilil/ftcP5oHxC7IFYLVF0C3MAJcIznwrZvDA==</Password>
						<OrderNo>NA</OrderNo>
						<QuoteNo>NA</QuoteNo>
						<Route>INT</Route>
						<Contract>MTR</Contract>
						<Channel/>
						<TransactionType>Quote</TransactionType>
						<TransactionStatus>Fresh</TransactionStatus>
						<ID>149752000732217958399196</ID>
						<UserAgentID>2C000024</UserAgentID>
						<Source>2C000024</Source>
					</SessionData>
					<tns:Vehicle xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
						<tns:TypeOfBusiness>TR</tns:TypeOfBusiness>
						<tns:AccessoryInsured>'.$xmlData["electricalCheck"].'</tns:AccessoryInsured>
						<tns:AccessoryValue>'.$xmlData["electricalValue"].'</tns:AccessoryValue>
						<tns:BiFuelKit>
							<tns:IsBiFuelKit>'.$xmlData["lpgCngKit"].'</tns:IsBiFuelKit>
							<tns:BiFuelKitValue>'.$xmlData["lpgCngKitValue"].'</tns:BiFuelKitValue>
							<tns:ExternallyFitted>N</tns:ExternallyFitted>
						</tns:BiFuelKit>
						<tns:DateOfManufacture>'.$xmlData["foocar"].'-06-01T00:00:00.000</tns:DateOfManufacture>
						<tns:DateOfRegistration>'.$xmlData["foocar"].'-06-01T00:00:00.000</tns:DateOfRegistration>
						<tns:RiskType>FPV</tns:RiskType>
						<tns:Make>' .$xmlData["manufacturercar"]. '</tns:Make>
						<tns:Model>' .$xmlData["vModal"]. '</tns:Model>
						<tns:FuelType>P</tns:FuelType>
						<tns:Variant>' . $xmlData["vVariant"] . '</tns:Variant>
						<tns:IDV>' . round($xmlData["idvamount"]) . '</tns:IDV>
						<tns:VehicleAge>' . $xmlData["age"] . '</tns:VehicleAge>
						<tns:CC>1198</tns:CC>
						<tns:PlaceOfRegistration>' . strtoupper($xmlData["carCityReg"]) . '</tns:PlaceOfRegistration>
						<tns:SeatingCapacity>5</tns:SeatingCapacity>
						<tns:VehicleExtraTag01 />
						<tns:RegistrationNo />
						<tns:ExShowroomPrice>'.round($xmlData["caramount"]).'</tns:ExShowroomPrice>
					</tns:Vehicle>
					<tns:Quote xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
						<tns:ExistingPolicy>
							<tns:Claims>'.$xmlData["expiringcar"].'</tns:Claims>
							<tns:PolicyType>Comprehensive</tns:PolicyType>
							<tns:EndDate>' .date("Y-m-d").'T00:00:00.000</tns:EndDate>
							<tns:NCB>' . $xmlData["ncbcar"]. '</tns:NCB>
						</tns:ExistingPolicy>
						<tns:PolicyStartDate>' .date("Y-m-d").'T00:00:00.000</tns:PolicyStartDate>
						<tns:Deductible>'.$xmlData["voluntaryDeductible"].'</tns:Deductible>
						<tns:PAFamilySI>'.$xmlData["accidentFamilyCover"].'</tns:PAFamilySI>
						<tns:AgentNumber />
						<tns:DealerId />
						<tns:Premium>
							<tns:Discount />
						</tns:Premium>
						<tns:SelectedCovers>
							<CarDamageSelected>True</CarDamageSelected>
							<TPLiabilitySelected>True</TPLiabilitySelected>
							<PADriverSelected>False</PADriverSelected>
							<ZeroDepriciationSelected>False</ZeroDepriciationSelected>
							<RoadsideAssistanceSelected>False</RoadsideAssistanceSelected>
							<InvoicePriceSelected>False</InvoicePriceSelected>
							<PAFamilyPremiumSelected>False</PAFamilyPremiumSelected>
							<HospitalCashSelected>False</HospitalCashSelected>
							<MedicalExpensesSelected>False</MedicalExpensesSelected>
							<AmbulanceChargesSelected>False</AmbulanceChargesSelected>
							<EngineGearBoxProtectionSelected>False</EngineGearBoxProtectionSelected>
							<HydrostaticLockSelected>False</HydrostaticLockSelected>
							<KeyReplacementSelected>False</KeyReplacementSelected>
							<NoClaimBonusSameSlabSelected>False</NoClaimBonusSameSlabSelected>
							<CosumableCoverSelected>False</CosumableCoverSelected>
						</tns:SelectedCovers>
						<tns:PolicyEndDate>' .date("Y-m-d", strtotime("+1 years -1 days")). 'T23:59:59.000</tns:PolicyEndDate>
					</tns:Quote>
					<tns:Client xmlns:tns="http://schemas.cordys.com/bagi/b2c/emotor/2.0">
						<tns:ClientType>Individual</tns:ClientType>
						<tns:CltDOB>19851231</tns:CltDOB>
						<tns:FinancierDetails>
							<tns:IsFinanced>0</tns:IsFinanced>
						</tns:FinancierDetails>
						<tns:GivName>' .substr($xmlData["emailcar"], 0, 4).date('Ymd').time(). ' </tns:GivName>
						<tns:SurName />
						<CITY>'.$xmlData["citycar"]. '</CITY>
						<state>'.$xmlData["mx_state"]. '</state>
						<tns:ClientExtraTag01>'.$xmlData["carState"]. '</tns:ClientExtraTag01>
						<tns:CityOfResidence>'.$xmlData["carCityReg"]. '</tns:CityOfResidence>
						<tns:EmailID>'.$xmlData["emailcar"].'</tns:EmailID>
						<tns:MobileNo>' . $xmlData["mobilecar"] . '</tns:MobileNo>
						<tns:RegistrationZone>A</tns:RegistrationZone>
					</tns:Client>
				</Session></prov:SessionDoc>
					</prov:serve>
				</soapenv:Body>
			</soapenv:Envelope>';
			return $xml_post_string;

	}

public function getStateList(){
	$stateArray = array( 

		array('id'=>'jammu_kashmir', 'name'=> 'Jammu & Kashmir'),
		array('id'=>'Punjab', 'name'=> 'Punjab'),
		array('id'=>'Chandigarh', 'name'=> 'Chandigarh'),
		array('id'=>'Uttranchal', 'name'=> 'Uttranchal'),
		array('id'=>'Haryana', 'name'=> 'Haryana'),
		array('id'=>'Delhi', 'name'=> 'Delhi'),
		array('id'=>'Rajasthan', 'name'=> 'Rajasthan'),
		array('id'=>'Uttar_Pradesh', 'name'=> 'Uttar Pradesh'),
		array('id'=>'Bihar', 'name'=> 'Bihar'),
		array('id'=>'Sikkim', 'name'=> 'Sikkim'),
		array('id'=>'Arunachal_Pradesh', 'name'=> 'Arunachal Pradesh'),
		array('id'=>'Nagaland', 'name'=> 'Nagaland'),
		array('id'=>'Manipur', 'name'=> 'Manipur'),
		array('id'=>'Mizoram', 'name'=> 'Mizoram'),
		array('id'=>'Tripura', 'name'=> 'Tripura'),
		array('id'=>'Meghalaya', 'name'=> 'Meghalaya'),
		array('id'=>'Assam', 'name'=> 'Assam'),
		array('id'=>'West_Bengal', 'name'=> 'West Bengal'),
		array('id'=>'Jharkhand', 'name'=> 'Jharkhand'),
		array('id'=>'Orissa', 'name'=> 'Orissa'),
		array('id'=>'Chhattisgarh', 'name'=> 'Chhattisgarh'),
		array('id'=>'Madhya_Pradesh', 'name'=> 'Madhya Pradesh'),
		array('id'=>'Gujarat', 'name'=> 'Gujarat'),
		array('id'=>'Daman_Diu', 'name'=> 'Daman & Diu'),
		array('id'=>'Dadra_Nagar', 'name'=> 'Dadra & Nagar Haveli'),
		array('id'=>'Maharashtra', 'name'=> 'Maharashtra'),
		array('id'=>'Andhra_Pradesh', 'name'=> 'Andhra Pradesh'),
		array('id'=>'Jharkhand', 'name'=> 'Jharkhand'),
        array('id'=>'Karnataka', 'name'=> 'Karnataka'),
		array('id'=>'Goa', 'name'=> 'Goa'),
		array('id'=>'Himachal_Pradesh', 'name'=> 'Himachal Pradesh'),
		array('id'=>'Lakshdweep', 'name'=> 'Lakshdweep'),
		array('id'=>'Kerala', 'name'=> 'Kerala'),
		array('id'=>'Tamil_Nadu', 'name'=> 'Tamil Nadu'),
		array('id'=>'Pondicherry', 'name'=> 'Pondicherry'),
		array('id'=>'Andaman_Nicobar', 'name'=> 'Andaman & Nicobar Islands'),
		array('id'=>'Telangana', 'name'=> 'Telangana'),
	); 

	return $stateArray;
}


public function getStateCityList(){
	$statecityArray = array(
		//TN
	    array('id'=>'Arakkonam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Arakkonam'),
	    array('id'=>'Arcot', 'ctry'=>'Tamil_Nadu',  'name'=> 'Arcot'),
	    array('id'=>'Aruppukkottai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Aruppukkottai'),
	    array('id'=>'Bhavani', 'ctry'=>'Tamil_Nadu',  'name'=> 'Bhavani'),
	    array('id'=>'Chengalpattu', 'ctry'=>'Tamil_Nadu',  'name'=> 'Chengalpattu'),
	    array('id'=>'Chennai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Chennai'),
	    array('id'=>'Chinna_salem', 'ctry'=>'Tamil_Nadu',  'name'=> 'Chinna salem'),
	    array('id'=>'Coimbatore', 'ctry'=>'Tamil_Nadu',  'name'=> 'Coimbatore'),
	    array('id'=>'Coonoor', 'ctry'=>'Tamil_Nadu',  'name'=> 'Coonoor'),
	    array('id'=>'Cuddalore', 'ctry'=>'Tamil_Nadu',  'name'=> 'Cuddalore'),
	    array('id'=>'Dharmapuri', 'ctry'=>'Tamil_Nadu',  'name'=> 'Dharmapuri'),
	    array('id'=>'Dindigul', 'ctry'=>'Tamil_Nadu',  'name'=> 'Dindigul'),
	    array('id'=>'Erode', 'ctry'=>'Tamil_Nadu',  'name'=> 'Erode'),
	    array('id'=>'Gudalur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Gudalur'),
	    array('id'=>'Kanchipuram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Kanchipuram'),
	    array('id'=>'Karaikudi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Karaikudi'),
	    array('id'=>'Karungal', 'ctry'=>'Tamil_Nadu',  'name'=> 'Karungal'),
	    array('id'=>'Karur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Karur'),
	    array('id'=>'Kollankodu', 'ctry'=>'Tamil_Nadu',  'name'=> 'Kollankodu'),
	    array('id'=>'Lalgudi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Lalgudi'),
	    array('id'=>'Madurai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Madurai'),
	    array('id'=>'Nagapattinam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Nagapattinam'),
	    array('id'=>'Nagercoil', 'ctry'=>'Tamil_Nadu',  'name'=> 'Nagercoil'),
	    array('id'=>'Namagiripettai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Namagiripettai'),
	    array('id'=>'Namakkal', 'ctry'=>'Tamil_Nadu',  'name'=> 'Namakkal'),
	    array('id'=>'Nandivaram_Guduvancheri', 'ctry'=>'Tamil_Nadu',  'name'=> 'Nandivaram-Guduvancheri'),
	    array('id'=>'Nanjikottai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Nanjikottai'),
	    array('id'=>'Natham', 'ctry'=>'Tamil_Nadu',  'name'=> 'Natham'),
	    array('id'=>'Nellikuppam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Nellikuppam'),
	    array('id'=>'Neyveli', 'ctry'=>'Tamil_Nadu',  'name'=> 'Neyveli'),
	    array('id'=>'O_Valley  ', 'ctry'=>'Tamil_Nadu',  'name'=> 'O Valley  '),
	    array('id'=>'Oddanchatram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Oddanchatram'),
	    array('id'=>'P_N_Patti', 'ctry'=>'Tamil_Nadu',  'name'=> 'P.N.Patti'),
	    array('id'=>'Pacode', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pacode'),
	    array('id'=>'Padmanabhapuram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Padmanabhapuram'),
	    array('id'=>'Palani', 'ctry'=>'Tamil_Nadu',  'name'=> 'Palani'),
	    array('id'=>'Palladam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Palladam'),
	    array('id'=>'Pallapatti', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pallapatti'),
	    array('id'=>'Pallikonda', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pallikonda'),
	    array('id'=>'Panagudi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Panagudi'),
	    array('id'=>'Panruti', 'ctry'=>'Tamil_Nadu',  'name'=> 'Panruti'),
	    array('id'=>'Paramakudi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Paramakudi'),
	    array('id'=>'Parangipettai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Parangipettai'),
	    array('id'=>'Pattukkottai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pattukkottai'),
	    array('id'=>'Perambalur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Perambalur'),
	    array('id'=>'Peravurani', 'ctry'=>'Tamil_Nadu',  'name'=> 'Peravurani'),
	    array('id'=>'Periyakulam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Periyakulam'),
	    array('id'=>'Periyasemur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Periyasemur'),
	    array('id'=>'Pernampattu', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pernampattu'),
	    array('id'=>'Pollachi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pollachi'),
	    array('id'=>'Polur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Polur'),
	    array('id'=>'Ponneri', 'ctry'=>'Tamil_Nadu',  'name'=> 'Ponneri'),
	    array('id'=>'Pudukkottai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pudukkottai'),
	    array('id'=>'Pudupattinam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Pudupattinam'),
	    array('id'=>'Puliyankudi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Puliyankudi'),
	    array('id'=>'Punjaipugalur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Punjaipugalur'),
	    array('id'=>'Rajapalayam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Rajapalayam'),
	    array('id'=>'Ramanathapuram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Ramanathapuram'),
	    array('id'=>'Rameshwaram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Rameshwaram'),
	    array('id'=>'Rasipuram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Rasipuram'),
	    array('id'=>'Salem', 'ctry'=>'Tamil_Nadu',  'name'=> 'Salem'),
	    array('id'=>'Sankarankoil', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sankarankoil'),
	    array('id'=>'Sankari', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sankari'),
	    array('id'=>'Sathyamangalam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sathyamangalam'),
	    array('id'=>'Sattur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sattur'),
	    array('id'=>'Shenkottai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Shenkottai'),
	    array('id'=>'Sholavandan', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sholavandan'),
	    array('id'=>'Sholingur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sholingur'),
	    array('id'=>'Sirkali', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sirkali'),
	    array('id'=>'Sivaganga', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sivaganga'),
	    array('id'=>'Sivagiri', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sivagiri'),
	    array('id'=>'Sivakasi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Sivakasi'),
	    array('id'=>'Srivilliputhur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Srivilliputhur'),
	    array('id'=>'Surandai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Surandai'),
	    array('id'=>'Suriyampalayam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Suriyampalayam'),
	    array('id'=>'Tenkasi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tenkasi'),
	    array('id'=>'Thammampatti', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thammampatti'),
	    array('id'=>'Thanjavur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thanjavur'),
	    array('id'=>'Tharamangalam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tharamangalam'),
	    array('id'=>'Tharangambadi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tharangambadi'),
	    array('id'=>'Theni_Allinagaram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Theni Allinagaram'),
	    array('id'=>'Thirumangalam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thirumangalam'),
	    array('id'=>'Thirunindravur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thirunindravur'),
	    array('id'=>'Thiruparappu', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thiruparappu'),
	    array('id'=>'Thirupuvanam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thirupuvanam'),
	    array('id'=>'Thiruthuraipoondi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thiruthuraipoondi'),
	    array('id'=>'Thiruvallur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thiruvallur'),
	    array('id'=>'Thiruvarur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thiruvarur'),
	    array('id'=>'Thoothukudi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thoothukudi'),
	    array('id'=>'Thuraiyur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Thuraiyur'),
	    array('id'=>'Tindivanam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tindivanam'),
	    array('id'=>'Tiruchendur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tiruchendur'),
	    array('id'=>'Tiruchengode', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tiruchengode'),
	    array('id'=>'Tiruchirappalli', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tiruchirappalli'),
	    array('id'=>'Tirukalukundram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tirukalukundram'),
	    array('id'=>'Tirukkoyilur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tirukkoyilur'),
	    array('id'=>'Tirunelveli', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tirunelveli'),
	    array('id'=>'Tiruppur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tiruppur'),
	    array('id'=>'Tiruttani', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tiruttani'),
	    array('id'=>'Tiruvannamalai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tiruvannamalai'),
	    array('id'=>'Tiruvethipuram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tiruvethipuram'),
	    array('id'=>'Tittakudi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Tittakudi'),
	    array('id'=>'Udhagamandalam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Udhagamandalam'),
	    array('id'=>'Udumalaipettai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Udumalaipettai'),
	    array('id'=>'Unnamalaikadai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Unnamalaikadai'),
	    array('id'=>'Usilampatti', 'ctry'=>'Tamil_Nadu',  'name'=> 'Usilampatti'),
	    array('id'=>'Uthamapalayam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Uthamapalayam'),
	    array('id'=>'Uthiramerur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Uthiramerur'),
	    array('id'=>'Vadakkuvalliyur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vadakkuvalliyur'),
	    array('id'=>'Vadalur', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vadalur'),
	    array('id'=>'Vadipatti', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vadipatti'),
	    array('id'=>'Valparai', 'ctry'=>'Tamil_Nadu',  'name'=> 'Valparai'),
	    array('id'=>'Vandavasi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vandavasi'),
	    array('id'=>'Vaniyambadi', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vaniyambadi'),
	    array('id'=>'Vedaranyam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vedaranyam'),
	    array('id'=>'Vellakoil', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vellakoil'),
	    array('id'=>'Vellore', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vellore'),
	    array('id'=>'Vikramasingapuram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Vikramasingapuram'),
	    array('id'=>'Viluppuram', 'ctry'=>'Tamil_Nadu',  'name'=> 'Viluppuram'),
	    array('id'=>'Virudhachalam', 'ctry'=>'Tamil_Nadu',  'name'=> 'Virudhachalam'),
	    array('id'=>'Virudhunagar', 'ctry'=>'Tamil_Nadu',  'name'=> 'Virudhunagar'),
	    array('id'=>'Viswanatham', 'ctry'=>'Tamil_Nadu',  'name'=> 'Viswanatham'),
     


     //kerala
	    array('id'=>'Adoor',  'name'=> 'Adoor',  'ctry'=>'Kerala' ),
	    array('id'=>'Akathiyoor',  'name'=> 'Akathiyoor',  'ctry'=>'Kerala' ),
	    array('id'=>'Alappuzha',  'name'=> 'Alappuzha',  'ctry'=>'Kerala' ),
	    array('id'=>'Ancharakandy',  'name'=> 'Ancharakandy',  'ctry'=>'Kerala' ),
	    array('id'=>'Aroor',  'name'=> 'Aroor',  'ctry'=>'Kerala' ),
	    array('id'=>'Ashtamichira',  'name'=> 'Ashtamichira',  'ctry'=>'Kerala' ),
	    array('id'=>'Attingal',  'name'=> 'Attingal',  'ctry'=>'Kerala' ),
	    array('id'=>'Avinissery',  'name'=> 'Avinissery',  'ctry'=>'Kerala' ),
	    array('id'=>'Chalakudy',  'name'=> 'Chalakudy',  'ctry'=>'Kerala' ),
	    array('id'=>'Changanassery',  'name'=> 'Changanassery',  'ctry'=>'Kerala' ),
	    array('id'=>'Chendamangalam',  'name'=> 'Chendamangalam',  'ctry'=>'Kerala' ),
	    array('id'=>'Chengannur',  'name'=> 'Chengannur',  'ctry'=>'Kerala' ),
	    array('id'=>'Cherthala',  'name'=> 'Cherthala',  'ctry'=>'Kerala' ),
	    array('id'=>'Cheruthazham',  'name'=> 'Cheruthazham',  'ctry'=>'Kerala' ),
	    array('id'=>'Chittur_Thathamangalam',  'name'=> 'Chittur-Thathamangalam',  'ctry'=>'Kerala' ),
	    array('id'=>'Chockli',  'name'=> 'Chockli',  'ctry'=>'Kerala' ),
	    array('id'=>'Erattupetta',  'name'=> 'Erattupetta',  'ctry'=>'Kerala' ),
	    array('id'=>'Guruvayoor',  'name'=> 'Guruvayoor',  'ctry'=>'Kerala' ),
	    array('id'=>'Irinjalakuda',  'name'=> 'Irinjalakuda',  'ctry'=>'Kerala' ),
	    array('id'=>'Kadirur',  'name'=> 'Kadirur',  'ctry'=>'Kerala' ),
	    array('id'=>'Kalliasseri',  'name'=> 'Kalliasseri',  'ctry'=>'Kerala' ),
	    array('id'=>'Kalpetta',  'name'=> 'Kalpetta',  'ctry'=>'Kerala' ),
	    array('id'=>'Kanhangad',  'name'=> 'Kanhangad',  'ctry'=>'Kerala' ),
	    array('id'=>'Kanjikkuzhi',  'name'=> 'Kanjikkuzhi',  'ctry'=>'Kerala' ),
	    array('id'=>'Kannur',  'name'=> 'Kannur',  'ctry'=>'Kerala' ),
	    array('id'=>'Kasaragod',  'name'=> 'Kasaragod',  'ctry'=>'Kerala' ),
	    array('id'=>'Kayamkulam',  'name'=> 'Kayamkulam',  'ctry'=>'Kerala' ),
	    array('id'=>'Kochi',  'name'=> 'Kochi',  'ctry'=>'Kerala' ),
	    array('id'=>'Kodungallur',  'name'=> 'Kodungallur',  'ctry'=>'Kerala' ),
	    array('id'=>'Kollam',  'name'=> 'Kollam',  'ctry'=>'Kerala' ),
	    array('id'=>'Koothuparamba',  'name'=> 'Koothuparamba',  'ctry'=>'Kerala' ),
	    array('id'=>'Kothamangalam',  'name'=> 'Kothamangalam',  'ctry'=>'Kerala' ),
	    array('id'=>'Kottayam',  'name'=> 'Kottayam',  'ctry'=>'Kerala' ),
	    array('id'=>'Kozhikode',  'name'=> 'Kozhikode',  'ctry'=>'Kerala' ),
	    array('id'=>'Kunnamkulam',  'name'=> 'Kunnamkulam',  'ctry'=>'Kerala' ),
	    array('id'=>'Malappuram',  'name'=> 'Malappuram',  'ctry'=>'Kerala' ),
	    array('id'=>'Mattannur',  'name'=> 'Mattannur',  'ctry'=>'Kerala' ),
	    array('id'=>'Mavelikkara',  'name'=> 'Mavelikkara',  'ctry'=>'Kerala' ),
	    array('id'=>'Muvattupuzha',  'name'=> 'Muvattupuzha',  'ctry'=>'Kerala' ),
	    array('id'=>'Nedumangad',  'name'=> 'Nedumangad',  'ctry'=>'Kerala' ),
	    array('id'=>'Neyyattinkara',  'name'=> 'Neyyattinkara',  'ctry'=>'Kerala' ),
	    array('id'=>'Ottappalam',  'name'=> 'Ottappalam',  'ctry'=>'Kerala' ),
	    array('id'=>'Palai',  'name'=> 'Palai',  'ctry'=>'Kerala' ),
	    array('id'=>'Palakkad',  'name'=> 'Palakkad',  'ctry'=>'Kerala' ),
	    array('id'=>'Panniyannur',  'name'=> 'Panniyannur',  'ctry'=>'Kerala' ),
	    array('id'=>'Pappinisseri',  'name'=> 'Pappinisseri',  'ctry'=>'Kerala' ),
	    array('id'=>'Paravoor',  'name'=> 'Paravoor',  'ctry'=>'Kerala' ),
	    array('id'=>'Pathanamthitta',  'name'=> 'Pathanamthitta',  'ctry'=>'Kerala' ),
	    array('id'=>'Payyannur',  'name'=> 'Payyannur',  'ctry'=>'Kerala' ),
	    array('id'=>'Peringathur',  'name'=> 'Peringathur',  'ctry'=>'Kerala' ),
	    array('id'=>'Perinthalmanna',  'name'=> 'Perinthalmanna',  'ctry'=>'Kerala' ),
	    array('id'=>'Perumbavoor',  'name'=> 'Perumbavoor',  'ctry'=>'Kerala' ),
	    array('id'=>'Ponnani',  'name'=> 'Ponnani',  'ctry'=>'Kerala' ),
	    array('id'=>'Punalur',  'name'=> 'Punalur',  'ctry'=>'Kerala' ),
	    array('id'=>'Quilandy',  'name'=> 'Quilandy',  'ctry'=>'Kerala' ),
	    array('id'=>'Shoranur',  'name'=> 'Shoranur',  'ctry'=>'Kerala' ),
	    array('id'=>'Taliparamba',  'name'=> 'Taliparamba',  'ctry'=>'Kerala' ),
	    array('id'=>'Thiruvalla',  'name'=> 'Thiruvalla',  'ctry'=>'Kerala' ),
	    array('id'=>'Thiruvananthapuram',  'name'=> 'Thiruvananthapuram',  'ctry'=>'Kerala' ),
	    array('id'=>'Thodupuzha',  'name'=> 'Thodupuzha',  'ctry'=>'Kerala' ),
	    array('id'=>'Tirur',  'name'=> 'Tirur',  'ctry'=>'Kerala' ),
	    array('id'=>'Vadakara',  'name'=> 'Vadakara',  'ctry'=>'Kerala' ),
	    array('id'=>'Vaikom',  'name'=> 'Vaikom',  'ctry'=>'Kerala' ),
	    array('id'=>'Varkala',  'name'=> 'Varkala',  'ctry'=>'Kerala' ),



       //Andaman_Nicobar

            array('id'=>'Port_Blair', 'ctry'=>'Andaman_Nicobar',  'name'=> 'Port Blair'),
	    

		// ANDHRA


	    array('id'=>'Bapatla ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bapatla'),
	    array('id'=>'Rayadurg', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Rayadurg'),
	    array('id'=>'Renigunta ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Renigunta'),
	    array('id'=>'Repalle  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Repalle'),
	    array('id'=>'Sadasivpet', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Sadasivpet'),
	    array('id'=>'Salur', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Salur'),
	    array('id'=>'Samalkot', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Samalkot'),
	    array('id'=>'Sangareddy', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Sangareddy'),
	    array('id'=>'Sattenapalle', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Sattenapalle'),
	    array('id'=>'Siddipet', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Siddipet'),
	    array('id'=>'Singapur', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Singapur'),
	    array('id'=>'Bellampalle', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bellampalle'),
	    array('id'=>'Sircilla ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Sircilla '),
	    array('id'=>'Srikakulam   ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Srikakulam   '),
	    array('id'=>'Srikalahasti ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Srikalahasti '),
	    array('id'=>'Suryapet', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Suryapet'),
	    array('id'=>'Tadepalligudem', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Tadepalligudem'),
	    array('id'=>'Tadpatri', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Tadpatri'),
	    array('id'=>'Tandur', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Tandur'),
	    array('id'=>'Tanuku', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Tanuku'),
	    array('id'=>'Tenali', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Tenali'),
	    array('id'=>'Tirupati', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Tirupati'),
	    array('id'=>'Bethamcherla', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bethamcherla'),
	    array('id'=>'Tuni ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Tuni '),
	    array('id'=>'Uravakonda', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Uravakonda'),
	    array('id'=>'Venkatagiri', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Venkatagiri'),
	    array('id'=>'Vicarabad', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Vicarabad'),
	    array('id'=>'Vijayawada', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Vijayawada'),
	    array('id'=>'Vinukonda ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Vinukonda '),
	    array('id'=>'Visakhapatnam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Visakhapatnam '),
	    array('id'=>'Vizianagaram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Vizianagaram '),
	    array('id'=>'Wanaparthy  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Wanaparthy  '),
	    array('id'=>'Warangal ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Warangal '),
	    array('id'=>'Bhadrachalam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bhadrachalam '),
	    array('id'=>'Yellandu ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Yellandu '),
	    array('id'=>'Yemmiganur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Yemmiganur '),
	    array('id'=>'Yerraguntla  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Yerraguntla '),
	    array('id'=>'Zahirabad ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Zahirabad  '),
	    array('id'=>'Bhainsa ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bhainsa '),
	    array('id'=>'Bheemunipatnam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bheemunipatnam '),
	    array('id'=>'Bhimavaram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bhimavaram '),
	    array('id'=>'Bhongir ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bhongir '),
	    array('id'=>'Bobbili ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bobbili '),
	    array('id'=>'Bodhan  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Bodhan  '),
	    array('id'=>'Adilabad ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Adilabad '),
	    array('id'=>'Chirala ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Chirala '),
	    array('id'=>'Chittoor ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Chittoor '),
	    array('id'=>'Devarakonda ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Devarakonda '),
	    array('id'=>'Eluru ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Eluru '),
	    array('id'=>'Farooqnagar ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Farooqnagar '),
	    array('id'=>'Gadwal ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Gadwal '),
	    array('id'=>'Gooty ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Gooty '),
	    array('id'=>'Adoni ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Adoni '),
	    array('id'=>'Gudivada ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Gudivada '),
	    array('id'=>'Gudur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Gudur '),
	    array('id'=>'Guntakal  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Guntakal  '),
	    array('id'=>'Guntur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Guntur '),
	    array('id'=>'Hanuman_Junction ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Hanuman Junction '),
	    array('id'=>'Hindupur  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Hindupur  '),
	    array('id'=>'Hyderabad ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Hyderabad '),
	    array('id'=>'Ichchapuram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Ichchapuram '),
	    array('id'=>'Jaggaiahpet ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Jaggaiahpet '),
	    array('id'=>'Jagtial ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Jagtial '),
	    array('id'=>'Amadalavalasa ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Amadalavalasa '),
	    array('id'=>'Jammalamadugu ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Jammalamadugu '),
	    array('id'=>'Jangaon ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Jangaon '),
	    array('id'=>'Kadapa ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kadapa '),
	    array('id'=>'Kadiri   ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kadiri   '),
	    array('id'=>'Kagaznagar ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kagaznagar '),
	    array('id'=>'Kakinada ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kakinada '),
	    array('id'=>'Kalyandurg ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kalyandurg '),
	    array('id'=>'Kamareddy ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kamareddy '),
        array('id'=>'Kandukur  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kandukur  '),
        array('id'=>'Karimnagar ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Karimnagar '),
        array('id'=>'Amalapuram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Amalapuram '),
        array('id'=>'Kavali ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kavali '),
        array('id'=>'Khammam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Khammam '),
        array('id'=>'Koratla ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Koratla '),
        array('id'=>'Kothagudem ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kothagudem '),
        array('id'=>'Kothapeta ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kothapeta '),
        array('id'=>'Kovvur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kovvur '),
        array('id'=>'Kurnool ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kurnool '),
        array('id'=>'Kyathampalle ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Kyathampalle '),
        array('id'=>'Macherla ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Macherla '),
        array('id'=>'Machilipatnam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Machilipatnam '),
        array('id'=>'Anakapalle ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Anakapalle '),
        array('id'=>'Madanapalle ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Madanapalle '), 
        array('id'=>'Mahbubnagar ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Mahbubnagar '),
        array('id'=>'Mancherial ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Mancherial '),
        array('id'=>'Mandamarri ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Mandamarri '),
        array('id'=>'Mandapeta ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Mandapeta '),
        array('id'=>'Manuguru ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Manuguru '),
        array('id'=>'Markapur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Markapur '),
        array('id'=>'Medak ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Medak '),
        array('id'=>'Miryalaguda ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Miryalaguda '),
        array('id'=>'Mogalthur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Mogalthur '),
        array('id'=>'Anantapur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Anantapur '),
        array('id'=>'Nagari ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nagari '),
        array('id'=>'Nagarkurnool  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nagarkurnool  '),
        array('id'=>'Nandyal  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nandyal  '),
        array('id'=>'Narasapur  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Narasapur  '),
        array('id'=>'Narasaraopet ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Narasaraopet '),
        array('id'=>'Narayanpet ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Narayanpet '),
        array('id'=>'Narsipatnam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Narsipatnam '),
        array('id'=>'Nellore ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nellore '),
        array('id'=>'Nidadavole ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nidadavole '),
        array('id'=>'Nirmal  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nirmal  '),
        array('id'=>'Badepalle ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Badepalle '),
        array('id'=>'Nizamabad ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nizamabad '),
        array('id'=>'Nuzvid ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Nuzvid '),
        array('id'=>'Ongole ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Ongole '),
        array('id'=>'Palacole ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Palacole '),
        array('id'=>'Palasa_Kasibugga ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Palasa Kasibugga '),
	    array('id'=>'Palwancha ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Palwancha '),
	    array('id'=>'Parvathipuram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Parvathipuram '),
	    array('id'=>'Pedana ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Pedana '),
	    array('id'=>'Peddapuram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Peddapuram '),
	    array('id'=>'Pithapuram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Pithapuram '),
	    array('id'=>'Banganapalle  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Banganapalle  '),
	    array('id'=>'Pondur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Pondur '),
	    array('id'=>'Ponnur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Ponnur '),
	    array('id'=>'Proddatur ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Proddatur '),
	    array('id'=>'Rajahmundry ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Rajahmundry '),
	    array('id'=>'Rajam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Rajam '),
	    array('id'=>'Rajampet  ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Rajampet  '),
	    array('id'=>'Ramachandrapuram ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Ramachandrapuram '),
	    array('id'=>'Ramagundam ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Ramagundam '),
	    array('id'=>'Rayachoti ', 'ctry'=>'Andhra_Pradesh',  'name'=> 'Rayachoti '),

       //Delhi
  
            array('id'=>'Asola ', 'ctry'=>'Delhi',  'name'=> 'Asola '),
	        array('id'=>'Delhi ', 'ctry'=>'Delhi',  'name'=> 'Delhi '),


	   //Pondicherry

	        array('id'=>'Karaikal ', 'ctry'=>'Pondicherry',  'name'=> 'Karaikal '),
	        array('id'=>'Mahe ', 'ctry'=>'Pondicherry',  'name'=> 'Mahe '),
	        array('id'=>'Pondicherry ', 'ctry'=>'Pondicherry',  'name'=> 'Pondicherry '),
	        array('id'=>'Yanam ', 'ctry'=>'Pondicherry',  'name'=> 'Yanam '),

        //Bihar


	        array('id'=>'Dalsinghsarai ', 'ctry'=>'Bihar',  'name'=> 'Dalsinghsarai '),
	        array('id'=>'Darbhanga ', 'ctry'=>'Bihar',  'name'=> 'Darbhanga '),
	        array('id'=>'Daudnagar ', 'ctry'=>'Bihar',  'name'=> 'Daudnagar '),
	        array('id'=>'Dehri_on_Sone ', 'ctry'=>'Bihar',  'name'=> 'Dehri-on-Sone '),
	        array('id'=>'Dhaka ', 'ctry'=>'Bihar',  'name'=> 'Dhaka '),
	        array('id'=>'Dighwara ', 'ctry'=>'Bihar',  'name'=> 'Dighwara '),
	        array('id'=>'Dumraon ', 'ctry'=>'Bihar',  'name'=> 'Dumraon '),
	        array('id'=>'Fatwah ', 'ctry'=>'Bihar',  'name'=> 'Fatwah '),
	        array('id'=>'Forbesganj ', 'ctry'=>'Bihar',  'name'=> 'Forbesganj '),
	        array('id'=>'Gaya ', 'ctry'=>'Bihar',  'name'=> 'Gaya '),
	        array('id'=>'Gogri_Jamalpur ', 'ctry'=>'Bihar',  'name'=> 'Gogri Jamalpur '),
	        array('id'=>'Gopalganj ', 'ctry'=>'Bihar',  'name'=> 'Gopalganj '),
	        array('id'=>'Hajipur ', 'ctry'=>'Bihar',  'name'=> 'Hajipur '),
	        array('id'=>'Hilsa ', 'ctry'=>'Bihar',  'name'=> 'Hilsa '),
	        array('id'=>'Hisua ', 'ctry'=>'Bihar',  'name'=> 'Hisua '),
	        array('id'=>'Jagdispur ', 'ctry'=>'Bihar',  'name'=> 'Jagdispur '),
	        array('id'=>'Jamalpur ', 'ctry'=>'Bihar',  'name'=> 'Jamalpur '),
	        array('id'=>'Jamui ', 'ctry'=>'Bihar',  'name'=> 'Jamui '),
	        array('id'=>'Jehanabad ', 'ctry'=>'Bihar',  'name'=> 'Jehanabad '),
	        array('id'=>'Jhajha ', 'ctry'=>'Bihar',  'name'=> 'Jhajha '),
	        array('id'=>'Jhanjharpur ', 'ctry'=>'Bihar',  'name'=> 'Jhanjharpur '),
	        array('id'=>'Jogabani ', 'ctry'=>'Bihar',  'name'=> 'Jogabani '),
	        array('id'=>'Kanti ', 'ctry'=>'Bihar',  'name'=> 'Kanti '),
	        array('id'=>'Katihar ', 'ctry'=>'Bihar',  'name'=> 'Katihar '),
	        array('id'=>'Khagaria ', 'ctry'=>'Bihar',  'name'=> 'Khagaria '),
	        array('id'=>'Kishanganj ', 'ctry'=>'Bihar',  'name'=> 'Kishanganj '),
	        array('id'=>'Lakhisarai ', 'ctry'=>'Bihar',  'name'=> 'Lakhisarai '),
	        array('id'=>'Madhepura ', 'ctry'=>'Bihar',  'name'=> 'Madhepura '),
	        array('id'=>'Madhubani ', 'ctry'=>'Bihar',  'name'=> 'Madhubani '),
	        array('id'=>'Maharajganj ', 'ctry'=>'Bihar',  'name'=> 'Maharajganj '),
	        array('id'=>'Mahnar_Bazar  ', 'ctry'=>'Bihar',  'name'=> 'Mahnar Bazar  '),
	        array('id'=>'Makhdumpur ', 'ctry'=>'Bihar',  'name'=> 'Makhdumpur '),
	        array('id'=>'Maner ', 'ctry'=>'Bihar',  'name'=> 'Maner '),
	        array('id'=>'Manihari ', 'ctry'=>'Bihar',  'name'=> 'Manihari '),
	        array('id'=>'Marhaura ', 'ctry'=>'Bihar',  'name'=> 'Marhaura '),
	        array('id'=>'Masaurhi ', 'ctry'=>'Bihar',  'name'=> 'Masaurhi '),
	        array('id'=>'Mirganj ', 'ctry'=>'Bihar',  'name'=> 'Mirganj '),
	        array('id'=>'Mokameh ', 'ctry'=>'Bihar',  'name'=> 'Mokameh '),
	        array('id'=>'Motihari ', 'ctry'=>'Bihar',  'name'=> 'Motihari '),
	        array('id'=>'Motipur ', 'ctry'=>'Bihar',  'name'=> 'Motipur '),
	        array('id'=>'Munger ', 'ctry'=>'Bihar',  'name'=> 'Munger '),
	        array('id'=>'Murliganj ', 'ctry'=>'Bihar',  'name'=> 'Murliganj '),
	        array('id'=>'Muzaffarpur ', 'ctry'=>'Bihar',  'name'=> 'Muzaffarpur '),
	        array('id'=>'Narkatiaganj ', 'ctry'=>'Bihar',  'name'=> 'Narkatiaganj '),
	        array('id'=>'Naugachhia ', 'ctry'=>'Bihar',  'name'=> 'Naugachhia '),
	        array('id'=>'Nawada ', 'ctry'=>'Bihar',  'name'=> 'Nawada '),
	        array('id'=>'Piro ', 'ctry'=>'Bihar',  'name'=> 'Piro '),
	        array('id'=>'Purnia ', 'ctry'=>'Bihar',  'name'=> 'Purnia '),
	        array('id'=>'Rafiganj ', 'ctry'=>'Bihar',  'name'=> 'Rafiganj '),
	        array('id'=>'Rajgir ', 'ctry'=>'Bihar',  'name'=> 'Rajgir '),
	        array('id'=>'Raxaul_Bazar  ', 'ctry'=>'Bihar',  'name'=> 'Raxaul Bazar '),
	        array('id'=>'Revelganj ', 'ctry'=>'Bihar',  'name'=> 'Revelganj '),
	        array('id'=>'Rosera ', 'ctry'=>'Bihar',  'name'=> 'Rosera '),
	        array('id'=>'Saharsa ', 'ctry'=>'Bihar',  'name'=> 'Saharsa '),
	        array('id'=>'Samastipur ', 'ctry'=>'Bihar',  'name'=> 'Samastipur '),
	        array('id'=>'Sasaram ', 'ctry'=>'Bihar',  'name'=> 'Sasaram '),
	        array('id'=>'Sheikhpura ', 'ctry'=>'Bihar',  'name'=> 'Sheikhpura '),
	        array('id'=>'Sherghati ', 'ctry'=>'Bihar',  'name'=> 'Sherghati '),
	        array('id'=>'Silao ', 'ctry'=>'Bihar',  'name'=> 'Silao '),
	        array('id'=>'Sitamarhi ', 'ctry'=>'Bihar',  'name'=> 'Sitamarhi '),
	        array('id'=>'Siwan ', 'ctry'=>'Bihar',  'name'=> 'Siwan '),
	        array('id'=>'Sonepur ', 'ctry'=>'Bihar',  'name'=> 'Sonepur '),
	        array('id'=>'Sugauli ', 'ctry'=>'Bihar',  'name'=> 'Sugauli '),
	        array('id'=>'Sultanganj ', 'ctry'=>'Bihar',  'name'=> 'Sultanganj '),
	        array('id'=>'Supaul ', 'ctry'=>'Bihar',  'name'=> 'Supaul '),
	        array('id'=>'Warisaliganj ', 'ctry'=>'Bihar',  'name'=> 'Warisaliganj '),
	        array('id'=>'Amarpur ', 'ctry'=>'Bihar',  'name'=> 'Amarpur '),
	        array('id'=>'Araria ', 'ctry'=>'Bihar',  'name'=> 'Araria '),
	        array('id'=>'Areraj ', 'ctry'=>'Bihar',  'name'=> 'Areraj '),
	        array('id'=>'Arrah ', 'ctry'=>'Bihar',  'name'=> 'Arrah '),
	        array('id'=>'Asarganj ', 'ctry'=>'Bihar',  'name'=> 'Asarganj '),
	        array('id'=>'Bagaha ', 'ctry'=>'Bihar',  'name'=> 'Bagaha '),
	        array('id'=>'Bahadurganj ', 'ctry'=>'Bihar',  'name'=> 'Bahadurganj '),
	        array('id'=>'Bairgania ', 'ctry'=>'Bihar',  'name'=> 'Bairgania '),
	        array('id'=>'Bakhtiarpur ', 'ctry'=>'Bihar',  'name'=> 'Bakhtiarpur '),
	        array('id'=>'Banka ', 'ctry'=>'Bihar',  'name'=> 'Banka '),
	        array('id'=>'Banmankhi_Bazar ', 'ctry'=>'Bihar',  'name'=> 'Banmankhi Bazar '),
	        array('id'=>'Barahiya ', 'ctry'=>'Bihar',  'name'=> 'Barahiya '),
	        array('id'=>'Barauli ', 'ctry'=>'Bihar',  'name'=> 'Barauli '),
	        array('id'=>'Barbigha ', 'ctry'=>'Bihar',  'name'=> 'Barbigha '),
	        array('id'=>'Barh ', 'ctry'=>'Bihar',  'name'=> 'Barh '),
	        array('id'=>'Begusarai ', 'ctry'=>'Bihar',  'name'=> 'Begusarai '),
	        array('id'=>'Behea ', 'ctry'=>'Bihar',  'name'=> 'Behea '),
	        array('id'=>'Bettiah ', 'ctry'=>'Bihar',  'name'=> 'Bettiah '),
	        array('id'=>'Bhabua ', 'ctry'=>'Bihar',  'name'=> 'Bhabua '),
	        array('id'=>'Bhagalpur ', 'ctry'=>'Bihar',  'name'=> 'Bhagalpur '),
	        array('id'=>'Bihar_Sharif ', 'ctry'=>'Bihar',  'name'=> 'Bihar Sharif '),
	        array('id'=>'Bikramganj ', 'ctry'=>'Bihar',  'name'=> 'Bikramganj '),
	        array('id'=>'Bodh_Gaya  ', 'ctry'=>'Bihar',  'name'=> 'Bodh Gaya  '),
	        array('id'=>'Buxar ', 'ctry'=>'Bihar',  'name'=> 'Buxar '),
	        array('id'=>'Chandan_Bara  ', 'ctry'=>'Bihar',  'name'=> 'Chandan Bara  '),
	        array('id'=>'Chanpatia ', 'ctry'=>'Bihar',  'name'=> 'Chanpatia '),
	        array('id'=>'Chhapra ', 'ctry'=>'Bihar',  'name'=> 'Chhapra '),
	        array('id'=>'Colgong ', 'ctry'=>'Bihar',  'name'=> 'Colgong '),
	        



         //Chandigarh

	        array('id'=>'Chandigarh ', 'ctry'=>'Chandigarh',  'name'=> 'Chandigarh '),
	       

        //Chhattisgarh

	        array('id'=>'Ahiwara ', 'ctry'=>'Chhattisgarh',  'name'=> 'Ahiwara '),
	        array('id'=>'Akaltara ', 'ctry'=>'Chhattisgarh',  'name'=> 'Akaltara '),
	        array('id'=>'Ambagarh_Chowki ', 'ctry'=>'Chhattisgarh',  'name'=> 'Ambagarh Chowki '),
	        array('id'=>'Ambikapur ', 'ctry'=>'Chhattisgarh',  'name'=> 'Ambikapur '),
	        array('id'=>'Arang ', 'ctry'=>'Chhattisgarh',  'name'=> 'Arang '),
	        array('id'=>'Bade_Bacheli ', 'ctry'=>'Chhattisgarh',  'name'=> 'Bade Bacheli '),
	        array('id'=>'Balod ', 'ctry'=>'Chhattisgarh',  'name'=> 'Balod '),
	        array('id'=>'Baloda_Bazar ', 'ctry'=>'Chhattisgarh',  'name'=> 'Baloda Bazar '),
	        array('id'=>'Bemetra ', 'ctry'=>'Chhattisgarh',  'name'=> 'Bemetra '),
	        array('id'=>'Bhatapara ', 'ctry'=>'Chhattisgarh',  'name'=> 'Bhatapara '),
	        array('id'=>'Birgaon ', 'ctry'=>'Chhattisgarh',  'name'=> 'Birgaon '),
	        array('id'=>'Champa ', 'ctry'=>'Chhattisgarh',  'name'=> 'Champa '),
	        array('id'=>'Chirmiri ', 'ctry'=>'Chhattisgarh',  'name'=> 'Chirmiri '),
	        array('id'=>'Dalli_Rajhara  ', 'ctry'=>'Chhattisgarh',  'name'=> 'Dalli-Rajhara  '),
	        array('id'=>'Dhamtari ', 'ctry'=>'Chhattisgarh',  'name'=> 'Dhamtari '),
	        array('id'=>'Dipka ', 'ctry'=>'Chhattisgarh',  'name'=> 'Dipka '),
	        array('id'=>'Dongargarh ', 'ctry'=>'Chhattisgarh',  'name'=> 'Dongargarh '),
	        array('id'=>'Durg_Bhilai_Nagar ', 'ctry'=>'Chhattisgarh',  'name'=> 'Durg-Bhilai Nagar '),
	        array('id'=>'Gobranawapara ', 'ctry'=>'Chhattisgarh',  'name'=> 'Gobranawapara '),
	        array('id'=>'Jagdalpur ', 'ctry'=>'Chhattisgarh',  'name'=> 'Jagdalpur '),
	        array('id'=>'Janjgir ', 'ctry'=>'Chhattisgarh',  'name'=> 'Janjgir '),
	        array('id'=>'Jashpurnagar ', 'ctry'=>'Chhattisgarh',  'name'=> 'Jashpurnagar '),
	        array('id'=>'Kanker ', 'ctry'=>'Chhattisgarh',  'name'=> 'Kanker '),
	        array('id'=>'Kawardha ', 'ctry'=>'Chhattisgarh',  'name'=> 'Kawardha '),
	        array('id'=>'Kawardha ', 'ctry'=>'Chhattisgarh',  'name'=> 'Kawardha '),
	        array('id'=>'Kondagaon ', 'ctry'=>'Chhattisgarh',  'name'=> 'Kondagaon '),
	        array('id'=>'Korba ', 'ctry'=>'Chhattisgarh',  'name'=> 'Korba '),
	        array('id'=>'Mahasamund ', 'ctry'=>'Chhattisgarh',  'name'=> 'Mahasamund '),
	        array('id'=>'Mungeli ', 'ctry'=>'Chhattisgarh',  'name'=> 'Mungeli '),
	        array('id'=>'Naila_Janjgir ', 'ctry'=>'Chhattisgarh',  'name'=> 'Naila Janjgir '),
	        array('id'=>'Raigarh ', 'ctry'=>'Chhattisgarh',  'name'=> 'Raigarh '),
	        array('id'=>'Raipur ', 'ctry'=>'Chhattisgarh',  'name'=> 'Raipur '),
	        array('id'=>'Rajnandgaon ', 'ctry'=>'Chhattisgarh',  'name'=> 'Rajnandgaon '),
	        array('id'=>'Sakti ', 'ctry'=>'Chhattisgarh',  'name'=> 'Sakti '),
	        array('id'=>'Tilda_Newra   ', 'ctry'=>'Chhattisgarh',  'name'=> 'Tilda Newra '),
	        
         //Dadra and Nagar Haveli

             array('id'=>'Amli   ', 'ctry'=>'Dadra_Nagar',  'name'=> 'Amli '),
             array('id'=>'Silvassa   ', 'ctry'=>'Dadra_Nagar',  'name'=> 'Silvassa '),

         //Daman & Diu 

             array('id'=>'Daman_and_Diu   ', 'ctry'=>'Daman_Diu',  'name'=> 'Daman and Diu '),

         //Goa
             array('id'=>'Aldona   ', 'ctry'=>'Goa',  'name'=> 'Aldona '),
             array('id'=>'Curchorem_Cacora   ', 'ctry'=>'Goa',  'name'=> 'Curchorem Cacora '),
             array('id'=>'Madgaon   ', 'ctry'=>'Goa',  'name'=> 'Madgaon '),
             array('id'=>'Mapusa   ', 'ctry'=>'Goa',  'name'=> 'Mapusa '),
             array('id'=>'Margao   ', 'ctry'=>'Goa',  'name'=> 'Margao  '),
             array('id'=>'Marmagao   ', 'ctry'=>'Goa',  'name'=> 'Marmagao '),
             array('id'=>'Panaji   ', 'ctry'=>'Goa',  'name'=> 'Panaji  '),

         //Haryana
             array('id'=>'Ambala   ', 'ctry'=>'Haryana',  'name'=> 'Ambala  '),
             array('id'=>'Asankhurd   ', 'ctry'=>'Haryana',  'name'=> 'Asankhurd  '),
             array('id'=>'Assandh   ', 'ctry'=>'Haryana',  'name'=> 'Assandh  '),
             array('id'=>'Ateli   ', 'ctry'=>'Haryana',  'name'=> 'Ateli  '),
             array('id'=>'Babiyal   ', 'ctry'=>'Haryana',  'name'=> 'Babiyal  '),
             array('id'=>'Bahadurgarh   ', 'ctry'=>'Haryana',  'name'=> 'Bahadurgarh  '),
             array('id'=>'Ballabhgarh   ', 'ctry'=>'Haryana',  'name'=> 'Ballabhgarh  '),
             array('id'=>'Barwala   ', 'ctry'=>'Haryana',  'name'=> 'Barwala  '),
             array('id'=>'Bhiwani   ', 'ctry'=>'Haryana',  'name'=> 'Bhiwani  '),
             array('id'=>'Charkhi_Dadri    ', 'ctry'=>'Haryana',  'name'=> 'Charkhi Dadri   '),
             array('id'=>'Cheeka   ', 'ctry'=>'Haryana',  'name'=> 'Cheeka  '),
             array('id'=>'Ellenabad_2   ', 'ctry'=>'Haryana',  'name'=> 'Ellenabad 2  '),
             array('id'=>'Faridabad   ', 'ctry'=>'Haryana',  'name'=> 'Faridabad  '),
             array('id'=>'Ganaur   ', 'ctry'=>'Haryana',  'name'=> 'Ganaur  '),
             array('id'=>'Gharaunda   ', 'ctry'=>'Haryana',  'name'=> 'Gharaunda  '),
             array('id'=>'Gohana   ', 'ctry'=>'Haryana',  'name'=> 'Gohana  '),
             array('id'=>'Gurgaon   ', 'ctry'=>'Haryana',  'name'=> 'Gurgaon  '),
             array('id'=>'Haibat', 'ctry'=>'Haryana',  'name'=> 'Haibat(Yamuna Nagar)    '),
             array('id'=>'Hansi   ', 'ctry'=>'Haryana',  'name'=> 'Hansi  '),
             array('id'=>'Hisar   ', 'ctry'=>'Haryana',  'name'=> 'Hisar  '),
             array('id'=>'Hodal   ', 'ctry'=>'Haryana',  'name'=> 'Hodal  '),
             array('id'=>'Jhajjar   ', 'ctry'=>'Haryana',  'name'=> 'Jhajjar  '),
             array('id'=>'Jind   ', 'ctry'=>'Haryana',  'name'=> 'Jind  '),
             array('id'=>'Kaithal   ', 'ctry'=>'Haryana',  'name'=> 'Kaithal  '),
             array('id'=>'Kalan_Wali   ', 'ctry'=>'Haryana',  'name'=> 'Kalan Wali  '),
             array('id'=>'Kalka   ', 'ctry'=>'Haryana',  'name'=> 'Kalka  '),
             array('id'=>'Karnal   ', 'ctry'=>'Haryana',  'name'=> 'Karnal  '),
             array('id'=>'Ladwa   ', 'ctry'=>'Haryana',  'name'=> 'Ladwa  '),
             array('id'=>'Mahendragarh   ', 'ctry'=>'Haryana',  'name'=> 'Mahendragarh  '),
             array('id'=>'Mandi_Dabwali   ', 'ctry'=>'Haryana',  'name'=> 'Mandi Dabwali  '),
             array('id'=>'Narnaul   ', 'ctry'=>'Haryana',  'name'=> 'Narnaul  '),
             array('id'=>'Narwana   ', 'ctry'=>'Haryana',  'name'=> 'Narwana  '),
             array('id'=>'Palwal   ', 'ctry'=>'Haryana',  'name'=> 'Palwal  '),
             array('id'=>'Panchkula   ', 'ctry'=>'Haryana',  'name'=> 'Panchkula  '),
             array('id'=>'Panipat   ', 'ctry'=>'Haryana',  'name'=> 'Panipat  '),
             array('id'=>'Pehowa   ', 'ctry'=>'Haryana',  'name'=> 'Pehowa  '),
             array('id'=>'Pinjore   ', 'ctry'=>'Haryana',  'name'=> 'Pinjore  '),
             array('id'=>'Rania   ', 'ctry'=>'Haryana',  'name'=> 'Rania  '),
             array('id'=>'Ratia   ', 'ctry'=>'Haryana',  'name'=> 'Ratia  '),
             array('id'=>'Rewari   ', 'ctry'=>'Haryana',  'name'=> 'Rewari  '),
             array('id'=>'Rohtak   ', 'ctry'=>'Haryana',  'name'=> 'Rohtak  '),
             array('id'=>'Safidon   ', 'ctry'=>'Haryana',  'name'=> 'Safidon  '),
             array('id'=>'Samalkha   ', 'ctry'=>'Haryana',  'name'=> 'Samalkha  '),
             array('id'=>'Shahbad   ', 'ctry'=>'Haryana',  'name'=> 'Shahbad  '),
             array('id'=>'Sirsa   ', 'ctry'=>'Haryana',  'name'=> 'Sirsa  '),
             array('id'=>'Sohna   ', 'ctry'=>'Haryana',  'name'=> 'Sohna  '),
             array('id'=>'Sonipat   ', 'ctry'=>'Haryana',  'name'=> 'Sonipat  '),
             array('id'=>'Taraori   ', 'ctry'=>'Haryana',  'name'=> 'Taraori  '),
             array('id'=>'Thanesar   ', 'ctry'=>'Haryana',  'name'=> 'Thanesar  '),
             array('id'=>'Tohana   ', 'ctry'=>'Haryana',  'name'=> 'Tohana  '),
             array('id'=>'Yamunanagar   ', 'ctry'=>'Haryana',  'name'=> 'Yamunanagar  '),
            





        //Himachal Pradesh

             array('id'=>'Arki   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Arki  '),
             array('id'=>'Baddi   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Baddi  '),
             array('id'=>'Dalhousie   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Dalhousie  '),
             array('id'=>'Dharamsala   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Dharamsala  '),
             array('id'=>'Mandi   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Mandi  '),
             array('id'=>'Nahan   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Nahan  '),
             array('id'=>'Shimla   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Shimla  '),
             array('id'=>'Solan   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Solan  '),
             array('id'=>'Sundarnagar   ', 'ctry'=>'Himachal_Pradesh',  'name'=> 'Sundarnagar  '),




         //Jharkhand 

             array('id'=>'Amlabad   ', 'ctry'=>'Jharkhand',  'name'=> 'Amlabad  '),
             array('id'=>'Ara   ', 'ctry'=>'Jharkhand',  'name'=> 'Ara  '),
             array('id'=>'Barughutu   ', 'ctry'=>'Jharkhand',  'name'=> 'Barughutu  '),
             array('id'=>'Bokaro_Steel_City    ', 'ctry'=>'Jharkhand',  'name'=> 'Bokaro Steel City   '),
             array('id'=>'Chaibasa   ', 'ctry'=>'Jharkhand',  'name'=> 'Chaibasa  '),
             array('id'=>'Chakradharpur   ', 'ctry'=>'Jharkhand',  'name'=> 'Chakradharpur  '),
             array('id'=>'Chandrapura   ', 'ctry'=>'Jharkhand',  'name'=> 'Chandrapura  '),
             array('id'=>'Chatra   ', 'ctry'=>'Jharkhand',  'name'=> 'Chatra  '),
             array('id'=>'Chirkunda   ', 'ctry'=>'Jharkhand',  'name'=> 'Chirkunda  '),
             array('id'=>'Churi   ', 'ctry'=>'Jharkhand',  'name'=> 'Churi  '),
             array('id'=>'Daltonganj   ', 'ctry'=>'Jharkhand',  'name'=> 'Daltonganj  '),
             array('id'=>'Deoghar   ', 'ctry'=>'Jharkhand',  'name'=> 'Deoghar  '),
             array('id'=>'Dhanbad   ', 'ctry'=>'Jharkhand',  'name'=> 'Dhanbad  '),
             array('id'=>'Dumka   ', 'ctry'=>'Jharkhand',  'name'=> 'Dumka  '),
             array('id'=>'Garhwa   ', 'ctry'=>'Jharkhand',  'name'=> 'Garhwa  '),
             array('id'=>'Ghatshila   ', 'ctry'=>'Jharkhand',  'name'=> 'Ghatshila  '),
             array('id'=>'Giridih   ', 'ctry'=>'Jharkhand',  'name'=> 'Giridih  '),
             array('id'=>'Godda   ', 'ctry'=>'Jharkhand',  'name'=> 'Godda  '),
             array('id'=>'Gomoh   ', 'ctry'=>'Jharkhand',  'name'=> 'Gomoh  '),
             array('id'=>'Gumia   ', 'ctry'=>'Jharkhand',  'name'=> 'Gumia  '),
             array('id'=>'Gumla   ', 'ctry'=>'Jharkhand',  'name'=> 'Gumla  '),
             array('id'=>'Hazaribag   ', 'ctry'=>'Jharkhand',  'name'=> 'Hazaribag  '),
             array('id'=>'Hussainabad   ', 'ctry'=>'Jharkhand',  'name'=> 'Hussainabad  '),
             array('id'=>'Jamshedpur   ', 'ctry'=>'Jharkhand',  'name'=> 'Jamshedpur  '),
             array('id'=>'Jamtara   ', 'ctry'=>'Jharkhand',  'name'=> 'Jamtara  '),
             array('id'=>'Jhumri_Tilaiya   ', 'ctry'=>'Jharkhand',  'name'=> 'Jhumri Tilaiya  '),
             array('id'=>'Khunti   ', 'ctry'=>'Jharkhand',  'name'=> 'Khunti  '),
             array('id'=>'Lohardaga   ', 'ctry'=>'Jharkhand',  'name'=> 'Lohardaga  '),
             array('id'=>'Madhupur   ', 'ctry'=>'Jharkhand',  'name'=> 'Madhupur  '),
             array('id'=>'Mihijam   ', 'ctry'=>'Jharkhand',  'name'=> 'Mihijam  '),
             array('id'=>'Musabani   ', 'ctry'=>'Jharkhand',  'name'=> 'Musabani  '),
             array('id'=>'Pakaur   ', 'ctry'=>'Jharkhand',  'name'=> 'Pakaur  '),
             array('id'=>'Patratu   ', 'ctry'=>'Jharkhand',  'name'=> 'Patratu  '),
             array('id'=>'Phusro   ', 'ctry'=>'Jharkhand',  'name'=> 'Phusro  '),
             array('id'=>'Ranchi   ', 'ctry'=>'Jharkhand',  'name'=> 'Ranchi  '),
             array('id'=>'Sahibganj   ', 'ctry'=>'Jharkhand',  'name'=> 'Sahibganj  '),
             array('id'=>'Saunda   ', 'ctry'=>'Jharkhand',  'name'=> 'Saunda  '),
             array('id'=>'Simdega   ', 'ctry'=>'Jharkhand',  'name'=> 'Simdega  '),
             array('id'=>'Tenu_Dam_cum_Kathhara   ', 'ctry'=>'Jharkhand',  'name'=> 'Tenu Dam-cum- Kathhara  '),
             



        //Karnataka



             array('id'=>'Arasikere   ', 'ctry'=>'Karnataka',  'name'=> 'Arasikere  '),
             array('id'=>'Bangalore   ', 'ctry'=>'Karnataka',  'name'=> 'Bangalore  '),
             array('id'=>'Belgaum   ', 'ctry'=>'Karnataka',  'name'=> 'Belgaum  '),
             array('id'=>'Bellary   ', 'ctry'=>'Karnataka',  'name'=> 'Bellary  '),
             array('id'=>'Chamrajnagar   ', 'ctry'=>'Karnataka',  'name'=> 'Chamrajnagar  '),
             array('id'=>'Chikkaballapur   ', 'ctry'=>'Karnataka',  'name'=> 'Chikkaballapur  '),
             array('id'=>'Chintamani   ', 'ctry'=>'Karnataka',  'name'=> 'Chintamani  '),
             array('id'=>'Chitradurga   ', 'ctry'=>'Karnataka',  'name'=> 'Chitradurga  '),
             array('id'=>'Gulbarga   ', 'ctry'=>'Karnataka',  'name'=> 'Gulbarga  '),
             array('id'=>'Gundlupet   ', 'ctry'=>'Karnataka',  'name'=> 'Gundlupet  '),
             array('id'=>'Hassan   ', 'ctry'=>'Karnataka',  'name'=> 'Hassan  '),
             array('id'=>'Hospet   ', 'ctry'=>'Karnataka',  'name'=> 'Hospet  '),
             array('id'=>'Hubli   ', 'ctry'=>'Karnataka',  'name'=> 'Hubli  '),
             array('id'=>'Karkala   ', 'ctry'=>'Karnataka',  'name'=> 'Karkala  '),
             array('id'=>'Karwar   ', 'ctry'=>'Karnataka',  'name'=> 'Karwar  '),
             array('id'=>'Kolar   ', 'ctry'=>'Karnataka',  'name'=> 'Kolar  '),
             array('id'=>'Lakshmeshwar   ', 'ctry'=>'Karnataka',  'name'=> 'Lakshmeshwar  '),
             array('id'=>'Lingsugur   ', 'ctry'=>'Karnataka',  'name'=> 'Lingsugur  '),
             array('id'=>'Maddur   ', 'ctry'=>'Karnataka',  'name'=> 'Maddur  '),
             array('id'=>'Madhugiri   ', 'ctry'=>'Karnataka',  'name'=> 'Madhugiri  '),
             array('id'=>'Madikeri   ', 'ctry'=>'Karnataka',  'name'=> 'Madikeri  '),
             array('id'=>'Magadi   ', 'ctry'=>'Karnataka',  'name'=> 'Magadi  '),
             array('id'=>'Mahalingpur   ', 'ctry'=>'Karnataka',  'name'=> 'Mahalingpur  '),
             array('id'=>'Malavalli   ', 'ctry'=>'Karnataka',  'name'=> 'Malavalli  '),
             array('id'=>'Malur   ', 'ctry'=>'Karnataka',  'name'=> 'Malur  '),
             array('id'=>'Mandya   ', 'ctry'=>'Karnataka',  'name'=> 'Mandya  '),
             array('id'=>'Mangalore   ', 'ctry'=>'Karnataka',  'name'=> 'Mangalore  '),
             array('id'=>'Manvi   ', 'ctry'=>'Karnataka',  'name'=> 'Manvi  '),
             array('id'=>'Mudalgi   ', 'ctry'=>'Karnataka',  'name'=> 'Mudalgi  '),
             array('id'=>'Mudbidri   ', 'ctry'=>'Karnataka',  'name'=> 'Mudbidri  '),
             array('id'=>'Muddebihal   ', 'ctry'=>'Karnataka',  'name'=> 'Muddebihal  '),
             array('id'=>'Mudhol   ', 'ctry'=>'Karnataka',  'name'=> 'Mudhol  '),
             array('id'=>'Mulbagal   ', 'ctry'=>'Karnataka',  'name'=> 'Mulbagal  '),
             array('id'=>'Mundargi   ', 'ctry'=>'Karnataka',  'name'=> 'Mundargi  '),
             array('id'=>'Mysore   ', 'ctry'=>'Karnataka',  'name'=> 'Mysore  '),
             array('id'=>'Nanjangud   ', 'ctry'=>'Karnataka',  'name'=> 'Nanjangud  '),
             array('id'=>'Pavagada   ', 'ctry'=>'Karnataka',  'name'=> 'Pavagada  '),
             array('id'=>'Rabkavi_Banhatti    ', 'ctry'=>'Karnataka',  'name'=> 'Rabkavi Banhatti   '),
             array('id'=>'Raichur   ', 'ctry'=>'Karnataka',  'name'=> 'Raichur  '),
             array('id'=>'Ramanagaram   ', 'ctry'=>'Karnataka',  'name'=> 'Ramanagaram  '),
             array('id'=>'Ramdurg   ', 'ctry'=>'Karnataka',  'name'=> 'Ramdurg  '),
             array('id'=>'Ranibennur   ', 'ctry'=>'Karnataka',  'name'=> 'Ranibennur  '),
             array('id'=>'Robertson_Pet   ', 'ctry'=>'Karnataka',  'name'=> 'Robertson Pet  '),
             array('id'=>'Ron   ', 'ctry'=>'Karnataka',  'name'=> 'Ron  '),
             array('id'=>'Sadalgi   ', 'ctry'=>'Karnataka',  'name'=> 'Sadalgi  '),
             array('id'=>'Sakleshpur   ', 'ctry'=>'Karnataka',  'name'=> 'Sakleshpur  '),
             array('id'=>'Sandur   ', 'ctry'=>'Karnataka',  'name'=> 'Sandur  '),
             array('id'=>'Sankeshwar   ', 'ctry'=>'Karnataka',  'name'=> 'Sankeshwar  '),
             array('id'=>'Saundatti_Yellamma   ', 'ctry'=>'Karnataka',  'name'=> 'Saundatti-Yellamma  '),
             array('id'=>'Savanur   ', 'ctry'=>'Karnataka',  'name'=> 'Savanur  '),
             array('id'=>'Sedam   ', 'ctry'=>'Karnataka',  'name'=> 'Sedam  '),
             array('id'=>'Shahabad   ', 'ctry'=>'Karnataka',  'name'=> 'Shahabad  '),
             array('id'=>'Shahpur   ', 'ctry'=>'Karnataka',  'name'=> 'Shahpur  '),
             array('id'=>'Shiggaon   ', 'ctry'=>'Karnataka',  'name'=> 'Shiggaon  '),
             array('id'=>'Shikapur   ', 'ctry'=>'Karnataka',  'name'=> 'Shikapur  '),
             array('id'=>'Shimoga   ', 'ctry'=>'Karnataka',  'name'=> 'Shimoga  '),
             array('id'=>'Shorapur   ', 'ctry'=>'Karnataka',  'name'=> 'Shorapur  '),
             array('id'=>'Shrirangapattana   ', 'ctry'=>'Karnataka',  'name'=> 'Shrirangapattana  '),
             array('id'=>'Sidlaghatta   ', 'ctry'=>'Karnataka',  'name'=> 'Sidlaghatta  '),
             array('id'=>'Sindgi   ', 'ctry'=>'Karnataka',  'name'=> 'Sindgi  '),
             array('id'=>'Sindhnur   ', 'ctry'=>'Karnataka',  'name'=> 'Sindhnur  '),
             array('id'=>'Sira   ', 'ctry'=>'Karnataka',  'name'=> 'Sira  '),
             array('id'=>'Siruguppa   ', 'ctry'=>'Karnataka',  'name'=> 'Siruguppa  '),
             array('id'=>'Srinivaspur   ', 'ctry'=>'Karnataka',  'name'=> 'Srinivaspur  '),
             array('id'=>'Talikota   ', 'ctry'=>'Karnataka',  'name'=> 'Talikota  '),
             array('id'=>'Tarikere   ', 'ctry'=>'Karnataka',  'name'=> 'Tarikere  '),
             array('id'=>'Tekkalakota   ', 'ctry'=>'Karnataka',  'name'=> 'Tekkalakota  '),
             array('id'=>'Terdal   ', 'ctry'=>'Karnataka',  'name'=> 'Terdal  '),
             array('id'=>'Tiptur   ', 'ctry'=>'Karnataka',  'name'=> 'Tiptur  '),
             array('id'=>'Tumkur   ', 'ctry'=>'Karnataka',  'name'=> 'Tumkur  '),
             array('id'=>'Udupi', 'ctry'=>'Karnataka',  'name'=> 'Udupi  '),
             array('id'=>'Vijayapura', 'ctry'=>'Karnataka',  'name'=> 'Vijayapura  '),
             array('id'=>'Wadi   ', 'ctry'=>'Karnataka',  'name'=> 'Wadi  '),
             array('id'=>'Yadgir   ', 'ctry'=>'Karnataka',  'name'=> 'Yadgir  '),
         

          //Lakshadweep    

              array('id'=>'Kavaratti   ', 'ctry'=>'Lakshdweep',  'name'=> 'Kavaratti  '),

          //Madhya_Pradesh

	    array('id'=>'Ashok_Nagar', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Ashok Nagar'),
	    array('id'=>'Balaghat', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Balaghat'),
        array('id'=>'Betul', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Betul'),
        array('id'=>'Bhopal', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Bhopal'),
		array('id'=>'Burhanpur ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Burhanpur '),
        array('id'=>'Chhatarpur ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Chhatarpur '),
        array('id'=>'Dabra', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Dabra'),
        array('id'=>'Datia', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Datia'),
        array('id'=>'Dewas', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Dewas'),
        array('id'=>'Dhar', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Dhar'),
        array('id'=>'Gwalior', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Gwalior   '),
        array('id'=>'Indore', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Indore'),
        array('id'=>'Itarsi', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Itarsi'),
		array('id'=>'Jabalpur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Jabalpur'),
        array('id'=>'Katni', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Katni'),
        array('id'=>'Kotma ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Kotma '),
		array('id'=>'Lahar ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Lahar '),
        array('id'=>'Lundi ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Lundi '),
        array('id'=>'Maharajpur ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Maharajpur'),
        array('id'=>'Mahidpur ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Mahidpur'),
        array('id'=>'Maihar ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Maihar'),
        array('id'=>'Malajkhand ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Malajkhand'),
        array('id'=>'Manasa ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Manasa'),
		array('id'=>'Manawar ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Manawar'),
        array('id'=>'Mandideep ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Mandideep'),
        array('id'=>'Mandla ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Mandla'),
        array('id'=>'Mandsaur ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Mandsaur'),
        array('id'=>'Mauganj ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Mauganj'),
        array('id'=>'Mhow_Cantonment ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Mhow Cantonment'),
        array('id'=>'Mhowgaon', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Mhowgaon'),
        array('id'=>'Morena', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Morena'),
        array('id'=>'Multai', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Multai'),
        array('id'=>'Murwara', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Murwara'),
        array('id'=>'Nagda', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Nagda'),
        array('id'=>'Nainpur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Nainpur'),
        array('id'=>'Narsinghgarh', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Narsinghgarh'),
        array('id'=>'Neemuch', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Neemuch'),
        array('id'=>'Nepanagar', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Nepanagar'),
        array('id'=>'Niwari', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Niwari'),
        array('id'=>'Nowgong', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Nowgong'),
        array('id'=>'Nowrozabad', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Nowrozabad'),
        array('id'=>'Pachore', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Pachore'),
        array('id'=>'Panagar', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Panagar'),
        array('id'=>'Pandhurna', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Pandhurna'),
        array('id'=>'Panna', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Panna'),
        array('id'=>'Pasan', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Pasan'),
        array('id'=>'Pipariya', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Pipariya'),
        array('id'=>'Pithampur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Pithampur'),
		array('id'=>'Porsa', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Porsa'),
        array('id'=>'Prithvipur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Prithvipur'),
        array('id'=>'Raghogarh_Vijaypur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Raghogarh-Vijaypur'),
        array('id'=>'Rahatgarh', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Rahatgarh'),
        array('id'=>'Raisen', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Raisen'),
        array('id'=>'Rajgarh', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Rajgarh'),
		array('id'=>'Ratlam', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Ratlam'),
        array('id'=>'Rau', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Rau'),
        array('id'=>'Rehli', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Rehli'),
        array('id'=>'Rewa', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Rewa'),
        array('id'=>'Sabalgarh', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sabalgarh'),
        array('id'=>'Sanawad', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sanawad'),
		array('id'=>'Sarangpur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sarangpur'),
        array('id'=>'Sarni', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sarni'),
        array('id'=>'Satna', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Satna'),
        array('id'=>'Sausar', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sausar'),
		array('id'=>'Sehore', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sehore'),
        array('id'=>'Sendhwa', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sendhwa'),
		array('id'=>'Seoni', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Seoni'),
        array('id'=>'Seoni_Malwa', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Seoni Malwa'),
        array('id'=>'Shahdol', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Shahdol'),
        array('id'=>'Shajapur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Shajapur'),
		array('id'=>'Shamgarh', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Shamgarh'),
        array('id'=>'Sheopur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sheopur'),
		array('id'=>'Shivpuri', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Shivpuri'),
        array('id'=>'Shujalpur  ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Shujalpur'),
        array('id'=>'Sidhi', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sidhi'),
        array('id'=>'Sihora', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sihora'),
        array('id'=>'Singrauli', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Singrauli'),
        array('id'=>'Sironj', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sironj'),
	    array('id'=>'Sohagpur', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Sohagpur'),
        array('id'=>'Tarana  ', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Tarana'),
        array('id'=>'Ujhani', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Ujhani'),
        array('id'=>'Umaria', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Umaria'),
        array('id'=>'Vidisha', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Vidisha'),
        array('id'=>'Wara_Seoni', 'ctry'=>'Madhya_Pradesh',  'name'=> 'Wara Seoni'),



        //Orissa
        
        array('id'=>'Anandapur', 'ctry'=>'Orissa',  'name'=> 'Anandapur'),
        array('id'=>'Anugul', 'ctry'=>'Orissa',  'name'=> 'Anugul'),
        array('id'=>'Asika', 'ctry'=>'Orissa',  'name'=> 'Asika'),
        array('id'=>'Balangir', 'ctry'=>'Orissa',  'name'=> 'Balangir'),
        array('id'=>'Balasore ', 'ctry'=>'Orissa',  'name'=> 'Balasore '),
        array('id'=>'Baleshwar ', 'ctry'=>'Orissa',  'name'=> 'Baleshwar '),
        array('id'=>'Bamra', 'ctry'=>'Orissa',  'name'=> 'Bamra'),
        array('id'=>'Barbil', 'ctry'=>'Orissa',  'name'=> 'Barbil'),
        array('id'=>'Bargarh', 'ctry'=>'Orissa',  'name'=> 'Bargarh'),
        array('id'=>'Baripada ', 'ctry'=>'Orissa',  'name'=> 'Baripada '),
        array('id'=>'Basudebpur', 'ctry'=>'Orissa',  'name'=> 'Basudebpur'),
        array('id'=>'Belpahar', 'ctry'=>'Orissa',  'name'=> 'Belpahar'),
        array('id'=>'Bhadrak', 'ctry'=>'Orissa',  'name'=> 'Bhadrak'),
        array('id'=>'Bhawanipatna', 'ctry'=>'Orissa',  'name'=> 'Bhawanipatna'),
        array('id'=>'Bhuban', 'ctry'=>'Orissa',  'name'=> 'Bhuban '),
        array('id'=>'Bhubaneswar ', 'ctry'=>'Orissa',  'name'=> 'Bhubaneswar'),
        array('id'=>'Biramitrapur', 'ctry'=>'Orissa',  'name'=> 'Biramitrapur'),
        array('id'=>'Brahmapur ', 'ctry'=>'Orissa',  'name'=> 'Brahmapur '),
        array('id'=>'Brajrajnagar', 'ctry'=>'Orissa',  'name'=> 'Brajrajnagar'),
        array('id'=>'Byasanagar  ', 'ctry'=>'Orissa',  'name'=> 'Byasanagar'),
		array('id'=>'Cuttack ', 'ctry'=>'Orissa',  'name'=> 'Debagarh'),
        array('id'=>'Dhenkanal', 'ctry'=>'Orissa',  'name'=> 'Dhenkanal'),
        array('id'=>'Gunupur', 'ctry'=>'Orissa',  'name'=> 'Gunupur'),
        array('id'=>'Hinjilicut', 'ctry'=>'Orissa',  'name'=> 'Hinjilicut'),
        array('id'=>'Jagatsinghapur', 'ctry'=>'Orissa',  'name'=> 'Jagatsinghapur '),
        array('id'=>'Jajapur ', 'ctry'=>'Orissa',  'name'=> 'Jajapur'),
        array('id'=>'Jaleswar', 'ctry'=>'Orissa',  'name'=> 'Jaleswar'),
        array('id'=>'Jatani ', 'ctry'=>'Orissa',  'name'=> 'Jatani '),
        array('id'=>'Jeypur', 'ctry'=>'Orissa',  'name'=> 'Jeypur'),
        array('id'=>'Jharsuguda  ', 'ctry'=>'Orissa',  'name'=> 'Jharsuguda'),
        array('id'=>'Joda ', 'ctry'=>'Orissa',  'name'=> 'Joda'),
        array('id'=>'Kantabanji', 'ctry'=>'Orissa',  'name'=> 'Kantabanji'),
        array('id'=>'Karanjia', 'ctry'=>'Orissa',  'name'=> 'Karanjia'),
        array('id'=>'Kendrapara', 'ctry'=>'Orissa',  'name'=> 'Kendrapara'),
        array('id'=>'Kendujhar', 'ctry'=>'Orissa',  'name'=> 'Kendujhar '),
        array('id'=>'Khordha ', 'ctry'=>'Orissa',  'name'=> 'Khordha'),
        array('id'=>'Koraput', 'ctry'=>'Orissa',  'name'=> 'Koraput'),
        array('id'=>'Malkangiri ', 'ctry'=>'Orissa',  'name'=> 'Malkangiri '),
        array('id'=>'Nabarangapur ', 'ctry'=>'Orissa',  'name'=> 'Nabarangapur '),
        array('id'=>'Paradip', 'ctry'=>'Orissa',  'name'=> 'Paradip'),
		array('id'=>'Parlakhemundi', 'ctry'=>'Orissa',  'name'=> 'Parlakhemundi'),
        array('id'=>'Pattamundai', 'ctry'=>'Orissa',  'name'=> 'Pattamundai'),
        array('id'=>'Phulabani', 'ctry'=>'Orissa',  'name'=> 'Phulabani'),
        array('id'=>'Puri', 'ctry'=>'Orissa',  'name'=> 'Puri'),
        array('id'=>'Rairangpur', 'ctry'=>'Orissa',  'name'=> 'Rairangpur '),
        array('id'=>'Rajagangapur ', 'ctry'=>'Orissa',  'name'=> 'Rajagangapur'),
        array('id'=>'Raurkela', 'ctry'=>'Orissa',  'name'=> 'Raurkela'),
        array('id'=>'Rayagada ', 'ctry'=>'Orissa',  'name'=> 'Rayagada '),
        array('id'=>'Sambalpur ', 'ctry'=>'Orissa',  'name'=> 'Sambalpur '),
        array('id'=>'Soro', 'ctry'=>'Orissa',  'name'=> 'Soro'),
		array('id'=>'Sunabeda', 'ctry'=>'Orissa',  'name'=> 'Sunabeda'),
        array('id'=>'Sundargarh', 'ctry'=>'Orissa',  'name'=> 'Sundargarh'),
        array('id'=>'Talcher', 'ctry'=>'Orissa',  'name'=> 'Talcher'),
        array('id'=>'Titlagarh', 'ctry'=>'Orissa',  'name'=> 'Titlagarh'),
        array('id'=>'Umarkote', 'ctry'=>'Orissa',  'name'=> 'Umarkote'),


         //Punjab
        
		array('id'=>'Ahmedgarh', 'ctry'=>'Punjab',  'name'=> 'Ahmedgarh'),
        array('id'=>'Amritsar', 'ctry'=>'Punjab',  'name'=> 'Amritsar'),
        array('id'=>'Barnala', 'ctry'=>'Punjab',  'name'=> 'Barnala'),
        array('id'=>'Batala', 'ctry'=>'Punjab',  'name'=> 'Batala'),
        array('id'=>'Bathinda', 'ctry'=>'Punjab',  'name'=> 'Bathinda'),
        array('id'=>'Bhagha_Purana', 'ctry'=>'Punjab',  'name'=> 'Bhagha Purana'),
        array('id'=>'Budhlada', 'ctry'=>'Punjab',  'name'=> 'Budhlada'),
        array('id'=>'Dasua', 'ctry'=>'Punjab',  'name'=> 'Dasua'),
        array('id'=>'Dhuri ', 'ctry'=>'Punjab',  'name'=> 'Dhuri '),
        array('id'=>'Dinanagar', 'ctry'=>'Punjab',  'name'=> 'Dinanagar'),
        array('id'=>'Faridkot ', 'ctry'=>'Punjab',  'name'=> 'Faridkot '),
        array('id'=>'Fazilka ', 'ctry'=>'Punjab',  'name'=> 'Fazilka '),
        array('id'=>'Firozpur', 'ctry'=>'Punjab',  'name'=> 'Firozpur'),
        array('id'=>'Firozpur_Cantt', 'ctry'=>'Punjab',  'name'=> 'Firozpur Cantt'),
        array('id'=>'Giddarbaha', 'ctry'=>'Punjab',  'name'=> 'Giddarbaha'),
        array('id'=>'Gobindgarh', 'ctry'=>'Punjab',  'name'=> 'Gobindgarh'),
        array('id'=>'Gurdaspur', 'ctry'=>'Punjab',  'name'=> 'Gurdaspur'),
        array('id'=>'Hoshiarpur', 'ctry'=>'Punjab',  'name'=> 'Hoshiarpur'),
        array('id'=>'Jagraon ', 'ctry'=>'Punjab',  'name'=> 'Jagraon '),
        array('id'=>'Jaitu', 'ctry'=>'Punjab',  'name'=> 'Jaitu'),
        array('id'=>'Jalalabad', 'ctry'=>'Punjab',  'name'=> 'Jalalabad'),
        array('id'=>'Jalandhar', 'ctry'=>'Punjab',  'name'=> 'Jalandhar'),
        array('id'=>'Jalandhar_Cantt', 'ctry'=>'Punjab',  'name'=> 'Jalandhar Cantt'),
        array('id'=>'Jandiala', 'ctry'=>'Punjab',  'name'=> 'Jandiala'),
        array('id'=>'Kapurthala', 'ctry'=>'Punjab',  'name'=> 'Kapurthala'),
        array('id'=>'Karoran', 'ctry'=>'Punjab',  'name'=> 'Karoran'),
        array('id'=>'Kartarpur', 'ctry'=>'Punjab',  'name'=> 'Kartarpur'),
        array('id'=>'Khanna', 'ctry'=>'Punjab',  'name'=> 'Khanna'),
        array('id'=>'Kharar ', 'ctry'=>'Punjab',  'name'=> 'Kharar'),
        array('id'=>'Kot_Kapura', 'ctry'=>'Punjab',  'name'=> 'Kot Kapura'),
        array('id'=>'Kurali', 'ctry'=>'Punjab',  'name'=> 'Kurali '),
        array('id'=>'Longowal ', 'ctry'=>'Punjab',  'name'=> 'Longowal'),
        array('id'=>'Ludhiana', 'ctry'=>'Punjab',  'name'=> 'Ludhiana'),
        array('id'=>'Malerkotla', 'ctry'=>'Punjab',  'name'=> 'Malerkotla'),
        array('id'=>'Malout', 'ctry'=>'Punjab',  'name'=> 'Malout'),
        array('id'=>'Maur', 'ctry'=>'Punjab',  'name'=> 'Maur'),
        array('id'=>'Moga', 'ctry'=>'Punjab',  'name'=> 'Moga'),
        array('id'=>'Mohali', 'ctry'=>'Punjab',  'name'=> 'Mohali'),
        array('id'=>'Morinda ', 'ctry'=>'Punjab',  'name'=> 'Morinda'),
        array('id'=>'Mukerian', 'ctry'=>'Punjab',  'name'=> 'Mukerian'),
        array('id'=>'Muktsar', 'ctry'=>'Punjab',  'name'=> 'Muktsar'),
        array('id'=>'Nabha', 'ctry'=>'Punjab',  'name'=> 'Nabha'),
        array('id'=>'Nakodar', 'ctry'=>'Punjab',  'name'=> 'Nakodar'),
        array('id'=>'Nangal', 'ctry'=>'Punjab',  'name'=> 'Nangal'),
        array('id'=>'Nawanshahr', 'ctry'=>'Punjab',  'name'=> 'Nawanshahr'),
        array('id'=>'Pathankot', 'ctry'=>'Punjab',  'name'=> 'Pathankot'),
        array('id'=>'Patiala', 'ctry'=>'Punjab',  'name'=> 'Patiala'),
        array('id'=>'Patran', 'ctry'=>'Punjab',  'name'=> 'Patran'),
        array('id'=>'Patti ', 'ctry'=>'Punjab',  'name'=> 'Patti'),
        array('id'=>'Phagwara', 'ctry'=>'Punjab',  'name'=> 'Phagwara'),
        array('id'=>'Phillaur', 'ctry'=>'Punjab',  'name'=> 'Phillaur'),
        array('id'=>'Qadian ', 'ctry'=>'Punjab',  'name'=> 'Qadian'),
        array('id'=>'Raikot', 'ctry'=>'Punjab',  'name'=> 'Raikot'),
        array('id'=>'Rajpura', 'ctry'=>'Punjab',  'name'=> 'Rajpura'),
        array('id'=>'Rampura_Phul', 'ctry'=>'Punjab',  'name'=> 'Rampura Phul'),
        array('id'=>'Rupnagar', 'ctry'=>'Punjab',  'name'=> 'Rupnagar'),
        array('id'=>'Samana', 'ctry'=>'Punjab',  'name'=> 'Samana'),
        array('id'=>'Sangrur', 'ctry'=>'Punjab',  'name'=> 'Sangrur'),
        array('id'=>'Sirhind_Fatehgarh_Sahib ', 'ctry'=>'Punjab',  'name'=> 'Sirhind Fatehgarh Sahib'),
        array('id'=>'Sujanpur', 'ctry'=>'Punjab',  'name'=> 'Sujanpur'),
        array('id'=>'Sunam', 'ctry'=>'Punjab',  'name'=> 'Sunam'),
        array('id'=>'Talwara', 'ctry'=>'Punjab',  'name'=> 'Talwara'),
        array('id'=>'Tarn_Taran', 'ctry'=>'Punjab',  'name'=> 'Tarn Taran'),
        array('id'=>'Urmar_Tanda ', 'ctry'=>'Punjab',  'name'=> 'Urmar Tanda'),
        array('id'=>'Zira', 'ctry'=>'Punjab',  'name'=> 'Zira'),
        array('id'=>'Zirakpur', 'ctry'=>'Punjab',  'name'=> 'Zirakpur'),


         //Maharashtra
       
      array('id'=>'Thane', 'ctry'=>'Maharashtra',  'name'=> 'Thane'), 
      array('id'=>'Ahmednagar', 'ctry'=>'Maharashtra',  'name'=> 'Ahmednagar'),
      array('id'=>'Akola', 'ctry'=>'Maharashtra',  'name'=> 'Akola'), 
      array('id'=>'Amravati', 'ctry'=>'Maharashtra',  'name'=> 'Amravati'),
      array('id'=>'Aurangabad', 'ctry'=>'Maharashtra',  'name'=> 'Aurangabad'), 
      array('id'=>'Baramati', 'ctry'=>'Maharashtra',  'name'=> 'Baramati'),
      array('id'=>'Chalisgaon', 'ctry'=>'Maharashtra',  'name'=> 'Chalisgaon'), 
      array('id'=>'Chinchani', 'ctry'=>'Maharashtra',  'name'=> 'Chinchani'),  
      array('id'=>'Devgarh', 'ctry'=>'Maharashtra',  'name'=> 'Devgarh'), 
      array('id'=>'Dhule', 'ctry'=>'Maharashtra',  'name'=> 'Dhule'),
      array('id'=>'Dombivli', 'ctry'=>'Maharashtra',  'name'=> 'Dombivli'), 
      array('id'=>'Ichalkaranji', 'ctry'=>'Maharashtra',  'name'=> 'Ichalkaranji'),
      array('id'=>'Jalna', 'ctry'=>'Maharashtra',  'name'=> 'Jalna'), 
      array('id'=>'Kalyan', 'ctry'=>'Maharashtra',  'name'=> 'Kalyan'),
      array('id'=>'Kolhapur', 'ctry'=>'Maharashtra',  'name'=> 'Kolhapur'), 
      array('id'=>'Latur', 'ctry'=>'Maharashtra',  'name'=> 'Latur'),
      array('id'=>'Loha', 'ctry'=>'Maharashtra',  'name'=> 'Loha'), 
      array('id'=>'Lonar', 'ctry'=>'Maharashtra',  'name'=> 'Lonar'),
      array('id'=>'Lonavla', 'ctry'=>'Maharashtra',  'name'=> 'Lonavla'), 
      array('id'=>'Mahad', 'ctry'=>'Maharashtra',  'name'=> 'Mahad'),
      array('id'=>'Mahuli', 'ctry'=>'Maharashtra',  'name'=> 'Mahuli'), 
      array('id'=>'Malegaon', 'ctry'=>'Maharashtra',  'name'=> 'Malegaon'),
      array('id'=>'Malkapur', 'ctry'=>'Maharashtra',  'name'=> 'Malkapur'), 
      array('id'=>'Manchar', 'ctry'=>'Maharashtra',  'name'=> 'Manchar'),  
      array('id'=>'Mangalvedhe', 'ctry'=>'Maharashtra',  'name'=> 'Mangalvedhe'), 
      array('id'=>'Mangrulpir', 'ctry'=>'Maharashtra',  'name'=> 'Mangrulpir'),
      array('id'=>'Manjlegaon', 'ctry'=>'Maharashtra',  'name'=> 'Manjlegaon'), 
      array('id'=>'Manmad', 'ctry'=>'Maharashtra',  'name'=> 'Manmad'),
      array('id'=>'Manwath', 'ctry'=>'Maharashtra',  'name'=> 'Manwath'), 
      array('id'=>'Mehkar', 'ctry'=>'Maharashtra',  'name'=> 'Mehkar'),
      array('id'=>'Mhaswad', 'ctry'=>'Maharashtra',  'name'=> 'Mhaswad'), 
      array('id'=>'Miraj', 'ctry'=>'Maharashtra',  'name'=> 'Miraj'),
	  array('id'=>'Morshi', 'ctry'=>'Maharashtra',  'name'=> 'Morshi'), 
      array('id'=>'Mukhed', 'ctry'=>'Maharashtra',  'name'=> 'Mukhed'),
      array('id'=>'Mumbai', 'ctry'=>'Maharashtra',  'name'=> 'Mumbai'), 
      array('id'=>'Murtijapur', 'ctry'=>'Maharashtra',  'name'=> 'Murtijapur'),
      array('id'=>'Nagpur', 'ctry'=>'Maharashtra',  'name'=> 'Nagpur'), 
      array('id'=>'Nalasopara', 'ctry'=>'Maharashtra',  'name'=> 'Nalasopara'),
      array('id'=>'Nanded_Waghala  ', 'ctry'=>'Maharashtra',  'name'=> 'Nanded_Waghala  '), 
      array('id'=>'Nandgaon', 'ctry'=>'Maharashtra',  'name'=> 'Nandgaon'),  
      array('id'=>'Nandura', 'ctry'=>'Maharashtra',  'name'=> 'Nandura'), 
      array('id'=>'Nandurbar', 'ctry'=>'Maharashtra',  'name'=> 'Nandurbar'),
      array('id'=>'Narkhed', 'ctry'=>'Maharashtra',  'name'=> 'Narkhed'), 
      array('id'=>'Nashik', 'ctry'=>'Maharashtra',  'name'=> 'Nashik'),
      array('id'=>'Navi_Mumbai', 'ctry'=>'Maharashtra',  'name'=> 'Navi Mumbai'), 
      array('id'=>'Nawapur', 'ctry'=>'Maharashtra',  'name'=> 'Nawapur'),
      array('id'=>'Nilanga', 'ctry'=>'Maharashtra',  'name'=> 'Nilanga'), 
      array('id'=>'Osmanabad ', 'ctry'=>'Maharashtra',  'name'=> 'Osmanabad '),
	  array('id'=>'Ozar', 'ctry'=>'Maharashtra',  'name'=> 'Ozar'), 
      array('id'=>'Pachora', 'ctry'=>'Maharashtra',  'name'=> 'Pachora'),
      array('id'=>'Paithan', 'ctry'=>'Maharashtra',  'name'=> 'Paithan'), 
      array('id'=>'Palghar', 'ctry'=>'Maharashtra',  'name'=> 'Palghar'),
      array('id'=>'Pandharkaoda', 'ctry'=>'Maharashtra',  'name'=> 'Pandharkaoda'), 
      array('id'=>'Pandharpur', 'ctry'=>'Maharashtra',  'name'=> 'Pandharpur'),
      array('id'=>'Panvel  ', 'ctry'=>'Maharashtra',  'name'=> 'Panvel  '), 
      array('id'=>'Parbhani', 'ctry'=>'Maharashtra',  'name'=> 'Parbhani'),  
      array('id'=>'Parli', 'ctry'=>'Maharashtra',  'name'=> 'Parli'), 
      array('id'=>'Parola', 'ctry'=>'Maharashtra',  'name'=> 'Parola'),
      array('id'=>'Partur', 'ctry'=>'Maharashtra',  'name'=> 'Partur'), 
      array('id'=>'Pathardi', 'ctry'=>'Maharashtra',  'name'=> 'Pathardi'),
      array('id'=>'Pathri', 'ctry'=>'Maharashtra',  'name'=> 'Pathri'), 
      array('id'=>'Patur', 'ctry'=>'Maharashtra',  'name'=> 'Patur'),
      array('id'=>'Pauni', 'ctry'=>'Maharashtra',  'name'=> 'Pauni'), 
      array('id'=>'Pen ', 'ctry'=>'Maharashtra',  'name'=> 'Pen '),
      array('id'=>'Phaltan', 'ctry'=>'Maharashtra',  'name'=> 'Phaltan'), 
      array('id'=>'Pulgaon', 'ctry'=>'Maharashtra',  'name'=> 'Pulgaon'),
      array('id'=>'Pune', 'ctry'=>'Maharashtra',  'name'=> 'Pune'), 
      array('id'=>'Purna ', 'ctry'=>'Maharashtra',  'name'=> 'Purna '),
      array('id'=>'Pusad', 'ctry'=>'Maharashtra',  'name'=> 'Pusad'), 
      array('id'=>'Rahuri', 'ctry'=>'Maharashtra',  'name'=> 'Rahuri'),
      array('id'=>'Rajura  ', 'ctry'=>'Maharashtra',  'name'=> 'Rajura  '), 
      array('id'=>'Ramtek ', 'ctry'=>'Maharashtra',  'name'=> 'Ramtek '),  
      array('id'=>'Ratnagiri', 'ctry'=>'Maharashtra',  'name'=> 'Ratnagiri'), 
      array('id'=>'Raver', 'ctry'=>'Maharashtra',  'name'=> 'Raver'),
      array('id'=>'Risod', 'ctry'=>'Maharashtra',  'name'=> 'Risod'), 
      array('id'=>'Sailu', 'ctry'=>'Maharashtra',  'name'=> 'Sailu'),
      array('id'=>'Sangamner', 'ctry'=>'Maharashtra',  'name'=> 'Sangamner'), 
      array('id'=>'Sangli', 'ctry'=>'Maharashtra',  'name'=> 'Sangli'),
      array('id'=>'Sangole', 'ctry'=>'Maharashtra',  'name'=> 'Sangole'), 
      array('id'=>'Sasvad ', 'ctry'=>'Maharashtra',  'name'=> 'Sasvad '),
	  array('id'=>'Satana ', 'ctry'=>'Maharashtra',  'name'=> 'Satana '), 
      array('id'=>'Satara', 'ctry'=>'Maharashtra',  'name'=> 'Satara'),
      array('id'=>'Savner', 'ctry'=>'Maharashtra',  'name'=> 'Savner'), 
      array('id'=>'Sawantwadi ', 'ctry'=>'Maharashtra',  'name'=> 'Sawantwadi '),
      array('id'=>'Shahade', 'ctry'=>'Maharashtra',  'name'=> 'Shahade'), 
      array('id'=>'Shegaon', 'ctry'=>'Maharashtra',  'name'=> 'Shegaon'),
      array('id'=>'Shendurjana  ', 'ctry'=>'Maharashtra',  'name'=> 'Shendurjana  '), 
      array('id'=>'Shirdi ', 'ctry'=>'Maharashtra',  'name'=> 'Shirdi '),  
      array('id'=>'Shirpur_Warwade', 'ctry'=>'Maharashtra',  'name'=> 'Shirpur_Warwade'), 
      array('id'=>'Shirur', 'ctry'=>'Maharashtra',  'name'=> 'Shirur'),
      array('id'=>'Shrigonda', 'ctry'=>'Maharashtra',  'name'=> 'Shrigonda'), 
      array('id'=>'Shrirampur', 'ctry'=>'Maharashtra',  'name'=> 'Shrirampur'),
      array('id'=>'Sillod', 'ctry'=>'Maharashtra',  'name'=> 'Sillod'), 
      array('id'=>'Sinnar', 'ctry'=>'Maharashtra',  'name'=> 'Sinnar'),
      array('id'=>'Solapur', 'ctry'=>'Maharashtra',  'name'=> 'Solapur'), 
      array('id'=>'Soyagaon ', 'ctry'=>'Maharashtra',  'name'=> 'Soyagaon '),
	  array('id'=>'Talegaon_Dabhade ', 'ctry'=>'Maharashtra',  'name'=> 'Talegaon Dabhade '), 
      array('id'=>'Talode', 'ctry'=>'Maharashtra',  'name'=> 'Talode'),
      array('id'=>'Tasgaon', 'ctry'=>'Maharashtra',  'name'=> 'Tasgaon'), 
      array('id'=>'Tirora ', 'ctry'=>'Maharashtra',  'name'=> 'Tirora '),
      array('id'=>'Tuljapur', 'ctry'=>'Maharashtra',  'name'=> 'Tuljapur'), 
      array('id'=>'Tumsar', 'ctry'=>'Maharashtra',  'name'=> 'Tumsar'),
      array('id'=>'Uchgaon  ', 'ctry'=>'Maharashtra',  'name'=> 'Uchgaon  '), 
      array('id'=>'Udgir ', 'ctry'=>'Maharashtra',  'name'=> 'Udgir '),  
      array('id'=>'Umarga', 'ctry'=>'Maharashtra',  'name'=> 'Umarga'), 
      array('id'=>'Umarkhed', 'ctry'=>'Maharashtra',  'name'=> 'Umarkhed'),
      array('id'=>'Umred', 'ctry'=>'Maharashtra',  'name'=> 'Umred'), 
      array('id'=>'Uran', 'ctry'=>'Maharashtra',  'name'=> 'Uran'),
      array('id'=>'Uran_Islampur', 'ctry'=>'Maharashtra',  'name'=> 'Uran Islampur'), 
      array('id'=>'Vadgaon_Kasba', 'ctry'=>'Maharashtra',  'name'=> 'Vadgaon Kasba'),
      array('id'=>'Vaijapur', 'ctry'=>'Maharashtra',  'name'=> 'Vaijapur'), 
      array('id'=>'Vasai ', 'ctry'=>'Maharashtra',  'name'=> 'Vasai'),
      array('id'=>'Virar', 'ctry'=>'Maharashtra',  'name'=> 'Virar'),
      array('id'=>'Vita', 'ctry'=>'Maharashtra',  'name'=> 'Vita'), 
      array('id'=>'Wadgaon_Road', 'ctry'=>'Maharashtra',  'name'=> 'Wadgaon Road'),
      array('id'=>'Wai', 'ctry'=>'Maharashtra',  'name'=> 'Wai'), 
      array('id'=>'Wani', 'ctry'=>'Maharashtra',  'name'=> 'Wani'),
      array('id'=>'Wardha', 'ctry'=>'Maharashtra',  'name'=> 'Wardha'), 
      array('id'=>'Warora ', 'ctry'=>'Maharashtra',  'name'=> 'Warora'),
      array('id'=>'Warud', 'ctry'=>'Maharashtra',  'name'=> 'Warud'),
      array('id'=>'Washim', 'ctry'=>'Maharashtra',  'name'=> 'Washim'), 
      array('id'=>'Yavatmal', 'ctry'=>'Maharashtra',  'name'=> 'Yavatmal'),
      array('id'=>'Yawal', 'ctry'=>'Maharashtra',  'name'=> 'Yawal'), 
      array('id'=>'Yevla ', 'ctry'=>'Maharashtra',  'name'=> 'Yevla'),

       //Uttarakhand        
        
        array('id'=>'Almora ', 'ctry'=>'Uttarakhand',  'name'=> 'Almora'),
        array('id'=>'Bazpur ', 'ctry'=>'Uttarakhand',  'name'=> 'Bazpur'),
        array('id'=>'Chamba ', 'ctry'=>'Uttarakhand',  'name'=> 'Chamba'),
        array('id'=>'Dehradun ', 'ctry'=>'Uttarakhand',  'name'=> 'Dehradun'),
        array('id'=>'Haldwani ', 'ctry'=>'Uttarakhand',  'name'=> 'Haldwani'),
        array('id'=>'Haridwar ', 'ctry'=>'Uttarakhand',  'name'=> 'Haridwar'),
        array('id'=>'Jaspur ', 'ctry'=>'Uttarakhand',  'name'=> 'Jaspur'),
        array('id'=>'Kashipur ', 'ctry'=>'Uttarakhand',  'name'=> 'Kashipur'),
        array('id'=>'kichha ', 'ctry'=>'Uttarakhand',  'name'=> 'kichha'),
        array('id'=>'Kotdwara ', 'ctry'=>'Uttarakhand',  'name'=> 'Kotdwara'),
        array('id'=>'Manglaur ', 'ctry'=>'Uttarakhand',  'name'=> 'Manglaur'),
        array('id'=>'Mussoorie ', 'ctry'=>'Uttarakhand',  'name'=> 'Mussoorie'),
        array('id'=>'Nagla ', 'ctry'=>'Uttarakhand',  'name'=> 'Nagla'),
        array('id'=>'Nainital ', 'ctry'=>'Uttarakhand',  'name'=> 'Nainital'),
        array('id'=>'Pauri ', 'ctry'=>'Uttarakhand',  'name'=> 'Pauri'),
        array('id'=>'Pithoragarh ', 'ctry'=>'Uttarakhand',  'name'=> 'Pithoragarh'),
        array('id'=>'Rishikesh ', 'ctry'=>'Uttarakhand',  'name'=> 'Rishikesh'),
        array('id'=>'Roorkee ', 'ctry'=>'Uttarakhand',  'name'=> 'Roorkee'),
        array('id'=>'Sitarganj ', 'ctry'=>'Uttarakhand',  'name'=> 'Sitarganj'),
        array('id'=>'Tehri ', 'ctry'=>'Uttarakhand',  'name'=> 'Tehri'),
        
         //Rajasthan
        
       array('id'=>'Ajmer ', 'ctry'=>'Rajasthan',  'name'=> 'Ajmer'),
       array('id'=>'Alwar ', 'ctry'=>'Rajasthan',  'name'=> 'Alwar'),
       array('id'=>'Bali ', 'ctry'=>'Rajasthan',  'name'=> 'Bali'),
       array('id'=>'Bandikui  ', 'ctry'=>'Rajasthan',  'name'=> 'Bandikui '),
       array('id'=>'Banswara ', 'ctry'=>'Rajasthan',  'name'=> 'Banswara'),
       array('id'=>'Baran ', 'ctry'=>'Rajasthan',  'name'=> 'Baran'),
       array('id'=>'Barmer', 'ctry'=>'Rajasthan',  'name'=> 'Barmer'),
       array('id'=>'Bikaner', 'ctry'=>'Rajasthan',  'name'=> 'Bikaner'),
       array('id'=>'Jaipur ', 'ctry'=>'Rajasthan',  'name'=> 'Jaipur'),
       array('id'=>'Jaisalmer ', 'ctry'=>'Rajasthan',  'name'=> 'Jaisalmer'),
       array('id'=>'Jodhpur ', 'ctry'=>'Rajasthan',  'name'=> 'Jodhpur'),
       array('id'=>'Lachhmangarh  ', 'ctry'=>'Rajasthan',  'name'=> 'Lachhmangarh '),
       array('id'=>'Ladnu ', 'ctry'=>'Rajasthan',  'name'=> 'Ladnu'),
       array('id'=>'Lakheri ', 'ctry'=>'Rajasthan',  'name'=> 'Lakheri'),
       array('id'=>'Lalsot', 'ctry'=>'Rajasthan',  'name'=> 'Lalsot'),
       array('id'=>'Losal', 'ctry'=>'Rajasthan',  'name'=> 'Losal'), 
	   array('id'=>'Makrana ', 'ctry'=>'Rajasthan',  'name'=> 'Makrana'),
       array('id'=>'Malpura ', 'ctry'=>'Rajasthan',  'name'=> 'Malpura'),
       array('id'=>'Mandalgarh ', 'ctry'=>'Rajasthan',  'name'=> 'Mandalgarh'),
       array('id'=>'Mandawa  ', 'ctry'=>'Rajasthan',  'name'=> 'Mandawa '),
       array('id'=>'Merta_City ', 'ctry'=>'Rajasthan',  'name'=> 'Merta City'),
       array('id'=>'Mount_Abu ', 'ctry'=>'Rajasthan',  'name'=> 'Mount Abu'),
       array('id'=>'Nadbai', 'ctry'=>'Rajasthan',  'name'=> 'Nadbai'),
       array('id'=>'Nagar', 'ctry'=>'Rajasthan',  'name'=> 'Nagar'),
       array('id'=>'Nagaur ', 'ctry'=>'Rajasthan',  'name'=> 'Nagaur'),
       array('id'=>'Nargund ', 'ctry'=>'Rajasthan',  'name'=> 'Nargund'),
       array('id'=>'Nasirabad ', 'ctry'=>'Rajasthan',  'name'=> 'Nasirabad'),
       array('id'=>'Nathdwara  ', 'ctry'=>'Rajasthan',  'name'=> 'Nathdwara '),
       array('id'=>'Navalgund ', 'ctry'=>'Rajasthan',  'name'=> 'Navalgund'),
       array('id'=>'Nawalgarh ', 'ctry'=>'Rajasthan',  'name'=> 'Nawalgarh'),
       array('id'=>'Neem_Ka_Thana', 'ctry'=>'Rajasthan',  'name'=> 'Neem-Ka-Thana'),
       array('id'=>'Nelamangala', 'ctry'=>'Rajasthan',  'name'=> 'Nelamangala'),
       array('id'=>'Nimbahera ', 'ctry'=>'Rajasthan',  'name'=> 'Nimbahera'),
       array('id'=>'Nipani ', 'ctry'=>'Rajasthan',  'name'=> 'Nipani'),
       array('id'=>'Niwai ', 'ctry'=>'Rajasthan',  'name'=> 'Niwai'),
       array('id'=>'Nohar  ', 'ctry'=>'Rajasthan',  'name'=> 'Nohar '),
       array('id'=>'Nokha ', 'ctry'=>'Rajasthan',  'name'=> 'Nokha'),
       array('id'=>'Phalodi ', 'ctry'=>'Rajasthan',  'name'=> 'Phalodi'),
       array('id'=>'Phulera', 'ctry'=>'Rajasthan',  'name'=> 'Phulera'),
       array('id'=>'Pilani ', 'ctry'=>'Rajasthan',  'name'=> 'Pilani '),
       array('id'=>'Pilibanga ', 'ctry'=>'Rajasthan',  'name'=> 'Pilibanga'),
       array('id'=>'Pindwara ', 'ctry'=>'Rajasthan',  'name'=> 'Pindwara'),
       array('id'=>'Pipar_City ', 'ctry'=>'Rajasthan',  'name'=> 'Pipar City'),
       array('id'=>'Prantij  ', 'ctry'=>'Rajasthan',  'name'=> 'Prantij '),
       array('id'=>'Raisinghnagar ', 'ctry'=>'Rajasthan',  'name'=> 'Raisinghnagar'),
       array('id'=>'Rajakhera ', 'ctry'=>'Rajasthan',  'name'=> 'Rajakhera'),
       array('id'=>'Rajaldesar', 'ctry'=>'Rajasthan',  'name'=> 'Rajaldesar'),
       array('id'=>'Rajgarh_Alwar', 'ctry'=>'Rajasthan',  'name'=> 'Rajgarh (Alwar)'),  
       array('id'=>'Rajgarh_Churu ', 'ctry'=>'Rajasthan',  'name'=> 'Rajgarh (Churu'),
       array('id'=>'Rajsamand ', 'ctry'=>'Rajasthan',  'name'=> 'Rajsamand'),
       array('id'=>'Ramganj_Mandi ', 'ctry'=>'Rajasthan',  'name'=> 'Ramganj Mandi'),
       array('id'=>'Ramngarh  ', 'ctry'=>'Rajasthan',  'name'=> 'Ramngarh '),
       array('id'=>'Ratangarh ', 'ctry'=>'Rajasthan',  'name'=> 'Ratangarh'),
       array('id'=>'Rawatbhata ', 'ctry'=>'Rajasthan',  'name'=> 'Rawatbhata'),
       array('id'=>'Rawatsar', 'ctry'=>'Rajasthan',  'name'=> 'Rawatsar'),
       array('id'=>'Reengus ', 'ctry'=>'Rajasthan',  'name'=> 'Reengus '),
       array('id'=>'Sadri ', 'ctry'=>'Rajasthan',  'name'=> 'Sadri'),
       array('id'=>'Sadulshahar ', 'ctry'=>'Rajasthan',  'name'=> 'Sadulshahar'),
       array('id'=>'Sagwara ', 'ctry'=>'Rajasthan',  'name'=> 'Sagwara'),
       array('id'=>'Sambhar  ', 'ctry'=>'Rajasthan',  'name'=> 'Sambhar '),
       array('id'=>'Sanchore ', 'ctry'=>'Rajasthan',  'name'=> 'Sanchore'),
       array('id'=>'Sangaria ', 'ctry'=>'Rajasthan',  'name'=> 'Sangaria'),
       array('id'=>'Sardarshahar', 'ctry'=>'Rajasthan',  'name'=> 'Sardarshahar'),
       array('id'=>'Sawai_Madhopur', 'ctry'=>'Rajasthan',  'name'=> 'Sawai Madhopur'),
       array('id'=>'Shahpura ', 'ctry'=>'Rajasthan',  'name'=> 'Shahpura'),
       array('id'=>'Sheoganj ', 'ctry'=>'Rajasthan',  'name'=> 'Sheoganj'),
       array('id'=>'Sikar ', 'ctry'=>'Rajasthan',  'name'=> 'Sikar'),
       array('id'=>'Sirohi  ', 'ctry'=>'Rajasthan',  'name'=> 'Sirohi '),
       array('id'=>'Sojat ', 'ctry'=>'Rajasthan',  'name'=> 'Sojat'),
       array('id'=>'Sri_Madhopur ', 'ctry'=>'Rajasthan',  'name'=> 'Sri Madhopur'),
       array('id'=>'Sujangarh', 'ctry'=>'Rajasthan',  'name'=> 'Sujangarh'),
       array('id'=>'Suratgarh ', 'ctry'=>'Rajasthan',  'name'=> 'Suratgarh '),
       array('id'=>'Taranagar ', 'ctry'=>'Rajasthan',  'name'=> 'Taranagar'),
       array('id'=>'Todabhim ', 'ctry'=>'Rajasthan',  'name'=> 'Todabhim'),
       array('id'=>'Todaraisingh ', 'ctry'=>'Rajasthan',  'name'=> 'Todaraisingh'),
       array('id'=>'Tonk  ', 'ctry'=>'Rajasthan',  'name'=> 'Tonk '),
       array('id'=>'Udaipur ', 'ctry'=>'Rajasthan',  'name'=> 'Udaipur'),
       array('id'=>'Udaipurwati ', 'ctry'=>'Rajasthan',  'name'=> 'Udaipurwati'),
       array('id'=>'Vijainagar', 'ctry'=>'Rajasthan',  'name'=> 'Vijainagar'),



        //West_Bengal
       array('id'=>'Adra_Purulia', 'ctry'=>'West_Bengal',  'name'=> 'Adra_Purulia'),
       array('id'=>'Alipurduar', 'ctry'=>'West_Bengal',  'name'=> 'Alipurduar'),
       array('id'=>'Arambagh', 'ctry'=>'West_Bengal',  'name'=> 'Arambagh'),
       array('id'=>'Asansol', 'ctry'=>'West_Bengal',  'name'=> 'Asansol'),
       array('id'=>'Baharampur', 'ctry'=>'West_Bengal',  'name'=> 'Baharampur'),
       array('id'=>'Bally', 'ctry'=>'West_Bengal',  'name'=> 'Bally'),
       array('id'=>'Balurghat', 'ctry'=>'West_Bengal',  'name'=> 'Balurghat'),
       array('id'=>'Bankura', 'ctry'=>'West_Bengal',  'name'=> 'Bankura'),
       array('id'=>'Barakar', 'ctry'=>'West_Bengal',  'name'=> 'Barakar'),
       array('id'=>'Barasat', 'ctry'=>'West_Bengal',  'name'=> 'Barasat'),
       array('id'=>'Bardhaman', 'ctry'=>'West_Bengal',  'name'=> 'Bardhaman'),
       array('id'=>'Bidhan_Nagar', 'ctry'=>'West_Bengal',  'name'=> 'Bidhan Nagar'),
       array('id'=>'Baharampur', 'ctry'=>'West_Bengal',  'name'=> 'Baharampur'),
       array('id'=>'Calcutta', 'ctry'=>'West_Bengal',  'name'=> 'Calcutta'),
       array('id'=>'Chinsura', 'ctry'=>'West_Bengal',  'name'=> 'Chinsura'),
       array('id'=>'Contai', 'ctry'=>'West_Bengal',  'name'=> 'Contai'),
       array('id'=>'Barakar', 'ctry'=>'West_Bengal',  'name'=> 'Barakar'),
       array('id'=>'Barasat', 'ctry'=>'West_Bengal',  'name'=> 'Barasat'),
       array('id'=>'Bardhaman', 'ctry'=>'West_Bengal',  'name'=> 'Bardhaman'),
       array('id'=>'Bidhan_Nagar', 'ctry'=>'West_Bengal',  'name'=> 'Bidhan Nagar'),
       array('id'=>'Baharampur', 'ctry'=>'West_Bengal',  'name'=> 'Baharampur'),
       array('id'=>'Calcutta', 'ctry'=>'West_Bengal',  'name'=> 'Calcutta'),
       array('id'=>'Chinsura', 'ctry'=>'West_Bengal',  'name'=> 'Chinsura'),
       array('id'=>'Contai', 'ctry'=>'West_Bengal',  'name'=> 'Contai'),
       array('id'=>'Cooch_Behar', 'ctry'=>'West_Bengal',  'name'=> 'Cooch Behar'),
       array('id'=>'Darjeeling', 'ctry'=>'West_Bengal',  'name'=> 'Darjeeling'),
       array('id'=>'Durgapur', 'ctry'=>'West_Bengal',  'name'=> 'Durgapur'),
       array('id'=>'Haldia', 'ctry'=>'West_Bengal',  'name'=> 'Haldia'),
       array('id'=>'Howrah', 'ctry'=>'West_Bengal',  'name'=> 'Howrah'),
       array('id'=>'Islampur', 'ctry'=>'West_Bengal',  'name'=> 'Islampur'),
       array('id'=>'Jhargram', 'ctry'=>'West_Bengal',  'name'=> 'Jhargram'),
       array('id'=>'Kharagpur', 'ctry'=>'West_Bengal',  'name'=> 'Kharagpur'),
       array('id'=>'Kolkata', 'ctry'=>'West_Bengal',  'name'=> 'Kolkata'),
       array('id'=>'Mainaguri', 'ctry'=>'West_Bengal',  'name'=> 'Mainaguri'),
       array('id'=>'Mal', 'ctry'=>'West_Bengal',  'name'=> 'Mal'),
       array('id'=>'Mathabhanga', 'ctry'=>'West_Bengal',  'name'=> 'Mathabhanga'),
       array('id'=>'Medinipur', 'ctry'=>'West_Bengal',  'name'=> 'Medinipur'),
       array('id'=>'Memari ', 'ctry'=>'West_Bengal',  'name'=> 'Memari '),
       array('id'=>'Monoharpur ', 'ctry'=>'West_Bengal',  'name'=> 'Monoharpur '),
       array('id'=>'Murshidabad', 'ctry'=>'West_Bengal',  'name'=> 'Murshidabad'),
	   array('id'=>'Nabadwip', 'ctry'=>'West_Bengal',  'name'=> 'Nabadwip'),
       array('id'=>'Naihati', 'ctry'=>'West_Bengal',  'name'=> 'Naihati'),
       array('id'=>'Panchla', 'ctry'=>'West_Bengal',  'name'=> 'Panchla'),
       array('id'=>'Pandua', 'ctry'=>'West_Bengal',  'name'=> 'Pandua'),
       array('id'=>'Paschim_Punropara ', 'ctry'=>'West_Bengal',  'name'=> 'Paschim Punropara '),
       array('id'=>'Purulia', 'ctry'=>'West_Bengal',  'name'=> 'Purulia'),
       array('id'=>'Raghunathpur', 'ctry'=>'West_Bengal',  'name'=> 'Raghunathpur'),
       array('id'=>'Raiganj', 'ctry'=>'West_Bengal',  'name'=> 'Raiganj'),
       array('id'=>'Rampurhat ', 'ctry'=>'West_Bengal',  'name'=> 'Rampurhat '),
       array('id'=>'Ranaghat', 'ctry'=>'West_Bengal',  'name'=> 'Ranaghat'),
       array('id'=>'Sainthia', 'ctry'=>'West_Bengal',  'name'=> 'Sainthia'),
       array('id'=>'Santipur', 'ctry'=>'West_Bengal',  'name'=> 'Santipur'),
       array('id'=>'Siliguri', 'ctry'=>'West_Bengal',  'name'=> 'Siliguri'),
       array('id'=>'Sonamukhi ', 'ctry'=>'West_Bengal',  'name'=> 'Sonamukhi '),
       array('id'=>'Srirampore ', 'ctry'=>'West_Bengal',  'name'=> 'Srirampore '),
       array('id'=>'Suri', 'ctry'=>'West_Bengal',  'name'=> 'Suri'),
       array('id'=>'Taki ', 'ctry'=>'West_Bengal',  'name'=> 'Taki '),
       array('id'=>'Tamluk', 'ctry'=>'West_Bengal',  'name'=> 'Tamluk'),
       array('id'=>'Tarakeswar', 'ctry'=>'West_Bengal',  'name'=> 'Tarakeswar'),
       


	); 

	return $statecityArray;
}




	public function getStateCityListById($stateId){
		$stateArray = $this->getStateCityList();	
		$stateCityArray = array();
		//echo $stateId;
		foreach($stateArray as $states){
			
			if($states['ctry'] == $stateId ){
				array_push($stateCityArray,$states);

			}
		}

		return $stateCityArray;
		}
	



	public function convertFormat($string){
		$rValue = round($string);
		$length = strlen($rValue);
		switch ($length) {
			case '6':
			case '7':
				return substr($rValue, 0, -5).' L';	
			break;
			
			case '8':
				return substr($rValue, 0, -7).' C';	
			break;

			default:
				return $string;
				break;
		}
		

	}




	public function getPdfString($orderNo, $quoteNo){


		// $orderNo = 'VDJC107645';
		// $quoteNo = 'QRN201710250000862';
		
		$orderNo = base64_encode($orderNo.'$'.$quoteNo);
		$policyNo =base64_encode($quoteNo);
		$pdfXml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:def="http://schemas.cordys.com/default">
		   <soapenv:Header/>
		   <soapenv:Body>
		      <def:MISPolicyPDFDownload>
		         <def:orderNo>'.$orderNo.'</def:orderNo>
		         <def:emailID></def:emailID>
		         <def:policyNo>'.$policyNo.'</def:policyNo>
		      </def:MISPolicyPDFDownload>
		   </soapenv:Body>
		</soapenv:Envelope>';

		return $pdfXml;
	}



	public function get_string_between($string, $start, $end){
    	$string = ' ' . $string;
    	$ini = strpos($string, $start);
    	if ($ini == 0) return '';
    		$ini += strlen($start);
    
    	$len = strpos($string, $end, $ini) - $ini;
    	return substr($string, $ini, $len);
	}



public function getmemberDetails($travel_name,$travel_gender,$travel_LastName,$tvl_pro_dob,$tvl_pro_national,$tvl_pro_nname,$tvl_pro_nrelation,$tvl_pro_passport_no){

    return '<Member>
            <CurrentLocation>Y</CurrentLocation>
            <FirstName>'.$travel_name.'</FirstName>
            <Gender>'.$travel_gender.'</Gender>
            <HoldPassport>Y</HoldPassport>
            <LastName>'.$travel_LastName.'</LastName>
            <MemberDOB>'.$tvl_pro_dob.'</MemberDOB>

            <Nationality>'.$tvl_pro_national.'</Nationality>
            <NomineeName>'.$tvl_pro_nname.'</NomineeName>
            <AppointeeName />
            <AppointeeRelationCode />
            <NomineeRelationCode>'.$tvl_pro_nrelation.'</NomineeRelationCode>
            <PassportNo>'.$tvl_pro_passport_no.'</PassportNo>
            <ProposerRelationCode>Self</ProposerRelationCode>
            <Salut>MR</Salut>
          </Member>';
 	}



	public function checkAndInsertCompanyCommon($insertArray,$table,$tableId){


		switch ($table) {
		    case "tbl_vech_company":
       			$this->db->select($tableId);    
        		$this->db->from($table);
        	    $this->db->where('cmpny_name',$insertArray['cmpny_name']);
		        break;
		    case "tbl_vech_model_varient":
       			$this->db->select($tableId);    
        		$this->db->from($table);
		        $this->db->where('model_name',$insertArray['model_name']);
		        $this->db->where('varient_name',$insertArray['varient_name']);
		        break;
		    default:
		        echo "some thing wrong";
		}
        $query = $this->db->get();

        $result = $query->result_id;
        $userData = array();
        $row = $query->row();
		//echo $this->db->last_query(); exit(); 
        if(isset($row))
        {
        	return $row->$tableId; 
        } else {
       		$this->db->insert($table, $insertArray);
    		$latest_id = $this->db->insert_id();
    		return $latest_id;
    	}
 	}	
 


	public function checkAndInsertVechicleState($insertArray,$table,$tableId){

		$this->db->select('*');    
		$this->db->from($table);
        $this->db->where('company_id',$insertArray['company_id']);
        $this->db->where('model_id',$insertArray['model_id']);
        //$this->db->where('reg_state',$insertArray['reg_state']);
        $query = $this->db->get();

        $result = $query->result_id;
        $userData = array();
        $row = $query->row();
		//echo $this->db->last_query(); exit(); 
        if(isset($row))
        {
        	//echo $row->ex_showroom_price;
        	if(($row->ex_showroom_price == $insertArray['ex_showroom_price']) && ($row->reg_state != $insertArray['reg_state'])) {
				$updateData = array(
					'reg_state'	=> 'ALL',
					'state_code' => 'ALL',
				);
        		$this->db->where($tableId, $row->$tableId);
        		$this->db->update($table, $updateData);
        	} else if($row->reg_state != $insertArray['reg_state']) {
				$this->db->insert($table, $insertArray);
    			$latest_id = $this->db->insert_id();
    			return $latest_id;
        	}
        	return $row->$tableId; 
        } else {
       		$this->db->insert($table, $insertArray);
    		$latest_id = $this->db->insert_id();
    		return $latest_id;
    	}
 	}	

 	public function getHomeSIPremium($sumInsured){

 		$premiumArray = $this->getHomePrmiumArray(); 
 		foreach ($premiumArray as $val) {
 		
      		if ($val['cont_SI'] == $sumInsured) {
      			return $val;
       		}
   		}	
 	 		
 	}

 	public function getHomePrmiumArray(){

$premiumArray = array(
	array('plan'=>'plan1','cont_SI'=>'500000','cont_prm'=>'343','appl_SI'=>'500000','appl_prm'=>'2038','add_rnt_SI'=>'7500','add_rnt_prm'=>'2',
		'Legal_lbty' =>'16000', 'Legal_lbty'=>'120','val_SI'=>'DB','val_prm'=>'2119','buld_SI'=>'3000000','build_prm'=>'','terr_SI'=>'500000','terr_prm'=>'40'),

	array('plan'=>'plan2', 'cont_SI'=>'1000000', 'cont_prm'=>'685', 'appl_SI'=>'1000000', 'appl_prm'=>'2461', 'add_rnt_SI'=>'15000', 'add_rnt_prm'=>'4', 'Legal_lbty' =>'16000', 'Legal_lbty'=>'160', 'val_SI'=>'DB', 'val_prm'=>'3814','buld_SI'=>'5000000', 'build_prm'=>'1750', 'terr_SI'=>'1000000', 'terr_prm'=>'80'),
	
	array('plan'=>'plan3', 'cont_SI'=>'2000000', 'cont_prm'=>'1370', 'appl_SI'=>'2000000', 'appl_prm'=>'4578', 'add_rnt_SI'=>'30000', 'add_rnt_prm'=>'8', 'Legal_lbty' =>'16000', 'Legal_lbty'=>'240', 'val_SI'=>'DB', 'val_prm'=>'6780','buld_SI'=>'7000000', 'build_prm'=>'2450', 'terr_SI'=>'2000000', 'terr_prm'=>'160'),

	array('plan'=>'plan4', 'cont_SI'=>'3000000', 'cont_prm'=>'2055', 'appl_SI'=>'3000000', 'appl_prm'=>'6695', 'add_rnt_SI'=>'45000', 'add_rnt_prm'=>'12', 'Legal_lbty' =>'16000', 'Legal_lbty'=>'320', 'val_SI'=>'DB', 'val_prm'=>'12712','buld_SI'=>'10000000', 'build_prm'=>'3500', 'terr_SI'=>'3000000', 'terr_prm'=>'240'),

	array('plan'=>'plan5', 'cont_SI'=>'4000000', 'cont_prm'=>'2740', 'appl_SI'=>'4000000', 'appl_prm'=>'8309', 'add_rnt_SI'=>'60000', 'add_rnt_prm'=>'16', 'Legal_lbty' =>'32000', 'Legal_lbty'=>'480', 'val_SI'=>'DB', 'val_prm'=>'12712','buld_SI'=>'13000000', 'build_prm'=>'4550', 'terr_SI'=>'4000000', 'terr_prm'=>'320'),

	array('plan'=>'plan6', 'cont_SI'=>'5000000', 'cont_prm'=>'3425', 'appl_SI'=>'5000000', 'appl_prm'=>'9154', 'add_rnt_SI'=>'75000', 'add_rnt_prm'=>'20', 'Legal_lbty' =>'32000', 'Legal_lbty'=>'560', 'val_SI'=>'DB', 'val_prm'=>'14407','buld_SI'=>'17000000', 'build_prm'=>'5950', 'terr_SI'=>'5000000', 'terr_prm'=>'400'),

	array('plan'=>'plan7', 'cont_SI'=>'7500000', 'cont_prm'=>'5138', 'appl_SI'=>'7500000', 'appl_prm'=>'10422', 'add_rnt_SI'=>'112500', 'add_rnt_prm'=>'30', 'Legal_lbty' =>'32000 ', 'Legal_lbty'=>'760', 'val_SI'=>'DB', 'val_prm'=>'19492','buld_SI'=>'20000000', 'build_prm'=>'7000', 'terr_SI'=>'7500000', 'terr_prm'=>'600'),
	
);

 		return $premiumArray;
 	}



 	public function getOfficeSIPremium($sumInsured){

 		$premiumArray = $this->getOfficePrmiumArray(); 
 		foreach ($premiumArray as $val) {
 		
      		if ($val['SI'] == $sumInsured) {
      			return $val;
       		}
   		}	
 	 		
 	}


	public function getOfficePrmiumArray(){

	
		$premiumArray = array(	
			array('plan'=>'plan1','SI'=>'500000','premium'=>'1772','money'=>'1019','money_prm'=>'40','fidelity'=>'500000','fidelity_prm'=>'1500', 
				'neon'=>'5000','neon_prm'=>'25', 'third_party'=>'200000','third_party_prm'=>'100','pa'=>'200000','pa_prm'=>'750','baggage'=>'10000','baggage_prm'=>'50'),
			array('plan'=>'plan2','SI'=>'1000000','premium'=>'4938','money'=>'15000','money_prm'=>'60','fidelity'=>'700000','fidelity_prm'=>'2100', 
				'neon'=>'7500','neon_prm'=>'38', 'third_party'=>'280000','third_party_prm'=>'140','pa'=>'300000','pa_prm'=>'1125','baggage'=>'15000','baggage_prm'=>'75'),
			array('plan'=>'plan3','SI'=>'1500000','premium'=>'7363','money'=>'20000','money_prm'=>'80','fidelity'=>'10000000','fidelity_prm'=>'3000', 
				'neon'=>'9000','neon_prm'=>'45', 'third_party'=>'400000','third_party_prm'=>'200','pa'=>'400000','pa_prm'=>'1500','baggage'=>'20000','baggage_prm'=>'100'),
			array('plan'=>'plan4','SI'=>'2000000','premium'=>'9152','money'=>'25000','money_prm'=>'100','fidelity'=>'15000000','fidelity_prm'=>'4500', 
				'neon'=>'10000','neon_prm'=>'50', 'third_party'=>'600000','third_party_prm'=>'300','pa'=>'500000','pa_prm'=>'1875','baggage'=>'25000','baggage_prm'=>'125'),
		);	

	return $premiumArray;
	}




 	public function getShopSIPremium($sumInsured){

 		$premiumArray = $this->getShopPremiumArray(); 
 		foreach ($premiumArray as $val) {
 		
      		if ($val['SI'] == $sumInsured) {
      			return $val;
       		}
   		}	
 	 		
 	}



	public function getShopPremiumArray(){

		$premiumArray = array(	
			array('plan'=>'plan1','SI'=>'500000','fire'=>'500000','fire_prm'=>'1019','burglary'=>'500000','burglary_prm'=>'125','money'=>'250000','money_prm'=>'750',
				'legal_liability'=>'200000', 'legal_liability_prm'=>'100','plate_glass'=>'25000','plate_glass_prm'=>'75','baggage'=>'10000','baggage_prm'=>'50'),
			array('plan'=>'plan2','SI'=>'1000000','fire'=>'1000000','fire_prm'=>'2062','burglary'=>'1000000','burglary_prm'=>'250','money'=>'500000','money_prm'=>'1500',
				'legal_liability'=>'400000', 'legal_liability_prm'=>'200','plate_glass'=>'50000','plate_glass_prm'=>'150','baggage'=>'15000','baggage_prm'=>'75'),
			array('plan'=>'plan3','SI'=>'1500000','fire'=>'1500000','fire_prm'=>'2682','burglary'=>'1500000','burglary_prm'=>'375','money'=>'750000','money_prm'=>'2250',
				'legal_liability'=>'600000', 'legal_liability_prm'=>'300','plate_glass'=>'75000','plate_glass_prm'=>'225','baggage'=>'20000','baggage_prm'=>'100'),
			array('plan'=>'plan4','SI'=>'2000000','fire'=>'2000000','fire_prm'=>'3302','burglary'=>'2000000','burglary_prm'=>'500','money'=>'1000000','money_prm'=>'3000',
				'legal_liability'=>'800000', 'legal_liability_prm'=>'400','plate_glass'=>'100000','plate_glass_prm'=>'300','baggage'=>'25000','baggage_prm'=>'125'),
		);	
		return $premiumArray;
	}




 	public function getTotalSIByItem($leadId, $item){

 		$this->db->select_sum('hme_SI');
   		$this->db->from('tbl_pee_details');
    	$this->db->where('lead_id',$leadId);
    	$this->db->where('hme_itm_des',$item);
    	$query = $this->db->get();
    	return $query->row()->hme_SI;
 	}



 	public function getPAPrmiumArray(){

		$premiumArray = array(
			array('sum_insured'=>'2500000', 'prm'=>'3250'),
			array('sum_insured'=>'5000000', 'prm'=>'6500'),
			array('sum_insured'=>'7500000', 'prm'=>'9750'),
			array('sum_insured'=>'10000000', 'prm'=>'13000'),
			array('sum_insured'=>'15000000', 'prm'=>'19500'),
			array('sum_insured'=>'20000000', 'prm'=>'26000'),
			array('sum_insured'=>'25000000', 'prm'=>'32500'),
			array('sum_insured'=>'30000000', 'prm'=>'39000'),
		); 	

		return 	$premiumArray;
 	}


 	public function getPAPremiumBySI($sumInsured){

 		$premiumArray = $this->getPAPrmiumArray(); 
 		foreach ($premiumArray as $val) {
 		
      		if ($val['sum_insured'] == $sumInsured) {
      			return $val['prm'];
       		}
   		}
 	}

// compo premium for GHC common for all as of now. 

 	public function getComboPrmiumArray(){

		$premiumArray = array(
			array('sum_insured'=>'1000000', 'age'=>'45', 'prm'=>'593','gst'=>'107'),
			array('sum_insured'=>'2000000', 'age'=>'45', 'prm'=>'593','gst'=>'107'),
			array('sum_insured'=>'3000000', 'age'=>'45', 'prm'=>'593','gst'=>'107'),
			array('sum_insured'=>'4000000', 'age'=>'45', 'prm'=>'593','gst'=>'107'),
			
		); 	

		return 	$premiumArray;
 	}

 	public function getComboPremiumBySI($sumInsured){

 		$premiumArray = $this->getComboPrmiumArray(); 
 		foreach ($premiumArray as $val) {
 		
      		if ($val['sum_insured'] == $sumInsured) {
      			return $val;
       		}
   		}
 	}



 	public function getCIPrmiumArrayForCombo(){

		$premiumArray = array(
			array('sum_insured'=>'1000000', 'age'=>'below', 'pa_prm'=>'4085','ci_prm'=>'1000'),
			array('sum_insured'=>'2000000', 'age'=>'below', 'pa_prm'=>'8169','ci_prm'=>'2000'),
			array('sum_insured'=>'3000000', 'age'=>'below', 'pa_prm'=>'12254','ci_prm'=>'3000'),
			array('sum_insured'=>'4000000', 'age'=>'below', 'pa_prm'=>'16339','ci_prm'=>'4000'),
			array('sum_insured'=>'1000000', 'age'=>'above', 'pa_prm'=>'6627','ci_prm'=>'1000'),
			array('sum_insured'=>'2000000', 'age'=>'above', 'pa_prm'=>'13254','ci_prm'=>'2000'),
			array('sum_insured'=>'3000000', 'age'=>'above', 'pa_prm'=>'19881','ci_prm'=>'3000'),
			array('sum_insured'=>'4000000', 'age'=>'above', 'pa_prm'=>'26508','ci_prm'=>'4000'),	
		); 	

		return 	$premiumArray;
 	}



 	public function getCIComboPremiumBySIAge($sumInsured,$type){

 		$premiumArray = $this->getCIPrmiumArrayForCombo(); 

 	 		foreach ($premiumArray as $val) {
 		  		if ($val['sum_insured'] == $sumInsured && $val['age'] == $type) {
      			return $val;
       		}
   		}
 	}




 	public function getTotalPrmiumArrayForCombo(){

		$premiumArray = array(
			array('sum_insured'=>'1000000', 'age'=>'below', 'tot_prm'=>'5085','tot_gst'=>'915'),
			array('sum_insured'=>'2000000', 'age'=>'below', 'tot_prm'=>'10169','tot_gst'=>'1831'),
			array('sum_insured'=>'3000000', 'age'=>'below', 'tot_prm'=>'15254','tot_gst'=>'2746'),
			array('sum_insured'=>'4000000', 'age'=>'below', 'tot_prm'=>'20339','tot_gst'=>'3661'),
			array('sum_insured'=>'1000000', 'age'=>'above', 'tot_prm'=>'7627','tot_gst'=>'1373'),
			array('sum_insured'=>'2000000', 'age'=>'above', 'tot_prm'=>'15254','tot_gst'=>'2746'),
			array('sum_insured'=>'3000000', 'age'=>'above', 'tot_prm'=>'22881','tot_gst'=>'4119'),
			array('sum_insured'=>'4000000', 'age'=>'above', 'tot_prm'=>'30508','tot_gst'=>'5492'),
			
		); 	

		return 	$premiumArray;
 	}


 	public function getTotalPremiumBySIAge($sumInsured,$type){

 		$premiumArray = $this->getTotalPrmiumArrayForCombo(); 

 	 		foreach ($premiumArray as $val) {
 		  		if ($val['sum_insured'] == $sumInsured && $val['age'] == $type) {
      			return $val;
       		}
   		}
 	}



 		//data fetch from db  
		 public function getCityPincode($cus_pincode){


        $this->db->where('cus_pincode', $cus_pincode);
        $query = $this->db->get('tbl_pincode');
        $result = $query->result_id;

        $row = array();
       //if($result->num_rows == 1)
       // {
            $row = $query->row();
            //$forgetPassString = base64_encode($row->emp_code.'&'.date('Ymd').time());
            //$data = array('forgot_pass_link'=>$forgetPassString);
            //$this->db->where('email_address', $email);
            //$this->db->update('tbl_users', $data); 
            return $row;
        //} else {

        //    return '0';
       // }
    }



// Bagi AV user comment 
	/*public function getComment($leadId){

		$this->db->select('comment'); 
		$this->db->from('tbl_comments');
		$this->db->where('lead_id', $leadId);
		$this->db->order_by('created_by','desc')->limit(1);
		

		 $query = $this->db->get();
      // var_dump($this->db->last_query());
        return $query->result();

		
		}*/



	 public function getoccupation(){

	  $occupationlistArray = array( 
		
		array('id'=> 'Architech/Artist/Author','name'=>'Architech/Artist/Author'),
		array('id'=> 'Bargeman/ Barge Operator','name'=>'Bargeman/ Barge Operator'),
		array('id'=> 'Blacksmith','name'=>'Blacksmith'),
		array('id'=> 'Boat Builder', 'name'=>'Boat Builder'),
		array('id'=> 'Bouncer', 'name'=>'Bouncer'),
		array('id'=> 'Builder Contract', 'name'=>'Builder Contract'),
		array('id'=> 'Building & Construction Workers', 'name'=>'Building & Construction Workers'),
		array('id'=> 'Business Owner', 'name'=>'Business Owner'),
		array('id'=> 'Butcher', 'name'=>'Butcher'),
		array('id'=> 'Carpenter', 'name'=>'Carpenter'),
		array('id'=> 'Chef/Cook', 'name'=>'Chef/Cook'),
		array('id'=> 'Construction Formen', 'name'=>'Construction Formen'),
		array('id'=> 'Construction Formen', 'name'=>'Construction Formen'),
		array('id'=> 'Construction Worker(labourer)', 'name'=>'Construction Worker(labourer)'),
		array('id'=> 'Crane  Operator', 'name'=>'Crane  Operator'),
		array('id'=> 'Cruise Liner', 'name'=>'Cruise Liner'),
		array('id'=> 'Dance Hostess', 'name'=>'Dance Hostess'),
		array('id'=> 'Dancer(Professional)', 'name'=>'Dancer(Professional)'),
		array('id'=> 'Dealer Explosives', 'name'=>'Dealer Explosives'),
		array('id'=> 'Defence forces', 'name'=>'Defence forces'),
		array('id'=> 'Dock Worker', 'name'=>'Dock Worker'),
		array('id'=> 'Driver', 'name'=>'Driver'),
		array('id'=> 'Driver Instructor', 'name'=>'Driver Instructor'),
		array('id'=> 'Engineer(Office Duties Only)', 'name'=>'Engineer(Office Duties Only)'),
		array('id'=> 'Farmer/Factory Worker(Non Hazardous)', 'name'=>'Farmer/Factory Worker(Non Hazardous)'),
		array('id'=> 'Fisherman', 'name'=>'Fisherman'),
		array('id'=> 'Fitter', 'name'=>'Fitter'),
		array('id'=> 'Flight Steward/Stewardess', 'name'=>'Flight Steward/Stewardess'),
		array('id'=> 'Forklift Driver', 'name'=>'Forklift Driver'),
		array('id'=> 'Harbour Pilot', 'name'=>'Harbour Pilot'),
		array('id'=> 'Heavy Vehicles Driver', 'name'=>'Heavy Vehicles Driver'),
	    array('id' => 'Homemaker','name'=>'Homemaker'),
	    array('id' => 'IT/ITIS Professional','name'=>'IT/ITIS Professional' ),
	    array('id' => 'Janitor','name'=>'Janitor' ),
	    array('id' => 'Jockey','name'=>'Jockey' ),
	    array('id' => 'Lifeguard(Prefessionla/Full-time)','name'=>'Lifeguard(Prefessionla/Full-time)' ),
	    array('id' => 'Lorry/Truck  Driver','name'=>'Lorry/Truck  Driver' ),
	    array('id' => 'Machine Operator','name'=>'Machine Operator' ),
	    array('id' => 'Machine Operator/Manual Labor','name'=>'Machine Operator/Manual Labor' ),
	    array('id' => 'Machinist','name'=>'Machinist' ),
	    array('id' => 'Manager/administrative','name'=>'Manager/administrative' ),
	    array('id' => 'Machanic(Car)','name'=>'Machanic(Car)' ),
	    array('id' => 'Metallurgical Surveyor','name'=>'Metallurgical Surveyor' ),
	    array('id' => 'Miners','name'=>'Miners' ),
	    array('id' => 'Nuclear reactor workers','name'=>'Nuclear reactor workers' ),
	    array('id' => 'Odd Job Labourer','name'=>'Odd Job Labourer' ),
	    array('id' => 'Oil  Refinery Engineer','name'=>'Oil  Refinery Engineer' ),
	    array('id' => 'Oil Refinery Plant Operator','name'=>'Oil Refinery Plant Operator' ),
	    array('id' => 'Operator Explosives','name'=>'Operator Explosives' ),
	    array('id' => 'Others','name'=>'Others' ),
	    array('id' => 'Painter','name'=>'Painter' ),
	    array('id' => 'Personal Security','name'=>'Personal Security' ),
	    array('id' => 'Plumber','name'=>'Plumber' ),
	    array('id' => 'Police','name'=>'Police' ),
	    array('id' => 'Politician','name'=>'Politician' ),
	    array('id' => 'Professional(CA/Doctor/Teacher etc)','name'=>'Professional(CA/Doctor/Teacher etc)' ),
	    array('id' => 'Railway driver','name'=>'Railway driver' ),
	    array('id' => 'Remover(House/Office)','name'=>'Remover(House/Office)' ),
	    array('id' => 'Salesperson doing field visits','name'=>'Salesperson doing field visits' ),
	    array('id' => 'Salvage Vessel -Officer & Crew','name'=>'Salvage Vessel -Officer & Crew' ),
	    array('id' => 'Security Gaurd','name'=>'Security Gaurd' ),
	    array('id' => 'Ship Building Technical Personnel','name'=>'Ship Building Technical Personnel' ),
	    array('id' => 'Site Supervisors','name'=>'Site Supervisors' ),
	    array('id' => 'Store Keeper / Store man(manufacturing industry)','name'=>'Store Keeper / Store man(manufacturing industry)' ),
	    array('id' => 'Taxi Driver','name'=>'Taxi Driver' ),
	    array('id' => 'Timber Industry Sawyer','name'=>'Timber Industry Sawyer' ),
	    array('id' => 'Tug Boat Operator','name'=>'Tug Boat Operator' ),
	    array('id' => 'Welder','name'=>'Welder' ),
	    array('id' => 'Window Cleaner','name'=>'Window Cleaner' ),
	    array('id' => 'Zoo Keeper','name'=>'Zoo Keeper' ),
	    
	);
	return $occupationlistArray;
     }

}

    

?>
