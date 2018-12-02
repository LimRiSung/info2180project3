// JavaScript File
// JavaScript File
window.onload = function() {
    var httpReq = new XMLHttpRequest();
    var submitButtn = document.getElementById("submitButtn");
    var clickHome = document.getElementById("home");
    var clickNewJob = document.getElementById("newJob");
    var clickAddUser = document.getElementById("addUser");
    var clickLogout = document.getElementById("logOut");
    
    submitButtn.addEventListener('click', function submitInfo(e) {
        e.preventDefault();
        var url = "https://info2180project3-jazzydreamer.c9users.io/new_job.html";
        /*Submit info to database instead of opening a new page*/
        
        httpReq.onreadystatechange = loadPage;
        httpReq.open('GET', url);
        httpReq.send();
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
            window.location.replace("index.php");
            //var url = "https://info2180project3-jazzydreamer.c9users.io/login_page.html";
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
};