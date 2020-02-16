$(document).on('click','#SIM_structure',function(){
	updatePremium();
});
$(document).on('change','.hme_sum_insured_provided', function() {
    
      var selected = $(this).val();
      switch(selected){
         case 'valuables':
		    var variableAlert = $('#valuables').is(':checked');
			
            if($('#valuables').is(":checked")){ 
            $('#valuable_detail_div').show();
			   $('#valuables').attr('checked',true);
			   $('#uniform-valuables span').attr('class',"checked");
            }else {
                $('#valuable_detail_div').hide();
				$('#valuables').attr('checked',false);
				$('#uniform-valuables span').attr('class',"");
            }
            break;
         
         case 'SIM_PEE':
			
            if($('#SIM_PEE').is(":checked")){ 
               $('#SIM_PEE_detail_div').show();
			   $('#SIM_PEE').attr('checked',true);
			   $('#uniform-SIM_PEE span').attr('class',"checked");
            }else {
                $('#SIM_PEE_detail_div').hide();
				$('#SIM_PEE').attr('checked',false);
				$('#uniform-SIM_PEE span').attr('class',"");
            }
            break;
      }

      updatePremium();
   
   });
function updatePremium(){
	  
      var sumInsured = $("#hme_sum_insured").val();
      switch(sumInsured){
         case '500000':
            var premiumAmt = 3000;
            if(($('#valuables').is(":checked") === true) || ($('#uniform-valuables span').attr('class') == 'checked')) { 
			premiumAmt = Number(premiumAmt) + Number('2500'); } else { premiumAmt = premiumAmt; }
            if(($('#SIM_PEE').is(":checked") === true)  || ($('#uniform-SIM_PEE span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('4000'); }else { premiumAmt = premiumAmt; }
			
            if(($('#SIM_structure').is(":checked") === true && $('#hme_property_ownership').val() == 'Owned') || ($('#uniform-SIM_structure span').attr('class') == 'checked' && $('#hme_property_ownership').val() == 'Owned')){ premiumAmt = Number(premiumAmt) + Number('1239'); } else { premiumAmt = premiumAmt; }
			
            $('#lms_est_premium').val(premiumAmt);
            break;
         case '1000000':
            var premiumAmt = 4000;
            if(($('#valuables').is(":checked") === true) || ($('#uniform-valuables span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('4500'); } else { premiumAmt = premiumAmt; }
            if(($('#SIM_PEE').is(":checked") === true) || ($('#uniform-SIM_PEE span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('4500'); } else { premiumAmt = premiumAmt; }
            if(($('#SIM_structure').is(":checked") === true && $('#hme_property_ownership').val() == 'Owned') || ($('#uniform-SIM_structure span').attr('class') == 'checked' && $('#hme_property_ownership').val() == 'Owned')){ premiumAmt = Number(premiumAmt) + Number('2065'); } else { premiumAmt = premiumAmt; }
            $('#lms_est_premium').val(premiumAmt);
            break;
         case '2000000':
            var premiumAmt = 7500;
            if(($('#valuables').is(":checked") === true) || ($('#uniform-valuables span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('8000'); } else { premiumAmt = premiumAmt; }
            if(($('#SIM_PEE').is(":checked") === true) || ($('#uniform-SIM_PEE span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('8000'); } else { premiumAmt = premiumAmt; }
            if(($('#SIM_structure').is(":checked") === true && $('#hme_property_ownership').val() == 'Owned') || ($('#uniform-SIM_structure span').attr('class') == 'checked' && $('#hme_property_ownership').val() == 'Owned')){ premiumAmt = Number(premiumAmt) + Number('2891'); }else { premiumAmt = premiumAmt; }
			
            $('#lms_est_premium').val(premiumAmt);
            break;
         case '3000000':
		 
            var premiumAmt = 11000;
            if(($('#valuables').is(":checked") === true) || ($('#uniform-valuables span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('12000'); } else { premiumAmt = premiumAmt; }
			
            if(($('#SIM_PEE').is(":checked") === true) || ($('#uniform-SIM_PEE span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('10000'); }else { premiumAmt = premiumAmt; }
			
            if(($('#SIM_structure').is(":checked") === true && $('#hme_property_ownership').val() == 'Owned')  || ($('#uniform-SIM_structure span').attr('class') == 'checked' && $('#hme_property_ownership').val() == 'Owned')){ premiumAmt = Number(premiumAmt) + Number('4130'); } else { premiumAmt = premiumAmt; }
			
            $('#lms_est_premium').val(premiumAmt);
			
            break;
         case '4000000':
            var premiumAmt = 14000;
            if(($('#valuables').is(":checked") === true) || ($('#uniform-valuables span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('15000'); }else { premiumAmt = premiumAmt; }
            if(($('#SIM_PEE').is(":checked") === true) || ($('#uniform-SIM_PEE span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('11000'); }else { premiumAmt = premiumAmt; }
            if(($('#SIM_structure').is(":checked") == true && $('#hme_property_ownership').val() == 'Owned') || ($('#uniform-SIM_structure span').attr('class') == 'checked' && $('#hme_property_ownership').val() == 'Owned')){ premiumAmt = Number(premiumAmt) + Number('5369'); }else { premiumAmt = premiumAmt; }
            $('#lms_est_premium').val(premiumAmt);
            break;
         case '5000000':
            var premiumAmt = 16000;
			
            if(($('#valuables').is(":checked") ===  true) || ($('#uniform-valuables span').attr('class') == 'checked')){
				
				premiumAmt = Number(premiumAmt) + Number('17000'); 
				} else { premiumAmt = premiumAmt; }
            if(($('#SIM_PEE').is(":checked") === true) || ($('#uniform-SIM_PEE span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('12000'); }else { premiumAmt = premiumAmt; }
            if(($('#SIM_structure').is(":checked") === true && $('#hme_property_ownership').val() == 'Owned') || ($('#uniform-SIM_structure span').attr('class') == 'checked' && $('#hme_property_ownership').val() == 'Owned')){ premiumAmt = Number(premiumAmt) + Number('7021'); }else { premiumAmt = premiumAmt; }
            $('#lms_est_premium').val(premiumAmt);
            break;
         case '7500000':
            var premiumAmt = 20000;
            if(($('#valuables').is(":checked") === true) || ($('#uniform-valuables span').attr('class') == 'checked')){ 
			premiumAmt = Number(premiumAmt) + Number('23000'); } else { premiumAmt = premiumAmt; }
            if(($('#SIM_PEE').is(":checked") === true) || ($('#uniform-SIM_PEE span').attr('class') == 'checked')){ premiumAmt = Number(premiumAmt) + Number('15000'); }else { premiumAmt = premiumAmt; }
            if(($('#SIM_structure').is(":checked") === true && $('#hme_property_ownership').val() == 'Owned') || ($('#uniform-SIM_structure span').attr('class') == 'checked' && $('#hme_property_ownership').val() == 'Owned')){ premiumAmt = Number(premiumAmt) + Number('8260'); }else { premiumAmt = premiumAmt; }
            $('#lms_est_premium').val(premiumAmt);
            break;
      }

   }