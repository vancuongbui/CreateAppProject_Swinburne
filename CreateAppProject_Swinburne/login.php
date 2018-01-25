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
<form class="form" id="applyForm" action="login.php" method="post" novalidate="novalidate">                                                                                                        
<!--<div class="personal_container">-->
    <fieldset>
        <legend>Login detail</legend>   
        <div class="personal_item">                             
            <p class="form_item"><label for="username" >Username</label>
                    <input type="text" name="username" id="username" pattern="[a-zA-Z0-9]+" maxlength="20" 
                    required="required"/></p>
            <p class="form_item"><label for="password" >password</label>
                    <input type="text" name="password" id="password" pattern="[a-zA-Z]+" maxlength="20"
                    required="required"/></p>
        </div>            
        <div class="submit">     
            <input type="submit" value="Login" class="buttons" name="login"/>
            <input type="reset" value="Reset"   class="buttons"/>                
        </div>
    </fieldset>                     
</form>
<?php 
     
    //get data from _POST
    session_start();   
    if (isset($_POST["login"]))   {            
        $searchInfos = array(2);
        $htmlName = array("username", "password");
        for ($i=0; $i< count($htmlName); $i++) {
            echo "<p>", $_POST[$htmlName[$i]], "</p>";
            if (isset($_POST[$htmlName[$i]])) {     //make sure user does not inject data
                $searchInfos[$i] = sanitiseInput($_POST[$htmlName[$i]]);
                echo "<p>", $searchInfos[$i], "</p>";
            }
            else {
                $searchInfos[$i] = "";
                echo "<p>Error: User try to inject data into the php page</p>";
            }
        }
        if ($searchInfos[0] !="" && $searchInfos[1] !="") {
            searchData ($searchInfos[0], $searchInfos[1]);
        }
        else {
            
        }
    }
    
    //Create function to insert a row into the database
    function searchData ($userName, $passWord) {
        //setting for the connection
        require_once ("settings.php");
        //processing multiple input fields for search
        $sqlTable = "usertable";
        $myDB = "userdb";   //change the name of the db from settings.php        
        $conn = @mysqli_connect($servername, $username, $password, $myDB);        
        $searchQuery = "SELECT * FROM $sqlTable WHERE username = '$userName' AND 
                        password = '$passWord'";    
        
        if (!$conn) {
            echo "<p>Connection to database failure</p>";
        }
        else {                        
            $result = mysqli_query($conn, $searchQuery);
            //if the result is true
            if (!$result) {
                echo "<p class=\"wrong\">Sonething wrong with the query </p>";
            }
            else {
                $count = mysqli_num_rows($result);  //count number of record from results
                if ($count != 1) {
                    echo "<p class=\"wrong\">Login failure, invalid username or/and password </p>";
                    //header('Location: login.html');
                }
                else {
                    echo "<p class=\"ok\"> Login successfully </p>";
                    $_SESSION["login_user"] = $userName;    //keep username on the session
                    
                    header('Location: manage.php');     //move to manage.php
                }             
                                    
            }
            echo "</table>";
            //free up memory
        mysqli_free_result($result);
        }                     
        
        mysqli_close($conn);
    }
    //Create function to sanitaise input data from user
    function sanitiseInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }    
?>   

</body>
</html>