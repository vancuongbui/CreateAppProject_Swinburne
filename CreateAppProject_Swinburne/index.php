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
        <!-- inluding header mudule by php -->
        <?php
            include "header.inc";
        ?>
        
        <!--Section 1 part
            source of information: https://about.udemy.com/-->
<div class="container">
    <div class="main_container">
        <section class="index_container">
        
            <div class="index_item>">
                <div >
                    <a href="info.html"> <h1>Enriching lives </h1></a>
                    <p>Source:  <a href="https://about.udemy.com" >udemy</a></p>
                    <p>Ulearn is a free marketplace designed for young Vietnamese students and also
                        instructors for learning and teaching online where students are mastering 
                        essential skills that they are lacking after graduation. Therefore, they can
                        achieve their goals by learning from an extensive library of hundreds of  
                        courses taught by expert instructors in the fields.
                    </p>
                </div>
                <div >
                    <img src="images/learning_image.jpg" alt="Learning Style" id="img_learning"/>
                    <!--source of image: https://www.google.com.au/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwiTu4e22NbVAhWCro8KHcQoBrcQjRwIBw&url=https%3A%2F%2Fplus.google.com%2F107594886504350734584&psig=AFQjCNGUrtT8ZTZTt6_WlIU_7Ay29AdsJA&ust=1502798802710493
                        -->
                </div>
            </div>
            <div class="index_item">
                <div >
                    <h1> Course Preview</h1>
                    <p> This is a preview video from Ulearn which talk about the
                        the subject Redhat Administrator</p>
                    <p> Source: <a href="http://www.pearsonitcertification.com/store/red-hat-certified-system-administrator-rhcsa-in-red-9780134495071">Pearson </a></p>
                </div>
                <video  width="320" height="240" controls="controls">
                    <source src="video/part00.mp4" type="video/mp4"/>
                </video>  
            </div>
        
        </section>
        <!-- Section 2 part-->
        <section class="index_container">
            <div class="index_item">
                <div>
                    <a href="blog.html"> <h1>Insights, ideas, and stories</h1></a>
                    <p>Source: <a href="http://engrsketch.com/computer-training.html">Sketch</a></p>
                    <p>
                        <label>students Stories</label>
                        <label> Stories</label>
                        <label>Experience</label>
                    </p>
                    <p>
                        Your experiences are our experiences. There are hundreds of stories which
                        are sharing by students and instructors all over the world. 
                    </p>
                </div>
                <div>
                    <img src="images/learning_experience.jpg" alt="Learning online experience"
                    id="img_experience"/>
                </div>
                <!--Source of image:
                http://engrsketch.com/computer-training.html
                -->
            </div>
            <div class="index_item"><h1>Podcast</h1>
                <h2>English Listening Practice with useful toppics</h2>
                <p>To encorage young people to keep engaging with learning English,
                    we provide some helpful sources which cover almost our areas to 
                    meet the demand of a variety of listeners.</p>
                <div>
                    
                    <h2> <a href="http://www.bbc.co.uk/programmes/p002w557/episodes/downloads"> 
                        Listening from BBC Discovery </a></h2>
                    <audio controls="controls" src="audio/discovery.mp3">English Listening.                        
                        
                        
                    </audio>                         
                </div>
                <div>
                    
                    <h2> <a href="http://www.bbc.co.uk/programmes/p02nq0lx/episodes/downloads"> 
                        Listening from BBC Documentary </a></h2>
                    <audio controls="controls">                        
                        <source src="audio/documentary.mp3" type="audio/mpeg"/>
                        English Listening.
                    </audio>                 
                </div>
                <div>
                        
                    <h2> <a href="http://www.stuffyoushouldknow.com/podcasts"> 
                        Listening from Stuff we should know </a></h2>
                    <audio controls="controls">                        
                        <source src="audio/stuff.mp3" type="audio/mpeg"/>
                        English Listening.
                    </audio>                 
                </div>
                
            </div>

            
        </section>
    </div>
        <!-- Aside section -->
        <?php
            include "aside.inc";
        ?>    
       
</div>
        
        <hr />
        <!-- Inluding footer module -->
        <?php
            include "footer.inc";
        ?>     

    </body>
</html>
