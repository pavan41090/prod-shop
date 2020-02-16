<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shopmodel extends CI_Model {

	private $makeUrlink;
	private $sendMessage;
	private $mobileNumber;
	private $emailIDlink;
	public function __construct(){
		parent::__construct();
		error_reporting(0);
		$this->makeUrlink;
		$this->sendMessage;
		$this->mobileNumber;
		$this->emailIDlink;
		define('MAIL_HOST_NAME','smtp-relay.gmail.com');
		define('MAIL_HOST_PORT',25);
		define('shortLink',base_url() );
	}

	public function __getCreatCall(){

		try{

			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://alerts.solutionsinfini.com/api/v4/?api_key=Aa543cc5eb4515636710a30ba2a36b8f3&method=sms&message=".urlencode($this->sendMessage)."&to=".$this->mobileNumber."&sender=BAXAGI",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_POSTFIELDS => "",
			  CURLOPT_HTTPHEADER => array(
			    "Postman-Token: dbd9d79d-be76-402a-9e84-152fb870a28c",
			    "cache-control: no-cache"
			  ),
			));
			curl_setopt($curl, CURLOPT_PROXY, "10.92.89.12");
    		curl_setopt($curl, CURLOPT_PROXYPORT, "8080");

			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			$messageRes = json_decode($response);;
			return $messageRes;
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}

	}

	public function getSendingOtp($otpMessage){

		try{

			$thirdUrl = $this->uri->segment(2);
			$selectedValeus = $this->db->select('shop_mobile_number,shop_email_id')->where('shop_cus_id',$this->session->userdata('sessionCustomerVal'))->get( TABLE_SHOP_LEAD_NUMBER )->row_object();
			$this->mobileNumber = $selectedValeus->shop_mobile_number;
			$textMessage = 'Hi Customer , please enter this otp '.$otpMessage.' to complete the process.';
		    $this->sendMessage = $textMessage;
			$checMessageStatus = $this->sendApiMessage();
			if($checMessageStatus->status == 'OK'){
			/***/

            $from_email = "crm@bhartiaxa.com";
           //Load email library 
            $this->load->library('email'); 
   			$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = MAIL_HOST_NAME;
			$config['smtp_port'] = 25;
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
	         $this->email->from($from_email, 'SHOP Application'); 
	         $this->email->to($selectedValeus->shop_email_id);
	         $this->email->subject('OTP Request For complete Lead Creation!'); 
	         $this->email->message($this->sendMessage); 
	         //Send mail 
	         if($this->email->send()) 
			/****/
			$statusMEssage['status'] = true;
			} else {
			 $statusMEssage['status'] = true;
			}
			return $statusMEssage;
		} catch(Exception $error){
			log_message('error', __FUNCTION__.'Error:'.json_encode($error));
		}
	}

	public function createLink($thislinkCus,$emailId,$mobileNumber){
		//http://s.bharti-axagi.co.in/
		$this->makeUrlink = shortLink.'s/'.$thislinkCus;
		$textMessage = 'Thank you for choosing Bharti AXA. Please click the link below to complete process '.$this->makeUrlink;
		$this->mobileNumber = $mobileNumber;
		$this->sendMessage = $textMessage;
		$this->emailIDlink = $emailId;
		$checMessageStatus = $this->sendApiMessage();
		if($checMessageStatus->status == 'OK'){
			$this->sendMail();
			$statusMEssage['status'] = true;
			} else {
				$statusMEssage['status'] = true;
			}
		return $statusMEssage;
	}

	private function sendApiMail() { 
	    
            $from_email = "crm@bhartiaxa.com";
           //Load email library 
            $this->load->library('email'); 
   			$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = MAIL_HOST_NAME;
			$config['smtp_port'] = 25;
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
	         $this->email->from($from_email, 'SHOP Application'); 
	         $this->email->to($this->emailIDlink);
	         $this->email->subject('Required Action for complete lead creation!'); 
	         $this->email->message($this->sendMessage); 
	         //Send mail 
	         if($this->email->send()) 
	            return true;
	         else 
	            return false;
	}

	public function senMailCmpleteOrderID($leadOrderNumber,$sessionCustomerVal) { 
	    
            $from_email = "crm@bhartiaxa.com";
           //Load email library 
            $selectedValeus = $this->db->select('shop_plan_name,shop_email_id')->where('shop_cus_id',$sessionCustomerVal)->get( TABLE_SHOP_LEAD_NUMBER )->row_object();
            $bodyMessage = '<!DOCTYPE html>
						<html lang="en">
						<body>
						  <div style="width: 100%">
						    <p ><h4 style="text-align: center">Thank You for choosing Bharti AXA</h4></p>
						    <div><p>
						      <h5>Hello,</h5>
						    </p>

						    <p>
						      We have successfully received your order. You will receive an email with your policy copy shortly.
						Following are the order details:</p>
						<p>
						Order id: '.$leadOrderNumber.'</p>
						<p>Plan :'.$selectedValeus->shop_plan_name.' Lakhs</p>

						<p>Bharti AXA General Insurance Company
						</p>
						</div>
						    
						  </div>
						  
						</body>
						</html>';
            $this->load->library('email'); 
   			$config = array();
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = MAIL_HOST_NAME;//'10.144.65.38';
			$config['smtp_port'] = 25;
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			$this->email->set_header('Content-Type', 'text/html');
	         $this->email->from($from_email, 'SHOP Application'); 
	         $this->email->to($selectedValeus->shop_email_id);
	         $this->email->subject('Thank You for choosing Bharti AXA!'); 
	         $this->email->message($bodyMessage); 
	         //Send mail 
	         if($this->email->send()) 
	            return true;
	         else 
	            return false;
	}

	public function sendApiMessage(){
		return $this->__getCreatCall();
	}

	public function sendMail(){
		$this->sendApiMail();
	}

	public function getRandomNumber(){
		try{
			$randomMessage = substr( str_shuffle(RANDOM_NUMBER) ,0 ,6 );
			return $randomMessage;
		} catch(Exception $error){
			log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
		}
	}

	public function getOtpNumber(){
		try{
			$randomMessage = substr( str_shuffle(RAN_DOM_NUMBER) ,0 ,6 );
			return $randomMessage;
		} catch(Exception $error){
			log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
		}
	}

	private function checkRandomNumberDB($randomNumber){

		try{

			$checkDatabase = $this->db->select('shop_cus_id')->where( 'shop_cus_id' ,$randomNumber )->get( TABLE_SHOP_LEAD_NUMBER );
			if($checkDatabase->num_rows()>0){
				$this->checkRandomNumberDB($randomNumber);
			} else {
				return $randomNumber;
			}

		} catch(Exception $error){
			log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
		}
	}

	public function generateRandomNumber(){

		try{

			$randomNumberp = $this->getRandomNumber();
			$finalCheckNumber = $this->checkRandomNumberDB($randomNumberp);
			return $finalCheckNumber;

		} catch(Exception $error){
			log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
		}
	}

	public function getOtpsend(){
		try{

			$otpCreateNumber = $this->getOtpNumber();
			$thisOtpReturn = $this->generateOtpMessage($otpCreateNumber);
			return $thisOtpReturn;

		} catch(Exception $error){
			log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
		}
	}

	public function generateOtpMessage($randomNumber){
		try{

			$checkDatabase = $this->db->select('shop_otp_customer')->where( 'shop_otp_customer' ,$randomNumber )->get( TABLE_SHOP_LEAD_NUMBER );
			if($checkDatabase->num_rows()>0){
				$this->generateOtpMessage($randomNumber);
			} else {
				return $randomNumber;
			}

		} catch(Exception $error){
			log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
		}
	}

	public function getCityPincode($cus_pincode){
		try{
			$this->db->where('cus_pincode', $cus_pincode);
	        $query = $this->db->get('tbl_pincode');
	        $result = $query->result_id;

	        $row = array();
	        $row = $query->row();
	        return $row;
		} catch(Exception $error){
			log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
		}    
    }

    public function getCitiesModelNames($stateNames){
    	try{

    		if($_SERVER['REQUEST_METHOD'] == "POST"){

    			$this->db->select('cus_cityName cname');
    			$this->db->where('cus_stateName',$stateNames);
    			$dataCity = $this->db->group_by('cus_cityName')->get(TABLE_PIN_CODE);
    			return $dataCity->result();

    		} else {

    			redirect(base_url());
    			exit();
    		}

    	} catch(Exception $error){
    		log_message('error','Something went wrong in function .'.__FUNCTION__.'error'.json_encode($error));
    	}
    }

     public function generateApplicationNumber(){

        $row = $this->db->query('SELECT MAX(shop_sno) AS `maxid` FROM '.TABLE_SHOP_LEAD_NUMBER)->row();
        if ($row) {
            $maxid = $row->maxid;   
        } else {
            $maxid = 1;
        }

        return 'BAGI'.date('Ymd').$maxid;
        exit(); 

    }

}

