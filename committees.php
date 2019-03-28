<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompRecCon - Committees</title>
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
            <a href="committees.php" class="active">Committees</a>
            <a href="sponsors.php">Sponsors</a>
            <a href="attendees.php">Attendees</a>
            <a href="hotel.php">Hotel</a>
            <a href="jobs.php">Jobs</a>
            <a href="finances.php">Finances</a>
        </div>
        <div class="content">
            <h1>Committees</h1>
			<?php
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
			echo "<table style='border: solid 1px black;'><tr><th>Committee Name</th></tr>";


			$sql = "select name from subcommittee order by name";
			$stmt = $pdo->query($sql);   #create the query

			#stmt contains the result of the program execution
			#use fetch to get results row by row.
			while ($row = $stmt->fetch()) {
				echo "<tr><td style='width: 150px; border: 1px solid black;'>".$row["name"]."</td></tr>";
			}
			?>
			</table>
			
			<h3>Show Subcommittee Members</h3>
			<form action="members.php" method="post">
			<select name="comName" >
				<option value="">Select...</option>
				<option value="Accounting Committee">Accounting</option>
				<option value="Networking Committee">Networking</option>
				<option value="Security Committee">Security</option>
				<option value="Setup Committee">Setup</option>
			</select>
			<input type="submit">
			</form>

        </div>

    </section>

    <footer>
        <p></p>
    </footer>

</body>

</html>