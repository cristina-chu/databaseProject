

<html>
<title>Complete Pickup</title>

<body>
<center>

<br>
<form action="pickupConfirmationInsert.php" method="POST">
<?php 

echo '<table border="1">
<tr>
    <td><b>Product Name</b></td>
    <td><b>Quantity</b></td>
</tr>';
//Get variables from request
$cid=$_POST["CID"];
$name=$_POST["Name"];

echo 'Client<br>';
echo $name.'<br>';
echo 'Date<br>';
echo date('Y-m-d').'<br>';
echo '<br>';

$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
$bagQuery = "SELECT BagName FROM Client WHERE CID=".$cid.";";
$result = $db->query($bagQuery);
$arr = $result->fetch_array(MYSQLI_BOTH);
$bag=$arr["BagName"];



$query = "SELECT ProductName, CurrentMonthQty FROM Holds WHERE (BagName='".$bag."');";
$result = $db->query($query);

$row = $result->fetch_array(MYSQLI_BOTH);
$i=0;
while ($row != NULL) {
   
    $products = "SELECT Name FROM Product;";
    $pResult = $db->query($products);
    $pRow = $pResult->fetch_array(MYSQLI_BOTH);
     echo '<tr>
    <td><input type="text" name="Product'.$i.'" value="'.$row[0].'" readonly></input></td>
    <td><input type="text" name="Quantity'.$i.'" value="'.$row[1].'" readonly></input></td>
    </tr>';
    $row = $result->fetch_array(MYSQLI_BOTH);
    $i++;
}
echo '<input type="hidden" name="CID" value="'.$cid.'"></input>';
echo '<input type="hidden" name="BagName" value="'.$bag.'"></input>';
echo '<input type="submit" value="Complete Pickup"></input>';
mysqli_close($db);
?>

</form>
<br>

<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>

</center>
</body>
</html>