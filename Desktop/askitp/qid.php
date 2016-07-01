<?php
 include("dbcon.php");
$qid ='';
$num =0;
$anonyq = 'n' ;
if(!$conn)
	die("could not connect" .mysql_errno());

else{
			$sql = 'Select * from id';
		mysql_select_db("askit");
$result = mysql_query($sql,$conn);
		$row = mysql_fetch_assoc($result);
		$num = $row["ques"];
		$num = $num+1;
		$inc = 'update id set ques = '.$num.';';
		echo $inc;
		$qid = 'q'.$num;
		mysql_select_db("askit");
		mysql_query($inc,$conn);
		echo $qid;

		if(isset($_POST['anonyques']))
			{
				echo "true<br>";
				$anonyq ='y';
			}

		else
			{
				echo "false<br>";
				$anonyq = 'n';
			}

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
		$ques = $_POST["ques"];
		$categ = $_POST["cat"];
		// $anony = "N";
		$query = 'INSERT INTO Questions 
      VALUES ( "'.$qid.'", "'.$ques.'","'.$userID.'",0 , "'.
      $categ.'",0,"'.$date.'",0,"'. $anonyq.'");'; 
      echo $query; 
      $sqlstatus = mysql_query($query,$conn);

      if(!$sqlstatus)
      {
      	die("could not run the insert question query".mysql_errno()) ;
      }

      header("location:question.php?questionid=$qid");
}

mysql_close($conn);
?>