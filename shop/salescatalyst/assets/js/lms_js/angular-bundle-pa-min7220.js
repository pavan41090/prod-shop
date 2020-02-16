_lmsapp.factory('LmsValidataionbundleservice', ['$http', function ($http) {
var factory = new Object();
factory.calculateSpouseAge = function(dateofbirth){
  try{
    var date2String = dateofbirth;
    var selectedDate = date2String.toString();
    var splitdate = selectedDate.split('-');
    var yearThen = parseInt(splitdate[2]);
    var monthThen = parseInt(splitdate[1]);
    var dayThen = parseInt(splitdate[0]);
    var birthday = new Date(yearThen, monthThen-1, dayThen);
    var today = new Date();
    var differenceInMilisecond = today.valueOf() - birthday.valueOf();
    var years = Math.floor(differenceInMilisecond / (365.25 * 24 * 60 * 60 * 1000));
       if(years < 18) {
         return false;
        } else if(years > 80){
          return false;
        } else {
        return true;
     }
  } catch(Error){
    console.error(Error);
    console.log("Error Message IN date calculateSpouseAge"+Error.message);
  }
}
factory.childcalculateAge = function(dateofbirth){
  try{
    var date2String = dateofbirth;
    var selectedDate = date2String.toString();
    var splitdate = selectedDate.split('-');
    var yearThen = parseInt(splitdate[2]);
    var monthThen = parseInt(splitdate[1]);
    var dayThen = parseInt(splitdate[0]);
    var birthday = new Date(yearThen, monthThen-1, dayThen);
    var today = new Date();
    var differenceInMilisecond = today.valueOf() - birthday.valueOf();
    var years = Math.floor(differenceInMilisecond / (365.25 * 24 * 60 * 60 * 1000));
       if(years > 23) {
         return false;
        } else {
        return true;
     }
  } catch(Error){
    console.log("Error Message IN date calculateSpouseAge"+Error.message);
  }
}
factory.ctlcheckPolicyStartDate = function(dataIdclick){
  try{
      var dateSelected = dataIdclick;
      var date = dateSelected.substring(0, 2);
      var month = dateSelected.substring(3, 5);
      var year = dateSelected.substring(6, 10);
      var myDate = new Date(year, month - 1, date);
      var today = new Date();
      var daytoday = today.getDate();
      var daymonth = today.getMonth();
      var dayyear = today.getFullYear();
      var latestDate = new Date(dayyear,daymonth,daytoday);
      if ( +latestDate != +myDate && +latestDate > +myDate) {
          return false;
      }
      return true;
  } catch(Error){
    console.log('ctlcheckPolicyStartDate Error log'+Error.message);
  } 
  }
return factory;
}]);
_lmsapp.directive('datePicker', function() {
    return {
        restrict: 'AE',
        scope: {
          date: '='
        },
        link: function(scope, element, attr) {
          jQuery(element[0]).datepicker({
            dateFormat: 'dd-mm-yy',
            defaultDate: new Date(),
            maxDate: '0',
            onSelect: function(date) {
              scope.$apply(function() {
                scope.date = date;
              });
            },
            autoclose: true
          });
      }
    };
  });
  _lmsapp.directive('includeSpouse',function(){
    return {
      restrict : 'AE',
      link : function(scope,element,attr){
        element.on('click',function(){
          if($(this).is(':checked')){
            scope.lms_include_spouse = 1;
            scope.lms_include_spouse = true;
          } else {
            scope.lms_include_spouse = 0;
            scope.lms_include_spouse = false;
          }
        });
      }
    }
  })
  _lmsapp.directive('clickPremiumData',function(){
    return {
      restrict : 'AE',
      controller : 'myBundleApp',
      link : function(scope,element,attr){
        element.on('click',function(){
          scope.premiumChange();
      });
      }
    }
    });
  _lmsapp.directive('changePremiumData',function(){
  return {
    restrict : 'AE',
    controller : 'myBundleApp',
    link : function(scope,element,attr){
      element.on('change',function(){
          scope.premiumChange();
          return false;
      });
      element.on('click',function(){
        scope.premiumChange();
        return false;
    });
    }
  }
  });
  _lmsapp.directive('proposedDateCheck',function(LmsValidataionbundleservice){
    return{
      restrict : 'AE',
      link : function(scope,element,attr){
        element.on('change',function(){
          var _parentChange = $(this);
          var birthDate = _parentChange.val();
          if(birthDate.length>0){
            var bundleDateOb = LmsValidataionbundleservice.ctlcheckPolicyStartDate(birthDate);
            if(bundleDateOb == false){
              $('#check-policy-date').html('').append('<div ng-message="required" class="required">Please Select Policy Starts Date Future!</div>');
              return false;
            } else {
              $('#check-policy-date').html('');
            }
          }
        });
      }
    }
  });
