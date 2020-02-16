<script src="<?php echo base_url(); ?>assets/js/custom_critical.js"></script>+
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
                                <a href="index.html	">Home</a>
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
                           <div class="row healthres">                        
                                   
                                   <div class="col-md-7 helathoption">
                                   <?php foreach($premium_array as $pr) {
                                
                                 $radioId = $pr['coverCode'].substr($pr['SumInsured'], 0, -3);
                                 $Premium = number_format($pr['Premium'],'2',".",""); 
                                 $ServiceTax = number_format($pr['ServiceTax'],'2',".",""); 
                                 $TotalPremium = number_format($pr['TotalPremium'],'2',".",""); 

                                    ?> 
                                   <div class="ciresponse1">  
                                   <div class="radio-list">
                                       <label class="radio-inline">
                                       <input type="radio" name="planoption"  class="planOptions"  id="<?php echo $radioId; ?>" ng-value='' value=""  required>  <i class="fa fa-rupee"></i> <?php echo $pr['SumInsured']; ?> </label>

<input type="hidden" name="Premium" id="<?php echo $radioId; ?>_premium" value="<?php echo $Premium; ?>" > 
<input type="hidden" name="ServiceTax" id="<?php echo $radioId; ?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
<input type="hidden" name="PremiumPayable" id="<?php echo $radioId; ?>_TotalPremium" value="<?php echo $TotalPremium; ?>" >                                        
                                
                                    </div>
                                    </div>
                                    <?php } ?>

<input type="hidden" name="Premium" id="selectedpremium" value="" > 
<input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
<input type="hidden" name="TotalPremium" id="TotalPremium" value="" >  



                                   </div> 
                                     <div class="col-md-5"><img src="<?php echo base_url(); ?>assets/images/CI-MODEL.jpg"></div>
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
                                <a href="<?php echo base_url(); ?>create-lead-critical-illnes">
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
<div class="col-md-4">
                            <div class="portlet mainabtbg about-text">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="policytxt">Type of Policy:</div>
                              <div class="policysubtxt">Critical Illnes </div>
                              <div class="policytxt">Family Type:</div>
                              <div class="policysubtxt">Self Only</div>
                              
                              <div>&nbsp;</div>
                              <div class="form-group">
                                                                    <button type="button" id="calculate" class="btn blue btn-default">Edit Details</button>
                                                                    
                                                                </div> 
                                    </div>
                                   
                                </div>
                        
                                
                            </div>
                            
                            
                            
                            <div class="portlet mainabtbg about-text">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="policytxt">List of 20 Critical Illnesses:</div>
                                    
                                    <div class="policysubtxt">1) Cancer</div>
                                    <div class="policysubtxt">2) First Heart Attack</div>
                                    <div class="policysubtxt">3) Coronary Artery Disease</div>
                                    <div class="policysubtxt">4) Coronary Artery Bypass Surgery</div>
                                    <div class="policysubtxt">5) Open Heart replacement</div>
                                    <div class="policysubtxt">6) Surgery to Aorta</div>
                                    <div class="policysubtxt">7) Stroke</div>
                                    <div class="policysubtxt">8) Kidney Failure</div>
                                    <div class="policysubtxt">9) Aplastic Anaemia</div>
                                    <div class="policysubtxt">10) End Stage Lung Disease</div>
                                    <div class="policysubtxt">11) End Stage Liver Failure</div>
                                    <div class="policysubtxt">12) Coma</div>
                                    <div class="policysubtxt">13) Major Burns</div>
                                    <div class="policysubtxt">14) Major Organ/Bone Marrow Transplantation</div>
                                    <div class="policysubtxt">15) Multiple Sclerosis</div>
                                    <div class="policysubtxt">16) Fulminant Hepatitis</div>
                                    <div class="policysubtxt">17) Motor Neurone Disease</div>
                                    <div class="policysubtxt">18) Primary Pulmonary Hypertension</div>
                                    <div class="policysubtxt">19) Terminal Illness</div>
                                    <div class="policysubtxt">20) Bacterial Meningitis</div>
                                    </div>
                                    
                              <div>&nbsp;</div>
                               
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
jQuery(document).ready(function() { 
    $(document).on('click', '.planOptions', function() {
        
        var coverCode = this.id;
        var PremiumFiled = coverCode+'_premium';
        var PremiumValue = $('#'+PremiumFiled).val();
      
        var ServiceTaxFiled = coverCode+'_ServiceTax';
        var ServiceTaxValue = $('#'+ServiceTaxFiled).val();
       
        var TotalPremiumFiled = coverCode+'_TotalPremium';
        var TotalPremiumValue = $('#'+TotalPremiumFiled).val();

        $('#selectedpremium').val(PremiumValue);
        $('#selectedServiceTax').val(ServiceTaxValue);
        $('#TotalPremium').val(TotalPremiumValue);

         $('#premiumBefore').text(PremiumValue+'/-');
         $('#premiumGST').text(ServiceTaxValue+'/-');
         $('#payablePremium').text(TotalPremiumValue+'/-');
    }); 

}); 




