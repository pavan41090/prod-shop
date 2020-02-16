<!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend-css/bootstrap.min.css"/>  -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend-css/dataTables.bootstrap.min.css"/>
<script src="<?php echo base_url(); ?>assets/backend-js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/backend-js/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/backend-js/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/custom_lead.js"></script>
<style>  
  .body  
  {  
      margin:0;  
      padding:0;  
      background-color:#f1f1f1;  
  }  
   .box  
   {  
   width:auto;  
   background-color:#fff;  
   border:1px solid #ccc;  
   border-radius:5px;  
   margin-top:10px;  
   margin-bottom: 20px;
   } 
  .table td,
  .table th {
    font-size: 12px;
  } 
</style>
<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">


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
               <a href="">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href=""><?php echo $module; ?></a>
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
               <div class="portlet-title col-md-6">
                  <div class="caption"> <?php echo $title ?> </div>
               </div>
                <div class="portlet-title col-md-6">
                  <?php if($this->session->userdata('user_type_abbr') == 'hdfc_av') { ?> 
                    <div class="pull-right" style="margin-top: 10px;">
                        <a href="<?php echo base_url(); ?>lms-car">
                            <button type="button"  class="btn blue btn-default" > Create New Lead</button>
                        </a>
                      </div>
                    <?php } ?>                    
               </div>


               <div class="portlet-body planbox" style="color: #000;">
                  <div>

                     <div class="container box">
                        <div class="table-responsive">
                           <br />  

                            <table id="table" class="table table-bordered table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Application No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Product</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $i=($this->uri->segment(2) ? $this->uri->segment(2) : 0)+1; 
                                    if(count($leadData) > 0){
                                    foreach ($leadData as $key => $value):
                                    $detailLink = base_url().'view-lead-details/'.$value->lead_id;
                                    $editLink = base_url().'regenerate-lead/'.$value->lead_id;
                                     ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $value->lead_application_id; ?></td>
                                        <td><?php echo $value->first_name; ?></td>
                                        <td><?php echo $value->last_name; ?></td>
                                        <td><?php echo $value->product_type; ?></td>
                                        <td><?php echo $value->cust_phone; ?></td>
                                        <td><?php echo $value->cust_city; ?></td>
                                        <td><?php echo $value->lead_status; ?></td>
                                        <?php if($value->lead_status == 'Sales Open'){ ?>
                                        <th><a href="<?php echo $editLink; ?>"><button class="btn blue btn-default">View / Edit</button></a></th>
                                        <?php } else { ?>
                                          <th><a href="<?php echo $detailLink; ?>"><button class="btn blue btn-default">View</button></a></th>
                                        <?php } ?>
                                    </tr>
                                  <?php $i++; endforeach; } else { ?>
                                    <tr style="text-align: center;"><td colspan="9">No Records Found</td>
                                    </tr>
                                  <?php } ?>
                                  <tr><td colspan="2">Total Count:<?php echo $total_rows; ?></td><td colspan="7" style="text-align: right;"><?php echo $links; ?></td></tr>

                                </thead>
                                <tbody>
                                </tbody>
                            </table>                         
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
<?php /* if($this->session->userdata('usr_type_id') != 3){ ?>
<script type="text/javascript">
$(document).ready(function() {
      var web_url = $('#web_url').val();
      var table = $('#table').DataTable({ 
           "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source LmsCar leadListByJson
            "ajax": {
                "url": web_url+'lms-lead-list',
                 data : {'leadStatus' : 'open'},
                "type": "POST"
            },
          //Set column definition initialisation properties.
          "columnDefs": [{ 
              "targets": [ 0 ], //first column / numbering column
              "orderable": false, //set not orderable
          },],
     });  
 });
</script>
<?php  } */ ?>