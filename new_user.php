<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Adding New User</title>
        <link href="new_user.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="new_user.js" type="text/javascript"></script>
    </head>
    
    <body>
        <?php
        $host = getenv('IP');
        $username = getenv('C9_USER');
        $password = '';
        $dbname = 'hireme';
        $firstNameErr = $lastNameErr = $userPasswordErr = $confirmPasswordErr = $notEqualErr = $emailErr = $telephoneErr = "";
        $firstName = $lastName =  $userPassword = $confirmPassword = $email = $telephone = "";
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            
        }
        
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (isset($_POST['submit'])) {
                if(empty($_POST['firstname']))
                {
                    $firstNameErr = "First Name is required";
                }
                else {
                    $firstName = test_input($_POST['firstname']);
                    if(!preg_match("/^[a-zA-Z]*$/", $firstName))
                    {
                        $firstNameErr = "Oops! Only letters and whitespace allowed";
                    }
                    }
                if(empty($_POST['lastname']))
                    {
                        $lastNameErr = "Last Name is required";
                    }
                    else {
                        $lastName = test_input($_POST['lastname']);
                        if(!preg_match("/^[a-zA-Z]*$/", $firstName))
                        {
                            $firstNameErr = "Oops! Only letters and whitespace allowed";
                        }
                        }
                if(!empty($_POST['password']) && ($_POST['password'] == $_POST['confirmpass'])){
                    $userPassword = test_input($_POST['password']);
                    $confirmPassword = test_input($_POST['confirmpass']);
                    if(strlen($_POST['password']) <= 8)
                    {
                        $passwordErr = "Password Must Contain At Least 8 Characters!";
                    }
                    }
                elseif (!empty($_POST['password']))
                {
                    $confirmPasswordErr = "Passwords does not match!";
                    
                }
                else {
                    $userPasswordErr = "Password is required";
                    }
                if(empty($_POST['email']))
                {
                    $emailErr = "Email is required";
                }
                else {
                    $email = test_input($_POST['email']);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        $emailErr = "Oops! Invalid Email Format";
                    }
                    }
                if(empty($_POST['telephone']))
                {
                    $telephoneErr = "Telephone Number is required";
                }
                else {
                    $telephone = test_input($_POST['telephone']);
                    if(! preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $telephone))
                    {
                        $telephoneErr = "Oops! Invalid Telephone Format! The Phone Number Must Have A Format of: 000-000-0000";
                    }
                }
      
    $userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
    $pdoQuery = "INSERT INTO Users (firstname, lastname, password, telephone, email, date_joined) VALUES ('$firstName', '$lastName', '$userPassword' , '$telephone', '$email', CURDATE())";
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
                <img src="https://openclipart.org/download/68863/sweet-home.svg"/><a href id = "home">Home</a><br/><br/>
                <img src="https://www.freeiconspng.com/uploads/user-add-icon---shine-set-add-new-user-add-user-30.png"/><a href id = "addUser">Add User</a><br/><br/>
                <img src="https://www.clipartmax.com/png/full/33-330391_briefcase-work-job-work-icon-ico.png"/><a href id = "newJob">New Job</a><br/><br/>
                <img src="https://png2.kisspng.com/sh/57a976f26d3b43a3a9cb650ca51eb22b/L0KzQYm3V8E1N6lngJH0aYP2gLBuTgBwf5Z3ReVEbXLyfH7qjB1xfaVqip9yY3Bxg37zjBdwfaUygdV4bj24coXog8A0OGM6fKg9Nz67SIa6VMg6OmI6S6MBMkW4QoG4VcUveJ9s/kisspng-power-symbol-computer-icons-logout-icon-5b4ac03025d647.885348921531625520155.png"/><a href id = "logOut">Logout</a><br><br/>
            </div>
            <div id = "mainBar">
                <h1>New User</h1>
                <form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <label>Firstname: <br/><br/>
                    <input id = "firstName" type="text" name="firstname" placeholder="eg: Mary"/><div class = "error">*
	    			<?php echo $firstNameErr;?></div><br/><br/></label>
                    
                
                    <label>Lastname: <br/><br/>
                    <input id = "lastName" type="text" name="lastname" placeholder="eg: Jane"/><div class = "error">*
	    			<?php echo $lastNameErr;?></<div><br/><br/></label>
                
                    <label>Password: <br/><br/>
                    <input id = "passWord" type="password" name="password"/><div class = "error">*
	    			<?php echo $passwordErr;?></div><br/><br/></label>
                    
                    <label>Confirm Password: <br/><br/>
                    <input id="confirmPass" type="password" name="confirmpass"/><div class = "error">*
	    			<?php echo $confirmPasswordErr;?></div><br/><br/></label>
	   	            
                    <label>Email: <br/><br/>
                    <input id = "emailAdd" type="text" name="email" placeholder="eg. mary.jane@example.com"/><div class = "error">*
	    			<?php echo $emailErr;?></div><br/><br/></label>
                
                    <label>Telephone: <br/><br/>
                    <input id = "telephoneNo" type="text" name="telephone" placeholder="eg. 876-999-8989"/><div class = "error">*
	    			<?php echo $telephoneErr;?></div><br/><br/></label>
                
                    <input id = "submitButtn" type="submit" name="submit" value="SUBMIT"/>
                </form>
            </div>
           
        </div>
    </body>
</html>