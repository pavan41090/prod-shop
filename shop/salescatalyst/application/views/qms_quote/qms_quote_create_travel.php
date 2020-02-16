<script src="<?php echo base_url(); ?>assets/js/qms_js/travel.js"></script>

<div class="tab-content">
     <div class="tab-pane fade active in" id="travel">
        <div ng-controller="MainCtrl">
            <form name="quoteTravel" novalidate>
                <div class="portlet-title tabbable-line">
                    <div class="caption leadtit">
                        <i class="icon-globe font-dark hide"></i>
                        <span class="caption-subject font-dark bold uppercase"> Quote Details</span>
                    </div>
                </div>

                <!--start create leads-->
                <div class="row maincontf">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Customer First Name
                                <span class="required"> * </span></label>
                            <input type="text" name="travel_first_name" placeholder="Customer First Name" class="form-control input-sm" id="travel_first_name" ng-model="travel_first_name" required />
                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_first_name.$dirty" ng-messages="quoteTravel.travel_first_name.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Customer First Name</div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Customer Last Name
                                <span class="required"> * </span>
                            </label>
                            <input type="text" name="travel_last_name" placeholder="Customer Last Name" class="form-control input-sm" id="travel_last_name" ng-model="travel_last_name" required/>
                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_last_name.$dirty" ng-messages="quoteTravel.travel_last_name.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Customer Last Name</div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label> State <span class="required"> * </span></label>
                            <input list="state" placeholder="Select State" id="travel_state" name="travel_state" class="form-control input-sm" ng-model="travel_state" required>
                            <datalist id="state">
                                <option value="">Select State</option>
                                <?php 
                                          foreach($stateArray as $state )
                                          {
                                              echo '<option value="'.$state['id'].'"></option>';
                                          }
                                          ?>
                            </datalist>

                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_state.$dirty" ng-messages="quoteTravel.travel_state.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter State</div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row maincontf">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label> City <span class="required"> * </span></label>
                            <div id="travel_city-loader" style="padding: 0 25%; display: none;">
                                <img src="<?php  echo base_url()?>/assets/images/loader.gif" height='30'></img>
                            </div>
                            <div id="travel_city-div" style="">
                                <input list="city" id="travel_city" name="travel_city" placeholder="Select City" class="form-control input-sm" ng-model="travel_city" required>
                                <datalist id="city">
                                    <option value="">Select city</option>

                              </datalist>

                                <div ng-if="quoteTravel.$submitted || quoteTravel.travel_city.$dirty" ng-messages="quoteTravel.travel_city.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter City</div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>E-mail <span class="required"> * </span></label>
                            <input type="text" id="travel_email" name="travel_email" class="form-control input-sm" placeholder="E-Mail" ng-model="travel_email" onkeyup="return email_validate(this.value);" required>

                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_email.$dirty" class="required" id="emailwar" ng-messages="quoteTravel.travel_email.$error" role="alert">

                                <div ng-message="required" class="required">Please Enter Email</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Mobile Number <span class="required"> * </span></label>
                            <input type="text" id="travel_mobile" name="travel_mobile" class="form-control input-sm" placeholder="Mobile Number" ng-model="travel_mobile" MaxLength="10" onkeyup="mobile_validate(this.value);" required>

                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_mobile.$dirty" class="required" id="mobilewar" ng-messages="quoteTravel.travel_mobile.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Mobile Number</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row maincontf">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Policy Type
                                <span class="required"> * </span></label>
                            <div class="radio-list">
                                <label class="radio-inline" style="font-size:12px;">
                                    <input type="radio" name="travel_policy_type" ng-model='travel_policy_type' ng-value="0" value="0" required> Individual/Family </label>
                                <label class="radio-inline" style="font-size:12px;">
                                    <input type="radio" name="travel_policy_type" ng-model='travel_policy_type' ng-value="1" value="1" required> Student </label>
                                <div ng-if="quoteTravel.$submitted || quoteTravel.travel_policy_type.$dirty" ng-messages="quoteTravel.travel_policy_type.$error" role="alert">
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
                                    <input type="radio" name="travel_type_trip" ng-model='travel_type_trip' ng-value="0" value="0" required> Single Trip </label>

                                <label class="radio-inline" style="font-size:12px;" id="annualTrip">
                                    <input type="radio" name="travel_type_trip" ng-model='travel_type_trip' ng-value="1" value="1" required> Annual Multi Trip </label>
                                <div ng-if="quoteTravel.$submitted || quoteTravel.travel_type_trip.$dirty" ng-messages="quoteTravel.travel_type_trip.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select Type of Trip</div>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="col-md-4">
               <div class="form-group">
                  <label>Cover Type <span class="required"> * </span></label>
                  <div class="radio-list">

                    <label class="radio-inline" style="font-size:12px;" >
                     <input type="radio" name="travel_cover_type" ng-model='travel_cover_type' ng-value="0"  value="0" > Individual </label>
                  <label class="radio-inline" style="font-size:12px;"  id="coverTypeFamily">
                     <input type="radio" name="travel_cover_type"  ng-model='travel_cover_type' ng-value="1"  value="1"> Family Floater </label>   
                     
                                                  
                     <div ng-if="quoteTravel.$submitted || quoteTravel.travel_cover_type.$dirty" ng-messages="quoteTravel.travel_cover_type.$error" role="alert">
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
                            <input type="text" id="travel_depart_date" name="travel_depart_date" class="form-control input-sm" placeholder="Depart Date" ng-model="travel_depart_date" required>
                            <div ng-if="quoteTravel.$submitted " ng-messages="quoteTravel.travel_depart_date.$error" role="alert">

                                <div ng-message="required" class="required">Please Select Depart Date</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Return Date <span class="required"> * </span></label>
                            <input type="text" id="travel_return_date" name="travel_return_date" class="form-control input-sm" placeholder="Return Date" ng-model="travel_return_date" required>
                            <div ng-if="quoteTravel.$submitted " ng-messages="quoteTravel.travel_return_date.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Return Date</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Trip Duration </label>
                            <input type="text" id="travel_trip_duration" name="travel_trip_duration" class="form-control input-sm" placeholder="travel_trip_duration" ng-model="travel_trip_duration" readonly="readonly">
                            <div ng-if="quoteTravel.$submitted || quoteTravel.travel_trip_duration.$dirty" ng-messages="quoteTravel.travel_trip_duration.$error" role="alert">
                                <div ng-message="required" class="required">Please Enter Trip Duration</div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row maincontf">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Travel Type <span class="required"> * </span></label>
                            <input list="travel_type" placeholder="Select Travel Type" id="traveltype" name="traveltype" class="form-control input-sm" ng-model="traveltype" required>
                            <datalist id="travel_type">
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
                            <label>Geographical Covertravel age <span class="required"> * </span></label>
                            <input list="travel_geographical" placeholder="Select  travel geographical" id="geographical" name="geographical" class="form-control input-sm" ng-model="geographical" required>
                            <datalist id="travel_geographical">
                                <option id='1' value="World-wide including USA and Canada"></option>
                                <option id='2' value="World-wide excluding USA and Canada but including Japan"></option>
                                <option id='3' value="Asia excluding Japan"></option>
                            </datalist>
                            <div ng-if="quoteTravel.$submitted || quoteTravel.geographical.$dirty" ng-messages="quoteTravel.geographical.$error" role="alert">
                                <div ng-message="required" class="required">Please Select Geographical Covertravel_age</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="multitrips">
                            <div class="form-group">
                                <label>Max per trip duration </label>
                                <div class="radio-list">
                                    <label class="radio-inline" style="font-size:12px;">
                                        <input type="radio" name="travel_max_trip" ng-model='travel_max_trip' checked ng-value='"thirtydays"' value="thirtydays"> 30 Days </label>
                                    <label class="radio-inline" style="font-size:12px;">
                                        <input type="radio" name="travel_max_trip" ng-model='travel_max_trip' ng-value='"fourtfivedays"' value="fourtfivedays"> 45 Days </label>
                                    <label class="radio-inline" style="font-size:12px;">
                                        <input type="radio" name="travel_max_trip" ng-model='travel_max_trip' ng-value='"sixtydays"' value="sixtydays"> 60 Days </label>
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
                                <input list="relationship" placeholder="Select travel relationship" id="travel_relationship" name="travel_relationship" class="form-control input-sm" ng-model="travel_relationship" required>
                                <datalist id="relationship">
                                    <option value="Select travel_relationship"></option>
                                    <option value="Self"></option>
                                    <option value="spouse"></option>
                                    <option value="Children1"></option>
                                    <option value="Children2"></option>
                                </datalist>
                                <div ng-if="quoteTravel.$submitted || quoteTravel.travel_relationship.$dirty" ng-messages="quoteTravel.travel_relationship.$error" role="alert">
                                    <div ng-message="required" class="required">Please Select travel relationship</div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4">
                                 <div class="form-group">
                                    <label>DOB
                                    <span class="required"> * </span>
                                    </label>                          
                                    <input type="text" name="travel_date_birth"  placeholder="DD-MM-YYYY" onkeyup="return dob_validate(this.value);"    class="form-control input-sm" id="travel_date_birth" ng-model="travel_date_birth" required />
                                    <div ng-if="quoteTravel.$submitted || quoteTravel.travel_date_birth.$dirty" class="required" id="dobalert" ng-messages="quoteTravel.travel_date_birth.$error" role="alert">
             <div ng-message="required" class="required">Please Enter DOB</div>

         </div>
                                 </div>
                              </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age" id="travel_age" class="form-control input-sm" placeholder="age" ng-model="travel_age" readonly="">
                                 <div ng-if="quoteTravel.$submitted " ng-messages="quoteTravel.travel_age.$error" role="alert">
                                    <div ng-message="required" class="required">Please Enter Age</div>
                                </div>
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
                                <input list="relation" id="travel_relationship_1" placeholder="Select travel relationship" name="travel_relationship_1" class="form-control input-sm" ng-model="travel_relationship_1">
                                <datalist id="relation">
                                    <option value="">Select travel relationship</option>
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
                                <input type="text" id="travel_dob_1" name="travel_dob_1" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="travel_dob_1">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age_1" id="travel_age_1" class="form-control input-sm travel_age" placeholder="age" ng-model="travel_age_1" />


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
                                <label>Relationship</label>
                                <input list="relation" placeholder="Select travel relationship" id="travel_relationship_2" name="travel_relationship_2" class="form-control input-sm" ng-model="travel_relationship_2">
                                <datalist id="relation">
                                    <option value="">Select travel relationship</option>
                                    <option value="Self">Self</option>
                                    <option value="spouse">Spouse</option>
                                    <option value="chld1">Children1</option>
                                    <option value="chld2">Children2</option>
                               </datalist>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Of Birth </label>
                                <input type="text" id="travel_dob_2" name="travel_dob_2" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="travel_dob_2">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age_2" id="travel_age_2" class="form-control input-sm travel_age" placeholder="age" ng-model="travel_age_2" />

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
                                <label>travel_relationship </label>
                                <input list="relation" placeholder="Select travel relationship" id="travel_relationship_3" name="travel_relationship_3" class="form-control input-sm" ng-model="travel_relationship_3">
                                <datalist id="relation">
                                    <option value="">Select travel relationship</option>
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
                                <input type="text" id="travel_dob_3" name="travel_dob_3" class="form-control input-sm datebirth" placeholder="DD-MM-YYYY" ng-model="travel_dob_3">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>age </label>
                                <input type="text" name="travel_age_3" id="travel_age_3" class="form-control input-sm travel_age" placeholder="age" ng-model="travel_age_3" />

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
                            <button type="reset" value="reset" id="reset" class="btn blue btn-default">Reset</button>

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
    $('input[name="travel_type_trip"]').on('change', function() {
        //$('.multitrips').toggle(+this.value === 1 && this.checked);
        var value = $(this).val();
        if (value == 0) {
            $('.multitrips').hide();
        } else {
            $('.multitrips').show();
        }

    }).change();
