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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
         <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/uniform/css/uniform.default.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/backend-css/backend-style.css" rel="stylesheet" type="text/css" />
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
    <!-- END HEAD -->

    <body ng-app="plunker" class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid" >
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo base_url();?>users-list">
                        <img src="<?php echo base_url(); ?>assets/images/logo-default.png" alt="logo" class="logo-default" /> </a>
                    
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
                            
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <!--<img alt="" class="img-circle" src="<?php echo base_url() ?>assets/images/avatar3_small.jpg" />-->
                                    <span class="username">  <?php echo strtoupper($this->session->userdata('emp_name')); ?> </span>
                                    
                                </a>
                                 <?php
                                    $profile_url = base_url().'/user-profile/'.$this->session->userdata('emp_id'); 
                                    $reset_pass_url = base_url().'/reset-password/'.$this->session->userdata('emp_id'); 

                                  ?>
                               
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
					<div>
				
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

