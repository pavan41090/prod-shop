<script src="<?php echo base_url(); ?>assets/js/custom_critical.js"></script>
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
                     <div class="tab-pane fade" id="home">
                        TAB 4
                     </div>
                     <div class="tab-pane fade active in" id="critical">
                       <div ng-controller="MainCtrl">
                           <form name="quotecritical" novalidate >





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
                                  

                        <input list="Category" placeholder="Select Category" class="form-control input-sm" name="critical_mx_Category" id="critical_mx_Category" ng-model="critical_mx_Category" required>

   <datalist id="Category"> 
                                      <option value="">Select Category</option>
                                         <?php 
                                          foreach($CategoryArray as $Category )
                                          {
                                              echo '<option value="'.$Category['name'].'"></option>';
                                          }
                                          ?>   
                                </datalist>
                        <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Category.$dirty" ng-messages="quotecritical.critical_mx_Category.$error" role="alert">     
                <div ng-message="required" class="required">Please Select Category</div>     
      
            </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Line of Business
                                    <span class="required"> * </span></label>                          
                                  
              <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="critical_mx_Line_of_Business" id="critical_mx_Line_of_Business" ng-model="critical_mx_Line_of_Business" required>

   <datalist id="Business">                                      
                                       <option value="">Select Business</option>
                                         <?php 
                                          foreach($BusinessArray as $Business )
                                          {
                                              echo '<option value="'.$Business['name'].'"></option>';
                                          }
                                          ?>   
                                  </datalist>
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Line_of_Business.$dirty" ng-messages="quotecritical.critical_mx_Line_of_Business.$error" role="alert">
             <div ng-message="required" class="required">Please Select Line of Business</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Branch Location
                                    <span class="required"> * </span></label>  
                                 
                <input list="mx_HDFC_Branch_Location"  placeholder="Select HDFC Branch Location" class="form-control input-sm" name="critical_mx_HDFC_Branch_Location" id="critical_mx_HDFC_Branch_Location" ng-model="critical_mx_HDFC_Branch_Location" required>

   <datalist id="mx_HDFC_Branch_Location">                                      
                                     <option value="">Select Branch Location</option>
                                         <?php 
                                          foreach($branchLocation as $blc )
                                          {
                                              echo '<option value="'.$blc.'">'.$blc.'</option>';
                                          }
                                          ?>  
