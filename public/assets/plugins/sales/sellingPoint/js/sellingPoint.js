$(document).ready(function(){
    $(document).on('click','#urlherf',function(e){
        var number_dresses=document.getElementById('number_dresses').value;
        if(number_dresses <=1){
            alert('يجب ان يكون عدد الثياب اكثر من ثوب');
            return false;

        }else{
            var url=document.getElementById('url').value;
            // var url=document.getElementById('formAction').value;
            // alert(url);
            document.getElementById('formAction').action=url;
        }
    })
})
var imgselect1 = document.getElementById('imgselect1').value;
document.getElementById('Imgcbk').src = imgselect1;

function imageSelect1() {
    var imgselect1 = document.getElementById('imgselect1').value;
    document.getElementById('Imgcbk').src = imgselect1;

}
var imgselect2 = document.getElementById('imgselect2').value;
document.getElementById('image_neck').src = imgselect2;

function imageSelect2() {
    var imgselect2 = document.getElementById('imgselect2').value;
    document.getElementById('image_neck').src = imgselect2;

}
var imgselect3 = document.getElementById('imgselect3').value;
document.getElementById('image_brest_pocket').src = imgselect3;

function imageSelect3() {
    var imgselect3 = document.getElementById('imgselect3').value;
    document.getElementById('image_brest_pocket').src = imgselect3;

}
var imgselect4 = document.getElementById('imgselect4').value;
document.getElementById('image_pocket').src = imgselect4;

function imageSelect4() {
    var imgselect4 = document.getElementById('imgselect4').value;
    document.getElementById('image_pocket').src = imgselect4;

}
var imgselect5 = document.getElementById('imgselect5').value;
document.getElementById('image_algizour').src = imgselect5;

function imageSelect5() {
    var imgselect5 = document.getElementById('imgselect5').value;
    document.getElementById('image_algizour').src = imgselect5;

}

function myfunction() {
    var price_tax = parseFloat(document.getElementById("price_tax").value);
    var value_tax = price_tax / 1.15;
    var result = value_tax * 15 / 100;
    var price_tax = parseFloat(price_tax).toFixed(2);
    var value_tax = parseFloat(value_tax).toFixed(2);
    var result = parseFloat(result).toFixed(2);
    document.getElementById('value_tax').value = result;
    document.getElementById('tax').value = value_tax;
    document.getElementById('afterdiscount').value = price_tax;

}

function myFunDiscount() {
    var price_tax = parseFloat(document.getElementById("tax").value);
    var discount = parseFloat(document.getElementById("discount").value);
    var result = price_tax - discount;
    // alert(result);
    var value_tax = result * 15 / 100;
    var afterdiscount = result + value_tax;
    var afterdiscount=parseFloat(afterdiscount).toFixed(2);
    var value_tax = parseFloat(value_tax).toFixed(2);
    var result = parseFloat(result).toFixed(2);
    document.getElementById('value_tax').value = value_tax;
    document.getElementById('tax').value = result;
    document.getElementById('afterdiscount').value = afterdiscount;

}

function myFunReceivedamount() {
    var afterdiscount = parseFloat(document.getElementById("afterdiscount").value);
    var receivedamount = parseFloat(document.getElementById("receivedamount").value);
    if(receivedamount > afterdiscount){
        alert('السعر المدخل اكبر من السعر المطلوب');
        document.getElementById("receivedamount").value='';

        return false;
    }
    var result = afterdiscount - receivedamount;
    var result = parseFloat(result).toFixed(2);
    document.getElementById('remainingamount').value = result;

}
const swiper = new Swiper('.swiper', {
    loop: true,

    pagination: {
        el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },


});
