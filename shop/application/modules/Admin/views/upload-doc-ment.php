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
            <li>
                <a href="javascript:;">
                    <img src="https://buyuat.bharti-axagi.co.in:8443/microsite/images/commonb2c/headerFooter/logo.png" class="img-responsive imgres" style="width: 75%;"></a>
            </li>

              <li> &nbsp; </li>
              <li> &nbsp; </li>
              <li class="list-group-item <?php if($this->uri->segment(1) == 'Admin') { echo 'active'; } ?> "> <a href="<?php echo base_url('Admin'); ?>" > Download Lead </a> </li>
              <li class="list-group-item <?php if($this->uri->segment(1) == 'admin-upload-status') { echo 'active'; } ?> "> <a href="<?php echo base_url('admin-upload-status'); ?>" > Upload Doc </a> </li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header text-left">Upload Excel Sheet (xlxs)</h3>
          <form name="uploadDoc" id="uploadDoc">
          <div class="row">
                <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                      <div class="input-group">
                          <input class="form-control" type="file" name="uploadExcel" id="uploadExcel" ng-model="uploadExcel" class="form-control" />
                      </div>
                  </div>
              <div class="col-sm-4"></div>
          </div>
          <div class="row">
            <div class="form-group text-right">
                <?php echo STRINGRAND; ?>
            <input type="submit" class="btn btn-success" name="Download" value=" &nbsp; Upload  &nbsp; ">
          </div>
          </div>
        </form>
          </div>
          
        </div>
    </div>
<script>
    $(function () {
        $('#uploadDoc').submit(function () {
            var _thisparam = $(this);
            var _newform = new FormData();
            var uploadFile = $("#uploadExcel")[0].files[0];
            var filename = uploadFile.name;
            var spliname = filename.split('.');
            var namecheckSplit = spliname[spliname.length-1];
            _newform.append('fileUpload', uploadFile);

            if(namecheckSplit == 'xlsx'){
                $.ajax({
                    url : '<?php echo base_url('admin-upload-status'); ?>',
                    type : 'POST',
                    cache : false,
                    processData:false,
                    contentType:false,
                    data : _newform,
                    beforeSubmit:function(){
                        console.log('0');
                    },
                    uploadProgress:function(event,position,total,percentageComplete){
                        console.log(percentageComplete);
                    },
                    success : function (result) {
                        console.log(result);
                    }
                })
            } else {
                alert('File Not supported please try xlsx format.');
                return false;
            }
            return false;
        })
    })
</script>
</body>

</html>
