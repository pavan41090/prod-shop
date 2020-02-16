<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $mssql;

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');	    
	    $this->load->model('User_model');
		//$this->mssql = $this->load->database ( 'my_mssql', TRUE );
	}


	public function index()
	{
		
		//if (isset($this->input->post('submit'))){
		if (isset($_POST['submit'])){
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$login_response = $this->User_model->userLogin($username, $password);
			if($login_response == true){

				//redirect('create-lead-car', 'refresh');	
				switch ($this->session->userdata('user_type_abbr')) {
					case 'admin':
						redirect('users-list','refresh');
						break;
					
					case 'hdfc_av':
						redirect('lms-lead-list', 'refresh');	
						break;

					case 'bagi_av':
						redirect('lms-lead-list', 'refresh');	
						break;

					case 'supervisor':
						redirect('lms-lead-list', 'refresh');	
						break;

					case 'bagi_ops':
					case 'hdfc_ops':
						redirect('lms-lead-download', 'refresh');	
						break;
						
					case 'report':
						redirect('lms-lead-download', 'refresh');
						break;
						
					case 'lead data':
						redirect('lms-lead-download', 'refresh');
						break;
						
					default:
						redirect('create-lead-car', 'refresh');	
						break;	
				}

			} else {	
				$message = 'Invalid user credentials';
				$this->session->set_flashdata('login_error_message',  $message);
				redirect('user', 'refresh');
			}



// hdfc_av -> create 
// bagi_av -> update lead / listing 
// supervisor-> listing with aproval 

// bagi_ops - hdfc_ops -> listing/download 





/*


$login_response = $this->User_model->userLogin($username, $password);
			if($login_response == true){

				redirect('create-lead-car', 'refresh');	
			} else {	
				$message = 'Invalid user credentials';
				$this->session->set_flashdata('login_error_message',  $message);
				redirect('user', 'refresh');
			}



$userArray = array(
	array('userName' => 'uatuser01', 'name'=>'User 01', 'password'=>'pwduser01', 'userId'=>'101', 'empName' =>'UAT User01','userCode'=>'us01','userdes'=>'1'), 
	array('userName' => 'uatuser02', 'name'=>'User 02', 'password'=>'pwduser02', 'userId'=>'102', 'empName' =>'UAT User02','userCode'=>'us02','userdes'=>'2'), 
	array('userName' => 'uatuser03', 'name'=>'User 03', 'password'=>'pwduser03', 'userId'=>'103', 'empName' =>'UAT User03','userCode'=>'us03','userdes'=>'2'), 
	array('userName' => 'uatuser04', 'name'=>'User 04', 'password'=>'pwduser04', 'userId'=>'104', 'empName' =>'UAT User04','userCode'=>'us04','userdes'=>'3'),
	array('userName' => 'uatuser05', 'name'=>'User 05', 'password'=>'pwduser05', 'userId'=>'105', 'empName' =>'UAT User05','userCode'=>'us05','userdes'=>'1'),  
					);
				foreach($userArray as $usr){
					if($usr['userName'] == $username ){
						if($usr['password'] == $password){
							$userdata = array(
								'emp_id' =>  $usr['userId'],
								'emp_name' => $usr['empName'],
								'username' => $usr['userName'],
								'emp_code' => $usr['userCode'],
								'des_id' => $usr['userdes'],
								'logged_in' => TRUE,
							);

							$this->session->set_userdata($userdata);
							redirect('create-lead-car', 'refresh');	
						} else {
							$message = 'Invalid password';
							$this->session->set_flashdata('login_error_message',  $message);
					 		redirect('user', 'refresh');	
						}
					} else {
						$message = 'User not available';
						$this->session->set_flashdata('login_error_message',  $message);
				 		redirect('user', 'refresh');	
					}
				}	
*/

				// 		 $usr['password'] == $password) {
				// 		echo 'login succesfull'; 
				// 	} else {
				// 		$message = 'Invalid user name and Password'
				// 		$this->session->set_flashdata('login_error_message',  $message);
				// 		redirect('user', 'refresh');	
				// 	}
				// }

			/*$password = "in" . md5(trim($password));
			$soapUrl = SOAP_URL."cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com"; // asmx URL of WSDL
				// xml post structure
			$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:def="http://schemas.cordys.com/default">
					<soapenv:Header/>
						<soapenv:Body>
						    <def:agentapp_login>
						        <def:uname>' . $username . '</def:uname>
						        <def:passwd>' . $password . '</def:passwd>
						        <def:source>MCC</def:source>
						    </def:agentapp_login>
						</soapenv:Body>
					</soapenv:Envelope>'; 

					$curl = $this->Common_model->curlXML($soapUrl, $xml_post_string);

					$output =$this->Common_model->xmlstr_to_array($curl);
					$code = $output['soapenv:Body']['agentapp_loginResponse']['agent_appdata']['IsUserLoggedInResponse']['tuple']['old']['IsUserLoggedIn']['IsUserLoggedIn'];
					$message = $output['soapenv:Body']['agentapp_loginResponse']['agent_appdata']['TPUserLoginResponse']['LoginStatus'];

					if(strtolower($message) != 'success'){

						$this->session->set_flashdata('login_error_message',  $message);
						redirect('user', 'refresh');	
					} else {
						$response = $output['soapenv:Body']['agentapp_loginResponse']['agent_appdata']['GetAgentsDetailforUserResponse']['GetAgentsDetailforUserResponse']['tuple']['old'];
						$userdata = array('logged_in' => TRUE);
						$this->session->set_userdata($userdata);
						redirect('quote', 'refresh');	
					}		

					*/			

		}		

		$this->load->view('user/login');
	}


	public function logout() {
       $this->session->sess_destroy();
       redirect('user', 'refresh');
	}


	

	public function forgotPassword(){

		$forgotEmail =  $this->input->get_post('forgotEmail');
		//echo $forgotEmail;
		$enString = $this->User_model->getUserDetailsByEmail($forgotEmail);	
		//echo $enString;
		if($enString !== '0'){
			$urlString = base_url().'update-password/'.$enString;
			

    	$config = Array(
	 	 	'protocol' => 'smtp',
	  		'smtp_host' => 'ssl://smtp.googlemail.com',
	  		'smtp_port' => 465,
	  		'smtp_user' => '', // change it to yours
	  		'smtp_pass' => '', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'iso-8859-1',
	  		'wordwrap' => TRUE
		);
		
		
        $message = 'lklklk';
        	$this->load->library('email', $config);
      		$this->email->set_newline("\r\n");
      		$this->email->from(''); // change it to yours
      		$this->email->to('');// change it to yours
      		$this->email->subject('Salescatalyst - Forgot Password');
      		$this->email->message('HI <br/><br/> Please find attached Quote');


      		if($this->email->send())
     		{
      			echo 'Email sent.';
     		} else {
    			 show_error($this->email->print_debugger());
    			 echo $this->email->print_debugger();
    		}

			echo 'success';

		} else {
			echo 'failed';
		}

	}




	public function updateUserPassword() {
		$secureString = $this->uri->segment(2);

		$userDetails = $this->User_model->getUserEmailByPassString($secureString);
		

		if($userDetails == 0 ){
			$this->data['linkStatus'] = 'expired';  // String note available
		} else {

			$formatedString = base64_decode($secureString);
			$splitString = explode('&', $formatedString);
			$this->data['linkStatus'] = 'active';

			$this->data['email_address'] = $userDetails['email_address'];
			$this->data['emp_id'] = $userDetails['emp_id'];
			$this->data['emp_code'] = $userDetails['emp_code'];

		}

		$this->load->view('user/forgot_password',$this->data);
	}


	public function updatePassword(){
	
		$newpassword = $this->input->post('newpassword');
		$forgotEmail = $this->session->userdata('forgot_email_address');
		if(isset($forgotEmail)){
			$login_response = $this->User_model->updatePassword($forgotEmail, $newpassword);
			if($login_response == 1){
				echo 'success';		
			} else {
				echo 'failed';	
			}
			
		} else {
			echo 'failed';						
		}

	}

	public function getMyprofile(){

		$userId = $this->session->userdata('emp_id');
		$userDetails = $this->User_model->getUserDetailsById($userId);
		echo json_encode($userDetails);
	}


	public function userprofile(){
		if($this->session->userdata('logged_in') == TRUE) {

			$userId = $this->uri->segment(2);

			$this->data['teamArray'] = $this->User_model->getUserTeamArray();
			$this->data['regionArray'] = $this->User_model->getUserRegionArray();  
			$this->data['designationArray'] = $this->User_model->getUserDesignationArray();
			//$this->data['locationArray'] = $this->User_model->getUserLocationArray();
			$this->data['stateArray'] = $this->Common_model->getStateList();

			//$this->data['userDetails'] = $this->User_model->getUserDetailsById($userId);
		
		   // print_r($this->data['stateArray']);
		   // exit();

			$this->data['module'] = 'account'; 
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('user/user-profile',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user', 'refresh');
		}
	}
	

	public function userProfileUpdate(){

 		//$this->data['user_id'] = $this->input->get_post('user_id');
 		$userId = $this->session->userdata('emp_id');
  	
		$data = array(
      	  	'emp_name' => $this->input->get_post('user_empname'), 
      	   	'mobile_number' => $this->input->get_post('mobile_user'),
      	  	'location_id' => $this->input->get_post('user_location'), 
        	'city' => $this->input->get_post('user_city'),
        	'state' => $this->input->get_post('user_state'),
        	'region_id' => $this->input->get_post('user_region'),
        	'team_id' => $this->input->get_post('user_team'),
        	'des_id' => $this->input->get_post('user_designation'),
    	);

		if($this->User_model->updateUserProfile($userId, $data)) {
			echo 'success';
		} else {
			echo 'failed';
		}
	}


	public function resetMyPassword(){

		if($this->session->userdata('logged_in') == TRUE) {

			$this->data['module'] = 'account'; 

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('user/reset_my_password');
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user', 'refresh');
		}

	}


	public function resetPasswordUpdate() {

		$currentPassword = $this->input->get_post('reset_currentpwd');
		$userId = $this->session->userdata('emp_id');
		$newPassword = $this->input->get_post('reset_newpwd');

		$checkCurrentPwd = $this->User_model->checkCurrentPassword($userId, $currentPassword);
		if($checkCurrentPwd == '0'){
			echo 'Not Exists';
		} else {
			$reset_password = $this->User_model->updatePassword($userId, $newPassword,'reset');
			echo 'success';
		}
	}

	//get supervisor details
	public function getAllSupervisor(){
        $query = $this->User_model->getAllSupervisor();
        
        echo json_encode($query);
	}	



}

?>
