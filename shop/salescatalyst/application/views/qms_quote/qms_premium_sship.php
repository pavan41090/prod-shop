<script src="<?php echo base_url(); ?>assets/js/qms_js/sship.js"></script>
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
            <div class="portlet gray-gray box">
               <div class="portlet-title">
                  <div class="caption">
                     Select your plan & Customize your policy 
                  </div>
               </div>
            </div>
            <div class="portlet box gray-gray">
               <div class="portlet-title">
                  <div class="caption">
                     Premium Details 
                  </div>
               </div>
               <div class="portlet-body planbox">
                  <div>
                     <div class="row healthres">
                        <div class="col-md-2 shipkey">Key Benefits</div>
                        <div class="col-md-2 shipoption">
                           <div class="shipmaintxt">Value</div>
                           <div class="radio-list" style="text-align:center">
                              <?php // print_r($premiumArray['premiumVSSArray']); ?>
                              <?php foreach ($premiumArray['premiumVSSArray'] as $vss) {
                                 $radioId = $vss['product_code'].substr($vss['SumInsured'], 0, -3);
                                 $Premium = number_format($vss['Premium'],'2',".",""); 
                                 $ServiceTax = number_format($vss['ServiceTax'],'2',".",""); 
                                 $TotalPremium = number_format($vss['PremiumPayable'],'2',".",""); 
                                 $SumInsured = $vss['product_code'].number_format($vss['SumInsured'],'2',".","");
                                 
                                 ?>
                              <label class="radio-inline inputradiotxt">
                              <input type="radio" name="premium" id="<?php echo $radioId; ?>" class="planOptions" value=""> 
                              <?php echo $vss['shortSI']; ?>   
                              </label>
                              <input type="hidden" name="Premium" id="<?php echo $radioId; ?>_premium" value="<?php echo $Premium; ?>" > 
                              <input type="hidden" name="ServiceTax" id="<?php echo $radioId; ?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
                              <input type="hidden" name="PremiumPayable" id="<?php echo $radioId; ?>_TotalPremium" value="<?php echo $TotalPremium; ?>" > 
                              <input type="hidden" name="SumInsured" id="<?php echo $radioId; ?>_SumInsured" value="<?php echo $SumInsured; ?>" > 
                              <?php 
                                 } ?>
                           </div>
                        </div>
                        <div class="col-md-2 shipoption">
                           <div class="shipmaintxt">Classic</div>
                           <div class="radio-list" style="text-align:center">
                              <?php foreach ($premiumArray['premiumCSSArray'] as $css) {
                                 $radioId = $css['product_code'].substr($css['SumInsured'], 0, -3);
                                 $Premium = number_format($css['Premium'],'2',".",""); 
                                 $ServiceTax = number_format($css['ServiceTax'],'2',".",""); 
                                 $TotalPremium = number_format($css['PremiumPayable'],'2',".",""); 
                                 $SumInsured = $css['product_code'].number_format($css['SumInsured'],'2',".","");

                                 ?>
                              <label class="radio-inline inputradiotxt">
                              <input type="radio" name="premium" id="<?php echo $radioId; ?>" class="planOptions" value=""> 
                              <?php echo $css['shortSI']; ?>   
                              </label>
                              <input type="hidden" name="Premium" id="<?php echo $radioId; ?>_premium" value="<?php echo $Premium; ?>" > 
                              <input type="hidden" name="ServiceTax" id="<?php echo $radioId; ?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
                              <input type="hidden" name="PremiumPayable" id="<?php echo $radioId; ?>_TotalPremium" value="<?php echo $TotalPremium; ?>" >
                              <input type="hidden" name="SumInsured" id="<?php echo $radioId; ?>_SumInsured" value="<?php echo $SumInsured; ?>" >  
                              <?php 
                                 } ?>
                           </div>
                        </div>
                        <div class="col-md-2 shipoption">
                           <div class="shipmaintxt">Uber</div>
                           <div class="radio-list" style="text-align:center">
                              <?php foreach ($premiumArray['premiumUSSBasicArray'] as $ussB) {
                                 $radioId = $ussB['product_code'].substr($ussB['SumInsured'], 0, -3);
                                 $Premium = number_format($ussB['Premium'],'2',".",""); 
                                 $ServiceTax = number_format($ussB['ServiceTax'],'2',".",""); 
                                 $TotalPremium = number_format($ussB['PremiumPayable'],'2',".",""); 
                                 $SumInsured = $ussB['product_code'].number_format($ussB['SumInsured'],'2',".","");

                                 ?>
                              <label class="radio-inline inputradiotxt">
                              <input type="radio" name="premium" id="<?php echo $radioId; ?>" class="planOptions" value=""> 
                              <?php echo $ussB['shortSI']; ?>   
                              </label>
                              <input type="hidden" name="Premium" id="<?php echo $radioId; ?>_premium" value="<?php echo $Premium; ?>" > 
                              <input type="hidden" name="ServiceTax" id="<?php echo $radioId; ?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
                              <input type="hidden" name="PremiumPayable" id="<?php echo $radioId; ?>_TotalPremium" value="<?php echo $TotalPremium; ?>" >
                              <input type="hidden" name="SumInsured" id="<?php echo $radioId; ?>_SumInsured" value="<?php echo $SumInsured; ?>" >  
                              <?php 
                                 } ?>
                           </div>
                        </div>
                        <div class="col-md-4 shipoption">
                           <div class="shipmaintxt">Uber</div>
                           <div class="radio-list" style="text-align:center">
                              <?php foreach ($premiumArray['premiumUSSArray'] as $uss) {
                                 $radioId = $ussB['product_code'].substr($uss['SumInsured'], 0, -3);
                                    $Premium = number_format($uss['Premium'],'2',".",""); 
                                    $ServiceTax = number_format($uss['ServiceTax'],'2',".",""); 
                                    $TotalPremium = number_format($uss['PremiumPayable'],'2',".",""); 
                                    $SumInsured = $ussB['product_code'].number_format($uss['SumInsured'],'2',".","");

                                   ?>
                              <label class="radio-inline inputradiotxt">
                              <input type="radio" name="premium" id="<?php echo $radioId; ?>" class="planOptions" value=""> 
                              <?php echo $uss['shortSI']; ?>   
                              </label>
                              <input type="hidden" name="Premium" id="<?php echo $radioId; ?>_premium" value="<?php echo $Premium; ?>" > 
                              <input type="hidden" name="ServiceTax" id="<?php echo $radioId; ?>_ServiceTax" value="<?php echo $ServiceTax; ?>" > 
                              <input type="hidden" name="PremiumPayable" id="<?php echo $radioId; ?>_TotalPremium" value="<?php echo $TotalPremium; ?>" >
                              <input type="hidden" name="SumInsured" id="<?php echo $radioId; ?>_SumInsured" value="<?php echo $SumInsured; ?>" >  
                              <?php 
                                 } ?>                                 
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="Premium" id="selectedpremium" value="" > 
                     <input type="hidden" name="ServiceTax" id="selectedServiceTax" value="" > 
                     <input type="hidden" name="TotalPremium" id="TotalPremium" value="" >                        
                     <input type="hidden" name="selectedSumInsured" id="selectedSumInsured" value="" >                        
                     <div id="family">
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>In-patient Treatment</strong></div>
                           <?php foreach($premium_choice_array['inpatientTreatmentArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['inpatientTreatment']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['In_patient_treatment'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Pre-Hospitalization</strong></div>
                           <?php foreach($premium_choice_array['preHospitalizationArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['preHospitalization']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Pre_hospitalization'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Post-Hospitalization</strong></div>
                           <?php foreach($premium_choice_array['postHospitalizationArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['postHospitalization']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Post_hospitalization'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Organ Donor</strong></div>
                           <?php foreach($premium_choice_array['organDonorArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['organDonor']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Organ_Donor'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Day Care</strong></div>
                           <?php foreach($premium_choice_array['dayCareArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['dayCare']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Day_careTreatment'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Ayush</strong></div>
                           <?php foreach($premium_choice_array['ayushArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['ayush']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Ayush_Treatment'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Domiciliary Hospitalization</strong></div>
                           <?php foreach($premium_choice_array['domiciliaryHospitalizationArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['domiciliaryHospitalization']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Domiciliary_Hospitalization'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Emergency Surface Ambulance charges</strong></div>
                           <?php foreach($premium_choice_array['emergencyAmbulanceArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['emergencyAmbulance']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Emergency_Surface'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Restoration of Sum Insured</strong></div>
                           <?php foreach($premium_choice_array['restorationInsuredArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['restorationInsured']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Restoration_Insured'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Convalescence Benefit </strong></div>
                           <?php foreach($premium_choice_array['convalescenceBenefitArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['convalescenceBenefit']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Convalescence_Benefit'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Outpatient emergency treatment (Accident only)</strong></div>
                           <?php foreach($premium_choice_array['outpatientemergencyArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['outpatientemergency']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Outpatient_emergency'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Domestic Air Ambulance ( max once in a Policy year / per life)</strong></div>
                           <?php foreach($premium_choice_array['domesticAirAmbulanceArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['domesticAirAmbulance']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Domestic_Ambulance'] ?>"></div>
                        </div>
                        <div class="row healthrestxt1">
                           <div class="col-md-2"><strong>Outpatient Dental emergency (arising out of Accident only)</strong></div>
                           <?php foreach($premium_choice_array['outpatientDentalemergencyArray'] as $ipt) { ?>
                           <div class="col-md-2"><?php echo $ipt['outpatientDentalemergency']; ?></div>
                           <?php  } ?>
                           <div class="col-md-1 pull-right"><img src="<?php echo base_url(); ?>assets/images/question.jpg" data-toggle="tooltip" data-placement="bottom"  title="<?php echo $helpArray['Outpatient_Dental'] ?>"></div>
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
                              <a href="<?php echo base_url(); ?>create-quote-super-ship">
                              <button type="button" id="calculate" class="btn blue btn-default">Back</button>
                              </a>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="pull-right">
                              <div class="form-group">


                                   <a href="<?php echo base_url(); ?>qms-sship-proposal" id="Proceed" > 


                                <!--   <a href="" id="Proceed" > -->
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

           var SumInsuredFiled = coverCode+'_SumInsured';
           var SumInsuredValue = $('#'+SumInsuredFiled).val();
   
           $('#selectedpremium').val(PremiumValue);
           $('#selectedServiceTax').val(ServiceTaxValue);
           $('#TotalPremium').val(TotalPremiumValue);
           $('#selectedSumInsured').val(SumInsuredValue);

   
            $('#premiumBefore').text(PremiumValue+'/-');
            $('#premiumGST').text(ServiceTaxValue+'/-');
            $('#payablePremium').text(TotalPremiumValue+'/-');
       }); 
   
   }); 

   $(document).ready(function() {  

     $('#Proceed').click(function(){

       var basePremium  = $('#selectedpremium').val(); 
          if(basePremium == ''){
              alert('Please select plan...');
              return false;
          }

      var taxValue  = $('#selectedServiceTax').val(); 
      var totalPremium  = $('#TotalPremium').val();  
      var sumInsured  = $('#selectedSumInsured').val();  
      var mx_premium_details = "Premium before tax : "+basePremium+"\\n GST : "+taxValue+"\\n Payable Premium : "+totalPremium; 
      
      var webUrl = $('#web_url').val()
      var URL = webUrl + 'Quotesship/premiumUpdateSship/';
      $.ajax({
            url: URL,
            type: 'POST',
            data: {
               'Premium': basePremium,
               'ServiceTax': taxValue,
               'PremiumPayable': totalPremium,
               'sumInsured' : sumInsured,
         },
         dataType: 'json',
         success: function(data) {

                alert(data);
         },
      });
   })

})
   
</script>