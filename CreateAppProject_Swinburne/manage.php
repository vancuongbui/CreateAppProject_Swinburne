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
        <p>	<input type="submit" value="Delete by RefNo" name="delete"/>
            <input type="text" value="" name="selectRefNo"/>
        </p>
        <p> <input type="submit" value="Update status" name="updateStatus"/>
            <label> Please Select
                <select name="selectStatus">
                    <option value="">None</option>
                    <option value="New">New</option>
                    <option value="Current">Current</option>
                    <option value="Final">Final</option>                    
                </select>
            </label>
        </p>
	</fieldset>
    </form>
    <h2><a href="logout.php">Sign out</a></h2>
<?php 
    //process update the status
    session_start();
    if (!isset($_SESSION["login_user"])) {
        header ('location: login.html');
    }
    
    if (isset($_POST["updateStatus"])) {
        if (isset($_POST["selectStatus"])) {
            $newStatus = $_POST["selectStatus"];
            if ($newStatus == "New" || $newStatus == "Current" || $newStatus == "Final") {
                $inputData = getInput();
                updateStatus($inputData[0],$inputData[1],$inputData[2], $newStatus);
            }
            else {
                echo "<p>There is something wrong with data from the form</p>";
            }
            echo "<p>The data was not sent from the form</p>";
        }
        else {
            echo "<p>the update button was not updated</p>";
        }
    }
    else {
        //header ('location: login.html');
    }
    //get data from _POST
    if (isset($_POST["submit"])) {  //make sure manager submit the form
        
        $searchInfo = getInput();
       
        searchData ($searchInfo[0], $searchInfo[1], $searchInfo[2]);
    }
    else {
        //header ('location: manage.php');
    }
    //delete records by reference number
    if (isset($_POST["delete"])) {
        if (isset($_POST["selectRefNo"])) {
            $selectedNo = sanitiseInput($_POST["selectRefNo"]);
            //call function to delete
            deleteByRefNo($selectedNo);
        }
    }
    
    function getInput () {
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
        return $searchInfos;
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
        $deleteQuery = "DELETE FROM $sqlTable WHERE ";
        for ($i=0; $i<count($dataFields); $i++) {
            if ($searchInfos[$i] != "") {
                $searchInfos[$i] = mysqli_real_escape_string($conn, $searchInfos[$i]);
                $searchQuery = $searchQuery . "$dataFields[$i] LIKE '$searchInfos[$i]%' AND ";
                $deleteQuery = $deleteQuery . "$dataFields[$i] LIKE '$searchInfos[$i]%' AND ";
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
            echo "<p>	<input type=\"submit\" value=\"Delete current record\" name=\"delete\"/></p>";
            echo "<p>	<input type=\"submit\" value=\"Update current record status\" name=\"updateAtatus\"/></p>";                      
            echo "</form>";
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

    function deleteByRefNo($refNo) {
        //setting for the connection
        require_once ("settings.php");
        //processing multiple input fields for search
        $sqlTable = "eoi";        
        $conn = @mysqli_connect($servername, $username, $password, $myDB);     
        
        $query = "DELETE FROM $sqlTable WHERE refNo = '$refNo'";
                
        if (!$conn) {
            echo "<p>Connection to database failure</p>";
        }
        else {            
            
            $result = mysqli_query($conn, $query);
            //if the result is true
            if (!$result) {
                echo "<p class=\"wrong\">There is something wrong with", $query, "</p>";
            }
            else {
                echo "<p>Sucessfully deleted recordes with Reference number: ", $refNo, "</p>";
            }
        }
    }
    
    function updateStatus($refNo, $firstname, $lastname, $status) {
        //setting for the connection
        require_once ("settings.php");
        //processing multiple input fields for search
        $sqlTable = "eoi";        
        $conn = @mysqli_connect($servername, $username, $password, $myDB);
        $searchInfos = array($refNo, $firstname, $lastname);
        $dataFields = array("refNo", "firstname", "lastname");       
        $searchQuery = "UPDATE $sqlTable set status='$status' WHERE ";
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
                echo "<p>Sucessfully updated status of the records";
            }
                      
        }
        
        mysqli_close($conn);
    }

    
    
?>
    

</body>
</html>