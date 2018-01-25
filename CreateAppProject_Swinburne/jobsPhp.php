<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="Description" content="Assignment 1 - Web Application"/>
        <meta name="keywords" content="HTML, CSS, JavaScript"/>
        <meta name="author" content="Van Cuong Bui"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Assignment 1</title>
        <link rel="stylesheet" href="styles/styles.css"/>
        <link rel="stylesheet" href="styles/styles.css" media="screen and (max-width:720px)"/>
        <script type="text/javascript" src="scripts/enhancement.js"></script>
        <!--<script type="text/javascript" src="scripts/apply.js"></script>-->
        <!--<script type="text/javascript" src="apply.js"></script>-->
    </head>
    <body id="jobs">
        <!--Area0: for logo, search and courses-->
    <?php
        include "header.inc";
    ?>
        <!--Section 1 part
            source of information: https://about.udemy.com/-->
<div class="container"> <!-- the container as a whole, including sections and aside -->
    <div class="main_container"> <!-- Sections-->
        <section class="jobs_container">
            <!--<blockquote cite="http://www.recruit.net/job/sql-server-database-administrator_-aus_jobs/8794228871171CC7">
            -->
            <div id="job_list">
                <h1> Job Description</h1>
                
                    <a href="#network_admin">Network Administrator</a>
                    <a href="#web_design"> Web designer</a>
                    <a href="#data_admin">Database Administrator</a>
                
            </div>  
            <!-- Section 1 start from here -->  
            <div class="jobs_item" id="data_admin">
                <h2>Database Administrator &#160;&#160;<a href="apply.html" id="job1Apply">Apply here</a> </h2>
                <hr />
                
                <p> Location:SA-Adelaide </p>
                <p> Requisition Number: <span id="jobNumber1">452611</span> </p>                            
                <?php
                    $refNo = 452611;
                    include 'settings.php';
                    $sqlTable = "job";
                    $conn = @mysqli_connect($servername, $username, $password, $myDB);
                    if (!$conn) {
                        echo "<p> Connecting to database fail, check again</p>";
                    }
                    else {
                        $query1 = "SELECT * FROM $sqlTable WHERE refNo LIKE '$refNo%'";
                        $result = mysqli_query($conn, $query1);
                        if (!$result) {
                            echo "<p> No record found from database</p>";
                        }
                        else {
                            $row = mysqli_fetch_assoc($result);
                            echo "<ul class=\"jobDescription\">";
                            echo "<li>Description:";
                                echo "<p class=\"paragraph\">", $row["jobDescription"],"</p>";
                            echo "</li>";
                            echo "<li>Key responsibilities will include:";
                                echo "<ul>";
                                    echo "<li>", $row["keySkill1"],"</li>";   
                                    echo "<li>", $row["keySkill2"],"</li>"; 
                                    echo "<li>", $row["keySkill3"],"</li>"; 
                                    echo "<li>", $row["keySkill4"],"</li>"; 
                                    echo "<li>", $row["keySkill5"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                            echo "<li>Knowledge, skills and experience relevant to this role:";
                                echo "<ul>";
                                    echo "<li>", $row["experience1"],"</li>";   
                                    echo "<li>", $row["experience2"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                            echo "<li>Salary:";
                                echo "<ul>";
                                    echo "<li>", $row["salary1"],"</li>";   
                                    echo "<li>", $row["salary2"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                            echo "<li>Job type:";
                                echo "<ul>";
                                    echo "<li>", $row["keySkill1"],"</li>";   
                                    echo "<li>", $row["keySkill2"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                        echo "</ul>";

                        }
                    }

                ?>
                
                    
                <hr />
                <h4 id="insertBefore_1">Interested ? <a href="apply.html"> Apply now</a> or send email to 
                <a href="mailto:101442551@student.swin.edu.au?Subject=Job_application" 
                target="_top">Van Cuong Bui</a> </h4>
            </div>
            <!-- Section 2 starts from here -->
            <div class="jobs_item" id="network_admin">
                <h2>Network Administrator &#160;&#160;<a href="apply.html" id="job2Apply">Apply here</a></h2>
                <hr />
                                     
                    <p> Location:Melbourne </p>
                    <p> Requisition Number:<span id="jobNumber2">452612</span> </p>                            
                    <?php
                    $refNo = 452612;
                    include 'settings.php';
                    $sqlTable = "job";
                    $conn = @mysqli_connect($servername, $username, $password, $myDB);
                    if (!$conn) {
                        echo "<p> Connecting to database fail, check again</p>";
                    }
                    else {
                        $query1 = "SELECT * FROM $sqlTable WHERE refNo LIKE '$refNo%'";
                        $result = mysqli_query($conn, $query1);
                        if (!$result) {
                            echo "<p> No record found from database</p>";
                        }
                        else {
                            $row = mysqli_fetch_assoc($result);
                            echo "<ul class=\"jobDescription\">";
                            echo "<li>Description:";
                                echo "<p class=\"paragraph\">", $row["jobDescription"],"</p>";
                            echo "</li>";
                            echo "<li>Key responsibilities will include:";
                                echo "<ul>";
                                    echo "<li>", $row["keySkill1"],"</li>";   
                                    echo "<li>", $row["keySkill2"],"</li>"; 
                                    echo "<li>", $row["keySkill3"],"</li>"; 
                                    echo "<li>", $row["keySkill4"],"</li>"; 
                                    echo "<li>", $row["keySkill5"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                            echo "<li>Knowledge, skills and experience relevant to this role:";
                                echo "<ul>";
                                    echo "<li>", $row["experience1"],"</li>";   
                                    echo "<li>", $row["experience2"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                            echo "<li>Salary:";
                                echo "<ul>";
                                    echo "<li>", $row["salary1"],"</li>";   
                                    echo "<li>", $row["salary2"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                            echo "<li>Job type:";
                                echo "<ul>";
                                    echo "<li>", $row["keySkill1"],"</li>";   
                                    echo "<li>", $row["keySkill2"],"</li>"; 
                                echo "</ul>";
                            echo "</li>";
                        echo "</ul>";

                        }
                    }

                ?>
                    
                        <hr id="insertBefore_2"/>
                        <h4>Interested ? <a href="apply.html"> Apply now</a> or send email to 
                        <a href="mailto:101442551@student.swin.edu.au?Subject=Job_application" 
                        target="_top">Van Cuong Bui</a> </h4>
                                
            </div>
            
       
        </section>
    </div>
    <?php
        include "aside.inc";
    ?>

    
</div>                         
        <hr />
    <?php
        include "footer.inc";
    ?>
        
    </body>
</html>
