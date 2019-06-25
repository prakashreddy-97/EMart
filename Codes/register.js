
function Validate() {
  var fName = document.getElementById("fname").value;
  var lName = document.getElementById("lname").value;
  var eMail = document.getElementById("email").value;
  var password = document.getElementById("pd").value;
  var confirmPassword = document.getElementById("cnfpd").value;

  if (fName == "" || lName == "" || eMail == "" || password == "" || confirmPassword == "") {
    alert("Please enter all the fields");
    return;
  } else if (password != confirmPassword) {
    alert("Password and confirm password doesn't match");
  } 
  

}
    
function myFunction() {
  var conf_passwd = document.getElementById("cnfpd");
  var passwd = document.getElementById("pd");
  if (conf_passwd.type === "password") {
    conf_passwd.type = "text";
  } else {
    conf_passwd.type = "password";
  }
  if (passwd.type === "password") {
    passwd.type = "text";
  } else {
    passwd.type = "password";
  }
}