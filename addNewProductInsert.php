<?php
/**
* Inserts new product to database
*/
?>

<html>
<title>Product Added</title>

<body>
<center>
<h1>Product added successfully!</h1>
<br>

<?php 

//Get variables from request
$name=$_POST["ProductName"];
$cost=$_POST["Cost"];
$source=$_POST["Source"];

$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
$query="INSERT INTO Product (Name, Cost, SourceName) VALUES ('".$name."', '".$cost."', '".$source."');";
$result=$db->query($query);
mysqli_close($db);
?>

<br>

<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>

</center>
</body>
</html>