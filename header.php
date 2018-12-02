<?php
session_start();
if($_SESSION['user'])
 {
    $loggedUser = $_SESSION['user']['id'];
 } 
 else{
       header('Location: index.php');
     }
?>