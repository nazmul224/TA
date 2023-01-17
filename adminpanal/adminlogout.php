<?php
session_start();
unset($_SESSION['admin']); //unset value and back login page

header("location: adminlogin.php");


?>