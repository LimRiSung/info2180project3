// JavaScript File
// JavaScript File
window.onload = function() {
    var httpReq = new XMLHttpRequest();
    var submitButtn = document.getElementById("submitButtn");
    var clickHome = document.getElementById("home");
    var clickNewJob = document.getElementById("newJob");
    var clickAddUser = document.getElementById("addUser");
    var clickLogout = document.getElementById("logOut");
    var password = document.getElementById("passWord");
    var confirmPassword = document.getElementById("confirmPass");
    
    submitButtn.addEventListener('click', function submitInfo(e) {
        e.preventDefault();
        if (password != confirmPassword)
        {
            alert("Password does not match!!")
        }
        else {
            var url = "https://info2180project3-jazzydreamer.c9users.io/new_job.html";
            /*change url add data to database instead of opening a new page*/
            httpReq.onreadystatechange = loadPage;
            httpReq.open('GET', url);
            httpReq.send();
            }
    });
    
    clickHome.addEventListener('click', function goToHomePage(e) {
        e.preventDefault()
        var url = "https://info2180project3-jazzydreamer.c9users.io/dashboard.html";
        
        httpReq.onreadystatechange = loadPage;
        httpReq.open('GET', url);
        httpReq.send();
    });
    
    clickAddUser.addEventListener('click', function goToNewUser(e) {
        e.preventDefault()
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
        var promptUser = prompt("Are you sure you want to logout?")
        
        if (promptUser == false) {
            document.location.reload();
        }
        else 
        {
            var url = "https://info2180project3-jazzydreamer.c9users.io/login_page.html";
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