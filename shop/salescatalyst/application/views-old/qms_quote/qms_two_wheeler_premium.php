<script src="<?php echo base_url(); ?>assets/js/qms_js/tw.js"></script>
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
               <a href="#">Quotes</a>
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
                              <a href="<?php echo base_url(); ?>create-quote-two-wheeler" title="Back to Quote">
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

                                    <a href="<?php echo base_url(); ?>qms-two-wheeler-proposal" id="proposal" >
                                 <button type="button" class="btn blue btn-default send_quote" > Proceed to Proposal</button>
                                 </a>
                                 </div>

<!--  -->
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

     $('#proposal').click(function(){

      var basePremium  = "<?php echo $prAmt; ?>"; 
      var taxValue  = "<?php echo $taxValue; ?>"; 
      var totalPremium  = "<?php echo $totalPremium; ?>"; 
      var webUrl = $('#web_url').val()
      var URL = webUrl + 'Quotetw/premiumUpdate/';
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