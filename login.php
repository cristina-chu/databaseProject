
<head>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<?php
/**
*	This file takes in the POST request from the Login page
*	Check the password against the password of the username passed in
*	Redirects to Login page if Login is not succesful
*	Goes to Menu page otherwise
*/


//Get Variables from post request
$username=$_POST["username"];
$password=$_POST["password"];


//Connect to and Query Database

//to get database
$db=mysqli_connect("academic-mysql.cc.gatech.edu","cs4400_Group_60","SB2imF_j","cs4400_Group_60");

//to get query. Remember: string="", string in sql = '', concatenate = .stuff.
$query="SELECT Password,Type FROM User WHERE Username='".$username."';";

//pass stuff to database, get an object back
$result=$db->query($query);

//from the object obtained, get the actual result
$row=mysqli_fetch_array($result);

//close connection from database to not fuck up
mysqli_close($db);


//Check if password matches
if($row['Password']==$password){

	if($row['Type']=='V'){
		$nextpage="menu.php";
	}
	if($row['Type']=='D'){
		$nextpage="dirMenu.php";
	}}
else{

	$nextpage="index.php";
}


//Make appropriate Request
header("Location:".$nextpage);
die();

?>

