<?php require "header.php" ?>
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
        if (isset($_SESSION['user']['email']))
        {
            $loggedOnUser = $_SESSION['user']['email'];
        }
        
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
            if (isset($_POST['submit'])) 
            {
                echo "Hello";
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
                        if(!preg_match("/^[a-zA-Z]*$/", $lastName))
                        {
                            $lastNameErr = "Oops! Only letters and whitespace allowed";
                        }
                        }
                if(!empty($_POST['password']) && ($_POST['password'] == $_POST['confirmpass'])){
                    $userPassword = test_input($_POST['password']);
                    $confirmPassword = test_input($_POST['confirmpass']);
                    if(strlen($_POST['password']) < 8)
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
    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = '$email'");
    $stmt->execute();
    $user = $stmt->fetch();
    echo $user;
    if ($user['email'])
    {
        $emailErr = "This email has been used already";
    }
    else {
        $pdoQuery = "INSERT INTO Users (firstname, lastname, password, telephone, email, date_joined) VALUES ('$firstName', '$lastName', '$userPassword' , '$telephone', '$email', CURDATE())";
    $conn->exec($pdoQuery);
    }
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
                <img src="https://openclipart.org/download/68863/sweet-home.svg"/><a href="#" id = "home">Home</a><br/><br/>
                <img src="https://www.freeiconspng.com/uploads/user-add-icon---shine-set-add-new-user-add-user-30.png"/><a href="#" id = "addUser">Add User</a><br/><br/>
                <img src="https://www.clipartmax.com/png/full/33-330391_briefcase-work-job-work-icon-ico.png"/><a href="#" id = "newJob">New Job</a><br/><br/>
                <form action="logout.php" method="POST">
                    <input type="submit"value="LOGOUT">
                </form>
            </div>
            <div id = "mainBar">
                <h1>New User</h1>
                <p id = "head"></p>
                <form id = "userCreationForm" name="new_user" method = "post"  action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                    <label>Firstname:</label><br/><br/>
                    <input id = "firstName" type="text" name="firstname" placeholder="eg: Mary"/>
                    <div class = "error">*<?php echo $firstNameErr;?></div><br/><br/>
                    
                    <label>Lastname:</label><br/><br/>
                    <input id = "lastName" type="text" name="lastname" placeholder="eg: Jane" />
                    <div class = "error">*<?php echo $lastNameErr;?></<div><br/><br/>
                
                    <label>Password:</label><br/><br/>
                    <input id = "passWord" type="password" name="password"/>
                    <div class = "error">*<?php echo $passwordErr;?></div><br/><br/>
                    
                    <label>Confirm Password:</label><br/><br/>
                    <input id="confirmPass" type="password" name="confirmpass"/>
                   <div class = "error">*<?php echo $confirmPasswordErr;?></div><br/><br/>
	   	            
                    <label>Email:</label><br/><br/>
                    <input id = "emailAdd" type="text" name="email" placeholder="eg. mary.jane@example.com"/>
                    <div class = "error">*<?php echo $emailErr;?></div><br/><br/>
                
                    <label>Telephone:</label><br/><br/>
                    <input id = "telephoneNo" max="12" type="text" name="telephone" placeholder="eg. 876-999-8989" />
                   <div class = "error">*<?php echo $telephoneErr;?></div><br/><br/>
                
                    <input id = "submitButtn" type="submit" name="submit" value="SUBMIT"/>
                </form>
            </div>
        </div>
    </body>
</html>