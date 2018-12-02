<?php
        $jobTitle = $_GET['jobTitle'];
        $host = getenv('IP');
		$username = getenv('C9_USER');
		$password = '';
		$dbname = 'hireme';
		
		
		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if (isset($_GET['jobTitle'])) 
             {
             	$stmt = $conn->query("SELECT * FROM Jobs WHERE job_title = '$jobTitle'");
		     }
		     
		       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		       foreach($results as $row) {
		       	echo "<div";
		       	echo "<h1 id = 'jobTitle'>" . $row['job_title'] . "</h1>";
		       	echo "<button id = 'applyButtn'>Apply Now</button>";
		       	echo "<p id = 'datePosted'>" . $row['date_posted'] . "</p>";
		       	echo "<p id = 'category'>" . $row['category'] . "</p>";
		       	echo "<h3 id = 'company'>" . $row['company_name'] . "</h3>";
		       	echo "<h3 id = 'location'>" . $row['company_location'] ."</h3>";
		       	echo "</div";
		       	echo "<hr>";
		       	echo "<div>";
                echo "<h2 id = 'jobDescript'>Job Description</h2>";
                echo "<p id = 'contentJobDescript'>" . $row['job_description'] . "</p>";
                echo "</div>";
 	
		       }
		    }
			catch(PDOException $e)
           {
               echo "Error: " .  $e->getMessage(); 
            }
		
		      $conn = null;	
		
?>