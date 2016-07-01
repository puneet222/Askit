



<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
	ASK it for PEC
</title>

<link rel="stylesheet" type="text/css" href="css/home_style.css" />
<style type="text/css">
	#sitetitle{
		text-align: center;
		font-family: arial;
	}


</style>
</head>
<body>
	<?php
 
    include("dbcon.php");
   $qidget= $_GET['questionid'];   
   $q = "select First_Name from user where user_ID = \"".$_COOKIE["name"]."\";";
  
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
  
   $r = mysql_fetch_assoc($result);
    if(!$r){
   	header("location:login.php");
   }
   $username = $r["First_Name"];
?>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1>
				<a href="#">ASK it</a>
			</h1>
		</div>
		<div id="search">
			<form action="search.php" method="post">
				<div>
					<input class="text" name="search" size="50" maxlength="64" placeholder = "Search question"/>
					<input type ="submit" value="search" name="searchbutton" id="searchbutton">
				</div>
			</form>
		</div>
		<div id="logout">
			<form action="delete_cookie.php" method="post">
					<input type="submit" value = " logout " id="logbutton">
							</form>
		</div>
		<div id="account">
			
					
  <a href = "user_profile.php?usernameviaget=<?php echo $_COOKIE['name'] ?>" > <table id="usertable"><tr><td><img src ="images/rounduser.png" id="userpic"></td><td>  <?php echo '  Hello, ' ;
                               echo $username; 
                          ?> </td></tr></table>
                          </a>
   					
		</div>
		<div id="menu">
			<ul>
				<li >
					<a href="index1.php">Home</a>
				</li>
				<li>
					<a >Categories</a>
				</li>
				<li class="first active">
					<a >Question</a>
				</li>
				<li>
					<a href="askques.php">ASK</a>
				</li>
				
				<li>
					<a href="answeques.php">Answer</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="#">Help</a>
				</li>
				<li class="last">
					<a href="contact.php">Contact</a>
				</li>
			</ul><br class="clearfix" />
		</div>
	</div>

	<div id="page">
		<!-- <div id="content"> -->
			<div class="box">
				


				<div class="box" id = "box-left">

		<h3>
					CATEGORIES
					<br>
					<br>
				</h3>
				<ul class="list">
					<li class="first">
						<a href="category.php?category=General">General</a>
					</li>
					<li>
						<a href="category.php?category=Placement">Placement</a>
					</li>
					<li>
						<a href="category.php?category=Internship">Internship</a>
					</li>
					<li>
						<a href="category.php?category=Internship">Clubs</a>
					</li>
					<li>
						<a href="category.php?category=Aeronautical">Aeronautical</a>
					</li>
					<li>
						<a href="category.php?category=Civil">Civil</a>
					</li>
					<li>
						<a href="category.php?category=Computer">Computer Science</a>
					</li>
					<li>
						<a href="category.php?category=Electrical">Electrical</a>
					</li>
					<li>
						<a href="category.php?category=Electronics">Electronics</a>
					</li>
					<li>
						<a href="category.php?category=Mechanical">Mechanical</a>
					</li>
					<li>
						<a href="category.php?category=Metallurgy">Metallurgy</a>
					</li>
					<li>
						<a href="category.php?category=Production">Production</a>
					</li>
					
					</li>
				</ul>
			</div>

			<div class="box" id="box-right">
			
				<h3>
					Question:
					
				</h3>
                
					

					<?php
						$userpage = $_COOKIE["name"] ;
						 include("dbcon.php");

						if(!$conn){
							die('Could  not connect'.mysql_error());
						}



						$sqlquery = "select * from Questions where Q_ID='$qidget' "; 

						mysql_select_db('askit');
						$sqlstatus = mysql_query($sqlquery,$conn);


						if(!$sqlstatus){
							die('Could not '.mysql_error());
						}


						  $row = mysql_fetch_array($sqlstatus) 

							
							?>
						
							<p id="question" style="color: white;font-size: 140%">
							<?php
							echo "{$row['Question']} <br>" ;?></p>

							<table id="questionoptionstable" >
							<tr>
							<td>
							<?php

							if($row['anonymous'] == 'n')
							{
								?>
								<a href="user_profile.php?usernameviaget=<?php echo $row['user_ID'] ?>">
								<?php
								echo " {$row['user_ID']}   ";?></a>
								</td>
								<?php
							}
							else
							{
								echo "anonymous" ;
							}	
							
							?>


							<td>
							<?php echo "{$row['category']} ";?></td>
							
							<td>
							<?php echo " {$row['number_of_likes']} likes   ";?></td>
							<td>
							<?php echo " {$row['number_of_answers']} answers   ";?></td>
							<td>
							<?php echo " {$row['number_of_abuse']} report abuses  ";?></td>
								
								<td>
							<?php echo " {$row['date_added']}   ";?></td>
							</tr></table>
							<table id="questionoptionstable">
							<tr>
							<td>

							<?php
							$likequery = "select * from liked where user_ID = '$userpage' and Q_ID = '$row[0]'; " ;
							$reportquery = "select * from report_ques where user_ID = '$userpage' and Q_ID = '$row[0]';" ;




							mysql_select_db('askit');
							$sqlstatus3 = mysql_query($likequery,$conn);

							$sqlstatus4 = mysql_query($reportquery , $conn) ;


							if(!$sqlstatus3){
								die('Could not run the query of like question'.mysql_error());
							}

							if(!$sqlstatus4){
								die('Could not run the query of report question'.mysql_error());
							}

							$query3_result = mysql_fetch_array($sqlstatus3) ;

							$query4_result = mysql_fetch_array($sqlstatus4) ;


							if(!$query3_result)
								{


									?>

									<a href="like_in_q.php?questionid=<?php echo $row[0] ?>">Like</a>

									<?php 
								}
							else
								{

									?>

									<a href="unlike_in_q.php?questionid=<?php echo $row[0] ?>">Unlike</a>

									<?php 

								}

								?>

							
							<!-- <a href="#">Like   </a> -->

							</td>
							
							<td>

							<?php

							if($userpage != $row['user_ID'])
							{

							

								if(!$query4_result)
								{

									?>

									<a href="report_in_ques.php?questionid=<?php echo $row[0] ?>">Report Abuse</a>

									<?php 
								}

								else
								{
									?>

									<h5> Reported </h5>

									<?php 
								}

							}	

							?>

							<!-- <a href="#">Report Abuse   </a> -->

							</td>
							<td>
                            <?php
                            if($row['user_ID']==$userpage){
                            	echo '<a href="deleteques.php?questionid='.$row[0].'">Delete</a>';
                            } 
                            ?>

							</td>
							
							</tr></table>
							
							<?php 

                            //echo $row['Q_ID'];

                           $ansquery="select * from answers where  Q_ID='$qidget' order by rating desc;";
                             
                           mysql_select_db('askit');
                           $ansq = mysql_query($ansquery,$conn);
                           if(!$ansq){
							die('Could not '.mysql_error());
							}

							// echo "answer.php?questionid=$qidget" ;
						
							?>
							
							<a href = "answer.php?questionid=<?php echo $qidget?>" title = "wanna answer this question"> <img src = "images/pen2.png" height="60" width="60" /></a>
							
							<br>
							<br>
							<h3>Answers:</h3>
							

                            
							<?php

							  $rowans = mysql_fetch_array($ansq);
							  if(!$rowans){
							  	echo "<br>Sorry!! , no answer available.";
							  }
							  else{
							  	while ($rowans) {
						  		
						  	
							
							
						  	echo "<br><p id='answer'> {$rowans['answer']} <br></p>";
						  	?>
						  	<table id="answeroptionstable" >
						  	<tr>
						  	<td>
						  	<?php
						  		
						  	?>	
						  	<?php 
						  	if($rowans['anonymous'] == 'n')
						  	{
						  		?>
						  		<?php echo " <a href ='user_profile.php?usernameviaget=$userpage'  >{$rowans['User_ID']} </a>  "; ?>
						  		</td>
						  		<?php
						  	}
						  	else
						  	{
						  		echo "anonymous" ;
						  	}
						  	?>

						  	

							
							<td>
                            
                            
                            	<a href="comments.php?answerid=<?php echo $rowans[0] ?>&questionid=<?php echo $qidget ?>"><?php echo $rowans["number_of_comments"] ?> Comments</a>
                             
                          

							</td>						
												
							
							
							<td>

							<?php echo " {$rowans['rating']} stars   ";?></td>
								
								<td>
							<?php echo " {$rowans['date_added']}   ";?></td>
							<td>
							<?php echo " {$rowans['number_of_abuse']} report abuses   ";?></td>
							</tr>
							</table>
							<table id ="answeroptionstable">
							<tr>
							<td>
								<form action ="rate.php?answerid=<?php echo $rowans['answer_ID'] ?>&questionid=<?php echo $qidget ?>" method = "post" >
							<select name="rating" id="rate">
								<option value = 1>1 star</option>
								<option value = 2>2 star</option>
								<option value = 3>3 star</option>
								<option value = 4>4 star</option>
								<option value = 5>5 star</option>
								</select>
								<input type = "submit" value = "rate" id="askbutton">
							</form>
						</td>
								<td>

								<?php

								$ansid = $rowans['answer_ID'];


								$reportans = "select * from report_ans where answer_ID = '$ansid' and user_ID = '$userpage' ";

								mysql_select_db('askit');
								$sqlstatus5 = mysql_query($reportans,$conn);

								if(!$sqlstatus5)
								{
									die('Could not run the query of report answer'.mysql_error());
								}

								$query5_result = mysql_fetch_array($sqlstatus5);

								if(!$query5_result)
								{
									?>
									<a href="report_answer.php?answerid=<?php echo $ansid ?>&quesid=<?php echo $row['Q_ID'] ?>">Report</a></td>
									<?php

								}

								else
								{
									?>
									Reported</td>
									<?php
								}

							?>

							<td>
                            <?php
                            if($rowans['User_ID']==$userpage){
                            	
                            	echo '<a href="deleteans.php?answerid='.$rowans[0].'&qid='.$qidget.'">Delete</a>';
                            } 
                            ?>

							</td>	</tr>
							</table>
						  
						  
                            


							<div id = "quessep">
							
                            
                            __________________________________________________________________________
							</div>
							
							
							<?php
							$rowans = mysql_fetch_array($ansq);
							
						}
					}
                       

					mysql_close($conn) ;
					?>
				
				
			</div><br class="clearfix" />
		</div>
				
			</div>
			<br class="clearfix" />
		</div>
	<br class="clearfix" />
	</div>


			
	</div>
</div>
</div>
<div id="footer">
	&copy; Askit 
</div>
</body>
</html>

