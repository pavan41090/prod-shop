<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	}
 
	public function generateQuoteXmlHome($xmlData){

		$Home_FirstName = $xmlData['Home_FirstName'];
		$Home_LastName = $xmlData['Home_LastName'];
		$Home_mx_DOB = $xmlData['Home_mx_DOB'];
		$Home_mx_State = $xmlData['Home_mx_State'];
		$Home_mx_City = $xmlData['Home_mx_City'];
		//$Home_mx_Zip = $xmlData['Home_mx_Zip'];
		$home_mobile = $xmlData['home_mobile'];
		$home_email = $xmlData['home_email'];
		$Home_mx_Zip = '560008';

		
      	$Home_plans = $xmlData['Home_plans'];
		switch ($Home_plans) {
      		case '0':
      			$homePlan = 'Silver';	
      			break;
      		case '1':
      			$homePlan = 'Gold';	
      			break;
      		case '1':
      			$homePlan = 'Platinum';	
      			break;
      		
      		default:
				$homePlan = 'Silver';	
      			break;
      	}      	
		$Home_policy_start = date('Y-m-d',strtotime($xmlData['Home_policy_start']));
		$Home_policy_end = date('Y-m-d',strtotime($xmlData['Home_policy_end']));
		
		



		$currentIp = $this->Common_model->get_ip();

		$xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:def="http://schemas.cordys.com/default">
   <soapenv:Header/>
   <soapenv:Body>
      <def:AmexQuoteHandler>
         <def:request>

<Session>
					<SessionData>
						<Index>1</Index>
						<InitTime>' . gmdate('D, d M Y H:i:s') . ' GMT</InitTime>
						<UserName>bhartiAxaHme</UserName>
						<Password>ineW/VKENK9UE45PyuIDtN2QRp9/1tDWYoi7zVW5stPB5edG7gmaMKD67pjWK6S4ebeezuHvBRiGObfrA0kMYTDA==</Password>
						<OrderNo>NA</OrderNo>
						<QuoteNo>NA</QuoteNo>
						<Route>INT</Route>
						<Contract>HME</Contract>
						<ProductType>HDF</ProductType>
						<Channel>HDFHME</Channel>
						<TransactionType>Quote</TransactionType>
						<TransactionStatus>Fresh</TransactionStatus>
						<ID>BBCF7910-C058-4F6E-9D66-DBBEC230D15D</ID>
						<UserAgentID>2C000123</UserAgentID>
						<Source>2C000123</Source>
					</SessionData>
					<Quote>
						<PolicyStartDate>'.$Home_policy_start.'</PolicyStartDate>
						<PolicyEndDate>'.$Home_policy_end.'</PolicyEndDate>
						<PlanSelected>'.$homePlan.'</PlanSelected>
					</Quote>
					<Client>
						<ClientType>Individual</ClientType>
						<CltDOB />
						<GivName>'.$Home_FirstName.'</GivName>
						<SurName>'.$Home_LastName.'</SurName>
						<EmailID>'.$home_email.'</EmailID>
						<MobileNo>'.$home_mobile.'</MobileNo>
						<TPClientRefNo>BagiAmex'.date('Ymd').time().'</TPClientRefNo>
						<CltSex />
						<Age>0</Age>
						<Salut />
						<Occupation />
						<CltAddr01 />
						<CltAddr02 />
						<CltAddr03 />
						<City />
						<State />
						<PinCode />
						<IPAddress>'.$currentIp.'</IPAddress>
						<NomineeName />
						<NomineeAge>0</NomineeAge>
						<NomineeRelation />
						<GSTNo />
					</Client>
				</Session>         
         </def:request>
      </def:AmexQuoteHandler>
   </soapenv:Body>
</soapenv:Envelope>'; 
		return $xml_post_string;
}

public function homeUpdateCustomerDetails($thisLeadid){

		$subChannel="";
			if($this->input->get_post('lms_car_campaign_name') != FALSE){
					$subChannel = $this->security->xss_clean($this->input->get_post('lms_car_campaign_name'));
			}
        $lmsEditLeadId	= $thisLeadid;   
		$cusUpdateData = array(
			'cus_card_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_card_holder_name')),
			'cus_relation_ishued' 	=> $this->security->xss_clean($this->input->get_post('lms_car_relation_insured')),
			'cus_title' 	=> $this->security->xss_clean($this->input->get_post('lms_car_salut')),
			'first_name'	=> $this->security->xss_clean($this->input->get_post('lms_car_fname')),
			'last_name' 	=> $this->security->xss_clean($this->input->get_post('lms_car_lname')),
			'date_of_birth'	=> $this->security->xss_clean($this->input->get_post('lms_car_dob')),
			'cust_gender' 	=> $this->security->xss_clean($this->input->get_post('lms_car_gender')),
			'cust_age'      => $this->security->xss_clean($this->input->get_post('lms_car_age')),
			'cust_pan' 		=> $this->security->xss_clean($this->input->get_post('lms_car_pan')),
			'cust_street1' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add1')),
			'cust_street2' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add2')),
			'cust_street3' 	=> $this->security->xss_clean($this->input->get_post('lms_car_add3')),
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
			'cust_type'	    => $this->security->xss_clean($this->input->get_post('lms_car_cus_type'))
		);

		$setUserArray = array('cust_id'=>"(SELECT customer_id FROM tbl_lead WHERE lead_id = $lmsEditLeadId)");
    	$this->db->set( $cusUpdateData )->where($setUserArray,"",false)->update('tbl_customer');
		$leadUpdateData = array(
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
			'vision_address'=>$this->input->get_post('lms_car_vision_address'),
			'sub_channel' =>$this->input->get_post('lms_car_campaign_name'),
			'HDFC_card_relationship_no' => $this->input->get_post('lms_car_hdfc_card_relno'),
			'HDFC_card_last_4_digits' => $this->input->get_post('lms_car_hdfc_card_4digt'),
			'lead_details'=>$this->input->get_post('lms_car_deatil_lead'),
			'aaa_number'=>$this->input->get_post('lms_aaa_number'),
			'created_by'=> $this->session->userdata('emp_id'),
			'lead_status'=>"Lead Generated",
			'lead_re_status' => "Sales Open",
			'sub_channel' =>$subChannel,
			'updated_by'  => $this->session->userdata('emp_id'),	
			'updated_on' => date('Y-m-d G:i:s')
		);
		
		$leadId = $this->db->set( $leadUpdateData )->where('lead_id',$lmsEditLeadId)->update('tbl_lead');

		if($leadId){
			$dataStatus['status'] = true;
		} else{
		   $dataStatus['status'] = false;
		}

		return $dataStatus;
		
    }


}