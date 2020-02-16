<script src="<?php echo base_url(); ?>assets/js/qms_js/tw_proposal.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title">Quotes - <?php echo $title ?>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html ">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Quote</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span>Two-Wheeler Quote Proposal </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption"> Two-Wheeler Quote Proposal </div>
               </div>

               <div  ng-controller="MainCtrl">
               <div class="portlet-body planbox" style="color: #000;">
               <div class="row maincontf paymentpro">  
               <div class="col-md-4 paymentdeta" style="margin-left:2%;">
               <div class="paymentpro">
               <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/policy_info.png" width='24px' /></div>
               <div class="col-md-10 policyinfo">Personal Information</div>
               </div>
               <div class="paysep1">&nbsp;</div>
               <div class="row paysep">
               <div class="col-md-6" > First Name</div>
               <div class="col-md-6"> : <?php echo $tw_first_name ?> </div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Last Name</div>
               <div class="col-md-6">: <?php echo $tw_last_name ?> </div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >Mobile Number</div>
               <div class="col-md-6">: <?php echo $tw_mobile ?> </div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >E-mail id</div>
               <div class="col-md-6">:<?php echo $tw_email ?>  </div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >Address</div>
               <div class="col-md-6">: <?php echo $tw_pro_add1 ?></div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >City</div>
               <div class="col-md-6">: <?php echo $tw_city ?> </div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >State</div>
               <div class="col-md-6">:<?php echo $tw_state ?> </div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Pincode</div>
               <div class="col-md-6">:<?php echo $tw_zip ?></div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Nominee Name</div>
               <div class="col-md-6">:<?php echo $tw_pro_nname ?></div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Age Of Nominee</div>
               <div class="col-md-6">:<?php echo $tw_pro_nage ?></div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Relationship With Nominee</div>
               <div class="col-md-6">:<?php echo $tw_pro_nomie_relation ?></div>
               </div>
              
<!--                <div class="row paysep">
               <div class="col-md-6" >Name Of Appointee</div>
               <div class="col-md-6">:<?php echo $tw_pro_nameofappoint ?></div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Appointee's Relationship With nominee</div>
               <div class="col-md-6">:<?php echo $tw_pro_appoint_relation ?></div>
               </div> -->
               <div class="paysep1">&nbsp;</div>
               </div>
               <div class="col-md-4 paymentdeta">
               <div class="paymentpro">
               <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/policy_info.png" width='24px' /></div>
               <div class="col-md-10 policyinfo">Policy Information</div>
               </div>
               <div class="paysep1">&nbsp;</div>
               <div class="row paysep">
               <div class="col-md-6" > Vehicle Make</div>
               <div class="col-md-6"> :<?php echo $tw_manufacture ?> </div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Vehicle Model</div>
               <div class="col-md-6">: <?php echo $tw_carvariant ?></div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >Cubic Capacity</div>
               <div class="col-md-6">:<?php echo $car_cc ?></div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >Fuel Type</div>
               <div class="col-md-6">:<?php echo $car_fuel ?></div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >Seater</div>
               <div class="col-md-6">:<?php echo $car_seating ?></div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >IDV</div>
               <div class="col-md-6">:<?php echo $tw_idvamount ?></div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >Non-Electrical Accessories</div>
               <div class="col-md-6">:&#8377;0.00</div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >New Policy Start Date</div>
               <div class="col-md-6">:<?php echo $tw_pro_new_policy_start ?></div>
               </div>
               <?php if($tw_ncbtwo != 0) { ?>
                 <div class="row paysep">
                 <div class="col-md-6" >New Policy NCB%</div>
                 <div class="col-md-6">:<?php echo $tw_ncbtwo ?></div>
                 </div>
               <?php } ?>
              <div class="paysep1">&nbsp;</div>
               
               </div>
               <div class="col-md-3 paymentdeta" >
               <div class="paymentpro">
               <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/policy_info.png" width='24px' /></div>
               <div class="col-md-10 policyinfo">Premium Information</div>
               </div>
               <div class="paysep1">&nbsp;</div>
               <div class="row paysep">
               <div class="col-md-6" > Premium before Tax</div>
               <div class="col-md-6"> : <?php echo $Premium ?></div>
               </div>
               <div class="row paysep">
               <div class="col-md-6" >GST</div>
               <div class="col-md-6">: <?php echo $ServiceTax ?></div>
               </div>
                <div class="row paysep">
               <div class="col-md-6" >Gross Premium</div>
               <div class="col-md-6">:<?php echo $PremiumPayable?></div>
               </div>
               
          <!--       <div class="row paysep">
               <div class="col-md-6" >Voluntry Excess</div>
               <div class="col-md-6">:&#8377;0.00</div>
               </div> -->
               <div class="paysep1">&nbsp;</div> 
                
              
               
               </div>
               </div> 
               <div>&nbsp;</div>
                <div class="col-md-12">
                <p class="txtcol">We suggest you to go through our draft policy wording before taking the Travel Insurance Policy. Please click here to read the policy wording document</p>
                </div>
                <div>
                <div class="col-md-12">
                    <div class="checkbox-list" data-error-container="#form_2_services_error">
                        <label>
                            <div class=""><span><input type="checkbox" value="1" name="service"></span>I/We hereby declare that the statements, answers of any material fact* given by me/us are based on information provided by the proposer. <br />I/We hereby declare that I have verified the </div>
                        </label>
                        <label>
                            <div class=""><span><input type="checkbox" value="2" name="service"></span> New Business</div></label>
                        <label>
                            
                    </label></div>
                    
                    <div id="form_2_services_error"> </div>
                </div>
                <div class="col-md-12">
                 <p>It is hereby understood and agreed that the statements, answers and particulars of any material fact* provided herein are the basis on which this insurance is being granted and that if after the insurance is effected, it is found that any of the statements, answers of any material fact* are incorrect or untrue in any respect, the company shall have no liability under the insurance. Instead the Company will be free to proceed against me/Us.</p>
                 <p class="txtcol"><sup>*</sup>A material fact is one that is likely to influence the Company's acceptance or assessment of the proposal</p>
                 <div class="row">
                           <div class="col-md-6">
                           <div class="form-group">
                                <a href="<?php echo base_url();?>qms-two-wheeler-proposal">
                                <button type="button" id="" class="btn blue btn-default">Back</button>
                              </a>
                                                                    
                                                                </div>
                           </div>
                           
                           <div class="col-md-3">
                           <div class="pull-right">


                 <!--                 <div class="form-group">
                                   
                                    
                                 <a href="#" id="sendQuote">
                                 <button type="button"  class="btn blue btn-default send_quote" >Download PDF</button>
                                 </a>
                                 </div> -->
                           </div>
                           </div>
                           
                           <div class="col-md-6">
                           <div class="pull-right">


                                 <div class="form-group">
                                   
                                  <!-- <a href="<?php echo base_url(); ?>qms-travel-proposal" id="saveLead" > -->
                                 <button type="button" class="btn blue btn-default send_quote" ng-click="confirm_proposal()" >Confirm & Procced</button>
                                 <!-- </a>   -->
                                 
                                 </div>
                           </div>
                           </div>
                           
                        </div>
                 </div>
                 
                </div>
                  <div>&nbsp;</div>                              
                  
                 
                
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
