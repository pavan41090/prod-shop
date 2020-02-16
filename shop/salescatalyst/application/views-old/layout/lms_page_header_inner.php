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
                     <li id='<?php echo $menu->prdt_m_shot_name; ?>'>
                        <a href="lms-<?php echo $menu->prdt_m_shot_name; ?>"> <?php echo $menu->prdt_m_name; ?> </a>
                        <input type="hidden" value="<?php echo $menu->plan; ?>" id="plan-<?php echo $menu->prdt_m_shot_name; ?>"/>
                     </li>
                   <?php } ?>

<!--                      <li id='car'>
                        <a href="lms-car"> Car </a>
                     </li>
                     <li id="twowheeler">
                        <a href="lms-two-wheeler" > Two Wheeler </a>
                     </li>
					           <li id="travel">
                        <a href="lms-travel"> Travel </a>
                     </li>
                      <li id="health">
                        <a href="lms-health" >Health </a>
                     </li>
                      <li id="home">
                        <a href="lms-home" >Home</a>
                     </li>
					 
                      <li id="pa">
                        <a href="lms-personal-accident">Personal Accident </a>
                     </li>
                   <li id="ci">
                        <a href="lms-critical-illnes">Critical Illnes </a>
                    </li>
                      <li id="ship">
                        <a href="lms-super-ship">Super Ship </a>
                     </li>
 -->


                    
                  </ul>





<script type="text/javascript">
   
   $(document).ready(function() {




    function setChannel(){

             $.ajax({
    type: "GET",
    url: 'User/getMyprofile/',  
    success: function(response){
      //  alert(response);
var a=JSON.parse(response);

   var ctrlName = 'myCtrl';
     var sel = 'div[ng-controller="' + ctrlName + '"]';
    var scope = angular.element(sel).scope();
      scope.channel=a.channel;
 
if(a.usr_type_name=="HDFC AV")
{

          $("#lms_car_category").prop("readonly", true);
//$("#lms_car_category").removeattr("required");


     $("#lms_car_category").val(a.channel);
     console.log(response);
  }
}
    
});
    }
     var sub_module = "<?php echo $sub_module; ?>";
     
     switch(sub_module){

      case 'Car' : 
         $('#car').addClass("active");
         break;
      case 'Two Wheeler':
         $('#two-wheeler').addClass("active");
         break;
      case 'Travel':
         $('#travel').addClass("active");
         break;
      case 'Health':
         $('#health').addClass("active");
         break;
      case 'Super Ship':
         $('#super-ship').addClass("active");
         break;
      case 'Critical Illnes':
         $('#critical-illnes').addClass("active");
         break;
      case 'Personal Accident':
         $('#personal-accident').addClass("active");
         break;
      case 'Home':
         $('#home').addClass("active");
         break;
      case 'Combo':
         $('#combo').addClass("active");
         break;
      case 'Office':
         $('#office').addClass("active");
         break;
      case 'Shop':
         $('#shop').addClass("active");
         break;           
      }

      setTimeout(setChannel,0);

   })   

</script>                  