<div class="row lmsresbor">
                              <div class="col-md-4">
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Card Holder Name </div>
                                      <div class="col-md-7">: <?php echo $lead_details[0]->cus_card_name; ?> </div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                <?php
                                $relationName = arealationshiofunction();
                                $relationDummdata = $relationName[$lead_details[0]->cus_relation_ishued];
                                ?>
                                  <div class="row">
                                      <div class="col-md-5 labeltxtleft"> Relationship with Insured  </div>
                                      <div class="col-md-7">: <?php echo $relationDummdata; ?> </div>
                                  </div>
                              </div>                           
                          </div>