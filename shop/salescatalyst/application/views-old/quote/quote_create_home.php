<script src="<?php echo base_url(); ?>assets/js/custom_home.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="tab-content">
   <div class="tab-pane fade " id="car">
      TAB 1
   </div>
   <div class="tab-pane fade" id="two">
      TAB 2
   </div>
   <div class="tab-pane fade" id="travel">
      TAB 3
   </div>
   <div class="tab-pane fade active in" id="home">
      <div ng-controller="MainCtrl">
         <form name="quoteHome" novalidate >
            <div class="portlet-title tabbable-line">
               <div class="caption leadtit">
                  <i class="icon-globe font-dark hide"></i>
                  <span class="caption-subject font-dark bold uppercase">create Leads</span>
               </div>
            </div>
            <!--start create leads-->
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Category
                     <span class="required"> * </span></label>
                   
                         <input list="Category" placeholder="Select Category" class="form-control input-sm" name="Home_mx_Category" id="Home_mx_Category" ng-model="Home_mx_Category" required>

   <datalist id="Category"> 
                                       <option value="">Select Category</option>
                                         <?php 
                                          foreach($CategoryArray as $Category )
                                          {
                                              echo '<option value="'.$Category['name'].'"></option>';
                                          }
                                          ?>   
                                  </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Category.$dirty" ng-messages="quoteHome.Home_mx_Category.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Category</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Line of Business
                     <span class="required"> * </span></label>                          
                 
                       <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="Home_mx_Line_of_Business" id="Home_mx_Line_of_Business" ng-model="Home_mx_Line_of_Business" required>

   <datalist id="Business">
                                     <option value="">Select Business</option>
                                         <?php 
                                          foreach($BusinessArray as $Business )
                                          {
                                              echo '<option value="'.$Business['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Line_of_Business.$dirty" ng-messages="quoteHome.Home_mx_Line_of_Business.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Line of Business</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Branch Location
                     <span class="required"> * </span></label>  
                   
                       <input list="mx_HDFC_Branch_Locations"  placeholder="Select HDFC Branch Location"  class="form-control input-sm" name="Home_mx_HDFC_Branch_Location" id="Home_mx_HDFC_Branch_Location" ng-model="Home_mx_HDFC_Branch_Location" required>
<!--   <input list="browsers" name="browser"> -->
  <datalist id="mx_HDFC_Branch_Locations">

                                     <option value="">Select Branch Location</option>
                                         <?php 
                                          foreach($branchLocation as $blc )
                                          {
                                              echo '<option value="'.$blc.'">'.$blc.'</option>';
                                          }
                                          ?>   
                                    </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_HDFC_Branch_Location.$dirty" ng-messages="quoteHome.Home_mx_HDFC_Branch_Location.$error" role="alert">
                        <div ng-message="required" class="required">Please Select HDFC Branch Location</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Bharati AXA GI Location
                     <span class="required"> * </span></label>
                   
                        <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="Home_mx_HDFC_Ergo_Location" id="Home_mx_HDFC_Ergo_Location" ng-model="Home_mx_HDFC_Ergo_Location" required>

   <datalist id="Location">  

       <option value="">Select GiLocation</option>
                                         <?php 
                                          foreach($GiLocationArray as $GiLocation )
                                          {
                                              echo '<option value="'.$GiLocation['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_HDFC_Ergo_Location.$dirty" ng-messages="quoteHome.Home_mx_HDFC_Ergo_Location.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Bharati AXA GI Location</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Priority</label> 
                     <span class="required"> * </span></label>                          
                     
                        

                       <input list="Priority" placeholder="Select Priority" class="form-control input-sm" name="Home_mx_Priority" id="Home_mx_Priority" ng-model="Home_mx_Priority" required>
                                    <datalist id="Priority">
                                       <option value="Select Priority"></option>
                                       <option value="Priority_1"></option>
                                       <option value="Priority_2"></option>
                                       <option value="Priority_3"></option>
                                       <option value="Priority_4"></option>
                                   </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Priority.$dirty" ng-messages="quoteHome.Home_mx_Priority.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Priority</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Target Date
                     </label>  <span class="required"> * </span></label>
                     <input type="text"    class="form-control input-sm"  placeholder="DD-MM-YYYY" name="Home_mx_Target_Date" id="Home_mx_Target_Date" ng-model="Home_mx_Target_Date" required>
                     <div ng-if="quoteHome.$submitted " ng-messages="quoteHome.Home_mx_Target_Date.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Date</div>
                     </div>
                     <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="Home_mx_Target_Date" id="Home_mx_Target_Date" ng-model="Home_mx_Target_Date" /> -->                 
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>TSE/BDR Code
                     <span class="required"> * </span></label>
                     <input type="text" name="Home_mx_TSE_BDR_Code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="Home_mx_TSE_BDR_Code" ng-model="Home_mx_TSE_BDR_Code" required> 
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_TSE_BDR_Code.$dirty" ng-messages="quoteHome.Home_mx_TSE_BDR_Code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>TL Code/DSA Code/Team Code</label> 
                     <span class="required"> * </span></label>                           
                     <input type="text" name="Home_mx_TL_Code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="Home_mx_TL_Code" ng-model="Home_mx_TL_Code" required >  
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_TL_Code.$dirty" ng-messages="quoteHome.Home_mx_TL_Code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>SM Code
                     <span class="required"> * </span>
                     </label>  
                     <input type="text" name="Home_mx_SM_Code"  placeholder="SM Code"   class="form-control input-sm" id="Home_mx_SM_Code" ng-model="Home_mx_SM_Code" required />                 
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_SM_Code.$dirty" ng-messages="quoteHome.Home_mx_SM_Code.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter SM Code</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Bank Verifier ID
                     <span class="required"> * </span></label>
                     <input type="text" name="Home_mx_Bank_Verifier_ID"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="Home_mx_Bank_Verifier_ID" ng-model="Home_mx_Bank_Verifier_ID" required /> 
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Bank_Verifier_ID.$dirty" ng-messages="quoteHome.Home_mx_Bank_Verifier_ID.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Payment Type
                     <span class="required"> * </span></label>                          
                  
                         <input list="Payment" class="form-control input-sm" placeholder=" Select Payment Type" name="Home_mx_Payment_Type" id="Home_mx_Payment_Type" ng-model="Home_mx_Payment_Type" required>

   <datalist id="Payment"> 
                                       <option value="">Select Payment</option>
                                         <?php 
                                          foreach($PaymentArray as $Payment )
                                          {
                                              echo '<option value="'.$Payment['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Payment_Type.$dirty" ng-messages="quoteHome.Home_mx_Payment_Type.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Payment Type</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Sub Channel</label>  
                     <span class="required"> * </span></label>   
                   
                        


                      <input list="Sub Channel" placeholder="Select Sub Channel"   class="form-control input-sm" name="Home_mx_Sub_Channel" id="Home_mx_Sub_Channel" ng-model="Home_mx_Sub_Channel" required>
                                    <datalist id="Sub Channel">
                                       <option value="">Select Sub Channel</option>
                                       <option value="Sub_Channel 1"></option>
                                       <option value="Sub_Channel 2"></option>
                                       <option value="Sub_Channel 3"></option>
                                       <option value="Sub_Channel 4"></option>
                                    </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Sub_Channel.$dirty" ng-messages="quoteHome.Home_mx_Sub_Channel.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Sub Channel</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Card Relationship No/LOS Number
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="Home_mx_HDFC_Card_Relationship_No" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="Home_mx_HDFC_Card_Relationship_No" ng-model="Home_mx_HDFC_Card_Relationship_No" required />
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_HDFC_Card_Relationship_No.$dirty" ng-messages="quoteHome.Home_mx_HDFC_Card_Relationship_No.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>HDFC Card's Last 4 digits
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="Home_mx_HDFC_Card_Last_4_digits"  placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="Home_mx_HDFC_Card_Last_4_digits" ng-model="Home_mx_HDFC_Card_Last_4_digits"  maxlength="4" onkeyup="return card_validate(this.value);" required />
                     
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_HDFC_Card_Last_4_digits.$dirty" class="required" id="cardwar" ng-messages="quoteHome.Home_mx_HDFC_Card_Last_4_digits.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer First Name
                     <span class="required"> * </span></label>  
                     <input type="text" name="Home_FirstName"  placeholder="Customer First Name"  class="form-control input-sm" id="Home_FirstName" ng-model="Home_FirstName" required />               
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_FirstName.$dirty" ng-messages="quoteHome.Home_FirstName.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer First Name</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Last Name
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="Home_LastName"  placeholder="Customer Last Name"   class="form-control input-sm" id="Home_LastName"  ng-model="Home_LastName" required/> 
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_LastName.$dirty" ng-messages="quoteHome.Home_LastName.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Customer Last Name</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>DOB
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="Home_mx_DOB"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="Home_mx_DOB" onkeyup="return dob_validate(this.value);" ng-model="Home_mx_DOB" required />
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_DOB.$dirty" class="required" id="dobalert" ng-messages="quoteHome.Home_mx_DOB.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter DOB</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Customer Gender
                     </label>  <span class="required"> * </span>
                    
                       



  <input list="Customer Gender" placeholder="Select Customer Gender"   class="form-control input-sm" name="Home_mx_Customer_Gender" id="Home_mx_Customer_Gender" ng-model="Home_mx_Customer_Gender" required>
                                    <datalist id="Customer Gender">
                                       <option value="Select Gender"></option>
                                       <option value="male"></option>
                                       <option value="female"></option>
                                    </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Customer_Gender.$dirty" ng-messages="quoteHome.Home_mx_Customer_Gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Customer Gende</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Case id
                     <span class="required"> * </span>
                     </label>
                     <input type="text" name="Home_mx_Case_id"  placeholder="Case id"    class="form-control input-sm" id="Home_mx_Case_id" ng-model="Home_mx_Case_id" required />
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Case_id.$dirty" ng-messages="quoteHome.Home_mx_Case_id.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Case id</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>PAN Card
                     </label> <span class="required"> * </span>                         
                     <input type="text" name="Home_mx_PAN_Card"  placeholder="PAN Card"   class="form-control input-sm" id="Home_mx_PAN_Card" ng-model="Home_mx_PAN_Card" MaxLength="10" required>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_PAN_Card.$dirty" ng-messages="quoteHome.Home_mx_PAN_Card.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter PAN Card Num</div>
                     </div>
                     <p class="required" id="demo"></p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Address 1 <span class="required"> * </span>
                     </label>  
                     <textarea class="form-control" placeholder="Address 1" name="Home_mx_Street1" rows="2" id="Home_mx_Street1" ng-model="Home_mx_Street1" required></textarea>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Street1.$dirty" ng-messages="quoteHome.Home_mx_Street1.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 1</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Address 2
                     </label><span class="required"> * </span>
                     <textarea class="form-control"  placeholder="Address 2" name="Home_mx_Street2" rows="2" id="Home_mx_Street2" ng-model="Home_mx_Street2" required></textarea>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Street2.$dirty" ng-messages="quoteHome.Home_mx_Street2.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Address 2</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Area
                     </label><span class="required"> * </span>                          
                     <input type="text" name="Home_mx_Area"  placeholder="Area"   class="form-control input-sm" id="Home_mx_Area"  ng-model="Home_mx_Area" required>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Area.$dirty" ng-messages="quoteHome.Home_mx_Area.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Area</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Pincode
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="Home_mx_Zip"  placeholder="Pincode " MaxLength="6" class="form-control input-sm" id="Home_mx_Zip" ng-model="Home_mx_Zip" onkeyup="return postcode_validate(this.value);" required >
                  
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_Zip.$dirty" class="required" id="post" ng-messages="quoteHome.Home_mx_Zip.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pincode</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>State
                     </label><span class="required"> * </span>
                     <input list="state" placeholder="Select State" id="Home_mx_State" name="Home_mx_State" class="form-control input-sm" ng-model="Home_mx_State" required>
                      <datalist id="state">
                        <option value="">Select State</option>
                        <?php 
                           foreach($stateArray as $state )
                           {
                               echo '<option value="'.$state['id'].'"></option>';
                           }
                           ?>   
                     </datalist>
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_State.$dirty" ng-messages="quoteHome.Home_mx_State.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter State</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>City <span class="required"> * </span>
                     </label> 
                     <div id="Home_mx_City-loader" style="padding: 0 25%; display: none;">
                        <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                     </div>
                     <div id="Home_mx_City-div" style="">
                        <input list="city" placeholder="Select city" id="Home_mx_City" name="Home_mx_City" class="form-control input-sm" ng-model="Home_mx_City" required>
                        <datalist id="city">
                           <option value="">Select city</option>
               </datalist>
                        <div ng-if="quoteHome.$submitted || quoteHome.Home_mx_City.$dirty" ng-messages="quoteHome.Home_mx_City.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter City</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Details of Lead
                     </label>   <span class="required"> * </span>
                     <input type="text" name="Home_Notes"  placeholder="Details of Lead "   class="form-control input-sm" id="Home_Notes" ng-model="Home_Notes" required> 
                     <div ng-if="quoteHome.$submitted || quoteHome.Home_Notes.$dirty" ng-messages="quoteHome.Home_Notes.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Details of Lead</div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end lead -->
            
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Plans</label>
                     <span class="required">  </span>
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="Home_plans" ng-model='Home_plans' checked ng-value="0"  value="0" required> Silver </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="Home_plans"  ng-model='Home_plans' ng-value="1"  value="1" required> Gold</label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="Home_plans"  ng-model='Home_plans' ng-value="2"  value="2" required> Platinum </label>
                        <p class="required" id="error_age_structure"></p>
                        <div ng-if="quoteHome.$submitted || quoteHome.Home_plans.$dirty" ng-messages="quoteHome.Home_plans.$error" role="alert">
                           <div ng-message="required" class="required">Please Select Plan</div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Policy Start
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="Home_policy_start"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="Home_policy_start" ng-model="Home_policy_start" required />
                     <div ng-if="quoteHome.$submitted " ng-messages="quoteHome.Home_policy_start.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Policy Start Date</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Policy End
                     <span class="required"> * </span>
                     </label>                          
                     <input type="text" name="Home_policy_end"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="Home_policy_end" ng-model="Home_policy_end" required />
                     <div ng-if="quoteHome.$submitted " ng-messages="quoteHome.Home_policy_end.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Policy End Date</div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row maincontf">
               <div class="col-md-4">
                  <div class="form-group">
                     <label>Mobile Number <span class="required"> * </span></label>                          
                     <input type="text" id="home_mobile" name="home_mobile" MaxLength="10" class="form-control input-sm" placeholder="Mobile Number" ng-model="home_mobile" onkeyup="return mobile_validate(this.value);" required>  
                  
                     <div ng-if="quoteHome.$submitted || quoteHome.home_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteHome.home_mobile.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Mobile Number</div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label>E-mail <span class="required"> * </span></label>
                     <input type="text" id="home_email" name="home_email" class="form-control input-sm" placeholder="E-Mail" ng-model="home_email" onkeyup="return email_validate(this.value);" required>   
                     
                     <div ng-if="quoteHome.$submitted || quoteHome.home_email.$dirty" class="required" id="emailwar" ng-messages="quoteHome.home_email.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Policy End Date</div>
                     </div>
                  </div>
               </div>
            </div>
      
      <div class="row maincontf">
      <div class="col-md-2">
      <div class="form-group">
      <!--<button type="submit"  class="btn blue btn-default" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
      <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
      <div class="modal-dialog">
      <img src="assets/images/ajax-loader.gif"></img>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
      <button type="submit" class="btn blue btn-default" ng-click="pset()">Calculate Premium</button> 
      <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
      </div>
      </div>
      <div class="col-md-2">
      <div class="form-group">
      <button type="button" id="reset" class="btn blue btn-default">Reset</button>
      </div>
      </div>
      </div>
      </form>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>    
   $('input[name="typeoftrip"]').on('change', function() {
     $('.multitrips').toggle(+this.value === 1 && this.checked);
   
   }).change();
    $('input[name="policyType"]').on('click', function() {
    
      var value = $(this).val();
      if(value == 1) {
         $('#annualTrip').hide();  
      } else {
         $('#annualTrip').show();  
      }
     //annualTrip
   }).change();
    $('input[name="policyType"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#covertype').hide();  
      } else {
         $('#covertype').show();  
      }
     
   }).change();
</script>
<!-- <script >
   $('input[name="Home_plans"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#home_fields_hide').hide(); 
         $('#error_age_structure').html('Pls contact Bank!!');
         //document.getElementById("demo").innerHTML = "Pls contact Bank!!"; 
      } else {
         
         $('#home_fields_hide ').show(); 
         document.getElementById("error_age_structure").innerHTML = ""; 
      }
   }).change();
   
   
   
   $('input[name="basement"]').on('click', function() {
      var value = $(this).val();
      if(value == 0) {
         $('#home_fields_hide').hide(); 
          document.getElementById("error_basement").innerHTML = "Hi!!"; 
      } else {
         
         $('#home_fields_hide ').show();  
         document.getElementById("error_basement").innerHTML = ""; 
      }
   }).change();
   </script>
   
   <script>
   
   $('input[name="basement"]').on('click', function() {
      var value = $(this).val();
      if(value == 0) {
         $('#construct').hide(); 
         
      } else {
         
         $('#construct ').show();  
      }
   }).change();
   
   </script>
   
   <script>
   
   $('input[name="Construction"]').on('click', function() {
      var value = $(this).val();
      if(value == 0) {
         $('#home_fields_hide').hide(); 
         document.getElementById("error_construct").innerHTML = "go back!!"; 
      } else {
         
         $('#home_fields_hide').show(); 
         document.getElementById("error_construct").innerHTML = "";  
      }
   }).change();
   
   </script>-->
