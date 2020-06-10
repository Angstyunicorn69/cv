<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    // updating current event records
    $oldEventName = $_POST['oldEventName'];
    $eventName = $_POST['currentEventName'];
    $eventDate = $_POST['currentEventDate'];
    $eventStime = $_POST['currentEventStime'];
	$eventEtime = $_POST['currentEventEtime'];

    $sql1 = $con->prepare("UPDATE eventtable SET event_Name = ?, event_Date = ?, event_StartTime = ?, event_EndTime = ? WHERE event_Name = ?");
	$sql1->bind_param('sssss',$eventName, $eventDate, $eventStime, $eventEtime, $oldEventName);
	$results=$sql1->execute();

    // bring user back to orignial web page
    echo "<script>alert('Event Record Edited Succesfully!'); window.location='programcalendar.php'</script>";

    
?>

