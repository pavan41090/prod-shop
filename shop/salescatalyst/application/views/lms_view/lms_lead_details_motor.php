<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">
<input type="hidden" id="lead_id" value="<?php echo $leadId; ?>">

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
               <a href="lms-lead-list">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="lms-lead-list"><?php echo $module; ?></a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span> <?php echo $title ?> </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
                
                <div class="portlet-title">
                    <div class="caption"> <?php echo $title ?> </div>
                  </div>  
               
               <?php if(!isset($lead_details[0])) { ?>


                <div class="portlet-body planbox" style="color: #000;">

                    <div class="box lmsresult">
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  No Details Found
                              </div>
                          </div>
                    </div>              

                </div> 
               <?php } else { ?> 

               <?php $stageButtonLabel = ''; 

    switch ($logged_user_type) {
      case 'bagi_av': 
      $stageButtonLabel = 'Lead Stage';
       ?>
          <div class="caption pull-right"> 
              <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#lead-status"><?php echo $stageButtonLabel; ?></button> 
          </div>
      <?php 
       break;
      case 'supervisor':
        $stageButtonLabel = 'Approve Lead';
      ?>

        <div class="caption pull-right"> 
          <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#lead-status"><?php echo $stageButtonLabel; ?></button> 
        </div>
      <?php  
      break;
      case 'hdfc_ops':
      $stageButtonLabel = 'Approve Payment';
      ?>
        <div class="caption pull-right"> 
          <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#lead-status"><?php echo $stageButtonLabel; ?></button> 
        </div>
      <?php        
     
        break;
      case 'bagi_ops':
        
        break;

      }
?>
               <div class="portlet-body planbox" style="color: #000;">
                  <div ng-controller="MainCtrl">
                    <?php require_once 'card-name-relation-view.php'; ?>

                      <div class="box lmsresult">
                        <div class="row lmsresbor"> <div class="col-md-3">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Policy Number  </div>
                                      <div class="col-md-7">: <?php echo $policyData->policy_number; ?> </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Policy Start Date  </div>
                                      <div class="col-md-7">: <?php echo $policyData->policy_start_date; ?> </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Policy End Date  </div>
                                      <div class="col-md-7">: <?php echo $policyData->policy_end_date; ?> </div>
                                  </div>
                              </div></div>
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Application No. </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->lead_application_id; ?> </div>
                                  </div>
                              </div>
                             
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Product  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->product_type; ?> </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Lead Status  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->lead_status; ?> </div>
                                  </div>
                              </div>                            
                          </div>

                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> First Name  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->first_name; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Last Name  </div>
                                      <div class="col-md-5">: <?php echo $lead_details[0]->last_name; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Phone  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_phone; ?> </div>
                                  </div>
                              </div>                            
                            </div>



                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Email </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_email ; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Date Of Birth  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->date_of_birth ; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Gender  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_gender ; ?> </div>
                                  </div>
                              </div>                            
                            </div>



                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Marital Status  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->marital_status; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> State </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_state; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> City</div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_city; ?> </div>
                                  </div>
                              </div>                            
                          </div>

                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Address 1 </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_street1; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Address 2  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_street2; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Area  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_area; ?> </div>
                                  </div>
                              </div>                            
                          </div>


                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Zip Code </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_zip; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Occupation  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->occupation; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                <?php if($lead_details[0]->GSTIN != '') { ?>
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> GSTIN  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->GSTIN; ?> </div>
                                  </div>
                                  <?php } ?>
                              </div>                            
                          </div>

                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Customer Type</div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_type; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Alternate Contact Number </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->emergency_contact_num; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Pan Number  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cust_pan; ?> </div>
                                  </div>
                              </div>                            
                          </div>




                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Category  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->category; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Line of Business </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->line_of_business; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Type Of business </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->business_type; ?>   </div>
                                  </div>
                              </div>                            
                          </div>


                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                 <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Case Id </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->case_id; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> AAN Number  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->aaa_number; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Target Date  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->target_date; ?> </div>
                                  </div>
                              </div>                            
                          </div>


                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> TSE/BDR Code  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->TSE_BDR_code; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> TL Code/DSA Code  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->TL_code; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> SM Code  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->SM_code; ?> </div>
                                  </div>
                              </div>                            
                          </div>


                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Bank Verifier ID  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->bank_verifier_id; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Payment Type  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->payment_type; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Priority </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->priority; ?> </div>
                                  </div>
                              </div>                            
                          </div>



                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> HDFC Card Relationship No  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->HDFC_card_relationship_no; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> HDFC Card's Last 4 digits  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->HDFC_card_last_4_digits; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Lead Details  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->lead_details; ?> </div>
                                  </div>
                              </div>                            
                          </div>







                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Right time to contact the customer  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_customer; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Language for contact  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_language; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Add A EMI </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_emi; ?> </div>
                                  </div>
                              </div>  
                                                        
                          </div>

                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Processing Fee Applicable  </div>
                                      <div class="col-md-7">: <?php if($lead_details[0]->processing_fee  == 1){ echo 'Yes'; } else { echo 'No'; } ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Enhanced Credit Card Limit  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_cardlimt; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Statement Date </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->statement_date; ?> </div>
                                  </div>
                              </div>                            
                          </div>
                   
     
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Temp LE </div>
                                      <div class="col-md-7">: <?php  if($lead_details[0]->temp_LE == 1) { echo 'Yes'; } else { echo 'No'; } ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> EMI Years </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_emi_yr; ?> </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                              
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Sub Channel</div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->sub_channel; ?> </div>
                                  </div>
                              </div>
                          </div>
                   




                   
     

                      </div>
                  </div>
               </div>

               <div class="portlet-title">
                  <div class="caption">Product Details </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                  <div>

                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Product </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->product_type; ?> </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Pre Insurance </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->pre_insurance ; ?> </div>
                                  </div>
                              </div>   
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Reg Number  </div>
                                      <div class="col-md-7" style="text-transform: uppercase;">: <?php echo $lead_details[0]->reg_number ; ?>   </div>
                                  </div>
                              </div>                         
                          </div>

                          <div class="row lmsresbor">
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Manufacture Year  </div>
                                      <div class="col-md-5">: <?php echo $lead_details[0]->manufacture_year ; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Manufacturer  </div>
                                      <?php $nameman = $this->db->select('make_name')->where('make_sno',$lead_details[0]->manufacturer)->get('tbl_make_master')->row_object(); ?>
                                      <div class="col-md-7">: <?php echo $nameman->make_name; ?> </div>
                                  </div>
                              </div>   
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Model Varient </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->model_varient ; ?>   </div>
                                  </div>
                              </div>                         
                            </div>

                          <div class="row lmsresbor">
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Registration City  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->registration_city ; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Policy Expire Date </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->policy_expire_date ; ?> </div>
                                  </div>
                              </div>   
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> IDV Value  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->IDV_value; ?>   </div>
                                  </div>
                              </div>                         
                            </div>



                          <div class="row lmsresbor">
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Show Room Value </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->show_room_value; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Expiring Policy Claim</div>
                                      <div class="col-md-5">: <?php if($lead_details[0]->expiring_policy_claim == '1') { echo 'YES'; }else{ echo 'NO';} ?> </div>
                                  </div>
                              </div>   
                                <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Expiring Policy NCB </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->expiring_policy_NCB; ?>   </div>
                                  </div>
                              </div>
							  
                          </div>

                          <div class="row lmsresbor">
						  <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Tenure </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->vehicle_tenure; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                     <div class="col-md-5 labeltxtleft"> Premium </div>
                                      <div class="col-md-5">: <?php echo $lead_details[0]->lms_premium ; ?>   </div>
                                  </div>
                              </div>
                          </div>                          


                       


                      </div>
                  </div>
              </div>
                <div class="portlet-title">
                  <div class="caption"> Proposal Details </div>
               </div>

               <?php $ddjson = json_decode(json_encode($quotedetails),true); ?>

                <div class="portlet-body planbox" style="color: #000;">
                  <div>
                    <?php 
                    $quote_data = json_decode($ddjson['quote_data'],true);
                    $PremiumDetails = $quote_data['PremiumDetails'];
                    $Cover = json_decode($quote_data['Cover'],true);
                    $FcalPremiunAmount = 0;
                    $ThirdPartyLiability = 0;
                    for($p=1;$p<count($Cover);$p++){
                      //if($Cover[$p]['Name'] == 'ThirdPartyLiability'){
                          $ThirdPartyLiability += $Cover[$p]['Premium'];
                      //}
                          if($Cover[$p]['Name'] == 'PAOwnerDriver'){
                            $paPremium = $Cover[$p]['Premium'];
                          }
                    }
                    //PAOwnerDriver
                     //print_r(array_search('PAOwnerDriver',$Cover));

                    ?>
                    <div class="row">
                      <table class="table text-center" style="text-align: start;">
                        <tr><td>Order No</td><td>:</td><td><?php echo $quote_data['OrderNo']; ?></td></tr>
                        <tr><td>Quote No</td><td>:</td><td><?php echo $quote_data['QuoteNo']; ?></td></tr>
                        <tr><td>OD Premium</td><td>:</td><td><?php echo $Cover[0]['Premium']; ?></td></tr>
                        <tr><td>PA Premium</td><td>:</td><td><?php echo $paPremium; ?></td></tr>
                        <tr><td>NCB</td><td>:</td><td><?php echo $Cover[0]['ExtraDetails']['BreakUp']['NCB']; ?></td></tr>
                          <tr><td>Third Party</td><td>:</td><td><?php echo $ThirdPartyLiability; ?></td></tr>
                          <tr><td>Tax</td><td>:</td><td><?php echo $PremiumDetails['ServiceTax']; ?></td></tr>
                        <tr><td>Total Premium</td><td>:</td><td><?php echo $PremiumDetails['TotalPremium']; ?></td></tr>
                        </table>
                    </div>

                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Existing insurance company name : </div>
                                      <div class="col-md-7"><?php echo $lead_details[0]->existing_insure ; ?> </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Existing policy number  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->existing_policy_num ; ?> </div>
                                  </div>
                              </div>  
                                <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Registration date </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->vehicle_register_date ; ?> </div>
                                  </div>
                              </div>                                
                          </div>

                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Existing policy expiry date  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->existing_policy_expiry ; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Proposed policy start date  </div>
                                      <div class="col-md-5">: <?php echo $lead_details[0]->new_policy_start ; ?>   </div>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Was the previous policy a Standalone Third party policy? </div>
                                      <div class="col-md-7">: <?php if($lead_details[0]->prop_mtr_prev_stand_alone == 1) { echo 'YES'; } else { echo 'No'; }; ?> </div>
                                  </div>
                              </div>
                          </div>


                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Depreciation cover included in the previous policy?</div>
                                      <div class="col-md-7">: <?php if($lead_details[0]->prop_mtr_prev_prev_depre == 1) { echo 'YES'; } else { echo 'No'; }; ?> </div>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Electrical/Non-electrical accessories included in the previous policy?</div>
                                      <div class="col-md-7">: <?php if($lead_details[0]->prop_mtr_prev_prev_electric == 1) { echo 'YES'; } else { echo 'No'; }; ?> </div>
                                  </div>
                              </div>        

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">External fitted CNG/LPG kit included in the previous policy?</div>
                                      <div class="col-md-7">: <?php if($lead_details[0]->prop_mtr_prev_prev_cng_lpg == 1) { echo 'YES'; } else { echo 'No'; }; ?> </div>
                                  </div>
                              </div>    

                          </div>



                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Vehicle engine number is  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->prop_mtr_engine_num ; ?>   </div>
                                  </div>
                              </div>            
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Vehicle chasis number</div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->prop_mtr_chasis_num ; ?>   </div>
                                  </div>
                              </div>

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Vehicle is financed  </div>
                                      <div class="col-md-7">: <?php if($lead_details[0]->prop_mtr_financed == 1) { echo 'YES'; } else { echo 'No'; }; ?> </div>
                                  </div>
                              </div>                            
                          </div>

                          <?php if((int)$lead_details[0]->hme_previous_claims == 1){ ?>

                          <div class="row lmsresbor">

                            <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Previous policy details available  </div>
                                      <div class="col-md-7"> Yes </div>
                                  </div>
                              </div>      

                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Policy start date  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->home_policy_start ; ?>   </div>
                                  </div>
                              </div>            
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Policy expiry Date </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->home_policy_end ; ?>   </div>
                                  </div>
                              </div>
                      
                          </div>

                        <?php } ?>


                        <?php if($lead_details[0]->prop_mtr_financed == 1) { ?>

                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Financing institution name  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->prop_mtr_fin_ins_name; ?>   </div>
                                  </div>
                              </div> 
                              
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Financing institution city </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->prop_mtr_fin_ins_city; ?>   </div>
                                  </div>
                              </div> 
                          </div>    
                        <?php }?>


                        </div>
                    </div>  
               </div>


                       
              <div class="portlet-title">
                  <div class="caption"> Nominee Details </div>
               </div>

                <div class="portlet-body planbox" style="color: #000;">
                  <div>

                      <div class="box lmsresult">

                          <div class="row lmsresbor">
                           
                             
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Nominee Name  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->nominee_name; ?> </div>
                                  </div>
                              </div>  
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Nominee Age </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->nominee_age; ?>   </div>
                                  </div>
                              </div> 
                               <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Nominee Relationship  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->nominee_relationship; ?>   </div>
                                  </div>
                              </div>                         
                          </div>


                          <div class="row lmsresbor">
                              
                             
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Name Of Appointee </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->appointee_name; ?> </div>
                                  </div>
                              </div> 
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Appointee Relationship with nominee</div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->appointee_relationship; ?>   </div>
                                  </div>
                              </div>                           
                          </div>

                      </div>
                  </div>
              </div>



                    <div class="portlet-title" style="display: none;">
                  <div class="caption"> Drivering Details </div>
               </div>

                <div class="portlet-body planbox" style="color: #000;display: none;">
                  <div>

                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                            
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> I have been driving a car for</div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->driving_exp; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> My parking at night is  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->night_parking; ?> </div>
                                  </div>
                              </div>   
                                 <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> My family members who can drive are  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->driver_count; ?>   </div>
                                  </div>
                              </div>                         
                          </div>




                          <div class="row lmsresbor">
                           
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Annually,we drive our car about kms </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->KM_per_year; ?>   </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> The youngest driver in my family is aged </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->young_driver_age; ?> </div>
                                  </div>
                              </div> 
                                <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Do i use a driver </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->ext_driver; ?>   </div>
                                  </div>
                              </div>                           
                          </div>



                          

                   
     

                      </div>
                  </div>
               </div>



            <div class="portlet-title">
                <div class="caption"> User Comments </div>
            </div>

                <div class="portlet-body planbox" style="color: #000;">
                  <div>

                      <div class="box">
                        <?php foreach($comment_details as $cmts) { ?>
                          <div class="row lmsresbor">
                             <div class="col-md-4">
                              <div class="usercome"><?php echo $cmts->emp_name; ?> (<?php echo $cmts->emp_code?>)</div>
                              <div class="userdate"><?php  echo $cmts->created_by;?></div>
                             </div>
                             <div class="col-md-7 textcomm"><?php  echo $cmts->comment;?></div> 
                                                      
                          </div>
                           <?php } ?>


                       
                          <div class="row lmsresbor">

                              <div class="form-group"> 

                               <?php if($logged_user_type == 'bagi_av' || $logged_user_type == 'supervisor'){ ?>
                                <div class="col-md-11">
                                  <label class="newcoments">Add New Comment <span class="required"> * </span></label>
                                  
                                  <textarea class="form-control" rows="5" id="lms_lead_comment" name="lms_lead_comment" placeholder="Comments"></textarea>
                                  <div style="display: none;" class="required" id="cmt_error">Comment should not be blank</div>
                                  <div class="leavecomoment"><input type="button" name="add_comment" id="add_comment" class="btn blue btn-default" value="Leave Comment"></div>
                                </div>
                                   <?php } ?>
                              </div>

                           
                          </div> 
                          
                      </div> 
                  </div>
               </div>

<?php } ?>


            </div>
         </div>
      </div>
   </div>

