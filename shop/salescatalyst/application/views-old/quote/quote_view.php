<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <h3 class="page-title"> View Quote &nbsp; &nbsp; &nbsp;</h3>
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
                        <p><a href="#" class="btn blue btn-outline sbold " > Premium <i class="fa fa-rupee"></i> <?php  echo $totalPremium; ?>/- </a>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <ul class="list-unstyled  listcap">
                           <?php foreach( $prDescArray  as $desc) { ?>
                           <li><i class="fa fa-check"></i> <?php  echo $desc; ?> </li>
                           <?php } ?>
                           <!--                                             <li><i class="fa fa-check"></i> Third party liablity cover </li>
                              <li><i class="fa fa-check"></i> Personal Accident cover(driver) </li>
                              -->
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
                              <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="additional" href="#additional" aria-expanded="true"> Additional Discounts & Featurees </a>
                           </h4>
                        </div>
                        <div id="additional" class="panel-collapse " aria-expanded="true">
                           <div class="panel-body">
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/icon-percentage.jpg"></div>
                                 <div class="col-md-4 voltxt">Voluntary Deductible</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $ODDeductiblePremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <?php echo $selDeduct; ?>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/question.jpg" title="demo"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/icon-legal.jpg"></div>
                                 <div class="col-md-4 voltxt">Legal Liability to Driver</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $LLDriverPremium; ?> </div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <?php echo $driverLibillity ?>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/question.jpg" title="demo"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/icon-personal.jpg"></div>
                                 <div class="col-md-4 voltxt">Personal Accident Family Cover</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $PAFDeductPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <?php echo $selectPAFDeduct; ?>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/question.jpg" title="demo"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/icon-lpg.jpg"></div>
                                 <div class="col-md-4 voltxt">LPG/CNG Kit*<br>(max 50,000)</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $lpgCngKitPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <?php echo $lpgCngKitValue; ?>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/question.jpg" title="demo"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/icon-arai.jpg"></div>
                                 <div class="col-md-4 voltxt">ARAI Approved Anti-Theft Device*</div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $antiTheftPremium; ?> </div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <?php echo $antiTheft; ?> 
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/question.jpg" title="demo"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/icon-elec.jpg"></div>
                                 <div class="col-md-4 voltxt">Electrical Accessories*<br>(max 50000)
                                    <br><span style="font-size:10px">Have bills been sumbitted for electrical accessories?</span>
                                 </div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $elecAccessoryPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                          <?php //echo $electricalValue; ?> 
                                       </div>
                                       <div class="radio-list">
                                          <?php echo $electricalCheck; ?>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/question.jpg" title="demo"></div>
                                 </div>
                              </div>
                              <div class="row mainborders">
                                 <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/icon-elec.jpg"></div>
                                 <div class="col-md-4 voltxt">Non-Electrical Accessories*<br>(max 50000)
                                    <br><span style="font-size:10px">Have bills been sumbitted for non-electrical accessories?</span>
                                 </div>
                                 <div class="col-md-2 voltxt"><i class="fa fa-rupee"></i> <?php echo $NonElecAccessoryPremium; ?></div>
                                 <div class="col-md-4 voltxt">
                                    <div class="col-md-9">
                                       <div class="form-group">
                                       </div>
                                       <div class="radio-list">
                                          <?php echo $nonElectricalCheck; ?>
                                       </div>
                                    </div>
                                    <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/question.jpg" title="demo"></div>
                                 </div>
                              </div>
                              <!--<div class="row maincontf">
                                 <div class="col-md-7">*Fitted separately by you and did not come in built in the car</div>
                                 <div class="col-md-5">
                                 <div class="form-group" style="margin-left:2%">
                                                 <button type="button" id="re-calculate" class="btn blue btn-default">Re Caluclate</button>
                                                 
                                             </div>
                                             </div>
                                 </div> -->
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
                              <button type="button" id="calculate" class="btn blue btn-default">Reject Quote</button>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="pull-right">
                              <!-- <div class="col-md-5"><a href="#">Save my quote</a></div> -->
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <a href="#" id="downloadAndEmail">
                                    <button type="button"  class="btn blue btn-default">Approve Quote</button>
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
</div>  