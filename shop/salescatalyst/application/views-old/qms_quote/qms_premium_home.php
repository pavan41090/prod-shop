<script src="<?php echo base_url(); ?>assets/js/custom_home.js"></script>
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



                     <div class="row">
                           <div class="col-md-6">
                           <div class="form-group">
                                <a href="<?php echo base_url(); ?>create-quote-home">
                                <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                                                                    
                                                                </div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
  


<!--                                  <div class="form-group">
                                    <input type="hidden" id="ProspectId"  name="ProspectId" ng-model='ProspectId'>
                                    <input type="hidden" id="leadString"  name="leadString" >
                                    <a href="#" id="saveLead">
                                    <button type="button"  class="btn blue btn-default"  ng-click="saveLead()">Save Lead</button>
                                    </a>
                                 </div> -->


                                 <div class="form-group">
                                    <input type="hidden" id="ProspectId"  name="ProspectId" ng-model='ProspectId'>

                    <input type="hidden" id="order_id" name="order_id" value="<?php echo $OrderNo; ?>">
                    <input type="hidden" id="quote_id" name="quote_id" value="<?php echo $QuoteNo; ?>">
                    <input type="hidden" id="email_id" name="email_id" value="<?php echo $this->session->userdata('home_email');?>">
                    <input type="hidden" id="quote_type" name="quote_type" value="Home">
                                    
                                 <a href="<?php echo base_url(); ?>qms-home-proposal" id="proceed" >
                                 <button type="button" class="btn blue btn-default " >Proceed to Propsal</button>
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



$(document).ready(function() {  

     $('#proceed').click(function(){

       var basePremium  = $('#selectedpremium').val(); 
          if(basePremium == ''){
              alert('Please select plan...');
              return false;
          }

      var taxValue  = $('#selectedServiceTax').val(); 
      var totalPremium  = $('#TotalPremium').val();  
      var mx_premium_details = "Premium before tax : "+basePremium+"\\n GST : "+taxValue+"\\n Payable Premium : "+totalPremium; 
      // var planname=$('#PlanName').val(); 

        var webUrl = $('#web_url').val()
        var URL = webUrl + 'Quotepa/premiumUpdatePa/';
         $.ajax({
            url: URL,
            type: 'POST',
            data: {
               'Premium': basePremium,
               'ServiceTax': taxValue,
               'PremiumPayable': totalPremium,
               // 'PlanName':PlanName,
         },
         dataType: 'json',
         success: function(data) {

                alert(data);
         },
      });

    
})
   })
</script>