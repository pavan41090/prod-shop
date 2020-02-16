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
<input type="hidden" id="excel_file_name" value="">


<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL -->
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
                  <div class="caption"> Lead History </div>
               </div>
               <div class="portlet-body planbox" style="color: #000;">
                <a href ='<?php echo base_url(); ?>lead-by-dates' >Date wise </a>
                  <div>

                    <a href ='#' id="downloadExcel" >Download Excel </a>
                     <div class="container box">
                        <div class="table-responsive">
                           <br />  
                           <table id="lead_data" class="table table-bordered table-striped">
<!--                               <thead>
                                 <tr>
                                    <th>S No.</th>
                                    <th>Product</th>
                                    <th>ProspectId</th>
                                    <th>Action</th>
                                 </tr>
                              </thead> -->
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
<script type="text/javascript" language="javascript" >  



 
        var accessKey = 'u$r3c4de58f6a402ca29db52c2428a78049';
        var secretKey = '56c63ad69633990d029bdfe874bba1d9809b2d87'; 
        var prospect_id = '238b9d35-478a-4a2b-820f-e8650677a19a'; 
        var lookupValue = '1';
        var leadString = '{"Parameter":{"LookupName":"mx_created_user_id","LookupValue":"'+lookupValue+'", "SqlOperator": "="},"Columns":{"Include_CSV":"ProspectID,FirstName,LastName,EmailAddress,ProspectStage,CreatedOn"},"Paging":{"PageIndex":1,"PageSize":100}}';
              
            $.ajax({

              
              url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Leads.Get?accessKey='+accessKey+'&secretKey='+secretKey,
              //url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Leads.RecentlyModified?accessKey='+accessKey+'&secretKey='+secretKey,
                dataType: 'json',
                type: 'post',       
                contentType: 'application/json',
                data: leadString,
                processData: false,
                success: function( data){

                  var dataArray =  JSON.stringify(data);
                  var parsedArray = JSON.parse(dataArray);
                  var leadsCount = parsedArray.length;
                  var leadData = [];
                  var obj=parsedArray;
                  for(i in obj){
                      var temp=[];
                      temp.push(obj[i].ProspectID);
                      temp.push(obj[i].FirstName);
                      temp.push(obj[i].LastName);
                      temp.push(obj[i].EmailAddress);
                      temp.push(obj[i].ProspectStage);
                      var createOn = formatDate(obj[i].CreatedOn);

                      temp.push(createOn);

                      leadData.push(temp);
                  }

                  createExcel(dataArray);

          $('#lead_data').DataTable( {
                data: leadData,
                columns: [
                    { title: "Prospect ID" },
                    { title: "First Name" },
                    { title: "Last Name" },
                    { title: "Email Address" },
                    { title: "Prospect Stage" },
                    { title: "Created Date" },
                    
                ]
          });
                },
                error: function( jqXhr, textStatus, errorThrown ){
                  
                }
            });
               

    function createExcel(dataArray){
      var webUrl = $('#web_url').val();
      alert(webUrl);
          $.ajax({
          url: webUrl+'Lead_history/createXLS',
            dataType: 'json',
            type: 'post',       
            
            data: {'dataArray' : dataArray},
            success: function(data){

              $('#excel_file_name').val(data);
            },
               
      });


    }         


function formatDate (input) {
  var datePart = input.match(/\d+/g),
  year = datePart[0].substring(2), // get only two digits
  month = datePart[1], day = datePart[2];

  return day+'-'+month+'-'+year;
}


  $("#downloadExcel").on('click', function() {
    
    alert('download');
      var webUrl = $('#web_url').val();
      var fileName = $('#excel_file_name').val();
      //  preventDefault();  //stop the browser from following
      window.location.href = webUrl+'/assets/temp-excel/'+fileName;
  });


</script>