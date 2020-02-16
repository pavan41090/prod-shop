<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Bharti AXA | quote</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,9,10,11">
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" >
        <meta content="width=device-width, initial-scale=1" name="viewport" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <meta content="" name="description" />
        <meta content="" name="author" />
		 <meta http-equiv='cache-control' content='no-cache'>
		<meta http-equiv='expires' content='0'>
		<meta http-equiv='pragma' content='no-cache'>
        <!-- BEGIN GLOBAL MANDATORY STYLES 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/uniform/css/uniform.default.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
       
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
       <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/blue.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/powerange.css" rel="stylesheet" type="text/css" />
       
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
         </head>

        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular.js" type="text/javascript"></script>   
        <script src="<?php echo base_url(); ?>assets/js/angular-messages.js" type="text/javascript"></script>
 
<!--    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular-messages.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/powerange.js"></script>
		<script>
        $(function(){
            $('#lms_house_number').parent('div').parent('div').remove();
            $('#lms_cus_sdate').parent('div').parent('div').remove();
            $('#lms_car_priority').parent('div').parent('div').remove();
            $('#lms_car_pro_gstn').parent('div').parent('div').remove();
            $('#lms_car_area').parent('div').parent('div').remove();
            $('#lms_car_pro_landmark').parent('div').parent('div').remove();
            $('#lms_car_sub_channel').parent('div').parent('div').remove();
            $('#lms_cus_cardlimt').parent('div').parent('div').remove();
            $('input[name="lms_cus_tle"]').parent().parent().parent().parent().remove();
            $('#lms_car_add1').attr('rows',2).attr('maxlength',30);
            $('#lms_car_add2').attr('rows',2).attr('maxlength',30);
            $('#lms_car_add3').attr('rows',2).attr('maxlength',30);
        });
		function functionGetDate(){
				
				var dateAdded = new Date();
				var day = dateAdded.getDate();
				var year = dateAdded.getFullYear();
				var month = dateAdded.getMonth() + 1;
				var hours = dateAdded.getHours();
				var minuts = dateAdded.getMinutes();
				var seconds = dateAdded.getSeconds();

				var finalData = year+'-'+(month > 9 ? month : '0'+month)+'-'+(day > 9 ? day : '0'+day)+' '+hours+':'+(minuts > 9 ? minuts : '0'+minuts)+':'+seconds;
				
				return finalData;
			}

            var __pathname = '<?php echo base_url(); ?>';
            var _lmsapp = angular.module('plunker', ['ngMessages']);
		</script>	
    <!-- END HEAD -->

    <body ng-app="plunker" class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid" >
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo base_url();?>lms-lead-list ">
                        <img src="<?php echo base_url(); ?>assets/images/logo-default.png" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <!--<img alt="" class="img-circle" src="<?php echo base_url() ?>assets/images/avatar3_small.jpg" />-->
                                    <span class="username">  <?php echo strtoupper($this->session->userdata('emp_name')); ?> </span>
                                    <span class="username">  <?php echo strtoupper($this->session->userdata('user_name')); ?> </span>
                                </a>
                                 <?php
                                    $profile_url = base_url().'/user-profile/'.$this->session->userdata('emp_id'); 
                                    $reset_pass_url = base_url().'/reset-password/'.$this->session->userdata('emp_id'); 

                                  ?>
<!--                                 <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                       
                                        <a href="<?php  // echo $profile_url; ?>">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li>
                                        <a href="<?php // echo $reset_pass_url ?>">
                                            <i class="icon-lock"></i> Change Password </a>
                                    </li>
                                    
                                    
                                </ul> -->
                            </li>
                            
                            <li class="dropdown dropdown-user">
                                <a href="<?php echo base_url();?>user/logout" class="dropdown-toggle">
                                    
                                    <span class="username username-hide-on-mobile"> Logout <i class="icon-logout"></i></span>
                                   
                                </a>
                                
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->

