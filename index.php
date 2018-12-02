<?php require "header.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="login_page.css" />
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="new_user.js" type="text/javascript"></script>
	</head>
	<body>
		<?php 
		$host = getenv('IP');
		$username = getenv('C9_USER');
		$password = '';
		$dbname = 'hireme';
		$emailErr = $invalidEmailPass = $passwordErr =  "";
		$email =  $userPassword = "" ;
		
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
				if(empty($_POST['email'])){
					$emailErr = "Email is required"; }
				else {
					$email = test_input($_POST['email']);
				    }
				if(empty($_POST['password']))
				{
		      $passwordErr = "Password is required";
		  }
		  else {
		      $userPassword = test_input($_POST['password']);
		  }
        $stmt = $conn->prepare("SELECT * FROM Users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($userPassword, $user['password']))
        {
            $_SESSION['user'] = $user;
            if ($_SESSION['user']['email'] == "admin@hireme.com")
            {
            	$_SESSION["role"] = 1;
            }
            else 
            {
            	$_SESSION["role"] = 2;
            }
            header('Location: dashboard.php');
            //header('Location: http://' . $_SERVER['HTTP_HOST'] . '/dashboard.html', true, 303);
            exit;
            
        }
        else {
             $passwordErr = "Oops! Invalid email or password";
        }
    }

 }
 catch(PDOException $e)
 {
     echo $pdoQuery . "<br>"
       . $e->getMessage(); 
 }
 $conn = null;
		?>
		<div id="generalcontainer">
			<div id = "loginBox">
	        	<h1>User Login</h1>
	    		<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	    			<label>Email:</label>
	    			<input id="email" type="Email" name="email" placeholder="Email" required/>
	    			<div class = "error">*<?php echo $emailErr;?></div><br/><br/>
	   	        
	   	        	<label>Password:</label>
	   	        	<input id="password" type="password" name="password" placeholder="Password" required/>
	   	        	<div class = "error">*<?php echo $passwordErr;?></div><br/><br/>
	   	        	<input id = "forgotpasswordButtn" type="submit" name="forgotsubmit" value="FORGOT PASSWORD?"/><br/><br/>
	   	        	<input id = "logInButtn" type="submit" name="submit" value="LOGIN"/>
	   	    	</form>
	   		</div>
	   </div>
	</body>
</html>
