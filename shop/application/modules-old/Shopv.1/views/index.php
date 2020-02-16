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
          <div class="col-md-12"><img src="<?php echo base_url(); ?>css/Shop_v10.jpg" style="width: 100%; height:auto; max-height: 100%;"></div>
            <?php $shopreskaddresss = json_decode($information->shop_resk_addresss); ?>
            <?php $cmnunicationAddress = json_decode($information->shop_communication_address); ?>
            <?php $shoptermsconditions = json_decode($information->shop_terms_conditions); ?>
            <?php $shopdeclarations = json_decode($information->shop_declarations); ?>
            <?php $shopotherdata = explode('|',$information->shop_other_data); ?>
            <?php $hdfcempid = $shopotherdata[2]; ?>
            <?php $pplname = selectingtheplans(); ?>
            <?php $nnmaeplan = $information->shop_plan_name ? $information->shop_plan_name : ($planName ? $planName : ''); ?>
            <?php if($nnmaeplan == '5'){
              $plannameDis = 'Plan A';
            } else if($nnmaeplan == '10'){
              $plannameDis = 'Plan B';
            } else if($nnmaeplan == '20'){
              $plannameDis = 'Plan C';
            } else if($nnmaeplan == '35'){
              $plannameDis = 'Plan D';
            }
            ?>

  <div class="row">
 <form id="shopCusData" name="shopCusData" novalidate shop:Cus:Data>
  <input type="hidden" name="thirdValueData" id="thirdValueData" ng-model="thirdValueData" value="<?php echo $thirdValueData; ?>">
  <div class="form-group" ng-init = ' planname = "<?php echo ($information->shop_plan_name ? $information->shop_plan_name : ($planName ? $planName : '') ); ?>"'>
  <input type="hidden" name="planname" id="planname" ng-model="planname" value="<?php echo ($information->shop_plan_name ? $information->shop_plan_name : ($planName ? $planName : '') ); ?>">
  </div>
  <div class="col-md-12">
    <table class="col-md-12 table table-hover table-striped table-responsive">
      <tr style="background-color: #103083 !important; color: white;"><td>Cover details</td><td><?php echo $plannameDis; ?></td></tr>
      <?php foreach ($pplname[$nnmaeplan] as $key => $value) {
        echo '<tr><td>'.$value['planame'].'</td><td>'.$value['value'].'</td></tr>';
    }?>
    </table>
  </div>
  <div class="col-md-12">
    <div class="col-md-6 text-left" ng-init = ' hrmcode = "<?php echo ($hdfcempid ? $hdfcempid : ($emplyeecode ? $emplyeecode : '') ); ?>"'><p><span> HDFC RM Code </span></p>
     <p> 
      <input type="text" name="hrmcode" id="hrmcode" ng-model="hrmcode" placeholder=" HDFC RM Code" class="form-control" ng-readonly = '<?php echo ($emplyeecode !=  '' || $hdfcempid != '') ? true : false; ?>'>
    </p>
  </div>

  <div class="col-md-6 text-left" ng-init = ' premisescovered = "<?php echo ($information->shop_premises_covered ? $information->shop_premises_covered : ''); ?>"'> <p><span> Premises to be Covered </span> </p>
      <p><select class="form-control" name="premisescovered" ng-model="premisescovered" id="premisescovered" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' ng-disabled = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
        <option value="">Please Select Option</option>
        <option value="1">Shop</option>
        <option value="2">Office</option>
      </select></p>
      <div ng-if="shopCusData.$submitted || shopCusData.premisescovered.$dirty" ng-messages="shopCusData.premisescovered.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Premises to be Covered</div>
                     </div>
  </div>
   <?php /* <div class="col-md-6 text-left" ng-init = ' aofrefnumber = "<?php echo ($information->shop_aof_ref_number ? $information->shop_aof_ref_number : ''); ?>" '>
      <p><span> AOF Reference No </span></p>
      <input type="text" name="aofrefnumber" id="aofrefnumber" ng-model="aofrefnumber" placeholder="AOF Reference No" maxLength="15" class="form-control" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
      <div ng-if="shopCusData.$submitted || shopCusData.aofrefnumber.$dirty" ng-messages="shopCusData.aofrefnumber.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter AOF Reference No</div>
                     </div>
  </div> */ ?>
  </div> 

  <div class="col-md-12">
    

    <div class="col-md-6 text-left" ng-init = ' insuredname = "<?php echo ($information->shop_insured_name ? $information->shop_insured_name : ''); ?>" '>
      <p><span> Insured Name </span></p>
      
      <p class="input-group date" style="text-align: -webkit-right;">
        <input type="text" name="insuredname" id="insuredname" ng-model="insuredname" placeholder="Insured Name" class="form-control" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
        <span class="input-group-addon"><a href="javascript:;" style="color: #154597;" data-toggle="tooltip" title="Company name in case of non-individual current account, owners name in case of individual account."><img style="height:20px !important; max-height: 100%;" src="<?php echo base_url(); ?>css/product_info.png"></a></span>
      </p>

        <div ng-if="shopCusData.$submitted || shopCusData.insuredname.$dirty" ng-messages="shopCusData.insuredname.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Insured Name</div>
                     </div>

    </div>

    <div class="col-md-6" ng-init = ' ownername = "<?php echo ($information->shop_owner_name ? $information->shop_owner_name : ''); ?>" '><p><span> Owners Name </span></p>
      <p class="input-group date" style="text-align: -webkit-right;">
        <input type="text" name="ownername" id="ownername" ng-model="ownername" placeholder="Owners Name" class="form-control" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
      <span class="input-group-addon"><a href="javascript:;" style="color: #154597;" data-toggle="tooltip" title="For Personal accident and hospital cash cover."><img style="height:20px !important; max-height: 100%;" src="<?php echo base_url(); ?>css/product_info.png"></a></span>
    </p>
      <div ng-if="shopCusData.$submitted || shopCusData.ownername.$dirty" ng-messages="shopCusData.ownername.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Owners Name</div>
                     </div>
    </div>
