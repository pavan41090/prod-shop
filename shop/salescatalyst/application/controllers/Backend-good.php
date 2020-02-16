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
	    define('TABLE_LEAD','tbl_lead');
	    define('TABLE_USERS','tbl_users');
	    $this->load->model('Backend_model');
		require_once FILE_PATH."/application/third_party/PHPExcel.php";
		require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";
		$this->editUserId;
		$this->fileTarget = './assets/uploads/policy/';
		$this->objPHPExcel = new PHPExcel();
		$this->LimitRows = 100;
		$this->totalRows = 0;
		$this->ExcelCount = 0;
		$this->objReader     = PHPExcel_IOFactory::createReader("Excel2007");
		ini_set('max_input_vars','10000' );
		$sessionData = $this->session->userdata('logged_in');
		if(empty($sessionData)) {
			redirect(base_url());
		}

	}

	private function fileUploadFunction(){
		try{

			   $upload_path	= $this->fileTarget;
				$fileUploadPath = $_FILES['uploadLadDoc'];
				$filename = $fileUploadPath['name'];
				$upload_path = $upload_path.$filename;
				if(move_uploaded_file($fileUploadPath['tmp_name'], $upload_path)){
					$uploadedFilepath = $upload_path;
					$worksheetData = $this->objReader->listWorksheetInfo($uploadedFilepath);
					$this->totalRows = $worksheetData[0]['totalRows'];
					$totalColumns  = $worksheetData[0]['totalColumns'];
					$AobjPHPExcel = PHPExcel_IOFactory::load($this->fileTarget.$filename);
					foreach ($AobjPHPExcel->getWorksheetIterator() as $worksheet) {
						$ip=1;
						for($l=0;$l<$this->totalRows;$l++){
							$leadNumber = $worksheet->getCellByColumnAndRow(1, $ip)->getValue();
							if($leadNumber){
								$countRow[] = $leadNumber;
							}
								$ip++;
						}
					}
					$this->ExcelCount = count($countRow);
					$calcRows = ceil($this->ExcelCount/$this->LimitRows);
					$uploadStatus['cellrows'] = $calcRows;
					$uploadStatus['upload_path'] = $filename;
					$uploadStatus['status'] = true;

				} else {
					$uploadStatus['status'] = false;
				}

				echo json_encode($uploadStatus);
		} catch(Exception $error){

		}
	}

	private function imdgetCheckLeadUploader(){
		try{
			$this->fileUploadFunction();
			} catch(Exception $error){
				log_message('error',"Something went wrong!".__FUNCTION__);
		}
	}

	private function getCheckLeadUploader(){
		    try{
			$this->fileUploadFunction();
			} catch(Exception $error){
				log_message('error',"Something went wrong!".__FUNCTION__);
			}
	}

	private function imdgetReadExcelPrivatly(){

		try{
			$thisPost = $this->input->post();
			$startNumber = $thisPost['resCount'];
			$p = ($startNumber > 0 ? ($startNumber-1) : 0);
			$rd = $startNumber*100;
			$start_row = $rd; //define start row
			$end_row = $start_row - 100; //define end row
            $dataRes['start_row'] = $start_row;
            $dataRes['end_row'] = $end_row;
            $coount=0;

			$objPHPExcel = PHPExcel_IOFactory::load($this->fileTarget.$thisPost['uploadpath']);

			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
				$worksheetTitle     = $worksheet->getTitle();
			    $highestRow         = $worksheet->getHighestRow()+1;
			    $highestColumn      = $worksheet->getHighestColumn();
			    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
			    $nrColumns = ord($highestColumn) - 64;
			    for($pm=0;$pm<$highestRow;$pm++){
			    	$pmleadNumber = $worksheet->getCellByColumnAndRow(1, $pm)->getValue();
			    	if($pmleadNumber)
				    $unnamedCountArray[] = $pmleadNumber;
			    }
			    for($i=($end_row == 0 ? 2 : ($end_row)); $i < $start_row;$i++){

			    $this->db->trans_begin();

                if( $i < $highestRow){
                	
                	$userIdSheet = $worksheet->getCellByColumnAndRow(1, $i)->getValue();
                	$userPwdSheet = $worksheet->getCellByColumnAndRow(2, $i)->getValue();
                	$leadImdSheet = $worksheet->getCellByColumnAndRow(0, $i)->getValue();
                	//Policy Issued
                	if(!empty($leadImdSheet)){

	                	$AdataInsert['user_name'] = $userIdSheet; 
	                	$AdataInsert['password'] = MD5($userPwdSheet);

	                	$this->db->set($AdataInsert)->where('user_imd_code',$leadImdSheet)->update(TABLE_USERS);
	                	$resposeDatax[] = array( 'i' => $i );

                	}

                }

        		if ($this->db->trans_status() === FALSE){

                        $this->db->trans_rollback();
                        $dataRes['status'] = false;

                } else {
                        $this->db->trans_commit();
                        $dataRes['status'] = true;

                }

            }

            if(empty($resposeDatax)){
            	$resposeData['nextStatus'] = false;
            } else {
            	$resposeData['nextStatus'] = true;
            }

            $countunanmed = count($unnamedCountArray);
            $calcRows = ceil($countunanmed/$this->LimitRows);
            $resposeData['totalCount'] = $calcRows+1;
			    
			}
			
			$resposeData['nextNumber'] = $startNumber+1;
			echo json_encode($resposeData);

		} catch(Exception $error){
			log_message('error','Something went wrong in function.'.__FUNCTION__.'. error '.json_encode($error));
		}
	}

	private function getReadExcelPrivatly(){

		try{
			$thisPost = $this->input->post();
			$startNumber = $thisPost['resCount'];
			$p = ($startNumber > 0 ? ($startNumber-1) : 0);
			$rd = $startNumber*100;
			$start_row = $rd; //define start row
			$end_row = $start_row - 100; //define end row
            $dataRes['start_row'] = $start_row;
            $dataRes['end_row'] = $end_row;
            $coount=0;

			$objPHPExcel = PHPExcel_IOFactory::load($this->fileTarget.$thisPost['uploadpath']);

			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
				$worksheetTitle     = $worksheet->getTitle();
			    $highestRow         = $worksheet->getHighestRow()+1;
			    $highestColumn      = $worksheet->getHighestColumn();
			    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
			    $nrColumns = ord($highestColumn) - 64;
			    for($pm=0;$pm<$highestRow;$pm++){
			    	$pmleadNumber = $worksheet->getCellByColumnAndRow(1, $pm)->getValue();
			    	if($pmleadNumber)
				    $unnamedCountArray[] = $pmleadNumber;
			    }
			    for($i=($end_row == 0 ? 2 : ($end_row)); $i < $start_row;$i++){

			    $this->db->trans_begin();

                if( $i < $highestRow){
                	
                	$leadNumber = $worksheet->getCellByColumnAndRow(1, $i)->getValue();
                	$leadStatus = $worksheet->getCellByColumnAndRow(2, $i)->getValue();
                	$leadSubStatus = $worksheet->getCellByColumnAndRow(3, $i)->getValue();
                	$leadTransId = $worksheet->getCellByColumnAndRow(4, $i)->getValue();
                	$leadrejectcode = $worksheet->getCellByColumnAndRow(5, $i)->getValue();
                	$leadrejectcmt = $worksheet->getCellByColumnAndRow(6, $i)->getValue();
                	//Policy Issued
                	if(!empty($leadNumber)){

	                	$AdataInsert['lead_status'] = $leadStatus; 
	                	$AdataInsert['lead_sub_status'] = $leadSubStatus; 
	                	$AdataInsert['reject_code'] = $leadrejectcode; 
	                	$AdataInsert['reject_comments'] = $leadrejectcmt; 
	                	$AdataInsert['lead_transaction_id'] = $leadTransId; 
	                	$this->db->set($AdataInsert)->where('lead_application_id',$leadNumber)->update(TABLE_LEAD);
	                	$resposeDatax[] = array( 'i' => $i );

                	}

                }

        		if ($this->db->trans_status() === FALSE){

                        $this->db->trans_rollback();
                        $dataRes['status'] = false;

                } else {
                        $this->db->trans_commit();
                        $dataRes['status'] = true;

                }

            }

            if(empty($resposeDatax)){
            	$resposeData['nextStatus'] = false;
            } else {
            	$resposeData['nextStatus'] = true;
            }

            $countunanmed = count($unnamedCountArray);
            $calcRows = ceil($countunanmed/$this->LimitRows);
            $resposeData['totalCount'] = $calcRows+1;
			    
			}
			
			$resposeData['nextNumber'] = $startNumber+1;
			echo json_encode($resposeData);

		} catch(Exception $error){
			log_message('error','Something went wrong in function.'.__FUNCTION__.'. error '.json_encode($error));
		}
	}

	public function getReadUploaderFile(){
		try{
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$this->getReadExcelPrivatly();
				return;
			}
		} catch(Exception $error){
			log_message('error',"Something went wrong!".__FUNCTION__);
		}
	}

	public function imdgetReadUploaderFile(){
		try{
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$this->imdgetReadExcelPrivatly();
				return;
			}
		} catch(Exception $error){
			log_message('error',"Something went wrong!".__FUNCTION__);
		}
	}

	public function exceluploader(){
		try{

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$this->getCheckLeadUploader();
				return;
			}
			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
			$this->load->view('backend/upload-excel-sheet');
			$this->load->view('backend_layout/layout_footer_inner');
		} catch(Exception $error){
			log_message('error',"Something went wrong!".__FUNCTION__);
		}
	}

	public function imdexceluploader(){
		try{

			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$this->imdgetCheckLeadUploader();
				return;
			}
			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
			$this->load->view('backend/upload-excel-sheet-imd');
			$this->load->view('backend_layout/layout_footer_inner');
		} catch(Exception $error){
			log_message('error',"Something went wrong!".__FUNCTION__);
		}
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
		  	$response = $response && $this->Backend_model->updateChannel($val->name,$data);
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
				$user_imd_code = $this->security->xss_clean($postData['user_imd_code']);
				$user_bank_verification_id = $this->security->xss_clean($postData['user_bank_verifier_id']);
				$user_staff_code = $this->security->xss_clean($postData['user_staff_code']);
				$user_staff = $this->security->xss_clean($postData['user_branch']);
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
				'user_imd_code' =>$user_imd_code,
				'user_bank_verification_id' =>$user_bank_verification_id,
				'user_staff_code' =>$user_staff_code,
				'user_staff' =>$user_staff,
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
			$user_imd_code = $this->security->xss_clean($inputPostData['user_imd_code']);
			$user_bank_verification_id = $this->security->xss_clean($inputPostData['user_bank_verifier_id']);
			$user_staff_code = $this->security->xss_clean($inputPostData['user_staff_code']);
			$user_staff = $this->security->xss_clean($inputPostData['user_branch']);
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
					'user_imd_code' =>$user_imd_code,
					'user_bank_verification_id' =>$user_bank_verification_id,
					'user_staff_code' =>$user_staff_code,
					'user_staff' =>$user_staff,
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
			$this->data['arrayBundlePa'] = array(
					'2500000' => '25 Lakh',
					'5000000' => '50 Lakh',
					'7500000' => '75 Lakh',
					'10000000' => '1 Cr',
					'20000000' => '2 Cr',
					'30000000' => '3 Cr'
				);
			$this->data['tenureList'] = array('1','2','3');

			if(isset($_POST['submit'])){

				if(!empty($_POST['bundlePA'])){
					
					$checkDelete = $this->db->where(array('pa_user'=>$employeeId))->get('tbl_bundle_pa_selection');
					if($checkDelete->num_rows() > 0){
						$this->db->where(array('pa_user'=>$employeeId))->delete('tbl_bundle_pa_selection');
					}

					$this->db->insert('tbl_bundle_pa_selection', array(
						'pa_user' => $employeeId,
						'pa_sum_insured_tenure' => json_encode($_POST['bundlePA'])  )

						);
				}

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
						if(isset($_POST[$per."20000000"])){
							array_push($plan, "20000000");
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

			$this->data['numRowsData'] = $this->db->select('pa_sum_insured_tenure')->where(array('pa_user'=>$employeeId))->get('tbl_bundle_pa_selection');
			$this->data['checkDelete'] = $this->data['numRowsData']->row_object();
	   
			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
		    $this->load->view('backend/edit_employee_privilage',$this->data);
			$this->load->view('backend_layout/layout_footer_inner');

		} else {
			redirect('user', 'refresh');
		}		


	}

	public function getBundleData(){

		$inputValue = $_POST;
		$employeeId = $inputValue['hiddenLeadid'];
		$inputSqlQuery = $this->db->select('pa_sum_insured_tenure')->where(array('pa_user'=>$employeeId))->get('tbl_bundle_pa_selection');
		$thischeckDelete = $inputSqlQuery->row_object();
		$pa_sum_insured_tenure = json_decode($thischeckDelete->pa_sum_insured_tenure);
		foreach ($pa_sum_insured_tenure as $key => $value) {
			# code...
			$ssxe = explode('-', $value);
			echo $ssxe[0];
		}

	}



}
