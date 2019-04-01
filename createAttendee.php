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
            <h1>Attendees</h1>
            <?php

			$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
            //echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th></tr>";
            
            $newFname = $_POST["fname"];
            $newLname = $_POST["lname"];
            $newType = $_POST["type"];
            $newCompany = $_POST["company"];
            $newDonation = $_POST["donation"];
            $needsRoom = $_POST["needsRoom"];
            $newEmailsSent = 0;
            $er = 0;
            if($newType != "student" && $newType != "Student" && $newType != "professional" && $newType != "Professional" && $newType != "sponsor" && $newType != "Sponsor"){
                $er = 1;
            }

            $sql1 = "select max(ID) from attendees";
            $stmt1 = $pdo->query($sql1);
            $newID = $stmt1->fetch()[0];
            $newID = $newID + 1;
            $sql2 = "select min(occupancy) from room";
            $stmt2 = $pdo->query($sql2);
            $minOccupancy = $stmt2->fetch()[0];
            if($minOccupancy == 3){
                $sql3 = "select max(roomID) from room";
                $stmt3 = $pdo->query($sql3);
                $newRoomID = $stmt3->fetch()[0];
                $newRoomID = $newRoomID+1;
                $newRoomOccupancy = 1;
            }
            else{
                $sql4 = "select min(roomID) from room where occupancy=$minOccupancy";
                $stmt4 = $pdo->query($sql4);
                $newRoomID = $stmt4->fetch()[0];
                $newRoomOccupancy = $minOccupancy + 1;
            }

            try {
                if ($er == 1){
                  throw new \Exception("Invalid Attendee Type",1);
                }
              }catch(Exception $er)
              {
                echo 'Please check the spelling of Professional, Student, or Sponsor';
                exit();
              }
            
              if ($newType == "Student" || $newType == "student"){
                $addStmt = "INSERT INTO attendees VALUES(?,?,?)";
                $stmt = $pdo->prepare($addStmt);
                $stmt->execute([$newID,$newFname,$newLname]);
                if($needsRoom == "roomYes"){
                    if($newRoomOccupancy == 1){
                    $addRoomStmt = "INSERT INTO room VALUES(?,?)";
                    $stmt = $pdo->prepare($addRoomStmt);
                    $stmt->execute([$newRoomID,$newRoomOccupancy]);
                    }else{
                    $updateRoomStmt = "UPDATE room SET occupancy = ? WHERE roomID=?";
                    $stmt = $pdo->prepare($updateRoomStmt);
                    $stmt->execute([$newRoomOccupancy,$newRoomID]);
                    }
                }
                $addStudentStmt = "INSERT INTO student VALUES(?,?)";
                $stmt = $pdo->prepare($addStudentStmt);
                $stmt->execute([$newID,$newRoomID]);
              }
              elseif ($newType == "Professional" || $newType == "professional"){
                $addStmt = "INSERT INTO attendees VALUES(?,?,?)";
                $stmt = $pdo->prepare($addStmt);
                $stmt->execute([$newID,$newFname,$newLname]);
                $addProfessionalStmt = "INSERT INTO professional VALUES(?)";
                $stmt = $pdo->prepare($addProfessionalStmt);
                $stmt->execute([$newID]);
              }
              elseif ($newType == "Sponsor" || $newType == "sponsor"){
                $addStmt = "INSERT INTO attendees VALUES(?,?,?)";
                $stmt = $pdo->prepare($addStmt);
                $stmt->execute([$newID,$newFname,$newLname]);
                if (empty($newCompany) == 0){
                    $addCompanyStmt = "INSERT INTO company VALUES(?,?,?)";
                    $stmt = $pdo->prepare($addCompanyStmt);
                    $stmt->execute([$newCompany,$newDonation,$newEmailsSent]);
                    $addSponsorStmt = "INSERT INTO sponsor VALUES(?,?)";
                    $stmt = $pdo->prepare($addSponsorStmt);
                    $stmt->execute([$newID,$newCompany]);
                }
              }
            /*echo $newType;
            echo $newCompany;
            echo $newID;
            echo $newRoomID;
            $addStudentStmt = "INSERT INTO student VALUES(?,?)";
            $stmt = $pdo->prepare($addStudentStmt);
            $stmt->execute([$newID,$newRoomID]);*/
			?>
			<h2>Students</h2>
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
            
            <h2>Professionals</h2>
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

            <h2>Sponsors</h2>
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