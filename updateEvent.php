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
            <li id="AdminLink"><a href="Admin.html">ADMIN</a></li>

        </ul>
    </nav>


</div>

<form id = "updateEvent" action="updateEventScript.php" method="get">
    <?php
    //includes a different php script which just connects to the database
    include'database_conn.php';


    //finds the event id from the choose event form and assigns it to the variable
    $eventID = ($_REQUEST['eventID'])? $_REQUEST['eventID']:null;


//Joins all three tables together and selects all the information needed to modify a event.
    $sql ="SELECT eventID,eventTitle,eventDescription, catDesc, venueName, eventStartDate, eventEndDate, eventPrice
FROM AE_events  
INNER JOIN AE_category 
ON AE_category.catID = AE_events.catID 
INNER JOIN AE_venue
ON AE_venue.venueID = AE_events. venueID WHERE eventID = '$eventID'
ORDER BY eventTitle";


    $sqlresult = $dbConn->query($sql);

    //assigns the objects in the sql query a variable
    while($rowObj = $sqlresult->fetch_object()){
        $eventID = $rowObj->eventID;
        $eventTitle = $rowObj->eventTitle;
        $eventDescription = $rowObj->eventDescription;
        $catDesc =  $rowObj->catDesc;
        $venueName =  $rowObj->venueName;
        $eventStartDate =  $rowObj->eventStartDate;
        $eventEndDate =  $rowObj->eventEndDate;
        $eventPrice =  $rowObj->eventPrice;
        //displays the old information of the event so the use knows they are editing the right one, they can then change the information to modify it
        echo "<div><input type='hidden' name='eventID' value='{$rowObj->eventID}' /></div>";
        echo "<div id = leftColumnAddEvents>Title:  <input type='text' name='eventTitle' value='{$rowObj->eventTitle}' /></div>";
        echo "<div id = rightcolumnAddEvents>Description:  <input type='text' name='eventDescription' value='{$rowObj->eventDescription}' /></div>";
        echo "<div id = leftColumnAddEvents>Start Date:  <input type='text' name='eventStartDate' value='{$rowObj->eventStartDate}' /></div>";
        echo "<div id = rightcolumnAddEvents>End Date:  <input type='text' name='eventEndDate' value='{$rowObj->eventEndDate}' /></div>";
        echo "<div id = leftColumnAddEvents>Price:  <input type='text' name='price' value='{$rowObj->eventPrice}' /></div>";
    }


//closes all connection to the database
    $sqlresult->close();
    $dbConn->close();
    ?>

    <div id = rightcolumnAddEvents>
        Category of Event:
        <select name="EventCategory" >
            <?php
            include 'database_conn.php';

            //selects from the catagory so to get the real description instead of just the id
            $CatDescriptionsql ="SELECT catID,catDesc
            FROM AE_category";

            $CatDescription = $dbConn->query($CatDescriptionsql);

            while($rowObj = $CatDescription->fetch_object()){
                $catID = $rowObj->catID;
                $catDesc = $rowObj->catDesc;
                //they can select a list of category's all generated from what is on the database
                echo"<option value = '$catID'>$catDesc</option>";

            }


            $dbConn->close();
            ?>
        </select>
    </div>

    <div id = leftColumnAddEvents>
        venue of Event
        <select name="venue" >
            <?php
            include 'database_conn.php';
            //selects stright from the venue database to get the true name of the venue than the id
            $venuesql ="SELECT venueID,venueName
            FROM AE_venue";

            $venueLocation = $dbConn->query($venuesql);

            while($rowObj = $venueLocation->fetch_object()){
                $venueID = $rowObj->venueID;
                $venueName = $rowObj->venueName;

                //they can select a list of venues all generated from what is on the database
                echo"<option value = '$venueID'>$venueName</option>";
            }

            //close all database connections
            $dbConn->close();

            ?>
        </select>
    </div>
    <?php
    echo  "<div id = rightcolumnAddEventsSubmit><input type = 'submit' value = 'Update'></div>";
    ?>

</form>



</body>
</html>