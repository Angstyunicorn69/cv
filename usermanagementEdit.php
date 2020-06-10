<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

    $user = $_GET['user'];
    // pull info from database
    $sql = $con->prepare ("SELECT * FROM accounts WHERE username = ?");
    $sql->bind_param('s', $_GET['user']);
    $result=$sql->execute();
    $sql->bind_result($user, $pw);
    if ($sql->fetch())
    {
        $user = $user;
        $pw = $pw;
    }
    $sql -> close();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>User Management</title>
        <link rel = "stylesheet" href = "general.css">
       
    </head>

    <body>
        <div id = "title" class = "title">
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
        <br/><br/>
        <div id = "title2" class = "title2">
            Editing Current User
        </div>
        <div id = "edition">
            <form action="usermanagementEditPHP.php" method = "POST">
                UserName
                <input type = "text" name = "currentUserId" id = "currentUserId" value = "<?php echo $user;?>" size = "30">
                <input type = "hidden" name = "oldUserId" id = "oldUserId" value = "<?php echo $user;?>">
                Password
                <input type = "text" name = "currentPassword" id = "currentPassword" value = "<?php echo $pw;?>" size = "30">
                <br/>
                <br/>
                <button name = "edit" id = "edit"> Edit Account </button>
            </form>
            </div>
        </div>
    </body>
</html>