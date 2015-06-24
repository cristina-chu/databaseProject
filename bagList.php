<?php
/**
* Shows all the bags and lets user go into the contents of each bag by pressing a button
*/
?>

<html>
<title>Bag List</title>

<body>
<br>
<center>
	<h1>Bag List</h1>

<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

//Get values for the bag list table
$query = "SELECT Bag.Name, NumClients, Num_Items, BagCost FROM (Bag LEFT OUTER JOIN Num_Clients ON Bag.Name = Num_Clients.BagName LEFT OUTER JOIN Items_Bag ON Bag.Name=Items_Bag.BagName LEFT OUTER JOIN Bag_Cost ON Bag.Name=Bag_Cost.BagName);";
$result=$db->query($query);

//create the table
echo '<table border="1">
<tr>
    <td><b>Edit Bag</b></td>
    <td><b>Bag Name</b></td>
    <td><b># Clients</b></td>
    <td><b># Items</b></td>
    <td><b>Cost</b></td>
</tr>';

//make a for loop to create an html view of each row
$row = $result->fetch_array(MYSQLI_BOTH);

while ($row != NULL) {
    echo '<tr>
    <form action="editBag.php" method="POST">
    <td><input type="submit" Name="Submit" id="Submit" value="View/Edit"></td>
    <td><input type="text" name="BagName" readonly value="'.$row[0].'"></td>
    </form>
    <td>'.$row[1].'</td>
    <td>'.$row[2].'</td>
    <td>'.$row[3].'</td>
    </tr>';
    
    $row = $result->fetch_array(MYSQLI_BOTH);
}

//finish table
echo '</table>';

mysqli_close($db);
?>

<br>
<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>


</center>
</body>
</html>