<script>
   $("#Home_mx_State").on('change', function() {      
   
         var state_id = $(this).val();
         var dataString ='state_id=' + state_id;
  
var weburl = $('#web_url').val();
       var URL = weburl+'Commoncontrol/getCityByStateID/';
 
           $.ajax({
   
                 url : URL,
                  type : 'POST',
                  data : {
                      'state_id' : state_id},
                  dataType:'json',
                
                  success: function( data){
                 
                    //var stateArray = JSON.parse(data);
           $('#Home_mx_City-div').hide();      
           $('#Home_mx_City-loader').show();
           $('#city').find('option')
                .remove()
                .end()
                .append('<option value="">Select city</option>')
                .val('');
                       
                    $.each(data, function(key, value) {
                       $('#city')
                       .append($("<option></option>")
                       .attr("value",value['id'])
                       .text(value['name']));
                      
                    });  
                    setTimeout(function(){
                 $('#Home_mx_City-div').show();      
                 $('#Home_mx_City-loader').hide();
                 $('#Home_mx_City').focus();
                }, 1500); 
                   
                
             
              
                  },
                 
              });
                     
   
   
     });
   
   
</script>
<script>
//date select to add 1 year
  $(document).ready(function () {
    
      $("#Home_policy_end").attr("disabled", "disabled"); 

      $("#Home_policy_start").datepicker({
         format: 'dd-mm-yyyy',
         autoclose: true,
      }); 

      $("#Home_policy_end").datepicker({
         format: 'dd-mm-yyyy',
         autoclose: true,
      }); 
          
      $("#Home_policy_start").on('change', function() { 

      var date2 = $('#Home_policy_start').datepicker('getDate');
         date2.setDate(date2.getDate() + 364);
         $('#Home_policy_end').datepicker('setDate', date2);
         $("#Home_policy_end").attr("disabled", "disabled"); 
         
      });



        });

      
</script>




 <script>
   $(document).ready(function(){
      var date_input=$('input[name="Home_mx_Target_Date"]'); //our date input has the name "date"
      
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
         format: 'dd-mm-yyyy',
         container: container,
         todayHighlight: true,
         autoclose: true,
      })
   });
</script> 

