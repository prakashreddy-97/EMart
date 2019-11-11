
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

function validateForm(fromdetails) {
    var user_name = document.getElementById("uname").value;
    var pass_wd = document.getElementById("pwsd").value;
}

function myFunction() {
  var ps = document.getElementById("pwsd");
  if (ps.type === "password") {
    ps.type = "text";
  } else {
    ps.type = "password";
  }
}