_lmsapp.directive('bundleDob',function(LmsValidataionbundleservice){
    return{
      restrict : 'AE',
      link : function(scope,element,attr){
        element.on('change',function(){
          var _parentChange = $(this);
          var birthDate = _parentChange.val();
          
          var bundleDateOb = LmsValidataionbundleservice.calculateSpouseAge(birthDate);
          console.log(bundleDateOb);
          if(bundleDateOb == false){
            _parentChange.parent('div').find('#error-message-spouse').html('').append('Please Enter DOB Between 18-80');
            return false;
          } else {
            _parentChange.parent('div').find('#error-message-spouse').html('');
          }
        });
      }
    }
  });
  _lmsapp.directive('childsDob',function(LmsValidataionbundleservice){
    return{
      restrict : 'AE',
      link : function(scope,element,attr){
        element.on('change',function(){
          var _parentChange = $(this);
          var birthDate = _parentChange.val();
          var bundleDateOb = LmsValidataionbundleservice.childcalculateAge(birthDate);
          if(bundleDateOb == false){
            _parentChange.parent('div').find('#error-message-child').html('').append('Please Enter DOB Between 0-23');
            return false;
          } else {
            _parentChange.parent('div').find('#error-message-child').html('');
          }
        });
      }
    }
  });
_lmsapp.directive('bunldeFormSubmit',function(){
return {
  restrict : 'AE',
  controller : 'myBundleApp',
  link : function(scope,element,attr){
    element.on('submit',function(){
          scope.submitBundlePa($(this));
    });
  }
}
});

/*_lmsapp.directive('getLoanPremium',function(){

  return {
    restrict : 'AE',
    link : function(scope,element,attr){
      element.on('keyup change',function(){
        scope.elementgetHtmlData();
      });
    }
  }

});*/

_lmsapp.directive('uppLoanAmount',function(){
  return {
    restrict : 'AE',
    link : function(scope,element,attr){
      element.on('keyup',function(){
        scope.getLoanamount();
      });
    }
  }
})


