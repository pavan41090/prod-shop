<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
require_once FILE_PATH."/application/third_party/PHPExcel.php";
require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";
class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
        error_reporting(-1);
        
		$loginSession = $this->session->userdata('loginSession');
		if(empty($loginSession)){
			redirect(base_url('login'));
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

       $searchResult = $this->Adminmodel->getSearchDownloadQuery();

        if($searchResult['status']){

            $v=1;
            $rowCount = 2;
            foreach ($searchResult['rows']->result() as $key => $value) {
                # code...

                $comaddress = json_decode($value->shop_communication_address);
                $reskaddress = json_decode($value->shop_resk_addresss);
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