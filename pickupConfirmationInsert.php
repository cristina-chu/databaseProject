<?php

$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
$query="INSERT INTO `Pickup_Transaction` (`Date`) VALUES (CURDATE());";
$result=$db->query($query);

$query="SELECT MAX(PID) AS PID FROM `Pickup_Transaction`";
$result=$db->query($query);
$arr=$result->fetch_array(MYSQLI_BOTH);
$pid=$arr["PID"];

$query="INSERT INTO `Pickup` (`PID`, `CID`, `BagName`) VALUES (".$pid.",".$_POST["CID"].",'".$_POST["BagName"]."');";
$result=$db->query($query);
mysqli_close($db);

?>
<html>
<title>Pickup Complete</title>

<body>
	<center>
		<h1>Pickup Has been completed</h1>
		<br>
		<form action="menu.php">
		    <input type="submit" value="Return to Main Menu">
		</form>
	</center>
</body>
</html>