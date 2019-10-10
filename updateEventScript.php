<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width" />
    <meta charset="UTF-8" />
    <link href="assignmentCss.css" rel= "stylesheet" type= "text/css"/>

    <title>Arts and Events</title>
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

<h1>Updating Films</h1>
<?php
//includes a different php script which just connects to the database
include 'database_conn.php';

//finds all of the inputs from the updateEvent form filled in previous, then assigns them all a meaningful variable.
$eventID = ($_REQUEST['eventID'])? $_REQUEST['eventID']:null;
$title = ($_REQUEST['eventTitle'])? $_REQUEST['eventTitle']:null;
$startDate = ($_REQUEST['eventStartDate'])? $_REQUEST['eventStartDate']:null;
$price = ($_REQUEST['price'])? $_REQUEST['price']:null;
$description = ($_REQUEST['eventDescription'])? $_REQUEST['eventDescription']:null;
$endDate = ($_REQUEST['eventEndDate'])? $_REQUEST['eventEndDate']:null;
$category = ($_REQUEST['EventCategory'])? $_REQUEST['EventCategory']:null;
$venue = ($_REQUEST['venue'])? $_REQUEST['venue']:null;


//this sql joins the three tables together and updates the all of the information from the form into the event
$sql ="UPDATE AE_events 
INNER JOIN AE_category 
ON AE_category.catID = AE_events.catID 
INNER JOIN AE_venue
ON AE_venue.venueID = AE_events. venueID 
SET eventTitle = '$title' , eventDescription = '$description' , AE_events.catID = '$category',AE_events. venueID = '$venue',  eventStartDate ='$startDate', eventEndDate = '$endDate', eventPrice = '$price' 
WHERE eventID = '$eventID'";

$eventUpdates = $dbConn->query($sql);

//if the databse fails it will tell the user
if($eventUpdates === false) {
    echo "<p>Query failed: " . $dbConn->error . "</p>";
    exit;
}
else{
    echo"You Have Successfully edited a event";


}

?>
</div>
</body>
</html>