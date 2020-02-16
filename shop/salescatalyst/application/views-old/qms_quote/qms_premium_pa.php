<script src="<?php echo base_url(); ?>assets/js/custom_pa.js"></script>
<script src="<?php echo base_url(); ?>assets/js/qms_js/qms_common.js"></script>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">

<div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->

                    <!-- END THEME PANEL -->
                    <h3 class="page-title"> Premium Response -  <?php echo $title ?></h3>

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
<div class="col-md-9">
                           
                     <div class="portlet box gray-gray">
                                <div class="portlet-title">
                                    <div class="caption">
                                      Premium Details </div>
                                    
                                </div>
                                <div class="portlet-body planbox">
                                    <div>
									<div class="row healthres">								
                                   <div class="col-md-4 helathkey">Benefit Structure</div>
                                   <div class="col-md-8 paoption">
                                   
                                   
                                      <?php foreach($premium_choice_array['premium_array'] as $prm) {

                                    $Premium = number_format($prm['Premium'],'2',".",""); 
                                    $ServiceTax = number_format($prm['ServiceTax'],'2',".",""); 
                                    $TotalPremium = number_format($prm['TotalPremium'],'2',".",""); 
                                    $coverCode = $prm['cover_code']; 
                                   // $PlanName = $prm['PlanName']; 
                                       ?>
            <div class="col-md-3">
                                       <div class="radio-list">
                                       <label class="radio-inline">
                                       <input type="radio" class="planOptions" name="" id="<?php echo $coverCode; ?>"> 
                                        <i class="fa fa-rupee"></i> <?php echo $prm['Premium']; ?>/-
                                      </label>
</div>
</div>
<input type="hidden" name="Premium" id="<?php echo $coverCode?>_premium" value="<?php echo $Premium; ?>" > 
<input type="hidden" name="ServiceTax" id="<?php echo $coverCode?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
<input type="hidden" name="PremiumPayable" id="<?php echo $coverCode?>_TotalPremium" value="<?php echo $TotalPremium; ?>" > 
<!-- <input type="hidden" name="PlanName" id="<?php echo $coverCode?>_PlanName" value="<?php echo $PlanName; ?>" >  -->
                                       <?php } ?>

<input type="hidden" name="Premium" id="selectedpremium" value="" > 
<input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
<input type="hidden" name="TotalPremium" id="TotalPremium" value="" >   
<!-- <input type="hidden" name="PlanName" id="PlanName" value="" >  -->
                          
                                    
                                  
                                   </div> 
                                     
                                        </div>

                                        <div id="family">
                                        <div class="row healthrestxt">								
                                          <div class="col-md-4">Accidental Death</div>
                                        <?php foreach($premium_choice_array['TotalDisablementArray'] as $dtl ) { ?>
                                          <div class="col-md-2 pamainvalue"><i class="fa fa-rupee"></i> <?php echo $dtl['tDisablement']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Accidental_Death'] ?>"></div>  
                                        </div>

                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Permanent Partial Disablement</div>
                                        <?php foreach($premium_choice_array['PartialDisablementArray'] as $pda ) { ?>
                                          <div class="col-md-3 pamainvalue"><i class="fa fa-rupee"></i> <?php echo $pda['pDisablement']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Permanent_Partial'] ?>"></div>  
                                        </div>

                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Hospital Daily Cash</div>
                                        <?php foreach($premium_choice_array['HospitalDailyCashArray'] as $hda ) { ?>
                                          <div class="col-md-3 pamainvalue"> <?php echo $hda['hDailyCashh']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Hospital_DailyCash'] ?>"></div>  
                                        </div>
                                       
                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Double Indemnity Benefit</div>
                                        <?php foreach($premium_choice_array['IndemnityBenefitArray'] as $iba ) { ?>
                                          <div class="col-md-3 pamainvalue"> <?php echo $iba['iBenefit']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Double_Indemnity'] ?>"></div>  
                                        </div>

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



                                <a href="<?php echo base_url(); ?>create-quote-personal-accident">
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

<!--                     <input type="text" id="order_id" name="order_id" value="<?php echo $OrderNo; ?>">
                    <input type="text" id="quote_id" name="quote_id" value="<?php echo $QuoteNo; ?>">
                    <input type="text" id="email_id" name="email_id" value="<?php echo $this->session->userdata('emailpa');?>">
                    <input type="text" id="quote_type" name="quote_type" value="Personal Accident"> -->
                                    
                       <!--           <a href="#" id="sendQuote">
                                 <button type="button"  class="btn blue btn-default send_quote" >Send Quote</button>
                                 </a> -->


                                <a href="<?php echo base_url(); ?>qms-pa-proposal" id="proceed_proposal" >
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
                        <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                                       <div class="modal-dialog">
                                          <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                                          <button type="button" class="btn btn-default" id= "close_modal" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                     <input type='hidden' id="load_modal" data-toggle="modal" data-target="#myModal">  
<div class="col-md-3">
                            <div class="portlet mainabtbg about-text">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="policytxt">Type of Policy:</div>
                              <div class="policysubtxt">Personal Accident</div>
                              <div class="policytxt">Family Type:</div>
                              <div class="policysubtxt">Self Only</div>
                              
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
        
        var coverCode = this.id;
        var PremiumFiled = coverCode+'_premium';
        var PremiumValue = $('#'+PremiumFiled).val();
      
        var ServiceTaxFiled = coverCode+'_ServiceTax';
        var ServiceTaxValue = $('#'+ServiceTaxFiled).val();
       
        var TotalPremiumFiled = coverCode+'_TotalPremium';
        var TotalPremiumValue = $('#'+TotalPremiumFiled).val();

        // var PlanNameFiled = coverCode+'PlanName';
        // var PlanNameValue = $('#'+PlanNameFiled).val();

        $('#selectedpremium').val(PremiumValue);
        $('#selectedServiceTax').val(ServiceTaxValue);
        $('#TotalPremium').val(TotalPremiumValue);
        // $('#PlanName').val(PlanNameValue);

         $('#premiumBefore').text(PremiumValue+'/-');
         $('#premiumGST').text(ServiceTaxValue+'/-');
         $('#payablePremium').text(TotalPremiumValue+'/-');
         // $('#PlanName').text(PlanNameValue+'/-');

          updatePremium(PremiumFiled,PremiumValue,ServiceTaxValue,TotalPremiumValue,coverCode);
    }); 

}); 

$(document).ready(function() {  

     $('#proceed_proposal').click(function(){

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