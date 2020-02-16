<script src="<?php echo base_url(); ?>assets/backend-js/add_employee.js"></script>
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
                              <div class="alert bold uppercase" id="alert-response"> Add Employee</div>
                              <!--                                   <div class="alert alert-danger bold uppercase">Success msg</div>
                                 -->                              
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
                                      <div ng-if="userprofile.$submitted || userprofile.user_name.$dirty" ng-messages="userprofile.user_name.$error" role="alert">
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
                                 <label>Password <span class="required"> * </span></label>
                                 <input type="Password" id="user_pwd" name="user_pwd" class="form-control input-sm" placeholder="Password" ng-model="user_pwd" required=""> 
                                      <div ng-if="userprofile.$submitted || userprofile.user_pwd.$dirty" ng-messages="userprofile.user_pwd.$error" role="alert">
                                       <div ng-message="required" class="required">Please Enter Password </div>
                                    </div>                                               
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Confirm Password <span class="required"> * </span></label>
                                 <input type="Password" id="user_con_pwd" name="user_con_pwd" class="form-control input-sm" placeholder="Confirm Password" ng-model="user_con_pwd"   required /> 
                                 <div ng-if="userprofile.$submitted || userprofile.user_con_pwd.$dirty" class="required" ng-messages="userprofile.user_con_pwd.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Confirm Password</div>
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
                                 <select class="form-control input-sm" name="usr_type_id" id="usr_type_id" ng-model="usr_type_id" ng-change="onUserTypeChange()" required>
                                     <option value="" disabled selected>Select your option</option>
                                    <?php foreach($userTypeArray as $uta) { ?>
                                    <option id="<?php echo $uta['usr_type_id']; ?>"> <?php echo $uta['usr_type_name']; ?></option>
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
                     <label>Channel<span class="required"> * </span></label>
               <select class="form-control input-sm" name="user_channel" id="user_channel" ng-model="user_channel" ng-change="changedValu(user_channel)" required>
                   <option value="" disabled selected>Select your channel</option>
                  <option value="{{a}}" ng-repeat="a in channelList" ng-bind="a""></option>
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
                           <div class="col-md-4">
                              <div class="form-group">
                                
                                 </div>
                              </div>
                              </div>
                           </div>


               <div class="col-md-4">
                 <div class="form-group">
                     <label>User Location <span class="required"> * </span></label>
                     <select class="form-control input-sm" name="user_location" id="user_location" ng-model="user_location" ng-change="changedValu(user_location)" required>

                        <option value="" disabled selected>Select your location</option>
                        <option value="{{b}}" ng-repeat="b in locationlist " ng-bind="b">
                     </select>
                        
                    
                       <div ng-if="userprofile.$submitted || userprofile.user_location.$dirty" ng-messages="userprofile.user_location.$error" role="alert">
                       <div ng-message="required" class="required">Please Select a Location</div>
                     </div>
                     </div>
                     </div>
                     <div class="col-md-2">&nbsp;</div>
                        </div>

                    

            <div class="row"> &nbsp; </div>
               <div class="row">
				  <div class="col-md-1">&nbsp;</div>

                  <div class="col-md-4" ng-show="showSupervisor">
                        <div class="form-group">
                           <label>Supervisor 1<span class="required"> * </span></label>
                                 <select class="form-control input-sm valueadd"  name="user_supervisor" id="user_supervisor" ng-model="user_supervisor"  ng-options="supervisor as supervisor.user_name for supervisor in supervisorList track by supervisor.emp_id" ng-change="supervisorChange()">


                            <option value="">Select Supervisor</option>
                           
                            
                           </select>
						   <div id="supervisor-error">
						   <div class="required"></div>
						   </div>
						   <?php /*
                     <div ng-if="userprofile.$submitted || userprofile.user_supervisor.$dirty" ng-messages="userprofile.user_supervisor.$error" role="alert">
                        <div ng-message="required" class="required">Please Select a supervisor </div>
                     </div>
					 */ ?>
                  </div>
               </div>
			   <div class="col-md-4" ng-show="showSupervisor">
                        <div class="form-group">
                           <label> Supervisor 2 <span class="required">  </span></label>
                            <select class="form-control input-sm valueadd"  name="user_supervisor2" id="user_supervisor2" ng-model="user_supervisor2"  ng-options="supervisor as supervisor.user_name for supervisor in supervisorList track by supervisor.emp_id" ng-change="supervisorChange()">

                            <option value="">Select Supervisor 2</option>
                           
                           </select>

                    <?php /* <div ng-if="userprofile.$submitted || userprofile.user_supervisor2.$dirty" ng-messages="userprofile.user_supervisor2.$error" role="alert">
                        <div ng-message="required" class="required">Please Select a supervisor 2 </div>
                     </div>
					 */ ?>
					 
                  </div>
               </div>
                        </div>

<div class="row">
                <div class="col-md-1">&nbsp;</div>
              <div class="col-md-4" ng-show="showSupervisor">
                        <div class="form-group">
                           <label> Supervisor 3 <span class="required">  </span></label>
                                 <select class="form-control input-sm valueadd"  name="user_supervisor3" id="user_supervisor3" ng-model="user_supervisor3"  ng-options="supervisor as supervisor.user_name for supervisor in supervisorList track by supervisor.emp_id" ng-change="supervisorChange()">


                            <option value="">Select Supervisor 3</option>
                           
                            
                           </select>
						   
						   <?php /*
                               <div ng-if="userprofile.$submitted || userprofile.user_supervisor3.$dirty" ng-messages="userprofile.user_supervisor3.$error" role="alert">
                               <div ng-message="required" class="required">Please Select a supervisor 3 </div>
                                   </div>
								   */?>
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
                                 
                                 <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">                                       
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


<script type="text/javascript" language="javascript" >  
   $(document).ready(function(){  

      $('#user_con_pwd').change(function(){
         var pwd = $('#user_pwd').val();
         var confPass = $(this).val();
         if(pwd !== confPass){
            alert('Confirm Password should match with Password');
            $('#user_con_pwd').val("");
         }  

      });
   });   
</script> 

<!-- <script type="text/javascript">
   
   var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
   for (i = 0; i < checkboxes.length; i++) { 
      checkboxes[i].checked = select_all.checked;
   }
});


for (var i = 0; i < checkboxes.length; i++) {
   checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
      //uncheck "select all", if one of the listed checkbox item is unchecked
      if(this.checked == false){
         select_all.checked = false;
      }
      //check "select all" if all checkbox items are checked
      if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
         select_all.checked = true;
      }
   });
}
</script>  -->    
