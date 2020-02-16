<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
		


	public function __construct()
	{
	    parent::__construct();
	   
	}

	public function insertBultUser(){


		//FILE_PATH = 'D:/xampp/htdocs/salescatalyst';
	    include FILE_PATH."/application/third_party/PHPExcel.php";
  		include FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";


		$file = FILE_PATH.'/assets/temporary/emp_modified.xlsx';
		 
	
		//load the excel library
		$this->load->library('PHPExcel');
		 
		//read file from path
		$objPHPExcel = PHPExcel_IOFactory::load($file);
		 
		//get only the Cell Collection
		$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
		 
		//extract to a PHP readable array format
		foreach ($cell_collection as $cell) {
		    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
		    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
		    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
		 
		    //The header will/should be in row 1 only. of course, this can be modified to suit your need.
		    if ($row == 1) {
		        $header[$row][$column] = $data_value;
		    } else {
		        $arr_data[$row][$column] = $data_value;
		    }
		}
		 

		//send the data in an array format
		$data['header'] = $header;
		$data['values'] = $arr_data;

		for($i = 2; $i <= count($data['values']); $i++ ) {

			$p = $i-1;
			$emp_team = $data['values'][$i]['B'];
			$emp_name = $data['values'][$i]['C'];
			$emp_code = $data['values'][$i]['D'];
			$emp_email = $data['values'][$i]['E'];
			$emp_mobile = $data['values'][$i]['F'];
			$emp_desig = $data['values'][$i]['G'];
			$emp_loc_name = $data['values'][$i]['M'];
			$emp_loc_code = $data['values'][$i]['N'];
			$emp_city = $data['values'][$i]['O'];
			$emp_state = $data['values'][$i]['P'];
			$emp_region = $data['values'][$i]['Q'];

			if($emp_team != '') {
				$userAvailability = $this->checkUserAlreadyExist($emp_code);
				if($userAvailability !== 0) {
					echo $p.' Failed - Employee code <b>'.$emp_code.'</b> already asigned for employee <b>'.$userAvailability.'</b><br/>';
				} else {
					$userName = strtolower(preg_replace("/[^a-zA-Z]+/", "", $emp_name));
					$password = md5($userName);
					$userArray = array(
						'user_name' => $userName, 
						'password' => $password,
						'emp_name' => $emp_name,
						'emp_code' => $emp_code,
						'team_id' => $this->getTeamIdByTeamName($emp_team),
						'mobile_number' => $emp_mobile,
						'email_address' => $emp_email, 
						'des_id' => $this->getDesigIdByDesigName($emp_desig),
						'location_id' => $this->getLocationIdByLocationName($emp_loc_name,$emp_loc_code),
						'city' => $emp_city,
						'state' => $emp_state,
						'user_location' => $user_location,
						'region_id' => $this->getRegionIdByRegionName($emp_region),
						'last_logged_in' => '',
						'forgot_pass_link' =>'',
						'user_status' => 1,
						'created_on' => date("Y-m-d H:i:s"),
						
					); 
					$addUser = $this->addUser($userArray);
					echo $p.' Success -  Employee created <b>'.$emp_name.'</b> with employee Code <b>'.$emp_code.'</b><br/>';

				} // if($userAvailability != 0) { ends here... 
			
			}//if($emp_team ! == '') { ends here.... 		
		}	
	}





	public function addUser($userData){
		$this->db->insert('tbl_users',$userData);
		return $this->db->insert_id();
	}


	public function checkUserAlreadyExist($emp_code){
		
        $this->db->select("emp_id");  
        $this->db->from('tbl_users'); 
        $this->db->where('emp_code', $emp_code);
        $query = $this->db->get();  
        $rowCount = $query->num_rows(); 
        return $rowCount;
	}

// list start 


 
    var $table = "tbl_users";  
    var $select_column = array("emp_id","emp_code", "user_name", "emp_name", "email_address", "mobile_number", "user_status");  
    var $order_column = array(null,"emp_code", "user_name", "emp_name", "email_address", "mobile_number",null,null);  
    
    public function make_query()  
    {  
        $this->db->select($this->select_column);  
        $this->db->from($this->table); 

        //his->db->where("(FirstName='Tove' OR FirstName='Ola' OR Gender='M' OR Country='India')"
        $this->db->where('emp_id != 1');
        
        if(isset($_POST["search"]["value"]) &&  $_POST["search"]["value"] !== '')  
        {  
           $this->db->like("user_name", $_POST["search"]["value"]);  
            //$this->db->or_like("emp_name", $_POST["search"]["value"]);  
       	}  
        if(isset($_POST["order"]))  
        {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }else{  
            $this->db->order_by('emp_id', 'DESC');  
        } 

    }  


      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  

           //echo $this->db->last_query();
           return $query->result(); 
            
      }  
     function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
     function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
   