<!--  -->
  </div>

  <div class="col-md-12">
    

    <div class="col-md-6" ng-init = ' gender = "<?php echo ($information->shop_gender ? $information->shop_gender : ''); ?>" '><p><span> Gender </span></p>
      <select class="form-control" name="gender" ng-model="gender" id="gender" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' ng-disabled = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
        <option value="">Please Select Option</option>
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select>
      <div ng-if="shopCusData.$submitted || shopCusData.gender.$dirty" ng-messages="shopCusData.gender.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Option</div>
                     </div>
  </div>

  <div class="col-md-6" ng-init = ' ownerdob = "<?php echo ($information->shop_owner_dob ? $information->shop_owner_dob : ''); ?>" '><p><span> Owners DOB </span></p>
      <p>
        <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" type="text" name="ownerdob" id="ownerdob" ng-model="ownerdob" placeholder="Owners DOB" class="form-control dob" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' ng-disabled = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' check:Owner:Dob value="" />
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</div>
</p>
      <div ng-if="shopCusData.$submitted || shopCusData.ownerdob.$dirty" ng-messages="shopCusData.ownerdob.$error" role="alert">
                        <div ng-message="required" class="required">Please Select Option</div>
                     </div>
  </div>

  </div>
  <div class="col-md-12">
    
  </div>
<div class="col-md-12 text-left">
    <div class="col-md-6" ng-init = ' mobilenumber = "<?php echo ($information->shop_mobile_number ? $information->shop_mobile_number : ''); ?>" '><p><span> Registered Mobile number </span></p>
      <p><input type="text" name="mobilenumber" ng-pattern="/^[6-9][0-9]{9}$/" id="mobilenumber" maxlength="10" ng-model="mobilenumber" placeholder="Mobile number" class="form-control" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></p>
      <div ng-if="shopCusData.$submitted || shopCusData.mobilenumber.$dirty" ng-messages="shopCusData.mobilenumber.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Mobile number</div>
                     </div>
                     <span  ng-show="shopCusData.mobilenumber.$error.pattern" class="required">
                     Please Enter Valid Mobile number
                   </span>
    </div>

    <div class="col-md-6" ng-init = ' emailid = "<?php echo ($information->shop_email_id ? $information->shop_email_id : ''); ?>" '><p><span> Registered Email Id </span></p>
      <input type="text" name="emailid" id="emailid" ng-model="emailid" placeholder="Email Id" class="form-control" ng-pattern="/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
      <div ng-if="shopCusData.$submitted || shopCusData.emailid.$dirty" ng-messages="shopCusData.emailid.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Valid Email Id</div>
                     </div>
                     <span  ng-show="shopCusData.emailid.$error.pattern" class="required">
                     Please Enter Valid Email Id
                   </span>
  </div>
  </div>
  <div class="col-md-12 text-lef">
    <div class="col-md-12">
    <p><h5><span> Communication Address </span></h5></p>
  </div>
  <div class="row text-left">
    <div class="col-md-12">
    <div class="col-md-6" ng-init = ' communicationaddress = "<?php echo ($cmnunicationAddress->communicationaddress ? $cmnunicationAddress->communicationaddress : ''); ?>"'><p><textarea name="communicationaddress" ng-model="communicationaddress" id="communicationaddress" placeholder="Communication Address" class="form-control" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></textarea></p>
    <div ng-if="shopCusData.$submitted || shopCusData.communicationaddress.$dirty" ng-messages="shopCusData.communicationaddress.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Communication Address</div>
                     </div>
    </div>

    <div class="col-md-6" ng-init = ' CommunicationPincode = "<?php echo ($cmnunicationAddress->CommunicationPincode ? $cmnunicationAddress->CommunicationPincode : ''); ?>"'><p><input type="text" class="form-control" name="CommunicationPincode" id="CommunicationPincode" ng-model="CommunicationPincode" pincode:Validation placeholder="Pincode" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></p>

       <div ng-if="shopCusData.$submitted || shopCusData.CommunicationPincode.$dirty" ng-messages="shopCusData.CommunicationPincode.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Communication Pincode</div>
                     </div>

   </div>
   </div>
   </div>
   <div class="row">
    <div class="col-md-12">
   <div class="col-md-6" ng-init = ' CommunicationState = "<?php echo ($cmnunicationAddress->CommunicationState ? $cmnunicationAddress->CommunicationState : ''); ?>"'><p><input type="text" name="CommunicationState" class="form-control" id="CommunicationState" ng-model="CommunicationState" placeholder="State" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></p>

      <div ng-if="shopCusData.$submitted || shopCusData.CommunicationState.$dirty" ng-messages="shopCusData.CommunicationState.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Communication State</div>
                     </div>
    </div>

    <div class="col-md-6" ng-init = ' CommunicationCity ="<?php echo ($cmnunicationAddress->CommunicationCity ? $cmnunicationAddress->CommunicationCity : ''); ?>"'><p><input list="citiesbrowse" type="text" name="CommunicationCity" class="form-control" ng-model="CommunicationCity" id="CommunicationCity" placeholder="City" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></p>
      <datalist id="citiesbrowse">
      </datalist>
      <div ng-if="shopCusData.$submitted || shopCusData.CommunicationCity.$dirty" ng-messages="shopCusData.CommunicationCity.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Communication City</div>
                     </div>
