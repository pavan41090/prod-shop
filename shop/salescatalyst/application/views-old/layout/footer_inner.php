        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; Bharti AXA.
               <!-- <a href="#" target="_blank">Purchase Metronic!</a>-->
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
       
		
		<script src="<?php echo base_url();?>assets/js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/js/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>    
		<script src="<?php echo base_url(); ?>assets/js/layout.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/common_js.js" type="text/javascript"></script>
        
       <script>
	$(document).ready(function(){
		var date_input=$('input[name="mx_Target_Date"]'); //our date input has the name "date"
		
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script> 
<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="datepickercar"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script> 

<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="travel_mx_Target_Date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script> 

<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="enddatetwo"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script> 
<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="startdatetwo"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})


	})
</script> 
        
    <script>
	$(document).ready(function(){
		
		var date_input=$('input[name="departdate"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})


	})
</script> 

<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="returndate"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})


	})
</script> 

<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="datebirth"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	

	})
</script>
<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="spouse"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>
<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="child"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>   
        
        <script>
	$(document).ready(function(){
		
		var date_input=$('input[name="tw_mx_Target_Date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>   

<script>
	$(document).ready(function(){
		
		var date_input=$('input[name="pa_mx_Target_Date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'dd-mm-yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>   
<!-- tooltip -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>

<script>	
function dob_validate (dob)
{

	//alert(dob);
  
 var dobstr =  /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/;
   // var text = '';
  if(dobstr.test(dob) == false)
   {
      text =  "Please Enter The Date Format (DD-MM-YYYY)";  
   } else {
      text = '';
      var str = dob;
      var res = str.split("-");
      var year = str.length;
      if(res[0] > 31 ) {
        text =  "Please Enter valid Date";  
      } else if(res[1] > 12) {
      text =  "Please Enter valid Month"; 
    } else if(res[2].length !== 4 ) {
      text =  "Please Enter valid Year"; 
    }

   }

   $('#dobalert').html(text);
}

</script>

<script>

// POSTCODE

function postcode_validate(zipcode)
{
   var txt = '';
   var regPostcode = /^([1-9])([0-9]){5}$/;
   if(regPostcode.test(zipcode) == false)
   {
      text =  "Please enter a valid Postcode";  
   } else {
      text = '';
   }
   $('#post').html(text);
}



// MOBILE

function mobile_validate(Mobile)
{
   
   var Mobilenum = /^([1-9])([0-9]){9}$/;
   if(Mobilenum.test(Mobile) == false)
   {
      text = "Please Enter a Valid Mobile Number";  
   } else {
      text="";
   }
   $('#mobilewar').html(text);
}


function mobile_validate_emergency(Mobile)
{
   
   var Mobilenum = /^([1-9])([0-9]){9}$/;
   if(Mobilenum.test(Mobile) == false)
   {
      text = "Please Enter a Valid Mobile Number";  
   } else {
      text="";
   }
   $('#emergencyContact').html(text);
}

// EMAIL

 function email_validate(email)
{
   
  var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
   if(re.test(email) == false)
   {
      text = "Please Enter a Valid Email";  
   } else {
      text="";
   }
   $('#emailwar').html(text);
}

// CARD

function card_validate(card)
{
   var txt = '';
   var cardnum = /^([0-9])([0-9]){3}$/;
   if(cardnum.test(card) == false)
   {
      text =  "Please enter a valid card number";  
   } else {
      text = '';
   }
   $('#cardwar').html(text);
}

</script>



        
        <!-- END THEME LAYOUT SCRIPTS -->
		
    </body>

</html>