<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model {

	public function __construct(){
		parent::__construct();
		error_reporting(0);
	}

 	public function getSearchDownloadQuery(){
        
        $dateInnput = $this->input->post();
        $startdate = str_replace('/', '-', $dateInnput['startdate'] );
		$OriginalStartdate = date('Y-m-d',strtotime($startdate));
		$this->startdate = date("Y-m-d", strtotime($OriginalStartdate));

		$enddate = str_replace('/', '-', $dateInnput['enddate'] );
		$OriginalEnddate = date('Y-m-d',strtotime($enddate));
		$this->enddate = date("Y-m-d", strtotime($OriginalEnddate));

		$this->db->select('lead_order_id,shop_plan_name,shop_other_data,shop_premises_covered,shop_insured_name,shop_owner_name,shop_gender,shop_owner_dob,shop_mobile_number,shop_email_id,shop_communication_address,shop_resk_addresss,shop_nominee_name,shop_nominee_relation,shop_nominee_dob,shop_account_number,shop_terms_conditions,shop_other_data,date(shop_created_on) shop_created_on');

		if(!empty($this->startdate) || !empty($this->enddate) ){
			$this->db->where(" date(shop_created_on) BETWEEN '".$this->startdate."' AND '".$this->enddate."' ");
		}

		$this->db->where(
			array('shop_otp_status' => 1,'shop_status'=>1)
		);
		$shopDataRows = $this->db->get('tbl_shop_office');
		
		if($shopDataRows->num_rows()>0){
			$dataStatus['status'] = true;
			$dataStatus['rows'] = $shopDataRows;
		} else {
			$dataStatus['status'] = false;
		}

		return $dataStatus;

    }
}

