<?php
include("db.php");
$id = $_GET['id'];
$sname = $_GET['name'];
$cname = $_GET['cname'];
$cid = $_GET['cid'];
$tid = $_GET['tid'];
$section = $_GET['section'];
$sql1 = "SELECT * FROM `ta` WHERE  cid='$cid' AND section='$section'"; //specifiq student niye kaaj korchi
$r = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($r);
if ($row) {
    echo "<script type='text/javascript'>if (window.confirm('Already Added'))
    {
    window.open('t_home.php','t_home.php');
    
    }
    else{
        window.open('t_home.php','t_home.php');
    };</script>";

} else {






    $sql = "INSERT INTO `ta`( `sname`, `sid`, `cname`, `cid`, `section`,tid,status) VALUES ('$sname','$id','$cname','$cid','$section','$tid','Pending')";
    mysqli_query($conn, $sql);
    header("location:t_ss.php?id=$cid&&section=$section"); //insert koriyechi TA houar por
}


?>