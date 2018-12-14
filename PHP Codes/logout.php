<?php   
session_start();  
unset($_SESSION['sess_ename']);  
session_destroy();  
header("location:emplogin.php");  
?> 