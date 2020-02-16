<script src="<?php echo base_url(); ?>assets/js/qms_js/pa.js"></script>

                  <div class="tab-content">
        
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
                                    <label>Customer First Name
                                    <span class="required"> * </span></label>  
                                    <input type="text" name="pa_first_name"  placeholder="Customer First Name"  class="form-control input-sm" id="pa_first_name" ng-model="pa_first_name" required />               <div ng-if="quotepa.$submitted || quotepa.pa_first_name.$dirty" ng-messages="quotepa.pa_first_name.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer First Name</div>

         </div>
                                 </div>
                              </div>


                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Customer Last Name
                                    <span class="required"> * </span>
                                    </label>
                                    <input type="text" name="pa_last_name"  placeholder="Customer Last Name"   class="form-control input-sm" id="pa_last_name"  ng-model="pa_last_name" required/> 
                                    <div ng-if="quotepa.$submitted || quotepa.pa_last_name.$dirty" ng-messages="quotepa.pa_last_name.$error" role="alert">
             <div ng-message="required" class="required">Please Enter Customer Last Name</div>

         </div>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Date Of Birth<span class="required"> * </span> </label>                          
                                    <input type="text" name="pa_dob"  placeholder="DD-MM-YYYY"     class="form-control input-sm" id="pa_dob" ng-model="pa_dob" onkeyup="return dob_validate(this.value);" required />
                                    <div ng-if="quotepa.$submitted || quotepa.pa_dob.$dirty" class="required" id="dobalert" ng-messages="quotepa.pa_dob.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div>

                           </div>
                     
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
                                       <input list="city" id="pa_city" placeholder="Select city" name="pa_city" class="form-control input-sm" ng-model="pa_city" required>
                                       <datalist id ="city">
                                          <option value="">Select city</option>      
                                    </datalist>              
                                          <div ng-if="quotepa.$submitted || quotepa.pa_city.$dirty" ng-messages="quotepa.pa_city.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select City </div>
                                         
                                       </div>
                                       </div>
                                    </div>
                                 </div>


                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Mobile Number <span class="required"> * </span></label>                          
                                      <input type="text" id="pa_mobile" name="pa_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="pa_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>    
                                   
                                       <div ng-if="quotepa.$submitted || quotepa.pa_mobile.$dirty" class="required" id="mobilewar" ng-messages="quotepa.pa_mobile.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your Mobile Number</div>
                                          </div>
                                    </div>
                                 </div>

                           </div>
                  
                     <!--End crate leads-->
                    
                              <div class="row maincontf">
                             
                                  <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Email <span class="required"> * </span></label>                          
                                      <input type="text" id="pa_email" name="pa_email" class="form-control input-sm" placeholder="E-Mail" ng-model="pa_email" onkeyup="return email_validate(this.value);" required>  
                                       
                                       <div ng-if="quotepa.$submitted || quotepa.pa_email.$dirty" class="required" id="emailwar" ng-messages="quotepa.pa_email.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter your E-mail</div>
                                          </div>
                                    </div>
                                 </div>




                                  <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Occupation
                                       <span class="required"> * </span></label>
                                       <div class="radio-list">
                                           <input list="pa_occupation_list" placeholder="Select pa_occupation" id="pa_occupation" name="pa_occupation" class="form-control input-sm" ng-model="pa_occupation" required>
                                          <datalist id="pa_occupation_list">

                                          <?php 
                                          foreach($occupationArray as $occ )
                                          {
                                              echo '<option id="'.$occ['id'].'" value= "'.$occ['name'].'"></option>';
                                          }
                                          ?>   


<!--                                      <option id="5000" value="MANAGER/ADMINISTRATIVE"> </option>
                                          <option id="5001" value="BUSINESS OWNER"></option">
                                          <option id="5002" value="SALESPERSON DOING FIELD VISITS"></option>
                                          <option id="5003" value="PROFESSIONAL (CA, DOCTOR, TEACHER ETC.)"></option>
                                          <option id="5004" value="IT/ITES PROFESSIONAL"></option>
                                          <option id="5005" value="BUILDER/CONTRACTOR"></option>
                                          <option id="5006" value="MACHINE OPERATOR/MANUAL LABOR"></option>
                                          <option id="5007" value="DRIVER (PRIVATE BUS / CAR)"></option">
 -->




<!--                                          <option value="">FARMER/FACTORY WORKER(NON HARZARDOUS)</option>
                                         <option value="">ENGINEER(OFFICE DUTIES ONLY)</option>    
                                         <option value="">ARCHITECT/ARTIST/AUTHOR</option>
 -->                                       </datalist>
                                          <div ng-if="quotepa.$submitted || quotepa.pa_occupation.$dirty" ng-messages="quotepa.pa_occupation.$error" role="alert">
                                             <div ng-message="required" class="required">Please Select your pa_occupation</div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>



                              <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Annual pa_gainful Income(`) <span class="required"> * </span></label>
                                       <input type="text" id="pa_gainful" name="pa_gainful" class="form-control input-sm" placeholder="Annual pa_gainful Income" ng-model="pa_gainful" required>       
                                       <div ng-if="quotepa.$submitted || quotepa.pa_gainful.$dirty" ng-messages="quotepa.pa_gainful.$error" role="alert">
                                             <div ng-message="required" class="required">Please Enter Annual pa_gainful Income</div>
                                          </div>
                                    </div>
                                 </div>
                                

                              </div>
                              <div class="row maincontf">

               <div class="col-md-4">
                  <div class="form-group">
                     <div class="question">
                        <label>Include Spouse DOB </label>
                        <input class="coupon_question" type="checkbox" id="pa_spouse" name="pa_spouse" value="1" />
                     </div>
                     <div class="answer">
                        <input type="text" id="pa_spouse_dob" name="pa_spouse_dob" class="form-control input-sm" placeholder="Spouse Date of Birth" ng-model="pa_spouse_dob" >
                        <!--        <div ng-if="quoteSShip.$submitted" ng-messages="quoteSShip.dateofbirthcritical.$error" role="alert">
                           <div ng-message="required" class="required">Please Enter your Date of Birth</div>
                           </div> -->
                     </div>
                  </div>
               </div>

               <div class="col-md-4">
                  <div class="form-group">
                     <label>Include Children </label><span class="required">  </span>
                     <div class="radio-list">
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="pa_include_child"  ng-model='pa_include_child' checked="checked" ng-value="0"  value="0" > 0 </label>   
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="pa_include_child" ng-model='pa_include_child' ng-value="1"  value="1" > 1 </label>
                        <label class="radio-inline" style="font-size:12px;">
                        <input type="radio" name="pa_include_child" ng-model='pa_include_child' ng-value="2"  value="2" > 2 </label>      
                     </div>
            
                  </div>
               </div>
                 <div class="col-md-4">
                  <div class="form-group">
                      <label>Pincode<span class="required"> * </span></label>                          
                      <input type="text" name="pa_zip"  placeholder="Pincode " MaxLength="6" onkeyup="postcode_validate(this.value);" class="form-control input-sm" id="pa_zip" ng-model="pa_zip" required >
                      <div ng-if="quotepa.$submitted || quotepa.pa_zip.$dirty"  class="required" id="post" ng-messages="quotepa.pa_zip.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Pincode</div>
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


