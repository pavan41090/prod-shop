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
               <a href="lms-lead-list"></a>
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
      <?php // print_r($lead_details); exit(); ?>
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

                      <div class="box lmsresult">
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
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> GSTIN  </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->GSTIN; ?> </div>
                                  </div>
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
                                      <div class="col-md-5 labeltxtleft"> Priority  </div>
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
							  <?php if($lead_details[0]->payment_type == 'Credit Card'){ ?>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Add A EMI </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_emi; ?> </div>
                                  </div>
                              </div>    
							  <?php } ?>							  
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
							  <?php if($lead_details[0]->payment_type == 'Credit Card' && $lead_details[0]->cus_emi == 'Yes'){ ?>
                             <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> EMI Years </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_emi_yr; ?> </div>
                                  </div>
                              </div>
							  <?php } ?>
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

                    <?php
                        if( $lead_details[0]->ship_spouse_include == '1') {
                            $spouseInclude = 'Yes';
                        } else {
                            $spouseInclude = 'No';
                        }
                    ?>

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
                                      <div class="col-md-5 labeltxtleft"> Include Spouse </div>
                                      <div class="col-md-7">: <?php echo $spouseInclude; ?> </div>
                                  </div>
                             </div>                              

                              <?php if($spouseInclude == 'Yes') { ?>
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Spouse Dob </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->ship_spouse_dob; ?> </div>
                                  </div>
                             </div>
                             <?php } ?>

                           </div>

                          <div class="row lmsresbor">
						  
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> Hospital Daily Cash </div>
                                    <div class="col-md-5">: <?php echo ($lead_details[0]->ss_hospital_daily > 0 ? 'Yes' : 'No'); ?>   </div>
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> Premium </div>
                                    <div class="col-md-5">: <?php echo $lead_details[0]->lms_premium ; ?>   </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> Include Children </div>
                                    <div class="col-md-5">: <?php echo $lead_details[0]->ship_no_of_children; ?>   </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> Income (P.A) </div>
                                    <div class="col-md-5">: <?php echo $lead_details[0]->ship_income; ?>   </div>
                                </div>
                            </div>
                             <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> Sum Insured</div>
                                    <div class="col-md-5">: <?php echo $lead_details[0]->sum_insured ; ?>   </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft">Critical Illness</div>
                                    <div class="col-md-5">: <?php echo ( $lead_details[0]->ss_critical >0 ? $lead_details[0]->ss_sum_insured_critical : '0') ; ?>   </div>
                                </div>
                            </div>
                          </div>

                          <div class="row lmsresbor">
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> Policy Term (in Years) </div>
                                    <div class="col-md-5">: <?php echo $lead_details[0]->ship_policy_term ; ?>   </div>
                                </div>
                            </div>
                          </div>  


                      </div>
                  </div>
              </div>
                <div class="portlet-title">
                  <div class="caption"> Proposal Details </div>
               </div>

                <div class="portlet-body planbox" style="color: #000;">
                  <div>

                      <div class="box lmsresult">
         

                          <div class="row lmsresbor">
                         
                              <div class="col-md-6">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Proposed policy start date  </div>
                                      <div class="col-md-5">: <?php echo $lead_details[0]->new_policy_start ; ?>   </div>
                                  </div>
                              </div>
                            </div>


                      <?php foreach($member_details as $mbr) { ?>

                          <div class="row lmsresbor ">
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> Salutation  </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_title']; ?>   </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> First Name </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_first_name']; ?>   </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> Last Name  </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_last_name']; ?>   </div>
                                </div>
                            </div>
                          </div>
                          <div class="row lmsresbor">
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> DOB  </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_DOB'] ; ?>   </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> Gender  </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_gender']; ?>   </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> Occupation  </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_ocupation']; ?>   </div>
                                </div>
                            </div>
                          </div> 
                          <div class="row lmsresbor">
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> Height(in CM's)  </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_height']; ?>   
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                   <div class="col-md-5 labeltxtleft"> <?php echo $mbr['mem_type']; ?> Weight(in KG's)  </div>
                                    <div class="col-md-5">: <?php echo $mbr['mem_weight']; ?>   
                                  </div>
                                </div>
                            </div>
                          </div>                           

                         <div class="row lmsresbor ">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Have you suffered from or are you currently suffering from any disease, illness, disability, injury or accident or advised/consuming medication or undergone/advised/awaiting any surgical procedure ( other than Normal /assisted Delivery or Caesarean section without any complication) or undergone any investigations, in the past 4 years?</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_1'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                           <div>&nbsp;</div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Have you ever had or has a doctor ever said that you have any of the following conditions /diseases -: High blood pressure, diabetes or sugar, any heart related ailment, brain stroke, Paralysis, TB or asthma or breathing problem, tumor or cancer, liver or gall bladder diseases, prostrate, kidney or stone diseases, arthritis or bone disease, blood diseases or disorders, ulcer or stomach disorder, eye or ENT disease, dizziness or fits, HIV/AIDS / any other sexually transmitted disease, Ulcer (Stomach / Intestine), Anemia, Leukemia or any other blood/lymphatic system disorder</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_2'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                           <div>&nbsp;</div>
                           
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Have you ever had or has a doctor ever said that you have multiple sclerosis, epilepsy, tremors, paralysis, psychiatric/mental illnesses or sleep disorder</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_3'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                            <div>&nbsp;</div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Have you taken any medication for more than 2 weeks in last 5 years? </label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_4'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                            <div>&nbsp;</div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Are you currently suffering from or have ever suffered from Dysfunctional uterine bleeding, Fibroid, Cyst / Fibroadenoma or any other Gynaecological / Breast disorder?</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_5'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                            <div>&nbsp;</div>  

                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Has any application for life, Health or critical illness insurance ever been declined, postponed, loaded or been made subject to any special conditions by any insurance company?</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_6'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                            <div>&nbsp;</div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Undertaken any lab/blood tests, imaging tests viz. scans/MRI in the last 5 years other than routine health check-up or pre-employment check-up?</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_7'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                            <div>&nbsp;</div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Any complaint of diabetes, hypertension or any complication during current or earlier pregnancy?</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_8'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                            <div>&nbsp;</div>

                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 ">
                                    <label class="labeltxtleft">Is the insured person pregnant? If yes, please mention the expected date of delivery</label>
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_9'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                              </div>

                              <?php if($mbr['option_9'] == '1'){ ?>
                                  <div class="form-group">
                                     <div class="col-md-3">
                                        <label class="labeltxtleft">Delivery Date</label>
                                     </div>
                                     <div class="col-md-5">
                                        <div class="col-md-5">: <?php echo $mbr['delivery_date']; ?> </div>
                                     </div>
                                  </div>
                            <?php }  ?>

                           </div>
                            <div>&nbsp;</div>   




                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Have any person proposed to be insured received any advice/ treatment / consultation for any medical condition in the last 4 years? If yes, please specify</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_10'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                             
                              </div>
                           </div>
                            <div>&nbsp;</div>


     
            
            <div class="col-md-12" >
     
               <div class="form-group col-md-12 "> 
                  <div class="col-md-3"><label class="labeltxtleft">Name of Existing Diseases/Surgery</label></div>
                  <div class="col-md-2"><label class="labeltxtleft" >Diagnosis Date</label></div>
                  <div class="col-md-2"><label class="labeltxtleft">Date of last consultation</label></div>
                  <div class="col-md-2"><label class="labeltxtleft">Treatment Type</label></div>
                  <div class="col-md-3"><label class="labeltxtleft">Doctor/Hospital Name & Phone No.</label></div>
               </div>
               <?php foreach($mbr['medical_history'] as $hty) {?> 
                    <div class="form-group col-md-12"> 
                      <div class="col-md-3"><label> <?php echo $hty->diseases_name; ?></label></div>
                      <div class="col-md-2"><label> <?php echo $hty->diagnosis_date; ?></label></div>
                      <div class="col-md-2"><label> <?php echo $hty->last_consultation; ?></label></div>
                      <div class="col-md-2"><label> <?php echo $hty->treatment_type; ?></label></div>
                      <div class="col-md-3"><label> <?php echo $hty->hospital_name; ?></label></div>
                    </div>
             <?php } ?>
            </div>
          
          
      


                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="col-md-10 "><label class="labeltxtleft">Does any person proposed to be Insured smoke or consume Gutka/ Pan Masala /alcohol? If yes, please indicate the name and quantity per week</label>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                      <?php if($mbr['option_11'] == '1'){ echo 'YES';} else { echo 'NO'; } ?>
                                     </label>
                                 </div>
                              </div>


                              <?php if($mbr['option_11'] == '1'){ ?>
                                <div class="col-md-12">
                                  <div class="form-group">
                                     <div class="col-md-4">
                                        <label class="labeltxtleft">Smoke (No. of sticks)</label>
                                     </div>
                                     <div class="col-md-8">
                                        <div class="col-md-5">: <?php echo $mbr['smoke']; ?> </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                     <div class="col-md-4">
                                        <label class="labeltxtleft">Alcohol (No of pegs / Beer Bottles - Each Peg is 30 ml)</label>
                                     </div>
                                     <div class="col-md-8">
                                        <div class="col-md-5">: <?php echo $mbr['alcohol']; ?> </div>
                                     </div>
                                  </div>                                  
                                </div>
                                <div class="col-md-12">  
                                  <div class="form-group">
                                     <div class="col-md-4">
                                        <label class="labeltxtleft">Pan Masala (No of Pouches)</label>
                                     </div>
                                     <div class="col-md-8">
                                        <div class="col-md-5">: <?php echo $mbr['pan_masala']; ?> </div>
                                     </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                     <div class="col-md-4">
                                        <label class="labeltxtleft">Others</label>
                                     </div>
                                     <div class="col-md-8">
                                        <div class="col-md-5">: <?php echo $mbr['others']; ?> </div>
                                     </div>
                                  </div> 
                                </div>                                   


                            <?php }  ?>                              



                           </div>
                            <div>&nbsp;</div>                                                              


                        </div>
                            <?php  } ?>
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
<!--doctor view details(pavan)-->