</div>






<div id="lead-status" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 55%;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>


             <?php 
                $stageButtonLabel = '';
                $submitButton = '';
                switch ($logged_user_type) {
                  case 'bagi_av':
                    $stageButtonLabel = 'Modify Lead Stage';
                    $submitButton = '<button type="button" class="btn blue btn-default" id="update_lead">Update</button>';
                    break;
                  case 'supervisor':
                    $stageButtonLabel = 'Modify Lead Stage';

                    $submitButton = '<button type="button" class="btn blue btn-default" id="update_lead_super">Update</button>';
                    break;
                  case 'hdfc_ops':
                       $stageButtonLabel = 'Enter Payment Details';
                        $submitButton = '<button type="button" class="btn blue btn-default" id="update_lead_payment">Add Details</button>';
                    break;
                  case 'bagi_ops':
                      
                    break;
                }

                ?>

            <h4 class="modal-title"><?php echo $stageButtonLabel; ?></h4>
      </div>
      <div class="modal-body">
          <div class="row">
                <div class="col-md-12" id="modal_error" style="color: red;"></div>

            <?php if($logged_user_type == 'bagi_av'){ ?>
              <div class="col-md-4">Lead Status </div>
              <div class="col-md-8">
                  <select id="lead_status" class="form-control input-sm">

                          <option value="">Select Status</option>
                          <option value="Follow Up">Follow Up</option>
                          <option value="Not Contacted">Not Interested</option>
                          <option value="Not Contacted">Not Contacted</option>
                          <option value="Lead Lost" >Lead Lost</option>
                          <option value="Sales Open">Sales Open</option>
                          <option value="Sales Closed">Sales Closed</option>
                    </select>
                </div>
        
              <div class="row col-md-12">&nbsp;</div>

              <div class="col-md-4">Sub Status </div>
              <div class="col-md-8">
                  <select id="lead_sub_status" class="form-control input-sm">                      
                          <option value="">Select Sub Status</option>
                          <option value="Follow Up">Follow Up</option>
                          <option value="Not Contacted">Not Interested</option>
                          <option value="Not Contacted">Not Contacted</option>
                          <option value="Lead Lost" >Lead Lost</option>
                          <option value="Sales Open">Sales Open</option>
                          <option value="Sales Closed CC">Sales Closed CC</option>
                          <option value="Sales Closed Online">Sales Closed Online</option>
                    </select>
                </div>
        
               <?php  } else if($logged_user_type == 'supervisor') {  ?>
                    
                <div class="col-md-4">Lead Stage </div>
                  <div class="col-md-6">
                      <select id="lead_status" class="form-control input-sm">
                      <option value="">Select Stage</option>
                      <option value="Proceed for Debit">Proceed for Debit</option>
                      <option value="Lead Lost">Lead Lost</option>
                    </select>
                  </div>
                    <div class="col-md-12"> &nbsp;</div>
                  <div class="col-md-12">
                     <input class="" type="checkbox" name="chkCertifiedAV" id="chkCertifiedAV" value="0" />
                     <label> Sales has been done by Certified AV</label>
                  </div>
                  <div class="col-md-12" id="chkCertifiedAV_error" style="color: red;"></div>
                  <div class="col-md-12">
                     <input class="" type="checkbox" name="chkEnsuredAV" id="chkEnsuredAV" value="0" />
                     <label> I have ensured that the AV is adequately & regularly trained on the Products and Scripts for Insurance </label>
                  </div>
                  <div class="col-md-12" id="chkEnsuredAV_error" style="color: red;"></div>
                  <div class="col-md-12">
                     <input class="" type="checkbox" name="chkCdrCode" id="chkCdrCode" value="0" />
                     <label>  AV has used only his own CDR Code for logging the case in LMS. </label>
                  </div>
                  <div class="col-md-12" id="chkCdrCode_error" style="color: red;"></div>

                   <?php  } else if($logged_user_type == 'hdfc_ops') {  ?>
                          
                      <div class="col-md-4"> Payment Details </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control input-sm"  placeholder="Payment Details" id="payment_details" name="payment_details" >
                      </div>
                      <?php } ?>

             
          </div> 
          <div class="row">&nbsp;</div> 
          <div class="row">
              <div class="col-md-2 pull-right">
                <?php echo $submitButton; ?>
