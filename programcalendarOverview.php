<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    //$eventName is gotten from programcalendar.php line 71
    $eventName = $_GET['eventname'];
    // pull info from database
    $sql = $con->prepare ("SELECT * FROM eventtable WHERE event_name = ?");
    $sql->bind_param('s', $_GET['eventname']);
    $result=$sql->execute();
    $sql->bind_result($eventName, $eventDate, $eventStartTime, $eventEndTime);
    if ($sql->fetch())
    {
        $eventName = $eventName;
        $eventDate = $eventDate;
        $eventStartTime = $eventStartTime;
        $eventEndTime = $eventEndTime;
    }
    $sql -> close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Program Calender</title>
        <link rel = "stylesheet" href = "general.css">
        <script type = "text/javascript" src = "programcalendar.js"></script>
    </head>
    <body>
    <div class = "title">
        Tribe Accelerator Cohort Management Portal
    </div>
    <br/>
    <div class = "tabs">
        <a href = "adminWebpage.php"><div class = "tabs-center">Homepage</div></a>
        <a href = "programcalendar.php"><div class = "tabs-center">Program Calendar</div></a> 
        <a href = "feedback.php"><div class = "tabs-center">Feed Back</div></a> 
        <a href = "usermanagement.php"><div class = "tabs-center">User Management</div></a>
        <div class = "tabs-center">Notification</div>
        <a href = "messages.php"><div class = "tabs-center">Messages</div></a> 
        <a href = "accountmanagement.php"><div class = "tabs-center">Account Management</div></a> 
    </div>
    <div class = programbackground>
        <div class = "title2">
            Overview of Current Event Record
        </div>
        <div class = "eventform">
            <form action="programcalendarEditDelete.php" method = "GET">
                <div class = "eventform-center">
                <input type = "hidden" name = "oldEventName" id = "oldEventName" value = "<?php echo $eventName;?>">
                Event Name: <?php echo $eventName;?>
                </div>
                <div class = "eventform-center">
                Event Date: <?php echo $eventDate;?>
                </div>
                <div class = "eventform-center">
                Event Start Time: <?php echo $eventStartTime;?>
                </div>
                <div class = "eventform-center">
                Event End Time: <?php echo $eventEndTime;?>
                </div>
                <div class = "eventform-center">
                Event Description: Here lies your description
                </div>
                <div class = "eventform-center">
                
                </div>
                <div class = "eventform-center">
                
                </div>
                <div class = "eventform-center">
                Event Attendence: <!--slot your attendence here -->
                </div>
                <div class = "eventbutton-half">
                    <button> Edit Event Record</button>
                </div>
            </form>
            <form action = programcalendarDeletePHP.php method = "POST">
                <div class = "eventbutton-half">
                    <input type = "hidden" name  = eventName value = "<?php echo $eventName;?>">
                    <button> Delete Event Record</button>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>