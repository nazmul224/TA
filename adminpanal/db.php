<?php
$server ="localhost";
$username ="root"; //server a login kortay username and pass lag a. bydefolt root use korahoisay .
$password =""; //defolt password null;
$database ="ta";

$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("Error".mysqli_connect_error());
}

?>