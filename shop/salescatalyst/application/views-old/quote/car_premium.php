<input type='hidden' name="web_url" id="web_url" value="<?php echo base_url(); ?>">
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <h3 class="page-title"> <?php echo $title ?> &nbsp; &nbsp; &nbsp; <span style="display: none" id="send_mail_loader"> <img alt="" class="img-circle" src="images/loading.gif" />Loading...</span></h3>
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
			<div ng-controller="myCtrlRe">
            <form name="quoteCarRe" novalidate >
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
                              <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="additional" href="#additional" aria-expanded="true"> Additional Discounts & Featurees </a>
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
      
            <option value="0">0</option>
            <option value="2500">2500</option>
            <option value="5000">5000</option>
            <option value="7500">7500</option>
            <option value="15000">15000</option> 
         </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Voluntary_Deductible'] ?>"></div>
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
                                             <option value="false">Select</option>
                                             <option value="true" >Yes</option>
                                             <option value="false" >No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Legal_Liability'] ?>"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-personal.jpg"></div>
                                 <div class="col-md-4 voltxt">Personal Accident Family Cover</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $PAFDeductPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <select name="accident_family_cover" id="accidentFamilyCover" class="form-control input-sm" ng-model='accident_family_cover'>
                                             <option value="0">0</option>
                                             <option value="10000" >10000</option>
                                             <option value="20000" >20000</option>
                                             <option value="30000" >30000</option>
                                             <option value="40000" >40000</option>
                                             <option value="50000" >50000</option>
                                             <option value="60000" >60000</option>
                                             <option value="70000" >70000</option>
                                             <option value="80000" >80000</option>
                                             <option value="90000" >90000</option>
                                             <option value="100000" >100000</option>
                                             <option value="110000" >110000</option>
                                             <option value="120000" >120000</option>
                                             <option value="130000" >130000</option>
                                             <option value="140000" >140000</option>
                                             <option value="150000" >150000</option>
                                             <option value="160000" >160000</option>
                                             <option value="170000" >170000</option>
                                             <option value="180000" >180000</option>
                                             <option value="190000" >190000</option>
                                             <option value="200000" >200000</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Personal_Accident'] ?>"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-lpg.jpg"></div>
                                 <div class="col-md-4 voltxt">LPG/CNG Kit*<br>(max 50,000)</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $lpgCngKitPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <input type="text" name="lpgCngKit"  id="lpgCngKit" value="<?php echo $lpgCngKitValue; ?>" class="form-control input-sm" ng-model='lpgCngKitValue' > 
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['LPG_CNG'] ?>"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-arai.jpg"></div>
                                 <div class="col-md-4 voltxt">ARAI Approved Anti-Theft Device*</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $antiTheftPremium; ?> </div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <select name="antiTheft" id="antiTheft" class="form-control input-sm" ng-model='antiTheft'>
                                             <option value="N" >Select</option>
                                             <option value="Y" ng-value='"Y"' ng-model='antiTheft'>Yes</option>
                                             <option value="N" ng-value='"N"' ng-model='antiTheft' >No</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['ARAI_Approved'] ?>"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-elec.jpg"></div>
                                 <div class="col-md-4 voltxt">Electrical Accessories*<br>(max 50000)
                                    <br><span style="font-size:10px">Have bills been sumbitted for electrical accessories?</span>
                                 </div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $elecAccessoryPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <input type="text" name="electricalValue" id="electricalValue" class="form-control input-sm" ng-model='electricalValue'> 
                                       </div>
                                       <div class="radio-list">
                                          <label class="radio-inline" >
                                          <input type="radio" name="electricalCheck" id="electricalCheckYes" value="Y"  ng-value='"Y"' ng-model='electricalCheck' > Yes </label>
                                          <label class="radio-inline">
                                          <input type="radio" name="electricalCheck" id="electricalCheckNo" value="N"  ng-value='"N"' ng-model='electricalCheck' > No </label>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Electrical_Accessories'] ?>"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/icon-elec.jpg"></div>
                                 <div class="col-md-4 voltxt">Non-Electrical Accessories*<br>(max 50000)
                                    <br><span style="font-size:10px">Have bills been sumbitted for non-electrical accessories?</span>
                                 </div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $NonElecAccessoryPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <input type="text" name="nonElectricalValue"  id="nonElectricalValue" value="<?php echo $nonElectricalValue ?>" class="form-control input-sm" ng-model='nonElectricalValue' > 
                                       </div>
                                       <div class="radio-list">
                                          <label class="radio-inline" >
                                          <input type="radio" name="nonElectricalCheck" ng-value='"Y"' value="Y" <?php if($nonElectricalCheck =='Y'){ ?> checked <?php } ?> ng-model='nonElectricalCheck'> Yes </label>
                                          <label class="radio-inline">
                                          <input type="radio" name="nonElectricalCheck" <?php if($nonElectricalCheck =='N'){ ?> checked <?php } ?> ng-value='"N"' value="N" ng-model='nonElectricalCheck'> No </label>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url() ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom" title="<?php echo $helpArray['Non_Electrical'] ?>"></div>
                                 </div>
                              </div>
                              <div class="row maincontf">
                                 <div class="col-md-7">*Fitted separately by you and did not come in built in the car</div>
                                 <div class="col-md-5">
                                    <div class="form-group" style="margin-left:2%">
                                       <button type="button" id="re-calculate" class="btn blue btn-default"   ng-click="reCalculate()">Re Caluclate</button>
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
                              <a href="<?php echo base_url().'create-lead-car' ?>">
                                 <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="pull-right">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <input type="hidden" id="ProspectId"  name="ProspectId" ng-model='ProspectId'>
                                    <input type="hidden" id="leadString"  name="leadString" >
                                    <a href="#" id="saveLead">
                                    <button type="button"  class="btn blue btn-default"    ng-click="saveLead()">Save Lead</button>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
			</form>

                                    <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                                       <div class="modal-dialog">
                                          <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                                          <button type="button" class="btn btn-default" id= "close_modal" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>

                                    <input type='hidden' id="load_modal" data-toggle="modal" data-target="#myModal">         
			
			</div>
         </div>


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

