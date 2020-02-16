<script src="<?php echo base_url(); ?>assets/js/custom_travel.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->

                    <!-- END THEME PANEL -->
                    <h3 class="page-title">Premium Response - <?php echo $title ?>

                    </h3>
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="index.html">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="#">Leads</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>  Premium Response</span>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
<div class="col-md-8">
                           
                     <div class="portlet box gray-gray">
                                <div class="portlet-title">
                                    <div class="caption">
                                      Premium Details </div>
                                    
                                </div>
                                <div class="portlet-body planbox">
                                    <div>
                           <div class="row travelres">                        
                                   <div class="col-md-5">Plan Name</div>
                                   <div class="col-md-3">Sum Insured (€)</div> 
                                   <div class="col-md-4">Total Premium(<i class="fa fa-rupee"></i>)</div>  
                                        </div>
                                        <div id="family">
                               


                               <?php foreach($premium_choice_array as $pr){ 


                                    $Premium = number_format($pr['Premium'],'2',".",""); 
                                    $ServiceTax = number_format($pr['ServiceTax'],'2',".",""); 
                                    $PremiumPayable = number_format($pr['PremiumPayable'],'2',".",""); 
                                    $PlanId = $pr['PlanId']; 
                                    $PlanName = $pr['PlanName']; 

                                ?>
                                        <div class="row travelrestxt">                       
                                   <div class="col-md-5">
                                   <div class="radio-list">
                                       <label class="radio-inline">
<input type="radio"  name="silver" ng-model='silver' class="planOptions" value="silver" id="<?php echo $PlanId; ?>"  > <?php echo $pr['PlanName']; ?> </label>
                                       
                                
                                    </div>
                                   </div>
                                   <div class="col-md-3"><?php echo $pr['SumInsured']; ?></div> 
                                   <div class="col-md-4"><?php echo number_format($pr['Premium'],'2',".",""); ?></div> 

<input type="hidden" name="PlanName" id="<?php echo $PlanId?>_PlanName" value="<?php echo $PlanName; ?>" > 
<input type="hidden" name="Premium" id="<?php echo $PlanId?>_premium" value="<?php echo $Premium; ?>" > 
<input type="hidden" name="ServiceTax" id="<?php echo $PlanId?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
<input type="hidden" name="PremiumPayable" id="<?php echo $PlanId?>_PremiumPayable" value="<?php echo $PremiumPayable; ?>" > 
                                        </div>

<?php } ?>

<input type="hidden" name="selectedPlanName" id="selectedPlanName" value="" > 
<input type="hidden" name="Premium" id="selectedpremium" value="" > 
<input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
<input type="hidden" name="PremiumPayable" id="selectedPremiumPayable" value="" > 






                                        </div>

                                        <div id="student" style="display:none">
                                        <div class="row travelrestxt">                       
                                   <div class="col-md-5">
                                   <div class="radio-list">
                                       <label class="radio-inline">
                                       <input type="radio" name="silver" ng-model='silver' ng-value='silver' value="silver"  required> Smart Traveller Student Standard </label>
                                       
                                
                                    </div>
                                   </div>
                                   <div class="col-md-3">30000</div> 
                                   <div class="col-md-4">463.00</div>  
                                        </div>
                                        <div class="row travelrestxt">                       
                                   <div class="col-md-5">
                                   <div class="radio-list">
                                       <label class="radio-inline">
                                       <input type="radio" name="gold" ng-model='gold' ng-value='gold' value="gold"  required> Smart Traveller Student Silver
 </label>
                                       
                                
                                    </div>
                                   </div>
                                   <div class="col-md-3">30000</div> 
                                   <div class="col-md-4">463.00</div>  
                                        </div>
                                        <div class="row travelrestxt">                       
                                   <div class="col-md-5">
                                   <div class="radio-list">
                                       <label class="radio-inline">
                                       <input type="radio" name="platinum" ng-model='platinum' ng-value='platinum' value="platinum"  required> Smart Traveller Student Gold </label>
                                       
                                
                                    </div>
                                   </div>
                                   <div class="col-md-3">30000</div> 
                                   <div class="col-md-4">463.00</div>  
                                        </div>
                                        <div class="row travelrestxt">                       
                                   <div class="col-md-5">
                                   <div class="radio-list">
                                       <label class="radio-inline">
                                       <input type="radio" name="platinum" ng-model='platinum' ng-value='platinum' value="platinum"  required> Smart Traveller Student Platinum </label>
                                       
                                
                                    </div>
                                   </div>
                                   <div class="col-md-3">30000</div> 
                                   <div class="col-md-4">463.00</div>  
                                        </div>
                                        </div>
                                        <div class="travelbottomtxt">
                                        * You may select the plan after going through the benefits available under each plan.<br>