</datalist>                                        
                                    <!-- </select> -->
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_HDFC_Branch_Location.$dirty" ng-messages="quotecritical.critical_mx_HDFC_Branch_Location.$error" role="alert">
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
                                   


              <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="critical_mx_HDFC_Ergo_Location" id="critical_mx_HDFC_Ergo_Location" ng-model="critical_mx_HDFC_Ergo_Location" required>

   <datalist id="Location">              
                                      <option value="">Select GiLocation</option>
                                         <?php 
                                          foreach($GiLocationArray as $GiLocation )
                                          {
                                              echo '<option value="'.$GiLocation['name'].'"></option>';
                                          }
                                          ?>   
                                 </datalist>
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_HDFC_Ergo_Location.$dirty" ng-messages="quotecritical.critical_mx_HDFC_Ergo_Location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Bharati AXA GI Location</div>

         </div>
                                 </div>
                              </div>

                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Priority</label> 
                                   <span class="required"> * </span></label>                          
                                   
                                       

                                    <input list="Priority" placeholder="Select Priority" class="form-control input-sm" name="critical_mx_Priority" id="critical_mx_Priority" ng-model="critical_mx_Priority" required>
                                    <datalist id="Priority">
                                       <option value="Select Priority"></option>
                                       <option value="Priority_1"></option>
                                       <option value="Priority_2"></option>
                                       <option value="Priority_3"></option>
                                       <option value="Priority_4"></option>
                                   </datalist>
                           <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Priority.$dirty" ng-messages="quotecritical.critical_mx_Priority.$error" role="alert">
             <div ng-message="required" class="required">Please Select Priority</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Target Date
                                    </label>  <span class="required"> * </span></label>
                                   
                                       <input type="text"    class="form-control input-sm"  placeholder="DD-MM-YYYY" name="critical_mx_Target_Date" id="critical_mx_Target_Date" ng-model="critical_mx_Target_Date" required>
                                       
                              <div ng-if="quotecritical.$submitted " ng-messages="quotecritical.critical_mx_Target_Date.$error" role="alert">
             <div ng-message="required" class="required">Please Select Date</div>

         </div>
                                   
                                    <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="critical_mx_Target_Date" id="critical_mx_Target_Date" ng-model="critical_mx_Target_Date" /> -->                 
                                 </div>
                              </div>
                           </div>
                     
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TSE/BDR Code
                                    <span class="required"> * </span></label>
                                    <input type="text" name="critical_mx_TSE_BDR_Code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="critical_mx_TSE_BDR_Code" ng-model="critical_mx_TSE_BDR_Code" required> 
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_TSE_BDR_Code.$dirty" ng-messages="quotecritical.critical_mx_TSE_BDR_Code.$error" role="alert">
                                   <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
          

                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TL Code/DSA Code/Team Code</label> 
                         <span class="required"> * </span></label>                           
                                    <input type="text" name="critical_mx_TL_Code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="critical_mx_TL_Code" ng-model="critical_mx_TL_Code" required >  
                                
                         <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_TL_Code.$dirty" ng-messages="quotecritical.critical_mx_TL_Code.$error" role="alert">
             <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
          </div>
         </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>SM Code
                                    <span class="required"> * </span>
                                    </label>  
                                    <input type="text" name="critical_mx_SM_Code"  placeholder="SM Code"   class="form-control input-sm" id="critical_mx_SM_Code" ng-model="critical_mx_SM_Code" required />                 <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_SM_Code.$dirty" ng-messages="quotecritical.critical_mx_SM_Code.$error" role="alert">
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
                                    <input type="text" name="critical_mx_Bank_Verifier_ID"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="critical_mx_Bank_Verifier_ID" ng-model="critical_mx_Bank_Verifier_ID" required /> 
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Bank_Verifier_ID.$dirty" ng-messages="quotecritical.critical_mx_Bank_Verifier_ID.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Payment Type
                                    <span class="required"> * </span></label>                          
                                   


              <input list="Payment" class="form-control input-sm" placeholder=" Select Payment Type" name="critical_mx_Payment_Type" id="critical_mx_Payment_Type" ng-model="critical_mx_Payment_Type" required>

   <datalist id="Payment">      
                                     <option value="">Select Payment</option>
                                         <?php 
                                          foreach($PaymentArray as $Payment )
                                          {
                                              echo '<option value="'.$Payment['name'].'"></option>';
                                          }
                                          ?>   
                                   </datalist>
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Payment_Type.$dirty" ng-messages="quotecritical.critical_mx_Payment_Type.$error" role="alert">
             <div ng-message="required" class="required">Please Select Payment Type</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Sub Channel</label>  
                           <span class="required"> * </span></label>   
                                    
                                       

                                    <input list="Sub Channel" placeholder="Select Sub Channel"   class="form-control input-sm" name="critical_mx_Sub_Channel" id="critical_mx_Sub_Channel" ng-model="critical_mx_Sub_Channel" required>
                                    <datalist id="Sub Channel">
                                       <option value="">Select Sub Channel</option>
                                       <option value="Sub_Channel 1"></option>
                                       <option value="Sub_Channel 2"></option>
                                       <option value="Sub_Channel 3"></option>
                                       <option value="Sub_Channel 4"></option>
                                    </datalist>
                           <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Sub_Channel.$dirty" ng-messages="quotecritical.critical_mx_Sub_Channel.$error" role="alert">
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
                                    <input type="text" name="critical_mx_HDFC_Card_Relationship_No" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="critical_mx_HDFC_Card_Relationship_No" ng-model="critical_mx_HDFC_Card_Relationship_No" required />
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_HDFC_Card_Relationship_No.$dirty" ng-messages="quotecritical.critical_mx_HDFC_Card_Relationship_No.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Card's Last 4 digits
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="critical_mx_HDFC_Card_Last_4_digits"  placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="critical_mx_HDFC_Card_Last_4_digits" ng-model="critical_mx_HDFC_Card_Last_4_digits"  maxlength="4" onkeyup="return card_validate(this.value);" required />
                                   
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_HDFC_Card_Last_4_digits.$dirty" class="required" id="cardwar" ng-messages="quotecritical.critical_mx_HDFC_Card_Last_4_digits.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer First Name
                                    <span class="required"> * </span></label>  
                                    <input type="text" name="critical_FirstName"  placeholder="Customer First Name"  class="form-control input-sm" id="critical_FirstName" ng-model="critical_FirstName" required />               <div ng-if="quotecritical.$submitted || quotecritical.critical_FirstName.$dirty" ng-messages="quotecritical.critical_FirstName.$error" role="alert">
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
                                    <input type="text" name="critical_LastName"  placeholder="Customer Last Name"   class="form-control input-sm" id="critical_LastName"  ng-model="critical_LastName" required/> 
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_LastName.$dirty" ng-messages="quotecritical.critical_LastName.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Last Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>DOB
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="critical_mx_DOB"  placeholder="DD-MM-YYYY"  onkeyup="return dob_validate(this.value);"   class="form-control input-sm" id="critical_mx_DOB" ng-model="critical_mx_DOB" required />
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_DOB.$dirty" class="required" id="dobalert" ng-messages="quotecritical.critical_mx_DOB.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Gender
                                    </label>  <span class="required"> * </span>
                                   
                                      

  <input list="Customer Gender" placeholder="Select Customer Gender"   class="form-control input-sm" name="critical_mx_Customer_Gender" id="critical_mx_Customer_Gender" ng-model="critical_mx_Customer_Gender" required>
                                    <datalist id="Customer Gender">
                                       <option value="Select Gender"></option>
                                       <option value="male"></option>
                                       <option value="female"></option>
                                    </datalist>
                            <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Customer_Gender.$dirty" ng-messages="quotecritical.critical_mx_Customer_Gender.$error" role="alert">
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
                                    <input type="text" name="critical_mx_Case_id"  placeholder="Case id"    class="form-control input-sm" id="critical_mx_Case_id" ng-model="critical_mx_Case_id" required />
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Case_id.$dirty" ng-messages="quotecritical.critical_mx_Case_id.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Case id</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>PAN Card
                                    </label> <span class="required"> * </span>                         
                                    <input type="text" name="critical_mx_PAN_Card"  placeholder="PAN Card"   class="form-control input-sm" id="critical_mx_PAN_Card" ng-model="critical_mx_PAN_Card"  MaxLength="10" required>
                            <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_PAN_Card.$dirty" ng-messages="quotecritical.critical_mx_PAN_Card.$error" role="alert">
             <div ng-message="required" class="required">Please Enter PAN Card Num</div>
                    
         </div>   <p class="required" id="demo"></p>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 1 <span class="required"> * </span>
                                    </label>  
                                    <textarea class="form-control" placeholder="Address 1" name="critical_mx_Street1" rows="2" id="critical_mx_Street1" ng-model="critical_mx_Street1" required></textarea>              <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Street1.$dirty" ng-messages="quotecritical.critical_mx_Street1.$error" role="alert">
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
                                    <textarea class="form-control"  placeholder="Address 2" name="critical_mx_Street2" rows="2" id="critical_mx_Street2" ng-model="critical_mx_Street2" required></textarea>
                            <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Street2.$dirty" ng-messages="quotecritical.critical_mx_Street2.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address 2</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Area
                                    </label><span class="required"> * </span>                          
                                    <input type="text" name="critical_mx_Area"  placeholder="Area"   class="form-control input-sm" id="critical_mx_Area"  ng-model="critical_mx_Area" required>
                            <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Area.$dirty" ng-messages="quotecritical.critical_mx_Area.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Area</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Pincode
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="critical_mx_Zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="critical_mx_Zip" ng-model="critical_mx_Zip" required >
                                   
                                    <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_Zip.$dirty"  class="required" id="post" ng-messages="quotecritical.critical_mx_Zip.$error" role="alert">
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
                                    <input list="state" placeholder="Select State" id="critical_mx_State" name="critical_mx_State" class="form-control input-sm" ng-model="critical_mx_State" required>
                                    <datalist id="state">
                                   
                                       <option value="">Select State</option>
                                         <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>   

                                         
                                       </datalist> 
      <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_State.$dirty" ng-messages="quotecritical.critical_mx_State.$error" role="alert">
             <div ng-message="required" class="required">Please Enter State</div>

         </div>
                                 </div>
                              </div>
                               <div class="col-md-4">
                                 <div class="form-group">
                                    <label>City <span class="required"> * </span>
                                    </label> 
                                    <div id="critical_mx_City-loader" style="padding: 0 25%; display: none;">
                                       <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                    </div>
                                     <div id="critical_mx_City-div" style="">
                                       <input list="city" placeholder="Select city" id="critical_mx_City" name="critical_mx_City" class="form-control input-sm" ng-model="critical_mx_City" required>
                                       <datalist id="city">
                                          <option value="">Select city</option>
                                         
                                       </datalist>        
                                    

         <div ng-if="quotecritical.$submitted || quotecritical.critical_mx_City.$dirty" ng-messages="quotecritical.critical_mx_City.$error" role="alert">
             <div ng-message="required" class="required">Please Enter City</div>

         </div>
       </div>
                                 </div>
                              </div>
                            
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Details of Lead
                                    </label>   <span class="required"> * </span>
                                    <input type="text" name="critical_Notes"  placeholder="Details of Lead "   class="form-control input-sm" id="critical_Notes" ng-model="critical_Notes" required> 
 <div ng-if="quotecritical.$submitted || quotecritical.critical_Notes.$dirty" ng-messages="quotecritical.critical_Notes.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Details of Lead</div>

         </div>                           
                                 </div>
                              </div>
                           </div>
                  












                              
                               
                     
                              <div class="row maincontf">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Email <span class="required"> * </span></label>                          
                                      <input type="text" id="emailcritical" name="emailcritical" class="form-control input-sm" placeholder="E-Mail" ng-model="emailcritical"  onkeyup="return email_validate(this.value);" required>
                                       
                                       <div ng-if="quotecritical.$submitted || quotecritical.emailcritical.$dirty" class="required" id="emailwar" ng-messages="quotecritical.emailcritical.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your E-mail</div>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Mobile Number <span class="required"> * </span></label>                          
                                      <input type="text" id="mobilecritical" name="mobilecritical" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobilecritical" " MaxLength="10" onkeyup="mobile_validate(this.value);" required>    
                                       <div ng-if="quotecritical.$submitted || quotecritical.mobilecritical.$dirty" class="required" id="mobilewar" ng-messages="quotecritical.mobilecritical.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter Mobile Number</div>
                                          </div>
                                    </div>
                                 </div>


                                  <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Occupation
                                       <span class="required"> * </span></label>
                                       <div class="radio-list">
                                          <input list="Occupation" placeholder="Select Occupation" id="occupation" name="occupation" class="form-control input-sm" ng-model="occupation" required>
                                 <datalist id="Occupation">
                                         <option value="MANAGER/ADMINISTRATIVE"></option>
                                         <option value="5001">BUSINESS OWNER</option>
                                         <option value="5002">SALESPERSON DOING FIELD VISITS</option>
                                         <option value="5003">PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)</option>
                                         <option value="5004">IT/ITES PROFESSIONAL</option>
                                         <option value="5005">BUILDER/CONTRACTOR</option>
                                         <option value="5006">MACHINE OPERATOR/MANUAL LABOR</option>
                                         <option value="5007">DRIVER (PRIVATE BUS / CAR)</option>

                                       </datalist> 

                                          <div ng-if="quotecritical.$submitted || quotecritical.occupation.$dirty" ng-messages="quotecritical.occupation.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select your Occupation</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 


                              </div>

                              
                             
                              <div class="row maincontf">
                  <div class="col-md-4">
                       <div class="form-group">
                       <div class="question">
       <label>Include Spouse DOB </label>
       <input class="coupon_question" type="checkbox" id="Spouse_critical" name="Spouse_critical"  value="1" />
       
   </div>

   <div class="answer">
       
      <input type="text" id="spousedobcritical" name="spousedobcritical" class="form-control input-sm" placeholder="Spouse Date of Birth" ng-model="spousedobcritical" >
