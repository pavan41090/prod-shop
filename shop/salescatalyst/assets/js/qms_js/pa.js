    var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
         $scope.pa_include_child = '0';


        quotepa.setAttribute( "autocomplete", "off" );
        $scope.pset = function(){
           
            var web_url = $('#web_url').val();
           
            if ($scope.quotepa.$valid) {

                $("#load_model").click();

                var pa_spouse = '0';
                var pa_spouse_dob = '';
                if ($('#pa_spouse').is(":checked")) {   
                  pa_spouse = '1';
                  var pa_spouse_dob = $scope.pa_spouse_dob;
                }
                 
                var pa_first_name = $scope.pa_first_name;
                var pa_last_name = $scope.pa_last_name;
                var pa_dob =$scope.pa_dob;
                var pa_state =$scope.pa_state;
                var pa_city =$scope.pa_city;
                var pa_mobile =$scope.pa_mobile;
                var pa_email = $scope.pa_email;
                var pa_occupation = $scope.pa_occupation;
                var pa_gainful = $scope.pa_gainful; 
                var pa_include_child=$scope.pa_include_child;
                var pa_zip=$scope.pa_zip;


                var opt_occupation = $('option[value="'+pa_occupation+'"]');
                var pa_occupation_id = opt_occupation.length ? opt_occupation.attr('id') : 'NO OPTION';



               var paramsArray  = { "pa_first_name": pa_first_name,
                                    "pa_last_name": pa_last_name,
                                    "pa_dob": pa_dob,
                                    "pa_state": pa_state,
                                    "pa_city": pa_city,
                                    "pa_mobile": pa_mobile,
                                    "pa_email": pa_email,
                                    "pa_occupation": pa_occupation_id,
                                    "pa_gainful": pa_gainful,
                                    "pa_spouse"  :pa_spouse,                                         
                                    "pa_spouse_dob":pa_spouse_dob,
                                    "pa_include_child":pa_include_child,
                                    "pa_zip":pa_zip,

                    }

               
                var url = web_url+"Quotepa/qmsCalculatePremiumpa/";
                $http.get(url,{params:paramsArray}).then( function(response) {
                                       
                if(response.data == 'success') {
                    alert('Succesfully posted values');
                    var redirectUrl = web_url+'qms-pa-premium/'
                    window.location.href = redirectUrl;
                } else {
                    
                    $("#closeModel").click();
                    alert('Some thing went wrong, Please try again. ')
                }                     


                });


            }
        };

    });





   app.controller('MainCtrlRe', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        $scope.voluntaryDeductible = '0';
        $scope.driverLibillity = 'false';
        $scope.restrictTPPDCover = 'false';
      

        // $scope.psetRecalculate = function(){
 
           
        //     var voluntaryDeductible = $scope.voluntaryDeductible;
        //     var driverLibillity = $scope.driverLibillity;
        //     var restrictTPPDCover = $scope.restrictTPPDCover;
            
        //    // alert(voluntaryDeductible); 
        //    // alert('am in re..');

        //         $("#load_model").click();


        //         var paramsArray  = {"voluntaryDeductible": voluntaryDeductible,
        //                              "driverLibillity": driverLibillity,
        //                              "restrictTPPDCover": restrictTPPDCover
                                
        //         }



        //         var url = "http://localhost/bhartiAXA-NEW/quotepa/calculatePremiumpa/";

        //         $http.get(url,{params:paramsArray}).then( function(response) {
                   
        //              console.log(response.data);
        //              var redirectUrl = 'http://localhost/bhartiAXA-NEW/pa-premium/'
        //              window.location.href = redirectUrl;
        //         });


          
        // };



 $scope.saveLead = function(){

            alert('leads');   


            var leadString = $('#leadString').val();
            alert(leadString); 
            $('#load_modal').click();
            $.ajax({
              url: 'https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Create?accessKey=u$r3c4de58f6a402ca29db52c2428a78049&secretKey=56c63ad69633990d029bdfe874bba1d9809b2d87',
                dataType: 'json',
                type: 'post',       
                contentType: 'application/json',
                data: leadString,
                processData: false,
                success: function( data){
                    var dataArray =  JSON.stringify(data);
                    var parsedArray = JSON.parse(dataArray);
                    var statusResponse = parsedArray.Status;
                    var ProspectId = parsedArray.Message.Id
                    alert (statusResponse +' Refrence Id is : '+ ProspectId);
                    $('#ProspectId').val(ProspectId);
                    //$( "#re-calculate" ).trigger( "click" );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    $('#load_modal').click();

                    var dataArray =  JSON.stringify(jqXhr);
                    var jsonArray = JSON.parse(dataArray);
                    var statusResponse = JSON.parse(jsonArray.responseText).Status;
                    var ExceptionType = JSON.parse(jsonArray.responseText).ExceptionMessage;
                    alert(statusResponse+' - '+ExceptionType);

                }
            });
                        

           // $scope.reCalculate();



        }    

 

    });