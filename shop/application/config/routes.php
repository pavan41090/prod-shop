<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Shopv.1/Shop';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['shop'] = 'Shopv.1/Shop';
$route['turtlemint'] = 'Shopv.1/Shop/turtlemint';
$route['otp-message'] = 'Shopv.1/Shop/getCustomerOtp';
$route['res-otp-message'] = 'Shopv.1/Shop/resendgetCustomerOtp';
$route['s/(:any)'] = 'Shopv.1/Shop/getUser/$1';
$route['submit-otp'] = 'Shopv.1/Shop/getSubmitOtp';
$route['pincode-master'] = 'Shopv.1/Shop/getCityByPincode';
$route['city-master'] = 'Shopv.1/Shop/getCitiesNames';
$route['shoper'] = 'Shopv.1/Shop/getinfoThird';


$route['login'] = 'Admin/Login';
$route['Admin'] = 'Admin/Admin';
$route['admin-upload-status'] = 'Admin/uploadLeadStatus';
$route['logout'] = 'Admin/Logout/logOutfuncion';
$route['lead-download'] = 'Admin/Admin/downLoadShop';
$route['payment-porcessing/(:any)'] = 'Shopv.1/Shop/getCreatepayment/$1';
$route['payment-responce/(:any)'] = 'Shopv.1/Shop/getResponce/$1';
$route['payment-re-responce/(:any)'] = 'Shopv.1/Shop/getReloadResponce/$1';

$route['api'] = 'Shopv.1/Api/getdata';
$route['sehat-download-lead'] = 'Admin/Admin/sehatindex';
$route['sehat-lead-download'] = 'Admin/Admin/sehatdownloaddata';