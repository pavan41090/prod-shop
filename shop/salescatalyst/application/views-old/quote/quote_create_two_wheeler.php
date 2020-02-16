<script src="<?php echo base_url(); ?>assets/js/custom_tw.js"></script>

                    <div class="tab-content">
                     <div class="tab-pane fade " id="car">
                       TAB 1
                     </div>
					 
                    <div class="tab-pane fade active in" id="two">
                        <div ng-controller="MainCtrl">
                           <form name="quoteTwo" novalidate >



                           <div class="portlet-title tabbable-line">
                              <div class="caption leadtit">
                                 <i class="icon-globe font-dark hide"></i>
                                 <span class="caption-subject font-dark bold uppercase">create Lead</span>
                              </div>
                           </div>






<div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Category
                                    <span class="required"> * </span></label>
                                   
                                <input list="Category" placeholder="Select Category" class="form-control input-sm" name="tw_mx_Category" id="tw_mx_Category" ng-model="tw_mx_Category" required>

   <datalist id="Category"> 
                                      <option value="">Select Category</option>
                                         <?php 
                                          foreach($CategoryArray as $Category )
                                          {
                                              echo '<option value="'.$Category['name'].'">'.$Category['name'].'</option>';
                                          }
                                          ?>   
                                   </datalist>
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Category.$dirty" ng-messages="quoteTwo.tw_mx_Category.$error" role="alert">    
                <div ng-message="required" class="required">Please Select Category</div>     
      
            </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Line of Business
                                    <span class="required"> * </span></label>                          
                                   
                       <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="tw_mx_Line_of_Business" id="tw_mx_Line_of_Business" ng-model="tw_mx_Line_of_Business" required>

   <datalist id="Business">      
                                      <option value="">Select Business</option>
                                         <?php 
                                          foreach($BusinessArray as $Business )
                                          {
                                              echo '<option value="'.$Business['name'].'">'.$Business['name'].'</option>';
                                          }
                                          ?>   
                                   </datalist>
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Line_of_Business.$dirty" ng-messages="quoteTwo.tw_mx_Line_of_Business.$error" role="alert">
             <div ng-message="required" class="required">Please Select Line of Business</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Branch Location
                                    <span class="required"> * </span></label>  
<!--                                     <select class="form-control input-sm" name="tw_mx_HDFC_Branch_Location" id="tw_mx_HDFC_Branch_Location" ng-model="tw_mx_HDFC_Branch_Location" required>

 -->
          <input list="mx_HDFC_Branch_Locations" placeholder="Select HDFC Branch Location" class="form-control input-sm" name="tw_mx_HDFC_Branch_Location" id="tw_mx_HDFC_Branch_Location" ng-model="tw_mx_HDFC_Branch_Location" required>

   <datalist id="mx_HDFC_Branch_Locations">                                      
                                     <option value="">Select Branch Location</option>
                                         <?php 
                                          foreach($branchLocation as $blc )
                                          {
                                              echo '<option value="'.$blc.'">'.$blc.'</option>';
                                          }
                                          ?>  
