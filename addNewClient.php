<?php
/**
* Lets you add a new client
*/
?>

<html>
<title>New Client </title>

<body>
<br>
<center>
	<h1> Please Enter New Client Data</h1>
<form action="addFamilyMembers.php" method="POST">
    First Name:<input type="text" Name="FirstName" id="FirstName"><br>
    Last Name:<input type="text" Name="LastName" id="LastName"><br>
    Gender:<select name="Gender" id="Gender">
			<option value="M">Male</option>
			<option value="F">Female</option>
			</select><br>

    Phone:<input type="text" Name="Phone" id="Phone"><br>
    Apartment:<input type="text" Name="Apartment" id="Apartment"><br>
    Street:<input type="text" Name="Street" id="Street"><br>
    City:<input type="text" Name="City" id="City"><br>
    State:<input type="text" Name="State" id="State"><br>
    Zip:<input type="text" Name="Zip" id="Zip"><br>
    
    Pickup Day:<select name="PickupDay">
			<?php
			foreach(range(1,31) as $i){
				echo "<option value=".$i.">".$i."</option>";
			}
			?>
	</select><br>
   
   <?php //TODO DATE OF BIRTH DATE PICKER?>
    Date Of Birth:<input type="text" Name="DateOfBirth" id="DateOfBirth"><br>
    Bag Name:<select name="BagName" id="BagName">
            <?php
                $db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
                $query="SELECT Name FROM Bag;";
                $result=$db->query($query);
                while($row=mysqli_fetch_array($result)){
                    echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
                }
                mysqli_close($db);
            ?>
    </select>
    <br>
     Financial Aid:<select name="FinancialAid" id="FinancialAid">
            <?php
                $db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");
                $query="SELECT Name FROM Financial_Aid;";
                $result=$db->query($query);
                while($row=mysqli_fetch_array($result)){
                    echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
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