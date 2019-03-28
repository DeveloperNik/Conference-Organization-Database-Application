<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompRecCon - Jobs</title>
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
            <a href="jobs.php" class="active">Jobs</a>
            <a href="finances.php">Finances</a>
        </div>
        <div class="content">
            <h1>All Jobs</h1>
			<?php

			echo "<table style='border: solid 1px black;'><tr><th>Job ID</th><th>Title</th><th>Company</th><th>Pay Rate</th><th>City</th><th>Province</th></tr>";

			#connect to the database
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

			$sql = "select * from jobads order by company";
			$stmt = $pdo->query($sql);   

			#stmt contains the result of the program execution
			#use fetch to get results row by row.
			while ($row = $stmt->fetch()) {
				echo "<tr><td style='width: 150px; border: 1px solid black;'>".$row["jobID"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["title"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["company"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["payrate"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["city"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["province"]."</td></tr>";
			}
			?>
			</table>
			
			<h3>Select a company to show its jobs</h3>
			<form action="compJobs.php" method="post">
				<p>Company name:</p>
				<input type="text" name="companyName">
				<br>
				<input type="submit">
			</form>
        </div>

    </section>

    <footer>
        <p></p>
    </footer>

</body>

</html>