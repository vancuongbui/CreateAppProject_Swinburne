<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Description" content="Web Application"/>
    <meta name="keywords" content="HTML, JavaScript, php"/>
    <meta name="outhor" content="Van Cuong Bui"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Processing Data Input</title>
</head>
<body>
<?php
//All function will be created from this php script
    //create a function to make input data clean
    function sanitiseInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function refNoValidate($refNo) {
        $errMsg = "";
        $refNo = sanitiseInput($refNo);
        if ($refNo == "") {
            $errMsg = "You must enter your first name";
        }
        else if (!preg_match("/^[\d]{6}$/", $refNo)) {
            $errMsg = "firstname must contain only alphal letters";
        }
        return [$errMsg,$refNo];
    }
    //validate for the firstname string
    function firstnameValidate($firstname) {
        $errMsg = "";
        $firstname = sanitiseInput($firstname);
        if ($firstname == "") {
            $errMsg = "You must enter your first name";
        }
         //check whether name contains only alpha characters and not more than 25 in length
        else if (!preg_match("/^[a-zA-Z\s]{1,25}$/", $firstname)) {
            $errMsg = "firstname must contain only and not greater than 25 alphal letters";
        }
        return [$errMsg,$firstname];
    }
    //Function to validate lastname
    function lastnameValidate($lastname) {
        $errMsg = "";
        $lastname = sanitiseInput($lastname);
        if ($lastname == "") {
            $errMsg = "You must enter your last name";
        }
        //check whether name contains only alpha characters and not more than 25 in length
        else if (!preg_match("/^[a-zA-Z_\s]{1,25}$/", $lastname)) {
            $errMsg = "lastname must contain only and not greater than 25 alphal letters";
        }
        return [$errMsg,$lastname];
    }
    //function to validate Date of Birth
    function dateOfBirthValidate($DoB) {
        $DoB = sanitiseInput($DoB);
        $errMsg = "";
        if ($DoB == "") {
            $errMsg = "You must enter your date of birth";
        }
        else if (!preg_match("/^[\d]{2}\/[\d]{2}\/[\d]{4}$/", $DoB)) {
            $errMsg = "Invalid format of date, dd/mm/yyyy";
        }
        else {
            $dateArray = explode("/", $DoB);
            foreach ($dateArray as $index) {
                $index = (int)$index;
            }
            $minDate = date_create((string)$dateArray[0]."-".(string)$dateArray[1]."-".(string)($dateArray[2]+15));
            $maxDate = date_create((string)$dateArray[0]."-".(string)$dateArray[1]."-".(string)($dateArray[2]+80));
            //get currentdate
            $now = date("d-m-Y");
            $now = date_create($now);
            //compare to make sure age > 15
            $minDiff = date_diff($minDate, $now);
            $maxDiff = date_diff($maxDate, $now);
            if ($minDiff->format("%R%a") < 0) {
                $errMsg = $errMsg . "Age must be at least 15-year old";
            }
            else if ($maxDiff->format("%R%a") > 0) {
                $errMsg = $errMsg . "Age must not greater than 80-year old";
            }
        }
        return [$errMsg,$DoB];
    }
    //Validate gender;
    function genderValidate($gender) {
        $errMsg = "";
        $genderArray = array("Male", "Female", "Other");
        if (!in_array($gender, $genderArray)) {
            $errMsg = $errMsg . "You must choose your gender";
        }
        return [$errMsg, $gender];
    }
    //Validate Street Address
    function streetValidate($street) {
        $errMsg = "";
        $street = sanitiseInput($street);
        if ($street == "") {
            $errMsg = "You must enter your street address";
        }
        //check whether name contains only alpha characters and not more than 25 in length
        else if (!preg_match("/^[a-zA-Z0-9_\s]{4,40}$/", $street)) {
            $errMsg = "street address must not contain greater than 40 alphal letters";
        }
        return [$errMsg, $street];
    }
    //Validate suburb
    function suburbValidate($suburb) {
        $errMsg = "";
        $suburb = sanitiseInput($suburb);
        if ($suburb == "") {
            $errMsg = "You must enter your suburb address";
        }
        //check whether name contains only alpha characters and not more than 25 in length
        else if (!preg_match("/^[a-zA-Z0-9_\s]{2,40}$/", $suburb)) {
            $errMsg = "suburb address must not contain greater than 40 alphal letters";
        }
        return [$errMsg,$suburb];
    }
    //state validate
    function stateValidate($state) {
        $errMsg = "";
        $state = sanitiseInput($state);
        $stateArray = array("VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT");
        if (!in_array($state, $stateArray)) {
            $errMsg = $errMsg . "Error. Please enter your state properly";
        }
        return [$errMsg, $state];
    }
    //state and postcode Validate
    function postcodeValidate($state, $postcode) {
        $errMsg = "";
        
        $state = sanitiseInput($state);
        $postcode = sanitiseInput($postcode);
        $stateArray = array("VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT");
        if (!in_array($state, $stateArray)) {
            $errMsg = $errMsg . "Error. Please enter your state properly";
        }
        else {
            if (!preg_match("/^[\d]{4}$/", $postcode)) {
                $errMsg = $errMsg . "Error. Please make sure postcode contain 4 digits";
            }
            else {
                switch ($state) {
                    case "VIC": //postcode of VIC start with 3 or 8
                    if (!in_array($postcode[0], ["3", "8"])) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;
                    case "NSW": //postcode of NSW start with 1 or 2
                    if (!in_array($postcode[0], ["1", "2"])) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;
                    case "QLD": //postcode of QLD start with 4 or 9
                    if (!in_array($postcode[0], ["4", "9"])) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;
                    case "NT": //postcode of NT start with 0
                    if (!($postcode[0] == "0")) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;
                    case "WA": //postcode of WA start with 6 
                    if (!($postcode[0] == "6")) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;
                    case "SA": //postcode of SA start with 5
                    if (!($postcode[0] == "5")) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;
                    case "TAS": //postcode of TAS start with 7 
                    if (!($postcode[0] == "7")) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;
                    case "ACT": //postcode of ACT start with 0 
                    if (!($postcode[0] == "0")) {
                        $errMsg = $errMsg . "Mismatch between postcode and state";
                    }
                    break;

                }
            }
        }
    return [$errMsg, $postcode];
    $sm[] = "sdfk";
    
    }
    //Email validate
    function emailValidate($email) {
        $errMsg = "";
        $email = sanitiseInput($email);
        if (!preg_match("/^.*@.*\..*$/", $email)) {
            $errMsg = $errMsg . "Error: Invalid email address";
        }
        return [$errMsg, $email];
    }
    //Validate phone number
    function phoneNoValidate($phoneNo) {
        $errMsg = "";
        if (!preg_match("/^[\d\s]{8,12}$/", $phoneNo)) {  //8-12 characters inluding digit and space
            $errMsg = $errMsg . "Error: Invalid phone number (8 to 12 digits)";
        }
        return [$errMsg, $phoneNo];
    }
    //Validate other skills if cheched
    function skillValidate($skills) {
        $errMsg = "";
        if (count($skills) == 0) {
            $errMsg = $errMsg . "Error: at least one skills need to be check";
        }
        else {

            //convert array to string before insert into database
            //note that $htmlNames["skills"] is supposed to be an array, need to convert to string
            $skillString = "";
            foreach ($skills as $skill) {
                $skillString = $skillString . $skill . ", ";
            }
            $skillString = sanitiseInput($skillString);
            $skillString = substr($skillString, 0, strlen($skillString)-1); //eliminate the last ","
           
        }
        return [$errMsg, $skillString];
    }
    function otherSkillsValidate($skills, $otherSkills) {
        $errMsg = "";
        //if other skill was checked, skills sent to server will look like this
        //2,3,9 (other skill was supposed to be number "9")
        if (in_array("9", $skills)) {
            if ($otherSkills == "" || $otherSkills == null) {
                $errMsg = $errMsg . "Error, Other skill field need a dsscription";
            }
        }
        return [$errMsg, $otherSkills];
    }
    //define function to get data being sent from html form
    function receivedData() {
            //get data from _POST
        //define a variable to contain the name of all fields/html elements
        $htmlNames = array("refNo", "firstname", "lastname", "dateOfBirth", "gender", "street", 
        "suburb", "state", "postcode", "email", "phoneNo", "skill", "otherSkills");
        $length = count($htmlNames);
        //check to make sure info was not inject beyond the submit form
        $errMsg = "";
        if (isset($_POST["submit"])) {
            for ($i = 0; $i < $length; $i++) {
                if (!isset($_POST[$htmlNames[$i]])) {
                    $errMsg = $errMsg . "Error: data ". $_POST[$htmlNames[$i]] . "need to be submited from the form";           
                    $htmlNames[$htmlNames[$i]] = "unknownData";
                }                
                else {
                    $htmlNames[$htmlNames[$i]] = $_POST[$htmlNames[$i]];
                    //echo "<p>", $postValues[$i], "</p>";
                }
            }
        }
        else {
            header ('location: apply.php');
        }
        
        return [$errMsg, $htmlNames];
    }
    
    //Create function to insert a row into the database
    function insertData ($refNo, $firstname, $lastname, $dateOfBirth, $gender, $street, 
    $suburb, $state, $postcode, $email, $phoneNo,  $skills, $otherSkills) {
        $EOInumber = uniqid();
        $status = "New";
        $sqlFields = array("EOInumber","refNo", "firstname", "lastname", "dateOfBirth", "gender", "street",
        "suburb", "state", "postcode", "email", "phoneNo", "skills", "otherSkills", "status");
        //setting for the connection
        require_once ("settings.php");
        $sqlTable = "eoi";        
        $conn = @mysqli_connect($servername, $username, $password, $myDB);
        if (!$conn) {
            echo "<p>Connection to database failure</p>";
        }
        else {
            //echo "<p>Connection to database successfully</p>";
            //Create table if not exist before insert into table
            $createQuery = "CREATE TABLE IF NOT EXISTS $sqlTable (
                EOInumber varchar(255),
                refNo int(11),
                firstname varchar(255),
                lastname varchar(255),
                dateOfBirth varchar(255),
                gender varchar(255),
                street varchar(255),
                suburb varchar(255),
                state varchar(255),
                postcode int(11),
                email varchar(255),
                phoneNo varchar(255),
                skills varchar(255),
                otherSkills varchar(255),
                status varchar(255),
                PRIMARY KEY (EOInumber)
                )";
            $create_result = mysqli_query($conn, $createQuery);
            if (!$create_result) {
                echo "<p>Fail to create table for unknown reason</p>";
            }
            else {
                $query = "INSERT INTO $sqlTable (EOInumber,refNo, firstname, lastname, dateOfBirth, gender, street,
                suburb, state, postcode, email, phoneNo, skills, otherSkills, status) values ('$EOInumber','$refNo', 
                '$firstname', '$lastname', '$dateOfBirth', '$gender', '$street', '$suburb', '$state', '$postcode',
                '$email', '$phoneNo',  '$skills', '$otherSkills', '$status')";           
                
                $result = mysqli_query($conn, $query);
                //echo "Test" . (string)$result;
                //if the result is true
                if (!$result) {
                    echo "<p class=\"wrong\">There is something wrong with: ", $query, "</p>";
                }
                else {
                    echo "<p class=\"ok\"> You have applied successfully for the position with the 
                    reference number: ", $refNo, "</p>";
                    
                }
            }          
        }
        mysqli_close($conn);
    }
 
