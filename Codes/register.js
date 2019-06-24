function Validate() {
    var password = document.getElementById("pd").value;

    var confirmPassword = document.getElementById("cnfpd").value;
 
    if (password = confirmPassword) {
       
        alert(" You are wrong");
       
    }else if(password == ""|| confirmPassword ==""){
        alert("Please enter password");
     
       }
    else{
     alert("This is correct");
  
    }
}