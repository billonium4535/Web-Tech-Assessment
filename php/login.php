<?php
session_start();
if(isset($_SESSION['loggedIn'])) header("Location: ../html/login.html");

/* process login data */
if(!isset($_POST['username']) || !isset($_POST['password'])) {
 header("Location: ../html/login.html");
}
$u = $_POST['username'];
$p = $_POST['password'];
if($u=="admin" && $p=="password") {
 $_SESSION['loggedIn']=TRUE; $_SESSION['username']="admin";
 header("Location: ../html/login.html");
 echo $_SESSION['username'];
 }
elseif($u=="admin2" && $p=="password") {
 $_SESSION['loggedIn']=TRUE; $_SESSION['username']="admin2";
 header("Location: ../html/login.html");
 echo $_SESSION['username'];
 }
else{
 header("Location: ../html/login.html");
 }
?>
