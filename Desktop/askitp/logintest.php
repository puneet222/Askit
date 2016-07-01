<?php
 include("dbcon.php");
$gotID = $_POST["user"];
$pass = $_POST["pass"];
$gotpass=md5($pass);
echo $gotpass;
$time = time()+36000;

if(!$conn)
	die("could not connect" .mysql_errno());

else{
			$sql = 'Select * from user where user_ID = "'.$gotID.'" and password = "'.$gotpass.'";';
		mysql_select_db("askit");
$result = mysql_query($sql,$conn);
		$row = mysql_fetch_assoc($result);
		if($row){
			setcookie("name",$row["user_ID"],$time);		
			header('Location: index1.php') ;  //used for redirecting the page
		}
		else
			{
				
				include("loginretry.php");
				
			
}
}

mysql_close($conn);

?>
