/**
 * Author: Van Cuong Bui
 * Target: What html file is reference by js file
 * Purpose: This file is for lab06
 * Last update:
 * Credits:
 */
"use strict"; //to strictly assign and register variable in term of type
//define an global variable to contain all the name of input fields
var nameArray = new Array("refNo", "firstname", "lastname", "dateOfBirth", "gender", "email",
"phoneNo", "street", "suburb", "stateSelection", "postcode", "skills", "skillDescription");
function validate() {   
    var result = true;
    //defice two variables as Arrays(12) to save the work of coding 
    
    var valueArray = new Array(refNoValidate()[1], firstnameValidate()[1], lastnameValidate()[1], 
                        dateOfBirthValidate()[1], genderValidate()[1], emmailvalidate()[1], 
                        phoneNoValidate()[1], streetValidate()[1], suburbValidate()[1], stateValidate()[1],
                        postcodeValidate()[1], skillsValidate()[1], otherSkillsCheck()[1]);                
    var errMsgArray = new Array(refNoValidate()[0] , firstnameValidate()[0] , lastnameValidate()[0] ,
                dateOfBirthValidate()[0] , genderValidate()[0] , emmailvalidate()[0] , 
                phoneNoValidate()[0] , streetValidate()[0] , suburbValidate()[0] , stateValidate()[0],
                postcodeValidate()[0] , skillsValidate()[0], otherSkillsCheck()[0]);
    //alert(errMsg);
    var errMsg = "";
    for (var i = 0; i < errMsgArray.length; i++) {
        if (errMsgArray[i] != "") {
            //set the border of invalid input element = red
            document.getElementById(nameArray[i]).style.border = "1px solid #FF0000";
            errMsg = errMsg + errMsgArray[i];
        }
        
    }
    if (errMsg !="") {
        //then display the warning message on the top of the form
        var warning = document.getElementById("warning");
        warning.innerHTML = "Warning: " + errMsg;
        warning.style.color = "red";
        warning.style.fontWeight = "bold";
        //alert(errMsg);
        result = false;
        
        
    }
    else {
        //store information into sessionStorage of the web browser
        for (i = 0; i < nameArray.length; i++) {
            //alert(nameArray[i] + ": " + valueArray[i]);
            sessionStorage.setItem(nameArray[i], valueArray[i]);
            
        }
        result = true;
    }
    //check whether session storage is running correct or not
    for (var i = 0; i < nameArray.length; i++) {
        //alert(sessionStorage.getItem(nameArray[i]));
    }
    return result;   
}
//Function sessionStoreInfo() to store information into sessionStorage of the web browser

//validate reference number as required 5 digits
function refNoValidate() {
    var errMsg = "";
    var number = document.getElementById("refNo").value;
    if (!(/^[\d]{6}$/).test(number)) {
        errMsg = errMsg + "Reference Number must contain 5 digits only\n";
        
    }
    
    return [errMsg, number];
}
//validate firstname and return the error as well as the value
function firstnameValidate() {
    var errMsg = "";
    var name = document.getElementById("firstname").value;
    if (!(/^[a-zA-Z]+$/).test(name)) {
        errMsg = errMsg + "Your firstname must contain only alpha characters and not empty\n";
        document.getElementById("firstname").style.border = "1px solid #FF0000"; //make the border red
    }
    
    return [errMsg, name];
}

/* This function is to validate for lastname */
function lastnameValidate() {
    var errMsg = ""
    var name = document.getElementById("lastname").value;
    if (!(/^[a-zA-Z-]+$/).test(name)) {
        errMsg = errMsg + "Your lastname must contain only alpha characters and not empty\n";
    }
    //alert(errMsg + "/" + name);
    return [errMsg, name];
}
function dateOfBirthValidate() {
    var errMsg = "";
    var dateOfBirth = document.getElementById("dateOfBirth").value;
    //alert(dateOfBirth); //to test the value of this field
    var dateMonthYear = dateOfBirth.split("/");
    if (dateMonthYear.length != 3) {
        errMsg = errMsg + "Wrong format of date"
    }
    else {
        if (!(/^0?[1-9]|[1-2]?[0-9]|3[01]$/).test(dateMonthYear[0])) {
            errMsg = errMsg + "The day has to be in range 1 to 31"
        }
        else if (!(/^0?[1-9]|1[0-2]$/).test(dateMonthYear[1])) {
            errMsg = errMsg + "Month from 1 to 12 please"
        }
        else if (!(/^19?[0-9]{2}|200?[0-9]?|201[0-7]$/).test(dateMonthYear[2])) {
            errMsg = errMsg + "Year need to be between 1900 and 2017"
        }
        else {
            var minimumDate = dateMonthYear[0] + "/" + dateMonthYear[1] + "/" +
            (parseInt(dateMonthYear[2]) + 15).toString(); 
            var maximumDate = dateMonthYear[0] + "/" + dateMonthYear[1] + "/" +
            (parseInt(dateMonthYear[2]) + 80).toString(); 
            var minDate = new Date(minimumDate);
            var MaxDate = new Date(maximumDate);
            var now = new Date();
            //Compare to determine the user is more than 15-year old
            if (now < minDate) {
                errMsg = errMsg + "Your age must be greater or equal to 15-year old";
            }
            else if (now > MaxDate) {
                errMsg = errMsg + "Your age must be less than or equal 80-year old"
            }
        }
    }

    
    return [errMsg, dateOfBirth];
}