<!--        <div ng-if="quoteSShip.$submitted" ng-messages="quoteSShip.dateofbirthcritical.$error" role="alert">
            <div ng-message="required" class="required">Please Enter your Date of Birth</div>
        </div> -->
   </div>
                       </div>
                                    
                         
                                 </div>

                            
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Include Children</label> <span class="required">  </span>
                                       <div class="radio-list">
                                       <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="includechildren"  ng-model='includechildren' checked="checked" ng-value="0"  value="0" required> 0 </label>   
                                          <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="includechildren" ng-model='includechildren' ng-value="1"  value="1" required> 1 </label>
                                     <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="includechildren" ng-model='includechildren' ng-value="2"  value="2" > 2 </label>      
                                                                       
                                          </div>                             
<!--                                           <div ng-if="quotecritical.$submitted || quotecritical.includechildren.$dirty" ng-messages="quotecritical.includechildren.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select Children</div>
                                         
                                       </div> -->
                                       
                                    </div>
                                 </div>
                                
                                 
                                 <div class="col-md-4">
                                    &nbsp;
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
                                       <!--  <button  class="btn blue btn-default" ng-click="pset()" ng-disabled="form.$invalid" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
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

<script>
 $("#critical_mx_State").on('change', function() {      

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
         $('#critical_mx_City-div').hide();      
         $('#critical_mx_City-loader').show();
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
               $('#critical_mx_City-div').show();      
               $('#critical_mx_City-loader').hide();
               $('#critical_mx_City').focus();
              }, 1500); 
                 
              
           
            
                },
               
            });
                   


   });


</script>

<script>
$(".answer").hide();
$(".coupon_question").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
    } else {
        $(".answer").hide();
    }
});
</script>
<script>
  $(document).ready(function(){
    
    var date_input=$('input[name="critical_mx_Target_Date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script> 