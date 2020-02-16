<script src="<?php echo base_url(); ?>assets/js/qms_js/travel_proposal.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title">Quotes - <?php echo $title ?>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html ">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Quote</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span>Travel Proposal </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption">Travel Quote Proposal </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">
                     <form name="quoteTravel" novalidate>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                <label>Relationship <span class="required"> * </span></label>
                                <input list="relationship" placeholder="Select Relationship" id="tvl_prop_relationship" name="tvl_prop_relationship" class="form-control input-sm" ng-model="tvl_prop_relationship" required>
                                <datalist id="relationship">
                                    <option value="Self"></option>
                                    <option value="spouse"></option>
                                    <option value="Children1"></option>
                                    <option value="Children2"></option>
                                </datalist>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_prop_relationship.$dirty" ng-messages="quoteTravel.tvl_prop_relationship.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Relationship</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Title
                                 <span class="required"> * </span>
                                 </label>
                                 <input list="title" placeholder="Select Title" id="tvl_pro_title" name="tvl_pro_title" class="form-control input-sm" ng-model="tvl_pro_title" ng-model="tvl_pro_title" required>
                                 <datalist id="title">
                                    <option value="Mr"></option>
                                    <option value="Mrs"></option>
                                  </datalist>
                                  <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_title.$dirty" ng-messages="quoteTravel.tvl_pro_title.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Title</div>
                            </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> First Name <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_fname" placeholder="Enter First Name" class="form-control input-sm" id="tvl_pro_fname" ng-model="tvl_pro_fname" required/>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_fname.$dirty" ng-messages="quoteTravel.tvl_pro_fname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter First Name</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Last Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_lname" placeholder="Enter Last Name" class="form-control input-sm" id="tvl_pro_lname" ng-model="tvl_pro_lname" required />
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_lname.$dirty" ng-messages="quoteTravel.tvl_pro_lname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Date of Birth
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="tvl_pro_dob"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="tvl_pro_dob" ng-model="tvl_pro_dob" required />
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_dob.$dirty" ng-messages="quoteTravel.tvl_pro_dob.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Gender <span class="required"> * </span></label>
                              <input list="gender" placeholder="Select Gender" id="tvl_pro_gender" name="tvl_pro_gender" class="form-control input-sm" ng-model="tvl_pro_gender"  required>
                                 <datalist id="gender">
                                  
                                    <option value="Male"></option>
                                    <option value="Female"></option>
                                 </datalist>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_gender.$dirty" ng-messages="quoteTravel.tvl_pro_gender.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Gender</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Presently in India
                                 <span class="required"> * </span></label>
                                 <div class="radio-list">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_present_india" ng-model='tvl_pro_present_india' ng-value="0" value="0" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_present_india" ng-model='tvl_pro_present_india' ng-value="1" value="1"> No </label>
                                    <div ng-if="quoteCar.$submitted || quoteCar.tvl_pro_present_india.$dirty" ng-messages="quoteCar.tvl_pro_present_india.$error" role="alert">
                                       <div ng-message="required" class="required">Please Select Presently in India</div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <div class="form-group">
                                    <label>Holds Valid Indian Passport
                                    <span class="required"> * </span></label>
                                    <div class="radio-list">
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="tvl_pro_vaild_passport" ng-model='tvl_pro_vaild_passport' ng-value="0" value="0" > Yes </label>
                                       <label class="radio-inline" style="font-size:13px;">
                                       <input type="radio" name="tvl_pro_vaild_passport" ng-model='tvl_pro_vaild_passport' ng-value="1" value="1"> No </label>
                                       <div ng-if="quoteCar.$submitted || quoteCar.tvl_pro_vaild_passport.$dirty" ng-messages="quoteCar.tvl_pro_vaild_passport.$error" role="alert">
                                          <div ng-message="required" class="required">Please Select Presently in India</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nationality <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_national"  placeholder="Enter Nationality" class="form-control input-sm" id="tvl_pro_national" ng-model="tvl_pro_national" required />
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_national.$dirty" ng-messages="quoteTravel.tvl_pro_national.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nationality</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Passport No
                                 <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_passport_no" placeholder="Enter Passport No" class="form-control input-sm" id="tvl_pro_passport_no" ng-model="tvl_pro_passport_no" required />
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_passport_no.$dirty" ng-messages="quoteTravel.tvl_pro_passport_no.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Passport No</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>GSTN
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="tvl_pro_gstn" placeholder="Enter GSTN" class="form-control input-sm" id="tvl_pro_gstn" ng-model="tvl_pro_gstn" required />
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_gstn.$dirty" ng-messages="quoteTravel.tvl_pro_gstn.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Gstn</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nominee Name <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_nname" placeholder="Enter Nominee Name" class="form-control input-sm" id="tvl_pro_nname" ng-model="tvl_pro_nname" required/>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_nname.$dirty" ng-messages="quoteTravel.tvl_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Nominee Name</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee Relationship
                                 <span class="required"> * </span></label>
                                 <input list="nreal" placeholder="Select Nominee Relationship " id="tvl_pro_nomie_relation" name="tvl_pro_nomie_relation" class="form-control input-sm" ng-model="tvl_pro_nomie_relation"  required>
                                 <datalist id="nreal">
                                    <option value="Spouse"></option>
                                    <option value="Father"></option>
                                 </datalist>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_nomie_relation.$dirty" ng-messages="quoteTravel.tvl_pro_nomie_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"> <label>Are any of the above travellers professional/semi professional sportspeople?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_prosemi" ng-model='tvl_pro_prosemi' ng-value="0" value="0" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_prosemi" ng-model='tvl_pro_prosemi' ng-value="1" value="1"> No </label>
                                 </div>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_prosemi.$dirty" ng-messages="quoteTravel.tvl_pro_prosemi.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Do any of the above travellers engage in adventure sports?
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_engage" ng-model='tvl_pro_engage' ng-value="0" value="0" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_engage" ng-model='tvl_pro_engage' ng-value="1" value="1"> No </label>
                                 </div>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_engage.$dirty" ng-messages="quoteTravel.tvl_pro_engage.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Do any of the above travellers engage in adventure sports?</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10"><label>Are any of the above travellers presently suffering from any pre existing illness/disease including Blood Preasure /Diabetes etc
                                    <span class="required"> * </span></label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">

                                    <input type="radio" name="tvl_pro_illness" ng-model='tvl_pro_illness' ng-value="0" value="0" > Yes </label>
                                    <label class="radio-inline" style="font-size:13px;">
                                    <input type="radio" name="tvl_pro_illness" ng-model='tvl_pro_illness' ng-value="1" value="1"> No </label>
                                 </div>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_illness.$dirty" ng-messages="quoteTravel.tvl_pro_illness.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select suffering from any pre existing illness</div>
                                 </div>
                                
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 1
                                 <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_add1" placeholder="Enter Address Line 1" class="form-control input-sm" id="tvl_pro_add1" ng-model="tvl_pro_add1" required />
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_add1.$dirty" ng-messages="quoteTravel.tvl_pro_add1.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address1</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address Line 2
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="tvl_pro_add2" placeholder="Enter Address Line 2" class="form-control input-sm" id="tvl_pro_add2" ng-model="tvl_pro_add2" required />
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_add2.$dirty" ng-messages="quoteTravel.tvl_pro_add2.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address2</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nearest Land Mark <span class="required"> * </span></label>
                                 <input type="text" name="tvl_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="tvl_pro_landmark" ng-model="tvl_pro_landmark" required/>
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_landmark.$dirty" ng-messages="quoteTravel.tvl_pro_landmark.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Landmark</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Pincode<span class="required"> * </span></label>                          
                                 <input type="text" name="tvl_pro_zip"  placeholder="Enter Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="tvl_pro_zip" ng-model="tvl_pro_zip" required >
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_zip.$dirty" class="required" id="post" ng-messages="quoteTravel.tvl_pro_zip.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pincode</div>
                     </div>
                              </div>
                           </div>
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> State <span class="required"> * </span></label>
                            <input list="state" placeholder="Select State" id="tvl_pro_state" name="tvl_pro_state" class="form-control input-sm" ng-model="tvl_pro_state" required>
                            <datalist id="state">
                                <option value="">Select State</option>
                                <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>
                            </datalist>
                             
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_state.$dirty" ng-messages="quoteTravel.tvl_pro_state.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter State</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                <label> City <span class="required"> * </span></label>
                                       <div id="tvl_pro_city-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="tvl_pro_city-div" style="">
                                             <input list="city" placeholder="Select city" id="tvl_pro_city"  name="tvl_pro_city" class="form-control input-sm" ng-model="tvl_pro_city" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                       </datalist>   
                               
                                 <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_city.$dirty" ng-messages="quoteTravel.tvl_pro_city.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter City</div>
                                 </div>
                              </div>
                          </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="tvl_pro_mobile" name="tvl_pro_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="tvl_pro_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteTravel.tvl_pro_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                            <label>E-mail <span class="required"> * </span></label>
                            <input type="text" id="tvl_pro_email" name="tvl_pro_email" class="form-control input-sm" placeholder="Enter E-Mail" ng-model="tvl_pro_email" onkeyup="return email_validate(this.value);" required>
                                  <div ng-if="quoteTravel.$submitted || quoteTravel.tvl_pro_email.$dirty" class="required" id="emailwar" ng-messages="quoteTravel.tvl_pro_email.$error" role="alert">

                                <div ng-message="required" class="required">Please Enter Email</div>
                            </div>
                              </div>
                           </div>
                           <div class="col-md-4">&nbsp;</div>
                        </div>
                         <div>&nbsp;</div>
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <a href="qms-travel-premium">
                                 <button type="button" id="" class="btn blue btn-default">Back</button>
                                 </a>
                              </div>
                           </div>
                            
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                    <a href="#" id="">
                                    <button type="submit"  class="btn blue btn-default send_quote" ng-click="proposal()" >Procced to Propsal</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
                          
                        </div>
                         <div>&nbsp;</div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--<div class="note note-info">
      <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
      </div>-->
</div>
<script>
     $("#tvl_pro_state").on('change', function() {
      
              
              

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
         $('#tvl_pro_city-div').hide();      
         $('#tvl_pro_city-loader').show();
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
               $('#tvl_pro_city-div').show();      
               $('#tvl_pro_city-loader').hide();
               $('#tvl_pro_city').focus();
            }, 1500); 
                   },

                });

          });
</script>

<script>

// POSTCODE

function postcode_validate(zipcode)
{
   var txt = '';
   var regPostcode = /^([1-9])([0-9]){5}$/;
   if(regPostcode.test(zipcode) == false)
   {
      text =  "Please enter a valid Postcode";  
   } else {
      text = '';
   }
   $('#post').html(text);
}



// MOBILE

   function mobile_validate(Mobile)
{
   
   var Mobilenum = /^([1-9])([0-9]){9}$/;
   if(Mobilenum.test(Mobile) == false)
   {
      text = "Please Enter a Valid Mobile Number";  
   } else {
      text="";
   }
   $('#mobilewar').html(text);
}


// EMAIL

 function email_validate(email)
{
   
  var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
   if(re.test(email) == false)
   {
      text = "Please Enter a Valid Email";  
   } else {
      text="";
   }
   $('#emailwar').html(text);
}
</script>