<a href="#">If you wish to see the benefits, please click here</a>
                                        </div>
                                        <div class="portlet quotepay box mainbordersalt">
                                <div class="portlet-title">
                                    <div class="row mainpaym">
                           <div class="col-md-6">
                           <div>Premium before tax: <i class="fa fa-rupee"></i> <span id="premiumBefore">0/-</span></div>
                           <div>GST: <i class="fa fa-rupee"></i> <span id="premiumGST">0/-</span></div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
                           <div>Payable Premium</div>
                           <div><i class="fa fa-rupee"></i> <span id="payablePremium">0/-</span></div>
                           </div>
                           </div>
                           
                        </div>
                                    
                                </div>
                                
                            </div>
                     <div class="row">
                           <div class="col-md-6">
                           <div class="form-group">
                                <a href="<?php echo base_url(); ?>create-lead-travel">
                                <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                                                                    
                                                                </div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
                          <!--  <div class="col-md-5"><a href="#" >&nbsp;</div> -->
<!--                           <div class="col-md-3">
                          <div class="form-group">
                                  <button type="button" id="sendQuote" class="btn blue btn-default">Send Quote</button>
                                                                    
                            </div>
                          </div> -->



                                 <div class="form-group">
                                    <input type="hidden" id="ProspectId"  name="ProspectId" ng-model='ProspectId'>
                                    <input type="hidden" id="leadString"  name="leadString" >
                                    <a href="#" id="saveLead">
                                    <button type="button"  class="btn blue btn-default"  ng-click="saveLead()">Save Lead</button>
                                    </a>
                                 </div>
                           </div>
                           </div>
                           
                        </div>
                                 </div>
                                </div>
                        
                            </div>
                     
                        </div>
                       <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">


                                       <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                                          <div class="modal-dialog">
                                             <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                                             <button type="button" class="btn btn-default" id="closeModel" data-dismiss="modal">Close</button>
                                          </div>
                                       </div>                       

<div class="col-md-4">
                            <div class="portlet mainabtbg about-text">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="policytxt">Type of Policy:</div>
                              <div class="policysubtxt">Travel Insurance Student</div>
                              <div class="policytxt">Type of Trip</div>
                              <div class="policysubtxt">Single Trip</div>
                              <div class="policytxt">Payable Premium (<i class="fa fa-rupee"></i>):</div>
                              <div class="policysubtxt" id="payablePremiumSide">0/-</div>
                              <div>&nbsp;</div>
                              <div class="form-group">
                                                                  <!--   <button type="button" id="calculate" class="btn blue btn-default">Edit Details</button> -->
                                                                    
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
                <!-- END CONTENT BODY -->
            </div>
    
<script type="text/javascript">
jQuery(document).ready(function() { 
    $(document).on('click', '.planOptions', function() {
        
        var plan = this.id;
        var PremiumFiled = plan+'_premium';
        var PremiumValue = $('#'+PremiumFiled).val();
       
        var ServiceTaxFiled = plan+'_ServiceTax';
        var ServiceTaxValue = $('#'+ServiceTaxFiled).val();
       
        var PremiumPayableFiled = plan+'_PremiumPayable';
        var PremiumPayableValue = $('#'+PremiumPayableFiled).val();
       // alert(PremiumValue);
        var PlanNameFiled = plan+'_PlanName';
        var PlanNameValue = $('#'+PlanNameFiled).val();
        $('#premiumBefore').text(PremiumValue+'/-');
        $('#premiumGST').text(ServiceTaxValue+'/-');
        $('#payablePremium').text(PremiumPayableValue+'/-');
        $('#payablePremiumSide').text(PremiumPayableValue+'/-');


        $('#selectedPlanName').val(PlanNameValue);
        $('#selectedpremium').val(PremiumValue);
        $('#selectedServiceTax').val(ServiceTaxValue);
        $('#selectedPremiumPayable').val(PremiumPayableValue);

        //$("#"+plan).attr('checked', 'true');

    }); 

}); 


