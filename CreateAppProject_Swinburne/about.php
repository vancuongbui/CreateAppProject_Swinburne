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
        <section class="about_container">
            <!--<blockquote cite="http://www.recruit.net/job/sql-server-database-administrator_-aus_jobs/8794228871171CC7">
            -->
            <div class="about_item">
                <h1> Idea</h1>       
                <hr />        
                <p> I am in the first year of master degree (Network Systems) and have been 
                    experienced about how technology can change the way people learn nowadays.
                    My dream is to bring those thing into my country in where students are 
                    struggling with the very old-fasioned education system. I founded this 
                    website in order to help me and my future partners to pursue this very dream.
                    Hopefully, this work can somehow contribute to the success of Vietnamese
                    young people.</p>
                
            </div>    
            <div class="about_item">
                <h1>About Author </h1>
                <hr />
                <div class="information">
                    <h2>Personal Information</h2>
                    <div id="personal_detail">
                        <dl>
                            <dt>Name: </dt>
                                <dd> Van Cuong Bui</dd>
                            
                            <dt>Student number: </dt>
                                <dd> 101442551</dd>
                            
                            <dt>Tutor: </dt>
                                <dd>Dr Xuehong (Grace) Tao</dd>
                            

                            <dt>Course: </dt>
                                <dd> Network Systems</dd>
                            
                            <dt>Email: </dt>
                                <dd><a href="mailto:101442551@student.swin.edu.au?Subject=Job_application" 
                                    target="_top">Van Cuong Bui</a>
                                </dd>
                                
                        </dl>

                    </div>
                    <div id="personal_photo">                    
                        <figure>
                            <p><img src="images/photo.jpg" alt="Photo of Author" width="120"/>
                            </p>
                        </figure>
                    </div>
                </div>
                <hr />
                

                <h2> Hometown </h2>
                    <p> I was born in Thanh Hoa province- a the centrl-north of Vietname 
                        region which is about 3 hour from Hanoi, the capital of Vietnam.</p>
                <hr />
                <h2> Class Time Table</h2>
                <table>
                    <tr>
                        <th>Time\Date</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>                        
                    </tr>
                    <tr>
                        <th>8:30 - 11:30 </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TNE70003(Lab) - ATC329</td>  
                        <td></td>
                    </tr>
                    <tr>
                        <th>12:30 - 14:30 </th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>TNE80006(Lab) - BA401</td>  
                        <td></td>
                    </tr>
                    <tr>
                        <th>14:30 - 16:30 </th>
                        <td></td>
                        <td></td>
                        <td>TNE70003(Lecture) - ADMC301</td>
                        <td></td>  
                        <td></td>
                    </tr>
                    <tr>
                        <th>17:30 - 19:30 </th>
                        <td></td>
                        <td>TNE80006(Lecture) - EN101</td>
                        <td>COS60007(Lecture) - BA302</td>
                        <td></td>  
                        <td></td>
                    </tr>
                    <tr>
                        <th>19:30 - 21:30 </th>
                        <td></td>
                        <td></td>
                        <td>COS60007(Lab) - EN401</td>
                        <td></td>  
                        <td></td>
                    </tr>

                </table>                                  
                
            
                <hr />
                <div>
                    <h2>Profile</h2>
                    <div>
                    <ul class="profile">
                        <li class="key_profile">Objectives
                            <ul>
                                <li>System Administrator</li>
                                <li>Network Administrator</li>
                                <li>Software developer</li>
                                <li>Network Operator</li>
                                <li>Transmission Engineer</li>
                                <li>BTS/ BSC Engineer</li>
                                <li>Other Technical Support Engineer</li>
                            </ul>
                        </li>
                        
                        <li class="key_profile">Excutie Summary
                            <ul>
                                <li>Achieved grade of 86% in Network Administration, 87% in network and switching, 
                                and 91% in network programming at Swinburne in 2017, also 98.5% of CCNA routing 
                                and switching (Introduction to Networks) at Cisco Networking Adademy.
                                </li>

                                <li>The first person amongst other engineers to on air the very first BTS of Beeline
                                 Vietnam in March 2009.
                                </li>

                                <li>Contribution to the success of the launching of new network provider – Beeline 
                                Vietnam in July 2009.
                                </li>

                                <li>Involvement in the successful deploying of Gmobile in the North of Vietnam 
                                
                                (for Beeline Vietnam) from 2009 to 2015.
                                </li>

                                <li> Involving in the deployment of the Monitoring Program of hundreds of MW/ADM
                                 equipment using routing method OSPF in the North of Vietnam.
                                </li>
                            </ul>
                        </li>
                        <li class="key_profile">Technical Skills
                            <ul>
                                <li>Windows servers administration: 2003, 2008, 2012, 2016
                                </li>
                                <li> System Administration: based on RedHat-Centos 7 and Abuntu
                                </li>
                                <li> Virtual environment: Work well with Hyper-V, VMWare, Virtual Box and background in Microsoft Azure, Cloud9
                                </li>
                                <li>	Networking skills: L2/L3 Switches, Routers, TCP/IP, routing method RIP, OSPF, BGP and background on IP/MPLS
                                </li>
                                <li>	Documentation skills: relating to network configuration, network operation, update and backup, design and other tasks
                                </li>
                                <li>	Problem solving: 10 years of experience on problem solving
                                </li>
                                <li>	Microsoft Offices: including Word, Power point, Excel, and especially creating, exporting and reporting data.
                                </li>
                                <li>	Programming: Python + Flask + database (MySQL, MongoDB, Postgresql, SQLite3), web application creation.
                                </li>
                                <li>	Training skill: Writing/editing training documents and training staff.
                                </li>	
                                <li>    Project management: Two years of experience as vice director (telecom project manager).
                                </li>	
                                <li>GSM Radio access: installing, configuration, commissioning, test, and operating BTS/ BSC and OMC-R system(Alcatel-Lucent)
                                </li>
                                    <li>	BSS System Administration: Creating/modifying/deleting services based on Alcaltel OMC-R System Administration
                                </li>
                                <li>	Transmission System Administration: based on Huawei T2000, Alcatel 1353/1353 OMC-R and other Terminals.
                                </li>
                                <li>	Installation/commissioning, test and use equipment, including: PC/ Server/ Network equipment, measuring instruments and electrical equipment. 
                                </li>
                            </ul>
                        </li>
                        <li class="key_profile">Education</li>
                        <li class="key_profile">experience</li>
                        <li class="key_profile">None-Technical skills</li>
                    </ul>

                    </div>
                </div>    
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
