<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Web Application"/>
    <meta name="keywords" content="HTML, JavaScript, php"/>
    <meta name="outhor" content="Van Cuong Bui"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Searching from Database</title>
</head>
<body>
    <!-- Login function -->
    <form method="POST" action="manage.php">
        <fieldset><legend>Searching Fields</legend>
            <p class="row">	<label for="refNo">By Reference Number: </label>
                <input type="text" name="refNo" id="refNo" /></p>
            <p class="row">	<label for="firstname">By Firstname: </label>
                <input type="text" name="firstname" id="firstname" /></p>
            <p class="row">	<label for="lastname">By Lastname: </label>
                <input type="text" name="lastname" id="lastname" /></p>		
            <p>	<input type="submit" value="Search" name="submit"/></p>
        </fieldset>
    </form>
    
    <?php 
        //check login 
        if (isset($_POST["login"])) {
           if  (isset($_POST["username"])) {
               $user = sanitiseInput($_POST["username"]);
           }
           else {
               $user = "";
           }
           if  (isset($_POST["password"])) {
            $pass = sanitiseInput($_POST["password"]);
            }
            else {
                $pass = "";
            }           
            
            $loginStatus = loginCheck ($user, $pass);
            echo "<p>", $loginStatus, "</p>";
            if ($loginStatus == true) {
                //createSearchForm(); //call function to create search form
                if (isset($_POST["submit1"])) {  //make sure manager submit the form
                    echo "<p> Button was clicked</p>";
                    $searchInfos = array(3);
                    $htmlName = array("refNo", "firstname", "lastname");
                    for ($i=0; $i< count($htmlName); $i++) {
                        if (isset($_POST[$htmlName[$i]])) {     //make sure user does not inject data
                            $searchInfos[$i] = sanitiseInput($_POST[$htmlName[$i]]);
                            echo "<p>", $_POST[$htmlName[$i]], "</p>";
                        }
                        else {
                            $searchInfos[$i] = "";
                            echo "<p>Error: User try to inject data into the php page</p>";
                        }
                    }
                    echo "<p>",$searchInfos[0], $searchInfos[1], $searchInfos[2],"</p>";
                    //searchData ($searchInfos[0], $searchInfos[1], $searchInfos[2]);
                    
                }
                else {
                    //header ('location: login.html');
                    echo "<p> Button was not click yet</p>";
                }
            }
            else {
                echo "<p> Login faillure</p>";
            }
                        
            //Create function to insert a row into the database                     
        }
        else {
            //header ('location: manage.html');
        }
        
    ?>
    <?php
         function sanitiseInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
   
        function loginCheck ($userName, $passWord) {
            $check = false;
            //setting for the connection
            require ("settings.php");
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
                    $count = mysqli_num_rows($result);
                    echo "<p>", $count, "</p>";
                    if ($count != 1) {
                        echo "<p class=\"wrong\">Login failure, invalid username or/and password </p>";
                    }
                    else {
                        echo "<p class=\"ok\"> Login successfully </p>";
                        $check = true;
                    }
                
                                        
                }
                
                //free up memory
            mysqli_free_result($result);
            }
                        
            
            mysqli_close($conn);
            return $check;
        } 
   
        function createSearchForm() {
            echo "<h1>Job management Form</h1>";
            echo "<form method=\"POST\" action=\"manage.php\">";
            echo "<fieldset><legend>Searching Fields</legend>";
                echo "<p class=\"row\">	<label for=\"refNo\">By Reference Number: </label>
                    <input type=\"text\" name=\"refNo\" id=\"refNo\" /></p>";
                echo "<p class=\"row\">	<label for=\"firstname\">By Firstname: </label>
                    <input type=\"text\" name=\"firstname\" id=\"firstname\" /></p>";
                echo "<p class=\"row\">	<label for=\"lastname\">By Lastname: </label>
                    <input type=\"text\" name=\"lastname\" id=\"lastname\" /></p>";               	
                echo "<p>	<input type=\"submit\" value=\"Search\" name=\"search1\"/></p>";
            echo "</fieldset>";
            echo "</form>";
        }
 
           
        
    //Create function to insert a row into the database
    function searchData ($refNo, $firstname, $lastname) {
        //setting for the connection
        echo "<p>Check whether searchData() is being called</p>";
        require ("settings.php");
        //processing multiple input fields for search
        $sqlTable = "eoi";        
        $conn = @mysqli_connect($servername, $username, $password, $myDB);
        $searchInfos = array($refNo, $firstname, $lastname);
        $dataFields = array("refNo", "firstname", "lastname");
        $searchQuery = "SELECT * FROM $sqlTable WHERE ";
        for ($i=0; $i<count($dataFields); $i++) {
            if ($searchInfos[$i] != "") {
                $searchInfos[$i] = mysqli_real_escape_string($conn, $searchInfos[$i]);
                $searchQuery = $searchQuery . "$dataFields[$i] LIKE '$searchInfos[$i]%' AND ";
            }
        }

        
        if (!$conn) {
            echo "<p>Connection to database failure</p>";
        }
        else {
            //substring to remove "AND" at the end of the string
            $query = substr($searchQuery, 0, strlen($searchQuery) - 4);
            $result = mysqli_query($conn, $query);
            //if the result is true
            if (!$result) {
                echo "<p class=\"wrong\">There is something wrong with", $query, "</p>";
            }
            else {
                echo "<form method=\"POST\" action=\"manage.php\">";
                echo "<p class=\"ok\"> Display searching data </p>";
                echo "<table border=\"1\">Search Result\n";
                echo "<tr>\n" . 
                    "<th scope=\"col\">refNo</th>" . 
                    "<th scope=\"col\">firsname</th>" . 
                    "<th scope=\"col\">lastname</th>" .
                    "<th scope=\"col\">dateOfBirth</th>" .
                    "<th scope=\"col\">gender</th>" .
                    "<th scope=\"col\">street</th>" .
                    "<th scope=\"col\">suburb</th>" .
                    "<th scope=\"col\">state</th>" .
                    "<th scope=\"col\">postcode</th>" .
                    "<th scope=\"col\">email</th>" .
                    "<th scope=\"col\">phoneNo</th>" .
                    "<th scope=\"col\">skills</th>" .
                    "<th scope=\"col\">otherSkills</th>" .
                    "<th scope=\"col\">status</th>" .
                    "</tr>\n";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>", $row["refNo"], "</td>\n";
                    echo "<td>", $row["firstname"], "</td>\n";
                    echo "<td>", $row["lastname"], "</td>\n";
                    echo "<td>", $row["dateOfBirth"], "</td>\n";
                    echo "<td>", $row["gender"], "</td>\n";
                    echo "<td>", $row["street"], "</td>\n";
                    echo "<td>", $row["suburb"], "</td>\n";
                    echo "<td>", $row["state"], "</td>\n";
                    echo "<td>", $row["postcode"], "</td>\n";
                    echo "<td>", $row["email"], "</td>\n";
                    echo "<td>", $row["phoneNo"], "</td>\n";
                    echo "<td>", $row["skills"], "</td>\n";
                    echo "<td>", $row["otherSkills"], "</td>\n";
                    echo "<td>", $row["status"], "</td>\n";
                    echo "</tr>\n";
                }
            echo "</table>";
            echo "<p>	<input type=\"submit\" value=\"Delete current record\" name=\"deleteAll\"/></p>";
            echo "<p>	<input type=\"submit\" value=\"Update current record status\" name=\"updateAtatus\"/></p>";                      
            echo "</form>";
            //free up memory
        mysqli_free_result($result);
            }
            //writing 
                    
        }
        mysqli_close($conn);
    }       
    
?>
<!-- Login function -->

    

</body>
</html>