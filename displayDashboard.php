<?php
		echo "<table>";
        echo "<tr id = 'tableHead'>
              <th>Company</th>
              <th>Job Title</th>
              <th>Category</th>
              <th>Date</th>
              </tr>";
        class TableRows extends RecursiveIteratorIterator {
        	function __construct($it)
        	{
        		parent::__construct($it, self::LEAVES_ONLY);
        	}
        	
        	function current()
        	{
        		return "<td" . parent::current() . "</td.";
        	}
        	
        	function beginChildren()
        	{
        		echo "<tr>";
        	}
        	
        	function endChildren() {
        		echo "</tr>" . "\n";
        	}
        }
		
		$host = getenv('IP');
		$username = getenv('C9_USER');
		$password = '';
		$dbname = 'hireme';
		
		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT company_name, job_title, category, date_posted FROM Jobs");
			$stmt->execute();
			
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
				echo $v;
			}
		}
		catch(PDOException $e)
       {
          echo "Error: " .  $e->getMessage(); 
       }
          echo "</table>";
		  echo "<br>";
		  echo "<h3>Jobs Applied For</h3>";
		  echo "<table>";
          echo "<tr id = 'jobsAppliedHead'>
              <th>Company</th>
              <th>Job Title</th>
              <th>Category</th>
              <th>Date Applied</th>
              </tr>";
        try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT Jobs.company_name, Jobs.job_title, Jobs.category, JobsAppliedFor.date_applied FROM Jobs INNER
			JOIN JobsAppliedFor ON Jobs.id = JobsAppliedFor.job_id");
			$stmt->execute();
			
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
				echo $v;
			}
		}
		catch(PDOException $e)
       {
          echo "Error: " .  $e->getMessage(); 
       }
          echo "</table>";
		
		$conn = null;
?>