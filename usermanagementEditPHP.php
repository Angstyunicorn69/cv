<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    // updating current user records
    $olduserName = $_POST['oldUserId'];
    $userName = $_POST['currentUserId'];
	$passWord = $_POST['currentPassword'];

    $sql1 = $con->prepare("UPDATE accounts SET username = ?, pw = ? WHERE username = ?");
	$sql1->bind_param('sss',$userName, $passWord, $olduserName);
	$results=$sql1->execute();

    // bring user back to orignial web page
    echo "<script>alert('User Edited Succesfully!'); window.location='usermanagement.php'</script>";
?>