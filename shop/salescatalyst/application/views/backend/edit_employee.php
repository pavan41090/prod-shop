<script src="<?php echo base_url(); ?>assets/backend-js/edit_employee.js"></script>
<input type="hidden" id="employeeId" name="employeeId" value="<?php echo $employeeId; ?>"> 

<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="portlet box gray-gray">
            <div class="portlet-body planbox backend-mainbg">
               <div style="color:#000;">
                  <div ng-app="plunker" ng-controller="MainCtrl">
                     <form name="userprofile" novalidate >


                        <div class="portlet-title tabbable-line" >
                           <div class="caption leadtit">
                              <div class="alert bold uppercase" style="display: none;" id="alert-response"> </div>
                              <div class="alert bold uppercase"> Edit Employee</div>
                                 <div class="caption pull-right"> 
                                   <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#update-password"> Reset Password</button> 
                                 </div> 

                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-1">&nbsp;</div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Employee Code
                                 <span class="required"> * </span></label>
                                 <input type="text"  placeholder="Employee Code" class="form-control input-sm" name="emp_code" id="emp_code" ng-model="emp_code" required="">

                                    <div ng-if="userprofile.$submitted || userprofile.emp_code.$dirty" ng-messages="userprofile.emp_code.$error" role="alert">
                                       <div ng-message="required" class="required">Please Enter Employee Code</div>
                                    </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>User Name
                                 <span class="required"> * </span></label>  
                                 <input type="text"  placeholder="User Name"  class="form-control input-sm" name="user_name" id="user_name" ng-model="user_name" required="">
                                      <div ng-if="userprofile.$submitted || userprofile.emp_code.$dirty" ng-messages="userprofile.emp_code.$error" role="alert">
                                       <div ng-message="required" class="required">Please Enter Employee User Name</div>
                                    </div>
                              </div>
                           </div>

                            <div class="col-md-2">&nbsp;</div>
                        </div>

                        <div class="row maincontf">
                           <div class="col-md-1">&nbsp;</div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>E-mail <span class="required"> * </span></label>
                                 <input type="text" id="user_email" name="user_email" class="form-control input-sm" placeholder="E-mail" ng-model="user_email" required=""> 
                                      <div ng-if="userprofile.$submitted || userprofile.user_email.$dirty" ng-messages="userprofile.user_email.$error" role="alert">
                                       <div ng-message="required" class="required">Please Enter Email </div>
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
                           <div class="col-md-2">&nbsp;</div>
 
                        </div>  
                        
                        <div class="row maincontf">
                            <div class="col-md-1">&nbsp;</div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Employee Name
                                 <span class="required"> * </span></label>  
                                 <input type="text"  placeholder="Employee Name"  class="form-control input-sm" name="user_empname" id="user_empname" ng-model="user_empname" required>
                                 
                                      <div ng-if="userprofile.$submitted || userprofile.user_empname.$dirty" ng-messages="userprofile.user_empname.$error" role="alert">
                                       <div ng-message="required" class="required">Please Employee Name </div>
                                    </div>   
                              
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>User Type
                                 <span class="required"> * </span></label>                          
                                 <select class="form-control input-sm" name="usr_type_id" id="usr_type_id" ng-model="usr_type_id" ng-change="onUserTypeChange(usr_type_id)" required>
                                     <option value="" disabled selected>Select your option</option>
                                    <?php foreach($userTypeArray as $uta) { ?>
                                    <option id="<?php echo $uta['usr_type_id']; ?>" value="<?php echo $uta['usr_type_name']; ?>"> <?php echo $uta['usr_type_name']; ?></option>
                                    <?php } ?>     
                                 </select>
                                 <div ng-if="userprofile.$submitted || userprofile.usr_type_id.$dirty" ng-messages="userprofile.usr_type_id.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Designation</div>
                                 </div>
                              </div>
                           </div>

                            <div class="col-md-2">&nbsp;</div>
                        </div>
                         <div class="row maincontf">
                            <div class="col-md-1">&nbsp;</div>
                           <div class="col-md-4">
                 <div class="form-group">
                     <label>IMD Code<span class="required"> * </span></label>
                     <!-- ng-required = ' usr_type_id == "HDFC AV" ' -->
                    <input id="user_imd_code" placeholder="IMD Code" name="user_imd_code" class="form-control input-sm" ng-model="user_imd_code" >
                         <div ng-if="userprofile.$submitted || userprofile.user_imd_code.$dirty" ng-messages="userprofile.user_imd_code.$error" role="alert">
                            <div ng-message="required" class="required">Please Enter IMD Code</div>
                         </div>
                      </div>
                   </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Bank Verifier ID <span class="required"> * </span></label>
                                 <!--  ng-required = ' usr_type_id == "HDFC AV" ' -->
                                 <input id="user_bank_verifier_id" placeholder="Bank Verifier ID" name="user_bank_verifier_id" class="form-control input-sm" ng-model="user_bank_verifier_id">
                                 <div ng-if="userprofile.$submitted || userprofile.user_bank_verifier_id.$dirty" ng-messages="userprofile.user_bank_verifier_id.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>
                                 </div>
                              </div>
                           </div>

                           
                            <div class="col-md-2">&nbsp;</div>
                        </div>
                         <div class="row maincontf">
                            <div class="col-md-1">&nbsp;</div>
                           <div class="col-md-4">
                 <div class="form-group">
                     <label>Staff Code<span class="required"> * </span></label>
                     <!--  ng-required = ' usr_type_id == "HDFC AV" ' -->
                      <input id="user_staff_code" placeholder="Staff Code" name="user_staff_code" class="form-control input-sm" ng-model="user_staff_code">
                     <div ng-if="userprofile.$submitted || userprofile.user_staff_code.$dirty" ng-messages="userprofile.user_staff_code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Staff Code</div>
                     </div>
                  </div>
               </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                <!--  ng-required = ' usr_type_id == "HDFC AV" ' -->
                                 <label> Branch <span class="required"> * </span></label>
                                 <input id="user_branch" placeholder="Branch" name="user_branch" class="form-control input-sm" ng-model="user_branch">
                                 <div ng-if="userprofile.$submitted || userprofile.user_branch.$dirty" ng-messages="userprofile.user_branch.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Branch</div>
                                 </div>
                              </div>
                           </div>

                           
                            <div class="col-md-2">&nbsp;</div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-1">&nbsp;</div>
                           <div class="col-md-4">
                 <div class="form-group">
                     <label>Channel<span class="required"> * </span></label>
               <select class="form-control input-sm" name="user_channel" id="user_channel" ng-model="user_channel" ng-change="changedValu(user_channel)" >
                   <option value="" disabled selected>Select your channel</option>
                  <option value="{{a}}" ng-repeat="a in channelList" ng-bind="a">
               </select>

                     <div ng-if="userprofile.$submitted || userprofile.user_channel.$dirty" ng-messages="userprofile.user_channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Channel</div>
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
                           
                          <div class="col-md-2">&nbsp;</div>
                        </div>



                        <div class="row maincontf">
                           <div class="col-md-1">&nbsp;</div>
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
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> User Status</label>
                                   <select class="form-control input-sm" name="usr_status" id="usr_status" ng-model="usr_status" required>
                                       <option value="" disabled selected>Select your option</option>
                                      <?php foreach($userStatusArray as $usa) { ?>
                                      <option id="<?php echo $usa['id']; ?>" value="<?php echo $usa['value']; ?>"> <?php echo $usa['value']; ?></option>
                                      <?php } ?>     
                                   </select>                                 
                             </div>
                          </div>

                          
                     <div class="col-md-2">&nbsp;</div>
                        </div>

                                 <div class="row maincontf">
      <div class="col-md-1">&nbsp;</div>
            <div class="col-md-4">
                 <div class="form-group">
                     <label>User Location <class="required"> * </span></label>
                    

                     <select class="form-control input-sm" name="user_location" id="user_location" ng-model="user_location" ng-change="changedValu(user_location)">

                        <option value="" disabled selected>Select your location</option>
                        <option value="{{b}}" ng-repeat="b in locationlist " ng-bind="b">
                     </select>

                     <div ng-if="userprofile.$submitted || userprofile.user_location.$dirty" ng-messages="userprofile.user_location.$error" role="alert">
                        <div ng-message="required" class="required">Please Select a Location</div>
                     </div>
                     </div>
                     </div>
                  <div class="col-md-4" ng-show="showSupervisor">
                        <div class="form-group">
                           <label>Supervisor 1<span class="required"> * </span></label>
                                 <select class="form-control input-sm" name="user_supervisor" id="user_supervisor" ng-model="user_supervisor"  ng-options="supervisor as supervisor.user_name for supervisor in supervisorList  track by supervisor.emp_id" ng-change="supervisorChange()">
                                  <option value="">Select Supervisor 1</option> 
                           </select>
                  </div>
               </div> 
               <div class="col-md-2">&nbsp;</div>
                        </div>

                          
                           <div class="row maincontf">
                            <div class="col-md-1">&nbsp;</div>
                            <div class="col-md-4" ng-show="showSupervisor">
                              <div class="form-group">
                                <label>Supervisor 2 <span class="required">  </span></label>
                                 <select class="form-control input-sm" name="user_supervisor2" id="user_supervisor2" ng-model="user_supervisor2"  ng-options="supervisor as supervisor.user_name for supervisor in supervisorList  track by supervisor.emp_id" ng-change="supervisorChange()">
                                  <option value="">Select Supervisor 2 </option> 
                           </select>

                     <?php /* <div ng-if="userprofile.$submitted || userprofile.user_supervisor2.$dirty" ng-messages="userprofile.user_supervisor2.$error" role="alert">
                        <div ng-message="required" class="required">Please Select a supervisor 2 </div>
                              </div> */ ?>

                              </div>
                              </div>

                            
                             <div class="col-md-4" ng-show="showSupervisor">
                              <div class="form-group">
                                <label>Supervisor 3<span class="required">  </span></label>
                                 <select class="form-control input-sm" name="user_supervisor3" id="user_supervisor3" ng-model="user_supervisor3"  ng-options="supervisor as supervisor.user_name for supervisor in supervisorList  track by supervisor.emp_id" ng-change="supervisorChange()">
                                  <option value="">Select Supervisor 3</option> 
                           </select>

                    <?php /* <div ng-if="userprofile.$submitted || userprofile.user_supervisor3.$dirty" ng-messages="userprofile.user_supervisor3.$error" role="alert">
                        <div ng-message="required" class="required">Please Select a supervisor 3 </div>
                     </div>
					 */ ?>
                        </div>
                      </div>

                              </div>
                            

                        <div class="row"> &nbsp; </div>
                        <div class="row">
                          <div class="col-md-1">&nbsp;</div>

                           <div class="col-md-2">
                              <div class="form-group">
                                 <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                                    <div class="modal-dialog">
                                       <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                                       <button type="button" class="btn btn-default" id="closeModel" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn blue btn-default" ng-click="pset()">Submit</button>
                                 <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
                                 <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">                                       
                              </div>
                           </div>



                     <div id="update-password" class="modal fade" role="dialog">
                       <div class="modal-dialog" style="width: 55%;">
                         <!-- Modal content-->
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" id="close-button" data-dismiss="modal">&times;</button>

                                 <h4 class="modal-title">Reset Password</h4>
                           </div>
                           <div class="modal-body">
                               <div class="row">
                                    <div class="col-md-12" id="modal_error" style="color: red;"></div> 
                     

                                 <div class="col-md-4"> Password </div>
                                 <div class="col-md-6">
                                    <input type="Password" id="user_pwd" name="user_pwd" class="form-control input-sm" placeholder="Password" required=""> 
                                 </div>
                                 <div class="col-md-2"> &nbsp; </div>
                                 <div class="row col-md-12">&nbsp;</div>    

                                 <div class="col-md-4"> Confirm Password </div>
                                 <div class="col-md-6">
                                    <input type="Password" id="user_con_pwd" name="user_con_pwd" class="form-control input-sm" placeholder="Confirm Password" required /> 
                                 </div>
                                 <div class="col-md-2"> &nbsp; </div>

                                         
                                 <div class="row col-md-12">&nbsp;</div>         
                                 <div class="row col-md-12">&nbsp;</div>

                                  
                                 <div class="col-md-4"> &nbsp; </div>
                                 <div class="col-md-6"> <button type="button" class="btn blue btn-default" id="update_password">Update Password</button></div>
                        
                                  
                               </div> 
                               <div class="row">&nbsp;</div> 
                      
                           </div>
                         </div>
                       </div>
                     </div>

                     </form>


                     </div> <!-- controller ends here -->
                       <div class="row"> &nbsp; </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

