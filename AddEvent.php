<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
            <li><a href="index.html" >CREDITS</a></li>
            <li><a href="AddEventForm.php" >ADD EVENT</a></li>
            <li><a href="chooseEventEdit.php" >EDIT EVENT</a></li>
            <li id="AdminLink"><a href="Admin.html">ADMIN</a></li>

        </ul>
    </nav>
</div>

<?php
//includes a different php script which just connects to the database
include 'database_conn.php';

//gets what the user entered in the add event form and put them into variables
$eventTitle = isset($_REQUEST['eventTitle'])?$_REQUEST['eventTitle']:null;
$eventDescription = isset($_REQUEST['Description'])?$_REQUEST['Description']:null;
$catID = isset($_REQUEST['EventCategory'])?$_REQUEST['EventCategory']:null;
$venueID = isset($_REQUEST['venue'])?$_REQUEST['venue']:null;
$Price = isset($_REQUEST['Price'])?$_REQUEST['Price']:null;
$StartDate = isset($_REQUEST['StartDate'])?$_REQUEST['StartDate']:null;
$EndDate = isset($_REQUEST['EndDate'])?$_REQUEST['EndDate']:null;


//add the new values and variables into the events table
$AddEventsql = "INSERT INTO AE_events (eventTitle,eventDescription,venueID,catID,eventStartDate,eventEndDate,eventPrice) values('$eventTitle','$eventDescription','$venueID','$catID','$StartDate','$EndDate','$Price')";

$Eventresult = $dbConn->query($AddEventsql);

//joins the three tables together with all of the items selected
$jointablesql= "SELECT eventID,eventTitle, catDesc, venueName, eventStartDate, eventEndDate, eventPrice
FROM AE_events 
INNER JOIN AE_category 
ON AE_category.catID = AE_events.catID 
INNER JOIN AE_venue
ON AE_venue.venueID = AE_events. venueID WHERE eventTitle = '$eventTitle'
ORDER BY eventTitle";


//querys the sql statement
$joinresult = $dbConn->query($jointablesql);


//assigns the objects variables
while($rowObj = $joinresult->fetch_object()) {
    $venueName = $rowObj->venueName;
    $catDescription = $rowObj->catDesc;


}


// Check for and handle query failure
    if ($AddEventsql === false) {
        echo "<p>Problem when Adding Event: " . $dbConn->error . ". Try again</p>";
        exit;
    }


    echo "<div id ='AddingEventSuccessful'>You have successfully added a new event </div>";
//decides what image pops up depending which category is chosen
if ($catDescription =='Carnival'){
    echo "<div id ='AddingEventSuccessful'><img src=\"carnival.jpg\" alt=\"carnival Event style\"=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Theatre'){
    echo "<div id ='AddingEventSuccessful'><img src=\"Theatre.jpg\" alt=\"Theatre Event\" style=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Comedy'){
    echo "<div id ='AddingEventSuccessful'><img src=\"comedy.jpg\" alt=\"comedy Event\" style=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Exhibition'){
    echo "<div id ='AddingEventSuccessful'><img src=\"EXHIBITION.jpg\" alt=\"Exhibition Event\" style=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Festival'){
    echo "<div id ='AddingEventSuccessful'><img src=\"firework.jpg\" alt=\"Festival Event\" style=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Family'){
    echo "<div id ='AddingEventSuccessful'><img src=\"family.jpg\" alt=\"Family Event\" style=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Music'){
    echo "<div id ='AddingEventSuccessful'><img src=\"music.jpg\" alt=\"music Event\" style=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Sport'){
    echo "<div id ='AddingEventSuccessful'><img src=\"sport.jpg\" alt=\"sport Event\" style=\"width:304px;height:228px;\"> </div>";

    //decides what image pops up depending which category is chosen
}
if ($catDescription =='Dance') {
    echo "<div id ='AddingEventSuccessful'><img src=\"dance.jpg\" alt=\"dance Event\" style=\"width:304px;height:228px;\"> </div>";


}


//displays the information you have added into the databse confirming you have made a new event


//closes connection to the database
$joinresult->close();
$dbConn->close();

echo"<div id = EventConformationPage>Event Title: $eventTitle</div>";
echo"<div id = EventConformationPage1>Event Description: $eventDescription</div>";
echo"<div id = EventConformationPage2>Category: $catDescription</div>";
echo"<div id = EventConformationPage3>Venue: $venueName</div>";
echo"<div id = EventConformationPage4>Price: £$Price</div>";
echo"<div id = EventConformationPage5>Start date:$StartDate</div>";
echo"<div id = EventConformationPage6>End date: $EndDate</div>";

?>





</body>
</html>