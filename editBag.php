<?php
/**
* Lets user view/edit the contents of a bag
*/
?>

<html>
<title>View/Edit Bag</title>
<body>
<center>
<h1>View/Edit Bag</h1>
<br>
<form method="post" action="editBagInsert.php">
<?php

//Get variable from request
$bag = $_POST["BagName"];
echo '<input type="text" name="BagName" value="'.$bag.'" readonly>';
//Display bag that is being changed
echo '<h2>To edit a product Select check box in column 1,<br>
then change quantity</h2><br>';

//create the table
echo '<table border="1">
<tr>
    <td><b><Edit Product</b></td>
    <td><b>Current Product Name</b></td>
    <td><b>Quantity</b></td>
</tr>';

$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");



//Get all the products that are currently on the bag
$query = "SELECT ProductName, CurrentMonthQty FROM Holds WHERE (BagName='".$bag."');";
$result = $db->query($query);
//make a for loop to create an html view of each row
$row = $result->fetch_array(MYSQLI_BOTH);
$i=0;
while ($row != NULL) {
   
    $products = "SELECT Name FROM Product;";
    $pResult = $db->query($products);
    $pRow = $pResult->fetch_array(MYSQLI_BOTH);
     echo '<tr>
    <td><input type="checkbox" name="edit'.$i.'"></td>
    
    <td><input type="text" name="Product'.$i.'" value="'.$row[0].'"readonly></input></td>
    <td><input type="text" name="Quantity'.$i.'" value="'.$row[1].'"></input></td>
    </tr>';
    
    $row = $result->fetch_array(MYSQLI_BOTH);
    $i++;
}

//Getting all the products available on database

mysqli_close($db);
echo '<input type="submit" value="Edit Bag">';
//finish table
echo '</table>';

echo '<h2> Insert New Product </h2>';

echo '<table border="1">
<tr>
    <td><b><Edit Product</b></td>
    <td><b>Current Product Name</b></td>
    <td><b>Quantity</b></td>
</tr>';

$dropdown="";
while ($pRow != NULL) {
            $dropdown.='<option value="'.$pRow[0].'">'.$pRow[0].'</option>';
            $pRow = $pResult->fetch_array(MYSQLI_BOTH);
}

$k=0;
while($k<3){
echo '<tr>
    <td><input type="checkbox" name="nedit'.$k.'"></td>';
    
    echo '<td><select name="nProductName'.$k.'" id="ProductName'.$k.'">';

    echo $dropdown;

    echo '</select><br></td>';
    echo '<td><input type="text" name="nQuantity'.$k.'" value="'.$row[1].'"></input></td>
    </tr>';
$k++;
}

echo '</table>';
?>
</form>

<br>
<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>
</center>
</body>
</html>