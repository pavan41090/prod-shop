<script>
  let appname = angular.module('plunker',['ngMessages']);
  let __pathname = '<?php echo base_url(); ?>';
  appname.directive('leadAdminExcelUploader',function(){
    return{
      restrict : 'AE',
      link : function(scope,element,attr){
        element.on('submit',function(){
          let _parentThis = $(this);
          scope.createLeadSubmit(_parentThis);
        });
      },
        controller : function($scope,$http){

          let __parentUplaoder = $('#processing-bar-limit');
          $scope.fileCountInsert = function(resCount,upload_path,startCount){
            $scope.cmdInserting(resCount,upload_path,startCount);
          }

          $scope.cmdInserting = function(resCount,upload_path,startCount){
            try{
              let startObj = new Object();
              startObj.startCount = startCount;
              startObj.uploadpath = upload_path;
              startObj.resCount = resCount;
              $http({
                      url : __pathname+'admin-lead-doc-data',
                      method : 'POST',
                      cache : false,
                      data : $.param( startObj ),
                      dataType : 'json',
                              processData: false,
                      headers: {
                          "Content-Type": 'application/x-www-form-urlencoded'
                      }
                    }).then(function(responceData){
                      var __xesData = Object(responceData);
                      let _xesCalCount = __xesData.data;
                      let _nextmber = _xesCalCount.nextNumber;
                      let _totalCount = _xesCalCount.totalCount;
                      if(_xesCalCount.nextStatus){
                        $scope.fileCountInsert(_xesCalCount.nextNumber,upload_path,startCount);
                        __parentUplaoder.html('').append('<p><p>Please wait Inserting..</p><p><progress style="width: 100%;" value="'+_nextmber+'" max="'+_totalCount+'"></progress></p></p>');
                      } else {
                        __parentUplaoder.html('').append('<p>Completed!<progress style="width: 100%;" value="'+_nextmber+'" max="'+_totalCount+'"></progress></p>');
                      }
                    },function(Error){
                      console.log("Something went wrong!"+Error.message);
                    });
              } catch(Error){
                console.log("Something went wrong!"+Error.message);
              }

          }
          $scope.createLeadSubmit = function(_thisPolicy){

            try{
            var fileInput = _thisPolicy.find('#lead_excel_uploder')[0];
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('uploadLadDoc', file);
            __parentUplaoder.html('Please wait Uploading is in process');
                  $http({
                    url : __pathname+'admin-excel-upload',
              method : 'POST',
              cache : false,
              data : formData,
              dataType : 'json',
                      processData: false,
              headers: {
                  "Content-Type": undefined
              }
            }).then(function(responceData){
              var __resData = Object(responceData);
              let _resCalCount = __resData.data;
              let _startCount = 1;
              if(_resCalCount.status){
                $scope.fileCountInsert(_startCount,_resCalCount.upload_path,_resCalCount.cellrows);
              }
              __parentUplaoder.html('').append('<p><p>Please wait uploading...</p><p><progress style="width: 100%;" value="50" max="100"></progress></p></p>');

            },function(Error){
              console.log("Something went wrong!"+Error.message);
            });
      
            } catch(Error){
              console.log("Something went wrong!"+Error.message);
            }
          }
        }
    }
  });
</script>
<div class="container-fluid">
   <div class="row">
   <br/>
      <div class="col-md-12">
         <div class="portlet box gray-gray">
            <div class="portlet-body planbox backend-mainbg">
               <div style="color:#000;">
                  <div>
                     <form name="leaedExcelStatus" novalidate lead:Admin:Excel:Uploader>
                        <div class="portlet-title tabbable-line" >
                           <div class="caption leadtit">
                              <div class="alert bold uppercase" id="alert-response"> Upload Excel Sheet </div>
                              <!--                                   <div class="alert alert-danger bold uppercase">Success msg</div>
                                 -->                              
                           </div>
                        </div>
                        <div class="row">
                          <div class="col-md-3"> &nbsp; </div>
                           <div class="col-md-6 text-left">
                              <div class="form-group">
                                 <label>Upload Lead Status Excel
                                 <span class="required"> * </span></label>
                                 <input type="file"  placeholder="Employee Code" class="form-control input-sm" name="lead_excel_uploder" id="lead_excel_uploder" ng-model="lead_excel_uploder" required="">

                                    <div ng-if="userprofile.$submitted || userprofile.lead_excel_uploder.$dirty" ng-messages="userprofile.lead_excel_uploder.$error" role="alert">
                                       <div ng-message="required" class="required">Please Upload Lead Status Excel</div>
                                    </div>
                              </div>
                           </div>
                           <div class="col-md-3"> &nbsp; </div>
                        </div>
                    

                      <div class="row"> &nbsp; </div>
                        <div class="row">
                          <div class="col-md-3">&nbsp;</div>
                           <div class="col-md-6 text-right">
                              <div class="form-group">
                                 <button type="submit" class="btn blue btn-default" ng-click="pset()">Submit</button>
                                 <input type="hidden" id="web_url" value="<?php echo base_url(); ?>">                                       
                              </div>
                           </div>
                         </div>
                        
                     </form>
                     

                     </div> <!-- controller ends here -->
                       <div class="row"> <div id="processing-bar-limit"></div> </div>
                       <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
   </div>
</div>
