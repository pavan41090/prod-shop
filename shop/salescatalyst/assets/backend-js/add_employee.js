    var app = angular.module('plunker', ['ngMessages']);
    
app.controller('MainCtrl',function($scope,$http,$timeout) {
        $scope.formData = {};
       $scope.isHdfcAV={};
       
 //$scope.sample=[{id:"bmw",name:"bmw"},{id:"Mercedes",name:"Mercedes"}, {id:"Honda",name:"Honda"}];
    $scope.channelList=['Phone Banking','DT','VRM','COP','Prime','Unified Outbound','Others '];
    $scope.locationlist=['Ahmedabad','Bangalore','Chennai','Delhi','Hyderabad','Kolkata','Mumbai',
    'Pune','Cochin','Lucknow','Mohali','Chandigarh','Indore','Coimbatore','Jaipur'];
     $scope.test;
    
   //  $scope.log=$log;

// $scope.log($scope.test);

function loadSupervisors(){
    var webUbrl = $('#web_url').val();
	var userchannel = $('#user_channel option:selected').val();
	
	var channelObj = new Object();
	channelObj.channelname = userchannel;
			$.ajax({
              url : webUbrl+'User/getSupervisorList',
               type : 'POST',
               data : $.param( channelObj ),
               dataType:'json',
               success: function( data){
                  //var jsonD=JSON.parse(data);
                  $timeout(function(){
                    $scope.supervisorList=data;
                    $scope.user_supervisor='';
                    $scope.user_supervisor2='';
                    $scope.user_supervisor3='';
                  },0)
                  
               }

            });
   }

   loadSupervisors();

              $scope.changedValu=function(item){
				  $scope.test=item;
				  loadSupervisors();
				  }


  $scope.onUserTypeChange = function(){

    if($scope.usr_type_id.trim()=="HDFC AV" || $scope.usr_type_id.trim()=="Report" ){
        $scope.showSupervisor=true;
    }else{
        $scope.showSupervisor=false;
    }

    if($scope.usr_type_id.trim()=="Report"){
      $scope.supervisorList.unshift({"emp_id":"-1","user_name":"All","emp_name":"All"});
      $scope.channelList.unshift("All");
      $scope.locationlist.unshift("All");
 
    
    }else{
      var index=-1;
      for(var i=0;i<$scope.supervisorList.length;i++){
        if($scope.supervisorList[i].emp_id=="-1"){
          index=i;
          break;
        }
      }

      if(index>=0){
        $scope.supervisorList.splice(index,1);
      }
      var allIndex=$scope.channelList.indexOf("All");
      if(allIndex>-1){
        $scope.channelList.splice(allIndex,1);
      }

      var locationIndex = $scope.locationlist.indexOf("All");
      if(locationIndex>-1){
        $scope.locationlist.splice(locationIndex,1);
   }   
    }
  }

  $scope.pset = function(){

      var x = angular.element(document.getElementById("user_channel"));      
			$scope.textbox = x.val();			
			var supervisorChange = $scope.supervisorChange();
			var usr_type_id = $('#usr_type_id').val();
			if( usr_type_id != null || usr_type_id != undefined){
				if(usr_type_id.trim() == 'HDFC AV' || usr_type_id.trim() == 'Report'){
				var supervisor_id = $('#user_supervisor').val();
				if(supervisor_id.length == 0){
					$('#supervisor-error div').html('').append('Please Select a supervisor');
					return false;
				}
			}
			}
			if(supervisorChange !=  undefined && supervisorChange == false){
				return false;
			}
        var web_url = $('#web_url').val();
        if ($scope.userprofile.$valid) {
		
            $("#load_model").show();
            var employeeId = $('#employeeId').val();
            var emp_code = $scope.emp_code;
            var user_name = $scope.user_name;
            var user_email =$scope.user_email;
            var user_empname =$scope.user_empname;
            var mobileuser =$scope.mobileuser;
            
            var user_state = $scope.user_state;
            var user_city = $scope.user_city;                                            
            var user_pwd = $scope.user_pwd;
            var user_imd_code = $scope.user_imd_code;
            var user_bank_verifier_id = $scope.user_bank_verifier_id;
            var user_staff_code = $scope.user_staff_code;
            var user_branch = $scope.user_branch;
            var user_channel = $scope.user_channel;
            var user_location = $scope.user_location;
            
            var supervisor_id2=$scope.user_supervisor2.emp_id;
            var supervisor_id3=$scope.user_supervisor3.emp_id;
            var opt_user_type = $('option[value="'+usr_type_id+'"]');
            var id_usr_type = opt_user_type.length ? opt_user_type.attr('id') : 'NO OPTION';
            var opt_user_channel = $('option[value="'+user_channel+'"]');
           
                var paramsArray  = {
                                    "emp_code": emp_code,
                                    "user_name": user_name,
                                    "user_email": user_email,
                                    "user_empname": user_empname,
                                    "mobileuser": mobileuser,
                                    "usr_type_id": id_usr_type,
                                    "user_state": user_state,
                                    "user_city": user_city,
                                    "user_pwd": user_pwd,
                                    "user_imd_code": user_imd_code,
                                    "user_bank_verifier_id": user_bank_verifier_id,
                                    "user_staff_code": user_staff_code,
                                    "user_branch": user_branch,
                                    "user_channel" : user_channel,
                                    "user_location":user_location,
                                    "supervisor_id":supervisor_id,
                                    "supervisor_id2":supervisor_id2,
                                    "supervisor_id3":supervisor_id3     
                    }

				var url = web_url+"Backend/addEmployeeByAngular";
				
				$http({
					url : url,
					method : 'POST',
					cache : false,
					data : $.param( paramsArray ),
					headers: {'Content-Type': 'application/x-www-form-urlencoded'},
					dataType : 'json'
				}).then(function(resultRes){
					
				var resData = Object(resultRes.data);
				
				if(resData.errorStatus == true){
					
					var messageLength = Object(resData.message);
					var objectKeys = Object.keys(messageLength);
					var ErrorMessageDis='';
					for (var i=0; i<(objectKeys.length); i++){
						ErrorMessageDis += "\n";
						ErrorMessageDis += messageLength[objectKeys[i]];
						ErrorMessageDis += "\n";
					}
					$('#myModal').hide();
					alert(ErrorMessageDis);
					return false;
					
				} else {
					if(resData.status == true){
					alert(resData.message);
					window.location.href = web_url + "users-list";
					}
				}
				},function(ErrorMessage){
				});
               
            }
        };

$scope.supervisorChange = function(){
	
	var firstsupervisor = $('#user_supervisor').val();
	var twosupervisor = $('#user_supervisor2').val();
	var threesupervisor = $('#user_supervisor3').val();
	
	if((firstsupervisor.length > 0 && twosupervisor.length > 0) && (firstsupervisor === twosupervisor)){
		alert('Supervisor 1 and 2 same plase change!');
		return false;
	} else if((firstsupervisor.length > 0 && threesupervisor.length > 0) && (firstsupervisor === threesupervisor)){
		alert('Supervisor 1 and 3 same plase change!');
		return false;
	} else if((twosupervisor.length > 0 && firstsupervisor.length > 0) && (twosupervisor === firstsupervisor)){
		alert('Supervisor 1 and 2 same plase change!');
		return false;
	} else if((twosupervisor.length > 0 && threesupervisor.length > 0) && (twosupervisor === threesupervisor)){
		alert('Supervisor 2 and 3 same plase change!');
		return false;
	} else if((threesupervisor.length > 0 && firstsupervisor.length > 0) && (threesupervisor === firstsupervisor)){
		alert('Supervisor 1 and 3 same plase change!');
		return false;
	} else if((threesupervisor.length > 0 && twosupervisor.length > 0) && (threesupervisor === twosupervisor)){
		alert('Supervisor 2 and 3 same plase change!');
		return false;
	}
}

});





 

   jQuery(document).ready(function() { 
    //alert('Page Loaded...');
    $("#user_state").on('change', function() {
        var state_id = $(this).val();
        var opt_stt = $('option[value="'+state_id+'"]');
        var stt_id = opt_stt.length ? opt_stt.attr('id') : 'NO OPTION';
        updateCityDropDown(stt_id,'');
    });    
});


    function updateCityDropDown(stt_id,type){

        var webUbrl = $('#web_url').val();
        var URL = webUbrl+'Commoncontrol/getCityByStateID/';
        $.ajax({

            url : URL,
            type : 'POST',
            data : {'state_id' : stt_id},
            dataType:'json',
            success: function( data){
                if(type !== 'default') {
                    $('#city-div').hide();      
                    $('#city-loader').show();
                    $('#user_city').val('');
                    $("#user_city").attr("placeholder", "Select City");
                }
                $('#city').find('option')
                      .remove()
                      .end()
                      .append('<option value="">Select city</option>')
                      .val('');
                             
                $.each(data, function(key, value) {
                    $('#city').append($("<option></option>")
                               .attr("value",value['id'])
                               .text(value['name']));

                            
                });  
                setTimeout(function(){ 
                    $('#city-div').show();      
                    $('#city-loader').hide();
                    $('#user_city').focus();
                }, 1500); 
            },
        });
    }