<script type="text/javascript">
   
 $( document ).ready(function() {  

   $('#voluntaryDeductible').val('<?php echo $ODDeductiblePremiumValue; ?>');
   $('#driverLibillity').val('<?php echo $driverLibillity; ?>');
   $('#accidentFamilyCover').val('<?php echo $selectPAFDeduct; ?>');
   $('#lpgCngKit').val('<?php echo $lpgCngKitValue; ?>');
   $('#antiTheft').val('<?php echo $antiTheft; ?>');
   $('#electricalValue').val('<?php echo $electricalValue; ?>');

     var electricalCheck = '<?php echo $electricalCheck; ?>';
   //alert(electricalCheck);
   if(electricalCheck == 'Y' ) {
     // alert('yes');
      $('#electricalCheckYes').attr('checked',true);  
      //$('input:radio[name="electricalCheck"]').filter('[value="Y"]').attr('checked', true);
   } else {
     // alert('No');
      $('#electricalCheckNo').attr('checked',true);  
   }

 var FirstName = "<?php echo $this->session->userdata('FirstName');?>";
      var LastName =  "<?php echo $this->session->userdata('LastName');?>";
      var mx_Category= "<?php echo $this->session->userdata('mx_Category');?>";
      var mx_Line_of_Business= "<?php echo $this->session->userdata('mx_Line_of_Business');?>";
      var mx_HDFC_Branch_Location= "<?php echo $this->session->userdata('mx_HDFC_Branch_Location');?>";
      var mx_HDFC_Ergo_Location= "<?php echo $this->session->userdata('mx_HDFC_Ergo_Location');?>";
      var mx_Priority= "<?php echo $this->session->userdata('mx_Priority');?>";
      var mx_Target_Date= "<?php echo $this->session->userdata('mx_Target_Date');?>";
      var mx_TSE_BDR_Code= "<?php echo $this->session->userdata('mx_TSE_BDR_Code');?>";
      var mx_TL_Code= "<?php echo $this->session->userdata('mx_TL_Code');?>";
      var mx_SM_Code= "<?php echo $this->session->userdata('mx_SM_Code');?>";
      var mx_Bank_Verifier_ID= "<?php echo $this->session->userdata('mx_Bank_Verifier_ID');?>";
      var mx_Payment_Type= "<?php echo $this->session->userdata('mx_Payment_Type');?>";
      var mx_Sub_Channel= "<?php echo $this->session->userdata('mx_Sub_Channel');?>";
      var mx_HDFC_Card_Relationship_No= "<?php echo $this->session->userdata('mx_HDFC_Card_Relationship_No');?>";
      var mx_HDFC_Card_Last_4_digits= "<?php echo $this->session->userdata('mx_HDFC_Card_Last_4_digits');?>";
      var mx_DOB= "<?php echo $this->session->userdata('mx_DOB');?>";
      var mx_Case_id= "<?php echo $this->session->userdata('mx_Case_id');?>";
      var mx_PAN_Card= "<?php echo $this->session->userdata('mx_PAN_Card');?>";
      var mx_Street1= "<?php echo $this->session->userdata('mx_Street1');?>";
      var mx_Street2= "<?php echo $this->session->userdata('mx_Street2');?>";
      var mx_Area= "<?php echo $this->session->userdata('mx_Area');?>";
      var mx_City= "<?php echo $this->session->userdata('mx_City');?>";
      var mx_State= "<?php echo $this->session->userdata('mx_State');?>";
      var mx_Zip= "<?php echo $this->session->userdata('mx_Zip');?>";
      var Notes= "<?php echo $this->session->userdata('Notes');?>";

      var EmailAddress= "<?php  echo $this->session->userdata('EmailAddress');?>";   
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

      
      var ODDeductiblePremium = '0';
      var LLDriverPremium = '0';
      var TPPDPremium = '0';
      var mx_Features = "Voluntary Deductible : "+ODDeductiblePremium+"\\n Legal Liability to Driver : "+LLDriverPremium+"\\n Restrict TPPD Cover : "+TPPDPremium;

  var dataString = '[{"Attribute": "EmailAddress","Value": "'+EmailAddress+'"},{"Attribute": "FirstName","Value": "'+FirstName+'"},{"Attribute": "LastName","Value": "'+LastName+'"},{"Attribute": "mx_Category","Value": "'+mx_Category+'"},{"Attribute": "mx_Line_of_Business","Value": "'+mx_Line_of_Business+'"},{"Attribute": "mx_HDFC_Branch_Location","Value": "'+mx_HDFC_Branch_Location+'"},{"Attribute": "mx_HDFC_Ergo_Location","Value": "'+mx_HDFC_Ergo_Location+'"},{"Attribute": "mx_Priority","Value": "'+mx_Priority+'"},{"Attribute": "mx_Target_Date","Value": "'+mx_Target_Date+'"},{"Attribute": "mx_TSE_BDR_Code","Value": "'+mx_TSE_BDR_Code+'"},{"Attribute": "mx_TL_Code","Value": "'+mx_TL_Code+'"},{"Attribute": "mx_SM_Code","Value": "'+mx_SM_Code+'"},{"Attribute": "mx_Bank_Verifier_ID","Value": "'+mx_Bank_Verifier_ID+'"},{"Attribute": "mx_Payment_Type","Value": "'+mx_Payment_Type+'"},{"Attribute": "mx_Sub_Channel","Value": "'+mx_Sub_Channel+'"},{"Attribute": "mx_HDFC_Card_Relationship_No","Value": "'+mx_HDFC_Card_Relationship_No+'"},{"Attribute": "mx_HDFC_Card_Last_4_digits","Value": "'+mx_HDFC_Card_Last_4_digits+'"},{"Attribute": "mx_DOB","Value": "'+mx_DOB+'"},{"Attribute": "mx_Case_id","Value": "'+mx_Case_id+'"},{"Attribute": "mx_PAN_Card","Value": "'+mx_PAN_Card+'"},{"Attribute": "mx_Street1","Value": "'+mx_Street1+'"},{"Attribute": "mx_Street2","Value": "'+mx_Street2+'"},{"Attribute": "mx_Area","Value": "'+mx_Area+'"},{"Attribute": "mx_City","Value": "'+mx_City+'"},{"Attribute": "mx_State","Value": "'+mx_State+'"},{"Attribute": "mx_Zip","Value": "'+mx_Zip+'"},{"Attribute": "mx_Quote_Id","Value": "'+mx_Quote_Id+'"},{"Attribute": "Notes","Value": "'+Notes+'"},{"Attribute": "mx_quote_details","Value": "'+mx_quote_details+'"},{"Attribute": "mx_premium_details","Value": "'+mx_premium_details+'"},{"Attribute": "mx_Features","Value": "'+mx_Features+'"}]';
      
      
      $('#leadString').val(dataString);  
 

 
   }) 
</script>