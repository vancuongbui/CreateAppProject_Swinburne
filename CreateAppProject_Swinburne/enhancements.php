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
    </head>
    <body>
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
                <p> In this assignment, I included two new technics which would enhance my
                    web pages significantly as well as save me a hanful of work not just 
                    for now but also for the future developing. I will intruduce and
                    describe them as following:
                </p>
            </div>
            <div class="enhancement_item">
                <ol>
                    <li>Flexible box <a href="https://www.w3schools.com/css/css3_flexbox.asp">Reference </a>
                        <ul>
                            <li>I have been trying to use the float for my web page layout
                            for a while, and find that it is sometimes very complicated
                            or maybe confused me to control the whole layout. For instance, 
                            I have to be very careful when I try to adjust the width or height
                            of the item in my web page, otherwise, I would make a layout with 
                            three columns into two column instead. Then I look for something 
                            else that could help me totally control it and have experienced that
                            Flexible box is just the right one for me. The main point of it would
                            that it does not affect the things outside and inside of it, also 
                            behave predictably when I have hard or soft resize.
                            </li>
                            <li>As you can see how I manage the layout using this very helpful layout mode
                            <a href="index.html#slogan">here</a> for displaying the Nav panel. Indeed, I 
                                do not use any float mode for my web layout except to display the checkbox
                                section. Instead, I use the new technic flex-box for the whole layout as
                                well as detail layout. I really feel comfortable and control of it.
                            </li>
                            <li>Code using for flex-box
                                <ul>
                                    <li>/* to set the general layout for all the pages, including aside*/
                                        <ul>    
                                            <li>.contaner {</li>
                                            <li>    display: flex;</li>
                                            <li>    flex-direction: row;</li>
                                             <li>   with: 100%:</li>
                                              <li>  overflow: auto;}</li>
                                        </ul>
                                    </li>
                                    <li>/* Then, set the layout for the main of the page*/
                                        <ul>    
                                            <li>.main_contaner {</li>
                                            <li>    display: flex;</li>
                                            <li>    flex-direction: row; /*or column */</li>
                                             <li>   with: 75%:</li>
                                              <li>  overflow: auto;}</li>
                                        </ul>  
                                    </li>                              
                                    <li>/* for the aside panel*/
                                        <ul>    
                                            <li>.asideContaner {</li>
                                            <li>    display: flex;</li>
                                            <li>    flex-direction: column;</li>
                                             <li>   with: 25%:</li>
                                              <li>  overflow: auto;}</li>
                                        </ul>   
                                    </li>                               
                                </ul>                             
                            </li>                      
                            
                        </ul>
                    </li>
                    <li>Audio and Video tag<a href="https://www.w3schools.com/css/css_rwd_videos.asp">Reference</a>
                            Since the company is providing education courses focus on it
                            industry, included audio as well as video which was not included 
                            in lecture/lab would emprove the web apparence.
                            <ul>
                                <li>Audio included in the aside area <a href="index.html#audio">here</a> 
                                    /*The code for audio */
                                    &#60;audio controls&#62;                   
                                    &#60;source src="audio/englishListening.mp3" type="audio/mpeg"&#62;
                                    &#60;&#47;audio&#62;
                                </li>
                                <li>or you can see the video <a href="index.html#video">here</a> 
                                    /*The code for video */
                                    &#60;video  width="320px" height="240px" controls&#62;                   
                                    &#60;source src="video/part00.mp4" type="video/mp4"&#62;
                                    &#60;&#47;video&#62;
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
