<!DOCTYPE html>
<html lang="en">

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
            <a href="hotel.php" class="active">Hotel</a>
            <a href="jobs.php">Jobs</a>
            <a href="finances.php">Finances</a>
        </div>
        <div class="content">
            <h1>Hotel</h1>
			<?php

			echo "<table style='border: solid 1px black;'><tr><th>Room Number</th><th>Occupancy</th></tr>";

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql = "select * from room";
			$stmt = $pdo->query($sql);   

			#stmt contains the result of the program execution
			#use fetch to get results row by row.
			while ($row = $stmt->fetch()) {
				echo "<tr><td style='width: 150px; border: 1px solid black;'>".$row["roomID"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["occupancy"]."</td></tr>";
			}

			?>
			</table>
			
			<form action="showOccu.php" method="post">
			<p>Select a room number to show occupants:</p>
			<input type="text" name="roomID">
			<input type="submit">
			</form> 
        </div>

    </section>

    <footer>
        <p></p>
    </footer>

</body>

</html>