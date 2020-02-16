<script src="<?php echo base_url(); ?>assets/js/qms_js/home_proposal.js"></script>
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
               <a href="create-quote-personal-accident">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Quote</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span>Home</span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption">Home Proposal </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">
                     <form name="home" novalidate>
                        
                        <div class="row maincontf">
                           <div class="col-md-4">
                             
<!-- 
                             <div class="form-group">
                                 <label>Policy Start Date
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="home_pro_policy_sdate"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="home_pro_policy_sdate" ng-model="home_pro_policy_sdate" required />
                                 <div ng-if="PA.$submitted || PA.home_pro_policy_sdate.$dirty" ng-messages="PA.home_pro_policy_sdate.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Policy Start Date </div>
                                 </div>
                              </div> -->

                  <div class="form-group">
                     <label>Proposed policy start date <span class="required"> * </span></label>
                     <input type="text" id="home_pro_policy_sdate" name="home_pro_policy_sdate" class="form-control input-sm" placeholder="DD-MM-YYYY" ng-model="home_pro_policy_sdate" required>
                     <div ng-if="home.$submitted" ng-messages="home.home_pro_policy_sdate.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter policy start date</div>
                     </div>
                  </div>

                              
                           </div>
                        </div>
      
                        <h4 class="propsal-seperator">Tell us more about your self </h4>
                        <hr>
                         <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Salutation
                                 <span class="required"> * </span>
                                 </label>
                                 <input list="title" placeholder="Select Salutation" id="home_pro_title" name="home_pro_title" class="form-control input-sm" ng-model="home_pro_title" ng-model="home_pro_title" required>
                                 <datalist id="title">
                                    <option value="Mr"></option>
                                    <option value="Mrs"></option>
                                  </datalist>
                                  <div ng-if="home.$submitted || home.home_pro_title.$dirty" ng-messages="home.home_pro_title.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Title</div>
                            </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> First Name <span class="required"> * </span></label>
                                 <input type="text" name="home_pro_fname" placeholder="Enter First Name" class="form-control input-sm" id="home_pro_fname" ng-model="home_pro_fname" required/>
                                 <div ng-if="home.$submitted || home.home_pro_fname.$dirty" ng-messages="home.home_pro_fname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter First Name</div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Last Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="home_pro_lname" placeholder="Enter Last Name" class="form-control input-sm" id="home_pro_lname" ng-model="home_pro_lname" required />
                                 <div ng-if="home.$submitted || home.home_pro_lname.$dirty" ng-messages="home.home_pro_lname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Date of Birth
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="home_pro_dob"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="home_pro_dob" ng-model="home_pro_dob" required />
                                 <div ng-if="home.$submitted || home.home_pro_dob.$dirty" ng-messages="home.home_pro_dob.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                 <label>Address1
                                 <span class="required"> * </span></label>
                                 <input type="text" name="home_pro_add1" placeholder="Enter Address1" class="form-control input-sm" id="home_pro_add1" ng-model="home_pro_add1" required />
                                 <div ng-if="home.$submitted || home.home_pro_add1.$dirty" ng-messages="home.home_pro_add1.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address1</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">   
                                 <label>Address2
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="home_pro_add2" placeholder="Enter Address2" class="form-control input-sm" id="home_pro_add2" ng-model="home_pro_add2" required />
                                 <div ng-if="home.$submitted || home.home_pro_add2.$dirty" ng-messages="home.home_pro_add2.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Address2</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">

                            <div class="col-md-4">
                              <div class="form-group">
                                 <label> Nearest Land Mark <span class="required"> * </span></label>
                                 <input type="text" name="home_pro_landmark" placeholder="Enter Nearest Land Mark" class="form-control input-sm" id="home_pro_landmark" ng-model="home_pro_landmark" required/>
                                 <div ng-if="home.$submitted || home.home_pro_landmark.$dirty" ng-messages="home.home_pro_landmark.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Landmark</div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label> State <span class="required"> * </span></label>
                            <input list="state" placeholder="Select State" id="home_pro_state" name="home_pro_state" class="form-control input-sm" ng-model="home_pro_state" required>
                            <datalist id="state">
                                <option value="">Select State</option>
                                <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>
                            </datalist>
                             
                                 <div ng-if="home.$submitted || home.home_pro_state.$dirty" ng-messages="home.home_pro_state.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter State</div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-md-4">
                              <div class="form-group">
                                <label> City <span class="required"> * </span></label>
                                       <div id="home_pro_city-loader" style="padding: 0 25%; display: none;">
                                           <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30' ></img>
                                       </div>
                                        <div id="home_pro_city-div" style="">
                                             <input list="city" placeholder="Select city" id="home_pro_city"  name="home_pro_city" class="form-control input-sm" ng-model="home_pro_city" required>
                                             <datalist id="city">
                                           <option value="">Select city</option>
                                         
                                       </datalist>   
                               
                                 <div ng-if="home.$submitted || home.home_pro_city.$dirty" ng-messages="home.home_pro_city.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter City</div>
                                 </div>
                              </div>
                          </div>
                           </div>

                        </div>
                        <div class="row maincontf">
                          
                           <div class="col-md-4">
                              <div class="form-group">
                            <label>E-mail <span class="required"> * </span></label>
                            <input type="text" id="home_pro_email" name="home_pro_email" class="form-control input-sm" placeholder="Enter E-Mail" ng-model="home_pro_email" onkeyup="return email_validate(this.value);" required>
                                  <div ng-if="home.$submitted || home.home_pro_email.$dirty" class="required" id="emailwar" ng-messages="home.home_pro_email.$error" role="alert">

                                <div ng-message="required" class="required">Please Enter Email</div>
                            </div>
                              </div>
                           </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="home_pro_mobile" name="home_pro_mobile" class="form-control input-sm" placeholder="Enter Mobile Number" ng-model="home_pro_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>
                                  <div ng-if="home.$submitted || home.home_pro_mobile.$dirty" class="required" id="mobilewar" ng-messages="home.home_pro_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                              </div>
                           </div>
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Postel code <span class="required"> * </span></label>
                            <input type="text" id="home_pro_zip" name="home_pro_zip" class="form-control input-sm" placeholder="Enter Emergency Mobile Number" ng-model="home_pro_zip" MaxLength="6" onkeyup="postcode_validate(this.value);" required>
                                  <div ng-if="home.$submitted || home.home_pro_zip.$dirty" class="required" id="post" ng-messages="home.home_pro_zip.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Emergency Number</div>
                            </div>
                              </div>
                           </div>
                        </div>
                        <div class="row maincontf">
                          
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>GSTN
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="home_pro_gstn" placeholder="Enter GSTN" class="form-control input-sm" id="home_pro_gstn" ng-model="home_pro_gstn" required />
                                 <div ng-if="home.$submitted || home.home_pro_gstn.$dirty" ng-messages="home.home_pro_gstn.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Gstn</div>
                                 </div>
                              </div>
                           </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Occupation
                                       <span class="required"> * </span></label>
                                       <div class="radio-list">
                                           <input list="home_occupation_list" placeholder="Select occupation" id="home_occupation" name="home_occupation" class="form-control input-sm" ng-model="home_occupation" required>
                                          <datalist id="home_occupation_list">

                                            
                                          <?php 
                                          foreach($occupationArray as $occ )
                                          {
                                              echo '<option id="'.$occ['id'].'" data-value= "'.$occ['name'].'"></option>';
                                          }
                                          ?>  
                                         
                                        </datalist>
                                          <div ng-if="home.$submitted || home.home_occupation.$dirty" ng-messages="home.home_occupation.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select your home_occupation</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                  <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee Name
                                 <span class="required"> * </span></label>
                                 <input type="text" name="home_pro_nname" placeholder="Enter Nominee Name" class="form-control input-sm" id="home_pro_nname" ng-model="home_pro_nname" required />
                                 <div ng-if="home.$submitted || home.home_pro_nname.$dirty" ng-messages="home.home_pro_nname.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Last Name</div>
                                 </div>
                              </div>
                           </div>

                           </div>
                        
                        
                       
                         <div class="row maincontf">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee is My <span class="required"> * </span></label>
                              <input list="relation" placeholder="Select Nominee is My" id="home_pro_relation" name="home_pro_relation" class="form-control input-sm" ng-model="home_pro_relation"  required>
                                 <datalist id="relation">
                                  
                                    <option value="Father"></option>
                                    <option value="Mother"></option>
                                    <option value="Brother"></option>
                                    <option value="Sister"></option>
                                 </datalist>
                                 <div ng-if="home.$submitted || home.home_pro_relation.$dirty" ng-messages="home.home_pro_relation.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Relationship</div>
                                 </div>
                              </div>
                           </div>
                       
                         <div class="col-md-4">
                              <div class="form-group">
                                 <label>Nominee Date of Birth
                                 <span class="required"> * </span>
                                 </label>
                                 <input type="text" name="home_pro_ndob"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="home_pro_ndob" ng-model="home_pro_ndob" required />
                                 <div ng-if="home.$submitted || home.home_pro_ndob.$dirty" ng-messages="home.home_pro_ndob.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Date of Birth </div>
                                 </div>
                              </div>
                           </div>
                            <div class="col-md-3">
                            <div class="form-group">
                                <label>Nominee age </label>
                                <input type="text" name="home_pro_nage" id="home_pro_nage" class="form-control input-sm" placeholder="age" ng-model="home_pro_nage" readonly="">
                                 <div ng-if="home.$submitted " ng-messages="home.home_pro_nage.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Age</div>
                                </div>
                            </div>
                        </div>
                        
                           
                           
                        </div>
                     <br>

                       
                      
                        
                       
                      
                       
                           
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <a href="qms-home-premium">
                                 <button type="button" id="" class="btn blue btn-default">Back</button>
                                 </a>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                     <a href="<?php echo base_url(); ?>qms-pa-proposal-view"  >
                                    <button type="submit"  class="btn blue btn-default send_quote" ng-click="proposal()" >Procced to Proposal</button>
                                    </a>
                                 </div>
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
   <!--<div class="note note-info">
      <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
      </div>-->
