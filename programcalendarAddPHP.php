<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    // creating new user and password
    $eventName = $_POST['eventname'];
    $eventDate = $_POST['eventdate'];
    $eventStartTime = $_POST['eventstime'];
	$eventEndTime = $_POST['eventetime'];

    $query = $con->prepare("INSERT INTO eventtable (event_Name, event_Date, event_StartTime, event_EndTime) VALUES (?,?,?,?)");
	$query->bind_param('ssss',$eventName, $eventDate, $eventStartTime, $eventEndTime);
	$query->execute();

    // bring user back to orignial web page
    echo "<script>alert('Event Created Succesfully!'); window.location='programcalendar.php'</script>";
?>