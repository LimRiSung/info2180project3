<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$jobTitleErr = $jobDescriptionErr = $categoryErr = $companyErr = $companyLocationErr = "";
$jobTitle = $jobDescription = $category = $company = $companyLocation = "";

function test_input($data)
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['submit'])) {
        if(empty($_POST['jobtitle']))
        {
            $jobTitleErr = "Job Title is required";
        }
        else {
            $jobTitle = test_input($_POST['jobtitle']);
            if(!preg_match("/^[a-zA-Z/-]*$/", $jobTitle))
            {
                $jobTitleErr = "Oops! Only letters, a slash and whitespace allowed";
            }
        }
        if(empty($_POST['jobdescript']))
        {
            $jobDescriptionErr = "Job Description is required";
        }
        else {
            $jobDescription = test_input($_POST['jobdescript']);
            if(!preg_match("/^[a-z0-9\040\.\-:]+$/i", $jobDescription))
            {
                $jobDescriptionErr = "Oops! Only letters, numbers, period, colon, dash and whitespace allowed";
            }
        }
        if(empty($_POST['category']))
        {
            $categoryErr = "Job Category is required";
        }
        else {
            $category = test_input($_POST['category']);
            if(!empty($category) && ($category != "business") && ($category != "customer") && ($category != "design")
            && ($category != "development") && ($category != "engineering") && ($category != "program") && ($category != "sales"))
            {
                $categoryErr = "Invalid category";
            }
        }
        if(empty($_POST['compay']))
        {
            $companyErr = "Company is required";
        }
        else {
            $company = test_input($_POST['compay']);
            if(!preg_match("/^[a-zA-Z]*$/", $company))
            {
                $companyErr = "Oops! Only letters and whitespace allowed";
            }
        }
        if(empty($_POST['joblocat']))
        {
            $companyLocationErr = "Company Location is required";
        }
        else {
            $companyLocation = test_input($_POST['joblocat']);
            if(!preg_match("/^[a-zA-Z,]*$/", $company))
            {
                $companyErr = "Oops! Only letters, comma and whitespace allowed";
            }
            
        }
    $pdoQuery = "INSERT INTO Jobs (job_title, job_description, category, company_name, company_location, date_posted) VALUES ('$jobTitle', '$jobDescription', '$category', '$company', '$companyLocation', CURDATE())";
    $conn->exec($pdoQuery);
    }
}
catch (PDOException $e)
   {
       echo $pdoQuery . "<br>"
       . $e->getMessage();
   }
   
   $conn = null;
    
?>