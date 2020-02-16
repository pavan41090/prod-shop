<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class PerBussinel extends CI_Controller {

	public $insertedleadId;
	public $insertedCustomerId;
	public $leadApplicationnumber;
	public $premiumloanAmount;
	public $dataonjectjson;

	public function __construct()
	{
	    parent::__construct();
		error_reporting(0);
		$this->insertedleadId;
		$this->insertedCustomerId;
		$this->leadApplicationnumber;
		$this->dataonjectjson;
		$this->premiumloanAmount;
	}
	
	public function index(){

		getHdfclogincheck();

		$this->data['city'] = $this->Common_model->getCityList();
	   		$str = file_get_contents(APPPATH.'../assets/json/model-make.json');
	      
	        $dataArraycar = json_decode($str, true);
			$dataArraycar = $this->Common_model->array_sort($dataArraycar, 'MANUFACTURE', SORT_ASC);
	         $filtercar = array("FTW");
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
	        $brandVariantscar = array();
	        foreach($dataArraycar as $eachDataCar){
	            $carmanufacture = $eachDataCar['MANUFACTURE'] ? $eachDataCar['MANUFACTURE'] : '';
	            $carvariant = $eachDataCar['VARIANT'] ? $eachDataCar['VARIANT'] : '';
	            $carmodel = $eachDataCar['MODEL'] ? $eachDataCar['MODEL'] : '';
	            $carEX_SHOWROOM_PRICE = $eachDataCar['EX_SHOWROOM_PRICE'] ? $eachDataCar['EX_SHOWROOM_PRICE'] : '';
	            $carhashKey = base64_encode($carmanufacture.$carvariant);
	            $carmhashKey = base64_encode($carmodel.'-'.$carvariant);
	            $carhashBrandCategoriesed[$carhashKey] = $eachDataCar;
	            $carmhashBrandCategoriesed[$carmhashKey] = $carEX_SHOWROOM_PRICE;
	            $carbrandVariants[$carmanufacture][] = $carvariant;
	            $carmbrandVariants[$carmanufacture][] = $carmodel.'-'.$carvariant;
	        }

	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carbrandArray'] = $carbrandArray;
	        $this->data['carbrandVariants'] = $carbrandVariants;
	        $this->data['carmbrandVariants'] = $carmbrandVariants;
	        $this->data['carhashBrandCategoriesed'] = $carhashBrandCategoriesed;
	       	$this->data['carmhashBrandCategoriesed'] = $carmhashBrandCategoriesed;
	        $this->data['carmhashKey'] = $carmhashKey;
	        $this->data['branchLocation'] = $this->Common_model->getBranchLocation();

			$this->data['stateArray'] = $this->Common_model->getStateList();
			$this->data['PriorityArray'] = $this->Common_model->getPriority();
			$this->data['cityComplete'] = $this->Common_model->getCityListCompleteList();

            $this->data['CategoryArray'] = $this->Common_model->getCategory();
            $this->data['BusinessArray'] = $this->Common_model->getBusiness();
            $this->data['GiLocationArray'] = $this->Common_model->getGiLocation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['languageArray'] = $this->Common_model->language();
            
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();
            
            $this->data['sdateArray'] = $this->Common_model->sdate();
     		$this->data['businessArray'] = $this->Common_model->typebusiness();
     		$this->data['salutationArray'] = $this->Common_model->customerSalutation();
     		$this->data['userDetails'] = $this->User_model->getLoginDetails();

            $this->data['module'] = 'leads';

			$this->data['sub_module'] = 'UPP Long Term'; 

			$userId = $this->session->userdata('emp_id');
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight; 	
			            
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_pl_bl',$this->data);
			$this->load->view('layout/footer_inner');
	}

	public function getcheckvaluescount(){

		if($_SERVER['REQUEST_METHOD'] != "POST"){
				$error_responce['status'] = false;
				echo json_encode($error_responce);
				die();
		}

		$inputPost = $this->input->post();

		$planamount = ($inputPost['amount'])*1;
		$planage = $inputPost['age'];
		$plantenure = $inputPost['tenure'];
		$loantype = $inputPost['loantype'];

		$this->loanamountFunction($planamount,$planage,$plantenure,$loantype,false);
	}

	public function loanamountFunction($planamount,$planage,$plantenure,$loantype,$boolean){

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

		$ctna1 = pagetuppcriticaldata();
		$ctna2 = pagetupppersonalaccrates();
		$ctna3 = pagetuppcreditshildrates();
		$ctna4 = pagetuppaccidenthospitalrates();

		$personalsheet = personalbussinessworksheet();

		$bussinessData = bussinessworksheet();

		$criticalilpremium = $ctna1[$plantenure];
	    $personalaccidentpremium = $ctna2[$plantenure];
		$creditshiledpremium = $ctna3[$plantenure];
		$hospitalizationpremium = $ctna4[$plantenure];

		if($loantype == 1){

			$onesec = $personalsheet['cism'][0];
			$twodata = $personalsheet['pasi'][0];
			$threedata = $personalsheet['ahsi'][0];

			$criticalloan = $onesec[$selectedType];
			$pasicalloan = $twodata[$selectedType];
			$ahsicalloan = $threedata[$selectedType];

		}
		
		if($loantype == 2){

			$busone = $bussinessData['cism'][0];
			$bustwo = $bussinessData['pasi'][0];
			$threebuss = $bussinessData['ahsi'][0];

			$criticalloan = $busone[$selectedType];
			$pasicalloan = $bustwo[$selectedType];
			$ahsicalloan = $threebuss[$selectedType];

		}

		$ddrect['criticalrate'] = $criticalilpremium;
		$ddrect['peraccrate'] = $personalaccidentpremium;
		$ddrect['creditshildrate'] = $creditshiledpremium;
		$ddrect['accdentalhosrate'] = $hospitalizationpremium;

		$criticalPremiumcal = (($criticalilpremium*$criticalloan)/1000)*1;
		$personalPremiumcal = (($personalaccidentpremium*$pasicalloan)/1000)*1;
		$credishiledPremiumcal = (($planamount*$creditshiledpremium)/1000)*1;
		$hospitalPremiumcal = (($hospitalizationpremium*$ahsicalloan)/1000)*1;

		/*$ddrect['criticalpremium'] = $criticalPremiumcal;
		$ddrect['peraccpremium'] = $personalPremiumcal;
		$ddrect['creditshildpremium'] = $credishiledPremiumcal;
		$ddrect['accdentalhospremium'] = $hospitalPremiumcal;*/
		
		$ddrect['criticalpremium'] = $criticalloan;
		$ddrect['peraccpremium'] = $pasicalloan;
		$ddrect['creditshildpremium'] = $planamount;
		$ddrect['accdentalhospremium'] = $ahsicalloan;

		$premiungstnocal = $criticalPremiumcal + $personalPremiumcal + $credishiledPremiumcal + $hospitalPremiumcal;
		$ddrect['premiungstnocal'] = $premiungstnocal;
		
		$premiumgstcal = ($premiungstnocal)*0.18;
		$ddrect['premiumgstcal'] = $premiumgstcal;

		$finaltotalpremium = ($premiungstnocal*1)+($premiumgstcal*1);
		$ddrect['finaltotalpremium'] = $finaltotalpremium;

		$finaPremiumAmount = round($finaltotalpremium);
		$this->premiumloanAmount = $finaPremiumAmount;

		$this->dataonjectjson = json_encode($ddrect);

		$gumdataasdsad = getupplongterm();

		/*$htmlDisplaydata = '<table class="table">
		<tr><td>Loan Amount(Rs)</td><td>:</td><td>'.$planamount.'</td></tr>
		<tr><td>Loan Tenure(Yrs)</td><td>:</td><td>'.$gumdataasdsad[$plantenure].'</td></tr>
		<tr><td>PA Sum Insured</td><td>:</td><td>'.$personalPremiumcal.'</td></tr>
		<tr><td>Accidental Hospitalization Sum Insured</td><td>:</td><td>'.$hospitalPremiumcal.'</td></tr>
		<tr><td>Credit Shield Sum insured</td><td>:</td><td>'.$credishiledPremiumcal.'</td></tr>
		<tr><td>Critical Illness Sum insured</td><td>:</td><td>'.$criticalPremiumcal.'</td></tr>
		<tr><td>Total Sum Insured</td><td>:</td><td>'.$finaPremiumAmount.'</td></tr>
		</table>';*/

		$htmlDisplaydata = '<table class="table">
		<tr><td>Loan Amount(Rs)</td><td>:</td><td>'.$planamount.'</td></tr>
		<tr><td>Loan Tenure(Yrs)</td><td>:</td><td>'.$gumdataasdsad[$plantenure].'</td></tr>
		<tr><td>PA Sum Insured</td><td>:</td><td>'.$pasicalloan.'</td></tr>
		<tr><td>Accidental Hospitalization Sum Insured</td><td>:</td><td>'.$ahsicalloan.'</td></tr>
		<tr><td>Credit Shield Sum insured</td><td>:</td><td>'.$planamount.'</td></tr>
		<tr><td>Critical Illness Sum insured</td><td>:</td><td>'.$criticalloan.'</td></tr>
		<tr><td>Total Premium</td><td>:</td><td>'.$finaPremiumAmount.'</td></tr>
		</table>';

		$returnJsondata['htmldata'] = $htmlDisplaydata;
		$returnJsondata['finaltotalpremium'] = $finaPremiumAmount;

		if($boolean == false)
		echo json_encode($returnJsondata);

	}

	public function getInsertUppData(){
		
			if($_SERVER['REQUEST_METHOD'] != "POST"){
				$error_responce['status'] = false;
				echo json_encode($error_responce);
				die();
			}

			$inputPostData = $this->input->post();

	 		$this->makeeditApplicationId = $inputPostData['productlead_id'];

	 		$keyageCheck = array_key_exists("lms_car_age",$inputPostData);
	 		if($keyageCheck){
	 			$ageCus = $this->security->xss_clean($inputPostData['lms_car_age']);
	 		} else {
	 			$ageCus = '';
	 		}

	 		$gstnkeycheck = array_key_exists("lms_car_pro_gstn",$inputPostData);
	 		$gstnValue = '';
	 		if($gstnkeycheck){
	 			$gstnValue = $this->security->xss_clean($inputPostData['lms_car_pro_gstn']);
	 		}

	 		$checkhouseNumber = array_key_exists("lms_house_number",$inputPostData);
	 		$housenumberValue = '';
	 		if($checkhouseNumber){
	 			$housenumberValue = $this->security->xss_clean($inputPostData['lms_house_number']);
	 		}

	 		$checkEmiCus = array_key_exists("lms_cus_emi",$inputPostData);
	 		$lms_cus_emi='';

	 		if($checkEmiCus){
	 			$lms_cus_emi = $this->security->xss_clean($inputPostData['lms_cus_emi']);
	 		}

	 		$checklms_cus_emi_yr = array_key_exists("lms_cus_emi_yr",$inputPostData);
	 		$lms_cus_emi_yr = '';
	 		if($checklms_cus_emi_yr){
	 			$lms_cus_emi_yr = $this->security->xss_clean($inputPostData['lms_cus_emi_yr']);
	 		}

	 		$checklms_cus_cardlimt = array_key_exists("lms_cus_cardlimt",$inputPostData);
	 		$lms_cus_cardlimt = '';
	 		if($checklms_cus_cardlimt){
	 			$lms_cus_cardlimt = $this->security->xss_clean($inputPostData['lms_cus_cardlimt']);
	 		}

	 		$customerData = array(
	 		'cus_card_name' 	=> $this->security->xss_clean($inputPostData['lms_car_card_holder_name']),
			'cus_relation_ishued' 	=> $this->security->xss_clean($inputPostData['lms_car_relation_insured']),
			'cus_title' 	=> $this->security->xss_clean($inputPostData['lms_car_salut']),
			'first_name'	=> $this->security->xss_clean($inputPostData['lms_car_fname']),
			'last_name' 	=> $this->security->xss_clean($inputPostData['lms_car_lname']),
			'date_of_birth'	=> $this->security->xss_clean($inputPostData['lms_car_dob']),
			'cust_age'      => $this->security->xss_clean($inputPostData['lms_upp_age']),
			'cust_gender' 	=> $this->security->xss_clean($inputPostData['lms_car_gender']),
			'cust_pan' 		=> $this->security->xss_clean($inputPostData['lms_car_pan']),
			'cust_street1' 	=> $this->security->xss_clean($inputPostData['lms_car_add1']),
			'cust_street2' 	=> $this->security->xss_clean($inputPostData['lms_car_add2']),
			'cust_street3' 	=> $this->security->xss_clean($inputPostData['lms_car_add3']),
			'cust_area' 	=> $this->security->xss_clean($inputPostData['lms_car_area']),
			'cust_zip' 		=> $this->security->xss_clean($inputPostData['lms_car_zip']),
			'cust_state' 	=> $this->security->xss_clean($inputPostData['lms_car_state']),
			'cust_city' 	=> $this->security->xss_clean($inputPostData['lms_car_city']),
			'cust_email' 	=> $this->security->xss_clean($inputPostData['lms_car_email']),
			'cust_phone' 	=> $this->security->xss_clean($inputPostData['lms_car_mobile']),
			'cust_type' 	=> $this->security->xss_clean($inputPostData['lms_car_cus_type']),
			'cust_landmark' => $this->security->xss_clean($inputPostData['lms_car_pro_landmark']),
 			'marital_status'=> $this->security->xss_clean($inputPostData['lms_car_pro_marital']),
			'occupation'	=> $this->security->xss_clean($inputPostData['lms_car_pro_occupation']),
			'emergency_contact_num' => $this->security->xss_clean($inputPostData['lms_car_pro_emergency']),
			'GSTIN' 		=> $gstnValue,
			'cust_house_number' => $housenumberValue,
			'cus_customer' 		=> $this->security->xss_clean($inputPostData['lms_cus_customer']),
			'cus_language' 		=> $this->security->xss_clean($inputPostData['lms_cus_language']),
			'cus_emi' 			=> $lms_cus_emi,
			'cus_emi_yr' 		=> $lms_cus_emi_yr,
			'processing_fee	'	=> $this->security->xss_clean($inputPostData['lms_cus_pfee']),
 			'cus_cardlimt'		=> $lms_cus_cardlimt,
			'statement_date'	=> $this->security->xss_clean($inputPostData['lms_cus_sdate']),
			'temp_LE'           => $this->security->xss_clean($inputPostData['lms_cus_tle']) || 0,
			'business_type'	    => $this->security->xss_clean($inputPostData['lms_cus_tbusins']),
			'created_by'        => $this->session->userdata('emp_id'),
			);

			if(empty($this->makeeditApplicationId)){

						$this->db->set($customerData)->insert( 'tbl_customer' );
						$customerInsertId = $this->db->insert_Id();
						$this->insertedCustomerId = $customerInsertId;
						$applicationNumber = $this->Lms_car_model->generateApplicationNumber();
						$this->leadApplicationnumber = $applicationNumber;

			} else {

				$thisCusData = $this->db->select('customer_id,lead_application_id')->where('lead_id',$this->makeeditApplicationId)->get('tbl_lead');
				$thisQuery = $this->db->last_query();
				$thisCusDataRes = $thisCusData->row_object();
				$customerInsertId = $thisCusDataRes->customer_id;
				$this->insertedCustomerId = $customerInsertId;
				$this->leadApplicationnumber = $thisCusDataRes->lead_application_id;
				$this->db->set($customerData)->where('cust_id',$customerInsertId)->update( 'tbl_customer' );

			}

			$this->makeuserId = $customerInsertId;
			
			$subChannel = "";

			if($this->input->get_post('lms_car_campaign_name') != FALSE){

					$subChannel = $this->security->xss_clean($inputPostData['lms_car_campaign_name']);
			}

			$checklms_car_channel = array_key_exists("lms_car_channel",$inputPostData);
			$lms_car_channel = '';
			if($checklms_car_channel){
				$lms_car_channel = $this->security->xss_clean($inputPostData['lms_car_channel']);
			}

			$checkvision_address_name = array_key_exists("vision_address_name",$inputPostData);
			$vision_address_name = '';
			if($checkvision_address_name){
				$vision_address_name = $this->security->xss_clean($inputPostData['vision_address_name']);
			}

			$subChanelCheck = array_key_exists('lms_car_sub_channel', $inputPostData);
			$lms_car_sub_channel = '';
			if($subChanelCheck){
				$lms_car_sub_channel = $this->security->xss_clean($inputPostData['lms_car_sub_channel']);
			}

			$leadDataInsert = array(
				'category'=> $this->security->xss_clean($inputPostData['lms_car_category']),
				'line_of_business'=> $this->security->xss_clean($inputPostData['lms_car_line_of_business']),
				'priority' => $lms_car_sub_channel,
				'target_date' => $this->security->xss_clean($inputPostData['lms_car_target_date']),
				'TSE_BDR_code' => $this->security->xss_clean($inputPostData['lms_car_tse_bar_code']),
				'TL_code' => $this->security->xss_clean($inputPostData['lms_car_tl_code']),
				'SM_code' => $this->security->xss_clean($inputPostData['lms_car_sm_code']),
				'bank_verifier_id'=> $this->security->xss_clean($inputPostData['lms_car_bank_verify_id']),
				'case_id' => $this->security->xss_clean($inputPostData['lms_car_case_id']),
				'payment_type' => $this->security->xss_clean($inputPostData['lms_car_payment_type']),
				'sub_channel' =>$subChannel,
				'channel' => $lms_car_channel,
				'HDFC_card_relationship_no' => $this->security->xss_clean($inputPostData['lms_car_hdfc_card_relno']),
				'HDFC_card_last_4_digits' => $this->security->xss_clean($inputPostData['lms_car_hdfc_card_4digt']),
				'lead_application_id'=> $this->leadApplicationnumber,
				'customer_id'=>$customerInsertId,
				'lead_details' => $this->security->xss_clean($inputPostData['lms_car_deatil_lead']),
				'aaa_number' => $this->security->xss_clean($inputPostData['lms_aaa_number']),
				'priority' => $this->security->xss_clean($inputPostData['lms_car_priority']),
				'created_by' => $this->session->userdata('emp_id'),
				'vision_address' => $vision_address_name,
				'lead_status'=>"9999",
				'created_on' => date("Y-m-d G:i:s"),
				'lead_status' => 'Lead Generated'

			);
			if(empty($this->makeeditApplicationId)){
			$this->db->set( $leadDataInsert )->insert( 'tbl_lead' );
			$insertleadId = $this->db->insert_Id();
			$this->insertedleadId = $insertleadId;
			if($insertleadId){
				$this->db->set(array(
					'lead_id' => $insertleadId,
					'quote_data' => json_encode($this->session->userdata('quoteResDisplay'))
				)
				)->insert('tbl_quote_reg_table');
			}
			$this->makeLeadId = $insertleadId;
			} else {
				$this->db->set( $leadDataInsert )->where('lead_id',$this->makeeditApplicationId)->update( 'tbl_lead' );
				$this->makeLeadId = $this->makeeditApplicationId;				
			}

			$this->getInsertUppdataproductdetails();
	 		return;

	}

	private function getInsertUppdataproductdetails(){
		if($_SERVER['REQUEST_METHOD'] != "POST"){
			$errorReporting['status'] = false;
			echo json_encode($errorReporting);
			die();
		}


		if(empty($this->makeeditApplicationId)){

			$productData['customer_id'] = $this->insertedCustomerId;
			$productData['lead_id'] = $this->insertedleadId;
			$productData['product_type'] = 'UPP LONG TERM';
			$this->db->set($productData)->insert('tbl_product');
			
		} else {
			$productData['product_type'] = 'UPP LONG TERM';
			$this->db->set($productData)->where('lead_id',$this->makeeditApplicationId)->update('tbl_product');
		}

		$thispostInput = $this->input->post();

		$planamount = $thispostInput['lms_upp_loan_amount'];
		$planage = $thispostInput['lms_upp_age'];
		$plantenure = $thispostInput['lms_upp_tenure'];
		$loantype = $thispostInput['lms_upp_type_loan'];

		$this->loanamountFunction($planamount,$planage,$plantenure,$loantype,true);

		$datauppinsert['upp_plan_type'] = $loantype;
		$datauppinsert['upp_plan_amount'] = $planamount;
		$datauppinsert['upp_age'] = $planage;
		$datauppinsert['upp_tenure'] = $plantenure;
		$datauppinsert['upp_premioum_amount'] = $this->premiumloanAmount;
		$datauppinsert['upp_all_json_details'] = $this->dataonjectjson;
		
		if(empty($this->makeeditApplicationId)){

			$datauppinsert['upp_ip_address'] = $this->input->ip_address();
			$datauppinsert['upp_created_on'] = date("Y-m-d G:i:s");
			$datauppinsert['upp_status'] = 1;
			$datauppinsert['upp_lead_id'] = $this->insertedleadId;

			$this->db->set($datauppinsert)->insert('tbl_upp_logn_term_policy_details');

		} else {

			$this->db->set($datauppinsert)->where('upp_lead_id',$this->makeeditApplicationId)->update('tbl_upp_logn_term_policy_details');

		}
		
		$this->insertNomineedetails();
	}

	private function insertNomineedetails(){

		if($_SERVER['REQUEST_METHOD'] != "POST"){
			$errorReporting['status'] = false;
			echo json_encode($errorReporting);
			die();
		}

		$thispostInput = $this->input->post();

		if(empty($this->makeeditApplicationId)){

			$nomineeData = array(
				'customer_id'  	 			=>	$this->insertedCustomerId,
				'lead_id' 	   	    		=>	$this->insertedleadId,
				'nominee_name'				=> 	$thispostInput['pa_pro_nname'],
				'nominee_age' 				=> 	$thispostInput['pa_pro_nomie_age'],
				'nominee_relationship'		=> 	$thispostInput['pa_pro_nomie_relation'],
				'appointee_name' 			=> 	$thispostInput['pa_pro_nameofappoint'],
				'appointee_relationship' 	=> $thispostInput['pa_pro_appoint_relation']
			);
			$this->db->set($nomineeData)->insert('tbl_nominee');
		} else {
			$nomineeData = array(
				'nominee_name'				=> 	$thispostInput['pa_pro_nname'],
				'nominee_age' 				=> 	$thispostInput['pa_pro_nomie_age'],
				'nominee_relationship'		=> 	$thispostInput['pa_pro_nomie_relation'],
				'appointee_name' 			=> 	$thispostInput['pa_pro_nameofappoint'],
				'appointee_relationship' 	=> $thispostInput['pa_pro_appoint_relation']
			);
			$this->db->set($nomineeData)->where('lead_id',$this->makeeditApplicationId)->update('tbl_nominee');
		}
		
		$this->insertCommentsdata();
	}

	private function insertCommentsdata(){
		if($_SERVER['REQUEST_METHOD'] != "POST"){
			$errorReporting['status'] = false;
			echo json_encode($errorReporting);
			die();
		}

		$thispostInput = $this->input->post();
		$commentData = array(
					'comment'		=> $this->security->xss_clean($thispostInput['lms_car_comment']),
					'lead_id'		=> ($this->makeeditApplicationId ? $this->makeeditApplicationId : $this->insertedleadId),
					'status'  		=> 1,
					'created_on' 	=> $this->session->userdata('emp_id'),
					'created_by' 	=> date("Y-m-d G:i:s")
				);
		if(!empty($thispostInput['lms_car_comment'])){
			$this->db->set($commentData)->insert('tbl_comments');
		}

		$returnMessages['status'] = true;
		$returnMessages['applicationNumber'] = $this->leadApplicationnumber;


		echo json_encode($returnMessages);
	}

}

?>
