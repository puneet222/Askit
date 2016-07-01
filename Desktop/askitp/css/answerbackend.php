<?php

echo "this is answer backend";

$ques_id = $_GET["questionid"] ;

$answer = $_POST["ans"] ;

 include("dbcon.php");
$aid ='';
$num =0;

if(!$conn)
	die("could not connect" .mysql_errno());

else{
			$sql = 'Select * from id';
		mysql_select_db("askit");
$result = mysql_query($sql,$conn);
		$row = mysql_fetch_assoc($result);
		$num = $row["ans"];
		$num = $num+1;
		$inc = 'update id set ans = '.$num.';';
		echo $inc;
		$aid = 'a'.$num;
		mysql_select_db("askit");
		mysql_query($inc,$conn);
		echo $aid;

		$anony;

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
		// $ques = $_POST["ques"];
		// $categ = $_POST["cat"];
if(isset($_POST['anonyans']))
{$anony = "y";
}else
{$anony = "n";
}

		$query = 'INSERT INTO answers
      VALUES ( "'.$aid.'", "'.$answer.'","'.$userID.'","'.$ques_id.'","'.$date.'",0,0,"'.$anony.'");'; 
      echo $query;
      $inc_ans = "UPDATE Questions set number_of_answers = number_of_answers + 1 where Q_ID = '$ques_id' ;" ;
      echo $inc_ans ;
      mysql_select_db("askit") ;
      $sqlstatus = mysql_query($query,$conn);
      $sqlstatus2 = mysql_query($inc_ans , $conn) ;

      if(!$sqlstatus){
							die('Could not '.mysql_error());
						}

		if(!$sqlstatus2)
		{
			die('could nnot increment the answers' .mysql_errno());
		}
						echo $anony;					

						header('location:answer.php?questionid='.$ques_id) ;
}

mysql_close($conn);

?>