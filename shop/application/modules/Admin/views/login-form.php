<!DOCTYPE html>
<?php //echo MD5('Bh@rt!123456'); ?>
<html>
<head>
  <title>Bharti AXA General Insurance</title>
  <link rel="shortcut icon" href="https://buyuat.bharti-axagi.co.in/hdfc-crm/assets/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
</head>
<body class="body">

<div class="container">
<div class="context">
<form method="POST">
    <div class="imgcontainer">
      <img src="https://buyuat.bharti-axagi.co.in/hdfc-crm/assets/images/logo.png" alt="img-thumbnail" class="img-thumbnail">
    </div>
    <div class="form-group text-center"><h4>Login Form</h4>
    </div>
    <div class="form-group">
    <input type="text" class="form-input" placeholder="Enter Username" name="loginusername" required>
    </div>
    <div class="form-group">
    <input type="password" class="form-input" placeholder="Enter Password" name="loginpassword" required>
    </div>
    <div class="form-group error"><?php echo $this->session->tempdata('error_details'); ?></div>
    <div class="form-group">
    <button class="btn btn-success" type="submit"> Login </button>
    </div>
</form>
<div class="copyright">
  Copyright 2019. All Rights Reserved.</div>
</div>

</div>
</body>
</html>
