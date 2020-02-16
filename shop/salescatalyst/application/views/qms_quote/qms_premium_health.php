<script src="<?php echo base_url(); ?>assets/js/custom_pa.js"></script>
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
        <div class="portlet mainabtbg about-text">

            <div class="row">
              <div class="col-md-12">
                  <div class="col-md-2 policytxt">Type of Policy:</div>
                  <div class="col-md-2 policysubtxt">Health </div>
<!--                   <div class="col-md-2 policytxt">Family Type:</div>
                  <div class="col-md-2 policysubtxt">Self Only</div> -->
              
                  <div class="form-group">
                  <!--   <button type="button" id="calculate" class="btn blue btn-default">Edit Details</button> -->
                  </div> 
              </div>
            </div>
        </div>
    </div>
</div>




                    <div class="row">
<div class="col-md-12">
                           
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
                                    $coverCode = $prm['coverCode']; 
                                    $sumInsured = $prm['SumInsured'];
                                    //$PlanName = $prm['PlanName']; 
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
<input type="hidden" name="sumInsured" id="<?php echo $coverCode?>_sumInsured" value="<?php echo $sumInsured; ?>" > 

                                       <?php } ?>

<input type="hidden" name="selectedPlan" id="selectedPlan" value="" > 
<input type="hidden" name="Premium" id="selectedpremium" value="" > 
<input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
<input type="hidden" name="TotalPremium" id="TotalPremium" value="" >   
<!-- <input type="text" name="selectedSumInsured" id="selectedSumInsured" value="" >    -->

                                   </div>
                                     
                                        </div>

                                        <div id="family">
                                        <div class="row healthrestxt">                       
                                          <div class="col-md-4">Cashless Hospitalisation</div>
                                        <?php foreach($premium_choice_array['hospitalisationArray'] as $dtl ) { ?>
                                          <div class="col-md-2"><i class="fa fa-rupee"></i> <?php echo $dtl['hospitalisation']; ?></div> 
                                       <?php  } ?> 
