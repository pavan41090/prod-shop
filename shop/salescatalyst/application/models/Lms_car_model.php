    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lms_car_model extends CI_Model {

   // var $table = 'tbl_customer';
    var $column_order = array(null,'lead_application_id','first_name','last_name','cust_phone','cust_city','lead_status',null); //set column field database for datatable orderable
    var $column_search = array('lead_application_id','first_name','last_name','cust_phone','cust_city','lead_status'); //set column field database for datatable searchable 
    var $order = array('lead_id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model');

    }

    private function _get_datatables_query()
    {
        //led.*,cus.*, prdt.product_type, urs.user_location approve_status payment_type

       // echo $this->session->userdata('user_type_abbr');
        
        $this->db->select('`led`.`lead_id`,`led`.`lead_application_id`,`cust`.`first_name`,`cust`.`last_name`,`prdt`.`product_type`,`cust`.`cust_phone`, `cust`.`cust_city`,`led`.`lead_status`, `led`.`approve_status`,`led`.`payment_type`,`led`.`payment_status`');
        //$this->db->select('`led`.`lead_id`, `led`.`lead_application_id`, `cust`.`cus_card_name`, `cust`.`first_name`, `cust`.`last_name`, `cust`.`cust_phone`, `cust`.`cust_email`, `cust`.`cust_zip`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_area`, `cust`.`cust_city`, `cust`.`cust_state`, `led`.`HDFC_card_relationship_no`, `led`.`HDFC_card_last_4_digits`, `led`.`TSE_BDR_code`, `prdt`.`product_type`, `prdt`.`sum_insured`, `cust`.`business_type`, `prdt`.`lms_premium`, `cust`.`cus_emi`, `cust`.`cus_emi_yr`, `led`.`category`, `led`.`case_id`, `cust`.`processing_fee`, `led`.`bank_verifier_id`, `led`.`sub_channel`, `led`.`approve_status`, `led`.`payment_type`, `led`.`payment_status`, `led`.`lead_status`, `led`.`lead_sub_status`, `led`.`reject_comments`, `led`.`reject_code`, `led`.`aaa_number`, `usr`.`user_location`, `usr`.`emp_code`, `led`.`created_on` as `c_on`, `led`.`updated_on` as `u_on`');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id','left');
        $this->db->join('tbl_users AS usr','led.created_by = usr.emp_id');
        $this->db->join('tbl_user_activity_history AS tua','led.lead_id = tua.history_lead_id','left');
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }

    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $loggedUserId = $this->session->userdata('emp_id');
            
        switch ($this->session->userdata('user_type_abbr')) {
			
            case 'hdfc_av':
                $this->db->where('led.created_by', $loggedUserId);
                
                break;
            case 'bagi_av':
                $this->db->where('led.lead_status', 'Lead Generated');
                $this->db->or_where('led.lead_status', 'Follow Up');
                $this->db->or_where('led.lead_status', 'Not Contacted');
                $this->db->or_where('led.lead_status', 'Policy Issued');
                break;
           
            case 'report':
                if(isset($_POST['channel']) && $_POST['channel']!="" && $_POST['channel']!="All"){
                    $this->db->where('led.category',$_POST['channel']);
                }
                if( !empty($_POST['product']) ){ //if(isset($_POST['product']) && $_POST['product']!="" ){
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
                if(isset($_POST['location']) && $_POST['location']!="" && $_POST['location']!="All"){
                    $this->db->where('usr.user_location',$_POST['location']);
                }
                if(isset($_POST['supervisor']) && $_POST['supervisor']!="" && $_POST['supervisor']!="-1"){
                    #$this->db->where('led.created_by IN (select emp_id from tbl_users WHERE supervisor_id='.$_POST['supervisor'].')', NULL, FALSE);
                    $this->db->where('`tua`.history_activity_type = 4 AND `tua`.history_user_id = "'.$_POST['supervisor'].'"');
                }

          if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
            $startDate = new DateTime($_POST['startDate']);
            //$startDate->modify("-1 day");
            $endDate = new DateTime($_POST['endDate']);
            //$endDate->modify("+1 day");
                    $this->db->where(" date(led.created_on) BETWEEN '".$startDate->format('Y-m-d')."' AND '".$endDate->format('Y-m-d')."' ");
                    // $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                    // $this->db->where('led.created_on <',$endDate->format('Y-m-d'));
                }
                break;
               
                case 'lead data':

                if( !empty($_POST['product']) ){//if(isset($_POST['product']) && $_POST['product']!="" ){
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
                if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                    $startDate = new DateTime($_POST['startDate']);
                   // $startDate->modify("-1 day");
                    $endDate = new DateTime($_POST['endDate']);
                    //$endDate->modify("+1 day");
                     //$this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                     //$this->db->where('led.created_on <',$endDate->format('Y-m-d'));
                    $this->db->where(" date(led.created_on) BETWEEN '".$startDate->format('Y-m-d')."' AND '".$endDate->format('Y-m-d')."' ");
                }
                break;

            case 'supervisor':
               
                $category=$_POST['category'];
                $this->db->where('led.category',$category);
                $this->db->where('led.created_by IN (select emp_id from tbl_users WHERE FIND_IN_SET('.$loggedUserId.',supervisor_id))', NULL, FALSE);
                $this->db->where('led.lead_status', 'Sales Closed');
                $this->db->where('led.approve_status', NULL);
                $this->db->or_where('led.lead_status', 'Sales Closed Online');
                break;
            case 'hdfc_ops':
                $this->db->where('led.approve_status', 'Proceed for Debit');
                $this->db->where('led.payment_type', 'Credit Card');
                $this->db->where("(led.lead_status='Sales Closed')", NULL, FALSE);
                break;
            case 'bagi_ops':
               
                $this->db->where("(led.lead_status='Ready to Policy' OR led.lead_sub_status='Sales Closed Online')", NULL, FALSE);
                break;

            }
        $this->db->where('led.lead_status!=', '9999');
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
        
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $loggedUserId = $this->session->userdata('emp_id'); 
        switch ($this->session->userdata('user_type_abbr')) {
               case 'hdfc_av':
                //$this->db->where('led.lead_status', 'Lead Generated'); Follow Up
                $this->db->where('led.created_by', $loggedUserId);
                
                break;
            case 'bagi_av':
                $this->db->where('led.lead_status', 'Lead Generated');
                $this->db->or_where('led.lead_status', 'Follow Up');
                $this->db->or_where('led.lead_status', 'Not Contacted');
                break;
            case 'report':
                if(isset($_POST['channel']) && $_POST['channel']!="" && $_POST['channel']!="All"){
                    $this->db->where('led.category',$_POST['channel']);
                }
                if(!empty($_POST['product'])) { //if(isset($_POST['product']) && $_POST['product']!=""){
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
                if(isset($_POST['location']) && $_POST['location']!=""  && $_POST['location']!="All"){
                    $this->db->where('usr.user_location',$_POST['location']);
                }
                if(isset($_POST['supervisor']) && $_POST['supervisor']!="" && $_POST['supervisor']!="-1"){
                    $this->db->where('led.created_by IN (select emp_id from tbl_users WHERE supervisor_id='.$_POST['supervisor'].')', NULL, FALSE);
                }
                
                 if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                    $startDate = new DateTime($_POST['startDate']);
            $startDate->modify("-1 day");
            $endDate = new DateTime($_POST['endDate']);
            $endDate->modify("+1 day");
                     $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                    $this->db->where('led.created_on <', $endDate->format('Y-m-d'));
                }
                break;

            case 'lead data':
                    if( !empty($_POST['product']) ){ //if(isset($_POST['product']) && $_POST['product']!="" ){
                            $this->db->where('prdt.product_type',$_POST['product']);
                        }
               if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                   $startDate = new DateTime($_POST['startDate']);
                  // $startDate->modify("-1 day");
                  $endDate = new DateTime($_POST['endDate']);
                  //$endDate->modify("+1 day");
                  // $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                  // $this->db->where('led.created_on <',$endDate->format('Y-m-d'));
                  $this->db->where(" date(led.created_on) BETWEEN '".$startDate->format('Y-m-d')."' AND '".$endDate->format('Y-m-d')."' ");
                }

                break;

            case 'supervisor':
                $category=$_POST['category'];

                $this->db->where('led.category',$category);
                $this->db->where('led.created_by IN (select emp_id from tbl_users WHERE supervisor_id='.$loggedUserId.')', NULL, FALSE);
                $this->db->where('led.lead_status', 'Sales Closed');
                $this->db->where('led.approve_status', NULL);
                $this->db->or_where('led.lead_status', 'Sales Closed Online');
                break;
            case 'hdfc_ops':
                $this->db->where('led.approve_status', 'Proceed for Debit');
                $this->db->where('led.payment_type', 'Credit Card');
                $this->db->where("(led.lead_status='Sales Closed')", NULL, FALSE);
                break;
            case 'bagi_ops':
               // $this->db->where('led.approve_status', 'Proceed for Debit');
                //$this->db->where('led.payment_status', 'Completed');
                //$this->db->where("(led.payment_type !='Credit Card' OR led.payment_status ='Completed')", NULL, FALSE);
                $this->db->where("(led.lead_status='Ready to Policy' OR led.lead_sub_status='Sales Closed Online')", NULL, FALSE);
                break;
            }

        $this->db->where('led.lead_status!=', '9999');
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
      // var_dump($this->db->last_query());
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->select('`led`.`lead_id`, `led`.`lead_application_id`, `cust`.`cus_card_name`, `cust`.`first_name`, `cust`.`last_name`, `cust`.`cust_phone`, `cust`.`cust_email`, `cust`.`cust_zip`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_area`, `cust`.`cust_city`, `cust`.`cust_state`, `led`.`HDFC_card_relationship_no`, `led`.`HDFC_card_last_4_digits`, `led`.`TSE_BDR_code`, `prdt`.`product_type`, `prdt`.`sum_insured`, `cust`.`business_type`, `prdt`.`lms_premium`, `cust`.`cus_emi`, `cust`.`cus_emi_yr`, `led`.`category`, `led`.`case_id`, `cust`.`processing_fee`, `led`.`bank_verifier_id`, `led`.`sub_channel`, `led`.`approve_status`, `led`.`lead_status`, `led`.`lead_sub_status`, `led`.`reject_comments`, `led`.`reject_code`, `led`.`aaa_number`, `usr`.`user_location`, `usr`.`emp_code`, `led`.`created_on` as `c_on`, `led`.`updated_on` as `u_on`');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id');
        $this->db->join('tbl_users AS usr','led.created_by = usr.emp_id');
        $loggedUserId = $this->session->userdata('emp_id'); 
        switch ($this->session->userdata('user_type_abbr')) {
               case 'hdfc_av':
                //$this->db->where('led.lead_status', 'Lead Generated'); Follow Up
                $this->db->where('led.created_by', $loggedUserId);
                
                break;
            case 'bagi_av':
                $this->db->where('led.lead_status', 'Lead Generated');
                $this->db->or_where('led.lead_status', 'Follow Up');
                $this->db->or_where('led.lead_status', 'Not Contacted');
                break;
            case 'supervisor':
                $category=$_POST['category'];

                $this->db->where('led.category',$category);
                $this->db->where('led.created_by IN (select emp_id from tbl_users WHERE supervisor_id='.$loggedUserId.')', NULL, FALSE);
                $this->db->where('led.lead_status', 'Sales Closed');
                $this->db->where('led.approve_status', NULL);
                $this->db->or_where('led.lead_status', 'Sales Closed Online');
                break;
            case 'report':
                if(isset($_POST['channel']) && $_POST['channel']!="" && $_POST['channel']!="All"){
                    $this->db->where('led.category',$_POST['channel']);
                }
                if(!empty($_POST['product'])) { //if(isset($_POST['product']) && $_POST['product']!=""){
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
                if(isset($_POST['location']) && $_POST['location']!="" && $_POST['location']!="All"){
                    $this->db->where('usr.user_location',$_POST['location']);
                }
                if(isset($_POST['supervisor']) && $_POST['supervisor']!="" && $_POST['supervisor']!="-1"){
                    $this->db->where('led.created_by IN (select emp_id from tbl_users WHERE supervisor_id='.$_POST['supervisor'].')', NULL, FALSE);
                }
                
                 if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                    $startDate = new DateTime($_POST['startDate']);
                    $startDate->modify("-1 day");
                    $endDate = new DateTime($_POST['endDate']);
                    $endDate->modify("+1 day");
                     $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                    $this->db->where('led.created_on <', $endDate->format('Y-m-d'));
                }
                break;

            case 'lead data':

               if( !empty($_POST['product']) ){// if(isset($_POST['product']) && $_POST['product']!="" ){
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
                if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                    $startDate = new DateTime($_POST['startDate']);
                   // $startDate->modify("-1 day");
                    $endDate = new DateTime($_POST['endDate']);
                   // $endDate->modify("+1 day");
                   // $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                   // $this->db->where('led.created_on <',$endDate->format('Y-m-d'));
                    $this->db->where(" date(led.created_on) BETWEEN '".$startDate->format('Y-m-d')."' AND '".$endDate->format('Y-m-d')."' ");
                }

                break;
                
            case 'hdfc_ops':
                $this->db->where('led.approve_status', 'Proceed for Debit');
                $this->db->where('led.payment_type', 'Credit Card');
                $this->db->where("(led.lead_status='Sales Closed')", NULL, FALSE);
                break;
            case 'bagi_ops':
                //$this->db->where('led.approve_status', 'Proceed for Debit');
                //$this->db->where('led.payment_status', 'Completed');
                //$this->db->where("(led.payment_type !='Credit Card' OR led.payment_status ='Completed')", NULL, FALSE);
                $this->db->where("(led.lead_status='Ready to Policy' OR led.lead_sub_status='Sales Closed Online')", NULL, FALSE);
                break;
            }
                $this->db->where('led.lead_status!=', '9999');
                $this->db->group_by('led.lead_id');
        return $this->db->count_all_results();
    }

    public function generateApplicationNumber(){

        $row = $this->db->query('SELECT MAX(lead_id) AS `maxid` FROM `tbl_lead`')->row();
        if ($row) {
            $maxid = $row->maxid;   
        } else {
            $maxid = 1;
        }

        return 'BAGI'.date('Ymd').$maxid;
        exit(); 

    }



    //common function for insert any table 
    public function insertDataCommon($cusData,$table){

        $this->db->insert($table, $cusData);
        $latest_id = $this->db->insert_id();
        return $latest_id;
    }

    /*public function deleteRow($custId){


         $this->db->where('customer_id', $custId);
         $this->db->delete('tbl_prop_options');
    }*/

     public function updateDataCommon($cusData,$table,$updateFiled,$updateValue) {

        if($table == 'tbl_family_doctor'){
			
            $this->db->select("count('family_doctor_id') count");
            $this->db->where($updateFiled, $updateValue);
            $sqlCommand = $this->db->get($table);
            
            $num_Rows_data = $sqlCommand->row_object();
            if($num_Rows_data->count > 0){

                $this->db->where($updateFiled, $updateValue);
        $this->db->update($table, $cusData);
       // $latest_id = $this->db->insert_id();
        if($this->db->affected_rows() > 0){
                return $updateValue;
        }else{
            return 0;
        }

            } else {

                $this->db->insert($table,$cusData);
               
                if($this->db->insert_id()>0)
                    return $updateValue;
            }
        } else {

        $this->db->where($updateFiled, $updateValue);
        $this->db->update($table, $cusData);
		
       // $latest_id = $this->db->insert_id();
        if($this->db->affected_rows() > 0){
                return $updateValue;
        }else{
            return 0;
        }

        }
       // return $latest_id;
    }

    public function getLeadDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id');
        $this->db->join('tbl_propsal AS prop','led.lead_id = prop.lead_id','left');
        $this->db->join('tbl_driving_habits AS drhb','led.lead_id = drhb.lead_id','left');
        $this->db->join('tbl_prop_options AS opt','led.lead_id = opt.lead_id','left');
        $this->db->join('tbl_nominee AS nomn','led.lead_id = nomn.lead_id','left');
        $this->db->where('led.lead_id', $leadId);
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
        return $query->result();

    }

