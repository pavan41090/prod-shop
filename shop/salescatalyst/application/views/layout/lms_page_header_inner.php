<div class="page-content-wrapper">
   <div class="page-content">
      <h3 class="page-title">LMS - <?php echo $sub_module; ?> 
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="lms-lead-list">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="lms-lead-list">Leads</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <span><?php echo $sub_module; ?> </span>
            </li>
         </ul>
      </div>
      <!-- END PAGE HEADER-->

      <div class="row">
         <div class="col-md-12">
            <div class="portlet light ">
               <div class="portlet-body">
                  <ul class="nav nav-tabs">
                    <?php foreach($prdt_privilage as $menu){ ?>
                     <li id='<?php echo $menu->prdt_m_shot_name; ?>' class="<?php if($this->uri->segment(1) == 'lms-'.$menu->prdt_m_shot_name){ echo 'active'; } else { echo ''; } ?>">
                        <a href="lms-<?php echo $menu->prdt_m_shot_name; ?>"> <?php echo $menu->prdt_m_name; ?> </a>
                        <input type="hidden" value="<?php echo $menu->plan; ?>" id="plan-<?php echo $menu->prdt_m_shot_name; ?>"/>
                     </li>
                   <?php } ?>

   </ul>

<script type="text/javascript">
   
   $(document).ready(function() {
    function setChannel(){
      $.ajax({
      type: "GET",
      url: 'User/getMyprofile/',  
      success: function(response){
      var a=JSON.parse(response);
      var ctrlName = 'myCtrl';
      var sel = 'div[ng-controller="' + ctrlName + '"]';
      var scope = sel;
      scope.channel=a.channel;
      if(a.usr_type_name=="HDFC AV"){
      $("#lms_car_category").prop("readonly", true);
      $("#lms_car_category").val(a.channel);
      }
      }

      });
      }
   });

</script>