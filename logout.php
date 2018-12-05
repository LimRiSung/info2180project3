<?php
session_start(); 
session_unset();
if (isset($_SESSION['user'])) {
    destroySession();
    session_destroy();
    echo "You have successfully been logged out.";
    header('Location: index.php');
}
exit;
?>