//lead_id  cust_id  product_id  propsal_id  nominee_id habits_id family_doctor_id option_id


    public function getLeadDetailsByLeadIdforEdit($leadId){

        $this->db->select('led.lead_id, led.lead_application_id, led.category, led.line_of_business, led.priority, led.HDFC_branch_loc, led.HDFC_ergo_loc, led.target_date, led.TSE_BDR_code, led.TL_code, led. SM_code, led.bank_verifier_id, led.aaa_number, led.case_id, led.payment_type, led.sub_channel, led.HDFC_card_relationship_no, led.HDFC_card_last_4_digits, led.lead_details, led.lead_status, led.vision_address, led.approve_status, led.payment_status, led.payment_details, cust.cus_card_name, cust.cus_relation_ishued, cust.cust_id, cust.cus_title, cust.first_name, cust.last_name, cust.date_of_birth, cust.cust_gender, cust.marital_status, cust.cust_pan, cust.cust_street1, cust.cust_street2,cust.cust_street3, cust.cust_area, cust.cust_zip, cust.cust_state, cust.cust_city, cust.cust_landmark, cust.cust_email, cust.cust_phone, cust.cust_type, cust.occupation, cust.cust_house_number, cust.cust_age, cust.emergency_contact_num, cust.GSTIN, cust.cus_customer, cust.cus_language, cust.cus_emi, cust.cus_emi_yr, cust.processing_fee, cust.cus_cardlimt, cust.statement_date, cust.temp_LE, cust.business_type , prdt.product_id, prdt.product_type, prdt.pre_insurance, prdt.reg_number, prdt. manufacture_year, prdt. manufacturer, prdt. model_varient, prdt.registration_city, prdt.   policy_expire_date, prdt.IDV_value, prdt.show_room_value, prdt.expiring_policy_claim, prdt.expiring_policy_NCB, prdt.lms_premium, prdt.sum_insured, prdt.ship_spouse_include, prdt.ss_hospital_daily, prdt.ss_critical, prdt.ss_sum_insured_critical, prdt.ship_spouse_dob, prdt.ship_income, prdt.ship_policy_term, prdt.ship_no_of_children, prdt.home_plans, prdt.home_policy_start, prdt.home_policy_end, prdt.hme_building_type, prdt.hme_property_ownership, prdt.hme_property_type, prdt.hme_previous_claims, prdt.hme_no_of_floors, prdt.hme_year_of_construction, prdt.hme_independent_house, prdt.hme_compound_wall, prdt.hme_build_up, prdt.hme_sum_insured_provided, prdt.hme_risk_address_same, prdt.hme_risk_address1, prdt.hme_risk_address2, prdt.hme_risk_area, prdt.hme_risk_pincode, prdt.hme_risk_state, prdt.hme_risk_city, prdt.hme_risk_nearest_land_mark, prdt.gainful, prdt.travel_policy_type, prdt.  travel_type_trip, prdt.travel_cover_type, prdt.travel_depart_date, prdt.travel_return_date, prdt.travel_trip_duration, prdt.traveltype, prdt.geographical, prdt.travel_max_trip , prop.propsal_id, prop.existing_insure, prop.existing_policy_num, prop.existing_policy_expiry, prop.new_policy_start, prop.prop_mtr_reg_date, prop.prop_mtr_regi_num, prop.prop_mtr_engine_num, prop.prop_mtr_chasis_num, prop.prop_mtr_financed, prop.prop_mtr_fin_ins_name, prop.prop_mtr_fin_ins_city, prop.prop_mtr_prev_stand_alone, prop.prop_mtr_prev_prev_depre,  prop.prop_mtr_prev_prev_electric, prop.prop_mtr_prev_prev_cng_lpg, prop.sship_pro_height, prop.sship_pro_Weight, prop.ship_pre_insurer, prop.ship_primary_insured, prop.travel_pro_present_india, prop.travel_pro_vaild_passport, prop.travel_pro_national, prop.travel_pro_passport_no, nomn.nominee_id, nomn.nominee_name, nomn.nominee_age, nomn.nominee_relationship, nomn.appointee_name, nomn.appointee_relationship, drhb.habits_id, drhb.driving_exp, drhb.night_parking, drhb.driver_count, drhb.KM_per_year, drhb.young_driver_age, drhb.ext_driver, fdr.family_doctor_id, fdr.sship_pro_doc_name, fdr.sship_pro_doc_qualifi, fdr.sship_pro_doc_addr, fdr.sship_pro_doc_mobile, fdr.sship_pro_hos_num,  opt.option_id, 
            opt.mem_type, opt.mem_title, opt.mem_first_name, opt.mem_last_name, opt.mem_DOB, opt.mem_height,
            opt.mem_weight, opt.mem_gender, opt.mem_ocupation, opt.mem_relashionship,opt.mem_age,opt.delivery_date, opt.smoke, opt.alcohol, opt.pan_masala, opt.option_1, opt.option_2, opt.option_3, opt.option_4, opt.option_5, opt.option_6, opt.option_7, opt.option_8, opt.option_9, opt.option_10, opt.option_11,opt.pa_option_comment,cmts.comment');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id','left');
        $this->db->join('tbl_propsal AS prop','led.lead_id = prop.lead_id','left');
        $this->db->join('tbl_nominee AS nomn','led.lead_id = nomn.lead_id','left');
        $this->db->join('tbl_driving_habits AS drhb','led.lead_id = drhb.lead_id','left');
        $this->db->join('tbl_prop_options AS opt','led.lead_id = opt.lead_id','left');
        $this->db->join('tbl_family_doctor AS fdr','led.lead_id = fdr.lead_id','left');
        $this->db->join('tbl_comments AS cmts', 'led.lead_id = cmts.lead_id','left');
        //$this->db->join('tbl_prop_options AS opt','led.lead_id = opt.lead_id','left');
        $this->db->where('led.lead_id', $leadId);
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
       //echo $this->db->last_query(); tbl_pee_details lms_premium
        //return $query->result();
      // $sum_insured="";
       // $hme_previous_claims="";
        

        $leadDeatailsArray = array();
        foreach($query->result() as $lds){

            $leadDeatailsArray[] = array (
                'lead_id'       =>  $lds->lead_id,
                'lead_application_id'=> $lds->lead_application_id,
                'product_type'  => $lds->product_type,
                'lead_status'   => $lds->lead_status,
                'lead_id'       => $lds->lead_id,
                'cust_id'       => $lds->cust_id,
                'product_id'    => $lds->product_id,
                'propsal_id'    => $lds->propsal_id,
                'priority'      => $lds->priority,
                //'campaign_name' => $lds->campaign_name,
                'nominee_id'    => $lds->nominee_id,
                'habits_id'     => $lds->habits_id,
                'vision_address' => $lds->vision_address,               
                'family_doctor_id'=> $lds->family_doctor_id,
                'option_id'     => $lds->option_id,
                'category'      => $lds->category,
                'line_of_business'=> $lds->line_of_business,
                'HDFC_branch_loc'=> $lds->HDFC_branch_loc,
                'HDFC_ergo_loc' => $lds->HDFC_ergo_loc,
                'aaa_number'    => $lds->aaa_number,
                'target_date'   => $lds->target_date,
                'TSE_BDR_code'  => $lds->TSE_BDR_code,
                'TL_code'       => $lds->TL_code,
                'SM_code'       => $lds->SM_code,
                'business_type' => $lds->business_type,
                'bank_verifier_id'=> $lds->bank_verifier_id,
                'payment_type'  => $lds->payment_type,
                'sub_channel'   => $lds->sub_channel,
                'HDFC_card_relationship_no'=> $lds->HDFC_card_relationship_no,
                'HDFC_card_last_4_digits'=> $lds->HDFC_card_last_4_digits,
                'cuscardname'     => $lds->cus_card_name,
                'cusrelationishued'     => $lds->cus_relation_ishued,
                'cus_title'     => $lds->cus_title,
                'first_name'    => $lds->first_name,
                'last_name'     => $lds->last_name,
                'date_of_birth' => $lds->date_of_birth,
                'cust_age'      => $lds->cust_age,
                'marital_status'=> $lds->marital_status,
                'cust_gender'   => $lds->cust_gender,
                'case_id'       => $lds->case_id,
                'cust_pan'      => $lds->cust_pan,
                'cust_street1'  => $lds->cust_street1,
                'cust_street2'  => $lds->cust_street2,
                'cust_street3'  => $lds->cust_street3,
                'cust_area'     => $lds->cust_area,
                'cust_zip'      => $lds->cust_zip,
                'cust_state'    => $lds->cust_state,
                'cust_city'     => $lds->cust_city,
                'lead_details'  => $lds->lead_details,
                'cust_landmark' => $lds->cust_landmark,
                'emergency_contact_num'=> $lds->emergency_contact_num,
                'GSTIN'         => $lds->GSTIN,
                'cust_email'    => $lds->cust_email,
                'cust_phone'    => $lds->cust_phone,
                'cust_type'     => $lds->cust_type,
                'processing_fee'=> $lds->processing_fee,
                'cus_cardlimt'  => $lds->cus_cardlimt,
                'statement_date'=> $lds->statement_date,
                'temp_LE'       => $lds->temp_LE,
                'occupation'    => $lds->occupation,
                'cust_house_number' =>$lds->cust_house_number,
                'cus_emi'       => $lds->cus_emi,
                'cus_emi_yr'    => $lds->cus_emi_yr,
                'cus_customer' => $lds->cus_customer,
                'cus_language' =>$lds->cus_language,                
                'reg_number'    => $lds->reg_number,
                'manufacture_year'=> $lds->manufacture_year,
                'manufacturer'  => $lds->manufacturer,
                'model_varient' => $lds->model_varient,
                'registration_city'=> $lds->registration_city,
                'policy_expire_date'=> $lds->policy_expire_date,
                'IDV_value'     => $lds->IDV_value,
                'expiring_policy_claim'=> $lds->expiring_policy_claim,
                'expiring_policy_NCB'=> $lds->expiring_policy_NCB,
                'lms_premium'   => $lds->lms_premium,
                'sum_insured' => $lds->sum_insured,
                'gainful'=>$lds->gainful,
                'existing_insure'=> $lds->existing_insure,
                'existing_policy_num'=> $lds->existing_policy_num,
                'existing_policy_expiry'=> $lds->existing_policy_expiry,
                'new_policy_start'=> $lds->new_policy_start,
                'prop_mtr_reg_date'=> $lds->prop_mtr_reg_date,
                'prop_mtr_engine_num'=> $lds->prop_mtr_engine_num,
                'prop_mtr_chasis_num'=> $lds->prop_mtr_chasis_num,
                'prop_mtr_financed'=> $lds->prop_mtr_financed,
                'ship_spouse_dob' => $lds->ship_spouse_dob,
                'prop_mtr_fin_ins_name'=> $lds->prop_mtr_fin_ins_name, 
                'prop_mtr_fin_ins_city'=> $lds->prop_mtr_fin_ins_city, 
                'prop_mtr_prev_stand_alone'=> $lds->prop_mtr_prev_stand_alone, 
                'prop_mtr_prev_prev_depre'=> $lds->prop_mtr_prev_prev_depre,  
                'prop_mtr_prev_prev_electric'=> $lds->prop_mtr_prev_prev_electric, 
                'prop_mtr_prev_prev_cng_lpg'=> $lds->prop_mtr_prev_prev_cng_lpg,


                //added now by madhesh
                'travel_pro_passport_no' => $lds->travel_pro_passport_no,
                'travel_pro_national' =>$lds->travel_pro_national,
                'travel_pro_present_india'=>$lds->travel_pro_present_india,
                'travel_pro_vaild_passport' =>$lds->travel_pro_vaild_passport,
                'travel_policy_type' =>$lds->travel_policy_type,
                'travel_type_trip'=>$lds->travel_type_trip,
                'travel_cover_type'=>$lds->travel_cover_type,
                'travel_depart_date'=>$lds->travel_depart_date,
                'travel_return_date'=>$lds->travel_return_date,
                'travel_trip_duration'=>$lds->travel_trip_duration,
                'traveltype'=>$lds->traveltype,
                'geographical'=>$lds->geographical,
                'home_plans' => $lds->home_plans,
                'home_policy_start'=> $lds->home_policy_start,
                'home_policy_end'=> $lds->home_policy_end,
                'hme_building_type'=> $lds->hme_building_type, 
                'hme_property_ownership'=> $lds->hme_property_ownership, 
                'hme_property_type'=> $lds->hme_property_type, 
                'hme_previous_claims'=> $lds->hme_previous_claims,
                'hme_no_of_floors'=> $lds->hme_no_of_floors, 
                'hme_year_of_construction'=> $lds->hme_year_of_construction, 
                'hme_independent_house'=> $lds->hme_independent_house, 
                'hme_compound_wall'=> $lds->hme_compound_wall, 
                'hme_build_up'=> $lds->hme_build_up, 
				
                'hme_sum_insured_valuables'=> json_decode($lds->hme_sum_insured_provided)->valuables, 
                'hme_sum_insured_pee'=> json_decode($lds->hme_sum_insured_provided)->pee, 
                'hme_sum_insured_structure'=> json_decode($lds->hme_sum_insured_provided)->structure, 
                'hme_risk_address_same'=> $lds->hme_risk_address_same, 
                'hme_risk_address1'=> $lds->hme_risk_address1, 
                'hme_risk_address2'=> $lds->hme_risk_address2, 
                'hme_risk_area'=> $lds->hme_risk_area, 
                'hme_risk_pincode'=> $lds->hme_risk_pincode, 
                'hme_risk_state'=> $lds->hme_risk_state, 
                'hme_risk_city'=> $lds->hme_risk_city, 
                'hme_risk_nearest_land_mark'=> $lds->hme_risk_nearest_land_mark,
                'mem_type'=>$lds->mem_type,
                'mem_title'=>$lds->mem_title,
                'mem_first_name'=>$lds->mem_first_name,
                'mem_last_name'=>$lds->mem_last_name,
                'mem_DOB'=>$lds->mem_DOB,
                'mem_height'=>$lds->mem_height,
                'mem_weight'=>$lds->mem_weight,
                'mem_gender'=>$lds->mem_gender,
                'mem_ocupation'=>$lds->mem_ocupation,
                'mem_relashionship'=>$lds->mem_relashionship,
                'mem_age'=>$lds->mem_age,
                'delivery_date'=>$lds->delivery_date,
                'smoke'=>$lds->smoke,
                'alcohol'=>$lds->alcohol,           
                'nominee_name'=> $lds->nominee_name,
                'nominee_age'=> $lds->nominee_age,
                'nominee_relationship'=> $lds->nominee_relationship,
                'appointee_name'=> $lds->appointee_name,
                'appointee_relationship'=> $lds->appointee_relationship,
                'driving_exp'=> $lds->driving_exp,
                'night_parking'=> $lds->night_parking,
                'driver_count'=> $lds->driver_count,
                'KM_per_year'=> $lds->KM_per_year,
                'young_driver_age'=> $lds->young_driver_age,
                'ext_driver'=> $lds->ext_driver,
                'new_policy_start'=> $lds->new_policy_start,
                'ship_spouse_include'=> $lds->ship_spouse_include,
                'ship_no_of_children'=> $lds->ship_no_of_children,
                'ship_income'=> $lds->ship_income,
                'ship_policy_term'=> $lds->ship_policy_term,
                'new_policy_start'=> $lds->new_policy_start,
                'sship_pro_height'=> $lds->sship_pro_height,
                'sship_pro_Weight'=> $lds->sship_pro_Weight,
                'sship_pro_doc_name'=> $lds->sship_pro_doc_name,
                'sship_pro_doc_qualifi'=> $lds->sship_pro_doc_qualifi,
                'sship_pro_doc_addr'=> $lds->sship_pro_doc_addr,
                'sship_pro_doc_mobile'=>$lds->sship_pro_doc_mobile,
                'sship_pro_hos_num'=> $lds->sship_pro_hos_num, 
                'ship_pre_insurer' => $lds->ship_pre_insurer,
                'ship_primary_insured' => $lds->ship_primary_insured,    
                'comment'=>$lds->comment,
                'ss_hospital_daily' => $lds->ss_hospital_daily,
                'ss_critical' => $lds->ss_critical,
                'ss_sum_insured_critical' => $lds->ss_sum_insured_critical,
                'member_details' => $this->getMemberDetailsByLeadId($leadId),
                'previous_insured'=>$this->getPreviousInsuranceDetailsByLeadId($leadId),
                'primary_insured' => $this->getPrimaryInsuredDetailsByLeadId($leadId), 
                'valuables_desc' => $this->getValuableDescriptionDetailsByLeadId($leadId), 
                'pee_desc' => $this->getPortableElectronicDetailsByLeadId($leadId),
                'pre_claim_desc' => $this->getPreviousYearClaimDetailsByLeadId($leadId),

            );    
        }    

        return $leadDeatailsArray;


    }

    public function getMemberDetailsByLeadId($leadId){
        
        $this->db->select('*');  
        $this->db->from('tbl_prop_options');
        $this->db->where('lead_id', $leadId);
        $query = $this->db->get();
        $memberDetailsArray = array();
        foreach($query->result() as $rst){

            $memberDetailsArray[] = array (
                'option_id'=> $rst->option_id,
                'mem_type' => $rst->mem_type,
                'mem_title' => $rst->mem_title,
                'mem_first_name' => $rst->mem_first_name,
                'mem_last_name' => $rst->mem_last_name,
                'mem_DOB' => $rst->mem_DOB,
                'mem_height' => $rst->mem_height,
                'mem_weight' => $rst->mem_weight,
                'mem_height_feet'=>$rst->mem_height_feet,
                'mem_height_inches'=>$rst->mem_height_inches,
                'mem_gender' => $rst->mem_gender,
                'mem_ocupation' => $rst->mem_ocupation,
                'mem_relashionship' => $rst->mem_relashionship,
                'mem_age' => $rst->mem_age,
                'delivery_date' => $rst->delivery_date,
                'smoke' => $rst->smoke,
                'alcohol' => $rst->alcohol,
                'pan_masala' => $rst->pan_masala,
                'others' => $rst->others,
                'option_1' => $rst->option_1,
                'option_2' => $rst->option_2,
                'option_3' => $rst->option_3,
                'option_4' => $rst->option_4,
                'option_5' => $rst->option_5,
                'option_6' => $rst->option_6,
                'option_7' => $rst->option_7,
                'option_8' => $rst->option_8,
                'option_9' => $rst->option_9,
                'option_10' => $rst->option_10,
                'option_11' => $rst->option_11,
                'medical_history' => $this->getMedicalMemberHistory($leadId, $rst->option_id),

            );

        }
            // echo '<pre>';
            // print_r($memberDetailsArray);
            // exit();
        return $memberDetailsArray;

    }

