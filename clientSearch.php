<?php
/**
* Shows all the products in the database
*/
?>

<html>
<title>Client Search</title>

<body>
<br>
<center>
	<h1>Client Search</h1>

<?php
//need to take care of 3 cases
    //when comes to page first time
    //when client phone no is given 
    //when client lastname is given
?>

<form action="clientSearch.php" method="POST">
    LastName:<input type="text" Name="LastName" id="LastName"><br>
    <br>

    <input type="submit" Name="Submit" id="Submit" value="Search By last name"><br>
</form>

<form action="clientSearch.php" method="POST">
    Phone:<input type="text" Name="Phone" id="Phone"><br>
    <br>

    <input type="submit" Name="Submit" id="Submit" value="Search By Phone No"><br>
</form>

<form action="clientSearch.php" method="POST">
    <input type="submit" Name="List All Clients" id="ListAll" value="ListAll"><br>
</form>

<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

$name = $_POST["LastName"];  //get product name
$phone= $_POST["Phone"];

if ($name == NULL && $phone == NULL) {    //list all products
    $query = "SELECT * FROM Client;";
}
else if ($name != NULL) {  //product name is given
    $query = "SELECT * FROM Client WHERE LastName='".$name."';";
}
else if($phone != NULL){  //first time going into this page
    $query = "SELECT * FROM Client WHERE Phone='".$phone."';";
}

$result=$db->query($query);

//create the table
echo '<table border="1">
<tr>
    <td><b>FirstName</b></td>
    <td><b>LastName</b></td>
    <td><b>Address</b></td>
    <td><b>Size of Family</b></td>
    <td><b>Phone</b></td>
    <td><b>Start Date</b></td>
</tr>';

//Displaying rows
$row = $result->fetch_array(MYSQLI_BOTH);
while ($row != NULL) {
    $db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
    $query="SELECT (COUNT(*)+1) FROM Family_Member WHERE CID=".$row["CID"].";";
    $sres=$db->query($query);
    $sizerow = $sres->fetch_array(MYSQLI_BOTH);
    $size=$sizerow[0];
    echo '<tr>
    <td>'.$row["FirstName"].'</td>
    <td>'.$row["LastName"].'</td>
    <td>'.$row["Apt"]." ".$row["St"]." ".$row["City"]." ".$row["State"]." ".$row["Zip"].'</td>
    <td>'.$size.'</td>
    <td>'.$row["Phone"].'</td>
    <td>'.$row["Start"].'</td>
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