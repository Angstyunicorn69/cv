<?php
    // create connection
	$con = mysqli_connect("localhost", "root", "", "tacmportal" )
    or die ("Error, unable to connect to database");

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Admin Interface</title>
        <link rel = "stylesheet" href = "general.css">
        <script type = "text/javascript" src = "adminWebpage.js"></script>
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
        <br/><br/>

        <div class = "general">
            <div class = "announcement">
                Announcements
                <!-- your list of announcement can go here -->
                <table class = "generalEventTable">
                    <thead>
                        <tr>
                            <th class = "generalEventHead">Announcement Date</th>
                            <th class = "generalEventHead">Announcement</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class = "overview">
                General Overview of Events
                <table class = "generalEventTable">
                    <thead>
                        <tr>
                            <th class = "generalEventHead">Event Name</th>
                            <th class = "generalEventHead">Event Date</th>
                            <th class = "generalEventHead">Event Start Time</th>
                            <th class = "generalEventHead">Event End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = $con->prepare ("SELECT * FROM eventtable");
                            $result=$sql->execute();
                            $sql->bind_result($eventname, $eventdate, $eventstarttime, $eventendtime);

                            while($sql->fetch()){
                                echo"<tr>";
                                printf("<td class = 'generalEventHead'>%s</td>",$eventname);
                                printf("<td class = 'generalEventHead'>%s</td>",$eventdate);
                                printf("<td class = 'generalEventHead'>%s</td>",$eventstarttime);
                                printf("<td class = 'generalEventHead'>%s</td>",$eventendtime);
                                echo"</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        

        
    </body>
</html>