$( document ).ready(function() {  
function createLeadSting(){

      var FirstName = "<?php echo $this->session->userdata('critical_FirstName');?>";
      var LastName =  "<?php echo $this->session->userdata('critical_LastName');?>";
      var mx_Category= "<?php echo $this->session->userdata('critical_mx_Category');?>";
      var mx_Line_of_Business= "<?php echo $this->session->userdata('critical_mx_Line_of_Business');?>";
      var mx_HDFC_Branch_Location= "<?php echo $this->session->userdata('critical_mx_HDFC_Branch_Location');?>";
      var mx_HDFC_Ergo_Location= "<?php echo $this->session->userdata('critical_mx_HDFC_Ergo_Location');?>";
      var mx_Priority= "<?php echo $this->session->userdata('critical_mx_Priority');?>";
      var mx_Target_Date= "<?php echo $this->session->userdata('critical_mx_Target_Date');?>";
      var mx_TSE_BDR_Code= "<?php echo $this->session->userdata('critical_mx_TSE_BDR_Code');?>";
      var mx_TL_Code= "<?php echo $this->session->userdata('critical_mx_TL_Code');?>";
      var mx_SM_Code= "<?php echo $this->session->userdata('critical_mx_SM_Code');?>";
      var mx_Bank_Verifier_ID= "<?php echo $this->session->userdata('critical_mx_Bank_Verifier_ID');?>";
      var mx_Payment_Type= "<?php echo $this->session->userdata('critical_mx_Payment_Type');?>";
      var mx_Sub_Channel= "<?php echo $this->session->userdata('critical_mx_Sub_Channel');?>";
      var mx_HDFC_Card_Relationship_No= "<?php echo $this->session->userdata('critical_mx_HDFC_Card_Relationship_No');?>";
      var mx_HDFC_Card_Last_4_digits= "<?php echo $this->session->userdata('critical_mx_HDFC_Card_Last_4_digits');?>";
      var mx_DOB= "<?php echo $this->session->userdata('critical_mx_DOB');?>";
      var mx_Case_id= "<?php echo $this->session->userdata('critical_mx_Case_id');?>";
      var mx_PAN_Card= "<?php echo $this->session->userdata('critical_mx_PAN_Card');?>";
      var mx_Street1= "<?php echo $this->session->userdata('critical_mx_Street1');?>";
      var mx_Street2= "<?php echo $this->session->userdata('critical_mx_Street2');?>";
      var mx_Area= "<?php echo $this->session->userdata('critical_mx_Area');?>";
      var mx_City= "<?php echo $this->session->userdata('critical_mx_City');?>";
      var mx_State= "<?php echo $this->session->userdata('critical_mx_State');?>";
      var mx_Zip= "<?php echo $this->session->userdata('critical_mx_Zip');?>";
      var Notes= "<?php echo $this->session->userdata('critical_Notes');?>";
      var EmailAddress= "<?php echo $this->session->userdata('emailcritical');?>";
      var Mobile= "<?php echo $this->session->userdata('mobilecritical');?>";   
      //var EmailAddress= 'shaji_PA01@gmail.com';
      var mx_Quote_Id = "<?php echo $QuoteNo; ?>";   
      var QuoteNo = "<?php echo $OrderNo; ?>";
     // var mx_Quote_URL = "http://localhost/bhartiAXA-NEW/quote-view/<?php echo base64_encode($QuoteNo) ?>"; 




    var mx_quote_details = "Type of Policy:Personal Accident, \\n Type of Trip : Self";
    var basePremium  = $('#selectedpremium').val(); 
      if(basePremium == ''){
          alert('Please select plan...');
          return false;
      }


      var taxValue  = $('#selectedServiceTax').val(); 
      var totalPremium  = $('#TotalPremium').val();  
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

      var product = "Critical-Illnes";
      var first_name =  "<?php echo $this->session->userdata('critical_FirstName');?>";
      var last_name = "<?php echo $this->session->userdata('critical_LastName');?>";
      var email = "<?php echo $this->session->userdata('emailcritical');?>";  
      var mobile = "<?php echo $this->session->userdata('mobilecritical');?>";    
      var prospectId =  $('#ProspectId').val();
      var lead_status = "Prospect";
      var state = "<?php echo $this->session->userdata('critical_mx_State');?>";
      var city = "<?php echo $this->session->userdata('critical_mx_City');?>";
    
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
    } //  function insertLeadHistory() 



});  

</script>                            