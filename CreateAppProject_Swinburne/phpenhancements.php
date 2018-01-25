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
            include 'header.inc';
        ?>
        
        <!--Section 1 part
            source of information: https://about.udemy.com/-->
<div class="container">
    <div class="main_container">
        <section class="enhancement_container">
            <!--<blockquote cite="http://www.recruit.net/job/sql-server-database-administrator_-aus_jobs/8794228871171CC7">
            -->
            <div class="enhancement_item">
                <h1> Enhancements</h1>       
                <hr />        
                <p> In this assignment, I included two new which I will intruduce and
                    describe them as following:
                </p>
            </div>
            <div class="enhancement_item">
                <ol>
                    <li>Using php to write the content to jobs.php 
                        <ul>
                            <li>The first step is to create new table of Element to contain the 
                                content of the Job description using php.
                                You can see it from <a href="jobsPhp.php#data_admin"> here </a>
                            </li>
                            <li>The second step I used for the assigment is to query the database for each job description
                            </li>
                            <li>Finally, use echo to write the content with proper element
                            </li>
                            <li>Code using for this technic
                                <ul>
                                    <li>Create database
                                        <ul>    
                                            <li>$query = "Create table 'job'if not exist"</li>
                                            <li>Then, manualy insert data into table with content of job description</li>
                                            <li>"insert into table 'job' value ()"</li>
                                             
                                        </ul>
                                    </li>
                                    <li>/* Then, query from the table, get the $result  
                                        <ul>    
                                            <li>create $conn with database</li>
                                            <li>"Select * from table 'job' where refNo = '123456'"</li>
                                            <li> use echo to write the content to the .php page</li>
                                            <li> use unorder list as well as order list to write</li>
                                             
                                        </ul>  
                                     
                                </ul>                             
                            </li>                      
                            
                        </ul>
                    </li>
                    <li>Login page and Logout page (session page as well)
                            The login page is designed to let hr manager login before editting database. 
                            The logout page is designed to prevent user to access manage.php directly after 
                            they logout. Session page is to store the current user login into $_SESSION:
                            <ul>
                                <li>step1: create a user table call user, then insert some record
                                </li>
                                <li>Then, query the table based on username and password from input data which 
                                    user has just entered. If success, nevigate user to manage.php. Session page 
                                    will store user information
                                </li>
                                <li>Create a logout link from manage.php to logout.php. If use choose to logout, 
                                    they have to login again to access to manage.php
                                </li>
                            </ul>
                    </li>   
                </ol>
            </div>

                
        </section>
    </div>
    <?php
        include 'aside.inc';
    ?>
       
</div>
                            
        <hr />
        <?php
            include 'footer.inc';
        ?>       

    </body>
</html>
