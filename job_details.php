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
                <p><img src="https://openclipart.org/download/68863/sweet-home.svg"></img><a href = "#" id = "home">Home</a><br>
                <img src="https://www.freeiconspng.com/uploads/user-add-icon---shine-set-add-new-user-add-user-30.png"></img><a href = "#" id = "addUser">Add User</a><br>
                <img src="https://www.clipartmax.com/png/full/33-330391_briefcase-work-job-work-icon-ico.png"></img><a href = "#" id = "newJob">New Job</a><br>
                </p>
                <form action='<?php echo $_SERVER['PHP_SELF'];?>' method="POST">
                    <input type="submit"value="LOGOUT">
                </form>
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
                    <h3 id ="jobRequirements">Job Requirements</h3>
                    <br>
                    <p></p>
                </div>
            </div>
        </div>
    </body>
</html>

<?php require "header.php"; 
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';
$jobs = $_GET['Jobs'];

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->query("SELECT * FROM Jobs WHERE name LIKE '%$Jobs%'");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<h1>' . $row['job_title'] . '</h1>';
        echo '<p>' . $row['date_posted'] . '</p>';
        echo '<p>' . $row['category'] . '</p>';
        echo '<h3>' . $row['company_name'] . '</h3>';
        echo '<h3>' . $row['company_location'] . '</h3>';
        echo '<p>' . $row['job_description'] . '</p>';
 ?>     
