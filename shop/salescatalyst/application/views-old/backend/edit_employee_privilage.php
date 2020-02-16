 <script src="<?php echo base_url(); ?>assets/backend-js/add_employee.js"></script> 
<input type="hidden" id="employeeId" name="employeeId" value="<?php echo $employeeId; ?>"> 

<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
         <div class="portlet box gray-gray">
            <div class="portlet-body planbox backend-mainbg">
               <div style="color:#000;">
                  <div ng-app="plunker" ng-controller="MainCtrl">
                      <form name="userPrivilage" action="<?php echo base_url();?>set-user-privilage/<?php echo $employeeId; ?>" method="POST">

                          <div class="portlet-title tabbable-line" >
                             <div class="caption leadtit">
                                <div class="alert bold uppercase" style="display: none;" id="alert-response"> </div>
                                  <?php if($this->session->flashdata('successMessage') != '') {  ?>
                                      <div class="alert alert-success bold uppercase">
                                        <?php echo $this->session->flashdata('successMessage');  ?>
                                      </div>
                                  <?php } ?>

                                <div class="alert bold uppercase"> Edit Privilege</div>
                                   <div class="caption pull-right"> 
                                    <!--  <button type="button" class="btn blue btn-default" data-toggle="modal" data-target="#update-password"> Reset Password</button>  -->
                                   </div> 

                             </div>
                          </div>
                          

         <div class="row maincontf planClass">
           <div class="col-md-1">&nbsp;</div>
           <div class="col-md-2 colorHeader">
            Product
           </div>
           <div class="col-md-1 text-center colorHeader">
            Enable
           </div>
           <div class="col-md-6 colorHeader">
              Select Plan
            </div>
         </div>
                      <?php foreach($productsArray as $prdt) { ?>
               
                          <div class="row maincontf planClass">
                             <div class="col-md-1">&nbsp;</div>
                             <div class="col-md-2">
                                <div class="form-group"><label><?php echo $prdt['prdt_m_name']; ?> </label></div>
                             </div>
                             <div class="col-md-1 text-center">
                                <?php $checked = ''; if($prdt['privilage'] == '1') { $checked  = 'checked'; } ?>
                                <div class="form-group"><input type="checkbox" <?php echo $checked; ?> name="prdt_per[]" value="<?php echo $prdt['prdt_m_id']; ?>"></div>
                             </div>

                            

                             <?php if($prdt['prdt_m_name'] == 'Combo' || $prdt['prdt_m_name'] == 'Office' || $prdt['prdt_m_name'] == 'Shop' || $prdt['prdt_m_name'] == 'Personal Accident' || $prdt['prdt_m_name'] == 'Home') { ?>
                              
                             
                               
                               
                            
                             <div class="col-md-6">
                              <div class="form-group">
                              <?php $checkedArr=explode(",",$prdt['plan']); ?>

                              <?php if($prdt['prdt_m_name'] == 'Home' || $prdt['prdt_m_name'] == 'Shop'){?>
                              <label><input type="checkbox" <?php if(in_array("500000", $checkedArr)){echo "checked";} ?> name="<?php echo $prdt['prdt_m_id']; ?>500000" value="500000"> 5,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Home' || $prdt['prdt_m_name'] == 'Combo'  || $prdt['prdt_m_name'] == 'Office' || $prdt['prdt_m_name'] == 'Shop'){?>
                              <label><input type="checkbox" <?php if(in_array("1000000", $checkedArr)){echo "checked";} ?> name="<?php echo $prdt['prdt_m_id']; ?>1000000"   value="1000000"> 10,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Shop'){?>
                              <label><input type="checkbox" <?php if(in_array("1500000", $checkedArr)){echo "checked";} ?> name="<?php echo $prdt['prdt_m_id']; ?>1500000"   value="1500000"> 15,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Combo' || $prdt['prdt_m_name'] == 'Office' || $prdt['prdt_m_name'] == 'Shop' || $prdt['prdt_m_name'] == 'Home'){?>
                              <label><input type="checkbox" <?php if(in_array("2000000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>2000000"  value="2000000"> 20,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Personal Accident'){?>
                              <label><input type="checkbox" <?php if(in_array("2500000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>2500000"  value="2500000"> 25,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Combo' || $prdt['prdt_m_name'] == 'Office' || $prdt['prdt_m_name'] == 'Home'){?>
                              <label><input type="checkbox" <?php if(in_array("3000000", $checkedArr)){echo "checked";} ?> name="<?php echo $prdt['prdt_m_id']; ?>3000000"   value="3000000"> 30,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Combo' || $prdt['prdt_m_name'] == 'Office' || $prdt['prdt_m_name'] == 'Home'){?>
                              <label><input type="checkbox" <?php if(in_array("4000000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>4000000"  value="4000000"> 40,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Personal Accident' || $prdt['prdt_m_name'] == 'Home'){?>
                              <label><input type="checkbox" <?php if(in_array("5000000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>5000000"  value="5000000"> 50,00,000</label>
                              <?php } ?>



                              <?php if($prdt['prdt_m_name'] == 'Personal Accident' || $prdt['prdt_m_name'] == 'Home'){?>
                              <label><input type="checkbox" <?php if(in_array("7500000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>7500000"  value="7500000"> 75,00,000</label>
                              <?php } ?>

                              <?php if($prdt['prdt_m_name'] == 'Personal Accident'){?>
                              <label><input type="checkbox" <?php if(in_array("10000000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>10000000"  value="10000000"> 1,00,00,000</label>
                              <?php } ?>

                               <?php if($prdt['prdt_m_name'] == 'Personal Accident'){?>
                              <label><input type="checkbox" <?php if(in_array("15000000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>15000000"  value="15000000"> 1,50,00,000</label>
                              <?php } ?>

                               <?php if($prdt['prdt_m_name'] == 'Personal Accident'){?>
                              <label><input type="checkbox" <?php if(in_array("25000000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>25000000"  value="25000000"> 2,50,00,000</label>
                              <?php } ?>

                               <?php if($prdt['prdt_m_name'] == 'Personal Accident'){?>
                              <label><input type="checkbox" <?php if(in_array("30000000", $checkedArr)){echo "checked";} ?>  name="<?php echo $prdt['prdt_m_id']; ?>30000000"  value="30000000"> 3,00,00,000</label>
                              <?php } ?>

                             </div>
                             </div>
                             <?php } ?>
                 

                          </div>   
                      <?php }?>



                          <div class="row">&nbsp;</div>

                          <div class="row maincontf">
                             <div class="col-md-1">&nbsp;</div>
                             <div class="col-md-3">
                                 <div class="col-md-6"> <button type="submit" name="submit" class="btn blue btn-default">Update Privilage</button></div>
                             </div>
                             <div class="col-md-4">
                             </div>
                          </div>
                        
                        </form>


 <input type="hidden" id="load-modal" class="btn blue btn-default" data-toggle="modal" data-target="#update-password">


              <div class="modal fade" id="update-password" role="dialog" style="position: fixed; left: 50%; top: 50%; display: none;">
                        <div class="modal-dialog">
                            <img src="<?php echo base_url(); ?>assets/images/ajax-loader.gif"></img>
                                <button type="button" class="btn btn-default" id="closeModel" data-dismiss="modal">Close</button>
                               </div>
                            </div>



                     </div> <!-- controller ends here -->
                       <div class="row"> &nbsp; </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript" language="javascript" >  
   $(document).ready(function(){  
      $('#load-modal').click();
      setTimeout(function(){ $('#closeModel').click(); }, 1000);

   });   
</script>   

<style>
.colorHeader{
  font-weight: bold;
  color:#5f85ce;
}
.tableHeader{
      padding: 10px 0px;
    border-bottom: 1px dashed #b5b3b3;
}
</style>