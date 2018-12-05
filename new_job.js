// JavaScript File
// JavaScript File

    function validatefields(){
        var category=document.getElementById("category").value;
        var jobTitle=document.getElementById("jobTitle").value;
        var jobDescript=document.getElementById("jobDescript").value;
        var company=document.getElementById("company").value;
        var jobLocation=document.getElementById("jobLocat").value;
        var hasError=false;
        var alertMsg="";
        
        if (!jobTitle.value.match("/^[a-zA-Z]+$/"))
        {
            alertMsg = "*Only letters allowed*";
            document.getElementById("jobTitleErr").innerText = alertMsg;
            jobTitle.focus();
            hasError = false;
        }
        else {
            hasError = true;
        }
        
        if (!company.value.match("/^[a-zA-Z]+$/"))
        {
            alertMsg = "*Only letters allowed*";
            document.getElementById("companyErr").innerText = alertMsg;
            company.focus();
            hasError = false;
        }
        else {
            hasError = true;
            
        }
        
        return hasError;
    
            
            
            
        // if(category==""){
        //     alert("please choose a category for your job.");
        //     return false;
        // }
        
        // if (jobTitle==""){
        //     alert("Please ensure to give your job a title.");
        //     return false;
        // }
        
        // if(jobDescript==""){
        //     alert("A description of he job is needed.");
        //     return false;
        // }
        // else{
        //     return true;
        // }
    }
    
    
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
window.onload = function() {
    var httpReq = new XMLHttpRequest();
    
    var clickHome = document.getElementById("home");
    var clickNewJob = document.getElementById("newJob");
    var clickAddUser = document.getElementById("addUser");
    var clickLogout = document.getElementById("logOut");
    
    // submitButtn.addEventListener('click', function(e) {
    //     e.preventDefault();
        
    // });
    
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
            window.location.replace("index.php");
            //var url = "https://info2180project3-jazzydreamer.c9users.io/login_page.html";
        }
    });
    
    
    
    
};