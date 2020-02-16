    function loadIdvValueSlider(min, max, start){
     //   alert('in slider');

var roundedMin = Math.round(min * 100) / 100;
var roundedMax = Math.round(max * 100) / 100;
        var dec = document.querySelector('.js-decimal');
        var initDec = new Powerange(dec, { decimal: true, callback: displayDecimalValue, min:roundedMin, max: roundedMax, start: start });

        function displayDecimalValue() {
            //document.getElementById('car_idvamount').value = dec.value;
            $('.idv_amount').value = dec.value;
        }

        $('.previous').css("display", "none");
    }


