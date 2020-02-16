<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="lead_id" value="<?php echo $leadId; ?>">

<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title"> <?php echo $title ?>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="lms-lead-list">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="lms-lead-list"><?php echo $module; ?></a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span> <?php echo $title ?> </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
                
                <div class="portlet-title">
                    <div class="caption"> <?php echo $title ?> </div>
                  </div>  
               

               <?php $stageButtonLabel = ''; 
              


switch ($logged_user_type) {
      case 'bagi_av': 
      $stageButtonLabel = 'Lead Stage';
       ?>
          <div class="caption pull-right"> 
              <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#lead-status"><?php echo $stageButtonLabel; ?></button> 
          </div>
      <?php 
       break;
      case 'supervisor':
        $stageButtonLabel = 'Approve Lead';
      ?>

        <div class="caption pull-right"> 
          <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#lead-status"><?php echo $stageButtonLabel; ?></button> 
        </div>
      <?php  
      break;
      case 'hdfc_ops':
      $stageButtonLabel = 'Approve Payment';
      ?>
        <div class="caption pull-right"> 
          <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#lead-status"><?php echo $stageButtonLabel; ?></button> 
        </div>
      <?php        
     
        break;
      case 'bagi_ops':
        
        break;

      }
?>

               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">

                      <div class="box lmsresult">
                        <div class="row lmsresbor"> 

                          <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Application Id  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_application_number; ?> </div>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Category  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_category; ?> </div>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Employee Code  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_employee_code; ?> </div>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> SM Name  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_sm_name; ?> </div>
                                  </div>
                              </div></div>
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> SM Code </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_sm_code; ?> </div>
                                  </div>
                              </div>
                             
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Customer Name  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_customer_name; ?> </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> AAN Number  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_aaa_number; ?> </div>
                                  </div>
                              </div>                            
                          </div>

                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Vehicle Type  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_vehicle_type; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Registration Number  </div>
                                      <div class="col-md-5">: <?php echo $quoteData->motor_register_number; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> City of Registration  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_city_registration; ?> </div>
                                  </div>
                              </div>                            
                            </div>



                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Policy Expiry Date </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_expire_date ; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Previous Year NCB  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_previous_ncb ; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Previous Insurance Company  </div>
                                      <div class="col-md-7">: <?php echo $quoteData->motor_previous_company ; ?> </div>
                                  </div>
                              </div>                            
                            </div>


                      </div>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>

</div>






<div id="lead-status" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 55%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>


             <?php 
                $stageButtonLabel = '';
                $submitButton = '';
                switch ($logged_user_type) {
                  case 'bagi_av':
                    $stageButtonLabel = 'Modify Lead Stage';
                    $submitButton = '<button type="button" class="btn blue btn-default" id="update_lead">Update</button>';
                    break;
                  case 'supervisor':
                    $stageButtonLabel = 'Modify Lead Stage';

                    $submitButton = '<button type="button" class="btn blue btn-default" id="update_lead_super">Update</button>';
                    break;
                  case 'hdfc_ops':
                       $stageButtonLabel = 'Enter Payment Details';
                        $submitButton = '<button type="button" class="btn blue btn-default" id="update_lead_payment">Add Details</button>';
                    break;
                  case 'bagi_ops':
                      
                    break;
                }

                ?>

            <h4 class="modal-title"><?php echo $stageButtonLabel; ?></h4>
      </div>
      <div class="modal-body">
          <div class="row">
                <div class="col-md-12" id="modal_error" style="color: red;"></div>

            <?php if($logged_user_type == 'bagi_av'){ ?>
              <div class="col-md-4">Lead Status </div>
              <div class="col-md-8">
                  <select id="lead_status" class="form-control input-sm">

                          <option value="">Select Status</option>
                          <option value="Follow Up">Follow Up</option>
                          <option value="Not Contacted">Not Interested</option>
                          <option value="Not Contacted">Not Contacted</option>
                          <option value="Lead Lost" >Lead Lost</option>
                          <option value="Sales Open">Sales Open</option>
                          <option value="Sales Closed">Sales Closed</option>
                    </select>
                </div>
        
              <div class="row col-md-12">&nbsp;</div>

              <div class="col-md-4">Sub Status </div>
              <div class="col-md-8">
                  <select id="lead_sub_status" class="form-control input-sm">                      
                          <option value="">Select Sub Status</option>
                          <option value="Follow Up">Follow Up</option>
                          <option value="Not Contacted">Not Interested</option>
                          <option value="Not Contacted">Not Contacted</option>
                          <option value="Lead Lost" >Lead Lost</option>
                          <option value="Sales Open">Sales Open</option>
                          <option value="Sales Closed CC">Sales Closed CC</option>
                          <option value="Sales Closed Online">Sales Closed Online</option>
                    </select>
                </div>
        
               <?php  } else if($logged_user_type == 'supervisor') {  ?>
                    
                <div class="col-md-4">Lead Stage </div>
                  <div class="col-md-6">
                      <select id="lead_status" class="form-control input-sm">
                      <option value="">Select Stage</option>
                      <option value="Proceed for Debit">Proceed for Debit</option>
                      <option value="Lead Lost">Lead Lost</option>
                    </select>
                  </div>
                    <div class="col-md-12"> &nbsp;</div>
                  <div class="col-md-12">
                     <input class="" type="checkbox" name="chkCertifiedAV" id="chkCertifiedAV" value="0" />
                     <label> Sales has been done by Certified AV</label>
                  </div>
                  <div class="col-md-12" id="chkCertifiedAV_error" style="color: red;"></div>
                  <div class="col-md-12">
                     <input class="" type="checkbox" name="chkEnsuredAV" id="chkEnsuredAV" value="0" />
                     <label> I have ensured that the AV is adequately & regularly trained on the Products and Scripts for Insurance </label>
                  </div>
                  <div class="col-md-12" id="chkEnsuredAV_error" style="color: red;"></div>
                  <div class="col-md-12">
                     <input class="" type="checkbox" name="chkCdrCode" id="chkCdrCode" value="0" />
                     <label>  AV has used only his own CDR Code for logging the case in LMS. </label>
                  </div>
                  <div class="col-md-12" id="chkCdrCode_error" style="color: red;"></div>

                   <?php  } else if($logged_user_type == 'hdfc_ops') {  ?>
                          
                      <div class="col-md-4"> Payment Details </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control input-sm"  placeholder="Payment Details" id="payment_details" name="payment_details" >
                      </div>
                      <?php } ?>

             
          </div> 
          <div class="row">&nbsp;</div> 
          <div class="row">
              <div class="col-md-2 pull-right">
                <?php echo $submitButton; ?>
