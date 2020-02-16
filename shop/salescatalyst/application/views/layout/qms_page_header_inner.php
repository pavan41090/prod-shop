<div class="page-content-wrapper">
   <div class="page-content">
      <h3 class="page-title">QMS - <?php echo $sub_module; ?> 
      </h3>
      <div class="page-bar">
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html">Home</a>
               <i class="fa fa-angle-right"></i>
            </li>
            <li>
               <a href="#">Quotes</a>
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
                     <li id='car'>
                        <a href="create-quote-car"> Car </a>
                     </li>
                     <li id="twowheeler">
                        <a href="create-quote-two-wheeler" > Two Wheeler </a>
                     </li>
					      <li id="travel">
                        <a href="create-quote-travel"> Travel </a>
                     </li>
                     <li id="health">
                        <a href="create-quote-health" >Health </a>
                     </li>
                     <li id="home">
                        <a href="create-quote-home" >Home</a>
                     </li>
                     <li id="pa">
                        <a href="create-quote-personal-accident">Personal Accident</a>
                     </li>
                      <li id="ci">
                        <a href="create-quote-critical-illnes">Critical Illnes</a>
                     </li>
                      <li id="ship">
                        <a href="create-quote-super-ship">Super Ship </a>
                     </li>
      					
                  </ul>




<script type="text/javascript">
   
   $(document).ready(function() {
     var sub_module = "<?php echo $sub_module; ?>";
     
     switch(sub_module){

      case 'Car' : 
         $('#car').addClass( "active" );
         break;
      case 'Two Wheeler':
         $('#twowheeler').addClass( "active" );
         break;
      case 'Travel':
         $('#travel').addClass( "active" );
         break;
      case 'Health':
         $('#health').addClass( "active" );
         break;
      case 'Super Ship':
         $('#ship').addClass( "active" );
         break;
      case 'Critical Illnes':
         $('#ci').addClass( "active" );
         break;
      case 'Personal Accident':
         $('#pa').addClass( "active" );
         break;
      case 'Home':
         $('#home').addClass( "active" );
         break;         
      }

   })   

</script>                  