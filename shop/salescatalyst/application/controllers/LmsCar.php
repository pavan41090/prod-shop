<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
require_once FILE_PATH."/application/third_party/PHPExcel.php";
require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";
include_once (dirname(__FILE__) . "/Twoexcel.php");

class LmsCar extends Twoexcel {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	    $this->load->model('User_model');
		error_reporting(0);
		$userLogin = $this->session->userdata('logged_in');
		if (empty($userLogin)) {
			redirect(base_url());
		}
	}


	public function createLmsCar(){

		if ($this->session->userdata('logged_in') == TRUE) {

	        $str = file_get_contents(FILE_PATH.'/assets/json/model-make.json');
            $dataArraycar = json_decode($str, true);
			$dataArraycar = $this->Common_model->array_sort($dataArraycar, 'MANUFACTURE', SORT_ASC);

	         $filtercar = array("FPV");
	         foreach($dataArraycar as $arrcar)
	            {
	                foreach($filtercar as $valuecar)
	                {
	                    if(in_array($valuecar,$arrcar))
	                    {
	                        $dataArraycarnew[]=$arrcar;
	                    }
	                }
	            }
	        $carbrandArray = array_unique(array_filter(array_column($dataArraycarnew,'MANUFACTURE')));
	        $hashBrandCategoriesedcar = array();
	        $brandVariantscar    = array();
	        foreach($dataArraycar as $eachDataCar){
	            $carmanufacture = $eachDataCar['MANUFACTURE'] ? $eachDataCar['MANUFACTURE'] : '';
	            $carvariant = $eachDataCar['VARIANT'] ? $eachDataCar['VARIANT'] : '';
	            $carmodel = $eachDataCar['MODEL'] ? $eachDataCar['MODEL'] : '';
	            $carEX_SHOWROOM_PRICE = $eachDataCar['EX_SHOWROOM_PRICE'] ? $eachDataCar['EX_SHOWROOM_PRICE'] : '';
	           
	            $carhashKey = base64_encode($carmanufacture.$carvariant);
	            $carmhashKey = base64_encode($carmodel.'-'.$carvariant);
	            $carhashBrandCategoriesed[$carhashKey] = $eachDataCar;
	            $carmhashBrandCategoriesed[$carmhashKey] = $carEX_SHOWROOM_PRICE;
				
 				$carCC = $eachDataCar['CC'] ? $eachDataCar['CC'] : '';
				$carCCCategoriesed[$carmhashKey] = $carCC;
 				$carFUEL = $eachDataCar['FUEL'] ? $eachDataCar['FUEL'] : '';
				$carFUELCategoriesed[$carmhashKey] = $carFUEL;

 				$carSEATING = $eachDataCar['SEATING_CAPACITY'] ? $eachDataCar['SEATING_CAPACITY'] : '';
				$carSEATINGCategoriesed[$carmhashKey] = $carSEATING;


	            $carbrandVariants[$carmanufacture][] = $carvariant;
	            $carmbrandVariants[$carmanufacture][] = $carmodel.'-'.$carvariant;
	        }

	        $this->data['carCCCategoriesed'] = $carCCCategoriesed;
	        $this->data['carFUELCategoriesed'] = $carFUELCategoriesed;
	        $this->data['carSEATINGCategoriesed'] = $carSEATINGCategoriesed;
	        

	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carbrandArray'] = $carbrandArray;
	        $this->data['carbrandVariants'] = $carbrandVariants;
	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carhashBrandCategoriesed'] = $carhashBrandCategoriesed;
	       	$this->data['carmhashBrandCategoriesed'] = $carmhashBrandCategoriesed;
	        $this->data['carmhashKey'] = $carmhashKey;
			$this->data['city'] = $this->Common_model->getCityList();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();

            $this->data['PriorityArray'] = $this->Common_model->getPriority();
            //$this->data['branchLocation'] = $this->Common_model->getBranchLocation();            
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['languageArray'] = $this->Common_model->language();
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();
            $this->data['sdateArray'] = $this->Common_model->sdate();
     		$this->data['businessArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();     		
            $this->data['module'] = 'leads'; 
			$this->data['sub_module'] = 'Car'; 



			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	

		
			// echo '<pre>';
			// print_r($userRight);
			// exit();
			if(count($userRight) == 0){

				$this->load->view('layout/header_inner');
				$this->load->view('layout/menu_inner',$this->data);
				$this->load->view('layout/lms_page_header_inner',$this->data);
				$this->load->view('lms_view/unauthorised',$this->data);
				$this->load->view('layout/footer_inner');
			} else { 

				if($userRight[0]->prdt_m_shot_name !== 'car'){
					redirect('lms-'.$userRight[0]->prdt_m_shot_name);
					exit();
				} else {
					$this->load->view('layout/header_inner');
					$this->load->view('layout/menu_inner',$this->data);
					$this->load->view('layout/lms_page_header_inner',$this->data);
					$this->load->view('lms_view/lms_create_car',$this->data);
					$this->load->view('layout/footer_inner');
				}
			}	

		} else {
			redirect('user');
		}

	}

	public function lmsCustomerDetails(){
		
		$cusData = array(
			'cus_title' 	=> $this->input->get_post('lms_car_salut'),
			'first_name'	=> $this->input->get_post('lms_car_fname'),
			'last_name' 	=> $this->input->get_post('lms_car_lname'),
			'date_of_birth'	=> $this->input->get_post('lms_car_dob'),
			'cust_age'      => $this->input->get_post('lms_car_age'),
			'cust_gender' 	=> $this->input->get_post('lms_car_gender'),
			'cust_pan' 		=> $this->input->get_post('lms_car_pan'),
			'cust_street1' 	=> $this->input->get_post('lms_car_add1'),
			'cust_street2' 	=> $this->input->get_post('lms_car_add2'),
			'cust_area' 	=> $this->input->get_post('lms_car_area'),
			'cust_zip' 		=> $this->input->get_post('lms_car_zip'),
			'cust_state' 	=> $this->input->get_post('lms_car_state'),
			'cust_city' 	=> $this->input->get_post('lms_car_city'),
			'cust_email' 	=> $this->input->get_post('lms_car_email'),
			'cust_phone' 	=> $this->input->get_post('lms_car_mobile'),
			'cust_type' 	=> $this->input->get_post('lms_car_cus_type'),
			'cust_landmark' => $this->input->get_post('lms_car_pro_landmark'),
 			'marital_status'=> $this->input->get_post('lms_car_pro_marital'),
			'occupation'	=> $this->input->get_post('lms_car_pro_occupation'),
			'emergency_contact_num' => $this->input->get_post('lms_car_pro_emergency'),
			'GSTIN' => $this->input->get_post('lms_car_pro_gstn'),
			'cust_house_number' => $this->input->get_post('lms_house_number'),
			'cus_customer' 		=> $this->input->get_post('lms_cus_customer'),
			'cus_language' 		=> $this->input->get_post('lms_cus_language'),
			'cus_emi' 			=> $this->input->get_post('lms_cus_emi'),
			'cus_emi_yr' 		=> $this->input->get_post('lms_cus_emi_yr'),
			'processing_fee	'	=> $this->input->get_post('lms_cus_pfee'),
 			'cus_cardlimt'		=>$this->input->get_post('lms_cus_cardlimt'),
			'statement_date'	=>$this->input->get_post('lms_cus_sdate'),
			'temp_LE'           =>$this->input->get_post('lms_cus_tle'),
			'business_type'	    =>$this->input->get_post('lms_cus_tbusins'),
			'created_by'        => $this->session->userdata('emp_id'),
		);

		$customerId = $this->Lms_car_model->insertDataCommon($cusData,'tbl_customer');
		$applicationNumber = $this->Lms_car_model->generateApplicationNumber();
		$subChannel="";
		if($this->input->get_post('lms_car_campaign_name') != FALSE){
				$subChannel=$this->input->get_post('lms_car_campaign_name');
		}
		
		$timestamp = $this->input->get_post('comment_Date');
		//date('Y-m-d G:i:s'); 
		$leadData = array(
			'category'=> $this->input->get_post('lms_car_category'),
			'line_of_business'=> $this->input->get_post('lms_car_line_of_business'),
			'priority' => $this->input->get_post('lms_car_sub_channel'),
			'target_date' => $this->input->get_post('lms_car_target_date'),
			'TSE_BDR_code' => $this->input->get_post('lms_car_tse_bar_code'),
			'TL_code' => $this->input->get_post('lms_car_tl_code'),
			'SM_code' => $this->input->get_post('lms_car_sm_code'),
			'bank_verifier_id'=> $this->input->get_post('lms_car_bank_verify_id'),
			'case_id' => $this->input->get_post('lms_car_case_id'),
			'payment_type' => $this->input->get_post('lms_car_payment_type'),
			'sub_channel' =>$subChannel,
			'channel' => $this->input->get_post('lms_car_channel'),
			'HDFC_card_relationship_no' => $this->input->get_post('lms_car_hdfc_card_relno'),
			'HDFC_card_last_4_digits' => $this->input->get_post('lms_car_hdfc_card_4digt'),
			'lead_application_id'=> $applicationNumber,
			'customer_id'=>$customerId,
			'lead_details'=>$this->input->get_post('lms_car_deatil_lead'),
			'aaa_number'=>$this->input->get_post('lms_aaa_number'),
			'created_by'=> $this->session->userdata('emp_id'),
			'vision_address'=>$this->input->get_post('vision_address_name'),
			'lead_status'=>"9999",
			'created_on' => date("Y-m-d G:i:s")
		);
		$this->db->set($leadData)->insert('tbl_lead');
		$leadId = $this->db->insert_id();
		$leadData = array(
			'customerId' => $customerId,
			'leadId' 	=> $leadId,
			'leadNumber' => $applicationNumber,
		);
		$this->session->set_userdata($leadData);		
		//return $leadId;
		
		if(isset($leadId)){
			echo "success";
		} else{
		   echo "false";
		}
	}

	public function lmsProductDetails(){
		

		$productData = array(
			'customer_id'  	 	=>$this->session->userdata('customerId'),
			'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'product_type'		=>  $this->input->get_post('product_type'),
			'pre_insurance' 	=> "star",
			'reg_number'		=> $this->input->get_post('lms_car_reg_no'),
			'manufacture_year' 	=> $this->input->get_post('lms_car_manufacture_year'),
			'manufacturer' 		=> $this->input->get_post('lms_car_manufacturer'),
			'model_varient' 	=> $this->input->get_post('lms_car_variant'),
			'registration_city' => $this->input->get_post('lms_car_reg_city'),
			'policy_expire_date'=> $this->input->get_post('lms_car_policy_exp_date'),
			'IDV_value' 		=> $this->input->get_post('lms_car_idv'),
			'show_room_value' 	=> $this->input->get_post('caramount'),
			'expiring_policy_claim'=> $this->input->get_post('lms_car_claim_policy'),
			'expiring_policy_NCB'  => $this->input->get_post('lms_car_ncb'),
			'lms_premium' 		 => $this->input->get_post('lms_premium'),
			'created_by'        => $this->session->userdata('emp_id'),
		);

		$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		if(isset($productId)){
			echo "success";
		} else{
		   echo "false";
		}

	}

	public function lmsProposalDetails(){
			$proposalData = array(
				'customer_id'  	 	=>$this->session->userdata('customerId'),
				'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'existing_insure'		=> $this->input->get_post('lms_car_prop_existing_insure'),
				'existing_policy_num' 	=> $this->input->get_post('lms_car_pro_existing_policynum'),
				'existing_policy_expiry'		=> $this->input->get_post('lms_car_pro_existing_policy_expiry'),
				'new_policy_start' 	=> $this->input->get_post('lms_car_pro_policy_start'),
				'prop_mtr_reg_date' 		=> $this->input->get_post('lms_car_pro_regis_date'),
				'prop_mtr_regi_num' 	=> "tn56yu6789",
				'prop_mtr_engine_num' => $this->input->get_post('lms_car_pro_engine_num'),
				'prop_mtr_chasis_num'=> $this->input->get_post('lms_car_pro_chasis_num'),
				'prop_mtr_financed' 		=> $this->input->get_post('lms_car_pro_financed'),

				'prop_mtr_fin_ins_name' => $this->input->get_post('lms_car_pro_fin_ins_name'),
				'prop_mtr_fin_ins_city' => $this->input->get_post('lms_car_pro_fin_ins_city'),
				'prop_mtr_prev_stand_alone' => $this->input->get_post('lms_car_pro_prev_stand_alone'),
				'prop_mtr_prev_prev_depre' => $this->input->get_post('lms_car_pro_prev_depre'),
				'prop_mtr_prev_prev_electric' => $this->input->get_post('lms_car_pro_prev_electric'),
				'prop_mtr_prev_prev_cng_lpg' => $this->input->get_post('lms_car_pro_prev_cng_lpg'),


			);

			$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');

			$nomineeData = array(
				'customer_id'  	 	=>$this->session->userdata('customerId'),
				'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'nominee_name'		=> $this->input->get_post('lms_car_pro_nname'),
				'nominee_age' 	=> $this->input->get_post('lms_car_pro_nage'),
				'nominee_relationship'		=> $this->input->get_post('lms_car_pro_nomie_relation'),
				'appointee_name' 	=> $this->input->get_post('lms_car_pro_nameofappoint'),
				'appointee_relationship' 		=> $this->input->get_post('lms_car_pro_appoint_relation'),
			);

			$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');


			$driverData = array(
				'customer_id'  	 	=>$this->session->userdata('customerId'),
				'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'driving_exp'		=> $this->input->get_post('lms_car_pro_drive'),
				'night_parking' 	=> $this->input->get_post('lms_car_pro_parking'),
				'driver_count'		=> $this->input->get_post('lms_car_pro_who_drive'),
				'KM_per_year'   	=> $this->input->get_post('lms_car_pro_kms'),
				'young_driver_age' => $this->input->get_post('lms_car_pro_ydage'),
				'ext_driver' 		=> $this->input->get_post('lms_lms_car_pro_driver'),
			);

			$driverId = $this->Lms_car_model->insertDataCommon($driverData,'tbl_driving_habits');

			$leadData = array(
				'lead_status'	=> 'Lead Generated',
				'updated_by'        => $this->session->userdata('emp_id'),	
				//'updated_on'        => date("Y-m-d G:i:s"),
			);
			$lead_id = $this->session->userdata('leadId');
	    	$this->Lms_car_model->updateDataCommon($leadData,'tbl_lead','lead_id',$lead_id);

		   $proupData = array(
			    
				'pre_insurance' 	=> $this->input->get_post('lms_car_prop_existing_insure'),
			);
	   		$customerId = $this->session->userdata('customerId');
	   		$pupdate= $this->Lms_car_model->updateDataCommon($proupData,'tbl_product','customer_id',$customerId);

	   		if($this->input->get_post('lms_car_comment') != ''){

				$commentData = array(
					'comment'	=> $this->input->get_post('lms_car_comment'),
					'lead_id'	=> $this->session->userdata('leadId'),
					'status'  	=> '1',
					'created_on' => $this->session->userdata('emp_id'),
					//'created_by' =>date("Y-m-d G:i:s"),
				);
				$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
			}	
			if(isset($pupdate)){
				echo $this->session->userdata('leadNumber');
			} else{
		   		echo "false";
			}
		}

	function lmsAddLeadCommentByJson(){

			if($this->input->get_post('leadComment') != ''){
				$commentData = array(
					'comment'	=> $this->input->get_post('leadComment'),
					'lead_id'	=> $this->input->get_post('leadId'),
					'status'  	=> '1',
					'created_by'  	=> date("Y-m-d G:i:s"),
					'created_on' => $this->session->userdata('emp_id')
				);
				
				
				#$this->db->set($commentData)->set(array('created_by'=>"DATE_FORMAT(convert_tz(now(),@@session.time_zone,'+05:30') ,'%Y-%m-%d %H-%i-%s')"),"",false)->insert('tbl_comments');
				
				#$this->db->set($commentData)->insert('tbl_comments');
				
				$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
				echo true;
			}	
		}

	public function lmsDashboard(){

		if($this->session->userdata('logged_in') == TRUE) {

		    $this->data['module'] = 'leads'; 
			//$this->data['sub_module'] = 'Car'; 
			
			$this->data['desName'] = $this->session->userdata('des_name');
			$this->data['desId'] = $this->session->userdata('des_id');
			$this->data['userType'] = $this->session->userdata('user_type');
			$this->data['userTypeAbbr'] = $this->session->userdata('user_type_abbr');

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('lms_view/lms_dashboard');
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user');
		}
	}

	function leadListing(){

/*		if($_SERVER['REQUEST_METHOD'] == "POST" && $this->session->userdata('usr_type_id') != 3){
			$this->getleadsDashboard();
			return false;
			exit();
		}
*/
		if ($this->session->userdata('logged_in') == TRUE) {

			$inptPostdata = $_POST;
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$config["per_page"] = 10;
				$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
				$paginationFunction = $this->bagigetleadsDashboard($config["per_page"],$page);
				$config["uri_segment"] = 2;
				$config["reuse_query_string"] = true;
				#$config["use_page_numbers"] = true;
				$config["base_url"] = base_url() . 'lms-lead-list/';
				$config["total_rows"] = $paginationFunction['numRows'];
		        $config['full_tag_open'] = '<div style="text-align:right;"><ul class="pagination pagination-small pagination-centered">';
				$config['full_tag_close'] = '</ul></div>';
				$config['num_tag_open'] = '<li class="page-item">';
		        $config['num_tag_close'] = '</li>';
		        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		        $config['cur_tag_close'] = '</a></li>';
		        $config['next_tag_open'] = '<li class="page-item">';
		        $config['next_tagl_close'] = '</a></li>';
		        $config['prev_tag_open'] = '<li class="page-item">';
		        $config['prev_tagl_close'] = '</li>';
		        $config['first_tag_open'] = '<li class="page-item disabled">';
		        $config['first_tagl_close'] = '</li>';
		        $config['last_tag_open'] = '<li class="page-item">';
		        $config['last_tagl_close'] = '</a></li>';
		        $config['attributes'] = array('class' => 'page-link');
		        $this->pagination->initialize($config);
		        $this->datxa["links"] = $this->pagination->create_links();
		        $this->datxa['leadData'] = $paginationFunction['numrowsData'];
		        $this->datxa['total_rows'] = $paginationFunction['numRows'];
		        echo json_encode($this->datxa);
		        die();
			}
	
		    $this->data['module'] = 'Dashboard'; 
			$this->data['sub_module'] = 'Car';
			$this->data['title']="Lead List"; 
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);			
			$this->load->view('lms_view/lms_lead_listing',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user');
		}
	}

 	public function leadListByJson()
    {
        $leadStatus = $this->input->get_post('leadStatus');
		$list = $this->Lms_car_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $lead) {
            $detailLink = base_url().'view-lead-details/'.$lead->lead_id;
            $editLink = base_url().'regenerate-lead/'.$lead->lead_id;
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $lead->lead_application_id;
            $row[] = $lead->first_name;
            $row[] = $lead->last_name;
            $row[] = $lead->product_type;
            $row[] = $lead->cust_phone;
           

    	switch ($this->session->userdata('user_type_abbr')) {

			case 'hdfc_av':
				$row[] = $lead->cust_city;
				$row[] = $lead->lead_status;
				if($lead->lead_status == 'Sales Open'){
					$row[] = '<a href="'.$editLink.'">  <button type="button" class="btn blue btn-default" >View / Edit </button></a>';
				} else {

					$row[] = '<a href="'.$detailLink.'">  <button type="button" class="btn blue btn-default" >View</button></a>';
					$row[] = '';	
				}
				break;
			case 'bagi_av':
				$row[] = $lead->cust_city;
				$row[] = $lead->lead_status;
				 $row[] = '<a href="'.$detailLink.'">  <button type="button" class="btn blue btn-default" >View Lead</button></a>';
				break;
			case 'supervisor':
				$row[] = $lead->cust_city;
				$row[] = $lead->lead_status;
				$row[] = '<a href="'.$detailLink.'">  <button type="button" class="btn blue btn-default" >View Lead</button></a>';
				break;
			case 'hdfc_ops':
			case 'lead data':
			case 'report':
			 	$row[] = $lead->lead_status.'-'.$lead->approve_status;
				$row[] = $lead->payment_type;
				$row[] = $lead->payment_status;
				$row[] = '<a href="'.$detailLink.'">  <button type="button" class="btn blue btn-default" >View Lead</button></a>';
				break;
				
			case 'bagi_ops':
				$row[] = $lead->lead_status.'-'.$lead->approve_status;
				$row[] = $lead->payment_type; 
				$row[] = $lead->payment_status;
				$row[] = '';
				break;
			}
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Lms_car_model->count_all(),
            "recordsFiltered" => $this->Lms_car_model->count_filtered(),
            "data" => $data,
	    );
		echo json_encode($output);
    }

    public function leadViewByLeadId(){
    	
    	$leadId = $this->uri->segment(2);
    	
	   	$this->data['module'] = 'leads'; 
		$this->data['sub_module'] = 'Car';
		$this->data['title']="Lead Details"; 
	   	$this->data['leadId'] = $leadId; 

	   	$this->data['logged_user_type'] = $this->session->userdata('user_type_abbr');
		$this->data['lead_details'] = $this->Lms_car_model->getLeadDetailsByLeadId($leadId);
		
        $this->data['lead_details_edit']=$this->Lms_car_model->getLeadDetailsByLeadIdforEdit($leadId);
		$this->data['member_details'] = $this->Lms_car_model->getMemberDetailsByLeadId($leadId);
		$this->data['pre_ins_details'] = $this->Lms_car_model->getPreviousInsuranceDetailsByLeadId($leadId);
		$this->data['primary_ins_details'] = $this->Lms_car_model->getPrimaryInsuredDetailsByLeadId($leadId);
		$this->data['comment_details'] = $this->Lms_car_model->getCommentsByLeadId($leadId);
		$this->data['valuables_details'] = $this->Lms_car_model->getValuableDetailsByLeadId($leadId);
		$this->data['PEEI_details'] = $this->Lms_car_model->getPEEIDetailsByLeadId($leadId);
		$this->data['pre_claim_details'] = $this->Lms_car_model->getPreClaimDetailsByLeadId($leadId);


		$thisData = $this->db->where('lead_id',$leadId)->order_by('quote_id','DESC')->limit(1)->get('tbl_quote_reg_table')->row_object();

		$this->data['quotedetails'] = $thisData;

		$thiswheelquote = $this->db->select('quote_orderNum,quote_QuoteNum,lead_policy_number,vehicle_details_req')->where(array('quote_lead_sno'=>$leadId,'quote_status'=>1))->limit(1)->order_by('quote_sno','DESC')->get('tbl_vehicle_quote_details');
		$this->data['policyData'] = $this->db->select('policy_start_date,policy_end_date,policy_number,policy_created_on')->where('policy_lead_no',$leadId)->get('tbl_policy_details_table')->row_object();
		$this->data['quoteData'] = $thiswheelquote->row_object();
		
		$this->load->view('layout/header_inner');
		$this->load->view('layout/menu_inner',$this->data);

		$this->data['uppData'] = $this->db->where('upp_lead_id',$leadId)->get('tbl_upp_logn_term_policy_details')->row_object();

		switch ($this->data['lead_details'][0]->product_type) {
		    case 'Car':
		    case 'Two Wheeler':
		        $this->load->view('lms_view/lms_lead_details_motor',$this->data);
		        break;
		    case 'Health':
		   		$this->load->view('lms_view/lms_lead_details_health',$this->data);
		        break;
		    case 'Super Ship':
		        $this->load->view('lms_view/lms_lead_details_sship',$this->data);
		        break;
		     case 'Travel':
		         $this->load->view('lms_view/lms_lead_details_travel',$this->data);
		        break;    
		    case 'Personal Accident':
		    case 'Combo':
		         $this->load->view('lms_view/lms_lead_details_PA',$this->data);
		        break;
		   	case 'Home':
		         $this->load->view('lms_view/lms_lead_details_home',$this->data);
		        break;
		   	case 'Critical Illnes':
		         $this->load->view('lms_view/lms_lead_details_CI',$this->data);
		        break;
			case 'Shop':
				$this->load->view('lms_view/lms_lead_details_shop',$this->data);
				break;	

			case 'Office':
				$this->load->view('lms_view/lms_lead_details_office',$this->data);
				break;

			case 'UPP LONG TERM':
				$this->load->view('lms_view/lms_lead_details_upp',$this->data);
				break;
				
			case 'Bundle PA':
			$this->load->view('lms_view/lms_lead_details_PA',$this->data);
			break;
		}
		$this->load->view('layout/footer_inner');

    }

    private function getUpdateJsonDataLeadStatus(){
    	try{
			$leadId = $this->input->get_post('leadId');
			$enableSupervisor = $this->Lms_car_model->getLeadSupervisorFlow($leadId);
			$approveStatus=NULL;
			if($enableSupervisor[0]->enableSupervisor=="n"){
				$approveStatus = "Proceed for Debit";
				//if($enableSupervisor[0]->payment_type == 'Online-Payzapp'){
					//$this->Payzappkitmodel->_callFunction($leadId);
				    //} else {
					$updateData = array(
						'lead_status'	=>$this->input->get_post('leadStatus'),
						'lead_sub_status'	=>$this->input->get_post('leadSubStatus'),
						'updated_by'    => $this->session->userdata('emp_id'),	
						'updated_on'    => date("Y-m-d G:i:s"),
						'approve_status' => $approveStatus
					);
					$this->db->set($updateData)->where('lead_id',$leadId)->update('tbl_lead');
				//}
			} else {
				$updateData = array(
					'lead_status'	=>$this->input->get_post('leadStatus'),
					'lead_sub_status'	=>$this->input->get_post('leadSubStatus'),
					'updated_by'    => $this->session->userdata('emp_id'),	
					'updated_on'    => date("Y-m-d G:i:s"),
					'approve_status' => $approveStatus
				);
				$this->db->set($updateData)->where('lead_id',$leadId)->update('tbl_lead');
			}
			if($this->db->affected_rows()>0){
				$this->Useractivity->getInsertHistory(array(
					'emp_id' => $this->session->userdata('emp_id'),
					'leadId' => $leadId,
					'type' => 3, //lead status changing,
					'leadData' => json_encode($updateData)
					));
			    $this->db->select('count(tbl_customer.cust_id) cust_id,tbl_lead.lead_application_id')->join('tbl_lead','tbl_lead.customer_id=tbl_customer.cust_id');
			    $this->db->where(array('tbl_customer.cust_phone'=>"(SELECT tbl_customer.cust_phone FROM tbl_customer INNER JOIN tbl_lead ON tbl_lead.customer_id = tbl_customer.cust_id && tbl_lead.lead_id = '".$leadId."')"),'',false);
			    $this->db->where(array('tbl_lead.line_of_business'=>"(SELECT tbl_lead.line_of_business FROM tbl_lead WHERE tbl_lead.lead_id = '".$leadId."')"),'',false);
			    $this->db->where('tbl_lead.lead_id !=', $leadId);
				$checkData = $this->db->get('tbl_customer')->row_object();
				if($checkData->cust_id>0){
					$dataReturn['leadstatus'] = true;
					$dataReturn['message'] = 'Lead with same mobile number found: '.$checkData->lead_application_id;
				} else {
					$dataReturn['leadstatus'] = false;
				}
				$dataReturn['status'] = true;
			}
			echo json_encode($dataReturn);
    	} catch(Exception $error){
    		log_message('error',"Something went wrong".__FUNCTION__.'Check the function');
    	}
    }

    public function updateLeadStausByLeadIdJson(){

    	if($_SERVER['REQUEST_METHOD'] == "POST"){
    		$this->getUpdateJsonDataLeadStatus();
    		return;
    	} else {
    		redirect(base_url());
    	}
		
    }

    public function updateLeadStausByLeadIdBySupervisorJson(){
		
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$leadId = $this->input->get_post('leadId');
			$enableSupervisor=$this->Lms_car_model->getLeadSupervisorFlow($leadId);
			/*if($enableSupervisor[0]->payment_type == 'Online-Payzapp'){
					$this->Payzappkitmodel->_callFunction($leadId);
			} else {
			
			}*/
			$updateData = array(
				'approve_status' => $this->security->xss_clean($this->input->get_post('leadStatus')),
				'updated_by' => $this->session->userdata('emp_id'),	
				'updated_on' => date("Y-m-d G:i:s"),			
			);
			$this->Lms_car_model->updateDataCommon($updateData,'tbl_lead','lead_id',$leadId);
			$this->Useractivity->getInsertHistory(array(
			'emp_id' => $this->session->userdata('emp_id'),
			'leadId' => $leadId,
			'type' => 4, //supervisor change activity lead status changing,
			'leadData' => json_encode($updateData)
			));
			echo true;

		} else {
			redirect('user');
		}
		
    }
                
    public function updateLeadPaymentStatus(){
		
		if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		$leadId = $this->input->get_post('leadId');
				$updateData = array(
					'payment_status' => 'Completed',
					'payment_details'=> $this->security->xss_clean($this->input->get_post('paymentDetails')),
					'updated_by' => $this->session->userdata('emp_id'),	
					'updated_on' => date("Y-m-d G:i:s"),
				);
				$this->Lms_car_model->updateDataCommon($updateData,'tbl_lead','lead_id',$leadId);
				
				$this->Useractivity->getInsertHistory(array(
					'emp_id' => $this->session->userdata('emp_id'),
					'leadId' => $leadId,
					'type' => 5, //supervisor change activity lead status changing,
					'leadData' => json_encode($updateData)
					));
					
				echo true;
		
		} else {
			redirect('user');
		}
		
    }

    public function lmsDownloadLeads() {

	    /*
	    if($_SERVER['REQUEST_METHOD'] == "POST"){
			$this->getleadsDashboard();
			return false;
			exit();
		}
		*/
    	if ($this->session->userdata('logged_in') == TRUE) {

    		if($_SERVER['REQUEST_METHOD'] == "POST"){
    			$config["per_page"] = 10;
				$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
				$paginationFunction = $this->bagigetleadsDashboard($config["per_page"],$page);
				$config["uri_segment"] = 2;
				//$config['reuse_query_string'] = true;
				$config['reuse_query_string'] = TRUE;
				//$config['use_page_numbers'] = true;
				
				if($this->session->userdata('user_type_abbr')=="report"){
				$config["base_url"] = base_url() . 'lms-lead-download?user_product='.$this->input->get('user_product').'&user_location='.$this->input->get('user_location').'&user_channel='.$this->input->get('user_channel').'&start_date='.$this->input->get('start_date').'&end_date='.$this->input->get('end_date').'&user_supervisor='.$this->input->get('user_supervisor').'&user_supervisor1='.$this->input->get('user_supervisor1').'&user_supervisor2='.$this->input->get('user_supervisor2');
				} else {
					$config["base_url"] = base_url() . 'lms-lead-download?user_product='.$this->input->get('user_product').'&start_date='.$this->input->get('start_date').'&end_date='.$this->input->get('end_date');

				}
				$config["total_rows"] = $paginationFunction['numRows'];
		        $config['full_tag_open'] = '<div style="text-align:right;"><ul class="pagination pagination-small pagination-centered">';
				$config['full_tag_close'] = '</ul></div>';
				$config['num_tag_open'] = '<li class="page-item">';
		        $config['num_tag_close'] = '</li>';
		        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		        $config['cur_tag_close'] = '</a></li>';
		        $config['next_tag_open'] = '<li class="page-item">';
		        $config['next_tagl_close'] = '</a></li>';
		        $config['prev_tag_open'] = '<li class="page-item">';
		        $config['prev_tagl_close'] = '</li>';
		        $config['first_tag_open'] = '<li class="page-item disabled">';
		        $config['first_tagl_close'] = '</li>';
		        $config['last_tag_open'] = '<li class="page-item">';
		        $config['last_tagl_close'] = '</a></li>';
		        $config['attributes'] = array('class' => 'page-link');
		        $config['suffix'] = '?' . http_build_query($_GET, '', "&");
		        $config['first_url'] = $config['base_url'];
		        $config['display_pages'] = TRUE;
		        $this->pagination->initialize($config);
		        $this->data["links"] = $this->pagination->create_links();
		        $this->data['leadData'] = $paginationFunction['numrowsData'];
		        $this->data["total_rows"] = $paginationFunction['numRows'];
		        echo json_encode($this->data);
		        die();
    		}
			/***** Login User Location Info ****/
			$this->db->select('user_location,Channel,supervisor_id');
			$this->db->where('emp_id',$this->session->userdata('emp_id'));
			$userInfo = $this->db->limit(1)->get('tbl_users')->row_object();
			$supervisExplode = $userInfo->supervisor_id;

		    $this->data['module'] = 'leads'; 
			$this->data['sub_module'] = 'Car';
			$this->data['title']="Lead List"; 
			$this->data['loginCity'] = $userInfo->user_location;
			$this->data['channel'] = $userInfo->Channel;

			$query = $this->db->order_by('prdt_m_name','ASC')->get('tbl_product_master');
	        $productMasterArray = array(); 
	        foreach($query->result() as $reg){
	            $productMasterArray[] = array(
	                'prdt_m_id'=>$reg->prdt_m_id,
	                'prdt_m_name'=>$reg->prdt_m_name,
	                'prdt_m_shot_name'=>$reg->prdt_m_shot_name,
	                'prdt_m_desc'=>$reg->prdt_m_desc,
	            );
	        }

			$this->data['catProducts'] = $productMasterArray; //$this->Backend_model->getProductMasterDetails();
			$this->data['supervisor'] = explode(',', $supervisExplode);
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('lms_view/lms_download_lead',$this->data);
			$this->load->view('layout/footer_inner');
		} else {
			redirect('user');
		}
    }

    public function regenerateLeadById(){

		if ($this->session->userdata('logged_in') == TRUE) {

			$leadId = $this->uri->segment(2);

			$this->data['leadId'] = $leadId;
			$this->session->set_userdata('leadId', $leadId, true);
			$productTypeArray = $this->Lms_car_model->getLeadProductTypeByLeadID($leadId);
			$editProductType = $productTypeArray[0]->product_type;

			$lmsEditApplicationId = $productTypeArray[0]->lead_application_id;
			$lmsEditCustId = $productTypeArray[0]->customer_id;
			$this->data['member_details'] = $this->Lms_car_model->getMemberDetailsByLeadId($leadId);
		
			$leadData = array(
				'lmsEditLeadId' => $leadId,
				'lmsEditCustId' => $lmsEditCustId,
				'lmsEditApplicationId'=>$lmsEditApplicationId,
			);

			$this->session->set_userdata($leadData);

			$this->data['city'] = $this->Common_model->getCityList();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();
			$this->data['stateArray'] = $this->Common_model->getStateList();
            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['PriorityArray'] = $this->Common_model->getPriority();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['occupationlistArray'] = $this->Common_model->getoccupation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['languageArray'] = $this->Common_model->language();
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();
            
            $this->data['sdateArray'] = $this->Common_model->sdate();
     		$this->data['businessArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();
            $this->data['module'] = 'leads'; 
			$this->data['sub_module'] = $editProductType.' - Regenerate'; 
			$this->data['editProductType'] = $editProductType;
			$this->data['userDetails'] = $this->User_model->getLoginDetails();
			$leadDatainfo = $this->Lms_car_model->getLeadDetailsByLeadId($leadId);
			$this->data['lead_details'] = $leadDatainfo[0];

			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner_edit',$this->data);
			$this->data['comment_details'] = $this->Lms_car_model->getCommentsByLeadId($leadId);
			
			$this->data['valuables_details'] = $this->Lms_car_model->getValuableDetailsByLeadId($leadId);
			$this->data['PEEI_details'] = $this->Lms_car_model->getPEEIDetailsByLeadId($leadId);
			$this->data['pre_claim_details'] = $this->Lms_car_model->getPreClaimDetailsByLeadId($leadId);
			$thiswheelquote = $this->db->select('quote_orderNum,quote_QuoteNum,lead_policy_number,vehicle_details_req,lead_policy_bagi_transaction_number,lead_transaction_number')->where(array('quote_lead_sno'=>$leadId,'quote_status'=>1))->limit(1)->order_by('quote_sno','DESC')->get('tbl_vehicle_quote_details');
	
			$this->data['quoteData'] = $thiswheelquote->row_object();
			$this->data['uppData'] = $this->db->where('upp_lead_id',$leadId)->get('tbl_upp_logn_term_policy_details')->row_object();

			switch ($editProductType) {
				case 'Car':
				case 'Two Wheeler':
					$this->load->view('lms_view/lms_create_two_wheeler',$this->data);
					break;
				case 'Home':
					$this->load->view('lms_view/edit_lms_home',$this->data);
					break;
				case 'Health':
					$this->load->view('lms_view/edit_lms_health',$this->data);
					break;						
				case 'Super Ship':
					$this->load->view('lms_view/edit_lms_super_ship',$this->data);
					break;
				case 'Critical Illnes':
					$this->load->view('lms_view/edit_lms_critical_illnes',$this->data);
					break;
				case 'Personal Accident':
					$this->load->view('lms_view/edit_lms_PA',$this->data);
					break;
				case 'Travel':
					$this->load->view('lms_view/edit_lms_ravel',$this->data);
					break;	
					case 'Shop':
				 	$this->load->view('lms_view/edit_lms_shop',$this->data);
				 	break;				
				case 'Combo':
					$this->load->view('lms_view/edit_lms_combo',$this->data);
					break;		
				case 'Office':
			    	$this->load->view('lms_view/edit_lms_office',$this->data);
					break;
				case 'Bundle PA':
					$this->load->view('lms_view/lms_create_pa_bundle',$this->data);
					break;

				case 'UPP LONG TERM':
					$this->load->view('lms_view/lms_create_pl_bl',$this->data);
					break;												
				default:

					# code...
					break;
			}
			
			
			$this->load->view('layout/footer_inner');

		} else {
			redirect('user');
		}

    }

    public function lmsGetLeadDetailsByJson() {
    	$leadId = $this->input->get_post('leadId');
    	$leadDetails = $this->Lms_car_model->getLeadDetailsByLeadIdforEdit($leadId);
    	echo json_encode($leadDetails);
    }

    public function lmsUpdateCustomerDetails(){



        $lmsEditLeadId	= $this->input->get_post('lms_edit_lead_id');   
        $lmsEditCustId	= $this->input->get_post('lms_edit_customer_id');
        $lmsEditApplicationId	= $this->input->get_post('lms_edit_application_id');
        $leadData = array(
			'lmsEditLeadId' => $lmsEditLeadId,
			'lmsEditCustId' => $lmsEditCustId,
			'lmsEditApplicationId'=>$lmsEditApplicationId,
		);
		$this->session->set_userdata($leadData);        
		/*$emiYears ="";
		if($this->input->get_post('lms_cus_emi') == "No"){
				$emiYears=$this->input->get_post('lms_cus_emi_yr') = '';
		}*/
		
		$cusUpdateData = array(
			'cus_title' 	=> $this->security->xss_clean($this->input->get_post('lms_car_salut')),
			'first_name'	=> $this->security->xss_clean($this->input->get_post('lms_car_fname')),
			'last_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_lname')),
			'date_of_birth'	=> $this->security->xss_clean($this->input->get_post('lms_car_dob')),
			'cust_gender' 	=> $this->security->xss_clean($this->input->get_post('lms_car_gender')),
			'cust_age'      => $this->security->xss_clean($this->input->get_post('lms_car_age')),
			'cust_pan' 		=> $this->security->xss_clean($this->input->get_post('lms_car_pan')),
			'cust_street1' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add1')),
			'cust_street2' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add2')),
			'cust_area' 	=> $this->security->xss_clean($this->input->get_post('lms_car_area')),
			'cust_zip' 		=> $this->security->xss_clean($this->input->get_post('lms_car_zip')),
			'cust_state' 	=> $this->security->xss_clean($this->input->get_post('lms_car_state')),
			'cust_city' 	=> $this->security->xss_clean($this->input->get_post('lms_car_city')),
			'cust_email' 	=> $this->security->xss_clean($this->input->get_post('lms_car_email')),
			'cust_phone' 	=> $this->security->xss_clean($this->input->get_post('lms_car_mobile')),
			'cust_type' 	=> $this->security->xss_clean($this->input->get_post('lms_car_cus_type')),
			'cust_landmark' => $this->security->xss_clean($this->input->get_post('lms_car_pro_landmark')),
 			'marital_status'		 => $this->security->xss_clean($this->input->get_post('lms_car_pro_marital')),
			'occupation'			 => $this->security->xss_clean($this->input->get_post('lms_car_pro_occupation')),
			'cust_house_number'			 => $this->security->xss_clean($this->input->get_post('lms_house_number')),
			'emergency_contact_num'  => $this->security->xss_clean($this->input->get_post('lms_car_pro_emergency')),
			'GSTIN'					 => $this->security->xss_clean($this->input->get_post('lms_car_pro_gstn')),
			'cus_customer' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_customer')),
			'cus_language' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_language')),
			'cus_emi' 			=> $this->security->xss_clean($this->input->get_post('lms_cus_emi')),
			'cus_emi_yr' 		=> $this->security->xss_clean($this->input->get_post('lms_cus_emi_yr')),
			'processing_fee	'	=> $this->security->xss_clean($this->input->get_post('lms_cus_pfee')),
 			'cus_cardlimt'		=> $this->security->xss_clean($this->input->get_post('lms_cus_cardlimt')),
			'statement_date'	=> $this->security->xss_clean($this->input->get_post('lms_cus_sdate')),
			'temp_LE'           => $this->security->xss_clean($this->input->get_post('lms_cus_tle')),
			'business_type'	    => $this->security->xss_clean($this->input->get_post('lms_cus_tbusins')),
			'cust_type'	    => $this->security->xss_clean($this->input->get_post('lms_cus_type'))
		);

		
		
    	$this->Lms_car_model->updateDataCommon($cusUpdateData,'tbl_customer','cust_id',$lmsEditCustId);

		$leadUpdateData = array(
			'category'=> $this->input->get_post('lms_car_category'),
			'line_of_business'=> $this->input->get_post('lms_car_line_of_business'),
			//'HDFC_branch_loc'=> $this->input->get_post('lms_car_hdfc_branch_location'),
			//'HDFC_ergo_loc' => $this->input->get_post('lms_car_hdfc_ergo_location'), 
			'priority' => $this->input->get_post('lms_car_sub_channel'),
			'target_date' => $this->input->get_post('lms_car_target_date'),
			'TSE_BDR_code' => $this->input->get_post('lms_car_tse_bar_code'),
			'TL_code' => $this->input->get_post('lms_car_tl_code'),
			'SM_code' => $this->input->get_post('lms_car_sm_code'),
			'bank_verifier_id'=> $this->input->get_post('lms_car_bank_verify_id'),
			'case_id' => $this->input->get_post('lms_car_case_id'),
			'payment_type' => $this->input->get_post('lms_car_payment_type'),
			'vision_address'=>$this->input->get_post('lms_car_vision_address'),
			'sub_channel' =>$this->input->get_post('lms_car_campaign_name'),
			'HDFC_card_relationship_no' => $this->input->get_post('lms_car_hdfc_card_relno'),
			'HDFC_card_last_4_digits' => $this->input->get_post('lms_car_hdfc_card_4digt'),
			'lead_details'=>$this->input->get_post('lms_car_deatil_lead'),
			'aaa_number'=>$this->input->get_post('lms_aaa_number'),
			'created_by'=> $this->session->userdata('emp_id'),
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'  => $this->session->userdata('emp_id'),	
			'updated_on' => date('Y-m-d G:i:s')
		);
		
		$leadId = $this->Lms_car_model->updateDataCommon($leadUpdateData,'tbl_lead','lead_id',$lmsEditLeadId);
		
		if(isset($leadId)){
			echo "success";
		} else{
		   echo "false";
		}
		
    }

    public function lmsUpdateProductDetails(){
		$statusData = array(
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'updated_by'        => $this->session->userdata('emp_id'),	
			//'updated_on'        => date("Y-m-d G:i:s"),
			
		);
		$lead_id = $this->session->userdata('lmsEditLeadId');
	    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);
    	
    		
		$productUpdateData = array(
			//'customer_id'  	 	=>$this->session->userdata('customerId'),
			//'lead_id' 	   	    =>$this->session->userdata('leadId'),
			'product_type'		=>  $this->input->get_post('product_type'),
			'pre_insurance' 	=> "star",
			'reg_number'		=> $this->input->get_post('lms_car_reg_no'),
			'manufacture_year' 	=> $this->input->get_post('lms_car_manufacture_year'),
			'manufacturer' 		=> $this->input->get_post('lms_car_manufacturer'),
			'model_varient' 	=> $this->input->get_post('lms_car_variant'),
			'registration_city' => $this->input->get_post('lms_car_reg_city'),
			'policy_expire_date'=> $this->input->get_post('lms_car_policy_exp_date'),
			'IDV_value' 		=> $this->input->get_post('lms_car_idv'),
			'show_room_value' 	=> $this->input->get_post('caramount'),
			'expiring_policy_claim'=> $this->input->get_post('lms_car_claim_policy'),
			'expiring_policy_NCB'  => $this->input->get_post('lms_car_ncb'),
			'lms_premium' 		 => $this->input->get_post('lms_premium'),
			//'created_by'        => $this->session->userdata('emp_id'),
		);

		//$productId = $this->Lms_car_model->insertDataCommon($productData,'tbl_product');
		$lmsEditProductId =  $this->input->get_post('lms_edit_product_id');
		$productId = $this->Lms_car_model->updateDataCommon($productUpdateData,'tbl_product','product_id',$lmsEditProductId);
		

		if(isset($productId)){
			echo "success";
		} else{
		   echo "false";
		}


    }

		public function lmsUpdateProposalDetails(){

			$statusData = array(
				'lead_status'=>"Lead Generated",
				'lead_re_status' => "Sales Open",
				'updated_by'        => $this->session->userdata('emp_id'),	
				//'updated_on'        => date("Y-m-d G:i:s"),				
			);
			$lead_id = $this->session->userdata('lmsEditLeadId');
			$thisDetetials = $this->Lms_car_model->getLeadProductTypeByLeadID($lead_id);
		    $leadUpdate = $this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);
			$proposalUpdateData = array(
				//'customer_id'  	 	=>$this->session->userdata('customerId'),
				//'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'existing_insure'		=> $this->input->get_post('lms_car_prop_existing_insure'),
				'existing_policy_num' 	=> $this->input->get_post('lms_car_pro_existing_policynum'),
				'existing_policy_expiry'	=> $this->input->get_post('lms_car_pro_existing_policy_expiry'),
				'new_policy_start' 			=> $this->input->get_post('lms_car_pro_policy_start'),
				'prop_mtr_reg_date' 		=> $this->input->get_post('lms_car_pro_regis_date'),
				'prop_mtr_engine_num' 		=> $this->input->get_post('lms_car_pro_engine_num'),
				'prop_mtr_chasis_num'		=> $this->input->get_post('lms_car_pro_chasis_num'),
				'prop_mtr_financed' 		=> $this->input->get_post('lms_car_pro_financed'),

				'prop_mtr_fin_ins_name' 		=> $this->input->get_post('lms_car_pro_fin_ins_name'),
				'prop_mtr_fin_ins_city' 		=> $this->input->get_post('lms_car_pro_fin_ins_city'),
				'prop_mtr_prev_stand_alone' 	=> $this->input->get_post('prop_mtr_prev_stand_alone'),
				'prop_mtr_prev_prev_depre' 		=> $this->input->get_post('prop_mtr_prev_prev_depre'),
				'prop_mtr_prev_prev_electric' 	=> $this->input->get_post('prop_mtr_prev_prev_electric'),
				'prop_mtr_prev_prev_cng_lpg' 	=> $this->input->get_post('prop_mtr_prev_prev_cng_lpg'),


			);
			$lmsEditProposalId =  $this->input->get_post('lms_edit_proposal_id');
			$this->Lms_car_model->updateDataCommon($proposalUpdateData,'tbl_propsal','propsal_id',$lmsEditProposalId);
			
			//$proposalId = $this->Lms_car_model->insertDataCommon($proposalData,'tbl_propsal');

			$nomineeupdateData = array(
				//'customer_id'  	 	=>$this->session->userdata('customerId'),
				//'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'nominee_name'		=> $this->input->get_post('lms_car_pro_nname'),
				'nominee_age' 	=> $this->input->get_post('lms_car_pro_nage'),
				'nominee_relationship'		=> $this->input->get_post('lms_car_pro_nomie_relation'),
				'appointee_name' 	=> $this->input->get_post('lms_car_pro_nameofappoint'),
				'appointee_relationship' 		=> $this->input->get_post('lms_car_pro_appoint_relation'),
			);

			//$nomineeId = $this->Lms_car_model->insertDataCommon($nomineeData,'tbl_nominee');
			$lmsEditNomineeId =  $this->input->get_post('lms_edit_nominee_id');
			$this->Lms_car_model->updateDataCommon($nomineeupdateData,'tbl_nominee','nominee_id',$lmsEditNomineeId);


			$driverUpdateData = array(
				//'customer_id'  	 	=>$this->session->userdata('customerId'),
				//'lead_id' 	   	    =>$this->session->userdata('leadId'),
				'driving_exp'		=> $this->input->get_post('lms_car_pro_drive'),
				'night_parking' 	=> $this->input->get_post('lms_car_pro_parking'),
				'driver_count'		=> $this->input->get_post('lms_car_pro_who_drive'),
				'KM_per_year'   	=> $this->input->get_post('lms_car_pro_kms'),
				'young_driver_age' => $this->input->get_post('lms_car_pro_ydage'),
				'ext_driver' 		=> $this->input->get_post('lms_lms_car_pro_driver'),
			);

			//$driverId = $this->Lms_car_model->insertDataCommon($driverData,'tbl_driving_habits');
			$lmsEditDrhabitId =  $this->input->get_post('lms_edit_drhabit_id');
			$this->Lms_car_model->updateDataCommon($driverUpdateData,'tbl_driving_habits','habits_id',$lmsEditDrhabitId);	


		   $proupData = array(
			    
				'pre_insurance' 	=> $this->input->get_post('lms_car_prop_existing_insure'),
			);
	   		$customerId = $this->session->userdata('lmsEditCustId');
	   		$pupdate= $this->Lms_car_model->updateDataCommon($proupData,'tbl_product','customer_id',$customerId);

		   $statusData = array(
			    'lead_status'	=> 'Lead Generated',
				'updated_by'        => $this->session->userdata('emp_id'),	
				//'updated_on'        => date("Y-m-d G:i:s"),			    
			);
	   		$lead_id = $this->session->userdata('lmsEditLeadId');
	   		$this->Lms_car_model->updateDataCommon($statusData,'tbl_lead','lead_id',$lead_id);

	   		if($this->input->get_post('lms_car_comment') != ''){

				$commentData = array(
					'comment'	=> $this->input->get_post('lms_car_comment'),
					'lead_id'	=> $this->session->userdata('lmsEditLeadId'),
					'status'  	=> '1',
					'created_on' => $this->session->userdata('emp_id'),
					'created_by' => date("Y-m-d G:i:s")
				);
				$commentId = $this->Lms_car_model->insertDataCommon($commentData,'tbl_comments');
			}	
			if(isset($pupdate)){
				echo $thisDetetials[0]->lead_application_id;
				//echo $this->session->userdata('lmsEditApplicationId').date("Y-m-d G:i:s");
			} else{
		   		echo $thisDetetials[0]->lead_application_id;
				//echo "false";
			}

		}

		public function createXLS() {

		if(empty($_POST)){
				redirect(base_url('user'));
				die();
		}

    	if($this->session->userdata('user_type_abbr')=="report"){
    		$data = $this->Lms_car_model->getLeadsForExcelReport();
		} else {
    		$data = $this->Lms_car_model->getLeadsForExcel();
    	}

    	$postData = $this->input->post();
        $fileName = 'data-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
     
			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead No');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Lead Registered Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lead Registered Time');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Last Modified Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Last Modified Time');
			if($this->session->userdata('user_type_abbr') == "hdfc_ops"){
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Customer Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Last Name');
			//Relationship with Insured
			} else {
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'First Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Last Name');	
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Mobile No');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Email');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'PinCode');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Address1');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Address2');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Address3');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'City');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'State');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'HDFCRelation_no/ReferenceNo');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'HDFCCardNo/CustomerID');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'LGCode');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Product');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Plan');
			$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Business Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Premium');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'SumInsured');
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'EMI');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'EMIYr');
		    $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Lead_Added_By');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'TeamLeaderCode');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Channel');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'RenewalNo');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'RenewalDone');
			$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'AutoRenewal');
			$objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'AutoDebit');
			$objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'CaseNumber');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'ProcessingFee');
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'BankVerifierID');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'IsDailyCampaign');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'IsOtherCampaign');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Sub Channel');
			if ($this->session->userdata('user_type_abbr')=="hdfc_ops") {
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Lead Status');
			} else{
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Lead Current Status');
		    $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Lead Current Sub Status'); 
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Reject Comments');
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Reject Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'AAN');
			$objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'User Location');
			
			if($postData['product'] == 'Two Wheeler'){
						$objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Policy Number');
			}

			//$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Customer Name');
			//$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Relationship with Insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Policy number');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Policy Start Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Policy End Date');
			if($this->session->userdata('user_type_abbr')!="hdfc_ops"){
			$objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'Customer Name');
			//$objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Relationship with Insured');
			}
			//$objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Customer Name');
			//$objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'Last name');

        $rowCount = 2;
        $i = 1;
        foreach ($data as $element) {

			$leadUpdateData = array(
				'lead_status'		=> 'Downloaded for Authorizatrion',
				'updated_by'        => $this->session->userdata('emp_id'),	
				'updated_on'        => date("Y-m-d G:i:s"),
			);

			if($this->session->userdata('user_type_abbr') == 'hdfc_ops'){
				
				$this->Useractivity->getInsertHistory(array(
					'emp_id' => $this->session->userdata('emp_id'),
					'leadId' => $element->lead_id,
					'type' => 11, //lead status changing,
					'leadData' => json_encode($leadUpdateData)
					));
					
				$this->Lms_car_model->updateDataCommon($leadUpdateData,'tbl_lead','lead_application_id',$element->lead_application_id);
			}

			$policyNumber = $this->db->select('lead_policy_number')->where(array('quote_lead_sno'=>$element->lead_id,'quote_type'=>2,'quote_status'=>1))->limit(1)->get('tbl_vehicle_quote_details')->row_object();
			
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->lead_application_id);
			
			$dateRegister = strtotime($element->c_on);
			$resisterdDate = date('Y-m-d',$dateRegister);
			
			$resisterdTime = date('G:i:s',strtotime($element->c_on));
			
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $resisterdDate);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $resisterdTime);

			$modifiedDate = date('Y-m-d',strtotime($element->u_on));
			$modifiedTime = date('G:i:s',strtotime($element->u_on));			

			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $modifiedDate);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $modifiedTime);
			$relationName = arealationshiofunction();
			$relationDummdata = $relationName[$element->cus_relation_ishued];
			//$element->cus_card_name $element->first_name.' '.$element->last_name
			if($this->session->userdata('user_type_abbr')=="hdfc_ops"){
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->cus_card_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, '');
			} else {
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->first_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->last_name);
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->cust_phone);
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->cust_email);
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_zip);
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_street1);
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_street2);
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->cust_area);
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->cust_city);
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->cust_state);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->HDFC_card_relationship_no);
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->HDFC_card_last_4_digits);
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->TSE_BDR_code); 
			//'LGCode'
			//$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, '');//LGName
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->product_type);
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->sum_insured);//Plan
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->business_type);
			if($element->product_type == "UPP LONG TERM"){
			$thisuppData = $this->db->where('upp_lead_id',$element->lead_id)->get('tbl_upp_logn_term_policy_details')->row_object();
			$loantype = $thisuppData->upp_plan_type;
			$planamount = $thisuppData->upp_plan_amount;
			$upp_all_json_details = json_decode($thisuppData->upp_all_json_details);
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $thisuppData->upp_premioum_amount);
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $thisuppData->upp_plan_amount);
			} else {
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->lms_premium);
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->sum_insured);//SumInsured
			}
			
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->cus_emi);
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->cus_emi_yr);
			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element->emp_code); //Lead_Added_By
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $element->category); //Channel as Category
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, '');//RenewalNo
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, '');//RenewalDone
			$objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, '');//AutoRenewal
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, '');//AutoDebit
			$objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $element->case_id);//'CaseNumber'
			$objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $element->processing_fee);//'ProcessingFee'
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, $element->bank_verifier_id); //'BankVerifierID'
			$objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, '');//IsDailyCampaign
			$objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, ''); //IsOtherCampaign
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->sub_channel);//Campaign_Name
			
			if ($this->session->userdata('user_type_abbr')=="hdfc_ops") {
				$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->approve_status);
				
			} else{
				$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->lead_status);//'Lead Current Status'
			    $objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, ($element->lead_sub_status != 'Sales Closed CC' ? $element->lead_sub_status : 'Proceed for Debit')); //'Lead Current Sub Status'
			}

			
			$objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, $element->reject_comments);//Reject Comments
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, $element->reject_code);//Reject Code

            $objPHPExcel->getActiveSheet()->setCellValueExplicit('AR' . $rowCount, $element->aaa_number,PHPExcel_Cell_DataType::TYPE_STRING);
			//$objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, $element->aaa_number);//'Alternate AccountNo'

			$objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, $element->user_location);
			if($postData['product'] == 'Two Wheeler'){
			$objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, $policyNumber->lead_policy_number);
			}

			/*$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $element->cus_card_name);
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $relationDummdata);*/

			$tblpolicydetailstable = $this->db->select('policy_number,policy_start_date,policy_end_date')->where(array('policy_lead_no'=>$element->lead_id))->order_by('policy_sno','DESC')->limit(1)->get('tbl_policy_details_table')->row_object();

			$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $tblpolicydetailstable->policy_number);

			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $tblpolicydetailstable->policy_start_date);

			$objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, $tblpolicydetailstable->policy_end_date);
			
			if($this->session->userdata('user_type_abbr')!="hdfc_ops"){
			//$element->cus_card_name $element->first_name.' '.$element->last_name
			$objPHPExcel->getActiveSheet()->SetCellValue('AX' . $rowCount, $element->cus_card_name);
			//$objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, '');
			}
            $rowCount++;
            $i++;
      }

      if($this->session->userdata('user_type_abbr')=="lead data" && ($_POST['product']) == "UPP Long Term") {

	      	if($this->session->userdata('user_type_abbr')=="report"){
	    		$data = $this->Lms_car_model->getLeadsForExcelReport();
			} else {
	    		$data = $this->Lms_car_model->getLeadsForExcel();
	    	}

			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead No');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Lead Registered Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lead Registered Time');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Category');

			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Lead Status');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Salutation');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'First Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Last Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Mobile Number');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Email');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gender');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Customer DOB');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Customer Age');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Marital Status');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Address1');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Address2');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Area');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'House & Street No');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'City');
			$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'State');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Zipcode');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Customer Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Alternate Mobile Number');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Pan Number');
		    $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Occupation');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'EMI');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'EMI Years');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sub Channel');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Case Id');
			$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'HDFCRelation_no/ReferenceNo');

			$objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'HDFCCardNo/CustomerID');
			$objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'TL Code/DSACode');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'SM Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Bank Verifier');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Payment Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Lead Details');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Right time to contact the Customer');
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Language');
		    $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Processing Fee Applicable'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Statement Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Temp LE');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Type of Business');
			$objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Target Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'TES/BDR Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'GSTIN');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'AAN No');
			$objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Proposed Policy Start Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'User Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'User Location');
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Supervisor Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'Nominee Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Nominee Age');
			$objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Nominee Relationship');
			$objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Appointee Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Appointee Relationship of Nominee');
			$objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Comment');
			$objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Customer Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Customer Relationship');
			$objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'Loan Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'Tenure');
			$objPHPExcel->getActiveSheet()->SetCellValue('BK1', 'Loan Amount(Rs)');
			$objPHPExcel->getActiveSheet()->SetCellValue('BL1', 'Loan Tenure(Yrs)');
			$objPHPExcel->getActiveSheet()->SetCellValue('BM1', 'PA Sum Insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('BN1', 'Accidental Hospitalization Sum Insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('BO1', 'Credit Shield Sum insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('BP1', 'Critical Illness Sum insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'Premium w/o GST');
			$objPHPExcel->getActiveSheet()->SetCellValue('BR1', 'GST');
			$objPHPExcel->getActiveSheet()->SetCellValue('BS1', 'Total Premium');

			 $rowCount = 2;
	        $i = 1;
	        foreach ($data as $element) {

			$leadUpdateData = array(
				'lead_status'		=> 'Downloaded for Authorizatrion',
				'updated_by'        => $this->session->userdata('emp_id'),	
				'updated_on'        => date("Y-m-d G:i:s"),
			);

			if($this->session->userdata('user_type_abbr') == 'hdfc_ops'){
				
				$this->Useractivity->getInsertHistory(array(
					'emp_id' => $this->session->userdata('emp_id'),
					'leadId' => $element->lead_id,
					'type' => 11, //lead status changing,
					'leadData' => json_encode($leadUpdateData)
					));
					
				$this->Lms_car_model->updateDataCommon($leadUpdateData,'tbl_lead','lead_application_id',$element->lead_application_id);
			}

			$policyNumber = $this->db->select('lead_policy_number')->where(array('quote_lead_sno'=>$element->lead_id,'quote_type'=>2,'quote_status'=>1))->limit(1)->get('tbl_vehicle_quote_details')->row_object();
			
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->lead_application_id);
			
			$dateRegister = strtotime($element->c_on);
			$resisterdDate = date('Y-m-d',$dateRegister);
			
			$resisterdTime = date('G:i:s',strtotime($element->c_on));
			
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $resisterdDate);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $resisterdTime);

			$modifiedDate = date('Y-m-d',strtotime($element->u_on));
			$modifiedTime = date('G:i:s',strtotime($element->u_on));			

			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'UPP Long Term');
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->category);
			$relationName = arealationshiofunction();
			$relationDummdata = $relationName[$element->cus_relation_ishued];
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->lead_status);
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->cus_title);
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->first_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->last_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_phone);
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_email);
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_gender);
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->date_of_birth);
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->cust_age);
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->marital_status);
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->cust_street1);
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->cust_street2);
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->cust_area); 
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->cust_street3);
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->cust_city);//Plan
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->cust_state);
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->cust_zip);
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->cust_type);//SumInsured
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->emergency_contact_num);
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->cust_pan);
			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element->occupation); //Lead_Added_By
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element->cus_emi); //Lead_Added_By
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $element->cus_emi_yr); //Channel as Category
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->sub_channel);//RenewalNo
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->case_id); // Sub Channe//RlenewalDone
			$objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $element->HDFC_card_relationship_no);//AutoRenewal
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $element->HDFC_card_last_4_digits);//AutoDebit
			$objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $element->TSE_BDR_code);//'CaseNumber'
			$objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $element->SM_code);//'ProcessingFee'
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, $element->bank_verifier_id); //'BankVerifierID'
			$objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $element->payment_type);//IsDailyCampaign
			$objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $element->lead_details); //IsOtherCampaign
			$objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->cus_customer);//Campaign_Name
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->cus_language);//'Lead Current Status'
			$objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, $element->processing_fee);

			$objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, $element->statement_date);//Reject Comments
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, $element->temp_LE);//Reject Code

            $objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, $element->business_type);

			$objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, $element->target_date);
			$objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, $element->TSE_BDR_code);

			$tblpolicydetailstable = $this->db->select('policy_number,policy_start_date,policy_end_date')->where(array('policy_lead_no'=>$element->lead_id))->order_by('policy_sno','DESC')->limit(1)->get('tbl_policy_details_table')->row_object();

			$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $element->GSTIN);

			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->aaa_number);

			$objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, 'Proposed Policy Start Date');

			$thisuppData = $this->db->where('upp_lead_id',$element->lead_id)->get('tbl_upp_logn_term_policy_details')->row_object();
			$loantype = $thisuppData->upp_plan_type;
			$planamount = $thisuppData->upp_plan_amount;
			$upp_all_json_details = json_decode($thisuppData->upp_all_json_details); 
			if($loantype == 1){

			if($planamount < 100000){
			$selectedType = 1;
			} else if($planamount >= 100000){
				$selectedType = 2;
			}

			}

			if($loantype == 2){
		
				if($planamount < 100000){
					$selectedType = 1;
				} else if($planamount >= 100000 && $planamount <= 300000){
					$selectedType = 2;
				} else if($planamount > 300000 && $planamount <= 1500000){
					$selectedType = 3;
				}

			}

			$tenureDat = getupplongterm();

			$objPHPExcel->getActiveSheet()->SetCellValue('AX' . $rowCount, '');
			$objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, '');
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, '');
			$objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, $element->nominee_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, $element->nominee_age);
			$objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, $element->nominee_relationship);
			$objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, $element->appointee_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, $element->appointee_relationship);
			$objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, $element->reject_comments);
			$objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, '');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, '');
			$objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, ($thisuppData->upp_plan_type == '1' ? 'Personal' : 'Business'));
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, $tenureDat[$thisuppData->upp_tenure]);
			$objPHPExcel->getActiveSheet()->SetCellValue('BK' . $rowCount, $thisuppData->upp_plan_amount);
			$objPHPExcel->getActiveSheet()->SetCellValue('BL' . $rowCount, $thisuppData->upp_tenure);
			$objPHPExcel->getActiveSheet()->SetCellValue('BM' . $rowCount, $upp_all_json_details->peraccpremium);
			$objPHPExcel->getActiveSheet()->SetCellValue('BN' . $rowCount, $upp_all_json_details->accdentalhospremium);
			$objPHPExcel->getActiveSheet()->SetCellValue('BO' . $rowCount, $upp_all_json_details->creditshildpremium);
			$objPHPExcel->getActiveSheet()->SetCellValue('BP' . $rowCount, $upp_all_json_details->criticalpremium);
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ' . $rowCount, $upp_all_json_details->premiungstnocal);
			$objPHPExcel->getActiveSheet()->SetCellValue('BR' . $rowCount, $upp_all_json_details->premiumgstcal);
			$objPHPExcel->getActiveSheet()->SetCellValue('BS' . $rowCount, round($upp_all_json_details->finaltotalpremium));
            $rowCount++;
            $i++;
      }

      }


     if($this->session->userdata('user_type_abbr')=="lead data" && ($_POST['product']) == "Combo") {
    		
    		$data = $this->Lms_car_model->getLeadsForExcelPA();
    	
    	$fileName = 'Combo-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead No');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Lead Registered Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lead Registered Time');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product');
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Category');
            $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Lead Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Salutation');
            $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Email');
            $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Customer DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Customer Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Marital Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Address1');
            $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Address2');
            $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Area');
            $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'House & Street No');
            $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'City');
            $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'State');
            $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Zipcode');
            $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Customer Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Alternate Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Pan Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'EMI');
            $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'EMI Years');
            $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sum Insured');
            $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Premium');
            $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Sub Channel');
            $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Case Id ');
            $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'HDFCRelation_no/ReferenceNo');
            $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'HDFCCardNo/CustomerID');
            $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'TL Code/DSACode');
            $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'SM Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Bank Verifier');
            $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Payment Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Lead Details');
            $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Right time to contact the Customer');
            $objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Language');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Processing Fee Applicable');
            $objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Statement Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Temp LE');
            $objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Type of Business');
            $objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Target Date');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'TES/BDR Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'GSTIN');
            $objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'AAN No');

            $objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Proposed Policy Start Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'User Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'User Location');
            $objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Supervisor Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Nominee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Nominee Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Nominee Relationship');
            $objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Appointee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Appointee Relationship of Nominee');
            $objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Comment');
            $objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'Customer Name');
			//$objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'Relationship with Insured');*/
        $rowCount = 2;
        $i = 1;
        foreach ($data as $element) {

        if(!empty($element->createdon)){
         $dateRegister = strtotime($element->createdon);
		$resisterdDate = date('Y-m-d',$dateRegister);
		$resisterdTime = date('G:i:s',strtotime($element->createdon));
        } else {
        	$resisterdDate = "";
        }
		
		if($element->payment_type == 'Credit Card' && $element->cus_emi == 'Yes'){
			
			$cusemicheck = $element->cus_emi;
			$cusemiyear = $element->cus_emi_yr;
			
		} else {
			
			$cusemicheck = $element->cus_emi;
			$cusemiyear = '';
			
		}

		$suername = $this->db->query("SELECT GROUP_CONCAT(user_name) supername FROM `tbl_users` WHERE FIND_IN_SET( emp_id,(SELECT history_user_id FROM tbl_user_activity_history WHERE history_lead_id = '".$element->leadid."' && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1))")->row_object();
                        
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->lead_application_id);
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $resisterdDate);
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $resisterdTime);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->product_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->category);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->lead_status);
         $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->cus_title);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_phone);
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_email);
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->date_of_birth);
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->cust_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->marital_status);
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->cust_street1);
        $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->cust_street2);
        $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->cust_area); 
        $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->cust_house_number);
        $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->cust_city);
        $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->cust_state);
        $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->cust_zip);//
        $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->cust_type);    
        $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->emergency_contact_num);
        $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->cust_pan);
        $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element->occupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $cusemicheck); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $cusemiyear);
        $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->sum_insured);
        $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->lms_premium);
        $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $element->sub_channel );
        $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $element->case_id ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $element->HDFC_card_relationship_no);
        $objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $element->HDFC_card_last_4_digits);
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount,  $element->TL_code );
        $objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $element->SM_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $element->bank_verifier_id);
        $objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->payment_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->lead_details ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, $element->cus_customer);
        $objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, $element->cus_language);
        $objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, $element->processing_fee );
        $objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, $element->statement_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, $element->temp_LE); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, $element->business_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $element->target_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->TSE_BDR_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, $element->GSTIN);
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('AX' . $rowCount, $element->aaa_number,PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, $element->new_policy_start);
        $objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, $element->user_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, $element->user_location);
         $objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, $suername->supername);
        $objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, $element->nominee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, $element->nominee_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, $element->nominee_relationship); 
        $objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, $element->appointee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, $element->appointee_relationship);
        $objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, $element->comment);
        $objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, $element->cus_card_name);
			$relationName = arealationshiofunction();
			$relationDummdata = $relationName[$element->cus_relation_ishued];
			//$objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, $relationDummdata);

            $rowCount++;
            $i++;
        }
    }
	
	else if($this->session->userdata('user_type_abbr')=="lead data" && ($_POST['product']) == "Personal Accident") {
    	$data = $this->Lms_car_model->getLeadsForExcelPA();
    	$fileName = 'Personal Accident-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead No');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Lead Registered Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lead Registered Time');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product');
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Category');
            $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Lead Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Salutation');
            $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Email');
            $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Customer DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Customer Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Marital Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Address1');
            $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Address2');
            $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Area');
            $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'House & Street No');
            $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'City');
            $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'State');
            $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Zipcode');
            $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Customer Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Alternate Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Pan Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'EMI');
            $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'EMI Years');
            $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sum Insured');
            $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Premium');
            $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Sub Channel');
            $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Case Id ');
            $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'HDFCRelation_no/ReferenceNo');
            $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'HDFCCardNo/CustomerID');
            $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'TL Code/DSACode');
            $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'SM Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Bank Verifier');
            $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Payment Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Lead Details');
            $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Right time to contact the Customer');
            $objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Language');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Processing Fee Applicable');
            $objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Statement Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Temp LE');
            $objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Type of Business');
            $objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Target Date');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'TES/BDR Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'GSTIN');
            $objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'AAN No');

            $objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Proposed Policy Start Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'User Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'User Location');
            $objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Supervisor Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Nominee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Nominee Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Nominee Relationship');
            $objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Appointee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Appointee Relationship of Nominee
            ');
            $objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Comment');
            $objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'Customer Name');
			//$objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'Relationship with Insured');*/

        $rowCount = 2;
        $i = 1;
        foreach ($data as $element) {

         if(!empty($element->createdon)){
			 
         $dateRegister = strtotime($element->createdon);
		 $resisterdDate = date('Y-m-d',$dateRegister);
		 $resisterdTime = date('G:i:s',strtotime($element->createdon));
		 
        } else {
        	$resisterdDate = "";
        }
		
		if($element->payment_type == 'Credit Card' && $element->cus_emi == 'Yes'){
			
			$cusemicheck = $element->cus_emi;
			$cusemiyear = $element->cus_emi_yr;
			
		} else {
			
			$cusemicheck = $element->cus_emi;
			$cusemiyear = '';
		}

		$suername = $this->db->query("SELECT GROUP_CONCAT(user_name) supername FROM `tbl_users` WHERE FIND_IN_SET( emp_id,(SELECT history_user_id FROM tbl_user_activity_history WHERE history_lead_id = '".$element->leadid."' && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1))")->row_object();
                        
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->lead_application_id);
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $resisterdDate);
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $resisterdTime);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->product_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->category);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->lead_status);
         $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->cus_title);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_phone);
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_email);
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->date_of_birth);
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->cust_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->marital_status);
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->cust_street1);
        $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->cust_street2);
        $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->cust_area); 
        $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->cust_house_number);
        $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->cust_city);
        $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->cust_state);
        $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->cust_zip);//
        $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->cust_type);    
        $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->emergency_contact_num);
        $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->cust_pan);
        $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element->occupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $cusemicheck); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $cusemiyear);
        $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->sum_insured);
        $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->lms_premium);
        $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $element->sub_channel );
        $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $element->case_id ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $element->HDFC_card_relationship_no);
        $objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $element->HDFC_card_last_4_digits);
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount,  $element->TL_code );
        $objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $element->SM_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $element->bank_verifier_id);
        $objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->payment_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->lead_details ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, $element->cus_customer);
        $objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, $element->cus_language);
        $objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, $element->processing_fee );
        $objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, $element->statement_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, $element->temp_LE); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, $element->business_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $element->target_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->TSE_BDR_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, $element->GSTIN);
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('AX' . $rowCount, $element->aaa_number,PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, $element->new_policy_start);
        $objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, $element->user_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, $element->user_location);
         $objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, $suername->supername);
        $objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, $element->nominee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, $element->nominee_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, $element->nominee_relationship); 
        $objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, $element->appointee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, $element->appointee_relationship);
        $objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, $element->comment);

        $objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, $element->cus_card_name);
			$relationName = arealationshiofunction();
			$relationDummdata = $relationName[$element->cus_relation_ishued];
			//$objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, $relationDummdata);

            $rowCount++;
            $i++;
        }
		
    }

	elseif ($this->session->userdata('user_type_abbr')=="lead data" && ($_POST['product']) == "Home"){
    	 	
       $data = $this->Lms_car_model->getLeadsForExcelReportProHome();

    	$fileName = 'Home-'.time().'1.xlsx'; 
    	
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead No');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Lead Registered Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lead Registered Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product');
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Category');
            $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Lead Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Salutation');
            $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Email');
            $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Customer DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Customer Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Marital Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Address1');
            $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Address2');
            $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Area');
            $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'House & Street No');
            $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'City');
            $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'State');
            $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Zipcode');
            $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Customer Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Alternate Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Pan Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'EMI');
            $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'EMI Years');
            $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sum Insured');
            $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Premium');
            $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Sub Channel');
            $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Case Id ');
            $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'HDFCRelation_no/ReferenceNo');
            $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'HDFCCardNo/CustomerID');
            $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'TL Code/DSACode');
            $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'SM Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Bank Verifier');
            $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Payment Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Lead Details');
            $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Right time to contact the Customer');
            $objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Language');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Processing Fee Applicable');
            $objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Statement Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Temp LE');
            $objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Type of Business');
            $objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Target Date');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'TES/BDR Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'GSTIN');
            $objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'AAN No');
            $objPHPExcel->getActiveSheet()->SetCellValue('AY1','Type of Building');
            $objPHPExcel->getActiveSheet()->SetCellValue('AZ1','Property Ownership');
            $objPHPExcel->getActiveSheet()->SetCellValue('BA1','Property Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('BB1','Previous' );
            $objPHPExcel->getActiveSheet()->SetCellValue('BC1','No of Floors');
            $objPHPExcel->getActiveSheet()->SetCellValue('BD1','Construction Year');
            $objPHPExcel->getActiveSheet()->SetCellValue('BE1','Independent House');
            $objPHPExcel->getActiveSheet()->SetCellValue('BF1','Compound Wall');
            $objPHPExcel->getActiveSheet()->SetCellValue('BG1','Build Area');
            $objPHPExcel->getActiveSheet()->SetCellValue('BH1','Risk Address1');
            $objPHPExcel->getActiveSheet()->SetCellValue('BI1','Risk Address2');
            $objPHPExcel->getActiveSheet()->SetCellValue('BJ1','Risk Area');
            $objPHPExcel->getActiveSheet()->SetCellValue('BK1','Risk PinCode');
            $objPHPExcel->getActiveSheet()->SetCellValue('BL1','Risk State');
            $objPHPExcel->getActiveSheet()->SetCellValue('BM1','Risk City');
            $objPHPExcel->getActiveSheet()->SetCellValue('BN1','Risk Nearest Land Mark');
            $objPHPExcel->getActiveSheet()->SetCellValue('BO1', 'Item Discription');
            $objPHPExcel->getActiveSheet()->SetCellValue('BP1', 'Weight in gm');
            $objPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'Sum Insured');
            $objPHPExcel->getActiveSheet()->SetCellValue('BR1', 'Item Description');
            $objPHPExcel->getActiveSheet()->SetCellValue('BS1', 'Make');
            $objPHPExcel->getActiveSheet()->SetCellValue('BT1', 'Model');
            $objPHPExcel->getActiveSheet()->SetCellValue('BU1', 'YOM');
            $objPHPExcel->getActiveSheet()->SetCellValue('BV1', 'Serial/IMEI Num');
            $objPHPExcel->getActiveSheet()->SetCellValue('BW1', 'Sum Insured');
            $objPHPExcel->getActiveSheet()->SetCellValue('BX1', 'Long Discription');
            $objPHPExcel->getActiveSheet()->SetCellValue('BY1', 'Asset Damaged');
            $objPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'Cause of Loss');
            $objPHPExcel->getActiveSheet()->SetCellValue('CA1', 'Insurence In Place');
            $objPHPExcel->getActiveSheet()->SetCellValue('CB1', 'Policy Year/Loss Year');
            $objPHPExcel->getActiveSheet()->SetCellValue('CC1', 'Insurence Claimed');
            $objPHPExcel->getActiveSheet()->SetCellValue('CD1', 'Loss of Amount');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('CE1', 'Proposed Policy Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('CF1', 'User Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CG1', 'User Location');
            $objPHPExcel->getActiveSheet()->SetCellValue('CH1', 'Supervisor Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CI1', 'Nominee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CJ1', 'Nominee Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('CK1', 'Nominee Relationship');
            $objPHPExcel->getActiveSheet()->SetCellValue('CL1', 'Appointee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CM1', 'Appointee Relationship of Nominee
            ');
            $objPHPExcel->getActiveSheet()->SetCellValue('CN1', 'Comment');

            $objPHPExcel->getActiveSheet()->SetCellValue('CO1', 'Customer Name');
			//$objPHPExcel->getActiveSheet()->SetCellValue('CP1', 'Relationship with Insured');*/

        $rowCount = 2;
        $i = 1;

        foreach ($data as $element) {

        if(!empty($element->createdon)){
         $dateRegister = strtotime($element->createdon);
		$resisterdDate = date('Y-m-d',$dateRegister);
		$resisterdTime = date('G:i:s',strtotime($element->createdon));
        } else {
        	$resisterdDate = "";
        }
		
		if($element->payment_type == 'Credit Card' && $element->cus_emi == 'Yes'){
			
			$cusemicheck = $element->cus_emi;
			$cusemiyear = $element->cus_emi_yr;
		} else {
			$cusemicheck = $element->cus_emi;
			$cusemiyear = '';
		}

		$suername = $this->db->query("SELECT GROUP_CONCAT(user_name) supername FROM `tbl_users` WHERE FIND_IN_SET( emp_id,(SELECT history_user_id FROM tbl_user_activity_history WHERE history_lead_id = '".$element->leadid."' && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1))")->row_object();
                        
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, ($element->lead_application_id ? $element->lead_application_id : ''));
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, ($resisterdDate ? $resisterdDate : ''));
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $resisterdTime);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->product_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->category);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->lead_status);
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->cus_title);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_phone);
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_email);
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->date_of_birth);
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->cust_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->marital_status);
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->cust_street1);
        $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->cust_street2);
        $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->cust_area); 
        $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->cust_house_number);
        $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->cust_city);
        $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->cust_state);
        $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->cust_zip);//
        $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->cust_type);    
        $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->emergency_contact_num);
        $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->cust_pan);
        $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element->occupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $cusemicheck); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $cusemiyear);
        $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->sum_insured);
        $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->lms_premium);
        $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $element->sub_channel );
        $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $element->case_id ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $element->HDFC_card_relationship_no);
        $objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $element->HDFC_card_last_4_digits);
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount,  $element->TL_code );
        $objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $element->SM_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $element->bank_verifier_id);
        $objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->payment_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->lead_details ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, $element->cus_customer);
        $objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, $element->cus_language);
        $objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, $element->processing_fee );
        $objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, $element->statement_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, $element->temp_LE); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, $element->business_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $element->target_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->TSE_BDR_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, $element->GSTIN);
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('AX' . $rowCount, $element->aaa_number,PHPExcel_Cell_DataType::TYPE_STRING);
        $objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, $element->hme_building_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, $element->hme_property_ownership);
        $objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, $element->hme_property_type); 
        $objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, $element->hme_previous_claims);
        $objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, $element->hme_no_of_floors);
        $objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, $element->hme_year_of_construction);
        $objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, $element->hme_independent_house);
        $objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, $element->hme_compound_wall); 
        $objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, $element->hme_build_up);
        $objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, $element->hme_risk_address1);
        $objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, $element->hme_risk_address2);
        $objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, $element->hme_risk_area);
        $objPHPExcel->getActiveSheet()->SetCellValue('BK' . $rowCount, $element->hme_risk_pincode);
        $objPHPExcel->getActiveSheet()->SetCellValue('BL' . $rowCount, $element->hme_risk_city);
        $objPHPExcel->getActiveSheet()->SetCellValue('BM' . $rowCount, $element->hme_risk_state); 
        $objPHPExcel->getActiveSheet()->SetCellValue('BN' . $rowCount, $element->hme_risk_nearest_land_mark);
        $objPHPExcel->getActiveSheet()->SetCellValue('BO' . $rowCount, ($element->hme_itm_des ? $element->hme_itm_des : ''));

        $objPHPExcel->getActiveSheet()->SetCellValue('BP' . $rowCount, $element->hme_weight);
        $objPHPExcel->getActiveSheet()->SetCellValue('BQ' . $rowCount, $element->hme_SI);
        
      /*  $objPHPExcel->getActiveSheet()->SetCellValue('BR' . $rowCount, $element->hme_itm_des);
        $objPHPExcel->getActiveSheet()->SetCellValue('BS' . $rowCount, $element->hme_make);
        $objPHPExcel->getActiveSheet()->SetCellValue('BT' . $rowCount, $element->hme_model);
        $objPHPExcel->getActiveSheet()->SetCellValue('BU' . $rowCount, $element->hme_YOM);
        $objPHPExcel->getActiveSheet()->SetCellValue('BV' . $rowCount, $element->hme_IMEI); 
        $objPHPExcel->getActiveSheet()->SetCellValue('BW' . $rowCount, $element->hme_SI);*/
        
        $objPHPExcel->getActiveSheet()->SetCellValue('BX' . $rowCount, $element->hme_long_des);
        $objPHPExcel->getActiveSheet()->SetCellValue('BY' . $rowCount, $element->hme_assets_damage);
        $objPHPExcel->getActiveSheet()->SetCellValue('BZ' . $rowCount, $element->hme_cause_loss);
        $objPHPExcel->getActiveSheet()->SetCellValue('CA' . $rowCount, $element->hme_ins_place);
        $objPHPExcel->getActiveSheet()->SetCellValue('CB' . $rowCount, $element->hme_policy_yr); 
        $objPHPExcel->getActiveSheet()->SetCellValue('CC' . $rowCount, $element->hme_ins_claim);
        $objPHPExcel->getActiveSheet()->SetCellValue('CD' . $rowCount, $element->hme_loss_amt);
        
        $objPHPExcel->getActiveSheet()->SetCellValue('CE' . $rowCount, $element->new_policy_start);
        $objPHPExcel->getActiveSheet()->SetCellValue('CF' . $rowCount, $element->user_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CG' . $rowCount, $element->user_location);
        $objPHPExcel->getActiveSheet()->SetCellValue('CH' . $rowCount, $suername->supername);
        $objPHPExcel->getActiveSheet()->SetCellValue('CI' . $rowCount, $element->nominee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CJ' . $rowCount, $element->nominee_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('CK' . $rowCount, $element->nominee_relationship); 
        $objPHPExcel->getActiveSheet()->SetCellValue('CL' . $rowCount, $element->appointee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CM' . $rowCount, $element->appointee_relationship);
        $objPHPExcel->getActiveSheet()->SetCellValue('CN' . $rowCount, $element->comment);

        $objPHPExcel->getActiveSheet()->SetCellValue('CO' . $rowCount, $element->cus_card_name);
			$relationName = arealationshiofunction();
			$relationDummdata = $relationName[$element->cus_relation_ishued];
			//$objPHPExcel->getActiveSheet()->SetCellValue('CP' . $rowCount, $relationDummdata);


            $rowCount++;
            $i++;
        }
    }

    elseif ($this->session->userdata('user_type_abbr')=="lead data" && ($_POST['product']) == "Super Ship"){
		
        $data = $this->Lms_car_model->getLeadsForExcelReportProSupership();
        
    	$fileName = 'SuperShip-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead No');
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Lead Registered Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Lead Registered Time');
            $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product');
            $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Category');
            $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Lead Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Salutation');
            $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Email');
            $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Customer DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Customer Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Marital Status');
            $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Address1');
            $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Address2');
            $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Area');
            $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'City');
            $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'State');
            $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Zipcode');
            $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Customer Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Alternate Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Pan Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'EMI');
            $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'EMI Years');
            $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Sum Insured');
            $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Premium');
            $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Sub Channel');
            $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Case Id ');
            $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'HDFCRelation_no/ReferenceNo');
            $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'HDFCCardNo/CustomerID');
            $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'TL Code/DSACode');
            $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'SM Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Bank Verifier');
            $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Payment Type');
            $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Lead Details');
            $objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Right time to contact the Customer');
            $objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Language');
            $objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Processing Fee Applicable');
            $objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Statement Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Temp LE');
            $objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Type of Business');
            $objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Target Date');
           
            $objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'TES/BDR Code');
            $objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'GSTIN');
            $objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'AAN No');

            $objPHPExcel->getActiveSheet()->SetCellValue('AX1','Include Spouse');
            $objPHPExcel->getActiveSheet()->SetCellValue('AY1','Include Children');
            $objPHPExcel->getActiveSheet()->SetCellValue('AZ1','Income(P.A)');
            $objPHPExcel->getActiveSheet()->SetCellValue('BA1','Tenure');
            $objPHPExcel->getActiveSheet()->SetCellValue('BB1','Policy Term(in years)');


            $objPHPExcel->getActiveSheet()->SetCellValue('BB1','Height(in CMs)');
            $objPHPExcel->getActiveSheet()->SetCellValue('BC1','Weight(in KG)');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Spouse First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Spouse Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Spouse DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Spouse Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Spouse Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'Spouse Height');
            $objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'Spouse Weight');
            
            $objPHPExcel->getActiveSheet()->SetCellValue('BK1', 'Child 1 First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BL1', 'Child 1 Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BM1', 'Child 1 DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('BN1', 'Child 1 Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('BO1', 'Child 1 Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('BP1', 'Child 1 Height(in CM)');
            $objPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'Child 1 Weight(in KG)');
            
             $objPHPExcel->getActiveSheet()->SetCellValue('BR1', 'Child 2 First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BS1', 'Child 2 Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BT1', 'Child 2 DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('BU1', 'Child 2 Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('BV1', 'Child 2 Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('BW1', 'Child 2 Height(in CM)');
            $objPHPExcel->getActiveSheet()->SetCellValue('BX1', 'Child 2 Weight(in KG)');
            
             $objPHPExcel->getActiveSheet()->SetCellValue('BY1', 'Child 3 First Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'Child 3 Last Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CA1', 'Child 3 DOB');
            $objPHPExcel->getActiveSheet()->SetCellValue('CB1', 'Child 3 Gender');
            $objPHPExcel->getActiveSheet()->SetCellValue('CC1', 'Child 3 Occupation');
            $objPHPExcel->getActiveSheet()->SetCellValue('CD1', 'Child 3 Height(in CM)');
            $objPHPExcel->getActiveSheet()->SetCellValue('CE1', 'Child 3 Weight(in KG)');
           
			$objPHPExcel->getActiveSheet()->SetCellValue('CF1', 'Doctor Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CG1', 'Doctor Qualification');
            $objPHPExcel->getActiveSheet()->SetCellValue('CH1', 'Doctor Address');
            $objPHPExcel->getActiveSheet()->SetCellValue('CI1', 'Doctor Mobile Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('CJ1', 'Clinic Number');
            $objPHPExcel->getActiveSheet()->SetCellValue('CK1', 'Nominee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CL1', 'Nominee Relationship');
            $objPHPExcel->getActiveSheet()->SetCellValue('CM1', 'Nominee Age');
            $objPHPExcel->getActiveSheet()->SetCellValue('CN1', 'Appointee Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CO1', 'Appointee Relationship');
            $objPHPExcel->getActiveSheet()->SetCellValue('CP1', 'Primary Insured');
            $objPHPExcel->getActiveSheet()->SetCellValue('CQ1', 'Comment');
            $objPHPExcel->getActiveSheet()->SetCellValue('CR1', 'User Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CS1', 'User Location');
            $objPHPExcel->getActiveSheet()->SetCellValue('CT1', 'Supervisor Name');
            $objPHPExcel->getActiveSheet()->SetCellValue('CU1', 'Proposed Date');
            $objPHPExcel->getActiveSheet()->SetCellValue('CV1', 'Hospital Daily Cash');
            $objPHPExcel->getActiveSheet()->SetCellValue('CW1', 'Critical Illness');

            $objPHPExcel->getActiveSheet()->SetCellValue('CX1', 'Customer Name');
			//$objPHPExcel->getActiveSheet()->SetCellValue('CY1', 'Relationship with Insured');*/


        $rowCount = 2;
        $i = 1;

        $arrayData=array();

        foreach ($data as $element) {

        if(!empty($element->createdon)){
         $dateRegister = strtotime($element->createdon);
		$resisterdDate = date('Y-m-d',$dateRegister);
		$resisterdTime = date('G:i:s',strtotime($element->createdon));
        } else {
        	$resisterdDate = "";
        }

        $suername = $this->db->query("SELECT GROUP_CONCAT(user_name) supername FROM `tbl_users` WHERE FIND_IN_SET( emp_id,(SELECT history_user_id FROM tbl_user_activity_history WHERE history_lead_id = '".$element->leadid."' && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1))")->row_object();
			
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->lead_application_id);
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $resisterdDate);
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $resisterdTime);
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->product_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->category);
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->lead_status);
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->cus_title);
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_phone);
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_email);
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->date_of_birth);
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->cust_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->marital_status);
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->cust_street1);
        $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->cust_street2);
        $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->cust_area);

		if($element->payment_type == 'Credit Card' && $element->cus_emi == 'Yes'){
			
			$cusemicheck = $element->cus_emi;
			$cusemiyear = $element->cus_emi_yr;
			
		} else {
			
			$cusemicheck = $element->cus_emi;
			$cusemiyear = '';
		}
       
        $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->cust_city);
        $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->cust_state);
        $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->cust_zip);
        $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->cust_type);    
        $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->emergency_contact_num);
        $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->cust_pan);
        $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->occupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $cusemicheck); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $cusemiyear);
        $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $element->sum_insured);
        $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->lms_premium);
        $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->sub_channel );
        $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $element->case_id ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $element->HDFC_card_relationship_no);
        $objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $element->HDFC_card_last_4_digits);
        $objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount,  $element->TL_code );
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, $element->SM_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $element->bank_verifier_id);
		
        $objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $element->payment_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->lead_details ); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->cus_customer);
        $objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, $element->cus_language);
        $objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, $element->processing_fee );
        $objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, $element->statement_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, $element->temp_LE); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, $element->business_type);
        $objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, $element->target_date);
        $objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $element->TSE_BDR_code);
        $objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->GSTIN);
        $objPHPExcel->getActiveSheet()->setCellValueExplicit('AW' . $rowCount, $element->aaa_number,PHPExcel_Cell_DataType::TYPE_STRING);

        $objPHPExcel->getActiveSheet()->SetCellValue('AX' . $rowCount, $element->ship_spouse_include );
        $objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, $element->ship_no_of_children );
        $objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, $element->ship_income); 
        $objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, $element->ship_policy_term);
    
        $objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, $element->sship_pro_height);
        $objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, $element->sship_pro_Weight);
		
		$spouseData  = $this->Lms_car_model->getProductOptions(array('lead_id'=>$element->lead_id,'mem_type'=>'Spouse'));
		$childoneData  = $this->Lms_car_model->getProductOptions(array('lead_id'=>$element->lead_id,'mem_type'=>'Child 1'));
		$childtwoData  = $this->Lms_car_model->getProductOptions(array('lead_id'=>$element->lead_id,'mem_type'=>'Child 2'));
		$childthreeData  = $this->Lms_car_model->getProductOptions(array('lead_id'=>$element->lead_id,'mem_type'=>'Child 3'));
		
        $objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, $spouseData->mem_first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, $spouseData->mem_last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, $spouseData->mem_DOB);
        $objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, $spouseData->mem_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, $spouseData->mem_ocupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, $spouseData->mem_height);
        $objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, $spouseData->mem_weight);
        $objPHPExcel->getActiveSheet()->SetCellValue('BK' . $rowCount, $childoneData->mem_first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BL' . $rowCount, $childoneData->mem_last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BM' . $rowCount, $childoneData->mem_DOB);
        $objPHPExcel->getActiveSheet()->SetCellValue('BN' . $rowCount, $childoneData->mem_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('BO' . $rowCount, $childoneData->mem_ocupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('BP' . $rowCount, $childoneData->mem_height);
        $objPHPExcel->getActiveSheet()->SetCellValue('BQ' . $rowCount, $childoneData->mem_weight);
        $objPHPExcel->getActiveSheet()->SetCellValue('BR' . $rowCount, $childtwoData->mem_first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BS' . $rowCount, $childtwoData->mem_last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BT' . $rowCount, $childtwoData->mem_DOB);
        $objPHPExcel->getActiveSheet()->SetCellValue('BU' . $rowCount, $childtwoData->mem_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('BV' . $rowCount, $childtwoData->mem_ocupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('BW' . $rowCount, $childtwoData->mem_height);
        $objPHPExcel->getActiveSheet()->SetCellValue('BX' . $rowCount, $childtwoData->mem_weight);
        $objPHPExcel->getActiveSheet()->SetCellValue('BY' . $rowCount, $childthreeData->mem_first_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('BZ' . $rowCount, $childthreeData->mem_last_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CA' . $rowCount, $childthreeData->mem_DOB);
        $objPHPExcel->getActiveSheet()->SetCellValue('CB' . $rowCount, $childthreeData->mem_gender);
        $objPHPExcel->getActiveSheet()->SetCellValue('CC' . $rowCount, $childthreeData->mem_ocupation);
        $objPHPExcel->getActiveSheet()->SetCellValue('CD' . $rowCount, $childthreeData->mem_height);
        $objPHPExcel->getActiveSheet()->SetCellValue('CE' . $rowCount, $childthreeData->mem_weight);
		$objPHPExcel->getActiveSheet()->SetCellValue('CF' . $rowCount, $element->sship_pro_doc_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CG' . $rowCount, $element->sship_pro_doc_qualifi);
        $objPHPExcel->getActiveSheet()->SetCellValue('CH' . $rowCount, $element->sship_pro_doc_addr);
        $objPHPExcel->getActiveSheet()->SetCellValue('CI' . $rowCount, $element->sship_pro_doc_mobile);
        $objPHPExcel->getActiveSheet()->SetCellValue('CJ' . $rowCount, $element->sship_pro_hos_num);        
        $objPHPExcel->getActiveSheet()->SetCellValue('CK' . $rowCount, $element->nominee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CL' . $rowCount, $element->nominee_age);
        $objPHPExcel->getActiveSheet()->SetCellValue('CM' . $rowCount, $element->nominee_relationship); 
        $objPHPExcel->getActiveSheet()->SetCellValue('CN' . $rowCount, $element->appointee_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CO' . $rowCount, $element->appointee_relationship);
        $objPHPExcel->getActiveSheet()->SetCellValue('CP' . $rowCount, $element->ship_primary_insured);
        $objPHPExcel->getActiveSheet()->SetCellValue('CQ' . $rowCount, $element->comment);		   
        $objPHPExcel->getActiveSheet()->SetCellValue('CR' . $rowCount, $element->user_name);
        $objPHPExcel->getActiveSheet()->SetCellValue('CS' . $rowCount, $element->user_location);
        $objPHPExcel->getActiveSheet()->SetCellValue('CT' . $rowCount, $suername->supername);
        $objPHPExcel->getActiveSheet()->SetCellValue('CU' . $rowCount, $element->new_policy_start);
		
		$sumcritical = '';
		if( $element->ss_critical > 0 ){
			
			$sumcritical = $element->ss_sum_insured_critical;
		}
		
		$hospitality = "No";
		if( $element->ss_hospital_daily > 0 ){
			
			$hospitality = "Yes";
			
		}
		
        $objPHPExcel->getActiveSheet()->SetCellValue('CV' . $rowCount, $hospitality);
        $objPHPExcel->getActiveSheet()->SetCellValue('CW' . $rowCount, $sumcritical);

			$objPHPExcel->getActiveSheet()->SetCellValue('CX' . $rowCount, $element->cus_card_name);
			$relationName = arealationshiofunction();
			$relationDummdata = $relationName[$element->cus_relation_ishued];
			//$objPHPExcel->getActiveSheet()->SetCellValue('CY' . $rowCount, $relationDummdata);


            $rowCount++;
            $i++;
        }
    }

	elseif($this->session->userdata('user_type_abbr')=="lead data" && ($_POST['product']) == "Two Wheeler") {
    	$this->getSearchtwo();
	}
	
	elseif ($this->session->userdata('user_type_abbr')=="lead data" && ($_POST['product']) == "Bundle PA"){
		$this->getSearchBundle();
	}

	elseif ($this->session->userdata('user_type_abbr')=="report" && ($_POST['product']) == "Motor"){
		$this->getSearchdataquery();
	}

    /********** download report save time zone ****************/
	    $this->Useractivity->getInsertHistory(array(
		'emp_id' => $this->session->userdata('emp_id'),
		'leadId' => 0,
		'type' => 6, //lead status changing,
		'leadData' => json_encode($__POST)
		));
		/**** close *****/
		if($this->session->userdata('user_type_abbr')=="lead data" && ((($_POST['product']) != "Two Wheeler") && ($_POST['product']) != "Bundle PA")) {
       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
		echo json_encode($fileName);
	} elseif($this->session->userdata('user_type_abbr')=="hdfc_ops"){
     	//exit();   
     	header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
		echo json_encode($fileName);
	} elseif( $this->session->userdata('user_type_abbr') == "report" && (($_POST['product']) != "Motor")){
		//exit();   
		header("Content-Type: application/vnd.ms-excel");
	   header('Content-Disposition: attachment;filename="'.$fileName.'"');
	   header("Content-Transfer-Encoding: binary ");
	   //header('Cache-Control: max-age=0');        
	   $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
	   $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
	   echo json_encode($fileName);
   }
    }

}

?>
