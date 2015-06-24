
<html>
<title>Pickups</title>

<body>
<center>
<?php
//Adding new clients from POST data
if($_POST['PickupDay']==NULL){
	echo "<h1>Please Enter Pickup Day</h1>";
	echo '<form name="Pickup" action="pickups.php" method="POST">
	PickupDay: <input type="text" name="PickupDay">
	<input type="submit" value="Get Pickups">
	</form>';
	die();
}
?>


<h1> Pickups for Day <?php echo $_POST["PickupDay"];?></h1>
<table border="1">
<tr>
<th>Sign In</th>
<th>First Name</th>
<th>Last Name</th>
<th>Size</th>
<th>Address</th>
<th>Telephone</th>
<th>Monthly Pickup Date</th>
</tr>

<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
$query="SELECT * FROM Client WHERE PickupDay=".$_POST["PickupDay"].";";
$result=$db->query($query);

while($row=mysqli_fetch_array($result)){
	$cidQuery="SELECT CID FROM Client WHERE FirstName='".$row["FirstName"]."' AND LastName='".$row["LastName"]."' AND Phone=".$row["Phone"].";";
	$cidResult=$db->query($cidQuery);
	$arr=mysqli_fetch_array($cidResult);
	$cid=$arr["CID"];

	$sizeQuery="SELECT (COUNT(*)+1) AS COUNT FROM Family_Member WHERE CID=".$cid.";";
	$sizeResult=$db->query($sizeQuery);
	$arr=mysqli_fetch_array($sizeResult);
	$size=$arr["COUNT"];
	echo '<form action="pickupConfirmation.php" method="POST">
		<input type="hidden" name="CID" value="'.$cid.'">
		<input type="hidden" name="Name" value="'.$row["FirstName"]." ".$row["LastName"].'">
		<tr>
		<td> <input type="Submit" value="Complete Pickup"></input></td>
		<td>'.$row["FirstName"].'</td>
		<td>'.$row["LastName"].'</td>
		<td>'.$size.'</td>
		<td>'.$row["Apt"]." ".$row["St"]." ".$row["City"]." ".$row["State"]." ".$row["Zip"].'</td>
		<td>'.$row["Phone"].'</td>
		<td>'.$row["PickupDay"].'</td>
		</tr>
		</form>';
}


?>

<br>

</table>

<br>
<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>
</center>
</body>
</html>