
function Validate() {
    var fName = document.getElementById("fname").value;
    var lName = document.getElementById("lname").value;
    var eMail = document.getElementById("email").value;
    var password = document.getElementById("pd").value;
    var confirmPassword = document.getElementById("cnfpd").value;     
    if(fName =="" || lName == "" || eMail == "" || password == ""|| confirmPassword ==""){
        alert("Please enter all the fields");
        return;    
       }
    if(password !== confirmPassword){
        alert("Password and confirm password do not match, please check once again!");
        return;
    }
}