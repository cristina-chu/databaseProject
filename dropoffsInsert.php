<?php

//Insert Date and Create new dropoff
$date=$_POST["Date"];
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
$query="INSERT INTO `Dropoff_Transactions` (`Date`) VALUES ('".$date."');";
$result=$db->query($query);


//Get ID of recently created Dropoff
$query="SELECT MAX(DID) FROM Dropoff_Transactions;";
$result=$db->query($query);
$row=$result->fetch_array(MYSQLI_BOTH);
$did=$row["MAX(DID)"];


//Insert Food items into dropoff Items
for($i=0;$i<8;$i++){

	if($_POST["Quantity".$i]>0){
		$query="SELECT * FROM Product WHERE Name='".$_POST["Product".$i]."';";
		
		$result=$db->query($query);
		$row=$result->fetch_array(MYSQLI_BOTH);
		$source=$row["SourceName"];
		$query="INSERT INTO Dropoff (`DID`,`ProductName`,`SourceName`,`Qty`) VALUES (".$did.",'".$_POST["Product".$i]."','".$source."',".$_POST["Quantity".$i].");";
		$result=$db->query($query);
	}
}
mysqli_close($db);
?>
<html>
<body>
	<center>
	<h1>The dropoff was successfully logged</h1>

	<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
	</form>
</center>
</body>
</html>