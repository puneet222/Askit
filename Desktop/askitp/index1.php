



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
				<li class="first active">
					<a href="index1.php">Home</a>
				</li>
				<li>
					<a >Categories</a>
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
					<a href="help.php">Help</a>
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
						<a href="category.php?category=Internship">Intership</a>
					</li>
					<li>
						<a href="category.php?category=Clubs">Clubs</a>
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
			<h2 >
				Welcome to ASK it
				</h2>
				<br>
				<br>
				<h3>
					Top Questions:
					
				</h3>
                
					

					<?php
						$userpage = $_COOKIE["name"] ;
						include("dbcon.php");

						if(!$conn){
							die('Could  not connect'.mysql_error());
						}



						$sqlquery = 'select * from Questions order by number_of_likes desc;' ; 

						mysql_select_db('askit');
						$sqlstatus = mysql_query($sqlquery,$conn);


						if(!$sqlstatus){
							die('Could not '.mysql_error());
	 					}

						$var = 0;
						  while (($row = mysql_fetch_array($sqlstatus)) && $var < 15) {
						  	$var = $var+1;
							
							?>
							<div id="questioncontainer">
							<a href="question.php?questionid=<?php echo  $row['Q_ID'] ;?>"><p id="question">
							<?php
							echo "{$row['Question']} <br>" ;?></p></a>
							<a name="i<?php echo "{$row['Q_ID']}"; ?>"></a>
							<table id="questionoptions" >
							<tr>
							<td>
							<?php echo " {$row['category']}   ";?></td>
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
							$flag = 0;

							if(!$query3_result)
								{
									$flag = 1;
								}
									
									else
										$flag = 0;
									?>

									<a style =" cursor: pointer;"id = "<?php echo $row[0]; ?>"><div id = "d<?php echo $row[0]; ?>"></div></a>

									<?php 
echo'
<script type = "text/javascript" src = "a.js"></script>
<script type = "text/javascript">
$(document).ready(function(){
			if('.$flag.')
			$("#d'.$row[0].'").text("like");
		else
			$("#d'.$row[0].'").text("unlike");

	$("#'.$row[0].'").click(function(){
		$.post("like.php",{questionid:"'.$row[0].'"},function(result){
			var r = result.split(" ");
			$("#d'.$row[0].'").text(r[1]);
			$("#l'.$row[0].'").text(r[2]+" likes");
		});
	});
});
</script>';
							
							

								?>

							<!-- <a href="#">Like   </a> -->

							</td>
							

						

						
							
							
							<td>
							<?php
							$usernameq = $row['user_ID'] ;

							?>

							<?php
							if($row['anonymous'] == 'n')
							{
								?>
								<a href="user_profile.php?usernameviaget=<?php echo $usernameq ?>">
								<?php
								echo " {$row['user_ID']}   ";?></a></td>
								<?php

							}
							else
							{
								echo "anonymous";
								?>
								</td>
								<?php
							}
							?>


							<td>
							<div id = "l<?php echo $row[0];?>"><?php echo " {$row['number_of_likes']} likes   ";?>
</div>
							</td>
							<td>
							<?php echo " {$row['number_of_answers']} answers   ";?></td>
								
								<td>
							<?php echo " {$row['date_added']}   ";?></td></tr></table>

                            <?php 

                            //echo $row['Q_ID'];

                           $ansquery="select * from answers where  Q_ID='".$row['Q_ID']."' order by rating desc;";
                             //echo $ansquery;
                           mysql_select_db('askit');
                           $ansq = mysql_query($ansquery,$conn);
                           if(!$ansq){
							die('Could not '.mysql_error());
						}


						  $rowans = mysql_fetch_array($ansq);
						  if(!$rowans){
						  	echo "<br>Sorry!! , no answer available.";
						  }
						  else{

						  	echo "<p id='answer'> <br>{$rowans['answer']} <br></p>";
						  	?>
						  	<table id="answeroptions" >
						  	<tr>
							
							
							<?php 

							// $userpage = $_COOKIE["name"] ;


							?>

							<td><a href="user_profile.php?usernameviaget=<?php echo $userpage ;?>">
							<?php
							echo " {$rowans['User_ID']}   ";?></a></td>
							<td>
							<?php echo " {$rowans['rating']} stars   ";?></td>
								
								<td>
							<?php echo " {$rowans['date_added']}   ";?></td></tr></table>
						  
						  <?php } ?>
                            


							<div id = "quessep">
							
                            <br>
                            __________________________________________________________________________
							</div>
							</div>
							
							<?php
							
						
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

