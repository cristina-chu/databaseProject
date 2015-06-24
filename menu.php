<?php
/**
* Displays buttons to navigate to various views
* Is the main home page everyone returns to
*/
?>

<html>
<title>Main Menu</title>

<body>
<br>
<center>
	<h1> Where would you like to go?</h1>
<form action="pickups.php">
    <input type="submit" value="Pickup">
</form>
<form action="inventoryNav.php">
    <input type="submit" value="Inventory">
</form>
<form action="dropoffs.php">
    <input type="submit" value="DropOffs">
</form>
<form action="reportNav.php">
    <input type="submit" value="Reports">
</form>
<form action="clientsNav.php">
    <input type="submit" value="Clients">
</form>
</center>
</body>
</html>