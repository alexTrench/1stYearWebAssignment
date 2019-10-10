<!DOCTYPE html>
<html lang="en">
<head>
    <meta name = "viewport" content="width=device-width" />
    <meta charset="UTF-8" />
    <link href="assignmentCss.css" rel= "stylesheet" type= "text/css"/>
    <title>Edit Events</title>
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
            <li><a href="AddEventForm.php" >ADD EVENT</a></li>
            <li><a href="chooseEventEdit.php" >EDIT EVENT</a></li>
            <li id="AdminLink"><a href="Admin.html">ADMIN</a></li>

        </ul>
    </nav>



<div id ='EditableEvents'><p>Editable Events (Ordered By Title)</p><p>Click Title of a Event to be taken to the editing page</p></div>
    <div id ='EditableEventstwo'></div>
<?php
//includes a different php script which just connects to the database
include'database_conn.php';

//joins the events and category tables together to dislpay the catergory name instead of the id.
$sql = "SELECT eventID, eventTitle, eventDescription, venueID,catDesc, eventStartDate, eventEndDate, eventPrice
FROM AE_events 
INNER JOIN AE_category 
ON AE_category.catID = AE_events.catID ORDER BY eventTitle";

$result = $dbConn->query($sql);

//takes the objects from the sql statement and puts them into variables
while($rowObj = $result->fetch_object()) {
    $eventID = $rowObj->eventID;
    $eventTitle = $rowObj->eventTitle;
    $eventDescription = $rowObj->eventDescription;
    $venueID = $rowObj->venueID;
    $catDesc = $rowObj->catDesc;

    //shows the details of the event
    echo "<div id='ColumnEvents'><a id ='EditEventText'><a href='updateEvent.php?eventID=$eventID' ><p id='EventTitleEdit'>Title:$eventTitle</p></a><p id='EventTitleEdit'>Desription:$eventDescription </p></div>";
}





?>
</div>
</body>
</html>