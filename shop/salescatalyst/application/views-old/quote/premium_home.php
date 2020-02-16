<script src="<?php echo base_url(); ?>assets/js/custom_home.js"></script>
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
   <div class="col-md-12">
                            
                     <div class="portlet box gray-gray">
                                <div class="portlet-title">
                                    <div class="caption">
                                      <strong>Select your plan & Customize your policy</strong> </div>
                                    
                                </div>
                                
                                <div class="portlet-body planbox">
                                    <div class="panel-group accordion" id="accordion3">
                           <div>
                           
                                    <div class="row homeres">
                           <?php foreach($premiumArray as $pr ) { ?>
                          
                              <div class="col-md-4">
                                 <div class="radio-list homesilver">
                                    <div id="<?php echo $pr['planName']; ?>_selection" class='selInfoDiv'><img src="<?php echo base_url(); ?>/assets/images/redtick.png"> You have selected</div>
                                    <label class="radio-inline">
                                       <input type="radio" class="planOptions" name="planOptions" id="<?php echo $pr['planName']; ?>"> 
                                          <?php echo $pr['planName']; ?> Sum Insured: <i class="fa fa-rupee"></i> <?php echo $pr['sumInsured'];?> /- 
                                       </label>
                                 </div>
<input type="hidden" name="Premium" id="<?php echo $pr['planName']?>_premium" value="<?php echo $pr['premium']; ?>" > 
<input type="hidden" name="ServiceTax" id="<?php echo $pr['planName']?>_ServiceTax" value="<?php echo $pr['serviceTax']; ?>" > 
<input type="hidden" name="PremiumPayable" id="<?php echo $pr['planName']?>_TotalPremium" value="<?php echo $pr['premiumPayable']; ?>" > 


                                 <ul class="homesliverlistinactive ulBenefit" id="<?php echo $pr['planName']; ?>_benefits" >
                                    <?php foreach($pr['benefits'] as $bns ) { ?>
                                    <li><?php echo $bns['label'].' : '.$bns['value']; ?>/-</li>
                                    <?php } ?>
                                 </ul>
                              </div>
                           <?php } ?>             



<input type="hidden" name="Premium" id="selectedpremium" value="" > 
<input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
<input type="hidden" name="TotalPremium" id="TotalPremium" value="" >
                                    </div>
                           <div>&nbsp;</div>
                           
                                    </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading mainaccor">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#referal" href="#referal" aria-expanded="false"> Remarks </a>
                                                </h4>
                                            </div>
                                            <div id="referal" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                  <ul class="remarks">
                                      <li> Home contents (Fire incl. EQ and Burglary) : Allowed up to max. Rs.__________</li>
                                    <li> Valuables : Allowed upto 20% of Contents SI</li>
                                    <li>Appliances : Allowed upto 20% of Contents SI</li>
                                      <li>Loss of documents - Title Deeds : Allowed upto 2% of conents SI</li>
                                    <li>Loss of documents - Passport : Allowed upto 2% of conents SI</li>
                                    <li>House-hold Removal: Removal of contents and appliances from the present building to a new building within the country : Allowed upto 5% of contents SI</li>
                                     <li>Personal Accident : Allowed upto 2 Times of Contents SI*</li>
                                    <li>Additional rent for alternate accommodation : Upto 6 months limited to Rs 100000 or10% of content SI whichever is lower</li>
                                    <li>Pet Insurance :</li>
                                    <li> Baggage Insurance : Upto Max. Rs._______</li>
                                    <li>Third Party Liability: Domestic Servants : Third Party liability covered up to 500000 and Domestic Servants covered as per WC act</li>
                              </ul>
                                          
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet quotepay box mainbordersalt">
                                <div class="portlet-title">
                                    <div class="row mainpaym">
                           <div class="col-md-6">
                           <div>Premium before tax: <i class="fa fa-rupee"></i><span id="premiumBefore">0/-</span></div>
                           <div>GST: <i class="fa fa-rupee"></i><span id="premiumGST">0/-</span></div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
                           <div>Payable Premium</div>
                           <div><i class="fa fa-rupee"></i><span id="payablePremium">0/-</span></div>
                           </div>
                           </div>
                           
                        </div>
                                    
                                </div>
                                
                            </div>
<!--                      <div class="row">
                           <div class="col-md-6">
                           <div class="form-group">
                                                   <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                                                                    
                                                                </div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
                           <div class="col-md-5"><a href="#">Save my quote</div>
                           <div class="col-md-3">
                           <div class="form-group">
                                                                    <button type="button" id="calculate" class="btn blue btn-default">Proceed to Proposal</button>
                                                                    
                                                                </div>
                                                </div>
                           </div>
                           </div>
                           
                        </div> -->


                     <div class="row">
                           <div class="col-md-6">
                           <div class="form-group">
                                <a href="<?php echo base_url(); ?>create-lead-home">
                                <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                                                                    
                                                                </div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
  


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

</div>
                  
                    <!--<div class="note note-info">
                        <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
                    </div>-->
                </div>
                <!-- END CONTENT BODY -->
            </div>
    
