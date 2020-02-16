<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
require_once FILE_PATH."/application/third_party/PHPExcel.php";
require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";
class Lmspolicy extends CI_Controller {

	public function __construct()
	{
		define('TABLE_POLICY','tbl_policy_details_table');
		define('TABLE_LEAD','tbl_lead');
	    parent::__construct();
	    ini_set('max_input_vars','10000' );
		error_reporting(0);
		$this->fileTarget = './assets/uploads/policy/';
		$this->objPHPExcel = new PHPExcel();
		$this->LimitRows = 100;
		$this->totalRows = 0;
		$this->objReader     = PHPExcel_IOFactory::createReader("Excel2007");
	}

	public function getUploaddoc(){
		if($_SERVER['REQUEST_METHOD'] != "POST"){
			redirect(base_url(),'refresh');
			exit();
		}
		$this->getUploaddocPrivacy();
	}

	public function getReadLeadData(){
		if($_SERVER['REQUEST_METHOD'] != "POST"){
			redirect(base_url(),'refresh');
			exit();
		}
		$this->getfilerowsCount();
	}

	private function getfilerowsCount(){
		try{
			$thisPost = $this->input->post();
			$startNumber = $thisPost['resCount'];
			$p = ($startNumber > 0 ? ($startNumber-1) : 0);
			$rd = $startNumber*100;
			$start_row = $rd; //define start row
			$end_row = $start_row - 100; //define end row
            $dataRes['start_row'] = $start_row;
            $dataRes['end_row'] = $end_row;
            $coount=0;

			$objPHPExcel = PHPExcel_IOFactory::load($thisPost['uploadpath']);
			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
				$worksheetTitle     = $worksheet->getTitle();
			    $highestRow         = $worksheet->getHighestRow()+1;
			    $highestColumn      = $worksheet->getHighestColumn();
			    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
			    $nrColumns = ord($highestColumn) - 64;

			    for($i=($end_row == 0 ? 2 : ($end_row)); $i < $start_row;$i++){

			    $this->db->trans_begin();
                if( $i < $highestRow){
                	
                	$leadNumber = $worksheet->getCellByColumnAndRow(1, $i)->getValue();
                	$leadpolicynumber = $worksheet->getCellByColumnAndRow(2, $i)->getValue();
                	$pstartDate = $worksheet->getCellByColumnAndRow(3, $i)->getValue();
                	$pendDate = $worksheet->getCellByColumnAndRow(4, $i)->getValue();
                	//Policy Issued
                	if(!empty($leadNumber)){

                		$dataInsert['policy_lead_no'] = '(SELECT lead_id FROM '.TABLE_LEAD.' WHERE lead_application_id = "'.$leadNumber.'" )'; 
	                	$AdataInsert['policy_number'] = $leadpolicynumber; 
	                	$AdataInsert['policy_start_date'] = $pstartDate; 
	                	$AdataInsert['policy_end_date'] = $pendDate; 
	                	$AdataInsert['policy_created_by'] = ($this->session->userdata('customerId') ? $this->session->userdata('customerId') : 0); 
	                	$AdataInsert['policy_created_on'] = date("Y-m-d G:i:s"); 
	                	$AdataInsert['policy_status'] = 1; 
	                	$this->db->set($dataInsert,'',false)->set($AdataInsert)->insert(TABLE_POLICY);
	                	$resposeDatax[] = array( 'i' => $i );

                	}

                }

        		if ($this->db->trans_status() === FALSE){

                        $this->db->trans_rollback();
                        $dataRes['status'] = false;

                } else {
                        $this->db->trans_commit();
                        $dataRes['status'] = true;

                        $this->db->set(
                        	array('lead_status'=>'Policy Issued','lead_sub_status'=>'Policy Issued')
                        )->where('lead_application_id',$leadNumber)->update(TABLE_LEAD);
                }

            }

            if(empty($resposeDatax)){
            	$resposeData['nextStatus'] = false;
            } else {
            	$resposeData['nextStatus'] = true;
            }
            $calcRows = ceil($highestRow/$this->LimitRows);
            $resposeData['totalCount'] = $calcRows+1;
			    
			}
			
			$resposeData['nextNumber'] = $startNumber+1;
			echo json_encode($resposeData);

		} catch(Exception $error){
			log_message('error','Something went wrong in function.'.__FUNCTION__.'. error '.json_encode($error));
		}
	}

	private function getUploaddocPrivacy(){

		try{

				$upload_path	= $this->fileTarget;
				$fileUploadPath = $_FILES['uploadPolicyDoc'];
				$filename = $fileUploadPath['name'];
				$upload_path = $upload_path.$filename;
				if(move_uploaded_file($fileUploadPath['tmp_name'], $upload_path)){

					$uploadedFilepath = $upload_path;
					$worksheetData = $this->objReader->listWorksheetInfo($uploadedFilepath);
					$this->totalRows = $worksheetData[0]['totalRows'];
					$totalColumns  = $worksheetData[0]['totalColumns'];
					
					$calcRows = ceil($this->totalRows/$this->LimitRows);

					$uploadStatus['cellrows'] = $calcRows;
					$uploadStatus['upload_path'] = $upload_path;
					$uploadStatus['status'] = true;
				} else {
					$uploadStatus['status'] = false;
				}

				echo json_encode($uploadStatus);

		} catch(Exception $error){
			log_message('error','Something went wrong in function.'.__FUNCTION__.'. error '.json_encode($error));
		}
	}

	public function checkMobileLead(){
		if($_SERVER['REQUEST_METHOD'] != "POST"){
			redirect(base_url(),'refresh');
			exit();
		}

		$this->mobileNumberDuplicateChecer();
	}

	private function mobileNumberDuplicateChecer(){
		try{
			if($_SERVER['REQUEST_METHOD'] == "POST"){

				$appendData = $this->input->post();
				$thnumber = $appendData['number'];
				$thproductname = $appendData['productname'];

				$this->db->select('count(tbl_customer.cust_id) cust_id,tbl_lead.lead_application_id')->join('tbl_lead','tbl_lead.customer_id=tbl_customer.cust_id')->where(array('tbl_customer.cust_phone'=>$thnumber,'tbl_lead.line_of_business'=>$thproductname));
				if($appendData['leadValue']){
					$this->db->where('tbl_lead.lead_id !=', $appendData['leadValue']);
				}
				$checkData = $this->db->get('tbl_customer')->row_object();
				
				if($checkData->cust_id>0){
					$dataReturn['status'] = true;
					$dataReturn['message'] = 'Lead with same mobile number found: '.$checkData->lead_application_id;
				} else {
					$dataReturn['status'] = false;
				}

				echo json_encode($dataReturn);
			} else {
				redirect(base_url(),'refresh');
				exit();
			}
		} catch(Exception $error){
			log_message('error','Something went wrong in function.'.__FUNCTION__.'. error '.json_encode($error));
		}
	}
}
