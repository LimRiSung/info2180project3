// JavaScript File
// JavaScript File
window.onload = function() {
    var httpReq = new XMLHttpRequest();
    var clickHome = document.getElementById("home");
    var clickNewJob = document.getElementById("newJob");
    var clickAddUser = document.getElementById("addUser");
    var clickLogout = document.getElementById("logOut");
    var applyButtn = document.getElementById("applyButtn");
    
    applyButtn.addEventListener('click', function applyForJob(e) {
        e.preventDefault();
        var url = "https://info2180project3-jazzydreamer.c9users.io/new_job.html";
        
        httpReq.onreadystatechange = loadPage;
        httpReq.open('GET', url);
        httpReq.send();
    });
    
    clickHome.addEventListener('click', function goToHomePage(e) {
        e.preventDefault();
        var url = "https://info2180project3-jazzydreamer.c9users.io/dashboard.html";
        
        httpReq.onreadystatechange = loadPage;
        httpReq.open('GET', url);
        httpReq.send();
    });
    
    clickAddUser.addEventListener('click', function goToNewUser(e) {
        e.preventDefault();
        var url = "https://info2180project3-jazzydreamer.c9users.io/new_user.html"; 
        
        httpReq.onreadystatechange = loadPage;
        httpReq.open('GET', url);
        httpReq.send();
    });
    
    clickNewJob.addEventListener('click', function goToNewJob(e) {
        e.preventDefault();
        var url = "https://info2180project3-jazzydreamer.c9users.io/new_job.html";
        
        httpReq.onreadystatechange = loadPage;
        httpReq.open('GET', url);
        httpReq.send();
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