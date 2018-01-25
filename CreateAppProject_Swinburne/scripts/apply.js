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
    if (!(/^[\d]{5}$/).test(number)) {
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
    if (sessionStorage.getItem("firstname") != "undefined") {
        document.getElementById("firstname").value= sessionStorage.getItem("firstname");                          
        }
   
        //alert(document.getElementById("firstname").value)
    //retrieve the lastname from sesseionStrorage
    if (sessionStorage.getItem("lastname") != "undefined") {
        document.getElementById("lastname").value= sessionStorage.getItem("lastname");                          
        }
        //alert(document.getElementById("lastname").value)
    //retrieve dateOfBirth
    if (sessionStorage.getItem("dateOfBirth") != "undefined") {
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
    if (sessionStorage.getItem("email") != "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("email").value= sessionStorage.getItem("email");                          
        }
    //set the lenth of predefined beard
    if (sessionStorage.getItem("phoneNo") != "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("phoneNo").value= sessionStorage.getItem("phoneNo");                          
        }
    //fill the skills/trip previous ordered
    //Retrieve email
    if (sessionStorage.getItem("street") != "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("street").value= sessionStorage.getItem("street");                          
        }
    //set the lenth of predefined beard
    if (sessionStorage.getItem("suburb") != "undefined") {
        //alert(sessionStorage.age)
        document.getElementById("suburb").value= sessionStorage.getItem("suburb");                          
        }
    //fill the state
    if (sessionStorage.getItem("stateSelection") != "undefined") {
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
    if (sessionStorage.getItem("postcode") != "undefined") {
        document.getElementById("postcode").value = sessionStorage.getItem("postcode");
    }
    //prefill the skills    
    if (sessionStorage.getItem("skills") !="undefined") {
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
    //alert("check refNoPrefill() function");
    var refNo = localStorage.getItem("refNo");    
    if (refNo != "" || refNo != null) {
        //alert(refNo);
        var refInput = document.getElementById("refNo");
        refInput.value = refNo;
        refInput.readOnly = true;   //set the attribute of the input as read-only
        refInput.style.backgroundColor = "#EFEFEF";
    }
    //return referenceNumber;
}

//--------------------------------------------------------------------------------------
//Main Funtion:
function init() {
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
        //applyPageLoad.addEventListener("onload", prefill());
        //refNoPrefill();
        //alert(localStorage.getItem("jobNumber1"));
    }
    else if (sPage == "jobs.html") {
        //refLocalSave();
        var job1Apply = document.getElementById("job1Apply");
        job1Apply.onclick = refNo1LocalSave;
        var job2Apply = document.getElementById("job2Apply");
        job2Apply.onclick = refNo2LocalSave;
        
       
        

    }
    //job1Prefill();    
    //call function localSave() to store info
   
    //var functionCheck = document.getElementById("checkButton");
    //functionCheck.onclick = prefill;
    
}
//Call function
window.onload = init;