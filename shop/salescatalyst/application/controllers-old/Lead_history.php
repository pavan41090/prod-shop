
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//require_once FILE_PATH."/application/third_party/PHPExcel.php";
//require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";
class Lead_history extends CI_Controller {


	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');	    
	    $this->load->model('Lead_model');
	    
	    //$this->load->library('excel');
	   
 	
	}


 
	public function leadView(){ 


	$this->data['title']="Lead History";
		$this->data['module'] = 'leads'; 

		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('lead_history/list_lead',$this->data);
		$this->load->view('layout/footer_inner');
		
	}

	// public function leadList(){

 //           $this->load->model("Lead_model");  
 //           $fetch_data = $this->Lead_model->make_datatables();  
 //           $data = array(); 
 //           $i = 1; 
 //           foreach($fetch_data as $row)  
 //           {  
 //                $sub_array = array();  
                
 //                $sub_array[] = $i;  
 //                $sub_array[] = $row->product;  
 //                $sub_array[] = $row->prospectId;
 //               	$sub_array[] = '<a href="lead-view/'.$row->prospectId.'"> <button type="button"  name="View" class="btn btn-warning btn-xs">View</button></a>'; 
 //                $data[] = $sub_array; 

 //                $i++; 
 //           }  
 //           $output = array(  
 //                "draw"                =>     intval($_POST["draw"]),  
 //                "recordsTotal"        =>     $this->Lead_model->get_all_data(),  
 //                "recordsFiltered"     =>     $this->Lead_model->get_filtered_data(),  
 //                "data"                =>     $data  
 //           );  
 //           echo json_encode($output);  
 //   	}



  //  	public function leadDetailById(){

  //  		$this->data['propectsId'] = $this->uri->segment(2);
   	
  //  		$this->data['module'] = 'leads'; 
  //  		$this->data['title'] = 'Detail View'; 

  //  		$this->load->view('layout/header_inner');
		// $this->load->view('layout/menu_inner',$this->data);
		// $this->load->view('lead_history/lead_detail_view',$this->data);
		// $this->load->view('layout/footer_inner');

  //  	}



   	public function getleadsByDateRange(){

   		$this->data['module'] = 'leads'; 
   		$this->data['title'] = 'Search By Date'; 

   		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);
		$this->load->view('lead_history/leads_by_date',$this->data);
		$this->load->view('layout/footer_inner');   		
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


    public function createXLS() {
    	$dataString = $this->input->get_post('dataArray');
    	$data = json_decode($dataString);
    	

        $fileName = 'data-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Prospect ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'EmailAddress');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ProspectStage');       
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Created Date');       
        // set Row



            // [ProspectID] => 2966189e-c115-446c-9be2-eb3a65ef29e8
            // [FirstName] => sankar
            // [LastName] => k
            // [EmailAddress] => san@gmail.com
            // [ProspectStage] => Prospect
            // [CreatedOn] => 2018-02-02 10:14:08.000
            // [CanUpdate] => true

        $rowCount = 2;
        foreach ($data as $element) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element->FirstName);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->LastName);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->ProspectID);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->EmailAddress);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->ProspectStage);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->CreatedOn);
            $rowCount++;
        }
       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
		// download file
      //  $redirectPath = base_url().'/assets/temporary/';
        //redirect($redirectPath.$fileName);
       echo json_encode($fileName);
        
    }


    


}