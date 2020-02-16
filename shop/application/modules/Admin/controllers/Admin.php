<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
require_once FILE_PATH."/application/third_party/PHPExcel.php";
require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
        error_reporting(0);
        $stringRd = 'abcdefghijklmnopqrstuvwxyz1234567890';
        $md5before = str_shuffle(substr($stringRd,0,12));
        define('STRINGRAND',MD5($md5before));
		$loginSession = $this->session->userdata('loginSession');
		if(empty($loginSession)){
			redirect(base_url('login'));
		}
    }
    
    public function sehatindex(){

        try{

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->checkLogin();
            }
            $this->load->view('Admin/home_view-sehat');

        } catch(Exception $error){
             log_message('error','Something went wrong in'.__FUNCTION__.' Error File : '.json_encode($error));
        }
        
    }

    public function index(){

        try{

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->checkLogin();
            }
            $this->load->view('Admin/home_view');

        } catch(Exception $error){
             log_message('error','Something went wrong in'.__FUNCTION__.' Error File : '.json_encode($error));
        }
        
    }

    private function getUploadFiles(){
            print_r($_FILES);
    }

    public function uploadLeadStatus(){

	    try{

	        if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->getUploadFiles();
                exit();
            }
	        $this->load->view('Admin/upload-doc-ment');
        } catch (Exception $error){
            log_message('error','Something went wrong in'.__FUNCTION__.' Error File : '.json_encode($error));
        }
    }

    public function sehatdownloaddata(){
        if($_SERVER['REQUEST_METHOD'] != "POST"){
            redirect(base_url('login'));
            exit();
        }

        $dfileName = 'SEHAT-shop-dukandar-suraksha-'.time().'.xlsx';  
        $shopobjPHPExcel = new PHPExcel();
        $shopobjPHPExcel->setActiveSheetIndex(0);
        $shopobjPHPExcel->getProperties()->setTitle("export")->setDescription("none");
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('B1', 'Unique ID');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('C1', 'Plan Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('D1', 'Family Type');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('E1', 'Sum Insured');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('F1', 'Premium');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('G1', 'Proposer Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('H1', 'DOB');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('I1', 'Address Line 1');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('J1', 'Address Line 2');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('K1', 'Address Line 3');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('L1', 'City');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('M1', 'State');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('N1', 'Pincode');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('O1', 'Email ID');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('P1', 'Mobile No');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('Q1', 'PAN Card No');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('R1', 'Nationality');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('S1', 'PPSD');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('T1', 'Bank Cust ID');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('U1', 'Member 1 Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('V1', 'Member 1 Rel');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('W1', 'Member 1 DOB');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('X1', 'Member 1 Gender');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Member 1 Height');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Member 1 Weight');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Member 2 Name');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Member 2 Rel');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Member 2 DOB');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Member 2 Gender');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Member 2 Height');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Member 2 Weight');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Member 3 Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Member 3 Rel');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Member 3 DOB');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Member 3 Gender');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Member 3 Height');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Member 3 Weight');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Member 4 Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Member 4 Rel');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Member 4 DOB');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Member 4 Gender');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Member 4 Height');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Member 4 Weight');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AS1', 'Member 5 Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Member 5 Rel');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Member 5 DOB');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Member 5 Gender');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Member 5 Height');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AX1', 'Member 5 Weight');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Nominee Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Nominee Age');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('BA1', 'Nominee Rel');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Appointee Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Appointee Rel');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('BD1', 'HDFC Bank EmpID');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('BE1', 'HDFC Bank Emp Mobile');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Billdesk Transaction Ref No');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Billdesk Payment Date');

        $searchResult = $this->Adminmodel->getsehatSearchDownloadQuery();

        if($searchResult['status']){

            $v=1;
            $rowCount = 2;
            foreach ($searchResult['rows']->result() as $key => $value) {

                $sur_member_details = json_decode($value->sur_member_details);
                $member_details_data = $sur_member_details[0];
                $member_details_data_two = $sur_member_details[1];
                $member_details_data_three = $sur_member_details[2];
                $member_details_data_four = $sur_member_details[3];
                $member_details_data_five = $sur_member_details[4];

                $shopobjPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $v);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->sur_unique_id);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->sur_plan_name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->sur_family_type);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->sur_sum_insured);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->sur_premium);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->sur_proposer_name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->sur_dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->sur_address_line_1);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->sur_address_line_2);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $value->sur_address_line_3);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $value->sur_city);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $value->sur_state);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $value->sur_pincode);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $value->sur_email_id);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $value->sur_mobile_number);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $value->sur_pan_card_number);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $value->sur_nationality);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $value->sur_ppsd);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $value->sur_bank_cust_id);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $member_details_data->member1name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $member_details_data->member1relation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $member_details_data->member1dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $member_details_data->member1gender);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $member_details_data->member1height);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $member_details_data->member1weight);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $member_details_data_two->member2name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $member_details_data_two->member2relation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $member_details_data_two->member2dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, $member_details_data_two->member2gender);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, $member_details_data_two->member2height);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, $member_details_data_two->member2weight);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount, $member_details_data_three->member3name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AH'.$rowCount, $member_details_data_three->member3relation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AI'.$rowCount, $member_details_data_three->member3dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AJ'.$rowCount, $member_details_data_three->member3gender);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AK'.$rowCount, $member_details_data_three->member3height);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AL'.$rowCount, $member_details_data_three->member3weight);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AM'.$rowCount, $member_details_data_four->member4name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AN'.$rowCount, $member_details_data_four->member4relation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AO'.$rowCount, $member_details_data_four->member4dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AP'.$rowCount, $member_details_data_four->member4gender);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AQ'.$rowCount, $member_details_data_four->member4height);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AR'.$rowCount, $member_details_data_four->member4weight);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AS'.$rowCount, $member_details_data_five->member5name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AT'.$rowCount, $member_details_data_five->member5relation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AU'.$rowCount, $member_details_data_five->member5dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AV'.$rowCount, $member_details_data_five->member5gender);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AW'.$rowCount, $member_details_data_five->member5height);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AX'.$rowCount, $member_details_data_five->member5weight);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AY'.$rowCount, $value->sur_nominee_name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('AZ'.$rowCount, $value->sur_nominee_age);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('BA'.$rowCount, $value->sur_nominee_relation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('BB'.$rowCount, $value->sur_appointee_name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('BC'.$rowCount, $value->sur_appointee_relation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('BD'.$rowCount, $value->sur_hdfc_bank_emp_id);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('BE'.$rowCount, $value->sur_hdfc_bank_emp_mobile);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('BF'.$rowCount, $value->sur_bill_desc_transfor_number);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('BG'.$rowCount, $value->sur_bill_desk_payment_date);

            $rowCount++;
            $v++;
            }

            $objWriter = PHPExcel_IOFactory::createWriter($shopobjPHPExcel, 'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$dfileName.'"');
            header('Cache-Control: max-age=0');
            $objWriter->save('php://output');
            $dataRes['status'] = true;

        } else {
            $dataRes['status'] = false;
            $dataRes['message'] = "No Records Available Between this dates!";
            echo json_encode($dataRes);
        }

    }

    public function downLoadShop(){

        if($_SERVER['REQUEST_METHOD'] != "POST"){
            redirect(base_url('login'));
            exit();
        }

        $dfileName = 'shop-dukandar-suraksha-'.time().'1.xlsx';  
        $shopobjPHPExcel = new PHPExcel();
        $shopobjPHPExcel->setActiveSheetIndex(0);
        $shopobjPHPExcel->getProperties()->setTitle("export")->setDescription("none");
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl No');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('B1', 'Order No');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('C1', 'Plan Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('D1', 'Premises to be Covered');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('E1', 'Insured Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('F1', 'Owners Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('G1', 'Gender');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('H1', 'Owners DOB');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('I1', 'Mobile Number');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('J1', 'Email ID');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('K1', 'Communication Address');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('L1', 'Pincode');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('M1', 'State');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('N1', 'City');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('O1', 'Risk Address');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('P1', 'Pincode');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('Q1', 'State');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('R1', 'City');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('S1', 'Nominee Name');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('T1', 'Nominee Relation');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('U1', 'Nominee DOB');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('V1', 'Account Number');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('W1', 'Auto Renew');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('X1', 'Employee Id');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('Y1', 'IMD Mobile Number');
        $shopobjPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Date of Order ID generation');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AA1', 'TxnReference No');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Txn Amount');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Txn Date');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Auth Status');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Auth Desc');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Error Status');
		$shopobjPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Error Description');

       $searchResult = $this->Adminmodel->getSearchDownloadQuery();

        if($searchResult['status']){

            $v=1;
            $rowCount = 2;
            foreach ($searchResult['rows']->result() as $key => $value) {
                # code...
				
				$numrows = $this->db->where('shop_id',$value->shop_sno)->order_by('sno','DESC')->limit('1')->get('tbl_shop_bill_res');
				if($numrows->num_rows() > 0){
				$tbl_shop_bill_res = $numrows->row_object();
				$shop_bill_res = json_decode($tbl_shop_bill_res->shop_bill_res);
				$msgshop_bill_res = $shop_bill_res->msg;
				$explodeshop_bill_res = explode('|',$msgshop_bill_res);
				}
                $comaddress = json_decode($value->shop_communication_address);
                $reskaddress = json_decode($value->shop_resk_addresss);
                $termsCondition = json_decode($value->shop_terms_conditions);
                $relationN = $value->shop_nominee_relation;
                $nomineRelationFun = realationshiofunction();
                $nominerelation = ((!empty($relationN) && ($relationN <= 7)) ? $nomineRelationFun[$relationN] : '');
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $v);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->lead_order_id);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $value->shop_plan_name .' Lakhs');
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, ($value->shop_premises_covered == '1' ? 'Shop' : 'Office' ));
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $value->shop_insured_name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $value->shop_owner_name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, ($value->shop_gender == '1' ? 'Male' : 'Female'));
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $value->shop_owner_dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $value->shop_mobile_number);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $value->shop_email_id);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $comaddress->communicationaddress);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $comaddress->CommunicationPincode);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $comaddress->CommunicationState);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $comaddress->CommunicationCity);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $reskaddress->riskaddress);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $reskaddress->riskPincode);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $reskaddress->riskState);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $reskaddress->riskCity);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $value->shop_nominee_name);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $nominerelation);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $value->shop_nominee_dob);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $value->shop_account_number);
               
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, ($termsCondition->autorenewaldata == 1 ? 'Yes' : 'No'));
                $shop_other_data = explode('|',$value->shop_other_data);
                if(empty($shop_other_data[0])){
                    $nameemplid = '';
                    $empmmlnumber = '';
                } else {
                    $nameemplid = $shop_other_data[2];
                    $empmmlnumber = $shop_other_data[3];
                }
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, ($nameemplid ? $nameemplid : $value->shop_employee_id));
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $empmmlnumber);
                $shopobjPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $value->shop_created_on);
				$shopobjPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, (!empty($explodeshop_bill_res) ? $explodeshop_bill_res[2] : $value->payment_transaction_id));
				$shopobjPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, (!empty($explodeshop_bill_res) ? $explodeshop_bill_res[4] : $value->shop_updated_on));
				$shopobjPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $tbl_shop_bill_res->createdOn);
				
				$stattusCoderes = array('0300'=>'Success','0399'=>'Invalid Authentication at Bank','NA'=>'Invalid Input in the Request Message','0002'=>'BillDesk is waiting for Response from Bank','0001'=>'Error at BillDesk');
				
				$shopobjPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, $explodeshop_bill_res[14]);
				$shopobjPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, $stattusCoderes[$explodeshop_bill_res[14]]);
				$shopobjPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, $explodeshop_bill_res[(count($explodeshop_bill_res)-3)]);
				$shopobjPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount, $explodeshop_bill_res[(count($explodeshop_bill_res)-2)]);
				

                $rowCount++;
                $v++;

            }

            $objWriter = PHPExcel_IOFactory::createWriter($shopobjPHPExcel, 'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$dfileName.'"');
            header('Cache-Control: max-age=0');
            $objWriter->save('php://output');
            $dataRes['status'] = true;

        } else {
            $dataRes['status'] = false;
            $dataRes['message'] = "No Records Available Between this dates!";
            echo json_encode($dataRes);
        }

    }

}