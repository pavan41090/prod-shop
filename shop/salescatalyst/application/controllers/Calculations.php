<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();
class Calculations extends CI_Controller {
	
	private $includer;
	private $pincode;
	private $agechecker;
	private $ageNumber;
	private $spouseData;
	private $childernData;
	private $spouseCalculator;
	private $sumassureddata;
	private $hospitalData;
	private $criticalsumass;
	private $criticalcheck;
	private $selectedzone;
	
	public function __construct(){
		
		parent::__construct();
		$this->includer;
		$this->pincode;
		$this->agechecker;
		$this->ageNumber;
		$this->spouseData;
		$this->childernData;
		$this->spouseCalculator;
		$this->hospitalData;
		$this->sumassureddata;
		$this->criticalsumass;
		$this->criticalcheck;
		$this->selectedzone;
		error_reporting(0);
		
	}
	
	public function listDis(){ 

		if($this->session->userdata('logged_in') == TRUE) {

			$this->load->view('backend_layout/layout_header_inner');
			$this->load->view('backend_layout/layout_menu_inner');
			$this->load->view('backend/list_calculation');
			$this->load->view('backend_layout/layout_footer_inner');
		} else {
			redirect('user', 'refresh');
		}		

	}
	
	public function getUpdatefeilds(){
		
		/*
		if(empty($this->input->post())){
			redirect(base_url());
			die; one sec pavan
		}*/
		
		$inputUpdatedata = $this->input->post();
		
		$inputvalue = $this->security->xss_clean($inputUpdatedata['keyvalue']);
		$inputkey = $this->security->xss_clean($inputUpdatedata['key']);
		$inputzone = $this->security->xss_clean($inputUpdatedata['zone']);
		$this->db->select('cal_sno');
		$this->db->where(array('cal_sno'=>$inputkey,'cal_zone'=>$inputzone));
		$getData = $this->db->get('tbl_zone_calculation');
		if($getData->num_rows()>0){
			
			$this->db->set('cal_sum_assured',$inputvalue);
			$this->db->where(array('cal_sno'=>$inputkey,'cal_zone'=>$inputzone));
			$this->db->update('tbl_zone_calculation');
			//echo $this->db->last_query();
			if($this->db->affected_rows()>0){
				$dataStatus['status'] = true;
			}
			
		} else {
			$dataStatus['status'] = true;
		}
		echo json_encode($dataStatus);
	}
	
	
	public function getZonelist(){
		
		/*
		if(empty($this->input->post())){
			redirect(base_url());
			die;
		}
		*/
		$inputPost = $this->input->post();
		$this->db->select('cal_sno,cal_zone,cal_age,cal_include,cal_sum_assured,cal_premium');
		$this->db->where(array('cal_status'=>1,'cal_zone'=>$inputPost['zone'],'cal_premium'=>$inputPost['assured']));
		$getData = $this->db->get('tbl_zone_calculation');
		
		$resultZones = $getData->result();
		$arrayDatacheck = array();
		foreach($resultZones as $zone):
		
		
					if($zone->cal_age == 1){
							   $agewisearray['age1'][] = $zone;
						   }
						   if($zone->cal_age == 2){
							   $agewisearray['age2'][] = $zone;
						   }
						   if($zone->cal_age == 3){
							   $agewisearray['age3'][] = $zone;
						   }
						   if($zone->cal_age == 4){
							   $agewisearray['age4'][] = $zone;
						   }
						  
		
						   
		endforeach;
		$tableData = '<table class="table table-bordered table-striped"><thead class="tablhead"><tr><th>Age Bands</th><th>1A</th><th>2A</th><th>2A+1K</th><th>2A+2K</th><th>2A+3K</th><th>1A+1K</th><th>1A+2K</th><th>1A+3K</th></tr></thead>';
						   
						
						foreach($agewisearray as $diszone):
						
						 $tableData .= '<tr><th>Age Bands</th>';
						 foreach($diszone as $d):
						 
						 if($d->cal_include == 1)
						 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;" my-change></th>';
						 if($d->cal_include == 2)
							 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;"></th>';
						 if($d->cal_include == 3)
							 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;"></th>';
						 if($d->cal_include == 4)
							 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;"></th>';
						 if($d->cal_include == 5)
							 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;"></th>';
						 if($d->cal_include == 6)
							 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;"></th>';
						 if($d->cal_include == 7)
							 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;"></th>';
						 if($d->cal_include == 8)
							 $tableData .= '<th><input id="'.$d->cal_zone.'" name="'.$d->cal_sno.'" ng-model="chnage'.$d->cal_sno.'" ng-change="changeCalculation($event,'.$d->cal_sno.')" value="'.$d->cal_sum_assured.'" style="width: 70px;max-width: 100%;"></th>';
						 
						 endforeach;
						 $tableData .= '</tr>';
						endforeach;
                        $tableData .= '</table>';
						
			$dataReturn['result'][] = $tableData;
			echo json_encode($dataReturn);
		
	}
	
	public function getPincodeWiseZone(){
		$this->db->select('cus_zone');
		$this->db->where('cus_pincode',$this->pincode);
		$getPincodeData = $this->db->limit(1)->get('tbl_pincode');
		return $getPincodeData->row_object()->cus_zone;
	}
	
