<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompRecCon - Schedule</title>
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
            <a href="schedule.php" class="active">Schedule</a>
            <a href="committees.php">Committees</a>
            <a href="sponsors.php">Sponsors</a>
            <a href="attendees.php">Attendees</a>
            <a href="hotel.php">Hotel</a>
            <a href="jobs.php">Jobs</a>
            <a href="finances.php">Finances</a>
        </div>
        <div class="content">
            <h1>Schedule</h1>
            <?php

            echo "<table style='border: solid 1px black;'><tr><th>Date</th><th>Session ID</th><th>Start Time</th><th>End Time</th><th>Room</th></tr>";

            $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

            $sql = "select day,sessionID,startTime,endTime,room from session";
            $stmt = $pdo->query($sql); //create the query

            while ($row = $stmt->fetch())
                {
	                echo "<tr><td style='width: 150px; border: 1px solid black;'>" . $row["day"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["sessionID"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["startTime"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["endTime"] . "</td><td style='width: 150px; border: 1px solid black;'>" . $row["room"] . "</td></tr>";
                }
			?>
			</table>
            <form action="changeSession.php" method="post">
            <p>
                To change a session's date, location, start/end time, or room, please fill out the following form and press submit. If a field is not being changed, enter the previous information.
            </p>
            <p>
                Enter the sesison ID: 
                <input type="number" name="sessionID">
                Enter the date: 
                <input type="date" name="day">
                Enter the start time:
                <input type="time" name="startTime">
            </p>
            <p>
                Enter the end time:
                <input type="time" name="endTime">
                Enter the room number:
                <input type="number" name="room">
                <input type="submit">
            </p>
            </form>
        </div>

    </section>

    <footer>
        <p></p>
    </footer>

</body>

</html>