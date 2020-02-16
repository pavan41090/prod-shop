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

		if($_SERVER['REQUEST_METHOD'] != "POST"){
			redirect('user', 'refresh');
			die();
		}
		$cus_pincode = $this->input->get_post('cus_pincode');

        $query = $this->Common_model->getCityPincode($cus_pincode);
        
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
			echo '</table>';
		
	}



		public function uploadExcelByJson(){

			if(is_array($_FILES)) {

				if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
					
					$sourcePath = $_FILES['userImage']['tmp_name'];
					$targetPath = "./assets/user_uploads/".$_FILES['userImage']['name'];
					if(move_uploaded_file($sourcePath,$targetPath)) {
						
						require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";

                    try {
                        //Load the excel(.xls/.xlsx) file
                        $objPHPExcel = PHPExcel_IOFactory::load($targetPath);

						$sheet = $objPHPExcel->getSheet(0);
                    	$total_rows = $sheet->getHighestRow();
                   		$total_columns = $sheet->getHighestColumn();
                   		$responceData = array();
	                    for($row = 2; $row <= $total_rows; $row++) {
	                        //Read a single row of data and store it as a array.
	                        //This line of code selects range of the cells like A1:D1
	                        $single_row = $sheet->rangeToArray('A' . $row . ':' . $total_columns . $row, NULL, TRUE, FALSE);

	                        if(!isset($single_row[0][1])){
	                        	return false;	 
	                        	exit();
	                        }
	                        
		               		$applicationId = $single_row[0][1];
	                  		$rejectComments = $single_row[0][14];
	                  		$rejectCode = $single_row[0][15];
	                  		$leadcurrentstatus=$single_row[0][12];

	                  		//$newStatus = '';
	                  		/*if($rejectComments !== NULL && $rejectCode !== NULL)*/
	                  		$quoteData = $this->TwoWheeler_model->getleadDetailsQuoteById($applicationId);
	                  		
	                  		if($leadcurrentstatus !== "Approved"){
								$newStatus = POLICY_REJECTED_NAME;
								$leadUpdateData = array(
									'reject_comments'	=> $rejectComments,
									'reject_code'		=> $rejectCode,
									'lead_status'		=> $newStatus,
									'updated_by'        => $this->session->userdata('emp_id'),	
									'updated_on'        => date("Y-m-d h:i:s"),
								);

							} else {

								if($quoteData->num_rows()>0){
	                  			
	                  			$resulquoteData = $quoteData->row_object();
	                  			$vehicle_details_req = json_decode($resulquoteData->vehicle_details_req);

	                  			$leadlead_id = $resulquoteData->lead_id;
							$thisStates = $this->db->query("SELECT state_name FROM tbl_master_states INNER JOIN tbl_rta_location ON tbl_rta_location.rta_state = tbl_master_states.state_id WHERE tbl_rta_location.rta_code = '".substr($resulquoteData->reg_number, 0,4)."' LIMIT 1")->row_object();

	                  			$twoData['RegisterDate'] = $resulquoteData->vehicle_register_date;
	                  			//$twoData['vehicleRegisterNumber'] = $resulquoteData->vehicle_register_date;
								$twoData['ManfactureDate'] = $resulquoteData->manufacture_year;
								$twoData['rikType'] = $vehicle_details_req->vehiclerikType;
								$twoData['make'] = $resulquoteData->make_name;
								$twoData['model'] = $vehicle_details_req->vehiclemodel;
								$twoData['fueltype'] = $vehicle_details_req->vehiclefueltype;
								$twoData['Variant'] = $vehicle_details_req->vehicleVariant;
								$twoData['idv'] = $resulquoteData->IDV_value;
								$twoData['VehicleAge'] = $vehicle_details_req->vehicleVehicleAge;
								$twoData['cc'] = $vehicle_details_req->vehiclecc;
								$twoData['PlaceOfRegistration'] = $resulquoteData->registration_city;
								$twoData['SeatingCapacity'] = $vehicle_details_req->vehicleSeatingCapacity;
								$twoData['ExShowroomPrice'] = $resulquoteData->show_room_value;
								$twoData['PreviousChecker'] = $resulquoteData->hme_previous_claims;
								$twoData['vehiclethirdparty'] = $resulquoteData->prop_mtr_prev_stand_alone;
								$twoData['depPreviousPolicy'] = $resulquoteData->prop_mtr_prev_prev_depre;
								$twoData['pypstartsdate'] = '';
								
								$twoData['pypendsdate'] = $resulquoteData->home_policy_end;
								$twoData['vehicleRegisterNumber'] = $resulquoteData->reg_number;
								$twoData['vehicleRegState'] = $thisStates->state_name;
								$twoData['vehicleemailId'] = $resulquoteData->cust_email;
								$twoData['vehicleMobile'] = $resulquoteData->cust_phone;
								$twoData['lmscartenure'] = $resulquoteData->vehicle_tenure;
								///
								$twoData['lmscarvalidlicense'] = $resulquoteData->valid_license;
								$twoData['lmscarexistingpapolicy'] = $resulquoteData->is_existing_pa_policy;
								$twoData['lmscardouneedstandpa'] = $resulquoteData->prop_mtr_prev_stand_alone;
								$twoData['ncbvalue'] = ($resulquoteData->expiring_policy_NCB ? $resulquoteData->expiring_policy_NCB : 0);
								$twoData['clickdeclarativelicence'] = '0';
								$twoData['engineeNumber'] = $resulquoteData->prop_mtr_engine_num;
								$twoData['chasisNumber'] = $resulquoteData->prop_mtr_chasis_num;
								$twoData['lmssalut'] = $resulquoteData->cus_title;
								$twoData['lmsfname'] = $resulquoteData->first_name;
								$twoData['lmslname'] = $resulquoteData->last_name;
								$twoData['lmsdob'] = $resulquoteData->date_of_birth;
								$twoData['lmsgender'] = $resulquoteData->cust_gender;
								$twoData['lmsoccupation'] = $resulquoteData->occupation;
								$twoData['lmsmaterial'] = $resulquoteData->marital_status;
								$twoData['lmsadd2'] = $resulquoteData->cust_street1;
								$twoData['lmsadd3'] = $resulquoteData->cust_street2;
								$twoData['lmsadd1'] = $resulquoteData->cust_street3;
								$twoData['lmscity'] = $resulquoteData->cust_city;
								$twoData['lmsstate'] = $resulquoteData->cust_state;
								$twoData['lmspincode'] = $resulquoteData->cust_zip;
								$twoData['lmsnominename'] = $resulquoteData->nominee_name;
								$twoData['lmsnomineage'] = $resulquoteData->nominee_age;
								$twoData['lmsnominerelation'] = $resulquoteData->nominee_relationship;
								$twoData['lmspolicynumber'] = $resulquoteData->existing_policy_num;
								$twoData['lmsexistingname'] = $resulquoteData->existing_insure;
								$twoData['applicationId'] = $applicationId;
								

								$letsgetData = $this->TwoWheeler_model->gettwowheelerquoteinfo($twoData,true);
								

								if($letsgetData['StatusCode'] == 200){
									$this->session->set_userdata('AdminvehicleOrdernumber',$letsgetData['OrderNo'],true);
									$this->session->set_userdata('AdminvehicleQuotationNumner',$letsgetData['QuoteNo'],true);
									$twoData['OrderNo'] = $letsgetData['OrderNo'];
								    $twoData['QuoteNo'] = $letsgetData['QuoteNo'];
									$ProposalletsgetData = $this->TwoWheeler_model->getProposalVlueResponc($twoData,false);
									$this->db->set('quote_status',0)->where(array('quote_lead_sno'=>$leadlead_id,'quote_type'=>1))->update('tbl_vehicle_quote_details');

									if($ProposalletsgetData['StatusCode'] == 200){
									$this->session->set_userdata('AdminvehicleOrdernumber',$ProposalletsgetData['OrderNo'],true);
									$this->session->set_userdata('AdminvehicleQuotationNumner',$ProposalletsgetData['QuoteNo'],true);
									$chcekTwo = $this->db->select('quote_status')->where(array('quote_lead_sno'=>$leadlead_id,'quote_type'=>2))->get('tbl_vehicle_quote_details');
									if($chcekTwo->num_rows() > 0){
										$this->db->set('quote_status',0)->where(array('quote_lead_sno'=>$leadlead_id,'quote_type'=>2))->update('tbl_vehicle_quote_details');
									} else {
										$this->db->set(array('quote_status'=>0,'quote_type'=>2))->where(array('quote_lead_sno'=>$leadlead_id))->update('tbl_vehicle_quote_details');
									}
									
									if($this->db->affected_rows() > 0){
										$leadQuoteId = $ProposalletsgetData['OrderNo'];
										$leadQuoteNo = $ProposalletsgetData['QuoteNo'];
										$leadlms_premium = $resulquoteData->lms_premium;
										$responceDatatw = $this->TwoWheeler_model->getCreatepaymentgateWay($leadQuoteId,$leadQuoteNo,$leadlms_premium,$leadlead_id);

										///$updateArray['policyStatus'] = $responceDatatw['status'];
										
									}
									
								}

								}

								$newStatus = 'Ready to Policy';
								$leadUpdateData = array(
									'lead_status'		=> $newStatus,
									'updated_by'        => $this->session->userdata('emp_id'),	
									'updated_on'        => date("Y-m-d h:i:s"),
								);
								$leadUpdate = $this->Lms_car_model->updateDataCommon($leadUpdateData,'tbl_lead','lead_application_id',$applicationId);
								
								
	                  		}
							}	

							if($leadUpdate ==  '0'){
								$newStatus = '';
							} 
							$updateArray[] = array('application_id'=>$applicationId,'status'=>$newStatus);
							#$updateArray[] = array('application_id'=>$applicationId, 'status'=>$newStatus,'policyStatus'=>$policyStats);
							$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 7, //upload File,
							'leadData' => json_encode($updateArray)
							));
							$responceData = $updateArray;
							echo json_encode($responceData);
	                    }


                    } catch (Exception $e) {
						
                         die('Error loading file "' . pathinfo($targetPath, PATHINFO_BASENAME). '": ' . $e->getMessage());
						 
                    }



					}
				}
			}

		}



} ?>
