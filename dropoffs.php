
<html>
<title>Add Dropoffs</title>

<body>

<center>
<h1> Enter Dropoffs</h1>
<table border="1">
<tr>
<th>Product-Source</th>
<th>Quantity</th>
</tr>
<form action="dropoffsInsert.php" method="POST">
<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
$query="SELECT * FROM Product ;";
$result=$db->query($query);
$prod="<option></option>";
while($row=mysqli_fetch_array($result)){
	$prod.='<option value="'.$row["Name"].'"">'.$row["Name"].'-'.$row["SourceName"].'</option>';
}
mysqli_close($db);
echo 'Date:<input type="text" Name="Date" id="Date" value='.date('Y-m-d').' readonly>';
for($i=0;$i<8;$i++){

echo '<tr>
	<td><select name="Product'.$i.'" id="Product'.$i.'">
			'.$prod.'
			</select><br></td>
	<td><input type="text" Name="Quantity'.$i.'" id="Quantity'.$i.'" value=0></td>
	</tr>';


}
echo '<input type="submit" Name="Submit" id="Submit" value="Complete DropOff">';

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