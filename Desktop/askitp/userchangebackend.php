<?php
include("dbcon.php") ;
$fn = $_POST[First_Name];
	$ln = $_POST[Last_Name];
	$dob = $_POST[DOB];
	$gender = $_POST[gender];
	$ygrad = $_POST[Year_of_graduation];
	$sid = $_POST[SID];
	$prgm = $_POST[Programme];
	$branch = $_POST[Branch];
	$cntct = $_POST[contact];
	$email = $_POST[email_ID];
	// $conn = mysql_connect($dbhost,$dbroot,$dbpass);
	if(!$conn)
	die("could not connect" .mysql_errno());

else{
			$sql = 'update user set First_Name = "'.$fn.'",Last_Name = "'.$ln.'",DOB = "'.$dob.'",gender = "'.$gender.'",Year_of_graduation ='.
			$ygrad.',SID = "'.$sid.'",Programme = "'.$prgm.'",Branch = "'.
			$branch.'",contact = "'.$cntct.'",email_ID = "'.$email.'" where user_ID = "'.$_COOKIE['name'].'";';
			echo $sql;
			
			mysql_select_db("askit");
			$result = mysql_query($sql,$conn);
			header("location:index1.php");
}
?>