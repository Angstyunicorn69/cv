<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

?>


<!DOCTYPE html>
<html>
    <head>
        <Title>Feedback</Title>
        <link rel = "stylesheet" href = "general.css">
        <script type = "text/javascript" src = "feedback.js"></script>
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
        <div class = "feedbackbackground">
            <div id = "title2" class = "title2">
                Creation of Feedback Form
            </div>

            <div>
                <form action="feedbackPHP.php" method = "POST">
                    Title<br/>
                    <input type = "text" name = "title" id = "title" class = "title">
                    <br/>
                    Feedback<br/>
                    <textarea name = "feedBackTextArea" id = "feedBackTextArea" class = "feedBackTextArea"></textarea>
                    <br/><br/>
                    <button name = "create" id = "create"> Create New Feed-Back </button>
                </form>
            </div>
            <br/><hr/><br/>
            <div id = "title2" class = "title2">
                Overview of individual feedback form
            </div>

            <div>
                <table border = "1" width = 100%>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Feed Back</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // query the database to search for feedback
                            // query the database
                            $sql = $con->prepare ("SELECT * FROM feedback");
                            $result=$sql->execute();
                            $sql->bind_result($title, $feedback);

                            while($sql->fetch()){
                                echo"<tr>";
                                printf("<td>%s</td>",$title);
                                printf("<td>%s</td>",$feedback);
                                echo"</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>