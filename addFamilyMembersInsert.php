<?php
/**
* Inserts new family members to database
*/
?>

<html>
<title>Family Members Added</title>

<body>
<center>
<h1>Family Members Added successfully!</h1>
<br>

<?php 

//Get variables from request
$cid=$_POST["CID"];

$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
for($i=0;$i<8;$i++){
	if($_POST["FirstName".$i]!=NULL){
		$insert="(".$cid.",'".$_POST["FirstName".$i]."','".$_POST["LastName".$i]."','".$_POST["DateOfBirth".$i]."','".$_POST["Gender".$i]."');";
		$query="INSERT INTO `Family_Member` (`CID`, `FirstName`, `LastName`, `DoB`, `Gender`) VALUES ".$insert;
		$result=$db->query($query);
	}

}
mysqli_close($db);
?>

<br>

<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>

</center>
</body>
</html>