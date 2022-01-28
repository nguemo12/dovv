<?php
include("connection.php");
session_start();
$pabs=$_SESSION['username'];
$sql="update user set status='hors-ligne' where fullname='".$pabs."'";
$query= mysqli_query($connect,$sql) or die('error on query');
unset($_SESSION['username']);
header('location: index.php');
?>