</div>
    </div> 
  </div>
  </div>

  <div class="col-md-12 text-left" ng-init = ' samecommunication = "<?php echo ($information->shop_same_com_resk ? $information->shop_same_com_resk : ''); ?>" '>
    <div class="col-md-12">
    <input type="checkbox" name="samecommunication" id="samecommunication" ng-model="samecommunication" value="1" ng-checked = '<?php echo ($information->shop_same_com_resk !=  '') ? true : false; ?>' ng-disabled = '<?php echo ($information->shop_same_com_resk !=  '') ? true : false; ?>' check:Same:Risk> &nbsp; Risk Address Same as Communication Address.
    </div>
  </div>
  <hr/>

  <div class="col-md-12 text-lef">
    <div class="col-md-12 text-left">
    <p><h5><span> Risk Address </span></h5></p>
  </div>
    <div class="row text-center">
      <div class="col-md-12">
    <div class="col-md-6" ng-init = ' riskaddress = "<?php echo ($shopreskaddresss->riskaddress ? $shopreskaddresss->riskaddress : ''); ?>" '><p><textarea name="riskaddress" id="riskaddress" ng-model="riskaddress" placeholder="Risk Address" class="form-control" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></textarea></p></div>
    <div class="col-md-6" ng-init = ' riskPincode = "<?php echo ($shopreskaddresss->riskPincode ? $shopreskaddresss->riskPincode : ''); ?>" '><p><input type="text" class="form-control" name="riskPincode" repincode:Validation ng-model="riskPincode" id="riskPincode" placeholder="Pincode" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></p></div>
  </div></div>
  <div class="row text-center">
    <div class="col-md-12">
    <div class="col-md-6" ng-init = ' riskState = "<?php echo ($shopreskaddresss->riskState ? $shopreskaddresss->riskState : ''); ?>" '><p><input type="text" class="form-control" name="riskState" id="riskState" ng-model="riskState" placeholder="State" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'></p></div>
    <div class="col-md-6" ng-init = ' riskCity = "<?php echo ($shopreskaddresss->riskCity ? $shopreskaddresss->riskCity : ''); ?>" '><p><input type="text" class="form-control" list="recitiesbrowse" name="riskCity" id="riskCity" ng-model="riskCity" placeholder="City" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
<datalist id="recitiesbrowse">
      </datalist>
    </p>
    </div>
  </div>
  </div>

  </div>

<div class="col-md-12">
  <div class="col-md-12 text-left">
    <p><h5><strong> Nominee details </strong></h5></p>
  </div>
    <div class="col-md-4" ng-init = ' nomineename = "<?php echo ($information->shop_nominee_name ? $information->shop_nominee_name : ''); ?>" '><p><span> Name </span></p><p><input type="text" name="nomineename" ng-model="nomineename" id="nomineename" placeholder="Name" class="form-control" ng-required="true" ng-readonly = '<?php echo ($information->shop_nominee_name !=  '') ? true : false; ?>'></p>
      <div ng-if="shopCusData.$submitted || shopCusData.nomineename.$dirty" ng-messages="shopCusData.nomineename.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Nominee Name</div>
                     </div>
  </div>

  <div class="col-md-4" ng-init = ' nomineerelation = "<?php echo ($information->shop_nominee_relation ? $information->shop_nominee_relation : ''); ?>" '><p><span> Relation </span></p><p>
    <!-- <input type="text" ng-model="nomineerelation" name="nomineerelation" id="nomineerelation" placeholder="Relation" class="form-control" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' check:Nominee:Dob ng-required="true"> -->

    <select class="form-control" name="nomineerelation" ng-model="nomineerelation" id="nomineerelation" ng-required="true" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' ng-disabled = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>'>
        <option value="">Please Select Option</option>
        <?php foreach (realationshiofunction() as $key => $value) { ?>
        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
      <?php } ?>
      </select>
  </p>
      <div ng-if="shopCusData.$submitted || shopCusData.nomineerelation.$dirty" ng-messages="shopCusData.nomineerelation.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Nominee Name</div>
                     </div>
  </div>

    <div class="col-md-4 text-left" ng-init = ' nomineedob = "<?php echo ($information->shop_nominee_dob ? $information->shop_nominee_dob : ''); ?>" '><p><span> DOB </span></p><p>
      <span id="datepickernominee" class="input-group date" data-date-format="dd-mm-yyyy">
    <input type="text" ng-model="nomineedob" name="nomineedob" id="nomineedob" placeholder="DOB" class="form-control dob" ng-readonly = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' ng-disabled = '<?php echo ($information->shop_cus_id !=  '') ? true : false; ?>' check:Nominee:Dob ng-required="true">
    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
