// JavaScript File
// JavaScript File
/*function validateUserForm()
    {
        var hasError = true;
        var alertMsg = "";
        //var emailExp = '/\S+@\S+\.\S+\';
        var firstName = document.getElementById("firstName");
        var lastName = document.getElementById("lastName");;
        var passWord = document.getElementById("passWord");
        var confirmPass = document.getElementById("confirmPass");
        var emailAddr = document.getElementById("emailAdd");
        var telephoneNo = document.getElementById("telephoneNo");
        
        if (firstName.value.length === 0 || lastName.value.length === 0 || passWord.value.length === 0 
         || confirmPass.value.length === 0  || emailAddr.value.length === 0 || telephoneNo.value.length != 0)
        {
            document.getElementById("head").innerText = "*All fields are mandatory*"
            hasError = false;
        }
        
        if (!firstName.value.match("/^[a-zA-Z]+$/"))
        {
            alertMsg = "*Only letters allowed*";
            document.getElementById("firstnameErr").innerText = alertMsg;
            firstName.focus();
            hasError = false;
        }
        
        if (!lastName.value.match("/^[a-zA-Z]+$/"))
       {
            alertMsg = "*Only letters allowed*";
            document.getElementById("lastnameErr").innerText = alertMsg;
            lastName.focus();
            hasError = false;
       }
       
       if (passWord.value.length !== 0 && (passWord.value === confirmPass.value))
       {
           if (passWord.value.length < 8)
            {
                var alertMsg = "*Password Must Contain At Least 8 Characters!*";
                //document.getElementById("passwordErr").innerText = alertMsg;
                passWord.focus();
                hasError = false;
            }
        }
        else if (passWord.value.length !== 0)
        {
            alertMsg = "*Passwords does not match!*"; 
            //document.getElementById("confirmPassErr").innerText = alertMsg;
            confirmPass.focus();
            hasError = false;
        }
        else{
            alertMsg = "*Password is required*";
           //document.getElementById("passwordErr").innerHTML = alertMsg;
            passWord.focus();
            hasError = false;
        }
        
       if (!emailAddr.value.match("/\S+@\S+\.\S+/"))
       {
           alertMsg = "*Invalid Email Format! The Email Must Have A Format of: xxx@xx.com*";
           //document.getElementById("emailErr").innerText = alertMsg;
           emailAddr.focus();
           hasError = false;
       }
       
       if (!telephoneNo.value.match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/"))
       {
            alertMsg = "*Invalid Telephone Format! The Phone Number Must Have A Format of: 000-000-0000*";
           //document.getElementById("telephoneErr").innerText = alertMsg;
            telephoneNo.focus();
            hasError = false;
       }
       return hasError;
    }*/
window.onload = function() {
    //var httpReq = new XMLHttpRequest();
    var submitButtn = document.getElementById("submitButtn");
    var clickHome = document.getElementById("home");
    var clickNewJob = document.getElementById("newJob");
    var clickAddUser = document.getElementById("addUser");
    var clickLogout = document.getElementById("logOut");
    
    submitButtn.addEventListener('click', function(e) {
        e.preventDefault();
    });
  
   
    clickHome.addEventListener('click', function(e) {
        e.preventDefault();
        window.location.replace("dashboard.php");
        return false;
    });
    
    clickAddUser.addEventListener('click', function(e) {
        e.preventDefault();
       window.location.replace("new_user.php");
        return false;
    });
    
    clickNewJob.addEventListener('click', function(e) {
        e.preventDefault();
        window.location.replace("new_job.php");
        return false;
    });
    
    clickLogout.addEventListener('click', function(e) {
        e.preventDefault();
    });
};
