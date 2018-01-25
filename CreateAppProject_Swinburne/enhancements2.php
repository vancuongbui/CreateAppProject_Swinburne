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
                    <li>Using JavaScript to write the content to jobs.html 
                        <ul>
                            <li>The first approach is to create new array of Element to contain the 
                                content of the Job description using JavaScript.
                                You can see it from <a href="jobsEnhancement.html#data_admin"> here </a>
                            </li>
                            <li>The second approach I used for the assigment is to append those new element, into the existing
                                one as you can see by <a href="jobsEnhancement.html#menu">click here</a>
                            </li>
                            <li>Finally, assign the content to each element I have created<a href="jobsEnhancement.html#menu">click here</a>
                            </li>
                            <li>Code using for this technic
                                <ul>
                                    <li>/* Create variable to contain the content (job descrioption)*/. Then, get all the 
                                        Elements by their ID
                                        <ul>    
                                            <li>var viable = new Array()</li>
                                            <li>var container = docement.getElementById() //to get element</li>
                                            <li>var newElement = document.createElement() // to create a new element</li>
                                             <li>newElement.textcontent = viable // append the content to newElement</li>
                                              <li>container.appendChild(newElement) // to append the newone to existing one</li>
                                        </ul>
                                    </li>
                                    <li>/* Then, repeat the above step for every single element I have created.
                                        <ul>    
                                            <li>.by using function {</li>
                                            <li> by using Array</li>
                                            <li> By doing like that, I can create the multiple containers at the same time</li>
                                             
                                        </ul>  
                                     
                                </ul>                             
                            </li>                      
                            
                        </ul>
                    </li>
                    <li>Responsive disign, especially for the menu area
                            Since the screen size of mobile devices is supposed to be very small, 
                            and therefore, there is not much room to display the whole menu + nav area.
                            The solution is simplify the menu by following these below steps:
                            <ul>
                                <li>remove all uneccessary Elements, items, div on the header area <a href="jobsEnhancement.html#audio">here</a> 
                                    They are slogan, background image, search box, login.
                                </li>
                                <li>Also make the menu invisible to save room for the content. Change
                                    the background-color for the nav.
                                </li>
                                <li>Finally, create a button menu to make the menu visible again or
                                    disappear again.
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
