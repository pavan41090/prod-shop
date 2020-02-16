<script src="<?php echo base_url(); ?>assets/js/custom_pa.js"></script>

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
                     <div class="tab-pane fade" id="health">
                        TAB 5
                     </div>
                     <div class="tab-pane fade" id="supership">
                        TAB 6
                     </div>
                     <div class="tab-pane fade" id="ci">
                        TAB 7
                     </div>
                     <div class="tab-pane fade active in" id="pa">
                       <div ng-controller="MainCtrl">
                           <form name="quotepa" novalidate >
                              <div class="portlet-title tabbable-line">
                                 <div class="caption leadtit">
                                    <i class="icon-globe font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">create Quote</span>
                                 </div>
                              </div>
							  <!--start create leads-->
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Category
                                    <span class="required"> * </span></label>
                                

   <input list="Category" placeholder="Select Category" class="form-control input-sm" name="pa_mx_Category" id="pa_mx_Category" ng-model="pa_mx_Category" required>

   <datalist id="Category"> 
                             
                                        <option value="">Select Category</option>
                                         <?php 
                                          foreach($CategoryArray as $Category )
                                          {
                                              echo '<option value="'.$Category['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_Category.$dirty" ng-messages="quotepa.pa_mx_Category.$error" role="alert">     
                <div ng-message="required" class="required">Please Select Category</div>     
      
            </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Line of Business
                                    <span class="required"> * </span></label>                          
                                   

              <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="pa_mx_Line_of_Business" id="pa_mx_Line_of_Business" ng-model="pa_mx_Line_of_Business" required>

   <datalist id="Business">      
                                         <option value="">Select Business</option>
                                         <?php 
                                          foreach($BusinessArray as $Business )
                                          {
                                              echo '<option value="'.$Business['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_Line_of_Business.$dirty" ng-messages="quotepa.pa_mx_Line_of_Business.$error" role="alert">
             <div ng-message="required" class="required">Please Select Line of Business</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Branch Location
                                    <span class="required"> * </span></label>  
<!--                                     <select class="form-control input-sm" name="pa_mx_HDFC_Branch_Location" id="pa_mx_HDFC_Branch_Location" ng-model="pa_mx_HDFC_Branch_Location" required> -->
                          <input list="mx_HDFC_Branch_Locations" placeholder="Select HDFC Branch Location" class="form-control input-sm" name="pa_mx_HDFC_Branch_Location" id="pa_mx_HDFC_Branch_Location" ng-model="pa_mx_HDFC_Branch_Location" required>
  <datalist id="mx_HDFC_Branch_Locations">                                        
                                     <option value="">Select Branch Location</option>
                                         <?php 
                                          foreach($branchLocation as $blc )
                                          {
                                              echo '<option value="'.$blc.'">'.$blc.'</option>';
                                          }
                                          ?>  
</datalist>                                          
<!--                                     </select> -->
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_HDFC_Branch_Location.$dirty" ng-messages="quotepa.pa_mx_HDFC_Branch_Location.$error" role="alert">
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
                                  

                   <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="pa_mx_HDFC_Ergo_Location" id="pa_mx_HDFC_Ergo_Location" ng-model="pa_mx_HDFC_Ergo_Location" required>

   <datalist id="Location">    
                                      <option value="">Select GiLocation</option>
                                         <?php 
                                          foreach($GiLocationArray as $GiLocation )
                                          {
                                              echo '<option value="'.$GiLocation['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_HDFC_Ergo_Location.$dirty" ng-messages="quotepa.pa_mx_HDFC_Ergo_Location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Bharati AXA GI Location</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Priority</label> 
                                   <span class="required"> * </span></label>                          
                                
                                    
<input list="Priority" placeholder="Select Priority" class="form-control input-sm" name="pa_mx_Priority" id="pa_mx_Priority" ng-model="pa_mx_Priority" required>
                                    <datalist id="Priority">
                                       <option value="Select Priority"></option>
                                       <option value="Priority_1"></option>
                                       <option value="Priority_2"></option>
                                       <option value="Priority_3"></option>
                                       <option value="Priority_4"></option>
                                   </datalist>
                           <div ng-if="quotepa.$submitted || quotepa.pa_mx_Priority.$dirty" ng-messages="quotepa.pa_mx_Priority.$error" role="alert">
             <div ng-message="required" class="required">Please Select Priority</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Target Date
                                    </label>  <span class="required"> * </span></label>
                                   
                                       <input type="text"    class="form-control input-sm"  placeholder="DD-MM-YYYY" name="pa_mx_Target_Date" id="pa_mx_Target_Date" ng-model="pa_mx_Target_Date" required>
                                       
                              <div ng-if="quotepa.$submitted" ng-messages="quotepa.pa_mx_Target_Date.$error" role="alert">
             <div ng-message="required" class="required">Please Select Date</div>

         </div>
                                   
                                    <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="pa_mx_Target_Date" id="pa_mx_Target_Date" ng-model="pa_mx_Target_Date" /> -->                 
                                 </div>
                              </div>
                           </div>
                     
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TSE/BDR Code
                                    <span class="required"> * </span></label>
                                    <input type="text" name="pa_mx_TSE_BDR_Code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="pa_mx_TSE_BDR_Code" ng-model="pa_mx_TSE_BDR_Code" required> 
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_TSE_BDR_Code.$dirty" ng-messages="quotepa.pa_mx_TSE_BDR_Code.$error" role="alert">
                                   <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
          

                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TL Code/DSA Code/Team Code</label> 
                         <span class="required"> * </span></label>                           
                                    <input type="text" name="pa_mx_TL_Code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="pa_mx_TL_Code" ng-model="pa_mx_TL_Code" required >  
                                
                         <div ng-if="quotepa.$submitted || quotepa.pa_mx_TL_Code.$dirty" ng-messages="quotepa.pa_mx_TL_Code.$error" role="alert">
             <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
          </div>
         </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>SM Code
                                    <span class="required"> * </span>
                                    </label>  
                                    <input type="text" name="pa_mx_SM_Code"  placeholder="SM Code"   class="form-control input-sm" id="pa_mx_SM_Code" ng-model="pa_mx_SM_Code" required />                 <div ng-if="quotepa.$submitted || quotepa.pa_mx_SM_Code.$dirty" ng-messages="quotepa.pa_mx_SM_Code.$error" role="alert">
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
                                    <input type="text" name="pa_mx_Bank_Verifier_ID"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="pa_mx_Bank_Verifier_ID" ng-model="pa_mx_Bank_Verifier_ID" required /> 
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_Bank_Verifier_ID.$dirty" ng-messages="quotepa.pa_mx_Bank_Verifier_ID.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Payment Type
                                    <span class="required"> * </span></label>                          
                                   



              <input list="Payment" class="form-control input-sm" placeholder=" Select Payment Type" name="pa_mx_Payment_Type" id="pa_mx_Payment_Type" ng-model="pa_mx_Payment_Type" required>

   <datalist id="Payment">    
                                       <option value="">Select Payment</option>
                                         <?php 
                                          foreach($PaymentArray as $Payment )
                                          {
                                              echo '<option value="'.$Payment['name'].'"></option>';
                                          }
                                          ?>   
                                        </datalist>
                                    
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_Payment_Type.$dirty" ng-messages="quotepa.pa_mx_Payment_Type.$error" role="alert">
             <div ng-message="required" class="required">Please Select Payment Type</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Sub Channel</label>  
                           <span class="required"> * </span></label>   
                                    
                                      
                                      <input list="Sub Channel" placeholder="Select Sub Channel"   class="form-control input-sm" name="pa_mx_Sub_Channel" id="pa_mx_Sub_Channel" ng-model="pa_mx_Sub_Channel" required>
                                    <datalist id="Sub Channel">
                                       <option value="">Select Sub Channel</option>
                                       <option value="Sub_Channel 1"></option>
                                       <option value="Sub_Channel 2"></option>
                                       <option value="Sub_Channel 3"></option>
                                       <option value="Sub_Channel 4"></option>
                                    </datalist>
                           <div ng-if="quotepa.$submitted || quotepa.pa_mx_Sub_Channel.$dirty" ng-messages="quotepa.pa_mx_Sub_Channel.$error" role="alert">
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
                                    <input type="text" name="pa_mx_HDFC_Card_Relationship_No" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="pa_mx_HDFC_Card_Relationship_No" ng-model="pa_mx_HDFC_Card_Relationship_No" required />
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_HDFC_Card_Relationship_No.$dirty" ng-messages="quotepa.pa_mx_HDFC_Card_Relationship_No.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Card's Last 4 digits
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="pa_mx_HDFC_Card_Last_4_digits"  placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="pa_mx_HDFC_Card_Last_4_digits" ng-model="pa_mx_HDFC_Card_Last_4_digits"  maxlength="4" onkeyup="return card_validate(this.value);" required />
                                    
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_HDFC_Card_Last_4_digits.$dirty" class="required" id="cardwar" ng-messages="quotepa.pa_mx_HDFC_Card_Last_4_digits.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer First Name
                                    <span class="required"> * </span></label>  
                                    <input type="text" name="pa_FirstName"  placeholder="Customer First Name"  class="form-control input-sm" id="pa_FirstName" ng-model="pa_FirstName" required />               <div ng-if="quotepa.$submitted || quotepa.pa_FirstName.$dirty" ng-messages="quotepa.pa_FirstName.$error" role="alert">
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
                                    <input type="text" name="pa_LastName"  placeholder="Customer Last Name"   class="form-control input-sm" id="pa_LastName"  ng-model="pa_LastName" required/> 
                                    <div ng-if="quotepa.$submitted || quotepa.pa_LastName.$dirty" ng-messages="quotepa.pa_LastName.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Last Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>DOB
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="pa_mx_DOB"  placeholder="DD/MM/YYYY"     class="form-control input-sm" id="pa_mx_DOB" ng-model="pa_mx_DOB" onkeyup="return dob_validate(this.value);" required />
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_DOB.$dirty" class="required" id="dobalert" ng-messages="quotepa.pa_mx_DOB.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Gender
                                    </label>  <span class="required"> * </span>
                                   
                                       

                                      <input list="Customer Gender" placeholder="Select Customer Gender"   class="form-control input-sm" name="pa_mx_Customer_Gender" id="pa_mx_Customer_Gender" ng-model="pa_mx_Customer_Gender" required>
                                    <datalist id="Customer Gender">
                                       <option value="Select Gender"></option>
                                       <option value="male"></option>
                                       <option value="female"></option>
                                    </datalist>
                            <div ng-if="quotepa.$submitted || quotepa.pa_mx_Customer_Gender.$dirty" ng-messages="quotepa.pa_mx_Customer_Gender.$error" role="alert">
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
                                    <input type="text" name="pa_mx_Case_id"  placeholder="Case id"    class="form-control input-sm" id="pa_mx_Case_id" ng-model="pa_mx_Case_id" required />
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_Case_id.$dirty" ng-messages="quotepa.pa_mx_Case_id.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Case id</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>PAN Card
                                    </label> <span class="required"> * </span>                         
                                    <input type="text" name="pa_mx_PAN_Card"  placeholder="PAN Card"   class="form-control input-sm" id="pa_mx_PAN_Card" ng-model="pa_mx_PAN_Card"   MaxLength="10" required>
                            <div ng-if="quoteTwo.$submitted || quoteTwo.pa_mx_PAN_Card.$dirty" ng-messages="quoteTwo.pa_mx_PAN_Card.$error" role="alert">
             <div ng-message="required" class="required">Please Enter PAN Card Num</div>
                    
         </div>   <p class="required" id="demo"></p>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 1 <span class="required"> * </span>
                                    </label>  
                                    <textarea class="form-control" placeholder="Address 1" name="pa_mx_Street1" rows="2" id="pa_mx_Street1" ng-model="pa_mx_Street1" required></textarea>              <div ng-if="quotepa.$submitted || quotepa.pa_mx_Street1.$dirty" ng-messages="quotepa.pa_mx_Street1.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address</div>

         </div>
                                 </div>
                              </div>
                           </div>
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 2
                                    </label><span class="required"> * </span>
                                    <textarea class="form-control"  placeholder="Address 2" name="pa_mx_Street2" rows="2" id="pa_mx_Street2" ng-model="pa_mx_Street2" required></textarea>
                            <div ng-if="quotepa.$submitted || quotepa.pa_mx_Street2.$dirty" ng-messages="quotepa.pa_mx_Street2.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address 2</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Area
                                    </label><span class="required"> * </span>                          
                                    <input type="text" name="pa_mx_Area"  placeholder="Area"   class="form-control input-sm" id="pa_mx_Area"  ng-model="pa_mx_Area" required>
                            <div ng-if="quotepa.$submitted || quotepa.pa_mx_Area.$dirty" ng-messages="quotepa.pa_mx_Area.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Area</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Pincode
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="pa_mx_Zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="pa_mx_Zip" ng-model="pa_mx_Zip" required >
                                    
                                    <div ng-if="quotepa.$submitted || quotepa.pa_mx_Zip.$dirty" class="required" id="post" ng-messages="quotepa.pa_mx_Zip.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Pincode</div>

         </div>
                                 </div>
                              </div>
                           </div>
                     <div class="row maincontf">
                             
                            
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Details of Lead
                                    </label>   <span class="required"> * </span>
                                    <input type="text" name="pa_Notes"  placeholder="Details of Lead "   class="form-control input-sm" id="pa_Notes" ng-model="pa_Notes" required> 
 <div ng-if="quotepa.$submitted || quotepa.pa_Notes.$dirty" ng-messages="quotepa.pa_Notes.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Details of Lead</div>

         </div>                           
                                 </div>
                              </div>
                           
                          
                           </div>
                     <!--End crate leads-->
                       <br>
                              <div class="row maincontf">
                              <div class="col-md-4">
                                    <div class="form-group">
                                       <label> State <span class="required"> * </span></label>
                                     <input list="state" placeholder="Select State" id="pa_state" name="pa_state" class="form-control input-sm" ng-model="pa_state" required>
                                     <datalist id="state">
                                          <option value="">Select State</option>
                                         <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>   
                                       </datalist>               
                                          <div ng-if="quotepa.$submitted || quotepa.pa_state.$dirty" ng-messages="quotepa.pa_state.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select State</div>
                                         
                                       </div>
                                       
                                    </div>
                                 </div>


                                 <div class="col-md-4">
                                    <div class="form-group">
                                       
                                       <label> City <span class="required"> * </span></label>
                                       <div id="pa_city-loader" style="padding: 0 25%; display: none;">
                                       <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                    </div>
                                     <div id="pa_city-div" style="">
                                       <input list="city" placeholder="Select city" id="pa_city" name="pa_city" class="form-control input-sm" ng-model="pa_city" required>
                                       <datalist id="city">
                                          <option value="">Select city</option>
                                         
                                      </datalist>                              
                                          <div ng-if="quotepa.$submitted || quotepa.pa_city.$dirty" ng-messages="quotepa.pa_city.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select City </div>
                                         
                                       </div>
                                       </div>
                                    </div>
                                 </div>

                               <!--   <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Date of Birth
                                       <span class="required"> * </span></label>  
                                       
                                           <input type="text" id="dateofbirthpa" name="dateofbirthpa" class="form-control input-sm" placeholder="DD-MM-YYYY" ng-model="dateofbirthpa" required>                                
                                          <div ng-if="quotepa.$submitted" ng-messages="quotepa.dateofbirthpa.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your Date of Birth</div>
                                          </div>
                                       
                                    </div>
                                 </div>
                                 -->
                                 
                                 
                                  <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Mobile Number <span class="required"> * </span></label>                          
                                      <input type="text" id="pamobile" name="pamobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="pamobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>    
                                   
                                       <div ng-if="quotepa.$submitted || quotepa.pamobile.$dirty" class="required" id="mobilewar" ng-messages="quotepa.pamobile.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your Mobile Number</div>
                                          </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row maincontf">
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Occupation
                                       <span class="required"> * </span></label>
                                       <div class="radio-list">
                                           <input list="Occupation" placeholder="Select Occupation" id="occupation" name="occupation" class="form-control input-sm" ng-model="occupation" required>
                                          <datalist id="Occupation">
                                          <option value="">Select Occupation</option>
                                         <option value="5000">MANAGER/ADMINISTRATIVE</option>
                                         <option value="5001">BUSINESS OWNER</option>
                                         <option value="5002">SALESPERSON DOING FIELD VISITS</option>
                                         <option value="5003">PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)</option>
                                         <option value="5004">IT/ITES PROFESSIONAL</option>
                                         <option value="5005">BUILDER/CONTRACTOR</option>
                                         <option value="5006">MACHINE OPERATOR/MANUAL LABOR</option>
                                         <option value="5007">DRIVER (PRIVATE BUS / CAR)</option>
<!--                                          <option value="">FARMER/FACTORY WORKER(NON HARZARDOUS)</option>
                                         <option value="">ENGINEER(OFFICE DUTIES ONLY)</option>    
                                         <option value="">ARCHITECT/ARTIST/AUTHOR</option>
 -->                                       </datalist>
                                          <div ng-if="quotepa.$submitted || quotepa.occupation.$dirty" ng-messages="quotepa.occupation.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select your Occupation</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>



                              <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Annual Gainful Income(`) <span class="required"> * </span></label>
                                       <input type="text" id="gainful" name="gainful" class="form-control input-sm" placeholder="Annual Gainful Income" ng-model="gainful" required>       
                                       <div ng-if="quotepa.$submitted || quotepa.gainful.$dirty" ng-messages="quotepa.gainful.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter Annual Gainful Income</div>
                                          </div>
                                    </div>
                                 </div>
                              
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Email <span class="required"> * </span></label>                          
                                      <input type="text" id="emailpa" name="emailpa" class="form-control input-sm" placeholder="E-Mail" ng-model="emailpa" onkeyup="return email_validate(this.value);" required>  
                                       
                                       <div ng-if="quotepa.$submitted || quotepa.emailpa.$dirty" class="required" id="emailwar" ng-messages="quotepa.emailpa.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your E-mail</div>
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
                                       <!--  <button  class="btn blue btn-default" ng-click="pset()" ng-disabled="form.$invalid" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
                                       <button type="submit" class="btn blue btn-default" ng-click="pset()">Calculate Premium</button> 
                                       <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
                                       
                                      <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
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







   $("#pa_state").on('change', function() {
      
              

       var state_id = $(this).val();
       var dataString ='state_id=' + state_id;
       var webUrl = $('#web_url').val();
       var URL = webUrl+'Commoncontrol/getCityByStateID/';
         $.ajax({

               url : URL,
                type : 'POST',
                data : {
                    'state_id' : state_id},
                dataType:'json',
              
                success: function( data){
               
                  //var stateArray = JSON.parse(data);
         $('#pa_city-div').hide();      
         $('#pa_city-loader').show();
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
               $('#pa_city-div').show();      
               $('#pa_city-loader').hide();
               $('#pa_city').focus();
            }, 1500); 
                 
              
           
                   


                    // var dataArray =  JSON.stringify(data);
                    // var parsedArray = JSON.parse(dataArray);
                    // var statusResponse = parsedArray.Status;
                    // var ProspectId = parsedArray.Message.Id
                    // alert (statusResponse +' Refrence Id is : '+ ProspectId);
                    // $('#ProspectId').val(ProspectId);
                    //$( "#re-calculate" ).trigger( "click" );
                },
                // error: function( jqXhr, textStatus, errorThrown ){
                //     $('#load_modal').click();

                //     var dataArray =  JSON.stringify(jqXhr);
                //     var jsonArray = JSON.parse(dataArray);
                //     var statusResponse = JSON.parse(jsonArray.responseText).Status;
                //     var ExceptionType = JSON.parse(jsonArray.responseText).ExceptionMessage;
                //     alert(statusResponse+' - '+ExceptionType);

                // }
            });
                   


   });




</script>


