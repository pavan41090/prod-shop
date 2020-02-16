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
                          
 
                           <div class="portlet-title tabbable-line">
                              <div class="caption leadtit">
                                 <i class="icon-globe font-dark hide"></i>
                                 <span class="caption-subject font-dark bold uppercase">create userprofile</span>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">

                                    
                                    <label>ID
                                    <span class="required"> * </span></label>
                <input type="text"  placeholder="ID" class="form-control input-sm" name="user_id" id="user_id" ng-model="user_id" required>

   
                                    <div ng-if="userprofile.$submitted || userprofile.user_id.$dirty" ng-messages="userprofile.user_id.$error" role="alert">		
	             <div ng-message="required" class="required">Please Enter ID</div>		
		
	         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Team
                                    <span class="required"> * </span></label>                          
                                    
                                <input list="Team" class="form-control input-sm" placeholder="Team" name="user_team" id="user_team" ng-model="user_team" required>

   <datalist id="Team">
                                     <option value="">Select Team</option>
                                     <option value="Team1">Team1</option>
                                     <option value="Team2">Team2</option>
                                     <option value="Team3">Team3</option>
                                     <option value="Team4">Team4</option>
                                     <option value="Team5">Team5</option>
                                        
                                    </datalist>
                                    <div ng-if="userprofile.$submitted || userprofile.user_team.$dirty" ng-messages="userprofile.user_team.$error" role="alert">
             <div ng-message="required" class="required">Please Select Team</div>

         </div>
                                 </div>
                              </div>
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
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Employee Number
                                    <span class="required"> * </span></label>  
                                   <input type="text"  placeholder="Employee Number"  class="form-control input-sm" name="user_empnum" id="user_empnum" ng-model="user_empnum" required>
                                 
                                    <div ng-if="userprofile.$submitted || userprofile.user_empnum.$dirty" ng-messages="userprofile.user_empnum.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Employee Number</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>E-mail <span class="required"> * </span></label>
      <input type="email" id="emailuser" name="emailuser" class="form-control input-sm" placeholder="E-mail" ng-model="emailuser" onkeyup="return email_validate(this.value);" required> 
                                  
                                    <div ng-if="userprofile.$submitted || userprofile.emailuser.$dirty" class="required" id="emailwar" ng-messages="userprofile.emailuser.$error" role="alert">
              <div ng-message="required" class="required">Please Enter Valid E-mail</div>

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
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Designation
                                    <span class="required"> * </span></label>                          
                                    
                                <input list="Designation" class="form-control input-sm" placeholder="Designation" name="user_designation" id="user_designation" ng-model="user_designation" required>

   <datalist id="Designation">
                                     <option value="">Select Designation</option>
                                     <option value="Designation1">Designation 1</option>
                                     <option value="Designation2">Designation 2</option>
                                     <option value="Designation3">Designation 3</option>
                                     <option value="Designation4">Designation 4</option>
                                     <option value="Designation5">Designation 5</option>
                                        
                                    </datalist>
                                    <div ng-if="userprofile.$submitted || userprofile.user_designation.$dirty" ng-messages="userprofile.user_designation.$error" role="alert">
             <div ng-message="required" class="required">Please Select Designation</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Location Name
                                    <span class="required"> * </span></label>                          
                                    
                                <input list="Location" class="form-control input-sm" placeholder="Location Name" name="user_location" id="user_location" ng-model="user_location" required>

   <datalist id="Location">
                                     <option value="">Select Location Name</option>
                                     <option value="Location Name 1">Location Name 1</option>
                                     <option value="Location Name 2">Location Name 2</option>
                                     <option value="Location Name 3">Location Name 3</option>
                                     <option value="Location Name 4">Location Name 4</option>
                                     <option value="Location Name 5">Location Name 5</option>
                                        
                                    </datalist>
                                    <div ng-if="userprofile.$submitted || userprofile.user_location.$dirty" ng-messages="userprofile.user_location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Location Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label> State <span class="required"> * </span></label>
                                       <input list="state" id="user_State" placeholder="Select State"   name="user_State" class="form-control input-sm" ng-model="user_State" required>
                                        <datalist id="state">
                                          <option value="">Select State</option>
                                         <option value="Tamil Nadu">Tamil Nadu</option>
                                       </datalist>     
									  <div ng-if="userprofile.$submitted || userprofile.user_State.$dirty" ng-messages="userprofile.user_State.$error" role="alert">
             <div ng-message="required" class="required">Please Enter State</div>

         </div>
                                 </div>
                              </div>
                           </div>
                           
                           
                           
                           
                           
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                  <label> City <span class="required"> * </span></label>
                                       <div id="mx_City-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="mx_City-div" style="">
                                             <select id="user_City" name="user_City" class="form-control input-sm" ng-model="user_City" required>
                                           <option value="">Select city</option>
                                           <option value="Trichy">Trichy</option>
                                       </select>                   
                         <div ng-if="userprofile.$submitted || userprofile.user_City.$dirty" ng-messages="userprofile.user_City.$error" role="alert">
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
                                     <option value="">Select Location Region</option>
                                     <option value="North">North</option>
                                     <option value="East">East</option>
                                     <option value="West">West</option>
                                     <option value="South">South</option>
                                     
                                        
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
    
