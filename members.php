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
			$name = $_POST["comName"];                      

			echo "<h1>$name</h1>";
			
			echo "<table style='border: solid 1px black;'><tr><th>First Name</th><th>Last Name</th></tr>";

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql = "select fname, lname from member left join worker on member.workerID = worker.workerID where name = ?";
			$stmt = $pdo->prepare($sql);   #create the query
			$stmt->execute([$name]);   #bind the parameters

			#stmt contains the result of the program execution
			#use fetch to get results row by row.
			while ($row = $stmt->fetch()) {
				echo "<tr><td style='width: 150px; border: 1px solid black;'><p>".$row["fname"]."</p></td><td style='width: 150px; border: 1px solid black;'><p>".$row["lname"]."</p></td></tr>";
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