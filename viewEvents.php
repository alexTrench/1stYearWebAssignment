<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <title>Arts and Events</title>

    <link href="assignmentCss.css" rel= "stylesheet" type= "text/css"/>
</head>
<body>


<header>
    <h1><img id="logo" src="Canary+Wharf+Arts+++Events.jpg" alt="Arts and Events Logo"></h1>
</header>


<div id="wrapper">

    <nav id="Navagation">
        <ul>
            <li><a href="index.html">HOME</a></li>
            <li><a href="viewEvents.php">VIEW EVENTS</a></li>
            <li><a href="WireframeForAssigment1.pdf" target="_blank">WIREFRAME</a></li>
            <li><a href="credits.html" >CREDITS</a></li>
            <li id="AdminLink"><a href="Admin.html">ADMIN</a></li>

        </ul>
    </nav>
</div>

<?php
//includes a different php script which just connects to the database
include 'database_conn.php';

//gets all of the variables from the form, if they have not entered anything it will default to null stopping undefined index error
$eventID = isset($_REQUEST['eventID'])? $_REQUEST ['eventID']:null;
$eventTitle = isset($_REQUEST['eventTitle'])? $_REQUEST ['eventTitle']:null;
$eventDescription = isset($_REQUEST['eventDescription'])? $_REQUEST ['eventDescription']:null;
$venueID = isset($_REQUEST['venueID'])? $_REQUEST ['venueID']:null;
$catID = isset($_REQUEST['catID'])? $_REQUEST ['catID']:null;
$eventStartDate = isset($_REQUEST['eventStartDate'])? $_REQUEST ['eventStartDate']:null;
$eventEndDate = isset($_REQUEST['eventEndDate'])? $_REQUEST ['eventEndDate']:null;
$eventPrice = isset($_REQUEST['eventPrice '])? $_REQUEST ['eventPrice ']:null;

//selects all the elements i want from the events table joined with both the category tables and ordered by the title
$sql = "SELECT eventID, eventTitle, eventDescription, venueID,catDesc, eventStartDate, eventEndDate, eventPrice
FROM AE_events 
INNER JOIN AE_category 
ON AE_category.catID = AE_events.catID ORDER BY eventTitle";



$filmResults = $dbConn->query($sql);

//goes through all of the selected objects in the sql query
while($rowObj = $filmResults->fetch_object()) {
    $eventID = $rowObj->eventID;
    $eventTitle = $rowObj->eventTitle;
    $eventDescription = $rowObj->eventDescription;
    $venueID = $rowObj->venueID;
    $catDesc = $rowObj->catDesc;
    $eventStartDate = $rowObj->eventStartDate;
    $eventEndDate = $rowObj->eventEndDate;
    $eventPrice = $rowObj->eventPrice;

//this will print the information of the events straight from the database
echo"<div id='ColumnEvents'><p id='EventTitle'>Title:$eventTitle</p> <p id='EventStartDate'>Start Date(Year-Month-Day):$eventStartDate</p>  <p id='EventEndDate'>End Date(Year-Month-Day):$eventEndDate</p>   <p id='EventPrice'>Price:£$eventPrice</p> <p id='EventDescription'>Desciption:$eventDescription</p></div>";

}
//closes the database connection
$dbConn->close();
?>


<table>
</body>
</html>