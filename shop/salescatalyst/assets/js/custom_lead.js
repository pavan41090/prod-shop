    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) { });
    	
    $(document).on('click', '#get_leads_date', function() {
    	alert('fdsfsd'); 	

    	$(document).ready(function(){  


 
        var accessKey = 'u$r3c4de58f6a402ca29db52c2428a78049';
        var secretKey = '56c63ad69633990d029bdfe874bba1d9809b2d87'; 
        var prospect_id = '238b9d35-478a-4a2b-820f-e8650677a19a'; 
       	var leadString = '{"Parameter":{"FromDate":"2018-02-08 02:00:00","ToDate":"2018-02-09 02:20:00","LookupName": "	","LookupValue": "1"},"Columns":{"Include_CSV":"ProspectID,FirstName,LastName,EmailAddress,ProspectStage"},"Paging":{"PageIndex":1,"PageSize":100}}';
              
            $.ajax({

            	
              url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Leads.Get?accessKey='+accessKey+'&secretKey='+secretKey,
              //url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Leads.RecentlyModified?accessKey='+accessKey+'&secretKey='+secretKey,
                dataType: 'json',
                type: 'post',       
                contentType: 'application/json',
                data: leadString,
                processData: false,
                success: function( data){

                	var dataArray =  JSON.stringify(data);
                    var parsedArray = JSON.parse(dataArray);
                    
                    var leadsCount = parsedArray.RecordCount;
                    var leadsArray = parsedArray.Leads;


					var squares = new Array();
					for(var i = 0; i <= leadsCount-1; i++)
					{
					    squares[i] = new Array();
					    //console.log(leadsArray[0].LeadPropertyList[0].Value);	
					    //var ProspectID = leadsArray[i].LeadPropertyList[0].Value;
					    
					    for(var j = 0 ; j <= 5; j++)
					    	
					        //if (squares[i] == null)
					        //    squares[i] = j;
					        //else
					            squares[i].push(leadsArray[i].LeadPropertyList[j].Value);
					}

					$('#example').DataTable( {
				        data: squares,
				        columns: [
				            { title: "ProspectID" },
				            { title: "FirstName" },
				            { title: "LastName" },
				            { title: "EmailAddress." },
				            { title: "ProspectStage" },
				            { title: "Salary" }
				        ]
					});
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    // $('#load_modal').click();

                    // var dataArray =  JSON.stringify(jqXhr);
                    // var jsonArray = JSON.parse(dataArray);
                    // var statusResponse = JSON.parse(jsonArray.responseText).Status;
                    // var ExceptionType = JSON.parse(jsonArray.responseText).ExceptionMessage;
                    // alert(statusResponse+' - '+ExceptionType);
                    // $("#closeModel").click();

                }
            });
               




        });   

    });	