</span>
</p>
      <div ng-if="shopCusData.$submitted || shopCusData.nomineedob.$dirty" ng-messages="shopCusData.nomineedob.$error" role="alert">
                        <div ng-message="required" class="required">Please Enter Nominee DOB</div>
                     </div>
  </div>
  </div>
  <br/>
  <?php if(empty($information->shop_cus_id)){ ?>
  
  <div class="col-md-12 lmsresbor text-left">
    <div class="col-md-12 text-left">
    <p><h5><strong> RM Declaration </strong></h5></p>
  </div>

                     <div class="form-group">
                        <div class="col-md-12">
                           <?php /* <input ng-disabled = '<?php echo ($shopdeclarations->realtionhdfc !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shopdeclarations->realtionhdfc !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="realtionhdfc" id="realtionhdfc" ng-model="realtionhdfc" value="1" required /> */ ?>
                           <p>  I hereby confirm and declare that policy holder/payer have relationship with HDFC Bank and further the payment for the said policy will be made through debit to HDFC Bank Account only.  <span class="required">*</span> </p>
                           
                           <!-- <div ng-if="shopsendOTP.$submitted || shopsendOTP.realtionhdfc.$dirty" ng-messages="shopsendOTP.realtionhdfc.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div> -->
                        </div>
                        

                        <div class="col-md-12">
                           <?php /* <input ng-disabled = '<?php echo ($shopdeclarations->checkbankrecords !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shopdeclarations->checkbankrecords !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="checkbankrecords" id="checkbankrecords" ng-model="checkbankrecords" value="1" required /> */ ?>
                           <p>  I hereby confirm and declare that information(Email ID, Mobile Number and other details) given in the proposal form is as per Bank records  <span class="required">*</span> </p>
                           <!-- <div ng-if="shopsendOTP.$submitted || shopsendOTP.checkbankrecords.$dirty" ng-messages="shopsendOTP.checkbankrecords.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div> -->
                        </div>

                        <div class="col-md-12">
                          <?php /*  <input ng-disabled = '<?php echo ($shopdeclarations->confirmrelation !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shopdeclarations->confirmrelation !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="confirmrelation" id="confirmrelation" ng-model="confirmrelation" value="1" required /> */ ?>
                           <p> I hereby confirm and declare that policy holder & payer (If they are different) have blood relationship with each other. <span class="required">*</span> </p>
                           <!-- <div ng-if="shopsendOTP.$submitted || shopsendOTP.confirmrelation.$dirty" ng-messages="shopsendOTP.confirmrelation.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div> -->
                        </div>

                        <br/> 
                        <div class="col-md-12">
                          <?php /*<input ng-disabled = '<?php echo ($shopdeclarations->confirminformation !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shopdeclarations->confirminformation !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="confirminformation" id="confirminformation" ng-model="confirminformation" value="1" required />*/ ?>
                           <p> I hereby confirm and declare that any incorrect information/declaration given in the Sales Journey/Proposal form etc will call for action as per Bank policy. <span class="required">*</span> </p>
                           <!-- <div ng-if="shopsendOTP.$submitted || shopsendOTP.confirminformation.$dirty" ng-messages="shopsendOTP.confirminformation.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div> -->
                        </div>

                         <div class="col-md-12">
                          <?php /* <input ng-disabled = '<?php echo ($shopdeclarations->confirmautorenewal !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shopdeclarations->confirmautorenewal !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="confirmautorenewal" id="confirmautorenewal" ng-model="confirmautorenewal" value="1" required /> */ ?>
                           <p> I hereby confirm and declare that I have explained customer for Auto Renewal Consent. <span class="required">*</span> </p>
                           <!-- <div ng-if="shopsendOTP.$submitted || shopsendOTP.confirmautorenewal.$dirty" ng-messages="shopsendOTP.confirmautorenewal.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div> -->
                        </div>
                        <div class="col-md-12">
                          <p> <input ng-disabled = '<?php echo ($shopdeclarations->rmdeclarationagree !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shopdeclarations->rmdeclarationagree !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="rmdeclarationagree" id="rmdeclarationagree" ng-model="rmdeclarationagree" value="1" required />
                            I Agree. <span class="required">*</span> </p>
                           <div ng-if="shopsendOTP.$submitted || shopsendOTP.rmdeclarationagree.$dirty" ng-messages="shopsendOTP.rmdeclarationagree.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div>
                        </div>

                     </div>
  </div>
<?php } ?>
  <div class="col-md-12 text-right" ng-show = " <?php echo ($information->shop_cus_id !=  '') ? false : true; ?> ">
  <div class="form-group">

   <div class="submitC"> 
    <input type="button" ng-show = "pleasewaitbutton" id="submitData" placeholder="Name" class="btn btn-success" value="Plese Wait..">
    <input type="submit" ng-show = "submitbutton" name="submitData" ng-disabled = "(shopCusData.$valid) ? false : true" id="submitData" placeholder="Name" class="btn btn-success" value="Send Link">
  </div>
  </div>
  </div>
