<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Shopv.1/Shop';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['shop'] = 'Shopv.1/Shop';
$route['otp-message'] = 'Shopv.1/Shop/getCustomerOtp';
$route['s/(:any)'] = 'Shopv.1/Shop/getUser/$1';
$route['submit-otp'] = 'Shopv.1/Shop/getSubmitOtp';
$route['pincode-master'] = 'Shopv.1/Shop/getCityByPincode';
$route['city-master'] = 'Shopv.1/Shop/getCitiesNames';
$route['shoper'] = 'Shopv.1/Shop/getinfoThird';