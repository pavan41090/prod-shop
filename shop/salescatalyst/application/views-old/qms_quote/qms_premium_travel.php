<script src="<?php echo base_url(); ?>assets/js/qms_js/travel.js"></script>
<script src="<?php echo base_url(); ?>assets/js/qms_js/qms_common.js"></script>
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
                                <a href="#">Quotes</a>
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

<input type="hidden" name="" id="<?php echo $PlanId?>_sel" value="<?php echo $PlanId; ?>" > 
<input type="hidden" name="PlanName" id="<?php echo $PlanId?>_PlanName" value="<?php echo $PlanName; ?>" > 
<input type="hidden" name="Premium" id="<?php echo $PlanId?>_premium" value="<?php echo $Premium; ?>" > 
<input type="hidden" name="ServiceTax" id="<?php echo $PlanId?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
<input type="hidden" name="PremiumPayable" id="<?php echo $PlanId?>_PremiumPayable" value="<?php echo $PremiumPayable; ?>" > 
                                        </div>

<?php } ?>

<input type="hidden" name="selectedPlan" id="selectedPlan" value="" > 
<input type="hidden" name="selectedPlanName" id="selectedPlanName" value="" > 
<input type="hidden" name="Premium" id="selectedpremium" value="" > 
<input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
<input type="hidden" name="PremiumPayable" id="selectedPremiumPayable" value="" > 






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
                                <a href="<?php echo base_url(); ?>create-quote-travel">
                                <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                                                                    
                                                                </div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">


                                 <div class="form-group">
                                    <input type="hidden" id="ProspectId"  name="ProspectId" ng-model='ProspectId'>

                    <input type="hidden" id="order_id" name="order_id" value="<?php echo $orderNo; ?>">
                    <input type="hidden" id="quote_id" name="quote_id" value="<?php echo $quoteNo; ?>">
                    <input type="hidden" id="email_id" name="email_id" value="<?php echo $this->session->userdata('travel_email');?>">
                    <input type="hidden" id="quote_type" name="quote_type" value="traval">
                                    
                                 <a href="#" id="sendQuote">
                                 <button type="button"  class="btn blue btn-default send_quote" >Send Quote</button>
                                 </a>
                                 
                                 <a href="<?php echo base_url(); ?>qms-travel-proposal" id="proceed_proposal" >
                                 <button type="button" class="btn blue btn-default send_quote" >Proceed to proposal</button>
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
                              <div class="policysubtxt">Travel Insurance - <?php echo $policy_type ?></div>
                              <div class="policytxt">Type of Trip</div>
                              <div class="policysubtxt"><?php echo $type_of_trip; ?></div>
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

        $('#selectedPlan').val(plan);
        $('#selectedPlanName').val(PlanNameValue);
        $('#selectedpremium').val(PremiumValue);
        $('#selectedServiceTax').val(ServiceTaxValue);
        $('#selectedPremiumPayable').val(PremiumPayableValue);


        updatePremium(PlanNameValue,PremiumValue,ServiceTaxValue,PremiumPayableValue,plan);
        //$("#"+plan).attr('checked', 'true');
    }); 
});


    $('#proceed_proposal').click(function(){
        var basePremium  = $('#selectedpremium').val(); 
        if(basePremium == ''){
            alert('Please select plan...');
            return false;
        }
    })

    function updatePremium(PlanNameValue,PremiumValue,ServiceTaxValue,PremiumPayableValue,selectedPlan){
      
        var webUrl = $('#web_url').val()
        var URL = webUrl + 'Quotetravel/updateSessionPremiumData/';
        $.ajax({

            url: URL,
            type: 'POST',
            data: {
                'selPlan': selectedPlan,
                'PlanName': PlanNameValue,
                'Premium': PremiumValue,
                'ServiceTax': ServiceTaxValue,
                'PremiumPayable': PremiumPayableValue
            },
            dataType: 'json',

            success: function(data) {

               alert(data);
            },

        });

    }

</script>