</form>
  </div>

  <div class="col-md-12">

<?php $sessionCustomer = $this->session->userdata('sessionCustomer'); ?>
<?php if(!empty($sessionCustomer) || !empty($information->shop_cus_id)) { ?>

    <form id="shopsendOTP" name="shopsendOTP" novalidate shop:Send:Otp>
    <div class="form-group" ng-init = ' accountNumber = "<?php echo ($information->shop_account_number ? $information->shop_account_number : ''); ?>" '>
      <p><span> HDFC Bank Account Number </span></p>
      <div class="form-group">
        <p>
          <input type="text" name="accountNumber" class="form-control" id="accountNumber" ng-model="accountNumber" minlength="14" placeholder="Account number" maxlength="14" ng-pattern="/.{14}$/" numberic:Validation ng-readonly = '<?php echo ($information->shop_account_number !=  '') ? true : false; ?>' ng-required="(accountNumber.length < 14) ? true : false"></p>

            <div ng-if="shopsendOTP.$submitted || shopsendOTP.accountNumber.$dirty" ng-messages="shopsendOTP.accountNumber.$error" role="alert">
                              <div ng-message="required" class="required">Please Enter HDFC Bank Account Number </div>
                           </div><span  ng-show="shopsendOTP.accountNumber.$error.pattern" class="required">Please Enter 14 Digits HDFC Bank Account Number</span>

      </div>
      
    </div>

      <div class="lmsresbor text-left">
                      <div class="form-group">
                      <h5>Terms & Conditions</h5>
                    </div>
                        <div class="form-group">
                           
                           <p> <input ng-disabled = '<?php echo ($shoptermsconditions->dealingaccessories !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shoptermsconditions->dealingaccessories !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="dealingaccessories" id="dealingaccessories" ng-model="dealingaccessories" value="1" required /> Insured shop/office is not dealing in mobile phones, tablets, jewelry or currency. Shop/office or any part of shop/office there off is not located in a basement. There is no claim in insured shop/office in last 3 years <span class="required">*</span> </p>
                           
                           <div ng-if="shopsendOTP.$submitted || shopsendOTP.dealingaccessories.$dirty" ng-messages="shopsendOTP.dealingaccessories.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div>
                        </div>

                        <div class="form-group">
                           
                           <p> <input ng-disabled = '<?php echo ($shoptermsconditions->termsandcondition !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shoptermsconditions->termsandcondition !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="termsandcondition" id="termsandcondition" ng-model="termsandcondition" value="1" required /> I confirm that I have read and understood the <a href="#" data-toggle="modal" data-target="#myGID" ng-model="myGID" general:Insurance:Declaration data-backdrop="static" data-keyboard="false">General Insurance Declaration</a>, <a href="#" data-toggle="modal" data-target="#myPrivacy" ng-model="myPrivacy" privacy:Policy data-backdrop="static" data-keyboard="false">Privacy policy</a> and <a href="#" data-toggle="modal" data-target="#myTerms" ng-model="myTerms" terms:And:Condition data-backdrop="static" data-keyboard="false">terms and condition</a> <span class="required">*</span> </p>
                           <div ng-if="shopsendOTP.$submitted || shopsendOTP.termsandcondition.$dirty" ng-messages="shopsendOTP.termsandcondition.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div>
                        </div>

                        <div class="form-group">
                           <p> <input ng-disabled = '<?php echo ($shoptermsconditions->premiumPayment !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shoptermsconditions->premiumPayment !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="premiumPayment" id="premiumPayment" ng-model="premiumPayment" value="1" required /> <a href="#" data-toggle="modal" data-target="#myPayment" data-backdrop="static" data-keyboard="false" payment:Condition> Payment authorization. <span class="required"> * </span> </a> </p>
                           <div ng-if="shopsendOTP.$submitted || shopsendOTP.premiumPayment.$dirty" ng-messages="shopsendOTP.premiumPayment.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div>
                        </div>

                        <div class="form-group">
                           <p> <input ng-disabled = '<?php echo ($shoptermsconditions->autorenewaldata !=  '') ? true : false; ?>' ng-checked = '<?php echo ($shoptermsconditions->autorenewaldata !=  '') ? true : false; ?>' class="Spouse_ship" type="checkbox" name="autorenewaldata" id="autorenewaldata" ng-model="autorenewaldata" value="1" />  “Auto Renewal Consent: By selecting this option, you are providing consent to set up a standing instruction on your account and authorizing Insurer to deduct subsequent payments as and when they become due”.</p>
                           <div ng-if="shopsendOTP.$submitted || shopsendOTP.autorenewaldata.$dirty" ng-messages="shopsendOTP.autorenewaldata.$error" role="alert">
                              <div ng-message="required" class="required">Please Accept</div>
                           </div>
                        </div>
                        <p></p>
                        <?php /*<em style="color:red;">Note:Please click and read General Insurance declaration, Privacy Policy, Terms & conditions to proceed further</em>*/ ?>
  </div>
  <?php /* ng-disabled = "(termsValueccheck == false) || (termsValueccheckpp == false) || (termsValuecchecktac == false) || (shopsendOTP.$valid == false)" */ ?>
  <?php if(empty($shoptermsconditions)) { ?>
  <div class="form-group text-right">
    <input type="button" class="btn btn-success" ng-show="otpPleasewait" value="Please wait..">
    <input type="submit" name="submitData" ng-show="otpsubmitform" id="otpsubmitform" placeholder="Name" class="btn btn-success" value="Send OTP">
  </div>
<?php } ?>
</form>
<br>
<?php if($information->shop_otp_status == 0 || $information->shop_otp_status == 2 || $information->shop_otp_status == 4 || $information->shop_otp_status == 6){ ?>
<?php $otpSession = $this->session->userdata('customer_otp_value'); ?>
<?php if(!empty($otpSession)){ ?>
  <div class="form-group">
  <div class="otpdetails"><h><strong>OTP Details</strong></h5></div>
  <form id="shopsubmitOTP" name="shopsubmitOTP" shop:Submit:Otp novalidate>
  <div class="row text-left">
  <div class="col-md-12">
    <div class="col-md-6">
      <div ng-init='errorCountValue ="<?php echo $information->shop_otp_status; ?>" '>
      <input type="hidden" name="errorCountValue" id="errorCountValue" ng-model="errorCountValue" value="">
      </div>
     <p> <input type="text" name="otpnumber" ng-model="otpnumber" maxlength="6" id="otpnumber" placeholder="Enter OTP" class="form-control" ng-required="true"></p>
      <div ng-if="shopsubmitOTP.$submitted || shopsubmitOTP.otpnumber.$dirty" ng-messages="shopsubmitOTP.otpnumber.$error" role="alert">
        <div ng-message="required" class="required"> Please Enter OTP </div>
      </div>
       <div id="error-otp-message" class="required"></div>
  </div>
  </div>
  </div>
  <div id="success-otp-message" class="text-center" style="color: green;"></div>
  <div class="row">
    <div class="form-group text-right">
      <input type="submit" name="submitData" id="submitOtpData" placeholder="Name" class="btn btn-success" value="Submit OTP"> </div>
    </div>
  </form>
  </div>

<?php } ?>

<?php 
    } else { 
    
    if($information->shop_otp_status == 1){ ?>

  <div id="success-otp-message" class="text-center" style="color: green;">Thank You for buying Bharti AXA Genral Insurance. You can close this page. Order ID:".<?php echo $information->lead_order_id; ?></div>

<?php } } ?>
<?php } ?>

