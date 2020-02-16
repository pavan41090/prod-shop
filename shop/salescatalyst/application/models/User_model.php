<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	}


	public function userLogin($username, $password){

        $this->db->select('urs.emp_id, urs.emp_name, urs.user_name, urs.emp_code, des.des_name, des.des_id, tpe.usr_type_id, tpe.usr_type_name, tpe.usr_type_name_abbr,urs.Channel,urs.user_location');    
        $this->db->from('tbl_users as urs');
        $this->db->join('tbl_user_designation as des', 'des.des_id = urs.des_id','left');
        $this->db->join('tbl_user_type as tpe', 'tpe.usr_type_id = urs.user_type_id','left');
        $this->db->where('user_name', $username);
        $this->db->where('password', md5($password));
        $this->db->where('user_status', '1');
        $query = $this->db->get();
        $result = $query->result_id;
        $userData = array();
        $row = $query->row();
        if(isset($row))
        {    
            $data = array(
                    'emp_id'        => $row->emp_id,
                    'emp_name'      => $row->emp_name,
                    'username'      => $row->user_name,
                    'emp_code'      => $row->emp_code,
                    'des_name'      => $row->des_name,
                    'des_id'        => $row->des_id,
                    'usr_type_id'   => $row->usr_type_id,
                    'user_type'     => $row->usr_type_name,
                    'user_type_abbr' => $row->usr_type_name_abbr,
                    'Channel'       => $row->Channel,
                    'user_location' => $row->user_location,
                    //by amstel added
                    'product'       => @$row->product,    
                    'logged_in'     => TRUE,
                    );
            $this->session->set_userdata($data);
			
			$data['loginTime'] = date('Y-m-d G:i:s');
			$this->Useractivity->getInsertHistory(array(
					'emp_id' => $row->emp_id,
					'leadId' => 0,
					'type' => 9, //lead status changing,
					'leadData' => json_encode($data)
					));
		
            return true;
        } else {

         	return false;
        }
	}
//Forgot Password function....
    public function getUserDetailsByEmail($email){


        $this->db->where('email_address', $email);
        $query = $this->db->get('tbl_users');
        $result = $query->result_id;

        $userData = array();
        if($result->num_rows == 1)
        {
            $row = $query->row();
            $forgetPassString = base64_encode($row->emp_code.'&'.date('Ymd').time());
            $data = array('forgot_pass_link'=>$forgetPassString);
            $this->db->where('email_address', $email);
            $this->db->update('tbl_users', $data); 
            return $forgetPassString;
        } else {

            return '0';
        }
    }

    public function getUserEmailByPassString($string){

        $this->db->where('forgot_pass_link', $string);
        $query = $this->db->get('tbl_users');
        $result = $query->result_id;

        if($result->num_rows == 1)
        {
            $row = $query->row();
            $data = array(
                'forgot_emp_id' => $row->emp_id,
                'forgot_emp_name' => $row->emp_name,
                'forgot_user_name' => $row->user_name,
                'forgot_emp_code' => $row->emp_code,
                'forgot_des_id' => $row->des_id,
                'forgot_email_address' => $row->email_address,
            );
           $this->session->set_userdata($data);  
           return '1';
        } else {
            return '0';
        }
    }

   // ($userId, $newPassword,'reset'

    public function updatePassword($updateValue, $password, $type=Null) {


        $data = array('password'=> md5($password));
        if($type == 'reset'){
          
            $this->db->where('emp_id', $updateValue);
        } else {   
            $this->db->where('email_address', $updateValue);
        }    
        $this->db->update('tbl_users', $data); 
        return '2';

    }

 


    public function updateUserProfile($userId, $data){

        $this->db->where('emp_id', $userId);
        $this->db->update('tbl_users', $data);
        return true;
    }


    public function getUserTeamArray(){

        $query = $this->db->get('tbl_team');
        $teamArray = array(); 
        foreach($query->result() as $tms){
            $teamArray[] = array(
                'team_id'=>$tms->team_id,
                'team_name'=>$tms->team_name,
            );
        }  
        return $teamArray;
    }

    
    public function getUsertypeArray(){
        $query = $this->db->get('tbl_user_type');
        $teamArray = array(); 
        foreach($query->result() as $tms){
            if($tms->usr_type_id != 1){
                $teamArray[] = array(
                    'usr_type_id'=>$tms->usr_type_id,
                    'usr_type_name_abbr'=>$tms->usr_type_name_abbr,
                    'usr_type_name' => $tms->usr_type_name 
                );
            }
        }  
        return $teamArray;
    }



 //    Channel list 

 // public function getChannelArray(){
 //       $query = $this->db->get('tbl_user_type');
 //       $teamArray = array(); 
 //       foreach($query->result() as $tms){
 //           if($tms->usr_type_id != 1){
 //               $teamArray[] = array(
                  
 //               );
 //           }
 //       }  
 //       return $teamArray;
 //   }


