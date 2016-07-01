<?php

include("dbcon.php");

$answerid = $_GET['answerid'] ;
$username = $_COOKIE['name'];
echo $answerid ;
$rating ="";

if(!$conn)
	die("could not connect" .mysql_errno());

else{


	$rate = $_POST['rating'] ;

	echo $rate ;
	$check = "select * from ans_rating where user_ID = '$username' and answer_ID = '$answerid'";
	mysql_select_db("askit");
	 $status = mysql_query($check,$conn);
	 $checkvar = mysql_fetch_assoc($status);
	if(!$checkvar)
	{$rating = "insert into ans_rating values('$answerid' , '$username' , $rate)" ;
	}
	else
		{$rating = "update ans_rating set rating = $rate where answer_ID = '$answerid' and user_ID = '$username';";
	}
	mysql_select_db("askit");
	 echo $rating;
	 $sqlstatus = mysql_query($rating,$conn);

      if(!$sqlstatus)
      {
      	die("could not run the insert rating query".mysql_errno()) ;
      }

      $avg_rate = "select avg(rating) as avg from ans_rating group by answer_ID having answer_ID = '$answerid'" ;
      mysql_select_db("askit");
      $sqlstatus2 = mysql_query($avg_rate , $conn) ;

      if(!sqlstatus2)
      {
      	die("could not run the average rating query".mysql_errno()) ;
      }
      else
      {
      	$result = mysql_fetch_assoc($sqlstatus2) ;
      	$average = $result['avg'];

      	$update = "update answers set rating = $average where answer_ID = '$answerid' " ;

      	mysql_query($update , $conn);
echo $avg_rate."<BR><BR><BR><BR><BR><BR><BR>";
echo $update;

$qid = $_GET['questionid'] ;

echo $qid ;
header("location: question.php?questionid=$qid");
      }
}
?>