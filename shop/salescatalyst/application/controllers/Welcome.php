<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$thicreatedTime = date('Y-m-d H:i:s');
		$selcyQryUsers = $this->db->query("SELECT * FROM `tbl_users` WHERE user_type_id = 2 AND emp_id NOT IN (SELECT user_id FROM `tbl_user_prdt_privilage` WHERE prdt_m_id = 15
) ORDER BY `emp_id` ASC")->result();
		foreach ($selcyQryUsers as $key => $value) {
			# code...
			$this->db->query("INSERT INTO `tbl_user_prdt_privilage` (`prdt_m_id`, `user_id`, `privilage`, `status`, `created_on`, `created_by`, `updated_on`, `updated_by`, `plan`) VALUES
(15, ".$value->emp_id.", 1, 1, '".$thicreatedTime."', 1, '0000-00-00 00:00:00', 0, '')");
		}
		
	}

}*/
