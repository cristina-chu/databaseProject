<?php
/**
* Shows a report of the grocery list
*/
?>

<html>
<title>Grocery List</title>

<body>
<br>
<center>
    <h1>Grocery List</h1>

<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

//create the table
echo '<table border="1">
<tr>
    <td><b>Product</b></td>
    <td><b>Current Month Quantity</b></td>
    <td><b>Last Month Quantity</b></td>
</tr>';

$query = "SELECT Final_Current.ProductName, Final_Current.Total, Final_Last.Total FROM (Final_Current LEFT OUTER JOIN Final_Last ON Final_Current.ProductName=Final_Last.ProductName);";
$result=$db->query($query);
$row = $result->fetch_array(MYSQLI_BOTH);

//rest of table
while ($row!=NULL){
	echo '<tr>
        <td>'.$row[0].'</td>
        <td>'.(int)$row[1].'</td>
        <td>'.(int)$row[2].'</td>
    </tr>';

    $row = $result->fetch_array(MYSQLI_BOTH);
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