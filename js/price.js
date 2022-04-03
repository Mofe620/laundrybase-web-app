<script>

var input = 0;
var input0 = 0;
var input1 = 0;
var input2 = 0;
var inputDis = document.getElementById('input');
var unit = parseInt(document.getElementById('unit').innerHTML);
var unit0 = parseInt(document.getElementById('unit0').innerHTML);
var unit1 = parseInt(document.getElementById('unit1').innerHTML);
var unit2 = parseInt(document.getElementById('unit2').innerHTML);
var del_fee= parseInt(document.getElementById("del").innerHTML);
var laundry = parseInt(document.getElementById('LaundryFee').innerHTML);


function plus(){
input++;
inputDis.value = input;

document.getElementById('input').innerHTML= inputDis.value;

laundry += unit;
document.getElementById('LaundryFee').innerHTML = parseInt(laundry);

del_fee += unit;
document.getElementById("total").innerHTML=  parseInt(del_fee) ;
  
}

function minus(){
if (input > 0){
input--;
inputDis.value= input;

document.getElementById('input').innerHTML= inputDis.value;

laundry -= unit;
document.getElementById('LaundryFee').innerHTML = laundry;

del_fee -= unit;
document.getElementById("total").innerHTML=  del_fee ;

}

}

//how to increment with a particular value onclick
//price1, price 2 for the 2 products. Laundry fee.innerHTML= price 1 + price 2;?
function plus0(){
input0++;
inputDis.value = input0;

document.getElementById('input0').innerHTML= inputDis.value;

laundry += unit0;
document.getElementById('LaundryFee').innerHTML = laundry;

del_fee += unit0;
document.getElementById("total").innerHTML=  del_fee ;
}

function minus0(){
if (input0 > 0){
input0--;
inputDis.value= input0;

document.getElementById('input0').innerHTML= inputDis.value;

laundry -= unit0;
document.getElementById('LaundryFee').innerHTML = laundry;

del_fee -= unit0;
document.getElementById("total").innerHTML=  del_fee ;

}

}


function plus1(){
input1++;
inputDis.value = input1;

document.getElementById('input1').innerHTML= inputDis.value;

laundry += unit1;
document.getElementById('LaundryFee').innerHTML = laundry;

del_fee += unit1;
document.getElementById("total").innerHTML=  del_fee ;
}

function minus1(){
if (input1 > 0){
input1--;
inputDis.value= input1;

document.getElementById('input1').innerHTML= inputDis.value;

laundry -= unit1;
document.getElementById('LaundryFee').innerHTML = laundry;

del_fee -= unit1;
document.getElementById("total").innerHTML=  del_fee ;

}

}


function plus2(){
input2++;
inputDis.value = input2;

document.getElementById('input2').innerHTML= inputDis.value;

laundry += unit2;
document.getElementById('LaundryFee').innerHTML = laundry;

del_fee += unit2;
document.getElementById("total").innerHTML=  del_fee ;
}

function minus2(){
if (input2 > 0){
input2--;
inputDis.value= input2;

document.getElementById('input2').innerHTML= inputDis.value;

laundry -= unit2;
document.getElementById('LaundryFee').innerHTML = laundry;

del_fee -= unit2;
document.getElementById("total").innerHTML=  del_fee ;

}

}




</script>