<link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend-css/dataTables.bootstrap.min.css"/>
<script src="<?php echo base_url(); ?>assets/backend-js/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/backend-js/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url(); ?>assets/backend-js/dataTables.bootstrap.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/custom_lead.js"></script>

<input type="hidden" id="excel_file_name" value="">
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
  .pupup-head{
    font-size: 12px;
    font-weight: bold;
  }
  .pupup-content{
    font-size: 12px;
  }
  .pupup-head-title{
      font-size: 15px;
      font-weight: bold;
  }
  .pupup-error{
    font-size: 12px;
    font-weight: bold;
    color: 'red';
  }
</style>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/lms_js/modernizr-1.7-development-only.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.core.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.datepicker.min.js"></script>
<script type="text/javascript">
    $(function(){
        if(!Modernizr.inputtypes.date) {
            $("#start_date").datepicker();
            $("#end_date").datepicker();
        }
    });
</script>
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
               <a href="#"><?php echo $module; ?></a>
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
                  <div class=" col-md-8 caption" > <?php echo $title ?> </div>
                  <div class="caption pull-right"> 
                      <?php if($this->session->userdata('user_type_abbr') == 'hdfc_ops' ) { ?>
                          <button type="button" class="btn blue btn-default downloadReport" id=""> Download Report </button> 
                          <button type="button" class="btn blue btn-default uploadFile" data-toggle="modal" data-target="#lead-status" id="upload_file_btn">Upload File</button> 
                      <?php } ?>
                      
                      <?php if($this->session->userdata('user_type_abbr') == 'bagi_ops') { ?>
                        <script src="<?php echo base_url(); ?>assets/js/lms_js/lms-app-policy-upload.js"></script>
                        <a href="#" data-toggle="modal" data-target="#uploadPolicy" data-backdrop="static" data-keyboard="false">
                          <button type="button" class="btn blue btn-default" id=""> Upload Booked Policy Details </button>
                        </a>

                         <a href="<?php echo base_url();?>dashboard-downloads">
                          <button type="button" class="btn blue btn-default" id=""> Download Reports </button>
                        </a> 

                      <?php } ?>  

                  </div>
                  
               </div>
            
            <?php if($this->session->userdata('user_type_abbr') == 'report' ) { 
              $inputGetreport = $this->input->get(); ?>
              <!-- id="leadreportsearch" name="leadreportsearch" -->
            <form action="<?php echo base_url('lms-lead-download'); ?>" method="get">
               <div class="row" style="padding-left: 10px;">
                <div class="col-md-4">
                  <div class="form-group">
                     <label style="color:black">Product <span style="color: red;"></span></label>  
                     <select class="form-control input-sm" name="user_product" id="user_product">
                        <option value="" selected> Select Product </option>
                        <?php foreach($catProducts as $capt){ ?>
                          <option value="<?php echo $capt['prdt_m_name'];?>" <?php if($inputGetreport['user_product'] == $capt['prdt_m_name']){ echo 'selected'; } ?>> <?php echo $capt['prdt_m_name'];?> </option>
                        <?php } ?>
                        </select>
                  </div>
               </div>

                 <div class="col-md-4" style="padding-right: 25px;">
                  <div class="form-group">
                     <label style="color:black">Location</label>
                     <select class="form-control input-sm" name="user_location" id="user_location">

                        <option value="" selected> Select location </option>
						<?php $arrayLocation = array('All','Ahmedabad','Bangalore','Chennai','Delhi','Hyderabad','Kolkata','Mumbai','Pune','Cochin','Lucknow','Mohali','Chandigarh','Indore','Coimbatore','Jaipur'); ?>
            <?php $shortunanan = $inputGetreport['user_location']; ?>
            <?php $shortstrmwer = strtolower($shortunanan); ?>
						<?php foreach($arrayLocation as $location): ?>
                        <option value="<?php echo $location; ?>" <?php echo ( ((empty($shortstrmwer) ? strtolower($loginCity) : $shortstrmwer) == strtolower($location)) ? 'selected' : '' )?>><?php echo $location; ?></option>
						<?php endforeach; ?>
                        </select>
                                     
                  </div>
               </div>

               <div class="col-md-4" style="padding-right: 25px;">
                  <div class="form-group">
                     <label style="color:black">Channel
                     </label>  
                     <?php $shortname = $inputGetreport['user_channel']; ?>
                     <select class="form-control input-sm" name="user_channel" id="user_channel" onChange="channelChangeFunction(this)">
                        <option value="" selected> Select Channel </option>
                        <option value="All" <?php if(strtolower($shortname) == 'all'){ echo 'selected'; } ?>>All</option>
                        <option value="Phone Banking" <?php if(strtolower($shortname) == 'phone banking'){ echo 'selected'; } ?>>Phone Banking</option>
                        <option value="DT" <?php if(strtolower($shortname) == 'dt'){ echo 'selected'; } ?>>DT</option>
                        <option value="VRM" <?php if(strtolower($shortname) == 'vrm'){ echo 'selected'; } ?>>VRM</option>
                        <option value="COP" <?php if(strtolower($shortname) == 'cop'){ echo 'selected'; } ?>>COP</option>
                        <option value="Prime" <?php if(strtolower($shortname) == 'prime'){ echo 'selected'; } ?>>Prime</option>
                        <option value="Unified Outbound" <?php if(strtolower($shortname) == 'unified outbound'){ echo 'selected'; } ?>>Unified Outbound</option>
                        <option value="Others" <?php if(strtolower($shortname) == 'others'){ echo 'selected'; } ?>>Others </option>
                      </select>
                                     
                  </div>
               </div>
              
               </div>

              <div class="row" style="padding-left: 10px;">
                

                <div class="col-md-4">
                  <div class="form-group">
                     <label style="color:black">Start Date
                     </label>  
                     <input type="date" class="form-control input-sm custom-date-after" value="<?php echo $inputGetreport['start_date']; ?>" placeholder="DD-MM-YYYY" name="start_date" id="start_date" >
                                     
                  </div>
               </div>

                 <div class="col-md-4" style="padding-right:25px;">
                  <div class="form-group">
                     <label style="color:black">End Date </label>  
                     <input type="date" class="form-control input-sm custom-date-after" value="<?php echo $inputGetreport['end_date']; ?>" placeholder="DD-MM-YYYY" name="end_date" id="end_date"  >
                                     
                  </div>
               </div>


               <div class="col-md-4" style="padding-right:25px;">
                  <div class="form-group" >
                      <label style="color:black"> Supervisor </label>
                        <select class="form-control input-sm" name="user_supervisor" id="user_supervisor">
                        <option value="" selected> Select Supervisor </option>
                        </select>
                  </div>
               </div>

               <div class="col-md-4" style="padding-right:25px;">
                  <div class="form-group" >
                      <label style="color:black"> Supervisor 2</label>
                        <select class="form-control input-sm" name="user_supervisor1" id="user_supervisor1">
                        <option value="" selected> Select Supervisor </option>
                        </select>
                  </div>
               </div>

               <div class="col-md-4" style="padding-right:25px;">
                  <div class="form-group" >
                      <label style="color:black"> Supervisor 3</label>
                        <select class="form-control input-sm" name="user_supervisor2" id="user_supervisor2">
                        <option value="" selected> Select Supervisor </option>
                        </select>
                  </div>
               </div>
              
               </div>
               <div class="row">
                 <div class="col-md-4" style="padding-left: 25px;">
                 <?php if($this->session->userdata('user_type_abbr') == 'report' ) { ?>
                  <!--  id="searchButton" -->
                          <button type="submit" class="btn blue btn-default">Search </button> 
                          <input type="button" style="margin-left:10px" class="btn blue btn-default downloadReport" id="download_reports" value="Download Reports">
                      <?php } ?>
               </div>
               </div>
             </form>
<?php } ?>


    <?php if($this->session->userdata('user_type_abbr') == 'lead data' ) { ?>
      <?php $leadrewer = $this->input->get(); ?>
      <form action="<?php echo base_url('lms-lead-download'); ?>" method="get">
        <div class="row" style="padding-left: 10px;">
                <div class="col-md-4">
                  <div class="form-group">
                     <label style="color:black">Product </label>  
                     <select class="form-control input-sm" name="user_product" id="user_product">
                        <option value="" selected> Select Product </option>
                        <?php foreach($catProducts as $capt){ ?>
                          <option value="<?php echo $capt['prdt_m_name'];?>" <?php if($leadrewer['user_product'] == $capt['prdt_m_name']){ echo 'selected'; } ?>> <?php echo $capt['prdt_m_name'];?> </option>
                        <?php } ?>
                        </select>
                  </div>
               </div>

                <div class="col-md-4">
                  <div class="form-group">
                     <label style="color:black">Start Date </label>  
                     <input type="date" class="form-control input-sm custom-date-after" value="<?php echo $leadrewer['start_date']; ?>" placeholder="DD-MM-YYYY" name="start_date" id="start_date">
                                     
                  </div>
               </div>

                <div class="col-md-4" style="padding-right: 25px;">
                  <div class="form-group">
                     <label style="color:black">End Date </label>  
                     <input type="date" class="form-control input-sm custom-date-after" value="<?php echo $leadrewer['end_date']; ?>" placeholder="DD-MM-YYYY" name="end_date" id="end_date" >
                                     
                  </div>
          
               </div>

               </div>
              
               <div class="row">
                 <div class="col-md-4" style="padding-left: 25px; margin-top: 20px;">
                 <?php if($this->session->userdata('user_type_abbr') == 'lead data' ) { ?>
                          <button type="submit" class="btn blue btn-default">Search </button> <!-- id="searchButton" -->
                          <input style="margin-left:10px" type="button" class="btn blue btn-default downloadReport" id="download_reports" value="Download Reports"> 
                      <?php } ?>
               </div>
               </div>
      </form>
    <?php } ?>

               <div class="portlet-body planbox" style="color: #000;">
                  <div>
                    <div style="text-align: right;"><input type="text" name="searhleaddata" id="searhleaddata" placeholder="Search Lead Data" style="width: 20% !important;" class="input-sm ng-pristine ng-invalid ng-invalid-required ng-touched"></div>
                     <div class="container box">
                        <div class="table-responsive">
                           <br />  

                            <table id="table" class="table leadlist table-bordered table-striped" cellspacing="0" width="100%">
                               <!--  <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Application No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Product</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Payment Mode</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $i=($this->uri->segment(2) ? $this->uri->segment(2) : 0)+1;
                                     if(count($leadData) > 0){
                                      foreach ($leadData as $key => $value) {
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
                                        <td><?php echo (!empty($value->approve_status) ? $value->lead_status.'-'.$value->approve_status : $value->lead_status );$value->payment_status; ?></td>
                                        <td><?php echo $value->payment_type; ?></td>
                                        <td><?php echo $value->payment_status; ?></td>
                                        <?php if($value->lead_status == 'Sales Open'){ ?>
                                        <th><a href="<?php echo $editLink; ?>"><button class="btn blue btn-default">View / Edit</button></a></th>
                                        <?php } else { ?>
                                          <th><a href="<?php echo $detailLink; ?>"><button class="btn blue btn-default">View</button></a></th>
                                        <?php } ?>
                                    </tr>
                                    <?php $i++; } ?>
                                     <tr><td colspan="2">Total Count:<?php echo $total_rows; ?></td><td colspan="8" style="text-align: right;"><?php echo $links; ?></td></tr>
                                     <?php } else { ?>
                                      <tr><td colspan="2">Total Count:0</td><td colspan="8" style="text-align: center;">No Records Found</td></tr>
                                     <?php } ?>
                                </thead>
                                -->
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

