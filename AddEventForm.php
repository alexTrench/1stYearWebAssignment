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
            <li id="AdminLink"><a href="Admin.html">ADMIN</a></li>

        </ul>
    </nav>
</div>


<form id = "AddEvent" action="AddEvent.php" method="get">
    <div id = leftColumnAddEvents>Event title: <input type="text" name="eventTitle" required/></div>
   <div id = rightcolumnAddEvents>
    Category of Event:
    <select name="EventCategory" required>
        <?php
        include 'database_conn.php';

        $CatDescriptionsql = "SELECT catDesc,catID FROM AE_category";

        $CatDescription = $dbConn->query($CatDescriptionsql);

        while($rowObj = $CatDescription->fetch_object()){
            $catID = $rowObj->catID;
            $catDesc = $rowObj->catDesc;

            echo"<option value = '$catID'>$catDesc</option>";

        }


        $dbConn->close();
        ?>
    </select>
   </div>

    <div id = leftColumnAddEvents>
    venue of Event
    <select name="venue" required>
            <?php
            include 'database_conn.php';

            $venuesql = "SELECT venueID,venueName,location FROM AE_venue";

            $venueLocation = $dbConn->query($venuesql);

            while($rowObj = $venueLocation->fetch_object()){
                $venueID = $rowObj->venueID;
                $venueName = $rowObj->venueName;
                $location = $rowObj->location;

                echo"<option value = '$venueID'>$venueName</option>";
            }


            $dbConn->close();

            ?>
        </select>
    </div>


    <div  id = rightcolumnAddEvents>Price: <input type="number" max="99"name="Price" required/></div>
    <div id = leftColumnAddEvents>Start date: <input type="date" name="StartDate" required/></div>
    <div id = rightcolumnAddEvents>End date: <input type="date" name="EndDate" required/></div>
    <div id = leftColumnAddEvents>Description:
    <textarea name="Description" required
              style="width:70%; height:99%;">
       </textarea>
    </div>
    <div id = leftcolumnAddEventsSubmit><input type="submit" value="Add Event" required/></div>

</form>



</body>
</html>