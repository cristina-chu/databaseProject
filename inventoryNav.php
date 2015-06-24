<?php
/**
* Displays buttons to navigate to various views 
* pertaining to the inventory
*/
?>

<html>
<title>Inventory Nav</title>

<body>
<br>
<center>
	<h1> What do you want to do?</h1>
<form action="bagList.php">
    <input type="submit" value="Bag List">
</form>

<form action="productList.php">
    <input type="submit" value="Product List">
</form>

<form action="addNewProduct.php">
    <input type="submit" value="Add New Product">
</form>

<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>

</center>
</body>
</html>