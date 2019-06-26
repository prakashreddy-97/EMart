function validateForm() {
    var user_name = document.getElementById("uname").value;
    var pass_wd = document.getElementById("pwsd").value;
    if (user_name == ""||pass_wd == "") {
      alert("Fill all the required fields");
      return false;
    }
    
}

function myFunction() {
  var ps = document.getElementById("pwsd");
  if (ps.type === "password") {
    ps.type = "text";
  } else {
    ps.type = "password";
  }
}