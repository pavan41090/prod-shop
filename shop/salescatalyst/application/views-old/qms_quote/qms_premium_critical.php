<script src="<?php echo base_url(); ?>assets/js/custom_critical.js"></script>
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
<input type="hidden" name="PlanName" id="<?php echo $radioId; ?>_PlanName" value="<?php echo $pr['ProductType']; ?>" >                                        
                                
                                    </div>
                                    </div>
                                    <?php } ?>

<input type="hidden" name="selectedPlan" id="selectedPlan" value="" > 
<input type="hidden" name="Premium" id="selectedpremium" value="" > 
<input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
<input type="hidden" name="TotalPremium" id="TotalPremium" value="" >  
<input type="hidden" name="selectedPlanName" id="selectedPlanName" value="" >  




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
                                <a href="<?php echo base_url(); ?>create-quote-critical-illnes">
                                <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                                                                    
                                                                </div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
                                
                                 <div class="form-group">
                                    <input type="hidden" id="ProspectId"  name="ProspectId" ng-model='ProspectId'>


                                   
                                 
                                 <a href="<?php echo base_url(); ?>qms-critical-illnes-proposal" id="proceedProposal" >
                                 <button type="button"  class="btn blue btn-default" >Proceed to Propsal</button>
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

        var PlanNameFiled = coverCode+'_PlanName';
        var PlanNameValue = $('#'+PlanNameFiled).val();


        $('#selectedPlan').val(coverCode);
        $('#selectedpremium').val(PremiumValue);
        $('#selectedServiceTax').val(ServiceTaxValue);
        $('#TotalPremium').val(TotalPremiumValue);
        $('#selectedPlanName').val(PlanNameValue);

         $('#premiumBefore').text(PremiumValue+'/-');
         $('#premiumGST').text(ServiceTaxValue+'/-');
         $('#payablePremium').text(TotalPremiumValue+'/-');
    }); 

}); 

$(document).ready(function() {  

     $('#proceedProposal').click(function(){

      var basePremium  = $('#selectedpremium').val(); 
      var selectedPlan  = $('#selectedPlan').val(); 
      var selectedPlanName  = $('#selectedPlanName').val(); 
          if(basePremium == ''){
              alert('Please select plan...');
              return false;
          }

      var taxValue  = $('#selectedServiceTax').val(); 
      var totalPremium  = $('#TotalPremium').val();  
     
      
      var webUrl = $('#web_url').val()
      var URL = webUrl + 'Quotecritical/premiumUpdateCritical/';
      $.ajax({
            url: URL,
            type: 'POST',
            data: {
               'Premium': basePremium,
               'ServiceTax': taxValue,
               'PremiumPayable': totalPremium,
               'selectedPlan':selectedPlan,
               'selectedPlanName':selectedPlanName

         },
         dataType: 'json',
         success: function(data) {

         // window.location.href = webUrl+"qms-critical-illnes-proposal";
         // <?php // echo base_url(); ?>qms-critical-illnes-proposal
              //  alert(data);
         },
      });
   })

})
 

</script>                            