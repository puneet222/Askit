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
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   $q = "select First_Name from user where user_ID = \"".$_COOKIE["name"]."\";";
  
   mysql_select_db('askit');
   $result = mysql_query($q,$conn);
  
   $r = mysql_fetch_assoc($result);
    if(!$r){
   	header("location:login.php");
   }
   $username = $r["First_Name"];
   $cat= $_GET['category'];
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
				<li class="first active">
					<a href="category.php">Categories</a>
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
					
				</ul>
			</div>

			<div class="box" id="box-right">
			
				<br>
				<br>
				<h3>


					<?php

					if($cat == "Computer")
					{
						echo "Computer Science" ;
					} 
					else
					{
						echo $cat;
					} 
					?>
					
				</h3>
                
					

					<?php
						$connection = mysql_connect('localhost' , 'root' , 'Incorrect' ) ;

						if(!$connection){
							die('Could  not connect'.mysql_error());
						}



						$sqlquery = "select * from Questions where category = '$cat' " ; 
						

						mysql_select_db('askit');
						$sqlstatus = mysql_query($sqlquery,$connection);


						if(!$sqlstatus){
							die('Could not '.mysql_error());
						}


						  while ($row = mysql_fetch_array($sqlstatus)) {

							
							?>
							<div id="questioncontainer">
							<a href="question.php?questionid=<?php echo  $row['Q_ID'] ;?>"><p id="question">
							<?php
							echo "{$row['Question']} <br>" ;?></p></a>
							<table id="questionoptions" >
							<tr>
							<td>
							<?php echo " {$row['category']}   ";?></td>
						
							

						

							
							
							
							<td>
							<?php
							$usernameq = $row['user_ID'] ;

							?>
							<a href="user_profile.php?usernameviaget=<?php echo $usernameq ?>">
							<?php


							echo " {$row['user_ID']}   ";?></a></td>
							<td>
							<?php echo " {$row['number_of_likes']} likes   ";?></td>
							<td>
							<?php echo " {$row['number_of_answers']} answers   ";?></td>
								
								<td>
							<?php echo " {$row['date_added']}   ";?></td></tr></table>

                             <?php 

                            //echo $row['Q_ID'];

                           $ansquery="select * from answers where  Q_ID='".$row['Q_ID']."' order by rating desc;";
                             //echo $ansquery;
                           mysql_select_db('askit');
                           $ansq = mysql_query($ansquery,$connection);
                           if(!$ansq){
							die('Could not '.mysql_error());
						}


						  $rowans = mysql_fetch_array($ansq);
						  if(!$rowans){
						  	echo "<br>Sorry!! , no answer available.";
						  }
						  else{

						  	echo "<p id='answer'> {$rowans['answer']} <br></p>";
						  	?>
						  	<table id="answeroptions" >
						  	<tr>
							

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

					mysql_close($connection) ;
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