/* This function is to validate for gender */
function genderValidate() {
    var gender = "unknown";
    var errMsg = "";
    var genderArray = document.getElementById("gender").getElementsByTagName("input");
    for (var i = 0; i < genderArray.length; i++) {
        if (genderArray[i].checked) {
            gender = genderArray[i].value;
            break;
        }
    }
    if (gender == "unknown") {
        errMsg = errMsg + "You must select your gender";
    }
    //alert(errMsg + "/" + gender);
    return [errMsg, gender];    
}
//Email validate
function emmailvalidate() {
    var errMsg = ""
    var email = document.getElementById("email").value;
    if (!(/^.*@.*\..*$/).test(email)) {
        errMsg = errMsg + "Invalid email address\n";
    }
    //alert(errMsg + "/" + email);
    return [errMsg, email];
}
//phone No validate
function phoneNoValidate() {
    var errMsg = ""
    var phone = document.getElementById("phoneNo").value;
    if (!(/^[0-9]{9,10}$/).test(phone)) {
        errMsg = errMsg + "Invalid phone number\n";
    }
    //alert(errMsg + "/" + phone);
    return [errMsg, phone];
}
//validate Street name and No
function streetValidate() {
    var errMsg = ""
    var street = document.getElementById("street").value;
    if (!(/^[0-9]+[\s]+[a-zA-Z\s]+$/).test(street)) {
        errMsg = errMsg + "Invalid street name and address\n";
    }
    //alert(errMsg + "/" + street);
    return [errMsg, street];
}
//validate suburb
function suburbValidate() {
    var errMsg = ""
    var suburb = document.getElementById("suburb").value;
    if (!(/^[a-zA-Z]+$/).test(suburb)) {
        errMsg = errMsg + "Invalid suburb name\n";
    }
    //alert(errMsg + "/" + suburb);
    return [errMsg, suburb];
}
//State input required validate
function stateValidate() {
    var errMsg = ""
    var stateSelected = document.getElementById("stateSelection").value;
    if (stateSelected == "") {
        errMsg = errMsg + "You must choose your state from the dropdown list"
    }
    return [errMsg, stateSelected];
}
/* define the following function to validate postcode number */
function postcodeValidate() {
    var errMsg = ""
    //get the postcode number first
    var postcode = document.getElementById("postcode").value;
    //alert("The postcode is: " + postcode);
    //get the State which was selected and compare
    var stateSelected = document.getElementById("stateSelection").value;   
    switch (stateSelected) {    //Using switch and case to compare State with postcode
        case "VIC" :    //if the stated user entered is VIC
            if (!((postcode.charAt(0) =="3") || (postcode.charAt(0) == "8"))) {
                errMsg = errMsg + "VIC postcode starts with 3 or 8";
            }
            break;
        case "NSW" :
            if (!((postcode.charAt(0) =="1") || (postcode.charAt(0) == "2"))) {
                errMsg = errMsg + "NSW postcode starts with 1 or 2";
            }
            break;
        case "QLD" :
            if (!((postcode.charAt(0) =="4") || (postcode.charAt(0) == "9"))) {
                errMsg = errMsg + "QLD postcode starts with 4 or 9";
            }
            break;
        case "NT" :
            if (!(postcode.charAt(0) =="0")) {
                errMsg = errMsg + "NT postcode starts with 0";
            }
            break;
        case "WA" :
            if (!(postcode.charAt(0) =="6")) {
                errMsg = errMsg + "WA postcode starts with 6";
            }
            break;
        case "SA" :
            if (!(postcode.charAt(0) =="5")) {
                errMsg = errMsg + "SA postcode starts with 5";
            }
            break;
        case "TAS" :
            if (!(postcode.charAt(0) =="7")) {
                errMsg = errMsg + "TAS postcode starts with 7";
            }
            break;
        case "ACT" :
            if (!(postcode.charAt(0) =="0")) {
                errMsg = errMsg + "ACT postcode starts with 0";
            }
            break;
        default:
            errMsg = errMsg + "unkown state";
            break;        
    }
    //alert(errMsg);
    return [errMsg, postcode];
}
/* define a function to get the value of "State" */

