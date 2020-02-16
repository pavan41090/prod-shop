<!DOCTYPE html>
<html lang="en">
<head>
<title>Bharti AXA General Insurance</title>
  <link rel="shortcut icon" href="https://buyuat.bharti-axagi.co.in/hdfc-crm/assets/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/file_upload.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <style type="text/css">
    label{margin-left: 20px;}
   #datepicker > span:hover{cursor: pointer;}
  </style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <a class="navbar-brand" style="color: white" href="<?php echo base_url(); ?>">SHOP-Office &nbsp; (<em>Dukandar suraksha Plan</em>)</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url('logout'); ?>" style="color: white">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="javascript:;"><img src="https://buyuat.bharti-axagi.co.in:8443/microsite/images/commonb2c/headerFooter/logo.png" class="img-responsive imgres" style="width: 75%;"></a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header text-left">SHOP Lead Report Download.</h3>
          <form action="<?php echo base_url().'lead-download'; ?>" target="_blank" method="POST">
          <div class="row">
            
            <div class="col-md-12">
            <div class="col-md-6" ><p><span> Start Date </span></p>
      <p>
        <div id="startdatepicker" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" name="startdate" id="startdate" ng-model="startdate" placeholder="Start Date" class="form-control" />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
</p>
  </div>
  <div class="col-md-6" ><p><span> End Date </span></p>
      <p>
        <div id="enddatepicker" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" name="enddate" id="enddate" ng-model="enddate" placeholder="End Date" class="form-control" />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
</p>
  </div>
          </div>

          </div>
          
          <div class="row">
            <div class="form-group text-right">
            <input type="submit" class="btn btn-success" name="Download" value="Download"> 
          </div>
          </div>
        </form>
          </div>
          
        </div>
    </div>
<script>
$(function () {
  $("#startdatepicker").datepicker({ 
        autoclose: false, 
        todayHighlight: false
  }).datepicker('update', new Date());
  $("#enddatepicker").datepicker({ 
        autoclose: false, 
        todayHighlight: false
  }).datepicker('update', new Date());
});
</script>
</body>

</html>
