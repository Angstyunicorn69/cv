<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

?>


<!DOCTYPE html>
<html>
    <head>
        <title>User Management</title>
        <link rel = "stylesheet" href = "general.css">
        <script type = "text/javascript" src = "usermanagement.js"></script>
       
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
        <div class = "userbackground">
            <div id = "title2" class = "title2">
                Creation of new User Accounts
            </div>
            <div id = "userform">
                <form action="usermanagementAddPHP.php" method = "POST">
                    <div class = "userform-center">
                    UserName
                    <input type = "text" name = "newUserId" id = "newUserId" size = "30">
                    </div>
                    <div class = "userform-center">
                    Password
                    <input type = "text" name = "newPassword" id = "newPassword" size = "30">
                    </div>
                    <div class = "eventbutton-center">
                    <button name = "create" id = "create"> Create New Account </button>
                    </div>
                </form>
            </div>
            <br/><hr/><br/>
            <div id = "edition">
                <div id = "title2" class = "title2">
                    Current User Records
                </div>
                <table width = "100%" border = "1">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = $con->prepare ("SELECT * FROM accounts");
                            $result=$sql->execute();
                            $sql->bind_result($user, $pw);

                            while($sql->fetch()){
                                echo"<tr>";
                                printf("<td><form method = 'GET'><a href = 'usermanagementEdit.php?user=$user'>
                                        %s<input type = 'hidden' name = 'user' value = $user></a></form></td>",$user);
                                printf("<td>%s</td>",$pw);
                                echo"</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>