	public function getIncludes(){
		
		$arrayJsoninclude = array(
		'1' => '1A',
		'2' => '2A',
		'3' => '2A+1K',
		'4' => '2A+2K',
		'5' => '2A+3K',
		'6' => '1A+1K',
		'7' => '1A+2K',
		'8' => '1A+3K'
		);
		
		return $arrayJsoninclude;
		
	}
	
	public function getCalAgechecker(){
		
		if($this->agechecker >= 0 && $this->agechecker <= 25){
			$this->ageNumber = 1;
		} elseif($this->agechecker > 25 && $this->agechecker <= 35){
			$this->ageNumber = 2;
		} elseif($this->agechecker > 36 && $this->agechecker <= 40){
			$this->ageNumber = 3;
		} elseif($this->agechecker > 40 && $this->agechecker <= 45){
			$this->ageNumber = 4;
		}
		
	}
	
	public function getCheckSpouseData(){
		
		if($this->spouseData == 0){
			
			if($this->childernData == 0){
				$this->spouseCalculator = 1;
			} elseif($this->childernData == 1){
				$this->spouseCalculator = 6;
			} elseif($this->childernData == 2){
				$this->spouseCalculator = 7;
			} elseif($this->childernData == 3){
				$this->spouseCalculator = 8;
			}
			
		} elseif($this->spouseData > 0){
			
			if($this->childernData == 0){
				$this->spouseCalculator = 2;
			} elseif($this->childernData == 1){
				$this->spouseCalculator = 3;
			} elseif($this->childernData == 2){
				$this->spouseCalculator = 4;
			} elseif($this->childernData == 3){
				$this->spouseCalculator = 5;
			}
		
		}
		
	}
	
	public function gethospitalcalculation(){
		$this->db->select('*');
		$this->db->join('tbl_age ag','ag.age_sno = ca.cal_age','inner');
		$this->db->where(array('cal_age'=>$this->ageNumber,'cal_include'=>$this->spouseCalculator,'cal_category'=>2));
		$queryData = $this->db->get('tbl_zone_calculation ca');
		
		$hosresultData = $queryData->row_object();
		return $hosresultData;
	}
	
	public function getcriticalcalculation(){
		$this->db->select('*');
		$this->db->join('tbl_age ag','ag.age_sno = ca.cal_age','inner');
		$this->db->where(array('cal_premium'=>$this->criticalsumass,'cal_age'=>$this->ageNumber,'cal_category'=>3));
		$queryData = $this->db->get('tbl_zone_calculation ca');
		
		$hosresultData = $queryData->row_object();
		return $hosresultData;
	}
	
	public function getSumcalculationsData(){
		
		if($this->selectedzone == 'Zone 1'){
			$myzone = 1;
		} elseif($this->selectedzone == 'Zone 2'){
			$myzone = 2;
		} elseif($this->selectedzone == 'Zone 3'){
			$myzone = 3;
		}
		$this->db->select('*');
		$this->db->join('tbl_age ag','ag.age_sno = ca.cal_age','inner');
		$this->db->where(array('cal_premium'=>$this->sumassureddata,'cal_zone'=>$myzone,'cal_age'=>$this->ageNumber,'cal_include'=>$this->spouseCalculator,'cal_category'=>1));
		$queryData = $this->db->get('tbl_zone_calculation ca');
		
		$resultData = $queryData->row_object();
		
		return $resultData;
	}
	
	public function getCalculationData(){
		/*
		if(empty($this->input->post())){
			redirect(base_url());
			die;
		}
		*/
		$calcriticalvalues=0;
		$postData = $this->input->post();
		$this->pincode = $postData['pincode'];
		$children = $postData['children'];
		$this->childernData = $children;
		$spouse = $postData['spouse'];
		$this->spouseData = $spouse;
		$age = $postData['age'];
		$this->agechecker = $age;
		$this->hospitalData = $postData['hospital'];
		$sumassured = $postData['sumassured'];
		$this->sumassureddata = $sumassured;
		$this->criticalcheck = $postData['crititcalcheck'];
		$this->criticalsumass = $postData['criticalvalue'];
		$this->selectedzone = $this->getPincodeWiseZone();
		$this->getCheckSpouseData();
		$this->getCalAgechecker();
		$responceData = $this->getSumcalculationsData();
		$summeassured = intval(str_replace(',', '', $responceData->cal_sum_assured));
		$hospitalresponceData = $this->gethospitalcalculation();
				
		$hospitalassured = $hospitalresponceData->cal_sum_assured;
		if($this->hospitalData > 0){
			$summData = (int)$summeassured + (int)$hospitalassured;
		} else {
			$summData = (int)$summeassured;
		}
		if($this->criticalcheck>0){
			$criticalvalues = $this->getcriticalcalculation();
			echo $criticalvalues;
			$calcriticalvalues = intval(str_replace(',', '', $criticalvalues->cal_sum_assured));
			
		}
		
		$finalcalculationData = (int)$summData + (int)$calcriticalvalues;
		
		$dataReturn['result'] = $finalcalculationData;
		echo json_encode($dataReturn);
	}
	
	

}
