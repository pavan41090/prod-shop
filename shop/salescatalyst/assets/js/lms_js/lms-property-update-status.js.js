$(document).on('click', '#update_lead_super', function() {

      $('#modal_error').html('');
      $('#chkCertifiedAV_error').html('');
      $('#chkEnsuredAV_error').html('');
      $('#chkCdrCode_error').html('');
      
      var webUrl = $('#web_url').val();
      var leadStatus = $('#lead_status').val();
      var leadId = $('#lead_id').val();
      if(leadStatus.length == 0){
          $('#modal_error').html('Please select the stage ');
      } else if (!$("#chkCertifiedAV").is(":checked")) {
          $('#chkCertifiedAV_error').html('Please certify AV has been done the sales ');
      } else if (!$("#chkEnsuredAV").is(":checked")) {
          $('#chkEnsuredAV_error').html('Please ensure that the AV is adequately & regularly trained');
      } else if (!$("#chkCdrCode").is(":checked")) {
          $('#chkCdrCode_error').html('Please confirm AV has used only his own CDR Code');
      } else {
		  
		  let statusObj = new Object();
		  statusObj.leadId = leadId;
		  statusObj.leadStatus = leadStatus;
          $.ajax({
              url : webUrl+'LmsCar/updateLeadStausByLeadIdBySupervisorJson',
              type : 'POST',
              data : $.param( statusObj ),
              dataType:'json',
              success: function( data){
                  alert('Lead Updated Successfully');
                  var redirectUrl = webUrl+'lms-lead-list'
                  window.location.href = redirectUrl;
              },
        });
      }  

});

$(document).on('click', '#update_lead_payment', function() {
     
      var webUrl = $('#web_url').val();
      var paymentDetails = $('#payment_details').val();
      var leadId = $('#lead_id').val();
	  
	  var paymentDataObj = new Object();
	  paymentDataObj.leadId = leadId;
	  paymentDataObj.paymentDetails = paymentDetails;
	  
	  if(paymentDetails.length == 0){
		  alert("Please Enter Payment Details");
		  return false;
	  }
      $.ajax({
          url : webUrl+'LmsCar/updateLeadPaymentStatus',
          type : 'POST',
          data : $.param( paymentDataObj ),
		  dataType:'json',
		  success: function( data){
                alert('Lead Updated Successfully');
                var redirectUrl = webUrl+'lms-lead-download'
                window.location.href = redirectUrl;
        },
      });

  });