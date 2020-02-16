	var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http) {
        $scope.formData = {};
        // $scope.submitForm = function() {
        
        $scope.policyType = '0';
        $scope.Type_of_Trip = '0'; 
        $scope.covertype = '0';
		$scope.maxpertrip='0';
		
        $scope.pset = function(){
          // alert('inside sscope');
           
           // if ($scope.quoteTravel.$valid) {

               // $("#load_model").click();

                var policyType = $scope.policyType;
				var TypeofTrip =$scope.typeoftrip
				var departdate =$scope.departdate
				var returndate =$scope.returndate
				var tripduration =$scope.tripduration
				var covertype =$scope.covertype
				var maxpertrip =$scope.maxpertrip
				var traveltype =$scope.traveltype
				var geographical =$scope.geographical
				var relationship =$scope.relationship
				var datebirth =$scope.datebirth
				var age =$scope.age
				var relationship1 =$scope.relationship1
				var spouse =$scope.spouse
				var age1 =$scope.age1
				var relationship2 =$scope.relationship2
				var child =$scope.child
				var age2 =$scope.age2
				var emailtravel =$scope.emailtravel
				var mobiletravel =$scope.mobiletravel


                 var travel_mx_Category = $scope.travel_mx_Category;
                var travel_mx_Line_of_Business = $scope.travel_mx_Line_of_Business;
                var travel_mx_HDFC_Branch_Location = $scope.travel_mx_HDFC_Branch_Location;
                var travel_mx_HDFC_Ergo_Location = $scope.travel_mx_HDFC_Ergo_Location;                                            
                var travel_mx_Priority = $scope.travel_mx_Priority;
                var travel_mx_Target_Date = $scope.travel_mx_Target_Date;
                var travel_mx_TSE_BDR_Code = $scope.travel_mx_TSE_BDR_Code;
                var travel_mx_TL_Code = $scope.travel_mx_TL_Code;
                var travel_mx_SM_Code = $scope.travel_mx_SM_Code;
                var travel_mx_Bank_Verifier_ID = $scope.travel_mx_Bank_Verifier_ID; 
                var travel_mx_Payment_Type = $scope.travel_mx_Payment_Type;
                var travel_mx_Sub_Channel = $scope.travel_mx_Sub_Channel;
                var travel_mx_HDFC_Card_Relationship_No = $scope.travel_mx_HDFC_Card_Relationship_No;
                var travel_mx_HDFC_Card_Last_4_digits = $scope.travel_mx_HDFC_Card_Last_4_digits;
                var travel_FirstName = $scope.travel_FirstName;
                var travel_LastName = $scope.travel_LastName;
                var travel_dob = $scope.travel_dob; 
                var travel_mx_Customer_Gender = $scope.travel_mx_Customer_Gender;
                var travel_mx_Case_id = $scope.travel_mx_Case_id;
                var travel_mx_PAN_Card = $scope.travel_mx_PAN_Card;
                var travel_mx_Street1 = $scope.travel_mx_Street1;
                var travel_mx_Street2 = $scope.travel_mx_Street2;
                var travel_mx_Area = $scope.travel_mx_Area;
                var travel_mx_City = $scope.travel_mx_City;
                var travel_mx_State = $scope.travel_mx_State;
                var travel_mx_Zip = $scope.travel_mx_Zip;
                var travel_Notes = $scope.travel_Notes;       
                var emailtravel = $scope.emailtravel;
                var mobiletravel = $scope.mobiletravel;
                var policytypetravel = $scope.policytypetravel;
				
				var paramsArray  = {"policyType": policyType,
                                    "TypeofTrip": TypeofTrip,
                                    "departdate": departdate,
                                    "returndate": returndate,
                                    "tripduration": tripduration,
                                    "covertype": covertype,
                                    "maxpertrip": maxpertrip,
                                    "traveltype": traveltype,
                                    "geographical": geographical,
                                    "relationship": relationship,
                                    "datebirth": datebirth,
                                    "age": age,
                                    "relationship1": relationship1,
                                    "spouse": spouse,
                                    "age1": age1,
                                    "relationship2": relationship2,
									"child": child,
									"age2": age2,
									"emailtravel": emailtravel,
									"mobiletravel": mobiletravel,


                                     "travel_mx_Category": travel_mx_Category,
                                    "travel_mx_Line_of_Business": travel_mx_Line_of_Business,
                                    "travel_mx_HDFC_Branch_Location": travel_mx_HDFC_Branch_Location,
                                    "travel_mx_HDFC_Ergo_Location": travel_mx_HDFC_Ergo_Location,
                                    "travel_mx_Priority": travel_mx_Priority,
                                    "travel_mx_Target_Date": travel_mx_Target_Date,
                                    "travel_mx_TSE_BDR_Code": travel_mx_TSE_BDR_Code,
                                    "travel_mx_TL_Code": travel_mx_TL_Code,
                                    "travel_mx_SM_Code": travel_mx_SM_Code,
                                    "travel_mx_Bank_Verifier_ID": travel_mx_Bank_Verifier_ID,
                                    "travel_mx_Payment_Type": travel_mx_Payment_Type,
                                    "travel_mx_Sub_Channel": travel_mx_Sub_Channel,
                                    "travel_mx_HDFC_Card_Relationship_No": travel_mx_HDFC_Card_Relationship_No,
                                    "travel_mx_HDFC_Card_Last_4_digits": travel_mx_HDFC_Card_Last_4_digits,
                                    "travel_FirstName": travel_FirstName,
                                    "travel_LastName": travel_LastName,
                                    "travel_dob": travel_dob,
                                    "travel_mx_Customer_Gender": travel_mx_Customer_Gender,
                                    "travel_mx_Case_id": travel_mx_Case_id,   
                                    "travel_mx_PAN_Card": travel_mx_PAN_Card,
                                    "travel_mx_Street1": travel_mx_Street1,
                                    "travel_mx_Street2": travel_mx_Street2,
                                    "travel_mx_Area": travel_mx_Area,
                                    "travel_mx_City": travel_mx_City,
                                    "travel_mx_State": travel_mx_State,
                                    "travel_mx_Zip": travel_mx_Zip,
                                    "travel_Notes": travel_Notes,
                                    "emailtravel": emailtravel,
                                    "mobiletravel": mobiletravel,
                                    "policytypetravel": policytypetravel      
                                
                    }

           

                    var url = "http://localhost/bhartiAXA-NEW/quoteTravel/calculatePremiumTravel/";

                    $http.get(url,{params:paramsArray}).then( function(response) {
                   // alert('got');    
                    var redirectUrl = 'http://localhost/bhartiAXA-NEW/travel-premium/'
                    window.location.href = redirectUrl;
                });
        };


 

    });


// $('#saveLead').click(function(){

// alert('313212');

// })



/*

   app.controller('MainCtrlRe', function($scope,$http) {
              alert('in ctrl');   

        $scope.formData = {};
        // $scope.submitForm = function() {
        $scope.voluntaryDeductible = '0';
        $scope.driverLibillity = 'false';
        $scope.restrictTPPDCover = 'false';
      


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
   */
	
	