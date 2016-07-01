<?php


$ques_id = $_POST["questionid"] ;
$username = $_COOKIE["name"];
 include("dbcon.php");


if(!$conn)
	{die("could not connect" .mysql_errno());
		echo "wrong";
}

else{
	

		$likequery = "select * from liked where user_ID = '".$username."' and Q_ID = '".$ques_id."'; " ;
					mysql_select_db('askit');
							$sqlstatus3 = mysql_query($likequery,$conn);
		$query3_result = mysql_fetch_array($sqlstatus3) ;
		if(!$query3_result)
								{
									
						
		$inc = "update Questions set number_of_likes = number_of_likes + 1 where Q_ID ='$ques_id'";
		mysql_select_db("askit");
		mysql_query($inc,$conn);
		$sql = 'insert into liked values("'.$ques_id.'","'.$_COOKIE["name"].'") ;' ;
     	mysql_select_db("askit");
		$sqlstatus = mysql_query($sql,$conn);
		echo "unlike";

}
else{
$dinc = "update Questions set number_of_likes = number_of_likes - 1 where Q_ID ='$ques_id'";
		mysql_select_db("askit");
		mysql_query($dinc,$conn);
		$dsql = "delete from  liked  where user_ID = '$username' and Q_ID = '$ques_id';" ;
		mysql_select_db("askit");
		$sqlstatus = mysql_query($dsql,$conn);
		echo "like";
}
$qq = "select * from Questions where Q_ID = '".$ques_id."';";
		mysql_select_db('askit');
		$statusqq = mysql_query($qq,$conn);
		$rqq = mysql_fetch_assoc($statusqq);
		$var = $rqq["number_of_likes"];
		echo " ".$var;
}
											
mysql_close($conn);
/**/?>


