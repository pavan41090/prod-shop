<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagiusers extends CI_Controller{
public function __construct(){
    parent::__construct();
    $this->column_search = array('lead_application_id','first_name','last_name','cust_phone','cust_city','lead_status');
}
public function bagigetleadsDashboard($page,$limit){
    return $this->__bagigetleadsDashboard($page,$limit);
}

private function __bagigetleadsDashboard($page,$limit){
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
        //$this->db->or_where('tbl_lead.lead_status', 'Policy Issued');
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

        $this->db->join('tbl_users AS usr','tbl_lead.created_by = usr.emp_id','INNER'); 
        $this->db->join('tbl_nominee AS nomn','tbl_lead.lead_id = nomn.lead_id','LEFT');

        $inputGet = $this->input->get();

        $prtypelead = $inputGet['user_product'];
        if(!empty($prtypelead)){
            $this->db->where('tbl2.product_type',$prtypelead);
        } else {
            $this->db->where('tbl2.product_type !=','');
        }
        $leadstart_date = $inputGet['start_date'];
        $leadend_date = $inputGet['end_date'];
        if(!empty($leadstart_date) && !empty($leadend_date) && $leadstart_date!="" && $leadend_date!="") {
            $startDate = new DateTime($leadstart_date);
            $endDate = new DateTime($leadend_date);
            $this->db->where(" date(tbl_lead.created_on) BETWEEN '".$startDate->format('Y-m-d')."' AND '".$endDate->format('Y-m-d')."' ");
        }
     }

     if($this->session->userdata('user_type_abbr') == 'report'){

        $inputGet = $this->input->get();
        $reportuserchannel = $inputGet['user_channel'];
        if(!empty($reportuserchannel) && $inputGet['user_channel']!="" && $inputGet['user_channel']!="All"){
            $this->db->where('tbl_lead.category',$inputGet['user_channel']);
        }
        $reuser_product = $inputGet['user_product'];
        if(!empty($reuser_product)) {
            $this->db->where('tbl2.product_type',$reuser_product);
        } else {
            $this->db->where('tbl2.product_type != ','');
        }
        $userrelocation = $inputGet['user_location'];
        if(!empty($userrelocation) && $userrelocation!="" && $userrelocation!="All"){
            $this->db->join('tbl_users AS usr','tbl_lead.created_by = usr.emp_id');
            $this->db->join('tbl_nominee AS nomn','tbl_lead.lead_id = nomn.lead_id');
            $this->db->join('tbl_user_activity_history AS tua','tbl_lead.lead_id = tua.history_lead_id','left');
            //$this->db->where('tbl_lead.created_by IN (select emp_id from tbl_users WHERE user_location="'.$this->input->get('user_location').'")', NULL, FALSE);
             $this->db->where('usr.user_location',$userrelocation);
           // $this->db->where("tbl_lead.user_location  = '".$this->input->get('user_location')."'");
        }

       /* 
       if(isset($thisPost['supervisor']) && $thisPost['supervisor']!="" && $thisPost['supervisor']!="-1"){
            $this->db->where('tbl_lead.created_by IN (select emp_id from tbl_users WHERE supervisor_id='.$thisPost['supervisor'].')', NULL, FALSE);
        }
        */

        $reportstart_date = $inputGet['start_date'];
        $reportend_date = $inputGet['end_date'];
        
         if(!empty($reportstart_date) && !empty($reportend_date) && $reportstart_date!="" && $reportend_date!="") {
            $startDate = new DateTime($reportstart_date);
            $startDate->modify("-1 day");
            $endDate = new DateTime($reportend_date);
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
    $this->db->group_by('lead_id');
    $resultData = $this->db->get('tbl_lead');

    $numberRows = $resultData->num_rows();
    $thislastQry = $this->db->last_query();
    $resultingData = $this->db->select('product_type,lead_application_id,lead_id,first_name,last_name,cust_phone,cust_city,lead_status,payment_type,payment_status,approve_status')->from('('.$thislastQry.') as X')->group_by('lead_id')->order_by('lead_id','DESC')->limit($page, $limit)->get();
    //limit($thisPost['length'], $thisPost['start'])
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
                $row[] = (isset($datax->approve_status) ? $datax->lead_status.'-'.$datax->approve_status : $datax->lead_status );
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
    #echo json_encode($output);
    $returnDatadid['numRows'] = $numberRows;
    $returnDatadid['numrowsData'] = $resultingData->result();
    #echo json_encode($output);
    return $returnDatadid;
}
}