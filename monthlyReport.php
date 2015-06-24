<?php
/**
* Shows a report of the food pantry database
*/
?>

<html>
<title>Monthly Service Report Summary</title>

<body>
<br>
<center>
    <h1>Monthly Service Report Summary</h1>

<form action="monthlyReport.php" method="POST">
    <input type="submit" Name="Submit" id="Submit" value="Current Month">
</form>

<form action="monthlyReport.php" method="POST">
    <input type="submit" Name="Submit" id="Submit" value="Last Month">
</form>


<?php
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

$month = $_POST["Submit"];
$currentMonth = date('F');

if ($month == "Last Month") { //show last month
    echo '<h2><b>'.Date('F', strtotime($currentMonth . " last month")).'</b></h1>';

    /*NOTE:
        people will get their first bag the day they sign up(Start date) and after the first month,
        they will start getting their bag on their specific pickup day
    */

    $week1 = "SELECT
        (SELECT COUNT(CID) FROM Week1_Last) as week1_households,
        (SELECT Under_Age_Client_Last.week1+Sum_Under_Age_Last.sumUnderWeek1 FROM Under_Age_Client_Last,Sum_Under_Age_Last) as under,
        (SELECT Mid_Age_Client_Last.week1+Sum_Mid_Age_Last.sumMidWeek1 FROM Mid_Age_Client_Last,Sum_Mid_Age_Last) as mid,
        (SELECT Older_Age_Client_Last.week1+Sum_Older_Age_Last.sumOlderWeek1 FROM Older_Age_Client_Last,Sum_Older_Age_Last) as older,
        (SELECT Under_Age_Client_Last.week1+Sum_Under_Age_Last.sumUnderWeek1+Mid_Age_Client_Last.week1+Sum_Mid_Age_Last.sumMidWeek1+Older_Age_Client_Last.week1+Sum_Older_Age_Last.sumOlderWeek1 FROM Under_Age_Client_Last,Sum_Under_Age_Last,Mid_Age_Client_Last,Sum_Mid_Age_Last,Older_Age_Client_Last,Sum_Older_Age_Last) as people,
        (SELECT SUM(Week1_Last_Bags.TotalBags*Bag_Cost.BagCost) FROM Week1_Last_Bags, Bag_Cost WHERE Week1_Last_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week2 = "SELECT
        (SELECT COUNT(CID) FROM Week2_Last) as week2_households,
        (SELECT Under_Age_Client_Last.week2+Sum_Under_Age_Last.sumUnderWeek2 FROM Under_Age_Client_Last,Sum_Under_Age_Last) as under,
        (SELECT Mid_Age_Client_Last.week2+Sum_Mid_Age_Last.sumMidWeek2 FROM Mid_Age_Client_Last,Sum_Mid_Age_Last) as mid,
        (SELECT Older_Age_Client_Last.week2+Sum_Older_Age_Last.sumOlderWeek2 FROM Older_Age_Client_Last,Sum_Older_Age_Last) as older,
        (SELECT Under_Age_Client_Last.week2+Sum_Under_Age_Last.sumUnderWeek2+Mid_Age_Client_Last.week2+Sum_Mid_Age_Last.sumMidWeek2+Older_Age_Client_Last.week2+Sum_Older_Age_Last.sumOlderWeek2 FROM Under_Age_Client_Last,Sum_Under_Age_Last,Mid_Age_Client_Last,Sum_Mid_Age_Last,Older_Age_Client_Last,Sum_Older_Age_Last) as people,
        (SELECT SUM(Week2_Last_Bags.TotalBags*Bag_Cost.BagCost) FROM Week2_Last_Bags, Bag_Cost WHERE Week2_Last_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week3 = "SELECT
        (SELECT COUNT(CID) FROM Week3_Last) as week3_households,
        (SELECT Under_Age_Client_Last.week3+Sum_Under_Age_Last.sumUnderWeek3 FROM Under_Age_Client_Last,Sum_Under_Age_Last) as under,
        (SELECT Mid_Age_Client_Last.week3+Sum_Mid_Age_Last.sumMidWeek3 FROM Mid_Age_Client_Last,Sum_Mid_Age_Last) as mid,
        (SELECT Older_Age_Client_Last.week3+Sum_Older_Age_Last.sumOlderWeek3 FROM Older_Age_Client_Last,Sum_Older_Age_Last) as older,
        (SELECT Under_Age_Client_Last.week3+Sum_Under_Age_Last.sumUnderWeek3+Mid_Age_Client_Last.week3+Sum_Mid_Age_Last.sumMidWeek3+Older_Age_Client_Last.week3+Sum_Older_Age_Last.sumOlderWeek3 FROM Under_Age_Client_Last,Sum_Under_Age_Last,Mid_Age_Client_Last,Sum_Mid_Age_Last,Older_Age_Client_Last,Sum_Older_Age_Last) as people,
        (SELECT SUM(Week3_Last_Bags.TotalBags*Bag_Cost.BagCost) FROM Week3_Last_Bags, Bag_Cost WHERE Week3_Last_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week4 = "SELECT
        (SELECT COUNT(CID) FROM Week4_Last) as week4_households,
        (SELECT Under_Age_Client_Last.week4+Sum_Under_Age_Last.sumUnderWeek4 FROM Under_Age_Client_Last,Sum_Under_Age_Last) as under,
        (SELECT Mid_Age_Client_Last.week4+Sum_Mid_Age_Last.sumMidWeek4 FROM Mid_Age_Client_Last,Sum_Mid_Age_Last) as mid,
        (SELECT Older_Age_Client_Last.week4+Sum_Older_Age_Last.sumOlderWeek4 FROM Older_Age_Client_Last,Sum_Older_Age_Last) as older,
        (SELECT Under_Age_Client_Last.week4+Sum_Under_Age_Last.sumUnderWeek4+Mid_Age_Client_Last.week4+Sum_Mid_Age_Last.sumMidWeek4+Older_Age_Client_Last.week4+Sum_Older_Age_Last.sumOlderWeek4 FROM Under_Age_Client_Last,Sum_Under_Age_Last,Mid_Age_Client_Last,Sum_Mid_Age_Last,Older_Age_Client_Last,Sum_Older_Age_Last) as people,
        (SELECT SUM(Week4_Last_Bags.TotalBags*Bag_Cost.BagCost) FROM Week4_Last_Bags, Bag_Cost WHERE Week4_Last_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week5 = "SELECT
        (SELECT COUNT(CID) FROM Week5_Last) as week5_households,
        (SELECT Under_Age_Client_Last.week5+Sum_Under_Age_Last.sumUnderWeek5 FROM Under_Age_Client_Last,Sum_Under_Age_Last) as under,
        (SELECT Mid_Age_Client_Last.week5+Sum_Mid_Age_Last.sumMidWeek5 FROM Mid_Age_Client_Last,Sum_Mid_Age_Last) as mid,
        (SELECT Older_Age_Client_Last.week5+Sum_Older_Age_Last.sumOlderWeek5 FROM Older_Age_Client_Last,Sum_Older_Age_Last) as older,
        (SELECT Under_Age_Client_Last.week5+Sum_Under_Age_Last.sumUnderWeek5+Mid_Age_Client_Last.week5+Sum_Mid_Age_Last.sumMidWeek5+Older_Age_Client_Last.week5+Sum_Older_Age_Last.sumOlderWeek5 FROM Under_Age_Client_Last,Sum_Under_Age_Last,Mid_Age_Client_Last,Sum_Mid_Age_Last,Older_Age_Client_Last,Sum_Older_Age_Last) as people,
        (SELECT SUM(Week5_Last_Bags.TotalBags*Bag_Cost.BagCost) FROM Week5_Last_Bags, Bag_Cost WHERE Week5_Last_Bags.BagName=Bag_Cost.BagName) as cost;";
}

else { //default is current month 
    echo '<h2><b>'.$currentMonth.'</b></h1>';

    $week1 = "SELECT
        (SELECT COUNT(CID) FROM Week1) as week1_households,
        (SELECT Under_Age_Client.week1+Sum_Under_Age.sumUnderWeek1 FROM Under_Age_Client,Sum_Under_Age) as under,
        (SELECT Mid_Age_Client.week1+Sum_Mid_Age.sumMidWeek1 FROM Mid_Age_Client,Sum_Mid_Age) as mid,
        (SELECT Older_Age_Client.week1+Sum_Older_Age.sumOlderWeek1 FROM Older_Age_Client,Sum_Older_Age) as older,
        (SELECT Under_Age_Client.week1+Sum_Under_Age.sumUnderWeek1+Mid_Age_Client.week1+Sum_Mid_Age.sumMidWeek1+Older_Age_Client.week1+Sum_Older_Age.sumOlderWeek1 FROM Under_Age_Client,Sum_Under_Age,Mid_Age_Client,Sum_Mid_Age,Older_Age_Client,Sum_Older_Age) as people,
        (SELECT SUM(Week1_Bags.TotalBags*Bag_Cost.BagCost) FROM Week1_Bags, Bag_Cost WHERE Week1_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week2 = "SELECT
        (SELECT COUNT(CID) FROM Week2) as week2_households,
        (SELECT Under_Age_Client.week2+Sum_Under_Age.sumUnderWeek2 FROM Under_Age_Client,Sum_Under_Age) as under,
        (SELECT Mid_Age_Client.week2+Sum_Mid_Age.sumMidWeek2 FROM Mid_Age_Client,Sum_Mid_Age) as mid,
        (SELECT Older_Age_Client.week2+Sum_Older_Age.sumOlderWeek2 FROM Older_Age_Client,Sum_Older_Age) as older,
        (SELECT Under_Age_Client.week2+Sum_Under_Age.sumUnderWeek2+Mid_Age_Client.week2+Sum_Mid_Age.sumMidWeek2+Older_Age_Client.week2+Sum_Older_Age.sumOlderWeek2 FROM Under_Age_Client,Sum_Under_Age,Mid_Age_Client,Sum_Mid_Age,Older_Age_Client,Sum_Older_Age) as people,
        (SELECT SUM(Week2_Bags.TotalBags*Bag_Cost.BagCost) FROM Week2_Bags, Bag_Cost WHERE Week2_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week3 = "SELECT
        (SELECT COUNT(CID) FROM Week3) as week3_households,
        (SELECT Under_Age_Client.week3+Sum_Under_Age.sumUnderWeek3 FROM Under_Age_Client,Sum_Under_Age) as under,
        (SELECT Mid_Age_Client.week3+Sum_Mid_Age.sumMidWeek3 FROM Mid_Age_Client,Sum_Mid_Age) as mid,
        (SELECT Older_Age_Client.week3+Sum_Older_Age.sumOlderWeek3 FROM Older_Age_Client,Sum_Older_Age) as older,
        (SELECT Under_Age_Client.week3+Sum_Under_Age.sumUnderWeek3+Mid_Age_Client.week3+Sum_Mid_Age.sumMidWeek3+Older_Age_Client.week3+Sum_Older_Age.sumOlderWeek3 FROM Under_Age_Client,Sum_Under_Age,Mid_Age_Client,Sum_Mid_Age,Older_Age_Client,Sum_Older_Age) as people,
        (SELECT SUM(Week3_Bags.TotalBags*Bag_Cost.BagCost) FROM Week3_Bags, Bag_Cost WHERE Week3_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week4 = "SELECT
        (SELECT COUNT(CID) FROM Week4) as week4_households,
        (SELECT Under_Age_Client.week4+Sum_Under_Age.sumUnderWeek4 FROM Under_Age_Client,Sum_Under_Age) as under,
        (SELECT Mid_Age_Client.week4+Sum_Mid_Age.sumMidWeek4 FROM Mid_Age_Client,Sum_Mid_Age) as mid,
        (SELECT Older_Age_Client.week4+Sum_Older_Age.sumOlderWeek4 FROM Older_Age_Client,Sum_Older_Age) as older,
        (SELECT Under_Age_Client.week4+Sum_Under_Age.sumUnderWeek4+Mid_Age_Client.week4+Sum_Mid_Age.sumMidWeek4+Older_Age_Client.week4+Sum_Older_Age.sumOlderWeek4 FROM Under_Age_Client,Sum_Under_Age,Mid_Age_Client,Sum_Mid_Age,Older_Age_Client,Sum_Older_Age) as people,
        (SELECT SUM(Week4_Bags.TotalBags*Bag_Cost.BagCost) FROM Week4_Bags, Bag_Cost WHERE Week4_Bags.BagName=Bag_Cost.BagName) as cost;";

    $week5 = "SELECT
        (SELECT COUNT(CID) FROM Week5) as week5_households,
        (SELECT Under_Age_Client.week5+Sum_Under_Age.sumUnderWeek5 FROM Under_Age_Client,Sum_Under_Age) as under,
        (SELECT Mid_Age_Client.week5+Sum_Mid_Age.sumMidWeek5 FROM Mid_Age_Client,Sum_Mid_Age) as mid,
        (SELECT Older_Age_Client.week5+Sum_Older_Age.sumOlderWeek5 FROM Older_Age_Client,Sum_Older_Age) as older,
        (SELECT Under_Age_Client.week5+Sum_Under_Age.sumUnderWeek5+Mid_Age_Client.week5+Sum_Mid_Age.sumMidWeek5+Older_Age_Client.week5+Sum_Older_Age.sumOlderWeek5 FROM Under_Age_Client,Sum_Under_Age,Mid_Age_Client,Sum_Mid_Age,Older_Age_Client,Sum_Older_Age) as people,
        (SELECT SUM(Week5_Bags.TotalBags*Bag_Cost.BagCost) FROM Week5_Bags, Bag_Cost WHERE Week5_Bags.BagName=Bag_Cost.BagName) as cost;";
}

$result1=$db->query($week1);
$result2=$db->query($week2);
$result3=$db->query($week3);
$result4=$db->query($week4);
$result5=$db->query($week5);

$row1 = $result1->fetch_array(MYSQLI_BOTH);
$row2 = $result2->fetch_array(MYSQLI_BOTH);
$row3 = $result3->fetch_array(MYSQLI_BOTH);
$row4 = $result4->fetch_array(MYSQLI_BOTH);
$row5 = $result5->fetch_array(MYSQLI_BOTH);

//create the table
echo '<table border="1">
<tr>
    <td><b>Week</b></td>
    <td><b># of Households</b></td>
    <td><b>Under 18 years</b></td>
    <td><b>18-64 years</b></td>
    <td><b>65 years and Older</b></td>
    <td><b>Total People</b></td>
    <td><b>Food Cost ($)</b></td>
</tr>';

//rest of table
echo '<tr>
        <td>1</td>
        <td>'.$row1[0].'</td>
        <td>'.$row1[1].'</td>
        <td>'.$row1[2].'</td>
        <td>'.$row1[3].'</td>
        <td>'.$row1[4].'</td>
        <td>'.$row1[5].'</td>
    </tr>
    <tr>
        <td>2</td>
        <td>'.$row2[0].'</td>
        <td>'.$row2[1].'</td>
        <td>'.$row2[2].'</td>
        <td>'.$row2[3].'</td>
        <td>'.$row2[4].'</td>
        <td>'.$row2[5].'</td>
    </tr>
    <tr>
        <td>3</td>
        <td>'.$row3[0].'</td>
        <td>'.$row3[1].'</td>
        <td>'.$row3[2].'</td>
        <td>'.$row3[3].'</td>
        <td>'.$row3[4].'</td>
        <td>'.$row3[5].'</td>
    </tr>
    <tr>
        <td>4</td>
        <td>'.$row4[0].'</td>
        <td>'.$row4[1].'</td>
        <td>'.$row4[2].'</td>
        <td>'.$row4[3].'</td>
        <td>'.$row4[4].'</td>
        <td>'.$row4[5].'</td>
    </tr>
    <tr>
        <td>5</td>
        <td>'.$row5[0].'</td>
        <td>'.$row5[1].'</td>
        <td>'.$row5[2].'</td>
        <td>'.$row5[3].'</td>
        <td>'.$row5[4].'</td>
        <td>'.$row5[5].'</td>
    </tr>';

//TOTALS
$totalhouseholds = $row1[0]+$row2[0]+$row3[0]+$row4[0]+$row5[0];
$totalunder = $row1[1]+$row2[1]+$row3[1]+$row4[1]+$row5[1];
$totalmid = $row1[2]+$row2[2]+$row3[2]+$row4[2]+$row5[2];
$totalolder = $row1[3]+$row2[3]+$row3[3]+$row4[3]+$row5[3];
$totalpeople = $row1[4]+$row2[4]+$row3[4]+$row4[4]+$row5[4];
$totalcost = $row1[5]+$row2[5]+$row3[5]+$row4[5]+$row5[5];

echo '<tr>
        <td>Totals</td>
        <td>'.$totalhouseholds.'</td>
        <td>'.$totalunder.'</td>
        <td>'.$totalmid.'</td>
        <td>'.$totalolder.'</td>
        <td>'.$totalpeople.'</td>
        <td>'.$totalcost.'</td>
    </tr>
</table>';

mysqli_close($db);
?>


<br>
<form action="menu.php">
    <input type="submit" value="Return to Main Menu">
</form>

</center>
</body>
</html>