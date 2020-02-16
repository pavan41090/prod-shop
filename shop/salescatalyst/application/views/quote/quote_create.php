
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
 
                  <div class="tab-content">
                     <div class="tab-pane fade active in" id="car">
                        <!--                         <form type="POST" id="carform" name="carform" >
                           -->                           
                        <div ng-app="plunker" ng-controller="myCtrl">
                          <form name="quoteCar" novalidate >
                          
 
                           <div class="portlet-title tabbable-line">
                              <div class="caption leadtit">
                                 <i class="icon-globe font-dark hide"></i>
                                 <span class="caption-subject font-dark bold uppercase">create leads</span>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">

                                    
                                    <label>Category
                                    <span class="required"> * </span></label>
                <input list="Category" placeholder="Select Category" class="form-control input-sm" name="mx_Category" id="mx_Category" ng-model="mx_Category" required>

   <datalist id="Category"> 
                                       <option value="">Select Category</option>
                                         <?php 
                                          foreach($CategoryArray as $Category )
                                          {
                                              echo '<option  value="'.$Category['name'].'" style="font-weight:normal; color:#ff0000;"></option>';
                                          }
                                          ?>   
                                  </datalist>
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_Category.$dirty" ng-messages="quoteCar.mx_Category.$error" role="alert">		
	             <div ng-message="required" class="required">Please Select Category</div>		
		
	         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Line of Business
                                    <span class="required"> * </span></label>                          
                                    
                                <input list="Business" class="form-control input-sm" placeholder="Select Line of Business" name="mx_Line_of_Business" id="mx_Line_of_Business" ng-model="mx_Line_of_Business" required>

   <datalist id="Business">
                                     <option value="">Select Business</option>
                                         <?php 
                                          foreach($BusinessArray as $Business )
                                          {
                                              echo '<option value="'.$Business['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_Line_of_Business.$dirty" ng-messages="quoteCar.mx_Line_of_Business.$error" role="alert">
             <div ng-message="required" class="required">Please Select Line of Business</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Branch Location
                                    <span class="required"> * </span></label>  
<!--                                     <select class="form-control input-sm" name="mx_HDFC_Branch_Location" id="mx_HDFC_Branch_Location" ng-model="mx_HDFC_Branch_Location" required>
 -->                                    <input list="mx_HDFC_Branch_Locations"  placeholder="Select HDFC Branch Location"  class="form-control input-sm" name="mx_HDFC_Branch_Location" id="mx_HDFC_Branch_Location" ng-model="mx_HDFC_Branch_Location" required>
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
<!--                                     </select>
 -->                                   
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_HDFC_Branch_Location.$dirty" ng-messages="quoteCar.mx_HDFC_Branch_Location.$error" role="alert">
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
                                    

                    <input list="Location" class="form-control input-sm" placeholder="Select Bharati AXA GI Location" name="mx_HDFC_Ergo_Location" id="mx_HDFC_Ergo_Location" ng-model="mx_HDFC_Ergo_Location" required>

   <datalist id="Location">  
                                      <option value="">Select GiLocation</option>
                                         <?php 
                                          foreach($GiLocationArray as $GiLocation )
                                          {
                                              echo '<option value="'.$GiLocation['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_HDFC_Ergo_Location.$dirty" ng-messages="quoteCar.mx_HDFC_Ergo_Location.$error" role="alert">
             <div ng-message="required" class="required">Please Select Bharati AXA GI Location</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Priority</label> 
                                   <span class="required"> * </span></label>									
                                    <input list="Priority " placeholder="select Priority" class="form-control input-sm" name="mx_Priority" id="mx_Priority" ng-model="mx_Priority" required>
                                    <datalist id="Priority ">
                                       <option value="">Select...</option>
                                       <option value="Priority 1"></option>
                                       <option value="Priority 2"></option>
                                       <option value="Priority 3"></option>
                                       <option value="Priority 4"></option>
                                    </datalist>
									<div ng-if="quoteCar.$submitted || quoteCar.mx_Priority.$dirty" ng-messages="quoteCar.mx_Priority.$error" role="alert">
             <div ng-message="required" class="required">Please Select Priority</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Target Date
                                    </label>  <span class="required"> * </span></label>
                                   
                                       <input type="text"    class="form-control input-sm"  placeholder="DD-MM-YYYY" name="mx_Target_Date" id="mx_Target_Date" ng-model="mx_Target_Date" required>
                                    
									   <div ng-if="quoteCar.$submitted" ng-messages="quoteCar.mx_Target_Date.$error" role="alert">
             <div ng-message="required" class="required">Please Select Date</div>

         </div>
                                   
                                    <!--<input type="text"   class="form-control input-sm" placeholder="dd-mm-yyyy" name="mx_Target_Date" id="mx_Target_Date" ng-model="mx_Target_Date" /> -->                 
                                 </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TSE/BDR Code
                                    <span class="required"> * </span></label>
                                    <input type="text" name="mx_TSE_BDR_Code"  placeholder="TSE/BDR Code" class="form-control input-sm" id="mx_TSE_BDR_Code" ng-model="mx_TSE_BDR_Code" required> 
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_TSE_BDR_Code.$dirty" ng-messages="quoteCar.mx_TSE_BDR_Code.$error" role="alert">
                                   <div ng-message="required" class="required">Please Enter TSE/BDR Code</div>
			 

                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>TL Code/DSA Code/Team Code</label> 
                         <span class="required"> * </span></label>									
                                    <input type="text" name="mx_TL_Code"   placeholder="TL Code/DSA Code/Team Code"  class="form-control input-sm" id="mx_TL_Code" ng-model="mx_TL_Code" required >  
                                
								 <div ng-if="quoteCar.$submitted || quoteCar.mx_TL_Code.$dirty" ng-messages="quoteCar.mx_TL_Code.$error" role="alert">
             <div ng-message="required" class="required">Please Enter TL Code/DSA Code/Team Code</div>
          </div>
         </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>SM Code
                                    <span class="required"> * </span>
                                    </label>  
                                    <input type="text" name="mx_SM_Code"  placeholder="SM Code"   class="form-control input-sm" id="mx_SM_Code" ng-model="mx_SM_Code" required />                 <div ng-if="quoteCar.$submitted || quoteCar.mx_SM_Code.$dirty" ng-messages="quoteCar.mx_SM_Code.$error" role="alert">
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
                                    <input type="text" name="mx_Bank_Verifier_ID"   placeholder="Bank Verifier ID"  class="form-control input-sm" id="mx_Bank_Verifier_ID" ng-model="mx_Bank_Verifier_ID" required /> 
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_Bank_Verifier_ID.$dirty" ng-messages="quoteCar.mx_Bank_Verifier_ID.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Bank Verifier ID</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Payment Type
                                    <span class="required"> * </span></label>                          
                                    

                             <input list="Payment" class="form-control input-sm" placeholder=" Select Payment Type" name="mx_Payment_Type" id="mx_Payment_Type" ng-model="mx_Payment_Type" required>

   <datalist id="Payment"> 
                                       <option value="">Select Payment</option>
                                         <?php 
                                          foreach($PaymentArray as $Payment )
                                          {
                                              echo '<option value="'.$Payment['name'].'"></option>';
                                          }
                                          ?>   
                                    </datalist>
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_Payment_Type.$dirty" ng-messages="quoteCar.mx_Payment_Type.$error" role="alert">
             <div ng-message="required" class="required">Please Select Payment Type</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Sub Channel</label>  
									<span class="required"> * </span></label>   
                                    <input list="Sub Channel" placeholder="Select Sub Channel"   class="form-control input-sm" name="mx_Sub_Channel" id="mx_Sub_Channel" ng-model="mx_Sub_Channel" required>
                                    <datalist id="Sub Channel">
                                       <option value="">Select Sub Channel</option>
                                       <option value="Sub_Channel 1"></option>
                                       <option value="Sub_Channel 2"></option>
                                       <option value="Sub_Channel 3"></option>
                                       <option value="Sub_Channel 4"></option>
                                    </datalist>
									<div ng-if="quoteCar.$submitted || quoteCar.mx_Sub_Channel.$dirty" ng-messages="quoteCar.mx_Sub_Channel.$error" role="alert">
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
                                    <input type="text" name="mx_HDFC_Card_Relationship_No" placeholder="HDFC Card Relationship No/LOS Number"  class="form-control input-sm" id="mx_HDFC_Card_Relationship_No" ng-model="mx_HDFC_Card_Relationship_No" required />
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_HDFC_Card_Relationship_No.$dirty" ng-messages="quoteCar.mx_HDFC_Card_Relationship_No.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card Relationship No/LOS Number</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>HDFC Card's Last 4 digits
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="mx_HDFC_Card_Last_4_digits" maxlength="4" placeholder="HDFC Card's Last 4 digits"  class="form-control input-sm" id="mx_HDFC_Card_Last_4_digits" ng-model="mx_HDFC_Card_Last_4_digits" onkeyup="return card_validate(this.value);" required />
                                  
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_HDFC_Card_Last_4_digits.$dirty" class="required" id="cardwar" ng-messages="quoteCar.mx_HDFC_Card_Last_4_digits.$error" role="alert">
             <div ng-message="required" class="required">Please Enter HDFC Card's Last 4 digits</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer First Name
                                    <span class="required"> * </span></label>  
                                    <input type="text" name="FirstName"  placeholder="Customer First Name"  class="form-control input-sm" id="FirstName" ng-model="FirstName" required />               <div ng-if="quoteCar.$submitted || quoteCar.FirstName.$dirty" ng-messages="quoteCar.FirstName.$error" role="alert">
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
                                    <input type="text" name="LastName"  placeholder="Customer Last Name"   class="form-control input-sm" id="LastName"  ng-model="LastName" required/> 
                                    <div ng-if="quoteCar.$submitted || quoteCar.LastName.$dirty" ng-messages="quoteCar.LastName.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Last Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>DOB
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="mx_DOB"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="mx_DOB" ng-model="mx_DOB" required />
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_DOB.$dirty" class="required" id="dobalert" ng-messages="quoteCar.mx_DOB.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Gender
                                    </label>  <span class="required"> * </span>
                                    <input list="Customer Gender" placeholder="Select Customer Gender"   class="form-control input-sm" name="mx_Customer_Gender" id="mx_Customer_Gender" ng-model="mx_Customer_Gender" required>
                                    <datalist id="Customer Gender">
                                       <option value="Select Gender"></option>
                                       <option value="male"></option>
                                       <option value="female"></option>
                                    </datalist>
									 <div ng-if="quoteCar.$submitted || quoteCar.mx_Customer_Gender.$dirty" ng-messages="quoteCar.mx_Customer_Gender.$error" role="alert">
             <div ng-message="required" class="required">Please Select Customer Gender</div>

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
                                    <input type="text" name="mx_Case_id"  placeholder="Case id"    class="form-control input-sm" id="mx_Case_id" ng-model="mx_Case_id" required />
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_Case_id.$dirty" ng-messages="quoteCar.mx_Case_id.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Case id</div>

         </div> 
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                  <label>PAN Card
                                    </label> <span class="required"> * </span>   
                                    <input type="text" class="form-control input-sm"  placeholder="PAN NUMBER" ID="mx_PAN_Card" ng-model="mx_PAN_Card" name="mx_PAN_Card"   MaxLength="10" required>
                                   
<div ng-if="quoteCar.$submitted || quoteCar.mx_PAN_Card.$dirty" ng-messages="quoteCar.mx_PAN_Card.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Pan card number</div>

         </div> 

            <p class="required" id="demo"></p>



                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Address 1 <span class="required"> * </span>
                                    </label>  
                                    <textarea class="form-control" placeholder="Address 1" name="mx_Street1" rows="2" id="mx_Street1" ng-model="mx_Street1" required></textarea>              <div ng-if="quoteCar.$submitted || quoteCar.mx_Street1.$dirty" ng-messages="quoteCar.mx_Street1.$error" role="alert">
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
                                    <textarea class="form-control"  placeholder="Address 2" name="mx_Street2" rows="2" id="mx_Street2" ng-model="mx_Street2" required></textarea>
									 <div ng-if="quoteCar.$submitted || quoteCar.mx_Street2.$dirty" ng-messages="quoteCar.mx_Street2.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Address 2</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Area
                                    </label><span class="required"> * </span>                          
                                    <input type="text" name="mx_Area"  placeholder="Area"   class="form-control input-sm" id="mx_Area"  ng-model="mx_Area" required>
									 <div ng-if="quoteCar.$submitted || quoteCar.mx_Area.$dirty" ng-messages="quoteCar.mx_Area.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Area</div>

         </div>
                                 </div>
                              </div>

                               <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Pincode
                                    <span class="required"> * </span>
                                    </label>                          
                                   <input type="text" name="mx_Zip"  MaxLength="6" onkeyup="return postcode_validate(this.value);" placeholder="Pincode "  class="form-control input-sm" id="mx_Zip" ng-model="mx_Zip" required >
                     
                                    <div ng-if="quoteCar.$submitted || quoteCar.mx_Zip.$dirty" class="required" id="post" ng-messages="quoteCar.mx_Zip.$error" role="alert">
             <div ng-message="required"  class="required">Please Enter Pincode</div>

         </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label> State <span class="required"> * </span></label>
                                       <input list="state" id="mx_State" placeholder="Select State"  autocomplete="off" name="mx_State" class="form-control input-sm" ng-model="mx_State" required>
                                        <datalist id="state">
                                          <option value="">Select State</option>
                                         <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>   
                                       </datalist>     
									  <div ng-if="quoteCar.$submitted || quoteCar.mx_State.$dirty" ng-messages="quoteCar.mx_State.$error" role="alert">
             <div ng-message="required" class="required">Please Enter State</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                  <label> City <span class="required"> * </span></label>
                                       <div id="mx_City-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="mx_City-div" style="">


                                             <input list="city" id="mx_City" placeholder="Select city" autocomplete="off" name="mx_City" class="form-control input-sm" ng-model="mx_City" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                      </datalist>                   
                         <div ng-if="quoteCar.$submitted || quoteCar.mx_City.$dirty" ng-messages="quoteCar.mx_City.$error" role="alert">
             <div ng-message="required" class="required">Please Enter City</div>

         </div>                </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Details of Lead
                                    </label>   <span class="required"> * </span>
                                    <input type="text" name="Notes"  placeholder="Details of Lead "   class="form-control input-sm" id="Notes" ng-model="Notes" required> 
 <div ng-if="quoteCar.$submitted || quoteCar.Notes.$dirty" ng-messages="quoteCar.Notes.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Details of Lead</div>

         </div>									
                                 </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>E-mail <span class="required"> * </span></label>
      <input type="email" id="emailcar" name="emailcar" class="form-control input-sm" placeholder="E-mail" ng-model="emailcar" onkeyup="return email_validate(this.value);" required> 
                                  
                                    <div ng-if="quoteCar.$submitted || quoteCar.emailcar.$dirty" class="required" id="emailwar" ng-messages="quoteCar.emailcar.$error" role="alert">
              <div ng-message="required" class="required">Please Enter Valid E-mail</div>

         		</div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Mobile Number <span class="required"> * </span></label>
                                    <input type="text" id="mobilecar" autocomplete="off" name="mobilecar" class="form-control input-sm" placeholder="Mobile Number" ng-model="mobilecar" MaxLength="10" onkeyup="return mobile_validate(this.value);" placeholder="Pincode " required /> 
                                  
                                    <div ng-if="quoteCar.$submitted || quoteCar.mobilecar.$dirty" class="required" id="mobilewar" ng-messages="quoteCar.mobilecar.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Valid Mobile Number</div>

         		</div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Type <span class="required"> </span></label>                          
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="policytypecar" ng-model='policytypecar' ng-value='"corporate"' value="corporate" checked required> Corporate </label>
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" autocomplete="off" name="policytypecar" ng-model='policytypecar' ng-value='"individual"' value="individual" required> Individual </label>
									     <div ng-if="quoteCar.$submitted || quoteCar.policytypecar.$dirty" ng-messages="quoteCar.policytypecar.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Type</div>

         		</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- <div class="row maincontf">
                              <div class="col-md-4">
                              <div class="form-group">
                              <label>Customer Email
                              
                              </label>
                              <input type="text" name="EmailAddress"    class="form-control input-sm" id="EmailAddress" /></div>
                              </div>
                              
                              
                              </div>-->
                           <div class="radio-list optcon">
                              <label class="radio-inline" >
                              <input type="radio" name="caroptionsRadios"  value="0" checked ng-model="caroptionsRadios"> Insured with another insurer </label>
                                                                                  <label class="radio-inline" >
                                 <input type="radio" name="caroptionsRadios"  value="1"> Policy already expired </label>
                               <!--   <label class="radio-inline">
                                 <input type="radio" name="caroptionsRadios" value="new"> Yet to purchase this car </label>
                                 -->                                                
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Registration Number <span class="required"> * </span></label>
                                    <input type="text" id="carregistrationnumber" name="carregistrationnumber" class="form-control input-sm" placeholder="Registration Number" ng-model="carregistrationnumber" required />
                                    
         <div ng-if="quoteCar.$submitted || quoteCar.carregistrationnumber.$dirty" ng-messages="quoteCar.carregistrationnumber.$error" style="color:red" role="alert">
             <div ng-message="required" class="required">Please Enter Registration Number</div>

         </div>                                    
                                    
<!--                                    <p ng-show="form.carregistrationnumber.$invalid && form.carregistrationnumber.$dirty">Registration Number Required</p>
-->
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Year of manufacture <span class="required"> * </span></label>
                                    <input list="Year of manufacture" placeholder="Year of manufacture" name="foocar" id="foocar" class="form-control input-sm" ng-model="foocar" required>
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
                                    <div ng-if="quoteCar.$submitted || quoteCar.foocar.$dirty" ng-messages="quoteCar.foocar.$error" role="alert">
             <div ng-message="required" class="required">Please Select Year of Manufacture</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Manufacturer <span class="required"> * </span></label>
                                    <?php ?>
                                    <input list="Manufacturer" placeholder="Select Manufacturer" id="manufacturercar" name="manufacturercar" class="form-control input-sm" ng-model="manufacturercar" required>
                                    <datalist id="Manufacturer">
                                       <option value="">Select Manufaturer</option>
                                       <?php echo $carbrandArray; ?>
                                       <?php foreach($carbrandArray as $carbrand) {
                                          echo '<option value="'.$carbrand.'">'.$carbrand.'</option>';
                                          } 
                                          ?>
                                    </datalist>
                                    <div ng-if="quoteCar.$submitted || quoteCar.manufacturercar.$dirty" ng-messages="quoteCar.manufacturercar.$error" role="alert">
             <div ng-message="required" class="required">Please Select Manufaturer</div>

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
                                       <input list="car_vary" placeholder="Select model variants" id="carvariant" name="carvariant" class="form-control input-sm" ng-model="carvariant" required>
                                       <datalist id="car_vary"> 
                                          <option value="">Select model variants</option>
                                       </datalist>
                                       <div ng-if="quoteCar.$submitted || quoteCar.carvariant.$dirty" ng-messages="quoteCar.carvariant.$error" role="alert">
             <div ng-message="required" class="required">Please Select Model Varient</div>

         </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>City of Registration <span class="required"> * </span></label>
                                    <input list="cityofreg" placeholder="City of Registration" id="carcity" name="carcity" class="form-control input-sm" ng-model="carcity" required>
                                    <datalist id="cityofreg">
                                       <option value="Select City"></option>
                                       <?php 
                                          foreach($city as $cval )
                                          {
                                              echo '<option value="'.$cval.'">'.$cval.'</option>';
                                          }
                                          ?>                                       
                                   </datalist>
                                    <div ng-if="quoteCar.$submitted || quoteCar.carcity.$dirty" ng-messages="quoteCar.carcity.$error" role="alert">
             <div ng-message="required" class="required">Please Select City of Registration</div>

<input type="hidden" name="car_state" id="car_state" ng-model='car_state'>
         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Policy Expire Date <span class="required"> * </span></label>
                                    <!--    <select name="foo" class="form-control input-sm">
                                       <option value="0">Policy Expire Date</option>
                                       <option value="1">Option 1</option>
                                       <option value="1">Option 2</option>
                                       <option value="1">Option 3</option>
                                       </select>  --> 
                                    <!--<input type="text" id="datepickercar" name="datepickercar" class="form-control input-sm" placeholder="Policy Expire Date" ng-model="datepickercar">-->
                                    <input type="text" id="datepickercar" name="datepickercar" class="form-control input-sm" placeholder="Policy Expire Date" ng-model="datepickercar" required>
                                    <div ng-if="quoteCar.$submitted" ng-messages="quoteCar.datepickercar.$error" role="alert">
             <div ng-message="required" class="required">Please Select Policy Expire Date</div>

         </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row maincontf">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>IDV <span class="required"> * </span></label>
                                    <input type="hidden" id="caractualamount" name="caractualamount" />
                                    <input type="hidden" id="caramount" name="caramount" class="form-control input-sm" placeholder=""/>
                                    <!-- <input type="text" id="caramount" name="caramount" class="form-control input-sm" placeholder="IDV: Rs. 3,64,233" ng-model="caramount" /> -->
                                    <input type="text" id="idvamount" name="idvamount" class="form-control input-sm" placeholder="IDV Amount"/>
                                 </div>
                                 <div class="slider-wrapper">
                                    <input type="text" class="js-decimal" />
                                    <label class="display-box-label"></label><br />
                                    <div id="js-display-decimal" class="display-box"></div>
                                 </div>
                                 <div ng-if="quoteCar.$submitted || quoteCar.idvamount.$dirty" ng-messages="quoteCar.idvamount.$error" role="alert">
             <div ng-message="required" class="required">Please IDV</div>

         </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Claim in expiring policy <span class="required">  </span></label>                          
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:12px;">
                                       <input type="radio" name="expiringcar" ng-model='expiringcar' ng-value='"0"'  value="0" checked required> No </label>
                                       <label class="radio-inline" style="font-size:12px;">
                                       <input type="radio" name="expiringcar"  ng-model='expiringcar' ng-value='"1"'  value="1" required> Yes </label>  
  <div ng-if="quoteCar.$submitted || quoteCar.expiringcar.$dirty" ng-messages="quoteCar.expiringcar.$error" role="alert">
             <div ng-message="required" class="required">Please Select Claim in expiring policy</div>

         </div>									   
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                  <div id="value_disable">
                                    <label>NCB in Expiring policy( % ) <span class="required">  </span></label>  
                                    <input list="ncb" placeholder="NCB in Expiring policy" name="ncbcar" class="form-control input-sm" id="ncbcar" ng-model="ncbcar" required>
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
                           <div>
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
      <button type="submit" class="btn blue btn-default" ng-click="pset()">Calculate Premium</button>
      <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
      <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">                                       
<!--                                     <button  class="btn blue btn-default" ng-click="pset()" ng-disabled="form.$invalid" data-toggle="modal" data-target="#myModal">Calculate Premium</button>-->
                              
<!--  <button ng-disabled="form.$invalid" class="btn">Submit</button> -->
                   </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="form-group">
                                    <button type="button" id="reset" class="btn blue btn-default">Reset</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                        </div> <!-- controller ends here -->
                     </div>
                     <div class="tab-pane fade" id="two">
                        <p>TAB2</p>
                     </div>
                     <div class="tab-pane fade" id="health">
                        <p>TAB3</p>
                     </div>
                     <div class="tab-pane fade" id="tab_1_4">
                        <p> Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore
                           wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh
                           craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan. 
                        </p>
                     </div>
                  </div>
                  <div class="clearfix margin-bottom-20"> </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
<i class="icon-login"></i>
</a>
<!-- END QUICK SIDEBAR -->
</div>
<script type="text/javascript">

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
      
     
      $('#manufacturercar').change(function() {
         $('#carvariant-div').hide();      
         $('#carvariant-loader').show();  
         $('#car_vary').find('option')
              .remove()
              .end()
              .append('<option value="">Select Model Variants</option>')
              .val('');

         if(typeof(carmbrandVariants[$(this).val()]) == "undefined" && carmbrandVariants[$(this).val()] == null) {
              return;
         }

         $.each(carmbrandVariants[$(this).val()], function(key, value) {
              $('#car_vary')
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



      $('#carcity').change(function(){

         var selectedCity = $(this).val();

         var cityArray = JSON.parse('<?php echo json_encode($cityComplete); ?>');
         for (i = 0; i < cityArray.length; i++) {
            if(cityArray[i].city === selectedCity){ 
              //alert(cityArray[i].state);
              $('#car_state').val(cityArray[i].state); 
            }
         }

      });



      $(document).on('change', '#carvariant', function() {

          $('#caramount').val('');
          var cyear = $('#foocar').val();
          var noyears = currentyear - cyear;
      
          var carhashKey = $(this).val();
          var carhashVal = window.btoa(carhashKey);
          
          if (typeof(carmhashBrandCategoriesed[carhashVal]) == "undefined" && carmhashBrandCategoriesed[carhashVal] == null) {
              return;
          }

          var amount = carmhashBrandCategoriesed[carhashVal];
          
          //$('#caramount').val(carmhashBrandCategoriesed[carhashVal]);
          if(noyears == 0){
              amt = amount;
          }
          if(noyears == 1){
             amt= percentagecalcar('20%',amount)
             //amt = amount;
          }
          if(noyears == 2){
             amt= percentagecalcar('20%',amount)
             //amt = amount;
          }
          if(noyears == 3){
             amt= percentagecalcar('30%',amount)
             //amt = amount;
          }
          if(noyears == 4){
             amt= percentagecalcar('40%',amount)
             //amt = amount;
          }
          if(noyears == 5){
             amt= percentagecalcar('50%',amount)
             //amt = amount;
          }
          if(noyears == 6){
             amt= percentagecalcar('55%',amount)
             //amt = amount;
          }
          if(noyears == 7){
             amt= percentagecalcar('59%',amount)
             //amt = amount;
          }
          if(noyears == 8){
             amt= percentagecalcar('64%',amount)
             //amt = amount;
          }
          if(noyears == 9){
             amt= percentagecalcar('67%',amount)
             //amt = amount;
          }
          if(noyears == 10){
             amt= percentagecalcar('70%',amount)
             //amt = amount;
          }
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

        // $('.previous').html("");
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

})
</script>

<script>
    $("#mx_State").on('change', function() {
      
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
         $('#mx_City-div').hide();      
         $('#mx_City-loader').show();
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
               $('#mx_City-div').show();      
               $('#mx_City-loader').hide();
               $('#mx_City').focus();
            }, 1500); 
                   },

                });

          });
</script>
<script>
   
   $('input[name="expiringcar"]').on('click', function() {
      var value = $(this).val();
      if(value == 1) {
         $('#value_disable').hide(); 
          
      } else {
         
         $('#value_disable').show(); 
          
      }
   }).change();
   
   </script>-->





</body>
</html>