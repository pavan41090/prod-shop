<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Backend extends CI_Controller {
	
	protected $editUserId;
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');	    
	    $this->load->model('User_model');
	    $this->load->model('Backend_model');
		
		$this->editUserId;

	}


    public function addEmployee(){

		if($this->session->userdata('logged_in') == TRUE) {
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['city'] = $this->Common_model->getCityList();
			//$this->data['usersupervisor'] = $this->User_model->getSupervisor();
			$this->data['userTypeArray'] = $this->User_model->getUsertypeArray();
	   		$this->data['channelArray'] = $this->User_model->getChannelArray();
	   		//$this->data['UserlocationArray'] = $this->User_model->getUserLocation();
	   		//$this->data['planArray'] = $this->User_model->getPlanArry();
			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
			$this->load->view('backend/add_employee',$this->data);
			$this->load->view('backend_layout/layout_footer_inner');
		} else {
			redirect('user', 'refresh');
		}		

	}	

	public function bulkUserUpload(){
		$this->Backend_model->insertBultUser();
	}

	public function listEmployees(){ 

		if($this->session->userdata('logged_in') == TRUE) {

			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
			$this->load->view('backend/list_employee');
			$this->load->view('backend_layout/layout_footer_inner');
		} else {
			redirect('user', 'refresh');
		}		

	}

	public function listChannels(){ 

		if($this->session->userdata('logged_in') == TRUE) {

			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
			$this->load->view('backend/edit_channel');
			$this->load->view('backend_layout/layout_footer_inner');
		} else {
			redirect('user', 'refresh');
		}		

	}

	public function listEmployeesByJson(){

           $this->load->model("Backend_model");  
           $fetch_data = $this->Backend_model->make_datatables();  
           $data = array();  
           $i= 1;
           foreach($fetch_data as $row)  
           {  
           		if($row->user_status == 1) {
           			$status = 'Active';
           		} else {
           			$status = 'In Active';
           		}
           		                
                $sub_array = array();  
                //$sub_array[] = $row->emp_id;  
                $sub_array[] = $i;
                $sub_array[] = $row->emp_code;  
                $sub_array[] = $row->user_name;
                $sub_array[] = $row->emp_name;
                $sub_array[] = $row->email_address;
                $sub_array[] = $row->mobile_number;
                $sub_array[] = $status;
                $sub_array[] = '<a href="edit-user/'.$row->emp_id.'"> <button type="button"  name="update" class="btn btn-warning btn-xs">Edit User</button></a>  
                				<a href="set-user-privilage/'.$row->emp_id.'"> <button type="button"  name="update" class="btn btn-primary btn-xs">Set Privilages</button></a>
                				';  
                $data[] = $sub_array;  
                $i++;
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->Backend_model->get_all_data(),  
                "recordsFiltered"     =>     $this->Backend_model->get_filtered_data(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      
   // <button type="button" name="delete" id="'.$row->emp_id.'" class="btn btn-danger btn-xs">Privilages</button>

	}

	public function getAllProducts(){
		echo json_encode($this->Backend_model->getProductMasterDetails());
	}

	public function getAllChannels(){
		echo json_encode($this->Backend_model->getChannelDetails());
	}

	public function updateChannels(){
		 $updateJson=json_decode(file_get_contents("php://input"));
		 $response=true;
		 foreach ($updateJson as $val) {
		  	$data = array(
			 'enableSupervisor' => $val->enableSupervisor
		  	);
		  	$response=$response && $this->Backend_model->updateChannel($val->name,$data);
		 }
		 if($response == TRUE) {
				echo 'success';
				exit();
			} else {
				echo 'failed';
			}
		 
	}


	public function addEmployeeByAngular(){
		
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_name', 'User Name', 'required|is_unique[tbl_users.user_name]',array(
                'required'      => 'Please Enter Employee User Name.',
                'is_unique'     => 'Entered %s already exists.'
        ));
		
		$this->form_validation->set_rules('emp_code', 'Employee Code', 'required|is_unique[tbl_users.emp_code]',array(
                'required'      => 'Please Enter Employee Code.',
                'is_unique'     => 'Entered %s already exists.'
        ));
		
		  if($this->form_validation->run() == FALSE){
					   $ststusReturn['status'] = false;
					   $ststusReturn['errorStatus'] = true;
                       $ststusReturn['message'] = $this->form_validation->error_array();
	     } else {
			 
			 $postData = $this->input->post();
			 $emp_code = $this->security->xss_clean($postData['emp_code']);
			 $userAvailability = $this->Backend_model->checkUserAlreadyExist($emp_code);
			 
			 if($userAvailability > 0) {
					$ststusReturn['status'] = false;
					$ststusReturn['errorStatus'] = true;
					$ststusReturn['message'] = 'Employee Code Already exists';
					
					} else {
					
				$user_name = $postData['user_name'];
				$usernamestr = preg_replace('/[^a-zA-Z0-9-_\.]/','', $user_name);
				$user_empname = $this->security->xss_clean($postData['user_empname']);
				$mobileuser = $this->security->xss_clean($postData['mobileuser']);
				$user_email = $this->security->xss_clean($postData['user_email']);
				$user_city = $this->security->xss_clean($postData['user_city']);
				$user_state = $this->security->xss_clean($postData['user_state']);
				$usr_type_id = $this->security->xss_clean($postData['usr_type_id']);
				$user_channel = $this->security->xss_clean($postData['user_channel']);
				$user_location = $this->security->xss_clean($postData['user_location']);
				$supervisor_id = $this->security->xss_clean($postData['supervisor_id']);
				$supervisor_id2 = $this->security->xss_clean($postData['supervisor_id2']);
				$supervisor_id3 = $this->security->xss_clean($postData['supervisor_id3']);
			    $userName = strtolower($usernamestr);
				$password = MD5($postData['user_pwd']); 
			
				$userArray = array(
				'user_name' => $this->security->xss_clean($userName), 
				'password' => $password,
				'emp_name' => $user_empname,
				'emp_code' => $emp_code,
				'team_id' => '',
				'mobile_number' => $mobileuser,
				'email_address' => $user_email, 
				'des_id' => '',
				'location_id' => '',
				'city' => $user_city,
				'state' => $user_state,
				'region_id' => '',
				'last_logged_in' => '',
				'forgot_pass_link' =>'',
				'user_status' => 1,
				'user_type_id' => $usr_type_id,
				'created_on' => date("Y-m-d H:i:s"),
				'Channel' =>$user_channel,
				'user_location' =>$user_location,
				'supervisor_id' => $supervisor_id.','.$supervisor_id2.','.$supervisor_id3
				);
		
			$addUser = $this->Backend_model->addUser($userArray);

			if($addUser > 0){
				$this->Backend_model->addUserPrivilageDummy($addUser);
				 $ststusReturn['status'] = true;
				 $ststusReturn['errorStatus'] = false;
                 $ststusReturn['message'] = 'New user inserted Succesfully';
			} else {
				$ststusReturn['status'] = false;
				$ststusReturn['errorStatus'] = true;
				$ststusReturn['message'] = 'Something went wrong!';
			}

		}
		 }
			
		} else {
			
			$ststusReturn['status'] = false;
			$ststusReturn['message'] = "404 Page Error!";
			
		}
		
		echo json_encode($ststusReturn);
	}

	public function getEmployeeDetailById(){

		$userId = $this->input->get_post('employeeId');
		$userDetails = $this->User_model->getUserDetailsById($userId);
		echo json_encode($userDetails);
	}

	public function getEmployeeByName(){

		$userId = $this->input->get_post('employeeId');
		$userDetails = $this->User_model->getUserDetailsById($userId);
		
		if($userDetails.user_name=='hdfc_av01')
		{
			echo TRUE;
		}
		else
		{
			echo False;
		}
		
	
	}

	public function editEmployees(){ 

		if($this->session->userdata('logged_in') == TRUE) {

			$employeeId = $this->uri->segment(2);
			
			$this->editUserId = $employeeId;
			
			$this->data['employeeId'] = $employeeId;
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['city'] = $this->Common_model->getCityList();
			
			$this->data['userTypeArray'] = $this->User_model->getUsertypeArray();
			$this->data['userStatusArray'] = Array(array('id'=>'1','value'=>'Active'),array('id'=>'0','value'=>'In Active'));


	   
			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
		    $this->load->view('backend/edit_employee',$this->data);
			$this->load->view('backend_layout/layout_footer_inner');

		} else {
			redirect('user', 'refresh');
		}		

	}

	public function updateEmployee(){
		
		$sessionCheck = $this->session->userdata('logged_in');
		
		if(empty($sessionCheck)) {
			redirect('user', 'refresh');
		}
		
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			
			$inputPostData = $this->input->post();
			
			$this->editUserId = $inputPostData['userId'];
			$usernameEdit = $inputPostData['user_name'];
			$emp_code = $inputPostData['emp_code'];
		
			$usernamestr = preg_replace('/[^a-zA-Z0-9-_\.]/','', $usernameEdit);
			
			$this->load->library('form_validation');
			
			$checkUserName = $this->checkSelectedFeilds('user_name');
			if($checkUserName > 0){
				
				$dataUpdateStatus['status'] = false;
				$dataUpdateStatus['errorStatus'] = true;
				$dataUpdateStatus['message'] = array('user_name'=> 'User Name Already Exsists Please try another!' );
				
			} else {
				
				$checkEmployeeCode = $this->checkSelectedFeilds('emp_code');
				
				if($checkEmployeeCode > 0){
					
					$dataUpdateStatus['status'] = false;
					$dataUpdateStatus['errorStatus'] = true;
					$dataUpdateStatus['message'] = array('emp_code'=> 'Employee Code Already Exsists Please try another!' );
				
				} else {					
				 
					 $data = array(
					'emp_code' => $this->security->xss_clean($emp_code),
					'user_name' => $this->security->xss_clean($usernamestr),
					'email_address' => $this->security->xss_clean($inputPostData['user_email']),
					'emp_name' => $this->security->xss_clean($inputPostData['user_empname']), 
					'mobile_number' => $this->security->xss_clean($inputPostData['mobile_user']),
					'user_type_id' => $this->security->xss_clean($inputPostData['usr_type_id']),
					'user_status' => $this->security->xss_clean($inputPostData['usr_status_id']),
					'city' => $this->security->xss_clean($inputPostData['user_city']),
					'state' => $this->security->xss_clean($inputPostData['user_state']),
					'Channel' => $this->security->xss_clean($inputPostData['channel']),
					'user_location' => $this->security->xss_clean($inputPostData['user_location']),
					'supervisor_id' => $this->security->xss_clean($inputPostData['supervisor_id']).','.$this->security->xss_clean($inputPostData['supervisor_id2']).','.$this->security->xss_clean($inputPostData['supervisor_id3'])
				);
				
				$response = $this->Backend_model->updateEmployeeProfile($this->editUserId, $data);
				
				$dataUpdateStatus['status'] = true;
				$dataUpdateStatus['errorStatus'] = false;
				$dataUpdateStatus['message'] = 'Profile updated succesfully...';
					 
				 
				}
				
			}
			
		} else {
			$dataUpdateStatus['status'] = false;
			$dataUpdateStatus['message'] = "404 Page Not Found!";
		}
		
		echo json_encode($dataUpdateStatus);
		
	}
	
	
	public function checkSelectedFeilds($field){
		
		$this->load->library('form_validation');
		$inputDataPOst = $this->input->post();
		$this->db->select('*');
		$this->db->where(array('emp_id != ' => $inputDataPOst['userId'], "$field" => $inputDataPOst[$field]));
		$getData = $this->db->get('tbl_users');
		
		return $getData->num_rows();
	}


	public function updatePasswordByAdmin() {

		$userId = $this->input->get_post('user_id');
		$newPassword = $this->input->get_post('confPass');

	

		$reset_password = $this->User_model->updatePassword($userId, $newPassword,'reset');
		echo 'success';
		
	}

	
	public function EmployeePrivilage(){

		if($this->session->userdata('logged_in') == TRUE) {

			$employeeId = $this->uri->segment(2);

			$this->data['employeeId'] = $employeeId;
			$this->data['productsArray'] = $this->Backend_model->getUserPrivilageDetails($employeeId);
			// echo '<pre>';
			// print_r($this->data['productsArray']);
			// exit();

			if(isset($_POST['submit'])){
				$this->Backend_model->deletePrivilatesByUserId($employeeId);	
				
				if(isset($_POST['prdt_per'])){
					foreach($_POST['prdt_per'] as $per){
						
						$plan=array();
						if(isset($_POST[$per."500000"])){
							array_push($plan, "500000");
						}
						if(isset($_POST[$per."1000000"])){
							array_push($plan, "1000000");
						}
						if(isset($_POST[$per."1500000"])){
							array_push($plan, "1500000");
						}
						if(isset($_POST[$per."2000000"])){
							array_push($plan, "2000000");
						}
						if(isset($_POST[$per."2500000"])){
							array_push($plan, "2500000");
						}
						if(isset($_POST[$per."3000000"])){
							array_push($plan, "3000000");
						}
						if(isset($_POST[$per."4000000"])){
							array_push($plan, "4000000");
						}
						if(isset($_POST[$per."5000000"])){
							array_push($plan, "5000000");
						}
						if(isset($_POST[$per."7500000"])){
							array_push($plan, "7500000");
						}
						if(isset($_POST[$per."10000000"])){
							array_push($plan, "10000000");
						}
						if(isset($_POST[$per."15000000"])){
							array_push($plan, "15000000");
						}
						if(isset($_POST[$per."25000000"])){
							array_push($plan, "25000000");
						}
						if(isset($_POST[$per."30000000"])){
							array_push($plan, "30000000");
						}
						$planStr=implode(",",$plan);
						$priUpdateArray = array(
							'privilage	' => '1',
							'plan' => $planStr
						); 
						$this->Backend_model->updateUserPrivilage($priUpdateArray,$employeeId,$per);
					}
				} 
				$this->session->set_flashdata('successMessage', 'User privilege updated Successfully');
				redirect('set-user-privilage/'.$employeeId, 'refresh');
			}
	   
			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
		    $this->load->view('backend/edit_employee_privilage',$this->data);
			$this->load->view('backend_layout/layout_footer_inner');

		} else {
			redirect('user', 'refresh');
		}		


	}



}
