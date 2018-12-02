// JavaScript File// JavaScript File
// JavaScript File
window.onload = function() {
    var httpReq = new XMLHttpRequest();
    var submitButtn = document.getElementById("submitButtn");
    var clickHome = document.getElementById("home");
    var clickNewJob = document.getElementById("newJob");
    var clickAddUser = document.getElementById("addUser");
    var clickLogout = document.getElementById("logOut");
    
    
    var Firstname=document.getElementById("firstName").value;
    var Lastname= document.getElementById("lastName").value;
    var Email= document.getElementById("emailAdd").value;
    var Tel=document.getElementById("telephoneNo").value;
    var Password=document.getElementById("passWord").value;
    var PassConfirm=document.getElementById("confirmPass").value;
    var regexpress=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var errormsg="";
    
    
    submitButtn.addEventListener('click', function(e) {
        e.preventDefault();
        
        /*if (Password !=PassConfirm)
        {
            alert("Please enter your email.");
        }
        if(Password < 8)
        {
            alert("Password is too short");
            return false;
        }
        else {
            return true;
            // var url = "https://info2180project3-jazzydreamer.c9users.io/new_job.html";
            // /*change url add data to database instead of opening a new page*/
            
            // httpReq.onreadystatechange = loadPage;
            // httpReq.open('GET', url);
            // httpReq.send();
            }*/
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
    
    clickLogout.addEventListener('click', function goToLoginPage(e) {
        var promptUser = prompt("Are you sure you want to logout?");
        
        if (promptUser == false) {
            document.location.reload();
        }
        else 
        {
        var url = "https://info2180project3-jazzydreamer.c9users.io/index.php";
        
        httpReq.onreadystatechange = loadPage;
        httpReq.open('GET', url);
        httpReq.send();
        }
    });
    
    function loadPage() {
        if (httpReq.readyState === XMLHttpRequest.DONE) 
        {
            if (httpReq.status === 200)
            {
                var response = httpReq.responseText;
            }
            else
            {
                alert("An error has occurred");
            }
        }
    }
    // // function validation(){
       
};