</div>
<script>
     $("#home_pro_state").on('change', function() {
      
              
              

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
         $('#home_pro_city-div').hide();      
         $('#home_pro_city-loader').show();
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
               $('#home_pro_city-div').show();      
               $('#home_pro_city-loader').hide();
               $('#home_pro_city').focus();
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

 function emobile_validate(Mobile)
{
   
   var Mobilenum = /^([1-9])([0-9]){9}$/;
   if(Mobilenum.test(Mobile) == false)
   {
      text = "Please Enter a Valid Mobile Number";  
   } else {
      text="";
   }
   $('#mobilewarn').html(text);
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



 $('#home_pro_ndob').change(function() {
        $('#home_pro_nage').val('');
        var date2 = $('#home_pro_ndob').val();
        var home_pro_nage = calculatetravel_age(date2);
        if (isNaN(home_pro_nage)) {
           
            $('#home_pro_nage').focus();
            return false;
        } else {
            $('#home_pro_nage').val(home_pro_nage);
        }
    });

    function calculatetravel_age(date2) {

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        var today = dd + '-' + mm + '-' + yyyy;
        today = new Date(today.split('-')[2], today.split('-')[1] - 1, today.split('-')[0]);
        date2 = new Date(date2.split('-')[2], date2.split('-')[1] - 1, date2.split('-')[0]);
        var timeDiff = Math.abs(date2.getTime() - today.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
        var months = Math.floor(diffDays / 31);
        var years = Math.floor(months / 12);
        return years;
    }
</script>