$( document ).ready(function() {  
function createLeadSting(){

      var FirstName = "<?php echo $this->session->userdata('travel_FirstName');?>";
      var LastName =  "<?php echo $this->session->userdata('travel_LastName');?>";
      var mx_Category= "<?php echo $this->session->userdata('travel_mx_Category');?>";
      var mx_Line_of_Business= "<?php echo $this->session->userdata('travel_mx_Line_of_Business');?>";
      var mx_HDFC_Branch_Location= "<?php echo $this->session->userdata('travel_mx_HDFC_Branch_Location');?>";
      var mx_HDFC_Ergo_Location= "<?php echo $this->session->userdata('travel_mx_HDFC_Ergo_Location');?>";
      var mx_Priority= "<?php echo $this->session->userdata('travel_mx_Priority');?>";
      var mx_Target_Date= "<?php echo $this->session->userdata('travel_mx_Target_Date');?>";
      var mx_TSE_BDR_Code= "<?php echo $this->session->userdata('travel_mx_TSE_BDR_Code');?>";
      var mx_TL_Code= "<?php echo $this->session->userdata('travel_mx_TL_Code');?>";
      var mx_SM_Code= "<?php echo $this->session->userdata('travel_mx_SM_Code');?>";
      var mx_Bank_Verifier_ID= "<?php echo $this->session->userdata('travel_mx_Bank_Verifier_ID');?>";
      var mx_Payment_Type= "<?php echo $this->session->userdata('travel_mx_Payment_Type');?>";
      var mx_Sub_Channel= "<?php echo $this->session->userdata('travel_mx_Sub_Channel');?>";
      var mx_HDFC_Card_Relationship_No= "<?php echo $this->session->userdata('travel_mx_HDFC_Card_Relationship_No');?>";
      var mx_HDFC_Card_Last_4_digits= "<?php echo $this->session->userdata('travel_mx_HDFC_Card_Last_4_digits');?>";
      var mx_DOB= "<?php echo $this->session->userdata('travel_mx_DOB');?>";
      var mx_Case_id= "<?php echo $this->session->userdata('travel_mx_Case_id');?>";
      var mx_PAN_Card= "<?php echo $this->session->userdata('travel_mx_PAN_Card');?>";
      var mx_Street1= "<?php echo $this->session->userdata('travel_mx_Street1');?>";
      var mx_Street2= "<?php echo $this->session->userdata('travel_mx_Street2');?>";
      var mx_Area= "<?php echo $this->session->userdata('travel_mx_Area');?>";
      var mx_City= "<?php echo $this->session->userdata('travel_mx_City');?>";
      var mx_State= "<?php echo $this->session->userdata('travel_mx_State');?>";
      var mx_Zip= "<?php echo $this->session->userdata('travel_mx_Zip');?>";
      var Notes= "<?php echo $this->session->userdata('travel_Notes');?>";
      var EmailAddress= "<?php echo $this->session->userdata('emailtravel');?>";   
      var Mobile= "<?php echo $this->session->userdata('mobiletravel');?>";   

     // var EmailAddress= 'shajitravel99t1@gmail.com';
      var mx_Quote_Id = "<?php echo $QuoteNo; ?>";   
      var QuoteNo = "<?php echo $OrderNo; ?>";
      var mx_Quote_URL = "http://localhost/bhartiAXA-NEW/quote-view/<?php echo base64_encode($QuoteNo) ?>"; 




      var mx_quote_details = "Type of Policy:Travel Insurance Student, \\n Type of Trip : Single Trip";
 


      var basePremium  = $('#selectedpremium').val(); 
      if(basePremium == ''){
          alert('Please select plan...');
          return false;
      }


      var taxValue  = $('#selectedServiceTax').val(); 
      var totalPremium  = $('#selectedPremiumPayable').val();  
      var planName  = $('#selectedPlanName').val();  
      
      var mx_premium_details = "Selected Plan : "+planName+" \\n Premium before tax : "+basePremium+"\\n GST : "+taxValue+"\\n Payable Premium : "+totalPremium;    
      var dataString = '[{"Attribute": "EmailAddress","Value": "'+EmailAddress+'"},{"Attribute": "FirstName","Value": "'+FirstName+'"},{"Attribute": "LastName","Value": "'+LastName+'"},{"Attribute": "mx_Category","Value": "'+mx_Category+'"},{"Attribute": "mx_Line_of_Business","Value": "'+mx_Line_of_Business+'"},{"Attribute": "mx_HDFC_Branch_Location","Value": "'+mx_HDFC_Branch_Location+'"},{"Attribute": "mx_HDFC_Ergo_Location","Value": "'+mx_HDFC_Ergo_Location+'"},{"Attribute": "mx_Priority","Value": "'+mx_Priority+'"},{"Attribute": "mx_Target_Date","Value": "'+mx_Target_Date+'"},{"Attribute": "mx_TSE_BDR_Code","Value": "'+mx_TSE_BDR_Code+'"},{"Attribute": "mx_TL_Code","Value": "'+mx_TL_Code+'"},{"Attribute": "mx_SM_Code","Value": "'+mx_SM_Code+'"},{"Attribute": "mx_Bank_Verifier_ID","Value": "'+mx_Bank_Verifier_ID+'"},{"Attribute": "mx_Payment_Type","Value": "'+mx_Payment_Type+'"},{"Attribute": "mx_Sub_Channel","Value": "'+mx_Sub_Channel+'"},{"Attribute": "mx_HDFC_Card_Relationship_No","Value": "'+mx_HDFC_Card_Relationship_No+'"},{"Attribute": "mx_HDFC_Card_Last_4_digits","Value": "'+mx_HDFC_Card_Last_4_digits+'"},{"Attribute": "mx_DOB","Value": "'+mx_DOB+'"},{"Attribute": "mx_Case_id","Value": "'+mx_Case_id+'"},{"Attribute": "mx_PAN_Card","Value": "'+mx_PAN_Card+'"},{"Attribute": "mx_Street1","Value": "'+mx_Street1+'"},{"Attribute": "mx_Street2","Value": "'+mx_Street2+'"},{"Attribute": "mx_Area","Value": "'+mx_Area+'"},{"Attribute": "mx_City","Value": "'+mx_City+'"},{"Attribute": "mx_State","Value": "'+mx_State+'"},{"Attribute": "mx_Zip","Value": "'+mx_Zip+'"},{"Attribute": "mx_Quote_Id","Value": "'+mx_Quote_Id+'"},{"Attribute": "Notes","Value": "'+Notes+'"},{"Attribute": "mx_quote_details","Value": "'+mx_quote_details+'"},{"Attribute": "mx_premium_details","Value": "'+mx_premium_details+'"},{"Attribute": "Mobile","Value": "'+Mobile+'"},{"Attribute": "Phone","Value": "'+Mobile+'"}]';
      


     $('#leadString').val(dataString);

}

     $('#saveLead').click(function(){

          var basePremium  = $('#selectedpremium').val(); 
          if(basePremium == ''){
              alert('Please select plan...');
              return false;
          }

          createLeadSting();
             $("#load_model").click();
            var leadString = $('#leadString').val();
            alert(leadString); 
       
            $('#load_modal').click();
            $.ajax({
              url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Create?accessKey=u$r3c4de58f6a402ca29db52c2428a78049&secretKey=56c63ad69633990d029bdfe874bba1d9809b2d87',
                dataType: 'json',
                type: 'post',       
                contentType: 'application/json',
                data: leadString,
                processData: false,
                success: function( data){
                    var dataArray =  JSON.stringify(data);
                    var parsedArray = JSON.parse(dataArray);
                    var statusResponse = parsedArray.Status;
                    var ProspectId = parsedArray.Message.Id;
                    $('#ProspectId').val(ProspectId);

                    insertLeadHistory();
                    
                    alert (statusResponse +' Refrence Id is : '+ ProspectId);
                    
                    $("#closeModel").click();
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    $('#load_modal').click();

                    var dataArray =  JSON.stringify(jqXhr);
                    var jsonArray = JSON.parse(dataArray);
                    var statusResponse = JSON.parse(jsonArray.responseText).Status;
                    var ExceptionType = JSON.parse(jsonArray.responseText).ExceptionMessage;
                    alert(statusResponse+' - '+ExceptionType);

                    $("#closeModel").click();

                }
            });
                        


    })
    

    function insertLeadHistory() {

      var product = "Travel";
      var first_name =  "<?php echo $this->session->userdata('travel_FirstName');?>";
      var last_name = "<?php echo $this->session->userdata('travel_LastName');?>";
      var email = "<?php echo $this->session->userdata('emailtravel');?>";  
      var mobile = "<?php echo $this->session->userdata('mobiletravel');?>";    
      var prospectId =  $('#ProspectId').val();
      var lead_status = "Prospect";
      var state = "<?php echo $this->session->userdata('travel_mx_State');?>";
      var city = "<?php echo $this->session->userdata('travel_mx_City');?>";
      var premium = $('#selectedpremium').val(); 
      var tax = $('#selectedServiceTax').val(); 
      var total_premium =  $('#selectedPremiumPayable').val();  

      var webUrl = $('#web_url').val();
      var URL = webUrl+'lead_history/addLeadHistory/';
      
        $.ajax({

               url : URL,
                type : 'POST',
                data : {
                    'product' : product,
                    'first_name' : first_name,
                    'last_name' : last_name,
                    'email' : email,
                    'mobile' : mobile,
                    'prospectId' : prospectId,
                    'lead_status' : lead_status,
                    'state' : state,
                    'city' : city,
                    'premium' : premium,
                    'tax' : tax,
                    'total_premium' : total_premium,
                  },
                dataType:'json',
              
                success: function( data){
                     
   
                },
           });
    } //  function insertLeadHistory() { ends here... 

});   

</script>