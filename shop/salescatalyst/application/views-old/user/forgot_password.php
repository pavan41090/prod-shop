<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Bharti AXA | User Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/uniform/css/uniform.default.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/css/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/login-5.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />


        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/angular-messages.js" type="text/javascript"></script>
            
<!--         <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular-messages.js"></script> -->
        <script src="<?php echo base_url();?>assets/js/powerange.js"></script>   


        <script src="<?php echo base_url(); ?>assets/js/custom_user.js"></script>

 </head>
    <!-- END HEAD -->

    <body class=" login" ng-app="plunker">

        <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset">
                    <div class="login-bg">
                        <img  src="<?php echo base_url(); ?>assets/images/login/bg1.jpg"  width="100%"/>
                         </div>
                </div>
                
                <div class="col-md-6 login-container bs-reset">
                
                    <div class="login-content">
                       <h1><img class="login-logo" src="<?php echo base_url(); ?>assets/images/logo-bxa.png" /></h1>
                        <h2 class="title">Reset Password</h2> 

                       
                    
                        <?php if($linkStatus == 'expired') {?>

                        <div align="center"><img  src="<?php echo base_url(); ?>assets/images/broken.png" /> </div>
                        <p><strong>Link has  been  expired, Please <a href="">CLICK HERE</a> for another link</strong></p>

                        <?php } else { ?>
                    <div ng-controller="MainCtrl">

                        <form class="update_pass" name="update_pass" novalidate>      
                            <div class="row">
                            <div class="alert1 alert-danger">
                                <button class="close" data-close="alert"></button>
                                <span id="response-message">fsfsd</span>
                            </div>
                                <div class="col-xs-12">
                                <div class="input-icon right">
                                    <i class="fa fa-lock"></i>
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="New password" name="newpassword"  ng-model="newpassword" required/> </div> 
                                </div>
                                <div class="col-xs-12">
                                    <div class="input-icon right">
                                    <i class="fa fa-lock"></i>
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Confirm Password" name="confirmpassword"  ng-model="confirmpassword" required/></div> 
                                </div>
                            </div>
                            
                            <div class="row">
                            <div class="col-md-4">&nbsp;</div>
                            <div class="col-md-4">
                                <button class="btn blue" ng-click="updatePass()" name="submit" type="submit" style="width:150px; margin-top:20px;">Update Password</button>
                            </div>
                            <div class="col-md-4">&nbsp;</div>
                            </div>
                            
                        </form>
                </div>
           
<?php }  ?>



                    </div>
                    <div>&nbsp;</div>
                    <div class="login-footer">
                    <div class="row bs-reset">
                    <div class="col-md-12">
                    <p><strong>Disclaimer</strong></p>
                    <p>Secondary copy lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce suscipit, tortor sed eleifend, nibh lacus mattis massa, id ullamcorper erat liberoin est. Donec dapibus dolor sed interdum gravida.</p>
					</div>
						</div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<script src="js/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/js/login-5.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/common_js.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html> 