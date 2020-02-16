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
                    <div style="text-align: right;"><input type="text" name="searhleaddata" id="searhleaddata" placeholder="Search Lead Data" style="width: 20% !important;" class="input-sm ng-pristine ng-invalid ng-invalid-required ng-touched"></div>
                     <div class="container box">
                        <div class="table-responsive">
                            <table id="table" class="table leadlist table-bordered table-striped" cellspacing="0" width="100%">
                            </table>
                            <div style="text-align: right;"><span id="pagination"></span></div>                         
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
</div>
<script>
$(document).ready(function(){
$('#pagination').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('href').split('/');
       var selectpagenum = pageno[pageno.length - 1];
       console.log(selectpagenum);
       loadPagination(selectpagenum);
});
loadPagination(0);
function loadPagination(pagno){
 var web_url = $('#web_url').val();
 var searhleaddata = $('#searhleaddata').val();
 var searchOject = new Object();
 searchOject.searhleaddata = searhleaddata;

 $.ajax({
   url: web_url+'lms-lead-list/'+pagno,
   type: 'POST',
   dataType: 'json',
   data : searchOject,
   success: function(response){
      $('.leadlist').html('').append(response.leadData);
      $('#pagination').html(response.links);
   }
 });
}
function searchingleadData(){
  loadPagination(0);
}
$(document).on('keyup','#searhleaddata',function(){
searchingleadData();
});
});
</script>