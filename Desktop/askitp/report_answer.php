<?php

$answerid = $_GET['answerid'];
$questionid = $_GET['quesid'] ;

 include("dbcon.php");


if(!$conn)
	die("could not connect" .mysql_errno());

else{

		$count = "select number_of_abuse  from answers where answer_ID = '$answerid' ;";
			
		$rep = "update answers set number_of_abuse = number_of_abuse + 1 where answer_ID ='$answerid'";
		echo $rep;
		
		mysql_select_db("askit");
		
		mysql_query($rep,$conn);
		
		$count_query = mysql_query($count , $conn) ;



		$abuses = mysql_fetch_array($count_query) ;
		
		if($abuses['number_of_abuse'] >= 10)
		{
			echo "answer will be deleted" ;

			$del_ans = "delete from answers where answer_ID = '$answerid' ;" ;
			mysql_select_db("askit");
		
			$sql_status2 = mysql_query($del_ans,$conn);

			if(!$sql_status2)
			{
				die('     could not run the delete answer query       '.mysql_error()) ;
			}
		}

		
		else
		{

		$sql = 'insert into report_ans values("'.$answerid.'","'.$_COOKIE["name"].'") ;' ;
      echo $sql;
     	mysql_select_db("askit");
		$sqlstatus = mysql_query($sql,$conn);

      if(!$sqlstatus){
							die('Could not '.mysql_error());
						}

		}
											

						header("location:question.php?questionid=$questionid") ;
}

mysql_close($conn);
?>