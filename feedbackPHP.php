<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    // creating new user and password
    $title = $_POST['title'];
	$feedBack = $_POST['feedBackTextArea'];

    $query = $con->prepare("INSERT INTO feedback (title, feedback) VALUES (?,?)");
	$query->bind_param('ss',$title, $feedBack);
	$query->execute();

    // bring user back to orignial web page
    echo "<script>alert('Feedback Created Succesfully!'); window.location='feedback.php'</script>";
?>