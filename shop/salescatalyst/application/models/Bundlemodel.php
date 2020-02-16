<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bundlemodel extends CI_Model {

    private $customerId;
    private $leadId;
    public $xapplicationNumber;
    private $leadUpdateId;
	public function __construct()
	{
        parent::__construct();
        $this->customerId;
        $this->leadId;
        $this->xapplicationNumber;
        $this->leadUpdateId = false;
    }
    
    public function getpasuminsured(){

        return array(
            '2500000' => '25,00,000',
            '5000000' => '50,00,000',
            '7500000' => '75,00,000',
            '10000000' => '1,00,00,000',
            '20000000' => '2,00,00,000',
            '30000000' => '3,00,00,000'
        );

    }

    private function getNamesSum(){
        return array(
             '2500000' => '25',
             '5000000' => '50',
             '7500000' => '75',
             '10000000' => '1cr',
             '20000000' => '2cr',
             '30000000' => '3cr'
        );
    }

    private function getPremiumData(){

        return array(
            
            's1' => array(
                '25' => array(
                    '4163' => '4,163'
                ),
                '50' => array(
                    '6975' => '6,975'
                ),
                '75' => array(
                    '9727' => '9,727'
                ),
                '1cr' => array(
                    '12639' => '12,639'
                ),
                '2cr' => array(
                    '23387' => '23,387'
                ),
                '3cr' => array(
                    '34037' => '34,037'
                )
                ),
            's2' => array(
                '25' => array(
                    '7701' => '7,701'
                ),
                '50' => array(
                    '12904' => '12,904'
                ),
                '75' => array(
                    '17995' => '17,995'
                ),
                '1cr' => array(
                    '23383' => '23,383'
                ),
                '2cr' => array(
                    '43266' => '43,266'
                ),
                '3cr' => array(
                    '62968' => '62,968'
                )
                ),
            's3' => array(
                '25' => array(
                    '11239' => '11,239'
                ),
                '50' => array(
                    '18832' => '18,832'
                ),
                '75' => array(
                    '26263' => '26,263'
                ),
                '1cr' => array(
                    '34126' => '34,126'
                ),
                '2cr' => array(
                    '63146' => '63,146'
                ),
                '3cr' => array(
                    '91900' => '91,900'
                )
                ),
            'ss1' => array(
                '25' => array(
                    '5932' => '5,932'
                ),
                '50' => array(
                    '9939' => '9,939'
                ),
                '75' => array(
                    '13861' => '13,861'
                ),
                '1cr' => array(
                    '18011' => '18,011'
                ),
                '2cr' => array(
                    '33327' => '33,327'
                ),
                '3cr' => array(
                    '48503' => '48,503'
                )
                ),
            'ss2' => array(
                    '25' => array(
                        '10974' => '10,974'
                    ),
                    '50' => array(
                        '18388' => '18,388'
                    ),
                    '75' => array(
                        '25643' => '25,643'
                    ),
                    '1cr' => array(
                        '33321' => '33,321'
                    ),
                    '2cr' => array(
                        '61655' => '61,655'
                    ),
                    '3cr' => array(
                        '89730' => '89,730'
                    )
                    ),
            'ss3' => array(
                '25' => array(
                    '16016' => '16,016'
                ),
                '50' => array(
                    '26836' => '26,836'
                ),
                '75' => array(
                    '37425' => '37,425'
                ),
                '1cr' => array(
                    '48630' => '48,630'
                ),
                '2cr' => array(
                    '89982' => '89,982'
                ),
                '3cr' => array(
                    '130957' => '1,30,957'
                )
                ),
              'ssc1' => array(
                '25' => array(
                    '6920' => '6,920'
                ),
                '50' => array(
                    '11596' => '11,596'
                ),
                '75' => array(
                    '16171' => '16,171'
                ),
                '1cr' => array(
                    '21013' => '21,013'
                ),
                '2cr' => array(
                    '38881' => '38,881'
                ),
                '3cr' => array(
                    '56587' => '56,587'
                )
                ),
            'ssc2' => array(
                '25' => array(
                    '12803' => '12,803'
                ),
                '50' => array(
                    '21452' => '21,452'
                ),
                '75' => array(
                    '29917' => '29,917'
                ),
                '1cr' => array(
                    '38874' => '38,874'
                ),
                '2cr' => array(
                    '71930' => '71,930'
                ),
                '3cr' => array(
                    '104685' => '1,04,685'
                )
                ),
            'ssc3' => array(
                '25' => array(
                    '18685' => '18,685'
                ),
                '50' => array(
                    '31309' => '31,309'
                ),
                '75' => array(
                    '43663' => '43,663'
                ),
                '1cr' => array(
                    '56735' => '56,735'
                ),
                '2cr' => array(
                    '104980' => '1,04,980'
                ),
                '3cr' => array(
                    '152784' => '1,52,784'
                )
                ),
            'sscc1' => array(
                '25' => array(
                    '7909' => '7,909'
                ),
                '50' => array(
                    '13252' => '13,252'
                ),
                '75' => array(
                    '18482' => '18,482'
                ),
                '1cr' => array(
                    '24015' => '24,015'
                ),
                '2cr' => array(
                    '44436' => '44,436'
                ),
                '3cr' => array(
                    '64670' => '64,670'
                )
                ),
        'sscc2' => array(
            '25' => array(
                '14632' => '14,632'
            ),
            '50' => array(
                '24517' => '24,517'
            ),
            '75' => array(
                '34191' => '34,191'
            ),
            '1cr' => array(
                '44428' => '44,428'
            ),
            '2cr' => array(
                '82206' => '82,206'
            ),
            '3cr' => array(
                '119640' => '1,19,640'
            )
            ),
            'sscc3' => array(
                '25' => array(
                    '21355' => '21,355'
                ),
                '50' => array(
                    '35782' => '35,782'
                ),
                '75' => array(
                    '49900' => '49,900'
                ),
                '1cr' => array(
                    '64840' => '64,840'
                ),
                '2cr' => array(
                    '119977' => '1,19,977'
                ),
                '3cr' => array(
                    '174610' => '1,74,610'
                )
                )
        );

    }

    public function getSummodel($upp){
        return $this->_getSummodel($upp);
    }

    private function _getSummodel($upp){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $inputPost = $this->input->post();
            $sumAssuedValue = 0;
            $sumInsured = (int)$inputPost['sum_insured'];
            $includeSpouse = (int)$inputPost['includeSpouse'];
            $childData = (int)$inputPost['childData'];
            $annualWallet = (int)$inputPost['annualWallet'];
            $tenure = (int)$inputPost['tenure'];
            $plantype = (int)$inputPost['plantype'];
            $upppremium = (int)$upp['upptotalpremium'];
            $pasum_insured = (int)$upp['pasum'];
            $acci_hospital = (int)$upp['accidenthospi'];
            $credit_shield = (int)$upp['creditshield'];
            $critical_ill = (int)$upp['criticalill'];
            $uppchecked = (int)$inputPost['includeupp'];

            $getPremiumData = $this->getPremiumData();

            if($includeSpouse == 0){
                $sunFunct = $this->getNamesSum();
                $getNamesSum = $sunFunct[$sumInsured];
                if($tenure == 0 || $tenure == 1){  $t1s = $getPremiumData['s1']; $premiumDataload = $t1s[$getNamesSum]; }
                    if($tenure == 2){ $t2s = $getPremiumData['s2']; $premiumDataload = $t2s[$getNamesSum]; }
                        if($tenure == 3){ $t3s = $getPremiumData['s3']; $premiumDataload = $t3s[$getNamesSum]; }
            } else {

                if($childData == 0){
                $sunFunct = $this->getNamesSum();
                $getNamesSum = $sunFunct[$sumInsured];
                 if($tenure == 0 || $tenure == 1){ $t1sc = $getPremiumData['ss1']; $premiumDataload = $t1sc[$getNamesSum]; }
                    if($tenure == 2){ $t2sc = $getPremiumData['ss2']; $premiumDataload = $t2sc[$getNamesSum]; }
                        if($tenure == 3){ $t3sc = $getPremiumData['ss3']; $premiumDataload = $t3sc[$getNamesSum]; }
                }

                if($childData == 1){
                    $sunFunct = $this->getNamesSum();
                    $getNamesSum = $sunFunct[$sumInsured];
                    if($tenure == 0 || $tenure == 1){ $t1sc1 = $getPremiumData['ssc1']; $premiumDataload = $t1sc1[$getNamesSum]; }
                       if($tenure == 2){ $t2sc1 = $getPremiumData['ssc2']; $premiumDataload = $t2sc1[$getNamesSum]; }
                           if($tenure == 3){ $t3sc1 = $getPremiumData['ssc3']; $premiumDataload = $t3sc1[$getNamesSum]; }
                }
                
                if($childData == 2){
                    $sunFunct = $this->getNamesSum();
                    $getNamesSum = $sunFunct[$sumInsured];
                    if($tenure == 0 || $tenure == 1){ $t1sc2 = $getPremiumData['sscc1']; $premiumDataload = $t1sc2[$getNamesSum]; }
                       if($tenure == 2){ $t2sc2 = $getPremiumData['sscc2']; $premiumDataload = $t2sc2[$getNamesSum]; }
                           if($tenure == 3){ $t3sc2 = $getPremiumData['sscc3']; $premiumDataload = $t3sc2[$getNamesSum]; }
                }
            }

            if(!empty($sumInsured)) {
                $arrayKeysV = array_keys($premiumDataload);
            $messuredValue = (int)$arrayKeysV[0];
            if($annualWallet == 0){
                $sumAssuedValue = $messuredValue;
            } else {
                if($plantype == 1){ $sumAssuedValue = 999+$messuredValue; }
                    if($plantype == 2){ $sumAssuedValue = 1999+$messuredValue; }
                        if($plantype == 3){ $sumAssuedValue = 1999+$messuredValue; }
            }

        }

         if($uppchecked == 1){
            $errorResponce['bundle_premium'] = (int)$sumAssuedValue;
            $errorResponce['upp_premium'] = (int)$upppremium;
            $errorResponce['total_premium'] = (int)$sumAssuedValue+$upppremium;
            $errorResponce['pa'] = (int)$pasum_insured;
            $errorResponce['hospi'] = (int)$acci_hospital;
            $errorResponce['credit'] = (int)$credit_shield;
            $errorResponce['critical'] = (int)$critical_ill;
            $errorResponce['final'] = (int)$upppremium;
            $errorResponce['status'] = true;

         }

         if($uppchecked == 0){

            $errorResponce['bundle_premium'] = (int)$sumAssuedValue;
            $errorResponce['upp_premium'] = 0;
            $errorResponce['total_premium'] = (int)$sumAssuedValue;
            $errorResponce['pa'] = 0;
            $errorResponce['hospi'] = 0;
            $errorResponce['credit'] = 0;
            $errorResponce['critical'] = 0;
            $errorResponce['final'] = 0;
            $errorResponce['status'] = true;

         }
            
                
            
            
        } else {
            $errorResponce['status'] = false;
            $errorResponce['message'] = "404 Error Page";
        }
        return $errorResponce;
    }

    public function getInsertCommandbundle(){
        return $this->_getInsertCommandbundle();
    }

    private function _getInsertUpdateCustomerData($thispost){

        $cusData = array(
			'cus_card_name' 	    => $this->security->xss_clean($thispost['lms_car_card_holder_name']),
			'cus_relation_ishued' 	=> $this->security->xss_clean($thispost['lms_car_relation_insured']),
			'cus_title' 	        => $this->security->xss_clean($thispost['lms_car_salut']),
			'first_name'	        => $this->security->xss_clean($thispost['lms_car_fname']),
			'last_name' 	        => $this->security->xss_clean($thispost['lms_car_lname']),
			'date_of_birth'	        => $this->security->xss_clean($thispost['lms_car_dob']),
            'cust_age'              => $this->security->xss_clean($thispost['lms_car_age']),
            'cust_gender' 	        => $this->security->xss_clean($thispost['lms_car_gender']),
            'cust_pan' 		        => $this->security->xss_clean($thispost['lms_car_pan']),
            'cust_street1' 	        => $this->security->xss_clean($thispost['lms_car_add1']),
            'cust_street2' 	        => $this->security->xss_clean($thispost['lms_car_add2']),
            'cust_street3'      	=> $this->security->xss_clean($thispost['lms_car_add3']),
            'cust_zip' 		        => $this->security->xss_clean($thispost['lms_car_zip']),
            'cust_state' 	        => $this->security->xss_clean($thispost['lms_car_state']),
            'cust_city' 	        => $this->security->xss_clean($thispost['lms_car_city']),
            'cust_email' 	        => $this->security->xss_clean($thispost['lms_car_email']),
            'cust_phone' 	        => $this->security->xss_clean($thispost['lms_car_mobile']),
            'cust_type' 	        => $this->security->xss_clean($thispost['lms_car_cus_type']),
            'marital_status'        => $this->security->xss_clean($thispost['lms_car_pro_marital']),
            'occupation'	        => $this->security->xss_clean($thispost['lms_car_pro_occupation']),
            'emergency_contact_num' => $this->security->xss_clean($thispost['lms_car_pro_emergency']),
			'cus_customer' 		    => $this->security->xss_clean($thispost['lms_cus_customer']),
			'cus_language' 		    => $this->security->xss_clean($thispost['lms_cus_language']),
			'cus_emi' 			    => $this->security->xss_clean($thispost['lms_cus_emi']),
			'cus_emi_yr' 		    => $this->security->xss_clean($thispost['lms_cus_emi_yr']),
			'processing_fee	'	    => $this->security->xss_clean($thispost['lms_cus_pfee']),
			'business_type'	        => $this->security->xss_clean($thispost['lms_cus_tbusins']),
			'created_by'            => $this->security->xss_clean($this->session->userdata('emp_id')),
        );
        
        if($this->leadUpdateId == false){

            $this->db->set($cusData)->insert('tbl_customer');
        $customerId = $this->db->insert_id();
        $this->customerId = $customerId;
        if($this->customerId){
            $this->_getInsertLead($thispost);
        }
        
        } else {

            $this->db->set($cusData)->where('cust_id',$this->customerId)->update('tbl_customer');
            $this->_getInsertLead($thispost);
        }

    }

    private function _getInsertLead($thispost){
        $applicationNumber = $this->Lms_car_model->generateApplicationNumber();
        
        $subChannel = "";
		if($thispost['lms_car_campaign_name'] != FALSE){
				$subChannel = $thispost['lms_car_campaign_name'];
        }
        
        $leadData['category'] = $this->security->xss_clean($thispost['lms_car_category']);
        $leadData['line_of_business'] = $this->security->xss_clean($thispost['lms_car_line_of_business']);
        $leadData['target_date'] = $this->security->xss_clean($thispost['lms_car_target_date']);
        $leadData['TSE_BDR_code'] = $this->security->xss_clean($thispost['lms_car_tse_bar_code']);
        $leadData['TL_code'] = $this->security->xss_clean($thispost['lms_car_tl_code']);
        $leadData['SM_code'] = $this->security->xss_clean($thispost['lms_car_sm_code']);
        $leadData['bank_verifier_id'] = $this->security->xss_clean($thispost['lms_car_bank_verify_id']);
        $leadData['case_id'] = $this->security->xss_clean($thispost['lms_car_case_id']);
        $leadData['payment_type'] = $this->security->xss_clean($thispost['lms_car_payment_type']);
        $leadData['sub_channel'] = $this->security->xss_clean($subChannel);
        $leadData['HDFC_card_relationship_no'] = $this->security->xss_clean($thispost['lms_car_hdfc_card_relno']);
        $leadData['HDFC_card_last_4_digits'] = $this->security->xss_clean($thispost['lms_car_hdfc_card_4digt']);
        $leadData['lead_details'] = $this->security->xss_clean($thispost['lms_car_deatil_lead']);
        $leadData['aaa_number'] = $this->security->xss_clean($thispost['lms_aaa_number']);
        
        $leadData['lead_status'] = "Lead Generated";
        $leadData['updated_on'] = date("Y-m-d G:i:s");
        
        if($this->leadUpdateId == false){
            $this->xapplicationNumber = $applicationNumber;
            $leadData['created_on'] = date("Y-m-d G:i:s");
            $leadData['created_by'] = $this->session->userdata('emp_id');
            $leadData['lead_application_id'] = $this->security->xss_clean($this->xapplicationNumber);
            $leadData['customer_id'] = $this->customerId;
		$this->db->set($leadData)->insert('tbl_lead');
		$leadId = $this->db->insert_id();
		$this->leadId = $leadId;
		$leadData = array(
			'customerId' => $this->customerId,
			'leadId' 	=> $this->leadId,
			'leadNumber' => $applicationNumber,
        );
        $this->session->set_userdata($leadData);
        if($this->leadId){
            $this->_getInsertproductdata($thispost);
        }

    } else {
        
        $this->db->set($leadData)->where('lead_id',$this->leadId)->update('tbl_lead');
        $this->_getInsertproductdata($thispost);
    }
    }

    private function _getInsertproductdata($thispost){

        $productData['product_type'] = $this->security->xss_clean($thispost['lms_car_line_of_business']);
        $productData['sum_insured'] = $this->security->xss_clean($thispost['lms_car_sum_insured']);
        $productData['lms_premium'] = $this->security->xss_clean($thispost['total_premium']);
        
         if($this->leadUpdateId == false){
            $productData['customer_id'] = $this->customerId;
            $productData['lead_id'] = $this->leadId;
           $this->db->set($productData)->insert('tbl_product');
         } else {
            $this->db->set($productData)->where('lead_id',$this->leadId)->update('tbl_product');
         }

        $productArray['bundle_pa_sum_insured'] = $this->security->xss_clean($thispost['lms_car_sum_insured']);
        $productArray['bundle_include_spouse'] = ($thispost['lms_include_spouse'] ? $thispost['lms_include_spouse'] : 0);
        $productArray['bundle_child_s'] = ($thispost['lms_include_spouse'] ? $thispost['lms_chlds_count'] : 0);
        $productArray['bundle_spouse_dob'] = ($thispost['lms_include_spouse'] ? $thispost['lms_car_spouse_dob'] : '');
        $productArray['bundle_child_one_dob'] = (((int)$thispost['lms_chlds_count'] == 1 || (int)$thispost['lms_chlds_count'] == 2) ? $thispost['lms_car_child_one_dob'] : '');
        $productArray['bundle_child_two_dob'] = (((int)$thispost['lms_chlds_count'] == 2) ? $thispost['lms_car_child_two_dob'] : '');
        $productArray['bundle_spouse_name'] = ($thispost['lms_include_spouse'] ? $thispost['lms_car_spouse_name'] : '');
        $productArray['bundle_child_one_name'] = (((int)$thispost['lms_chlds_count'] == 1 || (int)$thispost['lms_chlds_count'] == 2) ? $thispost['lms_car_child_one_name'] : '');
        $productArray['bundle_child_two_name'] = (((int)$thispost['lms_chlds_count'] == 2) ? $thispost['lms_car_child_two_name'] : '');
        $productArray['bundle_annual_wallet'] = ($thispost['lms_car_waller_offering'] ? $thispost['lms_car_waller_offering'] : 0);
        $productArray['bundle_tenure'] = ($thispost['lms_car_tenure'] ? $thispost['lms_car_tenure'] : 0);
        $productArray['bundle_plan'] = ($thispost['lms_car_plan_type'] ? $thispost['lms_car_plan_type'] : 0);
        $productArray['bundle_premium_amount'] = $this->security->xss_clean($thispost['lms_est_premium']);
        //
         $productArray['bundle_upp_type_of_loan'] = $this->security->xss_clean($thispost['lms_bundle_upp_type_loan']);
         $productArray['bundle_upp_loan_amount'] = $this->security->xss_clean($thispost['lms_bundle_upp_loan_amount']);
        $productArray['bundle_upp_tenure'] = $this->security->xss_clean($thispost['lms_bundle_upp_tenure']);
        $productArray['bundle_pa_sum'] = $this->security->xss_clean($thispost['pa_sum']);
         $productArray['bundle_hospi'] = $this->security->xss_clean($thispost['acci_hosp']);
        $productArray['bundle_credit'] = $this->security->xss_clean($thispost['credit_shied']);
         $productArray['bundle_critical'] = $this->security->xss_clean($thispost['critical_ill']);
         $productArray['bundle_include_upp'] = $this->security->xss_clean($thispost['lms_bundle_upp']);
         $productArray['bundle_upp_total_prem'] = $this->security->xss_clean($thispost['upp_tot_pre']);
         $productArray['total_premium'] = $this->security->xss_clean($thispost['total_premium']);

        

        if($this->leadUpdateId == false){
            $productArray['bundle_createdOn'] = date("Y-m-d G:i:s");
            $productArray['bundle_lead_id'] = $this->leadId;
        $this->db->set($productArray)->insert('tbl_lead_bundle_product');
        } else {
            $this->db->set($productArray)->where('bundle_lead_id',$this->leadId)->update('tbl_lead_bundle_product');
        }
        $this->_getInsertproposalData($thispost);
    }

    private function _getInsertproposalData($thispost){
        $policyStartDate = $thispost['pa_pro_policy_sdate'];
        $proposalData['customer_id'] = $this->customerId;
        $proposalData['new_policy_start'] = $policyStartDate;
        $proposalData['created_by'] = $this->session->userdata('emp_id');

        if($this->leadUpdateId == false){
            $proposalData['lead_id'] = $this->leadId;
        $this->db->set($proposalData)->insert('tbl_propsal');
        } else {
            $this->db->set($proposalData)->where('lead_id',$this->leadId)->update('tbl_propsal');
        }
        $this->_getinsertnomineeData($thispost);
    }

    private function _getinsertnomineeData($thispost){
        
        $nomineeData['nominee_name'] = $this->security->xss_clean($thispost['pa_pro_nname']);
        $nomineeData['nominee_age'] = $this->security->xss_clean($thispost['pa_pro_nomie_age']);
        $nomineeData['nominee_relationship'] = $this->security->xss_clean($thispost['pa_pro_nomie_relation']);
        $nomineeData['appointee_name'] = $this->security->xss_clean($thispost['pa_pro_nameofappoint']);
        $nomineeData['appointee_relationship'] = $this->security->xss_clean($thispost['pa_pro_appoint_relation']);
        $nomineeData['created_by'] = $this->session->userdata('emp_id');

        if($this->leadUpdateId == false){
            $nomineeData['customer_id'] = $this->customerId;
            $nomineeData['lead_id'] = $this->leadId;
        $this->db->set($nomineeData)->insert('tbl_nominee');
        } else {
            $this->db->set($nomineeData)->where('lead_id',$this->leadId)->update('tbl_nominee');
        }
        $this->_getinsertComment($thispost);
    }

    private function _getinsertComment($thispost){
        if($thispost['lms_car_comment'] != ''){
			$commentData = array(
				'comment'	=> $thispost['lms_car_comment'],
				'lead_id'	=> $this->leadId,
				'status'  	=> '1',
				'created_on' => $this->session->userdata('emp_id'),
				'created_by' => date("Y-m-d G:i:s")
			);
            $this->db->set($commentData)->insert('tbl_comments');
            $this->Useractivity->getInsertHistory(array(
                'emp_id' => $this->session->userdata('emp_id'),
                'leadId' => $this->leadId,
                'type' => 1, //lead status changing,
                'leadData' => '',
                'ip_address' => $this->input->ip_address()
                ));
		}
    }

    private function _getInsertCommandbundle(){
		
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $thispost = $this->input->post();
            $inputPostleadid = $thispost['hiddenleadId'];
			
            if(empty($inputPostleadid)){

    			$checkDuplicate = array(
    			'tbl_customer.first_name' 	    => $this->security->xss_clean($thispost['lms_car_fname']),
                'tbl_customer.cust_email' 	        => $this->security->xss_clean($thispost['lms_car_email']),
                'tbl_customer.cust_phone' 	        => $this->security->xss_clean($thispost['lms_car_mobile']),
    			'tbl_lead.line_of_business'		=> 'Bundle PA'
    			);
    			
    			$countRows = $this->db->join('tbl_lead','tbl_lead.customer_id = tbl_customer.cust_id')->where($checkDuplicate)->get('tbl_customer');
    			
    			if($countRows->num_rows() > 0){
    			$errorResponce['message'] = 'Lead already existed with name and mobile and email id details';
                $errorResponce['status'] = false;
    			return $errorResponce;
    			exit;
    			}

            }
			
            if(!empty($inputPostleadid)){
                $this->leadUpdateId = true;
                $tbllead = $this->db->select('lead_id,customer_id,lead_application_id')->where('lead_id',$inputPostleadid)->get('tbl_lead');
                if($tbllead->num_rows()>0){
                    $tblresult = $tbllead->row_object();
                    $this->leadId = $tblresult->lead_id;
                    $this->customerId = $tblresult->customer_id;
                }
                $this->xapplicationNumber = $tblresult->lead_application_id;
            }
            $this->_getInsertUpdateCustomerData($thispost);
            $errorResponce['message'] = $this->xapplicationNumber;
            $errorResponce['status'] = true;
        } else {
            $errorResponce['status'] = false;
            $errorResponce['message'] = "404 Error Page";
        }
        return $errorResponce;
    }

}
?>
