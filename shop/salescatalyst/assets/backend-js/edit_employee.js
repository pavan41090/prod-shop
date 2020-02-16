	var app = angular.module('plunker', ['ngMessages']);
    app.controller('MainCtrl', function($scope,$http,$timeout) {
        $scope.formData = {};

        var web_url = $('#web_url').val();
        var employeeId = $('#employeeId').val();
        $scope.channelList=['All','Phone Banking','DT','VRM','COP','Prime','Unified Outbound','Others '];
        $scope.locationlist=['All','Ahmedabad','Bangalore','Chennai','Delhi','Hyderabad','Kolkata','Mumbai',
        'Pune','Cochin','Lucknow','Mohali','Chandigarh','Indore','Coimbatore','Jaipur'];


function loadSupervisors(){
	
    var webUbrl = $('#web_url').val();
	var userchannel = $scope.user_channel || $('#user_channel option:selected').val();
	
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
                    $scope.supervisorList.unshift({"emp_id":"-1","user_name":"All","emp_name":"All"});
                    //$scope.user_supervisor=$scope.supervisorList[0];
                    var found=false;

                    if($scope.sup_id){
                        angular.forEach($scope.supervisorList,function(v){
                            //added by rajitha

                            if(v.emp_id==$scope.sup_id){
                                $scope.user_supervisor=v;
                                found=true;
                            }

                            if(v.emp_id==$scope.supervisortwo){

                                $scope.user_supervisor2=v;
                                found=true;
                            }

                            if(v.emp_id==$scope.supervisorthree){
								
                                $scope.user_supervisor3=v;
                                found=true;
                            }

                        });
                    }
                    if(!found){
                        $scope.user_supervisor='';
                    }
                     $scope.onUserTypeChange($scope.usr_type_id);
                    
                  },0)
                  
               }

            });
   }

   $scope.onUserTypeChange = function(utype){
   
    

    if(utype.trim()=="HDFC AV" || utype.trim()=="Report" ){

        $scope.showSupervisor=true;
    }else{
      $scope.showSupervisor=false;
    }

    var index=-1;
      for(var i=0;i<$scope.supervisorList.length;i++){
        if($scope.supervisorList[i].emp_id=="-1"){
          index=i;
          break;
        }
      }
    var allIndex=$scope.channelList.indexOf("All");
    var locationIndex = $scope.locationlist.indexOf("All");
    if(utype.trim()=="Report"){
        if(index<0){
                   $scope.supervisorList.unshift({"emp_id":"-1","user_name":"All","emp_name":"All"});
        }
   
   if(allIndex<0){
          $scope.channelList.unshift("All");
   }
    if(locationIndex<0){

      $scope.locationlist.unshift("All");
    }
      
    
    }else{

      if(index>=0){
        $scope.supervisorList.splice(index,1);
      }
      
      if(allIndex>-1){
        $scope.channelList.splice(allIndex,1);
      }

      
      if(locationIndex>-1){
        $scope.locationlist.splice(locationIndex,1);
      }


      
    }
  }



           
//        alert(employeeId);

$scope.loadData=function(){
            var paramsArray  = {"employeeId" : employeeId};
        
        var url = web_url+"Backend/getEmployeeDetailById";
            $http.get(url,{params:paramsArray}).then( function(response) {
				
                if(response.data['user_status'] == 1){
                    var userStatus = 'Active';
                } else {
                    var userStatus = 'In Active';
                }
               
            $scope.emp_code = response.data['emp_code'];
            $scope.user_name = response.data['user_name'];
            $scope.user_email = response.data['email_address'];
            $scope.mobileuser = response.data['mobile_number'];
            $scope.user_empname = response.data['emp_name'];
            $scope.usr_type_id = response.data['usr_type_name'];

            $scope.user_location = response.data['user_location'];
            $scope.sup_id=response.data['supervisor_id'];
            $scope.user_imd_code=response.data['imdcode'];
            $scope.user_bank_verifier_id=response.data['bankverificationid'];
            $scope.user_staff_code=response.data['staffcode'];
            $scope.user_branch=response.data['userstaff'];

            $scope.supervisortwo=response.data['supervisor_id2'];
            $scope.supervisorthree=response.data['supervisor_id3'];
            $scope.user_channel=response.data['channel'];

            $scope.usr_status = userStatus;
            //$scope.user_location = response.data['loc_name'];
           // $scope.user_designation = response.data['des_name'];
            $scope.user_state = response.data['state'];
            $scope.user_city = response.data['city'];
            //$scope.user_region = response.data['region_name'];

            var opt_stt = $('option[value="'+response.data['state']+'"]');
            var stt_id = opt_stt.length ? opt_stt.attr('id') : 'NO OPTION';
            updateCityDropDown(stt_id,'default');
			//$(document).ready(function(){
			loadSupervisors();
			//});
			});   
        };

  $scope.loadData();
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

    $scope.changedValu=function(item){
				  $scope.test=item;
				  loadSupervisors();
				  }      
       
