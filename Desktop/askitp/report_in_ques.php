<?php

echo "report" ;
$ques_id = $_GET["questionid"] ;


 include("dbcon.php");

if(!$conn)
	die("could not connect" .mysql_errno());

else{

		$count = "select number_of_abuse  from Questions where Q_ID = '$ques_id' ;";
			
		$rep = "update Questions set number_of_abuse = number_of_abuse + 1 where Q_ID ='$ques_id'";
		// echo $rep;
		
		mysql_select_db("askit");
		
		mysql_query($rep,$conn);
		
		$count_query = mysql_query($count , $conn) ;



		$abuses = mysql_fetch_array($count_query) ;
		
		if($abuses['number_of_abuse'] >= 5)
		{
			echo "question will be deleted" ;

			$del_ques = "delete from Questions where Q_ID = '$ques_id' ;" ;
			mysql_select_db("askit");
		
			$sql_status2 = mysql_query($del_ques,$conn);

			if(!$sql_status2)
			{
				die('     could not run the delete question query       '.mysql_error()) ;
			}
		}

		
		else
		{

		$sql = 'insert into report_ques values("'.$ques_id.'","'.$_COOKIE["name"].'") ;' ;
      echo $sql;
     	mysql_select_db("askit");
		$sqlstatus = mysql_query($sql,$conn);

      if(!$sqlstatus){
							die('Could not '.mysql_error());
						}

		}
											

						header("location:question.php?questionid=$ques_id") ;
}

mysql_close($conn);

?>