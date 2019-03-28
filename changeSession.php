<!DOCTYPE html>
<html>
<head>
    <title>CompRecCon - Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="home.css" type="text/css" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" />
    <title>CMPE 332 Project: Group 95</title>
</head>
<body>
    <div class="head1"></div>

    <section>
        <div class="sidenav">
            <a href="home.html">Home</a>
            <a href="schedule.php">Schedule</a>
            <a href="committees.php">Committees</a>
            <a href="sponsors.php">Sponsors</a>
            <a href="attendees.php">Attendees</a>
            <a href="hotel.php">Hotel</a>
            <a href="jobs.php">Jobs</a>
            <a href="finances.php">Finances</a>
        </div>
        <div class="content">
			<?php
            $ID = $_POST["sessionID"];
            $day = $_POST["day"];
            $startTime = $_POST["startTime"];
            $endTime = $_POST["endTime"];
            $room = $_POST["room"];

            echo "<h1>New Schedule</h1>";


            echo "<table style='border: solid 1px black;'><tr><th>Date</th><th>Session ID</th><th>Start Time</th><th>End Time</th><th>Room</th></tr>";

            $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

            $sql = "update session set day = '$day', startTime = '$startTime', endTime = '$endTime', room = '$room' where sessionID = '$ID'";
            $stmt = $pdo->query($sql); //create the query
            
            $sql = "select day,sessionID,startTime,endTime,room from session";
            $stmt = $pdo->query($sql); //create the query

            while ($row = $stmt->fetch())
                {
	                echo "<tr><td style='width: 150px; border: 1px solid black;'>" . $row["day"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["sessionID"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["startTime"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["endTime"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["room"] . "</td></tr>";
                }
			?>
			</table>
        </div>

    </section>

    <footer>
        <p></p>
    </footer>

</body>
</html> 