<?php

class Salescatalist{
    
    public function sampleMyfunction() {
        $this->CI =& get_instance();
        error_reporting(0);

        $arrayIps = array('125.22.73.227','115.98.2.110','49.206.220.75','113.193.7.66','10.92.89.12','10.92.89.11','125.17.11.74','125.18.120.106','175.100.160.57','175.100.160.70','175.100.161.32','175.100.161.31','175.100.160.58','175.100.160.62','175.100.162.154','175.100.162.155','175.100.162.200','175.100.162.162','10.22.214.90','10.41.0.126','10.22.214.211','10.22.214.178','27.6.41.40','106.193.168.215','223.230.45.11','27.6.6.220','49.207.211.103');

        if(!in_array($_SERVER['HTTP_X_FORWARDED_FOR'], $arrayIps)){
            header('Location:https://servicesonline.bharti-axagi.co.in/salescatalyst');
        	echo "<script>window.opne('https://servicesonline.bharti-axagi.co.in/salescatalyst/user','_self')</script>";
   		    echo exit();
        }
        
    }
}