<!--                   <button type="button" class="btn blue btn-default" id="update_lead">Update</button>
 -->              </div>
          </div>  
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url();?>assets/js/lms_js/lms-lead-status-update.js"></script>
<script type="text/javascript">
 
  $("#update_lead_super").on('click', function() {

      $('#modal_error').html('');
      $('#chkCertifiedAV_error').html('');
      $('#chkEnsuredAV_error').html('');
      $('#chkCdrCode_error').html('');
      
      var webUrl = $('#web_url').val();
      var leadStatus = $('#lead_status').val();
      var leadId = $('#lead_id').val();
      if(leadStatus == ''){
          $('#modal_error').html('Please select the stage ');
      } else if (!$("#chkCertifiedAV").is(":checked")) {
          $('#chkCertifiedAV_error').html('Please certify AV has been done the sales ');
      } else if (!$("#chkEnsuredAV").is(":checked")) {
          $('#chkEnsuredAV_error').html('Please ensure that the AV is adequately & regularly trained');
      } else if (!$("#chkCdrCode").is(":checked")) {
          $('#chkCdrCode_error').html('Please confirm AV has used only his own CDR Code');
      } else {

          $.ajax({
              url : webUrl+'LmsCar/updateLeadStausByLeadIdBySupervisorJson',
              type : 'POST',
              data : {'leadId' : leadId,
                    'leadStatus' : leadStatus},
              dataType:'json',
              
              success: function( data){
                  alert('Lead Updated Successfully');
                  var redirectUrl = webUrl+'lms-lead-list'
                  window.location.href = redirectUrl;
              },
        });
      }  

  });


  $("#update_lead_payment").on('click', function() {
     
      var webUrl = $('#web_url').val();
      var paymentDetails = $('#payment_details').val();
      var leadId = $('#lead_id').val();

      $.ajax({
          url : webUrl+'LmsCar/updateLeadPaymentStatus',
          type : 'POST',
          data : {'leadId' : leadId,
                  'paymentDetails' : paymentDetails},
              dataType:'json',
           
              success: function( data){
                alert('Lead Updated Successfully');
                var redirectUrl = webUrl+'lms-lead-download/'
                window.location.href = redirectUrl;
              },
      });

  });



  $("#add_comment").on('click', function() {
  
      var webUrl = $('#web_url').val();
      var leadComment = $('#lms_lead_comment').val();
      var leadId = $('#lead_id').val();
      
      if(leadComment == '' ){  

        $('#cmt_error').show();

      } else {  
          $.ajax({
              url : webUrl+'LmsCar/lmsAddLeadCommentByJson',
              type : 'POST',
              data : {'leadId' : leadId,
                    'leadComment' : leadComment},
                  dataType:'json',
              success: function( data){
                    alert('Comment added Successfully');
                    location.reload(true);
              },
        });
      }   

  });   

  $("#lms_lead_comment").on('click', function() {
     $('#cmt_error').hide();
  });  


</script>


