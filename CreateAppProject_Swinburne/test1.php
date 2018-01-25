<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="Description" content="Assignment 3 - Web Application"/>
        <meta name="keywords" content="HTML, CSS, JavaScript"/>
        <meta name="author" content="Van Cuong Bui"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Assignment 3</title>
        <link rel="stylesheet" href="styles/styles.css"/>
        <link rel="stylesheet" href="styles/styles.css" media="screen and (max-width:720px)"/>
        <script type="text/javascript" src="scripts/enhancement.js"></script>
        <!--<script type="text/javascript" src="scripts/apply.js"></script>-->
        <!--<script type="text/javascript" src="apply.js"></script>-->
    </head>
    <body id="jobs">
        <!--Area0: for logo, search and courses-->
        <?php
            include 'header.inc';
        ?>
        
        <!--Section 1 part
            source of information: https://about.udemy.com/-->
<div class="container">
    <div class="main_container">
        <section class="apply_container">
            <h1>Job management Form</h1>
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
            <!-- PHP code from here -->
            <?php 
                
                //get data from _POST
                if (isset($_POST["submit"])) {  //make sure manager submit the form
                    
                    $searchInfos = array(3);
                    $htmlName = array("refNo", "firstname", "lastname");
                    for ($i=0; $i< count($htmlName); $i++) {
                        if (isset($_POST[$htmlName[$i]])) {     //make sure user does not inject data
                            $searchInfos[$i] = sanitiseInput($_POST[$htmlName[$i]]);
                        }
                        else {
                            $searchInfos[$i] = "";
                            echo "<p>Error: User try to inject data into the php page</p>";
                        }
                    }
                    searchData ($searchInfos[0], $searchInfos[1], $searchInfos[2]);
                }
                else {
                    header ('location: manage.php');
                }
                
                
                //Create function to insert a row into the database
                function searchData ($refNo, $firstname, $lastname) {
                    //setting for the connection
                    require_once ("settings.php");
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
                        //free up memory
                    mysqli_free_result($result);
                        }
                                
                    }
                    mysqli_close($conn);
                }
                
                function sanitiseInput($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                
            ?>
                
        </section>
    </div>
    <?php
        include 'aside.inc';
    ?>
</div>       
<?php
    include 'footer.inc';
?>
    </body>
</html>
