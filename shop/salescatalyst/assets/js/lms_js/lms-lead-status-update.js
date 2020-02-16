$(document).ready(function(){

$(document).on('click', '#update_lead', function() {
      let _parentClickthis = $(this);
      var leadStatus = $('#lead_status').val();
      var leadSubStatus = $('#lead_sub_status').val(); 
     if(leadStatus.length == 0 || leadSubStatus.length == 0){
  		alert("Please Select Status And Sub Status");
  			return false;	
  	  }
      var redirectUrl = __pathname+'lms-lead-list'
      var leadId = $('#lead_id').val();
      let cereaeObj = new Object();
      cereaeObj.leadId = leadId;
      cereaeObj.leadStatus = leadStatus;
      cereaeObj.leadSubStatus = leadSubStatus;
      $.ajax({
            url : __pathname+'update-lead-status',
            type : 'POST',
            data : $.param( cereaeObj ),
            dataType:'json',
            beforeSend : function(){
              _parentClickthis.val('Please Wait');
            },
            success: function( data){
              let dataObjLead = Object(data);
              if(dataObjLead.status){
                alert('Lead Updated Successfully');
                if(dataObjLead.leadstatus){
                  alert(dataObjLead.message);
                  window.location.href = redirectUrl;
                } else {
                  window.location.href = redirectUrl;
                }
              }
          },
      });
  });
});