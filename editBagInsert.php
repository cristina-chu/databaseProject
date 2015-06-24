<html>
<title>Bag Editied</title>

<h2>Note:Check for if last day of month commmented out for demo purposes otherwise nothing would get inserted into DB</h2>
<?php
//Last day of the month check
/*if(date('t') != date('d')){
    echo '<h1>Today is not the last day of the month<br>
    The bag cannot be edited.</h1>';
    die();
}*/

$bag=$_POST["BagName"];
$lastday = date('t',strtotime('today'));
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

$sizeQ="SELECT COUNT(*) FROM Holds WHERE BagName='".$bag."';";
$result = $db->query($sizeQ);
$arr=$result->fetch_array(MYSQLI_BOTH);
$currSize=$arr[0];

//Update on each run as we edit bag only at the end of the month we should be transferring quatities at the same time
$updateQuery="UPDATE Holds SET `LastMonthQty`=`CurrentMonthQty`;";
$result = $db->query($updateQuery);

for($i=0;$i<$currSize;$i++){

	if($_POST["edit".$i]=='on'){
		//Update current quantities
		$updateQuery="UPDATE Holds SET `CurrentMonthQty`='".$_POST["Quantity".$i]."' WHERE BagName='".$_POST["BagName"]."' AND ProductName='".$_POST["Product".$i]."'";
		$result = $db->query($updateQuery);
	}
}

for($i=0;$i<3;$i++){
	//Insert New products
	if($_POST["nedit".$i]=='on'){
		$insertQuery="INSERT INTO Holds (`CurrentMonthQty`,`BagName`,`ProductName`) VALUES ('".$_POST["nQuantity".$i]."','".$bag."','".$_POST["nProductName".$i]."');";
		$result = $db->query($insertQuery);
	}
}


$clearQuery="DELETE FROM Holds WHERE `CurrentMonthQty`=0;";
$result = $db->query($clearQuery);

mysqli_close($db);
?>

<body>

	<h1> Bag Edited Sucessfully</h1>

	<br>
	<form action="menu.php">
	    <input type="submit" value="Return to Main Menu">
	</form>

</body>

