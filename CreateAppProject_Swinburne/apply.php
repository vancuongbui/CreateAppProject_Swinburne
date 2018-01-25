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
        include "header.inc";
        ?>
        <!--Section 1 part
            source of information: https://about.udemy.com/-->
<div class="container">
    <div class="main_container">
        <section class="apply_container">
            <!-- reference:                          -->
            <h2> Source: <a href="https://jobs.smartrecruiters.com/oneclick/d8c58bbb/profile/edit">Smart Recruiter</a></h2>
                <form class="form" id="applyForm" action="processEOI.php" method="post" novalidate="novalidate">
                    <p id="warning"></p> <!-- to display a warning message of invalid input data -->
                                           
                        <h1>Job Application</h1>
                        <hr />
                        <p> Please fill the application form as belows</p>
                        <br />
                    <fieldset>   
                        <legend>Job Reference</legend>                         
                            <label for="refNo">Reference No: </label>
                            <input type="text" name="refNo" id="refNo" 
                            required="required" pattern="^\d{5}$" size="20"/>                                                           
                        
                    </fieldset>
                        <hr />   
                        <!-- Personal form start here -->
                        <!--<h3>Personal Detail.</h3>  -->
                                             
                        <div class="personal_container">
                            <fieldset>
                                <legend>Personal Detail</legend>   
                                <div class="personal_item">                             
                                    <p class="form_item"><label for="firstname" >First name</label>
                                            <input type="text" name="firstname" id="firstname" pattern="[a-zA-Z]+" maxlength="20" 
                                            required="required"/></p>
                                    <p class="form_item"><label for="lastname" >Last name</label>
                                            <input type="text" name="lastname" id="lastname" pattern="[a-zA-Z]+" maxlength="20"
                                            required="required"/></p>
                                </div>
                                <div class="personal_item">                                
                                    <p class="form_item"><label >Date of birth
                                        <input type="text" id="dateOfBirth" name="dateOfBirth" placeholder="dd/mm/yyyy" required="required" /></label></p>
                                        <!-- pattern="([1-9]{1}|[1-2]?[0-9]|3[01])/([1-9]{1}|1[1-2]?)/(19[0-9]{2}|200[0-9]?|201[0-7]?)" -->
                                    <p class="form_item" id="gender">Gender:
                                        <label class="radio"><input type="radio" name="gender" value="Male" required="required" checked="checked"/>
                                        Male</label>
                                        <label class="radio"><input type="radio" name="gender" value="Female" required="required"/>
                                        Female</label>
                                        <label class="radio"><input type="radio" name="gender" value="Other" required="required"/>
                                        Other</label></p>
                                </div>
                                <div class="personal_item">
                                    <p class="form_item"><label for="email" >Email</label>
                                        <input type="text" name="email" placeholder="Enter your email" id="email" 
                                        pattern=".*@.*\..*" required="required"/></p> 
                                        <!-- "^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$"-->
                                    <p class="form_item"><label for="phoneNo">Phone Number: </label>
                                        <input type="text" name="phoneNo" id="phoneNo" 
                                        required="required" pattern="^[\d\s]{8,12}$" size="20"/>                                                                      
                                    </p>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend>Address</legend>
                                <div class="personal_item"> 
                                    <p class="form_item"><label for="street" >Street Address</label>
                                        <input type="text" name="street" id="street" pattern="[a-zA-Z'0-9\s/]+" 
                                        maxlength="40" required="required"/></p>
                                    <p class="form_item"><label for="suburb" >Suburb/Town</label>
                                        <input type="text" name="suburb" id="suburb" pattern="[a-zA-Z'0-9\s]+" 
                                        maxlength="40" required="required"/></p>
                                </div>
                                <div class="personal_item"> 
                                    <p class="form_item">
                                        <label> State
                                            <select class="header" required="required" id="stateSelection" name="state">
                                                <option value="">None</option>
                                                <option value="VIC">VIC</option>
                                                <option value="NSW">NSW</option>
                                                <option value="QLD">QLD</option>
                                                <option value="NT">NT</option>
                                                <option value="WA">WA</option>
                                                <option value="SA">SA</option>
                                                <option value="TAS">TAS</option>
                                                <option value="ATC">ATC</option>
                                            </select>
                                        </label>
                                    
                                    </p>

                                    <p class="form_item"><label for="postcode" >Postcode </label>
                                        <input type="text" name="postcode" id="postcode" pattern="^[0-9]{4}$" 
                                        required="required"/></p>
                                </div>
                            </fieldset>
                        </div>
                       
                        <hr />
                        <!-- Skill form start here -->
                        <!--<h3>Skill List</h3> -->
                        <fieldset id="skills"> 
                            <legend>Skill Lists</legend>
                                <p class="skills"> <label>
                                    <input type="checkbox" name="skill[]" value="1" />Network Administrator</label>
                                </p>
                                <p class="skills">    <label>
                                    <input type="checkbox" name="skill[]" value="2" checked="checked"/>Database Administration</label>
                                </p>    
                                <p class="skills">    <label>
                                    <input type="checkbox" name="skill[]" value="3" />JavaScript
                                </label></p>
                                <p class="skills">    <label>
                                    <input type="checkbox" name="skill[]" value="4" />PHP</label></p>
                                
                                <p class="skills">    <label>
                                    <input type="checkbox" name="skill[]" value="5" />MySQL</label>
                                </p>
                                <p class="skills">    <label>
                                        <input type="checkbox" name="skill[]" value="6" />Project Management</label>
                                    </p>
                                <p class="skills">    <label>
                                        <input type="checkbox" name="skill[]" value="7" />Unix Administration</label>
                                    </p>
                                <p class="skills">    <label>
                                        <input type="checkbox" name="skill[]" value="8" />Windows Server Administration</label>
                                    </p>

                                <p class="skills">
                                    <label> <input id="otherSkills" type="checkbox" name="skill[]" value="9" />Other Skills</label>
                                    <br />
                                    <textarea id="skillDescription" name="otherSkills" rows="5" cols="40"></textarea>

                                </p>
                        </fieldset>
            <hr />
            <div class="submit">     
                <input type="submit" value="Apply" class="buttons" name="submit"/>
                <input type="reset" value="Reset"   class="buttons"/>
                <button type="button" id="checkButton">checFunction</button> <!-- for test only -->
            </div>
            
        </form>
        <div class="job_additional">
            <hr />
            <h2> Other jobs</h2>
            <ul>
                <li><a href="jobs.html">Network Administrator</a></li>
                <li><a href="jobs.html"> Web designer</a></li>
                <li><a href="jobs.html">Database Administrator</a></li>
            </ul>

        </div>         
           
        </section>
    </div>
    <!-- including the aside -->
    <?php
        include "aside.inc";
    ?>    
</div>       
    <?php
        include "footer.inc";
    ?>         
    </body>
</html>
