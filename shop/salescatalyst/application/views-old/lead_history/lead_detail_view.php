<script src="<?php echo base_url(); ?>assets/js/custom_lead.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">

<div class="page-content-wrapper">
   <div class="page-content">
      <h3 class="page-title">Leads - <?php echo $title ?>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html ">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Leads</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span> Lead History </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption"> Lead Details </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                <input type="hidden" id="propectsId" value="<?php echo $propectsId; ?>">

                <div> First Name : <span id="FirstName"></span>  </div> 
                <div> Last Name : <span id="LastName"></span>  </div> 
                <div> Email Address : <span id="FirstName"></span>  </div> 
                <div> Mobile : <span id="Mobile"></span>  </div> 
                <div> Prospect ID  : <span id="ProspectID"></span>  </div>
                <div> Prospect Stage  : <span id="ProspectStage"></span>  </div> 
                
                <div> Quote Id : <span id="mx_Quote_Id"></span>  </div> 
                <div> Premium Details : <br/><span style="padding-left: 20px;" id="mx_premium_details"></span>  </div> 
                <div> Quote Dtails  : <br/><span style="padding-left: 20px;" id="mx_quote_details"></span>  </div> 
                <div> Date and Time : <span id="CreatedOn"></span>  </div> 


               </div>
            </div>
         </div>
      </div>
   </div>
   <!--<div class="note note-info">
      <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
      </div>-->
</div>
<script type="text/javascript">
  
 $(document).ready(function(){  

        var accessKey = 'u$r3c4de58f6a402ca29db52c2428a78049';
        var secretKey = '56c63ad69633990d029bdfe874bba1d9809b2d87'; 
        //var prospect_id = '238b9d35-478a-4a2b-820f-e8650677a19'; 
             var propectsId = $('#propectsId').val();
                $.ajax({  
                url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Leads.GetById?accessKey='+accessKey+'&secretKey='+secretKey+'&id='+propectsId,
                dataType: 'json',
                type: 'get',       
                contentType: 'application/json',
                
                processData: false,
                success: function( data){
                  if(data != ''){
                      var dataArray =  JSON.stringify(data);
                      var parsedArray = JSON.parse(dataArray);
                      //console.log(parsedArray);
                      var mx_premium_details = parsedArray[0].mx_premium_details;
                      var premium_details =  mx_premium_details.replace(/\n/ig,'<br>');
                      var mx_quote_details = parsedArray[0].mx_quote_details;
                      var quote_details =  mx_quote_details.replace(/\n/ig,'<br>');

                      $('#FirstName').html(parsedArray[0].FirstName);
                      $('#LastName').html(parsedArray[0].LastName);
                      $('#EmailAddress').html(parsedArray[0].EmailAddress);
                      $('#Mobile').html(parsedArray[0].Mobile);
                      $('#ProspectID').html(parsedArray[0].ProspectID);
                      $('#mx_Quote_Id').html(parsedArray[0].mx_Quote_Id);
                      $('#mx_premium_details').html(premium_details);
                      $('#mx_quote_details').html(quote_details);
                      $('#CreatedOn').html(parsedArray[0].CreatedOn);
                      $('#ProspectStage').html(parsedArray[0].ProspectStage);
                  } else {
                    alert('Invalid Id ' + propectsId );
                  }

                },
                // error: function( jqXhr, textStatus, errorThrown ){
                //     // $('#load_modal').click();
                //      var dataArray =  JSON.stringify(jqXhr);
                //      var jsonArray = JSON.parse(dataArray);
                //     // var statusResponse = JSON.parse(jsonArray.responseText).Status;
                //     // var ExceptionType = JSON.parse(jsonArray.responseText).ExceptionMessage;
                //      alert(statusResponse+' - '+ExceptionType);
                //     // $("#closeModel").click();
                // }
            });
        });        
    


</script>