<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
//require_once FILE_PATH."/application/third_party/PHPExcel.php";
//require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";

class Commoncontrol extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
		//$this->load->library('Spreadsheet_Excel_Reader');  
	}

	public function getCityByStateID(){

		$state_id = $this->input->get_post('state_id');



        $stateCityArray = $this->Common_model->getStateCityListById($state_id);
        echo json_encode($stateCityArray);
	}	

	//get city and state by pincode madhesh

public function getCityByPincode(){

		$cus_pincode = $this->input->get_post('cus_pincode');

		//$this->db->select('lead_id');
		//$this->db->from('tbl_lead');
//

        $query = $this->Common_model->getCityPincode($cus_pincode);
        //$stateCityArray = $this->Common_model->getStateCityListById($state_id);
       // var_dump($query);
        echo json_encode($query);
	}	

// get BAgi AV comments
	/*public function getCommentsByLeadId(){

		$leadId = $this->input->get_post('leadId');

		$query = $this->Common_model->getComment($leadId);

		echo json_encode($query);
	}*/

	public function sendQuoteByQuoteId()
	{ 

		$orderNo = $this->input->get_post('orderId');
		$quoteNo = $this->input->get_post('quoteId');
		$emailId = $this->input->get_post('emailId');
		$quoteType = $this->input->get_post('quoteType');
		$custName = $this->input->get_post('custName');
	
         $soapUrl = SOAP_URL."/cordys/com.eibus.web.soap.Gateway.wcp?organization=o=B2C,cn=cordys,cn=defaultInst106,o=mydomain.com";
         $requestXml = $this->Common_model->getPdfString($orderNo, $quoteNo);
		 $curl = $this->Common_model->curlXML($soapUrl, $requestXml);
		 $output =$this->Common_model->xmlstr_to_array($curl);
		 $pdfString = $output['soapenv:Body']['MISPolicyPDFDownloadResponse']['pdfURL']; 


    	$config = Array(
	 	 	'protocol' => 'smtp',
	  		'smtp_host' => 'ssl://smtp.googlemail.com',
	  		'smtp_port' => 465,
	  		'smtp_user' => 'madhesh1993@gmail.com', // change it to yours
	  		'smtp_pass' => 'madhesh02', // change it to yours
	  		'mailtype' => 'html',
	  		'charset' => 'iso-8859-1',
	  		'wordwrap' => TRUE
		);
		$base64 = base64_decode($pdfString);
	

		$config['encoding'] = 'base64';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
        
        $message = '';
        $filename = $quoteType.'-'.date('Ymd').time().'.pdf';
    	$this->load->library('email', $config);
  		$this->email->set_newline("\r\n");
  		$this->email->from('madhesh1993@gmail.com'); // change it to yours
  		$this->email->to('madhesh1993@gmail.com@gmail.com');// change it to yours
  		$this->email->subject('Your quote from BAGI');
  		$this->email->message('Dear '.$custName.',  Please find attached Quote');
  		$this->email->attach($base64,'attachment',$filename,'application/pdf');
  		if($this->email->send())
 		{
  			echo json_encode('Success');
 		} else {
			 show_error($this->email->print_debugger());
		}


	}




	public function uploadAndReadExcel(){
		echo 'Starts --- <img src="<?php  echo base_url()?>/assets/images/loader.gif" height="50" ></img>';

		//$file = $_FILES['upload']['tmp_name'];
		//$file = require_once FILE_PATH.'/assets/temporary/model_varient.xlsx';
		$excel = new Spreadsheet_Excel_Reader();
		//$excel->read('public/sample.xls'); // set the excel file name here   
		$excel->read('./assets/temporary/model_varient1.xls'); // set the excel file name here   
		$data_excell = $excel->sheets[0]['cells'];
		echo '<table border="1" >';

		echo '<tr><th>SNo.</th><th>Company Name</th><th>Product Type</th><th> Model</th><th> Varient </th><th> State Desc </th><th> Show Room Price</th></tr>';
		for($i = 1; $i <= count($data_excell); $i++ ){
			
			$companyName = $data_excell[$i]['2']; 
			$company_array = array('cmpny_name'=>$companyName,'cmpny_desc'=>'', 'created_by'=>'1');
			$companyId = $this->Common_model->checkAndInsertCompanyCommon($company_array,'tbl_vech_company','cmpny_id');

			$productType = $data_excell[$i]['3']; 
			$model = $data_excell[$i]['4']; 
			$varient = $data_excell[$i]['5']; 
			$showRoomPrice  = $data_excell[$i]['6']; 
			$cc = $data_excell[$i]['7']; 
			$seatingCapacity = $data_excell[$i]['8']; 
			
			
			if(isset($data_excell[$i]['9'])){
				$fuel = $data_excell[$i]['9']; 
			} else {
				$fuel = 'NA'; 
			}

			$tonnage = $data_excell[$i]['10']; 
			if(isset($data_excell[$i]['11'])){
				$segment = $data_excell[$i]['11'];
			} else {
				$segment = '';
			}

			$stateDesc = $data_excell[$i]['12'];
			$stateCode = $data_excell[$i]['13'];


			$model_varient_array = array(
					'company_id'=>$companyId, 
					'product_type'=>$productType,
					'model_name'=>$model,	
					'varient_name'=>$varient,
					'model_varient_desc'=>'', 
					'cc'=>$cc,
					'seating_capacity'=>$seatingCapacity,
					'fuel_type'=>$fuel,
					'tonnage'=>$tonnage,
					'segment'=>$segment,
					'created_by'=>'1',
				);

			$modelId = $this->Common_model->checkAndInsertCompanyCommon($model_varient_array,'tbl_vech_model_varient','model_id');

			$vechStateArray = array(
				'company_id'=>$companyId,
				'model_id'=>$modelId,
				'reg_state'=>$stateDesc,
				'state_code'=>$stateCode,
				'ex_showroom_price'=>$showRoomPrice,
				'created_by'=>'1',
			);
			$carId = $this->Common_model->checkAndInsertVechicleState($vechStateArray,'tbl_vech_state','state_id');
			$n = $i-1;	
			echo '<tr><td>'.$n.'</td><td>'.$companyName.'</td><td>'.$productType.'</td><td>'.$model.'</td><td>'.$varient.'</td><td>'.$stateDesc.'</td><td>'.$showRoomPrice.'</td></tr>';
		}
			echo '</table';
		
	}



		public function uploadExcelByJson(){

			if(is_array($_FILES)) {
				if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
					$sourcePath = $_FILES['userImage']['tmp_name'];
					$targetPath = "./assets/user_uploads/".$_FILES['userImage']['name'];
					if(move_uploaded_file($sourcePath,$targetPath)) {
						


                    //include("Classes/PHPExcel/IOFactory.php");
					//include("../third_party/PHPExcel/IOFactory.php");
						require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";

                    try {
                        //Load the excel(.xls/.xlsx) file
                        $objPHPExcel = PHPExcel_IOFactory::load($targetPath);


						$sheet = $objPHPExcel->getSheet(0);
                    	$total_rows = $sheet->getHighestRow();
                   		$total_columns = $sheet->getHighestColumn();
                   		//echo $total_rows;		


	                    for($row =2; $row <= $total_rows; $row++) {
	                        //Read a single row of data and store it as a array.
	                        //This line of code selects range of the cells like A1:D1
	                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);

	                        if(!empty($single_row[0][1])){

		               		$applicationId = $single_row[0][1];
	                  		$rejectComments = $single_row[0][14];
	                  		$rejectCode = $single_row[0][15];

	                  		//$newStatus = '';
	                  		if($rejectComments !== NULL && $rejectCode !== NULL){
								$newStatus = 'Policy rejected';
								$leadUpdateData = array(
									'reject_comments'	=> $rejectComments,
									'reject_code'		=> $rejectCode,
									'lead_status'		=> $newStatus,
									'updated_by'        => $this->session->userdata('emp_id'),	
									'updated_on'        => date("Y-m-d h:i:s"),
								);

							} else {
								$newStatus = 'Ready to Policy';
								$leadUpdateData = array(
									'lead_status'		=> $newStatus,
									'updated_by'        => $this->session->userdata('emp_id'),	
									'updated_on'        => date("Y-m-d h:i:s"),
								);
							}	
							
							$leadUpdate = $this->Lms_car_model->updateDataCommon($leadUpdateData,'tbl_lead','lead_application_id',$applicationId);


							if($leadUpdate ==  '0'){
								$newStatus = '';
							} 
							$updateArray[] = array('application_id'=>$applicationId, 'status'=>$newStatus);
}
	                    }
						echo json_encode($updateArray);

                    } catch (Exception $e) {
                         die('Error loading file "' . pathinfo($targetPath, PATHINFO_BASENAME). '": ' . $e->getMessage());
                    }



					}
				}
			}

		}



} ?>