<div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip"  data-placement="bottom"  title="<?php echo $premium_choice_array['hospitalisationArray'][0]['help'];  ?>"> </div>  
                                        </div>

                                     <div class="row healthrestxt">                
                                          <div class="col-md-4 dayCareTreat" >-Day care treatment</div>
                                        <?php foreach($premium_choice_array['dayCateTreatmentArray'] as $pda ) { ?>
                                          <div class="col-md-2"> <?php echo $pda['dayCateTreatment']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Day_caretreatment'] ?>"></div>  
                                        </div> 

                                         <div class="row healthrestxt">                
                                          <div class="col-md-4 dayCareTreat">-Room rent sublimit</div>
                                        <?php foreach($premium_choice_array['roomRentSubmitArray'] as $pda ) { ?>
                                          <div class="col-md-2"><?php echo $pda['roomRentSubmit']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Room_rent'] ?>"></div>  
                                        </div> 

                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Pre&Post Hospitalisation</div>
                                        <?php foreach($premium_choice_array['prePostHospArray'] as $pda ) { ?>
                                          <div class="col-md-2"> <?php echo $pda['prePostHosp']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['PrePost_Hospitalisation'] ?>"></div>  
                                        </div> 
                                    <div class="row healthrestxt">                
                                          <div class="col-md-4">Domicilliary Hospitalisation </div>
                                        <?php foreach($premium_choice_array['DomiciliaryHospArray'] as $pda ) { ?>
                                          <div class="col-md-2"> <?php echo $pda['DomiciliaryHosp']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Domicilliary_Hospitalisation'] ?>"></div>  
                                        </div> 


                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Hospital Cash Allowance </div>
                                        <?php foreach($premium_choice_array['hospCashallowanceArray'] as $pda ) { ?>
                                          <div class="col-md-2"> <?php echo $pda['hospCashallowance']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Hospital_CashAllowance'] ?>"></div>  
                                        </div> 


                                         <div class="row healthrestxt">                
                                          <div class="col-md-4">Ambulance Charges</div>
                                        <?php foreach($premium_choice_array['ambulChargesArray'] as $pda ) { ?>
                                          <div class="col-md-2"><?php echo $pda['ambulCharges']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Ambulance_Charges'] ?>"></div>  
                                        </div> 

                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Accompanying Person</div>
                                        <?php foreach($premium_choice_array['accompanyingPersonArray'] as $pda ) { ?>
                                          <div class="col-md-2"> <?php echo $pda['accompanyingPerson']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Accompanying_Person'] ?>"></div>  
                                        </div> 


                                     <div class="row healthrestxt">                
                                          <div class="col-md-4">Critical Illness cover</div>
                                        <?php foreach($premium_choice_array['criticalIllnessArray'] as $pda ) { ?>
                                          <div class="col-md-2"> <?php echo $pda['criticalIllness']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Critical_Illnesscover'] ?>"></div>  
                                        </div> 

                                         <div class="row healthrestxt">                
                                          <div class="col-md-4">Transplantation Of Organs</div>
                                        <?php foreach($premium_choice_array['transplantationOrgansArray'] as $pda ) { ?>
                                          <div class="col-md-2"><?php echo $pda['transplantationOrgans']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Transplantation_OfOrgans'] ?>"></div>  
                                        </div> 


                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Dread Disease Recouperation Benefit</div>
                                        <?php foreach($premium_choice_array['dreadDiseaseArray'] as $pda ) { ?>
                                          <div class="col-md-2"><?php echo $pda['dreadDisease']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Dread_Disease'] ?>"></div>  
                                        </div>


                                        <div class="row healthrestxt">                
                                          <div class="col-md-4">Home Nursing</div>
                                        <?php foreach($premium_choice_array['inpatientPhysiotherapyArray'] as $pda ) { ?>
                                          <div class="col-md-2"> <?php echo $pda['inpatientPhysiotherapy']; ?></div> 
                                       <?php  } ?> 
                                          <div class="col-md-1"><img src="<?php  echo base_url()?>/assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Home_Nursing'] ?>"></div>  
                                        </div>  


                                     </div>

                                        <div class="portlet quotepay box mainbordersalt">
<!--                                 <div class="portlet-title">
                                    <div class="row mainpaym">
                           <div class="col-md-6">
                           <div>Premium before tax: <i class="fa fa-rupee"><span id="sel_premium"></span></i></div>
                           <div>GST: <i class="fa fa-rupee"></i> <span id="sel_gst">200</span>/-</div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
                           <div>Payable Premium</div>
                           <div><i class="fa fa-rupee"></i> <span id="payable_premium">5200</span>/-</div>
                           </div>
                           </div>
                           
                        </div>
                                    
                                </div> -->

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

                <div class="modal fade" id="myModal" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                   <div class="modal-dialog">
                      <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                      <button type="button" class="btn btn-default" id="closeModel" data-dismiss="modal">Close</button>
                   </div>
                </div>                            

     <input type="hidden" id="load_model" data-toggle="modal" data-target="#myModal">

                     <div class="row">
                           <div class="col-md-6">
                           <div class="form-group">
                                <a href="<?php echo base_url(); ?>create-quote-health">
                                <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                                                                    
                                                                </div>
                           </div>
                           <div class="col-md-6">
                           <div class="pull-right">
  

                                <div class="form-group">
                                   

                    <input type="hidden" id="quote_type" name="quote_type" value="Health">
<!--                      <a href="<?php // echo base_url(); ?>qms-health-proposal" id="Proceed" > -->
                                    
                                 <a href="<?php echo base_url(); ?>qms-health-proposal" id="Proceed" >
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

        var PlanNameFiled = coverCode+'_PlanName';
        var PlanNameValue = $('#'+PlanNameFiled).val();

//selectedSumInsured

        // var selectedSumInsuredFiled = coverCode+'_selectedSumInsured';
        // var selectedSumInsuredValue = $('#'+selectedSumInsuredFiled).val();

        $('#selectedPlan').val(coverCode);
        $('#selectedpremium').val(PremiumValue);
        $('#selectedServiceTax').val(ServiceTaxValue);
        $('#TotalPremium').val(TotalPremiumValue);
        $('#selectedPlanName').val(PlanNameValue);
      //  $('#selectedPlanName').val(selectedSumInsured);



         $('#premiumBefore').text(PremiumValue+'/-');
         $('#premiumGST').text(ServiceTaxValue+'/-');
         $('#payablePremium').text(TotalPremiumValue+'/-');
    }); 

}); 

$(document).ready(function() {  

     $('#Proceed').click(function(){

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
      var URL = webUrl + 'QuoteHealth/premiumUpdateHealth/';
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

                alert(data);
         }
      });
   });
})



</script>