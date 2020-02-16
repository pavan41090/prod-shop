<input type='hidden' name="web_url" id="web_url" value="<?php echo base_url(); ?>">
<script src="<?php echo base_url(); ?>assets/js/qms_js/car.js"></script>
<script src="<?php echo base_url(); ?>assets/js/qms_js/qms_common.js"></script>

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
                                          <input type="text" name="lpgCngKit"  id="lpgCngKitValue" value="<?php echo $lpgCngKitValue; ?>" class="form-control input-sm" ng-model='lpgCngKitValue' > 
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
                              <a href="<?php echo base_url().'create-quote-car' ?>">
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
                                   
                                    <a href="<?php echo base_url(); ?>qms-car-proposal" id="proposal" >
                                 <button type="button" class="btn blue btn-default send_quote" >Proceed to Propsal</button>
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

$(document).ready(function() {  

    $('#voluntaryDeductible').val('<?php echo $ODDeductiblePremiumValue; ?>');
    $('#driverLibillity').val('<?php echo $driverLibillity; ?>');
    $('#accidentFamilyCover').val('<?php  echo $selectPAFDeduct; ?>');
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


   $('#proposal').click(function(){

      var basePremium  = "<?php echo $prAmt; ?>"; 
      var taxValue  = "<?php echo $taxValue; ?>"; 
      var totalPremium  = "<?php echo $totalPremium; ?>"; 
      var webUrl = $('#web_url').val()
      var URL = webUrl + 'Quote/premiumUpdate/';
      $.ajax({
            url: URL,
            type: 'POST',
            data: {
               'Premium': basePremium,
               'ServiceTax': taxValue,
               'PremiumPayable': totalPremium,
         },
         dataType: 'json',
         success: function(data) {

                alert(data);
         },
      });
   })



})


</script>