<script src="<?php echo base_url(); ?>assets/js/custom_user_profile.js"></script>
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->

                    <!-- END THEME PANEL -->
                    <h3 class="page-title">User Profile

                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">User profile</a>
                                
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
                          <form name="userprofile" novalidate >
                          

                           <div class="portlet-title tabbable-line" >
                              <div class="caption leadtit">
                                  <div class="alert bold uppercase" id="alert-response" style="display: none;" ></div>
<!--                                   <div class="alert alert-danger bold uppercase">Success msg</div>
 -->                              </div>
                           </div>


 
                           <div class="portlet-title tabbable-line">
                              <div class="caption leadtit">
                                 <i class="icon-globe font-dark hide"></i>
                                 <span class="caption-subject font-dark bold uppercase">Update Profile</span>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">

                                    
                                    <label>Employee Code
                                    <span class="required"> * </span></label>
  <input type="text"  placeholder="Employee Code" class="form-control input-sm" name="emp_code" id="emp_code" ng-model="emp_code" disabled="True">

   
<!--                                     <div ng-if="userprofile.$submitted || userprofile.user_id.$dirty" ng-messages="userprofile.user_id.$error" role="alert">    
               <div ng-message="required" class="required">Please Enter Employee Code</div>   
    
           </div> -->
                                 </div>
                              </div>
                              <div class="col-md-4">
                              <div class="form-group">
                                    <label>User Name
                                    <span class="required"> * </span></label>  
                                   <input type="text"  placeholder="User Name"  class="form-control input-sm" name="user_name" id="user_name" ng-model="user_name"  disabled="True">
                                 
<!--                                     <div ng-if="userprofile.$submitted || userprofile.user_empnum.$dirty" ng-messages="userprofile.user_empnum.$error" role="alert">
             <div ng-message="required" class="required">Please Enter User Name</div>

         </div> -->
                                 </div>
                                 
                              </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                    <label>E-mail <span class="required"> * </span></label>
      <input type="email" id="user_email" name="user_email" class="form-control input-sm" placeholder="E-mail" ng-model="user_email" disabled="True"> 
                                  
<!--                                     <div ng-if="userprofile.$submitted || userprofile.emailuser.$dirty" class="required" id="emailwar" ng-messages="userprofile.emailuser.$error" role="alert">
              <div ng-message="required" class="required">Please Enter Valid E-mail</div>

            </div>
 -->                                 </div>

                              </div>
                           </div>
                           <div class="row maincontf">
                           <div class="col-md-4">


                                 <div class="form-group">
                                    <label>Employee Name
                                    <span class="required"> * </span></label>  
                                   <input type="text"  placeholder="Employee Name"  class="form-control input-sm" name="user_empname" id="user_empname" ng-model="user_empname" required>
                                 
                                    <div ng-if="userprofile.$submitted || userprofile.user_empname.$dirty" ng-messages="userprofile.user_empname.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Employee Name</div>

         </div>
                                 </div>


                              </div>
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Mobile Number <span class="required"> * </span></label>
                                    <input type="text" id="mobileuser" name="mobileuser" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobileuser" MaxLength="10" onkeyup="return mobile_validate(this.value);"  required /> 
                                  
                                    <div ng-if="userprofile.$submitted || userprofile.mobileuser.$dirty" class="required" id="mobilewar" ng-messages="userprofile.mobileuser.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>

            </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Designation
                                    <span class="required"> * </span></label>                          
                                    
                                <input list="Designation" class="form-control input-sm" placeholder="Designation" name="user_designation" id="user_designation" ng-model="user_designation" required>

                                   <datalist id="Designation">

<?php foreach($designationArray as $des) { ?>
    <option id="<?php echo $des['des_id']; ?>" value="<?php echo $des['des_name']; ?>"></option>
<?php } ?>     
                                        
                                    </datalist>
                                    <div ng-if="userprofile.$submitted || userprofile.user_designation.$dirty" ng-messages="userprofile.user_designation.$error" role="alert">
             <div ng-message="required" class="required">Please Select Designation</div>

         </div>
                                 </div>
                              </div>
                              
                              
                              
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Team
                                    <span class="required"> * </span></label>                          
                                    
                                <input list="team-list" class="form-control input-sm" placeholder="Team" name="user_team" id="user_team" ng-model="user_team" required>

          <datalist id="team-list">
          <?php foreach($teamArray as $tm) { ?>
            <option id="<?php echo $tm['team_id']; ?>" value="<?php echo $tm['team_name']; ?>"></option>
          <?php } ?>                                        
                                    </datalist>
                                    <div ng-if="userprofile.$submitted || userprofile.user_team.$dirty" ng-messages="userprofile.user_team.$error" role="alert">
             <div ng-message="required" class="required">Please Select Team</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Location Name
                                    <span class="required"> * </span></label>                          
                                    
                                <input list="Location" class="form-control input-sm" placeholder="Location Name" name="user_location" id="user_location" ng-model="user_location" required>

                                <datalist id="Location">
                                  <?php foreach($locationArray as $loc) { ?>
                                      <option id="<?php echo $loc['loc_id']; ?>" value="<?php echo $loc['loc_name']; ?>"></option>
                                  <?php } ?>  
                                        
                                    </datalist>
                                    <div ng-if="userprofile.$submitted || userprofile.user_location.$dirty" ng-messages="userprofile.user_location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Location Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label> State <span class="required"> * </span></label>
                                       <input list="state" id="user_state" placeholder="Select State"   name="user_state" class="form-control input-sm" ng-model="user_state" required>
                                        <datalist id="state">
                                        <?php foreach($stateArray as $stt) { ?>
                                            <option id="<?php echo $stt['id']; ?>" value="<?php echo $stt['name']; ?>"></option>
                                        <?php } ?>  
                                      </datalist>     
                    <div ng-if="userprofile.$submitted || userprofile.user_state.$dirty" ng-messages="userprofile.user_state.$error" role="alert">
             <div ng-message="required" class="required">Please Enter State</div>

         </div>
                                 </div>
                              </div>
                           </div>
                           
                           
                           
                           
                           
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                  <label> City <span class="required"> * </span></label>
                                       <div id="city-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="city-div" style="">
                                          <input list="city" name="user_city" id="user_city" class="form-control input-sm" ng-model="user_city" required>

                                          
                                          <datalist id="city">
                                            
                                          </datalist>
                                                         
                         <div ng-if="userprofile.$submitted || userprofile.user_city.$dirty" ng-messages="userprofile.user_city.$error" role="alert">
             <div ng-message="required" class="required">Please Enter City</div>

         </div>                </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Region
                                    </label>   <span class="required"> * </span>
                                    <input list="Region" class="form-control input-sm" placeholder="Region" name="user_region" id="user_region" ng-model="user_region" required>

                                <datalist id="Region">
                                    <?php foreach($regionArray as $reg) { ?>
                                        <option id="<?php echo $reg['region_id']; ?>" value="<?php echo $reg['region_name']; ?>"></option>
                                    <?php } ?>  
                                                            
                                </datalist>
 <div ng-if="userprofile.$submitted || userprofile.user_region.$dirty" ng-messages="userprofile.user_region.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Details of Lead</div>

         </div>                 
                                 </div>
                              </div>
                              <div class="col-md-4">&nbsp;</div>
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
      <button type="submit" class="btn blue btn-default" ng-click="pset()">Submit</button>
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
    
