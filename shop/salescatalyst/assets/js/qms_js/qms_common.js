    $(document).ready(function() { 
         
        $(document).on('click', '.send_quote', function() {


            var orderId = $('#order_id').val();
            var quoteId = $('#quote_id').val();
            var emailId = $('#email_id').val();
            var quoteType = $('#quote_type').val();
            var custName = $('#cust_name').val();

            var webUbrl = $('#web_url').val();
            
            $("#load_model").click();
            var URL = webUbrl+'Commoncontrol/sendQuoteByQuoteId/';
            $.ajax({
  
                url : URL,
                type : 'POST',
                data : {    'orderId' : orderId,
                            'quoteId' : quoteId, 
                            'emailId': emailId,
                            'quoteType': quoteType,
                            'custName': custName
                        },
                dataType:'json',
                success: function(data){
                    
                    if(data == 'Success'){
                        alert('Quote send successfully');
                        $("#closeModel").click(); 
                    } else {
                        alert('Some thing went wrong! Please try again..');
                        $("#closeModel").click();
                    }
                    
                    // ìf(data === 'Success'){
                    //     alert('Quote send succesfully'); 
                    //     //$("#closeModel").click();
                    // } else {
                    //     alert('Some thing went wrong');
                    //     //$("#closeModel").click();
                    // }
                   
                },
            }); //$.ajax({ ends here 
        });
    }); 