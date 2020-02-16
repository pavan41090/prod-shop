<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('session','database','parser','pagination');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'file','lms');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array(
	'Useractivity',
	'Home_model',
	'TwoWheeler_model',
	'Twoexcelmodel',
        'Bundlemodel',
	'User_model',
	'Lms_car_model'

);
