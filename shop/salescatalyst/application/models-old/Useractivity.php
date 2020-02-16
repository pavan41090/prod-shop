<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useractivity extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getInsertHistory($array = NULL){
		
		
		$dataBackup['history_user_id'] = $array['emp_id'];
		$dataBackup['history_date_time'] = date('Y-m-d G:i:s');
		$dataBackup['history_activity_type'] = $array['type'];
		$dataBackup['history_lead_id'] = $array['leadId'];
		$dataBackup['history_information'] = json_encode($array);
		
		$this->db->insert('tbl_user_activity_history',$dataBackup);
		
		$insertingId = $this->db->insert_id();
		if( $insertingId > 0){
			
			$dataValue['status'] = true;
			$dataValue['insertId'] = $insertingId;
		} else {
			
			$dataValue['status'] = false;
			
		}
		
		return json_encode($dataValue);

}

}