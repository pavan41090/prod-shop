<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
require_once FILE_PATH."/application/third_party/PHPExcel.php";
require_once FILE_PATH."/application/third_party/PHPExcel/IOFactory.php";
class DownloadLeadsExcel extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Common_model');
	    $this->load->model('Lms_car_model');
	    $this->load->model('User_model');
		
	}

    
    public function downloadExcelCommon(){

    	if ($this->session->userdata('logged_in') == TRUE) {
	
		    $this->data['module'] = 'leads'; 
			$this->data['sub_module'] = '';
			$this->data['title'] = "Dashboad - Lead Downloads";
			$this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('lms_view/lms_download_excel_common',$this->data);
			$this->load->view('layout/footer_inner');

		} else {
			
			redirect('user', 'refresh');
			
		}
    }



    public function createXLSProducts(){
		
    	$productType = $this->input->get_post('productType');
		
    	switch ($productType) {
    		case 'home':
    			$fileName = $this->generateExcelForHome();
				echo json_encode($fileName);
    			break;
    		case 'home_peei':
    			$fileName = $this->generateExcelForHomePEEI();
				echo json_encode($fileName);
    			break;
    		case 'combo':
    			$fileName = $this->generateExcelForCombo();
				echo json_encode($fileName);
    			break;

    		case 'combo_upp':
    			$fileName = $this->generateExcelForComboUPP();
				echo json_encode($fileName);
    			break;	
    		case 'paa':
    			$fileName = $this->generateExcelForPA();
				echo json_encode($fileName);
    			break;	

    		case 'office':
    			$fileName = $this->generateExcelForOffice();
				echo json_encode($fileName);
    			break;

    		case 'shop':
    			$fileName = $this->generateExcelForShop();
				echo json_encode($fileName);
    			break;	

    			
    		default:
    			# code...
    			break;
    	}
    }

    public function generateExcelForHome(){

    	$data = $this->Lms_car_model->getLeadsForExcel('Home','');

        $fileName = 'home-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

			// $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl_No');
			// $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead_id');
			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Branch Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Policy Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Contract Owner');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Inception');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Expiry');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Date of Declaration/Proposal/issue');
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Agent');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Agent Commission Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Staff');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Reference 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Reference 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'ACS ID');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gen Page');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Rating Flag (A/M)');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Locality');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Acc Reg');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Post code');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Situation');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'NCD');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'NCD1');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'T/Limit');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Const');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Business Code');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Plan Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Risk details 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'SI 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Acc 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'FOC 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sum Insured 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Premium 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Cls 1 (Premium Classes)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Risk 1 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Risk details 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'SI 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Acc 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'FOC 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Sum Insured 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Premium 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Cls 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Risk 2 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Risk details 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'SI 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Acc 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'FOC 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Sum Insured 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'Premium 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Cls 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Risk 3 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'Risk details 4');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'SI 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Acc 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'FOC 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Sum Insured 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Premium 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Cls 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Risk 4 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Risk details 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'SI 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Acc 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'FOC 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'Sum Insured 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BK1', 'Premium 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BL1', 'Cls 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BM1', 'Risk 5 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BN1', 'Risk details 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BO1', 'SI 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BP1', 'Acc 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'FOC 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BR1', 'Sum Insured 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BS1', 'Premium 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BT1', 'Cls 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BU1', 'Risk 6 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BV1', 'Risk details 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('BW1', 'SI 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('BX1', 'Acc 7');

			$objPHPExcel->getActiveSheet()->SetCellValue('BY1', 'FOC 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'Sum Insured 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CA1', 'Premium 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CB1', 'Cls 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CC1', 'Risk 7 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CD1', 'Risk details 8');
			$objPHPExcel->getActiveSheet()->SetCellValue('CE1', 'SI 8');
			$objPHPExcel->getActiveSheet()->SetCellValue('CF1', 'Acc 8');
			$objPHPExcel->getActiveSheet()->SetCellValue('CG1', 'FOC 8');
			$objPHPExcel->getActiveSheet()->SetCellValue('CH1', 'Sum Insured 8');
			$objPHPExcel->getActiveSheet()->SetCellValue('CI1', 'Premium 8');
			$objPHPExcel->getActiveSheet()->SetCellValue('CJ1', 'Cls 8');
			$objPHPExcel->getActiveSheet()->SetCellValue('CK1', 'Risk 8 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CL1', 'Risk details 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CM1', 'SI 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CN1', 'Acc 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CO1', 'FOC 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CP1', 'Sum Insured 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CQ1', 'Premium 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CR1', 'Cls 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CS1', 'Risk 9 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CT1', 'Risk details 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CU1', 'SI 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CV1', 'Acc 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CW1', 'FOC 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CX1', 'Sum Insured 10');

			$objPHPExcel->getActiveSheet()->SetCellValue('CY1', 'Premium 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CZ1', 'Cls 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('DA1', 'Risk 10 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DB1', 'Risk details 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DC1', 'SI 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DD1', 'Acc 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DE1', 'FOC 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DF1', 'Sum Insured 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DG1', 'Premium 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DH1', 'Cls 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DI1', 'Risk 11 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DJ1', 'Risk details 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DK1', 'SI 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DL1', 'Acc 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DM1', 'FOC 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DN1', 'Sum Insured 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DO1', 'Premium 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DP1', 'Cls 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DQ1', 'Risk 12 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DR1', 'Risk details 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DS1', 'SI 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DT1', 'Acc 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DU1', 'FOC 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DV1', 'Sum Insured 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DW1', 'Premium 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DX1', ' Cls 13');

			$objPHPExcel->getActiveSheet()->SetCellValue('DY1', 'Risk 13 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DZ1', 'Risk details 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EA1', 'SI 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EB1', 'Acc 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EC1', 'FOC 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('ED1', 'Sum Insured 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EE1', 'Premium 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EF1', 'Cls 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EG1', 'Risk 14 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('EH1', 'Risk details 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EI1', 'SI 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EJ1', 'Acc 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EK1', 'FOC 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EL1', 'Sum Insured 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EM1', 'Premium 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EN1', 'Cls 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EO1', 'Risk 15 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('EP1', 'Rating Flag (A/M)');
			$objPHPExcel->getActiveSheet()->SetCellValue('EQ1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('ER1', 'Locality');
			$objPHPExcel->getActiveSheet()->SetCellValue('ES1', 'Acc Reg');
			$objPHPExcel->getActiveSheet()->SetCellValue('ET1', 'Post code ');
			$objPHPExcel->getActiveSheet()->SetCellValue('EU1', 'Situation');
			$objPHPExcel->getActiveSheet()->SetCellValue('EV1', 'NCD ');
			$objPHPExcel->getActiveSheet()->SetCellValue('EW1', 'NCD 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('EX1', 'T/Limit');

			$objPHPExcel->getActiveSheet()->SetCellValue('EY1', 'Const');
			$objPHPExcel->getActiveSheet()->SetCellValue('EZ1', 'Business Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('FA1', 'Plan Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('FB1', 'Risk details 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FC1', 'SI 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FD1', 'Acc 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FE1', 'FOC 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FF1', 'Sum Insured 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FG1', 'Premium 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FH1', 'Cls 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FI1', 'Risk Location Details');
			$objPHPExcel->getActiveSheet()->SetCellValue('FJ1', 'User Location');
		
		$rowCount = 2;
        $i = 1;
        foreach ($data as $element) {
			$resisterdDate = date('Y-m-d',strtotime($element->created_on));
			$resisterdTime = date('H:i:s',strtotime($element->created_on));
			$modifiedDate = date('Y-m-d',strtotime($element->updated_on));
			$modifiedTime = date('H:i:s',strtotime($element->updated_on));
			$cntYear = $element->hme_year_of_construction;
			$premium = $this->Common_model->getHomeSIPremium($element->sum_insured);
			//$cntYear = '2012';
			$cntYear = $element->hme_year_of_construction;
			$mCntYear = substr_replace($cntYear, '.', 2, 0);
			$riskDetails = $element->hme_risk_address1.', '. $element->hme_risk_address2.', '.$element->hme_risk_area.', '.$element->hme_risk_city.', '.$element->hme_risk_state;

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'SHQ');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $resisterdDate);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'G');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->lead_application_id);//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, 'HO');
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, 'M');
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, ''); // need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->hme_no_of_floors);
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $mCntYear);
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, 'INDIA');
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, ''); // get from clnt
			
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, ''); // get from clnt
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $premium['cont_prm']); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, 'SHQ');	
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, 'Home contents  Incl. Valuables & Appliances(Fire incl. EQ and Burglary)'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, 'SEC - IIC Appliances');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $premium['appl_SI']);
			$objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $premium['appl_prm']);
			$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, 'SHQ');
			$objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, 'Appliances');
			$objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, 'SEC - V Additional Rent for Alt'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, $premium['add_rnt_SI']);
			$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, $premium['add_rnt_prm']);
			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, 'SHQ'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, 'Additional Rent for Alternate Accomodation - 12 Months Indemnity Period');
			$objPHPExcel->getActiveSheet()->SetCellValue('AX' . $rowCount, 'SEC-VIII Third Party Liability');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, $element->sum_insured);
			$objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, $premium['val_prm']);
			$objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, 'SHQ');
			$objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, 'Third Party Liability: Domestic Servants');
			$objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, 'SEC- I Building');
			$objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, $premium['buld_SI']);
			$objPHPExcel->getActiveSheet()->SetCellValue('BK' . $rowCount, $premium['build_prm']);
			$objPHPExcel->getActiveSheet()->SetCellValue('BL' . $rowCount, 'SHQ');
			$objPHPExcel->getActiveSheet()->SetCellValue('BM' . $rowCount, 'Building (Fire incl. Earthquake)');
			$objPHPExcel->getActiveSheet()->SetCellValue('BN' . $rowCount, 'SEC- IIB Valuables');
			$objPHPExcel->getActiveSheet()->SetCellValue('BO' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('BP' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('BR' . $rowCount, $element->sum_insured);
			$objPHPExcel->getActiveSheet()->SetCellValue('BS' . $rowCount, $premium['val_prm']);
			$objPHPExcel->getActiveSheet()->SetCellValue('BT' . $rowCount, 'SHQ');
			$objPHPExcel->getActiveSheet()->SetCellValue('BU' . $rowCount, 'Valuables');
			$objPHPExcel->getActiveSheet()->SetCellValue('BV' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('BW' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('BX' . $rowCount, '');//blank

			$objPHPExcel->getActiveSheet()->SetCellValue('BY' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('BZ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CB' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CD' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CR' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CS' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CT' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CU' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CV' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CW' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CX' . $rowCount, ''); //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('CY' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CZ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DB' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DD' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DR' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DS' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DT' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DU' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DV' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DW' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DX' . $rowCount, ''); //blank
 
			$objPHPExcel->getActiveSheet()->SetCellValue('DY' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DZ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EB' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ED' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ER' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ES' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ET' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EU' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EV' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EW' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EX' . $rowCount, ''); //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('EY' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EZ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FB' . $rowCount, 'Terrorism'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('FC' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('FD' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('FE' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('FF' . $rowCount, $premium['cont_SI'] + $premium['buld_SI']);
			$objPHPExcel->getActiveSheet()->SetCellValue('FG' . $rowCount, $premium['terr_prm']);
			$objPHPExcel->getActiveSheet()->SetCellValue('FH' . $rowCount, 'TER');
			$objPHPExcel->getActiveSheet()->SetCellValue('FI' . $rowCount, $riskDetails);
			$objPHPExcel->getActiveSheet()->SetCellValue('FJ' . $rowCount, $element->user_location);

            $rowCount++;
            $i++;
        }
		
		$historyPost['post'] = $_POST;
		$historyPost['type'] = 'Home';
		$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 8, //upload File,
							'leadData' => json_encode($historyPost)
							));
							

       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
        return $fileName;
    }


    public function generateExcelForHomePEEI(){


		$data = $this->Lms_car_model->getLeadsForExcel('Home','PEEI');

        $fileName = 'home-peei'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

			// $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Sl_No');
			// $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Lead_id');
			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Branch Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Policy Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Contract Owner');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Inception');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Expiry');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Date of Declaration/Proposal/issue');
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Agent');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Agent Commission Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Staff');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Reference 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Reference 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'ACS ID');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gen Page');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Gen Page 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Clauses/Warranty');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Rate Flag');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Locality');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Acc Reg');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Post code ');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Situatation');
			$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'T/Limit');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Const');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Const');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Brief Description of Business');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Main.P.');
			$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Plan Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Risk details 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'SI 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Acc 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'FOC 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Sum Insured 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Premium 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Cls 1 (Premium Classes)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Risk 1 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Risk details 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'SI 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Acc 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'FOC 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Sum Insured 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Premium 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Cls 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Risk 2 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Risk details 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'SI 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Acc 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'FOC 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Sum Insured 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Premium 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'Cls 3');

			$objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Risk 3 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'Risk details 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'SI 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'Acc 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'FOC 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'Sum Insured 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Premium 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Cls 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Risk 4 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Complete Risk Location Details');
			$objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'Excess Details');
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'QMS No');
			$objPHPExcel->getActiveSheet()->SetCellValue('BK1', 'Package (UW Name)');
			$objPHPExcel->getActiveSheet()->SetCellValue('BL1', 'User Location');
		
		$rowCount = 2;
        $i = 1;
        foreach ($data as $element) {
			$resisterdDate = date('Y-m-d',strtotime($element->created_on));
			$resisterdTime = date('H:i:s',strtotime($element->created_on));
			$modifiedDate = date('Y-m-d',strtotime($element->updated_on));
			$modifiedTime = date('H:i:s',strtotime($element->updated_on));
			$cntYear = $element->hme_year_of_construction;
			
			$lapTotalSI = $this->Common_model->getTotalSIByItem($element->lead_id,'Laptop');
			$mobileTotalSI = $this->Common_model->getTotalSIByItem($element->lead_id,'Mobile Phone');
			$tabletTotalSI = $this->Common_model->getTotalSIByItem($element->lead_id,'Tablet');
			$cameraTotalSI = $this->Common_model->getTotalSIByItem($element->lead_id,'Camera');



			$cntYear = $element->hme_year_of_construction;
			$mCntYear = substr_replace($cntYear, '.', 2, 0);
			$riskDetails = $element->hme_risk_address1.', '. $element->hme_risk_address2.', '.$element->hme_risk_area.', '.$element->hme_risk_city.', '.$element->hme_risk_state;

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'PAE');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $resisterdDate);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'G');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->lead_application_id);//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, 'HO');
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, 'HDFC BANK');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, 'Risk occupancy');
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, ''); // blank
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, 'M');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, ''); //need to add
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, ''); //need to add
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, 'Worldwide');
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, '3C - MIXED_CONSTRUCTION_SUPERIOR'); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, ''); // get from clnt
			
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, 'Business'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, '1.1'); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, '');// get from clnt
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, 'Portable Electronic Equipment'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $lapTotalSI);	
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, ''); // need  confirmation from client.
			$objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, 'PAE');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, 'Portable Electronic Equipment - Laptop'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, 'Portable Electronic Equipment');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $mobileTotalSI);
			$objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, '');// need  confirmation from client.
			$objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, 'PAE'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, 'Portable Electronic Equipment - Mobiles');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, 'Portable Electronic Equipment'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $cameraTotalSI); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, '');// need  confirmation from client.
			$objPHPExcel->getActiveSheet()->SetCellValue('AX' . $rowCount, 'PAE');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, 'Portable Electronic Equipment - Camera');
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, 'Portable Electronic Equipment');
			$objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, $tabletTotalSI);
			$objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, '');// need  confirmation from client.
			$objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, 'PAE');
			$objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, 'Portable Electronic Equipment - Tablet');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, $riskDetails);
			$objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, 'Rs. 1000/- for each and every claim');
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, '');// need  confirmation from client.
			$objPHPExcel->getActiveSheet()->SetCellValue('BK' . $rowCount, 'PUP');
			$objPHPExcel->getActiveSheet()->SetCellValue('BL' . $rowCount, $element->user_location);
		
				
            $rowCount++;
            $i++;
        }
		
		$historyPost['post'] = $_POST;
		$historyPost['type'] = 'Home-PEEI';
		$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 8, //upload File,
							'leadData' => json_encode($historyPost)
							));
							

       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
        return $fileName;


    }


    public function generateExcelForCombo(){


		$data = $this->Lms_car_model->getLeadsForExcel('Combo','');

        $fileName = 'combo'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Branch Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Salutation');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Insurd Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'STREET');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'LINE 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'LINE 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'LINE 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Pincode');
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'State');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Gender');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Married');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'TelePhone');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'E-mail');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Date of Birth');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'PAN');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Policy Start Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Policy End Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'IMD Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Staff Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Plan code');
			$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Tenure');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Premium (Ex GST)');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'GST Premium');
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Final Premium');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Premium As per Table');

			$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Premium Tally');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Reference 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'User location');

		$rowCount = 2;
        $i = 1;
        foreach ($data as $element) {
			
			if( $element->cust_gender == 'Male') { $custGender = 'M'; } else { $custGender = 'F'; }
			if( $element->marital_status == 'Single') { $custMStatus = 'S'; } else { $custMStatus = 'M'; }

			$premium = $this->Common_model->getComboPremiumBySI($element->sum_insured);

			

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->cus_title);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->first_name.' '.$element->last_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->cust_area);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->cust_street1);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->cust_street2);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->cust_city);
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->cust_zip);
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->cust_state);
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $custGender); 
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $custMStatus);
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_phone);
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_email);
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->date_of_birth); 
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->cust_pan); 
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, 'Plan 001-1000/day.Max 10 days/yr');
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, '1 Year');
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $premium['prm']); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $premium['gst']); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, ''); //blank
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element->lead_application_id);//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $element->user_location);//blank
			
	         $rowCount++;
            $i++;
        }
		
		$historyPost['post'] = $_POST;
		$historyPost['type'] = 'Combo';
		$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 8, //upload File,
							'leadData' => json_encode($historyPost)
							));


       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
        return $fileName;
    }



    public function generateExcelForComboUPP(){


		$data = $this->Lms_car_model->getLeadsForExcel('Combo','');


        $fileName = 'combo_upp'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Branch');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Title');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Insured Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'STREET');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'DOB');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'AGE');
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Occupation');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Mailing Address');
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'City');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'State');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Pincode');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'E-mail');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Mobile');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Nominee Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Nominee Relationship');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Inception ');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Expiry');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Agent');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Agent Commission Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Staff');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Master policy no');
			$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Loan Account No');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Business / occupation');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Critical Illness (Y/N)');
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Sum Insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Premium (Without GST)');

			$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Loss of Job (Y/N)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Sum Insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Premium (Without GST)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Personal Accident (Y/N)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Sum Insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Premium (Without GST)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Fire and Burglary (Y/N)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Sum Insured');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Premium (Without GST)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Total Premium (Without GST)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'GST Amount');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Total Premium');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Total SI');
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Instrument Number');
			$objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Instrument Amount');
			$objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Instrument date');
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Mode of Payment');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'RISK LOCATION ADDRESS');
			$objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'RISK LOCATION CITY');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'RISK LOCATION STATE');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'RISK LOCATION PINCODE');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Ref No');
			$objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'User Location');


			//print_r($data);

		$rowCount = 2;
        $i = 1;
        foreach ($data as $element) {
			
			$nomineDetail = $this->Lms_car_model->getNomineeDetails($element->lead_id);
			
			$dateOfBirth = $element->date_of_birth;
			$today = date("Y-m-d");
			$diff = date_diff(date_create($dateOfBirth), date_create($today));
			$custAge = $diff->format('%y');
			$mailingAddr = $element->cust_street1.', '.$element->cust_street2.', '.$element->cust_area.', '.$element->cust_city;

			if( $custAge <= 45 ){ $type = 'below'; } else { $type = 'above'; }

			$CIPremium = $this->Common_model->getCIComboPremiumBySIAge($element->sum_insured,$type);
			$totalPremium = $this->Common_model->getTotalPremiumBySIAge($element->sum_insured,$type);



// print_r($totalPremium);
// exit();

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->cus_title);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->first_name.' '.$element->last_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->cust_area);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->date_of_birth);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $custAge);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->occupation); 
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $mailingAddr);
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->cust_city);
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->cust_state);
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_zip);
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_email);
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->cust_phone);
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $nomineDetail[0]->nominee_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $nomineDetail[0]->nominee_relationship); 
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->sum_insured);  //need add
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $CIPremium['ci_prm']);  //need add
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, 'N');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, 'Y');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->sum_insured);//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $CIPremium['pa_prm']);//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, ''); //need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, '');//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, '');//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, '');//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, $totalPremium['tot_prm']);//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $totalPremium['tot_gst'])	;//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $totalPremium['tot_prm'] + $totalPremium['tot_gst']);//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->sum_insured);//need add
			$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->lead_application_id);
			$objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, $element->user_location);
			
		
            $rowCount++;
            $i++;
        }
		
		$historyPost['post'] = $_POST;
		$historyPost['type'] = 'Combo-PEEI';
		$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 8, //upload File,
							'leadData' => json_encode($historyPost)
							));

       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
        return $fileName;

   	
   	} 	






   	public function generateExcelForPA(){

		$data = $this->Lms_car_model->getLeadsForExcel('Personal Accident','');

        $fileName = 'pa'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Salutation');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Insurd Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'STREET');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'LINE 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'LINE 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'LINE 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Pincode');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'State');
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Gender');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Married');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'TelePhone');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'E-mail');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Date of Birth');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'PAN');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Client ID');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Policy Start Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Policy End Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'IMD Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Staff Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Ref Field 1 (WLI No)');
			$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Ref Field 2 (Receipt)');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Master Policy No');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'SI');
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Premium (Excluding GST)');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Payment Mode');

			$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Transaction Ref No/ Cheque no');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Bank Name');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Transaction Date/ Payment Date');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Payment Amount');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'User Location');
			
	$rowCount = 2;
        $i = 1;
        foreach ($data as $element) {
						
			if( $element->cust_gender == 'Male') { $custGender = 'M'; } else { $custGender = 'F'; }
			if( $element->marital_status == 'Single') { $custMStatus = 'S'; } else { $custMStatus = 'M'; }
	
			$premium = $this->Common_model->getPAPremiumBySI($element->sum_insured);


			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element->cus_title); 
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->first_name.' '.$element->last_name);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->cust_area);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->cust_street1);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->cust_street2);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->cust_city);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->cust_zip); 
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->cust_state);
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $custGender);
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $custMStatus);
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->cust_phone);
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->cust_email);
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->date_of_birth);
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->cust_pan);
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->lead_application_id);
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->sum_insured); //blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $premium); //need to add
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, ''); //blank  
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, ''); //blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, ''); //blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, ''); //blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, ''); //blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->user_location); //blank 
			
		    $rowCount++;
            $i++;
        }
		
		$historyPost['post'] = $_POST;
		$historyPost['type'] = 'Paa';
		$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 8, //upload File,
							'leadData' => json_encode($historyPost)
							));

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
        return $fileName;


   	}



   	public function generateExcelForOffice(){

		$data = $this->Lms_car_model->getLeadsForExcel('Office','');

        $fileName = 'office-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

			$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Branch Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Policy Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Contract Owner');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Inception');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Expiry');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Date of Declaration/Proposal/issue');
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Agent');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Agent Commission Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Staff');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Reference 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Reference 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'ACS ID');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gen Page');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Rating Flag (A/M)');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Locality');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Acc Reg');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Post code');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Situation');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'NCD');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'NCD1');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'T/Limit');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Const');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Business Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Plan Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Risk details 1');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'SI 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Acc 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'FOC 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sum Insured 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Premium 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Cls 1 (Premium Classes)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Risk 1 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Risk 1 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Risk details 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'SI 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Acc 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'FOC 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Sum Insured 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Premium 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Cls 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Risk 2 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Risk 2 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Risk details 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'SI 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Acc 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'FOC 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Sum Insured 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Premium 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'Cls 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Risk 3 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Risk 3 Brief Description');

			$objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'Risk details 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'SI 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Acc 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'FOC 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Sum Insured 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Premium 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Cls 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Risk 4 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'Risk 4 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'Risk details 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BK1', 'SI 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BL1', 'Acc 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BM1', 'FOC 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BN1', 'Sum Insured 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BO1', 'Premium 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BP1', 'Cls 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'Risk 5 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BR1', 'Risk 5 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BS1', 'Risk details 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BT1', 'SI 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BU1', 'Acc 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BV1', 'FOC 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BW1', 'Sum Insured 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BX1', 'Premium 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BY1', 'Cls 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'Risk 6 Brief Description');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('CA1', 'Risk 6 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CB1', 'Risk details 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CC1', 'SI 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CD1', 'Acc 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CE1', 'FOC 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CF1', 'Sum Insured 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CG1', 'Premium 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CH1', 'Cls 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CI1', 'Risk 7 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CJ1', 'Risk 7 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CK1', 'Risk details 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CL1', 'SI 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CM1', 'Acc 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CN1', 'FOC 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CO1', 'Sum Insured 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CP1', 'Premium 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CQ1', 'Cls 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CR1', 'Risk 9 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CS1', 'Risk 9 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CT1', 'Risk details 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CU1', 'SI 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CV1', 'Acc 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CW1', 'FOC 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CX1', 'Sum Insured 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CY1', 'Premium 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CZ1', 'Cls 10');

			$objPHPExcel->getActiveSheet()->SetCellValue('DA1', 'Risk details 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DB1', 'SI 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DC1', 'Acc 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DD1', 'FOC 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DE1', 'Sum Insured 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DF1', 'Premium 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DG1', 'Cls 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DH1', 'Risk 11 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DI1', 'Risk 11 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DJ1', 'Risk 11 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DK1', 'Risk details 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DL1', 'SI 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DM1', 'Acc 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DN1', 'FOC 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DO1', 'Sum Insured 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DP1', 'Premium 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DQ1', 'Cls 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DR1', 'Risk 12 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DS1', 'Risk 12 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DT1', 'Risk details 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DU1', 'SI 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DV1', 'Acc 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DW1', 'FOC 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DX1', 'Sum Insured 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DY1', 'Premium 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DZ1', 'Cls 13');

			$objPHPExcel->getActiveSheet()->SetCellValue('EA1', 'Risk details 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EB1', 'SI 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EC1', 'Acc 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('ED1', 'FOC 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EE1', 'Sum Insured 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EF1', 'Premium 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EG1', 'Cls 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EH1', 'Risk 14 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('EI1', 'Risk details 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EJ1', 'SI 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EK1', 'Acc 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EL1', 'FOC 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EM1', 'Sum Insured 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EN1', 'Premium 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EO1', 'Cls 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EP1', 'Risk 15 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('EQ1', 'Risk details 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('ER1', 'SI 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('ES1', 'Acc 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('ET1', 'FOC 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EU1', 'Sum Insured 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EV1', 'Premium 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EW1', 'Cls 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EX1', 'Risk details 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('EY1', 'SI 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('EZ1', 'Acc 17');

			$objPHPExcel->getActiveSheet()->SetCellValue('FA1', 'FOC 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FB1', 'Sum Insured 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FC1', 'Premium 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FD1', 'Cls 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FE1', 'Risk details 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FF1', 'SI 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FG1', 'Acc 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FH1', 'FOC 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FI1', 'Sum Insured 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FJ1', 'Premium 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FK1', 'Cls 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FL1', 'Risk 18 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('FM1', 'Rating Flag (A/M)');
			$objPHPExcel->getActiveSheet()->SetCellValue('FN1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('FO1', 'Locality');
			$objPHPExcel->getActiveSheet()->SetCellValue('FP1', 'Acc Reg');
			$objPHPExcel->getActiveSheet()->SetCellValue('FQ1', 'Post code ');
			$objPHPExcel->getActiveSheet()->SetCellValue('FR1', 'Situation');
			$objPHPExcel->getActiveSheet()->SetCellValue('FS1', 'NCD ');
			$objPHPExcel->getActiveSheet()->SetCellValue('FT1', 'NCD 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('FU1', 'T/Limit');
			$objPHPExcel->getActiveSheet()->SetCellValue('FV1', 'Const');
			$objPHPExcel->getActiveSheet()->SetCellValue('FW1', 'Business Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('FX1', 'Plan Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('FY1', 'Risk details 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('FZ1', 'SI 16');			
					
			$objPHPExcel->getActiveSheet()->SetCellValue('GA1', 'Acc 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('GB1', 'FOC 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('GC1', 'Sum Insured 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('GD1', 'Premium 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('GE1', 'Cls 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('GF1', 'Risk Location Details');
			$objPHPExcel->getActiveSheet()->SetCellValue('GG1', 'User Location');


		$rowCount = 2;
        $i = 1;
        foreach ($data as $element) {
			$resisterdDate = date('Y-m-d',strtotime($element->created_on));
			$resisterdTime = date('H:i:s',strtotime($element->created_on));
			$modifiedDate = date('Y-m-d',strtotime($element->updated_on));
			$modifiedTime = date('H:i:s',strtotime($element->updated_on));
			$cntYear = $element->hme_year_of_construction;
			$premium = $this->Common_model->getHomeSIPremium($element->sum_insured);
			//$cntYear = '2012';
			$cntYear = $element->hme_year_of_construction;
			$mCntYear = substr_replace($cntYear, '.', 2, 0);
			$riskDetails = $element->hme_risk_address1.', '. $element->hme_risk_address2.', '.$element->hme_risk_area.', '.$element->hme_risk_city.', '.$element->hme_risk_state;

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'SOP');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $resisterdDate);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'G');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->lead_application_id);//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, 'HDFC BANK');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, 'M');
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, ''); // need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->hme_no_of_floors);
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $mCntYear);
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, 'INDIA');
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, '3C - MIXED_CONSTRUCTION_SUPERIOR'); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, ''); // get from clnt
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, ''); // get from clnt
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, 'Sec-I Standard Fire Spl perils'); 
		

			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, 'Sec-III All Risk'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, 'Content coverage as per plan'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, 'Sec-VII Money Insurance'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, 'Sec-VII Money Insurance'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, ''); //need to add
			$objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, 'Sec-VIII Infidelity Dishonesty'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AX' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, 'Sec-VIII Infidelity Dishonesty'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, '');  // need to add 


			$objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, 'Sec-X Neon & glow sign Board'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, 'Sec-X Neon & glow sign Board'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, ''); // need to add 
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, 'Sec-XIB Legal Liability'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BK' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BL' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BM' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BN' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BO' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BP' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ' . $rowCount, 'Sec-XIB Legal Liability'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BR' . $rowCount, 'Legal Liability Towards Third Party'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BS' . $rowCount, 'SecXII Personal Accident'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BT' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BU' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BV' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BW' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BX' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BY' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BZ' . $rowCount, 'Personal Accident'); 


			$objPHPExcel->getActiveSheet()->SetCellValue('CA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CB' . $rowCount, 'SecXIII Baggage'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CC' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CD' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CE' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CF' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CG' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CH' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CI' . $rowCount, 'SecXIII Baggage'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CJ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CK' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CL' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CM' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CN' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CO' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CP' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CQ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CR' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CS' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CT' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CU' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CV' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CW' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CX' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CY' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CZ' . $rowCount, '');  //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('DA' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DB' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DC' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DD' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DE' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DF' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DG' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DH' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DI' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DJ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DK' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DL' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DM' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DN' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DO' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DP' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DQ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DR' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DS' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DT' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DU' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DV' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DW' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DX' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DY' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DZ' . $rowCount, '');  //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('EA' . $rowCount, '');//blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('EB' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ED' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ER' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ES' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ET' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EU' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EV' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EW' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EX' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EY' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EZ' . $rowCount, ''); //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('FA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FB' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FD' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FR' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FS' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FT' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FU' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FV' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FW' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FX' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FY' . $rowCount, 'Terrorism'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('FZ' . $rowCount, 'Y'); 			

			$objPHPExcel->getActiveSheet()->SetCellValue('GA' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GB' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GC' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GD' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GE' . $rowCount, 'TER'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GF' . $rowCount, $riskDetails); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GG' . $rowCount, $element->user_location); 

            $rowCount++;
            $i++;
        }		

		$historyPost['post'] = $_POST;
		$historyPost['type'] = 'Office';
		$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 8, //upload File,
							'leadData' => json_encode($historyPost)
							));		

       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
        return $fileName;
   	}


   	public function generateExcelForShop(){

		$data = $this->Lms_car_model->getLeadsForExcel('Shop','');

        $fileName = 'shop-'.time().'1.xlsx';  
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Branch Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Policy Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Contract Owner');
			$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Inception');
			$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Expiry');
			$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Date of Declaration/Proposal/issue');
			$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Agent');
			$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Agent Commission Type');
			$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Staff');
			$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Reference 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Reference 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'ACS ID');
			$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Gen Page');
			$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Rating Flag (A/M)');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'State Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Locality');
			$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Acc Reg');
			$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Post code');
			$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Situation');
			$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'NCD');
			$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'NCD1');
			$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'T/Limit');
			$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Const');
			$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Business Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Plan Code');
			$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Risk details 1');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'SI 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Acc 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'FOC 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Sum Insured 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Premium 1');
			$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Cls 1 (Premium Classes)');
			$objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Risk 1 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Risk 1 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Risk details 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'SI 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Acc 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'FOC 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Sum Insured 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AN1', 'Premium 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AO1', 'Cls 2');
			$objPHPExcel->getActiveSheet()->SetCellValue('AP1', 'Risk 2 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ1', 'Risk 2 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AR1', 'Risk details 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AS1', 'SI 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AT1', 'Acc 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AU1', 'FOC 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AV1', 'Sum Insured 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AW1', 'Premium 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AX1', 'Cls 3');
			$objPHPExcel->getActiveSheet()->SetCellValue('AY1', 'Risk 3 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ1', 'Risk 3 Brief Description');

			$objPHPExcel->getActiveSheet()->SetCellValue('BA1', 'Risk details 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BB1', 'SI 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BC1', 'Acc 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BD1', 'FOC 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BE1', 'Sum Insured 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BF1', 'Premium 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BG1', 'Cls 4');
			$objPHPExcel->getActiveSheet()->SetCellValue('BH1', 'Risk 4 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BI1', 'Risk 4 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ1', 'Risk details 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BK1', 'SI 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BL1', 'Acc 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BM1', 'FOC 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BN1', 'Sum Insured 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BO1', 'Premium 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BP1', 'Cls 5');
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ1', 'Risk 5 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BR1', 'Risk 5 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('BS1', 'Risk details 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BT1', 'SI 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BU1', 'Acc 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BV1', 'FOC 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BW1', 'Sum Insured 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BX1', 'Premium 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BY1', 'Cls 6');
			$objPHPExcel->getActiveSheet()->SetCellValue('BZ1', 'Risk 6 Brief Description');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('CA1', 'Risk 6 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CB1', 'Risk details 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CC1', 'SI 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CD1', 'Acc 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CE1', 'FOC 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CF1', 'Sum Insured 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CG1', 'Premium 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CH1', 'Cls 7');
			$objPHPExcel->getActiveSheet()->SetCellValue('CI1', 'Risk 7 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CJ1', 'Risk 7 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CK1', 'Risk details 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CL1', 'SI 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CM1', 'Acc 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CN1', 'FOC 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CO1', 'Sum Insured 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CP1', 'Premium 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CQ1', 'Cls 9');
			$objPHPExcel->getActiveSheet()->SetCellValue('CR1', 'Risk 9 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CS1', 'Risk 9 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('CT1', 'Risk details 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CU1', 'SI 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CV1', 'Acc 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CW1', 'FOC 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CX1', 'Sum Insured 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CY1', 'Premium 10');
			$objPHPExcel->getActiveSheet()->SetCellValue('CZ1', 'Cls 10');

			$objPHPExcel->getActiveSheet()->SetCellValue('DA1', 'Risk details 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DB1', 'SI 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DC1', 'Acc 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DD1', 'FOC 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DE1', 'Sum Insured 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DF1', 'Premium 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DG1', 'Cls 11');
			$objPHPExcel->getActiveSheet()->SetCellValue('DH1', 'Risk 11 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DI1', 'Risk 11 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DJ1', 'Risk 11 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DK1', 'Risk details 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DL1', 'SI 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DM1', 'Acc 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DN1', 'FOC 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DO1', 'Sum Insured 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DP1', 'Premium 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DQ1', 'Cls 12');
			$objPHPExcel->getActiveSheet()->SetCellValue('DR1', 'Risk 12 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DS1', 'Risk 12 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('DT1', 'Risk details 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DU1', 'SI 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DV1', 'Acc 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DW1', 'FOC 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DX1', 'Sum Insured 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DY1', 'Premium 13');
			$objPHPExcel->getActiveSheet()->SetCellValue('DZ1', 'Cls 13');

			$objPHPExcel->getActiveSheet()->SetCellValue('EA1', 'Risk details 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EB1', 'SI 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EC1', 'Acc 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('ED1', 'FOC 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EE1', 'Sum Insured 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EF1', 'Premium 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EG1', 'Cls 14');
			$objPHPExcel->getActiveSheet()->SetCellValue('EH1', 'Risk 14 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('EI1', 'Risk details 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EJ1', 'SI 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EK1', 'Acc 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EL1', 'FOC 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EM1', 'Sum Insured 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EN1', 'Premium 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EO1', 'Cls 15');
			$objPHPExcel->getActiveSheet()->SetCellValue('EP1', 'Risk 15 Brief Description');
			$objPHPExcel->getActiveSheet()->SetCellValue('EQ1', 'Risk details 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('ER1', 'SI 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('ES1', 'Acc 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('ET1', 'FOC 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EU1', 'Sum Insured 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EV1', 'Premium 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EW1', 'Cls 16');
			$objPHPExcel->getActiveSheet()->SetCellValue('EX1', 'Risk details 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('EY1', 'SI 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('EZ1', 'Acc 17');

			$objPHPExcel->getActiveSheet()->SetCellValue('FA1', 'FOC 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FB1', 'Sum Insured 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FC1', 'Premium 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FD1', 'Cls 17');
			$objPHPExcel->getActiveSheet()->SetCellValue('FE1', 'Risk details 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FF1', 'SI 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FG1', 'Acc 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FH1', 'FOC 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FI1', 'Sum Insured 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FJ1', 'Premium 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FK1', 'Cls 18');
			$objPHPExcel->getActiveSheet()->SetCellValue('FL1', 'Risk 18 Brief Description');
			
			$objPHPExcel->getActiveSheet()->SetCellValue('FM1', 'SI 19');
			$objPHPExcel->getActiveSheet()->SetCellValue('FN1', 'Acc 19');
			$objPHPExcel->getActiveSheet()->SetCellValue('FO1', 'FOC 19');
			$objPHPExcel->getActiveSheet()->SetCellValue('FP1', 'Sum Insured 19');
			$objPHPExcel->getActiveSheet()->SetCellValue('FQ1', 'Premium 19');
			$objPHPExcel->getActiveSheet()->SetCellValue('FR1', 'Cls 19');
			$objPHPExcel->getActiveSheet()->SetCellValue('FS1', 'Risk details 20');
			$objPHPExcel->getActiveSheet()->SetCellValue('FT1', 'SI 20');
			$objPHPExcel->getActiveSheet()->SetCellValue('FU1', 'Acc 20');
			$objPHPExcel->getActiveSheet()->SetCellValue('FV1', 'FOC 20');
			$objPHPExcel->getActiveSheet()->SetCellValue('FW1', 'Sum Insured 20');
			$objPHPExcel->getActiveSheet()->SetCellValue('FX1', 'Premium 20');
			$objPHPExcel->getActiveSheet()->SetCellValue('FY1', 'Cls 20');
			$objPHPExcel->getActiveSheet()->SetCellValue('FZ1', 'Risk 20 Brief Description');			
					
		
			$objPHPExcel->getActiveSheet()->SetCellValue('GA1', 'Rating Flag (A/M)'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GB1', 'State Code'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GC1', 'Locality'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GD1', 'Acc Reg'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GE1', 'Post code '); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GF1', 'Situation'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GG1', 'NCD'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GH1', 'NCD 1'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GI1', 'T/Limit'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GJ1', 'Const'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GK1', 'Business Code'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GL1', 'Plan Code'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GM1', 'Risk details 16'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GN1', 'SI 16'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GO1', 'Acc 16'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GP1', 'FOC 16'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GQ1', 'Sum Insured 16'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GR1', 'Premium 16'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GS1', 'Cls 16'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GT1', 'Risk Location Details'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GU1', 'UW Name'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GV1', 'Risk Inspection details'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GW1', 'NAT/CAT Analysis');  
			$objPHPExcel->getActiveSheet()->SetCellValue('GX1', 'User Location');  
	
			
$rowCount = 2;
        $i = 1;
        foreach ($data as $element) {
			$resisterdDate = date('Y-m-d',strtotime($element->created_on));
			$resisterdTime = date('H:i:s',strtotime($element->created_on));
			$modifiedDate = date('Y-m-d',strtotime($element->updated_on));
			$modifiedTime = date('H:i:s',strtotime($element->updated_on));
			$cntYear = $element->hme_year_of_construction;
			$premium = $this->Common_model->getHomeSIPremium($element->sum_insured);
			//$cntYear = '2012';
			$cntYear = $element->hme_year_of_construction;
			$mCntYear = substr_replace($cntYear, '.', 2, 0);
			$riskDetails = $element->hme_risk_address1.', '. $element->hme_risk_address2.', '.$element->hme_risk_area.', '.$element->hme_risk_city.', '.$element->hme_risk_state;

			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'SOP');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $resisterdDate);
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'G');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->lead_application_id);//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, '');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, 'HDFC BANK');//blank
			$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, 'M');
			$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, ''); // need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, '');// need to Add 
			$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->hme_no_of_floors);
			$objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $mCntYear);
			$objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, 'INDIA');
			$objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, '3C - MIXED_CONSTRUCTION_SUPERIOR'); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, ''); // get from clnt
			$objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, ''); // get from clnt
			$objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, 'Sec-I Standard Fire Spl perils'); 
		

			$objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, 'Sec-III All Risk'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, 'Content coverage as per plan'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, 'Sec-VII Money Insurance'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AM' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AN' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AO' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AP' . $rowCount, 'Sec-VII Money Insurance'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AQ' . $rowCount, ''); //need to add
			$objPHPExcel->getActiveSheet()->SetCellValue('AR' . $rowCount, 'Sec-VIII Infidelity Dishonesty'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AS' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AT' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AU' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AV' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AW' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AX' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AY' . $rowCount, 'Sec-VIII Infidelity Dishonesty'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('AZ' . $rowCount, '');  // need to add 


			$objPHPExcel->getActiveSheet()->SetCellValue('BA' . $rowCount, 'Sec-X Neon & glow sign Board'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BB' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BC' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BD' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BE' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BF' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BG' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BH' . $rowCount, 'Sec-X Neon & glow sign Board'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BI' . $rowCount, ''); // need to add 
			$objPHPExcel->getActiveSheet()->SetCellValue('BJ' . $rowCount, 'Sec-XIB Legal Liability'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BK' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BL' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BM' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BN' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BO' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BP' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BQ' . $rowCount, 'Sec-XIB Legal Liability'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BR' . $rowCount, 'Legal Liability Towards Third Party'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BS' . $rowCount, 'SecXII Personal Accident'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BT' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BU' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BV' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BW' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BX' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BY' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('BZ' . $rowCount, 'Personal Accident'); 


			$objPHPExcel->getActiveSheet()->SetCellValue('CA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CB' . $rowCount, 'SecXIII Baggage'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CC' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CD' . $rowCount, 'Y'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CE' . $rowCount, 'N'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CF' . $rowCount, $element->sum_insured); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CG' . $rowCount, $element->lms_premium); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CH' . $rowCount, 'SOP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CI' . $rowCount, 'SecXIII Baggage'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('CJ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CK' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CL' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CM' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CN' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CO' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CP' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CQ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CR' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CS' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CT' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CU' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CV' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CW' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CX' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CY' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('CZ' . $rowCount, '');  //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('DA' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DB' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DC' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DD' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DE' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DF' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DG' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DH' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DI' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DJ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DK' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DL' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DM' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DN' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DO' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DP' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DQ' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DR' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DS' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DT' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DU' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DV' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DW' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DX' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DY' . $rowCount, '');  //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('DZ' . $rowCount, '');  //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('EA' . $rowCount, '');//blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('EB' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ED' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ER' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ES' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('ET' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EU' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EV' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EW' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EX' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EY' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('EZ' . $rowCount, ''); //blank

			$objPHPExcel->getActiveSheet()->SetCellValue('FA' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FB' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FD' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FR' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FS' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FT' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FU' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FV' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FW' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FX' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FY' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('FZ' . $rowCount, ''); //blank			

			$objPHPExcel->getActiveSheet()->SetCellValue('GA' . $rowCount, 'M'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GB' . $rowCount, '');//blank 
			$objPHPExcel->getActiveSheet()->SetCellValue('GC' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GD' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GE' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GF' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GG' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GH' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GI' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GJ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GK' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GL' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GM' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GN' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GO' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GP' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GQ' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GR' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GS' . $rowCount, ''); //blank
			$objPHPExcel->getActiveSheet()->SetCellValue('GT' . $rowCount, $riskDetails); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GU' . $rowCount, 'PUP'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GV' . $rowCount, 'NO'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GW' . $rowCount, 'NO'); 
			$objPHPExcel->getActiveSheet()->SetCellValue('GX' . $rowCount, $element->user_location); 
            $rowCount++;
            $i++;
        }
		
		$historyPost['post'] = $_POST;
		$historyPost['type'] = 'Shop';
		$this->Useractivity->getInsertHistory(array(
							'emp_id' => $this->session->userdata('emp_id'),
							'leadId' => 0,
							'type' => 8, //upload File,
							'leadData' => json_encode($historyPost)
							));
					

       // header("Content-type: application/octet-stream");
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header("Content-Transfer-Encoding: binary ");
		//header('Cache-Control: max-age=0');        
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save(FILE_PATH.'/assets/temp-excel/'.$fileName);
        return $fileName;


   	}


}	