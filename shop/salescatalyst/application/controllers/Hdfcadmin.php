<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
require_once FILE_PATH."/application/third_party/PHPExcel.php";
require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";
class Hdfcadmin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->fileExtenisions = array('xlsx');
        $this->fileTarget = './assets/uploads/users/';
		$this->objPHPExcel = new PHPExcel();
		$this->LimitRows = 100;
		$this->totalRows = 0;
		$this->objReader     = PHPExcel_IOFactory::createReader("Excel2007");
    }

    public function index(){

            $this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
			$this->load->view('backend/upload-exel-hdfc-data');
			$this->load->view('backend_layout/layout_footer_inner');
    }

    public function getUploader(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->_getUploader();
        }
    }

    private function getLoadSupervisorData($username){
        $resultData = $this->db->where(array(
            'user_type_id' => '4',
            'user_name' => $username
        ))->get('tbl_users');
        return $resultData;
    }

    private function _getUploader(){

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $fristSup = 0;
            $twoSup = 0;
            $thirdSup = 0;
            $getFiles = $_FILES;
            $hdfcfileUpload = $getFiles['hdfcfileUpload'];
            $usersfilename = basename($hdfcfileUpload['name']);
            $nameextension = pathinfo($usersfilename,PATHINFO_EXTENSION);
            if(in_array($nameextension,$this->fileExtenisions)){
                $upload_path    = $this->fileTarget;
                $fileTempPath   =   $upload_path.$usersfilename;
                if(move_uploaded_file($hdfcfileUpload['tmp_name'], $fileTempPath)){
                    
                    $uploadFilepath = $upload_path.$usersfilename;
                    $objPHPExcel = PHPExcel_IOFactory::load($uploadFilepath);
                    $worksheetData = $this->objReader->listWorksheetInfo($uploadFilepath);
					$totalRows = $worksheetData[0]['totalRows'];
                    $totalColumns  = $worksheetData[0]['totalColumns'];
                    $uploadStatus = 0;
                    $uploaderchecker = 0;
                    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    if($uploaderchecker == 0){
                     for($k=1;$k<=$totalRows;$k++){
                        if($k == 1){

                           $usernamecolumn = strtolower($worksheet->getCellByColumnAndRow(1, $k)->getValue());
                           $passwordcolumn = strtolower($worksheet->getCellByColumnAndRow(2, $k)->getValue());
                           $empnamecolumn = strtolower($worksheet->getCellByColumnAndRow(3, $k)->getValue());
                           $empcodecolumn = strtolower($worksheet->getCellByColumnAndRow(4, $k)->getValue());
                           $mobilecolumn = strtolower($worksheet->getCellByColumnAndRow(5, $k)->getValue());
                           $emailIdcolumn = strtolower($worksheet->getCellByColumnAndRow(6, $k)->getValue());
                           $Imddcolumn = strtolower($worksheet->getCellByColumnAndRow(7, $k)->getValue());
                           $bankverifyId = strtolower($worksheet->getCellByColumnAndRow(8, $k)->getValue());
                           $staffCodecolumn = strtolower($worksheet->getCellByColumnAndRow(9, $k)->getValue());
                           $branchcolumn = strtolower($worksheet->getCellByColumnAndRow(10, $k)->getValue());
                           $channelcolumn = strtolower($worksheet->getCellByColumnAndRow(11, $k)->getValue());
                           $statecolumn = strtolower($worksheet->getCellByColumnAndRow(12, $k)->getValue());
                           $citycolumn = strtolower($worksheet->getCellByColumnAndRow(13, $k)->getValue());
                           $userlocationcolumn = strtolower($worksheet->getCellByColumnAndRow(14, $k)->getValue());
                           $supervisor1column = strtolower($worksheet->getCellByColumnAndRow(15, $k)->getValue());
                           $supervisor2column = strtolower($worksheet->getCellByColumnAndRow(16, $k)->getValue());
                           $supervisor3column = strtolower($worksheet->getCellByColumnAndRow(17, $k)->getValue());
                            
                        if( trim($usernamecolumn) != strtolower('user name') ||
                               trim($passwordcolumn) != strtolower('password') ||
                                   trim($empnamecolumn) != strtolower('emp name') ||
                                        trim($empcodecolumn) != strtolower('emp code') || 
                                            trim($mobilecolumn) != strtolower('mobile number') || 
                                                trim($emailIdcolumn) != strtolower('email id') ||
                                                    trim($Imddcolumn) != strtolower('IMD CODE') ||
                                                        trim($bankverifyId) != strtolower('BANK VERIFIER ID') ||
                                                            trim($staffCodecolumn) != strtolower('staff code') ||
                                                                trim($branchcolumn) != strtolower('BRANCH') ||
                                                                    trim($channelcolumn) != strtolower('CHANNEL') ||
                                                                        trim($statecolumn) != strtolower('STATE') ||
                                                                            trim($citycolumn) != strtolower('CITY') ||
                                                                                trim($userlocationcolumn) != strtolower('USER LOCATION') ||
                                                                                    trim($supervisor1column) != strtolower('SUPERVISOR 1') ||
                                                                                        trim($supervisor2column) != strtolower('SUPERVISOR 2') ||
                                                                                            trim($supervisor3column) != strtolower('SUPERVISOR 3')
                                                        ){

                                                    $uploadStatus = 1;
                                                    $fileReturn['columstaus'] = false;

                                                }

                                            }

                                                if($k > 1 && $uploadStatus == 0){
                                                    
                                                    $usernamevalue = $worksheet->getCellByColumnAndRow(1, $k)->getValue();
                                                    $passwordvalue = $worksheet->getCellByColumnAndRow(2, $k)->getValue();
                                                    $empnamevalue = $worksheet->getCellByColumnAndRow(3, $k)->getValue();
                                                    $empcodevalue = $worksheet->getCellByColumnAndRow(4, $k)->getValue();
                                                    $mobilevalue = $worksheet->getCellByColumnAndRow(5, $k)->getValue();
                                                    $emailIdvalue = $worksheet->getCellByColumnAndRow(6, $k)->getValue();
                                                    $imdCode = $worksheet->getCellByColumnAndRow(7, $k)->getValue();
                                                    $bankverifiedId = $worksheet->getCellByColumnAndRow(8, $k)->getValue();
                                                    $staffCode = $worksheet->getCellByColumnAndRow(9, $k)->getValue();
                                                    $branchData = $worksheet->getCellByColumnAndRow(10, $k)->getValue();
                                                    $branchChannel = $worksheet->getCellByColumnAndRow(11, $k)->getValue();
                                                    $state = $worksheet->getCellByColumnAndRow(12, $k)->getValue();
                                                    $city = $worksheet->getCellByColumnAndRow(13, $k)->getValue();
                                                    $userlocation = $worksheet->getCellByColumnAndRow(14, $k)->getValue();
                                                    $firstSupervisior = $worksheet->getCellByColumnAndRow(15, $k)->getValue();
                                                    $secondSupervisior = $worksheet->getCellByColumnAndRow(16, $k)->getValue();
                                                    $thirdSupervisior = $worksheet->getCellByColumnAndRow(17, $k)->getValue();

                                                    if(!empty($firstSupervisior)){
                                                        $getSupervisiorName = $this->getLoadSupervisorData($firstSupervisior);
                                                        if($getSupervisiorName->num_rows() > 0){
                                                            $firstObject = $getSupervisiorName->row_object();
                                                            $fristSup = $firstObject->emp_id;
                                                        }
                                                    }
                                                    if(!empty($secondSupervisior)){
                                                        $getSupervisiorName = $this->getLoadSupervisorData($secondSupervisior);
                                                        if($getSupervisiorName->num_rows() > 0){
                                                            $firstObject = $getSupervisiorName->row_object();
                                                            $twoSup = $firstObject->emp_id;
                                                        }
                                                    }
                                                    if(!empty($thirdSupervisior)){
                                                        $getSupervisiorName = $this->getLoadSupervisorData($thirdSupervisior);
                                                        if($getSupervisiorName->num_rows() > 0){
                                                            $firstObject = $getSupervisiorName->row_object();
                                                            $thirdSup = $firstObject->emp_id;
                                                        }
                                                    }

                                                    if(
                                                        (empty($usernamevalue) || ($usernamevalue == '')) || 
                                                        (empty($passwordvalue) || ($passwordvalue == '')) || 
                                                        (empty($empnamevalue) || ($empnamevalue == '')) || 
                                                        (empty($empcodevalue) || ($empcodevalue == '')) ||
                                                        (empty($mobilevalue) || ($mobilevalue == '')) ||
                                                        (empty($emailIdvalue) || ($emailIdvalue == '')) ||
                                                        //(empty($imdCode) || ($imdCode == '')) ||
                                                        (empty($bankverifiedId) || ($bankverifiedId == '')) ||
                                                        //(empty($staffCode) || ($staffCode == '')) || 
                                                        (empty($branchData) || ($branchData == '')) ||
                                                        (empty($branchChannel) || ($branchChannel == '')) ||
                                                        (empty($state) || ($state == '')) ||
                                                        (empty($city) || ($city == '')) ||
                                                        (empty($userlocation) || ($userlocation == '')) ||
                                                        (empty($firstSupervisior) || ($firstSupervisior == ''))

                                                    ){

                                                        $fileReturn['errorFeilds'] = true;

                                                    } else {
                                                        $this->db->trans_begin();
                                                        $this->db->set(array(

                                                            'user_name' => $usernamevalue,
                                                            'password' => MD5($passwordvalue),
                                                            'emp_name' => $empnamevalue,
                                                            'emp_code' => $empcodevalue,
                                                            'mobile_number' => $mobilevalue,
                                                            'email_address' => $emailIdvalue,
                                                            'user_bank_verification_id' => $bankverifiedId,
                                                            'user_imd_code' => $imdCode,
                                                            'user_staff_code' => $staffCode,
                                                            'user_staff' => $branchData,
                                                            'Channel' => $branchChannel,
                                                            'state' => $state,
                                                            'city' => $city,
                                                            'user_location' => $userlocation,
                                                            'user_type_id' => 2,
                                                            'supervisor_id' => $fristSup.','.$twoSup.','.$thirdSup

                                                        ))->insert('tbl_users');

                                                        $insertId = $this->db->insert_id();
                                                        if( $insertId > 0){
                                                            for($m=1;$m<=12;$m++){

                                                                $dataInsert['prdt_m_id'] = $m;
                                                                $dataInsert['user_id'] = $insertId;
                                                                $dataInsert['privilage'] = 1;
                                                                $dataInsert['created_on'] = date('Y-m-d H:i:s');

                                                                $this->db->insert('tbl_user_prdt_privilage',$dataInsert);
                                                            }
                                                        }

                                                        if ($this->db->trans_status() === FALSE){
                                                            $this->db->trans_rollback();
                                                            $fileReturn['rollstatus'] = true;
                                                        } else {
                                                            $fileReturn['rollstatus'] = false;
                                                            $this->db->trans_commit();
                                                        }

                                                        $fileReturn['errorFeilds'] = false;
                                                    }
                                                    
                                                    $fileReturn['columstaus'] = true;
                                                }
                                                    
                    }
                    $uploaderchecker++;
                }
            }
                
                $fileReturn['filestatus'] = true;
            } else {
                $fileReturn['filestatus'] = false;
            }
        } else {
                $fileReturn['filestatus'] = false;
        }
        echo json_encode($fileReturn);
    }
}

}