//list end

     public function updateEmployeeProfile($userId, $data){
        $this->db->where('emp_id', $userId);
        $this->db->update('tbl_users', $data);
        return true;
    }

     public function updateChannel($channel, $data){

        $this->db->where('name', $channel);
        $this->db->update('tbl_channel', $data);
        return true;
    }

	public function getTeamIdByTeamName($emp_team){
        $this->db->where('team_name', $emp_team);
        $query = $this->db->get('tbl_team');
        $result = $query->result_id;
        $row = $query->row();

        if(isset($row))
        {
           return $row->team_id;
        } else {
			if($emp_team != ''){ 
				$data = array(
			        'team_name'=>$emp_team,
			        'team_description'=>$emp_team,
			        'team_status'=>1,
			        'created_on'=>date("Y-m-d H:i:s"),
				);
			} else {
				return 0;
			}	
			$this->db->insert('tbl_team',$data);
 			return $this->db->insert_id();
    	}

	}



	public function getDesigIdByDesigName($emp_desig){
        $this->db->where('des_name', $emp_desig);
        $query = $this->db->get('tbl_designation');
        $result = $query->result_id;
        $row = $query->row();

        if(isset($row))
        {
           return $row->des_id;
        } else {
			if($emp_desig != '') {
				$data = array(
			        'des_name'=>$emp_desig,
			        'description'=>$emp_desig,
			        'status'=>1,
			        'created_on'=>date("Y-m-d H:i:s"),
				);
			} else {
				return 0;
			}
			$this->db->insert('tbl_designation',$data);
 			return $this->db->insert_id();
   		}
	}





	public function getRegionIdByRegionName($emp_region){
        $this->db->where('region_name', $emp_region);
        $query = $this->db->get('tbl_region');
        $result = $query->result_id;
        $row = $query->row();

        if(isset($row))
        {
           return $row->region_id;
        } else {
        	if($emp_region != '') {
			 	$data = array(
			        'region_name'=>$emp_region,
			        'region_status'=>1,
			        'created_on'=>date("Y-m-d H:i:s"),
				);
			} else {
				return 0;
			}
			$this->db->insert('tbl_region',$data);
 			return $this->db->insert_id();
   		}
	}





	public function getLocationIdByLocationName($emp_loc_name,$emp_loc_code){

        $this->db->where('loc_name', $emp_loc_name);
        $query = $this->db->get('lbl_location');
        $result = $query->result_id;
        $row = $query->row();

        if(isset($row))
        {
           return $row->loc_id;
        } else {
        	if($emp_loc_name != '') {
				$data = array(
					'loc_code' => $emp_loc_code,
			    	'loc_name' => $emp_loc_name,
			    	'loc_status'=>1,
			    	'created_on'=>date("Y-m-d H:i:s"),
				);
			 } else {
			 	return 0; 
			 }

			$this->db->insert('lbl_location',$data);
 			return $this->db->insert_id();
   		}

	}



	public function getProductMasterDetails(){

        $query = $this->db->get('tbl_product_master');
        $productMasterArray = array(); 
        foreach($query->result() as $reg){
            $productMasterArray[] = array(
                'prdt_m_id'=>$reg->prdt_m_id,
                'prdt_m_name'=>$reg->prdt_m_name,
                'prdt_m_shot_name'=>$reg->prdt_m_shot_name,
                'prdt_m_desc'=>$reg->prdt_m_desc,
            );
        }  
        return $productMasterArray;
	}

	public function getChannelDetails(){

        $query = $this->db->get('tbl_channel');
        $productMasterArray = array(); 
        foreach($query->result() as $reg){
            $productMasterArray[] = array(
                'name'=>$reg->name,
                'enableSupervisor'=>$reg->enableSupervisor
            );
        }  
        return $productMasterArray;
	}


	public function getUserPrivilageDetails($userId){

		$this->db->select('tpl.*,tupp.*');    
        $this->db->from('tbl_product_master as tpl');
        $this->db->join('tbl_user_prdt_privilage as tupp', 'tpl.prdt_m_id = tupp.prdt_m_id','left');
        $this->db->where('user_id', $userId);
        $query = $this->db->get();


        $prdtUserPriArray = array(); 
        foreach($query->result() as $reg){
            $prdtUserPriArray[] = array(
                'prdt_m_id'=>$reg->prdt_m_id,
                'prdt_m_name'=>$reg->prdt_m_name,
                'prdt_m_shot_name'=>$reg->prdt_m_shot_name,
                'prdt_m_desc'=>$reg->prdt_m_desc,
                'privilage'=>$reg->privilage,	
                'plan'=>$reg->plan,	

            );
        }  
        return $prdtUserPriArray;
	}


	public function deletePrivilatesByUserId($userId){
		$this->db->where('user_id', $userId);
   		$this->db->delete('tbl_user_prdt_privilage'); 

   		$this->addUserPrivilageDummy($userId);
	}

	public function addUserPrivilageDummy($userId){

		 $productsMaster = $this->getProductMasterDetails();
   		foreach($productsMaster as $prdt){
   			$privilageArray = array(
					'prdt_m_id' => $prdt['prdt_m_id'], 
					'user_id' => $userId,
					'privilage	' => '0',
					'created_by' => '1',
					'status'=>'1'
			); 
			$this->addUserPrivilage($privilageArray);
   		}
	}

	public function addUserPrivilage($privilageData){
		$this->db->insert('tbl_user_prdt_privilage',$privilageData);
		return $this->db->insert_id();
	}

    public function updateUserPrivilage($priArray, $userId,$priId){

        $this->db->where('prdt_m_id', $priId);
        $this->db->where('user_id', $userId);
        $this->db->update('tbl_user_prdt_privilage', $priArray);
        return true;
    }	



}	