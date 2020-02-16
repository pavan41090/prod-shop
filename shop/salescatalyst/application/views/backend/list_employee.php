<script src="<?php echo base_url(); ?>assets/backend-js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/backend-js/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/backend-js/dataTables.bootstrap.min.js"></script>    
<script src="<?php echo base_url(); ?>assets/backend-js/backend_common.js"></script>
<div class="container-fluid">
   <!-- BEGIN PAGE HEADER-->
   <!-- BEGIN THEME PANEL -->
   <!-- END THEME PANEL -->
   <!-- END PAGE HEADER-->
   <div class="row">
      <div class="col-md-12">
         <div class="portlet box gray-gray">
            <div class="portlet-body planbox backend-mainbg">
               <div style="color:#000;">
                  <div ng-app="plunker" ng-controller="MainCtrl">
                     <div class="portlet-title tabbable-line" >
                        <div class="caption leadtit">
                           <div class="alert bold uppercase" id="alert-response" > List Employee</div>
                           <!--                                   <div class="alert alert-danger bold uppercase">Success msg</div>
                              -->                              
                        </div>
                     </div>
                     <div>
                        <br />  
                        <table id="user_data" class="table table-bordered table-striped">
                           <thead class="tablhead">
                              <tr>
                                 <th>S No.</th>
                                 <th>Code</th>
                                 <th>User Name</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Status</th>
                                 <th width="15%">Action</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
                  <!-- controller ends here -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<script type="text/javascript" language="javascript" >  
   $(document).ready(function(){  
    // $('#user_data_processing').hide(); 
        var dataTable = $('#user_data').DataTable({  
             "processing":true,  
             "serverSide":true,  
             "order":[],  
             "ajax":{  
                  url:"<?php echo base_url() . 'Backend/listEmployeesByJson'; ?>",  
                  type:"POST"  
             },  
             "columnDefs":[  
                  {  
                       "targets":[0,6],  
                       "orderable":false,  
                  },  
             ],  
        });  
   });  
</script>