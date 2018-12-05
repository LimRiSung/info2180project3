// JavaScript File
window.onload = function() {
    //var httpReq = new XMLHttpRequest();
    var postButtn = document.getElementById("postJobButtn");
    var clickHome = document.getElementById("home");
    var clickNewJob = document.getElementById("newJob");
    var clickAddUser = document.getElementById("addUser");
    var clickLogout = document.getElementById("logOutBtn");
    
   postButtn.addEventListener('click', function(e) {
       e.preventDefault();
        window.location.replace("new_job.php");
        return false;
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
        
       alert("You have been logged out!");
       window.open("index.php");
      
        // var promptUser = prompt("Are you sure you want to logout?")
        
        // if (promptUser == true) {
        //     window.location.replace("index.php");
        //     return false;
        // }
        // else 
        // {
        //     document.location.reload();
        //   // var url = "https://info2180project3-jazzydreamer.c9users.io/login_page.html";
        // }
    });
    
    /*function loadPage() {
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
    }*/
};