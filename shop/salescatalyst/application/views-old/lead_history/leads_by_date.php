<script src="<?php echo base_url(); ?>assets/js/custom_lead.js"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend-css/dataTables.bootstrap.min.css"/>
<script src="<?php echo base_url(); ?>assets/backend-js/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/backend-js/dataTables.bootstrap.min.js"></script>   


<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">

<div class="page-content-wrapper">
   <div class="page-content">
      <h3 class="page-title">Leads - <?php echo $title ?>
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html ">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Leads</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span> Lead History </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->
      <div class="row">
         <div class="col-md-12">
            <div class="portlet box gray-gray">
                <div class="portlet-title">
                  <div class="caption"> Lead Details </div>
                </div>
                <div class="portlet-body planbox" style="color: #000;">
             
                  Start Date : <input type="text" id="start_date" name="">
                  End Date : <input type="text" id="end_date" name="">
                  <input type="button" id="get_leads_date" name="get_leads_date" value="Get Leads">

<div> &nbsp; </div>
<table id="example" class="display" width="100%"></table>

                </div>
            </div>
         </div>
      </div>
   </div>
</div>