$scope.pset = function(){
			
			var supervisorChange = $scope.supervisorChange();
			var usr_type_id = $('#usr_type_id').val();
			if( usr_type_id != null || usr_type_id != undefined){
				
			if(usr_type_id.trim() == 'HDFC AV' || usr_type_id.trim() == 'Report'){
				
				var supervisor_id = $('#user_supervisor').val();
				
				if(supervisor_id.length == 0){
					alert('Please Select a supervisor');
					return false;
				}
				
			}
			
			}
			
			if( supervisorChange != undefined && supervisorChange == false){
				return false;
			}
          
            if ($scope.userprofile.$valid) {
                
                $("#load_model").show();
                
                var employeeId = $('#employeeId').val();
                var emp_code=$scope.emp_code;
                var user_name= $('#user_name').val();
                var user_email=$scope.user_email;
                var user_empname =$scope.user_empname;
                var mobile_user =$scope.mobileuser;
                var user_state =$scope.user_state;
                var user_city =$scope.user_city;

                var opt_user_type = $('option[value="'+usr_type_id+'"]');
                var id_usr_type = opt_user_type.length ? opt_user_type.attr('id') : 'NO OPTION';
        
                var usr_status =$scope.usr_status;
                var opt_user_status = $('option[value="'+usr_status+'"]');
                var usr_status_id = opt_user_status.length ? opt_user_status.attr('id') : 'NO OPTION';    
               
                var user_location = $scope.user_location;
                var user_imd_code = $scope.user_imd_code;
                var user_bank_verifier_id = $scope.user_bank_verifier_id;
                var user_staff_code = $scope.user_staff_code;
                var user_branch = $scope.user_branch;

                var supervisor_id2=($('#user_supervisor2').val() ? $('#user_supervisor2').val() : 0);
                var supervisor_id3=($('#user_supervisor3').val() ? $('#user_supervisor3').val() : 0);
                var channel=$scope.user_channel;
                
                var paramsArray  = {"userId" : employeeId,
                                    "emp_code" : emp_code,
                                    "user_name" : user_name,
                                    "user_email" : user_email,
                                    "user_empname" : user_empname,
                                    "mobile_user": mobile_user,
                                    "user_imd_code": user_imd_code,
                                    "user_bank_verifier_id": user_bank_verifier_id,
                                    "user_staff_code": user_staff_code,
                                    "user_branch": user_branch,
                                    "user_state": user_state,
                                    "user_city": user_city,
                                    "usr_type_id": id_usr_type,
                                    "usr_status_id": usr_status_id,
                                    "user_location":user_location,
                                    "supervisor_id":supervisor_id,
                                    "supervisor_id2":supervisor_id2,
                                    "supervisor_id3":supervisor_id3,
                                    "channel":channel
                                    
                    }

                    var url = web_url+"Backend/updateEmployee";
					
					$http({
						url : url,
						method : 'POST',
						cache : false,
						data : $.param( paramsArray ),
						dataType : 'json',
						headers: {'Content-Type': 'application/x-www-form-urlencoded'}
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
					},function(ErrorMesage){
					});

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




    $("#update_password").on('click', function() {
        var employeeId = $('#employeeId').val();
        var pwd = $('#user_pwd').val();
        var confPass = $('#user_con_pwd').val();
        if(pwd == ''){
            alert('Please enter the password');
            $('#user_pwd').focus();
            return false;
        } else if(confPass == ""){
           alert('Please confirm enter the password');
           $('#user_con_pwd').focus();
           return false;
        }

        if(pwd !== confPass){
            alert('Confirm Password should match with Password');
            $('#user_con_pwd').val("");
        } else {
            var webUbrl = $('#web_url').val();
            var URL = webUbrl+'Backend/updatePasswordByAdmin';
            $.ajax({
                url : URL,
                type : 'POST',
                data : {'confPass' : confPass, 'user_id': employeeId},
                dataType:'html',
                success: function(data){
                    alert('Password has been successfully updated');
                    setTimeout(function(){  $('#close-button').click(); }, 1000); 
                },
            });
        } 
        
    });    
});

    function updateCityDropDown(stt_id,type){

        var webUbrl = $('#web_url').val();
        var URL = webUbrl+'Commoncontrol/getCityByStateID';

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
                }, 1500); 
            },
        });
    }





    
