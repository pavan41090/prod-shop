<script src="<?php echo base_url(); ?>assets/js/custom_sship.js"></script>
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
                     <div class="tab-pane fade active in" id="health">
                       <div ng-controller="MainCtrl">
                           <form name="quotesship" novalidate >





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
                                   
                                      <input list="Category" placeholder="Select Category" class="form-control input-sm" name="sship_mx_Category" id="sship_mx_Category" ng-model="sship_mx_Category" required>

   <datalist id="Category"> 
                                      <option value="">Select Category</option>
                                         <?php 
                                          foreach($CategoryArray as $Category )
                                          {
                                              echo '<option value="'.$Category['name'].'"></option>';
                                          }
                                          ?>   
                                   </datalist>
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_Category.$dirty" ng-messages="quotesship.sship_mx_Category.$error" role="alert">     
                <div ng-message="required" class="required">Please Select Category</div>     
      
            </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Line of Business
                                    <span class="required"> * </span></label>                          
                                    
                                     


                                     <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="sship_mx_Line_of_Business" id="sship_mx_Line_of_Business" ng-model="sship_mx_Line_of_Business" required>

   <datalist id="Business">
                                     <option value="">Select Business</option>
                                         <?php 
                                          foreach($BusinessArray as $Business )
                                          {
                                              echo '<option value="'.$Business['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_Line_of_Business.$dirty" ng-messages="quotesship.sship_mx_Line_of_Business.$error" role="alert">
             <div ng-message="required" class="required">Please Select Line of Business</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Branch Location
                                    <span class="required"> * </span></label>  
                                 
                                      

<input list="mx_HDFC_Branch_Locations"  placeholder="Select HDFC Branch Location"  class="form-control input-sm" name="sship_mx_HDFC_Branch_Location" id="sship_mx_HDFC_Branch_Location" ng-model="sship_mx_HDFC_Branch_Location" required>
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
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_HDFC_Branch_Location.$dirty" ng-messages="quotesship.sship_mx_HDFC_Branch_Location.$error" role="alert">
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
                                   
                                      


                        <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="sship_mx_HDFC_Gi_Location" id="sship_mx_HDFC_Gi_Location" ng-model="sship_mx_HDFC_Gi_Location" required>

   <datalist id="Location">  

       <option value="">Select GiLocation</option>
                                         <?php 
                                          foreach($GiLocationArray as $GiLocation )
                                          {
                                              echo '<option value="'.$GiLocation['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_HDFC_Gi_Location.$dirty" ng-messages="quotesship.sship_mx_HDFC_Gi_Location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Bharati AXA GI Location</div>

         </div>
                                 </div>
                              </div>

                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Priority</label> 
                                   <span class="required"> * </span></label>                          
                                    
                                      

                                   <input list="Priority" placeholder="Select Priority" class="form-control input-sm" name="sship_mx_Priority" id="sship_mx_Priority" ng-model="sship_mx_Priority" required>
                                    <datalist id="Priority">
                                       <option value="Select Priority"></option>
                                       <option value="Priority_1"></option>
                                       <option value="Priority_2"></option>
                                       <option value="Priority_3"></option>
                                       <option value="Priority_4"></option>
                                   </datalist>
                           <div ng-if="quotesship.$submitted || quotesship.sship_mx_Priority.$dirty" ng-messages="quotesship.sship_mx_Priority.$error" role="alert">
             <div ng-message="required" class="required">Please Select Priority</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Target Date
                                    </label>  <span class="required"> * </span></label>
                                   
                                       <input type="text"    class="form-control input-sm"  placeholder="DD-MM-YYYY" name="sship_mx_Target_Date" id="sship_mx_Target_Date" ng-model="sship_mx_Target_Date" required>
                                       
                              <div ng-if="quotesship.$submitted " ng-messages="quotesship.sship_mx_Target_Date.$error" role="alert">
             <div ng-message="required" class="required">Please Select Date</div>

         </div>
                                   
                                    <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="sship_mx_Target_Date" id="sship_mx_Target_Date" ng-model="sship_mx_Target_Date" /> -->                 
                                 </div>
                              </div>
                           </div>
                     
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TSE/BDR Code
                                    <span class="required"> * </span></label>
                                    <input type="text" name="sship_mx_TSE_BDR_Code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="sship_mx_TSE_BDR_Code" ng-model="sship_mx_TSE_BDR_Code" required> 
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_TSE_BDR_Code.$dirty" ng-messages="quotesship.sship_mx_TSE_BDR_Code.$error" role="alert">
                                   <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
          

                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TL Code/DSA Code/Team Code</label> 
                         <span class="required"> * </span></label>                           
                                    <input type="text" name="sship_mx_TL_Code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="sship_mx_TL_Code" ng-model="sship_mx_TL_Code" required >  
                                
                         <div ng-if="quotesship.$submitted || quotesship.sship_mx_TL_Code.$dirty" ng-messages="quotesship.sship_mx_TL_Code.$error" role="alert">
             <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
          </div>
         </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>SM Code
                                    <span class="required"> * </span>
                                    </label>  
                                    <input type="text" name="sship_mx_SM_Code"  placeholder="SM Code"   class="form-control input-sm" id="sship_mx_SM_Code" ng-model="sship_mx_SM_Code" required />                 <div ng-if="quotesship.$submitted || quotesship.sship_mx_SM_Code.$dirty" ng-messages="quotesship.sship_mx_SM_Code.$error" role="alert">
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
                                    <input type="text" name="sship_mx_Bank_Verifier_ID"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="sship_mx_Bank_Verifier_ID" ng-model="sship_mx_Bank_Verifier_ID" required /> 
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_Bank_Verifier_ID.$dirty" ng-messages="quotesship.sship_mx_Bank_Verifier_ID.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Payment Type
                                    <span class="required"> * </span></label>                          
                                   
                                       

                                     <input list="Payment" class="form-control input-sm" placeholder=" Select Payment Type" name="sship_mx_Payment_Type" id="sship_mx_Payment_Type" ng-model="sship_mx_Payment_Type" required>

   <datalist id="Payment"> 
                                       <option value="">Select Payment</option>
                                         <?php 
                                          foreach($PaymentArray as $Payment )
                                          {
                                              echo '<option value="'.$Payment['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_Payment_Type.$dirty" ng-messages="quotesship.sship_mx_Payment_Type.$error" role="alert">
             <div ng-message="required" class="required">Please Select Payment Type</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Sub Channel</label>  
                           <span class="required"> * </span></label>   
                                   
                                      

                                     <input list="Sub Channel" placeholder="Select Sub Channel"   class="form-control input-sm" name="sship_mx_Sub_Channel" id="sship_mx_Sub_Channel" ng-model="sship_mx_Sub_Channel" required>
                                    <datalist id="Sub Channel">
                                       <option value="">Select Sub Channel</option>
                                       <option value="Sub_Channel 1"></option>
                                       <option value="Sub_Channel 2"></option>
                                       <option value="Sub_Channel 3"></option>
                                       <option value="Sub_Channel 4"></option>
                                    </datalist>
                           <div ng-if="quotesship.$submitted || quotesship.sship_mx_Sub_Channel.$dirty" ng-messages="quotesship.sship_mx_Sub_Channel.$error" role="alert">
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
                                    <input type="text" name="sship_mx_HDFC_Card_Relationship_No" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="sship_mx_HDFC_Card_Relationship_No" ng-model="sship_mx_HDFC_Card_Relationship_No" required />
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_HDFC_Card_Relationship_No.$dirty" ng-messages="quotesship.sship_mx_HDFC_Card_Relationship_No.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Card's Last 4 digits
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="sship_mx_HDFC_Card_Last_4_digits"  placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="sship_mx_HDFC_Card_Last_4_digits" ng-model="sship_mx_HDFC_Card_Last_4_digits"maxlength="4" onkeyup="return card_validate(this.value);" required />
                     
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_HDFC_Card_Last_4_digits.$dirty" class="required" id="cardwar" ng-messages="quotesship.sship_mx_HDFC_Card_Last_4_digits.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer First Name
                                    <span class="required"> * </span></label>  
                                    <input type="text" name="sship_FirstName"  placeholder="Customer First Name"  class="form-control input-sm" id="sship_FirstName" ng-model="sship_FirstName" required />               <div ng-if="quotesship.$submitted || quotesship.sship_FirstName.$dirty" ng-messages="quotesship.sship_FirstName.$error" role="alert">
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
                                    <input type="text" name="sship_LastName"  placeholder="Customer Last Name"   class="form-control input-sm" id="sship_LastName"  ng-model="sship_LastName" required/> 
                                    <div ng-if="quotesship.$submitted || quotesship.sship_LastName.$dirty" ng-messages="quotesship.sship_LastName.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Last Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>DOB
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="sship_mx_DOB"  placeholder="DD-MM-YYYY"  onkeyup="return dob_validate(this.value);"   class="form-control input-sm" id="sship_mx_DOB" ng-model="sship_mx_DOB" required />
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_DOB.$dirty" class="required" id="dobalert" ng-messages="quotesship.sship_mx_DOB.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Gender
                                    </label>  <span class="required"> * </span>
                                 
                                      

  <input list="Customer Gender" placeholder="Select Customer Gender"   class="form-control input-sm" name="sship_mx_Customer_Gender" id="sship_mx_Customer_Gender" ng-model="sship_mx_Customer_Gender" required>
                                    <datalist id="Customer Gender">
                                       <option value="Select Gender"></option>
                                       <option value="male"></option>
                                       <option value="female"></option>
                                    </datalist>
                            <div ng-if="quotesship.$submitted || quotesship.sship_mx_Customer_Gender.$dirty" ng-messages="quotesship.sship_mx_Customer_Gender.$error" role="alert">
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
                                    <input type="text" name="sship_mx_Case_id"  placeholder="Case id"    class="form-control input-sm" id="sship_mx_Case_id" ng-model="sship_mx_Case_id" required />
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_Case_id.$dirty" ng-messages="quotesship.sship_mx_Case_id.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Case id</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>PAN Card
                                    </label> <span class="required"> * </span>                         
                                    <input type="text" name="sship_mx_PAN_Card"  placeholder="PAN Card"   class="form-control input-sm" id="sship_mx_PAN_Card" ng-model="sship_mx_PAN_Card"   MaxLength="10" required>
                            <div ng-if="quotesship.$submitted || quotesship.sship_mx_PAN_Card.$dirty" ng-messages="quotesship.sship_mx_PAN_Card.$error" role="alert">
             <div ng-message="required" class="required">Please Enter PAN Card Num</div>
                    
         </div>   <p class="required" id="demo"></p>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 1 <span class="required"> * </span>
                                    </label>  
                                    <textarea class="form-control" placeholder="Address 1" name="sship_mx_Street1" rows="2" id="sship_mx_Street1" ng-model="sship_mx_Street1" required></textarea>              <div ng-if="quotesship.$submitted || quotesship.sship_mx_Street1.$dirty" ng-messages="quotesship.sship_mx_Street1.$error" role="alert">
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
                                    <textarea class="form-control"  placeholder="Address 2" name="sship_mx_Street2" rows="2" id="sship_mx_Street2" ng-model="sship_mx_Street2" required></textarea>
                            <div ng-if="quotesship.$submitted || quotesship.sship_mx_Street2.$dirty" ng-messages="quotesship.sship_mx_Street2.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address 2</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Area
                                    </label><span class="required"> * </span>                          
                                    <input type="text" name="sship_mx_Area"  placeholder="Area"   class="form-control input-sm" id="sship_mx_Area"  ng-model="sship_mx_Area" required>
                            <div ng-if="quotesship.$submitted || quotesship.sship_mx_Area.$dirty" ng-messages="quotesship.sship_mx_Area.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Area</div>

         </div>
                                 </div>
                              </div>
                               <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Pincode
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="sship_mx_Zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="sship_mx_Zip" ng-model="sship_mx_Zip" required >
                                    
                                    <div ng-if="quotesship.$submitted || quotesship.sship_mx_Zip.$dirty" class="required" id="post" ng-messages="quotesship.sship_mx_Zip.$error" role="alert">
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
                                    <input type="text" name="sship_Notes"  placeholder="Details of Lead "   class="form-control input-sm" id="sship_Notes" ng-model="sship_Notes" required> 
 <div ng-if="quotesship.$submitted || quotesship.sship_Notes.$dirty" ng-messages="quotesship.sship_Notes.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Details of Lead</div>

         </div>                           
                                 </div>
                              </div>

                              
                                 <div class="col-md-4">
                <div class="form-group">
                <div class="question">
       <label>Include Spouse </label><span class="required"> </span>
       <input class="Spouse_ship" type="checkbox" name="Spouse_ship" class="Spouse_ship" id="Spouse_ship" value="1" />
       
   </div>

   <div class="answer">
       
     <input type="text" id="sship_spouse" name="sship_spouse" class="form-control input-sm" placeholder="Spouse Date of Birth" ng-model="sship_spouse" >
      
   </div>
                </div>
                                    
                 
                                 </div>
                                
                               
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Include Children </label><span class="required">  </span>
                                       <div class="radio-list">
                                       <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="noofchildrens"  ng-model='noofchildrens' ng-value='1'  value="1" required> 0 </label>   
                                          <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="noofchildrens" ng-model='noofchildrens'  ng-value='2'  value="2" required> 1 </label>
                                     <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="noofchildrens" ng-model='noofchildrens'  ng-value='3'  value="3" required> 2 </label>    
                                          <label class="radio-inline" style="font-size:12px;">
                                          <input type="radio" name="noofchildrens" ng-model='noofchildrens'  ng-value='4'  value="4" required> 3 </label>        
                                                                       
                                          </div>                             
                                         
                                       
                                    </div>
                                 </div>
                                
                                 
                                 <div class="col-md-4">
                                    &nbsp;
                                 </div>
                                 
                              
                              
                              
                              
                          
                           </div>
                    
                             <!--  <div class="col-md-4">
                                 <div class="form-group">
                                    <label>E-mail <span class="required"> * </span></label>
                                    <input type="email" id="emailpa" name="emailpa" class="form-control input-sm" placeholder="E-mail" ng-model="emailpa" required> 
                                    <div ng-if="quotesship.$submitted || quotesship.emailpa.$dirty" ng-messages="quotesship.emailpa.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Valid E-mail</div>

               </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Mobile Number <span class="required"> * </span></label>
                                    <input type="text" id="mobilepa" name="mobilepa" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobilepa" required /> 
                                    <div ng-if="quotesship.$submitted || quotesship.mobilepa.$dirty" ng-messages="quotesship.mobilepa.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>

               </div>
                                 </div>
                              </div> -->
                              

                              
                              
                              <div class="row maincontf">
                              <div class="col-md-4">
                                    <div class="form-group">
                                       <label>State <span class="required"> * </span></label>
                                       <input list="state" placeholder="Select State" id="ship_mx_State" name="ship_mx_State" class="form-control input-sm" ng-model="ship_mx_State" required>
                                       <datalist id="state">
                                         <option value="">Select State</option>
                                         <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>   
                                       </datalist>                        
                                          <div ng-if="quotesship.$submitted || quotesship.ship_mx_State.$dirty" ng-messages="quotesship.ship_mx_State.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select State</div>
                                         
                                       </div>
                                       
                                    </div>
                                 </div>

                                 <div class="col-md-4">
                                    <div class="form-group">



                                        <label> City <span class="required"> * </span></label>
                                       <div id="ship_mx_City-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="ship_mx_City-div" style="">
                                             <input list="city" placeholder="Select city" id="ship_mx_City" name="ship_mx_City" class="form-control input-sm" ng-model="ship_mx_City" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                        </datalist>
                                             <div ng-if="quotesship.$submitted || quotesship.ship_mx_City.$dirty" ng-messages="quotesship.ship_mx_City.$error" role="alert">
                                          <div ng-message="required" class="required">Please Enter City</div>

                                                    </div>
                                     
                                       </div>
                                       </div>
                                    </div>
                               
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Income (P.A)
                                       <span class="required"> * </span></label>
                                       <div class="radio-list">
                                          <input type="text" id="sship_income" name="sship_income" class="form-control input-sm" placeholder="Income (P.A)" ng-model="sship_income" required /> 
                                          <div ng-if="quotesship.$submitted || quotesship.sship_income.$dirty" ng-messages="quotesship.sship_income.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your Income</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 
                                 
                              </div>
                              <div class="row maincontf">
                              
                              <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Policy Term (in Years)
                                       <span class="required"> * </span></label>  
                                       
                                           <input list="Policy_Term" placeholder=" Select Policy Term" id="policyterm" name="policyterm" class="form-control input-sm" ng-model="policyterm" required>
                                           <datalist id="Policy_Term">
                                          <option value="Select Policy Term"></option>
                                          <option value="1"></option>
                                          <option value="2"></option>
                                          <option value="3"></option>
                                       </datalist>                         
                                          <div ng-if="quotesship.$submitted" ng-messages="quotesship.policyterm.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select your Policy Term</div>
                                          </div>
                                       
                                    </div>
                                 </div>
                              
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Email <span class="required"> * </span></label>                          
                                      <input type="text" id="emailsupership" name="emailsupership" class="form-control input-sm" placeholder="E-Mail" ng-model="emailsupership" onkeyup="return email_validate(this.value);" required>   
                      <p class="required" id="emailwar"></p>
                                       <div ng-if="quotesship.$submitted || quotesship.emailsupership.$dirty" ng-messages="quotesship.emailsupership.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your E-mail</div>
                                          </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Mobile Number <span class="required"> * </span></label>                          
                                      <input type="text" id="mobilesupership" name="mobilesupership" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobilesupership"  maxlength="10" onkeyup="return mobile_validate(this.value);" required>  
                  
                                       <div ng-if="quotesship.$submitted || quotesship.mobilesupership.$dirty" class="required" id="mobilewar" ng-messages="quotesship.mobilesupership.$error" role="alert">
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
$(".answer").hide();
$(".Spouse_ship").click(function() {
    if($(this).is(":checked")) {
        $(".answer").show();
    } else {
        $(".answer").hide();
    }
});
</script>



<script>
    $("#ship_mx_State").on('change', function() {
      
              

       var state_id = $(this).val();
       var dataString ='state_id=' + state_id;
       var webUbrl = $('#web_url').val();
       var URL = webUbrl+'Commoncontrol/getCityByStateID/';
         $.ajax({

               url : URL,
                type : 'POST',
                data : {
                    'state_id' : state_id},
                dataType:'json',
              
                success: function( data){
               
                  //var stateArray = JSON.parse(data);
         $('#ship_mx_City-div').hide();      
         $('#ship_mx_City-loader').show();
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
               $('#ship_mx_City-div').show();      
               $('#ship_mx_City-loader').hide();
               $('#ship_mx_City').focus();
            }, 1500); 
                   },

                });

          });
</script>

<!-- Mobile -->



 <script>
   $(document).ready(function(){
      var date_input=$('input[name="sship_mx_Target_Date"]'); //our date input has the name "date"
      
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      date_input.datepicker({
         format: 'dd-mm-yyyy',
         container: container,
         todayHighlight: true,
         autoclose: true,
      })
   });
</script> 