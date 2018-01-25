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
<h1>Sign out form</h1>
<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: login.php");
   }
?>

</body>
</html>