<!--                   <button type="button" class="btn blue btn-default" id="update_lead">Update</button>
 -->              </div>
          </div>  
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url();?>assets/js/lms_js/lms-lead-status-update.js"></script>
<script type="text/javascript">
 
  $("#update_lead_super").on('click', function() {

      $('#modal_error').html('');
      $('#chkCertifiedAV_error').html('');
      $('#chkEnsuredAV_error').html('');
      $('#chkCdrCode_error').html('');
      
      var webUrl = $('#web_url').val();
      var leadStatus = $('#lead_status').val();
      var leadId = $('#lead_id').val();
      if(leadStatus == ''){
          $('#modal_error').html('Please select the stage ');
      } else if (!$("#chkCertifiedAV").is(":checked")) {
          $('#chkCertifiedAV_error').html('Please certify AV has been done the sales ');
      } else if (!$("#chkEnsuredAV").is(":checked")) {
          $('#chkEnsuredAV_error').html('Please ensure that the AV is adequately & regularly trained');
      } else if (!$("#chkCdrCode").is(":checked")) {
          $('#chkCdrCode_error').html('Please confirm AV has used only his own CDR Code');
      } else {

          $.ajax({
              url : webUrl+'LmsCar/updateLeadStausByLeadIdBySupervisorJson',
              type : 'POST',
              data : {'leadId' : leadId,
                    'leadStatus' : leadStatus},
              dataType:'json',
              
              success: function( data){
                  alert('Lead Updated Successfully');
                  var redirectUrl = webUrl+'lms-lead-list'
                  window.location.href = redirectUrl;
              },
        });
      }  

  });


  $("#update_lead_payment").on('click', function() {
     
      var webUrl = $('#web_url').val();
      var paymentDetails = $('#payment_details').val();
      var leadId = $('#lead_id').val();

      $.ajax({
          url : webUrl+'LmsCar/updateLeadPaymentStatus',
          type : 'POST',
          data : {'leadId' : leadId,
                  'paymentDetails' : paymentDetails},
              dataType:'json',
           
              success: function( data){
                alert('Lead Updated Successfully');
                var redirectUrl = webUrl+'lms-lead-download/'
                window.location.href = redirectUrl;
              },
      });

  });



  $("#add_comment").on('click', function() {
  
      var webUrl = $('#web_url').val();
      var leadComment = $('#lms_lead_comment').val();
      var leadId = $('#lead_id').val();
      
      if(leadComment == '' ){  

        $('#cmt_error').show();

      } else {  
          $.ajax({
              url : webUrl+'LmsCar/lmsAddLeadCommentByJson',
              type : 'POST',
              data : {'leadId' : leadId,
                    'leadComment' : leadComment},
                  dataType:'json',
              success: function( data){
                    alert('Comment added Successfully');
                    location.reload(true);
              },
        });
      }   

  });   

  $("#lms_lead_comment").on('click', function() {
     $('#cmt_error').hide();
  });  


</script>


