

function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
  qty = Number(document.getElementById('number').value);
  totalIncrease = qty * 549;
  document.getElementById('price').innerHTML = totalIncrease;
 
}


function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
  qty = Number(document.getElementById('number').value);
  totalDecrease = qty * 549;
  document.getElementById('price').innerHTML = totalDecrease;
}

function increaseValue1() {
  var value = parseInt(document.getElementById('number1').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number1').value = value;
  qty = Number(document.getElementById('number1').value);
  totalIncrease = qty * 30;
  document.getElementById('price1').innerHTML = totalIncrease;
 
}




function decreaseValue1() {
  var value = parseInt(document.getElementById('number1').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number1').value = value;
  qty = Number(document.getElementById('number1').value);
  totalDecrease = qty * 30;
  document.getElementById('price1').innerHTML = totalDecrease;
}

function increaseValue2() {
  var value = parseInt(document.getElementById('number2').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number2').value = value;
  qty = Number(document.getElementById('number2').value);
  totalIncrease = qty * 50;
  document.getElementById('price2').innerHTML = totalIncrease;
 
}


function decreaseValue2() {
  var value = parseInt(document.getElementById('number2').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number2').value = value;
  qty = Number(document.getElementById('number2').value);
  totalDecrease = qty * 50;
  document.getElementById('price2').innerHTML = totalDecrease;
}

