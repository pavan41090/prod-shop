<!DOCTYPE html>
<html lang="en" ng-app="lmsShop">
<head>
<title>Bharti AXA General Insurance</title>
  <link rel="shortcut icon" href="https://buyuat.bharti-axagi.co.in/hdfc-crm/assets/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/angular.js" type="text/javascript"></script>   
  <script src="<?php echo base_url(); ?>js/angular-messages.js" type="text/javascript"></script>
  <link rel="shortcut icon" href="https://buyuat.bharti-axagi.co.in/salescatalyst/assets/images/favicon.ico" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
  <style type="text/css">
    label{margin-left: 20px;}
   #datepicker > span:hover{cursor: pointer;}
   .required {
    color: #e02222;
    font-size: 12px;
    padding-left: 2px;
   }
    .uline{
      text-align: initial;
        line-height: 25px;
    }
    .modelbody{
          height: 400px;
          overflow: scroll;
          overflow-x: auto;
    }

    .footer{
	  position: absolute;
	  bottom:0px !important;
      text-align: center;
      font-size: 13px;
      background-color: #113184;
      color: white;
      font-family: "Times New Roman", Times, serif;
      /*margin-left: 10.667% !important;*/
      /*width: 100%;*/
    }

  </style>
  <script>
    let _lmsshopapp = angular.module( 'lmsShop', ['ngMessages'] );
    let _pathurl = '<?php echo base_url(); ?>';
  </script>
  <script src="<?php echo base_url(); ?>js/app-shop-console.min.js"></script>
</head>
<body>
<section>
  <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="<?php echo base_url(); ?>" style="color:white;">Dukandar suraksha Plan</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="javascript:;"> &nbsp; </a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
          <div class="navbar-header" style="margin-top: 35px;">
      <a href="javascript:;"><img src="https://buyuat.bharti-axagi.co.in:8443/microsite/images/commonb2c/headerFooter/logo.png" class="img-responsive imgres" style="width: 100%;"></a>
    </div>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <div class="col-md-12">
            
			<div id="success-otp-message" class="text-center" style="color: green;">Thank You for buying Bharti AXA Genral Insurance. You can close this page. Order ID:".<?php echo $information->lead_order_id; ?>
			</div>
			
			</div>

        </div>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>

        
    </div>
  </div>
  
</section>
<footer class="page-footer font-small col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 footer" style='background-color: #113184 !important;color:white !important;text-align: center !important;font-size: 13px !important;font-family: "Times New Roman", Times, serif;'>
 <section><p>“Registered office address: Bharti AXA General Insurance Company Limited, First Floor, Hosto Centre, No. 43, Millers Road, Vasanth Nagar, Bangalore - 560052. IRDAI Registration No. 139. CIN: U66030KA2007PLC043362. Email: customer.service@bhartiaxa.com. Toll-free: 1800-103-2292. For more details on risk factors and terms and conditions, please read the terms and conditions carefully before concluding the sale. For all other Terms and Conditions, please refer to policy wordings on www.bharti-axagi.co.in. Product Name: Smart Plan Shop Package Policy. UIN: 20/RD/BAGICL/MISC/SPSPPP/08-09, Smart Plan Office Package Policy. UIN: 13/RD/BAGICL/MISC/SPOP/08-09, Group Hospital Cash UIN:.BHAHLGP18110V011718. HDFC BANK is a licensed corporate agent of Bharti AXA General Insurance. CA license number CA0010. Trade Logo displayed above belongs to Bharti Enterprises (Holdings) Private Ltd. and AXA SA respectively and used by Bharti AXA General Insurance Company under license.  BAGI/LL/General/2018-19/02-31.”
 </p></section>
</footer>
<script>
$(function(){
	<?php if($this->uri->segment(1) != 'payment-re-responce') {?>
	setTimeout(function(){
		window.open('<?php echo base_url()?>payment-re-responce/<?php echo $this->uri->segment(2)?>','_self');
	},5000);
	<?php } ?>
});
</script>
</body>

</html>
