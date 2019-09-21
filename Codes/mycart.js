

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

function deleteitem(){
 
    var elem = document.getElementById('delete');
    elem.parentNode.removeChild(elem);
   }