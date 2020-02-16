<input type="hidden" id="web_url" value="<?php echo base_url(); ?>">


<div class="page-content-wrapper">
   <!-- BEGIN CONTENT BODY -->
   <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- END THEME PANEL --> 
      <h3 class="page-title"> <?php echo $title ?>
      </h3>
      <div class="page-bar" ng-app="plunker" >
         <form name="lmsCar" novalidate ></form>
         <ul class="page-breadcrumb">
            <li>
               <i class="icon-home"></i>
               <a href="index.html ">Home</a>
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

      <div class="row">

         <div class="col-md-12">
            <div class="portlet box gray-gray">

               <div class="portlet-title">
                <div class="col-md-12 caption" > <?php echo $title ?> </div>  
                  <div class="row dwnmanibor">
                     <div class="col-md-3 ">
                        <div class="col-md-12 dwnbord">
                           <div class="dwnmaintite">Home</div> 
                           <div class="dwnempty"> <button type="button" class="btn blue btn-default downloadReport dwnldbtnbk" id="home">Home </button> </div>
                        <div class="dwnempty"><button type="button" class="btn blue btn-default downloadReport dwnldbtnbk" id="home_peei">Home - PEEI </button> </div> 
                        </div>
                     </div>
                      <div class="col-md-3 ">
                        <div class="col-md-12 dwnbord">
                           <div class="dwnmaintite">Combo</div> 
                           <div class="dwnempty">  <button type="button" class="btn blue btn-default downloadReport dwnldbtnbk" id="combo">Combo </button>  </div>
                           <div class="dwnempty"> <button type="button" class="btn blue btn-default downloadReport dwnldbtnbk" id="combo_upp">Combo - UPP </button>  </div> 
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="col-md-12 dwnbord">
                           <div class="dwnmaintite">PA</div> 
                           <div class="dwnempty"> <button type="button" class="btn blue btn-default downloadReport dwnldbtnbk" id="paa">PA </button> </div>
                           <div class="dwnempty"><button class="btn dwnhiddbtn" id="">&nbsp; </button></div>
                        </div>   
                     </div> 
                     <div class="col-md-3">
                        <div class="col-md-12 dwnbord">
                           <div class="dwnmaintite">Office</div> 
                           <div class="dwnempty"> <button type="button" class="btn blue btn-default downloadReport dwnldbtnbk" id="office">Office </button> </div>
                           <div class="dwnempty"><button class="btn dwnhiddbtn" id="">&nbsp; </button></div>
                        </div>   
                     </div>           
                  </div>



            <div class="row">&nbsp;</div> 
                
                  <div class="row dwnmanibor">
                     <div class="col-md-3">
                        <div class="col-md-12 dwnbord">                     
                           <div class="dwnmaintite">Shop</div> 
                           <div class="dwnempty"> <button type="button" class="btn blue btn-default downloadReport dwnldbtnbk" id="shop">Shop </button> </div>
                           <div class="dwnempty"><button type="button" class="btn dwnhiddbtn">&nbsp; </button> </div> 
                        </div>   
                     </div>
                  </div>

            <div class="row">&nbsp;</div>       


               </div>
            </div>
         </div>   
      </div> 

   </div>
</div>      

<script type="text/javascript">
  

 var myModule = angular.module('plunker', []);
   $(document).ready(function() {
      
      $(document.body).on('click', '.downloadReport' ,function(){
        
         var productType  = this.id;


         var webUrl = $('#web_url').val();
         $.ajax({
            url: webUrl+'DownloadLeadsExcel/createXLSProducts',
            dataType: 'json',
            type: 'post',       
            data: {'productType' : productType},
            success: function(data){
               $('#excel_file_name').val(data);
                  var download = 'assets/temp-excel/'+data;
                  window.location.href = download;
               },
            });  
      });  




 });

</script> 