<script type="text/javascript">


   $('.selInfoDiv').hide();
    $(document).on('click', '.planOptions', function() {
        
         var planId = this.id;
        //alert(planId);
         var PremiumFiled = planId+'_premium';
         var PremiumValue = $('#'+PremiumFiled).val();
      
         var ServiceTaxFiled = planId+'_ServiceTax';
         var ServiceTaxValue = $('#'+ServiceTaxFiled).val();
       
         var TotalPremiumFiled = planId+'_TotalPremium';
         var TotalPremiumValue = $('#'+TotalPremiumFiled).val();

         $('#selectedpremium').val(PremiumValue);
         $('#selectedServiceTax').val(ServiceTaxValue);
         $('#TotalPremium').val(TotalPremiumValue);

          $('#premiumBefore').text(PremiumValue+'/-');
          $('#premiumGST').text(ServiceTaxValue+'/-');
          $('#payablePremium').text(TotalPremiumValue+'/-');

         var slectPlan =  planId+'_benefits';          
         $('.ulBenefit').removeClass('homesliverlistactive');
         $('.ulBenefit').addClass('homesliverlistinactive');
         $("#"+slectPlan).addClass("homesliverlistactive");
         $("#"+slectPlan).removeClass("homesliverlistinactive");
           //_benefits _selection

         var selectPlanInfo = planId+'_selection'; 
        
         $('.selInfoDiv').hide();

         $('#'+selectPlanInfo).show();

    }); 




$( document ).ready(function() {  
function createLeadSting(){

      var FirstName = "<?php echo $this->session->userdata('Home_FirstName');?>";
      var LastName =  "<?php echo $this->session->userdata('Home_LastName');?>";
      var mx_Category= "<?php echo $this->session->userdata('Home_mx_Category');?>";
      var mx_Line_of_Business= "<?php echo $this->session->userdata('Home_mx_Line_of_Business');?>";
      var mx_HDFC_Branch_Location= "<?php echo $this->session->userdata('Home_mx_HDFC_Branch_Location');?>";
      var mx_HDFC_Ergo_Location= "<?php echo $this->session->userdata('Home_mx_HDFC_Ergo_Location');?>";
      var mx_Priority= "<?php echo $this->session->userdata('Home_mx_Priority');?>";
      var mx_Target_Date= "<?php echo $this->session->userdata('Home_mx_Target_Date');?>";
      var mx_TSE_BDR_Code= "<?php echo $this->session->userdata('Home_mx_TSE_BDR_Code');?>";
      var mx_TL_Code= "<?php echo $this->session->userdata('Home_mx_TL_Code');?>";
      var mx_SM_Code= "<?php echo $this->session->userdata('Home_mx_SM_Code');?>";
      var mx_Bank_Verifier_ID= "<?php echo $this->session->userdata('Home_mx_Bank_Verifier_ID');?>";
      var mx_Payment_Type= "<?php echo $this->session->userdata('Home_mx_Payment_Type');?>";
      var mx_Sub_Channel= "<?php echo $this->session->userdata('Home_mx_Sub_Channel');?>";
      var mx_HDFC_Card_Relationship_No= "<?php echo $this->session->userdata('Home_mx_HDFC_Card_Relationship_No');?>";
      var mx_HDFC_Card_Last_4_digits= "<?php echo $this->session->userdata('Home_mx_HDFC_Card_Last_4_digits');?>";
      var mx_DOB= "<?php echo $this->session->userdata('Home_mx_DOB');?>";
      var mx_Case_id= "<?php echo $this->session->userdata('Home_mx_Case_id');?>";
      var mx_PAN_Card= "<?php echo $this->session->userdata('Home_mx_PAN_Card');?>";
      var mx_Street1= "<?php echo $this->session->userdata('Home_mx_Street1');?>";
      var mx_Street2= "<?php echo $this->session->userdata('Home_mx_Street2');?>";
      var mx_Area= "<?php echo $this->session->userdata('Home_mx_Area');?>";
      var mx_City= "<?php echo $this->session->userdata('Home_mx_City');?>";
      var mx_State= "<?php echo $this->session->userdata('Home_mx_State');?>";
      var mx_Zip= "<?php echo $this->session->userdata('Home_mx_Zip');?>";
      var Notes= "<?php echo $this->session->userdata('Home_Notes');?>";
      var EmailAddress= "<?php echo $this->session->userdata('home_email');?>";
      var Mobile= "<?php echo $this->session->userdata('home_mobile');?>";   
      // var EmailAddress= 'shankar_home121@gmail.com';
      var mx_Quote_Id = "<?php //echo $QuoteNo; ?>";   
      var QuoteNo = "<?php /// echo $OrderNo; ?>";
     // var mx_Quote_URL = "http://localhost/bhartiAXA-NEW/quote-view/<?php // echo base64_encode($QuoteNo) ?>"; 




    var mx_quote_details = "Type of Policy:Health, \\n Type of Trip : Self";
    var basePremium  = $('#selectedpremium').val(); 
      if(basePremium == ''){
          alert('Please select plan...');
          return false;
      }


      var taxValue  = $('#selectedServiceTax').val(); 
      var totalPremium  = $('#TotalPremium').val();  
     // var planName  = $('#selectedPlanName').val();  
      
      var mx_premium_details = "Premium before tax : "+basePremium+"\\n GST : "+taxValue+"\\n Payable Premium : "+totalPremium; 
   

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
            //alert(leadString); 
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
                    var ProspectId = parsedArray.Message.Id
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

      var product = "Home";
      var first_name =  "<?php echo $this->session->userdata('Home_FirstName');?>";
      var last_name = "<?php echo $this->session->userdata('Home_LastName');?>";
      var email = "<?php echo $this->session->userdata('home_email');?>";  
      var mobile = "<?php echo $this->session->userdata('home_mobile');?>";    
      var prospectId =  $('#ProspectId').val();
      var lead_status = "Prospect";
      var state = "<?php echo $this->session->userdata('Home_mx_State');?>";
      var city = "<?php echo $this->session->userdata('Home_mx_City');?>";
    
      var premium = $('#selectedpremium').val(); 
      var tax = $('#selectedServiceTax').val(); 
      var total_premium =  $('#TotalPremium').val();  

      var webUrl = $('#web_url').val();
      var URL = webUrl+'Lead_history/addLeadHistory/';
      
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
    } //  function insertLeadHistory() { ends here... s

});   


</script>