<div class="portlet-title">
                  <div class="caption"> Family Doctor's Details,if any </div>
              </div>

                <div class="portlet-body planbox" style="color: #000;">
                  <div>

                      <div class="box lmsresult">

                          <div class="row lmsresbor">
                           
                             
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Doctor Name  </div>
                                      <div class="col-md-7">: <?php echo $lead_details_edit[0]['sship_pro_doc_name']; ?> </div>
                                  </div>
                              </div>  
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Qualification </div>
                                      <div class="col-md-7">: <?php echo $lead_details_edit[0]['sship_pro_doc_qualifi']; ?>   </div>
                                  </div>
                              </div> 
                               <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Address  </div>
                                      <div class="col-md-7">: <?php echo $lead_details_edit[0]['sship_pro_doc_addr']; ?>   </div>
                                  </div>
                              </div>                         
                          </div>

                          <div class="row lmsresbor">
                            
                             
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Mobile Number </div>
                                      <div class="col-md-7">: <?php echo $lead_details_edit[0]['sship_pro_doc_mobile']; ?> </div>
                                  </div>
                              </div> 
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Clinic/Hospital Number</div>
                                      <div class="col-md-7">: <?php echo $lead_details_edit[0]['sship_pro_hos_num']; ?>   </div>
                                  </div>
                              </div>                           
                          </div>

                      </div>
                  </div>
              </div>


