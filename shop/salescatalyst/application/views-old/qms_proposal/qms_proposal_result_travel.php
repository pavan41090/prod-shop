<script src="<?php echo base_url(); ?>assets/js/qms_js/travel_proposal.js"></script>

<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
                    <input type="hidden" id="order_id" name="order_id" value="<?php echo $orderNo; ?>">
                    <input type="hidden" id="quote_id" name="quote_id" value="<?php echo $quoteNo; ?>">
                    <input type="hidden" id="email_id" name="email_id" value="<?php echo $emailId;?>">
                    <input type="hidden" id="quote_type" name="quote_type" value="Travel">
                    <input type="hidden" id="cust_name" name="cust_name" value="<?php echo ucfirst($custName); ?>">
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title"><?php echo $title ?>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html ">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Quotes</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span> Proposal Result </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption policytit"> Proposal Created Succesfully!</div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
               <div class="row">
               <div class="col-md-6">
               <div class="prosoalrestxt">Thank you for choosing Bharti AXA General Insurance.

You will receive your policy document via email.

Kindly take note of the following reference numbers

in the event you do not receive your policy. We are

available at 080-49010200 for any assistance.</div>
<div class="prosoalrestxt1">
               Quote No : <?php echo $quoteNo ?><br />
			   Order no  : <?php echo $orderNo; ?><br />
			   Email id  : <span class="namecol"><?php echo $emailId; ?></span>
               </div>
               </div>
               
               <div class="col-md-6"><img src="<?php echo base_url(); ?>/assets/images/travel-result.jpg"/></div>
               </div>
               <div>&nbsp;</div>
                  <div class="row">

                    <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                        <div class="modal-dialog">
                           <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                           <button type="button" class="btn btn-default" data-dismiss="modal" id="closeModel">Close</button>
                        </div>
                     </div>
<input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">
                           <div class="col-md-6 ">
                              <div class="form-group">
                                  <a href="<?php echo base_url();?>Quotetravel/sess_clrTravel"  >
                                 <button type="button" id="calculate" class="btn blue btn-default">Send E-mail</button>
                                 </a>
                              </div>
                           </div>
        <!--                    <div class="col-md-5 ">
                              <div class="form-group">
                                 <a href="create-quote-travel">
                                 <button type="button" id="calculate" class="btn blue btn-default">Send Email</button>
                                 </a>
                              </div>
                           </div> -->
                     <!--       <div class="col-md-1">
                              <div class="form-group">
                                 <a href="create-quote-travel">
                                 <button type="button" id="calculate" class="btn blue btn-default">Download PDF</button>
                                 </a>
                              </div>
                           </div> -->
                           <!-- <div class="col-md-1 btnmar1">
                              <div class="form-group">
                                 <a href="create-quote-travel">
                                 <button type="button" id="calculate" class="btn blue btn-default">Email Policy</button>
                                 </a>
                              </div>
                           </div> -->
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                     <a href="<?php echo base_url();?>Quotetravel/sess_clrTravel"  >
                                    <button type="button"  class="btn blue btn-default" ng-click="proposal()" >Back to Home</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
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