_lmsapp.controller('myBundleApp',function($http,$scope,LmsValidataionbundleservice){

    let xtenure = 1;

    
    $scope.loadBunldePa = function(tenure){
      var tenureObj = new Object();
      tenureObj.tenure = tenure;
      tenureObj.hiddenLeadid = $('#hiddenLeadid').val();

     $http({
            url : __pathname+'lms-get-bundle-data',
            method : 'POST',
            dataType : 'json',
            data : $.param(tenureObj),
            headers: {
                "Content-Type": 'application/x-www-form-urlencoded'
            }
        }).then(function(responceData){

          var objectData = Object(responceData);
          console.log(objectData);

        },function(errorResponce){
            //alert('Something went wrong! please try after some time.');
            return false;
            
        });
        return false;
    }

    $scope.loadBunldePacv = function(){
     $scope.loadBunldePa($('#lms_car_tenure').val());
    }

    $scope.loadBunldePa(xtenure);

    $scope.changepremiumRadio = function(){
      $scope.premiumChange();
    }
    /*$scope.elementgetHtmlData = function(){
      $scope.calculatePremiumData();
    }*/

    $scope.getLoanamount = function(){
      var getLoanAmountvalue = $scope.getLoanAmountvalue();
      if(getLoanAmountvalue == true){
        $scope.premiumChange();
      }
    }
    

      $scope.getLoanAmountvalue = function(){

      var loanAmountreturn = $('#lms_bundle_upp_loan_amount').val();
      var loanplantype = $('#lms_bundle_upp_type_loan').val();
      
      if(loanplantype == 0){
        $('#error-loan-Amount').html('').append('Please Select Type Of Loan!');
        return false;
      }

      if(loanplantype == 1 && loanplantype != 0){
        if(loanAmountreturn > 1000000){
          $('#error-loan-Amount').html('').append('Outside Max limit of 10 Lakh');
          return false;
        } else {
          $('#error-loan-Amount').html('');
          return true;
        }
      }

      if(loanplantype == 2 && loanplantype != 0){
        if(loanAmountreturn > 1500000){
          $('#error-loan-Amount').html('').append('Outside Max limit of 15 Lakh');
          return false;
        } else {
          $('#error-loan-Amount').html('');
          return true;
        }
      }

    }

    $scope.premiumChange = function(){
      var includeSpouse = 0;
      var annualWallet = 0;
      if($("#lms_include_spouse").is(':checked')){
        includeSpouse = 1;
      } else {
        includeSpouse = 0;
      }

      if($('#lms_car_waller_offering').is(':checked')){
        annualWallet = 1;
      } else {
        annualWallet = 0;
      }

      if($('#lms_bundle_upp').is(':checked')){
        includeupp = 1;
      } else {
        includeupp = 0;
      }

      var childsCount = $('input[name="lms_chlds_count"]:checked').val() || 0;
      $scope.lms_chlds_count = childsCount;
      

      var changeObjectPremium = new Object();
          changeObjectPremium.sum_insured = $('#lms_car_sum_insured').val();
          changeObjectPremium.includeSpouse = includeSpouse;
          changeObjectPremium.childData = childsCount;
          changeObjectPremium.annualWallet = annualWallet;
          changeObjectPremium.tenure = $('#lms_car_tenure').val() || 0;
          changeObjectPremium.plantype = $("#lms_car_plan_type").val();
          //upp
          changeObjectPremium.upp_type_load = $("#lms_bundle_upp_type_loan").val();
          changeObjectPremium.upp_loan_amount = $("#lms_bundle_upp_loan_amount").val();
          changeObjectPremium.upp_tenure = $("#lms_bundle_upp_tenure").val();
          changeObjectPremium.upp_age = $("#lms_bundle_upp_age").val();
          changeObjectPremium.upp_pa_sum = $("#pa_sum").val();
          changeObjectPremium.upp_acci_hosp = $("#acci_hosp").val();
          changeObjectPremium.upp_credit_shied = $("#credit_shied").val();
          changeObjectPremium.upp_critical_ill = $("#critical_ill").val();
          changeObjectPremium.includeupp = includeupp;
          
         


        $http({
            url : __pathname+'bundle-pa-sum',
            method : 'POST',
            dataType : 'json',
            data : $.param(changeObjectPremium),
            headers: {
                "Content-Type": 'application/x-www-form-urlencoded'
            }
        }).then(function(responceData){
          var objectData = Object(responceData);
          var premiuData = objectData.data;
          $('#lms_est_premium').val(premiuData.bundle_premium);
          $('#lms_est_premium').change();
          //upp
          $('#pa_sum').val(premiuData.pa);
          $('#pa_sum').change();
          $('#acci_hosp').val(premiuData.hospi);
          $('#acci_hosp').change();
          $('#credit_shied').val(premiuData.credit);
          $('#credit_shied').change();
          $('#critical_ill').val(premiuData.critical);
          $('#critical_ill').change();
          $('#upp_tot_pre').val(premiuData.upp_premium);
          $('#upp_tot_pre').change();
          $('#total_premium').val(premiuData.total_premium);
          $('#total_premium').change();


        },function(errorResponce){
            console.log('Something went wrong!');
            alert('Something went wrong! please try after some time.');
            return false;
        });
        return false;
    }

    $scope.submitBundlePa = function(_parentForm){

      var customerDob = $('#lms_car_dob').val();
      var customerDateOb = LmsValidataionbundleservice.calculateSpouseAge(customerDob);
      if(customerDateOb == false){
        $('#lms_car_dob').parent('div').find('#error-message-spouse').html('').append('Please Enter DOB Between 18-80');
        return false;
      } else {
        $('#lms_car_dob').parent('div').find('#error-message-spouse').html('');
      }
      var includeSpouse = parseInt($('#lms_include_spouse').val());
      if($('#lms_include_spouse').is(':checked')){
        var spousedob = $('#lms_car_spouse_dob').val();
        var spouseDateOb = LmsValidataionbundleservice.calculateSpouseAge(spousedob);
        var childsCount = parseInt($('input[name="lms_chlds_count"]:checked').val());
        if(spousedob.length == 0){
          $('#lms_include_spouse').parent('div').find('#error-message-spouse').html('').append('Please Enter DOB');
          return false;
        }
        if(spousedob.length > 0 && spouseDateOb == false){
          $('#lms_include_spouse').parent('div').find('#error-message-spouse').html('').append('Please Enter DOB');
          return false;
        }
        if(childsCount == 1){
          var childoneValue = $('#lms_car_child_one_dob').val();
          var bundlechild1DateOb = LmsValidataionbundleservice.childcalculateAge(childoneValue);
          if(bundlechild1DateOb == false){
            $('#lms_car_child_one_dob').parent('div').find('#error-message-child').html('').append('Please Enter DOB Between 0-23');
            return false;
          }
        }
        if(childsCount == 2){
          var childtwoValue = $('#lms_car_child_two_dob').val();
          var bundlechild2DateOb = LmsValidataionbundleservice.childcalculateAge(childtwoValue);
          if(bundlechild2DateOb == false){
            $('#lms_car_child_two_dob').parent('div').find('#error-message-child').html('').append('Please Enter DOB Between 0-23');
            return false;
          }
        }
      }
      var lmsBundlevalidation = $scope.lmsBundle.$valid;
      if(lmsBundlevalidation == false){ return false; }
      var formData = _parentForm.serializeArray();

      $("#saveleadbundleData").attr('value','Please wait..');
      $('#saveleadbundleData').attr('type','button');
      
      $http({
        url : __pathname+'bundle-pa-submit',
        method : 'POST',
        dataType : 'json',
        data : $.param(formData),
        headers: {
            "Content-Type": 'application/x-www-form-urlencoded'
        }
      }).then(function(responceData){
      $("#saveleadbundleData").attr('value','Save Lead');
      $('#saveleadbundleData').attr('type','submit');
        //
        var objectData = Object(responceData);
        var premiuData = objectData.data;
        if(premiuData.status == true){
          $("#lmsBundle :input").prop("disabled", true);
          alert('Succesfully posted values, Lead Number is' + premiuData.message);
          location.reload();
      return false;
        } else {
      alert( premiuData.message );
      return false;
    }
      },function(errorResponce){
          console.log('Something went wrong!');
          alert('Something went wrong! please try after some time.');
          return false;
      });
    }
});