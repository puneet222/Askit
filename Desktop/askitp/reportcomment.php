<?php
$cid = $_GET['cid'];
$ques = $_GET['ques'];
$ans = $_GET['ans'];
include("dbcon.php");


if(!$conn)
	die("could not connect" .mysql_errno());

else{

		$count = "select count(*) as count from report_comment where C_ID = '$cid' ;";
			
		
		
		mysql_select_db("askit");
		
		$count_query = mysql_query($count , $conn) ;



		$abuses = mysql_fetch_array($count_query) ;
		
		
		if($abuses['count'] >= 4)
		{
			echo "answer will be deleted" ;

			$del_ans = "delete from comments where C_ID = '$cid' ;" ;
			mysql_select_db("askit");
			$x = "delete from report_comment where C_ID = '$cid' ;" ;		
			
			$sql_status2 = mysql_query($del_ans,$conn);
			
			$sql_status3 = mysql_query($x,$conn);
			
			if(!($sql_status2||$sql_status3))
			{
				die('     could not run the delete answer query       '.mysql_error()) ;
			}

		}

		
		else
		{

		$sql = 'insert into report_comment values("'.$_COOKIE["name"].'","'.$cid.'") ;' ;
      echo $sql;
     	mysql_select_db("askit");
		$sqlstatus = mysql_query($sql,$conn);

      if(!$sqlstatus){
							die('Could not '.mysql_error());
						}

		}
											

						header("location:comments.php?questionid=$ques&answerid=$ans") ;
}

mysql_close($conn);
?>