
<html>
<title>Add New Family Members</title>

<body>

<?php
//Adding new clients from POST data
if($_POST['FirstName']!=NULL && $_POST['FirstName']!=''){
	$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

	$query="INSERT INTO `Client`
	(`FirstName`, `LastName`, `Gender`, `DoB`, `Phone`, `State`, `City`, `St`, `Zip`, `Apt`, `Start`, `BagName`, `PickupDay`)
	VALUES
	('".$_POST['FirstName']."',
		'".$_POST['LastName']."',
		'".$_POST['Gender']."',
		'".$_POST['DateOfBirth']."',
		'".$_POST['Phone']."',
		'".$_POST['State']."',
		'".$_POST['City']."',
		'".$_POST['Street']."',
		'".$_POST['Zip']."',
		'".$_POST['Apartment']."',
		'".date("Y/m/d")."',
		'".$_POST['BagName']."',
		'".$_POST['PickupDay']."');";

	$result=$db->query($query);
	$row=mysqli_fetch_array($result);
	mysqli_close($db);
}
?>

<center>
<h1> Enter Family Member Details</h1>
<table border="1">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Gender</th>
<th>Date of Birth</th>
</tr>
<form action="addFamilyMembersInsert.php" method="POST">
<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
$query="SELECT CID FROM Client WHERE FirstName='".$_POST["FirstName"]."' AND LastName='".$_POST["LastName"]."' AND Phone=".$_POST["Phone"].";";
$result=$db->query($query);
$row=mysqli_fetch_array($result);

$cid=$row["CID"];
$query="INSERT INTO `Has_Aid` (`CID`,`Financial_name`) VALUES (".$cid.",'".$_POST["FinancialAid"]."');";
$result=$db->query($query);
mysqli_close($db);
echo 'CID:<input type="text" Name="CID" id="CID" value='.$cid.' readonly>';
for($i=0;$i<8;$i++){

echo '<tr>
	<td><input type="text" Name="FirstName'.$i.'" id="FirstName'.$i.'"></td>
	<td><input type="text" Name="LastName'.$i.'" id="LastName'.$i.'"></td>
	<td><select name="Gender'.$i.'" id="Gender'.$i.'">
			<option value="M">Male</option>
			<option value="F">Female</option>
			</select><br></td>
	<td><input type="text" Name="DateOfBirth'.$i.'" id="DateOfBirth'.$i.'"></td>
	</tr>';


}
echo '<input type="submit" Name="Submit" id="Submit" value="Submit">';

?>

<br>
</form>



</table>
<br>
<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>
</center>
</body>
</html>