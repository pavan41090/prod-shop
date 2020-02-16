<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/Bagiusers.php");
class Salescatcontroll extends Bagiusers{
public function __construct(){
    parent::__construct();
    $this->column_search = array('lead_application_id','first_name','last_name','cust_phone','cust_city','lead_status');
}
public function getleadsDashboard(){
    $this->__getleadsDashboard();
}

private function __getleadsDashboard(){
    $loggedUserId = $this->session->userdata('emp_id');
    $thisPost = $this->input->post();
    $channelType = $this->db->select('Channel')->where('emp_id',$loggedUserId)->get('tbl_users')->row_object();
    $this->db->select('tbl2.product_type,tbl_lead.lead_application_id,tbl_lead.lead_id,tbl_customer.first_name,tbl_customer.last_name,tbl_customer.cust_phone,tbl_customer.cust_city,tbl_lead.lead_status,tbl_lead.payment_type,tbl_lead.payment_status,tbl_lead.approve_status');
    $this->db->join('tbl_customer','tbl_customer.cust_id = tbl_lead.customer_id','INNER');
    $this->db->join('tbl_product tbl2','tbl2.lead_id = tbl_lead.lead_id','INNER');
    if($this->session->userdata('user_type_abbr') == 'hdfc_av'){
        $this->db->where(array(
            'tbl_lead.category' => $channelType->Channel,
            'tbl2.product_type !=' => '',
            'tbl_lead.created_by' => $loggedUserId
            )
        );
    }   
    if($this->session->userdata('user_type_abbr') == 'bagi_av'){
        $this->db->where('tbl_lead.lead_status', 'Lead Generated');
        $this->db->or_where('tbl_lead.lead_status', 'Follow Up');
        $this->db->or_where('tbl_lead.lead_status', 'Not Contacted');
        $this->db->or_where('tbl_lead.lead_status', 'Policy Issued');
    }

    if($this->session->userdata('user_type_abbr') == 'supervisor'){
        $this->db->where('tbl_lead.category',$channelType->Channel);
        $this->db->where('tbl_lead.created_by IN (select emp_id from tbl_users WHERE FIND_IN_SET('.$loggedUserId.',supervisor_id))', NULL, FALSE);
        $this->db->where('tbl_lead.lead_status', 'Sales Closed');
        $this->db->where('tbl_lead.approve_status', NULL);
        $this->db->or_where('tbl_lead.lead_status', 'Sales Closed Online');
    }
    if($this->session->userdata('user_type_abbr') == 'hdfc_ops'){
        $this->db->where('tbl_lead.approve_status', 'Proceed for Debit');
        $this->db->where('tbl_lead.payment_type', 'Credit Card');
        $this->db->where("(tbl_lead.lead_status='Sales Closed')", NULL, FALSE);
     }


     if($this->session->userdata('user_type_abbr') == 'lead data'){
        if( !empty($thisPost['product']) ){
            $this->db->where('tbl2.product_type',$thisPost['product']);
        } else {
            $this->db->where('tbl2.product_type !=','');
        }
        if(isset($thisPost['startDate']) && isset($thisPost['endDate']) && $thisPost['startDate']!="" && $thisPost['endDate']!="") {
            $startDate = new DateTime($thisPost['startDate']);
            $endDate = new DateTime($thisPost['endDate']);
            $this->db->where(" date(tbl_lead.created_on) BETWEEN '".$startDate->format('Y-m-d')."' AND '".$endDate->format('Y-m-d')."' ");
        }
     }

     if($this->session->userdata('user_type_abbr') == 'report'){
        if(isset($thisPost['channel']) && $thisPost['channel']!="" && $thisPost['channel']!="All"){
            $this->db->where('tbl_lead.category',$thisPost['channel']);
        }
        if(!empty($thisPost['product'])) {
            $this->db->where('tbl2.product_type',$thisPost['product']);
        } else {
            $this->db->where('tbl2.product_type != ','');
        }
        if(isset($thisPost['location']) && $thisPost['location']!="" && $thisPost['location']!="All"){
            $this->db->where('tbl_lead.created_by IN (select emp_id from tbl_users WHERE user_location="'.$thisPost['location'].'")', NULL, FALSE);
        }
        if(isset($thisPost['supervisor']) && $thisPost['supervisor']!="" && $thisPost['supervisor']!="-1"){
            $this->db->where('tbl_lead.created_by IN (select emp_id from tbl_users WHERE supervisor_id='.$thisPost['supervisor'].')', NULL, FALSE);
        }
        
         if(isset($thisPost['startDate']) && isset($thisPost['endDate']) && $thisPost['startDate']!="" && $thisPost['endDate']!="") {
            $startDate = new DateTime($thisPost['startDate']);
            $startDate->modify("-1 day");
            $endDate = new DateTime($thisPost['endDate']);
            $endDate->modify("+1 day");
             $this->db->where('tbl_lead.created_on >', $startDate->format('Y-m-d'));
            $this->db->where('tbl_lead.created_on <', $endDate->format('Y-m-d'));
        }
     }

    $this->db->where(array('tbl_lead.lead_status != ' => '9999'));
    $i = 0;
    foreach ($this->column_search as $item){
        if($thisPost['search']['value']){
            if($i===0){
                $this->db->group_start(); 
                $this->db->like($item, $thisPost['search']['value']);
            } else {
                $this->db->or_like($item, $thisPost['search']['value']);
            }
            if(count($this->column_search) - 1 == $i){
                $this->db->group_end();
            }
        }
        $i++;
    }
    $resultData = $this->db->get('tbl_lead');
    $numberRows = $resultData->num_rows();
    $thislastQry = $this->db->last_query();
    $resultingData = $this->db->select('product_type,lead_application_id,lead_id,first_name,last_name,cust_phone,cust_city,lead_status,payment_type,payment_status,approve_status')->from('('.$thislastQry.') as X')->order_by('lead_id','DESC')->limit($thisPost['length'], $thisPost['start'])->get();
    $no = $thisPost['start'];
    $data = array();
    //echo $this->db->last_query();
    foreach($resultingData->result() as $datax){

            $detailLink = base_url().'view-lead-details/'.$datax->lead_id;
            $editLink = base_url().'regenerate-lead/'.$datax->lead_id;
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $datax->lead_application_id;
            $row[] = $datax->first_name;
            $row[] = $datax->last_name;
            $row[] = $datax->product_type;
            $row[] = $datax->cust_phone;
            if($this->session->userdata('user_type_abbr') != 'hdfc_ops' && $this->session->userdata('user_type_abbr') != 'bagi_ops' && $this->session->userdata('user_type_abbr') != 'lead data' && $this->session->userdata('user_type_abbr') != 'report'){
                $row[] = $datax->cust_city;
                $row[] = $datax->lead_status;
            } else {
                $row[] = (!empty($datax->approve_status) ? $datax->lead_status.'-'.$datax->approve_status : $datax->lead_status );
                $row[] = $datax->payment_type;
                $row[] = $datax->payment_status;
            }
            if($datax->lead_status == 'Sales Open'){
                $row[] = '<a href="'.$editLink.'">  <button type="button" class="btn blue btn-default" > View / Edit </button></a>';
            } else {

                $row[] = '<a href="'.$detailLink.'">  <button type="button" class="btn blue btn-default" > View </button> </a>';
                $row[] = '';	
            }
            $data[] = $row;
    }
    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $numberRows,
        "recordsFiltered" => $numberRows,
        "data" => $data,
    );
    echo json_encode($output);
}
}