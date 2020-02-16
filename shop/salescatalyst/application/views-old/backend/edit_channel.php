 <script>
var app = angular.module('plunker', ['ngMessages']);
    
app.controller('channelCtrl',function($scope,$http,$timeout) {
  $http.get("/salescatalyst/Backend/getAllChannels/").then(function(data){
      
      var temp=[];
      angular.forEach(data.data,function(v){
        var isEnabled=v.enableSupervisor=="y";
        var channel={
          name:v.name,
          enableSupervisor:isEnabled
        };
        temp.push(channel);
      });
      $scope.channelList=temp;
  });

  $scope.submitUpdate  = function(){
    var temp=[];
      angular.forEach($scope.channelList,function(v){
        var isEnabled=v.enableSupervisor?"y":"n";
        var channel={
          name:v.name,
          enableSupervisor:isEnabled
        };
        temp.push(channel);
      });
      console.log(temp);
      $http.post("/salescatalyst/Backend/updateChannels/",temp,{headers: {'Content-Type': 'application/json'} }).then(function(data){
		  alert('Information updated successfully!');
		  return false;
      });
  };
});
 </script>
 <div ng-app="plunker" class="container-fluid" ng-controller="channelCtrl">
    <div class="row">
      <div class="col-md-12">
         <div class="portlet box gray-gray">
            <div class="portlet-body planbox backend-mainbg">
                <div class="row maincontf planClass">
                   <div class="col-md-1">&nbsp;</div>
                   <div class="col-md-2 colorHeader">
                    Product
                   </div>
                   <div class="col-md-2 text-center colorHeader">
                    Enable Supervisor
                   </div>
                 </div>
                 <div class="row" ng-repeat="channel in channelList">
                   <div class="col-md-1">&nbsp;</div>
                   <div class="col-md-2 customPadding productFont">
                    {{channel.name}}
                   </div>
                   <div class="col-md-2 text-center customPadding">
                    <input type="checkbox" ng-model="channel.enableSupervisor">
                   </div>
                 </div>
                 <div class="row" >
                 <div class="col-md-1">&nbsp;</div>
                  <div class="col-md-2 customPadding">
                  <button type="button" name="submit" ng-click="submitUpdate()" class="btn blue btn-default">Update</button>
                  </div>
                 </div>
                 
            </div>
          </div>
      </div>
    </div>
 </div>
 <style>
.colorHeader{
  font-weight: bold;
  color:#5f85ce;
}
.tableHeader{
      padding: 10px 0px;
    border-bottom: 1px dashed #b5b3b3;
}
.customPadding{
  padding: 15px
}
.productFont{
  color:black;
}
</style>

