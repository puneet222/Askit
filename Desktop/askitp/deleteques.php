<?php


$ques_id = $_GET["questionid"] ;


 include("dbcon.php");


if(!$conn)
	die("could not connect" .mysql_errno());

else{

		
			$del_ques = "delete from Questions where Q_ID = '$ques_id' ;" ;
			mysql_select_db("askit");
		
			$sql_status2 = mysql_query($del_ques,$conn);

			if(!$sql_status2)
			{
				die('     could not run the delete question query       '.mysql_error()) ;
			}
		

		
		
											

						header('location:index1.php') ;
}

mysql_close($conn);

?>