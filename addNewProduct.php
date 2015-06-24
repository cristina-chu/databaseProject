<?php
/**
* Lets you add a new product
*/
?>

<html>
<title>New Product </title>

<body>
<br>
<center>
	<h1> Please Enter New Product Data</h1>

<form action="addNewProductInsert.php" method="POST">
    Name:<input type="text" Name="ProductName" id="ProductName"><br>
    Cost Per Unit:<input type="text" Name="Cost" id="Cost"><br>
    Source:<select name="Source" id="Source">
            <?php
                $db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
                $query="SELECT Name FROM Source;";
                $result=$db->query($query);
                while($row=mysqli_fetch_array($result)){
                    echo "<option value=".$row['Name'].">".$row['Name']."</option>";
                }
                mysqli_close($db);
            ?>
    </select>
    <br><br>

    <input type="submit" Name="Submit" id="Submit" value="Submit"><br>


</form>
<br>
<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>


</center>
</body>
</html>