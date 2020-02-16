<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$loginSession = $this->session->userdata('loginSession');
		if($loginSession){
			redirect(base_url('Admin'));
		}
	}

	public function checkLogin(){
        try{

            if($_SERVER['REQUEST_METHOD'] != "POST"){
                redirect(base_url());
                die();
            }

            $inputPostdata = $this->input->post();

            $this->form_validation->set_rules('loginusername','User Name','trim|required');
            $this->form_validation->set_rules('loginpassword','Password','trim|required');

            if($this->form_validation->run() == FALSE){

            	$this->load->view('login-form');

            } else {

            	$loginusername = $this->security->xss_clean($this->input->post('loginusername'));
            	$loginpassword = $this->security->xss_clean($this->input->post('loginpassword'));

            	if(($loginusername == USER_NAME) && ( MD5($loginpassword) == MD5(PASSWORD) )){

            		$loginStatus['status'] = true;
            		$this->session->set_userdata('loginSession',true,true);
            		redirect(base_url('login'), 'refresh');

            	} else {

            		$this->session->set_tempdata('error_details', 'Please Enter Login Details Correctly!', 5);
            		$loginStatus['status'] = false;

            	}
            	
            }

        } catch(Exception $error){
            log_message('error','Something went wrong in'.__FUNCTION__.' Error File : '.json_encode($error));
        }
    }

	public function index(){

		try{

			if($_SERVER['REQUEST_METHOD'] == "POST"){
                $this->checkLogin();
            }
			$this->load->view('Admin/login-form');

		} catch(Exception $error){
			 log_message('error','Something went wrong in'.__FUNCTION__.' Error File : '.json_encode($error));
		}
		
	}

}