</datalist>                                          
                                   
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_HDFC_Branch_Location.$dirty" ng-messages="quoteTwo.tw_mx_HDFC_Branch_Location.$error" role="alert">
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
                                   

                                      <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="tw_mx_HDFC_Ergo_Location" id="tw_mx_HDFC_Ergo_Location" ng-model="tw_mx_HDFC_Ergo_Location" required>

   <datalist id="Location">              
                                        <option value="">Select GI Location</option>
                                         <?php 
                                          foreach($GiLocationArray as $GiLocation )
                                          {
                                              echo '<option value="'.$GiLocation['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_HDFC_Ergo_Location.$dirty" ng-messages="quoteTwo.tw_mx_HDFC_Ergo_Location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Bharati AXA GI Location</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Priority</label> 
                                   <span class="required"> * </span></label>                          
                                    <input list="Priority" placeholder="Select Priority" class="form-control input-sm" name="tw_mx_Priority" id="tw_mx_Priority" ng-model="tw_mx_Priority" required>
                                    <datalist id="Priority">
                                       <option value="">Select...</option>
                                       <option value="Priority_1"></option>
                                       <option value="Priority_2"></option>
                                       <option value="Priority_3"></option>
                                       <option value="Priority_4"></option>
                                   </datalist>
                           <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Priority.$dirty" ng-messages="quoteTwo.tw_mx_Priority.$error" role="alert">
             <div ng-message="required" class="required">Please Select Priority</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Target Date
                                    </label>  <span class="required"> * </span></label>
                                       <input type="text"    class="form-control input-sm"  placeholder="DD-MM-YYYY" name="tw_mx_Target_Date" id="tw_mx_Target_Date" ng-model="tw_mx_Target_Date" required>
 
                              <div ng-if="quoteTwo.$submitted" ng-messages="quoteTwo.tw_mx_Target_Date.$error" role="alert">
             <div ng-message="required" class="required">Please Select Date</div>

         </div>
                                   
                                    <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="tw_mx_Target_Date" id="tw_mx_Target_Date" ng-model="tw_mx_Target_Date" /> -->                 
                                 </div>
                              </div>
                           </div>
                     
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TSE/BDR Code
                                    <span class="required"> * </span></label>
                                    <input type="text" name="tw_mx_TSE_BDR_Code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="tw_mx_TSE_BDR_Code" ng-model="tw_mx_TSE_BDR_Code" required> 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_TSE_BDR_Code.$dirty" ng-messages="quoteTwo.tw_mx_TSE_BDR_Code.$error" role="alert">
                                   <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
          

                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TL Code/DSA Code/Team Code</label> 
                         <span class="required"> * </span></label>                           
                                    <input type="text" name="tw_mx_TL_Code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="tw_mx_TL_Code" ng-model="tw_mx_TL_Code" required >  
                                
                         <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_TL_Code.$dirty" ng-messages="quoteTwo.tw_mx_TL_Code.$error" role="alert">
             <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
          </div>
         </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>SM Code
                                    <span class="required"> * </span>
                                    </label>  
                                    <input type="text" name="tw_mx_SM_Code"  placeholder="SM Code"   class="form-control input-sm" id="tw_mx_SM_Code" ng-model="tw_mx_SM_Code" required />                 <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_SM_Code.$dirty" ng-messages="quoteTwo.tw_mx_SM_Code.$error" role="alert">
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
                                    <input type="text" name="tw_mx_Bank_Verifier_ID"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="tw_mx_Bank_Verifier_ID" ng-model="tw_mx_Bank_Verifier_ID" required /> 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Bank_Verifier_ID.$dirty" ng-messages="quoteTwo.tw_mx_Bank_Verifier_ID.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Payment Type
                                    <span class="required"> * </span></label>                          
                                   

                             <input list="Payment" class="form-control input-sm" placeholder=" Select Payment Type" name="tw_mx_Payment_Type" id="tw_mx_Payment_Type" ng-model="tw_mx_Payment_Type" required>

   <datalist id="Payment">  
                                      <option value="">Select Payment Type</option>
                                         <?php 
                                          foreach($PaymentArray as $Payment )
                                          {
                                              echo '<option value="'.$Payment['name'].'">'.$Payment['name'].'</option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Payment_Type.$dirty" ng-messages="quoteTwo.tw_mx_Payment_Type.$error" role="alert">
             <div ng-message="required" class="required">Please Select Payment Type</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Sub Channel</label>  
                           <span class="required"> * </span></label>   
                                
                                      <input list="Sub Channel" placeholder="Select Sub Channel"   class="form-control input-sm" name="tw_mx_Sub_Channel" id="tw_mx_Sub_Channel" ng-model="tw_mx_Sub_Channel" required>
                                    <datalist id="Sub Channel">
                                       <option value="">Select Sub Channel</option>
                                       <option value="Sub_Channel 1"></option>
                                       <option value="Sub_Channel 2"></option>
                                       <option value="Sub_Channel 3"></option>
                                       <option value="Sub_Channel 4"></option>
                                    </datalist>
                           <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Sub_Channel.$dirty" ng-messages="quoteTwo.tw_mx_Sub_Channel.$error" role="alert">
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
                                    <input type="text" name="tw_mx_HDFC_Card_Relationship_No" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="tw_mx_HDFC_Card_Relationship_No" ng-model="tw_mx_HDFC_Card_Relationship_No" required />
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_HDFC_Card_Relationship_No.$dirty" ng-messages="quoteTwo.tw_mx_HDFC_Card_Relationship_No.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Card's Last 4 digits
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="tw_mx_HDFC_Card_Last_4_digits"  placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="tw_mx_HDFC_Card_Last_4_digits" ng-model="tw_mx_HDFC_Card_Last_4_digits"  maxlength="4" onkeyup="return card_validate(this.value);" required />
                                    
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_HDFC_Card_Last_4_digits.$dirty" class="required" id="cardwar" ng-messages="quoteTwo.tw_mx_HDFC_Card_Last_4_digits.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer First Name
                                    <span class="required"> * </span></label>  
                                    <input type="text" name="tw_FirstName"  placeholder="Customer First Name"  class="form-control input-sm" id="tw_FirstName" ng-model="tw_FirstName" required />               <div ng-if="quoteTwo.$submitted || quoteTwo.tw_FirstName.$dirty" ng-messages="quoteTwo.tw_FirstName.$error" role="alert">
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
                                    <input type="text" name="tw_LastName"  placeholder="Customer Last Name"   class="form-control input-sm" id="tw_LastName"  ng-model="tw_LastName" required/> 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_LastName.$dirty" ng-messages="quoteTwo.tw_LastName.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Last Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>DOB
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="tx_dob"  placeholder="DD-MM-YYYY" class="form-control input-sm" id="tx_dob" ng-model="tx_dob" onkeyup="return dob_validate(this.value);"   required />
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tx_dob.$dirty" class="required" id="dobalert" ng-messages="quoteTwo.tx_dob.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Gender
                                    </label>  <span class="required"> * </span>
                                

                                     <input list="Customer Gender" placeholder="Select Customer Gender"   class="form-control input-sm" name="tw_mx_Customer_Gender" id="tw_mx_Customer_Gender" ng-model="tw_mx_Customer_Gender" required>
                                    <datalist id="Customer Gender">
                                       <option value="Select Gender"></option>
                                       <option value="male"></option>
                                       <option value="female"></option>
                                    </datalist>
                            <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Customer_Gender.$dirty" ng-messages="quoteTwo.tw_mx_Customer_Gender.$error" role="alert">
             <div ng-message="required" class="required">Please Select Gender</div>

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
                                    <input type="text" name="tw_mx_Case_id"  placeholder="Case id"    class="form-control input-sm" id="tw_mx_Case_id" ng-model="tw_mx_Case_id" required />
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Case_id.$dirty" ng-messages="quoteTwo.tw_mx_Case_id.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Case id</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>PAN Card
                                    </label> <span class="required"> * </span>                         
                                   <input type="text" class="form-control input-sm"  placeholder="PAN NUMBER" ID="tw_mx_PAN_Card" ng-model="tw_mx_PAN_Card" name="tw_mx_PAN_Card"   MaxLength="10"  required>
                            <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_PAN_Card.$dirty" ng-messages="quoteTwo.tw_mx_PAN_Card.$error" role="alert">
             <div ng-message="required" class="required">Please Enter PAN Card Number</div>
                    
         </div>   <p class="required" id="demo"></p>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 1 <span class="required"> * </span>
                                    </label>  
                                    <textarea class="form-control" placeholder="Address 1" name="tw_mx_Street1" rows="2" id="tw_mx_Street1" ng-model="tw_mx_Street1" required></textarea>              <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Street1.$dirty" ng-messages="quoteTwo.tw_mx_Street1.$error" role="alert">
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
                                    <textarea class="form-control"  placeholder="Address 2" name="tw_mx_Street2" rows="2" id="tw_mx_Street2" ng-model="tw_mx_Street2" required></textarea>
                            <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Street2.$dirty" ng-messages="quoteTwo.tw_mx_Street2.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address 2</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Area
                                    </label><span class="required"> * </span>                          
                                    <input type="text" name="tw_mx_Area"  placeholder="Area"   class="form-control input-sm" id="tw_mx_Area"  ng-model="tw_mx_Area" required>
                            <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Area.$dirty" ng-messages="quoteTwo.tw_mx_Area.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Area</div>

         </div>
                                 </div>
                              </div>

                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Pincode
                                    <span class="required"> * </span>
                                    </label>                          
                                     <input type="text" name="tw_mx_Zip"  MaxLength="6" onkeyup="postcode_validate(this.value);" placeholder="Pincode "  class="form-control input-sm" id="tw_mx_Zip" ng-model="tw_mx_Zip" required >
                 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_Zip.$dirty" class="required" id="post" ng-messages="quoteTwo.tw_mx_Zip.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Pincode</div>

         </div>
                                 </div>
                              </div>
                           
                           </div>
                     <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label> State <span class="required"> * </span></label>
                                <input list="state" placeholder="Select State" autocomplete="off" id="tw_mx_State" name="tw_mx_State" class="form-control input-sm" ng-model="tw_mx_State" required>
                                <datalist id="state">
                                          <option value="">Select State</option>
                                         <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>   
                                       </datalist>
                             <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_State.$dirty" ng-messages="quoteTwo.tw_mx_State.$error" role="alert">
             <div ng-message="required" class="required">Please Enter State</div>

         </div>
                                 </div>
                              </div>

                                 <div class="col-md-4">
                                 <div class="form-group">
                                  <label> City <span class="required"> * </span></label>
                                       <div id="tw_mx_City-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="tw_mx_City-div" style="">
                                             <input list="city" autocomplete="off" placeholder="Select city" id="tw_mx_City" name="tw_mx_City" class="form-control input-sm" ng-model="tw_mx_City" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                     </datalist>               

                           <div ng-if="quoteTwo.$submitted || quoteTwo.tw_mx_City.$dirty" ng-messages="quoteTwo.tw_mx_City.$error" role="alert">
             <div ng-message="required" class="required">Please Enter City</div>

         </div></div>
                                 </div>
                              </div>
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Details of Lead
                                    </label>   <span class="required"> * </span>
                                    <input type="text" name="tw_Notes"  placeholder="Details of Lead "   class="form-control input-sm" id="tw_Notes" ng-model="tw_Notes" required> 
 <div ng-if="quoteTwo.$submitted || quoteTwo.tw_Notes.$dirty" ng-messages="quoteTwo.tw_Notes.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Details of Lead</div>

         </div>                           
                                 </div>
                              </div>
                           </div>
                     <div class="row maincontf">
                            <!--   <div class="col-md-4">
                                 <div class="form-group">
                                    <label>E-mail <span class="required"> * </span></label>
                                    <input type="email" id="emailtwo" name="emailtwo" class="form-control input-sm" placeholder="E-mail" ng-model="emailtwo" required> 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.emailtwo.$dirty" ng-messages="quoteTwo.emailtwo.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Valid E-mail</div>

               </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Mobile Number <span class="required"> * </span></label>
                                    <input type="text" id="mobiletwo" name="mobiletwo" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobiletwo" required /> 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.mobiletwo.$dirty" ng-messages="quoteTwo.mobiletwo.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>

               </div>
                                 </div>
                              </div> -->
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Type <span class="required"> * </span></label>                          
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="policytypetwo" ng-model='policytypetwo' ng-value="0" value="0" required> Corporate </label>
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="policytypetwo" ng-model='policytypetwo' ng-value="1" value="1" required> Individual </label>
                                <div ng-if="quoteTwo.$submitted || quoteTwo.policytypetwo.$dirty" ng-messages="quoteTwo.policytypetwo.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Type</div>

               </div>
                                    </div>
                                 </div>
                              </div>
                           </div><br>
                     <!--End crate leads-->




















                          
                         
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Registration Number
                                    <span class="required"> * </span></label>
                                    <input type="text" id="tworegistrationnumber" name="tworegistrationnumber" class="form-control input-sm" placeholder="Registration Number" ng-model="tworegistrationnumber" required />
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.tworegistrationnumber.$dirty" ng-messages="quoteTwo.tworegistrationnumber.$error" role="alert">		
	             <div ng-message="required" class="required">Please Enter Registration Number</div>		
		
	         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Year of manufacture
                                    <span class="required"> * </span></label>                          
                                  

                                     <input list="Year of manufacture" placeholder="Year of manufacture" name="footwo" id="footwo" class="form-control input-sm" ng-model="footwo" required>
                                    <datalist id="Year of manufacture">
                                       <option value="">Year of manufacture</option>
                                       <?php 
                                          $now = date('Y');
                                          $then = $now - 9;
                                          
                                          // THEN USE WITH THIS //
                                          $years = range( $now, $then );
                                          
                                          foreach( $years as $v ) {
                                             echo "<option value=".$v.">".$v."</option>";
                                          }
                                          ?>
                                    </datalist>
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.footwo.$dirty" ng-messages="quoteTwo.footwo.$error" role="alert">		
	             <div ng-message="required" class="required">Please Select Year of manufacture</div>		
		
	         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Manufacturer
                                    <span class="required"> * </span></label>  
                                    <?php ?>
                                    

                                     <input list="Manufacturer" placeholder="Select Manufacturer" id="manufacturertwo" name="manufacturertwo" class="form-control input-sm" ng-model="manufacturertwo" required>
                                    <datalist id="Manufacturer">
                                       <option value="">Select Manufaturer</option>
                                       <?php echo $carbrandArray; ?>
                                       <?php foreach($carbrandArray as $carbrand) {
                                          echo '<option value="'.$carbrand.'">'.$carbrand.'</option>';
                                          } 
                                          ?>
                                    </datalist>
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.manufacturertwo.$dirty" ng-messages="quoteTwo.manufacturertwo.$error" role="alert">		
	             <div ng-message="required" class="required">Please Select Manufacturer</div>		
		
	         </div>
                                 </div>
                              </div>
                           </div>

							<div class="row maincontf">
							   <div class="col-md-4">
								  <div class="form-group">
									 <label>Model Varient <span class="required"> * </span></label>
									 <div id="carvariant-loader" style="padding: 0 25%; display: none;">
										<img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
									 </div>
									 <div id="carvariant-div" style="">
										<input list="tw_vary" placeholder="Select model variants" id="carvariant" name="carvariant" class="form-control input-sm" ng-model="carvariant" required>
                    <datalist id="tw_vary"?>

										   <option value="">Select model variants</option>
									</datalist>                                        <div ng-if="quoteTwo.$submitted || quoteTwo.carvariant.$dirty" ng-messages="quoteTwo.carvariant.$error" role="alert">		
	             <div ng-message="required" class="required">Please Select Model Varient</div>		
		
	         </div>
									 </div>
								  </div>
							   </div>
                               <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Mobile Number <span class="required"> * </span></label>
                                    <input type="text" id="mobiletwo" name="mobiletwo" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobiletwo" MaxLength="10" onkeyup="return mobile_validate(this.value);" required /> 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.mobiletwo.$dirty" class="required" id="mobilewar" ng-messages="quoteTwo.mobiletwo.$error" role="alert">		
	             <div ng-message="required" class="required">Please Enter Mobile Number</div>		
		
	         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>E-mail <span class="required"> * </span></label>
                                    <input type="email" id="emailtwo" name="emailtwo" class="form-control input-sm" placeholder="E-mail" ng-model="emailtwo" onkeyup="return email_validate(this.value);"  required /> 
                                  
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.emailtwo.$dirty" class="required" id="emailwar" ng-messages="quoteTwo.emailtwo.$error" role="alert">		
	             <div ng-message="required" class="required">Please Enter E-mail</div>		
		
	         </div>
                                 </div>
                              </div>
							</div>   



                           <div class="row maincontf">
                              
                              
                              <div class="col-md-4">
                                 <div class="form-group">
                            <label>City of Registration <span class="required"> * </span></label>
                                 
                                      

                                   <input list="cityofreg" placeholder="City of Registration" id="twocity" name="twocity" class="form-control input-sm" ng-model="twocity" required>
                                    <datalist id="cityofreg">
                                       <option value="Select City"></option>
                                       <?php 
                                          foreach($city as $cval )
                                          {
                                              echo '<option value="'.$cval.'">'.$cval.'</option>';
                                          }
                                          ?>                                       
                                   </datalist>
                                   <div ng-if="quoteTwo.$submitted || quoteTwo.twocity.$dirty" ng-messages="quoteTwo.twocity.$error" role="alert">		
	             <div ng-message="required" class="required">Please Select City of Registration</div>		
		<input type="hidden" name="car_state" id="car_state" ng-model='car_state'>
	         </div> 
                             </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Client Type <span class="required"> * </span></label>                          
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:12px;">
<input type="radio" name="clientType" ng-model='clientType' checked ng-value='"Individual"'  value="individual" required> Individual </label>
                                       <label class="radio-inline" style="font-size:12px;">
            <input type="radio" name="clientType"  ng-model='clientType' ng-value='"Corporate"'  value="corporate" required> Corporate </label>                                
                                    </div> 
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.clientType.$dirty" ng-messages="quoteTwo.clientType.$error" role="alert">		
	             <div ng-message="required" class="required">Please Select Client Type</div>		
		
	         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Claim in Expiry Policy <span class="required"> * </span></label>                          
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:12px;">
                                       <input type="radio" name="claimtwo" ng-model='claimtwo' checked ng-value='"0"'  value="0"  required> Yes </label>
                                       <label class="radio-inline" style="font-size:12px;">
                                       <input type="radio" name="claimtwo"  ng-model='claimtwo' ng-value='"1"'  value="1" required> No </label>                                
                                    </div>
                                    <div ng-if="quoteTwo.$submitted || quoteTwo.claimtwo.$dirty" ng-messages="quoteTwo.claimtwo.$error" role="alert">		
	             <div ng-message="required" class="required">Please Select Claim in Expiry Policy</div>		
		
	         </div>                  
                                 </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                  <div id="value_disable">
                                     <label>NCB in Expiring policy (%) </label>  
                                    <input list="ncb" placeholder="NCB in Expiring policy" name="ncbtwo" class="form-control input-sm" id="ncbtwo" ng-model="ncbtwo">
                                    <datalist id="ncb">
                                       <option value="">NCB in Expiring policy</option>
                                       <option value="0"></option>
                                       <option value="20"></option>
                                       <option value="25"></option>
                                       <option value="35"></option>
                                       <option value="45"></option>
                                       <option value="55"></option>
                                       <option value="65"></option>
                                   </datalist>
                                  </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Tenure
                                    <span class="required"> * </span></label>                          
                                    <input list="tenure" placeholder="Select Tenure" class="form-control input-sm" name="mx_tenure" id="mx_tenure" ng-model="mx_tenure">
                                    <datalist id="tenure">
                                       <option value="">Select Tenure</option>
                                       <option>1 year</option>
                                       <option>2 year</option>
                                       <option>3 year</option>
                                       
                                   </datalist>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>IDV <span class="required"> * </span></label>
                                    <input type="hidden" id="caractualamount" name="caractualamount" />
                                    <input type="hidden" id="caramount" name="caramount" class="form-control input-sm" placeholder="" ng-model="caramount"/>
                                    <input type="text" id="idvamount" name="idvamount" ng-model="idvamount" ng-model="idvamount" class="form-control input-sm" placeholder="IDV Amount"/>
                                 </div>
                                 <div class="slider-wrapper">
                                    <input type="text" class="js-decimal" />
                                    <label class="display-box-label"></label><br />
                                    <div id="js-display-decimal" class="display-box"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Previous Policy Available <span class="required"> * </span></label>                          
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:12px;">
                                       <input type="radio" name="expiringtwo" ng-model='expiringtwo' ng-value='"0"'  value="0" checked> No </label>
                                       <label class="radio-inline" style="font-size:12px;">
                                       <input type="radio" name="expiringtwo"  ng-model='expiringtwo' ng-value='"1"'  value="1"> Yes </label>                                
                                    </div>
                                 </div>
                              </div>
                              <div class="business-fields">
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <label>Policy Start Date <span class="required"> * </span></label>  
                                    <input type="text" id="startdatetwo" name="startdatetwo" class="form-control input-sm" placeholder="Policy End Date" ng-model="startdatetwo">
                                 </div>
                              </div>
                             <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Policy End Date
                                    <span class="required"> * </span></label>                          
                                    <input type="text" id="enddatetwo" name="enddatetwo" class="form-control input-sm" placeholder="Policy End Date" ng-model="enddatetwo">
                                 </div>
                              </div>
                              </div> 
                           </div>
                           <!--<div class="row maincontf business-fields">
                              <div class="col-md-4">
                                 <div class="form-group">
                                     <label>Policy Start Date <span class="required"> * </span></label>  
                                    <input type="text" id="startdatetwo" name="startdatetwo" class="form-control input-sm" placeholder="Policy End Date" ng-model="startdatetwo">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Policy End Date
                                    <span class="required"> * </span></label>                          
                                    <input type="text" id="enddatetwo" name="enddatetwo" class="form-control input-sm" placeholder="Policy End Date" ng-model="enddatetwo">
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    
                                 </div>
                              </div>
                           </div>-->
                           
                           
                           
                           
                           
                           <!--<div>
                              <div class="form-group">
                                 <div class="col-md-12">
                                    <div class="checkbox-list" data-error-container="#form_2_services_error">
                                       <label>
                                       <input type="checkbox" value="1" name="service" /> I hereby declare that the customer has a HDFC Bank relationship </label>
                                       <label>
                                       <input type="checkbox" value="2" name="service" /> Premium Payment has not been done through cash mode </label>
                                       <label>
                                    </div>
                                    <div id="form_2_services_error"> </div>
                                 </div>
                              </div>
                           </div>-->
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
                     <div class="tab-pane fade" id="health">
                        <p>TAB3</p>
                     </div>
                     
                  </div>
                </div>
            </div>  
        </div> 
    </div>           	





    </div>
</div>      	
<script>
// select the relevant <input> elements, and using on() to bind a change event-handler:
$('input[name="expiringtwo"]').on('change', function() {
   $('.business-fields').toggle(+this.value === 1 && this.checked);
}).change();






   jQuery(document).ready(function() { 
 
      
      loadIdvValueSlider(0,0,0); 
      

      var dt = new Date();
      var currentyear = dt.getFullYear();
          
      var carbrandString = JSON.stringify(<?php echo json_encode($carbrandArray); ?>);
      var carmodelVariantsString = JSON.stringify(<?php echo json_encode($carbrandVariants); ?>);
      var carmodelsString = JSON.stringify(<?php echo json_encode($carmbrandVariants); ?>);
      var carhashBrandCategoriesedString = JSON.stringify(<?php echo json_encode($carhashBrandCategoriesed); ?>);
      var carmhashBrandCategoriesedString = JSON.stringify(<?php echo json_encode($carmhashBrandCategoriesed); ?>);
      var carhashkeys = JSON.stringify(<?php echo json_encode($carmhashKey); ?>);

      var carbrandArray = JSON.parse(carbrandString);
      var carbrandVariants = JSON.parse(carmodelVariantsString);
      var carmbrandVariants = JSON.parse(carmodelsString);
      var carhashBrandCategoriesed = JSON.parse(carhashBrandCategoriesedString);
      var carmhashBrandCategoriesed = JSON.parse(carmhashBrandCategoriesedString);
      var carhashkeysprice = JSON.parse(carhashkeys);
      var amt ='';
      var pct = '';
      
     
      $('#manufacturertwo').change(function() {
         $('#carvariant-div').hide();      
         $('#carvariant-loader').show();  
         $('#tw_vary').find('option')
              .remove()
              .end()
              .append('<option value="">Select Model Variants</option>')
              .val('');
         if(typeof(carmbrandVariants[$(this).val()]) == "undefined" && carmbrandVariants[$(this).val()] == null) {
              return;
         }
         $.each(carmbrandVariants[$(this).val()], function(key, value) {
              $('#tw_vary')
                  .append($("<option></option>")
                      .attr("value",value)
                      .text(value));
         }); 
            setTimeout(function(){
               $('#carvariant-div').show();      
               $('#carvariant-loader').hide();
               $('#carvariant').focus();
            }, 1500);
      });



      $(document).on('change', '#carvariant', function() {
          $('#caramount').val('');
          var cyear = $('#footwo').val();
          var noyears = currentyear - cyear;
          var carhashKey = $(this).val();
          var carhashVal = window.btoa(carhashKey);
          if (typeof(carmhashBrandCategoriesed[carhashVal]) == "undefined" && carmhashBrandCategoriesed[carhashVal] == null) {
              return;
          }
          var amount = carmhashBrandCategoriesed[carhashVal];
      //alert('amount--'+ amount);
          //$('#caramount').val(carmhashBrandCategoriesed[carhashVal]);
          if(noyears == 0){
              amt = amount;
          }
          if(noyears == 1){ amt= percentagecalcar('20%',amount); }
          if(noyears == 2){ amt= percentagecalcar('20%',amount); }
          if(noyears == 3){ amt= percentagecalcar('30%',amount); }
          if(noyears == 4){ amt= percentagecalcar('40%',amount); }
          if(noyears == 5){ amt= percentagecalcar('50%',amount); }
          if(noyears == 6){ amt= percentagecalcar('55%',amount); }
          if(noyears == 7){ amt= percentagecalcar('59%',amount); }
          if(noyears == 8){ amt= percentagecalcar('64%',amount); }
          if(noyears == 9){ amt= percentagecalcar('67%',amount); }
          if(noyears == 10){ amt= percentagecalcar('70%',amount);}
          $('#caramount').val(amt);
          $('#caractualamount').val(amt);
          $('#idvamount').val(carmhashBrandCategoriesed[amount]);

          updateIDVvalue(amt,noyears);
      });

         function updateIDVvalue(caramount, car_age){

            //alert('hii am here');
        var idv_car = 0;
        var d = new Date();
        var curr_year = d.getFullYear();
       

        switch (car_age) {

            case 1:
                idv_car = caramount*0.95;
                break;
            case 2:
                idv_car = caramount*0.8;
                break;
            case 3:
                idv_car = caramount*0.7;
                break;
            case 4:
                idv_car = caramount*0.6;
                break;
            case 5:
                idv_car = caramount*0.5;
                break;
            case 6:
                idv_car = caramount*0.45;
                break;
            case 7:
                idv_car = caramount*0.41;
                break;
            case 8:
                idv_car = caramount*0.36;
                break;
            case 9:
                idv_car = caramount*0.33;
                break;
            case 10:
                idv_car = caramount*0.3;
            break;
        }

         $('#idvamount').val(idv_car);
         var min =percentagecal('15%',idv_car,'min');
         var max =percentagecal('15%',idv_car,'max');

        $('.range-bar').addClass("previous");
         loadIdvValueSlider(min,max,idv_car); 

      }


      function percentagecalcar(pct,amount) {
              pct = parseFloat(pct) / 100;
              amt = amount - pct;
              return amt;
      }


      function percentagecal(pct,amount,qnt) {
         pcts = parseFloat(pct) / 100;
         if(qnt == 'min'){
            var amt = amount - (amount*pcts); 
         } else {
            var amt = amount + (amount*pcts);
         }
         return amt;
      }




      $('#twocity').change(function(){

         var selectedCity = $(this).val();
        
         var cityArray = JSON.parse('<?php echo json_encode($cityComplete); ?>');
         for (i = 0; i < cityArray.length; i++) {
            if(cityArray[i].city === selectedCity){ 
             // alert(cityArray[i].state);
              $('#car_state').val(cityArray[i].state); 
            }
         }

      });




})


</script>

  
<script>
    $("#tw_mx_State").on('change', function() {
      
              

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
         $('#tw_mx_City-div').hide();      
         $('#tw_mx_City-loader').show();
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
               $('#tw_mx_City-div').show();      
               $('#tw_mx_City-loader').hide();
               $('#tw_mx_City').focus();
            }, 1500); 
                   },

                });

          });
</script>
 <script>
   
   $('input[name="claimtwo"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#value_disable').show(); 
          
      } else {
         
         $('#value_disable').hide(); 
          
      }
   }).change();
   
   </script>-->

  
