<script src="<?php echo base_url(); ?>assets/js/custom_tw.js"></script>
<input type='hidden' name="web_url" id="web_url" value="<?php echo base_url(); ?>">
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <h3 class="page-title"> Premium Response - <?php echo $title ?> &nbsp; &nbsp; &nbsp; <span style="display: none" id="send_mail_loader"> <img alt="" class="img-circle" src="images/loading.gif" />Loading...</span></h3>
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
      <div class="row" ng-controller="MainCtrlRe">

 
         <div class="col-md-8">
            <div class="portlet gray-gray box">
               <div class="portlet-title">
                  <div class="caption">
                     Select your plan & Customize your policy 
                  </div>
               </div>
               <div class="portlet-body planbox" id="blockui_sample_4_portlet_body">
                  <div class="row">
                     <div class="col-md-4" style="vertical-align:middle">
                        <p><a href="#" class="btn blue btn-outline sbold " > Premium <i class="fa fa-rupee"></i> <?php  echo round($totalPremium); ?>/- </a>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <ul class="list-unstyled  listcap">
                           <?php foreach( $prDescArray  as $desc) { ?>
                           <li><i class="fa fa-check"></i> <?php  echo $desc; ?> </li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption">
                     Features 
                  </div>
               </div>
               <div class="portlet-body planbox">
                  <div class="panel-group accordion" id="accordion3">
                     <div class="panel panel-default">
                        <div class="panel-heading mainaccor">
                           <h4 class="panel-title">
                              <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="additional" href="#additional" aria-expanded="true"> Additional Discounts & Features </a>
                           </h4>
                        </div>
                        <div id="additional" class="panel-collapse " aria-expanded="true">
                           <div class="panel-body">

                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-percentage.jpg"></div>
                                 <div class="col-md-4 voltxt">Voluntary Deductible</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $ODDeductiblePremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <select name="foo" id="voluntaryDeductible" class="form-control input-sm" ng-model='voluntaryDeductible'>
                                             <option value="0">Select</option>
                                             <option value="500">500</option>
                                             <option value="750">750</option>
                                             <option value="1000">1000</option>
                                             <option value="1500">1500</option>
                                             <option value="3000">3000</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Voluntary_Deductible'] ?>"></div>
                                 </div>
                              </div>
                              

                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-legal.jpg"></div>
                                 <div class="col-md-4 voltxt">Legal Liability to Driver</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $LLDriverPremium; ?> </div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <select  name="driverLibillity" id="driverLibillity" class="form-control input-sm" ng-model='driverLibillity'>
                                             <option value="False">Select</option>
                                             <option value="True" >Yes</option>
                                             <option value="False" >No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Legal_Liability'] ?>"></div>
                                 </div>
                              </div>





                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-arai.jpg"></div>
                                 <div class="col-md-4 voltxt">Do you wish to Restrict TPPD Cover</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $TPPDPremium; ?> </div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <select  name="restrictTPPDCover" id="restrictTPPDCover" class="form-control input-sm" ng-model='restrictTPPDCover'>
                                             <option value="0">Select</option>
                                             <option value="True">Yes</option>
                                             <option value="False">No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Restrict_TPPD'] ?>"></div>
                                 </div>
                              </div>


                              <div class="row maincontf">
                                 <div class="col-md-9"></div>
                                 <div class="col-md-3">
                                    <div class="form-group" style="margin-left:5%">
  <!-- <button type="button" id="re-calculate" class="btn blue btn-default" ng-click="psetRecalculate()">Re Caluclate</button> -->

  <button type="submit" class="btn blue btn-default" ng-click="psetRecalculate()">Re Calculate </button> 
                                    </div>
                                 </div>
                              </div>


                           </div>
                        </div>
                     </div>
                     <div class="portlet quotepay box mainbordersalt">
                        <div class="portlet-title">
                           <div class="row mainpaym">
                              <div class="col-md-6">
                                 <div>Premium before tax: <i class="fa fa-rupee"></i> <?php echo $prAmt; ?>/-</div>
                                 <div>GST: <i class="fa fa-rupee"></i> <?php echo $taxValue; ?>/-</div>
                              </div>
                              <div class="col-md-6">
                                 <div class="pull-right">
                                    <div>Payable Premium</div>
                                    <div><i class="fa fa-rupee"></i> <?php echo $totalPremium; ?>/-</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <a href="<?php echo base_url(); ?>create-lead-two-wheeler" title="Back to Quote">
                              <button type="button" id="back" class="btn blue btn-default">Back</button>
                              </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="pull-right">
                              <div class="col-md-3">
<!--                                  <div class="form-group">
                                    <input type="hidden" id="ProspectId"  name="ProspectId" ng-model='ProspectId'>
                                    <input type="hidden" id="leadString"  name="leadString" >
                                    <a href="#" id="saveQuote">
                                    <button type="button"  class="btn blue btn-default">Save Quote</button>
                                    </a>
                                 </div>
 -->

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


                                    <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                                       <div class="modal-dialog">
                                          <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                                          <button type="button" class="btn btn-default" id="close_model"  data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                    <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">

         <div class="col-md-4">
            <div class="portlet mainabtbg about-text">
               <div class="row">
                  <div class="col-md-12">
                     <div class="policytxt">Type of Policy:</div>
                     <div class="policysubtxt">Renew Non-BharatiAXA Policy</div>
                     <div class="policytxt">Make/Model:</div>
                     <div class="policysubtxt"><?php echo $vechicleModal; ?></div>
                     <div class="policytxt">City of Registration:</div>
                     <div class="policysubtxt"><?php echo $cityOfRegistration; ?></div>
                     <div class="policytxt">Year of Manufacture:</div>
                     <div class="policysubtxt"><?php echo $dateOfManufacture; ?></div>
                     <div class="policytxt">Policy Expire Date:</div>
                     <div class="policysubtxt"><?php echo $policyExpiryDate; ?></div>
                     <div class="policytxt">Claim in Expiring Policy:</div>
                     <div class="policysubtxt"><?php echo $policyExpiry; ?></div>
                     <div class="policytxt">NCB Expiring Policy:</div>
                     <div class="policysubtxt"><?php echo $NCBExpiry; ?></div>
                     <div class="policytxt">Insured Declared varlue (<i class="fa fa-rupee"></i>):</div>
                     <div class="policysubtxt"><?php echo $IDVValue; ?></div>
                     <div>&nbsp;</div>
                     <!--<div class="form-group">
                        <button type="button" id="calculate" class="btn blue btn-default">Edit Details</button>
                        
                        </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
   <!-- END CONTENT BODY -->
</div>

<script>

$( document ).ready(function() {  

   $('#voluntaryDeductible').val('<?php echo $selDeduct; ?>');
   $('#driverLibillity').val('<?php echo $driverLibillity; ?>');
   $('#restrictTPPDCover').val('<?php echo $TPPDSelect; ?>');

 function createLeadSting(){

      var FirstName = "<?php echo $this->session->userdata('tw_FirstName');?>";
      var LastName =  "<?php echo $this->session->userdata('tw_LastName');?>";
      var mx_Category= "<?php echo $this->session->userdata('tw_mx_Category');?>";
      var mx_Line_of_Business= "<?php echo $this->session->userdata('tw_mx_Line_of_Business');?>";
      var mx_HDFC_Branch_Location= "<?php echo $this->session->userdata('tw_mx_HDFC_Branch_Location');?>";
      var mx_HDFC_Ergo_Location= "<?php echo $this->session->userdata('tw_mx_HDFC_Ergo_Location');?>";
      var mx_Priority= "<?php echo $this->session->userdata('tw_mx_Priority');?>";
      var mx_Target_Date= "<?php echo $this->session->userdata('tw_mx_Target_Date');?>";
      var mx_TSE_BDR_Code= "<?php echo $this->session->userdata('tw_mx_TSE_BDR_Code');?>";
      var mx_TL_Code= "<?php echo $this->session->userdata('tw_mx_TL_Code');?>";
      var mx_SM_Code= "<?php echo $this->session->userdata('tw_mx_SM_Code');?>";
      var mx_Bank_Verifier_ID= "<?php echo $this->session->userdata('tw_mx_Bank_Verifier_ID');?>";
      var mx_Payment_Type= "<?php echo $this->session->userdata('tw_mx_Payment_Type');?>";
      var mx_Sub_Channel= "<?php echo $this->session->userdata('tw_mx_Sub_Channel');?>";
      var mx_HDFC_Card_Relationship_No= "<?php echo $this->session->userdata('tw_mx_HDFC_Card_Relationship_No');?>";
      var mx_HDFC_Card_Last_4_digits= "<?php echo $this->session->userdata('tw_mx_HDFC_Card_Last_4_digits');?>";
      var mx_DOB= "<?php echo $this->session->userdata('tw_mx_DOB');?>";
      var mx_Case_id= "<?php echo $this->session->userdata('tw_mx_Case_id');?>";
      var mx_PAN_Card= "<?php echo $this->session->userdata('tw_mx_PAN_Card');?>";
      var mx_Street1= "<?php echo $this->session->userdata('tw_mx_Street1');?>";
      var mx_Street2= "<?php echo $this->session->userdata('tw_mx_Street2');?>";
      var mx_Area= "<?php echo $this->session->userdata('tw_mx_Area');?>";
      var mx_City= "<?php echo $this->session->userdata('tw_mx_City');?>";
      var mx_State= "<?php echo $this->session->userdata('tw_mx_State');?>";
      var mx_Zip= "<?php echo $this->session->userdata('tw_mx_Zip');?>";
      var Notes= "<?php echo $this->session->userdata('tw_Notes');?>";
      var Notes= "<?php echo $this->session->userdata('tw_Notes');?>";
	   var Mobile= "<?php  echo $this->session->userdata('mobiletwo');?>";
      var EmailAddress= "<?php  echo $this->session->userdata('emailtwo');?>";   
      //var EmailAddress= "sankarktest001@gmail.com";   
      var mx_Quote_Id = "<?php echo $QuoteNo; ?>";   
      var QuoteNo = "<?php echo $OrderNo; ?>";
     

      var vechModel= "<?php echo $vechicleModal;?>";
      var cityOfRegistration= "<?php echo $cityOfRegistration;?>";
      var dateOfManufacture= "<?php echo $dateOfManufacture;?>";
      var policyExpiryDate= "<?php echo $policyExpiryDate;?>";
      var policyExpiry= "<?php echo $policyExpiry;?>";
      var NCBExpiry= "<?php echo $NCBExpiry;?>";
      var IDVValue= "<?php echo $IDVValue;?>";

      var mx_quote_details = "Type of Policy:Renew Non-BharatiAXA Policy, \\n Make/Model :"+vechModel+" \\n City of Registration : "+cityOfRegistration+" \\n Year of Manufacture :"+dateOfManufacture+" \\n Policy Expire Date : "+policyExpiryDate+"\\n Claim in Expiring Policy : "+policyExpiry+"\\n NCB Expiring Policy : "+NCBExpiry+"\\n Insured Declared varlue : "+IDVValue;
     
      var basePremium  = "<?php echo $prAmt; ?>"; 
      var taxValue  = "<?php echo $taxValue; ?>"; 
      var totalPremium  = "<?php echo $totalPremium; ?>"; 
      
      var mx_premium_details = "Premium before tax : "+basePremium+" \\n GST : "+taxValue+"\\n Payable Premium : "+totalPremium;     
      var ODDeductiblePremium  = "<?php echo $ODDeductiblePremium; ?>"; 
      var LLDriverPremium  = "<?php echo $LLDriverPremium; ?>"; 
      var TPPDPremium  = "<?php echo $TPPDPremium; ?>"; 

      
      var mx_Features = "Voluntary Deductible : "+ODDeductiblePremium+"\\n Legal Liability to Driver : "+LLDriverPremium+"\\n Restrict TPPD Cover : "+TPPDPremium;


      var dataString = '[{"Attribute": "EmailAddress","Value": "'+EmailAddress+'"},{"Attribute": "FirstName","Value": "'+FirstName+'"},{"Attribute": "LastName","Value": "'+LastName+'"},{"Attribute": "mx_Category","Value": "'+mx_Category+'"},{"Attribute": "mx_Line_of_Business","Value": "'+mx_Line_of_Business+'"},{"Attribute": "mx_HDFC_Branch_Location","Value": "'+mx_HDFC_Branch_Location+'"},{"Attribute": "mx_HDFC_Ergo_Location","Value": "'+mx_HDFC_Ergo_Location+'"},{"Attribute": "mx_Priority","Value": "'+mx_Priority+'"},{"Attribute": "mx_Target_Date","Value": "'+mx_Target_Date+'"},{"Attribute": "mx_TSE_BDR_Code","Value": "'+mx_TSE_BDR_Code+'"},{"Attribute": "mx_TL_Code","Value": "'+mx_TL_Code+'"},{"Attribute": "mx_SM_Code","Value": "'+mx_SM_Code+'"},{"Attribute": "mx_Bank_Verifier_ID","Value": "'+mx_Bank_Verifier_ID+'"},{"Attribute": "mx_Payment_Type","Value": "'+mx_Payment_Type+'"},{"Attribute": "mx_Sub_Channel","Value": "'+mx_Sub_Channel+'"},{"Attribute": "mx_HDFC_Card_Relationship_No","Value": "'+mx_HDFC_Card_Relationship_No+'"},{"Attribute": "mx_HDFC_Card_Last_4_digits","Value": "'+mx_HDFC_Card_Last_4_digits+'"},{"Attribute": "mx_DOB","Value": "'+mx_DOB+'"},{"Attribute": "mx_Case_id","Value": "'+mx_Case_id+'"},{"Attribute": "mx_PAN_Card","Value": "'+mx_PAN_Card+'"},{"Attribute": "mx_Street1","Value": "'+mx_Street1+'"},{"Attribute": "mx_Street2","Value": "'+mx_Street2+'"},{"Attribute": "mx_Area","Value": "'+mx_Area+'"},{"Attribute": "mx_City","Value": "'+mx_City+'"},{"Attribute": "mx_State","Value": "'+mx_State+'"},{"Attribute": "mx_Zip","Value": "'+mx_Zip+'"},{"Attribute": "mx_Quote_Id","Value": "'+mx_Quote_Id+'"},{"Attribute": "Notes","Value": "'+Notes+'"},{"Attribute": "mx_quote_details","Value": "'+mx_quote_details+'"},{"Attribute": "mx_premium_details","Value": "'+mx_premium_details+'"},{"Attribute": "mx_Features","Value": "'+mx_Features+'"},{"Attribute": "Mobile","Value": "'+Mobile+'"},{"Attribute": "Phone","Value": "'+Mobile+'"}]';
      
    
     $('#leadString').val(dataString);

}

$('#saveLead').click(function(){

         createLeadSting();
             $("#load_model").click();
            var leadString = $('#leadString').val();
          
       
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

      var product = "Two-Wheeler";
      var first_name =  "<?php echo $this->session->userdata('tw_FirstName');?>";
      var last_name = "<?php echo $this->session->userdata('tw_LastName');?>";
      var email = "<?php echo $this->session->userdata('emailtwo');?>";  
      var mobile = "<?php echo $this->session->userdata('mobiletwo');?>";    
      var prospectId =  $('#ProspectId').val();
      var lead_status = "Prospect";
      var state = "<?php echo $this->session->userdata('tw_mx_State');?>";
      var city = "<?php echo $this->session->userdata('tw_mx_City');?>";
      var premium = "<?php echo $prAmt; ?>";
      var tax = "<?php echo $taxValue; ?>" ;
      var total_premium = "<?php echo $totalPremium; ?>";


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