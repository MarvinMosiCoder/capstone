<?php
include('connection/configuration.php');

$user_check=$_SESSION['username'];

$ses_sql = mysqli_query($conn,"SELECT username FROM admin WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];

if(!isset($user_check))
{
header("Location: adminLog.php");
}
?>	