//Define the function otherSkillsCheck() to check whether user check this box or not.
//If yes, then the following text need to be filled.
//Skills validate function
function skillsValidate() {
    var errMsg = "";
    var skillsString = "";
    var skills = [];
    var skillsArray = document.getElementById("skills").getElementsByTagName("input");
    if (skillsArray == null) {
        errMsg = "check the syntax of getting input element";
    }
    else {
        for (var i = 0; i < skillsArray.length; i++) {
            if (skillsArray[i].checked) {
                skills.push(skillsArray[i].value);
                
            }
        }
        if (skills.length == 0) {
            errMsg = errMsg + "You must choose at least one skills trip";
           
        }
        else {
            for (var i = 0; i < skills.length; i++)
                skillsString = skillsString + "/" + skills[i];
        }
    }
    return [errMsg,skillsString];
}
function otherSkillsCheck() {
    var errMsg = "";
    var checkBox = document.getElementById("otherSkills").checked;
    var textArea = document.getElementById("skillDescription").value;
    //alert(checkBox);
    if (checkBox == true) {        
        if  (textArea == null || textArea == "") {
            errMsg = errMsg + "You need to discribe your other skill in the text Area";
            //alert(errMsg);
        }
        
    }   
    
    return [errMsg, textArea];
}
//Function to prefill by loading from sessionStorage
function prefill() {
    //alert("seeing this message mean this function is calling");
    //alert("Hello, this is the check")
    //prefill the referece job number

    if (sessionStorage.getItem("refNo") !== "undefined" && sessionStorage.getItem("refNo") !== null) {
        //alert(sessionStorage.getItem("refNo"));
        document.getElementById("refNo").value= sessionStorage.getItem("refNo");                          
        
        document.getElementById("refNo").readOnly = false;   //set the attribute of the input as read-only
        document.getElementById("refNo").style.backgroundColor = "#FEFEFE";
    }
    else {

        if (localStorage.getItem("refNo") !== "undefined" && localStorage.getItem("refNo") !== null) {
        document.getElementById("refNo").value= localStorage.getItem("refNo");                          
        
        document.getElementById("refNo").readOnly = true;   //set the attribute of the input as read-only
        document.getElementById("refNo").style.backgroundColor = "#EFEFEF";
        }
    }
    
    //retrieve the firstname from sesseionStrorage
    if (sessionStorage.getItem("firstname") !== "undefined") {
        document.getElementById("firstname").value= sessionStorage.getItem("firstname");                          
        }
   
        //alert(document.getElementById("firstname").value)
    //retrieve the lastname from sesseionStrorage
    if (sessionStorage.getItem("lastname") !== "undefined") {
        document.getElementById("lastname").value= sessionStorage.getItem("lastname");                          
        }
        //alert(document.getElementById("lastname").value)
    //retrieve dateOfBirth
    if (sessionStorage.getItem("dateOfBirth") !== "undefined") {
        document.getElementById("dateOfBirth").value= sessionStorage.getItem("dateOfBirth");                          
        }
    //check the radio for a stored species
    var genderArray = document.getElementById("gender").getElementsByTagName("input");
    for (var i = 0; i < genderArray.length; i++) {
        if (genderArray[i].value == sessionStorage.getItem("gender")) {
            genderArray[i].checked = true;
            break;
        }
        //alert(genderArray[i].checked)
    }
    //Retrieve email
    if (sessionStorage.getItem("email") !== "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("email").value= sessionStorage.getItem("email");                          
        }
    //set the lenth of predefined beard
    if (sessionStorage.getItem("phoneNo") !== "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("phoneNo").value= sessionStorage.getItem("phoneNo");                          
        }
    //fill the skills/trip previous ordered
    //Retrieve email
    if (sessionStorage.getItem("street") !== "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("street").value= sessionStorage.getItem("street");                          
        }
    //set the lenth of predefined beard
    if (sessionStorage.getItem("suburb") !== "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("suburb").value= sessionStorage.getItem("suburb");                          
        }
    //fill the state
    if (sessionStorage.getItem("stateSelection") !== "undefined") {
        //alert(sessionStorage.getItem("stateSelection"));
        var stateArray = document.getElementById("stateSelection").getElementsByTagName("option");
        for (var i = 0; i < stateArray.length; i++) {
            if (stateArray[i].value == sessionStorage.getItem("stateSelection")) {
                //alert(stateArray[i].value);
                stateArray[i].selected = true;
                break;
            }
        }                         
        }
    //prefill the postcode
    if (sessionStorage.getItem("postcode") !== "undefined") {
        document.getElementById("postcode").value = sessionStorage.getItem("postcode");
    }
    //prefill the skills    
    if (sessionStorage.getItem("skills") !== "undefined") {
        //alert(sessionStorage.trip)
        var skillsArray = document.getElementById("skills").getElementsByTagName("input");
        var skills = sessionStorage.getItem("skills").split("/"); //split the string in case user check more than 1 boxes
        for (var i = 0; i < skillsArray.length; i++) {
            for (var j = 0; j < skills.length; j++) {
                if (skillsArray[i].value == skills[j]) {
                    skillsArray[i].checked = true;                
                }
            }                
        }
    }
}
//This is the area to process with jobs.htmls
//--------------------------------------------------------------------------------------
//create function to respond to the onclick() event on the "Apply" hyper link

