
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {


	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');	    
	    $this->load->model('Lead_model');
	   

	}


 
	public function leadView(){ 

	

		$this->load->view('backend_layout/header_inner');
		$this->load->view('backend_layout/menu_inner');
		$this->load->view('backend_layout/page_header_inner');
	    $this->load->view('lead_history/list_lead');
		$this->load->view('backend_layout/footer_inner');
	}

	public function leadList(){

           $this->load->model("Lead_model");  
           $fetch_data = $this->Lead_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                
                $sub_array[] = $row->id;  
                $sub_array[] = $row->product;  
                $sub_array[] = $row->first_name;
                $sub_array[] = $row->last_name;
                $sub_array[] = $row->email;
                $sub_array[] = $row->mobile;
                $sub_array[] = $row->prospectId;
                $sub_array[] = $row->lead_status;
                $sub_array[] = $row->total_premium; 
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->Lead_model->get_all_data(),  
                "recordsFiltered"     =>     $this->Lead_model->get_filtered_data(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      
   

	}


	public function addLeadHistory(){

			$insLeadArray = array(
				'product' => $this->input->get_post('product'), 
				'first_name' => $this->input->get_post('first_name'),
				'last_name' => $this->input->get_post('last_name'),
				'email' => $this->input->get_post('email'),
				'mobile' => $this->input->get_post('mobile'),
				'prospectId' => $this->input->get_post('prospectId'),
				'lead_status' => $this->input->get_post('lead_status'), 
				'state' => $this->input->get_post('state'),
				'city' => $this->input->get_post('city'),
				'premium' => $this->input->get_post('premium'),
				'tax' => $this->input->get_post('tax'),
				'total_premium' => $this->input->get_post('total_premium'),
				'created_date' => date("Y-m-d H:i:s"),
			); 

			$addUser = $this->Lead_model->addUser($insLeadArray);
	}



	



}