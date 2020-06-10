<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    //eventName is gotten from programcalendarEditDelete.php line 73
    $eventName = $_POST['eventName'];
    // delete from database based on variable $eventName
    $sql = $con->prepare ("DELETE FROM eventtable WHERE event_name = ?");
    $sql->bind_param('s', $eventName);
    $result=$sql->execute();
  
    // bring user back to orignial web page
    echo "<script>alert('Event Record Deleted Succesfully!'); window.location='programcalendar.php'</script>";s
?>

