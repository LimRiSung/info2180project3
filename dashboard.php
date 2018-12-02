<?php require "header.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <link href="dashboard.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="dashboard.js" type="text/javascript"></script>
    </head>
    <body>
        <div id = "headerBar">
                <h3><marquee>HireMe</marquee></h3>
        </div>
        <div id ="generalcontainer">
            <div id = "sideBar">
                <p><img src="https://openclipart.org/download/68863/sweet-home.svg"></img><a href = "#" id = "home">Home</a><br>
                <img src="https://www.freeiconspng.com/uploads/user-add-icon---shine-set-add-new-user-add-user-30.png"></img><a href = "#" id = "addUser">Add User</a><br>
                <img src="https://www.clipartmax.com/png/full/33-330391_briefcase-work-job-work-icon-ico.png"></img><a href = "#" id = "newJob">New Job</a><br>
                <!--<img src="https://png2.kisspng.com/sh/57a976f26d3b43a3a9cb650ca51eb22b/L0KzQYm3V8E1N6lngJH0aYP2gLBuTgBwf5Z3ReVEbXLyfH7qjB1xfaVqip9yY3Bxg37zjBdwfaUygdV4bj24coXog8A0OGM6fKg9Nz67SIa6VMg6OmI6S6MBMkW4QoG4VcUveJ9s/kisspng-power-symbol-computer-icons-logout-icon-5b4ac03025d647.885348921531625520155.png"></img><a href id = "logOut">Logout</a><br></p>-->
                
                <button id ="logoutBtn">Logout</button>
                
            </div>
            <div id = "mainBar">
                <h1>Dashboard</h1>
                <button id = "postJobButtn">Post a Job</button>
                <h3>Available Jobs</h3>
            
                <table>
                    <tr id = "tableHead">
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Category</th>
                        <th>Date</th>
                    </tr>
                    <tr id = "bottmBorder">
                        <td>Jamaica Gleaner</td>
                        <td><a href="">Product Marketing Manager</a></td>
                        <td>Sales & Marketing</td>
                        <td>Nov 3, 2018</td>
                    </tr>
                    <tr>
                        <td>UWI - MITS</td>
                        <td><a href="">Software Engineering</a></td>
                        <td>Programming</td>
                        <td>Nov 2, 2018</td>
                    </tr>
                    <tr>
                        <td>NCB</td>
                        <td><a href="">Business Analyst-Scrum Master</a></td>
                        <td>Business & Management</td>
                        <td>Nov 1, 2018</td>
                    </tr>
                    <tr>
                        <td>Jamaica Yellow Pages</td>
                        <td><a href="">UX/UI Designer</a></td>
                        <td>Design</td>
                        <td>Oct 20, 2018</td>
                    </tr>
                    <tr>
                        <td>UWI - Bursary</td>
                        <td><a href="">Director Customer Support</a></td>
                        <td>Customer Support</td>
                        <td>Oct 20, 2018</td>
                    </tr>
                    <tr>
                        <td>Sagicor Bank</td>
                        <td><a href="">Senior Systems Engineer</a></td>
                        <td>DevOps & Sysadmin</td>
                        <td>Oct 20, 2018</td>
                    </tr>
                </table>
                <br>
                <h3>Jobs Applied For</h3>
                <table>
                    <tr id = "jobsAppliedHead">
                        <th>Company</th>
                        <th>Job Title</th>
                        <th>Category</th>
                        <th>Date Applied</th>
                    </tr>
                    <tr>
                        <td>Jamaica Yellow Pages</td>
                        <td><a href="">UX/UI Designer</a></td>
                        <td>Design</td>
                        <td>Oct 21, 2018</td>
                    </tr>
                    <tr>
                        <td>Basecamp</td>
                        <td><a href="">Software Engineer</a></td>
                        <td>Programming</td>
                        <td>May 5, 2018</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>