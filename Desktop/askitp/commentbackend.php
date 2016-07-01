<?php

//echo "this is answer backend";

$ques_id = $_GET["questionid"] ;
$answer_id = $_GET["answerid"] ; 

$comment = trim($_POST["comment"]) ;

 include("dbcon.php");



if(!$conn)
	die("could not connect" .mysql_errno());

else{
		
		mysql_select_db("askit");
		
		

		$t = getdate() ;

		// echo $date ;

		$day = $t['mday'] ;
		$month = $t['mon'];
		$year = $t['year'];

		if($month < 10)
		{
			$month = '0'.$month ;
		}
		if($day < 10)
		{
			$day = '0'.$day;
		}

		$date = $year.'-'.$month.'-'.$day ;

		// $date = "15/15/2016";
		$userID = $_COOKIE["name"];

		 $com = "Select comnt from id " ;
		mysql_select_db("askit");
		
		$sqlstatus3 = mysql_query($com , $conn);
		if(!$sqlstatus3)
		{
			die('could not generate the comment_id query'.mysql_errno());
		}
		
		else
		{
			$n = mysql_fetch_assoc($sqlstatus3);
			
			$num = $n['comnt'] ;
			
			echo $num ;

		
			$id = 'c'.$num;
			echo "comment id is" ;
			echo $id ;

			$num = $num + 1 ;

			$update = "UPDATE id set comnt = comnt + 1" ;
			mysql_select_db("askit");
			$sqlstatus4 = mysql_query($update , $conn);

		}

		
}


		$query = 'INSERT INTO comments VALUES ( "'.$answer_id.'","'.$id.'","'.$comment.'","'.$userID.'","'.$date.'");'; 
      
      echo $query;
      $inc_ans = "UPDATE answers set number_of_comments = number_of_comments + 1 where answer_ID = '$answer_id' ;" ;
      echo $inc_ans ;
      mysql_select_db("askit") ;
      $sqlstatus = mysql_query($query,$conn);
      $sqlstatus2 = mysql_query($inc_ans , $conn) ;


      if(!$sqlstatus){
							die('Could not run the insert comment query ' .mysql_error());
						}

		if(!$sqlstatus2)
		{
			die('could not increment the answers' .mysql_errno());
		}					

						header('location:comments.php?questionid='.$ques_id.'&answerid='.$answer_id) ;


mysql_close($conn);
/**/
?>