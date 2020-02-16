<script src="<?php echo base_url(); ?>assets/backend-js/jquery.min.js"></script> 


<div class="container-fluid">
   <!-- BEGIN PAGE HEADER-->
   <!-- BEGIN THEME PANEL -->
   <!-- END THEME PANEL -->
   <!-- END PAGE HEADER-->
   <div class="row">
   <br/>
      <div class="col-md-12">
         <div class="portlet box gray-gray">
            <div class="portlet-body planbox backend-mainbg">
               <div style="color:#000;">
                  <div>
                     <div class="portlet-title tabbable-line" >
                        <div class="caption leadtit">
                           <div class="alert bold uppercase" id="alert-response" > HDFC Employee's List </div>
                           <!--  <div class="alert alert-danger bold uppercase">Success msg</div> -->                              
                        </div>
                     </div>
                     <div class="col-sm-2"> &nbsp; </div>
                     <div class="col-sm-8">
                     <form name="usersExcel" id="usersExcel">
                     <div class="row form-group" style="text-align: center;">
                     <div class="upload-btn-wrapper">
                     <button class="btn"> Click to Upload Hdfc Users Excel Document</button>
                     <input type="file" name="hdfcfileUpload" class="hdfcfileUpload" id="hdfcfileUpload" />
                     <span id="uploaded-file-name"> &nbsp; </span>
                     </div>
                     </div>
                     <div class="row form-group text-right">
                     <input type="submit" class="btn btn-danger" name="hdfcfilesubmit" id="hdfcfilesubmit" value="Upload">
                     </div>
                     </div>
                     </form>
                     <div>
                     <div class="col-sm-2"> &nbsp; </div>

                     </div>
                  </div>
                  <!-- controller ends here -->
                  <br/>
                  <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> <br/> 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<script>
var checknames = ['xlsx'];
function getUploadFun(_parent){
      if(!_parent[0]){
         return false;
      }
      var getFilename = _parent[0].files[0];
      return getFilename;
}
$(function(){
   $('#hdfcfileUpload').change(function(){
      var uploadDoc = getUploadFun($(this));
      var _uploaderName = $('#uploaded-file-name');
      var fileName = uploadDoc.name;
      _uploaderName.html('').append(fileName);
      var fileformate = fileName.split('.');
      var extensiion = fileformate[fileformate.length-1];
      if(checknames.indexOf(extensiion) != 0){
         alert('File formate not support! please check once. format .xlsx');
         return false;
      }
   });
   $('#usersExcel').submit(function(){
      var _uploaderName = $('#uploaded-file-name');
      var uploadDoc = getUploadFun($('#hdfcfileUpload'));
      if(uploadDoc == undefined){
         alert('Please Uplaod Document. Format .xlsx');
         return false;
      }
      var fileName = uploadDoc.name;
      var _hdfcfilesubmit = $('#hdfcfilesubmit');
      $('#uploaded-file-name').html('').append(fileName);
      var fileformate = fileName.split('.');
      var extensiion = fileformate[fileformate.length-1];
      if(uploadDoc == undefined){
         alert('Please upload .xlsx format document.');
         return false;
      } else if(checknames.indexOf(extensiion) != 0){
         alert('File formate not support! please check once. format .xlsx');
         return false;
      } else {
         $.ajax({
            url : '<?php echo base_url('hdfc-av-upload')?>',
            cache : false,
            type : 'POST',
            processData : false,
            contentType : false,
            dataType:'json',
            beforeSend:function(){
               _hdfcfilesubmit.attr('type','button');
               _hdfcfilesubmit.attr('value','Please wait..');
            },
            data : new FormData(this),
            success : function(resultData){
               var responseJSON = Object(resultData);
                  if(responseJSON.errorFeilds == true){
                     _hdfcfilesubmit.attr('type','submit');
                     _hdfcfilesubmit.attr('value','Upload');
                     _uploaderName.html('').append('Something went wrong!please try again.');
                     setTimeout(() => {
                        _uploaderName.html('');
                        //location.reload();
                     }, 2000);
                     return false;
                  }
                  if(responseJSON.filestatus == true && responseJSON.columstaus == true){
                     _hdfcfilesubmit.attr('type','submit');
                     _hdfcfilesubmit.attr('value','Upload');
                     _uploaderName.html('').append('Upload Completed!.');
                     setTimeout(() => {
                        _uploaderName.html('');
                        //location.reload();
                     }, 2000);
                     return false;
                  }
                  if(responseJSON.filestatus == true && responseJSON.columstaus == false){
                     alert('Please Enter .xlsx in correct format.');
                     _hdfcfilesubmit.attr('type','submit');
                     _hdfcfilesubmit.attr('value','Upload');
                     _uploaderName.html('').append('Please Enter .xlsx in correct format.');
                     setTimeout(() => {
                        _uploaderName.html('');
                        //location.reload();
                     }, 2000);
                     
                     return false;
                  }
            }
         });
      }
      return false;
   })
})
</script>