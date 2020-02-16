<script src="<?php echo base_url(); ?>assets/js/custom_travel.js"></script>

                  <div class="tab-content">
                     <div class="tab-pane fade " id="car">
                        TAB 1
                     </div>
                     <div class="tab-pane fade" id="two">
                        TAB 2
                     </div>
                     <div class="tab-pane fade active in" id="travel">
                        <div ng-controller="MainCtrl">
                           <form name="quoteTravel" novalidate >
                              <div class="portlet-title tabbable-line">
                                 <div class="caption leadtit">
                                    <i class="icon-globe font-dark hide"></i>
                                    <span class="caption-subject font-dark bold uppercase">create Lead</span>
                                 </div>
                              </div>

                                 <!--start create leads-->
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Category
                                    <span class="required"> * </span></label>
                                    

                         <input list="Category" placeholder="Select Category" class="form-control input-sm" name="travel_mx_Category" id="travel_mx_Category" ng-model="travel_mx_Category" required>

   <datalist id="Category"> 
                                
                                         <option value="">Select Category</option>
                                         <?php 
                                          foreach($CategoryArray as $Category )
                                          {
                                              echo '<option value="'.$Category['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Category.$dirty" ng-messages="quoteTravel.travel_mx_Category.$error" role="alert">     
                <div ng-message="required" class="required">Please Select Category</div>     
      
            </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Line of Business
                                    <span class="required"> * </span></label>                          
                                    

 <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="travel_mx_Line_of_Business" id="travel_mx_Line_of_Business" ng-model="travel_mx_Line_of_Business" required>

   <datalist id="Business">  

                                       <option value="">Select Business</option>
                                         <?php 
                                          foreach($BusinessArray as $Business )
                                          {
                                              echo '<option value="'.$Business['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Line_of_Business.$dirty" ng-messages="quoteTravel.travel_mx_Line_of_Business.$error" role="alert">
             <div ng-message="required" class="required">Please Select Line of Business</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Branch Location
                                    <span class="required"> * </span></label>  
<!--                                     <select class="form-control input-sm" name="travel_mx_HDFC_Branch_Location" id="travel_mx_HDFC_Branch_Location" ng-model="travel_mx_HDFC_Branch_Location" required>
 -->  
                                    <input list="mx_HDFC_Branch_Locations" placeholder="Select HDFC Branch Location" class="form-control input-sm" name="travel_mx_HDFC_Branch_Location" id="travel_mx_HDFC_Branch_Location" ng-model="travel_mx_HDFC_Branch_Location" required>

  <datalist id="mx_HDFC_Branch_Locations">                                       
                                     <option value="">Select Branch Location</option>
                                         <?php 
                                          foreach($branchLocation as $blc )
                                          {
                                              echo '<option value="'.$blc.'">'.$blc.'</option>';
                                          }
                                          ?>
</datalist>                                            
<!--                                     </select>
  -->                                   <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_HDFC_Branch_Location.$dirty" ng-messages="quoteTravel.travel_mx_HDFC_Branch_Location.$error" role="alert">
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
                                   
                          <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="travel_mx_HDFC_Ergo_Location" id="travel_mx_HDFC_Ergo_Location" ng-model="travel_mx_HDFC_Ergo_Location" required>

   <datalist id="Location">     
                                      <option value="">Select GiLocation</option>
                                         <?php 
                                          foreach($GiLocationArray as $GiLocation )
                                          {
                                              echo '<option value="'.$GiLocation['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_HDFC_Ergo_Location.$dirty" ng-messages="quoteTravel.travel_mx_HDFC_Ergo_Location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Bharati AXA GI Location</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Priority</label> 
                                   <span class="required"> * </span></label>                          
                               
                                      
<input list="Priority" placeholder="Select Priority" class="form-control input-sm" name="travel_mx_Priority" id="travel_mx_Priority" ng-model="travel_mx_Priority" required>
                                    <datalist id="Priority">
                                       <option value="">Select...</option>
                                       <option value="Priority_1"></option>
                                       <option value="Priority_2"></option>
                                       <option value="Priority_3"></option>
                                       <option value="Priority_4"></option>
                                   </datalist>
                           <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Priority.$dirty" ng-messages="quoteTravel.travel_mx_Priority.$error" role="alert">
             <div ng-message="required" class="required">Please Select Priority</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Target Date
                                    </label>  <span class="required"> * </span></label>
                                    
                                       <input type="text"    class="form-control input-sm"  placeholder="DD-MM-YYYY" name="travel_mx_Target_Date" id="travel_mx_Target_Date" ng-model="travel_mx_Target_Date" required>
                                     
                              <div ng-if="quoteTravel.$submitted " ng-messages="quoteTravel.travel_mx_Target_Date.$error" role="alert">
             <div ng-message="required" class="required">Please Select Date</div>

         </div>
                                   
                                    <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="travel_mx_Target_Date" id="travel_mx_Target_Date" ng-model="travel_mx_Target_Date" /> -->                 
                                 </div>
                              </div>
                           </div>
                     
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TSE/BDR Code
                                    <span class="required"> * </span></label>
                                    <input type="text" name="travel_mx_TSE_BDR_Code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="travel_mx_TSE_BDR_Code" ng-model="travel_mx_TSE_BDR_Code" required> 
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_TSE_BDR_Code.$dirty" ng-messages="quoteTravel.travel_mx_TSE_BDR_Code.$error" role="alert">
                                   <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
          

                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TL Code/DSA Code/Team Code</label> 
                         <span class="required"> * </span></label>                           
                                    <input type="text" name="travel_mx_TL_Code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="travel_mx_TL_Code" ng-model="travel_mx_TL_Code" required >  
                                
                         <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_TL_Code.$dirty" ng-messages="quoteTravel.travel_mx_TL_Code.$error" role="alert">
             <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
          </div>
         </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>SM Code
                                    <span class="required"> * </span>
                                    </label>  
                                    <input type="text" name="travel_mx_SM_Code"  placeholder="SM Code"   class="form-control input-sm" id="travel_mx_SM_Code" ng-model="travel_mx_SM_Code" required />                 <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_SM_Code.$dirty" ng-messages="quoteTravel.travel_mx_SM_Code.$error" role="alert">
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
                                    <input type="text" name="travel_mx_Bank_Verifier_ID"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="travel_mx_Bank_Verifier_ID" ng-model="travel_mx_Bank_Verifier_ID" required /> 
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Bank_Verifier_ID.$dirty" ng-messages="quoteTravel.travel_mx_Bank_Verifier_ID.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Payment Type
                                    <span class="required"> * </span></label>                          
                                   
 <input list="Payment" class="form-control input-sm" placeholder=" Select Payment Type" name="travel_mx_Payment_Type" id="travel_mx_Payment_Type" ng-model="travel_mx_Payment_Type" required>

   <datalist id="Payment"> 

                                       <option value="">Select Payment</option>
                                         <?php 
                                          foreach($PaymentArray as $Payment )
                                          {
                                              echo '<option value="'.$Payment['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Payment_Type.$dirty" ng-messages="quoteTravel.travel_mx_Payment_Type.$error" role="alert">
             <div ng-message="required" class="required">Please Select Payment Type</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Sub Channel</label>  
                           <span class="required"> * </span></label>   
                                 
                                      
    <input list="Sub Channel" placeholder="Select Sub Channel"   class="form-control input-sm" name="travel_mx_Sub_Channel" id="travel_mx_Sub_Channel" ng-model="travel_mx_Sub_Channel" required>
                                    <datalist id="Sub Channel">
                                       <option value="">Select Sub Channel</option>
                                       <option value="Sub_Channel 1"></option>
                                       <option value="Sub_Channel 2"></option>
                                       <option value="Sub_Channel 3"></option>
                                       <option value="Sub_Channel 4"></option>
                                    </datalist>
                           <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Sub_Channel.$dirty" ng-messages="quoteTravel.travel_mx_Sub_Channel.$error" role="alert">
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
                                    <input type="text" name="travel_mx_HDFC_Card_Relationship_No" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="travel_mx_HDFC_Card_Relationship_No" ng-model="travel_mx_HDFC_Card_Relationship_No" required />
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_HDFC_Card_Relationship_No.$dirty" ng-messages="quoteTravel.travel_mx_HDFC_Card_Relationship_No.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Card's Last 4 digits
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="travel_mx_HDFC_Card_Last_4_digits"  placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="travel_mx_HDFC_Card_Last_4_digits" ng-model="travel_mx_HDFC_Card_Last_4_digits"   maxlength="4" onkeyup="return card_validate(this.value);"  required />
                                   
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_HDFC_Card_Last_4_digits.$dirty" class="required" id="cardwar" ng-messages="quoteTravel.travel_mx_HDFC_Card_Last_4_digits.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer First Name
                                    <span class="required"> * </span></label>  
                                    <input type="text" name="travel_FirstName"  placeholder="Customer First Name"  class="form-control input-sm" id="travel_FirstName" ng-model="travel_FirstName" required />               <div ng-if="quoteTravel.$submitted || quoteTravel.travel_FirstName.$dirty" ng-messages="quoteTravel.travel_FirstName.$error" role="alert">
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
                                    <input type="text" name="travel_LastName"  placeholder="Customer Last Name"   class="form-control input-sm" id="travel_LastName"  ng-model="travel_LastName" required/> 
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_LastName.$dirty" ng-messages="quoteTravel.travel_LastName.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Last Name</div>

         </div>
                                 </div>
                              </div>
                              <!-- <div class="col-md-4">
                                 <div class="form-group">
                                    <label>DOB
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="travel_mx_DOB"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="travel_mx_DOB" ng-model="travel_mx_DOB" onkeyup="return dob_validate(this.value);" required />
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_DOB.$dirty" class="required" id="dobalert" ng-messages="quoteTravel.travel_mx_DOB.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div> -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Gender
                                    </label>  <span class="required"> * </span>
                                  
                                     

                                     <input list="Customer Gender" placeholder="Select Customer Gender"   class="form-control input-sm" name="travel_mx_Customer_Gender" id="travel_mx_Customer_Gender" ng-model="travel_mx_Customer_Gender" required>
                                    <datalist id="Customer Gender">
                                       <option value="Select Gender"></option>
                                       <option value="male"></option>
                                       <option value="female"></option>
                                    </datalist>
                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Customer_Gender.$dirty" ng-messages="quoteTravel.travel_mx_Customer_Gender.$error" role="alert">
             <div ng-message="required" class="required">Please Select Customer Gender</div>

         </div>
                                 </div>
                              </div>

                               <div class="col-md-4">
                                    <div class="form-group">
                                       <label>E-mail <span class="required"> * </span></label>
                                       <input type="text" id="emailtravel" name="emailtravel" class="form-control input-sm" placeholder="E-Mail" ng-model="emailtravel"  onkeyup="return email_validate(this.value);" required> 
									   
                                       <div ng-if="quoteTravel.$submitted || quoteTravel.emailtravel.$dirty" class="required" id="emailwar" ng-messages="quoteTravel.emailtravel.$error" role="alert">
									   
                                 
                                          <div ng-message="required" class="required">Please Enter Email</div>
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
                                    <input type="text" name="health_mx_Case_id"  placeholder="Case id"    class="form-control input-sm" id="health_mx_Case_id" ng-model="health_mx_Case_id" required />
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.health_mx_Case_id.$dirty" ng-messages="quoteTravel.health_mx_Case_id.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Case id</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>PAN Card
                                    </label> <span class="required"> * </span>   
                                    <input type="text" class="form-control input-sm"  placeholder="PAN NUMBER" ID="travel_mx_PAN_Card" ng-model="travel_mx_PAN_Card" name="travel_mx_PAN_Card"   MaxLength="10"  required>
                                   <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_PAN_Card.$dirty" ng-messages="quoteTravel.travel_mx_PAN_Card.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Pan card number </div>

         </div>
                                    <p class="required" id="demo"></p>

                                   <!--  <input type="text" name="travel_mx_PAN_Card" id="travel_mx_PAN_Card " placeholder="PAN Card"   class="form-control input-sm"  ng-model="travel_mx_PAN_Card"  required ng-pattern="/^[A-Za-z]{5}\d{4}[A-Za-z]{1}$/" / >
                             <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_PAN_Card.$dirty" ng-messages="quoteTravel.travel_mx_PAN_Card.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Pan card number </div>

         </div> -->
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 1 <span class="required"> * </span>
                                    </label>  
                                    <textarea class="form-control" placeholder="Address 1" name="travel_mx_Street1" rows="2" id="travel_mx_Street1" ng-model="travel_mx_Street1" required></textarea>              <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Street1.$dirty" ng-messages="quoteTravel.travel_mx_Street1.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address1</div>

         </div>
                                 </div>
                              </div>
                           </div>
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 2
                                    </label><span class="required"> * </span>
                                    <textarea class="form-control"  placeholder="Address 2" name="travel_mx_Street2" rows="2" id="travel_mx_Street2" ng-model="travel_mx_Street2" required></textarea>
                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Street2.$dirty" ng-messages="quoteTravel.travel_mx_Street2.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address 2</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Area
                                    </label><span class="required"> * </span>                          
                                    <input type="text" name="travel_mx_Area"  placeholder="Area"   class="form-control input-sm" id="travel_mx_Area"  ng-model="travel_mx_Area" required>
                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Area.$dirty" ng-messages="quoteTravel.travel_mx_Area.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Area</div>

         </div>
                                 </div>
                              </div>
                                <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Pincode
                                    <span class="required"> * </span>
                                    </label> 
                   <input type="text" name="travel_mx_Zip"  MaxLength="6" onkeyup="postcode_validate(this.value);" placeholder="Pincode "  class="form-control input-sm" id="travel_mx_Zip" ng-model="travel_mx_Zip" required >
                     
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_Zip.$dirty" class="required" id="post" ng-messages="quoteTravel.travel_mx_Zip.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Pincode</div>

         </div>
                                 </div>
                              </div>
                             
                           </div>
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                   <label> State <span class="required"> * </span></label>
                                       <input list="state" placeholder="Select State" id="travel_mx_State" autocomplete="off" name="travel_mx_State" class="form-control input-sm" ng-model="travel_mx_State" required>
                                        <datalist id="state">
                                          <option value="">Select State</option>
                                         <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>   
                                       </datalist>    

                             <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_State.$dirty" ng-messages="quoteTravel.travel_mx_State.$error" role="alert">
             <div ng-message="required" class="required">Please Enter State</div>

         </div>
                                 </div>
                              </div>

                           <div class="col-md-4">
                                 <div class="form-group">
                                   <label> City <span class="required"> * </span></label>
                                       <div id="travel_mx_City-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="travel_mx_City-div" style="">
                                             <input list="city" placeholder="Select city" id="travel_mx_City" autocomplete="off" name="travel_mx_City" class="form-control input-sm" ng-model="travel_mx_City" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                       </datalist>   


                                           <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mx_City.$dirty" ng-messages="quoteTravel.travel_mx_City.$error" role="alert">
             <div ng-message="required" class="required">Please Enter City</div>

         </div> </div>
                                 </div>
                              </div>


                            
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Details of Lead
                                    </label>   <span class="required"> * </span>
                                    <input type="text" name="travel_Notes"  placeholder="Details of Lead "   class="form-control input-sm" id="travel_Notes" ng-model="travel_Notes" required> 
 <div ng-if="quoteTravel.$submitted || quoteTravel.travel_Notes.$dirty" ng-messages="quoteTravel.travel_Notes.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Details of Lead</div>

         </div>                           
                                 </div>
                              </div>
<br>
                               <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Mobile Number <span class="required"> * </span></label>                          
                                       <input type="text" id="mobiletravel" name="mobiletravel" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobiletravel"  MaxLength="10" onkeyup="mobile_validate(this.value);" required> 
                                                 
                                       <div ng-if="quoteTravel.$submitted || quoteTravel.mobiletravel.$dirty" class="required" id="mobilewar" ng-messages="quoteTravel.mobiletravel.$error" role="alert">
                                          <div ng-message="required" class="required">Please Enter Mobile Number</div>
                                       </div>
                                    </div>
                                 </div>
                           </div>
                  

                           






                            
                              <div class="row maincontf">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Policy Type
                                       <span class="required">  </span></label>
                                       <div class="radio-list">
                                          <label  class="radio-inline" style="font-size:12px;">
                                          <input type="radio"   name="policyType" ng-model='policyType'  ng-value="0"  value="0" required> Individual/Family </label>
                                          <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="policyType"  ng-model='policyType' ng-value="1"  value="1" required> Student </label>
                                          <div ng-if="quoteTravel.$submitted || quoteTravel.policyType.$dirty" ng-messages="quoteTravel.policyType.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select Policy Type</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Type of Trip
                                       <span class="required"> * </span></label>                          
                                       <div class="radio-list">
                                          <label class="radio-inline " style="font-size:12px;">
   <input type="radio" name="typeoftrip" ng-model='typeoftrip'  ng-value="0"  value="0" required> Single Trip </label>
                                          
                                          <label class="radio-inline" style="font-size:12px;" id="annualTrip">
   <input type="radio" name="typeoftrip"   ng-model='typeoftrip' ng-value="1"  value="1" required> Annual Multi Trip </label>                                
                                          <div ng-if="quoteTravel.$submitted || quoteTravel.typeoftrip.$dirty" ng-messages="quoteTravel.typeoftrip.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select Type of Trip</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>









            <div class="col-md-4">
               <div class="form-group">
                  <label>Cover Type <span class="required"> * </span></label>
                  <div class="radio-list">
                  <label class="radio-inline" style="font-size:12px;"  id="coverTypeFamily">
                     <input type="radio" name="covertype"  ng-model='covertype' ng-value='"0"'  value="0"> Family Floater </label>   
                     <label class="radio-inline" style="font-size:12px;" >
                     <input type="radio" name="covertype" ng-model='covertype' ng-value="1"  value="1" > Individual </label>
                                                  
                     <div ng-if="quoteTravel.$submitted || quoteTravel.covertype.$dirty" ng-messages="quoteTravel.covertype.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Cover Type</div>
                     </div>
                  </div>
               </div>
            </div>





                              </div>
                              <div class="row maincontf">


                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Depart Date
                                       <span class="required"> * </span></label>  
                                       <input type="text" id="departdate" name="departdate" class="form-control input-sm" placeholder="Depart Date" ng-model="departdate" required>
                                       <div ng-if="quoteTravel.$submitted " ng-messages="quoteTravel.departdate.$error" role="alert">
                             
                                          <div ng-message="required" class="required">Please Select Depart Date</div>
                                       </div>
                                    </div>
                                 </div>






                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Return Date <span class="required"> * </span></label>
                                       <input type="text" id="returndate" name="returndate" class="form-control input-sm" placeholder="Return Date" ng-model="returndate" required>
                                       <div ng-if="quoteTravel.$submitted " ng-messages="quoteTravel.returndate.$error" role="alert">
                                          <div ng-message="required" class="required">Please Select Return Date</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Trip Duration </label>
                                       <input type="text" id="tripduration" name="tripduration" class="form-control input-sm" placeholder="tripduration" ng-model="tripduration" />
                                       <div ng-if="quoteTravel.$submitted || quoteTravel.tripduration.$dirty" ng-messages="quoteTravel.tripduration.$error" role="alert">
                                          <div ng-message="required" class="required">Please Select Return Date</div>
                                       </div>
                                    </div>
                                 </div>

                              </div>

                              <div class="row maincontf">
                      
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Travel Type <span class="required"> * </span></label>
                                       <input list="Travel_Type" placeholder="Select Travel Type"  id="traveltype" name="traveltype" class="form-control input-sm" ng-model="traveltype" required>
                                       <datalist id="Travel_Type">
                                          <option value="Select Travel Type"></option>
                                          <option value="Non Schengen"></option>
                                          <option value="Schengen"></option>
                                   </datalist>
                                       <div ng-if="quoteTravel.$submitted || quoteTravel.traveltype.$dirty" ng-messages="quoteTravel.traveltype.$error" role="alert">
                                          <div ng-message="required" class="required">Please Select Travel Type</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Geographical Coverage <span class="required"> * </span></label>                          
                                       <input list="Geographical_Coverage" placeholder="Select  Geographical_Coverage" id="geographical" name="geographical" class="form-control input-sm" ng-model="geographical" required>
                                       <datalist id="Geographical_Coverage">
                                          <option value="Select Geographical Coverage"></option>
                                          <option value="World-wide including USA and Canada"></option>
                                          <option value="World-wide excluding USA and Canada but including Japan"></option>
                                          <option value="Asia excluding Japan"></option>
                                      </datalist>
                                       <div ng-if="quoteTravel.$submitted || quoteTravel.geographical.$dirty" ng-messages="quoteTravel.geographical.$error" role="alert">
                                          <div ng-message="required" class="required">Please Select Geographical Coverage</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    
                                      <div class="multitrips">
                                       <div class="form-group">
                                          <label>Max per trip duration </label>
                                          <div class="radio-list">
                                             <label class="radio-inline" style="font-size:12px;">
                                             <input type="radio" name="maxpertrip" ng-model='maxpertrip' checked ng-value='"thirtydays"'  value="thirtydays"> 30 Days </label>
                                             <label class="radio-inline" style="font-size:12px;">
                                             <input type="radio" name="maxpertrip"  ng-model='maxpertrip' ng-value='"fourtfivedays"'  value="fourtfivedays"> 45 Days </label>                                <label class="radio-inline" style="font-size:12px;">
                                             <input type="radio" name="maxpertrip"  ng-model='maxpertrip' ng-value='"sixtydays"'  value="sixtydays"> 60 Days </label>
                                          </div>
                                         
                                       </div>
                                    </div>


                                 </div>
                              </div>
                       
                       
                       <!-- input !-->
                      <div id="member_student"> 
                      
                              <div class="row maincontf">
                                 <div class="col-md-4">
                              <div class="form-group">
                                       <label>Relationship <span class="required"> * </span></label>
                                       <input list="Relationship" placeholder="Select Relationship" id="relationship" name="relationship" class="form-control input-sm" ng-model="relationship" required>
                                       <datalist id="Relationship">
                                          <option value="Select Relationship"></option>
                                          <option value="Self"></option>
                                       </datalist>
                                     <div ng-if="quoteTravel.$submitted || quoteTravel.relationship.$dirty" ng-messages="quoteTravel.relationship.$error" role="alert">
                                        <div ng-message="required" class="required">Please Select Relationship</div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Date Of Birth <span class="required"> * </span></label>                          
                                       <input type="text" id="date_birth" name="date_birth" class="form-control input-sm" placeholder="DD-MM-YYYY" ng-model="datebirth" required>
                                      <div ng-if="quoteTravel.$submitted " ng-messages="quoteTravel.date_birth.$error" role="alert">
                                          <div ng-message="required" class="required">Please Select Date Of Birth</div>
                                       </div>
                                    </div>
                                 </div>
                         
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label>Age </label>
                                     <input type="text" name="age" id="age" class="form-control input-sm" placeholder="age" ng-model="age"  /> 

                                    </div>
                                 </div>
                                 <div class="col-md-1">
                                    <div class="form-group">
                                       <label>&nbsp;</label>
                           
                                       
                                     <!-- <button type="reset" value="reset" class="btn blue btn-default">Clear</button>!-->
                             
                                    </div>
                                                                      </div>
                              </div>
                     
                   </div>
                             
                         
                         





<div id="member_family" style="border: 1px solid #CCC; padding: 5px 15px;"> 

   <div class="row maincontf" id="member_row_1">
      <div class="col-md-4">
   <div class="form-group">
            <label>Relationship </label>
            <input list="relation" placeholder="Select Relationship" id="relationship_1" name="relationship_1" class="form-control input-sm" ng-model="relationship_1">
            <datalist id="relation">
               <option value="">Select Relationship</option>
               <option value="Self"></option>
               <option value="spouse"></option>
               <option value="Children1"></option>
               <option value="Children2"></option>
           </datalist>
        
             
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label>Date Of Birth </label>                          
            <input type="text" id="datebirth_1"  name="datebirth_1" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="datebirth_1">
 
         </div>
      </div>

      <div class="col-md-3">
         <div class="form-group">
            <label>Age </label>
          <input type="text" name="age_1" id="age_1" class="form-control input-sm age"  placeholder="Age" ng-model="age_1" /> 
 
         </div>
      </div>

      <div class="col-md-1">
         <div class="form-group">
            <label> &nbsp;</label>
           <button id="btn_hide_1" class="clearRow btn blue btn-default"> Clear</button> 
         </div>
      </div>
   </div>




   <div class="row maincontf" id="member_row_2">
      <div class="col-md-4">
   <div class="form-group">
            <label>Relationship </label>
            <input list="relation" placeholder="Select Relationship" id="relationship_2" name="relationship_2" class="form-control input-sm" ng-model="relationship_2">
            <datalist id="relation">
               <option value="">Select Relationship</option>
               <option value="Self"></option>
               <option value="spouse"></option>
               <option value="Children1"></option>
               <option value="Children2"></option>
            </datalist>
         
            
            
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label>Date Of Birth </label>                          
            <input type="text" id="datebirth_2" name="datebirth_2" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="datebirth_2">
    
         </div>
      </div>

      <div class="col-md-3">
         <div class="form-group">
            <label>Age </label>
          <input type="text" name="age_2" id="age_2" class="form-control input-sm age" placeholder="Age" ng-model="age_2" /> 
         
         </div>
      </div>

      <div class="col-md-1">
         <div class="form-group">
            <label> &nbsp;</label>
           <button id="btn_hide_2" class="clearRow btn blue btn-default"> Clear</button> 
         </div>
      </div>
   </div>




   <div class="row maincontf" id="member_row_3">
      <div class="col-md-4">
   <div class="form-group">
            <label>Relationship </label>
            <input list="relation" placeholder="Select Relationship" id="relationship_3" name="relationship_3" class="form-control input-sm" ng-model="relationship_3">
            <datalist id="relation">
               <option value="">Select Relationship</option>
               <option value="Self"></option>
               <option value="spouse"></option>
               <option value="Children1"></option>
               <option value="Children2"></option>
            </datalist>
         
     
         </div>
      </div>
      <div class="col-md-4">
         <div class="form-group">
            <label>Date Of Birth</label>                          
            <input type="text" id="datebirth_3" name="datebirth_3" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="datebirth_3">
   
         </div>
      </div>

      <div class="col-md-3">
         <div class="form-group">
            <label>Age </label>
          <input type="text" name="age_3" id="age_3" class="form-control input-sm age" placeholder="Age" ng-model="age_3" /> 

         </div>
      </div>

      <div class="col-md-1">
         <div class="form-group">
            <label> &nbsp;</label>
           <button id="btn_hide_3" class="clearRow btn blue btn-default"> Clear</button> 
         </div>
      </div>
   </div>

</div>








                         
                              <div class="row maincontf">
                       
                                
                        
                                
                                 
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
                                             <button type="button" class="btn btn-default" id="closeModel" data-dismiss="modal">Close</button>
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
                           <button type="reset" value="reset"  id="reset" class="btn blue btn-default">Reset</button>
                                       
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
     //$('.multitrips').toggle(+this.value === 1 && this.checked);
      var value = $(this).val();
      if(value == 0) {
          $('.multitrips').hide();
      } else {
         $('.multitrips').show();
      }   


   }).change();
</script>
<script> 
   $('input[name="policyType"]').on('click', function() {
    // $('#annualTrip').toggle(+this.value === A && this.checked);
     //  alert('checked');
      var value = $(this).val();
      if(value == 1) {
         $('#annualTrip').hide();  
         $('#coverTypeFamily').hide();  

      } else {
         $('#annualTrip').show();  
         $('#coverTypeFamily  ').show();  

      }
     //annualTrip
   }).change();
   
</script>
<script> 
   // $('input[name="policyType"]').on('click', function() {
   //    var value = $(this).val();
   //    if(value == 1) {
   //       $('#covertype').hide();  
   //    } else {
   //       $('#covertype').show();  
   //    }
     
   // }).change();
   
</script>


<script> 
   $('input[name="policyType"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('.multitrips').hide();
         $('#member_family').hide();  
        // $('#member_student').show();  
      } else {
         $('.multitrips').show();
         $('#member_family').show();  
         // $('#member_student').hide();
      }
     
   }).change();



   
</script>
<script>
  function add_fields() {
   var d = document.getElementById("content");
   d.innerHTML += "<ul ><input type='text'style='width:48px; margin-right:5px;'value='' /><select><option>Test1</option></select> <button onclick='add_fields();'>+</button><button onclick='minus_fields(this);'>-</ul>  ";
 }
  function minus_fields(a) { 
  var value = a.parentElement;
   value.remove(a);
}
</script>

<script>

$('#departdate').change(function() {
   updateDuration();
})

$('#returndate').change(function() {
   updateDuration();
})


$('#date_birth').change(function(){
   $('#age').val('');
   var date2 = $('#date_birth').val();
   var age = calculateAge(date2);
   if(isNaN(age)) {
      alert('Date of birth should be in DD-MM-YYYY');
      $('#date_birth').focus();
      return false;
   } else {
      $('#age').val(age);
   }
});


function calculateAge(date2){

   var today = new Date();
   var dd = today.getDate();
   var mm = today.getMonth()+1; //January is 0!
   var yyyy = today.getFullYear();
   if(dd<10){
       dd='0'+dd;
   } 
   if(mm<10){
       mm='0'+mm;
   } 
   var today = dd+'-'+mm+'-'+yyyy;
   today = new Date(today.split('-')[2],today.split('-')[1]-1,today.split('-')[0]);
   date2 = new Date(date2.split('-')[2],date2.split('-')[1]-1,date2.split('-')[0]);
   var timeDiff = Math.abs(date2.getTime() - today.getTime());
   var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24)); 
   var months = Math.floor(diffDays/31);
   var years = Math.floor(months/12);
   return years;
}

function updateDuration(){
   var today = $('#departdate').val();
   var date2 = $('#returndate').val();
   
   today = new Date(today.split('-')[2],today.split('-')[1]-1,today.split('-')[0]);
   date2 = new Date(date2.split('-')[2],date2.split('-')[1]-1,date2.split('-')[0]);
   var timeDiff = Math.abs(date2.getTime() - today.getTime());
   var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
   if(diffDays > 0)
      $("#tripduration").val(diffDays); 

}


$('.clearRow').on('click', function() {
  
   var selectRow = this.id;
   var rowId = selectRow[selectRow.length -1];
 
  $('#relationship_'+rowId).val('');
  $('#datebirth_'+rowId).val('');
  $('#age_'+rowId).val('');

   return false;
});   


$('.datebirth').on('change',function(){
   var selectRow = this.id;
   var rowId = selectRow[selectRow.length -1];
   var date2 = $('#datebirth_'+rowId).val();
    $('#age_'+rowId).val('');
   var age = calculateAge(date2);
   //$('#age_'+rowId).val(age);
    if(isNaN(age)) {
      alert('Date of birth should be in DD-MM-YYYY');
      $('#datebirth_'+rowId).focus();
      return false;
   } else {
      $('#age_'+rowId).val(age);
   }

});


</script>

<script>
// function ValidatePAN() { 
  
//    var x, text;
//    var Obj = document.getElementById("travel_mx_PAN_Card");
//       if (Obj.value != "") {
//          ObjVal = Obj.value;
//          var panPat = /^([a-zA-Z]{5})(\d{4})([a-zA-Z]{1})$/;
//          if (ObjVal.search(panPat) == -1) {
//             text = "Please enter a valid Pan Number";    
//          } else {
//             text="";
//          }
//          document.getElementById("demo").innerHTML = text;
//       }
//   } 





</script>
<script>
    $("#travel_mx_State").on('change', function() {
      
              
              

       var state_id = $(this).val();
       var dataString ='state_id=' + state_id;
       var webUrl = $('#web_url').val()
       var URL = webUrl+'Commoncontrol/getCityByStateID/';
         $.ajax({

               url : URL,
                type : 'POST',
                data : {
                    'state_id' : state_id},
                dataType:'json',
              
                success: function( data){
               
                  //var stateArray = JSON.parse(data);
         $('#travel_mx_City-div').hide();      
         $('#travel_mx_City-loader').show();
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
               $('#travel_mx_City-div').show();      
               $('#travel_mx_City-loader').hide();
               $('#travel_mx_City').focus();
            }, 1500); 
                   },

                });

          });
</script>



</body>
</html>