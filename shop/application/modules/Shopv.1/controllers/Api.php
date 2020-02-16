<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller{
	
	private $uniqueId;
	private $regexAlphanumeric;
	private $regexNumbers;
	private $planname;
	private $familyType;
	private $suminsured;
	private $premium;
	private $proposername;
	private $dateofbirth;
	private $addressline1;
	private $addressline2;
	private $addressline3;
	private $cityname;
	private $statename;
	private $pincodevalue;
	private $emailidname;
	private $mobileNumber;
	private $pancardnumber;
	private $nationality;
	private $ppsd;
	private $bankcustid;
	private $member1name;
	private $member1relation;
	private $member1dob;
	private $member1gender;
	private $member1weight;
	private $member1height;
	private $member2name;
	private $member2relation;
	private $member2dob;
	private $member2gender;
	private $member2weight;
	private $member2height;
	private $member3name;
	private $member3relation;
	private $member3dob;
	private $member3gender;
	private $member3height;
	private $member3weight;
	private $member4name;
	private $member4relation;
	private $member4dob;
	private $member4gender;
	private $member4height;
	private $member4weight;
	private $member5name;
	private $member5relation;
	private $member5dob;
	private $member5gender;
	private $member5weight;
	private $member5height;
	private $nomineename;
	private $nomineeage;
	private $nomineerelation;
	private $appointename;
	private $appointerelation;
	private $hdfcbankempid;
	private $hdfcbankempmobile;
	private $billdesktransrefno;
	private $billedeskpaymentdate;
	
	public function __construct(){
		parent::__construct();
		$this->regexAlphanumeric = '/^[a-zA-Z0-9]+$/';
		$this->regexNumbers = '/^[0-9]+$/';
		$this->uniqueId			=	'';
		$this->planname			=	'';
		$this->familyType		=	'';
		$this->suminsured		=	'';
		$this->premium			=	'';
		$this->proposername		=	'';
		$this->dateofbirth		=	'';
		$this->addressline1		=	'';
		$this->addressline2		=	'';
		$this->addressline3		=	'';
		$this->cityname			=	'';
		$this->statename		=	'';
		$this->pincodevalue		=	'';
		$this->emailidname		=	'';
		$this->mobileNumber		=	'';
		$this->pancardnumber	=	'';
		$this->nationality		=	'';
		$this->ppsd				=	'';
		$this->bankcustid		=	'';
		$this->member1name		=	'';
		$this->member1relation	=	'';
		$this->member1dob		=	'';
		$this->member1gender	=	'';
		$this->member1weight	=	'';
		$this->member1height	=	'';
		$this->member2name		=	'';
		$this->member2relation	=	'';
		$this->member2gender	=	'';
		$this->member2dob 		= 	'';
		$this->member2weight 	= 	'';
		$this->member2height 	= 	'';
		$this->member3name		=	'';
		$this->member3relation	=	'';
		$this->member3gender	=	'';
		$this->member3dob		=	'';
		$this->member3weight	=	'';
		$this->member3height	=	'';
		$this->member4name		=	'';
		$this->member4relation	=	'';
		$this->member4gender	=	'';
		$this->member4dob 		= 	'';
		$this->member4height 	= 	'';
		$this->member4weight 	= 	'';
		$this->member5name		=	'';
		$this->member5relation 	= '';
		$this->member5dob 		= '';
		$this->member5gender 	= '';
		$this->member5height 	= '';
		$this->member5weight 	= '';
		$this->nomineename 	= '';
		$this->nomineeage 		= '';
		$this->nomineerelation = '';
		$this->appointename 	= '';
		$this->appointerelation = '';
		$this->hdfcbankempid 	= '';
		$this->hdfcbankempmobile = '';
		$this->billdesktransrefno = '';
		$this->billedeskpaymentdate = '';
	}
	
	public function getdata(){
		$headers  = getallheaders();
		$username = $headers['APIUSERNAME'];
		$password = $headers['APIPASSWORD'];
		
		if($_SERVER['REQUEST_METHOD'] != "POST"){
			$error_responce['status'] = false;
			$error_responce['errorMessage'] = "404 Error, Something went wrong!";
			echo json_encode($error_responce);
			return false;
			die;
		}
		
		if($username == 'bagi' && $password == base64_encode(MD5('bagi123456@Aa'))){
			$this->__getdata();
		} else {
			$error_responce['status'] = false;
			$error_responce['errorMessage'] = "Username and Password not Matched! Please try again!";
			echo json_encode($error_responce);
		}
		
	}
	
	private function __getdata(){
		
		$stringJson = file_get_contents('php://input');
		$inputData = json_decode($stringJson,true);
		$errorCount = 0;
		$errorMessage = array();
		$this->uniqueId = $inputData['uniqueId'];
		if(array_key_exists('uniqueId',$inputData) == false){
			$errorMessage['error_unique_Id'] = " `uniqueId` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->uniqueId)){
			$errorMessage['error_unique_Id'] = "Please Enter Unique ID";
			$errorCount++;
		}

		$this->planname = $inputData['planname'];
		if(array_key_exists('planname',$inputData) == false){
			$errorMessage['error_plan_name'] = " `planname` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->planname)){
			$errorMessage['error_plan_name'] = "Please Enter Plan Name";
			$errorCount++;
		} else if(!empty($this->planname) && strlen($this->planname) > 6){
			$errorMessage['error_plan_name'] = "Plan Name exceeds 6 characters, please check ";
			$errorCount++;
		}

		$this->familyType = $inputData['familyType'];
		if(array_key_exists('familyType',$inputData) == false){
			$errorMessage['error_family_type'] = " `familyType` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->familyType)){
			$errorMessage['error_family_type'] = "Please Enter Family Type";
			$errorCount++;
		} else if(!empty($this->familyType) && strlen($this->familyType) > 5){
			$errorMessage['error_family_type'] = "Family Type exceeds 5 characters, please check ";
			$errorCount++;
		} else if(!empty($this->familyType) && preg_match($this->regexAlphanumeric, $this->familyType) == false){
			$errorMessage['error_family_type'] = "Please Enter Family Type is Alphanumeric";
			$errorCount++;
		}
		$this->suminsured = $inputData['suminsured'];
		if(array_key_exists('suminsured',$inputData) == false){
			$errorMessage['error_suminsured'] = " `suminsured` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->suminsured)){
			$errorMessage['error_suminsured'] = "Please Enter Sum Insured ";
			$errorCount++;
		} else if(!empty($this->suminsured) && strlen($this->suminsured) > 9){
			$errorMessage['error_suminsured'] = "Sum Insured exceeds 9 characters, please check ";
			$errorCount++;
		} else if(!empty($this->suminsured) && preg_match($this->regexAlphanumeric, $this->suminsured) == false){
			$errorMessage['error_suminsured'] = "Please Enter Sum Insured is Alphanumeric";
			$errorCount++;
		}
		$this->premium = $inputData['premium'];
		if(array_key_exists('premium',$inputData) == false){
			$errorMessage['error_premium'] = " `premium` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->premium)){
			$errorMessage['error_premium'] = "Please Enter Premium";
			$errorCount++;
		} else if(!empty($this->premium) && strlen($this->premium) > 5){
			$errorMessage['error_premium'] = "Premium exceeds 5 characters, please check ";
			$errorCount++;
		} else if(!empty($this->premium) && preg_match($this->regexNumbers, $this->premium) == false){
			$errorMessage['error_premium'] = "Please Enter Premium is Numbers Only";
			$errorCount++;
		}

		$this->proposername = $inputData['proposername'];
		if(array_key_exists('proposername',$inputData) == false){
			$errorMessage['error_proposer_name'] = " `proposername` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->proposername)){
			$errorMessage['error_proposer_name'] = "Please Enter Proposer Name";
			$errorCount++;
		}

		$this->dateofbirth = $inputData['dateofbirth'];
		if(array_key_exists('dateofbirth',$inputData) == false){
			$errorMessage['error_date_of_birth'] = " `dateofbirth` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->dateofbirth)){
			$errorMessage['error_date_of_birth'] = "Please Enter DOB";
			$errorCount++;
		} else if(!empty($this->dateofbirth) && preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$this->dateofbirth) == false){
			$errorMessage['error_date_of_birth'] = "Please Enter DOB format is YYYY-mm-dd";
			$errorCount++;
		}

		$this->addressline1 = $inputData['addressone'];
		if(array_key_exists('addressone',$inputData) == false){
			$errorMessage['error_address_one'] = " `addressone` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->addressline1)){
			$errorMessage['error_address_one'] = "Please Enter Address Line 1";
			$errorCount++;
		}

		$this->cityname = trim($inputData['city']);
		if(array_key_exists('city',$inputData) == false){
			$errorMessage['error_city'] = " `city` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->cityname)){
			$errorMessage['error_city'] = "Please Enter City";
			$errorCount++;
		}

		$this->statename = trim($inputData['state']);
		if(array_key_exists('state',$inputData) == false){
			$errorMessage['error_state'] = " `state` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->statename)){
			$errorMessage['error_state'] = "Please Enter State";
			$errorCount++;
		}

		$this->pincodevalue = trim($inputData['pincode']);
		if(array_key_exists('pincode',$inputData) == false){
			$errorMessage['error_pincode'] = " `pincode` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->pincodevalue)){
			$errorMessage['error_pincode'] = "Please Enter Pincode";
			$errorCount++;
		} else if(!empty($this->pincodevalue) && strlen($this->pincodevalue) > 6){
			$errorMessage['error_pincode'] = "Pincode exceeds 6 characters, please check ";
			$errorCount++;
		} else if(!empty($this->pincodevalue) && preg_match($this->regexNumbers, $this->pincodevalue) == false){
			$errorMessage['error_pincode'] = "Please Enter Pincode is Numbers Only";
			$errorCount++;
		}

		$this->emailidname = trim($inputData['emailid']);
		if(array_key_exists('emailid',$inputData) == false){
			$errorMessage['error_email_id'] = " `emailid` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->emailidname)){
			$errorMessage['error_email_id'] = "Please Enter Email ID";
			$errorCount++;
		} else if(!empty($this->emailidname) && preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$|^$/', $this->emailidname) == false){
			$errorMessage['error_email_id'] = "Please Enter Valid Email ID";
			$errorCount++;
		}

		$this->mobileNumber = trim($inputData['mobile']);
		if(array_key_exists('mobile',$inputData) == false){
			$errorMessage['error_mobile_number'] = " `mobile` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->mobileNumber)){
			$errorMessage['error_mobile_number'] = "Please Enter Mobile Number";
			$errorCount++;
		} else if(!empty($this->mobileNumber) && preg_match('/^[0-9]{1,10}$/', $this->mobileNumber) == false){
			$errorMessage['error_mobile_number'] = "Please Enter Valid Mobile Number";
			$errorCount++;
		}

		$this->nationality = trim($inputData['nationality']);
		if(array_key_exists('nationality',$inputData) == false){
			$errorMessage['error_nationality'] = " `nationality` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->nationality)){
			$errorMessage['error_nationality'] = "Please Enter Nationality";
			$errorCount++;
		}

		$this->ppsd = $inputData['ppsd'];
		if(array_key_exists('ppsd',$inputData) == false){
			$errorMessage['error_ppsd'] = " `ppsd` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->ppsd)){
			$errorMessage['error_ppsd'] = "Please Enter Proposed policy start date";
			$errorCount++;
		} else if(!empty($this->ppsd) && preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$this->ppsd) == false){
			$errorMessage['error_ppsd'] = "Please Enter Proposed policy start date format is YYYY-mm-dd";
			$errorCount++;
		}

		$this->bankcustid = trim($inputData['bankcustid']);
		if(array_key_exists('bankcustid',$inputData) == false){
			$errorMessage['error_bank_cust_id'] = " `bankcustid` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->bankcustid)){
			$errorMessage['error_bank_cust_id'] = "Please Enter Bank Cust ID";
			$errorCount++;
		}

		$this->member1name		=	trim($inputData['memberonename']);
		if(array_key_exists('memberonename',$inputData) == false){
			$errorMessage['error_member_one_name'] = " `memberonename` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->member1name)){
			$errorMessage['error_member_one_name'] = "Please Enter Member 1 Name";
			$errorCount++;
		}

		$this->member1relation	=	trim($inputData['memberonerelation']);
		if(array_key_exists('memberonerelation',$inputData) == false){
			$errorMessage['error_member_one_relation'] = " `memberonerelation` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->member1relation)){
			$errorMessage['error_member_one_relation'] = "Please Enter Member 1 Relation";
			$errorCount++;
		}

		$this->member1dob		=	trim($inputData['memberonedob']);
		if(array_key_exists('memberonedob',$inputData) == false){
			$errorMessage['error_member_one_dob'] = " `memberonedob` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->member1dob)){
			$errorMessage['error_member_one_dob'] = "Please Enter Member 1 DOB";
			$errorCount++;
		} else if(!empty($this->member1dob) && preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$this->member1dob) == false){
			$errorMessage['error_ppsd'] = "Please Enter Member 1 DOB format is YYYY-mm-dd";
			$errorCount++;
		}

		$this->member1gender	=	trim($inputData['memberonegender']);
		if(array_key_exists('memberonegender',$inputData) == false){
			$errorMessage['error_member_one_gender'] = " `memberonegender` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->member1gender)){
			$errorMessage['error_member_one_gender'] = "Please Enter Member 1 Gender";
			$errorCount++;
		}

		$this->member1weight	=	trim($inputData['memberoneweight']);
		if(array_key_exists('memberoneweight',$inputData) == false){
			$errorMessage['error_member_one_weight'] = " `memberoneweight` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->member1weight)){
			$errorMessage['error_member_one_weight'] = "Please Enter Member 1 Weight";
			$errorCount++;
		}

		$this->member1height	=	trim($inputData['memberoneheight']);
		if(array_key_exists('memberoneheight',$inputData) == false){
			$errorMessage['error_member_one_height'] = " `memberoneheight` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->member1height)){
			$errorMessage['error_member_one_height'] = "Please Enter Member 1 Height";
			$errorCount++;
		}

		$this->nomineename 	= trim($inputData['nomineename']);
		if(array_key_exists('nomineename',$inputData) == false){
			$errorMessage['error_nominee_name'] = " `nomineename` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->nomineename)){
			$errorMessage['error_nominee_name'] = "Please Enter Nominee Name";
			$errorCount++;
		}

		$this->nomineeage 		= trim($inputData['nomineeage']);
		if(array_key_exists('nomineeage',$inputData) == false){
			$errorMessage['error_nominee_age'] = " `nomineeage` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->nomineeage)){
			$errorMessage['error_nominee_age'] = "Please Enter Nominee Age";
			$errorCount++;
		} else if(!empty($this->nomineeage) && preg_match($this->regexNumbers, $this->nomineeage) == false){
			$errorMessage['error_nominee_age'] = "Please Enter Nominee Age is Numbers Only";
			$errorCount++;
		}
		
		$this->nomineerelation = trim($inputData['nomineerelation']);
		if(array_key_exists('nomineerelation',$inputData) == false){
			$errorMessage['error_nominee_relation'] = " `nomineerelation` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->nomineerelation)){
			$errorMessage['error_nominee_relation'] = "Please Enter Nominee Relation";
			$errorCount++;
		}

		$this->hdfcbankempid 	= trim($inputData['hdfcbankempid']);
		if(array_key_exists('hdfcbankempid',$inputData) == false){
			$errorMessage['error_hdfc_bank_empid'] = " `hdfcbankempid` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->hdfcbankempid)){
			$errorMessage['error_hdfc_bank_empid'] = "Please Enter HDFC Bank EmpID";
			$errorCount++;
		}
		$this->hdfcbankempmobile = trim($inputData['hdfcbankempmobile']);
		if(array_key_exists('hdfcbankempmobile',$inputData) == false){
			$errorMessage['error_hdfc_bank_emp_mobile'] = " `hdfcbankempmobile` Key not exist Please Enter";
			$errorCount++;
		} else if(empty($this->hdfcbankempmobile)){
			$errorMessage['error_hdfc_bank_emp_mobile'] = "Please Enter HDFC Bank Emp Mobile";
			$errorCount++;
		} else if(!empty($this->hdfcbankempmobile) && preg_match('/^[0-9]{1,10}$/', $this->hdfcbankempmobile) == false){
			$errorMessage['error_mobile_number'] = "Please Enter Valid HDFC Bank Emp Mobile Number";
			$errorCount++;
		}

		$this->pancardnumber = trim($inputData['pancardnumber']);
		if(array_key_exists('pancardnumber',$inputData) == false){
			$errorMessage['error_pancard_number'] = " `pancardnumber` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member2name = trim($inputData['membertwoname']);
		if(array_key_exists('membertwoname',$inputData) == false){
			$errorMessage['error_member_two_name'] = " `membertwoname` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member2relation = trim($inputData['membertworelation']);
		if(array_key_exists('membertworelation',$inputData) == false){
			$errorMessage['error_member_two_relation'] = " `membertworelation` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member2dob = trim($inputData['membertwodob']);
		if(array_key_exists('membertwodob',$inputData) == false){
			$errorMessage['error_member_two_dob'] = " `membertwodob` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member2gender = trim($inputData['membertwogender']);
		if(array_key_exists('membertwogender',$inputData) == false){
			$errorMessage['error_member_two_gender'] = " `membertwogender` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member2weight = trim($inputData['membertwoweight']);
		if(array_key_exists('membertwoweight',$inputData) == false){
			$errorMessage['error_member_two_weight'] = " `membertwoweight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member2height = trim($inputData['membertwoheight']);
		if(array_key_exists('membertwoheight',$inputData) == false){
			$errorMessage['error_member_two_height'] = " `membertwoheight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member3name = trim($inputData['memberthreename']);
		if(array_key_exists('memberthreename',$inputData) == false){
			$errorMessage['error_member_three_name'] = " `memberthreename` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member3relation = trim($inputData['memberthreerelation']);
		if(array_key_exists('memberthreerelation',$inputData) == false){
			$errorMessage['error_member_three_relation'] = " `memberthreerelation` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member3dob = trim($inputData['memberthreedob']);
		if(array_key_exists('memberthreedob',$inputData) == false){
			$errorMessage['error_member_three_dob'] = " `memberthreedob` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member3gender = trim($inputData['memberthreegender']);
		if(array_key_exists('memberthreegender',$inputData) == false){
			$errorMessage['error_member_three_gender'] = " `memberthreegender` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member3height = trim($inputData['memberthreeheight']);
		if(array_key_exists('memberthreeheight',$inputData) == false){
			$errorMessage['error_member_three_height'] = " `memberthreeheight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member3weight = trim($inputData['memberthreeweight']);
		if(array_key_exists('memberthreeweight',$inputData) == false){
			$errorMessage['error_member_three_weight'] = " `memberthreeweight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member4name = trim($inputData['memberfourname']);
		if(array_key_exists('memberfourname',$inputData) == false){
			$errorMessage['error_member_four_name'] = " `memberfourname` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member4relation = trim($inputData['memberfourrelation']);
		if(array_key_exists('memberfourrelation',$inputData) == false){
			$errorMessage['error_member_four_relation'] = " `memberfourrelation` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member4dob = trim($inputData['memberfourdob']);
		if(array_key_exists('memberfourdob',$inputData) == false){
			$errorMessage['error_member_four_dob'] = " `memberfourdob` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member4gender = trim($inputData['memberfourgender']);
		if(array_key_exists('memberfourgender',$inputData) == false){
			$errorMessage['error_member_four_gender'] = " `memberfourgender` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member4height = trim($inputData['memberfourheight']);
		if(array_key_exists('memberfourheight',$inputData) == false){
			$errorMessage['error_member_four_height'] = " `memberfourheight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member4weight = trim($inputData['membergfourweight']);
		if(array_key_exists('membergfourweight',$inputData) == false){
			$errorMessage['error_member_four_weight'] = " `membergfourweight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member5name = trim($inputData['memberfivename']);
		if(array_key_exists('memberfivename',$inputData) == false){
			$errorMessage['error_member_five_name'] = " `memberfivename` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member5relation = trim($inputData['memberfiverelation']);
		if(array_key_exists('memberfiverelation',$inputData) == false){
			$errorMessage['error_member_five_relation'] = " `memberfiverelation` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member5dob = trim($inputData['memberfivedob']);
		if(array_key_exists('memberfivedob',$inputData) == false){
			$errorMessage['error_member_five_dob'] = " `memberfivedob` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member5gender = trim($inputData['memberfivegender']);
		if(array_key_exists('memberfivegender',$inputData) == false){
			$errorMessage['error_member_five_gender'] = " `memberfivegender` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member5weight = trim($inputData['memberfiveweight']);
		if(array_key_exists('memberfiveweight',$inputData) == false){
			$errorMessage['error_member_five_weight'] = " `memberfiveweight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->member5height = trim($inputData['memberfiveheight']);
		if(array_key_exists('memberfiveheight',$inputData) == false){
			$errorMessage['error_member_five_height'] = " `memberfiveheight` Key not exist Please Enter";
			$errorCount++;
		}

		$this->appointename = trim($inputData['appointename']);
		if(array_key_exists('appointename',$inputData) == false){
			$errorMessage['error_member_five_appointee_name'] = " `appointename` Key not exist Please Enter";
			$errorCount++;
		}

		$this->appointerelation = trim($inputData['appointerelation']);
		if(array_key_exists('appointerelation',$inputData) == false){
			$errorMessage['error_member_five_appointee_relation'] = " `appointerelation` Key not exist Please Enter";
			$errorCount++;
		}

		$this->billdesktransrefno = trim($inputData['billdesktransrefno']);
		if(array_key_exists('billdesktransrefno',$inputData) == false){
			$errorMessage['error_bill_desc_trsref'] = " `billdesktransrefno` Key not exist Please Enter";
			$errorCount++;
		}
		$this->billedeskpaymentdate = trim($inputData['billedeskpaymentdate']);
		if(array_key_exists('billedeskpaymentdate',$inputData) == false){
			$errorMessage['error_bill_desc_trs_date'] = " `billedeskpaymentdate` Key not exist Please Enter";
			$errorCount++;
		}

		if($errorCount > 0 ){
			$dataError['status'] = false;
			$dataError['errorMessage'] = "ERROR";
			$dataError['message'] = $errorMessage;
		} else {

		$membershipData = array(
				array(
				'member1name' => $this->member1name,
				'member1relation' => $this->member1relation,
				'member1dob' => $this->member1dob,
				'member1gender' => $this->member1gender,
				'member1height' => $this->member1height,
				'member1weight' => $this->member1weight
				),
				array(
					'member2name' => $this->member2name,
					'member2relation' => $this->member2relation,
					'member2dob' => $this->member2dob,
					'member2gender' => $this->member2gender,
					'member2height' => $this->member2height,
					'member2weight' => $this->member2weight
					),
					array(
						'member3name' => $this->member3name,
						'member3relation' => $this->member3relation,
						'member3dob' => $this->member3dob,
						'member3gender' => $this->member3gender,
						'member3height' => $this->member3height,
						'member3weight' => $this->member3weight
						),
						array(
							'member4name' => $this->member4name,
							'member4relation' => $this->member4relation,
							'member4dob' => $this->member4dob,
							'member4gender' => $this->member4gender,
							'member4height' => $this->member4height,
							'member4weight' => $this->member4weight
							),
							array(
								'member5name' => $this->member5name,
								'member5relation' => $this->member5relation,
								'member5dob' => $this->member5dob,
								'member5gender' => $this->member5gender,
								'member5height' => $this->member5height,
								'member5weight' => $this->member5weight
								)
							);
			$dataInsertion['sur_unique_id'] = $this->uniqueId;
			$dataInsertion['sur_plan_name'] = $this->planname;
			$dataInsertion['sur_family_type'] = $this->familyType;
			$dataInsertion['sur_sum_insured'] = $this->suminsured;
			$dataInsertion['sur_premium'] = $this->premium;
			$dataInsertion['sur_proposer_name'] = $this->proposername;
			$dataInsertion['sur_dob'] = $this->dateofbirth;
			$dataInsertion['sur_address_line_1'] = $this->addressline1;
			$dataInsertion['sur_address_line_2'] = $this->addressline2;
			$dataInsertion['sur_address_line_3'] = $this->addressline3;
			$dataInsertion['sur_city'] = $this->cityname;
			$dataInsertion['sur_state'] = $this->statename;
			$dataInsertion['sur_pincode'] = $this->pincodevalue;
			$dataInsertion['sur_email_id'] = $this->emailidname;
			$dataInsertion['sur_mobile_number'] = $this->mobileNumber;
			$dataInsertion['sur_pan_card_number'] = $this->pancardnumber;
			$dataInsertion['sur_nationality'] = $this->nationality;
			$dataInsertion['sur_ppsd'] = $this->ppsd;
			$dataInsertion['sur_bank_cust_id'] = $this->bankcustid;
			$dataInsertion['sur_member_details'] = json_encode($membershipData);
			$dataInsertion['sur_nominee_name'] = $this->nomineename;
			$dataInsertion['sur_nominee_age'] = $this->nomineeage;
			$dataInsertion['sur_nominee_relation'] = $this->nomineerelation;
			$dataInsertion['sur_appointee_relation'] = $this->appointerelation;
			$dataInsertion['sur_hdfc_bank_emp_id'] = $this->hdfcbankempid;
			$dataInsertion['sur_hdfc_bank_emp_mobile'] = $this->hdfcbankempmobile;
			$dataInsertion['sur_ip_address'] = $this->input->ip_address();
			$dataInsertion['sur_created_on'] = date('Y-m-d H:i:s');

			$numRows = $this->db->where('sur_unique_id',$this->uniqueId)->get('tbl_dukandhar_surksha');
			
			if($numRows->num_rows() == 0){
				$this->db->set($dataInsertion)->insert('tbl_dukandhar_surksha');
				if($this->db->affected_rows() > 0){
					$dataError['status'] = true;
					$dataError['errorMessage'] = "SUCCESS";
				} else {
					$dataError['status'] = false;
					$dataError['errorMessage'] = "Something went wrong! Please try again";
				}
			} else {
				$errorCountUpdate=0;
				$this->billdesktransrefno = trim($inputData['billdesktransrefno']);
				if(array_key_exists('billdesktransrefno',$inputData) == false){
					$errorMessage['error_bill_desc_trsref'] = " `billdesktransrefno` Key not exist Please Enter";
					$errorCountUpdate++;
				} else if(empty($this->billdesktransrefno)){
					$errorMessage['error_bill_desc_trsref'] = "Please Enter Billdesk Transaction Ref No";
					$errorCountUpdate++;
				}
				$this->billedeskpaymentdate = trim($inputData['billedeskpaymentdate']);
				if(array_key_exists('billedeskpaymentdate',$inputData) == false){
					$errorMessage['error_bill_desc_trs_date'] = " `billedeskpaymentdate` Key not exist Please Enter";
					$errorCountUpdate++;
				} else if(empty($this->billedeskpaymentdate)){
					$errorMessage['error_bill_desc_trs_date'] = "Please Enter Billdesk Payment Date";
					$errorCountUpdate++;
				} else if(!empty($this->billedeskpaymentdate) && preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$this->billedeskpaymentdate) == false){
					$errorMessage['error_bill_desc_trs_date'] = "Please Enter Billdesk Payment Date format is YYYY-mm-dd";
					$errorCountUpdate++;
				}
				if($errorCountUpdate > 0){

					$dataError['status'] = false;
					$dataError['message'] = $errorMessage;
					$dataError['errorMessage'] = "ERROR";

				} else {

					$UdataInsertion['sur_bill_desc_transfor_number'] = $this->billdesktransrefno;
					$UdataInsertion['sur_bill_desk_payment_date'] = $this->billedeskpaymentdate;

					$this->db->set($UdataInsertion)->where('sur_unique_id',$this->uniqueId)->update('tbl_dukandhar_surksha');
					if($this->db->affected_rows() > 0){
						$dataError['status'] = true;
						$dataError['errorMessage'] = "SUCCESS";
					} else {
						$dataError['status'] = false;
						$dataError['errorMessage'] = "Record already updated successfully!";
					}
					
				}
			}
		}

		echo json_encode($dataError);

	}
	
}