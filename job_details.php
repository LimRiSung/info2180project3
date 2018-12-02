<?php require "header.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Details of the Job</title>
        <link href="job_details.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="job_details.js" type="text/javascript"></script>
    </head>
    <body>
        <div id = "headerBar">
            <h3><marquee>HireMe</marquee></h3>
        </div>
        <div id= "generalcontainer">
            <div id = "sideBar">
                <img src="https://openclipart.org/download/68863/sweet-home.svg"/><a href id = "home">Home</a><br>
                <img src="https://www.freeiconspng.com/uploads/user-add-icon---shine-set-add-new-user-add-user-30.png"/><a href id = "addUser">Add User</a><br/>
                <img src="https://www.clipartmax.com/png/full/33-330391_briefcase-work-job-work-icon-ico.png"/><a href id = "newJob">New Job</a><br/>
                <img src="https://png2.kisspng.com/sh/57a976f26d3b43a3a9cb650ca51eb22b/L0KzQYm3V8E1N6lngJH0aYP2gLBuTgBwf5Z3ReVEbXLyfH7qjB1xfaVqip9yY3Bxg37zjBdwfaUygdV4bj24coXog8A0OGM6fKg9Nz67SIa6VMg6OmI6S6MBMkW4QoG4VcUveJ9s/kisspng-power-symbol-computer-icons-logout-icon-5b4ac03025d647.885348921531625520155.png"/><a href id = "logOut">Logout</a><br/>
            </div>
            <div id = "mainBar">
                <div>
                    <h1 id = "jobTitle"></h1>
                    <button id = "applyButtn">Apply Now</button>
                    <p id = "datePosted"></p>
                    <p id = "category"></p>
                    <h3 id = "company"></h3>
                    <h3 id = "location"></h3>
                </div>
                <hr>
                <div>
                    <h2 id = "jobDescript">Job Description</h2>
                    <p id = "contentJobDescript"></p>
                </div>
            </div>
        </div>
    </body>
</html>