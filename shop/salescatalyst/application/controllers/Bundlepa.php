<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Bundlepa extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        getHdfclogincheck();

        if($this->session->userdata('logged_in') == TRUE) {

            $userId = $this->session->userdata('emp_id');

            $tbl_bundle_pa_selection = $this->db->query("SELECT * FROM tbl_bundle_pa_selection WHERE pa_user = '".$userId."' ");
            $tblResultdata = $tbl_bundle_pa_selection->row_object();
            $this->data['sub_module'] = 'Bundle Lead PA'; 
            $this->data['module'] = 'leads'; 
			$this->data['desName'] = $this->session->userdata('des_name');
			$this->data['desId'] = $this->session->userdata('des_id');
			$this->data['userType'] = $this->session->userdata('user_type');
			$this->data['userTypeAbbr'] = $this->session->userdata('user_type_abbr');
            $this->data['businessArray'] = $this->Common_model->typebusiness();
            $this->data['salutationArray'] = $this->Common_model->customerSalutation();
            $this->data['PaymentArray'] = $this->Common_model->getPayment();
            $this->data['languageArray'] = $this->Common_model->language();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['emiArray'] = $this->Common_model->Emi();
            $this->data['emiYRArray'] = $this->Common_model->emiYears();
            $this->data['userDetails'] = $this->User_model->getLoginDetails();
            $this->data['CustomerArray'] = $this->Common_model->customer();
            $this->data['CampaignArray'] = $this->Common_model->getCampaignName();
            $this->data['resultArray'] = $tblResultdata;

            $this->data['sumInsuredArray'] = array(
                '2500000'   => '25,00,000', 
                '5000000'   => '50,00,000',
                '7500000'   => '75,00,000', 
                '10000000'  => '1,00,00,000', 
                '20000000'  => '2,00,00,000' ,
                '30000000'  => '3,00,00,000'
            );
            $this->data['PriorityArray'] = $this->Common_model->getPriority();
            
			$userRight = $this->User_model->get_prdt_privilages($userId);
			$this->data['prdt_privilage']  = $userRight;
            $this->load->view('layout/header_inner');
			$this->load->view('layout/menu_inner',$this->data);
			$this->load->view('layout/lms_page_header_inner',$this->data);
			$this->load->view('lms_view/lms_create_pa_bundle',$this->data);
			$this->load->view('layout/footer_inner');
            
        } else {
			redirect('user', 'refresh');
		}
    }

    public function getSum(){
        $this->_getSum();
    }

    private function _getSum(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){

        $inputPost = $this->input->post();

        $planamount = ($inputPost['upp_loan_amount'])*1;
        $planage = $inputPost['upp_age'];
        $plantenure = $inputPost['upp_tenure'];
        $loantype = $inputPost['upp_type_load'];
       
        $upp = $this->loanamountFunction($planamount,$planage,$plantenure,$loantype,false);
       
        
           $errorResponce = $this->Bundlemodel->getSummodel($upp);
        } else {
            $errorResponce['status'] = false;
            $errorResponce['message'] = "404 Error Page";
        }
        echo json_encode($errorResponce);
    }

    public function getInsertData(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $responceData = $this->_getInsertData();
        } else {
            $responceData['status'] = false;
            $responceData['message'] = "404 Error Page";
        }
        echo json_encode($responceData);
    }
	
	

    private function _getInsertData(){
       return $this->Bundlemodel->getInsertCommandbundle();
    }

    public function getcheckvaluescount(){

        if($_SERVER['REQUEST_METHOD'] != "POST"){
                $error_responce['status'] = false;
                echo json_encode($error_responce);
                die();
        }

       
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
        $loan_type_upp = $gumdataasdsad[$plantenure];

        /*$htmlDisplaydata = '<table class="table">
        <tr><td>Loan Amount(Rs)</td><td>:</td><td>'.$planamount.'</td></tr>
        <tr><td>Loan Tenure(Yrs)</td><td>:</td><td>'.$gumdataasdsad[$plantenure].'</td></tr>
        <tr><td>PA Sum Insured</td><td>:</td><td>'.$personalPremiumcal.'</td></tr>
        <tr><td>Accidental Hospitalization Sum Insured</td><td>:</td><td>'.$hospitalPremiumcal.'</td></tr>
        <tr><td>Credit Shield Sum insured</td><td>:</td><td>'.$credishiledPremiumcal.'</td></tr>
        <tr><td>Critical Illness Sum insured</td><td>:</td><td>'.$criticalPremiumcal.'</td></tr>
        <tr><td>Total Sum Insured</td><td>:</td><td>'.$finaPremiumAmount.'</td></tr>
        </table>';*/

      /*  $htmlDisplaydata = '<table class="table">
        <tr><td>Loan Amount(Rs)</td><td>:</td><td><input type="text" style="border: 0"  id="loan_amount" value="'.$planamount.'"</td></tr>
        <tr><td>Loan Tenure(Yrs)</td><td>:</td><td><input type="text" style="border: 0" id="plan_tenure" value="'.$gumdataasdsad[$plantenure].'"</td></tr>
        <tr><td>PA Sum Insured</td><td>:</td><td><input type="text" name="pa_sum" ng-model="pa_sum" style="border: 0" id="pa_sum" value="'.$pasicalloan.'"</td></tr>
        <tr><td>Accidental Hospitalization Sum Insured</td><td>:</td><td><input type="text" name="acci_hosp" ng-model="acci_hosp" style="border: 0" id="acci_hosp" value="'.$ahsicalloan.'"</td></tr>
        <tr><td>Credit Shield Sum insured</td><td>:</td><td><input type="text" name="credit_shied" ng-model="credit_shied" style="border: 0" id="credit_shied" value="'.$planamount.'"</td></tr>
        <tr><td>Critical Illness Sum insured</td><td>:</td><td><input type="text" name="critical_ill" ng-model="critical_ill" style="border: 0" id="critical_ill" value="'.$criticalloan.'"</td></tr>
        <tr><td>Total Premium</td><td>:</td><td><input type="text" style="border: 0"  id="total_pre_upp" value="'.$finaPremiumAmount.'"</td></tr>
        </table>';

        $returnJsondata['htmldata'] = $htmlDisplaydata;*/
        $returnJsondata['pasum'] = $pasicalloan;
        $returnJsondata['accidenthospi'] = $ahsicalloan;
        $returnJsondata['creditshield'] = $planamount;
        $returnJsondata['criticalill'] = $criticalloan;
        $returnJsondata['upptotalpremium'] = $finaPremiumAmount;
        $returnJsondata['loan_type'] = $loantype;
        $returnJsondata['loan_amount'] = $planamount;
        $returnJsondata['loan_tenure'] = $loan_type_upp;

        return $returnJsondata;

    }

}
