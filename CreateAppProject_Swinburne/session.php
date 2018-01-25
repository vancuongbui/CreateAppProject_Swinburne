<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Web Application"/>
    <meta name="keywords" content="HTML, JavaScript, php"/>
    <meta name="outhor" content="Van Cuong Bui"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
</head>
<body>
<h1>Login confirmation</h1>
<?php
   include('settings.php');
   session_start();
   $sqlTable = "usertable";
   $myDB = "userdb";   //change the name of the db from settings.php
   $user_check = $_SESSION['login_user'];
   $query = "SELECT username FROM $sqltable WHERE username = '$user_check'";
   $conn = @mysqli_connect($servername, $username, $password, $myDB);
   $result = mysqli_query($conn, $query);
   
   $row = mysqli_fetch_array($result);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
</body>
</html>