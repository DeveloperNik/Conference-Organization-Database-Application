<!DOCTYPE html>
<html lang="en">

<head>
    <title>CompRecCon - Attendees</title>
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
            <a href="attendees.php" class="active">Attendees</a>
            <a href="hotel.php">Hotel</a>
            <a href="jobs.php">Jobs</a>
            <a href="finances.php">Finances</a>
        </div>
        <div class="content">
            <h1  style='font-size: 30px;'>Attendees</h1>
            <h3 style='font-size: larger;'>Students</h3>
			<?php
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
			echo "<table style='border: solid 1px black;'><tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";


			$sql = "select ID,fname,lname from attendees natural join student";
			$stmt = $pdo->query($sql);   #create the query

			#stmt contains the result of the program execution
			#use fetch to get results row by row.
			while ($row = $stmt->fetch()) {
				echo "<tr><td style='width: 150px; border: 1px solid black;'>".$row["ID"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["fname"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["lname"]."</td></tr>";
			}
            ?>
            </table>
            
            <h3 style='font-size: larger;'>Professionals</h3>
            <?php
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
			echo "<table style='border: solid 1px black;'><tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";


			$sql = "select ID,fname,lname from attendees natural join professional";
			$stmt = $pdo->query($sql);   #create the query

			#stmt contains the result of the program execution
			#use fetch to get results row by row.
			while ($row = $stmt->fetch()) {
				echo "<tr><td style='width: 150px; border: 1px solid black;'>".$row["ID"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["fname"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["lname"]."</td></tr>";
			}
            ?>
            </table>

            <h3 style='font-size: larger;'>Sponsors</h3>
			<?php
			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
			echo "<table style='border: solid 1px black;'><tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";


			$sql = "select ID,fname,lname from attendees natural join sponsor";
			$stmt = $pdo->query($sql);   #create the query

			#stmt contains the result of the program execution
			#use fetch to get results row by row.
			while ($row = $stmt->fetch()) {
				echo "<tr><td style='width: 150px; border: 1px solid black;'>".$row["ID"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["fname"]."</td><td style='width: 150px; border: 1px solid black;'>".$row["lname"]."</td></tr>";
			}
            ?>
            </table>
            
            <form action="createAttendee.php" method="post">
            <p>Please fill the form below to add an attendee:</p>
            <p>First Name: </p>
            <input type="text" name="fname">
            <p>Last Name: </p>
            <input type="text" name="lname">
            <p> Is this attendee a 'Sponsor', 'Student', or 'Professional'?</p>
            <input type="text" name="type">
            <p> If the attendee is a sponsor, please enter their company below:</p>
            <input type="text" name="company">
            <p> If this is the first sponsor of the company, please enter the company's donation below:</p>
            <input type="text" name="donation">
			<input type="submit">
			</form> 
        </div>

    </section>


    <footer>
        <p></p>
    </footer>
    
</body>
</html>