//pre_status  created_date    created_by

    public function getPreviousInsuranceDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_pre_insurance');
        $this->db->where('lead_id', $leadId);
        $query = $this->db->get();
        $preInsArray = array();
        foreach($query->result() as $pia){    
            $preInsArray[] = array(
                'pre_ins_id'    => $pia->pre_ins_id,
                'pre_name'      => $pia->pre_name,
                'prer_policy_number' => $pia->prer_policy_number,
                'pre_from_date'     => $pia->pre_from_date,
                'pre_to_date'       => $pia->pre_to_date,
                'pre_sum_insured'   => $pia->pre_sum_insured,
                'pre_claim_lodged'  => $pia->pre_claim_lodged,
                'pre_cum_bonus'     => $pia->pre_cum_bonus,
                'pre_ins_id'        => $pia->pre_ins_id,
            );

        }    
        return $preInsArray;
    }



//      customer_id lead_id  
//                              prim_status creaded_on  created_by

    public function getPrimaryInsuredDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_primary_insured');
        $this->db->where('lead_id', $leadId);
        $query = $this->db->get();
        $primaryInsArray = array();
        foreach($query->result() as $prm){    
            $primaryInsArray[] = array(
                'prim_ins_id'       => $prm->prim_ins_id,
                'prim_title'        => $prm->prim_title,
                'prim_name'         => $prm->prim_name,
                'prim_relation'     => $prm->prim_relation,
                'prim_dob'          => $prm->prim_dob,
                'prim_gender'       => $prm->prim_gender,
                'prim_addr1'        => $prm->prim_addr1,
                'prim_addr2'        => $prm->prim_addr2,
                'prim_landmark'     => $prm->prim_landmark,
                'prim_fixed_line'   => $prm->prim_fixed_line,
                'prim_mobile'       => $prm->prim_mobile,
                'prim_email'        => $prm->prim_email,
                'prim_nationality'  => $prm->prim_nationality,
                'prim_occupation'   => $prm->prim_occupation,
                'prim_income'       => $prm->prim_income,
                'prim_PPC_No'       => $prm->prim_PPC_No,
            );
        }    
        return $primaryInsArray;
    }

    public function getValuableDescriptionDetailsByLeadId($leadId){
   
        $this->db->select('*');  
        $this->db->from('tbl_valuable_details');
        $this->db->where(array('lead_id'=> $leadId,'status'=>1));
        $query = $this->db->get();
		
        $valuableArray = array();
        foreach($query->result() as $prm){    
            $valuableArray[] = array(
                'valuable_id'   => $prm->valuable_id,
                'hme_itm_des'   => $prm->hme_itm_des,
                'hme_weight'    => $prm->hme_weight,
                'hme_SI'        => $prm->hme_SI,
            );
        }    
        return $valuableArray;
    }

    
    public function getPortableElectronicDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_pee_details');
        $this->db->where(array('lead_id'=> $leadId,'status'=>1));
		
        $query = $this->db->get();
		
        $peeArray = array();
        foreach($query->result() as $prm){    
            $peeArray[] = array(
                'pee_id'        => $prm->pee_id,
                'hme_itm_des'   => $prm->hme_itm_des,
                'hme_make'      => $prm->hme_make,
                'hme_model'     => $prm->hme_model,
                'hme_YOM'       => $prm->hme_YOM,
                'hme_IMEI'      => $prm->hme_IMEI,
                'hme_SI'        => $prm->hme_SI,
            );
        }    
        return $peeArray;
    }


    public function getPreviousYearClaimDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_claim_details');
        $this->db->where('lead_id', $leadId);
        $query = $this->db->get();
        $peeArray = array();
        foreach($query->result() as $prm){    
            $peeArray[] = array(
                'claim_id'          => $prm->claim_id,
                'hme_long_des'      => $prm->hme_long_des,
                'hme_assets_damage' => $prm->hme_assets_damage,
                'hme_cause_loss'    => $prm->hme_cause_loss,
                'hme_ins_place'     => $prm->hme_ins_place,
                'hme_policy_yr'     => $prm->hme_policy_yr,
                'hme_ins_claim'     => $prm->hme_ins_claim,
                'hme_loss_amt'      => $prm->hme_loss_amt,
      
            );
        }    
        return $peeArray;   
    }


    public function getMedicalMemberHistory($leadId,$memberId){

        $this->db->select('*');  
        $this->db->from('tbl_member_medical_history');
        $this->db->where('lead_id', $leadId);
        $this->db->where('option_id', $memberId);
        $query = $this->db->get();
        return $query->result();

    }


    public function getCommentsByLeadId($leadId) {

        $this->db->select('cms.*, usr.user_name, usr.emp_code, usr.emp_name ');  
        $this->db->from('tbl_comments AS cms');
        $this->db->join('tbl_users AS usr','cms.created_on = usr.emp_id');
        $this->db->where('cms.lead_id', $leadId);
        
        $query = $this->db->get();
        return $query->result();
    }


    public function getValuableDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_valuable_details');
        $this->db->where(array('lead_id'=> $leadId,'status'=>1));
        $query = $this->db->get();
		
        return $query->result();
    }


    public function getPEEIDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_pee_details');
        $this->db->where(array('lead_id'=> $leadId,'status'=>1));
        $query = $this->db->get();
        return $query->result();
    }

    public function getPreClaimDetailsByLeadId($leadId){

        $this->db->select('*');  
        $this->db->from('tbl_claim_details');
        $this->db->where('lead_id', $leadId);
        $query = $this->db->get();
		
        return $query->result();
    }




    public function getLeadsForExcel($product = NULL, $type = NULL){

        //'`led`.`lead_id`, `led`.`lead_application_id`, `cust`.`date_of_birth`,`cust`.`cust_pan`,`cust`.`marital_status`,`cust`.`cust_age`, `cust`.`cust_gender`, `cust`.`cus_card_name`, `cust`.`first_name`, `cust`.`last_name`, `cust`.`cust_phone`, `cust`.`cust_email`, `cust`.`cust_zip`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_area`, `cust`.`cust_city`, `cust`.`cust_state`, `led`.`HDFC_card_relationship_no`, `led`.`HDFC_card_last_4_digits`, `led`.`TSE_BDR_code`, `prdt`.`product_type`, `prdt`.`sum_insured`, `cust`.`business_type`, `prdt`.`lms_premium`, `cust`.`cus_emi`, `cust`.`cus_emi_yr`, `led`.`category`, `led`.`case_id`, `cust`.`processing_fee`, `led`.`bank_verifier_id`, `led`.`sub_channel`, `led`.`approve_status`, `led`.`lead_status`, `led`.`lead_sub_status`, `led`.`reject_comments`, `led`.`reject_code`, `led`.`aaa_number`, `usr`.`user_location`, `usr`.`emp_code`, `led`.`created_on` as `c_on`, `led`.`updated_on` as `u_on`, `usr`.`user_location`'

        $this->db->select('`led`.`lead_id`, `led`.`lead_application_id`, `cust`.`cus_customer`,`cust`.`GSTIN`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_street3`,`cust`.`cust_type`, `cust`.`marital_status`, `cust`.`cust_age`, `cust`.`date_of_birth`,`cust`.`cust_gender`,`cust`.`cust_pan`,`cust`.`business_type`,`cust`.`temp_LE`,`cust`.`statement_date`,`cust`.`processing_fee`,`cust`.`cus_language`,`cust`.`occupation`,`cust`.`emergency_contact_num`, `cust`.`cus_card_name`, `cust`.`first_name`, `cust`.`last_name`, `cust`.`cust_phone`, `cust`.`cust_email`, `cust`.`cust_zip`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_area`, `cust`.`cust_city`, `cust`.`cust_state`, `led`.`HDFC_card_relationship_no`, `led`.`HDFC_card_last_4_digits`, `led`.`TSE_BDR_code`, `prdt`.`product_type`, `prdt`.`sum_insured`, `cust`.`business_type`, `prdt`.`lms_premium`, `cust`.`cus_emi`, `cust`.`cus_emi_yr`, `led`.`category`, `led`.`case_id`, `cust`.`processing_fee`, `led`.`bank_verifier_id`, `led`.`sub_channel`, `led`.`approve_status`, `led`.`lead_status`, `led`.`lead_sub_status`, `led`.`reject_comments`, `led`.`reject_code`, `led`.`lead_details`,`led`.`SM_code`, `led`.`payment_type`, `led`.`case_id`,`led`.`sub_channel`, `led`.`aaa_number`,`led`.`target_date`,`led`.`TSE_BDR_code`,`led`.`aaa_number`, `usr`.`user_location`, `usr`.`emp_code`, `led`.`created_on` as `c_on`, `led`.`updated_on` as `u_on`, `usr`.`user_location`, `nomn`.`nominee_name`, `nomn`.`nominee_age`, `nomn`.`nominee_relationship`, `nomn`.`appointee_name`, `nomn`.`appointee_relationship`');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id','INNER');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id','INNER');      
        $this->db->join('tbl_users AS usr','led.created_by = usr.emp_id','INNER'); 
         $this->db->join('tbl_nominee AS nomn','led.lead_id = nomn.lead_id','LEFT');

        if($this->session->userdata('user_type_abbr') == 'hdfc_ops'){
            $this->db->where('led.approve_status', 'Proceed for Debit');
            $this->db->where('led.payment_type', 'Credit Card');
            $this->db->where("(led.lead_status='Sales Closed')", NULL, FALSE);
        }
        if( $this->session->userdata('user_type_abbr') == 'bagi_ops' ){
            if(!empty($product)){ 
                $this->db->where('prdt.product_type', $product);
            } else {
                $this->db->where('prdt.product_type !=', '');
            }
            if($type !== '' && $type == 'PEEI'){ 
                $this->db->join('tbl_pee_details AS peei','led.lead_id = peei.lead_id');  
                $this->db->group_by('led.lead_id'); 
            }
            $this->db->where("(led.lead_status='Ready to Policy' OR led.lead_sub_status='Sales Closed Online')", NULL, FALSE);
           }
           if( $this->session->userdata('user_type_abbr') == 'lead data'){
            if( !empty($_POST['product']) ){
                     $this->db->where('prdt.product_type',$_POST['product']);
                 } else {
                     $this->db->where('prdt.product_type != ', '');
                 }
                 if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                     $startDate = new DateTime($_POST['startDate']);
                     $startDate->modify("-1 day");
                     $endDate = new DateTime($_POST['endDate']);
                     $endDate->modify("+1 day");
                      $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                      $this->db->where('led.created_on <',$endDate->format('Y-m-d'));
                 }
         }
        $this->db->where('led.lead_status != ','9999');
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    //reports downloads function  nominee_name commen

    public function getLeadsForExcelReport($product = NULL, $type = NULL){

        $this->db->select('`led`.`lead_id`, `led`.`lead_application_id`, `cust`.`cus_customer`,`cust`.`GSTIN`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_street3`,`cust`.`cust_type`, `cust`.`marital_status`, `cust`.`cust_age`, `cust`.`date_of_birth`,`cust`.`cust_gender`,`cust`.`cust_pan`,`cust`.`business_type`,`cust`.`temp_LE`,`cust`.`statement_date`,`cust`.`processing_fee`,`cust`.`cus_language`,`cust`.`occupation`,`cust`.`emergency_contact_num`, `cust`.`cus_card_name`, `cust`.`first_name`, `cust`.`last_name`, `cust`.`cust_phone`, `cust`.`cust_email`, `cust`.`cust_zip`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_area`, `cust`.`cust_city`, `cust`.`cust_state`, `led`.`HDFC_card_relationship_no`, `led`.`HDFC_card_last_4_digits`, `led`.`TSE_BDR_code`, `prdt`.`product_type`, `prdt`.`sum_insured`, `cust`.`business_type`, `prdt`.`lms_premium`, `cust`.`cus_emi`, `cust`.`cus_emi_yr`, `led`.`category`, `led`.`case_id`, `cust`.`processing_fee`, `led`.`bank_verifier_id`, `led`.`sub_channel`, `led`.`approve_status`, `led`.`lead_status`, `led`.`lead_sub_status`, `led`.`reject_comments`, `led`.`reject_code`, `led`.`lead_details`,`led`.`SM_code`, `led`.`payment_type`, `led`.`case_id`,`led`.`sub_channel`, `led`.`aaa_number`,`led`.`target_date`,`led`.`TSE_BDR_code`,`led`.`aaa_number`, `usr`.`user_location`, `usr`.`emp_code`, `led`.`created_on` as `c_on`, `led`.`updated_on` as `u_on`, `usr`.`user_location`, `nomn`.`nominee_name`, `nomn`.`nominee_age`, `nomn`.`nominee_relationship`, `nomn`.`appointee_name`, `nomn`.`appointee_relationship`');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id','INNER');      
        $this->db->join('tbl_users AS usr','led.created_by = usr.emp_id');
        $this->db->join('tbl_nominee AS nomn','led.lead_id = nomn.lead_id');
		$this->db->join('tbl_user_activity_history AS tua','led.lead_id = tua.history_lead_id','left');
		
                if(isset($_POST['channel']) && $_POST['channel']!=""  && $_POST['channel']!="All"){
                    $this->db->where('led.category',$_POST['channel']);
                }
                if(!empty($_POST['product'])) {
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
                if(isset($_POST['location']) && $_POST['location']!="" && $_POST['location']!="All"){
                    $this->db->where('usr.user_location',$_POST['location']);
                }
                if(isset($_POST['supervisor']) && $_POST['supervisor']!="" && $_POST['supervisor']!="-1"){
				  $this->db->where('`tua`.history_activity_type = 4 AND `tua`.history_user_id = "'.$_POST['supervisor'].'"');
                }
                if(isset($_POST['supervisor1']) && $_POST['supervisor1']!="" && $_POST['supervisor1']!="-1"){
                  $this->db->or_where('`tua`.history_activity_type = 4 AND `tua`.history_user_id = "'.$_POST['supervisor1'].'"');
                }
                if(isset($_POST['supervisor2']) && $_POST['supervisor2']!="" && $_POST['supervisor2']!="-1"){
                  $this->db->or_where('`tua`.history_activity_type = 4 AND `tua`.history_user_id = "'.$_POST['supervisor2'].'"');
                }
                
                 if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                     $startDate = new DateTime($_POST['startDate']);
						$startDate->modify("-1 day");
						$endDate = new DateTime($_POST['endDate']);
						$endDate->modify("+1 day");
                     $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                    $this->db->where('led.created_on <', $endDate->format('Y-m-d'));
                }
        $this->db->where('led.lead_status != ','9999');
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
        return $query->result();
    }



    public function getLeadsForExcelReportProHome($product = NULL, $type = NULL){

        #'led.*, led.lead_id leadid, led.created_on createdon, claim.*, val.*, nomn.* , coms.*,cust.*,prdt.*,  prop.*,usr.emp_code,usr.user_location,usr.user_name,usr.supervisor_id supervisorId,led.updated_by,(SELECT GROUP_CONCAT(user_name) FROM `tbl_users` WHERE FIND_IN_SET(emp_id, (select history_user_id from tbl_user_activity_history where history_lead_id = leadid && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1))) supername'
        //(SELECT GROUP_CONCAT(user_name) FROM `tbl_users` WHERE FIND_IN_SET(emp_id, (select history_user_id from tbl_user_activity_history where history_lead_id = leadid && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1)) ) supername,
        $this->db->select('`led`.`lead_id` leadid,`led`.`lead_application_id`, `prdt`.`product_type`, `led`.`category`, `led`.`lead_status`, `cust`.`cus_title`, `led`.`created_on` `leadTime`, `led`.`created_on` `createdon`, `led`.`lead_id` `leadid`, `cust`.`first_name`, `cust`.`last_name`, `cust`.`cust_phone`, `cust`.`cust_email`, `cust`.`cust_gender`, `cust`.`date_of_birth`, `cust`.`cust_age`, `cust`.`marital_status`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_area`, `cust`.`cust_house_number`, `cust`.`cust_city`, `cust`.`cust_state`, `cust`.`cust_zip`, `cust`.`cust_type`, `cust`.`emergency_contact_num`, `cust`.`cust_pan`, `cust`.`occupation`, `cust`.`cus_emi`, `cust`.`cus_emi_yr`, `prdt`.`sum_insured`, `prdt`.`lms_premium`, `led`.`sub_channel`, `led`.`case_id`, `led`.`HDFC_card_relationship_no`, `led`.`HDFC_card_last_4_digits`, `led`.`TL_code`, `led`.`SM_code`, `led`.`bank_verifier_id`, `led`.`payment_type`, `led`.`lead_details`, `cust`.`cus_customer`, `cust`.`cus_language`, `cust`.`processing_fee`, `cust`.`statement_date`, `cust`.`temp_LE`, `cust`.`business_type`, `led`.`target_date`, `led`.`TSE_BDR_code`, `cust`.`GSTIN`, `led`.`aaa_number`, `prop`.`new_policy_start`, `usr`.`emp_code`, `usr`.`user_location`, `usr`.`user_name`, `usr`.`supervisor_id` `supervisorId`, `led`.`updated_by`, `nomn`.`nominee_name`, `nomn`.`nominee_age`, `nomn`.`nominee_relationship`, `nomn`.`appointee_relationship`, `nomn`.`appointee_name`, `coms`.`comment`, `cust`.`cus_card_name`, `prdt`.`hme_building_type`, `prdt`.`hme_property_type`, `prdt`.`hme_previous_claims`, `prdt`.`hme_no_of_floors`, `prdt`.`hme_year_of_construction`, `prdt`.`hme_independent_house`, `prdt`.`hme_compound_wall`, `prdt`.`hme_build_up`, `prdt`.`hme_risk_address1`, `prdt`.`hme_risk_address2`, `prdt`.`hme_risk_area`, `prdt`.`hme_risk_pincode`, `prdt`.`hme_risk_city`, `prdt`.`hme_risk_state`, `prdt`.`hme_risk_nearest_land_mark`, `tped`.`hme_itm_des`, `tped`.`hme_SI`, `claim`.`hme_long_des`, `claim`.`hme_assets_damage`, `claim`.`hme_cause_loss`, `claim`.`hme_ins_place`, `claim`.`hme_policy_yr`, `claim`.`hme_ins_claim`, `claim`.`hme_loss_amt`, `claim`.`hme_ins_claim`');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_claim_details AS claim','claim.lead_id = led.lead_id','left');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id');
        $this->db->join('tbl_users AS usr','led.created_by = usr.emp_id');
        $this->db->join('tbl_nominee AS nomn','led.lead_id = nomn.lead_id','left');
        $this->db->join('tbl_comments AS coms', 'led.lead_id =coms.lead_id','left');
        $this->db->join('tbl_propsal AS prop','led.lead_id = prop.lead_id');
        $this->db->join('tbl_pee_details AS tped','led.lead_id = tped.lead_id','left');
        //$this->db->from('tbl_valuable_details AS val');
      
        $this->db->join('tbl_valuable_details AS val', 'led.customer_id = val.customer_id','left');   
       
        if(!empty($_POST['product'])) { //if(isset($_POST['product']) && $_POST['product']!=""){
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
        if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
                     $startDate = new DateTime($_POST['startDate']);
            $startDate->modify("-1 day");
            $endDate = new DateTime($_POST['endDate']);
            $endDate->modify("+1 day");
                     $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
                    $this->db->where('led.created_on <', $endDate->format('Y-m-d'));
        }
        $this->db->where('led.lead_status != ','9999');
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
       
        return $query->result();
    }

 public function getLeadsForExcelPA($product = NULL, $type = NULL){

        $this->db->select('`led`.`lead_application_id`,
    `prdt`.`product_type`,
    `led`.`category`,
    `led`.`lead_status`,
    `cust`.`cus_title`,
    `led`.`created_on` `leadTime`,
    `led`.`created_on` `createdon`,
    `led`.`lead_id` `leadid`,
    `cust`.`first_name`,
    `cust`.`last_name`,
    `cust`.`cust_phone`,
    `cust`.`cust_email`,
    `cust`.`cust_gender`,
    `cust`.`date_of_birth`,
    `cust`.`cust_age`,
    `cust`.`marital_status`,
    `cust`.`cust_street1`,
    `cust`.`cust_street2`,
    `cust`.`cust_area`,
    `cust`.`cust_house_number`,
    `cust`.`cust_city`,
    `cust`.`cust_state`,
    `cust`.`cust_zip`,
    `cust`.`cust_type`,
    `cust`.`emergency_contact_num`,
    `cust`.`cust_pan`,
    `cust`.`occupation`,
    `cust`.`cus_emi`,
    `cust`.`cus_emi_yr`,
    `prdt`.`sum_insured`,
    `prdt`.`lms_premium`,
    `led`.`sub_channel`,
    `led`.`case_id`,
    `led`.`HDFC_card_relationship_no`,
    `led`.`HDFC_card_last_4_digits`,
    `led`.`TL_code`,
    `led`.`SM_code`,
    `led`.`bank_verifier_id`,
    `led`.`payment_type`,
    `led`.`lead_details`,
    `cust`.`cus_customer`,
    `cust`.`cus_language`,
    `cust`.`processing_fee`,
    `cust`.`statement_date`,
    `cust`.`temp_LE`,
    `cust`.`business_type`,
    `led`.`target_date`,
    `led`.`TSE_BDR_code`,
    `cust`.`GSTIN`,
    `led`.`aaa_number`,
    `prop`.`new_policy_start`,
    `usr`.`emp_code`,
    `usr`.`user_location`,
    `usr`.`user_name`,
    `usr`.`supervisor_id` `supervisorId`,
    `led`.`updated_by`,
    `nomn`.`nominee_name`, `nomn`.`nominee_age`, `nomn`.`nominee_relationship`, `nomn`.`appointee_relationship`, `nomn`.`appointee_name`, `coms`.`comment`, `cust`.`cus_card_name`');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id');      
        $this->db->join('tbl_users AS usr','led.created_by = usr.emp_id'); 
        $this->db->join('tbl_nominee AS nomn','led.lead_id = nomn.lead_id','LEFT');
        $this->db->join('tbl_comments AS coms', 'led.lead_id =coms.lead_id','LEFT');
        $this->db->join('tbl_propsal AS prop','led.lead_id = prop.lead_id','LEFT');
        if(!empty($_POST['product'])) {
            $this->db->where('prdt.product_type',$_POST['product']);
        } else {
            $this->db->where('prdt.product_type != ', '');
        }
        if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
            $startDate = new DateTime($_POST['startDate']);
            $startDate->modify("-1 day");
            $endDate = new DateTime($_POST['endDate']);
            $endDate->modify("+1 day");
            $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
            $this->db->where('led.created_on <', $endDate->format('Y-m-d'));
        }
        $this->db->where('led.lead_status != ','9999');
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLeadsForExcelReportProSupership($product = NULL, $type = NULL){
		//, (SELECT GROUP_CONCAT(user_name) FROM `tbl_users` WHERE FIND_IN_SET(emp_id, (select history_user_id from tbl_user_activity_history where history_lead_id = leadid && history_activity_type = 4 ORDER BY history_id DESC LIMIT 1))) supername
        $this->db->select('`led`.`lead_id`,`led`.`lead_id` leadid,`led`.`lead_application_id`, `led`.`category`, `led`.`lead_status`, `cust`.`cus_title`, `cust`.`first_name`, `cust`.`last_name`, `cust`.`cust_phone`, `cust`.`cust_email`, `cust`.`cust_gender`, `cust`.`date_of_birth`, `cust`.`cust_age`, `cust`.`marital_status`, `cust`.`cust_street1`, `cust`.`cust_street2`, `cust`.`cust_area`, `cust`.`cus_emi`, `cust`.`cus_emi_yr`, `cust`.`cust_city`, `cust`.`cust_state`, `cust`.`cust_zip`, `cust`.`cust_type`, `cust`.`emergency_contact_num`, `cust`.`cust_pan`, `cust`.`occupation`, `prdt`.`sum_insured`, `prdt`.`lms_premium`, `led`.`sub_channel`, `led`.`case_id`, `led`.`HDFC_card_relationship_no`, `led`.`HDFC_card_last_4_digits`, `led`.`TL_code`, `led`.`SM_code`, `led`.`bank_verifier_id`, `led`.`payment_type`, `led`.`lead_details`, `cust`.`cus_customer`, `cust`.`cus_language`, `cust`.`processing_fee`, `cust`.`statement_date`, `cust`.`temp_LE`, `cust`.`business_type`, `led`.`target_date`, `led`.`TSE_BDR_code`, `cust`.`GSTIN`, `cust`.`cus_card_name`, `led`.`aaa_number`, `prdt`.`ship_spouse_include`, `prdt`.`ship_no_of_children`, `prdt`.`ship_income`, `prdt`.`ship_policy_term`, `prop`.`sship_pro_height`, `prop`.`sship_pro_Weight`, `fdr`.`sship_pro_doc_name`, `fdr`.`sship_pro_doc_qualifi`, `fdr`.`sship_pro_doc_addr`, `fdr`.`sship_pro_doc_mobile`, `fdr`.`sship_pro_hos_num`, `nomn`.`nominee_name`, `nomn`.`nominee_age`, `nomn`.`nominee_relationship`, `nomn`.`appointee_name`, `nomn`.`appointee_relationship`, `prop`.`ship_primary_insured`, `coms`.`comment`, `prop`.`new_policy_start`, `prdt`.`product_type`, `led`.`lead_id` `leadid`, `led`.`created_on` `createdon`, `usr`.`emp_code`, `usr`.`user_location`, `usr`.`user_name`, `usr`.`supervisor_id`, `led`.`updated_by`');  
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_customer AS cust','led.customer_id = cust.cust_id');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id');   
        $this->db->join('tbl_users AS usr','led.created_by = usr.emp_id'); 
        $this->db->join('tbl_nominee AS nomn','led.lead_id = nomn.lead_id',"left");
        $this->db->join('tbl_comments AS coms', 'led.lead_id =coms.lead_id',"left");
        $this->db->join('tbl_propsal AS prop','led.lead_id = prop.lead_id',"left");
        $this->db->join('tbl_family_doctor AS fdr','led.lead_id = fdr.lead_id',"left");
        $this->db->join('tbl_prop_options AS opts','led.lead_id= opts.lead_id',"left");
        if(!empty($_POST['product'])) { //if(isset($_POST['product']) && $_POST['product']!=""){
                    $this->db->where('prdt.product_type',$_POST['product']);
                }
        if(isset($_POST['startDate']) && isset($_POST['endDate']) && $_POST['startDate']!="" && $_POST['endDate']!="") {
            
            $startDate = new DateTime($_POST['startDate']);
            $startDate->modify("-1 day");
            $endDate = new DateTime($_POST['endDate']);
            $endDate->modify("+1 day");
             $this->db->where('led.created_on >', $startDate->format('Y-m-d'));
             $this->db->where('led.created_on <', $endDate->format('Y-m-d'));
                }
        $this->db->where('led.lead_status != ','9999');
        $this->db->group_by('led.lead_id');
        $query = $this->db->get();
        return $query->result();
    }
	
	public function getProductOptions($arrayWhere){
				
		$this->db->select('*');
		$this->db->where($arrayWhere);
		$getData = $this->db->get('tbl_prop_options');
		
		return $getData->row_object();
	}

    public function getLeadProductTypeByLeadID($leadId){
        
        $this->db->select('prdt.product_type,led.customer_id,led.lead_application_id');  
       
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_product AS prdt','led.lead_id = prdt.lead_id');
        $this->db->where('prdt.lead_id', $leadId);
        $query = $this->db->get();
        return $query->result();

    }

    public function getLeadSupervisorFlow($leadId){
        
        $this->db->select('led.payment_type,chl.enableSupervisor');
        $this->db->from('tbl_lead AS led');
        $this->db->join('tbl_channel AS chl','led.category = chl.name');
        $this->db->where('led.lead_id', $leadId);
        $query = $this->db->get();
        return $query->result();

    }

    public function getNomineeDetails($leadId) {

        $this->db->select('*');  
        $this->db->from('tbl_nominee');
        $this->db->where('lead_id', $leadId);
        $query = $this->db->get();
        return $query->result();
    }

    /*public function getAutoPopulateValue($leadId){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('lead_id', $leadId);
        $query = $this->db->get();
        return $query->result();
    }*/


}

?>
