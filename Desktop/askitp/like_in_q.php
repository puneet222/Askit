<?php

echo "like" ;
$ques_id = $_GET["questionid"] ;


 include("dbcon.php");

if(!$conn)
	die("could not connect" .mysql_errno());

else{
			
	
		
		
		$inc = "update Questions set number_of_likes = number_of_likes + 1 where Q_ID ='$ques_id'";
		echo $inc;
		
		mysql_select_db("askit");
		mysql_query($inc,$conn);
		


		


		$sql = 'insert into liked values("'.$ques_id.'","'.$_COOKIE["name"].'") ;' ;
      echo $sql;
     	mysql_select_db("askit");
		$sqlstatus = mysql_query($sql,$conn);

      if(!$sqlstatus){
							die('Could not '.mysql_error());
						}
											

						header("location:question.php?questionid=$ques_id") ;
}

mysql_close($conn);

?>


