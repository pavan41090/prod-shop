<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shopurlmodel extends CI_Model {

	public function __construct(){
		parent::__construct();
		error_reporting(0);
		define('MAIL_HOST_NAME','smtp-relay.gmail.com');
		define('MAIL_HOST_PORT', 25);
		define('shortLink',base_url() );
		define('EMAIL_PREGMATCH','/^[_a-zA-Z0-9-]+(\.[_a-zA_Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/');
		define('MOBILE_PREGMATCH','/^[6-9][0-9]{9}$/');
		define('NUMBERS_PREGMATCH', "/[^0-9]/");

	}

	public function urlPost(){
		$this->privateUrlpost();
	}

	private function getInsertPrivate(){

		$db = get_instance()->db->conn_id;
		$format = "d-m-Y";
		$arraygender = array('male','female','other');
		
		$stringJson = file_get_contents('php://input');
		$jsonDecode = json_decode($stringJson,true);
		$inputPost = $jsonDecode;
		$orderId = $this->security->xss_clean($inputPost['order_id']);
		$errorCount = 0;
			$checkOrderId = $this->db->where('lead_order_id',$orderId)->get(TABLE_SHOP_LEAD_NUMBER);

			if($checkOrderId->num_rows() > 0){

			$paymentTransactionId = $this->security->xss_clean($inputPost['payment_transaction_id']);

			if(empty($paymentTransactionId)){
				$messageError['error_paymentTransactionId'] = "Payment transaction ID can't be Null.";
				$errorCount++;
			}

			if($errorCount > 0){

				$errorData['errorMessage'] = $messageError;
				$errorData['status'] = false;

			} else {

				$dataInsert['payment_transaction_id'] = $paymentTransactionId;
				$dataInsert['shop_updated_on'] = date('Y-m-d H:i:s');
				$this->db->set($dataInsert)->where('lead_order_id',$orderId)->update( TABLE_SHOP_LEAD_NUMBER );
				if($this->db->affected_rows() > 0){
					$errorData['status'] = true;
				} else {
					$errorData['status'] = false;
					$errorData['status'] = "Something went wrong";
				}

			}

		} else {

			//echo "string";

		$productCode = $this->security->xss_clean($inputPost['product_code']);
		
		if(empty($productCode)){
			$messageError['error_productcode'] = "Product Code can't be Null.";
			$errorCount++;
		}
		$planVariant = $this->security->xss_clean($inputPost['plan_variant']);

		if($planVariant == 'Plan A'){
			$planValuee = 5;
		}
		if($planVariant == 'Plan B'){
			$planValuee = 10;
		}
		if($planVariant == 'Plan C'){
			$planValuee = 20;
		}
		if($planVariant == 'Plan D'){
			$planValuee = 35;
		}


		if(empty($planVariant)){
			$messageError['error_planvariant'] = "Plan Variant can't be Null.";
			$errorCount++;
		}
		$employeeid = $this->security->xss_clean($inputPost['employee_id']);
		if(empty($employeeid)){
			$messageError['error_employeeid'] = "Employee Id can't be Null.";
			$errorCount++;
		}

		$employeeMobile = $this->security->xss_clean($inputPost['employee_mobile']);
		if(empty($employeeMobile)){
			$messageError['error_employeemobile'] = "Employee Mobile Number can't be Null.";
			$errorCount++;
		} elseif(!empty($employeeMobile) && ( strlen($employeeMobile) > 10 || strlen($employeeMobile) < 10 )){
			$messageError['error_employeemobile'] = "Please check Employee Mobile Number.";
			$errorCount++;
		} elseif( (!empty($employeeMobile)) && (preg_match(MOBILE_PREGMATCH, $employeeMobile) == false)){
			$messageError['error_employeemobile'] = "Enter Valid Mobile Number";
			$errorCount++;
		}

		$premiumValue = $this->security->xss_clean($inputPost['premium_value']);
		if(empty($premiumValue)){
			$messageError['error_premiumvalue'] = "Premium Value can't be Null.";
			$errorCount++;
		} elseif( (!empty($premiumValue)) && (!is_numeric($premiumValue)) ){
			$messageError['error_premiumvalue'] = "Please Enter Premium Value in numeric";
			$errorCount++;
		}

		$uniqueCode = $this->security->xss_clean($inputPost['unique_code']);

		if(empty($uniqueCode)){
			$messageError['error_uniquecode'] = "Unique code can't be Null.";
			$errorCount++;
		}

		$premisesCovered = $this->security->xss_clean($inputPost['premises_covered']);
		if(strtolower($premisesCovered) == 'shop'){

			$premisesCoveredname = 1;

		} else {

			$premisesCoveredname = 2;

		}
		if(empty($premisesCovered)){
			$messageError['error_premisescovered'] = "Premises to be Covered can't be Null.";
			$errorCount++;
		}

		$insuredName = $this->security->xss_clean($inputPost['insured_name']);

		if(empty($insuredName)){
			$messageError['error_insuredname'] = "Insured Name can't be Null.";
			$errorCount++;
		}

		$ownersName = $this->security->xss_clean($inputPost['owners_name']);

		if(empty($ownersName)){
			$messageError['error_ownersname'] = "Owners Name can't be Null.";
			$errorCount++;
		}

		$gender = $this->security->xss_clean($inputPost['gender']);

if(strtolower($gender) == 'male'){
			$genderCounter = 1;
		} else {
			$genderCounter = 2;
		}
		
		if(empty($gender)){
			$messageError['error_gender'] = "Gender can't be Null.";
			$errorCount++;
		} elseif( (!empty($gender)) && (!in_array(strtolower($gender), $arraygender))){
			$messageError['error_employeemobile'] = "Please Check the gender entered";
			$errorCount++;
		}

		$ownersDOB = $this->security->xss_clean($inputPost['owners_dob']);

		if(empty($ownersDOB)){
			$messageError['error_ownersdob'] = "Owners DOB can't be Null.";
			$errorCount++;

		} elseif(date($format, strtotime($ownersDOB)) != date($ownersDOB)) {
			$messageError['error_ownersdob'] = "DOB format is dd-mm-yyyy";
			$errorCount++;
		}

		$communicationAddress = $this->security->xss_clean($inputPost['communication_address']);

		if(empty($communicationAddress)){
			$messageError['error_communicationAddress'] = "Communication Address can't be Null.";
			$errorCount++;
		}

		$communicationCity = $this->security->xss_clean($inputPost['communication_city']);

		if(empty($communicationCity)){
			$messageError['error_communicationCity'] = "Communication City can't be Null.";
			$errorCount++;
		}

		$communicationState = $this->security->xss_clean($inputPost['communication_state']);

		if(empty($communicationState)){
			$messageError['error_communicationState'] = "Communication State can't be Null.";
			$errorCount++;
		}

		$communicationPincode = $this->security->xss_clean($inputPost['communication_pincode']);

		if(empty($communicationPincode)){
			$messageError['error_communicationPincode'] = "Communication Pincode can't be Null.";
			$errorCount++;
		} elseif((!empty($communicationPincode)) && (!is_numeric($communicationPincode))){
			$messageError['error_communicationPincode'] = "Please enter Pincode numeric only";
			$errorCount++;
		} elseif((!empty($communicationPincode)) && (strlen($communicationPincode) > 6 || strlen($communicationPincode) < 6)){
			$messageError['error_communicationPincode'] = "Pincode is a 6 digit code";
			$errorCount++;
		}

		$riskAddress = $this->security->xss_clean($inputPost['risk_address']);

		if(empty($riskAddress)){
			$messageError['error_riskAddress'] = "Risk Address can't be Null.";
			$errorCount++;
		}

		$riskCity = $this->security->xss_clean($inputPost['risk_city']);

		if(empty($riskCity)){
			$messageError['error_riskCity'] = "Risk City can't be Null.";
			$errorCount++;
		}

		$riskState = $this->security->xss_clean($inputPost['risk_state']);

		if(empty($riskState)){
			$messageError['error_riskState'] = "Risk State can't be Null.";
			$errorCount++;
		}

		$riskPincode = $this->security->xss_clean($inputPost['risk_pincode']);

		if(empty($riskPincode)){
			$messageError['error_riskPincode'] = "Risk Pincode can't be Null.";
			$errorCount++;
		} elseif((!empty($riskPincode)) && (!is_numeric($riskPincode))){
			$messageError['error_riskPincode'] = "Please enter Pincode numeric only";
			$errorCount++;
		} elseif((!empty($riskPincode)) && (strlen($riskPincode) > 6 || strlen($riskPincode) < 6)){
			$messageError['error_riskPincode'] = "Pincode is a 6 digit code";
			$errorCount++;
		}

		$registredMobile = $this->security->xss_clean($inputPost['registred_mobile_number']);

		if(empty($registredMobile)){
			$messageError['error_registredMobileNumber'] = "Registered Mobile number can't be Null.";
			$errorCount++;
		} elseif(!empty($registredMobile) && ( strlen($registredMobile) > 10 || strlen($registredMobile) < 10 )){
			$messageError['error_registredMobileNumber'] = "Please check Registered Mobile number.";
			$errorCount++;
		} elseif( (!empty($registredMobile)) && (preg_match(MOBILE_PREGMATCH, $registredMobile) == false)){
			$messageError['error_registredMobileNumber'] = "Enter Valid Mobile Number";
			$errorCount++;
		}

		$registredEmail = $this->security->xss_clean($inputPost['registred_email_id']);

		if(empty($registredEmail)){
			$messageError['error_registredEmailId'] = "Registered Email ID can't be Null.";
			$errorCount++;
		} elseif( (!empty($registredEmail)) && (preg_match(EMAIL_PREGMATCH, $registredEmail) == false)){
			$messageError['error_registredEmailId'] = "Enter Valid Email ID";
			$errorCount++;
		}

		$nomineeName = $this->security->xss_clean($inputPost['nominee_name']);

		if(empty($nomineeName)){
			$messageError['error_nomineeName'] = "Nominee Name can't be Null.";
			$errorCount++;
		}

		$nomineeRelation = $this->security->xss_clean($inputPost['nominee_relation']);

		if(empty($nomineeRelation)){
			$messageError['error_nomineeRelation'] = "Nominee Relation can't be Null.";
			$errorCount++;
		} elseif( (!empty($nomineeRelation)) && !in_array($nomineeRelation, realationshiofunction())){
			$messageError['error_registredEmailId'] = "Nominee Relation not matched please check once";
			$errorCount++;
		}

		$nomineeDOB = $this->security->xss_clean($inputPost['nominee_dob']);

		if(empty($nomineeDOB)){
			$messageError['error_nomineeDob'] = "Nominee DOB can't be Null.";
			$errorCount++;
		} elseif(date($format, strtotime($nomineeDOB)) != date($nomineeDOB)) {
			$messageError['error_nomineeDob'] = "DOB format is dd-mm-yyyy";
			$errorCount++;
		}

		$hypothication = $this->security->xss_clean($inputPost['hypothication']);

		$hypothicationWith = $this->security->xss_clean($inputPost['hypothication_with']);
		
		if(strtolower($hypothication) == 'yes'){
			if(empty($hypothicationWith)){
			$messageError['error_hypothicationWith'] = "Hypotication with can't be Null.";
			$errorCount++;
			}
		}

		$autorenewal = $this->security->xss_clean($inputPost['auto_renewal']);
		$account_auto_renewal = $this->security->xss_clean($inputPost['account_auto_renewal']);

		if(strtolower($autorenewal) == 'yes'){
			if(empty($account_auto_renewal)){
			$messageError['error_accountAutoRenewal'] = "Account number for auto renewal can't be Null.";
			$errorCount++;
			}
		}

		if(empty($orderId)){
		$messageError['error_orderId'] = "Order Id can't be Null.";
		$errorCount++;
		}

			$communicationData = array(
					'communicationaddress' => $communicationAddress,
					'CommunicationCity' => $communicationCity,
					'CommunicationState' => $communicationState,
					'CommunicationPincode' => $communicationPincode
				);

			$risknData = array(
				'riskaddress' => $riskAddress,
				'riskPincode' => $riskCity,
				'riskState' => $riskState,
				'riskCity' => $riskPincode
			);

			$termsArray = array(
				'autorenewaldata' => $autorenewal,
				'accountnumberrenewaldata' => $account_auto_renewal
			);

			$dataInsert['shop_product_code'] = $productCode;
			$dataInsert['lead_order_id'] = $orderId;
			$dataInsert['shop_plan_name'] = $planValuee;//$planVariant;
			$dataInsert['shop_employee_id'] = $employeeid;
			$dataInsert['shop_employee_mobile'] = $employeeMobile;
			$dataInsert['shop_premium_value'] = $premisesCovered;
			$dataInsert['shop_unique_code'] = $uniqueCode;
			$dataInsert['shop_premises_covered'] = $premisesCoveredname;
			$dataInsert['shop_insured_name'] = $insuredName;
			$dataInsert['shop_owner_name'] = $ownersName;
			$dataInsert['shop_gender'] = $genderCounter;
			$dataInsert['shop_owner_dob'] = $ownersDOB;
			$dataInsert['shop_mobile_number'] = $registredMobile;
			$dataInsert['shop_email_id'] = $registredEmail;
			$dataInsert['shop_communication_address'] = json_encode($communicationData);
			$dataInsert['shop_resk_addresss'] = json_encode($risknData);
			$dataInsert['shop_nominee_name'] = $nomineeName;
			$dataInsert['shop_nominee_relation'] = array_search($nomineeRelation,realationshiofunction());
			$dataInsert['shop_nominee_dob'] = $nomineeDOB;
			$dataInsert['shop_terms_conditions'] = json_encode($termsArray);
			$dataInsert['shop_cus_id'] = $employeeid;
			$dataInsert['hypothication'] = $hypothication;
			$dataInsert['shop_hypothication_with'] = $hypothicationWith;
			$dataInsert['shop_created_on'] = date('Y-m-d H:i:s');

				if($errorCount > 0){

					$errorData['errorMessage'] = $messageError;
					$errorData['status'] = false;

				} else {

					$this->db->set($dataInsert)->insert( TABLE_SHOP_LEAD_NUMBER );
					//echo $this->db->last_query();
					if($this->db->affected_rows() > 0){
						$errorData['status'] = true;
					} else {
						$errorData['status'] = false;
						$errorData['status'] = "Something went wrong";
					}

				}

			}
		
		return $errorData;


	}

	private function privateUrlpost(){

		$authenticationKey = $_SERVER['HTTP_AUTHORIZATION_KEY'];
		$agentUser = $_SERVER['HTTP_USER_AGENT'];

		if($_SERVER['REQUEST_METHOD'] == "POST"){

			if($authenticationKey == "7c356d12e0ff324c12db509eab42e8cf"){

				if(!empty($agentUser) && $agentUser == "bharti-axa"){

					$responceData = $this->getInsertPrivate();
					if( !empty($responceData['status']) && $responceData['status'] == true){
						$dataReturn['status'] = true;
						$dataReturn['message'] = "SUCCESS";
					} else {
						$dataReturn = $responceData;
					}
		
				} else {

					$dataReturn['status'] = false;
					$dataReturn['message'] = "Entered User Agent Header not matched! Please try again";

				}
		
			} else {
				
				$dataReturn['status'] = false;
				$dataReturn['message'] = "Entered Authorization-key Header not matched! Please try again";

			}


		} else {

			$dataReturn['status'] = false;
			$dataReturn['message'] = "Something went wrong Please check!";
		}


		echo json_encode($dataReturn);

	}


}