<br/>
<br/>

  </div>

        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 footer">
 <section><p>“Registered office address: Bharti AXA General Insurance Company Limited, First Floor, Hosto Centre, No. 43, Millers Road, Vasanth Nagar, Bangalore - 560052. IRDAI Registration No. 139. CIN: U66030KA2007PLC043362. Email: customer.service@bhartiaxa.com. Toll-free: 1800-103-2292. For more details on risk factors and terms and conditions, please read the terms and conditions carefully before concluding the sale. For all other Terms and Conditions, please refer to policy wordings on www.bharti-axagi.co.in. Product Name: Smart Plan Shop Package Policy. UIN: 20/RD/BAGICL/MISC/SPSPPP/08-09, Smart Plan Office Package Policy. UIN: 13/RD/BAGICL/MISC/SPOP/08-09, Group Hospital Cash UIN:.BHAHLGP18110V011718. HDFC BANK is a licensed corporate agent of Bharti AXA General Insurance. CA license number CA0010. Trade Logo displayed above belongs to Bharti Enterprises (Holdings) Private Ltd. and AXA SA respectively and used by Bharti AXA General Insurance Company under license.  BAGI/LL/General/2018-19/02-31.”</p></section>
</div>
    </div>
  </div>
  
</section>



<!-- Modal -->
  <div class="modal fade" id="myGID" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #103083 !important;">
          <button type="button" class="close" data-dismiss="modal" style="text-align: right;">&times;</button>
          <h4 class="modal-title" style="color: white;">General Insurance Declaration</h4>
        </div>
        <div class="modal-body modelbody">
          <h4 class="text-left"><strong>Customer Declaration</strong></h4>
          <ul class="uline">
            <li> I have understood the Coverage & Benefits payable under the plan</li>
            <li> I understand that the insurance plan opted by me is on a voluntary basis</li>
            <li> I am aware that there are similar insurance plans available in the market</li>
            <li> I have read and understood the features of policy and agree to proceed with my application</li>
            <li> HDFC bank has arrangement with 3 General Insurance Companies i.e., HDFC Ergo General Insurance Company Limited, Bharti Axa General Insurance Company Limited & Bajaj Allianz General Insurance Company Limited & relevant details of the products have been disclosed to me</li>
          </ul>
          <div class="uline">
            <br/>
          <h4> <strong>Please note :</strong> </h4>
          <p>The commission has be disclosed in HDFC Bank branches & on Bank's website for your reference</p>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myPrivacy" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #103083 !important;">
          <button type="button" class="close" data-dismiss="modal" style="text-align: right;">&times;</button>
          <h4 class="modal-title" style="color: white;">Privacy Policy</h4>
        </div>
        <div class="modal-body modelbody">
          <h4 class="text-left"><strong>PRIVACY FACT STATEMENT HDFC Bank Limited</strong></h4>
          <h4 class="text-left"><strong>SCOPE</strong></h4>
          <ul class="uline">
            <li> This Notice Applies to HDFC Bank’s personal information collection in regards to Insurance Solicitation</li>
          </ul>
          <h4 class="text-left"><strong>Personal Information</strong></h4>
          <ul class="uline">
            <li> We collect personal information directly from you and maintain information on your activities with us</li>
            <li> Personal information includes your Gender, Name of Members to be insured, Age of the members to be insured, Pre-existing disease, Pin code, Income bracket, Name of the insured/proposer, Email address, Phone number, PAN (only for premium above 50k), Registered/Correspondence Address, Nominee details, Medical History of all the insured members</li>
          </ul>
          <h4 class="text-left"><strong>Uses and Disclosure</strong></h4>
          
          <ul class="uline">
            <li> The information is collected for purposes providing you best in market insurance products</li>
            <li> The information will be processed only after your explicit consent.</li>
            <li> The information is shared with bank authorized third party to offer you the products and services.</li>
            <li> By using the Service, you consent to our collection, use and disclosure practices, and other activities as described in this Privacy Statement.</li>
            <li> In some cases, bank may share your information with regulatory bodies in India and outside India where we are required by law to do this.</li>
          </ul>
          <h4 class="text-left"><strong>Your Choices</strong></h4>

          <ul class="uline">
            <li> For rights available to you, please read our online privacy notice</li>
          </ul>
          <h4 class="text-left"><strong>Important Information</strong></h4>
          <ul class="uline">
            <li> View our Online Privacy notice for details related to privacy. Privacy Notice EU Users Global Privacy Notice</li>
          </ul>
          <h4 class="text-left"><strong>How to Contact Us</strong></h4>
          <ul class="uline">
            <li> If you have a general question about HDFC Bank’s commitment to personal privacy, please contact: privacy@hdfcbank.com</li>
            <li> If you have a specific question or concern about your credit or account with HDFC, please contact, privacy@hdfcbank.com.</li>
          </ul>

        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="myTerms" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #103083 !important;">
          <button type="button" class="close" data-dismiss="modal" style="text-align: right;">&times;</button>
          <h4 class="modal-title" style="color: white;">Terms and Conditions</h4>
        </div>
        <div class="modal-body modelbody">
          <h4 class="text-left"><strong>Declaration</strong></h4>
          <div class="uline">
            <p>
              I/We hereby declare that the statements, answers and particulars given by me / us in the proposal form are true to my / our best knowledge and belief. It is hereby understood and agreed that the statements, answers and particulars provided herein above are the basis on which this insurance is been granted and that if, after the insurance is effected, it is found that any of the statements , answers or particulars are incorrect or untrue in any respect , the Company shall have no liability under this insurance.
