
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

function validateForm(fromdetails) {
    var user_name = document.getElementById("uname").value;
    var pass_wd = document.getElementById("pwsd").value;
    
    if (user_name == ""||pass_wd == "") {
      alert("Fill all the required fields");
      return false;
    }
    else if ((user_name.match(mailformat)))
    {

      return (true)



    }
    else{
      alert("You have entered an invalid email address!")
      return (false)
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

function ValidateEmail() 
{

  var user_name = document.getElementById("uname").value;

  if ((user_name.match(mailformat)))
  {

    return (true)

  }
  else{
    alert("You have entered an invalid email address!")
    return (false)
  }
}