?>

<?php 
    //Main function start from here
    //get data from _POST
    $errMsg = receivedData()[0];
    $postValues = receivedData()[1];
    if ($errMsg !="") {
        //header ("location: apply.html");
        echo "<p>Error: data need to be submited from the form</p>";
    }
    else {
        //validate every single data input for the following data (10 fields)
        $htmlNames = array("refNo", "firstname", "lastname", "dateOfBirth", "gender", "street", 
        "suburb", "state", "email", "phoneNo");
        $validateRerult = array(); //to contain error message 
        $length = count($htmlNames);
        $lString = "Validate"; 
        $fString = "Testting";
        for ($i = 0; $i < $length; $i++) {
            $fString = "$htmlNames[$i]";  //frist part of the name of validate function
             //last part of the name of the validate function
            $combine = $fString.$lString;
            //echo "<p>", $combine, "</p>";
            //call validate function for every index $i
            
            $combineFunction = $combine($postValues[$fString]);
            array_push($validateRerult, $combineFunction[0]);    //culmulate error messeges to array
            $htmlNames[$htmlNames[$i]]= $combineFunction[1];    //assign data to associate $htmlNames
            //echo "<p>", $htmlNames[$htmlNames[$i]], "</p>";   
                       
        }
        //check if any of validation error
        $validateMesseges = "";
        foreach ($validateRerult as $messege) {
            if ($messege !="") {
                echo "<p> Error format data: ", $messege, "</p>";
                $validateMesseges = $validateMesseges . $messege;
            }
        }
        //call validate for skills
        $validateMesseges = $validateMesseges . skillValidate($postValues["skill"])[0]
             . postcodeValidate($postValues["state"], $postValues["postcode"])[0] . 
             otherSkillsValidate($postValues["skill"], $postValues["otherSkills"])[0];
        
        //If everything is valid, then insert new record to the database
        if ($validateMesseges != "") {
            //Note; assign two values here for testing
            echo "<p>Error as followings: ", $validateMesseges, "</p>";
            
        }
        else {
            //if nothing went wrong
            array_push($htmlNames, "postcode", "skill", "otherSkills"); //add more index to the array
            //call function to get postcode from validate function
            $htmlNames["postcode"] = postcodeValidate($postValues["state"], $postValues["postcode"])[1];
            //call function to get skills string from validate function
            $htmlNames["skill"] = skillValidate($postValues["skill"])[1];
            //call function to get description of otherSkill from validate function
            $htmlNames["otherSkills"] = otherSkillsValidate($postValues["skill"], $postValues["otherSkills"])[1];
            //Call insertData function to add 1 record to the database
            insertData ($htmlNames["refNo"], $htmlNames["firstname"], $htmlNames["lastname"], $htmlNames["dateOfBirth"],
            $htmlNames["gender"], $htmlNames["street"], $htmlNames["suburb"], $htmlNames["state"], 
            $htmlNames["postcode"], $htmlNames["email"], $htmlNames["phoneNo"], $htmlNames["skill"], 
            $htmlNames["otherSkills"]);
        }
        
    }
   
    
    //Update a recode of database
    function updateData () {

    }
    //Delete a recode of database
    function deleteData () {

    }      
?>
    

</body>
</html>