I / We agree and undertake to convey to Bharti AXA General Insurance Company Limited any additions / alterations carried out in the risk proposed for insurance after submission of this proposal form
</p>
<p>1. I/We declare and consent to the company seeking medical information from any doctor or from a hospital who at any time has attended on the life to be insured/proposer of from any past or present employer concerning anything which affects the physical or mental health of the life to be assured/proposer and seeking information from any insurance company to which an application from insurance on the life to be assured/proposer has been made for the purpose of underwriting the proposal and/ or claim settlement.</p>
<p>2. I/We hereby declare, on my behalf and on behalf of all persons proposed to be insured, that the above statements, answers and/or particulars given by me are true and complete in all respects to the best of my knowledge and that I/We am/are authorized to propose on behalf of these other persons. </p>
<p>3. I /We understand the information provided by me will form the basis of insurance Policy, is subject to the Board approved underwriting policy of the insurance company and that the Policy will come into force only after full receipt of the premium chargeable.</p>
<p>4. I/We further declare that I/We notify in writing any change occurring in the occupation or general health of the life to be insured/ propose after the proposal has been submitted but before communication of the risk acceptance by the company. 
  </p>
  <p>5. I/We authorize the company to share information   pertaining to my proposal including the medical records for the sole purpose of proposal underwriting and/or claims settlement and with any Governmental and / or Regulatory authority.</p>
  <p>
  6. Have you ever been entrusted with prominent public functions, for example Heads of State or of government, senior politicians, senior government, judicial or military officials, senior executives of state owned corporations, important political party official</p>
          </div>
          <br>
         <h4 class="text-left"> <strong>PROHIBITION OF REBATES (SECTION 41) OF THE INSURANCE ACT 1938</strong> </h4>   
          <div class="uline">
            <br/>
          
          <p>No person shall allow or offer to allow, either directly or indirectly as an inducement to any person to take out or renew or continue an insurance in respect of any kind or risk relating to lives or property in India, any rebate of the whole or part of the commission payable or any rebate of the premium shown on the policy, nor shall any person taking out or renewing or continuing a policy accept any rebate except such rebate as may be allowed in accordance with the prospectus or tables of the insurer.</p><p>