<!--doctor view details end(pavan)-->



              <div class="portlet-title">
                  <div class="caption"> Information for Issuance of Tax Statement (Section 80D of Income Tax Act 1961) </div>
              </div>

                <div class="portlet-body planbox" style="color: #000;">


                          <div class="row lmsresbor">
                              <div class="col-md-12">
                                  <div class="row">
                                      <div class="col-md-4 labeltxtleft">Are you the primary insured?</div>
                                 <div class="col-md-2">
                                    <label class="radio-inline" style="font-size:13px;">
                                          <?php if($lead_details[0]->ship_primary_insured == '0'){ echo 'NO';} else { echo 'YES'; } ?>
                                     </label>
                                 </div>
                                  </div>
                              </div>
                          </div>   

        <?php if($lead_details[0]->ship_primary_insured == '0') {?>                  

                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Salutation </div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_title']; ?> </div>
                                  </div>
                              </div>  
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Your Name </div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_name']; ?>   </div>
                                  </div>
                              </div> 
                               <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Relationship with primary insured </div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_relation']; ?>   </div>
                                  </div>
                              </div>                         
                          </div>
                      </div>

                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Date Of Birth</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_dob']; ?> </div>
                                  </div>
                              </div>  
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Gender</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_gender']; ?>   </div>
                                  </div>
                              </div> 
                               <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Address line 1</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_addr1']; ?>   </div>
                                  </div>
                              </div>                         
                          </div>
                      </div>                      


                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Address line 2</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_addr2']; ?> </div>
                                  </div>
                              </div>  
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Nearest Landmark</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_landmark']; ?>   </div>
                                  </div>
                              </div> 
                               <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Fixed Line Contact No</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_fixed_line']; ?>   </div>
                                  </div>
                              </div>                         
                          </div>
                      </div>     


                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Mobile Number</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_mobile']; ?> </div>
                                  </div>
                              </div>  
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Email ID</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_email']; ?>   </div>
                                  </div>
                              </div> 
                               <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Nationality-Indian</div>
                                      <div class="col-md-7">: <?php 
                                      if($primary_ins_details[0]['prim_nationality']==1)
                                      {
                                        echo "Yes";
                                      }else
                                      {
                                        echo "No";
                                      } ?> 
                                       </div>
                                  </div>
                              </div>                         
                          </div>
                      </div>     

                      <div class="box lmsresult">
                          <div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Occupation</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_occupation']; ?> </div>
                                  </div>
                              </div>  
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">Income</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_income']; ?>   </div>
                                  </div>
                              </div> 
                               <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft">PPC Number</div>
                                      <div class="col-md-7">: <?php echo $primary_ins_details[0]['prim_PPC_No']; ?>   </div>
                                  </div>
                              </div>                         
                          </div>
                      </div>  
                    <?php } ?>

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

                            <?php if($logged_user_type == 'bagi_av' || $logged_user_type == 'supervisor'){ ?>
                          <div class="row lmsresbor">

                              <div class="form-group">
                                <div class="col-md-11">
                                  <label class="newcoments">Add New Comment </label>
                                  
                                  <textarea class="form-control" rows="5" id="lms_lead_comment" name="lms_lead_comment" placeholder="Comments"></textarea>
                                  <div style="display: none;" class="required" id="cmt_error">Comment should not be blank</div>
                                  <div class="leavecomoment"><input type="button" name="add_comment" id="add_comment" class="btn blue btn-default" value="Leave Comment"></div>
                                </div>
                              </div>
                          </div> 

                          <?php }?>
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


<script type="text/javascript">
  
  $("#update_lead").on('click', function() {
     
      var webUrl = $('#web_url').val();
      var leadStatus = $('#lead_status').val();
      var leadSubStatus = $('#lead_sub_status').val();         
      var leadId = $('#lead_id').val();
	  
	  if(leadStatus.length == 0 || leadSubStatus.length == 0){
		alert("Please Select Status And Sub Status");
			return false;	
	  }	
	  
      $.ajax({
          url : webUrl+'LmsCar/updateLeadStausByLeadIdJson',
          type : 'POST',
          data : {'leadId' : leadId,
                  'leadStatus' : leadStatus,
                  'leadSubStatus':leadSubStatus,
                },
              dataType:'json',
            
              success: function( data){
                alert('Lead Updated Successfully');
                var redirectUrl = webUrl+'lms-lead-list'
                window.location.href = redirectUrl;

              },
      });

  });

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
                    'leadComment' : leadComment,
					"comment_Date":functionGetDate()
					},
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


