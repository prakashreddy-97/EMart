
function Validate() {
    var fName = document.getElementById("fname").value;
    var lName = document.getElementById("lname").value;
    var eMail = document.getElementById("email").value;
    var password = document.getElementById("pd").value;
    var confirmPassword = document.getElementById("cnfpd").value;     
    if(fName =="" || lName == "" || eMail == "" || password == ""|| confirmPassword ==""){
        alert("Please enter all the fields");
<<<<<<< HEAD
       }else{
           if(password != confirmPassword){
               alert ("Incorrect Password");
           }
=======
        return;    
>>>>>>> 819a70b511d19a0955ea61c9d7ebc9a8da16f61c
       }
    if(password !== confirmPassword){
        alert("Password and confirm password do not match, please check once again!");
        return;
    }
    if(password.length<8){
        alert("Weak Password!!");
        return;
    }
}