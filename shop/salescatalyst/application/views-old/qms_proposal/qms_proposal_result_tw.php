<script src="<?php echo base_url(); ?>assets/js/qms_js/tw_proposal.js"></script>
<script src="<?php echo base_url(); ?>assets/js/qms_js/qms_common.js"></script>

<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">

                    <input type="hidden" id="order_id" name="order_id" value="<?php echo $orderNo; ?>">
                    <input type="hidden" id="quote_id" name="quote_id" value="<?php echo $quoteNo; ?>">
                    <input type="hidden" id="email_id" name="email_id" value="<?php echo $emailId;?>">
                    <input type="hidden" id="quote_type" name="quote_type" value="Car">
                  <input type="hidden" id="cust_name" name="cust_name" value="<?php echo ucfirst($custName); ?>">

<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
      <h3 class="page-title"> <?php echo $title ?>
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
                                 <a href="" class="send_quote">
                                 <button type="button" id="calculate" class="btn blue btn-default">Send E-mail</button>
                                 </a>
                              </div>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="pull-right">
                                 <div class="form-group">
                                    <a href="<?php echo base_url();?>Quotetw/sess_clrtw"  >
                                    <button type="submit"  class="btn blue btn-default send_quote" ng-click="proposal()" >Back to Home</button>
                                    </a>
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