2. Any person making default in complying with the provisions of this section shall be liable for a penalty which may extend to ten lakh rupees.
</p>
<p>
  <table class="table table-hover table-striped table-responsive" style="border: 1px solid #0000ff2e;" cellpadding="10">
    <tr style="background-color: #103083 !important;"><td colspan="2" style="color: white;" class="text-center">Excess</td></tr>
    <tr><td>Fire</td><td>5% of claim amount subject to minimum of Rs. 10,000/- for every claim</td></tr>
    <tr><td>Burglary</td><td>5% of the claim amount subject to minimum of Rs 7500/- for each claim</td></tr>
    <tr><td>Money In Transit & Safe (Theft)</td><td>5% of the claim amount subject to minimum of Rs. 2500/- for every claim.</td></tr>
    <tr><td>Public Liability</td><td>0.5% of the limit of indemnity per any one accident subject to maximum of Rs. 3 Lac and minimum of Rs 2000/-</td></tr>
    <tr><td>Hospital Cash ( Daily cash Benefit for 10 days)</td><td>Nil</td></tr>
  </table>

  <table class="table table-hover table-striped table-responsive" style="border: 1px solid #0000ff2e;" cellpadding="0">
    <tr style="background-color: #103083 !important;"><td style="color: white;" class="text-center">Cover</td><td style="color: white;" class="text-center">Details</td></tr>
    <tr><td>Fire</td><td style="padding: 0px;"><table class="table table-hover table-striped table-responsive">
      <tr><td>Excluding the risk of Basement</td></tr>
      <tr><td>Warranted that shop dealing in Mobile phones, Tablets, Currency & Jewellery are NOT covered under the policy</td></tr>
      <tr><td>Terrorism is not covered under the policy</td></tr>
    </table>
    </td></tr>
    <tr><td>Burglary</td>
    <td style="padding: 0px;"><table class="table table-hover table-striped table-responsive">
      <tr><td>Theft is not covered. Terrorism is not covered under the policy</td></tr>
      <tr><td>Strike, Riot And Civil Commotion Is Not Covered</td></tr>
    </table>
    </td>
  </tr>
  <tr><td>Public Liability</td><td>Any One Accident:Any One Year = 1:1</td></tr>
  <tr><td>PA owner Death only</td><td style="padding: 0px;"><table class="table table-hover table-striped table-responsive">
      <tr><td>Coverage : Only Death</td></tr>
      <tr><td>Person age should be between 18 -60 years</td></tr>
    </table>
    </td></tr>
    <tr><td>Hospital Cash ( Daily cash Benefit for 10 days)</td><td style="padding: 1px;"><table class="table table-hover table-striped table-responsive">
      <tr><td>Pre existing disease covered after 24 months</td></tr>
      <tr><td>Initial waiting period of 30 days applicable</td></tr>
      <tr><td>Specified Illnesses covered after 24 months</td></tr>
    </table>
    </td></tr>
    <tr><td>Money In Transit & Safe (Theft)</td><td style="padding: 1px;"><table class="table table-hover table-striped table-responsive">
      <tr><td>Warranted That The Keys Are Not Left In The Premises After Office Hours</td></tr>
      <tr><td>Definition of Safe : Safe means and includes cupboards, almirahs and cash boxes made of steel and of standard make secured with standard locking system.</td></tr>
      <tr><td>Terrorism Damage Exclusion Clause</td></tr>
    </table>
    </td></tr>
    
    
  </table>

  </p>
          </div>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="myPayment" role="dialog" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #103083 !important;">
          <button type="button" class="close" data-dismiss="modal" style="text-align: right;">&times;</button>
          <h4 class="modal-title" style="color: white;">Payment authorization</h4>
        </div>
        <div class="modal-body modelbody">
          <h4 class="text-center"><strong>ANNEXURE 1:</strong></h4>
          <ul class="uline">
            <li> This is to confirm that request for buying Non-life Insurance product has been made by me. </li>
            <li> I wish to avail SI and hereby express my unconditional consent to debit premium of my policy to above through participation in Direct Debit/SI mode towards renewal of this policy for the tenure of ten years I hereby authorize that in the instance of transaction failure towards standing instruction request, bounce charges will be levied to my account.</li>
            <li> I hereby declare that the particulars given above are correct and complete and undertake to keep sufficient funds in the account mentioned in the mandate as on the date of execution of debit.</li>
            <li> I hereby authorize HDFC Bank to communicate my funding account number and any other account details (as may be necessary) to <Insurance Company> for the specific purpose of recovering my/our payments through a debit instruction to my account.</li>
            <li> If the transaction is delayed or not effected at all for reasons of incomplete or incorrect information, I will not hold <Insurance Company>, HDFC Bank or the other intermediaries responsible.</li>
              <li> I hereby authorize that in the instance of a transaction failure towards a Direct Debit/standing instruction request, if 1st attempt is unsuccessful, three more re-attempts will be made to my/our account to recover the premium amount.</li>
              <li> I understand and agree that submission of this form does not mean that the request will be processed. I understand that any payout under the policy shall be strictly in accordance with the policy terms and conditions.</li>
              <li> I hereby authorize my bank to debit my account with the amount of applicable Taxes and other levies as may be stipulated by the government, from time to time, on the premium stated above and for this purpose, no further or revised authority is required by my bank.</li>
          </ul>
        </div>
        <div class="modal-footer">
          <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
        </div>
      </div>
    </div>
  </div>

<script>
$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: false
  }).datepicker('update');
  $("#datepickernominee").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update');
});
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
     
});
</script>
</body>

</html>
