<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead_model extends CI_Model {
		


	public function __construct()
	{
	    parent::__construct();

	   
	}

	

	public function addUser($userData){
		$this->db->insert('lead_history',$userData);
		return $this->db->insert_id();
	}




// list start 


 
      var $table = "lead_history";
      //var $loggedUserId = $this->session->userdata('emp_id');
      
      var $select_column = array("id", "product","prospectId");  
      var $order_column = array(null, "product", "prospectId", null);  
    public function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->where('created_by', $this->session->userdata('emp_id')); 
           if(isset($_POST["search"]["value"]))  
           {  
                
            $this->db->where("(product LIKE '%".$_POST["search"]["value"]."%' 
              OR first_name LIKE '%".$_POST["search"]["value"]."%' 
              OR prospectId LIKE '%".$_POST["search"]["value"]."%' 
              OR email LIKE '%".$_POST["search"]["value"]."%')", NULL, FALSE);


                //$this->db->like("product", $_POST["search"]["value"]);  
                //$this->db->or_like("first_name", $_POST["search"]["value"]);  
                //$this->db->or_like("last_name", $_POST["search"]["value"]);  
                //$this->db->or_like("email", $_POST["search"]["value"]);  
                //$this->db->or_like("mobile", $_POST["search"]["value"]);  
                //$this->db->or_like("prospectId", $_POST["search"]["value"]);  
                //$this->db->or_like("lead_status", $_POST["search"]["value"]);  

           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           } 
             
      }  
      function make_datatables(){  
           
           $this->make_query();  
           
           if($_POST["length"] != -1)
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }
           
           $query = $this->db->get();  

           // echo $this->db->last_query();
           // exit();
           return $query->result(); 
            
      }  
     function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();
            $this->db->where('created_by', $this->session->userdata('emp_id'));   
           return $query->num_rows();  
      }       
     function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);
            $this->db->where('created_by', $this->session->userdata('emp_id'));   
           return $this->db->count_all_results();  
      }  
   


 //list end




}	