//store the reference number to local storage
function refNo1LocalSave() {
    localStorage.removeItem("refNo");
    localStorage.setItem("refNo", document.getElementById("jobNumber1").textContent);
    
}

function refNo2LocalSave() {
    localStorage.removeItem("refNo");
    localStorage.setItem("refNo", document.getElementById("jobNumber2").textContent);
    
}
//funtion to prefill the reference number 1
function refNoPrefill() {
    alert("check refNoPrefill() function");
    var refNo = localStorage.getItem("refNo");    
    if (refNo != "undefined" || refNo != null) {
        alert(refNo);
        var refInput = document.getElementById("refNo");
        refInput.value = refNo;
        refInput.readOnly = true;   //set the attribute of the input as read-only
        refInput.style.backgroundColor = "#EFEFEF";
    }
    //return referenceNumber;
}
//funtion to prefill the reference number 2
/*function job2Prefill() {
    var referenceNumber = localStorage.getItem("jobNumber2");
    if (referenceNumber == "" || referenceNumber == null) {
        alert("cannot read the reference number or there is nothing on local storage");
    }
    else {
        alert(referenceNumber);
        var refInput = document.getElementById("refNo");
        refInput.value = referenceNumber;
        refInput.readOnly = true;   //set the attribute of the input as read-only
        refInput.style.backgroundColor = "#EFEFEF";
    }
    //return referenceNumber;
}*/
//--------------------------------------------------------------------------------------
//Enhancement start from here
function dataDisplay() {
    var jobDescription = new Array("Ulearn is IT company which is leading in free delivering education \
    for young people in Vietnam. We provide a new IT approach for the education sector in \
    rder to fill the gap for young people who are starting their .Career. Working with us \
     keep you engaging even more with our professional staff as well as a new approach of \
     earning", "Ulearn is IT company which is leading in free delivering education \
     for young people in Vietnam. We provide a new IT approach for the education\
     sector in order to fill the gap for young people who are starting their\
     Career. Working with us will keep you engaging even more with our professional\
     staff as well as a new approach of learning.");
     var keySkill = new Array(10);
     keySkill[0] = new Array("Design, implement, and maintain SQL Server database systems\
      in a range of environments covering the complete product life cycle, in a range of \
      complex and critical environments.","Design, implement, and maintain Windows Server 2008, 2012,\
      2016 in a range of environments covering the complete product life cycle, in a range\
       of complex and critical environments.");
    
    keySkill[1] = new Array("Perform SQL Server Database Administration support functions - including but not limited to", "Perform Unix Server Administration support functions - including but not limited to");

    keySkill[2] = new Array("database backup &#38; recovery. ", "backup &#38; recovery.");
    keySkill[3] = new Array("Networking fundamental.", "change, incident and problem management.");
    keySkill[4] = new Array("version upgrades &#38; software patching.", "change, incident and problem management.");
    keySkill[5] = new Array(" version upgrades &#38; software patching.", "Resolution of assigned Incidents/Requests on-site or remotely");
    keySkill[6] = new Array("Maintain, upgrade and tailor the SQL Server Management Toolsets.",
                            "Resolution of assigned Incidents/Requests on-site or remotely");
    keySkill[7] = new Array("Maintain, upgrade and tailor the Window Server Toolsets.",
                                "Participate in Project activities, as required.");
    keySkill[8] = new Array("other", "Be familiar with SQL database.");
    keySkill[9] = new Array("other", "Participate in Project activities, as required.");

    //create info for the experience field
    var experience = new Array(2);
    experience[0] = new Array("3 + years experience in SQL Server database technologies, \
    including but not limited to the key features of SQL Server versions 2000, 2005, 2008 \
    R2 2012 and 2014.", "1 + years experience in Window Server technologies, including but\
     not limited to the key features of Window Server versions 2008, 2012, 2016 R2");
    experience[1] = new Array(" An operational understanding of SSIS, SSAS, SSRS is also required\
    .", " An operational understanding of SSIS, SSAS, SSRS is also required.");
    var salary = new Array(2);
    salary[0] = new Array("80k for the package, or ", "90k for the package, or");
    salary[1] = new Array("rate 80$ per hour", "rate 90$ per hour.");

    var jobType = new Array(2);
    jobType[0] = new Array("Full-time", "Part-time");
    jobType[1] = new Array("Full-time", "Casual");
    //get the container with id= "data_admin"
    var jobNameArray = new Array(2);
    jobNameArray = new Array("data_admin", "network_admin");
    var insertBeforeArray = new Array("insertBefore_1", "insertBefore_2");

    //now, create new ul list
    
    //job 1 and 2 write to html page
  
    for (var i = 0; i < jobNameArray.length; i++) {
        writeToHtml(jobNameArray[i], insertBeforeArray[i], i);
    }
    //create 05 li inside the ul;
    function writeToHtml(containerId, insertBeforeEnd, j) {
        var parentContainer = document.getElementById(containerId);
        var ulParent = document.createElement("ul");
        var targetInsertObject = document.getElementById("insertBeforeEnd");
        parentContainer.insertBefore(ulParent, targetInsertObject);
        var liChildArray = new Array(5);
        for (var i = 0; i < liChildArray.length; i++) {
            liChildArray[i] = document.createElement("li");
            ulParent.appendChild(liChildArray[i]);
        }
        //first child
        liChildArray[0].textContent = "Description";
        var descParagraph = document.createElement("p");
        descParagraph.textContent = jobDescription[j];
        liChildArray[0].appendChild(descParagraph);
        //Second Description
        liChildArray[1].textContent = "Key responsibilities will include:";
        //create new ul inside this description in order to create a list of ten skills
        var ulChild = document.createElement("ul");
        liChildArray[1].appendChild(ulChild);
        //Then create 10 new item as skills
        var skills = new Array(10);
        for (var i = 0; i < skills.length; i++) {
            skills[i] = document.createElement("li");
            //assign every single item to a content from an array created before
            skills[i].textContent = keySkill[i][j];
            //now, append those item into the ulchild
            ulChild.appendChild(skills[i]);
        }   
        //Thirs description section
        liChildArray[2].textContent = "Knowledge, skills and experience relevant to this role:";
        //Create a ul to contain two new li inside this description
        var experienceUl = document.createElement("ul");
        liChildArray[2].appendChild(experienceUl);
        var experienceArray = new Array(2);
        for (var i =0; i < experienceArray.length; i++) {
            experienceArray[i] = document.createElement("li");
            experienceArray[i].textContent = experience[i][j];
            experienceUl.appendChild(experienceArray[i]);
        }
        //Forth desciption section    
        liChildArray[3].textContent = "Salary:";
        //Create a ul to contain two new li inside this description
        var salaryUl = document.createElement("ul");
        liChildArray[3].appendChild(salaryUl);
        var salaryArry = new Array(2);
        for (var i =0; i < salaryArry.length; i++) {
            salaryArry[i] = document.createElement("li");
            salaryArry[i].textContent = salary[i][j];
            salaryUl.appendChild(salaryArry[i]);
        }        
        //Last desciption section    
        liChildArray[4].textContent = "Salary:";
        //Create a ul to contain two new li inside this description
        var jobTypeUl = document.createElement("ul");
        liChildArray[4].appendChild(jobTypeUl);
        var jobTypeArray = new Array(2);
        for (var i =0; i < jobTypeArray.length; i++) {
            jobTypeArray[i] = document.createElement("li");
            jobTypeArray[i].textContent = jobType[i][j];
            jobTypeUl.appendChild(jobTypeArray[i]);
        }             
       
    }
    
        
    //change background color into much more white
    var containerArray = document.getElementsByClassName("jobs_item");
    for (var i =0; i < containerArray.length; i++) {
        containerArray[i].style.backgroundColor = "#FEFEFE";
    }
    
}
//Function to adjust menu, alignement and other when user use mobile device screen (< 600)
function mobileResponsive() {
    if (matchMedia) {
        const mq = window.matchMedia("(min-width: 480px)");
        mq.addListener(WidthChange);
        WidthChange(mq);
      }
      
      // media query change
      function WidthChange(mq) {
        if (!(mq.matches)) {
           /* document.getElementById("search").style.visibility = "hidden";
            document.getElementsByClassName("search")[0].style.visibility = "hidden";
            document.getElementsByClassName("course_login")[0].style.visibility = "hidden";
            document.getElementsByClassName("course_login")[1].style.visibility = "hidden";
            */
            //remove top_panel
            
            var header = document.getElementById("header");
            var headerChild = document.getElementById("top_panel");
            header.removeChild(headerChild);
            //remove the slogan
            var slogan = document.getElementById("slogan");
            slogan.parentNode.removeChild(slogan);

            //adjust the height of the nav
            var nav = document.getElementById("nav")
            nav.style.height = "60px";
            //disable the background-image
            nav.style.backgroundImage = "none";
            //Set background color for nav to lightblue
            nav.style.backgroundColor = "#6dbdd6";
            //Create a mini menu
            var menuIcon = new Array(3);
            var miniMenu = document.createElement("button");
            miniMenu.style.backgroundColor = "#6dbdd6";
            miniMenu.style.border = "none";
            miniMenu.style.flexDirection = "column";            
            for (var i = 0; i < menuIcon.length; i++) {
                menuIcon[i] = document.createElement("div");
                menuIcon[i].style.backgroundColor = "white";
                menuIcon[i].style.width = "50px";
                menuIcon[i].style.height = "8px";
                menuIcon[i].style.margin = "8px";
                miniMenu.appendChild(menuIcon[i]);
            }
            //Create a slogan 
            var newSlogan = document.createElement("h1");
            var sloganContent = document.createTextNode("Learn Your Way at VnDemy");
            newSlogan.appendChild(sloganContent);
            newSlogan.style.font = "bold 125% senserif";
            newSlogan.style.margin = "10% 10%";
            nav.appendChild(miniMenu);
            nav.appendChild(newSlogan);
            //then set the background color, margin, width and height
            

            //repositioning the menu such as it will overlay the body when we want
            var menu = document.getElementById("menu");
            menu.style.position = "absolute";
            menu.style.top = "60px";
            menu.style.width = "120px";
            menu.style.left = "-1px";         
            //now, hidding the menu
            menu.style.visibility = "hidden";
            //add an listen to click event of the menu
            miniMenu.addEventListener("click", menuDisplay);
            //miniMenu.addEventListener("click", menuMoving);
        }    

        
      
      }
}
//create a function to listen to user's event of menu click
function menuDisplay() {
    var menu = document.getElementById("menu");
    var status = menu.style.visibility;    
    if (status == "hidden") {
        menu.style.visibility = "visible";
        
    }
    else {
        menu.style.visibility = "hidden";
      
    }    
}


//--------------------------------------------------------------------------------------
//Main Funtion:
function init() {
    mobileResponsive();
    var sPath=window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    //alert(sPage);
    if (sPage == "apply.html") {
        var regForm = document.getElementById("applyForm");
        regForm.onsubmit = validate;
        //test sessionStorage
        
        prefill();
        var applyPageLoad = document.getElementById("apply");
        
        //applyPageLoad.addEventListener("load", refNoPrefill());
        //applyPageLoad.addEventListener("load", prefill);
        
        //refNoPrefill();
        //alert(localStorage.getItem("jobNumber1"));
    }
    else if (sPage == "jobsEnhancement.html") {
        //refLocalSave();
        var job1Apply = document.getElementById("job1Apply");
        job1Apply.onclick = refNo1LocalSave;
        var job2Apply = document.getElementById("job2Apply");
        job2Apply.onclick = refNo2LocalSave;
        
        //call display function to display job description on jobs.html page
        dataDisplay();
        

    }
    //job1Prefill();    
    //call function localSave() to store info
   
    //var functionCheck = document.getElementById("checkButton");
    //functionCheck.onclick = prefill;
    
}
//Call function
window.onload = init;