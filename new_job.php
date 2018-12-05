<?php require "header.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>New Job</title>
        <link href="new_job.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="new_job.js" type="text/javascript"></script>
    </head>
    <body>
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
		          if(empty($_POST['jobtitle'])){
		              $jobTitleErr = "Job Title is required";
                }
              else {
                     $jobTitle = test_input($_POST['jobtitle']);
                     if(!preg_match("/^[a-zA-Z/-]*$/", $jobTitle))
                     {
                        $jobTitleErr = "Oops! Only letters, a slash and whitespace allowed";
                     }
                    }
               if(empty($_POST['jobdescript'])) {
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
                if(empty($_POST['company']))
                    {
                      $companyErr = "Company is required";
                    }
                else {
                      $company = test_input($_POST['company']);
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
                   $joblocat = test_input($_POST['joblocat']);
                   if(!preg_match("/^[a-zA-Z,]*$/", $joblocat)) {
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
        <div id = "headerBar">
            <h3><marquee>HireMe</marquee></h3>
        </div>
        <div id="generalcontainer">
            <div id = "sideBar">
                <p><img src="https://openclipart.org/download/68863/sweet-home.svg"></img><a href = "#" id = "home">Home</a><br>
                <img src="https://www.freeiconspng.com/uploads/user-add-icon---shine-set-add-new-user-add-user-30.png"></img><a href = "#" id = "addUser">Add User</a><br>
                <img src="https://www.clipartmax.com/png/full/33-330391_briefcase-work-job-work-icon-ico.png"></img><a href = "#" id = "newJob">New Job</a><br>
                </p>
                <form action="logout.php" method="POST">
                    <input type="submit"value="LOGOUT">
                </form>
            </div>
            <div id = "mainBar">
                <h1>New Job</h1>
                <form method = "post" onsubmit="return validatefields();" name="new_job" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
                    <label>Category: 
                    <select required name = "category" id="category">
                        <option value="">Select a category</option>
                        <option value="business">Business and Management</option>
                        <option value="customer">Customer Support</option>
                        <option value="design">Design</option>
                        <option value="development">DevOps and Sysadmin</option>
                        <option value="engineering">Engineering</option>
                        <option value="program">Programming</option>
                        <option value="sales">Sales and Marketing</option>
                    </select></label><div class = "error">*<?php echo $categoryErr;?></div><br/><br/>
                    <label>Job Title: <br/><br/>
                    <input id = "jobTitle" type="text" name="jobtitle" placeholder="eg. Senior Designer or Product Manager" required/></label><div class = "error">*
	    			<?php echo $jobTitleErr;?></div><br/><br/>
	    			<div id ="jobTitleErr" class = "error"></div>
                    
                    <label>Job Description:<br/><br/>
                    <input id = "jobDescript" type="text" name="jobdescript" required/></label><div class = "error">*
	    			<?php echo $jobDescriptionErr;?></div><br/><br/>
	    			<div id = "jobDescriptErr" class = "error"></div>
                    
                    <label>Company: <br/><br/>
                    <input id = "company" type="text" name="company" required/></label><div class = "error">*
	    			<?php echo $companyErr;?></div><br/><br/>
	    			<div id = "companyErr" class = "error"></div>
                    
                    <label>Job Location: <br/><br/>
                    <input id = "jobLocat" type="text" name="joblocat" placeholder="eg. Kingston, Jamaica" required/></label><div class = "error">*
	    			<?php echo $companyLocationErr;?></div><br/><br/>
	    			<div id = "jobLocatErr" class = "error"></div>
                    
                    <input id = "submitButtn" type="submit" name="submit" value="Submit"/>
                </form>
            </div>
        </div>
    </body>
</html>