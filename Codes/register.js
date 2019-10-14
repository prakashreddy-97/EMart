
function Validate() {
  var fName = document.getElementById("fname").value;
  var lName = document.getElementById("lname").value;
  var eMail = document.getElementById("email").value;
  var password = document.getElementById("pd").value;
  var confirmPassword = document.getElementById("cnfpd").value;

  if(password != confirmPassword) {
    alert("Password and confirm password doesn't match");
  }
}
function myFunction() {
  var x = document.getElementById("cnfpd");
  var y = document.getElementById("pd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}