PUBLIC FUNCTION GETCHANNELARRAY(){

    $CHANNELARRAY = ARRAY( 
        
        //CHANGING THE CATEGORY VALUE 

        ARRAY('ID'=> 'PB','NAME'=>'PHONE BANKING'),
        ARRAY('ID'=> 'DT','NAME'=>'DT'),
        ARRAY('ID'=> 'VRM','NAME'=>'VRM'),
        ARRAY('ID'=> 'COP','NAME'=>'COP'),
        ARRAY('ID'=> 'PRIME','NAME'=>'PRIME'),
        ARRAY('ID'=> 'UO','NAME'=>'UNIFIED OUTBOUND'),
        ARRAY('ID'=> 'OTHER','NAME'=>'OTHERS'),
    ); 

    RETURN $CHANNELARRAY;


}

//User supervisor
     public function getAllSupervisor(){
		
		$poastValues = $this->input->post();
        $this->db->select('emp_id,user_name,emp_name,supervisor_id');
        $this->db->where('user_type_id', '4');
		$this->db->where('user_name !=',"");
		$this->db->where('Channel',$poastValues['channelname']);
        $query = $this->db->get('tbl_users');
        return $query->result();
    }

    


    public function getUserRegionArray(){

        $query = $this->db->get('tbl_region');
        $regionArray = array(); 
        foreach($query->result() as $reg){
            $regionArray[] = array(
                'region_id'=>$reg->region_id,
                'region_name'=>$reg->region_name,
            );
        }  
        return $regionArray;
    }


    public function getUserDesignationArray(){

        $query = $this->db->get('tbl_designation');
        $designationArray = array(); 
        foreach($query->result() as $des){
            $designationArray[] = array(
                'des_id'=>$des->des_id,
                'des_name'=>$des->des_name,
            );
        }  
        return $designationArray;
    }




    public function getUserLocationArray(){

        $query = $this->db->get('lbl_location');
        $locationArray = array(); 
        foreach($query->result() as $tms){
            $locationArray[] = array(
                'loc_id'=>$tms->loc_id,
                'loc_name'=>$tms->loc_name,
            );
        }  
        return $locationArray;
    }


    public function getUserDetailsById($userId){

        $this->db->select('urs.*,tut.usr_type_name');    
        $this->db->from('tbl_users as urs');
        $this->db->join('tbl_user_type as tut', 'tut.usr_type_id = urs.user_type_id');
        $this->db->where('urs.emp_id', $userId);
        $query = $this->db->get();

        $result = $query->result_id;
        $userData = array();
        $row = $query->row();
        if(isset($row))
        {

            $explodeValue = ($row->supervisor_id ? explode(',',$row->supervisor_id) : false);
            
           //rajitha added supervisors
            $userData = array(
                'emp_id'=> $row->emp_id,
                'user_name'=>$row->user_name, 
                'emp_name'=>$row->emp_name, 
                'emp_code'=>$row->emp_code, 
                'mobile_number'=>$row->mobile_number, 
                'email_address'=>$row->email_address, 
                'city'=>$row->city, 
                'state'=>$row->state, 
                'usr_type_name'=>$row->usr_type_name, 
                'user_location'=>$row->user_location, 
                'supervisor_id'=>($explodeValue && !empty($explodeValue[0])) ? $explodeValue[0] : '',
                'supervisor_id2'=>($explodeValue && !empty($explodeValue[1])) ? $explodeValue[1] : '',
                'supervisor_id3'=>($explodeValue && !empty($explodeValue[2])) ?  $explodeValue[2] : '',
                'user_status'=>$row->user_status, 
                'channel'=>$row->Channel,
                'imdcode'=>$row->user_imd_code,
                'bankverificationid'=>$row->user_bank_verification_id,
                'staffcode'=>$row->user_staff_code,
                'userstaff'=>$row->user_staff
            );

        } 

        return $userData;


    }
 


    public function checkCurrentPassword($userId,$currentPassword){

        $this->db->where('emp_id', $userId);
        $this->db->where('password', md5($currentPassword));
        $query = $this->db->get('tbl_users');
        $result = $query->result_id;
        if($result->num_rows == '0')
        {
            return '0';
        } else {
            return '1';
        }
    }



    public function get_prdt_privilages($userTypeId){


        $this->db->select('pm.prdt_m_name,pm.prdt_m_shot_name,pm.prdt_m_desc,upp.prdt_pri_id,upp.privilage,upp.plan');    
        $this->db->from('tbl_product_master as pm');
        $this->db->join('tbl_user_prdt_privilage as upp', 'pm.prdt_m_id = upp.prdt_m_id');
        $this->db->where('upp.user_id=', $userTypeId);
        $this->db->where('upp.privilage = 1');

        $query = $this->db->get();

     // $row = $query->row();
        $result = $query->result();
        
        return $result;

    }
	
	
	public function getLoginDetails(){
		
		$this->db->select('*');
		$this->db->where('emp_id',$this->session->userdata('emp_id'));
		$getData = $this->db->get('tbl_users');
		return $getData->row_object();
		
		
	}


}

?>