</script>
<script>
    $('input[name="travel_policy_type"]').on('click', function() {
        // $('#annualTrip').toggle(+this.value === A && this.checked);
        //  alert('checked');
        var value = $(this).val();
        if (value == 1) {
            $('#annualTrip').hide();
            $('#coverTypeFamily').hide();

        } else {
            $('#annualTrip').show();
            $('#coverTypeFamily ').show();

        }
        //annualTrip
    }).change();
</script>
<script>
    // $('input[name="travel_policy_type"]').on('click', function() {
    //    var value = $(this).val();
    //    if(value == 1) {
    //       $('#travel_cover_type').hide();  
    //    } else {
    //       $('#travel_cover_type').show();  
    //    }

    // }).change();
</script>

<script>
    $('input[name="travel_policy_type"]').on('click', function() {
        var value = $(this).val();
        if (value == 1) {
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
  $(document).ready(function(){
    
    var date_input=$('input[name="travel_depart_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })


  })


   $(document).ready(function(){
    
    var date_input=$('input[name="travel_return_date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })


  })
</script> 

<script>
    $('#travel_depart_date').change(function() {
        updateDuration();
    })

    $('#travel_return_date').change(function() {
        updateDuration();
    })

    $('#travel_date_birth').change(function() {
        $('#travel_age').val('');
        var date2 = $('#travel_date_birth').val();
        var travel_age = calculatetravel_age(date2);
        if (isNaN(travel_age)) {
           
            $('#travel_date_birth').focus();
            return false;
        } else {
            $('#travel_age').val(travel_age);
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

    function updateDuration() {
        var today = $('#travel_depart_date').val();
        var date2 = $('#travel_return_date').val();

        today = new Date(today.split('-')[2], today.split('-')[1] - 1, today.split('-')[0]);
        date2 = new Date(date2.split('-')[2], date2.split('-')[1] - 1, date2.split('-')[0]);
        var timeDiff = Math.abs(date2.getTime() - today.getTime());
        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        if (diffDays > 0)
            $("#travel_trip_duration").val(diffDays);

    }

    $('.clearRow').on('click', function() {

        var selectRow = this.id;
        var rowId = selectRow[selectRow.length - 1];

        $('#travel_relationship_' + rowId).val('');
        $('#datebirth_' + rowId).val('');
        $('#travel_age_' + rowId).val('');

        return false;
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
    $("#travel_state").on('change', function() {

        var state_id = $(this).val();
        var dataString = 'state_id=' + state_id;
        var webUrl = $('#web_url').val()
        var URL = webUrl + 'Commoncontrol/getCityByStateID/';
        $.ajax({

            url: URL,
            type: 'POST',
            data: {
                'state_id': state_id
            },
            dataType: 'json',

            success: function(data) {

                //var stateArray = JSON.parse(data);
                $('#travel_city-div').hide();
                $('#travel_city-loader').show();
                $('#city').find('option')
                    .remove()
                    .end()
                    .append('<option value="">Select city</option>')
                    .val('');

                $.each(data, function(key, value) {
                    $('#city')
                        .append($("<option></option>")
                            .attr("value", value['id'])
                            .text(value['name']));

                });
                setTimeout(function() {
                    $('#travel_city-div').show();
                    $('#travel_city-loader').hide();
                    $('#travel_city').focus();
                }, 1500);
            },

        });

    });
</script>

</body>

</html>