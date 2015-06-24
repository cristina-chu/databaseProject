<?php
/**
* Shows all the products in the database
*/
?>

<html>
<title>Product List</title>

<body>
<br>
<center>
	<h1> Product List</h1>

<?php
//need to take care of 3 cases
    //when comes to page first time
    //when a product name is given 
    //when no product name is given
?>

<form action="productList.php" method="POST">
    Name:<input type="text" Name="ProductName" id="ProductName"><br>
    <br>

    <input type="submit" Name="Submit" id="Submit" value="Submit"><br>
</form>

<form action="productList.php" method="POST">
    <input type="submit" Name="List All Products" id="ListAll" value="ListAll"><br>
</form>

<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

$name = $_POST["ProductName"];  //get product name

if ($name == NULL) {    //list all products
    //$query = "SELECT * FROM Product;";
    $query = "SELECT * FROM Final_Count_Products;";
}
else if ($name != NULL) {  //product name is given
    //$query = "SELECT * FROM Product WHERE Name='".$name."';";
    $query = "SELECT * FROM Final_Count_Products WHERE ProductName='".$name."';";
}
else {  //first time going into this page
    //$query = "SELECT * FROM Product;";
    $query = "SELECT * FROM Final_Count_Products;";
}

$result=$db->query($query);

//create the table
echo '<table border="1">
<tr>
    <td><b>Name</b></td>
    <td><b>Quantity</b></td>
    <td><b>Cost</b></td>
</tr>';

//make a for loop to create an html view of each row
$row = $result->fetch_array(MYSQLI_BOTH);
while ($row != NULL) {
    echo '<tr>
    <td>'.$row[0].'</td>
    <td>'.$row[1].'</td>
    <td>'.$row[2].'</td>
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