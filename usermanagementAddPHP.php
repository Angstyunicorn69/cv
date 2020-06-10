<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    // creating new user and password
    $userName = $_POST['newUserId'];
	$passWord = $_POST['newPassword'];

    $query = $con->prepare("INSERT INTO accounts (username, pw) VALUES (?,?)");
	$query->bind_param('ss',$userName, $passWord);
	$query->execute();

    // bring user back to orignial web page
    echo "<script>alert('Account Created Succesfully!'); window.location='usermanagement.php'</script>";
?>