<?php if($this->session->userdata('user_type_abbr') == 'hdfc_ops'){ ?>
<div id="lead-status" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 55%;">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Report</h4>
      </div>
      <div class="modal-body">
          <form id="uploadForm" action="" method="post">
              <div class="row">&nbsp;</div> 
              <div class="row">
                <div class="col-md-8">
                      <input name="userImage" type="file" class="inputFile" /><br/>
                </div>
                <div class="col-md-2 pull-right">
                  <button type="submit" class="btn blue btn-default btnSubmit" id="update_lead">Submit</button>
                </div>
              </div>  
                  <div class="row">&nbsp;</div> 
                  <div id="targetLayer" class="row"></div>
          </form>

      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php if($this->session->userdata('user_type_abbr') == 'bagi_ops') { ?>
<div class="modal fade" id="uploadPolicy" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #103083 !important;">
          <button type="button" class="close" data-dismiss="modal" style="text-align: right;">&times;</button>
          <h4 class="modal-title" style="color: white;">Upload</h4>
        </div>
        <div class="modal-body modelbody">
          <form policy:Upload:Doc>
          <table class="table text-center">
            <tr><td>Uplaod Doc</td><td><input type="file" class="form-control" name="uploadPolicyDoc" id="uploadPolicyDoc"></td></tr>
            <tr><td colspan="2" class="text-right"><input type="submit" id="formPolicyUpload" class="btn btn-success" value="Uplaod" name="formPolicyUpload" ng-model="formPolicyUpload"></td></tr>

            <tr><td colspan="2"><span id="processing-bar-limit"></span></td></tr>
          </table>
        </form>
        </div>
       
      </div>
    </div>
  </div>
</div>
<?php } ?>
<script>
$(document).ready(function(){
$(document).on('submit','#leadreportsearch',function(){
var user_product = $('#user_product').val();
if(user_product.length == 0){
  alert("Please Select Product");
  return false;
}
});
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
 searchOject.user_channel = '<?php echo $this->input->get('user_channel'); ?>';
 searchOject.user_location = '<?php echo $this->input->get('user_location'); ?>';
 searchOject.user_product = '<?php echo $this->input->get('user_product'); ?>';
 searchOject.start_date = '<?php echo $this->input->get('start_date'); ?>';
 searchOject.end_date = '<?php echo $this->input->get('end_date'); ?>';

 $.ajax({
   url: web_url+'lms-lead-download/'+pagno,
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
<script type="text/javascript">
    var table;
    var web_url = $('#web_url').val();
    var user_type="<?php echo $this->session->userdata('user_type_abbr');?>";
	   function channelChangeFunction(thisData){
		loadSupervisors(thisData.value);
		}
	 function loadSupervisors(channel){
      var webUbrl = $('#web_url').val();
		  var userchannel = channel;
			var channelObj = new Object();
			channelObj.channelname = userchannel;
			$.ajax({
              url : webUbrl+'User/getAllSupervisor',
               type : 'POST',
               cache:false,
               data : $.param(channelObj),
               dataType:'json',
               success: function( data){
                  var jsonD=Object(data);
                  var firstsuper = jsonD.one;
                  var secondsuper = jsonD.two;
                  var threeuper = jsonD.three;
			            $('#user_supervisor').html('');
                  $('#user_supervisor').append('<option value="-1">All</option>');
                  for (var i=0;i<firstsuper.length;i++){
                    $('#user_supervisor').append('<option value="'+firstsuper[i].emp_id+'">'+firstsuper[i].user_name+'</option>');
                  }

                  $('#user_supervisor1').html('');
                  $('#user_supervisor1').append('<option value="-1">All</option>');
                  if(secondsuper){
                    for (var i=0;i<secondsuper.length;i++){
                    $('#user_supervisor1').append('<option value="'+secondsuper[i].emp_id+'">'+secondsuper[i].user_name+'</option>');
                  }
                  }
                  $('#user_supervisor2').html('');
                  $('#user_supervisor2').append('<option value="-1">All</option>');
                  if(threeuper){
                    for (var i=0;i<threeuper.length;i++){
                      $('#user_supervisor2').append('<option value="'+threeuper[i].emp_id+'">'+threeuper[i].user_name+'</option>');
                    }
                  }
                  
               }
             });
        }
		function getUserDetails(){
        var webUbrl = $('#web_url').val();
           $.ajax({
                    url : webUbrl+'User/getMyprofile',
                     type : 'POST',
                     data : {},
                     dataType:'json',
                     success: function( data ){
                      if(data){
                        if(data.user_location!="All"){
                          jQuery("#user_location option").filter(function(){
                              return $.trim($(this).text()) !=  data.user_location
                          }).remove();
                        }
                        if(data.channel!="All"){
                          jQuery("#user_channel option").filter(function(){
                              return $.trim($(this).text()) !=  data.channel
                          }).remove();
                        }
                        if(data.supervisor_id!="-1"){
                          jQuery("#user_supervisor option").filter(function(){
                              return $.trim($(this).attr("value")) !=  data.supervisor_id
                          }).remove();
                        }
                        loadSupervisors(data.channel);
                      }
                     }
            });
      }
    $(document).ready(function() {     

    /* if(user_type !="report" && user_type !="lead data"){
            table = $('#table').DataTable({ 
               "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": web_url+'lms-lead-download',
                     data : function (d){
                      d['leadStatus']= "open";
                      return d;
                    },
                    "type": "POST"
                },
              "columnDefs": [{ 
                  "targets": [ 0 ],
                  "orderable": false,
              },],
         });
      }*/

function validateFields(){
  var flag=true;
  if($('#end_date').val()!="" && $('#start_date').val()==""){
    flag=false;
    alert("Please enter start date");
  }
  if($('#start_date').val()!="" && $('#end_date').val()==""){
    flag=false;
    alert("Please enter end date");
  }

  if($('#start_date').val()=="" && $('#end_date').val()=="" && $('#user_product').val()=="" && $('#user_location').val()=="" && $('#user_channel').val()==""){
    flag=false;
    alert("Please fill atleast one field to search");
  }

  return flag;
}

$('#searchButton').click(function(){

if(!validateFields()){
  return;
}
if(!table){/*
  table = $('#table').DataTable({ 
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      // Load data for the table's content from an Ajax source LmsCar/leadListByJson
      "ajax": {
          "url": web_url+'lms-lead-download',
            data : function (d){
            if(user_type=="report"){
              d['startDate']= $('#start_date').val();
              d['endDate']= $('#end_date').val();
              d['product']= $('#user_product').val();
              d['location']= $('#user_location').val();
              d['channel']= $('#user_channel').val();
              d['supervisor']= $('#user_supervisor').val();
            } else{
              d['startDate']= $('#start_date').val();
              d['endDate']= $('#end_date').val();
              d['product']= $('#user_product').val();
            }
            return d;
          },
          "type": "POST"
      },

    //Set column definition initialisation properties.
    "columnDefs": [{ 
        "targets": [ 0 ], //first column / numbering column
        "orderable": false, //set not orderable
    },],
});
*/}
table.ajax.reload();;
});

$(document.body).on('click','.leaddownloadReport',function(){
var webUrl = $('#web_url').val();
var user_product = $('#user_product').val();
if(user_product.length == 0){
  alert("Please Select Product");
  return false;
}
$.ajax({
    url: webUrl+'lsm-create-xls',
    dataType: 'json',
    cache: false,
    type: 'post',       
    data: {
      'dataArray' : '',
      'startDate' : $("#start_date").val(),
      'endDate' : $("#end_date").val(),
      'product' : $('#user_product').val(),
      'location' : $('#user_location').val(),
      'channel' : $('#user_channel').val(),
      'supervisor' : $('#user_supervisor').val(),
      'supervisor1' : $('#user_supervisor1').val(),
      'supervisor2' : $('#user_supervisor2').val()
    },
    beforeSend : function(){
      $('#download_reports').attr('class','btn blue btn-default xdownloadReport');
      $('#download_reports').attr('value','Please wait..');
    },
    success: function(data){
        $('#excel_file_name').val(data);
        var download = webUrl+'assets/temp-excel/'+data;
        window.location.href = download;
        $('#download_reports').attr('class','btn blue btn-default downloadReport');
        $('#download_reports').attr('value','Download Reports');
    }
});
});
$(document.body).on('click', '.downloadReport' ,function(){
  var webUrl = $('#web_url').val();
  $.ajax({
      url: webUrl+'lsm-create-xls',
      dataType: 'json',
      cache: false,
      type: 'post',       
      data: {
        'dataArray' : '',
        'startDate' : $("#start_date").val(),
        'endDate' : $("#end_date").val(),
        'product' : $('#user_product').val(),
        'location' : $('#user_location').val(),
        'channel' : $('#user_channel').val(),
        'supervisor' : $('#user_supervisor').val(),
        'supervisor1' : $('#user_supervisor1').val(),
        'supervisor2' : $('#user_supervisor2').val()
      },
      beforeSend : function(){
        $('#download_reports').attr('class','btn blue btn-default xdownloadReport');
        $('#download_reports').attr('value','Please wait..');
      },
      success: function(data){
          $('#excel_file_name').val(data);
          var download = webUrl+'assets/temp-excel/'+data;
          window.location.href = download;
          $('#download_reports').attr('class','btn blue btn-default downloadReport');
          $('#download_reports').attr('value','Download Reports');
      }
});
}); 

});
</script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $("#uploadForm").on('submit',(function(e) {
          $('#targetLayer').html('');
            e.preventDefault();
            $.ajax({
                url: web_url+'Commoncontrol/uploadExcelByJson',
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data)
                {
                    if(data !== false) { 
                      var json_obj = JSON.parse(data);
                     
                      if(json_obj.length !== 0){

                        $('#targetLayer').html('<div class="col-md-12"><span class="pupup-head-title col-md-4"> Updated Lead Details </span> </div>');
                        $('#targetLayer').append('<div class="col-md-12"><span class="pupup-head col-md-3 ">Application Id </span><span class="pupup-head col-md-4">Updated Status</span> </div>');
                         $.each(json_obj, function(key, value) {
                           var responseRow = '<div class="col-md-12"><span class="pupup-content col-md-3" >'+value['application_id']+'</span><span class="pupup-content col-md-4" >'+value['status']+'</span></div>'
                           $('#targetLayer').append(responseRow);
                        }); 
                          
                      } else {

                        $('#targetLayer').html('<div class="col-md-12"><span class="pupup-head col-md-6"> Some thing went wrong, Please try again </span> </div>');
                      }

                   } else {

                       $('#targetLayer').html('<div class="col-md-12"><span class="pupup-error col-md-6"> Some thing went wrong, Please try again </span> </div>');
                   }        

                },
                error: function() 
                {

                }           
            });
        }));
    });
</script>