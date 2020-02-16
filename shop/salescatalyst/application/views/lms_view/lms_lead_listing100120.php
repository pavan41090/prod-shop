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
<script type="text/javascript">
function callusers()
{
   $.ajax({
    type: "GET",
    url: 'User/getMyprofile/',  
    success: function(response){
      //  alert(response);
   
var a=JSON.parse(response);
if(a.usr_type_name=="HDFC AV")
{
   var ctrlName = 'myCtrl';
     var sel = 'div[ng-controller="' + ctrlName + '"]';
    //var scope = angular.element(sel).scope();
      //scope.channel=a.channel;
 
          $("#lms_car_category").prop("readonly", true);
//$("#lms_car_category").removeattr("required");

calldatatable(a.channel);
     $("#lms_car_category").val(a.channel);
     console.log(response);
  }
  else
  {
    calldatatable(a.channel);
  }
}
    
});
}
function calldatatable(value)
{
  debugger;
      var web_url = $('#web_url').val();

 var table = $('#table').DataTable({ 
           "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": web_url+'LmsCar/leadListByJson',
                 data : {'leadStatus' : 'open','category':value},
                "type": "POST"
            },
 
          //Set column definition initialisation properties.
          "columnDefs": [{ 
              "targets": [ 0 ], //first column / numbering column
              "orderable": false, //set not orderable
          },],
     });
  }
   
    $(document).ready(function() {

callusers();

      
 });

</script>