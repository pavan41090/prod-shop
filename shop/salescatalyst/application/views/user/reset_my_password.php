<script src="<?php echo base_url(); ?>assets/js/custom_user_profile.js"></script>
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->

                    <!-- END THEME PANEL -->
                    <h3 class="page-title">Reset Password

                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Reset Password</a>
                                
                            </li>
                            
                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
<div class="col-md-12">
                           
                     <div class="portlet box gray-gray">
                                
                                <div class="portlet-body planbox">
                                    <div style="color:#000;">
                           
                                        <div ng-app="plunker" ng-controller="MainCtrl">
                          <form name="resetpwd" novalidate >
                          
 
                           <div class="portlet-title tabbable-line">
                              <div class="caption leadtit">
                                  <span class="caption-subject font-dark bold uppercase">Success msg</span>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-3">
                                 <div class="form-group">

                                    
                                    <label>Current Password
                                    <span class="required"> * </span></label>
                

   
                                    
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                                     
                                    
                                <input type="password"  placeholder="Current Password"  class="form-control input-sm pwdtxt" name="reset_currentpwd" id="reset_currentpwd" ng-model="reset_currentpwd" required>

  
                                    
                                 </div>
                              </div>
                              
                              <div class="col-md-4">
                              	<div ng-if="resetpwd.$submitted || resetpwd.reset_currentpwd.$dirty" class="pwdreq" id="post" ng-messages="resetpwd.reset_currentpwd.$error" role="alert">
             <div ng-message="required" class="pwdreq">Please Enter Current password</div>

         </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-3">
                                 <div class="form-group">

                                    
                                    <label>New Password
                                    <span class="required"> * </span></label>
                

   
                                    
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                                     
                                    
                                <input type="password"  placeholder="New Password" onkeyup="return CheckPassword1(this.value)"  class="form-control input-sm pwdtxt" name="reset_newpwd" id="reset_newpwd" ng-model="reset_newpwd" required>

  
                                    
                                 </div>
                              </div>
                              <div class="col-md-4">
                              	<div ng-if="resetpwd.$submitted || resetpwd.reset_newpwd.$dirty" class="pwdreq" id="post1" ng-messages="resetpwd.reset_newpwd.$error" role="alert">
             <div ng-message="required" class="pwdreq">Please Enter New password</div>

         </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-3">
                                 <div class="form-group">

                                    
                                    <label>Confirm Password
                                    <span class="required"> * </span></label>
                

   
                                    
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                                     
                                    
                                <input type="password"  placeholder="Confirm Password"  class="form-control input-sm pwdtxt" name="reset_conpwd" id="reset_conpwd" ng-model="reset_conpwd"  required>

  
           
                                 </div>
                              </div>
                              <div class="col-md-4">
                              	<div ng-if="resetpwd.$submitted || resetpwd.reset_conpwd.$dirty" class="pwdreq" id="message" ng-messages="resetpwd.reset_conpwd.$error" role="alert">
             <div ng-message="required" class="pwdreq">Please Enter Confrim password</div>

         </div>
                              </div>
                           </div>
                           
                           
                           
                           
                           
                           
                           
                          
                           
                           
                           
                           <div class="row">
                           <div class="col-md-2">
                                 <div class="form-group">
                                   
                                    <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                                       <div class="modal-dialog">
                                          <img src="assets/images/ajax-loader.gif"></img>
                                          <button type="button" class="btn btn-default" id="closeModel" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
      <button type="submit" class="btn blue btn-default" id="reset_password" ng-click="repwd()">Reset Password</button>
      <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
      <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">                                       

                   </div>
                              </div>   
                              
                              
                           
                           
                        </form>
                        </div> <!-- controller ends here -->
                     </div>

                                        
                                        
                                        
                     
                                 </div>
                                </div>
                        
                            </div>
                     
                        </div>
</div>
                  
                   
                </div>
                <!-- END CONTENT BODY -->
            </div>
    
<script>
	
function CheckPassword(pwd)   
{   
    var text = '';
    var passwd = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
    if(passwd.test(pwd) == false)
    {
        text =  "Passwords must contain at least 8 characters, including uppercase, lowercase letters and numbers.";  
    } else {
      text = '';
    }
    $('#post').html(text);
}  



function CheckPassword1(pwd)   
{   
    var text = '';
    var passwd = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
    if(passwd.test(pwd) == false)
    {
        text =  "Passwords must contain at least 8 characters, including uppercase, lowercase letters and numbers."; 
        $('#reset_password').prop('disabled', true); 
    } else {
        text = '';
        $('#reset_password').prop('disabled', false); 
    }
    $('#post1').html(text);
}  


</script>
<script >
  $('#reset_newpwd, #reset_conpwd').on('keyup', function () {
    if ($('#reset_newpwd').val() == $('#reset_conpwd').val()) {
        $('#message').html('');
    } else 
        $('#message').html('Not Matching').css('color', '#e02222');
});
</script>