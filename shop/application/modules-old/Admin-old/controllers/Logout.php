<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct(){
		parent::__construct();
		session_destroy();
	}

	 public function logOutfuncion(){
			session_destroy();
			redirect(base_url('login'));
	 }

}