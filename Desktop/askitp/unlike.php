<?php

echo "unlike";




$ques_id = $_GET["questionid"] ;

$username = $_COOKIE["name"] ;

echo $username;


 include("dbcon.php");

if(!$conn)
	die("could not connect" .mysql_errno());

else{
			
	
		
		
		$inc = "update Questions set number_of_likes = number_of_likes - 1 where Q_ID ='$ques_id'";
		echo $inc;
		
		mysql_select_db("askit");
		mysql_query($inc,$conn);
		


		


		$sql = "delete from  liked  where user_ID = '$username' and Q_ID = '$ques_id';" ;
      echo $sql;
     	mysql_select_db("askit");
		$sqlstatus = mysql_query($sql,$conn);

      if(!$sqlstatus){
							die('Could not '.mysql_error());
						}
											

						header('location:index1.php') ;
}

mysql_close($conn);

?>


