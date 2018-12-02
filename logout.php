<?php
session_start(); 
session_unset();
session_destroy();
header('Location: index.php');
//header('Location: http://' . $_SERVER['HTTP_HOST'] . 'index.php', true, 303);
exit;
?>